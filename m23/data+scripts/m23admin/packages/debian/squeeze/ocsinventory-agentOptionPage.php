<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ocsinventory-agent");

$elem["ocsinventory-agent/method"]["type"]="select";
$elem["ocsinventory-agent/method"]["choices"][1]="local";
$elem["ocsinventory-agent/method"]["choicesde"][1]="lokal";
$elem["ocsinventory-agent/method"]["choicesfr"][1]="Locale";
$elem["ocsinventory-agent/method"]["description"]="Method used to generate the inventory:
 Choose the 'local' method if you do not have a network connection.
 .
 Choose the 'http' method if an OCS Inventory server is set up.
";
$elem["ocsinventory-agent/method"]["descriptionde"]="Methode zum Erstellen der Inventarliste:
 Wählen Sie die »lokal«-Methode, falls Sie keine Netzverbindung haben.
 .
 Wählen Sie die »HTTP«-Methode, falls ein OCS-Inventory-Server eingerichtet ist.
";
$elem["ocsinventory-agent/method"]["descriptionfr"]="Méthode de création de l'inventaire :
 Veuillez choisir la méthode « Locale » pour ne pas utiliser de connexion réseau.
 .
 La méthode « HTTP » doit être utilisée si un serveur d'inventaire OCS est configuré.
";
$elem["ocsinventory-agent/method"]["default"]="local";
$elem["ocsinventory-agent/server"]["type"]="string";
$elem["ocsinventory-agent/server"]["description"]="OCS Inventory server host name:
 Please enter the host name of the OCS inventory server.
";
$elem["ocsinventory-agent/server"]["descriptionde"]="Rechnername des OCS-Inventory-Servers:
 Bitte geben Sie den Rechnernamen des OCS-Inventory-Servers ein.
";
$elem["ocsinventory-agent/server"]["descriptionfr"]="Nom d'hôte du serveur d'inventaire OCS :
 Veuillez indiquer le nom d'hôte du serveur d'inventaire OCS.
";
$elem["ocsinventory-agent/server"]["default"]="";
$elem["ocsinventory-agent/tag"]["type"]="string";
$elem["ocsinventory-agent/tag"]["description"]="Tag for the generated inventory:
 Each inventory can have an associated tag. Please enter the tag you would
 like for the new inventory.
 .
 This field can be left blank to continue without setting a new tag for the
 inventory.
";
$elem["ocsinventory-agent/tag"]["descriptionde"]="Markierung (»Tag«) für die erstellte Inventarliste:
 Jede Inventarliste kann eine zugeordnete Markierung enthalten. Bitte geben Sie die Markierung ein, die Sie für die Inventarliste haben möchten.
 .
 Dieses Feld kann leer bleiben, um ohne Setzen einer neuen Markierung für die Inventarliste fortzufahren.
";
$elem["ocsinventory-agent/tag"]["descriptionfr"]="Étiquette de l'inventaire créé :
 Chaque inventaire peut se voir associé une étiquette (« tag »). Veuillez indiquer celle que vous souhaitez utiliser pour l'inventaire de cette machine.
 .
 Ce champ peut être laissé vide pour ne pas utiliser d'étiquette avec cet inventaire.
";
$elem["ocsinventory-agent/tag"]["default"]="";
PKG_OptionPageTail2($elem);
?>
