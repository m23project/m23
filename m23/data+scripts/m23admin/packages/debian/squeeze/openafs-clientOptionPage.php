<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openafs-client");

$elem["openafs-client/cell-info"]["type"]="string";
$elem["openafs-client/cell-info"]["description"]="DB server host names for your home cell:
 AFS uses the file /etc/openafs/CellServDB to hold the list of servers that
 should be contacted to find parts of a cell.  The cell you claim this
 workstation belongs to is not in that file.  Enter the host names of the
 database servers separated by spaces. IMPORTANT: If you are creating a new
 cell and this machine is to be a database server in that cell, only enter
 this machine's name; add the other servers later after they are
 functioning. Also, do not enable the AFS client to start at boot on this
 server until the cell is configured.  When you are ready you can edit
 /etc/openafs/afs.conf.client to enable the client.
";
$elem["openafs-client/cell-info"]["descriptionde"]="Rechnername des Datenbank-Servers fÃŒr Ihre Home-Zelle:
 AFS benutzt die Datei /etc/openafs/CellServDB fÃŒr eine Liste von Servern, die angesprochen werden sollen, um Teile einer Zelle zu finden. Die Zelle, von der Sie sagen, diese Workstation gehÃ¶re zu ihr, ist nicht in dieser Datei. Geben Sie die Hostnamen der Datenbank-Server ein, getrennt durch Leerzeichen. WICHTIG: Falls Sie eine neue Zelle erstellen und dieser Computer der Datenbank-Server der Zelle sein soll, geben Sie nur den Hostnamen dieses Computers ein; fÃŒgen Sie andere Server erst spÃ€ter hinzu, sobald diese funktionieren. AuÃerdem sollten Sie den AFS-Client auf diesem Server nicht beim Rechnerstart starten lassen, bevor diese Zelle konfiguriert ist. Wenn Sie soweit sind, kÃ¶nnen Sie /etc/openafs/afs.conf.client editieren, um den AFS-Client zu aktivieren.
";
$elem["openafs-client/cell-info"]["descriptionfr"]="Hôtes serveurs de bases de données pour votre cellule locale (« home cell ») :
 AFS utilise le fichier /etc/openafs/CellServDB pour conserver la liste des serveurs à contacter pour trouver les constituants d'une cellule. La cellule dont ce poste de travail est censé faire partie n'est pas indiquée dans ce fichier. Veuillez indiquer les noms des serveurs de bases de données, séparés par des espaces. IMPORTANT : si vous créez une nouvelle cellule et que cette machine doit être un serveur de bases de données dans cette cellule, veuillez seulement indiquer le nom de cette machine. N'ajoutez les autres serveurs que plus tard, lorsqu'ils seront opérationnels. Enfin, n'activez pas le client AFS au démarrage tant que cette cellule n'est pas configurée. Quand vous serez prêt, vous pourrez modifier /etc/openafs/afs.conf.client pour mettre en service le client.
";
$elem["openafs-client/cell-info"]["default"]="";
$elem["openafs-client/thiscell"]["type"]="string";
$elem["openafs-client/thiscell"]["description"]="AFS cell this workstation belongs to:
 AFS filespace is organized into cells or administrative domains.
 Each workstation belongs to one cell.  Usually the cell is the DNS
 domain name of the site.
";
$elem["openafs-client/thiscell"]["descriptionde"]="AFS-Zelle, zu der diese Workstation gehÃ¶rt:
 Der AFS-Dateiraum ist in Zellen bzw. administrativen Domains organisiert. Jede Workstation gehÃ¶rt zu einer Zelle. Normalerweise ist eine Zelle gleich dem DNS Domain-Namen.
";
$elem["openafs-client/thiscell"]["descriptionfr"]="Cellule AFS dont ce poste de travail fait partie :
 L'espace des fichiers AFS est organisé en cellules ou domaines administratifs. Chaque poste de travail appartient à une cellule. Habituellement, la cellule est le nom de domaine du site.
";
$elem["openafs-client/thiscell"]["default"]="";
$elem["openafs-client/cachesize"]["type"]="string";
$elem["openafs-client/cachesize"]["description"]="Size of AFS cache in kB:
 AFS uses an area of the disk to cache remote files for faster
 access.  This cache will be mounted on /var/cache/openafs.  It is
 important that the cache not overfill the partition it is located
 on.  Often, people find it useful to dedicate a partition to their
 AFS cache.
";
$elem["openafs-client/cachesize"]["descriptionde"]="GrÃ¶Ãe des AFS-Cache in kB:
 AFS benutzt einen Bereich der Festplatte, um Netzwerk-Dateien zum schnelleren Zugriff zwischenzuspeichern. Dieser Cache wird unter /var/cache/openafs eingehÃ€ngt werden. Es ist wichtig, dass der Cache nicht die Partition ÃŒberfÃŒllt, auf dem er sich befindet. Viele Leute finden es nÃŒtzlich, eine extra Partition fÃŒr ihren AFS-Cache zu haben.
";
$elem["openafs-client/cachesize"]["descriptionfr"]="Taille du cache d'AFS (ko) :
 AFS utilise une partie du disque pour mettre en cache des fichiers distants et accélérer les accès. Ce cache sera monté sur /var/cache/openafs. Il est important que le cache ne remplisse pas la partition sur laquelle il est situé. De nombreux utilisateurs choisissent de dédier une partition au cache d'AFS.
";
$elem["openafs-client/cachesize"]["default"]="50000";
$elem["openafs-client/run-client"]["type"]="boolean";
$elem["openafs-client/run-client"]["description"]="Run Openafs client now and at boot?
 Normally, most users who install the openafs-client package expect AFS to
 be mounted automatically at boot.  However, if you are planning on
 setting up a new cell or are on a laptop, you may not want it started at
 boot time.  If you choose not to start AFS at boot, run
 /etc/init.d/openafs-client force-start to start the client when you wish
 to run it.
";
$elem["openafs-client/run-client"]["descriptionde"]="Soll der Openafs-Client jetzt und beim Booten gestartet werden?
 Normalerweise erwarten Benutzer, die das Paket openafs-client installieren, dass AFS automatisch beim Boot eingehÃ€ngt wird. Falls Sie aber eine neue Zelle erstellen wollen, oder einen Laptop benutzen, mÃ¶chten Sie es vielleicht nicht beim Boot gestartet haben. Wenn Sie sich dafÃŒr entscheiden, AFS nicht beim Rechnerstart zu starten, kÃ¶nnen Sie /etc/init.d/openafs-client force-start ausfÃŒhren, um den AFS-Client zu starten.
";
$elem["openafs-client/run-client"]["descriptionfr"]="Lancer le client AFS maintenant, puis à chaque démarrage ?
 La majorité des utilisateurs qui installent le paquet openafs-client s'attendent à ce qu'il soit lancé au démarrage. Cependant, si vous prévoyez de mettre en service une nouvelle cellule ou si vous utilisez un ordinateur portable, vous ne souhaitez peut-être pas le lancer au démarrage. Si vous préférez ne pas le lancer au démarrage, utilisez la commande « /etc/init.d/openafs-client force-start » pour le lancer quand vous en aurez besoin.
";
$elem["openafs-client/run-client"]["default"]="true";
$elem["openafs-client/afsdb"]["type"]="boolean";
$elem["openafs-client/afsdb"]["description"]="Look up AFS cells in DNS?
 In order to contact an AFS cell, you need the IP addresses of the cell's
 database servers.  Normally, this information is read from
 /etc/openafs/CellServDB.  However, if Openafs cannot find a cell in that
 file, it can use DNS to look for AFSDB records that contain the
 information.
";
$elem["openafs-client/afsdb"]["descriptionde"]="Sollen AFS-Zellen im DNS nachgeschlagen werden?
 Um eine AFS-Zelle zu kontaktieren, brauchen Sie die IP-Adressen der Datenbank-Server der Zellen. Normalerweise werden diese Informationen aus der Datei /etc/openafs/CellServDB gelesen. Falls Openafs aber keine Zelle in dieser Datei finden kann, kann auch DNS benutzt werden, um nach AFSDB-EintrÃ€gen zu suchen, die diese Information enthalten.
";
$elem["openafs-client/afsdb"]["descriptionfr"]="Faut-il chercher les cellules AFS dans le DNS ?
 Afin de contacter une cellule AFS, vous avez besoin des adresses IP de ses serveurs de bases de données. Cette information est normalement extraite de /etc/openafs/CellServDB. Cependant, si OpenAFS ne peut pas trouver de cellule dans ce fichier, il peut utiliser le DNS pour rechercher des enregistrements AFSDB qui fourniront cette information.
";
$elem["openafs-client/afsdb"]["default"]="true";
$elem["openafs-client/crypt"]["type"]="boolean";
$elem["openafs-client/crypt"]["description"]="Encrypt authenticated traffic with AFS fileserver?
 AFS provides a weak form of encryption that can optionally be used between
 a client and the fileservers.  While this encryption is weaker than DES
 and thus is not sufficient for highly confidential data, it does provide
 some confidentiality and is likely to make the job of a casual attacker
 significantly more difficult.
";
$elem["openafs-client/crypt"]["descriptionde"]="Soll authentifizierter Verkehr mit AFS-Dateiservern verschlÃŒsselt werden?
 AFS bietet eine schwache Form der VerschlÃŒsselung, die optional zwischen Client und Dateiserver benutzt werden kann. Obwohl diese VerschlÃŒsselung schwÃ€cher als DES und daher nicht ausreichend fÃŒr sehr vertrauliche Daten ist, macht es einem mÃ¶glichen Angreifer die Arbeit dennoch deutlich schwerer.
";
$elem["openafs-client/crypt"]["descriptionfr"]="Faut-il chiffrer le trafic authentifié avec le serveur de fichiers AFS ?
 AFS offre un mode de chiffrement faible qu'il est possible d'utiliser entre un client et les serveurs de fichiers. Bien que ce chiffrement soit plus faible que DES, et donc insuffisant pour des données hautement confidentielles, il fournit une certaine forme de confidentialité et peut rendre une attaque non préparée nettement plus difficile.
";
$elem["openafs-client/crypt"]["default"]="true";
$elem["openafs-client/dynroot"]["type"]="boolean";
$elem["openafs-client/dynroot"]["description"]="Dynamically generate the contents of /afs?
 /afs generally contains an entry for each cell that a client can talk to.
 Traditionally, these entries were generated by servers in the client's
 home cell.  However, OpenAFS clients can generate the contents of /afs
 dynamically based on the contents of /etc/openafs/CellServDB and DNS.
 .
 If you generate /afs dynamically, you may need to create
 /etc/openafs/CellAlias to include aliases for common cells.  (The syntax
 of this file is one line per alias, with the cell name, a space, and then
 the alias for that cell.)
";
$elem["openafs-client/dynroot"]["descriptionde"]="Soll der Inhalt von /afs dynamisch generiert werden?
 /afs enthÃ€lt einen Eintrag fÃŒr jede Zelle, mit der der Client interagieren kann. Normalerweise werden diese EintrÃ€ge von Servern in der Home-Zelle des Clients generiert. Trotzdem kann aber der OpenAFS-Client den Inhalt von /afs dynamisch anhand der Informationen von /etc/openafs/CellServDB und DNS erstellen.
 .
 Wenn Sie /afs dynamisch erstellen lassen, werden Sie vielleicht /etc/openafs/CellAlias erstellen mÃŒssen, sodass die Datei Aliase fÃŒr gebrÃ€uchliche Zellen enthÃ€lt. Die Syntax ist: Eine Zeile pro Aliase, mit Zellenname - Leerzeichen - Alias.
";
$elem["openafs-client/dynroot"]["descriptionfr"]="Faut-il gérer le contenu de /afs dynamiquement ?
 Le répertoire /afs contient généralement une entrée par cellule accessible à un client donné. Traditionnellement, ces entrées ont été créées par les serveurs dans la cellule locale de chaque client. Cependant, OpenAFS peut gérer dynamiquement le contenu de /afs en se servant de /etc/openafs/CellServDB et du DNS.
 .
 Si vous créez /afs de manière dynamique, vous aurez peut-être à créer /etc/openafs/CellAlias pour inclure les alias des cellules communes. Ce fichier comporte une ligne par alias, avec le nom de la cellule, une espace et l'alias utilisé pour la cellule.
";
$elem["openafs-client/dynroot"]["default"]="true";
$elem["openafs-client/fakestat"]["type"]="boolean";
$elem["openafs-client/fakestat"]["description"]="Use fakestat to avoid hangs when listing /afs?
 Because AFS is a global file space, operations on the /afs directory can
 generate significant network traffic.  If some AFS cells are unavailable
 then looking at /afs using ls or a graphical file browser may hang your
 machine for minutes.  AFS has an option to simulate answers to these
 operations locally to avoid these hangs.  You want this option under most
 circumstances.
";
$elem["openafs-client/fakestat"]["descriptionde"]="Soll fakestat benutzt werden, um eine VerzÃ¶gerung beim Auflisten von /afs zu vermeiden?
 Da AFS ein globaler Dateiraum ist, kÃ¶nnen Operationen im /afs-Verzeichnis zu groÃen Netzverkehr fÃŒhren. Wenn einige AFS-Zellen nicht erreichbar sind, kann das Anschauen von /afs (mit ls oder einem Dateibrowser) zu minutenlangem AufhÃ€ngen fÃŒhren. AFS kann aber Antworten zu solchen Operationen simulieren, um ein AufhÃ€ngen zu vermeiden. Die meisten Leute wollen das.
";
$elem["openafs-client/fakestat"]["descriptionfr"]="Utiliser fakestat pour éviter les erreurs à l'affichage du contenu de /afs ?
 Comme AFS est un espace global de fichiers, les opérations sur /afs peuvent générer un trafic réseau non négligeable. Si certaines cellules sont indisponibles, l'affichage de /afs avec ls ou avec un gestionnaire de fichiers graphique peut stopper votre machine pour quelques minutes. AFS comporte une option permettant de simuler les réponses à ces requêtes pour éviter ces plantages. Cette option est utile dans la plupart des cas.
";
$elem["openafs-client/fakestat"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
