<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("interchange-cat-standard");

$elem["interchange-cat-standard/install"]["type"]="boolean";
$elem["interchange-cat-standard/install"]["description"]="Create the Interchange demo catalog?
 Whether to install the demo catalog from the standard template or let
 you manually install it with makecat.
";
$elem["interchange-cat-standard/install"]["descriptionde"]="Soll der Interchange-Demokatalog angelegt werden?
 Sie können auswählen, ob der Demokatalog aus der Standardvorlage installiert werden soll oder ob Sie ihn manuell mit makecat installieren möchten.
";
$elem["interchange-cat-standard/install"]["descriptionfr"]="Faut-il créer le catalogue de démonstration d'Interchange ?
 Cette option vous permet d'installer le catalogue de démonstration à partir du canevas d'origine. Vous pouvez préférer l'installer vous-même avec makecat.
";
$elem["interchange-cat-standard/install"]["default"]="false";
$elem["interchange-cat-standard/purge"]["type"]="boolean";
$elem["interchange-cat-standard/purge"]["description"]="Remove demo catalog on package purge?
 Should all files belonging to the Interchange demo catalog removed when
 you purge this package, e.g. with dpkg --purge or apt-get remove --purge ?
";
$elem["interchange-cat-standard/purge"]["descriptionde"]="Soll der Interchange-Demokatalog beim vollständigen Löschen (purge) entfernt werden?
 Sollen alle Dateien, die zum Interchange-Demokatalog gehören, entfernt werden, wenn diese Paket z.B. mit »dpkg --purge« oder »apt-get remove --purge« vollständig entfernt wird?
";
$elem["interchange-cat-standard/purge"]["descriptionfr"]="Faut-il supprimer le catalogue de démonstration lors de la purge du paquet ?
 Veuillez choisir si vous souhaitez supprimer tous les fichiers du catalogue de démonstration d'Interchange lors de la purge du paquet (« dpkg --purge » ou « apt-get remove --purge »).
";
$elem["interchange-cat-standard/purge"]["default"]="false";
$elem["interchange-cat-standard/replace"]["type"]="select";
$elem["interchange-cat-standard/replace"]["choices"][1]="always";
$elem["interchange-cat-standard/replace"]["choices"][2]="ask";
$elem["interchange-cat-standard/replace"]["choicesde"][1]="immer";
$elem["interchange-cat-standard/replace"]["choicesde"][2]="auf Nachfrage";
$elem["interchange-cat-standard/replace"]["choicesfr"][1]="Toujours";
$elem["interchange-cat-standard/replace"]["choicesfr"][2]="Demander";
$elem["interchange-cat-standard/replace"]["description"]="Policy for replacing existing demo catalogs:
 Whether to silently replace an existing demo catalog installation, ask for
 a confirmation or never touch an existing installation.
";
$elem["interchange-cat-standard/replace"]["descriptionde"]="Richtlinie für das Ersetzen einer vorhandenen Demokatalog-Installation:
 Sie können auswählen, ob eine vorhandene Installation des Demokatalogs ohne Nachfrage, auf Nachfrage oder niemals ersetzt werden soll.
";
$elem["interchange-cat-standard/replace"]["descriptionfr"]="Stratégie de remplacement des catalogues de démonstration :
 Cette option permet de choisir si un catalogue de démonstration existant sera toujours remplacé sans avertissement, si une confirmation sera demandée ou si l'installation existante ne sera jamais modifiée.
";
$elem["interchange-cat-standard/replace"]["default"]="never";
$elem["interchange-cat-standard/confirm"]["type"]="boolean";
$elem["interchange-cat-standard/confirm"]["description"]="Replace the Interchange demo catalog?
 There seems to already exist an Interchange demo catalog.
";
$elem["interchange-cat-standard/confirm"]["descriptionde"]="Den Interchange-Demokatalog ersetzen?
 Es scheint bereits ein Interchange-Demokatalog vorhanden zu sein.
";
$elem["interchange-cat-standard/confirm"]["descriptionfr"]="Faut-il remplacer le catalogue de démonstration d'Interchange ?
 Un catalogue de démonstration pour Interchange semble déjà exister.
";
$elem["interchange-cat-standard/confirm"]["default"]="false";
$elem["interchange-cat-standard/vhost"]["type"]="string";
$elem["interchange-cat-standard/vhost"]["description"]="Virtual host for the demo catalog:
 You are running Interchange with \"FullURL\" enabled. Please specify the virtual host for the demo catalog.
";
$elem["interchange-cat-standard/vhost"]["descriptionde"]="Virtueller Host für den Demo-Katalog:
 Sie betreiben Interchange mit aktiviertem »FullURL«. Bitte geben Sie den virtuellen Host für den Demo-Katalog an.
";
$elem["interchange-cat-standard/vhost"]["descriptionfr"]="Hôte virtuel pour le catalogue de démonstration d'Interchange :
 Interchange est utilisé avec l'option « FullURL ». Il est nécessaire d'indiquer un nom d'hôte virtuel pour le catalogue de démonstration.
";
$elem["interchange-cat-standard/vhost"]["default"]="";
$elem["interchange-cat-standard/username"]["type"]="string";
$elem["interchange-cat-standard/username"]["description"]="Username for this catalog's administration:
 Please provide an username for administering the demo catalog. The
 username must be at least 2 characters long and only contain letters,
 digits, underscore, @ or the dot as characters.
";
$elem["interchange-cat-standard/username"]["descriptionde"]="Benutzername für diese Katalogadministration:
 Bitte geben Sie einen Benutzernamen für die Verwaltung des Demokatalogs ein. Der Benutzername muss mindestens zwei Zeichen lang sein und darf nur Buchstaben, Ziffern, den Unterstrich, @ oder den Punkt als Zeichen enthalten.
";
$elem["interchange-cat-standard/username"]["descriptionfr"]="Identifiant pour l'administration de ce catalogue :
 Veuillez indiquer l'identifiant à utiliser pour l'administration du catalogue de démonstration. Cet identifiant doit comporter deux caractères minimum : seuls lettres, chiffres, caractère de soulignement (« _ »), « @ » et le point y sont autorisés.
";
$elem["interchange-cat-standard/username"]["default"]="interchange";
$elem["interchange-cat-standard/password"]["type"]="password";
$elem["interchange-cat-standard/password"]["description"]="Password for this catalog's administration:
 Please provide a password for administering the standard demo catalog.
 Choose one which can not be easily guessed. Default is pass. The password 
 must be at least 4 characters long and only contain letters, digits,
 underscore @ or the dot as characters.
";
$elem["interchange-cat-standard/password"]["descriptionde"]="Passwort für diese Katalogadministration:
 Bitte geben Sie ein Passwort für die Verwaltung des Standard-Demokatalogs ein. Das ausgewählte Passwort sollte nicht leicht erraten werden können. Das Wort »pass« ist die Voreinstellung. Das Passwort muss mindestens vier Zeichen lang sein und darf nur Buchstaben, Ziffern, den Unterstrich, @ oder den Punkt als Zeichen enthalten.
";
$elem["interchange-cat-standard/password"]["descriptionfr"]="Mot de passe d'administration du catalogue :
 Veuillez indiquer le mot de passe d'administration du catalogue initial de démonstration. Choisissez un mot de passe qui ne puisse pas facilement être deviné. Il doit comporter quatre caractères au minimum, suivis de lettres, chiffres, caractère de soulignement, « @ » ou un point.
";
$elem["interchange-cat-standard/password"]["default"]="pass";
$elem["interchange-cat-standard/demomode"]["type"]="boolean";
$elem["interchange-cat-standard/demomode"]["description"]="Enable demo mode?
";
$elem["interchange-cat-standard/demomode"]["descriptionde"]="Demomodus aktivieren?
";
$elem["interchange-cat-standard/demomode"]["descriptionfr"]="Faut-il activer le mode de démonstration ?
";
$elem["interchange-cat-standard/demomode"]["default"]="true";
$elem["interchange-cat-standard/locales"]["type"]="multiselect";
$elem["interchange-cat-standard/locales"]["choices"][1]="de_DE";
$elem["interchange-cat-standard/locales"]["description"]="Additional locales for the storefront:
 The Interchange demo catalog is able to display the storefront in a number
 of different languages. Each selected locale will increase the memory
 footprint of the Interchange server processes, so it is recommended to
 choose only locales which are really needed.
";
$elem["interchange-cat-standard/locales"]["descriptionde"]="Zusätzliche Ortsanpassungen (»locales«) für die Speicheroberfläche:
 Der Interchange-Demokatalog kann dem Benutzer in verschiedenen Sprachen präsentiert werden. Jede ausgewählte Sprache erhöht den Hauptspeicherbedarf der Interchange-Prozesse. Wählen Sie deshalb bitte nur Sprachen aus, die Sie wirklich benötigen.
";
$elem["interchange-cat-standard/locales"]["descriptionfr"]="Paramètres régionaux supplémentaires de l'interface du magasin :
 Le catalogue de démonstration d'Interchange peut afficher l'interface du magasin dans plusieurs langues. Chaque jeu supplémentaire de paramètres régionaux choisi ici augmente l'occupation mémoire des processus du serveur. Il est donc recommandé de se limiter aux paramètres réellement nécessaires.
";
$elem["interchange-cat-standard/locales"]["default"]="";
$elem["interchange-cat-standard/defaultlocale"]["type"]="select";
$elem["interchange-cat-standard/defaultlocale"]["description"]="Default locale for the storefront:
 Please select the default locale for the Interchange demo catalog.
";
$elem["interchange-cat-standard/defaultlocale"]["descriptionde"]="Voreingestellte Ortsanpassung für die Speicheroberfläche:
 Bitte wählen Sie die Standard-Ortsanpassung für den Interchange-Demokatalog aus.
";
$elem["interchange-cat-standard/defaultlocale"]["descriptionfr"]="Paramètres régionaux par défaut de l'interface du magasin :
 Veuillez choisir les paramètres régionaux par défaut du catalogue de démonstration d'Interchange.
";
$elem["interchange-cat-standard/defaultlocale"]["default"]="en_US";
$elem["interchange-cat-standard/dbtype"]["type"]="select";
$elem["interchange-cat-standard/dbtype"]["choices"][1]="PostgreSQL";
$elem["interchange-cat-standard/dbtype"]["choicesde"][1]="PostgreSQL";
$elem["interchange-cat-standard/dbtype"]["choicesfr"][1]="PostgreSQL";
$elem["interchange-cat-standard/dbtype"]["description"]="DBMS for the demo catalog:
 Please select the database type used for the demo catalog.
";
$elem["interchange-cat-standard/dbtype"]["descriptionde"]="DBMS für den Demo-Katalog:
 Bitte wählen Sie den Datenbanktyp für den Demo-Katalog aus.
";
$elem["interchange-cat-standard/dbtype"]["descriptionfr"]="Gestionnaire de bases de données pour le catalogue de démonstration :
 Veuillez choisir le type de base de données utilisée pour le catalogue de démonstration d'Interchange.
";
$elem["interchange-cat-standard/dbtype"]["default"]="MySQL";
$elem["interchange-cat-standard/dbname"]["type"]="string";
$elem["interchange-cat-standard/dbname"]["description"]="Database name:
 Please select the name of the database.
";
$elem["interchange-cat-standard/dbname"]["descriptionde"]="Datenbankname:
 Bitte wählen Sie den Namen der Datenbank aus.
";
$elem["interchange-cat-standard/dbname"]["descriptionfr"]="Nom de la base de données :
 Veuillez choisir le nom de la base de données.
";
$elem["interchange-cat-standard/dbname"]["default"]="standard";
$elem["interchange-cat-standard/dbuser"]["type"]="string";
$elem["interchange-cat-standard/dbuser"]["description"]="Database user:
 Please specify the username for connecting to the database.
";
$elem["interchange-cat-standard/dbuser"]["descriptionde"]="Datenbankbenutzer:
 Bitte geben Sie den Benutzernamen für Verbindungen zur Datenbank an.
";
$elem["interchange-cat-standard/dbuser"]["descriptionfr"]="Identifiant de connexion à la base de données :
 Veuillez choisir l'identifiant à utiliser pour la connexion au gestionnaire de bases de données.
";
$elem["interchange-cat-standard/dbuser"]["default"]="interchange";
$elem["interchange-cat-standard/dbpass"]["type"]="password";
$elem["interchange-cat-standard/dbpass"]["description"]="Database password:
 Please specify the password for connecting to the database.
";
$elem["interchange-cat-standard/dbpass"]["descriptionde"]="Datenbankpasswort:
 Bitte geben Sie das Passwort für Verbindungen zur Datenbank an.
";
$elem["interchange-cat-standard/dbpass"]["descriptionfr"]="Mot de passe :
 Veuillez indiquer le mot de passe pour l'identifiant de connexion à la base de données.
";
$elem["interchange-cat-standard/dbpass"]["default"]="";
PKG_OptionPageTail2($elem);
?>
