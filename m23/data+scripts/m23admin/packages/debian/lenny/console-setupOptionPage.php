<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("console-setup");

$elem["debian-installer/console-setup/title"]["type"]="text";
$elem["debian-installer/console-setup/title"]["description"]="Configure the keyboard
";
$elem["debian-installer/console-setup/title"]["descriptionde"]="Tastatur konfigurieren
";
$elem["debian-installer/console-setup/title"]["descriptionfr"]="Configurer le clavier
";
$elem["debian-installer/console-setup/title"]["default"]="";
$elem["console-setup/codeset"]["type"]="select";
$elem["console-setup/codeset"]["choices"][1]=". Arabic";
$elem["console-setup/codeset"]["choices"][2]="# Armenian";
$elem["console-setup/codeset"]["choices"][3]="# Cyrillic - KOI8-R and KOI8-U";
$elem["console-setup/codeset"]["choices"][4]="# Cyrillic - non-Slavic languages";
$elem["console-setup/codeset"]["choices"][5]="# Cyrillic - Slavic languages (also Bosnian and Serbian Latin)";
$elem["console-setup/codeset"]["choices"][6]=". Ethiopic";
$elem["console-setup/codeset"]["choices"][7]="# Georgian";
$elem["console-setup/codeset"]["choices"][8]="# Greek";
$elem["console-setup/codeset"]["choices"][9]="# Hebrew";
$elem["console-setup/codeset"]["choices"][10]="# Lao";
$elem["console-setup/codeset"]["choices"][11]="# Latin1 and Latin5 - western Europe and Turkic languages";
$elem["console-setup/codeset"]["choices"][12]="# Latin2 - central Europe and Romanian";
$elem["console-setup/codeset"]["choices"][13]="# Latin3 and Latin8 - Chichewa; Esperanto; Irish; Maltese and Welsh";
$elem["console-setup/codeset"]["choices"][14]="# Latin7 - Lithuanian; Latvian; Maori and Marshallese";
$elem["console-setup/codeset"]["choices"][15]=". Latin - Vietnamese";
$elem["console-setup/codeset"]["choices"][16]="# Thai";
$elem["console-setup/codeset"]["choices"][17]=". Combined - Latin; Slavic Cyrillic; Hebrew; basic Arabic";
$elem["console-setup/codeset"]["choices"][18]=". Combined - Latin; Slavic Cyrillic; Greek";
$elem["console-setup/codeset"]["choicesde"][1]=". Arabisch";
$elem["console-setup/codeset"]["choicesde"][2]="# Armenisch";
$elem["console-setup/codeset"]["choicesde"][3]="# Kyrillisch - KOI8-R und KOI8-U";
$elem["console-setup/codeset"]["choicesde"][4]="# Kyrillisch - nichtslawische Sprachen";
$elem["console-setup/codeset"]["choicesde"][5]="# Kyrillisch - slawische Sprachen (auch bosnisch und serbisch-lateinisch)";
$elem["console-setup/codeset"]["choicesde"][6]=". Äthiopisch";
$elem["console-setup/codeset"]["choicesde"][7]="# Georgisch";
$elem["console-setup/codeset"]["choicesde"][8]="# Griechisch";
$elem["console-setup/codeset"]["choicesde"][9]="# Hebräisch";
$elem["console-setup/codeset"]["choicesde"][10]="# Laotisch";
$elem["console-setup/codeset"]["choicesde"][11]="# Latin1 und Latin5 - westeuropäische und türkische Sprachen";
$elem["console-setup/codeset"]["choicesde"][12]="# Latin2 - Zentraleuropäisch und Rumänisch";
$elem["console-setup/codeset"]["choicesde"][13]="# Latin3 und Latin8 - Chichewa\";
$elem["console-setup/codeset"]["choicesde"][14]="Esperanto\";
$elem["console-setup/codeset"]["choicesde"][15]="Irisch\";
$elem["console-setup/codeset"]["choicesde"][16]="Maltesisch und Walisisch";
$elem["console-setup/codeset"]["choicesde"][17]="# Latin7 - Litauisch\";
$elem["console-setup/codeset"]["choicesde"][18]="Lettisch\";
$elem["console-setup/codeset"]["choicesde"][19]="Maorisch und Marshallisch";
$elem["console-setup/codeset"]["choicesde"][20]=". Latin - Vietnamesisch";
$elem["console-setup/codeset"]["choicesde"][21]="# Thailändisch";
$elem["console-setup/codeset"]["choicesde"][22]=". Kombiniert - Latein\";
$elem["console-setup/codeset"]["choicesde"][23]="slawisches Kyrillisch\";
$elem["console-setup/codeset"]["choicesde"][24]="Hebräisch\";
$elem["console-setup/codeset"]["choicesde"][25]="einfaches Arabisch";
$elem["console-setup/codeset"]["choicesde"][26]=". Kombiniert - Latein\";
$elem["console-setup/codeset"]["choicesde"][27]="slawisches Kyrillisch\";
$elem["console-setup/codeset"]["choicesde"][28]="Griechisch";
$elem["console-setup/codeset"]["choicesde"][29]=". Kombiniert - Latein\";
$elem["console-setup/codeset"]["choicesfr"][1]="latin\";
$elem["console-setup/codeset"]["description"]="Set of characters that should be supported by the console font:
 If you don't use a framebuffer, the choices that start with \".\" will
 reduce the number of available colors on the console.
";
$elem["console-setup/codeset"]["descriptionde"]="Zeichensatz, der von der Konsolenschriftart unterstützt werden soll:
 Falls Sie keinen Framebuffer verwenden, werden die Auswahlen, die mit einem Punkt (».«) anfangen, die Anzahl der verfügbaren Farben auf der Konsole reduzieren.
";
$elem["console-setup/codeset"]["descriptionfr"]="Jeu de caractères devant être pris en charge par la police de la console :
 Si vous n'utilisez pas le tampon vidéo (« framebuffer »), les choix qui commencent par un point réduiront le nombre de couleurs disponibles pour la console.
";
$elem["console-setup/codeset"]["default"]=". Combined - Latin; Slavic Cyrillic; Hebrew; basic Arabic";
$elem["console-setup/model"]["type"]="select";
$elem["console-setup/model"]["description"]="Keyboard model:
";
$elem["console-setup/model"]["descriptionde"]="Tastaturmodell:
";
$elem["console-setup/model"]["descriptionfr"]="Modèle du clavier :
";
$elem["console-setup/model"]["default"]="";
$elem["console-setup/layout"]["type"]="select";
$elem["console-setup/layout"]["description"]="Origin of the keyboard:
";
$elem["console-setup/layout"]["descriptionde"]="Herkunft der Tastatur:
";
$elem["console-setup/layout"]["descriptionfr"]="Origine du clavier :
";
$elem["console-setup/layout"]["default"]="U.S. English";
$elem["console-setup/variant"]["type"]="select";
$elem["console-setup/variant"]["description"]="Keyboard layout:
 There is more than one keyboard layout with the origin you selected.
 Please select the layout matching your keyboard.
";
$elem["console-setup/variant"]["descriptionde"]="Tastenbelegung:
 Es gibt mehr als eine mögliche Tastenbelegung für das Herkunftsland, das Sie ausgewählt haben. Bitte wählen Sie die zu Ihrer Tastatur passende Belegung.
";
$elem["console-setup/variant"]["descriptionfr"]="Disposition du clavier :
 Plusieurs dispositions de clavier correspondant à l'origine choisie. Veuillez choisir celle qui correspond à votre clavier.
";
$elem["console-setup/variant"]["default"]="";
$elem["console-setup/dont_ask_layout"]["type"]="error";
$elem["console-setup/dont_ask_layout"]["description"]="Unsupported settings in configuration file
 The configuration file /etc/default/console-setup specifies a keyboard
 layout and variant that are not supported by the configuration
 program.  Because of that, no questions about the keyboard layout will
 be asked and your current configuration will be preserved.
";
$elem["console-setup/dont_ask_layout"]["descriptionde"]="Nicht unterstützte Einstellungen in der Konfigurationsdatei
 Die Konfigurationsdatei /etc/default/console-setup spezifiziert eine Tastaturbelegung und -variante, die von dem Konfigurationsprogramm nicht unterstützt wird. Deshalb werden keine Fragen über die Tastaturbelegung gestellt und Ihre gegenwärtige Konfiguration wird erhalten.
";
$elem["console-setup/dont_ask_layout"]["descriptionfr"]="Paramètres non gérés dans le fichier de configuration
 Le fichier de configuration /etc/default/console-setup spécifie une disposition et une variante du clavier qui ne sont pas gérées par le programme de configuration. Pour cette raison, aucune information ne vous sera demandée concernant la disposition des touches de votre clavier et le configuration actuelle sera conservée.
";
$elem["console-setup/dont_ask_layout"]["default"]="";
$elem["console-setup/fontface"]["type"]="select";
$elem["console-setup/fontface"]["description"]="Font for the console:
 Please choose the font face you would like to use on Linux console.
 .
  - VGA has a traditional appearance and has medium coverage
    of international scripts;
  - Fixed has a simplistic appearance and has better coverage
    of international scripts;
  - Terminus is aimed to reduce eye fatigue, though some symbols
    have a similar aspect which may be a problem for programmers.
 .
 If you prefer a bold version of the Terminus font, then choose
 TerminusBold if you use a framebuffer, otherwise TerminusBoldVGA.
";
$elem["console-setup/fontface"]["descriptionde"]="Schriftart für die Konsole:
 Bitte wählen Sie die Schriftart, die Sie auf der Linux-Konsole verwenden möchten.
 .
  - VGA sieht traditionell aus und hat eine mittlere Abdeckung
    von internationalen Schriften;
  - Fixed hat ein einfaches Aussehen und eine bessere Abdeckung
    von internationalen Schriften;
  - Terminus ist darauf gerichtet, die Ermüdung der Augen zu
    reduzieren. Manche Symbole haben ein ähnliches Aussehen,
    was ein Problem für Programmierer sein kann.
 .
 Falls Sie von Terminus die fette Variante vorziehen und keinen Framebuffer verwenden, dann wählen Sie TerminusBoldVGA. Falls Sie Framebuffer verwenden, wählen Sie TerminusBold.
";
$elem["console-setup/fontface"]["descriptionfr"]="Police de caractères pour la console :
 Veuillez indiquer le type de police que vous désirez utiliser pour la console Linux en mode texte.
 .
  - « VGA » correspond à l'apparence traditionnelle, elle possède
    une couverture moyenne des scripts internationaux.
  - « Fixed » a un aspect simplifié et une meilleure couverture des
    scripts internationaux.
  - « Terminus » a pour but de limiter la fatigue oculaire. Cependant
    certains symboles peuvent apparaître presque semblables, ce qui peut
    représenter un problème pour les programmeurs.
 .
 Si vous préférez la version grasse de la police Terminus et que vous n'utilisez pas le tampon vidéo (« framebuffer »), choisissez alors TerminusBoldVGA. Si vous utilisez le tampon vidéo, utilisez alors TerminusBold.
";
$elem["console-setup/fontface"]["default"]="Fixed";
$elem["console-setup/fontsize-text"]["type"]="select";
$elem["console-setup/fontsize-text"]["description"]="Font size:
 Please select the size of the font for the Linux console.  For
 reference, the font your computer starts with has size 16.
";
$elem["console-setup/fontsize-text"]["descriptionde"]="Schriftgröße:
 Bitte wählen Sie die Größe der Schriftart für die Linux-Konsole. Zum Vergleich - die Schriftart, mit der Ihr Rechner startet, hat die Größe 16.
";
$elem["console-setup/fontsize-text"]["descriptionfr"]="Taille de la police :
 Veuillez choisir la taille de la police pour la console Linux. Comme référence, la taille de la police au démarrage du système est de 16.
";
$elem["console-setup/fontsize-text"]["default"]="16";
$elem["console-setup/fontsize-fb"]["type"]="select";
$elem["console-setup/fontsize-fb"]["description"]="Font size:
 Please select the size of the font for the Linux console.  When the
 size is represented as a plain number then the corresponding font can
 be used with all console drivers and the number measures the height
 of the symbols (in number of scan lines).  Otherwise the size has the
 format HEIGHTxWIDTH and the corresponding fonts can be used only if
 you use framebuffer and the kbd console package (console-tools
 doesn't work for such fonts).  Currently these fonts cannot be used
 if the framebuffer you use is based on the RadeonFB kernel module.
 .
 You can use the height of the fonts in order to figure out the real
 size of the symbols on the console.  For reference, the font your
 computer starts with has height 16.
";
$elem["console-setup/fontsize-fb"]["descriptionde"]="Schriftgröße:
 Bitte wählen Sie die Größe der Schriftart für die Linux-Konsole. Wenn die Größe als einfache Zahl angegeben wird, dann kann die entsprechende Schriftart mit allen Konsolentreibern genutzt werden. Die Zahl misst die Höhe der Symbole (in Bildschirmzeilen). Anderenfalls hat die Größe das Format HÖHExBREITE und die entsprechenden Schriftarten können nur genutzt werden, falls Sie Framebuffer und das kbd-console-Paket verwenden (console-tools funktioniert nicht mit solchen Schriftarten). Gegenwärtig können diese Schriftarten nicht genutzt werden, falls der Framebuffer, den Sie verwenden, auf dem RadeonFB-Kernelmodul basiert.
 .
 Sie können die Höhe der Schriftart dazu verwenden, die wirkliche Größe der Symbole auf der Konsole zu ermitteln. Als Vergleich - die Schriftart, mit der Ihr Rechner startet, hat die Höhe 16.
";
$elem["console-setup/fontsize-fb"]["descriptionfr"]="Taille de la police :
 Veuillez choisir la taille de la police de la console Linux. Lorsque la taille est représentée par un nombre entier, la police correspondante peut être utilisée avec tous les pilotes de console et les nombres indiquent la hauteur des symboles (en nombre de lignes de balayage). Sinon, la taille est dans le format HAUTEURxLARGEUR et les polices correspondantes ne peuvent être utilisées que si vous utilisez le tampon vidéo (« framebuffer ») et le paquet « kbd » (« console-tools » ne fonctionne pas avec ce type de police). Actuellement, ces polices ne peuvent pas être utilisées si votre tampon vidéo est basé sur le module du noyau RadeonFB.
 .
 La hauteur des polices peut vous aider à avoir une idée de la taille réelle des symboles sur la console. Comme référence, la police avec laquelle votre ordinateur démarre a une hauteur de 16.
";
$elem["console-setup/fontsize-fb"]["default"]="16";
$elem["console-setup/charmap"]["type"]="select";
$elem["console-setup/charmap"]["description"]="Encoding on the console:
";
$elem["console-setup/charmap"]["descriptionde"]="Kodierung der Konsole:
";
$elem["console-setup/charmap"]["descriptionfr"]="Codage de la console :
";
$elem["console-setup/charmap"]["default"]="UTF-8";
$elem["console-setup/ttys"]["type"]="string";
$elem["console-setup/ttys"]["description"]="Virtual consoles in use:
 Please enter a space-delimited list of virtual consoles you use. The usual
 Unix filename wildcards are allowed (*, ? and [...]).
 .
 If you are unsure, then use the default /dev/tty[1-6] which stands for six
 virtual consoles. If you use devfs, then enter /dev/vc/[1-6] instead.
";
$elem["console-setup/ttys"]["descriptionde"]="Virtuelle Konsolen in Verwendung:
 Bitte geben Sie eine durch Leerzeichen getrennte Liste der virtuellen Konsolen, die Sie verwenden, ein. Die gewöhnlichen Unix-Dateinamen-Platzhalter sind erlaubt (*, ? und [...]).
 .
 Falls Sie sich nicht sicher sind, verwenden Sie die Voreinstellung /dev/tty[1-6]. Das steht für sechs virtuelle Konsolen. Falls Sie devfs verwenden, geben Sie stattdessen /dev/vc/[1-6] ein.
";
$elem["console-setup/ttys"]["descriptionfr"]="Consoles virtuelles utilisées :
 Veuillez entrer une liste, délimitée par des espaces, des consoles virtuelles à utiliser. Les jokers habituels pour les noms de fichier Unix sont autorisés (*, ? et [...]).
 .
 En cas de doute, utilisez la valeur par défaut /dev/tty[1-6] qui permet six consoles virtuelles. Si vous utilisez devfs, entrez alors /dev/vc/[1-6].
";
$elem["console-setup/ttys"]["default"]="/dev/tty[1-6]";
$elem["console-setup/toggle"]["type"]="select";
$elem["console-setup/toggle"]["choices"][1]="Caps Lock";
$elem["console-setup/toggle"]["choices"][2]="Right Alt";
$elem["console-setup/toggle"]["choices"][3]="Right Control";
$elem["console-setup/toggle"]["choices"][4]="Right Shift";
$elem["console-setup/toggle"]["choices"][5]="Right Logo key";
$elem["console-setup/toggle"]["choices"][6]="Menu key";
$elem["console-setup/toggle"]["choices"][7]="Alt+Shift";
$elem["console-setup/toggle"]["choices"][8]="Control+Shift";
$elem["console-setup/toggle"]["choices"][9]="Control+Alt";
$elem["console-setup/toggle"]["choices"][10]="Alt+Caps Lock";
$elem["console-setup/toggle"]["choices"][11]="Left Control+Left Shift";
$elem["console-setup/toggle"]["choices"][12]="Left Alt";
$elem["console-setup/toggle"]["choices"][13]="Left Control";
$elem["console-setup/toggle"]["choices"][14]="Left Shift";
$elem["console-setup/toggle"]["choices"][15]="Left Logo key";
$elem["console-setup/toggle"]["choices"][16]="Scroll Lock key";
$elem["console-setup/toggle"]["choicesde"][1]="Feststelltaste";
$elem["console-setup/toggle"]["choicesde"][2]="Alt rechts (Alt Gr)";
$elem["console-setup/toggle"]["choicesde"][3]="Strg rechts";
$elem["console-setup/toggle"]["choicesde"][4]="Umschalttaste rechts";
$elem["console-setup/toggle"]["choicesde"][5]="Symboltaste rechts";
$elem["console-setup/toggle"]["choicesde"][6]="Menütaste";
$elem["console-setup/toggle"]["choicesde"][7]="Alt+Umschalttaste";
$elem["console-setup/toggle"]["choicesde"][8]="Strg+Umschalttaste";
$elem["console-setup/toggle"]["choicesde"][9]="Strg+Alt";
$elem["console-setup/toggle"]["choicesde"][10]="Alt+Feststelltaste";
$elem["console-setup/toggle"]["choicesde"][11]="Strg links+Umschalttaste links";
$elem["console-setup/toggle"]["choicesde"][12]="Alt links";
$elem["console-setup/toggle"]["choicesde"][13]="Strg links";
$elem["console-setup/toggle"]["choicesde"][14]="Umschalttaste links";
$elem["console-setup/toggle"]["choicesde"][15]="Symboltaste links";
$elem["console-setup/toggle"]["choicesde"][16]="Rollen-Taste";
$elem["console-setup/toggle"]["choicesfr"][1]="Verrouillage Majuscule";
$elem["console-setup/toggle"]["choicesfr"][2]="Touche Alt de droite";
$elem["console-setup/toggle"]["choicesfr"][3]="Touche Ctrl de droite";
$elem["console-setup/toggle"]["choicesfr"][4]="Majuscule de droite";
$elem["console-setup/toggle"]["choicesfr"][5]="Touche « logo » de droite";
$elem["console-setup/toggle"]["choicesfr"][6]="Touche Menu";
$elem["console-setup/toggle"]["choicesfr"][7]="Alt + Majuscule";
$elem["console-setup/toggle"]["choicesfr"][8]="Ctrl + Majuscule";
$elem["console-setup/toggle"]["choicesfr"][9]="Ctrl + Alt";
$elem["console-setup/toggle"]["choicesfr"][10]="Alt + Verrouillage Majuscule";
$elem["console-setup/toggle"]["choicesfr"][11]="Ctrl gauche + Majuscule gauche";
$elem["console-setup/toggle"]["choicesfr"][12]="Touche Alt de gauche";
$elem["console-setup/toggle"]["choicesfr"][13]="Ctrl de gauche";
$elem["console-setup/toggle"]["choicesfr"][14]="Majuscule de gauche";
$elem["console-setup/toggle"]["choicesfr"][15]="Touche « logo » de gauche";
$elem["console-setup/toggle"]["choicesfr"][16]="Arrêt défil. (Scroll Lock)";
$elem["console-setup/toggle"]["description"]="Method for toggling between national and Latin mode:
 You will need a way to toggle the keyboard between the national
 layout and the standard Latin layout.  Several options are available.
 .
 The most ergonomic choices seem to be the right Alt and the Caps Lock keys
 (in the latter case, use the combination Shift+Caps Lock for normal Caps
 toggle).  Another popular choice is the Alt+Shift combination; note
 however that in this case the combination Alt+Shift (or Control+Shift if
 you choose it) will lose its usual meaning in Emacs and other programs
 using it.
 .
 Note that the listed keys are not present on all keyboards.
";
$elem["console-setup/toggle"]["descriptionde"]="Methode zur Umschaltung zwischen nationalem und lateinischem Modus:
 Sie benötigen eine Möglichkeit, die Tastaturbelegung zwischen nationalem und lateinischem Standard-Modus zu wechseln. Mehrere Optionen sind dazu verfügbar.
 .
 Die ergonomischste Wahl scheint entweder die rechte Alt-Taste (Alt Gr) und die Feststelltasten zu sein (im letzteren Fall können Sie die Kombination Umschalttaste+Feststelltaste für die normale Funktion der Feststelltaste verwenden). Eine weitere beliebte Wahl ist die Kombination Alt+Umschalttaste. Bitte beachten Sie aber, dass damit diese Kombination (bzw. Strg+Umschalttaste, falls Sie diese wählen) ihre gewöhnliche Bedeutung verliert, die sie in Emacs und anderen Programmen, die sie benutzen, hat.
 .
 Beachten Sie, dass die gelisteten Tasten nicht auf allen Tastaturen vorhanden sind.
";
$elem["console-setup/toggle"]["descriptionfr"]="Méthode de basculement entre le mode national et le mode latin :
 Il vous faudra un moyen pour basculer entre la disposition nationale et la disposition latine normale. Plusieurs options sont disponibles.
 .
 Les choix les plus ergonomiques semblent être la touche Alt de droite et la touche de verrouillage majuscule (dans ce dernier cas, utilisez la combinaison Majuscule + Verrouillage majuscule pour le basculement habituel en mode majuscule). Un autre choix populaire est la combinaison Alt + Majuscule ; notez cependant que dans ce cas la combinaison Alt + Majuscule (ou Ctrl + Majuscule si vous l'avez choisie) perdra sa fonction habituelle dans Emacs ou dans tout autre programme qui l'utiliserait.
 .
 Veuillez noter que les touches indiquées ne font pas partie de tous les claviers.
";
$elem["console-setup/toggle"]["default"]="Alt+Shift";
$elem["console-setup/switch"]["type"]="select";
$elem["console-setup/switch"]["choices"][1]="No temporary switch";
$elem["console-setup/switch"]["choices"][2]="Both Logo keys";
$elem["console-setup/switch"]["choices"][3]="Right Alt";
$elem["console-setup/switch"]["choices"][4]="Right Logo key";
$elem["console-setup/switch"]["choices"][5]="Left Alt";
$elem["console-setup/switch"]["choicesde"][1]="Kein vorübergehender Wechsel";
$elem["console-setup/switch"]["choicesde"][2]="Beide Symboltasten";
$elem["console-setup/switch"]["choicesde"][3]="Alt rechts (Alt Gr)";
$elem["console-setup/switch"]["choicesde"][4]="Symboltaste rechts";
$elem["console-setup/switch"]["choicesde"][5]="Alt links";
$elem["console-setup/switch"]["choicesfr"][1]="Pas de basculement temporaire";
$elem["console-setup/switch"]["choicesfr"][2]="Les deux touches « logo »";
$elem["console-setup/switch"]["choicesfr"][3]="Touche Alt de droite";
$elem["console-setup/switch"]["choicesfr"][4]="Touche « logo » de droite";
$elem["console-setup/switch"]["choicesfr"][5]="Touche Alt de gauche";
$elem["console-setup/switch"]["description"]="Method for temporarily toggling between national and Latin input:
 Sometimes the keyboard is in national mode and you want to type only a few
 Latin letters. In this case it may be desirable to have a key for
 temporarily switching between national and Latin symbols.  While this key
 is pressed in national mode, the keyboard types Latin letters.  Conversely,
 when the keyboard is in Latin mode and this key is pressed, the keyboard
 will type national letters.
 .
 If you don't like this feature, choose the option \"No temporary switch\".
";
$elem["console-setup/switch"]["descriptionde"]="Methode zum vorübergehenden Wechseln zwischen nationaler und lateinischer Eingabe:
 Gelegentlich ist die Tastatur im nationalen Modus und Sie wollen nur wenige lateinische Zeichen eingeben. In diesem Fall kann es erstrebenswert sein, eine Taste zum vorübergehenden Wechseln zwischen nationalen und lateinischen Symbolen zu haben. Während diese Taste im nationalen Modus gedrückt ist, liefert die Tastatur lateinische Buchstaben, und umgekehrt, wenn sich die Tastatur im lateinischen Modus befindet, und Sie halten diese Taste gedrückt, wird die Tastatur nationale Buchstaben liefern.
 .
 Falls Sie diese Funktion nicht verwenden wollen, wählen Sie »Kein vorübergehender Wechsel«.
";
$elem["console-setup/switch"]["descriptionfr"]="Méthode de basculement temporaire entre caractères nationaux et latins :
 Parfois, le clavier est dans un mode national et il nécessaire de saisir quelques caractères latins. Dans ce cas, il peut être souhaitable d'avoir une touche pour basculer temporairement entre les symboles nationaux et latins. Lorsque cette touche est pressée en mode national, les lettres entrées le sont en latin et, à l'inverse, lorsque le clavier est en mode latin et que vous pressez cette touche, les lettres seront de type national.
 .
 Si vous ne souhaitez pas cette fonctionnalité, choisissez « Pas de basculement temporaire »
";
$elem["console-setup/switch"]["default"]="No temporary switch";
$elem["console-setup/altgr"]["type"]="select";
$elem["console-setup/altgr"]["choices"][1]="No AltGr key";
$elem["console-setup/altgr"]["choices"][2]="Right Alt";
$elem["console-setup/altgr"]["choices"][3]="Right Control";
$elem["console-setup/altgr"]["choices"][4]="Right Logo key";
$elem["console-setup/altgr"]["choices"][5]="Menu key";
$elem["console-setup/altgr"]["choices"][6]="Left Alt";
$elem["console-setup/altgr"]["choices"][7]="Left Logo key";
$elem["console-setup/altgr"]["choices"][8]="Keypad Enter key";
$elem["console-setup/altgr"]["choices"][9]="Both Logo keys";
$elem["console-setup/altgr"]["choicesde"][1]="Keine »Alt Gr«-Taste";
$elem["console-setup/altgr"]["choicesde"][2]="Alt rechts (Alt Gr)";
$elem["console-setup/altgr"]["choicesde"][3]="Strg rechts";
$elem["console-setup/altgr"]["choicesde"][4]="Symboltaste rechts";
$elem["console-setup/altgr"]["choicesde"][5]="Menütaste";
$elem["console-setup/altgr"]["choicesde"][6]="Alt links";
$elem["console-setup/altgr"]["choicesde"][7]="Symboltaste links";
$elem["console-setup/altgr"]["choicesde"][8]="Eingabetaste des numerischen Feldes";
$elem["console-setup/altgr"]["choicesde"][9]="Beide Symboltasten";
$elem["console-setup/altgr"]["choicesfr"][1]="Pas de touche AltGr";
$elem["console-setup/altgr"]["choicesfr"][2]="Touche Alt de droite";
$elem["console-setup/altgr"]["choicesfr"][3]="Touche Ctrl de droite";
$elem["console-setup/altgr"]["choicesfr"][4]="Touche « logo » de droite";
$elem["console-setup/altgr"]["choicesfr"][5]="Touche Menu";
$elem["console-setup/altgr"]["choicesfr"][6]="Touche Alt de gauche";
$elem["console-setup/altgr"]["choicesfr"][7]="Touche « logo » de gauche";
$elem["console-setup/altgr"]["choicesfr"][8]="Entrée (pavé numérique)";
$elem["console-setup/altgr"]["choicesfr"][9]="Les deux touches « logo »";
$elem["console-setup/altgr"]["description"]="AltGr key replacement:
 With some keyboard layouts, AltGr is a modifier key used to input
 some characters, primarily ones that are unusual for the language of the
 keyboard layout, such as foreign currency symbols and accented letters. 
 If a key has a third symbol on it (on the front vertical face or the
 bottom right of the key top, sometimes in a different color), then AltGr
 is often the means of eliciting that symbol.
";
$elem["console-setup/altgr"]["descriptionde"]="»Alt Gr«-Ersatz:
 Bei manchen Tastaturbelegungen ist Alt Gr eine Modifikatortaste, die zur Eingabe einiger Zeichen verwendet wird. Hauptsächlich wird sie für solche Zeichen verwendet, die für die Sprache der Tastatur ungewöhnlich sind, wie ausländische Währungssymbole und akzentuierte Buchstaben. Falls eine Taste ein drittes Symbol trägt (auf der Vorderseite oder unten rechts auf der Oberseite, manchmal in einer anderen Farbe), dann ist Alt Gr oft das Mittel, dieses Symbol zu erzeugen.
";
$elem["console-setup/altgr"]["descriptionfr"]="Touche de remplacement d'AltGr :
 Avec certaines dispositions de claviers, AltGr est une touche de modification utilisée pour entrer de nombreux caractères, principalement ceux qui n'appartiennent pas à la langue correspondant à la disposition du clavier, comme les symboles des devises étrangères et les lettres accentuées. Si une touche comporte un troisième symbole (gravé sur la face verticale ou en bas et à droite de la face supérieure de la touche, parfois d'une couleur différente), alors AltGr est souvent le moyen d'obtenir ce symbole.
";
$elem["console-setup/altgr"]["default"]="Right Alt";
$elem["console-setup/compose"]["type"]="select";
$elem["console-setup/compose"]["choices"][1]="No compose key";
$elem["console-setup/compose"]["choices"][2]="Right Alt";
$elem["console-setup/compose"]["choices"][3]="Right Control";
$elem["console-setup/compose"]["choices"][4]="Right Logo key";
$elem["console-setup/compose"]["choices"][5]="Menu key";
$elem["console-setup/compose"]["choices"][6]="Left Logo key";
$elem["console-setup/compose"]["choicesde"][1]="Keine Compose-Taste";
$elem["console-setup/compose"]["choicesde"][2]="Alt rechts (Alt Gr)";
$elem["console-setup/compose"]["choicesde"][3]="Strg rechts";
$elem["console-setup/compose"]["choicesde"][4]="Symboltaste rechts";
$elem["console-setup/compose"]["choicesde"][5]="Menütaste";
$elem["console-setup/compose"]["choicesde"][6]="Symboltaste links";
$elem["console-setup/compose"]["choicesfr"][1]="Pas de touche « compose »";
$elem["console-setup/compose"]["choicesfr"][2]="Touche Alt de droite";
$elem["console-setup/compose"]["choicesfr"][3]="Touche Ctrl de droite";
$elem["console-setup/compose"]["choicesfr"][4]="Touche « logo » de droite";
$elem["console-setup/compose"]["choicesfr"][5]="Touche Menu";
$elem["console-setup/compose"]["choicesfr"][6]="Touche « logo » de gauche";
$elem["console-setup/compose"]["description"]="Compose key:
 The Compose key (known also as Multi_key) causes the computer to interpret
 the next few keystrokes as a combination in order to produce a character
 not found on the keyboard.
 .
 On the text console the Compose key does not work in Unicode mode. If not
 in Unicode mode, regardless of what you choose here, you can always also
 use the Alt+period combination as a Compose key.
";
$elem["console-setup/compose"]["descriptionde"]="Compose-Taste:
 Die Aufgabe der Compose-Taste (auch als Multi_key bekannt) ist es, dem Computer zu signalisieren, dass die nächsten Tastenanschläge als eine Kombination zu interpretieren sind, die ein Zeichen produziert, welches nicht auf der Tastatur vorhanden ist.
 .
 Auf der Textkonsole funktioniert die Compose-Taste nicht im Unicode-Modus. Falls Sie nicht im Unicode-Modus arbeiten, können Sie immer auch die Kombination Alt+Satzpunkt (.) als Compose-Taste verwenden, unabhängig von Ihrer Auswahl hier.
";
$elem["console-setup/compose"]["descriptionfr"]="Touche « compose » :
 La touche « compose » (encore appelée « touche multi ») sert à indiquer que les touches utilisées ensuite doivent être combinées de façon à produire un caractère qui n'existe pas sur le clavier.
 .
 Sur les consoles en mode texte, la touche « compose » ne fonctionne pas en mode Unicode. Si l'on n'est pas en mode Unicode, indépendemment de ce que vous avez choisi ici, vous pouvez toujours utiliser la combinaison Alt + point comme touche « compose ».
";
$elem["console-setup/compose"]["default"]="No compose key";
$elem["console-setup/modelcode"]["type"]="string";
$elem["console-setup/modelcode"]["description"]="for internal use

";
$elem["console-setup/modelcode"]["descriptionde"]="";
$elem["console-setup/modelcode"]["descriptionfr"]="";
$elem["console-setup/modelcode"]["default"]="";
$elem["console-setup/layoutcode"]["type"]="string";
$elem["console-setup/layoutcode"]["description"]="for internal use

";
$elem["console-setup/layoutcode"]["descriptionde"]="";
$elem["console-setup/layoutcode"]["descriptionfr"]="";
$elem["console-setup/layoutcode"]["default"]="";
$elem["console-setup/variantcode"]["type"]="string";
$elem["console-setup/variantcode"]["description"]="for internal use

";
$elem["console-setup/variantcode"]["descriptionde"]="";
$elem["console-setup/variantcode"]["descriptionfr"]="";
$elem["console-setup/variantcode"]["default"]="";
$elem["console-setup/optionscode"]["type"]="string";
$elem["console-setup/optionscode"]["description"]="for internal use

";
$elem["console-setup/optionscode"]["descriptionde"]="";
$elem["console-setup/optionscode"]["descriptionfr"]="";
$elem["console-setup/optionscode"]["default"]="";
$elem["console-setup/fontsize"]["type"]="string";
$elem["console-setup/fontsize"]["description"]="for internal use

";
$elem["console-setup/fontsize"]["descriptionde"]="";
$elem["console-setup/fontsize"]["descriptionfr"]="";
$elem["console-setup/fontsize"]["default"]="";
$elem["console-setup/codesetcode"]["type"]="string";
$elem["console-setup/codesetcode"]["description"]="for internal use

";
$elem["console-setup/codesetcode"]["descriptionde"]="";
$elem["console-setup/codesetcode"]["descriptionfr"]="";
$elem["console-setup/codesetcode"]["default"]="";
PKG_OptionPageTail2($elem);
?>
