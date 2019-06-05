<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("apt-listchanges");

$elem["apt-listchanges/frontend"]["type"]="select";
$elem["apt-listchanges/frontend"]["choices"][1]="pager";
$elem["apt-listchanges/frontend"]["choices"][2]="browser";
$elem["apt-listchanges/frontend"]["choices"][3]="xterm-pager";
$elem["apt-listchanges/frontend"]["choices"][4]="xterm-browser";
$elem["apt-listchanges/frontend"]["choices"][5]="gtk";
$elem["apt-listchanges/frontend"]["choices"][6]="text";
$elem["apt-listchanges/frontend"]["choices"][7]="mail";
$elem["apt-listchanges/frontend"]["choicesde"][1]="Anzeigeprogramm";
$elem["apt-listchanges/frontend"]["choicesde"][2]="Browser";
$elem["apt-listchanges/frontend"]["choicesde"][3]="Xterm-Anzeigeprogramm";
$elem["apt-listchanges/frontend"]["choicesde"][4]="Xterm-Browser";
$elem["apt-listchanges/frontend"]["choicesde"][5]="GTK";
$elem["apt-listchanges/frontend"]["choicesde"][6]="Text";
$elem["apt-listchanges/frontend"]["choicesde"][7]="E-Mail";
$elem["apt-listchanges/frontend"]["choicesfr"][1]="Pageur";
$elem["apt-listchanges/frontend"]["choicesfr"][2]="Navigateur";
$elem["apt-listchanges/frontend"]["choicesfr"][3]="Pageur xterm";
$elem["apt-listchanges/frontend"]["choicesfr"][4]="Navigateur xterm";
$elem["apt-listchanges/frontend"]["choicesfr"][5]="GTK";
$elem["apt-listchanges/frontend"]["choicesfr"][6]="Texte";
$elem["apt-listchanges/frontend"]["choicesfr"][7]="Courriel";
$elem["apt-listchanges/frontend"]["description"]="Method to be used to display changes:
 Changes in packages can be displayed in various ways by apt-listchanges:
 .
  pager        : display changes one page at a time;
  browser      : display HTML-formatted changes using a web browser;
  xterm-pager  : like pager, but in an xterm in the background;
  xterm-browser: like browser, but in an xterm in the background;
  gtk          : display changes in a GTK window;
  text         : print changes to the terminal (without pausing);
  mail         : only send changes via e-mail;
  none         : do not run automatically from APT.
 .
 This setting can be overridden at execution time. By default, all the
 options except for 'none' will also send copies by mail.
";
$elem["apt-listchanges/frontend"]["descriptionde"]="Methode, die zum Anzeigen der Änderungen verwendet wird:
 Änderungen in Paketen können von Apt-listchanges auf verschiedene Arten dargestellt werden:
 .
  Anzeigeprogramm: zeigt die Änderungen seitenweise an
  Browser        : zeigt HTML-formatierte Änderungen mit einem
                   Web-Browser an
  Xterm-Anzeigeprogramm: wie Anzeigeprogramm, aber in einem Xterm im
                         Hintergrund
  Xterm-Browser  : wie Browser, aber in einem Xterm im Hintergrund
  GTK            : zeigt die Änderungen in einem GTK-Fenster
  Text           : schreibt die Änderungen in ein Terminal (ohne Unterbrechung)
  E-Mail         : sendet die Änderungen nur per E-Mail
  Gar nicht      : nicht automatisch von APT aus ausführen
 .
 Diese Einstellung kann bei der Ausführung überschrieben werden. Standardmäßig wird bei allen Optionen außer »Gar nicht« auch eine Kopie per E-Mail verschickt.
";
$elem["apt-listchanges/frontend"]["descriptionfr"]="Méthode d'affichage des changements :
 Les modifications intervenues dans les paquets peuvent être affichées de plusieurs manières par apt-listchanges :
 .
  Pageur           : utilisation d’un pageur (logiciel de pagination) ;
  Navigateur       : affichage dans un navigateur ;
  Pageur xterm     : pageur dans un xterm en tâche de fond ;
  Navigateur xterm : navigateur dans un xterm en tâche de fond ;
  GTK              : affichage dans une fenêtre GTK ;
  Texte            : affichage sur le terminal (sans pause) ;
  Courriel         : envoi des changements par courrier électronique ;
  Aucun            : ne pas exécuter apt-listchanges depuis APT.
 .
 Ce réglage peut être remplacé par un autre à l'exécution de la commande. Pour tous les choix (sauf « Aucun »), une copie sera également envoyée par courrier électronique.
";
$elem["apt-listchanges/frontend"]["default"]="pager";
$elem["apt-listchanges/email-address"]["type"]="string";
$elem["apt-listchanges/email-address"]["description"]="E-mail address(es) which will receive changes:
 Optionally, apt-listchanges can e-mail a copy of displayed changes to
 a specified address.
 .
 Multiple addresses may be specified, delimited by commas. Leaving this
 field empty disables mail notifications.
";
$elem["apt-listchanges/email-address"]["descriptionde"]="E-Mail-Adresse(n), die die Änderungen erhalten werden:
 Apt-listchanges kann optional eine Kopie der angezeigten Änderungen an eine angegebene Adresse versenden.
 .
 Mehrere Adressen können, durch Kommata getrennt, angegeben werden. Falls Sie dieses Feld leer lassen, wird der E-Mail-Versand deaktiviert.
";
$elem["apt-listchanges/email-address"]["descriptionfr"]="Adresse(s) électronique(s) de réception des changements :
 Apt-listchanges peut envoyer une copie des changements par courrier électronique.
 .
 Plusieurs adresses peuvent être utilisées et doivent alors être séparées par des virgules. Si ce champ est laissé vide, les notifications par courrier électronique seront désactivées.
";
$elem["apt-listchanges/email-address"]["default"]="root";
$elem["apt-listchanges/email-format"]["type"]="select";
$elem["apt-listchanges/email-format"]["choices"][1]="text";
$elem["apt-listchanges/email-format"]["choicesde"][1]="Text";
$elem["apt-listchanges/email-format"]["choicesfr"][1]="Texte";
$elem["apt-listchanges/email-format"]["description"]="Format of e-mail messages:
 Please choose a format for e-mail copies of the displayed changes -
 either plain text or HTML with clickable links.
";
$elem["apt-listchanges/email-format"]["descriptionde"]="Format der E-Mail-Nachrichten:
 Bitte wählen Sie ein Format der E-Mail-Kopien der angezeigten Nachrichten aus - entweder reiner Text oder HTML mit anklickbaren Links.
";
$elem["apt-listchanges/email-format"]["descriptionfr"]="Format du courrier électronique :
 Veuillez choisir le format d'affichage de la copie des changements envoyés par courrier électronique — soit en texte brut, soit en HTML avec des liens cliquables.
";
$elem["apt-listchanges/email-format"]["default"]="text";
$elem["apt-listchanges/confirm"]["type"]="boolean";
$elem["apt-listchanges/confirm"]["description"]="Prompt for confirmation after displaying changes?
 After displaying the list of changes, apt-listchanges can pause with
 a confirmation prompt. This is useful when running from APT, as it
 offers an opportunity to abort the upgrade if a change is unwelcome.
 .
 This can be overridden at execution time, and has no effect if the
 configured frontend option is 'mail' or 'none'.
";
$elem["apt-listchanges/confirm"]["descriptionde"]="Soll Apt-listchanges nach dem Anzeigen der Änderungen um eine Bestätigung bitten?
 Nachdem Apt-listchanges die Änderungen angezeigt hat, kann es unterbrechen und um eine Bestätigung bitten. Das ist nützlich, wenn Apt-listchanges von APT gestartet wird, da so die Möglichkeit besteht, das Upgrade abzubrechen, falls eine Änderung nicht gewünscht wird.
 .
 Dies kann bei der Ausführung überschrieben werden und hat keinen Effekt, falls die konfigurierte Oberflächenoption »E-Mail« oder »Gar nicht« lautet.
";
$elem["apt-listchanges/confirm"]["descriptionfr"]="Voulez-vous une fenêtre de confirmation après l'affichage des changements ?
 Après vous avoir montré les changements, apt-listchanges peut s'interrompre avec une demande de confirmation. Cette fonctionnalité est utile quand apt-listchanges est lancé à partir d'APT, car cela permet d'annuler une mise à niveau en cas de changement non désiré.
 .
 Ce réglage peut être remplacé par un autre à l'exécution de la commande et n'a pas d'effet si la méthode d'envoi choisie est « Aucun » ou « Courriel ».
";
$elem["apt-listchanges/confirm"]["default"]="false";
$elem["apt-listchanges/headers"]["type"]="boolean";
$elem["apt-listchanges/headers"]["description"]="Insert headers before changelogs?
 apt-listchanges can insert a header before each package's changelog
 showing the name of the package, and the names of the binary packages
 which are being upgraded (when different from the source package name).
 .
 Note however that displaying headers might make the output a bit harder
 to read as they might contain long lists of names of binary packages.
";
$elem["apt-listchanges/headers"]["descriptionde"]="Kopfzeilen vor Changelogs einfügen?
 Apt-listchanges kann Kopfzeilen vor den Changelogs jedes Pakets einfügen, die den Namen des Pakets und die Namen der Binärpakete (wenn diese sich vom Quellpaketnamen unterscheiden) zeigen, von denen ein Upgrade durchgeführt wird.
 .
 Beachten Sie allerdings, dass die Anzeige der Kopfzeilen die Ausgabe etwas schwerer lesbar machen könnte, da sie lange Listen von Namen der Binärpakete enthalten könnte.
";
$elem["apt-listchanges/headers"]["descriptionfr"]="Voulez-vous ajouter des en-têtes avant les changements ?
 Apt-listchanges peut ajouter un en-tête avant l'affichage des changements de chaque paquet en indiquant son nom ainsi que le nom des paquets binaires qui sont mis à niveau (quand le nom du paquet source est différent).
 .
 Cependant, notez que l'affichage des en-têtes peut rendre la sortie plus difficile à lire lorsque la liste des paquets binaires est longue.
";
$elem["apt-listchanges/headers"]["default"]="false";
$elem["apt-listchanges/no-network"]["type"]="boolean";
$elem["apt-listchanges/no-network"]["description"]="Disable retrieving changes over network?
 In rare cases when a binary package does not contain a changelog file,
 apt-listchanges by default executes the command \"apt-get changelog\",
 which tries to download changelog entries from the network.
 .
 This option can disable this behavior, which might for example be
 useful for systems with limited network connectivity.
";
$elem["apt-listchanges/no-network"]["descriptionde"]="Ermittlung von Änderungen über das Netz deaktivieren?
 In seltenen Fällen, bei denen ein Binärpaket keine Changelog-Datei enthält, führt Apt-listchanges standardmäßig den Befehl »apt-get changelog« aus, der versucht, die Changelog-Einträge über das Netz herunterzuladen.
 .
 Diese Option kann dieses Verhalten deaktivieren. Das kann beispielsweise für Systeme mit begrenzter Netzverbindung nützlich sein.
";
$elem["apt-listchanges/no-network"]["descriptionfr"]="Voulez-vous désactiver la récupération des changements à l'aide du réseau ?
 Dans de rares cas, quand le paquet binaire ne contient pas de fichier de changement, apt-listchanges exécute par défaut la commande « apt-get changelog » pour tenter de télécharger les changements depuis le réseau.
 .
 Cette option peut désactiver ce comportement. Cela peut être utile, par exemple, sur un système ayant une connexion au réseau limitée.
";
$elem["apt-listchanges/no-network"]["default"]="false";
$elem["apt-listchanges/reverse"]["type"]="boolean";
$elem["apt-listchanges/reverse"]["description"]="Show changes in reverse order?
 By default apt-listchanges shows changes for each package in the order
 of their appearance in the relevant changelog or news files - from the
 most recent version of the package to the oldest.
 .
 Optionally apt-listchanges can display changes in the opposite order,
 which some may find more natural: from the oldest changes in the
 package to the newest.
";
$elem["apt-listchanges/reverse"]["descriptionde"]="Änderungen in umgekehrter Reihenfolge anzeigen?
 Standardmäßig zeigt Apt-listchanges die Änderungen für jedes Paket in der Reihenfolge ihres Auftretens in der relevanten Changelog- oder News-Datei an - von der neusten Version des Pakets bis zur ältesten.
 .
 Optional kann Apt-listchanges die Änderungen in der entgegengesetzten Reihenfolge anzeigen, die manche Leute als natürlicher empfinden: von den ältesten Änderungen im Paket zu den neusten.
";
$elem["apt-listchanges/reverse"]["descriptionfr"]="Voulez-vous afficher les changements dans l'ordre inverse ?
 Par défaut, apt-listchanges affiche les changements de chaque paquet dans l'ordre d'apparition de changements ou de nouveaux fichiers appropriés, de la version la plus récente du paquet à la version la plus ancienne.
 .
 En option, apt-listchanges peut afficher les changements dans l'ordre inverse, certaines personnes trouvent cela plus naturel : des changements les plus anciens aux plus récents.
";
$elem["apt-listchanges/reverse"]["default"]="false";
$elem["apt-listchanges/save-seen"]["type"]="boolean";
$elem["apt-listchanges/save-seen"]["description"]="Should apt-listchanges skip changes that have already been seen?
 A record of already displayed changes can be kept in order to avoid
 displaying them again. This is useful, for example, when retrying an upgrade.
";
$elem["apt-listchanges/save-seen"]["descriptionde"]="Soll Apt-listchanges bereits gesehene Einträge überspringen?
 Es kann vermerkt werden, welche Änderungen bereits angezeigt wurden, um ein erneutes Anzeigen zu vermeiden. Dies ist beispielsweise nützlich, falls ein Upgrade erneut versucht wird.
";
$elem["apt-listchanges/save-seen"]["descriptionfr"]="Voulez-vous qu'apt-listchanges ignore les changements déjà affichés ?
 Un enregistrement des changements déjà affichés est conservé, ce qui permet de les ignorer ultérieurement. Cela peut être utile, par exemple, lors d'une nouvelle tentative de mise à niveau.
";
$elem["apt-listchanges/save-seen"]["default"]="true";
$elem["apt-listchanges/which"]["type"]="select";
$elem["apt-listchanges/which"]["choices"][1]="news";
$elem["apt-listchanges/which"]["choices"][2]="changelogs";
$elem["apt-listchanges/which"]["choicesde"][1]="News-Dateien";
$elem["apt-listchanges/which"]["choicesde"][2]="Changelog-Dateien";
$elem["apt-listchanges/which"]["choicesfr"][1]="Nouveautés";
$elem["apt-listchanges/which"]["choicesfr"][2]="Journaux";
$elem["apt-listchanges/which"]["description"]="Changes displayed with APT:
 Please choose which type of changes should be displayed with APT.
 .
  news      : important news items only;
  changelogs: detailed changelogs only;
  both      : news and changelogs.
";
$elem["apt-listchanges/which"]["descriptionde"]="Mit APT angezeigte Änderungen:
 Bitte wählen Sie aus, welche Arten von Änderungen von APT angezeigt werden sollen.
 .
  News-Dateien     : Nur wichtige Neuigkeiten
  Changelog-Dateien: Nur detaillierte Changelogs (Änderungen)
  Beide            : Wichtige Neuigkeiten und detaillierte Changelogs
";
$elem["apt-listchanges/which"]["descriptionfr"]="Changements affichés avec APT :
 Veuillez choisir les types de changement affichés avec APT.
 .
  Nouveautés : seulement les nouveautés importantes ;
  Journaux   : seulement les journaux détaillés des changements ;
  Les deux   : nouveautés et journaux.
";
$elem["apt-listchanges/which"]["default"]="news";
PKG_OptionPageTail2($elem);
?>
