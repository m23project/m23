<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dyfi");

$elem["dyfi/username"]["type"]="string";
$elem["dyfi/username"]["description"]="Username on dy.fi:
 Please provide the username that should be used to log in to dy.fi
 services and update dynamic hostname mappings.
";
$elem["dyfi/username"]["descriptionde"]="Benutzername auf dy.fi:
 Bitte geben Sie einen Benutzernamen an, der für die Anmeldung auf dy.fi und zur Aktualisierung der dynamischen Rechnernamen-Zuweisungen verwendet werden soll.
";
$elem["dyfi/username"]["descriptionfr"]="Nom d'utilisateur pour dy.fi :
 Veuillez indiquer le nom d'utilisateur à utiliser pour se connecter aux services dy.fi et mettre à jour les correspondances des noms d'hôte dynamiques.
";
$elem["dyfi/username"]["default"]="";
$elem["dyfi/password"]["type"]="password";
$elem["dyfi/password"]["description"]="Password on dy.fi:
 Please provide the password that should be used to log in to dy.fi
 services and update dynamic hostname mappings.
";
$elem["dyfi/password"]["descriptionde"]="Passwort auf dy.fi:
 Bitte geben Sie ein Passwort an, das für die Anmeldung auf dy.fi und zur Aktualisierung der dynamischen Rechnernamen-Zuweisungen verwendet werden soll.
";
$elem["dyfi/password"]["descriptionfr"]="Mot de passe pour dy.fi :
 Veuillez indiquer le mot de passe à utiliser pour se connecter aux services dy.fi et mettre à jour les correspondances des noms d'hôte dynamiques.
";
$elem["dyfi/password"]["default"]="";
$elem["dyfi/hosts"]["type"]="string";
$elem["dyfi/hosts"]["description"]="Registered hostnames on dy.fi:
 Please provide a space-separated list of hostnames that should be
 dynamically updated by dy.fi services.
";
$elem["dyfi/hosts"]["descriptionde"]="Registrierte Rechnernamen auf dy.fi:
 Bitte geben Sie eine durch Leerzeichen getrennte Liste von Rechnernamen an, die für die Aktualisierung der dynamischen Rechnernamen-Zuweisungen von den dy.fi-Diensten verwendet werden soll.
";
$elem["dyfi/hosts"]["descriptionfr"]="Noms d'hôte enregistrés sur dy.fi :
 Veuillez indiquer une liste des noms d'hôte, séparés par des espaces, qui devront être mis à jour par les services dy.fi.
";
$elem["dyfi/hosts"]["default"]="";
PKG_OptionPageTail2($elem);
?>
