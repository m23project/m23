<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("laptop-net");

$elem["laptop-net/overwrite-config-files"]["type"]="boolean";
$elem["laptop-net/overwrite-config-files"]["description"]="Overwrite laptop-net configuration files?
 If you set this option, you will be asked a series of questions about your
 network configuration, and the answers to those questions will be used to
 generate new configuration files for laptop-net.  The new configuration
 files will overwrite any existing configuration files, and any changes you
 might have made to them in the past.
 .
 If you don't set this option, your configuration files will not be
 changed.
";
$elem["laptop-net/overwrite-config-files"]["descriptionde"]="Die Konfigurations-Dateien von laptop-net überschreiben?
 Wenn Sie hier zustimmen, dann werden Ihnen eine Reihe von Fragen über Ihre Netzwerkkonfiguration gestellt, und die Anworten auf diese Fragen werden zur Erzeugung neuer Konfigurationsdateien für laptop-net verwendet. Die neuen Konfigurationsdateien überschreiben alle bestehenden Konfigurationsdateien, und alle Änderungen, die Sie eventuell an ihnen vorgenommen haben.
 .
 Wenn Sie diese Option nicht setzen, dann werden Ihre Konfigurations-Dateien nicht geändert.
";
$elem["laptop-net/overwrite-config-files"]["descriptionfr"]="Faut-il écraser les fichiers de configuration de laptop-net ?
 Si vous choisissez cette option, vous devrez répondre à une série de questions concernant le réseau. Les réponses à ces questions seront utilisées pour créer de nouveaux fichiers de configuration pour laptop-net. Ils écraseront tous les fichiers existants ainsi que toutes les modifications que vous avez apportées lors d'une précédente installation.
 .
 Si vous ne choisissez pas cette option, les fichiers de configuration ne seront pas modifiés.
";
$elem["laptop-net/overwrite-config-files"]["default"]="false";
$elem["laptop-net/module-name"]["type"]="string";
$elem["laptop-net/module-name"]["description"]="Network-interface driver module:
 If you are using a network interface adapter driver that lacks adequate
 power management support then it is best if the driver is built as a
 module.  See the documentation for details.  If your driver is built as a
 module, enter the module's name here.  (For example, on the HP OmniBook
 500 or 6000 computers, the correct module name is \"3c59x\".)
 .
 If you do not need any module or if you are unsure, leave this blank.
 .
 Be aware that if your driver lacks adequate power management support then
 it may not work properly after a suspend and resume cycle.
";
$elem["laptop-net/module-name"]["descriptionde"]="Treiber für die Netzwerk-Schnittstelle:
 Falls Sie einen Netzwerk-Schnittstellen-Adapter verwenden, dem eine geeigneteUnterstützung für Energieverwaltung fehlt, dann wird der Treiber am besten als Modul gebaut. Lesen Sie die Dokumentation für Details. Falls Ihr Treiber als Modul gebaut ist, geben Sie hier den Namen ein. (Beispielsweise ist der korrekte Modul-Name auf HP Omnibooks 500 und 6000-Rechnern »3c59x«.)
 .
 Wenn Sie kein Modul benötigen oder sich unsicher sind, lassen das Feld leer.
 .
 Beachten Sie bitte: Falls Ihrem Treiber eine geeignete Unterstützung für Energie-Verwaltung fehlt, dann kann es sein, dass er nicht mehr richtig funktioniert, nachdem der Laptop aus dem Ruhezustand aufgewacht ist.
";
$elem["laptop-net/module-name"]["descriptionfr"]="Pilote de l'interface réseau :
 Si vous utilisez un pilote d'interface réseau qui ne possède pas une gestion adéquate de l'énergie, ce pilote devrait être utilisé sous forme de module noyau. Voir la documentation pour les détails. Si votre pilote est construit en tant que module, veuillez indiquer son nom ici. Par exemple, sur les HP Omnibook 500 ou 6000, le nom correct du module est « 3c59x ».
 .
 Si vous n'avez pas besoin de module ou si vous n'êtes pas sûr, laissez ce champ vide .
 .
 Veuillez noter que si votre pilote ne possède pas le support adéquat de la gestion d'énergie, il risque de ne pas fonctionner correctement après un cycle de suspension et de reprise.
";
$elem["laptop-net/module-name"]["default"]="";
$elem["laptop-net/mii-supported"]["type"]="boolean";
$elem["laptop-net/mii-supported"]["description"]="Does your network-interface driver support MII?
 MII stands for \"Media Independent Interface\".  Drivers that support MII
 can sense whether or not the network cable is plugged in and operating.
 If your hardware and driver support this then select this option here and
 this package will make use of this feature to detect cable insertion and
 removal.  Otherwise, do not select this option.
 .
 The following drivers support MII as of Linux 2.4.5: 3c59x 8139too
 eepro100 epic100 fealnx hamachi ioc3-eth natsemi pcnet32 pegasus sis900
 starfire sundance tlan tulip via-rhine winbond-840 yellowfin.
";
$elem["laptop-net/mii-supported"]["descriptionde"]="Unterstützt Ihre Netzwerk-Schnittstelle MII?
 MII steht für »Media Independent Interface« (Medienunabhängige Schnittstelle). Treiber, die MII unterstützen, können erkennen, ob das Netzwerkkabel eingesteckt und verbunden ist. Wenn Ihre Hardware und Treiber dies unterstützen, dann wählen Sie diese Option. Daraufhin wird dieses Paket diese Fähigkeit verwenden, um das Einstecken und Entfernen des Kabels zu erkennen. Andernfalls wählen Sie diese Option nicht.
 .
 Die folgenden Treiber unterstützen MII (Stand Linux 2.4.5): 3c59x 8139too eepro100 epic100 fealnx hamachi ioc3-eth natsemi pcnet32 pegasus sis900 starfire sundance tlan tulip via-rhine winbond-840 yellowfin.
";
$elem["laptop-net/mii-supported"]["descriptionfr"]="Le pilote de l'interface réseau gère-t-il MII ?
 MII signifie « Media Independant Interface ». Les pilotes qui gérent MII peuvent détecter si le câble est branché ou non. Si votre matériel et votre pilote gèrent cela, alors choisissez cette option et ce paquet s'en servira pour détecter l'insertion et la suppression du câble. Dans le cas contraire, ne choisissez pas cette option.
 .
 Les pilotes suivants gèrent le MII depuis la version 2.4.5 du noyau Linux : 3c59x 8139too eepro100 epic100 fealnx hamachi ioc3-eth natsemi pcnet32 pegasus sis900 starfire sundance tlan tulip via-rhine winbond-840 yellowfin.
";
$elem["laptop-net/mii-supported"]["default"]="true";
$elem["laptop-net/use-dhcp"]["type"]="boolean";
$elem["laptop-net/use-dhcp"]["description"]="Use DHCP for network configuration?
 If you use DHCP to configure your network interface then select this
 option.
 .
 Otherwise, do not select it and you will be prompted for your network
 configuration information.
";
$elem["laptop-net/use-dhcp"]["descriptionde"]="DHCP zur Netzwerkkonfiguration verwenden?
 Wenn Sie DHCP zur Konfiguration der Netzwerk-Schnittstellen verwenden, wählen Sie diese Option.
 .
 Andernfalls wählen Sie diese nicht, und Sie werden nach Informationen zu Ihrer Netzwerkkonfiguration gefragt.
";
$elem["laptop-net/use-dhcp"]["descriptionfr"]="Faut-il configurer le réseau via DHCP ?
 Si vous utilisez DHCP pour configurer votre interface réseau, veuillez choisir cette option.
 .
 Dans le cas contraire, ne la choisissez pas et la configuration réseau vous sera alors demandée.
";
$elem["laptop-net/use-dhcp"]["default"]="true";
$elem["laptop-net/ip-address"]["type"]="string";
$elem["laptop-net/ip-address"]["description"]="IP address for this interface:
 Please enter an IP address for this interface.
 .
 If you don't know what to put here, contact your system administrator.
";
$elem["laptop-net/ip-address"]["descriptionde"]="IP-Adresse für diese Schnittstelle:
 Bitte geben Sie die IP-Adresse für diese Schnittstelle ein.
 .
 Falls Sie nicht wissen, was Sie hier eingeben müssen, fragen Sie Ihren Systemadministrator.
";
$elem["laptop-net/ip-address"]["descriptionfr"]="Adresse IP pour cette interface :
 Veuillez indiquer une adresse IP pour cette interface.
 .
 Si vous ne savez pas quoi mettre ici, veuillez contacter votre administrateur système.
";
$elem["laptop-net/ip-address"]["default"]="";
$elem["laptop-net/netmask"]["type"]="string";
$elem["laptop-net/netmask"]["description"]="Network mask for this interface:
 Please enter the network mask for this interface.
 .
 If you don't know what to put here, contact your system administrator.
";
$elem["laptop-net/netmask"]["descriptionde"]="Netzwerkmaske für diese Schnittstelle:
 Bitte geben Sie die Netzwerkmaske für diese Schnittstelle ein.
 .
 Falls Sie nicht wissen, was Sie hier eingeben müssen, fragen Sie Ihren Systemadministrator.
";
$elem["laptop-net/netmask"]["descriptionfr"]="Masque réseau pour cette interfce :
 Veuillez indiquez le masque réseau pour cette interface.
 .
 Si vous ne savez pas quoi mettre ici, veuillez contacter votre administrateur système.
";
$elem["laptop-net/netmask"]["default"]="";
$elem["laptop-net/default-gateway"]["type"]="string";
$elem["laptop-net/default-gateway"]["description"]="Default gateway for this interface:
 Please enter the IP address of a default gateway for this interface.
 .
 If you don't know what to put here, contact your system administrator.
";
$elem["laptop-net/default-gateway"]["descriptionde"]="Standard-Gateway für diese Schnittstelle:
 Bitte geben sie die IP-Adresse des Standard-Gateways für diese Schnittstelle ein.
 .
 Falls Sie nicht wissen, was Sie hier eingeben müssen, fragen Sie Ihren Systemadministrator.
";
$elem["laptop-net/default-gateway"]["descriptionfr"]="Passerelle par défaut pour cette interface :
 Veuillez indiquer l'adresse IP de la passerelle par défaut pour cette interface. 
 .
 Si vous ne savez pas quoi mettre ici, veuillez contacter votre administrateur système.
";
$elem["laptop-net/default-gateway"]["default"]="";
$elem["laptop-net/default-nameserver"]["type"]="string";
$elem["laptop-net/default-nameserver"]["description"]="IP address of DNS server:
 Please enter the IP address of a DNS server to be used when this interface
 is active.  This address will be entered in /etc/resolv.conf after the
 \"nameserver\" keyword.
 .
 See the resolv.conf(5) manual page for more information. If you don't know
 what to put here, contact your system administrator.
";
$elem["laptop-net/default-nameserver"]["descriptionde"]="IP-Adresse des DNS-Servers:
 Bitte geben Sie die IP-Adresse eines DNS-Servers ein, der benutzt werden soll, wenn diese Schnittstelle aktiviert ist. Die Adresse wird nach dem Schlüsselwort »nameserver« in die /etc/resolv.conf eingetragen.
 .
 Lesen Sie die resolv.conf(5) Handbuchseite für weitere Informationen. Falls Sie nicht wissen, was Sie hier eingeben sollen, fragen Sie Ihren Systemadministrator.
";
$elem["laptop-net/default-nameserver"]["descriptionfr"]="Adresse IP d'un serveur DNS :
 Veuillez indiquer l'adresse IP d'un serveur DNS à utiliser lorsque cette interface est active. Elle sera écrite dans le fichier /etc/resolv.conf après le mot-clé « nameserver ».
 .
 Veuillez consulter la page de manuel de resolv.conf(5) pour davantage d'informations. Si vous ne savez pas quoi indiquer ici, veuillez contacter votre administrateur système.
";
$elem["laptop-net/default-nameserver"]["default"]="";
$elem["laptop-net/domain-name"]["type"]="string";
$elem["laptop-net/domain-name"]["description"]="Domain name:
 Please enter the default domain name to be used when looking up host
 names.  This is what is entered in /etc/resolv.conf after the \"domain\"
 keyword.
 .
 See the resolv.conf(5) manual page for more information. If you don't know
 what to put here, contact your system administrator.
";
$elem["laptop-net/domain-name"]["descriptionde"]="Domain-Name:
 Bitte geben Sie den Standard-Domain-Name ein, der beim Suchen nach Rechnernamen verwendet werden soll. Dies ist das, was nach demSchlüsselwort »domain« in der /etc/resolv.conf eingetragen wird.
 .
 Lesen Sie die resolv.conf(5) Handbuchseite für weitere Informationen. Falls Sie nicht wissen, was Sie hier eingeben sollen, fragen Sie Ihren Systemadministrator.
";
$elem["laptop-net/domain-name"]["descriptionfr"]="Nom de domaine :
 Veuillez indiquer le nom de domaine par défaut pour vérifier les noms d'hôte. Cette information est écrite dans /etc/resolv.conf après le mot-clé « domain ».
 .
 Veuillez consulter la page de manuel de resolv.conf(5) pour davantage d'informations. Si vous ne savez pas quoi indiquer ici, veuillez contacter votre administrateur système.
";
$elem["laptop-net/domain-name"]["default"]="";
$elem["laptop-net/domain-search"]["type"]="string";
$elem["laptop-net/domain-search"]["description"]="Domain search path:
 If you want to specify a search list for host name lookup, enter the
 domains here, separated by spaces.
 .
 See the resolv.conf(5) manual page for more information. If you don't know
 what to put here, leave it blank.
";
$elem["laptop-net/domain-search"]["descriptionde"]="Suchpfad für Domains:
 Falls Sie eine Suchliste für das Nachschlagen nach Rechnernamen angeben wollen, tragen Sie die Domains, getrennt durch Leerzeichen, hier ein.
 .
 Lesen Sie die resolv.conf(5) Handbuchseite für weitere Informationen. Falls Sie nicht wissen, was Sie hier eintragen sollen, lassen Sie das Feld leer.
";
$elem["laptop-net/domain-search"]["descriptionfr"]="Chemin de recherche du domaine :
 Si vous désirez spécifier une liste de recherche pour la résolution de nom d'hôte, veuillez indiquer ici les domaines, séparés par des espaces.
 .
 Voir la page de manuel de resolv.conf(5) pour davantage d'informations. Si vous ne savez pas quoi mettre ici, laissez vide.
";
$elem["laptop-net/domain-search"]["default"]="";
$elem["laptop-net/split-config-files"]["type"]="note";
$elem["laptop-net/split-config-files"]["description"]="The configuration file has been split
 The portion of the configuration file \"/etc/default/laptop-net\" that
 defines schemes has been split off into a new file,
 \"/etc/laptop-net/schemes\".  If you maintain your configuration file with
 debconf, the necessary changes to your configuration will be handled
 automatically.  Otherwise, you must manually convert the files into the
 new format.  You can use the template files in \"/usr/share/laptop-net/\" as
 examples.
";
$elem["laptop-net/split-config-files"]["descriptionde"]="Die Konfigurations-Dateien wurden aufgeteilt
 Der Anteil der Konfigurationsdatei »/etc/default/laptop-net«, der Schemata definiert, wurde in die neue Datei »/etc/laptop-net/schemes« abgespalten. Falls Sie Ihre Konfigurationsdatei mit debconf verwalten, werden die notwendigen Änderungen an Ihrer Konfiguration automatisch vorgenommen. Andernfalls müssen Sie die Dateien manuell in das neue Format konvertieren. Sie können die Datei-Vorlagen in »/usr/share/laptop-net/« als Beispiele verwenden.
";
$elem["laptop-net/split-config-files"]["descriptionfr"]="Fichier de configuration séparé en sous-fichiers.
 La partie du fichier de configuration « /etc/laptop-net » qui définit les schémas a été déplacée dans un nouveau fichier, « /etc/laptop-net/schemes ». Si vous gérez votre fichier de configuration avec debconf, les changements nécessaires seront effectués automatiquement. Sinon, vous devrez convertir vous-même les fichiers en un nouveau format. Vous pouvez utiliser les fichiers modèle dans « /usr/share/laptop-net/ » comme exemples.
";
$elem["laptop-net/split-config-files"]["default"]="";
PKG_OptionPageTail2($elem);
?>
