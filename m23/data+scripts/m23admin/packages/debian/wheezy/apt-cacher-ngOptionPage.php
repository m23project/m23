<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("apt-cacher-ng");

$elem["apt-cacher-ng/gentargetmode"]["type"]="select";
$elem["apt-cacher-ng/gentargetmode"]["choices"][1]="Set up once";
$elem["apt-cacher-ng/gentargetmode"]["choices"][2]="Set up now and update later";
$elem["apt-cacher-ng/gentargetmode"]["choicesde"][1]="Nur ein Mal einrichten";
$elem["apt-cacher-ng/gentargetmode"]["choicesde"][2]="Jetzt einrichten und später aktualisieren";
$elem["apt-cacher-ng/gentargetmode"]["choicesfr"][1]="Configurer une seule fois";
$elem["apt-cacher-ng/gentargetmode"]["choicesfr"][2]="Configurer maintenant et mettre à jour à l'avenir";
$elem["apt-cacher-ng/gentargetmode"]["description"]="Automatic remapping of client requests:
 Apt-Cacher NG can download packages from repositories other than those
 requested by the clients. This allows it to cache content effectively,
 and makes it easy for an administrator to switch to another mirror later.
 .
 This remapping of URLs can be configured now in an automated way based on the
 current state of /etc/apt/sources.list. Optionally, this process can be
 repeated on every package update (modifying the configuration files each
 time).
 .
 Selecting \"No automated setup\" will leave the existing configuration
 unchanged. It will need to be updated manually.
";
$elem["apt-cacher-ng/gentargetmode"]["descriptionde"]="Automatische Umleitung der Client-Anfragen:
 Apt-Cacher NG kann Pakete aus anderen Depots beziehen als von denen, die in Client-Aufrufen angegeben wurden. Dadurch kann der Cache effektiver arbeiten und erleichtert dem Administrator einen nachträglichen Umzug zu einem anderen Spiegelserver.
 .
 Automatische Umleitung der URLs kann jetzt automatisch einrichtet werden, basierend auf dem derzeitigen Stand von /etc/apt/sources.list. Optional kann dieser Prozess bei jeder Aktualisierung des Pakets durchgeführt werden (und dabei jedes Mal die Konfigurationsdateien verändern).
 .
 Auswahl von »Keine automatisierte Konfiguration« rührt bestehende Konfigurationsdateien nicht an. Diese müssen dann per Hand gepflegt werden.
";
$elem["apt-cacher-ng/gentargetmode"]["descriptionfr"]="Redirection automatique des requêtes :
 Apt-Cacher NG peut télécharger les paquets depuis d'autres dépôts que ceux demandés par les clients. Cela permet de mettre les données en cache efficacement et facilite la tâche de l'administrateur lors d'un changement ultérieur de miroir.
 .
 Cette réécriture des adresses peut être automatiquement configurée maintenant en se basant sur l'état actuel de /etc/apt/sources.list. Une option permet de mettre à jour cette réécriture lors de chaque mise à jour des paquets, par la modification des fichiers de configuration.
 .
 Le choix « Pas de configuration automatique » conserve la configuration existante. Vous devrez alors la mettre à jour vous-même.
";
$elem["apt-cacher-ng/gentargetmode"]["default"]="Set up once";
PKG_OptionPageTail2($elem);
?>
