<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("samba-common");

$elem["samba-common/title"]["type"]="title";
$elem["samba-common/title"]["description"]="Samba server and utilities
";
$elem["samba-common/title"]["descriptionde"]="Samba-Server und Hilfsprogramme
";
$elem["samba-common/title"]["descriptionfr"]="Serveur et utilitaires Samba
";
$elem["samba-common/title"]["default"]="";
$elem["samba-common/dhcp"]["type"]="boolean";
$elem["samba-common/dhcp"]["description"]="Modify smb.conf to use WINS settings from DHCP?
 If your computer gets IP address information from a DHCP server on the
 network, the DHCP server may also provide information about WINS servers
 (\"NetBIOS name servers\") present on the network.  This requires a
 change to your smb.conf file so that DHCP-provided WINS settings will
 automatically be read from /etc/samba/dhcp.conf.
 .
 The dhcp-client package must be installed to take advantage of this
 feature.
";
$elem["samba-common/dhcp"]["descriptionde"]="Soll smb.conf so abgeändert werden, dass per DHCP angebotene WINS-Einstellungen verwendet werden?
 Wenn Ihr Computer IP-Adress-Informationen von einem DHCP-Server im Netzwerk bezieht, ist es möglich, dass der DHCP-Server auch Informationen über im Netz vorhandene WINS-Server (»NetBIOS-Name-Server«) zur Verfügung stellt. Eine Änderung der Datei smb.conf ist erforderlich, damit die über DHCP angebotenen WINS-Einstellungen automatisch aus der Datei /etc/samba/dhcp.conf übernommen werden.
 .
 Sie müssen das Paket dhcp-client installiert haben, um diese Funktionalität nutzen zu können.
";
$elem["samba-common/dhcp"]["descriptionfr"]="Modifier smb.conf pour utiliser les paramètres WINS fournis par DHCP ?
 Si votre ordinateur obtient ses paramètres IP à partir d'un serveur DHCP du réseau, ce serveur peut aussi fournir des informations sur les serveurs WINS (serveurs de noms NetBIOS) présents sur le réseau. Une modification du fichier smb.conf est nécessaire afin que les réglages WINS fournis par le serveur DHCP soient lus dans /etc/samba/dhcp.conf.
 .
 Le paquet dhcp-client doit être installé pour utiliser cette fonctionnalité.
";
$elem["samba-common/dhcp"]["default"]="false";
$elem["samba-common/do_debconf"]["type"]="boolean";
$elem["samba-common/do_debconf"]["description"]="Configure smb.conf automatically?
 The rest of the configuration of Samba deals with questions that
 affect parameters in /etc/samba/smb.conf, which is the file used to
 configure the Samba programs (nmbd and smbd). Your current smb.conf
 contains an \"include\" line or an option that spans multiple lines,
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
 Please specify the workgroup for this system.  This setting controls which
 workgroup the system will appear in when used as a server, the default
 workgroup to be used when browsing with various frontends, and the domain
 name used with the \"security=domain\" setting.
";
$elem["samba-common/workgroup"]["descriptionde"]="Arbeitsgruppen-/Domain-Name:
 Bitte geben Sie die Arbeitsgruppe für dieses System an. Diese Einstellung beeinflußt, in welcher Arbeitsgruppe das System erscheint, wenn es als Server verwendet wird, die zu verwendende Standard-Arbeitsgruppe, wenn das Netzwerk mit verschiedenen Programmen durchsucht wird sowie den Domain-Namen, der für die Einstellung »security=domain« verwendet wird.
";
$elem["samba-common/workgroup"]["descriptionfr"]="Nom de domaine ou de groupe de travail :
 Veuillez indiquer le groupe de travail pour ce système. Ce réglage définit le groupe de travail où le système apparaîtra s'il est utilisé comme serveur, le groupe de travail utilisé par défaut avec les divers outils de Samba ainsi que le nom de domaine utilisé le cas échéant avec le paramètre « security=domain ».
";
$elem["samba-common/workgroup"]["default"]="WORKGROUP";
PKG_OptionPageTail2($elem);
?>
