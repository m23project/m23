<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("printer-driver-pnm2ppa");

$elem["pnm2ppa/use_debconf"]["type"]="boolean";
$elem["pnm2ppa/use_debconf"]["description"]="Would you like debconf to configure pnm2ppa?
 You can have debconf perform some simple configuration steps for your
 default pnm2ppa setup (edited in your /etc/pnm2ppa.conf file).
";
$elem["pnm2ppa/use_debconf"]["descriptionde"]="Soll Debconf für die Einstellungen verwendet werden?
 Sie können Debconf benutzen, um einige einfache Anpassungen an den Standardeinstellungen von pnm2ppa (in Ihrer Datei /etc/pnm2ppa.conf) vorzunehmen.
";
$elem["pnm2ppa/use_debconf"]["descriptionfr"]="Faut-il utiliser debconf pour configurer pnm2ppa ?
 Debconf peut réaliser quelques étapes de configuration simples pour le paramétrage par défaut de pnm2ppa (dans le fichier /etc/pnm2ppa.conf).
";
$elem["pnm2ppa/use_debconf"]["default"]="true";
$elem["pnm2ppa/printer_model"]["type"]="select";
$elem["pnm2ppa/printer_model"]["choices"][1]="710";
$elem["pnm2ppa/printer_model"]["choices"][2]="712";
$elem["pnm2ppa/printer_model"]["choices"][3]="720";
$elem["pnm2ppa/printer_model"]["choices"][4]="722";
$elem["pnm2ppa/printer_model"]["choices"][5]="820";
$elem["pnm2ppa/printer_model"]["description"]="What model of HP Deskjet printer do you use?
 The pnm2ppa printer filter behaves differently depending upon which HP
 DeskJet model you use. Choose your model of printer for the default
 configuration file /etc/pnm2ppa.conf.
";
$elem["pnm2ppa/printer_model"]["descriptionde"]="Welches Modell eines HP-Deskjet-Druckers benutzen Sie?
 Der verwendete Druckerfilter in pnm2ppa hängt vom Typ des HP-Deskjets ab, den Sie einsetzen. Wählen Sie Ihr Druckermodell für die systemweite Konfigurationsdatei /etc/pnm2ppa.conf aus.
";
$elem["pnm2ppa/printer_model"]["descriptionfr"]="Quel modèle d'imprimante HP Deskjet utilisez-vous ?
 Le filtre d'impression pnm2ppa se comporte différemment selon le modèle d'imprimante HP Deskjet. Veuillez choisir le modèle d'imprimante pour le fichier de configuration par défaut /etc/pnm2ppa.conf.
";
$elem["pnm2ppa/printer_model"]["default"]="710";
$elem["pnm2ppa/create_magicfilter"]["type"]="boolean";
$elem["pnm2ppa/create_magicfilter"]["description"]="Would you like debconf to create magicfilter filters?
 Magicfilter is a customizable, extensible automatic printer filter. It
 uses its own magic database (a la file(1)) to decide how to print out a
 given print job.  Debconf can run the custom pnm2ppa script called
 \"update-magicfilter\" to generate a default set of filters for color and
 black-and-white printing.
 .
 The template filter is found in /usr/share/pnm2ppa/ as
 \"pnm2ppa-magicfilter.in\".  update-magicfilter uses sed to replace
 @OPTIONS@ from the template and place the resulting filters in
 /etc/magicfilter.  Additionally, symbolic links are created from the
 generated pnm2ppa filters to pbm2ppa filters (the deprecated
 predecessor to pnm2ppa).
 .
 The only thing left for you to do is run magicfilterconfig to
 generate your /etc/printcap.
";
$elem["pnm2ppa/create_magicfilter"]["descriptionde"]="Soll Debconf »magicfilter«-Filter erstellen?
 Magicfilter ist ein anpassbarer, erweiterbarer automatischer Druckerfilter. Er nutzt seine eigene magische Datenbank (wie file(1)), um zu entscheiden, wie ein übergebener Druckjob ausgedruckt wird. Debconf kann das Skript »update-magicfilter« aufrufen, um einige Standardfilter für Farb- und Schwarz-Weiß-Druck zu erstellen.
 .
 Die Vorlage für den Filter befindet sich im Verzeichnis /usr/share/pnm2ppa/ als »pnm2ppa-magicfilter.in«. Das Skript »update-magicfilter« nutzt »sed«, um @OPTIONS@ aus der Vorlage zu ersetzen und legt den erstellten Filter im Verzeichnis /etc/magicfilter ab. Zusätzlich werden symbolische Links von den erstellten pnm2ppa-Filtern zu den pbm2ppa-Filtern (dem veralteten Vorgänger von pnm2ppa) angelegt.
 .
 Sie müssen nun nur noch das Programm »magicfilterconfig« starten, um die Datei /etc/printcap zu erzeugen.
";
$elem["pnm2ppa/create_magicfilter"]["descriptionfr"]="Faut-il utiliser debconf pour configurer pnm2ppa ?
 Magicfilter est un filtre d'impression automatique extensible et personnalisable. Il utilise sa propre base de données magique (à la file(1)) pour déterminer comment imprimer un travail donné. Debconf peut utiliser le script personnalisé de pnm2ppa appelé « update-magicfilter » pour générer un ensemble de filtres par défaut pour les impressions en couleurs et en noir et blanc.
 .
 Le filtre du modèle se trouve dans /usr/share/pnm2ppa/ et est nommé pnm2ppa-magicfilter.in. update-magicfilter utilise sed pour remplacer les chaînes « @OPTIONS@ » du modèle et installe le filtre résultant dans /etc/magicfilter. De plus, des liens symboliques sont créés des filtres de pnm2ppa générés vers ceux de pbm2ppa (le prédécesseur obsolète de pnm2ppa).
 .
 La seule chose qu'il vous reste à faire est de lancer magicfilterconfig pour générer /etc/printcap.
";
$elem["pnm2ppa/create_magicfilter"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
