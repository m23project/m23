<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wims");

$elem["wims/reconfigure-webserver"]["type"]="multiselect";
$elem["wims/reconfigure-webserver"]["choices"][1]="apache";
$elem["wims/reconfigure-webserver"]["choices"][2]="apache2";
$elem["wims/reconfigure-webserver"]["choices"][3]="apache-ssl";
$elem["wims/reconfigure-webserver"]["description"]="List of web servers to reconfigure automatically:
 Wims supports Apache, Apache2, Apache-SSL and Apache-Perl.
";
$elem["wims/reconfigure-webserver"]["descriptionde"]="Liste von Webservern, die automatisch rekonfiguriert werden sollen:
 Wims unterstützt Apache, Apache2, Apache-SSL und Apache-Perl.
";
$elem["wims/reconfigure-webserver"]["descriptionfr"]="Serveurs web à reconfigurer automatiquement :
 Wims gère Apache, Apache2, Apache-SSL et Apache-Perl.
";
$elem["wims/reconfigure-webserver"]["default"]="apache2";
PKG_OptionPageTail2($elem);
?>
