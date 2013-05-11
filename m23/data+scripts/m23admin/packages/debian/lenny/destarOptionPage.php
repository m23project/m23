<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("destar");

$elem["destar/port"]["type"]="string";
$elem["destar/port"]["description"]="DeStar listening port number:
 In which port the web interface must listen on.
";
$elem["destar/port"]["descriptionde"]="Portnummer von DeStar:
 Auf welchem Port die Webschnittstelle auf Anfragen warten muss.
";
$elem["destar/port"]["descriptionfr"]="Port d'écoute de DeStar :
 Veuillez indiquer le numéro du port sur lequel DeStar sera à l'écoute.
";
$elem["destar/port"]["default"]="8080";
PKG_OptionPageTail2($elem);
?>
