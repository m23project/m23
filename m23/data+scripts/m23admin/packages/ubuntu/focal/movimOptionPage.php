<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("movim");

$elem["movim/admin_user"]["type"]="string";
$elem["movim/admin_user"]["description"]="Admin username:
 Movim has an administration tool to configure various settings,
 which is protected by an admin user and password.
 .
 Please provide the username to login to the backend.
";
$elem["movim/admin_user"]["descriptionde"]="Administratorbenutzername:
 Movim verfügt über ein Verwaltungswerkzeug, um verschiedene Einstellungen vorzunehmen. Es wird durch einen Benutzernamen und ein Passwort geschützt.
 .
 Bitte geben Sie den Benutzernamen an, mit dem die Anmeldung am Backend erfolgt.
";
$elem["movim/admin_user"]["descriptionfr"]="Nom d'utilisateur de l'administrateur :
 Pour configurer certains réglages, Movim possède un outil d'administration qui est sécurisé par un administrateur avec un mot de passe.
 .
 Veuillez fournir le nom d'utilisateur pour se connecter au programme.
";
$elem["movim/admin_user"]["default"]="admin";
$elem["movim/admin_password"]["type"]="password";
$elem["movim/admin_password"]["description"]="Admin password:
 Movim has an administration tool to configure various settings,
 which is protected by an admin user and password.
 .
 Please provide the password to login to the backend.
";
$elem["movim/admin_password"]["descriptionde"]="Administratorpasswort:
 Movim verfügt über ein Verwaltungswerkzeug, um verschiedene Einstellungen vorzunehmen. Es wird durch einen Benutzernamen und ein Passwort geschützt.
 .
 Bitte geben Sie das Passwort an, mit dem die Anmeldung am Backend erfolgt.
";
$elem["movim/admin_password"]["descriptionfr"]="Mot de passe de l'administrateur :
 Pour configurer certains réglages, Movim possède un outil d'administration qui est sécurisé par un administrateur avec un mot de passe.
 .
 Veuillez indiquer le mot de passe pour se connecter au programme.
";
$elem["movim/admin_password"]["default"]="";
$elem["movim/public_url"]["type"]="string";
$elem["movim/public_url"]["description"]="Public URL of Movim instance:
 The public URL is the URL at which this instance of Movim will be
 reachable. It is used in various places to generate endpoint URLs.
 .
 Please make sure to use the right protocol (HTTP vs. HTTPS), the correct
 public hostname and the correct base path expected by your webserver.
 The WebSocket endpoint is expected at .../ws/ below this URL.
";
$elem["movim/public_url"]["descriptionde"]="Öffentliche Webadresse der Movim-Instanz:
 Die öffentliche Webadresse ist die Webadresse, unter der diese Instanz von Movim erreichbar sein wird. Sie wird an verschiedenen Stellen benutzt, um Endpunktwebadressen zu erzeugen.
 .
 Bitte stellen Sie sicher, dass das richtige Protokoll (HTTP bzw. HTTPS), der korrekte öffentliche Rechnername und der korrekte Basispfad, der von Ihrem Webserver benutzt wird, verwendet werden.
";
$elem["movim/public_url"]["descriptionfr"]="URL publique de l'instance de Movim :
 L'URL publique est l'URL à laquelle cette instance de Movim sera joignable. Elle est utilisée à divers emplacements pour créer des URL de point d'accès.
 .
 Veuillez vous assurer d'utiliser le bon protocole (HTTP ou HTTPS), le nom d'hôte public correct et le chemin correct de la base attendu par le serveur web. Le point d'accès WebSocket se trouve à cette URL avec .../ws/ en aval.
";
$elem["movim/public_url"]["default"]="http://localhost/movim/";
$elem["movim/ws_port"]["type"]="string";
$elem["movim/ws_port"]["description"]="WebSocket port:
 This port is used internally and normally accepts reverse-proxied
 connections from a public-facing wbserver.
";
$elem["movim/ws_port"]["descriptionde"]="WebSocket-Port:
 Dieser Port wird intern benutzt und akzeptiert normalerweise rückumgeleitete Verbindungen von einem an die Öffentlichkeit gerichteten Webserver.
";
$elem["movim/ws_port"]["descriptionfr"]="Port WebSocket :
 Ce port est utilisé en interne et accepte normalement des connexions utilisant un mandataire inverse à partir d'un serveur web destiné au public.
";
$elem["movim/ws_port"]["default"]="8080";
PKG_OptionPageTail2($elem);
?>
