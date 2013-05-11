<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dtc-core");

$elem["dtc/conf_mysqlautoconfig"]["type"]="boolean";
$elem["dtc/conf_mysqlautoconfig"]["description"]="Automatically configure MySQL user?
 DTC can use /etc/mysql/debian.cnf to automatically create a root mysql user
 for DTC to access and manage MySQL and DTC's database. This way, no question
 will be asked to you about what MySQL root password is used, all will be
 automated, but the drawback is that the MySQL server that will be used will
 always be located in the local machine (you won't be able to configure DTC
 to use a remote database server).
 .
 In any case, please make sure that your MySQL root password is set. As per
 default, Debian installs it with a blank password. To set your MySQL root
 password, issue the following command: dpkg-reconfigure mysql-server-5.0.
 You've been warned!
";
$elem["dtc/conf_mysqlautoconfig"]["descriptionde"]="Den MySQL-Benutzer automatisch konfigurieren?
 DTC kann /etc/mysql/debian.cnf verwenden, um automatisch einen MySQL-root-Benuzter zu erstellen, damit DTC auf MySQL und DTCs-Datenbank zugreifen und diese verwalten kann. Auf diese Weise werden Ihnen keine Fragen über das verwendete root-Passwort von MySQL gestellt, alles wird automatisiert. Der Nachteil ist aber, dass immer der MySQL-Server auf der lokalen Maschine verwendet wird (Sie werden nicht in der Lage sein, DTC so zu konfigurieren, dass es einen entfernten Datenbankserver verwendet).
 .
 Auf jeden Fall sollten Sie sicherstellen, dass das root-Passwort von MySQL gesetzt ist. Standardmäßig installiert Debian es mit einem leeren Passwort. Um ein root-MySQL-Passwort zu setzten, geben Sie den folgenden Befehl ein: dpkg-reconfigure mysql-server-5.0. Sie wurden gewarnt!
";
$elem["dtc/conf_mysqlautoconfig"]["descriptionfr"]="Faut-il automatiquement créer un identifiant MySQL ?
 Il est possible de créer automatiquement le superutilisateur de MySQL en utilisant /etc/mysql/debian.cnf, afin que DTC puisse gérer MySQL et sa base de données. De cette façon, la question relative au mot de passe du superutilisateur de MySQL ne sera pas posée et l'ensemble des opérations seront automatisées. En contrepartie, ce choix requiert que le serveur MySQL soit installé sur l'hôte local.
 .
 Quel que soit votre choix, veuillez vous assurer que le mot de passe du superutilisateur de MySQL est en place. Par défaut, ce mot de passe est vide. Pour définir un mot de passe pour le superutilisateur de MySQL, vous pouvez utiliser la commande « dpkg-reconfigure mysql-server-5.0 ».
";
$elem["dtc/conf_mysqlautoconfig"]["default"]="true";
$elem["dtc/conf_mysqlhost"]["type"]="string";
$elem["dtc/conf_mysqlhost"]["description"]="MySQL hostname:
 Please enter the hostname or IP address of the MySQL server.
";
$elem["dtc/conf_mysqlhost"]["descriptionde"]="MySQL-Hostname:
 Bitte geben Sie den Hostnamen oder die IP-Adresse des MySQL-Servers ein.
";
$elem["dtc/conf_mysqlhost"]["descriptionfr"]="Nom de l'hôte MySQL :
 Veuillez indiquer le nom d'hôte ou l'adresse IP du serveur MySQL.
";
$elem["dtc/conf_mysqlhost"]["default"]="localhost";
$elem["dtc/conf_mysqllogin"]["type"]="string";
$elem["dtc/conf_mysqllogin"]["description"]="MySQL administrator:
 Please enter the login name of a MySQL user with administrative
 privileges. DTC will use it to grant privileges for the tables to
 its users.
";
$elem["dtc/conf_mysqllogin"]["descriptionde"]="MySQL-Administrator:
 Bitte geben Sie einen MySQL-Benutzernamen mit administrativen Privilegien ein. DTC wird ihn zur Vergabe von Privilegien für Ihre Tabellen verwenden.
";
$elem["dtc/conf_mysqllogin"]["descriptionfr"]="Administrateur de MySQL :
 Veuillez indiquer l'identifiant d'un utilisateur MySQL qui possède les privilèges d'administration du serveur. DTC s'en servira pour attribuer les privilèges sur les tables à ses utilisateurs.
";
$elem["dtc/conf_mysqllogin"]["default"]="root";
$elem["dtc/conf_mysqlpass"]["type"]="password";
$elem["dtc/conf_mysqlpass"]["description"]="MySQL administrator password:
 Please enter the password of the MySQL administrator.
";
$elem["dtc/conf_mysqlpass"]["descriptionde"]="MySQL-Administrator-Passwort:
 Bitte geben Sie das Passwort für den MySQL-Administrator ein.
";
$elem["dtc/conf_mysqlpass"]["descriptionfr"]="Mot de passe de l'administrateur de MySQL :
 Veuillez indiquer le mot de passe de l'administrateur de MySQL.
";
$elem["dtc/conf_mysqlpass"]["default"]="";
$elem["dtc/conf_mysqldb"]["type"]="string";
$elem["dtc/conf_mysqldb"]["description"]="DTC database name:
 Please enter the name of the database to use for storing all DTC
 hosting information.
";
$elem["dtc/conf_mysqldb"]["descriptionde"]="DTC-Datenbankname:
 Bitte geben Sie den Namen der Datenbank ein, die zum Speichern aller DTC-Hosting-Informationen verwandt werden soll.
";
$elem["dtc/conf_mysqldb"]["descriptionfr"]="Nom de la base de données de DTC :
 Veuillez indiquer le nom de la base de données dont DTC se servira pour conserver ses informations d'hébergement.
";
$elem["dtc/conf_mysqldb"]["default"]="dtc";
$elem["dtc/conf_mysql_change_root"]["type"]="boolean";
$elem["dtc/conf_mysql_change_root"]["description"]="Change MySQL root password?
 By default, the mysql-server package does not require a password for
 the MySQL root user. This can be changed during the configuration of
 the DTC package.
";
$elem["dtc/conf_mysql_change_root"]["descriptionde"]="MySQL-root-Passwort ändern?
 Standardmäßig benötigt das mysql-server-Paket kein Passwort für den MySQL-root-Benutzer. Das kann während der Konfiguration von DTC geändert werden.
";
$elem["dtc/conf_mysql_change_root"]["descriptionfr"]="Faut-il changer le mot de passe du superutilisateur (« root ») de MySQL ?
 Par défaut, le paquet mysql-server n'impose pas de mot de passe pour le superutilisateur du serveur de bases de données. Ce mot de passe peut être mis en place pendant la configuration du paquet de DTC.
";
$elem["dtc/conf_mysql_change_root"]["default"]="false";
$elem["dtc/main_domainname"]["type"]="string";
$elem["dtc/main_domainname"]["description"]="Domain name:
 Please enter the first domain which you want DTC to
 manage. This domain name will be used to install the root
 admin and customer web control panel of DTC (under one of this domain's
 subdomains).
";
$elem["dtc/main_domainname"]["descriptionde"]="Domain-Name:
 Geben Sie die erste Domain ein, die von DTC administriert werden soll. Diese Domain wird verwandt, um den Hauptadministrator und das Kunden-Web-Steuer-Panel von DTC (auf einer Subdomain dieser Domain) zu installieren.
";
$elem["dtc/main_domainname"]["descriptionfr"]="Nom de domaine :
 Veuillez indiquer le premier domaine que vous voulez administrer avec DTC. Ce domaine sera utilisé pour installer le panneau de contrôle web général pour l'administration et la gestion des clients (dans un sous-domaine de ce domaine principal).
";
$elem["dtc/main_domainname"]["default"]="";
$elem["dtc/dtc_adminsubdomain"]["type"]="string";
$elem["dtc/dtc_adminsubdomain"]["description"]="DTC root panel subdomain:
 Please enter the subdomain to be used by the DTC control panel.
";
$elem["dtc/dtc_adminsubdomain"]["descriptionde"]="DTC-root-Panel-Subdomain:
 Geben Sie die Subdomain ein, die vom DTC-Steuer-Panel verwandt werden soll.
";
$elem["dtc/dtc_adminsubdomain"]["descriptionfr"]="Sous-domaine du panneau de contrôle principal de DTC :
 Veuillez indiquer le sous-domaine qu'utilisera DTC pour son panneau de contrôle principal.
";
$elem["dtc/dtc_adminsubdomain"]["default"]="dtc";
$elem["dtc/conf_ipaddr"]["type"]="string";
$elem["dtc/conf_ipaddr"]["description"]="Primary IP address:
 Please enter this host's primary IP address. This address will be
 used for the domain name you just provided, and will be used as the
 default for most DTC variables.  If you are using Network Address
 Translation (NAT), please enter your external IP address.
";
$elem["dtc/conf_ipaddr"]["descriptionde"]="Primäre IP-Adresse:
 Geben Sie die primäre IP-Adresse des Hosts ein. Diese IP-Adresse wird für die Domain benutzt, die Sie zuvor eingegeben haben und als Vorgabe für DTC-Variablen. Falls Sie Network Address Translation (NAT) benutzen, geben Sie hier bitte Ihre externe IP Adresse ein.
";
$elem["dtc/conf_ipaddr"]["descriptionfr"]="Adresse IP primaire :
 Veuillez indiquer l'adresse IP principale du serveur. Cette adresse sera utilisée pour le nom de domaine principal et sera la valeur par défaut de la plupart des variables du programme. Si vous utilisez la traduction d'adresses réseau (NAT : « Network Address Translation »), vous devriez indiquer l'adresse externe du serveur.
";
$elem["dtc/conf_ipaddr"]["default"]="";
$elem["dtc/conf_hostingpath"]["type"]="string";
$elem["dtc/conf_hostingpath"]["description"]="Path for hosted domains:
 Please enter the directory to be used by DTC to store files for
 all hosted domains.
 .
 If you choose /var/www, which is Apache's default document root, all
 files hosted in that directory may become publicly accessible. It is
 therefore recommended to change the DocumentRoot setting in Apache
 configuration if you choose /var/www as path for hosted domains.
";
$elem["dtc/conf_hostingpath"]["descriptionde"]="Pfad für gehostete Domains:
 Bitte geben Sie das Verzeichnis ein, das von DTC zum Speichen aller gehosteten Domains verwendet werden soll.
 .
 Falls Sie /var/www verwenden, welches Apaches voreingestelltes Wurzelverzeichnis ist, könnten alle gehosteten Dateien öffentlich zugänglich werden. Es wird daher empfohlen, die DocumentRoot-Einstellung in der Konfiguration von Apache zu ändern, falls Sie /var/www als Pfad für die gehosteten Domains wählen.
";
$elem["dtc/conf_hostingpath"]["descriptionfr"]="Chemin d'accès des domaines hébergés :
 Veuillez indiquer le répertoire qu'utilisera DTC pour les fichiers relatifs aux domaines hébergés.
 .
 Si vous choisissez le répertoire /var/www qui est la racine par défaut pour le serveur web Apache, tous les fichiers de ce répertoire pourraient devenir accessibles publiquement. Il est donc recommandé de changer le réglage « DocumentRoot » d'Apache si vous souhaitez utiliser /var/www pour les domaines hébergés.
";
$elem["dtc/conf_hostingpath"]["default"]="/var/www/sites";
$elem["dtc/conf_chroot_path"]["type"]="string";
$elem["dtc/conf_chroot_path"]["description"]="Path for the chroot environment template:
 Please enter the directory to be used by DTC to build the cgi-bin chroot
 environment template.
";
$elem["dtc/conf_chroot_path"]["descriptionde"]="Pfad für die chroot-Umgebungsvorlage:
 Bitte geben Sie den Pfad ein, der von DTC für die chroot-Umgebungsvorlage für cgi-bin verwendet werden soll.
";
$elem["dtc/conf_chroot_path"]["descriptionfr"]="Chemin pour l'environnement fermé d'exécution (« chroot ») :
 Veuillez indiquer le répertoire qu'utilisera DTC pour construire le canevas de l'environnement fermé d'exécution des programmes CGI.
";
$elem["dtc/conf_chroot_path"]["default"]="/var/lib/dtc/chroot_template";
$elem["dtc/conf_admlogin"]["type"]="string";
$elem["dtc/conf_admlogin"]["description"]="Main domain admin name:
 Each DTC domain must have an administrator. Please enter the login
 name of the administrator for the domain name containing the control
 panel installation.
";
$elem["dtc/conf_admlogin"]["descriptionde"]="Name des Administrators der Hauptdomain:
 Jede DTC-Domain muss einen Administrator haben. Bitte geben Sie einen Benutzernamen für den Administrator der Domain ein, die die Control-Panel-Installation enthält.
";
$elem["dtc/conf_admlogin"]["descriptionfr"]="Identifiant de l'administrateur du domaine principal :
 Chaque nom de domaine DTC doit avoir un administrateur. Veuillez indiquer l'identifiant de l'administrateur du domaine qui hébergera le panneau de contrôle principal.
";
$elem["dtc/conf_admlogin"]["default"]="dtc";
$elem["dtc/conf_admpass"]["type"]="password";
$elem["dtc/conf_admpass"]["description"]="Main domain admin password:
 Please choose the main domain administrator's password. Access
 to the control panel must be managed manually through a .htpasswd
 file in the root path.
";
$elem["dtc/conf_admpass"]["descriptionde"]="Administrator-Kennwort für die Hauptdomain:
 Bitte geben Sie das Passwort für den Administrator der Hauptdomain ein. Der Zugriff auf das Control Panel muss manuell durch eine .htpasswd-Datei im Wurzelverzeichnis verwaltet werden.
";
$elem["dtc/conf_admpass"]["descriptionfr"]="Mot de passe de l'administrateur du domaine principal :
 Veuillez choisir un mot de passe pour l'administrateur du domaine principal. L'accès au panneau de contrôle est géré par un fichier .htpasswd à la racine du serveur.
";
$elem["dtc/conf_admpass"]["default"]="Default:";
$elem["dtc/conf_mta_type"]["type"]="select";
$elem["dtc/conf_mta_type"]["choices"][1]="postfix";
$elem["dtc/conf_mta_type"]["description"]="Mail Transfer Agent (MTA) type:
 Please select the MTA that will be used with DTC. It
 should be installed on the system already. If no such MTA is currently
 installed, please complete the setup of DTC, install a MTA
 package, then run \"dpkg-reconfigure dtc\".
";
$elem["dtc/conf_mta_type"]["descriptionde"]="Typ des Mail Transfer Agents (MTA):
 Bitte wählen Sie einen MTA, der mit DTC verwendet werden soll. Er sollte bereits auf dem System installiert sein. Falls derzeit kein solcher MTA installiert ist, dann konfigurieren Sie DTC zu ende, installieren einen MTA und rufen »dpkg-reconfigure dtc« auf.
";
$elem["dtc/conf_mta_type"]["descriptionfr"]="Type du serveur de courriel (MTA : « Mail Transfer Agent ») :
 Veuillez indiquer le serveur de courriel qui sera utilisé avec DTC. Ce serveur doit déjà être installé sur le système. Si aucun serveur n'est installé, veuillez terminer la configuration de DTC, installer le paquet d'un serveur de courriel puis utiliser la commande « dpkg-reconfigure dtc ».
";
$elem["dtc/conf_mta_type"]["default"]="";
$elem["dtc/conf_use_cyrus"]["type"]="boolean";
$elem["dtc/conf_use_cyrus"]["description"]="Use Cyrus mail system?
 Please choose this option if you are using Cyrus for mail
 delivery, IMAP and MTA. This option is only compatible with Postfix.
";
$elem["dtc/conf_use_cyrus"]["descriptionde"]="Cyrus-E-Mailsystem verwenden?
 Bitte wählen sie diese Option, falls Sie Cyrus (IMAP und MTA) für die E-Mailzustellung verwenden wollen. Diese Option ist nur mit Postfix kompatibel.
";
$elem["dtc/conf_use_cyrus"]["descriptionfr"]="Souhaitez-vous utiliser le système de courriel Cyrus ?
 Veuillez choisir cette option si Cyrus est utilisé pour la distribution des courriels, le service IMAP ou comme serveur de courriel. Cette option n'est compatible qu'avec Postfix.
";
$elem["dtc/conf_use_cyrus"]["default"]="false";
$elem["dtc/conf_apache_version"]["type"]="select";
$elem["dtc/conf_apache_version"]["choices"][1]="2";
$elem["dtc/conf_apache_version"]["description"]="Apache version to configure:
 DTC supports both Apache and Apache2. Please enter the version
 which DTC should use.
";
$elem["dtc/conf_apache_version"]["descriptionde"]="Apache-Version, die konfiguriert werden soll:
 DTC unterstützt Apache und Apache2. Bitte geben Sie ein, welche Version DTC verwenden soll.
";
$elem["dtc/conf_apache_version"]["descriptionfr"]="Version d'Apache à configurer :
 DTC gère à la fois Apache et Apache2. Veuillez choisir la version à utiliser.
";
$elem["dtc/conf_apache_version"]["default"]="";
$elem["dtc/conf_use_nated_vhosts"]["type"]="boolean";
$elem["dtc/conf_use_nated_vhosts"]["description"]="Use \"NATed\" vhosts?
 DTC can configure Apache to use one of your IP addresses. If the
 server is firewalled with NAT and port redirections of public IP(s)
 address(es), a \"NATed\" vhost configuration can be generated.
 .
 This option should be chosen only if the server is not connected to
 the Internet directly, but through a firewall doing network address
 translation (NAT). If the server uses a dynamic public IP address,
 NAT and port forwarding are mandatory for DTC.
";
$elem["dtc/conf_use_nated_vhosts"]["descriptionde"]="NAT vhosts verwenden?
 DTC kann Apache so konfigurieren, dass es eine Ihrer IP-Adressen benutzt. Falls der Server hinter eine Firewall mit NAT und Portweiterleitung der öffentlichen IP-Adresse(n) steht, kann eine vhost-Konfiguration über NAT generiert werden.
 .
 Diese Option sollte nur verwendet werden, falls der Server nicht direkt sondern über eine Firewall mit Network Address Translation (NAT) mit dem Internet verbunden ist. Falls der Server eine dynamische öffentliche IP-Adresse verwendet, sind NAT und Portweiterleitung für DTC vorgeschrieben.
";
$elem["dtc/conf_use_nated_vhosts"]["descriptionfr"]="Faut-il utiliser des hôtes virtuels avec traduction d'adresses ?
 DTC peut configurer Apache pour utiliser une des adresses publiques du serveur. Si celui-ci est protégé par un pare-feu avec traduction d'adresses (NAT) et redirection de port depuis une ou des adresses publiques, une configuration utilisant des hôtes virtuels avec traduction d'adresses (« NATed vhosts ») peut être créée.
 .
 Cette option ne doit être activée que si le serveur n'est pas connecté directement sur l'Internet mais est accessible via un pare-feu avec traduction d'adresses. Si le serveur utilise une adresse IP publique dynamique, la traduction d'adresses et la redirection de ports sont obligatoires pour utiliser DTC.
";
$elem["dtc/conf_use_nated_vhosts"]["default"]="false";
$elem["dtc/conf_nated_vhosts_ip"]["type"]="string";
$elem["dtc/conf_nated_vhosts_ip"]["description"]="NATed LAN IP address:
 Please enter the IP address of the server for DTC to
 generate all vhosts that will be used by Apache.
";
$elem["dtc/conf_nated_vhosts_ip"]["descriptionde"]="IP-Adresse für LAN über NAT:
 Bitte geben Sie die IP-Adresse des Servers für DTC ein, um alle vhosts zu generieren, die von Apache verwendet werden sollen.
";
$elem["dtc/conf_nated_vhosts_ip"]["descriptionfr"]="Adresse IP traduite (avec NAT) sur le réseau local :
 Veuillez indiquer l'adresse IP du serveur, qui sera utilisée pour créer tous les hôtes virtuels utilisés par Apache.
";
$elem["dtc/conf_nated_vhosts_ip"]["default"]="";
$elem["dtc/conf_gen_ssl_cert"]["type"]="boolean";
$elem["dtc/conf_gen_ssl_cert"]["description"]="Generate an SSL certificate for DTC?
 If you choose this option, DTC will generate a self-signed SSL
 certificate and will use SSL to browse the panel. SSL will also be
 activated and the generated Apache configuration will activate HTTPS
 URLs for the control panel.
 .
 This certificate can be changed for a root CA certificate later.
 .
 Previously-generated certificates will never be overwritten. To
 regenerate the certificate, you need to remove all the files in
 /usr/share/dtc/etc/ssl.
";
$elem["dtc/conf_gen_ssl_cert"]["descriptionde"]="Soll ein SSL-Zertifikat für DTC generiert werden?
 Falls Sie diese Option wählen, wird DTC ein selbst-signiertes SSL-Zertifikat generieren und SSL für das Navigieren im Control Panel verwenden. SSL wird auch aktiviert und die generierte Apachekonfiguration wird HTTPS-URLs für das Control Panel verwenden.
 .
 Dieses Zertifikat kann gegen ein root CA-Zertifikat ausgetauscht werden.
 .
 Zuvor generierte Zertifikate werden nie überschrieben. Um das Zertifikat neu zu generieren, müssen Sie alle Dateien in /usr/share/dtc/etc/ssl entfernen.
";
$elem["dtc/conf_gen_ssl_cert"]["descriptionfr"]="Faut-il créer un certificat SSL pour DTC ?
 Si vous choisissez cette option, DTC créera un certificat SSL auto-signé et l'accès au panneau de contrôle se fera avec chiffrement SSL. La gestion de SSL sera également activée et la configuration créée pour Apache activera les URL HTTPS pour le panneau de contrôle.
 .
 Ce certificat peut être remplacé ultérieurement par un certificat signé par une autorité de certification.
 .
 En aucun cas, un certificat créé précédemment ne sera remplacé. Pour créer un nouveau certificat, tous les fichiers présents dans /usr/share/dtc/etc/ssl doivent préalablement être supprimés.
";
$elem["dtc/conf_gen_ssl_cert"]["default"]="true";
$elem["dtc/conf_cert_passphrase"]["type"]="password";
$elem["dtc/conf_cert_passphrase"]["description"]="DTC certificate passphrase:
 Please choose a passphrase to protect the generated SSL certificate.
";
$elem["dtc/conf_cert_passphrase"]["descriptionde"]="Passphrase für das DTC-Zertifikat:
 Bitte wählen Sie eine Passphrase, um das generierte SSL-Zertifikat zu schützen.
";
$elem["dtc/conf_cert_passphrase"]["descriptionfr"]="Phrase secrète pour le certificat de DTC :
 Veuillez choisir une phrase secrète qui servira à protéger le certificat SSL créé.
";
$elem["dtc/conf_cert_passphrase"]["default"]="";
$elem["dtc/conf_cert_countrycode"]["type"]="string";
$elem["dtc/conf_cert_countrycode"]["description"]="Country code for the DTC SSL certificate:
 Please enter the 2-letter country code for the generated
 certificate. This should usually be the code for the country the
 server is located in.
";
$elem["dtc/conf_cert_countrycode"]["descriptionde"]="Ländercode für das DTC-SSL-Zertifikat:
 Bitte geben Sie den Ländercode (zwei Buchstaben) für das generierte Zertifikat ein. Das sollte der Code für das Land sein, in dem sich Ihr Server befindet.
";
$elem["dtc/conf_cert_countrycode"]["descriptionfr"]="Code du pays pour le certificat SSL de DTC :
 Veuillez indiquer le code à deux lettres du pays qui sera utilisé pour le certificat SSL créé. Il est conseillé d'utiliser le code du pays où est situé le serveur.
";
$elem["dtc/conf_cert_countrycode"]["default"]="FR";
$elem["dtc/conf_cert_locality"]["type"]="string";
$elem["dtc/conf_cert_locality"]["description"]="City name for the DTC SSL certificate:
";
$elem["dtc/conf_cert_locality"]["descriptionde"]="Stadtname für das DTC-SSL-Zertifikat:
";
$elem["dtc/conf_cert_locality"]["descriptionfr"]="Nom de ville pour le certificat SSL de DTC :
";
$elem["dtc/conf_cert_locality"]["default"]="Paris";
$elem["dtc/conf_cert_organization"]["type"]="string";
$elem["dtc/conf_cert_organization"]["description"]="Organization name for the DTC SSL certificate:
";
$elem["dtc/conf_cert_organization"]["descriptionde"]="Organisationsnamen für das DTC-SSL-Zertifikat:
";
$elem["dtc/conf_cert_organization"]["descriptionfr"]="Organisme pour le certificat SSL de DTC :
";
$elem["dtc/conf_cert_organization"]["default"]="GPLHost";
$elem["dtc/conf_cert_unit"]["type"]="string";
$elem["dtc/conf_cert_unit"]["description"]="Organizational unit for the DTC SSL certificate:
";
$elem["dtc/conf_cert_unit"]["descriptionde"]="Organisationseinheit für das DTC SSL-Zertifikat:
";
$elem["dtc/conf_cert_unit"]["descriptionfr"]="Unité organisationnelle pour le certificat SSL de DTC :
";
$elem["dtc/conf_cert_unit"]["default"]="no-unit";
$elem["dtc/conf_cert_email"]["type"]="string";
$elem["dtc/conf_cert_email"]["description"]="Email address for the DTC SSL certificate:
";
$elem["dtc/conf_cert_email"]["descriptionde"]="E-Mailadresse für das DTC-SSL-Zertifikat:
";
$elem["dtc/conf_cert_email"]["descriptionfr"]="Adresse électronique pour le certificat SSL de DTC :
";
$elem["dtc/conf_cert_email"]["default"]="example@example.com";
$elem["dtc/conf_cert_challenge_pass"]["type"]="password";
$elem["dtc/conf_cert_challenge_pass"]["description"]="DTC SSL certificate challenge password:
";
$elem["dtc/conf_cert_challenge_pass"]["descriptionde"]="»Challenge«-Passwort für das DTC-SSL-Zertifikat:
";
$elem["dtc/conf_cert_challenge_pass"]["descriptionfr"]="Mot de passe pour le certificat SSL de DTC :
";
$elem["dtc/conf_cert_challenge_pass"]["default"]="";
$elem["dtc/conf_dnsbl_list"]["type"]="string";
$elem["dtc/conf_dnsbl_list"]["description"]="DNSBL (DNS BlackList) list:
 Please enter the list of preferred DNSBL servers to add to your Postfix mail
 server configuration.
";
$elem["dtc/conf_dnsbl_list"]["descriptionde"]="DNSBL (DNS BlackList) Liste:
 Geben Sie bitte eine Liste Ihrer bevorzugten DNSBL-Server ein, die zu Ihrer Postfix-Konfiguration hinzufügt werden sollen.
";
$elem["dtc/conf_dnsbl_list"]["descriptionfr"]="Liste de serveurs DNSBL :
 Veuillez indiquer la liste des serveurs de listes noires DNSBL qui doivent être ajoutés à la configuration du serveur de messagerie Postfix.
";
$elem["dtc/conf_dnsbl_list"]["default"]="zen.spamhaus.org";
$elem["dtc/conf_recipient_delim"]["type"]="select";
$elem["dtc/conf_recipient_delim"]["choices"][1]="+";
$elem["dtc/conf_recipient_delim"]["description"]="Local address extension character:
 Please choose the character that will be used to define a local address
 extension. This MUST match what you have set in your postfix or qmail setup.
 .
 The recipient delimiter will be used for your mailing lists. Let's say you use
 the + char as delimiter, then your users will have to send a mail to
 list+subscribe@example.com. The drawback when choosing + is that some MTA
 don't allow to send mail with this char in the recipient (namely some bad
 qmail patches are incompatibles), but when using - as delimiter, you will not
 be able to use an email of the form john-doe@example.com as - is the
 delimiter.
";
$elem["dtc/conf_recipient_delim"]["descriptionde"]="Lokales Adress-Erweiterungszeichen:
 Bitte wählen Sie das Zeichen aus, dass zur Definition einer lokalen Adresserweiterung verwendet wird. Es MUSS mit der Einstellung in Ihrer Postfix- oder QMail-Konfiguration übereinstimmen.
 .
 Das Trennzeichen für Empfänger wird für Ihre Mailinglisten verwandt. Verwenden Sie beispielsweise das »+«-Zeichen als Trenner, dann müssen Ihre Benutzer eine E-Mail an die Liste +subscribe@example.com schicken. Der Nachteil bei der Wahl von »+« besteht darin, dass einige MTA es nicht erlauben, E-Mails mit diesem Zeichen im Empfänger zu versenden (insbesondere sind einige schlechte Patches für Qmail inkompatibel). Verwenden Sie stattdessen »-« als Trenner, können Sie keine E-Mails der Form max-planck@example.com senden, da »-« der Trenner ist.
";
$elem["dtc/conf_recipient_delim"]["descriptionfr"]="Caractère d'extension des adresses locales :
 Veuillez choisir le caractère qui sert à définir une extension d'adresses locales. Ce caractère doit être le même que celui qui est utilisé dans la configuration de l'agent de transport de courriel (MTA : « Mail Transport Agent ») comme Postfix ou Qmail.
 .
 Le caractère de délimitation du destinataire sera utilisé pour vos listes de diffusion. Si, par exemple, vous utilisez le caractère + comme délimiteur, alors vos utilisateurs devront s'enregistrer avec maliste+subscribe@example.com. Le problème en choisissant + c'est que certains MTA refusent d'envoyer des couriels à ce genre d'adresse (notamment certains mauvais patchs pour qmail), mais si vous utilisez - comme délimiteur, alors vous ne pourrez pas utiliser jean-paul@example.com car le caractère - est le délimiteur.
";
$elem["dtc/conf_recipient_delim"]["default"]="";
$elem["dtc/conf_mx_mail"]["type"]="string";
$elem["dtc/conf_mx_mail"]["description"]="Subdomain name for the MX server:
 Your mail server will need to use a subdomain name to accept mail. This
 subdomain will be configured in your mail server and your domain name server
 by DTC. Any name is ok here.
";
$elem["dtc/conf_mx_mail"]["descriptionde"]="Subdomain-Name für den MX-Server:
 Ihr E-Mail-Server muss einen Subdomain-Namen verwenden, um E-Mail zu akzeptieren. Von DTC wird diese Subdomain in Ihrem E-Mail-Server und in Ihrem Domain-Server konfiguriert. Jeder Name ist hier geeignet.
";
$elem["dtc/conf_mx_mail"]["descriptionfr"]="Nom du sous-domaine pour le serveur MX :
 Votre serveur de messagerie a besoin d'utiliser un sous-domaine pour accepter des messages. Ce sous-domaine sera configuré par DTC dans votre serveur de messagerie et dans votre serveur de nom. N'importe quel nom est possible.
";
$elem["dtc/conf_mx_mail"]["default"]="mx";
$elem["dtc/conf_eth2monitor"]["type"]="string";
$elem["dtc/conf_eth2monitor"]["description"]="Network devices to monitor:
 Please enter all the network devices you wish to be monitored by the
 RRDTool graphing utility.
";
$elem["dtc/conf_eth2monitor"]["descriptionde"]="
 Bitte geben Sie alle Netzgeräte ein, die mittels RRDTool-Graphik-Hilfswerkzeug überwacht werden sollen.
";
$elem["dtc/conf_eth2monitor"]["descriptionfr"]="Interfaces réseaux à surveiller :
 Veuillez indiquer les interfaces réseaux qui seront surveillées avec l'utilitaire de représentation graphique RRDTool.
";
$elem["dtc/conf_eth2monitor"]["default"]="";
$elem["dtc/conf_report_setup_stat"]["type"]="boolean";
$elem["dtc/conf_report_setup_stat"]["description"]="Allow to report anonymous statistics to GPLHost?
 DTC installations can be reported to the GPLHost web site. The only
 collected data are the operating system name (Debian) and the IP
 address (used as a unique identifier only). An Internet connection
 and the wget binary are required to report the statistics.
";
$elem["dtc/conf_report_setup_stat"]["descriptionde"]="Darf eine anonyme Statistik an GPLHost geschickt werden?
 DTC-Installationen können an die GPLHost-Webseite gemeldet werden. Es wird nur der Betriebssystemname (Debian) und die IP-Adresse (als eindeutiger Bezeichner verwendet) gesandt. Eine Internetverbindung und das wget-Programm müssen installiert sein, damit die Statistiken gemeldet werden können.
";
$elem["dtc/conf_report_setup_stat"]["descriptionfr"]="Faut-il envoyer des statistiques (anonymes) à GPLHost ?
 Les installations de DTC peuvent être signalées au site web de GPLHost. Les seules données relevées sont le nom du système d'exploitation (Debian) et l'adresse IP (qui ne sert que de clé d'unicité). Une connexion à l'Internet ainsi que l'utilitaire wget sont indispensables pour envoyer ces informations.
";
$elem["dtc/conf_report_setup_stat"]["default"]="false";
$elem["dtc/conf_omit_dev_mknod"]["type"]="boolean";
$elem["dtc/conf_omit_dev_mknod"]["description"]="Skip mknod calls when building the chroot template?
 In some environments, such as Linux vServer, mknod cannot be
 executed. This option allows skipping the creation of the null,
 random and urandom devices during the chroot template creation.
";
$elem["dtc/conf_omit_dev_mknod"]["descriptionde"]="Sollen mknod-Aufrufe beim Generieren der chroot-Vorlage übersprungen werden?
 In manchen Umgebungen, z.B. Linux vServer, darf mknod nicht ausgeführt werden. Diese Option erlaubt das überspringen der Erstellung der null-, random- und urandom-Geräte während der Erstellung des chroot-Vorlage.
";
$elem["dtc/conf_omit_dev_mknod"]["descriptionfr"]="Omettre les appels à mknod lors de la création de l'environnement fermé d'exécution ?
 Dans certains environnements comme Linux vServer, mknod ne peut pas être exécuté. Pour cette raison, il est possible d'omettre la création des fichiers de périphériques « null », « random » et « urandom » pendant la création du canevas de l'environnement fermé d'exécution (« chroot »).
";
$elem["dtc/conf_omit_dev_mknod"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
