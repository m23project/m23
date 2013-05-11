<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dtc-xen");

$elem["dtc-xen/conf_soap_port"]["type"]="string";
$elem["dtc-xen/conf_soap_port"]["description"]="Server port:
 Default is 8089. Please enter the port the dtc-xen SOAP server will bind to.
";
$elem["dtc-xen/conf_soap_port"]["descriptionde"]="Server-Port:
 Die Vorgabe lautet 8089. Bitte geben Sie den Port ein, an dem der Dtc-Xen-SOAP-Server auf Anfragen warten wird.
";
$elem["dtc-xen/conf_soap_port"]["descriptionfr"]="Port du serveur :
 Le défaut est 8089. Veuillez indiquer le port sur lequel le serveur sera à l'écoute.
";
$elem["dtc-xen/conf_soap_port"]["default"]="8089";
$elem["dtc-xen/conf_soap_login"]["type"]="string";
$elem["dtc-xen/conf_soap_login"]["description"]="SOAP server login:
 Dtc-xen will start it's Python based SOAP server to listen for incoming
 requests over a TCP socket. A remote application (like the dtc web hosting
 control panel) can then connect to it in order to start, stop, create and
 destroy a VPS.
 .
 Please enter the login name to connect to the server.
";
$elem["dtc-xen/conf_soap_login"]["descriptionde"]="SOAP-Server-Login:
 Dtc-xen wird seinen Python-basieren SOAP-Server starten, um auf über ein TCP-Socket eingehende Anfragen zu warten. Eine Anwendung (wie das Dtc-Webhosting-Control-Panel) kann sich dann aus der Ferne mit ihm verbinden, um eine VPS zu starten, stoppen, erzeugen oder zu vernichten.
 .
 Bitte geben Sie den Login-Namen für die Verbindung zum Server an.
";
$elem["dtc-xen/conf_soap_login"]["descriptionfr"]="Identifiant de connexion sur le serveur SOAP :
 Dtc-xen met à l'écoute son serveur SOAP Python sur un port TCP. Une application distante (comme le panneau de contrôle de dtc) peut s'y connecter afin de créer, démarrer, arrêter ou détruire un serveur virtuel privé.
 .
 Veuillez indiquer l'identifiant à utiliser pour la connexion au serveur SOAP.
";
$elem["dtc-xen/conf_soap_login"]["default"]="dtc-xen";
$elem["dtc-xen/conf_soap_pass"]["type"]="password";
$elem["dtc-xen/conf_soap_pass"]["description"]="SOAP server pass:
 Dtc-xen will generate a .htpasswd file for the login you have just
 configured.
 .
 Please enter the password to use in that file.
";
$elem["dtc-xen/conf_soap_pass"]["descriptionde"]="SOAP-Server-Pass:
 Dtc-xen wird eine .htpasswd-Datei für den Login, den Sie gerade konfiguriert haben, erstellen.
 .
 Bitte geben Sie das Passwort an, das in dieser Datei verwendet werden soll.
";
$elem["dtc-xen/conf_soap_pass"]["descriptionfr"]="Mot de passe du serveur SOAP :
 Dtc-xen créera un fichier .htpasswd pour y conserver l'identifiant de connexion configuré.
 .
 Veuillez indiquer le mot de passe à conserver dans ce fichier.
";
$elem["dtc-xen/conf_soap_pass"]["default"]="dtc-xen";
$elem["dtc-xen/conf_soap_domain_name"]["type"]="string";
$elem["dtc-xen/conf_soap_domain_name"]["description"]="Server domain name:
 Please enter the domain name for the dtc-xen server. This will be used as a
 part of the URL by the SOAP dtc panel client like nodeXXXX.example.com.
";
$elem["dtc-xen/conf_soap_domain_name"]["descriptionde"]="Server-Rechnername:
 Bitte geben Sie den Domainnamen des Dtc-xen-Servers ein. Dieser wird vom SOAP-Dtc-Panel-Client als Teil der URL, wie nodeXXXX.example.com, verwendet.
";
$elem["dtc-xen/conf_soap_domain_name"]["descriptionfr"]="Nom de domaine du serveur :
 Veuillez indiquer le nom de domaine du serveur dtc-xen. Il sera utilisé dans une partie l'URL de connexion utilisé par le panneau de contrôle dtc comme nodeXXXX.example.com.
";
$elem["dtc-xen/conf_soap_domain_name"]["default"]="example.com";
$elem["dtc-xen/conf_node_number"]["type"]="string";
$elem["dtc-xen/conf_node_number"]["description"]="VPS Server node number:
 Please enter the value to use to set up VPS numbering.
 .
 Assuming this value is 'XXXX', the VPS numbers will be 'xenXXXXYY',
 YY being the VPS number itself (xenYY), and XXXX being the Xen server number.
 This node number must be 4 or 5 characters long.
 .
 As a consequence of this choice, the server's hostname will be
 nodeXXXX.example.com (which you can later add in your DTC control
 panel).
";
$elem["dtc-xen/conf_node_number"]["descriptionde"]="Knotennummer des VPS:
 Bitte geben Sie den Wert an, der zur Einrichtung der Nummerierung des VPS (Virtual Private Server) verwendet werden soll.
 .
 Lautet der Wert beispielsweise »XXXX« werden die VPS-nnummern »xenXXXXYY« lauten, wobei »YY« die VPS-Nummer selbst (xenYY) und XXXX die Xen-Servernummer ist. Diese Knotennummer muss vier oder fünf Zeichen lang sein.
 .
 Als Ergebnis dieser Wahl wird der Rechnername des Servers nodeXXXX.example.com lauten (dies können Sie später in Ihrem DTC-Control-Panel ändern).
";
$elem["dtc-xen/conf_node_number"]["descriptionfr"]="Noeud du serveur VPS :
 Veuillez indiquer la valeur à utiliser pour configurer la numérotation des serveurs virtuels privés (VPS).
 .
 Si cette valeur est « XXXX », le numéro du noeud sera « xenXXXXYY », où YY est le numéro du serveur virtuel privé (xenYY), et où XXXX est le numéro du serveur Xen. Il est obligatoire d'utiliser une chaîne comportant 4 ou 5 caractères.
 .
 Finalement, le nom d'hôte du serveur sera « nodeXXXX.exemple.com » ce qui peut ensuite être configuré dans le panneau de contrôle de DTC.
";
$elem["dtc-xen/conf_node_number"]["default"]="0101";
$elem["dtc-xen/conf_debian_repository"]["type"]="string";
$elem["dtc-xen/conf_debian_repository"]["description"]="Debian repository for VPS creation:
 Please enter the repository to use for creating the VPS (Virtual Private
 Server). The current /etc/apt/sources.list file will be copied to the
 created VPS so the repository you enter here will be used only during
 the debootstrap stage of the VPS creation.
";
$elem["dtc-xen/conf_debian_repository"]["descriptionde"]="Debian-Depot für die VPS-Erstellung:
 Bitte geben Sie das Depot ein, das für die Erstellung des VPS (Virtual Private Server) verwendet werden soll. Die aktuelle /etc/apt/sources.list-Datei wird in den erstellten VPS kopiert, daher wird das hier angegebene Depot nur während der Debootstrap-Stufe der VPS-Erstellung verwendet.
";
$elem["dtc-xen/conf_debian_repository"]["descriptionfr"]="Dépôt Debian pour la création des serveurs virtuels privés :
 Veuillez indiquer le dépôt à utiliser pour créer les serveurs virtuels privés. Le fichier /etc/apt/sources.list sera copié dans le serveur virtuel privé créé, donc le choix indiqué ici n'est utilisé que lors de l'étape de création du serveur.
";
$elem["dtc-xen/conf_debian_repository"]["default"]="ftp://ftp.us.debian.org/debian";
$elem["dtc-xen/conf_netmask"]["type"]="string";
$elem["dtc-xen/conf_netmask"]["description"]="Network mask for the VPS:
 Please enter the network mask to use in the created Virtual Private
 Server's network settings.
";
$elem["dtc-xen/conf_netmask"]["descriptionde"]="Netzmaske für den VPS:
 Bitte geben Sie die Netzmaske ein, die in den Netzeinstellungen des erstellten Virtual Private Servers verwendet werden soll.
";
$elem["dtc-xen/conf_netmask"]["descriptionfr"]="Masque réseau des serveurs virtuels privés :
 Veuillez indiquer le masque réseau à utiliser dans les réglages des serveurs virtuels privés.
";
$elem["dtc-xen/conf_netmask"]["default"]="255.255.255.0";
$elem["dtc-xen/conf_network"]["type"]="string";
$elem["dtc-xen/conf_network"]["description"]="Network address for the VPS:
 Please enter the network address to use in the created Virtual Private
 Server's network settings.
";
$elem["dtc-xen/conf_network"]["descriptionde"]="Netzadresse für den VPS:
 Bitte geben Sie die Netzadresse ein, die in den Netzwerk-Einstellungen des Virtual Private Servers verwendet werden soll.
";
$elem["dtc-xen/conf_network"]["descriptionfr"]="Adresse réseau des VPS :
 Veuillez indiquer l'adresse réseau à utiliser dans les réglages des serveurs virtuels privés.
";
$elem["dtc-xen/conf_network"]["default"]="192.168.60.0";
$elem["dtc-xen/conf_broadcast"]["type"]="string";
$elem["dtc-xen/conf_broadcast"]["description"]="Broadcast address for the VPS:
 Please enter the network broadcast address to use in the created
 Virtual Private Server's network settings.
";
$elem["dtc-xen/conf_broadcast"]["descriptionde"]="Broadcast-Adresse für den VPS:
 Bitte geben Sie die Broadcast-Adresse ein, die in den Netzwerk-Einstellungen des Virtual Private Servers verwendet werden soll.
";
$elem["dtc-xen/conf_broadcast"]["descriptionfr"]="Adresse de diffusion des serveurs virtuels privés :
 Veuillez indiquer l'adresse de diffusion à utiliser dans les réglages des serveurs virtuels privés.
";
$elem["dtc-xen/conf_broadcast"]["default"]="192.168.60.255";
$elem["dtc-xen/conf_gateway"]["type"]="string";
$elem["dtc-xen/conf_gateway"]["description"]="Gateway address for the VPS:
 Please enter the network gateway address to use in the created
 Virtual Private Server's network settings.
";
$elem["dtc-xen/conf_gateway"]["descriptionde"]="Gateway-Adresse für den VPS:
 Bitte geben Sie die Netz-Gateway-Adresse ein, die in den Netzwerk-Einstellungen des Virtual Private Servers verwendet werden soll.
";
$elem["dtc-xen/conf_gateway"]["descriptionfr"]="Passerelle réseau des serveurs virtuels privés :
 Veuillez indiquer l'adresse de la passerelle réseau à utiliser dans les réglages des serveurs virtuels privés.
";
$elem["dtc-xen/conf_gateway"]["default"]="192.168.60.254";
$elem["dtc-xen/conf_linux_kernel_name"]["type"]="string";
$elem["dtc-xen/conf_linux_kernel_name"]["description"]="Xen kernel release name:
 Please enter the kernel version number as it appears with the
 'uname -a' command. 
 .
 A kernel domU with that name must be located in /boot (example:
 vmlinuz-2.6.16.27-xenU) and its corresponding modules must be in
 /lib/modules.
";
$elem["dtc-xen/conf_linux_kernel_name"]["descriptionde"]="Veröffentlichungsname des Xen-Kernels:
 Bitte geben Sie die Kernelversionsnummer ein, wie sie durch den Befehl »uname -a« angezeigt wird.
 .
 Ein Kernel domU mit diesem Namen muss sich in /boot befinden (Beispiel: 2.6.16.27-xenU) und die zugehörigen Module müssen in /lib/modules liegen.
";
$elem["dtc-xen/conf_linux_kernel_name"]["descriptionfr"]="Version du noyau Xen :
 Veuillez indiquer la version du noyau telle que donnée par la commande « uname -a ».
 .
 Un noyau « domU » avec ce nom doit être présent dans le répertoire /boot (par exemple, vmlinuz-2.6.26.27-xenU) et les modules noyau correspondants doivent se trouver dans /lib/modules.
";
$elem["dtc-xen/conf_linux_kernel_name"]["default"]="2.6.16.27-xenU";
$elem["dtc-xen/conf_lvm_name"]["type"]="string";
$elem["dtc-xen/conf_lvm_name"]["description"]="Volume group to create VPS in:
 Dtc-xen creates physical partitions in an existing LVM volume group
 .
 Please enter that volume group name. The volume group size must fit
 all the virtual machines you will set up later on this server. If
 you don't want to use LVM (because you don't care if loopback is
 slower), leave this setting to the default value.
";
$elem["dtc-xen/conf_lvm_name"]["descriptionde"]="Datenträgergruppe (»volume group«) in der der VPS erstellt werden soll:
 Dtc-xen erstellt physische Partitionen in einer existierenden LVM-Datenträgergruppe
 .
 Bitte geben Sie den Namen der Datenträgergruppe (»volume group«) ein. Die Datenträgergruppe muss hinreichend groß sein, damit alle virtuellen Maschinen, die Sie später auf diesem Server einrichten, hineinpassen. Falls Sie LVM nicht benutzen möchten (da Ihnen egal ist, ob loopback langsamer ist) lassen Sie diese Einstellung auf dem Standardwert.
";
$elem["dtc-xen/conf_lvm_name"]["descriptionfr"]="Groupe de volumes où créer les serveurs virtuels privés :
 Dtc-xen crée les partitions physiques dans un groupe de volumes existant dans le gestionnaire de volumes logiques (LVM) .
 .
 Veuillez indiquer le nom de ce groupe de volumes. Il doit avoir une taille suffisante pour contenir tous les serveurs virtuels qui seront configurés sur ce serveur. Si vous ne voulez pas utiliser LVM (notamment si l'utilisation d'un périphérique de bouclage, plus lent, convient), laissez la valeur par défaut.
";
$elem["dtc-xen/conf_lvm_name"]["default"]="lvm1";
$elem["dtc-xen/conf_info_finish_setup"]["type"]="note";
$elem["dtc-xen/conf_info_finish_setup"]["description"]="How to finish the install
 To finish the installation, you need to launch
 /usr/sbin/dtc-xen_finish_install. 
 .
 This script will remove port forwarding from the current sshd_config
 file and add the permission to access the xm console to the group xenusers so
 that users can login to the physical console.
 .
 Please note that the system is currently safe (connections to a
 physical console as xenXX will be rejected because the /etc/sudoers
 is not changed), but a basic user won't be able to log into his
 physical console using ssh.
";
$elem["dtc-xen/conf_info_finish_setup"]["descriptionde"]="Wie die Installation beendet werden soll
 Um die Installation zu beenden, müssen Sie /usr/sbin/dtc-xen_finish_install ausführen.
 .
 Dieses Skript wird Port-Weiterleitung aus der aktuellen sshd_config-Datei entfernen und der Gruppe »xenusers« die Erlaubnis für die xm-Konsole erteilen, so dass Benutzer sich an der virtuellen Konsole anmelden können.
 .
 Beachten Sie, dass dieses System derzeit sicher ist (Verbindungen zu physischen Konsolen wie xenXX werden abgewiesen, da /etc/sudoers nicht geändert wurde), aber ein einfacher Benutzer kann sich auf seiner physischen Konsole nicht mittels ssh anmelden.
";
$elem["dtc-xen/conf_info_finish_setup"]["descriptionfr"]="Comment finir l'installation
 Pour terminer l'installation, vous devez lancer le script /usr/sbin/dtc-xen_finish_install.
 .
 Ce script supprimera la redirection de ports de sshd_config et autorisera le groupe xenusers à  utiliser le terminal xm afin que les utilisateurs puissent se connecter à la console physique.
 .
 Veuillez noter que le système est pour l'instant sûr car personne ne peut se connecter à la console physique en tant que xenXX tant que le fichier /etc/sudoers n'est pas modifié. De plus, un simple utilisateur ne pourra pas se connecter par SSH sur sa console physique.
";
$elem["dtc-xen/conf_info_finish_setup"]["default"]="";
$elem["dtc-xen/conf_vps_mountpoint"]["type"]="string";
$elem["dtc-xen/conf_vps_mountpoint"]["description"]="VPS mountpoint:
 In order to do the setup of the VPS it's managing, dtc-xen will mount an LVM
 device or a file loopback on the dom0 of your Xen server, and then use it as a
 partition for your VPS. Loopback mounts by default are limited to a small
 number, and since LVM is also faster to access, it is the much preferred
 option. This will also be used to automatically set your /etc/fstab mount
 points so you can do maintenance and mount VPSes with less hassle. Enter the
 desired path prefix for these mount points.
";
$elem["dtc-xen/conf_vps_mountpoint"]["descriptionde"]="VPS-Einhängepunkt:
 Um den VPS einzurichten, den es verwalten soll, wird Dtc-xen eine LVM-Gerät oder eine Datei via Loopback im Dom0 Ihres Xen-Servers einhängen und dann diese als Partition für Ihre VPS verwenden. Standardmäßig können nur wenige Loopback-Einhängungen vorgenommen werden, und da LVM auch im Zugriff schneller ist, wird diese Option deutlich empfohlen. Dies wird auch dazu verwendet, Ihre Einhängepunkte in der /etc/fstab automatisch zu setzen, so dass Wartungen und das Einhängen von VPSen mit weniger Ärger verbunden ist. Geben Sie hier den Pfadpräfix zu diesen Einhängepunkten an.
";
$elem["dtc-xen/conf_vps_mountpoint"]["descriptionfr"]="Point de montage des serveurs virtuels privés :
 Pour fabriquer les VPS qu'il gère, dtc-xen va monter des partitions LVM ou des fichiers loopback dans le dom0 de votre serveur Xen, et les utilisera en tant que partition pour vos VPS. Les montages loopback sont par défaut limité en nombre, et vu que LVM est aussi plus rapide a accéder, c'est vraiment l'option la meilleurs. Ce point de montage sera aussi utilisé pour gérer vos points de montages dans /etc/fstab pour que vous puissiez faire de la maintenance et monter vos VPS plus rapidement. Entrez votre chemin pour ce point de montage.
";
$elem["dtc-xen/conf_vps_mountpoint"]["default"]="/var/lib/dtc-xen/mnt";
$elem["dtc-xen/conf_debian_release"]["type"]="select";
$elem["dtc-xen/conf_debian_release"]["choices"][1]="sarge";
$elem["dtc-xen/conf_debian_release"]["choices"][2]="etch";
$elem["dtc-xen/conf_debian_release"]["choices"][3]="lenny";
$elem["dtc-xen/conf_debian_release"]["description"]="Debian os to setup:
 Select the Debian operating system that you want to have setup when dtc-xen
 creates a new VM instance with debootstrap.
";
$elem["dtc-xen/conf_debian_release"]["descriptionde"]="Einzurichtendes Debian-Betriebssystem:
 Wählen Sie hier das Debian-Betriebssystem aus, das Sie eingerichtet bekommen möchten, wenn Dtc-Xen eine neue VM-Instanz mit Debootstrap erstellt.
";
$elem["dtc-xen/conf_debian_release"]["descriptionfr"]="Stystème Debian à installer:
 Choisissez le système d'exploitation Debian que vous voulez lorsque dtc-xen fabrique une nouvelle instance de machine virtuelle avec debootstrap.
";
$elem["dtc-xen/conf_debian_release"]["default"]="lenny";
PKG_OptionPageTail2($elem);
?>
