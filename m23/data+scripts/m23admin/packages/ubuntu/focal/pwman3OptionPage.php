<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pwman3");

$elem["pwman/old_db_format"]["type"]="select";
$elem["pwman/old_db_format"]["choices"][1]="abort";
$elem["pwman/old_db_format"]["description"]="Old database format detected
 It seems that you are trying to upgrade Pwman3 form version 0.5.x or older.
 The database is not compatible with the new database format. Before
 upgrading you need to export your database to a CSV with:
 .
   pwman> export
 .
 That will create a CSV file located in $HOME/pwman-export.csv. Once exported,
 you will have to rename your old database to keep a backup of it:
 .
   mv $HOME/pwman/pwman.db $HOME/pwman/pwman-old.db
 .
 Then you can restart the package upgrade.
 Once the upgrade will be finished, you will be able to import the CSV file
 previously generated:
 .
   pwman3 -i $HOME/pwman-export.csv \;
 .
 Don't forget to remove the CSV file when the import succeeded (the passwords
 are stored in clear text in this file).
";
$elem["pwman/old_db_format"]["descriptionde"]="Altes Datenbankformat erkannt
 Es scheint, dass Sie ein Upgrade von Pwman3 Version 0.5.x oder älter versuchen. Die Datenbank ist nicht mit dem neuen Datenbankformat kompatibel. Vor dem Upgrade müssen Sie Ihre Datenbank in CSV konvertieren:
 .
   pwman> export
 .
 Damit wird eine unter $HOME/pwman-export.csv befindliche CSV-Datei erstellt. Nach dem Export müssen Sie Ihre Datenbank umbenennen, um eine Sicherungskopie zu behalten:
 .
   mv $HOME/pwman/pwman.db $HOME/pwman/pwman-alt.db
 .
 Dann können Sie das Paket-Upgrade neu starten. Sobald das Upgrade durchgelaufen ist, können Sie die vorher erstellte CSV-Datei importieren:
 .
   pwman3 -i $HOME/pwman-export.csv \;
 .
 Vergessen Sie nicht, die CSV-Datei zu entfernen, wenn der Import erfolgreich war (die Passwörter sind in dieser Datei im Klartext gespeichert).
";
$elem["pwman/old_db_format"]["descriptionfr"]="Un ancien format de base de données a été détecté
 Il semble que vous essayez de mettre à niveau Pwman3 à partir de la version 0.5.x ou d'une version antérieure. La base de données n'est pas compatible avec le nouveau format de base de données. Avant la mise à niveau, vous devez exporter votre base de données dans un fichier CSV avec la commande :
 .
   pwman> export
 .
 Cette commande va créer un fichier CSV placé dans $HOME/pwman-export.csv. Une fois l'exportation effectuée, vous devez renommer l'ancienne base de données pour en conserver une sauvegarde.
 .
   mv $HOME/pwman/pwman.db $HOME/pwman/pwman-old.db
 .
 Vous pouvez ensuite redémarrer la mise à niveau du paquet. Une fois la mise à niveau achevée, vous pourrez importer le fichier CSV précédemment créé.
 .
   pwman3 -i $HOME/pwman-export.csv \;
 .
 N'oubliez pas de supprimer le fichier CSV si l'importation a réussi (les mots de passe sont stockés en clair dans ce fichier).
";
$elem["pwman/old_db_format"]["default"]="abort";
PKG_OptionPageTail2($elem);
?>
