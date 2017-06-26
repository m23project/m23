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
$elem["diaspora-common/dbpass"]["descriptionfr"]="";
$elem["diaspora-common/dbpass"]["default"]="";
$elem["diaspora-common/ssl"]["type"]="boolean";
$elem["diaspora-common/ssl"]["description"]="Enable https?
 Enabling https means that an SSL certificate is required to access this
 Diaspora instance (as Nginx will be configured to respond only to https
 requests). A self-signed certificate is enough for local testing (and
 can be generated using, for instance, the package easy-rsa), but will
 not be accepted for federation with other Diaspora pods.
 .
 Some certificate authorities like StartSSL (startssl.com) or WoSign
 (buy.wosign.com/free) offer free SSL certificates that work with Diaspora;
 however, certificates provided by CAcert will not work with Diaspora.
 .
 You can disable https if you want to access Diaspora only locally, via
 Unicorn on port 3000. If you disable https, Nginx configuration will be
 skipped.

";
$elem["diaspora-common/ssl"]["descriptionde"]="";
$elem["diaspora-common/ssl"]["descriptionfr"]="";
$elem["diaspora-common/ssl"]["default"]="true";
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

";
$elem["diaspora-common/services"]["descriptionde"]="";
$elem["diaspora-common/services"]["descriptionfr"]="";
$elem["diaspora-common/services"]["default"]="";
PKG_OptionPageTail2($elem);
?>
