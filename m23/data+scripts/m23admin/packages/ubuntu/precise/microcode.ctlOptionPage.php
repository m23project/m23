<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("microcode.ctl");

$elem["microcode.ctl/check-new"]["type"]="boolean";
$elem["microcode.ctl/check-new"]["description"]="Download Intel CPU microcodes now?
 The microcode.ctl package needs the Intel microcodes for its operation.
 .
 These microcodes are non-free software and cannot distributed
 within the package. They can be downloaded from the Internet (the
 expected download size is about 300-400 kB).
 .
 If you do not choose to download the microcodes now, please read
 /usr/share/doc/microcode.ctl/README.Debian and download the needed
 files manually or by running the '/usr/sbin/update-intel-microcode'
 command.
";
$elem["microcode.ctl/check-new"]["descriptionde"]="Intel-CPU-Mikrocodes jetzt herunterladen?
 Das Paket Microcode.ctl benötigt die Mikrocodes von Intel zum Betrieb.
 .
 Diese Mikrocodes sind nicht-freie Software und können nicht innerhalb des Pakets vertrieben werden. Sie können aus dem Internet heruntergeladen werden. Die erwartete Größe ist rund 300-400 kB.
 .
 Falls Sie sich entscheiden, die Mikrocodes jetzt nicht herunterzuladen, lesen Sie /usr/share/doc/microcode.ctl/README.Debian und laden Sie die benötigten Dateien manuell herunter oder indem Sie den Befehl »/usr/sbin/update-intel-microcode« ausführen.
";
$elem["microcode.ctl/check-new"]["descriptionfr"]="Faut-il télécharger les microcodes des processeurs Intel maintenant ?
 Le paquet « microcode.ctl » a besoin des microcodes Intel pour fonctionner.
 .
 Ces microcodes ne sont pas des logiciels libres et ne peuvent être distribués dans le paquet. Ils peuvent être téléchargés depuis Internet (la taille du téléchargement est d'environ 300-400 ko).
 .
 Si vous choisissez de ne pas télécharger les microcodes maintenant, veuillez lire /usr/share/doc/microcode.ctl/README.Debian et télécharger vous-même les fichiers nécessaires, ou exécuter la commande « /usr/sbin/update-intel-microcode ».
";
$elem["microcode.ctl/check-new"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
