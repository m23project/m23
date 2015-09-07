<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("citadel-server");

$elem["citadel/ServerIPAddress"]["type"]="string";
$elem["citadel/ServerIPAddress"]["description"]="Listening address for the Citadel server:
 Please specify the IP address which the server should be listening to. If you
 specify 0.0.0.0, the server will listen on all addresses.
 .
 This can usually be left to the default unless multiple instances
 of Citadel are running on the same computer.
";
$elem["citadel/ServerIPAddress"]["descriptionde"]="Adresse, auf der Citadel auf Anfragen wartet:
 Bitte geben Sie die IP-Adressen an, auf der der Server auf Anfragen warten soll. Falls Sie 0.0.0.0 angeben, wird der Server auf allen Adressen auf Anfragen warten.
 .
 Normalerweise können Sie die Vorgabe beibehalten, falls Sie nicht mehrere Instanzen von Citadel auf dem gleichen Computer betreiben.
";
$elem["citadel/ServerIPAddress"]["descriptionfr"]="Adresse IP où Citadel sera à l'écoute :
 Veuillez indiquer l'adresse IP sur laquelle le serveur sera actif. Si vous indiquez 0.0.0.0, Citadel sera à l'écoute de toutes les adresses.
 .
 Vous pouvez normalement sauter cette étape à moins que plusieurs instances de Citadel ne tournent sur le même ordinateur.
";
$elem["citadel/ServerIPAddress"]["default"]="0.0.0.0";
$elem["citadel/LoginType"]["type"]="select";
$elem["citadel/LoginType"]["choices"][1]="Internal";
$elem["citadel/LoginType"]["choices"][2]="Host";
$elem["citadel/LoginType"]["choices"][3]="LDAP";
$elem["citadel/LoginType"]["choicesde"][1]="Intern";
$elem["citadel/LoginType"]["choicesde"][2]="Host";
$elem["citadel/LoginType"]["choicesde"][3]="LDAP";
$elem["citadel/LoginType"]["choicesfr"][1]="Interne";
$elem["citadel/LoginType"]["choicesfr"][2]="Hôte";
$elem["citadel/LoginType"]["choicesfr"][3]="LDAP";
$elem["citadel/LoginType"]["description"]="Authentication method to use:
 Please choose the user authentication mode. By default Citadel will use its
 own internal user accounts database. If you choose Host, Citadel users will
 have accounts on the host system, authenticated via /etc/passwd or a PAM
 source. LDAP chooses an RFC 2307 compliant directory server, the last option
 chooses the nonstandard MS Active Directory LDAP scheme.
 .
 Do not change this option unless you are sure it is required, since
 changing back requires a full reinstall of Citadel.
";
$elem["citadel/LoginType"]["descriptionde"]="Zu verwendene Authentifizierungsmethode:
 Bitte wählen Sie die Authentifizierungsmethode für Benutzer. Standardmäßig wird Citadel seine interne Benutzerkontendatenbank verwenden. Falls Sie »Host« wählen, werden die Benutzer von Citadel Konten auf dem Gastsystem haben und via /etc/passwd oder einer PAM-Quelle authentifiziert werden. »LDAP« wählt einen RFC2307-konformen Verzeichnisdienst, die letzte Option wählt das nicht-standard »MS Active Directory« LDAP-Schema.
 .
 Ändern Sie diese Option nur, falls Sie sich sicher sind, dass Sie sie benötigen. Das Zurücksetzen dieser Option benötigt eine komplette Neuinstallation von Citadel.
";
$elem["citadel/LoginType"]["descriptionfr"]="Méthode d'authentification à utiliser :
 Veuillez choisir le mode d'authentification des utilisateurs. Par défaut, Citadel utilise son système interne de comptes. Si vous choisissez « Hôte », les utilisateurs de Citadel doivent avoir des comptes locaux, authentifiés avec /etc/passwd ou PAM. Le choix « LDAP » utilise un répertoire conforme au RFC 2307 et l'option « Active Directory » utilise le schéma LDAP non standard d'Active Directory.
 .
 Ne modifiez cette option que si elle est indispensable car il n'est pas possible de la changer sans entièrement réinstaller Citadel.
";
$elem["citadel/LoginType"]["default"]="Internal";
$elem["citadel/LDAPServer"]["type"]="string";
$elem["citadel/LDAPServer"]["description"]="LDAP host:
 Please enter host name or IP address of your LDAP server.
";
$elem["citadel/LDAPServer"]["descriptionde"]="LDAP-Host:
 Bitte geben Sie den Rechnernamen oder die IP-Adresse Ihres LDAP-Servers an.
";
$elem["citadel/LDAPServer"]["descriptionfr"]="Serveur LDAP :
 Veuillez indiquer le nom d'hôte ou l'adresse IP du serveur LDAP.
";
$elem["citadel/LDAPServer"]["default"]="0.0.0.0";
$elem["citadel/LDAPServerPort"]["type"]="string";
$elem["citadel/LDAPServerPort"]["description"]="LDAP port number:
 Please enter the port number of your LDAP service (usually 389).
";
$elem["citadel/LDAPServerPort"]["descriptionde"]="LDAP-Portnummer:
 Bitte geben Sie die Portnummer Ihres LDAP-Dienstes an (normalerweise 389).
";
$elem["citadel/LDAPServerPort"]["descriptionfr"]="Port du serveur LDAP :
 Veuillez indiquer le numéro du port d'écoute pour le serveur LDAP (en général 389).
";
$elem["citadel/LDAPServerPort"]["default"]="389";
$elem["citadel/LDAPBaseDN"]["type"]="string";
$elem["citadel/LDAPBaseDN"]["description"]="LDAP base DN:
 Please enter the Base DN to search for authentication
 (for example: dc=example,dc=com).
";
$elem["citadel/LDAPBaseDN"]["descriptionde"]="LDAP-base-DN:
 Bitte geben Sie die »Base DN«, die zur Authentifizierung durchsucht werden soll (beispielsweise dc=example,dc=com), an.
";
$elem["citadel/LDAPBaseDN"]["descriptionfr"]="DN de base du serveur LDAP :
 Veuillez indiquer la base de recherche pour l'authentification LDAP (p. ex. dc=example,dc=com).
";
$elem["citadel/LDAPBaseDN"]["default"]="dc=example,dc=com";
$elem["citadel/LDAPBindDN"]["type"]="string";
$elem["citadel/LDAPBindDN"]["description"]="LDAP bind DN:
 Please enter the DN of an account to use for binding to the LDAP server
 for performing queries. The account does not require any other
 privileges. If your LDAP server allows anonymous queries, you can
 leave this blank.
";
$elem["citadel/LDAPBindDN"]["descriptionde"]="LDAP-bind-DN:
 Bitte geben Sie die DN eines Kontos an, das zum Binden an den LDAP-Server zur Durchführung von Abfragen verwandt wird. Das Konto benötigt keine weiteren Privilegien. Falls Ihr LDAP-Server anonyme Abfragen erlaubt, können Sie dies leer lassen.
";
$elem["citadel/LDAPBindDN"]["descriptionfr"]="Compte de connexion LDAP :
 Veuillez indiquer le compte à utiliser pour la connexion au serveur LDAP, pour les requêtes qui y seront effectuées. Ce compte a uniquement besoin de privilèges de lecture et peut ne pas être renseigné si le serveur LDAP permet les connexions anonymes.
";
$elem["citadel/LDAPBindDN"]["default"]="Default:";
$elem["citadel/LDAPBindDNPassword"]["type"]="string";
$elem["citadel/LDAPBindDNPassword"]["description"]="LDAP bind password:
 If you entered a Bind DN in the previous question, you must now enter
 the password associated with that account. Otherwise, you can leave this
 blank.
";
$elem["citadel/LDAPBindDNPassword"]["descriptionde"]="LDAP-bind-Passwort:
 Falls Sie in der vorherigen Frage eine Bind-DN eingegeben haben, müssen Sie jetzt das zum Konto zugehörige Passwort eingeben. Lassen Sie dies andernfalls leer.
";
$elem["citadel/LDAPBindDNPassword"]["descriptionfr"]="Mot de passe de connexion LDAP :
 Si vous avez indiqué un compte de connexion en lecture au serveur LDAP, veuillez indiquer le mot de passe à utiliser pour ce compte.
";
$elem["citadel/LDAPBindDNPassword"]["default"]="OpenSesame";
$elem["citadel/Administrator"]["type"]="string";
$elem["citadel/Administrator"]["description"]="Citadel administrator username:
 Please enter the name of the Citadel user account that should be granted
 administrative privileges once created.
 If using internal authentication this user account will be created if it does
 not exist. For external authentication this user account has to exist.
";
$elem["citadel/Administrator"]["descriptionde"]="Benutzername des Citadel-Administrators:
 Bitte geben Sie den Namen des Citadel-Benutzerkontos an, dem nach der Erstellung administrative Privilegien erteilt werden sollen. Falls interne Authentifizierung verwandt wird und das Benutzerkonto noch nicht existiert, wird es erstellt. Für externe Authentifizierung muss das Benutzerkonto existieren.
";
$elem["citadel/Administrator"]["descriptionfr"]="Identifiant de l'administrateur de Citadel :
 Veuillez indiquer l'identifiant Citadel qui disposera des privilèges d'administration après création. Si le système interne d'authentification est utilisé, ce compte sera créé. Si un système externe d'authentification est utilisé, ce compte doit déjà y exister.
";
$elem["citadel/Administrator"]["default"]="admin";
$elem["citadel/Password"]["type"]="password";
$elem["citadel/Password"]["description"]="Administrator password:
 While not mandatory, it is highly recommended that you set a password
 for the administrator user.
";
$elem["citadel/Password"]["descriptionde"]="Administrator-Passwort:
 Es ist zwar nicht zwingend notwendig, wird aber nachdrücklich empfohlen, dass Sie für den administrativen Benutzer ein Passwort setzen.
";
$elem["citadel/Password"]["descriptionfr"]="Mot de passe de l'administrateur :
 Bien que cela ne soit pas indispensable, il est fortement conseillé de choisir un mot de passe pour l'utilisateur qui disposera des privilèges d'administration.
";
$elem["citadel/Password"]["default"]="";
$elem["citadel/Password_again"]["type"]="password";
$elem["citadel/Password_again"]["description"]="Repeat password for the administrator user:

";
$elem["citadel/Password_again"]["descriptionde"]="";
$elem["citadel/Password_again"]["descriptionfr"]="";
$elem["citadel/Password_again"]["default"]="";
$elem["citadel/BadUser"]["type"]="error";
$elem["citadel/BadUser"]["description"]="User does not exist.
";
$elem["citadel/BadUser"]["descriptionde"]="";
$elem["citadel/BadUser"]["descriptionfr"]="";
$elem["citadel/BadUser"]["default"]="";
PKG_OptionPageTail2($elem);
?>
