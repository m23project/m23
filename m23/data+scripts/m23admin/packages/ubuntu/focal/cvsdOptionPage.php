<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cvsd");

$elem["cvsd/rootjail"]["type"]="string";
$elem["cvsd/rootjail"]["description"]="Location of chroot jail:
 cvsd can run in a chroot jail. This is the preferred method of
 operation. Specify the location of the chroot jail. If you make this
 'none' no chroot jail will be created and used.
 A chroot file hierarchy will be created in the specified location.
";
$elem["cvsd/rootjail"]["descriptionde"]="Position des Chroot Jail:
 Cvsd kann in einem chrooted Jail laufen. Das ist die Methode der Wahl. Legen Sie einen Ort für das Chroot-Gefängnis fest. Falls Sie »none« sagen, wird kein Chroot-Jail erstellt und benutzt. Eine Chroot-Dateihierarchie wird an dem festgelegten Ort erstellt.
";
$elem["cvsd/rootjail"]["descriptionfr"]="Emplacement de l'environnement fermé d'exécution (« chroot jail ») :
 Cvsd peut s'exécuter dans un environnement fermé. Cette méthode de fonctionnement est conseillée. Veuillez indiquer l'emplacement de l'environnement fermé d'exécution. Si vous indiquez la valeur « none », aucun environnement fermé ne sera créé ni utilisé. Une hiérarchie de fichiers adaptée aux environnement fermés sera créée à l'emplacement indiqué.
";
$elem["cvsd/rootjail"]["default"]="/var/lib/cvsd";
$elem["cvsd/maxconnections"]["type"]="string";
$elem["cvsd/maxconnections"]["description"]="The maximum number of connections that can be handled:
 It is possible to specify a maximum number of connections that cvsd
 can handle simultaneously. Specifying 0 (zero) will put no limit to
 the number of connections.
";
$elem["cvsd/maxconnections"]["descriptionde"]="Höchstzahl der verwalteten Verbindungen:
 Es ist möglich, eine Höchstzahl der Verbindungen anzugeben, die cvsd gleichzeitig verwalten kann. Die Angabe 0 (Null) bedeutet keine Begrenzung für die Anzahl der Verbindungen.
";
$elem["cvsd/maxconnections"]["descriptionfr"]="Nombre maximal de connexions gérées :
 Vous pouvez indiquer un nombre maximal de connexions qui seront gérées simultanément par cvsd. Si vous indiquez une valeur nulle, le nombre de connexions ne sera pas limité.
";
$elem["cvsd/maxconnections"]["default"]="10";
$elem["cvsd/nice"]["type"]="string";
$elem["cvsd/nice"]["description"]="Nice value cvsd should run at:
 cvsd can be run at reduced priority so it will not take up too
 many resources, especially if a user specifies a -z option to cvs.
 The priority can also be increased (negative value here).
";
$elem["cvsd/nice"]["descriptionde"]="Der Nice-Wert mit dem CVSD laufen soll:
 CVSD kann mit verringerter Priorität laufen, so dass es nicht zu viele Ressourcen abfordert, insbesondere falls ein User eine »-z«-Option für CVS festlegt. Die Priorität kann auch erhöht werden (mit einem negativen Wert).
";
$elem["cvsd/nice"]["descriptionfr"]="Valeur de politesse (« nice ») du processus cvsd :
 Il est possible de diminuer la priorité de cvsd afin de ne pas consommer trop de ressources, notamment quand un utilisateur se sert de l'option « -z » de cvs. La priorité peut également être augmentée (indiquez alors une valeur négative).
";
$elem["cvsd/nice"]["default"]="1";
$elem["cvsd/umask"]["type"]="string";
$elem["cvsd/umask"]["description"]="Umask cvsd should run at:
 Specify the umask cvsd and cvs should use when creating files.
 .
 The umask should be specified as an octal value and represents
 the permissions that should be taken away when creating a file
 (e.g. using 027 will create files with mode 640 or rw-r-----).
";
$elem["cvsd/umask"]["descriptionde"]="Umask die CVSD benutzen soll:
 Setzen Sie die umask, die cvsd und cvs benutzen sollen, wenn neue Dateien angelegt werden.
 .
 Die umask sollte als oktaler Wert angegeben werden und die Rechte angeben, die bei den erzeugten Dateien entfernt werden sollen (zum Beispiel hat der Wert 027 bei Dateien den Mode 640 oder rw-r----- zur Folge).
";
$elem["cvsd/umask"]["descriptionfr"]="Masque de création de fichiers (« umask ») utilisé par cvsd :
 Veuillez indiquer le masque de création de fichiers que cvsd et cvs utiliseront.
 .
 Cette valeur doit être indiquée en mode octal et représente les permissions qui sont retirées lors de la création d'un fichier (p. ex., si vous indiquez 027, les fichiers seront créés avec les permissions 640 en octal, soit « rw-r----- »).
";
$elem["cvsd/umask"]["default"]="027";
$elem["cvsd/listen"]["type"]="string";
$elem["cvsd/listen"]["description"]="Address and port on which cvsd will listen:
 With the first argument you can specify the address cvsd should listen on.
 The '*' address specifies that cvsd should listen on all addresses.
 You can specify a IPv4 address, IPv6 address, a hostname or '*'.
 .
 The second argument is the service name (e.g. cvspserver) or port number
 (default 2401) cvsd will listen on.
 .
 The address and port should be separated by a space and you can specify multiple
 address-port combinations by separating them with spaces.
";
$elem["cvsd/listen"]["descriptionde"]="Adresse und Port an dem CVSD lauschen soll:
 Mit dem ersten Argument können Sie die Adresse festlegen, an der CVSD lauschen soll. Die Adresse »*« legt das Lauschen an allen Adressen fest. Sie können eine IPv4- oder IPv6-Adresse, einen Hostnamen oder »*« angeben.
 .
 Das zweite Argument ist der Dienst-Name (z.B. cvspserver) oder die Portnummer (Standard 2401) an der CVSD lauschen soll.
 .
 Adresse und Port sollten mit Leerzeichen abgetrennt werden, es können mehrere Adress-Port-Kombinationen Leerzeichen-separiert angegeben werden.
";
$elem["cvsd/listen"]["descriptionfr"]="Adresse et port d'écoute de cvsd :
 Le premier argument indique l'adresse d'écoute de cvsd. Si vous indiquez « * », le démon sera à l'écoute sur toutes les adresses. Vous pouvez indiquer une adresse IPv4, une adresse IPv6, un nom d'hôte ou « * ».
 .
 Le second argument est le nom du service (p. ex. « cvspserver ») ou le numéro de port (2401 par défaut) où cvsd sera à l'écoute.
 .
 L'adresse et le port doivent être séparés par un espace. Vous pouvez indiquer plusieurs combinaisons d'adresses et de ports en les séparant également par des espaces.
";
$elem["cvsd/listen"]["default"]="* 2401";
$elem["cvsd/repositories"]["type"]="string";
$elem["cvsd/repositories"]["description"]="Repositories to serve:
 The whole idea of cvsd is to serve repositories. Specify a colon ':'
 separated list of repositories to serve. The location of these repositories
 is relative to the specified chroot jail (${rootjail}) and should start with a '/'.
 .
 The repositories here should be initialized by hand with something like
 'cvs -d ${rootjail}/myrepos init' after which passwords can be set with
 'cvsd-passwd ${rootjail}/myrepos anonymous'. See the file
 /usr/share/doc/cvsd/README.gz for details on creating repositories.
";
$elem["cvsd/repositories"]["descriptionde"]="Zu betreuende Repositorys:
 Die gesamte Idee von CVSD ist es, Repositorys zu betreuen. Legen Sie eine Doppelpunkt-separierte Liste von zu betreuenden Repositorys fest. Der Ort dieser Repositorys liegt relativ zum angegebenen Chroot-Jail (${rootjail}) und sollte mit »/« beginnen.
 .
 Die Repositorys hier sollten von Hand durch etwas wie »cvs -d ${rootjail}/myrepos init« initialisiert werden, wonach dann mit »cvsd-passwd ${rootjail}/myrepos anonymous« die Passworte gesetzt werden können. Siehe /usr/share/doc/cvsd/README.gz bezüglich Details zur Erstellung von Repositorys.
";
$elem["cvsd/repositories"]["descriptionfr"]="Dépôts CVS servis :
 L'objectif de cvsd est de mettre à disposition des dépôts CVS. Veuillez indiquer ici les dépôts qui seront accessibles (séparés par un caractère deux-points « : »). L'emplacement de ces dépôts doit être relatif à celui de l'environnement fermé d'exécution (${rootjail}) et doit commencer par le caractère « / ».
 .
 Vous devez vous-même initialiser les dépôts que vous indiquez ici, par exemple avec la commande « cvs -d ${rootjail}/mondépôt init ». Après cela, des mots de passe doivent être établis avec la commande « cvs-passwd ${rootjail}/mondépôt anonymous ». Veuillez consulter le fichier /usr/share/doc/cvsd/README.gz pour plus d'informations sur la création de dépôts.
";
$elem["cvsd/repositories"]["default"]="/demo:/myrepos";
$elem["cvsd/limits"]["type"]="multiselect";
$elem["cvsd/limits"]["choices"][1]="coredumpsize";
$elem["cvsd/limits"]["choices"][2]="cputime";
$elem["cvsd/limits"]["choices"][3]="datasize";
$elem["cvsd/limits"]["choices"][4]="filesize";
$elem["cvsd/limits"]["choices"][5]="memorylocked";
$elem["cvsd/limits"]["choices"][6]="openfiles";
$elem["cvsd/limits"]["choices"][7]="maxproc";
$elem["cvsd/limits"]["choices"][8]="memoryuse";
$elem["cvsd/limits"]["choices"][9]="stacksize";
$elem["cvsd/limits"]["choicesde"][1]="Core-Dump Größe";
$elem["cvsd/limits"]["choicesde"][2]="CPU-Zeit";
$elem["cvsd/limits"]["choicesde"][3]="Größe des Datensegmentes";
$elem["cvsd/limits"]["choicesde"][4]="Dateigröße";
$elem["cvsd/limits"]["choicesde"][5]="Größe des gesperrten Speichers";
$elem["cvsd/limits"]["choicesde"][6]="Anzahl offener Dateien";
$elem["cvsd/limits"]["choicesde"][7]="Anzahl von Prozessen";
$elem["cvsd/limits"]["choicesde"][8]="Größe des Speichers";
$elem["cvsd/limits"]["choicesde"][9]="Stapel-Größe";
$elem["cvsd/limits"]["choicesfr"][1]="Taille des vidages mémoire";
$elem["cvsd/limits"]["choicesfr"][2]="Temps processeur";
$elem["cvsd/limits"]["choicesfr"][3]="Taille du segment de données";
$elem["cvsd/limits"]["choicesfr"][4]="Taille de fichier";
$elem["cvsd/limits"]["choicesfr"][5]="Mémoire verrouillée";
$elem["cvsd/limits"]["choicesfr"][6]="Nombre de fichiers ouverts";
$elem["cvsd/limits"]["choicesfr"][7]="Nombre maximal de processus";
$elem["cvsd/limits"]["choicesfr"][8]="Mémoire résidente utilisée";
$elem["cvsd/limits"]["choicesfr"][9]="Taille de la pile";
$elem["cvsd/limits"]["description"]="Resources of pserver processes to limit:
 The pserver wrapper can be configured to limit the resource usage that
 a pserver process can have. These resource limits will be set on each
 pserver process and not on the wrapper.
 .
 Choose from the list the resources that you want to limit.
 You will be asked to specify limits about every resource you selected here.
 .
 Note that not all resources may be available on all systems and that
 resources may be system and kernel specific so use these with caution.
 The results of exceeding the set limits may also be system specific
 but will most likely stop the cvs process and close the connection
 (may be problematic with write access to cvs repository).
";
$elem["cvsd/limits"]["descriptionde"]="Wählen Sie die zu limitierenden Ressourcen für pserver-Prozesse aus:
 Der pserver-Wrapper kann mit Ressourcen-Limitierung für die pserver-Prozesse konfiguriert werden. Diese Ressourcen-Limitierungen werden auf jeden pserver-Prozess angewendet und nicht auf den Wrapper.
 .
 Wählen Sie die zu limitierenden Ressourcen aus der Liste aus. Sie werden nach den Limits für jede von Ihnen ausgewählte Ressource gefragt.
 .
 Beachten Sie, dass nicht alle Ressourcen auf allen Systemen vorhanden sind und dass Ressourcen System- und Kernel-spezifisch sein können, weshalb Sie mit Vorsicht vorgehen sollten. Die Folgen von Limit-Überschreitungen können ebenfalls System-spezifisch variieren, werden aber höchstwahrscheinlich den CVS-Prozess stoppen und die Verbindung schließen (könnte problematisch bezüglich Schreibzugriffen auf das CVS-Repository sein).
";
$elem["cvsd/limits"]["descriptionfr"]="Ressources des processus pserver à limiter :
 L'enveloppe (« wrapper ») de pserver peut limiter l'utilisation des ressources utilisées par un processus pserver. Ces limites de ressources seront mises en place sur chaque processus pserver, pas sur l'enveloppe elle-même.
 .
 Veuillez choisir les ressources à limiter à partir de la liste. Vous aurez à indiquer des limites pour chaque ressource choisie ici.
 .
 Veuillez noter que toutes ces ressources ne sont pas forcément disponibles sur tous les systèmes, certaines pouvant dépendre du noyau ou du système. Utilisez donc cela avec précaution. Les conséquences d'un dépassement des limites de ressources peuvent également dépendre du système : en général, le processus cvs sera interrompu et la connexion fermée (ce qui peut poser des problèmes s'il s'agit d'un accès en écriture vers le dépôt CVS).
";
$elem["cvsd/limits"]["default"]="";
$elem["cvsd/limit_coredumpsize"]["type"]="string";
$elem["cvsd/limit_coredumpsize"]["description"]="Maximum file size of a core dump:
 Set this to 0 (zero) (should be the system default) to prevent core dumps.
 Otherwise this limits the size of core dumps to the specified value.
 .
 This value may be specified with a suffix of 'b' (bytes), 'k'
 (1024 bytes) or 'm' (1024*1024 bytes), where 'k' is the default.
";
$elem["cvsd/limit_coredumpsize"]["descriptionde"]="Maximale Größe einer Core-Dump-Datei:
 Setzen Sie das auf 0 (Null) (sollte die System-Voreinstellung sein), um Core-Dumps zu verhindern. Ansonsten begrenzt dies die Größe von Core-Dumps auf den festgelegten Wert.
 .
 Dieser Wert kann mit einem Anhängsel von »b« (bytes), »k« (1024 bytes) oder »m« (1024*1024 bytes) festgelegt werden, wobei »k« voreingestellt ist.
";
$elem["cvsd/limit_coredumpsize"]["descriptionfr"]="Taille maximale d'un vidage mémoire (« core dump ») :
 Indiquez une valeur nulle ici (ce qui est usuellement la valeur par défaut du système) pour empêcher les vidages mémoire. Une autre valeur sera la limite maximale de taille d'un vidage mémoire.
 .
 Elle peut être indiquée avec un suffixe « b » (octets), « k » (1024 octets) ou « m » (1024*1024 octets). Le suffixe par défaut est « k ».
";
$elem["cvsd/limit_coredumpsize"]["default"]="0";
$elem["cvsd/limit_cputime"]["type"]="string";
$elem["cvsd/limit_cputime"]["description"]="Maximum amount of cpu time consumed:
 This limits the number of cpu seconds the cvs process can use.
 This will prevent too much cpu time from being allocated to a single connection.
 .
 This value can be formatted as 'mm:ss' or have a 'm' or 's'
 suffix where 's' is default.
";
$elem["cvsd/limit_cputime"]["descriptionde"]="Höchstmenge für verbrauchte CPU-Zeit:
 Dies limitiert die Menge an CPU-Sekunden, die der CVS-Prozess nutzen kann. Das verhindert, dass zu viel CPU-Zeit für eine einzelne Verbindung verbraucht wird.
 .
 Dieser Wert kann als »mm:ss« formatiert werden oder ein »m«- oder »s«-Suffix haben, wobei »s« die Voreinstellung ist.
";
$elem["cvsd/limit_cputime"]["descriptionfr"]="Temps processeur maximal consommé :
 Cette valeur limite le nombre de secondes d'utilisation du processeur par le processus cvs. Cela permet d'éviter d'allouer trop de temps processeur à une connexion donnée.
 .
 Cette valeur peut être indiquée sous la forme « mm:ss » ou avoir un suffixe « m » ou « s ». Le suffixe par défaut est « s ».
";
$elem["cvsd/limit_cputime"]["default"]="1:00";
$elem["cvsd/limit_datasize"]["type"]="string";
$elem["cvsd/limit_datasize"]["description"]="Maximum size of program's data segment:
 This limits the amount of memory the cvs program can use. This
 specific item limits the size of the data segment.
 .
 This value may be specified with a suffix of 'b' (bytes), 'k'
 (1024 bytes) or 'm' (1024*1024 bytes), where 'k' is the default.
";
$elem["cvsd/limit_datasize"]["descriptionde"]="Maximale Größe des Datensegmentes des Programmes:
 Dies limitiert die Menge an Speicher, den das CVS-Programm belegen darf. Dieser spezielle Punkt limitiert die Größe des Datensegmentes.
 .
 Dieser Wert kann mit einem Anhängsel von »b« (bytes), »k« (1024 bytes) oder »m« (1024*1024 bytes) festgelegt werden, wobei »k« voreingestellt ist.
";
$elem["cvsd/limit_datasize"]["descriptionfr"]="Taille maximale du segment de données du programme :
 Cette valeur limite la quantité de mémoire que le programme cvs peut utiliser. Elle limite la taille du segment de données.
 .
 Elle peut être indiquée avec un suffixe « b » (octets), « k » (1024 octets) ou « m » (1024*1024 octets). Le suffixe par défaut est « k ».
";
$elem["cvsd/limit_datasize"]["default"]="10m";
$elem["cvsd/limit_filesize"]["type"]="string";
$elem["cvsd/limit_filesize"]["description"]="Maximum size of files created:
 This limits the maximum size of a file created by cvs.
 Note that the cvs pserver process needs to be able to create
 lock files and possibly write history or other files so
 don't set this to 0 (zero).
 .
 This value may be specified with a suffix of 'b' (bytes), 'k'
 (1024 bytes) or 'm' (1024*1024 bytes), where 'k' is the default.
";
$elem["cvsd/limit_filesize"]["descriptionde"]="Maximal-Größe der erstellten Dateien:
 Dies limitiert die maximale Größe der von CVS erstellten Dateien. Beachten Sie, dass der CVS-pserver-Prozess in der Lage sein muss, Lock-Files und evntl. auch Historys und andere Dateien zu erstellen, so dass Sie den Wert nicht auf 0 (Null) setzen sollten.
 .
 Dieser Wert kann mit einem Anhängsel von »b« (bytes), »k« (1024 bytes) oder »m« (1024*1024 bytes) festgelegt werden, wobei »k« voreingestellt ist.
";
$elem["cvsd/limit_filesize"]["descriptionfr"]="Taille maximale des fichiers créés :
 Cette valeur limite la taille des fichiers créés par cvs. Veuillez noter que le processus pserver de cvs doit pouvoir créer des fichiers de verrouillage et éventuellement des fichiers d'historique ou autres. N'indiquez donc pas une valeur nulle.
 .
 Elle peut être indiquée avec un suffixe « b » (octets), « k » (1024 octets) ou « m » (1024*1024 octets). Le suffixe par défaut est « k ».
";
$elem["cvsd/limit_filesize"]["default"]="1m";
$elem["cvsd/limit_memorylocked"]["type"]="string";
$elem["cvsd/limit_memorylocked"]["description"]="Maximum amount of locked memory:
 This limits the amount of memory the cvs process may lock.
 cvs probably doesn't need to lock any memory at all.
 .
 This value may be specified with a suffix of 'b' (bytes), 'k'
 (1024 bytes) or 'm' (1024*1024 bytes), where 'k' is the default.
";
$elem["cvsd/limit_memorylocked"]["descriptionde"]="Maximal-Menge des gesperrten Speichers:
 Dies limitiert die Menge des Speichers, den der CVS-Prozess sperren kann. CVS muss vermutlich überhaupt keinen Speicher sperren.
 .
 Dieser Wert kann mit einem Anhängsel von »b« (bytes), »k« (1024 bytes) oder »m« (1024*1024 bytes) festgelegt werden, wobei »k« voreingestellt ist.
";
$elem["cvsd/limit_memorylocked"]["descriptionfr"]="Quantité maximale de mémoire verrouillée :
 Cette valeur limite la quantité de mémoire que le processus cvs peut verrouiller. Cvs n'a probablement pas du tout besoin de verrouiller la mémoire.
 .
 Elle peut être indiquée avec un suffixe « b » (octets), « k » (1024 octets) ou « m » (1024*1024 octets). Le suffixe par défaut est « k ».
";
$elem["cvsd/limit_memorylocked"]["default"]="10m";
$elem["cvsd/limit_openfiles"]["type"]="string";
$elem["cvsd/limit_openfiles"]["description"]="Maximum number of open files:
 This limits the number of files and connections that the cvs
 process can have open at a single moment. The cvs process needs
 to access quite a few files so don't set this too low.
";
$elem["cvsd/limit_openfiles"]["descriptionde"]="Maximale Anzahl an offenen Dateien:
 Dies limitiert die Anzahl von Dateien und Verbindungen, die der CVS-Prozess gleichzeitig aufweisen darf. Der CVS-Prozess muss auf einige Dateien zugreifen können, daher setzen Sie das nicht zu niedrig.
";
$elem["cvsd/limit_openfiles"]["descriptionfr"]="Nombre maximal de fichiers ouverts :
 Cette valeur limite le nombre de fichiers et de connexions ouverts simultanément par le processus cvs. Ce processus doit accéder à un nombre non négligeable de fichiers : évitez donc de placer cette limite trop bas.
";
$elem["cvsd/limit_openfiles"]["default"]="1024";
$elem["cvsd/limit_maxproc"]["type"]="string";
$elem["cvsd/limit_maxproc"]["description"]="Maximum number of processes:
 This limits the maximum number of processes that a single user may have.
 cvs may need to spawn additional processes to run scripts or do subtasks
 so don't set this too low.
";
$elem["cvsd/limit_maxproc"]["descriptionde"]="Höchstanzahl von Prozessen:
 Dies begrenzt die Höchstanzahl von Prozessen, die ein einzelner User haben darf. CVS muss eventuell zusätzliche Prozesse erzeugen für Skripte oder Unteraufgaben, daher sollten Sie dies nicht zu niedrig festlegen.
";
$elem["cvsd/limit_maxproc"]["descriptionfr"]="Nombre maximal de processus :
 Cette valeur limite le nombre de processus simultanés d'un utilisateur donné. Cvs doit pouvoir lancer des processus supplémentaires pour exécuter des scripts ou des sous-tâches : ne placez donc pas cette limite trop bas.
";
$elem["cvsd/limit_maxproc"]["default"]="20";
$elem["cvsd/limit_memoryuse"]["type"]="string";
$elem["cvsd/limit_memoryuse"]["description"]="Maximum size of resident memory:
 This specifies the amount of physical memory a process may have.
 .
 This value may be specified with a suffix of 'b' (bytes), 'k'
 (1024 bytes) or 'm' (1024*1024 bytes), where 'k' is the default.
";
$elem["cvsd/limit_memoryuse"]["descriptionde"]="Maximale Größe des besetzten Speichers:
 Dies legt die Menge von physikalischem Speicher fest, die ein Prozess haben darf.
 .
 Dieser Wert kann mit einem Anhängsel von »b« (bytes), »k« (1024 bytes) oder »m« (1024*1024 bytes) festgelegt werden, wobei »k« voreingestellt ist.
";
$elem["cvsd/limit_memoryuse"]["descriptionfr"]="Taille maximale de la mémoire résidente :
 Cette valeur limite la quantité de mémoire physique utilisée par un processus.
 .
 Elle peut être indiquée avec un suffixe « b » (octets), « k » (1024 octets) ou « m » (1024*1024 octets). Le suffixe par défaut est « k ».
";
$elem["cvsd/limit_memoryuse"]["default"]="10m";
$elem["cvsd/limit_stacksize"]["type"]="string";
$elem["cvsd/limit_stacksize"]["description"]="Maximum stack size:
 This limits the size of the stack.
 .
 This value may be specified with a suffix of 'b' (bytes), 'k'
 (1024 bytes) or 'm' (1024*1024 bytes), where 'k' is the default.
";
$elem["cvsd/limit_stacksize"]["descriptionde"]="Maximale Stapel-Größe:
 Dies beschränkt die Größe des Stapels.
 .
 Dieser Wert kann mit einem Anhängsel von »b« (bytes), »k« (1024 bytes) oder »m« (1024*1024 bytes) festgelegt werden, wobei »k« voreingestellt ist.
";
$elem["cvsd/limit_stacksize"]["descriptionfr"]="Taille maximale de pile :
 Cette valeur limite la taille de la pile (« stack »).
 .
 Elle peut être indiquée avec un suffixe « b » (octets), « k » (1024 octets) ou « m » (1024*1024 octets). Le suffixe par défaut est « k ».
";
$elem["cvsd/limit_stacksize"]["default"]="10m";
$elem["cvsd/limit_virtmem"]["type"]="string";
$elem["cvsd/limit_virtmem"]["description"]="Maximum amount of virtual memory allocated:
 This limits the total amount of virtual memory a process may have allocated.
 .
 This value may be specified with a suffix of 'b' (bytes), 'k'
 (1024 bytes) or 'm' (1024*1024 bytes), where 'k' is the default.
";
$elem["cvsd/limit_virtmem"]["descriptionde"]="Maximale Belegung des virtuellen Speichers:
 Dies limitiert die totale Menge des virtuellen Speichers, den ein Prozess belegen darf.
 .
 Dieser Wert kann mit einem Anhängsel von »b« (bytes), »k« (1024 bytes) oder »m« (1024*1024 bytes) festgelegt werden, wobei »k« voreingestellt ist.
";
$elem["cvsd/limit_virtmem"]["descriptionfr"]="Taille maximale de mémoire virtuelle allouée :
 Cette valeur limite la taille de la mémoire virtuelle qui peut être allouée par un processus.
 .
 Elle peut être indiquée avec un suffixe « b » (octets), « k » (1024 octets) ou « m » (1024*1024 octets). Le suffixe par défaut est « k ».
";
$elem["cvsd/limit_virtmem"]["default"]="10m";
$elem["cvsd/limit_pthreads"]["type"]="string";
$elem["cvsd/limit_pthreads"]["description"]="Maximum number of threads:
 This limits the number of threads that a single process may have.
 .
 This is not available under Linux so it is not in the list
 for cvsd/limits. If Hurd has it it may be useful.
";
$elem["cvsd/limit_pthreads"]["descriptionde"]="Maximale Anzahl von Threads:
 Dies beschränkt die Anzahl von Threads die ein einzelner Prozess haben darf.
 .
 Dies steht unter Linux nicht zur Verfügung, daher befindet es sich nicht in der Liste für cvsd/limits. Falls Hurd das hat, kann es brauchbar sein.
";
$elem["cvsd/limit_pthreads"]["descriptionfr"]="Nombre maximal de tâches (« threads ») :
 Cette valeur limite le nombre maximal de tâches d'un processus donné.
 .
 Ce type de limitation n'est pas possible sous Linux. C'est pourquoi elle n'est pas dans la liste de cvsd/limits. Elle est placée ici au cas où elle serait utile pour Hurd.
";
$elem["cvsd/limit_pthreads"]["default"]="20";
$elem["cvsd/remove_chroot"]["type"]="boolean";
$elem["cvsd/remove_chroot"]["description"]="Remove chroot jail containing repositories?
 The following directory is configured as a chroot jail for cvsd:
   ${rootjail}
 You may choose to remove the chroot jail but you will also lose all the
 repositories inside the chroot jail. If you have not backed up your
 repositories you want to keep do not remove it now and manually remove
 it later once your repositories are safe.
 .
 If you do choose to remove the chroot directory, all directories under
 it will be removed, even if they are on another file system.
 .
 If you choose to keep the chroot jail please note that the cvsd user and
 group will be removed so uid and gid file information may no longer be
 consistent.
";
$elem["cvsd/remove_chroot"]["descriptionde"]="Chroot jail mit Repositorys entfernen?
 Das folgende Verzeichnis ist als ein chroot jail für CVSD konfiguriert:
   ${rootjail}
 Sie können das Entfernen des chroot jail veranlassen, werden dabei aber alle darin enthaltenen Repositorys verlieren. Falls Sie noch keine Sicherungs-Kopien der Repositorys angelegt haben, die Sie behalten möchten, sollten Sie chroot jail nicht jetzt sondern später von Hand entfernen, sobald Sie Ihre Repositorys gesichert haben.
 .
 Falls Sie sich zum Entfernen des chroot-Verzeichnisses entschieden haben, werden alle Unterverzeichnisse mitgelöscht, auch wenn diese auf einem anderen Dateisystem liegen.
 .
 Falls Sie sich für den Erhalt des chroot jail entscheiden, beachten Sie bitte, dass der CVSD-User und die CVSD-Gruppe entfernt werden, so dass die UID- und GID-Datei-Attribute nicht mehr konsistent sind.
";
$elem["cvsd/remove_chroot"]["descriptionfr"]="Faut-il supprimer l'environnement fermé contenant les dépôts ?
 Le répertoire suivant est un environnement fermé d'exécution (« chroot jail ») pour cvsd :
  ${rootjail}
 Vous pouvez supprimer l'environnement fermé mais cela supprimera également les dépôts qu'il contient. Si vous n'avez pas sauvegardé vos dépôts, vous pouvez les conserver pour l'instant, puis les supprimer vous-même plus tard une fois qu'ils auront été sauvegardés.
 .
 Si vous choisissez de supprimer l'environnement fermé, tous les répertoires qu'il contient seront supprimés, même s'ils sont situés sur un autre système de fichiers.
 .
 Si vous choisissez de conserver l'environnement fermé, veuillez noter que l'utilisateur et le groupe cvsd seront malgré tout supprimés : les informations de groupe et d'utilisateur propriétaires des fichiers deviendront alors incohérentes.
";
$elem["cvsd/remove_chroot"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
