<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("anon-proxy");

$elem["anon-proxy/environment"]["type"]="boolean";
$elem["anon-proxy/environment"]["description"]="Should the http_proxy variable be set?
 To surf the web anonymously browsers have to use the new
 proxy server. For graphical browsers like mozilla or konqueror that
 can easily be configured in the proxy information using the graphical
 setup dialogs.
 .
 Shellbrowsers like lynx or w3m use the environment variables
 http_proxy and HTTP_PROXY. If you want these variables can be
 set globally in /etc/environment now. They will be removed if
 the anon-proxy package is purged.
";
$elem["anon-proxy/environment"]["descriptionde"]="Soll die http_proxy Umgebungsvariable gesetzt werden?
 Um anonym im Web surfen zu können, muss der Browser so eingestellt werden, dass er den Proxy-Server benutzt. Bei graphischen Browsern wie Mozilla oder Konqueror kann dies in dem graphischen Konfigurations-Menü getan werden.
 .
 Kommandozeilen-Browser wie lynx oder w3m benutzen die Umgebungsvariablen http_proxy und HTTP_PROXY. Diese Umgebungsvariablen können nun global in /etc/environment gesetzt werden. In diesem Falle werden sie beim vollständigen löschen des Pakets wieder entfernt.
";
$elem["anon-proxy/environment"]["descriptionfr"]="Faut-il définir la variable « http_proxy » ?
 Pour pouvoir naviguer de façon anonyme, votre navigateur doit utiliser le serveur mandataire (« proxy »). Avec des navigateurs graphiques comme Mozilla ou Konqueror, l'information se déclare très facilement grâce aux dialogues de configuration.
 .
 Les navigateurs comme lynx ou w3m utilisent les variables « http_proxy » et « HTTP_PROXY ». Ces variables peuvent être déclarées dans /etc/environment. Dans ce cas, elles seront effacées de ce fichier quand le paquet sera purgé.
";
$elem["anon-proxy/environment"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
