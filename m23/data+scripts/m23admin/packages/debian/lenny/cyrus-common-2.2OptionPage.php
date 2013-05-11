<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cyrus-common-2.2");

$elem["cyrus-common-2.2/warnbackendchange"]["type"]="note";
$elem["cyrus-common-2.2/warnbackendchange"]["description"]="Database backends have changed!
 Comparison between /usr/lib/cyrus/cyrus-db-types.txt and
 /usr/lib/cyrus/cyrus-db-types.active shows that database backends for
 Cyrus IMAPd have been changed.
 .
 This means that those databases for which the database backends changed
 might need to be converted manually to the new format, using the
 cvt_cyrusdb(8) utility.
 .
 Please refer to /usr/share/doc/cyrus-common-2.2/README.Debian.database
 for more information.  Do not start cyrmaster until you have converted
 the databases to the new format.
";
$elem["cyrus-common-2.2/warnbackendchange"]["descriptionde"]="Datenbankanbindungen haben sich geändert!
 Ein Vergleich der Dateien /usr/lib/cyrus/cyrus-db-types.txt und /usr/lib/cyrus/cyrus-db-types.active zeigt, dass die Datenbankanbindungen des Cyrus IMAPd geändert wurden.
 .
 Die Datenbanken, für die sich die Anbindung geändert hat, müssen mit dem Hilfsprogramm cvt_cyrusdb(8) gegebenenfalls manuell in das neue Format überführt werden.
 .
 Mehr Informationen finden Sie in der Datei /usr/share/doc/cyrus-common-2.2/README.Debian.database.  Starten Sie keinesfalls cyrmaster, bevor Sie die Datenbank in das neue Format überführt haben.
";
$elem["cyrus-common-2.2/warnbackendchange"]["descriptionfr"]="Modifications dans l'interfaçage avec les bases de données
 Une comparaison entre /usr/lib/cyrus/cyrus-db-types.txt et /usr/lib/cyrus/cyrus-db-types.active montre que l'interfaçage de Cyrus IMAPd avec les bases de données a changé.
 .
 Cela signifie que les bases de données pour lesquelles l'interfaçage a changé peuvent nécessiter une conversion manuelle au nouveau format. Vous pouvez vous servir de l'utilitaire cvt_cyrusdb (8).
 .
 Veuillez-vous reporter à /usr/share/doc/cyrus-common-2.2/README.Debian.database pour des informations supplémentaires. Ne lancez pas cyrmaster avant d'avoir converti les bases de données au nouveau format.
";
$elem["cyrus-common-2.2/warnbackendchange"]["default"]="";
$elem["cyrus-common-2.2/removespools"]["type"]="boolean";
$elem["cyrus-common-2.2/removespools"]["description"]="Remove the mail and news spools?
 The Cyrus mail and news spools, as well as the user's sieve scripts
 can be removed when the package is purged.
 .
 This question only applies to the default spools and sieve script
 directories in /var.  If you modified their location in imapd.conf, the
 new locations will not be removed; just the old ones in /var.
";
$elem["cyrus-common-2.2/removespools"]["descriptionde"]="Mail- und News-Spools entfernen?
 Die Cyrus Email- bzw. News-Spools und die Filterskripte (Sieve Skripte) der Benutzer können gelöscht werden, wenn das Paket restlos entfernt wird (purge).
 .
 Diese Frage betrifft nur die Standard-Spools und -Filterskriptverzeichnisse in /var.  Wenn Sie deren Ort in der Datei imapd.conf geändert haben, werden sie an der neuen Stelle nicht gelöscht, nur an der Alten im Verzeichnis /var.
";
$elem["cyrus-common-2.2/removespools"]["descriptionfr"]="Faut-il supprimer les répertoires contenant les courriers et les nouvelles ?
 Les répertoires stockant le courrier et les nouvelles, ainsi que les filtres des utilisateurs, peuvent être supprimés en même temps que le paquet.
 .
 Cette question concerne uniquement les répertoires par défaut situés dans /var et contenant le « spool » et les filtres. Si vous aviez modifié leurs emplacements grâce au fichier imapd.conf, ils ne seront pas supprimés ; seuls les anciens, dans /var, le seront.
";
$elem["cyrus-common-2.2/removespools"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
