<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("minissdpd");

$elem["minissdpd/why_I_am_here"]["type"]="note";
$elem["minissdpd/why_I_am_here"]["description"]="MiniSSDP daemon configuration
 The MiniSSDP daemon is being installed (perhaps as a dependency for UPnP
 support) but will not function correctly until it is configured.
 .
 MiniSSDP is a daemon used by MiniUPnPc to speed up device discovery. For
 security reasons, no out-of-box default configuration can be provided, so it
 requires manual configuration.
 .
 Alternatively you can simply override the recommendation and remove MiniSSDP,
 or leave it unconfigured - it won't work, but MiniUPnPc (and UPnP
 applications) will still function properly despite some performance loss.
";
$elem["minissdpd/why_I_am_here"]["descriptionde"]="Konfiguration des MiniSSDP-Daemons
 Der MiniSSDP-Daemon wird installiert (vielleicht als eine Abhängigkeit zur UPnP-Unterstützung), wird aber nicht korrekt funktionieren, bis er konfiguriert wurde.
 .
 MiniSSDP ist ein von MiniUPnPc verwandter Daemon, um die Geräteerkennung zu beschleunigen. Aus Sicherheitsgründen kann keine Standardkonfiguration bereitgestellt werden, daher wird eine manuelle Konfiguration benötigt.
 .
 Alternativ können Sie auch einfach die Empfehlung außer Kraft setzen und MiniSSDP entfernen oder es unkonfiguriert lassen. Es wird nicht funktionieren, aber MiniUPnPc (und UPnP-Anwendungen) werden weiterhin, wenn auch mit Leistungsverlusten, korrekt funktionieren.
";
$elem["minissdpd/why_I_am_here"]["descriptionfr"]="";
$elem["minissdpd/why_I_am_here"]["default"]="";
$elem["minissdpd/start_daemon"]["type"]="boolean";
$elem["minissdpd/start_daemon"]["description"]="Start the MiniSSDP daemon automatically?
 Choose this option if the MiniSSDP daemon should start automatically,
 now and at boot time.
";
$elem["minissdpd/start_daemon"]["descriptionde"]="Den MiniSSDP-Daemon automatisch starten?
 Wählen Sie diese Option, falls der Daemon MiniSSDP jetzt und zum Systemstartzeitpunkt automatisch starten soll.
";
$elem["minissdpd/start_daemon"]["descriptionfr"]="Faut-il lancer le démon automatiquement ?
 Choisissez cette option si le démon MiniSSDP doit être lancé automatiquement, maintenant et à l'amorçage.
";
$elem["minissdpd/start_daemon"]["default"]="false";
$elem["minissdpd/listen"]["type"]="string";
$elem["minissdpd/listen"]["description"]="Interfaces to listen on for UPnP queries:
 The MiniSSDP daemon will listen for requests on one interface, and drop
 all queries that do not come from the local network. Please enter the LAN
 interfaces or IP addresses of those interfaces (in CIDR notation) that it
 should listen on, separated by space.
 .
 Interface names are highly preferred, and required if you plan to enable IPv6
 port forwarding.
";
$elem["minissdpd/listen"]["descriptionde"]="Schnittstellen, an denen auf UPnP-Anfragen gewartet werden soll:
 Der MiniSSDP-Daemon wird auf einer Schnittstelle auf Anfragen warten und alle Anfragen verwerfen, die nicht vom lokalen Netzwerk stammen. Bitte geben Sie die LAN-Schnittstellen oder die IP-Adressen dieser Schnittstellen (in CIDR-Notation) ein, an denen auf Anfragen gewartet werden soll. Trennen Sie die Einträge durch Leerzeichen.
 .
 Schnittstellennamen werden nachdrücklich bevorzugt. Falls Sie vorhaben, eine IPv6-Portweiterleitung zu aktivieren, sind dieser erforderlich.
";
$elem["minissdpd/listen"]["descriptionfr"]="";
$elem["minissdpd/listen"]["default"]="";
$elem["minissdpd/ip6"]["type"]="boolean";
$elem["minissdpd/ip6"]["description"]="Enable IPv6 listening?
 Please specify whether the MiniSSDP daemon should listen for IPv6 queries.
";
$elem["minissdpd/ip6"]["descriptionde"]="Auf IPv6-Anfragen warten?
 Bitte geben Sie an, ob der MiniSSDP-Daemon auf IPv6-Anfragen warten soll.
";
$elem["minissdpd/ip6"]["descriptionfr"]="Faut-il activer l'écoute d'IPv6 ?
 Veuillez indiquer si le démon MiniSSDP doit être à l'écoute de requêtes IPv6.
";
$elem["minissdpd/ip6"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
