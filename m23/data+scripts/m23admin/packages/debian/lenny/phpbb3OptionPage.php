<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("phpbb3");

$elem["phpbb3/httpd"]["type"]="multiselect";
$elem["phpbb3/httpd"]["choices"][1]="apache";
$elem["phpbb3/httpd"]["choices"][2]="apache-ssl";
$elem["phpbb3/httpd"]["choices"][3]="apache-perl";
$elem["phpbb3/httpd"]["description"]="Webserver(s) to configure:
 phpBB runs on any webserver with PHP support. However, only Apache variants
 are currently supported by this configuration script. Select the one(s) you
 want to configure.
 .
 Note: You will need to restart the server(s) yourself (typically by running
 something like  /etc/init.d/apache-??? reload).
";
$elem["phpbb3/httpd"]["descriptionde"]="Zu konfigurierende(r) Webserver:
 phpBB läuft auf jedem Webserver mit PHP4Unterstützung. Jedoch werden nur die Apache-Varianten von diesem Konfigurationsskript unterstützt. Wählen Sie diejenigen aus, die Sie einrichten möchten.
 .
 Hinweis: Sie müssen die Server selbst neu starten (typischerweise durch Aufrufen von so etwas wie /etc/init.d/apache-??? reload).
";
$elem["phpbb3/httpd"]["descriptionfr"]="Serveur(s) web à configurer :
 PhpBB fonctionne avec tout type de serveur web gérant PHP. Cependant, seuls le serveur Apache et ses variantes sont gérés par le script de configuration. Choisissez celui ou ceux que vous désirez configurer.
 .
 Note : vous devez redémarrer le ou les serveurs (habituellement avec une commande comme « /etc/init.d/apache-??? reload »).
";
$elem["phpbb3/httpd"]["default"]="apache";
PKG_OptionPageTail2($elem);
?>
