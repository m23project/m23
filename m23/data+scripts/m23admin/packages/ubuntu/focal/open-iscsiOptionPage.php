<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("open-iscsi");

$elem["open-iscsi/remove_even_with_active_sessions"]["type"]="boolean";
$elem["open-iscsi/remove_even_with_active_sessions"]["description"]="Proceed with removing open-iscsi?
 There are currently active iSCSI sessions. If you remove open-iscsi
 now this may lead to data loss and/or hang the system at shutdown.
 .
 Do not do this if this system's root filesystem is on iSCSI.
 .
 If you do proceed, open-iscsi will try to unmount all filesystems on
 iSCSI and log out from current sessions. If that fails (because a
 filesystem is still in use), the kernel will keep the current
 iSCSI sessions open, but will not perform any recovery if there is an
 interruption of the network connection (or if the target is rebooted).
 .
 If you really intend to remove open-iscsi, you should abort here and
 then stop open-iscsi:
 .
   service open-iscsi stop
 .
 If that did not clean up everything, manually umount all filesystems
 that are on iSCSI, manually dismantle the storage stack, and only then
 log out from all iSCSI sessions:
 .
   iscsiadm -m node --logoutall=all
 .
 At that point, it should be safe to remove this package.
";
$elem["open-iscsi/remove_even_with_active_sessions"]["descriptionde"]="Soll das Entfernen von Open-iscsi fortgesetzt werden?
 Zur Zeit bestehen aktive iSCSI-Sitzungen. Falls Sie Open-iscsi nun entfernen, kann dies zu Datenverlust und/oder zum Absturz des Systems beim Herunterfahren führen.
 .
 Unterlassen Sie dies, wenn das Wurzeldateisystem des Systems auf iSCSI liegt.
 .
 Falls Sie fortfahren, wird Open-iscsi versuchen, alle Dateisysteme auf iSCSI auszuhängen und sich aus aktuellen Sitzungen abzumelden. Falls dies fehlschlägt (weil ein Dateisystem immer noch benutzt wird), wird der Kernel die aktuelle iSCSI-Sitzung geöffnet halten. Er wird allerdings keine Wiederherstellung durchführen, falls es zu einer Unterbrechung der Netzwerkverbindung kommt (oder wenn das Ziel neu gestartet wird).
 .
 Falls sie wirklich beabsichtigen, Open-iscsi zu entfernen, sollten Sie hier abbrechen und dann Open-iscsi stoppen:
 .
   service open-iscsi stop
 .
 Falls dadurch nicht alles aufgeräumt wurde, hängen Sie alle Dateisysteme, die auf iSCSI liegen, manuell aus. Lösen Sie den Verbund aus Speicherobjekten manuell auf und melden Sie sich von allen iSCSI-Sitzungen ab:
 .
   iscsiadm -m node --logoutall=all
 .
 Danach sollten Sie dieses Paket gefahrlos entfernen können.
";
$elem["open-iscsi/remove_even_with_active_sessions"]["descriptionfr"]="Faut-il vraiment supprimer open-iscsi ?
 Des sessions iSCSI sont actuellement actives. Si vous supprimez open-iscsi maintenant, cela peut entraîner des pertes de données ou bloquer le système durant son arrêt.
 .
 Vous ne devriez pas supprimer open-iscsi si le système de fichiers racine est basé sur iSCSI.
 .
 Si vous continuez, open-iscsi essaiera de démonter tous les systèmes de fichiers basés sur iSCSI et interrompra toutes les sessions en cours. Si cela échoue (à cause d'un système de fichiers toujours utilisé), le noyau conservera ouvertes les sessions iSCSI courantes, mais n'effectuera aucune récupération si une coupure de la connexion réseau se produit (ou si la cible est redémarrée).
 .
 Si vous souhaitez réellement supprimer open-iscsi, vous devriez abandonner maintenant pour arrêter open-iscsi :
 .
   service open-iscsi stop
 .
 Si cela ne nettoie pas tout, veuillez démonter manuellement tous les systèmes de fichiers basés sur iSCSI, déconnecter la pile de stockage, et, seulement après, vous déconnecter de toutes les sessions iSCSI :
 .
   iscsiadm -m node --logoutall=all
 .
 Ensuite seulement, vous pourrez supprimer ce paquet en toute sécurité.
";
$elem["open-iscsi/remove_even_with_active_sessions"]["default"]="";
$elem["open-iscsi/upgrade_even_with_failed_sessions"]["type"]="boolean";
$elem["open-iscsi/upgrade_even_with_failed_sessions"]["description"]="Proceed with upgrading open-iscsi?
 There are currently failed iSCSI sessions. Upgrading open-iscsi may
 cause data loss.
 .
 If you do not proceed, the preinstallation script will be aborted and
 you will have the option to manually recover the iSCSI sessions. (Note
 that aborting an upgrade is problematic if you are dist-upgrading your
 entire system.) You may also recover the iSCSI sessions manually while
 keeping this prompt open and then choose to proceed. Or you may choose
 to proceed directly, after which iscsid will be restarted and session
 recovery will be attempted once more.
";
$elem["open-iscsi/upgrade_even_with_failed_sessions"]["descriptionde"]="Soll das Upgrade von Open-iscsi fortgesetzt werden?
 Derzeit gibt es fehlgeschlagene iSCSI-Sitzungen. Das Upgrade von Open-iscsi kann zu Datenverlust führen.
 .
 Falls Sie nicht fortfahren, wird das Vorinstallationsskript abgebrochen und Sie haben die Möglichkeit, die iSCSI-Sitzungen manuell wiederherzustellen. (Beachten Sie, dass der Abbruch eines Upgrades problematisch ist, falls Sie ein Dist-Upgrade Ihres kompletten Systems durchführen.) Sie können die iSCSI-Sitzungen auch manuell wiederherzustellen, während Sie diese Abfrage offen lassen und danach erst fortfahren. Oder Sie können direkt fortfahren, wodurch Iscsid neu gestartet und die Sitzungswiederherstellung noch einmal versucht wird.
";
$elem["open-iscsi/upgrade_even_with_failed_sessions"]["descriptionfr"]="Faut-il vraiment mettre à jour open-iscsi ?
 Des sessions échouées iSCSI existent actuellement. Mettre à jour open-iscsi peut conduire à des pertes de données.
 .
 Si vous ne continuez pas, le script de pré-installation sera annulé et vous aurez la possibilité de restaurer manuellement les sessions iSCSI. Veuillez noter que l'abandon d'une procédure de mise à jour peut poser problème si vous mettez à jour le système dans sa globalité. Vous pourrez également restaurer les sessions manuellement tout en conservant cette question ouverte et ensuite choisir de continuer. Ou bien, vous pourrez choisir de poursuivre directement après qu'iscsid soit redémarré, et la restauration des sessions sera alors tentée une fois de plus.
";
$elem["open-iscsi/upgrade_even_with_failed_sessions"]["default"]="";
$elem["open-iscsi/upgrade_recovery_error"]["type"]="error";
$elem["open-iscsi/upgrade_recovery_error"]["description"]="iSCSI recovery error on upgrade
 The iscsid daemon was restarted, but couldn't recover all iSCSI sessions.
 This is bad and could lead to data loss. Please check the system and kernel
 logs to determine the cause of the issue.
 .
 Please do not acknowledge this note until you have fixed the problem
 from a separate login shell.
";
$elem["open-iscsi/upgrade_recovery_error"]["descriptionde"]="iSCSI-Wiederherstellungsfehler beim Upgrade
 Der Iscsi-Daemon wurde neu gestartet, konnte jedoch nicht alle iSCSI-Sitzungen wiederherstellen. Dies ist schlecht und könnte zu Datenverlust führen. Bitte prüfen Sie die System- und Kernelprotokolle, um die Ursache des Problems zu bestimmen.
 .
 Bitte bestätigen Sie diese Notiz nicht, bevor Sie das Problem in einer separaten Anmelde-Shell behoben haben.
";
$elem["open-iscsi/upgrade_recovery_error"]["descriptionfr"]="Erreur de restauration iSCSI lors de la mise à jour
 Le démon iscsid a été redémarré, mais n'a pas pu restaurer les sessions iSCSI. Cela pourrait conduire à une perte de données. Veuillez vérifier les journaux du noyau et du système pour déterminer la cause du problème.
 .
 Veuillez ne pas acquitter ce message tant que vous n'avez pas réglé le problème depuis une autre console.
";
$elem["open-iscsi/upgrade_recovery_error"]["default"]="";
$elem["open-iscsi/downgrade_and_break_system"]["type"]="boolean";
$elem["open-iscsi/downgrade_and_break_system"]["description"]="Proceed with downgrading open-iscsi?
 You are trying to downgrade open-iscsi. Because of changes between the
 version you are downgrading to and the version currently installed,
 this downgrade will break the system.
 .
 If you really intend to downgrade, please follow the following procedure
 instead: umount all iSCSI file systems, log out of all iSCSI sessions,
 back up /etc/iscsi, purge open-iscsi, and reinstall the older version.
";
$elem["open-iscsi/downgrade_and_break_system"]["descriptionde"]="Soll das Downgrade von Open-iscsi fortgesetzt werden?
 Sie versuchen, ein Downgrade von Open-iscsi durchzuführen. Aufgrund der Änderungen zwischen der Version, auf die Sie das Downgrade durchführen und der derzeit installierten Version, wird dieses Downgrade das System beschädigen.
 .
 Falls Sie wirklich beabsichtigen, ein Downgrade von Open-iscsi durchzuführen, gehen Sie stattdessen wie folgt vor: Hängen Sie alle iSCSI-Dateisysteme aus, melden Sie sich von allen iSCSI-Sitzungen ab, sichern Sie /etc/iscsi, entfernen Sie Open-iscsi vollständig (purge) und installieren Sie die ältere Version erneut.
";
$elem["open-iscsi/downgrade_and_break_system"]["descriptionfr"]="Faut-il vraiment revenir à une version antérieure d'open-iscsi ?
 Vous tentez d'installer une version antérieure d'open-iscsi. À cause des changements entre la version plus ancienne que vous tentez d'installer et la version actuellement installée, cette opération rendra le système inopérant.
 .
 Si vous avez réellement l'intention de revenir à une version antérieure, veuillez plutôt suivre la procédure suivante : démontez tous les systèmes de fichiers basés sur iSCSI, fermez toutes les sessions iSCSI, sauvegardez /etc/iscsi, purgez open-iscsi, et réinstallez l'ancienne version.
";
$elem["open-iscsi/downgrade_and_break_system"]["default"]="";
PKG_OptionPageTail2($elem);
?>
