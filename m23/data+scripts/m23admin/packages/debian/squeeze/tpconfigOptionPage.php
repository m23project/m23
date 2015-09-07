<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tpconfig");

$elem["tpconfig/overwrite-config-file"]["type"]="boolean";
$elem["tpconfig/overwrite-config-file"]["description"]="Manage tpconfig configuration file automatically?
 Please choose whether the tpconfig configuration file
 (/etc/default/tpconfig) should be handled automatically or manually.
";
$elem["tpconfig/overwrite-config-file"]["descriptionde"]="Konfigurationsdatei von tpconfig automatisch verwalten?
 Bitte wählen Sie aus, ob die tpconfig-Konfigurationsdatei (/etc/default/tpconfig) automatisch oder manuell bearbeitet werden soll.
";
$elem["tpconfig/overwrite-config-file"]["descriptionfr"]="Faut-il gérer le fichier de configuration automatiquement ?
 Veuillez choisir entre la gestion automatique du fichier de tpconfig (/etc/default/tpconfig) ou la gestion manuelle.
";
$elem["tpconfig/overwrite-config-file"]["default"]="true";
$elem["tpconfig/reset_p"]["type"]="boolean";
$elem["tpconfig/reset_p"]["description"]="Reset the touchpad when booting?
 Some machines do not reset the touchpad hardware when they are booted
 and/or resumed. On these machines, it is necessary to manually reset the
 touchpad.
 .
 If you choose this option, a manual reset will be performed when the
 system is started or resumed.
";
$elem["tpconfig/reset_p"]["descriptionde"]="Reset des Touchpads beim Systemstart durchführen?
 Einige Rechner führen beim System-Neustart und/oder Aufwachen (Start nach Tiefschlaf) keinen Reset auf die Touchpad-Hardware aus. Bei diesen Rechnern ist es daher notwendig, das Touchpad manuell zurückzusetzen.
 .
 Falls Sie hier zustimmen, wird beim Neustart oder Aufwachen ein manueller Reset durchgeführt.
";
$elem["tpconfig/reset_p"]["descriptionfr"]="Faut-il initialiser le pavé tactile lors du démarrage ?
 Certaines machines ne réinitialisent pas le pavé tactile (« touchpad ») lors de la mise en route ou de la reprise. Sur ces machines, une réinitialisation manuelle du pavé tactile est nécessaire.
 .
 Si vous choisisez cete option, une réinitialisation sera effectuée lors du démarrage ou de la reprise du système.
";
$elem["tpconfig/reset_p"]["default"]="false";
$elem["tpconfig/options"]["type"]="string";
$elem["tpconfig/options"]["description"]="Options to pass to tpconfig when booting:
 Please specify any command-line options you want passed to tpconfig at
 boot or resume time.
 .
 These options will be passed after the touchpad reset if you chose
 that option.
 .
 A common option is '--tapmode=0' which is meant to disable 'tapping'
 so that accidentally brushing the touchpad doesn't cause spurious mouse
 events.
";
$elem["tpconfig/options"]["descriptionde"]="Optionen, die beim Systemstart an tpconfig übergeben werden sollen:
 Bitte geben Sie hier alle Kommandozeilenoptionen an, die beim Neustart oder Aufwachen an tpconfig übergeben werden sollen.
 .
 Diese Optionen werden übergeben, nachdem der Reset durchgeführt wurde (falls Sie dem manuellen Reset zugestimmt haben).
 .
 Eine gängige Option ist »--tapmode=0«. Sie deaktiviert das »Tapping« (die Funktion des linken Mausklicks durch kurzes Antippen des Touchpads), so dass ein versehentliches Streifen des Touchpads keine unerwünschten Mausaktionen auslöst.
";
$elem["tpconfig/options"]["descriptionfr"]="Options à passer à tpconfig lors du démarrage :
 Veuillez indiquer des options éventuelles à passer à tpconfig lors du démarrage ou de la reprise du système.
 .
 Si vous choisissez d'indiquer des options ici, elles seront utilisées après la réinitialisation du pavé tactile.
 .
 Une option habituelle est «--tapmode=0» qui est employée pour désactiver le clic sur le pavé (tapotement) afin qu'un mouvement involontaire ne déclenche pas des évènements non souhaités.
";
$elem["tpconfig/options"]["default"]="";
PKG_OptionPageTail2($elem);
?>
