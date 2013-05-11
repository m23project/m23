<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("grub-pc");

$elem["grub-pc/chainload_from_menu.lst"]["type"]="boolean";
$elem["grub-pc/chainload_from_menu.lst"]["description"]="Chainload from menu.lst?
 GRUB upgrade scripts have detected a GRUB Legacy setup in /boot/grub.
 .
 In order to replace the Legacy version of GRUB in your system, it is
 recommended that /boot/grub/menu.lst is adjusted to chainload GRUB 2
 from your existing GRUB Legacy setup.  This step may be automaticaly
 performed now.
 .
 It's recommended that you accept chainloading GRUB 2 from menu.lst, and
 verify that your new GRUB 2 setup is functional for you, before you install
 it directly to your MBR (Master Boot Record).
 .
 In either case, whenever you want GRUB 2 to be loaded directly from MBR,
 you can do so by issuing (as root) the following command:
 .
 upgrade-from-grub-legacy
";
$elem["grub-pc/chainload_from_menu.lst"]["descriptionde"]="Chainload (Kettenladen) aus menu.lst?
 Die Upgrade-Skripte von GRUB haben eine »GRUB Legacy«-Installation in /boot/grub erkannt.
 .
 Um die Legacy-Version von GRUB auf Ihrem System zu ersetzen, wird empfohlen, dass /boot/grub/menu.lst angepasst wird, so dass GRUB 2 aus Ihrer existierenden GRUB-Legacy-Einrichtung heraus geladen wird. Dieser Schritt kann jetzt automatisch vollzogen werden.
 .
 Es wird empfohlen, dass Sie dem Chainloading von GRUB 2 aus der menu.lst zustimmen und überprüfen, dass die GRUB 2-Installation für Sie funktioniert, bevor Sie diese direkt in Ihren MBR (Master Boot Record) installieren.
 .
 Auf jeden Fall können Sie den folgenden Befehl (als root) eingeben, wenn Sie möchten, dass GRUB 2 direkt vom MBR geladen wird:
 .
 upgrade-from-grub-legacy
";
$elem["grub-pc/chainload_from_menu.lst"]["descriptionfr"]="Faut-il enchaîner le chargement depuis menu.lst ?
 Une installation standard de GRUB a été détectée dans /boot/grub.
 .
 Afin de remplacer cette installation, il est recommandé de modifier /boot/grub/menu.lst pour enchaîner le chargement de GRUB 2 depuis l'installation standard de GRUB (« chainload »). Veuillez choisir si vous souhaitez effectuer cette modification.
 .
 Il est recommandé de choisir cette option pour pouvoir confirmer le bon fonctionnement de GRUB 2 avant de l'installer directement sur le secteur d'amorçage (MBR : « Master Boot Record »).
 .
 Dans tous les cas, pour charger GRUB 2 directement depuis le secteur d'amorçage, vous devrez utiliser la commande suivante avec les privilèges du superutilisateur :
 .
 upgrade-from-grub-legacy
";
$elem["grub-pc/chainload_from_menu.lst"]["default"]="true";
$elem["grub-pc/linux_cmdline"]["type"]="string";
$elem["grub-pc/linux_cmdline"]["description"]="Linux command line:
 The following Linux command line was extracted from the `kopt' parameter
 in GRUB Legacy's menu.lst.  Please verify that it is correct, and modify
 it if necessary.
";
$elem["grub-pc/linux_cmdline"]["descriptionde"]="Linux Kommandozeile:
 Die folgende Linux-Kommandozeile ist aus dem Paramter »kopt« in GRUB Legacys menu.lst extrahiert. Bitte überprüfen Sie, ob dieser korrekt ist und passen Sie ihn falls notwendig an.
";
$elem["grub-pc/linux_cmdline"]["descriptionfr"]="Ligne de commande de Linux :
 La ligne de commande de Linux suivante a été récupérée via le paramètre « kopt » du fichier menu.lst normal de GRUB. Veuillez contrôler qu'elle est correcte et la modifier si nécessaire.
";
$elem["grub-pc/linux_cmdline"]["default"]="fillme";
PKG_OptionPageTail2($elem);
?>
