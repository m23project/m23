<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nsca");

$elem["nsca/run-nsca-daemon"]["type"]="boolean";
$elem["nsca/run-nsca-daemon"]["description"]="Should the nsca daemon be enabled by default?
 The nsca daemon is the process that handles results service checks sent
 via send_nsca on remote hosts.  Typically the nsca daemon is only needed
 on hosts that run the nagios daemon.
 .
 If the system on which you are installing nsca also runs the nagios
 daemon, you should most likely choose this option.  If you are installing
 nsca on a remote \"satellite\" system for the purpose of sending service
 checks to a central nagios host, you should not choose this option.  If
 you wish to run nsca as a service through inetd/xinetd, you should
 also not choose this option.
";
$elem["nsca/run-nsca-daemon"]["descriptionde"]="Soll der Nsca-Daemon standardmäßig aktiviert werden?
 Der Nsca-Daemon ist der Prozess, der die Ergebnisse der Dienste-Überprüfungen, die über send_nsca auf den entfernten Rechnern versandt wurden, verarbeitet. Typischerweise wird der Nsca-Daemon nur auf Rechnern benötigt, auf denen der Nagios-Daemon läuft.
 .
 Falls auf dem System, auf dem Sie Nsca installieren, auch der Nagios-Daemon läuft, sollten Sie höchstwahrscheinlich diese Option wählen. Falls Sie Nsca auf einem entfernten »Satelliten«-System zum Zweck des Versands von Diensteprüfungen an einen zentralen Nagios-Rechner installieren, sollten Sie diese Option nicht wählen. Falls Sie Nsca als Dienst über Inetd/Xinetd betreiben möchten, sollten Sie diese Option auch nicht wählen.
";
$elem["nsca/run-nsca-daemon"]["descriptionfr"]="Faut-il que le démon nsca soit activé par défaut ?
 Le démon nsca est le processus qui traite les résultats des requêtes de contrôle de service envoyées via « send_nsca » vers des hôtes distants. Le démon nsca est nécessaire essentiellement sur les machines qui hébergent un démon nagios.
 .
 Si le système sur lequel vous installez nsca exécute également le démon nagios, vous devriez choisir cette option. Ne la choisissez pas si vous installez nsca sur un « satellite » distant dans le but de tester les services d'un hôte nagios. Si vous souhaitez exécuter nsca via inetd ou xinetd, ne choisissez pas cette option.
";
$elem["nsca/run-nsca-daemon"]["default"]="";
PKG_OptionPageTail2($elem);
?>
