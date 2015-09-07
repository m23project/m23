<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mdadm");

$elem["mdadm/initrdstart"]["type"]="string";
$elem["mdadm/initrdstart"]["description"]="MD arrays needed for the root file system:
 ${msg}
 .
 Please enter 'all', 'none', or a space-separated list of devices such as
 'md0 md1' or 'md/1 md/d0' (the leading '/dev/' can be omitted).
";
$elem["mdadm/initrdstart"]["descriptionde"]="Für das Wurzeldateisystem benötigte MD folgende Verbünde:
 ${msg}
 .
 Bitte geben Sie »all«, »none« oder eine leerzeichenseparierte Geräteliste wie zum Beispiel »md0 md1« oder »md/1 md/d0« ein (das führende »/dev« kann weggelassen werden).
";
$elem["mdadm/initrdstart"]["descriptionfr"]="Ensembles MD requis par le système de fichiers racine :
 ${msg}
 .
 Veuillez indiquer « all », « none » ou une liste de périphériques, séparés par des espaces, par exemple, « md0 md1 » ou « md/1 md/d0 » (vous pouvez omettre « /dev/ »).
";
$elem["mdadm/initrdstart"]["default"]="all";
$elem["mdadm/initrdstart_msg_intro"]["type"]="text";
$elem["mdadm/initrdstart_msg_intro"]["description"]="for internal use - only the long description is needed.
 If the system's root file system is located on an MD array (RAID), it needs to be
 started early during the boot sequence. If it is located on
 a logical volume (LVM), which is on MD, all constituent arrays need to be
 started.
 .
 If you know exactly which arrays are needed to bring up the root file system,
 and you want to postpone starting all other arrays to a later point in the
 boot sequence, enter the arrays to start here. Alternatively, enter 'all' to
 simply start all available arrays.
 .
 If you do not need or want to start any arrays for the root file system, leave
 the answer blank (or enter 'none'). This may be the case if you are using
 kernel autostart or do not need any arrays to boot.
";
$elem["mdadm/initrdstart_msg_intro"]["descriptionde"]="für internen Gebrauch - es wird nur die ausführliche Beschreibung benötigt.
 Wenn das Wurzeldateisystem Ihres Systems auf einem MD-Verbund (RAID) liegt, muss es frühzeitig während des Bootvorgangs gestartet werden. Wenn sich Ihr Wurzeldateisystem auf einem logischen Laufwerk (LVM) befindet, das sich wiederum auf einem MD Verbund befindet, müssen alle zugehörigen Verbünde gestartet werden.
 .
 Wenn Sie genau wissen, welche Verbünde benötigt werden, um das Wurzeldateisystem zu starten, und Sie den Start der anderen Verbünde auf einen späteren Zeitpunkt in der Bootreihenfolge verschieben wollen, geben Sie die zu startenden Verbünde hier ein. Alternativ geben Sie »all« ein, um alle verfügbaren Verbünde zu starten.
 .
 Falls Sie keine RAID-Verbünde für das Wurzeldateisystem benötigen oder starten wollen, lassen Sie die Antwort leer (oder geben »none« ein). Dies könnte der Fall sein, wenn Sie entweder die Autostartfunktion des Kernels verwenden oder keine Verbünde zum Booten benötigen.
";
$elem["mdadm/initrdstart_msg_intro"]["descriptionfr"]="Pour une utilisation interne - seule la description longue est nécessaire
 Si le système de fichiers racine se trouve sur un ensemble MD (RAID), il doit être lancé au début de la procédure de démarrage. Si le système de fichiers racine se trouve sur un volume logique (« LVM »), qui se trouve aussi sur un volume MD, tous les composants de l'ensemble doivent être démarrés.
 .
 Si vous savez exactement quels sont les ensembles RAID nécessaires au démarrage du système de fichiers racine et si vous souhaitez différer le démarrage de tous les autres ensembles, veuillez les indiquer ici. Vous pouvez aussi indiquer « all » pour démarrer tous les ensembles existants.
 .
 Si vous n'avez pas besoin ou ne souhaitez pas démarrer d'ensemble RAID pour le système de fichiers racine, veuillez laissez l'entrée vide (ou entrez « none »). Ceci peut être le cas si vous utilisez l'option de démarrage automatique (« autostart ») du noyau ou si vous n'avez besoin d'aucun ensemble pour démarrer.
";
$elem["mdadm/initrdstart_msg_intro"]["default"]="";
$elem["mdadm/initrdstart_msg_errexist"]["type"]="text";
$elem["mdadm/initrdstart_msg_errexist"]["description"]="Description:
 An error occurred: device node does not exist
";
$elem["mdadm/initrdstart_msg_errexist"]["descriptionde"]="Description-de.UTF-8:
 Ein Fehler ist aufgetreten: Geräteknoten existiert nicht
";
$elem["mdadm/initrdstart_msg_errexist"]["descriptionfr"]="Description-fr.UTF-8:
 Erreur : périphérique inconnu
";
$elem["mdadm/initrdstart_msg_errexist"]["default"]="";
$elem["mdadm/initrdstart_msg_errblock"]["type"]="text";
$elem["mdadm/initrdstart_msg_errblock"]["description"]="Description:
 An error occurred: not a block device
";
$elem["mdadm/initrdstart_msg_errblock"]["descriptionde"]="Description-de.UTF-8:
 Ein Fehler ist aufgetreten: kein Blockgerät
";
$elem["mdadm/initrdstart_msg_errblock"]["descriptionfr"]="Description-fr.UTF-8:
 Erreur : ce n'est pas un périphérique en mode bloc
";
$elem["mdadm/initrdstart_msg_errblock"]["default"]="";
$elem["mdadm/initrdstart_msg_errmd"]["type"]="text";
$elem["mdadm/initrdstart_msg_errmd"]["description"]="Description:
 An error occurred: not an MD array
";
$elem["mdadm/initrdstart_msg_errmd"]["descriptionde"]="Description-de.UTF-8:
 Ein Fehler ist aufgetreten: kein RAID-Verbund
";
$elem["mdadm/initrdstart_msg_errmd"]["descriptionfr"]="Description-fr.UTF-8:
 Erreur : ce n'est pas un ensemble RAID
";
$elem["mdadm/initrdstart_msg_errmd"]["default"]="";
$elem["mdadm/initrdstart_msg_errconf"]["type"]="text";
$elem["mdadm/initrdstart_msg_errconf"]["description"]="Description:
 An error occurred: array not listed in mdadm.conf file
";
$elem["mdadm/initrdstart_msg_errconf"]["descriptionde"]="Description-de.UTF-8:
 Ein Fehler ist aufgetreten: Verbund nicht in der Datei mdadm.conf aufgeführt
";
$elem["mdadm/initrdstart_msg_errconf"]["descriptionfr"]="Description-fr.UTF-8:
 Erreur : ensemble non mentionné dans le fichier mdadm.conf
";
$elem["mdadm/initrdstart_msg_errconf"]["default"]="";
$elem["mdadm/initrdstart_notinconf"]["type"]="boolean";
$elem["mdadm/initrdstart_notinconf"]["description"]="Start arrays not listed in mdadm.conf?
 The specified array (${array}) is not listed in the configuration
 file (${config}). Therefore, it cannot be started during boot, unless you
 correct the configuration file and recreate the initial ramdisk.
 .
 Please refer to /usr/share/doc/mdadm/README.upgrading-2.5.3.gz if you intend
 to continue.
 .
 This warning is only relevant if you need arrays to be started from the
 initial ramdisk to be able to boot. If you use kernel autostarting, or do not
 need any arrays to be started as early as the initial ramdisk is loaded, you
 can simply continue. Alternatively, choose not to continue and enter 'none'
 when prompted which arrays to start from the initial ramdisk.
";
$elem["mdadm/initrdstart_notinconf"]["descriptionde"]="Nicht in mdadm.conf aufgeführte Verbünde starten?
 Der angegebene Verbund (${array}) ist in der Konfigurationsdatei ${config} nicht aufgeführt. Deshalb kann er während des Bootvorgangs nicht gestartet werden, es sei denn, Sie korrigieren die Konfigurationsdatei und erzeugen die initiale Ramdisk neu.
 .
 Bitte lesen Sie /usr/share/doc/mdadm/README.upgrading-2.5.3.gz falls Sie beabsichtigen fortzufahren.
 .
 Diese Warnung ist nur von Bedeutung, wenn Sie RAID-Verbünde, die von der initialen Ramdisk gestartet werden, benötigen, um booten zu können. Falls Sie die Autostartfunktion des Kernels verwenden oder kein RAID-Verbund zum frühen Zeitpunkt des Ladens der initialen Ramdisk gestartet werden muss, können Sie einfach fortfahren. Alternativ wählen Sie, nicht fortzufahren und geben »none« ein, wenn Sie gefragt werden, welche RAID-Verbünde von der initialen Ramdisk gestartet werden sollen.
";
$elem["mdadm/initrdstart_notinconf"]["descriptionfr"]="Faut-il démarrer les ensembles RAID non mentionnés dans mdadm.conf ?
 L'ensemble (${array}) que vous avez spécifié n'est pas mentionné dans le fichier de configuration ${config}. Il ne sera donc pas démarré à moins que vous corrigiez le fichier de configuration et que vous génériez de nouveau le disque mémoire initial (« ramdisk »).
 .
 Veuillez consulter /usr/share/doc/mdadm/README.upgrading-2.5.3.gz si vous souhaitez continuer.
 .
 Cet avertissement n'a de signification que si des ensembles RAID doivent être lancés à partir du disque mémoire initial afin de pouvoir démarrer le système. Si vous utilisez le démarrage automatique par le noyau, ou si vous n'avez pas besoin de lancer d'ensemble RAID depuis le disque mémoire initial, vous pouvez simplement poursuivre. Vous pouvez aussi choisir de ne pas poursuivre et entrer « none » lorsqu'il vous sera demandé le nom des ensembles RAID à démarrer à partir du disque mémoire initial.
";
$elem["mdadm/initrdstart_notinconf"]["default"]="false";
$elem["mdadm/autostart"]["type"]="boolean";
$elem["mdadm/autostart"]["description"]="Do you want to start MD arrays automatically?
 Once the base system has booted, mdadm can start all MD arrays
 (RAIDs) specified in /etc/mdadm/mdadm.conf which have not yet been
 started. This is recommended unless multiple device (MD) support is
 compiled into the kernel and all partitions are marked as belonging
 to MD arrays, with type 0xfd (as those and only those will be started
 automatically by the kernel).
";
$elem["mdadm/autostart"]["descriptionde"]="Möchten Sie die RAID-Verbünde automatisch starten?
 Sobald das Grundsystem hochgefahren ist, kann mdadm alle in /etc/mdadm/mdadm.conf angegebenen MD-Verbünde (RAID) starten, die noch nicht gestartet wurden. Dies ist empfohlen, es sei denn, die MD-Unterstützung wurde in den Kernel einkompiliert und alle Partitionen, die zu MD-Verbünden gehören, wurden mit dem Typ 0xfd markiert (weil diese und nur diese automatisch vom Kernel gestartet werden).
";
$elem["mdadm/autostart"]["descriptionfr"]="Faut-il démarrer automatiquement les ensembles RAID ?
 Lorsque le système de base a démarré, mdadm peut démarrer tous les ensembles (RAID) indiqués dans /etc/mdadm/mdadm.conf qui n'ont pas encore été démarrés. Cela est recommandé, sauf si la gestion MD a été compilée dans le noyau et que toutes les partitions faisant partie d'un ensemble RAID ont été marquées avec le type 0xfd (car seul ce type de partition sera démarré automatiquement par le noyau).
";
$elem["mdadm/autostart"]["default"]="true";
$elem["mdadm/autocheck"]["type"]="boolean";
$elem["mdadm/autocheck"]["description"]="Should mdadm run monthly redundancy checks of the MD arrays?
 If the kernel supports it (versions greater than 2.6.14), mdadm can periodically check the
 redundancy of MD arrays (RAIDs). This may be a resource-intensive process,
 depending on the local setup, but it could help prevent rare cases of data loss.
 Note that this is a read-only check unless errors are found; if errors are
 found, mdadm will try to correct them, which may result in write access to
 the media.
 .
 The default, if turned on, is to check on the first Sunday of every
 month at 01:06.
";
$elem["mdadm/autocheck"]["descriptionde"]="Soll mdadm monatlich die Redundanzüberprüfung auf den RAID-Verbünden ausführen?
 Falls Ihr Kernel es unterstützt (Versionen größer als 2.6.14) kann mdadm regelmäßig die Redundanz Ihrer MD-Verbünde (RAID) überprüfen. Dies kann abhängig von Ihrer Installation ein resourcenintensiver Vorgang sein, der aber helfen kann, seltene Fälle von Datenverlust zu vermeiden. Bitte beachten Sie, dass diese Überprüfung nur lesend erfolgt, solange keine Fehler gefunden werden. Falls Fehler gefunden werden, wird mdadm versuchen, diese zu beheben, was zu schreibendem Zugriff auf das Medium führen kann.
 .
 Die Voreinstellung ist, falls eingeschaltet, die Überprüfung am ersten Sonntag jedes Monats um 01:06 Uhr durchzuführen.
";
$elem["mdadm/autocheck"]["descriptionfr"]="Faut-il vérifier chaque mois la redondance des ensembles RAID ?
 Si le noyau le gère (à partir de la version 2.6.14), mdadm peut vérifier périodiquement la redondance des ensembles RAID. Cette action peut demander beaucoup de ressources selon la configuration, mais cela aide à prévenir les rares cas de pertes de données. Notez que ce test est réalisé en lecture seule à moins que des erreurs ne soient rencontrées. Si des erreurs sont détectées, mdadm essayera de les corriger, ce qui entraînera des écritures sur le média.
 .
 Par défaut, la vérification s'effectuera tous les premiers dimanche du mois à 01 h 06.
";
$elem["mdadm/autocheck"]["default"]="true";
$elem["mdadm/start_daemon"]["type"]="boolean";
$elem["mdadm/start_daemon"]["description"]="Do you want to start the MD monitoring daemon?
 The MD (RAID) monitor daemon sends email notifications in response to
 important MD events (such as a disk failure).
 .
 Enabling this option is recommended.
";
$elem["mdadm/start_daemon"]["descriptionde"]="Möchten Sie den RAID-Überwachungsdämon starten?
 Der MD- (RAID-)Überwachungsdämon verschickt Benachrichtigungen als Reaktion auf wichtige RAID-Ereignisse (wie zum Beispiel Festplattenfehler).
 .
 Das Aktivieren dieser Option ist empfohlen.
";
$elem["mdadm/start_daemon"]["descriptionfr"]="Faut-il démarrer le démon de surveillance MD ?
 Le démon de surveillance MD envoie des notifications par courriel lors d'importants événements MD (comme une panne de disque dur).
 .
 Il est recommandé d'activer cette option.
";
$elem["mdadm/start_daemon"]["default"]="true";
$elem["mdadm/mail_to"]["type"]="string";
$elem["mdadm/mail_to"]["description"]="Recipient for email notifications:
 Please enter the email address of the user who should get the email
 notifications for important MD events.
";
$elem["mdadm/mail_to"]["descriptionde"]="Empfänger der E-Mail-Benachrichtungen:
 Geben Sie bitte die E-Mail-Adresse des Benutzers an, der die E-Mail-Benachrichtigung für wichtigen MD-Ereignisse erhalten soll.
";
$elem["mdadm/mail_to"]["descriptionfr"]="Destinataire des notifications par courriel :
 Veuillez indiquer l'adresse électronique de l'utilisateur qui doit recevoir les notifications lors d'importants événements MD.
";
$elem["mdadm/mail_to"]["default"]="root";
PKG_OptionPageTail2($elem);
?>
