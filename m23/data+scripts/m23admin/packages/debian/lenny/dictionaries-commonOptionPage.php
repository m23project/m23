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
$elem["dictionaries-common/invalid_debconf_value"]["descriptionde"]="Ein ungültiger debconf-Wert [${value}] wurde gefunden
 Er gehört zu keinem installierten Paket im System.
 .
 So etwas kommt gewöhnlich bei Problemen während der Paket-Installation vor, wenn das [${value}] bereitstellende Paket zur Installation ausgewählt ist aber letztendlich wegen Fehlern in anderen Paketen doch nicht installiert wurde.
 .
 Die saubere Lösung des Problemes ist die Installation des Paketes mit dem verwaisten Wert.  Wenn Sie das Paket in Ihrem System nicht mehr wollen, entfernen Sie es auf übliche Weise und seine debconf-Einträge werden mitgelöscht.
 .
 Diese Fehlermeldung kann außerdem bei Umbenennung eines ispell-Wörterbuchs oder einer Wortliste erscheinen (z.B. wenglish -> wamerican). In diesem Fall ist sie harmlos und alles wird korrigiert, nachdem Sie Ihren Standard im nach diesem Hinweis erscheinenden Menü ausgewählt haben.
";
$elem["dictionaries-common/invalid_debconf_value"]["descriptionfr"]="Valeur debconf invalide [${value}]
 Le choix de dictionnaire par défaut ne correspond à aucun paquet installé sur le système.
 .
 Cela provient en général de difficultés rencontrées au cours de l'installation de certains paquets. Le paquet fournissant [${value}] a été choisi pour être installé mais n'a pas pu l'être à cause d'erreurs survenues pendant l'installation d'autres paquets.
 .
 Pour corriger ce problème, veuillez installer (ou réinstaller) le paquet qui fournit le réglage manquant. Si vous ne souhaitez plus utiliser ce paquet sur votre système, veuillez le supprimer de la manière habituelle afin que ses entrées debconf soient également supprimées. Les questions à venir s'efforceront de laisser le système dans un état fonctionnel.
 .
 Ce message d'erreur peut également apparaître lorsqu'un dictionnaire ou une liste de mots pour ispell sont renommés (p. ex. wenglish en wamerican). Dans ce cas, l'erreur est sans conséquence et tout rentrera dans l'ordre quand vous aurez choisi le dictionnaire par défaut immédiatement après ce message.
";
$elem["dictionaries-common/invalid_debconf_value"]["default"]="";
$elem["dictionaries-common/default-ispell"]["type"]="select";
$elem["dictionaries-common/default-ispell"]["choices"][1]="${echoices}";
$elem["dictionaries-common/default-ispell"]["choicesde"][1]="${echoices}";
$elem["dictionaries-common/default-ispell"]["choicesfr"][1]="${echoices}";
$elem["dictionaries-common/default-ispell"]["description"]="Selecting system's default ispell dictionary:
 Because more than one ispell dictionary will be available in your system,
 please select the one you'd like applications to use by default.
 .
 You can change the default ispell dictionary at any time by running
 \"select-default-ispell\".
";
$elem["dictionaries-common/default-ispell"]["descriptionde"]="Welches ispell-Wörterbuch soll der Standard sein?
 Da mehrere ispell Wörterbücher auf Ihrem System installiert sind, wählen Sie bitte dasjenige aus, das von Anwendungen standardmäßig verwendet werden soll.
 .
 Sie können dieses Standard-Wörterbuch jederzeit ändern, indem Sie \"select-default-ispell\" ausführen.
";
$elem["dictionaries-common/default-ispell"]["descriptionfr"]="Dictionnaire ispell à utiliser par défaut :
 Plusieurs dictionnaires pour ispell sont installés dans le système. Veuillez choisir celui que les applications utiliseront par défaut.
 .
 Il est possible de changer le dictionnaire utilisé par ispell à n'importe quel moment avec la commande « select-default-ispell ».
";
$elem["dictionaries-common/default-ispell"]["default"]="";
$elem["dictionaries-common/default-wordlist"]["type"]="select";
$elem["dictionaries-common/default-wordlist"]["choices"][1]="${echoices}";
$elem["dictionaries-common/default-wordlist"]["choicesde"][1]="${echoices}";
$elem["dictionaries-common/default-wordlist"]["choicesfr"][1]="${echoices}";
$elem["dictionaries-common/default-wordlist"]["description"]="Selecting system's default wordlist:
 Because more than one wordlist will be available in your system, please
 select the one you'd like applications to use by default.
 .
 You can change the default wordlist at any time by running
 \"select-default-wordlist\".
";
$elem["dictionaries-common/default-wordlist"]["descriptionde"]="Welche Wortliste soll als Standard eingestellt werden?
 Da mehrere Wortlisten auf Ihrem System installiert sind, wählen Sie bitte diejenige aus, die von Anwendungen standardmäßig verwendet werden soll.
 .
 Sie können diese Standard-Wortliste jederzeit ändern, indem Sie \"select-default-wordlist\" ausführen.
";
$elem["dictionaries-common/default-wordlist"]["descriptionfr"]="Quel dictionnaire de type « liste de mots » faut-il utiliser par défaut ?
 Plusieurs dictionnaires de type « liste de mots » (« wordlist ») sont installés sur le système. Choisissez celui que les applications utiliseront par défaut.
 .
 Vous pouvez changer le dictionnaire « liste de mots » par défaut à tout moment avec la commande « select-default-wordlist ».
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
 Einiges Material unter /usr/dict, was kein Symlink nach /usr/share/dict ist, wurde in Ihrem System gefunden.  /usr/share/dict ist jetzt der FHS-Ort für diese Dateien. Alles unter /usr/share/dict kann nach /usr/share/dict/pre-FHS verschoben und ein Symlink /usr/dict -> /usr/share/dict angelegt werden.
 .
 Obwohl kein aktuelles Debian-Paket den überholten /usr/dict-Ort benutzt, kann das Fehlen des Symlinks einige Ihrer alten Anwendungen, die ihn noch benutzen, beeinträchtigen. Es wird deshalb empfohlen,diese Dateien verschieben und den Link anlegen zu lassen.
";
$elem["dictionaries-common/move_old_usr_dict"]["descriptionfr"]="Faut-il déplacer les objets non conformes au FHS ?
 Certains fichiers ont été détectés dans /usr/dict et ne sont pas des liens symboliques vers /usr/share/dict. Selon le FHS (« Filesystem Hierarchy Standard » : norme sur l'organisation des fichiers), ces fichiers doivent désormais se trouver dans /usr/share/dict. Si vous choisissez cette option, tout ce qui se trouve dans /usr/dict sera déplacé dans /usr/dict-pre-FHS et un lien symbolique de /usr/dict vers /usr/share/dict sera établi. Vous devrez alors vérifier vous-même le contenu de ce nouveau répertoire et déplacer les fichiers vers l'emplacement conforme au FHS. Si vous ne choisissez pas cette option,rien ne sera modifié.
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
$elem["dictionaries-common/old_wordlist_link"]["descriptionde"]="Obsoleten Link /etc/dictionary löschen?
 Es gibt einen Link /etc/dictionary auf Ihrem System.  Dieser ist überholt und hat keinerlei Funktion mehr.  Es wird dringend empfohlen, die Entfernung dieses Links zu erlauben.
 .
 Sie werden aufgefordert, während der Installation der Wortlisten-Pakete die Standard-Wortliste auszuwählen.  Sie können Ihre Auswahl jederzeit durch Aufruf von »select-default-wordlist« ändern.
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
$elem["dictionaries-common/ispell-autobuildhash-message"]["descriptionde"]="Probleme beim Neubauen eines ${xxpell} Hash-Datei (${hashfile})
 ** Fehler: ${errormsg}
 .
 Dieser Fehler wurde durch ein ${hashfile} beinhaltendes Paket verursacht, obwohl es erst durch das postinst eines anderen Paketes zum Vorschein kommen kann. Bitte beschweren Sie sich bei dem Maintainer des Paketes, das '${hashfile}' enthält.
 .
 Bis dieses Problem behoben ist, werden Sie nicht in der Lage sein ${xxpell} mit '${hashfile}' zu benutzen.
";
$elem["dictionaries-common/ispell-autobuildhash-message"]["descriptionfr"]="Problèmes lors de la reconstruction de la table de hachage ${hashfile} de ${xxpell}
 Erreur : ${errormsg}
 .
 Cette erreur a été provoquée par le paquet qui fournit ${hashfile} bien que l'erreur ne devienne visible que lors de la post-installation d'un autre paquet. Veuillez rapporter ce bogue au responsable du paquet qui fournit le fichier ${hashfile}.
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
$elem["dictionaries-common/remove_old_usr_dict_link"]["descriptionde"]="Überholten /usr/dict-Symlink löschen?
 Ein nicht-FHS /usr/dict Symlink wurde gefunden. Weil er überholt ist, benutzt kein Debian-Paket diesen Ort und keines Ihrer Programme sollte ihn voraussetzen; es wird deswegen empfohlen, einer Entfernung zuzustimmen.
 .
 Wenn Sie aus irgendeinem Grund diesen Symlink brauchen, erstellen Sie ihn nochmal, aber es wird empfohlen Ihre alten Programme zu korrigieren um den aktuellen /usr/share/dict-Ort zu benutzen.
";
$elem["dictionaries-common/remove_old_usr_dict_link"]["descriptionfr"]="Faut-il supprimer le lien obsolète /usr/dict ?
 Un lien symbolique non conforme au FHS (« Filesystem Hierarchy Standard », norme d'organisation des fichiers) a été trouvé. Étant donné qu'il est obsolète, plus aucun paquet Debian ne l'utilise et aucun de vos programmes ne devrait en dépendre. Il vous est donc fortement conseillé d'accepter sa suppression.
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
$elem["dictionaries-common/selecting_ispell_wordlist_default"]["descriptionde"]="Standard-Werte für ispell-Wörterbücher/Wortlisten werden nicht hier gesetzt.
 Ausführen von 'dpkg-reconfigure dictionaries.common' wird nicht die Standard-Werte für ispell-Wörterbücher/Wortlisten setzen - ebenso wie 'dpkg-reconfigure ispell' nicht das Standard-ispell-Wörterbuch setzen wird.
 .
 Benutzen Sie statt dessen 'select-default-ispell' oder 'select-default-wordlist'.
";
$elem["dictionaries-common/selecting_ispell_wordlist_default"]["descriptionfr"]="Pas de valeurs par défaut de dictionnaires pour ispell
 La commande « dpkg-reconfigure dictionaries-common » ne définira pas les valeurs par défaut des dictionnaires ou des listes de mots pour ispell. La commande « dpkg-reconfigure ispell » ne définira pas le dictionnaire par défaut pour ispell.
 .
 Veuillez plutôt utiliser les scripts « select-default-ispell » ou « select-default-wordlist ».
";
$elem["dictionaries-common/selecting_ispell_wordlist_default"]["default"]="";
PKG_OptionPageTail2($elem);
?>
