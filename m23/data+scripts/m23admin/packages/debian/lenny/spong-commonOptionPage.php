<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("spong-common");

$elem["spong-common/server_where"]["type"]="string";
$elem["spong-common/server_where"]["description"]="Host that will be your spong server: 
";
$elem["spong-common/server_where"]["descriptionde"]="Host der Ihr Spong-Server sein wird:
";
$elem["spong-common/server_where"]["descriptionfr"]="Hôte qui servira de serveur spong :
";
$elem["spong-common/server_where"]["default"]="";
PKG_OptionPageTail2($elem);
?>
