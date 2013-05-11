<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("insserv");

$elem["insserv/enable"]["type"]="boolean";
$elem["insserv/enable"]["description"]="Enable (or keep enabled) the dependency-based boot sequence?
 If you choose to enable the dependency-based boot sequence the
 scripts in /etc/rc*.d/ will be reordered using dependency information
 provided by LSB comment headers (or defaults where these are not
 present). All S* symlinks in rc0.d/ and rc6.d/ will be turned into K*
 symlinks, to make sure the way they are used (with the argument 'stop')
 matches their names. The change will only be done after it is
 verified that it is safe to convert. Disabling it when enabled will
 try to revert the change.
 .
 Please note that this feature is experimental. Attempting to revert
 from dependency-based boot sequencing is not guaranteed to be safe,
 and may require the reinstallation of the system.
";
$elem["insserv/enable"]["descriptionde"]="Abhängigkeitsgestützte Reihenfolge beim Hochfahren aktivieren (oder aktiviert lassen)?
 Wenn Sie hier zustimmen, werden alle Skripte im Verzeichnis /etc/rc*.d/ anhand der in jedem Skript enthaltenen Informationen über die Abhängigkeiten neu sortiert. Wenn diese Information fehlt, wird die Standardinformation über Abhängigkeiten benutzt. Es werden auch alle symbolischen Links »S*« in den Verzeichnissen rc0.d/ und rc6.d/ in symbolische Links »K*« umgewandelt, um sicher zu stellen, dass ihre Aufrufe (mit dem Argument »stop«) zu ihren Namen passen. Die Änderung wird nur vorgenommen, nachdem überprüft wurde, dass die Umwandlung sicher ist. Wenn Sie hier ablehnen, nachdem Sie schon einmal zugestimmt haben, wird versucht, die Änderungen zurückzunehmen.
 .
 Bitte beachten Sie, dass es sich um eine experimentelle Funktionalität handelt. Es gibt keine Garantie, dass man von einer abhängigkeitsgestützten zu einer nicht abhängigkeitsgestützten Reihenfolge des Hochfahrens sicher zurückzukehren kann. Eine Neuinstallation des Systems könnte erforderlich werden.
";
$elem["insserv/enable"]["descriptionfr"]="Faut-il activer (ou laisser activée) la gestion des dépendances dans la séquence de démarrage ?
 Si vous choisissez d'activer la gestion des dépendances pour la séquence de démarrage, les scripts placés dans /etc/rc*.d/ seront remis dans un ordre qui utilise les informations de dépendances fournies par les en-têtes LSB (ou des valeurs par défaut si ceux-ci ne sont pas présents). Tous les liens symboliques de démarrage (liens S*) de rc0.d/ et rc6.d/ seront transformés en lien d'arrêt des services (liens K*) pour garantir que leur mode d'utilisation (avec le paramètre « stop ») correspond à leurs noms. Cette modification ne sera effectuée qu'après contrôle qu'elle peut se faire de façon sûre. Si vous désactivez la gestion des dépendances alors qu'elle est active, ces modifications seront abandonnées.
 .
 Veuillez noter que cette fonctionnalité est expérimentale. Le retour en arrière depuis une séquence de démarrage avec gestion des dépendances n'est pas entièrement garanti et un échec peut imposer la réinstallation de l'ensemble du système.
";
$elem["insserv/enable"]["default"]="";
PKG_OptionPageTail2($elem);
?>
