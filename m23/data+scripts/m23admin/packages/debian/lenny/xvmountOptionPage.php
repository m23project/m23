<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xvmount");

$elem["xvmount/convert_old_config"]["type"]="boolean";
$elem["xvmount/convert_old_config"]["description"]="Convert the existing configuration file into the new format?
 An xvmount configuration file /etc/xvmounttab with the format used
 up to version 3.6 was found on your system. I can try to automatically
 convert the structure into the new format used in version 3.7.
 The old configuration file will be saved as /etc/xvmounttab.bak
";
$elem["xvmount/convert_old_config"]["descriptionde"]="Bestehende Konfigurationsdatei ins neue Format wandeln?
 Es wurde eine xvmount-Konfigurationsdatei /etc/xvmounttab mit dem Format, das bis zur Version 3.6 benutzt wurde, gefunden. Ich kann versuchen, sie automatisch in das neue Format, das ab Version 3.7 benutzt wird, zu konvertieren. Die alte Datei bleibt als /etc/xvmounttab.bak gespeichert.
";
$elem["xvmount/convert_old_config"]["descriptionfr"]="Faut-il convertir la configuration existante vers le nouveau format ?
 Un fichier de configuration utilisant le format employé jusqu'à la version 3.6 a été trouvé sur votre système. Je peux essayer de convertir la structure vers le format employé à partir de la version 3.7. L'ancien fichier de configuration sera sauvegardé sous le nom /etc/xvmounttab.bak.
";
$elem["xvmount/convert_old_config"]["default"]="true";
$elem["xvmount/convert_failed"]["type"]="note";
$elem["xvmount/convert_failed"]["description"]="Old configuration cannot be converted into a valid new one
 The old configuration file does not contain any line which can be
 successfully transformed into a valid entry for the new xvmount version.
 This may be due to lacking user mount permissions for the devices in
 /etc/fstab. I will try to generate a new configuration file from /etc/fstab.
";
$elem["xvmount/convert_failed"]["descriptionde"]="Es kann keine gültige neue Konfiguration aus der alten erzeugt werden
 Die alte Konfigurationsdatei enthält keine einzige Zeile, die in einen gültigen Eintrag der neuen Konfigurationsdatei umgewandelt werden kann. Dies könnte an fehlenden Berechtigungen zum benutzerbasierten Mounten der Geräte in /etc/fstab liegen. Ich werde versuchen, eine neue Konfigurationsdatei allein aus /etc/fstab zu erzeugen.
";
$elem["xvmount/convert_failed"]["descriptionfr"]="Impossible de convertir l'ancienne configuration de manière valide
 L'ancien fichier de configuration ne contient aucune ligne ayant pu être convertie en une entrée valide pour la nouvelle version de xvmount. Il est probable que les périphériques listés dans /etc/fstab ne peuvent pas être montés par tous les utilisateurs en raison de permissions insuffisantes. Je vais essayer de générer un nouveau fichier de configuration à partir de /etc/fstab.
";
$elem["xvmount/convert_failed"]["default"]="";
$elem["xvmount/wrong_format"]["type"]="note";
$elem["xvmount/wrong_format"]["description"]="Invalid old configuration file
 An old xvmount configuration file /etc/xvmounttab was found on your
 system but the format of the file /etc/xvmounttab was not recognized.
 Thus it cannot be converted into a new configuration file.
 I will try to generate a new configuration file from /etc/fstab.
";
$elem["xvmount/wrong_format"]["descriptionde"]="Ungültige Struktur der alten Konfigurationsdatei
 Eine alte xvmount-Konfigurationsdatei /etc/xvmounttab ist im System vorhanden, aber das dort benutzte Format kann nicht identifiziert werden. Daher kann die Datei nicht in das aktuelle Format umgewandelt werden. Ich werde versuchen, eine neue Konfigurationsdatei anhand der Einträge in /etc/fstab zu erzeugen.
";
$elem["xvmount/wrong_format"]["descriptionfr"]="Ancien fichier de configuration invalide
 Un ancien fichier de configuration de xvmount (/etc/xvmounttab) a été trouvé sur votre système mais le format de ce fichier n'a pas été reconnu. En conséquence, il ne peut pas être converti vers un nouveau fichier de configuration. J'essayerais de générer un nouveau fichier de configuration à partir de /etc/fstab.
";
$elem["xvmount/wrong_format"]["default"]="";
$elem["xvmount/empty_fstab"]["type"]="note";
$elem["xvmount/empty_fstab"]["description"]="/etc/fstab does not contain any user mountable devices
 Your system configuration in /etc/fstab does not contain any device
 entries marked as user-mountable by the \"user\" mount option. Thus
 xvmount cannot mount any of your devices and the creation of a
 corresponding configuration file failed. If you want to use xvmount
 you have to add corresponding entries to /etc/fstab and run xvmountconfig
 again.
";
$elem["xvmount/empty_fstab"]["descriptionde"]="/etc/fstab enthält keine Geräte die durch normale Benutzer gemountet werden können
 Die Systemkonfiguration in /etc/fstab enthält keinerlei Einträge von Geräten, die durch die Option \"user\" für das Mounten durch normale Benutzer freigegeben sind. Dementsprechend kann xvmount kein einziges Gerät mounten, so dass die Erzeugung einer entsprechenden Konfigurationsdatei fehlgeschlagen ist. Um xvmount zu benutzen, müssen entsprechende Einträge in /etc/fstab hinzugefügt werden. Danach kann xvmountconfig noch einmal von Hand aufgerufen werden.
";
$elem["xvmount/empty_fstab"]["descriptionfr"]="/etc/fstab ne contient aucun périphérique accessible en montage aux utilisateurs
 Votre configuration système définie dans /etc/fstab ne contient aucun périphérique marqué comme pouvant être monté par tout utilisateur avec l'option de montage « user ». Ainsi, xvmount ne peut pas monter vos périphériques et la création du fichier de configuration adapté a échoué. Si vous souhaitez utiliser xvmount, vous devez ajouter les entrées adéquates à /etc/fstab et exécuter xvmount une nouvelle fois.
";
$elem["xvmount/empty_fstab"]["default"]="";
$elem["xvmount/generate_failed"]["type"]="note";
$elem["xvmount/generate_failed"]["description"]="No valid xvmount configuration generated
 Automatically generating the xvmount configuration file /etc/xvmounttab
 failed.  Please, create the configuration file by hand either using a text
 editor or by re-running the xvmountconfig script.
";
$elem["xvmount/generate_failed"]["descriptionde"]="Keine gültige xvmount-Konfiguration erzeugt
 Die automatische Erzeugung der xvmount-Konfigurationsdatei /etc/xvmounttab ist fehlgeschlagen. Erzeugen Sie die Datei bitte entweder von Hand mit Hilfe eines beliebigen Texteditors oder indem sie das Konfigurationsprogramm xvmountconfig noch einmal aufrufen.
";
$elem["xvmount/generate_failed"]["descriptionfr"]="Aucune configuration valide de xvmount n'a été générée
 La génération automatique du fichier de configuration de xvmount (/etc/xvmounttab) a échoué. Veuillez créer le fichier de configuration vous-même, soit en utilisant un éditeur de texte, soit en exécutant à nouveau le script xvmountconfig.
";
$elem["xvmount/generate_failed"]["default"]="";
PKG_OptionPageTail2($elem);
?>
