<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("neurodebian");

$elem["neurodebian/title"]["type"]="title";
$elem["neurodebian/title"]["description"]="NeuroDebian APT repository installer
";
$elem["neurodebian/title"]["descriptionde"]="Installationsprogramm des NeuroDebian-APT-Depots
";
$elem["neurodebian/title"]["descriptionfr"]="Configuration du dépôt APT de NeuroDebian
";
$elem["neurodebian/title"]["default"]="";
$elem["neurodebian/enable"]["type"]="boolean";
$elem["neurodebian/enable"]["description"]="Enable the NeuroDebian package repository?
 The NeuroDebian project provides a separate APT repository with
 software that is not available in Debian, including datasets and
 backported new releases.
 .
 If you choose this option, these packages will be available for
 installation and upgrades.
 .
 Even though these packages are closely maintained
 by the NeuroDebian team, enabling this additional archive
 may compromise the integrity of the system.
";
$elem["neurodebian/enable"]["descriptionde"]="Soll das NeuroDebian-Paketdepot aktiviert werden?
 Das NeuroDebian-Projekt stellt ein separates APT-Depot mit Software bereit, die nicht in Debian verfügbar ist, einschließlich Datensätzen und zurückportierten neuen Veröffentlichungen.
 .
 Falls Sie diese Option auswählen, werden diese Pakete zur Installation und Aktualisierung verfügbar sein.
 .
 Obwohl diese Pakete nur vom NeuroDebian-Team betreut werden, kann dieses zusätzliche Archiv die Integrität des Systems beeinträchtigen.
";
$elem["neurodebian/enable"]["descriptionfr"]="Faut-il activer le dépôt des paquets NeuroDebian ?
 Le projet NeuroDebian fournit un dépôt APT spécifique qui fournit des logiciels qui absents de Debian, des logiciels dans des versions plus récentes que celles de Debian, ainsi que des jeux de données.
 .
 Si vous choisissez cette option, ces paquets seront disponibles pour l'installation et les mises à jour.
 .
 Même si ces paquets sont constamment mis à jour par l'équipe NeuroDebian, activer ce dépôt supplémentaire peut compromettre l'intégrité du système.
";
$elem["neurodebian/enable"]["default"]="false";
$elem["neurodebian/release"]["type"]="select";
$elem["neurodebian/release"]["choices"][1]="automatic";
$elem["neurodebian/release"]["choicesde"][1]="automatisch";
$elem["neurodebian/release"]["choicesfr"][1]="automatique";
$elem["neurodebian/release"]["description"]="Release name of the base system:
 Please specify the appropriate Debian or Ubuntu release codename
 (for instance \"stretch\" or \"trusty\").
 .
 If this is set to \"automatic\"', the release name is chosen according
 to the output of \"apt-cache policy\". If the release name for this
 system is not \"${release}\", you should choose the specific one which
 matches best.
";
$elem["neurodebian/release"]["descriptionde"]="Veröffentlichungsnamen des Basissystems:
 Bitte geben Sie den Codenamen der entsprechenden Debian- oder Ubuntu-Veröffentlichung an (zum Beispiel »stretch« oder »trusty«).
 .
 Falls dies auf »automatisch« gesetzt ist, wird der Veröffentlichungsname gemäß der Ausgabe von »apt-cache policy« gesetzt. Falls der Veröffentlichungsname für dieses System nicht »${release}« ist, sollten Sie den einen auswählen, der am besten passt.
";
$elem["neurodebian/release"]["descriptionfr"]="Nom de version du système de base :
 Veuillez indiquer le nom de code correct pour la version de Debian ou d'Ubuntu (par exemple « stretch » ou « trusty »).
 .
 Si cela est réglé sur « automatique », le nom de version est choisi en fonction de ce que renvoie la commande « apt-cache policy ». Si le nom de version de ce système n'est pas « $(version) », vous devez choisir celui qui correspond le mieux.
";
$elem["neurodebian/release"]["default"]="auto";
$elem["neurodebian/mirror"]["type"]="select";
$elem["neurodebian/mirror"]["choices"][1]="origin";
$elem["neurodebian/mirror"]["choices"][2]="best";
$elem["neurodebian/mirror"]["choices"][3]="custom";
$elem["neurodebian/mirror"]["description"]="NeuroDebian mirror to use:
 The NeuroDebian project has a number of community-maintained mirrors
 around the globe.
 .
 If you do not know which mirror URL to choose, select one of:
 .
  * origin: the original NeuroDebian repository;
  * best: will try to use netselect to select the \"closest\" mirror.
    This may fail depending on the current mirror setup and the
    configuration of the firewall. If netselect is not available, the
    default mirror will be used.
";
$elem["neurodebian/mirror"]["descriptionde"]="NeuroDebian-Spiegelserver, der benutzt werden soll:
 Das NeuroDebian-Projekt hat mehrere von der Gemeinschaft betreute Spiegelserver rund um den Globus.
 .
 Falls Sie nicht wissen, welchen Server Sie wählen sollen, nehmen Sie einen der folgenden:
 .
  * origin: das Original-NeuroDebian-Depot;
  * best:   wird versuchen, mittels Netselect den »nächsten« Spiegelserver
            auszuwählen.
    Dies kann je nach aktueller Spiegelservereinrichtung und Konfiguration der
    Firewall fehlschlagen. Falls Netselect nicht verfügbar ist, wird der
    Standardspiegelserver verwendet.
";
$elem["neurodebian/mirror"]["descriptionfr"]="Miroir NeuroDebian à utiliser :
 Le projet NeuroDebian propose de nombreux miroirs maintenus par la communauté dans le monde entier.
 .
 Si vous ne savez pas quelle adresse de miroir utiliser, les choix possibles sont :
 .
  * origin : le dépôt NeuroDebian original;
  * best : tentera d'utiliser netselect pour choisir le miroir le « plus proche ».
    Cela pourrait échouer en fonction de la configuration actuelle du miroir
    et de la configuration du parefeu. Si netselect n'est pas disponible, le
    miroir par défaut sera utilisé.
";
$elem["neurodebian/mirror"]["default"]="best";
$elem["neurodebian/flavor"]["type"]="select";
$elem["neurodebian/flavor"]["choices"][1]="auto";
$elem["neurodebian/flavor"]["choices"][2]="libre";
$elem["neurodebian/flavor"]["description"]="NeuroDebian flavor to use:
 The NeuroDebian project adheres to the Debian Free Software Guidelines,
 and offers three packages areas, classified by license, for all
 suites/releases:
 .
  libre
    DFSG-compliant material only
  full
    all three areas (main, contrib, non-free)
  auto
    picked from the output of \"apt-cache policy\"
    (for this machine: \"${flavor}\").
";
$elem["neurodebian/flavor"]["descriptionde"]="Variante von NeuroDebian, die benutzt werden soll:
 Das NeuroDebian-Projekt ist an die Debian-Richtlinien für freie Software gebunden und bietet drei Paketbereiche an, anhand der die Lizenz für alle Suiten und Veröffentlichungen eingestuft werden:
 .
  libre
    nur DFSG-konformes Material
  full
    alle drei Bereiche (main, contrib, non-free)
  auto
    der Ausgabe von »apt-cache policy« entnommen
    (für diesen Rechner: »${flavor}«).
";
$elem["neurodebian/flavor"]["descriptionfr"]="
 Le projet NeuroDebian adhère aux principes du logiciel libre selon Debian ( « DFSG »), et propose trois familles de paquets, triés par licence, pour toutes les suites ou versions :
 .
  libre
    uniquement les paquets compatible avec les DFSG
  full
    tous les types (main, contrib, non-free)
  auto
    choisi à partir de la sortie de « apt-cache policy »
    (pour cette machine : « ${type} »).
";
$elem["neurodebian/flavor"]["default"]="auto";
$elem["neurodebian/components"]["type"]="multiselect";
$elem["neurodebian/components"]["choices"][1]="software";
$elem["neurodebian/components"]["choices"][2]="data";
$elem["neurodebian/components"]["description"]="NeuroDebian repository components to enable:
 NeuroDebian repository provides three different sets of packages:
 .
  software
   Packages containing software, often backports of stable software
   releases for previous Debian/Ubuntu releases;
  devel
   Additional \"bleeding edge\" software packages (like those in Debian
   experimental), which it may not be safe to enable by default.
  data
   Packages containing data (such as atlases or sample datasets), often
   required by other packages. This should usually be enabled.
";
$elem["neurodebian/components"]["descriptionde"]="Zu aktivierende NeuroDebian-Depotbestandteile:
 Das NeuroDebian-Depot stellt drei verschiedene Paketzusammenstellungen bereit:
 .
  software
   Pakete, die Software enthalten, häufig Zurückportierungen stabiler
   Softwareveröffentlichungen für vorhergehende Releases von Debian/Ubuntu;
  devel
   Zusätzliche »allerneuste« Softwarepakete (wie die in Debian-Experimental),
   die zur standardmäßigen Aktivierung nicht sicher genug sind.
  data
   Pakete, die Daten enthalten (wie Atlanten oder Beispieldatensätze), die oft
   von anderen Paketen benötigt werden. Dies sollte üblicherweise aktiviert
   werden.
";
$elem["neurodebian/components"]["descriptionfr"]="Parties du dépôt NeuroDebian à activer :
 Le dépôt NeuroDebian propose trois différents ensembles de paquets :
 .
  software
   Paquets contenant des logiciels, souvent des logiciels stables
   rétroportés pour les versions antérieures de Debian/Ubuntu ;
  devel
   Paquets logiciels supplémentaires « ultra récents » (comme ceux dans
   Debian experimental), qu'il pourrait ne pas être prudent d'activer
   par défaut.
  data
   Paquets contenant des données (comme des atlas ou de simples jeux
   de données, souvent requis par d'autres paquets. Cela devrait
   généralement être activé.
";
$elem["neurodebian/components"]["default"]="software, data";
$elem["neurodebian/overwrite"]["type"]="boolean";
$elem["neurodebian/overwrite"]["description"]="Overwrite the existing NeuroDebian APT file?
 If an APT sources.list file already exists for NeuroDebian, this
 package will fail to configure unless given permission to overwrite it.
";
$elem["neurodebian/overwrite"]["descriptionde"]="Soll die existierende NeuroDebian-APT-Datei überschrieben werden?
 Falls bereits eine APT-»sources.list«-Datei für NeuroDebian besteht, wird die Konfiguration fehlschlagen, bis die Erlaubnis zum Überschreiben erteilt wurde.
";
$elem["neurodebian/overwrite"]["descriptionfr"]="Écraser le fichier APT existant de NeuroDebian ?
 Si un fichier sources.list pour APT.list existe pour NeuroDebian, la configuration de ce paquet va échouer sauf si vous autorisez son écrasement.
";
$elem["neurodebian/overwrite"]["default"]="true";
$elem["neurodebian/suffix"]["type"]="string";
$elem["neurodebian/suffix"]["description"]="Additional suffix for the NeuroDebian APT file name:
 Adding a suffix makes it possible to enable an additional repository
 (such as NeuroDebian devel) or release, without interfering with the
 main NeuroDebian sources list.
 .
 It should usually be left empty.
";
$elem["neurodebian/suffix"]["descriptionde"]="Zusätzliche Endung für den NeuroDebian-APT-Dateinamen:
 Das Hinzufügen einer Endung ermöglicht das Aktivieren eines zusätzlichen Depots (wie NeuroDebian-»devel«) oder einer Veröffentlichung, ohne die Hauptquellenliste von NeuroDebian zu beeinträchtigen.
 .
 Normalerweise sollte dies leer gelassen werden.
";
$elem["neurodebian/suffix"]["descriptionfr"]="Suffixe supplémentaire pour le nom de fichier APT de NeuroDebian :
 L'ajout d'un suffixe permet d'activer un dépôt supplémentaire (tel que NeuroDebian devel) ou une version, sans interférer avec le fichier sources.lists principal de NeuroDebian.
 .
 Il doit généralement être vide.
";
$elem["neurodebian/suffix"]["default"]="Default:";
$elem["neurodebian/run-update-note"]["type"]="note";
$elem["neurodebian/run-update-note"]["description"]="APT update required
 For the installation (or removal) of a NeuroDebian sources.list file
 to take effect, APT's packages list needs to be updated. Please
 manually run \"apt-get update\" after the neurodebian package has been
 installed or reconfigured.
";
$elem["neurodebian/run-update-note"]["descriptionde"]="APT-Aktualisierung erforderlich
 Damit die Installation (oder das Entfernen) einer NeuroDebian-»sources.list«-Datei wirksam wird, muss die Paketliste von APT aktualisiert werden. Bitte führen Sie manuell »apt-get update« aus, nachdem das NeuroDebian-Paket installiert oder neu konfiguriert wurde.
";
$elem["neurodebian/run-update-note"]["descriptionfr"]="Mise à jour d'APT requise
 Pour que l'installation (ou la suppression) d'un fichier sources.list NeuroDebian soit effective, la liste des paquets d'APT doit être mise à jour. Veuillez lancer manuellement « apt-get update » une fois que NeuroDebian aura été installé ou reconfiguré.
";
$elem["neurodebian/run-update-note"]["default"]="";
$elem["neurodebian/netselect-not-found"]["type"]="error";
$elem["neurodebian/netselect-not-found"]["description"]="Missing netselect tool
 The \"netselect\" utility was not found. You probably need to
 install the netselect package.
 .
 Alternatively, you can manually select the mirror to use.
";
$elem["neurodebian/netselect-not-found"]["descriptionde"]="Netselect-Werkzeug fehlt
 Das Hilfswerkzeug »netselect« wurde nicht gefunden. Möglicherweise müssen Sie das Netselect-Paket installieren.
 .
 Alternativ können Sie den Spiegelserver, der benutzt werden soll, manuell auswählen.
";
$elem["neurodebian/netselect-not-found"]["descriptionfr"]="Outil netselect manquant
 L'utilitaire « netselect » n'a pas été trouvé. Il est certainement nécessaire d'installer le paquet netselect.
 .
 Vous pouvez également choisir vous-même le miroir à utiliser.
";
$elem["neurodebian/netselect-not-found"]["default"]="";
$elem["neurodebian/netselect-cannot-be-used"]["type"]="error";
$elem["neurodebian/netselect-cannot-be-used"]["description"]="Missing netselect tool
 The \"netselect\" utility was not found. You probably need to
 install the netselect package.
 .
 Unless this package is installed, the NeuroDebian mirror to use has
 to be chosen manually. To be prompted with the relevant question, you
 can run \"dpkg-reconfigure -plow neurodebian\".
";
$elem["neurodebian/netselect-cannot-be-used"]["descriptionde"]="Netselect-Werkzeug fehlt
 Das Hilfswerkzeug »netselect« wurde nicht gefunden. Möglicherweise müssen Sie das Netselect-Paket installieren.
 .
 Falls dieses Paket nicht installiert ist, muss der NeuroDebian-Spiegelserver manuell ausgewählt werden. Um die relevante Frage gestellt zu bekommen, können Sie »dpkg-reconfigure -plow neurodebian« ausführen.
";
$elem["neurodebian/netselect-cannot-be-used"]["descriptionfr"]="Outil netselect manquant
 L'utilitaire « netselect » n'a pas été trouvé. Il est certainement nécessaire d'installer le paquet netselect.
 .
 Tant que ce paquet n'est pas installé, le choix du miroir NeuroDebian à utiliser ne peut être que manuel. Pour modifier ce choix, vous pouvez lancer la commande « dpkg-reconfigure -plow neurodebian ».
";
$elem["neurodebian/netselect-cannot-be-used"]["default"]="";
PKG_OptionPageTail2($elem);
?>
