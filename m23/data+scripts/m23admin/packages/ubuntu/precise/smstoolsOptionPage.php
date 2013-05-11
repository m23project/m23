<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("smstools");

$elem["smstools/configure"]["type"]="boolean";
$elem["smstools/configure"]["description"]="Manage smsd configuration automatically?
 Reject this option if you want to configure smsd manually.
";
$elem["smstools/configure"]["descriptionde"]="Smsd-Konfiguration automatisch verwalten?
 Lehnen Sie diese Option ab, falls Sie Smsd manuell verwalten möchten.
";
$elem["smstools/configure"]["descriptionfr"]="Faut-il gérer automatiquement la configuration de smsd ?
 Vous devriez refuser cette option si vous préférez configurer smsd vous-même.
";
$elem["smstools/configure"]["default"]="true";
$elem["smstools/eventhandler"]["type"]="string";
$elem["smstools/eventhandler"]["description"]="Global event-handler:
 Please specify an external program or script that will execute,
 whenever a message is sent or received, or on failures.
 This is useful for instance when running an email2sms gateway.
 .
 Examples of event-handlers are detailed in /usr/share/doc/smstools/examples.
";
$elem["smstools/eventhandler"]["descriptionde"]="Globale Ereignisbehandlung:
 Bitte geben Sie ein externes Programm oder Skript an, das ausgeführt wird, wann immer eine Nachricht gesendet oder empfangen wurde oder fehlgeschlagen ist. Dies ist z.B. für einen email2sms-Zugang nützlich.
 .
 Beispiele für Ereignisbehandlungen sind in /usr/share/doc/smstools/examples enthalten.
";
$elem["smstools/eventhandler"]["descriptionfr"]="Gestionnaire global d'événements :
 Veuillez indiquer le programme ou script externe qui sera exécuté quand un message sera envoyé, reçu, ou en cas d'erreurs. Cette fonctionnalité permet, par exemple, d'utiliser une passerelle courriel vers SMS.
 .
 Des exemples de gestion des événements sont proposés dans le répertoire /usr/share/docs/smstools/examples.
";
$elem["smstools/eventhandler"]["default"]="";
$elem["smstools/devicename"]["type"]="string";
$elem["smstools/devicename"]["description"]="Modem name:
 Please specify the short name for the modem device. This is a mandatory
 setting.
";
$elem["smstools/devicename"]["descriptionde"]="Modem-Name:
 Bitte geben Sie den Kurznamen für das Modem-Gerät an. Diese Einstellung ist verpflichtend.
";
$elem["smstools/devicename"]["descriptionfr"]="Nom du modem :
 Veuillez choisir un identifiant court pour le modem. Ce paramètre est obligatoire.
";
$elem["smstools/devicename"]["default"]="GSM1";
$elem["smstools/devicenode"]["type"]="select";
$elem["smstools/devicenode"]["choices"][1]="/dev/ttyS0";
$elem["smstools/devicenode"]["choices"][2]="/dev/ttyS1";
$elem["smstools/devicenode"]["choices"][3]="/dev/ttyS2";
$elem["smstools/devicenode"]["choices"][4]="/dev/ttyS3";
$elem["smstools/devicenode"]["choices"][5]="/dev/ttyS4";
$elem["smstools/devicenode"]["choicesde"][1]="/dev/ttyS0";
$elem["smstools/devicenode"]["choicesde"][2]="/dev/ttyS1";
$elem["smstools/devicenode"]["choicesde"][3]="/dev/ttyS2";
$elem["smstools/devicenode"]["choicesde"][4]="/dev/ttyS3";
$elem["smstools/devicenode"]["choicesde"][5]="/dev/ttyS4";
$elem["smstools/devicenode"]["choicesfr"][1]="/dev/ttyS0";
$elem["smstools/devicenode"]["choicesfr"][2]="/dev/ttyS1";
$elem["smstools/devicenode"]["choicesfr"][3]="/dev/ttyS2";
$elem["smstools/devicenode"]["choicesfr"][4]="/dev/ttyS3";
$elem["smstools/devicenode"]["choicesfr"][5]="/dev/ttyS4";
$elem["smstools/devicenode"]["description"]="Modem device:
 Please specify the modem device. Usually the modem device is
 /dev/ttyS0 (the first serial port), but your setup may differ;
 e.g. for a USB device, choose 'Other' and specify the full path of
 the appropriate device node.
";
$elem["smstools/devicenode"]["descriptionde"]="Modemgerät:
 Bitte geben Sie das Modemgerät an. Gewöhnlich ist das Modemgerät /dev/ttyS0 (die erste serielle Schnittstelle). Dies kann bei Ihnen allerdings abweichen. Bei USB-Geräten müssen Sie z.B. die Wahl »Andere« treffen und den passenden Geräteknoten mit seinem vollen Pfad angeben.
";
$elem["smstools/devicenode"]["descriptionfr"]="Périphérique du modem :
 Veuillez indiquer le périphérique où est connecté le modem. Généralement, il s'agit de /dev/ttyS0 (le premier port série), mais votre configuration peut être différente ; par exemple pour un périphérique USB, vous devez choisir « Autre » et préciser le fichier de périphérique avec son chemin d'accès complet.
";
$elem["smstools/devicenode"]["default"]="";
$elem["smstools/devicenodeother"]["type"]="string";
$elem["smstools/devicenodeother"]["description"]="Modem device:
 Please specify an optional extra device for the modem.
";
$elem["smstools/devicenodeother"]["descriptionde"]="Modemgerät:
 Bitte geben Sie ein optionales Extra-Gerät für das Modem an.
";
$elem["smstools/devicenodeother"]["descriptionfr"]="Périphérique du modem :
 Veuillez indiquer,  si nécessaire, un périphérique supplémentaire pour le modem.
";
$elem["smstools/devicenodeother"]["default"]="";
$elem["smstools/devicebaudrate"]["type"]="select";
$elem["smstools/devicebaudrate"]["choices"][1]="9600";
$elem["smstools/devicebaudrate"]["choices"][2]="19200";
$elem["smstools/devicebaudrate"]["choices"][3]="28800";
$elem["smstools/devicebaudrate"]["choices"][4]="38400";
$elem["smstools/devicebaudrate"]["choices"][5]="115200";
$elem["smstools/devicebaudrate"]["choicesde"][1]="9600";
$elem["smstools/devicebaudrate"]["choicesde"][2]="19200";
$elem["smstools/devicebaudrate"]["choicesde"][3]="28800";
$elem["smstools/devicebaudrate"]["choicesde"][4]="38400";
$elem["smstools/devicebaudrate"]["choicesde"][5]="115200";
$elem["smstools/devicebaudrate"]["choicesfr"][1]="9600";
$elem["smstools/devicebaudrate"]["choicesfr"][2]="19200";
$elem["smstools/devicebaudrate"]["choicesfr"][3]="28800";
$elem["smstools/devicebaudrate"]["choicesfr"][4]="38400";
$elem["smstools/devicebaudrate"]["choicesfr"][5]="115200";
$elem["smstools/devicebaudrate"]["description"]="Modem device speed (bps):
 Most modems work well with a speed of 19200bps, but some modems may
 require 9600 bps. If your modem does not support any of the baud
 rates in the list, select 'Other'.
";
$elem["smstools/devicebaudrate"]["descriptionde"]="Geschwindigkeit des Modemgeräts (bps):
 Die meisten Modems funktionieren mit einer Geschwindigkeit von 19200 bps gut, aber einige Modems könnten zur Arbeit 9600 Baud benötigen. Falls Ihr Modem keine der Baudraten aus der Liste unterstützt, müssen Sie »Andere« auswählen.
";
$elem["smstools/devicebaudrate"]["descriptionfr"]="Débit du modem (bps) :
 La plupart des modems fonctionnent bien avec un débit de 19200 bps, mais certains modems nécessitent un débit de 9600 bps. Si votre modem ne gère aucun des débits proposés, vous devriez choisir « Autre » et le préciser ensuite.
";
$elem["smstools/devicebaudrate"]["default"]="19200";
$elem["smstools/devicebaudrateother"]["type"]="string";
$elem["smstools/devicebaudrateother"]["description"]="Modem device speed (bps):
";
$elem["smstools/devicebaudrateother"]["descriptionde"]="Geschwindigkeit des Modemgeräts (bps):
";
$elem["smstools/devicebaudrateother"]["descriptionfr"]="Débit du modem (bps) :
";
$elem["smstools/devicebaudrateother"]["default"]="";
$elem["smstools/deviceincoming"]["type"]="boolean";
$elem["smstools/deviceincoming"]["description"]="Receive SMS with this device?
 Please choose whether the device should be used to receive incoming SMS.
";
$elem["smstools/deviceincoming"]["descriptionde"]="SMS mit diesem Gerät empfangen?
 Bitte wählen Sie aus, ob das Gerät zum Empfang von eingehenden SMS verwendet werden soll.
";
$elem["smstools/deviceincoming"]["descriptionfr"]="Faut-il activer la réception des SMS avec ce périphérique ?
 Veuillez choisir si ce périphérique peut être utilisé pour recevoir des SMS.
";
$elem["smstools/deviceincoming"]["default"]="true";
$elem["smstools/deviceinit"]["type"]="string";
$elem["smstools/deviceinit"]["description"]="Modem initialization string:
 Please specify the modem initialization command. That may be left empty
 for most modems. Please consult your modem's manual for more details
 about its supported commands.
";
$elem["smstools/deviceinit"]["descriptionde"]="Modem-Initialisierungs-Zeichenkette:
 Bitte geben Sie den Initialisierungs-Befehl für das Modem an. Für die meisten Modems kann dies leer bleiben. Lesen Sie bitte das Handbuch Ihres Modems für weitere Details über seine unterstützten Befehle.
";
$elem["smstools/deviceinit"]["descriptionfr"]="Commande d'initialisation du modem :
 Veuillez indiquer la commande d'initialisation du modem. La plupart des modems ne nécessitent aucune commande d'initialisation. Veuillez consulter la documentation du modem pour plus d'informations complémentaires sur les commandes qu'il gère.
";
$elem["smstools/deviceinit"]["default"]="";
$elem["smstools/devicepin"]["type"]="password";
$elem["smstools/devicepin"]["description"]="SIM device PIN code:
 If the device's SIM needs a PIN to be unlocked, please enter it here.
";
$elem["smstools/devicepin"]["descriptionde"]="PIN-Code der Geräte-SIM:
 Falls die SIM des Geräts eine PIN zum Entsperren benötigt, geben Sie diese bitte hier ein.
";
$elem["smstools/devicepin"]["descriptionfr"]="Code PIN du périphérique SIM :
 Si votre périphérique SIM est verrouillé par un code PIN, vous devriez l'indiquer ici.
";
$elem["smstools/devicepin"]["default"]="";
$elem["smstools/configureanothermodem"]["type"]="boolean";
$elem["smstools/configureanothermodem"]["description"]="Configure another modem?
";
$elem["smstools/configureanothermodem"]["descriptionde"]="Ein weiteres Modem konfigurieren?
";
$elem["smstools/configureanothermodem"]["descriptionfr"]="Faut-il configurer un autre modem ?
";
$elem["smstools/configureanothermodem"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
