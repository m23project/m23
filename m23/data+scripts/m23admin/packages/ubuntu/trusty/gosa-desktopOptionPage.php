<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gosa-desktop");

$elem["gosa-desktop/url"]["type"]="string";
$elem["gosa-desktop/url"]["description"]="URL to your GOsa installation:
 The gosa start script can automatically point your
 browser to a system wide default location of your
 GOsa instance.
 .
 Enter the URL in order to set this default.
";
$elem["gosa-desktop/url"]["descriptionde"]="URL zu Ihrer GOsa-Installation:
 Das GOsa Start-Skript kann den Browser automatisch auf ihre systemweite Standard GOsa-Installation einstellen.
 .
 Geben Sie die URL der Standard-Installation an.
";
$elem["gosa-desktop/url"]["descriptionfr"]="URL vers votre installation de GOsa
 Le script de démarrage permet de configurer votre navigateur pour aller directement à votre GOsa.
 .
 Veuillez entrer l'url pour activer cette fonctionnalité.
";
$elem["gosa-desktop/url"]["default"]="https://www.gosa-project.org/demo/trunk";
PKG_OptionPageTail2($elem);
?>
