<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nut");

$elem["nut/major_upstream_changes"]["type"]="note";
$elem["nut/major_upstream_changes"]["description"]="Please manually modify your configuration files
 This is a serious advisory. Please take note.
 .
 There have been significant changes by the upstream authors to the
 behaviour of this software. Specifically, the configuration files in
 /etc/nut are different, some drivers have been renamed, ...
 .
 If you continue with the installation of this package, NUT will NOT
 restart unless you manually change your configuration files and edit
 /etc/default/nut.  You have been warned!
 Please read /usr/share/doc/nut/UPGRADING.gz for the upgrading procedure.
";
$elem["nut/major_upstream_changes"]["descriptionde"]="Bitte passen Sie Ihre Konfigurationsdateien manuell an
 Dies ist ein ernster Hinweis. Bitte beachten Sie ihn.
 .
 Es gab bedeutende Änderungen durch die Programmautoren am Verhalten dieser Software. Im Besonderen wurden die Konfigurationsdateien in /etc/nut geändert, manche Treiber wurden umbenannt, ...
 .
 Falls Sie mit der Installation dieses Pakets fortfahren, wird NUT NICHT neu starten, außer Sie ändern Ihre Konfigurationsdateien manuell und passen /etc/default/nut an. Sie wurden gewarnt! Bitte lesen Sie /usr/share/doc/nut/UPGRADING.gz bezüglich der Vorgehensweise beim Upgrade.
";
$elem["nut/major_upstream_changes"]["descriptionfr"]="Modification nécéssaire des fichiers de configuration
 Ceci est un avertissement important.
 .
 L'auteur amont a apporté des modifications significatives au comportement de ce programme. Plus précisément, les fichiers de configuration dans /etc/nut sont totalement différents, certans pilotes ont été renommés, etc.
 .
 Si vous continuez l'installation de ce programme, NUT ne redémarrera PAS tant que vous n'aurez pas changé vous-même le fichier de configuration et modifié /etc/default/nut. Veuillez consulter /usr/share/doc/nut/UPGRADING.gz pour plus de détails sur la procédure de mise à niveau.
";
$elem["nut/major_upstream_changes"]["default"]="";
PKG_OptionPageTail2($elem);
?>
