<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("loggedfs");

$elem["loggedfs/start_default"]["type"]="boolean";
$elem["loggedfs/start_default"]["description"]="Start loggedfs by default?
 Loggedfs is not started by default as you are likely to change some sensible
 default values like destination path to audit in your vfs. If you answer
 positively, more questions to setup it properly will follow. You can also
 configure those parameters in /etc/default/loggedfs.
 .
 Internal loggedfs configuration file, where you can specify other parameters,
 like which fs operation you want to log (like getattr, open, write…), which
 user you want to audit and other operations, is available at /etc/loggedfs.xml.
 .
 You can specify other parameters, like which fs operation you want to log (like
 getattr, open, write…), which user you want to audit, and other operations, in
 the internal loggedfs configuration file where available at /etc/loggedfs.xml.
 .
 Finally, note that you can also use loggedfs in non daemon mode and run it from
 a shell to log other paths or information… 'man loggedfs' for more info.

";
$elem["loggedfs/start_default"]["descriptionde"]="";
$elem["loggedfs/start_default"]["descriptionfr"]="";
$elem["loggedfs/start_default"]["default"]="";
$elem["loggedfs/audit_path"]["type"]="string";
$elem["loggedfs/audit_path"]["description"]="Path where you want to log actions:
 Loggedfs daemon will audit only a subpart of your fs. You have to choose there
 the corresponding path you wish logging in daemon mode.
 .
 Beware though - logging essential paths of your fs like those directly under /
 or /home/user is strongly discouraged. In a nutshell, it is strongly advised to
 audit only subdirectories of /home/user like /home/user/foo. More information
 in README.Debian.

";
$elem["loggedfs/audit_path"]["descriptionde"]="";
$elem["loggedfs/audit_path"]["descriptionfr"]="";
$elem["loggedfs/audit_path"]["default"]="";
$elem["loggedfs/use_syslog"]["type"]="boolean";
$elem["loggedfs/use_syslog"]["description"]="Use syslog or dedicated log directory?
 You can choose to use the syslog daemon to log all output information of your
 loggedfs daemon or use /var/log/loggedfs as a dedicated log directory, using
 logrotate to store and back them up separately.
";
$elem["loggedfs/use_syslog"]["descriptionde"]="";
$elem["loggedfs/use_syslog"]["descriptionfr"]="";
$elem["loggedfs/use_syslog"]["default"]="";
PKG_OptionPageTail2($elem);
?>
