<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("slapos-client");

$elem["slapos-client/master_url"]["type"]="string";
$elem["slapos-client/master_url"]["description"]="SlapOS master node URL:
";
$elem["slapos-client/master_url"]["descriptionde"]="URL des SlapOS-Masterknotens:
";
$elem["slapos-client/master_url"]["descriptionfr"]="Adresse du nœud maître SlapOS :
";
$elem["slapos-client/master_url"]["default"]="";
$elem["slapos-client/master_url_with_ssl_note"]["type"]="note";
$elem["slapos-client/master_url_with_ssl_note"]["description"]="Master node key and certificate mandatory
 You used an HTTPS URL for the SlapOS master node, so the corresponding
 certificate must be placed in /etc/slapos/ssl/slapos.crt, and the key
 in /etc/slapos/ssl/slapos.key, readable only to root.
";
$elem["slapos-client/master_url_with_ssl_note"]["descriptionde"]="Pflichtschlüssel und -zertifikat des Masterknotens
 Sie haben eine HTTPS-URL für den SlapOS-Masterknoten verwandt, daher muss das zugehörige Zertifikat in /etc/slapos/ssl/slapos.crt und der Schlüssel nur für Root lesbar in /etc/slapos/ssl/slapos.key platziert werden.
";
$elem["slapos-client/master_url_with_ssl_note"]["descriptionfr"]="Clé et certificat obligatoires pour le nœud maître
 Une adresse HTTPS a été choisie pour le nœud maître de SlapOS. Dans ce cas, le certificat correspondant doit être mis dans /etc/slapos/ssl/slapos.crt, et la clé dans /etc/slapos/ssl/slapos.key uniquement lisible par le superutilisateur.
";
$elem["slapos-client/master_url_with_ssl_note"]["default"]="";
$elem["slapos-client/computer_id"]["type"]="string";
$elem["slapos-client/computer_id"]["description"]="SlapOS computer ID:
 Please specify a unique identifier for this SlapOS node.
";
$elem["slapos-client/computer_id"]["descriptionde"]="SlapOS-Rechnerkennzahl:
 Bitte geben Sie einen eindeutigen Bezeichner für diesen SlapOS-Knoten an.
";
$elem["slapos-client/computer_id"]["descriptionfr"]="Identifiant de la machine SlapOS :
 Veuillez indiquer un identifiant unique pour ce nœud SlapOS.
";
$elem["slapos-client/computer_id"]["default"]="";
$elem["slapos-client/software_root"]["type"]="string";
$elem["slapos-client/software_root"]["description"]="Software Releases root directory:
 If you intend to use this package only for development, then
 /var/lib/slapos/software is a sensible choice, however, when using a master
 with network cache, it is highly recommended to use the same path on all the
 nodes, for example /opt/slapgrid.
";
$elem["slapos-client/software_root"]["descriptionde"]="Wurzelverzeichnis der Softwareveröffentlichung:
 Falls Sie beabsichtigen, dieses Paket nur zum Entwickeln zu benutzen, dann ist /var/lib/slapos/software eine vernünfige Wahl, wenn Sie jedoch einen Hauptrechner mit Netzwerkzwischenspeicher benutzen, ist es sehr empfehlenswert, auf allen Knoten den gleichen Pfad zu verwenden, beispielsweise /opt/slapgrid.
";
$elem["slapos-client/software_root"]["descriptionfr"]="Répertoire racine des publications de logiciels :
 Si ce paquet n'est utilisé qu'en développement, le répertoire  /var/lib/slapos/software est un choix adapté. Cependant, si un serveur maître est utilisé avec un cache réseau, il est fortement recommandé d'utiliser le même chemin sur tous les noeuds, par exemple /opt/slapgri.
";
$elem["slapos-client/software_root"]["default"]="";
$elem["slapos-client/partition_amount"]["type"]="string";
$elem["slapos-client/partition_amount"]["description"]="Number of Computer Partitions on this computer:
 A Computer Partition (CP) is an instance of a Software Release
 (SR). You can now define how many instances will be available on this
 computer.
 .
 Note that the Software Releases will be stored in
 /var/lib/slapos/software/, whereas the Computer Partition will be
 stored in /var/lib/slapos/instance/.
";
$elem["slapos-client/partition_amount"]["descriptionde"]="Anzahl der »Computer Partitionen« auf diesem Rechner:
 Eine »Computer Partition« (CP) ist eine Instanz eines »Software-Releases« (SR). Sie können nun festlegen, wie viele Instanzen auf diesem Rechner verfügbar sein werden.
 .
 Beachten Sie, dass das »Software Release« in /var/lib/slapos/software/ gespeichert wird, während die »Computer-Partition« in /var/lib/slapos/instance/ gespeichert wird.
";
$elem["slapos-client/partition_amount"]["descriptionfr"]="Nombre de « Partitions Ordinateur » présentes sur cette machine :
 Une « Partition Ordinateur » (PO) est une instance correspondant à une « Version de Logiciel » (VL).  Vous pouvez désormais définir combien d'instances seront disponibles sur cet ordinateur.
 .
 Veuillez noter que les « Versions de Logiciels » seront stockées dans /var/lib/slapos/software/, tandis que les « Partitions d'Ordinateur » seront stockées dans /var/lib/slapos/instance/.
";
$elem["slapos-client/partition_amount"]["default"]="";
$elem["slapos-client/ipv4_local_network"]["type"]="string";
$elem["slapos-client/ipv4_local_network"]["description"]="Local IPv4 network to be used for Computer Partitions:
 Every Computer Partition must have an address on the same IPv4 network.
 Please specify a network in CIDR notation (e.g.: 192.0.2.0/24).
";
$elem["slapos-client/ipv4_local_network"]["descriptionde"]="Lokales IPv4-Netzwerk, das für »Computer Partitionen« benutzt wird:
 Jede »Computer Partition« muss eine Adresse im gleichen IPv4-Netzwerk haben. Bitte geben Sie ein Netzwerk in CIDR-Notation an (z.B 192.0.2.0/24).
";
$elem["slapos-client/ipv4_local_network"]["descriptionfr"]="Réseau IPV4 à utiliser pour les « Partitions d'Ordinateur » :
 Chaque « Partition d'Ordinateur » doit avoir une adresse sur le même réseau IPV4. Veuillez indiquer un réseau avec la notation CIDR (ex: 192.168.2.0/24).
";
$elem["slapos-client/ipv4_local_network"]["default"]="10.0.0.0/16";
PKG_OptionPageTail2($elem);
?>
