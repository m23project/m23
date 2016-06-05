<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fp-compiler-2.6.4");

$elem["fp-compiler/rename_cfg"]["type"]="boolean";
$elem["fp-compiler/rename_cfg"]["description"]="Rename \"/etc/fpc.cfg\" to \"/etc/fpc.cfg.bak\"?
 FPC now supports having multiple versions installed on the same system.
 The update-alternatives command can be used to set a default version for
  * fpc (the compiler);
  * fpc.cfg (the configuration file);
  * fp-utils (the helper tools).
 .
 Whatever version you may choose as default, the configuration files are
 always backward compatible, so it should always be safe to use the latest
 version.
 .
 In order to use the alternatives system on the system wide FPC configuration
 file you must accept renaming \"/etc/fpc.cfg\"; otherwise you will need to
 manage this manually by yourself.
";
$elem["fp-compiler/rename_cfg"]["descriptionde"]="»/etc/fpc.cfg« in »/etc/fpc.cfg.bak« umbenennen?
 FPC unterstützt nun mehrere auf demselben System installierte Versionen. Der Befehl »update-alternatives« kann zum Setzen einer Standardversion für
  * fpc (den Compiler),
  * fpc.cfg (die Konfigurationsdatei) und
  * fp-utils (die Hilfswerkzeuge)
 benutzt werden.
 .
 Egal welche Version als Vorgabe gewählt wird, die Konfigurationsdateien sind immer abwärtskompatibel, so dass die Verwendung der neuesten Version stets sicher möglich sein sollte.
 .
 Um das Alternatives-System auf die systemweite Konfigurationsdatei anzuwenden, müssen Sie dem Umbenennen von »/etc/fpc.cfg« zustimmen, andernfalls müssen Sie dies selbst verwalten.
";
$elem["fp-compiler/rename_cfg"]["descriptionfr"]="Faut-il renommer « /etc/fpc.cfg » en « /etc/fpc.cfg.bak » ?
 Plusieurs versions de FPC peuvent maintenant être installées sur le même système. La commande update-alternatives permet de définir une version par défaut pour :
  - fpc (le compilateur) ;
  - fpc.cfg (le fichier de configuration) ;
  - fp-utils (les outils d'assistance).
 .
 Quelle que soit la version choisie par défaut, les fichiers de configuration sont toujours rétrocompatibles, il devrait donc être toujours possible d'utiliser la dernière version.
 .
 Afin d’utiliser le système d’alternatives pour le fichier de configuration global de FPC, vous devez accepter de renommer « /etc/fpc.cfg », sinon vous devrez gérer cela vous-même.
";
$elem["fp-compiler/rename_cfg"]["default"]="true";
$elem["fp-compiler/windres-select"]["type"]="select";
$elem["fp-compiler/windres-select"]["choices"][1]="${choices}";
$elem["fp-compiler/windres-select"]["choicesde"][1]="${choices}";
$elem["fp-compiler/windres-select"]["choicesfr"][1]="${choices}";
$elem["fp-compiler/windres-select"]["description"]="Default MS Windows .rc resource compiler:
 FPC supports compiling programs that embed resources as MS Windows
 .rc-format files on all platforms where the MinGW windres tool is available.
 .
 In order to be able to compile projects using .rc files, you need first to
 manually install the package mingw32-binutils. mingw32-binutils is suggested
 by fp-compiler but not pulled in automatically.
 .
 If you want to enter a custom .rc file compiler that does not appear in this
 list or if you simply want to disable this feature, please select
 \"Select manually\".
";
$elem["fp-compiler/windres-select"]["descriptionde"]="Standard-Compiler für .rc-Ressourcen unter MS Windows:
 FPC unterstützt Kompilierprogramme, die Ressourcen als Dateien im .rc-Format von MS Windows auf allen Plattformen einbetten, auf denen das MinGW-Windres-Werkzeug verfügbar ist.
 .
 Um Projekte mittels .rc-Dateien kompilieren zu können, müssen Sie zuerst das Paket »mingw32-binutils« manuell installieren. »mingw32-binutils« wird durch »fp-compiler« vorgeschlagen, aber nicht automatisch bezogen.
 .
 Falls Sie einen benutzerdefinierten Compiler für .rc-Dateien eingeben möchten, der nicht in dieser Liste erscheint oder falls Sie diese Funktionalität deaktivieren wollen, wählen Sie bitte »Manuelle Auswahl«.
";
$elem["fp-compiler/windres-select"]["descriptionfr"]="Compilateur de ressources .rc MS Windows par défaut :
 FPC permet de compiler des programmes contenant des ressources au format .rc de MS Windows sur toutes les plateformes où l’outil MinGW windres est disponible.
 .
 Pour pouvoir compiler des projets utilisant des fichiers .rc, vous devez d’abord installer vous-même le paquet mingw32-binutils. Ce paquet est en effet seulement suggéré par fp-compiler et n’est donc pas installé par défaut.
 .
 Pour sélectionner un compilateur de fichiers .rc personnalisé qui n’est pas présent dans cette liste, ou simplement pour désactiver cette fonctionnalité, veuillez choisir « Sélectionnez vous-même ».
";
$elem["fp-compiler/windres-select"]["default"]="Select manually";
$elem["fp-compiler/windres"]["type"]="string";
$elem["fp-compiler/windres"]["description"]="Default MS Windows .rc resource compiler:
 FPC supports compiling programs that embed resources as MS Windows
 .rc-format files on all platforms where the MinGW windres tool is available.
 .
 In order to be able to compile projects using .rc files, you need first to
 manually install the package mingw32-binutils. mingw32-binutils is suggested
 by fp-compiler but not pulled in automatically.
 .
 If you don't want to use a default .rc file compiler, leave this blank.
";
$elem["fp-compiler/windres"]["descriptionde"]="Standard-Compiler für .rc-Ressourcen unter MS Windows:
 FPC unterstützt Kompilierprogramme, die Ressourcen als Dateien im .rc-Format von MS Windows auf allen Plattformen einbetten, auf denen das MinGW-Windres-Werkzeug verfügbar ist.
 .
 Um Projekte mittels .rc-Dateien kompilieren zu können, müssen Sie zuerst das Paket »mingw32-binutils« manuell installieren. »mingw32-binutils« wird durch »fp-compiler« vorgeschlagen, aber nicht automatisch bezogen.
 .
 Falls Sie keinen Standard-Compiler für .rc-Dateien verwenden möchten, lassen Sie dies leer.
";
$elem["fp-compiler/windres"]["descriptionfr"]="Compilateur de ressources .rc MS Windows par défaut :
 FPC permet de compiler des programmes contenant des ressources au format .rc de MS Windows sur toutes les plateformes où l’outil MinGW windres est disponible.
 .
 Pour pouvoir compiler des projets utilisant des fichiers .rc, vous devez d’abord installer vous-même le paquet mingw32-binutils. Ce paquet est en effet seulement suggéré par fp-compiler et n’est donc pas installé par défaut.
 .
 Si vous ne voulez pas utiliser de compilateur de fichiers .rc par défaut, laissez ce champ vide.
";
$elem["fp-compiler/windres"]["default"]="Default:";
PKG_OptionPageTail2($elem);
?>
