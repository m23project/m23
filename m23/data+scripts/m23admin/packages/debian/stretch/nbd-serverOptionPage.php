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
$elem["nbd-server/number"]["descriptionde"]="Zahl der zu betreibenden NBD-Serverinstanzen:
 Mehrere NBD-Serverprozesse könnten zum Exportieren mehrerer Dateien oder Blockgeräte laufen. Bitte geben Sie an, wie viele Konfigurationen für solche Server Sie erzeugen möchten.
 .
 Beachten Sie, dass Sie immer zusätzliche Server hinzufügen können, indem Sie sie zu /etc/nbd-server/config hinzufügen oder indem Sie »dpkg-reconfigure nbd-server« ausführen.
";
$elem["nbd-server/number"]["descriptionfr"]="Nombre d'instance de nbd-server à exécuter :
 Plusieurs instances de nbd-server peuvent être exécutées afin d'exporter plusieurs fichiers ou périphériques bloc. Veuillez indiquer le nombre d'instances de nbd-server qui doivent être configurées.
 .
 Veuillez noter que vous pouvez ajouter des serveurs supplémentaires en les ajoutant à /etc/nbd-server/config ou en utilisant la commande « dpkg-reconfigure nbd-server ».
";
$elem["nbd-server/number"]["default"]="0";
$elem["nbd-server/name"]["type"]="string";
$elem["nbd-server/name"]["description"]="Name of export ${number}:
 Please specify a name for this export.
";
$elem["nbd-server/name"]["descriptionde"]="Name des Exports ${number}):
 Bitte geben Sie einen Namen für diesen Export an.
";
$elem["nbd-server/name"]["descriptionfr"]="Nom de l'export ${number} :
 Veuillez indiquer un nom pour cet export.
";
$elem["nbd-server/name"]["default"]="";
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
PKG_OptionPageTail2($elem);
?>
