<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libpam-ldap");

$elem["libpam-ldap/rootbinddn"]["type"]="string";
$elem["libpam-ldap/rootbinddn"]["description"]="LDAP account for root:
 This account will be used when root changes a password.
 .
 Note: This account has to be a privileged account.
";
$elem["libpam-ldap/rootbinddn"]["descriptionde"]="LDAP-Zugang für Root:
 Dieses Konto wird verwendet, wenn root ein Passwort ändert.
 .
 Hinweis: Dies muss ein privilegiertes Konto sein.
";
$elem["libpam-ldap/rootbinddn"]["descriptionfr"]="Compte LDAP pour le superutilisateur (« root ») :
 Veuillez indiquer l'identifiant qui servira à modifier les mots de passe.
 .
 Veuillez noter que cet identifiant doit posséder des privilèges d'administrateur.
";
$elem["libpam-ldap/rootbinddn"]["default"]="cn=manager,dc=example,dc=net";
$elem["libpam-ldap/rootbindpw"]["type"]="password";
$elem["libpam-ldap/rootbindpw"]["description"]="LDAP root account password:
 Please enter the password to use when ${package} tries to
 login to the LDAP directory using the LDAP account for root.
 .
 The password will be stored in a separate file ${filename}
 which will be made readable to root only.
 .
 Entering an empty password will re-use the old password.
";
$elem["libpam-ldap/rootbindpw"]["descriptionde"]="Passwort des LDAP-Zugangs für Root:
 Bitte geben Sie das Passwort ein, das verwendet wird, wenn ${package} sich mit dem LDAP-Zugang für Root am LDAP-Verzeichnis anmeldet.
 .
 Das Passwort wird in einer eigenen Datei ${filename} gespeichert, die nur für Root lesbar ist.
 .
 Bleibt das Passwortfeld leer, wird das alte Passwort wieder benutzt.
";
$elem["libpam-ldap/rootbindpw"]["descriptionfr"]="Mot de passe du compte du superutilisateur LDAP :
 Veuillez indiquer le mot de passe qui sera utilisé lorsque ${package} se connectera au répertoire LDAP avec le compte du superutilisateur.
 .
 Ce mot de passe sera conservé dans un fichier à part (${filename}) qui ne sera accessible qu'au superutilisateur (« root »).
 .
 Sans saisie de votre part, l'ancien mot de passe sera réutilisé.
";
$elem["libpam-ldap/rootbindpw"]["default"]="";
$elem["libpam-ldap/dblogin"]["type"]="boolean";
$elem["libpam-ldap/dblogin"]["description"]="Does the LDAP database require login?
 Choose this option if you can't retrieve entries from
 the database without logging in.
 .
 Note: Under a normal setup, this is not needed.
";
$elem["libpam-ldap/dblogin"]["descriptionde"]="Benötigt die LDAP-Datenbank eine Anmeldung?
 Stimmen Sie nur zu, wenn die Datenbank ohne vorherige Anmeldung keine Abfragen beantwortet.
 .
 Anmerkung: Normalerweise ist das nicht nötig.
";
$elem["libpam-ldap/dblogin"]["descriptionfr"]="La base LDAP demande-t-elle une identification ?
 Choisissez cette option s'il est nécessaire de s'identifier avant de pouvoir utiliser la base.
 .
 Note : inutile avec une configuration classique.
";
$elem["libpam-ldap/dblogin"]["default"]="false";
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
$elem["libpam-ldap/pam_password"]["type"]="select";
$elem["libpam-ldap/pam_password"]["choices"][1]="clear";
$elem["libpam-ldap/pam_password"]["choices"][2]="crypt";
$elem["libpam-ldap/pam_password"]["choices"][3]="nds";
$elem["libpam-ldap/pam_password"]["choices"][4]="ad";
$elem["libpam-ldap/pam_password"]["choices"][5]="exop";
$elem["libpam-ldap/pam_password"]["choicesde"][1]="clear";
$elem["libpam-ldap/pam_password"]["choicesde"][2]="crypt";
$elem["libpam-ldap/pam_password"]["choicesde"][3]="nds";
$elem["libpam-ldap/pam_password"]["choicesde"][4]="ad";
$elem["libpam-ldap/pam_password"]["choicesde"][5]="exop";
$elem["libpam-ldap/pam_password"]["choicesfr"][1]="En clair";
$elem["libpam-ldap/pam_password"]["choicesfr"][2]="Chiffré";
$elem["libpam-ldap/pam_password"]["choicesfr"][3]="NDS Novell";
$elem["libpam-ldap/pam_password"]["choicesfr"][4]="Active Directory";
$elem["libpam-ldap/pam_password"]["choicesfr"][5]="EXOP OpenLDAP";
$elem["libpam-ldap/pam_password"]["description"]="Local crypt to use when changing passwords.
 The PAM module can set the password crypt locally when changing the
 passwords, this is usually a good choice. By setting this to something
 else than clear you are making sure that the password gets crypted in some
 way.
 .
 The meanings for selections are:
 .
 clear - Don't set any encryptions, this is useful with servers that
 automatically encrypt userPassword entry.
 .
 crypt - (Default) make userPassword use the same format as the flat
 filesystem. this will work for most configurations
 .
 nds - Use Novell Directory Services-style updating, first remove the old
 password and then update with cleartext password.
 .
 ad - Active Directory-style. Create Unicode password and update unicodePwd
 attribute
 .
 exop - Use the OpenLDAP password change extended operation to update the
 password.
";
$elem["libpam-ldap/pam_password"]["descriptionde"]="Zu verwendende Verschlüsselungsmethode, wenn Passwörter geändert werden.
 Das PAM-Modul kann die Passwort-Verschlüsselung bei Änderung eines Passwortes lokal vornehmen. Das ist normalerweise eine gute Wahl. Mit der Angabe einer anderen Methode als »clear« (unverschlüsselt), wird sichergestellt, dass das Passwort auf irgendeine Weise verschlüsselt wird.
 .
 Die Bedeutungen der Auswahl sind:
 .
 clear - Keine Verschlüsselung. Dies ist bei Servern nützlich, die automatisch das »userPassword«-Attribut verschlüsseln.
 .
 crypt - (Voreinstellung) Verwendet dasselbe Format für »userPassword« wie für /etc/passwd bzw. /etc/shadow angewendet wird. Dies sollte für die meisten Konfigurationen funktionieren.
 .
 nds - Verwendet den Mechanismus der Novell Directory Services. Zuerst wird das alte Passwort gelöscht und dann mit dem neuen im Klartext aktualisiert.
 .
 ad - Active-Directory-Methode. Dies erzeugt ein Unicode-Passwort und aktualisiert damit das »unicodePwd«-Attribut.
 .
 exop - Verwendet die erweiterte Funktion von OpenLDAP zur Aktualisierung des Passwortes.
";
$elem["libpam-ldap/pam_password"]["descriptionfr"]="Méthode de chiffrement lors du changement de mot de passe :
 Le module PAM peut choisir une méthode locale de chiffrement des mots de passe en cas de changement. C'est généralement préférable. En choisissant autre chose que « en clair », vous êtes certain que les mots de passe seront chiffrés d'une manière ou d'une autre.
 .
 Détail des choix possibles :
 .
 En clair :        ne pas utiliser de chiffrement. Utile pour les
                   serveurs qui chiffrent automatiquement l'entrée
                   userPassword ;
 .
 Chiffré :         userPassword utilisera le même format que pour le
                   fichier de mots de passe du système. Fonctionne
                   avec la plupart des configurations ;
 .
 NDS Novell :       utilisation du système d'annuaire Novell (« Novell
                    Directory Service ») pour les mises à jour. L'ancien
                    mot de passe est tout d'abord effacé puis mis à jour
                    en clair ;
 .
 Active Directory : utilisation d'« Active Directory ». Un mot de passe est
                    créé et l'attribut « unicodePwd » est mis à jour ;
 .
 EXOP OpenLDAP :    utilisation de l'opération étendue d'échange de mots
                    de passe d'OpenLDAP pour mettre à jour les mots de
                    passe ;
";
$elem["libpam-ldap/pam_password"]["default"]="crypt";
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
$elem["libpam-ldap/binddn"]["type"]="string";
$elem["libpam-ldap/binddn"]["description"]="Unprivileged database user:
 Please enter the name of the account that will be used to log in to the LDAP
 database.
 .
 Warning: DO NOT use privileged accounts for logging in, the configuration
 file has to be world readable.
";
$elem["libpam-ldap/binddn"]["descriptionde"]="nicht privilegierter Datenbank-Nutzer:
 Bitte geben Sie den Namen eines Benutzerkontos für die Anmeldung an der LDAP-Datenbank ein.
 .
 Warnung: Verwenden Sie KEINE privilegierten Konten zur Anmeldung. Die Konfigurationsdatei muss für jeden lesbar sein.
";
$elem["libpam-ldap/binddn"]["descriptionfr"]="Utilisateur non privilégié de la base :
 Veuillez indiquer l'identifiant qui permettra l'accès à la base LDAP.
 .
 Attention : NE choisissez PAS de compte privilégié pour cela, car le fichier de configuration pourra être lu par tous.
";
$elem["libpam-ldap/binddn"]["default"]="cn=proxyuser,dc=example,dc=net";
$elem["libpam-ldap/dbrootlogin"]["type"]="boolean";
$elem["libpam-ldap/dbrootlogin"]["description"]="Make local root Database admin.
 This option will allow you to make password utilities that use pam, to
 behave like you would be changing local passwords.
 .
 The password will be stored in a separate file which will be made
 readable to root only.
 .
 If you are using NFS mounted /etc or any other custom setup, you should
 disable this.
";
$elem["libpam-ldap/dbrootlogin"]["descriptionde"]="Lokalen root zum Datenbank-Administrator machen.
 Diese Einstellung ermöglicht, dass Passwort-Werkzeuge, die PAM verwenden, sich verhalten, als wenn lokale Passwörter geändert würden.
 .
 Das Passwort wird in einer separaten Datei gespeichert, welche nur von root gelesen werden kann.
 .
 Falls Sie /etc über NFS einhängen oder irgendeine andere maßgeschneiderte Konfiguration verwenden, sollten Sie dies deaktivieren.
";
$elem["libpam-ldap/dbrootlogin"]["descriptionfr"]="Le superutilisateur local doit-il être un administrateur de la base LDAP ?
 Cette option permet aux outils utilisant PAM de se comporter comme si vous changiez les mots de passe locaux.
 .
 Le mot de passe sera conservé dans un fichier séparé accessible au seul superutilisateur.
 .
 Si votre répertoire /etc est monté en NFS ou tout autre réglage spécifique, vous devriez désactiver cette option.
";
$elem["libpam-ldap/dbrootlogin"]["default"]="true";
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
$elem["shared/ldapns/ldap-server"]["default"]="ldapi:///";
$elem["libpam-ldap/bindpw"]["type"]="password";
$elem["libpam-ldap/bindpw"]["description"]="Password for database login account:
 Please enter the password that will be used to log in to the LDAP database.
";
$elem["libpam-ldap/bindpw"]["descriptionde"]="Passwort des Benutzerkontos für die Datenbankanmeldung:
 Bitte geben Sie das Passwort für die Anmeldung an der LDAP-Datenbank ein.
";
$elem["libpam-ldap/bindpw"]["descriptionfr"]="Mot de passe de l'utilisateur de la base :
 Veuillez indiquer le mot de passe qui permettra l'accès à la base LDAP.
";
$elem["libpam-ldap/bindpw"]["default"]="";
$elem["libpam-ldap/override"]["type"]="boolean";
$elem["libpam-ldap/override"]["description"]="Make debconf change your config?
 libpam-ldap has been moved to use debconf for its configuration. Should
 the settings in debconf be applied to the configuration?  Package
 upgrades will use your answer here going forward.
";
$elem["libpam-ldap/override"]["descriptionde"]="Soll Debconf Ihre Konfiguration verändern?
 libpam-ldap verwendet nun Debconf zur Konfiguration. Sollen die Einstellungen in Debconf auf Ihre Konfiguration angewendet werden? Paketaktualisierungen werden zukünftig Ihre Antwort weiterverwenden.
";
$elem["libpam-ldap/override"]["descriptionfr"]="Faut-il gérer la configuration automatiquement ?
 Libpam-ldap permet désormais d'utiliser l'outil de configuration Debian (debconf) pour ses réglages. Veuillez choisir si les réglages établis avec cet outil doivent être utilisés pour la configuration. Toutes les mises à niveau à venir du paquet utiliseront cette méthode.
";
$elem["libpam-ldap/override"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
