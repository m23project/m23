<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("am-utils");

$elem["am-utils/import-amd-conf-done"]["type"]="boolean";
$elem["am-utils/import-amd-conf-done"]["description"]="for internal use

";
$elem["am-utils/import-amd-conf-done"]["descriptionde"]="";
$elem["am-utils/import-amd-conf-done"]["descriptionfr"]="";
$elem["am-utils/import-amd-conf-done"]["default"]="false";
$elem["am-utils/import-amd-conf"]["type"]="boolean";
$elem["am-utils/import-amd-conf"]["description"]="Import old amd configuration?
 amd package configuration files are available (the \"amd\" package was
 the precursor to am-utils)
 .
 A mechanism is available to import these files, but it may fail
 in some cases.
";
$elem["am-utils/import-amd-conf"]["descriptionde"]="Importiere die alte Konfiguration von Amd?
 Die Amd-Paketkonfigurationsdateien sind verfügbar (das »amd«-Paket ist der Vorgänger der am-utils).
 .
 Es existiert ein Mechanismus, diese Dateien zu importieren, allerdings könnte dieser in einigen Fällen fehlschlagen.
";
$elem["am-utils/import-amd-conf"]["descriptionfr"]="Faut-il importer l'ancienne configuration d'amd ?
 Il semblerait que des fichiers de configuration d'amd soient présents (le paquet « amd » est le prédécesseur d'am-utils).
 .
 Il existe une possibilité pour importer ces fichiers, mais elle peut échouer dans certaines conditions.
";
$elem["am-utils/import-amd-conf"]["default"]="false";
$elem["am-utils/log-to-file"]["type"]="error";
$elem["am-utils/log-to-file"]["description"]="Failed to log to file
 The old \"amd\" configuration used to log to a file instead of using syslog.
 .
 The \"am-utils\" package only supports logging to the syslog out of the box.
 You might want to modify the /etc/am-utils/amd.conf file to enable logging
 to a file.
 .
 This will require manual intervention.
";
$elem["am-utils/log-to-file"]["descriptionde"]="Protokollieren in eine Datei Datei fehlgeschlagen
 Die alte »Amd«-Konfiguration protokollierte in eine Datei statt Syslog zu verwenden.
 .
 Standardmäßig unterstützt das »am-utils«-Paket nur die Protokollierung mittels Syslog. Sie müssen /etc/am-utils/amd.conf modifizieren, damit Sie in eine Datei protokollieren können.
 .
 Hierzu ist ein manueller Eingriff nötig.
";
$elem["am-utils/log-to-file"]["descriptionfr"]="Échec de la journalisation dans un fichier
 L'installation antérieure d'amd utilisait un fichier plutôt que syslog, pour la journalisation.
 .
 Le paquet am-utils ne gère, sans modifications, que la journalisation via syslog. Vous devriez modifier le fichier /etc/am-utils/amd.conf pour activer la journalisation dans un fichier.
 .
 Cela nécessitera des modifications que vous devrez réaliser vous-même.
";
$elem["am-utils/log-to-file"]["default"]="";
$elem["am-utils/import-amd-failed"]["type"]="error";
$elem["am-utils/import-amd-failed"]["description"]="Automatic import of amd's configuration failed
 Unfortunately, the automatic import of the old amd configuration failed.
 .
 Please review your am-utils configuration.
";
$elem["am-utils/import-amd-failed"]["descriptionde"]="Automatisches Importieren der Konfiguration von Amd fehlgeschlagen
 Unglücklicherweise ist das automatische Importieren der alten Amd-Konfiguration fehlgeschlagen.
 .
 Bitte schauen Sie sich Ihre am-utils Konfiguration an.
";
$elem["am-utils/import-amd-failed"]["descriptionfr"]="Échec de l'importation automatique de la configuration
 L'importation automatique de l'ancienne configuration d'amd a échoué.
 .
 Veuillez vérifier la configuration d'am-utils.
";
$elem["am-utils/import-amd-failed"]["default"]="";
$elem["am-utils/use-nis"]["type"]="boolean";
$elem["am-utils/use-nis"]["description"]="Is the amd master map propagated through NIS?
 At large sites the automounter tables (called 'maps') may be available
 through the \"Network Information Service\", or NIS for short (formerly known
 as \"Yellow pages\").  This is the recommended way of using the automounter
 on client systems.
 .
 The master map contains the list of mount points to be managed by amd.
 This master map can be propagated through NIS or can be a file. Whatever
 answer you choose here does not prevent amd from retrieving the other maps
 via NIS.
 .
 Only the *master* map is concerned here.
";
$elem["am-utils/use-nis"]["descriptionde"]="Wird die Amd Master Map über NIS verteilt?
 In großen Umgebungen werden die automounter-Tabellen (genannt »Maps«) möglicherweise über den »Network Information Service«, oder kurz NIS (früher bekannt als »Yellow Pages«) verteilt. Dies ist die empfohlene Art, den Automounter auf den Client-Systemen einzusetzen.
 .
 Die Master Map enthält die Listen der Einhängepunkte, die von Amd verwaltet werden sollen. Diese Master Map kann über NIS verteilt werden oder eine Datei sein. Unabhängig davon, was Sie hier auswählen, wird Amd nicht daran gehindert andere Maps über NIS abzurufen.
 .
 Nur die *Master* Map ist hiervon betroffen.
";
$elem["am-utils/use-nis"]["descriptionfr"]="La carte principale (« master map ») d'amd est-elle diffusée via NIS ?
 Sur les sites importants, les tables de montage automatique (appelées « cartes ») peuvent être diffusées via NIS (« Network Information System »), précédemment appelées « Pages Jaunes ». Il s'agit de la méthode recommandée pour utiliser l'auto-monteur sur les systèmes clients.
 .
 La carte principale contient la liste des points de montage gérés par amd. Cette carte principale peut être propagée par NIS ou peut être un simple fichier. Quel que soit le choix effectué, rien n'empêche amd de récupérer les autres cartes par NIS.
 .
 Seule la carte *principale* est concernée ici.
";
$elem["am-utils/use-nis"]["default"]="false";
$elem["am-utils/nis-master-map"]["type"]="string";
$elem["am-utils/nis-master-map"]["description"]="Name of the master map:
 The master map is the map containing amd's startup arguments and refers to
 other maps.
 .
 It's generally called \"amd.master\".
";
$elem["am-utils/nis-master-map"]["descriptionde"]="Name der NIS-Master Map:
 Die Master Map enthält die Start-Argumente von Amd und bezieht sich auch auf andere Maps.
 .
 Sie heißt normalerweise »amd.master«.
";
$elem["am-utils/nis-master-map"]["descriptionfr"]="Nom de la carte principale :
 La carte principale est la carte qui contient les options de démarrage d'amd et qui fait référence aux autres cartes.
 .
 Elle est généralement appelée « amd.master ».
";
$elem["am-utils/nis-master-map"]["default"]="amd.master";
$elem["am-utils/nis-master-map-key-style"]["type"]="select";
$elem["am-utils/nis-master-map-key-style"]["choices"][1]="config";
$elem["am-utils/nis-master-map-key-style"]["choices"][2]="onekey";
$elem["am-utils/nis-master-map-key-style"]["choices"][3]="mountpoint";
$elem["am-utils/nis-master-map-key-style"]["choicesde"][1]="Konfiguration";
$elem["am-utils/nis-master-map-key-style"]["choicesde"][2]="Onekey";
$elem["am-utils/nis-master-map-key-style"]["choicesde"][3]="Einhängepunkt";
$elem["am-utils/nis-master-map-key-style"]["choicesfr"][1]="configuration";
$elem["am-utils/nis-master-map-key-style"]["choicesfr"][2]="une seule clé";
$elem["am-utils/nis-master-map-key-style"]["choicesfr"][3]="point de montage";
$elem["am-utils/nis-master-map-key-style"]["description"]="Master map style:
 The Amd master map can be of different styles:
 .
 With the `config' style, every key in the master map specifies a different
 configuration. You might have different configurations depending on which
 OS is booted, or on what the machine's purpose is. The value associated
 with each key is the list of mountpoints and maps to be used with this
 configuration.
 .
 Example map:
 .
  linux   /home amd.home /boot amd.boot -cache:=all
  freebsd /home amd.home /usr/sys amd.usr-sys
 .
 You will need to specify which key to use.
 .
 The `onekey' style is the same as `config' except there is only one single
 configuration. No key needs to be specified.
 .
 With the `mountpoint' style, every key in the master map is the mount
 point and the value is the map name to be used for this mount point, plus
 some options if needed. This is the default map style for FreeBSD.
 .
 Example map:
 .
  /home amd.home
  /boot amd.boot -cache:=all
 .
 With the `custom' style, you will be prompted for a command to extract the
 master map which will be run everytime amd starts.
";
$elem["am-utils/nis-master-map-key-style"]["descriptionde"]="Aufbau der Master Map:
 Die Amd Master Map kann verschieden aufgebaut sein:
 .
 In dem »config«-Aufbau spezifiziert jeder Schlüssel in der Master Map eine andere Konfiguration. Sie haben vielleicht verschiedene Konfigurationen, abhängig von dem gebooteten Betriebssystem, oder abhängig vom Zweck des Rechners. Der Wert, der mit jedem Schlüssel verbunden ist, ist die Liste der Einhängepunkte und Maps, die mit dieser Konfiguration verwendet werden.
 .
 Beispiel Map:
 .
  linux   /home amd.home /boot amd.boot -cache:=all
  freebsd /home amd.home /usr/sys amd.usr-sys
 .
 Sie müssen angeben, welcher Schlüssel verwendet werden soll.
 .
 Der »onekey«-Aufbau ist der gleiche wie der »config«-Aufbau, mit der Ausnahme, dass es nur eine Konfiguration gibt. Es müssen keine Schlüssel spezifiziert werden.
 .
 Bei dem »Einhängepunkt«-Aufbau ist jeder Schlüssel in der Master Map der Einhängepunkt und der Wert ist der Name der Map, der für diesen Einhängepunkt verwendet wird, ergänzt um einige Optionen, sofern benötigt. Dies ist der Standard Map-Aufbau für FreeBSD.
 .
 Beispiel Map:
 .
  /home amd.home
  /boot amd.boot -cache:=all
 .
 Bei dem »angepassten«-Aufbau werden Sie nach einem Befehl gefragt, der die Master Map extrahiert und der bei jedem Start von Amd ausgeführt werden wird.
";
$elem["am-utils/nis-master-map-key-style"]["descriptionfr"]="Format de la carte principale :
 La carte principale d'amd peut avoir plusieurs formats différents :
 .
 Dans le format « configuration », chaque clé de la carte principale indique une configuration différente. Vous pouvez utiliser différentes configurations selon le système d'exploitation qui est démarré ou l'utilisation de la machine. La valeur associée à chaque clé est la liste des points de montage et des cartes qui sont utilisés avec cette configuration.
 .
 Exemple de carte :
 .
  linux   /home amd.home /boot amd.boot -cache:=all
  freebsd /home amd.home /usr/sys amd.usr-sys
 .
 Vous devrez indiquer quelle clé doit être utilisée.
 .
 Le format « une seule clé » est identique au format « configuration » avec une seule configuration. Vous n'aurez aucune clé à indiquer.
 .
 Dans le format « point de montage », chaque clé de la carte principale indique le point de montage et la valeur associée est le nom de la carte à utiliser pour ce point de montage, avec éventuellement certaines options. Il s'agit du format par défaut des cartes pour FreeBSD.
 .
 Exemple de carte :
 .
  /home amd.home
  /boot amd.boot -cache:=all
 .
 Avec le format « personnalisé », vous devrez indiquer la commande destinée à extraire la carte principale. Cette commande sera exécutée à chaque démarrage d'amd.
";
$elem["am-utils/nis-master-map-key-style"]["default"]="onekey";
$elem["am-utils/nis-key"]["type"]="string";
$elem["am-utils/nis-key"]["description"]="NIS key to use for this system:
 The key is typically the name of the os (\"linux\" for example), or a
 description of this computer's usage (\"marketing\", \"r&d\", etc).
";
$elem["am-utils/nis-key"]["descriptionde"]="NIS-Schlüssel, der für dieses System verwendet werden soll:
 Der Schlüssel ist typischerweise der Name des Betriebssystems (zum Beispiel »linux«), oder eine Beschreibung des Einsatzzwecks des Computers (»vertrieb«, »f&e«, usw.).
";
$elem["am-utils/nis-key"]["descriptionfr"]="Clé NIS à utiliser pour ce système :
 La clé est en général le nom du système d'exploitation (par exemple « linux ») ou une description de l'utilisation principale de l'ordinateur (« ventes », « recherche », etc.).
";
$elem["am-utils/nis-key"]["default"]="default";
$elem["am-utils/nis-custom"]["type"]="string";
$elem["am-utils/nis-custom"]["description"]="Command to run to extract the master map:
 Please enter a shell command to run when amd starts up. This command
 should print a valid list of amd command line maps on stdout.
";
$elem["am-utils/nis-custom"]["descriptionde"]="Auszuführender Befehl, um die Master Map zu extrahieren:
 Bitte geben Sie den Shell-Befehl ein, der ausgeführt werden soll, wenn Amd startet. Dieser Befehl sollte eine gültige Befehlszeile (command line) für Amd auf Stdout ausgeben.
";
$elem["am-utils/nis-custom"]["descriptionfr"]="Commande d'extraction de la carte principale :
 Veuillez indiquer une commande shell à exécuter au démarrage d'amd. Cette commande doit afficher sur la sortie standard une liste valide de commandes pour amd.
";
$elem["am-utils/nis-custom"]["default"]="echo \"/amd-is-misconfigured /usr/share/am-utils/amd.net\"";
$elem["am-utils/map-net"]["type"]="boolean";
$elem["am-utils/map-net"]["description"]="Use the 'net' map?
 Amd can be configured to use the net map. With this map, one can access
 all the filesystems exported via NFS from a particular host by looking
 under:
    /net/<HOSTNAME>/<FILESYSTEM>
 .
 While convenient, this can result in mounting a lot of filesystems
 simultaneously.
";
$elem["am-utils/map-net"]["descriptionde"]="Die »Net«-Map verwenden?
 Amd kann so konfiguriert werden, dass es die Net-Map verwendet. Mit dieser Map kann auf Dateisysteme zugegriffen werden, die von einem bestimmten Host via NFS exportiert werden:
    /net/<HOSTNAME>/<FILESYSTEM>
 .
 Dies ist zwar bequem, kann aber zum simultanen Einhängen von vielen Dateisystemen führen.
";
$elem["am-utils/map-net"]["descriptionfr"]="Faut-il utiliser la carte réseau (« net map ») ?
 Amd peut utiliser une carte réseau. Avec cette carte, tous les systèmes de fichiers d'un hôte donné exportés par NFS sont accessibles via un chemin de la forme suivante :
  /net/<HÔTE>/<SYSTÈME DE FICHIERS>
 .
 Bien que cela soit pratique, cela peut provoquer le montage de nombreux systèmes de fichiers au même moment.
";
$elem["am-utils/map-net"]["default"]="true";
$elem["am-utils/map-home"]["type"]="boolean";
$elem["am-utils/map-home"]["description"]="Use the passwd map?
 A map for automounting of home directories on /home.
 .
 If you use the following system for the home directories of
 your users, then you will not need to do any configuration, because amd
 provides a special \"passwd\" map type for this case. Amd will break the
 string
 .
  /anydir/[dom1[/...]/]domN/login
 .
 to:
 .
  rfs:=/anydir/domN
  rhost:=domN[[....].dom1]
  sublink:=login
 .
 If your home directories do *not* follow this pattern, you should not enable
 this feature.
";
$elem["am-utils/map-home"]["descriptionde"]="Soll die passwd-Map verwendet werden?
 Eine Map zum automatischen Einhängen der Home-Verzeichnisse auf /home.
 .
 Falls Sie das folgende System für die Home-Verzeichnisse Ihrer Benutzer verwenden, dann müssen Sie keine Konfiguration vornehmen, da Amd einen speziellen »passwd«-Map-Typ für diesen Fall bereitstellt. Amd wird die Zeichenkette
 .
  /anydir/[dom1[/...]/]domN/login
 .
 zerlegen in:
 .
   rfs:=/anydir/domN
   rhost:=domN[[....].dom1]
   sublink:=login
 .
 Falls Ihre Home-Verzeichnisse *nicht* diesem Muster folgen, sollten Sie diese Funktion nicht aktivieren.
";
$elem["am-utils/map-home"]["descriptionfr"]="Faut-il utiliser la carte passwd ?
 Carte de montage automatique des répertoires personnels sur /home.
 .
 Si vous utilisez le système suivant pour les répertoires personnels des utilisateurs, vous n'aurez pas besoin de configuration spécifique, car amd fournit une carte « passwd » spéciale pour ce cas. La chaîne suivante :
 .
  /répertoire/[dom1[/...]/]domN/identifiant
 .
 sera découpée en :
 .
  rfs:=/répertoire/domN
  rhost:=domN[[....].dom1]
  sublink:=identifiant
 .
 Si les répertoires personnels ne respectent pas ce format, vous ne devriez pas activer cette option.
";
$elem["am-utils/map-home"]["default"]="false";
$elem["am-utils/map-others"]["type"]="string";
$elem["am-utils/map-others"]["description"]="Other maps to use:
 If you need to use other maps, enter them here.
 .
 A map entry requires the two following elements:
   1. A mount point (where the map will be mounted and accessed)
   2. The name of a map, in a text file, DBM file, or the name of a
      NIS map.
 .
 For example, if you have a text map in /etc/am-utils/amd.test to be
 mounted on /foo and a NIS map called amd.other to be mounted on /bar, then
 you should enter:
 .
  /foo /etc/am-utils/amd.test /bar amd.other
";
$elem["am-utils/map-others"]["descriptionde"]="Anderen zu verwendende Maps:
 Falls Sie noch andere Maps verwenden müssen, geben Sie diese hier ein.
 .
 Typischerweise benötigt ein Map-Eintrag folgende zwei Elemente:
   1. Ein Einhängepunkt (wo die Map eingehängt und darauf zugegriffen wird)
   2. Den Namen der Map, in einer Textdatei, DBM-Datei, oder den
      Name der NIS-Map.
 .
 Wenn Sie zum Beispiel eine Text-Map in /etc/am-utils/amd.test haben, die nach /foo eingehängt wird und die NIS-Map amd.other heißt und nach /bar eingehängt wird, sollten Sie folgendes eingeben:
 .
  /foo /etc/am-utils/amd.test /bar amd.other
";
$elem["am-utils/map-others"]["descriptionfr"]="Autres types de cartes à utiliser :
 Si vous avez besoin d'autres types de cartes, vous pouvez les indiquer ici.
 .
 Typiquement, une entrée de carte doit comporter les deux éléments suivants :
  - un point de montage où la carte sera montée et où elle
    sera accessible ;
  - le nom de la carte dans un fichier texte ou DBM ou le nom
    de la carte NIS.
 .
 Par exemple, si vous voulez utiliser une carte en format texte appelée /etc/am-utils/amd.test pour des montages sur /toto et une carte NIS appelée amd.other pour des montages sur /titi, vous devez alors indiquer :
 .
  /toto /etc/am-utils/amd.test /titi amd.other
";
$elem["am-utils/map-others"]["default"]="";
$elem["am-utils/clustername"]["type"]="string";
$elem["am-utils/clustername"]["description"]="Cluster name to use:
 A map entry can use the '\${cluster}' selector, to identify a machine as
 belonging to a particular cluster.  
 .
 If you use that facility, set the cluster name here.  If you leave it
 blank, amd will use the DNS domain name instead.
";
$elem["am-utils/clustername"]["descriptionde"]="Zu verwendender Cluster-Name:
 Ein Map-Eintrag kann den »\${cluster}«-Selektor verwenden, um eine Maschine als zu einem bestimmten Cluster zugehörig zu markieren.
 .
 Falls Sie diese Einrichtung benutzen, stellen Sie den Cluster-Namen hier ein. Falls Sie dies leer lassen wird Amd stattdessen den Domain-Namen verwenden.
";
$elem["am-utils/clustername"]["descriptionfr"]="Nom de grappe (« cluster ») à utiliser :
 Une entrée de carte peut utiliser le sélecteur ${cluster} qui permet d'identifier la machine comme membre d'une grappe donnée.
 .
 Si vous utilisez cette fonctionnalité, veuillez indiquer le nom de la grappe ici. Si vous laissez ce champ vide, le nom de domaine DNS sera utilisé à la place.
";
$elem["am-utils/clustername"]["default"]="";
$elem["am-utils/rpc-localhost"]["type"]="error";
$elem["am-utils/rpc-localhost"]["description"]="Cannot contact RPC service on localhost
 Access to localhost's amd RPC service is denied!  am-utils will not work
 until you take manual action to rectify this.
 .
 Please fix your /etc/hosts.allow and /etc/hosts.deny files and grant access to
 the amd service for localhost. This is typically done by inserting the
 following line to /etc/hosts.allow:
 .
 amd: localhost
";
$elem["am-utils/rpc-localhost"]["descriptionde"]="Kann den RPC-Dienst auf localhost nicht erreichen
 Der Zugriff auf den Amd RPC-Dienst auf localhost wurde verweigert! am-utils wird nicht funktionieren, bis Sie dies manuell behoben haben.
 .
 Bitte korrigieren Sie Ihre /etc/hosts.allow- und /etc/hosts.deny-Dateien und geben Sie dem Amd-Dienst Zugriff auf localhost. Dies passiert typischerweise, indem Sie die folgende Zeile zu /etc/hosts.allow hinzufügen:
 .
 amd: localhost
";
$elem["am-utils/rpc-localhost"]["descriptionfr"]="Impossible de contacter le service RPC sur l'hôte local
 L'accès au service RPC d'amd sur l'hôte local (« localhost ») a été refusé. Les utilitaires d'am-utils ne fonctionneront pas tant que cela ne sera pas corrigé.
 .
 Vous devriez corriger les fichiers /etc/hosts.allow et /etc/hosts.deny et autoriser le service amd à accéder à l'hôte local. La méthode usuelle pour cela est d'ajouter la ligne suivante dans /etc/hosts.allow :
 .
 amd: localhost
";
$elem["am-utils/rpc-localhost"]["default"]="";
PKG_OptionPageTail2($elem);
?>
