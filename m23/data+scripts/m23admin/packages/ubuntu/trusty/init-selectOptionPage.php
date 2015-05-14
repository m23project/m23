<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("init-select");

$elem["init-select/choose"]["type"]="select";
$elem["init-select/choose"]["choices"][1]="sysvinit";
$elem["init-select/choose"]["choices"][2]="systemd";
$elem["init-select/choose"]["choices"][3]="upstart";
$elem["init-select/choose"]["description"]="Init system selection: 
 Please select an init system.
 .
 The init system is the first process started by the kernel. It manages the
 initial boot process and system daemons.
";
$elem["init-select/choose"]["descriptionde"]="
 Bitte wählen Sie ein Init-System aus.
 .
 Das Init-System ist der erste durch den Kernel gestartete Prozess. Er verwaltet die erste Phase des Systemstarts und die System-Daemons.
";
$elem["init-select/choose"]["descriptionfr"]="Choix du système d’initialisation :
 Veuillez choisir un système d’initialisation.
 .
 Le système d’initialisation est le premier processus démarré par le noyau. Il gère leprocessus de démarrage initial et les démons du système.
";
$elem["init-select/choose"]["default"]="sysvinit";
$elem["init-select/no-systemd"]["type"]="error";
$elem["init-select/no-systemd"]["description"]="systemd package not installed
 The systemd package is not installed at present, so it cannot be selected.
 .
 Please execute \"apt-get install systemd && dpkg-reconfigure init-select\" in
 order to install and configure systemd as the init system.
";
$elem["init-select/no-systemd"]["descriptionde"]="Paket Systemd nicht installiert
 Das Paket Systemd ist augenblicklich nicht installiert und kann daher nicht ausgewählt werden.
 .
 Bitte führen Sie »apt-get install systemd && dpkg-reconfigure init-select« aus, um Systemd zu installieren und als Init-System zu konfigurieren.
";
$elem["init-select/no-systemd"]["descriptionfr"]="Paquet systemd non installé
 Le paquet systemd n'est pas installé actuellement, il ne peut pas êtrechoisi.
 .
 Veuillez exécuter la commande « apt-get install systemd && dpkg-reconfigureinit-select » pour installer et configurer systemd comme système d’initialisation.
";
$elem["init-select/no-systemd"]["default"]="";
$elem["init-select/no-upstart"]["type"]="error";
$elem["init-select/no-upstart"]["description"]="upstart package not installed
 The upstart package is not installed at present, so it cannot be selected.
 .
 Please execute \"apt-get install upstart\" in order to install and use upstart
 as the init system. Note that init-select will be removed in the process
 since upstart is not co-installable with other init systems.
";
$elem["init-select/no-upstart"]["descriptionde"]="Paket Upstart nicht installiert
 Das Paket Upstart ist augenblicklich nicht installiert und kann daher nicht ausgewählt werden.
 .
 Bitte führen Sie »apt-get install upstart« aus, um Upstart zu installieren und als Init-System zu verwenden. Beachten Sie, dass Init-select bei diesem Vorgang entfernt wird, da Upstart nicht zusammen mit anderen Init-Systemen installierbar ist.
";
$elem["init-select/no-upstart"]["descriptionfr"]="Paquet upstart non installé
 Le paquet upstart n'est pas installé actuellement, il ne peut pas êtrechoisi.
 .
 Veuillez exécuter la commande « apt-get install upstart » pour installer upstart et l'utiliser comme système d’initialisation. Veuillez noter qu'init-select sera désinstallé pendant ce processus parce qu'upstart ne peut être installé avec d'autres systèmes d’initialisation.
";
$elem["init-select/no-upstart"]["default"]="";
$elem["init-select/no-openrc"]["type"]="error";
$elem["init-select/no-openrc"]["description"]="openrc package not installed
 The openrc package is not installed at present, so it cannot be selected.
 .
 Please execute \"apt-get install openrc\" in order to install and use openrc as
 the init system. Note that init-select will be removed in the process since
 openrc is not co-installable with other init systems.
";
$elem["init-select/no-openrc"]["descriptionde"]="Paket OpenRC nicht installiert
 Das Paket OpenRC ist augenblicklich nicht installiert und kann daher nicht ausgewählt werden.
 .
 Bitte führen Sie »apt-get install openrc« aus, um OpenRC zu installieren und als Init-System zu verwenden. Beachten Sie, dass Init-select bei diesem Vorgang entfernt wird, da OpenRC nicht zusammen mit anderen Init-Systemen installierbar ist.
";
$elem["init-select/no-openrc"]["descriptionfr"]="Paquet openrc non installé
 Le paquet openrc n'est pas installé actuellement, il ne peut pas êtrechoisi.
 .
 Veuillez exécuter la commande « apt-get install openrc » pour installer openrc et l'utiliser comme système d’initialisation. Veuillez noter qu'init-select sera désinstallé pendant ce processus parce qu'OpenRc ne peut être installé avec d'autres systèmes d’initialisation.
";
$elem["init-select/no-openrc"]["default"]="";
PKG_OptionPageTail2($elem);
?>
