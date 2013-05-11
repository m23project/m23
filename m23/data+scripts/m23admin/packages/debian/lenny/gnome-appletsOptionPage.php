<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gnome-applets");

$elem["gnome-applets/cpufreq_SUID_bit"]["type"]="boolean";
$elem["gnome-applets/cpufreq_SUID_bit"]["description"]="Should cpufreq-selector run with root privileges?
 The 'cpufreq-selector' program, part of the CPU Frequency
 Scaling Monitor, can be set up to use superuser privileges when
 it is run ('SUID root').
 .
 If you choose this option, any ordinary user will have the power to
 set the processor's clock frequency. However, this may also be
 potentially exploitable in security attacks.
 .
 The applet will continue to work if you choose to disable SUID for
 cpufreq-selector, but only for monitoring the CPU clock frequency. The
 applet may need to be restarted for a change to take effect.
 .
 If in doubt, accept the default of no SUID root. To change this
 setting later, run 'dpkg-reconfigure gnome-applets'.
";
$elem["gnome-applets/cpufreq_SUID_bit"]["descriptionde"]="Soll der Cpufreq-selector mit root-Privilegien laufen?
 Das Programm »cpufreq-selector«, Teil des CPU-Frequenz-Skalierungsmonitors, kann so eingerichtet werden, dass beim Betrieb die Privilegien des Systemverwalters verwendet werden (»SUID root«).
 .
 Falls Sie sich für diese Option entscheiden, kann jeder gewöhnliche Benutzer den Takt des Prozessors einstellen. Dies ist allerdings möglicherweise für Sicherheitsangriffe ausnutzbar.
 .
 Das Applet wird weiter arbeiten wenn Sie sich entscheiden Cpufreq-selector das SUID-Recht zu entziehen, allerdings nur zur Überwachung des Prozessortaktes. Das Applet wird wahrscheinlich neu gestartet werden müssen, damit diese Entscheidung greift.
 .
 Im Zweifelsfall akzeptieren Sie die Voreinstellung ohne SUID root. Um diese Einstellung später zu ändern, führen Sie »dpkg-reconfigure gnome-applets« aus.
";
$elem["gnome-applets/cpufreq_SUID_bit"]["descriptionfr"]="Faut-il exécuter cpufreq-selector avec les privilèges du superutilisateur ?
 Le programme « cpufreq-selector », qui fait partie de l'outil de contrôle de la fréquence du processeur peut être configuré pour utiliser les privilèges du superutilisateur lors de son exécution (« SUID root »).
 .
 Si vous choisissez cette option, n'importe quel utilisateur aura la possibilité de définir la fréquence de l'horloge du processeur. Cela peut permettre de détourner cet outil pour compromettre la sécurité du système.
 .
 Si vous choisissez de ne pas utiliser cette option (ce qui évite d'activer SUID), l'outil continuera de fonctionner mais seule la fonction d'affichage de la fréquence de l'horloge du processeur sera active. Vous devrez redémarrer l'application pour que cette décision devienne effective.
 .
 En cas de doute, n'acceptez pas l'option. Si vous souhaitez modifier cette option par la suite, utilisez la commande « dpkg-reconfigure gnome-applets ».
";
$elem["gnome-applets/cpufreq_SUID_bit"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
