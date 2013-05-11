<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tpb");

$elem["tpb/groupchanged"]["type"]="note";
$elem["tpb/groupchanged"]["description"]="Group for tpb users changed!
 The group of the device file used by tpb changed. Note that you have
 to move the tpb users from the old group \"thinkpad\" to the new group \"nvram\"!
";
$elem["tpb/groupchanged"]["descriptionde"]="Die Gruppe der TPB Nutzer hat sich geändert
 Die Gruppe der Gerätedatei, welche von TPB benutzt wird, hat sich geändert. Bitte beachten Sie, dass die Benutzer von TPB von der alten Gruppe \"thinkpad\" in die neue Gruppe \"nvram\" übertragen werden müssen.
";
$elem["tpb/groupchanged"]["descriptionfr"]="Changement du groupe de tpb
 Le groupe propriétaire du fichier de périphérique utilisé par tpb a changé. Veuillez noter que vous devez déplacer les utilisateurs de tpb de l'ancien groupe « thinkpad » vers le nouveau groupe « nvram ».
";
$elem["tpb/groupchanged"]["default"]="";
$elem["tpb/makedev"]["type"]="boolean";
$elem["tpb/makedev"]["description"]="Create special device file?
 tpb needs a special device file to access the information about pressed
 buttons. Users who should be able to use tpb must be in the group nvram.
";
$elem["tpb/makedev"]["descriptionde"]="Erstellen einer Gerätedatei?
 TPB benötigt eine Gerätedatei um Informationen über gedrückte Tasten zu erhalten. Benutzer, die TPB nutzen können sollen, müssen Mitglied der Gruppe nvram sein.
";
$elem["tpb/makedev"]["descriptionfr"]="Faut-il créer un fichier spécial de périphérique ?
 Tpb a besoin d'un fichier spécial de périphérique afin d'accéder aux informations sur les boutons appuyés. Les utilisateurs qui sont autorisés à utiliser tpb doivent faire partie du groupe « nvram ».
";
$elem["tpb/makedev"]["default"]="true";
$elem["tpb/autostart"]["type"]="boolean";
$elem["tpb/autostart"]["description"]="Start tpb automatically?
 tpb can be started automatically after X has been started for a user.
 That can be either after startx from console or after login with a display manager.
";
$elem["tpb/autostart"]["descriptionde"]="TPB automatisch starten?
 TPB kann automatisch gestartet werden, nachdem X für einen Benutzer gestartet wurde. Das kann entweder nach dem Aufruf von startx von der Konsole aus sein oder nach dem einloggen mit einen Display Manager
";
$elem["tpb/autostart"]["descriptionfr"]="Faut-il démarrer tpb automatiquement ?
 Tpb peut être démarré automatiquement une fois que le serveur X a été lancé pour un utilisateur. Ce démarrage automatique peut se faire aussi bien lorsque le serveur est lancé par la commande « startx » que lorsque l'utilisateur ouvre une session avec un gestionnaire graphique de sessions.
";
$elem["tpb/autostart"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
