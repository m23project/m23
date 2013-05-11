<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dash");

$elem["dash/sh"]["type"]="boolean";
$elem["dash/sh"]["description"]="Install dash as /bin/sh?
 The default /bin/sh shell on Debian and Debian-based systems is bash.
 .
 However, since the default shell is required to be POSIX-compliant,
 any shell that conforms to POSIX, such as dash, can serve as /bin/sh.
 You may wish to do this because dash is faster and smaller than bash.
";
$elem["dash/sh"]["descriptionde"]="Dash als /bin/sh installieren?
 Standardmäßig ist bash als /bin/sh in Debian und auf Debian-basierten Systemen installiert.
 .
 Da die Standardshell allerdings POSIX-konform sein muss, kann jede Shell, die (wie Dash) POSIX-konform ist als /bin/sh dienen. Eventuell wollen Sie Dash verwenden, da Dash schneller und kleiner als Bash ist.
";
$elem["dash/sh"]["descriptionfr"]="Faut-il mettre en place un lien de /bin/sh vers dash ?
 Par défaut, sur un système Debian ou un système basé sur Debian , /bin/sh est un lien vers bash.
 .
 Cependant, comme l'interpréteur de commandes (« shell ») par défaut du système doit être conforme à la norme POSIX, /bin/sh peut être n'importe quel interpréteur de commandes conforme à cette norme, notamment dash. Il peut être préférable de choisir cette option car dash est plus rapide et plus petit que bash.
";
$elem["dash/sh"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
