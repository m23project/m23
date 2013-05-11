<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ifplugd");

$elem["ifplugd/interfaces"]["type"]="string";
$elem["ifplugd/interfaces"]["description"]="static interfaces to be watched by ifplugd:
 Specify the interfaces to control here, separated by spaces. Ifplugd
 processes will be started for each of these interfaces when the ifplugd
 initscript is called with the \"start\" argument. You may use the magic
 string \"auto\" to make the initscript start or stop ifplugd processes for
 ALL eth and wlan interfaces that are available according to
 /proc/net/dev.  Note that the list of interfaces appearing in
 /proc/net/dev may depend on which kernel modules you have loaded.
 .
 You should not add interfaces that are hotplugged (USB or PCMCIA) here,
 you will be asked for those in the next question.
";
$elem["ifplugd/interfaces"]["descriptionde"]="Zu überwachende Schnittstellen, die immer (statisch) vorhanden sind:
 Geben Sie hier, durch Leerzeichen getrennt, die zu überwachenden Schnittstellen ein. Für jede dieser Schnittstellen wird ein ifplugd-Prozess gestartet, sobald das Init-Skript von ifplugd mit dem »start«-Argument aufgerufen wird. Sie können den magischen Wert »auto« verwenden, um für ALLE eth- und wlan-Schnittstellen, die laut /proc/net/dev verfügbar sind, einen ifplugd-Prozess zu starten bzw. zu beenden. Beachten Sie, dass die Liste der Schnittstellen, die in /proc/net/dev auftaucht, davon abhängt, welche Kernel-Module Sie geladen haben.
 .
 Sie sollten hier keine Schnittstellen angeben, die von hotplug gesteuert werden (USB oder PCMCIA). Um diese Schnittstellen geht es in der nächsten Frage.
";
$elem["ifplugd/interfaces"]["descriptionfr"]="Interfaces statiques qu'ifplugd doit surveiller :
 Veuillez préciser la liste des interfaces à contrôler, séparées par des espaces. Des processus ifplugd seront lancés pour chacune de ces interfaces lorsque le script de lancement d'ifplugd sera appelé avec le paramètre « start ». Vous pouvez utiliser le paramètre « auto » de façon à ce que le script de lancement démarre ou arrête des processus ifplugd pour TOUTES les interfaces eth et wlan disponibles dans /proc/net/dev. Veuillez noter que cette liste d'interfaces dans /proc/net/dev peut dépendre des modules du noyau qui ont été chargés.
 .
 Il ne faut pas ajouter ici les interfaces qui sont connectables à chaud (« hotplugged ») comme l'USB ou le PCMCIA. Leur liste vous sera demandée à part.
";
$elem["ifplugd/interfaces"]["default"]="";
$elem["ifplugd/hotplug_interfaces"]["type"]="string";
$elem["ifplugd/hotplug_interfaces"]["description"]="hotplugged interfaces to be watched by ifplugd:
 Specify the hotplugged interfaces to control here, separated by spaces.
 .
 You may use the magic string \"all\" to make the hotplug script start an
 ifplugd process for any hotplugged interface.
 .
 Hotplugged interfaces are usually interfaces on PCMCIA or WLAN adapters.
";
$elem["ifplugd/hotplug_interfaces"]["descriptionde"]="Durch hotplug gesteuerte Schnittstellen, die von ifplugd überwacht werden sollen:
 Bitte geben Sie hier die Schnittstellen an, die durch hotplug gesteuert werden und die Sie mit ifplugd überwachen möchten.
 .
 Sie können den magischen Wert »all« benutzen, damit das hotplug-Skript für alle von ihm gesteuerten Schnittstellen einen ifplugd-Prozess startet.
 .
 Schnittstellen auf PCMCIA- oder USB-Adaptern werden für gewöhnlich durch hotplug gesteuert.
";
$elem["ifplugd/hotplug_interfaces"]["descriptionfr"]="Interfaces connectées à chaud (« hotplugged ») qu'ifplugd doit surveiller :
 Veuillez indiquer la liste des interfaces connectées à chaud, séparées par des espaces, et qui doivent être contrôlées par ifplugd.
 .
 Vous pouvez utiliser l'argument « all » pour que le script hotplug démarre un processus ifplugd pour chaque interface connectée à chaud.
 .
 Les interfaces connectées à chaud sont habituellement des interfaces sans fil ou des interfaces PCMCIA.
";
$elem["ifplugd/hotplug_interfaces"]["default"]="";
$elem["ifplugd/args"]["type"]="string";
$elem["ifplugd/args"]["description"]="arguments to ifplugd:
 You can give arguments to the ifplug daemon here.  Relevant options are:
 .
  -q Don't run script on daemon quit
  -f Ignore detection failure and retry
  -u Specify delay for configuring interface
  -d Specify delay for deconfiguring interface
  -w Wait until daemon fork finished
  -I Don't exit on nonzero return value of program executed
 .
  -a Do not enable interface automatically
  -s Use stderr instead of syslog for debugging
  -b Do not beep (-U/-D Do not beep on interface up/down)
  -t Specify poll time in seconds (default: 1)
  -p Don't run script on daemon startup
  -l Run \"down\" script on startup if no cable is detected
  -W Wait until the daemon died when running daemon is killed
  -M Use interface monitoring
";
$elem["ifplugd/args"]["descriptionde"]="Argumente für ifplugd:
 Sie können hier Argumente für den ifplugd-Daemon angeben. Gültige Optionen sind:
 .
  -q  Kein Skript ausführen bei Beenden des Daemons
  -f  Fehler bei der Erkennung ignorieren und erneut versuchen
  -u  Verzögerung festlegen zur Konfiguration der Schnittstellen
  -d  Verzögerung festlegen zur Dekonfiguration der Schnittstellen
  -w  Warten auf den Abschluß des Daemon-Forks (Aufspaltung)
  -I  Nicht beenden, wenn Rückgabewerte von ausgeführten Programmen
      nicht Null sind
 .
  -a  Schnittstelle nicht automatisch aktivieren
  -s  Nutze stderr statt syslog für Fehlersuche
  -b  Keine Systemklänge (-U/-D: Kein Systemklang beim Aktivieren (Up)/
      Deaktivieren (Down) der Schnittstelle
  -t  Abfragetakt in Sekunden festlegen (Vorgabe: 1)
  -p  Kein Skript ausführen bei Starten des Daemons
  -l  down-Skript beim Start ausführen, wenn kein Kabel eingesteckt ist
  -W  Bei Beendigung des laufenden Daemon-Prozesses warten, bis der
      Prozess wirklich beendet ist
  -M  Benutze Schnittstellenüberwachung
";
$elem["ifplugd/args"]["descriptionfr"]="Paramètres à passer à ifplugd :
 Veuillez indiquer ici des paramètres à passer au démon ifplugd. Des options possibles sont :
 .
  -q ne pas lancer le script lorsque le démon quitte
  -f ignorer la détection de pannes et réessayer
  -u indiquer le délai de configuration de l'interface
  -w attendre jusqu'à ce que la réplication du démon soit terminée
  -I ne pas quitter lorsque le programme exécuté retourne une valeur non nulle
 .
  -a ne pas activer l'interface automatiquement
  -s utiliser stderr plutôt que syslog pour le débogage
  -b ne pas émettre de signal sonore (-U/-D : ne pas
     émettre de signal au démarrage/arrêt de l'interface)
  -t indiquer l'intervalle de scrutation en secondes
  -p ne pas lancer de script au démarrage du démon
  -l lancer le script « down » au démarrage si aucun câble n'est détecté
  -W attendre la mort du démon lorsque le démon en cours est tué
  -M utiliser le suivi de l'interface
";
$elem["ifplugd/args"]["default"]="-q -f -u0 -d10 -w -I";
$elem["ifplugd/suspend_action"]["type"]="select";
$elem["ifplugd/suspend_action"]["choices"][1]="none";
$elem["ifplugd/suspend_action"]["choices"][2]="suspend";
$elem["ifplugd/suspend_action"]["choicesde"][1]="nichts";
$elem["ifplugd/suspend_action"]["choicesde"][2]="Suspend";
$elem["ifplugd/suspend_action"]["choicesfr"][1]="Aucune";
$elem["ifplugd/suspend_action"]["choicesfr"][2]="Suspendre";
$elem["ifplugd/suspend_action"]["description"]="suspend behaviour:
 When you put your notebook into suspend mode, you can choose between three
 actions:
 .
 none: no action
 .
 suspend: this puts ifplugd into suspend mode. In this mode, ifplugd does
 not check the link status. This is necessary for some broken network
 drivers.
 .
 stop: this stops ifplugd. If the -q option is not given, ifplugd will stop
 the interface. After resume, it will be restarted. This makes sense if you
 use some mechanism (eg. guessnet or whereami) to detect your network
 environment, which may have changed while suspending.
";
$elem["ifplugd/suspend_action"]["descriptionde"]="Suspend-Verhalten:
 Wenn Ihr Notebook in den Suspend-Modus (Tiefschlaf) wechselt, kann eine dieser drei Aktionen ausgelöst werden:
 .
 nichts: keine Aktion
 .
 Suspend: versetzt ifplugd in den Suspend-Modus. In diesem Modus überwacht ifplugd nicht den Verbindungsstatus. Dies ist für einige kaputte Netzwerk-Treiber notwendig.
 .
 Stop: stoppt ifplugd. Wenn die Option »-q« nicht angegeben wurde, wird ifplugd die Schnittstelle stoppen. Nach dem Aufwachen wird sie neu gestartet. Dies ist sinnvoll, wenn Sie einen Mechanismus (z.B. guessnet oder whereami) verwenden, um Ihre Netzwerkumgebung automatisch zu erkennen, welche sich während des Tiefschlafs verändert haben könnte.
";
$elem["ifplugd/suspend_action"]["descriptionfr"]="Action du mode veille :
 Lorsque vous mettez votre ordinateur portable en veille, vous avez le choix entre trois actions :
 .
 - Aucune : aucune action ;
 .
 - Suspendre : ceci met ifplugd en mode veille. Dans ce mode, il ne vérifie pas l'état de la ligne. Cela est nécessaire pour certains pilotes de réseau défectueux ;
 .
 - Arrêter : cette action arrête ifplugd. Si l'option -q n'est pas présente, ifplugd va arrêter l'interface. À la reprise, elle sera redémarrée. Cela présente un intérêt si vous utilisez un mécanisme tel que guessnet ou whereami pour détecter votre environnement de réseau qui peut avoir été modifié pendant la durée de la mise en veille.
";
$elem["ifplugd/suspend_action"]["default"]="stop";
PKG_OptionPageTail2($elem);
?>
