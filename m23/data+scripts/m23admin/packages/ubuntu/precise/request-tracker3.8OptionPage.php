<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("request-tracker3.8");

$elem["request-tracker3.8/rtname"]["type"]="string";
$elem["request-tracker3.8/rtname"]["description"]="Name for this Request Tracker (RT) instance:
 Every installation of Request Tracker must have a unique name.
 The domain name or an abbreviation of the organization name are
 usually good candidates.
 .
 Please note that once you start using a name, you should probably never
 change it. Otherwise, mail for existing tickets won't get put in the right
 place.
 .
 This setting corresponds to the $rtname configuration variable.
";
$elem["request-tracker3.8/rtname"]["descriptionde"]="Name für diese Instanz von Request Tracker (RT):
 Jede Installation des Request Trackers muss einen eindeutigen Namen haben. Typischerweise sind der Domain-Name oder eine Abkürzung des Namens der Organisation gute Kandidaten.
 .
 Bitte beachten Sie, dass Sie einen Namen nach Beginn der Benutzung wahrscheinlich nie wieder ändern sollten. Andernfalls würden E-Mails für existierende Tickets nicht an die richtige Stelle gelegt.
 .
 Diese Einstellung korrespondiert mit der Konfigurationsvariablen $rtname.
";
$elem["request-tracker3.8/rtname"]["descriptionfr"]="Nom de cette instance de Request Tracker (« RT ») :
 Chaque installation de Request Tracker doit utiliser un nom unique. Le nom de domaine de l'organisme ou une abréviation de son nom sont en général de bons choix.
 .
 Il est déconseillé de changer de nom une fois celui-ci choisi. Dans le cas contraire, les messages pour les tickets existants n'arriveront pas à la bonne destination.
 .
 Ce paramètre correspond à la variable de configuration $rtname.
";
$elem["request-tracker3.8/rtname"]["default"]="";
$elem["request-tracker3.8/organization"]["type"]="string";
$elem["request-tracker3.8/organization"]["description"]="Identifier for this RT instance:
 In addition to its name, every installation of Request Tracker must also have
 a unique identifier. It is used when linking between RT installations.
 .
 It should be a persistent DNS domain relating to your installation, for
 example example.org, or perhaps rt.example.org. It should not be changed
 during the lifetime of the RT database, so it is recommended not to use the
 default value of the system hostname. Therefore, if you plan to restore
 an existing database to this installation, you should use the same value
 as previous installations using the same database.
 .
 This setting corresponds to the $Organization configuration variable.
";
$elem["request-tracker3.8/organization"]["descriptionde"]="Kennung für diese RT-Instanz:
 Zusätzlich zu ihrem Namen muss jede Installation des Request Trackers auch über eine eindeutige Kennung verfügen. Sie wird beim Verknüpfen von RT-Installationen verwendet.
 .
 Die Kennung sollte eine bleibende DNS-Domain mit Bezug zu Ihrer Installation sein, beispielsweise »example.org« oder vielleicht »rt.example.org«. Sie sollte während der Lebensdauer der RT-Datenbank unverändert bleiben. Daher wird davon abgeraten, den Standardnamen des Rechners zu wählen. Wenn Sie planen, eine vorhandene Datenbank wieder in diese Installation einzuspielen, sollten Sie deshalb den vorherigen Wert wieder verwenden.
 .
 Diese Einstellung korrespondiert mit der Konfigurationsvariablen $Organization.
";
$elem["request-tracker3.8/organization"]["descriptionfr"]="Identifiant pour cette instance de Request Tracker :
 En plus de son nom, toute instance de Request Tracker doit aussi avoir un identifiant unique. Il est utilisé pour lier deux installations RT entre elles.
 .
 Cet identifiant doit correspondre au nom de domaine relatif à l'instance RT, par exemple example.org ou rt.example.org. Il ne devrait pas être modifié au fil du temps dans la base de données RT, c'est pourquoi il n'est pas recommandé d'utiliser la valeur par défaut du nom d'hôte. Si vous prévoyez de restaurer une base de données existante, indiquez le même identifiant que celui utilisé dans les installations précédentes avec la même base de données.
 .
 Ce paramètre correspond à la variable de configuration $Organization.
";
$elem["request-tracker3.8/organization"]["default"]="";
$elem["request-tracker3.8/correspondaddress"]["type"]="string";
$elem["request-tracker3.8/correspondaddress"]["description"]="Default email address for RT correspondence:
 Please choose the address that will be listed in From: and Reply-To: headers of
 emails tracked by RT, unless overridden by a queue-specific
 address.
 .
 This setting corresponds to the $CorrespondAddress configuration variable.
";
$elem["request-tracker3.8/correspondaddress"]["descriptionde"]="Standard-E-Mail-Adresse für RT-Korrespondenz:
 Bitte wählen Sie die Adresse, die in den Kopfzeilen »From:« und »Reply-To:« von durch RT nachverfolgten E-Mails aufgeführt werden wird. Diese kann durch Warteschlangen-spezifische Adressen überschrieben werden.
 .
 Diese Einstellung korrespondiert mit der Konfigurationsvariablen $CorrespondAddress.
";
$elem["request-tracker3.8/correspondaddress"]["descriptionfr"]="Adresse de courrier électronique par défaut pour les envois par RT :
 Veuillez choisir l'adresse qui sera utilisée dans les en-têtes « From » et « Reply-To » des messages électroniques surveillés par RT, sauf si elle est remplacée par une adresse spécifique à un groupe de traitement particulier.
 .
 Ce paramètre correspond à la variable de configuration $CorrespondAddress.
";
$elem["request-tracker3.8/correspondaddress"]["default"]="";
$elem["request-tracker3.8/commentaddress"]["type"]="string";
$elem["request-tracker3.8/commentaddress"]["description"]="Default email address for RT comments:
 Please choose the address that will be listed in From: and Reply-To: headers of comment
 emails, unless overridden by a queue-specific address. Comments can be
 used for adding ticket information that is not visible to the client.
 .
 This setting corresponds to the $CommentAddress configuration variable.
";
$elem["request-tracker3.8/commentaddress"]["descriptionde"]="Standard-E-Mail-Adresse für RT-Kommentare:
 Bitte wählen Sie die Adresse, die in den Kopfzeilen »From:« und »Reply-To:« von Kommentar-E-Mails aufgeführt werden wird. Kommentare können dazu verwendet werden, für den Client nicht sichtbare Ticket-Informationen hinzuzufügen.
 .
 Diese Einstellung korrespondiert mit der Konfigurationsvariablen $CommentAddress.
";
$elem["request-tracker3.8/commentaddress"]["descriptionfr"]="Adresse de courrier électronique par défaut pour les commentaires RT :
 Veuillez choisir l'adresse qui sera utilisée dans les en-têtes « From » et « Reply-To » des messages électroniques de commentaires, sauf si elle est remplacée par une adresse spécifique à un groupe de traitement particulier. Les commentaires peuvent être utilisés pour ouvrir un bulletin d'information qui sera invisible pour un client.
 .
 Ce paramètre correspond à la variable de configuration $CommentAddress.
";
$elem["request-tracker3.8/commentaddress"]["default"]="";
$elem["request-tracker3.8/webbaseurl"]["type"]="string";
$elem["request-tracker3.8/webbaseurl"]["description"]="Base URL for the RT web interface:
 Please specify the scheme, server and (optionally) port for constructing
 RT web interface URLs.
 .
 The value should not have a trailing slash (/).
 .
 This setting corresponds to the $WebBaseURL configuration variable.
";
$elem["request-tracker3.8/webbaseurl"]["descriptionde"]="Basis-URL für die RT-Web-Schnittstelle:
 Bitte geben Sie das Schema, den Server und (optional) den Port zur Zusammenstellung der RT-Web-Schnittstellen-URLs an.
 .
 Der Wert sollte nicht mit einem Schrägstrich (/) enden.
 .
 Diese Einstellung korrespondiert mit der Konfigurationsvariablen $WebBaseURL.
";
$elem["request-tracker3.8/webbaseurl"]["descriptionfr"]="URL de base de l'interface web de RT :
 Indiquez le chemin, le serveur et, éventuellement, le port composant l'adresse de base jusqu'à l'interface web de RT.
 .
 Cette valeur ne doit pas se terminer par une contre-oblique « / ».
 .
 Ce paramètre correspond à la variable de configuration $WebBaseURL.
";
$elem["request-tracker3.8/webbaseurl"]["default"]="";
$elem["request-tracker3.8/webpath"]["type"]="string";
$elem["request-tracker3.8/webpath"]["description"]="Path to the RT web interface:
 If the RT web interface is going to be installed somewhere other than at
 the documents root of the web server, you should specify the path to it here.
 .
 The value requires a leading slash (/) but not a trailing one.
 .
 This setting corresponds to the $WebPath configuration variable.
";
$elem["request-tracker3.8/webpath"]["descriptionde"]="Pfad zu der RT-Web-Schnittstelle:
 Falls die RT-Web-Schnittstelle nicht in der Dokumenten-Wurzel des Servers installiert wird, sollten Sie den Pfad zu ihr hier angeben.
 .
 Der Wert benötigt einen Schrägstrich (/) am Anfang, aber nicht am Ende.
 .
 Diese Einstellung korrespondiert mit der Konfigurationsvariablen $WebPath.
";
$elem["request-tracker3.8/webpath"]["descriptionfr"]="Chemin vers l'interface web de RT :
 Si l'interface web de RT doit être installée ailleurs qu'à la racine des documents du serveur web, vous devriez en préciser le chemin ici.
 .
 Vous devez indiquer un chemin absolu (commençant par une contre-oblique « / »), mais sans contre-oblique (« / ») finale.
 .
 Ce paramètre correspond à la variable de configuration $WebPath.
";
$elem["request-tracker3.8/webpath"]["default"]="";
$elem["request-tracker3.8/handle-siteconfig-permissions"]["type"]="boolean";
$elem["request-tracker3.8/handle-siteconfig-permissions"]["description"]="Handle RT_SiteConfig.pm permissions?
 The RT web interface needs access to the database password, stored in the
 main RT configuration file. Because of this, the file is made readable by
 the www-data group in normal setups. This may have security implications.
 .
 If you reject this option, the file will be readable only by root, and
 you will have to set up appropriate access controls yourself.
 .
 With the SQLite backend, this choice will also affect the
 permissions of automatically-generated local database files.
";
$elem["request-tracker3.8/handle-siteconfig-permissions"]["descriptionde"]="Die RT_SiteConfig.pm-Rechte verwalten?
 Die RT-Web-Schnittstelle benötigt Zugriff auf das Datenbankpasswort, das in der RT-Konfigurationsdatei gespeichert ist. Daher wird in normalen Installationen diese Datei für die Gruppe www-data lesbar gesetzt. Dies kann Auswirkungen auf die Sicherheit haben.
 .
 Falls Sie diese Option ablehnen, wird die Datei nur von Root lesbar sein und Sie müssen geeignete Zugriffskontrollen selbst einrichten.
 .
 Mit dem SQLite-Backend wird die Auswahl auch die Rechte von automatisch generierten lokalen Datenbankdateien beeinflussen.
";
$elem["request-tracker3.8/handle-siteconfig-permissions"]["descriptionfr"]="Voulez-vous gérer les permissions de RT_SiteConfig.pm ?
 L'interface RT a besoin du mot de passe de connexion à la base de données utilisée, qui est enregistré dans le fichier de configuration de RT. Ce fichier est, en général, lisible par le groupe « www-data ». Ce choix peut avoir des conséquences sur la sécurité du système.
 .
 Si vous ne souhaitez pas utiliser cette option, le fichier ne sera lisible que par le superutilisateur et vous devrez alors en régler vous-même les droits d'accès.
 .
 Avec SQLite, ce choix affectera les permissions sur les fichiers locaux automatiquement créés.
";
$elem["request-tracker3.8/handle-siteconfig-permissions"]["default"]="";
$elem["request-tracker3.8/warn-sqlite-file"]["type"]="error";
$elem["request-tracker3.8/warn-sqlite-file"]["description"]="Broken SQLite file
 Due to a bug in earlier versions of this package, the RT database has been
 placed in /var/lib/dbconfig-common/sqlite3/request-tracker3.8/_DBC_DBNAME_
 rather than its intended location.
 .
 After this installation completes, you
 will need to manually move the file to its correct location
 (see /etc/request-tracker3.8/RT_SiteConfig.d/51-dbconfig-common). RT will
 not work until this action is taken.
";
$elem["request-tracker3.8/warn-sqlite-file"]["descriptionde"]="Beschädigte SQLite-Datei
 Aufgrund eines Fehlers in früheren Versionen dieses Paketes wurde die RT-Datenbank unter /var/lib/dbconfig-common/sqlite3/request-tracker3.8/_DBC_DBNAME_ statt an dem geplanten Ort abgelegt.
 .
 Nachdem diese Installation abgeschlossen ist, müssen Sie diese Datei manuell an den richtigen Ort verschieben (lesen Sie /etc/request-tracker3.8/RT_SiteConfig.d/51-dbconfig-common). RT funktioniert nicht, bis dies erfolgt ist.
";
$elem["request-tracker3.8/warn-sqlite-file"]["descriptionfr"]="Fichier SQLite corrompu
 En raison d'un bogue dans les précédentes versions de ce paquet, la base de données RT était placée dans /var/lib/dbconfig-common/sqlite3/request-tracker3.8/_DBC_DBNAME_ au lieu de l'endroit voulu.
 .
 Une fois cette installation terminée, vous devez déplacer vous-même le fichier vers son emplacement prévu (voir /etc/request-tracker3.8/RT_SiteConfig.d/51-dbconfig-common). RT ne fonctionnera pas tant que cette opération n'a pas été effectuée.
";
$elem["request-tracker3.8/warn-sqlite-file"]["default"]="";
$elem["request-tracker3.8/install-cronjobs"]["type"]="boolean";
$elem["request-tracker3.8/install-cronjobs"]["description"]="Install cron jobs?
 Some features of RT depend on cron jobs, and they can be set up for you
 by this package. You should normally accept this option unless you are
 working on a snapshot of data (and would like to avoid events which send
 out email to users) or this system will be part of a cluster (in which
 case only one system should have cron jobs enabled).
";
$elem["request-tracker3.8/install-cronjobs"]["descriptionde"]="Cron-Jobs installieren?
 Einige RT-Funktionen hängen von Cron-Jobs ab, die für Sie eingerichtet werden können. Im Allgemeinen sollten Sie diese Option wählen, es sei denn, Sie arbeiten auf einer Momentaufnahme der Daten (und würden gerne Ereignisse vermeiden, die E-Mails an Benutzer versenden) oder dieses System wird Teil eines Clusters sein (in diesem Fall sollten nur in einem System Cron-Jobs aktiviert sein).
";
$elem["request-tracker3.8/install-cronjobs"]["descriptionfr"]="Voulez-vous installer les tâches programmées ?
 Certaines fonctionnalités de RT dépendent de tâches programmées par cron, qui peuvent être automatiquement configurées par ce paquet. En général, vous devriez autoriser cette configuration, sauf dans les cas suivants : si vous travaillez sur un cliché instantané des données et souhaitez éviter tout évènement qui pourrait envoyer des courriers électroniques aux utilisateurs, ou si ce système fait partie d'une ferme de serveurs, avec des tâches programmées configurées sur un seul de ces serveurs.
";
$elem["request-tracker3.8/install-cronjobs"]["default"]="";
$elem["request-tracker3.8/initial-root-password"]["type"]="password";
$elem["request-tracker3.8/initial-root-password"]["description"]="Initial root password for RT system:
 The RT system will be populated with an initial superuser, named 'root',
 and the password you provide here will be used as the initial password
 of this superuser. It should be five characters or more.
";
$elem["request-tracker3.8/initial-root-password"]["descriptionde"]="Passwort für das anfängliche Administrator-Konto des RT-Systems:
 Für das RT-System wird ein anfängliches Administrator-Konto (root) angelegt. Das von Ihnen hier angegebene Passwort wird als das Passwort von root verwendet. Es sollte mindestens fünf Zeichen lang sein.
";
$elem["request-tracker3.8/initial-root-password"]["descriptionfr"]="Mot de passe initial de l'identifiant « root » pour le système RT :
 Le système RT sera rempli avec un superutilisateur initial, appelé « root », et le mot de passe fourni ici sera utilisé comme mot de passe initial pour ce superutilisateur. Il devrait être composé d'au moins cinq caractères.
";
$elem["request-tracker3.8/initial-root-password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
