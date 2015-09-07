<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sslh");

$elem["sslh/inetd_or_standalone"]["type"]="select";
$elem["sslh/inetd_or_standalone"]["choices"][1]="from inetd";
$elem["sslh/inetd_or_standalone"]["choicesde"][1]="von »inetd«";
$elem["sslh/inetd_or_standalone"]["choicesfr"][1]="Depuis inetd";
$elem["sslh/inetd_or_standalone"]["description"]="Run sslh:
 sslh can be run either as a service from inetd, or as a standalone
 server. Each choice has its own benefits. With only a few connection
 per day, it is probably better to run sslh from inetd in
 order to save resources.
 .
 On the other hand, with many connections,
 sslh should run as a standalone server to avoid spawning a new
 process for each incoming connection.
";
$elem["sslh/inetd_or_standalone"]["descriptionde"]="»sslh« ausführen:
 »sslh« kann entweder als Service von »inetd« oder als eigenständiger Server ausgeführt werden. Jede Auswahl hat ihre eigenen Vorteile. Mit nur wenigen Verbindungen pro Tag ist es wahrscheinlich besser, »sslh« von »inetd« starten zu lassen, um Ressourcen zu sparen.
 .
 Andererseits sollte »sslh« bei vielen Verbindungen als eigenständiger Server laufen, um das Erzeugen neuer Prozesse für jede eingehende Verbindung zu vermeiden.
";
$elem["sslh/inetd_or_standalone"]["descriptionfr"]="Exécuter sslh :
 sslh peut être lancé soit en tant que service depuis inetd, soit comme un serveur indépendant. Chaque méthode a ses avantages. Pour quelques connexions par jour, il est suggéré de lancer sslh depuis inetd afin de préserver les ressources du système.
 .
 Au contraire, avec un trafic plus important, il est recommandé d'exécuter sslh indépendamment pour éviter de démarrer un nouveau processus pour chaque connexion entrante.
";
$elem["sslh/inetd_or_standalone"]["default"]="standalone";
PKG_OptionPageTail2($elem);
?>
