<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("noip2");

$elem["noip2/username"]["type"]="string";
$elem["noip2/username"]["description"]="No-IP.com user name:
 Please enter your No-IP.com account user name (usually your email address).
";
$elem["noip2/username"]["descriptionde"]="Benutzername bei No-IP.com:
 Bitte geben Sie den Benutzernamen des Kontos bei No-IP.com an (normalerweise ist dies Ihre E-Mail-Adresse).
";
$elem["noip2/username"]["descriptionfr"]="Identifiant sur No-IP.com :
 Veuillez indiquer l'identifiant de votre compte sur No-IP.com (généralement votre adresse électronique).
";
$elem["noip2/username"]["default"]="";
$elem["noip2/password"]["type"]="password";
$elem["noip2/password"]["description"]="No-IP.com password:
 Please enter your No-IP.com account password.
";
$elem["noip2/password"]["descriptionde"]="Passwort bei No-IP.com:
 Bitte geben Sie das Passwort des Kontos bei No-IP.com an.
";
$elem["noip2/password"]["descriptionfr"]="Mot de passe sur No-IP.com :
 Veuillez indiquer le mot de passe de votre compte sur No-IP.com.
";
$elem["noip2/password"]["default"]="";
$elem["noip2/updating"]["type"]="string";
$elem["noip2/updating"]["description"]="Update interval (in minutes):
 Please enter the updating frequency (in minutes) the noip2 client
 should use to refresh the record of your IP address.
";
$elem["noip2/updating"]["descriptionde"]="Aktualisierungsintervall (in Minuten):
 Geben Sie bitte die Anzahl der Minuten ein, nach denen der Noip2-Client den Eintrag Ihrer IP-Adresse aktualisieren soll.
";
$elem["noip2/updating"]["descriptionfr"]="Intervalle de mise à jour (en minutes) :
 Veuillez indiquer la fréquence de mise à jour (en minutes) que le client noip2 doit utiliser pour rafraichir l'enregistrement de l'adresse IP.
";
$elem["noip2/updating"]["default"]="30";
$elem["noip2/matchlist"]["type"]="string";
$elem["noip2/matchlist"]["description"]="List of hosts or groups:
 Please specify a comma- or space-separated list of hosts or groups to update.
 .
 If you leave this field empty, all hosts and groups listed in your No-IP.com
 account will be updated.
";
$elem["noip2/matchlist"]["descriptionde"]="Liste der Hosts oder Gruppen:
 Bitte geben Sie eine durch Kommata oder Leerzeichen getrennte Liste von Hosts oder Gruppen an, die aktualisiert werden sollen.
 .
 Falls Sie dieses Feld leer lassen, werden alle Hosts oder Gruppen, die in Ihrem Konto aufgeführt werden, aktualisiert.
";
$elem["noip2/matchlist"]["descriptionfr"]="Liste des hôtes ou groupes :
 Veuillez indiquer une liste d'hôtes ou de groupes à mettre à jour, séparés par un espace ou une virgule.
 .
 Si vous laissez ce champ vide, tous les hôtes et groupes de votre compte No-IP.com seront mis à jour.
";
$elem["noip2/matchlist"]["default"]="";
$elem["noip2/netdevice"]["type"]="string";
$elem["noip2/netdevice"]["description"]="Network device name:
 Please specify the name of the network device connected to the
 Internet (typically ethX or pppX, where X is a number).
 .
 This field may be left empty if this host has a single network interface.
";
$elem["noip2/netdevice"]["descriptionde"]="Netz-Gerätename:
 Bitte geben Sie den Namen des Netzgerätes an, das an das Internet angebunden ist (typischerweise ethX oder pppX, wobei X eine Zahl ist).
 .
 Dieses Feld darf leer bleiben, falls dieser Host eine einzelne Netzschnittstelle hat.
";
$elem["noip2/netdevice"]["descriptionfr"]="Nom du périphérique réseau :
 Veuillez spécifier le nom du périphérique réseau connecté à l'Internet (typiquement ethX ou pppX, où X est un nombre).
 .
 Ce champ peut être laissé vide si le système dispose d'une seule interface réseau.
";
$elem["noip2/netdevice"]["default"]="";
$elem["noip2/forcenatoff"]["type"]="boolean";
$elem["noip2/forcenatoff"]["description"]="Disable Network Address Translation (NAT)?
 Please specify whether noip2 should not attempt to detect the
 external IP address of this computer.
 .
 If in doubt, you should leave the default choice.
";
$elem["noip2/forcenatoff"]["descriptionde"]="»Network Address Translation« (NAT) deaktivieren?
 Bitte geben Sie an, ob Noip2 nicht versuchen sollte, die externen IP-Adressen dieses Computer zu erkennen.
 .
 Im Zweifelsfall sollten Sie die Standardauswahl beibehalten.
";
$elem["noip2/forcenatoff"]["descriptionfr"]="Désactiver la traduction d'adresses réseau (NAT) ?
 Veuillez préciser si noip2 doit tenter de détecter l'adresse IP externe de cet ordinateur.
 .
 En cas de doute, vous devriez conserver le choix par défaut.
";
$elem["noip2/forcenatoff"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
