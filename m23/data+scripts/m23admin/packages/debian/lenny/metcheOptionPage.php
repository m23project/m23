<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("metche");

$elem["metche/email"]["type"]="string";
$elem["metche/email"]["description"]="E-mail address receiving metche reports:
 metche monitors \"system state\" changes.  An hour after the last change has
 been recorded an e-mail report is sent describing changes made to:
  - files inside the watched directory (/etc by default),
  - user maintainted changelog file(s) (if configured to do so),
  - the list of installed Debian packages (if configured to do so).
 .
 Please enter the e-mail that should receive these reports.  It typically
 corresponds to the alias or mailing-list used by system administrators for
 this computer.
 .
 Note: by default, metche does not send detailed diffs describing file
 changes as this can leak confidential information.  If you want to use
 this feature, you are strongly encouraged to turn on GPG encryption at the
 same time. See the metche(8) man page and the configuration file for more
 details.
";
$elem["metche/email"]["descriptionde"]="E-Mail-Adresse, unter der Metche-Berichte empfangen werden:
 Metche überwacht Änderungen des »Systemzustandes«. Eine Stunde, nachdem die letzte Änderung aufgezeichnet wurde, wird ein Bericht per E-Mail versandt, der die folgenden Änderungen beschreibt:
  - Dateien innerhalb überwachter Verzeichnisse (standardmäßig /etc)
  - benutzerverwaltete Changelog-Datei(en) (falls entsprechend konfiguriert)
  - die Liste der installierten Debian-Pakete (falls entsprechend konfiguriert)
 .
 Bitte geben Sie die E-Mail-Adresse ein, unter der diese Berichte empfangen werden sollen. Diese ist typischerweise der Alias oder die Mailingliste, die vom Administrator für diesen Computer verwendet wird.
 .
 Hinweis: Standardmäßig verschickt Metche keine detaillierten Diffs, die die Dateiänderungen beschreiben, da hierbei vertrauliche Informationen bekannt werden könnten. Falls Sie die Funktionalität benutzen möchten, wird Ihnen nachdrücklich empfohlen, ebenfalls GPG-Verschlüsselung zu aktivieren. Lesen Sie die Handbuchseite von metche(8) und die Konfigurationsdatei für weitere Details.
";
$elem["metche/email"]["descriptionfr"]="Adresse électronique qui recevra les rapports de metche :
 Metche surveille les changements d'« état système ». Une heure après l'enregistrement du dernier changement, un rapport est envoyé par courriel ; il décrit les modifications :
  - des fichiers dans les répertoires surveillés (/etc par défaut) ;
  - des journaux de modifications (« changelog ») gérés par
    l'utilisateur (si configuré ainsi) ;
  - de la liste des paquets Debian installés (si configuré ainsi).
 .
 Veuillez indiquer l'adresse électronique qui recevra ces rapports. Cela correspond généralement à l'alias ou à la liste de diffusion utilisé par les administrateurs de cette machine.
 .
 Note : par défaut, metche n'envoie pas de détail des différences entre les versions successives des fichiers puisque des informations confidentielles peuvent en être tirées. Si vous voulez utiliser cette fonctionnalité, l'utilisation simultanée du chiffrement GPG est vivement recommandée. Veuillez consulter la page de manuel metche(8) et le fichier de configuration pour plus de détails.
";
$elem["metche/email"]["default"]="root@localhost";
$elem["metche/changelog/type"]["type"]="select";
$elem["metche/changelog/type"]["choices"][1]="Single changelog file";
$elem["metche/changelog/type"]["choices"][2]="Multiple changelog files";
$elem["metche/changelog/type"]["choicesde"][1]="Einzelne Changelog-Datei";
$elem["metche/changelog/type"]["choicesde"][2]="Mehrere Changelog-Dateien";
$elem["metche/changelog/type"]["choicesfr"][1]="Journal de modifications unique";
$elem["metche/changelog/type"]["choicesfr"][2]="Journaux de modifications multiples";
$elem["metche/changelog/type"]["description"]="Changelog monitoring type:
 metche can monitor one or more changelogs written by the system
 administrators.
 .
 These changelogs should contain comments describing the changes made to
 the system.  The easiest way to organize these comments is to put them all
 together in one file.
 .
 Another possibility is to have a subdirectory for each administrative task
 with a file named \"Changelog\".  This way, you can store source code or
 configuration examples along with the documentation on how they have been
 used.
";
$elem["metche/changelog/type"]["descriptionde"]="Arten der Changelog-Überwachung
 Metche kann eine oder mehrere vom Systemadministrator geschriebene Changelogs überwachen.
 .
 Diese Changelogs sollten Kommentare enthalten, die die durchgeführten Änderungen am System beschreiben. Die einfachste Art, diese Kommentare zu organisieren, besteht darin, sie alle in eine einzige Datei zu schreiben.
 .
 Eine andere Möglichkeit besteht darin, für jede administrative Aufgabe ein Unterverzeichnis mit einer Datei »Changelog« anzulegen. Auf diese Art können Sie Quellcode oder Konfigurationsbeispiele zusammen mit der Dokumentation, wie diese benutzt wurden, ablegen.
";
$elem["metche/changelog/type"]["descriptionfr"]="Type de surveillance de journal de modifications :
 Metche peut surveiller un ou plusieurs journaux de modifications maintenus par les administrateurs système.
 .
 Ces journaux de modifications devraient contenir des commentaires décrivant les modifications appliquées au système. Le plus simple pour organiser ces commentaires est de tous les rassembler en un seul fichier.
 .
 Une autre possibilité est d'avoir un sous-répertoire pour chaque tâche administrative, avec un fichier « Changelog ». De cette manière, vous pouvez conserver du code source ou des exemples de configuration en même temps que la documentation concernant leur utilisation.
";
$elem["metche/changelog/type"]["default"]="Single changelog file";
$elem["metche/changelog/file"]["type"]="string";
$elem["metche/changelog/file"]["description"]="Changelog file to be monitored:
 This option sets the path of the changelog file to be monitored.
";
$elem["metche/changelog/file"]["descriptionde"]="Changelog-Datei, die überwacht werden soll:
 Diese Option stellt den Pfad zu der zu überwachenden Changelog-Datei ein.
";
$elem["metche/changelog/file"]["descriptionfr"]="Journal de modifications à surveiller :
 Cette option spécifie le chemin du journal de modifications à surveiller.
";
$elem["metche/changelog/file"]["default"]="/root/Changelog";
$elem["metche/changelog/directory"]["type"]="string";
$elem["metche/changelog/directory"]["description"]="Changelog directory to be monitored:
 This option sets the path to the root directory containing the Changelogs.
 Each \"Changelog\" file should be in a sub-directory of this directory.
";
$elem["metche/changelog/directory"]["descriptionde"]="Changelog-Verzeichnis, das überwacht werden soll:
 Diese Option stellt den Pfad zu dem Wurzelverzeichnis ein, das die Changelogs enthält. Jede »Changelog«-Datei sollte in einem Unterverzeichnis dieses Verzeichnisses liegen.
";
$elem["metche/changelog/directory"]["descriptionfr"]="Répertoire de journaux de modifications à surveiller :
 Cette option spécifie le chemin du répertoire principal contenant les journaux de modifications. Chaque fichier « Changelog » devrait se situer dans un sous-répertoire de ce répertoire.
";
$elem["metche/changelog/directory"]["default"]="/root/changelogs";
PKG_OptionPageTail2($elem);
?>
