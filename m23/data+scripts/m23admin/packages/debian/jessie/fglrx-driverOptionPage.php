<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fglrx-driver");

$elem["fglrx-driver/needs-xorg-conf-to-enable"]["type"]="note";
$elem["fglrx-driver/needs-xorg-conf-to-enable"]["description"]="Manual configuration required to enable fglrx driver
 The fglrx driver is not yet configured.
 Please consider using /usr/bin/aticonfig to create a
 working xorg.conf configuration.
 .
 For example, \"sudo aticonfig --initial\" should
 be sufficient for most use cases.
";
$elem["fglrx-driver/needs-xorg-conf-to-enable"]["descriptionde"]="Manuelle Konfiguration erforderlich, um den Fglrx-Treiber zu aktivieren
 Der fglrx-Treiber ist noch nicht konfiguriert. Bitte ziehen Sie in Erwägung, /usr/bin/aticonfig zu verwenden, um eine funktionsfähige xorg.conf-Konfiguration zu erzeugen.
 .
 Beispielsweise sollte »sudo aticonfig --initial« für die meisten Fälle ausreichen.
";
$elem["fglrx-driver/needs-xorg-conf-to-enable"]["descriptionfr"]="Configuration manuelle indispensable pour activer le pilote Fglrx
 Le pilote Fglrx n'est pas encore configuré. Veuillez utiliser le programme /usr/bin/aticonfig pour mettre en place une configuration opérationnelle dans xorg.conf.
 .
 Par exemple, la commande « sudo aticonfig --initial » devrait convenir pour la plupart des cas.
";
$elem["fglrx-driver/needs-xorg-conf-to-enable"]["default"]="";
$elem["fglrx-driver/check-xorg-conf-on-removal"]["type"]="boolean";
$elem["fglrx-driver/check-xorg-conf-on-removal"]["description"]="for internal use
 Can be preseeded. If set to false, does not warn about fglrx still being
 enabled in xorg.conf(.d/) when removing the package.

";
$elem["fglrx-driver/check-xorg-conf-on-removal"]["descriptionde"]="";
$elem["fglrx-driver/check-xorg-conf-on-removal"]["descriptionfr"]="";
$elem["fglrx-driver/check-xorg-conf-on-removal"]["default"]="true";
$elem["fglrx-driver/removed-but-enabled-in-xorg-conf"]["type"]="note";
$elem["fglrx-driver/removed-but-enabled-in-xorg-conf"]["description"]="Fglrx driver is still enabled in xorg.conf
 The fglrx driver was just removed, but it is still enabled in the
 Xorg configuration. X cannot be (re-)started successfully until fglrx
 is disabled in the following config file(s):
 .
 ${config-files}
";
$elem["fglrx-driver/removed-but-enabled-in-xorg-conf"]["descriptionde"]="Fglrx-Treiber noch in xorg.conf aktiviert
 Der Fglrx-Treiber wurde gerade entfernt, ist aber in der Xorg-Konfiguration noch aktiviert. X kann nicht erfolgreich (neu-)gestartet werden, bis fglrx in folgenden Konfigurationsdateien deaktiviert wurde:
 .
 ${config-files}
";
$elem["fglrx-driver/removed-but-enabled-in-xorg-conf"]["descriptionfr"]="Pilote Fglrx toujours activé dans xorg.conf
 Le pilote Fglrx a été supprimé mais est toujours utilisé dans la configuration de X.org. Le serveur X ne peut pas être (re)démarré tant que ce pilote n'est pas désactivé dans le(s) fichier(s) de configuration suivant(s) :
 .
 ${config-files}
";
$elem["fglrx-driver/removed-but-enabled-in-xorg-conf"]["default"]="";
PKG_OptionPageTail2($elem);
?>
