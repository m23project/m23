<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openssh-server");

$elem["openssh-server/permit-root-login"]["type"]="boolean";
$elem["openssh-server/permit-root-login"]["description"]="Disable SSH password authentication for root?
 Previous versions of openssh-server permitted logging in as root over SSH
 using password authentication. The default for new installations is now
 \"PermitRootLogin prohibit-password\", which disables password authentication
 for root without breaking systems that have explicitly configured SSH
 public key authentication for root.
 .
 This change makes systems more secure against brute-force password
 dictionary attacks on the root user (a very common target for such
 attacks). However, it may break systems that are set up with the
 expectation of being able to SSH as root using password authentication. You
 should only make this change if you do not need to do that.
";
$elem["openssh-server/permit-root-login"]["descriptionde"]="SSH Passwort-Authentifizierung für »root« deaktivieren?
 Vorherige Versionen von openssh-server erlaubten das Anmelden als »root« über SSH unter Verwendung von Passwort-Authentifizierung. Die Standardeinstellung für Neuinstallationen lautet nun »PermitRootLogin prohibit-password«, wodurch die Passwort-Authentifizierung für »root« deaktiviert wird, und Systeme dennoch funktionsfähig bleiben, bei denen ausdrücklich die Authentifizierung als »root« mittels öffentlichem SSH-Schlüssel konfiguriert ist.
 .
 Diese Änderung sichert Systeme besser gegen jene Angriffe auf den Benutzer »root« (ein verbreitetes Ziel solcher Angriffe) ab, die das Passwort durch simples Ausprobieren aller Einträge von Wörterbüchern zu erraten versuchen. Sie kann allerdings dazu führen, dass Systeme nicht mehr funktionieren, die in der Absicht konfiguriert wurden, die Anmeldung als »root« über SSH unter Verwendung von Passwort-Authentifizierung zuzulassen. Sie sollten diese Änderung nur vornehmen, wenn Sie auf Letzteres verzichten können.
";
$elem["openssh-server/permit-root-login"]["descriptionfr"]="Désactiver l’authentification SSH par mot de passe pour le superutilisateur ?
 Les versions précédentes du paquet openssh-server autorisaient la connexion par SSH du superutilisateur (root) en utilisant l’authentification par mot de passe. Par défaut, les nouvelles installations ont maintenant l’option « PermitRootLogin prohibit-password », qui désactive l’authentification par mot de passe pour le compte « root », sans casser les systèmes qui ont configuré explicitement l’authentification SSH par clé publique pour ce compte.
 .
 Cette modification rend les systèmes plus robustes face aux attaques par force brute et par dictionnaire contre le superutilisateur (très souvent pris pour cible par ce type d’attaque). Cependant, cela peut rendre inutilisables les systèmes reposant sur la possibilité de se connecter au compte « root » par SSH avec authentification par mot de passe. Vous ne devriez appliquer cette modification que si ce n’est pas votre cas.
";
$elem["openssh-server/permit-root-login"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
