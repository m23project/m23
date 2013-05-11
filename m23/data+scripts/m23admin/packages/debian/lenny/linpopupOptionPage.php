<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("linpopup");

$elem["linpopup/smbclient"]["type"]="note";
$elem["linpopup/smbclient"]["description"]="smbclient is needed to send messages.
 You don't have the smbclient package installed. This means that you will
 NOT be able to send any messages; you will only be able to receive them.
 .
 If you do want to send messages with LinPopup, install the smbclient
 package.
";
$elem["linpopup/smbclient"]["descriptionde"]="smbclient wird zum Senden von Nachrichten benötigt.
 Sie haben das Paket smbclient nicht installiert. Das heißt, dass Sie KEINE Nachrichten senden, sondern nur empfangen können.
 .
 Wenn Sie mit LinPopUp Nachrichten senden möchten, installieren Sie das Paket smbclient.
";
$elem["linpopup/smbclient"]["descriptionfr"]="Programme smbclient indispensable pour l'envoi de messages
 Le paquet smbclient n'est pas installé. Vous ne pourrez pas envoyer de messages, vous aurez seulement la possibilité d'en recevoir.
 .
 Si vous souhaitez envoyer des messages avec linpopup, vous devez installer ce paquet.
";
$elem["linpopup/smbclient"]["default"]="";
$elem["linpopup/addtosmbconf"]["type"]="boolean";
$elem["linpopup/addtosmbconf"]["description"]="Add LinPopUp to Samba's config?
 A configuration line for LinPopUp will have to be added to Samba's
 ${SMBCONF} to enable receiving popup messages. This can be done
 automatically.  Select this option if you want that done.
 .
 Currently, to get the popups when they are received, you must have linpopup
 running on your X desktop. If that's not the case, the messages are saved
 so that you can see them at a later time, when you do start linpopup.
";
$elem["linpopup/addtosmbconf"]["descriptionde"]="LinPopUp zur Samba-Konfiguration hinzufügen?
 Es muss eine Zeile zur Samba-Konfigurationsdatei ${SMBCONF} hinzugefügt werden, um mit LinPopUp Nachrichten empfangen können. Das Hinzufügen dieser Zeile kann automatisch geschehen. Stimmen Sie hier zu, wenn Sie das möchten.
 .
 Um die Nachrichten sofort bei Eingang zu erhalten, muss LinPopUp währendessen auf Ihrem X-Desktop laufen. Wenn dies nicht der Fall ist, werden die Nachrichten gespeichert, so dass Sie sie lesen können, wenn Sie LinPopUp später starten.
";
$elem["linpopup/addtosmbconf"]["descriptionfr"]="Faut-il ajouter linpopup au fichier de configuration de samba ?
 Une ligne doit être ajoutée dans le fichier de configuration de samba (${SMBCONF}) pour activer la réception des messages instantanés. Choisissez cette option si vous acceptez que la configuration soit faite automatiquement.
 .
 Actuallement, pour que les messages s'affichent, linpopup doit être lancé. Si ce n'est pas le cas, les messages seront sauvegardés et apparaîtront au démarrage de linpopup.
";
$elem["linpopup/addtosmbconf"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
