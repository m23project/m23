<?
include ('/m23/inc/packages.php');
include ('/m23/inc/capture.php');

$params = PKG_OptionPageHeader("Apache");

$layout[0]['type'] = "text";
$layout[0]['text'] = "Dies ist die Apache-Konfigurationsseite";

$layout[1]['type'] = "line";

$layout[2]['type'] = "inputline";
$layout[2]['text'] = "DocumentRoot";
$layout[2]['name'] = "documentroot";
$layout[2]['value'] = "/m23/data+scripts";

$layout[3]['type'] = "selection";
$layout[3]['name'] = "Apache-Benutzer";
$layout[3]['option0'] = "www-data";
$layout[3]['option1'] = "nobody";
$layout[3]['option2'] = "apache";

PKG_OptionPageTail($layout);
?>