<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("torrentflux");

$elem["torrentflux/restart-webserver"]["type"]="boolean";
$elem["torrentflux/restart-webserver"]["description"]="Should ${webserver} be restarted?
 Remember that in order to activate the new configuration
 ${webserver} has to be restarted. You can also restart ${webserver}
 by manually executing invoke-rc.d ${webserver} restart.
";
$elem["torrentflux/restart-webserver"]["descriptionde"]="Soll ${webserver} neu gestartet werden?
 Beachten Sie, dass ${webserver} neu gestartet werden muss, um die neue Konfiguration zu aktivieren. Sie können ${webserver} auch neu starten, indem Sie »invoke-rc.d ${webserver} restart« manuell ausführen.
";
$elem["torrentflux/restart-webserver"]["descriptionfr"]="Faut-il redémarrer ${webserver} ?
 Pour activer la nouvelle configuration, le serveur ${webserver} doit être redémarré. Vous pouvez aussi le redémarrer vous-même avec la commande « invoke-rc.d ${webserver} restart ».
";
$elem["torrentflux/restart-webserver"]["default"]="false";
$elem["torrentflux/upgrade_to_21"]["type"]="note";
$elem["torrentflux/upgrade_to_21"]["description"]="Upgrading to 2.1 reverts configuration to default
 You are upgrading from a pre-2.1 version of torrentflux to a 2.1
 or later version. A major change in version 2.1 is that the
 configuration is now stored in the database. This upgrade will
 update the database using default values, and any changes you have
 made to the configuration file /etc/torrentflux/config.php will NOT
 be used. This file will be saved so that you can reference it later.
 After the upgrade is complete, you can adjust the settings
 inside the program by logging in as an admin, and clicking on
 \"admin\" and then \"settings\".
";
$elem["torrentflux/upgrade_to_21"]["descriptionde"]="Das Upgrade auf 2.1 setzt die Konfiguration auf die Voreinstellung zurück.
 Sie führen ein Upgrade von einer Version vor 2.1 von Torrentflux auf Version 2.1 oder später durch. Eine bedeutende Änderung in Version 2.1 ist, dass die Konfiguration jetzt in der Datenbank gespeichert ist. Dieses Upgrade wird die Datenbank unter Verwendung voreingestellter Werte aktualisieren. Jegliche Änderungen, die Sie an der Konfigurationsdatei /etc/torrentflux/config.php vorgenommen haben, werden nicht verwendet. Diese Datei wird gespeichert, sodass Sie sie später referenzieren können. Nachdem das Upgrade abgeschlossen ist, können Sie die Einstellungen anpassen, indem Sie sich als admin anmelden und dann auf »admin« und dann »settings« klicken.
";
$elem["torrentflux/upgrade_to_21"]["descriptionfr"]="Configuration réinitialisée pour la mise à niveau vers la version 2.1
 Vous mettez à niveau d'une version antérieure à la 2.1 vers une version 2.1 ou supérieure. Depuis la version 2.1, la configuration est stockée dans une base de données. Cette mise à niveau va donc mettre à jour celle-ci en utilisant les valeurs par défaut. Tous les changements que vous auriez pu effectuer dans le fichier de configuration « /etc/torrentflux/config.php » NE seront PAS utilisés. Ce fichier sera sauvegardé pour que vous puissiez ensuite le consulter. Après la mise à niveau, vous pourrez modifier les paramètres en vous connectant dans le logiciel avec les privilèges de l'administrateur puis en cliquant sur « admin » et enfin sur « settings » (réglages).
";
$elem["torrentflux/upgrade_to_21"]["default"]="";
$elem["torrentflux/unsupported-webserver"]["type"]="note";
$elem["torrentflux/unsupported-webserver"]["description"]="No supported webserver was found
 A supported webserver was not found to automatically configure.
 This package can only automatically configure apache webservers
 to use the program. If you are using a different webserver, you
 will need to point it to the torrentflux files in
 /usr/share/torrentflux/www (see the webserver config files in
 /etc/torrentflux/apache.conf for examples) and possibly
 restart the webserver during installation, and then remove the
 configuration when removing the package.
";
$elem["torrentflux/unsupported-webserver"]["descriptionde"]="Kein unterstützter Webserver gefunden
 Es wurde kein unterstützer Webserver zum automatischen Konfigurieren gefunden. Dises Paket kann nur Apache-Webserver automatisch zur Verwendung des Programms konfigurieren. Falls Sie einen anderen Webserver verwenden, müssen Sie ihn auf die Dateien von Torrentflux in /usr/share/torrentflux/www verweisen (schauen Sie in die Webserver-Konfigurationsdateien in /etc/torrentflux/apache.conf für Beispiele) und den Webserver während der Installation möglicherweise neu starten. Entsprechend müssen Sie beim Entfernen des Pakets auch die Konfiguration entfernen.
";
$elem["torrentflux/unsupported-webserver"]["descriptionfr"]="Aucun serveur web compatible trouvé
 Aucun serveur web compatible n'a été trouvé en vue de la configuration automatique. Seuls les serveurs web Apache peuvent être configurés automatiquement pour ce logiciel. Si vous utilisez un autre serveur web, vous devrez lui indiquer les fichiers de torrrentflux situés dans « /usr/share/torrentflux/www » (pour des exemples, reportez-vous au fichier de configuration du serveur web « /etc/torrentflux/apache.conf ») et probablement redémarrer le serveur web pendant l'installation. N'oubliez pas d'enlever cette configuration lors de la désinstallation du paquet.
";
$elem["torrentflux/unsupported-webserver"]["default"]="";
PKG_OptionPageTail2($elem);
?>
