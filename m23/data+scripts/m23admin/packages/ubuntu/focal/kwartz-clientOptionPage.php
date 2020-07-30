<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("kwartz-client");

$elem["kwartz/ldapuri"]["type"]="string";
$elem["kwartz/ldapuri"]["description"]="URI (\"Uniform Resource Identifier\") of the LDAP server:
 Please enter the URI of the LDAP server provided by your Kwartz machine.
 You can use a numeric IP address rather than a symbolic one, in order to
 minimize failure possibilities when the name service is down.
 .
 It is possible to specify multiple LDAP URIS, separated by spaces.
";
$elem["kwartz/ldapuri"]["descriptionde"]="URI (»Uniform Resource Identifier«) des LDAP servers:
 Bitte geben Sie die URI des durch Ihre Kwartz-Maschine bereitgestellten LDAP-Servers an. Nutzen Sie vorzugsweise die numerische IP-Adresse, wodurch es nicht zu einem Ausfall kommt, wenn der Namensserver nicht verfügbar ist.
 .
 Sie können mehrere, durch Leerzeichen getrennte LDAP-URIs angeben.
";
$elem["kwartz/ldapuri"]["descriptionfr"]="URI (« Uniform Resource Identifier ») du serveur LDAP :
 Veuillez déclarer l'URI du serveur LDAP founi par votre Kwartz. On peut
 utiliser une adresse IP numérique plutôt que symbolique, afin de minimiser
 le risque d'échec au cas où le serveur de noms ne répondrait pas.
 .
 On peut répondre par plusieurs URIs LDAP, séparées par des espaces.
";
$elem["kwartz/ldapuri"]["default"]="ldap://serveur.lycee.jb/";
$elem["kwartz/ldapbase"]["type"]="string";
$elem["kwartz/ldapbase"]["description"]="LDAP's Base DN (\"Distinguished Name\"):
 Please enter the DN (\"Distinguished Name\") used as the base of the LDAP
 service. Many systems use the elements of their domain name for this purpose.
 For example, the domain \"example.net\" would use \"dc=example, dc=net\".
";
$elem["kwartz/ldapbase"]["descriptionde"]="Der Basis-DN (»Distinguished Name«) für LDAP:
 Geben Sie bitte den DN (»Distinguished Name«, den »hervorgehobenen Namen«) ein, der als Basis für den LDAP-Dienst benutzt wird. Zu diesem Zweck greifen viele Systeme auf Elemente des Domain-Namens zurück. Für die Domain »example.net« zum Beispiel »dc=example, dc=net«.
";
$elem["kwartz/ldapbase"]["descriptionfr"]="DN (« Distinguished Name ») de base du service LDAP :
 Veuillez définir le DN (« Distinguished Name ») utilisé comme base pour
 accéder au service LDAP. De nombreux systèmes utilisent les éléments de leur
 nom de domaine à cet effet. Par exemple, le domaine « exemple.net » utiliserait
 \"dc=exemple,dc=net\".
";
$elem["kwartz/ldapbase"]["default"]="dc=lycee, dc=jb";
$elem["kwartz/user"]["type"]="string";
$elem["kwartz/user"]["description"]="DN (\"Distinguished Name\") of one user:
 Please enter the DN (\"Distinguished Name\") of one unprivileged user
 already existing in the LDAP directory. Kwartz requires that requests come
 from an existing user before replying anything.
";
$elem["kwartz/user"]["descriptionde"]="Der DN (»Distinguished Name«) für einen Benutzer:
 Bitte geben Sie den DN (»Distinguished Name«) eines im LDAP-Verzeichnis schon existierenden und nicht privilegierten Benutzers ein. Um zu antworten, ist Kwartz darauf angewiesen, dass die Anfrage von einem existierenden Benutzer kommt.
";
$elem["kwartz/user"]["descriptionfr"]="DN (« Distinguished Name ») d'un utilisateur :
 Veuillez définir le DN (« Distinguished Name ») d'un utilisateur sans privilège
 qui existe déjà dans l'annuaire LDAP. Kwartz exige que les requêtes viennent
 d'un utilisateur existant avant de répondre quoi que ce soit.
";
$elem["kwartz/user"]["default"]="cn=personne,cn=Users,dc=lycee,dc=jb";
$elem["kwartz/userpassword"]["type"]="password";
$elem["kwartz/userpassword"]["description"]="Password of the unprivileged user:
 Please enter the password of the unprivileged user. Kwartz requires
 that requests come from an existing user before replying anything.
 This password should not be disclosed, and should be fairly strong.
";
$elem["kwartz/userpassword"]["descriptionde"]="Passwort des nicht privilegierten Benutzers:
 Bitte geben Sie das Passwort des nicht privilegierten Benutzers ein. Um zu antworten, ist Kwartz darauf angewiesen, dass die Anfrage von einem existierenden Benutzer kommt. Das Passwort sollte nicht offengelegt und schwer zu ermitteln sein.
";
$elem["kwartz/userpassword"]["descriptionfr"]="Mot de passe de l'utilisateur sans privilège :
 Veuillez saisir le mot de passe de l'utilisateur non privilégié. Kwartz
 exige que les requêtes viennent d'un utilisateur existant avant de répondre
 quoi que ce soit. Ce mot de passe ne doit pas être révélé, et il doit être
 raisonnablement fort.
";
$elem["kwartz/userpassword"]["default"]="";
$elem["kwartz/servername"]["type"]="string";
$elem["kwartz/servername"]["description"]="The Samba name of the kwartz server:
 Please enter the Samba name of the kwartz server; this is the name of
 the server, as seen in Windows' neighborhood.
";
$elem["kwartz/servername"]["descriptionde"]="Der Samba-Name des Kwartz-Servers:
 Bitte geben Sie den Samba-Namen des Kwartz-Servers ein. Dies ist der Name des Servers, wie er von der Windows-Umgebung aus gesehen wird.
";
$elem["kwartz/servername"]["descriptionfr"]="le nom Samba du serveur Kwartz :
 Veuillez saisir le nom Samba du serveur Kwartz ; c'est sous ce nom qu'il
 est détecté par les clients Windows dans le voisinage réseau.
";
$elem["kwartz/servername"]["default"]="SERVEUR";
$elem["kwartz/cloud_ip"]["type"]="string";
$elem["kwartz/cloud_ip"]["description"]="The IP address of the Cloud service, if any:
 Please enter the IP address of the Cloud server. It may be the address of the
 main server, as seen from the Internet (not the address in the local network).
 If there is no such service, you can safely keep the default.
";
$elem["kwartz/cloud_ip"]["descriptionde"]="Die IP-Adresse der Cloud, falls existierend:
 Bitte geben Sie die IP-Adresse des Cloud-Servers ein. Dies kann die Adresse sein, unter der der Hauptserver vom Internet aus erreicht wird (nicht die Adresse im lokalen Netzwerk). Wenn es diesen Dienst nicht gibt, kann die Voreinstellung bedenkenlos beibehalten werden.
";
$elem["kwartz/cloud_ip"]["descriptionfr"]="L'adresse IP du service de Cloud, s'il existe :
 Veuillez entrer l'adresse IP du serveur de cloud. Ça peut être l'adresse du serveur principal, tel qu'il est vu depuis Internet (pas l'adresse dans le réseaux local). S'il n'y a pas ce genre de service, on peut conserver la valeur par défaut en toute sécurité.
";
$elem["kwartz/cloud_ip"]["default"]="kwartz.lyceejeanbart.fr";
$elem["kwartz/alt_ip"]["type"]="string";
$elem["kwartz/alt_ip"]["description"]="The IP address of the kwartz server, in the LAN:
 A kwartz server has at least two networks connections, one for the
 Internet, and the other one for the local network. Here you can type
 the name as it appears in the directory service in use; i.e. if the
 LDAP URI of the directory service is \"ldap://serveur.lycee.jb/\" you
 can type: \"serveur.lycee.jb\" or an equivalent numeric IP address.

";
$elem["kwartz/alt_ip"]["descriptionde"]="";
$elem["kwartz/alt_ip"]["descriptionfr"]="";
$elem["kwartz/alt_ip"]["default"]="serveur.lycee.jb";
$elem["kwartz/tls_port"]["type"]="string";
$elem["kwartz/tls_port"]["description"]="The port used to access https services of the Cloud:
 https services are usually bound to the port number 443. However the
 Cloud service may be bound to some other port number. If there is no
 cloud service, you can safely keep the default value.
";
$elem["kwartz/tls_port"]["descriptionde"]="Port, über den die Cloud per https-Protokoll erreicht wird:
 Normalerweise erfolgt der Datenaustausch nach dem https-Protokoll über den Port 443. Allerdings kann die Cloud auch über eine andere Port-Nummer  bereitgestellt werden. Wenn keine Cloud benutzt wird, kann die Voreinstellung bedenkenlos beibehalten werden.
";
$elem["kwartz/tls_port"]["descriptionfr"]="Le port utilisé pour accéder aux services https du Cloud :
 Les services https sont d'habitude attachés au port 443. Cependant le service de Cloud peut être lié à un autre numéro de port. S'il n'y a pas de service de Cloud,  on peut conserver la valeur par défaut en toute sécurité.
";
$elem["kwartz/tls_port"]["default"]="8443";
$elem["kwartz/davpath"]["type"]="string";
$elem["kwartz/davpath"]["description"]="The path used to get the DAVS service:
 this is the end of the URL used to access the DAVS service featured by the
 Cloud. If the cloud is powered by Owncloud, the default value is probably
 good. If there is no cloud service, you can safely keep the default value.
";
$elem["kwartz/davpath"]["descriptionde"]="Der Pfad zum Anfordern des DAVS-Dienstes:
 Dies ist das Ende der URL, die verwendet wird, um den von der Cloud bereitgestellten DAVS-Dienst zu erreichen. Für »Owncloud« dürfte die Voreinstellung passend sein. Wenn keine Cloud benutzt wird, kann die Voreinstellung bedenkenlos übernommen werden.
";
$elem["kwartz/davpath"]["descriptionfr"]="Le chemin utilisé pour l'accès au service DAVS (Webdav sécurisé) :
 Il s'agit de la fin de l'URL qu'on utilise pour accéder au service DAVS fourni par le Cloud. Si le cloud est propulsé par Owncloud, la valeur par défaut est probablement valide. S'il n'y a pas de service de Cloud,  on peut conserver la valeur par défaut en toute sécurité.
";
$elem["kwartz/davpath"]["default"]="owncloud/remote.php/webdav";
PKG_OptionPageTail2($elem);
?>
