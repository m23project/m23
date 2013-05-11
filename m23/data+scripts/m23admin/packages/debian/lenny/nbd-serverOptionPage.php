<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nbd-server");

$elem["nbd-server/number"]["type"]="string";
$elem["nbd-server/number"]["description"]="How many nbd-servers do you want to run?
 You can run multiple nbd-server processes, to export multiple files or
 block devices. Please specify how many nbd-server configurations you
 want this configuration script to generate.
 .
 Note that you can always add extra servers by adding them to
 /etc/nbd-server/config, or by running 'dpkg-reconfigure nbd-server'.
";
$elem["nbd-server/number"]["descriptionde"]="Wie viele nbd-Server möchten Sie betreiben?
 Sie können mehrere nbd-Server-Prozesse betreiben, um mehrere Dateien oder Blockgeräte zu exportieren. Bitte geben Sie an, wie viele nbd-Server-Konfigurationen das Konfiguration-Skript für Sie erstellen soll.
 .
 Beachten Sie, dass Sie immer zusätzliche Server hinzufügen können, indem Sie sie zu /etc/nbd-server/config hinzufügen oder indem Sie »dpkg-reconfigure nbd-server« ausführen.
";
$elem["nbd-server/number"]["descriptionfr"]="Nombre de processus nbd-server à lancer :
 Vous pouvez lancer plusieurs instances de nbd-server afin d'exporter plusieurs fichiers ou périphériques bloc. Veuillez indiquer le nombre d'instances de nbd-server qui doivent être configurées par cet outil.
 .
 Veuillez noter que vous pouvez ajouter des serveurs supplémentaires en les ajoutant à /etc/nbd-server/config ou en utilisant la commande « dpkg-reconfigure nbd-server ».
";
$elem["nbd-server/number"]["default"]="0";
$elem["nbd-server/port"]["type"]="string";
$elem["nbd-server/port"]["description"]="What port do you want to run the server on (number: ${number})?
 A port is a number in the TCP-header of a TCP/IP network package, that
 defines which application should process the data being sent. For most
 application-layer protocols, like FTP, HTTP, POP3 or SMTP, these numbers
 have been well-defined by IANA, and can be found in /etc/services or STD
 2; for NBD, however, this would not be appropriate since NBD works with a
 separate port for each and every block device being used.
 .
 Therefore, NBD does not have a standard portnumber, which means you need
 to enter one. Make sure the portnumber being entered is not in use
 already.
";
$elem["nbd-server/port"]["descriptionde"]="${number}) laufen?
 Eine Portnummer ist für die TCP-Kopfzeile in einem TCP/IP-Paket wichtig, da dadurch die für das Datenpaket passende Anwendung bestimmt wird. Für die meisten Protokolle der Anwendungs-Schicht wie z.B. FTP, HTTP, POP3 oder SMTP sind die zu verwendenden Portnummern durch die IANA bestimmt und können in der Datei /etc/services oder STD 2 nachgeschlagen werden. Für NBD ist dies nicht festgelegt, da für jedes Blockgerät ein eigener Port verwendet wird.
 .
 Deshalb hat NBD keinen festgelegten Port. Daher müssen Sie den zu verwendenden Port eingeben. Wählen Sie einen noch nicht benutzten Port aus.
";
$elem["nbd-server/port"]["descriptionfr"]="${number}) sera à l'écoute :
 Un port est un nombre dans l'en-tête TCP d'un paquet TCP/IP, qui permet d'indiquer quelle application doit traiter l'information qu'il contient. Pour de nombreux protocoles de la couche réseau applicative, comme FTP, HTTP, POP3 ou SMTP, ces numéros de port ont été normalisés par l'IANA. On peut les trouver dans /etc/services ou STD 2. Pour NBD, cela n'est toutefois pas possible puisqu'il fonctionne avec un port distinct pour chaque périphérique bloc.
 .
 En conséquence, NBD ne possède pas de port officiellement attribué et vous devez donc en indiquer un. Assurez-vous que le port que vous indiquez n'est pas actuellement utilisé.
";
$elem["nbd-server/port"]["default"]="";
$elem["nbd-server/filename"]["type"]="string";
$elem["nbd-server/filename"]["description"]="What file do you want to export (number: ${number})?
 You need to enter a filename to a file or block device you want to export
 over the network. You can either export a real block device (e.g.
 \"/dev/hda1\"), export a normal file (e.g. \"/export/nbd/bl1\"), or export a
 bunch of files all at once; for the last option, you have the
 possibility to use \"%s\" in the filename, which will be expanded to the
 IP-address of the connecting client. An example would be
 \"/export/swaps/swp%s\".
 .
 Note that it is possible to tune the way in which the IP address will
 be substituted in the file name. See \"man 5 nbd-server\" for details.
";
$elem["nbd-server/filename"]["descriptionde"]="${number})?
 Sie müssen einen Dateinamen oder ein Blockgerät angeben, das Sie über das Netz exportieren möchten. Sie können entweder ein Gerät (z.B. »/dev/hda1«), eine normale Datei (z.B. »/export/nbd/bl1«) oder aber eine Gruppe von Dateien auf einmal exportieren. Für die letzte Option verwenden Sie »%s« im Dateinamen, damit der Name mit den IP-Adressen der sich verbindenden Clients aufgefüllt wird. Ein Beispiel ist »/etc/swaps/swp%s«.
 .
 Beachten Sie, dass Sie über den Dateinamen einstellen können, auf welche Art IP-Adressen substituiert werden. Lesen Sie »man 5 nbd-server« für weitere Details.
";
$elem["nbd-server/filename"]["descriptionfr"]="${number}) :
 Veuillez indiquer le nom d'un fichier ou d'un périphérique bloc que vous souhaitez exporter via le réseau. Vous pouvez exporter un véritable périphérique bloc (par exemple « /dev/hda1 »), un fichier normal (par exemple « /export/nbd/bl1 ») ou plusieurs fichiers à la fois. Dans ce dernier cas, vous pouvez utiliser « %s » dans le nom du fichier, cette valeur étant alors remplacée par l'adresse IP du client qui s'y connectera. Un exemple serait « /export/swap/swp%s ».
 .
 Veuillez noter qu'il est possible de régler la méthode de remplacement de l'adresse IP dans le nom de fichier. Veuillez consulter la page de manuel de nbd-server(5) pour plus d'informations.
";
$elem["nbd-server/filename"]["default"]="";
$elem["nbd-server/autogen"]["type"]="error";
$elem["nbd-server/autogen"]["description"]="AUTO_GEN is set at \"n\" in /etc/nbd-server
 /etc/nbd-server contains a line \"AUTO_GEN=n\" -- or something equivalent in
 bash-syntaxis. This means you don't want me to automatically regenerate
 that file.
 .
 Note that the current version of the nbd-server package no longer uses
 /etc/nbd-server; rather, it uses a new configuration file that is read by
 nbd-server itself (rather than the initscript), and which allows to set more
 options. See 'man 5 nbd-server' for details.
 .
 If you remove or uncomment the AUTO_GEN line, a file
 /etc/nbd-server/config in the new format may be generated based on your
 current configuration. Until then, your nbd-server installation will be
 broken.
";
$elem["nbd-server/autogen"]["descriptionde"]="AUTO_GEN=n wurde in /etc/nbd-server auf »n« gesetzt
 /etc/nbd-server enthält eine Zeile »AUTO_GEN=n« oder etwas entsprechendes in der Bash-Syntax. Das bedeutet, dass Sie die Datei nicht automatisch regenerieren lassen möchten.
 .
 Beachten Sie, dass die aktuelle Version des Pakets nbd-server /etc/nbd-server nicht mehr benutzt, stattdessen verwendet es eine neue Konfigurationsdatei, die vom nbd-Server selbst (statt vom Initskript) eingelesen wird und die es auch erlaubt, mehr Optionen zu setzten. Lesen Sie »man 5 nbd-server« für weitere Details.
 .
 Falls Sie die AUTO_GEN-Zeile entfernen oder einkommentieren, kann eine Datei /etc/nbd-server/config im neuen Format, basierend auf Ihrer aktuellen Konfiguration, erstellt werden. Bis dahin wird Ihre nbd-server-Installation defekt sein.
";
$elem["nbd-server/autogen"]["descriptionfr"]="La variable AUTO_GEN vaut « n » dans /etc/nbd-server.
 Une ligne de /etc/nbd-server spécifie « AUTO_GEN=n » (ou quelque chose d'équivalent en syntaxe bash). Cela signifie que vous ne souhaitez pas que ce fichier soit modifié par cet outil de configuration.
 .
 Veuillez noter que la version actuelle du paquet nbd-server n'utilise plus /etc/nbd-server. À la place, un fichier de configuration est lu par nbd-server lui-même : il gère plus d'options qui sont détaillées dans « man 5 ndb-server ».
 .
 Si vous supprimez ou commentez la ligne AUTO_GEN, un fichier /etc/nbd-server/config sera créé au nouveau format, à partir de la configuration actuelle. Tant que cette opération n'aura pas été effectuée, l'installation du serveur nbd ne sera pas opérationnelle.
";
$elem["nbd-server/autogen"]["default"]="";
$elem["nbd-server/convert"]["type"]="boolean";
$elem["nbd-server/convert"]["description"]="Convert old style nbd-server configuration file?
 A pre-2.9 nbd-server configuration file has been found on your system.
 The current nbd-server package no longer supports this file; if you
 depend on it, your nbd-server no longer works. If you accept this
 option, the system will generate a new style configuration file based
 upon your old style configuration file. Then, the old style
 configuration file will be removed. If you do not accept this option, a
 new style configuration file will be generated based on a number of
 questions that will be asked; these may be the very same questions that
 you used to create the old style configuration file in the first place.
 .
 If you already have a new style configuration file and you accept this
 option, you will shortly see a \"modified configuration file\" prompt, as
 usual.
";
$elem["nbd-server/convert"]["descriptionde"]="Nbd-Server-Konfiguration im alten Format konvertieren?
 Eine nbd-server-Konfigurationsdatei (vor Version 2.9) wurde auf Ihrem System gefunden. Das aktuelle Paket nbd-server unterstützt diese Datei nicht mehr; falls Sie diese benötigen, wird Ihr nbd-server nicht mehr funktionieren. Falls Sie diese Option akzeptieren, wird das System eine Konfigurationsdatei im neuen Format, basierend auf Ihrer Konfigurationsdatei im alten Format, erstellen. Dann wird die Konfigurationsdatei im alten Format entfernt. Falls Sie dieser Option nicht zustimmen, wird eine Konfigurationsdatei, basierend auf einer Reihe von Fragen, erstellt; dies könnten die gleichen Fragen sein, die Ihnen auch bei der Erstellung der Konfigurationsdatei im alten Format gestellt wurden.
 .
 Falls Sie bereits eine Konfigurationsdatei im neuen Format haben und Sie dieser Option zustimmen, wird in Kürze wie gewohnt die Abfrage »geänderte Konfigurationsdatei« erfolgen.
";
$elem["nbd-server/convert"]["descriptionfr"]="Faut-il convertir l'ancien fichier de configuration de nbd-server ?
 Un fichier de configuration pour une version de nbd-server antérieure à 2.9 a été trouvé sur le système. La version actuelle du paquet nbd-server ne gère plus ce fichier et le serveur nbd risque de ne plus fonctionner correctement. Si vous choisissez de convertir l'ancien fichier, un nouveau fichier sera créé à partir de l'ancien qui sera ensuite supprimé. Dans le cas contraire, un nouveau fichier sera créé à partir des réponses à des questions qui seront posées. Ces questions risquent d'être les mêmes que celles auxquelles vous avez déjà répondu lors de la première installation du paquet.
 .
 Si vous utilisez déjà un fichier de configuration au nouveau format et que vous choisissez cette option, vous verrez apparaître, brièvement, une notification pour « fichier de configuration modifié ».
";
$elem["nbd-server/convert"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
