<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mailreader");

$elem["mailreader/deflang"]["type"]="select";
$elem["mailreader/deflang"]["choices"][1]="Armenian";
$elem["mailreader/deflang"]["choices"][2]="Danish";
$elem["mailreader/deflang"]["choices"][3]="Dutch";
$elem["mailreader/deflang"]["choices"][4]="English";
$elem["mailreader/deflang"]["choices"][5]="Finnish";
$elem["mailreader/deflang"]["choices"][6]="French";
$elem["mailreader/deflang"]["choices"][7]="German";
$elem["mailreader/deflang"]["choices"][8]="Italian";
$elem["mailreader/deflang"]["choices"][9]="Japanese";
$elem["mailreader/deflang"]["choices"][10]="Lithuanian";
$elem["mailreader/deflang"]["choices"][11]="Norwegian";
$elem["mailreader/deflang"]["choices"][12]="Polish";
$elem["mailreader/deflang"]["choices"][13]="Russian";
$elem["mailreader/deflang"]["choices"][14]="Russian Koi8-R";
$elem["mailreader/deflang"]["choices"][15]="Slovakian";
$elem["mailreader/deflang"]["choices"][16]="Spanish";
$elem["mailreader/deflang"]["choicesde"][1]="Armenisch";
$elem["mailreader/deflang"]["choicesde"][2]="Dänisch";
$elem["mailreader/deflang"]["choicesde"][3]="Niederländisch";
$elem["mailreader/deflang"]["choicesde"][4]="Englisch";
$elem["mailreader/deflang"]["choicesde"][5]="Finnisch";
$elem["mailreader/deflang"]["choicesde"][6]="Französisch";
$elem["mailreader/deflang"]["choicesde"][7]="Deutsch";
$elem["mailreader/deflang"]["choicesde"][8]="Italienisch";
$elem["mailreader/deflang"]["choicesde"][9]="Japanisch";
$elem["mailreader/deflang"]["choicesde"][10]="Litauisch";
$elem["mailreader/deflang"]["choicesde"][11]="Norwegisch";
$elem["mailreader/deflang"]["choicesde"][12]="Polnisch";
$elem["mailreader/deflang"]["choicesde"][13]="Russisch";
$elem["mailreader/deflang"]["choicesde"][14]="Russisch (Koi8-R)";
$elem["mailreader/deflang"]["choicesde"][15]="Slowakisch";
$elem["mailreader/deflang"]["choicesde"][16]="Spanisch";
$elem["mailreader/deflang"]["choicesfr"][1]="Arménien";
$elem["mailreader/deflang"]["choicesfr"][2]="Danois";
$elem["mailreader/deflang"]["choicesfr"][3]="Néerlandais";
$elem["mailreader/deflang"]["choicesfr"][4]="Anglais";
$elem["mailreader/deflang"]["choicesfr"][5]="Finnois";
$elem["mailreader/deflang"]["choicesfr"][6]="Français";
$elem["mailreader/deflang"]["choicesfr"][7]="Allemand";
$elem["mailreader/deflang"]["choicesfr"][8]="Italien";
$elem["mailreader/deflang"]["choicesfr"][9]="Japonais";
$elem["mailreader/deflang"]["choicesfr"][10]="Lituanien";
$elem["mailreader/deflang"]["choicesfr"][11]="Norvégien";
$elem["mailreader/deflang"]["choicesfr"][12]="Polonais";
$elem["mailreader/deflang"]["choicesfr"][13]="Russe";
$elem["mailreader/deflang"]["choicesfr"][14]="Russe (avec encodage KOI8-R)";
$elem["mailreader/deflang"]["choicesfr"][15]="Slovaque";
$elem["mailreader/deflang"]["choicesfr"][16]="Espagnol";
$elem["mailreader/deflang"]["description"]="Select default language
 Select the language which will be used for the main page of Mailreader and
 the initial preference page for new users. This is the most important choice
 for Mailreader.com. You should select the language which will be used by the
 majority of your users. The appropriate charset will automatically depend
 on the language selection.
";
$elem["mailreader/deflang"]["descriptionde"]="Wählen Sie die Standard-Sprache:
 Wählen Sie die Sprache, die für Mailreaders Hauptseite und die Einstellungen-Seite neuer Benutzer verwendet werden soll. Das ist die wichtigste Einstellung für Mailreader.com. Sie sollten die Sprache auswählen, die von den meisten Benutzern verwendet wird. Der verwendete Zeichensatz richtet sich automatisch nach Ihrer Spracheinstellung.
";
$elem["mailreader/deflang"]["descriptionfr"]="Langue par défaut :
 Choisissez la langue qui sera utilisée dans la page principale de Mailreader et dans la page initiale des options pour un nouvel utilisateur. C'est le choix le plus important pour Mailreader.com. Vous devriez choisir la langue la plus utilisée parmi vos utilisateurs. C'est en fonction de ce choix que le jeu de caractères est déterminé par le système.
";
$elem["mailreader/deflang"]["default"]="English ";
$elem["mailreader/japanwarning"]["type"]="note";
$elem["mailreader/japanwarning"]["description"]="You have to install libjcode-pm-perl in order to mailreader work.
 If you don't install the libjcode-pm-perl module, Mailreader will not
 work with Japanese as default language! The same occurs if you remove 
 libjcode-pm-perl later.
 .
 After removing libjcode-pm-perl, please reconfigure mailreader and select
 another default language.
";
$elem["mailreader/japanwarning"]["descriptionde"]="Sie müssen libjcode-pm-perl installieren, damit mailreader funktioniert.
 Wenn Sie nicht das Modul libjcode-pm-perl installieren, wird Mailreader nicht mit Japanisch als Standard-Sprache funktionieren! Das selbe passiert, sollten Sie libjcode-pm-perl später entfernen.
 .
 Nach dem Entfernen von libjcode-pm-perl, konfigurieren Sie mailreader bitte erneut und wählen eine andere Standard-Sprache.
";
$elem["mailreader/japanwarning"]["descriptionfr"]="Vous devez installer libjcode-pm-perl
 Si vous n'installez pas le module libjcode-pm-perl, ou si, plus tard, vous supprimez ce module, Mailreader ne fonctionnera PAS si vous avez choisi le japonais comme langue par défaut.
 .
 Après la suppression de libjcode-pm-perl, veuillez reconfigurer Mailreader et choisir une autre langue par défaut.
";
$elem["mailreader/japanwarning"]["default"]="";
$elem["mailreader/feedback"]["type"]="string";
$elem["mailreader/feedback"]["description"]="Please enter email address local feedback/error-reports
 You should put here the email address of a person responsible for mailreader 
 - this email address will be shown on the login page - for people having 
 trouble with Mailreader.
";
$elem["mailreader/feedback"]["descriptionde"]="Bitte geben Sie die E-Mail-Adresse für lokale Rück- und Fehlermeldungen ein:
 Hier sollten Sie die E-Mail-Adresse einer für Mailreader verantwortlichen Person eingeben - diese E-Mail-Adresse wird auf der Login-Seite gezeigt - sie ist für Leute gedacht, die mit Mailreader Probleme haben.
";
$elem["mailreader/feedback"]["descriptionfr"]="Adresse pour les rapports d'erreur et d'activité :
 Vous devriez indiquer ici l'adresse du responsable de Mailreader, à qui les utilisateurs pourront s'adresser en cas de problèmes. Cette adresse apparaîtra sur la page d'accueil.
";
$elem["mailreader/feedback"]["default"]="";
$elem["mailreader/smtpserver"]["type"]="string";
$elem["mailreader/smtpserver"]["description"]="Please enter SMTP servers (separated by comma)
 You should enter here the address or the name of a server which will be
 used by Mailreader as SMTP server. If you choose a non-local server please
 check that it will accept relaying mail originating from your host.
 .
 Please note that if you leave this field empty, the localhost Fully
 Qualified Domain Name will be used instead.
";
$elem["mailreader/smtpserver"]["descriptionde"]="Bitte geben Sie die SMTP-Server ein (durch Kommas getrennt):
 Sie sollten hier die Adresse oder den Namen eines Servers eingeben, der von Mailreader als SMTP-Server benutzt wird. Sofern Sie einen externen Server verwenden, sollten Sie sicherstellen, dass dieser SMTP-Server das Weiterleiten (engl. »Relaying«) von Mail, die von Ihrem Mailreader-Rechner kommt, unterstützt.
 .
 Bitte beachten Sie, dass wenn Sie dieses Feld leer lassen, stattdessen der Domain-Name von localhost (engl. »Fully Qualified Domain Name«) verwendet wird.
";
$elem["mailreader/smtpserver"]["descriptionfr"]="Adresses (séparées par des virgules) des serveurs SMTP :
 Indiquez ici l'adresse ou le nom d'un serveur qui servira de serveur SMTP à Mailreader. Si vous indiquez un serveur extérieur, n'oubliez pas qu'il doit accepter de relayer le courrier issu de votre machine.
 .
 Remarquez que si vous laissez ce champ vide, c'est le nom de domaine complètement qualifié de localhost qui sera utilisé.
";
$elem["mailreader/smtpserver"]["default"]="";
$elem["mailreader/pop3"]["type"]="string";
$elem["mailreader/pop3"]["description"]="Please enter default POP3 server
 This is the initial default POP3 server (when you open the login page).
 .
 Please note that if you leave this field empty, the localhost Fully
 Qualified Domain Name will be used instead.
";
$elem["mailreader/pop3"]["descriptionde"]="Bitte geben Sie den standardmäßigen POP3-Server ein
 Das ist der POP3-Server, der anfangs standardmäßig zur Verwendung kommt (wenn man die Login-Seite öffnet).
 .
 Bitte beachten Sie, dass wenn Sie dieses Feld leer lassen, stattdessen der Domain-Name von localhost (engl. »Fully Qualified Domain Name«) verwendet wird.
";
$elem["mailreader/pop3"]["descriptionfr"]="Serveur POP3 par défaut :
 Ce serveur sera utilisé à l'ouverture de la page d'accueil.
 .
 Remarquez que si vous laissez ce champ vide, c'est le nom de domaine complètement qualifié de localhost qui sera utilisé.
";
$elem["mailreader/pop3"]["default"]="";
$elem["mailreader/allowpop3"]["type"]="string";
$elem["mailreader/allowpop3"]["description"]="Enter list of POP3 servers allowed for mailreader (separated by comma).
 Enter the list of POP3 servers which may be reached from Mailreader. 
 Please note that when an invalid POP3 server is chosen in the login page,
 the program just exits without any note.
 .
 In /usr/share/doc/mailreader/login.html you will find an example showing 
 how to replace the default input box to a more comfortable SELECT box. 
 Replace the same file in /usr/lib/mailreader/html.
";
$elem["mailreader/allowpop3"]["descriptionde"]="Bitte geben Sie eine Liste mit POP3-Servern ein, die für mailreader erlaubt sind (durch Kommas getrennt):
 Geben Sie eine Liste von POP3-Servern ein, die von Mailreader aus erreicht werden können. Bitte beachten Sie, dass wenn ein ungültiger POP3-Server auf der Anmelde-Seite ausgewählt wird, sich das Programm ohne jede Mitteilung beendet.
 .
 In /usr/share/doc/mailreader/login.html finden Sie ein Beispiel, das Ihnen zeigt, wie Sie die Standard-Eingabe-Box durch eine komfortablere SELECT-Box austauschen können. Tauschen sie die gleiche Datei in /usr/lib/mailreader/html aus.
";
$elem["mailreader/allowpop3"]["descriptionfr"]="Serveurs POP3 autorisés (séparés par des virgules) :
 Listez les serveurs accessibles par Mailreader. Veuillez noter que lorsqu'un serveur POP3 invalide est indiqué dans la page de connexion, le programme s'arrête sans explications.
 .
 Vous trouverez dans /usr/share/doc/mailreader/login.html un exemple de remplacement de la boite de dialogue par défaut par une boite de sélection plus simple à utiliser. Vous devrez alors remplacer le fichier présent dans /usr/lib/mailreader/html.
";
$elem["mailreader/allowpop3"]["default"]="";
$elem["mailreader/allowclients"]["type"]="string";
$elem["mailreader/allowclients"]["description"]="Enter the list of clients allowed for mailreader (separated by comma)
 This option should limit access to Mailreader.com to this list of IP addresses. 
 It should but this doesn't work. The upstream author has been notified 
 about this and is working on it.
 .
 Empty line means no restrictions
";
$elem["mailreader/allowclients"]["descriptionde"]="Bitte geben Sie eine Liste erlaubter Clients für Mailreader ein (durch Komma getrennt):
 Diese Option soll den Zugang zu Mailreader.com auf diese Liste von IP-Adressen beschränken. Es soll, aber es funktioniert nicht. Der Autor des Programms wurde über dieses Problem informiert und arbeitet daran.
 .
 Eine leere Zeile bedeutet keine Beschränkung
";
$elem["mailreader/allowclients"]["descriptionfr"]="Liste des clients autorisés (séparés par des virgules) :
 Cette option est supposée restreindre l'accès de Mailreader.com aux adresses IP données dans cette liste. Cela devrait... mais cela ne marche pas ! L'auteur est au courant et travaille sur le problème.
 .
 Pour ne pas restreindre l'accès, laissez cette valeur vide.
";
$elem["mailreader/allowclients"]["default"]="";
$elem["mailreader/ads"]["type"]="boolean";
$elem["mailreader/ads"]["description"]="Do you want to display ads while using Mailreader?
 Included in this package is a simple ad about Debian which can help you
 preparing your own ads. The advertisement directory is set to
 /var/lib/mailreader/ads. In this directory, you can find the original 
 Mailreader ads : one HTML-based and the other one perl-based. 
 Please read the ad.cfg file. Graphics for ads needs to be accessible to
 the WWW server : this means that the files have to be inside DocumentRoot,
 the main directory of the WWW servers (Debian default is /var/www).
";
$elem["mailreader/ads"]["descriptionde"]="Soll während des Gebrauchs von Mailreader Werbung angezeigt werden?
 Dieses Paket beinhaltet eine simple Werbe-Anzeige für Debian. Sie kann Ihnen helfen eigene Anzeigen zu erstellen. Das Verzeichnis für Werbung befindet sich in /var/lib/mailreader/ads. In diesem Verzeichnis finden Sie die Original-Mailreader-Anzeigen: das eine HTML-basiert, das andere perl-basiert. Bitte lesen Sie die Datei ad-cfg. Grafiken für die Werbe-Anzeigen müssen für den WWW-Server zugänglich sein, das bedeutet, dass die Dateien innerhalb von DocumentRoot sein müssen, dem Hauptverzeichnis von WWW-Servern (bei Debian ist das standardmäßig /var/www).
";
$elem["mailreader/ads"]["descriptionfr"]="Souhaitez-vous afficher des publicités pendant l'utilisation de Mailreader ?
 Une publicité pour Debian a été préparée dans ce paquet et peut servir de modèle pour vos propres publicités. Le répertoire des publicités est /var/lib/mailreader/ads. Vous pouvez y trouver les publicités originelles de Mailreader. L'une est en HTML, l'autre en Perl. Veuillez lire le fichier ad.cfg. Le serveur WWW doit pouvoir accéder aux images des publicités. En conséquence, les images doivent se trouver dans « DocumentRoot », le répertoire principal du serveur WWW (/var/www par défaut pour Debian).
";
$elem["mailreader/ads"]["default"]="false";
$elem["mailreader/afterout"]["type"]="string";
$elem["mailreader/afterout"]["description"]="Enter the page which should be showed after user logout
 Please enter the HTML page which should be showed after user logout. If you
 leave this blank, Mailreader will show the login page after logout.
";
$elem["mailreader/afterout"]["descriptionde"]="Geben Sie die Seite ein, die nach dem Abmelden angezeigt werden soll:
 Bitte geben Sie den Namen der HTML-Seite ein, die dem Benutzer nach der Abmeldung angezeigt werden soll. Wenn Sie nichts eingeben, wird Mailreader nach dem Abmelden die Login-Seite anzeigen.
";
$elem["mailreader/afterout"]["descriptionfr"]="Page qui sera affichée quand un utilisateur se déconnecte :
 Veuillez indiquer une page HTML, qui sera affichée quand un utilisateur se déconnecte. Si vous n'en n'indiquez pas, Mailreader affichera la page d'accueil.
";
$elem["mailreader/afterout"]["default"]="";
$elem["mailreader/securitynote"]["type"]="note";
$elem["mailreader/securitynote"]["description"]="Please bind mailreader to SSL secured page!
 This is very important!
 .
 Although Mailreader can work with a standard, unencrypted HTTP server you should
 NEVER use unencrypted pages. Consider accessing mailreader through SSL-secured
 pages. This can be https://your.http.server/cgi-bin/mailreader/nph-mr.cgi.
 .
 Please REMEMBER! If you set plain HTTP access, the login names and the 
 passwords of your users will be transmitted in clear text to Mailreader!
";
$elem["mailreader/securitynote"]["descriptionde"]="Bitte bitte benutzen Sie Mailreader über SSL-gesicherte Seiten!
 Das ist sehr wichtig!
 .
 Obwohl Mailreader auch mit einem gewöhnlichen unverschlüsselten HTTP-Server funktioniert, sollten Sie Mailreader NIEMALS über unverschlüsselte Seiten benutzen. Ziehen Sie in Betracht auf mailreader über SSL-gesicherte Seiten zuzugreifen. Das kann dann beispielsweise so aussehen: https://your.http.server/cgi-bin/mailreader/nph-mr.cgi.
 .
 Bitte DENKEN SIE DARAN! Wenn Sie einen einfachen, unverschlüsselten HTTP-Zugang verwenden, werden die Login-Namen und Passwörter der Benutzer als Klartext zu Mailreader übertragen.
";
$elem["mailreader/securitynote"]["descriptionfr"]="Veuillez lier Mailreader à une page sécurisée par SSL !
 C'est très important !
 .
 Bien que Mailreader puisse fonctionner à partir d'un démon HTTP standard et non chiffré, vous ne devriez jamais le faire. Envisagez un accès par une page sécurisée par SSL, par exemple, https://votreserveur.http/cgi-bin/mailreader/nph-mr.cgi
 .
 Rappelez-vous : si vous faites un accès simplement par http, les noms et les mots de passe seront transmis en clair à Mailreader.
";
$elem["mailreader/securitynote"]["default"]="";
$elem["mailreader/confoverride"]["type"]="boolean";
$elem["mailreader/confoverride"]["description"]="Override old config files?
 Old config files exist in the /etc/mailreader directory. Do you want to
 override these with new ones? Old config files will be backed up.
";
$elem["mailreader/confoverride"]["descriptionde"]="Alte Konfigurationsdateien überschreiben?
 Im Verzeichnis /etc/mailreader existieren alte Konfigurationsdateien. Sollen diese mit Neuen überschrieben werden? Von den alten Konfigurationsdateien werden Sicherheitskopien angelegt.
";
$elem["mailreader/confoverride"]["descriptionfr"]="Annuler les anciens fichiers de configuration ?
 D'anciens fichiers de configuration existent dans /etc/mailreader. Voulez-vous les remplacer par des nouveaux ? Les anciens fichiers seront sauvegardés.
";
$elem["mailreader/confoverride"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
