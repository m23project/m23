<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("freedombox");

$elem["plinth/firstboot_wizard_secret"]["type"]="note";
$elem["plinth/firstboot_wizard_secret"]["description"]="FreedomBox first wizard secret - ${secret}
 Please note down the above secret. You will be asked to enter this in the
 first screen after you launch the FreedomBox web interface. In case you lose
 it, you can retrieve it by running the following command:
 .
 $ sudo cat /var/lib/plinth/firstboot-wizard-secret
";
$elem["plinth/firstboot_wizard_secret"]["descriptionde"]="Passphrase des Ersteinrichtungsprogramms der FreedomBox - ${secret}
 Bitte schreiben Sie diese geheime Zeichenkette auf. Sie werden auf dem ersten Bildschirm nach dem Start der FreedomBox-Schnittstelle nach dieser Zeichenkette gefragt werden. Falls Sie sie verlieren, können Sie sie durch Ausführung des folgenden Befehls wiedererlangen:
 .
 $ sudo cat /var/lib/plinth/firstboot-wizard-secret
";
$elem["plinth/firstboot_wizard_secret"]["descriptionfr"]="Phrase secrète du premier assistant de FreedomBox - ${secret}
 Veuillez noter cette phrase secrète. Le premier écran après le chargement de l'interface web de FreedomBox vous la demandera. Si vous l'avez oubliée, vous pourrez la récupérer en exécutant la commande suivante :
 .
 $ sudo cat /var/lib/plinth/firstboot-wizard-secret
";
$elem["plinth/firstboot_wizard_secret"]["default"]="";
PKG_OptionPageTail2($elem);
?>
