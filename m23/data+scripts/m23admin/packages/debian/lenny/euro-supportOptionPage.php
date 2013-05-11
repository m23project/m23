<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("euro-support");

$elem["euro-support/configuring"]["type"]="note";
$elem["euro-support/configuring"]["description"]="Euro-support does not configure your system
 Euro-support currently provides the \"Debian Euro Manual\" (at
 /usr/share/doc/euro-support) and a program to test if the system is
 properly configured (euro-test). In order to configure your system to use
 and represent the Euro symbol you have to take the steps described in the
 accompanying documentation.
";
$elem["euro-support/configuring"]["descriptionde"]="Euro-support konfiguriert nicht Ihr System
 Euro-Support besteht zur Zeit aus dem \"Debian Euro Manual\" (unter /usr/share/doc/euro-support) und einem Test-Programm (euro-test), das feststellt, ob Ihr System richtig konfiguriert ist. Damit Sie das Euro-Symbol verwenden und darstellen können, müssen Sie verschiedene Schritte unternehmen, die in der aufgeführten Dokumentation beschrieben sind.
";
$elem["euro-support/configuring"]["descriptionfr"]="Euro-support ne configure pas votre système
 Le paquet euro-support contient un manuel intitulé « Debian et l'euro » (dans /usr/share/doc/euro-support, en anglais) et un programme (euro-test) pour vérifier que le système est correctement configuré. Il est nécessaire de suivre les étapes décrites dans la documentation afin de configurer votre système pour représenter le symbole euro.
";
$elem["euro-support/configuring"]["default"]="";
PKG_OptionPageTail2($elem);
?>
