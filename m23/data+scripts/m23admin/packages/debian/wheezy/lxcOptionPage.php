<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lxc");

$elem["lxc/title"]["type"]="title";
$elem["lxc/title"]["description"]="Linux Containers: LXC setup
";
$elem["lxc/title"]["descriptionde"]="LXC setup
";
$elem["lxc/title"]["descriptionfr"]="configuration de LXC
";
$elem["lxc/title"]["default"]="";
$elem["lxc/auto"]["type"]="boolean";
$elem["lxc/auto"]["description"]="Automatically start Linux Containers on boot?
 Linux Containers that have their configuration files copied or symlinked
 to the /etc/lxc/auto directory can be automatically started during system
 boot, and shut down on reboot or halt.
 .
 If unsure, choose yes (default).
";
$elem["lxc/auto"]["descriptionde"]="Linux Container automatisch beim Hochfahren starten?
 Linux Container welche ihre Konfigurationsdateien in das /etc/lxc/auto Verzeichnis kopiert oder gelinkt haben, können während des Hochfahrens automatisch gestartet und während des Herunterfahrens oder Neustarts automatisch beendet werden.
 .
 Wenn Sie unsicher sind, wählen sie ja (Standard).
";
$elem["lxc/auto"]["descriptionfr"]="Lancer automatiquement les conteneurs Linux à l'amorçage du système ?
 Les conteneurs Linux (« Linux  Containers ») dont les fichiers de configuration sont copiés ou liés dans /etc/lxc/auto peuvent être automatiquement démarrés durant l'amorçage du système et éteints au moment du redémarrage ou de l'arrêt.
 .
 Dans le doute, vous pouvez choisir cette option.
";
$elem["lxc/auto"]["default"]="true";
$elem["lxc/shutdown"]["type"]="select";
$elem["lxc/shutdown"]["choices"][1]="halt";
$elem["lxc/shutdown"]["description"]="Linux Container: Shutdown method
 Linux Containers can be shutdown in different ways. The stop method terminates
 all processes inside the container. The halt method initiates a shutdown,
 which takes longer and can have problems with containers that don't
 shutdown themselves properly.
 .
 Unless you know that your containers don't shutdown properly,
 choose halt (default).
";
$elem["lxc/shutdown"]["descriptionde"]="Linux Container Shutdown Methode
 Linux Container können auf unterschiedliche Weise gestoppt werden. Die Stopp Methode terminiert alle Prozesse innerhalb des Containers. Die Halt Methode initiiert ein Herunterfahren welches länger dauert und Probleme bereiten kann mit Container, die sich nicht selbst korrekt herunterfahren können.
 .
 Sofern Sie nicht wissen dass Ihre Container nicht korrekt herunterfahren, wählen Sie halt (Standard).
";
$elem["lxc/shutdown"]["descriptionfr"]="méthode d'arrêt
 Les conteneurs Linux peuvent être arrêtés de différents manières. La méthode « stop » interrompt tous les processus au sein du conteneur. La méthode « halt » initie une extinction, ce qui prend plus de temps et peut causer des problèmes si les conteneurs ne s'arrêtent pas correctement.
 .
 Il est conseillé de choisir la méthode « halt » sauf si les conteneurs ne s'arrêtent pas correctement.
";
$elem["lxc/shutdown"]["default"]="halt";
$elem["lxc/directory"]["type"]="string";
$elem["lxc/directory"]["description"]="LXC directory:
 Please specify the directory that will be used to store the Linux
 Containers.
 .
 If unsure, use /var/lib/lxc (default).
";
$elem["lxc/directory"]["descriptionde"]="LXC Verzeichnis:
 Bitte geben Sie das Verzeichnis an, welches für die Container verwendet werden soll.
 .
 Wenn Sie unsicher sind, benutzen sie /var/lib/lxc (Standard).
";
$elem["lxc/directory"]["descriptionfr"]="Répertoire de LXC :
 Veuillez indiquer le répertoire à utiliser pour stocker les conteneurs Linux.
 .
 Il est recommandé de choisir /var/lib/lxc.
";
$elem["lxc/directory"]["default"]="/var/lib/lxc";
PKG_OptionPageTail2($elem);
?>
