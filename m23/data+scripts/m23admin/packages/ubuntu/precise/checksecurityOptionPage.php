<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("checksecurity");

$elem["checksecurity/oldconf"]["type"]="note";
$elem["checksecurity/oldconf"]["description"]="Merge old configuration
 This is your initial install of the checksecurity package, and you had an
 existing checksecurity.conf file from the cron package. The old
 configuration file was preserved as \"/etc/checksecurity.conf.cron\". If you
 had modified your configuration, you may want to merge those changes into
 the new /etc/checksecurity.conf file from this package.
";
$elem["checksecurity/oldconf"]["descriptionde"]="Alte Einstellungen einbinden
 Dies ist Ihre erste Installation des Paketes checksecurity und Sie haben schon eine Datei checksecurity.conf aus dem Paket cron. Die alte Konfigurationsdatei wurde als\"/etc/checksecurity.conf.cron\" erhalten. Wenn Sie Ihre Einstellungen geändert hatten, sollten Sie die Änderungen in die neue Datei /etc/checksecurity.conf dieses Paketes einbinden.
";
$elem["checksecurity/oldconf"]["descriptionfr"]="Intégration de l'ancienne configuration
 Vous effectuez actuellement la première installation de checksecurity et un fichier checksecurity.conf issu du paquet cron a été trouvé. L'ancien fichier a été conservé sous le nom « /etc/checksecurity.conf.cron ». Si vous avez modifié cette configuration, il peut être nécessaire reporter ces modifications dans le nouveau fichier /etc/checksecurity.conf installé par ce paquet.
";
$elem["checksecurity/oldconf"]["default"]="";
PKG_OptionPageTail2($elem);
?>
