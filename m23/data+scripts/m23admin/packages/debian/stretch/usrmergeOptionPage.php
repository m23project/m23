<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("usrmerge");

$elem["usrmerge/title"]["type"]="title";
$elem["usrmerge/title"]["description"]="Automatic conversion to merged /usr
";
$elem["usrmerge/title"]["descriptionde"]="Automatische Umwandlung in zusammengeführtes /usr
";
$elem["usrmerge/title"]["descriptionfr"]="Conversion automatique vers /usr fusionné
";
$elem["usrmerge/title"]["default"]="";
$elem["usrmerge/autoconvert"]["type"]="boolean";
$elem["usrmerge/autoconvert"]["description"]="Do you want to convert this system to the merged /usr directories scheme?
 The usrmerge package will automatically convert the system to the merged
 /usr directory scheme, in which the /{bin,sbin,lib}/ directories are
 symlinked to their counterparts in /usr/.
 .
 There is no automatic method to restore the precedent configuration, so
 there is no going back once the conversion has been started.
";
$elem["usrmerge/autoconvert"]["descriptionde"]="Möchten Sie dieses System in das zusammengeführte /usr-Verzeichnisschema umwandeln?
 Das Pakete Usrmerge wird das System automatisch in das zusammengeführte /usr-Verzeichnisschema umwandeln, in dem die /{bin,sbin,lib}/-Verzeichnisse über symbolische Verweise mit ihren Gegenstücken in /usr/ verknüpft sind.
 .
 Es gibt keine Methode, die vorherige Konfiguration automatisch wiederherzustellen, daher gibt es keinen Weg zurück, sobald die Umwandlung einmal gestartet wurde.
";
$elem["usrmerge/autoconvert"]["descriptionfr"]="Convertir ce système vers le schéma de répertoires « /usr fusionné » ?
 Le paquet usrmerge va convertir automatiquement le système vers le schéma de répertoire « /usr fusionné » où les répertoires /{bin,sbin,lib} sont liés symboliquement à leur contrepartie dans /usr.
 .
 Il n'existe pas de méthode automatique pour restaurer la configuration précédente, par conséquent cette action est irréversible.
";
$elem["usrmerge/autoconvert"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
