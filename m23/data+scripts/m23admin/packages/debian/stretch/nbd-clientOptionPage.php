<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nbd-client");

$elem["nbd-client/no-auto-config"]["type"]="error";
$elem["nbd-client/no-auto-config"]["description"]="AUTO_GEN is set to \"n\" in /etc/nbd-client
 The /etc/nbd-client file contains a line that sets the AUTO_GEN variable
 to \"n\". This indicates that you prefer that the nbd configuration is
 not automatically generated.
 .
 Since nbd-client 1:3.14-1, the file /etc/nbd-client is no longer used
 for boot-time configuration; instead, a file /etc/nbdtab is used, with
 a different format. The debconf configuration options have been
 removed, and this file is therefore never automatically generated,
 except that this upgrade would have generated a /etc/nbdtab file
 from your /etc/nbd-client if AUTO_GEN had not been set to \"n\". As such,
 you'll need to either disable the AUTO_GEN line in /etc/nbd-client and
 call `dpkg-reconfigure nbd-client' to allow the configuration to be
 migrated, or write the nbdtab file yourself manually.
 .
 If you do not take either of those steps, your nbd-client boot-time
 configuration will not be functional.
";
$elem["nbd-client/no-auto-config"]["descriptionde"]="AUTO_GEN ist in /etc/nbd-client auf »n« gesetzt.
 Die Datei /etc/nbd-client enthält eine Zeile, in der die Variable AUTO_GEN auf »n« gesetzt wird. Dies zeigt an, dass Sie es vorziehen, dass die NBD-Konfiguration nicht automatisch erzeugt wird.
 .
 Seit NBD-Client 1:3.14-1 wird die Datei /etc/nbd-client nicht mehr für die Konfiguration beim Systemstart verwendet. Stattdessen wird eine Datei namens /etc/nbdtab in einem anderen Format benutzt. Die Debconf-Konfigurationsoptionen wurden entfernt und diese Datei wird deshalb nie automatisch erzeugt, es sei denn, dieses Upgrade hätte aus Ihrer /etc/nbd-client eine /etc/nbdtab-Datei generiert, falls die Zeile AUTO_GEN nicht auf »n« gesetzt worden wäre. Von daher müssen Sie entweder die AUTO_GEN-Zeile in /etc/nbd-client deaktivieren und »dpkg-reconfigure nbd-client« aufrufen, um die Migration der Konfiguration zu ermöglichen oder die Nbdtab-Datei manuell selbst schreiben.
 .
 Falls Sie keinen dieser Schritte unternehmen, wird Ihre NBD-Client-Systemstart-Konfiguration nicht funktionieren.
";
$elem["nbd-client/no-auto-config"]["descriptionfr"]="";
$elem["nbd-client/no-auto-config"]["default"]="";
$elem["nbd-client/killall_set"]["type"]="note";
$elem["nbd-client/killall_set"]["description"]="KILLALL is no longer supported
 You have a file /etc/nbd-client which does not set the shell variable
 KILLALL to false. Since nbd-client 1:3.14-1, the boot sequence has been
 changed to use /etc/nbdtab instead of /etc/nbd-client, and this mode of
 operation no longer supports killing devices that are not specified in
 nbdtab.
 .
 Your configuration has been migrated to /etc/nbdtab and the
 /etc/nbd-client file moved to /etc/nbd-client.old, but please note that
 you must bring down any devices not specified in /etc/nbdtab manually
 from now on.
";
$elem["nbd-client/killall_set"]["descriptionde"]="KILLALL wird nicht mehr unterstützt.
 Sie haben eine Datei namens /etc/nbd-client, die die Shell-Variable KILLALL nicht auf »false« setzt. Seit NBD-Client 1:3.14-1 hat sich die Startabfolge so geändert, dass /etc/nbdtab anstelle von /etc/nbd-client verwendet wird und dieser Betriebsmodus unterstützt das Deaktivieren von Geräten, die in der Ndbtab angegeben wurden, nicht mehr.
 .
 Ihre Konfiguration wurde auf /etc/nbdtab migriert und die Datei /etc/nbd-client nach /etc/nbd-client.old verschoben, beachten Sie aber bitte, dass Sie von jetzt an alle nicht in /etc/nbdtab angegebenen Geräte manuell herunterfahren müssen.
";
$elem["nbd-client/killall_set"]["descriptionfr"]="";
$elem["nbd-client/killall_set"]["default"]="";
PKG_OptionPageTail2($elem);
?>