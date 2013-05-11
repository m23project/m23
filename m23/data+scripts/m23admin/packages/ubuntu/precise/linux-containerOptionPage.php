<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("linux-container");

$elem["linux-container/title"]["type"]="title";
$elem["linux-container/title"]["description"]="Linux Container: Container setup
";
$elem["linux-container/title"]["descriptionde"]="Container Setup
";
$elem["linux-container/title"]["descriptionfr"]="Installation du conteneur
";
$elem["linux-container/title"]["default"]="";
$elem["linux-container/enable"]["type"]="boolean";
$elem["linux-container/enable"]["description"]="Linux Container: enable setup for LXC?
 Linux Container can do all the necessary modifications needed within a
 container to make it work with LXC. Do you want to proceed?
 .
 If unsure, choose no (default).
";
$elem["linux-container/enable"]["descriptionde"]="aktivieren des Setups für LXC?
 Linux Container kann alle Änderungen vornehmen die nötig sind, um einen Container mit LXC benutzbar zu machen. Möchten Sie fortfahren?
 .
 Wenn Sie unsicher sind, wählen sie nein (Standard).
";
$elem["linux-container/enable"]["descriptionfr"]="Faut-il paramétrer LXC ?
 Il est possible d'effectuer les réglages nécessaires pour que les conteneurs puissent être utilisés avec LXC. Veuillez choisir si vous souhaitez le faire.
 .
 En cas de doute, il est conseillé de ne pas choisir cette option.
";
$elem["linux-container/enable"]["default"]="false";
$elem["linux-container/consoles"]["type"]="string";
$elem["linux-container/consoles"]["description"]="Linux Container: How many consoles for LXC?
 How many concurrent consoles should the current container provide?
 .
 This defaults to 6 and will result in six getty processes per container.
";
$elem["linux-container/consoles"]["descriptionde"]="Wieviele Konsolen für diesen Container?
 Wieviele Konsolen sollen diese Container zur Verfügung stellen?
 .
 Der Standardwert ist 6 und bedeutet, dass sechs getty Prozesse im Container gestartet werden.
";
$elem["linux-container/consoles"]["descriptionfr"]="Nombre de consoles pour LXC :
 Veuillez choisir le nombre de consoles simultanées que le conteneur actuel doit fournir.
 .
 Six consoles virtuelles est la valeur conseillée, ce qui conduit à exécuter autant de processus « getty » pour chaque conteneur.
";
$elem["linux-container/consoles"]["default"]="6";
$elem["linux-container/hostname"]["type"]="string";
$elem["linux-container/hostname"]["description"]="Linux Container: Hostname for LXC?
 What should be the hostname of the current container?
 .
 This defaults to either /etc/hostname (if present), is automatically guessed
 through lsb_release (if present), or otherwise set to 'debian'.
";
$elem["linux-container/hostname"]["descriptionde"]="Rechnername für diesen Container?
 Was soll der Rechnername dieses Containers sein?
 .
 Der Standardwert wird aus /etc/hostname ermittelt (falls vorhanden), andernfalls mittels lsb_release bestimmt oder auf 'debian' gesetzt.
";
$elem["linux-container/hostname"]["descriptionfr"]="Nom d'hôte pour LXC :
 Veuillez indiquer le nom d'hôte du conteneur actuel.
 .
 Il est conseillé d'utiliser /etc/hostname (s'il est présent) ou la sortie de « lsb_release ».
";
$elem["linux-container/hostname"]["default"]="debian";
$elem["linux-container/eth0/dhcp"]["type"]="boolean";
$elem["linux-container/eth0/dhcp"]["description"]="Linux Container: Use DHCP?
 Should the containers address be determined by using DHCP?
 .
 This defaults to yes and will require that you run a dhcp-server in your network.
";
$elem["linux-container/eth0/dhcp"]["descriptionde"]="Soll DHCP verwendet werden?
 Soll die Adresse des Containers mit DHCP ermittelt werden?
 .
 Wenn Sie diese Option wählen, wird ein DHCP Server in ihrem Netzwerk benötigt.
";
$elem["linux-container/eth0/dhcp"]["descriptionfr"]="Faut-il utiliser le DHCP ?
 Veuillez choisir si l'adresse du conteneur doit être obtenue par DHCP.
 .
 Il est conseillé de choisir cette option si un serveur DHCP existe sur le réseau.
";
$elem["linux-container/eth0/dhcp"]["default"]="true";
$elem["linux-container/eth0/address"]["type"]="string";
$elem["linux-container/eth0/address"]["description"]="Linux Container: IP Address?
 What should be the IP address of the current container?
 .
 This defaults to 192.168.1.2.
";
$elem["linux-container/eth0/address"]["descriptionde"]="Linux Container IP Adresse?
 Was soll die IP Adresse dieses Containers sein?
 .
 Der Standardwert ist 192.168.1.2.
";
$elem["linux-container/eth0/address"]["descriptionfr"]="Adresse IP :
 Veuillez indiquer l'adresse IP pour le conteneur actuel.
 .
 La valeur par défaut est 192.168.1.2.
";
$elem["linux-container/eth0/address"]["default"]="192.168.1.2";
$elem["linux-container/eth0/broadcast"]["type"]="string";
$elem["linux-container/eth0/broadcast"]["description"]="Linux Container: Broadcast Address?
 What should be the broadcast address of the current container?
 .
 This defaults to 192.168.1.255 but can be left empty.
";
$elem["linux-container/eth0/broadcast"]["descriptionde"]="Broadcast Adresse?
 Was soll die Broadcast Adresse dieses Containers sein?
 .
 Der Standardwert ist 192.168.1.255 kann aber auch weggelassen werden.
";
$elem["linux-container/eth0/broadcast"]["descriptionfr"]="Adresse de diffusion :
 Veuillez indiquer l'adresse de diffusion (« broadcast ») pour le conteneur actuel.
 .
 La valeur par défaut est déduite de l'adresse IP mais elle peut être laissée vide.
";
$elem["linux-container/eth0/broadcast"]["default"]="192.168.1.255";
$elem["linux-container/eth0/gateway"]["type"]="string";
$elem["linux-container/eth0/gateway"]["description"]="Linux Container: Gateway Address?
 What should be the gateway address of the current container?
 .
 This defaults to 192.168.1.1 but can be left empty.
";
$elem["linux-container/eth0/gateway"]["descriptionde"]="Gateway Adresse?
 Was soll der Rechnername dieses Containers sein?
 .
 Der Standardwert ist 192.168.1.1 kann aber auch weggelassen werden.
";
$elem["linux-container/eth0/gateway"]["descriptionfr"]="Adresse de la passerelle :
 Veuillez indiquer l'adresse de la passerelle réseau pour le conteneur actuel.
 .
 La valeur par défaut est déduite de l'adresse IP mais elle peut être laissée vide.
";
$elem["linux-container/eth0/gateway"]["default"]="192.168.1.1";
$elem["linux-container/eth0/netmask"]["type"]="string";
$elem["linux-container/eth0/netmask"]["description"]="Linux Container: Network Mask?
 What should be the netmask of the current container?
 .
 This defaults to 255.255.255.0.
";
$elem["linux-container/eth0/netmask"]["descriptionde"]="Linux Container Netzwerkmaske?
 Was soll die Netzwerkmaske dieses Containers sein?
 .
 Der Standardwert ist 255.255.255.0.
";
$elem["linux-container/eth0/netmask"]["descriptionfr"]="Masque réseau :
 Veuillez indiquer le masque réseau pour le conteneur actuel.
 .
 La valeur par défaut est 255.255.255.0.
";
$elem["linux-container/eth0/netmask"]["default"]="255.255.255.0";
$elem["linux-container/eth0/network"]["type"]="string";
$elem["linux-container/eth0/network"]["description"]="Linux Container: Network Address?
 What should be the network address of the current container?
 .
 This defaults to 192.168.1.0 but can be left empty.
";
$elem["linux-container/eth0/network"]["descriptionde"]="Linux Container Netzwerk Adresse
 Was soll die Netzwerk Adresse dieses Containers sein?
 .
 Der Standardwert ist 192.168.1.0 kann aber weggelassen werden.
";
$elem["linux-container/eth0/network"]["descriptionfr"]="Adresse réseau :
 Veuillez indiquer l'adresse du réseau dont fait partie ce conteneur.
 .
 La valeur par défaut est déduite de l'adresse IP mais elle peut être laissée vide.
";
$elem["linux-container/eth0/network"]["default"]="192.168.1.0";
$elem["linux-container/eth0/post-up"]["type"]="string";
$elem["linux-container/eth0/post-up"]["description"]="Linux Container: post-up command?
 What should be the post-up command, if any?
 .
 This is not used by default and can be left empty.
";
$elem["linux-container/eth0/post-up"]["descriptionde"]="";
$elem["linux-container/eth0/post-up"]["descriptionfr"]="Commande à lancer après le démarrage de l'interface :
 Veuillez indiquer les commandes à effectuer après le démarrage de l'interface, si nécessaire.
 .
 Cette fonctionnalité n'est pas utilisée par défaut et ce champ peut donc être laissé vide.

";
$elem["linux-container/eth0/post-up"]["default"]="Default:";
$elem["linux-container/eth0/mtu"]["type"]="string";
$elem["linux-container/eth0/mtu"]["description"]="Linux Container: MTU?
 What should be the MTU value of the current container?
 .
 This defaults to 1500 but can be left empty.
";
$elem["linux-container/eth0/mtu"]["descriptionde"]="";
$elem["linux-container/eth0/mtu"]["descriptionfr"]="MTU :
 Veuillez indiquer la valeur du MTU (« Maximum Transmission Unit ») pour le conteneur actuel.
 .
 La valeur par défaut est 1500 mais elle peut être laissée vide.

";
$elem["linux-container/eth0/mtu"]["default"]="1500";
$elem["linux-container/nameservers"]["type"]="string";
$elem["linux-container/nameservers"]["description"]="Linux Container: Nameserver Addresses?
 What should be the IP addresses of the nameservers of the current container?
 .
 This defaults to 192.168.1.1 but can be left empty.
 Multiple nameservers can be separated by whitespace.
";
$elem["linux-container/nameservers"]["descriptionde"]="Nameserver Adressen?
 Was sollen die IP Adressen der Nameserver dieses Containers sein?
 .
 Der Standardwert ist 192.168.1.1 kann aber weggelassen werden. Mehrere Nameserver können mittels Leerzeichen separiert werden.
";
$elem["linux-container/nameservers"]["descriptionfr"]="Adresse du serveur de noms :
 Veuillez indiquer l'adresse IP du serveur de noms pour le conteneur actuel.
 .
 La valeur par défaut est déduite de l'adresse IP mais elle peut être laissée vide. Plusieurs serveurs de noms peuvent être indiqués, séparés par des espaces.
";
$elem["linux-container/nameservers"]["default"]="192.168.1.1";
PKG_OptionPageTail2($elem);
?>
