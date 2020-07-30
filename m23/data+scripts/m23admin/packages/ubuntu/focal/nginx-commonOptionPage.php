<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nginx-common");

$elem["nginx/log-symlinks"]["type"]="note";
$elem["nginx/log-symlinks"]["description"]="Possible insecure nginx log files
 The following log files under /var/log/nginx directory are symlinks
 owned by www-data:
 .
 ${logfiles}
 .
 Since nginx 1.4.4-4 /var/log/nginx was owned by www-data. As a result
 www-data could symlink log files to sensitive locations, which in turn
 could lead to privilege escalation attacks. Although /var/log/nginx
 permissions are now fixed it is possible that such insecure links
 already exist. So, please make sure to check the above locations.
";
$elem["nginx/log-symlinks"]["descriptionde"]="Möglicherweise unsichere Nginx-Protokolldateien
 Die folgenden Protokolldateien unterhalb des Verzeichnisses /var/log/nginx sind symbolische Verweise, die »www-data« gehören:
 .
 ${logfiles}
 .
 Seit Nginx 1.4.4-4 gehörte /var/log/nginx »www-data«. Dies führte unter anderem dazu, dass »www-data« auf Protokolldateien an vertraulichen Stellen symbolisch verweisen konnte, was im Folgenden zu Rechteerweiterungsangriffen führen konnte. Obwohl die Rechte an /var/log/nginx nun korrigiert sind, ist es möglich, dass derartige unsichere Verweise bereits existieren. Prüfen Sie daher bitte die oben genannten Orte.
";
$elem["nginx/log-symlinks"]["descriptionfr"]="Certains fichiers de journaux semblent non sécurisés
 Les fichiers de journaux suivants se trouvant dans le dossier /var/log/nginx sont des liens symboliques qui appartiennent à www-data :
 .
 ${logfiles}
 .
 Depuis la version 1.4.4-4 de nginx, /var/log/nginx appartient à www-data. Par conséquent www-data peut faire des liens symboliques des fichiers de journaux vers des emplacements sensibles, ce qui pourrait amener à des attaques par augmentation de droits. Même si désormais les droits de /var/log/nginx ont été sécurisés, il est possible que de tels liens existent déjà. Aussi, veuillez vous assurer d'avoir contrôlé les emplacements ci-dessus.
";
$elem["nginx/log-symlinks"]["default"]="";
PKG_OptionPageTail2($elem);
?>
