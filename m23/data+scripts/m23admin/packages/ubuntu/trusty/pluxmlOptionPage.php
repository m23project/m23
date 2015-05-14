<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pluxml");

$elem["pluxml/system/webservers"]["type"]="multiselect";
$elem["pluxml/system/webservers"]["choices"][1]="apache2";
$elem["pluxml/system/webservers"]["choicesde"][1]="Apache2";
$elem["pluxml/system/webservers"]["choicesfr"][1]="Apache 2";
$elem["pluxml/system/webservers"]["description"]="Web servers to configure:
 PluXml can run on any web server supporting PHP, but only listed web servers
 can be configured automatically by this package.
 .
 Please select the web servers that should be configured for PluXml.
 .
 Note that you will have to make sure a PHP interpreter is enabled for the
 web server.
";
$elem["pluxml/system/webservers"]["descriptionde"]="Webserver, die konfiguriert werden sollen:
 PluXml kann auf jedem Webserver ausgeführt werden, der PHP unterstützt, aber nur aufgeführte Webserver können automatisch durch dieses Paket konfiguriert werden.
 .
 Bitte wählen Sie die Webserver, die für PluXml konfiguriert werden sollen.
 .
 Beachten Sie, dass Sie sicherstellen müssen, dass der PHP-Interpreter für den Webserver aktiviert ist.
";
$elem["pluxml/system/webservers"]["descriptionfr"]="Serveurs Web à configurer :
 PluXml peut tourner sur n'importe quel serveur web qui gère le PHP, mais seuls les serveurs web cités peuvent être automatiquement configurés par ce paquet.
 .
 Veuillez choisir les serveurs web qui doivent être configurés pour PluXml.
 .
 Veuillez noter que vous devrez vous assurer qu'un interpréteur PHP est configuré pour ce serveur web.
";
$elem["pluxml/system/webservers"]["default"]="apache2";
$elem["pluxml/system/reload-webserver"]["type"]="boolean";
$elem["pluxml/system/reload-webserver"]["description"]="Should the web server(s) be reloaded?
 To activate the configuration for PluXml, the web server(s) have to be
 reloaded.
 .
 Accepting this option will reload the web server(s) when the installation is
 complete, otherwise you will have to do that yourself.
";
$elem["pluxml/system/reload-webserver"]["descriptionde"]="Sollen die Webserver neu geladen werden?
 Um die Konfiguration für PluXml zu aktivieren, müssen die Webserver neu geladen werden.
 .
 Wird diese Option akzeptiert, werden die Webserver nach Abschluss der Installation neu geladen, andernfalls müssen Sie dies selbst tun.
";
$elem["pluxml/system/reload-webserver"]["descriptionfr"]="Faut-il relancer le(s) serveur(s) web ?
 Pour activer cette configuration pour PluXml, il est nécessaire de redémarrer le(s) serveur(s).
 .
 En acceptant cette option le(s) serveur(s) web seront relancés lorsque l'installation sera terminée, sinon vous devrez le faire vous-même.
";
$elem["pluxml/system/reload-webserver"]["default"]="true";
$elem["pluxml/system/purgedata"]["type"]="boolean";
$elem["pluxml/system/purgedata"]["description"]="Purge blog data on package removal?
 PluXml will store all blog data in /var/lib/pluxml.
 .
 Accepting this option will remove all blog data when this package is
 purged, which will leave you with a tidy system but may cause data loss if you
 purge an operational blog.
";
$elem["pluxml/system/purgedata"]["descriptionde"]="Sollen die Blog-Daten beim Entfernen des Pakets vollständig gelöscht werden?
 PluXml wird alle Blog-Daten in /var/lib/pluxml speichern.
 .
 Wird diese Option akzeptiert, werden alle Blog-Daten gelöscht, wenn das Paket vollständig entfernt wird. Dies wird Ihnen ein sauberes System zurücklassen, kann aber zu Datenverlust führen, falls Sie ein einsatzbereites Blog löschen.
";
$elem["pluxml/system/purgedata"]["descriptionfr"]="Faut-il purger les données du blog lors de la suppression du paquet ?
 PluXml enregistre toutes les données de blog dans /var/lib/pluxml.
 .
 Si vous choisissez cette option, toutes les données de blog seront supprimées lors de la suppression du paquet, ce qui vous laissera un système nettoyé mais qui peut entraîner une perte de données si vous purgez un blog en production.
";
$elem["pluxml/system/purgedata"]["default"]="false";
$elem["pluxml/system/writeconf"]["type"]="boolean";
$elem["pluxml/system/writeconf"]["description"]="Allow editing the configuration files from the web interface?
 PluXml includes a web-based configuration interface that allows the user to
 change blog settings, including the list of registered users. To be usable, it
 requires the web server to have write permission to the configuration files.
 .
 Accepting this option will give the web server write permissions to the
 configuration files. These files will still be readable and editable by hand
 regardless of whether or not you accept this option.
";
$elem["pluxml/system/writeconf"]["descriptionde"]="Soll das Bearbeiten der Konfigurationsdateien über die Web-Oberfläche gestattet werden?
 PluXml enthält eine Web-basierte Konfigurationsschnittstelle, die dem Benutzer das Ändern von Blog-Einstellungen ermöglicht, einschließlich der Liste registrierter Benutzer. Damit dies verwendbar wird, ist es erforderlich, dass der Webserver Schreibrechte für die Konfigurationsdateien besitzt.
 .
 Wird diese Option akzeptiert, werden dem Webserver Schreibrechte für die Konfigurationsdateien eingeräumt. Diese Dateien werden immer noch lesbar und manuell änderbar sein, unabhängig davon, ob Sie diese Option akzeptieren.
";
$elem["pluxml/system/writeconf"]["descriptionfr"]="Autoriser la modification des fichiers de configuration depuis l'interface web ?
 PluXml inclut une interface type web qui autorise l'utilisateur à modifier les réglages du blog, y compris la liste des utilisateurs enregistrés. Pour être utilisable, le serveur web doit avoir les droits d'écriture dans les fichiers de configuration.
 .
 Si vous choisissez cette option, le serveur web aura les droits d'écriture dans les fichiers de configuration. Ces fichiers seront toujours lisibles et modifiables manuellement quelque soit votre choix.
";
$elem["pluxml/system/writeconf"]["default"]="false";
$elem["pluxml/blog/lang"]["type"]="select";
$elem["pluxml/blog/lang"]["choices"][1]="German";
$elem["pluxml/blog/lang"]["choices"][2]="English";
$elem["pluxml/blog/lang"]["choices"][3]="Spanish";
$elem["pluxml/blog/lang"]["choices"][4]="French";
$elem["pluxml/blog/lang"]["choices"][5]="Italian";
$elem["pluxml/blog/lang"]["choices"][6]="Dutch";
$elem["pluxml/blog/lang"]["choices"][7]="Polish";
$elem["pluxml/blog/lang"]["choices"][8]="Portuguese";
$elem["pluxml/blog/lang"]["choices"][9]="Romanian";
$elem["pluxml/blog/lang"]["choicesde"][1]="Deutsch";
$elem["pluxml/blog/lang"]["choicesde"][2]="Englisch";
$elem["pluxml/blog/lang"]["choicesde"][3]="Spanisch";
$elem["pluxml/blog/lang"]["choicesde"][4]="Französisch";
$elem["pluxml/blog/lang"]["choicesde"][5]="Italienisch";
$elem["pluxml/blog/lang"]["choicesde"][6]="Niederländisch";
$elem["pluxml/blog/lang"]["choicesde"][7]="Polnisch";
$elem["pluxml/blog/lang"]["choicesde"][8]="Portugiesisch";
$elem["pluxml/blog/lang"]["choicesde"][9]="Rumänisch";
$elem["pluxml/blog/lang"]["choicesfr"][1]="allemand";
$elem["pluxml/blog/lang"]["choicesfr"][2]="anglais";
$elem["pluxml/blog/lang"]["choicesfr"][3]="espagnol";
$elem["pluxml/blog/lang"]["choicesfr"][4]="français";
$elem["pluxml/blog/lang"]["choicesfr"][5]="italien";
$elem["pluxml/blog/lang"]["choicesfr"][6]="néerlandais";
$elem["pluxml/blog/lang"]["choicesfr"][7]="polonais";
$elem["pluxml/blog/lang"]["choicesfr"][8]="portugais";
$elem["pluxml/blog/lang"]["choicesfr"][9]="roumain";
$elem["pluxml/blog/lang"]["description"]="Blog default language:
 Please choose the default language of this blog, which will be used for the
 public pages.
 .
 Registered blog contributors will be able to choose their language for the
 administration pages.
";
$elem["pluxml/blog/lang"]["descriptionde"]="Standardsprache des Blogs:
 Bitte wählen Sie die Standardsprache dieses Blogs. Sie wird für die öffentlich zugänglichen Seiten benutzt.
 .
 Registrierte Blogger werden in der Lage sein, ihre Sprache für die Verwaltungsseiten zu wählen.
";
$elem["pluxml/blog/lang"]["descriptionfr"]="Langue par défaut du blog :
 Veuillez choisir la langue par défaut de ce blog, qui sera utilisée pour les pages publiques.
 .
 Les contributeurs enregistrés dans le blog pourront choisir leur langue pour les pages d'administration.
";
$elem["pluxml/blog/lang"]["default"]="en";
$elem["pluxml/blog/title"]["type"]="string";
$elem["pluxml/blog/title"]["description"]="Blog title:
 Please choose a title for this blog. It will be displayed at the top of each
 page and in the browser window title.
";
$elem["pluxml/blog/title"]["descriptionde"]="Blog-Titel:
 Bitte wählen Sie einen Titel für diesen Blog. Er wird auf jeder Seite oben und im Fenstertitel des Browsers angezeigt.
";
$elem["pluxml/blog/title"]["descriptionfr"]="Titre du blog :
 Veuillez choisir un titre pour ce blog. Il sera affiché en haut de chaque page et dans la barre de titre du navigateur.
";
$elem["pluxml/blog/title"]["default"]="PluXml";
$elem["pluxml/blog/description"]["type"]="string";
$elem["pluxml/blog/description"]["description"]="Blog description or subtitle:
 Please choose a short description for this blog. It will be displayed as a
 subtitle at the top of each page and in the browser window title.
";
$elem["pluxml/blog/description"]["descriptionde"]="Blog-Beschreibung oder Untertitel:
 Bitte wählen Sie eine kurze Beschreibung für diesen Blog. Er wird als Untertitel auf jeder Seite oben und im Fenstertitel des Browsers angezeigt.
";
$elem["pluxml/blog/description"]["descriptionfr"]="Description du blog ou sous-titre :
 Veuillez choisir une courte description pour ce blog. Il sera affiché en tant que sous-titre en haut de chaque page et dans la barre de titre du navigateur.
";
$elem["pluxml/blog/description"]["default"]="Blog or CMS, XML powered!";
$elem["pluxml/blog/name"]["type"]="string";
$elem["pluxml/blog/name"]["description"]="Administrator real name:
 Please enter the real name associated with the blog administrator account.
 .
 This name will be displayed for articles written with the administrator
 account.
";
$elem["pluxml/blog/name"]["descriptionde"]="Richtiger Name des Administrators:
 Bitte geben Sie den richtigen Namen an, der zum Administratorkonto des Blogs gehört.
 .
 Dieser Name wird bei Artikeln angezeigt, die mit dem Administratorkonto geschrieben wurden.
";
$elem["pluxml/blog/name"]["descriptionfr"]="Nom réel de l'administrateur :
 Veuillez entrer le nom réel associé avec le compte administrateur du blog.
 .
 Ce nom sera affiché dans les articles écrits avec le compte de l'administrateur.
";
$elem["pluxml/blog/name"]["default"]="PluXml Administrator";
$elem["pluxml/blog/login"]["type"]="string";
$elem["pluxml/blog/login"]["description"]="Administrator username:
 Please enter a name for the administrator account, which will be used to manage
 PluXml's configuration, users, and content. The username should only
 contain lowercase ASCII letters.
";
$elem["pluxml/blog/login"]["descriptionde"]="Benutzername des Administrators:
 Bitte geben Sie einen Namen für das Administratorkonto an, der zum Verwalten der Konfiguration, der Benutzer und des Inhalts von PluXml benutzt wird.
";
$elem["pluxml/blog/login"]["descriptionfr"]="Identifiant de l'administrateur :
 Veuillez entrer un identifiant pour pour le compte administrateur, qui sera utilisé pour la gestion de la configuration, des utilisateurs et du contenu de PluXml. Cet identifiant ne doit contenir que des lettres minuscules ASCII.
";
$elem["pluxml/blog/login"]["default"]="admin";
$elem["pluxml/blog/password"]["type"]="password";
$elem["pluxml/blog/password"]["description"]="Administrator password:
 Please choose a password for the blog administrator account.
";
$elem["pluxml/blog/password"]["descriptionde"]="Administratorpasswort:
 Bitte wählen Sie ein Passwort für das Administratorkonto des Blogs.
";
$elem["pluxml/blog/password"]["descriptionfr"]="Mot de passe de l'administrateur :
 Veuillez choisir un mot de passe pour le compte d'administration du blog.
";
$elem["pluxml/blog/password"]["default"]="";
$elem["pluxml/blog/confirm"]["type"]="password";
$elem["pluxml/blog/confirm"]["description"]="Confirm password:
 Please enter the same password again to verify that you have
 typed it correctly.
";
$elem["pluxml/blog/confirm"]["descriptionde"]="Passwortbestätigung:
 Bitte geben Sie dasselbe Passwort erneut ein, um zu prüfen, ob Sie es korrekt eintippt haben.
";
$elem["pluxml/blog/confirm"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez entrer le mot de passe à nouveau pour vérifier que vous l'avez tapé correctement.
";
$elem["pluxml/blog/confirm"]["default"]="";
$elem["pluxml/blog/failpass"]["type"]="error";
$elem["pluxml/blog/failpass"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["pluxml/blog/failpass"]["descriptionde"]="Fehler bei der Passworteingabe
 Die beiden Passwörter, die Sie eingegeben haben, waren nicht identisch. Bitte versuchen Sie es erneut.
";
$elem["pluxml/blog/failpass"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe entrés ne correspondent pas. Veuillez essayer à nouveau.
";
$elem["pluxml/blog/failpass"]["default"]="";
PKG_OptionPageTail2($elem);
?>
