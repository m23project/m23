<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("keyboard-configuration");

$elem["debian-installer/console-setup-udeb/title"]["type"]="text";
$elem["debian-installer/console-setup-udeb/title"]["description"]="Configure the keyboard
";
$elem["debian-installer/console-setup-udeb/title"]["descriptionde"]="Tastatur konfigurieren
";
$elem["debian-installer/console-setup-udeb/title"]["descriptionfr"]="Configurer le clavier
";
$elem["debian-installer/console-setup-udeb/title"]["default"]="";
$elem["keyboard-configuration/other"]["type"]="text";
$elem["keyboard-configuration/other"]["description"]="Other
";
$elem["keyboard-configuration/other"]["descriptionde"]="Andere
";
$elem["keyboard-configuration/other"]["descriptionfr"]="Autre
";
$elem["keyboard-configuration/other"]["default"]="";
$elem["keyboard-configuration/model"]["type"]="select";
$elem["keyboard-configuration/model"]["description"]="Keyboard model:
 Please select the model of the keyboard of this machine.
";
$elem["keyboard-configuration/model"]["descriptionde"]="Tastaturmodell:
 Wählen Sie bitte das Modell der Tastatur dieses Rechners.
";
$elem["keyboard-configuration/model"]["descriptionfr"]="Modèle du clavier :
 Veuillez choisir le modèle du clavier de cette machine.
";
$elem["keyboard-configuration/model"]["default"]="";
$elem["keyboard-configuration/layout"]["type"]="select";
$elem["keyboard-configuration/layout"]["description"]="Country of origin for the keyboard:
 The layout of keyboards varies per country, with some countries
 having multiple common layouts. Please select the country of origin
 for the keyboard of this computer.
";
$elem["keyboard-configuration/layout"]["descriptionde"]="Herkunftsland für die Tastatur:
 Die Belegung von Tastaturen unterscheidet sich abhängig vom Land, wobei für einige Länder sogar mehrere gängige Belegungen existieren. Bitte wählen Sie das Land, zu dem die Tastaturbelegung gehört.
";
$elem["keyboard-configuration/layout"]["descriptionfr"]="Pays d'origine du clavier :
 La disposition des claviers varie selon les pays. Dans certains pays, il peut même exister plusieurs dispositions possibles. Veuillez choisir le pays d'origine du clavier de cette machine.
";
$elem["keyboard-configuration/layout"]["default"]="";
$elem["keyboard-configuration/variant"]["type"]="select";
$elem["keyboard-configuration/variant"]["description"]="Keyboard layout:
 Please select the layout matching the keyboard for this machine.
";
$elem["keyboard-configuration/variant"]["descriptionde"]="Tastaturbelegung:
 Bitte wählen Sie eine Tastaturbelegung, die zur Tastatur dieses Rechners passt.
";
$elem["keyboard-configuration/variant"]["descriptionfr"]="Disposition du clavier :
 Veuillez choisir la disposition qui correspond au clavier de cette machine.
";
$elem["keyboard-configuration/variant"]["default"]="";
$elem["keyboard-configuration/unsupported_config_layout"]["type"]="boolean";
$elem["keyboard-configuration/unsupported_config_layout"]["description"]="Keep the current keyboard layout in the configuration file?
 The current keyboard layout in the configuration file
 /etc/default/keyboard is defined as XKBLAYOUT=\"${XKBLAYOUT}\" and
 XKBVARIANT=\"${XKBVARIANT}\".
 .
 Please choose whether you want to keep it. If you choose this option,
 no questions about the keyboard layout will be asked and the current
 configuration will be preserved.
";
$elem["keyboard-configuration/unsupported_config_layout"]["descriptionde"]="Aktuelle Tastaturbelegung in der Konfigurationsdatei beibehalten?
 Die aktuelle Tastaturbelegung in der Konfigurationsdatei /etc/default/keyboard ist als XKBLAYOUT=»${XKBLAYOUT}« und XKBVARIANT=»${XKBVARIANT}« definiert.
 .
 Bitte wählen Sie aus, ob Sie diese beibehalten möchten. Wenn Sie sich dafür entscheiden, werden keine weiteren Fragen über die Tastaturbelegung gestellt und die gegenwärtige Konfiguration wird beibehalten.
";
$elem["keyboard-configuration/unsupported_config_layout"]["descriptionfr"]="Conserver cette disposition de clavier dans le fichier de configuration ?
 La disposition du clavier dans le fichier de configuration /etc/default/keyboard est actuellement définie par XKBLAYOUT=\"${XKBLAYOUT}\" et XKBVARIANT=\"${XKBVARIANT}\".
 .
 Veuillez choisir si vous souhaitez la conserver. Si vous choisissez cette option, aucune information ne vous sera demandée concernant la disposition des touches du clavier et la configuration actuelle sera conservée.
";
$elem["keyboard-configuration/unsupported_config_layout"]["default"]="true";
$elem["keyboard-configuration/unsupported_layout"]["type"]="boolean";
$elem["keyboard-configuration/unsupported_layout"]["description"]="Keep default keyboard layout (${XKBLAYOUTVARIANT})?
 The default value for the keyboard layout is XKBLAYOUT=\"${XKBLAYOUT}\"
 and XKBVARIANT=\"${XKBVARIANT}\".  This default value is based on the
 currently defined language/region and the settings in
 /etc/X11/xorg.conf.
 .
 Please choose whether you want to keep it. If you choose this option,
 no questions about the keyboard layout will be asked.
";
$elem["keyboard-configuration/unsupported_layout"]["descriptionde"]="Voreingestellte Tastaturbelegung (${XKBLAYOUTVARIANT}) beibehalten?
 Der voreingestellte Wert für die Tastaturbelegung ist XKBLAYOUT=»${XKBLAYOUT}« und XKBVARIANT=»${XKBVARIANT}«. Dieser Standardwert basiert auf dem derzeit definierten Wert für Sprache/Region und den Einstellungen in /etc/X11/xorg.conf.
 .
 Bitte wählen Sie aus, ob Sie diesen beibehalten möchten. Wenn Sie sich dafür entscheiden, werden keine weiteren Fragen über die Tastaturbelegung gestellt.
";
$elem["keyboard-configuration/unsupported_layout"]["descriptionfr"]="Conserver la disposition clavier par défaut (${XKBLAYOUTVARIANT}) ?
 La valeur par défaut de la disposition clavier est XKBLAYOUT=\"${XKBLAYOUT}\" et XKBVARIANT=\"${XKBVARIANT}\". La valeur par défaut est basée sur la langue et la région choisies et les réglages de /etc/X11/xorg.conf.
 .
 Veuillez choisir si vous souhaitez la conserver. Si vous choisissez cette option, aucune information ne vous sera demandée concernant la disposition des touches du clavier.
";
$elem["keyboard-configuration/unsupported_layout"]["default"]="true";
$elem["keyboard-configuration/unsupported_config_options"]["type"]="boolean";
$elem["keyboard-configuration/unsupported_config_options"]["description"]="Keep current keyboard options in the configuration file?
 The current keyboard options in the configuration file
 /etc/default/keyboard are defined as XKBOPTIONS=\"${XKBOPTIONS}\".
 .
 If you choose to keep these options, no questions about the keyboard
 options will be asked.
";
$elem["keyboard-configuration/unsupported_config_options"]["descriptionde"]="Aktuelle Optionen der Tastaturbelegung in der Konfigurationsdatei behalten?
 Die aktuellen Optionen der Tastaturbelegung in der Konfigurationsdatei /etc/default/keyboard sind als XKBOPTIONS=»${XKBOPTIONS}« definiert.
 .
 Wenn Sie sich dafür entscheiden, diese Optionen beizubehalten, werden keine weiteren Fragen über die Optionen der Tastaturbelegung gestellt.
";
$elem["keyboard-configuration/unsupported_config_options"]["descriptionfr"]="Conserver les options actuelles pour le clavier dans le fichier de configuration ?
 Les options actuelles pour le clavier dans le fichier de configuration /etc/default/keyboard sont XKBOPTIONS=\"${XKBOPTIONS}\".
 .
 Si vous choisissez de les conserver, plus aucune question relative aux options du clavier ne sera posée.
";
$elem["keyboard-configuration/unsupported_config_options"]["default"]="true";
$elem["keyboard-configuration/unsupported_options"]["type"]="boolean";
$elem["keyboard-configuration/unsupported_options"]["description"]="Keep default keyboard options (${XKBOPTIONS})?
 The default value for the options of the keyboard layout is
 XKBOPTIONS=\"${XKBOPTIONS}\".  It is based on the currently defined
 language/region and the settings in /etc/X11/xorg.conf.
 .
 If you choose to keep it, no questions about the keyboard options
 will be asked.
";
$elem["keyboard-configuration/unsupported_options"]["descriptionde"]="Voreingestellte Optionen der Tastaturbelegung (${XKBOPTIONS}) beibehalten?
 Der voreingestellte Wert für die Optionen der Tastaturbelegung ist XKBOPTIONS=»${XKBOPTIONS}«. Er basiert auf dem derzeit definierten Wert für Sprache/Region und den Einstellungen in /etc/X11/xorg.conf.
 .
 Wenn Sie sich dafür entscheiden, diese Optionen beizubehalten, werden keine weiteren Fragen über die Optionen der Tastaturbelegung gestellt.
";
$elem["keyboard-configuration/unsupported_options"]["descriptionfr"]="Conserver les options par défaut du clavier (${XKBOPTIONS}) ?
 La valeur par défaut des options de la disposition clavier est XKBOPTIONS=\"${XKBOPTIONS}\". Elle est basée sur la langue et la région choisies et les réglages de /etc/X11/xorg.conf.
 .
 Si vous choisissez de la conserver, plus aucune question relative aux options du clavier ne sera posée.
";
$elem["keyboard-configuration/unsupported_options"]["default"]="true";
$elem["keyboard-configuration/toggle"]["type"]="select";
$elem["keyboard-configuration/toggle"]["choices"][1]="Caps Lock";
$elem["keyboard-configuration/toggle"]["choices"][2]="Right Alt (AltGr)";
$elem["keyboard-configuration/toggle"]["choices"][3]="Right Control";
$elem["keyboard-configuration/toggle"]["choices"][4]="Right Shift";
$elem["keyboard-configuration/toggle"]["choices"][5]="Right Logo key";
$elem["keyboard-configuration/toggle"]["choices"][6]="Menu key";
$elem["keyboard-configuration/toggle"]["choices"][7]="Alt+Shift";
$elem["keyboard-configuration/toggle"]["choices"][8]="Control+Shift";
$elem["keyboard-configuration/toggle"]["choices"][9]="Control+Alt";
$elem["keyboard-configuration/toggle"]["choices"][10]="Alt+Caps Lock";
$elem["keyboard-configuration/toggle"]["choices"][11]="Left Control+Left Shift";
$elem["keyboard-configuration/toggle"]["choices"][12]="Left Alt";
$elem["keyboard-configuration/toggle"]["choices"][13]="Left Control";
$elem["keyboard-configuration/toggle"]["choices"][14]="Left Shift";
$elem["keyboard-configuration/toggle"]["choices"][15]="Left Logo key";
$elem["keyboard-configuration/toggle"]["choices"][16]="Scroll Lock key";
$elem["keyboard-configuration/toggle"]["choicesde"][1]="Feststelltaste";
$elem["keyboard-configuration/toggle"]["choicesde"][2]="Alt rechts (AltGr)";
$elem["keyboard-configuration/toggle"]["choicesde"][3]="Strg rechts";
$elem["keyboard-configuration/toggle"]["choicesde"][4]="Umschalttaste rechts";
$elem["keyboard-configuration/toggle"]["choicesde"][5]="Windows-Taste rechts";
$elem["keyboard-configuration/toggle"]["choicesde"][6]="Menütaste";
$elem["keyboard-configuration/toggle"]["choicesde"][7]="Alt+Umschalttaste";
$elem["keyboard-configuration/toggle"]["choicesde"][8]="Strg+Umschalttaste";
$elem["keyboard-configuration/toggle"]["choicesde"][9]="Strg+Alt";
$elem["keyboard-configuration/toggle"]["choicesde"][10]="Alt+Feststelltaste";
$elem["keyboard-configuration/toggle"]["choicesde"][11]="Strg links+Umschalttaste links";
$elem["keyboard-configuration/toggle"]["choicesde"][12]="Alt links";
$elem["keyboard-configuration/toggle"]["choicesde"][13]="Strg links";
$elem["keyboard-configuration/toggle"]["choicesde"][14]="Umschalttaste links";
$elem["keyboard-configuration/toggle"]["choicesde"][15]="Windows-Taste links";
$elem["keyboard-configuration/toggle"]["choicesde"][16]="Rollen-Taste";
$elem["keyboard-configuration/toggle"]["choicesfr"][1]="Verrouillage Majuscule";
$elem["keyboard-configuration/toggle"]["choicesfr"][2]="Touche Alt de droite (AltGr)";
$elem["keyboard-configuration/toggle"]["choicesfr"][3]="Touche Ctrl de droite";
$elem["keyboard-configuration/toggle"]["choicesfr"][4]="Majuscule de droite";
$elem["keyboard-configuration/toggle"]["choicesfr"][5]="Touche « logo » de droite";
$elem["keyboard-configuration/toggle"]["choicesfr"][6]="Touche Menu";
$elem["keyboard-configuration/toggle"]["choicesfr"][7]="Alt + Majuscule";
$elem["keyboard-configuration/toggle"]["choicesfr"][8]="Ctrl + Majuscule";
$elem["keyboard-configuration/toggle"]["choicesfr"][9]="Ctrl + Alt";
$elem["keyboard-configuration/toggle"]["choicesfr"][10]="Alt + Verrouillage Majuscule";
$elem["keyboard-configuration/toggle"]["choicesfr"][11]="Ctrl gauche + Majuscule gauche";
$elem["keyboard-configuration/toggle"]["choicesfr"][12]="Touche Alt de gauche";
$elem["keyboard-configuration/toggle"]["choicesfr"][13]="Ctrl de gauche";
$elem["keyboard-configuration/toggle"]["choicesfr"][14]="Majuscule de gauche";
$elem["keyboard-configuration/toggle"]["choicesfr"][15]="Touche « logo » de gauche";
$elem["keyboard-configuration/toggle"]["choicesfr"][16]="Arrêt défil. (Scroll Lock)";
$elem["keyboard-configuration/toggle"]["description"]="Method for toggling between national and Latin mode:
 You will need a way to toggle the keyboard between the national
 layout and the standard Latin layout.
 .
 Right Alt or Caps Lock keys are often chosen for ergonomic reasons
 (in the latter case, use the combination Shift+Caps Lock for normal Caps
 toggle). Alt+Shift is also a popular combination; it will
 however lose its usual behavior in Emacs and other programs
 that use it for specific needs.
 .
 Not all listed keys are present on all keyboards.
";
$elem["keyboard-configuration/toggle"]["descriptionde"]="Methode zur Umschaltung zwischen nationalem und lateinischem Modus:
 Sie benötigen eine Möglichkeit, die Tastaturbelegung zwischen nationalem und lateinischem Standardmodus umzuschalten.
 .
 Aus Ergonomiegründen werden oft die Alt- oder Feststelltasten ausgewählt. Im letzteren Fall verwenden Sie die Kombination Umschalttaste+Feststelltaste für das normale Umschalten der Großschreibung. Alt+Umschalttaste ist auch eine beliebte Kombination; in Emacs und anderen Programmen, die diese Kombination benutzen, wird sie allerdings ihre gewöhnliche Bedeutung verlieren.
 .
 Nicht alle aufgeführten Tasten sind auf allen Tastaturen vorhanden.
";
$elem["keyboard-configuration/toggle"]["descriptionfr"]="Méthode de basculement entre le mode national et le mode latin :
 Il est nécessaire de disposer d'un moyen pour basculer entre la disposition nationale et la disposition latine normale.
 .
 Les choix les plus ergonomiques semblent être la touche Alt de droite et la touche de verrouillage majuscule (dans ce dernier cas, utilisez la combinaison Majuscule + Verrouillage majuscule pour le basculement habituel en mode majuscule). Un autre choix populaire est la combinaison Alt + Majuscule. Cependant, dans ce cas, elle perdra sa fonction habituelle dans Emacs ou dans tout autre programme qui l'utiliserait pour un besoin spécifique.
 .
 Les touches indiquées ne font pas partie de tous les claviers.
";
$elem["keyboard-configuration/toggle"]["default"]="Alt+Shift";
$elem["keyboard-configuration/switch"]["type"]="select";
$elem["keyboard-configuration/switch"]["choices"][1]="No temporary switch";
$elem["keyboard-configuration/switch"]["choices"][2]="Both Logo keys";
$elem["keyboard-configuration/switch"]["choices"][3]="Right Alt (AltGr)";
$elem["keyboard-configuration/switch"]["choices"][4]="Right Logo key";
$elem["keyboard-configuration/switch"]["choices"][5]="Left Alt";
$elem["keyboard-configuration/switch"]["choicesde"][1]="Kein vorübergehender Wechsel";
$elem["keyboard-configuration/switch"]["choicesde"][2]="Beide Windows-Tasten";
$elem["keyboard-configuration/switch"]["choicesde"][3]="Alt rechts (AltGr)";
$elem["keyboard-configuration/switch"]["choicesde"][4]="Windows-Taste rechts";
$elem["keyboard-configuration/switch"]["choicesde"][5]="Alt links";
$elem["keyboard-configuration/switch"]["choicesfr"][1]="Pas de basculement temporaire";
$elem["keyboard-configuration/switch"]["choicesfr"][2]="Les deux touches « logo »";
$elem["keyboard-configuration/switch"]["choicesfr"][3]="Touche Alt de droite (AltGr)";
$elem["keyboard-configuration/switch"]["choicesfr"][4]="Touche « logo » de droite";
$elem["keyboard-configuration/switch"]["choicesfr"][5]="Touche Alt de gauche";
$elem["keyboard-configuration/switch"]["description"]="Method for temporarily toggling between national and Latin input:
 When the keyboard is in national mode and one wants to type only a few
 Latin letters, it might be more appropriate to switch temporarily to
 Latin mode. The keyboard remains in that mode as long as the chosen key is
 kept pressed. That key may also be used to input national letters when
 the keyboard is in Latin mode.
 .
 You can disable this feature by choosing \"No temporary switch\".
";
$elem["keyboard-configuration/switch"]["descriptionde"]="Methode zum vorübergehenden Wechseln zwischen nationaler und lateinischer Eingabe:
 Wenn sich die Tastatur im nationalen Modus befindet und nur wenige lateinische Zeichen eingeben werden sollen, könnte es angemessener sein, vorübergehend auf den lateinischen Modus zu wechseln. Die Tastatur verbleibt in diesem Modus, solange die ausgewählte Taste gedrückt bleibt. Diese Taste kann auch dazu verwandt werden, nationale Zeichen einzugeben, wenn die Tastatur sich im lateinischen Modus befindet.
 .
 Sie können diese Funktion deaktivieren, indem Sie »Kein vorübergehender Wechsel« auswählen.
";
$elem["keyboard-configuration/switch"]["descriptionfr"]="Méthode de basculement temporaire entre caractères nationaux et latins :
 Lorsque le clavier est dans un mode national et qu'il nécessaire de saisir quelques caractères latins, il peut être souhaitable d'avoir une touche pour basculer temporairement vers le mode latin. Le clavier reste dans ce mode tant que cette touche reste appuyée. À l'inverse, cette touche peut également servir à basculer en mode national lorsque le clavier est en mode latin.
 .
 Cette fonctionnalité peut être désactivée en choisissant « Pas de basculement temporaire ».
";
$elem["keyboard-configuration/switch"]["default"]="No temporary switch";
$elem["keyboard-configuration/altgr"]["type"]="select";
$elem["keyboard-configuration/altgr"]["choices"][1]="The default for the keyboard layout";
$elem["keyboard-configuration/altgr"]["choices"][2]="No AltGr key";
$elem["keyboard-configuration/altgr"]["choices"][3]="Right Alt (AltGr)";
$elem["keyboard-configuration/altgr"]["choices"][4]="Right Control";
$elem["keyboard-configuration/altgr"]["choices"][5]="Right Logo key";
$elem["keyboard-configuration/altgr"]["choices"][6]="Menu key";
$elem["keyboard-configuration/altgr"]["choices"][7]="Left Alt";
$elem["keyboard-configuration/altgr"]["choices"][8]="Left Logo key";
$elem["keyboard-configuration/altgr"]["choices"][9]="Keypad Enter key";
$elem["keyboard-configuration/altgr"]["choices"][10]="Both Logo keys";
$elem["keyboard-configuration/altgr"]["choicesde"][1]="Der Standard für die Tastenbelegung";
$elem["keyboard-configuration/altgr"]["choicesde"][2]="Keine AltGr-Taste";
$elem["keyboard-configuration/altgr"]["choicesde"][3]="Alt rechts (AltGr)";
$elem["keyboard-configuration/altgr"]["choicesde"][4]="Strg rechts";
$elem["keyboard-configuration/altgr"]["choicesde"][5]="Windows-Taste rechts";
$elem["keyboard-configuration/altgr"]["choicesde"][6]="Menütaste";
$elem["keyboard-configuration/altgr"]["choicesde"][7]="Alt links";
$elem["keyboard-configuration/altgr"]["choicesde"][8]="Windows-Taste links";
$elem["keyboard-configuration/altgr"]["choicesde"][9]="Eingabetaste des numerischen Feldes";
$elem["keyboard-configuration/altgr"]["choicesde"][10]="Beide Windows-Tasten";
$elem["keyboard-configuration/altgr"]["choicesfr"][1]="Disposition par défaut pour le clavier";
$elem["keyboard-configuration/altgr"]["choicesfr"][2]="Pas de touche AltGr";
$elem["keyboard-configuration/altgr"]["choicesfr"][3]="Touche Alt de droite (AltGr)";
$elem["keyboard-configuration/altgr"]["choicesfr"][4]="Touche Ctrl de droite";
$elem["keyboard-configuration/altgr"]["choicesfr"][5]="Touche « logo » de droite";
$elem["keyboard-configuration/altgr"]["choicesfr"][6]="Touche Menu";
$elem["keyboard-configuration/altgr"]["choicesfr"][7]="Touche Alt de gauche";
$elem["keyboard-configuration/altgr"]["choicesfr"][8]="Touche « logo » de gauche";
$elem["keyboard-configuration/altgr"]["choicesfr"][9]="Entrée (pavé numérique)";
$elem["keyboard-configuration/altgr"]["choicesfr"][10]="Les deux touches « logo »";
$elem["keyboard-configuration/altgr"]["description"]="Key to function as AltGr:
 With some keyboard layouts, AltGr is a modifier key used to input
 some characters, primarily ones that are unusual for the language of the
 keyboard layout, such as foreign currency symbols and accented letters.
 These are often printed as an extra symbol on keys.
";
$elem["keyboard-configuration/altgr"]["descriptionde"]="Taste, die als AltGr fungieren soll:
 Bei manchen Tastaturbelegungen ist AltGr eine Modifikatortaste, die zur Eingabe einiger Zeichen verwendet wird. Hauptsächlich wird sie für solche Zeichen verwendet, die für die Sprache der Tastatur ungewöhnlich sind, wie ausländische Währungssymbole und akzentuierte Buchstaben. Diese werden oft als Extrasymbol auf die Tasten gedruckt.
";
$elem["keyboard-configuration/altgr"]["descriptionfr"]="Touche destinée à se substituer à AltGr :
 Avec certaines dispositions de claviers, AltGr est une touche de modification utilisée pour entrer de nombreux caractères, principalement ceux qui n'appartiennent pas à la langue correspondant à la disposition du clavier, comme les symboles des devises étrangères et les lettres accentuées. Ces caractères sont généralement indiqués sous forme de symboles supplémentaires sur les touches.
";
$elem["keyboard-configuration/altgr"]["default"]="Right Alt (AltGr)";
$elem["keyboard-configuration/compose"]["type"]="select";
$elem["keyboard-configuration/compose"]["choices"][1]="No compose key";
$elem["keyboard-configuration/compose"]["choices"][2]="Right Alt (AltGr)";
$elem["keyboard-configuration/compose"]["choices"][3]="Right Control";
$elem["keyboard-configuration/compose"]["choices"][4]="Right Logo key";
$elem["keyboard-configuration/compose"]["choices"][5]="Menu key";
$elem["keyboard-configuration/compose"]["choices"][6]="Left Logo key";
$elem["keyboard-configuration/compose"]["choicesde"][1]="Keine Compose-Taste";
$elem["keyboard-configuration/compose"]["choicesde"][2]="Alt rechts (AltGr)";
$elem["keyboard-configuration/compose"]["choicesde"][3]="Strg rechts";
$elem["keyboard-configuration/compose"]["choicesde"][4]="Windows-Taste rechts";
$elem["keyboard-configuration/compose"]["choicesde"][5]="Menütaste";
$elem["keyboard-configuration/compose"]["choicesde"][6]="Windows-Taste links";
$elem["keyboard-configuration/compose"]["choicesfr"][1]="Pas de touche « compose »";
$elem["keyboard-configuration/compose"]["choicesfr"][2]="Touche Alt de droite (AltGr)";
$elem["keyboard-configuration/compose"]["choicesfr"][3]="Touche Ctrl de droite";
$elem["keyboard-configuration/compose"]["choicesfr"][4]="Touche « logo » de droite";
$elem["keyboard-configuration/compose"]["choicesfr"][5]="Touche Menu";
$elem["keyboard-configuration/compose"]["choicesfr"][6]="Touche « logo » de gauche";
$elem["keyboard-configuration/compose"]["description"]="Compose key:
 The Compose key (known also as Multi_key) causes the computer to interpret
 the next few keystrokes as a combination in order to produce a character
 not found on the keyboard.
 .
 On the text console the Compose key does not work in Unicode mode. If not
 in Unicode mode, regardless of what you choose here, you can always also
 use the Control+period combination as a Compose key.
";
$elem["keyboard-configuration/compose"]["descriptionde"]="Compose-Taste:
 Durch das Drücken der Compose-Taste (auch als Multi-Key bekannt) werden die nächsten Tastenanschläge vom Computer als Kombination interpretiert, die ein nicht auf der Tastatur vorhandenes Zeichen erzeugt.
 .
 Auf der Textkonsole funktioniert die Compose-Taste nicht im Unicode-Modus. Falls Sie nicht im Unicode-Modus arbeiten, können Sie unabhängig von Ihrer Auswahl hier immer auch die Kombination Strg+Satzpunkt (.) als Compose-Taste verwenden.
";
$elem["keyboard-configuration/compose"]["descriptionfr"]="Touche « compose » :
 La touche « compose » (encore appelée « touche multi ») sert à indiquer que les touches utilisées ensuite doivent être combinées de façon à produire un caractère qui n'existe pas sur le clavier.
 .
 Sur les consoles en mode texte, la touche « compose » ne fonctionne pas en mode Unicode. Si l'on n'est pas en mode Unicode, indépendamment de ce que vous avez choisi ici, vous pouvez toujours utiliser la combinaison Ctrl+point comme touche « compose ».
";
$elem["keyboard-configuration/compose"]["default"]="No compose key";
$elem["keyboard-configuration/ctrl_alt_bksp"]["type"]="boolean";
$elem["keyboard-configuration/ctrl_alt_bksp"]["description"]="Use Control+Alt+Backspace to terminate the X server?
 By default the combination Control+Alt+Backspace does nothing.  If
 you want it can be used to terminate the X server.
";
$elem["keyboard-configuration/ctrl_alt_bksp"]["descriptionde"]="Strg+Alt+Zurück (Ctrl+Alt+Backspace) verwenden, um den X-Server zu beenden?
 Standardmäßig ist die Tastenkombination Strg+Alt+Zurück ohne Funktion. Wenn Sie möchten, kann Sie jedoch verwendet werden, um den X-Server zu beenden.
";
$elem["keyboard-configuration/ctrl_alt_bksp"]["descriptionfr"]="Faut-il utiliser Control+Alt+Ret.Arr. pour arrêter le serveur X ?
 Par défaut, la combinaison de touches Ctrl+Alt+Ret.Arr. (« Ctrl+Alt+Backspace ») n'a pas d'action. Vous pouvez choisir de l'utiliser pour arrêter le serveur X.
";
$elem["keyboard-configuration/ctrl_alt_bksp"]["default"]="false";
$elem["keyboard-configuration/xkb-keymap"]["type"]="select";
$elem["keyboard-configuration/xkb-keymap"]["choices"][1]="American English";
$elem["keyboard-configuration/xkb-keymap"]["choices"][2]="Belarusian";
$elem["keyboard-configuration/xkb-keymap"]["choices"][3]="Belgian";
$elem["keyboard-configuration/xkb-keymap"]["choices"][4]="Brazilian (ABNT2 layout)";
$elem["keyboard-configuration/xkb-keymap"]["choices"][5]="Brazilian (EUA layout)";
$elem["keyboard-configuration/xkb-keymap"]["choices"][6]="British English";
$elem["keyboard-configuration/xkb-keymap"]["choices"][7]="Bulgarian";
$elem["keyboard-configuration/xkb-keymap"]["choices"][8]="Bulgarian (phonetic layout)";
$elem["keyboard-configuration/xkb-keymap"]["choices"][9]="Canadian French";
$elem["keyboard-configuration/xkb-keymap"]["choices"][10]="Canadian Multilingual";
$elem["keyboard-configuration/xkb-keymap"]["choices"][11]="Croatian";
$elem["keyboard-configuration/xkb-keymap"]["choices"][12]="Czech";
$elem["keyboard-configuration/xkb-keymap"]["choices"][13]="Danish";
$elem["keyboard-configuration/xkb-keymap"]["choices"][14]="Dutch";
$elem["keyboard-configuration/xkb-keymap"]["choices"][15]="Dvorak";
$elem["keyboard-configuration/xkb-keymap"]["choices"][16]="Estonian";
$elem["keyboard-configuration/xkb-keymap"]["choices"][17]="Finnish";
$elem["keyboard-configuration/xkb-keymap"]["choices"][18]="French";
$elem["keyboard-configuration/xkb-keymap"]["choices"][19]="German";
$elem["keyboard-configuration/xkb-keymap"]["choices"][20]="Greek";
$elem["keyboard-configuration/xkb-keymap"]["choices"][21]="Hebrew";
$elem["keyboard-configuration/xkb-keymap"]["choices"][22]="Hungarian";
$elem["keyboard-configuration/xkb-keymap"]["choices"][23]="Icelandic";
$elem["keyboard-configuration/xkb-keymap"]["choices"][24]="Italian";
$elem["keyboard-configuration/xkb-keymap"]["choices"][25]="Japanese";
$elem["keyboard-configuration/xkb-keymap"]["choices"][26]="Kirghiz";
$elem["keyboard-configuration/xkb-keymap"]["choices"][27]="Latin American";
$elem["keyboard-configuration/xkb-keymap"]["choices"][28]="Latvian";
$elem["keyboard-configuration/xkb-keymap"]["choices"][29]="Lithuanian";
$elem["keyboard-configuration/xkb-keymap"]["choices"][30]="Macedonian";
$elem["keyboard-configuration/xkb-keymap"]["choices"][31]="Norwegian";
$elem["keyboard-configuration/xkb-keymap"]["choices"][32]="Polish";
$elem["keyboard-configuration/xkb-keymap"]["choices"][33]="Portuguese";
$elem["keyboard-configuration/xkb-keymap"]["choices"][34]="Romanian";
$elem["keyboard-configuration/xkb-keymap"]["choices"][35]="Russian";
$elem["keyboard-configuration/xkb-keymap"]["choices"][36]="Serbian (Cyrillic)";
$elem["keyboard-configuration/xkb-keymap"]["choices"][37]="Slovakian";
$elem["keyboard-configuration/xkb-keymap"]["choices"][38]="Slovene";
$elem["keyboard-configuration/xkb-keymap"]["choices"][39]="Spanish";
$elem["keyboard-configuration/xkb-keymap"]["choices"][40]="Swedish";
$elem["keyboard-configuration/xkb-keymap"]["choices"][41]="Swiss French";
$elem["keyboard-configuration/xkb-keymap"]["choices"][42]="Swiss German";
$elem["keyboard-configuration/xkb-keymap"]["choices"][43]="Thai";
$elem["keyboard-configuration/xkb-keymap"]["choices"][44]="Turkish (F layout)";
$elem["keyboard-configuration/xkb-keymap"]["choices"][45]="Turkish (Q layout)";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][1]="Amerikanisches Englisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][2]="Weißrussisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][3]="Belgisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][4]="Brasilianisch (ABNT2-Anordnung)";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][5]="Brasilianisch (EUA-Anordnung)";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][6]="Britisches Englisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][7]="Bulgarisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][8]="Bulgarisch (phonetic-Anordnung)";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][9]="Kanadisches Französisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][10]="Kanadisch (mehrsprachig)";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][11]="Kroatisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][12]="Tschechisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][13]="Dänisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][14]="Niederländisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][15]="Dvorak";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][16]="Estnisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][17]="Finnisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][18]="Französisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][19]="Deutsch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][20]="Griechisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][21]="Hebräisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][22]="Ungarisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][23]="Isländisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][24]="Italienisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][25]="Japanisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][26]="Kirgisisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][27]="Lateinamerikanisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][28]="Lettisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][29]="Litauisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][30]="Mazedonisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][31]="Norwegisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][32]="Polnisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][33]="Portugiesisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][34]="Rumänisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][35]="Russisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][36]="Serbisch (Kyrillisch)";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][37]="Slovakisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][38]="Slowenisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][39]="Spanisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][40]="Schwedisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][41]="Schweizerisches Französisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][42]="Schweizerdeutsch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][43]="Thailändisch";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][44]="Türkisch (F-Anordnung)";
$elem["keyboard-configuration/xkb-keymap"]["choicesde"][45]="Türkisch (Q-Anordnung)";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][1]="États-Unis";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][2]="Bélarusse";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][3]="Belge";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][4]="Brésilien (br-abnt2)";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][5]="Brésilien (br-latin1)";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][6]="Britannique";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][7]="Bulgare";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][8]="Bulgare (phonetic)";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][9]="Canadien français";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][10]="Canadien multilingue";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][11]="Croate";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][12]="Tchèque";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][13]="Danois";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][14]="Néerlandais";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][15]="Dvorak";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][16]="Estonien";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][17]="Finnois";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][18]="Français";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][19]="Allemand";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][20]="Grec";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][21]="Hébreu";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][22]="Hongrois";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][23]="Islandais";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][24]="Italien";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][25]="Japonais";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][26]="Kirghize";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][27]="Amérique latine";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][28]="Letton";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][29]="Lithuanien";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][30]="Macédonien";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][31]="Norvégien";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][32]="Polonais";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][33]="Portugais";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][34]="Roumain";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][35]="Russe";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][36]="Serbe cyrillique";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][37]="Slovaque";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][38]="Slovène";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][39]="Espagnol";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][40]="Suédois";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][41]="Suisse romand";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][42]="Suisse alémanique";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][43]="Thaï";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][44]="Turc (trfu)";
$elem["keyboard-configuration/xkb-keymap"]["choicesfr"][45]="Turc (trqu)";
$elem["keyboard-configuration/xkb-keymap"]["description"]="Keymap to use:
";
$elem["keyboard-configuration/xkb-keymap"]["descriptionde"]="Wählen Sie das Layout für die Tastatur aus:
";
$elem["keyboard-configuration/xkb-keymap"]["descriptionfr"]="Carte de clavier à utiliser :
";
$elem["keyboard-configuration/xkb-keymap"]["default"]="";
$elem["keyboard-configuration/modelcode"]["type"]="string";
$elem["keyboard-configuration/modelcode"]["description"]="for internal use

";
$elem["keyboard-configuration/modelcode"]["descriptionde"]="";
$elem["keyboard-configuration/modelcode"]["descriptionfr"]="";
$elem["keyboard-configuration/modelcode"]["default"]="";
$elem["keyboard-configuration/layoutcode"]["type"]="string";
$elem["keyboard-configuration/layoutcode"]["description"]="for internal use

";
$elem["keyboard-configuration/layoutcode"]["descriptionde"]="";
$elem["keyboard-configuration/layoutcode"]["descriptionfr"]="";
$elem["keyboard-configuration/layoutcode"]["default"]="";
$elem["keyboard-configuration/variantcode"]["type"]="string";
$elem["keyboard-configuration/variantcode"]["description"]="for internal use

";
$elem["keyboard-configuration/variantcode"]["descriptionde"]="";
$elem["keyboard-configuration/variantcode"]["descriptionfr"]="";
$elem["keyboard-configuration/variantcode"]["default"]="";
$elem["keyboard-configuration/optionscode"]["type"]="string";
$elem["keyboard-configuration/optionscode"]["description"]="for internal use

";
$elem["keyboard-configuration/optionscode"]["descriptionde"]="";
$elem["keyboard-configuration/optionscode"]["descriptionfr"]="";
$elem["keyboard-configuration/optionscode"]["default"]="";
$elem["keyboard-configuration/store_defaults_in_debconf_db"]["type"]="boolean";
$elem["keyboard-configuration/store_defaults_in_debconf_db"]["description"]="for internal use
";
$elem["keyboard-configuration/store_defaults_in_debconf_db"]["descriptionde"]="";
$elem["keyboard-configuration/store_defaults_in_debconf_db"]["descriptionfr"]="";
$elem["keyboard-configuration/store_defaults_in_debconf_db"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
