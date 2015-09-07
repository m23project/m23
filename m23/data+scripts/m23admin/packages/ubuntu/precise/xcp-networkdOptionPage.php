<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xcp-networkd");

$elem["xcp-xapi/networking_type"]["type"]="select";
$elem["xcp-xapi/networking_type"]["choices"][1]="bridge";
$elem["xcp-xapi/networking_type"]["description"]="XCP networking manager:
 The xcp-networkd daemon supports two network backends: standard Linux bridging
 and Open vSwitch.
 .
 While both modes support a similar feature set,
 Open vSwitch provides additional features such as QoS, monitoring,
 and control using the OpenFlow protocol. These additional features
 are not controlled directly through the XenAPI, but can instead be
 enabled and controlled through the ovs-* suite of commands.
";
$elem["xcp-xapi/networking_type"]["descriptionde"]="XCP-Netzwerkverwaltung:
 Der Daemon Xcp-networkd unterstützt zwei Netzwerk-Backends: Standard-Linux-Bridging und Open vSwitch.
 .
 Während beide Modi eine ähnlich Funktionszusammenstellung unterstützen, stellt Open vSwitch zusätzliche Funktionen wie QoS, Überwachung und Steuerung mittels des OpenFlow-Protokolls bereit. Diese zusätzlichen Funktionen werden nicht direkt durch die XenAPI gesteuert, können aber stattdessen über die ovs-*-Befehlssammlung aktiviert und gesteuert werden.
";
$elem["xcp-xapi/networking_type"]["descriptionfr"]="Gestionnaire de réseau XCP :
 Le démon xcp-networkd gère deux types d'interface réseau : le relais (« bridging ») usuel de Linux et Open vSwitch.
 .
 Même si les deux modes offrent des possibilités analogues, Open vSwitch fournit des fonctionnalités supplémentaires telles que la qualité de service, la surveillance et le contrôle grâce au protocole OpenFlow. Ces fonctionnalités supplémentaires ne sont pas contrôlées directement via l'interface de programmation de Xen, mais peuvent en revanche être activées et contrôlées avec les commandes ovs-*.
";
$elem["xcp-xapi/networking_type"]["default"]="bridge";
PKG_OptionPageTail2($elem);
?>
