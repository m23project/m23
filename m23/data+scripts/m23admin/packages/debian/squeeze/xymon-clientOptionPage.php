<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xymon-client");

$elem["hobbit-client/HOBBITSERVERS"]["type"]="string";
$elem["hobbit-client/HOBBITSERVERS"]["description"]="Hobbit server:
 Please enter the network address used to access the Hobbit
 server(s). If you use multiple servers, use a space-separated list of
 addresses.
 .
 Using host names instead of IP addresses is discouraged in case the
 network experiences DNS failures.
";
$elem["hobbit-client/HOBBITSERVERS"]["descriptionde"]="Hobbit-Server:
 Geben Sie die Adresse zum Zugriff auf den Hobbit-Server ein. Wenn Sie mehrere Server benutzen, trennen Sie die Adressen mit Leerzeichen.
 .
 Es wird empfohlen im Falle von DNS-Ausfällen statt Hostnamen IP-Adressen zu benutzen.
";
$elem["hobbit-client/HOBBITSERVERS"]["descriptionfr"]="Serveur hobbit :
 Veuillez indiquer l'adresse du (ou des) serveur(s) Hobbit. Les serveurs multiples éventuels doivent être séparés par des espaces.
 .
 Il est conseillé d'indiquer les adresses IP plutôt que les noms d'hôtes afin d'éviter des difficulté si la résolution de noms de domaine (DNS) ne fonctionne plus.
";
$elem["hobbit-client/HOBBITSERVERS"]["default"]="127.0.0.1";
$elem["hobbit-client/CLIENTHOSTNAME"]["type"]="string";
$elem["hobbit-client/CLIENTHOSTNAME"]["description"]="Client hostname:
 Please enter the host name used by the Hobbit client when sending
 reports to the Hobbit server. This name must match
 the name used in the bb-hosts file on the Hobbit
 server.
";
$elem["hobbit-client/CLIENTHOSTNAME"]["descriptionde"]="Client-Hostname:
 Geben Sie den Hostnamen ein den der Hobbit-Client benutzt um Reports and den Hobbit-Server zu senden. Der Name muss mit dem in der Datei bb-hosts auf dem Server übereinstimmen.
";
$elem["hobbit-client/CLIENTHOSTNAME"]["descriptionfr"]="Nom d'hôte du client :
 Veuillez indiquer le nom d'hôte utilisé par le client Hobbit pour envoyer les rapports au serveur Hobbit. Ce nom doit correpondre à celui utilisé dans le fichier bb-hosts sur le serveur Hobbit.
";
$elem["hobbit-client/CLIENTHOSTNAME"]["default"]="Default:";
PKG_OptionPageTail2($elem);
?>
