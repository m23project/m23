<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("proftpd-basic");

$elem["shared/proftpd/inetd_or_standalone"]["type"]="select";
$elem["shared/proftpd/inetd_or_standalone"]["choices"][1]="from inetd";
$elem["shared/proftpd/inetd_or_standalone"]["choicesde"][1]="von Inetd";
$elem["shared/proftpd/inetd_or_standalone"]["choicesfr"][1]="Depuis inetd";
$elem["shared/proftpd/inetd_or_standalone"]["description"]="Run proftpd:
 ProFTPd can be run either as a service from inetd, or as a standalone
 server. Each choice has its own benefits. With only a few FTP
 connections per day, it is probably better to run ProFTPd from inetd in
 order to save resources.
 .
 On the other hand, with higher traffic,
 ProFTPd should run as a standalone server to avoid spawning a new
 process for each incoming connection.
";
$elem["shared/proftpd/inetd_or_standalone"]["descriptionde"]="Proftpd starten:
 ProFTPd kann entweder als Dienst über Inetd oder als eigener Server gestartet werden. Jede der beiden Startarten hat ihre Vorteile. Falls Sie nur wenige FTP-Verbindungen täglich erwarten, dann ist es wahrscheinlich sinnvoller, ProFTPd mittels Inetd zu starten, um Ressourcen zu schonen.
 .
 Andererseits sollte ProFTPd als eigener Server betrieben werden, falls Sie viel Verkehr erwarten, um das Starten neuer Prozesse für jede eingehende Verbindung zu vermeiden.
";
$elem["shared/proftpd/inetd_or_standalone"]["descriptionfr"]="Lancement de proftpd :
 ProFTPd peut être lancé soit en tant que service depuis inetd, soit comme un serveur indépendant. Chaque méthode a ses avantages. Pour quelques connexions par jour, il est suggéré de lancer ProFTPd depuis inetd afin de préserver les ressources du système.
 .
 Au contraire, avec un trafic plus important, il est recommandé d'exécuter ProFTPd indépendamment pour éviter de démarrer un nouveau processus pour chaque connexion entrante.
";
$elem["shared/proftpd/inetd_or_standalone"]["default"]="standalone";
PKG_OptionPageTail2($elem);
?>
