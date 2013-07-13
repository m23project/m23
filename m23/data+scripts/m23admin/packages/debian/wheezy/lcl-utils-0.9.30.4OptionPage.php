<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lcl-utils-0.9.30.4");

$elem["lcl-utils-0.9.30.4/rename_cfg"]["type"]="boolean";
$elem["lcl-utils-0.9.30.4/rename_cfg"]["description"]="Rename \"/etc/lazarus\" to \"/etc/lazarus.bak\"?
 The Lazarus suite now supports keeping multiple versions installed
 at the same time and using the alternatives system to set proper
 defaults. Normally, the latest version of any component is used.
 .
 To use the alternatives system on the system-wide configuration
 of the Lazarus suite, /etc/lazarus needs to be under control of the
 alternatives system. Currently there is a real directory at
 /etc/lazarus, probably from a previous installation. In order to
 start using the alternatives system on the configuration you must
 accept renaming \"/etc/lazarus\". If you don't, you will need to
 review the configuration on every version update of Lazarus as,
 unfortunately, the configuration files are not always
 backward-compatible. Also switching between different versions
 might need more intervention.
 .
 If you have made changes to your configuration files, you will
 probably need to review them and apply them to all versioned
 configurations, as they will not automatically propagate.
";
$elem["lcl-utils-0.9.30.4/rename_cfg"]["descriptionde"]="»/etc/lazarus« in »/etc/lazarus.bak« umbenennen?
 Die Lazarus-Suite unterstützt es jetzt, mehrere Versionen zur selben Zeit installiert zu haben und verwendet das Alternatives-System, um korrekte Standardwerte zu setzen. Normalerweise wird die neueste Version jeder Komponente benutzt.
 .
 Um das alternatives-System mit der systemweiten Konfiguration der Lazarus-Suite zu nutzen, muss /etc/lazarus unter der Kontrolle des Alternatives-System stehen. Derzeit existiert ein echtes Verzeichnis mit Namen /etc/lazarus, möglicherweise von einer früheren Installation. Um mit der Verwendung des Alternatives-Systems für diese Konfiguration zu beginnen, müssen Sie zustimmen, dass »/etc/lazarus« umbenannt wird. Falls Sie nicht zustimmen, müssen Sie die Konfiguration bei jeder Versionsaktualisierung der Lazarus-Suite kontrollieren, da die Konfigurationsdateien unglücklicherweise nicht immer abwärtskompatibel sind. Auch für das Wechseln zwischen verschiedenen Versionen könnte mehr manuelles Eingreifen nötig sein.
 .
 Falls Sie Änderungen an Ihren Konfigurationsdateien durchgeführt haben, müssen Sie sie unter Umständen kontrollieren und all diese Änderungen in alle versionsabhängigen Konfigurationen einpflegen, da sie nicht automatisch übertragen werden.
";
$elem["lcl-utils-0.9.30.4/rename_cfg"]["descriptionfr"]="Faut-il renommer « /etc/lazarus » en « /etc/lazarus.bak » ?
 L'ensemble Lazarus permet maintenant de garder plusieurs versions installées en même temps, et d'utiliser le système d'alternatives pour définir les composants par défaut adéquats. Normalement, la dernière version de chaque composant est utilisée.
 .
 Pour utiliser le système d'alternatives sur la configuration système de l'ensemble Lazarus, /etc/lazarus doit être sous le contrôle du système d'alternatives. Actuellement, /etc/lazarus est un répertoire, provenant sans doute d'une installation précédente. Afin de commencer à utiliser le système d'alternatives sur la configuration, vous devez accepter de renommer « /etc/lazarus ». Si vous ne le faites pas, vous devrez contrôler la configuration à chaque mise à jour de version de Lazarus, parce que les fichiers de configuration ne sont malheureusement pas toujours rétrocompatibles. Ainsi, une intervention risque d'être nécessaire lors du passage d'une version à une autre.
 .
 Si des modifications aux fichiers de configuration ont été réalisées, vous devrez sans doute les contrôler et les appliquer aux configurations de toutes les versions, puisqu'elles ne seront pas automatiquement propagées.
";
$elem["lcl-utils-0.9.30.4/rename_cfg"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
