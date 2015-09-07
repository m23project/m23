<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nslcd");

$elem["nslcd/ldap-uris"]["type"]="string";
$elem["nslcd/ldap-uris"]["description"]="LDAP server URI:
 Please enter the Uniform Resource Identifier of the LDAP server. The format
 is 'ldap://<hostname_or_IP_address>:<port>/'. Alternatively, 'ldaps://' or
 'ldapi://' can be used. The port number is optional.
 .
 When using an ldap or ldaps scheme it is recommended to use an IP address to
 avoid failures when domain name services are unavailable.
 .
 Multiple URIs can be specified by separating them with spaces.
";
$elem["nslcd/ldap-uris"]["descriptionde"]="URI des LDAP-Servers:
 Bitte geben Sie den Uniform Resource Identifier des benutzten LDAP-Servers ein. Das Format ist »ldap://<Rechnername oder IP-Adresse>:<Port>/«. Alternativ kann auch »ldaps://« oder »ldapi://« benutzt werden. Der Port muss nicht angegeben werden.
 .
 Wenn Sie »ldap« oder »ldaps« verwenden, sollten Sie eine IP-Adresse eingeben, um Ausfälle zu verhindern, falls die Namensauflösung einmal nicht verfügbar ist.
 .
 Mehrere URIs können, durch Leerzeichen getrennt, eingegeben werden.
";
$elem["nslcd/ldap-uris"]["descriptionfr"]="URI du serveur LDAP :
 Veuillez indiquer l'URI (« Uniform Resource Identifier ») du serveur LDAP à utiliser. Il s'agit d'une adresse de la forme « ldap://<nom de machine ou IP>:<port>/ ». Des adresses sous la forme « ldaps:// » et « ldapi:// » peuvent aussi être utilisées. Le numéro de port est facultatif.
 .
 Lorsque le protocole utilisé est « ldap » ou « ldaps », il est recommandé d'utiliser une adresse IP plutôt qu'un nom d'hôte afin de réduire les risques d'échec en cas d'indisponibilité du service de noms.
 .
 Des adresses multiples peuvent être indiquées, séparées par des espaces.
";
$elem["nslcd/ldap-uris"]["default"]="";
$elem["nslcd/ldap-base"]["type"]="string";
$elem["nslcd/ldap-base"]["description"]="LDAP server search base:
 Please enter the distinguished name of the LDAP search base. Many sites use
 the components of their domain names for this purpose. For example, the
 domain \"example.net\" would use \"dc=example,dc=net\" as the distinguished name
 of the search base.
";
$elem["nslcd/ldap-base"]["descriptionde"]="Suchbasis des LDAP-Servers:
 Bitte geben Sie den DN (distinguished name) der LDAP-Suchbasis ein. Oft werden Teile des Domänennamens für diesen Zweck benutzt. Beispielsweise würde bei der Domäne »example.net« der DN »dc=example,dc=net« als Suchbasis verwendet werden.
";
$elem["nslcd/ldap-base"]["descriptionfr"]="Base de recherche du serveur LDAP :
 Veuillez indiquer le nom distinctif (« DN ») de la base de recherche du serveur LDAP. Beaucoup de sites utilisent les éléments composant leur nom de domaine à cette fin. Par exemple, le domaine « example.net » utiliserait « dc=example,dc=net ».
";
$elem["nslcd/ldap-base"]["default"]="";
$elem["nslcd/ldap-binddn"]["type"]="string";
$elem["nslcd/ldap-binddn"]["description"]="LDAP database user:
 If the LDAP database requires a login for normal lookups, enter the name of
 the account that will be used here. Leave it empty otherwise.
 .
 This value should be specified as a DN (distinguished name).
";
$elem["nslcd/ldap-binddn"]["descriptionde"]="LDAP-Datenbank-Benutzer:
 Wenn die LDAP-Datenbank für normale Anfragen eine Authentifizierung verlangt, geben Sie hier den Benutzernamen ein, der dafür verwendet werden soll. Andernfalls lassen Sie das Feld leer.
 .
 Dieser Wert sollte ein DN (distinguished name) sein.
";
$elem["nslcd/ldap-binddn"]["descriptionfr"]="Utilisateur de la base LDAP :
 Si le serveur LDAP nécessite un identifiant pour les recherches ordinaires, veuillez indiquer le compte qui doit être utilisé. N'indiquez rien dans le cas contraire.
 .
 Cette valeur doit être un nom distinctif (« DN »).
";
$elem["nslcd/ldap-binddn"]["default"]="";
$elem["nslcd/ldap-bindpw"]["type"]="password";
$elem["nslcd/ldap-bindpw"]["description"]="LDAP user password:
 Enter the password that will be used to log in to the LDAP database.
";
$elem["nslcd/ldap-bindpw"]["descriptionde"]="Passwort des LDAP-Benutzers:
 Geben Sie das Passwort für die Anmeldung an der LDAP-Datenbank ein.
";
$elem["nslcd/ldap-bindpw"]["descriptionfr"]="Mot de passe de l'utilisateur LDAP :
 Veuillez indiquer le mot de passe à utiliser pour s'identifier sur la base LDAP.
";
$elem["nslcd/ldap-bindpw"]["default"]="";
$elem["nslcd/ldap-starttls"]["type"]="boolean";
$elem["nslcd/ldap-starttls"]["description"]="Use StartTLS?
 Please choose whether the connection to the LDAP server should use
 StartTLS to encrypt the connection.
";
$elem["nslcd/ldap-starttls"]["descriptionde"]="StartTLS benutzen?
 Bitte entscheiden Sie, ob die Verbindung zum LDAP-Server mittels StartTLS verschlüsselt werden soll.
";
$elem["nslcd/ldap-starttls"]["descriptionfr"]="Faut-il utiliser StartTLS ?
 Veuillez choisir si la connexion au serveur LDAP doit être chiffrée avec StartTLS.
";
$elem["nslcd/ldap-starttls"]["default"]="";
$elem["nslcd/ldap-reqcert"]["type"]="select";
$elem["nslcd/ldap-reqcert"]["choices"][1]="never";
$elem["nslcd/ldap-reqcert"]["choices"][2]="allow";
$elem["nslcd/ldap-reqcert"]["choices"][3]="try";
$elem["nslcd/ldap-reqcert"]["choicesde"][1]="nie";
$elem["nslcd/ldap-reqcert"]["choicesde"][2]="erlauben";
$elem["nslcd/ldap-reqcert"]["choicesde"][3]="versuchen";
$elem["nslcd/ldap-reqcert"]["choicesfr"][1]="Jamais";
$elem["nslcd/ldap-reqcert"]["choicesfr"][2]="Autoriser";
$elem["nslcd/ldap-reqcert"]["choicesfr"][3]="Essayer";
$elem["nslcd/ldap-reqcert"]["description"]="Check server's SSL certificate:
 When an encrypted connection is used, a server certificate can be requested
 and checked. Please choose whether lookups should be configured to require
 a certificate, and whether certificates should be checked for validity:
  * never: no certificate will be requested or checked;
  * allow: a certificate will be requested, but it is not
           required or checked;
  * try: a certificate will be requested and checked, but if no
         certificate is provided it is ignored;
  * demand: a certificate will be requested, required, and checked.
 If certificate checking is enabled, at least one of the tls_cacertdir or
 tls_cacertfile options must be put in /etc/nslcd.conf.
";
$elem["nslcd/ldap-reqcert"]["descriptionde"]="Das SSL-Zertifikat des Servers überprüfen:
 Wenn eine verschlüsselte Verbindung benutzt wird, kann ein Server-Zertifikat erforderlich sein und überprüft werden. Bitte wählen Sie, ob Zertifikate angefordert und deren Gültigkeit geprüft werden soll:
  * nie:       es wird kein Zertifikat angefordert oder überprüft;
  * erlauben:  ein Zertifikat wird angefordert, aber es ist nicht
               erforderlich und wird nicht überprüft;
  * versuchen: ein Zertifikat wird angefordert und überprüft,
               aber es wird ignoriert, wenn keins angeboten wird
  * anfordern: ein Zertifikat wird angefordert, ist erforderlich
               und wird überprüft
 Wenn die Zertifikat-Überprüfung eingeschaltet ist, muss mindestens eine der Optionen »tls_cacertdir« oder »tls_cacertfile« in die Datei /etc/nslcd.conf eingetragen werden.
";
$elem["nslcd/ldap-reqcert"]["descriptionfr"]="Contrôle du certificat SSL du serveur :
 En cas de connexion chiffrée, le certificat du serveur peut être demandé et contrôlé. Veuillez choisir la façon de réaliser ce contrôle :
  - Jamais    : certificat non demandé ni contrôlé ;
  - Autoriser : certificat demandé mais facultatif et non
                contrôlé ;
  - Essayer   : certificat demandé et contrôlé, mais facultatif ;
  - Demander  : certificat obligatoire et contrôlé.
 Si le contrôle du certificat est activé, il est indispensable d'utiliser au moins l'une des options « tls_cacertdir » ou « tls_cacertfile » dans le fichier /etc/nslcd.conf.
";
$elem["nslcd/ldap-reqcert"]["default"]="";
PKG_OptionPageTail2($elem);
?>
