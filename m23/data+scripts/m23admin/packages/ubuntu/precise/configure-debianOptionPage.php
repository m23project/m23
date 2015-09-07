<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("configure-debian");

$elem["configure-debian/packages_subsection"]["type"]="select";
$elem["configure-debian/packages_subsection"]["description"]="Which subsection do you want?
";
$elem["configure-debian/packages_subsection"]["descriptionde"]="Welchen Unterabschnitt möchten Sie?
";
$elem["configure-debian/packages_subsection"]["descriptionfr"]="Quelle sous-section voulez-vous ?
";
$elem["configure-debian/packages_subsection"]["default"]="";
$elem["configure-debian/packages_program"]["type"]="select";
$elem["configure-debian/packages_program"]["description"]="Which program do you want to configure?
";
$elem["configure-debian/packages_program"]["descriptionde"]="Welches Programm möchten Sie konfigurieren?
";
$elem["configure-debian/packages_program"]["descriptionfr"]="Quel programme voulez-vous configurer ?
";
$elem["configure-debian/packages_program"]["default"]="";
$elem["configure-debian/packages_another"]["type"]="boolean";
$elem["configure-debian/packages_another"]["description"]="Would you like to configure another program?
";
$elem["configure-debian/packages_another"]["descriptionde"]="Möchten Sie noch ein anderes Programm konfigurieren?
";
$elem["configure-debian/packages_another"]["descriptionfr"]="Voulez-vous configurer un autre programme ?
";
$elem["configure-debian/packages_another"]["default"]="";
$elem["configure-debian/title"]["type"]="title";
$elem["configure-debian/title"]["description"]="Configure Packages
";
$elem["configure-debian/title"]["descriptionde"]="Pakete konfigurieren
";
$elem["configure-debian/title"]["descriptionfr"]="Configuration des paquets
";
$elem["configure-debian/title"]["default"]="";
PKG_OptionPageTail2($elem);
?>
