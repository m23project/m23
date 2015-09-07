<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("darkstat");

$elem["darkstat/upgrade-question/db_purge-2.5-1"]["type"]="boolean";
$elem["darkstat/upgrade-question/db_purge-2.5-1"]["description"]="Do you really want to upgrade darkstat ?
 The database file format of darkstat has changed, and can't be upgraded.
 .
 If you confirm the upgrade, the database file
 /var/lib/darkstat/darkstat.db will be removed (because it will prevent
 darkstat starting). A new database file will be created from scratch when
 darkstat restarts.
 .
 If you don't confirm the upgrade, the package will be left non-configured,
 and if you wish to use an older version of darkstat you will have to
 downgrade manually.
";
$elem["darkstat/upgrade-question/db_purge-2.5-1"]["descriptionde"]="Wollen Sie darkstat wirklich aktualisieren?
 Das Datenbank-Format hat sich geändert und kann nicht aktualisiert werden.
 .
 Wenn Sie der Aktualisierung zustimmen, wird die Datei /var/lib/darkstat/darkstat.db gelöscht (weil das darkstat am Starten hindert). Eine neue Datenbank-Datei wird von Grund auf erzeugt, wenn darkstat neu gestartet wird.
 .
 Wenn Sie der Aktualisierung nicht zustimmen, wird das Paket nicht eingerichtet bleiben und wenn Sie eine ältere Version von darkstat benutzen wollen, müssen Sie diese manuell installieren.
";
$elem["darkstat/upgrade-question/db_purge-2.5-1"]["descriptionfr"]="Souhaitez-vous vraiment mettre à jour darkstat ?
 Le format de la base de données de darkstat a changé et ne peut pas être mis à jour. 
 .
 Si vous acceptez la mise à jour, le fichier de base de données /var/lib/darkstat/darkstat.db sera supprimé (sa présence empêcherait darkstat de démarrer). Une nouvelle base de données vierge sera créée au démarrage de darkstat.
 .
 Si vous refusez la mise à jour, le paquet restera non-configuré. Si vous souhaitez utiliser une version antérieure de darkstat, vous devrez l'installer vous-même.
";
$elem["darkstat/upgrade-question/db_purge-2.5-1"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
