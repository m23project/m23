<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("apt-dater-host");

$elem["apt-dater-host/assume_yes"]["type"]="boolean";
$elem["apt-dater-host/assume_yes"]["description"]="Enable automatic upgrades?
 If you disable this option, you have to acknowledge every upgrade
 process for all hosts. The pro of it would be, that you will be
 aware of every action apt wants to do. The con is, that you have to
 attach every host on multiple upgrades and acknowledge every single
 host.
";
$elem["apt-dater-host/assume_yes"]["descriptionde"]="Automatische Upgrades einschalten?
 Falls Sie diese Option abwählen, müssen Sie für alle Server jeden Upgrade-Prozess bestätigen. Der Vorteil davon ist, dass Sie jede Aktivität von Apt wahrnehmen. Der Nachteil ist, dass Sie sich im Falle von mehreren aufeinanderfolgenden Upgrades jedes Mal mit jedem Rechner verbinden und auf jedem Rechner einzeln das Upgrade bestätigen müssen.
";
$elem["apt-dater-host/assume_yes"]["descriptionfr"]="Faut-il activer les mises à jour automatiques ?
 Si vous refusez cette option, vous devrez confirmer chaque mise à jour pour chaque machine. L'avantage est de pouvoir prendre connaissance à l'avance des actions prévues par APT. L'inconvénient est de devoir se connecter à chaque machine pour confirmer chaque série de mises à jour nécessaires.
";
$elem["apt-dater-host/assume_yes"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
