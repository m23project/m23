<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("watchdog");

$elem["watchdog/run"]["type"]="boolean";
$elem["watchdog/run"]["description"]="Start watchdog at boot time?
 Please specify whether watchdog should be started as part of the boot
 process. This can be changed later by editing /etc/default/watchdog.
";
$elem["watchdog/run"]["descriptionde"]="Watchdog im Bootprozess starten?
 Bitte geben Sie an, ob Watchdog als Teil des Bootprozesses gestartet werden soll. Dies kann später in der Datei /etc/default/watchdog geändert werden.
";
$elem["watchdog/run"]["descriptionfr"]="Faut-il lancer watchdog au démarrage ?
 Veuillez indiquer si vous désirez démarrer watchdog à l'amorçage de l'ordinateur. Vous pourrez changer ce comportement plus tard en modifiant le fichier /etc/default/watchdog.
";
$elem["watchdog/run"]["default"]="true";
$elem["watchdog/restart"]["type"]="boolean";
$elem["watchdog/restart"]["description"]="Restart watchdog on upgrades?
 If the kernel is configured with the CONFIG_WATCHDOG_NOWAYOUT option
 (which is not the default setting), restarting watchdog will cause a
 spurious reboot (the kernel will assume that the watchdog daemon
 crashed).
";
$elem["watchdog/restart"]["descriptionde"]="Watchdog nach einem Upgrade neu starten?
 Falls der Kernel mit der Option CONFIG_WATCHDOG_NOWAYOUT konfiguriert wurde (was nicht die Standardeinstellung ist), führt der Neustart von Watchdog zum Neustart des Systems, weil der Kernel denkt, der Watchdog-Prozess wäre abgestürzt.
";
$elem["watchdog/restart"]["descriptionfr"]="Faut-il redémarrer watchdog lors des mises à jour ?
 Si le noyau est configuré avec l'option CONFIG_WATCHDOG_NOWAYOUT (ce qui n'est pas l'option par défaut), le redémarrage de watchdog causera un réamorçage indésirable (le noyau pensera que le démon s'est brutalement arrêté).
";
$elem["watchdog/restart"]["default"]="false";
$elem["watchdog/module"]["type"]="string";
$elem["watchdog/module"]["description"]="Watchdog module to preload:
 Please choose which watchdog module should be preloaded before
 starting watchdog. The 'softdog' module should be suited for all
 installations. Enter 'none' if you don't want the script to load
 a module.
";
$elem["watchdog/module"]["descriptionde"]="Watchdog-Modul, das vorgeladen werden soll:
 Bitte wählen Sie aus, welches Modul vor dem Start des Servers geladen werden soll. Das Modul »softdog« sollte für alle Installationen geeignet sein. Falls kein Modul geladen werden soll, bitte »none« eingeben.
";
$elem["watchdog/module"]["descriptionfr"]="Module watchdog à précharger :
 Veuillez choisir le module watchdog qui doit être préchargé avant de lancer watchdog. Le module « softdog » est adapté à toutes les situations. Vous pouvez indiquer « none » si vous ne souhaitez pas précharger de module.
";
$elem["watchdog/module"]["default"]="none";
PKG_OptionPageTail2($elem);
?>
