<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("apt-cacher-ng");

$elem["apt-cacher-ng/gentargetmode"]["type"]="select";
$elem["apt-cacher-ng/gentargetmode"]["choices"][1]="Set up once";
$elem["apt-cacher-ng/gentargetmode"]["choices"][2]="Set up now and update later";
$elem["apt-cacher-ng/gentargetmode"]["choicesde"][1]="Nur einmalig einrichten";
$elem["apt-cacher-ng/gentargetmode"]["choicesde"][2]="Jetzt einrichten und später aktualisieren";
$elem["apt-cacher-ng/gentargetmode"]["choicesfr"][1]="Configurer une seule fois";
$elem["apt-cacher-ng/gentargetmode"]["choicesfr"][2]="Configurer maintenant et mettre à jour plus tard";
$elem["apt-cacher-ng/gentargetmode"]["description"]="Automatic remapping of client requests:
 Apt-Cacher NG can download packages from repositories other than those
 requested by the clients. This allows it to cache content effectively,
 and makes it easy for an administrator to switch to another mirror later.
 The URL remapping can be set up automatically, using a configuration
 based on the current state of /etc/apt/sources.list.
 .
 Please specify whether the remapping should be configured once now, or
 reconfigured on every update of Apt-Cacher NG (modifying the
 configuration files each time), or left unconfigured.
 .
 Selecting \"No automated setup\" will leave the existing configuration
 unchanged. It will need to be updated manually.
";
$elem["apt-cacher-ng/gentargetmode"]["descriptionde"]="Automatische Umleitung der Client-Anfragen:
 Apt-Cacher NG kann Pakete von anderen Depots beziehen als von denen, die in Client-Aufrufen angegeben wurden. Dadurch kann der Cache effektiver arbeiten, außerdem kann nachträglich einfacher auf andere Spiegelserver umgestellt werden. Diese URL-Abbildung kann jetzt automatisch eingerichtet werden, unter Berücksichtigung des aktuellen Inhalts von /etc/apt/sources.list.
 .
 Bitte auswählen, ob die URL-Abbildung jetzt einmalig, oder bei jeder Aktualisierung von Apt-Cacher NG (Konfiguration wird jedes Mal angepasst), oder gar nicht konfiguriert werden soll.
 .
 Die Auswahl von »Keine automatische Konfiguration« lässt bestehende Konfigurationsdateien unverändert. Diese müssen dann per Hand gepflegt werden.
";
$elem["apt-cacher-ng/gentargetmode"]["descriptionfr"]="Redirection automatique des requêtes :
 Apt-Cacher NG peut télécharger des paquets depuis d'autres dépôts que ceux demandés par les clients. Cela permet de mettre les données en cache efficacement et facilite la tâche de l'administrateur lors d'un changement ultérieur de miroir. La redirection d'URL peut être configurée automatiquement en reprenant des éléments de l'état courant de /etc/apt/sources.list.
 .
 Veuillez indiquer si la redirection doit être configurée une seule fois maintenant, ou bien lors de chaque mise à jour de Apt-Cacher NG (les fichiers de configuration seront modifiés à chaque fois), ou encore laissée non configurée.
 .
 Le choix « Pas de configuration automatique » conserve la configuration existante. Vous devrez alors la mettre à jour vous-même.
";
$elem["apt-cacher-ng/gentargetmode"]["default"]="Set up once";
$elem["apt-cacher-ng/bindaddress"]["type"]="string";
$elem["apt-cacher-ng/bindaddress"]["description"]="Listening address(es) for Apt-Cacher NG:
 Please specify the local addresses that Apt-Cacher NG should listen on
 (multiple entries must be separated by spaces).
 .
 Each entry must be an IP address or hostname associated with a local
 network interface. Generic protocol-specific addresses are also
 supported, such as 0.0.0.0 for listening on all IPv4-enabled interfaces.
 .
 If this field is left empty, Apt-Cacher NG will listen on all
 interfaces, with all supported protocols.
 .
 The special word \"keep\" keeps the value from the current (or default)
 configuration unchanged.
";
$elem["apt-cacher-ng/bindaddress"]["descriptionde"]="Mit Apt-Cacher NG verbundene Adresse(n):
 Verbindung annehmende Adressen oder Rechnernamen, mehrere Einträge sind mit Leerzeichen zu trennen.
 .
 Jeder Eintrag entspricht einer Adresse (IP oder Computername), hinter der eine lokale Netzwerkschnittstelle steht. Generische protokollspezifische Adressen werden ebenfalls unterstützt, wie 0.0.0.0 als Beschreibung sämtlicher IPv4-Schnittstellen.
 .
 Ein leerer Eintrag bedeutet alle Schnittstellen und Protokolle.
 .
 Das besondere Schlüsselwort \"keep\" lässt die derzeitige Einstellung (beziehungsweise Standardeinstellung) unverändert.
";
$elem["apt-cacher-ng/bindaddress"]["descriptionfr"]="Adresse(s) d'écoute pour Apt-Cacher NG :
 Veuillez indiquer les adresses locales qu'Apt-Cacher NG doit écouter (liste d'adresses séparées par des espaces).
 .
 Chaque entrée doit être ou bien une adresse IP, ou bien un nom d'hôte associé à une interface sur le réseau local. Les adresses génériques définies par un protocole sont acceptées, par exemple 0.0.0.0 pour écouter sur toutes les interfaces compatibles IPv4.
 .
 Si ce champ est laissé vide, Apt-Cacher NG écoutera sur toutes les interfaces, avec tous les protocoles pris en charge.
 .
 Le mot-clef « keep » conserve inchangée la valeur issue de la configuration actuelle (ou par défaut).
";
$elem["apt-cacher-ng/bindaddress"]["default"]="keep";
$elem["apt-cacher-ng/port"]["type"]="string";
$elem["apt-cacher-ng/port"]["description"]="Listening TCP port:
 Please specify the TCP port that Apt-Cacher NG should listen on for
 incoming HTTP (proxy) requests. The default value is port 3142, but it
 can be set to 9999 to emulate apt-proxy.
 .
 If this field is left empty, the value from the current configuration
 remains unchanged.
";
$elem["apt-cacher-ng/port"]["descriptionde"]="Verbindungen annehmender TCP-Port:
 Konfiguriert den TCP-Port, auf dem Apt-Cacher NG die hereinkommenden (Proxy-)HTTP-Anfragen annimmt. Standard ist 3142, kann auch auf 9999 gesetzt werden, um apt-proxy zu emulieren.
 .
 Ein leerer Eintrag lässt die derzeitige Konfiguration unverändert.
";
$elem["apt-cacher-ng/port"]["descriptionfr"]="Port d'écoute TCP :
 Veuillez indiquer le port TCP sur lequel Apt-Cacher NG doit être à l'écoute des requêtes HTTP (proxy) entrantes. La valeur par défaut est le port 3142, mais on peut indiquer 9999 pour émuler apt-proxy.
 .
 Si ce champ est laissé vide, la valeur issue de la configuration courante est conservée.
";
$elem["apt-cacher-ng/port"]["default"]="keep";
$elem["apt-cacher-ng/cachedir"]["type"]="string";
$elem["apt-cacher-ng/cachedir"]["description"]="Top-level directory for package cache:
 The main cache storage directory should be located on a file system without
 file name restrictions.
 .
 If this field is left empty, the value from the current configuration
 remains unchanged or is set to the default of /var/cache/apt-cacher-ng.
";
$elem["apt-cacher-ng/cachedir"]["descriptionde"]="Oberstes Verzeichnis des Paket-Caches:
 Das Hauptverzeichnis des Paket-Caches sollte auf einem Dateisystem ohne Beschränkungen bezüglich der Dateinamen liegen.
 .
 Eine leere Eingabe lässt die derzeitige Konfiguration unverändert (gegebenenfalls auf dem Standardverzeichnis /var/cache/apt-cacher-ng ).
";
$elem["apt-cacher-ng/cachedir"]["descriptionfr"]="Répertoire racine pour le cache des paquets :
 Le répertoire de stockage du cache principal devrait résider sur un système de fichiers exempt de restrictions quant au nommage des fichiers.
 .
 Si ce champ est laissé vide, la valeur issue de la configuration courante est conservée ou bien remplacée par la valeur par défaut /var/cache/apt-cacher-ng.
";
$elem["apt-cacher-ng/cachedir"]["default"]="keep";
$elem["apt-cacher-ng/proxy"]["type"]="string";
$elem["apt-cacher-ng/proxy"]["description"]="Proxy to use for downloads:
 Please specify the proxy server to use for downloads.
 .
 Username and password for the proxy server can be included here following the
 user:pass@host:port scheme. However, please check the documentation for limitations.
 .
 If this field is left empty, Apt-Cacher NG will not use any proxy
 server.
 .
 The special word \"keep\" keeps the value from the current (or default)
 configuration unchanged.
";
$elem["apt-cacher-ng/proxy"]["descriptionde"]="Proxy für das Herunterladen:
 Proxy für das Herunterladen:
 .
 Benutzername und Passwort für den Proxy-Server können hier nach dem Muster benutzer:passwort@rechner:port übergeben werden, das Handbuch enthält jedoch auch Informationen über mögliche Einschränkungen.
 .
 Ein leerer Eintrag hier bedeutet Zugriff ohne Proxy.
 .
 Das besondere Schlüsselwort \"keep\" lässt die derzeitige Einstellung (beziehungsweise Standardeinstellung) unverändert.
";
$elem["apt-cacher-ng/proxy"]["descriptionfr"]="Serveur mandataire (« proxy ») à utiliser pour les téléchargements :
 Veuillez indiquer le serveur mandataire à utiliser pour les téléchargements.
 .
 L'identifiant et le mot de passe pour le serveur mandataire peuvent figurer ici en suivant la convention syntaxique identifiant:motdepasse@serveur:port. Cependant, veuillez consulter la documentation quant aux limitations de cette méthode.
 .
 Si ce champ est laissé vide, Apt-Cacher NG n'utilisera pas de serveur mandataire (« proxy »).
 .
 Le mot-clef « keep » conserve inchangée la valeur issue de la configuration actuelle (ou par défaut).
";
$elem["apt-cacher-ng/proxy"]["default"]="keep";
$elem["apt-cacher-ng/tunnelenable"]["type"]="boolean";
$elem["apt-cacher-ng/tunnelenable"]["description"]="Allow HTTP tunnels through Apt-Cacher NG?
 Apt-Cacher NG can be configured to allow users to create HTTP tunnels,
 which can be used to access remote servers that might otherwise be
 blocked by (for instance) a firewall filtering HTTPS connections.
 .
 This feature is usually disabled for security reasons; enable it only for
 trusted LAN environments.
";
$elem["apt-cacher-ng/tunnelenable"]["descriptionde"]="HTTP-Tunnel für Apt-Cacher NG erlauben?
 In der Konfiguration von Apt-Cacher NG kann dem Benutzer der Aufbau von Verbindungen über HTTP-Tunnel erlaubt werden; dies ist für Zugriffe auf ferne Server nützlich, die ansonsten (beispielsweise) aufgrund von Firewalls zur Filterung von HTTPS-Verbindungen nicht erreichbar wären.
 .
 Diese Funktionalität wird normalerweise aus Sicherheitsgründen deaktiviert; aktivieren Sie sie nur in LAN-Umgebungen, denen Sie vertrauen.
";
$elem["apt-cacher-ng/tunnelenable"]["descriptionfr"]="Faut-il autoriser la création de tunnels HTTP par Apt-Cacher NG ?
 Apt-Cacher NG peut être configuré de façon à autoriser la création de tunnels HTTP, lesquels peuvent être utilisés pour accéder par exemple à des serveurs distants situés derrière un pare-feu filtrant les connexions HTTPS.
 .
 Cette fonctionnalité est habituellement désactivée pour des raisons de sécurité, ne l'utilisez que dans des environnements réseau dignes de confiance.
";
$elem["apt-cacher-ng/tunnelenable"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
