<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iproute2");

$elem["iproute2/setcaps"]["type"]="boolean";
$elem["iproute2/setcaps"]["description"]="Allow ordinary users to run ip vrf exec using capabilities?
 iproute2 can be used to configure and use Virtual Routing and Forwarding (VRF)
 functionality in the  kernel.
 This normally requires root permissions, but sometimes it's useful to allow
 ordinary users to execute commands from inside a virtual routing and forwarding
 domain. E.g. ip vrf exec examplevrf ping 10.0.0.1
 .
 The ip command supports dropping capabilities, making an exception for ip vrf exec.
 The drawback of setting the permissions is that if in the unlikely case of a
 security critical bug being found before the ip command has dropped capabilities
 then it could be used by an attacker to gain root permissions.
 It's up to you to decide about the trade-offs and select the best setting for your
 system.
 This will give cap_dac_override, cap_net_admin and cap_sys_admin to /bin/ip.
 .
 More information about VRF can be found at:
 https://www.kernel.org/doc/Documentation/networking/vrf.txt
";
$elem["iproute2/setcaps"]["descriptionde"]="Normalen Benutzern die Ausführung von »ip vrf exec« mittels Capabilities erlauben?
 iproute2 kann zur Konfiguration und Verwendung der Funktionalität »Virtuelles Routing und Forwarding (Weiterleitung)« im Kernel verwandt werden. Dies benötigt normalerweise Root-Rechte, aber manchmal ist es nützlich, normalen Benutzern zu erlauben, Befehle von innerhalb einer virtuellen Routing- und Forwarding-Domain auszuführen. Z.B. ip vrf exec examplevrf ping 10.0.0.1
 .
 Der Befehl ip ermöglicht es, die Capabilities abzugeben und eine Ausnahme für »ip vrf exec« zu machen. Der Nachteil des Setzens der Berechtigungen ist, dass im unwahrscheinlichen Fall, dass ein sicherheitskritischer Fehler in dem Teil von ip, der vor der Abgabe der Capabilities ausgeführt wird, gefunden wird, ein Angreifer Root-Rechte erlangen könnte. Es obliegt Ihnen, den Zielkonflikt zu behandeln und die beste Einstellung für Ihr System auszuwählen. Dies gibt cap_dac_override, cap_net_admin und cap_sys_admin an /bin/ip.
 .
 Weitere Informationen über VRF können unter folgender Adresse gefunden werden: https://www.kernel.org/doc/Documentation/networking/vrf.txt
";
$elem["iproute2/setcaps"]["descriptionfr"]="Voulez-vous permettre aux utilisateurs ordinaires d'exécuter « ip vrf exec » en utilisant des capacités ?
 iproute2 peut être utilisé pour configurer et utiliser la fonctionnalité Virtual Routing and Forwarding (VRF — routage et transfert virtuels) dans le noyau. Cela nécessite normalement les droits du superutilisateur (root), mais il est parfois utile d'autoriser un utilisateur normal à exécuter ces commandes depuis un domaine de routage et transfert virtuels. Par exemple : ip vrf exec examplevrf ping 10.0.0.1
 .
 La commande ip gère la capacité de rejet, en faisait une exception pour ip vrf exec. L'inconvénient de configurer ces droits est que, dans un cas improbable de bogue critique de sécurité situé avant que la commande ip ait rejeté les capacités, il pourrait être utilisé par un attaquant pour obtenir les droits du superutilisateur (root). C'est à vous de trouver un compromis et de choisir le meilleur paramètre pour votre système. Cela va donner les capacités cap_dac_override, cap_net_admin et cap_sys_admin au binaire /bin/ip.
 .
 Pour plus d'informations sur VRF, veuillez consulter la page Web suivante : https://www.kernel.org/doc/Documentation/networking/vrf.txt
";
$elem["iproute2/setcaps"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
