<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mono-xsp4");

$elem["xsp4/xsp4_autostart"]["type"]="boolean";
$elem["xsp4/xsp4_autostart"]["description"]="Start on boot?
 If this is true, then XSP4 will automatically start when the computer
 is turned on.
";
$elem["xsp4/xsp4_autostart"]["descriptionde"]="Beim Systemstart starten?
 Falls dies stimmt, wird XSP4 automatisch gestartet, wenn der Computer eingeschaltet wird.
";
$elem["xsp4/xsp4_autostart"]["descriptionfr"]="";
$elem["xsp4/xsp4_autostart"]["default"]="true";
$elem["xsp4/xsp4_bind"]["type"]="string";
$elem["xsp4/xsp4_bind"]["description"]="Bind to address:
 To function properly, XSP4 needs to be bound to an IP address. The
 default (\"0.0.0.0\") binds to all addresses of the server, but a
 specific port can be selected. To use XSP4 only locally, use
 \"127.0.0.1\" for the address.
";
$elem["xsp4/xsp4_bind"]["descriptionde"]="An Adresse binden:
 Um korrekt zu funktionieren, muss XSP4 sich an eine IP-Adresse binden. Der Standard (»0.0.0.0«) bindet sich an alle Adressen auf dem Server, aber ein spezieller Port kann ausgewählt werden. Um XSP4 lokal zu verwenden, verwenden Sie »127.0.0.1« als Adresse.
";
$elem["xsp4/xsp4_bind"]["descriptionfr"]="";
$elem["xsp4/xsp4_bind"]["default"]="0.0.0.0";
$elem["xsp4/xsp4_port"]["type"]="string";
$elem["xsp4/xsp4_port"]["description"]="Bind to port:
 XSP is bound to a specific port on the server. Common values are 80,
 8080, or 8081.
";
$elem["xsp4/xsp4_port"]["descriptionde"]="An Port binden:
 XSP wird an einen speziellen Port auf dem Server gebunden. Typische Werte sind 80, 8080 oder 8081.
";
$elem["xsp4/xsp4_port"]["descriptionfr"]="Port auquel le processus doit être lié :
 XSP doit être lié a un port particulier du serveur. Des valeurs courantes sont 80, 8080 et 8081.
";
$elem["xsp4/xsp4_port"]["default"]="8084";
$elem["xsp4/xsp1_upgrade_warning"]["type"]="note";
$elem["xsp4/xsp1_upgrade_warning"]["description"]="ASP.NET 1.0 support removed
 You appear to have some ASP.NET 1.0 sites configured in /etc/mono-server1.
 Support for the 1.0 profile has been removed from Mono 2.8 and above, and
 you are no longer able to serve ASP.NET 1.0 sites. You must reconfigure
 XSP to serve these sites using either 2.0 or 4.0 profiles, assuming your
 application is compatible. Please see mono-xsp2-admin(8) or 
 mono-xsp4-admin(8) to see how to regenerate a configuration for use  
 with 2.0 or 4.0 profiles.
";
$elem["xsp4/xsp1_upgrade_warning"]["descriptionde"]="ASP.NET 1.0-Unterstützung wurde entfernt
 Es scheint, dass Sie einige ASP.NET-1.0-Sites in /etc/mono-server1 konfiguriert haben. Die Unterstützung für 1.0-Profile wurde aus Mono 2.8 und neuer entfernt und damit können ASP.NET-1.0-Sites nicht länger bedient werden. Sie müssen XSP neu konfigurieren, damit diese Sites mit entweder 2.0- oder 4.0-Profilen bedient werden (wenn Ihre Anwendung kompatibel ist). Bitte lesen Sie mono-xsp2-admin(8) oder mono-xsp4-admin(8), um zu erfahren, wie Sie eine Konfiguration für 2.0- oder 4.0-Profile regenerieren.
";
$elem["xsp4/xsp1_upgrade_warning"]["descriptionfr"]="";
$elem["xsp4/xsp1_upgrade_warning"]["default"]="";
PKG_OptionPageTail2($elem);
?>
