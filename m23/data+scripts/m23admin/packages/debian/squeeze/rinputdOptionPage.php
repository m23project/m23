<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("rinputd");

$elem["rinputd/username"]["type"]="string";
$elem["rinputd/username"]["description"]="Remote input username:
 Please enter a username for the remote input login.
 .
 This account will not be created as a local user with shell access.
 Instead it will allow control of the keyboard and mouse through the
 remote input daemon.
";
$elem["rinputd/username"]["descriptionde"]="Ferner Eingabebenutzername:
 Bitte geben Sie einen Benutzernamen für die Eingabeanmeldung aus der Ferne ein.
 .
 Dieses Konto wird nicht als lokaler Benutzer mit Shell-Zugriff angelegt. Stattdessen wird es die Steuerung von Tastatur und Maus durch den Eingabe-Daemon aus der Ferne erlauben.
";
$elem["rinputd/username"]["descriptionfr"]="Identifiant de rinputd :
 Veuillez indiquer un identifiant pour l'accès distant via rinputd.
 .
 Ce compte ne sera pas créé comme un utilisateur local avec un accès au shell. Il permettra au contraire de contrôler le clavier et la souris grâce au démon d'accès distant rinputd.
";
$elem["rinputd/username"]["default"]="rinput";
$elem["rinputd/passwd"]["type"]="password";
$elem["rinputd/passwd"]["description"]="Remote input password:
 Please enter a password for the remote input login.
";
$elem["rinputd/passwd"]["descriptionde"]="Fernes Eingabepasswort:
 Bitte geben Sie ein Passwort für die Eingabeanmeldung aus der Ferne ein.
";
$elem["rinputd/passwd"]["descriptionfr"]="Mot de passe pour rinputd :
 Veuillez indiquer un mot de passe pour l'accès distant via rinputd.
";
$elem["rinputd/passwd"]["default"]="";
$elem["rinputd/invalid"]["type"]="error";
$elem["rinputd/invalid"]["description"]="Invalid username or password
 Neither the remote input username nor the password can be empty.
 Please correct them.
";
$elem["rinputd/invalid"]["descriptionde"]="Ungültiger Benutzername oder Passwort
 Weder der ferne Benutzername noch das Passwort können leer sein. Bitte korrigieren Sie dies.
";
$elem["rinputd/invalid"]["descriptionfr"]="Identifiant ou mot de passe invalide
 Ni l'identifiant ni le mot de passe ne peuvent être vide. Veuillez les corriger.
";
$elem["rinputd/invalid"]["default"]="";
PKG_OptionPageTail2($elem);
?>
