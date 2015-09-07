<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("locales");

$elem["locales/locales_to_be_generated"]["type"]="multiselect";
$elem["locales/locales_to_be_generated"]["choices"][1]="All locales";
$elem["locales/locales_to_be_generated"]["choicesde"][1]="Alle Standorteinstellungen";
$elem["locales/locales_to_be_generated"]["choicesfr"][1]="Tous les choix possibles";
$elem["locales/locales_to_be_generated"]["description"]="Locales to be generated:
 Locales are a framework to switch between multiple languages and
 allow users to use their language, country, characters, collation
 order, etc.
 .
 Please choose which locales to generate. UTF-8 locales should be
 chosen by default, particularly for new installations. Other
 character sets may be useful for backwards compatibility with older
 systems and software.
";
$elem["locales/locales_to_be_generated"]["descriptionde"]="Zu generierende Standorteinstellungen (»locales«):
 Standorteinstellungen ist ein System, um zwischen verschiedenen Sprachen umzuschalten. Benutzer können damit ihre Sprache, ihr Land, ihren Zeichensatz, ihre Sortierreihenfolge und anderes mehr festlegen.
 .
 Bitte wählen Sie aus, welche Standorteinstellungen erzeugt werden sollen. UTF-8-Standorteinstellungen sollten standardmäßig ausgewählt werden, insbesondere für neue Installationen. Andere Zeichensätze könnten für Rückkompatibilität mit älteren Systemen und Software nützlich sein.
";
$elem["locales/locales_to_be_generated"]["descriptionfr"]="Jeux de paramètres régionaux à créer :
 Les jeux de paramètres régionaux (aussi appelés « locales ») permettent de gérer des langues multiples et offrent aux utilisateurs la possibilité de choisir la langue, le pays, le jeu de caractères, l'ordre de tri, etc.
 .
 Veuillez choisir les paramètres régionaux à créer. Des paramètres régionaux utilisant l'encodage UTF-8 devraient être le choix par défaut, notamment pour de nouvelles installations. Les autres jeux de caractères peuvent être utiles pour conserver la compatibilité avec d'anciens systèmes ou logiciels.
";
$elem["locales/locales_to_be_generated"]["default"]="";
$elem["locales/default_environment_locale"]["type"]="select";
$elem["locales/default_environment_locale"]["choices"][1]="None";
$elem["locales/default_environment_locale"]["choicesde"][1]="Keine";
$elem["locales/default_environment_locale"]["choicesfr"][1]="Aucun";
$elem["locales/default_environment_locale"]["description"]="Default locale for the system environment:
 Many packages in Debian use locales to display text in the correct
 language for the user. You can choose a default locale for the system
 from the generated locales.
 .
 This will select the default language for the entire system. If this
 system is a multi-user system where not all users are able to speak
 the default language, they will experience difficulties.
";
$elem["locales/default_environment_locale"]["descriptionde"]="Standard-Standorteinstellung für die Systemumgebung?
 Viele Debian-Pakete benutzen Standorteinstellungen, um Text in der für die Benutzer korrekten Sprache anzuzeigen. Sie können aus den generierten Standorteinstellungen einen Standard für Ihr System auswählen.
 .
 Bemerkung: Dies wählt die Standardsprache für das gesamte System. Falls dies ein Mehrbenutzer-System ist und nicht alle Benutzer die Standardsprache sprechen, dann werden diese Schwierigkeiten haben.
";
$elem["locales/default_environment_locale"]["descriptionfr"]="Jeu de paramètres régionaux actif par défaut :
 De nombreux paquets utilisent le mécanisme de localisation pour afficher les messages destinés aux utilisateurs dans la langue adéquate. Vous pouvez changer la valeur par défaut de l'ensemble du système pour utiliser un des jeux de paramètres régionaux qui seront créés.
 .
 Veuillez noter que cette valeur modifiera la langue utilisée par le système. Si l'environnement est multi-utilisateurs et que certains utilisateurs ne parlent pas votre langue, ils risquent d'avoir des difficultés.
";
$elem["locales/default_environment_locale"]["default"]="None";
PKG_OptionPageTail2($elem);
?>
