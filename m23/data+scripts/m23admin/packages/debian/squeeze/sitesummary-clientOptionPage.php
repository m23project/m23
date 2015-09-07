<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sitesummary-client");

$elem["sitesummary-client/collector_url"]["type"]="string";
$elem["sitesummary-client/collector_url"]["description"]="URL:
 Insert the URL to the sitesummary collector, where should the
 sitesummary information be submitted.  Several URLs can be specified
 separated by space.
 .
 The default URL is http://localhost/cgi-bin/sitesummary-collector.cgi
";
$elem["sitesummary-client/collector_url"]["descriptionde"]="URL:
 Geben Sie die URL fÃŒr den Sitesummary-Sammler ein, wo die Sitesummary-Informationen eingereicht werden sollen. Mehrere, durch Leerzeichen getrennte URLs kÃ¶nnen angegeben werden.
 .
 Die Standard-URL ist http://localhost/cgi-bin/sitesummary-collector.cgi
";
$elem["sitesummary-client/collector_url"]["descriptionfr"]="URL :
 Veuillez indiquer l'adresse du collecteur sitesummary, à laquelle les informations doivent être envoyées. Plusieurs adresses peuvent être mentionnées, séparées par des espaces.
 .
 L'adresse par défaut est « http://localhost/cgi-bin/sitesummary-collector.cgi ».
";
$elem["sitesummary-client/collector_url"]["default"]="";
$elem["sitesummary-client/site"]["type"]="string";
$elem["sitesummary-client/site"]["description"]="Site:
 Insert a string identifying the site where this machine is located.
";
$elem["sitesummary-client/site"]["descriptionde"]="Standort:
 Geben Sie eine Zeichenkette an, die den Standort dieser Maschine angibt.
";
$elem["sitesummary-client/site"]["descriptionfr"]="Site :
 Veuillez indiquer l'adresse du site dont fait partie ce serveur.
";
$elem["sitesummary-client/site"]["default"]="";
$elem["sitesummary-client/sitegroup"]["type"]="string";
$elem["sitesummary-client/sitegroup"]["description"]="Sitegroup:
 Insert a string identifying the subgroup within the site where this
 machine is located.
";
$elem["sitesummary-client/sitegroup"]["descriptionde"]="Standortgruppe:
 Geben Sie eine Zeichenkette an, die die Untergruppe innerhalb des Standorts dieser Maschine angibt.
";
$elem["sitesummary-client/sitegroup"]["descriptionfr"]="Sous-partie du site :
 Veuillez indiquer l'identifiant de la partie du site (« sitegroup ») où cette machine est située.
";
$elem["sitesummary-client/sitegroup"]["default"]="";
$elem["sitesummary-client/hostclass"]["type"]="string";
$elem["sitesummary-client/hostclass"]["description"]="Host class:
 Insert string identifying the host class, like workstation, server,
 laptop, thin client etc.
";
$elem["sitesummary-client/hostclass"]["descriptionde"]="Rechnerklasse:
 Geben Sie eine Zeichenkette an, die die Rechnerklasse (wie Workstation, Server, Laptop, Terminal, usw.) angibt.
";
$elem["sitesummary-client/hostclass"]["descriptionfr"]="Type de machine :
 Veuillez indiquer le type de machine, par exemple : station de travail, serveur, portable, client léger, etc.
";
$elem["sitesummary-client/hostclass"]["default"]="";
$elem["sitesummary-client/enable-nagios-nrpe-config"]["type"]="boolean";
$elem["sitesummary-client/enable-nagios-nrpe-config"]["description"]="Activate the Nagios NRPE config feature?
 This is an internal (hidden) debconf question.  It should not be translated.

";
$elem["sitesummary-client/enable-nagios-nrpe-config"]["descriptionde"]="";
$elem["sitesummary-client/enable-nagios-nrpe-config"]["descriptionfr"]="";
$elem["sitesummary-client/enable-nagios-nrpe-config"]["default"]="false";
$elem["db_get"]["type"]="string";
$elem["db_get"]["description"]="Host name of nagios server allowed to contact NRPE:
 This is an internal (hidden) debconf question.  It should not be translated.

";
$elem["db_get"]["descriptionde"]="";
$elem["db_get"]["descriptionfr"]="";
$elem["db_get"]["default"]="";
PKG_OptionPageTail2($elem);
?>
