<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dnet-common");

$elem["dnet-common/nodename"]["type"]="string";
$elem["dnet-common/nodename"]["description"]="DECnet node name:
 All nodes on a DECnet network have a node name. This is similar to the IP
 hostname but can only be a maximum of 6 characters long. It is common that
 the DECnet name is the same as the IP name (if your machine has one). If you
 do not know the answer to this question please contact your system
 administrator.
";
$elem["dnet-common/nodename"]["descriptionde"]="DECnet-Knotenname:
 Alle Knoten in einem DECnet-Netz haben einen Knotennamen. Dieser ist vergleichbar mit dem Hostnamen in einem IP-Netz, jedoch kann der Knotenname nicht länger als 6 Zeichen sein. Es ist normal, dass der DECnet-Name mit dem IP-Namen identisch ist (falls Ihre Maschine einen hat). Falls Sie die Antwort auf diese Frage nicht wissen, fragen Sie Ihren System-Administrator.
";
$elem["dnet-common/nodename"]["descriptionfr"]="Nom de noeud DECnet :
 Tous les noeuds d'un réseau DECnet ont un nom. Celui-ci est analogue au nom d'hôte IP mais ne peut comporter que 6 caractères maximum. Le nom DECnet est usuellement le même que le nom IP (si votre machine en possède un). Si vous ne connaissez pas ce nom, veuillez consulter votre administrateur réseau.
";
$elem["dnet-common/nodename"]["default"]="linux";
$elem["dnet-common/nodeaddr"]["type"]="string";
$elem["dnet-common/nodeaddr"]["description"]="DECnet node address:
 All nodes on a DECnet network have a node address. This is two numbers
 separated with a period (e.g. 3.45) where the first number denotes the area
 and the second is the node within that area.
 .
 Do not make up a number here. If you do not know your DECnet node address
 then ask your system administrator.
";
$elem["dnet-common/nodeaddr"]["descriptionde"]="DECnet-Knotenadresse:
 Alle Knoten in einem DECnet-Netz haben eine Knotenadresse. Sie besteht aus zwei Zahlen, die durch einen Punkt getrennt sind (z.B. 3.45). Die erste Zahl spezifiziert das Gebiet, die zweite den Knoten innerhalb des Gebiets.
 .
 Wählen Sie hier keine beliebige Zahlen. Falls Sie die DECnet-Knotenadresse nicht kennen, sollten Sie Ihren Systemadministrator fragen.
";
$elem["dnet-common/nodeaddr"]["descriptionfr"]="Adresse de noeud DECnet :
 Tous les noeuds d'un réseau DECnet ont une adresse. Celle-ci est constituée de deux nombres séparés par un point (p.ex. 3.45) où le premier nombre correspond à la zone et le second représente le noeud au sein de cette zone.
 .
 N'utilisez pas n'importe quelles valeurs ici. Si vous ne connaissez pas votre adresse de noeud DECnet, veuillez consulter votre administrateur réseau.
";
$elem["dnet-common/nodeaddr"]["default"]="1.10";
$elem["dnet-common/warning"]["type"]="note";
$elem["dnet-common/warning"]["description"]="DECnet startup changes your ethernet hardware address
 The \"setether\" program in this package will change the hardware (MAC)
 address of all ethernet cards in your system (by default) to match the
 DECnet node address. This is essential for the operation of DECnet and so is
 not optional. However, if you have more than one ethernet card you may
 want to edit /etc/default/decnet to alter the list of cards whose hardware
 addresses are changed.
 .
 Be aware that any other machines that have your system's MAC address in
 their ARP cache may no longer be able to communicate with you via IP
 protocols until this cache has timed out or been flushed.
 .
 The MAC address cannot be changed on-the-fly so you will need to reboot your
 machine before DECnet can function.
 .
 You should also edit /etc/decnet.conf to add the names and addresses of
 DECnet nodes you want to communicate with.
";
$elem["dnet-common/warning"]["descriptionde"]="Starten des DECnet verändert die Hardware-Adresse Ihrer Netzwerkkarten
 Das »setether«-Programm in diesem Paket wird standardmäßig die Hardware-(MAC)-Adresse aller im Rechner installierten Netzwerkkarten ändern, um diese an die Knotenadresse anzupassen. Dies ist wichtig für den Betrieb des DECnet und kann nicht unterbunden werden. Falls Sie allerdings mehr als eine Netzwerkkarte im Rechner installiert haben, dann können Sie die Karten, deren Hardware-Adressen geändert werden soll, in der Datei /etc/default/decnet angeben.
 .
 Beachten Sie, dass Ihr Rechner nicht mit anderen Rechnern über IP kommunizieren kann, solange diese nicht ihren ARP-Cache (Zwischenspeicher für MAC-Adressen) leeren oder er von alleine verfällt.
 .
 Die MAC-Adresse kann nicht sofort geändert werden. Sie müssen Ihren Rechner neu starten, um DECnet verwenden zu können.
 .
 Sie sollten die Datei /etc/decnet.conf anpassen, und darin die Namen und Adressen der DECnet-Knoten angeben, mit denen Sie kommunizieren wollen.
";
$elem["dnet-common/warning"]["descriptionfr"]="Le démarrage de DECnet va modifier votre adresse matérielle Ethernet
 Le programme « setether » de ce paquet va, par défaut, changer l'adresse matérielle (ou « adresse MAC ») de toutes les cartes Ethernet de votre système pour correspondre avec l'adresse de noeud DECnet. Cela est indispensable au bon fonctionnement de DECnet ce qui explique que ce ne soit pas optionnel. Cependant, si vous avez plus d'une carte Ethernet, vous devriez modifier /etc/default/decnet pour changer la liste des cartes dont l'adresse matérielle sera modifiée.
 .
 Vous devez savoir que tout autre poste qui possède votre adresse MAC dans son cache ARP ne pourra plus communiquer avec vous via les protocoles IP tant que ce cache n'aura pas expiré ou été vidé.
 .
 L'adresse matérielle ne peut pas être modifiée à la volée et vous devrez donc redémarrer votre machine avant de pouvoir utiliser DECnet.
 .
 Vous devriez également modifier /etc/decnet.conf pour y ajouter les noms et adresses des hôtes avec lesquels vous souhaitez communiquer.
";
$elem["dnet-common/warning"]["default"]="";
PKG_OptionPageTail2($elem);
?>
