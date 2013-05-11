<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mono-apache-server1");

$elem["monoserver/monoserver_restartapache"]["type"]="boolean";
$elem["monoserver/monoserver_restartapache"]["description"]="Let mono-apache-server restart Apache?
 The Debian version of mono-apache-server includes a
 mono-server-update script that creates a configuration file for
 apache to start the ASP.NET applications, and mono-server-update can
 restart apache if there's a new configuration file
 (/etc/mono-server/mono-server-hosts.conf). If this is true, then apache will be restarted when there is a new mono-server-hosts.conf file.
";
$elem["monoserver/monoserver_restartapache"]["descriptionde"]="Soll mono-apache-server Apache neustarten?
 Die Debian-Version von mono-apache-server enthält ein Skript mono-server-update, das eine Konfigurationsdatei für Apache erstellt, um die ASP.NET-Anwendungen zu starten und mono-server-update kann Apache neustarten, falls es eine neue Konfigurationsdatei (/etc/mono-server/mono-server-hosts.conf) gibt. Falls dies stimmt, dann wird Apache neu gestartet, wenn es eine neue mono-server-hosts.conf-Datei gibt.
";
$elem["monoserver/monoserver_restartapache"]["descriptionfr"]="Faut-il laisser mono-apache-server redémarrer Apache ?
 La version Debian de mono-apache-server comporte le script mono-server-update qui crée un fichier de configuration pour Apache, servant à lancer les applications ASP.NET. Ce script peut redémarrer Apache s'il existe un nouveau fichier de configuration /etc/mono-server/mono-server-hosts.conf.
";
$elem["monoserver/monoserver_restartapache"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
