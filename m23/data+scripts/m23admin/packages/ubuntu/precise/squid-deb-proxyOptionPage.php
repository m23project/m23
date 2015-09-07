<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("squid-deb-proxy");

$elem["squid-deb-proxy/ppa-enable"]["type"]="boolean";
$elem["squid-deb-proxy/ppa-enable"]["description"]="Allow PPA (Personal Package Archive) access?
 Squid-deb-proxy by default will not allow PPA repositories from launchpad.
 Selecting Y in this option will activate PPA repo access.

";
$elem["squid-deb-proxy/ppa-enable"]["descriptionde"]="";
$elem["squid-deb-proxy/ppa-enable"]["descriptionfr"]="";
$elem["squid-deb-proxy/ppa-enable"]["default"]="false";
$elem["squid-deb-proxy/acl-disable"]["type"]="boolean";
$elem["squid-deb-proxy/acl-disable"]["description"]="Allow unrestricted network access?
 Squid-deb-proxy restricts access to the cache to private networks
 only by default.
 Selecting Y in this option will allow unrestricted access of all IPs
 to access the cache. Selecting N will only allow private networks
 (10.0.0.0/8, 172.16.0.0/12, 192.168.0.0/16) to access the cache.
";
$elem["squid-deb-proxy/acl-disable"]["descriptionde"]="";
$elem["squid-deb-proxy/acl-disable"]["descriptionfr"]="";
$elem["squid-deb-proxy/acl-disable"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
