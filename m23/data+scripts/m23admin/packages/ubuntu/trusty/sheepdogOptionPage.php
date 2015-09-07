<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sheepdog");

$elem["sheepdog/start"]["type"]="boolean";
$elem["sheepdog/start"]["description"]="Automatically start the sheepdog service?
 Please choose whether the sheepdog service should start automatically
 when the system is booted.
";
$elem["sheepdog/start"]["descriptionde"]="Sheepdog-Dienst automatisch starten?
 Bitte wählen Sie, ob der Sheepdog-Dienst automatisch beim Hochfahren des Systems gestartet werden soll.
";
$elem["sheepdog/start"]["descriptionfr"]="Faut-il démarrer automatiquement le service sheepdog ?
 Veuillez choisir si le service sheepdog doit démarrer automatiquement au lancement du système.
";
$elem["sheepdog/start"]["default"]="false";
$elem["sheepdog/daemon_args"]["type"]="string";
$elem["sheepdog/daemon_args"]["description"]="Arguments for the sheepdog daemon:
 Please choose the command line arguments that should be passed to the
 sheepdog daemon. If no argument is given, the default behavior is to
 start on port 7000, using the corosync driver.
 .
 Available options include:
   -p, --port              specify the TCP port to listen to
   -l, --loglevel          specify the level of logging detail
   -d, --debug             include debug messages in the log
   -D, --directio          use direct I/O when accessing the object store
   -z, --zone              specify the zone ID
   -c, --cluster           specify the cluster driver
 More information can be found in the sheep(8) manual page.
";
$elem["sheepdog/daemon_args"]["descriptionde"]="Argumente für den Sheepdog-Daemon:
 Bitte wählen Sie die Befehlszeilenargumente, die an den Sheepdog-Daemon übergeben werden sollen. Falls kein Argument angegeben wird, startet er standardmäßig auf Port 7000 und verwendet den Corosync-Treiber.
 .
 Die verfügbaren Optionen umfassen:
   -p, --port              gibt den TCP-Port an, auf dem auf eine Verbindung
                           gewartet wird
   -l, --loglevel          gibt die Detailstufe der Protokollierung an
   -d, --debug             lässt Debug-Meldungen in das Protokoll einfließen
   -D, --directio          verwendet beim Zugriff auf den Objektspeicher
                           direkte E/A
   -z, --zone              gibt die Zonenkennung an
   -c, --cluster           gibt den Cluster-Treiber an
 Weitere Informationen finden Sie in der Handbuchseite sheep(8).
";
$elem["sheepdog/daemon_args"]["descriptionfr"]="Paramètres pour le démon sheepdog :
 Veuillez sélectionner les paramètres de ligne de commande qui doivent être passés au démon sheepdog. Si aucun paramètre n'est donné, le comportement par défaut est de démarrer sur le port 7000, en utilisant le pilote corosync.
 .
 Les options disponibles sont :
   -p, --port           indique le port TCP sur lequel écouter ;
   -l, --loglevel       indique le niveau de détails de la journalisation ;
   -d, --debug          inclut les messages de débogage dans les journaux
                        du système ;
   -D, --directio       utilise des entrées/sorties directes lors de l'accès
                        à l'objet stockage ;
   -z, --zone           indique l'identifiant de zone ;
   -c, --cluster        indique le pilote de groupe (« cluster »).
 Vous pouvez trouver plus d'informations dans la page de manuel de sheep(8).
";
$elem["sheepdog/daemon_args"]["default"]="Default:";
PKG_OptionPageTail2($elem);
?>
