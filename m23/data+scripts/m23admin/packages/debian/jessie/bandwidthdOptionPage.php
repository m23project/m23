<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bandwidthd");

$elem["bandwidthd/dev"]["type"]="select";
$elem["bandwidthd/dev"]["description"]="Interface to listen on:
 Bandwidthd needs to know which interface it should listen for traffic on.
 Only a single interface can be specified. If you want to listen on all
 interfaces you should specify the metainterface \"any\".
 Running \"bandwidthd -l\" will list available interfaces.
";
$elem["bandwidthd/dev"]["descriptionde"]="Schnittstelle, die beobachtet werden soll:
 Bandwidthd muss die Schnittstelle kennen, deren Verkehr es beobachten soll. Es kann nur eine einzelne Schnittstelle angegeben werden. Falls Sie auf allen Schnittstellen auf Verkehr warten möchten, müssen Sie die Meta-Schnittstelle »any« angeben. Alle verfügbaren Schnittstellen werden aufgelistet, falls Sie »bandwidthd -l« ausführen.
";
$elem["bandwidthd/dev"]["descriptionfr"]="Interface sur laquelle Bandwidthd doit être à l'écoute :
 Bandwidthd a besoin de connaître l'interface sur laquelle il doit être à l'écoute. Seule une interface peut être spécifiée. Si vous désirez écouter sur toutes les interfaces, il faut utiliser la méta-interface « any ». Veuillez exécuter « bandwidthd -l » afin d'afficher les interfaces disponibles.
";
$elem["bandwidthd/dev"]["default"]="";
$elem["bandwidthd/subnet"]["type"]="string";
$elem["bandwidthd/subnet"]["description"]="Subnets to log details about:
 Bandwidthd can create graphs for one or several ip-subnets. Subnets are
 specified either in dotted-quad format (192.168.0.0 255.255.0.0) or in
 CIDR format (192.168.0.0/16) and separated by a comma.
 Example: 192.168.0.0/16, 10.0.0.0 255.0.0.0, 172.16.1.0/24.
 If you don't know what to specify then you can use 0.0.0.0/0 but it is
 strongly discouraged.
";
$elem["bandwidthd/subnet"]["descriptionde"]="Subnetze, für die Details protokolliert werden:
 Bandwidthd kann für eine oder mehrere IP-Subnetze Graphen erzeugen. Subnetze werden entweder im Punkt-Quad-Format (192.168.0.0 255.255.0.0) oder im CIDR-Format (192.168.0.0/16) angegeben und durch Kommata getrennt. Beispiel: 192.168.0.0/16, 10.0.0.0 255.0.0.0, 172.16.1.0/24. Falls Sie nichts anzugeben wissen, können Sie 0.0.0.0/0 verwenden, allerdings wird dies nachdrücklich nicht empfohlen.
";
$elem["bandwidthd/subnet"]["descriptionfr"]="Sous-réseaux pour lesquels Bandwidthd doit enregistrer des informations :
 Bandwidthd peut créer des graphiques pour un ou plusieurs sous-réseaux. Ceux-ci sont spécifiés soit sous le format « décimal pointé » (192.168.0.0 255.255.0.0) soit en notation CIDR (192.168.0.0/16) et sont séparés par une virgule. Exemple : 192.168.0.0/16, 10.0.0.0 255.0.0.0, 172.16.1.0/24. Si vous ne savez pas quoi utiliser, vous pouvez indiquer 0.0.0.0/0 mais cela est fortement déconseillé.
";
$elem["bandwidthd/subnet"]["default"]="";
$elem["bandwidthd/outputcdf"]["type"]="boolean";
$elem["bandwidthd/outputcdf"]["description"]="Output CDF data logs?
 Bandwidthd can log captured traffic information to Common Data File (CDF)
 logs. These logs are required if you want to keep old information stored
 between restarts of the bandwidthd daemon. Also see the recovercdf
 configuration option.
";
$elem["bandwidthd/outputcdf"]["descriptionde"]="CDF-Datenprotokolle ausgeben?
 Bandwidthd kann mitgeschnittene Verkehrsinformationen in Common Data File (CDF)-Protokollen aufzeichnen. Diese Protokolle werden benötigt, falls Sie alte gespeicherte Informationen zwischen Neustarts des Bandwidthd-Daemons erhalten möchten. Beachten Sie hierzu auch die recovercdf-Konfigurationsoption.
";
$elem["bandwidthd/outputcdf"]["descriptionfr"]="Faut-il afficher les journaux de données CDF ?
 Bandwidthd peut enregistrer le trafic capturé dans le format CDF (Common Data File). Ces journaux sont nécessaires si vous désirez garder les anciennes données entre deux redémarrages du démon bandwidthd. Veuillez voir l'option de configuration « recovercdf ».
";
$elem["bandwidthd/outputcdf"]["default"]="true";
$elem["bandwidthd/recovercdf"]["type"]="boolean";
$elem["bandwidthd/recovercdf"]["description"]="Recover old data from logs on restart?
 If old data is going to be outputed in the graphs, it needs to be read
 when BandwidthD is restarted. Parsing the CDF logs can take quite some
 time on a slow machine so you might want to disable it, but then you'll
 lose the information in the graphs after a reboot and similar.... Also make
 sure the output_cdf config option is enabled.
";
$elem["bandwidthd/recovercdf"]["descriptionde"]="Alte Daten aus den Protokollen beim Neustart wiederherstellen?
 Falls alte Daten in den Graphen ausgegeben werden, müssen diese eingelesen werden, wenn BandwidthD neu gestartet wird. Das Auswerten der CDF-Protokolle kann auf langsamen Maschinen einige Zeit benötigen, daher möchte Sie es eventuell deaktivieren. Allerdings verlieren Sie dann die Informationen in den Graphen nach einem Reboot und ähnlichem... Stellen Sie daher auch sicher, dass die output_cdf-Konfigurationsoption aktiviert ist.
";
$elem["bandwidthd/recovercdf"]["descriptionfr"]="Faut-il récupérer les anciennes données des journaux lors d'un redémarrage ?
 Si les anciennes données sont utilisées pour les graphiques, elles doivent être lues lors d'un redémarrage de bandwidthd. Ce processus peut prendre du temps sur des machines lentes et vous désirez peut-être désactiver cette fonctionnalité ; sachez qu'en faisant cela vous perdrez ces informations pour les graphiques après un redémarrage. Par conséquent, assurez-vous que l'option de configuration « output_cdf » soit activée.
";
$elem["bandwidthd/recovercdf"]["default"]="true";
$elem["bandwidthd/metarefresh"]["type"]="string";
$elem["bandwidthd/metarefresh"]["description"]="Graph webpage autorefresh delay (seconds):
 With this option you can tweak the delay used in the html as \"META
 REFRESH\" value. The default is 150 seconds (2.5 minutes). To disable
 automatic reloads of the webpage enter 0. This way the visitor will have
 to manually push refresh in his browser to get updated graphs.
";
$elem["bandwidthd/metarefresh"]["descriptionde"]="Aktualisierungsverzögerung für die Graph-Webseite (in Sekunden):
 Mit dieser Option können Sie die Verzögerung einstellen, die als HTML »META REFRESH«-Wert eingetragen wird. Der Standardwert beträgt 150 Sekunden (2,5 Minuten). Um das automatische Neuladen der Webseite zu unterbinden, tragen Sie 0 ein. In diesem Fall muss der Besucher die Seite in seinem Browser manuell neu laden, um aktualisierte Graphen zu bekommen.
";
$elem["bandwidthd/metarefresh"]["descriptionfr"]="Délai de rafraîchissement (en secondes) de la page web du graphique :
 Cette option permet d'ajuster le délai utilisé dans le fichier HTML comme valeur pour « META REFRESH ». Par défaut il est de 150 secondes (2,5 minutes). Indiquez 0 pour désactiver le rechargement automatique des pages, ce qui forcera le visiteur à recharger lui-même la page afin d'obtenir un graphique à jour.
";
$elem["bandwidthd/metarefresh"]["default"]="";
$elem["bandwidthd/promisc"]["type"]="boolean";
$elem["bandwidthd/promisc"]["description"]="Put interface in PROMISC mode?
 If this option is enabled, all interfaces used to capture traffic
 information will be put in promiscuous mode. This way traffic thats not
 routed via the machine running bandwidthd might be trackable anyway.
 Enabling promiscuous mode will probably not be able to capture any more
 traffic in a normal switched network. Also rootkit detectors might warn
 about bandwidthd being a virus if using promiscuous mode. You should
 probably leave this option disabled.
";
$elem["bandwidthd/promisc"]["descriptionde"]="Schnittstelle in PROMISC-Modus schalten?
 Falls diese Option aktiviert ist, werden alle Schnittstellen, die Verkehrsinformationen sammeln, in den »promiscuous«-Modus versetzt. Damit kann unter Umständen auch Verkehr, der nicht über die Maschine, auf der Bandwidthd läuft, geroutet wird, verfolgt werden. In einem normalen Netz mit Switch wird der »promiscuous«-Modus wahrscheinlich keinen zusätzlichen Verkehr sammeln können. Auch könnten Programme zum Erkennen von Rootkits Warnungen melden, dass Bandwidthd ein Virus sei, falls der »promiscuous«-Modus verwendet wird. Sie sollten wahrscheinlich diese Option deaktiviert lassen.
";
$elem["bandwidthd/promisc"]["descriptionfr"]="Faut-il mettre une ou plusieurs interface en mode PROMISC ?
 En activant cette option, toutes les interfaces utilisées pour capturer le trafic seront placées en mode « promiscuous ». Cela permet de suivre le trafic qui ne passe pas par la machine exécutant bandwidthd. Sachez que cette option ne permet pas de capturer le trafic dans un réseau commuté. De plus, les détecteurs de rootkit prendront peut-être alors bandwidthd pour un virus et vous le signaleront. Vous devriez probablement laisser cette option désactivée.
";
$elem["bandwidthd/promisc"]["default"]="false";
$elem["bandwidthd-pgsql/sensorid"]["type"]="string";
$elem["bandwidthd-pgsql/sensorid"]["description"]="This sensors identification string:
 Each sensor should have an identification string to be able to tell from
 where the traffic in the PostgreSQL-database was detected on. This
 option is usually set to the fully qualified hostname of the machine
 running the bandwidthd sensor. This needs to be a unique string which
 no other bandwidthd sensor that reports to the same database uses.
";
$elem["bandwidthd-pgsql/sensorid"]["descriptionde"]="Identifikation dieses Sensors:
 Jeder Sensor sollte eine Identifikation haben, um zu bestimmen, wo der Verkehr in der PostgreSQL-Datenbank erkannt wurde. Diese Option wird gewöhnlich auf den voll-qualifizierten Rechnernamen der Maschine, die den Bandwidthd-Sensor betreibt, gesetzt. Dies muss eine eindeutige Zeichenkette sein, die von keinem anderen Bandwidthd-Sensor, der an die gleiche Datenbank Berichte abliefert, verwendet wird.
";
$elem["bandwidthd-pgsql/sensorid"]["descriptionfr"]="Chaîne d'identification de cette sonde :
 Chaque sonde doit avoir une chaîne d'identification afin de pouvoir déterminer la source du trafic dans la base de données PostgreSQL. On indique généralement ici le nom d'hôte complètement qualifié de la machine hébergeant la sonde de bandwidthd. Ce doit être une chaîne unique, qu'aucune autre sonde écrivant dans la même base de données ne doit utiliser.
";
$elem["bandwidthd-pgsql/sensorid"]["default"]="";
PKG_OptionPageTail2($elem);
?>
