<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dictionaries-common");

$elem["dictionaries-common/debconf_database_corruption"]["type"]="error";
$elem["dictionaries-common/debconf_database_corruption"]["description"]="Possible debconf database corruption
 The setting for \"${question}\" is missing, but packages providing
 candidates are installed: \"${class_packages}\".
 .
 This may be due to corruption in the debconf database. See
 \"/usr/share/doc/dictionaries-common/README.problems\" on \"Debconf
 database corruption\".
 .
 In this case, running \"/usr/share/debconf/fix_db.pl\" can help to put
 the debconf database in a consistent state.
 .
 Some questions are likely to be asked after this message in order to
 leave the dictionaries system in a (provisionally) working state.
";
$elem["dictionaries-common/debconf_database_corruption"]["descriptionde"]="Die Debconf-Datenbank ist möglicherweise beschädigt.
 Die Einstellung für »${question}« fehlt, es sind aber Pakete installiert, die Kandidaten bereitstellen: »${class_packages}«.
 .
 Der Grund könnte eine Beschädigung in der Debconf-Datenbank sein. Siehe »/usr/share/doc/dictionaries-common/README.problems« unter »Debconf database corruption«.
 .
 In diesem Fall kann das Ausführen von »/usr/share/debconf/fix_db.pl« helfen, die Debconf-Datenbank in einen konsistenten Zustand zu bringen.
 .
 Einige Fragen werden wahrscheinlich erst nach dieser Nachricht gestellt, um das Wörterbuchsystem in einem (provisorisch) funktionierenden Zustand zu lassen.
";
$elem["dictionaries-common/debconf_database_corruption"]["descriptionfr"]="Base de données de configuration probablement corrompue
 Le réglage pour « ${question}»  est manquant mais des paquets fournissant des candidats pour ce réglage sont installés : « ${class_packages} ».
 .
 Cela peut être dû à une corruption de la base de données de configuration (« debconf »). Veuillez consulter le fichier (non traduit en français) /usr/share/doc/dictionaries-common/README.problems au chapitre « Debconf database corruption ».
 .
 Dans cette situation, il est possible d'exécuter la commande « /usr/share/debconf/fix_db.pl » pour remettre la base de données de configuration dans un état cohérent.
 .
 Il est probable que certaines questions seront alors posées afin de replacer le système de gestion des dictionnaires dans un état (temporairement) opérationnel.
";
$elem["dictionaries-common/debconf_database_corruption"]["default"]="";
$elem["dictionaries-common/invalid_debconf_value"]["type"]="error";
$elem["dictionaries-common/invalid_debconf_value"]["description"]="Invalid configuration value for default dictionary
 An invalid value has been found for a configuration setting for
 dictionaries-common. \"${value}\" does not correspond to any installed package
 on the system.
 .
 This is usually caused by previous problems during package
 installation, where the package providing \"${value}\" was selected for
 installation but finally not installed because of errors in other
 packages.
 .
 To fix this error, reinstall (or install) the package that provides
 \"${value}\". Then, if you don't want that package on this system, remove
 it, which will also delete this configuration setting. A menu of choices
 will be shown after this message in order to leave the system in a working
 state until you fix the problem.
 .
 This error message can also appear during ispell dictionary or wordlist
 renaming (e.g.: wenglish -> wamerican). In this case it is harmless and
 everything will be fixed after you select your default in the menu(s)
 shown after this message.
";
$elem["dictionaries-common/invalid_debconf_value"]["descriptionde"]="Ungültiger Konfigurationswert für das Standardwörterbuch
 Es wurde ein ungültiger Wert für eine Konfigurationseinstellung von Dictionaries-common gefunden. »${value}« entspricht keinem auf dem System installierten Paket.
 .
 So etwas kommt gewöhnlich bei vorhergehenden Problemen während der Paketinstallation vor, wenn das Paket, das [${value}] bereitstellt, zur Installation ausgewählt ist, aber letztendlich wegen Fehlern in anderen Paketen doch nicht installiert wird.
 .
 Um diesen Fehler zu beheben, installieren Sie (erneut) das Paket, das »${value}« bereitstellt. Dann entfernen Sie das Paket von Ihrem System, falls Sie es nicht mehr wollen, wodurch diese Konfigurationseinstellung ebenfalls gelöscht wird. Nach dieser Nachricht wird ein Auswahlmenü angezeigt, um das System in einem funktionierenden Zustand zu belassen, bis das Problem behoben wurde.
 .
 Diese Fehlermeldung kann außerdem bei Umbenennung eines Ispell-Wörterbuchs oder einer Wortliste erscheinen (z.B. wenglish -> wamerican). In diesem Fall ist sie harmlos und alles wird korrigiert, nachdem Sie Ihre Voreinstellung im Menü oder in den Menüs ausgewählt haben, das nach diesem Hinweis erscheint.
";
$elem["dictionaries-common/invalid_debconf_value"]["descriptionfr"]="Réglage de configuration non valable pour le dictionnaire par défaut
 Une valeur incorrecte a été trouvée pour un réglage de configuration du paquet dictionaries-common. Le réglage « ${value} » ne correspond à aucun paquet installé sur le système.
 .
 Cela provient en général de difficultés rencontrées au cours de l'installation du paquet qui fournit « ${value} ». Il a été choisi pour être installé mais n'a pas pu l'être à cause d'erreurs survenues pendant l'installation d'autres paquets.
 .
 Pour corriger ce problème, veuillez installer (ou réinstaller) le paquet qui fournit « ${value} ». Si vous ne souhaitez plus utiliser ce paquet sur votre système, veuillez le supprimer de la manière habituelle afin que ses réglages de configuration soient également supprimés. Un menu va s'afficher pour permettre de laisser le système dans un état fonctionnel.
 .
 Ce message d'erreur peut également apparaître lorsqu'un dictionnaire ou une liste de mots pour ispell sont renommés (par exemple wenglish en wamerican). Dans ce cas, l'erreur est sans conséquence et tout rentrera dans l'ordre quand vous aurez choisi le dictionnaire par défaut immédiatement après ce message.
";
$elem["dictionaries-common/invalid_debconf_value"]["default"]="";
$elem["dictionaries-common/default-ispell"]["type"]="select";
$elem["dictionaries-common/default-ispell"]["choices"][1]="${echoices}";
$elem["dictionaries-common/default-ispell"]["choicesde"][1]="${echoices}";
$elem["dictionaries-common/default-ispell"]["choicesfr"][1]="${echoices}";
$elem["dictionaries-common/default-ispell"]["description"]="System default ispell dictionary:
 Please indicate which dictionary ispell should use as system-wide
 default when no other spell-checking dictionary is specified.
 .
 This sets up the /usr/lib/ispell/default.aff and
 /usr/lib/ispell/default.hash symlinks, as well as ispell's global
 ispell-wrapper and Emacs defaults.
 .
 Use \"Manual symlink setting\" if you want to handle the symlinks
 yourself. In this case ispell will have no global ispell-wrapper or
 Emacs defaults.
 .
 The default ispell dictionary can be changed at any time by running
 \"select-default-ispell\".
";
$elem["dictionaries-common/default-ispell"]["descriptionde"]="Standard-Ispell-Wörterbuch des Systems:
 Bitte geben Sie an, welches Wörterbuch Ispell als systemweite Vorgabe benutzen soll, wenn kein anderes Wörterbuch zur Rechtschreibprüfung angegeben wurde.
 .
 Dies richtet die symbolischen Verweise /usr/lib/ispell/default.aff und /usr/lib/ispell/default.hash sowie Ispells globalen Ispell-Wrapper und Emacs-Vorgaben ein.
 .
 Benutzen Sie »Manuelle Einrichtung von symbolischen Verweisen«, falls Sie die symbolischen Verweise selbst verwalten möchten. In diesem Fall wird Ispell keine globalen Ispell-Wrapper oder Emacs-Vorgaben haben.
 .
 Das Standard-Wörterbuch von Ispell kann jederzeit geändert werden, indem Sie »select-default-ispell« ausführen.
";
$elem["dictionaries-common/default-ispell"]["descriptionfr"]="Dictionnaire ispell à utiliser par défaut :
 Veuillez indiquer le dictionnaire qu'ispell doit utiliser par défaut sur le système quand aucun dictionnaire spécifique n'est indiqué.
 .
 Ce choix définit les liens symboliques /usr/lib/ispell/default.aff et /usr/lib/ispell/default.hash, ainsi que les valeurs par défaut de ispell-wrapper et Emacs.
 .
 Si vous choisissez « Gestion manuelle des liens symboliques », vous devrez gérer les liens symboliques vous-même. De même, ispell n'utilisera alors aucun dictionnaire par défaut avec ispell-wrapper et Emacs.
 .
 Il est possible de changer le dictionnaire utilisé par ispell à n'importe quel moment avec la commande « select-default-ispell ».
";
$elem["dictionaries-common/default-ispell"]["default"]="";
$elem["dictionaries-common/default-wordlist"]["type"]="select";
$elem["dictionaries-common/default-wordlist"]["choices"][1]="${echoices}";
$elem["dictionaries-common/default-wordlist"]["choicesde"][1]="${echoices}";
$elem["dictionaries-common/default-wordlist"]["choicesfr"][1]="${echoices}";
$elem["dictionaries-common/default-wordlist"]["description"]="System default wordlist:
 Please indicate which wordlist the \"/usr/share/dict/words\" symlink
 should point to. This will provide a simple list of dictionary words
 for basic spell-checking and word searches. Use \"Manual symlink
 setting\" if you want to handle this symlink yourself.
 .
 The default wordlist can be changed at any time by running
 \"select-default-wordlist\".
";
$elem["dictionaries-common/default-wordlist"]["descriptionde"]="Standardwortliste des Systems:
 Bitte geben Sie an, auf welche Wortliste der symbolische Verweis »/usr/share/dict/words« zeigen soll. Dies wird eine einfache Liste von Wörtern des Wörterbuchs für grundlegende Rechtschreibprüfungen und die Suche nach Wörtern bereitstellen. Benutzen Sie »Manuelle Einrichtung von symbolischen Verweisen«, falls Sie die symbolischen Verweise selbst verwalten möchten.
 .
 Diese Standardwortliste kann jederzeit durch Ausführung von »select-default-wordlist« geändert werden.
";
$elem["dictionaries-common/default-wordlist"]["descriptionfr"]="Quel dictionnaire de type « liste de mots » faut-il utiliser par défaut ?
 Veuillez indiquer la liste de mots que le lien symbolique /usr/share/dict/words doit utiliser. Cette liste est une simple liste de mots utilisée pour une vérification orthographique de base et la recherche de mots. Vous pouvez choisir « Gestion manuelle des liens symboliques » pour gérer ce lien vous-même.
 .
 La liste de mots par défaut peut être modifiée à tout moment avec la commande « select-default-wordlist ».
";
$elem["dictionaries-common/default-wordlist"]["default"]="";
$elem["dictionaries-common/old_wordlist_link"]["type"]="boolean";
$elem["dictionaries-common/old_wordlist_link"]["description"]="Remove obsolete /etc/dictionary link?
 This system has an obsolete symlink \"/etc/dictionary\". This is no
 longer meaningful, and should be removed.
 .
 You will be asked to explicitly select the default wordlist during
 installation of wordlist packages. You can change your selection at any
 time by running \"select-default-wordlist\".
";
$elem["dictionaries-common/old_wordlist_link"]["descriptionde"]="Soll der veraltete Verweis /etc/dictionary gelöscht werden?
 Dieses System hat einen veralteten symbolischen Verweis »/etc/dictionary«. Dieser wird nicht mehr benötigt und sollte entfernt werden.
 .
 Sie werden während der Installation der Wortlistenpakete explizit nach der Auswahl der Standardwortliste gefragt. Sie können Ihre Auswahl jederzeit durch Ausführen von »select-default-wordlist« ändern.
";
$elem["dictionaries-common/old_wordlist_link"]["descriptionfr"]="Faut-il supprimer le lien obsolète /etc/dictionary ?
 Le système comporte un lien symbolique obsolète /etc/dictionary. Il ne sert plus et devrait être supprimé.
 .
 Vous aurez à choisir explicitement un dictionnaire « liste de mots » (« wordlist ») par défaut pendant l'installation des paquets de type « wordlist ». Ce choix pourra être modifié à tout moment avec la commande « select-default-wordlist ».
";
$elem["dictionaries-common/old_wordlist_link"]["default"]="true";
$elem["dictionaries-common/ispell-autobuildhash-message"]["type"]="note";
$elem["dictionaries-common/ispell-autobuildhash-message"]["description"]="Problems rebuilding an ${xxpell} hash file (${hashfile})
 The following error happened:
 .
 ${errormsg}
 .
 This error was caused by a package providing \"${hashfile}\", although it
 may be triggered by another package's installation. Please submit a bug
 for the package providing \"${hashfile}\".
 .
 Until this problem is fixed you will not be able to use ${xxpell}
 with \"${hashfile}\".
";
$elem["dictionaries-common/ispell-autobuildhash-message"]["descriptionde"]="Probleme bei der Neuerstellung einer ${xxpell}-Hash-Datei (${hashfile})
 Der folgende Fehler ist aufgetreten:
 .
 ${errormsg}
 .
 Dieser Fehler wurde durch ein Paket verursacht, das »${hashfile}« bereitstellt, obwohl er möglicherweise durch die Installation eines anderen Pakets ausgelöst wurde. Bitte reichen Sie einen Fehlerbericht für das Paket ein, das »${hashfile}« bereitstellt.
 .
 Bis dieses Problem behoben ist, werden Sie nicht in der Lage sein, ${xxpell} mit »${hashfile}« zu benutzen.
";
$elem["dictionaries-common/ispell-autobuildhash-message"]["descriptionfr"]="Problèmes lors de la reconstruction de la table de hachage ${hashfile} de ${xxpell}
 L'erreur suivante s'est produite :
 .
 ${errormsg}
 .
 Cette erreur a été provoquée par un paquet qui fournit ${hashfile} bien que l'erreur ait pu être provoquée par l'installation d'un autre paquet. Veuillez signaler ce bogue au responsable du paquet qui fournit le fichier ${hashfile}.
 .
 Tant que ce problème n'aura pas été corrigé, vous ne pourrez pas utiliser ${xxpell} avec ${hashfile}.
";
$elem["dictionaries-common/ispell-autobuildhash-message"]["default"]="";
$elem["dictionaries-common/selecting_ispell_wordlist_default"]["type"]="note";
$elem["dictionaries-common/selecting_ispell_wordlist_default"]["description"]="Default values for ispell dictionary/wordlist not set
 Running \"dpkg-reconfigure dictionaries-common\" will not set the default
 values for ispell dictionary/wordlist. Running \"dpkg-reconfigure ispell\"
 will not set the default ispell dictionary.
 .
 You should instead use the \"select-default-ispell\" or
 \"select-default-wordlist\" commands for that purpose.
";
$elem["dictionaries-common/selecting_ispell_wordlist_default"]["descriptionde"]="Standardwerte für Ispell-Wörterbücher/-Wortlisten sind nicht gesetzt.
 Ausführen von »dpkg-reconfigure dictionaries-common« wird nicht die Standardwerte für Ispell-Wörterbücher/-Wortlisten setzen – ebenso wie »dpkg-reconfigure ispell« nicht das Standard-Ispell-Wörterbuch setzen wird.
 .
 Sie sollten stattdessen »select-default-ispell« oder »select-default-wordlist« verwenden.
";
$elem["dictionaries-common/selecting_ispell_wordlist_default"]["descriptionfr"]="Pas de valeurs par défaut de dictionnaire ou liste de mots pour ispell
 La commande « dpkg-reconfigure dictionaries-common » ne définira pas les valeurs par défaut des dictionnaires ou des listes de mots pour ispell. La commande « dpkg-reconfigure ispell » ne définira pas le dictionnaire par défaut pour ispell.
 .
 Veuillez plutôt utiliser les commandes « select-default-ispell » ou « select-default-wordlist ».
";
$elem["dictionaries-common/selecting_ispell_wordlist_default"]["default"]="";
PKG_OptionPageTail2($elem);
?>
