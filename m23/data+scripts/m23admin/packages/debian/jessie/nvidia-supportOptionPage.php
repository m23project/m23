<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nvidia-support");

$elem["nvidia-support/check-running-module-version"]["type"]="boolean";
$elem["nvidia-support/check-running-module-version"]["description"]="for internal use
 Can be preseeded.  If set to false, disables the nouveau module check
 and nvidia module version check entirely.

";
$elem["nvidia-support/check-running-module-version"]["descriptionde"]="";
$elem["nvidia-support/check-running-module-version"]["descriptionfr"]="";
$elem["nvidia-support/check-running-module-version"]["default"]="true";
$elem["nvidia-support/last-mismatching-module-version"]["type"]="string";
$elem["nvidia-support/last-mismatching-module-version"]["description"]="for internal use
 Remembers the last version for which we displayed the warning, so that we
 warn only once for each version.

";
$elem["nvidia-support/last-mismatching-module-version"]["descriptionde"]="";
$elem["nvidia-support/last-mismatching-module-version"]["descriptionfr"]="";
$elem["nvidia-support/last-mismatching-module-version"]["default"]="none";
$elem["nvidia-support/warn-mismatching-module-version"]["type"]="error";
$elem["nvidia-support/warn-mismatching-module-version"]["description"]="Mismatching nvidia kernel module loaded
 The NVIDIA driver that is being installed (version ${new-version})
 does not match the nvidia kernel module currently loaded
 (version ${running-version}).
 .
 The X server, OpenGL, and GPGPU applications may not work properly.
 .
 The easiest way to fix this is to reboot the machine once the
 installation has finished. You can also stop the X server (usually by
 stopping the login manager, e.g. gdm3, kdm, or xdm), manually unload the
 module (\"rmmod nvidia\"), and restart the X server.
";
$elem["nvidia-support/warn-mismatching-module-version"]["descriptionde"]="Unpassendes NVIDIA-Kernel-Modul geladen
 Der NVIDIA-Treiber, der installiert wird (Version ${new-version}), entspricht nicht dem derzeit geladenen NVIDIA-Kernel-Modul (Version ${running-version}).
 .
 Der X-Server, OpenGL- und GPGPU-Anwendungen funktionieren möglicherweise nicht korrekt.
 .
 Der einfachste Weg, dies zu beheben, besteht darin, den Rechner neu zu starten, nachdem die Installation beendet ist. Sie können außerdem den X-Server stoppen (üblicherweise durch Stoppen des Anmeldemanagers, z.B. Gdm3, Kdm oder Xdm), das Modul manuell entladen (»rmmod nvidia«) und den X-Server neu starten.
";
$elem["nvidia-support/warn-mismatching-module-version"]["descriptionfr"]="Inadéquation du module nvidia chargé
 Le pilote nvidia qui est en train d'être installé (version ${new-version}) ne correspond pas au module actuellement chargé (version ${running-version}).
 .
 Le serveur X ainsi que les applications OpenGL et GPGPU risquent de ne pas fonctionner correctement.
 .
 La manière la plus simple de corriger cela est de redémarrer la machine une fois que l'installation est terminée. Vous pouvez également arrêter le serveur X (généralement en arrêtant le gestionnaire de connexion, comme gdm3, kdm ou xdm), retirer vous-même le module (« rmmod nvidia »), puis redémarrer le serveur X.
";
$elem["nvidia-support/warn-mismatching-module-version"]["default"]="";
$elem["nvidia-support/warn-nouveau-module-loaded"]["type"]="error";
$elem["nvidia-support/warn-nouveau-module-loaded"]["description"]="Conflicting nouveau kernel module loaded
 The free nouveau kernel module is currently loaded and conflicts with the
 non-free nvidia kernel module.
 .
 The easiest way to fix this is to reboot the machine once the
 installation has finished.
";
$elem["nvidia-support/warn-nouveau-module-loaded"]["descriptionde"]="Konflikt verursachendes Kernel-Modul Nouveau geladen
 Das freie Kernel-Modul Nouveau ist derzeit geladen und steht im Konflikt mit dem unfreien Kernel-Modul NVIDIA.
 .
 Der einfachste Weg dies zu beheben ist, den Rechner neu zu starten, sobald die Installation beendet ist.
";
$elem["nvidia-support/warn-nouveau-module-loaded"]["descriptionfr"]="Conflit avec le module « nouveau »
 Le pilote graphique actuellement utilisé est le module libre « nouveau ». Il entre en conflit avec le module non libre « nvidia ».
 .
 La manière la plus simple pour corriger cela est de redémarrer la machine une fois l'installation terminée.
";
$elem["nvidia-support/warn-nouveau-module-loaded"]["default"]="";
$elem["nvidia-support/needs-xorg-conf-to-enable"]["type"]="note";
$elem["nvidia-support/needs-xorg-conf-to-enable"]["description"]="Manual configuration required to enable NVIDIA driver
 The NVIDIA driver is not yet configured; it needs to be enabled in
 xorg.conf before it can be used.
 .
 Please see the package documentation for instructions.
";
$elem["nvidia-support/needs-xorg-conf-to-enable"]["descriptionde"]="Um den NVIDIA-Treiber zu aktivieren, ist eine manuelle Konfiguration nötig.
 Der NVIDIA-Treiber ist noch nicht konfiguriert; er muss in der xorg.conf aktiviert werden, bevor er benutzt werden kann.
 .
 Anweisungen entnehmen Sie bitte der Paketdokumentation.
";
$elem["nvidia-support/needs-xorg-conf-to-enable"]["descriptionfr"]="Configuration manuelle requise pour activer le pilote nvidia
 Le pilote nvidia n'est pas encore configuré ; il doit être activé dans le fichier xorg.conf afin d'être utilisé.
 .
 Veuillez lire la documentation du paquet pour les instructions.
";
$elem["nvidia-support/needs-xorg-conf-to-enable"]["default"]="";
$elem["nvidia-support/check-xorg-conf-on-removal"]["type"]="boolean";
$elem["nvidia-support/check-xorg-conf-on-removal"]["description"]="for internal use
 Can be preseeded.  If set to false, does not warn about fglrx still being
 enabled in xorg.conf(.d/) when removing the package.

";
$elem["nvidia-support/check-xorg-conf-on-removal"]["descriptionde"]="";
$elem["nvidia-support/check-xorg-conf-on-removal"]["descriptionfr"]="";
$elem["nvidia-support/check-xorg-conf-on-removal"]["default"]="true";
$elem["nvidia-support/removed-but-enabled-in-xorg-conf"]["type"]="error";
$elem["nvidia-support/removed-but-enabled-in-xorg-conf"]["description"]="NVIDIA driver is still enabled in xorg.conf
 The NVIDIA driver was just removed, but it is still enabled in the
 Xorg configuration. X cannot be (re-)started successfully until NVIDIA
 is disabled in the following config file(s):
 .
 ${config-files}
";
$elem["nvidia-support/removed-but-enabled-in-xorg-conf"]["descriptionde"]="Der NVIDIA-Treiber ist immer noch in der xorg.conf aktiviert.
 Der NVIDIA-Treiber wurde nur entfernt, ist aber immer noch in der Xorg-Konfiguration aktiviert. X kann nicht erfolgreich (neu) gestartet werden, bis NVIDIA in der (den) folgenden Konfigurationsdatei(en) deaktiviert wurde:
 .
 ${config-files}
";
$elem["nvidia-support/removed-but-enabled-in-xorg-conf"]["descriptionfr"]="Pilote nvidia encore activé dans xorg.conf
 Le pilote nvidia vient d'être supprimé mais il est encore activé dans la configuration de Xorg. Le serveur graphique X ne peut pas être (re-)démarré correctement tant que le pilote nvidia n'est pas désactivé dans le ou les fichiers de configuration suivants :
 .
 ${config-files}
";
$elem["nvidia-support/removed-but-enabled-in-xorg-conf"]["default"]="";
$elem["nvidia-support/create-nvidia-conf"]["type"]="boolean";
$elem["nvidia-support/create-nvidia-conf"]["description"]="Create a minimal Xorg configuration to enable NVIDIA?
 The NVIDIA Xorg driver that was just installed requires manual configuration
 to be activated.
 .
 A minimal config file that should be sufficient to start the X server
 can be created now. This file (/etc/X11/nvidia.conf) can be customized
 later if desired.
 .
 If you choose not to create this file now, you have to create your own
 configuration (in /etc/X11/xorg.conf or better /etc/X11/xorg.conf.d/*.conf)
 before Xorg can use the NVIDIA driver.
";
$elem["nvidia-support/create-nvidia-conf"]["descriptionde"]="";
$elem["nvidia-support/create-nvidia-conf"]["descriptionfr"]="";
$elem["nvidia-support/create-nvidia-conf"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
