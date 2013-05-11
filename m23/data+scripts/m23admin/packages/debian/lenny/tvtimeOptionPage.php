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
$elem["tvtime/norm"]["choicesde"][1]="NTSC";
$elem["tvtime/norm"]["choicesde"][2]="PAL";
$elem["tvtime/norm"]["choicesde"][3]="SECAM";
$elem["tvtime/norm"]["choicesde"][4]="PAL-Nc";
$elem["tvtime/norm"]["choicesde"][5]="PAL-M";
$elem["tvtime/norm"]["choicesde"][6]="PAL-N";
$elem["tvtime/norm"]["choicesde"][7]="NTSC-JP";
$elem["tvtime/norm"]["choicesfr"][1]="NTSC";
$elem["tvtime/norm"]["choicesfr"][2]="PAL";
$elem["tvtime/norm"]["choicesfr"][3]="SECAM";
$elem["tvtime/norm"]["choicesfr"][4]="PAL-Nc";
$elem["tvtime/norm"]["choicesfr"][5]="PAL-M";
$elem["tvtime/norm"]["choicesfr"][6]="PAL-N";
$elem["tvtime/norm"]["choicesfr"][7]="NTSC-JP";
$elem["tvtime/norm"]["description"]="Select the default television standard for your location
 North American users should select NTSC.  Most areas in the world use PAL.
";
$elem["tvtime/norm"]["descriptionde"]="Wählen Sie den Fehrnseh-Standard für Ihren Ort aus
 Benutzer in Nordamerika sollten NTSC auswählen. Die meisten Gegenden in der Welt verwenden PAL.
";
$elem["tvtime/norm"]["descriptionfr"]="Standard de télévision en vigueur dans votre région
 Les utilisateurs français devraient choisir SECAM, les nord-américains NTSC. La plupart des autres zones utilisent le standard PAL.
";
$elem["tvtime/norm"]["default"]="";
$elem["tvtime/frequencies-ntsc"]["type"]="select";
$elem["tvtime/frequencies-ntsc"]["choices"][1]="Cable";
$elem["tvtime/frequencies-ntsc"]["choices"][2]="Broadcast";
$elem["tvtime/frequencies-ntsc"]["choicesde"][1]="Kabel";
$elem["tvtime/frequencies-ntsc"]["choicesde"][2]="Antenne";
$elem["tvtime/frequencies-ntsc"]["choicesfr"][1]="Câble";
$elem["tvtime/frequencies-ntsc"]["choicesfr"][2]="Hertzien";
$elem["tvtime/frequencies-ntsc"]["description"]="Select the default frequency table
 The frequency table specifies which frequencies correspond to the familiar
 channel numbers.  Select broadcast if you use an antenna for over-the-air
 signals.
";
$elem["tvtime/frequencies-ntsc"]["descriptionde"]="Wählen Sie die Standard-Frequenztabelle aus
 Die Frequenztabelle gibt die Frequenzen, die zu bekannten Kanalnummern gehören, an. Wählen Sie »Antenne« falls Sie eine Antenne für terrestische Signale einsetzen.
";
$elem["tvtime/frequencies-ntsc"]["descriptionfr"]="Table de fréquence par défaut
 Le tableau des fréquences indique la correspondance entre les fréquences et les numéros des canaux habituels. Choisissez « Hertzien » si vous utilisez une antenne pour recevoir la télévision.
";
$elem["tvtime/frequencies-ntsc"]["default"]="";
$elem["tvtime/frequencies-jp"]["type"]="select";
$elem["tvtime/frequencies-jp"]["choices"][1]="Cable";
$elem["tvtime/frequencies-jp"]["choicesde"][1]="Kabel";
$elem["tvtime/frequencies-jp"]["choicesfr"][1]="Câble";
$elem["tvtime/frequencies-jp"]["description"]="Select the default frequency table
 The frequency table specifies which frequencies correspond to the familiar
 channel numbers.  Select broadcast if you use an antenna for over-the-air
 signals.
";
$elem["tvtime/frequencies-jp"]["descriptionde"]="Wählen Sie die Standard-Frequenztabelle aus
 Die Frequenztabelle gibt die Frequenzen, die zu bekannten Kanalnummern gehören, an. Wählen Sie »Antenne« falls Sie eine Antenne für terrestische Signale einsetzen.
";
$elem["tvtime/frequencies-jp"]["descriptionfr"]="Table de fréquence par défaut
 Le tableau des fréquences indique la correspondance entre les fréquences et les numéros des canaux habituels. Choisissez « Hertzien » si vous utilisez une antenne pour recevoir la télévision.
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
$elem["tvtime/frequencies-pal"]["choicesde"][6]="China Antenne";
$elem["tvtime/frequencies-pal"]["choicesde"][7]="Australien Optus";
$elem["tvtime/frequencies-pal"]["choicesfr"][1]="Europe";
$elem["tvtime/frequencies-pal"]["choicesfr"][2]="France";
$elem["tvtime/frequencies-pal"]["choicesfr"][3]="Russie";
$elem["tvtime/frequencies-pal"]["choicesfr"][4]="Australie";
$elem["tvtime/frequencies-pal"]["choicesfr"][5]="Nouvelle-Zélande";
$elem["tvtime/frequencies-pal"]["choicesfr"][6]="Chine hertzien";
$elem["tvtime/frequencies-pal"]["choicesfr"][7]="Australie Optus";
$elem["tvtime/frequencies-pal"]["description"]="Select the default frequency table
 Users of the Optus cable company in Australia should select Australia
 Optus.  If you are a user of a cable company that does not use standard
 frequencies, such as Casema, UPC or Mixtics, please select Custom and run
 the tvtime-scanner application before using tvtime.
";
$elem["tvtime/frequencies-pal"]["descriptionde"]="Wählen Sie die Standard-Frequenztabelle aus
 Abonnenten der Optus-Kabelgesellschaft in Australien sollten Australien-Optus auswählen. Falls Sie ein Abonnent einer Kabelgesellschaft sind, die nicht-Standard-Frequenzen verwendet, wie beispielsweise Casema, UPC oder Mixtics, wählen Sie bitte »Angepaßt« aus und verwenden Sie die »tvtime-scanner«-Anwendung vor der Benutzung von tvtime.
";
$elem["tvtime/frequencies-pal"]["descriptionfr"]="Table de fréquence par défaut
 Les utilisateurs de la compagnie Optus en Australie devraient choisir « Australie Optus ». Si vous êtes un utilisateur d'une compagnie de câble n'utilisant pas les fréquences standards, comme Casema, UPS ou Mixtics, veuillez choisir « Personnalisé » et exécutez l'application tvtime-scanner avant d'utiliser tvtime.
";
$elem["tvtime/frequencies-pal"]["default"]="";
$elem["tvtime/v4ldevice"]["type"]="string";
$elem["tvtime/v4ldevice"]["description"]="Specify your default television capture device
 This should be the video4linux device which corresponds to your capture
 card.
";
$elem["tvtime/v4ldevice"]["descriptionde"]="Geben Sie das standardmäßig verwendete Fehrnseh-Eingangs-Gerät an
 Dies sollte das video4linux-Gerät sein, das Ihrer Fehrnseh-Karte entspricht.
";
$elem["tvtime/v4ldevice"]["descriptionfr"]="Périphérique télévisuel de capture par défaut
 Il devrait s'agir du périphérique video4linux correspondant à votre carte d'acquisition.
";
$elem["tvtime/v4ldevice"]["default"]="/dev/video0";
$elem["tvtime/vbidevice"]["type"]="string";
$elem["tvtime/vbidevice"]["description"]="Specify a device to use for VBI decoding
 This will only be used in NTSC areas for decoding closed captions and XDS
 channel information.
";
$elem["tvtime/vbidevice"]["descriptionde"]="Geben Sie das Gerät für Teletext-Dekodierung an
 Dies wird nur in NTSC-Gegenden verwendet, um »Closed Caption« und XDS-Kanalinformation zu dekodieren.
";
$elem["tvtime/vbidevice"]["descriptionfr"]="Périphérique à utiliser pour le décodage VBI
 Cela sera utilisé uniquement dans les zones NTSC pour le décodage des acquisitions fermées et les informations XDS des canaux.
";
$elem["tvtime/vbidevice"]["default"]="/dev/vbi0";
$elem["tvtime/setuid"]["type"]="boolean";
$elem["tvtime/setuid"]["description"]="Do you wish to make `/usr/bin/tvtime' setuid root?
 This allows tvtime to run at a high priority to ensure smooth video and
 should be used for high quality video output even during high CPU load.
";
$elem["tvtime/setuid"]["descriptionde"]="Wollen Sie »/usr/bin/tvtime« setuid root setzen?
 Dies ermöglicht es, tvtime mit hoher Priorität laufen zu lassen, um problemloses Bild sicherzustellen und sollte selbst bei hoher CPU-Last für hochqualitative Videoausgabe sorgen.
";
$elem["tvtime/setuid"]["descriptionfr"]="Souhaitez-vous rendre /usr/bin/tvtime « setuid root » ?
 Autoriser l'exécution de tvtime avec les droits du super-utilisateur permet de faire tourner tvtime avec une priorité élevée pour assurer la fluidité de la vidéo et devrait être utilisé pour produire des sorties vidéo de haute qualité, même lors des fortes charges du processeur.
";
$elem["tvtime/setuid"]["default"]="false";
$elem["tvtime/processpriority"]["type"]="string";
$elem["tvtime/processpriority"]["description"]="Specify the process priority for the tvtime binary
 This setting controls the priority of the tvtime process relative to other
 processes on the system.  The allowed range is from -19 to 19. Lower
 values indicate higher priority, and a value of 0 would give tvtime the
 same priority as a normal process.
";
$elem["tvtime/processpriority"]["descriptionde"]="Geben Sie die Prozeß-Priorität für tvtime an
 Diese Einstellung regelt die Priorität des tvtime-Prozesses relativ zu anderen Prozessen im System. Der erlaubte Bereich ist von -19 bis 19. Niedrigere Werte zeigen eine höhere Priorität an, und ein Wert von 0 würde tvtime die gleiche Priorität wie normale Prozesse geben.
";
$elem["tvtime/processpriority"]["descriptionfr"]="Veuillez indiquer la priorité du processus pour l'exécutable tvtime
 Ce paramètre contrôle la priorité du processus tvtime par rapport aux autres processus du système. L'intervalle admis s'entend de -19 jusqu'à 19. Des valeurs négatives traduisent une priorité élevée tandis qu'une valeur 0 donne à tvtime la même priorité que les processus normaux.
";
$elem["tvtime/processpriority"]["default"]="-10";
PKG_OptionPageTail2($elem);
?>
