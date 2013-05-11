<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("belocs-locales-bin");

$elem["belocs-locales-bin/locales_to_be_generated"]["type"]="multiselect";
$elem["belocs-locales-bin/locales_to_be_generated"]["choices"][1]="All locales";
$elem["belocs-locales-bin/locales_to_be_generated"]["choicesde"][1]="Alle Standorteinstellungen";
$elem["belocs-locales-bin/locales_to_be_generated"]["choicesfr"][1]="Tous les choix possibles";
$elem["belocs-locales-bin/locales_to_be_generated"]["description"]="Locales to be generated:
 Locale is a framework to switch between multiple languages for users who can
 select to use their language, country, characters, collation order, etc.
 .
 Choose which locales to generate.  The selection will be saved to
 `/etc/locale.gen', which you can also edit manually (you need to run
 `locale-gen' afterwards).
 .
 When `All locales' is selected, /etc/locale.gen will be set as a symlink to
 /usr/share/i18n/SUPPORTED.
";
$elem["belocs-locales-bin/locales_to_be_generated"]["descriptionde"]="Zu generierende Standorteinstellungen:
 Standorteinstellungen ist ein Rahmen, um zwischen mehreren Sprachen zu wechseln, für Benutzer, die Ihre Sprache, Ihr Land, Ihren Zeichensatz, Ihre Sortierreihenfolge usw. auswählen können.
 .
 Sie können hier Standorteinstellungen auswählen, die jetzt generiert werden sollen. Diese Einstellung wird in »/etc/locale-gen« gespeichert. Sie können diese Datei auch manuell ändern. Starten Sie nach der Änderung »locale-gen«.
 .
 Falls »Alle Standorteinstellungen« gewählt ist, wird /etc/locale.gen als Symlink auf /usr/share/i18n/SUPPORTED eingerichtet.
";
$elem["belocs-locales-bin/locales_to_be_generated"]["descriptionfr"]="Paramètres régionaux à générer :
 La localisation est un mécanisme qui permet aux utilisateurs de choisir la langue, le pays, le jeu de caractères, etc.
 .
 Veuillez choisir les jeux de paramètres régionaux (« locales », en anglais) qui seront disponibles sur votre système ; cette liste est sauvée dans le fichier « /etc/locale.gen », que vous pouvez aussi modifier vous-même (vous devez alors lancer la commande « locale-gen » après tout changement).
 .
 Quand l'option « Tous les choix possibles » est choisie, le fichier /etc/locale.gen est remplacé par un lien symbolique vers /usr/share/i18n/SUPPORTED.
";
$elem["belocs-locales-bin/locales_to_be_generated"]["default"]="";
$elem["belocs-locales-bin/default_environment_locale"]["type"]="select";
$elem["belocs-locales-bin/default_environment_locale"]["choices"][1]="None";
$elem["belocs-locales-bin/default_environment_locale"]["choicesde"][1]="Keine";
$elem["belocs-locales-bin/default_environment_locale"]["choicesfr"][1]="Aucun";
$elem["belocs-locales-bin/default_environment_locale"]["description"]="Default locale for the system environment:
 Many packages in Debian use locales to display text in the correct
 language for users. You can change the default locale if you're not
 a native English speaker.
 These choices are based on which locales you have chosen to generate.
 .
 Note: This will select the language for your whole system. If you're
 running a multi-user system where not all of your users speak the language
 of your choice, then they will run into difficulties and you might want
 not to set a default locale.
";
$elem["belocs-locales-bin/default_environment_locale"]["descriptionde"]="Standard-Standorteinstellung für die System-Umgebung?
 Viele Debian-Pakete benutzen Standorteinstellungen, um Text in der für die Benutzer korrekten Sprache anzuzeigen. Sie können die Standardeinstellungen ändern, falls Englisch nicht Ihre Muttersprache ist. Diese Auswahl basiert auf den Standorteinstellungen, die Sie zur Erzeugung ausgewählt haben.
 .
 Bemerkung: Dies wählt die Sprache für das gesamte System. Wenn Sie ein Mehrbenutzer-System betreiben und nicht alle Benutzer die Sprache Ihrer Wahl sprechen, dann werden sie in Schwierigkeiten geraten und Sie sollten keine Standard-Standorteinstellung setzen.
";
$elem["belocs-locales-bin/default_environment_locale"]["descriptionfr"]="Jeu de paramètres régionaux actif par défaut :
 De nombreux paquets utilisent le mécanisme de localisation pour afficher les messages destinés aux utilisateurs dans la langue adéquate. Vous pouvez changer la valeur par défaut si votre langue maternelle n'est pas l'anglais. Les choix disponibles dépendent des jeux de paramètres régionaux que vous avez préalablement sélectionnés.
 .
 Veuillez noter que cette valeur fixera la langue utilisée par le système. Si l'environnement est multiutilisateurs et que certains utilisateurs ne parlent pas votre langue, ils risquent d'avoir quelques difficultés et il serait peut-être préférable de ne pas utiliser de valeur par défaut.
";
$elem["belocs-locales-bin/default_environment_locale"]["default"]="None";
PKG_OptionPageTail2($elem);
?>
