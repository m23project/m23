<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nagios3-cgi");

$elem["nagios3/adminpassword"]["type"]="password";
$elem["nagios3/adminpassword"]["description"]="Nagios web administration password:
 Please provide the password to be created with the \"nagiosadmin\" user.
 .
 This is the username and password you will use to log in to your nagios
 installation after configuration is complete.  If you do not provide
 a password, you will have to configure access to nagios yourself.
";
$elem["nagios3/adminpassword"]["descriptionde"]="Passwort für die Web-Administration von nagios:
 Bitte geben Sie das Passwort ein, das für den »nagiosadmin«-Benutzer festgelegt werden soll.
 .
 Dies sind Benutzername und Passwort, die Sie verwenden werden, sich bei Ihrer nagios-Installation anzumelden, nachdem deren Einrichtung beendet ist. Falls Sie kein Passwort eingeben, werden Sie den Zugang zu nagios selbst einrichten müssen.
";
$elem["nagios3/adminpassword"]["descriptionfr"]="Mot de passe pour l'administration web de Nagios :
 Veuillez fournir le mot de passe à utiliser avec l'utilisateur « nagiosadmin ».
 .
 Il s'agit du nom d'utilisateur et du mot de passe que vous utiliserez pour vous connecter à Nagios une fois que l'installation est terminée. Si vous ne fournissez pas de mot de passe, vous devrez configurer Nagios vous-même afin d'y accéder.
";
$elem["nagios3/adminpassword"]["default"]="";
$elem["nagios3/adminpassword-repeat"]["type"]="password";
$elem["nagios3/adminpassword-repeat"]["description"]="Password confirmation:
";
$elem["nagios3/adminpassword-repeat"]["descriptionde"]="Passwortbestätigung:
";
$elem["nagios3/adminpassword-repeat"]["descriptionfr"]="Confirmation du mot de passe :
";
$elem["nagios3/adminpassword-repeat"]["default"]="";
$elem["nagios3/adminpassword-mismatch"]["type"]="note";
$elem["nagios3/adminpassword-mismatch"]["description"]="The passwords do not match
";
$elem["nagios3/adminpassword-mismatch"]["descriptionde"]="Die Passwörter stimmen nicht überein.
";
$elem["nagios3/adminpassword-mismatch"]["descriptionfr"]="Mots de passe différents
";
$elem["nagios3/adminpassword-mismatch"]["default"]="";
PKG_OptionPageTail2($elem);
?>
