<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bootmail");

$elem["bootmail/recipients"]["type"]="string";
$elem["bootmail/recipients"]["description"]="Recipient email addresses:
 Bootmail will automatically email one or more addresses each time this
 system reboots.  Enter a comma-separated list of email addresses.

";
$elem["bootmail/recipients"]["descriptionde"]="";
$elem["bootmail/recipients"]["descriptionfr"]="";
$elem["bootmail/recipients"]["default"]="";
$elem["bootmail/gpgkeys"]["type"]="string";
$elem["bootmail/gpgkeys"]["description"]="Recipient gpg key ids:
 Bootmail can optionally encrypt messages to one or more gpg public
 keys.  Enter a comma separated list of public key ids here.
";
$elem["bootmail/gpgkeys"]["descriptionde"]="";
$elem["bootmail/gpgkeys"]["descriptionfr"]="";
$elem["bootmail/gpgkeys"]["default"]="";
PKG_OptionPageTail2($elem);
?>
