<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lurker");

$elem["lurker/apache2_config"]["type"]="boolean";
$elem["lurker/apache2_config"]["description"]="Configure apache2 automatically for lurker?
 It is possible to configure your apache2 webserver automatically in the way
 that lurker archive pages are directly available at http://localhost/lurker.
 This requires apache2 to provide an include dir in /etc/apache2/conf.d, like
 the debian apache2 package does.
";
$elem["lurker/apache2_config"]["descriptionde"]="Soll apache2 automatisch für lurker konfiguriert werden?
 Es ist möglich, den apache2 Webserver automatisch so zu konfigurieren, dass die Archivseiten direkt unter http://localhost/lurker erreichbar sind. Dazu muss der Webserver ein Include-Verzeichnis in /etc/apache2/conf.d haben, wie es beim apache2 Debianpaket der Fall ist.
";
$elem["lurker/apache2_config"]["descriptionfr"]="Faut-il configurer automatiquement Apache2 pour lurker ?
 Il est possible de configurer automatiquement le serveur web Apache2 pour que les pages archivées par lurker soient directement disponibles à l'adresse http://localhost/luker. Cela néccesite que le paquet apache2 soit installé afin de fournir le répertoire /etc/apache2/conf.d.
";
$elem["lurker/apache2_config"]["default"]="";
$elem["lurker/webserver"]["type"]="note";
$elem["lurker/webserver"]["description"]="No webserver will be configured automatically
 It seems like you have not installed a supported webserver. The script
 did not detect an apache2 include directory at /etc/apache2/conf.d.
 Therefore, the script did not configure a webserver, and you have to
 configure manually any webserver that you want to use with lurker.
";
$elem["lurker/webserver"]["descriptionde"]="Kein Webserver wird automatisch konfiguriert
 Es war nicht möglich, einen installierten apache2 webserver auszumachen, der ein Include Verzeichnis in /etc/apache2/conf.d hat. Deshalb wurde kein Webserver automatisch konfiguriert. Der entsprechende Webserver für lurker muss demnach noch manuell konfiguriert werden.
";
$elem["lurker/webserver"]["descriptionfr"]="Aucun serveur web configuré automatiquement
 Vous n'avez installé aucun serveur web compatible qui utilise un répertoire /etc/apache2/conf.d. Par conséquent, aucun serveur web ne sera configuré automatiquement et vous devrez configurer vous-même tout serveur web que vous souhaitez utiliser avec lurker.
";
$elem["lurker/webserver"]["default"]="";
$elem["lurker/archive"]["type"]="string";
$elem["lurker/archive"]["description"]="Archive Name:
 The name that lurker uses to refer to the archive.
";
$elem["lurker/archive"]["descriptionde"]="Archiv Name:
 Der Name, den lurker verwenden soll um auf das Archiv zu verweisen.
";
$elem["lurker/archive"]["descriptionfr"]="Nom de l'archive :
 Veuillez indiquer le nom utilisé par lurker faisant référence à la machine sur laquelle il est installé.
";
$elem["lurker/archive"]["default"]="Local Mailing List Archive";
$elem["lurker/admin_name"]["type"]="string";
$elem["lurker/admin_name"]["description"]="Admin Name:
 This is the administrative contact information displayed at the bottom-right
 of generated pages. You should probably set it to something useful.
";
$elem["lurker/admin_name"]["descriptionde"]="Admin Name:
 Hierbei handelt es sich um die Adminstrator Kontakt-Informationen, welche unten rechts in den generierten Seiten angezeigt werden. Richtige Angaben sind empfehlenswert.
";
$elem["lurker/admin_name"]["descriptionfr"]="Nom de l'administrateur :
 Veuillez indiquer les informations sur l'administrateur qui seront affichées en bas et à droite des pages produites.
";
$elem["lurker/admin_name"]["default"]="Unconfigured";
$elem["lurker/admin_address"]["type"]="string";
$elem["lurker/admin_address"]["description"]="Admin Address:
";
$elem["lurker/admin_address"]["descriptionde"]="Admin Adresse:
";
$elem["lurker/admin_address"]["descriptionfr"]="Adresse de l'administrateur :
";
$elem["lurker/admin_address"]["default"]="nill@bitbucket.org";
$elem["lurker/group_passwd"]["type"]="password";
$elem["lurker/group_passwd"]["description"]="Password for the lurker system group:
 A password for the lurker system group needs to be set. It is requested when
 deleting mail from archive through the web button.
 You can change the password later by running 'gpasswd lurker'.
";
$elem["lurker/group_passwd"]["descriptionde"]="Passwort für die Systemgruppe lurker:
 Für die Systemgruppe lurker muss ein Passwort gesetzt werden. Dieses wird abgefragt, wenn Mails über den Button im Webinterface gelöscht werden. Das Passwort kann später mit 'gpasswd lurker' geändert werden.
";
$elem["lurker/group_passwd"]["descriptionfr"]="Mot de passe du groupe système « lurker » :
 Un mot de passe pour le groupe système « lurker » doit être défini. Il est demandé lors de la suppression de courriel de l'archive depuis l'interface web. Vous pourrez le changer par la suite avec la commande « gpasswd lurker ».
";
$elem["lurker/group_passwd"]["default"]="Default:";
PKG_OptionPageTail2($elem);
?>
