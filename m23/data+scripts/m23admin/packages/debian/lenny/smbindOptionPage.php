<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("smbind");

$elem["smbind/restart-webserver"]["type"]="boolean";
$elem["smbind/restart-webserver"]["description"]="Should ${webserver} be restarted?
 Remember that in order to activate the new configuration
 ${webserver} has to be restarted. You can also restart ${webserver}
 by manually executing invoke-rc.d ${webserver} restart.
";
$elem["smbind/restart-webserver"]["descriptionde"]="Soll ${webserver} neu gestartet werden?
 Beachten Sie, dass zum Aktivieren der neuen Konfiguration ${webserver} neu gestartet werden muss. Sie können ${webserver} auch manuell mittels »invoke-rc.d ${webserver} restart« neu starten.
";
$elem["smbind/restart-webserver"]["descriptionfr"]="Faut-il redémarrer ${webserver} ?
 Veuillez noter que pour activer la nouvelle configuration, ${webserver} doit être redémarré. Vous pouvez également le redémarrer vous-même avec la commande « invoke-rc.d ${webserver} restart ».
";
$elem["smbind/restart-webserver"]["default"]="false";
$elem["smbind/unsupported-webserver"]["type"]="note";
$elem["smbind/unsupported-webserver"]["description"]="No supported webserver was found
 A supported webserver was not found to automatically configure.
 This package can only automatically configure apache webservers
 to use the program. If you are using a different webserver, you
 will need to point it to the smbind files in
 /usr/share/smbind/php (see the webserver config files in
 /etc/smbind/apache.conf for examples) and possibly
 restart the webserver during installation, and then remove the
 configuration when removing the package.
";
$elem["smbind/unsupported-webserver"]["descriptionde"]="Keine unterstützten Webserver gefunden
 Es wurde kein unterstützter Webserver zrm automatischen Konfiguration gefunden. Dies Paket kann nur Apache-Webserver für seinen Einsatz automatisch konfigurieren. Falls Sie einen anderen Webserver verwenden, müssen Sie ihn auf die Smbind-Dateien in /usr/share/smbind/php verweisen (Beispiele finden Sie in den Konfigurationsdateien unter /etc/smbind/apache.conf) und möglicherweise den Webserver während der Installation neu starten. Wenn Sie das Paket entfernen, müssen Sie auch die Konfiguration entfernen.
";
$elem["smbind/unsupported-webserver"]["descriptionfr"]="Pas de serveur web géré
 Aucun serveur web pouvant être configuré automatiquement n'a été trouvé. La configuration automatique n'est possible que pour les serveurs de type Apache. Si vous utilisez un autre serveur web, vous devrez le pointer vers les fichiers de smbind dans /usr/share/smbind/php (vous pouvez prendre exemple sur le fichier /etc/smbind/apache.conf) puis éventuellement le redémarrer durant l'installation. Il sera également nécessaire de supprimer la configuration spécifique pour smbind si le paquet est supprimé.
";
$elem["smbind/unsupported-webserver"]["default"]="";
PKG_OptionPageTail2($elem);
?>
