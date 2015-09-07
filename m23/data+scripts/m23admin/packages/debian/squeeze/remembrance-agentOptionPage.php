<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("remembrance-agent");

$elem["remembrance-agent/index-dir"]["type"]="string";
$elem["remembrance-agent/index-dir"]["description"]="Directories to index:
 In order to work, the Remembrance Agent needs to build a database of
 documents of interest. Please introduce the directories (and/or files) to
 be indexed separated by spaces, afterwards the database will be made. If
 you do not select any directories (default) the database will not be made.
 For more info look at /usr/share/doc/remembrance-agent.
";
$elem["remembrance-agent/index-dir"]["descriptionde"]="Zu indexierende Verzeichnisse:
 Um funktionieren zu können, muss der Remembrance Agent eine Datenbank über relevante Dokumente erstellen. Bitte geben Sie die Verzeichnisse, die indexiert werden sollen, durch Leerzeichen getrennt ein; anschließend wird die Datenbank erzeugt. Wenn Sie keine Verzeichnisse angeben (Voreinstellung), wird keine Datenbank erstellt. Nähere Informationen finden Sie unter /usr/share/doc/remembrance-agent.
";
$elem["remembrance-agent/index-dir"]["descriptionfr"]="Répertoires à indexer :
 Afin de fonctionner correctement, l'agent de remémoration (« Remembrance Agent ») a besoin de constituer une base de données des documents intéressants. Veuillez indiquer les répertoires à indexer, séparés par des espaces, après quoi la base de données sera construite. Si vous ne choisissez pas de répertoires (par défaut), la base de données ne sera pas construite. Pour plus d'informations, veuillez consulter /usr/share/doc/remembrance-agent.
";
$elem["remembrance-agent/index-dir"]["default"]="";
$elem["remembrance-agent/exclude-dir"]["type"]="string";
$elem["remembrance-agent/exclude-dir"]["description"]="Directories to exclude from the index:
 You can exclude sensitive directories from being indexed by ra-index if
 you want. Only three directories can be given here. NOTE: If you are
 installing on a multiuser environment where each user may want to have
 their personal index, DO NOT index user directories (that is /home) as
 root since there are no mechanisms to prevent users from invading other's
 privacy. Instead, all users can run 'ra-index' in order to build their own
 databases.
";
$elem["remembrance-agent/exclude-dir"]["descriptionde"]="Vom Indexieren auszuschließende Verzeichnisse:
 Wenn Sie möchten, können Sie Verzeichnisse mit empfindlichen Daten von der Indexierung durch »ra-index« ausschließen. Es können hier maximal drei Verzeichnisse angegeben werden. HINWEIS: Falls Sie Remembrance Agent auf einem Mehrbenutzersystem installieren, auf dem jeder Nutzer seinen eigenen Index benötigen könnte, indexieren Sie NICHT das komplette User-Verzeichnis (also /home), da keine Mechanismen existieren, zu verhindern, dass Benutzer die Privatsphäre anderer verletzen. Stattdessen können alle Benutzer »ra-index« selbst ausführen, um ihre eigenen Datenbanken zu erstellen.
";
$elem["remembrance-agent/exclude-dir"]["descriptionfr"]="Répertoires exclus de l'index :
 Si vous le souhaitez, vous pouvez éviter que des répertoires précis soient indexés par ra-index. Seuls trois répertoires peuvent être indiqués ici. Note : si vous faites une installation dans un environnement multi-utilisateurs où chaque utilisateur peut souhaiter posséder son propre index, l'indexation des répertoires personnels des utilisateurs (dans /home) ne doit pas être faite par le super-utilisateur. Cela aurait pour conséquence de permettre à chacun d'avoir un accès aux données des autres utilisateurs. Au lieu de cela, chaque utilisateur peut exécuter « ra-index » afin de construire sa propre bases de données.
";
$elem["remembrance-agent/exclude-dir"]["default"]="";
PKG_OptionPageTail2($elem);
?>
