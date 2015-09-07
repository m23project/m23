<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cdebconf");

$elem["cdebconf/frontend"]["type"]="select";
$elem["cdebconf/frontend"]["choices"][1]="${echoices}";
$elem["cdebconf/frontend"]["description"]="Interface to use:
 Packages that use debconf for configuration share a common look and feel.
 You can select the type of user interface they use.
 .
 ${descriptions}
 None: You will never be asked any question.

";
$elem["cdebconf/frontend"]["descriptionde"]="";
$elem["cdebconf/frontend"]["descriptionfr"]="";
$elem["cdebconf/frontend"]["default"]="";
$elem["cdebconf/frontend/text"]["type"]="string";
$elem["cdebconf/frontend/text"]["description"]="Text
 Traditional plain text interface.

";
$elem["cdebconf/frontend/text"]["descriptionde"]="";
$elem["cdebconf/frontend/text"]["descriptionfr"]="";
$elem["cdebconf/frontend/text"]["default"]="";
$elem["cdebconf/frontend/newt"]["type"]="string";
$elem["cdebconf/frontend/newt"]["description"]="Newt
 Full-screen, character based interface.
";
$elem["cdebconf/frontend/newt"]["descriptionde"]="";
$elem["cdebconf/frontend/newt"]["descriptionfr"]="";
$elem["cdebconf/frontend/newt"]["default"]="";
PKG_OptionPageTail2($elem);
?>
