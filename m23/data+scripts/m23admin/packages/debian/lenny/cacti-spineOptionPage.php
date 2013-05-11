<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cacti-spine");

$elem["cacti-spine/configuring_cacti"]["type"]="note";
$elem["cacti-spine/configuring_cacti"]["description"]="cacti must be configured to use spine!
 In order to use the spine poller, cacti must be configured via its web
 based interface.  Even if you have previously configured cacti to use
 spine via debconf, you must now perform this step via the web based
 control panel.  For instructions on how to do this, please read
 /usr/share/doc/cacti-spine/README.Debian.
";
$elem["cacti-spine/configuring_cacti"]["descriptionde"]="Cacti muss konfiguriert werden, um Spine zu verwenden!
 Damit der Spine-Abfrager verwendet werden kann, muss Cacti über seine webbasierte Schnittstelle konfiguriert werden. Selbst falls Sie früher Cacti über Debconf konfiguriert haben, Spine zu verwenden, müssen Sie diesen Schritt jetzt über die webbasierte Steuerung ausführen. Lesen Sie bitte /usr/share/doc/cacti-spine/README.Debian für Anweisungen, wie dies durchgeführt wird.
";
$elem["cacti-spine/configuring_cacti"]["descriptionfr"]="Configuration obligatoire de cacti pour utiliser spine
 Afin d'utiliser le programme de récupération (« poller ») spine, Cacti doit être configuré par son interface web. Même si vous avez précédemment configuré Cacti pour utiliser spine via debconf, vous devez maintenant exécuter cette étape de configuration via l'interface web. Veuillez consulter le fichier /usr/share/doc/cacti-spine/README.Debian pour obtenir plus d'informations à propos de la configuration.
";
$elem["cacti-spine/configuring_cacti"]["default"]="";
PKG_OptionPageTail2($elem);
?>
