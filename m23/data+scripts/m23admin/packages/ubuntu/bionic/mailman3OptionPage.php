<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mailman3");

$elem["mailman3/config_hyperkitty"]["type"]="boolean";
$elem["mailman3/config_hyperkitty"]["description"]="Add the HyperKitty configuration to mailman.cfg?
 Mailman3 needs additional configuration in mailman.cfg in order to send
 messages to the HyperKitty archiver. This configuration can be added
 automatically now.
 .
 The content of /usr/share/mailman3/mailman_cfg_hyperkitty_snippet.cfg
 will be added to /etc/mailman3/mailman.cfg.
";
$elem["mailman3/config_hyperkitty"]["descriptionde"]="HyperKitty-Konfiguration zur mailman.cfg hinzufügen?
 Mailman3 benötigt zusätzliche Konfiguration in mailman.cfg, um Nachrichten an das HyperKitty-Archvierungsprogramm zu senden. Diese Konfiguration kann nun automatisch hinzugefügt werden.
 .
 Der Inhalt von /usr/share/mailman3/mailman_cfg_hyperkitty_snippet.cfg wird zu /etc/mailman3/mailman.cfg hinzugefügt.

";
$elem["mailman3/config_hyperkitty"]["descriptionfr"]="";
$elem["mailman3/config_hyperkitty"]["default"]="";
$elem["mailman3/init_service_failed"]["type"]="error";
$elem["mailman3/init_service_failed"]["description"]="The service for mailman3 failed!
 The mailman3 service didn't start correctly. This is probably because
 you didn't configure the database appropriately. The service won't work
 until you do so.
 .
 If you actually DID install the database appropriately, please report
 the bug to the maintainers of the mailman3 package.
";
$elem["mailman3/init_service_failed"]["descriptionde"]="Der Dienst für Mailman3 schlug fehl.
 Der Mailman3-Dienst startete nicht korrekt. Dies liegt wahrscheinlich daran, dass Sie die Datenbank nicht entsprechend konfiguriert haben. Der Dienst wird nicht funktionieren, bis Sie dies getan haben.
 .
 Falls Sie die Datenbank entsprechend konfiguriert HABEN, senden Sie bitte einen Fehlerbericht auf Englisch an die Betreuer des Mailman3-Pakets.
";
$elem["mailman3/init_service_failed"]["descriptionfr"]="";
$elem["mailman3/init_service_failed"]["default"]="";
PKG_OptionPageTail2($elem);
?>
