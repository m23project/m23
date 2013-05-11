<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lire");

$elem["lire/lire_user_not_lire"]["type"]="boolean";
$elem["lire/lire_user_not_lire"]["description"]="Rename old Lire user to 'lire'?
 Previous releases of Lire used to permit the use of a user whose
 username was different than 'lire' for running special tasks such as
 cronjobs. This is no longer supported since this was causing more
 trouble than needed.
 .
 You seem to be upgrading from such a version; the configuration program can
 convert your current setup.  If no conversion is done, the installation
 process will be aborted.
 .
 Refer to /usr/share/doc/lire/README.Debian for details.
";
$elem["lire/lire_user_not_lire"]["descriptionde"]="Alten Lire-Benutzer in »lire« umbenennen?
 Vorhergehende Veröffentlichungen von Lire erlauben die Verwendung von Benutzern, deren Benutzername nicht »lire« war, um spezielle Aufgaben wie Cron-Jobs auszuführen. Dies wird nicht mehr unterstützt, da es mehr Ärger als notwendig erzeugte.
 .
 Sie scheinen ein Upgrade von so einer Version durchzuführen; das Konfigurationsprogramm kann Ihre Konfiguration konvertieren. Falls diese Umstellung nicht erfolgt wird der Installationsprozess abgebrochen.
 .
 Lesen Sie /usr/share/doc/lire/README.Debian für weitere Details.
";
$elem["lire/lire_user_not_lire"]["descriptionfr"]="Faut-il renommer l'ancien identifiant utilisé par Lire en « lire » ?
 Des versions précédentes de Lire permettaient l'utilisation d'un compte utilisateur dont l'identifiant était différent de « lire » pour l'exécution de tâches spécifiques comme les tâches périodiques de cron. Cette possibilité n'est désormais plus offerte car elle compliquait inutilement la maintenance du système.
 .
 Il semble que vous effectuiez la mise à niveau depuis une telle version. Le programme de configuration peut modifier votre configuration actuelle. Si aucune conversion n'est faite, le processus d'installation sera interrompu.
 .
 Veuillez consulter le fichier /usr/share/doc/lire/README.Debian pour plus d'informations.
";
$elem["lire/lire_user_not_lire"]["default"]="false";
$elem["lire/use_existing_user"]["type"]="boolean";
$elem["lire/use_existing_user"]["description"]="Use existing 'lire' user for Lire?
 A user named 'lire' seems to be present on your system, which may or
 may not have been created by a previous installation of Lire.
 .
 This poses no problem per se but beware that this user will have access
 to the files handled (created or otherwise readable...) by the Lire
 automated processes. If you rather wish to cancel the installation
 process, choose 'No' below.
 .
 Refer to /usr/share/doc/lire/README.Debian for details.
";
$elem["lire/use_existing_user"]["descriptionde"]="Existierenden Benutzer »lire« für Lire verwenden?
 Auf Ihrem System scheint ein Benutzer mit Namen »lire« zu existieren, der von einer vorhergehenden Installation von Lire erstellt worden sein könnte.
 .
 Dies stellt kein Problem an sich dar, aber beachten Sie, dass dieser Benutzer Zugriff auf die vom automatisierten Lire-Prozess verarbeiteten (erstellten, oder anderweitig lesbaren) Dateien haben wird. Falls Sie lieber den Installationsprozess abbrechen würden, lehnen Sie unten ab.
 .
 Lesen Sie /usr/share/doc/lire/README.Debian für weitere Details.
";
$elem["lire/use_existing_user"]["descriptionfr"]="Faut-il utiliser l'identifiant « lire » existant pour Lire ?
 Un identifiant « lire » semble exister sur votre système. Il a peut-être été créé par une installation précédente de Lire.
 .
 Cela ne pose a priori aucun problème. Cependant, cet utilisateur aura accès aux fichiers gérés par les processus automatiques de Lire (qu'ils aient été créés ou qu'ils soient accessibles en lecture). Ne choisissez pas cette option si vous préférez annuler la procédure d'installation.
 .
 Veuillez consulter le fichier /usr/share/doc/lire/README.Debian pour plus d'informations.
";
$elem["lire/use_existing_user"]["default"]="true";
$elem["lire/use_existing_group"]["type"]="boolean";
$elem["lire/use_existing_group"]["description"]="Use existing 'lire' group for Lire?
 A group named 'lire' seems to be present on your system, which may or
 may not have been created by a previous installation of Lire.
 .
 This poses no problem per se but beware that this group will have access
 to the files handled (created or otherwise readable...) by the Lire
 automated processes. If you rather wish to cancel the installation
 process, choose 'No' below.
 .
 Refer to /usr/share/doc/lire/README.Debian for details.
";
$elem["lire/use_existing_group"]["descriptionde"]="Existierende Gruppe »lire« für Lire verwenden?
 Auf Ihrem System scheint eine Gruppe mit Namen »lire« zu existieren, die von einer vorhergehenden Installation von Lire erstellt worden sein könnte.
 .
 Dies stellt kein Problem an sich dar, aber beachten Sie, dass diese Gruppe Zugriff auf die vom automatisierten Lire-Prozess verarbeiteten (erstellten, oder anderweitig lesbaren) Dateien haben wird. Falls Sie lieber den Installationsprozess abbrechen würden, lehnen Sie unten ab.
 .
 Lesen Sie /usr/share/doc/lire/README.Debian für weitere Details.
";
$elem["lire/use_existing_group"]["descriptionfr"]="Faut-il utiliser le groupe « lire » existant pour Lire ?
 Un groupe « lire » semble exister sur votre système. Il a peut-être été créé par une installation précédente de Lire.
 .
 Cela ne pose a priori aucun problème. Cependant, ce groupe aura accès aux fichiers gérés par les processus automatiques de Lire (qu'ils aient été créés ou qu'ils soient accessibles en lecture). Ne choisissez pas cette option si vous préférez annuler la procédure d'installation.
 .
 Veuillez consulter le fichier /usr/share/doc/lire/README.Debian pour plus d'informations.
";
$elem["lire/use_existing_group"]["default"]="true";
$elem["lire/purge_user_files"]["type"]="boolean";
$elem["lire/purge_user_files"]["description"]="Remove 'lire' user, group and files when purging Lire?
 Whenever Lire gets purged from your system, the 'lire' user (along with
 its home directory and all the files therein) and the 'lire' group can
 get automatically removed.
";
$elem["lire/purge_user_files"]["descriptionde"]="Den »lire«-Benutzer, -Gruppe und Dateien löschen, wenn Lire vollständig gelöscht wird?
 Wann immer Lire von Ihrem System vollständig gelöscht (»purged«) wird, können der »lire«-Benutzer (zusammen mit seinem Home-Verzeichnis und allen darin enthaltenen Dateien) und die »lire«-Gruppe automatisch entfernt werden.
";
$elem["lire/purge_user_files"]["descriptionfr"]="Faut-il supprimer l'utilisateur « lire », ses fichiers et le groupe lors de la purge ?
 Lorsque Lire sera effacé complètement de votre système, l'utilisateur « lire » (ainsi que son répertoire personnel et les fichiers de ce répertoire) et le groupe « lire » peuvent être automatiquement supprimés.
";
$elem["lire/purge_user_files"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
