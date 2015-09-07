<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("phamm");

$elem["phamm/ldap-server"]["type"]="string";
$elem["phamm/ldap-server"]["description"]="LDAP server host:
 Please enter the host name or IP address of the LDAP server that
 Phamm should connect to.
";
$elem["phamm/ldap-server"]["descriptionde"]="LDAP-Server-Host:
 Bitte geben Sie den Hostnamen oder die IP-Adresse des LDAP-Servers ein, zu dem Phamm eine Verbindung aufbauen soll.
";
$elem["phamm/ldap-server"]["descriptionfr"]="Serveur LDAP :
 Veuillez indiquer le nom d'hôte ou l'adresse IP du serveur LDAP qui sera utilisé par Phamm.
";
$elem["phamm/ldap-server"]["default"]="127.0.0.1";
$elem["phamm/ldap-basedn"]["type"]="string";
$elem["phamm/ldap-basedn"]["description"]="Distinguished Name of the search base:
 Please enter the Distinguished Name (DN) of the LDAP search base. Many sites
 use the components of their domain names for this purpose. For example,
 the domain \"example.org\" would use \"dc=example,dc=org\".
";
$elem["phamm/ldap-basedn"]["descriptionde"]="»Distinguished Name« der Suchbasis:
 Bitte geben Sie den »Distinguished Name« (DN) der LDAP-Suchbasis ein. Viele Sites verwenden die Teile ihrer Domänennamen für diesen Zweck. Beispielsweise würde die Domäne »example.org« die Angabe »dc=example,dc=org« verwenden.
";
$elem["phamm/ldap-basedn"]["descriptionfr"]="Nom distinctif de base pour les recherches :
 Veuillez indiquer le nom distinctif (« Distinguished Name » : DN) de base pour les recherches LDAP. De nombreux sites utilisent les composants de leur nom de domaine à cet effet. Ainsi, le domaine « example.org » utilisera « dc=example,dc=org ».
";
$elem["phamm/ldap-basedn"]["default"]="dc=example,dc=org";
$elem["phamm/ldap-binddn"]["type"]="string";
$elem["phamm/ldap-binddn"]["description"]="Login DN for the LDAP server:
 Please enter the Distinguished Name of the account that will be used
 to log in to the LDAP server. If you use form-based authentication
 this will be the default login DN. In this case leaving it empty will
 prevent the creation of a default login DN.
";
$elem["phamm/ldap-binddn"]["descriptionde"]="Anmelde-DN für den LDAP-Server:
 Bitte geben Sie den »Distinguished Name« des Benutzerkontos ein, das zur Anmeldung beim LDAP-Server verwendet wird. Falls Sie eine Formular-basierte Authentisierung benutzen, wird dies der voreingestellte Anmelde-DN. Es wird kein voreingestellter Anmelde-DN erstellt, wenn Sie dieses Feld leer lassen.
";
$elem["phamm/ldap-binddn"]["descriptionfr"]="Nom distinctif de connexion au serveur LDAP :
 Veuillez indiquer le nom distinctif (« Distinguished Name » : DN) du compte qui sera utilisé pour la connexion au serveur LDAP. Si vous utilisez une authentification par formulaires, ce sera l'identifiant de connexion par défaut. Dans ce cas, le laisser vide permettra d'éviter la création d'un identifiant de connexion par défaut.
";
$elem["phamm/ldap-binddn"]["default"]="cn=manager,dc=example,dc=tld";
$elem["phamm/reconfigure-webserver"]["type"]="multiselect";
$elem["phamm/reconfigure-webserver"]["choices"][1]="apache";
$elem["phamm/reconfigure-webserver"]["choices"][2]="apache-ssl";
$elem["phamm/reconfigure-webserver"]["choices"][3]="apache-perl";
$elem["phamm/reconfigure-webserver"]["description"]="Web server to reconfigure automatically:
 Phamm supports any web server that PHP does, but this automatic
 configuration process only supports Apache.
";
$elem["phamm/reconfigure-webserver"]["descriptionde"]="Webserver, der automatisch rekonfiguriert werden soll:
 Phamm unterstützt jeden Webserver, der von PHP unterstützt wird, aber die automatische Konfiguration kann nur für Apache durchgeführt werden.
";
$elem["phamm/reconfigure-webserver"]["descriptionfr"]="Serveur web à reconfigurer automatiquement :
 Phamm gère tous les serveurs web gérés par PHP, mais seul Apache peut être configuré automatiquement.
";
$elem["phamm/reconfigure-webserver"]["default"]="apache, apache-ssl, apache-perl, apache2";
$elem["phamm/restart-webserver"]["type"]="boolean";
$elem["phamm/restart-webserver"]["description"]="Restart the webserver(s)?
 In order to apply the changes, the webserver(s) must be restarted.
";
$elem["phamm/restart-webserver"]["descriptionde"]="Den/die Webserver neu starten?
 Um die Änderungen wirksam werden zu lassen, muss ein Neustart des/der Webserver(s) durchgeführt werden.
";
$elem["phamm/restart-webserver"]["descriptionfr"]="Faut-il redémarrer le(s) serveur(s) web ?
 Afin de prendre en compte les modifications, il est nécessaire de redémarrer le(s) serveur(s).
";
$elem["phamm/restart-webserver"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
