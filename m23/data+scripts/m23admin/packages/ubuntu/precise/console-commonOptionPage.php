<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("console-common");

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
PKG_OptionPageTail2($elem);
?>
