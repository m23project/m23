<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xymon-client");

$elem["hobbit-client/HOBBITSERVERS"]["type"]="string";
$elem["hobbit-client/HOBBITSERVERS"]["description"]="Xymon server:
 Please enter the network address used to access the Xymon
 server(s). If you use multiple servers, use a space-separated list of
 addresses.
 .
 Using host names instead of IP addresses is discouraged in case the
 network experiences DNS failures.
";
$elem["hobbit-client/HOBBITSERVERS"]["descriptionde"]="Xymon-Server:
 Geben Sie die Adresse zum Zugriff auf den Xymon-Server ein. Wenn Sie mehrere Server benutzen, trennen Sie die Adressen mit Leerzeichen.
 .
 Es wird empfohlen im Falle von DNS-Ausfällen statt Hostnamen IP-Adressen zu benutzen.
";
$elem["hobbit-client/HOBBITSERVERS"]["descriptionfr"]="Serveur Xymon :
 Veuillez indiquer l'adresse du (ou des) serveur(s) Xymon. Les serveurs multiples éventuels doivent être séparés par des espaces.
 .
 Il est conseillé d'indiquer les adresses IP plutôt que les noms d'hôtes afin d'éviter des difficultés si la résolution de noms de domaine (DNS) ne fonctionne plus.
";
$elem["hobbit-client/HOBBITSERVERS"]["default"]="127.0.0.1";
$elem["hobbit-client/CLIENTHOSTNAME"]["type"]="string";
$elem["hobbit-client/CLIENTHOSTNAME"]["description"]="Client hostname:
 Please enter the host name used by the Xymon client when sending
 reports to the Xymon server. This name must match
 the name used in the hosts.cfg file on the Xymon
 server.
";
$elem["hobbit-client/CLIENTHOSTNAME"]["descriptionde"]="Client-Hostname:
 Geben Sie den Hostnamen ein den der Xymon-Client benutzt um Reports and den Xymon-Server zu senden. Der Name muss mit dem in der Datei hosts.cfg auf dem Server übereinstimmen.
";
$elem["hobbit-client/CLIENTHOSTNAME"]["descriptionfr"]="Nom d'hôte du client :
 Veuillez indiquer le nom d'hôte utilisé par le client Xymon pour envoyer les rapports au serveur Xymon. Ce nom doit correspondre à celui utilisé dans le fichier hosts.cfg sur le serveur Xymon.
";
$elem["hobbit-client/CLIENTHOSTNAME"]["default"]="Default:";
$elem["hobbit-client/automatic-xymon-migration"]["type"]="boolean";
$elem["hobbit-client/automatic-xymon-migration"]["description"]="Automatically migrate old hobbit files to xymon?
 The operating system user was renamed from \"hobbit\" to \"xymon\", and all
 configuration, state, log directories and files have been renamed as well.
 The package postinst scripts can do the migration automatically. This is
 usually a good idea, but might not work so well if your config differs
 substantially from the default.
";
$elem["hobbit-client/automatic-xymon-migration"]["descriptionde"]="Alte Dateien automatisch von hobbit auf xymon umstellen?
 Der Betriebssystem-User wurde von \"hobbit\" in \"xymon\" umbenannt, zusammen mit allen Konfigurations-, Zustands- und Log-Verzeichnissen und -Dateien. Das Postinst-Skript des Pakets kann die Migration automatisch durchführen. Das ist normalerweise eine gute Sache, kann aber ggf. nicht so gut funktionieren, wenn die Konfiguration stark von der Standardkonfiguration abweicht.
";
$elem["hobbit-client/automatic-xymon-migration"]["descriptionfr"]="Faut-il migrer automatiquement les anciens fichiers hobbit vers xymon ?
 L'utilisateur du système d'exploitation a été renommé de « hobbit » en « xymon » et l'ensemble des répertoires et fichiers de configuration, d'état et de journalisation ont également été renommés. Les scripts postinst du paquet peuvent réaliser cette migration automatiquement. C'est en général une bonne idée, mais cela ne marche pas très bien si votre configuration diffère sensiblement de la configuration par défaut.
";
$elem["hobbit-client/automatic-xymon-migration"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
