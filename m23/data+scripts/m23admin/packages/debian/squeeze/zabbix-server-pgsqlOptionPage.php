<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zabbix-server-pgsql");

$elem["zabbix-server-pgsql/server"]["type"]="note";
$elem["zabbix-server-pgsql/server"]["description"]="The SQL database must be upgraded manually
 The SQL database used by Zabbix must be upgraded manually using the scripts
 available in /usr/share/doc/zabbix-server-pgsql. Zabbix will not work properly
 until the database upgrade is completed.
";
$elem["zabbix-server-pgsql/server"]["descriptionde"]="";
$elem["zabbix-server-pgsql/server"]["descriptionfr"]="";
$elem["zabbix-server-pgsql/server"]["default"]="";
PKG_OptionPageTail2($elem);
?>
