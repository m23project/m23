<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nbd-client");

$elem["nbd-client/no-auto-config"]["type"]="error";
$elem["nbd-client/no-auto-config"]["description"]="AUTO_GEN is set to \"n\" in /etc/nbd-client
 The /etc/nbd-client file contains a line that sets the AUTO_GEN variable
 to \"n\". The file will therefore not be regenerated automatically.
 .
 If that's wrong, remove the line and call \"dpkg-reconfigure nbd-client\"
 afterwards.
";
$elem["nbd-client/no-auto-config"]["descriptionde"]="AUTO_GEN ist in /etc/nbd-client auf »n« gesetzt.
 Die Datei /etc/nbd-client enthält eine Zeile, in der die Variable AUTO_GEN auf »n« gesetzt wird. Die Datei wird daher nicht automatisch erneuert.
 .
 Falls das falsch ist, entfernen Sie die Zeile und rufen danach »dpkg-reconfigure nbd-client« auf.
";
$elem["nbd-client/no-auto-config"]["descriptionfr"]="Variable AUTO_GEN égale à « n » dans /etc/nbd-client
 Le fichier /etc/nbd-client comporte une ligne qui définit la variable AUTO_GEN à « n ». Le fichier ne sera donc pas recréé automatiquement.
 .
 Si ce n'est pas le cas, supprimez ou commentez la ligne, puis relancez ensuite «  dpkg-reconfigure nbd-client ».
";
$elem["nbd-client/no-auto-config"]["default"]="";
$elem["nbd-client/number"]["type"]="string";
$elem["nbd-client/number"]["description"]="Number of nbd-client connections to use:
 nbd-client can handle multiple concurrent connections. Please specify the
 number of connections you'd like this configuration script to set up.
 .
 Note that if something has already been specified in /etc/nbd-client, the
 current configuration will be used as defaults in these dialogs.
";
$elem["nbd-client/number"]["descriptionde"]="Anzahl der zu benutzenden nbd-Client-Verbindungen:
 nbd-client kann mehrere gleichzeitige Verbindungen handhaben. Bitte geben Sie die Anzahl der Verbindungen an, die dieses Konfigurationsskript einrichten soll.
 .
 Beachten Sie, dass die aktuelle Konfiguration als Standardeinstellung in diesen Dialogen verwendet wird, falls bereits etwas in /etc/nbd-client angegeben wurde.
";
$elem["nbd-client/number"]["descriptionfr"]="Nombre de connexions nbd-client à utiliser :
 Le programme nbd-client peut gérer plusieurs connexions simultanées. Veuillez indiquer le nombre de connexions que cet outil de configuration doit mettre en place.
 .
 Veuillez noter que si un paramétrage existe dans /etc/nbd-client, l'outil de configuration le prendra comme valeur par défaut dans ce qui suit.
";
$elem["nbd-client/number"]["default"]="0";
$elem["nbd-client/type"]["type"]="select";
$elem["nbd-client/type"]["choices"][1]="swap";
$elem["nbd-client/type"]["choices"][2]="filesystem";
$elem["nbd-client/type"]["choicesde"][1]="Swap";
$elem["nbd-client/type"]["choicesde"][2]="Dateisystem";
$elem["nbd-client/type"]["choicesfr"][1]="zone d'échange (« swap »)";
$elem["nbd-client/type"]["choicesfr"][2]="système de fichiers";
$elem["nbd-client/type"]["description"]="Intended use of the network block device number ${number}:
 The network block device can serve multiple purposes. One of the most
 interesting is to provide swap space over the network for diskless clients,
 but you can store a filesystem on it, or do other things with it for which
 a block device is interesting.
 .
 If you intend to use the network block device as a swap device, choose
 \"swap\". If you intend to use it as a filesystem, add a line to /etc/fstab,
 give it the option \"_netdev\" (else init will try to mount it before it's
 usable), and choose \"filesystem\". For all other purposes, choose \"raw\".
 The only thing the nbd-client boot script will do then is start an
 nbd-client process; you will have to set it up manually.
";
$elem["nbd-client/type"]["descriptionde"]="Geplante Benutzung von »Network Block Device« Nummer ${number}:
 Das Network Block Device kann vielen Zwecken dienen. Einer der interessantesten ist es, Swap-Bereiche über das Netz für plattenlose Clients bereitzustellen, aber Sie können auch ein Dateisystem auf ihm ablegen oder andere Dinge tun, für die ein Block-Gerät interessant ist.
 .
 Falls Sie das »Network Block Device« als Swap-Device nutzen möchten, wählen Sie »Swap«. Falls Sie es als Dateisystem nutzen möchten, fügen Sie eine Zeile zur /etc/fstab mit der Option »_netdev« hinzu (sonst versucht init, sie einzuhängen, bevor es benutzbar ist) und wählen hier »Dateisystem«. Für alle anderen Zwecke wählen Sie »unbearbeitet«. Dann wird das nbd-Client-Bootskript lediglich den nbd-Client-Prozess starten; Sie müssen die Einrichtung dann manuell durchführen.
";
$elem["nbd-client/type"]["descriptionfr"]="Utilisation prévue pour le périphérique bloc réseau (numéro ${number}) :
 Un périphérique bloc en réseau (« network block device ») peut avoir plusieurs utilisations. Une des plus intéressantes est de l'utiliser comme zone d'échange pour les clients sans disque. Vous pouvez également y placer un système de fichiers ou encore trouver d'autres utilisations pour lesquelles un périphérique de bloc est nécessaire.
 .
 Si vous avez l'intention d'utiliser le périphérique de bloc en réseau comme zone d'échange (« swap »), veuillez choisir « zone d'échange ». Si vous souhaitez y placer un système de fichiers, ajoutez une ligne au fichier /etc/fstab avec l'option « _netdev » (sinon les scripts d'initialisation du système chercheront à monter le système de fichiers avant qu'il ne soit utilisable) et choisissez « système de fichiers ». Pour toutes les autres utilisations, choisissez « données brutes » : la seule action du script de démarrage de nbd-client sera alors de lancer un processus nbd-client, la configuration du périphérique restant alors à votre charge.
";
$elem["nbd-client/type"]["default"]="raw";
$elem["nbd-client/host"]["type"]="string";
$elem["nbd-client/host"]["description"]="Hostname of the server (number: ${number})?
 Please enter the network name or IP address of the machine on which
 the nbd-server process is running.
";
$elem["nbd-client/host"]["descriptionde"]="${number})?
 Bitte geben Sie den Netzwerknamen oder die IP-Adresse der Maschine an, auf dem der nbd-Server-Prozess läuft.
";
$elem["nbd-client/host"]["descriptionfr"]="${number}) :
 Veuillez indiquer le nom d'hôte ou l'adresse IP du serveur où est utilisé nbd-server.
";
$elem["nbd-client/host"]["default"]="";
$elem["nbd-client/port"]["type"]="string";
$elem["nbd-client/port"]["description"]="Port on which the nbd-server is running (number: ${number})?
 Please enter the TCP port number to access nbd-server.
";
$elem["nbd-client/port"]["descriptionde"]="${number})?
 Bitte geben Sie die TCP-Portnummer an, um auf den nbd-server zuzugreifen.
";
$elem["nbd-client/port"]["descriptionfr"]="${number}) :
 Veuillez indiquer le port TCP d'écoute du serveur NBD.
";
$elem["nbd-client/port"]["default"]="";
$elem["nbd-client/device"]["type"]="string";
$elem["nbd-client/device"]["description"]="/dev entry for this nbd-client (number: ${number})?
 Every nbd-client process needs to be associated with a /dev entry with
 major number 43. Please enter the name of the /dev entry you want to use for
 this nbd-client. Note that this needs to be the full path to that entry,
 not just the last part.
 .
 If the /dev entry specified does not exist, it will be created with minor
 number ${number}.
";
$elem["nbd-client/device"]["descriptionde"]="${number})?
 Jeder nbd-Client-Prozess muss mit einem /dev-Eintrag mit der Major-Number 43 assoziiert sein. Bitte geben Sie den Namen des /dev-Eintrags, den Sie für diesen nbd-Client verwenden möchten, ein. Beachten Sie, dass der vollständige Pfad und nicht nur der letzte Teil zum Eintrag gebraucht wird.
 .
 Wenn der angegebene /dev-Eintrag nicht existiert, dann wird dieser mit der Minor-Zahl ${number} erstellt.
";
$elem["nbd-client/device"]["descriptionfr"]="${number}) :
 Chaque processus nbd-client doit être associé à un fichier de périphérique, dans /dev, de numéro majeur 43. Veuillez indiquer le nom du périphérique que doit utiliser ce processus nbd-client. Veuillez indiquer le chemin complet et pas seulement la dernière partie.
 .
 Si vous indiquez un périphérique qui n'existe pas, il sera créé avec le numéro mineur ${number}.
";
$elem["nbd-client/device"]["default"]="";
$elem["nbd-client/killall"]["type"]="boolean";
$elem["nbd-client/killall"]["description"]="Disconnect all NBD devices on \"stop\"?
 When the nbd-client init script is called to stop the nbd-client service,
 there are two things that can be done: either it can disconnect all
 nbd-client devices (which are assumed not to be in use), or it can
 disconnect only those nbd-client devices that it knows about in its
 config file.
 .
 The default (and the traditional behavior) is to disconnect all
 nbd-client devices. If the root device or other critical file systems
 are on NBD this will cause data loss and should not be accepted.
";
$elem["nbd-client/killall"]["descriptionde"]="Bei »stop« die Verbindungen zu allen nbd-Geräten trennen?
 Wenn das Initskript von nbd-Client aufgerufen wird, um den nbd-Client-Dienst zu stoppen, können zwei Dinge geschehen: entweder kann es alle nbd-Client-Geräte stoppen (von denen vorausgesetzt wird, dass sie gerade nicht benutzt werden) oder es kann nur die nbd-Client-Geräte trennen, über die es in seiner Konfigurationsdatei Bescheid weiß.
 .
 Der Standard (und das übliche Verhalten) ist es, die Verbindung zu allen nbd-Client-Geräten zu trennen. Wenn das Wurzelgerät oder andere kritische Dateisysteme auf NBD liegen, wird dies zu Datenverlust führen und sollte nicht akzeptiert werden.
";
$elem["nbd-client/killall"]["descriptionfr"]="Déconnecter tous les périphériques NBD avec l'action « stop » ?
 Lorsque le script d'initialisation du client NBD est appelé pour arrêter le service client de NBD, deux actions sont possibles : soit déconnecter tous les périphériques clients NBD (qui sont supposés ne pas être utilisés), soit ne déconnecter que ceux qui sont déclarés dans le fichier de configuration.
 .
 Le comportement par défaut (qui est le comportement traditionnel) est de déconnecter tous les périphériques clients. Si le système de fichiers racine ou d'autres systèmes de fichiers critiques utilisent NBD, cela peut provoquer une perte de données et vous devriez alors refuser cette option.
";
$elem["nbd-client/killall"]["default"]="true";
$elem["nbd-client/extra"]["type"]="string";
$elem["nbd-client/extra"]["description"]="Extra parameters (number: ${number})
 If you wish to add any extra parameters to nbd-client, then please
 enter them here.
";
$elem["nbd-client/extra"]["descriptionde"]="${number})
 Falls Sie »nbd-client« irgendwelche zusätzlichen Parameter hinzufügen möchten, geben Sie diese hier ein.
";
$elem["nbd-client/extra"]["descriptionfr"]="${number}) :
 S'il est nécessaire d'utiliser des options supplémentaires avec nbd-client, il est possible de les indiquer ici.
";
$elem["nbd-client/extra"]["default"]="";
PKG_OptionPageTail2($elem);
?>
