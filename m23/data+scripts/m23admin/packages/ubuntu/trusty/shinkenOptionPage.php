<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("shinken");

$elem["shinken/instructions"]["type"]="note";
$elem["shinken/instructions"]["description"]="To access to Shinken
 * Address: http://127.0.0.1:7767
 * Username: admin
 * Password: admin
";
$elem["shinken/instructions"]["descriptionde"]="";
$elem["shinken/instructions"]["descriptionfr"]="";
$elem["shinken/instructions"]["default"]="";
PKG_OptionPageTail2($elem);
?>
