<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("icecast2");

$elem["icecast2/icecast-setup"]["type"]="boolean";
$elem["icecast2/icecast-setup"]["description"]="Configure Icecast2?
 Choose this option to set up passwords for Icecast2. Until these are
 configured the server will not be activated.
 .
 You should not use this option if you have already manually tweaked
 the configuration of Icecast2.
";
$elem["icecast2/icecast-setup"]["descriptionde"]="Icecast2 konfigurieren?
 Wählen Sie diese Option, um Passwörter für Icecast2 zu setzen. Solange dies nicht erledigt ist, wird der Server nicht aktiviert.
 .
 Sie sollten diese Option nicht verwenden, wenn Sie die Konfiguration von Icecast2 schon per Hand optimiert haben.
";
$elem["icecast2/icecast-setup"]["descriptionfr"]="Faut-il configurer Icecast 2 ?
 Choisissez cette option pour configurer les mots de passe d'Icecast 2. Le serveur ne sera pas activé tant qu'ils ne seront pas configurés.
 .
 Vous ne devriez pas choisir cette option si vous avez déjà modifié la configuration d'Icecast 2 vous-même.
";
$elem["icecast2/icecast-setup"]["default"]="false";
$elem["icecast2/hostname"]["type"]="string";
$elem["icecast2/hostname"]["description"]="Icecast2 hostname:
 Please specify the fully qualified domain name that should be used
 as prefix to all streams.
";
$elem["icecast2/hostname"]["descriptionde"]="Icecast2-Rechnername:
 Bitte geben Sie den kompletten Domain-Namen an, der als Präfix für alle Übertragungen verwendet werden soll.
";
$elem["icecast2/hostname"]["descriptionfr"]="Nom d'hôte pour Icecast 2 :
 Veuillez indiquer le nom de domaine complètement qualifié à utiliser comme préfixe pour tous les flux.
";
$elem["icecast2/hostname"]["default"]="localhost";
$elem["icecast2/sourcepassword"]["type"]="string";
$elem["icecast2/sourcepassword"]["description"]="Icecast2 source password:
 Please specify the password that should be used to control access to
 Icecast2's media sources.
";
$elem["icecast2/sourcepassword"]["descriptionde"]="Icecast2-Quellenpasswort:
 Bitte geben Sie das Passwort an, das für den Kontrollzugriff auf die Medienquellen von Icecast2 verwendet werden soll.
";
$elem["icecast2/sourcepassword"]["descriptionfr"]="Mot de passe pour la source Icecast 2 :
 Veuillez indiquer le mot de passe à utiliser pour contrôler l'accès aux sources multimédia d'Icecast 2.
";
$elem["icecast2/sourcepassword"]["default"]="hackme";
$elem["icecast2/relaypassword"]["type"]="string";
$elem["icecast2/relaypassword"]["description"]="Icecast2 relay password:
 Please specify the password that should be used to control access to
 Icecast2's stream relays.
";
$elem["icecast2/relaypassword"]["descriptionde"]="Icecast2-Relais-Passwort:
 Bitte geben Sie das Passwort an, das für den Kontrollzugriff auf die Übertragungsrelais von Icecast2 verwendet werden soll.
";
$elem["icecast2/relaypassword"]["descriptionfr"]="Mot de passe du relais Icecast 2 :
 Veuillez indiquer le mot de passe à utiliser pour contrôler l'accès aux relais de flux d'Icecast 2.
";
$elem["icecast2/relaypassword"]["default"]="hackme";
$elem["icecast2/adminpassword"]["type"]="string";
$elem["icecast2/adminpassword"]["description"]="Icecast2 administration password:
 Please specify the password that should be used for Icecast2
 administration.
 .
 The administration web interface, at http://localhost:8000, can be
 used to monitor connections or to block users from streaming.
";
$elem["icecast2/adminpassword"]["descriptionde"]="Icecast2 Administrations-Passwort:
 Bitte geben Sie das Passwort an, das für die Administration von Icecast2 verwendet werden soll.
 .
 Die Administrations-Web-Schnittstelle unter http://localhost:8000 kann verwendet werden, um Verbindungen zu überwachen oder Nutzer von den Übertragungen auszuschließen.
";
$elem["icecast2/adminpassword"]["descriptionfr"]="Mot de passe pour l'administration d'Icecast 2 :
 Veuillez indiquer le mot de passe à utiliser pour l'administration d'Icecast 2.
 .
 L'interface web d'administration, située à l'adresse <http://localhost:8000>, peut être utilisée pour surveiller les connexions ou pour empêcher certains utilisateurs d'accéder aux flux.
";
$elem["icecast2/adminpassword"]["default"]="hackme";
PKG_OptionPageTail2($elem);
?>
