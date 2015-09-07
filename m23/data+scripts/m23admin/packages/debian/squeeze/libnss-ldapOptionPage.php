<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libnss-ldap");

$elem["libnss-ldap/confperm"]["type"]="boolean";
$elem["libnss-ldap/confperm"]["description"]="Make the configuration file readable/writeable by its owner only?
 If you use passwords in your libnss-ldap configuration, it is usually a
 good idea to have the configuration set with mode 0600 (readable and
 writable only by the file's owner).
 .
 Note: As a sanity check, libnss-ldap will check if you have nscd installed
 and will only set the mode to 0600 if nscd is present.
";
$elem["libnss-ldap/confperm"]["descriptionde"]="Einstellungen nur für den Eigentümer les- und schreibbar machen?
 Falls Sie Passwörter in Ihrer Libnss-ldap-Konfigurationdatei verwenden, wird empfohlen, die Rechte der Datei auf 0600 einzustellen (les- und schreibbar nur für den Eigentümer).
 .
 Anmerkung: Libnss-ldap testet sinnvollerweise, ob Sie Nscd installiert haben und setzt den Modus 0600 nur, wenn es Nscd findet.
";
$elem["libnss-ldap/confperm"]["descriptionfr"]="Rendre le fichier de configuration lisible et modifiable uniquement par son propriétaire ?
 Si vous utilisez des mots de passe dans la configuration de libnss-ldap, mettre le système des permissions à 0600 (seul le propriétaire peut lire ou modifier le fichier) est recommandé.
 .
 Note : bien sûr, libnss-ldap vérifiera que nscd est installé et ne mettra le mode à 0600 que si nscd est présent.
";
$elem["libnss-ldap/confperm"]["default"]="false";
$elem["libnss-ldap/nsswitch"]["type"]="note";
$elem["libnss-ldap/nsswitch"]["description"]="nsswitch.conf not managed automatically
 For the libnss-ldap package to work, you need to modify your
 /etc/nsswitch.conf to use the \"ldap\" datasource.  There is an example
 file at /usr/share/doc/libnss-ldap/examples/nsswitch.ldap which can
 be used as an example for your nsswitch setup, or it can be copied
 over your current setup.
 .
 Also, before removing this package, it is wise to remove the \"ldap\" entries
 from nsswitch.conf to keep basic services functioning.
";
$elem["libnss-ldap/nsswitch"]["descriptionde"]="nsswitch.conf wird nicht automatisch verwaltet
 Für die Funktionsfähigkeit dieses Pakets, müssen Sie Ihre Datei /etc/nsswitch.conf anpassen, so dass die LDAP-Datenquelle verwendet wird. Es gibt die Beispieldatei /usr/share/doc/libnss-ldap/examples/nsswitch.ldap, die als Vorlage für Ihre Nsswitch-Einstellungen verwendet oder mit der Ihre aktuellen Einstellungen überschrieben werden kann.
 .
 Außerdem sollten Sie die »LDAP«-Einträge aus der Datei nsswitch.conf löschen, bevor Sie dieses Paket entfernen, damit die grundsätzlichen Dienste weiter arbeiten können.
";
$elem["libnss-ldap/nsswitch"]["descriptionfr"]="Le fichier nsswitch.conf n'est pas géré automatiquement
 Pour que le paquet libnss-ldap fonctionne, vous devez modifier /etc/nsswitch.conf pour qu'il utilise la base de données LDAP. Un fichier modèle se trouve dans /usr/share/doc/libnss-ldap/examples/nsswitch.ldap ; vous pouvez l'utiliser pour la configuration de nsswitch ou bien le mettre à la place de votre configuration actuelle.
 .
 Avant de supprimer ce paquet, il est sage de supprimer les entrées « ldap © du fichier nsswitch.conf pour que les services de base continuent à fonctionner.
";
$elem["libnss-ldap/nsswitch"]["default"]="";
$elem["shared/ldapns/base-dn"]["type"]="string";
$elem["shared/ldapns/base-dn"]["description"]="Distinguished name of the search base:
 Please enter the distinguished name of the LDAP search base.  Many sites
 use the components of their domain names for this purpose.  For example,
 the domain \"example.net\" would use \"dc=example,dc=net\" as the
 distinguished name of the search base.
";
$elem["shared/ldapns/base-dn"]["descriptionde"]="Eindeutiger Name (DN - distinguished name) der Suchbasis:
 Bitte geben Sie den DN der LDAP-Suchbasis ein. Häufig werden Teile des eigenen Domänennamens für diesen Zweck benutzt. Beispielsweise würde die Domäne »example.net« als DN der Suchbasis »dc=example,dc=net« benutzen.
";
$elem["shared/ldapns/base-dn"]["descriptionfr"]="Nom distinctif (DN) de la base de recherche :
 Veuillez indiquer le nom distinctif de la base de recherche. Beaucoup de sites utilisent ici les composants de leurs noms de domaine. Ainsi, pour le domaine « exemple.net », le nom distinctif utilisé serait « dc=exemple,dc=net ».
";
$elem["shared/ldapns/base-dn"]["default"]="dc=example,dc=net";
$elem["libnss-ldap/dblogin"]["type"]="boolean";
$elem["libnss-ldap/dblogin"]["description"]="Does the LDAP database require login?
 Choose this option if you can't retrieve entries from
 the database without logging in.
 .
 Note: Under a normal setup, this is not needed.
";
$elem["libnss-ldap/dblogin"]["descriptionde"]="Benötigt die LDAP-Datenbank eine Anmeldung?
 Stimmen Sie nur zu, wenn die Datenbank ohne vorherige Anmeldung keine Abfragen beantwortet.
 .
 Anmerkung: Normalerweise ist das nicht nötig.
";
$elem["libnss-ldap/dblogin"]["descriptionfr"]="La base LDAP demande-t-elle une identification ?
 Choisissez cette option s'il est nécessaire de s'identifier avant de pouvoir utiliser la base.
 .
 Note : avec une configuration classique, ce n'est pas nécessaire.
";
$elem["libnss-ldap/dblogin"]["default"]="false";
$elem["libnss-ldap/override"]["type"]="boolean";
$elem["libnss-ldap/override"]["description"]="Automatically update libnss-ldap's configuration file?
 The libnss-ldap package may use debconf for its configuration.
 .
 If you choose this option, the configuration file will be prepended
 with \"###DEBCONF###\"; you can disable the debconf updates by removing
 that line.
 .
 All new installations will use this option by default.
";
$elem["libnss-ldap/override"]["descriptionde"]="Soll die Konfigurationsdatei von Libnss-ldap automatisch aktualisiert werden?
 Libnss-ldap kann Debconf für seine Einrichtung benutzen.
 .
 Wenn Sie zustimmen, wird der Datei ein »###DEBCONF###« vorangestellt; Sie können die Aktualisierung durch Debconf verhindern, indem Sie diese Zeile entfernen.
 .
 Bei allen Neuinstallationen ist das voreingestellt.
";
$elem["libnss-ldap/override"]["descriptionfr"]="Faut-il gérer le fichier de configuration de libnss-ldap automatiquement ?
 Le paquet libnss-ldap a été modifié pour pouvoir utiliser debconf pour sa configuration.
 .
 Si vous choisissez cette option, ce fichier commencera par « ###DEBCONF### » ; vous pouvez désactiver la gestion par debconf en supprimant cette ligne.
 .
 Cette possibilité est activée par défaut pour les premières installations.
";
$elem["libnss-ldap/override"]["default"]="true";
$elem["libnss-ldap/binddn"]["type"]="string";
$elem["libnss-ldap/binddn"]["description"]="Unprivileged database user:
 Please enter the name of the account that will be used to log in to the LDAP
 database.
";
$elem["libnss-ldap/binddn"]["descriptionde"]="nicht privilegierter Datenbank-Nutzer:
 Bitte geben Sie den Namen eines Benutzerkontos für die Anmeldung an der LDAP-Datenbank ein.
";
$elem["libnss-ldap/binddn"]["descriptionfr"]="Utilisateur non privilégié de la base :
 Veuillez indiquer l'identifiant qui permettra l'accès à la base LDAP.
";
$elem["libnss-ldap/binddn"]["default"]="cn=proxyuser,dc=example,dc=net";
$elem["libnss-ldap/bindpw"]["type"]="password";
$elem["libnss-ldap/bindpw"]["description"]="Password for database login account:
 Please enter the password that will be used to log in to the LDAP database.
";
$elem["libnss-ldap/bindpw"]["descriptionde"]="Passwort des Benutzerkontos für die Datenbankanmeldung:
 Bitte geben Sie das Passwort für die Anmeldung an der LDAP-Datenbank ein.
";
$elem["libnss-ldap/bindpw"]["descriptionfr"]="Mot de passe de l'utilisateur de la base :
 Veuillez indiquer le mot de passe qui permettra l'accès à la base LDAP.
";
$elem["libnss-ldap/bindpw"]["default"]="";
$elem["shared/ldapns/ldap_version"]["type"]="select";
$elem["shared/ldapns/ldap_version"]["choices"][1]="3";
$elem["shared/ldapns/ldap_version"]["description"]="LDAP version to use:
 Please enter which version of the LDAP protocol should be used by
 ldapns.  It is usually a good idea to set this to the highest
 available version number.
";
$elem["shared/ldapns/ldap_version"]["descriptionde"]="Benutzte LDAP-Version:
 Bitte geben Sie an, welche Version des LDAP-Protokolls von Ldapns genutzt werden soll. Es wird empfohlen, die höchstmögliche Versionsnummer anzugeben.
";
$elem["shared/ldapns/ldap_version"]["descriptionfr"]="Version de LDAP à utiliser :
 Veuillez indiquer la version du protocole LDAP que doit utiliser ldapns. Il est recommandé de choisir le numéro de version le plus élevé disponible.
";
$elem["shared/ldapns/ldap_version"]["default"]="3";
$elem["shared/ldapns/ldap-server"]["type"]="string";
$elem["shared/ldapns/ldap-server"]["description"]="LDAP server Uniform Resource Identifier:
 Please enter the URI of the LDAP server used. This is a string in the
 form ldap://<hostname or IP>:<port>/ . ldaps:// or ldapi:// can also
 be used. The port number is optional.
 .
 Note: It is usually a good idea to use an IP address; this reduces risks
 of failure in the event name service is unavailable.
";
$elem["shared/ldapns/ldap-server"]["descriptionde"]="URI (Uniform Resource Identifier) des LDAP-Servers:
 Bitte geben Sie den URI des LDAP-Servers ein. Das ist eine Zeichenkette wie »ldap://<Rechnername oder IP-Adresse>:<Port>/«. »ldaps://« oder »ldapi://« können auch benutzt werden. Die Portnummer muss nicht angegeben werden.
 .
 Achtung: Es wird empfohlen, eine IP-Adresse zu verwenden; das reduziert das Risiko eines Ausfalls, falls die Namensauflösung nicht funktioniert.
";
$elem["shared/ldapns/ldap-server"]["descriptionfr"]="URI du serveur LDAP :
 Veuillez indiquer l'URI d'accès au serveur LDAP. Il s'agit en général d'une chaîne de caractères sous la forme « ldap://<hôte ou IP>:<port>/ ». Des URI utilisant « ldaps:// » ou « ldapi:// » sont également possibles. Le numéro de port est facultatif.
 .
 Note : utiliser une adresse IP est recommandé ; les risques d'échec sont réduits en cas d'indisponibilité du service de noms.
";
$elem["shared/ldapns/ldap-server"]["default"]="ldap://127.0.0.1/";
$elem["libnss-ldap/dbrootlogin"]["type"]="boolean";
$elem["libnss-ldap/dbrootlogin"]["description"]="Special LDAP privileges for root?
 This option will allow tools that perform requests to the nss system
 with libnss-ldap as backend to return more information when called
 as root.
 .
 If you are using NFS mounted /etc or any other custom setup, you should
 disable this.
";
$elem["libnss-ldap/dbrootlogin"]["descriptionde"]="Besondere LDAP-Berechtigungen für Root?
 Diese Einstellung gibt Hilfsprogrammen, die Anfragen an das NSS-System mittels Libnss-ldap stellen, die Möglichkeit, mehr Informationen zurück zu geben, wenn sie vom Benutzer Root ausgeführt werden.
 .
 Wenn Sie das Verzeichnis /etc mittels NFS eingebunden haben oder andere, besondere Einstellungen verwenden, sollten Sie hier ablehnen.
";
$elem["libnss-ldap/dbrootlogin"]["descriptionfr"]="Privilèges LDAP spécifiques pour le superutilisateur ?
 Cette option permet aux outils qui interrogent le système NSS avec libnss-ldap de récupérer des informations supplémentaires lorsqu'ils sont utilisés par le superutilisateur (« root »).
 .
 Si vous utilisez un répertoire /etc monté par NFS ou toute autre combinaison de réglages similaire, vous devriez désactiver cette option.
";
$elem["libnss-ldap/dbrootlogin"]["default"]="true";
$elem["libnss-ldap/rootbinddn"]["type"]="string";
$elem["libnss-ldap/rootbinddn"]["description"]="LDAP account for root:
 Please choose which account will be used for nss requests with root
 privileges.
 .
 Note: For this to work the account needs permission to access the
 attributes in the LDAP directory that are related to the users' shadow
 entries as well as users' and groups' passwords.
";
$elem["libnss-ldap/rootbinddn"]["descriptionde"]="LDAP-Zugang für Root:
 Bitte wählen Sie aus, welches Benutzerkonto für NSS-Anfragen mit Root-Rechten benutzt wird.
 .
 Anmerkung: Damit das funktioniert, benötigt der Benutzer die Berechtigung auf die Attribute im LDAP-Verzeichnis zuzugreifen, die sich auf die verborgenen Einträge (shadow entries) der Benutzer sowie die Passwörter der Benutzer und Gruppen beziehen.
";
$elem["libnss-ldap/rootbinddn"]["descriptionfr"]="Compte LDAP pour le superutilisateur (« root ») :
 Veuillez indiquer le compte qui sera utilisé pour les requêtes NSS avec les privilèges du superutilisateur.
 .
 Note : pour que cette fonctionnalité soit opérationnelle, ce compte doit être autorisé à accéder aux attributs du répertoire LDAP qui correspondent aux entrées masquées (« shadow ») des utilisateurs ainsi qu'aux mots de passe des utilisateurs et des groupes.
";
$elem["libnss-ldap/rootbinddn"]["default"]="cn=manager,dc=example,dc=net";
$elem["libnss-ldap/rootbindpw"]["type"]="password";
$elem["libnss-ldap/rootbindpw"]["description"]="LDAP root account password:
 Please enter the password to use when libnss-ldap tries to
 login to the LDAP directory using the LDAP account for root.
 .
 The password will be stored in a separate file /etc/libnss-ldap.secret
 which will be made readable to root only.
 .
 Entering an empty password will re-use the old password.
";
$elem["libnss-ldap/rootbindpw"]["descriptionde"]="Passwort des LDAP-Zugangs für Root:
 Bitte geben Sie das Passwort ein, das verwendet wird, wenn Libnss-ldap sich mit dem LDAP-Zugang für Root am LDAP-Verzeichnis anmeldet.
 .
 Das Passwort wird in einer eigenen Datei /etc/libnss-ldap.secret gespeichert, die nur für Root lesbar ist.
 .
 Bleibt das Passwortfeld leer, wird das alte Passwort wieder benutzt.
";
$elem["libnss-ldap/rootbindpw"]["descriptionfr"]="Mot de passe du compte du superutilisateur LDAP :
 Veuillez indiquer le mot de passe qui sera utilisé lorsque libnss-ldap se connectera au répertoire LDAP avec le compte du superutilisateur.
 .
 Ce mot de passe sera conservé dans un fichier à part (/etc/libnss-ldap.secret) qui ne sera accessible qu'au superutilisateur (« root »).
 .
 Si vous indiquez un mot de passe vide, l'ancien mot de passe sera utilisé.
";
$elem["libnss-ldap/rootbindpw"]["default"]="";
PKG_OptionPageTail2($elem);
?>
