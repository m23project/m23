<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mono-apache-server2");

$elem["monoserver2/monoserver2_restartapache"]["type"]="boolean";
$elem["monoserver2/monoserver2_restartapache"]["description"]="Let mono-apache-server2 restart Apache?
 The Debian version of mono-apache-server2 includes a
 mono-server2-update script that creates a configuration file for
 apache to start the ASP.NET applications, and mono-server2-update can
 restart apache if there's a new configuration file
 (/etc/mono-server2/mono-server2-hosts.conf). If this is true, then
 apache will be restarted when there is a new mono-server2-hosts.conf file.
";
$elem["monoserver2/monoserver2_restartapache"]["descriptionde"]="Soll mono-apache-server2 Apache neustarten?
 Die Debian-Version von mono-apache-server2 enthält ein Skript mono-server2-update, das eine Konfigurationsdatei für Apache erstellt, um die ASP.NET-Anwendungen zu starten. mono-server2-update kann Apache neustarten, falls es eine neue Konfigurationsdatei (/etc/mono-server2/mono-server2-hosts.conf) gibt. Falls dies stimmt, dann wird Apache neu gestartet, wenn es eine neue mono-server2-hosts.conf-Datei gibt.
";
$elem["monoserver2/monoserver2_restartapache"]["descriptionfr"]="Faut-il laisser mono-apache-server2 redémarrer Apache ?
 La version Debian de mono-apache-server2 comporte le script mono-server2-update qui crée un fichier de configuration pour Apache, servant à lancer les applications ASP.NET. Ce script peut redémarrer Apache s'il existe un nouveau fichier de configuration /etc/mono-server2/mono-server2-hosts.conf.
";
$elem["monoserver2/monoserver2_restartapache"]["default"]="true";
$elem["monoserver2/monoserver1_upgrade_warning"]["type"]="note";
$elem["monoserver2/monoserver1_upgrade_warning"]["description"]="ASP.NET 1.0 support removed
 You appear to have some ASP.NET 1.0 sites configured in /etc/mono-server1.
 Support for the 1.0 profile has been removed from Mono 2.8 and above, and
 you are no longer able to serve ASP.NET 1.0 sites. You must reconfigure
 XSP to serve these sites using either 2.0 or 4.0 profiles, assuming your
 application is compatible. Please see mono-server2-admin(8) or 
 mono-server4-admin(8) to see how to regenerate a configuration for use
 with 2.0 or 4.0 profiles.
";
$elem["monoserver2/monoserver1_upgrade_warning"]["descriptionde"]="ASP.NET 1.0-Unterstützung wurde entfernt
 Es scheint, dass Sie einige ASP.NET-1.0-Sites in /etc/mono-server1 konfiguriert haben. Die Unterstützung für 1.0-Profile wurde aus Mono 2.8 und neuer entfernt und damit können ASP.NET-1.0-Sites nicht länger bedient werden. Sie müssen XSP neu konfigurieren, damit diese Sites mit entweder 2.0- oder 4.0-Profilen bedient werden (wenn Ihre Anwendung kompatibel ist). Bitte lesen Sie mono-server2-admin(8) oder mono-server4-admin(8), um zu erfahren, wie Sie eine Konfiguration für 2.0- oder 4.0-Profile regenerieren.
";
$elem["monoserver2/monoserver1_upgrade_warning"]["descriptionfr"]="";
$elem["monoserver2/monoserver1_upgrade_warning"]["default"]="";
PKG_OptionPageTail2($elem);
?>
