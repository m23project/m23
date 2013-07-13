<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("phamm-ldap");

$elem["phamm-ldap/init_base_ldap"]["type"]="boolean";
$elem["phamm-ldap/init_base_ldap"]["description"]="Create empty LDAP base for Phamm?
";
$elem["phamm-ldap/init_base_ldap"]["descriptionde"]="Soll eine leere LDAP-Basis für Phamm erstellt werden?
";
$elem["phamm-ldap/init_base_ldap"]["descriptionfr"]="Faut-il créer une base LDAP pour Phamm ?
";
$elem["phamm-ldap/init_base_ldap"]["default"]="false";
$elem["phamm-ldap/ldap-basedn"]["type"]="string";
$elem["phamm-ldap/ldap-basedn"]["description"]="Distinguished Name of the search base:
 Please enter the Distinguished Name (DN) of the LDAP search base. Many sites
 use the components of their domain names for this purpose. For example,
 the domain \"example.org\" would use \"dc=example,dc=org\".
";
$elem["phamm-ldap/ldap-basedn"]["descriptionde"]="»Distinguished Name« der Suchbasis:
 Bitte geben Sie den »Distinguished Name« (DN) der LDAP-Suchbasis ein. Viele Sites verwenden die Teile ihrer Domänennamen für diesen Zweck. Beispielsweise würde die Domäne »example.org« die Angabe »dc=example,dc=org« verwenden.
";
$elem["phamm-ldap/ldap-basedn"]["descriptionfr"]="Nom distinctif de base pour les recherches :
 Veuillez indiquer le nom distinctif (« Distinguished Name » : DN) de base pour les recherches LDAP. De nombreux sites utilisent les composants de leur nom de domaine à cet effet. Ainsi, le domaine « example.org » utilisera « dc=example,dc=org ».
";
$elem["phamm-ldap/ldap-basedn"]["default"]="dc=example,dc=org";
$elem["phamm-ldap/ldap-binddn"]["type"]="string";
$elem["phamm-ldap/ldap-binddn"]["description"]="Login DN for the LDAP server:
 Please enter the Distinguished Name of the account that will be used
 to log in to the LDAP server. If you use form-based authentication
 this will be the default login DN. In this case leaving it empty will
 prevent the creation of a default login DN.
";
$elem["phamm-ldap/ldap-binddn"]["descriptionde"]="Anmelde-DN für den LDAP-Server:
 Bitte geben Sie den »Distinguished Name« des Benutzerkontos ein, das zur Anmeldung beim LDAP-Server verwendet wird. Falls Sie eine Formular-basierte Authentisierung benutzen, wird dies der voreingestellte Anmelde-DN. Es wird kein voreingestellter Anmelde-DN erstellt, wenn Sie dieses Feld leer lassen.
";
$elem["phamm-ldap/ldap-binddn"]["descriptionfr"]="Nom distinctif de connexion au serveur LDAP :
 Veuillez indiquer le nom distinctif (« Distinguished Name » : DN) du compte qui sera utilisé pour la connexion au serveur LDAP. Si vous utilisez une authentification par formulaires, ce sera l'identifiant de connexion par défaut. Dans ce cas, le laisser vide permettra d'éviter la création d'un identifiant de connexion par défaut.
";
$elem["phamm-ldap/ldap-binddn"]["default"]="cn=manager,dc=example,dc=tld";
$elem["phamm-ldap/ldap-bindpw"]["type"]="password";
$elem["phamm-ldap/ldap-bindpw"]["description"]="Login password for the LDAP server:
 Please enter the password that will be used to log in to the LDAP server.
";
$elem["phamm-ldap/ldap-bindpw"]["descriptionde"]="Anmelde-Passwort für den LDAP-Server:
 Bitte geben Sie das Passwort ein, das für die Anmeldung beim LDAP-Server verwendet werden wird.
";
$elem["phamm-ldap/ldap-bindpw"]["descriptionfr"]="Mot de passe de connexion au serveur LDAP :
 Veuillez indiquer le mot de passe à utiliser pour la connexion au serveur LDAP.
";
$elem["phamm-ldap/ldap-bindpw"]["default"]="secret";
$elem["phamm-ldap/ldap-phammpw"]["type"]="password";
$elem["phamm-ldap/ldap-phammpw"]["description"]="Login password for the LDAP phamm user:
 Please enter the password for \"phamm user\" useful for binding with limited privileges.
";
$elem["phamm-ldap/ldap-phammpw"]["descriptionde"]="Anmelde-Passwort für den LDAP-Benutzer »phamm user«:
 Bitte geben Sie das Passwort für »phamm user« ein. Dies ist praktisch, um eine Anmeldung mit eingeschränkten Rechten durchzuführen.
";
$elem["phamm-ldap/ldap-phammpw"]["descriptionfr"]="Mot de passe de connexion LDAP avec privilèges limités :
 Veuillez indiquer le mot de passe à utiliser pour l'« utilisateur phamm », utile pour des connexions LDAP avec privilèges limités.
";
$elem["phamm-ldap/ldap-phammpw"]["default"]="secret";
PKG_OptionPageTail2($elem);
?>
