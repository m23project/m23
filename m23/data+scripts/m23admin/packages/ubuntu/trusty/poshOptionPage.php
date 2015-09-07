<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("posh");

$elem["posh/sh"]["type"]="boolean";
$elem["posh/sh"]["description"]="Install posh as /bin/sh?
 dash is the default /bin/sh on a Debian system.  However, since our policy
 requires all shell scripts using /bin/sh to be POSIX-compliant, any shell
 that conforms to POSIX can serve as /bin/sh.  Since posh is
 POSIX-compliant, it can be used as /bin/sh.
";
$elem["posh/sh"]["descriptionde"]="posh als /bin/sh installieren?
 dash ist die Standard-Shell (/bin/sh) auf einem Debian-System. Da die Debian-Policy von allen Shellscripts, die /bin/sh benutzen, POSIX-Kompatibilität verlangt, kann für /bin/sh jede POSIX-kompatible Shell benutzt werden. Posh ist POSIX-kompatibel und kann daher als /bin/sh verwendet werden.
";
$elem["posh/sh"]["descriptionfr"]="Mettre un lien de /bin/sh vers posh ?
 Sur un système Debian, /bin/sh est, par défaut, un lien vers dash. Cependant, comme notre charte impose que tous les scripts utilisant /bin/sh soient conformes à la norme POSIX, /bin/sh peut être n'importe quel processeur de commandes (« shell ») conforme à cette norme. Et comme posh l'est, il peut servir de /bin/sh.
";
$elem["posh/sh"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
