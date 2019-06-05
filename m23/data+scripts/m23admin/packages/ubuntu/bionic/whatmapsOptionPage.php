<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("whatmaps");

$elem["whatmaps/enable_service_restarts"]["type"]="boolean";
$elem["whatmaps/enable_service_restarts"]["description"]="Automatically restart services after library security updates?
 Services need to be restarted to benefit from updates of shared libraries they
 depend on. Otherwise they remain vulnerable to security bugs fixed in these
 updates.
 .
 Automatic service restarts are only done if APT fetched the library from a
 source providing security updates. This also affects packages installed
 via \"unattended-upgrades\".
";
$elem["whatmaps/enable_service_restarts"]["descriptionde"]="Sollen die Dienste nach den Sicherheitsaktualisierungen der Bibliotheken automatisch neu gestartet werden?
 Dienste müssen neu gestartet werden, damit ihnen die Aktualisierungen der gemeinsam benutzen Bibliotheken zugute kommen, von denen sie abhängen. Andernfalls bleiben sie für sicherheitskritische Fehler verwundbar, die in diesen Aktualisierungen behoben wurden.
 .
 Dienste werden nur dann automatisch neu gestartet, wenn APT die Bibliothek von einer Quelle bezogen hat, die Sicherheitsaktualisierungen bereitstellt. Dies betrifft auch Pakete, die per »unattended-upgrades« installiert wurden.
";
$elem["whatmaps/enable_service_restarts"]["descriptionfr"]="Redémarrer les services après les mises à jour de sécurité des bibliothèques ?
 Les services doivent être redémarrés pour bénéficier des mises à jour des bibliothèques partagées dont ils dépendent. Dans le cas contraire, ils restent vulnérables aux bogues de sécurité corrigés par ces mises à jour.
 .
 Le redémarrage automatique des services ne se produit que si APT récupère les bibliothèques d'une source offrant des mises à jour de sécurité. Cela affecte aussi les paquets installés par l'intermédiaire d'« unattended-upgrades ».
";
$elem["whatmaps/enable_service_restarts"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
