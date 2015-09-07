<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("hddtemp");

$elem["hddtemp/SUID_bit"]["type"]="boolean";
$elem["hddtemp/SUID_bit"]["description"]="Should /usr/sbin/hddtemp be installed SUID root?
 You have the option of installing hddtemp with the SUID bit set,
 allowing it to be run (reporting hard drive temperatures) by regular
 users and not only the superuser.
 .
 This could potentially allow hddtemp to be used during an attack
 against the computer's security. If in doubt, do not choose this option.
 .
 This setting can be modified later by running 'dpkg-reconfigure hddtemp'.
";
$elem["hddtemp/SUID_bit"]["descriptionde"]="Soll /usr/sbin/hddtemp mit Root-Rechten ausgestattet werden?
 Sie haben die Möglichkeit, Hddtemp bei der Installation mit Root-Rechten auszustatten. Damit kann es von jedem normalen Benutzer (und nicht nur von Root) gestartet werden, um die Festplattentemperatur zu melden.
 .
 Dadurch könnte es aber möglich sein, die Sicherheit des Rechners anzugreifen. Wenn Sie sich nicht sicher sind, lehnen Sie hier ab.
 .
 Diese Einstellung kann später durch den Befehl 'dpkg-reconfigure hddtemp' geändert werden.
";
$elem["hddtemp/SUID_bit"]["descriptionfr"]="Faut-il exécuter hddtemp avec les privilèges du superutilisateur ?
 Il est possible d'installer hddtemp avec le bit « setuid » positionné, ce qui lui permet d'être exécuté (et donc d'indiquer la température des disques durs) par les utilisateurs non privilégiés et pas seulement le superutilisateur.
 .
 Cela peut théoriquement permettre d'utiliser hddtemp pour une attaque visant à compromettre la sécurité du système. Dans le doute, il est conseillé ne de pas activer cette option.
 .
 Ce choix peut être modifié ultérieurement avec la commande « dpkg-reconfigure hddtemp ».
";
$elem["hddtemp/SUID_bit"]["default"]="false";
$elem["hddtemp/syslog"]["type"]="string";
$elem["hddtemp/syslog"]["description"]="Interval between hard drive temperature checks:
 The temperature of the hard drive(s) can be logged by hddtemp via
 the generic system logging interface.
 .
 Please enter a value in seconds corresponding to the interval between
 two checks. To disable this feature, enter 0.
";
$elem["hddtemp/syslog"]["descriptionde"]="Zeitraum zwischen den Überprüfungen der Festplattentemperatur:
 Die Temperatur der Festplatte(n) kann von Hddtemp mittels der allgemeinen System-Protokollierschnittstelle fortlaufend gespeichert werden.
 .
 Bitte geben Sie die Zeitspanne zwischen zwei Überprüfungen in Sekunden ein. Um diese Funktion abzuschalten, geben Sie 0 ein.
";
$elem["hddtemp/syslog"]["descriptionfr"]="Intervalle entre deux contrôles de température :
 La température des disques durs peut être enregistrée par hddtemp et restituée par l'interface standard de journalisation du système.
 .
 Veuillez choisir l'intervalle en secondes entre deux mesures. Indiquez 0 pour désactiver cette fonctionnalité.
";
$elem["hddtemp/syslog"]["default"]="0";
$elem["hddtemp/daemon"]["type"]="boolean";
$elem["hddtemp/daemon"]["description"]="Should the hddtemp daemon be started at boot?
 The hddtemp program can be run as a daemon, listening on port 7634
 for incoming connections. It is used by some software such as gkrellm to get
 the temperature of hard drives.
 .
 You have the option of starting the hddtemp daemon automatically on
 system boot. If in doubt, it is suggested to not start it
 automatically on boot.
 .
 This setting can be modified later by running 'dpkg-reconfigure hddtemp'.
";
$elem["hddtemp/daemon"]["descriptionde"]="Den Hddtemp-Dienst beim Hochfahren des Systems starten?
 Hddtemp kann als Dienst betrieben werden und wartet am Port 7634 auf ankommende Verbindungen. Das wird von einigen Programmen wie Gkrellm genutzt, um die Temperatur der Festplatten abzufragen.
 .
 Sie haben die Möglichkeit, den Dienst Hddtemp beim Hochfahren des Systems automatisch zu starten. Wenn Sie sich nicht sicher sind, starten Sie den Dienst nicht automatisch beim Hochfahren.
 .
 Diese Einstellung kann später durch den Befehl 'dpkg-reconfigure hddtemp' geändert werden.
";
$elem["hddtemp/daemon"]["descriptionfr"]="Faut-il lancer automatiquement le démon hddtemp au démarrage ?
 Le programme hddtemp peut être lancé en tant que démon, à l'écoute sur le port 7634. Ce démon est utilisé par certains logiciels tel que gkrellm pour obtenir la température des disques durs.
 .
 Ce démon peut être lancé automatiquement au démarrage de l'ordinateur. Dans le doute, il est suggéré de ne pas activer cette option.
 .
 Ce choix peut être modifié ultérieurement avec la commande « dpkg-reconfigure hddtemp ».
";
$elem["hddtemp/daemon"]["default"]="false";
$elem["hddtemp/interface"]["type"]="string";
$elem["hddtemp/interface"]["description"]="Interface to listen on:
 The hddtemp program can listen for incoming connections on a specific
 interface, or on all interfaces. 
 .
 To listen on a specific interface, enter the IP address of that interface 
 (choosing 127.0.0.1 will accept local connections only). To listen on all interfaces,
 enter 0.0.0.0.
";
$elem["hddtemp/interface"]["descriptionde"]="Schnittstelle, an der auf Anfragen gewartet wird:
 Hddtemp kann an einer speziellen oder an allen Schnittstelle auf ankommende Verbindungen warten.
 .
 Um an einer einzelnen Schnittstelle auf Anfragen zu warten, geben Sie deren IP-Adresse ein (Falls Sie 127.0.0.1 wählen, sind nur lokale Verbindungen erlaubt). Um alle Schnittstellen zu verwenden, geben Sie 0.0.0.0 ein.
";
$elem["hddtemp/interface"]["descriptionfr"]="Interface où hddtemp sera à l'écoute :
 Le programme hddtemp peut être à l'écoute de connexions entrantes sur une interface spécifique ou sur toutes les interfaces.
 .
 Pour écouter sur une interface spécifique, indiquez l'adresse IP de cette interface (en choisissant 127.0.0.1, seules les connexions locales seront acceptées). Pour écouter sur toutes les interfaces, saisissez simplement 0.0.0.0.
";
$elem["hddtemp/interface"]["default"]="127.0.0.1";
$elem["hddtemp/port"]["type"]="string";
$elem["hddtemp/port"]["description"]="Port to listen on:
 By default, hddtemp listens for incoming connections on port 7634. This
 can be changed for another port number.
";
$elem["hddtemp/port"]["descriptionde"]="Port, an dem auf Anfragen gewartet wird:
 Normalerweise wartet Hddtemp am Port 7634 auf ankommende Verbindungen. Sie können auch eine andere Port-Nummer eingeben.
";
$elem["hddtemp/port"]["descriptionfr"]="Port sur lequel hddtemp sera à l'écoute :
 Par défaut, hddtemp attend les connexions entrantes sur le port 7634. Ce port peut être modifié si nécessaire.
";
$elem["hddtemp/port"]["default"]="7634";
PKG_OptionPageTail2($elem);
?>
