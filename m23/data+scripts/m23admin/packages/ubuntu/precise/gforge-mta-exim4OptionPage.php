<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gforge-mta-exim4");

$elem["fusionforge/shared/domain_name"]["type"]="string";
$elem["fusionforge/shared/domain_name"]["description"]="FusionForge domain or subdomain name:
 Please enter the domain that will host the FusionForge installation. Some
 services (scm, lists, etc.) will be given their own subdomain in that
 domain.

";
$elem["fusionforge/shared/domain_name"]["descriptionde"]="";
$elem["fusionforge/shared/domain_name"]["descriptionfr"]="";
$elem["fusionforge/shared/domain_name"]["default"]="";
$elem["fusionforge/shared/server_admin"]["type"]="string";
$elem["fusionforge/shared/server_admin"]["description"]="FusionForge administrator e-mail address:
 Please enter the e-mail address of the FusionForge administrator of this site. It
 will be used when problems occur.

";
$elem["fusionforge/shared/server_admin"]["descriptionde"]="";
$elem["fusionforge/shared/server_admin"]["descriptionfr"]="";
$elem["fusionforge/shared/server_admin"]["default"]="";
$elem["fusionforge/shared/system_name"]["type"]="string";
$elem["fusionforge/shared/system_name"]["description"]="FusionForge system name:
 Please enter the name of the FusionForge system. It is used in various places
 throughout the system.

";
$elem["fusionforge/shared/system_name"]["descriptionde"]="";
$elem["fusionforge/shared/system_name"]["descriptionfr"]="";
$elem["fusionforge/shared/system_name"]["default"]="FusionForge";
$elem["fusionforge/shared/users_host"]["type"]="string";
$elem["fusionforge/shared/users_host"]["description"]="User mail redirector server:
 Please enter the host name of the server that will host the FusionForge user mail
 redirector.
 .
 It should not be the same as the main FusionForge host.

";
$elem["fusionforge/shared/users_host"]["descriptionde"]="";
$elem["fusionforge/shared/users_host"]["descriptionfr"]="";
$elem["fusionforge/shared/users_host"]["default"]="";
$elem["fusionforge/shared/lists_host"]["type"]="string";
$elem["fusionforge/shared/lists_host"]["description"]="Mailing lists server:
 Please enter the host name of the server that will host the FusionForge
 mailing lists.
 .
 It should not be the same as the main FusionForge host.

";
$elem["fusionforge/shared/lists_host"]["descriptionde"]="";
$elem["fusionforge/shared/lists_host"]["descriptionfr"]="";
$elem["fusionforge/shared/lists_host"]["default"]="";
$elem["fusionforge/shared/noreply_to_bitbucket"]["type"]="boolean";
$elem["fusionforge/shared/noreply_to_bitbucket"]["description"]="Do you want mail to ${noreply} to be deleted?
 FusionForge sends plenty of e-mail from the \"${noreply}\" address,
 and maybe even some e-mail to that address too.
 .
 It is advised that you let the package direct e-mail to that address to a
 black hole (/dev/null), unless you have another use for that address.
 .
 Accepting this option will perform that redirection.
";
$elem["fusionforge/shared/noreply_to_bitbucket"]["descriptionde"]="";
$elem["fusionforge/shared/noreply_to_bitbucket"]["descriptionfr"]="";
$elem["fusionforge/shared/noreply_to_bitbucket"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
