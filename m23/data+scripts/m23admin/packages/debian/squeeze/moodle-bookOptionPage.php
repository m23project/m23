<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("moodle-book");

$elem["moodle-book/config_module"]["type"]="note";
$elem["moodle-book/config_module"]["description"]="Warning - Book tables not created
 You must close this dialog and let the installation
 finish. After that, you need to launch the
 following URL in your browser:
 .
 http://localhost/moodle/admin
";
$elem["moodle-book/config_module"]["descriptionde"]="Warnung - Buchtabellen nicht erstellt
 Sie müssen diesen Dialog schließen und die Installation beenden lassen. Danach müssen Sie die folgende URL in Ihrem Browser aufrufen:
 .
 http://localhost/moodle/admin
";
$elem["moodle-book/config_module"]["descriptionfr"]="Les tables du livre ne sont pas créées
 Vous devez laisser l'installation se terminer. Ensuite, vous devez vous rendre à l'URL suivante :
 .
 http://localhost/moodle/admin
";
$elem["moodle-book/config_module"]["default"]="";
PKG_OptionPageTail2($elem);
?>
