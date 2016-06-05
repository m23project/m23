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
 that is provided by the bilibop-rules package (in '/lib/udev/rules.d').
 .
 If the device hosting the running system is able to boot from different
 hardware port types (USB/Firewire, USB/eSATA, USB/MMC/SD-card, etc.), you
 should boot it from the alternative port type and check if your custom rules
 work fine in all cases. In the doubt, you should remove the custom rules
 file.
";
$elem["bilibop-rules/bilibop_rules_generator/overwrite"]["descriptionde"]="Was möchten Sie mit Ihren eigenen Regeln tun?
 Die Datei »/etc/udev/rules.d/66-bilibop.rules« existiert. Sie ist charakteristisch für das Laufwerk, auf dem Ihr System installiert ist und setzt die allgemeinere Regel außer Kraft, die vom Paket Bilibop-rules (in »/lib/udev/rules.d«) bereitgestellt wird.
 .
 Falls das Gerät, das das laufende System beherbergt, von verschiedenen Hardware-Anschlusstypen (USB/Firewire, USB/eSATA, USB/MMC/SD-Karte, etc.) hochfahren kann, sollten Sie es von dem alternativen Anschlusstyp starten und prüfen, ob Ihre eigenen Regeln in allen Fällen korrekt funktionieren. Im Zweifel sollten Sie die Datei mit den eigenen Regeln entfernen.
";
$elem["bilibop-rules/bilibop_rules_generator/overwrite"]["descriptionfr"]="Que voulez-vous faire de vos règles sur mesure ?
 Le fichier '/etc/udev/rules.d/66-bilibop.rules' existe. Il est spécifique au périphérique sur lequel votre système est installé et surcharge celui, plus générique, qui est fourni par le paquet bilibop-rules (dans '/lib/udev/rules.d').
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
$elem["bilibop-rules/belongs_to_floppy_group/custom_rules_error"]["type"]="error";
$elem["bilibop-rules/belongs_to_floppy_group/custom_rules_error"]["description"]="The following device(s) still belong to floppy group:
 ${DEVICE}
 .
 You should rewrite or remove your custom rules file:
 .
 /etc/udev/rules.d/66-bilibop.rules
";
$elem["bilibop-rules/belongs_to_floppy_group/custom_rules_error"]["descriptionde"]="Die folgenden Geräte gehören immer noch zur Floppy-Gruppe:
 ${DEVICE}
 .
 Sie sollten Ihre eigene Regeldatei neu schreiben oder entfernen:
 .
 /etc/udev/rules.d/66-bilibop.rules
";
$elem["bilibop-rules/belongs_to_floppy_group/custom_rules_error"]["descriptionfr"]="Le(s) périphérique(s) suivant(s) appartiennent encore au groupe 'floppy' :
 ${DEVICE}
 .
 Vous devriez récrire ou supprimer votre fichier de règles sur mesure :
 .
 /etc/udev/rules.d/66-bilibop.rules
";
$elem["bilibop-rules/belongs_to_floppy_group/custom_rules_error"]["default"]="";
$elem["bilibop-rules/belongs_to_floppy_group/internal_error"]["type"]="error";
$elem["bilibop-rules/belongs_to_floppy_group/internal_error"]["description"]="Internal error
 The following device(s) still belong to floppy group:
 .
 ${DEVICE}
 .
 You should send a bug report to the maintainer of the package.
";
$elem["bilibop-rules/belongs_to_floppy_group/internal_error"]["descriptionde"]="Interner Fehler
 Die folgenden Geräte gehören immer noch zur Floppy-Gruppe:
 .
 ${DEVICE}
 .
 Sie sollten einen Fehlerbericht an den Betreuer des Pakets senden.
";
$elem["bilibop-rules/belongs_to_floppy_group/internal_error"]["descriptionfr"]="Erreur interne
 Le(s) périphérique(s) suivant(s) appartiennent encore au groupe 'floppy' :
 .
 ${DEVICE}
 .
 Vous devriez envoyer un rapport de bogue au responsable du paquet.
";
$elem["bilibop-rules/belongs_to_floppy_group/internal_error"]["default"]="";
$elem["bilibop-rules/grub_device_map_manager"]["type"]="select";
$elem["bilibop-rules/grub_device_map_manager"]["choices"][1]="the existing one";
$elem["bilibop-rules/grub_device_map_manager"]["choices"][2]="a static device map (not recommended)";
$elem["bilibop-rules/grub_device_map_manager"]["choices"][3]="a static fake device map";
$elem["bilibop-rules/grub_device_map_manager"]["choices"][4]="a dynamic fake device map";
$elem["bilibop-rules/grub_device_map_manager"]["choicesde"][1]="das existierende";
$elem["bilibop-rules/grub_device_map_manager"]["choicesde"][2]="eine statische Device Map (Gerätenamenzuordnungsdatei\";
$elem["bilibop-rules/grub_device_map_manager"]["choicesde"][3]="nicht empfohlen)";
$elem["bilibop-rules/grub_device_map_manager"]["choicesde"][4]="eine statische Pseudo-Device-Map";
$elem["bilibop-rules/grub_device_map_manager"]["choicesde"][5]="eine dynamische Pseudo-Device-Map";
$elem["bilibop-rules/grub_device_map_manager"]["choicesfr"][1]="le fichier existant";
$elem["bilibop-rules/grub_device_map_manager"]["choicesfr"][2]="un fichier statique (non recommandé)";
$elem["bilibop-rules/grub_device_map_manager"]["choicesfr"][3]="un fichier statique avec un contenu falsifié";
$elem["bilibop-rules/grub_device_map_manager"]["choicesfr"][4]="un fichier dynamique avec un contenu falsifié";
$elem["bilibop-rules/grub_device_map_manager"]["description"]="What kind of GRUB device map do you want to use ?
 The '/boot/grub/device.map' file can store obsolete information. In some cases,
 this can lead to failures when the GRUB bootloader menu is updated. To avoid
 that, it is possible to replace the device map by a fake one, mapping only
 the physical drive hosting your system; or by a link to a temporary file,
 which may be created either at boot time with a fake content, or on demand
 with an updated content.
 .
 If your external system is embedded on a device able to boot from different
 hardware port types (USB/Firewire, USB/eSATA, USB/MMC/SD, etc.), it is not
 recommended to use a static device map. The dynamic fake device map should
 work in all cases.
";
$elem["bilibop-rules/grub_device_map_manager"]["descriptionde"]="Welche Art einer GRUB-Device-Map möchten Sie benutzen?
 Die Datei »/boot/grub/device.map« kann veraltete Informationen speichern. In einigen Fällen kann dies zu Ausfällen führen, wenn das GRUB-Bootloader-Menü aktualisiert wird. Um das zu verhindern, ist es möglich, die Device Map durch eine Pseudo-Device-Map zu ersetzen, die nur das physische Laufwerk zuordnet, das Ihr System beherbergt oder durch Verweis auf eine temporäre Datei, die entweder beim Systemstart mit Pseudo-Inhalt oder auf Anfrage mit einem aktualisierten Inhalt erstellt wird.
 .
 Falls Ihr externes System in ein Gerät eingebettet ist, das von verschiedenen Hardware-Anschlusstypen (USB/Firewire, USB/eSATA, USB/MMC/SD, etc.) hochfahren kann, wird die Verwendung einer statischen Device Map nicht empfohlen. Die dynamische Pseudo-Device-Map sollte auf jeden Fall funktionieren.
";
$elem["bilibop-rules/grub_device_map_manager"]["descriptionfr"]="Quel genre de carte des périphériques voulez-vous que GRUB utilise ?
 Le fichier '/boot/grub/device.map' peut stocker des informations obsolètes. Dans certains cas, cela peut conduire à des échecs lors de la mise à jour du menu du chargeur de démarrage GRUB. Pour éviter cela, il est possible de modifier la carte des périphériques (device map) en ne tenant compte que du disque physique hébergeant votre système; ou de la remplacer par un lien symbolique vers un fichier temporaire, lequel peut être créé au démarrage avec un contenu falsifié, ou à la demande avec un contenu à jour.
 .
 Si votre système externe est embarqué sur un périphérique capable de démarrer depuis différents ports matériels (USB/Firewire, USB/eSATA, USB/MMC/SD, etc.), il n'est pas recommandé d'utiliser un plan statique. Le faux plan dynamique devrait fonctionner dans tous les cas.
";
$elem["bilibop-rules/grub_device_map_manager"]["default"]="keep";
$elem["bilibop-rules/make_unpersistent_rules"]["type"]="select";
$elem["bilibop-rules/make_unpersistent_rules"]["choices"][1]="keep them in their current state";
$elem["bilibop-rules/make_unpersistent_rules"]["choices"][2]="make unpersistent cd rules only";
$elem["bilibop-rules/make_unpersistent_rules"]["choices"][3]="make unpersistent net rules only";
$elem["bilibop-rules/make_unpersistent_rules"]["choices"][4]="make unpersistent rules for all (recommended)";
$elem["bilibop-rules/make_unpersistent_rules"]["choicesde"][1]="sie in ihrem aktuellen Status belassen";
$elem["bilibop-rules/make_unpersistent_rules"]["choicesde"][2]="nur flüchtige CD-Regeln erstellen";
$elem["bilibop-rules/make_unpersistent_rules"]["choicesde"][3]="nur flüchtige Netzregeln erstellen";
$elem["bilibop-rules/make_unpersistent_rules"]["choicesde"][4]="flüchtige Regeln für alles erstellen (empfohlen)";
$elem["bilibop-rules/make_unpersistent_rules"]["choicesfr"][1]="les conserver en l'état";
$elem["bilibop-rules/make_unpersistent_rules"]["choicesfr"][2]="rendre volatiles uniquement les règles 'cd'";
$elem["bilibop-rules/make_unpersistent_rules"]["choicesfr"][3]="rendre volatiles uniquement les règles 'net'";
$elem["bilibop-rules/make_unpersistent_rules"]["choicesfr"][4]="rendre toutes les règles volatiles (recommandé)";
$elem["bilibop-rules/make_unpersistent_rules"]["description"]="What persistent rules do you want to make unpersistent ?
 Some udev rules files can store information about components of the computer
 your system is plugged on:
 .
  /etc/udev/rules.d/70-persistent-cd.rules
  /etc/udev/rules.d/70-persistent-net.rules
 .
 These files are cumulative and can store obsolete information, possibly
 leading to unexpected behaviour of your network manager or CD burner
 application. It is possible to replace them by symlinks to temporary files
 to keep them always up to date. Note that it is possible to do or undo that
 at any time by running
 .
  dpkg-reconfigure bilibop-rules
";
$elem["bilibop-rules/make_unpersistent_rules"]["descriptionde"]="Welche beständigen Regeln möchten Sie in flüchtige umwandeln?
 Einige Udev-Regeldateien können Informationen über Bestandteile des Rechners speichern, an den Ihr System angeschlossen ist:
 .
  /etc/udev/rules.d/70-persistent-cd.rules
  /etc/udev/rules.d/70-persistent-net.rules
 .
 Diese Dateien sind anwachsend und können veraltete Informationen enthalten. Dies führt möglicherweise zu unerwartetem Verhalten Ihrer Netzwerkverwaltung oder Ihres CD-Brennprogramms. Es ist möglich, sie durch symbolische Verweise auf temporäre Dateien zu ersetzen, um sie immer aktuell zu halten. Beachten Sie, dass Sie dies durch Ausführung jederzeit aktivieren oder rückgängig machen können.
 .
  dpkg-reconfigure bilibop-rules
";
$elem["bilibop-rules/make_unpersistent_rules"]["descriptionfr"]="Quelles règles persistantes voulez-vous rendre volatiles ?
 Certains fichiers de règles udev peuvent stocker des informations concernant le matériel de la machine sur laquelle votre système est connecté :
 .
  /etc/udev/rules.d/70-persistent-cd.rules
  /etc/udev/rules.d/70-persistent-net.rules
 .
 Ces fichiers sont cumulatifs et peuvent contenir des informations obsolètes pouvant conduire à un comportement inattendu de votre gestionnaire de connexions ou de votre logiciel de gravure de CD. Il est possible de remplacer ces fichiers par des liens symboliques vers des fichiers temporaires pour les maintenir à jour. Notez qu'il est possible de le faire ou le défaire n'importe quand en lançant
 .
  dpkg-reconfigure bilibop-rules
";
$elem["bilibop-rules/make_unpersistent_rules"]["default"]="keep";
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
$elem["bilibop-rules/physical_volumes_filter/without_global_filter/warning"]["type"]="error";
$elem["bilibop-rules/physical_volumes_filter/without_global_filter/warning"]["description"]="Physical Volumes Filter will not be applied.
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
";
$elem["bilibop-rules/physical_volumes_filter/without_global_filter/warning"]["descriptionde"]="Filter physicher Datenträger werden nicht angewandt.
 Möglicherweise aufgrund eines Fehlers in »66-bilibop.rules« wurden die folgenden Geräte nicht durch Udev mit »BILIBOP« markiert oder haben keinen brauchbaren durch Udev verwalteten symbolischen Verweis:
 .
  ${UNTAGGED}
  ${UNLINKED}
 .
 Dies bedeutet, dass einige Variablen in »/etc/lvm/lvm.conf« auf Ihren Ursprungswerten belassen oder auf diese geändert werden:
 .
  obtain_device_list_from_udev = ${FROMUDEV}
  filter = ${FILTER}
";
$elem["bilibop-rules/physical_volumes_filter/without_global_filter/warning"]["descriptionfr"]="Le filtre des Volumes Physiques ne sera pas appliqué.
 Probablement en raison d'une erreur dans '66-bilibop-rules', les périphériques suivants n'ont pas été étiquetés 'BILIBOP' par udev, ou n'ont pas de lien symbolique géré par udev :
 .
  ${UNTAGGED}
  ${UNLINKED}
 .
 Cela signifie que certaines variables dans '/etc/lvm/lvm.conf' seront conservées ou réinitialisées à leurs valeurs initiales :
 .
  obtain_device_list_from_udev = ${FROMUDEV}
  filter = ${FILTER}
";
$elem["bilibop-rules/physical_volumes_filter/without_global_filter/warning"]["default"]="";
$elem["bilibop-rules/physical_volumes_filter/with_global_filter/warning"]["type"]="error";
$elem["bilibop-rules/physical_volumes_filter/with_global_filter/warning"]["description"]="Physical Volumes Filter will not be applied.
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
$elem["bilibop-rules/physical_volumes_filter/with_global_filter/warning"]["descriptionde"]="Filter physicher Datenträger werden nicht angewandt.
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
$elem["bilibop-rules/physical_volumes_filter/with_global_filter/warning"]["descriptionfr"]="Le filtre des Volumes Physiques ne sera pas appliqué.
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
$elem["bilibop-rules/physical_volumes_filter/with_global_filter/warning"]["default"]="";
PKG_OptionPageTail2($elem);
?>
