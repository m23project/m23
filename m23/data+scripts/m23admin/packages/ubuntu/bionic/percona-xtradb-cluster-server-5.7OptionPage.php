<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("percona-xtradb-cluster-server-5.7");

$elem["mysql-server/root_password"]["type"]="password";
$elem["mysql-server/root_password"]["description"]="New password for the MySQL \"root\" user:
 While not mandatory, it is highly recommended that you set a password
 for the MySQL administrative \"root\" user.
 .
 If this field is left blank, the password will not be changed.

";
$elem["mysql-server/root_password"]["descriptionde"]="";
$elem["mysql-server/root_password"]["descriptionfr"]="";
$elem["mysql-server/root_password"]["default"]="";
$elem["mysql-server/root_password_again"]["type"]="password";
$elem["mysql-server/root_password_again"]["description"]="Repeat password for the MySQL \"root\" user:

";
$elem["mysql-server/root_password_again"]["descriptionde"]="";
$elem["mysql-server/root_password_again"]["descriptionfr"]="";
$elem["mysql-server/root_password_again"]["default"]="";
$elem["mysql-server/password_mismatch"]["type"]="error";
$elem["mysql-server/password_mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.

";
$elem["mysql-server/password_mismatch"]["descriptionde"]="";
$elem["mysql-server/password_mismatch"]["descriptionfr"]="";
$elem["mysql-server/password_mismatch"]["default"]="";
$elem["percona-xtradb-cluster-server-5.7/remove-data-dir"]["type"]="boolean";
$elem["percona-xtradb-cluster-server-5.7/remove-data-dir"]["description"]="Remove all MySQL databases?
 The /var/lib/percona-xtradb-cluster directory which contains the MySQL
 databases is about to be removed.
 .
 This will also erase all data in /var/lib/mysql-files as well as
 /var/lib/mysql-keyring.
 .
 If you're removing the PXC package in order to later install a more
 recent version or if a different mysql-server package is already
 using it, the data should be kept.

";
$elem["percona-xtradb-cluster-server-5.7/remove-data-dir"]["descriptionde"]="";
$elem["percona-xtradb-cluster-server-5.7/remove-data-dir"]["descriptionfr"]="";
$elem["percona-xtradb-cluster-server-5.7/remove-data-dir"]["default"]="false";
$elem["percona-xtradb-cluster-server-5.7/data-dir"]["type"]="note";
$elem["percona-xtradb-cluster-server-5.7/data-dir"]["description"]="Data directory found when no Percona Server package is installed
 A data directory '/var/lib/mysql' is present on this system when no MySQL server
 package is currently installed on the system. The directory may be under control of
 server package received from third-party vendors. It may also be an unclaimed data
 directory from previous removal of mysql packages.
 .
 It is highly recommended to take data backup. If you have not done so, now would be
 the time to take backup in another shell. Once completed, press 'Ok' to continue.
";
$elem["percona-xtradb-cluster-server-5.7/data-dir"]["descriptionde"]="";
$elem["percona-xtradb-cluster-server-5.7/data-dir"]["descriptionfr"]="";
$elem["percona-xtradb-cluster-server-5.7/data-dir"]["default"]="";
PKG_OptionPageTail2($elem);
?>
