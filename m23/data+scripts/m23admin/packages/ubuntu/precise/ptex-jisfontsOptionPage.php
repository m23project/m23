<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ptex-jisfonts");

$elem["ptex-jisfonts/jisftconfig"]["type"]="note";
$elem["ptex-jisfonts/jisftconfig"]["description"]="You have to run `jisftconfig add' after installation.
 If you want to use jisfonts with xdvik-ja and/or dvipsk-ja, you will
 have to run `jisftconfig add' with root privileges after installation.
 This command will set up the environment for jisfonts.
 .
 For more details, read /usr/share/doc/ptex-jisfonts/README.Debian and
 jisftconfig(1).
";
$elem["ptex-jisfonts/jisftconfig"]["descriptionde"]="Sie müssen »jisftconfig add« nach der Installation ausführen.
 Falls Sie Jisfonts mit Xdvik-ja und/oder Dvipsk-ja verwenden wollen, müssen Sie »jisftconfig add« mit Rootrechten nach der Installation ausführen. Dieser Befehl wird die Umgebung für Jisfonts einrichten.
 .
 Für weitere Details lesen Sie bitte /usr/share/doc/ptex-jisfonts/README.Debian und jisftconfig(1).
";
$elem["ptex-jisfonts/jisftconfig"]["descriptionfr"]="Commande« jisftconfig add » nécessaire après l'installation
 Si vous souhaitez utiliser jisfonts avec xdvik-ja ou dvipsk-ja, vous devez, après l'installation, lancer la commande « jisftconfig add » avec les privilèges du superutilisateur. Cette commande met en place l'environnement adapté pour jisfonts.
 .
 Pour plus de détails, veuillez consulter le fichier /usr/share/doc/ptex-jisfonts/README.Debian et la page de manuel jisftconfig(1).
";
$elem["ptex-jisfonts/jisftconfig"]["default"]="";
PKG_OptionPageTail2($elem);
?>
