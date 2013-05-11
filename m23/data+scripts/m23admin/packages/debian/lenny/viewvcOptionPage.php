<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("viewvc");

$elem["viewvc/cvsroots"]["type"]="string";
$elem["viewvc/cvsroots"]["description"]="CVS roots:
 This setting specifies each of the CVS roots (repositories) on your system and assigns
 names to them.  Each root should be given by a \"name: path\" value.  Multiple
 roots should be separated by commas.
";
$elem["viewvc/cvsroots"]["descriptionde"]="CVS-Wurzelverzeichnisse:
 Diese Einstellung gibt jedes der CVS-Wurzelverzeichnisse (Depots) auf Ihrem System an und weist ihnen Namen zu. Jedes Wurzelverzeichnis sollte mit einem »Name: Pfad«-Wert angegeben werden. Mehrere Wurzelverzeichnisse sollten durch Kommata getrennt werden.
";
$elem["viewvc/cvsroots"]["descriptionfr"]="Dépôts CVS :
 Ce paramètre définit chacun des dépôts CVS sur votre système et leur attribue un nom. Chaque entrepôt doit être indiqué sous la forme « nom: chemin ». Les noms des différents dépôts doivent être séparés par des virgules.
";
$elem["viewvc/cvsroots"]["default"]="cvs: /var/lib/cvs";
$elem["viewvc/svnroots"]["type"]="string";
$elem["viewvc/svnroots"]["description"]="SVN roots:
 This setting specifies each of the Subversion roots (repositories)
 on your system and assigns names to them.  Each root should be given
 by a \"name: path\" value.  Multiple roots should be separated by
 commas.
";
$elem["viewvc/svnroots"]["descriptionde"]="SVN-Wurzelverzeichnisse:
 Diese Einstellung gibt jedes der Subversion-Wurzelverzeichnisse (Depots) auf Ihrem System an und weist ihnen Namen zu. Jedes Wurzelverzeichnis sollte mit einem »Name: Pfad«-Wert angegeben werden. Mehrere Wurzelverzeichnisse sollten durch Kommata getrennt werden.
";
$elem["viewvc/svnroots"]["descriptionfr"]="Dépôts SVN :
 Ce paramètre définit chacun des depôts Subversion sur votre système et leur attribue un nom. Chaque depôt doit être indiqué sous la forme « nom: chemin ». Les noms des différents depôts doivent être séparés par des virgules.
";
$elem["viewvc/svnroots"]["default"]="svn: /var/lib/svn";
$elem["viewvc/defaultroot"]["type"]="select";
$elem["viewvc/defaultroot"]["description"]="Default root:
 Root to show if no root was chosen.
";
$elem["viewvc/defaultroot"]["descriptionde"]="Standard-Wurzelverzeichnis:
 Wurzelverzeichnis, das angezeigt werden soll, wenn keines ausgewählt wurde.
";
$elem["viewvc/defaultroot"]["descriptionfr"]="Depôt par défaut :
 Dépôt à afficher si aucun dépôt n'a été choisi par défaut.
";
$elem["viewvc/defaultroot"]["default"]="";
$elem["viewvc/address"]["type"]="string";
$elem["viewvc/address"]["description"]="Repository administrator address:
 This address is shown in the footer of the generated pages.  It must be the
 address of the local repository maintainer (e.g. <a
 href=\"mailto:foo@bar\">cvsadmin</a>).
";
$elem["viewvc/address"]["descriptionde"]="Adresse des Depot-Verwalters:
 Diese Adresse wird im Fuß der generierten Seiten angezeigt. Es muss die Adresse des lokalen Depot-Betreuers sein (z.B. <a href=\"mailto:foo@bar\">CVS-Administrator</a>).
";
$elem["viewvc/address"]["descriptionfr"]="Adresse électronique de l'administrateur :
 Cette adresse sera visible au bas des pages produites. Elle doit correspondre à l'adresse du responsable du dépôt local (par ex. <a href=\"mailto:foo@bar\">cvsadmin</a>).
";
$elem["viewvc/address"]["default"]="<a href=\"mailto:admin@foo\">Repository Admin</a>";
$elem["viewvc/forbidden"]["type"]="string";
$elem["viewvc/forbidden"]["description"]="List of access-forbidden modules:
 This should contain a list of modules in the repository that should not be
 displayed (by default or by explicit path specification).  This
 configuration can be a simple list of modules, or it can get quite
 complex:
   *) The \"!\" can be used before a module to explicitly state that it is
 NOT forbidden.
   *) Shell-style \"glob\" expressions may be used. \"*\" will match any
 sequence of zero or more characters, \"?\" will match any single character,
 \"[seq]\" will match any character in seq, and \"[!seq]\" will match any
 character not in seq.
";
$elem["viewvc/forbidden"]["descriptionde"]="Liste von zugangsverweigerten Modulen:
 Dies sollte eine Liste mit Modulen im Depot enthalten, die nicht angezeigt werden sollen (standardmäßig oder als explizite Pfadangabe). Diese Einstellung kann eine einfache Liste von Modulen sein oder komplizierter werden:
   *) Das »!« kann vor einem Modul benutzt werden, um explizit zu sagen, dass es NICHT verboten ist.
   *) Shell-artige Platzhalter-Ausdrücke können benutzt werden. »*« entspricht einer Folge von Null oder mehr Zeichen, »?« entspricht einem beliebigen Zeichen, »[seq]« entspricht jedem Zeichen in seq und »[!seq]« entspricht jedem Zeichen, das nicht in seq ist.
";
$elem["viewvc/forbidden"]["descriptionfr"]="Liste des modules dont l'accès doit être restreint :
 Ceci devrait contenir une liste des modules du dépôt qui ne devraient pas être affichés (soit avec un chemin par défaut, soit avec un chemin explicitement indiqué). Ce paramètre peut être une simple liste de modules, ou il peut être plus complexe :
   - Le caractère « ! » peut être employé avant un module afin
     d'indiquer que son accès n'est PAS interdit.
   - Les expressions de type shell « glob » peuvent être utilisées.
     Le caractère « * » correspondra à n'importe quelle suite de zéro
     ou plusieurs caractères, « ? » correspondra à n'importe quel
     caractère unique, « [seq] » correspondra à n'importe quel
     caractère dans « seq » et « [!seq] » correspondra à n'importe
     quel caractère ne faisant pas partie de « seq ».
";
$elem["viewvc/forbidden"]["default"]="";
$elem["viewvc/allow_tar"]["type"]="boolean";
$elem["viewvc/allow_tar"]["description"]="Allow automatic tarball generation?
 ViewVC can generate a tarball (.tar.gz) from a repository on the fly.  This
 option allows (you/anyone) to download a tarball of the current directory.
";
$elem["viewvc/allow_tar"]["descriptionde"]="Automatische Tar-Archiv-Erstellung erlauben?
 ViewVC kann nebenbei ein Tar-Archiv (.tar.gz) von einem Depot erzeugen. Diese Option erlaubt es (Ihnen/jedem) ein Tar-Archiv des aktuellen Verzeichnisses herunterzuladen.
";
$elem["viewvc/allow_tar"]["descriptionfr"]="Autorisez-vous la création d'archives (« tarball ») ?
 ViewVC peut produire à la volée une archive (tar.gz) à partir du dépôt. Cette option permet de télécharger une archive du répertoire courant.
";
$elem["viewvc/allow_tar"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
