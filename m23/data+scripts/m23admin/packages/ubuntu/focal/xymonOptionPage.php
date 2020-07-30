<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xymon");

$elem["hobbit-client/automatic-xymon-migration"]["type"]="boolean";
$elem["hobbit-client/automatic-xymon-migration"]["description"]="Automatically migrate old hobbit files to xymon?
 The operating system user was renamed from \"hobbit\" to \"xymon\", and all
 configuration, state, log directories and files have been renamed as well.
 The package postinst scripts can do the migration automatically. This is
 usually a good idea, but might not work so well if your config differs
 substantially from the default.
";
$elem["hobbit-client/automatic-xymon-migration"]["descriptionde"]="Alte Dateien automatisch von hobbit auf xymon umstellen?
 Der Betriebssystem-User wurde von \"hobbit\" in \"xymon\" umbenannt, zusammen mit allen Konfigurations-, Zustands- und Log-Verzeichnissen und -Dateien. Das Postinst-Skript des Pakets kann die Migration automatisch durchführen. Das ist normalerweise eine gute Sache, kann aber ggf. nicht so gut funktionieren, wenn die Konfiguration stark von der Standardkonfiguration abweicht.
";
$elem["hobbit-client/automatic-xymon-migration"]["descriptionfr"]="Faut-il migrer automatiquement les anciens fichiers hobbit vers xymon ?
 L'utilisateur du système d'exploitation a été renommé de « hobbit » en « xymon » et l'ensemble des répertoires et fichiers de configuration, d'état et de journalisation ont également été renommés. Les scripts postinst du paquet peuvent réaliser cette migration automatiquement. C'est en général une bonne idée, mais cela ne marche pas très bien si votre configuration diffère sensiblement de la configuration par défaut.
";
$elem["hobbit-client/automatic-xymon-migration"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
