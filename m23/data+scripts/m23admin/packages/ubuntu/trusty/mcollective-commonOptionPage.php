<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mcollective-common");

$elem["mcollective/security_psk"]["type"]="string";
$elem["mcollective/security_psk"]["description"]="MCollective PSK:
 Please specify the Pre-Shared Key that should be used between
 MCollective instances.
";
$elem["mcollective/security_psk"]["descriptionde"]="MCollective-PSK:
 Bitte geben Sie den vorher vereinbarten Schlüssel (»Pre-Shared Key«/PSK) an, der zwischen den MCollective-Instanzen verwandt wird.
";
$elem["mcollective/security_psk"]["descriptionfr"]="Clé prépartagée pour MCollective :
 Veuillez indiquer la clé prépartagée à utiliser entre les sessions MCollective.
";
$elem["mcollective/security_psk"]["default"]="unset";
$elem["mcollective/stomp_host"]["type"]="string";
$elem["mcollective/stomp_host"]["description"]="Message Queue server host:
 Please specify the hostname or IP address of the Message Queue server
 for MCollective.
";
$elem["mcollective/stomp_host"]["descriptionde"]="Nachrichtenwarteschlangen-Server:
 Bitte geben Sie dem Rechnernamen oder die IP-Adresse des Nachrichtenwarteschlangen-Servers für MCollective an.
";
$elem["mcollective/stomp_host"]["descriptionfr"]="Hôte du serveur de file d'attente des messages :
 Veuillez indiquer le nom d'hôte ou l'adresse IP du serveur de file d'attente des messages pour MCollective (« Message Queue Server »).
";
$elem["mcollective/stomp_host"]["default"]="localhost";
$elem["mcollective/stomp_port"]["type"]="string";
$elem["mcollective/stomp_port"]["description"]="Message Queue server port:
 Please specify the listening port of the Message Queue server.
";
$elem["mcollective/stomp_port"]["descriptionde"]="Nachrichtenwarteschlangen-Server-Port:
 Bitte geben Sie den Port an, auf dem der Nachrichtenwarteschlangen-Server auf Anfragen wartet.
";
$elem["mcollective/stomp_port"]["descriptionfr"]="Port pour la file d'attente des messages :
 Veuillez indiquer le port d'écoute du serveur de file d'attente des messages.
";
$elem["mcollective/stomp_port"]["default"]="61613";
$elem["mcollective/stomp_user"]["type"]="string";
$elem["mcollective/stomp_user"]["description"]="Message Queue server username:
 Please specify the STOMP username that should be used with the
 Message Queue server.
";
$elem["mcollective/stomp_user"]["descriptionde"]="Nachrichtenwarteschlangen-Server-Benutzername:
 Bitte geben Sie den STOMP-Benutzernamen an, der mit dem Nachrichtenwarteschlangen-Server benutzt werden soll.
";
$elem["mcollective/stomp_user"]["descriptionfr"]="Identifiant du serveur de file d'attente des messages :
 Veuillez indiquer l'identifiant STOMP à utiliser pour le serveur de file d'attente des messages.
";
$elem["mcollective/stomp_user"]["default"]="mcollective";
$elem["mcollective/stomp_password"]["type"]="password";
$elem["mcollective/stomp_password"]["description"]="Message Queue server password:
 Please specify the STOMP password that should be used with the
 Message Queue server.
";
$elem["mcollective/stomp_password"]["descriptionde"]="Nachrichtenwarteschlangen-Server-Passwort:
 Bitte geben Sie das STOMP-Passwort an, das mit dem Nachrichtenwarteschlangen-Server benutzt werden soll.
";
$elem["mcollective/stomp_password"]["descriptionfr"]="Mot de passe pour le serveur de file d'attente des messages :
 Veuillez indiquer le mot de passe STOMP qui devra être utilisé sur le serveur de file d'attente des messages.
";
$elem["mcollective/stomp_password"]["default"]="marionette";
PKG_OptionPageTail2($elem);
?>
