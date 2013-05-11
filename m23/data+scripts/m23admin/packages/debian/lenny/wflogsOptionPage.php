<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wflogs");

$elem["wflogs/report_permissions"]["type"]="boolean";
$elem["wflogs/report_permissions"]["description"]="Do you want to set read permissions to www-data group?
 According to your previous choice, reports will be stored in
 /var/www/wflogs/. By default this package sets restrictive permissions to
 this directory and reports stored into it for security reasons. However if
 you want, you can add read access to the www-data group, so that you can
 visualize reports with a web browser.
";
$elem["wflogs/report_permissions"]["descriptionde"]="Soll die Gruppe www-data Leseberechtigung bekommen?
 Entsprechend Ihrer vorherigen Auswahl, werden die Berichte in /var/www/wflogs/ gespeichert. In der Voreinstellung setzt dieses Paket aus Sicherheitsgründen restriktive Berechtigungen für dieses Verzeichnis und die Berichte, die in ihm gespeichert werden. Jedoch können Sie Lesezugriff für die Gruppe www-data erlauben, sodass Sie Berichte mittels eines Web-Browsers visualisieren können.
";
$elem["wflogs/report_permissions"]["descriptionfr"]="Faut-il permettre l'accès en lecture au groupe www-data ?
 D'après vos choix précédents, les rapports seront conservés dans /var/www/wflogs. Par défaut, ce paquet restreint l'accès en lecture à ce répertoire et aux rapports pour des raisons de sécurité. Vous pouvez cependant permettre l'accès en lecture au groupe www-data sur ces données, ce qui permet d'y accéder avec un navigateur web.
";
$elem["wflogs/report_permissions"]["default"]="false";
$elem["wflogs/report_generate"]["type"]="boolean";
$elem["wflogs/report_generate"]["description"]="Generate daily report on disk? 
 This package can generate a daily report stored on disk and can also produce
 an optional daily report sent by email. You'll be able to choose the
 output module used to generate the disk report, but if you want an email
 report it will be generated with text module. Both reports can be
 generated with the same settings or different ones.
";
$elem["wflogs/report_generate"]["descriptionde"]="Täglichen Bericht auf Festplatte erzeugen?
 Dieses Paket kann einen täglichen Bericht erzeugen, der auf Festplatte gespeichert wird, sowie einen optionalen täglichen Bericht, der als E-Mail gesendet wird. Sie können das Ausgabemodul wählen, das zur Erzeugung des Festplatten-Berichts verwendet wird. Aber falls Sie sich für den E-Mail-Bericht entscheiden, wird dieser durch das Textmodul generiert. Beide Berichte können mit den selben oder mit unterschiedlichen Einstellungen erzeugt werden.
";
$elem["wflogs/report_generate"]["descriptionfr"]="Faut-il générer un rapport quotidien sur disque ?
 Ce paquet génère un rapport quotidien, conservé sur disque, et peut également générer un rapport quotidien optionnel qui sera envoyé par courriel. Vous avez le choix du module de sortie pour le rapport sur disque ; par contre, le rapport par courriel utilisera le module de sortie texte. Les deux rapports peuvent être générés avec des options identiques ou non.
";
$elem["wflogs/report_generate"]["default"]="true";
$elem["wflogs/email_send"]["type"]="boolean";
$elem["wflogs/email_send"]["description"]="Send daily report by mail?
";
$elem["wflogs/email_send"]["descriptionde"]="Täglichen Bericht per E-Mail senden?
";
$elem["wflogs/email_send"]["descriptionfr"]="Faut-il envoyer un rapport quotidien par courriel ?
";
$elem["wflogs/email_send"]["default"]="false";
$elem["wflogs/email_address"]["type"]="string";
$elem["wflogs/email_address"]["description"]="Email address to send the daily report to:
";
$elem["wflogs/email_address"]["descriptionde"]="E-Mail-Adresse, an die der tägliche Bericht gesendet werden soll:
";
$elem["wflogs/email_address"]["descriptionfr"]="Adresse électronique où sera envoyé le rapport quotidien :
";
$elem["wflogs/email_address"]["default"]="root";
$elem["wflogs/email_configuration"]["type"]="boolean";
$elem["wflogs/email_configuration"]["description"]="Should the daily email report have the same configuration?
 Please choose whether the settings for email reports should be taken
 from those for reports on disk.
";
$elem["wflogs/email_configuration"]["descriptionde"]="Soll der tägliche E-Mail-Bericht dieselbe Konfiguration verwenden?
 Bitte wählen Sie, ob die Einstellungen für E-Mail-Berichte aus denen für Berichte auf Festplatte genommen werden sollen.
";
$elem["wflogs/email_configuration"]["descriptionfr"]="Le rapport quotidien par courriel doit-il utiliser la même configuration ?
 Veuillez choisir si les réglages définis pour les rapports par courriel doivent être identiques à ceux des rapports sur disque.
";
$elem["wflogs/email_configuration"]["default"]="true";
$elem["wflogs/input_file"]["type"]="string";
$elem["wflogs/input_file"]["description"]="Input file:
 Please choose the file which contains logs that have to be analyzed by wflogs.
";
$elem["wflogs/input_file"]["descriptionde"]="Module für die Analyse der Eingabe:
 Dies ist die Datei, die die Protokolle enthält, die von Wflogs analysiert werden sollen.
";
$elem["wflogs/input_file"]["descriptionfr"]="Modules d'analyse en entrée :
 Veuillez indiquer le fichier contenant les journaux qui seront analysés par wflogs.
";
$elem["wflogs/input_file"]["default"]="/var/log/kern.log";
$elem["wflogs/input_type"]["type"]="multiselect";
$elem["wflogs/input_type"]["choices"][1]="netfilter";
$elem["wflogs/input_type"]["choices"][2]="ipchains";
$elem["wflogs/input_type"]["choices"][3]="ipfilter";
$elem["wflogs/input_type"]["choices"][4]="cisco_pix";
$elem["wflogs/input_type"]["choices"][5]="cisco_ios";
$elem["wflogs/input_type"]["choices"][6]="snort";
$elem["wflogs/input_type"]["choicesde"][1]="netfilter";
$elem["wflogs/input_type"]["choicesde"][2]="ipchains";
$elem["wflogs/input_type"]["choicesde"][3]="ipfilter";
$elem["wflogs/input_type"]["choicesde"][4]="cisco_pix";
$elem["wflogs/input_type"]["choicesde"][5]="cisco_ios";
$elem["wflogs/input_type"]["choicesde"][6]="snort";
$elem["wflogs/input_type"]["choicesfr"][1]="netfilter";
$elem["wflogs/input_type"]["choicesfr"][2]="ipchains";
$elem["wflogs/input_type"]["choicesfr"][3]="ipfilter";
$elem["wflogs/input_type"]["choicesfr"][4]="cisco_pix";
$elem["wflogs/input_type"]["choicesfr"][5]="cisco_ios";
$elem["wflogs/input_type"]["choicesfr"][6]="snort";
$elem["wflogs/input_type"]["description"]="Input parsing modules:
 wflogs will use the corresponding modules to parse the logs. If you want
 to parse a log file with multiple formats mixed (typically a remote syslog
 file), you can specify several format module names, one being probed after
 another. Choose `all' to try every available format.
";
$elem["wflogs/input_type"]["descriptionde"]="Module für die Analyse der Eingabe:
 Wflogs wird die korrespondierenden Module verwenden, um die Protokolle zu analysieren. Falls Sie eine Protokolldatei mit mehreren gemischten Formaten (typischerweise eine entfernte Syslog-Datei) analysieren wollen, können Sie mehrere Namen von Format-Modulen angeben. Eins wird nach dem anderen probiert. Wählen Sie »alle«, um alle verfügbaren Formate zu versuchen.
";
$elem["wflogs/input_type"]["descriptionfr"]="Modules d'analyse en entrée :
 Wflogs utilise des modules d'entrée pour analyser les journaux. Si vous souhaitez analyser un fichier journal contenant un mélange de plusieurs formats (notamment les fichiers « syslog » de machines distantes), vous devez indiquer plusieurs noms de modules d'analyse qui seront essayés les uns après les autres. Choisissez « tous » pour essayer tous les formats possibles.
";
$elem["wflogs/input_type"]["default"]="netfilter";
$elem["wflogs/report_output_type"]["type"]="select";
$elem["wflogs/report_output_type"]["choices"][1]="html";
$elem["wflogs/report_output_type"]["choices"][2]="text";
$elem["wflogs/report_output_type"]["choices"][3]="human";
$elem["wflogs/report_output_type"]["choices"][4]="xml";
$elem["wflogs/report_output_type"]["choices"][5]="netfilter";
$elem["wflogs/report_output_type"]["choices"][6]="ipchains";
$elem["wflogs/report_output_type"]["choicesde"][1]="html";
$elem["wflogs/report_output_type"]["choicesde"][2]="Text";
$elem["wflogs/report_output_type"]["choicesde"][3]="menschlich";
$elem["wflogs/report_output_type"]["choicesde"][4]="xml";
$elem["wflogs/report_output_type"]["choicesde"][5]="netfilter";
$elem["wflogs/report_output_type"]["choicesde"][6]="ipchains";
$elem["wflogs/report_output_type"]["choicesfr"][1]="html";
$elem["wflogs/report_output_type"]["choicesfr"][2]="texte";
$elem["wflogs/report_output_type"]["choicesfr"][3]="humain";
$elem["wflogs/report_output_type"]["choicesfr"][4]="xml";
$elem["wflogs/report_output_type"]["choicesfr"][5]="netfilter";
$elem["wflogs/report_output_type"]["choicesfr"][6]="ipchains";
$elem["wflogs/report_output_type"]["description"]="Output module type:
 wflogs will produce the report using the following target. According to
 your choice, the report will be placed in different locations. If you choose
 html or email, the location will be /var/www/wflogs. In all other cases, it will
 be /var/log/wflogs.
";
$elem["wflogs/report_output_type"]["descriptionde"]="Typ des Ausgabemoduls:
 Wflogs wird den Bericht unter Verwendung der folgenden Vorgabe erzeugen. Entsprechend Ihrer Auswahl wird der Bericht an verschiedenen Orten abgelegt. Falls Sie »html« oder »email« wählen, wird dieser Ort /var/www/wflogs sein. Anderenfalls wird es /var/log/wflogs sein.
";
$elem["wflogs/report_output_type"]["descriptionfr"]="Module de sortie :
 Veuillez choisir le module que wflogs utilisera pour générer ses rapports. Selon ce que vous choisirez, les rapports seront placés à des endroits différents. Si vous choisissez « HTML » ou « texte », cet emplacement sera /var/www/wflogs. Dans les autres cas, ce sera /var/log/wflogs.
";
$elem["wflogs/report_output_type"]["default"]="html";
$elem["wflogs/report_obfuscate"]["type"]="string";
$elem["wflogs/report_obfuscate"]["description"]="Fields to obfuscate:
 This option obfuscates some logging fields according to given criteria,
 separated by commas. These can be `date', `hostname', `ipaddr', or
 `macaddr' (or `all' for everything). If ipaddr is specified, output module
 options `resolve' and `whois_lookup' (if available) are set to no. If
 macaddr is specified, output module option `mac_vendor' (if available) is
 set to no.
 .
 The date order is preserved, hostnames are replaced by \"hostx\" (where x is a
 growing number), ipaddr belongs to the 0.0.0.0/8 network, macaddr is of the
 form 0:0:0:0:0:1, 0:0:0:0:0:2, etc. Note that for all obfuscated fields,
 each original value is associated with a new unique one (unicity is
 preserved).
";
$elem["wflogs/report_obfuscate"]["descriptionde"]="Zu verschleiernde Felder:
 Diese Einstellung verschleiert einige durch Kommata getrennte Protokollfelder entsprechend gegebener Kriterien. Diese können »date«, »hostname«, »ipaddr« oder »macaddr« sein (oder »all« für alles). Falls »ipaddr« angegeben wurde, werden die Optionen »resolve« und »whois_lookup« (falls verfügbar) des Ausgabemoduls auf »no« gesetzt. Falls »macaddr« angegeben wurde, wird die Option »mac_vendor« (falls verfügbar) des Ausgabemoduls auf »no« gesetzt.
 .
 Die chronologische Reihenfolge wird erhalten, Rechnernamen werden durch »hostx« ersetzt (wobei x eine ansteigende Zahl ist), IP-Adressen gehören zum Netzwerk 0.0.0.0/8, MAC-Adressen sind in der Form 0:0:0:0:0:1, 0:0:0:0:0:2 u. s. w.. Beachten Sie, dass jeder Originalwert für alle verschleierten Felder mit einem neuen eindeutigen Wert assoziiert wird (Eindeutigkeit wird erhalten).
";
$elem["wflogs/report_obfuscate"]["descriptionfr"]="Champs à camoufler :
 Certains champs des journaux peuvent être camouflés selon des critères séparés par des virgules. Cela peut être « date », « hostname » (nom d'hôte), « ipaddr » (adresse IP), « macaddr » (adresse MAC) ou « all » (tous). Si « ipaddr » est choisi, les options de module de sortie « resolve » et « whois_lookup » seront désactivées. Si « macaddr » est choisi, l'option de module de sortie « mac_vendor » sera désactivée. Par défaut, « nothing » (rien) ne camoufle aucun champ.
 .
 L'ordre des données est conservé et les noms d'hôtes sont remplacés par « hostN » (où N est un nombre croissant), l'adresse IP fait partie du réseau 0.0.0.0/8 et l'adresse MAC est de la forme 0:0:0:0:0:1, 0:0:0:0:0:2, etc. Veuillez noter que pour tous les champs camouflés, chaque valeur d'origine est associée à une nouvelle valeur unique (l'unicité est préservée).
";
$elem["wflogs/report_obfuscate"]["default"]="nothing";
$elem["wflogs/email_obfuscate"]["type"]="string";
$elem["wflogs/email_obfuscate"]["description"]="Fields to obfuscate:
 This option obfuscates some logging fields according to given criterias,
 separated by commas. These can be `date', `hostname', `ipaddr', or
 `macaddr' (or `all' for everything). If ipaddr is specified, output module
 options `resolve' and `whois_lookup' (if available) are set to no. If
 macaddr is specified, output module option `mac_vendor' (if available) is
 set to no.
 .
 The date order is preserved, hostnames are replaced by \"hostx\" (where x is a
 growing number), ipaddr belongs to the 0.0.0.0/8 network, macaddr is of the
 form 0:0:0:0:0:1, 0:0:0:0:0:2, etc. Note that for all obfuscated fields,
 each original value is associated with a new unique one (unicity is
 preserved).
";
$elem["wflogs/email_obfuscate"]["descriptionde"]="Zu verschleiernde Felder:
 Diese Einstellung verschleiert einige durch Kommata getrennte Protokollfelder entsprechend gegebener Kriterien. Diese können »date«, »hostname«, »ipaddr« oder »macaddr« sein (oder »all« für alles). Falls »ipaddr« angegeben wurde, werden die Optionen »resolve« und »whois_lookup« (falls verfügbar) des Ausgabemoduls auf »no« gesetzt. Falls »macaddr« angegeben wurde, wird die Option »mac_vendor« (falls verfügbar) des Ausgabemoduls auf »no« gesetzt.
 .
 Die chronologische Reihenfolge wird erhalten, Rechnernamen werden durch »hostx« ersetzt (wobei x eine ansteigende Zahl ist), IP-Adressen gehören zum Netzwerk 0.0.0.0/8, MAC-Adressen sind in der Form 0:0:0:0:0:1, 0:0:0:0:0:2 u. s. w.. Beachten Sie, dass jeder Originalwert für alle verschleierten Felder mit einem neuen eindeutigen Wert assoziiert wird (Eindeutigkeit wird erhalten).
";
$elem["wflogs/email_obfuscate"]["descriptionfr"]="Champs à camoufler :
 Certains champs des journaux peuvent être camouflés selon des critères séparés par des virgules. Cela peut être « date », « hostname » (nom d'hôte), « ipaddr » (adresse IP), « macaddr » (adresse MAC) ou « all » (tous). Si « ipaddr » est choisi, les options de module de sortie « resolve » et « whois_lookup » seront désactivées. Si « macaddr » est choisi, l'option de module de sortie « mac_vendor » sera désactivée.
 .
 L'ordre des données est conservé et les noms d'hôtes sont remplacés par « hostN » (où N est un nombre croissant), l'adresse IP fait partie du réseau 0.0.0.0/8 et l'adresse MAC est de la forme 0:0:0:0:0:1, 0:0:0:0:0:2, etc. Veuillez noter que pour tous les champs camouflés, chaque valeur d'origine est associée à une nouvelle valeur unique (l'unicité est préservée).
";
$elem["wflogs/email_obfuscate"]["default"]="nothing";
$elem["wflogs/report_sort"]["type"]="select";
$elem["wflogs/report_sort"]["choices"][1]="Yes default order";
$elem["wflogs/report_sort"]["choices"][2]="Yes custom order";
$elem["wflogs/report_sort"]["choicesde"][1]="Ja\";
$elem["wflogs/report_sort"]["choicesde"][2]="voreingestellte Reihenfolge";
$elem["wflogs/report_sort"]["choicesde"][3]="Ja\";
$elem["wflogs/report_sort"]["choicesde"][4]="gewählte Reihenfolge";
$elem["wflogs/report_sort"]["choicesfr"][1]="Tri par défaut";
$elem["wflogs/report_sort"]["choicesfr"][2]="Tri personnalisé";
$elem["wflogs/report_sort"]["description"]="Sort order of the output:
 By default, the output is sorted  by `-count,time,dipaddr,protocol,dport', but
 you can choose another sort method or no sorting at all.
";
$elem["wflogs/report_sort"]["descriptionde"]="Sortierreihenfolge der Ausgabe:
 In der Voreinstellung wird die Ausgabe nach »-count,time,dipaddr,protocol,dport« sortiert. Sie können jedoch eine andere Sortiermethode wählen oder gar keine Sortierung.
";
$elem["wflogs/report_sort"]["descriptionfr"]="Mode de tri de la sortie :
 Par défaut, la sortie est triée par « -count,time,dipaddr,protocol,dport ». Cependant, vous pouvez choisir une autre méthode de tri.
";
$elem["wflogs/report_sort"]["default"]="Yes default order";
$elem["wflogs/email_sort"]["type"]="select";
$elem["wflogs/email_sort"]["choices"][1]="Sorted with default order";
$elem["wflogs/email_sort"]["choices"][2]="Sorted with custom order";
$elem["wflogs/email_sort"]["choicesde"][1]="Nach voreingestellter Reihenfolge sortiert";
$elem["wflogs/email_sort"]["choicesde"][2]="Nach gewählter Reihenfolge sortiert";
$elem["wflogs/email_sort"]["choicesfr"][1]="Tri par défaut";
$elem["wflogs/email_sort"]["choicesfr"][2]="Tri personnalisé";
$elem["wflogs/email_sort"]["description"]="Sorting order of the output:
 By default, the output is sorted  by `-count,time,dipaddr,protocol,dport', but
 you can choose another sort method or no sorting at all.
";
$elem["wflogs/email_sort"]["descriptionde"]="Sortierreihenfolge der Ausgabe:
 In der Voreinstellung wird die Ausgabe nach »-count,time,dipaddr,protocol,dport« sortiert. Sie können jedoch eine andere Sortiermethode wählen oder gar keine Sortierung.
";
$elem["wflogs/email_sort"]["descriptionfr"]="Mode de tri de la sortie :
 Par défaut, la sortie est triée par « -count,time,dipaddr,protocol,dport ». Cependant, vous pouvez choisir une autre méthode de tri.
";
$elem["wflogs/email_sort"]["default"]="Sorted with default order";
$elem["wflogs/report_sort_options"]["type"]="string";
$elem["wflogs/report_sort_options"]["description"]="Sorting order of the output:
 Set output lines sort order according to the multilevel sort specified by
 the sequence of keys key1,key2,... Syntax is [+|-]key1[,[+|-]key2[,...]].
 Choose a key from the following ones:
    count         sort by count (number of original log entries)
    time          sort by log entry date (if count != 1, the date of the
 first original log line)
    timeend       sort by log entry end date (if count != 1, the date of
 the last original log line)
    input_iface   sort by input interface name
    output_iface  sort by output interface name
    sipaddr       sort by source IP address
    dipaddr       sort by destination IP address
    smacaddr      sort by source MAC address
    dmacaddr      sort by destination MAC address
    protocol      sort by protocol number
    sport         sort by source port number (if available)
    dport         sort by destination port number (if available)
    tcpflags      sort by TCP flags
    hostname      sort by hostname
    chainlabel    sort by chain label
    branchname    sort by branch name
    datalen       sort by data length
    format        sort by firewalling tool format
    none          do not sort
 `-' reverses direction only on the key it precedes. The `+' is really
 optional since default direction is increasing numerical or lexicographic
 order. For example dport,-time sorts according to destination port number,
 then reverse time (for a given port number). If one of the keys is `none',
 the output is not sorted.
";
$elem["wflogs/report_sort_options"]["descriptionde"]="Sortierreihenfolge der Ausgabe:
 Geben Sie die Sortierreihenfolge der ausgegebenen Zeilen entsprechend der mehrschichtigen Sortierung an, die durch die Sequenz von Schlüsseln (key1, key2, ...) spezifiziert wird. Die Syntax lautet [+|-]key1[,[+|-]key2[,...]]. Wählen Sie die Schlüssel aus der folgenden Liste:
    count         nach Anzahl sortieren (Anzahl der originalen
                  Protokolleinträge)
    time          nach Datum und Zeit des Protokolleintrags sortieren
                  (falls count != 1, das Datum der ersten originalen
                  Protokollzeile)
    timeend       nach Enddatum und -zeit des Protokolleintrags sortieren
                  (falls count != 1, das Datum der letzten originalen
                  Protokollzeile)
    input_iface   nach dem Namen der Eingangsschnittstelle sortieren
    output_iface  nach dem Namen der Ausgangsschnittstelle sortieren
    sipaddr       nach der Quell-IP-Adresse sortieren
    dipaddr       nach der Ziel-IP-Adresse sortieren
    smacaddr      nach der Quell-MAC-Adresse sortieren
    dmacaddr      nach der Ziel-MAC-Adresse sortieren
    protocol      nach Protokollnummer sortieren
    sport         nach der Nummer des Quell-Ports sortieren (falls
                  verfügbar)
    dport         nach der Nummer des Ziel-Ports sortieren (falls
                  verfügbar)
    tcpflags      nach TCP-Flag sortieren
    hostname      nach Rechnernamen sortieren
    chainlabel    nach Chain-Label sortieren
    branchname    nach Branch-Name sortieren
    datalen       nach der Länge der Daten sortieren
    format        nach dem Format des Firewall-Werkzeugs sortieren
    none          nicht sortieren
 »-« kehrt die Richtung nur für den Schlüssel um, dem es voransteht. Das »+« ist vollständig optional, da die voreingestellte Richtung numerisch oder lexikographisch ansteigend ist. Zum Beispiel sortiert »dport,-time« nach der Nummer des Ziel-Ports und dann absteigend nach der Zeit (für eine gegebene Port-Nummer). Falls einer der Schlüssel »none« ist, wird die Ausgabe nicht sortiert.
";
$elem["wflogs/report_sort_options"]["descriptionfr"]="Mode de tri de la sortie :
 Choisissez l'ordre de tri en utilisant des clés de tri à niveaux multiples. Cet ordre de tri aura la forme d'une suite de clés : clé1, clé2, ... La syntaxe est : [+|-]clé1[,[+|-]clé2[,...]]. Les clés de tri possibles sont les suivantes :
  - count        : tri par nombre (nombre initial d'entrées de journal) ;
  - time         : tri par date de première entrée (si « count » est
                   différent de 1, date de la première entrée de
                   journal) ;
  - timeend      : tri par date de dernière entrée (si « count » est
                   différent de 1, date de la dernière entrée de
                   journal) ;
  - input_iface  : tri par nom de l'interface d'entrée ;
  - output_iface : tri par nom de l'interface de sortie ;
  - sipaddr      : tri par adresse IP d'origine ;
  - dipaddr      : tri par adresse IP de destination ;
  - smacaddr     : tri par adresse MAC d'origine ;
  - dmacaddr     : tri par adresse MAC de destination ;
  - protocol     : tri par numéro de protocole ;
  - sport        : tri par numéro de port source (si disponible) ;
  - dport        : tri par numéro de port destination (si disponible) ;
  - tcpflags     : tri par drapeau TCP ;
  - hostname     : tri par nom d'hôte ;
  - chainlabel   : tri par étiquette de chaîne ;
  - branchname   : tri par nom de branche ;
  - datalen      : tri par longueur des données ;
  - format       : tri selon le format de l'outil de pare-feu ;
  - none         : ne pas trier.
 « - » permet d'inverser l'ordre de tri uniquement pour la clé qu'il précède. « + » est tout-à-fait optionnel car il représente l'ordre de tri par défaut (croissant). Par exemple, « dport,-time » va trier d'abord selon les  numéros de ports destinataires, puis de manière décroissante sur la date (pour un port donné). Si une de ces clés de tri est « none », la sortie ne sera pas triée.
";
$elem["wflogs/report_sort_options"]["default"]="-count,time,dipaddr,protocol,dport";
$elem["wflogs/email_sort_options"]["type"]="string";
$elem["wflogs/email_sort_options"]["description"]="Sorting order of the output:
 Set output lines sort order according to the multilevel sort specified by
 the sequence of keys key1,key2,... Syntax is [+|-]key1[,[+|-]key2[,...]].
 Choose a key from the following ones:
    count         sort by count (number of original log entries)
    time          sort by log entry date (if count != 1, the date of the
 first original log line)
    timeend       sort by log entry end date (if count != 1, the date of
 the last original log line)
    input_iface   sort by input interface name
    output_iface  sort by output interface name
    sipaddr       sort by source IP address
    dipaddr       sort by destination IP address
    smacaddr      sort by source MAC address
    dmacaddr      sort by destination MAC address
    protocol      sort by protocol number
    sport         sort by source port number (if available)
    dport         sort by destination port number (if available)
    tcpflags      sort by TCP flags
    hostname      sort by hostname
    chainlabel    sort by chain label
    branchname    sort by branch name
    datalen       sort by data length
    format        sort by firewalling tool format
    none          do not sort
 `-' reverses direction only on the key it precedes. The `+' is really
 optional since default direction is increasing numerical or lexicographic
 order. For example dport,-time sorts according to destination port number,
 then reverse time (for a given port number). If one of the keys is `none',
 the output is not sorted.
";
$elem["wflogs/email_sort_options"]["descriptionde"]="Sortierreihenfolge der Ausgabe:
 Geben Sie die Sortierreihenfolge der ausgegebenen Zeilen entsprechend der mehrschichtigen Sortierung an, die durch die Sequenz von Schlüsseln (key1, key2, ...) spezifiziert wird. Die Syntax lautet [+|-]key1[,[+|-]key2[,...]]. Wählen Sie die Schlüssel aus der folgenden Liste:
    count         nach Anzahl sortieren (Anzahl der originalen
                  Protokolleinträge)
    time          nach Datum und Zeit des Protokolleintrags sortieren
                  (falls count != 1, das Datum der ersten originalen
                  Protokollzeile)
    timeend       nach Enddatum und -zeit des Protokolleintrags sortieren
                  (falls count != 1, das Datum der letzten originalen
                  Protokollzeile)
    input_iface   nach dem Namen der Eingangsschnittstelle sortieren
    output_iface  nach dem Namen der Ausgangsschnittstelle sortieren
    sipaddr       nach der Quell-IP-Adresse sortieren
    dipaddr       nach der Ziel-IP-Adresse sortieren
    smacaddr      nach der Quell-MAC-Adresse sortieren
    dmacaddr      nach der Ziel-MAC-Adresse sortieren
    protocol      nach Protokollnummer sortieren
    sport         nach der Nummer des Quell-Ports sortieren (falls
                  verfügbar)
    dport         nach der Nummer des Ziel-Ports sortieren (falls
                  verfügbar)
    tcpflags      nach TCP-Flag sortieren
    hostname      nach Rechnernamen sortieren
    chainlabel    nach Chain-Label sortieren
    branchname    nach Branch-Name sortieren
    datalen       nach der Länge der Daten sortieren
    format        nach dem Format des Firewall-Werkzeugs sortieren
    none          nicht sortieren
 »-« kehrt die Richtung nur für den Schlüssel um, dem es voransteht. Das »+« ist vollständig optional, da die voreingestellte Richtung numerisch oder lexikographisch ansteigend ist. Zum Beispiel sortiert »dport,-time« nach der Nummer des Ziel-Ports und dann absteigend nach der Zeit (für eine gegebene Port-Nummer). Falls einer der Schlüssel »none« ist, wird die Ausgabe nicht sortiert.
";
$elem["wflogs/email_sort_options"]["descriptionfr"]="Mode de tri de la sortie :
 Choisissez l'ordre de tri en utilisant des clés de tri à niveaux multiples. Cet ordre de tri aura la forme d'une suite de clés : clé1, clé2, ... La syntaxe est : [+|-]clé1[,[+|-]clé2[,...]]. Les clés de tri possibles sont les suivantes :
  - count        : tri par nombre (nombre initial d'entrées de journal) ;
  - time         : tri par date de première entrée (si « count » est
                   différent de 1, date de la première entrée de
                   journal) ;
  - timeend      : tri par date de dernière entrée (si « count » est
                   différent de 1, date de la dernière entrée de
                   journal) ;
  - input_iface  : tri par nom de l'interface d'entrée ;
  - output_iface : tri par nom de l'interface de sortie ;
  - sipaddr      : tri par adresse IP d'origine ;
  - dipaddr      : tri par adresse IP de destination ;
  - smacaddr     : tri par adresse MAC d'origine ;
  - dmacaddr     : tri par adresse MAC de destination ;
  - protocol     : tri par numéro de protocole ;
  - sport        : tri par numéro de port source (si disponible) ;
  - dport        : tri par numéro de port destination (si disponible) ;
  - tcpflags     : tri par drapeau TCP ;
  - hostname     : tri par nom d'hôte ;
  - chainlabel   : tri par étiquette de chaîne ;
  - branchname   : tri par nom de branche ;
  - datalen      : tri par longueur des données ;
  - format       : tri selon le format de l'outil de pare-feu ;
  - none         : ne pas trier.
 « - » permet d'inverser l'ordre de tri uniquement pour la clé qu'il précède. « + » est tout-à-fait optionnel car il représente l'ordre de tri par défaut (croissant). Par exemple, « dport,-time » va trier d'abord selon les  numéros de ports destinataires, puis de manière décroissante sur la date (pour un port donné). Si une de ces clés de tri est « none », la sortie ne sera pas triée.
";
$elem["wflogs/email_sort_options"]["default"]="-count,time,dipaddr,protocol,dport";
$elem["wflogs/report_output_summary"]["type"]="boolean";
$elem["wflogs/report_output_summary"]["description"]="Summarize logs in the report?
 The report can be a summary (similar log events are grouped).
";
$elem["wflogs/report_output_summary"]["descriptionde"]="Die Protokolle im Bericht zusammenfassen?
 Der Bericht kann ein Zusammenfassung sein (ähnliche Protokollereignisse sind gruppiert).
";
$elem["wflogs/report_output_summary"]["descriptionfr"]="Faut-il résumer les journaux dans le rapport ?
 Le rapport peut être un résumé (les événements similaires sont groupés).
";
$elem["wflogs/report_output_summary"]["default"]="true";
$elem["wflogs/email_output_summary"]["type"]="boolean";
$elem["wflogs/email_output_summary"]["description"]="Summarize logs in the report?
 The report can be a summary (similar log events are grouped).
";
$elem["wflogs/email_output_summary"]["descriptionde"]="Die Protokolle im Bericht zusammenfassen?
 Der Bericht kann ein Zusammenfassung sein (ähnliche Protokollereignisse sind gruppiert).
";
$elem["wflogs/email_output_summary"]["descriptionfr"]="Faut-il résumer les journaux dans le rapport ?
 Le rapport peut être un résumé (les événements similaires sont groupés).
";
$elem["wflogs/email_output_summary"]["default"]="true";
$elem["wflogs/report_output_whois"]["type"]="select";
$elem["wflogs/report_output_whois"]["choices"][1]="no whois lookups";
$elem["wflogs/report_output_whois"]["choices"][2]="always do whois lookups";
$elem["wflogs/report_output_whois"]["choicesde"][1]="keine Whois-Abfragen";
$elem["wflogs/report_output_whois"]["choicesde"][2]="immer Whois-Abfragen durchführen";
$elem["wflogs/report_output_whois"]["choicesfr"][1]="pas de recherche whois";
$elem["wflogs/report_output_whois"]["choicesfr"][2]="recherche whois systématique";
$elem["wflogs/report_output_whois"]["description"]="Inclusion of whois in the report:
 Please choose how the inclusion of whois lookups in the report should be done.
";
$elem["wflogs/report_output_whois"]["descriptionde"]="Einbeziehung von Whois im Bericht:
 Bitte wählen Sie, wie Whois-Abfragen in den Bericht einbezogen werden sollen.
";
$elem["wflogs/report_output_whois"]["descriptionfr"]="Utilisation des recherches whois pour les rapports :
 Veuillez choisir comment seront utilisées les recherches whois pour les rapports.
";
$elem["wflogs/report_output_whois"]["default"]="do whois lookups only if no DNS name could be found";
$elem["wflogs/email_output_whois"]["type"]="select";
$elem["wflogs/email_output_whois"]["choices"][1]="no whois lookups";
$elem["wflogs/email_output_whois"]["choices"][2]="always do whois lookups";
$elem["wflogs/email_output_whois"]["choicesde"][1]="keine Whois-Abfragen";
$elem["wflogs/email_output_whois"]["choicesde"][2]="immer Whois-Abfragen durchführen";
$elem["wflogs/email_output_whois"]["choicesfr"][1]="pas de recherche whois";
$elem["wflogs/email_output_whois"]["choicesfr"][2]="recherche whois systématique";
$elem["wflogs/email_output_whois"]["description"]="Inclusion of whois in the report:
 Please choose how the inclusion of whois lookups in the report should be done.
";
$elem["wflogs/email_output_whois"]["descriptionde"]="Einbeziehung von Whois im Bericht:
 Bitte wählen Sie, wie Whois-Abfragen in den Bericht einbezogen werden sollen.
";
$elem["wflogs/email_output_whois"]["descriptionfr"]="Utilisation des recherches whois pour les rapports :
 Veuillez choisir comment seront utilisées les recherches whois pour les rapports.
";
$elem["wflogs/email_output_whois"]["default"]="do whois lookups only if no DNS name could be found";
$elem["wflogs/report_output_mac_vendor"]["type"]="boolean";
$elem["wflogs/report_output_mac_vendor"]["description"]="Show the MAC vendor?
 The MAC vendor can be determined by using the prefix of the MAC address if
 it is available.
";
$elem["wflogs/report_output_mac_vendor"]["descriptionde"]="Den MAC-Hersteller anzeigen?
 Der MAC-Herstellen kann unter Verwendung des Präfixes der MAC-Adresse ermittelt werden, falls sie verfügbar ist.
";
$elem["wflogs/report_output_mac_vendor"]["descriptionfr"]="Faut-il afficher le constructeur des matériels ?
 Le constructeur d'un matériel (« MAC vendor ») peut être déterminé avec le préfixe de l'adresse MAC si elle est accessible.
";
$elem["wflogs/report_output_mac_vendor"]["default"]="false";
$elem["wflogs/email_output_mac_vendor"]["type"]="boolean";
$elem["wflogs/email_output_mac_vendor"]["description"]="Show the MAC vendor?
 The MAC vendor can be determined by using the prefix of the MAC address if
 it is available.
";
$elem["wflogs/email_output_mac_vendor"]["descriptionde"]="Den MAC-Hersteller anzeigen?
 Der MAC-Herstellen kann unter Verwendung des Präfixes der MAC-Adresse ermittelt werden, falls sie verfügbar ist.
";
$elem["wflogs/email_output_mac_vendor"]["descriptionfr"]="Faut-il afficher le constructeur des matériels ?
 Le constructeur d'un matériel (« MAC vendor ») peut être déterminé avec le préfixe de l'adresse MAC si elle est accessible.
";
$elem["wflogs/email_output_mac_vendor"]["default"]="false";
$elem["wflogs/report_output_mac"]["type"]="boolean";
$elem["wflogs/report_output_mac"]["description"]="Show MAC addresses?
 Destination and source MAC addresses can be displayed in the report.
";
$elem["wflogs/report_output_mac"]["descriptionde"]="MAC-Adressen anzeigen?
 Ziel- und Quell-MAC-Adressen können im Bericht aufgeführt werden.
";
$elem["wflogs/report_output_mac"]["descriptionfr"]="Faut-il afficher les adresses MAC ?
 Les adresses MAC source et destination peuvent être affichées dans le rapport.
";
$elem["wflogs/report_output_mac"]["default"]="false";
$elem["wflogs/email_output_mac"]["type"]="boolean";
$elem["wflogs/email_output_mac"]["description"]="Show MAC addresses?
 Destination and sources MAC addresses can be displayed in the email.
";
$elem["wflogs/email_output_mac"]["descriptionde"]="MAC-Adressen anzeigen?
 Ziel- und Quell-MAC-Adressen können in der E-Mail aufgeführt werden.
";
$elem["wflogs/email_output_mac"]["descriptionfr"]="Faut-il afficher les adresses MAC ?
 Les adresses MAC source et destination peuvent être affichées dans le rapport par courriel.
";
$elem["wflogs/email_output_mac"]["default"]="false";
$elem["wflogs/report_output_src_mac"]["type"]="boolean";
$elem["wflogs/report_output_src_mac"]["description"]="Show the source MAC address?
";
$elem["wflogs/report_output_src_mac"]["descriptionde"]="Die Quell-MAC-Adresse anzeigen?
";
$elem["wflogs/report_output_src_mac"]["descriptionfr"]="Faut-il afficher l'adresse MAC source ?
";
$elem["wflogs/report_output_src_mac"]["default"]="false";
$elem["wflogs/email_output_src_mac"]["type"]="boolean";
$elem["wflogs/email_output_src_mac"]["description"]="Show the source MAC address?
";
$elem["wflogs/email_output_src_mac"]["descriptionde"]="Die Quell-MAC-Adresse anzeigen?
";
$elem["wflogs/email_output_src_mac"]["descriptionfr"]="Faut-il afficher l'adresse MAC source ?
";
$elem["wflogs/email_output_src_mac"]["default"]="false";
$elem["wflogs/report_output_duration"]["type"]="boolean";
$elem["wflogs/report_output_duration"]["description"]="Show duration between the first and last packets for multiple packets?
";
$elem["wflogs/report_output_duration"]["descriptionde"]="Die Zeitspanne zwischen den ersten und letzten Paketen für mehrere Pakete anzeigen?
";
$elem["wflogs/report_output_duration"]["descriptionfr"]="Faut-il afficher la durée écoulée entre le premier paquet et le dernier (s'il existe plusieurs paquets) ?
";
$elem["wflogs/report_output_duration"]["default"]="false";
$elem["wflogs/email_output_duration"]["type"]="boolean";
$elem["wflogs/email_output_duration"]["description"]="Show duration between the first and last packets for multiple packets?
";
$elem["wflogs/email_output_duration"]["descriptionde"]="Die Zeitspanne zwischen den ersten und letzten Paketen für mehrere Pakete anzeigen?
";
$elem["wflogs/email_output_duration"]["descriptionfr"]="Faut-il afficher la durée écoulée entre le premier paquet et le dernier (s'il existe plusieurs paquets) ?
";
$elem["wflogs/email_output_duration"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
