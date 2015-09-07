<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("keystone");

$elem["keystone/configure_db"]["type"]="boolean";
$elem["keystone/configure_db"]["description"]="Set up a database for keystone?
 No database has been set up for keystone to use. Before continuing,
 you should make sure you have:
 .
  - the server host name (that server must allow TCP connections
    from this machine);
  - a username and password to access the database.
  - A database type that you want to use.
 .
 If some of these requirements are missing, reject this option and
 run with regular sqlite support.
 .
 Database configuration can be reconfigured later by running
 'dpkg-reconfigure -plow keystone'.
";
$elem["keystone/configure_db"]["descriptionde"]="";
$elem["keystone/configure_db"]["descriptionfr"]="";
$elem["keystone/configure_db"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
