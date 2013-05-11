<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bacula-director-sqlite");

$elem["bacula-director-sqlite/create_tables"]["type"]="boolean";
$elem["bacula-director-sqlite/create_tables"]["description"]="Create tables for Bacula's catalog?
 The tables needed for Bacula's catalog are missing. This is normal
 for a fresh install of Bacula.
 .
 These tables are needed for the Bacula director to function.
 Please choose whether these tables should be automatically created.
";
$elem["bacula-director-sqlite/create_tables"]["descriptionde"]="Tabellen für Baculas Katalog erzeugen?
 Die für Baculas Katalog benötigten Tabellen fehlen. Dies ist bei einer frischen Installation von Bacula normal.
 .
 Diese Tabellen werden benötigt, damit Baculas Director funktioniert. Bitte wählen Sie aus, ob diese Tabellen automatisch für Sie eingerichtet werden sollen.
";
$elem["bacula-director-sqlite/create_tables"]["descriptionfr"]="Faut-il créer les tables du catalogue de Bacula ?
 Les tables nécessaires au catalogue de Bacula sont absentes. Cette situation est normale pour une nouvelle installation.
 .
 Ces tables sont nécessaires pour le bon fonctionnement de Bacula. Choisissez cette option pour configurer automatiquement ces tables.
";
$elem["bacula-director-sqlite/create_tables"]["default"]="true";
$elem["bacula-director-sqlite/remove_catalog_on_purge"]["type"]="boolean";
$elem["bacula-director-sqlite/remove_catalog_on_purge"]["description"]="Remove catalog on purge?
 Please choose whether the Bacula catalog should be removed when
 the director package is purged.
";
$elem["bacula-director-sqlite/remove_catalog_on_purge"]["descriptionde"]="Katalog beim vollständigen Entfernen löschen?
 Bitte wählen Sie aus, ob der Bacula Katalog gelöscht werden soll, wenn das Paket Director vollständig entfernt (»purged«) wird.
";
$elem["bacula-director-sqlite/remove_catalog_on_purge"]["descriptionfr"]="Faut-il supprimer le catalogue lors de la purge du paquet ?
 Choisissez cette option pour supprimer le catalogue de Bacula lors de la purge du paquet fournissant le service de supervision (« director ») de Bacula.
";
$elem["bacula-director-sqlite/remove_catalog_on_purge"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
