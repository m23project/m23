<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nbd-server");

$elem["nbd-server/number"]["type"]="string";
$elem["nbd-server/number"]["description"]="Number of nbd-server instances to run:
 Multiple nbd-server processes may run to export multiple files or
 block devices. Please specify how many configurations for such servers you
 want to generate.
 .
 Note that you can always add extra servers by adding them to
 /etc/nbd-server/config, or by running \"dpkg-reconfigure nbd-server\".
";
$elem["nbd-server/number"]["descriptionde"]="Zahl der zu betreibenden nbd-Serverinstanzen:
 Mehrere nbd-Server-Prozesse könnten zum Exportieren mehrerer Dateien oder Blockgeräte laufen. Bitte geben Sie an, wie viele Konfigurationen für solche Server Sie erzeugen möchten.
 .
 Beachten Sie, dass Sie immer zusätzliche Server hinzufügen können, indem Sie sie zu /etc/nbd-server/config hinzufügen oder indem Sie »dpkg-reconfigure nbd-server« ausführen.
";
$elem["nbd-server/number"]["descriptionfr"]="Nombre d'instance de nbd-server à exécuter :
 Plusieurs instances de nbd-server peuvent être exécutées afin d'exporter plusieurs fichiers ou périphériques bloc. Veuillez indiquer le nombre d'instances de nbd-server qui doivent être configurées.
 .
 Veuillez noter que vous pouvez ajouter des serveurs supplémentaires en les ajoutant à /etc/nbd-server/config ou en utilisant la commande « dpkg-reconfigure nbd-server ».
";
$elem["nbd-server/number"]["default"]="0";
$elem["nbd-server/port"]["type"]="string";
$elem["nbd-server/port"]["description"]="TCP Port for server number ${number}:
 Please specify the TCP port this instance of nbd server will use for
 listening. As NBD is likely to use more than one port, no dedicated
 port has been assigned in IANA lists.
 .
 Therefore, NBD does not have a standard port number, which means you need
 to provide one. You should make sure this port is not already in use.
";
$elem["nbd-server/port"]["descriptionde"]="TCP-Port für Server Nummer ${number}:
 Bitte geben Sie den TCP-Port an, den diese Instanz des nbd-Servers zum Warten auf Anfragen verwenden wird. Da NBD wahrscheinlich mehr als einen Port benutzt, wurde in den IANA-Listen kein bestimmter Port zugewiesen.
 .
 Deshalb hat NBD keinen festgelegten Port, daher müssen Sie einen eingeben. Sie sollten sicherstellen, dass dieser Port nicht bereits benutzt wird.
";
$elem["nbd-server/port"]["descriptionfr"]="Port TCP du serveur numéro ${number} :
 Veuillez indiquer le port TCP où cette instance du serveur NBD sera à l'écoute. Comme NBD utilise souvent plus d'un port, aucun numéro de port dédié n'a été réservé par l'IANA.
 .
 En conséquence, NBD n'utilise pas de port officiellement attribué et vous devez donc en indiquer un. Vous devriez vous assurer que ce port n'est pas actuellement utilisé.
";
$elem["nbd-server/port"]["default"]="";
$elem["nbd-server/filename"]["type"]="string";
$elem["nbd-server/filename"]["description"]="File to export (server number ${number}):
 Please specify a file name or block device that should be exported
 over the network. You can export a real block device (for instance
 \"/dev/hda1\"); a normal file (such as \"/export/nbd/bl1\"); or a
 bunch of files all at once. For the third option, you can
 use \"%s\" in the filename, which will be expanded to the
 IP-address of the connecting client. An example would be
 \"/export/swaps/swp%s\".
 .
 Note that it is possible to tune the way in which the IP address will
 be substituted in the file name. See \"man 5 nbd-server\" for details.
";
$elem["nbd-server/filename"]["descriptionde"]="Datei zum Exportieren (Server Nummer ${number}):
 Bitte geben Sie einen Dateinamen oder ein Blockgerät an, das über das Netz exportiert werden soll. Sie können ein echtes Gerät (z.B. »/dev/hda1«), eine normale Datei (z.B. »/export/nbd/bl1«) oder aber eine Gruppe von Dateien auf einmal exportieren. Für die dritte Option können Sie »%s« im Dateinamen benutzen, damit der Name mit den IP-Adressen der sich verbindenden Clients aufgefüllt wird. Ein Beispiel ist »/export/swaps/swp%s«.
 .
 Beachten Sie, dass es möglich ist, die Art und Weise, wie die IP-Adressen in den Dateinamen eingebaut werden, zu beeinflussen. Lesen Sie »man 5 nbd-server« für weitere Details.
";
$elem["nbd-server/filename"]["descriptionfr"]="Fichier à exporter (serveur numéro ${number}) :
 Veuillez indiquer le nom d'un fichier ou d'un périphérique bloc que vous souhaitez exporter via le réseau. Vous pouvez exporter un véritable périphérique bloc (par exemple « /dev/hda1 »), un fichier normal (par exemple « /export/nbd/bl1 ») ou plusieurs fichiers à la fois. Dans ce dernier cas, vous pouvez utiliser « %s » dans le nom du fichier, cette valeur étant alors remplacée par l'adresse IP du client qui s'y connectera. Un exemple serait « /export/swap/swp%s ».
 .
 Veuillez noter qu'il est possible de régler la méthode de remplacement de l'adresse IP dans le nom de fichier. Veuillez consulter la page de manuel de nbd-server(5) pour plus d'informations.
";
$elem["nbd-server/filename"]["default"]="";
$elem["nbd-server/autogen"]["type"]="error";
$elem["nbd-server/autogen"]["description"]="AUTO_GEN is set to \"n\" in /etc/nbd-server
 The /etc/nbd-server file contains a line that sets the AUTO_GEN variable
 to \"n\". The file will therefore not be regenerated automatically.
 .
 Note that the current version of the nbd-server package no longer uses
 /etc/nbd-server. Instead it uses a new configuration file, read by
 nbd-server itself (rather than the init script), which supports more
 options. See \"man 5 nbd-server\" for details.
 .
 If you remove or comment out the AUTO_GEN line, a file
 /etc/nbd-server/config in the new format may be generated based on the
 current configuration. Until then, the nbd-server installation will be
 broken.
";
$elem["nbd-server/autogen"]["descriptionde"]="AUTO_GEN wurde in /etc/nbd-server auf »n« gesetzt
 Die Datei /etc/nbd-client enthält eine Zeile, in der die Variable AUTO_GEN auf »n« gesetzt wird. Die Datei wird daher nicht automatisch erneuert.
 .
 Beachten Sie, dass die aktuelle Version des Pakets nbd-server /etc/nbd-server nicht mehr benutzt. Stattdessen verwendet es eine neue Konfigurationsdatei, die vom nbd-Server selbst (statt vom Initskript) eingelesen wird, die mehr Optionen unterstützt. Lesen Sie »man 5 nbd-server« für weitere Details.
 .
 Falls Sie die AUTO_GEN-Zeile entfernen oder in einen Kommentar setzen, kann eine Datei /etc/nbd-server/config im neuen Format, basierend auf Ihrer aktuellen Konfiguration, erstellt werden. Bis dahin wird Ihre nbd-server-Installation defekt sein.
";
$elem["nbd-server/autogen"]["descriptionfr"]="Variable AUTO_GEN égale à « n » dans /etc/nbd-server
 Le fichier /etc/nbd-server comporte une ligne qui définit la variable AUTO_GEN à « n ». Le fichier ne sera donc pas recréé automatiquement.
 .
 Veuillez noter que la version actuelle du paquet nbd-server n'utilise plus /etc/nbd-server. À la place, un fichier de configuration est lu par nbd-server lui-même : il gère plus d'options qui sont détaillées dans « man 5 ndb-server ».
 .
 Si vous supprimez ou commentez la ligne AUTO_GEN, un fichier /etc/nbd-server/config sera créé au nouveau format, à partir de la configuration actuelle. Tant que cette opération n'aura pas été effectuée, l'installation du serveur nbd ne sera pas opérationnelle.
";
$elem["nbd-server/autogen"]["default"]="";
$elem["nbd-server/convert"]["type"]="boolean";
$elem["nbd-server/convert"]["description"]="Convert old-style nbd-server configuration file?
 A pre-2.9 nbd-server configuration file has been found on this system.
 The current nbd-server package no longer supports this file and will
 not work if it is kept as is.
 .
 If you choose this
 option, the system will generate a new style configuration file based
 upon the old-style configuration file, which will be removed. Otherwise,
 configuration questions will be asked and the system will generate a new configuration file.
 .
 If a new-style configuration file already exists and you choose this
 option, you will shortly see a \"modified configuration file\" prompt, as
 usual.
";
$elem["nbd-server/convert"]["descriptionde"]="Im alten Format vorliegende nbd-server-Konfiguration konvertieren?
 Eine nbd-server-Konfigurationsdatei vor 2.9 wurde auf diesem System gefunden. Das aktuelle nbd-server-Paket unterstützt diese Datei nicht länger und wird nicht funktionieren, wenn sie so beibehalten wird, wie sie ist.
 .
 Wenn Sie diese Option wählen, wird das System eine Konfiguration im neuen Stil erzeugen, die auf der Konfigurationsdatei im alten Stil basiert, welche entfernt wird. Andernfalls werden Konfigurationsfragen gestellt und das System erzeugt eine neue Konfigurationsdatei.
 .
 Falls bereits eine Konfigurationsdatei im neuen Format existiert und Sie diese Option wählen, wird in Kürze wie gewohnt die Abfrage »geänderte Konfigurationsdatei« erfolgen.
";
$elem["nbd-server/convert"]["descriptionfr"]="Faut-il convertir l'ancien fichier de configuration de nbd-server ?
 Un fichier de configuration pour une version antérieure à 2.9 a été trouvé sur ce système. Le paquet nbd-server actuel ne peut plus gérer ce type de fichier et ne fonctionnera pas s'il n'est pas modifié.
 .
 Si vous choisissez cette option, un nouveau fichier de configuration sera créé à partir de l'ancien, qui sera supprimé. Dans le cas contraire, des questions de configuration seront posées et un nouveau fichier de configuration sera créé.
 .
 Si vous utilisez déjà un fichier de configuration au nouveau format et que vous choisissez cette option, vous verrez apparaître, brièvement, une notification pour « fichier de configuration modifié ».
";
$elem["nbd-server/convert"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
