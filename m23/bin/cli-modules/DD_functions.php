<?php


define('pfadZurRechnerliste', '/home/admin/rechnerliste.txt'); //Dateipfad ersetzen!


/**
**name DD_BenutzerErneuernSSH($Rechner, $Benutzer, $Passwort, $Nachfrage)
**description Erneuert einen Benutzer (Benutzer und Home löschen + wieder anlegen) auf einem Rechner aus der Liste.
**parameter Rechner: Name des Rechners (steht in der Liste und in der m23-DB)
**parameter Benutzer: Name des benutzers.
**parameter Passwort: Das dazugehörige Paßwort.
**parameter Nachfrage: true, wenn der (eingeloggte) Benutzer gefragt werden soll, sonst false.
**/
function DD_BenutzerErneuernSSH($Rechner, $Benutzer, $Passwort, $Nachfrage)
{

if ($Nachfrage)
$cmd = '
#Check, if the user is currently logged in
if [ $(users | sed \'s/ /\n/g\' | grep -c "^'.$Benutzer.'$") -gt 0 ]
then
	#Generate an SSH key for the root user
	if [ ! -e /root/.ssh/id_dsa.pub ]
	then
		ssh-keygen -t dsa -N \'\' -P \'\' -f /root/.ssh/id_dsa
		ssh-agent sh -c \'ssh-add < /dev/null\'
	fi

	#Build an SSH directory for the given user and add root\'s SSH key
	mkdir -p "/home/'.$Benutzer.'/.ssh"
	cp /root/.ssh/id_dsa.pub "/home/'.$Benutzer.'/.ssh/authorized_keys"
	chmod 700 -R "/home/'.$Benutzer.'/.ssh"
	chown '.$Benutzer.' -R "/home/'.$Benutzer.'/.ssh"

	#Show the dialog to the user.
	ssh -o UserKnownHostsFile=/dev/null -o VerifyHostKeyDNS=no -o CheckHostIP=no -o StrictHostKeyChecking=no -X '.$Benutzer.'@localhost "export DISPLAY=:0.0; xhost +; zenity --question --text=\'Koennen Ihr Benutzerprofil und alle Daten jetzt geloescht werden?\'"
	#Put the answer into a file: 0=yes, 1=no
	echo $? > /tmp/userDelAnswer
else
	#Not logged in, so the user indirectly accepts deletion
	echo 0 > /tmp/userDelAnswer
fi
';
else
$cmd = '
echo 0 > /tmp/userDelAnswer
';


$cmd .= '
#Check, if the user should be refreshed
if [ $(cat /tmp/userDelAnswer) -eq 0 ]
then
	#Kill all user tools and the X session
	killall -s 9 -u "'.$Benutzer.'"

	#Delete the user and home directory
	userdel -r -f "'.$Benutzer.'"

	#Add the user and home directory
	#Create a temporary encrypted password (with short hash)
	cpass=`echo -n "'.$Passwort.'" | openssl passwd -stdin -1`

	#Create user with home directory
	useradd -m -g users -d "/home/'.$Benutzer.'" -s /bin/bash -p "$cpass" "'.$Benutzer.'"

	#Delete the sudo group to disable logging in for normal users as root with the user password
	groupdel sudo

	echo löschen
else
	echo behalten
fi
';

CLIENT_executeOnClientOrIP($Rechner,'DD_BenutzerErneuern',$cmd);
};





/**
**name DD_einenBenutzerZuruecksetzen($rechnername)
**description Erneuert einen Benutzer (Benutzer und Home löschen + wieder anlegen) auf einem Rechner aus der Liste.
**parameter rechnername: Name des Rechners (steht in der Liste und in der m23-DB)
**/
function DD_einenBenutzerZuruecksetzen($rechnername)
{
	
	if (!file_exists(pfadZurRechnerliste))
	{
		echo("Die Datei mit der Liste der Computer konnte nicht gefunden werden. Abgebrochen!\n");
		return(FALSE);
	}

	$passendeZeilen = array();
	$rechnerliste = fopen(pfadZurRechnerliste, 'r');
	
	if ($rechnerliste)
	{
		while (!feof($rechnerliste))
		{
			$puffer = fgets($rechnerliste);
			if(strpos($puffer, $rechnername) === 0)
			$passendeZeilen[] = $puffer;
		}
		fclose($rechnerliste);
	}
	else
	{
		echo("Die Datei mit der Liste der Rechner konnte nicht gelesen werden. Abgebrochen!\n");
		return(FALSE);
	}
	
	$anzahlPassendeZeilen = count($passendeZeilen);
	if ($anzahlPassendeZeilen === 0) 
	{
		echo("Der Schulungsrechner $rechnername konnte nicht gefunden werden. Abgebrochen!\n");
		return(FALSE);
	}
	elseif ($anzahlPassendeZeilen > 1)
	{
		echo("Die Datei mit der Liste der Rechner enthaelt Dopplungen. Abgebrochen!\n");
		return(FALSE);
	}
	
	$rechnerdetails = explode('#', $passendeZeilen[0]);
	$rechnername = $rechnerdetails[0];
	$benutzername = $rechnerdetails[1];
	$benutzerpasswort = $rechnerdetails[2];

	DD_BenutzerErneuernSSH($rechnername, $benutzername, $benutzerpasswort, true);
	return(TRUE);
}





/**
**name DD_alleBenutzerZuruecksetzen()
**description Erneuert den jeweiligen Benutzer (Benutzer und Home löschen + wieder anlegen) auf allen Rechnern.
**/
function DD_alleBenutzerZuruecksetzen()
{
	if (!file_exists(pfadZurRechnerliste))
	{
		echo("Die Datei mit der Liste der Computer konnte nicht gefunden werden. Abgebrochen!\n");
		return(FALSE);
	}

	$rechnerliste = fopen(pfadZurRechnerliste, 'r');
	
	if (!$rechnerliste)
	{
		echo("Die Datei mit der Liste der Rechner konnte nicht gelesen werden. Abgebrochen!\n");
		return(FALSE);
	}
	
	while (!feof($rechnerliste))
	{
		$aktuelleDaten = explode('#', fgets($rechnerliste));
		$rechnername = $aktuelleDaten[0];
		$benutzername = $aktuelleDaten[1];
		$benutzerpasswort = $aktuelleDaten[2];

		DD_BenutzerErneuernSSH($rechnername, $benutzername, $benutzerpasswort, false);
	}
	
	fclose($rechnerliste);
	return(TRUE);
}





/**
**name DD_alleRechnerAusschalten()
**description Schaltet alle Rechner aus.
**/
function DD_alleRechnerAusschalten()
{
	$shutdownCmd = '/sbin/poweroff; /sbin/poweroff -f; /sbin/halt; /sbin/halt -f; /sbin/shutdown -t now -f; /sbin/shutdown -f; /sbin/shutdown';


	if (!file_exists(pfadZurRechnerliste))
	{
		echo("Die Datei mit der Liste der Computer konnte nicht gefunden werden. Abgebrochen!\n");
		return(FALSE);
	}

	$rechnerliste = fopen(pfadZurRechnerliste, 'r');
	
	if (!$rechnerliste)
	{
		echo("Die Datei mit der Liste der Rechner konnte nicht gelesen werden. Abgebrochen!\n");
		return(FALSE);
	}
	
	while (!feof($rechnerliste))
	{
		$aktuelleDaten = explode('#', fgets($rechnerliste));
		$rechnername = $aktuelleDaten[0];
		$benutzername = $aktuelleDaten[1];
		$benutzerpasswort = $aktuelleDaten[2];

		CLIENT_executeOnClientOrIP($rechnername, 'DD_alleRechnerAusschalten', $shutdownCmd);
	}
	
	fclose($rechnerliste);
	echo("Alle Rechner schalten jetzt ab!\n");	
	return(TRUE);
}





/**
**name DD_alleRechnerAusschalten()
**description Listet alle Rechner im "zenity --list"-Format auf.
**returns Alle Rechner im "zenity --list"-Format.
**/
function DD_alleRechnerAuflisten()
{
if (!file_exists(pfadZurRechnerliste))
	{
		echo("Die Datei mit der Liste der Computer konnte nicht gefunden werden. Abgebrochen!\n");
		return(FALSE);
	}

	$rechnerliste = fopen(pfadZurRechnerliste, 'r');
	
	if (!$rechnerliste)
	{
		echo("Die Datei mit der Liste der Rechner konnte nicht gelesen werden. Abgebrochen!\n");
		return(FALSE);
	}
	
	$fertigeListe = "Abbruch";
	
	while (!feof($rechnerliste))
	{
		$aktuelleDaten = explode('#', fgets($rechnerliste));
		$rechnername = $aktuelleDaten[0];
		$fertigeListe = $fertigeListe."\n".$rechnername;
	}
	
	fclose($rechnerliste);
	return($fertigeListe);
}


?>