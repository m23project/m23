<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("geneweb");

$elem["geneweb/lang"]["type"]="select";
$elem["geneweb/lang"]["choices"][1]="Afrikaans";
$elem["geneweb/lang"]["choices"][2]="Bulgarian";
$elem["geneweb/lang"]["choices"][3]="Breton";
$elem["geneweb/lang"]["choices"][4]="Catalan; Valencian";
$elem["geneweb/lang"]["choices"][5]="Chinese";
$elem["geneweb/lang"]["choices"][6]="Czech";
$elem["geneweb/lang"]["choices"][7]="Danish";
$elem["geneweb/lang"]["choices"][8]="Dutch; Flemish";
$elem["geneweb/lang"]["choices"][9]="English";
$elem["geneweb/lang"]["choices"][10]="Esperanto";
$elem["geneweb/lang"]["choices"][11]="Estonian";
$elem["geneweb/lang"]["choices"][12]="Finnish";
$elem["geneweb/lang"]["choices"][13]="French";
$elem["geneweb/lang"]["choices"][14]="German";
$elem["geneweb/lang"]["choices"][15]="Hebrew";
$elem["geneweb/lang"]["choices"][16]="Icelandic";
$elem["geneweb/lang"]["choices"][17]="Italian";
$elem["geneweb/lang"]["choices"][18]="Latvian";
$elem["geneweb/lang"]["choices"][19]="Norwegian";
$elem["geneweb/lang"]["choices"][20]="Polish";
$elem["geneweb/lang"]["choices"][21]="Portuguese";
$elem["geneweb/lang"]["choices"][22]="Romanian";
$elem["geneweb/lang"]["choices"][23]="Russian";
$elem["geneweb/lang"]["choices"][24]="Slovenian";
$elem["geneweb/lang"]["choices"][25]="Spanish; Castilian";
$elem["geneweb/lang"]["choicesde"][1]="Afrikaans";
$elem["geneweb/lang"]["choicesde"][2]="Bulgarisch";
$elem["geneweb/lang"]["choicesde"][3]="Bretonisch";
$elem["geneweb/lang"]["choicesde"][4]="Katalanisch";
$elem["geneweb/lang"]["choicesde"][5]="Chinesisch";
$elem["geneweb/lang"]["choicesde"][6]="Tschechisch";
$elem["geneweb/lang"]["choicesde"][7]="Dänisch";
$elem["geneweb/lang"]["choicesde"][8]="Niederländisch; Flämisch";
$elem["geneweb/lang"]["choicesde"][9]="Englisch";
$elem["geneweb/lang"]["choicesde"][10]="Esperanto";
$elem["geneweb/lang"]["choicesde"][11]="Estnisch";
$elem["geneweb/lang"]["choicesde"][12]="Finnisch";
$elem["geneweb/lang"]["choicesde"][13]="Französisch";
$elem["geneweb/lang"]["choicesde"][14]="Deutsch";
$elem["geneweb/lang"]["choicesde"][15]="Hebräisch";
$elem["geneweb/lang"]["choicesde"][16]="Isländisch";
$elem["geneweb/lang"]["choicesde"][17]="Italienisch";
$elem["geneweb/lang"]["choicesde"][18]="Lettisch";
$elem["geneweb/lang"]["choicesde"][19]="Norwegisch";
$elem["geneweb/lang"]["choicesde"][20]="Polnisch";
$elem["geneweb/lang"]["choicesde"][21]="Portugiesisch";
$elem["geneweb/lang"]["choicesde"][22]="Rumänisch";
$elem["geneweb/lang"]["choicesde"][23]="Russisch";
$elem["geneweb/lang"]["choicesde"][24]="Slowenisch";
$elem["geneweb/lang"]["choicesde"][25]="Spanisch (Kastilisch)";
$elem["geneweb/lang"]["choicesfr"][1]="Afrikaans";
$elem["geneweb/lang"]["choicesfr"][2]="Bulgare";
$elem["geneweb/lang"]["choicesfr"][3]="Breton";
$elem["geneweb/lang"]["choicesfr"][4]="Catalan";
$elem["geneweb/lang"]["choicesfr"][5]="Chinois";
$elem["geneweb/lang"]["choicesfr"][6]="Tchèque";
$elem["geneweb/lang"]["choicesfr"][7]="Danois";
$elem["geneweb/lang"]["choicesfr"][8]="Néerlandais";
$elem["geneweb/lang"]["choicesfr"][9]="Anglais";
$elem["geneweb/lang"]["choicesfr"][10]="Espéranto";
$elem["geneweb/lang"]["choicesfr"][11]="Estonien";
$elem["geneweb/lang"]["choicesfr"][12]="Finnois";
$elem["geneweb/lang"]["choicesfr"][13]="Français";
$elem["geneweb/lang"]["choicesfr"][14]="Allemand";
$elem["geneweb/lang"]["choicesfr"][15]="Hébreu";
$elem["geneweb/lang"]["choicesfr"][16]="Islandais";
$elem["geneweb/lang"]["choicesfr"][17]="Italien";
$elem["geneweb/lang"]["choicesfr"][18]="Letton";
$elem["geneweb/lang"]["choicesfr"][19]="Norvégien";
$elem["geneweb/lang"]["choicesfr"][20]="Polonais";
$elem["geneweb/lang"]["choicesfr"][21]="Portugais";
$elem["geneweb/lang"]["choicesfr"][22]="Roumain";
$elem["geneweb/lang"]["choicesfr"][23]="Russe";
$elem["geneweb/lang"]["choicesfr"][24]="Slovène";
$elem["geneweb/lang"]["choicesfr"][25]="Castillan";
$elem["geneweb/lang"]["description"]="Geneweb default language:
 Geneweb can display its prompts in a number of languages.
 .
 Select a default language for Geneweb to use in its page rendering.
 .
 Other languages will still be available.
";
$elem["geneweb/lang"]["descriptionde"]="Standardsprache in Geneweb:
 Geneweb kann Meldungen in verschiedenen Sprachen anzeigen.
 .
 Bitte wählen Sie die Standardsprache aus, in der Geneweb die Seiten erstellen soll.
 .
 Andere Sprachen bleiben weiterhin verfügbar.
";
$elem["geneweb/lang"]["descriptionfr"]="Langue par défaut pour Geneweb :
 Geneweb peut afficher ses messages dans plusieurs langues.
 .
 Sélectionnez une langue qui sera utilisée par défaut par Geneweb pour l'affichage.
 .
 Les autres langues resteront toutefois disponibles.
";
$elem["geneweb/lang"]["default"]="English";
$elem["geneweb/port"]["type"]="string";
$elem["geneweb/port"]["description"]="Geneweb daemon listening port:
 The port used by the geneweb daemon (gwd) for incoming connections may be configured here.
 .
 Choose a port number above 1023 for the port gwd will listen to.
 .
 If unsure, leave the default value of 2317.
";
$elem["geneweb/port"]["descriptionde"]="Port für den Geneweb-Daemon:
 Der Port, auf dem der Geneweb-Daemon »lauschen« soll, kann hier konfiguriert werden.
 .
 Wählen Sie eine Portnummer über 1023 für den Port, auf dem gwd »lauschen« soll.
 .
 Wenn Sie sich unsicher sind, belassen Sie den Standardwert auf 2317.
";
$elem["geneweb/port"]["descriptionfr"]="Port d'écoute du démon de Geneweb :
 Le port utilisé par le démon de geneweb (gwd) pour les connexions entrantes peut être configuré ici.
 .
 Choisissez un numéro de port supérieur à 1023 pour le port où gwd écoutera.
 .
 Si vous avez des doutes, laissez la valeur par défaut de 2317.
";
$elem["geneweb/port"]["default"]="2317";
$elem["geneweb/run_mode"]["type"]="select";
$elem["geneweb/run_mode"]["choices"][1]="Always on";
$elem["geneweb/run_mode"]["choicesde"][1]="Immer aktiv";
$elem["geneweb/run_mode"]["choicesfr"][1]="Toujours actif";
$elem["geneweb/run_mode"]["description"]="Geneweb start mode:
 The Geneweb daemon gwd can be launched automatically at startup,
 manually by the system administrator, or by any user when it is needed.
 .
 If you choose \"Always on\", Geneweb will be launched at the system startup.
 .
 If you want to prevent the automatic startup of Geneweb, for
 example if you prefer to run it as a CGI program, then choose \"Manual\".
";
$elem["geneweb/run_mode"]["descriptionde"]="Geneweb Start-Modus:
 Der Geneweb-Daemon gwd kann automatisch beim Startvorgang, manuell vom Systemadministrator oder bei Bedarf von einem Benutzer gestartet werden.
 .
 Wenn Sie »Immer aktiv« auswählen, wird Geneweb bei jedem Startvorgang gestartet.
 .
 Wenn Sie den automatischen Start von Geneweb verhindern möchten, z.B. weil Sie es vorziehen, das Programm als CGI laufen zu lassen, dann wählen Sie bitte »Manuell«.
";
$elem["geneweb/run_mode"]["descriptionfr"]="Mode de démarrage de Geneweb :
 Le démon gwd de Geneweb peut être lancé automatiquement au démarrage du système, manuellement par l'administrateur du système ou par tout utilisateur quand il en a besoin.
 .
 Si vous choisissez « Toujours actif », Geneweb sera lancé au démarrage du système.
 .
 Si vous préférez éviter le démarrage automatique de Geneweb, par exemple si vous préférez l'utiliser par le biais d'un programme CGI, choisissez alors « Démarrage manuel ».
";
$elem["geneweb/run_mode"]["default"]="Always on";
$elem["geneweb/remainingdir"]["type"]="note";
$elem["geneweb/remainingdir"]["description"]="Old directory /var/geneweb not removed
 Previous versions of both official and unofficial packages for Geneweb
 used non FHS-compliant /var/geneweb directory for storing databases.
 .
 It has been detected that this directory was used on your system. Some
 files have been moved from there to /var/lib/geneweb but the geneweb
 installation scripts found some unexpected files in /var/geneweb.
 .
 Thus the directory has been left intact. It is highly recommended that you
 check the remaining files there and move them to /var/lib/geneweb, then
 remove the /var/geneweb directory.
";
$elem["geneweb/remainingdir"]["descriptionde"]="Altes Verzeichnis /var/geneweb wurde nicht gelöscht.
 Die vorherigen beiden offiziellen und inoffiziellen Paketversionen von Geneweb benutzten eine nicht FHS-kompatible Verzeichnisstruktur, um die Datenbank zu speichern.
 .
 Es wurde auf Ihrem System festgestellt, dass dieses Verzeichnis benutzt wurde. Einige Dateien wurden von dort nach /var/lib/geneweb verschoben, aber die geneweb-Installationsskripte haben einige unerwartete Dateien in /var/geneweb gefunden.
 .
 Deswegen wurde das Verzeichnis nicht verändert. Es wird dringend empfohlen, dass Sie die dortigen Dateien prüfen, nach /var/lib/geneweb verschieben und dann /var/geneweb löschen.
";
$elem["geneweb/remainingdir"]["descriptionfr"]="Ancien répertoire /var/geneweb non effacé
 Les versions antérieures officielles ou non du paquet Geneweb utilisaient un répertoire /var/geneweb non conforme au FHS (Filesystem Hierarchy Standard) pour le stockage des bases généalogiques gérées par le démon gwd.
 .
 Ce répertoire a été détecté sur votre système. Certains fichiers ont été automatiquement déplacés vers le répertoire /var/lib/geneweb mais les scripts d'installation de geneweb ont trouvé d'autres fichiers inattendus dans /var/geneweb.
 .
 Par conséquence, le répertoire /var/geneweb a été laissé intact. Il vous est fortement recommandé d'y vérifier les fichiers restants et de les déplacer dans /var/lib/geneweb. Ensuite, effacez le répertoire /var/geneweb.
";
$elem["geneweb/remainingdir"]["default"]="";
$elem["geneweb/remove_databases"]["type"]="boolean";
$elem["geneweb/remove_databases"]["description"]="Remove Geneweb database directory on package purge?
 Geneweb's databases will be stored in the database directory /var/lib/geneweb.
 These databases may be put there by authorized users who must be members of
 the \"geneweb\" group.
 .
 Please choose whether you want to remove databases automatically when
 purging the package (completely removing it).
 .
 THIS WOULD ERASE USER-OWNED DATA. You have to be sure if you accept the
 purge.
 .
 Note that if this directory is empty at the time you purge or simply
 remove the package, it will always be automatically removed.
";
$elem["geneweb/remove_databases"]["descriptionde"]="Soll das Datenbank-Verzeichnis beim Entfernen von geneweb mit gelöscht werden?
 Genewebs Datenbanken werden im Datenbank-Verzeichnis /var/lib/geneweb gespeichert. Diese Datenbanken können dort von autorisierten Benutzern (Mitgliedern der Gruppe »geneweb«) angelegt werden.
 .
 Bitte wählen Sie aus, ob Sie beim Entfernen des Paketes (vollständiges Entfernen) die Datenbanken automatisch mit löschen möchten.
 .
 DIES LÖSCHT BENUTZEREIGENE DATEN. Sie sollten sich sicher sein, wenn Sie die nächste Frage mit »Ja« beantworten.
 .
 Beachten Sie: Falls das Verzeichnis beim Entfernen des Pakets leer ist, wird das Verzeichnis automatisch mit entfernt.
";
$elem["geneweb/remove_databases"]["descriptionfr"]="Effacer le répertoire des bases de Geneweb à la purge du paquet ?
 Les bases de données de Geneweb seront conservées dans /var/lib/geneweb. Ces bases seront placées à cet endroit par les utilisateurs autorisés qui doivent être membres du groupe « geneweb ».
 .
 Veuillez décider si vous souhaitez effacer automatiquement ces bases de données lors de la purge du paquet (la purge est l'effacement complet d'un paquet).
 .
 CELA REVIENT À L'EFFACEMENT DE DONNÉES D'UTILISATEURS. Vous devez être sûr de vous si vous acceptez cette purge.
 .
 Veuillez noter que si ce répertoire est vide au moment de la purge ou de l'effacement simple du paquet, il sera de toute manière automatiquement effacé.
";
$elem["geneweb/remove_databases"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
