<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("evqueue-core");

$elem["evqueue-core/hostname"]["type"]="string";
$elem["evqueue-core/hostname"]["description"]="MySQL hostname:
 Hostame of the MySQL server that will contain evQueue database.
";
$elem["evqueue-core/hostname"]["descriptionde"]="MySQL-Rechnername:
 Rechnername des MySQL-Servers, der die evQueue-Datenbank enthalten wird
";
$elem["evqueue-core/hostname"]["descriptionfr"]="Nom d'hôte MySQL :
 Nom d'hôte du serveur MySQL qui contiendra la base de données evQueue.
";
$elem["evqueue-core/hostname"]["default"]="";
$elem["evqueue-core/user"]["type"]="string";
$elem["evqueue-core/user"]["description"]="MySQL user:
 User used to connect to MySQL server.
";
$elem["evqueue-core/user"]["descriptionde"]="MySQL-Benutzer:
 Benutzer, der zum Verbinden mit dem MySQL-Server benutzt wird
";
$elem["evqueue-core/user"]["descriptionfr"]="Identifiant Mysql :
 Identifiant utilisé pour se connecter à MySQL.
";
$elem["evqueue-core/user"]["default"]="";
$elem["evqueue-core/password"]["type"]="string";
$elem["evqueue-core/password"]["description"]="MySQL password:
 User used to connect to MySQL server.
";
$elem["evqueue-core/password"]["descriptionde"]="MySQL-Passwort:
 Benutzer, der zum Verbinden mit dem MySQL-Server benutzt wird
";
$elem["evqueue-core/password"]["descriptionfr"]="Mot de passe MySQL :
 Identifiant utilisé pour se connecter à MySQL.
";
$elem["evqueue-core/password"]["default"]="";
$elem["evqueue-core/database"]["type"]="string";
$elem["evqueue-core/database"]["description"]="MySQL database name:
 Name of the evQueue database.
";
$elem["evqueue-core/database"]["descriptionde"]="MySQL-Datenbankname:
 Name der evQueue-Datenbank
";
$elem["evqueue-core/database"]["descriptionfr"]="Nom de la base de données de MySQL :
 Nom de la base de données d'evQueue.
";
$elem["evqueue-core/database"]["default"]="";
PKG_OptionPageTail2($elem);
?>
