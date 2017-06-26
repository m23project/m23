<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("distributed-net");

$elem["distributed-net/fullconfig"]["type"]="boolean";
$elem["distributed-net/fullconfig"]["description"]="Run the distributed.net client configuration utility?
 The distributed.net client needs to be configured before it can be used.
 While most options have reasonable defaults, you need to specify the e-mail
 address to which you would like distributed.net to credit any work done by
 the client. If you are installing the distributed-net package for the first
 time, then you must configure the client, otherwise the distributed.net client
 will refuse to start.
 .
 When the distributed.net client is run as a daemon (via /etc/init.d/distributed-net),
 the output will be redirected to /var/log/distributed-net.log. You do not
 need to set up a log file. Since the init script is controlling the
 distributed.net client, you should not enable \"quiet mode\" as that breaks the
 init script.
";
$elem["distributed-net/fullconfig"]["descriptionde"]="Soll das Konfigurationshilfsprogramm des Clients von Distributed.net ausgeführt werden?
 Der Distributed.net-Client muss vor der Benutzung konfiguriert werden. Obwohl die meisten Optionen vernünftige Voreinstellungen haben, müssen Sie die E-Mail-Adresse angeben, der Distributed.net alle durch den Client verrichtete Arbeit zuschreiben soll. Falls Sie das Paket »distributed-net« zum ersten Mal installieren, müssen Sie den Client konfigurieren, ansonsten wird er sich weigern zu starten.
 .
 Wenn der Distributed.net-Client als Daemon ausgeführt wird (mittels /etc/init.d/distributed-net), wird die Ausgabe an /var/log/distributed-net.log weitergeleitet. Sie müssen keine Protokolldatei einrichten. Weil das Init-Skript den Distributed.net-Client steuert, sollten Sie nicht den »stillen Modus« aktivieren, da er das Init-Skript abbricht.
";
$elem["distributed-net/fullconfig"]["descriptionfr"]="Faut-il exécuter l'utilitaire de configuration du client de distributed.net ?
 Le client de distributed.net doit être configuré avant de pouvoir être utilisé. Bien que la plupart des options ont des valeurs par défaut raisonnables, vous devez néanmoins indiquer une adresse électronique pour que tout travail effectué par le client puisse être crédité par distributed.net. Si c'est la première installation du paquet distributed-net, vous devez configurer le client, sans quoi il refusera de démarrer.
 .
 Quand le client de distributed.net est lancé en tant que démon (via /etc/init.d/distributed-net), la sortie est redirigée vers le fichier /var/log/distributed-net.log (qui n'a pas besoin d'être mis en place). Comme le script d'initialisation contrôle le client de distributed.net, vous ne devez pas activer le mode silencieux (quiet mode) puisque cela casse le script d'initialisation.
";
$elem["distributed-net/fullconfig"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
