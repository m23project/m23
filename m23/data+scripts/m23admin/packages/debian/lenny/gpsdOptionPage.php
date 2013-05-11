<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gpsd");

$elem["gpsd/device"]["type"]="string";
$elem["gpsd/device"]["description"]="Device the GPS receiver is attached to:
 Please enter the device the GPS receiver is attached to. It will probably be
 something like /dev/ttyS0 or /dev/ttyUSB0.
 .
 Multiple devices may be specified as a space-separated list.
";
$elem["gpsd/device"]["descriptionde"]="Gerät an dem der GPS-Empfänger angeschlossen ist:
 Geben Sie das Gerät an, an das Ihr GPS-Empfänger angeschlossen ist. Dies wird vermutlich etwas wie /dev/ttyS0 oder /dev/ttyUSB0 sein.
 .
 Mehrere Geräte können durch Leerzeichen getrennt angegeben werden.
";
$elem["gpsd/device"]["descriptionfr"]="Fichier de périphérique utilisé par le récepteur GPS :
 Veuillez indiquer le fichier de périphérique auquel est connecté le récepteur GPS ; il s'agit vraisemblablement de /dev/ttyS0 ou /dev/ttyUSB0.
 .
 Plusieurs appareils peuvent être indiqués, séparés par des espaces.
";
$elem["gpsd/device"]["default"]="";
$elem["gpsd/start_daemon"]["type"]="boolean";
$elem["gpsd/start_daemon"]["description"]="Start gpsd automatically on boot?
 If the GPS receiver is permanently attached to this computer, it might be
 appropriate for gpsd to start at boot time. Alternatively it can be started
 by the hotplug interface for USB devices, or by running gpsd(8) manually.
";
$elem["gpsd/start_daemon"]["descriptionde"]="Soll gpsd automatisch beim Hochfahren des Rechners gestartet werden?
 Wenn der GPS-Empfänger ständig an Ihren Computer angeschlossen ist könnte es sinnvoll sein gpsd beim Booten zu starten. Alternativ kann das Programm durch das Hotplug-Interface für USB-Geräte gestartet werden, oder manuell über den Befehl gpsd.
";
$elem["gpsd/start_daemon"]["descriptionfr"]="Faut-il lancer automatiquement gpsd au démarrage du système ?
 Si le récepteur GPS est connecté en permanence à cet ordinateur, il peut être intéressant de lancer gpsd au démarrage du système. Sinon, il pourra être lancé par l'interface de connexion à chaud (« hotplug ») des périphériques USB ou en utilisant la commande gpsd(8).
";
$elem["gpsd/start_daemon"]["default"]="false";
$elem["gpsd/daemon_options"]["type"]="string";
$elem["gpsd/daemon_options"]["description"]="Options to gpsd:
 You can give additional arguments when starting gpsd; see gpsd(8) for a
 list of options.
";
$elem["gpsd/daemon_options"]["descriptionde"]="Optionen für gpsd:
 Sie können gpsd beim Start zusätzliche Argumente übergeben. Die man page von gpsd (8) enthält eine Liste der möglichen Optionen.
";
$elem["gpsd/daemon_options"]["descriptionfr"]="Options à passer à gpsd :
 Il est possible de préciser des paramètres supplémentaires lors du lancement de gpsd ; veuillez consulter la page de manuel gpsd(8) pour une liste des paramètres disponibles.
";
$elem["gpsd/daemon_options"]["default"]="";
$elem["gpsd/autodetection"]["type"]="boolean";
$elem["gpsd/autodetection"]["description"]="Should gpsd handle attached USB GPS receivers automatically?
 This option is disabled by default, because several GPS receivers use common
 USB-to-serial converter chips, so gpsd may cause interference with
 other attached devices or programs.
";
$elem["gpsd/autodetection"]["descriptionde"]="Soll gpsd angeschlossene GPS-Empfänger automatisch behandeln?
 Diese Option ist standardmäßig deaktiviert, weil einige GPS-Empfänger USB-zu-Seriell-Konverterchips verwenden, so dass gpsd Störungen bei anderen angeschlossenen Geräten oder Programmen verursachen könnte.
";
$elem["gpsd/autodetection"]["descriptionfr"]="Gpsd doit-il prendre en compte automatiquement les récepteurs GPS connectés ?
 Cette option est désactivée par défaut parce que certains récepteurs GPS utilisent des composants de conversion d'interface USB vers série. Ceci peut provoquer des interférences entre gpsd et d'autres programmes ou d'autres appareils connectés.
";
$elem["gpsd/autodetection"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
