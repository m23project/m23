<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nullmailer");

$elem["shared/mailname"]["type"]="string";
$elem["shared/mailname"]["description"]="Mailname of your system:
 This is the fully-qualified host name of the computer running nullmailer.
 It defaults to the literal name 'me'.
";
$elem["shared/mailname"]["descriptionde"]="Mail-Name für Ihr System:
 Dies ist der voll-qualifizierte Hostname des Computers, auf dem nullmailer läuft, standardmäßig 'me'.
";
$elem["shared/mailname"]["descriptionfr"]="Nom de courrier de votre système :
 Le nom de courrier du système est le nom complet qualifié de la machine faisant fonctionner nullmailer. Par défaut, ce sera le nom « me » (« moi », en anglais).
";
$elem["shared/mailname"]["default"]="";
$elem["nullmailer/relayhost"]["type"]="string";
$elem["nullmailer/relayhost"]["description"]="Smarthosts:
 This is a colon-separated list of remote servers to which to send each
 message. Each entry contains a remote host name or address followed by
 an optional protocol string 'host protocol'. The protocol name defaults
 to smtp, and may be followed by command-line arguments for that module.
 .
 Examples:
 .
   smarthost
   smarthost smtp --port=10025
   smarthost smtp --user=foo --pass=bar
";
$elem["nullmailer/relayhost"]["descriptionde"]="Smarthosts:
 Dies ist eine Auflistung (durch Doppelpunkte getrennt) der Server, an die jede E-Mail weitergereicht werden soll. Jeder Eintrag besteht aus einem Hostnamen oder einer IP-Adresse, optional gefolgt von dem zu verwendenden Protokoll 'host protocol'. Das Protokoll ist standardmäßig 'smtp', und kann von Kommandozeilen-Argumenten für dieses Modul gefolgt werden.
 .
 Beispiele:
 .
   smarthost
   smarthost smtp --port=10025
   smarthost smtp --user=foo --pass=bar
";
$elem["nullmailer/relayhost"]["descriptionfr"]="Machines relais :
 Vous pouvez indiquer une liste de serveurs distants, séparés par des deux-points. Chaque entrée contient le nom d'un serveur distant où envoyer le courrier, ou une adresse suivie d'une chaîne facultative indiquant un protocole « host protocol ». Par défaut, le protocole est smtp et il peut être suivi par des arguments de la ligne de commande de ce module.
 .
 Exemples :
 .
   smarthost
   smarthost smtp --port=10025
   smarthost smtp --user=utilisateur --pass=mot_de_passe
";
$elem["nullmailer/relayhost"]["default"]="";
$elem["nullmailer/adminaddr"]["type"]="string";
$elem["nullmailer/adminaddr"]["description"]="Where to send local emails (optional):
 If not empty, all recipients to users at either 'localhost' (the literal
 string) or the canonical host name (from /etc/mailname) are remapped to
 this address. This is provided to allow local daemons to be able to send
 email to 'somebody@localhost' and have it go somewhere sensible instead of
 being bounced by your relay host.
";
$elem["nullmailer/adminaddr"]["descriptionde"]="An welche Adresse sollen lokale E-Mails umgeleitet werden (optional)?
 Tragen Sie hier etwas ein, werden E-Mails an Nutzer entweder an 'localhost' an den kanonischen Hostnamen aus /etc/mailname zu der angegebenen Adresse umgeschrieben. Dies gestattet es lokalen Prozessen, E-Mails an 'somebody@localhost' zu schicken, so daß diese an eine sinnvolle Adresse weitergeleitet werden, anstatt vom Relay-Host abgewiesen zu werden.
";
$elem["nullmailer/adminaddr"]["descriptionfr"]="Adresse où envoyer les courriers locaux (facultatif) :
 Si cette adresse est donnée, tous les destinataires de courriers appartenant à la machine dont le nom est soit « localhost », ou soit le nom de courrier (renseigné par /etc/mailname), sont associés à cette adresse. Les démons locaux peuvent ainsi envoyer des courriers à une adresse sensée, comme « compte@localhost ». Cela évite que le courrier soit renvoyé par la machine relais.
";
$elem["nullmailer/adminaddr"]["default"]="";
PKG_OptionPageTail2($elem);
?>
