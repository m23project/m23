<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mlmmj");

$elem["mlmmj/remove-on-purge"]["type"]="boolean";
$elem["mlmmj/remove-on-purge"]["description"]="Remove mlmmj lists on purge?
 Removing mlmmj on purge includes the removal of all subscriber lists,
 archives and configuration options for all lists currently stored.
 .
 Accepting here basically means that everything under /var/spool/mlmmj
 and /etc/mlmmj/lists will be removed when this package is purged. Also
 please note that any changes you might have made to /etc/aliases will not
 be unmade automatically when this package is removed. (A notice will be
 displayed however, to remind you to clean up your aliases.)
";
$elem["mlmmj/remove-on-purge"]["descriptionde"]="Mlmmj-Listen beim vollständigen Löschen entfernen?
 Das Entfernen von Mlmmj beim vollständigen Löschen (»purge«) beinhaltet die Entfernung aller Abonnenten-Listen, Archive und Konfigurationsoptionen für alle derzeit gespeicherten Listen.
 .
 Wird hier akzeptiert, bedeutet dies, das alles unter /var/spool/mlmmj und /etc/mlmmj/lists entfernt werden wird, wenn dieses Paket vollständig gelöscht wird. Beachten Sie auch, dass alle Änderungen, die Sie an /etc/aliases vorgenommen haben nicht automatisch zurückgesetzt werden, wenn dieses Paket entfernt wird (allerdings wird ein Hinweis angezeigt, der Sie daran erinnert, Ihre Aliase aufzuräumen).
";
$elem["mlmmj/remove-on-purge"]["descriptionfr"]="Faut-il effacer les listes mlmmj à la purge du paquet ?
 Veuillez noter que cela effacera également les listes d'inscription, les archives ainsi que les options de configuration de toutes les listes actuellement configurées.
 .
 Si vous choisissez cette option, tous les fichiers qui sont sous /var/spool/mlmmj et /etc/mlmmj/lists seront effacés à la purge de ce paquet. Veuillez cependant noter que tous les éventuels changements dans le fichier /etc/aliases ne seront pas retirés à la purge de ce paquet. Un message d'avertissement sera néanmoins affiché afin de vous rappeler de nettoyer vos alias.
";
$elem["mlmmj/remove-on-purge"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
