<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pybit-client");

$elem["pybit-client/clientid"]["type"]="string";
$elem["pybit-client/clientid"]["description"]="PyBit client-ID string:
 Please specify a unique string that can be used to identify this client
 within the job list and queues.
";
$elem["pybit-client/clientid"]["descriptionde"]="PyBit Client-ID-Zeichenkette:
 Bitte geben Sie eine eindeutige Zeichenkette an, die diesen Client innerhalb der Aufgabenliste und -warteschlange bezeichnen wird.
";
$elem["pybit-client/clientid"]["descriptionfr"]="Chaîne client-ID pour PyBit :
 Veuillez indiquer une chaîne unique pouvant être utilisée pour identifier ce client au sein de la liste de tâches et des files d'attente.
";
$elem["pybit-client/clientid"]["default"]="";
$elem["pybit-client/lvmsnapshot"]["type"]="boolean";
$elem["pybit-client/lvmsnapshot"]["description"]="Use LVM snapshots on this client?
 If the sbuild configuration uses LVM snapshots, pybit-client can ensure
 that your snapshot APT cache data is kept up-to-date whilst keeping the
 snapshot clean.
";
$elem["pybit-client/lvmsnapshot"]["descriptionde"]="Sollen auf diesem Client LVM-Momentaufnahmen benutzt werden?
 Falls die Konfiguration von Sbuild LVM-Momentaufnahmen benutzt, kann Pybit-Client sicherstellen, dass Ihre zwischengespeicherten APT-Daten aktuell gehalten werden, während die Momentaufnahme sauber gehalten wird.
";
$elem["pybit-client/lvmsnapshot"]["descriptionfr"]="Utiliser des instantanés LVM sur ce client ?
 Si la configuration sbuild utilise des instantanés LVM, pybit-client peut s'assurer que votre instantané des données du cache de APT sont mises à jour tout en gardant l'instantané propre.
";
$elem["pybit-client/lvmsnapshot"]["default"]="false";
$elem["pybit-client/buildroot"]["type"]="string";
$elem["pybit-client/buildroot"]["description"]="Buildd location:
 Please specify a writeable directory where the version control handler
 and the upload task can write files.
 .
 If this is left blank, the default /home/buildd/pybit will be used.
";
$elem["pybit-client/buildroot"]["descriptionde"]="Buildd-Speicherort:
 Bitte geben Sie ein beschreibbares Verzeichnis an, in dem das Programm zur Versionskontrolle und der Upload-Prozess Dateien erzeugen können.
 .
 Falls dies leer gelasssen wird, wird die Vorgabe /home/buildd/pybit benutzt.
";
$elem["pybit-client/buildroot"]["descriptionfr"]="Emplacement de Buildd :
 Veuillez indiquer un répertoire avec les droits d'écriture dans lequel le gestionnaire de contrôle de version et la tâche de téléversement peuvent écrire des fichiers.
 .
 Si laissé vide, la valeur par défaut /home/buildd/pybit sera utilisée.
";
$elem["pybit-client/buildroot"]["default"]="/home/buildd/pybit";
$elem["pybit-client/rabbitmqhost"]["type"]="string";
$elem["pybit-client/rabbitmqhost"]["description"]="Host machine running RabbitMQ:
 Please specify the server running RabbitMQ that this buildd client will
 communicate with, receiving details of the jobs it needs to attempt to
 build.
";
$elem["pybit-client/rabbitmqhost"]["descriptionde"]="Host, auf dem RabbitMQ ausgeführt wird:
 Bitte geben Sie den Server an, auf dem RabbitMQ ausgeführt wird und mit dem sich der Buildd-Client verbinden wird, um Einzelheiten über die Paketbauaufgaben zu erhalten, die er erledigen soll.
";
$elem["pybit-client/rabbitmqhost"]["descriptionfr"]="Machine hôte hébergeant RabbitMQ :
 Veuillez indiquer le serveur faisant tourner RabbitMQ avec lequel ce client buildd communiquera, et qui recevra les détails des tâches dont il a besoin pour tenter de compiler.
";
$elem["pybit-client/rabbitmqhost"]["default"]="";
$elem["pybit-client/dputdest"]["type"]="string";
$elem["pybit-client/dputdest"]["description"]="Destination for dput package uploads:
 Please specify the machine that this client will use as upload host.
 This destination will be stored in its dput configuration.
 .
 This entry must not be empty.
";
$elem["pybit-client/dputdest"]["descriptionde"]="Ziel für das Hochladen von Paketen mit Dput:
 Bitte geben Sie den Rechner an, auf den dieser Client Dateien hochladen wird. Dieses Ziel wird in seiner Dput-Konfiguration gespeichert.
 .
 Dieser Eintrag darf nicht leer sein.
";
$elem["pybit-client/dputdest"]["descriptionfr"]="
 Veuillez indiquer la machine dont se servira ce client comme hôte de téléversement. Cet emplacement sera enregistré dans sa configuration dput.
 .
 Cette entrée ne peut pas être vide.
";
$elem["pybit-client/dputdest"]["default"]="";
$elem["pybit-client/missingid"]["type"]="note";
$elem["pybit-client/missingid"]["description"]="Client-ID string cannot be empty!
 This client will fail to start until it receives a unique client-ID.
";
$elem["pybit-client/missingid"]["descriptionde"]="Client-ID-Zeichenkette kann nicht leer sein!
 Der Start dieses Clients wird fehlschlagen, bis er eine eindeutige Client-ID erhält.
";
$elem["pybit-client/missingid"]["descriptionfr"]="La chaîne Client-ID ne peut pas être vide !
 Ce client ne pourra pas démarrer tant qu'il n'aura pas obtenu un client-ID unique.
";
$elem["pybit-client/missingid"]["default"]="";
$elem["pybit-client/missinghost"]["type"]="note";
$elem["pybit-client/missinghost"]["description"]="Missing RabbitMQ hostname!
 This client will not receive any messages from the queue and will
 not build any packages until a RabbitMQ host is specified.
 .
 Please edit /etc/pybit/client/client.conf after configuration.
";
$elem["pybit-client/missinghost"]["descriptionde"]="Fehlender RabbitMQ-Hostname!
 Dieser Client wird keine Nachrichten aus der Warteschlange empfangen und keine Pakete bauen, bis ein RabbitMQ-Host angegeben wird.
 .
 Bitte bearbeiten Sie nach der Konfiguration /etc/pybit/client/client.conf.
";
$elem["pybit-client/missinghost"]["descriptionfr"]="Nom d'hôte pour RabbitMQ manquant !
 Ce client ne recevra pas de messages depuis la file d'attente et ne compilera aucun paquet tant qu'un hôte RabbitMQ n'est pas indiqué.
 .
 Veuillez éditer le fichier /etc/pybit/client/client.conf après la configuration.
";
$elem["pybit-client/missinghost"]["default"]="";
$elem["pybit-client/defaultdput"]["type"]="note";
$elem["pybit-client/defaultdput"]["description"]="Missing dput destination!
 pybit-client is not intended to upload to unspecified dput
 destinations like ftp-master.debian.org and does not currently
 support GnuPG signed uploads.
";
$elem["pybit-client/defaultdput"]["descriptionde"]="Dput-Ziel fehlt!
 Pybit-Client ist nicht dazu gedacht, an nicht angegebene Dput-Ziele wie ftp-master.debian.org hochzuladen und unterstützt derzeit keine mit GnuPG signierten Uploads.
";
$elem["pybit-client/defaultdput"]["descriptionfr"]="Emplacement de dput manquant !
 pybit-client n'a pas pour vocation de téléverser vers des emplacements dput non-spécifés comme ftp-master.debian.org et ne supporte actuellement pas les téléversements signés avec GnuPG.
";
$elem["pybit-client/defaultdput"]["default"]="";
PKG_OptionPageTail2($elem);
?>
