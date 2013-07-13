<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("clamsmtp");

$elem["clamsmtp/addusergroup"]["type"]="boolean";
$elem["clamsmtp/addusergroup"]["description"]="Add a clamsmtp system user and group?
 New installations of clamsmtp install with a system user and group of
 \"clamsmtp\".  The \"clamav\" user is added to the clamsmtp group to
 allow the clamav-daemon process to view the quarantine directory.  If
 this option is set, the installation process will also update the ownership
 and permissions of the quarantine and run directories.
";
$elem["clamsmtp/addusergroup"]["descriptionde"]="Einen Clamsmtp-Systembenutzer und -gruppe hinzufügen?
 Neue Installationen von Clamsmtp werden mit einem Systembenutzer und -gruppe »clamsmtp« installiert. Der »clamav«-Benutzer wird der clamsmtp-Gruppe hinzugefügt, damit der Clamav-Daemonprozess das Quarantäne-Verzeichnis einsehen kann. Falls diese Option gesetzt ist, wird der Installationsprozess auch den Eigentümer und die Rechte des Quarantäne- und Run-Verzeichnisses aktualisieren.
";
$elem["clamsmtp/addusergroup"]["descriptionfr"]="Faut-il ajouter l'identifiant et le groupe système « clamsmtp » ?
 Une nouvelle installation de clamsmtp crée l'identifiant système et le groupe « clamsmtp ». L'identifiant « clamav » est ajouté au groupe « clamsmtp » pour permettre au service clamav d'accéder au répertoire de quarantaine. Si vous choisissez cette option, le processus d'installation mettra également à jour le propriétaire et les autorisations des répertoires de quarantaine et d'exécution.
";
$elem["clamsmtp/addusergroup"]["default"]="true";
$elem["clamsmtp/do-fixperms"]["type"]="boolean";
$elem["clamsmtp/do-fixperms"]["description"]="Fix directory permissions?
 clamsmtpd needs read and write permissions to the virus spool directory,
 and the run directory in which its PID file is created.  Additionally, the
 Clam AV daemon must have read access to the spool directory to scan for
 viruses.
 .
 The post-installation script can fix the permissions and ownership of these
 two directories.  It will consult the /etc/clamsmtpd.conf and
 /etc/default/clamsmtp files for the administratively assigned TempDirectory,
 PidFile, User, and Group variables, and then update the two directories
 appropriately.
 .
 Be sure to check directory permissions after running the init script with the
 parameters 'start' or 'restart'.
";
$elem["clamsmtp/do-fixperms"]["descriptionde"]="Verzeichnisrechte korrigieren?
 Clamsmtpd benötigt Lese- und Schreibrechte für das Virus-Spool-Verzeichnis und das run-Verzeichnis, in dem seine PID-Datei erstellt wird. Zusätzlich benötigt der Clam-AV-Daemon für die Virenprüfung Lesezugriff auf das Spool-Verzeichnis.
 .
 Das Post-Installations-Skript kann die Rechte und Eigentümer dieser zwei Verzeichnisse korrigieren. Es wird die administrativ zugewiesenen Variablen TempDirectory, PidFile, Benutzer und Gruppe aus den Dateien /etc/clamsmtpd.conf und /etc/default/clamsmtp entnehmen und dann die zwei Verzeichnisse entsprechend aktualisieren.
 .
 Überprüfen Sie die Verzeichnisrechte, nachdem Sie die Kommandos »start« oder »restart« für das init-Skript verwendet haben.
";
$elem["clamsmtp/do-fixperms"]["descriptionfr"]="Faut-il corriger les autorisations sur le répertoire ?
 Clamsmtp doit avoir accès en lecture et écriture au répertoire de cache des virus, ainsi qu'au répertoire d'exécution « run » où le fichier PID (fichier d'identification de processus) est créé. De plus, le démon Clam AV doit aussi avoir accès en lecture à ce même répertoire de cache afin d'y examiner les fichiers à la recherche de virus.
 .
 Veuillez confirmer si le script de post-installation doit vérifier et corriger les autorisations et le propriétaire de ces deux répertoires. Les fichiers /etc/clamsmtpd.conf et /etc/default/clamsmtp seront consultés afin d'utiliser les variables administratives « TempDirectory », « PidFile », « User » et « Group » puis les deux répertoires seront corrigés.
 .
 N'oubliez pas de vérifier les permissions du répertoire après l'exécution du script d'initialisation avec le paramètre « start » ou « restart ».
";
$elem["clamsmtp/do-fixperms"]["default"]="false";
$elem["clamsmtp/purge"]["type"]="boolean";
$elem["clamsmtp/purge"]["description"]="Purge spool directory on --purge?
 The virus spool directory may contain quarantined viruses that can be removed
 automatically when purging the package.
";
$elem["clamsmtp/purge"]["descriptionde"]="Bei --purge das Spool-Verzeichnis vollständig löschen?
 Das Virus-Spool-Verzeichnis könnte Viren in Quarantäne enthalten. Diese können beim vollständigen Löschen des Paketes automatisch entfernt werden.
";
$elem["clamsmtp/purge"]["descriptionfr"]="Faut-il purger le répertoire de cache si le paquet est désinstallé avec l'option « --purge » ?
 Le répertoire de cache pourrait contenir des virus en quarantaine. Veuillez choisir si ces fichiers doivent être supprimés lorsque le paquet est purgé.
";
$elem["clamsmtp/purge"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
