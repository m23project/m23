<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gforge-dns-bind9");

$elem["gforge/shared/domain_name"]["type"]="string";
$elem["gforge/shared/domain_name"]["description"]="GForge domain or subdomain name:
 Please enter the domain that will host the GForge installation. Some
 services (scm, lists, etc.) will be given their own subdomain in that
 domain.
";
$elem["gforge/shared/domain_name"]["descriptionde"]="GForge Domain- oder Subdomain-Name:
 Bitte geben Sie die Domain an, die Ihre GForge-Installation beherbergen wird. Einigen Diensten (scm, lists, usw.) wird innerhalb der Domain eine eigene Subdomain zugewiesen.
";
$elem["gforge/shared/domain_name"]["descriptionfr"]="Nom de domaine ou de sous-domaine GForge :
 Veuillez indiquer le nom de domaine qui hébergera le serveur GForge. Certains services auront leur propre sous-domaine à l'intérieur de ce domaine (scm, lists, etc.).
";
$elem["gforge/shared/domain_name"]["default"]="";
$elem["gforge/shared/server_admin"]["type"]="string";
$elem["gforge/shared/server_admin"]["description"]="GForge administrator e-mail address:
 Please enter the e-mail address of the GForge administrator of this site. It
 will be used when problems occur.
";
$elem["gforge/shared/server_admin"]["descriptionde"]="E-Mail-Adresse des GForge-Administrators:
 Bitte geben Sie die E-Mail-Adresse des GForge-Administrators Ihrer Site an. Diese wird beim Auftritt von Problemen benötigt.
";
$elem["gforge/shared/server_admin"]["descriptionfr"]="Adresse électronique de l'administrateur GForge :
 Veuillez indiquer l'adresse de l'administrateur de GForge. Elle est utilisée quand un problème se produit.
";
$elem["gforge/shared/server_admin"]["default"]="";
$elem["gforge/shared/system_name"]["type"]="string";
$elem["gforge/shared/system_name"]["description"]="GForge system name:
 Please enter the name of the GForge system. It is used in various places
 throughout the system.
";
$elem["gforge/shared/system_name"]["descriptionde"]="GForge-Systemname:
 Bitte geben Sie den Namen des GForge-Systems ein. Er wird an verschiedenen Stellen im ganzen System verwendet.
";
$elem["gforge/shared/system_name"]["descriptionfr"]="Nom du système GForge :
 Veuillez indiquer le nom du système GForge. Il est utilisé dans plusieurs parties du serveur.
";
$elem["gforge/shared/system_name"]["default"]="GForge";
$elem["gforge/shared/shell_host"]["type"]="string";
$elem["gforge/shared/shell_host"]["description"]="Shell server:
 Please enter the host name of the server that will host the GForge
 shell accounts.
";
$elem["gforge/shared/shell_host"]["descriptionde"]="Shell-Server:
 Bitte geben Sie den Rechnernamen des Servers ein, der Ihre GForge-Shell-Konten beherbergen wird.
";
$elem["gforge/shared/shell_host"]["descriptionfr"]="Serveur interactif (« shell server ») :
 Veuillez indiquer le nom d'hôte du serveur qui hébergera les comptes interactifs GForge.
";
$elem["gforge/shared/shell_host"]["default"]="";
$elem["gforge/shared/users_host"]["type"]="string";
$elem["gforge/shared/users_host"]["description"]="User mail redirector server:
 Please enter the host name of the server that will host the GForge user mail
 redirector.
 .
 It should not be the same as the main GForge host.
";
$elem["gforge/shared/users_host"]["descriptionde"]="Benutzer-E-Mail-Umleitungsserver:
 Bitte geben Sie den Rechnernamen des Servers ein, der Ihren GForge-Benutzer-E-Mail-Umleiter beherbergen wird.
 .
 Dieser sollte nicht mit dem Namen des Haupt-GForge-Rechners übereinstimmen.
";
$elem["gforge/shared/users_host"]["descriptionfr"]="Redirecteur des courriers des utilisateurs :
 Veuillez indiquer le nom du serveur qui hébergera le redirecteur du courriel utilisateurs de GForge.
 .
 Ce nom devrait être différent du nom d'hôte principal de GForge.
";
$elem["gforge/shared/users_host"]["default"]="";
$elem["gforge/shared/lists_host"]["type"]="string";
$elem["gforge/shared/lists_host"]["description"]="Mailing lists server:
 Please enter the host name of the server that will host the GForge
 mailing lists.
 .
 It should not be the same as the main GForge host.
";
$elem["gforge/shared/lists_host"]["descriptionde"]="Mailinglisten-Server:
 Bitte geben Sie den Rechnernamen des Servers ein, der Ihre GForge-Mailinglisten beherbergen wird.
 .
 Dieser sollte nicht mit dem Namen des Haupt-GForge-Rechners übereinstimmen.
";
$elem["gforge/shared/lists_host"]["descriptionfr"]="Serveur de listes de diffusion :
 Veuillez indiquer le nom d'hôte du serveur qui hébergera les listes de diffusion de GForge.
 .
 Ce nom devrait être différent du nom d'hôte principal de GForge.
";
$elem["gforge/shared/lists_host"]["default"]="";
$elem["gforge/shared/download_host"]["type"]="string";
$elem["gforge/shared/download_host"]["description"]="Download server:
 Please enter the host name of the server that will host the GForge packages.
 .
 It should not be the same as the main GForge host.
";
$elem["gforge/shared/download_host"]["descriptionde"]="Download-Server:
 Bitte geben Sie den Rechnernamen des Servers ein, der Ihre GForge-Pakete beherbergen wird.
 .
 Dieser sollte nicht mit dem Namen des Haupt-GForge-Rechners übereinstimmen.
";
$elem["gforge/shared/download_host"]["descriptionfr"]="Serveur de téléchargement :
 Veuillez indiquer le nom du serveur qui hébergera les paquets de GForge.
 .
 Ce nom devrait être différent du nom d'hôte principal de GForge.
";
$elem["gforge/shared/download_host"]["default"]="";
$elem["gforge/shared/ip_address"]["type"]="string";
$elem["gforge/shared/ip_address"]["description"]="IP address:
 Please enter the IP address of the server that will host the GForge
 installation.
 .
 This is needed for the configuration of Apache virtual hosting.
";
$elem["gforge/shared/ip_address"]["descriptionde"]="IP-Adresse:
 Bitte geben Sie die IP-Adresse des Servers ein, der Ihre GForge-Installation beherbergen wird.
 .
 Diese wird für die virtualhosting-Konfiguration des Apache benötigt.
";
$elem["gforge/shared/ip_address"]["descriptionfr"]="Adresse IP :
 Veuillez indiquer l'adresse IP du serveur qui hébergera GForge.
 .
 Cette information est indispensable à la configuration des hôtes virtuels pour Apache.
";
$elem["gforge/shared/ip_address"]["default"]="";
$elem["gforge/shared/sys_lang"]["type"]="select";
$elem["gforge/shared/sys_lang"]["choices"][1]="English";
$elem["gforge/shared/sys_lang"]["choices"][2]="Bulgarian";
$elem["gforge/shared/sys_lang"]["choices"][3]="Catalan";
$elem["gforge/shared/sys_lang"]["choices"][4]="Chinese (Traditional)";
$elem["gforge/shared/sys_lang"]["choices"][5]="Dutch";
$elem["gforge/shared/sys_lang"]["choices"][6]="Esperanto";
$elem["gforge/shared/sys_lang"]["choices"][7]="French";
$elem["gforge/shared/sys_lang"]["choices"][8]="German";
$elem["gforge/shared/sys_lang"]["choices"][9]="Greek";
$elem["gforge/shared/sys_lang"]["choices"][10]="Hebrew";
$elem["gforge/shared/sys_lang"]["choices"][11]="Indonesian";
$elem["gforge/shared/sys_lang"]["choices"][12]="Italian";
$elem["gforge/shared/sys_lang"]["choices"][13]="Japanese";
$elem["gforge/shared/sys_lang"]["choices"][14]="Korean";
$elem["gforge/shared/sys_lang"]["choices"][15]="Latin";
$elem["gforge/shared/sys_lang"]["choices"][16]="Norwegian";
$elem["gforge/shared/sys_lang"]["choices"][17]="Polish";
$elem["gforge/shared/sys_lang"]["choices"][18]="Portuguese (Brazilian)";
$elem["gforge/shared/sys_lang"]["choices"][19]="Portuguese";
$elem["gforge/shared/sys_lang"]["choices"][20]="Russian";
$elem["gforge/shared/sys_lang"]["choices"][21]="Chinese (Simplified)";
$elem["gforge/shared/sys_lang"]["choices"][22]="Spanish";
$elem["gforge/shared/sys_lang"]["choices"][23]="Swedish";
$elem["gforge/shared/sys_lang"]["choicesde"][1]="Englisch";
$elem["gforge/shared/sys_lang"]["choicesde"][2]="Bulgarisch";
$elem["gforge/shared/sys_lang"]["choicesde"][3]="Katalanisch";
$elem["gforge/shared/sys_lang"]["choicesde"][4]="(traditionelles) Chinesisch";
$elem["gforge/shared/sys_lang"]["choicesde"][5]="Holländisch";
$elem["gforge/shared/sys_lang"]["choicesde"][6]="Esperanto";
$elem["gforge/shared/sys_lang"]["choicesde"][7]="Französisch";
$elem["gforge/shared/sys_lang"]["choicesde"][8]="Deutsch";
$elem["gforge/shared/sys_lang"]["choicesde"][9]="Griechisch";
$elem["gforge/shared/sys_lang"]["choicesde"][10]="Hebräisch";
$elem["gforge/shared/sys_lang"]["choicesde"][11]="Indonesisch";
$elem["gforge/shared/sys_lang"]["choicesde"][12]="Italienisch";
$elem["gforge/shared/sys_lang"]["choicesde"][13]="Japanisch";
$elem["gforge/shared/sys_lang"]["choicesde"][14]="Koreanisch";
$elem["gforge/shared/sys_lang"]["choicesde"][15]="Latein";
$elem["gforge/shared/sys_lang"]["choicesde"][16]="Norwegisch";
$elem["gforge/shared/sys_lang"]["choicesde"][17]="Polnisch";
$elem["gforge/shared/sys_lang"]["choicesde"][18]="brasilianisches Portugiesisch";
$elem["gforge/shared/sys_lang"]["choicesde"][19]="Portugiesisch";
$elem["gforge/shared/sys_lang"]["choicesde"][20]="Russisch";
$elem["gforge/shared/sys_lang"]["choicesde"][21]="(vereinfachtes) Chinesisch";
$elem["gforge/shared/sys_lang"]["choicesde"][22]="Spanisch";
$elem["gforge/shared/sys_lang"]["choicesde"][23]="Schwedisch";
$elem["gforge/shared/sys_lang"]["choicesfr"][1]="French";
$elem["gforge/shared/sys_lang"]["choicesfr"][2]="bulgare";
$elem["gforge/shared/sys_lang"]["choicesfr"][3]="catalan";
$elem["gforge/shared/sys_lang"]["choicesfr"][4]="chinois traditionnel";
$elem["gforge/shared/sys_lang"]["choicesfr"][5]="néerlandais";
$elem["gforge/shared/sys_lang"]["choicesfr"][6]="espéranto";
$elem["gforge/shared/sys_lang"]["choicesfr"][7]="français";
$elem["gforge/shared/sys_lang"]["choicesfr"][8]="allemand";
$elem["gforge/shared/sys_lang"]["choicesfr"][9]="grec";
$elem["gforge/shared/sys_lang"]["choicesfr"][10]="hébreu";
$elem["gforge/shared/sys_lang"]["choicesfr"][11]="indonésien";
$elem["gforge/shared/sys_lang"]["choicesfr"][12]="italien";
$elem["gforge/shared/sys_lang"]["choicesfr"][13]="japonais";
$elem["gforge/shared/sys_lang"]["choicesfr"][14]="coréen";
$elem["gforge/shared/sys_lang"]["choicesfr"][15]="latin";
$elem["gforge/shared/sys_lang"]["choicesfr"][16]="norvégien";
$elem["gforge/shared/sys_lang"]["choicesfr"][17]="polonais";
$elem["gforge/shared/sys_lang"]["choicesfr"][18]="portugais du Brésil";
$elem["gforge/shared/sys_lang"]["choicesfr"][19]="portugais";
$elem["gforge/shared/sys_lang"]["choicesfr"][20]="russe";
$elem["gforge/shared/sys_lang"]["choicesfr"][21]="chinois simplifié";
$elem["gforge/shared/sys_lang"]["choicesfr"][22]="espagnol";
$elem["gforge/shared/sys_lang"]["choicesfr"][23]="suédois";
$elem["gforge/shared/sys_lang"]["description"]="Default language:
 Please choose the default language for web pages.
";
$elem["gforge/shared/sys_lang"]["descriptionde"]="Standardsprache:
 Bitte wählen Sie die Standardsprache für Webseiten.
";
$elem["gforge/shared/sys_lang"]["descriptionfr"]="Langue par défaut :
 Veuillez choisir la langue par défaut des pages web.
";
$elem["gforge/shared/sys_lang"]["default"]="English";
$elem["gforge/shared/sys_theme"]["type"]="string";
$elem["gforge/shared/sys_theme"]["description"]="Default theme:
 Please choose the default theme for web pages. This must be a valid
 name.
";
$elem["gforge/shared/sys_theme"]["descriptionde"]="Standard Thema:
 Bitte wählen Sie das Standard-Thema für Webseiten. Dies muss ein gültiger Namen sein.
";
$elem["gforge/shared/sys_theme"]["descriptionfr"]="Thème par défaut :
 Veuillez choisir le thème par défaut des pages web. Veillez à indiquer un nom valable.
";
$elem["gforge/shared/sys_theme"]["default"]="gforge";
$elem["gforge/shared/simple_dns"]["type"]="boolean";
$elem["gforge/shared/simple_dns"]["description"]="Do you want a simple DNS setup for GForge?
 You can use a simple DNS setup with wildcards to map all
 project web-hosts to a single IP address, and direct all the scm-hosts
 to a single SCM server, or a complex setup which allows
 many servers as project web servers or SCM servers.
 .
 Even if you use a simple DNS setup, you can still use
 separate machines as project servers; it just assumes that
 all the project web directories are on the same server with a single
 SCM server.
";
$elem["gforge/shared/simple_dns"]["descriptionde"]="Möchten Sie eine einfache DNS-Installation für GForge?
 Sie können eine einfache DNS-Installation haben, die Jokerzeichen verwendet, um alle Projekt-Webhosts auf eine einzelne IP abzubilden und alle scm-hosts auf einen einzigen SCM-Server weiterzuleiten, oder eine komplexe Installation, die viele Server als Projektwebserver oder SCM-Server erlaubt.
 .
 Selbst falls Sie eine einfache DNS-Installation verwenden, können Sie dennoch separate Maschinen für die Projektserver verwenden, es wird nur angenommen, dass sich alle Webverzeichnisse der Projekte auf dem gleichen Server mit einem einzelnen Server für SCM befinden.
";
$elem["gforge/shared/simple_dns"]["descriptionfr"]="Souhaitez-vous une configuration DNS simplifiée ?
 Il est possible de mettre en service une gestion DNS simplifiée qui utilisera des jokers (« wildcards ») pour affecter tous les serveurs web de vos projets à une seule adresse IP, ainsi que tous les hôtes SCM (« Source Control Management » : gestionnaire de configuration) à un seul serveur SCM. Une configuration plus complexe est également possible pour utiliser plusieurs serveurs comme serveurs web ou SCM.
 .
 Même si vous choisissez la configuration DNS simplifiée, vous pourrez toujours utiliser des serveurs différents comme serveurs de projets. Ce choix n'apporte qu'une restriction : tous les répertoires web sont sur un seul serveur, ainsi que tous les entrepôts SCM.
";
$elem["gforge/shared/simple_dns"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
