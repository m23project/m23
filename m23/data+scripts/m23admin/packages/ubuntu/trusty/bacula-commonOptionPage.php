<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bacula-common");

$elem["bacula/dir_passwd"]["type"]="string";
$elem["bacula/dir_passwd"]["description"]="Password for bacula-director

";
$elem["bacula/dir_passwd"]["descriptionde"]="";
$elem["bacula/dir_passwd"]["descriptionfr"]="";
$elem["bacula/dir_passwd"]["default"]="";
$elem["bacula/dir_monpasswd"]["type"]="string";
$elem["bacula/dir_monpasswd"]["description"]="Password for bacula-director monitor

";
$elem["bacula/dir_monpasswd"]["descriptionde"]="";
$elem["bacula/dir_monpasswd"]["descriptionfr"]="";
$elem["bacula/dir_monpasswd"]["default"]="";
$elem["bacula/sd_passwd"]["type"]="string";
$elem["bacula/sd_passwd"]["description"]="Password for bacula-sd

";
$elem["bacula/sd_passwd"]["descriptionde"]="";
$elem["bacula/sd_passwd"]["descriptionfr"]="";
$elem["bacula/sd_passwd"]["default"]="";
$elem["bacula/sd_monpasswd"]["type"]="string";
$elem["bacula/sd_monpasswd"]["description"]="Password for bacula-sd monitor

";
$elem["bacula/sd_monpasswd"]["descriptionde"]="";
$elem["bacula/sd_monpasswd"]["descriptionfr"]="";
$elem["bacula/sd_monpasswd"]["default"]="";
$elem["bacula/fd_passwd"]["type"]="string";
$elem["bacula/fd_passwd"]["description"]="Password for bacula-fd

";
$elem["bacula/fd_passwd"]["descriptionde"]="";
$elem["bacula/fd_passwd"]["descriptionfr"]="";
$elem["bacula/fd_passwd"]["default"]="";
$elem["bacula/fd_monpasswd"]["type"]="string";
$elem["bacula/fd_monpasswd"]["description"]="Password for bacula-fd monitor
";
$elem["bacula/fd_monpasswd"]["descriptionde"]="";
$elem["bacula/fd_monpasswd"]["descriptionfr"]="";
$elem["bacula/fd_monpasswd"]["default"]="";
PKG_OptionPageTail2($elem);
?>
