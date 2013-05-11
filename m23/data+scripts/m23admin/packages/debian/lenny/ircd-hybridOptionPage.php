<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ircd-hybrid");

$elem["ircd-hybrid/no-more-ssl"]["type"]="boolean";
$elem["ircd-hybrid/no-more-ssl"]["description"]="All OpenSSL support is now disabled by default; continue?
 Due to licensing issues ircd-hybrid is no longer built by default with
 OpenSSL. This will be addressed in a future release, pending a rewrite
 of the SSL layer with GNUTLS.
 .
 If any of your existing server links take advantage of cryptlinks, refer
 to /usr/share/doc/ircd-hybrid/CRYPTLINKS.txt to find out how to build
 ircd-hybrid with SSL support (easily.)
";
$elem["ircd-hybrid/no-more-ssl"]["descriptionde"]="Jegliche Unterstützung für OpenSSL ist nun standardmäßig ausgeschaltet. Fortfahren?
 Aus Lizenzgründen wird Ircd-hybrid standardmäßig nicht mehr mit OpenSSL gebaut. Dieses Problem wird in einer zukünftigen Veröffentlichung angegangen, da hierfür zuerst die SSL-Schicht mittels GNUTLS neugeschrieben werden muss.
 .
 Sollte eine Ihrer vorhandenen Server-Anbindungen cryptlinks verwenden, dann lesen Sie bitte /usr/share/doc/ircd-hybrid/CRYPTLINKS.txt, um herauszufinden, wie Sie Ircd-hybrid (auf einfache Art) mit SSL-Unterstützung bauen können.
";
$elem["ircd-hybrid/no-more-ssl"]["descriptionfr"]="Faut-il continuer la configuration même sans la gestion d'OpenSSL ?
 En raison de problèmes de licences, ircd-hybrid n'est plus fourni par défaut avec la gestion d'OpenSSL. Celle-ci sera réintégrée dans une prochaine version, qui utilisera la réécriture de la couche SSL par GNUTLS.
 .
 Si l'un de vos serveurs existants utilise des liens chiffrés, veuillez consulter le fichier /usr/share/doc/ircd-hybrid/CRYPTLINKS.txt pour savoir comment compiler (facilement) ircd-hybrid avec la gestion de SSL.
";
$elem["ircd-hybrid/no-more-ssl"]["default"]="true";
$elem["ircd-hybrid/restart_on_upgrade"]["type"]="boolean";
$elem["ircd-hybrid/restart_on_upgrade"]["description"]="Restart ircd-hybrid on each upgrade?
 You may choose whether or not you want to restart the ircd-hybrid
 daemon every time you install a new version of this package.
 .
 Sometimes, you do not want to do this. For instance, if you are doing
 the upgrade and loading IRCd modules at runtime. Failing to restart
 the daemon would probably lead you to problems.
 .
 If you refuse, you have to restart ircd-hybrid yourself if you
 upgraded, by typing `invoke-rc.d ircd-hybrid restart' whenever it
 suits you.
";
$elem["ircd-hybrid/restart_on_upgrade"]["descriptionde"]="Ircd-hybrid bei jedem Upgrade neu starten?
 Sie können sich entscheiden, ob Sie wollen, dass der Ircd-hybrid-Daemon bei jeder Installation einer neuen Version dieses Pakets neu gestartet wird.
 .
 Manchmal möchten Sie das nicht tun. Beispielsweise, falls Sie das Upgrade durchführen und IRCd-Module zur Laufzeit laden. Wird der Daemon nicht neu gestartet, würde dies wahrscheinlich zu Problemen führen.
 .
 Wenn Sie dies ablehnen, müssen Sie Ircd-hybrid beim Upgrade selbst neu starten, indem Sie zu einem passenden Zeitpunkt »invoke-rc.d ircd-hybrid restart« eingeben.
";
$elem["ircd-hybrid/restart_on_upgrade"]["descriptionfr"]="Faut-il redémarrer ircd-hybrid à chaque mise à niveau ?
 Il est possible de redémarrer le démon ircd-hybrid à chaque installation d'une nouvelle version de ce paquet.
 .
 Dans certains cas, par exemple si vous mettez à jour et chargez des modules du serveur IRC pendant son fonctionnement, il peut être préférable de ne pas utiliser de redémarrage automatique, car un échec provoquerait probablement des problèmes.
 .
 Si vous refusez cette option, vous devrez redémarrer vous-même ircd-hybrid après une mise à jour, en utilisant la commande « invoke-rc.d ircd-hybrid restart » au moment désiré.
";
$elem["ircd-hybrid/restart_on_upgrade"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
