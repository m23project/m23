<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("liblemonldap-ng-conf-perl");

$elem["liblemonldap-ng-conf-perl/ldapServer"]["type"]="string";
$elem["liblemonldap-ng-conf-perl/ldapServer"]["description"]="LDAP server:
 Set here name or IP address of the LDAP server that has to be used by
 Lemonldap::NG.
 You can modify this value later using the Lemonldap::NG manager.
";
$elem["liblemonldap-ng-conf-perl/ldapServer"]["descriptionde"]="LDAP-Server:
 Setzen Sie hier den Namen oder die IP-Adresse des LDAP-Servers, der von Lemonldap::NG verwendet werden muss. Sie können diesen Wert später mit dem Lemonldap::NG-Manager verändern.
";
$elem["liblemonldap-ng-conf-perl/ldapServer"]["descriptionfr"]="Serveur LDAP:
 Indiquez ici le nom ou l'adresse IP du serveur LDAP que Lemonldap::NG utilisera. Vous pourrez modifier cette valeur ultérieurement dans le gestionnaire Lemonldap::NG.
";
$elem["liblemonldap-ng-conf-perl/ldapServer"]["default"]="localhost";
$elem["liblemonldap-ng-conf-perl/domain"]["type"]="string";
$elem["liblemonldap-ng-conf-perl/domain"]["description"]="Lemonldap::NG DNS domain:
 Set here the main domain protected by Lemonldap::NG.
 You can modify this value later using the Lemonldap::NG manager.
";
$elem["liblemonldap-ng-conf-perl/domain"]["descriptionde"]="Lemonldap::NG DNS-Domäne:
 Setzen Sie hier die Hauptdomäne, die von Lemonldap::NG geschützt wird. Sie können diesen Wert später mit dem Lemonldap::NG-Manager verändern.
";
$elem["liblemonldap-ng-conf-perl/domain"]["descriptionfr"]="Domaine DNS de Lemonldap::NG:
 Indiquez ici le domaine principal protégé par lemonldap::NG. Vous pourrez modifier cette valeur ultérieurement dans le gestionnaire Lemonldap::NG.
";
$elem["liblemonldap-ng-conf-perl/domain"]["default"]="example.com";
$elem["liblemonldap-ng-conf-perl/portal"]["type"]="string";
$elem["liblemonldap-ng-conf-perl/portal"]["description"]="Lemonldap::NG portal:
 Set here the Lemonldap::NG portal URL.
 You can modify this value later using the Lemonldap::NG manager.
";
$elem["liblemonldap-ng-conf-perl/portal"]["descriptionde"]="Lemonldap::NG-Portal:
 Setzen Sie hier die Portal-URL von Lemonldap::NG. Sie können diesen Wert später mit dem Lemonldap::NG-Manager verändern.
";
$elem["liblemonldap-ng-conf-perl/portal"]["descriptionfr"]="Portail Lemonldap::NG:
 Indiquez ici l'URL du portail Lemonldap::NG. Vous pourrez modifier cette valeur ultérieurement dans le gestionnaire Lemonldap::NG.
";
$elem["liblemonldap-ng-conf-perl/portal"]["default"]="http://auth.example.com/";
$elem["liblemonldap-ng-conf-perl/ldapPort"]["type"]="string";
$elem["liblemonldap-ng-conf-perl/ldapPort"]["description"]="LDAP server port:
 Set here the port used by the LDAP server.
 You can modify this value later using the Lemonldap::NG manager.
";
$elem["liblemonldap-ng-conf-perl/ldapPort"]["descriptionde"]="Port des LDAP-Servers:
 Setzen Sie hier den Port des LDAP-Servers. Sie können diesen Wert später mit dem Lemonldap::NG-Manager verändern.
";
$elem["liblemonldap-ng-conf-perl/ldapPort"]["descriptionfr"]="Port du serveur LDAP:
 Indiquez ici le numéro du port du serveur LDAP. Vous pourrez modifier cettevaleur ultérieurement dans le gestionnaire Lemonldap::NG.
";
$elem["liblemonldap-ng-conf-perl/ldapPort"]["default"]="389";
$elem["liblemonldap-ng-conf-perl/ldapBase"]["type"]="string";
$elem["liblemonldap-ng-conf-perl/ldapBase"]["description"]="LDAP search base:
 Set here the search base to use in LDAP queries.
 You can modify this value later using the Lemonldap::NG manager.
";
$elem["liblemonldap-ng-conf-perl/ldapBase"]["descriptionde"]="LDAP-Suchbasis:
 Setzen Sie hier die Suchbasis für LDAP-Abfragen. Sie können diesen Wert später mit dem Lemonldap::NG-Manager verändern.
";
$elem["liblemonldap-ng-conf-perl/ldapBase"]["descriptionfr"]="Base de recherche LDAP:
 Indiquez ici la base de recherche des requêtes LDAP. Vous pourrez modifier cette valeur ultérieurement dans le gestionnaire Lemonldap::NG.
";
$elem["liblemonldap-ng-conf-perl/ldapBase"]["default"]="dc=example,dc=com";
$elem["liblemonldap-ng-conf-perl/managerDn"]["type"]="string";
$elem["liblemonldap-ng-conf-perl/managerDn"]["description"]="LDAP account:
 Set here the account that Lemonldap::NG has to use for its LDAP requests.
 Leaving it blank causes Lemonldap::NG to use anonymous connections.
 You can modify this value later using the Lemonldap::NG manager.
";
$elem["liblemonldap-ng-conf-perl/managerDn"]["descriptionde"]="LDAP-Konto:
 Setzen Sie hier das Konto, das Lemonldap::NG für seine LDAP-Suchbasis für LDAP-Anfragen verwenden muss. Bleibt dieses Feld leer, verwendet Lemonldap::NG anonyme Verbindungen. Sie können diesen Wert später mit dem Lemonldap::NG-Manager verändern.
";
$elem["liblemonldap-ng-conf-perl/managerDn"]["descriptionfr"]="Compte LDAP:
 Indiquez ici le compte que Lemonldap::NG doit utiliser pour ses requêtes LDAP. Laissez le champ vide pour utiliser des connexions anonymes. Vous pourrez modifier cette valeur ultérieurement dans le gestionnaire Lemonldap::NG.
";
$elem["liblemonldap-ng-conf-perl/managerDn"]["default"]="";
$elem["liblemonldap-ng-conf-perl/managerPassword"]["type"]="string";
$elem["liblemonldap-ng-conf-perl/managerPassword"]["description"]="LDAP password:
 Set here the password for the Lemonldap::NG LDAP account.
 You can modify this value later using the Lemonldap::NG manager.
";
$elem["liblemonldap-ng-conf-perl/managerPassword"]["descriptionde"]="LDAP-Passwort:
 Setzen Sie hier das Passwort für das LDAP-Konto von Lemonldap::NG. Sie können diesen Wert später mit dem Lemonldap::NG-Manager verändern.
";
$elem["liblemonldap-ng-conf-perl/managerPassword"]["descriptionfr"]="Mot de passe LDAP:
 Indiquez ici le mot de passe du compte LDAP de Lemonldap::NG. Vous pourrez modifier cette valeur ultérieurement dans le gestionnaire Lemonldap::NG.
";
$elem["liblemonldap-ng-conf-perl/managerPassword"]["default"]="";
PKG_OptionPageTail2($elem);
?>
