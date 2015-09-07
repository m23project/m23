<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fwknop-server");

$elem["fwknop-server/easy_setup"]["type"]="boolean";
$elem["fwknop-server/easy_setup"]["description"]="Configure fwknop to protect the SSH port?
 The FireWall KNock OPerator daemon has not been set up yet. This install
 process can configure fwknopd to protect the SSH port with a simple Rijndael
 shared key, but moving to a GnuPG setup is recommended. Setting up GnuPG for
 SPA communications involves a few manual steps that are described in the fwknop
 documentation. In the meantime, using Rijndael for SPA encryption and
 decryption provides decent security.
";
$elem["fwknop-server/easy_setup"]["descriptionde"]="Fwknop zum Schutz des SSH-Ports konfigurieren?
 Der »FireWall KNock OPerator«-Daemon (Firewall-Klopf-Operator-Daemon) ist noch nicht eingerichtet. Dieser Installationsprozess kann Fwknopd so konfigurieren, dass der SSH-Port mit einem einfachen, gemeinsam benutzten Rijndael-Schlüssel geschützt wird, jedoch wird empfohlen, auf eine GnuPG-Konfiguration umzustellen. Die Einrichtung von GnuPG für SPA-Kommunikationen bedarf einiger manueller Schritte, die in der Dokumentation von Fwknop beschrieben sind. Bis dies erledigt ist, stellt Rijndael für SPA-Verschlüsselung und -Entschlüsselung eine angemessene Sicherheit bereit.
";
$elem["fwknop-server/easy_setup"]["descriptionfr"]="Faut-il configurer fwknop pour protéger le port SSH ?
 Le démon pour le pare-feu fwknop (« FireWall KNock OPerator ») n'est pas encore configuré. Il est possible de configurer fwknop pour protéger le port SSH à l'aide d'une simple clef partagée de type Rijndael, mais il est préférable d'utiliser un système basé sur GnuPG. La mise en place de GnuPG pour les communications SPA (Single Packet Authorization, ou accréditation par un seul paquet) passe par quelques étapes manuelles décrites dans la documentation de fwknop. En attendant, l'utilisation d'une clef Rijndael pour le chiffrement et le déchiffrement SPA procure un niveau de sécurité décent.
";
$elem["fwknop-server/easy_setup"]["default"]="false";
$elem["fwknop-server/pcap_iface"]["type"]="string";
$elem["fwknop-server/pcap_iface"]["description"]="Sniffing interface:
 Please specify which Ethernet interface should be put in promiscuous mode.
";
$elem["fwknop-server/pcap_iface"]["descriptionde"]="Netzwerkschnittstelle, deren Datenverkehr belauscht werden soll:
 Bitte geben Sie an, welche Ethernet-Schnittstelle in den »promiscuous«-Modus geschaltet werden soll.
";
$elem["fwknop-server/pcap_iface"]["descriptionfr"]="Interface surveillée :
 Veuillez préciser l'interface Ethernet qui doit être basculée en mode « promiscuous ».
";
$elem["fwknop-server/pcap_iface"]["default"]="";
$elem["fwknop-server/key"]["type"]="string";
$elem["fwknop-server/key"]["description"]="Encryption key to use:
 By default, SPA packets are encrypted with the Rijndael block cipher, which
 requires an encryption key. This password must be at least eight characters
 in length.
";
$elem["fwknop-server/key"]["descriptionde"]="Passwort für die Verschlüsselung:
 Standardmäßig werden SPA-Pakete mit einer Rijndael-Blockziffer verschlüsselt, die einen Verschlüsselungsschlüssel benötigt. Das Passwort muss mindestens acht Zeichen lang sein.
";
$elem["fwknop-server/key"]["descriptionfr"]="Clef de chiffrement à utiliser :
 Par défaut, les paquets SPA sont cryptés à l'aide du chiffre par bloc Rijndael, qui nécessite une clef de chiffrement. Le mot de passe qui protège cette dernière doit comporter au moins huit caractères.
";
$elem["fwknop-server/key"]["default"]="";
PKG_OptionPageTail2($elem);
?>
