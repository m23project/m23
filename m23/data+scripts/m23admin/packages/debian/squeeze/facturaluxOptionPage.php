<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("facturalux");

$elem["facturalux/purgedbquestion"]["type"]="boolean";
$elem["facturalux/purgedbquestion"]["description"]="Drop database?
 You have asked to `purge' this package. You can select whether to delete the
 database called \"facturalux\" or leave it untouched. The database may
 contain valuable information if you have been working with facturalux.
 .
 If you accept here, the database \"facturalux\" will be dropped from the
 system.
 .
 If you refuse here, the database will remain in your system. You'll have
 to remove them manually.
 .
 Don't accept unless you know what you are doing.
";
$elem["facturalux/purgedbquestion"]["descriptionde"]="Datenbank löschen?
 Sie wollen dieses Paket restlos entfernen (purge). Sie können auswählen, ob die Datenbank \"facturalux\" auch gelöscht wird oder erhalten bleiben soll. Die Datenbank kann wertvolle Daten enthalten, wenn Sie mit facturalux gearbeitet haben.
 .
 Wenn Sie zustimmen, wird die Datenbank \"facturalux\" von Ihrem Rechner gelöscht.
 .
 Wenn Sie nicht zustimmen, bleibt die Datenbank auf Ihrem Rechner erhalten. Sie müssen sie manuell entfernen.
 .
 Stimmen Sie nur zu, wenn Sie genau wissen, was Sie tun.
";
$elem["facturalux/purgedbquestion"]["descriptionfr"]="Faut-il supprimer la base de données ?
 Vous avez demandé la suppression complète (purge) de ce paquet. Vous pouvez choisir de supprimer la base de données « facturalux » ou de la laisser intacte. Cette base de données peut contenir des informations précieuses si vous avez travaillé sous facturalux.
 .
 Si vous acceptez, la base de données « facturalux » sera supprimée du système.
 .
 Dans le cas contraire, elle demeurera sur votre système. Vous devrez l'effacer vous-même.
 .
 N'acceptez la suppression que si vous savez ce que vous faites.
";
$elem["facturalux/purgedbquestion"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
