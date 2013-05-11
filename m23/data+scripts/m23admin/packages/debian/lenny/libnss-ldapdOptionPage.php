<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libnss-ldapd");

$elem["libnss-ldapd/ldap-uris"]["type"]="string";
$elem["libnss-ldapd/ldap-uris"]["description"]="LDAP server Uniform Resource Identifier:
 Please enter the URI of the LDAP server used. This is a string in the form
 ldap://<hostname or IP>:<port>/ . ldaps:// or ldapi:// can also be used. The
 port number is optional.
 .
 When useing the ldap or ldaps schemes it is usually a good idea to use an IP
 address; this reduces the risk of failure when name services are unavailable.
 .
 Multiple URIs can be be specified by separating them with spaces.
";
$elem["libnss-ldapd/ldap-uris"]["descriptionde"]="URI (Uniform Resource Identifier) des LDAP-Servers:
 Bitte geben Sie den URI des benutzten LDAP-Servers ein. Das ist eine Zeichenkette der Form »ldap://<Rechnername oder IP-Adresse>:<Port>/«. »ldaps://« oder »ldapi://« können auch vorkommen. Der Port muss nicht angegeben werden.
 .
 Wenn Sie »ldap« oder »ldaps« verwenden, sollten Sie eine IP-Adresse eingeben; das verringert das Ausfallrisiko, falls die Namensauflösung einmal nicht verfügbar ist.
 .
 Mehrere URIs können, durch Leerzeichen getrennt, eingegeben werden.
";
$elem["libnss-ldapd/ldap-uris"]["descriptionfr"]="Adresse du serveur LDAP :
 Veuillez indiquer l'adresse du serveur LDAP à utiliser. Il s'agit d'une chaîne de la forme « ldap://<nom de machine ou IP>:<port>/ ». Des adresses sous la forme « ldaps:// » et « ldapi:// » peuvent aussi être utilisées. Le numéro de port est facultatif.
 .
 Lorsque le protocole utilisé est « ldap » ou « ldaps », il est recommandé d'utiliser une adresse IP plutôt qu'un nom d'hôte ; les risques d'échec sont réduits en cas d'indisponibilité du service de noms.
 .
 Des adresses multiples peuvent être indiquées, séparées par des espaces.
";
$elem["libnss-ldapd/ldap-uris"]["default"]="";
$elem["libnss-ldapd/ldap-base"]["type"]="string";
$elem["libnss-ldapd/ldap-base"]["description"]="LDAP server search base:
 Please enter the distinguished name of the LDAP search base.  Many sites
 use the components of their domain names for this purpose.  For example,
 the domain \"example.net\" would use \"dc=example,dc=net\" as the
 distinguished name of the search base.
";
$elem["libnss-ldapd/ldap-base"]["descriptionde"]="Suchbasis des LDAP-Servers:
 Bitte geben Sie den DN (distinguished name) der LDAP-Suchbasis ein. Oft werden Teile des Domänennamens für diesen Zweck benutzt. Beispielsweise würde bei der Domäne »example.net« als den DN der Suchbasis »dc=example,dc=net« verwendet werden.
";
$elem["libnss-ldapd/ldap-base"]["descriptionfr"]="Base de recherche du serveur LDAP :
 Veuillez indiquer le nom distingué (« DN ») de la base de recherche du serveur LDAP. Beaucoup de sites utilisent les éléments composant leur nom de domaine à cette fin. Par exemple, le domaine « exemple.net » utiliserait « dc=exemple,dc=net ».
";
$elem["libnss-ldapd/ldap-base"]["default"]="";
$elem["libnss-ldapd/ldap-binddn"]["type"]="string";
$elem["libnss-ldapd/ldap-binddn"]["description"]="LDAP database user:
 If the LDAP database requires a login for normal lookups, enter
 the name of the account that will be used here. Leave empty
 otherwise.
 .
 This value should be specified as a DN (distinguished name).
";
$elem["libnss-ldapd/ldap-binddn"]["descriptionde"]="LDAP-Datenbank-Benutzer:
 Wenn die LDAP-Datenbank für normale Anfragen eine Authentifizierung verlangt, geben Sie hier den Benutzernamen ein, der dafür verwendet werden soll. Andernfalls lassen Sie das Feld leer.
 .
 Dieser Wert sollte als ein DN (distinguished name) eingegeben werden.
";
$elem["libnss-ldapd/ldap-binddn"]["descriptionfr"]="Utilisateur de la base LDAP :
 Si le serveur LDAP nécessite un identifiant pour les recherches ordinaires, veuillez indiquer le compte qui doit être utilisé. N'indiquez rien dans le cas contraire.
 .
 Cette valeur doit être un nom distingué (« DN »).
";
$elem["libnss-ldapd/ldap-binddn"]["default"]="";
$elem["libnss-ldapd/ldap-bindpw"]["type"]="password";
$elem["libnss-ldapd/ldap-bindpw"]["description"]="LDAP user password:
 Enter the password that will be used to log in to the LDAP database.
";
$elem["libnss-ldapd/ldap-bindpw"]["descriptionde"]="Passwort des LDAP-Benutzers:
 Geben Sie das Passwort für die Anmeldung an der LDAP-Datenbank ein.
";
$elem["libnss-ldapd/ldap-bindpw"]["descriptionfr"]="Mot de passe de l'utilisateur LDAP :
 Veuillez indiquer le mot de passe à utiliser pour s'identifier sur la base LDAP.
";
$elem["libnss-ldapd/ldap-bindpw"]["default"]="";
$elem["libnss-ldapd/nsswitch"]["type"]="multiselect";
$elem["libnss-ldapd/nsswitch"]["choices"][1]="aliases";
$elem["libnss-ldapd/nsswitch"]["choices"][2]="ethers";
$elem["libnss-ldapd/nsswitch"]["choices"][3]="group";
$elem["libnss-ldapd/nsswitch"]["choices"][4]="hosts";
$elem["libnss-ldapd/nsswitch"]["choices"][5]="netgroup";
$elem["libnss-ldapd/nsswitch"]["choices"][6]="networks";
$elem["libnss-ldapd/nsswitch"]["choices"][7]="passwd";
$elem["libnss-ldapd/nsswitch"]["choices"][8]="protocols";
$elem["libnss-ldapd/nsswitch"]["choices"][9]="rpc";
$elem["libnss-ldapd/nsswitch"]["choices"][10]="services";
$elem["libnss-ldapd/nsswitch"]["description"]="Name services to configure:
 For this package to work, you need to modify your /etc/nsswitch.conf to
 use the ldap datasource.
 .
 You can select the services that should be enabled or disabled
 for LDAP lookups. The new LDAP lookups will be added as last option.
 Be sure to review these changes.
";
$elem["libnss-ldapd/nsswitch"]["descriptionde"]="Namensauflösungsdienste, die eingerichtet werden sollen:
 Damit dieses Paket funktionieren kann, muss die Datei /etc/nsswitch.conf verändert werden, damit die LDAP-Datenquelle verwendet wird.
 .
 Sie können die Dienste auswählen, für die LDAP-Anfragen (nicht) zugelassen werden. Die neuen LDAP-Anfragen werden als letzte Möglichkeit angefügt. Kontrollieren Sie unbedingt die Änderungen.
";
$elem["libnss-ldapd/nsswitch"]["descriptionfr"]="Services de nom à configurer :
 Le fichier /etc/nsswitch.conf doit être modifié pour rendre ce paquet fonctionnel.
 .
 Vous pouvez aussi choisir les services qui doivent être activés ou désactivés pour les requêtes LDAP. Les nouvelles requêtes LDAP seront ajoutées comme dernière option. Il est important de bien contrôler ces modifications.
";
$elem["libnss-ldapd/nsswitch"]["default"]="";
PKG_OptionPageTail2($elem);
?>
