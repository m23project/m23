<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("localepurge");

$elem["localepurge/nopurge"]["type"]="multiselect";
$elem["localepurge/nopurge"]["description"]="Selecting locale files
 localepurge will remove all locale files from your system but the ones for
 the language codes you select now. Usually two character locales like \"de\"
 or \"pt\" rather than \"de_DE\" or \"pt_BR\" contain the major portion of
 localizations. So please select both for best support of your national
 language settings.  The entries from /etc/locale.gen will be preselected
 if no prior configuration has been successfully completed.
";
$elem["localepurge/nopurge"]["descriptionde"]="Locale-Dateien auswählen:
 Localepurge entfernt alle Locale-Dateien von Ihrem System, außer jenen, deren Länderkennung Sie hier auswählen. Normalerweise enthalten die zweibuchstabigen Locales wie \"de\" oder \"pt\" anstelle von \"de_DE\" oder \"pt_BR\" den Hauptanteil der Lokalisierungen. Wählen Sie also beide Varianten aus, damit Sie die bestmögliche Unterstützung für Ihre nationalen Spracheinstellungen erhalten.
";
$elem["localepurge/nopurge"]["descriptionfr"]="Paramètres régionaux :
 Localepurge supprimera tous les fichiers de localisation, ou paramètres régionaux, de votre système à l'exception de ceux que vous allez choisir. Le plus souvent, les paramètres régionaux à deux caractères comme « fr » ou « pt » comportent la majeure partie des informations de localisation par rapport à des paramètres comme « fr_FR » ou « pt_BR ». Vous devriez donc choisir les deux types de paramètres pour disposer du meilleur support de vos paramètres régionaux. Les entrées de /etc/locale.gen seront présélectionnées si localepurge n'a pas été précédemment configuré.
";
$elem["localepurge/nopurge"]["default"]="";
$elem["localepurge/none_selected"]["type"]="boolean";
$elem["localepurge/none_selected"]["description"]="Really remove all locales?
 You chose not to keep any locales. This means that all locales will be
 removed from your system. Are you sure this really is what you want?
";
$elem["localepurge/none_selected"]["descriptionde"]="Wirklich alle Locales entfernen?
 Sie wollen keine Locales behalten. Das bedeutet, dass alle Locales von Ihrem System entfernt werden. Sind Sie sicher, dass Sie das wirklich wollen?
";
$elem["localepurge/none_selected"]["descriptionfr"]="Faut-il vraiment supprimer tous les paramètres régionaux ?
 Vous avez choisi de ne garder aucun fichier de paramètres régionaux. Cela signifie que tous les fichiers seront supprimés de votre système. Veuillez confirmer cette action.
";
$elem["localepurge/none_selected"]["default"]="false";
$elem["localepurge/remove_no"]["type"]="note";
$elem["localepurge/remove_no"]["description"]="localepurge will not take any action
 localepurge will not be useful until you successfully configure it with
 the command \"dpkg-reconfigure localepurge\". The configured entries from
 /etc/locale.gen of the locales package will then be automagically
 preselected.
";
$elem["localepurge/remove_no"]["descriptionde"]="Localepurge wird keine Änderungen vornehmen
 Localepurge ist nicht benutzbar, bis Sie es erfolgreich mit dem Kommando \"dpkg-reconfigure localepurge\" eingerichtet haben. Die eingestellten Locales in der Datei /etc/locale.gen des Pakets locales, werden automatisch vorausgewählt.
";
$elem["localepurge/remove_no"]["descriptionfr"]="Localepurge n'aura pas d'action
 Localepurge ne fera rien tant qu'il n'aura pas été correctement configuré avec la commande « dpkg-reconfigure localepurge ». Les entrées configurées dans /etc/locale.gen par le paquet locales seront alors automatiquement présélectionnées.
";
$elem["localepurge/remove_no"]["default"]="";
$elem["localepurge/mandelete"]["type"]="boolean";
$elem["localepurge/mandelete"]["description"]="Also delete localized man pages?
 Based on the same locale information you chose above, localepurge can also
 delete superfluous localized man pages.
";
$elem["localepurge/mandelete"]["descriptionde"]="Übersetzte Manpages auch löschen?
 Aufgrund der eben ausgewählten Landeskennung kann localepurge auch die dann überflüssigen übersetzten Manpages entfernen.
";
$elem["localepurge/mandelete"]["descriptionfr"]="Faut-il aussi supprimer les traductions des pages de manuel ?
 À partir des choix que vous venez d'effectuer, localepurge peut également supprimer les traductions des pages de manuel qui ne vous sont pas utiles.
";
$elem["localepurge/mandelete"]["default"]="true";
$elem["localepurge/dontbothernew"]["type"]="boolean";
$elem["localepurge/dontbothernew"]["description"]="Inform about new locales?
 If you are content with the selection of locales you chose to keep and
 don't want to care about whether to delete or keep newly found locales,
 just deselect this option to automatically remove new locales you probably wouldn't
 care about anyway. If you select this option, you will be given the opportunity
 to decide whether to keep or delete newly introduced locales.
";
$elem["localepurge/dontbothernew"]["descriptionde"]="Neue Locales melden?
 Wenn Sie die Auswahl der Locales so erhalten möchten, wie Sie es ausgewählt haben, und es Ihnen egal ist, ob neu gefundene Locales gelöscht oder behalten werden, lehnen Sie diese Option ab, um neue Locales automatisch zu löschen, die Sie ohnehin nicht interessieren. Wenn Sie hier zustimmen, haben Sie die Möglichkeit zu entscheiden, ob Sie neu eingeführte Locales behalten oder löschen wollen.
";
$elem["localepurge/dontbothernew"]["descriptionfr"]="Souhaitez-vous être informé de nouveaux paramètres régionaux ?
 Si le choix des paramètres régionaux à conserver vous convient et que vous ne vous préoccupez pas de savoir si vous voulez supprimer ou garder d'éventuels nouveaux paramètres régionaux, ne choisissez pas cette option. Ceux -ci seront alors automatiquement supprimés. En activant cette option, vous aurez la possibilité de conserver ou d'effacer les nouveaux paramètres régionaux.
";
$elem["localepurge/dontbothernew"]["default"]="false";
$elem["localepurge/showfreedspace"]["type"]="boolean";
$elem["localepurge/showfreedspace"]["description"]="Display freed disk space?
 localepurge can calculate and display the disk space freed by its
 operations and show a saved disk space summary at quitting.
";
$elem["localepurge/showfreedspace"]["descriptionde"]="Frei gewordenen Festplattenplatz anzeigen?
 Localepurge kann den durch sein Wirken freigegebenen Festplattenplatz berechnen und zeigt am Ende eine Zusammenfassung an.
";
$elem["localepurge/showfreedspace"]["descriptionfr"]="Faut-il afficher l'espace disque libéré ?
 Localepurge peut calculer et afficher l'espace disque libéré par ses actions, puis afficher un résumé rapide de l'espace récupéré avant de se terminer.
";
$elem["localepurge/showfreedspace"]["default"]="true";
$elem["localepurge/quickndirtycalc"]["type"]="boolean";
$elem["localepurge/quickndirtycalc"]["description"]="Accurate disk space calculation?
 There are two ways available to calculate freed disk space. One is
 much faster than the other but far less accurate if other changes occur
 on the filesystem during disc space calculation. The other one works more
 accurately and is therefore the preferred choice.
";
$elem["localepurge/quickndirtycalc"]["descriptionde"]="Genaue Berechnung des Festplattenplatzes?
 Es gibt zwei Arten, den freigewordenen Festplattenplatz zu berechnen. Die eine ist viel schneller als die andere, aber weniger genau, wenn weitere Änderungen am Dateisystem während der Berechnung vorgenommen werden. Die andere Art rechnet genauer und wird deshalb empfohlen.
";
$elem["localepurge/quickndirtycalc"]["descriptionfr"]="Faut-il utiliser une méthode de calcul précise ?
 Deux méthodes de calcul de l'espace disque libéré sont possibles. L'une est plus rapide mais moins précise que l'autre dans le cas où d'autres modifications ont lieu sur le disque pendant le calcul. La méthode précise est le choix par défaut.
";
$elem["localepurge/quickndirtycalc"]["default"]="true";
$elem["localepurge/verbose"]["type"]="boolean";
$elem["localepurge/verbose"]["description"]="Display verbose output?
 localepurge may be configured to explicitly show which locale files it
 deletes. This possibly causes a lot of screen output.
";
$elem["localepurge/verbose"]["descriptionde"]="Ausführliche Ausgaben anzeigen?
 Localepurge kann so eingerichtet werden, dass es genau anzeigt, welche Locales-Dateien gelöscht werden. Das bewirkt eventuell sehr viele Bildschirmausgaben.
";
$elem["localepurge/verbose"]["descriptionfr"]="Faut-il utiliser un affichage détaillé ?
 Localepurge peut être configuré pour afficher chaque ensemble de paramètres régionaux qu'il supprime. Cela peut générer l'affichage de nombreux messages.
";
$elem["localepurge/verbose"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
