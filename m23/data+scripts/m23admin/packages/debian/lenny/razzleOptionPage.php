<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("razzle");

$elem["razzle/suid"]["type"]="boolean";
$elem["razzle/suid"]["description"]="Make razzle suid?
 In order to use svgalib and gain access to the graphics hardware, razzle
 must be run as root. If you want any users other than root to be able to
 run razzle, it must be setuid. However, this poses a significant security
 risk, as razzle could have significant flaws or other security defects
 which have, as yet, gone undetected. You can always change your decision
 by using `dpkg-reconfigure razzle'.
";
$elem["razzle/suid"]["descriptionde"]="Soll razzle suid gesetzt werden ?
 Damit razzle die svgalib nutzen kann und Zugriff auf die Grafik-Hardware bekommt, muss razzle als root ausgeführt werden. Wenn Sie möchten, dass andere Benutzer außer root die Möglichkeit haben, razzle auszuführen, muss es setuid gesetzt sein. Dies bedeutet jedoch ein signifikantes Sicherheitsrisiko, da razzle möglicherweise bedeutsame Fehler oder andere, bisher unentdeckte, Sicherheitsmängel haben könnte. Sie können Ihre Entscheidung jederzeit ändern, indem Sie »dpkg-reconfigure razzle« aufrufen.
";
$elem["razzle/suid"]["descriptionfr"]="Faut-il rendre razzle « suid » ?
 Afin d'utiliser svgalib et d'accéder à la carte graphique, razzle doit être lancé par le super-utilisateur. Si vous souhaitez que n'importe quel utilisateur autre que le super-utilisateur puisse lancer razzle, ce dernier doit s'exécuter avec les privilèges du super-utilisateur (« setuid root »). Cependant, ceci pose un problème de sécurité dans la mesure où razzle peut comporter des failles ou d'autres risques liés à la sécurité n'ayant pas été détectés jusqu'à présent. Vous pouvez toujours modifier votre décision en exécutant « dpkg-reconfigure razzle ».
";
$elem["razzle/suid"]["default"]="";
PKG_OptionPageTail2($elem);
?>
