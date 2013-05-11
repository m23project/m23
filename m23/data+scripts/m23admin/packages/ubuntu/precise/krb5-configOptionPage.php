<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("krb5-config");

$elem["krb5-config/title"]["type"]="title";
$elem["krb5-config/title"]["description"]="Configuring Kerberos Authentication
";
$elem["krb5-config/title"]["descriptionde"]="Konfiguration der Kerberos-Authentisierung
";
$elem["krb5-config/title"]["descriptionfr"]="Configuration de l'authentification Kerberos
";
$elem["krb5-config/title"]["default"]="";
$elem["krb5-config/default_realm"]["type"]="string";
$elem["krb5-config/default_realm"]["description"]="Default Kerberos version 5 realm:
 When users attempt to use Kerberos and specify a principal or user name
 without specifying what administrative Kerberos realm that principal
 belongs to, the system appends the default realm.  The default realm
 may also be used as the realm of a Kerberos service running on the
 local machine.  Often, the default
 realm is the uppercase version of the local DNS domain.
";
$elem["krb5-config/default_realm"]["descriptionde"]="Voreingestellter Realm für Kerberos Version 5:
 Wenn Benutzer versuchen, Kerberos zu nutzen und einen Principal oder Benutzernamen angeben, ohne dabei festzulegen, zu welchem Kerberos-Administrationsbereich (Realm) dieser Principal gehört, dann fügt das System den voreingestellten Realm an. Der voreingestellte Realm kann auch als Realm eines Kerberos-Dienstes verwendet werden, der auf dem lokalen Rechner läuft. Der voreingestellte Realm ist die großgeschriebene Version der lokalen DNS-Domain.
";
$elem["krb5-config/default_realm"]["descriptionfr"]="Royaume (« realm ») Kerberos version 5 par défaut :
 Quand les utilisateurs tentent d'utiliser Kerberos et indiquent un principal ou un identifiant sans préciser à quel royaume (« realm ») administratif Kerberos ce principal est attaché, le système ajoute le royaume par défaut. Le royaume par défaut peut également être utilisé comme royaume d'un service Kerberos s'exécutant sur la machine locale. Il est d'usage que le royaume par défaut soit le nom de domaine DNS local en majuscules.
";
$elem["krb5-config/default_realm"]["default"]="";
$elem["krb5-config/read_conf"]["type"]="boolean";
$elem["krb5-config/read_conf"]["description"]="For internal use only
 We want to try and capture user changes when they edit a config file
 manually.  To do this, we look in the config script to read the file.
 However, in the case of preconfigure, the config script is run twice
 before the postinst is run.  Thus, we may read the wrong value before the
 edited value is written out in postinst.  If this is false, we skip
 reading config files until postinst runs.

";
$elem["krb5-config/read_conf"]["descriptionde"]="";
$elem["krb5-config/read_conf"]["descriptionfr"]="";
$elem["krb5-config/read_conf"]["default"]="true";
$elem["krb5-config/add_servers_realm"]["type"]="string";
$elem["krb5-config/add_servers_realm"]["description"]="for internal use

";
$elem["krb5-config/add_servers_realm"]["descriptionde"]="";
$elem["krb5-config/add_servers_realm"]["descriptionfr"]="";
$elem["krb5-config/add_servers_realm"]["default"]="";
$elem["krb5-config/add_servers"]["type"]="boolean";
$elem["krb5-config/add_servers"]["description"]="Add locations of default Kerberos servers to /etc/krb5.conf?
 Typically, clients find Kerberos servers for their default realm in
 the domain-name system. ${dns} 
";
$elem["krb5-config/add_servers"]["descriptionde"]="Die Standorte der voreingestellten Kerberos-Server zu /etc/krb5.conf hinzufügen?
 Typischerweise finden Clients die Kerberos-Server für ihren voreingestellten Realm im Domain-Namen-System. ${dns}
";
$elem["krb5-config/add_servers"]["descriptionfr"]="Ajouter les emplacements des serveurs Kerberos par défaut dans /etc/krb5.conf ?
 Habituellement, les clients recherchent les serveurs Kerberos de leur royaume par défaut en utilisant le système de nom de domaine. ${dns}
";
$elem["krb5-config/add_servers"]["default"]="false";
$elem["krb5-config/no_dns"]["type"]="text";
$elem["krb5-config/no_dns"]["description"]="short description unused
 However, the Kerberos servers for your realm do not appear to be
 listed either in the domain-name system or the kerberos configuration
 file shipped with Debian. You may add them to the Kerberos
 configuration file or add them to your DNS configuration.
";
$elem["krb5-config/no_dns"]["descriptionde"]="Kurzbeschreibung nicht verwendet
 Jedoch scheinen die Kerberos-Server für Ihren Realm weder im Domain-Namen-System noch in der Konfigurationsdatei für Kerberos, wie sie mit Debian installiert wurde, aufgeführt zu sein. Sie können sie zur Konfigurationsdatei von Kerberos oder zu Ihrer DNS-Konfiguration hinzufügen.
";
$elem["krb5-config/no_dns"]["descriptionfr"]="courte description inutilisée.
 Cependant, les serveurs Kerberos du royaume utilisé par cette machine ne semblent pas être référencés dans le système de nom de domaine ou dans le fichier de configuration Kerberos fourni avec Debian. Vous devriez les ajouter au fichier de configuration Kerberos ou dans le DNS.
";
$elem["krb5-config/no_dns"]["default"]="";
$elem["krb5-config/found_dns"]["type"]="text";
$elem["krb5-config/found_dns"]["description"]="short description unused
 Servers for your realm were found in DNS. For most configurations it
 is best to use DNS to find these servers so that if the set of
 servers for your realm changes, you need not reconfigure each machine
 in the realm. However, in special situations, you can locally
 configure the set of servers for your Kerberos realm.
";
$elem["krb5-config/found_dns"]["descriptionde"]="Kurzbeschreibung nicht verwendet
 Es wurden Server für Ihren Realm im DNS gefunden. Für die meisten Konfigurationen ist es am Besten, das DNS zum Auffinden dieser Server zu nutzen. Damit muss nicht jeder Rechner im Realm neu konfiguriert werden, falls sich die Server ändern. In besonderen Situationen können Sie jedoch die Server für Ihren Kerberos-Realm lokal konfigurieren.
";
$elem["krb5-config/found_dns"]["descriptionfr"]="courte description inutilisée.
 Les serveurs pour le royaume utilisé sur cette machine ont été trouvés dans le DNS. Il est le plus souvent préférable d'utiliser le DNS afin de ne pas avoir à reconfigurer les clients si les serveurs changent. Cependant, dans des situations particulières, il est possible d'indiquer localement quels sont les serveurs pour le royaume Kerberos.
";
$elem["krb5-config/found_dns"]["default"]="";
$elem["krb5-config/kerberos_servers"]["type"]="string";
$elem["krb5-config/kerberos_servers"]["description"]="Kerberos servers for your realm:
 Enter the hostnames of Kerberos servers in the ${realm} Kerberos realm
 separated by spaces.
";
$elem["krb5-config/kerberos_servers"]["descriptionde"]="Kerberos-Server für Ihren Realm:
 Geben Sie die Hostnamen von Kerberos-Servern im Kerberos-Realm ${realm} durch Leerzeichen getrennt ein.
";
$elem["krb5-config/kerberos_servers"]["descriptionfr"]="Serveurs Kerberos du royaume :
 Veuillez indiquer les noms d'hôtes des serveurs Kerberos dans le royaume Kerberos ${realm}, séparés par des espaces.
";
$elem["krb5-config/kerberos_servers"]["default"]="";
$elem["krb5-config/admin_server"]["type"]="string";
$elem["krb5-config/admin_server"]["description"]="Administrative server for your Kerberos realm:
 Enter the hostname of the administrative (password changing) server for
 the ${realm} Kerberos realm.
";
$elem["krb5-config/admin_server"]["descriptionde"]="Administrations-Server für Ihren Kerberos-Realm:
 Geben Sie den Hostnamen des Administrations-Servers (zur Änderung von Passwörtern) für den Kerberos-Realm ${realm} ein.
";
$elem["krb5-config/admin_server"]["descriptionfr"]="Serveur administratif du royaume Kerberos :
 Veuillez indiquer le nom d'hôte du serveur administratif (permettant les modifications de mot de passe) pour le royaume Kerberos ${realm}.
";
$elem["krb5-config/admin_server"]["default"]="";
PKG_OptionPageTail2($elem);
?>
