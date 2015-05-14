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
 Die Debian-Version von mono-apache-server4 enthält ein Skript mono-server-update, das eine Konfigurationsdatei für Apache erstellt, um die ASP.NET-Anwendungen zu starten. mono-server-update kann Apache neustarten, falls es eine neue Konfigurationsdatei (/etc/mono-server/mono-server-hosts.conf) gibt. Falls dies stimmt, dann wird Apache neu gestartet, wenn es eine neue mono-server-hosts.conf-Datei gibt.
";
$elem["monoserver4/monoserver4_restartapache"]["descriptionfr"]="Faut-il laisser mono-apache-server4 redémarrer Apache ?
 La version Debian de mono-apache-server4 contient le script mono-server4-update qui crée un fichier de configuration pour Apache, servant à lancer les applications ASP.NET. Ce script peut redémarrer Apache s'il existe un nouveau fichier de configuration /etc/mono-server/mono-server4-hosts.conf.
";
$elem["monoserver4/monoserver4_restartapache"]["default"]="true";
$elem["monoserver4/monoserver1_upgrade_warning"]["type"]="note";
$elem["monoserver4/monoserver1_upgrade_warning"]["description"]="ASP.NET 1.0 support removed
 You appear to have some ASP.NET 1.0 sites configured in /etc/mono-server1.
 Support for the 1.0 profile has been removed from Mono 2.8 and above, and
 you are no longer able to serve ASP.NET 1.0 sites. You must reconfigure
 XSP to serve these sites using either 2.0 or 4.0 profiles, assuming your
 application is compatible. Please see mono-server2-admin(8) or
 mono-server4-admin(8) to see how to regenerate a configuration for use
 with 2.0 or 4.0 profiles.
";
$elem["monoserver4/monoserver1_upgrade_warning"]["descriptionde"]="ASP.NET 1.0-Unterstützung wurde entfernt
 Es scheint, dass Sie einige ASP.NET-1.0-Sites in /etc/mono-server1 konfiguriert haben. Die Unterstützung für 1.0-Profile wurde aus Mono 2.8 und neuer entfernt und damit können ASP.NET-1.0-Sites nicht länger bedient werden. Sie müssen XSP neu konfigurieren, damit diese Sites mit entweder 2.0- oder 4.0-Profilen bedient werden (wenn Ihre Anwendung kompatibel ist). Bitte lesen Sie mono-server2-admin(8) oder mono-server4-admin(8), um zu erfahren, wie Sie eine Konfiguration für 2.0- oder 4.0-Profile regenerieren.
";
$elem["monoserver4/monoserver1_upgrade_warning"]["descriptionfr"]="Prise en charge d'ASP.NET 1.0 supprimée
 Certains sites ASP.NET 1.0 semblent configurés dans /etc/mono-server1. La prise en charge du profil 1.0 a été supprimée de Mono depuis la version 2.8, et les sites ASP.NET 1.0 ne peuvent plus être servis. XSP doit être reconfiguré pour servir ces sites en utilisant les profils 2.0 ou 4.0, si les applications sont compatibles. Veuillez consulter mono-server2-admin(8) ou mono-server4-admin(8) pour une explication sur la façon de remettre en place une configuration utilisable avec les profils 2.0 ou 4.0.
";
$elem["monoserver4/monoserver1_upgrade_warning"]["default"]="";
PKG_OptionPageTail2($elem);
?>
