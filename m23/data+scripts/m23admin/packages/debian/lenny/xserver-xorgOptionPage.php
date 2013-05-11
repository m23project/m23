<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xserver-xorg");

$elem["xserver-xorg/config/device/driver"]["type"]="select";
$elem["xserver-xorg/config/device/driver"]["description"]="X server driver:
 For the X Window System graphical user interface to operate correctly, it is
 necessary to select a video card driver for the X server.
 .
 Drivers are typically named for the video card or chipset manufacturer, or
 for a specific model or family of chipsets.
";
$elem["xserver-xorg/config/device/driver"]["descriptionde"]="X-Server-Treiber:
 Damit grafische Benutzeroberflächen mit dem »X Window System« korrekt arbeiten, muss ein Grafikkartentreiber für den X-Server gewählt werden.
 .
 Die Treiber sind meist nach der Grafikkarte oder dem Hersteller des verwendeten Chipsets, einem speziellen Modell oder einer Familie von Chipsets benannt.
";
$elem["xserver-xorg/config/device/driver"]["descriptionfr"]="Pilote de serveur X :
 Pour que l'interface graphique utilisateur du système X Window fonctionne convenablement, il est nécessaire de choisir un pilote de carte graphique pour le serveur X.
 .
 Les pilotes sont en général nommés d'après le nom du fabricant de la carte vidéo ou du circuit graphique ; le nom peut aussi faire référence à un modèle particulier ou à toute une famille de circuits.
";
$elem["xserver-xorg/config/device/driver"]["default"]="";
$elem["xserver-xorg/config/device/use_fbdev"]["type"]="boolean";
$elem["xserver-xorg/config/device/use_fbdev"]["description"]="Use kernel framebuffer device interface?
 Rather than communicating directly with the video hardware, the X server may
 be configured to perform some operations, such as video mode switching, via
 the kernel's framebuffer driver.
 .
 In theory, either approach should work, but in practice, sometimes one does
 and the other does not.  Enabling this option is the safe bet, but feel free
 to turn it off if it appears to cause problems.
";
$elem["xserver-xorg/config/device/use_fbdev"]["descriptionde"]="Kernel-Framebuffer-Schnittstelle benutzen?
 Anstatt direkt mit der Grafikhardware zu kommunizieren, kann der X-Server so konfiguriert werden, dass einige Operationen, wie z.B. Grafikumschaltung, über das Kernel-Framebuffer-Gerät abgewickelt werden.
 .
 Theoretisch sollten beide Ansätze funktionieren, in der Praxis funktioniert aber die eine oder andere Variante manchmal nicht. Das Aktivieren dieser Option sollte funktionieren, kann aber bei Problemen auch deaktiviert werden.
";
$elem["xserver-xorg/config/device/use_fbdev"]["descriptionfr"]="Faut-il utiliser l'interface de mise en tampon vidéo (« framebuffer ») du noyau ?
 Plutôt que de s'adresser directement au matériel vidéo, le serveur X peut être configuré afin d'effectuer certaines actions, telles que le changement de mode vidéo, via le pilote « framebuffer » du noyau.
 .
 En théorie, les deux approches devraient fonctionner, mais en pratique, il se peut que l'une ou l'autre ne fonctionne pas. Activer cette option n'est pas un pari audacieux, mais libre à vous de la désactiver si cela semble poser des problèmes.
";
$elem["xserver-xorg/config/device/use_fbdev"]["default"]="";
$elem["xserver-xorg/config/device/bus_id"]["type"]="string";
$elem["xserver-xorg/config/device/bus_id"]["description"]="Video card's bus identifier:
 Users of PowerPC machines, and users of any computer with multiple video
 devices, should specify the BusID of the video card in an accepted
 bus-specific format.
 .
 Examples:
 .
  ISA:1
  PCI:0:16:0
  SBUS:/iommu@0,10000000/sbus@0,10001000/SUNW,tcx@2,800000
 .
 For users of multi-head setups, this option will configure only one of the
 heads.  Further configuration will have to be done manually in the X server
 configuration file, /etc/X11/xorg.conf.
 .
 You may wish to use the \"lspci\" command to determine the bus location of
 your PCI, AGP, or PCI-Express video card.
 .
 When possible, this question has been pre-answered for you and you should
 accept the default unless you know it doesn't work.
";
$elem["xserver-xorg/config/device/bus_id"]["descriptionde"]="Bus-Identifikator der Grafikkarte:
 Benutzer von PowerPC-Computern oder Rechnern mit mehreren Grafikkarten sollten die BusID der Grafikkarte in einem Bus-spezifischen Format angeben.
 .
 Beispiele:
 .
  ISA:1
  PCI:0:16:0
  SBUS:/iommu@0,10000000/sbus@0,10001000/SUNW,tcx@2,800000
 .
 Diese Option konfiguriert auch bei Mehr-Monitor-Konfigurationen (Multi-Head) nur den primären Monitor, die weiteren Monitore müssen manuell in der X-Server-Konfigurationsdatei /etc/X11/xorg.conf konfiguriert werden.
 .
 Sie können das Kommando »lspci« benutzen, um die Busadresse Ihrer PCI-, AGP- oder PCI-Express-Graphikkarte zu bestimmen.
 .
 Wenn möglich ist diese Antwort schon mit dem passenden Wert belegt und dieser Standardwert sollte auch akzeptiert werden, es sei denn, man weiß, dass er nicht funktioniert.
";
$elem["xserver-xorg/config/device/bus_id"]["descriptionfr"]="Identifiant du bus de la carte vidéo :
 Les utilisateurs de machines PowerPC et les utilisateurs d'ordinateurs avec plusieurs cartes vidéo, doivent préciser l'identifiant du bus de la carte vidéo dans un format adapté au bus concerné.
 .
 Exemples :
 .
  ISA:1
  PCI:0:16:0
  SBUS:/iommu@0,10000000/sbus@0,10001000/SUNW,tcx@2,800000
 .
 Si votre matériel comporte plusieurs sorties graphiques (« multi-head »), cette option ne configurera que l'une des sorties. Le reste de la configuration devra se faire manuellement, dans le fichier de configuration du serveur /etc/X11/xorg.conf.
 .
 Il est possible d'utiliser la commande « lspci » pour déterminer l'identifiant de votre carte graphique, sur bus PCI, AGP ou PCI-Express.
 .
 Dans la mesure du possible, cette question est déjà préremplie, et il vous suffit d'accepter la réponse par défaut, sauf si vous savez qu'elle ne fonctionnera pas.
";
$elem["xserver-xorg/config/device/bus_id"]["default"]="";
$elem["xserver-xorg/config/device/bus_id_error"]["type"]="note";
$elem["xserver-xorg/config/device/bus_id_error"]["description"]="Incorrect format for the bus identifier
";
$elem["xserver-xorg/config/device/bus_id_error"]["descriptionde"]="Falsches Format für den Bus-Identifikator
";
$elem["xserver-xorg/config/device/bus_id_error"]["descriptionfr"]="Format incorrect pour l'identificateur du bus
";
$elem["xserver-xorg/config/device/bus_id_error"]["default"]="";
$elem["xserver-xorg/config/inputdevice/keyboard/rules"]["type"]="string";
$elem["xserver-xorg/config/inputdevice/keyboard/rules"]["description"]="XKB rule set to use:
 For the X server to handle the keyboard correctly, an XKB rule set must be
 chosen.
 .
 Users of most keyboards should enter \"xorg\".
 .
 Experienced users can use any defined XKB rule set.  If the xkb-data
 package has been unpacked, see the /usr/share/X11/xkb/rules directory for
 available rule sets.
 .
 When in doubt, this value should be set to \"xorg\".
";
$elem["xserver-xorg/config/inputdevice/keyboard/rules"]["descriptionde"]="Zu verwendender XKB-Regelsatz:
 Damit der X-Server die Tastatur korrekt ansteuern kann, muss ein XKB-Regelsatz ausgewählt werden.
 .
 Benutzer der meisten Tastaturen sollten »xorg« eingeben.
 .
 Fortgeschrittene Benutzer können jeden definierten XKB-Regelsatz verwenden. Wenn das xkb-data-Paket entpackt wurde, finden Sie im Verzeichnis /usr/share/X11/xkb/rules die verfügbaren Regelsätze.
 .
 Im Zweifelsfall sollte dieser Wert auf »xorg« gesetzt werden.
";
$elem["xserver-xorg/config/inputdevice/keyboard/rules"]["descriptionfr"]="Jeu de définitions XKB à utiliser :
 Pour que le clavier soit géré convenablement par le serveur X, vous devez choisir un jeu de définitions XKB.
 .
 La plupart des claviers devraient être correctement gérés en choisissant « xorg ».
 .
 Les utilisateurs expérimentés peuvent choisir n'importe quel jeu de définitions XKB. Si le paquet xkb-data a été installé, veuillez lire les fichiers du répertoire /usr/share/X11/xkb/rules pour voir les jeux disponibles.
 .
 Dans le doute, il est conseillé d'indiquer « xorg ».
";
$elem["xserver-xorg/config/inputdevice/keyboard/rules"]["default"]="";
$elem["xserver-xorg/config/inputdevice/keyboard/model"]["type"]="string";
$elem["xserver-xorg/config/inputdevice/keyboard/model"]["description"]="Keyboard model:
 For the X server to handle the keyboard correctly, a keyboard model must be
 entered.  Available models depend on which XKB rule set is in use.
 .
  With the \"xorg\" rule set:
  - pc101: traditional IBM PC/AT style keyboard with 101 keys, common in
           the United States.  Has no \"logo\" or \"menu\" keys;
  - pc104: similar to pc101 model, with additional keys, usually engraved
           with a \"logo\" symbol and a \"menu\" symbol;
  - pc102: similar to pc101 and often found in Europe. Includes a \"< >\" key;
  - pc105: similar to pc104 and often found in Europe. Includes a \"< >\" key;
  - macintosh: Macintosh keyboards using the new input layer with Linux
               keycodes;
  - macintosh_old: Macintosh keyboards not using the new input layer;
  - type4: Sun Type4 keyboards;
  - type5: Sun Type5 keyboards.
 .
 Laptop keyboards often do not have as many keys as standalone models; laptop
 users should select the keyboard model most closely approximated by the
 above.
 .
 Experienced users can use any model defined by the selected XKB rule set.  If
 the xkb-data package has been unpacked, see the /usr/share/X11/xkb/rules
 directory for available rule sets.
 .
 Users of U.S. English keyboards should generally enter \"pc104\".  Users of
 most other keyboards should generally enter \"pc105\".
";
$elem["xserver-xorg/config/inputdevice/keyboard/model"]["descriptionde"]="Tastaturmodell:
 Damit der X-Server die Tastatur korrekt ansteuern kann, muss das richtige Tastaturmodell gewählt werden. Die Auswahlmöglichkeiten hängen vom verwendeten XKB-Regelsatz ab.
 .
  Mit dem Regelsatz »xorg«:
  - pc101: traditionelle IBM PC/AT-artige Tastatur mit 101 Tasten,
           gebräuchlich in den Vereinigten Staaten. Sie hat keine Logo-
           oder Menütasten;
  - pc104: ähnlich zum pc101-Modell mit zusätzlichen Tasten, meist mit
           einem Logo- und Menüsymbol versehen;
  - pc102: ähnlich zu pc101 und oft in Europa gefunden. Enthält eine
           »< >«-Taste;
  - pc105: ähnlich zu pc104 und oft in Europa gefunden. Enthält eine
           »< >«-Taste;
  - macintosh: Macintosh-Tastaturen, die die neue Eingabeschicht mit
               Linux-Tastaturcodes verwenden;
  - macintosh_old: Macintosh-Tastaturen, die die neue Eingabeschicht
                   nicht verwenden;
  - type4: Sun Type4-Tastaturen;
  - type5: Sun Type5-Tastaturen.
 .
 Laptop-Tastaturen haben oft weniger Tasten, es sollte dann das Modell gewählt werden, das der vorhandenen Tastatur am ehesten entspricht.
 .
 Fortgeschrittene Benutzer können jedes vom ausgewählten XKB-Regelsatz definierte Tastaturmodell verwenden. Wenn das xkb-data-Paket entpackt wurde, finden Sie im Verzeichnis /usr/share/X11/xkb/rules die verfügbaren Regelsätze.
 .
 Benutzer von US-englischen Tastaturen sollten im Allgemeinen »pc104« wählen. Für Benutzer der meisten anderen Tastaturen wird wahrscheinlich »pc105« am geeignetsten sein.
";
$elem["xserver-xorg/config/inputdevice/keyboard/model"]["descriptionfr"]="Modèle de clavier :
 Afin que le serveur X gère le clavier convenablement, il faut choisir un type de clavier. Les modèles disponibles dépendent du jeu de définitions XKB qui a été choisi.
 .
 Pour le jeu de règles « xorg » :
  - pc101 : clavier classique IBM PC/AT comportant 101 touches, répandu
            aux États-Unis. Il ne comporte pas les touches « logo »
            ou « menu » ;
  - pc104 : semblable au modèle « pc101 », avec des touches
            supplémentaires souvent gravées des symboles « logo »
            et « menu » ;
  - pc102 : semblable à « pc101 » et utilisé fréquemment en Europe.
            Comporte une touche « inférieur à » et « supérieur à » ;
  - pc105 : semblable à « pc104 » et utilisé fréquemment en Europe.
            Comporte une touche « inférieur à » et « supérieur à » ;
  - macintosh : claviers Macintosh utilisant la nouvelle interface basée
                sur les codes de clavier Linux ;
  - macintosh_old : claviers Macintosh n'utilisant pas cette interface ;
  - type4 : claviers Sun Type4 ;
  - type5 : claviers Sun Type5.
 .
 Les claviers d'ordinateurs portables ont en général moins de touches que les modèles de bureau ; leurs utilisateurs doivent choisir le modèle de clavier qui se rapproche le plus du leur parmi ceux proposés.
 .
 Les utilisateurs expérimentés peuvent utiliser n'importe quel modèle défini par le jeu de définitions XKB choisi. Si le paquet xkb-data a été installé, consultez le répertoire /usr/share/X11/xkb/rules pour les jeux de définitions disponibles.
 .
 Les utilisateurs de claviers anglais U.S. doivent en règle générale choisir « pc104 ». Pour la plupart des autres claviers, il faut choisir « pc105 ».
";
$elem["xserver-xorg/config/inputdevice/keyboard/model"]["default"]="";
$elem["xserver-xorg/config/inputdevice/keyboard/layout"]["type"]="string";
$elem["xserver-xorg/config/inputdevice/keyboard/layout"]["description"]="Keyboard layout:
 For the X server to handle the keyboard correctly, a keyboard layout must be
 entered.  Available layouts depend on which XKB rule set and keyboard model
 were previously selected.
 .
 Experienced users can use any layout supported by the selected XKB rule set.  If
 the xkb-data package has been unpacked, see the /usr/share/X11/xkb/rules
 directory for available rule sets.
 .
 Users of U.S. English keyboards should enter \"us\".  Users of keyboards
 localized for other countries should generally enter their ISO 3166 country
 code.  E.g., France uses \"fr\", and Germany uses \"de\".
";
$elem["xserver-xorg/config/inputdevice/keyboard/layout"]["descriptionde"]="Tastaturbelegung:
 Damit der X-Server die Tastatur korrekt ansteuern kann, muss die richtige Tastaturbelegung gewählt werden. Die verfügbaren Layouts hängen vom vorher gewählten XKB-Regelsatz und Tastaturmodell ab.
 .
 Fortgeschrittene Benutzer können jedes vom ausgewählten XKB-Regelsatz definierte Tastaturmodell verwenden. Wenn das xkb-data-Paket entpackt wurde, finden Sie im Verzeichnis /usr/share/X11/xkb/rules die verfügbaren Regelsätze.
 .
 Benutzer von US-englischen Tastaturen sollten »us« wählen. Benutzer von Tastaturen, die für die bestimmte Sprachen/Länder angepasst sind, sollten den jeweiligen ISO 3166 Ländercode eingeben, z.B. »fr« für Frankreich und »de« für Deutschland.
";
$elem["xserver-xorg/config/inputdevice/keyboard/layout"]["descriptionfr"]="Disposition du clavier :
 Pour que le clavier soit géré convenablement par le serveur X, il faut que vous indiquiez la disposition de ses touches. Les dispositions possibles dépendent du jeu de définitions XKB et du modèle de clavier précédemment sélectionnés.
 .
 Les utilisateurs expérimentés peuvent utiliser n'importe quel modèle défini par le jeu de définitions XKB choisi. Si le paquet xkb-data a été installé, consultez le répertoire /usr/share/X11/xkb/rules pour les jeux de définitions disponibles.
 .
 Les utilisateurs de claviers français devraient choisir « fr ». Les utilisateurs de claviers d'autres pays devraient normalement entrer le code ISO 3166 de leur pays (par exemple, « be » pour la Belgique ou « ch » pour la Suisse).
";
$elem["xserver-xorg/config/inputdevice/keyboard/layout"]["default"]="";
$elem["xserver-xorg/config/inputdevice/keyboard/variant"]["type"]="string";
$elem["xserver-xorg/config/inputdevice/keyboard/variant"]["description"]="Keyboard variant:
 For the X server to handle the keyboard as desired, a keyboard variant
 may be entered.  Available variants depend on which XKB rule set, model, and
 layout were previously selected.
 .
 Many keyboard layouts support an option to treat \"dead\" keys such as
 non-spacing accent marks and diaereses as normal spacing keys, and if this is
 the preferred behavior, enter \"nodeadkeys\".
 .
 Experienced users can use any variant supported by the selected XKB layout.  If
 the xkb-data package has been unpacked, see the /usr/share/X11/xkb/symbols
 directory for the file corresponding to your selected layout for available
 variants.
 .
 Users of U.S. English keyboards should generally leave this entry blank.
";
$elem["xserver-xorg/config/inputdevice/keyboard/variant"]["descriptionde"]="Tastaturvariante:
 Sie können eine Tastaturvariante wählen, damit der X-Server die Tastatur Ihren Wünschen entsprechend ansteuert. Welche Varianten verfügbar sind, hängt davon ab, welche Auswahl von XKB-Regelsatz, Tastaturmodell und -belegung getroffen wurde.
 .
 Viele Tastaturbelegungen bieten die Möglichkeit, so genannte Tot-Tasten (z.B. Akzente und Zirkumflex) als normale Tasten zu betreiben, z.B. erzeugt dann ein Druck auf »^« das Zeichen ^, normalerweise muss man dafür ^ gefolgt von einem Leerzeichen eingeben. Wenn das gewünscht wird, sollte hier »nodeadkeys« eingegeben werden.
 .
 Fortgeschrittene Benutzer können jede vom ausgewählten XKB-Layout unterstützte Variante verwenden. Wenn das xkb-data-Paket entpackt wurde, finden Sie im Verzeichnis /usr/share/X11/xkb/symbols die für Ihre Tastatur verfügbaren Varianten.
 .
 Benutzer von US-englischen Tastaturen sollten dieses Feld leer lassen.
";
$elem["xserver-xorg/config/inputdevice/keyboard/variant"]["descriptionfr"]="Variante du clavier :
 Vous pouvez indiquer une variante de clavier particulière afin que le serveur X puisse gérer le clavier selon vos désirs. Les options disponibles dépendent du jeu de définitions XKB, du modèle et de la disposition choisis précédemment.
 .
 Plusieurs dispositions de clavier ont une option qui gère les touches « mortes » (essentiellement la touche « circonflexe/tréma ») comme entrant un circonflexe seul ou un tréma seul. Si c'est ce que vous préférez, indiquez ici « nodeadkeys ».
 .
 Les utilisateurs expérimentés peuvent utiliser n'importe quelle variante du jeu de définitions XKB choisi. Si le paquet xkb-data a été installé, veuillez lire le fichier du répertoire /usr/share/X11/xkb/symbols qui correspond à votre disposition pour voir les variantes disponibles.
 .
 Les utilisateurs de clavier français devraient choisir la variante latin9 s'ils ont choisi la disposition « fr ».
";
$elem["xserver-xorg/config/inputdevice/keyboard/variant"]["default"]="";
$elem["xserver-xorg/config/inputdevice/keyboard/options"]["type"]="string";
$elem["xserver-xorg/config/inputdevice/keyboard/options"]["description"]="Keyboard options:
 For the X server to handle the keyboard as desired, keyboard options may
 be entered.  Available options depend on which XKB rule set was previously
 selected.  Not all options will work with every keyboard model and layout.
 .
 For example, if you wish the Caps Lock key to behave as an additional
 Control key, you may enter \"ctrl:nocaps\"; if you would like to switch the
 Caps Lock and left Control keys, you may enter \"ctrl:swapcaps\".
 .
 As another example, some people prefer having the Meta keys available on
 their keyboard's Alt keys (this is the default), while other people prefer
 having the Meta keys on the Windows or \"logo\" keys instead.  If you
 prefer to use your Windows or logo keys as Meta keys, you may enter
 \"altwin:meta_win\".
 .
 You can combine options by separating them with a comma, for instance
 \"ctrl:nocaps,altwin:meta_win\".
 .
 Experienced users can use any options compatible with the selected XKB model,
 layout and variant.
 .
 When in doubt, this value should be left blank.
";
$elem["xserver-xorg/config/inputdevice/keyboard/options"]["descriptionde"]="Tastaturoptionen:
 Es können hier Tastaturoptionen eingegeben werden, damit der X-Server die Tastatur Ihren Wünschen entsprechend ansteuert. Mögliche Optionen hängen vom zuvor gewählten XKB-Regelsatz ab. Nicht alle Optionen funktionieren mit allen Tastaturmodellen und -belegungen.
 .
 Beispiele: »ctrl:nocaps« macht die Feststelltaste (CapsLock) zur zusätzlichen Strg-Taste (Ctrl), »ctrl:swapcaps« vertauscht die Belegung von linker Strg- und Feststelltaste.
 .
 Als weiteres Beispiel gibt es Leute, die die Meta-Tasten auf den Alt-Tasten liegen bevorzugen (dies ist der Standard), wohingegen andere Leute die Meta-Tasten lieber der Windows- (Logo-)Taste zuordnen. Wenn Sie Ihre Windows- bzw. Logo-Tasten als Meta-Tasten verwenden wollen, können Sie »altwin:meta_win« eingeben.
 .
 Sie können Optionen kombinieren, indem Sie sie durch Kommata trennen, zum Beispiel »ctrl:nocaps,altwin:meta_win«.
 .
 Erfahrene Benutzer können jede zum gewählten XKB-Modell, -Layout und -Variante kompatible Option verwenden.
 .
 Im Zweifelsfall sollte dieser Wert leergelassen werden.
";
$elem["xserver-xorg/config/inputdevice/keyboard/options"]["descriptionfr"]="Options du clavier :
 Pour que le serveur X puisse gérer le clavier selon vos souhaits, vous pouvez sélectionner un certain nombre d'options. Les options disponibles dépendent du jeu de définitions XKB choisi précédemment. Toutes les options ne fonctionnent pas avec tous les modèles et dispositions de claviers.
 .
 Par exemple, si vous voulez que la touche « Caps Lock » (« Verrouillage Majuscules ») se comporte comme une touche « Ctrl » supplémentaire, vous pouvez utiliser « ctrl:nocaps » ; si vous préférez l'intervertir avec la touche « Ctrl » de gauche, vous pouvez utiliser « ctrl:swapcaps ».
 .
 Un autre exemple : certaines personnes préfèrent que les touches Meta soient associées aux touches Alt de leur clavier (ce qui est le réglage par défaut) alors que d'autres les préfèrent associées aux touches Windows ou « logo ». Si vous souhaitez utiliser vos touches Windows ou « logo » en tant que touches Meta, vous pouvez indiquer « altwin:meta_win ».
 .
 Vous pouvez combiner des options en les séparant par une virgule, par exemple « ctrl:swapcaps,altwin:meta_win ».
 .
 Les utilisateurs expérimentés peuvent choisir toute option compatible avec le modèle, la disposition et la variante XKB choisis.
 .
 Dans le doute, ce champ peut être laissé vide.
";
$elem["xserver-xorg/config/inputdevice/keyboard/options"]["default"]="";
$elem["xserver-xorg/config/null_string_error"]["type"]="note";
$elem["xserver-xorg/config/null_string_error"]["description"]="Empty value
 A null entry is not permitted for this value.
";
$elem["xserver-xorg/config/null_string_error"]["descriptionde"]="Leerer Wert
 Ein leerer Eintrag ist für diesen Wert nicht zulässig.
";
$elem["xserver-xorg/config/null_string_error"]["descriptionfr"]="Valeur obligatoire
 Une valeur vide n'est pas autorisée pour ce paramètre.
";
$elem["xserver-xorg/config/null_string_error"]["default"]="";
$elem["xserver-xorg/config/doublequote_in_string_error"]["type"]="note";
$elem["xserver-xorg/config/doublequote_in_string_error"]["description"]="Invalid double-quote characters
 Double-quote (\") characters are not permitted in the entry value.
";
$elem["xserver-xorg/config/doublequote_in_string_error"]["descriptionde"]="Ungültige doppelte Anführungszeichen
 Doppelte Anführungszeichen (\") sind in diesem Eingabefeld nicht erlaubt.
";
$elem["xserver-xorg/config/doublequote_in_string_error"]["descriptionfr"]="Guillemets prohibés pour cette entrée
 Aucun guillemet (\") ne doit être mis dans cette valeur.
";
$elem["xserver-xorg/config/doublequote_in_string_error"]["default"]="";
$elem["xserver-xorg/config/nonnumeric_string_error"]["type"]="note";
$elem["xserver-xorg/config/nonnumeric_string_error"]["description"]="Numerical value needed
 Characters other than digits are not allowed in the entry.
";
$elem["xserver-xorg/config/nonnumeric_string_error"]["descriptionde"]="Ein numerischer Wert wird benötigt
 Andere Zeichen als Ziffern sind in diesem Eingabefeld nicht erlaubt.
";
$elem["xserver-xorg/config/nonnumeric_string_error"]["descriptionfr"]="Valeur numérique obligatoire
 Les caractères autres que des chiffres ne sont pas autorisés.
";
$elem["xserver-xorg/config/nonnumeric_string_error"]["default"]="";
$elem["xserver-xorg/autodetect_keyboard"]["type"]="boolean";
$elem["xserver-xorg/autodetect_keyboard"]["description"]="Autodetect keyboard layout?
 The default keyboard layout selection for the Xorg server will be based on a
 combination of the language and the keyboard layout selected in the installer.
 .
 Choose this option if you want the keyboard layout to be redetected.  Do not
 choose it if you want to keep your current layout.
";
$elem["xserver-xorg/autodetect_keyboard"]["descriptionde"]="Die Tastaturbelegung automatisch bestimmen?
 Die Auswahl der Standardtastaturbelegung für den Xorg-Server wird auf einer Kombination der Sprache und Tastataturbelegung basieren, die im Installer gewählt wurden.
 .
 Wählen Sie diese Option, wenn die Tastaturerkennung neugestartet werden soll. Wählen Sie sie nicht, wenn das aktuelle Layout beibehalten werden soll.
";
$elem["xserver-xorg/autodetect_keyboard"]["descriptionfr"]="Détecter automatiquement la disposition du clavier ?
 La disposition par défaut du clavier pour le serveur Xorg sera déterminée à partir d'une combinaison de la langue et de la disposition de clavier choisies dans l'installateur.
 .
 Choisissez cette option si vous souhaitez que la disposition du clavier soit détectée à nouveau. Ne la choisissez pas si vous souhaitez conserver la disposition actuelle.
";
$elem["xserver-xorg/autodetect_keyboard"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
