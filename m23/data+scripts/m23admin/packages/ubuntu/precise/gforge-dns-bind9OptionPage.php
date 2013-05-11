<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gforge-dns-bind9");

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
$elem["fusionforge/shared/shell_host"]["type"]="string";
$elem["fusionforge/shared/shell_host"]["description"]="Shell server:
 Please enter the host name of the server that will host the FusionForge
 shell accounts.

";
$elem["fusionforge/shared/shell_host"]["descriptionde"]="";
$elem["fusionforge/shared/shell_host"]["descriptionfr"]="";
$elem["fusionforge/shared/shell_host"]["default"]="";
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
$elem["fusionforge/shared/download_host"]["type"]="string";
$elem["fusionforge/shared/download_host"]["description"]="Download server:
 Please enter the host name of the server that will host the FusionForge packages.
 .
 It should not be the same as the main FusionForge host.

";
$elem["fusionforge/shared/download_host"]["descriptionde"]="";
$elem["fusionforge/shared/download_host"]["descriptionfr"]="";
$elem["fusionforge/shared/download_host"]["default"]="";
$elem["fusionforge/shared/ip_address"]["type"]="string";
$elem["fusionforge/shared/ip_address"]["description"]="IP address:
 Please enter the IP address of the server that will host the FusionForge
 installation.
 .
 This is needed for the configuration of Apache virtual hosting.

";
$elem["fusionforge/shared/ip_address"]["descriptionde"]="";
$elem["fusionforge/shared/ip_address"]["descriptionfr"]="";
$elem["fusionforge/shared/ip_address"]["default"]="";
$elem["fusionforge/shared/sys_lang"]["type"]="select";
$elem["fusionforge/shared/sys_lang"]["choices"][1]="English";
$elem["fusionforge/shared/sys_lang"]["choices"][2]="Bulgarian";
$elem["fusionforge/shared/sys_lang"]["choices"][3]="Catalan";
$elem["fusionforge/shared/sys_lang"]["choices"][4]="Chinese (Traditional)";
$elem["fusionforge/shared/sys_lang"]["choices"][5]="Dutch";
$elem["fusionforge/shared/sys_lang"]["choices"][6]="Esperanto";
$elem["fusionforge/shared/sys_lang"]["choices"][7]="French";
$elem["fusionforge/shared/sys_lang"]["choices"][8]="German";
$elem["fusionforge/shared/sys_lang"]["choices"][9]="Greek";
$elem["fusionforge/shared/sys_lang"]["choices"][10]="Hebrew";
$elem["fusionforge/shared/sys_lang"]["choices"][11]="Indonesian";
$elem["fusionforge/shared/sys_lang"]["choices"][12]="Italian";
$elem["fusionforge/shared/sys_lang"]["choices"][13]="Japanese";
$elem["fusionforge/shared/sys_lang"]["choices"][14]="Korean";
$elem["fusionforge/shared/sys_lang"]["choices"][15]="Latin";
$elem["fusionforge/shared/sys_lang"]["choices"][16]="Norwegian";
$elem["fusionforge/shared/sys_lang"]["choices"][17]="Polish";
$elem["fusionforge/shared/sys_lang"]["choices"][18]="Portuguese (Brazilian)";
$elem["fusionforge/shared/sys_lang"]["choices"][19]="Portuguese";
$elem["fusionforge/shared/sys_lang"]["choices"][20]="Russian";
$elem["fusionforge/shared/sys_lang"]["choices"][21]="Chinese (Simplified)";
$elem["fusionforge/shared/sys_lang"]["choices"][22]="Spanish";
$elem["fusionforge/shared/sys_lang"]["choices"][23]="Swedish";
$elem["fusionforge/shared/sys_lang"]["description"]="Default language:
 Please choose the default language for web pages.

";
$elem["fusionforge/shared/sys_lang"]["descriptionde"]="";
$elem["fusionforge/shared/sys_lang"]["descriptionfr"]="";
$elem["fusionforge/shared/sys_lang"]["default"]="English";
$elem["fusionforge/shared/sys_theme"]["type"]="string";
$elem["fusionforge/shared/sys_theme"]["description"]="Default theme:
 Please choose the default theme for web pages. This must be a valid
 name.

";
$elem["fusionforge/shared/sys_theme"]["descriptionde"]="";
$elem["fusionforge/shared/sys_theme"]["descriptionfr"]="";
$elem["fusionforge/shared/sys_theme"]["default"]="fusionforge";
$elem["fusionforge/shared/simple_dns"]["type"]="boolean";
$elem["fusionforge/shared/simple_dns"]["description"]="Do you want a simple DNS setup for FusionForge?
 You can use a simple DNS setup with wildcards to map all
 project web-hosts to a single IP address, and direct all the scm-hosts
 to a single SCM server, or a complex setup which allows
 many servers as project web servers or SCM servers.
 .
 Even if you use a simple DNS setup, you can still use
 separate machines as project servers; it just assumes that
 all the project web directories are on the same server with a single
 SCM server.
";
$elem["fusionforge/shared/simple_dns"]["descriptionde"]="";
$elem["fusionforge/shared/simple_dns"]["descriptionfr"]="";
$elem["fusionforge/shared/simple_dns"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
