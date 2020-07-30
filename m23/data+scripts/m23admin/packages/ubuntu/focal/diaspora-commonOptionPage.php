<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("diaspora-common");

$elem["diaspora-common/url"]["type"]="string";
$elem["diaspora-common/url"]["description"]="Host name for this instance of Diaspora:
 Please choose the host name which should be used to access this
 instance of Diaspora.
 .
 This should be the fully qualified name as seen from the Internet, with
 the domain name that will be used to access the pod.
 .
 If a reverse proxy is used, give the hostname that the proxy server
 responds to.
 .
 This host name should not be modified after the initial setup because
 it is hard-coded in the database.
";
$elem["diaspora-common/url"]["descriptionde"]="Rechnernname für diese Diaspora-Instanz:
 Bitte wählen Sie den Rechnernamen, unter dem diese Diaspora-Instanz erreichbar sein soll.
 .
 Es sollte der vollqualifizierte Rechnername sein, wie er vom Internet aus zu sehen ist, einschließlich des Domain-Namens, unter dem auf den Pod zugegriffen wird.
 .
 Geben Sie den Rechnernamen ein, auf den der Proxy-Server antwortet, falls einer im Einsatz ist.
 .
 Dieser Rechnername sollte nach der Ersteinrichtung nicht mehr verändert werden, weil er in der Datenbank fest kodiert eingetragen wird.
";
$elem["diaspora-common/url"]["descriptionfr"]="Nom d'hôte de cette installation de Diaspora :
 Veuillez choisir le nom d'hôte qui sera utilisé pour accéder à cette installation de Diaspora :
 .
 Cela doit être le nom pleinement qualifié tel qu'il est vu depuis Internet, avec le nom de domaine utilisé pour se connecter à ce nœud.
 .
 Si un serveur mandataire inverse est utilisé, veuillez indiquer le nom d'hôte sur lequel contacter le serveur.
 .
 Ce nom d'hôte ne devra pas être modifié après l'installation initiale parce qu'il est codé en dur dans la base de données.
";
$elem["diaspora-common/url"]["default"]="localhost";
$elem["diaspora-common/dbpass"]["type"]="note";
$elem["diaspora-common/dbpass"]["description"]="PostgreSQL application password
 You can leave the PostgreSQL application password blank, as the \"ident\"
 authentication method is used, allowing the diaspora user on the system
 to connect to the Diaspora database without a password.
";
$elem["diaspora-common/dbpass"]["descriptionde"]="PostgreSQL-Passwort
 Sie können das PostgreSQL-Passwort leer lassen, weil die »ident«-Anmeldungsmethode genutzt wird. Sie ermöglicht es dem diaspora-Benutzer auf dem System, ohne Passwort auf die Diaspora-Datenbank zuzugreifen.
";
$elem["diaspora-common/dbpass"]["descriptionfr"]="Mot de passe de l'application PostgreSQL
 Vous pouvez laisser le mot de passe vide pour l'application PostgreSQL, tant que la méthode d'authentification « ident » est utilisée, ce qui autorisera l'utilisateur système diaspora à se connecter à la base de données Diaspora sans mot de passe.
";
$elem["diaspora-common/dbpass"]["default"]="";
$elem["diaspora-common/ssl"]["type"]="boolean";
$elem["diaspora-common/ssl"]["description"]="Enable https?
 Enabling https means that an SSL/TLS certificate is required to access this
 Diaspora instance (as Nginx will be configured to respond only to https
 requests). A self-signed certificate is enough for local testing (and
 can be generated using, for instance, the package easy-rsa), but will
 not be accepted for federation with other Diaspora pods.
 .
 Some certificate authorities like Let's Encrypt (letsencrypt.org), StartSSL
 (startssl.com) offer free SSL/TLS certificates that work with Diaspora;
 however, certificates provided by CAcert will not work with Diaspora.
 .
 Nginx must be reloaded after the certificate and key files are made available
 at /etc/diaspora/ssl. letsencrypt package may be used to automate interaction
 with Let's Encrypt to obtain a certificate.
 .
 You can disable https if you want to access Diaspora only locally or you don't
 want to federate with other diaspora pods.
";
$elem["diaspora-common/ssl"]["descriptionde"]="HTTPS aktivieren?
 HTTPS zu aktivieren, bedeutet, dass für den Zugriff auf diese Diaspora-Instanz ein SSL/TLS-Zertifikat erforderlich ist (weil Nginx so konfiguriert wird, dass er nur auf HTTPS-Anfragen antwortet). Für lokale Tests reicht ein selbstsigniertes Zertifikat (welches bspw. mit dem Paket easy-rsa erzeugt werden kann), eine Föderation mit anderen Diaspora-Pods kann man damit aber nicht eingehen.
 .
 Einige Zertifizierungsstellen (CAs) wie Let's Encrypt (letsencrypt.org) und StartSSL (startssl.com) bieten kostenlose SSL/TLS-Zertifikate an, die mit Diaspora verwendet werden können; Zertifikate von CACert werden dagegen nicht funktionieren.
 .
 Nachdem die Zertifikat- und die Schlüsseldatei in /etc/diaspora/ssl abgespeichert worden sind, muss Nginx neu gestartet werden. Um das Let's-Encrypt-Zertifikat automatisiert zu beantragen, kann das letsencrypt-Paket verwendet werden.
 .
 Sie können HTTPS deaktivieren, wenn Sie Diaspora nur lokal einsetzen oder sich nicht mit anderen Diaspora-Pods zusammenschließen wollen.
";
$elem["diaspora-common/ssl"]["descriptionfr"]="Activer https ?
 Le fait d'activer https, signifie qu'un certificat SSL ou TLS est nécessaire pour accéder à cette instance de Diaspora (tant que Nginx est configuré pour répondre uniquement aux requêtes https). Un certificat auto-signé est suffisant pour des tests locaux (et peut être généré en utilisant le paquet easy-rsa, par exemple), mais ne sera pas accepté pour une fédération avec d'autres nœuds Diaspora.
 .
 Certaines autorités de certification comme Let's Encrypt (letsencrypt.org) ou StartSSL (startssl.com) offrent des certificats SSL ou TLS gratuits qui fonctionnent avec Diaspora ; cependant, les certificats fournis par CAcert ne fonctionneront pas avec Diaspora.
 .
 Nginx doit être rechargé après le certificat et les fichiers de clé sont disponibles à l'emplacement /etc/diaspora/ssl. Le paquet letsencrypt peutêtre utilisé pour automatiser l'interaction avec Let's Encrypt afin d'obtenir un certificat.
 .
 Vous pouvez désactiver https si vous souhaitez seulement accéder à Diaspora localement ou si vous ne voulez pas de fédération avec d'autres nœuds Diaspora.

";
$elem["diaspora-common/ssl"]["default"]="true";
$elem["diaspora-common/letsencrypt"]["type"]="boolean";
$elem["diaspora-common/letsencrypt"]["description"]="Use Let's Encrypt?
 Symbolic links to certificate and key created using letsencrypt package
 (/etc/letencrypt/live) will be added to /etc/diaspora/ssl if this option is
 selected.
 .
 Otherwise, certificate and key files have to be placed manually to
 /etc/diaspora/ssl directory as '<host name>-bundle.crt' and '<host name>.key'.
 .
 Nginx will be stopped, if this option is selected, to allow letsencrypt to use
 ports 80 and 443 during domain ownership validation and certificate retrieval
 step.
 .
 Note: letsencrypt does not have a usable nginx plugin currently, so
 certificates must be renewed manually after 3 months, when current
 letsencrypt certificate expire. If you choose this option, you will also be
 agreeing to letsencrypt terms of service.
";
$elem["diaspora-common/letsencrypt"]["descriptionde"]="Let's Encrypt verwenden?
 Wenn diese Option gewählt wird, werden in /etc/diaspora/ssl symbolische Verknüpfungen zu den Zertifikatsdaten angelegt, die mit Hilfe des letsencrypt-Pakets erzeugt worden sind (/etc/letencrypt/live).
 .
 Andernfalls müssen Zertifikats- und Schlüsseldatei per Hand als '<Rechnername>-bundle.crt' und <Rechnername>.key' im Verzeichnis /etc/diaspora/ssl abgelegt werden.
 .
 Falls diese Option gewählt wird, wird Nginx angehalten, damit letsencrypt während der Domain- und Besitzervalidierung die Ports 80 und 443 verwenden kann.
 .
 Hinweis: letsencrypt hat zur Zeit kein funktionierendes nginx-Plugin, weswegen Zertifikate per Hand aktualisiert werden müssen, wenn sie nach drei Monaten ablaufen. Wenn Sie diese Option wählen, akzeptieren Sie auch die Nutzungsbedingungen von Let's Encrypt.
";
$elem["diaspora-common/letsencrypt"]["descriptionfr"]="Utiliser Let's Encrypt ?
 Les liens symboliques vers le certificat et la clé créés avec le paquet letsencrypt (/etc/letsencrypt/live) seront ajoutés à /etc/diaspora/ssl si cette option est choisie.
 .
 Autrement, vous devez placer vous-même les fichiers du certificat et de la clé dans le répertoire /etc/diaspora/ssl sous la forme « <nom_d'hôte>-bundle.crt » et « <nom_d'hôte>.key ».
 .
 Si cette option est choisie, Nginx va s'arrêter pour permettre à letsenscrypt d'utiliser les ports 80 et 443 durant l'étape de la validation du propriétaire du domaine et de la récupération du certificat.
 .
 Note : letsencrypt ne possède pas actuellement de greffon nginx utilisable, aussi vous devez renouveler vous-même les certificats tous les trois mois lors de l'expiration du certificat en cours de letsencrypt. Si cette option est choisie, vous devrez aussi accepter les conditions générales d'utilisation de letsencrypt.

";
$elem["diaspora-common/letsencrypt"]["default"]="false";
$elem["diaspora-common/letsencrypt_email"]["type"]="string";
$elem["diaspora-common/letsencrypt_email"]["description"]="Email address for letsencrypt updates:
 Please provide a valid email address for letsencrypt updates.
";
$elem["diaspora-common/letsencrypt_email"]["descriptionde"]="E-Mail-Adresse für Let's-Encrypt-Neuigkeiten:
 Bitte geben SIe eine gültige E-Mail-Adresse für Let's-Encrypt-Neuigkeiten an.
";
$elem["diaspora-common/letsencrypt_email"]["descriptionfr"]="Adresse de courriel pour les mises à jour de letsencrypt :
 Veuillez fournir une adresse courriel valable pour les mises à jour de letsencrypt.

";
$elem["diaspora-common/letsencrypt_email"]["default"]="";
$elem["diaspora-common/dbbackup"]["type"]="note";
$elem["diaspora-common/dbbackup"]["description"]="Backup your database
 This upgrade includes long running migrations that can take hours to complete
 on large pods. It is adviced to take a backup of your database.
 .
 Commands to backup and restore database is given below (run as root user):
 .
 # su postgres -c 'pg_dump diaspora_production -f /var/lib/postgresql/diaspora_production.sql'
 .
 # su postgres -c 'psql -d diaspora_production -f /var/lib/postgresql/diaspora_production.sql'
";
$elem["diaspora-common/dbbackup"]["descriptionde"]="Sichern Sie Ihre Datenbank
 Dieses Upgrade bringt langwierige Migrationen mit sich, die auf großen Pods stundenlang dauern können. Es ist ratsam, vorher eine Sicherung der Datenbank anzulegen.
 .
 Die Befehle zum Sichern und Wiederherstellen Ihrer Datenbank lauten folgendermaßen (als root-Benutzer ausführen):
 .
 # su postgres -c 'pg_dump diaspora_production -f /var/lib/postgresql/diaspora_production.sql'
 .
 # su postgres -c 'psql -d diaspora_production -f /var/lib/postgresql/diaspora_production.sql'
";
$elem["diaspora-common/dbbackup"]["descriptionfr"]="Sauvegardez votre base de données
 La mise à niveau comprend des migrations de longue durée qui peuvent prendre des heures pour s'accomplir dans des nœuds importants. Il est conseillé de réaliser une sauvegarde de votre base de données.
 .
 Les commandes pour sauvegarder et restaurer la base de données sont les suivantes (à exécuter en tant que superutilisateur) :
 .
 # su postgres -c 'pg_dump diaspora_production -f /var/lib/postgresql/diaspora_production.sql'
 .
 # su postgres -c 'psql -d diaspora_production -f /var/lib/postgresql/diaspora_production.sql'
";
$elem["diaspora-common/dbbackup"]["default"]="";
$elem["diaspora-common/services"]["type"]="multiselect";
$elem["diaspora-common/services"]["choices"][1]="Facebook";
$elem["diaspora-common/services"]["choices"][2]="Twitter";
$elem["diaspora-common/services"]["choices"][3]="Tumblr";
$elem["diaspora-common/services"]["description"]="Third party services to be enabled: 
 Diaspora can connect with different services.
 .
 When a diaspora instance is connected to a third party service,  it allows
 any user of this diaspora instance to link their account on that service to
 their diaspora account and send their updates to that service if they choose
 the service when publishing a post.
";
$elem["diaspora-common/services"]["descriptionde"]="Dienste von Drittanbietern, die aktiviert werden sollen:
 Diaspora kann sich mit verschiedenen Diensten verbinden.
 .
 Wenn eine Diaspora-Instanz mit einem Dienst eines Drittanbieters verbunden wird, erlaubt sie ihren Benutzern, ihr Benutzerkonto mit diesem Dienst zu verknüpfen und ihre Posts dorthin zu senden, wenn sie den Dienst bei der Veröffentlichung auswählen.
";
$elem["diaspora-common/services"]["descriptionfr"]="Services tiers à activer :
 Diaspora peut se connecter à différents services.
 .
 Lorsqu'une instance de Diaspora est connectée à un service tiers, elle permet à tous les utilisateurs de cette instance de lier leur compte sur ce service à leur compte Diaspora et d'envoyer leurs mises à jour sur ce service, s'ils choisissent le service lors de la publication de leur envoi.
";
$elem["diaspora-common/services"]["default"]="";
$elem["diaspora-common/purge_data"]["type"]="boolean";
$elem["diaspora-common/purge_data"]["description"]="Facebook App ID:
 Give your Facebook App ID. This can not be blank.
Facebook Secret:
 Give your Facebook Secret. This can not be blank.
Twitter Key:
 Give your Twitter Key. This can not be blank.
Twitter Secret:
 Give your Twitter Secret. This can not be blank.
Tumblr Key:
 Give your Tumblr Key. This can not be blank.
Tumblr Secret:
 Give your Tumblr Secret. This can not be blank.
Wordpress Client ID:
 Give your Wordpress Client ID. This can not be blank.
Wordpress Secret:
 Give your Wordpress Secret. This can not be blank.
Remove all data?
 This will permanently remove all data of this Diaspora instance such as
 uploaded files and any customizations in homepage.
";
$elem["diaspora-common/purge_data"]["descriptionde"]="Facebook-App-ID:
 Geben Sie Ihre Facebook-App-ID ein. Dieses Feld kann nicht leer sein.
Facebook-Geheimcode:
 Geben Sie Ihren Facebook-Geheimcode ein. Dieses Feld kann nicht leer sein.
Twitter-Key:
 Geben Sie Ihren Twitter-Key ein. Dieses Feld kann nicht leer sein.
Twitter-Geheimcode:
 Geben SIe Ihren Twitter-Geheimcode ein. Dieses Feld kann nicht leer sein.
Tumblr-Key:
 Geben Sie Ihren Tumblr-Key ein. Dieses Feld kann nicht leer sein.
Tumblr-Geheimcode:
 Geben SIe Ihren Tumblr-Geheimcode ein. Dieses Feld kann nicht leer sein.
Wordpress-Client-ID:
 Geben Sie Ihre Wordpress-Client-ID ein. Dieses Feld kann nicht leer sein.
Wordpress-Geheimcode:
 Geben Sie Ihren Wordpress-Geheimcode ein. Dieses Feld kann nicht leer sein.
Alle Daten entfernen?
 Dadurch werden alle Daten dieser Diaspora-Instanz, etwa hochgeladene Dateien und Bearbeitungen der Startseite, dauerhaft gelöscht.
";
$elem["diaspora-common/purge_data"]["descriptionfr"]="ID d'application de Facebook :
 Entrez votre ID Application de Facebook. Ce champ doit être renseigné.
Mot de passe de Facebook :
 Entrez votre mot de passe de Facebook. Ce champ doit être renseigné.
Identifiant Twitter :
 Entrez votre identifiant Twitter. Ce champ doit être renseigné.
Mot de passe de Twitter :
 Entrez votre mot de passe de Twitter. Ce champ doit être renseigné.
Identifiant Tumblr :
 Entrez votre identifiant Tumblr. Ce champ doit être renseigné.
Mot de passe de Tumblr :
 Entrez votre mot de passe de Tumblr. Ce champ doit être renseigné.
Identifiant client de Wordpress :
 Entrez votre identifiant client de Wordpress. Ce champ doit être renseigné.
Mot de passe de Wordpress :
 Entrez votre mot de passe de Wordpress. Ce champ doit être renseigné.
Faut-il supprimer toutes les données ?
 Cela supprimera de façon permanente toutes les données de cette instance de Diaspora telles que les fichiers téléchargés et toutes les personnalisations de la page d'accueil.
";
$elem["diaspora-common/purge_data"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
