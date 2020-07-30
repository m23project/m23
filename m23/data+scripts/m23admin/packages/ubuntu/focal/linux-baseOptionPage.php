<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("linux-base");

$elem["linux-base/removing-title"]["type"]="title";
$elem["linux-base/removing-title"]["description"]="Removing ${package}
";
$elem["linux-base/removing-title"]["descriptionde"]="Entfernen von ${package}
";
$elem["linux-base/removing-title"]["descriptionfr"]="Suppression du noyau ${package}
";
$elem["linux-base/removing-title"]["default"]="";
$elem["linux-base/removing-running-kernel"]["type"]="boolean";
$elem["linux-base/removing-running-kernel"]["description"]="Abort kernel removal?
 You are running a kernel (version ${running}) and attempting to remove
 the same version.
 .
 This can make the system unbootable as it will remove
 /boot/vmlinuz-${running} and all modules under the directory
 /lib/modules/${running}. This can only be fixed with a copy of the
 kernel image and the corresponding modules.
 .
 It is highly recommended to abort the kernel removal unless you are
 prepared to fix the system after removal.
";
$elem["linux-base/removing-running-kernel"]["descriptionde"]="Entfernen des Kernels abbrechen?
 Es läuft derzeit ein Kernel Version ${running} und Sie versuchen, die gleiche Version zu entfernen.
 .
 Das kann dazu führen, dass das System nicht mehr startfähig ist, da dadurch /boot/vmlinuz-${running} und alle Module unterhalb des Verzeichnisses /lib/modules/${running} entfernt werden. Dies kann nur mit einer Kopie des Kernel-Images und den dazugehörigen Modulen behoben werden.
 .
 Es wird dringend empfohlen, das Entfernen des Kernels abzubrechen, außer Sie sind darauf vorbereitet, das System nach der Entfernung wieder instandzusetzen.
";
$elem["linux-base/removing-running-kernel"]["descriptionfr"]="Abandonner la suppression du noyau ?
 Le noyau actuellement utilisé (version ${running}) est en train d'être supprimé.
 .
 Le système risque de ne plus pouvoir démarrer car /boot/vmlinuz-${running} sera enlevé ainsi que tous les modules du répertoire /lib/modules/${running}. Cela peut seulement être réparé avec une copie de l'image du noyau et des modules correspondants.
 .
 Interrompre la suppression du noyau est fortement recommandé à moins d’être ensuite capable de réparer le système.
";
$elem["linux-base/removing-running-kernel"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
