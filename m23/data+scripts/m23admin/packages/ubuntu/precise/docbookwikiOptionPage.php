<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("docbookwiki");

$elem["docbookwiki/purge_books"]["type"]="boolean";
$elem["docbookwiki/purge_books"]["description"]="Remove books during purge?
 If you choose this option, any book uploaded into DocBookWiki, including XML
 source and downloadable formats, will be removed along with the program
 files when the package is purged.
";
$elem["docbookwiki/purge_books"]["descriptionde"]="Bücher beim vollständigen Löschen (purge) entfernen?
 Falls Sie dieser Option zustimmen, werden alle Bücher, sowohl im XML-Quell- als auch in herunterladbaren Formaten, die in das DocBookWiki hochgeladen wurden, zusammen mit den Programmdateien entfernt, wenn das Paket vollständig gelöscht wird.
";
$elem["docbookwiki/purge_books"]["descriptionfr"]="Voulez vous supprimer les livres à la purge du paquet ?
 Si vous choisissez cette option, tous les livres téléchargés sur DocBookWiki, y compris les sources XML et les formats téléchargeables, seront supprimés avec le programme.
";
$elem["docbookwiki/purge_books"]["default"]="false";
$elem["docbookwiki/generate_downloads"]["type"]="boolean";
$elem["docbookwiki/generate_downloads"]["description"]="Generate downloadable formats now?
 DocBookWiki can generate downloadable formats (HTML, PDF, etc.) for the
 default set of books during installation, but this will take quite some
 time to do.
 .
 If you do not want to generate these now, they will be generated when
 the next DocBookWiki weekly cron job runs.
";
$elem["docbookwiki/generate_downloads"]["descriptionde"]="Herunterladbare Formate jetzt erzeugen?
 DocBookWiki kann Formate, die zum Runterladen geeignet sind (HTML, PDF, usw.), während der Installation für den Standardsatz an Büchern erstellen, allerdings benötigt dies einige Zeit.
 .
 Falls Sie daher diese Formate jetzt nicht erstellen möchten, werden sie beim nächsten Lauf des wöchentlichen Cron-Jobs von DocBookWiki erstellt.
";
$elem["docbookwiki/generate_downloads"]["descriptionfr"]="Voulez vous créer des formats téléchargeables maintenant ?
 DocBookWiki peut, lors de l'installation, créer des formats téléchargeables (tels que HTML, PDF, etc.) pour le jeu de livres par défaut, cependant la procédure est assez longue.
 .
 Si vous refusez de les générer maintenant, ils seront construits lors de la prochaine exécution hebdomadaire des tâches planifiées de DocBookWiki.
";
$elem["docbookwiki/generate_downloads"]["default"]="false";
$elem["docbookwiki/reconfigure_webserver"]["type"]="multiselect";
$elem["docbookwiki/reconfigure_webserver"]["description"]="Web server to reconfigure for DocBookWiki:
 DocBookWiki supports any web server that PHP does, but this automatic
 configuration process only supports Apache.
";
$elem["docbookwiki/reconfigure_webserver"]["descriptionde"]="Webserver, der für DocBookWiki umkonfiguriert werden soll:
 DocBookWiki unterstützt jeden Webserver, den PHP unterstützt, aber dieser automatische Konfigurationsprozess unterstützt nur Apache.
";
$elem["docbookwiki/reconfigure_webserver"]["descriptionfr"]="Serveur web à reconfigurer pour DocBookWiki :
 DocBookWiki gère les mêmes serveurs web que PHP. Cependant, la procédure de configuration automatique ne gère que les serveurs Apache.
";
$elem["docbookwiki/reconfigure_webserver"]["default"]="";
$elem["docbookwiki/restart_webserver"]["type"]="boolean";
$elem["docbookwiki/restart_webserver"]["description"]="Do you want to restart the web server now?
 In order to activate the new configuration, the web server has to be
 restarted. You may however prefer doing this manually later.
";
$elem["docbookwiki/restart_webserver"]["descriptionde"]="Möchten Sie den Webserver jetzt neu starten?
 Damit die neue Konfiguration aktiviert wird, muss der Webserver neu gestartet werden. Sie können dies auch manuell später durchführen.
";
$elem["docbookwiki/restart_webserver"]["descriptionfr"]="Voulez-vous redémarrer le serveur web maintenant ?
 Pour que la nouvelle configuration soit prise en compte, le serveur web doit être redémarré. Si vous choisissez de ne pas le redémarrer, il sera nécessaire de le faire plus tard.
";
$elem["docbookwiki/restart_webserver"]["default"]="false";
$elem["docbookwiki/setup_password"]["type"]="password";
$elem["docbookwiki/setup_password"]["description"]="Password for DocBookWiki web-based setup system:
 DocBookWiki comes with an administration script that can help you with
 managing users. The script is located at http://localhost/books/admin.php.
 For security reasons it requires authorization. The administrator's
 username is \"superuser\" and the default password is \"admin\".
 .
 It is recommended that you enter a different superuser password here.
 Leave empty if you want to use the default password.
";
$elem["docbookwiki/setup_password"]["descriptionde"]="Passwort für das web-basierte Einrichtungssystem von DocBookWiki:
 DocBookWiki wird mit einem administrativen Skript ausgeliefert, das Ihnen bei der Benutzerverwaltung helfen kann. Dieses Skript befindet sich unter http://localhost/books/admin.php. Aus Sicherheitsgründen benötigt es eine Anmeldung. Der Benutzername des Administrators ist »superuser« und das Standardpasswort lautet »admin«.
 .
 Es wird empfohlen, dass Sie ein anderes Administratorpasswort hier eingeben. Lassen Sie die Eingabe hier leer, um das Standardpasswort zu verwenden.
";
$elem["docbookwiki/setup_password"]["descriptionfr"]="Mot de passe pour le système de configuration web de DocBookWiki :
 DocBookWiki fournit un script d'assistance à la gestion des utilisateurs. Ce script peut être lancé en pointant un navigateur web sur http://localhost/books/admin.php. Pour des raisons de sécurité, une autorisation est nécessaire. L'identifiant de l'administrateur est « superuser » et le mot de passe est « admin ».
 .
 Il est recommandé de changer le mot de passe de l'administrateur maintenant. Si le champ est laissé vide, le mot de passe par défaut (« admin ») sera utilisé.
";
$elem["docbookwiki/setup_password"]["default"]="admin";
$elem["docbookwiki/sudo_warning"]["type"]="note";
$elem["docbookwiki/sudo_warning"]["description"]="Sudo-related changes needed for DocBookWiki
 In order for DocBookWiki to function correctly, you must run the command
 \"visudo\" after installation finishes. That command will open the
 \"sudo\" configuration file where you should add the following:
 .
 #includedir /etc/sudoers.d
";
$elem["docbookwiki/sudo_warning"]["descriptionde"]="Für DocBookWiki benötigte Sudo-bezogene Änderungen
 Damit DocBookWiki korrekt funktioniert, müssen Sie nach Abschluss der Installation den Befehl »visudo« eingeben. Dieser Befehl wird die Konfigurationsdatei von »sudo« öffnen, in der Sie folgendes ergänzen sollten:
 .
 #includedir /etc/sudoers.d
";
$elem["docbookwiki/sudo_warning"]["descriptionfr"]="Modifications liées à sudo nécessaires pour DocBookWiki
 Pour que DocBookWiki fonctionne normalement, vous devrez lancer la commande « visudo » une fois l'installation terminée. Cette commande ouvrira le fichier de configuration de « sudo » où vous devrez ajouter ce qui suit :
 .
 #includedir /etc/sudoers.d
";
$elem["docbookwiki/sudo_warning"]["default"]="";
PKG_OptionPageTail2($elem);
?>
