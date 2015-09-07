<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openvpn");

$elem["openvpn/create_tun"]["type"]="boolean";
$elem["openvpn/create_tun"]["description"]="Create the TUN/TAP device?
 If you choose this option, the /dev/net/tun device
 needed by OpenVPN will be created.
 .
 You should not choose this option if you're using devfs.
";
$elem["openvpn/create_tun"]["descriptionde"]="TUN/TAP-Gerät anlegen?
 Wenn Sie hier zustimmen, wird das von OpenVPN benötigte Gerät /dev/net/tun erzeugt.
 .
 Sie sollten nicht zustimmen, wenn Sie Devfs benutzen.
";
$elem["openvpn/create_tun"]["descriptionfr"]="Faut-il créer le périphérique TUN/TAP ?
 Si vous choississez cette option, le périphérique TUN/TAP /dev/net/tun nécessaire pour OpenVPN sera créé.
 .
 Vous ne devriez pas choisir cette option si vous utilisez devfs.
";
$elem["openvpn/create_tun"]["default"]="false";
$elem["openvpn/vulnerable_prng"]["type"]="note";
$elem["openvpn/vulnerable_prng"]["description"]="Vulnerable random number generator
 A weakness has been discovered in the random number generator used by OpenSSL
 on Ubuntu and Debian systems.  As a result of this weakness, certain
 encryption keys are generated much more frequently than they should be, such
 that an attacker could guess the key through a brute-force attack given minimal
 knowledge of the system.
 .
 Any keys created on a vulnerable system may be affected by this problem. The
 'openssl-vulnkey' command may be used as a partial test for RSA keys with
 certain bit sizes, and the 'openvpn-vulnkey' for OpenVPN shared secret keys.
 Users are urged to verify their keys or simply regenerate any server or client
 certificates and keys in use on the system.
";
$elem["openvpn/vulnerable_prng"]["descriptionde"]="Unsicherer Zufallszahlen-Generator
 Im Zufallszahlen-Generator von OpenSSL auf Ubuntu- und Debian-Systemen ist eine Schwachstelle gefunden worden. Diese Schwachstelle sorgt dafür, dass bestimmte Verschlüsselungsschlüssel öfter erzeugt werden, als sie sollten. Dadurch kann ein Angreifer den Schlüssel mittels eines »Brute-Force«-Angriffs erraten, auch wenn er nur wenig über das System weiß.
 .
 Alle Schlüssel, die auf einem System mit dieser Schwachstelle erzeugt wurden, können von diesem Problem betroffen sein. Das Kommando 'openssl-vulnkey' kann als ein Teil eines Tests benutzt werden, um RSA-Schlüssel mit bestimmten Bit-Größen zu überprüfen. Das Kommando 'openvpn-vulnkey' testet OpenVPNs verteilte geheime Schlüssel (shared secret keys).
";
$elem["openvpn/vulnerable_prng"]["descriptionfr"]="Générateur de nombres aléatoires vulnérable
 Une faille a été découverte dans le générateur de nombres aléatoires d'OpenSSL dans Debian et les distributions dérivées. Cela implique que certaines clés sont générées plus souvent que d'autres, permettant à une attaque par force brute de réussir à trouver une clé de chiffrement même avec une connaissance minimale du système.
 .
 Toutes les clés créées sur un système vulnérable sont potentiellement touchées par ce problème. La commande « openssl-vulnkey » peut être utilisée pour trouver certaines des clés RSA vulnérables d'une certaine taille. De même la commande « openvpn-vulnkey » peut rechercher de telles clés secrètes partagées d'OpenVPN. Il est très fortement conseillé de vérifier les clés de chiffrement ou de simplement recréer les certificats des serveurs et des clients, ainsi que les clés utilisées sur le système.
";
$elem["openvpn/vulnerable_prng"]["default"]="";
PKG_OptionPageTail2($elem);
?>
