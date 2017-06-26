<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openstreetmap-carto-common");

$elem["openstreetmap-carto/fetch-data"]["type"]="boolean";
$elem["openstreetmap-carto/fetch-data"]["description"]="Download OpenStreetMap data files from the Internet?
 The openstreetmap-carto stylesheet uses several data files that must
 be downloaded from the Internet. 
 .
 If you choose not to do this now, it can be done manually later
 by running the \"get-shapefiles.sh\" script in the /usr/share/openstreetmap-carto-common
 directory.
";
$elem["openstreetmap-carto/fetch-data"]["descriptionde"]="Sollen die OpenStreetMap-Dateien aus dem Internet heruntergeladen werden?
 Die Stilvorlage von OpenStreetMap-Carto verwendet mehrere Dateien, die aus dem Internet heruntergeladen werden müssen.
 .
 Falls Sie das nun nicht möchten, können Sie dies später nachholen, indem Sie das Skript »get-shapefiles.sh« im Verzeichnis »/usr/share/openstreetmap-carto-common« ausführen.
";
$elem["openstreetmap-carto/fetch-data"]["descriptionfr"]="Télécharger les fichiers de données d'OpenStreetMap depuis Internet ?
 La feuille de style openstreetmap-carto utilise plusieurs fichiers de données qui peuvent être téléchargés depuis Internet.
 .
 Si vous choisissez de ne pas le faire maintenant, vous pouvez le faire vous-même plus tard en exécutant le script « get-shapefiles.sh » dans le répertoire /usr/share/openstreetmap-carto-common.
";
$elem["openstreetmap-carto/fetch-data"]["default"]="";
PKG_OptionPageTail2($elem);
?>
