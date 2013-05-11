<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("snort-pgsql");

$elem["snort-pgsql/startup"]["type"]="select";
$elem["snort-pgsql/startup"]["choices"][1]="boot";
$elem["snort-pgsql/startup"]["choices"][2]="dialup";
$elem["snort-pgsql/startup"]["choicesde"][1]="Systemstart";
$elem["snort-pgsql/startup"]["choicesde"][2]="Einwahl";
$elem["snort-pgsql/startup"]["choicesfr"][1]="Au démarrage";
$elem["snort-pgsql/startup"]["choicesfr"][2]="À la connexion";
$elem["snort-pgsql/startup"]["description"]="Snort start method:
 Snort can be started during boot, when connecting to the net with pppd or
 only manually with the /usr/sbin/snort command.
";
$elem["snort-pgsql/startup"]["descriptionde"]="Startmethode für Snort:
 Snort kann beim Systemstart, bei der Einwahl ins Internet mit Pppd oder nur manuell mit dem Befehl /usr/sbin/snort gestartet werden.
";
$elem["snort-pgsql/startup"]["descriptionfr"]="Méthode de lancement de Snort :
 Snort peut être lancé au démarrage du système, lors de la connexion au réseau avec pppd ou à la demande via la commande « /usr/sbin/snort ».
";
$elem["snort-pgsql/startup"]["default"]="boot";
$elem["snort-pgsql/interface"]["type"]="string";
$elem["snort-pgsql/interface"]["description"]="Interface(s) which Snort should listen on:
 This value is usually 'eth0', but this may be inappropriate in some
 network environments; for a dialup connection 'ppp0' might be more
 appropiate (see the output of '/sbin/ifconfig').
 .
 Typically, this is the same interface as the 'default route' is on. You can
 determine which interface is used for this by running '/sbin/route -n'
 (look for '0.0.0.0').
 .
 It is also not uncommon to use an interface with no IP address
 configured in promiscuous mode. For such cases, select the
 interface in this system that is physically connected to the network
 that should be inspected, enable promiscuous mode later on and make sure
 that the network traffic is sent to this interface (either connected
 to a 'port mirroring/spanning' port in a switch, to a hub or to a tap).
 .
 You can configure multiple interfaces, just by adding more than
 one interface name separated by spaces. Each interface can have its
 own specific configuration.
";
$elem["snort-pgsql/interface"]["descriptionde"]="Schnittstelle(n) an der/denen Snort lauschen soll:
 Dieser Wert ist normalerweise »eth0«, aber das kann in einigen Netzwerkumgebung anders sein; bei einer Einwahlverbindung sollte »ppp0« besser passen (sehen Sie sich die Ausgabe des Befehls '/sbin/ifconfig' an).
 .
 Normalerweise ist das die selbe Schnittstelle, auf die die Standard-Route zeigt. Sie können die verwendete Schnittstelle mit dem Befehl '/sbin/route -n' herausfinden (suchen Sie nach »0.0.0.0«).
 .
 Es ist auch üblich, Snort an einer Schnittstelle ohne IP-Adresse im Modus »Promiscuous« zu betreiben. In diesem Fall wählen Sie die Schnittstelle aus, die physisch mit dem Netzwerk verbunden ist, das Sie überwachen wollen und schalten später den Modus »Promiscuous« ein. Stellen Sie sicher, dass der Netzwerkverkehr die Schnittstelle erreicht (entweder sie ist verbunden mit einem Anschluss für »Port-Mirroring/Spanning« eines Switches, mit einem Hub oder Tap).
 .
 Sie können mehrere Schnittstellennamen durch Leerzeichen getrennt eingeben. Jede Schnittstelle kann eigene Einstellungen haben.
";
$elem["snort-pgsql/interface"]["descriptionfr"]="Interface(s) où Snort sera à l'écoute :
 La valeur habtuelle est « eth0 » mais elle peut varier selon l'environnement réseau : pour une connexion ponctuelle (« dialup »), « ppp0 » est probablement plus adapté. Il est suggéré d'utiliser l'affichage de la commande « /sbin/ifconfig ».
 .
 L'interface est celle qu'utilise la route par défaut. Vous pouvez obtenir cette information avec la commande « /sbin/route -n » (rechercher « 0.0.0.0 »).
 .
 Il est également fréquent d'utiliser Snort sur une interface sans adresse IP, en mode « promiscuous ». Dans ce cas, choisissez l'interface connectée au réseau que vous voulez analyser et activez ce mode plus tard. Assurez-vous que le trafic réseau est bien envoyé à cette interface (soit connectée à un port de miroir ou de répartition, « mirroring/spanning port » sur un commutateur réseau, soit connectée à un répartiteur ou à un « tap »).
 .
 Il est possible de configurer plusieurs interfaces en les mentionnant toutes, séparées par des espaces. Chacune d'elles pourra avoir une configuration différente.
";
$elem["snort-pgsql/interface"]["default"]="eth0";
$elem["snort-pgsql/address_range"]["type"]="string";
$elem["snort-pgsql/address_range"]["description"]="Address range for the local network:
 Please use the CIDR form - for example, 192.168.1.0/24 for a block of
 256 addresses or 192.168.1.42/32 for just one. Multiple values should
 be comma-separated (without spaces).
 .
 Please note that if Snort is configured to use multiple interfaces,
 it will use this value as the HOME_NET definition for all of them.
";
$elem["snort-pgsql/address_range"]["descriptionde"]="Adressbereich des lokalen Netzwerks:
 Bitte benutzen Sie das CIDR-Format, z. B. 192.168.1.0/24 für einen Block von 256 IP-Adressen oder 192.168.1.42/32 für nur eine. Mehrere IP-Adressen sollten durch Kommas getrennt werden (ohne Leerzeichen).
 .
 Bitte beachten Sie: Wenn für Snort mehrere Schnittstellen eingerichtet sind, wird diese Festlegung als HOME_NET-Definition für alle gemeinsam verwendet.
";
$elem["snort-pgsql/address_range"]["descriptionfr"]="Plage d'adresses du réseau local :
 Veuillez utiliser le format CIDR, par exemple 192.168.1.0/24 pour un bloc de 256 adresses IP ou 192.168.1.42/32 pour une seule adresse. Il est possible d'indiquer plusieurs adresses sur une seule ligne en les séparant par des virgules (sans espaces).
 .
 Veuillez noter que si Snort est configuré pour utiliser plusieurs interfaces, la valeur définie ici sera la valeur HOME_NET pour chacune d'elles.
";
$elem["snort-pgsql/address_range"]["default"]="192.168.0.0/16";
$elem["snort-pgsql/disable_promiscuous"]["type"]="boolean";
$elem["snort-pgsql/disable_promiscuous"]["description"]="Should Snort disable promiscuous mode on the interface?
 Disabling promiscuous mode means that Snort will only see packets
 addressed to the interface it is monitoring. Enabling it allows Snort to
 check every packet that passes the Ethernet segment even if it's a
 connection between two other computers.
";
$elem["snort-pgsql/disable_promiscuous"]["descriptionde"]="Soll Snort den Modus »Promiscuous« an der Schnittstelle ausschalten?
 Das Ausschalten des Modus' »Promiscuous« bedeutet, dass Snort nur die Pakete sehen wird, die an die Schnittstelle adressiert sind, die es überwacht. Das Einschalten ermöglicht es Snort, alle Pakete zu überprüfen, die das Netzwerk-Segment durchlaufen, selbst wenn es eine Verbindung zwischen zwei anderen Rechnern ist.
";
$elem["snort-pgsql/disable_promiscuous"]["descriptionfr"]="Faut-il désactiver le mode « promiscuous » sur l'interface ?
 Si le mode « promiscuous » est désactivé, Snort ne verra que les paquets adressés à sa propre interface. S'il est activé, il vérifiera chaque paquet transitant sur le segment Ethernet même s'il s'agit d'échanges entres deux autres ordinateurs.
";
$elem["snort-pgsql/disable_promiscuous"]["default"]="false";
$elem["snort-pgsql/invalid_interface"]["type"]="error";
$elem["snort-pgsql/invalid_interface"]["description"]="Invalid interface
 Snort is trying to use an interface which does not exist or is down.
 Either it is defaulting inappropriately to 'eth0', or you specified
 one which is invalid.
";
$elem["snort-pgsql/invalid_interface"]["descriptionde"]="Ungültige Schnittstelle
 Snort versucht eine Schnittstelle zu nutzen, die es nicht gibt oder die nicht aktiv ist. Entweder ist die Vorgabe »eth0« hier unpassend, oder Sie haben eine ungültige Schnittstelle eingegeben.
";
$elem["snort-pgsql/invalid_interface"]["descriptionfr"]="Interface non valable
 Snort tente d'utiliser une interface inexistante ou inactive. Soit il utilise par erreur la valeur par défaut (eth0), soit l'adresse indiquée n'est pas valable.
";
$elem["snort-pgsql/invalid_interface"]["default"]="";
$elem["snort-pgsql/send_stats"]["type"]="boolean";
$elem["snort-pgsql/send_stats"]["description"]="Should daily summaries be sent by e-mail?
 A cron job can be set up to send daily summaries of Snort logs to a
 selected e-mail address.
 .
 Please choose whether you want to activate this feature.
";
$elem["snort-pgsql/send_stats"]["descriptionde"]="Sollen tägliche Zusammenfassungen per E-Mail verschickt werden?
 Es kann ein Cronjob eingerichtet werden, der täglich Zusammenfassungen der Protokolle von Snort an eine bestimmte E-Mail-Adresse schickt.
 .
 Bitte stimmen Sie zu, wenn Sie das wollen.
";
$elem["snort-pgsql/send_stats"]["descriptionfr"]="Faut-il envoyer des rapports quotidiens par courriel ?
 Une tâche quotidienne de cron créera un résumé de l'information des journaux de Snort et l'enverra à une adresse électronique prédéfinie.
 .
 Veuillez choisir si vous souhaitez activer cette fonctionnalité.
";
$elem["snort-pgsql/send_stats"]["default"]="true";
$elem["snort-pgsql/stats_rcpt"]["type"]="string";
$elem["snort-pgsql/stats_rcpt"]["description"]="Recipient of daily statistics mails:
 Please specify the e-mail address that should receive daily summaries
 of Snort logs.
";
$elem["snort-pgsql/stats_rcpt"]["descriptionde"]="Empfänger der täglichen Statistik-E-Mails:
 Bitte geben Sie die E-Mail-Adresse ein, an die täglich Zusammenfassungen der Protokolle von Snort geschickt werden sollen.
";
$elem["snort-pgsql/stats_rcpt"]["descriptionfr"]="Destinataire des courriers électroniques quotidiens de statistiques :
 Veuillez indiquer l'adresse électronique qui recevra les résumés quotidiens des journaux de Snort.
";
$elem["snort-pgsql/stats_rcpt"]["default"]="root";
$elem["snort-pgsql/options"]["type"]="string";
$elem["snort-pgsql/options"]["description"]="Additional custom options:
 Please specify any additional options Snort should use.
";
$elem["snort-pgsql/options"]["descriptionde"]="Zusätzliche benutzerspezifische Optionen:
 Bitte geben Sie alle weiteren Optionen ein, die Snort benutzen soll.
";
$elem["snort-pgsql/options"]["descriptionfr"]="Options personnelles supplémentaires :
 Veuillez indiquer les options supplémentaires qu'utilisera Snort.
";
$elem["snort-pgsql/options"]["default"]="";
$elem["snort-pgsql/stats_treshold"]["type"]="string";
$elem["snort-pgsql/stats_treshold"]["description"]="Minimum occurrences before alerts are reported:
 Please enter the minimum number of alert occurrences before a given alert is
 included in the daily statistics.
";
$elem["snort-pgsql/stats_treshold"]["descriptionde"]="Minimale Ereignisanzahl ab der Alarme gemeldet werden:
 Bitte geben Sie die minimale Anzahl eines Alarms ein, ab der dieser Alarm in die tägliche Statistik aufgenommen wird.
";
$elem["snort-pgsql/stats_treshold"]["descriptionfr"]="Nombre d'occurrences minimales avant l'envoi d'alertes :
 Une alerte doit apparaître un nombre de fois supérieur à celui indiqué pour être comptabilisée dans les statistiques quotidiennes.
";
$elem["snort-pgsql/stats_treshold"]["default"]="1";
$elem["snort-pgsql/please_restart_manually"]["type"]="note";
$elem["snort-pgsql/please_restart_manually"]["description"]="Snort restart required
 As Snort is manually launched, you need to run '/etc/init.d/snort' for
 the changes to take place.
";
$elem["snort-pgsql/please_restart_manually"]["descriptionde"]="Neustart von Snort erforderlich
 Da Snort manuell gestartet wurde, müssen Sie den Befehl '/etc/init.d/snort' aufrufen, damit die Änderungen wirksam werden.
";
$elem["snort-pgsql/please_restart_manually"]["descriptionfr"]="Redémarrage de Snort indispensable
 Comme Snort est lancé manuellement, il est nécessaire d'exécuter la commande « /etc/init.d/snort » pour que les modifications soient prises en compte.
";
$elem["snort-pgsql/please_restart_manually"]["default"]="";
$elem["snort-pgsql/config_parameters"]["type"]="error";
$elem["snort-pgsql/config_parameters"]["description"]="Obsolete configuration file
 This system uses an obsolete configuration file
 (/etc/snort/snort.common.parameters)
 which has been automatically converted into the new configuration
 file format (at /etc/default/snort).
 .
 Please review the new configuration and remove the obsolete
 one. Until you do this, the initialization script will not use the new
 configuration and you will not take advantage of the benefits
 introduced in newer releases.
";
$elem["snort-pgsql/config_parameters"]["descriptionde"]="Veraltete Konfigurationsdatei
 Dieses System nutzt eine veraltete Konfigurationsdatei (/etc/snort/snort.common.parameters), die automatisch in das neue Format (nach /etc/default/snort) umgewandelt wurde.
 .
 Bitte überprüfen Sie die neue Konfigurationsdatei und löschen Sie die veraltete. Bis dahin wird das Startskript die neuen Einstellungen nicht verwenden und Sie können die Vorteile der neuen Versionen nicht nutzen.
";
$elem["snort-pgsql/config_parameters"]["descriptionfr"]="Fichier de configuration obsolète
 Le système utilise un fichier de configuration obsolète (/etc/snort/snort.common.parameters) qui a été automatiquement converti vers le nouveau format (dans /etc/default/snort).
 .
 Veuillez vérifier le nouveau fichier de configuration et supprimer l'ancien. Tant que cela n'aura pas été fait, le script de démarrage n'utilisera pas la nouvelle configuration et vous ne bénéficierez pas des améliorations des versions plus récentes.
";
$elem["snort-pgsql/config_parameters"]["default"]="";
$elem["snort-pgsql/configure_db"]["type"]="boolean";
$elem["snort-pgsql/configure_db"]["description"]="Set up a database for snort-pgsql to log to?
 No database has been set up for Snort to log to. Before continuing,
 you should make sure you have:
 .
  - the server host name (that server must allow TCP connections
    from this machine);
  - a database on that server;
  - a username and password to access the database.
 .
 If some of these requirements are missing, reject this option and
 run with regular file logging support.
 .
 Database logging can be reconfigured later by running
 'dpkg-reconfigure -plow snort-pgsql'.
";
$elem["snort-pgsql/configure_db"]["descriptionde"]="Eine Protokoll-Datenbank für Snort-pgsql einrichten?
 Es wurde keine Datenbank eingerichtet, in die Snort protokolliert. Bevor Sie weiter machen, sollten Sie sicher stellen, dass Sie folgendes haben:
 .
  - Rechnernamen des Servers (er muss TCP-Verbindungen von diesem
    Rechner zulassen);
  - eine Datenbank auf diesem Server;
  - Benutzernamen und Passwort für den Zugang zur Datenbank.
 .
 Wenn nicht alle Voraussetzungen erfüllt sind, lehnen Sie hier ab und lassen Sie die Protokolle in eine normale Datei schreiben.
 .
 Das Protokollieren in eine Datenbank kann später mit dem Befehl 'dpkg-reconfigure -plow snort-pgsql'eingerichtet werden.
";
$elem["snort-pgsql/configure_db"]["descriptionfr"]="Faut-il configurer une base de données pour la journalisation de snort-pgsql ?
 Aucune base de données n'a été configurée pour la journalisation de Snort. Avant de continuer, veuillez vérifier que vous connaissez :
 .
  - le nom d'hôte du serveur (qui doit accepter les connexions TCP    entrantes depuis cette machine) ;
  - une base de données sur ce serveur ;
  - un identifiant et son mot de passe pour accéder à cette base de données.
 .
 Si certains de ces prérequis ne sont pas satisfaits, ne choisissez pas cette option et utilisez la journalisation dans des fichiers.
 .
 La journalisation dans une base de données pourra être choisie plus tard avec la commande « dpkg-reconfigure -plow snort-pgsql ».
";
$elem["snort-pgsql/configure_db"]["default"]="true";
$elem["snort-pgsql/db_host"]["type"]="string";
$elem["snort-pgsql/db_host"]["description"]="Database server hostname:
 Please specify the host name of a database server that allows
 incoming connections from this host.
";
$elem["snort-pgsql/db_host"]["descriptionde"]="Rechnername des Datenbank-Servers:
 Bitte geben Sie den Rechnernamen eines Datenbank-Servers ein, der eingehende Verbindungen von diesem Rechner annimmt.
";
$elem["snort-pgsql/db_host"]["descriptionfr"]="Nom d'hôte du serveur de bases de données :
 Veuillez indiquer le nom d'hôte d'un serveur de bases de données qui accepte les connexions entrantes depuis cette machine.
";
$elem["snort-pgsql/db_host"]["default"]="";
$elem["snort-pgsql/db_database"]["type"]="string";
$elem["snort-pgsql/db_database"]["description"]="Database name:
 Please specify the name of an existing database to which the
 database user has write access.
";
$elem["snort-pgsql/db_database"]["descriptionde"]="Datenbankname:
 Bitte geben Sie den Namen einer vorhandenen Datenbank ein, auf die der Datenbankbenutzer Schreibrechte hat.
";
$elem["snort-pgsql/db_database"]["descriptionfr"]="Nom de la base de données :
 Veuillez indiquer le nom d'une base de données existante où l'identifiant choisi possède des droits d'écriture.
";
$elem["snort-pgsql/db_database"]["default"]="";
$elem["snort-pgsql/db_user"]["type"]="string";
$elem["snort-pgsql/db_user"]["description"]="Username for database access:
 Please specify a database server username with write access to the database.
";
$elem["snort-pgsql/db_user"]["descriptionde"]="Benutzername für den Datenbankzugriff:
 Bitte geben Sie einen Benutzernamen des Datenbank-Servers ein, der Schreibzugriff auf die Datenbank hat.
";
$elem["snort-pgsql/db_user"]["descriptionfr"]="Identifiant de connexion au serveur de bases de données :
 Veuillez indiquer un identifiant du serveur de bases de données, qui possède les droits d'écriture sur la base de données.
";
$elem["snort-pgsql/db_user"]["default"]="";
$elem["snort-pgsql/db_pass"]["type"]="password";
$elem["snort-pgsql/db_pass"]["description"]="Password for the database connection:
 Please enter the password to use to connect to the Snort Alert database.
";
$elem["snort-pgsql/db_pass"]["descriptionde"]="Passwort für die Datenbankverbindung:
 Bitte das Passwort für die Verbindung zu Snorts Alarm-Datenbank eingeben.
";
$elem["snort-pgsql/db_pass"]["descriptionfr"]="Mot de passe de connexion au serveur de bases de données :
 Veuillez indiquer le mot de passe à utiliser pour la connexion à la base de données des alertes de Snort.
";
$elem["snort-pgsql/db_pass"]["default"]="";
$elem["snort-pgsql/needs_db_config"]["type"]="note";
$elem["snort-pgsql/needs_db_config"]["description"]="Configured database mandatory for Snort
 Snort needs a configured database before it can successfully start up.
 In order to create the structure you need to run the following commands
 AFTER the package is installed:
 .
  cd /usr/share/doc/snort-pgsql/
  zcat create_postgresql.gz | psql -U <user> -h <host> -W <databasename>
 .
 Fill in the correct values for the user, host, and database names.
 PostgreSQL will prompt you for the password.
 .
 After you have created the database structure, you will need to start Snort
 manually.
";
$elem["snort-pgsql/needs_db_config"]["descriptionde"]="Eingerichtete Datenbank für Snort nötig
 Snort benötigt eine eingerichtete Datenbank, bevor Sie es benutzen können. Um diese aufzubauen, müssen Sie folgende Befehle NACH dieser Installation ausführen:
 .
  cd /usr/share/doc/snort-pgsql/
  zcat create_postgresql.gz | psql -U <Benutzer> -h <Rechner> -W <DB-Name>
 .
 Geben Sie die korrekten Werte für Benutzer, Rechner und Datenbankname ein. PostgreSQL wird Sie nach dem Passwort fragen.
 .
 Nachdem Sie die Datenbankstruktur angelegt haben, müssen Sie Snort noch starten.
";
$elem["snort-pgsql/needs_db_config"]["descriptionfr"]="Base de données configurée obligatoire pour Snort
 Snort a besoin d'une base de données configurée pour pouvoir démarrer. Veuillez créer la structure de base de données APRÈS l'installation du paquet :
 .
  cd /usr/share/doc/snort-pgsql/
  zcat create_postgresql.gz | psql -U <identifiant> -h <hôte> -W <base>
 .
 Veuillez indiquer les valeurs appropriées pour l'identifiant, le nom du serveur et de la base de données. PostgreSQL demandera le mot de passe.
 .
 Après avoir créé la structure de base de données, vous devrez démarrer Snort manuellement.
";
$elem["snort-pgsql/needs_db_config"]["default"]="";
PKG_OptionPageTail2($elem);
?>
