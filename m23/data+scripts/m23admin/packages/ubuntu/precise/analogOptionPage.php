<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("analog");

$elem["analog/anlgform"]["type"]="boolean";
$elem["analog/anlgform"]["description"]="Enable the anlgform web interface to analog?
 Analog includes a CGI script called anlgform that provides a web interface
 to the software.
 .
 Enabling it may have security implications and expose
 information, such as web site logs, that shouldn't be public.
";
$elem["analog/anlgform"]["descriptionde"]="Die Webschnittstelle zu analog (anlgform) aktivieren?
 Analog enthält ein CGI-Skript namens »anlgform«, das eine Webschnittstelle für die Software bereitstellt.
 .
 Die Aktivierung kann sicherheitsrelevant sein und Informationen, wie Log-Dateien der Website, bloßstellen, die nicht öffentlich sein sollten.
";
$elem["analog/anlgform"]["descriptionfr"]="Activer anlgform, l'interface web d'analog ?
 Analog est livré avec un script CGI appelé anlgform qui lui offre une interface web.
 .
 L'activation de ette interface peut avoir des conséquences sur la sécurité du système et divulguer des informations confidentielles issues des journaux web.
";
$elem["analog/anlgform"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
