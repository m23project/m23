<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("opendnssec-common");

$elem["opendnssec/migration-2.0"]["type"]="note";
$elem["opendnssec/migration-2.0"]["description"]="OpenDNSSEC 2.0.0 database and tools migration
 There are two steps in the database migration.  If you are running
 OpenDNSSEC 1.4.6 from Debian stable, you need to apply the SQL statements
 from /usr/share/opendnssec/migrate_1_4_8.{mysql,sqlite3} against your
 existing database.
 .
 The enforcer does require a full migration, as the internal database has
 been completely revised.  See the upstream documentation in the
 /usr/share/opendnssec/1.4-2.0_db_convert/README.md for a description.
 .
 You should also review the documentation on the OpenDNSSEC site.  This can
 be updated in between releases to provide more help.  Especially if you
 have tooling around OpenDNSSEC you should be aware that some command line
 utilities have changed.  A fair amount of backward compatibility has been
 respected, but changes are present.
";
$elem["opendnssec/migration-2.0"]["descriptionde"]="";
$elem["opendnssec/migration-2.0"]["descriptionfr"]="";
$elem["opendnssec/migration-2.0"]["default"]="";
PKG_OptionPageTail2($elem);
?>
