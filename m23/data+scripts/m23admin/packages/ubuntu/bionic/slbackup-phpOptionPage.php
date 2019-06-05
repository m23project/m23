<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("slbackup-php");

$elem["slbackup-php/use-ssl"]["type"]="boolean";
$elem["slbackup-php/use-ssl"]["description"]="Activate SSL support in slbackup-php?
 Please note that SSL is needed to connect to the slbackup-php server.
 Activating it is therefore strongly recommended.
 . 
 However, SSL should also be activated in the web server which will not
 be done by choosing this option.
";
$elem["slbackup-php/use-ssl"]["descriptionde"]="SSL-Unterstützung in Slbackup-php aktivieren?
 Bitte beachten Sie, dass SSL zur Verbindung mit dem Slbackup-php-Server benötigt wird. Es wird daher nachdrücklich empfohlen, dieses zu aktivieren.
 .
 Allerdings sollte SSL auch in dem Webserver aktiviert werden. Dies erfolgt nicht durch Auswahl dieser Option.
";
$elem["slbackup-php/use-ssl"]["descriptionfr"]="Activer la gestion de SSL pour « slbackup-php » ?
 Veuillez noter que SSL est nécessaire pour se connecter au serveur « slbackup-php ».Son activation est donc fortement recommandée.
 .
 Cependant, SSL devrait également être activé sur le serveur Web, ce qui ne sera pas fait même en choisissant cette option.
";
$elem["slbackup-php/use-ssl"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
