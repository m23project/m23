<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cpufrequtils");

$elem["cpufrequtils/enable"]["type"]="boolean";
$elem["cpufrequtils/enable"]["description"]="Enable cpufreq governor at install time?
 This is an internal (hidden) debconf question.  It should not be translated.

";
$elem["cpufrequtils/enable"]["descriptionde"]="";
$elem["cpufrequtils/enable"]["descriptionfr"]="";
$elem["cpufrequtils/enable"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
