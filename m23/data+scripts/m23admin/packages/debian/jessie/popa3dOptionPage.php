<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("popa3d");

$elem["popa3d/standalone"]["type"]="boolean";
$elem["popa3d/standalone"]["description"]="Run popa3d in standalone mode?
 In standalone mode, popa3d will become a daemon, accepting connections on
 the pop3 port (110/tcp) and forking child processes to handle them. This
 has lower overhead than starting popa3d from an inetd equivalent and is
 thus useful on busy servers to reduce load. See popa3d(8) for more
 details.
";
$elem["popa3d/standalone"]["descriptionde"]="popa3d als Daemon starten?
 Wenn popa3d als Daemon gestartet wird, dann wird er Verbindungen auf Port 110/tcp annehmen und die Verbindungen an Child-Prozesse weitergeben. Diese Startart verursacht weniger Belastung für den Rechner und ist daher für Rechner mit hoher Belastung empfohlen. In der popa3d(8)-Manpage stehen weitere Details zu diesem Thema.
";
$elem["popa3d/standalone"]["descriptionfr"]="Utiliser popa3d en mode autonome ?
 En mode autonome, popa3d fonctionne en tant que démon. Il accepte les connexions sur le port pop3 (110/tcp) et démarre des processus fils pour les gérer. Le besoin en ressources est plus faible que lorsqu'il est lancé via inetd ou un logiciel équivalent, ce qui permet de réduire l'impact sur un serveur chargé. Voir popa3d(8) pour plus d'informations.
";
$elem["popa3d/standalone"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
