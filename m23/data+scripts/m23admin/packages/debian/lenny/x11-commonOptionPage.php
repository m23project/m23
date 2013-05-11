<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("x11-common");

$elem["x11-common/xwrapper/allowed_users"]["type"]="select";
$elem["x11-common/xwrapper/allowed_users"]["choices"][1]="Root Only";
$elem["x11-common/xwrapper/allowed_users"]["choices"][2]="Console Users Only";
$elem["x11-common/xwrapper/allowed_users"]["choicesde"][1]="Nur Superuser";
$elem["x11-common/xwrapper/allowed_users"]["choicesde"][2]="Nur Konsolenbenutzer";
$elem["x11-common/xwrapper/allowed_users"]["choicesfr"][1]="Superutilisateur seulement";
$elem["x11-common/xwrapper/allowed_users"]["choicesfr"][2]="Depuis la console";
$elem["x11-common/xwrapper/allowed_users"]["description"]="Users allowed to start the X server:
 Because the X server runs with superuser privileges, it may be unwise to
 permit any user to start it, for security reasons.  On the other hand, it is
 even more unwise to run general-purpose X client programs as root, which is
 what may happen if only root is permitted to start the X server.  A good
 compromise is to permit the X server to be started only by users logged in to
 one of the virtual consoles.
";
$elem["x11-common/xwrapper/allowed_users"]["descriptionde"]="Benutzer, die den X-Server starten dürfen:
 Weil der X-Server mit Superuser-Rechten läuft, kann es unter Sicherheitsaspekten unklug sein, jedem Benutzer das Starten zu erlauben. Andererseits ist es noch unklüger, allgemeine X-Programme als Superuser auszuführen, was passieren könnte, wenn nur der Superuser den X-Server starten darf. Ein guter Kompromiss kann sein, nur den Personen das Starten des X-Servers zu erlauben, die auf einer der virtuellen Konsolen angemeldet sind.
";
$elem["x11-common/xwrapper/allowed_users"]["descriptionfr"]="Utilisateurs autorisés à lancer un serveur X :
 Le serveur X étant lancé avec des droits privilégiés, il n'est pas très prudent pour des raisons de sécurité de permettre à n'importe qui de le lancer. D'un autre côté, il est encore moins prudent de lancer les logiciels clients X en tant que superutilisateur, ce qui risque d'arriver si seul le superutilisateur est autorisé à lancer un serveur X. Un bon compromis est que seuls les utilisateurs connectés sur une des consoles virtuelles puissent lancer un serveur X.
";
$elem["x11-common/xwrapper/allowed_users"]["default"]="Console Users Only";
$elem["x11-common/xwrapper/actual_allowed_users"]["type"]="string";
$elem["x11-common/xwrapper/actual_allowed_users"]["description"]="internal use only
 This template is never shown to the user and does not require translation.

";
$elem["x11-common/xwrapper/actual_allowed_users"]["descriptionde"]="";
$elem["x11-common/xwrapper/actual_allowed_users"]["descriptionfr"]="";
$elem["x11-common/xwrapper/actual_allowed_users"]["default"]="";
$elem["x11-common/xwrapper/nice_value"]["type"]="string";
$elem["x11-common/xwrapper/nice_value"]["description"]="Nice value for the X server:
 When using operating system kernels with a particular scheduling strategy,
 it has been widely noted that the X server's performance improves when it
 is run at a higher process priority than the default; a process's priority
 is known as its \"nice\" value.  These values range from -20 (extremely high
 priority, or \"not nice\" to other processes) to 19 (extremely low
 priority).  The default nice value for ordinary processes is 0, and this
 is also the recommend value for the X server.
 .
 Values outside the range of -10 to 0 are not recommended; too negative,
 and the X server will interfere with important system tasks.  Too
 positive, and the X server will be sluggish and unresponsive.
";
$elem["x11-common/xwrapper/nice_value"]["descriptionde"]="»nice«-Wert für den X-Server:
 Es wurde festgestellt, dass sich bei Verwendung von Betriebssystemkernen mit einer bestimmten Scheduling-Strategie die Geschwindigkeit des X-Servers verbessert, wenn er mit einer höheren Prozesspriorität als normal läuft. Die Prozesspriorität wird als »nice« (nett)-Wert bezeichnet. Dieser reicht von -20 (extrem hohe Priorität bzw. »nicht nett« zu anderen Prozessen) bis 19 (extrem niedrige Priorität). Der Standardwert für normale Prozesse ist 0 und dies wird auch für den X-Server empfohlen.
 .
 Werte außerhalb von -10 bis 0 werden nicht empfohlen; zu niedrig und der X-Server blockiert wichtige Systemarbeiten, zu hoch und der X-Server wird langsam und träge.
";
$elem["x11-common/xwrapper/nice_value"]["descriptionfr"]="Priorité du serveur X :
 Lorsqu'on utilise un système d'exploitation ayant un noyau avec une stratégie spéciale d'ordonnancement, les performances du serveur X sont largement améliorées s'il est exécuté avec une priorité plus haute que celle par défaut. Elle prend des valeurs entre -20 (priorité extrêmement haute) et 19 (priorité très faible). La priorité par défaut d'un processus quelconque est de 0, c'est également la valeur recommandée pour le serveur X.
 .
 Choisir une valeur en dehors de la fourchette de -10 à 0 n'est pas recommandé ; une valeur inférieure et le serveur X interférera avec des tâches importantes du système, une valeur trop grande et son fonctionnement sera lent et peu réactif.
";
$elem["x11-common/xwrapper/nice_value"]["default"]="";
$elem["x11-common/xwrapper/nice_value/error"]["type"]="note";
$elem["x11-common/xwrapper/nice_value/error"]["description"]="Incorrect nice value
 Please enter an integer between -20 and 19.
";
$elem["x11-common/xwrapper/nice_value/error"]["descriptionde"]="Falscher »nice«-Wert
 Bitte geben Sie eine Ganzzahl zwischen -20 und 19 ein.
";
$elem["x11-common/xwrapper/nice_value/error"]["descriptionfr"]="Valeur de priorité non valable
 Veuillez entrer un nombre entier entre -20 et 19.
";
$elem["x11-common/xwrapper/nice_value/error"]["default"]="";
$elem["x11-common/upgrade_issues"]["type"]="note";
$elem["x11-common/upgrade_issues"]["description"]="Major possible upgrade issues
 Some users have reported that upon upgrade to the current package set,
 their xserver package was no longer installed. Because there is no easy
 way around this problem, you should be sure to check that the xserver-xorg
 package is installed after upgrade. If it is not installed and you require
 it, it is recommended that you install the xorg package to make sure you
 have a fully functional X setup.
";
$elem["x11-common/upgrade_issues"]["descriptionde"]="Bedeutende mögliche Aktualisierungsprobleme
 Einige Benutzer berichteten, dass bei einer Aktualisierung auf das aktuelle Paketset, ihr xserver-Paket nicht länger installiert war. Da es keinen einfachen Weg gibt, das Problem zu umgehen, sollten Sie sichergehen, dass das Paket xserver-xorg nach der Aktualisierung installiert ist. Sollte es nicht installiert sein und Sie es benötigen, wird empfohlen, das Paket xorg zu installieren, um sicherzustellen, dass Sie eine vollfunktionsfähige X-Einrichtung haben.
";
$elem["x11-common/upgrade_issues"]["descriptionfr"]="Difficultés possibles lors de la mise à jour majeure
 Certains utilisateurs ont indiqué que lors de la mise à jour vers l'ensemble actuel de paquets pour X, le paquet du serveur X n'était plus installé. Comme il n'existe pas de méthode simple pour contourner ce problème, vous devriez vérifier si le paquet xserver-xorg est toujours installé après la mise à jour. Si ce n'est pas le cas et que vous en avez besoin, vous devriez installer le paquet « xorg » pour garantir une configuration opérationnelle de X.
";
$elem["x11-common/upgrade_issues"]["default"]="";
$elem["x11-common/x11r6_bin_not_empty"]["type"]="note";
$elem["x11-common/x11r6_bin_not_empty"]["description"]="Cannot remove /usr/X11R6/bin directory
 This upgrade requires that the /usr/X11R6/bin directory be removed and
 replaced with a symlink. An attempt was made to do so, but it failed, most
 likely because the directory is not yet empty. You must move the files
 that are currently in the directory out of the way so that the
 installation can complete. If you like, you may move them back after the
 symlink is in place.
 .
 This package installation will now fail and exit so that you can do this.
 Please re-run your upgrade procedure after you have cleaned out the
 directory.
";
$elem["x11-common/x11r6_bin_not_empty"]["descriptionde"]="Kann das Verzeichnis /usr/X11R6/bin nicht entfernen
 Diese Aktualisierung erfordert, dass das Verzeichnis /usr/X11R6/bin entfernt und durch einen symbolischen Link ersetzt wird. Ein Versuch wurde diesbezüglich unternommen, schlug aber fehl, wahrscheinlich weil das Verzeichnis noch nicht leer ist. Sie müssen die Dateien, die sich zurzeit in dem Verzeichnis befinden, daraus verschieben, so dass die Installation beendet werden kann. Wenn Sie möchten, können Sie sie später wieder zurückverschieben, nachdem der symbolische Link eingerichtet wurde.
 .
 Diese Paketinstallation wird nun fehlschlagen und beenden, so dass Sie dies tun können. Bitte starten Sie die Aktualisierung neu, nachdem Sie das Verzeichnis geleert haben.
";
$elem["x11-common/x11r6_bin_not_empty"]["descriptionfr"]="Impossible de supprimer le répertoire /usr/X11R6/bin
 La mise à jour rend indispensable la suppression du répertoire /usr/X11R6/bin afin de le remplacer par un lien symbolique. Cette opération a échoué, très probablement parce que ce répertoire n'est pas vide. Il est nécessaire de déplacer les fichiers qui y restent afin que l'installation puisse se terminer. Il sera possible de les remettre en place une fois que le lien symbolique aura été créé.
 .
 L'installation du paquet va s'interrompre afin de vous permettre d'effectuer cette opération. Veuillez relancer la procédure de mise à jour après avoir nettoyé le répertoire.
";
$elem["x11-common/x11r6_bin_not_empty"]["default"]="";
PKG_OptionPageTail2($elem);
?>
