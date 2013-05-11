<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nbd-client");

$elem["nbd-client/no-auto-config"]["type"]="error";
$elem["nbd-client/no-auto-config"]["description"]="AUTO_GEN is set at \"n\" in /etc/nbd-client.
 There's a line in /etc/nbd-client that reads \"AUTO_GEN=n\" -- or
 something likewise in sh-syntaxis. This means you don't want me to
 automatically regenerate that file.
 .
 If that's wrong, remove the line and call \"dpkg-reconfigure nbd-client\"
 afterwards.
";
$elem["nbd-client/no-auto-config"]["descriptionde"]="AUTO_GEN ist in /etc/nbd-client auf »n« gesetzt.
 Es befindet sich eine Zeile in /etc/nbd-client.conf, die »AUTO_GEN=n« (oder ähnliches in sh-Syntax) enthält. Das bedeutet, dass Sie die automatische Modifikation dieser Datei durch die Installation nicht wünschen.
 .
 Falls das falsch ist, entfernen Sie die Zeile und rufen danach »dpkg-reconfigure nbd-client« auf.
";
$elem["nbd-client/no-auto-config"]["descriptionfr"]="Variable AUTO_GEN égale à « n » dans /etc/nbd-client
 Une ligne de /etc/nbd-client indique « AUTO_GEN=n » (ou l'équivalent en syntaxe sh). Cela signifie que vous ne souhaitez pas que ce fichier soit modifié par cet outil de configuration.
 .
 Si ce n'est pas le cas, supprimez ou commentez la ligne, puis relancez ensuite «  dpkg-reconfigure nbd-client ».
";
$elem["nbd-client/no-auto-config"]["default"]="";
$elem["nbd-client/number"]["type"]="string";
$elem["nbd-client/number"]["description"]="How many nbd-client connections do you want to use?
 nbd-client can handle multiple concurrent connections. Please state the
 number of connections you'd like this configuration script to set up.
 .
 Note that if something has already been specified in /etc/nbd-client, the
 current configuration will be used as defaults in these dialogs.
";
$elem["nbd-client/number"]["descriptionde"]="Wie viele nbd-Client-Verbindungen möchten Sie verwenden?
 Nbd-Client kann mehrfache gleichzeitige Verbindungen handhaben. Bitte legen Sie die Anzahl der Verbindungen, die dieses Konfigurationsskript einrichten soll, fest.
 .
 Beachten Sie, falls bereits etwas in /etc/nbd-client angegeben wurde, wird die aktuelle Konfiguration als Standardeinstellung in diesen Dialogen verwendet.
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
$elem["nbd-client/type"]["description"]="How do you intend to use the network block device (number: ${number})?
 The network block device can serve multiple purposes. One of the most
 interesting is to provide swapspace over the network for diskless clients,
 but you can store a filesystem on it, or do other things with it for which
 a block device is interesting.
 .
 If you intend to use the network block device as a swapdevice, choose
 \"swap\". If you intend to use it as a filesystem, add a line to /etc/fstab,
 give it the option \"_netdev\" (else init will try to mount it before it's
 usable), and choose \"filesystem\". For all other purposes, choose \"raw\".
 The only thing the nbd-client bootscript will do then is start an
 nbd-client process; you will have to set it up manually.
";
$elem["nbd-client/type"]["descriptionde"]="${number}) zu benutzen?
 Das Network Block Device kann vielen Zwecken dienen. Einer der interessantesten ist es, Swap-Bereiche über das Netz für plattenlose Clients bereitzustellen, aber Sie können auch ein Dateisystem auf ihm ablegen oder andere Dinge tun, für die ein Block-Gerät interessant ist.
 .
 Falls Sie zum Gebrauch des Network Block Device als Swap-Device neigen, wählen Sie »Swap«. Falls Sie es als Dateisystem nutzen möchten, fügen Sie eine Zeile zur /etc/fstab mit der Option »_netdev« hinzu (sonst versucht init, sie einzuhängen, bevor es benutzbar ist) und wählen hier »Dateisystem«. Für alle anderen Zwecke wählen Sie »unbearbeitet«. Dann wird das nbd-Client-Bootscript lediglich den nbd-Client-Prozess starten; Sie müssen die Einrichtung dann manuell durchführen.
";
$elem["nbd-client/type"]["descriptionfr"]="${number}) :
 Un périphérique bloc en réseau (« network block device ») peut avoir plusieurs utilisations. Une des plus intéressantes est de l'utiliser comme zone d'échange pour les clients sans disque. Vous pouvez également y placer un système de fichiers ou encore trouver d'autres utilisations pour lesquelles un périphérique de bloc est nécessaire.
 .
 Si vous avez l'intention d'utiliser le périphérique de bloc en réseau comme zone d'échange (« swap »), veuillez choisir « zone d'échange ». Si vous souhaitez y placer un système de fichiers, ajoutez une ligne au fichier /etc/fstab avec l'option « _netdev » (sinon les scripts d'initialisation du système chercheront à monter le système de fichiers avant qu'il ne soit utilisable) et choisissez « système de fichiers ». Pour toutes les autres utilisations, choisissez « données brutes » : la seule action du script de démarrage de nbd-client sera alors de lancer un processus nbd-client, la configuration du périphérique restant alors à votre charge.
";
$elem["nbd-client/type"]["default"]="raw";
$elem["nbd-client/host"]["type"]="string";
$elem["nbd-client/host"]["description"]="Hostname of the server (number: ${number})?
 You need to fill in some name with which to resolve the machine on which
 the nbd-server process is running. This can be its hostname (also known to
 some as its \"network name\") or its IP-address.
";
$elem["nbd-client/host"]["descriptionde"]="${number})?
 Sie müssen einen Namen eingeben, zu dem die Maschine mit dem nbd-Server-Prozess gehört. Das kann Ihr Rechnername (auch als »Network Name« bezeichnet) oder Ihre IP-Adresse sein.
";
$elem["nbd-client/host"]["descriptionfr"]="${number}) :
 Veuillez indiquer le nom d'une machine où le processus nbd-server fonctionne. Cela peut être son nom réseau ou son adresse IP.
";
$elem["nbd-client/host"]["default"]="";
$elem["nbd-client/port"]["type"]="string";
$elem["nbd-client/port"]["description"]="Port on which the nbd-server is running (number: ${number})?
 You need to fill in the portnumber on which the nbd-server is running.
 This could technically be any number between 1 and 65535, but for this to
 work, it needs to be the one on which a server can be found on the machine
 running nbd-server...
";
$elem["nbd-client/port"]["descriptionde"]="${number})?
 Sie müssen die Portnummer angeben, auf dem der nbd-Server läuft. Technisch könnte das jede Nummer zwischen 1 und 65535 sein, aber damit es funktioniert, sollte es die Nummer sein, auf der ein Server auch auf der Maschine mit dem nbd-Server gefunden werden kann...
";
$elem["nbd-client/port"]["descriptionfr"]="${number}) :
 Veuillez indiquer le numéro du port sur lequel le processus nbd-server est à l'écoute. Tout nombre entre 1 et 65535 est techniquement valable, mais cela doit être le port d'écoute du serveur sur la machine qui fait fonctionner actuellement nbd-server.
";
$elem["nbd-client/port"]["default"]="";
$elem["nbd-client/device"]["type"]="string";
$elem["nbd-client/device"]["description"]="/dev entry for this nbd-client (number: ${number})?
 Every nbd-client process needs to be associated with a /dev entry with
 major mode 43. Please enter the name of the /dev entry you want to use for
 this nbd-client. Note that this needs to be the full path to that entry,
 not just the last part.
 .
 If an unexisting /dev entry is provided, it will be created with minor
 number ${number}
";
$elem["nbd-client/device"]["descriptionde"]="${number})?
 Jeder nbd-Client-Prozess muss mit einem /dev-Eintrag mit dem Major-Modus 43 assoziiert sein. Bitte geben Sie den Namen des /dev-Eintrags, den Sie für diesen nbd-Client nehmen möchten, ein. Beachten Sie, dass der vollständige Pfad und nicht nur der letzte Teil zum Eintrag gebraucht wird.
 .
 Wird ein nicht-existierender /dev-Eintrag angegeben, dann wird dieser mit der Minor-Zahl ${number} erstellt
";
$elem["nbd-client/device"]["descriptionfr"]="${number}) :
 Chaque processus nbd-client doit être associé à un fichier de périphérique, dans /dev, de numéro majeur 43. Veuillez indiquer le nom du périphérique que doit utiliser ce processus nbd-client. Veuillez indiquer le chemin complet et pas seulement la dernière partie.
 .
 Si vous indiquez un périphérique qui n'existe pas, il sera créé avec le numéro mineur ${number}.
";
$elem["nbd-client/device"]["default"]="";
$elem["nbd-client/killall"]["type"]="boolean";
$elem["nbd-client/killall"]["description"]="Kill all nbd devices on 'stop'?
 When the nbd-client initscript is called to stop the nbd-client
 service, there are two things that can be done: either it can stop all
 nbd-client devices, or it can stop only those nbd-client devices that
 it knows about in its config file.
 .
 The traditional behaviour was to stop all nbd-client devices, including
 those that were not specified in the nbd-client config file; for that
 reason, the default answer is to kill all nbd devices. However, if you
 are running critical file systems, such as your root device, on NBD,
 then this is a bad idea; in that case, please do not accept this
 option.
";
$elem["nbd-client/killall"]["descriptionde"]="Bei »stop« alle nbd-Geräte töten?
 Wenn das Initscript von nbd-Client aufgerufen wird, den nbd-Client-Dienst zu stopppen, können zwei Dinge geschehen: entweder kann es alle nbd-Client-Geräte stoppen oder es kann nur die nbd-Client-Geräte stoppen, über die es in seiner Konfigurationsdatei Bescheid weiss.
 .
 Das traditionelle Verhalten bestand darin, alle nbd-Client-Geräte zu stoppen, darunter auch solche, die nicht in der Konfigurationsdatei des nbd-Clients aufgeführt waren; daher ist die vorgegebene Anwort auch, alle nbd-Geräte zu töten. Falls Sie allerdings kritische Dateisystem auf NBD betreiben, wie Ihr Gerät für das Wurzelverzeichnis, dann ist dies keine gute Idee; in diesem Falls sollten Sie diese Option nicht akzeptieren.
";
$elem["nbd-client/killall"]["descriptionfr"]="Arrêter tous les périphériques NBD sur l'action « stop » ?
 Lorsque le script de lancement du client NBD est appelé pour arrêter le service client de NBD, deux actions sont possibles : soit arrêter tous les périphériques clients NBD, soit n'arrêter que ceux qui sont déclarés dans le fichier de configuration.
 .
 Le choix habituel et recommandé est d'arrêter tous les périphériques NBD clients, y compris ceux qui ne sont pas explicitement mentionnés dans le fichier de configuration. Cependant, si des systèmes de fichiers critiques, tel la racine du système de fichiers d'un client, utilisent NBD, il est conseillé de ne pas choisir cette option.
";
$elem["nbd-client/killall"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
