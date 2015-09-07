<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("vidalia");

$elem["vidalia/users"]["type"]="multiselect";
$elem["vidalia/users"]["description"]="Users to add to the debian-tor group:
 Select which users from the list below should be able to control Tor daemon.
 .
 Please restart your X sessions to apply changes before starting Vidalia.
 .
 For more information, please refer to /usr/share/doc/vidalia/README.Debian.gz.
";
$elem["vidalia/users"]["descriptionde"]="Benutzer, die Mitglied der Gruppe »debian-tor« werden sollen:
 Wählen Sie aus der folgenden Liste die Benutzer, die den Tor-Daemon steuern dürfen.
 .
 Vor dem Start von Vidalia starten Sie bitte Ihre X-Sitzungen neu, damit die Änderungen wirksam werden.
 .
 Weitere Informationen finden Sie in /usr/share/doc/vidalia/README.Debian.gz.
";
$elem["vidalia/users"]["descriptionfr"]="Identifiants à ajouter au groupe debian-tor :
 Veuillez choisir les utilisateurs autorisés à contrôler le démon Tor.
 .
 Il est nécessaire de redémarrer les sessions X pour que les modifications prennent effet avant de démarrer Vidalia.
 .
 Pour plus d'informations, veuillez consulter le fichier /usr/share/doc/vidalia/README.Debian.gz.
";
$elem["vidalia/users"]["default"]="";
PKG_OptionPageTail2($elem);
?>
