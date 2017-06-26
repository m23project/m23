<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("rally");

$elem["rally/configure_db"]["type"]="boolean";
$elem["rally/configure_db"]["description"]="Set up a database for Rally?
 No database has been set up for rally to use. Before continuing, you should
 make sure you have the following information:
 .
  * the type of database that you want to use;
  * the database server hostname (that server must allow TCP
    connections from this machine);
  * a username and password to access the database.
 .
 If some of these requirements are missing, do not choose this option and run with
 regular SQLite support.
 .
 You can change this setting later on by running \"dpkg-reconfigure -plow
 rally\".
";
$elem["rally/configure_db"]["descriptionde"]="";
$elem["rally/configure_db"]["descriptionfr"]="Faut-il installer une base de données pour Rally ?
 Aucune base de données n'a été installée pour Rally. Si vous souhaitez en installer une maintenant, veuillez vous assurer de disposer de toutes les informations nécessaires :
 .
  * le type de bases de données que vous souhaitez utiliser;
  * le nom d'hôte du serveur de bases de données (qui doit
     autoriser les connexions TCP depuis cette machine);
  * un identifiant et un mot de passe pour accéder à la base de données.
 .
 Si certains de ces prérequis sont manquants, ne choisissez pas cette option et utilisez la gestion SQLite de base.
 .
 Vous pouvez changer ce réglage plus tard en exécutant « dpkg-reconfigure -plow rally ».
";
$elem["rally/configure_db"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
