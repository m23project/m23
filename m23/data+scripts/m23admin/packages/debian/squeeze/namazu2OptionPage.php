<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("namazu2");

$elem["namazu2/install"]["type"]="string";
$elem["namazu2/install"]["description"]="Directories in which to copy the cgi:
 Namazu package will be installed in /usr/lib/cgi-bin/namazu.cgi by
 default. But for VirtualHost, you may also need copy the cgi scripts to another
 location. The cgi will be copied automaticaly on upgrade or installation.
 .
 Directories should be space separated. If you don't need this feature,
 please leave this option to the empty string.
";
$elem["namazu2/install"]["descriptionde"]="Verzeichnisse, in die das cgi kopiert werden soll:
 Namazu wird standardmäßig in /usr/lib/cgi-bin/namazu.cgi installiert. Allerdings müssen Sie für einen virtuellen Host (VirtualHost) das Skript möglicherweise an eine andere Stelle kopieren. Bei einer Paket-Aktualisierung oder -Installation wird das Skript automatisch kopiert.
 .
 Verzeichnisse sollten durch Leerzeichen getrennt werden. Wenn Sie diese Fähigkeit nicht benötigen, dann bitte leer lassen.
";
$elem["namazu2/install"]["descriptionfr"]="Répertoire où copier le programme CGI :
 Les programmes de Namazu sera installé par défaut dans /usr/lib/cgi-bin/namazu.cgi. Cependant, si vous utilisez des hôtes virtuels, il peut être nécessaire de copier les scripts CGI à d'autres endroits. Ces scripts y seront copiés automatiquement à l'installation ou lors des mises à jour.
 .
 Veuillez séparer les répertoires par des espaces. Si vous n'avez pas besoin de cette fonctionnalité, laissez simplement ce champ vide.
";
$elem["namazu2/install"]["default"]="";
PKG_OptionPageTail2($elem);
?>
