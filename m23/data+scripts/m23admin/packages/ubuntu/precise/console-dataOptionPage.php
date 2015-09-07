<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("console-data");

$elem["console-data/keymap/policy"]["type"]="select";
$elem["console-data/keymap/policy"]["choices"][1]="Select keymap from arch list";
$elem["console-data/keymap/policy"]["choices"][2]="Don't touch keymap";
$elem["console-data/keymap/policy"]["choices"][3]="Keep kernel keymap";
$elem["console-data/keymap/policy"]["choicesde"][1]="Tastaturbelegung aus Liste für diese Architektur wählen";
$elem["console-data/keymap/policy"]["choicesde"][2]="Tastaturbelegung nicht verändern";
$elem["console-data/keymap/policy"]["choicesde"][3]="Tastaturbelegung des Kernels weiter verwenden";
$elem["console-data/keymap/policy"]["choicesfr"][1]="Choisir un codage clavier pour votre architecture";
$elem["console-data/keymap/policy"]["choicesfr"][2]="Ne pas modifier le codage clavier";
$elem["console-data/keymap/policy"]["choicesfr"][3]="Conserver le codage clavier du noyau";
$elem["console-data/keymap/policy"]["description"]="Policy for handling keymaps:
 The keymap records the layout of symbols on the keyboard.
 .
  - 'Select keymap from arch list': select one of the predefined keymaps
    specific for your architecture (recommended for non-USB keyboards);
  - 'Don't touch keymap': don't overwrite the keymap in /etc/console,
    which is maintained manually with install-keymap(8);
  - 'Keep kernel keymap': prevent any keymap from being loaded next time
    the system boots; 
  - 'Select keymap from full list': list all the predefined keymaps.
    Recommended when using cross-architecture (often USB) keyboards.
";
$elem["console-data/keymap/policy"]["descriptionde"]="Vorgehensweise zur Handhabung der Tastaturbelegung:
 Die Tastaturbelegung speichert die Anordnung von Symbolen auf der Tastatur.
 .
  - »Tastaturbelegung aus Liste für diese Architektur wählen«: wählen Sie
    eine der für Ihre Architektur vordefinierten Tastaturbelegungen aus
    (empfohlen für nicht-USB-Tastaturen);
  - »Tastaturbelegung nicht verändern«: die Tastaturbelegung in /etc/console,
    die manuell mit install-keymap(8) verwaltet wird, wird nicht
    überschrieben;
  - »Tastaturbelegung des Kernels weiter verwenden«: verhindert, dass beim
    nächsten Systemstart irgendeine Tastaturbelegung geladen wird;
  - »Tastaturbelegung aus der Gesamtliste wählen«: führt alle vordefinierten
    Tastaturbelegungen auf (empfohlen beim Einsatz von Tastaturen anderer
    Architekturen, oft an USB).
";
$elem["console-data/keymap/policy"]["descriptionfr"]="Politique de gestion des codages clavier :
 Le codage clavier indique la disposition des symboles sur le clavier.
 .
  - « Choisir un codage clavier pour votre architecture » :
    choisir un codage clavier dans une liste prédéfinie
    correspondant à votre architecture (recommandé pour les
    claviers USB) ;
  - « Ne pas modifier le codage clavier » :
    ne pas écraser le réglage présent dans /etc/console, maintenu
    avec la commande install-keymap(8) ;
  - « Conserver le codage clavier du noyau » :
    ne charger aucun codage clavier au démarrage ;
  - « Choisir un codage clavier dans la liste complète » :
    afficher tous les codages claviers prédéfinis. Recommandé
    avec le clavier (souvent USB) d'une autre architecture.
";
$elem["console-data/keymap/policy"]["default"]="Don't touch keymap";
$elem["console-data/keymap/ignored"]["type"]="note";
$elem["console-data/keymap/ignored"]["description"]="Ignored boot-time keymap in an old location
 The keymap configuration tool has been set up not to touch an existing
 keymap.
 .
 However, there are some 'default.kmap(.gz)' file(s) either in
 /etc/kbd/ or in /etc/console-tools/. These were recognized as
 boot-time keymaps by older versions of the console utilities, but are
 now ignored.
 .
 If you wish one of these to take effect on next reboot, you will have
 to move it to /etc/console/boottime.kmap.gz manually.
";
$elem["console-data/keymap/ignored"]["descriptionde"]="Beim Start geladene Tastaturbelegung in veraltetem Verzeichnis wird ignoriert
 Das Konfigurationswerkzeug für die Tastaturbelegung ist so eingerichtet, dass es vorhandene Tastaturbelegungen nicht verändert.
 .
 Allerdings existieren einige »default.kmap(.gz)«-Dateien, entweder in /etc/kbd/ oder in /etc/console-tools/. Diese wurden von älteren Versionen der »Console-Utilities« beim Start als Tastaturbelegungstabelle erkannt, werden jetzt aber ignoriert.
 .
 Falls Sie möchten, dass eine dieser Tastaturbelegungen beim nächsten Neustart benutzt wird, müssen Sie diese von Hand nach /etc/console/boottime.kmap.gz verschieben.
";
$elem["console-data/keymap/ignored"]["descriptionfr"]="Un codage clavier utilisé au démarrage va être ignoré
 L'outil de configuration du clavier est réglé pour ne pas modifier le codage clavier existant.
 .
 Cependant, un ou plusieurs fichiers « default.kmap(.gz) » sont présents dans les répertoires /etc/kbd/ ou /etc/console-tools/. Ces fichiers étaient auparavant reconnus comme des codages clavier à charger au démarrage par d'anciennes versions des utilitaires de gestion de la console. Ils seront désormais ignorés.
 .
 Si vous souhaitez qu'un de ces fichiers prenne effet au prochain démarrage, vous devez le déplacer vous-même en tant que /etc/console/boottime.kmap.gz.
";
$elem["console-data/keymap/ignored"]["default"]="";
$elem["console-data/keymap/family"]["type"]="select";
$elem["console-data/keymap/family"]["description"]="Keyboard layout family:
 Please specify the generic family name for the keyboard
 layout. Usually, the layout family name is taken from the first keys on the
 left of the top letters row of the keymap.
";
$elem["console-data/keymap/family"]["descriptionde"]="Tastatur-Layout-Familie:
 Geben Sie an, zu welcher allgemeinen Familie das Tastatur-Layout gehört. Der Name der Familie entspricht in der Regel den ersten Tasten von links in der oberen Buchstabenreihe der Tastatur.
";
$elem["console-data/keymap/family"]["descriptionfr"]="Disposition générale du clavier :
 Veuillez indiquer la disposition générale de votre clavier. Le nom générique pour cette disposition consiste habituellement en les premières lettres situées à gauche de la première ligne de lettres du clavier.
";
$elem["console-data/keymap/family"]["default"]="qwerty";
$elem["console-data/keymap/template/layout"]["type"]="select";
$elem["console-data/keymap/template/layout"]["description"]="Keyboard layout:
 In order to refine the keymap choice, please select the
 physical layout of the keyboard.
";
$elem["console-data/keymap/template/layout"]["descriptionde"]="Tastatur-Layout:
 Um die Auswahl der Tastaturbelegung zu verfeinern, wählen Sie bitte die physikalische Anordnung der Tasten aus.
";
$elem["console-data/keymap/template/layout"]["descriptionfr"]="Disposition du clavier :
 Pour affiner le choix du clavier, veuillez indiquer la disposition physique de votre clavier.
";
$elem["console-data/keymap/template/layout"]["default"]="";
$elem["console-data/keymap/template/variant"]["type"]="select";
$elem["console-data/keymap/template/variant"]["description"]="Keyboard variant:
 The selected keyboard layout has several variants. Please select the
 one matching the keyboard.
";
$elem["console-data/keymap/template/variant"]["descriptionde"]="Tastaturvariante:
 Es gibt mehrere Varianten für die ausgewählte Tastenanordnung. Bitte wählen Sie diejenige, die auf Ihre Tastatur zutrifft.
";
$elem["console-data/keymap/template/variant"]["descriptionfr"]="Variante du clavier :
 La disposition sélectionnée possède plusieurs variantes. Veuillez choisir celle correspondant à votre clavier.
";
$elem["console-data/keymap/template/variant"]["default"]="";
$elem["console-data/keymap/template/keymap"]["type"]="select";
$elem["console-data/keymap/template/keymap"]["description"]="Keymap:
 The selected keyboard allows a choice from a range of keymaps.
 Usually these were designed either for specific tastes (for instance
 with dead keys) or for specific needs (such as programming).
";
$elem["console-data/keymap/template/keymap"]["descriptionde"]="Tastaturbelegung:
 Die ausgewählte Tastatur erlaubt es Ihnen, zwischen mehreren Tastatur-Belegungen (Keymaps) auszuwählen. Für gewöhnlich sind diese entweder für spezielle Geschmäcker (zum Beispiel mit »dead keys« (toten Tasten)) oder für spezielle Anforderungen (z.B. Programmieren) entwickelt worden.
";
$elem["console-data/keymap/template/keymap"]["descriptionfr"]="Codage clavier :
 Le clavier sélectionné permet de choisir parmi plusieurs codages. Ils sont d'habitude conçus soit pour des goûts spécifiques (p. ex. avoir ou non les touches mortes) ou pour répondre à des besoins particuliers (p. ex. un codage clavier pour développeurs).
";
$elem["console-data/keymap/template/keymap"]["default"]="";
$elem["console-data/keymap/full"]["type"]="select";
$elem["console-data/keymap/full"]["description"]="Keymap:
 If the keyboard is designed for a different computer architecture, you should
 choose a specific keymap in the full map.
";
$elem["console-data/keymap/full"]["descriptionde"]="Tastaturbelegung:
 Falls die Tastatur für eine andere Computer-Architektur entwickelt wurde, sollten Sie eine bestimmte Belegungstabelle aus der Gesamtliste wählen.
";
$elem["console-data/keymap/full"]["descriptionfr"]="Codage clavier :
 Si le clavier est prévu pour une architecture d'ordinateur différente, vous devriez le choisir dans la liste complète.
";
$elem["console-data/keymap/full"]["default"]="";
$elem["console-data/keymap/powerpcadb"]["type"]="boolean";
$elem["console-data/keymap/powerpcadb"]["description"]="Are you ready for the ADB key codes transition?
 The kernel is configured to have the keyboard send ADB key codes. This
 behavior is now deprecated and no longer supported.
 .
 For best results, you should reconfigure the kernel with
 CONFIG_MAC_ADBKEYCODES=n. Alternatively, you can pass
 'keyboard_sends_linux_keycodes=1' as an argument to the kernel.
 .
 Please be aware that the transition will most probably break the X
 configuration, so it is strongly recommended to close all X sessions
 now and adapt the configuration afterwards by running
 'dpkg-reconfigure console-data'.
";
$elem["console-data/keymap/powerpcadb"]["descriptionde"]="Sind Sie bereit für ADB-Keycode-Überleitung?
 Der Kernel ist so konfiguriert, dass die Tastatur ADB-Keycodes sendet. Dieses Verhalten ist überholt und wird nicht länger unterstützt.
 .
 Die besten Ergebnisse erhalten Sie, indem Sie Ihren Kernel mit »CONFIG_MAC_ADBKEYCODES=n« neu konfigurieren. Alternativ können Sie dem Kernel den Parameter »keyboard_sends_linux_keycodes=1« übergeben.
 .
 Beachten Sie, dass die Überleitung meist die X-Konfiguration unbenutzbar macht. Deshalb wird nachdrücklich empfohlen, jetzt alle X-Sitzungen zu beenden und danach die Konfiguration anzupassen, indem Sie »dpkg-reconfigure console-data« ausführen.
";
$elem["console-data/keymap/powerpcadb"]["descriptionfr"]="Êtes-vous prêt à effectuer la transition des codes de touche ADB ?
 Le noyau est configuré pour que le clavier envoie des codes de touche ADB. Ce comportement est maintenant obsolète et n'est plus géré.
 .
 Pour obtenir de meilleurs résultats, vous devriez reconfigurer le noyau avec CONFIG_MAC_ADBKEYCODES=n. Vous pouvez également passer « keyboard_sends_linux_keycodes=1 » comme paramètre au noyau lors du démarrage.
 .
 La transition va certainement casser votre configuration de X, il est donc fortement recommandé de quitter toutes les sessions X en cours maintenant et de ne modifier la configuration qu'après, en exécutant « dpkg-reconfigure console-data ».
";
$elem["console-data/keymap/powerpcadb"]["default"]="";
$elem["console-data/bootmap-md5sum"]["type"]="string";
$elem["console-data/bootmap-md5sum"]["description"]="for internal use


";
$elem["console-data/bootmap-md5sum"]["descriptionde"]="";
$elem["console-data/bootmap-md5sum"]["descriptionfr"]="";
$elem["console-data/bootmap-md5sum"]["default"]="none";
$elem["console-keymaps-acorn/keymap"]["type"]="select";
$elem["console-keymaps-acorn/keymap"]["choices"][1]="American English";
$elem["console-keymaps-acorn/keymap"]["choices"][2]="Belarusian";
$elem["console-keymaps-acorn/keymap"]["choices"][3]="Belgian";
$elem["console-keymaps-acorn/keymap"]["choices"][4]="Brazilian (ABNT2 layout)";
$elem["console-keymaps-acorn/keymap"]["choices"][5]="Brazilian (EUA layout)";
$elem["console-keymaps-acorn/keymap"]["choices"][6]="British English";
$elem["console-keymaps-acorn/keymap"]["choices"][7]="Bulgarian";
$elem["console-keymaps-acorn/keymap"]["choices"][8]="Canadian Multilingual";
$elem["console-keymaps-acorn/keymap"]["choices"][9]="Croatian";
$elem["console-keymaps-acorn/keymap"]["choices"][10]="Czech";
$elem["console-keymaps-acorn/keymap"]["choices"][11]="Danish";
$elem["console-keymaps-acorn/keymap"]["choices"][12]="Dutch";
$elem["console-keymaps-acorn/keymap"]["choices"][13]="Dvorak";
$elem["console-keymaps-acorn/keymap"]["choices"][14]="Estonian";
$elem["console-keymaps-acorn/keymap"]["choices"][15]="Finnish";
$elem["console-keymaps-acorn/keymap"]["choices"][16]="French";
$elem["console-keymaps-acorn/keymap"]["choices"][17]="German";
$elem["console-keymaps-acorn/keymap"]["choices"][18]="Greek";
$elem["console-keymaps-acorn/keymap"]["choices"][19]="Hebrew";
$elem["console-keymaps-acorn/keymap"]["choices"][20]="Hungarian";
$elem["console-keymaps-acorn/keymap"]["choices"][21]="Icelandic";
$elem["console-keymaps-acorn/keymap"]["choices"][22]="Italian";
$elem["console-keymaps-acorn/keymap"]["choices"][23]="Japanese";
$elem["console-keymaps-acorn/keymap"]["choices"][24]="Kirghiz";
$elem["console-keymaps-acorn/keymap"]["choices"][25]="Latin American";
$elem["console-keymaps-acorn/keymap"]["choices"][26]="Latvian";
$elem["console-keymaps-acorn/keymap"]["choices"][27]="Lithuanian";
$elem["console-keymaps-acorn/keymap"]["choices"][28]="Macedonian";
$elem["console-keymaps-acorn/keymap"]["choices"][29]="Norwegian";
$elem["console-keymaps-acorn/keymap"]["choices"][30]="Polish";
$elem["console-keymaps-acorn/keymap"]["choices"][31]="Portuguese";
$elem["console-keymaps-acorn/keymap"]["choices"][32]="Romanian";
$elem["console-keymaps-acorn/keymap"]["choices"][33]="Russian";
$elem["console-keymaps-acorn/keymap"]["choices"][34]="Serbian";
$elem["console-keymaps-acorn/keymap"]["choices"][35]="Slovakian";
$elem["console-keymaps-acorn/keymap"]["choices"][36]="Slovene";
$elem["console-keymaps-acorn/keymap"]["choices"][37]="Spanish";
$elem["console-keymaps-acorn/keymap"]["choices"][38]="Swedish";
$elem["console-keymaps-acorn/keymap"]["choices"][39]="Swiss French";
$elem["console-keymaps-acorn/keymap"]["choices"][40]="Swiss German";
$elem["console-keymaps-acorn/keymap"]["choices"][41]="Turkish (F layout)";
$elem["console-keymaps-acorn/keymap"]["choices"][42]="Turkish (Q layout)";
$elem["console-keymaps-acorn/keymap"]["choicesde"][1]="Amerikanisches Englisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][2]="Weißrussisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][3]="Belgisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][4]="Brasilianisch (ABNT2-Anordnung)";
$elem["console-keymaps-acorn/keymap"]["choicesde"][5]="Brasilianisch (EUA-Anordnung)";
$elem["console-keymaps-acorn/keymap"]["choicesde"][6]="Britisches Englisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][7]="Bulgarisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][8]="Kanadisch (mehrsprachig)";
$elem["console-keymaps-acorn/keymap"]["choicesde"][9]="Kroatisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][10]="Tschechisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][11]="Dänisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][12]="Niederländisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][13]="Dvorak";
$elem["console-keymaps-acorn/keymap"]["choicesde"][14]="Estnisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][15]="Finnisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][16]="Französisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][17]="Deutsch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][18]="Griechisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][19]="Hebräisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][20]="Ungarisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][21]="Isländisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][22]="Italienisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][23]="Japanisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][24]="Kirgisisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][25]="Lateinamerikanisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][26]="Lettisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][27]="Litauisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][28]="Mazedonisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][29]="Norwegisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][30]="Polnisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][31]="Portugiesisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][32]="Rumänisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][33]="Russisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][34]="Serbisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][35]="Slovakisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][36]="Slowenisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][37]="Spanisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][38]="Schwedisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][39]="Schweizerisches Französisch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][40]="Schweizerdeutsch";
$elem["console-keymaps-acorn/keymap"]["choicesde"][41]="Türkisch (F-Anordnung)";
$elem["console-keymaps-acorn/keymap"]["choicesde"][42]="Türkisch (Q-Anordnung)";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][1]="États-Unis";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][2]="Bélarusse";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][3]="Belge";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][4]="Brésilien (br-abnt2)";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][5]="Brésilien (br-latin1)";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][6]="Britannique";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][7]="Bulgare";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][8]="Canadien multilingue";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][9]="Croate";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][10]="Tchèque";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][11]="Danois";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][12]="Néerlandais";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][13]="Dvorak";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][14]="Estonien";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][15]="Finnois";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][16]="Français (fr-latin9)";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][17]="Allemand";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][18]="Grec";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][19]="Hébreu";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][20]="Hongrois";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][21]="Islandais";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][22]="Italien";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][23]="Japonais";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][24]="Kirghize";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][25]="Amérique latine";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][26]="Letton";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][27]="Lithuanien";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][28]="Macédonien";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][29]="Norvégien";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][30]="Polonais";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][31]="Portugais";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][32]="Roumain";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][33]="Russe";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][34]="Serbe";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][35]="Slovaque";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][36]="Slovène";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][37]="Espagnol";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][38]="Suédois";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][39]="Suisse romand";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][40]="Suisse alémanique";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][41]="Turc (trfu)";
$elem["console-keymaps-acorn/keymap"]["choicesfr"][42]="Turc (trqu)";
$elem["console-keymaps-acorn/keymap"]["description"]="Keymap to use:
";
$elem["console-keymaps-acorn/keymap"]["descriptionde"]="Wählen Sie das Layout für die Tastatur aus:
";
$elem["console-keymaps-acorn/keymap"]["descriptionfr"]="Carte de clavier à utiliser :
";
$elem["console-keymaps-acorn/keymap"]["default"]="";
$elem["console-keymaps-amiga/keymap"]["type"]="select";
$elem["console-keymaps-amiga/keymap"]["choices"][1]="American English";
$elem["console-keymaps-amiga/keymap"]["choices"][2]="French";
$elem["console-keymaps-amiga/keymap"]["choices"][3]="German";
$elem["console-keymaps-amiga/keymap"]["choices"][4]="Italian";
$elem["console-keymaps-amiga/keymap"]["choices"][5]="Spanish";
$elem["console-keymaps-amiga/keymap"]["choices"][6]="Swedish";
$elem["console-keymaps-amiga/keymap"]["choicesde"][1]="Amerikanisches Englisch";
$elem["console-keymaps-amiga/keymap"]["choicesde"][2]="Französisch";
$elem["console-keymaps-amiga/keymap"]["choicesde"][3]="Deutsch";
$elem["console-keymaps-amiga/keymap"]["choicesde"][4]="Italienisch";
$elem["console-keymaps-amiga/keymap"]["choicesde"][5]="Spanisch";
$elem["console-keymaps-amiga/keymap"]["choicesde"][6]="Schwedisch";
$elem["console-keymaps-amiga/keymap"]["choicesfr"][1]="États-Unis";
$elem["console-keymaps-amiga/keymap"]["choicesfr"][2]="Français (fr-latin9)";
$elem["console-keymaps-amiga/keymap"]["choicesfr"][3]="Allemand";
$elem["console-keymaps-amiga/keymap"]["choicesfr"][4]="Italien";
$elem["console-keymaps-amiga/keymap"]["choicesfr"][5]="Espagnol";
$elem["console-keymaps-amiga/keymap"]["choicesfr"][6]="Suédois";
$elem["console-keymaps-amiga/keymap"]["description"]="Keymap to use:
";
$elem["console-keymaps-amiga/keymap"]["descriptionde"]="Wählen Sie das Layout für die Tastatur aus:
";
$elem["console-keymaps-amiga/keymap"]["descriptionfr"]="Carte de clavier à utiliser :
";
$elem["console-keymaps-amiga/keymap"]["default"]="";
$elem["console-keymaps-at/keymap"]["type"]="select";
$elem["console-keymaps-at/keymap"]["choices"][1]="American English";
$elem["console-keymaps-at/keymap"]["choices"][2]="Belarusian";
$elem["console-keymaps-at/keymap"]["choices"][3]="Belgian";
$elem["console-keymaps-at/keymap"]["choices"][4]="Brazilian (ABNT2 layout)";
$elem["console-keymaps-at/keymap"]["choices"][5]="Brazilian (EUA layout)";
$elem["console-keymaps-at/keymap"]["choices"][6]="British English";
$elem["console-keymaps-at/keymap"]["choices"][7]="Bulgarian";
$elem["console-keymaps-at/keymap"]["choices"][8]="Canadian French";
$elem["console-keymaps-at/keymap"]["choices"][9]="Canadian Multilingual";
$elem["console-keymaps-at/keymap"]["choices"][10]="Croatian";
$elem["console-keymaps-at/keymap"]["choices"][11]="Czech";
$elem["console-keymaps-at/keymap"]["choices"][12]="Danish";
$elem["console-keymaps-at/keymap"]["choices"][13]="Dutch";
$elem["console-keymaps-at/keymap"]["choices"][14]="Dvorak";
$elem["console-keymaps-at/keymap"]["choices"][15]="Estonian";
$elem["console-keymaps-at/keymap"]["choices"][16]="Finnish";
$elem["console-keymaps-at/keymap"]["choices"][17]="French";
$elem["console-keymaps-at/keymap"]["choices"][18]="German";
$elem["console-keymaps-at/keymap"]["choices"][19]="Greek";
$elem["console-keymaps-at/keymap"]["choices"][20]="Hebrew";
$elem["console-keymaps-at/keymap"]["choices"][21]="Hungarian";
$elem["console-keymaps-at/keymap"]["choices"][22]="Icelandic";
$elem["console-keymaps-at/keymap"]["choices"][23]="Italian";
$elem["console-keymaps-at/keymap"]["choices"][24]="Japanese";
$elem["console-keymaps-at/keymap"]["choices"][25]="Kirghiz";
$elem["console-keymaps-at/keymap"]["choices"][26]="Latin American";
$elem["console-keymaps-at/keymap"]["choices"][27]="Latvian";
$elem["console-keymaps-at/keymap"]["choices"][28]="Lithuanian";
$elem["console-keymaps-at/keymap"]["choices"][29]="Macedonian";
$elem["console-keymaps-at/keymap"]["choices"][30]="Norwegian";
$elem["console-keymaps-at/keymap"]["choices"][31]="Polish";
$elem["console-keymaps-at/keymap"]["choices"][32]="Portuguese";
$elem["console-keymaps-at/keymap"]["choices"][33]="Romanian";
$elem["console-keymaps-at/keymap"]["choices"][34]="Russian";
$elem["console-keymaps-at/keymap"]["choices"][35]="Serbian";
$elem["console-keymaps-at/keymap"]["choices"][36]="Slovakian";
$elem["console-keymaps-at/keymap"]["choices"][37]="Slovene";
$elem["console-keymaps-at/keymap"]["choices"][38]="Spanish";
$elem["console-keymaps-at/keymap"]["choices"][39]="Swedish";
$elem["console-keymaps-at/keymap"]["choices"][40]="Swiss French";
$elem["console-keymaps-at/keymap"]["choices"][41]="Swiss German";
$elem["console-keymaps-at/keymap"]["choices"][42]="Thai";
$elem["console-keymaps-at/keymap"]["choices"][43]="Turkish (F layout)";
$elem["console-keymaps-at/keymap"]["choices"][44]="Turkish (Q layout)";
$elem["console-keymaps-at/keymap"]["choicesde"][1]="Amerikanisches Englisch";
$elem["console-keymaps-at/keymap"]["choicesde"][2]="Weißrussisch";
$elem["console-keymaps-at/keymap"]["choicesde"][3]="Belgisch";
$elem["console-keymaps-at/keymap"]["choicesde"][4]="Brasilianisch (ABNT2-Anordnung)";
$elem["console-keymaps-at/keymap"]["choicesde"][5]="Brasilianisch (EUA-Anordnung)";
$elem["console-keymaps-at/keymap"]["choicesde"][6]="Britisches Englisch";
$elem["console-keymaps-at/keymap"]["choicesde"][7]="Bulgarisch";
$elem["console-keymaps-at/keymap"]["choicesde"][8]="Kanadisches Französisch";
$elem["console-keymaps-at/keymap"]["choicesde"][9]="Kanadisch (mehrsprachig)";
$elem["console-keymaps-at/keymap"]["choicesde"][10]="Kroatisch";
$elem["console-keymaps-at/keymap"]["choicesde"][11]="Tschechisch";
$elem["console-keymaps-at/keymap"]["choicesde"][12]="Dänisch";
$elem["console-keymaps-at/keymap"]["choicesde"][13]="Niederländisch";
$elem["console-keymaps-at/keymap"]["choicesde"][14]="Dvorak";
$elem["console-keymaps-at/keymap"]["choicesde"][15]="Estnisch";
$elem["console-keymaps-at/keymap"]["choicesde"][16]="Finnisch";
$elem["console-keymaps-at/keymap"]["choicesde"][17]="Französisch";
$elem["console-keymaps-at/keymap"]["choicesde"][18]="Deutsch";
$elem["console-keymaps-at/keymap"]["choicesde"][19]="Griechisch";
$elem["console-keymaps-at/keymap"]["choicesde"][20]="Hebräisch";
$elem["console-keymaps-at/keymap"]["choicesde"][21]="Ungarisch";
$elem["console-keymaps-at/keymap"]["choicesde"][22]="Isländisch";
$elem["console-keymaps-at/keymap"]["choicesde"][23]="Italienisch";
$elem["console-keymaps-at/keymap"]["choicesde"][24]="Japanisch";
$elem["console-keymaps-at/keymap"]["choicesde"][25]="Kirgisisch";
$elem["console-keymaps-at/keymap"]["choicesde"][26]="Lateinamerikanisch";
$elem["console-keymaps-at/keymap"]["choicesde"][27]="Lettisch";
$elem["console-keymaps-at/keymap"]["choicesde"][28]="Litauisch";
$elem["console-keymaps-at/keymap"]["choicesde"][29]="Mazedonisch";
$elem["console-keymaps-at/keymap"]["choicesde"][30]="Norwegisch";
$elem["console-keymaps-at/keymap"]["choicesde"][31]="Polnisch";
$elem["console-keymaps-at/keymap"]["choicesde"][32]="Portugiesisch";
$elem["console-keymaps-at/keymap"]["choicesde"][33]="Rumänisch";
$elem["console-keymaps-at/keymap"]["choicesde"][34]="Russisch";
$elem["console-keymaps-at/keymap"]["choicesde"][35]="Serbisch";
$elem["console-keymaps-at/keymap"]["choicesde"][36]="Slovakisch";
$elem["console-keymaps-at/keymap"]["choicesde"][37]="Slowenisch";
$elem["console-keymaps-at/keymap"]["choicesde"][38]="Spanisch";
$elem["console-keymaps-at/keymap"]["choicesde"][39]="Schwedisch";
$elem["console-keymaps-at/keymap"]["choicesde"][40]="Schweizerisches Französisch";
$elem["console-keymaps-at/keymap"]["choicesde"][41]="Schweizerdeutsch";
$elem["console-keymaps-at/keymap"]["choicesde"][42]="Thailändisch";
$elem["console-keymaps-at/keymap"]["choicesde"][43]="Türkisch (F-Anordnung)";
$elem["console-keymaps-at/keymap"]["choicesde"][44]="Türkisch (Q-Anordnung)";
$elem["console-keymaps-at/keymap"]["choicesfr"][1]="États-Unis";
$elem["console-keymaps-at/keymap"]["choicesfr"][2]="Bélarusse";
$elem["console-keymaps-at/keymap"]["choicesfr"][3]="Belge";
$elem["console-keymaps-at/keymap"]["choicesfr"][4]="Brésilien (br-abnt2)";
$elem["console-keymaps-at/keymap"]["choicesfr"][5]="Brésilien (br-latin1)";
$elem["console-keymaps-at/keymap"]["choicesfr"][6]="Britannique";
$elem["console-keymaps-at/keymap"]["choicesfr"][7]="Bulgare";
$elem["console-keymaps-at/keymap"]["choicesfr"][8]="Canadien français";
$elem["console-keymaps-at/keymap"]["choicesfr"][9]="Canadien multilingue";
$elem["console-keymaps-at/keymap"]["choicesfr"][10]="Croate";
$elem["console-keymaps-at/keymap"]["choicesfr"][11]="Tchèque";
$elem["console-keymaps-at/keymap"]["choicesfr"][12]="Danois";
$elem["console-keymaps-at/keymap"]["choicesfr"][13]="Néerlandais";
$elem["console-keymaps-at/keymap"]["choicesfr"][14]="Dvorak";
$elem["console-keymaps-at/keymap"]["choicesfr"][15]="Estonien";
$elem["console-keymaps-at/keymap"]["choicesfr"][16]="Finnois";
$elem["console-keymaps-at/keymap"]["choicesfr"][17]="Français (fr-latin9)";
$elem["console-keymaps-at/keymap"]["choicesfr"][18]="Allemand";
$elem["console-keymaps-at/keymap"]["choicesfr"][19]="Grec";
$elem["console-keymaps-at/keymap"]["choicesfr"][20]="Hébreu";
$elem["console-keymaps-at/keymap"]["choicesfr"][21]="Hongrois";
$elem["console-keymaps-at/keymap"]["choicesfr"][22]="Islandais";
$elem["console-keymaps-at/keymap"]["choicesfr"][23]="Italien";
$elem["console-keymaps-at/keymap"]["choicesfr"][24]="Japonais";
$elem["console-keymaps-at/keymap"]["choicesfr"][25]="Kirghize";
$elem["console-keymaps-at/keymap"]["choicesfr"][26]="Amérique latine";
$elem["console-keymaps-at/keymap"]["choicesfr"][27]="Letton";
$elem["console-keymaps-at/keymap"]["choicesfr"][28]="Lithuanien";
$elem["console-keymaps-at/keymap"]["choicesfr"][29]="Macédonien";
$elem["console-keymaps-at/keymap"]["choicesfr"][30]="Norvégien";
$elem["console-keymaps-at/keymap"]["choicesfr"][31]="Polonais";
$elem["console-keymaps-at/keymap"]["choicesfr"][32]="Portugais";
$elem["console-keymaps-at/keymap"]["choicesfr"][33]="Roumain";
$elem["console-keymaps-at/keymap"]["choicesfr"][34]="Russe";
$elem["console-keymaps-at/keymap"]["choicesfr"][35]="Serbe";
$elem["console-keymaps-at/keymap"]["choicesfr"][36]="Slovaque";
$elem["console-keymaps-at/keymap"]["choicesfr"][37]="Slovène";
$elem["console-keymaps-at/keymap"]["choicesfr"][38]="Espagnol";
$elem["console-keymaps-at/keymap"]["choicesfr"][39]="Suédois";
$elem["console-keymaps-at/keymap"]["choicesfr"][40]="Suisse romand";
$elem["console-keymaps-at/keymap"]["choicesfr"][41]="Suisse alémanique";
$elem["console-keymaps-at/keymap"]["choicesfr"][42]="Thaï";
$elem["console-keymaps-at/keymap"]["choicesfr"][43]="Turc (trfu)";
$elem["console-keymaps-at/keymap"]["choicesfr"][44]="Turc (trqu)";
$elem["console-keymaps-at/keymap"]["description"]="Keymap to use:
";
$elem["console-keymaps-at/keymap"]["descriptionde"]="Wählen Sie das Layout für die Tastatur aus:
";
$elem["console-keymaps-at/keymap"]["descriptionfr"]="Carte de clavier à utiliser :
";
$elem["console-keymaps-at/keymap"]["default"]="";
$elem["console-keymaps-atari/keymap"]["type"]="select";
$elem["console-keymaps-atari/keymap"]["choices"][1]="American English";
$elem["console-keymaps-atari/keymap"]["choices"][2]="British English";
$elem["console-keymaps-atari/keymap"]["choices"][3]="French";
$elem["console-keymaps-atari/keymap"]["choices"][4]="German";
$elem["console-keymaps-atari/keymap"]["choicesde"][1]="Amerikanisches Englisch";
$elem["console-keymaps-atari/keymap"]["choicesde"][2]="Britisches Englisch";
$elem["console-keymaps-atari/keymap"]["choicesde"][3]="Französisch";
$elem["console-keymaps-atari/keymap"]["choicesde"][4]="Deutsch";
$elem["console-keymaps-atari/keymap"]["choicesfr"][1]="États-Unis";
$elem["console-keymaps-atari/keymap"]["choicesfr"][2]="Britannique";
$elem["console-keymaps-atari/keymap"]["choicesfr"][3]="Français (fr-latin9)";
$elem["console-keymaps-atari/keymap"]["choicesfr"][4]="Allemand";
$elem["console-keymaps-atari/keymap"]["description"]="Keymap to use:
";
$elem["console-keymaps-atari/keymap"]["descriptionde"]="Wählen Sie das Layout für die Tastatur aus:
";
$elem["console-keymaps-atari/keymap"]["descriptionfr"]="Carte de clavier à utiliser :
";
$elem["console-keymaps-atari/keymap"]["default"]="";
$elem["console-keymaps-dec/keymap"]["type"]="select";
$elem["console-keymaps-dec/keymap"]["description"]="Keymap to use:
";
$elem["console-keymaps-dec/keymap"]["descriptionde"]="Wählen Sie das Layout für die Tastatur aus:
";
$elem["console-keymaps-dec/keymap"]["descriptionfr"]="Carte de clavier à utiliser :
";
$elem["console-keymaps-dec/keymap"]["default"]="";
$elem["console-keymaps-mac/keymap"]["type"]="select";
$elem["console-keymaps-mac/keymap"]["choices"][1]="American English (82 keys)";
$elem["console-keymaps-mac/keymap"]["choices"][2]="American English (extended kbd)";
$elem["console-keymaps-mac/keymap"]["choices"][3]="French (alternate)";
$elem["console-keymaps-mac/keymap"]["choices"][4]="French (extended kbd)";
$elem["console-keymaps-mac/keymap"]["choicesde"][1]="Amerikanisches Englisch (Mac - 82 Tasten)";
$elem["console-keymaps-mac/keymap"]["choicesde"][2]="Amerikanisches Englisch (Mac - erweitert)";
$elem["console-keymaps-mac/keymap"]["choicesde"][3]="Französisch (Mac - alternativ)";
$elem["console-keymaps-mac/keymap"]["choicesde"][4]="Französisch (Mac - erweitert)";
$elem["console-keymaps-mac/keymap"]["choicesfr"][1]="États-Unis (82 touches)";
$elem["console-keymaps-mac/keymap"]["choicesfr"][2]="États-Unis étendu";
$elem["console-keymaps-mac/keymap"]["choicesfr"][3]="Français type 3";
$elem["console-keymaps-mac/keymap"]["choicesfr"][4]="Français type 2";
$elem["console-keymaps-mac/keymap"]["description"]="Keymap to use:
";
$elem["console-keymaps-mac/keymap"]["descriptionde"]="Wählen Sie das Layout für die Tastatur aus:
";
$elem["console-keymaps-mac/keymap"]["descriptionfr"]="Carte de clavier à utiliser :
";
$elem["console-keymaps-mac/keymap"]["default"]="";
$elem["console-keymaps-sun/keymap"]["type"]="select";
$elem["console-keymaps-sun/keymap"]["choices"][1]="American English";
$elem["console-keymaps-sun/keymap"]["choices"][2]="British English";
$elem["console-keymaps-sun/keymap"]["choices"][3]="Czech";
$elem["console-keymaps-sun/keymap"]["choices"][4]="Finnish";
$elem["console-keymaps-sun/keymap"]["choices"][5]="French";
$elem["console-keymaps-sun/keymap"]["choices"][6]="German";
$elem["console-keymaps-sun/keymap"]["choices"][7]="Japanese (type 4)";
$elem["console-keymaps-sun/keymap"]["choices"][8]="Japanese (type 5)";
$elem["console-keymaps-sun/keymap"]["choices"][9]="Norwegian (type 4)";
$elem["console-keymaps-sun/keymap"]["choices"][10]="Norwegian (type 5)";
$elem["console-keymaps-sun/keymap"]["choices"][11]="Polish";
$elem["console-keymaps-sun/keymap"]["choices"][12]="Russian";
$elem["console-keymaps-sun/keymap"]["choices"][13]="Spanish (type 4)";
$elem["console-keymaps-sun/keymap"]["choices"][14]="Spanish (type 5)";
$elem["console-keymaps-sun/keymap"]["choicesde"][1]="Amerikanisches Englisch";
$elem["console-keymaps-sun/keymap"]["choicesde"][2]="Britisches Englisch";
$elem["console-keymaps-sun/keymap"]["choicesde"][3]="Tschechisch";
$elem["console-keymaps-sun/keymap"]["choicesde"][4]="Finnisch";
$elem["console-keymaps-sun/keymap"]["choicesde"][5]="Französisch";
$elem["console-keymaps-sun/keymap"]["choicesde"][6]="Deutsch";
$elem["console-keymaps-sun/keymap"]["choicesde"][7]="Japanisch (Sun - Typ 4)";
$elem["console-keymaps-sun/keymap"]["choicesde"][8]="Japanisch (Sun - Typ 5)";
$elem["console-keymaps-sun/keymap"]["choicesde"][9]="Norwegisch (Sun - Typ 4)";
$elem["console-keymaps-sun/keymap"]["choicesde"][10]="Norwegisch (Sun - Typ 5)";
$elem["console-keymaps-sun/keymap"]["choicesde"][11]="Polnisch";
$elem["console-keymaps-sun/keymap"]["choicesde"][12]="Russisch";
$elem["console-keymaps-sun/keymap"]["choicesde"][13]="Spanisch (Sun - Typ 4)";
$elem["console-keymaps-sun/keymap"]["choicesde"][14]="Spanisch (Sun - Typ 5)";
$elem["console-keymaps-sun/keymap"]["choicesfr"][1]="États-Unis";
$elem["console-keymaps-sun/keymap"]["choicesfr"][2]="Britannique";
$elem["console-keymaps-sun/keymap"]["choicesfr"][3]="Tchèque";
$elem["console-keymaps-sun/keymap"]["choicesfr"][4]="Finnois";
$elem["console-keymaps-sun/keymap"]["choicesfr"][5]="Français (fr-latin9)";
$elem["console-keymaps-sun/keymap"]["choicesfr"][6]="Allemand";
$elem["console-keymaps-sun/keymap"]["choicesfr"][7]="Japonais (sunt4-ja)";
$elem["console-keymaps-sun/keymap"]["choicesfr"][8]="Japonais (sunt5-ja)";
$elem["console-keymaps-sun/keymap"]["choicesfr"][9]="Norvégien (type 4)";
$elem["console-keymaps-sun/keymap"]["choicesfr"][10]="Norvégien (type 5)";
$elem["console-keymaps-sun/keymap"]["choicesfr"][11]="Polonais";
$elem["console-keymaps-sun/keymap"]["choicesfr"][12]="Russe";
$elem["console-keymaps-sun/keymap"]["choicesfr"][13]="Espagnol (type 4)";
$elem["console-keymaps-sun/keymap"]["choicesfr"][14]="Espagnol (type 5)";
$elem["console-keymaps-sun/keymap"]["description"]="Keymap to use:
";
$elem["console-keymaps-sun/keymap"]["descriptionde"]="Wählen Sie das Layout für die Tastatur aus:
";
$elem["console-keymaps-sun/keymap"]["descriptionfr"]="Carte de clavier à utiliser :
";
$elem["console-keymaps-sun/keymap"]["default"]="";
$elem["console-keymaps-usb/keymap"]["type"]="select";
$elem["console-keymaps-usb/keymap"]["choices"][1]="American English";
$elem["console-keymaps-usb/keymap"]["choices"][2]="Belgian";
$elem["console-keymaps-usb/keymap"]["choices"][3]="British English";
$elem["console-keymaps-usb/keymap"]["choices"][4]="Danish";
$elem["console-keymaps-usb/keymap"]["choices"][5]="Dvorak";
$elem["console-keymaps-usb/keymap"]["choices"][6]="Finnish";
$elem["console-keymaps-usb/keymap"]["choices"][7]="French";
$elem["console-keymaps-usb/keymap"]["choices"][8]="German";
$elem["console-keymaps-usb/keymap"]["choices"][9]="Italian";
$elem["console-keymaps-usb/keymap"]["choices"][10]="Italian";
$elem["console-keymaps-usb/keymap"]["choices"][11]="Portuguese";
$elem["console-keymaps-usb/keymap"]["choices"][12]="Spanish";
$elem["console-keymaps-usb/keymap"]["choices"][13]="Swedish";
$elem["console-keymaps-usb/keymap"]["choices"][14]="Swiss French";
$elem["console-keymaps-usb/keymap"]["choicesde"][1]="Amerikanisches Englisch";
$elem["console-keymaps-usb/keymap"]["choicesde"][2]="Belgisch";
$elem["console-keymaps-usb/keymap"]["choicesde"][3]="Britisches Englisch";
$elem["console-keymaps-usb/keymap"]["choicesde"][4]="Dänisch";
$elem["console-keymaps-usb/keymap"]["choicesde"][5]="Dvorak";
$elem["console-keymaps-usb/keymap"]["choicesde"][6]="Finnisch";
$elem["console-keymaps-usb/keymap"]["choicesde"][7]="Französisch";
$elem["console-keymaps-usb/keymap"]["choicesde"][8]="Deutsch";
$elem["console-keymaps-usb/keymap"]["choicesde"][9]="Italienisch";
$elem["console-keymaps-usb/keymap"]["choicesde"][10]="Italienisch";
$elem["console-keymaps-usb/keymap"]["choicesde"][11]="Portugiesisch";
$elem["console-keymaps-usb/keymap"]["choicesde"][12]="Spanisch";
$elem["console-keymaps-usb/keymap"]["choicesde"][13]="Schwedisch";
$elem["console-keymaps-usb/keymap"]["choicesde"][14]="Schweizerisches Französisch";
$elem["console-keymaps-usb/keymap"]["choicesfr"][1]="États-Unis";
$elem["console-keymaps-usb/keymap"]["choicesfr"][2]="Belge";
$elem["console-keymaps-usb/keymap"]["choicesfr"][3]="Britannique";
$elem["console-keymaps-usb/keymap"]["choicesfr"][4]="Danois";
$elem["console-keymaps-usb/keymap"]["choicesfr"][5]="Dvorak";
$elem["console-keymaps-usb/keymap"]["choicesfr"][6]="Finnois";
$elem["console-keymaps-usb/keymap"]["choicesfr"][7]="Français (fr-latin9)";
$elem["console-keymaps-usb/keymap"]["choicesfr"][8]="Allemand";
$elem["console-keymaps-usb/keymap"]["choicesfr"][9]="Italien";
$elem["console-keymaps-usb/keymap"]["choicesfr"][10]="Italien";
$elem["console-keymaps-usb/keymap"]["choicesfr"][11]="Portugais";
$elem["console-keymaps-usb/keymap"]["choicesfr"][12]="Espagnol";
$elem["console-keymaps-usb/keymap"]["choicesfr"][13]="Suédois";
$elem["console-keymaps-usb/keymap"]["choicesfr"][14]="Suisse romand";
$elem["console-keymaps-usb/keymap"]["description"]="Keymap to use for a USB keyboard:
";
$elem["console-keymaps-usb/keymap"]["descriptionde"]="Wählen Sie das Tastaturlayout für die USB-Tastatur aus:
";
$elem["console-keymaps-usb/keymap"]["descriptionfr"]="Carte de clavier à utiliser pour un clavier USB :
";
$elem["console-keymaps-usb/keymap"]["default"]="";
PKG_OptionPageTail2($elem);
?>
