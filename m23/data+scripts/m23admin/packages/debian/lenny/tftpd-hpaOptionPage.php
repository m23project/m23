<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tftpd-hpa");

$elem["tftpd-hpa/use_inetd"]["type"]="boolean";
$elem["tftpd-hpa/use_inetd"]["description"]="Should the server be started by inetd?
 tftpd-hpa can be started by the inetd superserver or as a daemon and
 handle incoming connections by itself. The latter is only recommended
 for very high usage servers.
";
$elem["tftpd-hpa/use_inetd"]["descriptionde"]="Soll der Server von inetd gestartet werden?
 tftp-hpa kann vom inetd-Superserver gestartet werden. Oder es kann als Daemon laufen und ankommende Verbindungen selbst verwalten. Das letztere wird nur für stark belastete Server empfohlen.
";
$elem["tftpd-hpa/use_inetd"]["descriptionfr"]="Faut-il qu'inetd démarre le serveur ?
 Tftp-hpa peut être démarré soit par le serveur inetd, soit en tant que démon et gérer lui-même les connexions entrantes. Pour les serveurs soumis à une forte charge, la seconde solution est recommandée.
";
$elem["tftpd-hpa/use_inetd"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
