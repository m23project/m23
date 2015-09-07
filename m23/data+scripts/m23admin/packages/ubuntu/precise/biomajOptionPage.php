<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("biomaj");

$elem["biomaj/jdk_home"]["type"]="string";
$elem["biomaj/jdk_home"]["description"]="The JDK home directory:
";
$elem["biomaj/jdk_home"]["descriptionde"]="Das JDK-Home-Verzeichnis:
";
$elem["biomaj/jdk_home"]["descriptionfr"]="Repertoire d'installation du JDK
";
$elem["biomaj/jdk_home"]["default"]="";
$elem["biomaj/mysql"]["type"]="boolean";
$elem["biomaj/mysql"]["description"]="Want to configure MySQL connection now ?
";
$elem["biomaj/mysql"]["descriptionde"]="Möchten Sie die MySQL-Verbindung nun konfigurieren?
";
$elem["biomaj/mysql"]["descriptionfr"]="Souhaitez vous configurer MySQL maintenant?
";
$elem["biomaj/mysql"]["default"]="";
$elem["biomaj/mysql_host"]["type"]="string";
$elem["biomaj/mysql_host"]["description"]="Enter MySQL server address:
";
$elem["biomaj/mysql_host"]["descriptionde"]="Geben Sie die Adresse des MySQL-Servers ein:
";
$elem["biomaj/mysql_host"]["descriptionfr"]="Nom du serveur hébergeant MySQL:
";
$elem["biomaj/mysql_host"]["default"]="";
$elem["biomaj/mysql_login"]["type"]="string";
$elem["biomaj/mysql_login"]["description"]="User login for biomaj database:
";
$elem["biomaj/mysql_login"]["descriptionde"]="Benutzeranmeldename für Biomaj-Datenbank:
";
$elem["biomaj/mysql_login"]["descriptionfr"]="Login de la base de donnée:
";
$elem["biomaj/mysql_login"]["default"]="";
$elem["biomaj/mysql_passwd"]["type"]="password";
$elem["biomaj/mysql_passwd"]["description"]="User password for biomaj database:
";
$elem["biomaj/mysql_passwd"]["descriptionde"]="Benutzerpasswort für Biomaj-Datenbank:
";
$elem["biomaj/mysql_passwd"]["descriptionfr"]="Mot de passe de la base de donnée:
";
$elem["biomaj/mysql_passwd"]["default"]="";
PKG_OptionPageTail2($elem);
?>
