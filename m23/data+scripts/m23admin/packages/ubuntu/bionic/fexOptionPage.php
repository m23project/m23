<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fex");

$elem["fex/lastver"]["type"]="string";
$elem["fex/lastver"]["description"]="Last installed version for internal use
 To upgrade the htdocs dir postinst needs to know the last installed 
 version and verify its htdocs contents to the internal database
 and make sure only unaltered files are overwritten.
";
$elem["fex/lastver"]["descriptionde"]="";
$elem["fex/lastver"]["descriptionfr"]="";
$elem["fex/lastver"]["default"]="0";
PKG_OptionPageTail2($elem);
?>
