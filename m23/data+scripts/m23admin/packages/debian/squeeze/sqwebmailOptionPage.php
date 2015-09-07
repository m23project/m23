<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sqwebmail");

$elem["sqwebmail/calendarmode"]["type"]="select";
$elem["sqwebmail/calendarmode"]["choices"][1]="local";
$elem["sqwebmail/calendarmode"]["choices"][2]="net";
$elem["sqwebmail/calendarmode"]["choicesde"][1]="Lokal";
$elem["sqwebmail/calendarmode"]["choicesde"][2]="Netzwerk";
$elem["sqwebmail/calendarmode"]["choicesfr"][1]="Local";
$elem["sqwebmail/calendarmode"]["choicesfr"][2]="Réseau";
$elem["sqwebmail/calendarmode"]["description"]="Calendaring mode:
 Please specify if you would like to enable calendaring in 'local' mode,
 enable groupware or 'net' mode or disable it.
 The courier-pcp package is required to use the groupware mode.
 .
 Local mode adds very little overhead over a disabled calendaring
 mode. On the other hand, groupware mode is less resources-friendly and
 requires a separate daemon process to be run.
 .
 For more information, please refer to /usr/share/doc/sqwebmail/PCP.html.
";
$elem["sqwebmail/calendarmode"]["descriptionde"]="Kalenderfunktion:
 Bitte wählen Sie, ob Sie die Kalenderfunktion im Lokal-Modus, im Groupware-Modus oder im Netzwerk-Modus aktivieren oder ob Sie die Kalenderfunktion überhaupt nicht verwenden möchten (»Deaktiviert«). Zur Verwendung des Groupware-Modus' wird das Paket courier-pcp benötigt.
 .
 Der Lokal-Modus erzeugt sehr wenig Overhead im Vergleich zur deaktiverten Kalenderfunktion. Der Groupware-Modus jedoch ist weniger ressourcen-freundlich und benötigt einen eigenen Daemon-Prozess.
 .
 Für mehr Informationen lesen Sie bitte /usr/share/doc/sqwebmail/PCP.html.
";
$elem["sqwebmail/calendarmode"]["descriptionfr"]="Mode de gestion du calendrier (« Calendaring ») :
 Veuillez indiquer si vous souhaitez activer la gestion de calendrier en mode local, en mode travail de groupe (choisissez alors « Réseau ») ou la désactiver. Pour pouvoir utiliser le mode de travail de groupe, vous devez installer le paquet courier-pcp.
 .
 Le mode local est relativement peu coûteux en ressources par rapport au fonctionnement sans gestion de calendrier. Par contre, le mode travail de groupe utilise nettement plus les ressources du serveur et utilise un processus en tâche de fond lancé séparément.
 .
 Veuillez consulter le fichier /usr/share/doc/sqwebmail/PCP.html pour plus d'informations.
";
$elem["sqwebmail/calendarmode"]["default"]="local";
$elem["sqwebmail/dictionary"]["type"]="select";
$elem["sqwebmail/dictionary"]["description"]="Ispell dictionary:
 SqWebMail allows you to spellcheck your emails. Please select an
 appropriate dictionary for ispell.
";
$elem["sqwebmail/dictionary"]["descriptionde"]="Ispell-Wörterbuch:
 SqWebMail ermöglicht eine Rechtschreibprüfung der E-Mails. Bitte wählen Sie ein passendes Wörterbuch aus.
";
$elem["sqwebmail/dictionary"]["descriptionfr"]="Dictionnaire pour ispell :
 SqWebMail permet la vérification orthographique des courriels. Veuillez choisir le dictionnaire qu'utilisera ispell.
";
$elem["sqwebmail/dictionary"]["default"]="default";
$elem["sqwebmail/install-www"]["type"]="select";
$elem["sqwebmail/install-www"]["choices"][1]="symlink";
$elem["sqwebmail/install-www"]["choices"][2]="copy";
$elem["sqwebmail/install-www"]["choicesde"][1]="Symbolischer Link";
$elem["sqwebmail/install-www"]["choicesde"][2]="Kopie";
$elem["sqwebmail/install-www"]["choicesfr"][1]="Lien symbolique";
$elem["sqwebmail/install-www"]["choicesfr"][2]="Copie";
$elem["sqwebmail/install-www"]["description"]="Installation method for HTML documents and images:
 The HTML documents and images in /usr/share/sqwebmail can be made
 accessible at /var/www/sqwebmail via a symbolic link; or by being
 copied directly into a directory there; or not at all.
 .
 The 'copy' option is recommended for security reasons. However, if
 'FollowSymLinks' or 'SymLinksIfOwnerMatch' are already enabled in
 Apache configuration, the first option can be considered. The last
 option needs manual actions to configure the web server.
 .
 Please note that /var/www/sqwebmail will be removed if this package is
 purged unless the 'custom' option is chosen.
";
$elem["sqwebmail/install-www"]["descriptionde"]="Installationsmethode für HTML-Dokumente und Grafiken:
 Die HTML-Dokumente und Grafiken in /usr/share/sqwebmail können über einen symbolischen Link in /var/www/sqwebmail verfügbar gemacht werden oder indem sie direkt in ein Verzeichnis dort kopiert werden; Sie können sie jetzt auch überhaupt nicht verfügbar machen.
 .
 Die Auswahl »Kopie« ist aus Sicherheitsgründen empfehlenswert. Falls jedoch »FollowSymLinks« oder »SymLinksIfOwnerMatch« in der Apache-Konfiguration bereits aktiviert ist, könnte auch die erste Möglichkeit in Betracht kommen. Die letzte Option erfordert manuelles Eingreifen zur Konfiguration des Web-Servers.
 .
 Bitte beachten Sie, dass /var/www/sqwebmail gelöscht wird, wenn dieses Paket später einmal komplett entfernt wird (außer wenn Sie jetzt »Benutzerdefiniert« wählen).
";
$elem["sqwebmail/install-www"]["descriptionfr"]="Méthode d'installation des documents et images HTML :
 Les documents HTML et les images placés dans /usr/share/sqwebmail peut être rendus accessibles via un lien symbolique /var/www/sqwebmail, copiés à cet emplacement ou ne pas être accessibles du tout.
 .
 L'option « Copie » est recommandée pour des raisons de sécurité. Cependant si les options « FollowSymLinks » ou « SymLinksIfOwnerMatch » sont activées dans la configuration d'Apache, l'option « Lien symbolique » peut être choisie. La dernière option impose une configuration manuelle du serveur web.
 .
 Veuillez noter que /var/www/sqwebmail sera supprimé si le paquet est purgé, sauf si l'option « custom » est choisie.
";
$elem["sqwebmail/install-www"]["default"]="symlink";
$elem["sqwebmail/install-www-backup"]["type"]="string";
$elem["sqwebmail/install-www-backup"]["description"]="for internal use

";
$elem["sqwebmail/install-www-backup"]["descriptionde"]="";
$elem["sqwebmail/install-www-backup"]["descriptionfr"]="";
$elem["sqwebmail/install-www-backup"]["default"]="";
PKG_OptionPageTail2($elem);
?>
