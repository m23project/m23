<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("shorewall-common");

$elem["shorewall-common/dont_restart"]["type"]="note";
$elem["shorewall-common/dont_restart"]["description"]="No automatic restart for Shorewall
 Shorewall will not be restarted automatically after being upgraded,
 to prevent changes in configuration files causing network outages.
 .
 You should check Shorewall's configuration files and restart it with
 'invoke-rc.d shorewall restart'.
";
$elem["shorewall-common/dont_restart"]["descriptionde"]="Kein automatischer Neustart von Shorewall
 Shorewall wird nach der Aktualisierung nicht automatisch neu gestartet, damit Änderungen in den Konfigurationdateien keine Netzwerkunterbrechung verursachen.
 .
 Sie sollten Shorewalls Konfigurationsdateien überprüfen und das Programm mit dem Kommando 'invoke-rc.d shorewall restart' neu starten.
";
$elem["shorewall-common/dont_restart"]["descriptionfr"]="Pas de redémarrage automatique de Shorewall
 Shorewall ne sera pas redémarré automatiquement après la mise à jour, afin d'éviter des coupures complètes du réseau à cause des changements affectant les fichiers de configuration.
 .
 Vous devriez vérifier les fichiers de configuration de Shorewall puis le redémarrer avec la commande « invoke-rc.d shorewall restart ».
";
$elem["shorewall-common/dont_restart"]["default"]="";
$elem["shorewall-common/major_release"]["type"]="boolean";
$elem["shorewall-common/major_release"]["description"]="Restart Shorewall?
 This release of Shorewall introduces some changes in the
 configuration files - see
 /usr/share/doc/shorewall-common/releasenotes.txt.gz.
 .
 To avoid the risk of failures and network outages these files should
 be checked carefully before the firewall is restarted.
 .
 Please choose whether you want to restart Shorewall immediately.
";
$elem["shorewall-common/major_release"]["descriptionde"]="Shorewall neu starten?
 Diese Version von Shorewall bringt die einige Veränderungen in den Konfigurationsdateien mit sich - lesen Sie die Datei /usr/share/doc/shorewall-common/releasenotes.txt.gz.
 .
 Diese Dateien sollten sorgfältig überprüft werden, bevor die Firewall neu gestartet wird, um das Risiko von Fehlern und Netzwerkunterbrechungen zu minimieren.
 .
 Bitte stimmen Sie zu, wenn Sie Shorewall jetzt neu starten wollen.
";
$elem["shorewall-common/major_release"]["descriptionfr"]="Faut-il redémarrer Shorewall ?
 Cette version de Shorewall apporte certaines modifications aux fichiers de configuration. Vous devriez consulter le fichier /usr/share/doc/shorewall-common/releasenotes.txt.gz.
 .
 Afin d'éviter des erreurs et la perte d'accès réseau, vous devriez soigneusement vérifier ces fichiers de configuration avant de redémarrer le pare-feu.
 .
 Veuillez choisir si vous souhaitez redémarrer Shorewall immédiatement.
";
$elem["shorewall-common/major_release"]["default"]="";
$elem["shorewall-common/invalid_config"]["type"]="error";
$elem["shorewall-common/invalid_config"]["description"]="Invalid Shorewall configuration detected
 Shorewall is configured to restart on upgrades.
 .
 However, the current configuration for Shorewall is invalid and it
 will fail to restart. You should fix the program's configuration,
 then restart it with 'invoke-rc.d shorewall restart'.
";
$elem["shorewall-common/invalid_config"]["descriptionde"]="Ungültige Einstellungen bei Shorewall gefunden
 Shorewall ist eingerichtet, nach Aktualisierungen neu zu starten.
 .
 Die aktuellen Einstellungen von Shorewall sind ungültig und sein Neustart wird fehlschlagen. Sie sollten Shorewalls Einstellungen berichtigen und das Programm mit dem Kommando 'invoke-rc.d shorewall restart' neu starten.
";
$elem["shorewall-common/invalid_config"]["descriptionfr"]="Configuration non valable pour Shorewall
 Shorewall est configuré pour redémarrer lors des mises à jour.
 .
 Cependant, la configuration actuelle du programme n'est pas valable et il ne redémarrera pas correctement. Vous devriez corriger la configuration du programme et le redémarrer avec la commande « invoke-rc.d shorewall restart ».
";
$elem["shorewall-common/invalid_config"]["default"]="";
PKG_OptionPageTail2($elem);
?>
