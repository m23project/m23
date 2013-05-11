<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("clamsmtp");

$elem["clamsmtp/addusergroup"]["type"]="select";
$elem["clamsmtp/addusergroup"]["choices"][1]="yes";
$elem["clamsmtp/addusergroup"]["description"]="Add a clamsmtp system user and group?
 New installations of clamsmtp install with a system user and group of
 \"clamsmtp\".  The \"clamav\" user is added to the clamsmtp group to
 allow the clamav-daemon process to view the quarantine directory.  If
 you answer \"yes\" to this question, the installation process will also
 update the ownership and permissions of the quarantine and run
 directories.
";
$elem["clamsmtp/addusergroup"]["descriptionde"]="Einen Clamsmtp-Systembenutzer und -gruppe hinzufügen?
 Neue Installationen von Clamsmtp werden mit einem Systembenutzer und -gruppe »clamsmtp« installiert. Der »clamav«-Benutzer wird der clamsmtp-Gruppe hinzugefügt, um dem Clamav-Daemonprozess zu erlauben, das Quarantäne-Verzeichnis einzusehen. Falls Sie dieser Frage zustimmen, wird der Installationsprozess auch den Eigentümer und die Rechte des Quarantäne- und Run-Verzeichnisses aktualisieren.
";
$elem["clamsmtp/addusergroup"]["descriptionfr"]="Faut-il ajouter l'identifiant et le groupe système « clamsmtp » ?
 Une nouvelle installation de clamsmtp crée l'identifiant système et le groupe « clamsmtp ». L'identifiant « clamav » est ajouté au groupe « clamsmtp » pour permettre au service clamav d'accéder au répertoire de quarantaine. Si vous choisissez cette option, le processus d'installation mettra également à jour le propriétaire et les autorisations des répertoires de quarantaine et d'exécution.
";
$elem["clamsmtp/addusergroup"]["default"]="yes";
$elem["clamsmtp/do-fixperms"]["type"]="boolean";
$elem["clamsmtp/do-fixperms"]["description"]="Fix directory permissions?
 clamsmtpd needs read and write permissions to the virus spool directory,
 and the run directory in which its PID file is created.  Additionally, the
 Clam AV daemon must have read access to the spool directory to scan for
 viruses.
 .
 Would you like the post-installation script to fix the permissions
 and ownership of these two directories?  It will consult the
 /etc/clamsmtpd.conf and /etc/default/clamsmtp files for the
 administratively assigned TempDirectory, PidFile, User, and Group
 variables, and then update the two directories appropriately.
 .
 Warning! Use this option at your own risk, and be sure to check directory
 permissions after running the 'start' or 'restart' commands for the init
 script.
";
$elem["clamsmtp/do-fixperms"]["descriptionde"]="Verzeichnisrechte korrigieren?
 Clamsmtpd benötigt Lese- und Schreibrechte für das Virus-Spool-Verzeichnis und das run-Verzeichnis, in dem seine PID-Datei erstellt wird. Zusätzlich benötigt der Clam AV-Daemon Lesezugriff auf das Spool-Verzeichnis, um auf Viren zu überprüfen.
 .
 Möchten Sie, dass das Post-Installations-Skript die Rechte und Eigentümer dieser zwei Verzeichnisse korrigiert? Es wird die administrativ zugewiesenen TempDirectory-, PidFile-, Benutzer- und Gruppe-Variablen aus den /etc/clamsmtpd.conf- und /etc/default/clamsmtp-Dateien entnehmen und dann die zwei Verzeichnisse entsprechend aktualisieren.
 .
 Achtung! Verwenden Sie diese Option auf eigene Gefahr und überprüfen Sie die Verzeichnisrechte, nachdem Sie die »start«- oder »restart«-Kommandos für das init-Skript verwendet haben.
";
$elem["clamsmtp/do-fixperms"]["descriptionfr"]="Faut-il corriger les autorisations sur le répertoire ?
 Clamsmtp doit avoir accès en lecture et écriture au répertoire de cache des virus, et au répertoire d'exécution « run » où le fichier PID (fichier d'identification de processus) est créé. De plus, le démon Clam AV doit aussi avoir accès en lecture à ce même répertoire de cache afin d'y examiner les fichiers à la recherche de virus.
 .
 Veuillez confirmer si le script de post-installation doit vérifier et corriger les autorisations et le propriétaire de ces deux répertoires. Les fichiers /etc/clamsmtpd.conf et /etc/default/clamsmtp seront consultés afin d'utiliser les variables administratives « TempDirectory », « User » et « Group » puis les deux répertoires seront corrigés.
 .
 Attention : utilisez cette option avec prudence et vérifiez les autorisations sur ce répertoire avant d'exécuter les commandes « start » ou « restart » du script d'initialisation.
";
$elem["clamsmtp/do-fixperms"]["default"]="false";
$elem["clamsmtp/purge"]["type"]="select";
$elem["clamsmtp/purge"]["choices"][1]="yes";
$elem["clamsmtp/purge"]["description"]="Purge spool directory on --purge?
 The virus spool directory may contain quarantined viruses.  Do you want these
 files to be removed when you specify the '--purge' option to dpkg or apt?
";
$elem["clamsmtp/purge"]["descriptionde"]="Bei --purge das Spool-Verzeichnis vollständig löschen?
 Das Virus-Spool-Verzeichnis könnte Viren in Quarantäne enthalten. Möchten Sie, dass diese Dateien entfernt werden, wenn Sie bei Dpkg oder Apt die »--purge«-Option verwenden?
";
$elem["clamsmtp/purge"]["descriptionfr"]="Faut-il purger le répertoire de cache si le paquet est désinstallé avec l'option « --purge » ?
 Le répertoire de cache pourrait contenir des virus en quarantaine. Veuillez choisir si ces fichiers doivent être supprimés lorsque le paquet est purgé avec l'option « --purge » de dpkg ou de apt.
";
$elem["clamsmtp/purge"]["default"]="yes";
PKG_OptionPageTail2($elem);
?>
