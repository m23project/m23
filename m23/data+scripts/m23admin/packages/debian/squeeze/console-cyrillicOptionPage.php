<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("console-cyrillic");

$elem["console-cyrillic/bootsetup"]["type"]="boolean";
$elem["console-cyrillic/bootsetup"]["description"]="Do you want to setup Cyrillic on the console at boot-time?
 If you accept, the package console-cyrilic will setup Cyrillic on
 the console at boot-time.
 .
 Otherwise, refuse if you don't use Cyrillic the whole time or if for some
 reason you want to use the console setup by console-data package.
";
$elem["console-cyrillic/bootsetup"]["descriptionde"]="Soll kyrillisch auf der Konsole die Standard-Schrift sein?
 Wenn Sie zustimmen, wird das Paket console-cyrillic beim Booten Kyrillisch auf der Konsole einstellen.
 .
 Andernfalls lehnen Sie ab, wenn Sie Kyrillisch aus irgendeinem Grund nicht die ganze Zeit verwenden, oder das Konsolen Setup mittels console-data verwenden möchten.
";
$elem["console-cyrillic/bootsetup"]["descriptionfr"]="Souhaitez-vous utiliser l'affichage de la console en cyrillique au démarrage ?
 Si vous acceptez, l'affichage de la console sera en caractères cyrilliques dès le démarrage.
 .
 Dans le cas contraire, si vous n'utilisez pas les caractères cyrilliques en permanence ou si, pour une raison ou une autre, vous préférez utiliser le paramétrage de la console par le paquet console-data, refusez.
";
$elem["console-cyrillic/bootsetup"]["default"]="false";
$elem["console-cyrillic/abusing_debconf"]["type"]="note";
$elem["console-cyrillic/abusing_debconf"]["description"]="Your /etc/console-cyrillic file will be preserved unchanged.
 You have requested Debconf not to change the configuration file
 /etc/console-cyrillic.  The new version of this file will be written in
 /etc/console-cyrillic.debconf instead.  Note that this file is not read by
 console-cyrillic and will have no effect.
";
$elem["console-cyrillic/abusing_debconf"]["descriptionde"]="Die Datei /etc/console-cyrillic wird unverändert beibehalten.
 Sie wollen nicht, dass Debconf die Konfigurationsdatei /etc/console-cyrillic ändert. Daher wird stattdessen eine neue Daten /etc/console-cyrillic.debconf geschrieben, die aber nicht von console-cyrillic verwendet wird.
";
$elem["console-cyrillic/abusing_debconf"]["descriptionfr"]="Votre fichier /etc/console-cyrillic ne sera pas modifié.
 Vous avez souhaité que debconf ne modifie pas le fichier de configuration /etc/console-cyrillic. La nouvelle version de ce fichier sera alors sauvegardée sous le nom /etc/console-cyrillic.debconf. Veuillez noter que ce fichier ne sera pas utilisé par console-cyrillic et n'aura aucun effet.
";
$elem["console-cyrillic/abusing_debconf"]["default"]="";
$elem["console-cyrillic/change_config"]["type"]="boolean";
$elem["console-cyrillic/change_config"]["description"]="Should /etc/console-cyrillic be changed by Debconf?
 This template is never presented to the user.  It is used internally by
 the package installation scripts.

";
$elem["console-cyrillic/change_config"]["descriptionde"]="";
$elem["console-cyrillic/change_config"]["descriptionfr"]="";
$elem["console-cyrillic/change_config"]["default"]="";
$elem["console-cyrillic/ttys"]["type"]="string";
$elem["console-cyrillic/ttys"]["description"]="What virtual consoles do you use?
 Please enter a space delimited list of virtual consoles you use. The usual
 Unix filename wildcards are allowed (*, ? and [...]).
 .
 If you are unsure, then use the default /dev/tty[1-6], it is for six
 virtual consoles. If you use devfs, then enter /dev/vc/[1-6] instead.
";
$elem["console-cyrillic/ttys"]["descriptionde"]="Welche virtuellen Konsolen benutzen Sie?
 Bitte geben Sie eine Liste Ihrer virtuellen Konsolen ein. Die einzelnen Einträge müssen dabei mit einem Leerzeichen getrennt werden. Typische Unix-Platzhalter (*, ? und [...]) werden unterstützt.
 .
 Wenn Sie sich unsicher sind, benutzen Sie die Standardeinstellung /dev/tty[1-6] für sechs virtuelle Konsolen. Wenn Sie devfs benutzen, geben Sie stattdessen /dev/vc/[1-6] ein.
";
$elem["console-cyrillic/ttys"]["descriptionfr"]="Consoles virtuelles à utiliser :
 Veuillez indiquer une liste (séparateur : espace) des consoles virtuelles que vous utilisez. L'utilisation des caractères joker habituels d'Unix (*, ? et []) est possible.
 .
 Si vous ne savez pas quoi répondre, utilisez la valeur par défaut « /dev/tty[1-6] ». Elle correspond à six consoles virtuelles. Si vous utilisez devfs, indiquez plutôt « /dev/vc/[1-6] ».
";
$elem["console-cyrillic/ttys"]["default"]="/dev/tty[1-6]";
$elem["console-cyrillic/fontstyle"]["type"]="select";
$elem["console-cyrillic/fontstyle"]["choices"][1]="Terminus Unicode Normal";
$elem["console-cyrillic/fontstyle"]["choices"][2]="Terminus Unicode Bold";
$elem["console-cyrillic/fontstyle"]["choices"][3]="Terminus Unicode Framebuffer";
$elem["console-cyrillic/fontstyle"]["choices"][4]="Terminus Slavic Normal";
$elem["console-cyrillic/fontstyle"]["choices"][5]="Terminus Slavic Bold";
$elem["console-cyrillic/fontstyle"]["choices"][6]="Terminus Slavic Framebuffer";
$elem["console-cyrillic/fontstyle"]["choices"][7]="Terminus Asian Normal";
$elem["console-cyrillic/fontstyle"]["choices"][8]="Terminus Asian Bold";
$elem["console-cyrillic/fontstyle"]["choices"][9]="Terminus Asian Framebuffer";
$elem["console-cyrillic/fontstyle"]["choices"][10]="UniCyr";
$elem["console-cyrillic/fontstyle"]["choices"][11]="DOS";
$elem["console-cyrillic/fontstyle"]["choices"][12]="Alt";
$elem["console-cyrillic/fontstyle"]["choices"][13]="Pln";
$elem["console-cyrillic/fontstyle"]["choices"][14]="Antiq";
$elem["console-cyrillic/fontstyle"]["choices"][15]="Antiq Asian";
$elem["console-cyrillic/fontstyle"]["choices"][16]="Sans";
$elem["console-cyrillic/fontstyle"]["choices"][17]="Lenta";
$elem["console-cyrillic/fontstyle"]["choices"][18]="Cage";
$elem["console-cyrillic/fontstyle"]["choices"][19]="Thin";
$elem["console-cyrillic/fontstyle"]["choices"][20]="Sarge";
$elem["console-cyrillic/fontstyle"]["choices"][21]="A";
$elem["console-cyrillic/fontstyle"]["choices"][22]="A Asian";
$elem["console-cyrillic/fontstyle"]["choices"][23]="B";
$elem["console-cyrillic/fontstyle"]["choices"][24]="B Asian";
$elem["console-cyrillic/fontstyle"]["choices"][25]="C";
$elem["console-cyrillic/fontstyle"]["choices"][26]="ISO";
$elem["console-cyrillic/fontstyle"]["choicesde"][1]="Terminus Unicode Normal";
$elem["console-cyrillic/fontstyle"]["choicesde"][2]="Terminus Unicode Fett";
$elem["console-cyrillic/fontstyle"]["choicesde"][3]="Terminus Unicode Framebuffer";
$elem["console-cyrillic/fontstyle"]["choicesde"][4]="Terminus Slavisch Normal";
$elem["console-cyrillic/fontstyle"]["choicesde"][5]="Terminus Slavisch Fett";
$elem["console-cyrillic/fontstyle"]["choicesde"][6]="Terminus Slavisch Framebuffer";
$elem["console-cyrillic/fontstyle"]["choicesde"][7]="Terminus Asiatisch Normal";
$elem["console-cyrillic/fontstyle"]["choicesde"][8]="Terminus Asiatisch Fett";
$elem["console-cyrillic/fontstyle"]["choicesde"][9]="Terminus Asiatisch Framebuffer";
$elem["console-cyrillic/fontstyle"]["choicesde"][10]="UniCyr";
$elem["console-cyrillic/fontstyle"]["choicesde"][11]="DOS";
$elem["console-cyrillic/fontstyle"]["choicesde"][12]="Alt";
$elem["console-cyrillic/fontstyle"]["choicesde"][13]="Pln";
$elem["console-cyrillic/fontstyle"]["choicesde"][14]="Antiq";
$elem["console-cyrillic/fontstyle"]["choicesde"][15]="Antiq Asiatisch";
$elem["console-cyrillic/fontstyle"]["choicesde"][16]="Sans";
$elem["console-cyrillic/fontstyle"]["choicesde"][17]="Lenta";
$elem["console-cyrillic/fontstyle"]["choicesde"][18]="Cage";
$elem["console-cyrillic/fontstyle"]["choicesde"][19]="Dünn";
$elem["console-cyrillic/fontstyle"]["choicesde"][20]="Sarge";
$elem["console-cyrillic/fontstyle"]["choicesde"][21]="A";
$elem["console-cyrillic/fontstyle"]["choicesde"][22]="A Asiatisch";
$elem["console-cyrillic/fontstyle"]["choicesde"][23]="B";
$elem["console-cyrillic/fontstyle"]["choicesde"][24]="B Asiatisch";
$elem["console-cyrillic/fontstyle"]["choicesde"][25]="C";
$elem["console-cyrillic/fontstyle"]["choicesde"][26]="ISO";
$elem["console-cyrillic/fontstyle"]["choicesfr"][1]="Terminus Unicode normale";
$elem["console-cyrillic/fontstyle"]["choicesfr"][2]="Terminus Unicode gras";
$elem["console-cyrillic/fontstyle"]["choicesfr"][3]="Terminus Unicode « framebuffer »";
$elem["console-cyrillic/fontstyle"]["choicesfr"][4]="Terminus slave normale";
$elem["console-cyrillic/fontstyle"]["choicesfr"][5]="Terminus slave gras";
$elem["console-cyrillic/fontstyle"]["choicesfr"][6]="Terminus slave « framebuffer »";
$elem["console-cyrillic/fontstyle"]["choicesfr"][7]="Terminus asiatique normale";
$elem["console-cyrillic/fontstyle"]["choicesfr"][8]="Terminus asiatique gras";
$elem["console-cyrillic/fontstyle"]["choicesfr"][9]="Terminus asiatique « framebuffer »";
$elem["console-cyrillic/fontstyle"]["choicesfr"][10]="UniCyr";
$elem["console-cyrillic/fontstyle"]["choicesfr"][11]="DOS";
$elem["console-cyrillic/fontstyle"]["choicesfr"][12]="Alt";
$elem["console-cyrillic/fontstyle"]["choicesfr"][13]="Pln";
$elem["console-cyrillic/fontstyle"]["choicesfr"][14]="Antiq";
$elem["console-cyrillic/fontstyle"]["choicesfr"][15]="Antiq asiatique";
$elem["console-cyrillic/fontstyle"]["choicesfr"][16]="Sans";
$elem["console-cyrillic/fontstyle"]["choicesfr"][17]="Lenta";
$elem["console-cyrillic/fontstyle"]["choicesfr"][18]="Cage";
$elem["console-cyrillic/fontstyle"]["choicesfr"][19]="Fine (« Thin »)";
$elem["console-cyrillic/fontstyle"]["choicesfr"][20]="Sarge";
$elem["console-cyrillic/fontstyle"]["choicesfr"][21]="A";
$elem["console-cyrillic/fontstyle"]["choicesfr"][22]="A asiatique";
$elem["console-cyrillic/fontstyle"]["choicesfr"][23]="B";
$elem["console-cyrillic/fontstyle"]["choicesfr"][24]="B asiatique";
$elem["console-cyrillic/fontstyle"]["choicesfr"][25]="C";
$elem["console-cyrillic/fontstyle"]["choicesfr"][26]="ISO";
$elem["console-cyrillic/fontstyle"]["description"]="Choose a font for the console.
 Please choose the font you would like to use on the console. If you
 change your mind later on, you can use the command `dpkg-reconfigure
 console-cyrillic' to answer again all these questions.
 .
 Different videomodes require different font sizes. Usually font size 16 is
 for videomodes 80x25 and 80x30, font size 14 is for videomodes 80x28 and
 80x34 and font size 8 is for videomodes 80x43, 80x50 and 80x60.
 .
 Not all fonts are suitable for all alphabets. A table for the available
 fonts, and supported sizes and alphabets follows.
 .
 Legend:
 .
  a -- Asian Cyrillic letters;
  b -- Belarusian alphabet;
  r -- Russian alphabet with letters `E with diaeresis';
  u -- Ukrainian alphabet;
  y -- Macedonian and Serbian alphabets.
 .
 Remark: All fonts support the Bulgarian alphabet and the basic Russian
 alphabet.
 .
  Font name          Available sizes        Supported alphabets
  -------------------------------------------------------------
  A                   16    14          8
  A Asian             16                          abr
  Alt                 16    14          8           r
  Antiq               16                            r
  Antiq Asian         16                          abr
  Arab             18 16    14          8          br y
  B                   16                            r
  B Asian             16                          abr
  C                   16                           bruy
  Cage          19 18 16 15 14 12 11 10 8
  DOS                 16    14          8          br
  ISO                 16    14                     br y
  Lenta               16                           bruy
  Pln                 16    14          8          bruy
  Sarge               16                           br
  Sans                16                           bruy
  Terminus Asian      16    14                    abr
  Terminus Slavic     16    14                     bruy
  Terminus Unicode    16    14                    abruy
  Thin                16    14                     br
  UniCyr              16    14          8          bruy
";
$elem["console-cyrillic/fontstyle"]["descriptionde"]="Wählen Sie einen Schriftsatz für die Konsole.
 Bitte wählen Sie die Schrift aus aus, welche Sie auf der Konsole benutzen möchten. Wenn Sie Ihre Meinung später ändern, können Sie den Befehl 'dpkg-reconfigure console-cyrillic' benutzen, um diese Fragen erneut zu beantworten.
 .
 Verschiedene Video-Modi erfordern verschiedene Schriftgrößen. Die Standard-Schriftgröße 16 ist für die Video-Modi 80x25 und 80x30, Schriftgröße 14 für die Modi 80x28 und 80x34 und Schriftgröße 8 für die Modi 80x42, 80x50 und 80x60 geeignet.
 .
 Nicht alle Schriftarten sind für alle Alphabete geeignet. Eine Tabelle mit den verfügbaren Schriften, Größen und Alphabeten folgt:
 .
 Legende:
 .
  a -- Asisch-kyrillische Buchstaben
  b -- Weißrussisches Alphabet
  r -- Russisches Alphabet mit Buchstaben 'E mit Trema'
  u -- Ukrainisches Alphabet
  y -- Mazedonisches und serbisches Alphabet
 .
 Anmerkung: Alle folgenden Schriftarten beinhalten die Buchstaben des bulgarischen und einfachen russischen Alphabets.
 .
  Schriftart         Verfügbare Größen          Unterstützte Alphabete
  --------------------------------------------------------------------
  A                   16    14          8
  A Asian             16                          abr
  Alt                 16    14          8           r
  Antiq               16                            r
  Antiq Asian         16                          abr
  Arab             18 16    14          8          br y
  B                   16                            r
  B Asian             16                          abr
  C                   16                           bruy
  Cage          19 18 16 15 14 12 11 10 8
  DOS                 16    14          8          br
  ISO                 16    14                     br y
  Lenta               16                           bruy
  Pln                 16    14          8          bruy
  Sarge               16                           br
  Sans                16                           bruy
  Terminus Asian      16    14                    abr
  Terminus Slavic     16    14                     bruy
  Terminus Unicode    16    14                    abruy
  Thin                16    14                     br
  UniCyr              16    14          8          bruy
";
$elem["console-cyrillic/fontstyle"]["descriptionfr"]="Police d'affichage pour la console :
 Veuillez choisir la police d'affichage que vous souhaitez utiliser pour la console. Vous pourrez changer d'avis plus tard et utiliser la commande « dpkg-reconfigure console-cyrillic » pour répondre à nouveau à toutes ces questions.
 .
 Les différents modes d'affichage nécessitent des polices de tailles différentes. En général, la taille 16 est destinée aux modes 80x25 et 80x30, la taille 14 aux modes 80x28 et 80x34 et la taille 8 aux modes 80x43, 80x50 et 80x60.
 .
 Toutes les polices ne sont pas adaptées à tous les alphabets. Voici la table des polices disponibles, avec les tailles et les alphabets possibles :
 .
 Légende :
 .
  a : alphabet cyrillique asiatique ;
  b : alphabet bélarusse ;
  r : alphabet russe avec les lettres « E tréma » ;
  u : alphabet ukrainien ;
  y : alphabets macédonien et serbe.
 .
 Remarque : toutes les polices gèrent l'alphabet bulgare et l'alphabet russe de base.
 .
  Police             Tailles disponibles        Alphabets gérés
  -------------------------------------------------------------
  A                   16    14          8
  A asiatique         16                          abr
  Alt                 16    14          8           r
  Antiq               16                            r
  Antiq asiatique     16                          abr
  Arabe            18 16    14          8          br y
  B                   16                            r
  B asiatique         16                          abr
  C                   16                           bruy
  Cage          19 18 16 15 14 12 11 10 8
  DOS                 16    14          8          br
  ISO                 16    14                     br y
  Lenta               16                           bruy
  Pln                 16    14          8          bruy
  Sarge               16                           br
  Sans                16                           bruy
  Terminus asiatique  16    14                    abr
  Terminus slave      16    14                     bruy
  Terminus Unicode    16    14                    abruy
  Fine (« Thin »)     16    14                     br
  UniCyr              16    14          8          bruy
";
$elem["console-cyrillic/fontstyle"]["default"]="Terminus Unicode Framebuffer";
$elem["console-cyrillic/fontsize"]["type"]="select";
$elem["console-cyrillic/fontsize"]["description"]="What is your favourite font size?
 Please select the size for the chosen font. If unsure choose the standard
 font size (16).
";
$elem["console-cyrillic/fontsize"]["descriptionde"]="Bitte wählen Sie eine Schriftgröße.
 Bitte wählen Sie eine Größe für die von Ihnen ausgewählte Schriftart. Wenn Sie sich unsicher sind, wählen Sie die Standardschriftgröße 16.
";
$elem["console-cyrillic/fontsize"]["descriptionfr"]="Taille de police préférée :
 Veuillez indiquer la taille de la police d'affichage. Si vous ne savez pas quoi répondre, choisissez la taille par défaut (16).
";
$elem["console-cyrillic/fontsize"]["default"]="16";
$elem["console-cyrillic/kbdtype"]["type"]="select";
$elem["console-cyrillic/kbdtype"]["choices"][1]="Belarusian";
$elem["console-cyrillic/kbdtype"]["choices"][2]="Bulgarian BDS";
$elem["console-cyrillic/kbdtype"]["choices"][3]="Bulgarian phonetic";
$elem["console-cyrillic/kbdtype"]["choices"][4]="Kazakh";
$elem["console-cyrillic/kbdtype"]["choices"][5]="Kazakh with letter IO";
$elem["console-cyrillic/kbdtype"]["choices"][6]="Macedonian";
$elem["console-cyrillic/kbdtype"]["choices"][7]="Mongolian";
$elem["console-cyrillic/kbdtype"]["choices"][8]="Russian";
$elem["console-cyrillic/kbdtype"]["choices"][9]="Russian Winkeys";
$elem["console-cyrillic/kbdtype"]["choices"][10]="Serbian";
$elem["console-cyrillic/kbdtype"]["choices"][11]="Ukrainian";
$elem["console-cyrillic/kbdtype"]["choicesde"][1]="Weißrussisch";
$elem["console-cyrillic/kbdtype"]["choicesde"][2]="Bulgarisch BDS";
$elem["console-cyrillic/kbdtype"]["choicesde"][3]="Bulgarische Lautschrift";
$elem["console-cyrillic/kbdtype"]["choicesde"][4]="Kasachisch";
$elem["console-cyrillic/kbdtype"]["choicesde"][5]="Kasachisch mit Letter IO";
$elem["console-cyrillic/kbdtype"]["choicesde"][6]="Makedonisch";
$elem["console-cyrillic/kbdtype"]["choicesde"][7]="Mongolisch";
$elem["console-cyrillic/kbdtype"]["choicesde"][8]="Russisch";
$elem["console-cyrillic/kbdtype"]["choicesde"][9]="Russisch mit Windowstasten";
$elem["console-cyrillic/kbdtype"]["choicesde"][10]="Serbisch";
$elem["console-cyrillic/kbdtype"]["choicesde"][11]="Ukrainisch";
$elem["console-cyrillic/kbdtype"]["choicesfr"][1]="Bélarusse";
$elem["console-cyrillic/kbdtype"]["choicesfr"][2]="BDS bulgare";
$elem["console-cyrillic/kbdtype"]["choicesfr"][3]="Bulgare phonétique";
$elem["console-cyrillic/kbdtype"]["choicesfr"][4]="Kazakh";
$elem["console-cyrillic/kbdtype"]["choicesfr"][5]="Kazakhe avec lettre IO";
$elem["console-cyrillic/kbdtype"]["choicesfr"][6]="Macédonien";
$elem["console-cyrillic/kbdtype"]["choicesfr"][7]="Mongol";
$elem["console-cyrillic/kbdtype"]["choicesfr"][8]="Russe";
$elem["console-cyrillic/kbdtype"]["choicesfr"][9]="Russe touches Windows";
$elem["console-cyrillic/kbdtype"]["choicesfr"][10]="Serbe";
$elem["console-cyrillic/kbdtype"]["choicesfr"][11]="Ukrainien";
$elem["console-cyrillic/kbdtype"]["description"]="Choose the keyboard layout
 Please choose the keyboard layout to load at boot time.
";
$elem["console-cyrillic/kbdtype"]["descriptionde"]="Bitte wählen Sie Ihre Tastatur.
 Bitte wählen Sie, welche Tastatur an Ihren Computer angeschlossen ist und nach dem Start unterstützt werden soll.
";
$elem["console-cyrillic/kbdtype"]["descriptionfr"]="Disposition du clavier :
 Veuillez choisir la disposition de clavier qui sera chargée au démarrage.
";
$elem["console-cyrillic/kbdtype"]["default"]="";
$elem["console-cyrillic/toggle"]["type"]="select";
$elem["console-cyrillic/toggle"]["choices"][1]="Caps Lock";
$elem["console-cyrillic/toggle"]["choices"][2]="Right Alt";
$elem["console-cyrillic/toggle"]["choices"][3]="Right Control";
$elem["console-cyrillic/toggle"]["choices"][4]="Right Shift";
$elem["console-cyrillic/toggle"]["choices"][5]="Alt+Shift";
$elem["console-cyrillic/toggle"]["choices"][6]="Control+Shift";
$elem["console-cyrillic/toggle"]["choices"][7]="Control+Alt";
$elem["console-cyrillic/toggle"]["choices"][8]="Left Windows logo key";
$elem["console-cyrillic/toggle"]["choices"][9]="Right Windows logo key";
$elem["console-cyrillic/toggle"]["choicesde"][1]="Feststelltaste";
$elem["console-cyrillic/toggle"]["choicesde"][2]="Alt rechts";
$elem["console-cyrillic/toggle"]["choicesde"][3]="Steuerung rechts";
$elem["console-cyrillic/toggle"]["choicesde"][4]="Umschlattaste rechts";
$elem["console-cyrillic/toggle"]["choicesde"][5]="Alt+Umschalttaste";
$elem["console-cyrillic/toggle"]["choicesde"][6]="Steuerung+Umschalttaste";
$elem["console-cyrillic/toggle"]["choicesde"][7]="Steuerung+Alt";
$elem["console-cyrillic/toggle"]["choicesde"][8]="Windows-Logo-Taste links";
$elem["console-cyrillic/toggle"]["choicesde"][9]="Windows-Logo-Taste rechts";
$elem["console-cyrillic/toggle"]["choicesfr"][1]="Verr. Maj.";
$elem["console-cyrillic/toggle"]["choicesfr"][2]="Touche Alt de droite";
$elem["console-cyrillic/toggle"]["choicesfr"][3]="Touch Ctrl de droite";
$elem["console-cyrillic/toggle"]["choicesfr"][4]="Touche Majuscule de droite";
$elem["console-cyrillic/toggle"]["choicesfr"][5]="Alt+Majuscule";
$elem["console-cyrillic/toggle"]["choicesfr"][6]="Ctrl+Majuscule";
$elem["console-cyrillic/toggle"]["choicesfr"][7]="Ctrl+Alt";
$elem["console-cyrillic/toggle"]["choicesfr"][8]="Touche logo Windows de gauche";
$elem["console-cyrillic/toggle"]["choicesfr"][9]="Touche logo Windows de droite";
$elem["console-cyrillic/toggle"]["description"]="Toggling between Cyrillic and Latin characters
 How you will toggle between Cyrillic and Latin characters? Several
 possibilities are available.
 .
 If you choose the Caps Lock key, then use the combination Shift+Caps Lock
 for normal Caps toggle.
 .
 Obviously you may use Windows logo keys and Menu key only if your keyboard
 has them.
";
$elem["console-cyrillic/toggle"]["descriptionde"]="Umschaltung zwischen kyrillischen und lateinischen Buchstaben
 Wie werden Sie zwischen kyrillischen und lateinischen Buchstaben umschalten? Verschiedene Möglichkeiten sind verfügbar.
 .
 Wenn Sie sich für die Caps-Lock-Taste (Feststell-Taste) entscheiden, können sie Shift+Caps-Lock für die normale Feststell-Funktion benutzen.
 .
 Natürlich können Sie die Windows-Tasten und die Menü-Taste nur dann wählen, wenn Ihre Tastatur über diese verfügt.
";
$elem["console-cyrillic/toggle"]["descriptionfr"]="Mode de bascule entre alphabets cyrillique et latin :
 Veuillez choisir la méthode de bascule entre les alphabets cyrillique et latin.
 .
 Si vous choisissez la touche « Verr. Maj. », utilisez la combinaison Maj+Verr. Maj. pour la bascule normale en mode majuscules.
 .
 Bien entendu, vous ne pouvez utiliser les touches « Windows » (parfois appelée « Logo ») et « Menu » que si votre clavier les possède.
";
$elem["console-cyrillic/toggle"]["default"]="Right Alt";
$elem["console-cyrillic/switch"]["type"]="select";
$elem["console-cyrillic/switch"]["choices"][1]="Right Alt";
$elem["console-cyrillic/switch"]["choices"][2]="Menu key";
$elem["console-cyrillic/switch"]["choices"][3]="Left Windows logo key";
$elem["console-cyrillic/switch"]["choices"][4]="Right Windows logo key";
$elem["console-cyrillic/switch"]["choices"][5]="Both Windows logo keys";
$elem["console-cyrillic/switch"]["choicesde"][1]="Alt rechts";
$elem["console-cyrillic/switch"]["choicesde"][2]="Menütaste";
$elem["console-cyrillic/switch"]["choicesde"][3]="Windows-Logo-Taste links";
$elem["console-cyrillic/switch"]["choicesde"][4]="Windows-Logo-Taste rechts";
$elem["console-cyrillic/switch"]["choicesde"][5]="Beide Windows-Logo-Tasten";
$elem["console-cyrillic/switch"]["choicesfr"][1]="Touche Alt de droite";
$elem["console-cyrillic/switch"]["choicesfr"][2]="Touche Menu";
$elem["console-cyrillic/switch"]["choicesfr"][3]="Touche logo Windows de gauche";
$elem["console-cyrillic/switch"]["choicesfr"][4]="Touche logo Windows de droite";
$elem["console-cyrillic/switch"]["choicesfr"][5]="Les deux touches logo Windows";
$elem["console-cyrillic/switch"]["description"]="Switching temporarily between Cyrillic and Latin characters
 Sometimes you are in Cyrillic mode and want to type only a few Latin
 letters. In this case it may be desirable to have a key for temporary
 switching between Cyrillic and Latin letters. When this key is pressed in
 Cyrillic mode the keyboard types Latin letters and in reverse, when the
 keyboard is in Latin mode and you are pressing this key the keyboard will
 type Cyrillic letters.
 .
 If you don't like this feature, choose the option \"No temporary switch\".
";
$elem["console-cyrillic/switch"]["descriptionde"]="Vorübergehend zwischen kyrillischen und lateinischen Buchstaben umschalten
 Manchmal sollen nur ein paar lateinische Buchstaben eingegeben werden. In diesem Fall ist es praktisch, nur kurzzeitig umzuschalten. Sie können mit dieser Option wählen, mit welcher Taste dies geschehen soll. Wenn Sie sich im kyrillischen Modus befinden und diese Taste drücken, werden lateinische Buchstaben eingegeben und umgekehrt.
 .
 Wenn Sie dieses Feature ganz abstellen möchten, können Sie \"Gar nicht\" auswählen.
";
$elem["console-cyrillic/switch"]["descriptionfr"]="Mode de bascule temporaire entre les alphabets cyrillique et latin :
 Il peut vous arriver de travailler en mode cyrillique et d'avoir besoin de taper seulement quelques lettres latines. Dans ce cas, une touche permettant une bascule temporaire entre les alphabets peut être utile. Quand cette touche est appuyée en mode cyrillique, le clavier envoie des lettres latines et inversement.
 .
 Si vous n'aimez pas cette fonctionnalité, veuillez choisir « Pas de bascule temporaire ».
";
$elem["console-cyrillic/switch"]["default"]="Both Windows logo keys";
$elem["console-cyrillic/encoding"]["type"]="select";
$elem["console-cyrillic/encoding"]["choices"][1]="UNICODE";
$elem["console-cyrillic/encoding"]["choices"][2]="CP866";
$elem["console-cyrillic/encoding"]["choices"][3]="CP1251";
$elem["console-cyrillic/encoding"]["choices"][4]="ISO-8859-5";
$elem["console-cyrillic/encoding"]["choices"][5]="KOI8-R";
$elem["console-cyrillic/encoding"]["choices"][6]="KOI8-U";
$elem["console-cyrillic/encoding"]["choices"][7]="MAC-CYRILLIC";
$elem["console-cyrillic/encoding"]["choices"][8]="MIK";
$elem["console-cyrillic/encoding"]["choices"][9]="PT154";
$elem["console-cyrillic/encoding"]["description"]="What is your encoding?
 And finally you should choose your encoding.
 .
 If you want to live on the bleeding edge then choose UNICODE (=UTF-8).
 .
 The Linux community in Russia prefers the KOI8-R encoding.
 .
 The Ukrainian encoding KOI8-U is especially designed to be compatible with
 KOI8-R.
 .
 If you live in Macedonia or Serbia and Montenegro, then ISO-8859-5 is for you.
 .
 If you live in Bulgaria or Belarus, then choose CP1251.
 .
 If you live in Kazakhstan or Mongolia, then choose UNICODE, PT154 or RK1048.
 .
 CP1251 is used in MS Windows and OS/2. MAC-CYRILLIC is used in the
 operating systems of Apple Computers. CP866 is Russian encoding for DOS.
 MIK is Bulgarian encoding for DOS.
";
$elem["console-cyrillic/encoding"]["descriptionde"]="Bitte wählen Sie eine Kodierung.
 Bitte wählen Sie eine Kodierung aus, die auf der Konsole benutzt werden soll.
 .
 Wenn Sie auf dem umfangreichsten Stand sein möchten, wählen Sie UNICODE (=UTF-8).
 .
 Im Allgemeinen wird in Rußland KOI8-R bevorzugt.
 .
 Die ukrainische Kodierung KOI8-U wurde speziell entwickelt, um mit KOI8-R kompatibel zu sein.
 .
 Wenn Sie in Mazedonien oder Jugoslawien leben, ist ISO-8859-5 die beste Wahl für Sie.
 .
 Wenn Sie in Bulgarien oder Weißrussland leben, dann wählen Sie CP1251.
 .
 Wenn Sie in der Mongolei wohnen, wählen Sie UNICODE oder PT154.
 .
 CP1251 wird von MS-Windows und OS/2, MAC-CYRILLIC von Apple-Computern
";
$elem["console-cyrillic/encoding"]["descriptionfr"]="Encodage à utiliser :
 Enfin, vous devez choisir l'encodage qui sera utilisé.
 .
 Si vous souhaitez être à la pointe du progrès, veuillez choisir UNICODE (ou UTF-8).
 .
 La communauté Linux en Russie préfère utiliser l'encodage KOI8-R.
 .
 L'encodage ukrainien KOI8-U est spécialement conçu pour être compatible avec KOI8-R.
 .
 Si vous habitez en Macédoine ou en Serbie et Monténégro, l'encodage ISO-8859-5 vous est destiné.
 .
 Si vous habitez en Bulgarie ou en Bélarus, choisissez CP1251.
 .
 Si vous habitez en Mongolie, choisissez UNICODE, PT154 ou RK1048.
 .
 CP1251 est utilisé par MS Windows et OS/2. MAC-CYRILLIC est utilisé dans les systèmes d'exploitation d'Apple Computers. CP866 est l'encodage russe pour DOS. MIK est l'encodage bulgare pour DOS.
";
$elem["console-cyrillic/encoding"]["default"]="UNICODE";
PKG_OptionPageTail2($elem);
?>
