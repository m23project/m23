<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("samba-common");

$elem["samba-common/dhcp"]["type"]="boolean";
$elem["samba-common/dhcp"]["description"]="Modify smb.conf to use WINS settings from DHCP?
 If your computer gets IP address information from a DHCP server on the
 network, the DHCP server may also provide information about WINS servers
 (\"NetBIOS name servers\") present on the network.  This requires a
 change to your smb.conf file so that DHCP-provided WINS settings will
 automatically be read from /etc/samba/dhcp.conf.
 .
 The dhcp3-client package must be installed to take advantage of this
 feature.
";
$elem["samba-common/dhcp"]["descriptionde"]="Soll smb.conf so abgeändert werden, dass per DHCP angebotene WINS-Einstellungen verwendet werden?
 Wenn Ihr Computer IP-Adress-Informationen von einem DHCP-Server im Netzwerk bezieht, kann es sein, dass auch Informationen über WINS-Server (»NetBIOS-Name-Server«) zur Verfügung gestellt werden, sollten solche Server im Netzwerk vorhanden sein. Eine Änderung der Datei smb.conf ist erforderlich, damit die über DHCP angebotenen WINS-Einstellungen automatisch aus der Datei /etc/samba/dhcp.conf übernommen werden.
 .
 Sie müssen das Paket dhcp3-client installiert haben, um diese Funktionalität nutzen zu können.
";
$elem["samba-common/dhcp"]["descriptionfr"]="Modifier smb.conf pour utiliser les paramètres WINS fournis par DHCP ?
 Si votre ordinateur obtient ses paramètres IP à partir d'un serveur DHCP du réseau, ce serveur peut aussi fournir des informations sur les serveurs WINS (serveurs de noms NetBIOS) présents sur le réseau. Une modification du fichier smb.conf est nécessaire afin que les réglages WINS fournis par le serveur DHCP soient lus dans /etc/samba/dhcp.conf.
 .
 Le paquet dhcp3-client doit être installé pour utiliser cette fonctionnalité.
";
$elem["samba-common/dhcp"]["default"]="false";
$elem["samba-common/do_debconf"]["type"]="boolean";
$elem["samba-common/do_debconf"]["description"]="Configure smb.conf automatically?
 The rest of the configuration of Samba deals with questions that
 affect parameters in /etc/samba/smb.conf, which is the file used to
 configure the Samba programs (nmbd and smbd). Your current smb.conf
 contains an 'include' line or an option that spans multiple lines,
 which could confuse the automated configuration process and require
 you to edit your smb.conf by hand to get it working again.
 .
 If you do not choose this option, you will have to handle
 any configuration changes yourself, and will not be able to take
 advantage of periodic configuration enhancements.
";
$elem["samba-common/do_debconf"]["descriptionde"]="Soll smb.conf automatisch konfiguriert werden?
 Der Rest der Konfiguration von Samba betrifft Fragen über Parameter in /etc/samba/smb.conf (das ist die Datei, die genutzt wird, um die Samba-Programme (nmbd und smbd) zu konfigurieren). Ihre aktuelle smb.conf enthält eine »include«-Zeile oder eine mehrzeilige Option. Dies kann den automatischen Konfigurationsprozess stören, so dass Sie eventuell Ihre smb.conf-Datei manuell korrigieren müssen, um Samba wieder zum Laufen zu bekommen.
 .
 Wenn Sie diese Option nicht wählen, werden Sie jede Änderung an der Konfiguration manuell vornehmen müssen und können nicht den Vorteil von regelmäßigen Verbesserungen an der Konfiguration nutzen.
";
$elem["samba-common/do_debconf"]["descriptionfr"]="Voulez-vous configurer smb.conf automatiquement ?
 La suite de la configuration de Samba pose des questions relatives aux paramètres de /etc/samba/smb.conf, le fichier utilisé pour configurer les programmes de Samba (nmbd et smbd). Le fichier actuel contient une ligne « include » ou une option qui s'étale sur plusieurs lignes : cela peut perturber la configuration automatique. Il est donc conseillé de gérer le contenu de ce fichier vous-même.
 .
 Si vous ne choisissez pas cette option, vous devrez gérer vous-même les modifications de configuration et vous ne pourrez pas bénéficier des améliorations faites dans la configuration.
";
$elem["samba-common/do_debconf"]["default"]="true";
$elem["samba-common/workgroup"]["type"]="string";
$elem["samba-common/workgroup"]["description"]="Workgroup/Domain Name:
 Please specify the workgroup you want this server to appear to be in
 when queried by clients. Note that this parameter also controls the
 domain name used with the security=domain setting.
";
$elem["samba-common/workgroup"]["descriptionde"]="Arbeitsgruppen-/Domain-Name:
 Bitte geben Sie die Arbeitsgruppe an, in der der Server bei Anfragen von Clients erscheinen soll. Beachten Sie, dass dieser Parameter auch den Domain-Namen festlegt, der für die Einstellung security=domain verwendet wird.
";
$elem["samba-common/workgroup"]["descriptionfr"]="Nom de domaine ou de groupe de travail :
 Veuillez indiquer le groupe de travail où les clients doivent trouver le serveur. Il indique aussi le nom de domaine utilisé par le paramètre « security=domain » quand celui-ci est utilisé.
";
$elem["samba-common/workgroup"]["default"]="WORKGROUP";
$elem["samba-common/encrypt_passwords"]["type"]="boolean";
$elem["samba-common/encrypt_passwords"]["description"]="Use password encryption?
 All recent Windows clients communicate with SMB servers using encrypted
 passwords. If you want to use clear text passwords you will need to change
 a parameter in your Windows registry. 
 .
 Enabling this option is highly recommended. If you do, make sure you
 have a valid /etc/samba/smbpasswd file and that you set passwords in
 there for each user using the smbpasswd command.
";
$elem["samba-common/encrypt_passwords"]["descriptionde"]="Verschlüsselte Passwörter verwenden?
 Alle aktuellen Windows-Clients kommunizieren mit SMB-Servern mittels verschlüsselter Passwörter. Wenn Sie Passwörter im Klartext verwenden möchten, müssen Sie einen Parameter in der Windows Registry ändern. 
 .
 Es wird dringendst empfohlen, diese Option zu aktivieren. Stellen Sie in dem Fall sicher, dass Sie eine gültige /etc/samba/smbpasswd-Datei haben und dort mittels dem smbpasswd-Befehl Passwörter für alle Benutzer setzen.
";
$elem["samba-common/encrypt_passwords"]["descriptionfr"]="Voulez-vous chiffrer les mots de passe ?
 Tous les clients Windows récents communiquent avec les serveurs SMB en utilisant des mots de passe chiffrés. Si vous voulez utiliser des mots de passe sans chiffrement, vous devez modifier un paramètre dans le registre de Windows.
 .
 Il est recommandé d'utiliser des mots de passe chiffrés. Si vous le faites, n'oubliez pas de créer un fichier /etc/samba/smbpasswd et d'y établir les mots de passe de tous les utilisateurs, à l'aide de la commande « smbpasswd ».
";
$elem["samba-common/encrypt_passwords"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
