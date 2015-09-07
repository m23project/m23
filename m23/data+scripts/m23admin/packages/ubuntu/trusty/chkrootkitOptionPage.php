<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("chkrootkit");

$elem["chkrootkit/run_daily"]["type"]="boolean";
$elem["chkrootkit/run_daily"]["description"]="Should chkrootkit be run automatically every day?
 The chkrootkit program can be run automatically via a daily cron job. If you
 choose this option, you'll also be given the opportunity to
 specify options for the daily run.
";
$elem["chkrootkit/run_daily"]["descriptionde"]="Soll Chkrootkit täglich automatisch ausgeführt werden?
 Chkrootkit kann täglich automatisch über einen Cron-Auftrag laufen. Falls Sie diese Option wählen, dann können Sie weitere Optionen für die tägliche Ausführung angeben.
";
$elem["chkrootkit/run_daily"]["descriptionfr"]="Faut-il lancer chkrootkit automatiquement chaque jour ?
 Chkrootkit peut être lancé automatiquement par l'intermédiaire d'une tâche quotidienne de cron. Si vous choisissez cette option, vous pourrez alors préciser les réglages qui seront utilisés lors de cette exécution quotidienne.
";
$elem["chkrootkit/run_daily"]["default"]="false";
$elem["chkrootkit/run_daily_opts"]["type"]="string";
$elem["chkrootkit/run_daily_opts"]["description"]="Arguments to use with chkrootkit in the daily run:
 The following are useful arguments to pass to chkrookit:
  -r <root>: use an alternate root directory;
  -n       : do not attempt to analyze NFS-mounted files;
  -q       : run in quiet mode [highly recommended].
";
$elem["chkrootkit/run_daily_opts"]["descriptionde"]="Argumente, die beim täglichen Lauf von Chkrootkit verwandt werden sollen:
 Die folgenden Argumente können an Chkrootkit übergeben werden:
  -r <Wurzel>: verwende ein anderes Wurzelverzeichnis
  -n         : schließe via NFS eingehängte Verzeichnisse aus
  -q         : »stiller« Modus [sehr empfohlen]
";
$elem["chkrootkit/run_daily_opts"]["descriptionfr"]="Paramètres à utiliser lors de l'exécution journalière de chkrootkit :
 Les options suivantes peuvent être utilement passées à chkrootkit :
  -r <racine> : répertoire racine à utiliser ;
  -n          : pas d'analyse des fichiers sur les montages NFS ;
  -q          : exécution en mode silencieux [hautement recommandé].
";
$elem["chkrootkit/run_daily_opts"]["default"]="-q";
$elem["chkrootkit/diff_mode"]["type"]="boolean";
$elem["chkrootkit/diff_mode"]["description"]="Only report problems if they differ from previous day's problems?
 If you choose this option, chkrootkit will
 only report problems when they differ from the previous day's run.
 .
 Using this option is not recommended as it is likely to hide existing
 security problems.
";
$elem["chkrootkit/diff_mode"]["descriptionde"]="Probleme nur berichten, falls sie von Problemen des Vortages abweichen?
 Falls Sie diese Option wählen, wird Chkrootkit nur Probleme berichten, wenn sich diese von denen des Vortages unterscheiden.
 .
 Die Verwendung dieser Option wird nicht empfohlen, da sie wahrscheinlich existierende Sicherheitsprobleme versteckt.
";
$elem["chkrootkit/diff_mode"]["descriptionfr"]="Signaler seulement les problèmes différents de ceux de la veille ?
 Si vous choisissez cette option, chkrootkit ne signalera les problèmes que s'ils sont différents de ceux découverts lors de l'exécution de la veille.
 .
 Il est déconseillé de choisir cette option car elle peut facilement masquer des problèmes de sécurité existants.
";
$elem["chkrootkit/diff_mode"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
