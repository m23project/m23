<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ulogd");

$elem["ulogd/config_syntax_changed"]["type"]="note";
$elem["ulogd/config_syntax_changed"]["description"]="Configuration syntax has changed
 /etc/ulogd.conf configuration file syntax has changed. You probably need
 to upgrade your configuration to the new syntax. ulogd will disregard an
 old style configuration, or fail to start completely!
 .
 See /usr/share/doc/ulogd/examples/ulogd.conf for details.
";
$elem["ulogd/config_syntax_changed"]["descriptionde"]="Geänderte Konfigurations-Syntax
 Die Syntax der Konfigurationsdatei /etc/ulogd.conf hat sich geändert. Wahrscheinlich müssen Sie Ihre Konfiguration auf die neue Syntax umstellen. ulogd wird eine Konfiguration im alten Stil nicht beachten und kann möglicherweise nicht starten!
 .
 Schauen Sie sich die Hinweise in /usr/share/doc/ulogd/examples/ulogd.conf an.
";
$elem["ulogd/config_syntax_changed"]["descriptionfr"]="Changement de la syntaxe du fichier de configuration
 La syntaxe du fichier de configuration « /etc/ulogd.conf » a changé. Il vous faudra sans doute mettre à jour ce fichier en utilisant la nouvelle syntaxe. Si vous conservez un fichier utilisant l'ancienne syntaxe, il sera ignoré ou empêchera le démarrage d'ulogd.
 .
 Veuillez consulter /usr/share/doc/ulogd/examples/ulogd.conf pour davantage d'informations.
";
$elem["ulogd/config_syntax_changed"]["default"]="";
PKG_OptionPageTail2($elem);
?>
