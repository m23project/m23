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
  Gar nicht      : nicht automatisch von APT aus ausführen.
 .
 Diese Einstellung kann bei der Ausführung überschrieben werden. Standardmäßig werden alle Oberflächen außer »Gar nicht« auch eine Kopie per E-Mail verschicken.
";
$elem["apt-listchanges/frontend"]["descriptionfr"]="Méthode d'affichage des changements :
 Les modifications intervenues dans les paquets peuvent être affichées de plusieurs manières par apt-listchanges :
 .
  Pageur           : utilise un pageur (logiciel de pagination) ;
  Navigateur       : affiche dans un navigateur ;
  Pageur xterm     : pageur dans un xterm en tâche de fond ;
  Navigateur xterm : navigateur dans un xterm en tâche de fond ;
  GTK              : affiche dans une fenêtre GTK ;
  Texte            : affiche sur le terminal (sans pause) ;
  Courriel         : envoie les changements par courrier électronique ;
  Aucun            : ne pas exécuter apt-listchanges depuis APT.
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
 Mehrere Adressen können, durch Kommata getrennt, angegeben werden. Falls Sie dieses Feld leer lassen wird der E-Mail-Versand deaktiviert.
";
$elem["apt-listchanges/email-address"]["descriptionfr"]="Adresse(s) électronique(s) de réception des changements :
 Apt-listchanges peut envoyer une copie des changements par courrier électronique.
 .
 Plusieurs adresses peuvent être utilisées et doivent alors être séparées par des virgules. Si ce champ est laissé vide, les notifications par courrier électronique seront désactivées.
";
$elem["apt-listchanges/email-address"]["default"]="root";
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
 Nachdem Apt-listchanges die Änderungen angezeigt hat, kann es unterbrechen und um eine Bestätigung bitten. Das ist nützlich, wenn Apt-listchanges von APT gestartet wird, da so eine Gelegenheit gegeben wird, das Upgrade abzubrechen, falls eine Änderungen nicht gewünscht wird.
 .
 Dies kann bei der Ausführung überschrieben werden und hat keinen Effekt, falls die konfigurierte Oberflächenoption »E-Mail« oder »Gar nicht« lautet.
";
$elem["apt-listchanges/confirm"]["descriptionfr"]="Faut-il demander une confirmation après l'affichage des changements ?
 Après vous avoir montré les changements, apt-listchanges peut s'interrompre avec demande de confirmation. Cette fonctionnalité est utile quand apt-listchanges est lancé à partir d'APT, car cela permet d'annuler une mise à jour en cas de changement non désiré.
 .
 Ce réglage peut être remplacé par un autre à l'exécution de la commande et n'a pas d'effet si la méthode d'envoi choisie est « Aucun » ou « Courriel ». 
";
$elem["apt-listchanges/confirm"]["default"]="false";
$elem["apt-listchanges/save-seen"]["type"]="boolean";
$elem["apt-listchanges/save-seen"]["description"]="Should apt-listchanges skip changes that have already been seen?
 A record of already displayed changes can be kept in order to avoid
 displaying them again. This is useful, for example, when retrying an upgrade.
";
$elem["apt-listchanges/save-seen"]["descriptionde"]="Soll Apt-listchanges bereits gesehene Einträge überspringen?
 Es kann vermerkt werden, welche Änderungen bereits angezeigt wurden, um ein erneutes Anzeigen zu vermeiden. Dies ist beispielsweise nützlich, falls ein Upgrade erneut versucht wird.
";
$elem["apt-listchanges/save-seen"]["descriptionfr"]="Faut-il ignorer les changements déjà affichés ?
 Un enregistrement des changements déjà affichés est conservé, ce qui permet de les ignorer ultérieurement. Cela peut être utile, par exemple, lors d'une nouvelle tentative de mise à jour.
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
 Veuillez choisir le type de changements affichés avec apt.
 .
  Nouveautés : seulement les nouveautés importantes ;
  Journaux   : seulement les journaux des changements détaillés ;
  Les deux   : nouveautés et journaux.
";
$elem["apt-listchanges/which"]["default"]="news";
PKG_OptionPageTail2($elem);
?>
