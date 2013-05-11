<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("diald");

$elem["diald/provider"]["type"]="select";
$elem["diald/provider"]["description"]="PPP configuration:
 It seems you have configured several different dial-up providers on your
 system.  Diald can be configured to use any one of them at a time.
 .
 (If you see one labeled \"old-config\", it represents your old manual
 configuration from an older diald package.  You can select this option to
 configure your system to use the old configuration.)
";
$elem["diald/provider"]["descriptionde"]="PPP-Konfiguration:
 Sie haben offenbar mehrere Dialup-Provider auf Ihrem System konfiguriert. Sie können zu jedem Zeitpunkt einen von ihnen verwenden.
 .
 (Falls ein Provider mit »old-config« bezeichnet wird, ist dies Ihre alte manuelle Diald-Konfiguration. Wählen Sie diese, damit Diald Ihre alte Konfiguration weiter verwendet.)
";
$elem["diald/provider"]["descriptionfr"]="Configuration PPP :
 Il semble que plusieurs fournisseurs d'accès soient configurés sur votre système. Diald peut être configuré pour en employer qu'un seul à la fois.
 .
 Si vous voyez une connexion nommée « old-config », elle concerne votre ancienne configuration manuelle provenant d'un ancien paquet diald. Vous pouvez sélectionner cette option si vous voulez que votre système conserve l'ancienne configuration.
";
$elem["diald/provider"]["default"]="${default}";
$elem["diald/defaultip"]["type"]="boolean";
$elem["diald/defaultip"]["description"]="Should diald use the standard default IP addresses?
 When setting up a connection, diald requires that an IP address be
 configured for both the local and remote sides, even if they aren't
 initially known.  If a pppconfig entry assumes that they will be
 autoconfigured, diald will set these to the default IP addresses
 192.168.0.1 (local) and 192.168.0.2 (remote) initially, and pick up the
 proper values after the first connection is made.
 .
 If you use the 192.168.0.x network, however, this could cause this network
 to be unreachable for a short time after diald is started. If this is the
 case, you should pick two other IP addresses that aren't in use.  Ranges
 from the private IP address ranges (192.168.x.x, 172.16.x.x, and 10.x.x.x)
 are good candidates.
";
$elem["diald/defaultip"]["descriptionde"]="Soll Diald die Standard-IP-Adressen verwenden?
 Diald muss eine lokale und eine IP-Adresse für die Gegenstelle angegeben werden, damit es eine Verbindung aufbauen kann, auch wenn diese noch gar nicht bekannt sind. Falls ein pppconfig-Eintrag annimmt, dass diese automatisch konfiguriert werden, wird Diald diese IP-Adressen daher anfangs auf die Standard IP-Adressen 192.168.0.1 (lokaler Rechner) und 192.168.0.2 (entfernter Rechner) setzen und die Einstellungen erneuern, sobald die erste Verbindung aufgebaut wurde.
 .
 Falls Sie allerdings IP-Adressen aus dem Bereich 192.168.0.x lokal benutzen, kann dies dazu führen, dass Ihr Netz für eine kurze Zeit nachdem Diald gestartet wurde nicht mehr erreichbar ist. In diesem Fall sollten Sie zwei andere IP-Adressen auswählen, die nicht benutzt werden. Adressen aus den Bereichen für private Netzwerke sind dafür am Besten geeignet (192.168.x.x, 172.16.x.x und 10.x.x.x).
";
$elem["diald/defaultip"]["descriptionfr"]="Diald doit-il utiliser l'adresse IP par défaut ?
 Lorsque vous paramétrez une connexion, diald requiert une adresse IP locale et distante, même si elles ne sont pas initialement connues. Dans le cas où une entrée de pppconfig suppose qu'elles seront auto-configurées, diald les établira d'abord à l'adresse IP par défaut, soit 192.168.0.1 (adresse locale) et 192.168.0.2 (adresse distante), puis elles prendront leurs valeurs appropriées après que la connexion soit établie.
 .
 Si vous utilisez le réseau 192.168.0.x, ceci provoquera une légère coupure après que diald soit démarré. Si vous êtes dans ce cas, vous devriez prendre deux autres IP qui ne sont pas utilisées. Les adresses IP privées (192.168.x.x, 172.16.x.x, and 10.x.x.x) sont de bonnes solutions.
";
$elem["diald/defaultip"]["default"]="true";
$elem["diald/localip"]["type"]="string";
$elem["diald/localip"]["description"]="Local default IP address:
";
$elem["diald/localip"]["descriptionde"]="Lokale Standard-IP-Adresse:
";
$elem["diald/localip"]["descriptionfr"]="Adresse IP locale par défaut :
";
$elem["diald/localip"]["default"]="";
$elem["diald/remoteip"]["type"]="string";
$elem["diald/remoteip"]["description"]="Remote default IP address:
";
$elem["diald/remoteip"]["descriptionde"]="Entfernte Standard-IP-Adresse:
";
$elem["diald/remoteip"]["descriptionfr"]="Adresse IP distante par défaut :
";
$elem["diald/remoteip"]["default"]="";
PKG_OptionPageTail2($elem);
?>
