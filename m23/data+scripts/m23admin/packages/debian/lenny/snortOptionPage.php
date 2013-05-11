<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("snort");

$elem["snort/startup"]["type"]="select";
$elem["snort/startup"]["choices"][1]="boot";
$elem["snort/startup"]["choices"][2]="dialup";
$elem["snort/startup"]["choicesde"][1]="Systemstart";
$elem["snort/startup"]["choicesde"][2]="Einwahl";
$elem["snort/startup"]["choicesfr"][1]="Au démarrage";
$elem["snort/startup"]["choicesfr"][2]="À la connexion";
$elem["snort/startup"]["description"]="Snort start method:
 Snort can be started during boot, when connecting to the net with pppd or
 only manually with the /usr/sbin/snort command.
";
$elem["snort/startup"]["descriptionde"]="Startmethode für Snort:
 Snort kann beim Systemstart, bei der Einwahl ins Internet mit Pppd oder nur manuell mit dem Befehl /usr/sbin/snort gestartet werden.
";
$elem["snort/startup"]["descriptionfr"]="Méthode de lancement de Snort :
 Snort peut être lancé au démarrage du système, lors de la connexion au réseau avec pppd ou à la demande via la commande « /usr/sbin/snort ».
";
$elem["snort/startup"]["default"]="boot";
$elem["snort/interface"]["type"]="string";
$elem["snort/interface"]["description"]="Interface(s) which Snort should listen on:
 This value is usually 'eth0', but this may be inappropriate in some
 network environments; for a dialup connection 'ppp0' might be more
 appropiate (see the output of '/sbin/ifconfig').
 .
 Typically, this is the same interface as the 'default route' is on. You can
 determine which interface is used for this by running '/sbin/route -n'
 (look for '0.0.0.0').
 .
 It is also not uncommon to use an interface with no IP address
 configured in promiscuous mode. For such cases, select the
 interface in this system that is physically connected to the network
 that should be inspected, enable promiscuous mode later on and make sure
 that the network traffic is sent to this interface (either connected
 to a 'port mirroring/spanning' port in a switch, to a hub or to a tap).
 .
 You can configure multiple interfaces, just by adding more than
 one interface name separated by spaces. Each interface can have its
 own specific configuration.
";
$elem["snort/interface"]["descriptionde"]="Schnittstelle(n) an der/denen Snort lauschen soll:
 Dieser Wert ist normalerweise »eth0«, aber das kann in einigen Netzwerkumgebung anders sein; bei einer Einwahlverbindung sollte »ppp0« besser passen (sehen Sie sich die Ausgabe des Befehls '/sbin/ifconfig' an).
 .
 Normalerweise ist das die selbe Schnittstelle, auf die die Standard-Route zeigt. Sie können die verwendete Schnittstelle mit dem Befehl '/sbin/route -n' herausfinden (suchen Sie nach »0.0.0.0«).
 .
 Es ist auch üblich, Snort an einer Schnittstelle ohne IP-Adresse im Modus »Promiscuous« zu betreiben. In diesem Fall wählen Sie die Schnittstelle aus, die physisch mit dem Netzwerk verbunden ist, das Sie überwachen wollen und schalten später den Modus »Promiscuous« ein. Stellen Sie sicher, dass der Netzwerkverkehr die Schnittstelle erreicht (entweder sie ist verbunden mit einem Anschluss für »Port-Mirroring/Spanning« eines Switches, mit einem Hub oder Tap).
 .
 Sie können mehrere Schnittstellennamen durch Leerzeichen getrennt eingeben. Jede Schnittstelle kann eigene Einstellungen haben.
";
$elem["snort/interface"]["descriptionfr"]="Interface(s) où Snort sera à l'écoute :
 La valeur habtuelle est « eth0 » mais elle peut varier selon l'environnement réseau : pour une connexion ponctuelle (« dialup »), « ppp0 » est probablement plus adapté. Il est suggéré d'utiliser l'affichage de la commande « /sbin/ifconfig ».
 .
 L'interface est celle qu'utilise la route par défaut. Vous pouvez obtenir cette information avec la commande « /sbin/route -n » (rechercher « 0.0.0.0 »).
 .
 Il est également fréquent d'utiliser Snort sur une interface sans adresse IP, en mode « promiscuous ». Dans ce cas, choisissez l'interface connectée au réseau que vous voulez analyser et activez ce mode plus tard. Assurez-vous que le trafic réseau est bien envoyé à cette interface (soit connectée à un port de miroir ou de répartition, « mirroring/spanning port » sur un commutateur réseau, soit connectée à un répartiteur ou à un « tap »).
 .
 Il est possible de configurer plusieurs interfaces en les mentionnant toutes, séparées par des espaces. Chacune d'elles pourra avoir une configuration différente.
";
$elem["snort/interface"]["default"]="eth0";
$elem["snort/address_range"]["type"]="string";
$elem["snort/address_range"]["description"]="Address range for the local network:
 Please use the CIDR form - for example, 192.168.1.0/24 for a block of
 256 addresses or 192.168.1.42/32 for just one. Multiple values should
 be comma-separated (without spaces).
 .
 Please note that if Snort is configured to use multiple interfaces,
 it will use this value as the HOME_NET definition for all of them.
";
$elem["snort/address_range"]["descriptionde"]="Adressbereich des lokalen Netzwerks:
 Bitte benutzen Sie das CIDR-Format, z. B. 192.168.1.0/24 für einen Block von 256 IP-Adressen oder 192.168.1.42/32 für nur eine. Mehrere IP-Adressen sollten durch Kommas getrennt werden (ohne Leerzeichen).
 .
 Bitte beachten Sie: Wenn für Snort mehrere Schnittstellen eingerichtet sind, wird diese Festlegung als HOME_NET-Definition für alle gemeinsam verwendet.
";
$elem["snort/address_range"]["descriptionfr"]="Plage d'adresses du réseau local :
 Veuillez utiliser le format CIDR, par exemple 192.168.1.0/24 pour un bloc de 256 adresses IP ou 192.168.1.42/32 pour une seule adresse. Il est possible d'indiquer plusieurs adresses sur une seule ligne en les séparant par des virgules (sans espaces).
 .
 Veuillez noter que si Snort est configuré pour utiliser plusieurs interfaces, la valeur définie ici sera la valeur HOME_NET pour chacune d'elles.
";
$elem["snort/address_range"]["default"]="192.168.0.0/16";
$elem["snort/disable_promiscuous"]["type"]="boolean";
$elem["snort/disable_promiscuous"]["description"]="Should Snort disable promiscuous mode on the interface?
 Disabling promiscuous mode means that Snort will only see packets
 addressed to the interface it is monitoring. Enabling it allows Snort to
 check every packet that passes the Ethernet segment even if it's a
 connection between two other computers.
";
$elem["snort/disable_promiscuous"]["descriptionde"]="Soll Snort den Modus »Promiscuous« an der Schnittstelle ausschalten?
 Das Ausschalten des Modus' »Promiscuous« bedeutet, dass Snort nur die Pakete sehen wird, die an die Schnittstelle adressiert sind, die es überwacht. Das Einschalten ermöglicht es Snort, alle Pakete zu überprüfen, die das Netzwerk-Segment durchlaufen, selbst wenn es eine Verbindung zwischen zwei anderen Rechnern ist.
";
$elem["snort/disable_promiscuous"]["descriptionfr"]="Faut-il désactiver le mode « promiscuous » sur l'interface ?
 Si le mode « promiscuous » est désactivé, Snort ne verra que les paquets adressés à sa propre interface. S'il est activé, il vérifiera chaque paquet transitant sur le segment Ethernet même s'il s'agit d'échanges entres deux autres ordinateurs.
";
$elem["snort/disable_promiscuous"]["default"]="false";
$elem["snort/invalid_interface"]["type"]="error";
$elem["snort/invalid_interface"]["description"]="Invalid interface
 Snort is trying to use an interface which does not exist or is down.
 Either it is defaulting inappropriately to 'eth0', or you specified
 one which is invalid.
";
$elem["snort/invalid_interface"]["descriptionde"]="Ungültige Schnittstelle
 Snort versucht eine Schnittstelle zu nutzen, die es nicht gibt oder die nicht aktiv ist. Entweder ist die Vorgabe »eth0« hier unpassend, oder Sie haben eine ungültige Schnittstelle eingegeben.
";
$elem["snort/invalid_interface"]["descriptionfr"]="Interface non valable
 Snort tente d'utiliser une interface inexistante ou inactive. Soit il utilise par erreur la valeur par défaut (eth0), soit l'adresse indiquée n'est pas valable.
";
$elem["snort/invalid_interface"]["default"]="";
$elem["snort/reverse_order"]["type"]="boolean";
$elem["snort/reverse_order"]["description"]="Should Snort's testing order be changed to Pass|Alert|Log?
 Snort's default testing order is Alert|Pass|Log; if you accept this
 option, the order will be changed to Pass|Alert|Log, which can make it
 simpler to use Snort with some packet-filtering tools.
";
$elem["snort/reverse_order"]["descriptionde"]="Soll Snorts Reihenfolge der Tests auf Pass|Alert|Log geändert werden?
 Snorts Standard-Testreihenfolge ist Alert|Pass|Log; wenn Sie hier zustimmen, wird die Reihenfolge in Pass|Alert|Log geändert, was die Nutzung von Snort mit einigen Paketfilter-Programmen vereinfachen kann.
";
$elem["snort/reverse_order"]["descriptionfr"]="Faut-il modifier l'ordre de vérification de Snort en « Pass|Alert|Log » ?
 L'ordre de vérification par défaut de Snort est « Alert|Pass|Log » (alerter, faire passer puis journaliser). Si vous choisissez cette option, l'ordre sera modifié pour utiliser « Pass|Alert|Log » (faire passer, alerter puis journaliser), ce qui peut simplifier l'utilisation de Snort avec certains outils de filtrage de paquets.
";
$elem["snort/reverse_order"]["default"]="false";
$elem["snort/send_stats"]["type"]="boolean";
$elem["snort/send_stats"]["description"]="Should daily summaries be sent by e-mail?
 A cron job can be set up to send daily summaries of Snort logs to a
 selected e-mail address.
 .
 Please choose whether you want to activate this feature.
";
$elem["snort/send_stats"]["descriptionde"]="Sollen tägliche Zusammenfassungen per E-Mail verschickt werden?
 Es kann ein Cronjob eingerichtet werden, der täglich Zusammenfassungen der Protokolle von Snort an eine bestimmte E-Mail-Adresse schickt.
 .
 Bitte stimmen Sie zu, wenn Sie das wollen.
";
$elem["snort/send_stats"]["descriptionfr"]="Faut-il envoyer des rapports quotidiens par courriel ?
 Une tâche quotidienne de cron créera un résumé de l'information des journaux de Snort et l'enverra à une adresse électronique prédéfinie.
 .
 Veuillez choisir si vous souhaitez activer cette fonctionnalité.
";
$elem["snort/send_stats"]["default"]="true";
$elem["snort/stats_rcpt"]["type"]="string";
$elem["snort/stats_rcpt"]["description"]="Recipient of daily statistics mails:
 Please specify the e-mail address that should receive daily summaries
 of Snort logs.
";
$elem["snort/stats_rcpt"]["descriptionde"]="Empfänger der täglichen Statistik-E-Mails:
 Bitte geben Sie die E-Mail-Adresse ein, an die täglich Zusammenfassungen der Protokolle von Snort geschickt werden sollen.
";
$elem["snort/stats_rcpt"]["descriptionfr"]="Destinataire des courriers électroniques quotidiens de statistiques :
 Veuillez indiquer l'adresse électronique qui recevra les résumés quotidiens des journaux de Snort.
";
$elem["snort/stats_rcpt"]["default"]="root";
$elem["snort/options"]["type"]="string";
$elem["snort/options"]["description"]="Additional custom options:
 Please specify any additional options Snort should use.
";
$elem["snort/options"]["descriptionde"]="Zusätzliche benutzerspezifische Optionen:
 Bitte geben Sie alle weiteren Optionen ein, die Snort benutzen soll.
";
$elem["snort/options"]["descriptionfr"]="Options personnelles supplémentaires :
 Veuillez indiquer les options supplémentaires qu'utilisera Snort.
";
$elem["snort/options"]["default"]="";
$elem["snort/stats_treshold"]["type"]="string";
$elem["snort/stats_treshold"]["description"]="Minimum occurrences before alerts are reported:
 Please enter the minimum number of alert occurrences before a given alert is
 included in the daily statistics.
";
$elem["snort/stats_treshold"]["descriptionde"]="Minimale Ereignisanzahl ab der Alarme gemeldet werden:
 Bitte geben Sie die minimale Anzahl eines Alarms ein, ab der dieser Alarm in die tägliche Statistik aufgenommen wird.
";
$elem["snort/stats_treshold"]["descriptionfr"]="Nombre d'occurrences minimales avant l'envoi d'alertes :
 Une alerte doit apparaître un nombre de fois supérieur à celui indiqué pour être comptabilisée dans les statistiques quotidiennes.
";
$elem["snort/stats_treshold"]["default"]="1";
$elem["snort/please_restart_manually"]["type"]="note";
$elem["snort/please_restart_manually"]["description"]="Snort restart required
 As Snort is manually launched, you need to run '/etc/init.d/snort' for
 the changes to take place.
";
$elem["snort/please_restart_manually"]["descriptionde"]="Neustart von Snort erforderlich
 Da Snort manuell gestartet wurde, müssen Sie den Befehl '/etc/init.d/snort' aufrufen, damit die Änderungen wirksam werden.
";
$elem["snort/please_restart_manually"]["descriptionfr"]="Redémarrage de Snort indispensable
 Comme Snort est lancé manuellement, il est nécessaire d'exécuter la commande « /etc/init.d/snort » pour que les modifications soient prises en compte.
";
$elem["snort/please_restart_manually"]["default"]="";
$elem["snort/config_error"]["type"]="error";
$elem["snort/config_error"]["description"]="Configuration error
 The current Snort configuration is invalid and will prevent Snort
 starting up normally. Please review and correct it.
 .
 To diagnose an error in a Snort configuration file, use
 '/usr/sbin/snort -T -c <file>'.
";
$elem["snort/config_error"]["descriptionde"]="Fehler in den Einstellungen
 Die aktuellen Einstellungen von Snort sind ungültig und verhindern einen normalen Start von Snort. Bitte kontrollieren und berichtigen Sie diese.
 .
 Benutzen Sie den Befehl '/usr/sbin/snort -T -c <Datei>', um Fehler in einer Konfigurationsdatei von Snort zu finden.
";
$elem["snort/config_error"]["descriptionfr"]="Erreur de configuration
 La configuration actuelle de Snort n'est pas valable et l'empêchera de démarrer. Veuillez la contrôler et la corriger.
 .
 Le diagnostic des erreurs du fichier de configuration de Snort peut se faire avec la commande « /usr/sbin/snort -T -c <fichier> ».
";
$elem["snort/config_error"]["default"]="";
$elem["snort/config_parameters"]["type"]="error";
$elem["snort/config_parameters"]["description"]="Obsolete configuration file
 This system uses an obsolete configuration file
 (/etc/snort/snort.common.parameters)
 which has been automatically converted into the new configuration
 file format (at /etc/default/snort).
 .
 Please review the new configuration and remove the obsolete
 one. Until you do this, the initialization script will not use the new
 configuration and you will not take advantage of the benefits
 introduced in newer releases.
";
$elem["snort/config_parameters"]["descriptionde"]="Veraltete Konfigurationsdatei
 Dieses System nutzt eine veraltete Konfigurationsdatei (/etc/snort/snort.common.parameters), die automatisch in das neue Format (nach /etc/default/snort) umgewandelt wurde.
 .
 Bitte überprüfen Sie die neue Konfigurationsdatei und löschen Sie die veraltete. Bis dahin wird das Startskript die neuen Einstellungen nicht verwenden und Sie können die Vorteile der neuen Versionen nicht nutzen.
";
$elem["snort/config_parameters"]["descriptionfr"]="Fichier de configuration obsolète
 Le système utilise un fichier de configuration obsolète (/etc/snort/snort.common.parameters) qui a été automatiquement converti vers le nouveau format (dans /etc/default/snort).
 .
 Veuillez vérifier le nouveau fichier de configuration et supprimer l'ancien. Tant que cela n'aura pas été fait, le script de démarrage n'utilisera pas la nouvelle configuration et vous ne bénéficierez pas des améliorations des versions plus récentes.
";
$elem["snort/config_parameters"]["default"]="";
PKG_OptionPageTail2($elem);
?>
