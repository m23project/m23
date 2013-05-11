<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("krb4-config");

$elem["krb4-config/default_realm"]["type"]="string";
$elem["krb4-config/default_realm"]["description"]="Default Kerberos version 4 realm:
 When users attempt to use Kerberos and specify a principal or user name
 without specifying what administrative Kerberos realm that principal
 belongs to, the system appends the default realm.  Normally, the default
 realm is the uppercase version of the local DNS domain.
";
$elem["krb4-config/default_realm"]["descriptionde"]="Voreingestellter Realm von Kerberos Version 4:
 Wenn Benutzer versuchen, Kerberos zu nutzen, und sie geben einen Principal oder Benutzernamen an, ohne festzulegen, zu welchem Kerberos-Administrationsbereich (Realm) dieser Principal gehört, dann fügt das System den voreingestellten Realm an. Normalerweise ist der voreingestellte Realm die großgeschriebene Version der lokalen DNS-Domain.
";
$elem["krb4-config/default_realm"]["descriptionfr"]="Domaine Kerberos version 4 par défaut :
 Quand les utilisateurs tentent d'utiliser Kerberos et spécifient un principal ou un identifiant sans spécifier à quel domaine administratif Kerberos ce principal est attaché, le système ajoute le domaine par défaut. Normalement, le domaine par défaut est la version en lettres majuscules du domaine DNS local.
";
$elem["krb4-config/default_realm"]["default"]="";
$elem["krb4-config/read_conf"]["type"]="boolean";
$elem["krb4-config/read_conf"]["description"]="For internal use only
 We want to try and capture user changes when they edit a config file
 manually.  To do this, we look in the config script to read the file.
 However, in the case of preconfigure, the config script is run twice
 before the postinst is run.  Thus, we may read the wrong value before the
 edited value is written out in postinst.  If this is false, we skip
 reading config files until postinst runs.

";
$elem["krb4-config/read_conf"]["descriptionde"]="";
$elem["krb4-config/read_conf"]["descriptionfr"]="";
$elem["krb4-config/read_conf"]["default"]="true";
$elem["krb4-config/dns_for_default"]["type"]="boolean";
$elem["krb4-config/dns_for_default"]["description"]="Does DNS contain pointers to your realm's Kerberos Servers?
 Traditionally, new realms have been added to /etc/krb.conf so that
 clients can find the Kerberos servers for the realm.  Modern Kerberos
 implementations sometimes support looking this information up using DNS.
 If your default realm has DNS pointers, they will be used.  Otherwise, if
 your realm is not already in /etc/krb.conf, you will be asked for the
 Kerberos servers' hostnames so the realm can be added.
";
$elem["krb4-config/dns_for_default"]["descriptionde"]="Enthält das DNS Verweise zu den Kerberos-Servern Ihres Realm?
 Traditionell wurden neue Realms zu /etc/krb.conf hinzugefügt, so dass Clients die Kerberos-Server für den Realm finden können. Moderne Kerberos-Implementationen unterstützen es manchmal, diese Information vom DNS zu beziehen. Falls Ihr voreingestellter Realm DNS-Einträge hat, werden sie benutzt. Wenn anderenfalls Ihr Realm noch nicht in /etc/krb.conf verzeichnet ist, werden Sie nach dem Hostnamen der Kerberos-Server gefragt, damit der Realm hinzugefügt werden kann.
";
$elem["krb4-config/dns_for_default"]["descriptionfr"]="Le DNS contient-il des enregistrements pointant vers les domaines de vos serveurs Kerberos ?
 Habituellement, les nouveaux domaines sont ajoutés au fichier /etc/krb.conf afin que les clients puissent trouver les serveurs Kerberos pour ce domaine.  Les implémentations modernes de Kerberos peuvent parfois retrouver cette information en utilisant le service DNS. Si votre domaine par défaut possède des pointeurs DNS, ils seront utilisés.  Sinon, si votre domaine n'est pas encore dans le fichier /etc/krb.conf, les noms d'hôtes des serveurs Kerberos vous seront demandés afin que le domaine puisse être ajouté.
";
$elem["krb4-config/dns_for_default"]["default"]="false";
$elem["krb4-config/kerberos_servers"]["type"]="string";
$elem["krb4-config/kerberos_servers"]["description"]="Kerberos servers for your realm:
 Enter the hostnames of Kerberos version 4 servers in the ${realm} Kerberos
 realm, separated by spaces.
";
$elem["krb4-config/kerberos_servers"]["descriptionde"]="Kerberos-Server für Ihren Realm:
 Geben Sie die Hostnamen der Kerberos-Server der Version 4 in dem ${realm}-Kerberos-Realm durch Leerzeichen getrennt ein.
";
$elem["krb4-config/kerberos_servers"]["descriptionfr"]="Serveurs Kerberos pour votre domaine :
 Veuillez indiquer les noms d'hôtes des serveurs Kerberos version 4 dans le domaine ${realm} Kerberos, séparés par des espaces.
";
$elem["krb4-config/kerberos_servers"]["default"]="";
$elem["krb4-config/admin_server"]["type"]="string";
$elem["krb4-config/admin_server"]["description"]="Administrative server for your Kerberos realm:
 Enter the hostname of the administrative (password changing) server for
 the ${realm} Kerberos realm.
";
$elem["krb4-config/admin_server"]["descriptionde"]="Administrations-Server für Ihren Kerberos-Realm:
 Geben Sie den Hostnamen des Administrations-Servers (zur Änderung von Passwörtern) für den ${realm}-Kerberos-Realm ein.
";
$elem["krb4-config/admin_server"]["descriptionfr"]="Serveur administratif pour votre domaine Kerberos :
 Veuillez indiquer le nom d'hôte du serveur administratif (modification du mot de passe) pour le domaine ${realm} Kerberos.
";
$elem["krb4-config/admin_server"]["default"]="";
PKG_OptionPageTail2($elem);
?>
