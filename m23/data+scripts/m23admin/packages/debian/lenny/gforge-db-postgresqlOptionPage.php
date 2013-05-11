<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gforge-db-postgresql");

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
 Please enter the hostname of the server that will host the GForge
 shell accounts.
";
$elem["gforge/shared/shell_host"]["descriptionde"]="Shell-Server:
 Bitte geben Sie den Rechnernamen des Servers ein, der Ihre GForge-Shell-Konten beherbergen wird.
";
$elem["gforge/shared/shell_host"]["descriptionfr"]="Serveur interactif (« shell server ») :
 Veuillez indiquer le nom du serveur qui hébergera les comptes interactifs GForge.
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
 Please enter the hostname of the server that will host the GForge
 packages. 
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
$elem["gforge/shared/db_password"]["type"]="password";
$elem["gforge/shared/db_password"]["description"]="Password used for the database:
 Connections to the database system are authenticated by a password.
 .
 Please choose the connection password.
";
$elem["gforge/shared/db_password"]["descriptionde"]="Für die Datenbank verwendetes Passwort:
 Verbindungen zum Datenbank-System werden durch ein Passwort authentifiziert.
 .
 Bitte wählen Sie das Passwort für Verbindungen aus.
";
$elem["gforge/shared/db_password"]["descriptionfr"]="Mot de passe de connexion au serveur de bases de données :
 Les connexions au serveur de bases de données sont protégées par un mot de passe.
 .
 Veuillez choisir ce mot de passe de connexion.
";
$elem["gforge/shared/db_password"]["default"]="";
$elem["gforge/shared/db_password_confirm"]["type"]="password";
$elem["gforge/shared/db_password_confirm"]["description"]="Password confirmation:
 Please re-type the password for confirmation.
";
$elem["gforge/shared/db_password_confirm"]["descriptionde"]="Bestätigung des Passworts:
 Bitte geben Sie zur Bestätigung das Passwort erneut ein.
";
$elem["gforge/shared/db_password_confirm"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez entrer à nouveau le mot de passe, pour confirmation.
";
$elem["gforge/shared/db_password_confirm"]["default"]="";
$elem["gforge/shared/admin_login"]["type"]="string";
$elem["gforge/shared/admin_login"]["description"]="GForge administrator login:
 The GForge administrator account will have full privileges on the
 system. It will be used to approve the creation of new projects.
 .
 Please choose the username for this account.
";
$elem["gforge/shared/admin_login"]["descriptionde"]="GForge-Administrator-Anmeldung:
 Das GForge-Administrator-Konto wird alle Privilegien auf dem GForge-System haben. Es wird benötigt, um die Erstellung von neuen Projekten zu bewilligen.
 .
 Bitte wählen Sie den Benutzernamen für dieses Konto.
";
$elem["gforge/shared/admin_login"]["descriptionfr"]="Identifiant de l'administrateur de GForge :
 Le compte d'administration de GForge aura tous les privilèges sur le système GForge. Il servira à approuver la création de projets.
 .
 Veuillez choisir l'identifiant à utiliser pour ce compte.
";
$elem["gforge/shared/admin_login"]["default"]="admin";
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
$elem["gforge/shared/admin_password"]["type"]="password";
$elem["gforge/shared/admin_password"]["description"]="GForge administrator password:
 The GForge administrator account will have full privileges on the
 system. It will be used to approve the creation of new projects.
 .
 Please choose the password for this account.
";
$elem["gforge/shared/admin_password"]["descriptionde"]="GForge-Administrator-Passwort:
 Das GForge-Administrator-Konto wird alle Privilegien auf dem GForge-System haben. Es wird benötigt, um die Erstellung von neuen Projekten zu bewilligen.
 .
 Bitte wählen Sie das Passwort für dieses Konto.
";
$elem["gforge/shared/admin_password"]["descriptionfr"]="Mot de passe de l'administrateur de GForge :
 Le compte d'administration de GForge aura tous les privilèges sur le système GForge. Il servira à approuver la création de projets.
 .
 Veuillez choisir le mot de passe de ce compte.
";
$elem["gforge/shared/admin_password"]["default"]="";
$elem["gforge/shared/admin_password_confirm"]["type"]="password";
$elem["gforge/shared/admin_password_confirm"]["description"]="Password confirmation:
 Please re-type the password for confirmation.
";
$elem["gforge/shared/admin_password_confirm"]["descriptionde"]="Bestätigung des Passworts:
 Bitte geben Sie zur Bestätigung das Passwort erneut ein.
";
$elem["gforge/shared/admin_password_confirm"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez entrer à nouveau le mot de passe, pour confirmation.
";
$elem["gforge/shared/admin_password_confirm"]["default"]="";
$elem["gforge/shared/skill_list"]["type"]="string";
$elem["gforge/shared/skill_list"]["description"]="Initial list of skills:
 GForge allows users to define a list of their skills, to be chosen from
 those present in the database. This list is the initial list of
 skills that will enter the database.
 .
 Please enter a semicolon-separated list of skill names.
";
$elem["gforge/shared/skill_list"]["descriptionde"]="Anfängliche Liste der Fähigkeiten:
 GForge erlaubt es den Benutzern, eine Liste Ihrer Fähigkeiten zu definieren, die aus allen in der Datenbank hinterlegten Fähigkeiten ausgewählt werden können. Diese Liste ist die anfängliche Liste von Fähigkeiten, die in die Datenbank eingegeben wird.
 .
 Bitte geben Sie die Namen der Fähigkeiten, getrennt durch Semikola »;«, ein.
";
$elem["gforge/shared/skill_list"]["descriptionfr"]="Liste initiale de domaines de compétences :
 Les utilisateurs de GForge peuvent afficher leurs niveaux de compétence dans différents domaines. Cette liste est la liste initiale de ces domaines. 
 .
 Veuillez indiquer les noms de ces domaines de compétence, séparés par des points-virgules.
";
$elem["gforge/shared/skill_list"]["default"]="Ada;C;C++;HTML;LISP;Perl;PHP;Python;SQL";
$elem["gforge/shared/db_host"]["type"]="string";
$elem["gforge/shared/db_host"]["description"]="Database server:
 Please enter the IP address (or hostname) of the server that will
 host the GForge database.
";
$elem["gforge/shared/db_host"]["descriptionde"]="Datenbank-Server:
 Bitte geben Sie die IP-Adresse (oder den Rechnernamen) des Servers ein, der die GForge-Datenbank beherbergen wird.
";
$elem["gforge/shared/db_host"]["descriptionfr"]="Serveur de base de données :
 Veuillez indiquer l'adresse IP ou le nom du serveur qui hébergera la base de données de GForge.
";
$elem["gforge/shared/db_host"]["default"]="";
$elem["gforge/shared/db_name"]["type"]="string";
$elem["gforge/shared/db_name"]["description"]="Database name:
 Please enter the name of the database that will host the GForge database.
";
$elem["gforge/shared/db_name"]["descriptionde"]="Datenbankname:
 Bitte geben Sie den Namen der Datenbank an, die die GForge-Datenbank beherbergen wird.
";
$elem["gforge/shared/db_name"]["descriptionfr"]="Nom de la base de données :
 Veuillez indiquer le nom de la base de données pour GForge.
";
$elem["gforge/shared/db_name"]["default"]="gforge";
$elem["gforge/shared/db_user"]["type"]="string";
$elem["gforge/shared/db_user"]["description"]="Database administrator username:
 Please enter the username of the database administrator for the server
 that will host the GForge database.
";
$elem["gforge/shared/db_user"]["descriptionde"]="Name des Administrators der Datenbank:
 Bitte geben Sie den Benutzernamen des Datenbankadministrators für den Server ein, der die GForge-Datenbank beherbergen wird.
";
$elem["gforge/shared/db_user"]["descriptionfr"]="Identifiant de l'administrateur du serveur de bases de données :
 Veuillez indiquer l'identifiant de l'administrateur du serveur de bases de données qui hébergera la base de données de GForge.
";
$elem["gforge/shared/db_user"]["default"]="gforge";
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
$elem["gforge/shared/newsadmin_groupid"]["type"]="string";
$elem["gforge/shared/newsadmin_groupid"]["description"]="News administrative group ID:
 The members of the news admin group can approve news for the GForge main
 page. This group's ID must not be 1. This should be changed only if
 you upgrade from a previous version and want to keep the data.
";
$elem["gforge/shared/newsadmin_groupid"]["descriptionde"]="ID der News-Administrators-Gruppe:
 Mitglieder der News-Administrator-Gruppe können Nachrichten für die GForge-Hauptseite genehmigen. Diese Gruppen-ID darf nicht 1 sein. Dies sollte nur geändert werden, falls Sie ein Upgrade von einer vorhergehenden Version durchführen und Ihre Daten behalten möchten.
";
$elem["gforge/shared/newsadmin_groupid"]["descriptionfr"]="Numéro du groupe (GID) d'administration des nouvelles :
 Les membres du groupe d'administration des nouvelles peuvent approuver des nouvelles pour les publier sur la page d'accueil de GForge. Le numéro de ce groupe ne doit pas être 1. Cette information n'est requise que si vous mettez à jour une installation précédente et que vous voulez garder vos données.
";
$elem["gforge/shared/newsadmin_groupid"]["default"]="2";
$elem["gforge/shared/statsadmin_groupid"]["type"]="string";
$elem["gforge/shared/statsadmin_groupid"]["description"]="Statistics administrative group ID:
";
$elem["gforge/shared/statsadmin_groupid"]["descriptionde"]="ID der Statistik-Administratorgruppe:
";
$elem["gforge/shared/statsadmin_groupid"]["descriptionfr"]="Numéro du groupe d'administration des statistiques :
";
$elem["gforge/shared/statsadmin_groupid"]["default"]="3";
$elem["gforge/shared/peerrating_groupid"]["type"]="string";
$elem["gforge/shared/peerrating_groupid"]["description"]="Peer rating administrative group ID:
";
$elem["gforge/shared/peerrating_groupid"]["descriptionde"]="ID der »peer rating«-Administratorgruppe:
";
$elem["gforge/shared/peerrating_groupid"]["descriptionfr"]="Numéro du groupe d'administration des notations (« rating ») :
";
$elem["gforge/shared/peerrating_groupid"]["default"]="4";
PKG_OptionPageTail2($elem);
?>
