<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("boxbackup-server");

$elem["boxbackup-server/debconf"]["type"]="boolean";
$elem["boxbackup-server/debconf"]["description"]="Should BoxBackup be configured automatically?
 The package configuration scripts can create the configuration files
 for the BoxBackup server.
 .
 You should choose this option if you are not familiar with BoxBackup's
 configuration options. The configuration can be done manually with the
 'raidfile-config' and 'bbstored-config' scripts.
 .
 The server will not start if it is not configured. In all cases,
 reading the /usr/share/doc/boxbackup-server/README.Debian is
 recommended.
";
$elem["boxbackup-server/debconf"]["descriptionde"]="Soll BoxBackup automatisch konfiguriert werden?
 Die im Paket enthaltenen Konfigurationskripte können die Konfiguration für den BoxBackup-Server erzeugen.
 .
 Sie sollten diese Option wählen, falls Sie nicht mit den Konfigurationsoptionen von BoxBackup vertraut sind. Die Konfiguration kann mit Hilfe der Skripte »raidfile-config« und »bbstored-config« manuell vorgenommen werden.
 .
 Der Server wird nicht starten, falls er nicht konfiguriert wurde. In jedem Fall wird empfohlen, /usr/share/doc/boxbackup-server/README.Debian zu lesen.
";
$elem["boxbackup-server/debconf"]["descriptionfr"]="Faut-il automatiquement configurer BoxBackup ?
 Les scripts de configuration de ce paquet peuvent créer les fichiers de configuration pour le serveur BoxBackup.
 .
 Vous devriez utiliser cette option si les options de configuration de BoxBackup ne vous sont pas familières. Vous pouvez aussi configurer le serveur vous-même à l'aide des scripts « raidfile-config » et « bbstored-config ».
 .
 Le serveur ne démarrera pas s'il n'est pas configuré. Dans tous les cas, la lecture de /usr/share/doc/boxbackup-server/README.Debian est recommandée.
";
$elem["boxbackup-server/debconf"]["default"]="false";
$elem["boxbackup-server/raidDirectories"]["type"]="string";
$elem["boxbackup-server/raidDirectories"]["description"]="Location of the RAID directories:
 Please choose the location for the three RAID file directories.
 .
 To enable RAID, the directory names should be a space-separated list of
 three partitions, each on different physical hard drives (for example:
 '/raid/0.0 /raid/0.1 /raid/0.2').
 .
 If you don't want to enable RAID, just specify the path to one directory
 where the backups will be stored (for example, /usr/local/lib/boxbackup).
 .
 These directories will be created if they do not exist.
";
$elem["boxbackup-server/raidDirectories"]["descriptionde"]="Ort der RAID-Verzeichnisse:
 Bitte wählen Sie den Ort für die drei RAID-Datei-Verzeichnisse aus.
 .
 Um die RAID-Funktion zu aktivieren, sollte eine durch Leerzeichen getrennte Liste dreier Partitionen eingegeben werden. Jede dieser Partitionen sollten auf einem anderen physischen Laufwerk sein (zum Beispiel »/raid/0.0 /raid/0.1 /raid/0.2«).
 .
 Falls Sie die RAID-Funktion nicht aktivieren wollen, geben Sie einfach einen Pfad zu einem Verzeichnis an, in dem die Sicherungskopien gespeichert werden sollen (zum Beispiel /usr/local/lib/boxbackup).
 .
 Diese Verzeichnisse werden angelegt, sollten sie nicht existieren.
";
$elem["boxbackup-server/raidDirectories"]["descriptionfr"]="Emplacement des répertoires RAID :
 Veuillez choisir l'emplacement des trois répertoires RAID.
 .
 Pour activer la gestion RAID, veuillez indiquer, séparés par des espaces, les noms de trois partitions situées sur des disques physiques différents (par exemple : « /raid/0.0 /raid/0.1 /raid/0.2 »).
 .
 Si vous ne voulez pas activer la gestion du RAID, indiquez seulement le chemin d'un répertoire où les sauvegardes seront stockées (par exemple, /usr/local/lib/boxbackup).
 .
 Ces répertoires seront créés s'ils n'existent pas.
";
$elem["boxbackup-server/raidDirectories"]["default"]="";
$elem["boxbackup-server/incorrectDirectories"]["type"]="error";
$elem["boxbackup-server/incorrectDirectories"]["description"]="Invalid path names
 The path names to the directories must be absolute path names,
 separated by spaces.
 .
 For example: /raid/0.0 /raid/0.1 /raid/0.2
";
$elem["boxbackup-server/incorrectDirectories"]["descriptionde"]="Ungültige Pfadnamen
 Die Pfade zu den Verzeichnissen müssen absolut sein und durch Leerzeichen getrennt angegeben werden.
 .
 Zum Beispiel: /raid/0.0 /raid/0.1 /raid/0.2
";
$elem["boxbackup-server/incorrectDirectories"]["descriptionfr"]="Chemins non valables
 Ces répertoires doivent être indiqués sous forme de chemins absolus et séparés par des espaces.
 .
 Par exemple : /raid/0.0 /raid/0.1 /raid/0.2
";
$elem["boxbackup-server/incorrectDirectories"]["default"]="";
$elem["boxbackup-server/raidBlockSize"]["type"]="string";
$elem["boxbackup-server/raidBlockSize"]["description"]="Block size for the userland RAID system:
 BoxBackup uses userland RAID techniques.
 .
 Please choose the block size to use for the storage.
 For maximum efficiency, you should choose the block size of the underlying
 file system (which can be displayed for ext2 filesystems with the 'tune2fs -l'
 command).
 .
 This value should be set even if you don't plan to use RAID.
";
$elem["boxbackup-server/raidBlockSize"]["descriptionde"]="Blockgröße für das im Benutzerbereich angesiedelte RAID-System:
 BoxBackup verwendet RAID-Techniken für den Benutzerbereich.
 .
 Bitte wählen Sie die zu verwendende Blockgröße zur Speicherung. Um maximale Effizienz zu erreichen, sollten Sie die Blockgröße des darunterliegenden Dateisystems wählen. Diese kann für Ext-Dateisysteme mit dem Befehl »tune2fs -l« angezeigt werden.
 .
 Dieser Wert sollte auch dann angegeben werden, falls Sie kein RAID verwenden wollen.
";
$elem["boxbackup-server/raidBlockSize"]["descriptionfr"]="Taille des blocs pour le système RAID en espace utilisateur :
 BoxBackup utilise un système de RAID en espace utilisateur.
 .
 Veuillez choisir une taille de blocs pour le stockage. Pour une efficacité maximale, vous devriez choisir la même taille de blocs que le système de fichiers sous-jacent (que vous pouvez obtenir, pour les systèmes de fichiers ext2 et ext3, avec la commande « tune2fs -l »).
 .
 Cette valeur est nécessaire même si vous ne comptez pas utiliser le RAID.
";
$elem["boxbackup-server/raidBlockSize"]["default"]="4096";
$elem["boxbackup-server/generateCertificate"]["type"]="boolean";
$elem["boxbackup-server/generateCertificate"]["description"]="Generate a server private key and X.509 certificate request?
 The BoxBackup server needs an RSA private key and the corresponding X.509
 certificate to perform client-server authentication and communication
 encryption.
 .
 Both can be generated automatically. You will need to sign the
 certificate with your root CA (see the boxbackup-server package) and
 put this signed certificate and the root CA certificate in the
 configuration folder.
";
$elem["boxbackup-server/generateCertificate"]["descriptionde"]="Soll ein privater Server-Schlüssel und eine X.509-Zertifikatanfrage erzeugt werden?
 Der BoxBackup-Server benötigt einen privaten RSA-Schlüssel und ein zugehöriges X.509-Zertifikat, um die Client-Server-Authentifizierung durchführen zu können und die Kommunikation zu verschlüsseln.
 .
 Beides kann automatisch erzeugt werden. Sie müssen das Zertifikat mit Ihrem Wurzel-CA-Zertifikat signieren (siehe das Paket »boxbackup-server«) und das signierte Zertifikat sowie das Wurzel-CA-Zertifikat in Ihrem Konfigurationsordner ablegen.
";
$elem["boxbackup-server/generateCertificate"]["descriptionfr"]="Faut-il créer une clef privée et une demande de certificat X.509 pour le serveur ?
 Le serveur BoxBackup a besoin d'une clef privée RSA et du certificat X.509 correspondant pour l'authentification et le chiffrement entre le client et le serveur.
 .
 Ces deux éléments peuvent être créés automatiquement. Vous aurez besoin de faire signer le certificat par votre autorité de certification principale (voir le paquet boxbackup-server) et de placer le certificat signé accompagné du certificat du CA racine dans le répertoire de configuration.
";
$elem["boxbackup-server/generateCertificate"]["default"]="true";
$elem["boxbackup-server/incorrectBlocksize"]["type"]="error";
$elem["boxbackup-server/incorrectBlocksize"]["description"]="Invalid block size
 The block size must be a power of two (e.g. 1024 or 4096).
";
$elem["boxbackup-server/incorrectBlocksize"]["descriptionde"]="Ungültige Blockgröße.
 Die Blockgröße muss eine Potenz von Zwei sein (z.B. 1024 oder 4096).
";
$elem["boxbackup-server/incorrectBlocksize"]["descriptionfr"]="Taille de blocs non valable
 La taille d'un bloc doit être une puissance de deux (par exemple 1024 ou 4096).
";
$elem["boxbackup-server/incorrectBlocksize"]["default"]="";
PKG_OptionPageTail2($elem);
?>
