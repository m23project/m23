<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("muttprint");

$elem["muttprint/moved_pics"]["type"]="note";
$elem["muttprint/moved_pics"]["description"]="Pictures moved!
 The pictures formerly contained in the muttprint package have now split
 out to the 'ospics' package to allow them be installed without installing
 muttprint and the dependencies (tetex-*) or to having installed a smaller
 package for those who do not want the images.
 .
 Furthermore, the location of the pictures have changed. They now \"live\" in
 /usr/share/ospics instead of /usr/share/muttprint
 .
 So, If you want to use your pictures you have used yet you have to do the
 following steps:
  a) install ospics ;)
  b) change the path to the files in your configuration
";
$elem["muttprint/moved_pics"]["descriptionde"]="Bilder verschoben!
 Die Bilder, die vorher im muttprint-Paket vorhanden waren wurden nun in das 'ospics'-paket ausgelagert um dessen Installation von muttprint und seine Abhängigkeiten (tetex-*) und die Installation nur von muttprint für die die die Bilder nicht haben wollen zu erlauben.
 .
 Weiterhin wurde der Ort der Bilder geändert. Diese befinden sich nun unter /usr/share/ospics statt /usr/share/muttprint
 .
 Wenn die Bilder also (weiter-)verwendet werden sollen, ist folgendes zu tun:
  a) ospics installieren ;)
  b) Pfade zu den Dateien in der Konfiguration ändern
";
$elem["muttprint/moved_pics"]["descriptionfr"]="Les images ont été déplacées !
 Les images précédemment incluses dans le paquet muttprint sont désormais fournies avec le paquet « ospics », ce qui permet de les installer sans installer muttprint et les paquets dont il dépend (tetex-*). Cela permet également de fournir un paquet plus petit, pour les utilisateurs qui ne souhaitent pas les utiliser.
 .
 Par ailleurs, leur emplacement a changé. Elles sont désormais placées dans le répertoire /usr/share/ospics et non plus dans /usr/share/muttprint.
 .
 En conséquence, si vous souhaitez continuer à les utiliser, vous devez :
  a) installer le paquet ospics ;)
  b) modifier le chemin d'accès aux fichiers dans votre configuration.
";
$elem["muttprint/moved_pics"]["default"]="";
PKG_OptionPageTail2($elem);
?>
