<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ejabberd");

$elem["ejabberd/hostname"]["type"]="string";
$elem["ejabberd/hostname"]["description"]="The name of the host ejabberd will serve:
 Please enter the hostname of your Jabber server (in lowercase).
";
$elem["ejabberd/hostname"]["descriptionde"]="Der Name Ihres Ejabberd-Servers:
 Geben Sie bitte (in Kleinbuchstaben) den Namen Ihres Jabberservers an.
";
$elem["ejabberd/hostname"]["descriptionfr"]="Nom d'hôte du serveur ejabberd :
 Veuillez indiquer le nom d'hôte (en minuscule) du serveur Jabber.
";
$elem["ejabberd/hostname"]["default"]="localhost";
$elem["ejabberd/user"]["type"]="string";
$elem["ejabberd/user"]["description"]="The username of an admin account for ejabberd:
 Please provide the name of an account to administrate the ejabberd server.
 After the installation of ejabberd you can use this account to log in with any
 Jabber client to do administrative tasks or go to
 http://${hostname}:5280/admin/ and log in with this account to enter the admin
 interface. Enter the username part here (e.g. ${user}), but use the full Jabber
 ID (e.g. ${user}@${hostname}) to log into ejabberd web interface; otherwise it
 will fail.
 .
 Leave empty if you don't want to create an admin account automatically.
";
$elem["ejabberd/user"]["descriptionde"]="Der Benutzername eines administrativen Kontos für Ejabberd:
 Geben Sie bitte den Namen für ein Konto an, dass den Ejabberd-Server verwalten kann. Nach der Installation können Sie mit Hilfe dieses Kontos und eines beliebigen Jabber-Clients Verwaltungsaufgaben durchführen oder sich unter http://{hostname}:5280/admin/ an der Administratorschnittstelle anmelden. Geben Sie hier den Benutzernamen-Anteil ein (z.B. ${user}), verwenden Sie aber die komplette Jabber-ID (z.B. ${user}@${hostname}) um sich an der Ejabberd-Webschnittstelle anzumelden, da ansonsten die Anmeldung nicht funktionieren wird.
 .
 Lassen Sie das Feld leer, um kein privilegiertes Konto anzulegen.
";
$elem["ejabberd/user"]["descriptionfr"]="Identifiant du compte administrateur d'ejabberd :
 Veuillez indiquer un identifiant afin d'administrer le serveur ejabberd. Après l'installation, vous pourrez utilisez cette identité pour vous connecter avec tout client Jabber ou l'interface d'administration sur http://${hostname}:5280/admin/ pour réaliser des tâches administratives. Veuillez seulement entrer ici l'identifiant (par exemple, « ${user} »), cependant vous devrez utiliser une identité Jabber complète (par exemple, « ${user}@${hostname} ») pour vous connecter à l'interface web.
 .
 Veuillez laisser cette entrée vide si vous ne souhaitez pas créer de compte administrateur automatiquement.
";
$elem["ejabberd/user"]["default"]="";
$elem["ejabberd/password"]["type"]="password";
$elem["ejabberd/password"]["description"]="The password for the admin account:
 Please enter the password for the administrative user.
";
$elem["ejabberd/password"]["descriptionde"]="Das Kennwort für das Administratorkonto:
 Geben Sie das Kennwort für den Administrator an.
";
$elem["ejabberd/password"]["descriptionfr"]="Mot de passe du compte administrateur :
 Veuillez entrer le mot de passe de l'utilisateur administrateur.
";
$elem["ejabberd/password"]["default"]="";
$elem["ejabberd/verify"]["type"]="password";
$elem["ejabberd/verify"]["description"]="The password for the admin account again for verification:
 Please reenter the password for the administrative user for verification.
";
$elem["ejabberd/verify"]["descriptionde"]="Wiederholen Sie das Passwort zur Vermeidung von Fehleingaben:
 Bitte geben Sie noch einmal das Passwort ein.
";
$elem["ejabberd/verify"]["descriptionfr"]="Mot de passe du compte administrateur :
 Veuillez indiquer de nouveau le mot de passe de l'utilisateur administrateur pour vérification.
";
$elem["ejabberd/verify"]["default"]="";
$elem["ejabberd/nomatch"]["type"]="error";
$elem["ejabberd/nomatch"]["description"]="The passwords do not match!
 The passwords you have typed do not match. Please try again.
";
$elem["ejabberd/nomatch"]["descriptionde"]="Die Kennwörter waren nicht identisch!
 Die Kennwörter waren nicht identisch, bitte versuchen Sie es noch einmal.
";
$elem["ejabberd/nomatch"]["descriptionfr"]="Mots de passe différents
 Les mots de passe saisis ne correspondent pas. Veuillez recommencer.
";
$elem["ejabberd/nomatch"]["default"]="";
PKG_OptionPageTail2($elem);
?>
