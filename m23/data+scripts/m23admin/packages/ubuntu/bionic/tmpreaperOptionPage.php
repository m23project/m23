<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tmpreaper");

$elem["tmpreaper/confignowexists"]["type"]="note";
$elem["tmpreaper/confignowexists"]["description"]="tmpreaper can now be adjusted through /etc/tmpreaper.conf
 Any local preferences for the daily tmpreaper run should now be configured
 through /etc/tmpreaper.conf (explanation is in that file).
 .
 Previously, you had to modify /etc/cron.daily/tmpreaper which could be a
 pain because that got updated regularly, and you'd have to reimplement
 your modifications each time (or miss out on the new changes). Now you can
 adjust the file age, extra --protect patterns, and which directories to reap
 in /etc/tmpreaper.conf.
 .
 For this to work, however, you have to install the new
 /etc/cron.daily/tmpreaper file now.
";
$elem["tmpreaper/confignowexists"]["descriptionde"]="tmpreaper kann jetzt über /etc/tmpreaper.conf angepasst werden
 Alle Einstellungen für den täglichen tmpreaper-Lauf können jetzt in der Datei /etc/tmpreaper.conf vorgenommen werden (Erklärungen zu den Optionen finden Sie in dieser Datei).
 .
 Bisher musste die Datei /etc/cron.daily/tmpreaper angepasst werden, die allerdings regelmäßig aktualisiert wurde. Dadurch mussten Sie jeweils Ihre Änderungen erneut einpflegen (oder auf die neuen Änderungen verzichten). Jetzt können Sie das Dateialter, zusätzliche »--protect«-Begriffe und die zu bearbeitenden Verzeichnisse in /etc/tmpreaper.conf angeben.
 .
 Damit dies funktioniert, müssen Sie jetzt allerdings die neue Datei /etc/cron.daily/tmpreaper installieren.
";
$elem["tmpreaper/confignowexists"]["descriptionfr"]="Tmpreaper peut maintenant être configuré via /etc/tmpreaper.conf
 Toutes les préférences locales pour l'exécution quotidienne de tmpreaper doivent maintenant être configurées via /etc/tmpreaper.conf (ce fichier contient des explications).
 .
 Auparavant, vous deviez modifier /etc/cron.daily/tmpreaper ce qui était pénible car ce fichier est régulièrement mis à jour, vous obligeant à renouveler vos modifications (ou à ne pas prendre en compte les nouvelles évolutions). Maintenant, vous pouvez définir l'âge des fichiers, les modèles (« patterns ») supplémentaires pour « --protect », ainsi que les répertoires à analyser grâce au fichier /etc/tmpreaper.conf.
 .
 Pour réaliser cette tâche, vous devez installer dès à présent le nouveau fichier /etc/cron.daily/tmpreaper.
";
$elem["tmpreaper/confignowexists"]["default"]="";
$elem["tmpreaper/TMPREAPER_TIME"]["type"]="note";
$elem["tmpreaper/TMPREAPER_TIME"]["description"]="default value for TMPREAPER_TIME now set via /etc/default/rcS
 Before, you could set the maximum age for files before they were removed
 in /etc/tmpreaper.conf; however, there is another place where something
 similar is set, namely the TMPTIME value in /etc/default/rcS which is used
 during booting to clean out /tmp.
 .
 To avoid having to enter this value in two places, the new
 /etc/tmpreaper.conf script now obtains the TMPTIME value from
 /etc/default/rcS, and uses that (if it is greater than zero, that is).
 .
 You apparently have changed the default value in /etc/tmpreaper.conf; you
 may want to check /etc/default/rcS to see if the value there is
 acceptable, if you want the upgrade procedure to replace your
 /etc/tmpreaper.conf with the new version.
";
$elem["tmpreaper/TMPREAPER_TIME"]["descriptionde"]="Der Standardwert von TMPREAPER_TIME wird nun über /etc/default/rcS gesetzt
 Früher konnte das Höchstalter für Dateien bevor sie gelöscht wurden in /etc/tmpreaper.conf angegeben werden; aber es gibt eine andere Art, dies anzugeben, nämlich der TMPTIME-Wert in /etc/default/rcS, welcher während des Startvorgangs benutzt wird, um /tmp zu säubern.
 .
 Um zu verhindern, dass dieser Wert in zwei Dateien eingestellt wird, holt sich das neue /etc/tmpreaper.conf-Skript den Wert von TMPTIME aus /etc/default/rcS und nutzt ihn, falls er größer als 0 ist.
 .
 Sie haben anscheinend den Standardwert in /etc/tmpreaper.conf geändert; Sie sollten überprüfen, ob der Wert in /etc/default/rcS in Ordnung ist, falls Sie wollen, das die Upgrade-Prozedur Ihre /etc/tmpreaper.conf durch die neue Version ersetzen soll.
";
$elem["tmpreaper/TMPREAPER_TIME"]["descriptionfr"]="La valeur par défaut pour TMPREAPER_TIME est maintenant définie dans /etc/default/rcS
 Auparavant, vous pouviez définir dans /etc/tmpreaper.conf, l'âge minimum que devaient avoir les fichiers avant d'être supprimés. Cependant, un réglage similaire est défini par ailleurs grâce à la variable TMPTIME dans /etc/default/rcS, qui est utilisée pour nettoyer /tmp lors du démarrage du système.
 .
 Pour éviter de définir cette valeur à deux reprises, le nouveau script /etc/tmpreaper.conf lit et utilise dorénavant la variable TMPTIME située dans /etc/default/rcS (si elle est supérieure à zéro).
 .
 Vous avez apparemment changé la valeur par défaut dans /etc/tmpreaper.conf ; vous voudrez sans doute vérifier que la valeur située dans /etc/default/rcS est satisfaisante afin que la mise à jour remplace votre /etc/tmpreaper.conf par la nouvelle version.
";
$elem["tmpreaper/TMPREAPER_TIME"]["default"]="";
$elem["tmpreaper/readsecurity"]["type"]="note";
$elem["tmpreaper/readsecurity"]["description"]="Please first read README.security
 Before running tmpreaper for the first time, please read the file
 /usr/share/doc/tmpreaper/README.security.gz, e.g. with zless. Therein is
 contained a discussion of possible ways that usage of tmpreaper may be
 insecure.
 .
 If after that you still want tmpreaper to run, please edit
 /etc/tmpreaper.conf and remove the line:
 .
  echo \"Please read /usr/share/doc/tmpreaper/README.security.gz first.\";
  exit 0
";
$elem["tmpreaper/readsecurity"]["descriptionde"]="Please first read README.security
 Bevor Sie tmpreaper zum ersten Mal laufen lassen, lesen Sie bitte die Datei /usr/share/doc/tmpreaper/README.security.gz z.B. mit zless. Dort finden Sie eine Diskussion, inwiefern die Benutzung von tmpreaper unsicher sein könnte.
 .
 Falls Sie immer noch tmpreaper laufen lassen wollen, editieren Sie bitte /etc/tmpreaper.conf und löschen Sie die Zeile:
 .
  echo \"Please read /usr/share/doc/tmpreaper/README.security.gz first.\";
  exit 0
";
$elem["tmpreaper/readsecurity"]["descriptionfr"]="Veuillez d'abord lire README.security
 Avant de lancer tmpreaper pour la première fois, veuillez consulter le fichier /usr/share/doc/tmpreaper/README.security.gz, avec zless par exemple. Il contient une discussion sur les différents cas possibles dans lesquels l'usage de tmpreaper peut présenter des risques.
 .
 Après cela, si vous souhaitez toujours lancer tmpreaper, veuillez modifier /etc/tmpreaper.conf et y supprimer la ligne :
 .
  echo \"Please read /usr/share/doc/tmpreaper/README.security.gz first.\";
  exit 0
";
$elem["tmpreaper/readsecurity"]["default"]="";
$elem["tmpreaper/readsecurity_upgrading"]["type"]="note";
$elem["tmpreaper/readsecurity_upgrading"]["description"]="Please first read README.security
 Before running tmpreaper after this upgrade, please read the file
 /usr/share/doc/tmpreaper/README.security.gz e.g. with zless. Therein is
 contained a discussion of possible ways that usage of tmpreaper may be
 insecure.
 .
 If during the upgrade the /etc/tmpreaper.conf file is replaced, and you
 still want tmpreaper to run, please edit /etc/tmpreaper.conf and remove
 the line:
 .
  echo \"Please read /usr/share/doc/tmpreaper/README.security.gz first.\";
  exit 0
";
$elem["tmpreaper/readsecurity_upgrading"]["descriptionde"]="Please first read README.security
 Bevor Sie tmpreaper nach diesem Upgrade starten, lesen Sie bitte die Datei /usr/share/doc/tmpreaper/README.security.gz z.B. mit zless. Dort finden Sie eine Diskussion, inwiefern die Benutzung tmpreaper unsicher sein könnte.
 .
 Falls während des Upgrades die Datei /etc/tmpreaper.conf überschrieben wird und Sie tmpreaper noch benutzen wollen, editieren Sie bitte /etc/tmpreaper.conf und löschen Sie die Zeile:
 .
  echo \"Please read /usr/share/doc/tmpreaper/README.security.gz first.\";
  exit 0
";
$elem["tmpreaper/readsecurity_upgrading"]["descriptionfr"]="Veuillez d'abord lire README.security
 Avant de lancer tmpreaper après cette mise à jour, veuillez lire le fichier /usr/share/doc/tmpreaper/README.security.gz, avec zless par exemple. Il contient une discussion sur les différents cas possibles dans lesquels l'usage de tmpreaper peut présenter des risques.
 .
 Si, pendant la mise à jour, le fichier /etc/tmpreaper.conf est remplacé et que vous souhaitez toujours lancer tmpreaper, veuillez modifier /etc/tmpreaper.conf et y supprimer la ligne :
 .
  echo \"Please read /usr/share/doc/tmpreaper/README.security.gz first.\";
  exit 0
";
$elem["tmpreaper/readsecurity_upgrading"]["default"]="";
PKG_OptionPageTail2($elem);
?>
