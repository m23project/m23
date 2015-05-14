<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("jffnms");

$elem["jffnms/erroruid"]["type"]="error";
$elem["jffnms/erroruid"]["description"]="jffnms user already exists
 The installation has been aborted because there is already a user
 with the name \"jffnms\". See /usr/share/doc/jffnms/README.Debian.
";
$elem["jffnms/erroruid"]["descriptionde"]="Der Benutzer »jffnms« existiert bereits.
 Die Installation wurde abgebrochen, da bereits ein Benutzer mit dem Namen »jffnms« existiert. Weitere Informationen finden Sie in /usr/share/doc/jffnms/README.Debian.
";
$elem["jffnms/erroruid"]["descriptionfr"]="Identifiant jffnms déjà existant
 L'installation a été abandonnée car un identifiant « jffnms » existe déjà. Veuillez consulter /usr/share/doc/jffnms/README.Debian pour plus d'informations.
";
$elem["jffnms/erroruid"]["default"]="";
$elem["jffnms/errorgid"]["type"]="error";
$elem["jffnms/errorgid"]["description"]="jffnms group already exists
 The installation has been aborted because there is already a user group
 with the name \"jffnms\". See /usr/share/doc/jffnms/README.Debian.
";
$elem["jffnms/errorgid"]["descriptionde"]="Die Gruppe »jffnms« existiert bereits.
 Die Installation wurde abgebrochen, da bereits eine Gruppe mit dem Namen »jffnms« existiert. Weitere Informationen finden Sie in /usr/share/doc/jffnms/README.Debian.
";
$elem["jffnms/errorgid"]["descriptionfr"]="Groupe jffnms déjà existant
 L'installation a été abandonnée car un groupe « jffnms » existe déjà. Veuillez consultez /usr/share/doc/jffnms/README.Debian pour plus d'informations.
";
$elem["jffnms/errorgid"]["default"]="";
$elem["jffnms/compresslogs"]["type"]="string";
$elem["jffnms/compresslogs"]["description"]="Days until log files are compressed:
 Please choose how many days of uncompressed JFFNMS log files should be kept.
 The recommended value is two days. Reducing this value may cause problems,
 and it doesn't make sense for it to be higher than the number of days before
 log files are deleted.
";
$elem["jffnms/compresslogs"]["descriptionde"]="Tage, bis die Protokolldateien komprimiert werden:
 Bitte wählen Sie, wie viele Tage die unkomprimierten JFFNMS-Protokolldateien aufbewahrt werden sollen. Der empfohlene Wert ist zwei Tage. Diesen Wert zu verkleinern, kann zu Problemen führen und es ist nicht sinnvoll, ihn größer zu machen als die Anzahl der Tage, bevor Protokolldateien gelöscht werden.
";
$elem["jffnms/compresslogs"]["descriptionfr"]="Nombre de jours avant la compression des fichiers journaux :
 Veuillez indiquer le nombre de jours écoulés avant la compression des fichiers journaux de JFFNMS. La valeur recommandée est de deux jours. Mettre une valeur inférieure peut provoquer des dysfonctionnements. Utiliser une valeur plus élevée que le nombre de jours avant l'effacement des fichiers journaux n'a pas de sens.
";
$elem["jffnms/compresslogs"]["default"]="2";
$elem["jffnms/deletelogs"]["type"]="string";
$elem["jffnms/deletelogs"]["description"]="Days until log files are deleted:
 Please choose how many days of log files (compressed or not) should be kept.
 The recommended value is seven days. It doesn't make sense to set this lower
 than the number of days of uncompressed files, as the cron job will compress
 the files and then delete them in the same run.
";
$elem["jffnms/deletelogs"]["descriptionde"]="Tage, nach denen die Protokolldateien gelöscht werden:
 Bitte wählen Sie, wie viele Tage die (komprimierten oder unkomprimierten) Protokolldateien aufbewahrt werden sollen. Der empfohlene Wert ist sieben Tage. Es ist nicht sinnvoll, ihn kleiner als die Anzahl der Tage für unkomprimierte Dateien zu setzen, da der Cron-Job die Dateien komprimieren und im gleichen Durchgang löschen wird.
";
$elem["jffnms/deletelogs"]["descriptionfr"]="Nombre de jours avant l'effacement des fichiers journaux :
 Veuillez indiquer le nombre de jours écoulés avant l'effacement des fichiers journaux, compressés ou non. La valeur recommandée est de sept jours. Mettre une valeur plus faible que le nombre de jours avant la compression des fichiers journaux n'a pas de sens puisque la tâche planifiée « cron » effacerait alors les fichiers juste après les avoir compressés.
";
$elem["jffnms/deletelogs"]["default"]="7";
$elem["jffnms/install-error"]["type"]="select";
$elem["jffnms/install-error"]["choices"][1]="abort";
$elem["jffnms/install-error"]["choices"][2]="retry";
$elem["jffnms/install-error"]["choicesde"][1]="abbrechen";
$elem["jffnms/install-error"]["choicesde"][2]="erneut versuchen";
$elem["jffnms/install-error"]["choicesfr"][1]="Abandonner";
$elem["jffnms/install-error"]["choicesfr"][2]="Réessayer";
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
 again, skipping all questions. If you choose \"abort\", the operation will
 fail and you will need to downgrade, reinstall, reconfigure this package,
 or otherwise manually intervene to continue using it.
";
$elem["jffnms/install-error"]["descriptionde"]="Fehler beim Installieren der Datenbank für JFFNMS:
 Beim Installieren der Datenbank scheint ein Fehler aufgetreten zu sein. Falls dies hilfreich sein sollte – dies ist der Fehler, der auftrat:
 .
 ${error}
 .
 An dieser Stelle haben Sie die Option, die Transaktion erneut zu versuchen oder abzubrechen. Falls Sie »erneut versuchen« wählen, werden Ihnen alle Konfigurationsfragen noch einmal gestellt und es wird ein neuer Versuch unternommen die Transaktion durchzuführen. »erneut versuchen (Fragen überspringen)« wird die Transaktion sofort erneut versuchen und dabei alle Fragen überspringen. Falls Sie »abbrechen« wählen, wird die Transaktion fehlschlagen und Sie werden die Version herunterstufen, dieses Paket neu installieren und konfigurieren oder auf eine andere Weise manuell eingreifen müssen, um es weiterhin zu verwenden.
";
$elem["jffnms/install-error"]["descriptionfr"]="Installation de la base de données pour jffnms :
 Une erreur s'est produite lors de l'installation de la base de données :
 .
 ${error}
 .
 Vous pouvez tenter à nouveau l'opération ou l'annuler. Si vous choisissez « Réessayer », les questions de configuration seront posées à nouveau et la création de la base de données sera tentée à nouveau. Si vous choisissez « Réessayer (sans les questions) », seule la création de la base de données sera tentée. Enfin, si vous choisissez « Abandonner », l'installation du paquet sera interrompue et vous devrez revenir à une version précédente, le désinstaller ou intervenir manuellement pour continuer à l'utiliser.
";
$elem["jffnms/install-error"]["default"]="abort";
PKG_OptionPageTail2($elem);
?>
