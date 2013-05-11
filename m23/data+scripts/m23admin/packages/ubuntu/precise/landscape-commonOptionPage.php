<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("landscape-common");

$elem["landscape-common/sysinfo"]["type"]="select";
$elem["landscape-common/sysinfo"]["choices"][1]="Do not display sysinfo on login";
$elem["landscape-common/sysinfo"]["choices"][2]="Cache sysinfo in /etc/motd";
$elem["landscape-common/sysinfo"]["description"]="landscape-sysinfo configuration:
 Landscape includes a tool and a set of modules that can display
 system status, information, and statistics on login.
 .
 This information can be gathered periodically (every 10 minutes)
 and automatically written to /etc/motd.  The data could be a few
 minutes out-of-date.
 .
 Or, this information can be gathered at login.  The data will be
 more current, but might introduce a small delay at login.
";
$elem["landscape-common/sysinfo"]["descriptionde"]="";
$elem["landscape-common/sysinfo"]["descriptionfr"]="";
$elem["landscape-common/sysinfo"]["default"]="Cache sysinfo in /etc/motd";
PKG_OptionPageTail2($elem);
?>
