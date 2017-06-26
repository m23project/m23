<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("adjtimex");

$elem["adjtimex/compare_rtc"]["type"]="boolean";
$elem["adjtimex/compare_rtc"]["description"]="Run adjtimexconfig when adjtimex is installed or upgraded?
 The adjtimexconfig script will use adjtimex to find values for the kernel
 variables \"tick\" and \"frequency\" that will make the system clock approximately
 agree with the hardware clock (also known as the CMOS clock).  It then
 saves these values in the configuration file /etc/default/adjtimex so the
 settings will be restored on every boot, when /etc/init.d/adjtimex runs.
 .
 The script takes 70 seconds to run, so running it for every upgrade
 may be a waste of time. Alternatively, you can run adjtimexconfig
 manually when needed, or determine the kernel variables by using other
 methods and set them manually in /etc/default/adjtimex.
";
$elem["adjtimex/compare_rtc"]["descriptionde"]="Adjtimexconfig zur Installation oder Aktualisierung von Adjtimex aufrufen?
 Das Skript »adjtimexconfig« nutzt Adjtimex, um die Werte der Kernelvariablen »tick« und »frequency« zu finden, damit die Systemuhr ungefähr mit der Rechneruhr (auch bekannt als CMOS-Uhr) übereinstimmt. Das Skript speichert diese Werte in der Konfigurationsdatei /etc/default/adjtimex, sodass die Einstellung bei jedem Systemstart wiederhergestellt wird, wenn /etc/init.d/adjtimex ausgeführt wird.
 .
 Das Skript benötigt 70 Sekunden, um durchzulaufen, es bei jeder Aktualisierung laufen zu lassen, dürfte Zeitverschwendung sein. Andererseits können Sie »adjtimexconfig« selbst bei Bedarf starten oder Sie finden die Kernelvariablen auf einem anderen Weg heraus (siehe Handbuchseite von Adjtimex) und speichern die Werte in der Datei /etc/default/adjtimex.
";
$elem["adjtimex/compare_rtc"]["descriptionfr"]="Faut-il lancer adjtimexconfig lors de l'installation ou de la mise à jour ?
 Le script adjtimexconfig utilise adjtimex afin de trouver les valeurs appropriées pour les variables du noyau concernant le battement (« tick ») et la fréquence d'horloge. Cela permettra à l'horloge du système d'être à peu près en accord avec l'horloge matérielle (parfois appelée « horloge CMOS »). Ces valeurs seront alors conservées dans le fichier de configuration /etc/default/adjtimex ce qui permettra de les restaurer à chaque démarrage quand /etc/init.d/adjtimex s'exécutera. 
 .
 La durée d'exécution du script est de 70 secondes, ce qui peut être vu comme une perte de temps au démarrage. Vous pouvez également utiliser adjtimexconfig vous-même plus tard ou déterminer les valeurs des variables du noyau d'une autre manière. Ces valeurs devront ensuite être placées dans /etc/default/adjtimex.
";
$elem["adjtimex/compare_rtc"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
