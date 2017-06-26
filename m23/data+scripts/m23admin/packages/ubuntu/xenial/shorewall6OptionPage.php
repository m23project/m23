<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("shorewall6");

$elem["shorewall6/dont_restart"]["type"]="note";
$elem["shorewall6/dont_restart"]["description"]="No automatic restart for Shorewall6
 Shorewall6 will not be restarted automatically after being upgraded,
 to prevent changes in configuration files causing network outages.
 .
 You should check Shorewall6's configuration files and restart it with
 'invoke-rc.d shorewall6 restart'.
";
$elem["shorewall6/dont_restart"]["descriptionde"]="Kein automatischer Neustart von Shorewall6
 Shorewall6 wird nach der Aktualisierung nicht automatisch neu gestartet, damit Änderungen in den Konfigurationdateien keine Netzwerkunterbrechung verursachen.
 .
 Sie sollten Shorewall6's Konfigurationsdateien überprüfen und das Programm mit dem Kommando 'invoke-rc.d shorewall6 restart' neu starten.
";
$elem["shorewall6/dont_restart"]["descriptionfr"]="Pas de redémarrage automatique de Shorewall6
 Shorewall6 ne sera pas redémarré automatiquement après la mise à jour, afin d'éviter des coupures complètes du réseau à cause des changements affectant les fichiers de configuration.
 .
 Vous devriez vérifier les fichiers de configuration de Shorewall6 puis le redémarrer avec la commande « invoke-rc.d shorewall6 restart ».
";
$elem["shorewall6/dont_restart"]["default"]="";
$elem["shorewall6/major_release"]["type"]="boolean";
$elem["shorewall6/major_release"]["description"]="Restart Shorewall6?
 To avoid the risk of failures and network outages, configuration files
 should be checked carefully before the firewall is restarted.
 .
 Please choose whether you want to restart Shorewall6 immediately.
";
$elem["shorewall6/major_release"]["descriptionde"]="Shorewall6 neu starten?
 Diese Dateien sollten sorgfältig überprüft werden, bevor die Firewall neu gestartet wird, um das Risiko von Fehlern und Netzwerkunterbrechungen zu minimieren.
 .
 Bitte stimmen Sie zu, wenn Sie Shorewall6 jetzt neu starten wollen.
";
$elem["shorewall6/major_release"]["descriptionfr"]="Faut-il redémarrer Shorewall6 ?
 Afin d'éviter des erreurs et la perte d'accès réseau, vous devriez soigneusement vérifier les fichiers de configuration avant de redémarrer le pare-feu.
 .
 Veuillez choisir si vous souhaitez redémarrer Shorewall6 immédiatement.
";
$elem["shorewall6/major_release"]["default"]="";
$elem["shorewall6/invalid_config"]["type"]="error";
$elem["shorewall6/invalid_config"]["description"]="Invalid Shorewall6 configuration detected
 Shorewall6 is configured to restart on upgrades.
 .
 However, the current configuration for Shorewall6 is invalid and it
 will fail to restart. You should fix the program's configuration,
 then restart it with 'invoke-rc.d shorewall6 restart'.
";
$elem["shorewall6/invalid_config"]["descriptionde"]="Ungültige Einstellungen bei Shorewall6 gefunden
 Shorewall6 ist eingerichtet, nach Aktualisierungen neu zu starten.
 .
 Die aktuellen Einstellungen von Shorewall6 sind ungültig und sein Neustart wird fehlschlagen. Sie sollten Shorewall6's Einstellungen berichtigen und das Programm mit dem Kommando 'invoke-rc.d shorewall6 restart' neu starten.
";
$elem["shorewall6/invalid_config"]["descriptionfr"]="Configuration non valable pour Shorewall6
 Shorewall6 est configuré pour redémarrer lors des mises à jour.
 .
 Cependant, la configuration actuelle du programme n'est pas valable et il ne redémarrera pas correctement. Vous devriez corriger la configuration du programme et le redémarrer avec la commande « invoke-rc.d shorewall6 restart ».
";
$elem["shorewall6/invalid_config"]["default"]="";
PKG_OptionPageTail2($elem);
?>
