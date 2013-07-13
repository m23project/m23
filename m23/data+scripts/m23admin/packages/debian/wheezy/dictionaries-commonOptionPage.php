<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dictionaries-common");

$elem["dictionaries-common/invalid_debconf_value"]["type"]="note";
$elem["dictionaries-common/invalid_debconf_value"]["description"]="An invalid debconf value [${value}] has been found
 It does not correspond to any installed package in the system.
 .
 That is usually caused by problems at some time during packages
 installation, where the package providing [${value}] was selected for
 installation but finally not installed because of errors in other
 packages.
 .
 To fix this error, reinstall (or install) the package that provides
 the missing value.  Then, if you don't want this package on
 your system, remove it, which will also remove its debconf entries.
 Menu to be shown after this message will try to leave the system in a
 working state until then.
 .
 This error message can also appear during ispell dictionary or wordlist
 renaming (e.g., wenglish-> wamerican). In this case it is harmless and
 everything will be fixed after you select your default in the menu(s)
 shown after this message.
";
$elem["dictionaries-common/invalid_debconf_value"]["descriptionde"]="Ein ungültiger Debconf-Wert [${value}] wurde gefunden
 Er gehört zu keinem installierten Paket im System.
 .
 So etwas kommt gewöhnlich bei Problemen während der Paketinstallation vor, wenn das Paket, das [${value}] bereitstellt, zur Installation ausgewählt ist, aber letztendlich wegen Fehlern in anderen Paketen doch nicht installiert wird.
 .
 Um diesen Fehler zu beheben, installieren Sie (erneut) das Paket, das den fehlenden Wert bereitstellt. Dann entfernen Sie das Paket von Ihrem System, falls Sie es nicht mehr wollen, wodurch seine Debconf-Einträge ebenfalls entfernt werden. Das Menü, das nach dieser Nachricht angezeigt wird, wird versuchen, das System bis dahin in einem funktionierenden Zustand zu belassen.
 .
 Diese Fehlermeldung kann außerdem bei Umbenennung eines Ispell-Wörterbuchs oder einer Wortliste erscheinen (z.B. wenglish -> wamerican). In diesem Fall ist sie harmlos und alles wird korrigiert, nachdem Sie Ihren Standard im Menü ausgewählt haben, das nach diesem Hinweis erscheint.
";
$elem["dictionaries-common/invalid_debconf_value"]["descriptionfr"]="Valeur debconf [${value}] non valable
 Le choix de dictionnaire par défaut ne correspond à aucun paquet installé sur le système.
 .
 Cela provient en général de difficultés rencontrées au cours de l'installation de certains paquets. Le paquet fournissant [${value}] a été choisi pour être installé mais n'a pas pu l'être à cause d'erreurs survenues pendant l'installation d'autres paquets.
 .
 Pour corriger ce problème, veuillez installer (ou réinstaller) le paquet qui fournit le réglage manquant. Si vous ne souhaitez plus utiliser ce paquet sur votre système, veuillez le supprimer de la manière habituelle afin que ses entrées debconf soient également supprimées. Les questions à venir s'efforceront de laisser le système dans un état fonctionnel.
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
 Bitte geben Sie an, auf welche Wortliste der symbolische Verweis »/usr/share/dict/words« verweisen soll. Dies wird eine einfache Liste von Wörtern des Wörterbuchs für grundlegende Rechtschreibprüfungen und die Suche nach Wörtern bereitstellen. Benutzen Sie »Manuelle Einrichtung von symbolischen Verweisen«, falls Sie die symbolischen Verweise selbst verwalten möchten.
 .
 Diese Standardwortliste kann jederzeit durch Ausführung von »select-default-wordlist« geändert werden.
";
$elem["dictionaries-common/default-wordlist"]["descriptionfr"]="Quel dictionnaire de type « liste de mots » faut-il utiliser par défaut ?
 Veuillez indiquer la liste de mots que le lien symbolique /usr/share/dict/words doit utiliser. Cette liste est une simple liste de mots utilisée pour de la vérification orthographique de base et de la recherche de mots. Vous pouvez choisir « Gestion manuelle des liens symboliques » pour gérer ce lien vous-même.
 .
 La liste de mots par défaut peut être modifiée à tout moment avec la commande « select-default-wordlist ».
";
$elem["dictionaries-common/default-wordlist"]["default"]="";
$elem["dictionaries-common/move_old_usr_dict"]["type"]="boolean";
$elem["dictionaries-common/move_old_usr_dict"]["description"]="Move non-FHS stuff under /usr/dict to /usr/dict-pre-FHS?
 Some stuff under /usr/dict that is not a symlink to /usr/share/dict has
 been detected in your system. /usr/share/dict is now the FHS location for
 those files. Everything under /usr/dict can be moved to /usr/dict-pre-FHS
 and a symlink /usr/dict -> /usr/share/dict set.
 .
 Although no current Debian package uses that obsolete /usr/dict location,
 not having that symlink may break some of your old applications that used
 it, so you are encouraged to let the files be moved and the link be set up.
";
$elem["dictionaries-common/move_old_usr_dict"]["descriptionde"]="Nicht-FHS-Material aus /usr/dict nach /usr/dict-pre-FHS verschieben?
 Es wurde einiges Material unter /usr/dict in Ihrem System gefunden, das kein symbolischer Verweis auf /usr/share/dict ist. /usr/share/dict ist jetzt der FHS-Speicherplatz für diese Dateien. Alles unter /usr/share/dict kann nach /usr/share/dict/pre-FHS verschoben und ein symbolischer Verweis /usr/dict -> /usr/share/dict angelegt werden.
 .
 Obwohl kein aktuelles Debian-Paket den veralteten Speicherort /usr/dict benutzt, kann das Fehlen dieses symbolischen Verweises einige Ihrer alten Anwendungen beeinträchtigen, die ihn noch benutzen, daher wird Ihnen empfohlen, das Verschieben der Dateien und Anlegen des Verweises zuzulassen.
";
$elem["dictionaries-common/move_old_usr_dict"]["descriptionfr"]="Faut-il déplacer les objets non conformes au FHS ?
 Certains fichiers ont été détectés dans /usr/dict et ne sont pas des liens symboliques vers /usr/share/dict. Selon le FHS (« Filesystem Hierarchy Standard », norme sur l'organisation hiérarchique des systèmes de fichiers), ces fichiers doivent désormais se trouver dans /usr/share/dict. Si vous choisissez cette option, tout ce qui se trouve dans /usr/dict sera déplacé dans /usr/dict-pre-FHS et un lien symbolique de /usr/dict vers /usr/share/dict sera créé. Vous devrez alors vérifier vous-même le contenu de ce nouveau répertoire et déplacer les fichiers vers l'emplacement conforme au FHS. Si vous ne choisissez pas cette option, rien ne sera modifié.
 .
 Bien qu'actuellement aucun paquet Debian n'utilise l'emplacement obsolète /usr/dict, l'absence de ce lien symbolique pourrait perturber le fonctionnement d'anciennes applications. Pour cette raison, il vous est fortement conseillé d'accepter.
";
$elem["dictionaries-common/move_old_usr_dict"]["default"]="true";
$elem["dictionaries-common/old_wordlist_link"]["type"]="boolean";
$elem["dictionaries-common/old_wordlist_link"]["description"]="Remove obsolete /etc/dictionary link?
 There is a /etc/dictionary link in your system. This is obsolete and no
 longer means anything. You are strongly suggested to allow removal of that
 link.
 .
 You will be called to explicitly select the default wordlist during
 installation of wordlist packages. You can change your selection at any
 time by running 'select-default-wordlist'.
";
$elem["dictionaries-common/old_wordlist_link"]["descriptionde"]="Veralteten Verweis /etc/dictionary löschen?
 Es gibt einen Verweis /etc/dictionary auf Ihrem System. Dieser ist veraltet und hat keinerlei Funktion mehr. Es wird dringend empfohlen, die Entfernung dieses Verweises zu erlauben.
 .
 Sie werden aufgefordert, während der Installation der Wortlistenpakete die Standardwortliste auszuwählen. Sie können Ihre Auswahl jederzeit durch Ausführen von »select-default-wordlist« ändern.
";
$elem["dictionaries-common/old_wordlist_link"]["descriptionfr"]="Faut-il supprimer le lien obsolète /etc/dictionary ?
 Un lien /etc/dictionary existe sur votre système. Il est obsolète et ne correspond plus à rien. Il vous est fortement conseillé d'autoriser la suppression de ce lien.
 .
 Vous serez amené à choisir explicitement un dictionnaire « liste de mots » (« wordlist ») par défaut pendant l'installation des paquets de type « wordlist ». Ce choix pourra être modifié à tout moment avec la commande « select-default-wordlist ».
";
$elem["dictionaries-common/old_wordlist_link"]["default"]="true";
$elem["dictionaries-common/ispell-autobuildhash-message"]["type"]="note";
$elem["dictionaries-common/ispell-autobuildhash-message"]["description"]="Problems rebuilding an ${xxpell} hash file (${hashfile})
 ** Error: ${errormsg}
 .
 This error was caused by package providing '${hashfile}', although it
 can be made evident during other package postinst. Please complain
 to the maintainer of package providing '${hashfile}'.
 .
 Until this problem is fixed you will not be able to use ${xxpell}
 with '${hashfile}'.
";
$elem["dictionaries-common/ispell-autobuildhash-message"]["descriptionde"]="Probleme beim Neubauen einer ${xxpell}-Hash-Datei (${hashfile})
 ** Fehler: ${errormsg}
 .
 Dieser Fehler wurde durch ein ${hashfile} bereitstellendes Paket verursacht, obwohl es erst durch das postinst eines anderen Paketes zum Vorschein kommen kann. Bitte beschweren Sie sich bei dem Betreuer des Pakets, das »${hashfile}« bereitstellt.
 .
 Bis dieses Problem behoben ist, werden Sie nicht in der Lage sein, ${xxpell} mit »${hashfile}« zu benutzen.
";
$elem["dictionaries-common/ispell-autobuildhash-message"]["descriptionfr"]="Problèmes lors de la reconstruction de la table de hachage ${hashfile} de ${xxpell}
 Erreur : ${errormsg}
 .
 Cette erreur a été provoquée par le paquet qui fournit ${hashfile} bien que l'erreur ne devienne visible que lors de la fin d'installation d'un autre paquet. Veuillez signaler ce bogue au responsable du paquet qui fournit le fichier ${hashfile}.
 .
 Tant que ce problème ne sera pas corrigé, vous ne pourrez pas utiliser ${xxpell} avec ${hashfile}.
";
$elem["dictionaries-common/ispell-autobuildhash-message"]["default"]="";
$elem["dictionaries-common/remove_old_usr_dict_link"]["type"]="boolean";
$elem["dictionaries-common/remove_old_usr_dict_link"]["description"]="Remove obsolete /usr/dict symlink?
 A non FHS /usr/dict symlink has been found. Since it is obsolete,
 no Debian package currently uses that location and none of your programs
 should rely on it, so you are strongly suggested to accept its removal.
 .
 If for whatever reason you need that symlink, recreate it again, but you
 are suggested to better fix your old programs to use the current
 /usr/share/dict location.
";
$elem["dictionaries-common/remove_old_usr_dict_link"]["descriptionde"]="Veralteten symbolischen Verweis /usr/dict löschen?
 Es wurde ein symbolischer nicht-FHS-Verweis /usr/dict gefunden. Weil er veraltet ist, benutzt kein Debian-Paket diesen Speicherort und keines Ihrer Programme sollte ihn voraussetzen; es wird deswegen nachdrücklich empfohlen, einer Entfernung zuzustimmen.
 .
 Wenn Sie aus irgendeinem Grund diesen symbolischen Verweis benötigen, erstellen Sie ihn nochmal, aber es wird empfohlen, Ihre alten Programme zu korrigieren, um den aktuellen Speicherplatz /usr/share/dict zu benutzen.
";
$elem["dictionaries-common/remove_old_usr_dict_link"]["descriptionfr"]="Faut-il supprimer le lien obsolète /usr/dict ?
 Un lien symbolique non conforme au FHS (« Filesystem Hierarchy Standard », norme d'organisation hiérarchique des systèmes de fichiers) a été trouvé. Étant donné qu'il est obsolète, plus aucun paquet Debian ne l'utilise et aucun de vos programmes ne devrait en dépendre. Il vous est donc fortement conseillé d'accepter sa suppression.
 .
 Si, pour une raison quelconque, vous avez besoin de ce lien symbolique, veuillez le recréer. Vous devriez cependant corriger vos anciens programmes pour qu'ils utilisent l'emplacement actuel : /usr/share/dict.
";
$elem["dictionaries-common/remove_old_usr_dict_link"]["default"]="true";
$elem["dictionaries-common/selecting_ispell_wordlist_default"]["type"]="note";
$elem["dictionaries-common/selecting_ispell_wordlist_default"]["description"]="Default values for ispell dictionary/wordlist are not set here
 Running 'dpkg-reconfigure dictionaries-common' will not set the default
 values for ispell dictionary/wordlist. Running 'dpkg-reconfigure ispell'
 will not set the default ispell dictionary.
 .
 Use instead 'select-default-ispell' or 'select-default-wordlist' scripts.
";
$elem["dictionaries-common/selecting_ispell_wordlist_default"]["descriptionde"]="Standardwerte für Ispell-Wörterbücher/-Wortlisten werden hier nicht gesetzt.
 Ausführen von »dpkg-reconfigure dictionaries-common« wird nicht die Standardwerte für Ispell-Wörterbücher/-Wortlisten setzen – ebenso wie »dpkg-reconfigure ispell« nicht das Standard-Ispell-Wörterbuch setzen wird.
 .
 Benutzen Sie stattdessen »select-default-ispell« oder »select-default-wordlist«.
";
$elem["dictionaries-common/selecting_ispell_wordlist_default"]["descriptionfr"]="Pas de valeurs par défaut de dictionnaire pour ispell
 La commande « dpkg-reconfigure dictionaries-common » ne définira pas les valeurs par défaut des dictionnaires ou des listes de mots pour ispell. La commande « dpkg-reconfigure ispell » ne définira pas le dictionnaire par défaut pour ispell.
 .
 Veuillez plutôt utiliser les scripts « select-default-ispell » ou « select-default-wordlist ».
";
$elem["dictionaries-common/selecting_ispell_wordlist_default"]["default"]="";
PKG_OptionPageTail2($elem);
?>
