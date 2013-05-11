<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("jffnms");

$elem["jffnms/erroruid"]["type"]="error";
$elem["jffnms/erroruid"]["description"]="jffnms user already exists
 The preinstall script for JFFNMS tried to create a JFFNMS user but there
 was already a user of that name so it has aborted installation.  Please
 read /usr/share/doc/jffnms/README.Debian for more information.
";
$elem["jffnms/erroruid"]["descriptionde"]="Der Benutzer jffnms existiert bereits
 Das preinstall-Skript für JFFNMS hat versucht, einen JFFNMS-Benutzer zu erstellen, aber es gab bereits einen Benutzer mit diesem Namen. Daher wurde die Installation abgebrochen. Bitte lesen Sie /usr/share/doc/jffnms/README.Debian für weitere Informationen.
";
$elem["jffnms/erroruid"]["descriptionfr"]="L'identifiant jffnms existe déjà
 Le script de pré-installation de JFFNMS a tenté de créer un identifiant jffnms mais cet identifiant existe déjà et l'installation a été abandonnée. Veuillez lire /usr/share/doc/jffnms/README.Debian pour plus d'informations.
";
$elem["jffnms/erroruid"]["default"]="";
$elem["jffnms/errorgid"]["type"]="error";
$elem["jffnms/errorgid"]["description"]="jffnms group already exists
 The preinstall script for JFFNMS tried to create a JFFNMS group but there
 was already a group of that name so it has aborted installation.  Please
 read /usr/share/doc/jffnms/README.Debian for more information.
";
$elem["jffnms/errorgid"]["descriptionde"]="Die Gruppe jffnms existiert bereits
 Das preinstall-Skript für JFFNMS hat versucht, eine JFFNMS-Gruppe zu erstellen, aber es gab bereits einen Gruppe mit diesem Namen. Daher wurde die Installation abgebrochen. Bitte lesen Sie /usr/share/doc/jffnms/README.Debian für weitere Informationen.
";
$elem["jffnms/errorgid"]["descriptionfr"]="Le groupe jffnms existe déjà
 Le script de pré-installation de JFFNMS a tenté de créer un groupe jffnms mais ce groupe existe déjà et l'installation a été abandonnée. Veuillez lire /usr/share/doc/jffnms/README.Debian pour plus d'informations.
";
$elem["jffnms/errorgid"]["default"]="";
$elem["jffnms/compresslogs"]["type"]="string";
$elem["jffnms/compresslogs"]["description"]="Days until log files are compressed:
 Enter how many days do you want to keep of uncompressed JFFNMS log files.
 The recommended and default value is 2 days.  Setting this value to lower
 than 2 may cause problems. It also doesn't make sense to make this number
 bigger than the number of days until log files deleted.
";
$elem["jffnms/compresslogs"]["descriptionde"]="Tage bis die Log-Dateien komprimiert werden:
 Geben Sie ein, wie viele Tage Sie die unkomprimierten JFFNMS Log-Dateien behalten möchten. Der empfohlene und Standardwert ist zwei Tage. Einstellungen kleiner als zwei könnten zu Problemen führen. Es macht auch keinen Sinn, diese Zahl größer als die Zahl der Tage zu wählen, nach denen die Log-Dateien gelöscht werden.
";
$elem["jffnms/compresslogs"]["descriptionfr"]="Nombre de jours avant la compression des fichiers journaux :
 Veuillez indiquer le nombre de jours écoulés avant la compression des fichiers journaux de JFFNMS. La valeur recommandée est de 2 jours. Mettre une valeur inférieure peut provoquer des dysfonctionnements. Utiliser une valeur plus élevée que le nombre de jours avant l'effacement des fichiers journaux n'a pas de sens.
";
$elem["jffnms/compresslogs"]["default"]="2";
$elem["jffnms/deletelogs"]["type"]="string";
$elem["jffnms/deletelogs"]["description"]="Days until log files are deleted:
 Enter how many days of log files, compressed or not, do you want to keep.
 The default is 7 days of logs.  It doesn't make any sense to set this lower
 than the number of days of uncompressed files, as the cron job will compress
 the files and then delete them in the same run.
";
$elem["jffnms/deletelogs"]["descriptionde"]="Tage nach denen die Log-Dateien gelöscht werden:
 Geben Sie ein, wie viele Tage mit Log-Dateien, komprimiert oder nicht, Sie behalten möchten. Der Standardwert ist sieben Tage mit Logs. Es ergibt keinen Sinn, diesen Wert kleiner als die Anzahl der Tage mit unkomprimierten Dateien zu setzten, da der Cron-Job die Datei komprimieren und im gleichen Lauf löschen wird.
";
$elem["jffnms/deletelogs"]["descriptionfr"]="Nombre de jours avant l'effacement des fichiers journaux :
 Veuillez indiquer le nombre de jours écoulés avant l'effacement des fichiers journaux, compressés ou non. La valeur recommandée est de 7 jours. Mettre une valeur plus faible que le nombre de jours avant la compression des fichiers journaux n'a pas de sens puisque la tâche planifiée « cron » effacerait alors les fichiers juste après les avoir compressés.
";
$elem["jffnms/deletelogs"]["default"]="7";
$elem["jffnms/install-error"]["type"]="select";
$elem["jffnms/install-error"]["choices"][1]="abort";
$elem["jffnms/install-error"]["choices"][2]="retry";
$elem["jffnms/install-error"]["description"]="Error installing database for jffnms:
 An error seems to have occurred while installing the database.
 If it's of any help, this was the error encountered:
 .
 ${error}
 .
 At this point, you have the option to retry or abort the operation.
 If you choose \"retry\", you will be prompted with all the configuration
 questions once more and another attempt will be made at performing the
 operation. \"retry (skip questions)\" will immediately attempt the operation
 again, skipping all questions.  If you choose \"abort\", the operation will
 fail and you will need to downgrade, reinstall, reconfigure this package,
 or otherwise manually intervene to continue using it.

";
$elem["jffnms/install-error"]["descriptionde"]="";
$elem["jffnms/install-error"]["descriptionfr"]="";
$elem["jffnms/install-error"]["default"]="abort";
PKG_OptionPageTail2($elem);
?>
