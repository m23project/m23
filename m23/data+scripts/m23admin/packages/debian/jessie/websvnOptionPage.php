<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("websvn");

$elem["websvn/configuration"]["type"]="boolean";
$elem["websvn/configuration"]["description"]="Do you want to configure WebSVN now?
 WebSVN needs to be configured before its use, ie you must set the
 locations of the repositories.
 .
 If you want to configure it later, you should run 'dpkg-reconfigure
 websvn'.
";
$elem["websvn/configuration"]["descriptionde"]="Soll WebSVN jetzt konfiguriert werden?
 WebSVN muss vor der Verwendung konfiguriert werden, zum Beispiel müssen die Verzeichnisse der Depots festgelegt werden.
 .
 Wenn Sie es später konfigurieren möchten, können Sie \"dpkg-reconfigure websvn\" ausführen.
";
$elem["websvn/configuration"]["descriptionfr"]="Voulez-vous configurer webSVN maintenant ?
 WebSVN doit être configuré avant d'être utilisé : vous devez indiquer l'emplacement des dépôts.
 .
 Si vous souhaitez le configurer plus tard, exécutez « dpkg-reconfigure websvn ».
";
$elem["websvn/configuration"]["default"]="false";
$elem["websvn/parentpath"]["type"]="string";
$elem["websvn/parentpath"]["description"]="svn parent repositories:
 If you have directories containing svn repositories, enter the location
 of each parent directory you want to appear on websvn page.
 .
 You must specify at least one existing subversion repository or WebSVN
 will not work. You can specify single repositories on the next step of
 the config.
 .
 Separate each entry with a comma (,) but NO SPACE or leave empty.
";
$elem["websvn/parentpath"]["descriptionde"]="svn-Stammdepots:
 Wenn Sie Verzeichnisse mit svn-Depots haben, geben Sie hier den Pfad zu jedem Stammdepot ein, das auf der WebSVN-Seite erscheinen soll.
 .
 Sie müssen mindestens ein vorhandenes Subversion-Depot angeben. Andernfalls wird WebSVN nicht funktionieren. Einzelne Depots können Sie im nächsten Konfigurationsschritt angeben.
 .
 Trennen Sie die Einträge mit einem Komma (,) aber ohne Leerzeichen.
";
$elem["websvn/parentpath"]["descriptionfr"]="Emplacement des dépôts svn :
 Si vous avez des répertoires contenant plusieurs dépôts svn, entrezl'emplacement de chacun de ces répertoires que vous souhaitez voir sur la page de websvn.
 .
 Vous devez indiquer au moins un dépôt svn existant, sinon webSVN ne fonctionnera pas. Vous pouvez spécifier des dépôts svn séparés à la prochaine étape.
 .
 Chaque entrée doit être séparée par une virgule, mais sans espaces.
";
$elem["websvn/parentpath"]["default"]="/var/lib/svn";
$elem["websvn/repositories"]["type"]="string";
$elem["websvn/repositories"]["description"]="svn repositories:
 Enter the location of each svn repository you want to appear on websvn
 page.
 .
 You must specify at least one existing subversion repository or WebSVN
 will not work, except if you have given a parent path previously.
 .
 Separate each entry with a comma (,) but NO SPACE or leave empty.
";
$elem["websvn/repositories"]["descriptionde"]="svn-Depots:
 Geben Sie den Pfad zu jedem svn-Depot ein, das auf der WebSVN-Seite erscheinen soll.
 .
 Sie müssen mindestens ein vorhandenes Subversion-Depot angeben. Andernfalls wird WebSVN nicht funktionieren, es sei denn Sie haben vorher den Pfad zu einem Stammdepot angegeben.
 .
 Trennen Sie die Einträge mit einem Komma (,) aber ohne Leerzeichen.
";
$elem["websvn/repositories"]["descriptionfr"]="Emplacement des dépôts svn :
 Veuillez indiquer l'emplacement de chaque dépôt svn que vous souhaitez voir sur la page de websvn.
 .
 Vous devez indiquer au moins un dépôt svn existant, sinon webSVN ne fonctionnera pas, sauf si vous avez déjà donné un répertoire parent.
 .
 Chaque entrée doit être séparée par une virgule, mais sans espaces.
";
$elem["websvn/repositories"]["default"]="/var/lib/svn";
$elem["websvn/webservers"]["type"]="multiselect";
$elem["websvn/webservers"]["choices"][1]="apache";
$elem["websvn/webservers"]["choices"][2]="apache-ssl";
$elem["websvn/webservers"]["choices"][3]="apache-perl";
$elem["websvn/webservers"]["choicesde"][1]="apache";
$elem["websvn/webservers"]["choicesde"][2]="apache-ssl";
$elem["websvn/webservers"]["choicesde"][3]="apache-perl";
$elem["websvn/webservers"]["choicesfr"][1]="apache";
$elem["websvn/webservers"]["choicesfr"][2]="apache-ssl";
$elem["websvn/webservers"]["choicesfr"][3]="apache-perl";
$elem["websvn/webservers"]["description"]="Apache configuration:
 WebSVN supports any web server that php4 does, but this automatic
 configuration process only supports Apache.
";
$elem["websvn/webservers"]["descriptionde"]="Apache-Konfiguration:
 WebSVN unterstützt alle Webserver die php4 unterstützen, aber diese automatische Konfiguration funktioniert nur mit Apache.
";
$elem["websvn/webservers"]["descriptionfr"]="Configuration d'Apache :
 WebSVN fonctionne avec tous les serveurs web qui gèrent PHP4, mais ce processus de configuration automatique ne fonctionne qu'avec les serveurs Apache.
";
$elem["websvn/webservers"]["default"]="apache, apache-ssl, apache-perl, apache2";
$elem["websvn/permissions"]["type"]="note";
$elem["websvn/permissions"]["description"]="Note on permissions
 Due to a limitation in the DB format, the 'svnlook' command needs read-write
 access to the repository (to create locks etc). You need to give read-write
 permissions to the user running your webserver on all your repositories.
 .
 Another way of avoiding this problem is by creating SVN repositories with
 the --fs-type=fsfs option.  Existing DB repositories can be converted to
 the FSFS format by using the svnadmin dump/load commands.
";
$elem["websvn/permissions"]["descriptionde"]="Hinweis zu den Zugriffsrechten
 Wegen einer Limitierung des Datenbankformats benötigt das 'svnlook'-Kommando Lese-/Schreibzugriff auf das Depot (um Sperren u.ä. zu erstellen). Sie müssen dem Benutzer, unter dem Ihr Webserver läuft, Lese-/Schreibzugriff auf alle Ihre Depots geben.
 .
 Dieses Problem kann umgangen werden, indem SVN-Depots mit der Option --fs-type=fsfs erstellt werden. Vorhandene Datenbank-Depots können mit den svnadmin dump/load-Kommandos in das FSFS-Format konvertiert werden.
";
$elem["websvn/permissions"]["descriptionfr"]="Note sur les droits
 A cause d'une limitation dans le format de base de données, la commande « svnlook » a besoin d'un accès en lecture et en écriture sur les dépôts (création de verrous, etc.). Par conséquent, l'utilisateur exécutant votre serveur web doit avoir les droits en lecture et en écriture sur tous vos dépôts.
 .
 Une autre manière de résoudre ce problème est de créer les dépôts SVN avec l'option --fs-type=fsfs .  Les dépôts SVN au format DB peuvent être convertis au format FSFS en utilisant les commandes svnadmin dump/load.
";
$elem["websvn/permissions"]["default"]="";
PKG_OptionPageTail2($elem);
?>
