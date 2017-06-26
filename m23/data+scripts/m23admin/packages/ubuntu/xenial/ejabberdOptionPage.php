<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ejabberd");

$elem["ejabberd/hostname"]["type"]="string";
$elem["ejabberd/hostname"]["description"]="Host name for this Jabber server:
 Please enter the host name of this Jabber server (lowercase).
";
$elem["ejabberd/hostname"]["descriptionde"]="Der Name für diesen Jabber-Server:
 Geben Sie bitte (in Kleinbuchstaben) den Namen dieses Jabber-Servers an.
";
$elem["ejabberd/hostname"]["descriptionfr"]="Nom d'hôte du serveur Jabber :
 Veuillez indiquer le nom d'hôte (en minuscules) du serveur Jabber.
";
$elem["ejabberd/hostname"]["default"]="localhost";
$elem["ejabberd/user"]["type"]="string";
$elem["ejabberd/user"]["description"]="Jabber server administrator username:
 Please provide the name of an account to administrate the ejabberd server.
 After the installation of ejabberd you can use this account to log in with any
 Jabber client to do administrative tasks or go to
 https://${hostname}:5280/admin/ and log in with this account to enter the admin
 interface.
 .
 You only need to enter the username part here (such as ${user}), but
 the full Jabber ID (such as ${user}@${hostname}) is required to
 access the ejabberd web interface.
 .
 Please leave this field empty if you don't want to create an
 administrator account automatically.
";
$elem["ejabberd/user"]["descriptionde"]="Benutzername des Jabber-Server-Administrators:
 Geben Sie bitte den Namen für ein Konto an, das den Ejabberd-Server verwalten kann. Nach der Installation können Sie mit Hilfe dieses Kontos und eines beliebigen Jabber-Clients Verwaltungsaufgaben durchführen oder sich unter https://${hostname}:5280/admin/ an der Administratorschnittstelle anmelden.
 .
 Sie müssen hier nur den Benutzernamen-Anteil (z.B. ${user}) eingeben, verwenden Sie aber die komplette Jabber-ID (z.B. ${user}@${hostname}), um sich an der Ejabberd-Webschnittstelle anzumelden.
 .
 Bitte lassen Sie dieses Feld leer, falls Sie kein privilegiertes Konto automatisch anlegen möchten.
";
$elem["ejabberd/user"]["descriptionfr"]="Identifiant de l'administrateur du serveur Jabber :
 Veuillez indiquer un identifiant afin d'administrer le serveur ejabberd. Après l'installation, vous pourrez utilisez cette identité pour vous connecter avec tout client Jabber ou l'interface d'administration sur https://${hostname}:5280/admin/ pour réaliser des tâches administratives.
 .
 Veuillez seulement entrer ici l'identifiant (par exemple, « ${user} »). Cependant, vous devrez utiliser une identité Jabber complète (par exemple, « ${user}@${hostname} ») pour vous connecter à l'interface web.
 .
 Veuillez laisser ce champ vide si vous ne souhaitez pas créer de compte administrateur automatiquement.
";
$elem["ejabberd/user"]["default"]="";
$elem["ejabberd/password"]["type"]="password";
$elem["ejabberd/password"]["description"]="Jabber server administrator password:
 Please enter the password for the administrative user.
";
$elem["ejabberd/password"]["descriptionde"]="Passwort des Jabber-Server-Administrators:
 Geben Sie das Passwort für den Administrator an.
";
$elem["ejabberd/password"]["descriptionfr"]="Mot de passe de l'administrateur du serveur Jabber :
 Veuillez choisir le mot de passe de l'utilisateur administrateur.
";
$elem["ejabberd/password"]["default"]="";
$elem["ejabberd/verify"]["type"]="password";
$elem["ejabberd/verify"]["description"]="Re-enter password to verify:
 Please enter the same administrator password again to verify that you have typed it
 correctly.
";
$elem["ejabberd/verify"]["descriptionde"]="Zur Kontrolle Passwort erneut eingeben:
 Bitte geben Sie das gleiche Administratorpasswort erneut ein, um sicherzustellen, dass Sie richtig getippt haben.
";
$elem["ejabberd/verify"]["descriptionfr"]="Entrez à nouveau le mot de passe pour vérification :
 Veuillez entrer à nouveau le mot de passe administrateur pour vérifier que  vous l'avez entré correctement.
";
$elem["ejabberd/verify"]["default"]="";
$elem["ejabberd/nomatch"]["type"]="error";
$elem["ejabberd/nomatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["ejabberd/nomatch"]["descriptionde"]="Passworteingabefehler
 Die zwei Passwörter waren nicht identisch, bitte versuchen Sie es noch einmal.
";
$elem["ejabberd/nomatch"]["descriptionfr"]="Erreur d'entrée du mot de passe
 Les mots de passe saisis ne correspondent pas. Veuillez recommencer.
";
$elem["ejabberd/nomatch"]["default"]="";
$elem["ejabberd/invaliduser"]["type"]="error";
$elem["ejabberd/invaliduser"]["description"]="Invalid administrator account username
 The username you have typed contains forbidden characters. Please respect the 
 JID syntax (http://tools.ietf.org/html/rfc6122#appendix-A.5). If you used
 a full JID (e.g. user@hostname), you have to use the same host name
 you typed into the host name configuration step.
";
$elem["ejabberd/invaliduser"]["descriptionde"]="Ungültiger Benutzername für administratives Konto
 Der von Ihnen eingegebene Benutzername enthält verbotene Zeichen. Bitte berücksichtigen Sie die JID-Syntax (http://tools.ietf.org/html/rfc6122#appendix-A.5). Falls Sie eine volle JID verwendet haben (z.B. Benuztzer@Rechnername), müssen Sie den gleichen Rechnernamen verwenden, den Sie auch im Konfigurationsschritt für den Rechnernamen eingegeben haben.
";
$elem["ejabberd/invaliduser"]["descriptionfr"]="Identifiant du compte administrateur non valable
 L'identifiant que vous avez entré contient des caractères interdits. Veuillez respecter la syntaxe de l'identité Jabber (JID)(http://tools.ietf.org/html/rfc6122#appendix-A.5). Si vous utilisez une identité Jabber complète (par exemple, user@hostname), vous devez utiliser le même nom d'hôte que vous avez entré lors de l'étape de configuration du nom d'hôte.
";
$elem["ejabberd/invaliduser"]["default"]="";
PKG_OptionPageTail2($elem);
?>
