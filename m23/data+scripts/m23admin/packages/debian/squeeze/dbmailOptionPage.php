<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dbmail");

$elem["dbmail/do_debconf"]["type"]="boolean";
$elem["dbmail/do_debconf"]["description"]="Use debconf to manage dbmail configuration?
 Please confirm if you want to allow debconf to manage some parts of your
 dbmail configuration. Notice that changes you make to dbmail.conf by hand
 will NOT be overwritten should you later choose to re-run dpkg-reconfigure
 dbmail.
";
$elem["dbmail/do_debconf"]["descriptionde"]="Soll Debconf die Einstellungen für Dbmail verwalten?
 Bitte stimmen Sie zu, falls Debconf einige Teile Ihrer Konfigurationsdatei von Dbmail verwalten soll. Beachten Sie, dass Ihre manuellen Änderungen in der Datei dbmail.conf bei einem späteren Aufruf 'dpkg-reconfigure dbmail' NICHT überschrieben werden.
";
$elem["dbmail/do_debconf"]["descriptionfr"]="Faut-il utiliser debconf pour gérer la configuration de dbmail ?
 Debconf peut gérer certaines parties de la configuration de dbmail. Veuillez noter que les modifications que vous faites vous-même ne seront PAS écrasées même si vous utilisez ensuite la commande « dpkg-reconfigure dbmail ».
";
$elem["dbmail/do_debconf"]["default"]="";
$elem["dbmail/dbmail/authdriver"]["type"]="select";
$elem["dbmail/dbmail/authdriver"]["choices"][1]="sql";
$elem["dbmail/dbmail/authdriver"]["description"]="Authentication driver to activate:
 Dbmail by defauls uses SQL based authentication. But you can also use
 LDAP instead.
";
$elem["dbmail/dbmail/authdriver"]["descriptionde"]="Art der Authentifizierung auswählen:
 Dbmail nutzt normalerweise SQL-basierte Authentifizierung, aber Sie können statt dessen auch LDAP auswählen.
";
$elem["dbmail/dbmail/authdriver"]["descriptionfr"]="Pilote d'authentification à utiliser :
 Par défaut, dbmail utilise une authentification basée sur SQL. Il est possible d'utiliser LDAP à la place.
";
$elem["dbmail/dbmail/authdriver"]["default"]="sql";
$elem["dbmail/dbmail/postmaster"]["type"]="string";
$elem["dbmail/dbmail/postmaster"]["description"]="Postmaster's email address:
 Please choose a valid email address read by the person responsible for
 this email server.
 .
 Example: postmaster@yourdomain.tld
";
$elem["dbmail/dbmail/postmaster"]["descriptionde"]="E-Mail-Adresse des Postmasters:
 Bitte geben Sie eine gültige E-Mail-Adresse ein, die vom Verantwortlichen dieses E-Mail-Servers gelesen wird.
 .
 Beispiel: postmaster@yourdomain.tld
";
$elem["dbmail/dbmail/postmaster"]["descriptionfr"]="Adresse électronique de l'administrateur du courrier (« postmaster ») :
 Veuillez indiquer une adresse valide consultée régulièrement par le responsable de l'administration de ce serveur de courrier.
 .
 Exemple : postmaster@votredomaine.eu
";
$elem["dbmail/dbmail/postmaster"]["default"]="";
$elem["dbmail/dbmail/host"]["type"]="string";
$elem["dbmail/dbmail/host"]["description"]="Hostname of the SQL database server:
 Please mention the server where a database to hold dbmail's tables
 will be created. You should grant full read/write permissions on this
 database to the dbmail user.
";
$elem["dbmail/dbmail/host"]["descriptionde"]="Rechnername des SQL-Datenbank-Servers:
 Bitte geben Sie den Server an, auf dem eine Datenbank für die Dbmail-Tabellen angelegt wird. Sie sollten dem Datenbank-Benutzer für Dbmail vollen Lese- und Schreibzugriff auf diese Datenbank gewähren.
";
$elem["dbmail/dbmail/host"]["descriptionfr"]="Nom d'hôte du serveur de bases de données :
 Veuillez indiquer le nom d'hôte du serveur où la base de données contenant les tables de dbmail doit être créée. L'utilisateur dbmail doit posséder des droits complets en lecture et écriture sur cette base de données.
";
$elem["dbmail/dbmail/host"]["default"]="";
$elem["dbmail/dbmail/db"]["type"]="string";
$elem["dbmail/dbmail/db"]["description"]="The name of the database:
 Please mention the name of the database that holds the dbmail tables.
 .
 If you're using sqlite, this should be the path to the database file.
";
$elem["dbmail/dbmail/db"]["descriptionde"]="Name der Datenbank:
 Bitte den Namen der Datenbank eingeben, die die Dbmail-Tabellen aufnimmt.
 .
 Falls Sie Sqlite verwenden, ist das der Pfad zur Datenbankdatei.
";
$elem["dbmail/dbmail/db"]["descriptionfr"]="Nom de la base de données :
 Veuillez indiquer le nom de la base de données qui contiendra les tables de dbmail.
 .
 Si vous utilisez sqlite, vous devez indiquer le chemin d'accès à la base de données.
";
$elem["dbmail/dbmail/db"]["default"]="";
$elem["dbmail/dbmail/user"]["type"]="string";
$elem["dbmail/dbmail/user"]["description"]="Database user:
 Please mention the username dbmail will use to connect to the database server.
";
$elem["dbmail/dbmail/user"]["descriptionde"]="Datenbank-Benutzer:
 Bitte geben Sie den Benutzernamen ein, den Dbmail für die Verbindung mit dem Datenbank-Server nutzen wird.
";
$elem["dbmail/dbmail/user"]["descriptionfr"]="Utilisateur de la base de données :
 Veuillez indiquer l'identifiant qui sera utilisé lors des connexions au serveur de bases de données.
";
$elem["dbmail/dbmail/user"]["default"]="";
$elem["dbmail/dbmail/pass"]["type"]="password";
$elem["dbmail/dbmail/pass"]["description"]="Password for the database connection:
 Please mention the password dbmail will use to connect to the database server.
";
$elem["dbmail/dbmail/pass"]["descriptionde"]="Passwort für die Datenbankverbindung:
 Bitte geben Sie das Passwort ein, das Dbmail für die Verbindung mit dem Datenbank-Server nutzen wird.
";
$elem["dbmail/dbmail/pass"]["descriptionfr"]="Mot de passe de l'utilisateur de la base de données :
 Veuillez indiquer le mot de passe qui sera utilisé lors des connexions au serveur de bases de données.
";
$elem["dbmail/dbmail/pass"]["default"]="";
$elem["dbmail/start_imapd"]["type"]="boolean";
$elem["dbmail/start_imapd"]["description"]="Start the IMAP server after reboot?
 Dbmail supports both IMAP and POP3 services. You can choose to run either
 one or both services.
";
$elem["dbmail/start_imapd"]["descriptionde"]="IMAP-Server nach dem Neustart starten?
 Dbmail unterstützt sowohl IMAP- als auch POP3-Dienste. Sie können auswählen, ob einer oder beide Dienste gestartet werden.
";
$elem["dbmail/start_imapd"]["descriptionfr"]="Faut-il lancer le serveur IMAP au démarrage ?
 Dbmail gère à la fois les services IMAP et POP3. Vous pouvez choisir d'utiliser l'un ou l'autre de ces services, ou les deux.
";
$elem["dbmail/start_imapd"]["default"]="";
$elem["dbmail/start_lmtpd"]["type"]="boolean";
$elem["dbmail/start_lmtpd"]["description"]="Start the LMTP server after reboot?
 Please choose whether the LMTP server should be started after
 rebooting. This is only needed when you like to feed the email to
 Dbmail by LMTP.
";
$elem["dbmail/start_lmtpd"]["descriptionde"]="LMTP-Server nach dem Neustart starten?
 Bitte stellen Sie ein, ob der LMTP-Server nach dem Neustart des Systems gestartet werden soll. Das ist nur nötig, falls Sie die E-Mails zu Dbmail über LMTP leiten wollen.
";
$elem["dbmail/start_lmtpd"]["descriptionfr"]="Faut-il lancer le serveur IMAP au démarrage ?
 Veuillez choisir si le serveur LMTP doit être lancé au démarrage. Cela n'est utile que si vous souhaitez utiliser LMTP pour envoyer les courriels à dbmail.
";
$elem["dbmail/start_lmtpd"]["default"]="";
$elem["dbmail/start_pop3d"]["type"]="boolean";
$elem["dbmail/start_pop3d"]["description"]="Start the POP3 server after reboot?
 Dbmail supports both IMAP and POP3 services. You can choose to run either
 one or both services.
";
$elem["dbmail/start_pop3d"]["descriptionde"]="POP3-Server nach dem Neustart starten?
 Dbmail unterstützt sowohl IMAP- als auch POP3-Dienste. Sie können auswählen, ob einer oder beide Dienste gestartet werden.
";
$elem["dbmail/start_pop3d"]["descriptionfr"]="Faut-il lancer le serveur POP3 au démarrage ?
 Dbmail gère à la fois les services IMAP et POP3. Vous pouvez choisir d'utiliser l'un ou l'autre de ces services, ou les deux.
";
$elem["dbmail/start_pop3d"]["default"]="";
$elem["dbmail/start_sieve"]["type"]="boolean";
$elem["dbmail/start_sieve"]["description"]="Start the timsieve server after reboot?
 Please choose whether the timsieve server should be started after
 rebooting. This is only needed if you want to allow users to manage
 their sieve scripts using a compatible client such as kmail,
 horde/ingo or squirrelmail/avelsieve.
";
$elem["dbmail/start_sieve"]["descriptionde"]="Timsieve-Server nach dem Neustart starten?
 Bitte stellen Sie ein, ob der Timsieve-Server nach dem Neustart des Systems gestartet werden soll. Das ist nur nötig, falls Sie es den Benutzern gestatten, ihre Sieve-Skripte mit einem geeigneten Programm wie KMail, Horde/Ingo oder Squirremail/Avelsieve zu verwalten.
";
$elem["dbmail/start_sieve"]["descriptionfr"]="Faut-il lancer le serveur timsieve au démarrage ?
 Lancer le serveur timsieve au démarrage n'est nécessaire que si les utilisateurs doivent gérer leurs scripts sieve avec un client compatible comme kmail, horde/ingo ou squirrelmail/avelsieve.
";
$elem["dbmail/start_sieve"]["default"]="";
$elem["dbmail/ldap/port"]["type"]="string";
$elem["dbmail/ldap/port"]["description"]="Port used by the LDAP server:
 Please enter the port which your LDAP server is listening on.
 The default port is 389.
";
$elem["dbmail/ldap/port"]["descriptionde"]="Port, den der LDAP-Server nutzt:
 Bitte geben Sie ein, an welchem Port Ihr LDAP-Server auf Verbindungen wartet. Normalerweise ist das Port 389.
";
$elem["dbmail/ldap/port"]["descriptionfr"]="Port utilisé par le serveur LDAP :
 Veuillez indiquer le port où le serveur LDAP est à l'écoute. La valeur par défaut est 389.
";
$elem["dbmail/ldap/port"]["default"]="";
$elem["dbmail/ldap/hostname"]["type"]="string";
$elem["dbmail/ldap/hostname"]["description"]="Hostname of the LDAP server:
 Please enter the name of the host your LDAP server is running at.
";
$elem["dbmail/ldap/hostname"]["descriptionde"]="Rechnernamen des LDAP-Servers:
 Bitte geben Sie den Namen des Rechners an, auf dem Ihr LDAP-Server läuft.
";
$elem["dbmail/ldap/hostname"]["descriptionfr"]="Nom d'hôte du serveur LDAP :
 Veuillez indiquer le nom de l'hôte du serveur LDAP.
";
$elem["dbmail/ldap/hostname"]["default"]="";
$elem["dbmail/ldap/base_dn"]["type"]="string";
$elem["dbmail/ldap/base_dn"]["description"]="LDAP base DN:
 Please enter the DN where Dbmail should start searching for
 user accounts.
";
$elem["dbmail/ldap/base_dn"]["descriptionde"]="LDAP-Basis-DN:
 Bitte geben Sie den DN ein (Suchbasis), wo Dbmail beginnt nach Benutzerkonten zu suchen.
";
$elem["dbmail/ldap/base_dn"]["descriptionfr"]="DN de base du serveur LDAP :
 Veuillez indiquer le nom distinctif (DN : « Distinguished Name ») où dbmail recherchera les comptes des utilisateurs.
";
$elem["dbmail/ldap/base_dn"]["default"]="";
$elem["dbmail/ldap/field_uid"]["type"]="string";
$elem["dbmail/ldap/field_uid"]["description"]="Field which contains the user login name of the user:
 Please enter the LDAP attribute that will contain the username.
 The standard account uses uid.
";
$elem["dbmail/ldap/field_uid"]["descriptionde"]="Feld, das den Login-Namen des Benutzers enthält:
 Bitte geben Sie das LDAP-Attribut ein, das die Benutzernamen enthält. Normalerweise ist das »uid«.
";
$elem["dbmail/ldap/field_uid"]["descriptionfr"]="Champ de l'identifiant de connexion des utilisateurs :
 Veuillez indiquer l'attribut LDAP qui contient l'identifiant de connexion des utilisateurs. La valeur habituelle est « uid ».
";
$elem["dbmail/ldap/field_uid"]["default"]="";
$elem["dbmail/ldap/field_cid"]["type"]="string";
$elem["dbmail/ldap/field_cid"]["description"]="Field which contains the group id number of the user:
 Please enter the LDAP attribute that will contain the group id number.
 The standard account uses gidNumber.
";
$elem["dbmail/ldap/field_cid"]["descriptionde"]="Feld, das die Gruppennummer (group id) des Benutzers enthält:
 Bitte geben Sie das LDAP-Attribut ein, das die Gruppennummer enthält. Normalerweise ist das »gidNumber«.
";
$elem["dbmail/ldap/field_cid"]["descriptionfr"]="Champ de l'identifiant numérique du groupe des utilisateurs :
 Veuillez indiquer l'attribut LDAP qui contient l'identifiant numérique du groupe des utilisateurs. La valeur habituelle est « gidNumber ».
";
$elem["dbmail/ldap/field_cid"]["default"]="";
$elem["dbmail/ldap/bind_anonymous"]["type"]="boolean";
$elem["dbmail/ldap/bind_anonymous"]["description"]="Use an anonymous connection to the LDAP server?
 Please choose this option if the LDAP server does not require
 authentication to search the LDAP tree.
";
$elem["dbmail/ldap/bind_anonymous"]["descriptionde"]="Eine anonyme Verbindung zum LDAP-Server benutzen?
 Bitte stimmen Sie hier zu, falls der LDAP-Server keine Authentifizierung verlangt, um den Verzeichnisbaum zu durchsuchen.
";
$elem["dbmail/ldap/bind_anonymous"]["descriptionfr"]="Faut-il utiliser une connexion anonyme au serveur LDAP ?
 Veuillez indiquer s'il est possible de se connecter au serveur LDAP sans authentification.
";
$elem["dbmail/ldap/bind_anonymous"]["default"]="";
$elem["dbmail/ldap/bind_dn"]["type"]="string";
$elem["dbmail/ldap/bind_dn"]["description"]="DN used to bind to the LDAP server:
 Please enter the DN which should be used to connect to the LDAP
 server.
";
$elem["dbmail/ldap/bind_dn"]["descriptionde"]="DN für die Verbindung zum LDAP-Server:
 Bitte geben Sie den DN ein, der für eine Verbindung mit dem LDAP-Server benutzt werden soll.
";
$elem["dbmail/ldap/bind_dn"]["descriptionfr"]="DN de connexion au serveur LDAP :
 Veuillez indiquer le nom distinctif qui sera utilisé pour la connexion au serveur LDAP.
";
$elem["dbmail/ldap/bind_dn"]["default"]="";
$elem["dbmail/ldap/bind_pw"]["type"]="password";
$elem["dbmail/ldap/bind_pw"]["description"]="Password to bind to the LDAP server:
 Please enter the password which should be used to connect to the LDAP
 server.
";
$elem["dbmail/ldap/bind_pw"]["descriptionde"]="Passwort für eine Verbindung zum LDAP-Server:
 Bitte geben Sie das Passwort ein, das für eine Verbindung mit dem LDAP-Server benutzt werden soll.
";
$elem["dbmail/ldap/bind_pw"]["descriptionfr"]="Mot de passe de connexion au serveur LDAP :
 Veuillez indiquer le mot de passe qui sera utilisé lors des connexions au serveur LDAP.
";
$elem["dbmail/ldap/bind_pw"]["default"]="";
PKG_OptionPageTail2($elem);
?>
