<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("charliecloud");

$elem["charliecloud/unpriv_userns_warning"]["type"]="note";
$elem["charliecloud/unpriv_userns_warning"]["description"]="Unprivileged user namespaces are disabled in the running kernel
 To use Charliecloud unprivileged user namespaces need to be enabled. This is
 done by running the following commands as root:
 .
 echo 'kernel.unprivileged_userns_clone=1' > /etc/sysctl.d/00-local-userns.conf
 .
 systemctl restart procps
";
$elem["charliecloud/unpriv_userns_warning"]["descriptionde"]="Im laufenden Kernel sind nichtprivilegierte Benutzernamensräume deaktiviert.
 Um Charliecloud zu verwenden, müssen nichtprivilegierte Benutzernamensräume aktiviert sein. Dies erfolgt durch die Ausführung folgender Befehle als Systemverwalter:
 .
 echo 'kernel.unprivileged_userns_clone=1' > /etc/sysctl.d/00-local-userns.conf
 .
 systemctl restart procps
";
$elem["charliecloud/unpriv_userns_warning"]["descriptionfr"]="Les espaces de noms d'utilisateur non privilégiés sont désactivés dans le noyau en cours d'exécution.
 Pour pouvoir utiliser Charliecloud, les espaces de noms d'utilisateur non privilégiés doivent être activés. Cela peut être fait en exécutant les commandes suivantes en tant que superutilisateur (root) :
 .
 echo 'kernel.unprivileged_userns_clone=1' > /etc/sysctl.d/00-local-userns.conf
 .
 systemctl restart procps
";
$elem["charliecloud/unpriv_userns_warning"]["default"]="";
PKG_OptionPageTail2($elem);
?>
