<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("localepurge");

$elem["localepurge/nopurge"]["type"]="multiselect";
$elem["localepurge/nopurge"]["description"]="Locale files to keep on this system:
 The localepurge package will remove all locale files from the system
 except those that you select here.
 .
 When selecting the locale corresponding to your language and country
 code (such as \"de_DE\", \"de_CH\", \"it_IT\", etc.) it is recommended to
 choose the two-character entry (\"de\", \"it\", etc.) as well.
 .
 Entries from /etc/locale.gen will be preselected
 if no prior configuration has been successfully completed.
";
$elem["localepurge/nopurge"]["descriptionde"]="Locale-Dateien, die auf diesem System verbleiben:
 Das Paket »localepurge« wird alle Locale-Dateien außer denen, die Sie hier auswählen, vom System entfernen.
 .
 Beim Auswählen der zu Ihrer Sprache und Ihrem Ländercode gehörenden Locale (wie etwa »de_DE«, »de_CH«, »it_IT« etc.) empfiehlt es sich, auch den Zwei-Buchstaben-Eintrag (»de«, »it« etc.) zu wählen.
 .
 Einträge aus /etc/locale.gen werden vorausgewählt, falls noch keine frühere Konfiguration erfolgreich abgeschlossen wurde.
";
$elem["localepurge/nopurge"]["descriptionfr"]="Paramètres régionaux à garder sur ce système :
 Le paquet localepurge supprimera du système tous les fichiers de paramètres régionaux (« locales ») à l'exception de ceux choisis ici.
 .
 Si vous choisissez des paramètres régionaux comportant à la fois une mention de langue et de pays (tels que « fr_FR » ou « de_DE », etc.), il est recommandé de choisir également l'entrée comportant la mention de la langue seule (comme « fr » ou « de »).
 .
 Les entrées mentionnées dans /etc/locale.gen sont présélectionnées si aucune configuration n'a déjà été réalisée.
";
$elem["localepurge/nopurge"]["default"]="";
$elem["localepurge/use-dpkg-feature"]["type"]="boolean";
$elem["localepurge/use-dpkg-feature"]["description"]="Use dpkg --path-exclude?
 dpkg supports --path-exclude and --path-include options to filter files
 from packages being installed.
 .
 Please see /usr/share/doc/localepurge/README.dpkg-path for more
 information about this feature. It can be enabled (or disabled)
 later by running \"dpkg-reconfigure localepurge\".
 .
 This option will become active for packages
 unpacked after localepurge has been (re)configured. Packages
 installed or upgraded together with localepurge may (or may not) be
 subject to the previous configuration of localepurge.
";
$elem["localepurge/use-dpkg-feature"]["descriptionde"]="Benutze dpkg --path-exclude?
 »dpkg« unterstützt die Optionen --path-exclude und --path-include, um Dateien aus installierten Paketen zu filtern.
 .
 Siehe /usr/share/doc/localepurge/README.dpkg-path für weitere Informationen zu dieser Funktionalität. Es kann mittels »dpkg-reconfigure localepurge« nachträglich aktiviert (oder deaktiviert) werden.
 .
 Diese Option wird für Pakete aktiv, die nach der (erneuten) Konfiguration von Localepurge entpackt werden. Pakete, deren Installation oder Upgrade zusammen mit Localepurge erfolgt, könnten der vorherigen Konfiguration von Localepurge unterliegen (oder nicht).
";
$elem["localepurge/use-dpkg-feature"]["descriptionfr"]="Faut-il utiliser « dpkg --path-exclude » ?
 Le programme dpkg gère les options --path-exclude et --path-include pour filtrer les fichiers à installer quand des paquets sont installés.
 .
 Veuillez consulter le fichier /usr/share/doc/localepurge/README.dpkg-path pour plus d'informations sur cette fonctionnalité. Elle peut être activée ou désactivée ultérieurement avec la commande « dpkg-reconfigure localepurge ».
 .
 Cette option ne sera active que pour les paquets installés après la (re)configuration de localepurge. Les paquets installés ou mis à jour en même temps que localepurge peuvent, selon les cas, être affectés ou non par la configuration antérieure de localepurge.
";
$elem["localepurge/use-dpkg-feature"]["default"]="true";
$elem["localepurge/none_selected"]["type"]="boolean";
$elem["localepurge/none_selected"]["description"]="Really remove all locales?
 No locale has been chosen for being kept. This means that all locales will be
 removed from this system. Please confirm whether this is really your
 intent.
";
$elem["localepurge/none_selected"]["descriptionde"]="Wirklich alle Locales entfernen?
 Es sollen keine Locales behalten werden. Das bedeutet, dass alle Locales von diesem System entfernt werden. Bitte bestätigen Sie, dass Sie das wirklich wollen.
";
$elem["localepurge/none_selected"]["descriptionfr"]="Faut-il vraiment supprimer tous les paramètres régionaux ?
 Vous avez choisi de ne pas garder de fichier de paramètres régionaux. Cela signifie que tous les fichiers seront supprimés du système. Veuillez confirmer cette action.
";
$elem["localepurge/none_selected"]["default"]="false";
$elem["localepurge/remove_no"]["type"]="note";
$elem["localepurge/remove_no"]["description"]="No localepurge action until the package is configured
 The localepurge package will not be useful until it has been successfully
 configured using the command \"dpkg-reconfigure localepurge\". The
 configured entries from /etc/locale.gen of the locales package will then
 be automatically preselected.
";
$elem["localepurge/remove_no"]["descriptionde"]="Keine Aktionen von Localepurge, bis das Paket konfiguriert ist
 Das Paket »localepurge« ist nicht nützlich, bis es erfolgreich mit dem Befehl »dpkg-reconfigure localepurge« eingerichtet worden ist. Die konfigurierten Einträge aus /etc/locale.gen des Pakets »locales« werden dann automatisch vorausgewählt.
";
$elem["localepurge/remove_no"]["descriptionfr"]="Pas d'action de localepurge tant que le paquet n'est pas configuré
 Localepurge ne fera rien tant qu'il n'aura pas été correctement configuré avec la commande « dpkg-reconfigure localepurge ». Les entrées configurées dans /etc/locale.gen par le paquet locales seront alors automatiquement présélectionnées.
";
$elem["localepurge/remove_no"]["default"]="";
$elem["localepurge/mandelete"]["type"]="boolean";
$elem["localepurge/mandelete"]["description"]="Also delete localized man pages?
 Based on the same locale information you chose, localepurge can also
 delete localized man pages.
";
$elem["localepurge/mandelete"]["descriptionde"]="Übersetzte Handbuchseiten auch löschen?
 Aufgrund der von Ihnen ausgewählten Landeskennung kann Localepurge auch übersetzte Handbuchseiten entfernen.
";
$elem["localepurge/mandelete"]["descriptionfr"]="Faut-il aussi supprimer les traductions des pages de manuel ?
 À partir des choix que vous venez d'effectuer, localepurge peut également supprimer les traductions des pages de manuel.
";
$elem["localepurge/mandelete"]["default"]="true";
$elem["localepurge/dontbothernew"]["type"]="boolean";
$elem["localepurge/dontbothernew"]["description"]="Inform about new locales?
 If you choose this option, you will be given the opportunity
 to decide whether to keep or delete newly introduced locales.
 .
 If you don't choose it, newly introduced locales will be
 automatically dropped from the system.
";
$elem["localepurge/dontbothernew"]["descriptionde"]="Neue Locales melden?
 Wenn Sie diese Option wählen, werden Sie die Möglichkeit erhalten, zu entscheiden, ob neu eingeführte Locales behalten oder gelöscht werden sollen.
 .
 Wenn Sie sie nicht wählen, werden neu eingeführte Locales vom System automatisch entfernt.
";
$elem["localepurge/dontbothernew"]["descriptionfr"]="Souhaitez-vous être informé de nouveaux paramètres régionaux ?
 Si vous choisissez cette option, vous aurez la possibilité de choisir de conserver les fichiers de paramètres régionaux ajoutés dans le futur.
 .
 Dans le cas contraire, les nouveaux fichiers de paramètres régionaux seront effacés automatiquement du système.
";
$elem["localepurge/dontbothernew"]["default"]="false";
$elem["localepurge/showfreedspace"]["type"]="boolean";
$elem["localepurge/showfreedspace"]["description"]="Display freed disk space?
 The localepurge program can display the disk space freed by each
 operation, and show a final summary of saved disk space.
";
$elem["localepurge/showfreedspace"]["descriptionde"]="Freigewordenen Festplattenplatz anzeigen?
 Das Programm Localepurge kann den freigewordenen Festplattenplatz bei jeder Operation sowie eine abschließende Zusammenfassung der gesparten Speicherkapazitäten anzeigen.
";
$elem["localepurge/showfreedspace"]["descriptionfr"]="Faut-il afficher l'espace disque libéré ?
 Le programme localepurge peut calculer et afficher l'espace disque libéré par ses actions, puis afficher un résumé rapide de l'espace récupéré avant de se terminer.
";
$elem["localepurge/showfreedspace"]["default"]="true";
$elem["localepurge/quickndirtycalc"]["type"]="boolean";
$elem["localepurge/quickndirtycalc"]["description"]="Accurate disk space calculation?
 There are two ways available to calculate freed disk space. One is
 much faster than the other but far less accurate if other changes occur
 on the file system during disk space calculation. The other one is more
 accurate but slower.
";
$elem["localepurge/quickndirtycalc"]["descriptionde"]="Genaue Berechnung des Festplattenplatzes?
 Es gibt zwei Arten, den freigewordenen Festplattenplatz zu berechnen. Die eine ist viel schneller als die andere, aber deutlich ungenauer, falls während der Berechnung weitere Änderungen am Dateisystem stattfinden. Die zweite Methode ist genauer, aber langsamer.
";
$elem["localepurge/quickndirtycalc"]["descriptionfr"]="Faut-il utiliser une méthode de calcul précise ?
 Deux méthodes de calcul de l'espace disque libéré sont possibles. L'une est plus rapide mais moins précise que l'autre dans le cas où d'autres modifications ont lieu sur le disque pendant le calcul. La méthode précise est le choix par défaut.
";
$elem["localepurge/quickndirtycalc"]["default"]="true";
$elem["localepurge/verbose"]["type"]="boolean";
$elem["localepurge/verbose"]["description"]="Display verbose output?
 The localepurge program can be configured to explicitly show which
 locale files it deletes. This may cause a lot of screen output.
";
$elem["localepurge/verbose"]["descriptionde"]="Ausführliche Ausgaben anzeigen?
 Das Programm Localepurge kann so eingerichtet werden, dass es explizit anzeigt, welche Locale-Dateien es löscht. Dies könnte viele Bildschirmausgaben nach sich ziehen.
";
$elem["localepurge/verbose"]["descriptionfr"]="Faut-il utiliser un affichage détaillé ?
 Le programme localepurge peut être configuré pour afficher chaque ensemble de paramètres régionaux qu'il supprime. Cela peut générer l'affichage de nombreux messages.
";
$elem["localepurge/verbose"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
