<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pynslcd");

$elem["nslcd/ldap-uris"]["type"]="string";
$elem["nslcd/ldap-uris"]["description"]="LDAP server URI:
 Please enter the Uniform Resource Identifier of the LDAP server. The format
 is \"ldap://<hostname_or_IP_address>:<port>/\". Alternatively, \"ldaps://\" or
 \"ldapi://\" can be used. The port number is optional.
 .
 When using an ldap or ldaps scheme it is recommended to use an IP address to
 avoid failures when domain name services are unavailable.
 .
 Multiple URIs can be separated by spaces.
";
$elem["nslcd/ldap-uris"]["descriptionde"]="URI des LDAP-Servers:
 Bitte geben Sie den Uniform Resource Identifier des benutzten LDAP-Servers ein. Das Format ist »ldap://<Rechnername oder IP-Adresse>:<Port>/«. Alternativ kann auch »ldaps://« oder »ldapi://« benutzt werden. Der Port muss nicht angegeben werden.
 .
 Wenn Sie »ldap« oder »ldaps« verwenden, sollten Sie eine IP-Adresse eingeben, um Ausfälle zu verhindern, falls die Namensauflösung einmal nicht verfügbar ist.
 .
 Mehrere URIs können, durch Leerzeichen getrennt, angegeben werden.
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
$elem["nslcd/ldap-auth-type"]["type"]="select";
$elem["nslcd/ldap-auth-type"]["choices"][1]="none";
$elem["nslcd/ldap-auth-type"]["choices"][2]="simple";
$elem["nslcd/ldap-auth-type"]["choicesde"][1]="keine";
$elem["nslcd/ldap-auth-type"]["choicesde"][2]="einfach";
$elem["nslcd/ldap-auth-type"]["choicesfr"][1]="aucune";
$elem["nslcd/ldap-auth-type"]["choicesfr"][2]="simple";
$elem["nslcd/ldap-auth-type"]["description"]="LDAP authentication to use:
 Please choose what type of authentication the LDAP database should
 require (if any):
 .
  * none: no authentication;
  * simple: simple bind DN and password authentication;
  * SASL: any Simple Authentication and Security Layer mechanism.
";
$elem["nslcd/ldap-auth-type"]["descriptionde"]="LDAP-Authentifizierung, die benutzt werden soll:
 Bitte wählen Sie aus, welchen Authentifizierungstyp die LDAP-Datenbank verlangen soll (falls überhaupt):
 .
  * keine: keine Authentifizierung;
  * einfach: einfache Bind-DN- und Passwortauthentifizierung;
  * SASL: jeder »Simple Authentication and Security Layer«-Mechanismus.
";
$elem["nslcd/ldap-auth-type"]["descriptionfr"]="Authentification LDAP :
 Veuillez choisir le type d'authentification que la base LDAP utilise (si nécessaire).
 .
  - aucune : pas d'authentification;
  - simple : authentification simple avec un identifiant (DN) et un
             mot de passe;
  - SASL   : mécanisme basé sur SASL (« Simple Authentication and
             Security Layer ») : méthode simplifiée d'authentification
             et de sécurité;
";
$elem["nslcd/ldap-auth-type"]["default"]="";
$elem["nslcd/ldap-binddn"]["type"]="string";
$elem["nslcd/ldap-binddn"]["description"]="LDAP database user:
 Please enter the name of the account that will be used to log in to the LDAP
 database. This value should be specified as a DN (distinguished name).
";
$elem["nslcd/ldap-binddn"]["descriptionde"]="LDAP-Datenbank-Benutzer:
 Bitte geben Sie den Namen des Kontos ein, das zur Anmeldung in die LDAP-Datenbank benutzt wird. Dieser Wert sollte ein DN (distinguished name/benanntes LDAP-Objekt) sein.
";
$elem["nslcd/ldap-binddn"]["descriptionfr"]="Utilisateur de la base LDAP :
 Veuillez indiquer le compte à utiliser pour s'identifier sur la base LDAP. Cette valeur doit être indiquée sur la forme d'un nom distinctif (DN : « Distinguished Name »).
";
$elem["nslcd/ldap-binddn"]["default"]="";
$elem["nslcd/ldap-bindpw"]["type"]="password";
$elem["nslcd/ldap-bindpw"]["description"]="LDAP user password:
 Please enter the password that will be used to log in to the LDAP database.
";
$elem["nslcd/ldap-bindpw"]["descriptionde"]="Passwort des LDAP-Benutzers:
 Bitte geben Sie das Passwort für die Anmeldung an der LDAP-Datenbank ein.
";
$elem["nslcd/ldap-bindpw"]["descriptionfr"]="Mot de passe de l'utilisateur LDAP :
 Veuillez indiquer le mot de passe à utiliser pour s'identifier sur la base LDAP.
";
$elem["nslcd/ldap-bindpw"]["default"]="";
$elem["nslcd/ldap-sasl-mech"]["type"]="select";
$elem["nslcd/ldap-sasl-mech"]["choices"][1]="auto";
$elem["nslcd/ldap-sasl-mech"]["choices"][2]="LOGIN";
$elem["nslcd/ldap-sasl-mech"]["choices"][3]="PLAIN";
$elem["nslcd/ldap-sasl-mech"]["choices"][4]="NTLM";
$elem["nslcd/ldap-sasl-mech"]["choices"][5]="CRAM-MD5";
$elem["nslcd/ldap-sasl-mech"]["choices"][6]="DIGEST-MD5";
$elem["nslcd/ldap-sasl-mech"]["choices"][7]="SCRAM";
$elem["nslcd/ldap-sasl-mech"]["choices"][8]="GSSAPI";
$elem["nslcd/ldap-sasl-mech"]["choices"][9]="SKEY";
$elem["nslcd/ldap-sasl-mech"]["choices"][10]="OTP";
$elem["nslcd/ldap-sasl-mech"]["description"]="SASL mechanism to use:
 Please choose the SASL mechanism that will be used to authenticate to the LDAP
 database:
 .
  * auto: auto-negotiation;
  * LOGIN: deprecated in favor of PLAIN;
  * PLAIN: simple cleartext password mechanism;
  * NTLM: NT LAN Manager authentication mechanism;
  * CRAM-MD5: challenge-response scheme based on HMAC-MD5;
  * DIGEST-MD5: HTTP Digest compatible challenge-response scheme;
  * SCRAM: salted challenge-response mechanism;
  * GSSAPI: used for Kerberos;
  * SKEY: S/KEY mechanism (obsoleted by OTP);
  * OTP: One Time Password mechanism;
  * EXTERNAL: authentication is implicit in the context.
";
$elem["nslcd/ldap-sasl-mech"]["descriptionde"]="Zu benutzender SASL-Mechanismus:
 Bitte wählen Sie den SASL-Mechanismus aus, der für die Authentifizierung an der LDAP-Datenbank benutzt wird.
 .
  * auto: automatische Aushandlung;
  * LOGIN: missbilligt zugunsten von PLAIN;
  * PLAIN: einfacher Klartextpasswort-Mechanismus;
  * NTLM: NT-LAN-Manager-Authentifizierungs-Mechanismus;
  * CRAM-MD5: Challenge-Response-Schema, das auf HMAC-MD5 basiert;
  * DIGEST-MD5: HTTP-Digest-kompatibles Challenge-Response-Schema;
  * SCRAM: Challenge-Response-Mechanismus mit Salt;
  * GSSAPI: benutzt für Kerberos;
  * SKEY: S/KEY-Mechanismus (dank OTP hinfällig);
  * OTP: ein Einmalpasswort-Mechanismus;
  * EXTERNAL: Authentifizierung findet stillschweigend im Kontext statt.
";
$elem["nslcd/ldap-sasl-mech"]["descriptionfr"]="Mécanisme SASL à utiliser :
 Veuillez indiquer le mécanisme SASL à utiliser pour s'identifier sur la base LDAP :
 .
  - auto       : négociation automatique ;
  - LOGIN      : obsolète et remplacé par PLAIN ;
  - PLAIN      : mot de passe simple en clair ;
  - NTLM       : authentification NT LAN Manager ;
  - CRAM-MD5   : schéma de challenge-réponse basé sur HMAC-MD5 ;
  - DIGEST-MD5 : schéma de challenge-réponse compatible avec HTTP Digest ;
  - SCRAM      : mécanisme schéma de challenge-réponse sécurisé ;
  - GSSAPI     : utilisé pour Kerberos ;
  - SKEY       : mécanisme S/KEY (rendu obsolète par OTP) ;
  - OTP        : mots de passe jetables (« One Time Password ») ;
  - EXTERNAL   : authentification implicite dans le contexte.
";
$elem["nslcd/ldap-sasl-mech"]["default"]="";
$elem["nslcd/ldap-sasl-realm"]["type"]="string";
$elem["nslcd/ldap-sasl-realm"]["description"]="SASL realm:
 Please enter the SASL realm that will be used to authenticate to the LDAP
 database.
 .
 The realm is appended to authentication and authorization identities.
 .
 For GSSAPI, this can be left blank to use information from the Kerberos
 credentials cache.
";
$elem["nslcd/ldap-sasl-realm"]["descriptionde"]="SASL-Bereich:
 Bitte geben Sie den SASL-Bereich ein, der für die Authentifizierung an der LDAP-Datenbank benutzt wird.
 .
 Der Bereich wird Authentifizierungs- und Berechtigungsidentitäten zugeordnet.
 .
 Für GSSAPI kann dies leer gelassen werden, um Informationen vom Kerberos-Berechtigungszwischenspeicher zu benutzen.
";
$elem["nslcd/ldap-sasl-realm"]["descriptionfr"]="Domaine (« realm ») SASL :
 Veuillez indiquer le domaine SASL à utiliser pour s'identifier sur la base LDAP.
 .
 Il sera ajouté aux identifiants d'authentification et d'autorisation.
 .
 Pour GSSAPI, ce champ peut être laissé vide afin d'utiliser l'information du cache d'authentification de Kerberos.
";
$elem["nslcd/ldap-sasl-realm"]["default"]="";
$elem["nslcd/ldap-sasl-authcid"]["type"]="string";
$elem["nslcd/ldap-sasl-authcid"]["description"]="SASL authentication identity:
 Please enter the SASL authentication identity that will be used to authenticate to
 the LDAP database.
 .
 This is the login used in LOGIN, PLAIN, CRAM-MD5, and DIGEST-MD5 mechanisms.
";
$elem["nslcd/ldap-sasl-authcid"]["descriptionde"]="SASL-Authentifizierungsidentität:
 Bitte geben Sie die SASL-Authentifizierungsidentität ein, die für die Authentifizierung an der LDAP-Datenbank benutzt wird.
 .
 Dies ist der Anmeldename bei den Mechanismen LOGIN, PLAIN, CRAM-MD5 und DIGEST-MD5.
";
$elem["nslcd/ldap-sasl-authcid"]["descriptionfr"]="Identité d'authentification SASL :
 Veuillez indiquer l'identité d'authentification SASL à utiliser pour s'identifier sur la base LDAP.
 .
 Il s'agit de l'identifiant utilisé avec les mécanismes LOGIN, PLAIN, CRAM-MD5 et DIGEST-MD5.
";
$elem["nslcd/ldap-sasl-authcid"]["default"]="";
$elem["nslcd/ldap-sasl-authzid"]["type"]="string";
$elem["nslcd/ldap-sasl-authzid"]["description"]="SASL proxy authorization identity:
 Please enter the proxy authorization identity that will be used to authenticate to
 the LDAP database.
 .
 This is the object in the name of which the LDAP request is done.
 This value should be specified as a DN (distinguished name).
";
$elem["nslcd/ldap-sasl-authzid"]["descriptionde"]="SASL-Proxy-Berechtigungsidentität:
 Bitte geben Sie die SASL-Proxy-Berechtigungsidentität ein, die für die Authentifizierung an der LDAP-Datenbank benutzt wird.
 .
 Dies ist das Objekt, in dessen Name die LDAP-Abfrage durchgeführt wird. Dieser Wert sollte als DN (distinguished name/benanntes LDAP-Objekt) angegeben werden.
";
$elem["nslcd/ldap-sasl-authzid"]["descriptionfr"]="Identité d'authentification du pare-feu SASL :
 Veuillez indiquer l'identité d'authentification de pare-feu à utiliser pour s'identifier sur la base LDAP.
 .
 Il s'agit de l'objet au nom duquel les requêtes LDAP seront effectuées. Cette valeur doit être indiquée sous forme d'un nom distinctif (DN : « Distinguished Name »).
";
$elem["nslcd/ldap-sasl-authzid"]["default"]="";
$elem["nslcd/ldap-sasl-secprops"]["type"]="string";
$elem["nslcd/ldap-sasl-secprops"]["description"]="Cyrus SASL security properties:
 Please enter the Cyrus SASL security properties.
 .
 Allowed values are described in the ldap.conf(5) manual page
 in the SASL OPTIONS section.
";
$elem["nslcd/ldap-sasl-secprops"]["descriptionde"]="Cyrus-SASL-Sicherheitseigenschaften:
 Bitte geben Sie die Cyrus-SASL-Sicherheitseigenschaften ein.
 .
 Erlaubte Werte werden in der Handbuchseite ldap.conf(5) im Abschnitt SASL OPTIONS beschrieben.
";
$elem["nslcd/ldap-sasl-secprops"]["descriptionfr"]="Paramètres de sécurité pour Cyrus SASL :
 Veuillez indiquer les paramètres de sécurité pour Cyrus SASL.
 .
 Les valeurs autorisées sont décrites dans la page de manuel ldap.conf(5), dans la section « SASL OPTIONS ».
";
$elem["nslcd/ldap-sasl-secprops"]["default"]="";
$elem["nslcd/ldap-sasl-krb5-ccname"]["type"]="string";
$elem["nslcd/ldap-sasl-krb5-ccname"]["description"]="Kerberos credential cache file path:
 Please enter the GSSAPI/Kerberos credential cache file name that will be used.
";
$elem["nslcd/ldap-sasl-krb5-ccname"]["descriptionde"]="Dateipfad des Kerberos-Berechtigungszwischenspeichers:
 Bitte geben Sie den Dateinamen des Kerberos-Berechtigungszwischenspeichers an, der benutzt wird.
";
$elem["nslcd/ldap-sasl-krb5-ccname"]["descriptionfr"]="Chemin d'accès au fichier de cache d'authentification Kerberos :
 Veuillez indiquer le nom du fichier à utiliser pour le cache d'authentification GSSAPI/Kerberos.
";
$elem["nslcd/ldap-sasl-krb5-ccname"]["default"]="/var/run/nslcd/nslcd.tkt";
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
 .
  * never: no certificate will be requested or checked;
  * allow: a certificate will be requested, but it is not
           required or checked;
  * try: a certificate will be requested and checked, but if no
         certificate is provided, it is ignored;
  * demand: a certificate will be requested, required, and checked.
";
$elem["nslcd/ldap-reqcert"]["descriptionde"]="Das SSL-Zertifikat des Servers überprüfen:
 Wenn eine verschlüsselte Verbindung benutzt wird, kann ein Server-Zertifikat erforderlich sein und überprüft werden. Bitte wählen Sie, ob Zertifikate angefordert und deren Gültigkeit geprüft werden soll:
 .
  * nie:       es wird kein Zertifikat angefordert oder überprüft;
  * erlauben:  ein Zertifikat wird angefordert, aber es ist nicht
               erforderlich und wird nicht überprüft;
  * versuchen: ein Zertifikat wird angefordert und überprüft,
               aber es wird ignoriert, wenn keins angeboten wird
  * anfordern: ein Zertifikat wird angefordert, ist erforderlich
               und wird überprüft
";
$elem["nslcd/ldap-reqcert"]["descriptionfr"]="Contrôle du certificat SSL du serveur :
 En cas de connexion chiffrée, le certificat du serveur peut être demandé et contrôlé. Veuillez choisir la façon de réaliser ce contrôle :
 .
  - Jamais    : certificat non demandé ni contrôlé ;
  - Autoriser : certificat demandé mais facultatif et non
                contrôlé ;
  - Essayer   : certificat demandé et contrôlé, mais facultatif ;
  - Demander  : certificat obligatoire et contrôlé.
";
$elem["nslcd/ldap-reqcert"]["default"]="";
$elem["nslcd/ldap-cacertfile"]["type"]="string";
$elem["nslcd/ldap-cacertfile"]["description"]="Certificate authority certificate:
 When certificate checking is enabled this file contains the X.509
 certificate that is used to check the certificate provided by the server.
";
$elem["nslcd/ldap-cacertfile"]["descriptionde"]="Zertifikat der Zertifizierungsstelle:
 Wenn Prüfung von Zertifikaten aktiviert ist, enthält diese Datei das X.509-Zertifikat, das zur Überprüfung des vom Server bereitgestellten Zertifikats verwendet wird.
";
$elem["nslcd/ldap-cacertfile"]["descriptionfr"]="Certificat de l'autorité de certification :
 Si le contrôle des certificats est activé, le fichier indiqué ici doit être le certificat X.509 qui servira à vérifier le certificat fourni par le serveur.
";
$elem["nslcd/ldap-cacertfile"]["default"]="/etc/ssl/certs/ca-certificates.crt";
$elem["nslcd/disable-screensaver"]["type"]="error";
$elem["nslcd/disable-screensaver"]["description"]="xscreensaver and xlockmore must be restarted before upgrading
 One or more running instances of xscreensaver or xlockmore have been
 detected on this system. Because of incompatible library changes, the
 upgrade of nslcd may leave you unable to authenticate to these programs.
 You should arrange for these programs to be restarted or stopped before
 continuing this upgrade, to avoid locking your users out of their current
 sessions.
";
$elem["nslcd/disable-screensaver"]["descriptionde"]="Xscreensaver und Xlockmore müssen vor dem Upgrade neu gestartet werden
 Eine oder mehrere laufende Instanzen von Xscreensaver oder Xlockmore sind auf diesem System entdeckt worden. Aufgrund inkompatibler Änderungen in Bibliotheken wird das Upgrade von Nslcd Sie außerstande setzen, sich gegenüber diesen Programmen zu authentifizieren. Sie sollten dafür sorgen, dass diese Programme neu gestartet oder beendet werden, bevor Sie dieses Upgrade fortsetzen, damit Ihre Benutzer nicht aus ihren laufenden Sitzungen ausgesperrt werden.
";
$elem["nslcd/disable-screensaver"]["descriptionfr"]="Redémarrage nécessaire de xscreensaver et xlockmore avant mise à jour
 Une ou plusieurs instances de xscreensaver et/ou de xlockmore ont été détectées sur le système. À cause de la modification de certaines bibliothèques, la mise à niveau de nslcd entrainera l'impossibilité de s'authentifier. Avant de poursuivre la mise à niveau, ces programmes doivent être redémarrés ou arrêtés pour éviter que des utilisateurs ne puissent plus accéder à leurs sessions.
";
$elem["nslcd/disable-screensaver"]["default"]="";
$elem["libraries/restart-without-asking"]["type"]="boolean";
$elem["libraries/restart-without-asking"]["description"]="Restart services during package upgrades without asking?
 There are services installed on your system which need to be restarted
 when certain libraries, such as libpam, libc, and libssl, are upgraded.
 Since these restarts may cause interruptions of service for the system,
 you will normally be prompted on each upgrade for the list of services
 you wish to restart.  You can choose this option to avoid being prompted;
 instead, all necessary restarts will be done for you automatically so you
 can avoid being asked questions on each library upgrade.
";
$elem["libraries/restart-without-asking"]["descriptionde"]="Dienste bei Paket-Upgrades ohne Rückfrage neu starten?
 Auf Ihrem System sind Dienste installiert, die beim Upgrade bestimmter Bibliotheken, wie Libpam, Libc und Libssl, neu gestartet werden müssen. Da diese Neustarts zu Unterbrechungen der Dienste für dieses System führen können, werden Sie normalerweise bei jedem Upgrade über die Liste der neu zu startenden Dienste befragt. Sie können diese Option wählen, um diese Abfrage zu vermeiden; stattdessen werden alle notwendigen Dienste-Neustarts für Sie automatisch vorgenommen und die Beantwortung von Fragen bei jedem Upgrade von Bibliotheken vermieden.
";
$elem["libraries/restart-without-asking"]["descriptionfr"]="Redémarrer les services automatiquement lors des mises à jour ?
 Certains services installés sur le système doivent être redémarrés lorsque certaines bibliothèques, comme libpam, libc ou libssl, sont mises à jour. Comme ces redémarrages peuvent conduire à une interruption du service, le choix de les redémarrer ou non est en général offert lors de ces mises à jour. Vous pouvez choisir ici que ce choix ne soit plus offert et que les redémarrages aient lieu systématiquement lors des mises à jour de bibliothèques.
";
$elem["libraries/restart-without-asking"]["default"]="false";
$elem["nslcd/restart-services"]["type"]="string";
$elem["nslcd/restart-services"]["description"]="Services to restart for nslcd upgrade:
 Running services and programs that are using nslcd need to be restarted,
 otherwise they might not be able to do lookup or authentication any more
 (for services such as ssh, this can affect your ability to login).
 Please review the following space-separated list of init.d scripts for
 services to be restarted now, and correct it if needed.
";
$elem["nslcd/restart-services"]["descriptionde"]="Dienste, die für das Upgrade von Nslcd neu gestartet werden:
 Laufende Dienste und Programme, die Nslcd verwenden, müssen neu gestartet werden, da sie andernfalls keine Überprüfungen oder Authentisierung mehr durchführen können (für Dienste wie ssh kann dies die Möglichkeit der Anmeldung betreffen). Bitte prüfen Sie, welche der Dienste in der folgenden, durch Leerzeichen getrennte Liste von init.d-Skripten neu gestartet werden sollen, und korrigieren Sie diese falls notwendig.
";
$elem["nslcd/restart-services"]["descriptionfr"]="Services à redémarrer lors de la mise à niveau de nslcd :
 Les services et programmes qui utilisent nslcd doivent être redémarrés car leur système d'authentification risque de ne plus fonctionner (pour des services comme SSH, cela peut empêcher les connexions). Veuillez contrôler et éventuellement corriger la liste des services qui seront redémarrés maintenant (identifiés par le nom de leur script de démarrage).
";
$elem["nslcd/restart-services"]["default"]="";
$elem["nslcd/restart-failed"]["type"]="error";
$elem["nslcd/restart-failed"]["description"]="Failure restarting some services for nslcd upgrade
 The following services could not be restarted:
 .
 ${services}
 .
 You will need to start these manually by running
 '/etc/init.d/<service> start'.
";
$elem["nslcd/restart-failed"]["descriptionde"]="Fehler beim Neustart einiger Dienste für das Nslcd-Upgrade
 Die folgenden Dienste konnten nicht neu gestartet werden:
 .
 ${services}
 .
 Sie müssen diese manuell starten, indem Sie »/etc/init.d/<service> start« ausführen.
";
$elem["nslcd/restart-failed"]["descriptionfr"]="Erreur du redémarrage de certains services pour la mise à niveau de nslcd
 Les services suivants n'ont pas pu être redémarrés :
 .
 ${services}
 .
 Il est nécessaire de les redémarrer vous-même avec la commande « /etc/init.d/<service> start ».
";
$elem["nslcd/restart-failed"]["default"]="";
$elem["nslcd/xdm-needs-restart"]["type"]="error";
$elem["nslcd/xdm-needs-restart"]["description"]="Display manager must be restarted manually
 The wdm and xdm display managers require a restart for the new version of
 nslcd, but there are X login sessions active on your system that would be
 terminated by this restart.  You will therefore need to restart these
 services by hand before further X logins will be possible.
";
$elem["nslcd/xdm-needs-restart"]["descriptionde"]="Display-Manager müssen manuell neu gestartet werden
 Die Display-Manager Wdm und Xdm erfordern einen Neustart für die neue Version von Nscld, aber auf Ihrem System sind X-Anmeldesitzungen aktiv, die durch diesen Neustart beendet würden. Sie müssen diese Dienste daher von Hand neu starten, bevor Anmeldungen unter X wieder möglich sind.
";
$elem["nslcd/xdm-needs-restart"]["descriptionfr"]="Pas de redémarrage automatique du gestionnaire graphique de sessions
 Les gestionnaires graphiques de session wdm et xdm nécessitent un redémarrage lors de la mise à niveau de nslcd, mais il existe des sessions X actives sur ce système, qui seraient fermées par ce redémarrage. Vous devez donc redémarrer ces services vous-même avant de pouvoir effectuer à nouveau une connexion au serveur graphique.
";
$elem["nslcd/xdm-needs-restart"]["default"]="";
PKG_OptionPageTail2($elem);
?>
