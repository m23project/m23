<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("vidalia");

$elem["vidalia/tor-daemon-interaction"]["type"]="select";
$elem["vidalia/tor-daemon-interaction"]["choices"][1]="No Configuration";
$elem["vidalia/tor-daemon-interaction"]["choices"][2]="One-off restart";
$elem["vidalia/tor-daemon-interaction"]["choicesde"][1]="Keine Konfiguration";
$elem["vidalia/tor-daemon-interaction"]["choicesde"][2]="Einmaliger Neustart";
$elem["vidalia/tor-daemon-interaction"]["choicesfr"][1]="Pas de configuration";
$elem["vidalia/tor-daemon-interaction"]["choicesfr"][2]="Redémarrage ponctuel";
$elem["vidalia/tor-daemon-interaction"]["description"]="Tor/Vidalia interaction:
 Vidalia needs to communicate with the running Tor daemon so that it
 can provide a graphical user interface for it. This requires either
 the manual reconfiguration of Tor to allow secure authentication
 (recommended) or a restart of Tor under Vidalia's control.
   * No configuration:
     leave Tor running for now. Vidalia will not be able to
     communicate with Tor until it is manually reconfigured - see
     \"/usr/share/doc/vidalia/README.Debian\" for more details;
   * One-off restart:
     stop Tor now so Vidalia can start it, just this once - Tor will
     start by itself on reboots, so manual configuration will still
     be required;
   * Permanent takeover:
     stop Tor and simply let Vidalia handle starting it whenever you
     run Vidalia (not usable on a multi-user system).
";
$elem["vidalia/tor-daemon-interaction"]["descriptionde"]="Zusammenarbeit von Tor und Vidalia:
 Damit Vidalia eine grafische Oberfläche für den laufenden Tor-Daemon bereitstellen kann, muss Vidalia mit ihm kommunizieren. Dies erfordert entweder die manuelle Neukonfiguration von Tor, um eine sichere Authentifizierung zu ermöglichen (empfohlen) oder einen von Vidalia gesteuerten Neustart von Tor.
   * Keine Konfiguration: 
     Tor vorerst weiterlaufen lassen. Vidalia kann nicht mit Tor
     kommunizieren, bis er manuell neu konfiguriert wird - siehe
     »/usr/share/doc/Vidalia/README.Debian« für weitere Einzelheiten.
 *   Einmaliger Neustart:
     Tor jetzt beenden, damit er dieses eine Mal von Vidalia gestartet
     wird. Tor startet bei den folgenden Systemstarts eigenständig. Eine
     manuelle Konfiguration bleibt weiterhin erforderlich.
   * Dauerhaften Übernahme:
     Tor beenden und bei jedem Start von Vidalia von ihr steuern lassen
     (kann auf Mehrbenutzer-Systemen nicht angewendet werden).
";
$elem["vidalia/tor-daemon-interaction"]["descriptionfr"]="Interaction entre Tor et Vidalia :
 Vidalia doit communiquer avec le démon en cours de Tor afin de lui fournir une interface graphique. Pour cela, Tor doit soit être reconfiguré pour permettre une authentification sûre (option recommandée) ou redémarré sous le contrôle de Vidalia.
   * Pas de configuration :
     Laisser Tor en route maintenant. Vidalia ne pourra pas
     communiquer avec lui tant que Tor n'est pas reconfiguré. Voir
     /usr/share/doc/vidalia/README.Debian pour plus d'informations ;
   * Redémarrage ponctuel :
     Arrêter Tor maintenant pour que Vidalia puisse le démarrer, juste
     cette fois-ci. Tor démarrera toujours de lui-même si la machine
     est relancée donc une configuration manuelle restera nécessaire ;
   * Prise de contrôle permanente :
     Arrêter Tor puis laisser Vidalia en gérer le lancement quand il
     est nécessaire (inutilisable sur un système multi-utilisateurs).
";
$elem["vidalia/tor-daemon-interaction"]["default"]="permanent";
PKG_OptionPageTail2($elem);
?>
