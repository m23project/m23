<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libpam-ldap");

$elem["libpam-ldap/rootbinddn"]["type"]="string";
$elem["libpam-ldap/rootbinddn"]["description"]="LDAP administrative account:
 Please enter the name of the LDAP administrative account.
 .
 This account will be used automatically for database management, so
 it must have the appropriate administrative privileges.
";
$elem["libpam-ldap/rootbinddn"]["descriptionde"]="Benutzerkonto zur LDAP-Administration:
 Bitte geben Sie den Namen des Benutzerkontos des LDAP-Administrators ein.
 .
 Dieses Benutzerkonto wird automatisch zur Datenbankverwaltung verwendet. Es muss deshalb die nötigen administrativen Berechtigungen besitzen.
";
$elem["libpam-ldap/rootbinddn"]["descriptionfr"]="Compte de l'administrateur LDAP :
 Veuillez indiquer le nom du compte de l'administrateur LDAP.
 .
 Ce compte sera utilisé pour la gestion de la base de données, il doit donc disposer des privilèges appropriés.
";
$elem["libpam-ldap/rootbinddn"]["default"]="cn=manager,dc=example,dc=net";
$elem["libpam-ldap/rootbindpw"]["type"]="password";
$elem["libpam-ldap/rootbindpw"]["description"]="LDAP administrative password:
 Please enter the password of the administrative account.
 .
 The password will be stored in the file ${filename}.
 This will be made readable to root only, and will allow ${package}
 to carry out automatic database management logins.
 .
 If this field is left empty, the previously stored password will
 be re-used.
";
$elem["libpam-ldap/rootbindpw"]["descriptionde"]="Passwort für die LDAP-Administration:
 Bitte geben Sie das Passwort für das Administratorkonto ein.
 .
 Das Passwort wird in der Datei ${filename} gespeichert. Diese wird nur für root lesbar sein und erlaubt es ${package}, sich automatisch zur Verwaltung der Datenbank anzumelden.
 .
 Falls dieses Feld frei gelassen wird, wird das zuvor gespeicherte Passwort wiederverwendet.
";
$elem["libpam-ldap/rootbindpw"]["descriptionfr"]="Mot de passe du compte de l'administrateur LDAP :
 Veuillez indiquer le mot de passe du compte administrateur.
 .
 Ce mot de passe sera conservé dans le fichier ${filename} qui ne sera accessible qu'au superutilisateur local (« root ») et permettra à ${package}  d'être automatiquement authentifié lors des opérations dans la base de données LDAP.
 .
 Si ce champ n'est pas renseigné, le mot de passe précédemment enregistré sera utilisé.
";
$elem["libpam-ldap/rootbindpw"]["default"]="";
$elem["libpam-ldap/dblogin"]["type"]="boolean";
$elem["libpam-ldap/dblogin"]["description"]="Does the LDAP database require login?
 Please choose whether the LDAP server enforces a login before
 retrieving entries.
 .
 Such a setup is not usually needed.
";
$elem["libpam-ldap/dblogin"]["descriptionde"]="Erfordert die LDAP-Datenbank eine Anmeldung?
 Bitte geben Sie an, ob der LDAP-Server eine Anmeldung erfordert, bevor Einträge abgefragt werden können.
 .
 Dies ist normalerweise nicht notwendig.
";
$elem["libpam-ldap/dblogin"]["descriptionfr"]="La base de données LDAP demande-t-elle une identification ?
 Veuillez indiquer si le serveur LDAP nécessite une authentification pour la lecture de ses données.
 .
 Une telle configuration n'est généralement pas utile.
";
$elem["libpam-ldap/dblogin"]["default"]="false";
$elem["shared/ldapns/base-dn"]["type"]="string";
$elem["shared/ldapns/base-dn"]["description"]="Distinguished name of the search base:
 Please enter the distinguished name of the LDAP search base. Many sites
 use the components of their domain names for this purpose. For example,
 the domain \"example.net\" would use \"dc=example,dc=net\" as the
 distinguished name of the search base.
";
$elem["shared/ldapns/base-dn"]["descriptionde"]="Eindeutiger Name (DN - distinguished name) der Suchbasis:
 Bitte geben Sie den eindeutigen Namen der LDAP-Suchbasis ein. Häufig werden Teile des eigenen Domänennamens für diesen Zweck benutzt. Beispielsweise würde die Domäne »example.net« als DN der Suchbasis »dc=example,dc=net« benutzen.
";
$elem["shared/ldapns/base-dn"]["descriptionfr"]="Nom distinctif (DN) de la base de recherche :
 Veuillez indiquer le nom distinctif de la base de recherche LDAP. La majorité des sites utilisent les composants de leur nom de domaine. Ainsi, pour le domaine « exemple.net », le nom distinctif utilisé serait « dc=exemple,dc=net ».
";
$elem["shared/ldapns/base-dn"]["default"]="dc=example,dc=net";
$elem["libpam-ldap/pam_password"]["type"]="select";
$elem["libpam-ldap/pam_password"]["choices"][1]="clear";
$elem["libpam-ldap/pam_password"]["choices"][2]="crypt";
$elem["libpam-ldap/pam_password"]["choices"][3]="nds";
$elem["libpam-ldap/pam_password"]["choices"][4]="ad";
$elem["libpam-ldap/pam_password"]["choices"][5]="exop";
$elem["libpam-ldap/pam_password"]["choicesde"][1]="Klartext";
$elem["libpam-ldap/pam_password"]["choicesde"][2]="Crypt";
$elem["libpam-ldap/pam_password"]["choicesde"][3]="NDS";
$elem["libpam-ldap/pam_password"]["choicesde"][4]="AD";
$elem["libpam-ldap/pam_password"]["choicesde"][5]="Exop";
$elem["libpam-ldap/pam_password"]["choicesfr"][1]="En clair";
$elem["libpam-ldap/pam_password"]["choicesfr"][2]="Chiffré";
$elem["libpam-ldap/pam_password"]["choicesfr"][3]="NDS Novell";
$elem["libpam-ldap/pam_password"]["choicesfr"][4]="Active Directory";
$elem["libpam-ldap/pam_password"]["choicesfr"][5]="EXOP OpenLDAP";
$elem["libpam-ldap/pam_password"]["description"]="Local encryption algorithm to use for passwords:
 The PAM module can encrypt the password locally when changing it,
 which is recommended:
  * clear: no encryption. This should be chosen when LDAP servers
    automatically encrypt the userPassword entry;
  * crypt: make userPassword use the same format as the flat
    local password database. If in doubt, you should choose this option;
  * nds: use Novell Directory Services-style updating. The old
    password is first removed, then updated;
  * ad: Active Directory-style. This creates a Unicode password and
    updates the unicodePwd attribute;
  * exop: use the OpenLDAP password change extended operation to update the
    password.
";
$elem["libpam-ldap/pam_password"]["descriptionde"]="Zu verwendende Verschlüsselungsmethode für Passwörter:
 Die PAM-Module können das Passwort lokal verschlüsseln, wenn es geändertwird. Dies wird empfohlen:
  * Klartext: keine Verschlüsselung. Dies sollte gewählt werden, falls die
    LDAP-Server den userPassword-Eintrag automatisch verschlüsseln;
  * Crypt: verwendet für userPassword das gleiche Format wie die lokale
    Passwort-Datenbank. Im Zweifel sollten Sie diese Option wählen;
  * NDS: verwendet Novell-Directory-Services-artige Aktualisierung. Das alte
    Passwort wird zuerst entfernt und dann aktualisiert;
  * AD: Active-Directory-artig. Dies erzeugt ein Unicode-Passwort und
    akualisiert das unicodePwd-Attribut;
  * Exop: verwendet die Erweiterungsfunktion von OpenLDAP zur Änderung von
    Passwörtern.
";
$elem["libpam-ldap/pam_password"]["descriptionfr"]="Algorithme de chiffrement à utiliser localement pour les mots de passe :
 Le module PAM peut chiffrer localement le mot de passe lors d'un changement, ce qui est le comportement recommandé :
  - En clair : pas de chiffrement. Peut être choisi lorsque les 
               serveurs LDAP chiffrent automatiquement l'attribut 
               « userPassword »;
  - Chiffré  : l'attribut « userPassword » utilise le même format que les
               mots de passe locaux. Option à choisir en cas de doute;
  - NDS      : méthode « Novell Directory Services » : l'ancien mot
               de passe est d'abord supprimé, puis mis à jour;
  - Active Directory : 
               méthode « Active Directory » : crée un mot de passe 
               Unicode et met à jour l'attribut « unicodePwd »;
  - EXOP     : méthode de changement de mot de passe d'OpenLDAP.
";
$elem["libpam-ldap/pam_password"]["default"]="crypt";
$elem["shared/ldapns/ldap_version"]["type"]="select";
$elem["shared/ldapns/ldap_version"]["choices"][1]="3";
$elem["shared/ldapns/ldap_version"]["description"]="LDAP version to use:
 Please choose the version of the LDAP protocol that should be used by
 ldapns. Using the highest available version number is recommended.
";
$elem["shared/ldapns/ldap_version"]["descriptionde"]="Zu verwendende LDAP-Version:
 Bitte wählen Sie, welche Version des LDAP-Protokolls von Ldapns genutzt werden soll. Es wird empfohlen, die höchste verfügbare Versionsnummer zu verwenden.
";
$elem["shared/ldapns/ldap_version"]["descriptionfr"]="Version de LDAP à utiliser :
 Veuillez choisir la version du protocole LDAP que doit utiliser « ldapns ». Il est conseillé d'utiliser le numéro de version le plus élevé possible.
";
$elem["shared/ldapns/ldap_version"]["default"]="3";
$elem["libpam-ldap/binddn"]["type"]="string";
$elem["libpam-ldap/binddn"]["description"]="LDAP login user account:
 Please enter the name of the LDAP account that should be used for
 non-administrative (read-only) database logins.
 .
 It is highly recommended to use an unprivileged account, because
 the configuration file that contains the account name and password
 must be world-readable.
";
$elem["libpam-ldap/binddn"]["descriptionde"]="Benutzerkonto für die LDAP-Anmeldung:
 Bitte geben Sie den Namen eines LDAP-Kontos zur Anmeldung bei der LDAP-Datenbank für nichtadministrative Zwecke (nur lesen) ein.
 .
 Es wird dringend empfohlen, ein nichtprivilegiertes Konto zu verwenden, weil die Konfigurationsdatei, die den Namen und das Passwort für dieses Konto enthält, für jeden lesbar sein muss.
";
$elem["libpam-ldap/binddn"]["descriptionfr"]="Compte utilisateur d'ouverture de session LDAP :
 Veuillez indiquer le nom du compte LDAP qui devrait être utilisé pour les ouvertures de session en lecture seule (accès non administrateur) dans la base de données LDAP.
 .
 Il est fortement recommandé d'utiliser un compte sans privilièges car le fichier de configuration qui contient le nom et le mot de passe du compte sera accessible en lecture.
";
$elem["libpam-ldap/binddn"]["default"]="cn=proxyuser,dc=example,dc=net";
$elem["libpam-ldap/dbrootlogin"]["type"]="boolean";
$elem["libpam-ldap/dbrootlogin"]["description"]="Allow LDAP admin account to behave like local root?
 This option will allow password utilities that use PAM to
 change local passwords.
 .
 The LDAP admin account password will be stored in a separate file which will be made
 readable to root only.
 .
 If /etc is mounted by NFS, this option should be disabled.
";
$elem["libpam-ldap/dbrootlogin"]["descriptionde"]="Dem LDAP-Administrator-Konto erlauben, sich wie der lokale root zu verhalten?
 Diese Einstellung ermöglicht es Passwort-Werkzeugen, die PAM verwenden, lokale Passwörter zu ändern.
 .
 Das Passwort für das LDAP-Administrations-Konto wird in einer separaten Datei gespeichert, welche nur von root gelesen werden kann.
 .
 Falls /etc über NFS eingebunden wird, sollte diese Option deaktiviert werden.
";
$elem["libpam-ldap/dbrootlogin"]["descriptionfr"]="Donner les privilèges de superutilisateur local au compte administrateur LDAP ?
 Si vous choisissez cette option, les outils de gestion de mots de passe qui utilisent PAM pourront changer les mots de passe locaux.
 .
 Le mot de passe du compte d'administrateur LDAP sera conservé dans un fichier séparé accessible au seul superutilisateur local (« root »).
 .
 Si /etc est monté par NFS, cette option doit être désactivée.
";
$elem["libpam-ldap/dbrootlogin"]["default"]="true";
$elem["shared/ldapns/ldap-server"]["type"]="string";
$elem["shared/ldapns/ldap-server"]["description"]="LDAP server URI:
 Please enter the Uniform Resource Identifier of the LDAP server.
 The format is 'ldap://<hostname_or_IP>:<port>/'. Alternatively,
 'ldaps://' or 'ldapi://' can be used. The port number is optional.
 .
 Using an IP address is recommended to avoid failures when
 domain name services are unavailable.
";
$elem["shared/ldapns/ldap-server"]["descriptionde"]="URI des LDAP-Servers:
 Bitte geben Sie den Uniform Resource Identifier des LDAP-Servers ein. Das verwendete Format ist »ldap://<Rechnername_oder_IP-Adresse>:<Port>/«. Alternativ können »ldaps://« oder »ldapi://« benutzt werden. Die Portnummer ist optional.
 .
 Achtung: Die Verwendung einer IP-Adresse wird empfohlen, um Ausfälle zu vermeiden, wenn die Namensauflösung nicht funktioniert.
";
$elem["shared/ldapns/ldap-server"]["descriptionfr"]="Identifiant uniforme de ressource (« URI ») du serveur LDAP :
 Veuillez indiquer l'identifiant uniforme de ressource (« URI ») d'accès au serveur LDAP. Le format est « ldap://<hôte ou IP>:<port>/ ». Des URI utilisant « ldaps:// » ou « ldapi:// » sont également possibles. Le numéro de port est facultatif.
 .
 L'utilisation d'une adresse IP est recommandée pour éviter les échecs lorsque les services de noms de domaine sont indisponibles.
";
$elem["shared/ldapns/ldap-server"]["default"]="ldapi:///";
$elem["libpam-ldap/bindpw"]["type"]="password";
$elem["libpam-ldap/bindpw"]["description"]="Password for LDAP login user:
 Please enter the password for the nonadministrative LDAP login account.
";
$elem["libpam-ldap/bindpw"]["descriptionde"]="Passwort des Benutzerkontos zur LDAP-Anmeldung:
 Bitte geben Sie das Passwort für die nichtadministrative LDAP-Anmeldung ein.
";
$elem["libpam-ldap/bindpw"]["descriptionfr"]="Mot de passe de l'utilisateur de la base LDAP :
 Veuillez indiquer le mot de passe pour le compte d'ouverture de session LDAP en lecture seule.
";
$elem["libpam-ldap/bindpw"]["default"]="";
$elem["libpam-ldap/override"]["type"]="boolean";
$elem["libpam-ldap/override"]["description"]="Manage libpam-ldap configuration automatically?
 The libpam-ldap package configuration may be managed automatically
 using answers to questions asked during the configuration process.
 The resulting configuration file may overwrite local changes.
 .
 If you do not choose this option, no further questions will be asked
 and the configuration will need to be done manually.
";
$elem["libpam-ldap/override"]["descriptionde"]="Die Konfiguration von libpam-ldap automatisch verwalten?
 Die Konfiguration des libpam-ldap-Pakets kann automatisch durch Antworten auf Fragen, die während des Konfigurationsprozesses gestellt werden, verwaltet werden. Die resultierende Konfiguration könnte lokale Änderungen überschreiben.
 .
 Falls Sie diese Option nicht wählen, werden keine weiteren Fragen gestellt, und die Konfiguration muss manuell durchgeführt werden.
";
$elem["libpam-ldap/override"]["descriptionfr"]="Faut-il gérer la configuration de libpam-ldap automatiquement ?
 La configuration du paquet libpam-ldap peut être gérée automatiquement en utilisant les réponses aux questions posées lors de l'étape de configuration. Le fichier de configuration obtenu peut écraser des changements locaux.
 .
 Si vous refusez cette option, plus aucune question ne vous sera posée et vous devrez configurer le paquet vous-même.
";
$elem["libpam-ldap/override"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
