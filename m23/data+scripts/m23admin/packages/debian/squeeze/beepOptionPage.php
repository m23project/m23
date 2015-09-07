<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("beep");

$elem["beep/suid_option"]["type"]="select";
$elem["beep/suid_option"]["choices"][1]="usable for all";
$elem["beep/suid_option"]["choices"][2]="usable for group audio";
$elem["beep/suid_option"]["choicesde"][1]="für alle benutzbar";
$elem["beep/suid_option"]["choicesde"][2]="für Gruppe audio benutzbar";
$elem["beep/suid_option"]["choicesfr"][1]="Utilisable par tous";
$elem["beep/suid_option"]["choicesfr"][2]="Utilisable seulement par les membres du groupe « audio »";
$elem["beep/suid_option"]["description"]="Install beep as:
 beep must be run as root since it needs to access the speaker hardware.
 There are several possibilities to make the program usable:  Either only
 for root (no suid bit at all), executable only by users of the group
 audio, or usable for all.
 .
 Since each program set as suid root can be a security risk this is not done
 by default.  However, the program is quite small (~150 lines of code), so it
 is fairly easy to verify the safety of the code yourself, if you don't
 trust the package maintainer's judgement.
";
$elem["beep/suid_option"]["descriptionde"]="beep installieren als:
 beep muss als root ausgeführt werden, da es auf den Lautsprecher zugreifen muss. Es gibt mehrere Möglichkeiten, das Programm benutzbar zu machen: Entweder nur für root (gar kein suid), benutzbar von den Mitgliedern der Gruppe audio, oder für alle benutzbar.
 .
 Da jedes Programm, das suid root gesetzt ist, ein potentielles Sicherheitsproblem sein kann, wird dies nicht automatisch durchgeführt. Das Programm ist jedoch recht kurz (~150 Zeilen Code) und kann daher von Ihnen sehr leicht überprüft werden, falls Sie der Einschätzung des Paketbetreuers nicht vertrauen.
";
$elem["beep/suid_option"]["descriptionfr"]="Installer beep de sorte qu'il soit :
 Le programme beep doit posséder les privilèges du superutilisateur pour pouvoir accéder au haut-parleur. Cela est possible de plusieurs façons : soit permettre de le lancer avec les privilèges du superutilisateur (« setuid root ») par tous ou uniquement par les membres du groupe « audio », soit réserver l'exécution du programme au superutilisateur.
 .
 Tout programme qui s'exécute avec les privilèges du superutilisateur peut présenter un risque pour la sécurité du système. Toutefois, ce programme est vraiment petit (environ 150 lignes de code) et il est relativement facile de vérifier par vous-même que le code est sûr, en cas de doute.
";
$elem["beep/suid_option"]["default"]="suid root with only group audio executable";
PKG_OptionPageTail2($elem);
?>
