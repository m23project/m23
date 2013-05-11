<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xmame-x");

$elem["xmame-x/SUID_bit"]["type"]="boolean";
$elem["xmame-x/SUID_bit"]["description"]="Do you want /usr/games/xmame.x11 to be installed SUID root?
 You have the option of installing xmame.x11 with the SUID bit set.
 .
 If you make xmame.x11 SUID (i.e privileged), you can use the DGA
 extension of your X server, which is currently the fastest fullscreen
 method for xmame. This could, however, potentially allow xmame to be used
 during a security attack on your computer.  If you are playing network
 games I recommend that you decline. Otherwise, select this option and enjoy
 fullscreen games. If you change your mind later, you can run:
 dpkg-reconfigure xmame-x.
";
$elem["xmame-x/SUID_bit"]["descriptionde"]="Möchten Sie, dass /usr/games/xmame.x11 SUID root installiert wird?
 Sie haben die Option, xmame.x11 mit gesetztem SUID Bit zu installieren.
 .
 Falls Sie xmame.x11 SUID (d.h. privilegiert) setzen, können Sie die DGA-Erweiterung Ihres X-Servers benutzen, die derzeit die schnellste Vollbildschirm-Methode für Xmame darstellt. Allerdings könnte damit Xmame potenziell während eines Sicherheitsangriffs auf Ihren Computer benutzt werden. Falls Sie Netzspiele spielen schlage ich vor, dies abzulehnen. Andernfalls wählen Sie diese Option aus und genießen Sie Vollbildschirmspiele. Fall Sie Ihre Meinung später ändern, führen Sie »dpkg-reconfigure xmame-x« aus.
";
$elem["xmame-x/SUID_bit"]["descriptionfr"]="Faut-il exécuter xmame.x11 avec les privilèges du superutilisateur ?
 Vous pouvez installer xmame.x11 pour qu'il s'exécute avec les privilèges du superutilisateur (« setuid root »).
 .
 Si vous choisissez cette option, vous pourrez utiliser l'extension DGA de votre serveur X qui est actuellement la méthode d'affichage la plus rapide en plein-écran pour xmame. Cependant, cela peut potentiellement permettre de détourner xmame pour compromettre la sécurité de votre système. Si vous jouez en réseau, il est recommandé de ne pas utiliser cette option. Sinon, validez-la pour profiter des jeux en plein-écran. Si vous changez d'avis par la suite, vous pourrez changer cette option en utilisant la commande : « dpkg-reconfigure xmame-x ».
";
$elem["xmame-x/SUID_bit"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
