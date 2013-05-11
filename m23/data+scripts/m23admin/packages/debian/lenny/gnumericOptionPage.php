<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gnumeric");

$elem["gnumeric/existing-process"]["type"]="boolean";
$elem["gnumeric/existing-process"]["description"]="Really upgrade gnumeric?
 An instance of gnumeric is currently running. If you
 upgrade now, it may no longer be able to save its data.
 .
 You should close the running instances of gnumeric
 before upgrading this package.
";
$elem["gnumeric/existing-process"]["descriptionde"]="Wirklich eine Aktualisierung von Gnumeric durchführen?
 Eine Instanz von Gnumeric läuft gerade. Falls Sie Gnumeric jetzt aktualisieren, können die Daten dieser Instanz nicht mehr gespeichert werden.
 .
 Vor der Aktualisierung dieses Paketes sollten Sie die laufenden Instanzen von Gnumeric schließen.
";
$elem["gnumeric/existing-process"]["descriptionfr"]="Faut-il vraiment mettre gnumeric à niveau ?
 Gnumeric est actuellement en cours d'utilisation. Si vous le mettez à niveau maintenant, il se pourrait que cette instance soit incapable de sauvegarder ses données.
 .
 Il est fortement recommandé de quitter toutes les instances de gnumeric avant de mettre ce paquet à niveau.
";
$elem["gnumeric/existing-process"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
