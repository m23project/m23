<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fookebox");

$elem["fookebox/remove_database"]["type"]="boolean";
$elem["fookebox/remove_database"]["description"]="Remove old fookebox database?
 Previous versions of fookebox used a database to store schedule information. This
 database is no longer used and can be safely removed.
";
$elem["fookebox/remove_database"]["descriptionde"]="Alte fookebox-Datenbank entfernen?
 Frühere Versionen von fookebox haben Programminformationen in einer Datenbank gespeichert.Diese Datenbank wird nicht mehr verwendet und kann ohne Bedenken entfernt werden.
";
$elem["fookebox/remove_database"]["descriptionfr"]="";
$elem["fookebox/remove_database"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
