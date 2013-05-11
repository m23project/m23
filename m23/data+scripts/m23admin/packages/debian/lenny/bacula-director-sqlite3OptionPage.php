<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bacula-director-sqlite3");

$elem["bacula-director-sqlite3/create_tables"]["type"]="boolean";
$elem["bacula-director-sqlite3/create_tables"]["description"]="Create tables for Bacula's Catalog?
 The tables needed for Bacula's catalog are missing.  This is normal
 for a fresh install of Bacula.  These tables are needed for the
 Bacula director to function.

";
$elem["bacula-director-sqlite3/create_tables"]["descriptionde"]="";
$elem["bacula-director-sqlite3/create_tables"]["descriptionfr"]="";
$elem["bacula-director-sqlite3/create_tables"]["default"]="true";
$elem["bacula-director-sqlite3/remove_catalog_on_purge"]["type"]="boolean";
$elem["bacula-director-sqlite3/remove_catalog_on_purge"]["description"]="Remove Catalog on purge?
 If you want to remove the Bacula catalog when the package is purged,
 you should choose this option.
";
$elem["bacula-director-sqlite3/remove_catalog_on_purge"]["descriptionde"]="";
$elem["bacula-director-sqlite3/remove_catalog_on_purge"]["descriptionfr"]="";
$elem["bacula-director-sqlite3/remove_catalog_on_purge"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
