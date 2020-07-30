<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mgetty-fax");

$elem["mgetty-fax/start_faxrunqd"]["type"]="boolean";
$elem["mgetty-fax/start_faxrunqd"]["description"]="Run faxrunqd during system startup?
 The mgetty-fax package contains a daemon (\"faxrunqd\") that can
 automatically take in charge the sending of the faxes spooled with
 faxspool. This daemon and the faxrunq utility need
 /etc/mgetty/faxrunq.config to be configured appropriately in order to run.
 If you plan to use faxrunqd, please indicate so.
";
$elem["mgetty-fax/start_faxrunqd"]["descriptionde"]="faxrunqd während des Systemstarts starten?
 Das mgetty-fax Paket enthält ein Systemprogramm (\"faxrunqd\"), das automatisch Faxe versenden kann, die mit faxspool zum Senden vorgemerkt werden. Damit Faxen mit diesem oder faxrunq versendet werden können, muß /etc/mgetty/faxrunq.config angepasst werden. Bitte geben Sie an, ob faxrunqd verwendet werden soll.
";
$elem["mgetty-fax/start_faxrunqd"]["descriptionfr"]="Souhaitez-vous lancer faxrunqd au démarrage du système ?
 Le paquet mgetty-fax contient un démon (« faxrunqd ») qui prend en charge automatiquement l'envoi des fax avec faxspool. Ce démon et l'utilitaire faxrunq ont besoin que le fichier /etc/mgetty/faxrunq.config soit correctement configuré. Veuillez indiquer si vous souhaitez utiliser faxrunqd.
";
$elem["mgetty-fax/start_faxrunqd"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
