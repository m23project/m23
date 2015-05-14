<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tunapie");

$elem["tunapie/uncensored_streams"]["type"]="boolean";
$elem["tunapie/uncensored_streams"]["description"]="Do you wish to view uncensored video streams from Shoutcast?
 Some Shoutcast video streams contain adult content. If you select this option,
 adult content will be displayed by tunapie.
";
$elem["tunapie/uncensored_streams"]["descriptionde"]="Möchten Sie unzensierte Video-Streams von Shoutcast sehen?
 Einige Video-Streams von Shoutcast enthalten nicht-jugendfreies Material. Falls Sie diese Option auswählen, wird das nicht-jugendfreie Material von Tunapie angezeigt.
";
$elem["tunapie/uncensored_streams"]["descriptionfr"]="Faut-il autoriser, sans les censurer, les flux vidéo Shoutcast ?
 Certains flux vidéo Shoutcast contiennent du contenu réservé aux adultes. Si vous choisissez cette option, ce type de contenu ne sera pas filtré par tunapie.
";
$elem["tunapie/uncensored_streams"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
