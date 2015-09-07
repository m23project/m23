<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("edubuntu-live");

$elem["ubiquity/text/edubuntu-packages_heading_label"]["type"]="text";
$elem["ubiquity/text/edubuntu-packages_heading_label"]["description"]="Edubuntu installation options (part 2)
";
$elem["ubiquity/text/edubuntu-packages_heading_label"]["descriptionde"]="Edubuntu-Installationsoptionen (Teil 2)
";
$elem["ubiquity/text/edubuntu-packages_heading_label"]["descriptionfr"]="Options d'installation d'Edubuntu (2ème partie)
";
$elem["ubiquity/text/edubuntu-packages_heading_label"]["default"]="";
$elem["ubiquity/text/edubuntu-packages_description_label"]["type"]="text";
$elem["ubiquity/text/edubuntu-packages_description_label"]["description"]="Installed educational packages (untick to remove):
";
$elem["ubiquity/text/edubuntu-packages_description_label"]["descriptionde"]="Installierte Bildungspakete (zum Entfernen abwählen):
";
$elem["ubiquity/text/edubuntu-packages_description_label"]["descriptionfr"]="Paquets éducatifs installés (décocher pour supprimer):
";
$elem["ubiquity/text/edubuntu-packages_description_label"]["default"]="";
$elem["ubiquity/text/edubuntu-packages_column_installed_title"]["type"]="text";
$elem["ubiquity/text/edubuntu-packages_column_installed_title"]["description"]="Installed
";
$elem["ubiquity/text/edubuntu-packages_column_installed_title"]["descriptionde"]="Installiert
";
$elem["ubiquity/text/edubuntu-packages_column_installed_title"]["descriptionfr"]="Installé
";
$elem["ubiquity/text/edubuntu-packages_column_installed_title"]["default"]="";
$elem["ubiquity/text/edubuntu-packages_column_name_title"]["type"]="text";
$elem["ubiquity/text/edubuntu-packages_column_name_title"]["description"]="Name
";
$elem["ubiquity/text/edubuntu-packages_column_name_title"]["descriptionde"]="Name
";
$elem["ubiquity/text/edubuntu-packages_column_name_title"]["descriptionfr"]="Nom
";
$elem["ubiquity/text/edubuntu-packages_column_name_title"]["default"]="";
$elem["ubiquity/text/edubuntu-packages_column_description_title"]["type"]="text";
$elem["ubiquity/text/edubuntu-packages_column_description_title"]["description"]="Description
";
$elem["ubiquity/text/edubuntu-packages_column_description_title"]["descriptionde"]="Beschreibung
";
$elem["ubiquity/text/edubuntu-packages_column_description_title"]["descriptionfr"]="Description
";
$elem["ubiquity/text/edubuntu-packages_column_description_title"]["default"]="";
$elem["ubiquity/text/edubuntu-addon_heading_label"]["type"]="text";
$elem["ubiquity/text/edubuntu-addon_heading_label"]["description"]="Edubuntu installation options (part 1)
";
$elem["ubiquity/text/edubuntu-addon_heading_label"]["descriptionde"]="Edubuntu-Installationsoptionen (Teil 1)
";
$elem["ubiquity/text/edubuntu-addon_heading_label"]["descriptionfr"]="Options d'installation d'Edubuntu (1ère partie)
";
$elem["ubiquity/text/edubuntu-addon_heading_label"]["default"]="";
$elem["ubiquity/text/edubuntu-addon_description_label"]["type"]="text";
$elem["ubiquity/text/edubuntu-addon_description_label"]["description"]="Select optional extras:
";
$elem["ubiquity/text/edubuntu-addon_description_label"]["descriptionde"]="Wählen Sie optionale Extras:
";
$elem["ubiquity/text/edubuntu-addon_description_label"]["descriptionfr"]="Sélection d'additions optionnelles:
";
$elem["ubiquity/text/edubuntu-addon_description_label"]["default"]="";
$elem["ubiquity/text/edubuntu-addon_fallback_install_label"]["type"]="text";
$elem["ubiquity/text/edubuntu-addon_fallback_install_label"]["description"]="Install
";
$elem["ubiquity/text/edubuntu-addon_fallback_install_label"]["descriptionde"]="Installieren
";
$elem["ubiquity/text/edubuntu-addon_fallback_install_label"]["descriptionfr"]="Installer
";
$elem["ubiquity/text/edubuntu-addon_fallback_install_label"]["default"]="";
$elem["ubiquity/text/edubuntu-addon_fallback_title_label"]["type"]="text";
$elem["ubiquity/text/edubuntu-addon_fallback_title_label"]["description"]="Gnome fallback interface
";
$elem["ubiquity/text/edubuntu-addon_fallback_title_label"]["descriptionde"]="GNOME-Arbeitsumgebung (Reserve)
";
$elem["ubiquity/text/edubuntu-addon_fallback_title_label"]["descriptionfr"]="Interface de repli Gnome
";
$elem["ubiquity/text/edubuntu-addon_fallback_title_label"]["default"]="";
$elem["ubiquity/text/edubuntu-addon_fallback_description_label"]["type"]="text";
$elem["ubiquity/text/edubuntu-addon_fallback_description_label"]["description"]="Description:
 Edubuntu ships with Unity by default for its user interface.
 If you'd instead prefer to use an interface similar to that of Gnome 2.x,
 you can choose this option.
 .
 This uses the gnome 3.0 fallback desktop as the default session.
";
$elem["ubiquity/text/edubuntu-addon_fallback_description_label"]["descriptionde"]="Description-de.UTF-8:
 Die Standard-Benutzeroberfläche von Edubuntu ist Unity. Wenn Sie stattdessen eine Benutzeroberfläche bevorzugen, die GNOME 2.x ähnelt, können Sie diese Option auswählen.
 .
 Dies verwendet die Reserve-Arbeitsumgebung GNOME 3.0 als Standard-Sitzung.
";
$elem["ubiquity/text/edubuntu-addon_fallback_description_label"]["descriptionfr"]="Description-fr.UTF-8:
 Unity est l'interface utilisateur d'Edubuntu par défaut. Si vous préférez utiliser une interface similaire à Gnome 2.X, vous pouvez choisir cette option.
 .
 Ceci utilise le bureau de repli GNOME 3.0 comme session par défaut.
";
$elem["ubiquity/text/edubuntu-addon_fallback_description_label"]["default"]="";
$elem["ubiquity/text/edubuntu-addon_ltsp_install_label"]["type"]="text";
$elem["ubiquity/text/edubuntu-addon_ltsp_install_label"]["description"]="Install
";
$elem["ubiquity/text/edubuntu-addon_ltsp_install_label"]["descriptionde"]="Installieren
";
$elem["ubiquity/text/edubuntu-addon_ltsp_install_label"]["descriptionfr"]="Installer
";
$elem["ubiquity/text/edubuntu-addon_ltsp_install_label"]["default"]="";
$elem["ubiquity/text/edubuntu-addon_ltsp_title_label"]["type"]="text";
$elem["ubiquity/text/edubuntu-addon_ltsp_title_label"]["description"]="LTSP (Linux Terminal Server Project)
";
$elem["ubiquity/text/edubuntu-addon_ltsp_title_label"]["descriptionde"]="LTSP (»Linux Terminal Server«-Projekt)
";
$elem["ubiquity/text/edubuntu-addon_ltsp_title_label"]["descriptionfr"]="LTSP (Linux Terminal Server Project)
";
$elem["ubiquity/text/edubuntu-addon_ltsp_title_label"]["default"]="";
$elem["ubiquity/text/edubuntu-addon_ltsp_description_label"]["type"]="text";
$elem["ubiquity/text/edubuntu-addon_ltsp_description_label"]["description"]="Description:
 Choosing this option will turn your Edubuntu system into an LTSP server.
 Other machines can then boot from the network and use your Edubuntu machine
 as their terminal server, offering a regular Edubuntu environment.
 .
 For this option, you need to choose in the drop-down menu below
 which interface to use for your thin clients network.
 This network should be physically isolated from your regular network
 as the Edubuntu machine will act as a DHCP server.
";
$elem["ubiquity/text/edubuntu-addon_ltsp_description_label"]["descriptionde"]="Description-de.UTF-8:
 Die Auswahl dieser Einstellung verwandelt Ihr Edubuntu-System in einen LTSP-Server. Andere Rechner können Ihren Edubuntu-Rechner beim Start über das Netzwerk dann als ihren Terminal-Server nutzen, der eine reguläre Edubuntu-Umgebung bereitstellt.
 .
 Für diese Einstellung müssen Sie im Auswahlmenü weiter unten die zu verwendende Schnittstelle für Ihr Thin-Client-Netzwerk auswählen. Dieses Netzwerk sollte physikalisch von Ihrem regulären Netzwerk getrennt sein, da der Edubuntu-Rechner als DHCP-Server eingesetzt wird.
";
$elem["ubiquity/text/edubuntu-addon_ltsp_description_label"]["descriptionfr"]="Description-fr.UTF-8:
 Activer cette option va transformer votre Edubuntu en serveur LTSP. D'autres machines pourront alors démarrer à partir du réseau et utiliser votre machine Edubuntu comme leur serveur de terminal, offrant un environnement normal d'Edubuntu.
 .
 Pour cette option, vous devez choisir dans le menu déroulant ci-dessous l'interface à utiliser pour votre réseau de clients légers. Ce réseau devra être physiquement isolé de votre réseau normal car la machine Edubuntu agira comme un serveur DHCP.
";
$elem["ubiquity/text/edubuntu-addon_ltsp_description_label"]["default"]="";
$elem["ubiquity/text/edubuntu-addon_ltsp_interface_label"]["type"]="text";
$elem["ubiquity/text/edubuntu-addon_ltsp_interface_label"]["description"]="Network interface:
";
$elem["ubiquity/text/edubuntu-addon_ltsp_interface_label"]["descriptionde"]="Netzwerk-Schnittstelle:
";
$elem["ubiquity/text/edubuntu-addon_ltsp_interface_label"]["descriptionfr"]="Interface réseau :
";
$elem["ubiquity/text/edubuntu-addon_ltsp_interface_label"]["default"]="";
$elem["ubiquity/text/edubuntu-addon_ltsp_install"]["type"]="boolean";
$elem["ubiquity/text/edubuntu-addon_ltsp_install"]["description"]="";
$elem["ubiquity/text/edubuntu-addon_ltsp_install"]["descriptionde"]="";
$elem["ubiquity/text/edubuntu-addon_ltsp_install"]["descriptionfr"]="";
$elem["ubiquity/text/edubuntu-addon_ltsp_install"]["default"]="false";
$elem["ubiquity/text/edubuntu-addon_fallback_install"]["type"]="boolean";
$elem["ubiquity/text/edubuntu-addon_fallback_install"]["description"]="";
$elem["ubiquity/text/edubuntu-addon_fallback_install"]["descriptionde"]="";
$elem["ubiquity/text/edubuntu-addon_fallback_install"]["descriptionfr"]="";
$elem["ubiquity/text/edubuntu-addon_fallback_install"]["default"]="false";
$elem["ubiquity/text/edubuntu-addon_ltsp_interface"]["type"]="string";
$elem["ubiquity/text/edubuntu-addon_ltsp_interface"]["description"]="";
$elem["ubiquity/text/edubuntu-addon_ltsp_interface"]["descriptionde"]="";
$elem["ubiquity/text/edubuntu-addon_ltsp_interface"]["descriptionfr"]="";
$elem["ubiquity/text/edubuntu-addon_ltsp_interface"]["default"]="eth0";
$elem["ubiquity/text/edubuntu-addon_ltsp_interface_index"]["type"]="string";
$elem["ubiquity/text/edubuntu-addon_ltsp_interface_index"]["description"]="";
$elem["ubiquity/text/edubuntu-addon_ltsp_interface_index"]["descriptionde"]="";
$elem["ubiquity/text/edubuntu-addon_ltsp_interface_index"]["descriptionfr"]="";
$elem["ubiquity/text/edubuntu-addon_ltsp_interface_index"]["default"]="0";
PKG_OptionPageTail2($elem);
?>
