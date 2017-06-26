<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("postsrsd");

$elem["postsrsd/domain"]["type"]="string";
$elem["postsrsd/domain"]["description"]="Local domain name to use as origin:
 Addresses of forwarded mail are rewritten to originate from this domain
 name. This domain should have an SPF policy that allows mail to be send
 from this mailserver.
 .
 Without a configured local domain name, postsrsd will not start.
";
$elem["postsrsd/domain"]["descriptionde"]="";
$elem["postsrsd/domain"]["descriptionfr"]="";
$elem["postsrsd/domain"]["default"]="";
PKG_OptionPageTail2($elem);
?>
