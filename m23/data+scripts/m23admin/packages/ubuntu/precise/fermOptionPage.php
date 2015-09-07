<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ferm");

$elem["ferm/enable"]["type"]="boolean";
$elem["ferm/enable"]["description"]="Enable ferm on bootup?
 Ferm can load firewall rules on every bootup from /etc/ferm/ferm.conf.
 .
 The default configuration allows SSH login on port 22; if you are
 installing this package remotely on another port, you should not
 choose this option, and later edit /etc/default/ferm to enable ferm.
";
$elem["ferm/enable"]["descriptionde"]="Ferm beim Systemstart aktivieren?
 Ferm kann die Firewallregeln bei jedem Systemstart aus /etc/ferm/ferm.conf laden.
 .
 Die Standardkonfiguration beschränkt den Zugang auf SSH (Port 22); wenn Ihr SSH Dienst auf einem anderen Port läuft, sollten Sie diese Option nicht wählen und später /etc/default/ferm manuell editieren um ferm zu aktivieren.
";
$elem["ferm/enable"]["descriptionfr"]="Faut-il lancer ferm au démarrage ?
 Ferm peut charger à chaque démarrage les règles du pare-feu présentes dans /etc/ferm/ferm.conf.
 .
 La configuration par défaut autorise les connexions SSH sur le port 22. Si vous installez ce paquet à distance en utilisant un autre port, vous devriez refuser cette option et modifier /etc/default/ferm pour activer ferm.
";
$elem["ferm/enable"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
