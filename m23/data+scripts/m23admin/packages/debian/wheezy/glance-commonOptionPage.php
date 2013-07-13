<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("glance-common");

$elem["glance/paste-flavor"]["type"]="select";
$elem["glance/paste-flavor"]["choices"][1]="keystone";
$elem["glance/paste-flavor"]["choices"][2]="caching";
$elem["glance/paste-flavor"]["choices"][3]="keystone+caching";
$elem["glance/paste-flavor"]["choices"][4]="cachemanagement";
$elem["glance/paste-flavor"]["description"]="Pipeline flavor:
 Please specify the flavor of pipeline to be used by Glance.
 .
 If you use the OpenStack Identity Service (Keystone), you might want to
 select \"keystone\". If you don't use this service, you can safely choose
 \"caching\" only.
";
$elem["glance/paste-flavor"]["descriptionde"]="Pipeline-Variante:
 Bitte geben Sie die Variante der von Glance zu benutzenden Pipeline an.
 .
 Falls Sie den OpenStack-IdentitÃ¤tsdienst (Keystone) verwenden, mÃ¶chten Sie mÃ¶glicherweise Â»keystoneÂ« auswÃ¤hlen. Falls Sie diesen Dienst nicht nutzen, kÃ¶nnen Sie problemlos Â»cachingÂ« auswÃ¤hlen.
";
$elem["glance/paste-flavor"]["descriptionfr"]="Type d'acheminement des paquetsÂ :
 Veuillez indiquer le type d'acheminement des paquets que Glance doit utiliser.
 .
 Si vous utilisez le service d'identitÃ©  d'Openstack (Keystone), vous devriez choisir Â« keystone Â». Si vous n'utilisez pas ce service, vous pouvez choisir la mise en cache uniquement en toute sÃ©curitÃ©.
";
$elem["glance/paste-flavor"]["default"]="caching";
$elem["glance/auth-url"]["type"]="string";
$elem["glance/auth-url"]["description"]="Auth server URL:
 Please specify the URL of your Glance authentication server. Typically
 this is also the URL of your OpenStack Identity Service (Keystone).
";
$elem["glance/auth-url"]["descriptionde"]="URL des Authentifizierungsservers:
 Bitte geben Sie die URL des Glance-Authentifizierungsservers an. Typischerweise ist das auÃerdem die URL Ihres OpenStack-IdentitÃ¤tsdienstes (Keystone).
";
$elem["glance/auth-url"]["descriptionfr"]="URL du serveur d'authentificationÂ :
 Veuillez indiquer l'adresse URL du serveur d'authentification de Glance. GÃ©nÃ©ralement cela correspond Ã©galement Ã  l'adresse URL du service d'identitÃ© Openstack (Keystone).
";
$elem["glance/auth-url"]["default"]="http://localhost:5000";
$elem["glance/auth-token"]["type"]="string";
$elem["glance/auth-token"]["description"]="Auth server admin token:
";
$elem["glance/auth-token"]["descriptionde"]="Administrator-Token des Authentifizierungsservers:
";
$elem["glance/auth-token"]["descriptionfr"]="Jeton d'administration du serveur d'authentificationÂ :
";
$elem["glance/auth-token"]["default"]="";
PKG_OptionPageTail2($elem);
?>
