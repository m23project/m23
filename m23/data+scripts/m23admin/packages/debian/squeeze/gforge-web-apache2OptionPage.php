<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gforge-web-apache2");

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
$elem["fusionforge/shared/download_host"]["type"]="string";
$elem["fusionforge/shared/download_host"]["description"]="Download server:
 Please enter the host name of the server that will host the FusionForge packages.
 .
 It should not be the same as the main FusionForge host.

";
$elem["fusionforge/shared/download_host"]["descriptionde"]="";
$elem["fusionforge/shared/download_host"]["descriptionfr"]="";
$elem["fusionforge/shared/download_host"]["default"]="";
$elem["fusionforge/shared/upload_host"]["type"]="string";
$elem["fusionforge/shared/upload_host"]["description"]="Your upload server:
 The hostname of the server where you will upload files available
 in ftp space

";
$elem["fusionforge/shared/upload_host"]["descriptionde"]="";
$elem["fusionforge/shared/upload_host"]["descriptionfr"]="";
$elem["fusionforge/shared/upload_host"]["default"]="";
$elem["fusionforge/shared/ftpuploadhost"]["type"]="string";
$elem["fusionforge/shared/ftpuploadhost"]["description"]="Your upload server for released files:
 The hostname of the server where you will upload files
 to release

";
$elem["fusionforge/shared/ftpuploadhost"]["descriptionde"]="";
$elem["fusionforge/shared/ftpuploadhost"]["descriptionfr"]="";
$elem["fusionforge/shared/ftpuploadhost"]["default"]="";
$elem["fusionforge/shared/jabber_host"]["type"]="string";
$elem["fusionforge/shared/jabber_host"]["description"]="Your jabber server:
 The hostname of the server that will host your Jabber server

";
$elem["fusionforge/shared/jabber_host"]["descriptionde"]="";
$elem["fusionforge/shared/jabber_host"]["descriptionfr"]="";
$elem["fusionforge/shared/jabber_host"]["default"]="";
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
$elem["fusionforge/shared/shell_host"]["type"]="string";
$elem["fusionforge/shared/shell_host"]["description"]="Shell server:
 Please enter the host name of the server that will host the FusionForge
 shell accounts.

";
$elem["fusionforge/shared/shell_host"]["descriptionde"]="";
$elem["fusionforge/shared/shell_host"]["descriptionfr"]="";
$elem["fusionforge/shared/shell_host"]["default"]="";
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
$elem["fusionforge/shared/newsadmin_groupid"]["type"]="string";
$elem["fusionforge/shared/newsadmin_groupid"]["description"]="News administrative group ID:
 The members of the news admin group can approve news for the FusionForge main
 page. This group's ID must not be 1. This should be changed only if
 you upgrade from a previous version and want to keep the data.

";
$elem["fusionforge/shared/newsadmin_groupid"]["descriptionde"]="";
$elem["fusionforge/shared/newsadmin_groupid"]["descriptionfr"]="";
$elem["fusionforge/shared/newsadmin_groupid"]["default"]="2";
$elem["fusionforge/shared/statsadmin_groupid"]["type"]="string";
$elem["fusionforge/shared/statsadmin_groupid"]["description"]="Statistics administrative group ID:

";
$elem["fusionforge/shared/statsadmin_groupid"]["descriptionde"]="";
$elem["fusionforge/shared/statsadmin_groupid"]["descriptionfr"]="";
$elem["fusionforge/shared/statsadmin_groupid"]["default"]="3";
$elem["fusionforge/shared/peerrating_groupid"]["type"]="string";
$elem["fusionforge/shared/peerrating_groupid"]["description"]="Peer rating administrative group ID:

";
$elem["fusionforge/shared/peerrating_groupid"]["descriptionde"]="";
$elem["fusionforge/shared/peerrating_groupid"]["descriptionfr"]="";
$elem["fusionforge/shared/peerrating_groupid"]["default"]="4";
$elem["fusionforge/shared/db_password"]["type"]="password";
$elem["fusionforge/shared/db_password"]["description"]="Password used for the database:
 Connections to the database system are authenticated by a password.
 .
 Please choose the connection password.

";
$elem["fusionforge/shared/db_password"]["descriptionde"]="";
$elem["fusionforge/shared/db_password"]["descriptionfr"]="";
$elem["fusionforge/shared/db_password"]["default"]="";
$elem["fusionforge/shared/db_password_confirm"]["type"]="password";
$elem["fusionforge/shared/db_password_confirm"]["description"]="Password confirmation:
 Please re-type the password for confirmation.

";
$elem["fusionforge/shared/db_password_confirm"]["descriptionde"]="";
$elem["fusionforge/shared/db_password_confirm"]["descriptionfr"]="";
$elem["fusionforge/shared/db_password_confirm"]["default"]="";
PKG_OptionPageTail2($elem);
?>
