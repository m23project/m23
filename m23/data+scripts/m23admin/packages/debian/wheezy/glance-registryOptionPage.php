<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("glance-registry");

$elem["glance-registry/configure_db"]["type"]="boolean";
$elem["glance-registry/configure_db"]["description"]="Set up a database for glance-registry?
 No database has been set up for glance-registry to use. Before
 continuing, you should make sure you have:
 .
  - the server host name (that server must allow TCP connections
    from this machine);
  - a username and password to access the database.
  - A database type that you want to use.
 .
 If some of these requirements are missing, reject this option and
 run with regular sqlite support.
 .
 You can change this setting later on by running 'dpkg-reconfigure
 -plow glance-registry
";
$elem["glance-registry/configure_db"]["descriptionde"]="Eine Datenbank fÃ¼r die Glance-Registry einrichten?
 Es wurde keine Datenbank fÃ¼r die Benutzung mit der Glance-Registry eingerichtet. Bevor Sie fortfahren, sollten Sie sicherstellen, dass Sie Folgendes haben:
 .
  - den Rechnernamen des Servers (dieser Server muss TCP-Verbindungen von
    diesem Rechner erlauben)
  - einen Benutzernamen und ein Passwort, um auf die Datenbank zuzugreifen
  - einen Datenbaktyp, den Sie verwenden mÃ¶chten
 .
 Falls einige dieser Anforderungen nicht erfÃ¼llt sind, lehnen Sie diese Option ab und verwenden Sie die regulÃ¤re Sqlite-UnterstÃ¼tzung.
 .
 Sie kÃ¶nnen diese Einstellung spÃ¤ter Ã¤ndern, indem Sie Â»dpkg-reconfigure -plow glance-registryÂ« ausfÃ¼hren.
";
$elem["glance-registry/configure_db"]["descriptionfr"]="ParamÃ©trer une base de donnÃ©es pour le registre de glanceÂ ?
 Aucune base de donnÃ©es n'a Ã©tÃ© spÃ©cifiÃ©e pour le registre de glance. Avant  de continuer, assurez vous de connaÃ®treÂ : 
 .
 - le nom d'hÃ´te du serveur (ce serveur doit autoriser les connexions TCP
    depuis cette machine);
 - un identifiant et un mot de passe permettant d'accÃ©der Ã  cette base de donnÃ©es.
 - le type de base de donnÃ©es que vous souhaitez utiliser.
 .
 Si certains de ces prÃ©requis sont manquants, ne tenez pas compte de cette option. Une base de donnÃ©es SQLite sera alors utilisÃ©e.
 .
 Vous pouvez changer ce rÃ©glage plus tard en exÃ©cutant Â«Â dpkg-reconfigure -plow glance-registryÂ Â»
";
$elem["glance-registry/configure_db"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
