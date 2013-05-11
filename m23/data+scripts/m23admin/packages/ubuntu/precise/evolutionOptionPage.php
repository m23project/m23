<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("evolution");

$elem["evolution/needs_shutdown"]["type"]="error";
$elem["evolution/needs_shutdown"]["description"]="Running instances of Evolution detected
 You are currently upgrading Evolution to a version with an incompatible
 index format. However, it has been detected that Evolution is
 currently running. Upgrading it before shutting it down could lead to
 crashes or to serious data loss in some cases.
 .
 You need to shut down all running instances of Evolution using the
 \"evolution --force-shutdown\" command before the upgrade can proceed.
 .
 If this command isn't sufficient, you might want to quit all desktop
 environments before upgrading.
";
$elem["evolution/needs_shutdown"]["descriptionde"]="Laufende Instanzen von Evolution erkannt
 Sie führen derzeit ein Upgrade von Evolution auf eine Version mit einem inkompatiblen Indexformat durch. Es wurde allerdings erkannt, dass Evolution derzeit läuft. Wird das Upgrade durchgeführt, bevor Evolution beendet wurde, können in Einzelfällen ernsthafte Datenverluste auftreten.
 .
 Sie müssen alle laufenden Instanzen von Evolution mittels des Befehls »evolution --force-shutdown« beenden, bevor das Upgrade durchgeführt werden kann.
 .
 Falls dieser Befehl nicht ausreicht, könnte es sinnvoll sein, dass Sie alle Desktop-Umgebungen vor dem Upgrade beenden.
";
$elem["evolution/needs_shutdown"]["descriptionfr"]="Evolution est actuellement utilisé
 Vous êtes en train de mettre à jour Evolution vers une version avec un format d'index incompatible avec celui que vous utilisez. Cependant, Evolution semble être actuellement en cours d'exécution. Effectuer sa mise à jour sans l'arrêter peut conduire à des instabilités ou parfois à d'importantes pertes de données.
 .
 Vous devez arrêter toutes les instances actuelles d'Evolution avec la commande « evolution --force-shutdown » avant d'effectuer la mise à jour.
 .
 Si cette commande ne suffit pas, il peut être nécessaire de fermer tous les environnements graphique de bureau avant d'effectuer la mise à jour.
";
$elem["evolution/needs_shutdown"]["default"]="";
$elem["evolution/kill_processes"]["type"]="select";
$elem["evolution/kill_processes"]["choices"][1]="Abort";
$elem["evolution/kill_processes"]["choicesde"][1]="Abbruch";
$elem["evolution/kill_processes"]["choicesfr"][1]="Abandonner";
$elem["evolution/kill_processes"]["description"]="Action for remaining Evolution processes:
 Evolution processes are still present on this system, preventing a safe
 upgrade. 
 .
 You can either abort the upgrade to work on the situation, or have the
 processes killed automatically, with a possible impact on running sessions.
";
$elem["evolution/kill_processes"]["descriptionde"]="Aktion für verbleibende Evolution-Prozesse:
 Im System gibt es noch Prozesse von Evolution, wodurch ein sicheres Upgrade verhindert wird.
 .
 Sie können entweder das Upgrade abbrechen, um an der Situation zu arbeiten, oder die Prozesse automatisch töten lassen, wobei das möglicherweise Auswirkungen auf die laufende Sitzung hat.
";
$elem["evolution/kill_processes"]["descriptionfr"]="Action à effectuer pour les processus restants d'Evolution :
 Des processus d'Evolution sont toujours actifs sur ce système, ce qui empêche d'effectuer une mise à jour sûre.
 .
 Vous pouvez soit décider d'abandonner la mise à jour pour résoudre ce problème, soit laisser les processus être terminés automatiquement, ce qui peut avoir un impact sur les sessions actuellement ouvertes.
";
$elem["evolution/kill_processes"]["default"]="";
PKG_OptionPageTail2($elem);
?>
