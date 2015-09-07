<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("logtool");

$elem["logtool/manual"]["type"]="boolean";
$elem["logtool/manual"]["description"]="Manual configuration of logtool's database?
 Logtool needs a database with regular expressions that describe logfile
 entries that should be ignored, or considered less important. You can
 write this database manually, or use the very flexible database in the
 package logcheck-database for this purpose.
 .
 If you choose to use logcheck-database and already added values to the
 files in /etc/logtool, these files will be replaced by symbolic links in
 the logcheck database (although backups will be preserved). Make sure this
 is not unwanted behaviour.
 .
 Reply positively to manually write a database, or negatively to use the
 database from the package \"logcheck-database\".
 .
 Note: since logtool does not depend on this database (but instead
 Recommends it), the default answer to this question is to manually
 configure the database.
";
$elem["logtool/manual"]["descriptionde"]="Logtool-Datenbank manuell konfigurieren?
 Logtool benötigt eine Datenbank mit regulären Ausdrücken. Diese regulären Ausdrücke beschreiben die Einträge der Protokolldatei, die ignoriert werden sollen oder nicht so wichtig sind. Sie können diese Datenbank manuell anlegen oder die sehr flexible Datenbank im Paket logcheck-database dafür verwenden.
 .
 Wenn Sie sich für logcheck-database entscheiden und bereits Einträge zu den Dateien in /etc/logtool hinzugefügt haben, dann werden diese Dateien durch symbolische Links zur logcheck-Datenbank ersetzt (Sicherheitskopien werden trotzdem erstellt). Vergewissern Sie sich, dass Sie dies wirklich wollen.
 .
 Antworten Sie positiv, um die Datenbank manuell einzurichten, oder negativ, um die Datenbank des Paketes »logcheck-database« zu verwenden.
 .
 Anmerkung: Da das Logtool-Paket nicht von dieser Datenbank abhängt (es wird nur zur Installation empfohlen), ist die vorgegebene Standardantwort auf diese Frage, die Datenbank manuell zu konfigurieren.
";
$elem["logtool/manual"]["descriptionfr"]="Voulez-vous configurer vous-même la base de données de logtool ?
 Logtool utilise une base de données qui décrit par des expressions rationnelles les éléments à ignorer ou moins importants, dans les journaux. Vous pouvez créer vous-même cette base de données ou bien utiliser la base très flexible du paquet « logcheck-database ».
 .
 Si vous choisissez la base de données du paquet logcheck-database, les éventuels fichiers de configuration présents dans /etc/logtool seront remplacés par des liens symboliques vers la base logcheck (toutefois, les fichiers seront sauvegardés). Veuillez vérifier que ce comportement vous convient.
 .
 Choisissez cette option si vous préférez créer vous-même la base de données. Sinon, la base de données du paquet logcheck-database sera utilisée.
 .
 Note : comme ce paquet ne dépend pas de cette base de données (il se contente de la recommander), le choix par défaut est la création « manuelle » de la base de données.
";
$elem["logtool/manual"]["default"]="true";
$elem["logtool/ignore-start"]["type"]="select";
$elem["logtool/ignore-start"]["choices"][1]="paranoid";
$elem["logtool/ignore-start"]["choices"][2]="server";
$elem["logtool/ignore-start"]["description"]="Ignored template
 No longer used template (although its value is read for upgrade purposes),
 no need to translate it.

";
$elem["logtool/ignore-start"]["descriptionde"]="";
$elem["logtool/ignore-start"]["descriptionfr"]="";
$elem["logtool/ignore-start"]["default"]="paranoid";
$elem["logtool/use-level"]["type"]="boolean";
$elem["logtool/use-level"]["description"]="Do you want to use the '${level}' level regular expressions?
 The database in the logcheck-database package defines three levels:
 paranoid, server, and workstation; and it also has a database for cracking,
 violations, and ignored violations ('violations-ignore'). Logcheck allows you
 to pick one of the levels, and ignores the rest.
 .
 Logtool, on the other hand, can use multiple databases, which either
 specify lines that should be completely excluded from output
 (/etc/logtool/exclude) or lines that should be given a specific color
 (green, yellow, blue, magenta, cyan, brightcyan). There is also the
 possibility to not create an exclude file, and use an 'include' style of
 file instead; its use is not recommended. Last but not least, files that
 are not excluded from output but that do not match any other regular
 expression are colored red.
 .
 If you want to map the '${level}' level database of regular expressions to
 one of the above specified options, then answer positively to this
 question.
";
$elem["logtool/use-level"]["descriptionde"]="Wollen Sie die regulären Ausdrücke des Niveaus »${level}« verwenden?
 Die Datenbank im Paket logcheck-database definiert drei Niveaus: paranoid, server und workstation. Außerdem besitzt es eine Datenbank für cracking, violations (»Verletzungen«) und violations-ignore (»ignorierte Verletzungen«). Logcheck bietet Ihnen die Möglichkeit, ein Niveau zu wählen und den Rest zu ignorieren.
 .
 Logtool wiederum kann auch verschiedene Datenbanken verwenden, die entweder festlegen wie Zeilen aussehen, die vollständig von der Ausgabe ausgeschlossen werden sollen (/etc/logtool/exclude) oder aber wie Zeilen aussehen, die mit einer bestimmten Farbe dargestellt werden sollen (Grün, Gelb, Blau, Magenta, Cyan, Hell-Cyan). Es existiert auch die Möglichkeit, keine »ausschließende« (engl. »exclude«) Datei zu erstellen, sondern stattdessen einen »einschließenden« (engl. »include«) Stil zu verwenden. Das wird jedoch nicht empfohlen. Letztendlich ist noch wichtig, dass Dateien, die nicht von der Ausgabe ausgeschlossen werden, aber auch auf keinen anderen regulären Ausdruck zutreffen, rot eingefärbt werden.
 .
 Wenn Sie der Niveau-Datenbank »${level}«, bestehend aus bestimmten regulären Ausdrücken, eine der oben angegebenen Aktionen zuweisen wollen, dann stimmen Sie hier zu.
";
$elem["logtool/use-level"]["descriptionfr"]="Voulez-vous utiliser les expressions rationnelles du niveau ${level} ?
 La base de données de logcheck-database définit trois niveaux : paranoid (paranoïaque), server (serveur), et workstation (station de travail) ; le paquet fournit également une base de données cracking (pour les alertes), violations (pour les violations), et violations-ignore (permettant d'ignorer certaines violations). Logcheck permet de choisir un de ces niveaux et d'ignorer les autres.
 .
 Logtool peut utiliser plusieurs bases de données, qui spécifient soit les lignes devant être exclues (/etc/logtool/exclude), soit les lignes devant être mises en évidence (en vert, jaune, bleu, magenta, cyan, cyan clair). Il est aussi possible de ne conserver que les entrées correspondant à des règles « d'inclusion ». Ce n'est toutefois pas recommandé. Enfin, notez que les lignes ne correspondant à aucune expression rationnelle seront colorées en rouge.
 .
 Si vous souhaitez faire correspondre les expressions rationnelles de niveau ${level} à l'un des choix possibles, choisissez cette option.
";
$elem["logtool/use-level"]["default"]="true";
$elem["logtool/map-level-to-file"]["type"]="select";
$elem["logtool/map-level-to-file"]["choices"][1]="exclude";
$elem["logtool/map-level-to-file"]["choices"][2]="include";
$elem["logtool/map-level-to-file"]["choices"][3]="green";
$elem["logtool/map-level-to-file"]["choices"][4]="yellow";
$elem["logtool/map-level-to-file"]["choices"][5]="blue";
$elem["logtool/map-level-to-file"]["choices"][6]="magenta";
$elem["logtool/map-level-to-file"]["choices"][7]="cyan";
$elem["logtool/map-level-to-file"]["choicesde"][1]="Ausschließend";
$elem["logtool/map-level-to-file"]["choicesde"][2]="Einschließend";
$elem["logtool/map-level-to-file"]["choicesde"][3]="Grün";
$elem["logtool/map-level-to-file"]["choicesde"][4]="Gelb";
$elem["logtool/map-level-to-file"]["choicesde"][5]="Blau";
$elem["logtool/map-level-to-file"]["choicesde"][6]="Magenta";
$elem["logtool/map-level-to-file"]["choicesde"][7]="Cyan";
$elem["logtool/map-level-to-file"]["choicesfr"][1]="exclusion";
$elem["logtool/map-level-to-file"]["choicesfr"][2]="inclusion";
$elem["logtool/map-level-to-file"]["choicesfr"][3]="vert";
$elem["logtool/map-level-to-file"]["choicesfr"][4]="jaune";
$elem["logtool/map-level-to-file"]["choicesfr"][5]="bleu";
$elem["logtool/map-level-to-file"]["choicesfr"][6]="magenta";
$elem["logtool/map-level-to-file"]["choicesfr"][7]="cyan";
$elem["logtool/map-level-to-file"]["description"]="What do you want the ${level} level of regular expressions to do?
 Please specify what you want to do with a line if it matches at least one
 of the regular expressions in the ${level} level database. You have the
 following options (note that regular expressions are matched on a
 line-per-line basis):
 .
  * exclude: discard matching lines
  * include: discard all but matching lines. Not recommended. Note that
    this is mutually exclusive with 'exclude'.
  * green, yellow, blue, magenta, cyan, brightcyan: give matching lines
    the specified color.
 .
 Note that each option can be specified for only one of paranoid,
 server, or workstation.
";
$elem["logtool/map-level-to-file"]["descriptionde"]="Welche Aktion wollen Sie dem Niveau »${level}«, bestehend aus bestimmten regulären Ausdrücken, zuweisen?
 Bitte geben Sie an, was mit einer Zeile geschehen soll, auf die wenigstens ein regulärer Ausdruck in der Niveau-Datenbank ${level} zutrifft. Folgende Aktionen stehen zur Auswahl (beachten Sie, dass das Zutreffen regulärer Ausdrücke für jede Zeile einzeln entschieden wird):
 .
  * Ausschließend: verwerfe zutreffende Zeilen
  * Einschließend: verwerfe alle nicht zutreffenden Zeilen.
                   Wird nicht empfohlen. Beachten Sie, dass das
                   das genaue Gegenteil von »ausschließend« ist.
  * Grün, Gelb, Blau, Magenta, Cyan, Hell-Cyan: stelle zutreffende Zeilen
                   in dieser Farbe dar.
 .
 Beachten Sie, dass jede Aktion nur einmal für entweder paranoid, server oder workstation ausgewählt werden kann.
";
$elem["logtool/map-level-to-file"]["descriptionfr"]="Mise en évidence des expressions rationnelles de niveau ${level} :
 Choisissez le comportement à adopter lorsqu'une ligne correspond à l'une des expressions rationnelles de la base de données de niveau ${level}. Veuillez noter que les correspondances se font ligne par ligne. Les choix suivants sont possibles :
 .
  - exclusion        : ne pas tenir compte des lignes correspondantes ;
  - inclusion        : ne tenir compte que des lignes correspondantes.
                       Ce choix, non recommandé, ne peut pas être
                       combiné avec l'exclusion ;
  - vert, jaune
    bleu, magenta
    cyan, cyan clair : colorer les lignes sélectionnées.
 .
 Chaque option ne peut être spécifiée qu'une fois pour l'un des niveaux « paranoid (paranoïaque) », « server (serveur) » et « workstation (station de travail) ».
";
$elem["logtool/map-level-to-file"]["default"]="";
$elem["logtool/error-multiple"]["type"]="error";
$elem["logtool/error-multiple"]["description"]="Please do not select an action more than once
 You have selected the action ${action} for at least ${level1} and
 ${level2}. This is invalid; please either select a unique action for each
 level, or go back and choose not to use a certain level.
";
$elem["logtool/error-multiple"]["descriptionde"]="Bitte wählen Sie eine Aktion nicht häufiger als einmal aus
 Sie haben die Aktion ${action} für wenigstens ${level1} und ${level2} gewählt. Das ist nicht zulässig. Bitte wählen Sie entweder eine eindeutige Aktion für jedes Niveau, oder gehen Sie zurück und entscheiden Sie sich dafür kein bestimmtes Niveau zu verwenden.
";
$elem["logtool/error-multiple"]["descriptionfr"]="Veuillez éviter de choisir une action plus d'une fois.
 Vous avez choisi l'action ${action} au moins pour les niveaux ${level1} et ${level2}. Ce choix n'est pas valable ; veuillez choisir une action unique pour chaque niveau, ou revenez en arrière et choisissez de ne pas utiliser un des niveaux.
";
$elem["logtool/error-multiple"]["default"]="";
PKG_OptionPageTail2($elem);
?>
