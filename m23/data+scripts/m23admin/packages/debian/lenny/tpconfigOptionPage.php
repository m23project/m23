<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tpconfig");

$elem["tpconfig/overwrite-config-file"]["type"]="boolean";
$elem["tpconfig/overwrite-config-file"]["description"]="Manage tpconfig configuration file with debconf?
 The tpconfig configuration file, \"/etc/default/tpconfig\", can be handled
 automatically by debconf, or manually by you.
";
$elem["tpconfig/overwrite-config-file"]["descriptionde"]="Konfigurationsdatei von tpconfig mit Hilfe von debconf erstellen?
 Die tpconfig-Konfigurationsdatei »/etc/default/tpconfig« kann entweder automatisch von debconf erstellt werden oder manuell von Ihnen.
";
$elem["tpconfig/overwrite-config-file"]["descriptionfr"]="Faut-il gérer le fichier de configuration de tpconfig avec debconf ?
 Le fichier de configuration de tpconfig, « /etc/default/tpconfig » peut être automatiquement géré par debconf ou bien par vous-même.
";
$elem["tpconfig/overwrite-config-file"]["default"]="true";
$elem["tpconfig/reset_p"]["type"]="boolean";
$elem["tpconfig/reset_p"]["description"]="Reset the touchpad when booting?
 Some machines do not reset the touchpad hardware when they are booted
 and/or resumed.  On these machines, it is necessary to manually reset the
 touchpad.  Accept here to do a manual reset when the system is started or
 resumed.  Refuse if you don't want this.
";
$elem["tpconfig/reset_p"]["descriptionde"]="Soll das Touchpad beim Booten zurückgesetzt werden?
 Einige Rechner führen beim Hochfahren und/oder Aufwachen keinen Reset auf die Touchpad-Hardware aus. Bei diesen Rechnern ist es daher notwendig das Touchpad manuell zurückzusetzen. Stimmen Sie hier zu, wenn Sie beim Starten oder Aufwecken des Systems einen manuellen Reset auslösen möchten. Lehnen Sie ab, wenn Sie dies nicht möchten.
";
$elem["tpconfig/reset_p"]["descriptionfr"]="Faut-il initialiser le pavé tactile lors du démarrage ?
 Certaines machines ne réinitialisent pas le pavé tactile (« touchpad ») lors de la mise en route ou de la reprise. Sur ces machines, une réinitialisation manuelle du pavé tactile est nécessaire. Acceptez ici pour procéder à une réinitialisation manuelle lorsque le système est démarré ou relancé. Refusez si vous ne le souhaitez pas.
";
$elem["tpconfig/reset_p"]["default"]="false";
$elem["tpconfig/options"]["type"]="string";
$elem["tpconfig/options"]["description"]="Options to pass to tpconfig when booting:
 Specify any command-line options you want passed to tpconfig at boot or
 resume time.  (Note that if you specified above that the touchpad is to be
 reset, then it will be reset first, and then any options specified here
 done after.)  For example, one common option is \"--tapmode=0\", which tells
 the touchpad to disable \"tapping\", to prevent spurious mouse events being
 caused by accidentally brushing against the touchpad.
";
$elem["tpconfig/options"]["descriptionde"]="Welche Optionen sollen beim Booten an tpconfig übergeben werden:
 Geben Sie hier die Kommandozeilen-Optionen an, die beim Booten oder beim Aufwecken an tpconfig übergeben werden sollen. (Beachten Sie, dass wenn Sie vorher angegeben haben, dass das Touchpad zurückgesetzt werden soll, dann wird das Touchpad zuerst zurückgesetzt und danach werden die hier angegebenen Optionen ausgeführt) Zum Beispiel: Eine Kommandozeilen-Option ist »--tapmode=0«. Damit schaltet das Touchpad die »tapping«-Funktion ab, welche zufällige Mausbewegungen, verursacht durch Streifen des Touchpads, verhindert.
";
$elem["tpconfig/options"]["descriptionfr"]="Options à passer à tpconfig lors du démarrage :
 Vous pouvez indiquer toutes les options de ligne de commande que vous souhaitez passer à tpconfig lors du démarrage ou de la reprise (les options seront passées après la réinitialisation du pavé tactile si celle-ci est effectuée). Par exemple, une option courante est « --tapmode=0 », qui demande au pavé tactile de désactiver le « tapotement », afin d'éviter que des événements inattendus ne soient déclenchés par un frôlement accidentel du pavé tactile.
";
$elem["tpconfig/options"]["default"]="";
PKG_OptionPageTail2($elem);
?>
