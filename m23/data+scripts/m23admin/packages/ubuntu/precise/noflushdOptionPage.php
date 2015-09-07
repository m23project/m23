<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("noflushd");

$elem["noflushd/timeout"]["type"]="string";
$elem["noflushd/timeout"]["description"]="Default idle timeout in minutes:
 When a disk has been inactive for this many minutes, noflushd tries to spin
 it down.
 .
 Instead of a single value, you can also enter a comma-separated list of
 timeouts. Whenever noflushd receives a HUP signal, it switches to the next
 timeout in the list.
";
$elem["noflushd/timeout"]["descriptionde"]="Zeit bis zum Abschalten inaktiver Festplatten (in Minuten):
 Wurde auf eine Festplatte länger als die angegebene Zahl von Minuten nicht zugegriffen, versucht noflushd, sie in den Ruhezustand zu versetzen. Diese Zeitspanne gilt als Standardwert für sämtliche Festplatten.
 .
 Statt eines einzelnen Wertes kann auch eine durch Kommata getrennte Liste von Zeitspannen angegeben werden. Wann immer noflushd ein HUP-Signal empfängt, verwendet es die nächste Zeitspanne in der Liste.
";
$elem["noflushd/timeout"]["descriptionfr"]="Délai d'inactivité par défaut, en minutes :
 Si le disque reste inactif au delà de ce délai, noflushd tentera de l'arrêter.
 .
 Plutôt qu'une valeur unique, vous pouvez indiquer une liste de valeurs, séparées par des virgules. De cette manière, à chaque fois que noflushd recevra un signal HUP, il basculera vers la valeur suivante de la liste.
";
$elem["noflushd/timeout"]["default"]="5";
$elem["noflushd/disks"]["type"]="string";
$elem["noflushd/disks"]["description"]="Disks to monitor for inactivity:
 All the disks given in this list will be spun down when inactive. Each
 disk here is represented by its device node, eg. /dev/hda for the first
 IDE disk. Multiple entries must be separated by space.
 .
 If this entry is empty, noflushd tries to auto-detect and monitor all
 disks on the system.
";
$elem["noflushd/disks"]["descriptionde"]="Zu überwachende Festplatten:
 Die Aktivität aller Festplatten in dieser Liste wird kontinuierlich überprüft, und inaktive Platten werden in den Ruhezustand versetzt. Festplatten werden hier anhand ihrer Gerätedatei eingetragen, beispielsweise /dev/hda für die erste IDE-Festplatte. Mehrere Einträge sind durch Leerzeichen zu trennen.
 .
 Falls dieser Eintrag leer bleibt, findet und überwacht noflushd selbstständig alle installierten Festplatten.
";
$elem["noflushd/disks"]["descriptionfr"]="Disques dont l'activité sera surveillée :
 Tous les disques mentionnés dans cette liste seront arrêtés en cas d'inactivité. Veuillez utiliser le nom du périphérique correspondant (p. ex. /dev/hda pour le premier disque IDE). Des valeurs multiples doivent être séparées par des espaces.
 .
 Si ce paramètre est vide, noflushd tentera une détection automatique et surveillera tous les disques du système.
";
$elem["noflushd/disks"]["default"]="";
$elem["noflushd/expert"]["type"]="boolean";
$elem["noflushd/expert"]["description"]="Use arbitrary noflushd command line parameters?
 All command line options given here will be passed verbatim to noflushd on
 startup. This option is for advanced users. Please refer to the noflushd
 man page for a list of all possible parameters.
";
$elem["noflushd/expert"]["descriptionde"]="Wollen Sie beliebige noflushd-Kommandozeilenparameter vorgeben?
 Alle Kommandozeilenoptionen, die hier angegeben sind, werden unverändert an noflushd übergeben. Diese Option ist für erfahrene Benutzer gedacht. Eine Liste aller möglichen Parameter ist im noflushd-Manual aufgeführt.
";
$elem["noflushd/expert"]["descriptionfr"]="Faut-il utiliser des paramètres de la ligne de commande arbitraires ?
 Tous les paramètres indiqués ici seront passés sans modification au programme noflushd lors de son lancement. Cette option est destinée aux utilisateurs expérimentés. Veuillez consulter la page de manuel de noflushd pour connaître la liste de tous les paramètres existants.
";
$elem["noflushd/expert"]["default"]="";
$elem["noflushd/params"]["type"]="string";
$elem["noflushd/params"]["description"]="Advanced startup options:
 A default timeout and a list of disks to monitor are enough
 for simple uses of noflushd. If you don't need more options,
 just leave this blank. Noflushd will then use a simple configuration
 scheme. 
 .
 For more control over noflushd behaviour, you may check, extend and
 modify the complete list of command line options that will be passed
 to noflushd on startup. This option is intended for advanced users.
 The most useful options include:
 .
  -v       verbose output;
  -n <to>  spindown after <to> minutes of inactivity by default;
  -t <to>  like -n, but only applies to the next disk given;
  <to>     is a comma-separated list of timeout values.
 .
 See the noflushd man page for detailed descriptions and a full list of
 options.
";
$elem["noflushd/params"]["descriptionde"]="Erweiterte Startoptionen:
 Für einfache Anwendungen reicht es aus, noflushd eine Zeitspanne und eine Liste von zu überwachenden Festplatten anzugeben. Sollten Sie damit zufrieden sein, lassen Sie den Eintrag hier leer. Damit gelangen Sie zurück zu einem einfacheren Konfigurationsschema.
 .
 Andernfalls können Sie hier die komplette Liste der Kommanozeilenoptionen einsehen, erweitern und abändern, wie sie später noflushd bei jeden Start übergeben wird. Diese Option ist für fortgeschrittene Anwender gedacht. Zu den nützlichsten Parametern zählen:
 .
  -v       mehr Informationen werden ausgegeben;
  -n <to>  Ruhezustand nach <to> minuten Inaktivität einleiten;
  -t <to>  wie -n, betrifft aber nur die nächste angegebene Festplatte;
  <to>     bezeichnet eine durch Kommata getrennte Liste von Zeitspannen.
 .
 Ausführliche Beschreibungen und eine vollständige Liste von Optionen sind in der Manualseite von noflushd enthalten.
";
$elem["noflushd/params"]["descriptionfr"]="Options avancées de démarrage :
 Le délai d'activité par défaut et la liste des disques à surveiller sont suffisants pour des utilisations simples de noflushd. Si vous n'avez pas besoin de plus d'options, veuillez laisser ce champ vide. Noflushd utilisera alors une configuration simple.
 .
 Pour plus de contrôle sur le comportement de noflushd, vous pouvez vérifier, compléter et modifier la liste complète des paramètres passés au programme lors de son démarrage. Cette option est destinées aux utilisateurs expérimentés. Les options les plus utiles sont :
 .
  -v         : affichage verbeux ;
  -n <délai> : arrêt au bout de <délai> minutes d'inactivité par défaut ;
  -t <délai> : comme -n, mais seulement pour le disque mentionné
               ensuite ;
  <délai>    : liste de délais d'inactivité, séparés par des virgules.
 .
 Veuillez consulter la page de manuel de noflushd pour les descriptions détaillées et la liste complète des options.
";
$elem["noflushd/params"]["default"]="";
PKG_OptionPageTail2($elem);
?>
