<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("adjtimex");

$elem["adjtimex/run_daemon"]["type"]="boolean";
$elem["adjtimex/run_daemon"]["description"]="Should adjtimex be run at installation and at every startup?
 adjtimex can run at system startup to set the kernel time parameters to
 the values in /etc/default/adjtimex. Don't accept if you just want to
 use adjtimex to inspect the current parameters.
";
$elem["adjtimex/run_daemon"]["descriptionde"]="Soll Adjtimex nach der Installation und bei jedem Hochfahren gestartet werden?
 Adjtimex kann beim Hochfahren des Systems ablaufen, um die Zeitparameter im Kernel auf die Werte in /etc/defaults/adjtimex zu setzen. Stimmen Sie dem nicht zu, wenn Sie mit Adjtimex nur die aktuellen Parameter ermitteln wollen.
";
$elem["adjtimex/run_daemon"]["descriptionfr"]="Faut-il lancer adjtimex lors de l'installation et à chaque démarrage du système ?
 Adjtimex peut être lancé au démarrage du système afin de régler les paramètres d'horloge du noyau en fonction des valeurs contenues dans /etc/default/adjtimex. Ne choisissez pas cette option si vous souhaitez simplement vous servir d'adjtimex pour consulter les paramètres actuels.
";
$elem["adjtimex/run_daemon"]["default"]="true";
$elem["adjtimex/compare_rtc"]["type"]="boolean";
$elem["adjtimex/compare_rtc"]["description"]="Should adjtimexconfig be run at installation time?
 The adjtimexconfig script will use adjtimex to find values for the kernel
 variables tick and frequency that will make the system clock approximately
 agree with the hardware clock (also known as the CMOS clock).  It then
 saves these values in the configuration file /etc/default/adjtimex so the
 settings will be restored on every boot, when /etc/init.d/adjtimex runs.
 .
 The script takes 70 sec to run. Alternatively, you can run adjtimexconfig
 yourself at a later time, or determine the kernel variables one of several
 other ways (see the adjtimex man page) and install them in
 /etc/default/adjtimex.
";
$elem["adjtimex/compare_rtc"]["descriptionde"]="Soll »adjtimexconfig« zur Installation aufgerufen werden?
 Das Skript »adjtimexconfig« nutzt Adjtimex, um die Werte der Kernelvariablen »tick« und »frequency« zu finden, damit die Systemuhr ungefähr mit der Rechneruhr (auch bekannt als CMOS-Uhr) übereinstimmt. Das Skript speichert diese Werte in der Konfigurationsdatei /etc/default/adjtimex, sodass die Einstellung bei jedem Systemstart wiederhergestellt wird, wenn /etc/init.d/adjtimex startet.
 .
 Das Skript benötigt 70 Sekunden, um durchzulaufen. Andererseits können Sie »adjtimexconfig« später selbst starten oder finden die Kernelvariablen auf einem anderen Weg (siehe Handbuchseite von Adjtimex) und speichern die Werte in der Datei /etc/default/adjtimex.
";
$elem["adjtimex/compare_rtc"]["descriptionfr"]="Faut-il lancer adjtimexconfig lors de l'installation ?
 Le script adjtimexconfig utilise adjtimex afin de trouver les valeurs appropriées pour les variables du noyau concernant le battement (« tick ») et la fréquence d'horloge. Cela permettra à l'horloge du système d'être à peu près en accord avec l'horloge matérielle (parfois appelée « horloge CMOS »). Ces valeurs seront alors conservées dans le fichier de configuration /etc/default/adjtimex ce qui permettra de les restaurer à chaque démarrage quand /etc/init.d/adjtimex s'exécutera. 
 .
 La durée d'exécution du script est de 70 secondes. Vous pouvez également utiliser adjtimexconfig vous-même plus tard ou déterminer les valeurs des variables du noyau d'une autre manière (il en existe plusieurs : voir la page de manuel d'adjtimex). Ces valeurs devront ensuite être placées dans /etc/default/adjtimex.
";
$elem["adjtimex/compare_rtc"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
