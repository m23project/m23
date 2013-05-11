<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lilo");

$elem["lilo/new-config"]["type"]="note";
$elem["lilo/new-config"]["description"]="LILO configuration
 It seems to be your first LILO installation. It is absolutely necessary to
 run liloconfig(8) when you complete this process and execute /sbin/lilo
 after this.
 .
 LILO won't work if you don't do this. 
";
$elem["lilo/new-config"]["descriptionde"]="LILO-Konfiguration
 Es scheint so, als sei dies Ihre erste LILO-Installation. Wenn Sie diesen Vorgang abschließen, ist es unbedingt nötig liloconfig(8) und danach /sbin/lilo auszuführen.
 .
 LILO wird nicht funktionieren, falls Sie dies nicht tun.
";
$elem["lilo/new-config"]["descriptionfr"]="Configuration de LILO
 Il semble qu'il s'agisse de votre première installation de LILO. Il est tout à fait indispensable d'utiliser liloconfig(8) lorsque vous aurez terminé l'installation, puis d'exécuter ensuite /sbin/lilo.
 .
 LILO ne fonctionnera pas sans cette opération.
";
$elem["lilo/new-config"]["default"]="";
$elem["lilo/add_large_memory"]["type"]="boolean";
$elem["lilo/add_large_memory"]["description"]="Do you want to add the large-memory option?
 Usually LILO loads the initrd file into the first 15MB of memory to
 avoid a BIOS limitation with older systems (earlier than 2001 and
 few systems until 2004).
 .
 With newer kernels the combination of kernel and initrd may not fit
 into the first 15MB of memory. LILO compute the needed size of memory
 and will automatically use the memory above 15MB, too, if there is
 enough physical memory.
 .
 If this machine has a recent BIOS without a 15MB limitation and you
 want to use memory above 15MB for all kernels, set the 'large-memory'
 option.
";
$elem["lilo/add_large_memory"]["descriptionde"]="Möchten Sie die Option »large-memory« hinzufügen?
 Standardmäßig lädt LILO die Initrd-Datei in die ersten 15 MB des Speichers, um eine BIOS-Beschränkung auf älteren Systemen (älter als 2001 und wenige Systeme bis 2004) zu vermeiden.
 .
 Allerdings kann es bei neueren Kernel passieren, dass die Kombination von Kernel und Initrd nicht in die ersten 15 MB des Speichers passt, LILO berechnet die benötigte Speichergröße und wird automatisch auch den Speicher oberhalb der 15MB nutzen, sofern genug physikalischer Speicher vorhanden ist.
 .
 Falls diese Maschine ein aktuelles BIOS ohne 15MB-Begrenzung hat und Sie wollen den Speicher oberhalb von 15MB für alle Kernel nutzen, dann setzen Sie die 'large-memory' Option.
";
$elem["lilo/add_large_memory"]["descriptionfr"]="Voulez-vous ajouter l'option « large memory » ?
 Par défaut, LILO charge l'image de démarrage (« initrd ») dans les 15 premiers méga-octets de mémoire pour éviter une limitation du BIOS de certains systèmes anciens (antérieurs à 2001 ainsi que certains systèmes jusqu'en 2004).
 .
 Cependant, avec les noyaux récents, l'ensemble noyau et image de démarrage dépassent cette taille et le système ne peut alors plus démarrer correctement. LILO calcul la quantité nécessaire de mémoire et utilisera également la mémoire au delà de 15 Mo, si suffisamment de mémoire physique est disponible.
 .
 Si cette machine utilise un BIOS récent sans cette limitation à 15 Mo et que vous souhaitez utiliser la mémoire au delà de 15 Mo pour tous les noyaux, vous devriez utiliser l'option « large-memory ».
";
$elem["lilo/add_large_memory"]["default"]="false";
$elem["lilo/runme"]["type"]="boolean";
$elem["lilo/runme"]["description"]="Do you want to run /sbin/lilo now?
 It was detected that it's necessary to run /sbin/lilo in order to activate
 the new LILO configuration.
 .
 WARNING: This procedure will write data in your MBR and may overwrite
 some data there. If you skip this step, you must run /sbin/lilo before
 rebooting your computer, or your system may not boot again.
";
$elem["lilo/runme"]["descriptionde"]="Möchten Sie /sbin/lilo jetzt ausführen?
 Es wurde festgestellt, dass es nötig ist /sbin/lilo auszuführen, um die neue LILO-Konfiguration zu aktivieren.
 .
 WARNUNG: Dieser Vorgang wird Daten in Ihren MBR (master boot record) schreiben und dies könnte dort einige Daten überschreiben. Falls Sie diesen Schritt überspringen, müssen Sie /sbin/lilo ausführen, bevor Sie Ihren Computer neu starten, oder Ihr System kann nicht wieder hochfahren.
";
$elem["lilo/runme"]["descriptionfr"]="Souhaitez-vous lancer /sbin/lilo maintenant ?
 Il est nécessaire d'utiliser la commande /sbin/lilo pour mettre en service la nouvelle configuration de LILO.
 .
 ATTENTION : cette opération va écrire sur le secteur de démarrage principal (MBR : « Master Boot Record »). Si vous sautez cette étape, vous devrez lancer /sbin/lilo avant de redémarrer sous peine de ne plus pouvoir ensuite lancer le système.
";
$elem["lilo/runme"]["default"]="false";
$elem["lilo/diskid_uuid"]["type"]="boolean";
$elem["lilo/diskid_uuid"]["description"]="Do you want to convert boot and root options?
 Since kernel using the newer disk interface 'libata' you need the newer
 DiskID and/or UUID in your /etc/lilo.conf for the boot and root options.
 For the most modern systems you should use this conversion and then run
 '/sbin/lilo'.
";
$elem["lilo/diskid_uuid"]["descriptionde"]="Möchten Sie die boot und root Optionen umwandeln?
 Seit der Kernel die neuere Schnittstelle 'libata' verwendet, benötigen Sie die neuere DiskID und/oder UUID in Ihrer /etc/lilo.conf für die boot und root Optionen. Für die meisten modernen Systeme sollten Sie diese Umwandlung nutzen und dann '/sbin/lilo' starten.
";
$elem["lilo/diskid_uuid"]["descriptionfr"]="Voulez-vous ajouter l'option « large memory » ?
 Depuis les noyaux qui comportent l'interface disque « libata », il est nécessaire d'utiliser les nouvelles options DiskID et/ou UUID dans le fichier /etc/lilo.conf pour les options « boot » et « root ». Pour la majorité des systèmes modernes, il est conseillé d'effectuer ce changement puis d'exécuter la commande « /sbin/lilo ».
";
$elem["lilo/diskid_uuid"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
