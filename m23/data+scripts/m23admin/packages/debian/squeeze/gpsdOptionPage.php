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
 Leave empty if you don't want to connect gpsd to a device on boot or if you
 want to use device autodetection only.
";
$elem["gpsd/device"]["descriptionde"]="Gerät, an dem der GPS-Empfänger angeschlossen ist:
 Geben Sie das Gerät an, an das Ihr GPS-Empfänger angeschlossen ist. Dies wird vermutlich etwas wie /dev/ttyS0 oder /dev/ttyUSB0 sein.
 .
 Mehrere Geräte können durch Leerzeichen getrennt angegeben werden. Geben Sie nichts an, falls Sie gpsd mit keinem Gerät verbinden wollen oder falls Sie nur die automatische Geräteerkennung nutzen wollen.
";
$elem["gpsd/device"]["descriptionfr"]="Fichier de périphérique utilisé par le récepteur GPS :
 Veuillez indiquer le fichier de périphérique auquel est connecté le récepteur GPS ; il s'agit vraisemblablement de /dev/ttyS0 ou /dev/ttyUSB0.
 .
 Plusieurs périphériques peuvent être spécifiés dans une liste, séparés par des espaces. Laissez la liste vide si vous ne voulez pas que gpsd se connecte à un périphérique au démarrage ou si vous voulez seulement détecter les périphériques automatiquement.
";
$elem["gpsd/device"]["default"]="";
$elem["gpsd/start_daemon"]["type"]="boolean";
$elem["gpsd/start_daemon"]["description"]="Start gpsd automatically?
 If you accept this option, gpsd will be started automatically.
";
$elem["gpsd/start_daemon"]["descriptionde"]="Soll gpsd automatisch gestartet werden?
 Wenn Sie diese Option auswählen, wird gpsd automatisch gestartet.
";
$elem["gpsd/start_daemon"]["descriptionfr"]="Faut-il lancer automatiquement gpsd ?
 Si vous choisissez cette option, gpsd démarrera automatiquement.
";
$elem["gpsd/start_daemon"]["default"]="true";
$elem["gpsd/socket"]["type"]="string";
$elem["gpsd/socket"]["description"]="gpsd control socket path:
 Please enter the gpsd control socket location. Usually you want to keep
 the default setting.
";
$elem["gpsd/socket"]["descriptionde"]="Pfad für den Kontrollsocket von gpsd:
 Bitte geben Sie den Pfad für den Kontrollsocket von gpsd an. Normalerweise können Sie die Standardeinstellung beibehalten.
";
$elem["gpsd/socket"]["descriptionfr"]="Chemin vers la « socket » de contrôle de gpsd :
 Veuillez indiquer l'emplacement de la « socket » de contrôle de gpsd. Il est courant de conserver la valeur par défaut.
";
$elem["gpsd/socket"]["default"]="/var/run/gpsd.sock";
$elem["gpsd/daemon_options"]["type"]="string";
$elem["gpsd/daemon_options"]["description"]="Options to gpsd:
 You can give additional arguments when starting gpsd; see gpsd(8) for a
 list of options.
 .
 Do not use '-F' here. The control socket path is set independently.
";
$elem["gpsd/daemon_options"]["descriptionde"]="Optionen für gpsd:
 Sie können gpsd beim Start zusätzliche Argumente übergeben. Die Handbuchseite von gpsd (8) enthält eine Liste der möglichen Optionen.
 .
 Verwenden Sie »-F« hier nicht. Der Pfad des Kontrollsockets wird unabhängig gesetzt.
";
$elem["gpsd/daemon_options"]["descriptionfr"]="Options pour gpsd :
 Il est possible d'utiliser des paramètres supplémentaires lors du lancement de gpsd ; veuillez consulter la page de manuel gpsd(8) pour une liste des paramètres disponibles.
 .
 N'utilisez pas '-F' ici. Le chemin vers la « socket » de contrôle est défini indépendamment.
";
$elem["gpsd/daemon_options"]["default"]="";
$elem["gpsd/autodetection"]["type"]="boolean";
$elem["gpsd/autodetection"]["description"]="Should gpsd handle attached USB GPS receivers automatically?
 As gpsd only handles GPS devices, it is safe to choose this option.
 However, you can disable it if gpsd is causing interference with other
 attached devices or programs.
";
$elem["gpsd/autodetection"]["descriptionde"]="Soll gpsd angeschlossene USB-GPS-Empfänger automatisch behandeln?
 Da gpsd nur GPS-Geräte verwendet, können Sie diese Option unbesorgt auswählen. Sollte gpsd dennoch Störungen mit anderen Geräten oder Programmen verursachen, können Sie diese Option deaktivieren.
";
$elem["gpsd/autodetection"]["descriptionfr"]="Faut-il gérer automatiquement avec gpsd les récepteurs GPS USB connectés ?
 Comme gpsd ne gère que les périphériques GPS, cette option peut être activée sans problèmes. Toutefois, vous pouvez la désactiver si gpsd interfère avec d'autres périphériques connectés ou d'autres programmes.
";
$elem["gpsd/autodetection"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
