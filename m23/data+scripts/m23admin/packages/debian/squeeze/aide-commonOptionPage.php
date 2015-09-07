<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("aide-common");

$elem["aide/aideinit"]["type"]="boolean";
$elem["aide/aideinit"]["description"]="Initialize AIDE database?
 Before AIDE can be used, you will have to initialize a database. You
 can immediately do this here, or run the '/usr/sbin/aideinit' script
 from a shell later.
";
$elem["aide/aideinit"]["descriptionde"]="Datenbank für AIDE anlegen?
 Bevor Sie AIDE benutzen können, müssen Sie eine Datenbank einrichten. Sie können das gleich jetzt erledigen oder später das Skript '/usr/sbin/aideinit' in der Kommandozeile aufrufen.
";
$elem["aide/aideinit"]["descriptionfr"]="Faut-il créer la base de données d'AIDE ?
 Avant de pouvoir utiliser AIDE, vous devez créer une base de données. Vous pouvez le faire dès maintenant ou exécuter le script « /usr/sbin/aideinit » par la suite.
";
$elem["aide/aideinit"]["default"]="false";
$elem["aide/newlibdir"]["type"]="boolean";
$elem["aide/newlibdir"]["description"]="Move AIDE data files from old directory to new?
 AIDE now stores its databases in /var/lib/aide by default. It appears that
 you have an older version installed which uses /usr/lib/aide. You can
 have the data files moved automatically.
";
$elem["aide/newlibdir"]["descriptionde"]="AIDE-Dateien aus dem alten ins neue Verzeichnis verschieben?
 AIDE legt die Datenbank jetzt standardmäßig im Verzeichnis /var/lib/aide ab. Es scheint bereits eine ältere Version installiert zu sein, die das Verzeichnis /usr/lib/aide verwendet. Sie können die Dateien automatisch verschieben lassen.
";
$elem["aide/newlibdir"]["descriptionfr"]="Faut-il déplacer les fichiers de données depuis l'ancien répertoire ?
 AIDE place désormais ses bases de données dans « /var/lib/aide » par défaut. La version plus ancienne que vous utilisiez les plaçait dans « /usr/lib/aide ». Choisissez cette option pour que les données soient automatiquement déplacées.
";
$elem["aide/newlibdir"]["default"]="true";
$elem["aideinit/overwritenew"]["type"]="boolean";
$elem["aideinit/overwritenew"]["description"]="Overwrite existing /var/lib/aide/aide.db.new?
 You have already a newly generated AIDE database in
 /var/lib/aide/aide.db.new. If you choose this option, the existing file
 will be be overwritten by the new data obtained from the current state
 of your file system.
";
$elem["aideinit/overwritenew"]["descriptionde"]="Vorhandene Datei /var/lib/aide/aide.db.new überschreiben?
 Es gibt bereits eine neu erstellte AIDE-Datenbank in der Datei /var/lib/aide/aide.db.new. Wenn Sie dieser Auswahl zustimmen, wird die bestehende Datei mit den Daten überschrieben, die vom aktuellen Zustand Ihres Systems ermittelt wurden.
";
$elem["aideinit/overwritenew"]["descriptionfr"]="Faut-il écraser « /var/lib/aide/aide.db.new » ?
 Vous avez déjà une nouvelle base de données « /var/lib/aide/aide.db.new ». Si vous confirmez, ce fichier sera écrasé par les nouvelles données obtenues par l'état actuel de votre système de fichiers.
";
$elem["aideinit/overwritenew"]["default"]="true";
$elem["aideinit/copynew"]["type"]="boolean";
$elem["aideinit/copynew"]["description"]="Copy aide.db.new to aide.db?
 It is advisable for you to first look over /var/lib/aide/aide.db.new
 file before replacing the existing db. You can have the package
 replace the database anyway here.
 .
 If you do not choose this option, you will need to copy the file
 /var/lib/aide/aide.db.new to /var/lib/aide/aide.db before AIDE can use
 it.
";
$elem["aideinit/copynew"]["descriptionde"]="Soll aide.db.new nach aide.db kopiert werden?
 Sie sollten sich die Datei /var/lib/aide/aide.db.new erst einmal ansehen, bevor Sie die vorhandene Datenbank überschreiben. Sie können die Datenbank aber trotzdem jetzt ersetzen.
 .
 Wenn Sie diese Auswahl ablehnen, müssen Sie die Datei /var/lib/aide/aide.db.new selbst nach /var/lib/aide/aide.db kopieren, bevor AIDE sie nutzen kann.
";
$elem["aideinit/copynew"]["descriptionfr"]="Faut-il copier « aide.db.new » vers « aide.db » ?
 Vous devriez d'abord vérifier la nouvelle base de données « /var/lib/aide/aide.db.new » avant de la remplacer. Veuillez confirmer si vous souhaitez la remplacer maintenant.
 .
 Si vous ne confirmez pas, vous devrez copier le fichier « /var/lib/aide/aide.db.new » vers « /var/lib/aide/aide.db » avant de pouvoir l'utiliser.
";
$elem["aideinit/copynew"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
