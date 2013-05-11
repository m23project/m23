<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("splatd");

$elem["splatd/uri"]["type"]="string";
$elem["splatd/uri"]["description"]="URI of LDAP server:
 This URI typically will be the same as would be found in your
 /etc/ldap/ldap.conf file as the URI setting. For example, to connect with
 SSL to an LDAP server at directory.example.com,
 ldaps://directory.example.com would be your URI.

";
$elem["splatd/uri"]["descriptionde"]="";
$elem["splatd/uri"]["descriptionfr"]="";
$elem["splatd/uri"]["default"]="";
$elem["splatd/basedn"]["type"]="string";
$elem["splatd/basedn"]["description"]="Default search base:
 This is the Base DN, which is typically the same as the BASE setting in
 /etc/ldap/ldap.conf. For example, this could be something like
 dc=example,dc=com for the domain example.com.
";
$elem["splatd/basedn"]["descriptionde"]="";
$elem["splatd/basedn"]["descriptionfr"]="";
$elem["splatd/basedn"]["default"]="";
PKG_OptionPageTail2($elem);
?>
