<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libwiki-toolkit-perl");

$elem["libwiki-toolkit-perl/schema_upgrade_warn"]["type"]="boolean";
$elem["libwiki-toolkit-perl/schema_upgrade_warn"]["description"]="Install version of Wiki::Toolkit requiring schema upgrade?
 You are about to install a version of Wiki::Toolkit which requires a
 database schema upgrade. Until you have run the upgrade procedure on
 Wiki::Toolkit databases, this will cause applications using Wiki::Toolkit
 to stop working.
 .
 If your Wiki::Toolkit application installed an upgrade hook, this upgrade
 procedure will optionally run this hook to automatically upgrade the
 database(s) belonging to this application.
";
$elem["libwiki-toolkit-perl/schema_upgrade_warn"]["descriptionde"]="Version von Wiki::Toolkit installieren, die ein Schema-Upgrade benötigt?
 Sie sind dabei, eine Version von Wiki::Toolkit zu installieren, die ein Upgrade des Datenbank-Schematas benötigt. Bis die Upgrade-Prozedur von Ihnen ausgeführt wurde, werden daher Anwendungen, die Wiki::Toolkit verwenden, nicht mehr funktionieren.
 .
 Falls Ihre Wiki::Toolkit-Anwendung einen Upgrade-Hook installierte, wird dieses Upgrade ihn optional ausführen, um das Upgrade der zu dieser/diesen Anwendung(en) gehörenden Datenbank(en) durchzuführen.
";
$elem["libwiki-toolkit-perl/schema_upgrade_warn"]["descriptionfr"]="Faut-il mettre Wiki::Toolkit à niveau ?
 Vous êtes sur le point d'installer une version de Wiki::Toolkit qui impose une mise à jour du schéma de la base de données. Tant que cette mise à jour n'aura pas eu lieu, les applications qui utilisent Wiki::Toolkit ne fonctionneront pas.
 .
 Si une application qui utilise Wiki::Toolkit a installé un point d'entrée pour un script de mise à niveau (« upgrade hook »), ce script sera exécuté automatiquement et mettra à niveau la ou les bases de données de l'application.
";
$elem["libwiki-toolkit-perl/schema_upgrade_warn"]["default"]="";
$elem["libwiki-toolkit-perl/schema_upgrade_auto"]["type"]="boolean";
$elem["libwiki-toolkit-perl/schema_upgrade_auto"]["description"]="Automatically upgrade Wiki::Toolkit databases?
 Upgrade hooks provided by Wiki::Toolkit applications have been found.
 They can be run after the package upgrade completes to automatically
 upgrade the relevant databases.
 .
 It is recommended that you backup your Wiki::Toolkit databases before
 upgrading them.
";
$elem["libwiki-toolkit-perl/schema_upgrade_auto"]["descriptionde"]="Automatisches Upgrade der Wiki::Toolkit-Datenbanken durchführen?
 Es wurden Upgrade-Hooks von Wiki::Toolkit-Anwendungen gefunden. Sie können nach Beendigung des Paket-Upgrades ausgeführt werden, um automatisch ein Upgrade der relevanten Datenbanken durchzuführen.
 .
 Es wird empfohlen, dass Sie ein Backup Ihrer Wiki::Toolkit-Datenbanken vor deren Upgrade durchführen.
";
$elem["libwiki-toolkit-perl/schema_upgrade_auto"]["descriptionfr"]="Mettre à jour automatiquement les bases de données de Wiki::Toolkit ?
 Des points d'entrée pour scripts de mises à niveau d'applications utilisant Wiki::Toolkit ont été trouvés. Ces scripts peuvent être exécutés après la mise à jour du paquet pour mettre à niveau les bases de données de ces applications.
 .
 Vous devriez sauvegarder les bases de données Wiki::Toolkit avant de les mettre à jour.
";
$elem["libwiki-toolkit-perl/schema_upgrade_auto"]["default"]="";
PKG_OptionPageTail2($elem);
?>
