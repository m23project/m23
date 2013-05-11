<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gitalist-fastcgi");

$elem["gitalist/apache2"]["type"]="boolean";
$elem["gitalist/apache2"]["description"]="Enable Gitalist in Apache as /gitalist?
 This will install Gitalist into you Apache configuration.
 Gitalist will be available as /gitalist.
 .
 Gitalist needs the global Apache configuration AllowEncodedSlashes
 set to On. This could cause problems with your other webapplication
 for more information, please have a look at the Apache manual.
";
$elem["gitalist/apache2"]["descriptionde"]="";
$elem["gitalist/apache2"]["descriptionfr"]="Faut-il activer Gitalist dans Apache sous /gitalist ?
 Si vous choisissez cette option, Gitalist sera installé dans la configuration d'Apache. Il sera accessible sous /gitalist.
 .
 Gitalist a besoin que la directive globale « AllowEncodedSlashes » d'Apache soit positionnée à « on ». Cela peut poser des problèmes avec d'autres applications web. Pour de plus amples renseignements, veuillez vous référer à la documentation d'Apache.
";
$elem["gitalist/apache2"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
