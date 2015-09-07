<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libslp1");

$elem["libslp1/multicast"]["type"]="error";
$elem["libslp1/multicast"]["description"]="IP multicast-enabled kernel needed to reduce traffic
 The current kernel does not support IP multicast. OpenSLP will
 continue to work even without multicast support in the kernel, by
 using broadcasts. However, broadcasts are less efficient on the
 network, so please consider upgrading to a multicast-enabled kernel.
";
$elem["libslp1/multicast"]["descriptionde"]="Kernel mit IP-Multicast-Unterstützung wird für weniger Verkehr benötigt
 Der aktuelle Kernel unterstützt IP-Multicast nicht. OpenSLP wird auch ohne Multicast-Unterstützung im Kernel arbeiten, in dem es Broadcasts nutzt. Leider sind Broadcasts weniger wirkungsvoll im Netzwerk, Sie sollten deshalb einen Kernel mit Multicast-Unterstützung verwenden.
";
$elem["libslp1/multicast"]["descriptionfr"]="Noyau avec gestion de la multidiffusion IP indispensable
 Le noyau que vous utilisez ne semble pas comporter l'option de multidiffusion IP (« IP multicast »). OpenSLP va continuer à fonctionner sans la gestion de la multidiffusion dans le noyau, par utilisation de diffusions générales (« broadcasts »). Cependant, les diffusions générales sont moins efficaces sur le réseau ; il est donc conseillé d'utiliser vers un noyau comportant l'option de multidiffusion.
";
$elem["libslp1/multicast"]["default"]="";
$elem["libslp1/multicast-route"]["type"]="error";
$elem["libslp1/multicast-route"]["description"]="Multicast route needed in /etc/network/interfaces
 There seem to be no multicast route configured. OpenSLP can take
 advantage of multicast packets and reduce traffic on the network. You can
 set up a multicast route automatically on system startup by adding the
 following commands to the \"interface\" line(s) in the
 /etc/network/interfaces file.
 .
  up route add -net 224.0.0.0 netmask 240.0.0.0 dev eth0
  down route del -net 224.0.0.0 netmask 240.0.0.0 dev eth0
";
$elem["libslp1/multicast-route"]["descriptionde"]="Multicast-Route wird in der Datei /etc/network/interfaces benötigt
 Es ist anscheinend keine Multicast-Route eingerichtet. OpenSLP kann die Vorteile von Multicast-Paketen nutzen und den Netzwerkverkehr verringern. Sie können automatisch bei jedem Systemstart eine Multicast-Route setzen lassen, wenn Sie die folgenden Kommandos an die Zeile(n) »interface« in Ihrer Datei /etc/network/interfaces anfügen.
 .
  up route add -net 224.0.0.0 netmask 240.0.0.0 dev eth0
  down route del -net 224.0.0.0 netmask 240.0.0.0 dev eth0
";
$elem["libslp1/multicast-route"]["descriptionfr"]="Route de multidiffusion indispensable dans /etc/network/interfaces
 Aucune route de multidiffusion ne semble configurée. OpenSLP peut tirer avantage de paquets réseau avec multidiffusion (« multicast packets ») pour réduire le trafic sur votre réseau. Il est possible de configurer une route de multidiffusion automatiquement, au démarrage, en ajoutant les commandes suivantes dans le(s) ligne(s) « interfaces » du fichier /etc/network/interfaces.
 .
  up route add -net 224.0.0.0 netmask 240.0.0.0 dev eth0
  down route del -net 224.0.0.0 netmask 240.0.0.0 dev eth0
";
$elem["libslp1/multicast-route"]["default"]="";
PKG_OptionPageTail2($elem);
?>
