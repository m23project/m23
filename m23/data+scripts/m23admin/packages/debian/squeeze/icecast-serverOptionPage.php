<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("icecast-server");

$elem["icecast-server/etc_default"]["type"]="note";
$elem["icecast-server/etc_default"]["description"]="General notes about icecast-server
 * There have been several security bugs found in Icecast. You are being
   upgraded to latest stable version.
 * Since Icecast 1.3.11, the file /etc/default/icecast is no longer
   needed. You will need to upgrade /etc/icecast/icecast.conf to reflect
   your settings.
";
$elem["icecast-server/etc_default"]["descriptionde"]="Allgemeine Informationen zum Icecast-Server
 * Es wurden einige Sicherheitslöcher in Icecast gefunden. Sie
   aktualisieren auf die letzte stabile Version.
 * Ab Icecast 1.3.11 wird die Datei /etc/default/icecast nicht
   mehr verwendet. Sie müssen Ihre Einstellungen in der Datei
   /etc/icecast/icecast.conf vornehmen.
";
$elem["icecast-server/etc_default"]["descriptionfr"]="Informations générales à propos d'icecast-server
 - De nombreux problèmes de sécurité ont été trouvés dans Icecast.
   Cette mise à jour installe la dernière version stable ;
 - Depuis la version 1.3.11 d'Icecast, le fichier /etc/default/icecast
   n'est plus utilisé. Vous devrez mettre à jour le fichier
   /etc/icecast/icecast.conf afin de prendre en compte vos paramètres.
";
$elem["icecast-server/etc_default"]["default"]="";
$elem["icecast-server/new_user"]["type"]="note";
$elem["icecast-server/new_user"]["description"]="A new user will be added
 The icecast user will now be created. This user has no rights, no shell, 
 and should not be able to perform any other operation than to run Icecast.
";
$elem["icecast-server/new_user"]["descriptionde"]="Ein neuer Benutzer wird hinzugefügt
 Der Benutzer für Icecast wird jetzt angelegt. Dieser Benutzer hat keinerlei Berechtigungen, keine Shell und sollte keine weiteren Kommandos ausführen können, außer Icecast zu starten.
";
$elem["icecast-server/new_user"]["descriptionfr"]="Ajout d'un nouvel identifiant
 Un identifiant « icecast » va être créé. Il n'a pas de droits spécifiques, ne peut pas se connecter en mod einteractif, et ne devrait rien pouvoir faire d'autre que lancer Icecast.
";
$elem["icecast-server/new_user"]["default"]="";
$elem["icecast-server/adduser"]["type"]="note";
$elem["icecast-server/adduser"]["description"]="Adduser command failed
 The adduser command failed while configuring the package. In
 order to run icecast, you must create a user \"icecast\", preferably with no
 valid shell (/bin/false will do the trick) and a homedir set to
 /usr/share/icecast/static. The user will be in the icecast group and no
 other. For security reasons, make sure that icecast is never run with 
 root privileges.
";
$elem["icecast-server/adduser"]["descriptionde"]="Kommando adduser fehlgeschlagen
 Das Kommando »adduser« schlug während der Einrichtung des Pakets fehl. Damit Icecast arbeiten kann, müssen Sie den Benutzer »icecast« ohne gültige Shell (/bin/false) und dem Home-Verzeichnis /usr/share/icecast/static selbst anlegen. Der Benutzer ist nur in der Gruppe icecast einzutragen, in keiner anderen. Aus Sicherheitsgründen sollte Icecast nie mit Root-Rechten (als Benutzer root) laufen.
";
$elem["icecast-server/adduser"]["descriptionfr"]="Échec de la commande « adduser »
 La commande « adduser » a échoué pendant la configuration du paquet. Afin d'utiliser Icecast, vous devrez créer vous-même un identifiant « icecast », de préférence sans connexion interactive (utiliser /bin/false comme shell est conseillé), et un répertoire personnel défini à /usr/share/icecast/static. Cet identifiant doit uniquement appartenir au groupe icecast. Il est important de ne jamais lancer icecast avec les privilèges du superutilisateur.
";
$elem["icecast-server/adduser"]["default"]="";
PKG_OptionPageTail2($elem);
?>
