<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("eviacam");

$elem["eviacamloader/eviacamloader_setuid"]["type"]="boolean";
$elem["eviacamloader/eviacamloader_setuid"]["description"]="Should eviacamloader be installed 'setuid root'?
 In order to enable users of the group 'eviacam' to run eviacam in 
 high priority (which improves responsiveness), the eviacamloader 
 program can be installed with the set-user-ID bit set, so that it 
 will run with the permissions of the superuser.
 .
 Such a setting requires that the sysadmin adds authorized users to the 
 'eviacam' group and may have security implications in the case of 
 vulnerabilities in eviacamloader's code.
";
$elem["eviacamloader/eviacamloader_setuid"]["descriptionde"]="";
$elem["eviacamloader/eviacamloader_setuid"]["descriptionfr"]="";
$elem["eviacamloader/eviacamloader_setuid"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
