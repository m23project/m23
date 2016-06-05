<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tomoyo-tools");

$elem["tomoyo-tools/grub"]["type"]="boolean";
$elem["tomoyo-tools/grub"]["description"]="Enable TOMOYO Linux at boot time?
 Enabling TOMOYO Linux functionality in the running kernel requires an
 appropriate kernel command line at boot time. This can be configured by
 setting GRUB_CMDLINE_LINUX=\"security=tomoyo\" in /etc/default/grub and
 running grub-update.
 .
 If you accept here, these actions will be performed automatically and
 TOMOYO Linux will be enabled at next boot.
";
$elem["tomoyo-tools/grub"]["descriptionde"]="TOMOYO Linux beim Hochfahren aktivieren?
 Aktivieren der TOMOYO-Linux-Funktionalität im laufenden Kernel erfordert eine geeignete Kernel-Befehlszeile beim Hochfahren. Dies kann durch Setzen von GRUB_CMDLINE_LINUX=\"security=tomoyo\" in /etc/default/grub und Ausführen von grub-update konfiguriert werden.
 .
 Falls Sie hier zustimmen, werden diese Aktionen automatisch durchgeführt und TOMOYO Linux wird beim nächsten Hochfahren aktiviert.
";
$elem["tomoyo-tools/grub"]["descriptionfr"]="Activer TOMOYO Linux au démarrage de la machine ?
 La mise en oeuvre de TOMOYO Linux dans le noyau utilisé actuellement nécessite une commande adéquate à exécuter au démarrage. Cela peut être configuré en positionnant la valeur GRUB_CMDLINE_LINUX= « security=tomoyo » dans /etc/default/grub/ puis en exécutant « grub-update ».
 .
 Si vous choisissez cette option, ces actions seront automatiquement exécutées et TOMOYO Linux sera activé au prochain démarrage.
";
$elem["tomoyo-tools/grub"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
