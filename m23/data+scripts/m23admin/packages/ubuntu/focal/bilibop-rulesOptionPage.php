<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bilibop-rules");

$elem["bilibop-rules/on-live-system"]["type"]="boolean";
$elem["bilibop-rules/on-live-system"]["description"]="Do you intend to install bilibop-rules on a Live System ?
 Some bilibop-rules settings can be useful on non-volatile Operating Systems,
 when running from a removable and writable media (USB sticks, external HDD
 or SD cards); but they are currently useless or even harmful for LiveCD or
 LiveUSB systems.
 .
 If you choose this option, no other question will be asked; bilibop udev
 rules will be applied but nothing else will be modified on your system.
 Note that in that case, this package is overkill and you should probably
 replace it by the lighter but as much as efficient bilibop-udev package.
";
$elem["bilibop-rules/on-live-system"]["descriptionde"]="Planen Sie, Bilibop-rules auf einem Live-System zu installieren?
 Einige Einstellungen von Bilibop-rules können auf nichtflüchtigen Betriebssystemen nützlich sein, wenn sie von entfern- und beschreibbaren Medien (USB-Sticks, externen Festplatten oder SD-Karten) laufen, aber sie sind derzeit nutzlos oder sogar schädlich für Live-CDs oder Live-USB-Systeme.
 .
 Falls Sie diese Option wählen, wird keine weitere Frage gestellt. Die Bilibop-Udev-Regeln werden angewandt, ansonsten wird jedoch nichts auf Ihrem System verändert. Beachten Sie, dass dieses Paket in diesem Fall zu viel des Guten ist. Sie sollten es wohl durch das kleinere aber genauso leistungsfähige Paket Bilibop-udev ersetzen.
";
$elem["bilibop-rules/on-live-system"]["descriptionfr"]="Avez-vous l'intention d'installer bilibop-rules sur un système Live ?
 Certains paramètrages de bilibop-rules peuvent être utiles sur des systèmes non-voloatiles tournant depuis un périphérique amovible (clefs USB, Disques Durs externes ou cartes SD); mais ils sont généralement inutiles, voire nuisibles sur des systèmes LiveCD ou LiveUSB.
 .
 Si vous choisissez cette option, aucune autre question ne sera posée; les règles udev de bilibop seront appliquées mais rien d'autre ne sera modifié sur votre système. Notez que dans ce cas, ce paquet excède vos besoins et vous devriez probablement le remplacer par le paquet bilibop-udev, plus léger mais tout aussi efficace.
";
$elem["bilibop-rules/on-live-system"]["default"]="false";
$elem["bilibop-rules/bilibop_rules_generator/customize"]["type"]="boolean";
$elem["bilibop-rules/bilibop_rules_generator/customize"]["description"]="Do you want to use custom bilibop rules and build them now ?
 If tens of removable media are plugged on the computer your system boots
 from, bilibop udev rules can significantly increase boot time. This can be
 avoided by using custom udev rules, which are specific to the device your
 system is installed on.
 .
 That said, if this device can boot from different hardware port types (as
 USB/Firewire, USB/eSATA, USB/MMC/SD, etc.), you should check the resulting
 rules by booting your system on the alternative port type, and if necessary
 by running 'dpkg-reconfigure bilibop-rules' again with proper options, or
 even by editing '/etc/udev/rules.d/66-bilibop.rules'.
";
$elem["bilibop-rules/bilibop_rules_generator/customize"]["descriptionde"]="Möchten Sie eigene Bilibop-Regeln verwenden und diese nun bauen?
 Falls dutzende Wechselmedien an den Computer angeschlossen sind, von dem Ihr System hochfährt, können Bilibop-Udev-Regeln die Startzeit erheblich verlängern. Dies kann durch eigene Bilibop-Udev-Regeln verhindert werden, die speziell zu dem Gerät gehören, auf dem Ihr System installiert ist.
 .
 Abgesehen davon, falls dieses Gerät von unterschiedlichen Hardware-Anschlusstypen starten kann (wie USB/Firewire, USB/eSATA, USB/MMC/SD, etc.), sollten Sie die resultierenden Regeln prüfen, indem Sie Ihr System auf dem alternativen Anschlusstyp hochfahren und falls nötig erneut »dpkg-reconfigure bilibop-rules« mit korrekten Optionen ausführen oder sogar »/etc/udev/rules.d/66-bilibop.rules« bearbeiten.
";
$elem["bilibop-rules/bilibop_rules_generator/customize"]["descriptionfr"]="Voulez-vous utiliser des règles bilibop sur mesure et les construire maintenant ?
 Si de nombreux périphériques amovibles sont connectés sur l'ordinateur depuis lequel votre système démarre, les règles udev de bilibop peuvent augmenter significativement la durée du démarrage. Cela peut être évité en utilisant des règles sur mesure, spécifiques au périphérique sur lequel votre système est installé.
 .
 Cela dit, si ce périphérique peut être démarré depuis différents types de ports (USB/Firewire, USB/eSATA, USB/SD/MMC, etc), vous devriez plutôt construire ces règles manuellement (en éxécutant '/usr/share/bilibop/bilibop_rules_generator' avec les options adéquates, en vérifiant si elles fonctionnent en toutes situations, et en éditant '/etc/udev/rules.d/66-bilibop.rules' si nécessaire).
";
$elem["bilibop-rules/bilibop_rules_generator/customize"]["default"]="false";
$elem["bilibop-rules/bilibop_rules_generator/overwrite"]["type"]="select";
$elem["bilibop-rules/bilibop_rules_generator/overwrite"]["choices"][1]="keep existing custom rules";
$elem["bilibop-rules/bilibop_rules_generator/overwrite"]["choices"][2]="rebuild custom rules";
$elem["bilibop-rules/bilibop_rules_generator/overwrite"]["choicesde"][1]="existierende eigene Regeln behalten";
$elem["bilibop-rules/bilibop_rules_generator/overwrite"]["choicesde"][2]="erneut eigene Regeln bauen";
$elem["bilibop-rules/bilibop_rules_generator/overwrite"]["choicesfr"][1]="conserver les règles personnelles existantes";
$elem["bilibop-rules/bilibop_rules_generator/overwrite"]["choicesfr"][2]="reconstruire les règles personnelles";
$elem["bilibop-rules/bilibop_rules_generator/overwrite"]["description"]="What do you want to do with your custom rules ?
 The file '/etc/udev/rules.d/66-bilibop.rules' exists. It is specific to the
 drive on which your system is installed and overrides the one, more generic,
 that is provided by the bilibop-rules package (in '/usr/lib/udev/rules.d').
 .
 If the device hosting the running system is able to boot from different
 hardware port types (USB/Firewire, USB/eSATA, USB/MMC/SD-card, etc.), you
 should boot it from the alternative port type and check if your custom rules
 work fine in all cases. In the doubt, you should remove the custom rules
 file.
";
$elem["bilibop-rules/bilibop_rules_generator/overwrite"]["descriptionde"]="Was möchten Sie mit Ihren eigenen Regeln tun?
 Die Datei »/etc/udev/rules.d/66-bilibop.rules« existiert. Sie ist charakteristisch für das Laufwerk, auf dem Ihr System installiert ist und setzt die allgemeinere Regel außer Kraft, die vom Paket Bilibop-rules (in »/usr/lib/udev/rules.d«) bereitgestellt wird.
 .
 Falls das Gerät, das das laufende System beherbergt, von verschiedenen Hardware-Anschlusstypen (USB/Firewire, USB/eSATA, USB/MMC/SD-Karte, etc.) hochfahren kann, sollten Sie es von dem alternativen Anschlusstyp starten und prüfen, ob Ihre eigenen Regeln in allen Fällen korrekt funktionieren. Im Zweifel sollten Sie die Datei mit den eigenen Regeln entfernen.
";
$elem["bilibop-rules/bilibop_rules_generator/overwrite"]["descriptionfr"]="Que voulez-vous faire de vos règles sur mesure ?
 Le fichier '/etc/udev/rules.d/66-bilibop.rules' existe. Il est spécifique au périphérique sur lequel votre système est installé et surcharge celui, plus générique, qui est fourni par le paquet bilibop-rules (dans '/usr/lib/udev/rules.d').
 .
 Si le périphérique qui héberge le système en cours d'éxécution est capable de démarrer depuis différents types de ports (USB/Firewire, USB/eSATA, USB/SD, etc.), vous devriez le démarrer depuis le type de port alternatif et vérifier si vos règles sur mesure fonctionnent correctement dans tous les cas. Dans le doute, vous devriez supprimer le fichier de règles personnelles.
";
$elem["bilibop-rules/bilibop_rules_generator/overwrite"]["default"]="keep";
$elem["bilibop-rules/bilibop_rules_generator/options"]["type"]="string";
$elem["bilibop-rules/bilibop_rules_generator/options"]["description"]="Options to pass to the bilibop rules generator:
 Possible options you can pass to the bilibop rules generator are the
 followings:
 .
  -a vendor,model
  -a manufacturer,product,serial
  -e ID_VENDOR,ID_MODEL,ID_SERIAL_SHORT
  -e ID_SERIAL
 .
 The two first ones cannot be mixed; for example, '-a model,serial' is not a
 valid option; use '-a model -e ID_SERIAL' instead. In the doubt, you should
 probably set it to an empty string (defaults to
 '-a manufacturer,product,serial').
";
$elem["bilibop-rules/bilibop_rules_generator/options"]["descriptionde"]="Optionen, die an den Bilibop-Regelgenerator übergeben werden:
 Es ist möglich, die folgenden Optionen an den Bilibop-Regelgenerator zu übergeben:
 .
  -a vendor,model
  -a manufacturer,product,serial
  -e ID_VENDOR,ID_MODEL,ID_SERIAL_SHORT
  -e ID_SERIAL
 .
 Die beiden ersten können nicht vermischt werden. »-a Modell,Seriennummer« ist zum Beispiel keine gültige Option, benutzen Sie stattdessen »-a Modell -e SERIENNUMMER«. Im Zweifelsfall sollten Sie sie vielleicht auf eine leere Zeichenkette setzen (Voreinstellung ist »-a Hersteller,Produkt,Seriennummer«).
";
$elem["bilibop-rules/bilibop_rules_generator/options"]["descriptionfr"]="Options à passer au générateur de règles bilibop :
 Les options possibles à passer au générateur de règles bilibop sont les suivantes :
 .
  -a vendor,model
  -a manufacturer,product,serial
  -e ID_VENDOR,ID_MODEL,ID_SERIAL_SHORT
  -e ID_SERIAL
 .
 Les deux premières ne peuvent pas être mixées; par exemple, '-a model,serial' n'est pas une option valide; utilisez plutôt '-a model -e ID_SERIAL'. Dans le doute, vous devriez probablement laisser ce champ vide (qui équivaut à '-a manufacturer,product,serial')
";
$elem["bilibop-rules/bilibop_rules_generator/options"]["default"]="";
$elem["bilibop-rules/bilibop_rules_generator/bad_options"]["type"]="error";
$elem["bilibop-rules/bilibop_rules_generator/bad_options"]["description"]="Options given to the bilibop rules generator seem to be invalid.
 You can go back by hitting the <Escape> key and then modify the options.
 Otherwise, the custom rules file '/etc/udev/rules.d/66-bilibop.rules' will
 not be written.
";
$elem["bilibop-rules/bilibop_rules_generator/bad_options"]["descriptionde"]="An den Bilibop-Regelgenerator übergebene Regeln scheinen ungültig zu sein.
 Sie können durch Drücken der Taste <Escape> zurückgehen und dann die Optionen ändern. Andernfalls wird die eigene Regeldatei »/etc/udev/rules.d/66-bilibop.rules« nicht geschrieben.
";
$elem["bilibop-rules/bilibop_rules_generator/bad_options"]["descriptionfr"]="Les options données au générateur de règles bilibop semblent invalides.
 Vous pouvez revenir en arrière avec la touche <Echappe> et modifier les options. Autrement, le fichier de règles sur mesure '/etc/udev/rules.d/66-bilibop.rules' ne sera pas écrit.
";
$elem["bilibop-rules/bilibop_rules_generator/bad_options"]["default"]="";
$elem["bilibop-rules/not_belong_to_disk_group/custom_rules_error"]["type"]="error";
$elem["bilibop-rules/not_belong_to_disk_group/custom_rules_error"]["description"]="The following device(s) do not belong to disk group:
 ${DEVICE}
 .
 You should rewrite or remove your custom rules file:
 .
 /etc/udev/rules.d/66-bilibop.rules
";
$elem["bilibop-rules/not_belong_to_disk_group/custom_rules_error"]["descriptionde"]="";
$elem["bilibop-rules/not_belong_to_disk_group/custom_rules_error"]["descriptionfr"]="Le(s) périphérique(s) suivant(s) n'appartien(nen)t pas au groupe 'disk' :
 ${DEVICE}
 .
 Vous devriez récrire ou supprimer votre fichier de règles sur mesure :
 .
 /etc/udev/rules.d/66-bilibop.rules

";
$elem["bilibop-rules/not_belong_to_disk_group/custom_rules_error"]["default"]="";
$elem["bilibop-rules/not_belong_to_disk_group/internal_error"]["type"]="error";
$elem["bilibop-rules/not_belong_to_disk_group/internal_error"]["description"]="Internal error
 The following device(s) do not belong to disk group:
 .
 ${DEVICE}
 .
 You should send a bug report to the maintainer of the package.
";
$elem["bilibop-rules/not_belong_to_disk_group/internal_error"]["descriptionde"]="";
$elem["bilibop-rules/not_belong_to_disk_group/internal_error"]["descriptionfr"]="Erreur interne
 Le(s) périphérique(s) suivant(s) n'appartien(nen)t pas au groupe 'disk' :
 .
 ${DEVICE}
 .
 Vous devriez envoyer un rapport de bogue au responsable du paquet.

";
$elem["bilibop-rules/not_belong_to_disk_group/internal_error"]["default"]="";
$elem["bilibop-rules/physical_volumes_filter/system-only"]["type"]="boolean";
$elem["bilibop-rules/physical_volumes_filter/system-only"]["description"]="Do you want to hide Physical Volumes your system does not need ?
 It seems that the drive on which your system is installed contains Logical
 Volumes. It is possible to set LVM to activate only the Physical Volumes
 that your system needs. This can mainly avoid name conflicts between the
 Volumes used by your system and those that could be found on internal or
 external drives plugged on the same computer.
 .
 If you choose to use this feature, this will overwrite '/etc/lvm/lvm.conf',
 and you should read 'README.Debian' in the documentation of the package.
 Otherwise, you can do it later with
 .
  dpkg-reconfigure -p low bilibop-rules
";
$elem["bilibop-rules/physical_volumes_filter/system-only"]["descriptionde"]="Möchten Sie die von Ihrem System nicht benötigten physischen Datenträger verstecken?
 Das Laufwerk, auf dem Ihr System installiert ist, scheint logische Datenträger zu enthalten. Es ist möglich, LVM so einzurichten, dass nur die physischen Datenträger aktiviert werden, die Ihr System benötigt. Hauptsächlich kann dies Namenskonflikte zwischen den Datenträgern, die von Ihrem System benutzt werden, sowie internen und externen, an den selben Rechner angeschlossenen Datenträgern, vermeiden.
 .
 Falls Sie diese Funktionalität auswählen, wird dies »/etc/lvm/lvm.conf« außer Kraft setzen und Sie sollten »README.Debian« in der Dokumentation des Pakets lesen. Andernfalls können Sie dies später erledigen.
 .
  dpkg-reconfigure -p low bilibop-rules
";
$elem["bilibop-rules/physical_volumes_filter/system-only"]["descriptionfr"]="Voulez-vous masquer les Volumes Physiques dont votre système n'a pas besoin ?
 Il semble que le disque sur lequel votre système est installé contient des Volumes Logiques. Il est possible de paramètrer LVM pour n'activer que les Volumes Physiques dont votre système a besoin. Cela a le principal avantage d'éviter des conflits de nom entre les Volumes utilisés par votre système et ceux qui pourraient se trouver sur d'autres disques connectés à la même machine hôte. 
 .
 Si vous choisissez d'utiliser cette fonctionnalité, cela modifiera '/etc/lvm/lvm.conf', et vous devriez lire 'README.Debian' dans la documentation du paquet.  Autrement, vous pouvez le faire plus tard avec
 .
  dpkg-reconfigure -p low bilibop-rules
";
$elem["bilibop-rules/physical_volumes_filter/system-only"]["default"]="false";
$elem["bilibop-rules/physical_volumes_filter/filter"]["type"]="string";
$elem["bilibop-rules/physical_volumes_filter/filter"]["description"]="for internal use only

";
$elem["bilibop-rules/physical_volumes_filter/filter"]["descriptionde"]="";
$elem["bilibop-rules/physical_volumes_filter/filter"]["descriptionfr"]="";
$elem["bilibop-rules/physical_volumes_filter/filter"]["default"]="";
$elem["bilibop-rules/physical_volumes_filter/global_filter"]["type"]="string";
$elem["bilibop-rules/physical_volumes_filter/global_filter"]["description"]="for internal use only

";
$elem["bilibop-rules/physical_volumes_filter/global_filter"]["descriptionde"]="";
$elem["bilibop-rules/physical_volumes_filter/global_filter"]["descriptionfr"]="";
$elem["bilibop-rules/physical_volumes_filter/global_filter"]["default"]="";
$elem["bilibop-rules/physical_volumes_filter/obtain_device_list_from_udev"]["type"]="string";
$elem["bilibop-rules/physical_volumes_filter/obtain_device_list_from_udev"]["description"]="for internal use only

";
$elem["bilibop-rules/physical_volumes_filter/obtain_device_list_from_udev"]["descriptionde"]="";
$elem["bilibop-rules/physical_volumes_filter/obtain_device_list_from_udev"]["descriptionfr"]="";
$elem["bilibop-rules/physical_volumes_filter/obtain_device_list_from_udev"]["default"]="";
$elem["bilibop-rules/physical_volumes_filter/warning"]["type"]="error";
$elem["bilibop-rules/physical_volumes_filter/warning"]["description"]="Physical Volumes Filter will not be applied.
 Probably due to an error in '66-bilibop.rules', the following device(s) have
 not been tagged 'BILIBOP' by udev, or have no usable symlink managed by udev:
 .
  ${UNTAGGED}
  ${UNLINKED}
 .
 This means some variables in '/etc/lvm/lvm.conf' will be left or reset to
 their initial values:
 .
  obtain_device_list_from_udev = ${FROMUDEV}
  filter = ${FILTER}
  global_filter = ${GLOBAL_FILTER}
";
$elem["bilibop-rules/physical_volumes_filter/warning"]["descriptionde"]="Filter physicher Datenträger werden nicht angewandt.
 Möglicherweise aufgrund eines Fehlers in »66-bilibop.rules« wurden die folgenden Geräte nicht durch Udev mit »BILIBOP« markiert oder haben keinen brauchbaren durch Udev verwalteten symbolischen Verweis:
 .
  ${UNTAGGED}
  ${UNLINKED}
 .
 Dies bedeutet, dass einige Variablen in »/etc/lvm/lvm.conf« auf Ihren Ursprungswerten belassen oder auf diese geändert werden:
 .
  obtain_device_list_from_udev = ${FROMUDEV}
  filter = ${FILTER}
  global_filter = ${GLOBAL_FILTER}
";
$elem["bilibop-rules/physical_volumes_filter/warning"]["descriptionfr"]="Le filtre des Volumes Physiques ne sera pas appliqué.
 Probablement en raison d'une erreur dans '66-bilibop-rules', les périphériques suivants n'ont pas été étiquetés 'BILIBOP' par udev, ou n'ont pas de lien symbolique géré par udev :
 .
  ${UNTAGGED}
  ${UNLINKED}
 .
 Cela signifie que certaines variables dans '/etc/lvm/lvm.conf' seront conservées ou réinitialisées à leurs valeurs initiales :
 .
  obtain_device_list_from_udev = ${FROMUDEV}
  filter = ${FILTER}
  global_filter = ${GLOBAL_FILTER}
";
$elem["bilibop-rules/physical_volumes_filter/warning"]["default"]="";
PKG_OptionPageTail2($elem);
?>
