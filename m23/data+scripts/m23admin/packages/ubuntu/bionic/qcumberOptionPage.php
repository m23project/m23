<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("qcumber");

$elem["qcumber/krakendb"]["type"]="string";
$elem["qcumber/krakendb"]["description"]="Installation directory of the minikraken database:
 QCumber is using kraken which needs a database.  To simplyfy the process
 of creating the database which requires a lot of computing power there is
 the option to download this database (see
 https://ccb.jhu.edu/software/kraken/).  If you want to run QCumber the
 directory of the kraken database needs to be known to the program.  Please
 input the directory the database is installed or should the database be
 installed by the script /usr/share/doc/qcumber/get-minikrakendb.
";
$elem["qcumber/krakendb"]["descriptionde"]="Installationsverzeichnis der minikraken Datenbank:
 QCumber benutzt kraken, das eine Datenbank benötigt.  Um den Prozess des Erzeugens der Datenbank, der eine erhebliche Rechenleistung benötigt, zu vereinfachen, besteht die Möglichkeit diese Datenbank herunterzuladen (siehe https://ccb.jhu.edu/software/kraken/ .)  Um QCumber zu benutzen, muß das Verzeichnis der minikraken Datenbank bekannt sein.  Bitte geben Sie das Verzeichnis ein, in dem die Datenbank installiert ist oder in das die Datenbank mit Hilfe des Scripts /usr/share/doc/qcumber/get-minikrakendb installiert werden soll.
";
$elem["qcumber/krakendb"]["descriptionfr"]="Répertoire d'installation de la base données minikraken :
 QCumber utilise Kraken qui requiert une base de données. Pour simplifier le processus de création de base de données qui réclame beaucoup de puissance de calcul, il exite une option pour télécharger cette base de données (voir https://ccb.jhu.edu/software/kraken/). Si vous souhaitez exécuter QCumber, le programme doit connaître le répertoire de la base données kraken. Veuillez entrer le nom du répertoire où la base de données est installée ou devrait être installée par le script /usr/share/doc/qcumber/get-minikrakendb.
";
$elem["qcumber/krakendb"]["default"]="/var/lib/kraken/minikraken_20141208";
PKG_OptionPageTail2($elem);
?>
