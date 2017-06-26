<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nginx-common");

$elem["nginx/log-symlinks"]["type"]="note";
$elem["nginx/log-symlinks"]["description"]="Possible insecure nginx log files
 The following log files under /var/log/nginx directory are symlinks
 owned by www-data:
 .
 ${logfiles}
 .
 Since nginx 1.4.4-4 /var/log/nginx was owned by www-data. As a result
 www-data could symlink log files to sensitive locations, which in turn
 could lead to privilege escalation attacks. Although /var/log/nginx
 permissions are now fixed it is possible that such insecure links
 already exist. So, please make sure to check the above locations.
";
$elem["nginx/log-symlinks"]["descriptionde"]="";
$elem["nginx/log-symlinks"]["descriptionfr"]="";
$elem["nginx/log-symlinks"]["default"]="";
PKG_OptionPageTail2($elem);
?>
