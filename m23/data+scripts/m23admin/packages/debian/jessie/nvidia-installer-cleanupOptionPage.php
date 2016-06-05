<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nvidia-installer-cleanup");

$elem["nvidia-installer-cleanup/uninstall-nvidia-installer"]["type"]="boolean";
$elem["nvidia-installer-cleanup/uninstall-nvidia-installer"]["description"]="Run \"nvidia-installer --uninstall\"?
 The nvidia-installer program was found on this system. This is
 probably left over from an earlier installation of the non-free NVIDIA
 graphics driver, installed using the NVIDIA *.run file directly. This
 installation is incompatible with the Debian packages. To install the
 Debian packages safely, it is therefore necessary to undo the changes
 performed by nvidia-installer.
";
$elem["nvidia-installer-cleanup/uninstall-nvidia-installer"]["descriptionde"]="»nvidia-installer --uninstall« ausführen?
 Auf diesem System wurde das Programm NVIDIA-Installer gefunden. Dies ist wahrscheinlich von einer früheren Installation des unfreien NVIDIA-Grafiktreibers übriggeblieben, der direkt über die *.run-Datei von NVIDIA installiert wurde. Diese Installation ist inkompatibel mit den Debian-Paketen. Um die Debian-Pakete sicher zu installieren, ist es daher nötig, die durch NVIDIA-Installer vorgenommenen Änderungen rückgängig zu machen.
";
$elem["nvidia-installer-cleanup/uninstall-nvidia-installer"]["descriptionfr"]="Faut-il exécuter « nvidia-installer --uninstall » ?
 Le programme « nvidia-installer » est installé sur ce système. Cela est probablement dû à une ancienne installation du pilote graphique non libre de NVIDIA, effectuée directement avec le fichier *.run de NVIDIA. Cette installation est incompatible avec les paquets Debian. Afin d'installer correctement les paquets Debian, il est nécessaire de défaire les changements effectués par le programme « nvidia-installer ».
";
$elem["nvidia-installer-cleanup/uninstall-nvidia-installer"]["default"]="true";
$elem["nvidia-installer-cleanup/delete-nvidia-installer"]["type"]="boolean";
$elem["nvidia-installer-cleanup/delete-nvidia-installer"]["description"]="Delete nvidia-installer files?
 Some files from the nvidia-installer program still remain on this system.
 These probably come from an earlier installation of the non-free NVIDIA
 graphics driver using the *.run file directly. Running the
 uninstallation procedure may have failed and left these behind. These
 files conflict with the packages providing the non-free NVIDIA graphics
 driver and must be removed before the package installation can continue.
";
$elem["nvidia-installer-cleanup/delete-nvidia-installer"]["descriptionde"]="NVIDIA-Installer-Dateien entfernen?
 Einige Dateien von NVIDIA-Installer sind immer noch auf Ihrem System verblieben. Diese stammen wahrscheinlich von einer früheren Installation des unfreien NVIDIA-Grafiktreibers, der direkt mittels der *.run-Datei installiert wurde. Das Ausführen der Deinstallationsprozedur könnte fehlgeschlagen sein und diese Dateien hinterlassen haben. Diese Dateien befinden sich im Konflikt mit den Paketen, die den unfreien NVIDIA-Grafiktreiber bereitstellen und müssen entfernt werden, bevor die Installation fortgesetzt werden kann.
";
$elem["nvidia-installer-cleanup/delete-nvidia-installer"]["descriptionfr"]="Faut-il supprimer les fichiers « nvidia-installer » ?
 Certains fichiers du programme « nvidia-installer » se trouvent encore sur ce système. Ils proviennent très certainement d'une ancienne installation du pilote graphique non libre de NVIDIA effectuée directement avec le fichier *.run de NVIDIA. La procédure de désinstallation a probablement échoué et laissé ces fichiers sur le système. Ces fichiers entrent en conflit avec les paquets fournissant le pilote graphique non libre de NVIDIA et doivent être supprimés pour que l'installation puisse se poursuivre.
";
$elem["nvidia-installer-cleanup/delete-nvidia-installer"]["default"]="true";
$elem["nvidia-installer-cleanup/remove-conflicting-libraries"]["type"]="boolean";
$elem["nvidia-installer-cleanup/remove-conflicting-libraries"]["description"]="Remove conflicting library files?
 The following libraries were found on this system and conflict with
 the current installation of the NVIDIA graphics drivers:
 .
 ${conflict-libs}
 .
 These libraries are most likely remnants of an old installation using the
 nvidia-installer program and do not belong to any package managed by dpkg.
 It should be safe to delete them.
";
$elem["nvidia-installer-cleanup/remove-conflicting-libraries"]["descriptionde"]="Im Konflikt befindliche Bibliotheksdateien entfernen?
 Die folgenden Bibliotheken wurden auf Ihrem System gefunden und befinden sich im Konflikt mit der aktuellen Installation des NVIDIA-Grafiktreibers:
 .
 ${conflict-libs}
 .
 Diese Bibliotheken sind höchstwahrscheinlich Überreste einer alten Installation, die das Programm NVIDIA-Installer benutzte und zu keinem Paket gehört, das von Dpkg verwaltet wird. Sie zu löschen, sollte gefahrlos möglich sein.
";
$elem["nvidia-installer-cleanup/remove-conflicting-libraries"]["descriptionfr"]="Faut-il supprimer les fichiers de bibliothèques en conflit ?
 Les bibliothèques suivantes ont été trouvées sur le système et entrent en conflit avec l'installation actuelle des pilotes graphiques NVIDIA :
 .
 ${conflict-libs}
 .
 Ces bibliothèques sont très probablement des résidus d'une ancienne installation utilisant le programme « nvidia-installer » et n'appartiennent à aucun paquet géré par dpkg. Elles peuvent être supprimées sans risque.
";
$elem["nvidia-installer-cleanup/remove-conflicting-libraries"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
