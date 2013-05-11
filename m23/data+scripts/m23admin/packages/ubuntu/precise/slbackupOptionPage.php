<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("slbackup");

$elem["slbackup/enable"]["type"]="boolean";
$elem["slbackup/enable"]["description"]="Configure the backup system now?
 Select this if you want to configure the backup system now.
 .
 If you choose to do so, you will get the opportunity to configure one
 client and the backup server, and a cron job will be configured to start
 the backup session once a day, on a moment of time of your choice.
 .
 To configure more than one backup client, you could either use the
 Webmin-module provided by the webmin-slbackup package, or you can do this
 manually in the file /etc/slbackup/slbackup.conf.
 .
 If you choose to not configure slbackup now, an example configuration file
 will be installed, but cron will not be configured to start any backup
 sessions. To activate backup, you can reconfigure the system by running
 'dpkg-reconfigure slbackup' (as root) or manually by editing the
 /etc/slbackup/slbackup.conf and /etc/cron.d/slbackup files.
";
$elem["slbackup/enable"]["descriptionde"]="Das Backup-System jetzt konfigurieren?
 Wählen Sie dies aus, falls Sie jetzt das Backupsystem konfigurieren wollen.
 .
 Falls Sie sich dafür entscheiden, werden Sie die Möglichkeit erhalten, einen Client und den Backup-Server zu konfigurieren, und ein Cronjob wird konfiguriert werden, um die Backupsitzung einmal täglich zu einem Zeitpunkt Ihrer Wahl zu starten.
 .
 Um mehr als einen Backupclient zu konfigurieren, können Sie entweder das Webmin-Modul aus dem webmin-slbackup-Paket verwenden oder Sie können dies manuell in der Datei /etc/slbackup/slbackup.conf vornehmen.
 .
 Falls Sie sich entscheiden, Slbackup jetzt nicht zu konfigurieren, wird eine Beispieldatei installiert, aber Cron wird nicht konfiguriert, irgendwelche Backupsitzungen zu starten. Um das Backup zu aktivieren, können Sie das System mittels »dpkg-reconfigure slbackup« (als root) oder durch manuelles Bearbeiten der Dateien /etc/slbackup/slbackup.conf und /etc/cron.d/slbackup rekonfigurieren.
";
$elem["slbackup/enable"]["descriptionfr"]="Faut-il configurer le système de sauvegarde maintenant ?
 Veuillez choisir si vous souhaitez configurer le système de sauvegarde maintenant.
 .
 Vous aurez alors la possibilité de configurer le serveur de sauvegarde et un client. Une tâche périodique de cron sera mise en place pour lancer la session de sauvegarde quotidiennement à l'heure de votre choix.
 .
 Pour configurer plus d'un client de sauvegarde, vous pouvez soit utiliser le module pour Webmin fourni dans le paquet webmin-slbackup, soit le faire vous-même en modifiant le fichier /etc/slbackup/slbackup.conf.
 .
 Si vous ne configurez pas slbackup maintenant, un fichier de configuration modèle sera mis en place, mais aucune tâche de lancement de session de sauvegarde ne sera créée. Pour activer la sauvegarde, vous pourrez soit utiliser la commande « dpkg-reconfigure slbackup » avec les droits du super-utilisateur, soit modifier ou créer vous-même les fichiers /etc/slbackup/slbackup.conf et /etc/cron.d/slbackup.
";
$elem["slbackup/enable"]["default"]="false";
$elem["slbackup/backuptime"]["type"]="string";
$elem["slbackup/backuptime"]["description"]="Start time of the backup session:
 By default slbackup starts one backup session each day, and here you can
 choose when to start this session. Enter the time in a HH:MM-format.
";
$elem["slbackup/backuptime"]["descriptionde"]="Startzeit für die Backupsitzung:
 Standardmäßig startet Slbackup eine Sitzung pro Tag, und hier können Sie auswählen, wann diese Sitzung begonnen werden soll. Geben Sie die Zeit im HH:MM-Format an.
";
$elem["slbackup/backuptime"]["descriptionfr"]="Heure de début de la session de sauvegarde :
 Par défaut, slbackup lance une sauvegarde quotidiennement. L'heure que vous indiquez ici sera l'heure de début de la sauvegarde. Elle doit être indiquée sous la forme HH:MM.
";
$elem["slbackup/backuptime"]["default"]="01:00";
$elem["slbackup/client_name"]["type"]="string";
$elem["slbackup/client_name"]["description"]="Name of your client:
 In slbackup each client has a uniqe name which identifies it. This name
 does not necessarily have anything to do with the hostname. Please enter
 the unique name of the client you want to configure.
";
$elem["slbackup/client_name"]["descriptionde"]="Name Ihres Clients:
 In Slbackup hat jeder Client eine eindeutigen Namen, der ihn identifiziert. Dieser Name hat nicht notwendigerweise etwas mit dem Hostnamen zu tun. Bitte geben Sie den eindeutigen Namen des Clients ein, den Sie konfigurieren möchten.
";
$elem["slbackup/client_name"]["descriptionfr"]="Nom du client :
 Dans slbackup, chaque client doit porter un nom unique. Ce nom n'est pas forcément lié au nom d'hôte. Veuillez indiquer le nom unique du client que vous allez configurer.
";
$elem["slbackup/client_name"]["default"]="localhost";
$elem["slbackup/client_type"]["type"]="select";
$elem["slbackup/client_type"]["choices"][1]="local";
$elem["slbackup/client_type"]["description"]="Type of client to configure:
 This determines what type of client that will be configured now.
 .
 If you choose local, the server will back up data from this computer. If
 you choose extern, the server will back up data from another computer
 using a SSH connection (this choice assumes that you install SSH and
 provide a passwordless connection between the user running the backup
 software on this computer (probably root) and the user running the backup
 software on the client).
";
$elem["slbackup/client_type"]["descriptionde"]="Art des zu konfigurierenden Clients:
 Dies bestimmt, welche Art von Client jetzt konfiguriert wird.
 .
 Falls Sie »lokal« wählen, wird der Server Daten von diesem Computer sichern. Falls Sie »extern« wählen, wird der Server Daten von einem anderen Computer über eine SSH-Verbindung sichern (diese Wahl nimmt an, dass Sie SSH installieren und eine passwortfreie Verbindung zwischen dem Benutzer, der die Backup-Software auf diesem Computer betreibt (wahrscheinlich root) und dem Benutzer, der die Backupsoftware auf dem Client betreibt, existiert.).
";
$elem["slbackup/client_type"]["descriptionfr"]="Type de client à configurer :
 Ce choix détermine le type de client qui va être configuré.
 .
 Si vous choisissez la valeur « local », la sauvegarde concernera les données de cette machine. Si vous choisissez « extern », le serveur sauvegardera les données d'une autre machine via une connexion SSH (sous réserve que SSH soit installé et qu'une connexion sans mot de passe soit possible entre l'utilisateur qui exécute le serveur de sauvegarde sur cette machine - probablement le superutilisateur « root » - et l'utilisateur qui exécute le logiciel de sauvegarde sur le client).
";
$elem["slbackup/client_type"]["default"]="local";
$elem["slbackup/client_address"]["type"]="string";
$elem["slbackup/client_address"]["description"]="Client hostname or IP address:
 You have choosen to configure an external client. Please enter the
 client's hostname or IP address.
";
$elem["slbackup/client_address"]["descriptionde"]="Client-Hostname oder IP-Adresse:
 Sie haben sich entschieden, einen externen Client zu konfigurieren. Bitte geben Sie den Hostname oder die IP-Adresse des Clients ein.
";
$elem["slbackup/client_address"]["descriptionfr"]="Nom d'hôte ou adresse IP du client :
 Vous avez choisi de configurer un client externe. Veuillez indiquer le nom d'hôte ou l'adresse IP de ce client.
";
$elem["slbackup/client_address"]["default"]="localhost";
$elem["slbackup/client_user"]["type"]="string";
$elem["slbackup/client_user"]["description"]="User running the backup software on the client:
 The backup software (rdiff-backup) will also run on the client, and the
 user that runs it has to have access to all the files that shall be
 backed up. Enter the username of the user that shall run the backup
 software on the client.
";
$elem["slbackup/client_user"]["descriptionde"]="Benutzer, der die Backupsoftware auf dem Client betreibt:
 Die Backupsoftware (rdiff-backup) wird auch auf dem Client laufen und der Benutzer, der sie betreibt, muss Zugriff auf alle Dateien haben, die gesichert werden sollen. Geben Sie den Benutzernamen des Benutzers an, der die Backupsoftware auf dem Client betreiben soll.
";
$elem["slbackup/client_user"]["descriptionfr"]="Utilisateur qui exécute le logiciel de sauvegarde sur le client :
 Le logiciel de sauvegarde (rdiff-backup) fonctionnera également sur chaque client. L'identifiant utilisé pour l'exécuter doit avoir accès à l'ensemble des fichiers qui seront sauvegardés. Veuillez indiquer cet identifiant ici.
";
$elem["slbackup/client_user"]["default"]="root";
$elem["slbackup/client_location"]["type"]="string";
$elem["slbackup/client_location"]["description"]="Files and directories to back up:
 Enter the location of the files and/or directories that you want to back
 up on the client. Use a whitespace as a delimiter.
 .
 Example: /etc /home /var/backups
";
$elem["slbackup/client_location"]["descriptionde"]="Dateien und Verzeichnisse, die gesichert werden sollen:
 Geben Sie den Ort der Dateien und/oder Verzeichnisse an, die Sie auf dem Client sichern wollen. Benutzern Sie Leerzeichen als Trennzeichen.
 .
 Beispiel: /etc /home /var/backups
";
$elem["slbackup/client_location"]["descriptionfr"]="Fichiers et répertoires à sauvegarder :
 Veuillez indiquer l'emplacement des fichiers et répertoires que vous souhaitez sauvegarder sur ce client :
 .
 Exemple : « /etc /home /var/backups ».
";
$elem["slbackup/client_location"]["default"]="/etc /home /var/backups";
$elem["slbackup/client_keep"]["type"]="string";
$elem["slbackup/client_keep"]["description"]="Time life of backups (in days):
 slbackup is doing a kind of maintenance before each backup session, where
 backups that are older than a certain number of days will be deleted. In
 this dialog you can specify the number of days that you want to keep the
 backups for this client on the backup server. The default is 185 days
 (approximately six months).
 .
 If you want to keep the backups for this client forever, or want to do the
 maintenance yourself, 0 days will be treated as infinite.
";
$elem["slbackup/client_keep"]["descriptionde"]="Lebenszeit der Backups (in Tagen):
 Slbackup erledigt eine Art von Wartung für jeder Backupsitzung, wobei Backups, die älter als eine bestimmte Anzahl von Tagen sind, gelöscht werden. In diesem Dialog können Sie die Anzahl von Tagen angeben, die Sie Backups von diesem Client auf dem Backup-Server behalten wollen. Der Standardwert ist 185 Tage (rund sechs Monate).
 .
 Falls Sie die Backups für die Clients für immer behalten möchten, oder die Wartung selbst übernehmen möchten, wird 0 Tage als unendlich betrachtet.
";
$elem["slbackup/client_keep"]["descriptionfr"]="Durée de vie des sauvegardes (en jours) :
 Slbackup effectue ses opérations de maintenance avant chaque session de sauvegarde. Les sauvegardes plus anciennes qu'un nombre donné de jours sont effacées. Veuillez indiquer la durée de conservation des sauvegardes de ce client sur le serveur de sauvegarde. La valeur par défaut est de 185 jours, soit environ 6 mois.
 .
 Si vous souhaitez conserver indéfiniment les sauvegardes de ce client ou faire la maintenance vous-même, veuillez indiquer une valeur nulle.
";
$elem["slbackup/client_keep"]["default"]="185";
$elem["slbackup/server_type"]["type"]="select";
$elem["slbackup/server_type"]["choices"][1]="local";
$elem["slbackup/server_type"]["description"]="Type of server to configure / connect to:
 This determines what type of server slbackup will configure.
 .
 If you choose local, the backup will be stored on this computer. If you
 choose extern, the backup will be stored on another computer using a SSH
 connection (this choice assumes that you install SSH and provide a
 passwordless connection between the user running the backup software on
 this computer (probably root) and the user running the backup software on
 the backup server).
";
$elem["slbackup/server_type"]["descriptionde"]="Art des zu konfigurierenden / zu dem zu verbindenden Servers:
 Dies bestimmt die Art des Servers, den Slbackup konfigurieren wird.
 .
 Falls Sie »lokal« wählen, wird das Backup auf diesem Computer gespeichert. Falls Sie »extern« wählen, wird das Backup auf einem anderen Computer über eine SSH-Verbindung gespeichert (diese Wahl nimmt an, dass Sie SSH installieren und eine passwortfreie Verbindung zwischen dem Benutzer, der die Backup-Software auf diesem Computer betreibt (wahrscheinlich root) und dem Benutzer, der die Backupsoftware auf dem Backup-Server betreibt, existiert.).
";
$elem["slbackup/server_type"]["descriptionfr"]="Type de serveur à configurer ou à utiliser :
 Veuillez choisir le type de serveur que slbackup va configurer.
 .
 Si vous choisissez « local », les sauvegardes seront conservées sur cette machine. Si vous choisissez « extern », les sauvegardes seront transférées sur une autre machine via une connexion SSH. Vous devez alors installer SSH sur la machine distante et mettre en place une connexion sans mot de passe entre l'utilisateur qui exécutera le logiciel de sauvegarde sur cette machine (probablement le superutilisateur « root ») et celui qui l'exécutera sur le serveur de sauvegarde.
";
$elem["slbackup/server_type"]["default"]="local";
$elem["slbackup/server_address"]["type"]="string";
$elem["slbackup/server_address"]["description"]="Server's hostname or IP address:
 You have chosen to configure an external backup server. Please enter the
 backup server's hostname or IP address.
";
$elem["slbackup/server_address"]["descriptionde"]="Hostname oder IP-Adresse des Servers:
 Sie haben sich dazu entschieden, einen externen Backupserver zu konfigurieren. Bitte geben Sie den Hostname oder die IP-Adresse des Backupservers an.
";
$elem["slbackup/server_address"]["descriptionfr"]="Nom d'hôte ou adresse IP du serveur :
 Vous avez choisi de configurer un serveur externe. Veuillez indiquer le nom d'hôte ou l'adresse IP de ce serveur.
";
$elem["slbackup/server_address"]["default"]="localhost";
$elem["slbackup/server_destdir"]["type"]="string";
$elem["slbackup/server_destdir"]["description"]="Backup location on the server:
 Enter the location where you want the backups to be stored. slbackup will
 not create this directory for you. When you create this directory, make
 sure that you have enough disk space to store all the backups you define.
";
$elem["slbackup/server_destdir"]["descriptionde"]="Backup-Ort auf dem Server:
 Geben Sie den Ort an, an dem Sie die Backups speichern wollen. Slbackup wird dieses Verzeichnis nicht für Sie erstellen. Wenn Sie dieses Verzeichnis erstellen, stellen Sie sicher, dass Sie genug Plattenplatz haben, um die definierten Backups zu speichern.
";
$elem["slbackup/server_destdir"]["descriptionfr"]="Emplacement des sauvegardes sur le serveur :
 Veuillez indiquer l'endroit où seront conservées les sauvegardes. Slbackup ne créera pas ce répertoire automatiquement. Lorsque vous le créer, veuillez vous assurer qu'il aura y une place suffisante pour conserver toutes les sauvegardes que vous définirez.
";
$elem["slbackup/server_destdir"]["default"]="/var/lib/slbackup";
$elem["slbackup/server_user"]["type"]="string";
$elem["slbackup/server_user"]["description"]="User running the backup software on the server:
 The backup software (rdiff-backup) will also run on the server, and the
 user that runs it has to have access to the location where the files are
 going to be stored. Enter the username that shall run the backup software
 on the backup server.
";
$elem["slbackup/server_user"]["descriptionde"]="Benutzer, der die Backupsoftware auf dem Server betreibt:
 Die Backup-Software (rdiff-backup) wird auch auf dem Server laufen, und der Benutzer, der sie betreibt, muss Zugriff auf den Ort benötigt, an dem die Dateien gespeichert werden. Geben Sie den Benutzernamen an, der die Backup-Software auf dem Backup-Server betreiben wird.
";
$elem["slbackup/server_user"]["descriptionfr"]="Utilisateur exécutant le logiciel de sauvegarde sur le serveur :
 Le logiciel de sauvegarde (rdiff-backup) fonctionnera également sur le serveur. L'identifiant utilisé pour l'exécuter doit avoir accès à l'emplacement où les sauvegardes seront conservées. Veuillez indiquer cet identifiant ici.
";
$elem["slbackup/server_user"]["default"]="root";
PKG_OptionPageTail2($elem);
?>
