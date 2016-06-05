<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sinfo");

$elem["sinfo/cgi"]["type"]="boolean";
$elem["sinfo/cgi"]["description"]="Enable the sinfo CGI script?
 A CGI script is included, to provide a web interface for sinfo. It is
 disabled by default as it might publish information about the computer not
 intended to be public.
";
$elem["sinfo/cgi"]["descriptionde"]="Das Sinfo-CGI-Skript aktivieren?
 Für eine Webschnittstelle zu Sinfo ist ein CGI-Skript enthalten. Standardmäßig ist dies deaktiviert, da es Informationen über den Computer veröffentlichen könnte, die nicht für die Öffentlichkeit bestimmt sind.
";
$elem["sinfo/cgi"]["descriptionfr"]="Faut-il activer le script CGI pour sinfo ?
 Un script CGI, inclus dans le paquet, fournit une interface web pour sinfo. Par défaut il est désactivé, car il pourrait rendre publiques des informations touchant à la machine et destinées à rester privées.
";
$elem["sinfo/cgi"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
