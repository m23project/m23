<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gitolite3");

$elem["gitolite3/gituser"]["type"]="string";
$elem["gitolite3/gituser"]["description"]="System username for gitolite:
 Please enter the name for the system user which should be used by
 gitolite to access repositories. It will be created if necessary.
";
$elem["gitolite3/gituser"]["descriptionde"]="Name des Systemnutzers für gitolite:
 Bitte geben Sie einen Namen für den Systemnutzer ein, der von gitolite verwendet werden soll, um auf die Repositorys zuzugreifen. Er wird falls notwendig erstellt.
";
$elem["gitolite3/gituser"]["descriptionfr"]="Identifiant système à utiliser pour gitolite :
 Veuillez indiquer l'identifiant système à utiliser pour l'accès aux dépôts avec gitolite. Il sera créé s'il n'existe pas déjà.
";
$elem["gitolite3/gituser"]["default"]="gitolite3";
$elem["gitolite3/gitdir"]["type"]="string";
$elem["gitolite3/gitdir"]["description"]="Repository path:
 Please enter the path in which gitolite should store the repositories.
 This will become the gitolite system user's home directory.
";
$elem["gitolite3/gitdir"]["descriptionde"]="Repository-Pfad:
 Bitte geben Sie den Pfad ein, in dem gitolite die Repositorys speichern soll. Dies wird zum Heimatverzeichnis des Systemnutzers.
";
$elem["gitolite3/gitdir"]["descriptionfr"]="Chemin d'accès au dépôt :
 Veuillez indiquer le répertoire dans lequel gitolite stockera les dépôts. Ce répertoire sera également le répertoire de base de l'identifiant système utilisé.
";
$elem["gitolite3/gitdir"]["default"]="/var/lib/gitolite3";
$elem["gitolite3/adminkey"]["type"]="string";
$elem["gitolite3/adminkey"]["description"]="Administrator's SSH key:
 Please specify the key of the user that will administer the access
 configuration of gitolite.
 .
 This can be either the SSH public key itself, or the path to a file
 containing it. If it is blank, gitolite will be left unconfigured and
 must be set up manually.
 .
 If migrating from gitolite version 2.x, leave this blank.

";
$elem["gitolite3/adminkey"]["descriptionde"]="";
$elem["gitolite3/adminkey"]["descriptionfr"]="";
$elem["gitolite3/adminkey"]["default"]="";
PKG_OptionPageTail2($elem);
?>
