<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tvtime");

$elem["tvtime/norm"]["type"]="select";
$elem["tvtime/norm"]["choices"][1]="NTSC";
$elem["tvtime/norm"]["choices"][2]="PAL";
$elem["tvtime/norm"]["choices"][3]="SECAM";
$elem["tvtime/norm"]["choices"][4]="PAL-Nc";
$elem["tvtime/norm"]["choices"][5]="PAL-M";
$elem["tvtime/norm"]["choices"][6]="PAL-N";
$elem["tvtime/norm"]["choices"][7]="NTSC-JP";
$elem["tvtime/norm"]["description"]="TV standard:
 Please choose the TV standard to use. NTSC is used in North America,
 much of South America, and Japan; SECAM in France, the former USSR,
 and parts of Africa and the Middle East; and PAL elsewhere.
";
$elem["tvtime/norm"]["descriptionde"]="TV-Standard:
 Bitte wählen Sie den TV-Standard aus, der verwendet werden soll. NTSC kommt in Nordamerika, Teilen von Südamerika und Japan zu Einsatz; SECAM in Frankreich, in der ehemaligen UdSSR und teilweise in Afrika und im Mittleren Osten und PAL überall sonst.
";
$elem["tvtime/norm"]["descriptionfr"]="Norme TV :
 Veuillez choisir la norme TV à utiliser. La norme NTSC est utilisée en Amérique du Nord, en Amérique du Sud et au Japon ; la norme SECAM est utilisée en France, en Russie ainsi que dans certains pays d'Afrique et du Moyen-Orient. La norme PAL est utilisée dans les autres cas.
";
$elem["tvtime/norm"]["default"]="";
$elem["tvtime/frequencies-ntsc"]["type"]="select";
$elem["tvtime/frequencies-ntsc"]["choices"][1]="Cable";
$elem["tvtime/frequencies-ntsc"]["choices"][2]="Broadcast";
$elem["tvtime/frequencies-ntsc"]["choicesde"][1]="Kabel";
$elem["tvtime/frequencies-ntsc"]["choicesde"][2]="Antenne";
$elem["tvtime/frequencies-ntsc"]["choicesfr"][1]="Câble";
$elem["tvtime/frequencies-ntsc"]["choicesfr"][2]="Hertzien";
$elem["tvtime/frequencies-ntsc"]["description"]="Default frequency table:
 Please choose the frequency table to use. It specifies which frequencies correspond to the familiar
 channel numbers. You should select \"Broadcast\" if you use an antenna for over-the-air
 signals.
";
$elem["tvtime/frequencies-ntsc"]["descriptionde"]="Standard-Frequenztabelle:
 Die Frequenztabelle gibt die Frequenzen, die zu bekannten Kanalnummern gehören, an. Wählen Sie »Antenne«, falls Sie eine Antenne für Rundfunksignale einsetzen.
";
$elem["tvtime/frequencies-ntsc"]["descriptionfr"]="Table de fréquence par défaut :
 Veuillez choisir le tableau des fréquences à utiliser. Il indique la correspondance entre les fréquences et les numéros des canaux habituels. Choisissez « Hertzien » si vous utilisez une antenne pour recevoir la télévision.
";
$elem["tvtime/frequencies-ntsc"]["default"]="";
$elem["tvtime/frequencies-jp"]["type"]="select";
$elem["tvtime/frequencies-jp"]["choices"][1]="Cable";
$elem["tvtime/frequencies-jp"]["choicesde"][1]="Kabel";
$elem["tvtime/frequencies-jp"]["choicesfr"][1]="Câble";
$elem["tvtime/frequencies-jp"]["description"]="Default frequency table:
 Please choose the frequency table to use. It specifies which
 frequencies correspond to the familiar channel numbers.
 .
 You should select \"Broadcast\" if you use an antenna for over-the-air
 signals.
";
$elem["tvtime/frequencies-jp"]["descriptionde"]="Standard-Frequenztabelle:
 Bitte wählen Sie die Frequenztabelle aus, die benutzt werden soll. Sie gibt an, welche Frequenzen zu bekannten Kanalnummern gehören.
 .
 Sie sollten »Antenne« wählen, falls Sie eine Antenne für Rundfunksignale einsetzen.
";
$elem["tvtime/frequencies-jp"]["descriptionfr"]="Table de fréquence par défaut :
 Veuillez choisir le tableau des fréquences à utiliser. Il indique la correspondance entre les fréquences et les numéros des canaux habituels.
 .
 Vous devriez choisir « Hertzien » si vous utilisez une antenne pour recevoir la télévision.
";
$elem["tvtime/frequencies-jp"]["default"]="";
$elem["tvtime/frequencies-pal"]["type"]="select";
$elem["tvtime/frequencies-pal"]["choices"][1]="Europe";
$elem["tvtime/frequencies-pal"]["choices"][2]="France";
$elem["tvtime/frequencies-pal"]["choices"][3]="Russia";
$elem["tvtime/frequencies-pal"]["choices"][4]="Australia";
$elem["tvtime/frequencies-pal"]["choices"][5]="New Zealand";
$elem["tvtime/frequencies-pal"]["choices"][6]="China Broadcast";
$elem["tvtime/frequencies-pal"]["choices"][7]="Australia Optus";
$elem["tvtime/frequencies-pal"]["choicesde"][1]="Europa";
$elem["tvtime/frequencies-pal"]["choicesde"][2]="Frankreich";
$elem["tvtime/frequencies-pal"]["choicesde"][3]="Russland";
$elem["tvtime/frequencies-pal"]["choicesde"][4]="Australien";
$elem["tvtime/frequencies-pal"]["choicesde"][5]="Neuseeland";
$elem["tvtime/frequencies-pal"]["choicesde"][6]="China Broadcast";
$elem["tvtime/frequencies-pal"]["choicesde"][7]="Optus\";
$elem["tvtime/frequencies-pal"]["choicesde"][8]="Australien";
$elem["tvtime/frequencies-pal"]["choicesfr"][1]="Europe";
$elem["tvtime/frequencies-pal"]["choicesfr"][2]="France";
$elem["tvtime/frequencies-pal"]["choicesfr"][3]="Russie";
$elem["tvtime/frequencies-pal"]["choicesfr"][4]="Australie";
$elem["tvtime/frequencies-pal"]["choicesfr"][5]="Nouvelle Zélande";
$elem["tvtime/frequencies-pal"]["choicesfr"][6]="Câble (Chine)";
$elem["tvtime/frequencies-pal"]["choicesfr"][7]="Australie Optus";
$elem["tvtime/frequencies-pal"]["description"]="Default frequency table:
 Please choose the frequency table to use. It specifies which
 frequencies correspond to the familiar channel numbers.
 .
 If you are a user of a cable company that does not use standard
 frequencies, you should select \"Custom\" and run
 the tvtime-scanner application before using tvtime.
";
$elem["tvtime/frequencies-pal"]["descriptionde"]="Standard-Frequenztabelle:
 Bitte wählen Sie die Frequenztabelle aus, die benutzt werden soll. Sie gibt an, welche Frequenzen zu bekannten Kanalnummern gehören.
 .
 Falls Sie ein Abonnent einer Kabelgesellschaft sind, die nicht-Standard-Frequenzen verwendet, wie beispielsweise Casema, UPC oder Mixtics, wählen Sie bitte »Angepasst« aus und verwenden Sie die »tvtime-scanner«-Anwendung vor der Benutzung von tvtime.
";
$elem["tvtime/frequencies-pal"]["descriptionfr"]="Table de fréquence par défaut :
 Veuillez choisir le tableau des fréquences à utiliser. Il indique la correspondance entre les fréquences et les numéros des canaux habituels.
 .
 Si vous êtes un utilisateur d'une compagnie de câble n'utilisant pas les fréquences standards, comme Casema, UPS ou Mixtics, veuillez choisir « Personnalisé » et exécuter l'application tvtime-scanner avant d'utiliser tvtime.
";
$elem["tvtime/frequencies-pal"]["default"]="";
$elem["tvtime/v4ldevice"]["type"]="string";
$elem["tvtime/v4ldevice"]["description"]="Default television capture device:
 Please choose the video4linux device which corresponds to your capture
 card.
";
$elem["tvtime/v4ldevice"]["descriptionde"]="Standardgerät für den Fernsehempfang:
 Bitte wählen Sie das video4linux-Gerät, das Ihrer TV-Karte entspricht.
";
$elem["tvtime/v4ldevice"]["descriptionfr"]="Périphérique de capture TV par défaut :
 Veuillez choisir le périphérique video4linux correspondant à votre carte d'acquisition.
";
$elem["tvtime/v4ldevice"]["default"]="/dev/video0";
$elem["tvtime/vbidevice"]["type"]="string";
$elem["tvtime/vbidevice"]["description"]="Device to use for VBI decoding:
 Please choose the device that will be used in NTSC areas for decoding closed captions and XDS
 channel information.
";
$elem["tvtime/vbidevice"]["descriptionde"]="Gerät für VBI-Dekodierung:
 Bitte wählen Sie das Gerät, welches in NTSC-Gegenden für die Dekodierung von »Closed Caption« und XDS-Kanalinformationen verwendet werden soll.
";
$elem["tvtime/vbidevice"]["descriptionfr"]="Périphérique à utiliser pour le décodage VBI :
 Veuillez choisir le périphérique qui sera utilisé uniquement dans les zones NTSC pour le décodage des acquisitions fermées et les informations XDS des canaux.
";
$elem["tvtime/vbidevice"]["default"]="/dev/vbi0";
$elem["tvtime/setuid"]["type"]="boolean";
$elem["tvtime/setuid"]["description"]="Allow tvtime to run with root privileges?
 Please choose whether tvtime should be \"setuid root\", therefore getting
 root privileges when running.
 .
 This allows tvtime to run at a high priority to ensure smooth video and
 should be used for high quality video output even during high CPU load.
";
$elem["tvtime/setuid"]["descriptionde"]="Soll tvtime mit »root«-Rechten ausgeführt werden?
 Bitte wählen Sie, ob tvtime das »setuid root«-Dateirecht bekommen soll, um »root«-Rechte zu bekommen, wenn es ausgeführt wird.
 .
 Dies ermöglicht es, tvtime mit hoher Priorität laufen zu lassen, um ein ruckelfreies Bild sicherzustellen und sollte selbst bei hoher CPU-Last für eine hochqualitative Videoausgabe sorgen.
";
$elem["tvtime/setuid"]["descriptionfr"]="Autoriser tvtime à être lancé avec les privilèges root ?
 Veuillez choisir si tvtime doit posséder le bit « setuid root » et donc être lancé avec les droits du superutilisateur.
 .
 Ceci permet de faire tourner tvtime avec une priorité élevée pour assurer la fluidité de la vidéo et devrait être utilisé pour produire des sorties vidéo de haute qualité, même lors des fortes charges du processeur.
";
$elem["tvtime/setuid"]["default"]="false";
$elem["tvtime/processpriority"]["type"]="string";
$elem["tvtime/processpriority"]["description"]="Process priority for the tvtime binary:
 This setting controls the priority of the tvtime process relative to other
 processes on the system.
 .
 Allowed values are integers between -19 and 19. Lower
 values indicate higher priority, and a value of 0 would give tvtime the
 same priority as a normal process.
";
$elem["tvtime/processpriority"]["descriptionde"]="Prozess-Priorität für tvtime:
 Diese Einstellung regelt die Priorität des tvtime-Prozesses relativ zu anderen Prozessen im System. 
 .
 Erlaubte Werte sind Ganzzahlen zwischen -19 und 19. Niedrigere Werte bedeuten eine höhere Priorität, und ein Wert von 0 würde tvtime die gleiche Priorität wie normale Prozesse geben.
";
$elem["tvtime/processpriority"]["descriptionfr"]="Priorité du processus pour l'exécutable tvtime :
 Ce paramètre contrôle la priorité du processus tvtime par rapport aux autres processus exécutés sur le système.
 .
 L'intervalle admis s'étend de -19 jusqu'à 19. Des valeurs négatives traduisent une priorité élevée tandis qu'une valeur 0 donne à tvtime la même priorité que les processus normaux.
";
$elem["tvtime/processpriority"]["default"]="-10";
PKG_OptionPageTail2($elem);
?>
