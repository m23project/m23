<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("silcd");

$elem["silcd/server-name"]["type"]="string";
$elem["silcd/server-name"]["description"]="SILC server name:
 Please enter the name of the SILC server (e.g. \"Our SILC server\").
";
$elem["silcd/server-name"]["descriptionde"]="SILC-Servername:
 Bitte geben Sie den Namen des SILC-Servers ein (z.B. »Unser SILC-Server«).
";
$elem["silcd/server-name"]["descriptionfr"]="Nom du serveur SILC :
 Veuillez indiquer le nom du serveur SILC (par exemple « Notre serveur SILC »).
";
$elem["silcd/server-name"]["default"]="";
$elem["silcd/host-name"]["type"]="string";
$elem["silcd/host-name"]["description"]="SILC server hostname:
 Please enter the hostname (or the IP address) of the SILC server
 (e.g. silc.example.org).
";
$elem["silcd/host-name"]["descriptionde"]="Rechnername des SILC-Servers:
 Bitte geben Sie den Rechnernamen (oder die IP-Adresse) des SILC-Servers ein (z.B. silc.example.org).
";
$elem["silcd/host-name"]["descriptionfr"]="Nom d'hôte du serveur SILC :
 Veuillez indiquer le nom d'hôte (ou l'adresse IP) du serveur SILC (par exemple « silc.example.org »).
";
$elem["silcd/host-name"]["default"]="";
$elem["silcd/real-name"]["type"]="string";
$elem["silcd/real-name"]["description"]="SILC server administrator real name:
 Please enter the real name of the operator running the SILC server
 (e.g. \"J. Random Operator\").
 .
 This field may be left empty.
";
$elem["silcd/real-name"]["descriptionde"]="Bürgerlicher Name des Administrators des SILC-Servers:
 Bitte geben Sie den bürgerlichen Namen des Betreibers des SILC-Servers ein (z.B. »Emil Betreiber«).
 .
 Dieses Feld kann leer gelassen werden.
";
$elem["silcd/real-name"]["descriptionfr"]="Nom réel de l'administrateur du serveur SILC :
 Veuillez indiquer le nom réel de l'utilisateur qui exécute le serveur SILC (par exemple « Utilisateur Quelconque »).
 .
 Ce champ peut rester vide.
";
$elem["silcd/real-name"]["default"]="";
$elem["silcd/email"]["type"]="string";
$elem["silcd/email"]["description"]="SILC server administrator email address:
 Please enter the email address of the operator running the SILC server
 (e.g. silc@example.org).
 .
 This field may be left empty.
";
$elem["silcd/email"]["descriptionde"]="E-Mail-Adresse des Administrators des SILC-Servers:
 Bitte geben Sie die E-Mail-Adresse des Betreibers des SILC-Servers ein (z.B. silc@example.org).
 .
 Dieses Feld kann leer gelassen werden.
";
$elem["silcd/email"]["descriptionfr"]="Adresse électronique de l'administrateur du serveur SILC :
 Veuillez indiquer l'adresse électronique de l'utilisateur qui exécute le serveur SILC (par exemple silc@example.org).
 .
 Ce champ peut rester vide.
";
$elem["silcd/email"]["default"]="";
$elem["silcd/organization"]["type"]="string";
$elem["silcd/organization"]["description"]="SILC server organization name:
 Please enter the name of the organization running the SILC server
 (e.g. \"Our Organization\").
 .
 This field may be left empty.
";
$elem["silcd/organization"]["descriptionde"]="Organisationsname des SILC-Servers:
 Bitte geben Sie den Namen der Organisation ein, die den SILC-Server betreibt (z.B. »Unsere Organisation«).
 .
 Dieses Feld kann leer gelassen werden.
";
$elem["silcd/organization"]["descriptionfr"]="Nom de l'organisation :
 Veuillez indiquer le nom de l'organisation qui exécute le serveur SILC (par exemple « Notre petite entreprise »).
 .
 Ce champ peut rester vide.
";
$elem["silcd/organization"]["default"]="";
$elem["silcd/country"]["type"]="string";
$elem["silcd/country"]["description"]="SILC server location:
 Please enter the name of the country where the SILC server is located.
 .
 This field may be left empty.
";
$elem["silcd/country"]["descriptionde"]="Standort des SILC-Servers:
 Bitte geben Sie den Namen des Landes ein, in dem sich der SILC-Server befindet.
 .
 Dieses Feld kann leer gelassen werden.
";
$elem["silcd/country"]["descriptionfr"]="Emplacement géographique du serveur SILC :
 Veuillez indiquer le nom du pays où se trouve le serveur SILC.
 .
 Ce champ peut rester vide.
";
$elem["silcd/country"]["default"]="";
$elem["silcd/admin-nick"]["type"]="string";
$elem["silcd/admin-nick"]["description"]="SILC server administrator nickname:
 Please enter the nickname of the administrator of the SILC server.
 .
 The administrator will use it for identification on the server.
";
$elem["silcd/admin-nick"]["descriptionde"]="Spitzname des Administrators des SILC-Servers:
 Bitte geben Sie den Spitznamen des Administrators des SILC-Servers an.
 .
 Der Administrator muss diesen dazu verwenden, um sich beim Server zu authentifizieren.
";
$elem["silcd/admin-nick"]["descriptionfr"]="Pseudonyme de l'administrateur du serveur SILC :
 Veuillez indiquer le pseudonyme de l'administrateur du serveur SILC.
 .
 L'administrateur utilisera ce pseudonyme pour s'identifier sur le serveur.
";
$elem["silcd/admin-nick"]["default"]="";
$elem["silcd/admin-passphrase"]["type"]="password";
$elem["silcd/admin-passphrase"]["description"]="SILC administrator passphrase:
 Please enter the passphrase for the SILC server administrator.
 .
 The administrator will need to use this passphrase in order to authenticate.
 .
 Please note that it will be stored in clear text in a configuration
 file.
";
$elem["silcd/admin-passphrase"]["descriptionde"]="Mantra des SILC-Administrators:
 Bitte geben Sie das Mantra (die Passphrase) des Administrators des SILC-Servers ein.
 .
 Der Administrator wird dieses Mantra zur Authentifizierung benötigen.
 .
 Bitte beachten Sie, dass das Mantra im Klartext in einer Konfigurationsdatei gespeichert wird.
";
$elem["silcd/admin-passphrase"]["descriptionfr"]="Phrase secrète pour l'administrateur :
 Veuillez indiquer la phrase secrète de l'administrateur du serveur SILC.
 .
 L'administrateur l'utilisera comme mot de passe pour s'authentifier.
 .
 Veuillez noter que cette phrase secrète ne sera pas chiffrée et sera enregistrée telle quelle dans un fichier de configuration.
";
$elem["silcd/admin-passphrase"]["default"]="";
PKG_OptionPageTail2($elem);
?>
