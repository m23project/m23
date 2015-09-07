<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mythbuntu-live-autostart");

$elem["ubiquity/text/installtype_heading_label"]["type"]="text";
$elem["ubiquity/text/installtype_heading_label"]["description"]="Installation Type
";
$elem["ubiquity/text/installtype_heading_label"]["descriptionde"]="Installationsmethode
";
$elem["ubiquity/text/installtype_heading_label"]["descriptionfr"]="Type d'installation
";
$elem["ubiquity/text/installtype_heading_label"]["default"]="";
$elem["ubiquity/text/custominstall_type_label"]["type"]="text";
$elem["ubiquity/text/custominstall_type_label"]["description"]="What type of system will this be?
";
$elem["ubiquity/text/custominstall_type_label"]["descriptionde"]="Späteres Anwendungsgebiet für das System?
";
$elem["ubiquity/text/custominstall_type_label"]["descriptionfr"]="Quel sera le type de ce système ?
";
$elem["ubiquity/text/custominstall_type_label"]["default"]="";
$elem["ubiquity/text/remote_heading_label"]["type"]="text";
$elem["ubiquity/text/remote_heading_label"]["description"]="Infrared Remotes

";
$elem["ubiquity/text/remote_heading_label"]["descriptionde"]="";
$elem["ubiquity/text/remote_heading_label"]["descriptionfr"]="";
$elem["ubiquity/text/remote_heading_label"]["default"]="";
$elem["ubiquity/text/master_be_fe"]["type"]="text";
$elem["ubiquity/text/master_be_fe"]["description"]="Primary Backend w/ Frontend
";
$elem["ubiquity/text/master_be_fe"]["descriptionde"]="Hintergrunddienst mit Benutzeroberfläche
";
$elem["ubiquity/text/master_be_fe"]["descriptionfr"]="Machine primaire combinant moteur de traitement et interface
";
$elem["ubiquity/text/master_be_fe"]["default"]="";
$elem["ubiquity/text/master_be_fe_label"]["type"]="text";
$elem["ubiquity/text/master_be_fe_label"]["description"]="Description:
 A Backend/frontend combo machine is the most common setup for people wanting
 MythTV for HTPC applications. This type of installation is intended for use as a
 component in your home theatre.
";
$elem["ubiquity/text/master_be_fe_label"]["descriptionde"]="Description-de.UTF-8:
 Geeignet für Wohnzimmerrechner (home theatre pc), die Bestandteil einer Heimkinoanlage sind.
";
$elem["ubiquity/text/master_be_fe_label"]["descriptionfr"]="Description-fr.UTF-8:
 Une machine combinant moteur de traitement et interface est la configuration la plus courante pour les personnes désirant utiliser MythTV pour les applications HTPC. Ce type d'installation est prévu pour utiliser en tant que composant de votre « home cinéma ».
";
$elem["ubiquity/text/master_be_fe_label"]["default"]="";
$elem["ubiquity/text/slave_be_fe"]["type"]="text";
$elem["ubiquity/text/slave_be_fe"]["description"]="Secondary Backend w/ Frontend
";
$elem["ubiquity/text/slave_be_fe"]["descriptionde"]="Sekundärer Hintergrunddienst mit Benutzeroberfläche
";
$elem["ubiquity/text/slave_be_fe"]["descriptionfr"]="Machine secondaire combinant moteur de traitement et interface
";
$elem["ubiquity/text/slave_be_fe"]["default"]="";
$elem["ubiquity/text/slave_be_fe_label"]["type"]="text";
$elem["ubiquity/text/slave_be_fe_label"]["description"]="Description:
 This will set up a system similar to a Primary Backend w/ Frontend, however will be
 configured to connect to an existing backend on the network.
";
$elem["ubiquity/text/slave_be_fe_label"]["descriptionde"]="Description-de.UTF-8:
 Das System ähnelt einem primären Hintergrunddienst mit Benutzeroberfläche, greift aber über das Netzwerk auf ein anderen Hintergrunddienst zurück.
";
$elem["ubiquity/text/slave_be_fe_label"]["descriptionfr"]="Description-fr.UTF-8:
 Le système sera configuré de façon similaire à une machine primaire combinant moteur de traitement et interface, cependant il sera configuré pour ce connecter à un moteur de traitement existant sur le réseau.
";
$elem["ubiquity/text/slave_be_fe_label"]["default"]="";
$elem["ubiquity/text/master_be"]["type"]="text";
$elem["ubiquity/text/master_be"]["description"]="Primary Backend
";
$elem["ubiquity/text/master_be"]["descriptionde"]="Primärerer Hintergrunddienst
";
$elem["ubiquity/text/master_be"]["descriptionfr"]="Machine primaire de traitement
";
$elem["ubiquity/text/master_be"]["default"]="";
$elem["ubiquity/text/master_be_label"]["type"]="text";
$elem["ubiquity/text/master_be_label"]["description"]="Description:
 A backend only machine is typically designed to function like an appliance; requiring
 very little maintenance.  This is intended to be installed as the first backend on a network.
";
$elem["ubiquity/text/master_be_label"]["descriptionde"]="Description-de.UTF-8:
 Ein wartungsarmer Hintergrunddienst, der als primärer Dienst im Netzwerk verwendet werden kann.
";
$elem["ubiquity/text/master_be_label"]["descriptionfr"]="Description-fr.UTF-8:
 Une machine contenant uniquement le moteur de traitement est conçue pour se comporter comme un serveur applicatif ; nécessitant très peu de maintenance. Elle est prévue pour être installé en tant que moteur de traitement primaire sur le réseau.
";
$elem["ubiquity/text/master_be_label"]["default"]="";
$elem["ubiquity/text/slave_be"]["type"]="text";
$elem["ubiquity/text/slave_be"]["description"]="Secondary Backend
";
$elem["ubiquity/text/slave_be"]["descriptionde"]="Sekundärer Hintergrunddienst
";
$elem["ubiquity/text/slave_be"]["descriptionfr"]="Machine secondaire de traitement
";
$elem["ubiquity/text/slave_be"]["default"]="";
$elem["ubiquity/text/slave_be_label"]["type"]="text";
$elem["ubiquity/text/slave_be_label"]["description"]="Description:
 This will set up a system similar to a Primary Backend, however it will be configured to
 connect to an existing backend on the network.
";
$elem["ubiquity/text/slave_be_label"]["descriptionde"]="Description-de.UTF-8:
 Reiner Hintergrunddienst, der über das Netzwerk auf einen primären Hintergrunddienst zurückgreift.
";
$elem["ubiquity/text/slave_be_label"]["descriptionfr"]="Description-fr.UTF-8:
 Le système sera configuré de façon similaire à un moteur de traitement primaire, cependant il sera configuré pour ce connecter à un moteur de traitement existant sur le réseau.
";
$elem["ubiquity/text/slave_be_label"]["default"]="";
$elem["ubiquity/text/fe"]["type"]="text";
$elem["ubiquity/text/fe"]["description"]="Frontend
";
$elem["ubiquity/text/fe"]["descriptionde"]="Benutzeroberfläche
";
$elem["ubiquity/text/fe"]["descriptionfr"]="Machine servant uniquement d'interface
";
$elem["ubiquity/text/fe"]["default"]="";
$elem["ubiquity/text/fe_label"]["type"]="text";
$elem["ubiquity/text/fe_label"]["description"]="Description:
 A frontend only machine's main function is to receive media content from the backend
 and distribute it.  This configuration requires an existing backend on the network.
";
$elem["ubiquity/text/fe_label"]["descriptionde"]="Description-de.UTF-8:
 Eine reine Benutzeroberfläche, die Inhalte von einem Hintergrunddienst über das Netzwerk bezieht und zur Verfügung stellt.
";
$elem["ubiquity/text/fe_label"]["descriptionfr"]="Description-fr.UTF-8:
 La fonction principale d'une machine servant uniquement d'interface, est de recevoir les contenus multimédia du moteur de traitement et de les distribuer. Cette configuration nécessite un moteur de traitement existant sur le réseau.
";
$elem["ubiquity/text/fe_label"]["default"]="";
$elem["ubiquity/text/driver_heading_label"]["type"]="text";
$elem["ubiquity/text/driver_heading_label"]["description"]="Graphics Drivers
";
$elem["ubiquity/text/driver_heading_label"]["descriptionde"]="Grafiktreiber
";
$elem["ubiquity/text/driver_heading_label"]["descriptionfr"]="Pilotes vidéo
";
$elem["ubiquity/text/driver_heading_label"]["default"]="";
$elem["ubiquity/text/driver_description"]["type"]="text";
$elem["ubiquity/text/driver_description"]["description"]="Description:
 An open source graphics driver is already enabled and configured for your installation.  If you would like to use a different graphics driver, you can do so here.  Note that proprietary graphics drivers may be necessary for TV Output or OpenGL effects.
";
$elem["ubiquity/text/driver_description"]["descriptionde"]="Description-de.UTF-8:
 Ein freier Grafik-Treiber wurde bereits für Ihr System eingerichtet. Proprietäre Treiber sind jedoch oft für die TV-Ausgabe und 3D-Effekte (OpenGL) erforderlich. Sie können dies nun ändern.
";
$elem["ubiquity/text/driver_description"]["descriptionfr"]="Description-fr.UTF-8:
 Un pilote graphique open source est déjà activé et configuré pour votre installation. Si vous souhaitez utiliser un pilote graphique différent, vous pouvez le faire ici. Notez qu'un pilote graphique propriétaire peut-être nécessaire pour la sortie TV ou les effets OpenGL.
";
$elem["ubiquity/text/driver_description"]["default"]="";
$elem["ubiquity/text/tvout_label"]["type"]="text";
$elem["ubiquity/text/tvout_label"]["description"]="If you would like to configure TV-out, choose an option here:
";
$elem["ubiquity/text/tvout_label"]["descriptionde"]="Zum Verwenden eines TV-Ausgangs wählen Sie eine entsprechende Option:
";
$elem["ubiquity/text/tvout_label"]["descriptionfr"]="Si vous désirez configurer la sortie TV, choisissez une option ici :
";
$elem["ubiquity/text/tvout_label"]["default"]="";
$elem["ubiquity/text/tvstandard_label"]["type"]="text";
$elem["ubiquity/text/tvstandard_label"]["description"]="If enabling TV Out, you will also need to choose a TV Standard:
";
$elem["ubiquity/text/tvstandard_label"]["descriptionde"]="Für die TV-Ausgabe ist die Auwahl eines Standards erforderlich:
";
$elem["ubiquity/text/tvstandard_label"]["descriptionfr"]="Si vous activez la sortie TV, vous devez aussi choisir un standard TV :
";
$elem["ubiquity/text/tvstandard_label"]["default"]="";
$elem["ubiquity/text/masterinfo_heading_label"]["type"]="text";
$elem["ubiquity/text/masterinfo_heading_label"]["description"]="Master Backend Info
";
$elem["ubiquity/text/masterinfo_heading_label"]["descriptionde"]="Primärer Hintergrunddienst
";
$elem["ubiquity/text/masterinfo_heading_label"]["descriptionfr"]="Information sur le machine de traitement primaire
";
$elem["ubiquity/text/masterinfo_heading_label"]["default"]="";
$elem["ubiquity/text/masterinfo_description"]["type"]="text";
$elem["ubiquity/text/masterinfo_description"]["description"]="Please enter the information necessary to contact your master backend:
";
$elem["ubiquity/text/masterinfo_description"]["descriptionde"]="Geben Sie die Verbindungsdaten zu Ihrem primären Hintergrunddienst ein:
";
$elem["ubiquity/text/masterinfo_description"]["descriptionfr"]="Veuillez entrer l'information nécessaire pour contacter votre machine de traitement primaire :
";
$elem["ubiquity/text/masterinfo_description"]["default"]="";
$elem["ubiquity/text/mysql_password_label"]["type"]="text";
$elem["ubiquity/text/mysql_password_label"]["description"]="MySQL Password
";
$elem["ubiquity/text/mysql_password_label"]["descriptionde"]="MySQL-Passwort
";
$elem["ubiquity/text/mysql_password_label"]["descriptionfr"]="Mot de passe MySQL
";
$elem["ubiquity/text/mysql_password_label"]["default"]="";
$elem["ubiquity/text/mysql_user_label"]["type"]="text";
$elem["ubiquity/text/mysql_user_label"]["description"]="MySQL User Name
";
$elem["ubiquity/text/mysql_user_label"]["descriptionde"]="MySQL-Benutzername
";
$elem["ubiquity/text/mysql_user_label"]["descriptionfr"]="Nom d'utilisateur MySQL
";
$elem["ubiquity/text/mysql_user_label"]["default"]="";
$elem["ubiquity/text/mysql_database_label"]["type"]="text";
$elem["ubiquity/text/mysql_database_label"]["description"]="MySQL Database
";
$elem["ubiquity/text/mysql_database_label"]["descriptionde"]="MySQL-Datenbank
";
$elem["ubiquity/text/mysql_database_label"]["descriptionfr"]="Base de données MySQL
";
$elem["ubiquity/text/mysql_database_label"]["default"]="";
$elem["ubiquity/text/mysql_server_label"]["type"]="text";
$elem["ubiquity/text/mysql_server_label"]["description"]="MySQL Server
";
$elem["ubiquity/text/mysql_server_label"]["descriptionde"]="MySQL-Server
";
$elem["ubiquity/text/mysql_server_label"]["descriptionfr"]="Serveur MySQL
";
$elem["ubiquity/text/mysql_server_label"]["default"]="";
$elem["ubiquity/text/setup_heading_label"]["type"]="text";
$elem["ubiquity/text/setup_heading_label"]["description"]="Configure Backend

";
$elem["ubiquity/text/setup_heading_label"]["descriptionde"]="";
$elem["ubiquity/text/setup_heading_label"]["descriptionfr"]="";
$elem["ubiquity/text/setup_heading_label"]["default"]="";
$elem["ubiquity/text/setup_description"]["type"]="text";
$elem["ubiquity/text/setup_description"]["description"]="Description:
 It is highly recommended that you launch MythTV-Setup to run the 
 backend configuration for the first time to associate your guide 
 data sources and TV tuners.  You can also run it at a later time 
 from the Mythbuntu Control Centre.

";
$elem["ubiquity/text/setup_description"]["descriptionde"]="";
$elem["ubiquity/text/setup_description"]["descriptionfr"]="";
$elem["ubiquity/text/setup_description"]["default"]="";
$elem["ubiquity/text/myth_button"]["type"]="text";
$elem["ubiquity/text/myth_button"]["description"]="Launch MythTV Setup
";
$elem["ubiquity/text/myth_button"]["descriptionde"]="MythTV einrichten
";
$elem["ubiquity/text/myth_button"]["descriptionfr"]="Lancer la configuration de MythTV
";
$elem["ubiquity/text/myth_button"]["default"]="";
$elem["ubiquity/install/mythbuntu"]["type"]="text";
$elem["ubiquity/install/mythbuntu"]["description"]="Configuring mythtv...
";
$elem["ubiquity/install/mythbuntu"]["descriptionde"]="MythTV wird eingerichtet ...
";
$elem["ubiquity/install/mythbuntu"]["descriptionfr"]="Configuration de mythtv...
";
$elem["ubiquity/install/mythbuntu"]["default"]="";
$elem["ubiquity/install/drivers"]["type"]="text";
$elem["ubiquity/install/drivers"]["description"]="Configuring additional drivers...
";
$elem["ubiquity/install/drivers"]["descriptionde"]="Zusätzliche Treiber werden eingerichtet ...
";
$elem["ubiquity/install/drivers"]["descriptionfr"]="Configuration des pilotes supplémentaires...
";
$elem["ubiquity/install/drivers"]["default"]="";
$elem["ubiquity/install/services"]["type"]="text";
$elem["ubiquity/install/services"]["description"]="Configuring additional services...
";
$elem["ubiquity/install/services"]["descriptionde"]="Zusätzliche Dienste werden eingerichtet ...
";
$elem["ubiquity/install/services"]["descriptionfr"]="Configuration de services supplémentaires...
";
$elem["ubiquity/install/services"]["default"]="";
$elem["ubiquity/install/ir"]["type"]="text";
$elem["ubiquity/install/ir"]["description"]="Configuring infrared devices...
";
$elem["ubiquity/install/ir"]["descriptionde"]="Infrarot-Geräte einrichten ...
";
$elem["ubiquity/install/ir"]["descriptionfr"]="Configuration des périphériques infrarouges...
";
$elem["ubiquity/install/ir"]["default"]="";
$elem["mythbuntu/install_type"]["type"]="string";
$elem["mythbuntu/install_type"]["description"]="for internal use; determines install type

";
$elem["mythbuntu/install_type"]["descriptionde"]="";
$elem["mythbuntu/install_type"]["descriptionfr"]="";
$elem["mythbuntu/install_type"]["default"]="";
$elem["mythbuntu/video_driver"]["type"]="string";
$elem["mythbuntu/video_driver"]["description"]="for internal use; determines what video graphics driver to use

";
$elem["mythbuntu/video_driver"]["descriptionde"]="";
$elem["mythbuntu/video_driver"]["descriptionfr"]="";
$elem["mythbuntu/video_driver"]["default"]="Open Source Driver";
$elem["mythbuntu/tvout"]["type"]="string";
$elem["mythbuntu/tvout"]["description"]="for internal use; determines if tvout activated

";
$elem["mythbuntu/tvout"]["descriptionde"]="";
$elem["mythbuntu/tvout"]["descriptionfr"]="";
$elem["mythbuntu/tvout"]["default"]="";
$elem["mythbuntu/tvstandard"]["type"]="string";
$elem["mythbuntu/tvstandard"]["description"]="for internal use; determines tvstandard

";
$elem["mythbuntu/tvstandard"]["descriptionde"]="";
$elem["mythbuntu/tvstandard"]["descriptionfr"]="";
$elem["mythbuntu/tvstandard"]["default"]="";
$elem["mythbuntu/x11vnc"]["type"]="boolean";
$elem["mythbuntu/x11vnc"]["description"]="for internal use; determines if vnc is enabled

";
$elem["mythbuntu/x11vnc"]["descriptionde"]="";
$elem["mythbuntu/x11vnc"]["descriptionfr"]="";
$elem["mythbuntu/x11vnc"]["default"]="";
$elem["mythbuntu/openssh-server"]["type"]="boolean";
$elem["mythbuntu/openssh-server"]["description"]="for internal use; determines if ssh is enabled

";
$elem["mythbuntu/openssh-server"]["descriptionde"]="";
$elem["mythbuntu/openssh-server"]["descriptionfr"]="";
$elem["mythbuntu/openssh-server"]["default"]="";
$elem["mythbuntu/samba"]["type"]="boolean";
$elem["mythbuntu/samba"]["description"]="for internal use; determines if samba is enabled

";
$elem["mythbuntu/samba"]["descriptionde"]="";
$elem["mythbuntu/samba"]["descriptionfr"]="";
$elem["mythbuntu/samba"]["default"]="";
$elem["mythbuntu/nfs-kernel-server"]["type"]="boolean";
$elem["mythbuntu/nfs-kernel-server"]["description"]="for internal use; determines if nfs is enabled

";
$elem["mythbuntu/nfs-kernel-server"]["descriptionde"]="";
$elem["mythbuntu/nfs-kernel-server"]["descriptionfr"]="";
$elem["mythbuntu/nfs-kernel-server"]["default"]="";
$elem["mythbuntu/mysql-server"]["type"]="boolean";
$elem["mythbuntu/mysql-server"]["description"]="for internal use; determines if mysql access is enabled

";
$elem["mythbuntu/mysql-server"]["descriptionde"]="";
$elem["mythbuntu/mysql-server"]["descriptionfr"]="";
$elem["mythbuntu/mysql-server"]["default"]="";
$elem["mythbuntu/setup-launched"]["type"]="boolean";
$elem["mythbuntu/setup-launched"]["description"]="for internal use; determines if mythtv-setup was launched

";
$elem["mythbuntu/setup-launched"]["descriptionde"]="";
$elem["mythbuntu/setup-launched"]["descriptionfr"]="";
$elem["mythbuntu/setup-launched"]["default"]="";
$elem["ubiquity/text/services_heading_label"]["type"]="text";
$elem["ubiquity/text/services_heading_label"]["description"]="Additional Services
";
$elem["ubiquity/text/services_heading_label"]["descriptionde"]="";
$elem["ubiquity/text/services_heading_label"]["descriptionfr"]="";
$elem["ubiquity/text/services_heading_label"]["default"]="";
PKG_OptionPageTail2($elem);
?>
