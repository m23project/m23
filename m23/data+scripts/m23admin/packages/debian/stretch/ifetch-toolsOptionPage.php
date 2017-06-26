<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ifetch-tools");

$elem["ifetch-tools/purge"]["type"]="boolean";
$elem["ifetch-tools/purge"]["description"]="Remove all ifetch-tools data, logs, and settings files?
 The /var/lib/ifetch-tools, /var/log/ifetch-tools, and /etc/ifetch-tools
 directories which contain the ifetch-tools data, logs, and settings files
 are about to be removed.
 .
 If you're removing the ifetch-tools package in order to later install a
 more recent version or if a different ifetch-tools package is already
 using the data, logs, and settings, they should be kept.
";
$elem["ifetch-tools/purge"]["descriptionde"]="Alle Daten, Protokolle und Einrichtungsdateien von »ifetch-tools« entfernen?
 Die Verzeichnisse /var/lib/ifetch-tools, /var/log/ifetch-tools und /etc/ifetch-tools, die Daten, Protokolle und Einrichtungsdateien von »ifetch-tools« enthalten, entfernen?
 .
 Falls Sie das Paket »ifetch-tools« entfernen, um später eine neuere Version zu installieren oder falls ein anderes »ifetch-tools«-Paket bereits die Daten, Protokolle und Einrichtungsdateien benutzt, sollten sie beibehalten werden.
";
$elem["ifetch-tools/purge"]["descriptionfr"]="Faut-il supprimer les données, journaux et réglages de ifetch-tools ?
 Les répertoires /var/lib/ifetch-tools, /var/log/ifetch-tools et /etc/ifetch-tools, qui contiennent respectivement les données, les journaux et les réglages de ifetch-tools vont être supprimés.
 .
 Si vous êtes en train de supprimer le paquet ifetch-tools dans le but d'installer plus tard une nouvelle version ou si un autre paquet ifetch-tools est susceptible d'utiliser ces données, vous pouvez souhaiter les conserver.
";
$elem["ifetch-tools/purge"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
