<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("powerline");

$elem["powerline/title"]["type"]="title";
$elem["powerline/title"]["description"]="powerline: Setup
";
$elem["powerline/title"]["descriptionde"]="Einrichtung
";
$elem["powerline/title"]["descriptionfr"]="configuration
";
$elem["powerline/title"]["default"]="";
$elem["powerline/enable"]["type"]="multiselect";
$elem["powerline/enable"]["description"]="Enable powerline globally?
 powerline can be enabled globally for all users of certain applications on this system.
";
$elem["powerline/enable"]["descriptionde"]="Soll powerline systemweit eingeschaltet werden?
 powerline kann für alle Benutzer bestimmter Programme auf diesem Systems eingeschaltet werden.
";
$elem["powerline/enable"]["descriptionfr"]="Faut-il activer globalement powerline ?
 powerline peut être activé globalement pour l'ensemble des utilisateurs de certaines applications de ce système.
";
$elem["powerline/enable"]["default"]="Default:";
PKG_OptionPageTail2($elem);
?>
