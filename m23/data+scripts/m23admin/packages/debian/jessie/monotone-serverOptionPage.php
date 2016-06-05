<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("monotone-server");

$elem["monotone-server/manage-db"]["type"]="boolean";
$elem["monotone-server/manage-db"]["description"]="Automatically manage monotone database?
 Select this option to automatically manage the monotone database. If
 selected, the database will automatically be created. Also when upgrading,
 the database will be automatically migrated if necessary.
";
$elem["monotone-server/manage-db"]["descriptionde"]="Die Monotone-Datenbank automatisch verwalten?
 Wählen Sie diese Option, wenn die Monotone-Datenbank automatisch verwaltet werden soll. Die Datenbank wird dann automatisch erzeugt und falls notwendig bei Aktualisierungen automatisch migriert.
";
$elem["monotone-server/manage-db"]["descriptionfr"]="Faut-il gérer automatiquement la base de données monotone ?
 Veuillez choisir si vous souhaitez gérer automatiquement la base de données monotone. La base de données sera alors automatiquement créée. De plus, lors d'une mise à jour, sa structure sera modifiée si nécessaire.
";
$elem["monotone-server/manage-db"]["default"]="true";
$elem["monotone-server/key"]["type"]="string";
$elem["monotone-server/key"]["description"]="Monotone key id:
 Enter the id of the key your monotone server will use. The key id
 is typically an email address.
";
$elem["monotone-server/key"]["descriptionde"]="Monotone-Schlüssel-ID:
 Geben Sie die ID für den Schlüssel des Monotone-Servers ein. Die Schlüssel-ID ist üblicherweise eine E-Mailadresse.
";
$elem["monotone-server/key"]["descriptionfr"]="Identifiant de la clé monotone :
 Veuillez indiquer l'identifiant de la clé qu'utilisera le serveur monotone. Cet identifiant est généralement une adresse de courrier électronique.
";
$elem["monotone-server/key"]["default"]="";
$elem["monotone-server/passphrase"]["type"]="password";
$elem["monotone-server/passphrase"]["description"]="Monotone key passphrase:
 Please choose a passphrase for your monotone key. If left blank, one will
 be generated for you.
";
$elem["monotone-server/passphrase"]["descriptionde"]="Monotone-Schlüssel-Passwort:
 Bitte wählen Sie ein Passwort für Ihren Monotone-Schlüssel. Wenn Sie nichts eingeben, wird eines für Sie generiert.
";
$elem["monotone-server/passphrase"]["descriptionfr"]="Phrase secrète de la clé monotone :
 Veuillez choisir une phrase secrète pour la clé de monotone. Si vous ne choisissez rien, une phrase sera créée automatiquement.
";
$elem["monotone-server/passphrase"]["default"]="";
PKG_OptionPageTail2($elem);
?>
