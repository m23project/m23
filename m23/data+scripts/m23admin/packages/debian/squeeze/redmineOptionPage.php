<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("redmine");

$elem["redmine/notify-migration"]["type"]="note";
$elem["redmine/notify-migration"]["description"]="Redmine package now supports multiple instances
 You are migrating from an unsupported version.
 The current instance will be now called the \"default\" instance.
 Please check your web server configuration files, see README.Debian.
";
$elem["redmine/notify-migration"]["descriptionde"]="Das Redmine-Paket unterstützt jetzt mehrere Instanzen
 Sie migrieren von einer nicht unterstützten Version. Die aktuelle Instanz wird jetzt die »default«-Instanz genannt. Bitte überprüfen Sie Ihre Webserver-Konfigurationsdateien; lesen Sie dazu README.Debian.
";
$elem["redmine/notify-migration"]["descriptionfr"]="Gestion de plusieurs instances de Redmine
 Vous êtes en train de faire migrer Redmine depuis une version non gérée. L'instance actuelle va désormais s'appeler « default ». Veuillez vérifier la configuration du serveur web en vous aidant des indications du fichier /usr/share/doc/redmine/README.Debian.
";
$elem["redmine/notify-migration"]["default"]="";
$elem["redmine/old-instances"]["type"]="string";
$elem["redmine/old-instances"]["description"]="Redmine instances to be deconfigured:
 Configuration files for these instances will be removed.
 .
 Database (de)configuration will be asked accordingly.
";
$elem["redmine/old-instances"]["descriptionde"]="Zu dekonfigurierende Redmine-Instanzen:
 Konfigurationsdateien für diese Instanzen werden entfernt.
 .
 Fragen zur Datenbank(de)konfiguration werden entsprechend gestellt.
";
$elem["redmine/old-instances"]["descriptionfr"]="Instances Redmine qui seront déconfigurées :
 Les fichiers de configuration pour les instances déconfigurées seront supprimés.
 .
 La déconfiguration des bases de données correspondantes sera effectuée.
";
$elem["redmine/old-instances"]["default"]="";
$elem["redmine/current-instances"]["type"]="string";
$elem["redmine/current-instances"]["description"]="Redmine instances to be configured or upgraded:
 Space-separated list of instances identifiers.
 . 
 Each instance has its configuration files in /etc/redmine/<instance-identifier>/
 .
 To deconfigure an instance, remove its identifier from this list.
";
$elem["redmine/current-instances"]["descriptionde"]="Redmine-Instanzen, die konfiguriert oder für die ein Upgrade durchgeführt werden soll:
 Durch Leerzeichen getrennte Liste von Instanz-Bezeichnern.
 .
 Für jede Instanz befinden sich die Konfigurationsdateien in /etc/redmine/<Instanz-Bezeichner>/
 .
 Um eine Instanz zu dekonfigurieren, entfernen Sie seinen Bezeichner aus dieser Liste.
";
$elem["redmine/current-instances"]["descriptionfr"]="Instances Redmine qui seront configurées ou mises à jour :
 Veuillez indiquer, séparés par des espaces, les identifiants des instances à mettre à jour ou configurer. 
 .
 Les fichiers de configuration de chaque instance sont conservés dans /etc/redmine/<identifiant-instance>/.
 .
 Pour déconfigurer une instance, il suffit de retirer son identifiant de cette liste.
";
$elem["redmine/current-instances"]["default"]="default";
$elem["redmine/default-language"]["type"]="select";
$elem["redmine/default-language"]["description"]="Default redmine language:
";
$elem["redmine/default-language"]["descriptionde"]="Standardsprache für Redmine:
";
$elem["redmine/default-language"]["descriptionfr"]="Langue par défaut de Redmine :
";
$elem["redmine/default-language"]["default"]="${defaultLocale}";
$elem["redmine/missing-redmine-package"]["type"]="error";
$elem["redmine/missing-redmine-package"]["description"]="redmine-${dbtype} package required
 Redmine instance ${instance} is configured to use database type ${dbtype},
 but the corresponding redmine-${dbtype} package is not installed.
 .
 Configuration of instance ${instance} is aborted.
 .
 To finish that configuration, please install the redmine-${dbtype} package, and reconfigure redmine using:
 .
 dpkg-reconfigure -plow redmine
";
$elem["redmine/missing-redmine-package"]["descriptionde"]="Paket redmine-${dbtype} wird benötigt
 Die Redmine-Instanz ${instance} is so konfiguriert, dass Sie den Datenbanktyp ${dbtype} verwendet, aber das entsprechende Paket redmine-${dbtype} ist nicht installiert.
 .
 Konfiguration der Instanz ${instance} wird abgebrochen.
 .
 Um die Konfiguration zu beenden, installieren Sie bitte das Paket redmine-${dbtype} und konfigurieren Sie Redmine durch folgende Eingabe neu:
 .
 dpkg-reconfigure -plow redmine
";
$elem["redmine/missing-redmine-package"]["descriptionfr"]="Paquet redmine-${dbtype} indispensable
 L'instance Redmine ${instance} est configurée pour utiliser une base de données de type ${dbtype}, mais le paquet correspondant redmine-${dbtype} n'est pas installé.
 .
 La configuration de l'instance ${instance} est interrompue.
 .
 Pour terminer cette configuration, veuillez installer le paquet redmine-${dbtype}, puis reconfigurez redmine à l'aide de la commande suivante:
 .
 dpkg-reconfigure -plow redmine
";
$elem["redmine/missing-redmine-package"]["default"]="";
PKG_OptionPageTail2($elem);
?>
