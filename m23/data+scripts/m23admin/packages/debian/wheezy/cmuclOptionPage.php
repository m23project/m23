<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cmucl");

$elem["cmucl/upgradeproblems"]["type"]="note";
$elem["cmucl/upgradeproblems"]["description"]="Config file changed incompatibly
 The config file /etc/common-lisp/cmucl/site-init.lisp changed in an
 incompatible way, please upgrade the file or if you are not even asked,
 move the /etc/common-lisp/cmucl/site-init.lisp.dpkg-new file to
 /etc/common-lisp/cmucl/site-init.lisp.
 .
 Failure to do this will result in a broken installation.
";
$elem["cmucl/upgradeproblems"]["descriptionde"]="Inkompatible Änderungen der Konfigurationsdatei
 Die Konfigurationsdatei /etc/common-lisp/cmucl/site-init.lisp hat sich sehr stark geändert, bitte aktualisieren Sie die Datei oder verschieben Sie die Datei /etc/common-lisp/cmucl/site-init.lisp.dpkg-new nach /etc/common-lisp/cmucl/site-init.lisp.
 .
 Wenn das nicht geht, wird die Installation defekt (broken) sein.
";
$elem["cmucl/upgradeproblems"]["descriptionfr"]="Modifications incompatibles au fichier de configuration
 Le fichier de configuration /etc/common-lisp/cmucl/site-init.lisp a été modifié d'une manière incompatible avec les versions précédentes. Veuillez mettre à jour le fichier ou, si la question ne vous est pas posée, veuillez renommer le fichier /etc/common-lisp/cmucl/site-init.lisp.dpkg-new en /etc/common-lisp/cmucl/site-init.lisp.
 .
 Si vous ne faites pas cela, l'installation ne sera pas opérationnelle.
";
$elem["cmucl/upgradeproblems"]["default"]="";
PKG_OptionPageTail2($elem);
?>
