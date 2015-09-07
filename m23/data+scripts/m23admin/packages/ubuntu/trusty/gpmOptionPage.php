<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gpm");

$elem["gpm/restart"]["type"]="boolean";
$elem["gpm/restart"]["description"]="Do you want to (re)start GPM while X is running?
 Usually, GPM should be started or restarted when it is installed or
 upgraded. However, when X is running and trying to use the same mouse
 device, this can sometimes cause a problem with the X mouse cursor.
 Switching to the console and then back to X will usually fix it.
";
$elem["gpm/restart"]["descriptionde"]="Soll GPM (neu) gestartet werden, während X läuft?
 Normalerweise sollte GPM gestartet bzw. neu gestartet werden, wenn es installiert oder ein Upgrade auf eine neue Version durchgeführt wird. Sollte allerdings X laufen und versuchen, auf die selbe Maus zuzugreifen, dann kann dies manchmal zu Problemen mit dem Mauszeiger von X führen. Dies kann in der Regel dadurch behoben werden, dass Sie auf die Konsole und dann wieder zurück zu X wechseln.
";
$elem["gpm/restart"]["descriptionfr"]="Voulez-vous (re)démarrer GPM si X Window est actif ?
 En général, GPM doit être (re)démarré lorsqu'il est installé ou mis à jour. Cependant, quand X est utilisé et se sert du même périphérique pour la souris, cette opération pourrait perturber le fonctionnement de la souris sous X. Pour corriger ce problème, il suffit en général de basculer sur une console puis de revenir sous X.
";
$elem["gpm/restart"]["default"]="false";
$elem["gpm/device"]["type"]="string";
$elem["gpm/device"]["description"]="Mouse device for GPM:
 Please enter the mouse device name.
 .
 Common mouse devices names:
  - PS/2 mouse:     /dev/psaux
  - Serial mouse:   /dev/ttySx
  - USB mouse:      /dev/input/mice
  - Sun mouse:      /dev/sunmouse
  - M68k Mac mouse: /dev/mouse
";
$elem["gpm/device"]["descriptionde"]="Mausgerät für GPM:
 Bitte geben Sie den Namen des Mausgerätes ein.
 .
 Typische Namen von Mausgeräten:
  - PS/2-Maus:      /dev/psaux
  - Serielle Maus:  /dev/ttySx
  - USB-Maus:       /dev/input/mice
  - Sun-Maus:       /dev/sunmouse
  - M68k Mac-Maus:  /dev/mouse
";
$elem["gpm/device"]["descriptionfr"]="Périphérique de la souris pour GPM :
 Veuillez indiquer le nom du périphérique à utiliser pour la souris.
 .
 Les noms de périphériques usuels sont :
  - Souris PS/2      /dev/psaux
  - Souris série     /dev/ttySx
  - Souris USB       /dev/input/mice
  - Souris Sun       /dev/sunmouse
  - Souris Mac m68k  /dev/mouse
";
$elem["gpm/device"]["default"]="";
$elem["gpm/type"]["type"]="string";
$elem["gpm/type"]["description"]="Mouse type:
 Available mouse types are:
 .
 Name         Description
 .
 PS/2 mice: round 6-pin connector
  autops2    Most PS/2 mice; specific protocol will be auto-detected.
             Also use this for USB and ADB mice.
  ps2        Standard PS/2 mice, 2 or 3 buttons
  imps2      Microsoft IntelliMouse and compatibles; PS/2 mice with
             3 buttons and a scroll wheel
  exps2      Newer Microsoft IntelliMouse and compatible, may have
             more than 3 buttons.  Most newer PS/2 mice are this type.
  synps2     Synaptics PS/2 TouchPad, found on many laptops
  netmouse   Genius NetMouse, 2 normal buttons plus an \"Up/Down\" button
  fups2      Same as \"ps2\" but may be needed for certain broken
             mice or KVM switches
  fuimps2    Same as \"imps2\" but may be needed for certain broken
             mice or KVM switches
 .
 Serial mice: 9-pin or 25-pin serial connector
  msc        The MouseSystems protocol.  Most 3-button serial mice.
  mman       The MouseMan protocol used by newer Logitech serial mice
  ms3        Microsoft IntelliMouse, 3 buttons plus scroll wheel
  ms         Microsoft serial mice, 2 or 3 buttons, no wheel
  ms+        Like 'ms', but allows dragging with the middle button
  ms+lr      'ms+', but you can reset m by pressing lr (see man page)
  pnp        Microsoft's \"plug and play\" serial mouse standard
  bare       2-button Microsoft serial mice.  Use this one if the 'ms'
             protocol seems to produce spurious middle-button events.
  mm         MM series.  Probably an old protocol.
  logi       Old serial Logitech mice
  logim      Old Logitech serial mice in MouseSystems mode (3 buttons)
  syn        Synaptics TouchPad, serial version
  brw        Fellowes Browser - 4 buttons and a wheel
 .
 Other mice
  bm         Some Microsoft and Logitech bus mice: 8-pin round connector
  vsxxxaa    The DEC VSXXX-AA/GA serial mouse on DEC workstations
  sun        Sparc mice
 .
 Non-mice
  js         Mouse emulation with a joystick
  cal        Calcomp UltraSlate in absolute mode
  calr       Calcomp UltraSlate in relative mode
  twid       Handykey Twiddler keyboard
  ncr        Ncr3125pen, found on some laptops
  wacom      Wacom Protocol IV Tablets: Pen+Mouse,
             relative+absolute mode
  genitizer  Genitizer tablet, in relative mode
  summa      Summa/Genius tablet in absolute mode
             (906, 1212B, EasyPainter...)
  mtouch     MicroTouch touch-screens (only button-1 events reported)
  gunze      Gunze touch-screens (only button-1 events reported)
  acecad     Acecad tablet in absolute mode (Summagraphics MM-Series mode)
  wp         Genius WizardPad tablet
";
$elem["gpm/type"]["descriptionde"]="Maustyp:
 Folgende Maustypen sind verfügbar:
 .
 Name         Beschreibung
 .
 PS/2-Mäuse: runder 6-Pin-Anschluss
  autops2    für die meisten PS/2-Mäuse; das genaue Protokoll wird
             automatisch erkannt.
             Verwenden Sie dies auch für USB- und ADB-Mäuse.
  ps2        Standard-PS/2-Mäuse, 2 oder 3 Maustasten
  imps2      Microsoft IntelliMouse und kompatible; PS/2-Mäuse mit
             3 Tasten und einem Scrollrad
  exps2      Neuere Microsoft IntelliMouse und kompatibel, hat eventuell
             mehr als 3 Tasten. Die meisten neueren PS/2-Mäuse
             entsprechen diesem Typ.
  synps2     Synaptics PS/2-Touchpad, auf vielen Laptops vorhanden
  netmouse   Genius NetMouse, 2 normale Maustasten sowie eine
             »Hoch/Runter«-Taste
  fups2      Das gleiche wie »ps2«, wird allerdings für gewisse defekte
             Mäuse oder KVM-Switches benötigt
  fuimps2    Das gleiche wie »imps2«, wird allerdings für gewisse
             defekte Mäuse oder KVM-Switches benötigt
 .
 Serielle Mäuse: serieller 9- oder 25-poliger Anschluss
  msc        Das MouseSystems-Protokoll. Für die meisten seriellen
             Mäuse mit 3 Tasten.
  mman       Das MouseMan-Protokoll, welches von neueren seriellen
             Logitech-Mäusen verwendet wird.
  ms3        Microsoft IntelliMouse, 3 Tasten plus Scrollrad
  ms         Serielle Microsoft-Maus, 2 oder 3 Tasten, kein Scrollrad
  ms+        Wie »ms«, erlaubt aber das Verschieben von
             Objekten (»Dragging«) mit der mittleren Maustaste.
  ms+lr      »ms+«, aber Sie können die mittlere Taste zurücksetzen,
             indem Sie die linke und rechte drücken (vgl. Handbuchseite)
  pnp        Microsofts serieller Mausstandard für »Plug and Play«
  bare       Serielle Microsoft-Maus mit 2 Tasten. Verwenden Sie dies,
             falls das »ms«-Protokoll falsche Ereignisse der mittleren
             Maus-Taste verursacht.
  mm         MM-Serie. Wahrscheinlich ein altes Protokoll.
  logi       Alte serielle Logitech-Maus
  logim      Alte serielle Logitech-Maus im MausSystems-Modus (3 Tasten)
  syn        Synaptics Touchpad, serielle Version
  brw        Fellowes Browser - 4 Tasten und ein Rad
 .
 Andere Maustypen
  bm         Für einige Bus-Mäuse von Microsoft und Logitech,
             runder 8-poliger Anschluss
  vsxxxaa    Die serielle Maus »DEC VSXXX-AA/GA« für
             DEC-Arbeitsplatzrechner
  sun        SPARC-Maus
 .
 Keine Mäuse
  js         Maus-Emulation mit einem Joystick
  cal        Calcomp-UltraSlate im Absolut-Modus
  calr       Calcomp-UltraSlate im Relativ-Modus
  twid       Handykey-Twiddler-Tastatur
  ncr        Ncr3125pen (Stift), auf einigen Laptops vorhanden
  wacom      Wacom-Protokoll-IV-Tafeln: Stift+Maus,
             Relativ- und Absolut-Modus
  genitizer  Genitizer-Tafel, im Relativ-Modus
  summa      Summa/Genius-Tafel im Absolut-Modus
             (906, 1212B, EasyPainter, ...)
  mtouch     Touch-Screens von MicroTouch (nur Ereignisse von Taste 1
             werden verarbeitet)
  gunze      Touch-Screens von Gunze (nur Ereignisse von Taste 1
             werden verarbeitet)
  acecad     Acecad-Tafel im Absolut-Modus (Sumagrapics-MM-Serien-Modus)
  wp         Genius-WizardPad-Tafel
";
$elem["gpm/type"]["descriptionfr"]="Type de souris :
 Les types possibles pour la souris sont :
 .
 Nom          Description
 .
 Souris PS/2 : connecteur rond à 6 broches
  autops2    Pour la majorité des souris PS/2 ; le protocole spécifique
             sera détecté automatiquement.
             À utiliser également pour les souris USB et ADB ;
  ps2        Souris PS/2 standard, 2 ou 3 boutons
  imps2      Microsoft IntelliMouse et compatibles ; souris PS/2 avec
             3 boutons et roulette
  exps2      Souris Microsoft IntelliMouse et compatibles récentes,
             éventuellement avec plus de 3 boutons. La plupart des souris
             PS/2 récentes sont de ce type ;
  synps2     Souris tactile PS/2 « TouchPad », utilisée sur de nombreux
             ordinateurs portables ;
  netmouse   NetMouse Genius, 2 boutons normaux plus un bouton
             « Haut/Bas » ;
  fups2      Similaire à « ps2 » mais parfois nécessaire pour certaines
             souris ou commutateurs KVM ;
  fuimps2    Similaire à « imps2 » mais parfois nécessaire pour certaines
             souris ou commutateurs KVM.
 .
 Souris série : connecteur série à 9 ou 25 broches
  msc        Protocole MouseSystems. Adapté à la plupart des souris série
             à 3 boutons ;
  mman       Protocole MouseMan : utilisé par les souris série
             Logitech les plus récentes ;
  ms3        Microsoft IntelliMouse, 3 boutons plus roulette ;
  ms         Souris série Microsoft, 2 ou 3 boutons sans roulette ;
  ms+        Similaire à « ms », avec glissement possible par le
             troisième bouton ;
  ms+lr      Similaire à « ms+ », permettant de réinitialiser la souris
             avec les deux boutons (voir la page de manuel);
  pnp        Souris série Microsoft « plug and play » ;
  bare       Souris série Microsoft simple. Choisissez cette option si le
             protocole « ms » génère des événements inattendus avec le
             bouton du milieu ;
  mm         Séries MM. Probablement un ancien protocole ;
  logi       Anciennes souries série Logitech ;
  logim      Anciennes souris série Logitech en mode MouseSystems
             (3 boutons) ;
  syn        Souris tactile (« touchpad ») Synaptics TouchPad, version
             série ;
  brw        Fellowes Browser - 4 boutons et roulette.
 .
 Autres souris
  bm         Certaines souris « bus » Microsoft et Logitech : connecteur 
             rond à 8 broches ;
  vsxxxaa    Souris série DEC VSXXX-AA/GA sur stations de travail DEC ;
  sun        Souris Sparc.
 .
 Autres périphériques :
  js         Émulation d'une souris avec une manette de jeu ;
  cal        Calcomp UltraSlate en mode absolu ;
  calr       Calcomp UltraSlate en mode relatif ;
  twid       Clavier Handykey Twiddler ;
  ncr        Ncr3125pen, existant sur certains portables ;
  wacom      Tablettes Wacom Protocol IV : stylo+souris,
             mode relatif et absolu ;
  genitizer  Tablette Genitizer, en mode relatif ;
  summa      Tablette Summa/Genius en mode absolu
             (906, 1212B, EasyPainter...) ;
  mtouch     Écrans tactiles MicroTouch (seul le premier bouton est
             géré) ;
  gunze      Écrans tactiles Gunze touch-screens (seul le premier bouton
             est géré) ;
  acecad     Tablette Acecad en mode absolu (mode Sumagrapics
             MM-Series) ;
  wp         Tablette Genius WizardPad.
";
$elem["gpm/type"]["default"]="";
$elem["gpm/responsiveness"]["type"]="string";
$elem["gpm/responsiveness"]["description"]="Mouse responsiveness:
 The responsiveness defines how often the cursor responds to mouse
 movement, and is expressed as a number. If the mouse seems to
 move too slowly, try setting this to 15.
";
$elem["gpm/responsiveness"]["descriptionde"]="Maus-Empfindlichkeit:
 Die Reaktions-Empfindlichkeit (engl. »responsiveness«) bestimmt, wie häufig der Mauszeiger auf die Bewegungen der Maus reagiert, und wird als Zahl dargestellt. Falls sich die Maus zu langsam zu bewegen scheint, dann könnte es helfen, hier 15 einzustellen.
";
$elem["gpm/responsiveness"]["descriptionfr"]="Sensibilité de la souris :
 La sensibilité définit le rapport entre le mouvement du curseur et celui de la souris et s'exprime par un nombre. Si la souris semble se déplacer trop lentement, vous pouvez essayer une valeur de 15 pour ce réglage.
";
$elem["gpm/responsiveness"]["default"]="";
$elem["gpm/repeat_type"]["type"]="string";
$elem["gpm/repeat_type"]["description"]="Protocol to use for repeating mouse events:
 GPM can act as a repeater via /dev/gpmdata, and give both GPM and X access
 to the mouse data in configurations where it would otherwise only be available
 to only X or GPM.
 .
 Enter 'none' to turn repeating off.
";
$elem["gpm/repeat_type"]["descriptionde"]="Protokoll, das zum Wiederholen von Maus-Ereignissen verwendet werden soll:
 GPM kann mittels /dev/gpmdata als Wiederholer (»Repeater«) agieren. Dadurch können sowohl GPM als auch X bei Systemen auf die Daten der Maus zugreifen, bei denen normalerweise entweder nur X oder nur GPM Zugriff hätte.
 .
 Geben Sie »none« ein, um die Wiederholung abzuschalten.
";
$elem["gpm/repeat_type"]["descriptionfr"]="Protocole à utiliser pour répéter les événements de la souris :
 GPM peut servir de répéteur avec le périphérique /dev/gpmdata et fournir un accès simultané aux événements de la souris dans des situations où ils seraient uniquement disponibles pour X ou GPM.
 .
 Choisissez « none » pour désactiver la répétition.
";
$elem["gpm/repeat_type"]["default"]="ms3";
$elem["gpm/sample_rate"]["type"]="string";
$elem["gpm/sample_rate"]["description"]="Mouse sample rate:
 The sample rate defines how often GPM polls the mouse device for new
 position data. Tweaking it can make the mouse appear to move more
 smoothly, but this option is for experts only.
";
$elem["gpm/sample_rate"]["descriptionde"]="Abtastrate der Maus:
 Die Abtastrate bestimmt, wie häufig GPM die Maus nach neuen Positionsdaten abfragt. Eine Anpassung kann dazu führen, dass die Bewegungen der Maus sanfter erscheinen, aber diese Option ist nur für Experten.
";
$elem["gpm/sample_rate"]["descriptionfr"]="Vitesse d'échantillonnage de la souris :
 La vitesse d'échantillonnage définit les intervalles de temps entre les moments où GPM récupère la position de la souris. Cette valeur est souvent ajustée pour que la souris semble se déplacer de manière plus fluide. Elle ne devrait être utilisée qu'avec le niveau d'expertise suffisant.
";
$elem["gpm/sample_rate"]["default"]="";
$elem["gpm/append"]["type"]="string";
$elem["gpm/append"]["description"]="Additional arguments for the GPM daemon:
 Please enter any additional arguments that the GPM daemon should use.
";
$elem["gpm/append"]["descriptionde"]="Zusätzliche Optionen für den GPM-Daemon:
 Bitte geben Sie alle zusätzlichen Optionen ein, die der GPM-Daemon verwenden soll.
";
$elem["gpm/append"]["descriptionfr"]="Paramètres supplémentaires pour GPM :
 Veuillez indiquer les paramètres supplémentaires à utiliser avec le démon GPM.
";
$elem["gpm/append"]["default"]="";
PKG_OptionPageTail2($elem);
?>
