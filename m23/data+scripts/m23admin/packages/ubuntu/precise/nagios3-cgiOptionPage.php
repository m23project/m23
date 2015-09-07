<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nagios3-cgi");

$elem["nagios3/httpd"]["type"]="multiselect";
$elem["nagios3/httpd"]["description"]="Apache servers to configure for nagios3:
 Please select which apache servers should be configured for nagios3.
 .
 If you would prefer to perform configuration manually, leave all
 servers unselected.
";
$elem["nagios3/httpd"]["descriptionde"]="Für nagios3 einzurichtende Apache-Server:
 Bitte wählen Sie, welche Apache-Server für nagios3 eingerichtet werden sollen.
 .
 Falls Sie es vorziehen, die Einrichtung manuell durchzuführen, lassen Sie alle Server deselektiert.
";
$elem["nagios3/httpd"]["descriptionfr"]="Serveurs Apache à configurer pour Nagios3 :
 Veuillez choisir le(s) serveur(s) web à configurer pour Nagios3.
 .
 Si vous préférez configurer vous-même ce paquet, ne sélectionnez aucun serveur.
";
$elem["nagios3/httpd"]["default"]="apache2";
$elem["nagios3/adminpassword"]["type"]="password";
$elem["nagios3/adminpassword"]["description"]="Nagios web administration password:
 Please provide the password to be created with the \"nagiosadmin\" user.
 .
 This is the username and password you will use to log in to your nagios
 installation after configuration is complete.  If you do not provide
 a password, you will have to configure access to nagios yourself.
";
$elem["nagios3/adminpassword"]["descriptionde"]="Passwort für die Web-Administration von nagios:
 Bitte geben Sie das Passwort ein, das für den »nagiosadmin«-Benutzer festgelegt werden soll.
 .
 Dies sind Benutzername und Passwort, die Sie verwenden werden, sich bei Ihrer nagios-Installation anzumelden, nachdem deren Einrichtung beendet ist. Falls Sie kein Passwort eingeben, werden Sie den Zugang zu nagios selbst einrichten müssen.
";
$elem["nagios3/adminpassword"]["descriptionfr"]="Mot de passe pour l'administration web de Nagios :
 Veuillez fournir le mot de passe à utiliser avec l'utilisateur « nagiosadmin ».
 .
 Il s'agit du nom d'utilisateur et du mot de passe que vous utiliserez pour vous connecter à Nagios une fois que l'installation est terminée. Si vous ne fournissez pas de mot de passe, vous devrez configurer Nagios vous-même afin d'y accéder.
";
$elem["nagios3/adminpassword"]["default"]="";
$elem["nagios3/adminpassword-repeat"]["type"]="password";
$elem["nagios3/adminpassword-repeat"]["description"]="Password confirmation:
";
$elem["nagios3/adminpassword-repeat"]["descriptionde"]="Passwortbestätigung:
";
$elem["nagios3/adminpassword-repeat"]["descriptionfr"]="Confirmation du mot de passe :
";
$elem["nagios3/adminpassword-repeat"]["default"]="";
$elem["nagios3/adminpassword-mismatch"]["type"]="note";
$elem["nagios3/adminpassword-mismatch"]["description"]="The passwords do not match
";
$elem["nagios3/adminpassword-mismatch"]["descriptionde"]="Die Passwörter stimmen nicht überein.
";
$elem["nagios3/adminpassword-mismatch"]["descriptionfr"]="Mots de passe différents
";
$elem["nagios3/adminpassword-mismatch"]["default"]="";
$elem["nagios3/nagios1-in-apacheconf"]["type"]="boolean";
$elem["nagios3/nagios1-in-apacheconf"]["description"]="Enable support for nagios 1.x links in nagios3?
 Please choose whether the Apache configuration for nagios3 should
 provide compatibility with links from nagios 1.x.
 .
 If you select this option, the apache configuration used for nagios
 will include directives to support URLs from nagios 1.x.
 You should not choose this option if you still have nagios 1.x on your
 system, or unpredictable results may occur.
";
$elem["nagios3/nagios1-in-apacheconf"]["descriptionde"]="Unterstützung für nagios-1.x-Links in nagios3 freischalten?
 Bitte wählen Sie, ob die Apache-Konfiguration für nagios3 Kompatibilität mit Links von nagios 1.x zur Verfügung stellen soll.
 .
 Falls Sie diese Möglichkeit wählen, wird die Apache-Konfiguration für nagios Direktiven enthalten, um URLs von nagios 1.x zu unterstützen. Sie sollten diese Möglichkeit nicht wählen, falls noch nagios 1.x auf Ihrem System installiert ist. Dies könnte unvorhersehbare Ergebnisse liefern.
";
$elem["nagios3/nagios1-in-apacheconf"]["descriptionfr"]="Faut-il activer la gestion des liens de Nagios 1.x pour Nagios3 ?
 Veuillez choisir si la configuration d'Apache pour Nagios3 doit permettre la compatibilité avec les liens de Nagios 1.x.
 .
 En choisissant cette option, la configuration d'Apache pour Nagios contiendra des directives permettant la gestion d'URL depuis Nagios 1.x. Vous ne devriez pas choisir cette option si vous avez encore Nagios 1.x sur votre système, sinon vous risquez d'avoir des résultats inattendus.
";
$elem["nagios3/nagios1-in-apacheconf"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
