<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("liblemonldap-ng-common-perl");

$elem["liblemonldap-ng-common-perl/ldapServer"]["type"]="string";
$elem["liblemonldap-ng-common-perl/ldapServer"]["description"]="LDAP server:
 Set here name or IP address of the LDAP server that has to be used by
 Lemonldap::NG.
 You can modify this value later using the Lemonldap::NG manager.
";
$elem["liblemonldap-ng-common-perl/ldapServer"]["descriptionde"]="LDAP-Server:
 Setzen Sie hier den Namen oder die IP-Adresse des LDAP-Servers, der von Lemonldap::NG verwendet werden muss. Sie können diesen Wert später mit dem Lemonldap::NG-Manager verändern.
";
$elem["liblemonldap-ng-common-perl/ldapServer"]["descriptionfr"]="Serveur LDAP :
 Veuillez indiquer le nom ou l'adresse IP du serveur LDAP que Lemonldap::NG utilisera. Vous pourrez modifier cette valeur ultérieurement dans le gestionnaire de Lemonldap::NG.
";
$elem["liblemonldap-ng-common-perl/ldapServer"]["default"]="localhost";
$elem["liblemonldap-ng-common-perl/domain"]["type"]="string";
$elem["liblemonldap-ng-common-perl/domain"]["description"]="Lemonldap::NG DNS domain:
 Set here the main domain protected by Lemonldap::NG.
 You can modify this value later using the Lemonldap::NG manager.
";
$elem["liblemonldap-ng-common-perl/domain"]["descriptionde"]="Lemonldap::NG DNS-Domain:
 Setzen Sie hier die Haupt-Domain, die von Lemonldap::NG geschützt wird. Sie können diesen Wert später mit dem Lemonldap::NG-Manager verändern.
";
$elem["liblemonldap-ng-common-perl/domain"]["descriptionfr"]="Domaine DNS pour Lemonldap::NG :
 Veuillez indiquer le domaine principal protégé par lemonldap::NG. Vous pourrez modifier cette valeur ultérieurement dans le gestionnaire de Lemonldap::NG.
";
$elem["liblemonldap-ng-common-perl/domain"]["default"]="example.com";
$elem["liblemonldap-ng-common-perl/portal"]["type"]="string";
$elem["liblemonldap-ng-common-perl/portal"]["description"]="Lemonldap::NG portal:
 Set here the Lemonldap::NG portal URL.
 You can modify this value later using the Lemonldap::NG manager.
";
$elem["liblemonldap-ng-common-perl/portal"]["descriptionde"]="Lemonldap::NG-Portal:
 Setzen Sie hier die Portal-URL von Lemonldap::NG. Sie können diesen Wert später mit dem Lemonldap::NG-Manager verändern.
";
$elem["liblemonldap-ng-common-perl/portal"]["descriptionfr"]="Portail de Lemonldap::NG :
 Veuillez indiquer l'URL du portail de Lemonldap::NG. Vous pourrez modifier cette valeur ultérieurement dans le gestionnaire de Lemonldap::NG.
";
$elem["liblemonldap-ng-common-perl/portal"]["default"]="http://auth.example.com/";
$elem["liblemonldap-ng-common-perl/ldapPort"]["type"]="string";
$elem["liblemonldap-ng-common-perl/ldapPort"]["description"]="LDAP server port:
 Set here the port used by the LDAP server.
 You can modify this value later using the Lemonldap::NG manager.
";
$elem["liblemonldap-ng-common-perl/ldapPort"]["descriptionde"]="Port des LDAP-Servers:
 Setzen Sie hier den Port des LDAP-Servers. Sie können diesen Wert später mit dem Lemonldap::NG-Manager verändern.
";
$elem["liblemonldap-ng-common-perl/ldapPort"]["descriptionfr"]="Port du serveur LDAP :
 Veuillez indiquer le numéro du port du serveur LDAP. Vous pourrez modifier cette valeur ultérieurement dans le gestionnaire de Lemonldap::NG.
";
$elem["liblemonldap-ng-common-perl/ldapPort"]["default"]="389";
$elem["liblemonldap-ng-common-perl/ldapBase"]["type"]="string";
$elem["liblemonldap-ng-common-perl/ldapBase"]["description"]="LDAP search base:
 Set here the search base to use in LDAP queries.
 You can modify this value later using the Lemonldap::NG manager.
";
$elem["liblemonldap-ng-common-perl/ldapBase"]["descriptionde"]="LDAP-Suchbasis:
 Setzen Sie hier die Suchbasis für LDAP-Abfragen. Sie können diesen Wert später mit dem Lemonldap::NG-Manager verändern.
";
$elem["liblemonldap-ng-common-perl/ldapBase"]["descriptionfr"]="Base de recherche LDAP :
 Veuillez indiquer la base de recherche des requêtes LDAP. Vous pourrez modifier cette valeur ultérieurement dans le gestionnaire de Lemonldap::NG.
";
$elem["liblemonldap-ng-common-perl/ldapBase"]["default"]="dc=example,dc=com";
$elem["liblemonldap-ng-common-perl/managerDn"]["type"]="string";
$elem["liblemonldap-ng-common-perl/managerDn"]["description"]="LDAP account:
 Set here the account that Lemonldap::NG has to use for its LDAP requests.
 Leaving it blank causes Lemonldap::NG to use anonymous connections.
 You can modify this value later using the Lemonldap::NG manager.
";
$elem["liblemonldap-ng-common-perl/managerDn"]["descriptionde"]="LDAP-Konto:
 Setzen Sie hier das Konto, das Lemonldap::NG für seine LDAP-Anfragen verwenden muss. Bleibt dieses Feld leer, verwendet Lemonldap::NG anonyme Verbindungen. Sie können diesen Wert später mit dem Lemonldap::NG-Manager verändern.
";
$elem["liblemonldap-ng-common-perl/managerDn"]["descriptionfr"]="Identifiant de connexion LDAP :
 Veuillez indiquer l'identifiant que Lemonldap::NG utilisera pour les requêtes LDAP. Vous pouvez laisser ce champ vide pour utiliser des connexions anonymes. Vous pourrez modifier cette valeur ultérieurement dans le gestionnaire de Lemonldap::NG.
";
$elem["liblemonldap-ng-common-perl/managerDn"]["default"]="";
$elem["liblemonldap-ng-common-perl/managerPassword"]["type"]="string";
$elem["liblemonldap-ng-common-perl/managerPassword"]["description"]="LDAP password:
 Set here the password for the Lemonldap::NG LDAP account.
 You can modify this value later using the Lemonldap::NG manager.
";
$elem["liblemonldap-ng-common-perl/managerPassword"]["descriptionde"]="LDAP-Passwort:
 Setzen Sie hier das Passwort für das LDAP-Konto von Lemonldap::NG. Sie können diesen Wert später mit dem Lemonldap::NG-Manager verändern.
";
$elem["liblemonldap-ng-common-perl/managerPassword"]["descriptionfr"]="Mot de passe de connexion LDAP :
 Veuillez indiquer le mot de passe de l'identifiant de connexion LDAP pour Lemonldap::NG. Vous pourrez modifier cette valeur ultérieurement dans le gestionnaire de Lemonldap::NG.
";
$elem["liblemonldap-ng-common-perl/managerPassword"]["default"]="";
$elem["liblemonldap-ng-common-perl/migrate"]["type"]="boolean";
$elem["liblemonldap-ng-common-perl/migrate"]["description"]="Lemonldap::NG configuration files have changed, try to migrate your files?
";
$elem["liblemonldap-ng-common-perl/migrate"]["descriptionde"]="Lemonldap::NG-Konfigurationsdateien wurden geändert, soll versucht werden, die Dateien zu migrieren?
";
$elem["liblemonldap-ng-common-perl/migrate"]["descriptionfr"]="Faut-il tenter une migration des fichiers de configuration de Lemonldap::NG ?
";
$elem["liblemonldap-ng-common-perl/migrate"]["default"]="";
PKG_OptionPageTail2($elem);
?>
