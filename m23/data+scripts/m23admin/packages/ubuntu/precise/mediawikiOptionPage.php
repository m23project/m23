<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mediawiki");

$elem["mediawiki/webserver"]["type"]="multiselect";
$elem["mediawiki/webserver"]["choices"][1]="apache";
$elem["mediawiki/webserver"]["choices"][2]="apache-ssl";
$elem["mediawiki/webserver"]["choices"][3]="apache2";
$elem["mediawiki/webserver"]["description"]="Web server(s) to configure automatically:
 Please select the web server(s) that should be configured
 automatically for MediaWiki.
";
$elem["mediawiki/webserver"]["descriptionde"]="Web-Server, der/die automatisch konfiguriert werden soll(en):
 Bitte wählen Sie den/die Webserver, die automatisch für MediaWiki konfiguriert werden sollen.
";
$elem["mediawiki/webserver"]["descriptionfr"]="Serveur(s) web à configurer automatiquement :
 Veuillez choisir le(s) serveur(s) web à configurer automatiquement pour MediaWiki.
";
$elem["mediawiki/webserver"]["default"]="apache2";
PKG_OptionPageTail2($elem);
?>
