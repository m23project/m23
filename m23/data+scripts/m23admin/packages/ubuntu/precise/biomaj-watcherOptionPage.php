<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("biomaj-watcher");

$elem["biomaj/login"]["type"]="string";
$elem["biomaj/login"]["description"]="Administration interface admin login:
";
$elem["biomaj/login"]["descriptionde"]="";
$elem["biomaj/login"]["descriptionfr"]="Login de l'interface d'administration
";
$elem["biomaj/login"]["default"]="admin";
$elem["biomaj/ldap"]["type"]="boolean";
$elem["biomaj/ldap"]["description"]="Want to configure LDAP now ?
";
$elem["biomaj/ldap"]["descriptionde"]="";
$elem["biomaj/ldap"]["descriptionfr"]="Souhaitez vous configurer le LDAP?
";
$elem["biomaj/ldap"]["default"]="";
$elem["biomaj/ldap_server"]["type"]="string";
$elem["biomaj/ldap_server"]["description"]="Enter LDAP server:
";
$elem["biomaj/ldap_server"]["descriptionde"]="";
$elem["biomaj/ldap_server"]["descriptionfr"]="Adresse du LDAP:
";
$elem["biomaj/ldap_server"]["default"]="";
$elem["biomaj/ldap_dn"]["type"]="string";
$elem["biomaj/ldap_dn"]["description"]="Enter LDAP DN:
";
$elem["biomaj/ldap_dn"]["descriptionde"]="";
$elem["biomaj/ldap_dn"]["descriptionfr"]="DN (directory name) du LDAP:
";
$elem["biomaj/ldap_dn"]["default"]="";
$elem["biomaj/ldap_filter"]["type"]="string";
$elem["biomaj/ldap_filter"]["description"]="Enter LDAP filter (empty if not needed):
";
$elem["biomaj/ldap_filter"]["descriptionde"]="";
$elem["biomaj/ldap_filter"]["descriptionfr"]="Filtre pour la recherche LDAP (vide si non nécessaire):
";
$elem["biomaj/ldap_filter"]["default"]="";
PKG_OptionPageTail2($elem);
?>
