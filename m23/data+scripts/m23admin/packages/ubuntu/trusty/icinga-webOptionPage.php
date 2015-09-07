<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("icinga-web");

$elem["icinga-web/rootpassword"]["type"]="password";
$elem["icinga-web/rootpassword"]["description"]="Icinga new web administrative password:
 Please provide the password for the user \"root\" in Icinga's web interface.
 .
 This is the password you need to access the web interface with the
 default administrative user. After login, you will be able
 to create new users and set their permissions.
";
$elem["icinga-web/rootpassword"]["descriptionde"]="Neues Passwort für die Web-Administration von Icinga:
 Bitte geben Sie das Passwort für den Benutzer »root« für die Icinga-Web-Schnittstelle an.
 .
 Sie benötigen dieses Passwort, um mit dem Standard-Administratorkonto auf die Web-Schnittstelle zuzugreifen. Nachdem Sie sich angemeldet haben, können Sie neue Benutzer anlegen und deren Rechte festlegen.
";
$elem["icinga-web/rootpassword"]["descriptionfr"]="Mot de passe de l'administrateur web d'Icinga :
 Veuillez indiquez un mot de passe pour l'utilisateur « root » de l'interface web d'Icinga.
 .
 Ce mot de passe permet à l'administrateur par défaut de se connecter à l'interface web. Après la connexion, vous pourrez créer des nouveaux utilisateurs et régler les autorisations.
";
$elem["icinga-web/rootpassword"]["default"]="";
$elem["icinga-web/rootpassword-repeat"]["type"]="password";
$elem["icinga-web/rootpassword-repeat"]["description"]="Re-enter password to verify:
 Please enter the same root password again to verify that you have typed it
 correctly.
";
$elem["icinga-web/rootpassword-repeat"]["descriptionde"]="Passwort zur Überprüfung wiederholen:
 Bitte geben Sie dasselbe Root-Passwort noch einmal ein, um sicherzustellen, dass Sie sich nicht vertippt haben.
";
$elem["icinga-web/rootpassword-repeat"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez entrer à nouveau le mot de passe du superutilisateur afin de vérifier qu'il a été saisi correctement.
";
$elem["icinga-web/rootpassword-repeat"]["default"]="";
$elem["icinga-web/rootpassword-mismatch"]["type"]="error";
$elem["icinga-web/rootpassword-mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["icinga-web/rootpassword-mismatch"]["descriptionde"]="Fehler bei der Passworteingabe
 Die beiden von Ihnen eingegebenen Passwörter sind nicht gleich. Versuchen Sie es noch einmal.
";
$elem["icinga-web/rootpassword-mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe que vous avez entrés sont différents. Veuillez recommencer.
";
$elem["icinga-web/rootpassword-mismatch"]["default"]="";
PKG_OptionPageTail2($elem);
?>
