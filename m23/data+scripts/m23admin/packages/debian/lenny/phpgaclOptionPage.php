<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("phpgacl");

$elem["phpgacl/apache"]["type"]="select";
$elem["phpgacl/apache"]["choices"][1]="Apache";
$elem["phpgacl/apache"]["choices"][2]="Apache2";
$elem["phpgacl/apache"]["choices"][3]="Apache-SSL";
$elem["phpgacl/apache"]["choices"][4]="All";
$elem["phpgacl/apache"]["choicesde"][1]="Apache";
$elem["phpgacl/apache"]["choicesde"][2]="Apache2";
$elem["phpgacl/apache"]["choicesde"][3]="Apache-SSL";
$elem["phpgacl/apache"]["choicesde"][4]="Alle";
$elem["phpgacl/apache"]["choicesfr"][1]="Apache";
$elem["phpgacl/apache"]["choicesfr"][2]="Apache2";
$elem["phpgacl/apache"]["choicesfr"][3]="Apache-SSL";
$elem["phpgacl/apache"]["choicesfr"][4]="Toutes";
$elem["phpgacl/apache"]["description"]="Version(s) of Apache to configure automatically:
 phpGACL requires a few things to be set up in your web server
 configuration in order for the front end to function properly.
 .
 The Debian packaged version can usually automatically configure apache by
 dropping a symlink into the /etc/APACHE-SERVER/conf.d directory.
 Select \"None\" if you aren't running apache or you would prefer to set up
 the web server yourself. If you select a version to configure, all
 configuration changes will also be removed when the package is purged.
";
$elem["phpgacl/apache"]["descriptionde"]="Apache-Version(en), die automatisch konfiguriert werden sollen:
 Für phpGACL müssen einige Dinge in Ihrer Webserver-Konfiguration eingerichtet werden, damit die Oberfläche richtig funktioniert.
 .
 Die von Debian paketierte Version kann normalerweise Apache automatisch konfigurieren, indem ein Symlink in das /etc/APACHE-SERVER/conf.d-Verzeichnis abgelegt wird. Wählen Sie »Keine« falls Sie Apache nicht betreiben oder bevorzugen, den Webserver selbst einzurichten. Falls Sie eine Version zum konfigurieren auswählen werden alle Konfigurationsänderungen auch entfernt, wenn Sie das Paket vollständig entfernen.
";
$elem["phpgacl/apache"]["descriptionfr"]="Version(s) d'Apache à configurer automatiquement :
 Pour fonctionner correctement, phpGACL a besoin d'effectuer quelques modifications dans la configuration du serveur web.
 .
 Le paquet peut généralement configurer automatiquement Apache en créant un lien symbolique dans le répertoire /etc/APACHE-SERVER/conf.d. Choisissez « Aucune » si vous n'utilisez pas Apache ou si vous préférez configurer le serveur web vous-même. Si vous choisissez une ou plusieurs versions d'Apache, tous les changements de configuration seront supprimés lors de la purge du paquet.
";
$elem["phpgacl/apache"]["default"]="";
$elem["phpgacl/conffile_changed"]["type"]="note";
$elem["phpgacl/conffile_changed"]["description"]="Obsolete configuration file
 Your system has an obsolete configuration file
 (/etc/phpgacl/phpgacl.conf.php). Please, review the new configuration file
 (/etc/phpgacl/gacl.ini.php) and remove the obsolete one.
";
$elem["phpgacl/conffile_changed"]["descriptionde"]="Veraltete Konfigurationsdatei
 Auf Ihrem System befindet sich eine veraltete Konfigurationsdatei (/etc/phpgacl/phpgacl.conf.php). Bitte prüfen Sie die neue Konfigurationsdatei (/etc/phpgacl/gacl.ini.php) und entfernen Sie die veraltete.
";
$elem["phpgacl/conffile_changed"]["descriptionfr"]="Fichier de configuration obsolète
 Une version obsolète du fichier de configuration (/etc/phpgacl/phpgacl.conf.php) a été détectée. Vous devriez vérifier le nouveau fichier de configuration (/etc/phpgacl/gacl.ini.php) et supprimer l'ancien.
";
$elem["phpgacl/conffile_changed"]["default"]="";
PKG_OptionPageTail2($elem);
?>
