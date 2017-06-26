<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mono-apache-server4");

$elem["monoserver4/monoserver4_restartapache"]["type"]="boolean";
$elem["monoserver4/monoserver4_restartapache"]["description"]="Let mono-apache-server4 restart Apache?
 The Debian version of mono-apache-server4 includes a
 mono-server4-update script that creates a configuration file for
 Apache to start the ASP.NET applications, and mono-server4-update can
 restart Apache if there's a new configuration file
 (/etc/mono-server4/mono-server-hosts.conf). If this is true, then
 Apache will be restarted when there is a new mono-server4-hosts.conf file.
";
$elem["monoserver4/monoserver4_restartapache"]["descriptionde"]="Soll mono-apache-server4 Apache neustarten?
 Die Debian-Version von mono-apache-server4 enthält ein Skript mono-server4-update, das eine Konfigurationsdatei für Apache erstellt, um die ASP.NET-Anwendungen zu starten. mono-server4-update kann Apache neustarten, falls es eine neue Konfigurationsdatei (/etc/mono-server4/mono-server-hosts.conf) gibt. Falls dies stimmt, wird Apache neugestartet, wenn es eine neue mono-server4-hosts.conf-Datei gibt.
";
$elem["monoserver4/monoserver4_restartapache"]["descriptionfr"]="Faut-il laisser mono-apache-server4 redémarrer Apache ?
 La version Debian de mono-apache-server4 contient le script mono-server4-update qui crée un fichier de configuration pour Apache, servant à lancer les applications ASP.NET. Ce script peut redémarrer Apache s'il existe un nouveau fichier de configuration /etc/mono-server/mono-server4-hosts.conf.
";
$elem["monoserver4/monoserver4_restartapache"]["default"]="true";
$elem["monoserver4/monoserver1_upgrade_warning"]["type"]="note";
$elem["monoserver4/monoserver1_upgrade_warning"]["description"]="ASP.NET 1.0 support removed
 You appear to have some ASP.NET 1.0 sites configured in /etc/mono-server.
 Support for the 1.0 profile has been removed from Mono 2.8 and above, and
 you are no longer able to serve ASP.NET 1.0 sites. You must reconfigure
 XSP to serve these sites using the 4.0 profile, assuming your application
 is compatible. Please see mono-server4-admin(8) to see how to regenerate
 a configuration for use with the 4.0 profile.
";
$elem["monoserver4/monoserver1_upgrade_warning"]["descriptionde"]="ASP.NET 1.0-Unterstützung wurde entfernt
 Es scheint, dass Sie einige ASP.NET-1.0-Sites in /etc/mono-server konfiguriert haben. Die Unterstützung für das 1.0-Profil wurde aus Mono 2.8 und neuer entfernt und damit können ASP.NET-1.0-Sites nicht mehr bedient werden. Sie müssen XSP neu konfigurieren, damit diese Sites mit dem 4.0-Profil bedient werden (wenn Ihre Anwendung kompatibel ist). Bitte lesen Sie mono-server4-admin(8), um zu erfahren, wie Sie eine Konfiguration für das 4.0-Profil regenerieren.
";
$elem["monoserver4/monoserver1_upgrade_warning"]["descriptionfr"]="";
$elem["monoserver4/monoserver1_upgrade_warning"]["default"]="";
$elem["monoserver4/monoserver2_upgrade_warning"]["type"]="note";
$elem["monoserver4/monoserver2_upgrade_warning"]["description"]="ASP.NET 2.0 support removed
 You appear to have some ASP.NET 2.0 sites configured in /etc/mono-server.
 Support for the 1.0 profile has been removed from Mono 4.0 and above, and
 you are no longer able to serve ASP.NET 2.0 sites. You must reconfigure
 XSP to serve these sites using the 4.0 profile, assuming your application
 is compatible. Please see mono-server4-admin(8) to see how to regenerate
 a configuration for use with the 4.0 profile.
";
$elem["monoserver4/monoserver2_upgrade_warning"]["descriptionde"]="ASP.NET 2.0-Unterstützung wurde entfernt
 Es scheint, dass Sie einige ASP.NET-2.0-Sites in /etc/mono-server konfiguriert haben. Die Unterstützung für das 1.0-Profil wurde aus Mono 4.0 und neuer entfernt und damit können ASP.NET-2.0-Sites nicht mehr bedient werden. Sie müssen XSP neu konfigurieren, damit diese Sites mit dem 4.0-Profil bedient werden (wenn Ihre Anwendung kompatibel ist). Bitte lesen Sie mono-server4-admin(8), um zu erfahren, wie Sie eine Konfiguration für das 4.0-Profil regenerieren.
";
$elem["monoserver4/monoserver2_upgrade_warning"]["descriptionfr"]="";
$elem["monoserver4/monoserver2_upgrade_warning"]["default"]="";
PKG_OptionPageTail2($elem);
?>
