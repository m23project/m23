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
 Die Debian-Version von mono-apache-server2 enthält ein Skript mono-server2-update, das eine Konfigurationsdatei für Apache erstellt, um die ASP.NET-Anwendungen zu starten und mono-server2-update kann Apache neustarten, falls es eine neue Konfigurationsdatei (/etc/mono-server2/mono-server2-hosts.conf) gibt. Falls dies stimmt, dann wird Apache neu gestartet, wenn es eine neue mono-server2-hosts.conf-Datei gibt.
";
$elem["monoserver2/monoserver2_restartapache"]["descriptionfr"]="Faut-il laisser mono-apache-server2 redémarrer Apache ?
 La version Debian de mono-apache-server2 comporte le script mono-server2-update qui crée un fichier de configuration pour Apache, servant à lancer les applications ASP.NET. Ce script peut redémarrer Apache s'il existe un nouveau fichier de configuration /etc/mono-server2/mono-server2-hosts.conf.
";
$elem["monoserver2/monoserver2_restartapache"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
