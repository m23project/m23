<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("greylistd");

$elem["greylistd/restartexim"]["type"]="boolean";
$elem["greylistd/restartexim"]["description"]="Restart Exim after adding it to the greylist group?
 You are using Exim 4 as your Mail Transport Agent (MTA).  Great!
 .
 The \"Debian-exim\" user will be added to the \"greylist\" group, so that the
 Exim daemon process can talk to greylistd.  However, for this change to
 take effect, the process must also be restarted.
";
$elem["greylistd/restartexim"]["descriptionde"]="Exim nach dem Hinzufügen zu der Greylist-Gruppe neu starten?
 Sie verwenden Exim 4 als Ihr »Mail Transport Agent« (MTA). Super!
 .
 Der »Debian-exim«-Benutzer wird zu der »greylist«-Gruppe hinzugefügt, so dass der Exim-Daemon-Prozess direkt mit Greylistd sprechen kann. Damit diese Änderung allerdings in Kraft treten kann, muss der Prozess auch neu gestartet werden.
";
$elem["greylistd/restartexim"]["descriptionfr"]="Faut-il redémarrer Exim après l'avoir ajouté au groupe « greylist » ?
 Votre agent de transport du courrier (« MTA : Mail Transport Agent ») est Exim4.
 .
 L'utilisateur « Debian-exim » va être ajouté au group « greylist » afin de permettre au démon Exim de dialoguer avec greylistd. Cependant, pour que ces changements soient effectifs, il faut aussi le redémarrer.
";
$elem["greylistd/restartexim"]["default"]="true";
$elem["greylistd/autoconfig_notdone_exim4"]["type"]="note";
$elem["greylistd/autoconfig_notdone_exim4"]["description"]="Exim 4 needs additional configuration
 For greylisting to become effective, your Mail Transport Agent (MTA) needs
 to talk to greylistd while receiving incoming mail; and depending on the
 response, issue a temporary rejection (451 SMTP code) to the remote host.
 .
 Since you are using Exim 4 as your MTA, a script is available for you to
 perform this task.  At a root prompt, type:
  # greylistd-setup-exim4 add
 If you overwrite your Exim configuration files in the future (for
 instance, when upgrading Exim), you may need to re-run this command.
 .
 Later, before you uninstall \"greylistd\", you want to run:
  # greylistd-setup-exim4 remove
 .
 For more options and help on usage, run the command without any arguments,
 or see the \"greylistd-setup-exim4(8)\" manual page.  One suggested option
 for the \"add\" command is \"-netmask=24\".
 .
 The reason this operation is not performed automatically is that Exim's
 configuration files are tagged as \"conffiles\", so per Debian Policy they
 are completely under your control.  Only you can change them.
 .
 If you prefer to configure Exim 4 for greylistd by hand, please see
 /usr/share/doc/greylistd/README.Debian.
";
$elem["greylistd/autoconfig_notdone_exim4"]["descriptionde"]="Exim 4 benötigt zusätzliche Konfiguration
 Damit das Greylisting effektiv wird, muss Ihr »Mail Transport Agent« (MTA) während des Empfangs eingehender E-Mail mit Greylistd sprechen; und abhängig von der Antwort eine vorübergehende Ablehnung (SMTP-Code 451) an den entfernten Rechner senden.
 .
 Da Sie Exim 4 als Ihren MTA verwenden, ist ein Skript für Sie vorhanden, dass diese Aufgabe erledigt. Tippen Sie an einer Eingabeaufforderung für root folgendes ein:
  # greylistd-setup-exim4 add
 Falls Sie in der Zukunft Ihre Exim-Konfigurationsdateien überschreiben (zum Beispiel, wenn Sie ein Upgrade von Exim durchführen), müssen Sie eventuell diesen Befehl erneut ausführen.
 .
 Später, bevor Sie »greylistd« deinstallieren, sollten Sie folgendes ausführen:
  # greylistd-setup-exim4 remove
 .
 Für weitere Optionen und Benutzungshilfe führen Sie den Befehl ohne Argumente aus oder lesen Sie die »greylistd-setup-exim4(8)«-Handbuchseite. Eine empfohlene Option für das »add«-Kommando ist »-netmask=24«.
 .
 Der Grund, dass diese Operation nicht automatisch durchgeführt wird ist der, dass Exims Konfigurationsdateien als »conffiles« markiert sind, so dass sie laut den Debian-Richtlinien komplett Ihrer Kontrolle unterliegen. Nur Sie können sie ändern.
 .
 Falls Sie die Konfiguration von Exim 4 für Greylistd per Hand bevorzugen, lesen Sie bitte /usr/share/doc/greylistd/README.Debian.
";
$elem["greylistd/autoconfig_notdone_exim4"]["descriptionfr"]="Configuration supplémentaire nécessaire pour Exim4
 Pour que la gestion des listes grises (« greylists ») soit effective, votre agent de transport du courriel (MTA) doit échanger des informations avec greylistd lorsqu'il reçoit du courrier entrant. Selon la réponse obtenue, il pourra envoyer une notification de rejet temporaire à l'hôte distant (code SMTP 451).
 .
 Puisque vous utilisez Exim4, un script est disponible pour vous permettre de réaliser cela. Á l'invite du superutilisateur (root), utilisez la commande suivante :
  # greylistd-setup-exim4 add
 Si, par la suite, vous modifiez vos fichiers de configuration d'Exim (par exemple lors d'une mise à niveau d'Exim), vous devrez de nouveau lancer cette commande.
 .
 Plus tard, avant de désinstaller « greylistd », vous devrez utiliser la commande :
  # greylistd-setup-exim4 remove
 .
 Pour obtenir davantage d'informations sur les options disponibles ou d'aide sur l'utilisation de cette commande, lancez-la sans aucun argument ou consultez la page de manuel « greylistd-setup-exim4(8) ». Il est suggéré d'utiliser l'option « -netmask=24 » avec la commande « add ».
 .
 Cette opération n'est pas faite automatiquement parce que les fichiers de configuration d'Exim sont marqués comme étant des fichiers de configuration, ce qui, selon la charte Debian, interdit à un autre paquet de les modifier.
 .
 Si vous préférez configurer vous-même Exim4 pour l'utilisation de greylistd, veuillez consulter /usr/share/doc/greylistd/README.Debian.
";
$elem["greylistd/autoconfig_notdone_exim4"]["default"]="";
$elem["greylistd/autoconfig_notdone"]["type"]="note";
$elem["greylistd/autoconfig_notdone"]["description"]="Your MTA needs additional configuration
 For greylisting to become effective, two things must happen:
  - Your Mail Transport Agent (MTA) needs to talk to greylistd while
    receiving incoming mail, and depending on the response, issue a
    temporary rejection (451 SMTP response) to the remote host.
  - The account under which your MTA runs needs to be added to the
    \"greylist\" group.  After this, your MTA needs to be restarted.
 .
 Unfortunately, this package supports only Debian's default Exim 4
 configuration.  Since you seem to be using a different MTA, have a look at
 the greylistd(8) manual page for some information on communicating with
 greylistd.
 .
 There may also be other greylisting solutions available that suit your MTA
 better; see the \"Links\" section at:
    http://projects.puremagic.com/greylisting/
";
$elem["greylistd/autoconfig_notdone"]["descriptionde"]="Ihr MTA benötigt zusätzliche Konfiguration
 Damit Greylisting effektiv wird, müssen zwei Dinge geschehen:
  - Ihr »Mail Transport Agent« (MTA) muss mit Greylistd während des
    Empfangs von E-Mail sprechen, und abhängig von der Antwort eine
    vorübergehende Ablehnung (SMTP-Antwort 451) an den entfernten
    Rechner ausstellen.
  - Das Konto, unter dem Ihr MTA läuft, muss zu der »greylist«-Gruppe
    hinzugefügt werden. Danach muss Ihr MTA neu gestartet werden.
 .
 Unglücklicherweise unterstützt dieses Paket nur Debians Exim 4 Standardkonfiguration. Da es scheint, dass Sie einen anderen MTA verwenden, schauen Sie in die greylistd(8)-Handbuchseite, um einige Informationen zu der Kommunikation mit Greylistd zu erhalten.
 .
 Es könnte auch andere Greylisting-Lösungen geben, die für Ihren MTA besser passen; lesen Sie den »Links«-Abschnitt auf:
    http://projects.puremagic.com/greylisting/
";
$elem["greylistd/autoconfig_notdone"]["descriptionfr"]="Configuration supplémentaire nécessaire de votre MTA
 Pour mettre en service les listes grises (« greylists »), deux conditions doivent être remplies :
  - Votre agent de transport du courriel (MTA) doit échanger des
    informations avec le démon greylistd lorsqu'il reçoit un nouveau
    courriel et, selon la réponse, il doit émettre une notification de
    rejet temporaire à destination de l'hôte distant (réponse SMTP 451) ;
  - Le compte sous lequel votre MTA s'exécute doit être ajouté au
    groupe « greylist » et il doit être redémarré.
 .
 Ce paquet ne gère automatiquement que la configuration d'Exim4, le MTA par défaut de Debian. Comme vous utilisez un autre MTA, veuillez consulter la page de manuel greylistd(8) afin d'obtenir des informations sur la manière de communiquer avec greylistd.
 .
 Il existe peut-être d'autres solutions de gestion des listes grises qui pourraient être plus adaptées à votre MTA ; voir la section « Links » à l'adresse http://projects.puremagic.com/greylisting/.
";
$elem["greylistd/autoconfig_notdone"]["default"]="";
PKG_OptionPageTail2($elem);
?>
