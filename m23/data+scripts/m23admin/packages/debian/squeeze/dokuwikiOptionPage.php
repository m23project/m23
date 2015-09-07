<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dokuwiki");

$elem["dokuwiki/system/configure-webserver"]["type"]="multiselect";
$elem["dokuwiki/system/configure-webserver"]["choices"][1]="apache2";
$elem["dokuwiki/system/configure-webserver"]["choicesde"][1]="apache2";
$elem["dokuwiki/system/configure-webserver"]["choicesfr"][1]="Apache 2";
$elem["dokuwiki/system/configure-webserver"]["description"]="Web server(s) to configure automatically:
 DokuWiki runs on any web server supporting PHP, but only listed
 web servers can be configured automatically.
 .
 Please select the web server(s) that should be configured
 automatically for DokuWiki.
";
$elem["dokuwiki/system/configure-webserver"]["descriptionde"]="Automatisch einzurichtende(r) Webserver:
 DokuWiki läuft auf jedem Webserver, der PHP unterstützt, aber nur die hier aufgeführten können automatisch eingerichtet werden.
 .
 Bitte wählen Sie den oder die Webserver aus, die automatisch für DokuWiki eingerichtet werden sollen.
";
$elem["dokuwiki/system/configure-webserver"]["descriptionfr"]="Serveur(s) web à configurer automatiquement :
 DokuWiki fonctionne avec n'importe quel serveur qui gère PHP, mais seuls ceux indiqués ici peuvent être configuré automatiquement.
 .
 Veuillez choisir le (ou les) serveur(s) web à configurer automatiquement pour Dokuwiki.
";
$elem["dokuwiki/system/configure-webserver"]["default"]="apache2";
$elem["dokuwiki/system/restart-webserver"]["type"]="boolean";
$elem["dokuwiki/system/restart-webserver"]["description"]="Should the web server(s) be restarted now?
 In order to activate the new configuration, the reconfigured web
 server(s) have to be restarted.
";
$elem["dokuwiki/system/restart-webserver"]["descriptionde"]="Webserver jetzt neu starten?
 Damit die neuen Einstellungen greifen können, müssen alle umkonfigurierten Webserver neu gestartet werden.
";
$elem["dokuwiki/system/restart-webserver"]["descriptionfr"]="Faut-il redémarrer le (ou les) serveur(s) web maintenant ?
 Afin d'activer la nouvelle configuration, le (ou les) serveur(s) web doivent être redémarrés.
";
$elem["dokuwiki/system/restart-webserver"]["default"]="true";
$elem["dokuwiki/system/documentroot"]["type"]="string";
$elem["dokuwiki/system/documentroot"]["description"]="Wiki location:
 Specify the directory below the server's document root from which
 DokuWiki should be accessible.
";
$elem["dokuwiki/system/documentroot"]["descriptionde"]="Wiki-Speicherort:
 Bitte das Verzeichnis unterhalb des »Dokument-Root« des Webservers eingeben, in dem DokuWiki erreichbar sein soll.
";
$elem["dokuwiki/system/documentroot"]["descriptionfr"]="Emplacement du wiki :
 Veuillez indiquer le répertoire, dans l'arborescence du serveur web, qui sera la racine de Dokuwiki.
";
$elem["dokuwiki/system/documentroot"]["default"]="/dokuwiki";
$elem["dokuwiki/system/accessible"]["type"]="select";
$elem["dokuwiki/system/accessible"]["choices"][1]="localhost only";
$elem["dokuwiki/system/accessible"]["choices"][2]="local network";
$elem["dokuwiki/system/accessible"]["choicesde"][1]="nur lokaler Rechner";
$elem["dokuwiki/system/accessible"]["choicesde"][2]="lokales Netzwerk";
$elem["dokuwiki/system/accessible"]["choicesfr"][1]="hôte local seulement";
$elem["dokuwiki/system/accessible"]["choicesfr"][2]="réseau local";
$elem["dokuwiki/system/accessible"]["description"]="Authorized network:
 Wikis normally provide open access to their content, allowing anyone
 to modify it. Alternatively, access can be restricted by IP address.
 .
 If you select \"localhost only\", only people on the local host (the machine
 the wiki is running on) will be able to connect. \"local network\" will
 allow people on machines in a local network (which you will need to
 specify) to talk to the wiki. \"global\" will allow anyone, anywhere, to
 connect to the wiki.
 .
 The default is for site security, but more permissive settings should
 be safe unless you have a particular need for privacy.
";
$elem["dokuwiki/system/accessible"]["descriptionde"]="Zugelassenes Netzwerk:
 Wikis bieten normalerweise offenen Zugang zu ihrem Inhalt und erlauben jedem, ihn zu ändern. Der Zugang kann aber auch auf der Basis der IP-Adresse eingeschränkt werden.
 .
 Wenn Sie »nur lokaler Rechner« wählen, können sich nur Benutzer verbinden, die direkt an dem Rechner arbeiten, auf dem das Wiki läuft. »Lokales Netzwerk« erlaubt es, von den Rechnern des lokalen Netzwerks (das Sie angeben müssen) mit dem Wiki zu arbeiten. »Alle« bedeutet, dass sich jeder von überall mit dem Wiki verbinden kann.
 .
 Die Voreinstellung dient der Sicherheit der Site, aber offenere Einstellungen sind auch sicher, solange Sie keine besonderen Anforderungen an Geheimhaltung haben.
";
$elem["dokuwiki/system/accessible"]["descriptionfr"]="Réseau autorisé :
 Les wikis fournissent un accès libre à leur contenu, permettant à quiconque de le modifier. Néanmoins leur accès peut être restreint par adresses IP.
 .
 Le choix « hôte local seul » restreint la connexion aux utilisateurs locaux. Alternativement, « réseau local » permet la connexion aux personnes du réseau local (qu'il vous incombe de spécifier) et « sans restriction » permet à tout le monde de se connecter.
 .
 La valeur par défaut est très restrictive pour garantir la securité du site mais des valeurs plus permissives sont sûres sauf si vous avez des besoins particuliers en termes de vie privée.
";
$elem["dokuwiki/system/accessible"]["default"]="localhost only";
$elem["dokuwiki/system/localnet"]["type"]="string";
$elem["dokuwiki/system/localnet"]["description"]="Local network:
 The specification of your local network should either be
 an IP network in CIDR format (x.x.x.x/y) or a domain specification (like
 .example.com).
 .
 Anyone who matches this specification will be given full and complete
 access to DokuWiki's content.
";
$elem["dokuwiki/system/localnet"]["descriptionde"]="Lokales Netzwerk:
 Die Angabe Ihres lokalen Netzwerks sollte eine IP-Netzwerkadresse im CIDR-Format (x.x.x.x/y) oder ein Domänenname (wie .example.com) sein.
 .
 Jeder, der die unten eingegebene Vorgabe erfüllt, erhält vollständigen Zugang zu DokuWikis Inhalt.
";
$elem["dokuwiki/system/localnet"]["descriptionfr"]="Réseau local :
 Veuillez indiquer le réseau local, soit avec le format CIDR (x.x.x.x/y), soit sous forme de domaine (tel que « example.com »).
 .
 Toute adresse répondant à ce critère aura un accès complet au contenu de Dokuwiki.
";
$elem["dokuwiki/system/localnet"]["default"]="10.0.0.0/24";
$elem["dokuwiki/system/purgepages"]["type"]="boolean";
$elem["dokuwiki/system/purgepages"]["description"]="Purge pages on package removal?
 By default, DokuWiki stores all its pages in a file database in
 /var/lib/dokuwiki.
 .
 Accepting this option will leave you with a tidier system when the
 DokuWiki package is removed, but may cause information loss if you have an
 operational wiki that gets removed.
";
$elem["dokuwiki/system/purgepages"]["descriptionde"]="Seiten beim vollständigen Entfernen des Pakets löschen?
 Standardmäßig speichert DokuWiki alle seine Seiten in einer Datei-Datenbank im Verzeichnis /var/lib/dokuwiki.
 .
 Wenn Sie zustimmen, haben Sie ein aufgeräumteres System, falls das Paket DokuWiki vollständig entfernt wird, aber es können Informationen verloren gehen, wenn Sie ein Wiki löschen, das noch benutzt wird.
";
$elem["dokuwiki/system/purgepages"]["descriptionfr"]="Faut-il purger les pages à la suppression du paquet ?
 Par défaut, Dokuwiki enregistre toutes ses pages dans une base de données située dans « /var/lib/dokuwiki ».
 .
 En choisissant cette option, le système sera complètement nettoyé à la suppression de Dokuwiki mais cela risque de causer une perte de données si un Wiki opérationnel est supprimé.
";
$elem["dokuwiki/system/purgepages"]["default"]="false";
$elem["dokuwiki/system/writeconf"]["type"]="boolean";
$elem["dokuwiki/system/writeconf"]["description"]="Make the configuration web-writeable?
 DokuWiki includes a web-based configuration interface. To be usable, it
 requires the web server to have write permission to the configuration
 directory.
 .
 Accepting this option will give the web server write permissions on the
 configuration directory and files.
 .
 The configuration files will still be readable and editable by hand
 regardless of whether or not you accept this option.
";
$elem["dokuwiki/system/writeconf"]["descriptionde"]="Einstellungen für den Webserver schreibbar machen?
 DokuWiki bringt eine web-basierte Konfigurationsoberfläche mit. Damit sie funktioniert, benötigt der Webserver Schreibrechte auf das Konfigurationsverzeichnis.
 .
 Wenn Sie hier zustimmen, erhält der Webserver Schreibrechte auf Konfigarionsverzeichnis und -dateien.
 .
 Die Konfigurationsdateien bleiben lesbar und manuell änderbar, gleichgültig, welche Auswahl Sie treffen.
";
$elem["dokuwiki/system/writeconf"]["descriptionfr"]="La configuration doit-elle être modifiable depuis l'interface web ?
 La configuration de Dokuwiki se fait via une interface web. Pour l'utiliser, il faut que le serveur web ait les permissions d'écriture sur ce répertoire.
 .
 En acceptant cette option, le serveur web aura les droits d'écriture sur le répertoire et les fichiers de configuration.
 .
 Les fichiers de configuration seront toujours lisibles et modifiables par vous-même, quelque soit le choix effectué ici.
";
$elem["dokuwiki/system/writeconf"]["default"]="false";
$elem["dokuwiki/system/writeplugins"]["type"]="boolean";
$elem["dokuwiki/system/writeplugins"]["description"]="Make the plugins directory web-writeable?
 DokuWiki includes a web-based plugin installation interface. To be usable,
 it requires the web server to have write permission to the plugins directory.
 .
 Accepting this option will give the web server write permissions to the
 plugins directory.
 .
 Plugins can still be installed by hand regardless of whether or not you
 accept this option.
";
$elem["dokuwiki/system/writeplugins"]["descriptionde"]="Verzeichnis der Plugins für den Webserver schreibbar machen?
 DokuWiki bringt eine web-basierte Konfigurationsoberfläche mit. Damit sie funktioniert, benötigt der Webserver Schreibrechte auf das Plugins-Verzeichnis.
 .
 Wenn Sie hier zustimmen, erhält der Webserver Schreibrechte auf das Plugins-Verzeichnis.
 .
 Plugins können weiterhin manuell installiert werden, gleichgültig, welche Auswahl Sie treffen.
";
$elem["dokuwiki/system/writeplugins"]["descriptionfr"]="Faut-il que le répertoire des greffons soit accessible en écriture ?
 L'installation des greffons dans Dokuwiki se fait via une interface web. Pour l'utiliser, il faut que le serveur web ait les droits d'écriture sur ce répertoire.
 .
 En acceptant cette option, le serveur web aura les droits d'écriture sur ce répertoire.
 .
 Les greffons pourront toujours être installés par vous-même quelque soit la décision prise ici.
";
$elem["dokuwiki/system/writeplugins"]["default"]="false";
$elem["dokuwiki/wiki/title"]["type"]="string";
$elem["dokuwiki/wiki/title"]["description"]="Wiki title:
 The wiki title will be displayed in the upper right corner of the default
 template and on the browser window title.
";
$elem["dokuwiki/wiki/title"]["descriptionde"]="Wiki-Titel:
 Der Wiki-Titel wird in der oberen rechten Ecke der Standardschablone und in der Titelleiste des Webbrowsers angezeigt.
";
$elem["dokuwiki/wiki/title"]["descriptionfr"]="Titre du wiki :
 Le titre du wiki peut être affiché dans le coin supérieur droit du gabarit par défaut et sur la barre de titre du navigateur.
";
$elem["dokuwiki/wiki/title"]["default"]="Debian DokuWiki";
$elem["dokuwiki/wiki/acl"]["type"]="boolean";
$elem["dokuwiki/wiki/acl"]["description"]="Enable ACL?
 Enable this to use an Access Control List for restricting what the users of
 your wiki may do.
 .
 This is a recommended setting because without ACL support you will not have
 access to the administration features of DokuWiki.
";
$elem["dokuwiki/wiki/acl"]["descriptionde"]="ACL aktivieren?
 Wenn Sie dies aktivieren, wird eine Access-Control-List (ACL) verwendet, um einschränken zu können, was die Benutzer Ihres Wikis dürfen.
 .
 Diese Einstellung wird empfohlen, da Sie ohne Unterstützung für eine Access-Control-List keinen Zugriff auf die Administrationsfunktionen von DokuWiki haben werden.
";
$elem["dokuwiki/wiki/acl"]["descriptionfr"]="Faut-il activer les ACL ?
 L'activation des ACL permet de restreindre les possibilités des utilisateurs du wiki.
 .
 L'activation des ACL est recommandée car elle est indispensable pour accéder au panneau d'administration de Dokuwiki.
";
$elem["dokuwiki/wiki/acl"]["default"]="true";
$elem["dokuwiki/wiki/superuser"]["type"]="string";
$elem["dokuwiki/wiki/superuser"]["description"]="Administrator username:
 Please enter a name for the administrator account, which will be able to
 manage DokuWiki's configuration and create new wiki users. The username
 should be composed of lowercase ASCII letters only.
 .
 If this field is left blank, no administrator account will be created now.
";
$elem["dokuwiki/wiki/superuser"]["descriptionde"]="Benutzername des Administrators:
 Bitte geben Sie einen Namen für den Administratorzugang ein, der die DokuWiki-Konfiguration verwalten und neue Wiki-Benutzer anlegen kann. Der Benutzername sollte nur aus Kleinbuchstaben aus dem ASCII-Zeichensatz bestehen.
 .
 Falls Sie dieses Feld leer lassen, wird jetzt kein Administratorzugang erstellt.
";
$elem["dokuwiki/wiki/superuser"]["descriptionfr"]="Identifiant de l'administrateur :
 Veuillez indiquer le nom du compte de l'administrateur qui pourra gérer la configuration de Dokuwiki et créer des nouveaux utilisateurs. Cet identifiant ne doit comporter que des caractères ASCII minuscules.
 .
 Si vous laissez ce champ vide, aucun compte administrateur ne sera créé.
";
$elem["dokuwiki/wiki/superuser"]["default"]="admin";
$elem["dokuwiki/wiki/fullname"]["type"]="string";
$elem["dokuwiki/wiki/fullname"]["description"]="Administrator real name:
 Please enter the full name associated with the wiki administrator account.
 This name will be stored in the wiki password file as an informative
 field, and will be displayed with the wiki page changes made by the
 administrator account.
";
$elem["dokuwiki/wiki/fullname"]["descriptionde"]="Echter Name des Administrators:
 Bitte geben Sie den vollständigen Namen ein, der zu dem Administratorzugang gehört. Dieser Name wird in der Wiki-Passwortdatei als informatives Feld abgespeichert und bei den Änderungen an den Wiki-Seiten angezeigt, die durch den Administator durchgeführt wurden.
";
$elem["dokuwiki/wiki/fullname"]["descriptionfr"]="Nom et prénom de l'administrateur :
 Veuillez indiquer le nom et le prénom de l'administrateur. Ces données seront enregistrées dans le fichier de mots de passe du wiki comme champ informatif et seront affichées dans les pages du wiki modifiées par l'administrateur.
";
$elem["dokuwiki/wiki/fullname"]["default"]="DokuWiki Administrator";
$elem["dokuwiki/wiki/email"]["type"]="string";
$elem["dokuwiki/wiki/email"]["description"]="Administrator email address:
 Please enter the email address associated with the wiki administrator account.
 This address will be stored in the wiki password file, and may be used
 to get a new administrator password if you lose the original.
";
$elem["dokuwiki/wiki/email"]["descriptionde"]="E-Mail-Adresse des Administrators:
 Bitte geben Sie die E-Mail-Adresse ein, die zu dem Administratorzugang gehört. Diese Adresse wird in der Wiki-Passwortdatei abgespeichert und kann genutzt werden, um ein neues Administratorpasswort zu erhalten, falls das Original-Passwort verloren/vergessen wurde.
";
$elem["dokuwiki/wiki/email"]["descriptionfr"]="Adresse électronique de l'administrateur :
 Veuillez indiquer l'adresse électronique de l'administrateur. Celle-ci sera enregistrée dans le fichier de mots de passe et permet d'obtenir un nouveau mot de passe si l'original est oublié.
";
$elem["dokuwiki/wiki/email"]["default"]="webmaster@localhost";
$elem["dokuwiki/wiki/password"]["type"]="password";
$elem["dokuwiki/wiki/password"]["description"]="Administrator password:
 Please choose a password for the wiki administrator.
";
$elem["dokuwiki/wiki/password"]["descriptionde"]="Passwort des Administrators:
 Bitte geben Sie ein Passwort für den Wiki-Administrator ein.
";
$elem["dokuwiki/wiki/password"]["descriptionfr"]="Mot de passe de l'administrateur :
 Veuillez choisir un mot de passe pour l'administrateur.
";
$elem["dokuwiki/wiki/password"]["default"]="";
$elem["dokuwiki/wiki/confirm"]["type"]="password";
$elem["dokuwiki/wiki/confirm"]["description"]="Re-enter password to verify:
 Please enter the same \"admin\" password again to verify
 you have typed it correctly.
";
$elem["dokuwiki/wiki/confirm"]["descriptionde"]="Passwort zur Kontrolle erneut eingeben:
 Bitte geben Sie das gleiche Administrator-Passwort erneut ein, um sicherzustellen, dass Sie sich nicht vertippt haben.
";
$elem["dokuwiki/wiki/confirm"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez indiquer le même mot de passe pour l'administrateur, pour vérification.
";
$elem["dokuwiki/wiki/confirm"]["default"]="";
$elem["dokuwiki/wiki/failpass"]["type"]="error";
$elem["dokuwiki/wiki/failpass"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["dokuwiki/wiki/failpass"]["descriptionde"]="Passwort-Eingabefehler
 Die beiden Passwörter, die Sie eingegeben haben, sind nicht identisch. Bitte versuchen Sie es erneut.
";
$elem["dokuwiki/wiki/failpass"]["descriptionfr"]="Erreur de mot de passe
 Les deux mots de passe sont différents. Veuillez recommencer.
";
$elem["dokuwiki/wiki/failpass"]["default"]="";
$elem["dokuwiki/wiki/policy"]["type"]="select";
$elem["dokuwiki/wiki/policy"]["choices"][1]="open";
$elem["dokuwiki/wiki/policy"]["choices"][2]="public";
$elem["dokuwiki/wiki/policy"]["choicesde"][1]="offen";
$elem["dokuwiki/wiki/policy"]["choicesde"][2]="öffentlich";
$elem["dokuwiki/wiki/policy"]["choicesfr"][1]="ouvert";
$elem["dokuwiki/wiki/policy"]["choicesfr"][2]="public";
$elem["dokuwiki/wiki/policy"]["description"]="Initial ACL policy:
 Please select what initial ACL configuration should be set up to match
 the intended usage of this wiki:
  \"open\":   both readable and writeable for anonymous users;
  \"public\": readable for anonymous users, writeable for registered users;
  \"closed\": readable and writeable for registered users only.
 .
 This is only an initial setup; you will be able to adjust the ACL rules later.
";
$elem["dokuwiki/wiki/policy"]["descriptionde"]="Anfängliche ACL-Richtlinie:
 Bitte wählen Sie aus, welche anfängliche ACL-Konfiguration, die für die beabsichtigte Nutzung des Wikis passend ist, eingestellt werden soll:
  »offen«:       sowohl lesbar wie auch schreibbar für anonyme Benutzer;
  »öffentlich«:  lesbar für anonyme Benutzer, schreibbar nur für registrierte
                 Benutzer;
  »geschlossen«: lesbar und schreibbar nur für registrierte Benutzer.
 .
 Dies ist nur eine anfängliche Einstellung, Sie können die ACL-Regeln später noch anpassen.
";
$elem["dokuwiki/wiki/policy"]["descriptionfr"]="Politique initiale des ACL :
 Veuillez choisir la politique initiale des ACL en fonction de l'usage de ce wiki :
  « ouvert » : lecture et écriture pour tout le monde ;
  « public » : lecture pour tous, écriture pour les utilisateurs inscrits ;
  « fermé » : lecture et écriture seulement pour les utilisateurs inscrits.
 .
 Cette configuration initiale des ACL pourra être ajustée plus tard.
";
$elem["dokuwiki/wiki/policy"]["default"]="public";
PKG_OptionPageTail2($elem);
?>
