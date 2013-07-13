<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fp-compiler-2.6.0");

$elem["fp-compiler-2.6.0/rename_cfg"]["type"]="boolean";
$elem["fp-compiler-2.6.0/rename_cfg"]["description"]="Rename \"/etc/fpc.cfg\" to \"/etc/fpc.cfg.bak\"?
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
$elem["fp-compiler-2.6.0/rename_cfg"]["descriptionde"]="»/etc/fpc.cfg« in »/etc/fpc.cfg.bak« umbenennen?
 FPC unterstützt nun mehrere auf dem selben System installierte Versionen. Der Befehl »update-alternatives« kann zum Setzen einer Standardversion für
  * fpc (den Compiler),
  * fpc.cfg (die Konfigurationsdatei) und
  * fp-utils (die Helper-Werkzeuge)
 benutzt werden.
 .
 Egal welche Version als Vorgabe gewählt wird, die Konfigurationsdateien sind immer abwärtskompatibel, so dass die Verwendung der neusten Version stets sicher möglich sein sollte.
 .
 Um das Alternatives-System auf die systemweite Konfigurationsdatei anzuwenden, müssen Sie dem Umbenennen von »/etc/fpc.cfg« zustimmen, andernfalls müssen Sie dies selbst verwalten.
";
$elem["fp-compiler-2.6.0/rename_cfg"]["descriptionfr"]="Faut-il renommer « /etc/fpc.cfg »  en « /etc/fpc.cfg.bak » ?
 Plusieurs versions de FPC peuvent maintenant être installées sur le même système. La commande update-alternatives permet de définir une version par défaut pour :
  * fpc (le compilateur) ;
  * fpc.cfg (le fichier de configuration) ;
  * fp-utils (les outils d'assistance).
 .
 Quelle que soit la version choisie par défaut, les fichiers de configuration sont toujours rétrocompatibles, il devrait donc être toujours possible d'utiliser la dernière version.
 .
 Afin d'utiliser le système d'alternatives pour le fichier de configuration global de FPC, vous devez accepter de renommer « /etc/fpc.cfg », sinon vous devrez gérer cela vous-même.
";
$elem["fp-compiler-2.6.0/rename_cfg"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
