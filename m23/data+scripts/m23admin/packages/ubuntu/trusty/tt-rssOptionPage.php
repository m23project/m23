<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tt-rss");

$elem["tt-rss/reconfigure-webserver"]["type"]="multiselect";
$elem["tt-rss/reconfigure-webserver"]["choices"][1]="apache2";
$elem["tt-rss/reconfigure-webserver"]["choicesde"][1]="Apache 2";
$elem["tt-rss/reconfigure-webserver"]["choicesfr"][1]="Apache 2";
$elem["tt-rss/reconfigure-webserver"]["description"]="Web server to reconfigure automatically:
 Please choose the web server that should be automatically configured
 to run Tiny Tiny RSS.
";
$elem["tt-rss/reconfigure-webserver"]["descriptionde"]="Webserver, der automatisch konfiguriert werden soll:
 Bitte suchen Sie den Webserver aus, der automatisch für Tiny Tiny RSS konfiguriert werden soll.
";
$elem["tt-rss/reconfigure-webserver"]["descriptionfr"]="Serveur web à reconfigurer automatiquement :
 Veuillez choisir le serveur web qui doit être configuré automatiquement pour exécuter Tiny Tiny RSS.
";
$elem["tt-rss/reconfigure-webserver"]["default"]="";
$elem["tt-rss/self_url_path"]["type"]="string";
$elem["tt-rss/self_url_path"]["description"]="Full URL of the tt-rss installation:
 Please enter the URL that should be used to access tt-rss
 with a web browser.
 .
 This should include the location of the tt-rss directory - for
 instance http://example.org/tt-rss/.
 If this is not set correctly, several features,
 including PUSH, bookmarklets, and browser integration, will not
 work properly.
";
$elem["tt-rss/self_url_path"]["descriptionde"]="Vollständige URL der TT-RSS-Installation:
 Bitte geben Sie die URL ein, die zum Zugriff auf TT-RSS per Web-Browser verwendet werden soll.
 .
 Dies sollte das Verzeichnis von TT-RSS beinhalten, zum Beispiel http://example.org/tt-rss/. Falls diese Einstellung nicht korrekt konfiguriert wird, so funktionieren verschiedene Funktionen nicht korrekt, wie z.B. PUSH, Bookmarklets oder die Browser-Integration.
";
$elem["tt-rss/self_url_path"]["descriptionfr"]="Adresse complète de l'installation de tt-rss :
 Veuillez indiquer l'URL à utiliser pour accéder à tt-rss avec un navigateur web.
 .
 Cette URL doit comprendre l'emplacement du répertoire de tt-rss : par exemple, http://example.org/tt-rss/. Si cette URL n'est pas indiquée correctement, de nombreuses fonctionnalités, telles que PUSH, les « bookmarklets » et l'intégration au navigateur ne fonctionneront pas correctement.
";
$elem["tt-rss/self_url_path"]["default"]="http://example.org/tt-rss/";
PKG_OptionPageTail2($elem);
?>
