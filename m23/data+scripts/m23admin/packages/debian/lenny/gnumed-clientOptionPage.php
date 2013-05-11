<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gnumed-client");

$elem["gnumed-client/server"]["type"]="string";
$elem["gnumed-client/server"]["description"]="Host running the GNUmed database:
 GNUmed is a client-server based medical practice management system.  The
 client software will be installed on this computer.  This client
 software needs to know which host is holding the database. On this host
 the Debian package gnumed-server with the very same version
 number as this package has to be installed.
 .
 If the server and the client run on the same host, you should use
 'localhost' here.
 .
 ATTENTION: Currently the gnumed-server package is not yet released. Thus
 when the GNUmed client program is started a list of public servers to
 select from is presented.  This question is asked just to be prepared for
 future usage or in case you installed the server from upstream CVS.
";
$elem["gnumed-client/server"]["descriptionde"]="Computer, auf dem die GNUmed Datenbank läuft:
 GnuMed ist ein Client-Server basiertes Managementsystem für die medizinische Praxis.  Die Client-Software wird auf diesem Computer installiert. Diese Client-Software benötigt die Information, auf welchem Computer sich die Datenbank befindet.  Auf diesem Computer muß das Debian-Paket gnumed-server mit der selben Versionsnummer wie dieses Paket installiert sein.
 .
 Falls Server und client auf demselben Rechner laufen, sollten Sie hier 'localhost' wählen.
 .
 ACHTUNG: Derzeit ist das Paket gnumed-server noch nicht veröffentlicht. Darum wird beim Start des GNUmed Client Programms eine Liste öffentlicher Server zur Auswahl angeboten.  Diese Frage wird nur zur Vorbereitung für die spätere Anwendung gestellt oder falls Sie den Server selbst aus dem CVS installiert haben.
";
$elem["gnumed-client/server"]["descriptionfr"]="Serveur où se trouve la base de données GNUmed :
 GNUmed est un logiciel de type client-serveur de gestion de clientèle médicale. Vous êtes sur le point d'installer le logiciel client sur cette machine. Ce logiciel a besoin de connaître la machine où se trouve la base de données. Sur cette machine, le paquet Debian gnumed-server avec le même numéro de version que ce paquet doit être installé.
 .
 Si le client et le serveur fonctionnent sur la même machine, vous devez entrer « localhost ».
 .
 ATTENTION : Le paquet gnumed-server n'est pas encore disponible. De ce fait, lorsque le client GNUmed est démarré, une liste de serveurs publics à sélectionner est affichée. Cette question est posée uniquement pour préparer les futurs utilisations ou si vous avez compilé le serveur avec les sources du CVS.
";
$elem["gnumed-client/server"]["default"]="";
PKG_OptionPageTail2($elem);
?>
