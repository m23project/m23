<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nova-common");

$elem["nova-common/start_services"]["type"]="boolean";
$elem["nova-common/start_services"]["description"]="Start nova services at boot?
 Please choose whether you want to start Nova services when the
 machine is booted up.
";
$elem["nova-common/start_services"]["descriptionde"]="Nova-Dienste beim Booten starten?
 Bitte wählen Sie, ob die Nova-Dienste automatisch gestartet werden sollen, wenn die Maschine hochgefahren wird.
";
$elem["nova-common/start_services"]["descriptionfr"]="Faut-il démarrer les services nova au démarrage ?
 Veuillez choisir s'il faut démarrer les services Nova lorsque la machine est démarrée.
";
$elem["nova-common/start_services"]["default"]="true";
$elem["nova-common/configure_db"]["type"]="boolean";
$elem["nova-common/configure_db"]["description"]="Set up a database for Nova?
 No database has been set up for Nova to use. If you want
 to set one up now, please make sure you have all needed
 information:
 .
  * the host name of the database server (which must allow TCP
    connections from this machine);
  * a username and password to access the database;
  * the type of database management software you want to use.
 .
 If you don't choose this option, no database will be set up and Nova
 will use regular SQLite support.
 .
 You can change this setting later on by running \"dpkg-reconfigure
 -plow nova-common\".
";
$elem["nova-common/configure_db"]["descriptionde"]="Datenbank für Nova einrichten?
 Bisher ist noch keine Datenbank eingerichtet worden, die Nova benutzen kann. Falls Sie das jetzt tun wollen, stellen Sie bitte sicher, dass Sie alle benötigten Informationen haben:
 .
  * der Rechnername des Datenbank-Servers (welcher TCP-Verbindungen von    dieser Maschine aus zulassen muss);
  * einen Benutzernamen samt Passwort, um auf die Datenbank zuzugreifen;
  * die Art von Datenbank-Verwaltungssoftware, die Sie verwenden wollen.
 .
 Wenn Sie diese Option nicht auswählen, wird keine Datenbank eingerichtet und Nova wird auf die normale SQLite-Unterstützung zurückgreifen.
 .
 Sie können diese Einstellung später durch Ausführen von »dpkg-reconfigure -plow nova-common« ändern.
";
$elem["nova-common/configure_db"]["descriptionfr"]="Faut-il installer une base de données pour Nova ?
 Aucune base de données n'a été installée pour Nova. Si vous souhaitez en installer une maintenant, veuillez vous assurer de disposer de toutes les informations nécessaires.
 .
  * le nom d'hôte du serveur de bases de données (qui doit autoriser les connexions TCP
    depuis cette machine);
  * un nom d'utilisateur et un mot de passe pour accéder à la base de données;
  * le type de gestionnaire de base de données que vous souhaitez utiliser
 .
 Si vous ne choisissez pas cette option, aucune base de données ne sera installée et Nova utilisera la gestion SQLite de base.
 .
 Vous pouvez changer ce réglage plus tard en exécutant « dpkg-reconfigure -plow nova-common ».
";
$elem["nova-common/configure_db"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
