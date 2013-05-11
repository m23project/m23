<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wipl-client-inetd");

$elem["wipl-client-inetd/enable-disable"]["type"]="boolean";
$elem["wipl-client-inetd/enable-disable"]["description"]="Do you want wipl-client-inetd to be enabled?
 wipl-client-inetd allows a remote client to connect to a local wipld
 server to retrieve statistics. Since there are several security risks
 involved with this, wipl-client-inetd is disabled by default.
 .
 If you want wipl-client-inetd to be enabled, accept here. Otherwise,
 to leave wipl-client-inetd disabled, refuse here.
 .
 Anyway, you may want to take a look at /etc/hosts.allow and hosts.deny.
";
$elem["wipl-client-inetd/enable-disable"]["descriptionde"]="Soll wipl-client-inetd aktiviert werden?
 Wipl-client-inetd erlaubt einem entfernten Client die Verbindung zu einem lokalen wipld-Server zum Abruf von Statistiken. Da damit mehrere Sicherheitsrisiken verbunden sind, ist wipl-client-inetd standardmäßig deaktiviert.
 .
 Falls Sie wipl-client-inetd aktivieren möchten, bejahen Sie hier. Andernfalls verneinen Sie hier, damit wipl-client-inetd deaktiviert bleibt.
 .
 Auf jeden Fall sollten Sie einen Blick in /etc/hosts.allow und hosts.deny werfen.
";
$elem["wipl-client-inetd/enable-disable"]["descriptionfr"]="Souhaitez-vous activer wipl-client-inetd ?
 wipl-client-inetd permet à un client distant de se connecter à un serveur wipld local pour récupérer des statistiques. Puisque cela implique un certain nombre de problèmes de sécurité, wipl-client-inetd est désactivé par défaut.
 .
 Si vous souhaitez que wipl-client-inetd soit activé, veuillez acceptez ici. Sinon, refusez afin que wipl-client-inetd reste désactivé.
 .
 Quoi qu'il en soit, vous devriez vérifier /etc/hosts.allow et hosts.deny.
";
$elem["wipl-client-inetd/enable-disable"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
