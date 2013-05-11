<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cnews");

$elem["cnews/mailname"]["type"]="string";
$elem["cnews/mailname"]["description"]="Fully qualified domain name of the system:
";
$elem["cnews/mailname"]["descriptionde"]="Voll-qualifizierter Domainname des Systems:
";
$elem["cnews/mailname"]["descriptionfr"]="Nom complètement qualifié de ce serveur :
";
$elem["cnews/mailname"]["default"]="";
PKG_OptionPageTail2($elem);
?>
