<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mksh");

$elem["mksh/sh"]["type"]="boolean";
$elem["mksh/sh"]["description"]="Install mksh as /bin/sh?
 Bash is the default /bin/sh on a Debian system.  However, since the Debian
 policy requires all shell scripts using /bin/sh to be POSIX compliant, any
 shell that conforms to POSIX can serve as /bin/sh.  Since mksh is POSIX
 compliant, it can be used as /bin/sh.  You may wish to do this because
 mksh is faster and smaller than bash.
";
$elem["mksh/sh"]["descriptionde"]="mksh als /bin/sh installieren?
 Bash ist die Standard-Shell (/bin/sh) auf einem Debian-System. Da die Debian-Richtlinien allerdings von allen Shellskripten, die /bin/sh benutzen, POSIX-Kompatibilität verlangt, kann für /bin/sh jede POSIX-kompatible Shell benutzt werden. Da mksh POSIX-kompatibel ist, kann sie als /bin/sh verwendet werden. Weil mksh schneller und kompakter als bash ist, möchten Sie sie vielleicht verwenden.
";
$elem["mksh/sh"]["descriptionfr"]="Faut-il mettre en place un lien de /bin/sh vers mksh ?
 Par défaut, sur un système Debian, /bin/sh est un lien vers bash. Cependant, comme la charte Debian impose que tous les scripts utilisant /bin/sh soient conformes à la norme POSIX, /bin/sh peut être n'importe quel interpréteur de commandes (« shell ») conforme à cette norme, tel que mksh. Vous pouvez vouloir choisir cette option puisque mksh est plus rapide et plus petit que bash.
";
$elem["mksh/sh"]["default"]="false";
$elem["mksh/cannot"]["type"]="error";
$elem["mksh/cannot"]["description"]="Cannot install mksh as /bin/sh!
 Because dash has already been configured to be installed as /bin/sh, mksh
 cannot be installed as /bin/sh. Use \"dpkg-reconfigure dash\" to change dash
 to not install as /bin/sh, then \"dpkg-reconfigure mksh\" to install mksh there.
";
$elem["mksh/cannot"]["descriptionde"]="Kann mksh nicht als /bin/sh installieren!
 Weil dash schon konfiguriert wurde, sich als /bin/sh zu installieren, kann mksh nicht als /bin/sh installiert werden. Bitte benutzen Sie \"dpkg-reconfigure dash\", um dash einzustellen, sich nicht als /bin/sh zu installieren, dann \"dpkg-reconfigure mksh\", um mksh dort zu plazieren.
";
$elem["mksh/cannot"]["descriptionfr"]="Échec de la mise en place d'un lien de /bin/sh vers mksh
 Comme dash est déjà configuré pour s'installer en tant que /bin/sh, mksh ne peut l'être également. Veuillez utiliser « dpkg-reconfigure dash » pour changer votre choix puis « dpkg-reconfigure mksh » pour établir mksh en tant qu'interpréteur de commandes par défaut.
";
$elem["mksh/cannot"]["default"]="";
PKG_OptionPageTail2($elem);
?>
