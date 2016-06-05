<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("biomaj-watcher");

$elem["biomaj/login"]["type"]="string";
$elem["biomaj/login"]["description"]="Login for administration interface of BioMAJ:
 Please enter the login to use when connecting to the
 web administration interface of BioMAJ.
";
$elem["biomaj/login"]["descriptionde"]="Anmeldename für die Verwaltungsschnittstelle von BioMAJ:
 Bitte geben Sie den Anmeldenamen an, der zur Verbindung mit der Web-Verwaltungsschnittstelle von BioMAJ benutzt wird.
";
$elem["biomaj/login"]["descriptionfr"]="Identifiant à utiliser avec à l'interface d'administration :
 Veuillez indiquer l'identifiant à utiliser pour la connexion à l'interface web d'administration de BioMAJ.
";
$elem["biomaj/login"]["default"]="admin";
$elem["biomaj/ldap"]["type"]="boolean";
$elem["biomaj/ldap"]["description"]="Configure LDAP authentication?
 Please choose whether LDAP authentication for BioMAJ should be
 set up now.
";
$elem["biomaj/ldap"]["descriptionde"]="LDAP-Authentifizierung konfigurieren?
 Bitte wählen Sie, ob jetzt LDAP-Authentifizierung für BioMAJ eingerichtet werden soll.
";
$elem["biomaj/ldap"]["descriptionfr"]="Faut-il configurer l'authentification LDAP ?
 Veuillez préciser si vous souhaitez configurer l'authentification LDAP pour BioMAJ.
";
$elem["biomaj/ldap"]["default"]="";
$elem["biomaj/ldap_server"]["type"]="string";
$elem["biomaj/ldap_server"]["description"]="LDAP server:
 Please enter the host name or IP address of the
 LDAP server to use for authentication.
";
$elem["biomaj/ldap_server"]["descriptionde"]="LDAP-Server:
 Bitte geben Sie den Rechnernamen oder die IP-Adresse des LDAP-Servers ein, der für die Authentifizierung verwandt werden soll.
";
$elem["biomaj/ldap_server"]["descriptionfr"]="Serveur LDAP :
 Veuillez indiquer le nom ou l'adresse IP du serveur LDAP à utiliser pour l'authentification.
";
$elem["biomaj/ldap_server"]["default"]="";
$elem["biomaj/ldap_dn"]["type"]="string";
$elem["biomaj/ldap_dn"]["description"]="LDAP DN:
 Please enter the Distinguished Name to use for
 LDAP authentication.
";
$elem["biomaj/ldap_dn"]["descriptionde"]="LDAP-DN:
 Bitte geben Sie den »Distinguished Name« ein, der für die LDAP-Authentifizierung verwandt werden soll.
";
$elem["biomaj/ldap_dn"]["descriptionfr"]="Identifiant LDAP à utiliser :
 Veuillez indiquer l'identifiant LDAP (DN : « Distinguished Name ») à utiliser.
";
$elem["biomaj/ldap_dn"]["default"]="";
$elem["biomaj/ldap_filter"]["type"]="string";
$elem["biomaj/ldap_filter"]["description"]="LDAP search filter:
 Please specify the LDAP search filter for biomaj-watcher. It can be
 left empty if no filter is required.
";
$elem["biomaj/ldap_filter"]["descriptionde"]="LDAP-Suchfilter:
 Bitte geben Sie den LDAP-Suchfilter für Biomaj-watcher ein. Er kann leer gelassen werden, falls kein Filter benötigt wird.
";
$elem["biomaj/ldap_filter"]["descriptionfr"]="Filtre de rechercher LDAP :
 Veuillez indiquer le filtre de recherche LDAP pour biomaj-watcher. Ce champ peut être laissé vide si aucun filtre n'est nécessaire.
";
$elem["biomaj/ldap_filter"]["default"]="";
PKG_OptionPageTail2($elem);
?>
