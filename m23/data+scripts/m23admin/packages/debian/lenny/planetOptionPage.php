<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("planet");

$elem["planet/configure"]["type"]="boolean";
$elem["planet/configure"]["description"]="Do you want to manage automatically the planet configuration?
 You can manage automatically the configuration of planet, or manually 
 edit /etc/planet.conf to suit your needs.
";
$elem["planet/configure"]["descriptionde"]="Möchten Sie die Planet-Konfiguration automatisch verwalten?
 Sie können die Konfiguration von Planet automatisch verwalten oder manuell, indem Sie /etc/planet.conf auf Ihre Bedürfnisse anpassen.
";
$elem["planet/configure"]["descriptionfr"]="Faut-il configurer automatiquement planet ?
 Vous pouvez configurer automatiquement planet, ou modifier le fichier /etc/planet.conf.
";
$elem["planet/configure"]["default"]="false";
$elem["planet/template"]["type"]="select";
$elem["planet/template"]["choices"][1]="fancy";
$elem["planet/template"]["description"]="Template to use:
 You can choose between a basic and a fancy template for the output of
 planet. Fancy uses a CSS and images, whereas basic does not.
 Select the one you would like to have.
";
$elem["planet/template"]["descriptionde"]="Zu verwendende Vorlage:
 Sie können zwischen einer einfachen und einer ausgefallenen Vorlage für die Ausgabe von Planet wählen. Die ausgefallene Vorlage verwendet CSS und Bilder, während die einfache dies nicht macht. Wählen Sie diejenige, die sie haben möchten.
";
$elem["planet/template"]["descriptionfr"]="Modèle à utiliser :
 Vous pouvez choisir entre un modèle simple ou un modèle plus agréable pour l'aspect de planet. Ce deuxième modèle utilise des feuilles de style en cascade (CSS) et des images alors que le modèle simple n'en utilise pas.
";
$elem["planet/template"]["default"]="fancy";
$elem["planet/planet_name"]["type"]="string";
$elem["planet/planet_name"]["description"]="Planet's name:
 Please enter the name you would like for your planet. `Planet
 'organization'' is usually a good choice.
";
$elem["planet/planet_name"]["descriptionde"]="Planets Name:
 Bitte geben Sie den Namen ein, den Sie für Ihren Planet wollen. »Planet \"Organisation\"« ist typischerweise eine gute Wahl.
";
$elem["planet/planet_name"]["descriptionfr"]="Nom de l'agrégateur planet :
 Veuillez entrer le nom que vous voulez donner à l'agrégateur. « Planet » suivi du nom de votre organisme est habituellement un bon choix.
";
$elem["planet/planet_name"]["default"]="";
$elem["planet/planet_link"]["type"]="string";
$elem["planet/planet_link"]["description"]="Link to the planet main page:
 Please enter the URL where your planet will be available.
";
$elem["planet/planet_link"]["descriptionde"]="Link auf die Planet-Hauptseite:
 Bitte geben Sie die URL ein, auf der Ihr Planet verfügbar sein wird.
";
$elem["planet/planet_link"]["descriptionfr"]="Lien vers la page principale de l'agrégateur :
 Veuillez entrer l'adresse où l'agrégateur sera disponible.
";
$elem["planet/planet_link"]["default"]="";
$elem["planet/planet_owner_name"]["type"]="string";
$elem["planet/planet_owner_name"]["description"]="Owner's name:
 Please enter the name and surname of the person to contact concerning
 problems about your planet.
";
$elem["planet/planet_owner_name"]["descriptionde"]="Name des Eigentümers:
 Bitte geben Sie den Namen und Nachnamen der Person ein, die bei Problemen mit Ihrem Planet benachrichtigt werden soll.
";
$elem["planet/planet_owner_name"]["descriptionfr"]="Nom du propriétaire :
 Veuillez indiquer le prénom et le nom de la personne à contacter en cas de problèmes liés à l'agrégateur.
";
$elem["planet/planet_owner_name"]["default"]="";
$elem["planet/planet_owner_email"]["type"]="string";
$elem["planet/planet_owner_email"]["description"]="Owner's email:
 Please enter the email address to contact concerning problems about
 your planet.
";
$elem["planet/planet_owner_email"]["descriptionde"]="E-Mail des Eigentümers:
 Bitte geben Sie die E-Mail-Adresse der Person ein, die bei Problemen mit Ihrem Planet benachrichtigt werden soll.
";
$elem["planet/planet_owner_email"]["descriptionfr"]="Adresse du propriétaire :
 Veuillez indiquer l'adresse électronique de la personne à contacter en cas de problèmes liés à l'agrégateur.
";
$elem["planet/planet_owner_email"]["default"]="";
PKG_OptionPageTail2($elem);
?>
