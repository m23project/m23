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
$elem["diaspora-common/url"]["descriptionde"]="Hostname für diese Diaspora-Instanz:
 Bitte wählen Sie den Hostnamen, unter dem diese Diaspora-Instanz erreichbar sein soll.
 .
 Es sollte der volle Hostname sein, wie man ihn vom Internet aus sieht, einschließlich des Domain-Namens, unter dem auf den Pod zugegriffen wird.
 .
 Falls ein inverser Proxy zum Einsatz kommt, geben Sie den Hostnamen ein, auf den der Proxy antwortet.
 .
 Dieser Hostname sollte nach der Ersteinrichtung nicht mehr verändert werden, weil er in der Datenbank hart kodiert eingetragen wird.
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
$elem["diaspora-common/dbpass"]["descriptionde"]="";
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
$elem["diaspora-common/ssl"]["descriptionde"]="";
$elem["diaspora-common/ssl"]["descriptionfr"]="";
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
$elem["diaspora-common/letsencrypt"]["descriptionde"]="";
$elem["diaspora-common/letsencrypt"]["descriptionfr"]="";
$elem["diaspora-common/letsencrypt"]["default"]="false";
$elem["diaspora-common/letsencrypt_email"]["type"]="string";
$elem["diaspora-common/letsencrypt_email"]["description"]="Email address for letsencrypt updates:
 Please provide a valid email address for letsencrypt updates.

";
$elem["diaspora-common/letsencrypt_email"]["descriptionde"]="";
$elem["diaspora-common/letsencrypt_email"]["descriptionfr"]="";
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
$elem["diaspora-common/dbbackup"]["descriptionde"]="";
$elem["diaspora-common/dbbackup"]["descriptionfr"]="";
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
$elem["diaspora-common/services"]["descriptionde"]="";
$elem["diaspora-common/services"]["descriptionfr"]="";
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
$elem["diaspora-common/purge_data"]["descriptionde"]="";
$elem["diaspora-common/purge_data"]["descriptionfr"]="";
$elem["diaspora-common/purge_data"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
