<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cyrus-common");

$elem["cyrus-common/removespools"]["type"]="boolean";
$elem["cyrus-common/removespools"]["description"]="Remove the mail and news spools?
 The Cyrus mail and news spools, as well as users' sieve scripts,
 can be removed when the package is purged.
 .
 This question only applies to the default spools and sieve script
 directories in /var.  If you modified their location in imapd.conf, the
 new locations will not be removed; just the old ones in /var.
";
$elem["cyrus-common/removespools"]["descriptionde"]="E-Mail- und News-Zwischenspeicher entfernen?
 Die Zwischenspeicher von Cyrus für E-Mail und News, sowie die Filterskripte (Sieve-Skripte) der Benutzer, können gelöscht werden, wenn das Paket restlos entfernt wird (purge).
 .
 Diese Frage betrifft nur die Standard-Zwischenspeicher und -Filterskriptverzeichnisse in /var. Wenn Sie deren Ort in der Datei imapd.conf geändert haben, werden sie an den neuen Stellen nicht gelöscht, nur an den alten im Verzeichnis /var.
";
$elem["cyrus-common/removespools"]["descriptionfr"]="Faut-il supprimer les répertoires contenant les courriers et les nouvelles ?
 Les répertoires stockant le courrier et les nouvelles, ainsi que les filtres sieve des utilisateurs, peuvent être supprimés en même temps que le paquet.
 .
 Cette question concerne uniquement les répertoires par défaut situés dans /var et contenant le « spool » et les filtres sieve. Si vous aviez modifié leurs emplacements grâce au fichier imapd.conf, ils ne seront pas supprimés ; seuls les anciens, dans /var, le seront.
";
$elem["cyrus-common/removespools"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
