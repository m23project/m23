<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("phpwiki");

$elem["phpwiki/notes/introduction"]["type"]="note";
$elem["phpwiki/notes/introduction"]["description"]="Welcome to PHPWiki!
 This is an automated config generator for PHPWiki.  It is not intended to
 do everything, in fact, all it will do is generate a basic, standalone
 PHPWiki.  It is sufficient for simple local installations, but does not
 encompass all of PHPWiki's capabilities.  If you want to use the more
 advanced features of the Wiki, please edit /etc/phpwiki/config.ini
 yourself.
 .
 Please read /usr/share/doc/phpwiki/README.Debian for some important notices
 regarding the first time you load pages into your new Wiki.
";
$elem["phpwiki/notes/introduction"]["descriptionde"]="Wilkommen bei PHPWiki!
 Dies ist ein automatischer Konfigurationsgenerator für PHPWiki. Er ist nicht für eine spezialisierte Konfiguration gedacht, er erstellt nur ein grundlegendes Einzelplatz-PHPWiki. Es reicht für eine einfache lokale Installation aus, umfasst aber nicht alle Fähigkeiten von PHPWiki. Falls Sie die fortgeschritteneren Funktionen des Wikis verwenden wollen, bearbeiten Sie bitte /etc/phpwiki/config.ini selbst.
 .
 Bitte lesen Sie /usr/share/doc/phpwiki/README.Debian für wichtige Hinweise zum erstmaligen Laden von Seiten in Ihr neues Wiki.
";
$elem["phpwiki/notes/introduction"]["descriptionfr"]="Configuration automatique de PHPWiki
 Cet outil de configuration ne permet pas de tout configurer. Il se contentera de réaliser une configuration basique de PHPWiki. Il est suffisant pour les installations locales simples, mais n'intègre pas toutes les possibilités de PHPWiki. Si vous voulez utiliser les options avancées du Wiki, vous pouvez modifier vous-même le fichier /etc/phpwiki/config.ini.
 .
 Veuillez consulter les notes importantes pour la première fois que vous chargez des pages dans votre nouveau Wiki dans /usr/share/doc/phpwiki/README.Debian.
";
$elem["phpwiki/notes/introduction"]["default"]="";
$elem["phpwiki/system/documentroot"]["type"]="string";
$elem["phpwiki/system/documentroot"]["description"]="Web-accessible location of the PHPWiki:
 Where should the web-accessible location of the PHPWiki be?
 .
 This is the directory of your website that people should use to access
 the PHPWiki.  By default, this is http://yourserver/phpwiki, but you can
 change it to be anything within your server.  Enter just the directory
 portion below.
";
$elem["phpwiki/system/documentroot"]["descriptionde"]="Web-zugreifbarer Ort des PHPWikis:
 Wo soll der web-zugreifbare Ort des PHPWikis sein?
 .
 Dies ist das Verzeichnis auf Ihrem Webauftritt, das zum Zugriff auf das PHPWiki verwendet werden soll. Standardmäßig ist dies http://ihrserver/phpwiki, aber Sie können dies auf einen beliebigen Wert in Ihrem Server ändern. Geben Sie unten nur den Verzeichnisteil ein.
";
$elem["phpwiki/system/documentroot"]["descriptionfr"]="Adresse Web du PHPWiki :
 Veuillez indiquer l'emplacement où PHPWiki sera accessible depuis le Web.
 .
 Il s'agit de l'URL d'accès au PHPWiki. Par défaut, l'adresse http://yourserver/phpwiki est utilisée. Vous pouvez cependant la changer pour une autre adresse sur votre serveur. N'indiquez que le répertoire concerné.
";
$elem["phpwiki/system/documentroot"]["default"]="/phpwiki";
$elem["phpwiki/system/accessible"]["type"]="select";
$elem["phpwiki/system/accessible"]["choices"][1]="localhost only";
$elem["phpwiki/system/accessible"]["choices"][2]="local network";
$elem["phpwiki/system/accessible"]["choicesde"][1]="nur localhost";
$elem["phpwiki/system/accessible"]["choicesde"][2]="lokales Netz";
$elem["phpwiki/system/accessible"]["choicesfr"][1]="Hôte local uniquement";
$elem["phpwiki/system/accessible"]["choicesfr"][2]="Réseau local uniquement";
$elem["phpwiki/system/accessible"]["description"]="PHPWiki access restrictions:
 Who should be able to access your PHPWiki?
 .
 A Wiki is normally used to provide unfettered access to information, which
 can be freely modified by anyone.  Since that is sometimes not what one
 wants, it is possible to restrict access to the site on the basis of the
 originating IP address.
 .
 If you select 'localhost only', only people on the localhost (the machine
 the Wiki is running on) will be able to connect.  'local network' will
 allow people on machines in a local network (which you will need to
 specify) to talk to the Wiki.  'global' will allow anyone, anywhere, to
 connect to the Wiki.
 .
 For security, this is set to 'localhost only' by default.  Unless you have
 a particular need for privacy on your Wiki, you should be able to allow
 access globally without compromising site security.
";
$elem["phpwiki/system/accessible"]["descriptionde"]="PHPWiki-Zugriffsbeschränkungen:
 Wer soll in der Lage sein, auf Ihr PHPWiki zuzugreifen?
 .
 Ein Wiki wird normalerweise verwendet, um uneingeschränkten Zugriff auf Informationen bereitzustellen, die von jedem frei verändert werden können. Da dies manchmal nicht gewünscht wird, können Zugriffsbeschränkungen auf die Site auf der Basis der Quell-IP-Adresse eingestellt werden.
 .
 Falls Sie »nur localhost« auswählen, können sich nur Personen auf der lokalen Maschine (localhost, die Maschine, auf der das Wiki läuft) mit dem Wiki verbinden. »Lokales Netz« (das Sie angeben müssen) wird Personen im lokalen Netz erlauben, mit dem Wiki zu reden. »Global« wird es jedem sich von überall mit dem Wiki zu verbinden.
 .
 Aus Sicherheitsgründen ist dies standardmäßig auf »nur localhost« eingestellt. Falls Sie keine besondere Anforderungen an die Privatsphäre auf Ihrem Wiki haben, sollten Sie globalen Zugriff ohne Beeinträchtigung der Sicherheit erlauben.
";
$elem["phpwiki/system/accessible"]["descriptionfr"]="Restrictions d'accès à PHPWiki :
 Veuillez choisir les adresses autorisées à accéder à PHPWiki.
 .
 Un Wiki est normalement libre d'accès, il peut être modifié par n'importe qui. Il est cependant possible de restreindre son accès en fonction des adresses IP d'origine des clients.
 .
 Si vous choisissez « Hôte local uniquement », seules les connexions provenant du serveur lui-même seront autorisées. « Réseau local » autorisera uniquement les personnes utilisant les machines du réseau local (que vous devrez préciser) à accéder au Wiki. « Toutes » autorisera tout le monde à accéder au Wiki. 
 .
 Pour des raisons de sécurité, l'accès au Wiki est configuré par défaut à « Hôte local uniquement ». A moins que vous ne souhaitiez restreindre l'accès de votre Wiki à un usage privé, vous devriez pouvoir permettre un accès global avec « Toutes » sans compromettre la sécurité de votre serveur.
";
$elem["phpwiki/system/accessible"]["default"]="localhost only";
$elem["phpwiki/system/localnet"]["type"]="string";
$elem["phpwiki/system/localnet"]["description"]="Local network:
 What is defined as your local network?  The specification should either be
 an IP network in CIDR format (x.x.x.x/y) or a domain specification (like
 *.mydomain.com).
 .
 Anyone who matches the specification given below will be given full and
 complete access to the PHPWiki.
";
$elem["phpwiki/system/localnet"]["descriptionde"]="Lokales Netz:
 Wie ist Ihr lokales Netz definiert? Die Spezifikation sollte entweder ein IP-Netz im CIDR-Format (x.x.x.x./y) oder eine Domain-Spezifikation (wie *.meinedomain.com) sein.
 .
 Voller Zugriff auf das PHPWiki wird jedem gewährt, auf den die unten angegebene Spezifikation zutrifft.
";
$elem["phpwiki/system/localnet"]["descriptionfr"]="Réseau local :
 Veuillez définir votre réseau local. Vous pouvez indiquer une adresse IP au format CIDR (x.x.x.x/y) ou un nom de domaine tel que mondomaine.com.
 .
 Tout utilisateur répondant aux critères ci-dessous disposera d'un accès complet au PHPWiki.
";
$elem["phpwiki/system/localnet"]["default"]="10.0.0.0/24";
$elem["phpwiki/notes/configupgrade"]["type"]="note";
$elem["phpwiki/notes/configupgrade"]["description"]="New Configuration Method
 PHPWiki 1.3.10 has implemented a new configuration system that no longer
 stores configuration details in the index.php file. The configuration syntax
 has also been standardised and all directives are now placed in config.ini.
 .
 You still need to run the PHPWiki Upgrade Wizard manually to complete the
 final portions of the upgrade. See Step 3 of 'Wiki Upgrades' section in
 README.Debian for details.  
 .
 An automatic migration of your configuration has been performed which should
 correctly migrate your configuration in 95+ percent of cases. However please
 check the new configuration at /etc/phpwiki/config.ini carefully as it is 
 always possible that the automatic process was not perfect.
 .
 In particular there are known problems migrating configurations that use
 external authentication methods (LDAP, IMAP, SQL, etc) for user accounts. 
 These methods are not used by the standard Debian package and their
 configuration is left to the administrator.
";
$elem["phpwiki/notes/configupgrade"]["descriptionde"]="Neue Konfigurationsmethode
 PHPWiki 1.3.10 hat eine neue Konfigurationsmethode implementiert, die die Details der Konfiguration nicht mehr in der index.php-Datei speichert. Auch die Konfigurationssyntax wurde standardisiert und ist jetzt in der config.ini-Datei gespeichert.
 .
 Sie müssen noch den PHPwiki Upgrade-Assistenten manuell ausführen, um das Upgrade abzuschließen. Lesen Sie Schritt 3 des »Wiki Upgrade«-Abschnitts in der README.Debian für Details.
 .
 Eine automatische Migration Ihrer Konfiguration wurde durchgeführt, die in mehr als 95 % der Fälle Ihre Konfiguration korrekt migriert. Prüfen Sie allerdings die Konfiguration in /etc/phpwiki/config.ini sorgfältig, da es immer möglich ist, dass der automatische Konfigurationsprozess nicht perfekt war.
 .
 Insbesondere gibt es bekannte Probleme bei Konfigurationen, die externe Authentifizierungsmethoden (LDAP, IMAP, SQL, usw.) für Benutzerkonten verwenden. Diese Methoden werden von den Standard-Debianpaketen nicht verwendet und ihre Konfigurationen werden dem Administrator überlassen.
";
$elem["phpwiki/notes/configupgrade"]["descriptionfr"]="Nouvelle méthode de configuration
 PHPWiki 1.3.10 implémente une nouvelle méthode de configuration pour laquelle les données de configuration ne sont plus enregistrées dans le fichier index.php. La syntaxe de configuration a été standardisée et toutes les directives se trouvent maintenant dans config.ini.
 .
 Il vous faut encore lancer vous-même l'assistant de mise à niveau de PHPWiki pour terminer les dernières étapes de la mise à jour. Voir « Step 3 » de la section « Wiki Upgrades » dans README.Debian pour davantage d'informations.
 .
 La conversion automatique de votre fichier de configuration a été réalisée et devrait couvrir votre configuration dans la majorité des cas. Le processus de conversion n'étant cependant pas parfait, veuillez vérifier soigneusement le nouveau fichier de configuration /etc/phpwiki/config.ini.
 .
 Il y a en particulier des problèmes connus pour la conversion des fichiers de configuration lorsque la gestion des comptes utilisateurs est faite de manière externe (LDAP, IMAP, SQL, etc.). Ces méthodes ne sont pas utilisées par le paquet Debian standard et leur configuration est laissée à l'initiative de l'administrateur.
";
$elem["phpwiki/notes/configupgrade"]["default"]="";
PKG_OptionPageTail2($elem);
?>
