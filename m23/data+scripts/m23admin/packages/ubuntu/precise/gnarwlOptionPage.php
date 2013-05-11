<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gnarwl");

$elem["gnarwl/server"]["type"]="string";
$elem["gnarwl/server"]["description"]="Name/address of the LDAP server:
 Gnarwl contacts a LDAP server in order to get information about
 vacation messages and accounts. Please specify the server,
 optionally with the port to be used.
 .
 Example: ldap.yourdomain.local:389
";
$elem["gnarwl/server"]["descriptionde"]="Name/Adresse des LDAP-Servers:
 gnarwl kontaktiert einen LDAP-Server, um Informationen ÃŒber Urlaubsnachrichten und BenutzerzugÃ€nge zu erhalten. Geben Sie den zu verwendenden Server - optional auch mit der Nummer des zu verwendenden Ports - an.
 .
 Beispiel: ldap.ihredomain.lokal:389
";
$elem["gnarwl/server"]["descriptionfr"]="Nom ou adresse de votre serveur LDAPÂ :
 Gnarwl utilise un serveur LDAP pour obtenir les informations relatives aux messages d'absence et aux comptes. Veuillez indiquer le nom d'hÃ´te du serveur, en spÃ©cifiant Ã©ventuellement le port Ã  utiliser.
 .
 Exemple: ldap.votredomaine.local:389
";
$elem["gnarwl/server"]["default"]="";
$elem["gnarwl/base"]["type"]="string";
$elem["gnarwl/base"]["description"]="Base DN of the LDAP server:
 In order to access the LDAP server, please specify the base gnarwl
 should use for LDAP queries.
 .
 Example: dc=yourdomain,dc=somewhere
";
$elem["gnarwl/base"]["descriptionde"]="Basis des LDAP-Servers:
 FÃŒr Zugriffe auf den LDAP-Server mÃŒssen Sie die von gnarwl fÃŒr LDAP-Anfragen verwendete Basis angeben.
 .
 Beispiel: dc=ihredomain,dc=irgendwo
";
$elem["gnarwl/base"]["descriptionfr"]="DN de base du serveur LDAPÂ :
 Pour accÃ©der au serveur LDAP, vous devez indiquer la base qui doit Ãªtre utilisÃ©e pour les requÃªtes LDAP.
 .
 ExempleÂ : dc=votredomaine, dc=quelquepart
";
$elem["gnarwl/base"]["default"]="";
PKG_OptionPageTail2($elem);
?>
