<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("irda-utils");

$elem["irda-utils/selectdevice"]["type"]="select";
$elem["irda-utils/selectdevice"]["choices"][1]="serial";
$elem["irda-utils/selectdevice"]["choicesde"][1]="seriell";
$elem["irda-utils/selectdevice"]["choicesfr"][1]="série";
$elem["irda-utils/selectdevice"]["description"]="IrDA device type:
 If you want to use a serial dongle, a FIR (Fast IrDA) serial emulation port or
 something similar choose \"serial\". Otherwise choose \"native\" for a native
 chip driver. Select \"serial\" if unsure, because nearly all FIR devices can
 run in slow SIR (Serial IrDA) mode. You might cross-check with the package
 \"setserial\" for the serial setup of your system.
";
$elem["irda-utils/selectdevice"]["descriptionde"]="Typ des IrDA-Adapters:
 Wenn Sie einen seriellen Adapter (Dongle), FIR-Adapter (Fast IrDA) mit Emulation der seriellen Schnittstelle oder Ähnliches haben, wählen Sie \"serial\". Ansonsten, wählen Sie einen speziellen Treiber für den jeweiligen Chip mittels \"native\". Wählen Sie \"serial\" wenn sie unsicher sein sollten, da nahezu alle FIR-Adapter den langsamen SIR-Modus (Serial IrDA) unterstützen. Ggf. sollten Sie dann auch die Einstellungen des Paketes \"setserial\" überprüfen.
";
$elem["irda-utils/selectdevice"]["descriptionfr"]="Type de périphérique infrarouge :
 Si vous souhaitez utiliser un verrou (« dongle ») série, un port d'émulation infrarouge rapide (FIR : Fast IrDA) ou un périphérique analogue, choisissez « série ». Dans le cas contraire, choisissez « natif » pour utiliser un pilote natif. Le choix « série » est peu sûr car pratiquement tous les périphériques FIR peuvent fonctionner en mode SIR (« Serial IrDA » : liaison infrarouge série) lent. Si vous faites ce choix, il sera probablement nécessaire de vérifier les réglages du paquet « setserial » pour la configuration des ports série de votre système.
";
$elem["irda-utils/selectdevice"]["default"]="serial";
$elem["irda-utils/ttydev"]["type"]="string";
$elem["irda-utils/ttydev"]["description"]="Serial device file for IrDA:
";
$elem["irda-utils/ttydev"]["descriptionde"]="Serielle Gerätedatei für IrDA:
";
$elem["irda-utils/ttydev"]["descriptionfr"]="Fichier de périphérique série pour la liaison infrarouge :
";
$elem["irda-utils/ttydev"]["default"]="/dev/ttyS1";
$elem["irda-utils/dongle"]["type"]="select";
$elem["irda-utils/dongle"]["choices"][1]="none";
$elem["irda-utils/dongle"]["choices"][2]="act200l";
$elem["irda-utils/dongle"]["choices"][3]="actisys";
$elem["irda-utils/dongle"]["choices"][4]="actisys+";
$elem["irda-utils/dongle"]["choices"][5]="airport";
$elem["irda-utils/dongle"]["choices"][6]="ep7211";
$elem["irda-utils/dongle"]["choices"][7]="esi";
$elem["irda-utils/dongle"]["choices"][8]="girbil";
$elem["irda-utils/dongle"]["choices"][9]="litelink";
$elem["irda-utils/dongle"]["choices"][10]="ma600";
$elem["irda-utils/dongle"]["choices"][11]="mcp2120";
$elem["irda-utils/dongle"]["choices"][12]="old_belkin";
$elem["irda-utils/dongle"]["choicesde"][1]="keiner";
$elem["irda-utils/dongle"]["choicesde"][2]="act200l";
$elem["irda-utils/dongle"]["choicesde"][3]="actisys";
$elem["irda-utils/dongle"]["choicesde"][4]="actisys+";
$elem["irda-utils/dongle"]["choicesde"][5]="airport";
$elem["irda-utils/dongle"]["choicesde"][6]="ep7211";
$elem["irda-utils/dongle"]["choicesde"][7]="esi";
$elem["irda-utils/dongle"]["choicesde"][8]="girbil";
$elem["irda-utils/dongle"]["choicesde"][9]="litelink";
$elem["irda-utils/dongle"]["choicesde"][10]="ma600";
$elem["irda-utils/dongle"]["choicesde"][11]="mcp2120";
$elem["irda-utils/dongle"]["choicesde"][12]="old_belkin";
$elem["irda-utils/dongle"]["choicesfr"][1]="aucun";
$elem["irda-utils/dongle"]["choicesfr"][2]="act200l";
$elem["irda-utils/dongle"]["choicesfr"][3]="actisys";
$elem["irda-utils/dongle"]["choicesfr"][4]="actisys+";
$elem["irda-utils/dongle"]["choicesfr"][5]="airport";
$elem["irda-utils/dongle"]["choicesfr"][6]="ep7211";
$elem["irda-utils/dongle"]["choicesfr"][7]="esi";
$elem["irda-utils/dongle"]["choicesfr"][8]="girbil";
$elem["irda-utils/dongle"]["choicesfr"][9]="litelink";
$elem["irda-utils/dongle"]["choicesfr"][10]="ma600";
$elem["irda-utils/dongle"]["choicesfr"][11]="mcp2120";
$elem["irda-utils/dongle"]["choicesfr"][12]="old_belkin";
$elem["irda-utils/dongle"]["description"]="Dongle type:
 If you use a FIR serial emulation port, choose \"none\". Note that it is possible that your actual kernel supports more/less/other dongle types. In that case you
 have to edit /etc/default/irda-utils by hand.
";
$elem["irda-utils/dongle"]["descriptionde"]="Adaptertyp:
 Wenn Sie FIR mit Emulation des seriellen Ports verwenden, wählen Sie \"keiner\". Beachten Sie, dass die Möglichkeit besteht, dass der laufende Kernel mehr/weniger/andere Adaptertypen unterstützt. In diesem Fall müssen Sie /etc/default/irda-utils von Hand bearbeiten.
";
$elem["irda-utils/dongle"]["descriptionfr"]="Type de verrou (« dongle ») :
 Si vous utilisez un port d'émulation série FIR, choisissez « aucun ». Veuillez noter qu'il est possible que votre noyau gère d'autres types de verrous. Dans ce cas, vous devrez modifier /etc/default/irda-utils vous-même.
";
$elem["irda-utils/dongle"]["default"]="none";
$elem["irda-utils/firdev"]["type"]="select";
$elem["irda-utils/firdev"]["choices"][1]="ali-ircc";
$elem["irda-utils/firdev"]["choices"][2]="au1k_ir";
$elem["irda-utils/firdev"]["choices"][3]="irda-usb";
$elem["irda-utils/firdev"]["choices"][4]="nsc-ircc";
$elem["irda-utils/firdev"]["choices"][5]="sa1100_ir";
$elem["irda-utils/firdev"]["choices"][6]="smc-ircc";
$elem["irda-utils/firdev"]["choices"][7]="smsc-ircc2";
$elem["irda-utils/firdev"]["choices"][8]="stir4200";
$elem["irda-utils/firdev"]["choices"][9]="toshoboe";
$elem["irda-utils/firdev"]["choices"][10]="via-ircc";
$elem["irda-utils/firdev"]["choices"][11]="vlsi_ir";
$elem["irda-utils/firdev"]["description"]="FIR chip type:
 Note that you must have a properly built kernel module if you want to use
 a native chip. The modules offered here can be different to the ones that
 are available for your actual kernel. In that case you have to edit
 /etc/modutils/irda-utils (2.4) or /etc/modprobe.d/irda-utils (2.6) by hand.
";
$elem["irda-utils/firdev"]["descriptionde"]="Typ des FIR-Chips:
 Wenn FIR benutzt werden soll, müssen auch die entsprechenden Treibermodule gebaut werden. Die hier angebotenen Module können sich on den im laufenden Kernel verfügbaren Modulen unterscheiden. In diesem Fall müssen /etc/modutils/irda-utils (2.4) oder /etc/modprobe.d/irda-utils (2.6) von Hand bearbeitet werden.
";
$elem["irda-utils/firdev"]["descriptionfr"]="Type de composant FIR :
 Veuillez noter que le module correspondant doit avoir été compilé pour le noyau actif si vous avez choisi d'utiliser un composant natif. Les modules proposés ici peuvent être différents de ceux qui sont disponibles pour le noyau que vous utilisés. Dans ce cas, vous devrez modifier /etc/modutils/irda-utils (noayux 2.4) ou /etc/modprobe/irda-utils (noyaux 2.6).
";
$elem["irda-utils/firdev"]["default"]="";
$elem["irda-utils/firopt"]["type"]="string";
$elem["irda-utils/firopt"]["description"]="Module options for the FIR chip:
 Some kernel modules require options to work. You can retrieve the possible
 options for your module with the command \"modinfo <modulename>\".
";
$elem["irda-utils/firopt"]["descriptionde"]="Optionen für die Module des FIR-Chips:
 Einige Treibermodule erforden Optionen damit sie funktionieren. Die möglichen Optionen für das zu verwendende Modul können mittels des Kommandos \"modinfo <Modulname>\" ermittelt werden.
";
$elem["irda-utils/firopt"]["descriptionfr"]="Options du module pour le composant FIR :
 Certains modules du noyau ont besoin d'options pour fonctionner. Les options disponibles pour votre module peuvent être affichées avec la commande « modinfo <nom_du_module> ».
";
$elem["irda-utils/firopt"]["default"]="";
$elem["irda-utils/setserial"]["type"]="string";
$elem["irda-utils/setserial"]["description"]="Port for setserial to quiet:
 Set the name of the serial port / device which should be quieted by setserial.
 Only few machines need that when in FIR-mode, so most likely, it should be
 left blank. See README.Debian for more information.
";
$elem["irda-utils/setserial"]["descriptionde"]="Port für setserial zum Stilllegen:
 Setzen Sie den Namen des seriellen Ports / Geräts, welches von setserial stillgelegt werden soll. Nur wenige Maschinen brauchen das, wenn sie im FIR-Modus arbeiten, weshalb es wahrscheinlich leer gelassen werden sollte. Siehe README.Debian für weitere Informationen.
";
$elem["irda-utils/setserial"]["descriptionfr"]="Port à rendre silencieux par setserial :
 Veuillez configure le nom de port ou périphérique série qui sera rendu silencieux par setserial. Seules certains machines ont besoin de cela en mode FIR, donc le plus souvent cette valeur pourra être laissée vide. Veuillez consulter le fichier README.Debian pour plus d'informations.
";
$elem["irda-utils/setserial"]["default"]="";
$elem["irda-utils/discovery"]["type"]="boolean";
$elem["irda-utils/discovery"]["description"]="Discovery behavior?
 Confirm if you want to use discovery mode. When in discovery mode, the
 device in your machine looks for other devices on a regular basis.
";
$elem["irda-utils/discovery"]["descriptionde"]="Discovery-Modus?
 Bestätigen Sie, wenn der Discovery-Modus verwendet werden soll. Wenn sich das Gerät in Ihrer Maschine in diesem Modus befindet, wird in regelmäßigen Abständen nach anderen Geräten gesucht.
";
$elem["irda-utils/discovery"]["descriptionfr"]="Faut-il utiliser la découverte ?
 Veuillez choisir si vous souhaitez utiliser le mode de découverte. Dans ce mode, le périphérique de votre système recherche périodiquement d'autres périphériques.
";
$elem["irda-utils/discovery"]["default"]="true";
$elem["irda-utils/enable"]["type"]="boolean";
$elem["irda-utils/enable"]["description"]="Enable IrDA on system startup?
 Confirm if you want IrDA to be enabled when your system is booting. This is
 necessary for devices that need \"irattach\" to be run. Most devices need it,
 except for some rare FIR devices.
";
$elem["irda-utils/enable"]["descriptionde"]="Aktiviere IrDA bei Systemstart?
 Bestätigen Sie, wenn IrDA während des Bootvorgangs aktiviert werden soll. Dies ist für Geräte notwendig, die ein laufendes \"irattach\" benötigen. Die meisten Geräte brauchen es, mit Ausnahme einiger weniger FIR-Geräte.
";
$elem["irda-utils/enable"]["descriptionfr"]="Faut-il activer la gestion de l'infrarouge au démarrage ?
 Veuillez choisir si vous souhaitez activer la gestion de l'infrarouge au lancement de votre système. Ce choix est indispensable pour les périphériques qui ont besoin de « irattach » pour fonctionner, ce qui est le cas de la plupart, à l'exception de rares périphériques FIR.
";
$elem["irda-utils/enable"]["default"]="false";
$elem["irda-utils/automatic"]["type"]="boolean";
$elem["irda-utils/automatic"]["description"]="Attempt to probe for IrDA on system bootup?
 Confirm if you want to attempt to autoconfigure IrDA on system startup. If 
 a device is found, irattach will automatically be started up.
";
$elem["irda-utils/automatic"]["descriptionde"]="";
$elem["irda-utils/automatic"]["descriptionfr"]="";
$elem["irda-utils/automatic"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
