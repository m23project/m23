<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("request-tracker3.6");

$elem["request-tracker3.6/rtname"]["type"]="string";
$elem["request-tracker3.6/rtname"]["description"]="Name for this RT instance:
 Every installation of Request Tracker must have a unique name.
 The domain name or an abbreviation of the name of your organization are
 usually good candidates.
 .
 Please note that once you start using a name, you should probably never
 change it. Otherwise, mail for existing tickets won't get put in the right
 place.
 .
 This setting corresponds to the $rtname configuration variable.
";
$elem["request-tracker3.6/rtname"]["descriptionde"]="Name für diese RT-Instanz:
 Jede Installation des Request Trackers muss einen eindeutigen Namen haben.Der Domainname oder eine Abkürzung des Namens Ihrer Organisation sind typischerweise gute Kandidaten.
 .
 Bitte beachten Sie, dass Sie einen Namen nach Beginn der Benutzung wahrscheinlich nie wieder ändern sollten. Andernfalls würden E-Mails für existierende Tickets nicht an die richtige Stelle gelegt.
 .
 Diese Einstellung korrespondiert mit der Konfigurationsvariablen $rtname.
";
$elem["request-tracker3.6/rtname"]["descriptionfr"]="Nom de cette instance de Request Tracker :
 Chaque installation Request Tracker doit utiliser un nom unique. Le nom de domaine de votre organisme ou une abbréviation de son nom sont en général de bons choix.
 .
 Il est déconseillé de changer de nom une fois celui-ci choisi. Dans le cas contraire, les messages pour les tickets existants n'arriveront pas à la bonne destination.
 .
 Ce paramètre correspond à la variable de configuration $rtname.
";
$elem["request-tracker3.6/rtname"]["default"]="";
$elem["request-tracker3.6/organization"]["type"]="string";
$elem["request-tracker3.6/organization"]["description"]="Identifier for this RT instance:
 In addition to its name, every installation of Request Tracker must also have
 a unique identifier. It is used when linking between RT installations.
 .
 Using this machine's fully qualified hostname (including the DNS domain name)
 is recommended.
 .
 This setting corresponds to the $Organization configuration variable.
";
$elem["request-tracker3.6/organization"]["descriptionde"]="Identifizierer für diese RT-Instanz:
 Zusätzlich zu seinem Namen muss jede Installation des Request Trackers auch über einen eindeutigen Identifizierer verfügen. Er wird beim Verknüpfen von RT-Installationen verwendet.
 .
 Es wird empfohlen, den vollqualifizierten Rechnernamen dieser Maschine (mit dem DNS-Domainnamen) zu verwenden.
 .
 Diese Einstellung korrespondiert mit der Konfigurationsvariablen $Organization.
";
$elem["request-tracker3.6/organization"]["descriptionfr"]="Identifiant pour cette instance de Request Tracker :
 En plus de son nom, toute instance de Request Tracker doit aussi avoir un identifiant unique. Il est utilisé pour lier deux installations RT entre elles.
 .
 L'utilisation du nom d'hôte complet (nom de domaine DNS compris) est recommandée.
 .
 Ce paramètre correspond à la variable de configuration $Organization.
";
$elem["request-tracker3.6/organization"]["default"]="";
$elem["request-tracker3.6/correspondaddress"]["type"]="string";
$elem["request-tracker3.6/correspondaddress"]["description"]="Default email address for RT correspondence:
 This address will be listed in From: and Reply-To: headers of
 emails tracked by RT, unless overridden by a queue-specific
 address.
 .
 This setting corresponds to the $CorrespondAddress configuration variable.
";
$elem["request-tracker3.6/correspondaddress"]["descriptionde"]="Standard-E-Mail-Adresse für RT-Korrespondenz:
 Diese Adresse wird in den Kopfzeilen »From:« und »Reply-To:« von nachverfolgten E-Mails aufgeführt. Dies kann durch Warteschlangen-spezifische Adressen überschrieben werden.
 .
 Diese Einstellung korrespondiert mit der Konfigurationsvariablen $CorrespondAddress.
";
$elem["request-tracker3.6/correspondaddress"]["descriptionfr"]="Adresse électronique par défaut pour les courriels envoyés par RT :
 Veuillez choisir l'adresse qui sera utilisée dans les entêtes « From: » et « Reply-To: » des messages électroniques surveillés par RT, sauf si elle est remplacée par une adresse spécifique à un groupe de traitement particulier.
 .
 Ce paramètre correspond à la variable de configuration $CorrespondAddress.
";
$elem["request-tracker3.6/correspondaddress"]["default"]="";
$elem["request-tracker3.6/commentaddress"]["type"]="string";
$elem["request-tracker3.6/commentaddress"]["description"]="Default email address for RT comments:
 This address will be listed in From: and Reply-To: headers of comment
 emails, unless overridden by a queue-specific address. (Comments can be
 used for adding ticket information that is not visible to the client.)
 .
 This setting corresponds to the $CommentAddress configuration variable.
";
$elem["request-tracker3.6/commentaddress"]["descriptionde"]="Standard-E-Mail-Adresse für RT-Kommentare:
 Diese Adresse wird in den Kopfzeilen »From:« und »Reply-To:« von Kommentar-E-Mails aufgeführt. Dies kann durch Warteschlangen-spezifische Adressen überschrieben werden. (Kommentare können dazu verwandt werden, Ticket-Informationen hinzufügen, die für den Client nicht sichtbar sind.)
 .
 Diese Einstellung korrespondiert mit der Konfigurationsvariablen $CommentAddress.
";
$elem["request-tracker3.6/commentaddress"]["descriptionfr"]="Adresse de courier électronique par défaut pour les commentaires RT :
 Veuillez choisir l'adresse qui sera utilisée dans les entêtes « From: » et « Reply-To: » des messages électroniques de commentaires, sauf si elle est remplacée par une adresse spécifique à un groupe de traitement particulier. Les commentaires peuvent être utilisés pour ouvrir un bulletin d'information qui sera invisible pour un client.
 .
 Ce paramètre correspond à la variable de configuration $CommentAddress.
";
$elem["request-tracker3.6/commentaddress"]["default"]="";
$elem["request-tracker3.6/webbaseurl"]["type"]="string";
$elem["request-tracker3.6/webbaseurl"]["description"]="Base URL to the web interface:
 Please specify the scheme, server and (optionally) port for constructing
 URLs to the RT web interface.
 .
 The value should not have a trailing slash (/).
 .
 This setting corresponds to the $WebBaseURL configuration variable.
";
$elem["request-tracker3.6/webbaseurl"]["descriptionde"]="Basis-URL für die Web-Schnittstelle:
 Bitte geben Sie das Schemata, den Server und (optional) den Port zur Zusammenstellung der URL für die RT-Webschnittstelle an.
 .
 Der Wert sollte nicht mit einem Schrägstrich (/) enden.
 .
 Diese Einstellung korrespondiert mit der Konfigurationsvariablen $WebBaseURL.
";
$elem["request-tracker3.6/webbaseurl"]["descriptionfr"]="URL de base de l'interface web :
 Entrez le chemin, le serveur et, éventuellement, le port composant l'adresse de base jusqu'à l'interface web de RT.
 .
 Cette valeur ne doit pas se terminer par un caractère « / ».
 .
 Ce paramètre correspond à la variable de configuration $WebBaseURL.
";
$elem["request-tracker3.6/webbaseurl"]["default"]="";
$elem["request-tracker3.6/webpath"]["type"]="string";
$elem["request-tracker3.6/webpath"]["description"]="Path to the RT web interface:
 If the RT web interface is going to be installed somewhere other than at
 the root of your server, you should specify the path to it here.
 .
 The value requires a leading slash (/) but not a trailing one.
 .
 This setting corresponds to the $WebPath configuration variable.
";
$elem["request-tracker3.6/webpath"]["descriptionde"]="Pfad zu der RT-Webschnittstelle:
 Falls die RT-Webschnittstelle nicht in der Wurzel Ihres Servers installiert wird, sollten Sie den Pfad zu ihr hier angeben.
 .
 Der Wert benötigt am Anfang einen Schrägstrich (/) aber nicht am Ende.
 .
 Diese Einstellung korrespondiert mit der Konfigurationsvariablen $WebPath.
";
$elem["request-tracker3.6/webpath"]["descriptionfr"]="Chemin vers l'interface web de RT :
 Si l'interface web de RT doit être installée ailleurs qu'à la racine du serveur, vous devriez en préciser le chemin ici.
 .
 Vous devez entrer un chemin absolu (Commençant par un « / »), mais il ne doit pas comporter de slash (« / ») à sa fin.
 .
 Ce paramètre correspond à la variable de configuration $WebPath.
";
$elem["request-tracker3.6/webpath"]["default"]="";
$elem["request-tracker3.6/handle-siteconfig-permissions"]["type"]="boolean";
$elem["request-tracker3.6/handle-siteconfig-permissions"]["description"]="Handle RT_SiteConfig.pm permissions?
 The RT web interface needs access to the database password, stored in the
 main RT configuration file. Because of this, the file is made readable by
 the www-data group in normal setups. This may have security implications.
 .
 If you reject this option, the file will be readable only by root, and
 you will have to set up appropriate access controls yourself.
 .
 Note: with the SQLite backend, your answer will also affect the
 permissions of automatically generated local database files.
";
$elem["request-tracker3.6/handle-siteconfig-permissions"]["descriptionde"]="Die RT_SiteConfig.pm-Rechte verwalten?
 Die RT-Webschnittstelle benötigt Zugriff auf das Datenbankpasswort, das in der RT-Konfigurationsdatei gespeichert ist. Daher wird in normalen Installationen diese Datei für die www-data-Gruppe lesbar gesetzt. Dies kann Auswirkungen auf die Sicherheit haben.
 .
 Falls Sie diese Option ablehnen, wird die Datei nur von Root lesbar sein und Sie müssen die geeigneten Zugriffskontrollen selbst einrichten.
 .
 Hinweis: Mit dem SQLite-Backend wird Ihre Antwort auch die Rechte von automatisch-generierten lokalen Datenbankdateien beeinflussen.
";
$elem["request-tracker3.6/handle-siteconfig-permissions"]["descriptionfr"]="Voulez vous gérer les permissions de RT_SiteConfig.pm ?
 L'interface RT a besoin du mot de passe de connection à la base de données utilisée, qui est enregistré dans le fichier de configuration de RT. Ce fichier est, en général, lisible par le groupe « www-data x». Ce choix peut avoir des conséquences sur la sécurité du système.
 .
 Si vous ne souhaitez pas utiliser cette option, le fichier ne sera lisible que par le superutilisateur, et vous devrez alors en régler vous même les droits d'accès.
 .
 Notez qu'avec SQLite, ce choix affectera les permissions sur les fichiers locaux automatiquement créés.
";
$elem["request-tracker3.6/handle-siteconfig-permissions"]["default"]="";
PKG_OptionPageTail2($elem);
?>
