<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("muse");

$elem["muse/muse-setuid"]["type"]="boolean";
$elem["muse/muse-setuid"]["description"]="Do you want MusE to run with superuser rights?
 For good timing, MusE needs to set the real time clock (/dev/rtc) to a
 higher clock rate, and raise its scheduling priority. Usually, only the
 root user is allowed to do so. MusE can be installed \"suid-root\", so
 that it always runs with superuser capabilities. This is convenient, but
 programming errors in MusE likely present a hazard for system security in
 this setup.
 .
 File /usr/share/doc/muse/README.Debian summarizes several more secure
 methods to meet the timing requirements, but they all require manual
 configuration.
 .
 If you intend to use MusE for timing-sensitive recordings, and security
 is of no concern on this computer, opt for the suid-root installation
 by giving an affirmative answer to this question. Deny if unsure.
";
$elem["muse/muse-setuid"]["descriptionde"]="Soll MusE mit Administratorrechten laufen?
 Für bestes Timing muss MusE einige Systemeinstellungen verändern, die für gewöhnlich nur dem Administrator zugänglich sind. MusE kann \"suid-root\" installiert werden und läuft dann stets mit Administratorrechten. Das ist bequem, aber Programmierfehler in MusE gefährden dann die Sicherheit des gesamten Systems.
 .
 Es gibt auch mehrere sichere Methoden, um die Timinganforderungen zu erfüllen. Sie sind in der Datei /usr/share/doc/muse/README.Debian zusammengefasst, müssen jedoch alle noch von Hand konfiguriert werden.
 .
 Wenn Sie MusE für Timing-kritische Aufnahmen einsetzen wollen und Sicherheitsbedenken auf diesem Computer keine Rolle spielen, dann sollten Sie die suid-root-Installation wählen, indem Sie diese Frage bejahen. Nein ist die sichere Antwort.
";
$elem["muse/muse-setuid"]["descriptionfr"]="Faut-il lancer MusE avec les privilèges du superutilisateur ?
 Pour une bonne synchronisation, MusE doit augmenter la fréquence de l'horloge temps réel (/dev/rtc) ainsi que sa priorité. En général, seul le superutilisateur possède les autorisations nécessaires. MusE peut être installé avec le bit suid positionné, pour s'exécuter avec les privilèges du superutilisateur. Ce choix est pratique, mais pourrait compromettre la sécurité de ce système.
 .
 Le fichier /usr/share/doc/muse/README.Debian indique différentes méthodes plus sûres pour répondre aux fortes contraintes de temps, mais elles nécessitent toutes une configuration manuelle.
 .
 Si vous souhaitez utiliser MusE pour des enregistrements à fortes contraintes de temps, et si la sécurité n'est pas importante sur ce système, choisissez l'installation avec les privilèges du superutilisateur. Dans le doute, ne la choisissez pas.
";
$elem["muse/muse-setuid"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
