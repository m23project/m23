<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cw");

$elem["cw/suid_bit"]["type"]="boolean";
$elem["cw/suid_bit"]["description"]="Run cw with root privileges?
 If it is run with elevated privileges (which is not recommended), cw
 can produce sounds using the console buzzer.
 .
 Please choose whether this should be achieved by giving the
 executable the \"setuid\" attribute.
 .
 Alternatives include running the program with sudo or eliminating this
 issue completely by using output via a sound card instead of the
 buzzer.
";
$elem["cw/suid_bit"]["descriptionde"]="Cw mit Root-Rechten ausführen?
 Falls es mit höheren Rechten ausgeführt wird (was nicht empfohlen wird), kann Cw unter Verwendung des Konsolen-Summers Geräusche erzeugen.
 .
 Bitte wählen Sie, ob dies erreicht werden soll, indem der ausführbaren Datei das Attribut »setuid« gegeben wird.
 .
 Alternativen umfassen die Ausführung des Programms mit »sudo« oder der vollständigen Beseitigung dieses Problems, indem die Ausgabe über eine Soundkarte anstelle des Konsolen-Summers verwandt wird.
";
$elem["cw/suid_bit"]["descriptionfr"]="Faut-il exécuter cw avec les privilèges du super-utilisateur ?
 Le programme cw peut produire des sons en utilisant le buzzer de la console s'il est exécuté avec des privilèges élevés (ce qui n'est pas recommandé).
 .
 Veuillez choisir si vous désirez ceci en donnant au programme l'attribut « setuid ».
 .
 Il est possible de contourner ce problème en exécutant ce programme à l'aide de « sudo » ou l'éliminer en utilisant la sortie d'une carte son plutôt que le buzzer de la console.
";
$elem["cw/suid_bit"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
