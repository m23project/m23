<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mailman3-web");

$elem["mailman3-web/django-site"]["type"]="string";
$elem["mailman3-web/django-site"]["description"]="Domain name for Mailman3 web interface:
 The Django project needs a default site domain set. This domain
 will be used by the webinterface and in mails sent in its name.
";
$elem["mailman3-web/django-site"]["descriptionde"]="";
$elem["mailman3-web/django-site"]["descriptionfr"]="Nom de domaine pour l'interface web de Mailman3
 Le projet Django fournissant une interface web à Mailman3 nécessite un nom de domaine par défaut. Ce domaine servira à l'interface web et pour les courriels envoyés par elle.

";
$elem["mailman3-web/django-site"]["default"]="example.com";
$elem["mailman3-web/emailname"]["type"]="string";
$elem["mailman3-web/emailname"]["description"]="Domain name for sender email addresses:
 If the Mailman3 web interface sends emails, this domain will
 be used for the sender addresses. In particular, it will be
 'postorius@<domain>' for internal authentication and
 'root@<domain>' for error messages.
";
$elem["mailman3-web/emailname"]["descriptionde"]="";
$elem["mailman3-web/emailname"]["descriptionfr"]="Nom de domaine pour l'envoi de courriels :
 Si l'interface Web de Mailman3 envoie des courriels, ce domaine sera utilisé comme domaine d'origine pour les envois. En particulier, les adresses seront de la forme 'postorius@<domaine>' pour l'authentification interne, et 'root@<domaine>' pour les messages d'erreur.

";
$elem["mailman3-web/emailname"]["default"]="localhost.local";
$elem["mailman3-web/superuser-name"]["type"]="string";
$elem["mailman3-web/superuser-name"]["description"]="Username of the Postorius superuser:
 This is the username of the Postorius superuser. It will have
 global administrative access to all mailinglists.
";
$elem["mailman3-web/superuser-name"]["descriptionde"]="";
$elem["mailman3-web/superuser-name"]["descriptionfr"]="Nom du superutilisateur pour Postorius :
 Il s'agit du nom du superutilisateur de Postorius. Il aura un accès administrateur à toutes les listes de diffusion.

";
$elem["mailman3-web/superuser-name"]["default"]="admin";
$elem["mailman3-web/superuser-mail"]["type"]="string";
$elem["mailman3-web/superuser-mail"]["description"]="Email address of the Postorius superuser:
";
$elem["mailman3-web/superuser-mail"]["descriptionde"]="";
$elem["mailman3-web/superuser-mail"]["descriptionfr"]="Adresse courriel du superutilisateur de Postorius :

";
$elem["mailman3-web/superuser-mail"]["default"]="root@localhost";
$elem["mailman3-web/superuser-password"]["type"]="password";
$elem["mailman3-web/superuser-password"]["description"]="Password for the Postorius superuser:
 If an empty password is given, no superuser will be created
 at all. It then needs to be created manually.
";
$elem["mailman3-web/superuser-password"]["descriptionde"]="";
$elem["mailman3-web/superuser-password"]["descriptionfr"]="Mot de passe du superutilisateur de Postorius :
 Si vous fournissez un mot de passe vide, aucun superutilisateur ne sera créé. Il faudra le faire manuellement.

";
$elem["mailman3-web/superuser-password"]["default"]="Default:";
$elem["mailman3-web/configure-webserver"]["type"]="select";
$elem["mailman3-web/configure-webserver"]["choices"][1]="none";
$elem["mailman3-web/configure-webserver"]["choices"][2]="apache2";
$elem["mailman3-web/configure-webserver"]["choicesfr"][1]="aucun";
$elem["mailman3-web/configure-webserver"]["choicesfr"][2]="apache2";
$elem["mailman3-web/configure-webserver"]["description"]="Web server(s) to configure automatically:
 Mailman3-web supports any web server with uwsgi support,
 however only Apache 2 and nginx can be configured
 automatically.
 .
 Please select the web server(s) that should be configured
 automatically for Mailman3-web.
";
$elem["mailman3-web/configure-webserver"]["descriptionde"]="";
$elem["mailman3-web/configure-webserver"]["descriptionfr"]="Serveur web à configurer automatiquement :
 Mailman3 fonctionne avec n'importe quel serveur web compatible avec uwsgi, cependant seuls Apache 2 et nginx peuven être configuré automatiquement pour l'instant. Si vous choisissez nginx, vous devrez modifier le nom de domaine dans le fichier de configuration /etc/mailman3/nginx.conf.
 .
 Veuillez choisir le serveur web que vous souhaitez configurer automatiquement pour l'interface web de Mailman3.

";
$elem["mailman3-web/configure-webserver"]["default"]="none";
$elem["mailman3-web/nginx-choice"]["type"]="note";
$elem["mailman3-web/nginx-choice"]["description"]="Configuring Mailman3 in Nginx
 The Mailman3 Nginx configuration file is a vhost configuration. Hence,
 it comes with a server name which is set to mailman.example.com. You
 will have to change it properly.
 .
 Please also note that Mailman3 is configured to expect the web interface
 at URL subdirectory '/mailman3' per default. But in the nginx file, as
 the configuration includes a vhost, the expected URL root is '/'.
 .
 For the Nginx vhost configuration (without '/mailman3' subdomain) to
 work, you will have to edit the URL in 'base-url' at
 '/etc/mailman3/mailman-hyperkitty.cfg' and in 'MAILMAN_ARCHIVER_FROM'
 at '/etc/mailman3/mailman-web.py' accordingly.
 .
 See the comments in '/etc/mailman3/nginx.conf' for details.
";
$elem["mailman3-web/nginx-choice"]["descriptionde"]="";
$elem["mailman3-web/nginx-choice"]["descriptionfr"]="Configuration de Mailman3 avec Nginx
 Le fichier de configuration pour nginx est un fichier incluant une configuration de type vhost. Il y a donc un nom de serveur qui est par défaut à mailman.example.com. Pensez à le changer.
 .
 Veuillez aussi noter que Mailman3 s'attend à ce que son interface web soit accessible via l'url '/mailman3' par défaut. Cependant, dans la configuration Nginx, comme celle-ci inclut un vhost, l'URL d'accès à l'interface web est '/'.
 .
 Pour que la configuration Nginx fonctionne (sans le sous-domaine '/mailman3') vous devez modifier l'URL de la variable  'base-url' dans le fichier '/etc/mailman3/mailman-hyperkitty.cfg', et la variable 'MAILMAN_ARCHIVER_FROM' dans '/etc/mailman3/mailman-web.py' en conséquence.
 .
 Vous pourrez retrouver toutes ces informations dans le fichier '/etc/mailman3/nginx.conf,' en commentaire.

";
$elem["mailman3-web/nginx-choice"]["default"]="";
$elem["mailman3-web/restart-webserver"]["type"]="boolean";
$elem["mailman3-web/restart-webserver"]["description"]="Should the webserver(s) be restarted now?
 In order to activate the new configuration, the configured
 web server(s) have to be restarted.
";
$elem["mailman3-web/restart-webserver"]["descriptionde"]="";
$elem["mailman3-web/restart-webserver"]["descriptionfr"]="Faut-il redémarrer le serveur web maintenant ?
 Pour que la nouvelle configuration fonctionne, le serveur web configuré doit être redémarré.
";
$elem["mailman3-web/restart-webserver"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
