<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ircd-hybrid");

$elem["ircd-hybrid/restart_on_upgrade"]["type"]="boolean";
$elem["ircd-hybrid/restart_on_upgrade"]["description"]="Restart ircd-hybrid on each upgrade?
 Please choose whether the ircd-hybrid daemon should be restarted
 every time a new version of this package is installed.
 .
 Automatic restarts may be problematic if, for instance, the server is
 running with manually loaded modules, which will need to be reloaded
 after the restart.
 .
 If you reject this option, you will have to restart ircd-hybrid via
 \"service ircd-hybrid restart\" when needed.
";
$elem["ircd-hybrid/restart_on_upgrade"]["descriptionde"]="Ircd-hybrid bei jedem Upgrade neu starten?
 Bitte wählen Sie aus, ob der Ircd-hybrid-Daemon bei jeder Installation einer neuen Version dieses Pakets neu gestartet werden soll.
 .
 Automatische Neustarts sind problematisch, falls beispielsweise der Server mit manuell geladenen Modulen ausgeführt wird, die nach jedem Neustart neu geladen werden müssen.
 .
 Falls Sie diese Option ablehnen, müssen Sie Ircd-hybrid bei Bedarf neu starten, indem Sie »service ircd-hybrid restart« eingeben.
";
$elem["ircd-hybrid/restart_on_upgrade"]["descriptionfr"]="Faut-il redémarrer ircd-hybrid à chaque mise à niveau ?
 Veuillez choisir si le démon ircd-hybrid doit être redémarré à chaque installation d'une nouvelle version de ce paquet.
 .
 De tels redémarrages peuvent poser problème si, par exemple, le serveur utilise des modules chargés manuellement. Ces modules doivent alors être relancés après le redémarrage.
 .
 Si vous refusez cette option, vous devrez redémarrer vous-même ircd-hybrid après une mise à jour, en utilisant la commande « service ircd-hybrid restart ».
";
$elem["ircd-hybrid/restart_on_upgrade"]["default"]="true";
$elem["ircd-hybrid/upgrade_secure_links_warn"]["type"]="boolean";
$elem["ircd-hybrid/upgrade_secure_links_warn"]["description"]="Upgrade ircd-hybrid to version without cryptlink support?
 The 8.x version of ircd-hybrid includes a change to the way secure server
 links are implemented, which is not backwards-compatible with ircd-hybrid 7.x,
 from which you are upgrading.
 .
 If you have any secure server links (cryptlinks) configured with this
 server, you should plan to either upgrade all servers in lock-step, or
 temporarily configure non-cryptlink server links, to ensure the continuity
 of your IRC links.
";
$elem["ircd-hybrid/upgrade_secure_links_warn"]["descriptionde"]="Upgrade von Ircd-hybrid auf eine Version ohne Cryptlink-Unterstützung?
 Die 8.x-Version von Ircd-Hybrid enthält eine Änderung bezüglich der Art, in der sichere Server-Verbindungen implementiert sind. Diese ist nicht mit Ircd-Hybrid 7.x, von der Sie ein Upgrade durchführen, kompatibel.
 .
 Falls Sie für diesen Server irgendwelche sicheren Server-Verbindungen (Cryptlinks) konfiguriert haben, sollten Sie entweder ein Upgrade aller Server auf einmal durchführen oder temporär Server-Verbindungen ohne Cryptlinks konfigurieren, um die Kontinuität Ihrer IRC-Verbindungen sicherzustellen.
";
$elem["ircd-hybrid/upgrade_secure_links_warn"]["descriptionfr"]="Faut-il mettre à jour ircd-hybrid avec une version sans gestion de « cryptlink » ?
 La version 8.x de ircd-hybrid modifie la gestion des liens sécurisés vers le serveur. Ce fonctionnement n'est pas compatible avec la version 7.x qui est en train d'être mise à jour.
 .
 Si vous utilisez des liens serveur sécurisés (« cryptlinks »), vous devriez prévoir de mettre tous les serveurs à jour en mode verrouillé (« lock-step ») ou de temporairement configurer des liens non sécurisés, afin de garantir la continuité de service entre les liens IRC.
";
$elem["ircd-hybrid/upgrade_secure_links_warn"]["default"]="true";
$elem["ircd-hybrid/upgrade_no_services_warn"]["type"]="boolean";
$elem["ircd-hybrid/upgrade_no_services_warn"]["description"]="Upgrade ircd-hybrid to version without compatible services?
 The 8.x version of ircd-hybrid includes a change to the way services are
 supported, losing compatibility with hybserv.
 .
 The recommended services daemon for Hybrid 8 is Anope, for which no
 package is available yet, although one is planned.
";
$elem["ircd-hybrid/upgrade_no_services_warn"]["descriptionde"]="Upgrade von Ircd-Hybrid auf eine Version ohne kompatible Dienste durchführen?
 Die 8.x-Version von Ircd-Hybrid enthält eine Änderung bezüglich der Art, in der Dienste unterstützt werden. Dadurch besteht keine Kompatibilität mit Hybserv mehr.
 .
 Der empfohlene Dienste-Daemon für Hybrid 8 ist Anope, für das ein Paket geplant, aber noch nicht verfügbar ist.
";
$elem["ircd-hybrid/upgrade_no_services_warn"]["descriptionfr"]="Faut-il mettre à jour ircd-hybrid avec des services incompatibles ?
 La version 8.x d'ircd-hybrid modifie le mode de gestion des services et n'est plus compatible avec hybserv.
 .
 Le démon de gestion de services recommandé avec Hybrid 8 est Anope. Il n'existe pas encore de paquet pour ce démon.
";
$elem["ircd-hybrid/upgrade_no_services_warn"]["default"]="true";
$elem["ircd-hybrid/upgrade_to_nossl_warn"]["type"]="boolean";
$elem["ircd-hybrid/upgrade_to_nossl_warn"]["description"]="Upgrade ircd-hybrid to version without SSL support?
 The currently installed version of this package is one with \"ssl\" in the
 version number, which suggests that it is a locally compiled package with
 SSL support. If this is the case, you probably don't want to install this
 package but instead rebuild the SSL version following the instructions in
 /usr/share/doc/ircd-hybrid/README.SSL.
";
$elem["ircd-hybrid/upgrade_to_nossl_warn"]["descriptionde"]="Upgrade von Ircd-hybrid auf eine Version ohne SSL-Unterstützung?
 Die korrekt installierte Version dieses Paket enthält »ssl« in der Versionsnummer. Das deutet an, dass es sich hierbei um ein lokal übersetztes Paket mit SSL-Unterstützung handelt. Falls dies der Fall ist, möchten Sie wahrscheinlich nicht dieses Paket installieren sondern stattdessen die SSL-Version neu bauen. Folgen Sie dafür den Anweisungen in /usr/share/doc/ircd-hybrid/README.SSL.
";
$elem["ircd-hybrid/upgrade_to_nossl_warn"]["descriptionfr"]="Faut-il mettre à jour ircd-hybrid avec une version sans gestion de SSL ?
 La version actuellement installée d'ircd-hybrid comporte la mention « ssl » dans le nom du paquet, ce qui suggère qu'il s'agit d'un paquet local incluant la gestion SSL. Si c'est le cas, vous ne souhaitez probablement pas installer ce paquet, mais plutôt reconstruire la version SSL à l'aide des instructions du document /usr/share/doc/ircd-hybrid/README.SSL.
";
$elem["ircd-hybrid/upgrade_to_nossl_warn"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
