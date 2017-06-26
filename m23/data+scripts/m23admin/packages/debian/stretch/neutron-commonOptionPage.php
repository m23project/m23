<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("neutron-common");

$elem["neutron/auth-host"]["type"]="string";
$elem["neutron/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of your Neutron authentication server. Typically
 this is also the hostname of your OpenStack Identity Service (Keystone).
";
$elem["neutron/auth-host"]["descriptionde"]="Rechnername des Authentifizierungsservers:
 Bitte geben Sie den Rechnernamen Ihres Neutron-Authentifizierungsservers an. Typischerweise ist das gleichzeitig der Rechnername Ihres OpenStack-Identitätsdienstes (Keystone).
";
$elem["neutron/auth-host"]["descriptionfr"]="Nom d'hôte du serveur d'authentification :
 Veuillez indiquer le nom d'hôte du serveur d'authentification Neutron. En général, il s'agit du nom d'hôte du Service d'Identité OpenStack (Keystone).
";
$elem["neutron/auth-host"]["default"]="127.0.0.1";
$elem["neutron/admin-tenant-name"]["type"]="string";
$elem["neutron/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["neutron/admin-tenant-name"]["descriptionde"]="Tenant-Name des Authentifizierungsservers:
 Bitte geben Sie den Tenant-Namen des Authentifizierungsservers an.
";
$elem["neutron/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
 Veuillez indiquer le nom d'espace client du serveur d'authentification.
";
$elem["neutron/admin-tenant-name"]["default"]="admin";
$elem["neutron/admin-user"]["type"]="string";
$elem["neutron/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["neutron/admin-user"]["descriptionde"]="Benutzername des Authentifizierungsservers:
 Bitte geben Sie den Benutzernamen an, der für den Authentifizierungsserver benutzt wird.
";
$elem["neutron/admin-user"]["descriptionfr"]="Identifiant sur le serveur d'authentification :
 Veuillez indiquer l'identifiant à utiliser sur le serveur d'authentification.
";
$elem["neutron/admin-user"]["default"]="admin";
$elem["neutron/admin-password"]["type"]="password";
$elem["neutron/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["neutron/admin-password"]["descriptionde"]="Passwort des Authentifizierungsservers:
 Bitte geben Sie das Passwort an, das für den Authentifizierungsserver benutzt wird.
";
$elem["neutron/admin-password"]["descriptionfr"]="Mot de passe sur le serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
";
$elem["neutron/admin-password"]["default"]="";
$elem["neutron/plugin-select"]["type"]="select";
$elem["neutron/plugin-select"]["choices"][1]="ml2";
$elem["neutron/plugin-select"]["choices"][2]="plumgrid";
$elem["neutron/plugin-select"]["choices"][3]="midonet";
$elem["neutron/plugin-select"]["choices"][4]="midonet_v2";
$elem["neutron/plugin-select"]["choices"][5]="nec";
$elem["neutron/plugin-select"]["choices"][6]="vmware";
$elem["neutron/plugin-select"]["description"]="Neutron plugin:
 Neutron uses a plugin architecture to manage networking. When starting the
 Neutron server daemon, the configuration file corresponding to the plugin you
 wish to use needs to be loaded, by giving it as a parameter when starting the
 neutron-server daemon. Also, the core_plugin directive needs to match. Please
 select which plugin to use.
";
$elem["neutron/plugin-select"]["descriptionde"]="Neutron-Zusatzmodul:
 Neutron verwendet eine Architektur aus Zusatzmodulen, um den Netzwerkzugriff zu verwalten. Wenn der Neutron-Server-Daemon startet, muss die Konfigurationsdatei, die zum Zusatzmodul gehört, geladen werden, indem sie dem Neutron-Server-Daemon beim Start als Parameter mitgegeben wird. Ebenso muss die Direktive »core_plugin« passen. Bitte wählen Sie das Zusatzmodul, das verwendet werden soll.
";
$elem["neutron/plugin-select"]["descriptionfr"]="Extension pour Neutron :
 Neutron utilise une architecture à base d'extensions pour gérer la mise en réseau. Lors du démarrage du démon du serveur Neutron, le fichier de configuration, correspondant à l'extension que vous souhaitez utiliser, doit être chargé en le passant comme paramètre lors du lancement du démon du serveur Neutron. Il faut également que l'instruction « core_plugin » corresponde. Veuillez choisir l'extension à utiliser.
";
$elem["neutron/plugin-select"]["default"]="ml2";
$elem["neutron/configure_db"]["type"]="boolean";
$elem["neutron/configure_db"]["description"]="Set up a database for Neutron?
 No database has been set up for Neutron to use. Before continuing, you should
 make sure you have the following information:
 .
  * the type of database that you want to use;
  * the database server hostname (that server must allow TCP connections from this
    machine);
  * a username and password to access the database.
 .
 If some of these requirements are missing, do not choose this option and run with
 regular SQLite support.
 .
 You can change this setting later on by running \"dpkg-reconfigure -plow
 neutron\".
";
$elem["neutron/configure_db"]["descriptionde"]="Datenbank für Neutron einrichten?
 Für die Benutzung durch Neutron wurde keine Datenbank eingerichtet. Bevor Sie fortfahren, sollten Sie sich versichern, dass Sie die folgenden Informationen haben:
 .
  * den Typ der Datenbank, die Sie verwenden möchten,
  * den Rechnernamen des Datenbankservers (dieser Server muss TCP-Verbindungen
    von diesem Rechner erlauben),
  * einen Benutzernamen und ein Passwort, um auf die Datenbank zuzugreifen
 .
 Falls einige dieser Anforderungen nicht erfüllt sind, wählen Sie diese Option nicht und verwenden Sie stattdessen die normale Sqlite-Unterstützung.
 .
 Sie können diese Einstellung später ändern, indem Sie »dpkg-reconfigure -plow neutron« ausführen.
";
$elem["neutron/configure_db"]["descriptionfr"]="Faut-il paramétrer une base de données pour Neutron ?
 Aucune base de données n'a été paramétrée pour Neutron. Avant de poursuivre, vous devriez vous assurer d'avoir les informations suivantes :
 .
  - Le type de base de données que vous souhaitez utiliser ;
  - le nom d'hôte du serveur de base de données (ce serveur
    doit accepter les connexions TCP depuis cette machine) ;
  - un nom d'utilisateur et un mot de passe pour accéder à
    cette base de données.     
 .
 Si certains de ces prérequis sont manquants, ignorez cette option et exécutez l'application avec la gestion SQLite normale.
 .
 Vous pouvez modifier ce réglage plus tard en lançant « dpkg-reconfigure -plow neutron ».
";
$elem["neutron/configure_db"]["default"]="false";
$elem["neutron/rabbit_host"]["type"]="string";
$elem["neutron/rabbit_host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["neutron/rabbit_host"]["descriptionde"]="IP-Adresse Ihres RabbitMQ-Rechners:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie die IP-Adresse dieses Servers an.
";
$elem["neutron/rabbit_host"]["descriptionfr"]="Adresse IP de l'hôte RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["neutron/rabbit_host"]["default"]="localhost";
$elem["neutron/rabbit_userid"]["type"]="string";
$elem["neutron/rabbit_userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to the RabbitMQ server.
";
$elem["neutron/rabbit_userid"]["descriptionde"]="Benutzername für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie den Benutzernamen ein, den Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["neutron/rabbit_userid"]["descriptionfr"]="Identifiant pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'identifiant à utiliser pour la connexion au serveur RabbitMQ.
";
$elem["neutron/rabbit_userid"]["default"]="guest";
$elem["neutron/rabbit_password"]["type"]="password";
$elem["neutron/rabbit_password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to the RabbitMQ server.
";
$elem["neutron/rabbit_password"]["descriptionde"]="Passwort für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie das Passwort ein, das Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["neutron/rabbit_password"]["descriptionfr"]="Mot de passe pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le mot de passe à utiliser pour la connexion au serveur RabbitMQ.
";
$elem["neutron/rabbit_password"]["default"]="";
$elem["neutron/tenant_network_type"]["type"]="select";
$elem["neutron/tenant_network_type"]["choices"][1]="local";
$elem["neutron/tenant_network_type"]["choices"][2]="gre";
$elem["neutron/tenant_network_type"]["choices"][3]="vlan";
$elem["neutron/tenant_network_type"]["choicesde"][1]="lokal";
$elem["neutron/tenant_network_type"]["choicesde"][2]="GRE";
$elem["neutron/tenant_network_type"]["choicesde"][3]="VLAN";
$elem["neutron/tenant_network_type"]["choicesfr"][1]="local";
$elem["neutron/tenant_network_type"]["choicesfr"][2]="gre";
$elem["neutron/tenant_network_type"]["choicesfr"][3]="vlan";
$elem["neutron/tenant_network_type"]["description"]="Type of network to allocate for tenant networks:
 The value \"local\" is useful only for single-box testing. In order for
 tenant networks to provide connectivity between hosts, it is necessary
 to either choose \"vlan\" and then configure \"network_vlan_ranges\" or to
 choose \"gre\" and then configure \"tunnel_id_ranges\". Choose \"none\" to
 disable creation of tenant networks.
";
$elem["neutron/tenant_network_type"]["descriptionde"]="Netzwerktyp, der für Tenant-Netzwerke reserviert werden soll:
 Der Wert »lokal« ist nur für das Testen einzelner Boxen nützlich. Damit Tenant-Netzwerke Verbindungen zwischen Rechnern bereitstellen können, ist es nötig, entweder »VLAN« auszuwählen und dann »network_vlan_ranges« zu konfigurieren oder »GRE« und dann »tunnel_id_ranges« einzurichten. Wählen Sie »keines«, um das Erstellen von Tenant-Netzwerken zu deaktivieren.
";
$elem["neutron/tenant_network_type"]["descriptionfr"]="Type de réseau à affecter aux réseaux d'espace client :
 La valeur « local » est utile seulement pour des tests avec un seul nœud. Afin que les réseaux d'espace client fournissent de la connectivité entre les hôtes, il est nécessaire de choisir entre « vlan » puis de configurer « network_vlan_ranges », ou bien de choisir « gre » et alors de configurer « tunnel_id_ranges ». Veuillez choisir « aucun » pour désactiver la création de réseaux d'espace client.
";
$elem["neutron/tenant_network_type"]["default"]="gre";
$elem["neutron/enable_tunneling"]["type"]="boolean";
$elem["neutron/enable_tunneling"]["description"]="Enable tunneling?
 Please choose whether support should be activated for GRE networks on the
 server and agents. This requires kernel support for OVS patch ports and
 GRE tunneling.
";
$elem["neutron/enable_tunneling"]["descriptionde"]="Tunneln aktivieren?
 Bitte wählen Sie, ob auf dem Server und den Clients Unterstützung für GRE-Netzwerke aktiviert werden soll. Dies erfordert Kernel-Unterstützung für OVS-Patch-Ports und GRE-Tunnel.
";
$elem["neutron/enable_tunneling"]["descriptionfr"]="Activer les tunnels ?
 Veuillez décider si la prise en charge des réseaux GRE doit être activée sur le serveur et les agents. Cela nécessite que le noyau gère les « patch ports » OVS et les tunnels GRE.
";
$elem["neutron/enable_tunneling"]["default"]="true";
$elem["neutron/tunnel_id_ranges"]["type"]="string";
$elem["neutron/tunnel_id_ranges"]["description"]="Tunnel id ranges:
 Please enter a comma-separated list of <tun_min>:<tun_max> tuples enumerating
 ranges of GRE tunnel IDs that are available for tenant network allocation
 if tenant_network_type is \"gre\".
";
$elem["neutron/tunnel_id_ranges"]["descriptionde"]="Tunnel-ID-Bereiche:
 Bitte geben Sie eine durch Kommas getrennte Liste von <tun_min>:<tun_max>-Tupeln ein, die für die Reservierung von Tenant-Netzwerken verfügbare Bereiche von GRE-Tunnel-IDs aufzählen, falls der Netzwerktyp »GRE« ist.
";
$elem["neutron/tunnel_id_ranges"]["descriptionfr"]="Plages d'identifiants de tunnel :
 Veuillez indiquer une liste de couples <tun_min>:<tun_max>, séparés par des virgules, énumérant les plages d'identifiants des tunnels GRE disponibles pour l'affectation au réseau d'espace client, si le type de réseau d'espace client est « gre ».
";
$elem["neutron/tunnel_id_ranges"]["default"]="1:1000";
$elem["neutron/local_ip"]["type"]="string";
$elem["neutron/local_ip"]["description"]="Local IP address of this hypervisor:
 Please enter the local IP address for this hypervisor.
";
$elem["neutron/local_ip"]["descriptionde"]="Lokale IP-Adresse dieses Hypervisors:
 Bitte geben Sie die lokale IP-Adresse dieses Hypervisors ein.
";
$elem["neutron/local_ip"]["descriptionfr"]="Adresse IP locale de cet hyperviseur :
 Veuillez indiquer l'adresse IP locale de cet hyperviseur.
";
$elem["neutron/local_ip"]["default"]="";
$elem["neutron/nova_url"]["type"]="string";
$elem["neutron/nova_url"]["description"]="Nova server URL:
 Please enter the URL of the Nova server.
";
$elem["neutron/nova_url"]["descriptionde"]="";
$elem["neutron/nova_url"]["descriptionfr"]="Adresse URL du serveur Nova :
 Veuillez indiquer l'adresse URL du serveur Nova..
";
$elem["neutron/nova_url"]["default"]="http://127.0.0.1:8774/v2";
$elem["neutron/nova_region"]["type"]="string";
$elem["neutron/nova_region"]["description"]="Nova server region name:
 Please enter the region of the Nova server.
";
$elem["neutron/nova_region"]["descriptionde"]="";
$elem["neutron/nova_region"]["descriptionfr"]="Nom de région pour le serveur Nova :
 Veuillez indiquer la région du serveur Nova.
";
$elem["neutron/nova_region"]["default"]="regionOne";
$elem["neutron/nova_admin_tenant_name"]["type"]="string";
$elem["neutron/nova_admin_tenant_name"]["description"]="Nova admin tenant name:
 Neutron needs to be able to communicate with Nova through Keystone. Therefore
 Neutron needs to know the Nova admin tenant name, username and password.
 .
 Please enter the ID of the admin tenant for Nova.
";
$elem["neutron/nova_admin_tenant_name"]["descriptionde"]="";
$elem["neutron/nova_admin_tenant_name"]["descriptionfr"]="";
$elem["neutron/nova_admin_tenant_name"]["default"]="admin";
$elem["neutron/nova_admin_username"]["type"]="string";
$elem["neutron/nova_admin_username"]["description"]="Neutron administrator username:
 Please enter the username of the Nova administrator.
";
$elem["neutron/nova_admin_username"]["descriptionde"]="";
$elem["neutron/nova_admin_username"]["descriptionfr"]="Identifiant de l'administrateur de Neutron :
 Veuillez indiquer l'identifiant de l'administrateur pour Nova.
";
$elem["neutron/nova_admin_username"]["default"]="admin";
$elem["neutron/nova_admin_password"]["type"]="password";
$elem["neutron/nova_admin_password"]["description"]="Nova administrator password:
 Please enter the password of the Nova administrator.
";
$elem["neutron/nova_admin_password"]["descriptionde"]="";
$elem["neutron/nova_admin_password"]["descriptionfr"]="Mot de passe administrateur pour Nova :
 Veuillez indiquer le mot de passe de l'administrateur pour Nova.
";
$elem["neutron/nova_admin_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
