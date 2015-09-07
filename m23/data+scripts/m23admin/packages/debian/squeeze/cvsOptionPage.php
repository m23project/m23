<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cvs");

$elem["cvs/repositories"]["type"]="string";
$elem["cvs/repositories"]["description"]="Repository directories:
 Please list the directories that are the roots of your repositories,
 separated by colons.
 .
 These repositories can be exported by the pserver, have their history
 files rotated automatically every week, and general repository security
 checks will be performed on them.
 .
 If you wish to create a new repository, enter the path where you wish to
 create it. You will then be given the option of creating it later.
";
$elem["cvs/repositories"]["descriptionde"]="Depot-Verzeichnisse:
 Bitte geben Sie die Verzeichnisse an, in denen sich Ihre Depots befinden. Trennen Sie dabei die einzelnen Verzeichnisnamen durch Doppelpunkte.
 .
 Diese Depots können durch den pserver exportiert werden, ihre History-Dateien werden automatisch wöchentlich rotiert und allgemeine Sicherheitsüberprüfungen an ihnen vorgenommen.
 .
 Wenn Sie ein neues Depot erzeugen möchten, geben Sie bitte dessen Pfad an. Später wird Ihnen dann Gelegenheit gegeben, es anzulegen.
";
$elem["cvs/repositories"]["descriptionfr"]="Répertoires des entrepôts :
 Veuillez indiquer la liste des répertoires qui sont à la racine de vos entrepôts, en les séparant par des « : » (caractère deux-points, sans les espaces ni les guillemets).
 .
 Ces entrepôts peuvent être visibles de l'extérieur avec le pserver. Leurs fichiers d'historique sont automatiquement régénérés chaque semaine. Ils sont soumis à des vérifications sur leur sécurité d'ensemble.
 .
 Si vous souhaitez créer un nouvel entrepôt, indiquez l'emplacement où vous voulez le créer. Vous aurez alors la possibilité de le créer automatiquement lors des prochaines questions.
";
$elem["cvs/repositories"]["default"]="/srv/cvs";
$elem["cvs/badrepositories"]["type"]="select";
$elem["cvs/badrepositories"]["choices"][1]="create";
$elem["cvs/badrepositories"]["choices"][2]="ignore";
$elem["cvs/badrepositories"]["choicesde"][1]="anlegen";
$elem["cvs/badrepositories"]["choicesde"][2]="ignorieren";
$elem["cvs/badrepositories"]["choicesfr"][1]="créer";
$elem["cvs/badrepositories"]["choicesfr"][2]="ignorer";
$elem["cvs/badrepositories"]["description"]="Method to fix invalid repositories:
 The following items you entered are not directories or do not contain a
 CVSROOT subdirectory:
 .
 ${badreps}
 .
 If you have not yet created these repositories, they can be created by
 selecting 'create'. You could also select 'ignore' and use the
 'cvs-makerepos' command to create them, or create them individually using
 'cvs init'.
 .
 You can also choose to 'reenter' your repositories list.
";
$elem["cvs/badrepositories"]["descriptionde"]="Methode zum Korrigieren ungültiger Depots:
 Die folgenden Einträge, die Sie gemacht haben, sind keine Verzeichnisse oder enthalten kein CVSROOT-Unterverzeichnis:
 .
 ${badreps}
 .
 Wenn Sie diese Depots noch nicht angelegt haben, können Sie das jetzt nachholen, indem Sie »anlegen« auswählen. Sie können auch »ignorieren« wählen und den Befehl »cvs-makerepos« benutzen, um sie anzulegen, oder können sie einzeln mit »cvs init« anlegen.
 .
 Sie können Ihre Depotliste auch »neu eingeben«.
";
$elem["cvs/badrepositories"]["descriptionfr"]="Méthode de correction des chemins d'entrepôts invalides :
 Les chemins suivants ne sont pas des répertoires ou ne contiennent pas de sous-répertoire CVSROOT.
 .
 ${badreps}
 .
 Si vous n'avez pas encore créé ces entrepôts, vous pouvez le faire maintenant en choisissant l'option « créer ». Vous pouvez aussi choisir d'« ignorer » ces erreurs et d'utiliser la commande « cvs-makerepos » ultérieurement pour les créer, ou les créer un à un avec « cvs init ».
 .
 Vous pouvez également choisir de « modifier » la liste de dépôts.
";
$elem["cvs/badrepositories"]["default"]="create";
$elem["cvs/rotatehistory"]["type"]="select";
$elem["cvs/rotatehistory"]["choices"][1]="yes";
$elem["cvs/rotatehistory"]["choices"][2]="no";
$elem["cvs/rotatehistory"]["choicesde"][1]="ja";
$elem["cvs/rotatehistory"]["choicesde"][2]="nein";
$elem["cvs/rotatehistory"]["choicesfr"][1]="oui";
$elem["cvs/rotatehistory"]["choicesfr"][2]="non";
$elem["cvs/rotatehistory"]["description"]="Weekly rotation for history files in repositories:
 Weekly rotation of history files is primarily useful for servers with a
 lot of activity. The script /etc/cron.weekly/cvs will rotate the history
 files. Select \"individual\" if you want to control rotation on a
 per-repository basis.
";
$elem["cvs/rotatehistory"]["descriptionde"]="Wöchentliche Rotation der History-Dateien in Depots:
 Das wöchentliche Rotieren von History-Dateien ist hauptsächlich für Server mit großer Aktivität nützlich. Das Skript /etc/cron.weekly/cvs wird die History-Dateien rotieren. Wählen Sie »individuell«, um das Rotieren Depot-bezogen zu steuern.
";
$elem["cvs/rotatehistory"]["descriptionfr"]="Rotation hebdomadaire des fichiers d'historique dans les entrepôts :
 La régénération hebdomadaire des fichiers d'historique est surtout utile pour des serveurs ayant beaucoup d'activité. Le script /etc/cron.weekly/cvs effectue cette opération. Choisissez « individuellement » si vous voulez contrôler la régénération entrepôt par entrepôt.
";
$elem["cvs/rotatehistory"]["default"]="no";
$elem["cvs/rotate_individual"]["type"]="boolean";
$elem["cvs/rotate_individual"]["description"]="Rotate the history files of the repository in ${repos} each week?
";
$elem["cvs/rotate_individual"]["descriptionde"]="Die History-Dateien des Depots in ${repos} jede Woche rotieren?
";
$elem["cvs/rotate_individual"]["descriptionfr"]="Faut-il régénérer chaque semaine les fichiers d'historique de l'entrepôt dans ${repos} ?
";
$elem["cvs/rotate_individual"]["default"]="true";
$elem["cvs/rotatekeep_nondefault"]["type"]="select";
$elem["cvs/rotatekeep_nondefault"]["choices"][1]="yes";
$elem["cvs/rotatekeep_nondefault"]["choices"][2]="no";
$elem["cvs/rotatekeep_nondefault"]["choicesde"][1]="ja";
$elem["cvs/rotatekeep_nondefault"]["choicesde"][2]="nein";
$elem["cvs/rotatekeep_nondefault"]["choicesfr"][1]="oui";
$elem["cvs/rotatekeep_nondefault"]["choicesfr"][2]="non";
$elem["cvs/rotatekeep_nondefault"]["description"]="Change the number of kept history files:
 When rotating history files in repositories, by default the previous 7 are
 kept. Choosing \"yes\" will allow you to change this number globally.
 Choosing \"individual\" will allow you to specify the number of days to
 keep history files for individual repositories.
";
$elem["cvs/rotatekeep_nondefault"]["descriptionde"]="Die Anzahl zu behaltender History-Dateien ändern:
 Wenn History-Dateien in Depots rotiert werden, werden standardmäßig die sieben letzten aufbewahrt. Wenn Sie dies global ändern möchten, wählen Sie »ja«, um dies bei einzelnen Depots einzustellen, wählen Sie »individuell«.
";
$elem["cvs/rotatekeep_nondefault"]["descriptionfr"]="Modification du nombre de fichiers d'historique conservés :
 Lorsque les fichiers d'historique des entrepôts sont régénérés, les sept derniers sont conservés par défaut. Si vous voulez changer ce nombre pour tous les entrepôts, choisissez l'option « oui ». Pour le changer entrepôt par entrepôt, choisissez « individuellement ».
";
$elem["cvs/rotatekeep_nondefault"]["default"]="no";
$elem["cvs/rotatekeep"]["type"]="string";
$elem["cvs/rotatekeep"]["description"]="Number of previous history files to keep (global setting):
 Please choose how many previous history files should be kept when the
 history files in your repositories are rotated each week.
";
$elem["cvs/rotatekeep"]["descriptionde"]="Anzahl aufzubewahrender alter History-Dateien (globale Einstellung):
 Bitte wählen Sie, wie viele vorherige History-Dateien aufbewahrt werden sollen, wenn sie wöchentlich in Ihren Depots rotiert werden.
";
$elem["cvs/rotatekeep"]["descriptionfr"]="Nombre (global) de fichiers d'historique à conserver :
 Veuillez indiquer le nombre de fichiers d'historique à conserver lors de la régénération hebdomadaire.
";
$elem["cvs/rotatekeep"]["default"]="7";
$elem["cvs/rotatekeep_individual"]["type"]="string";
$elem["cvs/rotatekeep_individual"]["description"]="Number of previous history files to keep in ${repos}:
 Please choose how many previous history files should be kept in
 ${repos} when the history files in your repositories are rotated
 each week.
";
$elem["cvs/rotatekeep_individual"]["descriptionde"]="Anzahl aufzubewahrender alter History-Dateien in ${repos}:
 Bitte wählen Sie, wie viele alte History-Dateien in ${repos} aufbewahrt werden sollen, wenn sie wöchentlich rotiert werden.
";
$elem["cvs/rotatekeep_individual"]["descriptionfr"]="Nombre de fichiers d'historique à conserver dans ${repos} :
 Veuillez indiquer le nombre de fichiers d'historique à conserver pour ${repos} lors de la régénération hebdomadaire.
";
$elem["cvs/rotatekeep_individual"]["default"]="7";
$elem["cvs/pserver"]["type"]="boolean";
$elem["cvs/pserver"]["description"]="Should the CVS pserver be enabled?
 The CVS pserver is a client-to-server mechanism which can be used by CVS as a
 replacement for the standard \"server\" method, which uses \"rsh\", or an rsh
 compatible program, such as ssh. It is more efficient than the standard
 server protocol, also supporting its own password files, making it more
 secure. However, it may be a security risk, and used to contain a security
 problem whereby a remote connection may have been able to read the passwd
 or other security-related files on the system. Read README.Debian for more
 details, and extra ways to secure the pserver.
 .
 It is not recommended to choose this option. CVS now only allows
 access to particular repositories specified on the command line. When
 chosen, it will be installed in inetd, using tcpd wrappers.
";
$elem["cvs/pserver"]["descriptionde"]="Soll der CVS-pserver aktiviert werden?
 CVS-pserver ist ein Client-zu-Server-Mechanismus, der von CVS als Ersatz der Standard-»server«-Methode verwendet werden kann, was »rsh« oder ein »rsh«-kompatibles Programm, wie ssh, verwendet. Er ist effizienter als das Standard-Server-Protokoll und dank der eigenen Passwort-Datei auch sicherer. Jedoch kann er ein Sicherheitsrisiko sein und enthielt bereits einmal ein Sicherheitsproblem, wodurch eine entfernte Verbindung in der Lage war, die passwd- oder andere sicherheitsbezogene Dateien des Systems auszulesen. Lesen Sie README.Debian für weitere Details und andere Wege, pserver abzusichern.
 .
 Es wird nicht empfohlen, diese Methode auszuwählen. CVS erlaubt nur noch Zugriff auf bestimmte Depots, die in der Kommandozeile angegeben werden. Wenn ausgewählt, wird es in inetd installiert, unter Verwendung von tcpd-Wrappern.
";
$elem["cvs/pserver"]["descriptionfr"]="Faut-il activer le pserver CVS ?
 Le pserver CVS est un mécanisme client-serveur qui peut être utilisé par CVS en remplacement de la méthode habituelle « serveur », qui utilise « rsh » ou un programme compatible avec rsh, comme ssh. Il est plus efficace que le protocole standard « serveur », et possède son propre fichier de mots de passe, ce qui le rend plus sûr. Néanmoins, utiliser pserver pourrait s'avérer dangereux. En effet, ce protocole a comporté des failles de sécurité qui permettaient, au travers d'une connexion distante, la lecture des fichiers de mots de passe ainsi que d'autres fichiers sur lesquels reposent la sécurité du système. Veuillez consulter le fichier README.Debian pour plus de détails et des informations sur des méthodes supplémentaires de sécurisation du serveur « pserver ».
 .
 Il n'est pas recommandé d'activer ce service. CVS n'autorise désormais l'accès que pour certains entrepôts spécifiés sur la ligne de commande. Si cette option est choisie, le serveur « pserver » sera installé pour fonctionner avec inetd et les « tcp wrappers ».
";
$elem["cvs/pserver"]["default"]="false";
$elem["cvs/pserver_repos"]["type"]="select";
$elem["cvs/pserver_repos"]["choices"][1]="all";
$elem["cvs/pserver_repos"]["choicesde"][1]="alle";
$elem["cvs/pserver_repos"]["choicesfr"][1]="tous";
$elem["cvs/pserver_repos"]["description"]="Repositories to export via the pserver:
";
$elem["cvs/pserver_repos"]["descriptionde"]="Depots, die mittels pserver exportiert werden:
";
$elem["cvs/pserver_repos"]["descriptionfr"]="Entrepôts accessibles via le pserver :
";
$elem["cvs/pserver_repos"]["default"]="all";
$elem["cvs/pserver_repos_individual"]["type"]="boolean";
$elem["cvs/pserver_repos_individual"]["description"]="Do you want the repository ${repos} exported via pserver?
";
$elem["cvs/pserver_repos_individual"]["descriptionde"]="Möchten Sie das Depot ${repos} über den pserver exportieren?
";
$elem["cvs/pserver_repos_individual"]["descriptionfr"]="Faut-il rendre l'entrepôt dans ${repos} accessible via le pserver ?
";
$elem["cvs/pserver_repos_individual"]["default"]="true";
$elem["cvs/pserver_setspawnlimit"]["type"]="boolean";
$elem["cvs/pserver_setspawnlimit"]["description"]="Change the maximum pserver processes spawned in one minute?
 When running a pserver, inetd's default limit of allowing 40 connections
 in 1 minute can easily be exceeded if a script calls CVS individually on
 many files over a pserver connection. This limit is designed to stop
 system load from rising too high if the service is continually failing.
 .
 Thus, a more sensible default limit for most systems is 400. However, if
 you are running an inetd clone which does not support the syntax
 \"nowait.[limit]\", you will need to not set a limit using this method.
";
$elem["cvs/pserver_setspawnlimit"]["descriptionde"]="Wollen Sie die maximale Anzahl an pserver-Prozessen pro Minute ändern?
 Falls Sie einen pserver betreiben, beschränkt inetd die Anzahl der Verbindungen auf 40 pro Minute. Diese Beschränkung kann leicht durch ein Skript überschritten werden, das CVS einzeln für mehrere Dateien per pserver aufruft. Die Beschränkung existiert, um die Systemauslastung zu begrenzen, falls ein bestimmter Service ständig fehlschlägt.
 .
 Deshalb ist 400 ein sinnvolleres Standardlimit für die meisten Systeme. Wenn Sie jedoch einen inetd-Klon einsetzen, der die Syntax »nowait.[limit]« nicht unterstützt, dürfen Sie das Limit nicht auf diese Art setzen.
";
$elem["cvs/pserver_setspawnlimit"]["descriptionfr"]="Faut-il changer le nombre maximal de processus pserver créés par minute ?
 La limite d'inetd par défaut est de 40 connexions par minute. Quand un pserver CVS est utilisé, cette limite peut facilement être dépassée si un script appelle individuellement le pserver CVS pour un grand nombre de fichiers. Cette limite empêche la charge du système de trop monter quand le service échoue en permanence.
 .
 Ainsi, une valeur plus adaptée pour la majorité des systèmes est 400. Cependant, si vous utilisez un clone d'inetd qui ne comprend pas l'expression « nowait.[limit] », vous ne devez pas essayer de mettre une limite.
";
$elem["cvs/pserver_setspawnlimit"]["default"]="false";
$elem["cvs/pserver_spawnlimit"]["type"]="string";
$elem["cvs/pserver_spawnlimit"]["description"]="Inetd spawn limit for the CVS pserver:
 When running a pserver, inetd's default limit of allowing 40 connections
 in 1 minute can easily be exceeded if a script calls CVS individually on
 many files over a pserver connection. This limit is designed to stop
 system load from rising too high if the service is continually failing.
 .
 Thus, a more sensible default limit for most systems is 400.
";
$elem["cvs/pserver_spawnlimit"]["descriptionde"]="Maximale Anzahl an Inetd-Prozessen für CVS-pserver:
 Falls Sie einen pserver betreiben, beschränkt inetd die Anzahl der Verbindungen auf 40 pro Minute. Diese Beschränkung kann leicht durch ein Skript überschritten werden, das CVS einzeln für mehrere Dateien per pserver aufruft. Die Beschränkung existiert, um die Systemauslastung zu begrenzen, falls ein bestimmter Service ständig fehlschlägt.
 .
 Deshalb ist 400 ein sinnvolleres Standardlimit für die meisten Systeme.
";
$elem["cvs/pserver_spawnlimit"]["descriptionfr"]="Limite de création de processus pour inetd avec le pserver CVS :
 La limite d'inetd par défaut est de 40 connexions par minute. Quand un pserver CVS est utilisé, cette limite peut facilement être dépassée si un script appelle individuellement le pserver CVS pour un grand nombre de fichiers. Cette limite empêche la charge du système de trop monter quand le service échoue en permanence.
 .
 Ainsi, une valeur plus adaptée pour la majorité des systèmes est 400.
";
$elem["cvs/pserver_spawnlimit"]["default"]="400";
PKG_OptionPageTail2($elem);
?>
