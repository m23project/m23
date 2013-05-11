<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mdadm");

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
$elem["mdadm/boot_degraded"]["type"]="boolean";
$elem["mdadm/boot_degraded"]["description"]="Do you want to boot your system if your RAID becomes degraded?
 If your root filesystem is on a RAID, and a disk is missing at boot, it can
 either boot with the degraded array, or hold the system at a recovery shell.
 .
 Running a system with a degraded RAID could result in permanent data loss
 if it suffers another hardware fault.
 .
 If you do not have access to the server console to use the recovery shell,
 you might answer \"yes\" to enable the system to boot unattended.

";
$elem["mdadm/boot_degraded"]["descriptionde"]="";
$elem["mdadm/boot_degraded"]["descriptionfr"]="";
$elem["mdadm/boot_degraded"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
