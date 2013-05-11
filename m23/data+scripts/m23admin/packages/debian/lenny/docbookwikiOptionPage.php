<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("docbookwiki");

$elem["docbookwiki/purge_books"]["type"]="boolean";
$elem["docbookwiki/purge_books"]["description"]="Remove books during purge?
 If you accept here, any books uploaded into DocBookWiki, including XML
 source and downloadable formats, will be removed along with the program
 files.
";
$elem["docbookwiki/purge_books"]["descriptionde"]="Bücher beim vollständigen Löschen (purge) entfernen?
 Falls Sie hier zustimmen, werden alle Bücher, sowohl im XML-Quell- als auch in herunterladbaren Formaten, die in das DocBookWiki hochgeladen wurden, zusammen mit den Programmdateien entfernt.
";
$elem["docbookwiki/purge_books"]["descriptionfr"]="Voulez vous suprimer les livres à la purge du paquet ?
 Si vous choisissez cette option, tous les livres téléchargés sur DocBookWiki, y compris les sources XML et les formats téléchargables, seront suprimés avec le programme.
";
$elem["docbookwiki/purge_books"]["default"]="false";
$elem["docbookwiki/generate_downloads"]["type"]="boolean";
$elem["docbookwiki/generate_downloads"]["description"]="Generate downloadable formats now?
 DocBookWiki can generate downloadable formats (HTML, PDF, etc) for the
 default set of books during installation, but this will take quite some
 time to do.  If you do not want to generate these now, decline here and
 they will be generated when the next DocBookWiki weekly cron job runs.
";
$elem["docbookwiki/generate_downloads"]["descriptionde"]="Herunterladbare Formate jetzt erzeugen?
 DocBookWiki kann Formate, die zum Runterladen geeignet sind (HTML, PDF, usw.), während der Installation für den Standardsatz an Büchern erstellen, allerdings benötigt dies einige Zeit. Falls Sie daher diese Format jetzt nicht erstellen möchten, lehnen Sie hier ab und sie werden beim nächsten Lauf des wöchentlichen Cron-Jobs erstellt.
";
$elem["docbookwiki/generate_downloads"]["descriptionfr"]="Voulez vous créer des formats téléchargables maintenant ?
 DocBookWiki peut créer des formats téléchargables (tels que HTML, PDF, etc.) pour le jeu de livres par défaut, cependant la procédure est assez longue. Si vous refusez de les générer maintenant, ils seront construits lors de la prochaine exécution hebdomadaire des tâches planifiées de DocBookWiki.
";
$elem["docbookwiki/generate_downloads"]["default"]="false";
$elem["docbookwiki/reconfigure_webserver"]["type"]="multiselect";
$elem["docbookwiki/reconfigure_webserver"]["choices"][1]="apache";
$elem["docbookwiki/reconfigure_webserver"]["choices"][2]="apache-ssl";
$elem["docbookwiki/reconfigure_webserver"]["choices"][3]="apache-perl";
$elem["docbookwiki/reconfigure_webserver"]["choicesde"][1]="Apache";
$elem["docbookwiki/reconfigure_webserver"]["choicesde"][2]="Apache-SSL";
$elem["docbookwiki/reconfigure_webserver"]["choicesde"][3]="Apache-Perl";
$elem["docbookwiki/reconfigure_webserver"]["choicesfr"][1]="Apache";
$elem["docbookwiki/reconfigure_webserver"]["choicesfr"][2]="Apache SSL";
$elem["docbookwiki/reconfigure_webserver"]["choicesfr"][3]="Apache Perl";
$elem["docbookwiki/reconfigure_webserver"]["description"]="Which web server would you like to reconfigure automatically?
 DocBookWiki supports any web server that PHP does, but this automatic
 configuration process only supports Apache.
";
$elem["docbookwiki/reconfigure_webserver"]["descriptionde"]="Welchen Webserver möchten Sie automatisch umkonfigurieren?
 DocBookWiki unterstützt jeden Webserver, den PHP unterstützt, aber dieser automatische Konfigurationsprozess unterstützt nur Apache.
";
$elem["docbookwiki/reconfigure_webserver"]["descriptionfr"]="Serveur web à reconfigurer :
 DocBookWiki gère les mêmes serveurs web que PHP. Cependant, la procédure de configuration automatique ne gère que les serveurs Apache.
";
$elem["docbookwiki/reconfigure_webserver"]["default"]="";
$elem["docbookwiki/restart_webserver"]["type"]="boolean";
$elem["docbookwiki/restart_webserver"]["description"]="Do you want to restart Apache now?
 In order to activate the new configuration Apache has to be restarted. If
 you do not confirm here, please remember to restart Apache manually.
";
$elem["docbookwiki/restart_webserver"]["descriptionde"]="Möchten Sie Apache jetzt neu starten?
 Damit die neue Konfiguration aktiviert wird muss Apache neu gestartet werden. Falls Sie hier nicht bestätigen, denken Sie daran, Apache manuell neu zu starten.
";
$elem["docbookwiki/restart_webserver"]["descriptionfr"]="Voulez-vous redémarrer Apache maintenant ?
 Pour que la nouvelle configuration soit prise en compte Apache doit être redémarré. Si vous choisissez de ne pas le redémarrer, il sera nécessaire de le faire plus tard.
";
$elem["docbookwiki/restart_webserver"]["default"]="false";
$elem["docbookwiki/setup_password"]["type"]="password";
$elem["docbookwiki/setup_password"]["description"]="Password for web-based setup system:
 DocBookWiki comes with an administration script that can help you with
 managing users. The script is located at http://localhost/books/admin.php.
 For security reasons it requires authorization.  The administrator's
 username is 'superuser' and the default password is 'admin'.
 .
 It is recommended that you enter a different superuser password here.
 Leave empty if you want to use the default password.
";
$elem["docbookwiki/setup_password"]["descriptionde"]="Passwort für das web-basierte Einrichtungssystem:
 DocBookWiki wird mit einem administrativen Skript ausgeliefert, das Ihnen bei der Benutzerverwaltung helfen kann. Dieses Skript befindet sich unter http://localhost/books/admin.php. Aus Sicherheitsgründen benötigt es eine Anmeldung. Der Benutzername des Administrators ist »superuser« und das Standardpasswort lautet »admin«.
 .
 Es wird empfohlen, dass Sie ein anderes Administratorpasswort hier eingeben. Lassen Sie die Eingabe hier leer, um das Standardpasswort zu verwenden.
";
$elem["docbookwiki/setup_password"]["descriptionfr"]="Mot de passe pour le système de configuration web :
 DocBookWiki fournit un script d'assistance à la gestion des utilisateurs. Ce script peut être lancer en pointant le navigateur web sur http://localhost/books/admin.php. Pour des raisons de sécurité, une autorisation est nécessaire. L'identifiant de l'administrateur est « superuser ».
 .
 Il est recommandé de changer le mot de passe de « superuser » maintenant. Si le chamq est laissé vide, le mot de passe par défaut (« admin ») sera utilisé.
";
$elem["docbookwiki/setup_password"]["default"]="admin";
PKG_OptionPageTail2($elem);
?>
