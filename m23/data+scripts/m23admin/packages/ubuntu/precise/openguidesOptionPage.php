<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openguides");

$elem["openguides/check_old_upgrade"]["type"]="boolean";
$elem["openguides/check_old_upgrade"]["description"]="Okay to proceed with upgrade?
 You are trying to upgrade from a version of OpenGuides that used an old
 database schema. The migration is somewhat risky and so it is strongly
 recommended that you backup your OpenGuides databases before proceeding.
";
$elem["openguides/check_old_upgrade"]["descriptionde"]="Ok mit dem Upgrade fortzufahren?
 Sie versuchen ein Upgrade von einer Version von OpenGuides durchzuführen, die ein altes Datenbankschema verwendet. Die Migration ist etwas riskant und daher wird nachdrücklich empfohlen, dass Sie, bevor Sie fortfahren, ein Backup Ihrer OpenGuides-Datenbank durchführen.
";
$elem["openguides/check_old_upgrade"]["descriptionfr"]="Êtes-vous prêt à effectuer la mise à niveau ?
 Vous tentez une mise à niveau depuis une version d'OpenGuides qui utilise un ancien schéma de base de données. La migration est assez risquée et il est fortement recommandé d'effectuer au préalable une sauvegarde de votre base de données OpenGuides.
";
$elem["openguides/check_old_upgrade"]["default"]="";
PKG_OptionPageTail2($elem);
?>
