<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zabbix-server-mysql");

$elem["zabbix-server-mysql/server"]["type"]="note";
$elem["zabbix-server-mysql/server"]["description"]="The SQL database must be upgraded manually
 The SQL database used by Zabbix must be upgraded manually using the scripts
 available in /usr/share/doc/zabbix-server-mysql. Zabbix will not work properly
 until the database upgrade is completed.
";
$elem["zabbix-server-mysql/server"]["descriptionde"]="Die SQL-Datenbank von Zabbix muss manuell für die neue Version angepasst werden.
 Die SQL-Datenbank von Zabbix muss manuell für die neue Version angepasst werden. Nutzen Sie dazu bitte die Skripte im Verzeichnis /usr/share/doc/zabbix-server-mysql. Zabbix wird ohne die Änderungen nicht korrekt funktionieren.
";
$elem["zabbix-server-mysql/server"]["descriptionfr"]="Mise à jour nécessaire de la base de données SQL
 La base de données SQL utilisée par Zabbix doit être mise à jour avec lesscripts situés dans /usr/share/doc/zabbix-server-mysql. Zabbix ne pourra pas fonctionner correctement sans cela.
";
$elem["zabbix-server-mysql/server"]["default"]="";
PKG_OptionPageTail2($elem);
?>
