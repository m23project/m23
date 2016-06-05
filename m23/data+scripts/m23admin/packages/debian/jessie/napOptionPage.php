<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nap");

$elem["nap/napping-setuid"]["type"]="boolean";
$elem["nap/napping-setuid"]["description"]="Do you want napping to be installed setuid?
 The napping executable, which is responsible for collecting ping results
 for nap, can be installed with the set-user-id bit set, so that it will be
 able to open a raw network socket required to send ping packets.
 .
 Enabling this feature may be a security risk, so it is disabled by
 default. If in doubt, it is suggested that you leave it disabled.
";
$elem["nap/napping-setuid"]["descriptionde"]="Soll Napping mit Root-Rechten installiert werden?
 Das Programm »napping«, das Ping-Ergebnisse für Nap sammelt, kann mit Root-Rechten ausgestattet werden, damit es RAW-Netzwerk-Sockets öffnen kann. Diese sind für das Senden von Ping-Paketen notwendig.
 .
 Wenn Sie hier zustimmen, könnte das ein Sicherheitsrisiko bedeuten, deshalb ist diese Funktion standardmäßig ausgeschaltet. Wenn Sie sich nicht sicher sind, lassen Sie es deaktiviert.
";
$elem["nap/napping-setuid"]["descriptionfr"]="Napping doit-il s'exécuter avec les droits du superutilisateur ?
 Le programme napping est chargé de rassembler les résultats des pings pour nap. Il peut-être installé avec le bit « setuid » activé, et sera donc capable d'ouvrir une socket de type « raw » nécessaire à l'envoi de paquets ping.
 .
 Cette option peut impliquer des problèmes de sécurité, elle est donc désactivée par défaut. En cas de doute, ne la choisissez pas.
";
$elem["nap/napping-setuid"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
