<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gallery2");

$elem["gallery2/webserver_type"]["type"]="multiselect";
$elem["gallery2/webserver_type"]["choices"][1]="apache";
$elem["gallery2/webserver_type"]["choices"][2]="apache-ssl";
$elem["gallery2/webserver_type"]["choices"][3]="apache-perl";
$elem["gallery2/webserver_type"]["choicesde"][1]="Apache";
$elem["gallery2/webserver_type"]["choicesde"][2]="Apache-ssl";
$elem["gallery2/webserver_type"]["choicesde"][3]="Apache-perl";
$elem["gallery2/webserver_type"]["choicesfr"][1]="Apache";
$elem["gallery2/webserver_type"]["choicesfr"][2]="Apache-ssl";
$elem["gallery2/webserver_type"]["choicesfr"][3]="Apache-perl";
$elem["gallery2/webserver_type"]["description"]="Web server to reconfigure automatically:
 If you do not select a web server to reconfigure automatically, gallery2
 will not be usable until you reconfigure your webserver to enable
 Gallery2.
";
$elem["gallery2/webserver_type"]["descriptionde"]="Web-Server, der automatisch rekonfiguriert werden soll:
 Falls Sie keinen Web-Server für für die automatische Rekonfiguration auswählen, wird Gallery2 nicht funktionieren, bis Sie einen Web-Server für Gallery2 aktiviert haben.
";
$elem["gallery2/webserver_type"]["descriptionfr"]="Serveur Web à reconfigurer automatiquement :
 Si vous ne choisissez pas un serveur Web à reconfigurer automatiquement, Gallery2 sera inutilisable jusqu'à ce que vous reconfiguriez correctement votre serveur
";
$elem["gallery2/webserver_type"]["default"]="apache, apache-ssl, apache-perl, apache2";
$elem["gallery2/restart-webserver"]["type"]="boolean";
$elem["gallery2/restart-webserver"]["description"]="Should ${webserver} be restarted?
 Remember that in order to activate the new configuration, ${webserver} has
 to be restarted. You can also restart ${webserver} by manually executing
 'invoke-rc.d ${webserver} restart'.
";
$elem["gallery2/restart-webserver"]["descriptionde"]="Soll ${webserver} neu gestartet werden?
 Beachten Sie, dass ${webserver} neu gestartet werden muss, damit die neue Konfiguration aktiviert wird. Sie können ${webserver} auch über »invoke-rc.d ${webserver} restart« neu starten.
";
$elem["gallery2/restart-webserver"]["descriptionfr"]="Faut-il redémarrer ${webserver} ?
 Veuillez noter que, pour que la nouvelle configuration soit active, ${webserver} doit être redémarré. Vous pouvez aussi redémarrer ${webserver} en exécutant la commande « invoke-rc.d ${webserver} restart ».
";
$elem["gallery2/restart-webserver"]["default"]="false";
$elem["gallery2/mysql/configure"]["type"]="boolean";
$elem["gallery2/mysql/configure"]["description"]="Configure MySQL?
 Please confirm whether Gallery2 should attempt to configure MySQL
 automatically.  If you do not choose this option, please see the
 instructions in /usr/share/doc/gallery2/README.Debian. Do not choose
 this option if mysql-server is being installed along with
 gallery2. Read the file /usr/share/doc/mysql-serv/README.Debian to
 enable networking. It may be wise to set a new MySQL root password
 when installing mysql-server.
";
$elem["gallery2/mysql/configure"]["descriptionde"]="Konfiguriere MySQL?
 Bitte bestätigen Sie, ob Gallery2 versuchen soll, MySQL automatisch zu konfigurieren. Falls Sie diese Option nicht wählen, lesen Sie die Anweisungen in /usr/share/doc/gallery2/README.Debian. Lehnen Sie dies ab, falls MySQL-Server gleichzeitig mit Gallery2 installiert wird. Lesen Sie die Datei /usr/share/doc/mysql-serv/README.Debian um Netzzugriff zu aktivieren. Es kann sinnvoll sein, ein neues MySQL Root-Passwort zu setzen, wenn Sie den MySQL-Server installieren.
";
$elem["gallery2/mysql/configure"]["descriptionfr"]="Faut-il configurer MySQL ?
 Veuillez choisir si Gallery2 doit tenter de configurer MySQL automatiquement. Si vous ne choisissez pas cette option, veuillez lire les instructions dans /usr/share/doc/gallery2/README.Debian. Ne la choisissez pas si mysql-server est installé en même temps que gallery2. Veuillez lire le fichier /usr/share/doc/mysql-serv/README.Debian afin d'activer le réseau. Il peut être sage de choisir un nouveau mot de passe pour le superutilisateur de MySQL lors de l'installation de mysql-server.
";
$elem["gallery2/mysql/configure"]["default"]="true";
$elem["gallery2/mysql/dbserver"]["type"]="string";
$elem["gallery2/mysql/dbserver"]["description"]="MySQL Host:
 Please mention the name or IP address of the host running MySQL that
 will store the Gallery2 database.
";
$elem["gallery2/mysql/dbserver"]["descriptionde"]="MySQL-Rechner:
 Der Name oder die IP des Rechners, auf dem der MySQL läuft, der die Gallery2-Datenbank speichern wird.
";
$elem["gallery2/mysql/dbserver"]["descriptionfr"]="Hôte MySQL :
 Veuillez indiquer le nom ou l'adresse IP de l'hôte qui exécute le serveur MySQL qui accueille la base de données de Gallery2.
";
$elem["gallery2/mysql/dbserver"]["default"]="localhost";
$elem["gallery2/mysql/dbadmin"]["type"]="string";
$elem["gallery2/mysql/dbadmin"]["description"]="Database admin user who can create a database:
 Database admin user account capable of creating new databases.
";
$elem["gallery2/mysql/dbadmin"]["descriptionde"]="Datenbankadministrator, der Datenbanken erzeugen kann
 Datenbank-Administratorbenutzerkonto, dass neue Datenbanken erstellen kann.
";
$elem["gallery2/mysql/dbadmin"]["descriptionfr"]="Identifiant de l'administrateur du serveur de bases de données :
 Veuillez indiquer l'identifiant d'un administrateur du serveur de bases de données, qui possède les droits de création de nouvelles bases de données.
";
$elem["gallery2/mysql/dbadmin"]["default"]="root";
$elem["gallery2/purge"]["type"]="boolean";
$elem["gallery2/purge"]["description"]="Delete database on purge?
 Please choose whether the database should be removed when Gallery2 is purged.
";
$elem["gallery2/purge"]["descriptionde"]="Datenbank beim vollständigen Löschen entfernen?
 Bitte wählen Sie aus, ob die Datenbank entfernt werden soll, wenn Gallery2 vollständig gelöscht wird.
";
$elem["gallery2/purge"]["descriptionfr"]="Faut-il supprimer la base de données à la purge du paquet ?
 Veuillez confirmer si la base de données doit être supprimée lorsque le paquet Gallery2 est purgé.
";
$elem["gallery2/purge"]["default"]="true";
$elem["gallery2/mysql/dbname"]["type"]="string";
$elem["gallery2/mysql/dbname"]["description"]="Gallery2 database name:
";
$elem["gallery2/mysql/dbname"]["descriptionde"]="Gallery2 Datenbank-Name:
";
$elem["gallery2/mysql/dbname"]["descriptionfr"]="Nom de la base de données de Gallery2 :
";
$elem["gallery2/mysql/dbname"]["default"]="gallery2";
$elem["gallery2/mysql/dbadmpass"]["type"]="password";
$elem["gallery2/mysql/dbadmpass"]["description"]="Database admin password:
";
$elem["gallery2/mysql/dbadmpass"]["descriptionde"]="Datenbank Administratorpasswort:
";
$elem["gallery2/mysql/dbadmpass"]["descriptionfr"]="Mot de passe de l'administrateur du serveur de bases de données :
";
$elem["gallery2/mysql/dbadmpass"]["default"]="";
PKG_OptionPageTail2($elem);
?>
