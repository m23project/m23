<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gforge-common");

$elem["gforge/shared/domain_name"]["type"]="string";
$elem["gforge/shared/domain_name"]["description"]="GForge domain or subdomain name:
 Please enter the domain that will host the GForge installation. Some
 services (scm, lists, etc.) will be given their own subdomain in that
 domain.
";
$elem["gforge/shared/domain_name"]["descriptionde"]="GForge Domain- oder Subdomain-Name:
 Bitte geben Sie die Domain an, die Ihre GForge-Installation beherbergen wird. Einigen Diensten (scm, lists, usw.) wird innerhalb der Domain eine eigene Subdomain zugewiesen.
";
$elem["gforge/shared/domain_name"]["descriptionfr"]="Nom de domaine ou de sous-domaine GForge :
 Veuillez indiquer le nom de domaine qui hébergera le serveur GForge. Certains services auront leur propre sous-domaine à l'intérieur de ce domaine (scm, lists, etc.).
";
$elem["gforge/shared/domain_name"]["default"]="";
$elem["gforge/shared/server_admin"]["type"]="string";
$elem["gforge/shared/server_admin"]["description"]="GForge administrator e-mail address:
 Please enter the e-mail address of the GForge administrator of this site. It
 will be used when problems occur.
";
$elem["gforge/shared/server_admin"]["descriptionde"]="E-Mail-Adresse des GForge-Administrators:
 Bitte geben Sie die E-Mail-Adresse des GForge-Administrators Ihrer Site an. Diese wird beim Auftritt von Problemen benötigt.
";
$elem["gforge/shared/server_admin"]["descriptionfr"]="Adresse électronique de l'administrateur GForge :
 Veuillez indiquer l'adresse de l'administrateur de GForge. Elle est utilisée quand un problème se produit.
";
$elem["gforge/shared/server_admin"]["default"]="";
$elem["gforge/shared/system_name"]["type"]="string";
$elem["gforge/shared/system_name"]["description"]="GForge system name:
 Please enter the name of the GForge system. It is used in various places
 throughout the system.
";
$elem["gforge/shared/system_name"]["descriptionde"]="GForge-Systemname:
 Bitte geben Sie den Namen des GForge-Systems ein. Er wird an verschiedenen Stellen im ganzen System verwendet.
";
$elem["gforge/shared/system_name"]["descriptionfr"]="Nom du système GForge :
 Veuillez indiquer le nom du système GForge. Il est utilisé dans plusieurs parties du serveur.
";
$elem["gforge/shared/system_name"]["default"]="GForge";
PKG_OptionPageTail2($elem);
?>
