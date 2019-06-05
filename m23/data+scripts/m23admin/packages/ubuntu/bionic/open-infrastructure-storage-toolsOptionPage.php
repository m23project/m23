<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("open-infrastructure-storage-tools");

$elem["open-infrastructure-storage-tools/title"]["type"]="title";
$elem["open-infrastructure-storage-tools/title"]["description"]="storage-tools: Setup
";
$elem["open-infrastructure-storage-tools/title"]["descriptionde"]="Einrichtung
";
$elem["open-infrastructure-storage-tools/title"]["descriptionfr"]="configuration
";
$elem["open-infrastructure-storage-tools/title"]["default"]="";
$elem["open-infrastructure-storage-tools/ceph-log"]["type"]="boolean";
$elem["open-infrastructure-storage-tools/ceph-log"]["description"]="ceph-log:
 ceph-log stores Ceph cluster log as a logfile, see ceph-log(1).
 .
 Should ceph-log be enabled?
";
$elem["open-infrastructure-storage-tools/ceph-log"]["descriptionde"]="ceph-log:
 ceph-log speichert Protokolle des Ceph-Clusters als Logdatei; siehe ceph-log(1).
 .
 Soll ceph-log aktiviert werden?
";
$elem["open-infrastructure-storage-tools/ceph-log"]["descriptionfr"]="Ceph-log :
 Ceph-log journalise la grappe Ceph dans un fichier d’historique, consulter ceph-log(1).
 .
 Faut-il activer ceph-log ?
";
$elem["open-infrastructure-storage-tools/ceph-log"]["default"]="false";
$elem["open-infrastructure-storage-tools/ceph-info"]["type"]="boolean";
$elem["open-infrastructure-storage-tools/ceph-info"]["description"]="ceph-info:
 ceph-info shows Ceph cluster information as a HTML page, see ceph-info(1).
 .
 Should ceph-info be enabled?
";
$elem["open-infrastructure-storage-tools/ceph-info"]["descriptionde"]="";
$elem["open-infrastructure-storage-tools/ceph-info"]["descriptionfr"]="";
$elem["open-infrastructure-storage-tools/ceph-info"]["default"]="false";
$elem["open-infrastructure-storage-tools/cephfs-snap"]["type"]="boolean";
$elem["open-infrastructure-storage-tools/cephfs-snap"]["description"]="cephfs-snap:
 cephfs-snap creates CephFS snapshots periodically, see cephfs-snap(1).
 .
 Should cephfs-snap be enabled?
";
$elem["open-infrastructure-storage-tools/cephfs-snap"]["descriptionde"]="cephfs-snap:
 cephfs-snap fertigt regelmäßig Schnappschüsse von CephFS-Dateisystemen an; siehe cephfs-snap(1).
 .
 Soll cephfs-snap aktiviert werden?
";
$elem["open-infrastructure-storage-tools/cephfs-snap"]["descriptionfr"]="Cephfs-snap :
 Cephfs-snap crée des instantanés CephFS de manière périodique, consulter cephfs-snap(1).
 .
 Faut-il activer cephfs-snap ?
";
$elem["open-infrastructure-storage-tools/cephfs-snap"]["default"]="false";
$elem["open-infrastructure-storage-tools/cephfs-snap-directories"]["type"]="string";
$elem["open-infrastructure-storage-tools/cephfs-snap-directories"]["description"]="cephfs-snap directories:
 Please specify the directories (space separated) where CephFS are mounted
 that should be snapshoted.
 .
 If unsure, leave empty.
";
$elem["open-infrastructure-storage-tools/cephfs-snap-directories"]["descriptionde"]="cephfs-snap-Verzeichnisse:
 Bitte geben Sie, getrennt durch Leerzeichen, die Verzeichnisse an, in welchen CephFS-Dateisysteme eingebunden sind und von denen ceph-snap Schnappschüsse erstellen soll.
 .
 Wenn Sie unsicher sind, geben Sie nichts ein.
";
$elem["open-infrastructure-storage-tools/cephfs-snap-directories"]["descriptionfr"]="Répertoires de cephfs-snap :
 Veuillez indiquer les répertoires (séparés par des espaces) où CephFS est monté et qui seront intégrés dans les instantanés.
 .
 En cas de doute, laisser la ligne vide.
";
$elem["open-infrastructure-storage-tools/cephfs-snap-directories"]["default"]="";
$elem["open-infrastructure-storage-tools/cephfs-snap-hourly"]["type"]="string";
$elem["open-infrastructure-storage-tools/cephfs-snap-hourly"]["description"]="cephfs-snap hourly:
 Please specify the number of hourly snapshots that should be kept.
 .
 Depending on the use case a reasonable default might be to keep hourly
 snapshots for 1 week, means: (24 * 7) + 1 = 169
 .
 If unsure, leave empty (no automatic hourly snapshot rotation).
";
$elem["open-infrastructure-storage-tools/cephfs-snap-hourly"]["descriptionde"]="cephfs-snap stündlich:
 Bitte geben Sie an, wie viele stündlicher Schnappschüsse aufzubewahren sind.
 .
 Abhängig vom Verwendungszusammenhang wäre es sinnvoll, stündliche Schnappschüsse eine Woche lang aufzubewahren, was als Vorgabewert (24 * 7) + 1 = 169 ergäbe.
 .
 Wenn Sie unsicher sind, geben Sie nichts ein. Eine Rotation der stündlichen Schnappschüsse unterbleibt dann.
";
$elem["open-infrastructure-storage-tools/cephfs-snap-hourly"]["descriptionfr"]="Cephfs-snap hourly :
 Veuillez indiquer le nombre d’instantanés horaires à conserver.
 .
 Suivant l’utilisation, une valeur par défaut raisonnable peut être, pour la conservation des instantanés horaires pour une semaine, (24 * 7) + 1 = 169.
 .
 En cas de doute, laisser la ligne vide (pas de rotation automatique d’instantanés horaires).
";
$elem["open-infrastructure-storage-tools/cephfs-snap-hourly"]["default"]="169";
$elem["open-infrastructure-storage-tools/cephfs-snap-daily"]["type"]="string";
$elem["open-infrastructure-storage-tools/cephfs-snap-daily"]["description"]="cephfs-snap daily:
 Please specify the number of daily snapshots that should be kept.
 .
 Depending on the use case a reasonable default might be to keep daily
 snapshots for 1 month, means: (31 * 1) + 1 = 32
 .
 If unsure, leave empty (no automatic daily snapshot rotation).
";
$elem["open-infrastructure-storage-tools/cephfs-snap-daily"]["descriptionde"]="cephfs-snap täglich:
 Bitte geben Sie an, wie viele täglicher Schnappschüsse aufzubewahren sind.
 .
 Abhängig vom Einsatzfall wäre es sinnvoll, tägliche Schnappschüsse einen Monat lang aufzubewahren, was als Vorgabewert (31 * 1) + 1 = 32 ergäbe.
 .
 Wenn Sie unsicher sind, geben Sie nichts ein. Eine Rotation der täglichen Schnappschüsse unterbleibt dann.
";
$elem["open-infrastructure-storage-tools/cephfs-snap-daily"]["descriptionfr"]="Cephfs-snap daily :
 Veuillez indiquer le nombre d’instantanés journaliers à conserver.
 .
 Suivant l’utilisation, une valeur par défaut raisonnable peut être, pour la conservation des instantanés journaliers pour un mois, (31 * 1) + 1 = 32.
 .
 En cas de doute, laisser la ligne vide (pas de rotation automatique d’instantanés journaliers).
";
$elem["open-infrastructure-storage-tools/cephfs-snap-daily"]["default"]="32";
$elem["open-infrastructure-storage-tools/cephfs-snap-weekly"]["type"]="string";
$elem["open-infrastructure-storage-tools/cephfs-snap-weekly"]["description"]="cephfs-snap weekly:
 Please specify the number of weekly snapshots that should be kept.
 .
 Depending on the use case a reasonable default might be to keep weekly
 snapshots for 6 months, means: (6 * 4) + 1 = 25
 .
 If unsure, leave empty (no automatic weekly snapshot rotation).
";
$elem["open-infrastructure-storage-tools/cephfs-snap-weekly"]["descriptionde"]="cephfs-snap wöchentlich:
 Bitte geben Sie an, wie viele wöchentlicher Schnappschüsse aufzubewahren sind.
 .
 Abhängig vom Verwendungszusammenhang wäre es sinnvoll, wöchentliche Schnappschüsse sechs Monate lang aufzubewahren, was als Vorgabewert (6 * 4) + 1 = 25 ergäbe.
 .
 Wenn Sie unsicher sind, geben Sie nichts ein. Eine Rotation der wöchentlichen Schnappschüsse unterbleibt dann.
";
$elem["open-infrastructure-storage-tools/cephfs-snap-weekly"]["descriptionfr"]="Cephfs-snap weekly :
 Veuillez indiquer le nombre d’instantanés hebdomadaires à conserver.
 .
 Suivant l’utilisation, une valeur par défaut raisonnable peut être, pour la conservation des instantanés hebdomadaires pour un semestre, (6 * 4) + 1 = 25.
 .
 En cas de doute, laisser la ligne vide (pas de rotation automatique d’instantanés hebdomadaires).
";
$elem["open-infrastructure-storage-tools/cephfs-snap-weekly"]["default"]="25";
$elem["open-infrastructure-storage-tools/cephfs-snap-monthly"]["type"]="string";
$elem["open-infrastructure-storage-tools/cephfs-snap-monthly"]["description"]="cephfs-snap monthly:
 Please specify the number of monthly snapshots that should be kept.
 .
 Depending on the use case a reasonable default might be to keep monthly
 snapshots for 1 year, means: (12 * 1) + 1 = 13
 .
 If unsure, leave empty (no automatic monthly snapshot rotation).
";
$elem["open-infrastructure-storage-tools/cephfs-snap-monthly"]["descriptionde"]="cephfs-snap monatlich:
 Bitte geben Sie an, wie viele monatlicher Schnappschüsse aufzubewahren sind.
 .
 Abhängig vom Verwendungszusammenhang wäre es sinnvoll, monatliche Schnappschüsse ein Jahr lang aufzubewahren, was als Vorgabewert (12 * 1) + 1 = 13 ergäbe.
 .
 Wenn Sie unsicher sind, geben Sie nichts ein. Eine Rotation der monatlichen Schnappschüsse unterbleibt dann.
";
$elem["open-infrastructure-storage-tools/cephfs-snap-monthly"]["descriptionfr"]="Cephfs-snap monthly :
 Veuillez indiquer le nombre d’instantanés mensuels à conserver.
 .
 Suivant l’utilisation, une valeur par défaut raisonnable peut être, pour la conservation des instantanés mensuels pour une année, (12 * 1) + 1 = 13.
 .
 En cas de doute, laisser la ligne vide (pas de rotation automatique d’instantanés mensuels).
";
$elem["open-infrastructure-storage-tools/cephfs-snap-monthly"]["default"]="13";
$elem["open-infrastructure-storage-tools/cephfs-snap-yearly"]["type"]="string";
$elem["open-infrastructure-storage-tools/cephfs-snap-yearly"]["description"]="cephfs-snap yearly:
 Please specify the number of yearly snapshots that should be kept.
 .
 Depending on the use case a reasonable default might be to keep yearly
 snapshots for 10 years, means: (10 * 1) + 1 = 11
 .
 If unsure, leave empty (no automatic yearly snapshot rotation).
";
$elem["open-infrastructure-storage-tools/cephfs-snap-yearly"]["descriptionde"]="cephfs-snap jährlich:
 Bitte geben Sie an, wie viele jährlicher Schnappschüsse aufzubewahren sind.
 .
 Abhängig vom Verwendungszusammenhang wäre es sinnvoll, jährliche Schnappschüsse zehn Jahre lang aufzubewahren, was als Vorgabewert (10 * 1) + 1 = 11 ergäbe.
 .
 Wenn Sie unsicher sind, geben Sie nichts ein. Eine Rotation der jährlichen Schnappschüsse unterbleibt dann.
";
$elem["open-infrastructure-storage-tools/cephfs-snap-yearly"]["descriptionfr"]="cephfs-snap yearly :
 Veuillez indiquer le nombre d’instantanés annuels à conserver.
 .
 Suivant l’utilisation, une valeur par défaut raisonnable peut être, pour la conservation des instantanés annuels pour dix années, (10 * 1) + 1 = 11.
 .
 En cas de doute, laisser la ligne vide (pas de rotation automatique d’instantanés annuels).
";
$elem["open-infrastructure-storage-tools/cephfs-snap-yearly"]["default"]="11";
$elem["open-infrastructure-storage-tools/irc"]["type"]="string";
$elem["open-infrastructure-storage-tools/irc"]["description"]="IRC notifications:
 The cephfs-snap command can send IRC notifications via irker to one or
 more (whitespace separated) IRC channels.
 .
 The following example will send IRC notifications to the
 open-infrastructure channel on irc.oftc.net:
 .
   irc://irc.oftc.net:6668/open-infrastructure
 .
 If unsure, leave empty (default).
";
$elem["open-infrastructure-storage-tools/irc"]["descriptionde"]="IRC-Benachrichtigungen:
 Der Befehl cephfs-snap kann mittels irker auf einem oder mehreren IRC-Kanälen (durch Leerzeichen getrennte Auflistung) Benachrichtigungen senden.
 .
 Beispielsweise sendet folgende Eingabe Benachrichtigungen auf irc.oftc.net, dem Kanal des Projekts open-infrastructure:
 .
   irc://irc.oftc.net:6668/open-infrastructure
 .
 Wenn Sie unsicher sind, geben Sie nichts ein. Es werden dann voreinstellungsgemäß keine IRC-Benachrichtigungen versandt.
";
$elem["open-infrastructure-storage-tools/irc"]["descriptionfr"]="Notifications IRC :
 La commande cephfs-snap peut envoyer des notifications IRC à l’aide d’irker à un ou plusieurs canaux IRC (séparés par des espaces).
 .
 L’exemple suivant enverra des notifications IRC au canal open-infrastructure sur irc.oftc.net :
 .
   irc://irc.oftc.net:6668/open-infrastructure
 .
 En cas de doute, laisser la ligne vide (valeur par défaut).
";
$elem["open-infrastructure-storage-tools/irc"]["default"]="";
PKG_OptionPageTail2($elem);
?>
