<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("portmap");

$elem["portmap/loopback"]["type"]="boolean";
$elem["portmap/loopback"]["description"]="Should portmap be bound to the loopback address?
 By default, portmap listens to all IP addresses. However, if this
 machine does not provide network RPC services (such as NIS or NFS) to
 remote clients, you can safely bind it to the loopback IP address
 (127.0.0.1).
 .
 This will allow RPC local services (like FAM) to work properly, while
 preventing remote systems from accessing the RPC services.
 .
 This configuration can be changed by editing the OPTIONS line in the
 /etc/default/portmap file and adapting the use of the -i option to
 your needs.
";
$elem["portmap/loopback"]["descriptionde"]="Soll Portmap auf die Loopback-Adresse beschränkt werden?
 Standardmäßig wartet Portmap auf allen IP-Adressen auf Anfragen. Falls diese Maschine allerdings keine RPC-Dienste für entfernte Clients anbietet (wie NIS oder NFS), können Sie ihn unbesorgt auf die Loopback-Adresse 127.0.0.1 beschränken.
 .
 Dies erlaubt lokalen RPC-Diensten (wie FAM) normal zu arbeiten, während es entfernten Systemen verwehrt wird, auf die RPC-Dienste zuzugreifen.
 .
 Diese Einstellung kann auch geändert werden, indem die Zeile OPTIONS in der Datei /etc/default/portmap bearbeitet wird. Passen Sie hierbei die Verwendung der Option »-i« Ihren Bedürfnissen an.
";
$elem["portmap/loopback"]["descriptionfr"]="Portmap doit-il se limiter à l'adresse de bouclage 127.0.0.1 ?
 Par défaut, portmap est à l'écoute sur toutes les adresses IP. Cependant, si cette machine ne fournit pas de services RPC à des clients distants (ce qui est le cas pour un serveur NFS ou NIS), vous pouvez le restreindre en toute sécurité à l'adresse de bouclage 127.0.0.1.
 .
 Cela permettra aux services RPC locaux (comme FAM) de fonctionner correctement, tout en empêchant les systèmes distants d'accéder aux services RPC.
 .
 Cette configuration peut également être changée en modifiant la ligne OPTIONS dans le fichier /etc/default/portmap. Si vous ne précisez pas -i comme option, portmap sera lié à toutes les interfaces.
";
$elem["portmap/loopback"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
