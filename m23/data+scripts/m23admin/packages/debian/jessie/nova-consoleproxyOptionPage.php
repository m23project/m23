<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nova-consoleproxy");

$elem["nova-consoleproxy/daemon_type"]["type"]="select";
$elem["nova-consoleproxy/daemon_type"]["choices"][1]="spicehtml5";
$elem["nova-consoleproxy/daemon_type"]["choices"][2]="xenvnc";
$elem["nova-consoleproxy/daemon_type"]["description"]="Type of console daemon to start at boot time:
 Nova Console supports 3 types of consoles. One is specific to Xen, called
 XVP (Xen VNC Proxy), and the other daemon supports KVM. While the SPICE
 protocol is normally faster than VNC, it also requires support for web
 sockets in your browser, and that is a feature only very modern browsers
 have support for.
 .
 This can later be edited in /etc/default/nova-consoleproxy.
";
$elem["nova-consoleproxy/daemon_type"]["descriptionde"]="Typ des Konsolen-Daemons, der beim Hochfahren gestartet werden soll:
 Nova Console unterstützt drei Konsolentypen. Eine ist speziell für Xen, sie heißt XVP (Xen-VNC-Proxy) und die anderen unterstützen KVM. Während das Protokoll SPICE normalerweise schneller als VNC ist, verlangt es außerdem, dass Ihr Browser Web-Sockets unterstützt und dies ist eine Funktionalität. die nur von sehr neuen Browsern geboten wird.
 .
 Dies kann später in /etc/default/nova-consoleproxy geändert werden.
";
$elem["nova-consoleproxy/daemon_type"]["descriptionfr"]="
 Nova Console prend en charge 3 types de consoles. Une est spécifique à Xen, appelée XVP (Xen VNC Proxy) et l'autre démon prend en charge KVM. Alors que le protocole SPICE est théoriquement plus rapide que VNC, il requiert également l’emploi des sockets web dans le navigateur, et c'est une fonctionnalité dont seuls les navigateurs les plus modernes disposent.
 .
 Ce choix peut être modifié ultérieurement en modifiant le fichier /etc/default/nova-consoleproxy.
";
$elem["nova-consoleproxy/daemon_type"]["default"]="spicehtml5";
PKG_OptionPageTail2($elem);
?>
