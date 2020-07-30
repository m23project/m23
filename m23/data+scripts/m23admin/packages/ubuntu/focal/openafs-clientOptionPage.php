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
$elem["openafs-client/cell-info"]["descriptionde"]="Rechnernamen der Datenbank-Server für Ihre Heimatzelle:
 AFS benutzt die Datei /etc/openafs/CellServDB für eine Liste von Servern, die angesprochen werden sollen, um Teile einer Zelle zu finden. Die Zelle, zu der dieser Rechner angeblich gehören soll, ist nicht in dieser Datei. Geben Sie daher bitte die Rechnernamen der Datenbankserver ein, getrennt durch Leerzeichen. WICHTIG: Falls Sie eine neue Zelle erstellen und dieser Computer ein Datenbankserver der Zelle sein soll, geben Sie nur den Rechnernamen dieses Computers ein und fügen Sie andere Server erst später hinzu, wenn sie einsatzbereit sind. Außerdem sollten Sie den AFS-Client auf diesem Server nicht beim Systemboot starten lassen, bevor diese Zelle konfiguriert ist. Sobald Sie soweit sind, können Sie /etc/openafs/afs.conf.client bearbeiten, um den AFS-Client zu aktivieren.
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
$elem["openafs-client/thiscell"]["descriptionde"]="AFS-Zelle, zu der dieser Rechner gehört:
 Der AFS-Dateiraum ist in Zellen bzw. administrativen Domains organisiert. Jeder Rechner gehört zu einer Zelle. Normalerweise ist eine Zelle gleich dem DNS-Domain-Namen.
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
$elem["openafs-client/cachesize"]["descriptionde"]="Größe des AFS-Cache in kB:
 AFS benutzt einen Bereich der Festplatte, um Netzwerk-Dateien zum schnelleren Zugriff zwischenzuspeichern. Dieser Cache wird unter /var/cache/openafs eingehängt werden. Es ist wichtig, dass der Cache nicht die Partition überfüllt, auf dem er sich befindet. Viele Leute finden es praktisch, eine extra Partition für ihren AFS-Cache zu haben.
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
 service openafs-client force-start to start the client when you wish
 to run it.
";
$elem["openafs-client/run-client"]["descriptionde"]="Soll der Openafs-Client jetzt und beim Systemboot gestartet werden?
 Normalerweise erwarten Benutzer, die das openafs-client-Paket installieren, dass das AFS-Verzeichnis automatisch beim Systemboot eingehängt wird. Falls Sie jedoch eine neue Zelle einrichten wollen oder den Client auf einem Laptop installieren, möchten Sie ihn vielleicht nicht schon beim Booten mitstarten. In diesem Fall rufen Sie »service openafs-client force-start« auf, wenn Sie den Client verwenden wollen.
";
$elem["openafs-client/run-client"]["descriptionfr"]="Faut-il lancer le client AFS maintenant, puis à chaque démarrage ?
 La majorité des utilisateurs qui installent le paquet openafs-client s'attendent à ce qu'il soit lancé au démarrage. Cependant, si vous prévoyez de mettre en service une nouvelle cellule ou si vous utilisez un ordinateur portable, vous ne souhaitez peut-être pas le lancer au démarrage. Si vous préférez ne pas le lancer au démarrage, utilisez la commande « service openafs-client force-start » pour le lancer quand vous en aurez besoin.
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
 Um eine AFS-Zelle zu kontaktieren, brauchen Sie die IP-Adressen der Datenbank-Server der Zellen. Normalerweise werden diese Informationen aus der Datei /etc/openafs/CellServDB gelesen. Falls Openafs aber keine Zelle in dieser Datei finden kann, kann auch DNS benutzt werden, um nach AFSDB-Einträgen zu suchen, die diese Information enthalten.
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
$elem["openafs-client/crypt"]["descriptionde"]="Soll authentifizierter Verkehr mit AFS-Dateiservern verschlüsselt werden?
 AFS bietet eine schwache Form der Verschlüsselung, die optional zwischen Client und Dateiserver benutzt werden kann. Obwohl diese Verschlüsselung schwächer als DES und daher nicht ausreichend für sehr vertrauliche Daten ist, macht sie einem Gelegenheitsangreifer die Arbeit dennoch deutlich schwerer.
";
$elem["openafs-client/crypt"]["descriptionfr"]="Faut-il chiffrer le trafic authentifié avec le serveur de fichiers AFS ?
 AFS offre un mode de chiffrement faible qu'il est possible d'utiliser entre un client et les serveurs de fichiers. Bien que ce chiffrement soit plus faible que DES, et donc insuffisant pour des données hautement confidentielles, il fournit une certaine forme de confidentialité et peut rendre une attaque non préparée nettement plus difficile.
";
$elem["openafs-client/crypt"]["default"]="true";
$elem["openafs-client/dynroot"]["type"]="select";
$elem["openafs-client/dynroot"]["choices"][1]="Yes";
$elem["openafs-client/dynroot"]["choices"][2]="Sparse";
$elem["openafs-client/dynroot"]["choicesde"][1]="Ja";
$elem["openafs-client/dynroot"]["choicesde"][2]="Spärlich";
$elem["openafs-client/dynroot"]["choicesfr"][1]="Oui";
$elem["openafs-client/dynroot"]["choicesfr"][2]="À la demande";
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
 .
 The Sparse option is the same as Yes except that, rather than populating
 /afs from /etc/openafs/CellServDB immediately, cells other than the local
 cell will not appear until they are accessed.  Cell aliases as set in the
 CellAlias file are shown as normal, although they may appear to be
 dangling links until traversed.
";
$elem["openafs-client/dynroot"]["descriptionde"]="Soll der Inhalt von /afs dynamisch generiert werden?
 /afs enthält in der Regel einen Eintrag für jede Zelle, mit der der Client interagieren kann. Traditionell werden diese Einträge von Servern in der Heimatzelle des Clients erstellt. Allerdings können OpenAFS-Clients den Inhalt von /afs auch dynamisch anhand der Informationen von /etc/openafs/CellServDB und DNS zusammentragen.
 .
 Wenn Sie /afs dynamisch erstellen lassen, werden Sie vielleicht die Datei /etc/openafs/CellAlias erstellen und Aliasse für gebräuchliche Zellen eintragen müssen (die Syntax für diese Datei ist: eine Zeile pro Alias, mit Zellenname – Leerzeichen – Alias).
 .
 Die Option »Spärlich« ist dasselbe wie »Ja«, allerdings wird /afs nicht sofort aus der /etc/openafs/CellServDB bestückt, sondern nicht-lokale Zellen werden erst angezeigt, nachdem auf sie zugegriffen wurde. Zell-Aliasse aus der Datei CellAlias werden wie üblich angezeigt, können aber auch als defekte Links erscheinen, bis sie durchlaufen worden sind.
";
$elem["openafs-client/dynroot"]["descriptionfr"]="Faut-il gérer le contenu de /afs dynamiquement ?
 Le répertoire /afs contient généralement une entrée par cellule accessible à un client donné. Traditionnellement, ces entrées ont été créées par les serveurs dans la cellule locale de chaque client. Cependant, OpenAFS peut gérer dynamiquement le contenu de /afs en se servant de /etc/openafs/CellServDB et du DNS.
 .
 Si vous créez /afs de manière dynamique, vous aurez peut-être à créer /etc/openafs/CellAlias pour inclure les alias des cellules communes. Ce fichier comporte une ligne par alias, avec le nom de la cellule, une espace et l'alias utilisé pour la cellule.
 .
 L'option « À la demande » est analogue à « Oui » si ce n'est que /afs n'est pas immédiatement peuplé à partir de /etc/openafs/CellServDB : les cellules autres que la cellule locale n'apparaîtront pas tant qu'il n'est pas nécessaire d'y accéder. Les alias de cellules définis dans le fichier CellAlias apparaîtront comme normaux, bien qu'ils puissent temporairement apparaître comme des liens sans cible.
";
$elem["openafs-client/dynroot"]["default"]="Yes";
$elem["openafs-client/fakestat"]["type"]="boolean";
$elem["openafs-client/fakestat"]["description"]="Use fakestat to avoid hangs when listing /afs?
 Because AFS is a global file space, operations on the /afs directory can
 generate significant network traffic.  If some AFS cells are unavailable
 then looking at /afs using ls or a graphical file browser may hang your
 machine for minutes.  AFS has an option to simulate answers to these
 operations locally to avoid these hangs.  You want this option under most
 circumstances.
";
$elem["openafs-client/fakestat"]["descriptionde"]="Soll fakestat benutzt werden, um eine Verzögerung beim Auflisten von /afs zu vermeiden?
 Da AFS ein globaler Dateiraum ist, können Aktionen im /afs-Verzeichnis starken Netzwerkverkehr verursachen. Wenn einige AFS-Zellen nicht erreichbar sind, kann das Betrachten von /afs (mit ls oder einem Dateibrowser) zu minutenlangem Aufhängen führen. AFS kann aber Antworten auf solche Operationen simulieren, um ein Aufhängen zu vermeiden. Die meisten Leute wollen das.
";
$elem["openafs-client/fakestat"]["descriptionfr"]="Faut-il utiliser fakestat pour éviter les erreurs à l'affichage du contenu de /afs ?
 Comme AFS est un espace global de fichiers, les opérations sur /afs peuvent générer un trafic réseau non négligeable. Si certaines cellules sont indisponibles, l'affichage de /afs avec ls ou avec un gestionnaire de fichiers graphique peut arrêter la machine pour quelques minutes. AFS comporte une option permettant de simuler les réponses à ces requêtes pour éviter ces plantages. Cette option est utile dans la plupart des cas.
";
$elem["openafs-client/fakestat"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
