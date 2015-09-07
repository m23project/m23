<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gitolite");

$elem["gitolite/gituser"]["type"]="string";
$elem["gitolite/gituser"]["description"]="System username for gitolite:
 Please enter the name for the system user which should be used by
 gitolite to access repositories. It will be created if necessary.
";
$elem["gitolite/gituser"]["descriptionde"]="Name des Systemnutzers für gitolite:
 Bitte geben Sie einen Namen für den Systemnutzer ein, der von gitolite verwendet werden soll, um auf die Repositorys zuzugreifen. Er wird falls notwendig erstellt.
";
$elem["gitolite/gituser"]["descriptionfr"]="Identifiant système à utiliser pour gitolite :
 Veuillez indiquer l'identifiant système à utiliser pour l'accès aux dépôts avec gitolite. Il sera créé s'il n'existe pas déjà.
";
$elem["gitolite/gituser"]["default"]="gitolite";
$elem["gitolite/gitdir"]["type"]="string";
$elem["gitolite/gitdir"]["description"]="Repository path:
 Please enter the path in which gitolite should store the repositories.
 This will become the gitolite system user's home directory.
";
$elem["gitolite/gitdir"]["descriptionde"]="Repository-Pfad:
 Bitte geben Sie den Pfad ein, in dem gitolite die Repositorys speichern soll. Dies wird zum Heimatverzeichnis des Systemnutzers.
";
$elem["gitolite/gitdir"]["descriptionfr"]="Chemin d'accès au dépôt :
 Veuillez indiquer le répertoire dans lequel gitolite stockera les dépôts. Ce répertoire sera également le répertoire de base de l'identifiant système utilisé.
";
$elem["gitolite/gitdir"]["default"]="/var/lib/gitolite";
$elem["gitolite/adminkey"]["type"]="string";
$elem["gitolite/adminkey"]["description"]="Administrator's SSH key:
 Please specify the key of the user that will administer the access
 configuration of gitolite.
 .
 This can be either the SSH public key itself, or the path to a file
 containing it. If it is blank, gitolite will be left unconfigured and
 must be set up manually.
";
$elem["gitolite/adminkey"]["descriptionde"]="SSH-Schlüssel des Administrators:
 Bitte geben Sie den Schlüssel eines Nutzers an, der die Zugriffskonfiguration von gitolite administrieren wird.
 .
 Dies kann entweder der öffentliche SSH-Schlüssel selbst sein oder aber der Pfad zu einer Datei, die ihn enthält. Falls dies leer gelassen wird, bleibt gitolite unkonfiguriert und muss manuell aufgesetzt werden.
";
$elem["gitolite/adminkey"]["descriptionfr"]="Clé SSH de l'administrateur :
 Veuillez indiquer la clé de l'utilisateur qui gérera les autorisations d'accès à gitolite.
 .
 Vous pouvez indiquer la clé publique SSH elle-même ou le nom du fichier qui la contient. Si ce champ est laissé vide, gitolite ne sera pas configuré et devra l'être manuellement plus tard.
";
$elem["gitolite/adminkey"]["default"]="";
PKG_OptionPageTail2($elem);
?>
