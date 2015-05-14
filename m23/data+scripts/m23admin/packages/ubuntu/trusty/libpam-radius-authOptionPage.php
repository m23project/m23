<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libpam-radius-auth");

$elem["libpam-radius-auth/fixperms"]["type"]="boolean";
$elem["libpam-radius-auth/fixperms"]["description"]="Fix erroneous file permissions
 Older versions of libpam-radius-auth installed the
 /etc/pam_radius_auth.conf file with incorrect permissions. Should these
 permissions be corrected? (I strongly recommend doing this.)
";
$elem["libpam-radius-auth/fixperms"]["descriptionde"]="Korrigiere fehlerhafte Datei-Zugriffsrechte
 Ältere Versionen von libpam-radius-auth installierten die Datei /etc/pam_radius_auth.conf mit inkorrekten Datei-Zugriffsrechten. Sollen diese Rechte korrigiert werden? (Es wird nachdrücklich dazu geraten.)
";
$elem["libpam-radius-auth/fixperms"]["descriptionfr"]="Faut-il corriger les autorisations ?
 Les autorisations du fichier /etc/pam_radius_auth.conf, installé par une ancienne version de libpam-radius-auth, ne sont pas correctes. Veuillez confirmer si vous souhaitez qu'elles soient corrigées (ce choix est recommandé).
";
$elem["libpam-radius-auth/fixperms"]["default"]="true";
$elem["libpam-radius-auth/permnote"]["type"]="note";
$elem["libpam-radius-auth/permnote"]["description"]="Possible information leak
 An older version of libpam-radius-auth installed the
 /etc/pam_radius_auth.conf file world-readable. This potentially allowed
 unauthorized parties to read the radius shared secret, which could permit
 various attacks against the radius authentication mechanism. The
 permissions have been corrected, but you should consider changing your
 radius shared secret.
";
$elem["libpam-radius-auth/permnote"]["descriptionde"]="Mögliches Informationsleck
 Eine ältere Version von libpam-radius-auth installierte die Datei /etc/pam_radius_auth.conf weltlesbar. Dies erlaubte möglicherweise nicht-autorisierten Personen das verteilte Geheimnis von Radius zu lesen, wodurch verschiedene Angriffe gegen den Authentisierungsmechanismus von Radius ermöglicht werden. Die Zugriffsrechte wurden korrigiert, aber Sie sollten überlegen, das verteilte Geheimnis von Radius zu ändern.
";
$elem["libpam-radius-auth/permnote"]["descriptionfr"]="Informations probablement manquantes
 Le fichier /etc/pam_radius_auth.conf, installé par une ancienne version de libpam-radius-auth, était accessible à tous les utilisateurs. La lecture du mot de passe, même chiffré, rend possible des attaques envers le protocole d'authentification. Les autorisations ont été corrigées mais vous devriez changer le mot de passe.
";
$elem["libpam-radius-auth/permnote"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
