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
PKG_OptionPageTail2($elem);
?>
