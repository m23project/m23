<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mahara");

$elem["mahara/db_type"]["type"]="select";
$elem["mahara/db_type"]["choices"][1]="postgres8";
$elem["mahara/db_type"]["description"]="Database type:
 What type of database should be used for the Mahara site
";
$elem["mahara/db_type"]["descriptionde"]="Datenbanktyp:
 Welche Datenbank soll für die Mahara Site benutzt werden
";
$elem["mahara/db_type"]["descriptionfr"]="Type de serveur de bases de données :
 Veuillez indiquer le type de serveur de bases de données à utiliser pour ce site Mahara.
";
$elem["mahara/db_type"]["default"]="postgres8";
$elem["mahara/db_host"]["type"]="string";
$elem["mahara/db_host"]["description"]="Database host:
 Which database host should be used for the Mahara site
 You can leave this blank to connect via UNIX sockets
";
$elem["mahara/db_host"]["descriptionde"]="Datenbank Host:
 Welcher Datenbank Host soll für die Mahara Site benutzt werden Wenn Sie das Feld leer lassen, wird die Verbindung über UNIX Sockets hergestellt
";
$elem["mahara/db_host"]["descriptionfr"]="Nom d'hôte du serveur de bases de données :
 Veuillez indiquer le nom d'hôte du serveur de bases de données à utiliser pour ce site Mahara. Ce champ peut être laissé vide pour utiliser les « sockets » UNIX.
";
$elem["mahara/db_host"]["default"]="Default:";
$elem["mahara/db_port"]["type"]="string";
$elem["mahara/db_port"]["description"]="Database port:
 Which database port should be used for the Mahara site
 You can leave this blank for the default
";
$elem["mahara/db_port"]["descriptionde"]="Datenbank Port:
 Welcher Datenbank Port soll für die Mahara Site benutzt werden Wenn Sie das Feld leer lassen, wird die Standardeinstellung benutzt
";
$elem["mahara/db_port"]["descriptionfr"]="Port d'écoute du serveur de bases de données :
 Veuillez indiquer le port d'écoute du serveur de bases de données à utiliser pour ce site Mahara. Ce champ peut être laissé vide pour utiliser le port par défaut.
";
$elem["mahara/db_port"]["default"]="Default:";
$elem["mahara/db_name"]["type"]="string";
$elem["mahara/db_name"]["description"]="Database name (not username):
 Which database should be used for the Mahara site
";
$elem["mahara/db_name"]["descriptionde"]="Datenbank Name (das ist nicht der Benutzername):
 Welche Datenbank soll für die Mahara Site benutzt werden
";
$elem["mahara/db_name"]["descriptionfr"]="Nom de la base de données :
 Veuillez indiquer le nom de la base de données à utiliser pour ce site Mahara. Ce nom n'est pas l'identifiant de connexion.
";
$elem["mahara/db_name"]["default"]="mahara";
$elem["mahara/db_user"]["type"]="string";
$elem["mahara/db_user"]["description"]="Database username:
 Which username should be used to connect to the Mahara database
";
$elem["mahara/db_user"]["descriptionde"]="Datenbank Benutzername:
 Welcher Benutzername soll für die Verbindung zur Mahara Datenbank benutzt werden
";
$elem["mahara/db_user"]["descriptionfr"]="Identifiant de connexion à la base de données :
 Veuillez indiquer l'identifiant à utiliser pour les connexions à la base de données de ce site Mahara.
";
$elem["mahara/db_user"]["default"]="mahara";
$elem["mahara/db_pass"]["type"]="string";
$elem["mahara/db_pass"]["description"]="Database password:
 Which password is associated with the given username
 You can leave this blank if you are not using password authentication.
";
$elem["mahara/db_pass"]["descriptionde"]="Datenbank Passwort:
 Das Passwort für den gewählten Benutzernamen. Wenn keine Passwort-Authentifizierung benutzt wird, können Sie das Feld leer lassen
";
$elem["mahara/db_pass"]["descriptionfr"]="Mot de passe de connexion à la base de données :
 Veuillez indiquer le mot de passe de l'identifiant de connexion à la base de données. Ce champ peut être laissé vide si vous n'utilisez pas l'authentification par mot de passe.
";
$elem["mahara/db_pass"]["default"]="Default:";
$elem["mahara/smtphosts"]["type"]="string";
$elem["mahara/smtphosts"]["description"]="SMTP Hosts:
 Comma separated list of SMTP servers to use to send mail
 .
 If you leave this blank, the system mailer will be used. Generally, this will
 work fine
";
$elem["mahara/smtphosts"]["descriptionde"]="SMTP Server:
 Geben Sie hier den vollen Namen von einem oder mehreren lokalen SMTP-Servern (getrennt durch Kommata) an, die Mahara für den E-Mail-Versand benutzen soll
 .
 Wenn Sie dieses Feld frei lassen, wird Mahara die Standard-Methode von PHP zum Senden von E-Mails verwenden
";
$elem["mahara/smtphosts"]["descriptionfr"]="Hôtes SMTP :
 Veuillez indiquer la liste des serveurs SMTP à utiliser pour envoyer des courriels. Les entrées multiples doivent être séparées par des virgules.
 .
 Si ce champ est vide, le serveur de messagerie local sera utilisé.
";
$elem["mahara/smtphosts"]["default"]="Default:";
PKG_OptionPageTail2($elem);
?>
