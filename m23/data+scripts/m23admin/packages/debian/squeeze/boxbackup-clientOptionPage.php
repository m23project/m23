<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("boxbackup-client");

$elem["boxbackup-client/debconf"]["type"]="boolean";
$elem["boxbackup-client/debconf"]["description"]="Should the BoxBackup client be configured automatically?
 The package configuration scripts can create the configuration files
 for the BoxBackup client.
 .
 You should choose this option if you are not familiar with BoxBackup's
 configuration options.
 .
 Please read the /usr/share/doc/boxbackup-client/README.Debian for details
 about the configuration of the BoxBackup client.
";
$elem["boxbackup-client/debconf"]["descriptionde"]="Soll der BoxBackup-Client automatisch konfiguriert werden?
 Die Paket-Konfigurations-Skripte können die Konfigurationsdateien für den BoxBackup-Client erstellen.
 .
 Sie sollten diese Option wählen, falls Sie nicht mit den Konfigurationsoptionen von BoxBackup vertraut sind.
 .
 Bitte lesen Sie für detaillierte Informationen zur Konfiguration des BoxBackup-Clients die Datei /usr/share/doc/boxbackup-client/README.Debian.
";
$elem["boxbackup-client/debconf"]["descriptionfr"]="Faut-il automatiquement configurer le client BoxBackup ?
 Les scripts de configuration de ce paquet peuvent créer les fichiers de configuration pour le client BoxBackup.
 .
 Vous devriez utiliser cette option si les options de configuration de BoxBackup ne vous sont pas familières.
 .
 Veuillez consulter le fichier /usr/share/doc/boxbackup-client/README.Debian pour obtenir des détails sur la configuration du client BoxBackup.
";
$elem["boxbackup-client/debconf"]["default"]="true";
$elem["boxbackup-client/backupMode"]["type"]="select";
$elem["boxbackup-client/backupMode"]["choices"][1]="lazy";
$elem["boxbackup-client/backupMode"]["description"]="Run mode for the BoxBackup client:
 The BoxBackup client supports two modes of backup:
 .
 In the 'lazy' mode, the backup daemon will regularly scan the file system
 searching for modified files. It will then upload the files older than a
 specified age to the backup server.
 .
 In the 'snapshot' mode the backup will be explicitly run at regular intervals.
 A cron file (/etc/cron.d/boxbackup-client) is provided with the
 package and should be adapted to suit your needs.
";
$elem["boxbackup-client/backupMode"]["descriptionde"]="Betriebsmodus für den BoxBackup-Client:
 Der BoxBackup-Client unterstützt zwei Backup-Modi:
 .
 Im »lazy«-Modus prüft der Sicherungsdienst das Dateisystem regelmäßig, um veränderte Dateien zu finden. Dateien, die ein zuvor festgelegtes Alter überschritten haben, werden auf den Sicherungsserver überspielt.
 .
 Im »snapshot«-Modus wird die Sicherung in zuvor festgelegten Abständen durchgeführt. Eine Cron-Datei (/etc/cron.d/backup-client) wird mit diesem Paket ausgeliefert und sollte an die eigenen Anforderungen angepasst werden.
";
$elem["boxbackup-client/backupMode"]["descriptionfr"]="Mode d'exécution pour le client BoxBackup :
 Le client BoxBackup gère deux modes de sauvegarde :
 .
 Avec le mode simplifié (« lazy »), le démon de sauvegarde recherchera régulièrement les fichiers modifiés sur le système. Il enverra les fichiers plus anciens qu'un âge donné au serveur de sauvegarde.
 .
 Avec le mode instantané (« snapshot »), la sauvegarde sera lancée explicitement à intervalles réguliers. Le fichier /etc/cron.d/boxbackup-client pour le démon cron est fourni avec le paquet et devra être adapté à vos besoins.
";
$elem["boxbackup-client/backupMode"]["default"]="";
$elem["boxbackup-client/accountNumber"]["type"]="string";
$elem["boxbackup-client/accountNumber"]["description"]="Account number for this node on the backup server:
 The administrator of the BoxBackup server should have assigned this client
 a hexadecimal account number.
 .
 If no account number has been assigned yet, leave this field blank and
 configure it later by running 'dpkg-reconfigure boxbackup-client' as root.
";
$elem["boxbackup-client/accountNumber"]["descriptionde"]="Kontennummer für diesen Knoten auf dem Sicherungsserver:
 Der Administrator des BoxBackup-Servers sollte diesem Client eine hexadezimale Kontennummer zugewiesen haben.
 .
 Falls bislang noch keine Kontennummer zugewiesen wurde, lassen Sie dieses Feld frei und konfigurieren Sie die Option später durch Ausführen des Befehls »dpkg-reconfigure boxbackup-client« als root.
";
$elem["boxbackup-client/accountNumber"]["descriptionfr"]="Numéro de compte pour ce nœud sur le serveur de sauvegarde :
 L'administrateur de BoxBackup doit assigner à ce client un numéro de compte en hexadécimal.
 .
 Si aucun numéro de compte n'est encore assigné, laissez ce champ vide et remplissez le plus tard en lançant la commande « dpkg-reconfigure boxbackup-client » en tant qu'utilisateur root.
";
$elem["boxbackup-client/accountNumber"]["default"]="";
$elem["boxbackup-client/incorrectAccountNumber"]["type"]="error";
$elem["boxbackup-client/incorrectAccountNumber"]["description"]="Invalid account number
 The account number must be a hexadecimal number (such as 1F04 or 4500).
";
$elem["boxbackup-client/incorrectAccountNumber"]["descriptionde"]="Ungültige Kontennummer
 Die Kontennummer muss hexadezimal sein (wie zum Beispiel 1F04 oder 4500).
";
$elem["boxbackup-client/incorrectAccountNumber"]["descriptionfr"]="Numéro de compte invalide
 Le numéro de compte doit être un nombre en hexadécimal (comme 1F04 ou 4500).
";
$elem["boxbackup-client/incorrectAccountNumber"]["default"]="";
$elem["boxbackup-client/backupServer"]["type"]="string";
$elem["boxbackup-client/backupServer"]["description"]="Fully qualified domain name of the backup server:
 Please enter the fully qualified domain name of the BoxBackup server which
 your client will use.
 .
 The client will connect to the server on TCP port 2201.
";
$elem["boxbackup-client/backupServer"]["descriptionde"]="Vollständiger Domainname des Sicherungsservers:
 Bitte geben Sie den durch Ihren Client zu verwendenden vollständigen Domainnamen des BoxBackup-Servers an.
 .
 Der Client wird sich mit dem Server auf dem TCP-Port 2201 verbinden.
";
$elem["boxbackup-client/backupServer"]["descriptionfr"]="Nom d'hôte complet (FQDN) du serveur de sauvegarde :
 Veuillez indiquer le nom d'hôte complet (FQDN) du serveur BoxBackup que votre client doit utiliser.
 .
 Le client se connectera sur le port TCP 2201 du serveur.
";
$elem["boxbackup-client/backupServer"]["default"]="";
$elem["boxbackup-client/backupDirs"]["type"]="string";
$elem["boxbackup-client/backupDirs"]["description"]="List of directories to backup:
 Please give a space-separated list of directories to be backed up onto
 the remote server.
 .
 Those directories should not contain mounted file systems at any level
 in their subdirectories.
";
$elem["boxbackup-client/backupDirs"]["descriptionde"]="Liste der zu sichernden Verzeichnisse:
 Bitte geben Sie die auf den entfernten Server zu sichernden Verzeichnisse als durch Leerzeichen getrennte Liste ein.
 .
 Diese Verzeichnisse sollten in keinem Unterverzeichnis ein eingebundenes Dateisystem enthalten.
";
$elem["boxbackup-client/backupDirs"]["descriptionfr"]="Liste des répertoires à sauvegarder :
 Veuillez indiquer une liste de répertoires, séparés par des espaces, à sauvegarder sur le serveur distant.
 .
 Ces répertoires ne doivent pas contenir de systèmes de fichiers montés dans l'un de leurs sous-répertoires, quelle que soit la profondeur.
";
$elem["boxbackup-client/backupDirs"]["default"]="";
$elem["boxbackup-client/incorrectDirectories"]["type"]="error";
$elem["boxbackup-client/incorrectDirectories"]["description"]="Invalid path name
 The path names to the directories must be absolute path names, separated
 by spaces.
 .
 For example: /home/myaccount /etc/
";
$elem["boxbackup-client/incorrectDirectories"]["descriptionde"]="Ungültige Pfadangabe
 Die Pfade zu den Verzeichnissen müssen absolut sein und durch Leerzeichen getrennt angegeben werden.
 .
 Zum Beispiel: /home/meinkonto /etc/
";
$elem["boxbackup-client/incorrectDirectories"]["descriptionfr"]="Chemin invalide
 Ces répertoires doivent être indiqués sous forme de chemins absolus et séparés par des espaces.
 .
 Exemple : /home/myaccount /etc/.
";
$elem["boxbackup-client/incorrectDirectories"]["default"]="";
$elem["boxbackup-client/UpdateStoreInterval"]["type"]="string";
$elem["boxbackup-client/UpdateStoreInterval"]["description"]="Interval (in seconds) between directory scans:
 BoxBackup regularly scans the selected directories, looking for modified
 files.
 .
 Please choose the scan interval in seconds.
";
$elem["boxbackup-client/UpdateStoreInterval"]["descriptionde"]="Intervall (in Sekunden) zwischen Verzeichnisüberprüfungen:
 BoxBackup überprüft die ausgewählten Verzeichnisse von Zeit zu Zeit auf modifizierte Dateien.
 .
 Bitte wählen Sie das Überprüfungsintervall in Sekunden.
";
$elem["boxbackup-client/UpdateStoreInterval"]["descriptionfr"]="Intervalle (en secondes) entre deux parcours du répertoire :
 BoxBackup parcourt régulièrement les répertoires sélectionnés à la recherche de fichiers modifiés.
 .
 Veuillez choisir l'intervalle entre deux parcours en secondes.
";
$elem["boxbackup-client/UpdateStoreInterval"]["default"]="3600";
$elem["boxbackup-client/MinimumFileAge"]["type"]="string";
$elem["boxbackup-client/MinimumFileAge"]["description"]="Minimum time to wait (in seconds) before uploading a file:
 A file will be uploaded to the server only after a certain time after its
 last modification.
 .
 Low interval values will trigger frequent uploads to the server and more
 revisions being created with older revisions being removed earlier.
";
$elem["boxbackup-client/MinimumFileAge"]["descriptionde"]="Mindestwartezeit (in Sekunden) vor dem Hochladen einer Datei:
 Eine Datei wird erst eine bestimmte Zeit nach der letzten Modifikation auf den Server übertragen.
 .
 Kleine Intervalle resultieren in häufigeren Uploads auf den Server. Dabei werden mehr Revisionen angelegt und alte früher gelöscht.
";
$elem["boxbackup-client/MinimumFileAge"]["descriptionfr"]="Temps minimum à attendre (en secondes) avant d'envoyer un fichier :
 Un fichier est envoyé au serveur uniquement après un certain temps après sa date de dernière modification.
 .
 Un intervalle faible provoquera des envois fréquents vers le serveur et des versions successives en grand nombre. Les versions plus anciennes seront également supprimées plus tôt.
";
$elem["boxbackup-client/MinimumFileAge"]["default"]="21600";
$elem["boxbackup-client/MaxUploadWait"]["type"]="string";
$elem["boxbackup-client/MaxUploadWait"]["description"]="Maximum time to wait (in seconds) before uploading a file:
 Frequently modified files are likely to never get uploaded if they
 never reach the minimum wait time.
 .
 Please enter the maximum time to reach before the upload of a modified
 file to the server is enforced.
";
$elem["boxbackup-client/MaxUploadWait"]["descriptionde"]="Maximale Wartezeit (in Sekunden) bevor eine Datei hochgeladen wird:
 Häufig modifizierte Dateien werden wahrscheinlich nie auf den Server übertragen, falls sie die minimale Wartezeit nicht erreichen.
 .
 Bitte geben sie die Zeit ein, die maximal erreicht werden darf, bevor das Hochladen einer Datei erzwungen wird.
";
$elem["boxbackup-client/MaxUploadWait"]["descriptionfr"]="Délai maximum (en secondes) avant d'envoyer un fichier :
 Des fichiers fréquemment modifiés risquent de ne jamais être envoyés si le temps minimal avant envoi n'est jamais atteint.
 .
 Veuillez indiquer le délai maximum à attendre avant de forcer l'envoi d'un fichier vers le serveur.
";
$elem["boxbackup-client/MaxUploadWait"]["default"]="86400";
$elem["boxbackup-client/IncorrectNumber"]["type"]="error";
$elem["boxbackup-client/IncorrectNumber"]["description"]="Invalid time entered
 Please enter an integer value greater null.
";
$elem["boxbackup-client/IncorrectNumber"]["descriptionde"]="Ungültige Zeit eingegeben
 Bitte geben Sie einen ganzzahligen Wert größer Null ein.
";
$elem["boxbackup-client/IncorrectNumber"]["descriptionfr"]="Délai non valable
 Veuillez indiquer un entier strictement positif.
";
$elem["boxbackup-client/IncorrectNumber"]["default"]="";
$elem["boxbackup-client/notifyMail"]["type"]="string";
$elem["boxbackup-client/notifyMail"]["description"]="Recipient for alert notifications:
 The BoxBackup client sends alert notifications when a problem occurs
 during the backup.
 .
 Please enter either a local user name (for example 'root') or an email
 address (for example 'admin@example.org').
";
$elem["boxbackup-client/notifyMail"]["descriptionde"]="Empfänger für Alarmmeldungen:
 Der BoxBackup-Client versendet Alarmmeldungen, wenn während des Sicherns ein Problem auftritt.
 .
 Bitte geben Sie entweder einen lokalen Benutzernamen (zum Beispiel »root«) oder eine E-Mail-Adresse (zum Beispiel »admin@example.org«) ein.
";
$elem["boxbackup-client/notifyMail"]["descriptionfr"]="Destinataire des notifications d'alertes :
 Le client BoxBackup envoie des notifications d'alertes quand un problème survient lors d'une sauvegarde.
 .
 Vous pouvez soit indiquer un identifiant local (par exemple « root ») ou une adresse de courrier électronique (par exemple « admin@example.org »).
";
$elem["boxbackup-client/notifyMail"]["default"]="root";
$elem["boxbackup-client/generateCertificate"]["type"]="boolean";
$elem["boxbackup-client/generateCertificate"]["description"]="Generate the client private key and X.509 certificate request?
 The BoxBackup client needs an RSA private key and the corresponding X.509
 certificate to authenticate itself with the server.
 .
 Both can be generated automatically. You will need to send the
 certificate request to the BoxBackup server administrator who will
 sign it and send it back to you along with the server's Certification
 Authority certificate.
 .
 These files should be copied into BoxBackup's configuration
 directory. The file names to use are given in the
 /etc/boxbackup/bbackupd.conf file.
";
$elem["boxbackup-client/generateCertificate"]["descriptionde"]="Soll der private Schlüssel für den Client und der X.509-Zertifikat-Anfrage erzeugt werden?
 Der BoxBackup-Client benötigt einen privaten RSA-Schlüssel und das zugehörige X.509-Zertifikat, um sich gegenüber dem Server authentifizieren zu können.
 .
 Beides kann automatisch erzeugt werden. Sie müssen die Zertifikatanfrage an den Administrator des BoxBackup-Servers senden, der dieses dann signieren und Ihnen zusammen mit dem Certification-Authority-Zertifikat des Servers zurücksenden wird.
 .
 Diese Dateien sollten in das Konfigurationsverzeichnis von BoxBackup kopiert werden. Die zu verwendenden Dateinamen werden in /etc/boxbackup/bbacupd.conf angegeben.
";
$elem["boxbackup-client/generateCertificate"]["descriptionfr"]="Faut-il créer la clef privée et la demande de certificat X.509 du client ?
 Le client BoxBackup a besoin d'une clef privée RSA et d'un certificat X.509 correspondant pour s'authentifier auprès du serveur.
 .
 Tous deux peuvent être créés automatiquement. Vous devrez envoyer la demande de certificat à l'administrateur du serveur BoxBackup qui la signera et vous la renverra accompagnée du certificat de l'autorité de certification (CA) du serveur.
 .
 Ces fichiers doivent être copiés dans le répertoire de configuration de BoxBackup. Les noms de fichier à utiliser sont indiqués dans le fichier /etc/boxbackup/bbackupd.conf.
";
$elem["boxbackup-client/generateCertificate"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
