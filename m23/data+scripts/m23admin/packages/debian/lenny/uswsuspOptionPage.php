<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("uswsusp");

$elem["uswsusp/resume_device"]["type"]="select";
$elem["uswsusp/resume_device"]["description"]="Swap space to resume from:
 To be able to suspend the system, uswsusp needs a swap partition or file
 to store a system snapshot. Please choose the device to use, from the
 list of suitable swap spaces, sorted by size (largest first).
";
$elem["uswsusp/resume_device"]["descriptionde"]="Swap-Partition, von der das System wieder aufgeweckt wird:
 Um Ihr System in den Ruhezustand versetzen zu können, benötigt uswsusp eine Swap-Partition oder -Datei, in die ein Schnappschuss des Systems gespeichert wird. Bitte wählen Sie das zu verwendene Gerät aus der Liste der geeigneten Swap-Bereiche aus, die nach Größe sortiert nach sind (größte zuerst).
";
$elem["uswsusp/resume_device"]["descriptionfr"]="Espace d'échange de reprise après la veille prolongée :
 Uswsusp peut utiliser une partition ou un fichier d'échange pour sauvegarder l'image mémoire lors de la mise en veille prolongée. Veuillez choisir dans la liste proposée, triée par taille, du plus grand au plus petit, l'espace d'échange à utiliser.
";
$elem["uswsusp/resume_device"]["default"]="";
$elem["uswsusp/resume_offset"]["type"]="string";
$elem["uswsusp/resume_offset"]["description"]="Offset of swap file's header:
 When using a swap file for storing the snapshot during suspend, the
 location of the swap file's header must be specified. This will be
 stored in <PAGE_SIZE> units, as the offset from the beginning of the
 partition that contains the swap file.


";
$elem["uswsusp/resume_offset"]["descriptionde"]="";
$elem["uswsusp/resume_offset"]["descriptionfr"]="";
$elem["uswsusp/resume_offset"]["default"]="";
$elem["uswsusp/no_swap"]["type"]="error";
$elem["uswsusp/no_swap"]["description"]="No suitable swap space for software suspend
 To be able to suspend the system, uswsusp needs a swap partition or file to
 write a system snapshot to. No such space seems to be available for this.
 .
 You should create a swap partition or file, preferably twice the size of the system's
 physical RAM.
 .
 Then, run 'dpkg-reconfigure uswsusp' or edit the configuration file
 manually.
";
$elem["uswsusp/no_swap"]["descriptionde"]="Kein geeigneter Swap-Bereich für Software-Suspend gefunden
 Um das System in den Ruhezustand versetzen zu können, benötigt uswsusp eine Swap-Partition oder -Datei, in die der Schnappschuss des Systems gespeichert wird. Dafür scheint kein solcher Platz vorhanden zu sein.
 .
 Sie sollten eine Swap-Partition oder -Datei erstellen, falls möglich doppelt so groß wie der physische RAM des Systems.
 .
 Führen Sie dann »dpkg-reconfigure uswsusp« aus oder bearbeiten Sie die Konfigurationsdatei manuell.
";
$elem["uswsusp/no_swap"]["descriptionfr"]="Aucun espace d'échange disponible pour la mise en veille prolongée
 Uswsusp peut utiliser une partition ou un fichier d'échange pour sauvegarder l'image mémoire lors de la mise en veille prolongée. Aucun espace d'échange disponible pour cela n'a été trouvé.
 .
 Vous devriez créer une partition ou un fichier d'échange d'une taille double de celle de la RAM du système.
 .
 Ensuite, exécutez « dpkg-reconfigure uswsusp » ou modifiez vous-même le fichier de configuration.
";
$elem["uswsusp/no_swap"]["default"]="";
$elem["uswsusp/no_snapshot"]["type"]="error";
$elem["uswsusp/no_snapshot"]["description"]="No userspace software suspend support in the kernel
 The current kernel doesn't support userspace software suspend. Please
 recompile the kernel with the 'CONFIG_SOFTWARE_SUSPEND=y' option.
";
$elem["uswsusp/no_snapshot"]["descriptionde"]="Keine Userspace-Software-Suspend-Unterstützung im Kernel
 Der aktuelle Kernel unterstützt Userspace-Software-Suspend nicht. Bitte übersetzen Sie den Kernel mit der Option »CONFIG_SOFTWARE_SUSPEND=y«.
";
$elem["uswsusp/no_snapshot"]["descriptionfr"]="Pas de gestion de la mise en veille prolongée dans le noyau
 Le noyau actuel ne gère pas la mise en veille prolongée en espace utilisateur. Veuillez recompiler le noyau avec l'option « CONFIG_SOFTWARE_SUSPEND » à « y ».
";
$elem["uswsusp/no_snapshot"]["default"]="";
$elem["uswsusp/continue_without_swap"]["type"]="boolean";
$elem["uswsusp/continue_without_swap"]["description"]="Continue without a valid swap space?
 The swap file or partition that was found in uswsusp's configuration
 file is not active.
 .
 In most cases this means userspace software suspend will
 not work as expected. You should choose another
 swap space.
 .
 However, in some rare cases, this configuration may be intentional.
";
$elem["uswsusp/continue_without_swap"]["descriptionde"]="Ohne einen gültigen Swap-Bereich fortfahren?
 Die Swap-Datei oder -Partition, die in der Konfigurationsdatei von uswsusp gefunden wurde, ist nicht aktiv.
 .
 In den meisten Fällen bedeutet dies, dass Userspace-Software-Suspend nicht wie erwartet funktionieren wird. Sie sollten einen anderen Swap-Bereich auswählen.
 .
 Allerdings köennte diese Konfiguration in einigen wenigen Fällen beabsichtigt sein.
";
$elem["uswsusp/continue_without_swap"]["descriptionfr"]="Faut-il continuer sans espace d'échange ?
 L'espace d'échange indiqué dans le fichier de configuration d'uswsusp n'est pas activé.
 .
 Dans la plupart des cas, cela signifie que la mise en veille prolongée en espace utilisateur ne fonctionnera pas. Vous devriez choisir un autre espace d'échange.
 .
 Cependant, dans certains cas, cette configuration peut être utile.
";
$elem["uswsusp/continue_without_swap"]["default"]="true";
$elem["uswsusp/snapshot_device"]["type"]="string";
$elem["uswsusp/snapshot_device"]["description"]="The device node through which uswsusp can talk to the kernel:
 If this is empty, the hardcoded default, /dev/snapshot, is used.
 This should be OK in almost all cases. Don't change this unless there is a
 good reason to do so.
";
$elem["uswsusp/snapshot_device"]["descriptionde"]="Der Geräteknoten, den uswsusp verwendet, um mit dem Kernel zu kommunizieren:
 Falls dieses Feld leer ist, wird der fest-vorgegebene Standard /dev/snapshot verwendet. Dies sollte in den meisten Fällen korrekt sein; ändern Sie dies nicht, falls es nicht einen guten Grund dafür gibt.
";
$elem["uswsusp/snapshot_device"]["descriptionfr"]="Périphérique de dialogue avec le noyau :
 Si cette entrée est vide, le périphérique utilisé sera, par défaut, « /dev/snapshot ». Cela devrait fonctionner dans la plupart des cas. Il est déconseillé de modifier ce réglage.
";
$elem["uswsusp/snapshot_device"]["default"]="";
$elem["uswsusp/image_size"]["type"]="string";
$elem["uswsusp/image_size"]["description"]="Preferred maximum image size:
 Please specify a maximum system snapshot image size (in bytes).
 .
 This limit is not strict; the uswsusp does its best to respect it,
 but will exceed the specified limit if suspend needs a bigger image.
 .
 Using 0 here will enforce the use of the smallest possible snapshot
 image. An empty value will use the hard coded default, which is
 500MB. The default value is 45% of the system's memory: this is not
 the maximal size, but some additional free memory speeds up the
 suspend and resume process.
";
$elem["uswsusp/image_size"]["descriptionde"]="Bevorzugte maximale Image-Größe:
 Bitte geben Sie eine maximale Größe (in Bytes) für das Schnappschuss-Image an.
 .
 Dies ist keine strenge Grenze. Uswsup versucht soweit möglich, diese zu respektieren, falls es aber ein größeres Image benötigt, wird es diese Grenze sprengen.
 .
 Durch 0 wird das kleinstmöglichste Schnappschuss-Image erzwungen. Ohne Eingabe an dieser Stelle wird der fest-einkodierte Standardwert verwenden (500 MB). Der Standardwert is 45% des Systemspeichers; dies ist nicht die maximale Größe, aber etwas zusätzlicher freier Speicher beschleunigt den Prozess des Suspend und Wiederaufwachens.
";
$elem["uswsusp/image_size"]["descriptionfr"]="Taille maximale souhaitée de l'image :
 Veuillez indiquer la taille maximale de l'image (en octets).
 .
 Cette limite n'est pas infranchissable ; uswsusp s'efforcera de limiter la taille de l'image à cette valeur. Si ce n'est pas possible, le système sera malgré tout mis en veille prolongée avec une image de taille supérieure.
 .
 Une valeur nulle demande de minimiser la taille de l'image. Si vous laissez cette entrée vide, la valeur par défaut (500 Mo) sera utilisée. La valeur proposée par défaut correspond à 45 % de la mémoire du système. Cela ne correspond pas à la taille maximale, cependant la mémoire libre accélère la mise en veille prolongée et la reprise.
";
$elem["uswsusp/image_size"]["default"]="";
$elem["uswsusp/suspend_loglevel"]["type"]="string";
$elem["uswsusp/suspend_loglevel"]["description"]="Log level for software suspend:
 Please specify the kernel console log level which the s2disk/s2both
 and resume utilities will use to report the progress of suspend and
 resume.  On a stock kernel, messages with levels higher than 7 are
 usually not shown.
";
$elem["uswsusp/suspend_loglevel"]["descriptionde"]="Protokollstufe für Software-Suspend:
 Bitte geben Sie die Protokoll-Stufe der Kernel-Konsole an, die s2disk/s2both und die Werkzeuge zum Wiederaufwachen verwenden, um den Fortschritt des Suspends und Wiederaufwachens zu berichten. Bei einem Standard-Kernel werden Mitteilungen mit einer Stufe höher als sieben gewöhnlich nicht angezeigt.
";
$elem["uswsusp/suspend_loglevel"]["descriptionfr"]="Niveau de verbosité des journaux :
 Veuillez indiquer le niveau de verbosité des journaux du noyau qui sera utilisé par les programmes s2disk, s2both et resume lors de la mise en veille prolongée et de la reprise. Si vous n'utilisez pas un noyau personnalisé, les messages avec un niveau supérieur à 7 ne sont pas affichés.
";
$elem["uswsusp/suspend_loglevel"]["default"]="";
$elem["uswsusp/max_loglevel"]["type"]="string";
$elem["uswsusp/max_loglevel"]["description"]="Maximal log level:
 Please specify the kernel console log level which the resume utility will use
 if the resume fails.
";
$elem["uswsusp/max_loglevel"]["descriptionde"]="Maximale Protokoll-Stufe:
 Bitte geben Sie die Konsole-Protokoll-Stufe des Kernels an, die das Werkzeug zum Wiederaufwachen verwenden wird, falls das Wiederaufwachen fehlschlägt.
";
$elem["uswsusp/max_loglevel"]["descriptionfr"]="Niveau maximum de verbosité des journaux :
 Veuillez indiquer le niveau de verbosité des journaux du noyau qui sera utilisé par l'utilitaire « resume » si la reprise échoue.
";
$elem["uswsusp/max_loglevel"]["default"]="";
$elem["uswsusp/compute_checksum"]["type"]="boolean";
$elem["uswsusp/compute_checksum"]["description"]="Perform checksum on image?
 Performing a checksum using the MD5 algorithm to verify the image
 integrity is slightly safer, but also takes more time.
";
$elem["uswsusp/compute_checksum"]["descriptionde"]="Prüfsumme für Image verwenden?
 Die Verwendung einer MD5-Prüfsumme zur Überprüfung der Image-Integrität ist etwas sicherer, benötigt aber auch mehr Zeit.
";
$elem["uswsusp/compute_checksum"]["descriptionfr"]="Faut-il calculer une somme de contrôle de l'image ?
 Le calcul de la somme de contrôle de l'image avec l'algorithme MD5 pour en vérifier l'intégrité est plus sûr, mais prend légèrement plus de temps.
";
$elem["uswsusp/compute_checksum"]["default"]="false";
$elem["uswsusp/compress"]["type"]="boolean";
$elem["uswsusp/compress"]["description"]="Compress image?
 Compressing the image with the LZF compression algorithm will result in a
 smaller image, which makes it possible to suspend with a smaller swap
 partition. Generally, it will also make reading and writing the image faster
 because there is less to read and write.
";
$elem["uswsusp/compress"]["descriptionde"]="Image komprimieren?
 Eine Komprimierung des Images mit dem LZF-Algorithmus wird ein kleineres Image erzeugen, was es möglich macht, den Ruhezustand mit einer kleineren Swap-Partition zu nutzen. Im Allgemeinen wird es auch das Lesen und Schreiben des Images beschleunigen, da es weniger Daten zum Lesen und Schreiben gibt.
";
$elem["uswsusp/compress"]["descriptionfr"]="Faut-il compresser l'image ?
 La compression avec l'algorithme LZF produira une image plus petite, ce qui permet d'utiliser une partition d'échange plus petite lors de la mise en veille prolongée. Généralement, cela accélère la lecture et l'écriture de l'image en minimisant le nombre d'opérations d'écriture et de lecture.
";
$elem["uswsusp/compress"]["default"]="true";
$elem["uswsusp/early_writeout"]["type"]="boolean";
$elem["uswsusp/early_writeout"]["description"]="Perform early write out?
 The synchronization of the resume device can start early in the
 process of writing the image to it. This has been reported to speed
 up suspend on some systems and eliminate the 'fast progress meter and
 long fsync wait' effect.
";
$elem["uswsusp/early_writeout"]["descriptionde"]="Frühzeitiges Schreiben durchführen?
 Die Synchronisierung des wieder aufzuweckenden Geräts kann frühzeitig beim Schreiben des Images starten. Es wurde berichtet, dass dies das Wechseln in den Ruhezustand auf einigen Systemen beschleunigt und den Effekt einer »schnellen Fortschrittsanzeige mit langer fsync-Wartezeit« beseitigt.
";
$elem["uswsusp/early_writeout"]["descriptionfr"]="Faut-il utiliser la synchronisation ?
 La synchronisation du périphérique de reprise peut démarrer au début du processus d'écriture de l'image. Cela peut accélérer la mise en veille prolongée pour certains systèmes et éliminer l'effet « chargement rapide et longue attente de synchronisation ».
";
$elem["uswsusp/early_writeout"]["default"]="true";
$elem["uswsusp/splash"]["type"]="boolean";
$elem["uswsusp/splash"]["description"]="Show splash screen?
 Instead of informative output, a splash screen with progress bar can
 be shown during the suspend and resume process. This requires the splashy
 package to be installed.
";
$elem["uswsusp/splash"]["descriptionde"]="Splash-Screen anzeigen?
 Statt informativer Ausgaben kann ein Splash-Screen mit Fortschrittsanzeige während der Aktivierung des Ruhezustands und beim Wiederaufwachprozess angezeigt werden. Damit dies funktioniert, muss das Paket splashy installiert sein.
";
$elem["uswsusp/splash"]["descriptionfr"]="Faut-il afficher un thème graphique (« splash screen ») ?
 Au lieu d'afficher des informations lors de la mise en veille prolongée et de la reprise, vous pouvez afficher un thème avec une barre de progression. Cette fonctionnalité nécessite l'installation du paquet « splashy ».
";
$elem["uswsusp/splash"]["default"]="true";
$elem["uswsusp/encrypt"]["type"]="boolean";
$elem["uswsusp/encrypt"]["description"]="Encrypt snapshot?
 For increased security, it is possible to encrypt the snapshot
 that is written to disk during suspend. On resume (and suspend if you don't
 use an RSA key), you will be prompted for a passphrase. Encryption
 adds a significant time to the suspend and resume processes.
";
$elem["uswsusp/encrypt"]["descriptionde"]="Schnappschuss verschlüsseln?
 Zur Erhöhung der Sicherheit ist es möglich, den Schnappschuss zu verschlüsseln, der beim Suspend auf die Platte geschrieben wird. Beim Wiederaufwachen (und Versetzen in den Ruhezustand, falls Sie keinen RSA-Schlüssel verwenden) werden Sie zur Eingabe einer Passphrase aufgefordert. Bei Verschlüsselung werden beide Vorgänge bedeutend mehr Zeit benötigen.
";
$elem["uswsusp/encrypt"]["descriptionfr"]="Faut-il chiffrer l'image ?
 Pour augmenter la sécurité, il est possible de chiffrer l'image du système écrite sur le disque. Lors de la reprise (et lors de la mise en veille si vous n'utilisez pas de clé RSA), il vous sera demandé une phrase secrète. Dans ce cas, la mise en veille et la reprise prendront plus de temps.
";
$elem["uswsusp/encrypt"]["default"]="false";
$elem["uswsusp/RSA_key_file"]["type"]="string";
$elem["uswsusp/RSA_key_file"]["description"]="Path to RSA key file:
 To avoid the need for a passphrase prompt during each suspend, an RSA
 key can be used to encrypt the image.
 .
 Please specify the path to that file. Leave this field empty to
 not use an RSA key.
";
$elem["uswsusp/RSA_key_file"]["descriptionde"]="Pfad zur RSA-Schlüsseldatei:
 Um die Eingabe einer Passphrase bei jedem Suspend zu vermeiden, kann ein RSA-Schlüssel zur Verschlüsselung des Images verwendet werden.
 .
 Bitte geben Sie den Pfad zu dieser Datei an. Lassen Sie dieses Feld leer, um keinen RSA-Schlüssel zu verwenden.
";
$elem["uswsusp/RSA_key_file"]["descriptionfr"]="Chemin de la clé RSA :
 Afin que le système ne demande pas de phrase secrète à chaque reprise, vous pouvez utiliser une clé RSA qui servira à chiffrer l'image.
 .
 Veuillez indiquer le chemin de la clé RSA. Si vous ne souhaitez pas utiliser de clé RSA, laissez ce champ vide.
";
$elem["uswsusp/RSA_key_file"]["default"]="/etc/uswsusp.key";
$elem["uswsusp/create_RSA_key"]["type"]="boolean";
$elem["uswsusp/create_RSA_key"]["description"]="Create an RSA key?
 The key necessary for using the RSA encryption scheme can be generated now.
 You will be prompted for a passphrase.
";
$elem["uswsusp/create_RSA_key"]["descriptionde"]="Einen RSA-Schlüssel erzeugen?
 Der für die RSA-Verschlüsselung nötige Schlüssel kann jetzt erzeugt werden. Sie werden nach einer Passphrase gefragt.
";
$elem["uswsusp/create_RSA_key"]["descriptionfr"]="Faut-il créer une clé RSA ?
 La clé nécessaire au chiffrement RSA peut être créée immédiatement. Une invite sera affichée pour saisir la phrase secrète.
";
$elem["uswsusp/create_RSA_key"]["default"]="false";
$elem["uswsusp/RSA_key_bits"]["type"]="string";
$elem["uswsusp/RSA_key_bits"]["description"]="RSA key size:
 Please specify the size of the RSA key (number of bits between 1024
 and 4096). A bigger key increases the encryption strength but slows
 down the encryption process.
";
$elem["uswsusp/RSA_key_bits"]["descriptionde"]="RSA-Schlüssellänge:
 Bitte geben Sie die Größe des RSA-Schlüssels ein (Anzahl von Bits zwischen 1024 und 4096). Ein größerer Schlüssel erhöht die Verschlüsselungsstärke, verlangsamt aber den Verschlüsselungsprozess.
";
$elem["uswsusp/RSA_key_bits"]["descriptionfr"]="Taille de la clé RSA :
 Veuillez indiquer la taille de la clé RSA (entre 1024 et 4096 bits inclus). Plus la taille est importante, plus la sécurité est élevée mais plus l'opération est lente.
";
$elem["uswsusp/RSA_key_bits"]["default"]="1024";
$elem["uswsusp/RSA_passphrase"]["type"]="password";
$elem["uswsusp/RSA_passphrase"]["description"]="RSA passphrase:
 Please choose the passphrase to use on every resume to decrypt the
 image.
";
$elem["uswsusp/RSA_passphrase"]["descriptionde"]="RSA-Passphrase:
 Bitte wählen Sie die Passphrase aus, die bei jedem Wiederaufwachen zur Entschlüsselung des Images verwendet werden soll.
";
$elem["uswsusp/RSA_passphrase"]["descriptionfr"]="Phrase secrète :
 Veuillez choisir la phrase secrète à utiliser lors de chaque reprise afin de déchiffrer l'image.
";
$elem["uswsusp/RSA_passphrase"]["default"]="";
$elem["uswsusp/RSA_passphrase_v"]["type"]="password";
$elem["uswsusp/RSA_passphrase_v"]["description"]="RSA passphrase confirmation:
";
$elem["uswsusp/RSA_passphrase_v"]["descriptionde"]="Bestätigung der RSA-Passphrase:
";
$elem["uswsusp/RSA_passphrase_v"]["descriptionfr"]="Confirmation de la phrase secrète :
";
$elem["uswsusp/RSA_passphrase_v"]["default"]="";
$elem["uswsusp/shutdown_method"]["type"]="select";
$elem["uswsusp/shutdown_method"]["choices"][1]="reboot";
$elem["uswsusp/shutdown_method"]["choices"][2]="platform";
$elem["uswsusp/shutdown_method"]["choicesde"][1]="Neustart";
$elem["uswsusp/shutdown_method"]["choicesde"][2]="Plattform";
$elem["uswsusp/shutdown_method"]["choicesfr"][1]="redémarrage";
$elem["uswsusp/shutdown_method"]["choicesfr"][2]="architecture";
$elem["uswsusp/shutdown_method"]["description"]="Shutdown method:
 If this parameter is set to 'reboot', the s2disk utility will
 reboot the machine rather than powering down. This can be useful
 for testing purposes.
 .
 If it is set to 'platform', hardware-specific optimization is used
 if available.
";
$elem["uswsusp/shutdown_method"]["descriptionde"]="Methode zum Herunterfahren:
 Falls dieser Parameter auf »Neustart« eingestellt ist, wird das Hilfswerkzeug S2disk die Maschine neu starten, statt sie abzuschalten. Dies kann für Testzwecke nützlich sein.
 .
 Falls er auf »Plattform« gesetzt ist, werden soweit möglich Hardware-spezifische Optimierungen verwandt.
";
$elem["uswsusp/shutdown_method"]["descriptionfr"]="Méthode d'arrêt :
 Si vous choissisez « redémarrage », le programme s2disk redémarrera le système au lieu de l'éteindre. Cela peut être utile lors de test.
 .
 Si vous choissisez « architecture », des optimisations spécifiques à celle-ci seront utilisées si possible.
";
$elem["uswsusp/shutdown_method"]["default"]="platform";
PKG_OptionPageTail2($elem);
?>
