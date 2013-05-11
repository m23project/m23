<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("harden");

$elem["harden/welcome"]["type"]="note";
$elem["harden/welcome"]["description"]="Harden your Debian GNU/Linux system
 Hardening your Debian GNU/Linux system is NOT as simple as installing a
 package. You need a LOT of knowledge about what to do when configuring the
 system. This package will try to help you to take proper actions and will
 give some suggestions.
 .
 In the harden-doc package you can find documentation on how to make your
 Debian installation more secure. It is also available at:
 http://www.debian.org/doc/manuals/securing-debian-howto/
";
$elem["harden/welcome"]["descriptionde"]="Härten Ihres Debian GNU/Linux Systems
 Das Härten Ihres Debian GNU/Linux Systems ist nicht mit einer Paketinstallation getan. Sie müssen selbst eine MENGE Erfahrung in der Einrichtung des Systems haben. Dieses Paket wird versuchen, Sie zu unterstützen, die richtigen Maßnahmen zu ergreifen und Ihnen einige Empfehlungen geben.
 .
 Im Paket Harden-doc finden Sie Beschreibungen, wie Sie Ihre Debian-Installation sicherer machen können. Sie sind auch verfügbar unter: http://www.debian.org/doc/manuals/securing-debian-howto/.
";
$elem["harden/welcome"]["descriptionfr"]="Sécurisez votre système Debian GNU/Linux
 Sécuriser votre système Debian GNU/Linux ne se limite PAS à installer un paquet. Vous devez avoir BEAUCOUP de connaissances sur ce qu'il faut faire lors de sa configuration. Ce paquet essaie de vous aider à avoir les bons reflexes et vous donne quelques conseils.
 .
 Dans le paquet harden-doc, vous pouvez trouver de la documentation sur la manière de rendre votre installation de Debian plus sécurisée. Elle est aussi disponible à l'adresse : http://www.debian.org/doc/manuals/securing-debian-howto/
";
$elem["harden/welcome"]["default"]="";
PKG_OptionPageTail2($elem);
?>
