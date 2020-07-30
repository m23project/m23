<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dailystrips");

$elem["dailystrips/warning-etcdefs"]["type"]="error";
$elem["dailystrips/warning-etcdefs"]["description"]="Definitions in /etc/dailystrips.defs override packaged definitions
 You have an /etc/dailystrips.defs file installed.  Be warned that entries
 in there will override those in the packaged strips.def file, so if you
 created that file because it was more up-to-date than the packaged entry,
 it would be a good idea to check it against the packaged one (in
 /usr/share/dailystrips/strips.defs) and remove the one in /etc now
 (assuming that the new one contains the same fixes yours does).
 .
 Check the README.debian for more details.
";
$elem["dailystrips/warning-etcdefs"]["descriptionde"]="Einstellungen in der Datei /etc/dailystrips.defs überschreiben die aus dem Paket
 Sie haben schon eine Datei /etc/dailystrips.defs.  Beachten Sie, dass die Einträge dort die Werte der Datei strips.def dieses Paketes überschreiben. Wenn diese Datei aktueller als die im Paket ist, dann prüfen Sie sie und /usr/share/dailystrips/strips.defs auf Unterschiede und löschen Sie die in /etc jetzt (vorausgesetzt die neue enthält die gleichen Änderungen wie Ihre).
 .
 Mehr Details enthält die Datei README.debian.
";
$elem["dailystrips/warning-etcdefs"]["descriptionfr"]="Les définitions de /etc/dailystrips.defs remplacent celles du paquet
 Un fichier /etc/dailystrips.defs a été trouvé. Il faut savoir que les entrées qu'il contient prendront le pas sur celles du fichier strips.defs fourni avec le paquet. En conséquence, si vous aviez créé ce fichier pour mettre à jour celui qui était fourni, vous devriez les comparer à nouveau (le fichier fourni avec le paquet est /usr/share/dailystrips/strips.defs) et éventuellement supprimer le fichier contenu dans /etc si le fichier du paquet comporte les mêmes corrections.
 .
 Veuillez consulter le fichier README.Debian pour des détails complémentaires.
";
$elem["dailystrips/warning-etcdefs"]["default"]="";
PKG_OptionPageTail2($elem);
?>
