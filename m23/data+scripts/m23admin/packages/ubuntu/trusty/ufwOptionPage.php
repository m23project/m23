<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ufw");

$elem["ufw/existing_configuration"]["type"]="error";
$elem["ufw/existing_configuration"]["description"]="Existing configuration found
 An existing configuration for ufw has been found.
 Existing rules must be managed manually.
 .
 You should read the ufw(8) manpage for details about ufw configuration.
";
$elem["ufw/existing_configuration"]["descriptionde"]="Bestehende Konfiguration gefunden
 Eine existierende Konfiguration fÃ¼r Ufw wurde gefunden. Existierende Regeln mÃ¼ssen manuell verwaltet werden.
 .
 Sie sollten die Handbuchseite ufw(8) fÃ¼r weitere Hinweise zur Konfiguration von Ufw lesen.
";
$elem["ufw/existing_configuration"]["descriptionfr"]="Configuration existante trouvée
 Une configuration existante a été trouvée pour ufw. Les règles qui y sont utilisées doivent être gérées manuellement.
 .
 Vous devriez lire la page de manuel ufw(8) pour plus de détails sur la configuration de ufw.
";
$elem["ufw/existing_configuration"]["default"]="";
$elem["ufw/enable"]["type"]="boolean";
$elem["ufw/enable"]["description"]="Start ufw automatically?
 If you choose this option, the rules you are about to set
 will be enabled during system startup so that this host is protected
 as early as possible.
 .
 To protect this host immediately, you must start ufw manually.
";
$elem["ufw/enable"]["descriptionde"]="Ufw automatisch starten?
 Falls Sie diese Option wÃ¤hlen, werden die in KÃ¼rze erstellten Regeln wÃ¤hrend des Systemstartes aktiviert, so dass dieser Rechner so frÃ¼h wie mÃ¶glich geschÃ¼tzt wird.
 .
 Um diesen Rechner sofort zu schÃ¼tzen, mÃ¼ssen Sie Ufw manuell starten.
";
$elem["ufw/enable"]["descriptionfr"]="Démarrer ufw automatiquement ?
 Si vous choisissez cette option, les règles que vous allez définir seront activées au démarrage du système afin que cette machine soit protégée le plus tôt possible.
 .
 Pour protéger cette machine immédiatement, vous devrez démarrer ufw vous-même.
";
$elem["ufw/enable"]["default"]="false";
$elem["ufw/allow_known_ports"]["type"]="multiselect";
$elem["ufw/allow_known_ports"]["choices"][1]="CUPS";
$elem["ufw/allow_known_ports"]["choices"][2]="DNS";
$elem["ufw/allow_known_ports"]["choices"][3]="IMAPS";
$elem["ufw/allow_known_ports"]["choices"][4]="POP3S";
$elem["ufw/allow_known_ports"]["choices"][5]="SSH";
$elem["ufw/allow_known_ports"]["choices"][6]="CIFS (Samba)";
$elem["ufw/allow_known_ports"]["choices"][7]="SMTP";
$elem["ufw/allow_known_ports"]["choices"][8]="HTTP";
$elem["ufw/allow_known_ports"]["description"]="Authorized services:
 Please choose the services that should be available for incoming connections.
 .
 Other services may be specified in the next configuration step.
";
$elem["ufw/allow_known_ports"]["descriptionde"]="Berechtigte Dienste:
 Bitte wÃ¤hlen Sie die Dienste aus, die fÃ¼r eingehende Verbindungen verfÃ¼gbar sein sollen.
 .
 Andere Dienste kÃ¶nnen im nÃ¤chsten Konfigurationsschritt festgelegt werden.
";
$elem["ufw/allow_known_ports"]["descriptionfr"]="Services autorisés :
 Veuillez choisir les services qui devraient rester disponibles pour les connections entrantes.
 .
 D'autres services peuvent être indiqués dans la prochaine étape de configuration.
";
$elem["ufw/allow_known_ports"]["default"]="";
$elem["ufw/allow_custom_ports"]["type"]="string";
$elem["ufw/allow_custom_ports"]["description"]="Additional authorized services:
 Please enter a space separated list of any additional ports you would like to
 open. You may use a service name (as found in /etc/services), a
 port number, or a port number with protocol.
 .
 Example: to allow a web server, port 53
 and tcp port 22, you should enter \"www 53 22/tcp\".
";
$elem["ufw/allow_custom_ports"]["descriptionde"]="ZusÃ¤tzliche autorisierte Dienste:
 Bitte geben Sie die Liste der zusÃ¤tzlichen Ports, die geÃ¶ffnet werden sollen, durch Leerzeichen getrennt an. Sie kÃ¶nnen Dienstenamen (wie in /etc/services angegeben), Portnummern oder Portnummern mit Protokoll verwenden.
 .
 Beispiel: um einem Webserver, Port 53 und TCP-Port 22 zu erlauben sollten Sie Â»www 53 22/tcpÂ« eingeben.
";
$elem["ufw/allow_custom_ports"]["descriptionfr"]="Services supplémentaires autorisés :
 Veuillez indiquer la liste des ports additionnels à ouvrir, séparés par des espaces. Vous pouvez utiliser un nom de service (comme ceux de /etc/services), un numéro de port, ou un numéro de port avec protocole.
 .
 Exemple : pour autoriser un serveur web, le port 53 et le port TCP 22, vous devriez saisir « www 53 22/tcp ».
";
$elem["ufw/allow_custom_ports"]["default"]="";
PKG_OptionPageTail2($elem);
?>
