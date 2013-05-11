<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("checkbox");

$elem["checkbox/plugins/apport_prompt/default_enabled"]["type"]="boolean";
$elem["checkbox/plugins/apport_prompt/default_enabled"]["description"]="Enable bug reporting by default? 
 If this option is set to Yes, then checkbox will ask if the user wants
 to file a bug for failing tests, even if apport is not enabled.
";
$elem["checkbox/plugins/apport_prompt/default_enabled"]["descriptionde"]="Fehlerberichterstattung standardmäßig aktivieren? 
 Wenn diese Option auf Ja gesetzt ist, wird Checkbox den Nutzer fragen, ob ein Fehlerbericht für fehlgeschlagene Tests erstellt werden soll, auch wenn apport nicht aktiviert ist.
";
$elem["checkbox/plugins/apport_prompt/default_enabled"]["descriptionfr"]="";
$elem["checkbox/plugins/apport_prompt/default_enabled"]["default"]="";
$elem["checkbox/plugins/apport_prompt/default_package"]["type"]="string";
$elem["checkbox/plugins/apport_prompt/default_package"]["description"]="Default package to report bugs against:
 When filing a new bug through checkbox, if it does not guess the 
 package, the default package that the bug will be file against.
";
$elem["checkbox/plugins/apport_prompt/default_package"]["descriptionde"]="Paket, für das standardmäßig Fehlerberichte erstellt werden:
 Wenn ein neuer Fehlerbericht mithilfe von Checkbox erstellt und das betroffene Paket nicht erkannt wird, wird der Fehlerbericht für das angegebene standardmäßige Paket erstellt.
";
$elem["checkbox/plugins/apport_prompt/default_package"]["descriptionfr"]="";
$elem["checkbox/plugins/apport_prompt/default_package"]["default"]="";
$elem["checkbox/plugins/jobs_info/blacklist"]["type"]="string";
$elem["checkbox/plugins/jobs_info/blacklist"]["description"]="Test suite blacklist:
 List of job files to never run when testing with checkbox.
";
$elem["checkbox/plugins/jobs_info/blacklist"]["descriptionde"]="Sperrliste der Testsammlung:
 Liste der Aufträge, die während des Testens mit Checkbox niemals ausgeführt werden.
";
$elem["checkbox/plugins/jobs_info/blacklist"]["descriptionfr"]="";
$elem["checkbox/plugins/jobs_info/blacklist"]["default"]="";
$elem["checkbox/plugins/jobs_info/whitelist"]["type"]="string";
$elem["checkbox/plugins/jobs_info/whitelist"]["description"]="Test suite whitelist:
 List of jobs to run when testing with checkbox.
";
$elem["checkbox/plugins/jobs_info/whitelist"]["descriptionde"]="Positivliste der Testsammlung:
 Liste der Aufträge, die während des Testens mit Checkbox ausgeführt werden.
";
$elem["checkbox/plugins/jobs_info/whitelist"]["descriptionfr"]="";
$elem["checkbox/plugins/jobs_info/whitelist"]["default"]="";
$elem["checkbox/plugins/launchpad_exchange/transport_url"]["type"]="string";
$elem["checkbox/plugins/launchpad_exchange/transport_url"]["description"]="Transport URL:
 URL where to send submissions.
";
$elem["checkbox/plugins/launchpad_exchange/transport_url"]["descriptionde"]="Transport-URL:
 URL, an welche die Ergebnisse gesendet werden.
";
$elem["checkbox/plugins/launchpad_exchange/transport_url"]["descriptionfr"]="";
$elem["checkbox/plugins/launchpad_exchange/transport_url"]["default"]="https://launchpad.net/+hwdb/+submit";
$elem["checkbox/plugins/launchpad_prompt/email"]["type"]="string";
$elem["checkbox/plugins/launchpad_prompt/email"]["description"]="Launchpad E-mail:
 E-mail address used to sign in to Launchpad.
";
$elem["checkbox/plugins/launchpad_prompt/email"]["descriptionde"]="Launchpad-E-Mail:
 E-Mail-Adresse, die zum Anmelden bei Launchpad verwendet wird.
";
$elem["checkbox/plugins/launchpad_prompt/email"]["descriptionfr"]="";
$elem["checkbox/plugins/launchpad_prompt/email"]["default"]="";
$elem["checkbox/plugins/proxy_info/http_proxy"]["type"]="string";
$elem["checkbox/plugins/proxy_info/http_proxy"]["description"]="HTTP Proxy:
 HTTP proxy to use instead of the one specified in environment.
";
$elem["checkbox/plugins/proxy_info/http_proxy"]["descriptionde"]="HTTP-Proxy:
 HTTP-Proxy, der anstelle des in den Umgebungseinstellungen festgelegten Proxys verwendet wird.
";
$elem["checkbox/plugins/proxy_info/http_proxy"]["descriptionfr"]="";
$elem["checkbox/plugins/proxy_info/http_proxy"]["default"]="";
$elem["checkbox/plugins/proxy_info/https_proxy"]["type"]="string";
$elem["checkbox/plugins/proxy_info/https_proxy"]["description"]="HTTPS Proxy:
 HTTPS proxy to use instead of the one specified in environment.
";
$elem["checkbox/plugins/proxy_info/https_proxy"]["descriptionde"]="HTTPS-Proxy:
 HTTPS-Proxy, der anstelle des in den Umgebungseinstellungen festgelegten Proxys verwendet wird.
";
$elem["checkbox/plugins/proxy_info/https_proxy"]["descriptionfr"]="";
$elem["checkbox/plugins/proxy_info/https_proxy"]["default"]="";
PKG_OptionPageTail2($elem);
?>
