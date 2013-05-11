<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("em8300");

$elem["em8300/microcode/download"]["type"]="boolean";
$elem["em8300/microcode/download"]["description"]="Download microcode image from the Web?
 The upstream developers have tried several microcode images and
 selected the one that works best on various cards. Therefore, this
 microcode image is probably better than the ones you can get from
 your Windows drivers. The upstream developers have made it available
 for download on their website.
 .
 However, because of some legal issues, this microcode image cannot be
 distributed by Debian. If you do not want to download it, you can
 still extract the appropriate microcode image(s) from the Windows
 .vxd file, using em8300mc_ex.
 .
 Warning: If /lib/firmware/em8300.bin already exists on your system, it
 will be overwritten by the downloaded file.
";
$elem["em8300/microcode/download"]["descriptionde"]="Microcode-Image aus dem Internet laden?
 Die Entwickler dieses Programms haben verschiedene Microcode-Images getestet und dasjenige ausgewählt, das am Besten mit verschiedenen Karten funktioniert. Deshalb ist dieses Microcode-Image wahrscheinlich besser als diejenigen, die Sie von Ihren Windows-Treibern bekommen können. Die Entwickler haben es zum Herunterladen auf deren Website zur Verfügung gestellt.
 .
 Aufgrund von rechtlichen Problemen kann dieses Microcode-Image jedoch von Debian nicht verbreitet werden. Falls Sie es nicht herunterladen möchten, können die entsprechenden Microcode-Images immer noch aus der Windows-.vxd-Datei unter Verwendung von em8300mc_ex extrahieren.
 .
 Warnung: Falls /lib/firmware/em8300.bin schon auf Ihrem System existiert, wird es von der heruntergeladenen Datei überschrieben.
";
$elem["em8300/microcode/download"]["descriptionfr"]="Faut-il télécharger l'image du microcode sur Internet ?
 Les développeurs amont ont essayé plusieurs images de microcode et choisi celle qui fonctionne le mieux avec différentes cartes. En conséquence, cette image de microcode fonctionne probablement mieux que celles que vous obtiendriez à partir de vos pilotes Windows. Cette image de microcode est disponible sur le site web des développeurs amont.
 .
 Cependant, pour des raisons légales, elle ne peut pas être distribuée par Debian. Si vous ne souhaitez pas la télécharger, vous pouvez toujours extraire celle(s) du fichier .vxd de Windows en utilisant la commande « em8300-mc_ex ».
 .
 Attention : si un fichier /lib/firmware/em8300.bin existe déjà sur le système, il sera écrasé par le fichier téléchargé.
";
$elem["em8300/microcode/download"]["default"]="true";
$elem["em8300/microcode/download_failed"]["type"]="error";
$elem["em8300/microcode/download_failed"]["description"]="Failed to download microcode image
 The microcode image was not downloaded from the upstream authors' web
 site. You probably won't be able to use your MPEG decoder card until
 you download a microcode image.
 .
 To retry, run \"dpkg-reconfigure em8300\" as root, or download it from
   http://dxr3.sourceforge.net/download/em8300.uc
 and save it as \"/lib/firmware/em8300.bin\".
";
$elem["em8300/microcode/download_failed"]["descriptionde"]="Herunterladen des Microcode-Images fehlgeschlagen
 Das Microcode-Image wurde nicht von der Website der Programmautoren heruntergeladen. Sie werden Ihre MPEG-Dekoder-Karte möglicherweise nicht verwenden können, bis Sie ein Microcode-Image heruntergeladen haben.
 .
 Um den Versuch zu wiederholen führen Sie »dpkg-reconfigure em8300« als root aus oder laden Sie es von
   http://dxr3.sourceforge.net/download/em8300.uc
 herunter und speichern es als »/lib/firmware/em8300.bin«.
";
$elem["em8300/microcode/download_failed"]["descriptionfr"]="Échec du téléchargement de l'image du microcode
 L'image du microcode n'a pas pu être téléchargée depuis le site des développeurs amont. Vous ne pourrez probablement pas utiliser votre carte de décompression MPEG tant qu'elle ne sera pas téléchargée.
 .
 Pour réessayer cette opération, vous pouvez utiliser la commande « dpkg-reconfigure em8300 » avec les privilèges du superutilisateur ou télécharger vous-même l'image du microcode à l'adresse http://dxr3.sourceforge.net/download/em8300.uc puis la placer sur votre système sous le nom /usr/share/em8300/em8300.uc.
";
$elem["em8300/microcode/download_failed"]["default"]="";
$elem["em8300/microcode/file"]["type"]="select";
$elem["em8300/microcode/file"]["description"]="Primary microcode:
 This will copy a microcode image previously installed in
 /usr/share/em8300/ to /lib/firmware/em8300.bin and use it.
";
$elem["em8300/microcode/file"]["descriptionde"]="Primärer Microcode:
 Dies wird ein Microcode-Image, welches zuvor in /usr/share/em8300/ installiert wurde, nach /lib/firmware/em8300.bin kopieren und verwenden.
";
$elem["em8300/microcode/file"]["descriptionfr"]="Microcode principal :
 L'image du microcode installée jusqu'ici dans /usr/share/em8300/ sera copiée dans /lib/firmware/em8300.bin et sera utilisée.
";
$elem["em8300/microcode/file"]["default"]="None";
$elem["em8300/microcode/delete_olddir"]["type"]="boolean";
$elem["em8300/microcode/delete_olddir"]["description"]="Delete old firmware directory?
 Multiple microcode images seem to be installed
 in /usr/share/em8000/. Support for multiple microcode images has
 been removed from this version, so if you wish to continue using
 multiple microcode images, you will have to keep these files and
 handle the situation manually. You will be responsible for removing
 these files once you have finished with them.
 .
 Most people need only a single microcode image. If you want to use
 only one microcode image, or if you do not know why you have multiple
 microcode images installed, then you can accept and the extra files
 will be deleted.
";
$elem["em8300/microcode/delete_olddir"]["descriptionde"]="Das alte Firmware-Verzeichnis löschen?
 Mehrere Microcode-Images scheinen in /usr/share/em8000/ installiert zu sein. Die Unterstützung für mehrere Microcode-Images wurde aus dieser Version entfernt. Falls Sie weiterhin mehrere Microcode-Images verwenden möchten, müssen Sie diese Dateien behalten und die Situation manuell behandeln. Sie sind dafür verantwortlich, diese Dateien zu entfernen sobald Sie mit ihnen fertig sind.
 .
 Die meisten Anwender benötigen nur ein einziges Microcode-Image. Falls Sie nur eins verwenden möchten oder falls Sie nicht wissen, warum Sie mehrere Microcode-Images installiert haben, können Sie hier akzeptieren, und die zusätzlichen Dateien werden gelöscht.
";
$elem["em8300/microcode/delete_olddir"]["descriptionfr"]="Faut-il supprimer l'ancien répertoire du microcode ?
 Plusieurs images de microcode semblent être installées dans /usr/share/em8000/. La gestion d'images de microcode multiples a été supprimée de cette version. En conséquence, si vous voulez continuer à utiliser plusieurs images de microcode, vous devrez les conserver et les gérer vous-même, y compris les effacer quand vous n'en aurez plus besoin.
 .
 Dans la plupart des cas, une seule image est nécessaire. Si vous êtes dans ce cas et si vous ignorez pourquoi plusieurs images sont détectées, vous pouvez choisir cette option et les fichiers supplémentaires seront effacés.
";
$elem["em8300/microcode/delete_olddir"]["default"]="false";
$elem["em8300/chipset"]["type"]="select";
$elem["em8300/chipset"]["choices"][1]="adv717x";
$elem["em8300/chipset"]["description"]="Chip used on MPEG decoder card:
 Creative DXR3 cards have a bt865 on board, while Hollywood Plus cards
 use an adv717x.
";
$elem["em8300/chipset"]["descriptionde"]="Der auf der MPEG-Dekoder-Karte verwendete Baustein:
 Creative-DXR3-Karten haben einen bt865 an Bord während Hollywood-Plus-Karten einen adv717x verwenden.
";
$elem["em8300/chipset"]["descriptionfr"]="Composant utilisé par votre carte de décompression MPEG :
 Les cartes DXR3 de Creative sont dotées d'un composant bt865 alors que les cartes Hollywood Plus utilisent un adv717x.
";
$elem["em8300/chipset"]["default"]="";
$elem["em8300/bt865/options"]["type"]="string";
$elem["em8300/bt865/options"]["description"]="Options for bt865 module:
 Options can be passed to the bt865 kernel module when it is loaded
 to control how it works.
 .
 Options include:
  output_mode=comp+svideo|rgb
 Multiple options should be separated by spaces.
";
$elem["em8300/bt865/options"]["descriptionde"]="Einstellungen für das bt865-Modul:
 Die Optionen können an das bt865-Kernel-Modul übergeben werden, wenn es geladen wird, um dessen Funktion zu steuern.
 .
 Die Optionen beinhalten:
  output_mode=comp+svideo|rgb
 Mehrere Optionen sollten durch Leerzeichen getrennt werden.
";
$elem["em8300/bt865/options"]["descriptionfr"]="Options pour le module bt865 :
 Les options passées au module bt865 du noyau permettent de contrôler son mode de fonctionnement.
 .
 Ces options peuvent être :
  output_mode=comp+svideo|rgb
 Les différentes options doivent être séparées par des espaces.
";
$elem["em8300/bt865/options"]["default"]="";
$elem["em8300/adv717x/options"]["type"]="string";
$elem["em8300/adv717x/options"]["description"]="Options for adv717x module:
 Options can be passed to the adv717x kernel module when it is loaded
 to control how it works.
 .
 Options include:
  output_mode=comp+svideo|svideo|comp|comp+psvideo|psvideo|composvideo|yuv|rgb|rgbs
  pixelport_16bit=0|1
  pixelport_other_pal=0|1
  pixeldata_adjust_ntsc=0|1|2|3
  pixeldata_adjust_pal=0|1|2|3
 Multiple options should be separated by spaces.
 .
 Some sets of options have been reported to remove color
 problems. Check the package documentation for details.
 .
 Unfortunately, there is currently no way to find the right parameters
 for your card, so you'll have to find them yourself by trial and error.
";
$elem["em8300/adv717x/options"]["descriptionde"]="Einstellungen für das adv717x-Modul:
 Die Optionen können an das adv717x-Kernel-Modul übergeben werden, wenn es geladen wird, um dessen Funktion zu steuern.
 .
 Die Optionen beinhalten:
  output_mode=comp+svideo|svideo|comp|comp+psvideo|psvideo|composvideo|yuv|rgb|rgbs
  pixelport_16bit=0|1
  pixelport_other_pal=0|1
  pixeldata_adjust_ntsc=0|1|2|3
  pixeldata_adjust_pal=0|1|2|3
 Mehrere Optionen sollten durch Leerzeichen getrennt werden.
 .
 Für manche Optionen wurde berichtet, dass sie Farbprobleme beseitigen. Lesen Sie die Paketdokumentation für Einzelheiten.
 .
 Unglücklicherweise gibt es gegenwärtig keine Möglichkeit, die richtigen Parameter für Ihre Karte zu bestimmen. Sie müssen sie selbst durch ausprobieren herausfinden.
";
$elem["em8300/adv717x/options"]["descriptionfr"]="Options pour le module adv717x :
 Les options passées au module adv717x du noyau permettent de contrôler son mode de fonctionnement.
 .
 Ces options peuvent être :
  - output_mode=comp+svideo|svideo|comp|comp+psvideo|psvideo|composvideo|yuv|rgb|rgbs
  - pixelport_16bit=0|1
  - pixelport_other_pal=0|1
  - pixeldata_adjust_ntsc=0|1|2|3
  - pixeldata_adjust_pal=0|1|2|3
 Les différentes options doivent être séparées par des espaces.
 .
 Certaines combinaisons sont connues pour supprimer les problèmes de couleur. Veuillez consulter la documentation pour plus de détails.
 .
 Malheureusement, il n'existe actuellement pas de moyen pour trouver les paramètres adaptés à votre carte. Vous devez donc les trouver par essais successifs.
";
$elem["em8300/adv717x/options"]["default"]="";
$elem["em8300/options"]["type"]="string";
$elem["em8300/options"]["description"]="Options for em8300 module:
 Options can be passed to the em8300 kernel module when it is loaded
 to control how it works.
 .
 Options include:
  activate_loopback=0|1
  audio_driver=alsa|oss|osslike|none
  alsa_index=-1|0|1|2|3|...
  dsp_num=-1|0|1|2|3|...
  bt865_ucode_timeout=0|1
  dicom_control=0|1
  dicom_fix=0|1
  dicom_other_pal=0|1
  use_bt865=0|1
 Multiple options should be separated by spaces.
 .
 Some sets of options have been reported to remove color
 problems. Check the package documentation for details.
 .
 Unfortunately, there is currently no way to find the right parameters
 for your card, so you'll have to find them yourself by trial and error.
";
$elem["em8300/options"]["descriptionde"]="Einstellungen für das em8300-Modul:
 Die Optionen können an das em8300-Kernel-Modul übergeben werden, wenn es geladen wird, um dessen Funktion zu steuern.
 .
 Die Optionen beinhalten:
  activate_loopback=0|1
  audio_driver=alsa|oss|osslike|none
  alsa_index=-1|0|1|2|3|...
  dsp_num=-1|0|1|2|3|...
  bt865_ucode_timeout=0|1
  dicom_control=0|1
  dicom_fix=0|1
  dicom_other_pal=0|1
  use_bt865=0|1
 Mehrere Optionen sollten durch Leerzeichen getrennt werden.
 .
 Für manche Optionen wurde berichtet, dass sie Farbprobleme beseitigen. Lesen Sie die Paketdokumentation für Einzelheiten.
 .
 Unglücklicherweise gibt es gegenwärtig keine Möglichkeit, die richtigen Parameter für Ihre Karte zu bestimmen. Sie müssen sie selbst durch ausprobieren herausfinden.
";
$elem["em8300/options"]["descriptionfr"]="Options pour le module em8300 :
 Les options passées au module em8300 du noyau permettent de contrôler son mode de fonctionnement.
 .
 Ces options peuvent être :
  - activate_loopback=0|1
  - audio_driver=alsa|oss|osslike|none
  - alsa_index=-1|0|1|2|3|...
  - dsp_num=-1|0|1|2|3|...
  - bt865_ucode_timeout=0|1
  - dicom_control=0|1
  - dicom_fix=0|1
  - dicom_other_pal=0|1
  - use_bt865=0|1
 Les différentes options doivent être séparées par des espaces.
 .
 Certaines combinaisons sont connues pour supprimer les problèmes de couleur. Veuillez consulter la documentation pour plus de détails.
 .
 Malheureusement, il n'existe actuellement pas de moyen pour trouver les paramètres adaptés à votre carte. Vous devez donc les trouver par essais successifs.
";
$elem["em8300/options"]["default"]="";
$elem["em8300/no_device_creation"]["type"]="note";
$elem["em8300/no_device_creation"]["description"]="No creation of device files
 Special device files must exist to enable access to your MPEG decoder
 card.
 .
 You seem to be using a static /dev. Special device files can't be
 created automatically because no major number has been allocated to
 the em8300 officially yet.
 .
 Hence, you'll have to choose a major number to use (121 is used by
 default, but it's officially allocated to \"LOCAL/EXPERIMENTAL USE\")
 and create the corresponding device files yourself. Please read
 /usr/share/doc/em8300/README.Debian for more info.
";
$elem["em8300/no_device_creation"]["descriptionde"]="Keine Erzeugung von Gerätedateien
 Spezielle Gerätedateien müssen existieren, um den Zugang zu Ihrer MPEG-Decoder-Karte zu ermöglichen.
 .
 Sie scheinen ein statisches /dev zu verwenden. Die speziellen Gerätedateien können nicht automatisch angelegt werden, da an das em8300 noch keine Major-Nummer offiziell vergeben wurde.
 .
 Deshalb müssen Sie eine Major-Nummer wählen (121 wird als Voreinstellung verwendet, aber diese ist offiziell für »lokale/experimentelle Verwendung« vorgesehen) und die entsprechende Gerätedatei selbst erzeugen. Bitte lesen Sie /usr/share/doc/em8300/README.Debian für mehr Informationen.
";
$elem["em8300/no_device_creation"]["descriptionfr"]="Pas de création des fichiers de périphériques
 Des fichiers spéciaux de périphériques sont nécessaires pour pouvoir accéder à votre carte de décompression MPEG.
 .
 Le répertoire /dev semble être géré statiquement. Les fichiers de périphériques ne peuvent pas être créés automatiquement car aucun numéro majeur (« major number ») n'a encore été attribué au pilote em8300.
 .
 En conséquence, vous devez choisir un numéro majeur (121 par défaut, quoiqu'alloué officiellement pour utilisation locale ou expérimentale) et créer vous-même le fichier de périphérique correspondant. Veuillez consulter le fichier /usr/share/doc/em8300/README.Debian pour plus d'informations.
";
$elem["em8300/no_device_creation"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
