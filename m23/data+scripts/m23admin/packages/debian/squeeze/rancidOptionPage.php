<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("rancid");

$elem["rancid/warning"]["type"]="note";
$elem["rancid/warning"]["description"]="Note
 Rancid debian package is still in an alpha stage.  If you find
 problems first check all the docs and then report them as bugs as
 soon as possible.  Currently it doesn't have any installation script
 to help you configuring it, look at the examples directory under
 /usr/share/doc/rancid to look for some example for your configuration.
";
$elem["rancid/warning"]["descriptionde"]="Hinweis
 Das Debian-Paket von Rancid befindet sich noch im Alpha-Stadium; falls Sie ein Problem finden, lesen Sie erst alle Dokumente und berichten Sie es dann so schnell wie möglich als Fehler. Derzeit hat es kein Installationsskript, um Ihnen bei der Konfiguration zu helfen; schauen Sie ins »examples«-Verzeichnis unter /usr/share/doc/rancid für einige Beispiele für Ihre Konfiguration.
";
$elem["rancid/warning"]["descriptionfr"]="Avertissement
 Le paquet Debian de Rancid est encore en phase initiale de développement. Si vous rencontrez des problèmes, veuillez d'abord consulter la documentation et les signaler par un rapport de bogue dès que possible. Il n'existe actuellement aucun script de configuration pour vous assister : vous devriez consulter le répertoire d'exemples dans /usr/share/doc/rancid.
";
$elem["rancid/warning"]["default"]="";
$elem["rancid/go_on"]["type"]="boolean";
$elem["rancid/go_on"]["description"]="Really continue?
 Please check, whether you made a backup copy of your rancid data.  If
 it's your first installation of rancid accept here, otherwise
 decline, perform the backup and then run \"dpkg-reconfigure rancid\"
";
$elem["rancid/go_on"]["descriptionde"]="Wirklich fortfahren?
 Bitte überprüfen Sie, ob Sie eine Sicherungskopie Ihrer Rancid-Daten angelegt haben. Falls dies Ihre erste Installation von Rancid ist, stimmen Sie hier zu, andernfalls lehnen Sie ab, um das Backup durchzuführen und dann »dpkg-reconfigure rancid« auszuführen.
";
$elem["rancid/go_on"]["descriptionfr"]="Faut-il vraiment continuer ?
 Ne choisissez cette option que si vous effectuez actuellement une installation initiale de Rancid. Dans le cas contraire, sauvegardez d'abord vos données, puis utilisez la commande « dpkg-reconfigure rancid ».
";
$elem["rancid/go_on"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
