<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("condor");

$elem["condor/title"]["type"]="title";
$elem["condor/title"]["description"]="Condor configuration
";
$elem["condor/title"]["descriptionde"]="Condor-Konfiguration
";
$elem["condor/title"]["descriptionfr"]="Configuration de Condor
";
$elem["condor/title"]["default"]="";
$elem["condor/wantdebconf"]["type"]="boolean";
$elem["condor/wantdebconf"]["description"]="Manage initial Condor configuration automatically?
 The setup for Condor can be handled automatically, asking a few questions
 to create an initial configuration appropriate for a machine that is either
 a member of an existing pool or a fully functional \"Personal Condor
 installation\". This generated initial configuration can be further extended
 later on.
 .
 Otherwise, Condor will be installed with a default configuration that needs
 to be customized manually.
";
$elem["condor/wantdebconf"]["descriptionde"]="Condor-Erstkonfiguration automatisch verwalten?
 Die Einrichtung von Condor kann automatisch vorgenommen werden. Dazu werden ein paar Fragen gestellt, um eine Erstkonfiguration für eine Maschine zu erstellen, die entweder ein Mitglied eines existierenden Pools oder eine voll funktionale »Persönliche Condor-Installation« ist. Diese Erstkonfiguration kann später erweitert werden.
 .
 Andernfalls wird Condor mit einer Vorkonfiguration installiert, die per Hand angepasst werden muss.
";
$elem["condor/wantdebconf"]["descriptionfr"]="Faut-il gÃ©rer la configuration initiale de Condor automatiquementÂ ?
 La mise en place de Condor peut Ãªtre gÃ©rÃ©e automatiquement en rÃ©pondant Ã  quelques questions afin de crÃ©er une configuration initiale appropriÃ©e pour une machine qui est soit membre d'un groupement (Â«Â poolÂ Â») existant, soit une Â«Â installation personnelle de CondorÂ Â» complÃ¨tement fonctionnelle. Cette configuration initiale gÃ©nÃ©rÃ©e peut Ãªtre par la suite modifiÃ©e.
 .
 Dans le cas contraire, Condor sera installÃ© avec une configuration par dÃ©faut qu'il est conseillÃ© d'adapter manuellement.
";
$elem["condor/wantdebconf"]["default"]="false";
$elem["condor/phonehome"]["type"]="boolean";
$elem["condor/phonehome"]["description"]="Enable submission of usage statistics?
 The Condor authors politely request that each Condor pool sends them periodic
 updates with basic information about the status of the pool. Updates include
 only the total number of machines, the number of jobs submitted, the number
 of machines running jobs, the host name of the central manager, and the name
 of the pool. These updates help the Condor Team see how Condor is being used
 around the world.
";
$elem["condor/phonehome"]["descriptionde"]="Die Übertragung von Nutzungsstatistiken einschalten?
 Die Condor-Autoren ersuchen höflich, dass jeder Condor-Pool ihnen periodische Aktualisierungen mit Grundinformationen über den Zustand des Pools zusendet. Die Aktualisierungen enthalten nur die Gesamtzahl der Maschinen, die Anzahl der übertragenen Aufträge, die Anzahl der Maschinen, die Aufträge ausführt, den Rechnernamen des Zentralverwalters und den Namen des Pools. Diese Aktualisierungen verschaffen dem Condor-Team eine Übersicht, wie Condor in aller Welt eingesetzt wird.
";
$elem["condor/phonehome"]["descriptionfr"]="Faut-il activer l'inscription des statistiques d'utilisationÂ ?
 Les auteurs de Condor suggÃ¨rent que chaque groupement de Condor leur envoie rÃ©guliÃ¨rement des informations basiques Ã  propos de l'Ã©tat du groupement. Ces informations incluent le nombre total de machines, le nombre de travaux soumis, le nombre de machines exÃ©cutant des travaux, le nom d'hÃ´te du gestionnaire central et le nom du groupement. Elles permettent Ã  l'Ã©quipe de Condor de savoir comment leur logiciel est utilisÃ© Ã  travers le monde.
";
$elem["condor/phonehome"]["default"]="false";
$elem["condor/centralmanager"]["type"]="string";
$elem["condor/centralmanager"]["description"]="Address of the central manager:
 If this machine is intended to join an existing Condor pool, the address of the
 central manager machine has to be specified. Any address format supported
 by Condor can be used, including macro expressions.
 .
 Example: condor-manager.example.org
";
$elem["condor/centralmanager"]["descriptionde"]="Adresse des Zentralverwalters:
 Wenn diese Maschine einem existierenden Condor-Pool beitreten soll, muss die Adresse der zentralen Verwaltungsmaschine angegeben werden. Jedes von Condor unterstützte Adressformat kann verwendet werden, einschließlich Makro-Ausdrücken.
 .
 Beispiel: condor-manager.example.org
";
$elem["condor/centralmanager"]["descriptionfr"]="Adresse du gestionnaire centralÂ :
 Si cette machine doit rejoindre un groupement Condor existant, il est alors nÃ©cessaire d'indiquer l'adresse de la machine faisant office de gestionnaire central. Tout format d'adresse gÃ©rÃ© par Condor peut Ãªtre utilisÃ© en incluant des macros.
 .
 ExempleÂ : condor-manager.example.org
";
$elem["condor/centralmanager"]["default"]="";
$elem["condor/daemons"]["type"]="multiselect";
$elem["condor/daemons"]["choices"][1]="Job submission";
$elem["condor/daemons"]["choices"][2]="Job execution";
$elem["condor/daemons"]["choicesde"][1]="Auftragsübertragung";
$elem["condor/daemons"]["choicesde"][2]="Auftragsausführung";
$elem["condor/daemons"]["choicesfr"][1]="Soumission de travail";
$elem["condor/daemons"]["choicesfr"][2]="ExÃ©cution de travail";
$elem["condor/daemons"]["description"]="Role of this machine in the Condor pool:
 Please specify the intended role or roles of this machine, for which the
 corresponding daemons will be started automatically.
 .
 A machine in a Condor pool can have multiple roles. In general there is one
 central manager and multiple nodes that run jobs. Often the central manager
 is also the machine from which users submit jobs. However, it is also
 possible to have multiple machines available for job submission.
";
$elem["condor/daemons"]["descriptionde"]="Rolle dieser Maschine im Condor-Pool:
 Bitte geben Sie die Rolle oder Rollen an, die Sie dieser Maschine zuweisen wollen, damit die entsprechenden Daemons automatisch gestartet werden.
 .
 Eine Maschine in einem Condor-Pool kann mehrere Rollen haben. Im Allgemeinen gibt es einen Zentralverwalter und mehrere Knoten, die Aufträge ausführen. Oft ist der Zentralverwalter auch die Maschine, von der aus die Benutzer Aufträge übertragen. Es ist aber auch möglich, mehrere Maschinen für die Auftrag-Übertragung einzusetzen.
";
$elem["condor/daemons"]["descriptionfr"]="RÃ´le de cette machine au sein du groupement CondorÂ :
 Veuillez indiquer le(s) rÃ´le(s) prÃ©vu(s) pour cette machine afin que les dÃ©mons correspondant soient dÃ©marrÃ©s automatiquement.
 .
 Une machine dans un groupement Condor peut avoir diffÃ©rents rÃ´les. En gÃ©nÃ©ral, il y a un gestionnaire central et plusieurs nÅuds qui exÃ©cutent des travaux. Il arrive souvent que le gestionnaire central soit aussi la machine depuis laquelle les utilisateurs soumettent leurs travaux. Toutefois, il est aussi possible d'avoir plusieurs machines disponibles pour la soumission de travaux.
";
$elem["condor/daemons"]["default"]="SCHEDD, STARTD";
$elem["condor/admin"]["type"]="string";
$elem["condor/admin"]["description"]="Email address of the local Condor administrator:
 The Condor administrator will receive error messages if something goes wrong
 with Condor on this machine.
";
$elem["condor/admin"]["descriptionde"]="E-Mail-Adresse des lokalen Condor-Administrators:
 Der Condor-Administrator wird Fehlernachrichten bekommen, wenn auf dieser Maschine etwas mit Condor schief läuft.
";
$elem["condor/admin"]["descriptionfr"]="Adresse Ã©lectronique de l'administrateur local de CondorÂ :
 L'administrateur de Condor recevra les messages d'erreur en cas de problÃ¨me avec Condor sur cette machine.
";
$elem["condor/admin"]["default"]="root@localhost";
$elem["condor/uiddomain"]["type"]="string";
$elem["condor/uiddomain"]["description"]="user directory domain label:
 This label is a string that Condor uses to decide if a submitting
 machine and an execute machine share the same directory of user accounts
 (that is, whether UID 1000 on one machine is the same person as UID 1000
 on the other). If the labels on the two machines match, Condor will run
 each job under the UID that submitted the job, and send emails about
 them to user@DOMAIN (using this label as the value of DOMAIN). If not,
 Condor will run all jobs as user \"nobody\". Leaving it blank will cause
 Condor to run all jobs on this machine as user \"nobody\".
 .
 Any domain format supported by Condor can be used, including macro
 expressions. Example: $(FULL_HOSTNAME)
";
$elem["condor/uiddomain"]["descriptionde"]="Benutzerverzeichnis-Domain-Bezeichnung:
 Diese Bezeichnung ist eine Zeichenkette, welche Condor zur Entscheidung darüber heranzieht, ob eine Übertragungs- und eine Ausführungs-Maschine das selbe Verzeichnis mit Benutzerkonten teilen (ob UID 1000 auf einer Maschine die selbe Person ist wie UID 1000 auf der anderen). Wenn die Bezeichnungen auf den beiden Maschinen übereinstimmen, wird Condor jeden Auftrag unter der UID ausführen, die diesen Auftrag übermittelt hat und E-Mails darüber an Benutzer@DOMAIN verschicken (wobei diese Bezeichnung als Wert für DOMAIN benutzt wird). Falls nicht, wird Condor alle Aufträge als Benutzer »nobody« ausführen. Wenn Sie die Bezeichnung leer lassen, wird Condor alle Aufträge auf dieser Maschine als »nobody« ausführen.
 .
 Jedes von Condor unterstütztes Domain-Format kann verwendet werden, einschließlich Makro-Ausdrücken. Beispiel: $(FULL_HOSTNAME)
";
$elem["condor/uiddomain"]["descriptionfr"]="Ãtiquette de domaine du rÃ©pertoire utilisateurÂ :
 Cette Ã©tiquette est une chaÃ®ne de caractÃ¨res que Condor utilise pour dÃ©cider si une machine qui soumet un travail et une machine qui exÃ©cute le travail partagent le mÃªme rÃ©pertoire d'un compte utilisateur (c'est-Ã -dire si l'UID 1000 d'une machine est la mÃªme personne que l'UID 1000 d'une autre machine). Si les Ã©tiquettes des deux machines correspondent, Condor exÃ©cutera chaque travail sous l'UID qui a soumis le travail et enverra un message Ã©lectronique Ã  l'adresse utilisateur@DOMAINE (en utilisant l'Ã©tiquette comme valeur pour DOMAINE). Dans le cas contraire, Condor exÃ©cutera tous les travaux en tant qu'utilisateur Â«Â nobodyÂ Â». Si vous laissez ce champ vide, Condor exÃ©cutera tous les travaux en tant qu'utilisateur Â«Â nobodyÂ Â».
 .
 Tout format de domaine gÃ©rÃ© par Condor peut Ãªtre utilisÃ© en incluant des macros. ExempleÂ : $(NOM_DHOTE_COMPLET)
";
$elem["condor/uiddomain"]["default"]="";
$elem["condor/filesystemdomain"]["type"]="string";
$elem["condor/filesystemdomain"]["description"]="File system domain label:
 This label is an arbitrary string that is used to decide if a submitting
 machine and an execute machine share the same file system. In a dedicated
 cluster all machines will most likely use a shared file system and hence
 should use the same label. If left blank, it will automatically be set to
 the fully qualified hostname of the local machine, which will prevent
 Condor assuming that any two machines share a file system.
 .
 Example: my_shared_volume
";
$elem["condor/filesystemdomain"]["descriptionde"]="Dateisystem-Domain-Bezeichnung:
 Diese Bezeichnung ist eine beliebige Zeichenkette, die zur Entscheidung herangezogen wird, ob eine Übertragungs-Maschine und eine Ausführungs-Maschine das selbe Dateisystem gemeinsam nutzen. In einem dedizierten Cluster werden alle Maschinen höchstwahrscheinlich auf ein gemeinsames Dateisystem zugreifen und sollten deshalb dieselbe Bezeichnung verwenden. Wenn Sie dies leer lassen, wird es automatisch auf den vollständigen Rechnernamen der lokalen Maschine gesetzt, weswegen Condor nicht annehmen wird, dass irgendein Dateisystem von zwei Maschinen gemeinsam genutzt wird.
 .
 Beispiel: mein_gemeinsam_genutztes_laufwerk
";
$elem["condor/filesystemdomain"]["descriptionfr"]="Ãtiquette de domaine du systÃ¨me de fichiersÂ :
 Cette Ã©tiquette est une chaÃ®ne de caractÃ¨res alÃ©atoire qui est utilisÃ©e pour dÃ©cider si une machine qui soumet un travail et une machine qui exÃ©cute un travail partagent un mÃªme systÃ¨me de fichiers. Dans une grappe dÃ©diÃ©e de machines, il est fort probable que toutes les machines utilisent un systÃ¨me de fichiers partagÃ© et par consÃ©quent elles devraient utiliser la mÃªme Ã©tiquette. Si vous laissez ce champ vide, le nom d'hÃ´te complÃ¨tement qualifiÃ© de la machine locale sera utilisÃ©, ce qui empÃªchera Condor de supposer que des machines prises deux Ã  deux partagent le mÃªme systÃ¨me de fichiers.
 .
 ExempleÂ : mon_volume_partagÃ©
";
$elem["condor/filesystemdomain"]["default"]="";
$elem["condor/personal"]["type"]="boolean";
$elem["condor/personal"]["description"]="Perform a \"Personal Condor installation\"?
 A Personal Condor installation is a fully functional Condor pool on a single
 machine. Condor will automatically configure and advertise as many slots as
 it detects CPU cores on this machine. Condor daemons will not be available
 through external network interfaces.
 .
 This configuration is not appropriate if this machine is intended to be a
 member of a pool.
";
$elem["condor/personal"]["descriptionde"]="»Persönliche Condor-Installation« vornehmen?
 Eine Persönliche Condor-Installation ist ein voll funktionaler Condor-Pool auf einer einzelnen Maschine. Condor wird automatisch so viele Slots konfigurieren und bekanntgeben, wie es CPU-Kerne auf der Maschine vorfinden wird. Die Condor-Daemons werden nicht durch externe Netzwerkschnittstellen erreichbar sein.
 .
 Diese Konfiguration ist ungeeignet, wenn diese Maschine Teil eines Pools werden soll.
";
$elem["condor/personal"]["descriptionfr"]="Faut-il effectuer une Â«Â installation personnelle de CondorÂ Â»Â ?
 Une Â«Â installation personnelle de CondorÂ Â» est un groupement de Condor autonome sur une seule machine. Condor configurera et annoncera automatiquement autant de crÃ©neaux (Â«Â slotsÂ Â») que de cÅurs CPU dÃ©tectÃ©s sur cette machine. Les dÃ©mons de Condor ne seront pas disponibles pour des interfaces rÃ©seau externes.
 .
 Cette configuration n'est pas adaptÃ©e si cette machine est prÃ©vue pour Ãªtre membre d'un groupement.
";
$elem["condor/personal"]["default"]="true";
$elem["condor/reservedmemory"]["type"]="string";
$elem["condor/reservedmemory"]["description"]="Amount of physical memory to withhold from Condor (in MB):
 By default, Condor considers all the physical memory of a machine as
 available to be used by Condor jobs. If this value is defined,
 Condor subtracts it from the amount of memory it advertises as available.
 .
 Example (to reserve 1 GB): 1024
";
$elem["condor/reservedmemory"]["descriptionde"]="Größe des physischen Speichers, der vor Condor freigehalten werden soll (in MB):
 In der Voreinstellung betrachtet Condor den gesamten physischen Speicher als für Condor-Aufträge verfügbar. Wenn dieser Wert definiert wird, zieht Condor ihn von der Speichermenge ab, den es als verfügbar bekanntgibt.
 .
 Beispiel (um ein Gigabyte zu reservieren): 1024
";
$elem["condor/reservedmemory"]["descriptionfr"]="QuantitÃ© de mÃ©moire physique Ã  retenir pour Condor (en Mo)Â :
 Condor considÃ¨re par dÃ©faut que toute la mÃ©moire physique d'une machine est disponible pour les travaux Condor. Si cette valeur est dÃ©finie, elle sera soustraite Ã  la quantitÃ© de mÃ©moire annoncÃ©e comme Ã©tant disponible.
 .
 Exemple pour rÃ©server 1Â GoÂ : 1024
";
$elem["condor/reservedmemory"]["default"]="";
$elem["condor/allowwrite"]["type"]="string";
$elem["condor/allowwrite"]["description"]="Machines with write access to this host:
 All machines that are to participate in the Condor pool need to be listed
 here. This setting can be a plain comma-separated list, a domain with
 wildcards, or a macro expression. By default only localhost is allowed to
 access Condor daemons on this machine.
 .
 Example: *.condor-pool.example.org
";
$elem["condor/allowwrite"]["descriptionde"]="Maschinen mit Schreibzugriff auf diesen Rechner:
 Alle Maschinen, die am Condor-Pool teilnehmen sollen, müssen hier aufgelistet werden. Diese Einstellung kann eine kommaseparierte Liste sein, eine Domain mit Platzhaltern oder ein Makro-Ausdruck. In der Voreinstellung darf nur Localhost auf die Condor-Daemons dieser Maschine zugreifen.
 .
 Beispiel: *.condor-pool.example.org
";
$elem["condor/allowwrite"]["descriptionfr"]="Machines ayant un accÃ¨s en Ã©criture sur cet hÃ´teÂ :
 Toutes les machines qui feront partie d'un groupement Condor doivent Ãªtre indiquÃ©es ici. Ce paramÃ©trage peut Ãªtre une liste simple sÃ©parÃ©e par des virgules, un domaine avec des caractÃ¨res gÃ©nÃ©riques (Â«Â wildcardsÂ Â») ou une macro. Par dÃ©faut seul l'hÃ´te local a la permission d'accÃ©der aux dÃ©mons Condor de cette machine.
 .
 ExempleÂ : *.groupement-condor.example.org
";
$elem["condor/allowwrite"]["default"]="";
$elem["condor/startpolicy"]["type"]="boolean";
$elem["condor/startpolicy"]["description"]="Run Condor jobs regardless of other machine activity?
 By default Condor only starts jobs when a machine is idle, i.e. no keyboard
 activity or CPU load for some time. Moreover, it also suspends jobs whenever
 there is console activity and doesn't continue them until the machine becomes
 idle again. However, for a dedicated compute node or a Personal Condor
 installation it might be desirable to always start jobs as soon as they are
 submitted (given that resources are still available), and to run them
 continuously regardless of other activity on this machine.
 .
 If you plan to compose a custom policy it is best to keep Condor's default
 here.
";
$elem["condor/startpolicy"]["descriptionde"]="Condor-Aufträge ohne Rücksicht auf andere Aktivitäten der Maschine durchführen?
 In der Voreinstellung startet Condor Aufträge nur, wenn die Maschine leerläuft,  d. h. einige Zeit lang keine Tastatureingaben oder CPU-Last auftritt. Außerdem setzt es die Aufträge aus, wenn es Aktivitäten auf der Konsole gibt und bearbeitet sie erst weiter, wenn die Maschine wieder leer läuft. Allerdings kann es für einen dedizierten Rechenknoten oder eine Persönliche Condor-Installation denkbar sein, Aufträge immer zu starten, sobald sie übermittelt wurden (unter der Voraussetzung, dass die Ressourcen immer noch verfügbar sind) und sie ohne Rücksicht auf andere Aktivitäten auf dieser Maschine zu bearbeiten.
 .
 Wenn Sie vorhaben, eine eigene Richtlinie zu erstellen, ist es das Beste, hier Condors Voreinstellungen zu verwenden.
";
$elem["condor/startpolicy"]["descriptionfr"]="Faut-il exÃ©cuter les travaux de Condor malgrÃ© l'activitÃ© des autres machinesÂ ?
 Par dÃ©faut, Condor ne dÃ©marre des travaux que si une machine est inoccupÃ©e, c'est Ã  dire qu'il n'y a aucune activitÃ© du clavier ou de charge du CPU pendant un certain temps. De plus, il suspend un travail quand il dÃ©tecte de l'activitÃ© sur une console et ne continue que quand la machine redevient inoccupÃ©e. Toutefois, pour un nÅud dÃ©diÃ© ou une Â«Â installation personnelle de Condor Â Â», il peut Ãªtre souhaitable de toujours dÃ©buter un travail dÃ¨s que soumis (en supposant que les ressources soient encore disponibles) et de l'exÃ©cuter en continu indiffÃ©remment d'autres activitÃ©s sur cette machine.
 .
 Si vous prÃ©voyez de crÃ©er une politique personnalisÃ©e, il est prÃ©fÃ©rable de conserver la politique par dÃ©faut de Condor ici.
";
$elem["condor/startpolicy"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
