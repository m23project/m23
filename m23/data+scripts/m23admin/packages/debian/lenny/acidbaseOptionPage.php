<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("acidbase");

$elem["acidbase/webserver"]["type"]="select";
$elem["acidbase/webserver"]["choices"][1]="Apache";
$elem["acidbase/webserver"]["choices"][2]="Apache2";
$elem["acidbase/webserver"]["choices"][3]="Apache-SSL";
$elem["acidbase/webserver"]["choices"][4]="All";
$elem["acidbase/webserver"]["choicesde"][1]="Apache";
$elem["acidbase/webserver"]["choicesde"][2]="Apache2";
$elem["acidbase/webserver"]["choicesde"][3]="Apache-SSL";
$elem["acidbase/webserver"]["choicesde"][4]="Alle";
$elem["acidbase/webserver"]["choicesfr"][1]="Apache";
$elem["acidbase/webserver"]["choicesfr"][2]="Apache2";
$elem["acidbase/webserver"]["choicesfr"][3]="Apache-SSL";
$elem["acidbase/webserver"]["choicesfr"][4]="Tous";
$elem["acidbase/webserver"]["description"]="Version(s) of Apache to configure automatically:
 BASE requires a few things to be set up in your web server configuration.
 .
 The Debian packaged version can usually automatically configure apache by
 dropping a symlink into the /etc/APACHE-SERVER/conf.d directory.
 Select \"None\" if you aren't running apache or you would prefer to set up
 the web server yourself. If you select a version to configure, all
 configuration changes will also be removed when the package is purged.
";
$elem["acidbase/webserver"]["descriptionde"]="Automatische einzurichtende Version(en) von Apache:
 BASE erfordert, dass einige Dinge in Ihrer Webserver-Konfiguration eingerichtet werden.
 .
 Dieses Debian-Paket kann Apache normalerweise automatisch einrichten, indem es einen symbolischen Link in das Verzeichnis /etc/APACHE-SERVER/conf.d platziert. Wählen Sie »Keine«, falls Sie keinen Apache verwenden oder falls Sie es vorziehen, den Webserver selbst einzurichten. Falls Sie eine Version zur Konfiguration auswählen, werden alle Konfigurationsänderungen entfernt, wenn das Paket vollständig gelöscht wird.
";
$elem["acidbase/webserver"]["descriptionfr"]="Version(s) d'Apache à configurer automatiquement :
 BASE a besoin de certains réglages spécifiques dans le fichier de configuration du serveur web.
 .
 La version de ce paquet permet de configurer automatiquement Apache en créant un lien symbolique dans le répertoire /etc/APACHE-SERVEUR/conf.d. Veuillez choisir « Aucun » si vous n'utilisez pas Apache ou si vous préférez mettre en place le serveur web vous-même. Si vous choisissez de configurer une version précise, tous les changements de la configuration seront retirés lors de la purge du paquet.
";
$elem["acidbase/webserver"]["default"]="${webserver}";
$elem["acidbase/base_advisory"]["type"]="note";
$elem["acidbase/base_advisory"]["description"]="NOTE: Manual configuration required
 You will need to go to http://localhost/acidbase first to force the
 database modifications for BASE.
";
$elem["acidbase/base_advisory"]["descriptionde"]="Manuelle Konfiguration erforderlich
 Sie müssen zuerst http://localhost/acidbase aufrufen, um die Datenbankänderungen für BASE zu erzwingen.
";
$elem["acidbase/base_advisory"]["descriptionfr"]="intervention manuelle indispensable
 Vous devez d'abord vous rendre sur http://localhost/acidbase afin de forcer les modifications de la base de données de BASE.
";
$elem["acidbase/base_advisory"]["default"]="";
PKG_OptionPageTail2($elem);
?>
