<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("htcondor");

$elem["condor/title"]["type"]="title";
$elem["condor/title"]["description"]="HTCondor configuration
";
$elem["condor/title"]["descriptionde"]="HTCondor-Konfiguration
";
$elem["condor/title"]["descriptionfr"]="Configuration de HTCondor
";
$elem["condor/title"]["default"]="";
$elem["condor/wantdebconf"]["type"]="boolean";
$elem["condor/wantdebconf"]["description"]="Manage initial HTCondor configuration automatically?
 The setup for HTCondor can be handled automatically, asking a few questions
 to create an initial configuration appropriate for a machine that is either
 a member of an existing pool or a fully functional \"Personal HTCondor
 installation\". This generated initial configuration can be further extended
 later on.
 .
 Otherwise, HTCondor will be installed with a default configuration that needs
 to be customized manually.
";
$elem["condor/wantdebconf"]["descriptionde"]="HTCondor-Erstkonfiguration automatisch verwalten?
 Die Einrichtung von HTCondor kann automatisch vorgenommen werden. Dazu werden ein paar Fragen gestellt, um eine Erstkonfiguration für eine Maschine zu erstellen, die entweder ein Mitglied eines existierenden Pools oder eine voll funktionale »Persönliche HTCondor-Installation« ist. Diese Erstkonfiguration kann später erweitert werden.
 .
 Andernfalls wird HTCondor mit einer Vorkonfiguration installiert, die per Hand angepasst werden muss.
";
$elem["condor/wantdebconf"]["descriptionfr"]="Faut-il gérer la configuration initiale de HTCondor automatiquement ?
 La mise en place de HTCondor peut être gérée automatiquement en répondant à quelques questions afin de créer une configuration initiale appropriée pour une machine qui est soit membre d'un groupement (« pool ») existant, soit une « installation personnelle de HTCondor » complètement fonctionnelle. Cette configuration initiale générée peut être par la suite modifiée.
 .
 Dans le cas contraire, HTCondor sera installé avec une configuration par défaut qu'il est conseillé d'adapter manuellement.
";
$elem["condor/wantdebconf"]["default"]="false";
$elem["condor/phonehome"]["type"]="boolean";
$elem["condor/phonehome"]["description"]="Enable submission of usage statistics?
 The HTCondor authors politely request that each HTCondor pool sends them periodic
 updates with basic information about the status of the pool. Updates include
 only the total number of machines, the number of jobs submitted, the number
 of machines running jobs, the host name of the central manager, and the name
 of the pool. These updates help the HTCondor Team see how HTCondor is being used
 around the world.
";
$elem["condor/phonehome"]["descriptionde"]="Die Übertragung von Nutzungsstatistiken einschalten?
 Die HTCondor-Autoren ersuchen höflich, dass jeder HTCondor-Pool ihnen periodische Aktualisierungen mit Grundinformationen über den Zustand des Pools zusendet. Die Aktualisierungen enthalten nur die Gesamtzahl der Maschinen, die Anzahl der übertragenen Aufträge, die Anzahl der Maschinen, die Aufträge ausführt, den Rechnernamen des Zentralverwalters und den Namen des Pools. Diese Aktualisierungen verschaffen dem HTCondor-Team eine Übersicht, wie HTCondor in aller Welt eingesetzt wird.
";
$elem["condor/phonehome"]["descriptionfr"]="Faut-il activer l'inscription des statistiques d'utilisation ?
 Les auteurs de HTCondor suggèrent que chaque groupement de HTCondor leur envoie régulièrement des informations basiques à propos de l'état du groupement. Ces informations incluent le nombre total de machines, le nombre de travaux soumis, le nombre de machines exécutant des travaux, le nom d'hôte du gestionnaire central et le nom du groupement. Elles permettent à l'équipe de HTCondor de savoir comment leur logiciel est utilisé à travers le monde.
";
$elem["condor/phonehome"]["default"]="false";
$elem["condor/centralmanager"]["type"]="string";
$elem["condor/centralmanager"]["description"]="Address of the central manager:
 If this machine is intended to join an existing HTCondor pool, the address of the
 central manager machine has to be specified. Any address format supported
 by HTCondor can be used, including macro expressions.
 .
 Example: condor-manager.example.org
";
$elem["condor/centralmanager"]["descriptionde"]="Adresse des Zentralverwalters:
 Wenn diese Maschine einem existierenden HTCondor-Pool beitreten soll, muss die Adresse der zentralen Verwaltungsmaschine angegeben werden. Jedes von HTCondor unterstützte Adressformat kann verwendet werden, einschließlich Makro-Ausdrücken.
 .
 Beispiel: condor-manager.example.org
";
$elem["condor/centralmanager"]["descriptionfr"]="Adresse du gestionnaire central :
 Si cette machine doit rejoindre un groupement HTCondor existant, il est alors nécessaire d'indiquer l'adresse de la machine faisant office de gestionnaire central. Tout format d'adresse géré par HTCondor peut être utilisé en incluant des macros.
 .
 Exemple : condor-manager.example.org
";
$elem["condor/centralmanager"]["default"]="";
$elem["condor/daemons"]["type"]="multiselect";
$elem["condor/daemons"]["choices"][1]="Job submission";
$elem["condor/daemons"]["choices"][2]="Job execution";
$elem["condor/daemons"]["choicesde"][1]="Auftragsübertragung";
$elem["condor/daemons"]["choicesde"][2]="Auftragsausführung";
$elem["condor/daemons"]["choicesfr"][1]="Soumission de travail";
$elem["condor/daemons"]["choicesfr"][2]="Exécution de travail";
$elem["condor/daemons"]["description"]="Role of this machine in the HTCondor pool:
 Please specify the intended role or roles of this machine, for which the
 corresponding daemons will be started automatically.
 .
 A machine in a HTCondor pool can have multiple roles. In general there is one
 central manager and multiple nodes that run jobs. Often the central manager
 is also the machine from which users submit jobs. However, it is also
 possible to have multiple machines available for job submission.
";
$elem["condor/daemons"]["descriptionde"]="Rolle dieser Maschine im HTCondor-Pool:
 Bitte geben Sie die Rolle oder Rollen an, die Sie dieser Maschine zuweisen wollen, damit die entsprechenden Daemons automatisch gestartet werden.
 .
 Eine Maschine in einem HTCondor-Pool kann mehrere Rollen haben. Im Allgemeinen gibt es einen Zentralverwalter und mehrere Knoten, die Aufträge ausführen. Oft ist der Zentralverwalter auch die Maschine, von der aus die Benutzer Aufträge übertragen. Es ist aber auch möglich, mehrere Maschinen für die Auftrag-Übertragung einzusetzen.
";
$elem["condor/daemons"]["descriptionfr"]="Rôle de cette machine au sein du groupement HTCondor :
 Veuillez indiquer le(s) rôle(s) prévu(s) pour cette machine afin que les démons correspondant soient démarrés automatiquement.
 .
 Une machine dans un groupement HTCondor peut avoir différents rôles. En général, il y a un gestionnaire central et plusieurs nœuds qui exécutent des travaux. Il arrive souvent que le gestionnaire central soit aussi la machine depuis laquelle les utilisateurs soumettent leurs travaux. Toutefois, il est aussi possible d'avoir plusieurs machines disponibles pour la soumission de travaux.
";
$elem["condor/daemons"]["default"]="SCHEDD, STARTD";
$elem["condor/admin"]["type"]="string";
$elem["condor/admin"]["description"]="Email address of the local HTCondor administrator:
 The HTCondor administrator will receive error messages if something goes wrong
 with HTCondor on this machine.
";
$elem["condor/admin"]["descriptionde"]="E-Mail-Adresse des lokalen HTCondor-Administrators:
 Der HTCondor-Administrator wird Fehlernachrichten bekommen, wenn auf dieser Maschine etwas mit HTCondor schief läuft.
";
$elem["condor/admin"]["descriptionfr"]="Adresse électronique de l'administrateur local de HTCondor :
 L'administrateur de HTCondor recevra les messages d'erreur en cas de problème avec HTCondor sur cette machine.
";
$elem["condor/admin"]["default"]="root@localhost";
$elem["condor/uiddomain"]["type"]="string";
$elem["condor/uiddomain"]["description"]="user directory domain label:
 This label is a string that HTCondor uses to decide if a submitting
 machine and an execute machine share the same directory of user accounts
 (that is, whether UID 1000 on one machine is the same person as UID 1000
 on the other). If the labels on the two machines match, HTCondor will run
 each job under the UID that submitted the job, and send emails about
 them to user@DOMAIN (using this label as the value of DOMAIN). If not,
 HTCondor will run all jobs as user \"nobody\". Leaving it blank will cause
 HTCondor to run all jobs on this machine as user \"nobody\".
 .
 Any domain format supported by HTCondor can be used, including macro
 expressions. Example: $(FULL_HOSTNAME)
";
$elem["condor/uiddomain"]["descriptionde"]="Benutzerverzeichnis-Domain-Bezeichnung:
 Diese Bezeichnung ist eine Zeichenkette, welche HTCondor zur Entscheidung darüber heranzieht, ob eine Übertragungs- und eine Ausführungs-Maschine das selbe Verzeichnis mit Benutzerkonten teilen (ob UID 1000 auf einer Maschine die selbe Person ist wie UID 1000 auf der anderen). Wenn die Bezeichnungen auf den beiden Maschinen übereinstimmen, wird HTCondor jeden Auftrag unter der UID ausführen, die diesen Auftrag übermittelt hat und E-Mails darüber an Benutzer@DOMAIN verschicken (wobei diese Bezeichnung als Wert für DOMAIN benutzt wird). Falls nicht, wird HTCondor alle Aufträge als Benutzer »nobody« ausführen. Wenn Sie die Bezeichnung leer lassen, wird HTCondor alle Aufträge auf dieser Maschine als »nobody« ausführen.
 .
 Jedes von HTCondor unterstütztes Domain-Format kann verwendet werden, einschließlich Makro-Ausdrücken. Beispiel: $(FULL_HOSTNAME)
";
$elem["condor/uiddomain"]["descriptionfr"]="Étiquette de domaine du répertoire utilisateur :
 Cette étiquette est une chaîne de caractères que HTCondor utilise pour décider si une machine qui soumet un travail et une machine qui exécute le travail partagent le même répertoire d'un compte utilisateur (c'est-à-dire si l'UID 1000 d'une machine est la même personne que l'UID 1000 d'une autre machine). Si les étiquettes des deux machines correspondent, HTCondor exécutera chaque travail sous l'UID qui a soumis le travail et enverra un message électronique à l'adresse utilisateur@DOMAINE (en utilisant l'étiquette comme valeur pour DOMAINE). Dans le cas contraire, HTCondor exécutera tous les travaux en tant qu'utilisateur « nobody ». Si vous laissez ce champ vide, HTCondor exécutera tous les travaux en tant qu'utilisateur « nobody ».
 .
 Tout format de domaine géré par HTCondor peut être utilisé en incluant des macros. Exemple : $(NOM_DHOTE_COMPLET)
";
$elem["condor/uiddomain"]["default"]="";
$elem["condor/filesystemdomain"]["type"]="string";
$elem["condor/filesystemdomain"]["description"]="File system domain label:
 This label is an arbitrary string that is used to decide if a submitting
 machine and an execute machine share the same file system. In a dedicated
 cluster all machines will most likely use a shared file system and hence
 should use the same label. If left blank, it will automatically be set to
 the fully qualified hostname of the local machine, which will prevent
 HTCondor assuming that any two machines share a file system.
 .
 Example: my_shared_volume
";
$elem["condor/filesystemdomain"]["descriptionde"]="Dateisystem-Domain-Bezeichnung:
 Diese Bezeichnung ist eine beliebige Zeichenkette, die zur Entscheidung herangezogen wird, ob eine Übertragungs-Maschine und eine Ausführungs-Maschine das selbe Dateisystem gemeinsam nutzen. In einem dedizierten Cluster werden alle Maschinen höchstwahrscheinlich auf ein gemeinsames Dateisystem zugreifen und sollten deshalb dieselbe Bezeichnung verwenden. Wenn Sie dies leer lassen, wird es automatisch auf den vollständigen Rechnernamen der lokalen Maschine gesetzt, weswegen HTCondor nicht annehmen wird, dass irgendein Dateisystem von zwei Maschinen gemeinsam genutzt wird.
 .
 Beispiel: mein_gemeinsam_genutztes_laufwerk
";
$elem["condor/filesystemdomain"]["descriptionfr"]="Étiquette de domaine du système de fichiers :
 Cette étiquette est une chaîne de caractères aléatoire qui est utilisée pour décider si une machine qui soumet un travail et une machine qui exécute un travail partagent un même système de fichiers. Dans une grappe dédiée de machines, il est fort probable que toutes les machines utilisent un système de fichiers partagé et par conséquent elles devraient utiliser la même étiquette. Si vous laissez ce champ vide, le nom d'hôte complètement qualifié de la machine locale sera utilisé, ce qui empêchera HTCondor de supposer que des machines prises deux à deux partagent le même système de fichiers.
 .
 Exemple : mon_volume_partagé
";
$elem["condor/filesystemdomain"]["default"]="";
$elem["condor/personal"]["type"]="boolean";
$elem["condor/personal"]["description"]="Perform a \"Personal HTCondor installation\"?
 A Personal HTCondor installation is a fully functional HTCondor pool on a single
 machine. HTCondor will automatically configure and advertise as many slots as
 it detects CPU cores on this machine. HTCondor daemons will not be available
 through external network interfaces.
 .
 This configuration is not appropriate if this machine is intended to be a
 member of a pool.
";
$elem["condor/personal"]["descriptionde"]="»Persönliche HTCondor-Installation« vornehmen?
 Eine Persönliche HTCondor-Installation ist ein voll funktionaler HTCondor-Pool auf einer einzelnen Maschine. HTCondor wird automatisch so viele Slots konfigurieren und bekanntgeben, wie es CPU-Kerne auf der Maschine vorfinden wird. Die HTCondor-Daemons werden nicht durch externe Netzwerkschnittstellen erreichbar sein.
 .
 Diese Konfiguration ist ungeeignet, wenn diese Maschine Teil eines Pools werden soll.
";
$elem["condor/personal"]["descriptionfr"]="Faut-il effectuer une « installation personnelle de HTCondor » ?
 Une « installation personnelle de HTCondor » est un groupement de HTCondor autonome sur une seule machine. HTCondor configurera et annoncera automatiquement autant de créneaux (« slots ») que de cœurs CPU détectés sur cette machine. Les démons de HTCondor ne seront pas disponibles pour des interfaces réseau externes.
 .
 Cette configuration n'est pas adaptée si cette machine est prévue pour être membre d'un groupement.
";
$elem["condor/personal"]["default"]="true";
$elem["condor/reservedmemory"]["type"]="string";
$elem["condor/reservedmemory"]["description"]="Amount of physical memory to withhold from HTCondor (in MB):
 By default, HTCondor considers all the physical memory of a machine as
 available to be used by HTCondor jobs. If this value is defined,
 HTCondor subtracts it from the amount of memory it advertises as available.
 .
 Example (to reserve 1 GB): 1024
";
$elem["condor/reservedmemory"]["descriptionde"]="Größe des physischen Speichers, der vor HTCondor freigehalten werden soll (in MB):
 In der Voreinstellung betrachtet HTCondor den gesamten physischen Speicher als für HTCondor-Aufträge verfügbar. Wenn dieser Wert definiert wird, zieht HTCondor ihn von der Speichermenge ab, den es als verfügbar bekanntgibt.
 .
 Beispiel (um ein Gigabyte zu reservieren): 1024
";
$elem["condor/reservedmemory"]["descriptionfr"]="Quantité de mémoire physique à retenir pour HTCondor (en Mo) :
 HTCondor considère par défaut que toute la mémoire physique d'une machine est disponible pour les travaux HTCondor. Si cette valeur est définie, elle sera soustraite à la quantité de mémoire annoncée comme étant disponible.
 .
 Exemple pour réserver 1 Go : 1024
";
$elem["condor/reservedmemory"]["default"]="";
$elem["condor/allowwrite"]["type"]="string";
$elem["condor/allowwrite"]["description"]="Machines with write access to this host:
 All machines that are to participate in the HTCondor pool need to be listed
 here. This setting can be a plain comma-separated list, a domain with
 wildcards, or a macro expression. By default only localhost is allowed to
 access HTCondor daemons on this machine.
 .
 Example: *.condor-pool.example.org
";
$elem["condor/allowwrite"]["descriptionde"]="Maschinen mit Schreibzugriff auf diesen Rechner:
 Alle Maschinen, die am HTCondor-Pool teilnehmen sollen, müssen hier aufgelistet werden. Diese Einstellung kann eine kommaseparierte Liste sein, eine Domain mit Platzhaltern oder ein Makro-Ausdruck. In der Voreinstellung darf nur Localhost auf die HTCondor-Daemons dieser Maschine zugreifen.
 .
 Beispiel: *.condor-pool.example.org
";
$elem["condor/allowwrite"]["descriptionfr"]="Machines ayant un accès en écriture sur cet hôte :
 Toutes les machines qui feront partie d'un groupement HTCondor doivent être indiquées ici. Ce paramétrage peut être une liste simple séparée par des virgules, un domaine avec des caractères génériques (« wildcards ») ou une macro. Par défaut seul l'hôte local a la permission d'accéder aux démons HTCondor de cette machine.
 .
 Exemple : *.groupement-condor.example.org
";
$elem["condor/allowwrite"]["default"]="";
$elem["condor/startpolicy"]["type"]="boolean";
$elem["condor/startpolicy"]["description"]="Run HTCondor jobs regardless of other machine activity?
 By default HTCondor only starts jobs when a machine is idle, i.e. no keyboard
 activity or CPU load for some time. Moreover, it also suspends jobs whenever
 there is console activity and doesn't continue them until the machine becomes
 idle again. However, for a dedicated compute node or a Personal HTCondor
 installation it might be desirable to always start jobs as soon as they are
 submitted (given that resources are still available), and to run them
 continuously regardless of other activity on this machine.
 .
 If you plan to compose a custom policy it is best to keep HTCondor's default
 here.
";
$elem["condor/startpolicy"]["descriptionde"]="HTCondor-Aufträge ohne Rücksicht auf andere Aktivitäten der Maschine durchführen?
 In der Voreinstellung startet HTCondor Aufträge nur, wenn die Maschine leerläuft,  d. h. einige Zeit lang keine Tastatureingaben oder CPU-Last auftritt. Außerdem setzt es die Aufträge aus, wenn es Aktivitäten auf der Konsole gibt und bearbeitet sie erst weiter, wenn die Maschine wieder leer läuft. Allerdings kann es für einen dedizierten Rechenknoten oder eine Persönliche HTCondor-Installation denkbar sein, Aufträge immer zu starten, sobald sie übermittelt wurden (unter der Voraussetzung, dass die Ressourcen immer noch verfügbar sind) und sie ohne Rücksicht auf andere Aktivitäten auf dieser Maschine zu bearbeiten.
 .
 Wenn Sie vorhaben, eine eigene Richtlinie zu erstellen, ist es das Beste, hier HTCondors Voreinstellungen zu verwenden.
";
$elem["condor/startpolicy"]["descriptionfr"]="Faut-il exécuter les travaux de HTCondor malgré l'activité des autres machines ?
 Par défaut, HTCondor ne démarre des travaux que si une machine est inoccupée, c'est à dire qu'il n'y a aucune activité du clavier ou de charge du CPU pendant un certain temps. De plus, il suspend un travail quand il détecte de l'activité sur une console et ne continue que quand la machine redevient inoccupée. Toutefois, pour un nœud dédié ou une « installation personnelle de HTCondor  », il peut être souhaitable de toujours débuter un travail dès que soumis (en supposant que les ressources soient encore disponibles) et de l'exécuter en continu indifféremment d'autres activités sur cette machine.
 .
 Si vous prévoyez de créer une politique personnalisée, il est préférable de conserver la politique par défaut de HTCondor ici.
";
$elem["condor/startpolicy"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
