<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lastfmsubmitd");

$elem["lastfmsubmitd/user"]["type"]="string";
$elem["lastfmsubmitd/user"]["description"]="User name of Last.fm account:
 This is the user name that will be used to log in to Last.fm.
";
$elem["lastfmsubmitd/user"]["descriptionde"]="Benutzername des Last.fm-Kontos:
 Dies ist der Benutzer, der zur Anmeldung bei Last.fm verwendet wird.
";
$elem["lastfmsubmitd/user"]["descriptionfr"]="Identifiant du compte Last.fm :
 Veuillez entrer l'identifiant qui permet de se connecter au compte Last.fm.
";
$elem["lastfmsubmitd/user"]["default"]="";
$elem["lastfmsubmitd/password"]["type"]="password";
$elem["lastfmsubmitd/password"]["description"]="Password for Last.fm account:
 This is the password that will be used to log in to Last.fm.
";
$elem["lastfmsubmitd/password"]["descriptionde"]="Passwort für das Last.fm-Konto:
 Dies ist das Passwort, das zur Anmeldung bei Last.fm verwendet wird.
";
$elem["lastfmsubmitd/password"]["descriptionfr"]="Veuillez entrer le mot de passe qui permet de se connecter au compte Last.fm :
 Mot de passe qui permet de se connecter au compte Last.fm.
";
$elem["lastfmsubmitd/password"]["default"]="";
$elem["lastfmsubmitd/spool_group"]["type"]="string";
$elem["lastfmsubmitd/spool_group"]["description"]="Group that may send submissions:
 All users in this group can send submissions to your Last.fm account. You may
 wish to use a specific usergroup, or \"audio\" for all users that can play music
 on this computer. If you use the default, \"lastfm\", you will need to add users
 manually, or run your plugin from this account.
 .
 If you leave this value blank, permissions will not be managed by debconf.
";
$elem["lastfmsubmitd/spool_group"]["descriptionde"]="Gruppe, die Beiträge senden darf:
 Alle Benutzer dieser Gruppe können Beiträge für Ihr Last.fm-Konto senden. Sie können eine spezielle Benutzergruppe verwenden, oder »audio« für alle Benutzer, die Musik auf diesem Computer abspielen können. Falls Sie die Standardeinstellung »lastfm« verwenden, müssen Sie die Benutzer manuell hinzufügen oder die Erweiterung von diesem Konto aus starten.
 .
 Falls Sie diesen Wert leer lasen, werden die Rechte nicht von Debconf verwaltet.
";
$elem["lastfmsubmitd/spool_group"]["descriptionfr"]="Groupe pouvant envoyer leurs propositions :
 Veuillez indiquer le groupe dont les membres peuvent envoyer leurs propositions à votre compte Last.fm. Vous devriez utiliser un groupe particulier ou le groupe « audio » pour tous les utilisateurs qui ont l'autorisation de jouer de la musique sur cette machine. Si vous utilisez la valeur par défaut « lastfm », vous devrez ajouter vous-même les utilisateurs ou exécuter le greffon depuis ce compte.
 .
 Si vous laissez ce champ vide, les permissions ne seront pas gérées automatiquement.
";
$elem["lastfmsubmitd/spool_group"]["default"]="lastfm";
$elem["lastfmsubmitd/no_lastmp"]["type"]="note";
$elem["lastfmsubmitd/no_lastmp"]["description"]="LastMP is no longer part of this package
 As of version 0.31-1, LastMP is provided in a separate package. This system
 previously had LastMP enabled; you will need to install the package \"lastmp\"
 if you wish to continue using it.
";
$elem["lastfmsubmitd/no_lastmp"]["descriptionde"]="LastMP ist nicht länger Bestandteil dieses Pakets
 Seit Version 0.31-1 wird LastMP durch ein separates Paket bereitgestellt. Dieses System hatte früher LastMP aktiviert; Sie müssen das Paket »lastmp« installieren, falls Sie es weiterhin benutzen möchten.
";
$elem["lastfmsubmitd/no_lastmp"]["descriptionfr"]="LastMP ne fait plus partie de ce paquet
 Depuis la version 0.31-1, LastMP se trouve dans un paquet séparé. Ce système avait auparavant LastMP activé. Il est nécessaire d'installer le paquet « lastmp » si vous désirez encore l'utiliser.
";
$elem["lastfmsubmitd/no_lastmp"]["default"]="";
PKG_OptionPageTail2($elem);
?>
