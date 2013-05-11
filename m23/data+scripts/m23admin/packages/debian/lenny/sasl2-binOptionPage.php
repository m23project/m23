<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sasl2-bin");

$elem["cyrus-sasl2/purge-sasldb2"]["type"]="boolean";
$elem["cyrus-sasl2/purge-sasldb2"]["description"]="Remove /etc/sasldb2?
 Cyrus SASL can store usernames and passwords in the /etc/sasldb2 database
 file.
 .
 If important data is stored in that file, you should back it up
 now or choose not to remove the file.
";
$elem["cyrus-sasl2/purge-sasldb2"]["descriptionde"]="/etc/sasldb2 entfernen?
 Cyrus SASL kann Benutzernamen und Passwörter in der Datenbankdatei /etc/sasldb2 speichern.
 .
 Falls wichtige Daten in dieser Datei gespeichert werden, sollten Sie jetzt eine Sicherungskopie anlegen oder auswählen, dass die Datei nicht entfernt wird.
";
$elem["cyrus-sasl2/purge-sasldb2"]["descriptionfr"]="Faut-il supprimer le fichier /etc/sasldb ?
 Cyrus SASL peut enregistrer les identifiants et les mots de passe dans la base de donnÃ©es /etc/sasldb2.
 .
 Si ce fichier contient des donnÃ©es importantes, pensez Ã  le sauvegarder dÃ¨s maintenant, ou bien choisissez de ne pas le supprimer.
";
$elem["cyrus-sasl2/purge-sasldb2"]["default"]="false";
$elem["cyrus-sasl2/backup-sasldb2"]["type"]="string";
$elem["cyrus-sasl2/backup-sasldb2"]["description"]="Backup file name for /etc/sasldb2:
 Cyrus SASL has stored usernames and passwords in the /etc/sasldb2 database
 file.
 .
 That file has to be upgraded to a newer database
 format. First, a backup of the current file will be created.
 You can use that if you need to manually downgrade Cyrus SASL.
 However, automatic downgrades are not supported.
 .
 Please specify the backup file name. You should check the available
 disk space in that location. If the backup file already exists, it will be overwritten.
 Leaving this field empty will select the default value
 (/var/backups/sasldb2.bak).
";
$elem["cyrus-sasl2/backup-sasldb2"]["descriptionde"]="Name der Sicherungskopie für /etc/sasldb2:
 Cyrus SASL hatte Benutzernamen und Passwörter in der Datenbankdatei /etc/sasldb2 gespeichert.
 .
 Es muss ein Upgrade dieser Datei auf ein neueres Datenbankformat vorgenommen werden. Vorher wird eine Sicherungskopie der Datei erstellt. Sie können diese verwenden, falls Sie Cyrus SASL aus irgendeinem Grund auf eine ältere Version deaktualisieren möchten. Beachten Sie, dass automatische Deaktualisierungen nicht unterstützt werden.
 .
 Bitte geben Sie den Namen der Sicherungskopie an. Sie sollten überprüfen, dass an diesem Platz genug verfügbarer Plattenplatz vorhanden ist. Falls die Sicherungsdatei bereits existiert, wird sie überschrieben. Falls Sie das Feld leer lassen, wird der Vorgabewert (/var/backups/sasldb2.bak) verwendet.
";
$elem["cyrus-sasl2/backup-sasldb2"]["descriptionfr"]="Nom du fichier de sauvegarde de /etc/sasldb2 :
 Cyrus SASL a enregistrÃ© les identifiants et les mots de passe dans la base de donnÃ©es /etc/sasldb2.
 .
 Ce fichier a Ã©tÃ© mis Ã  jour et le format de donnÃ©es a changÃ©. Une sauvegarde du fichier actuel va d'abord Ãªtre crÃ©Ã©e. Vous pourrez l'utiliser si vous avez besoin de revenir Ã  l'ancienne version de Cyrus SASL. Attention, le retour Ã  l'ancienne version n'est pas gÃ©rÃ© en mode automatique.
 .
 Veuillez indiquer le nom du fichier de sauvegarde. VÃ©rifiez d'abord la place disque disponible Ã  l'emplacement en question. Si le fichier de sauvegarde existe dÃ©jÃ , son contenu sera Ã©crasÃ©. Si vous ne remplissez pas ce champ, la valeur par dÃ©faut sera choisie (/var/backups/sasldb2.bak
";
$elem["cyrus-sasl2/backup-sasldb2"]["default"]="/var/backups/sasldb2.bak";
$elem["cyrus-sasl2/upgrade-sasldb2-backup-failed"]["type"]="error";
$elem["cyrus-sasl2/upgrade-sasldb2-backup-failed"]["description"]="Failed to back up /etc/sasldb2
 The /etc/sasldb2 file could not be backed up with the file name you
 specified.
 .
 This is a fatal error and will cause the package installation
 to fail.
 .
 Please eliminate all possible reasons that might lead to this failure,
 and try to configure this package again.
";
$elem["cyrus-sasl2/upgrade-sasldb2-backup-failed"]["descriptionde"]="Fehler beim Sichern von /etc/sasldb2
 Die Datei /etc/sasldb2 konnte nicht mit dem von Ihnen angegebenen Dateinamen gesichert werden.
 .
 Dieser Fehler ist fatal und die Paketinstallation wird fehlschlagen.
 .
 Bitte beseitigen Sie alle möglichen Gründe, die zu diesem Fehler geführt haben könnten und versuchen Sie, das Paket noch einmal zu konfigurieren.
";
$elem["cyrus-sasl2/upgrade-sasldb2-backup-failed"]["descriptionfr"]="Ãchec de la sauvegarde du fichier /etc/sasldb2
 Le fichier /etc/sasldb2 n'a pas pu Ãªtre sauvegardÃ© avec le nom de fichier que vous avez fourni.
 .
 Cette erreur est fataleÂ ; l'installation du paquet va Ã©chouer.
 .
 Veuillez Ã©liminer toutes les causes possibles de cet Ã©chec, puis essayez de configurer le paquet Ã  nouveau.
";
$elem["cyrus-sasl2/upgrade-sasldb2-backup-failed"]["default"]="";
$elem["cyrus-sasl2/upgrade-sasldb2-failed"]["type"]="error";
$elem["cyrus-sasl2/upgrade-sasldb2-failed"]["description"]="Failed to upgrade /etc/sasldb2
 The /etc/sasldb2 file could not be upgraded to the new database
 format.
 .
 This is a fatal error and will cause the package installation
 to fail.
 .
 The configuration process will attempt to restore the backup of this
 file to its original location.
 .
 Please eliminate all possible reasons that might lead to this failure,
 then try to configure this package again.
";
$elem["cyrus-sasl2/upgrade-sasldb2-failed"]["descriptionde"]="Upgrade von /etc/sasldb2 fehlgeschlagen
 Es konnte kein Upgrade der Datei /etc/sasldb2 auf das neue Datenbankformat vorgenommen werden.
 .
 Dieser Fehler ist fatal und die Paketinstallation wird fehlschlagen.
 .
 Der Konfigurationsprozess wird versuchen, die Sicherungskopie dieser Datei an dem Ursprungsort wiederherzustellen.
 .
 Bitte beseitigen Sie alle möglichen Gründe, die zu diesem Fehler geführt haben könnten, versuchen Sie dann, das Paket noch einmal zu konfigurieren.
";
$elem["cyrus-sasl2/upgrade-sasldb2-failed"]["descriptionfr"]="Ãchec de la mise Ã  jour du fichier /etc/sasldb2
 Le fichier /etc/sasldb2 n'a pas pu Ãªtre mis Ã  jour vers le nouveau format de donnÃ©es.
 .
 Cette erreur est fataleÂ ; l'installation du paquet va Ã©chouer.
 .
 Le processus de configuration va essayer de restaurer la sauvegarde de ce fichier Ã  son emplacement d'origine.
 .
 Veuillez Ã©liminer toutes les causes possibles de cet Ã©chec, puis essayez de configurer le paquet de nouveau.
";
$elem["cyrus-sasl2/upgrade-sasldb2-failed"]["default"]="";
PKG_OptionPageTail2($elem);
?>
