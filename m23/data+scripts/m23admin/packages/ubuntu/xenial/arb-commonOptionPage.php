<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("arb-common");

$elem["arb/group"]["type"]="multiselect";
$elem["arb/group"]["description"]="ARB PT-server administrators:
 The default configuration of PT-server slots in /etc/arb/arb_tcp.dat
 gives ARB three global slots accessible by all users (connecting to
 localhost:${PORT}), as well as three slots to give private per-user
 access (connecting to ~/.arb_pts/${USER}${NUMBER}.socket).
 .
 Only members of the \"arb\" system group will be able to build and update
 the shared PT-servers. Please enter the login names for these privileged
 users.
";
$elem["arb/group"]["descriptionde"]="ARB-PT-Serveradministratoren:
 Die Standardkonfiguration von PT-Server-Slots in /etc/arb/arb_tcp.dat gibt ARB drei globale Slots, auf die von allen Benutzern zugegriffen werden kann (verbinden mit Localhost:${PORT}) sowie drei Slots, um privaten Zugriff pro Benutzer zur Verfügung zu stellen (verbinden mit ~/.arb_pts/${USER}${NUMBER}.socket).
 .
 Nur Mitglieder der Systemgruppe »arb« werden in der Lage sein, die gemeinsam benutzten PT-Server zu bauen und zu aktualisieren. Bitte geben Sie die Anmeldenamen dieser privilegierten Benutzer an.
";
$elem["arb/group"]["descriptionfr"]="Administrateurs du serveur PT (positional tree) d'Arb :
 La configuration par défaut (/etc/arb/arb_tcp.dat) des créneaux du serveur PT donne à Arb trois créneaux globaux accessibles à tous les utilisateurs (connexion à localhost:${PORT}), ainsi que trois créneaux pour un accès privé par utilisateur (connexion sur ~/.arb_pts/${USER}{NUMBER}.socket).
 .
 Seuls les membres du groupe système « arb » peuvent construire et mettre à jour les serveurs PT partagés. Veuillez entrer les noms d'utilisateurs de ces utilisateurs privilégiés.
";
$elem["arb/group"]["default"]="";
PKG_OptionPageTail2($elem);
?>
