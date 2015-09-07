<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lprng");

$elem["lprng/twolpd_conf"]["type"]="note";
$elem["lprng/twolpd_conf"]["description"]="There are two lpd.conf files
 You have a lpd.conf in the old location (/etc/lpd.conf) and the new
 location (/etc/lprng/lpd.conf). From lprng version 3.6.16-1 this file
 should be only in /etc/lprng, please check both files and remove
 /etc/lpd.conf
";
$elem["lprng/twolpd_conf"]["descriptionde"]="Es gibt die Datei lpd.conf doppelt
 Sie haben eine Datei lpd.conf an der alten Stelle (/etc/lpd.conf) und an der neuen Stelle (/etc/lprng/lpd.conf). Seit der Version 3.6.16-1 von lprng sollte diese Datei nur noch im Verzeichnis /etc/lprng liegen. Überprüfen Sie bitte beide Dateien und löschen Sie /etc/lpd.conf.
";
$elem["lprng/twolpd_conf"]["descriptionfr"]="Deux fichiers lpd.conf ont été trouvés
 Un fichier lpd.conf a été trouvé à l'ancien emplacement (dans /etc) et un autre au nouvel emplacement (/etc/lprng). Depuis la version 3.6.16-1 de lprng, le fichier utilisé est celui de /etc/lprng : veuillez donc vérifier le contenu des deux fichiers, puis effacer /etc/lpd.conf.
";
$elem["lprng/twolpd_conf"]["default"]="";
$elem["lprng/twolpd_perms"]["type"]="note";
$elem["lprng/twolpd_perms"]["description"]="There are two lpd.perms files
 You have a lpd.perms in the old location (/etc/lpd.perms) and the new
 location (/etc/lprng/lpd.perms). Since lprng version 3.6.16-1 this file
 should be only in /etc/lprng, please check both files and remove
 /etc/lpd.perms
";
$elem["lprng/twolpd_perms"]["descriptionde"]="Es gibt die Datei lpd.perms doppelt
 Sie haben eine Datei lpd.perms an der alten Stelle (/etc/lpd.perms) und an der neuen Stelle (/etc/lprng/lpd.perms). Seit der Version 3.6.16-1 von lprng sollte diese Datei nur noch im Verzeichnis /etc/lprng liegen. Überprüfen Sie bitte beide Dateien und löschen Sie /etc/lpd.perms.
";
$elem["lprng/twolpd_perms"]["descriptionfr"]="Deux fichiers lpd.perms ont été trouvés
 Un fichier lpd.perms a été trouvé à l'ancien emplacement (dans /etc) et un autre au nouvel emplacement (/etc/lprng). Depuis la version 3.6.16-1 de lprng, le fichier utilisé est celui de /etc/lprng : veuillez donc vérifier le contenu des deux fichiers, puis effacer /etc/lpd.perms.
";
$elem["lprng/twolpd_perms"]["default"]="";
$elem["lprng/setuid_tools"]["type"]="boolean";
$elem["lprng/setuid_tools"]["description"]="Make lpr, lprm and lpq setuid root?
 For full RFC1179 compliance you need to make these programs setuid root. 
 This is mainly so they can create a socket with a low port number. The low
 port number may be important if you have network printers or have adjusted
 /etc/lprng/lpd.perms to restrict access to non-privledged ports. For the
 typical printer connected locally to parallel port (and many other)
 scenario you can leave these programs non setuid root.
";
$elem["lprng/setuid_tools"]["descriptionde"]="lpr, lprm und lpq mit root-Rechten betreiben?
 Zur vollen Übereinstimmung mit RFC1179 müssen diese Programme mit root-Rechten laufen. Hauptsächlich damit diese einen Socket mit einer geringen Portnummer anlegen können. Niedrige Portnummern können wichtig sein, wenn Sie einen Netzwerkdrucker betreiben oder den Zugang über hohe Ports in der Datei /etc/lprng/lpd.perms beschränkt haben.  Für einen normalen Drucker am Parallelport und in vielen anderen Fällen brauchen diese Programme keine root-Rechte.
";
$elem["lprng/setuid_tools"]["descriptionfr"]="Lpr, lprm et lpq doivent-ils être « setuid root » ?
 Pour un respect complet de la RFC1179, ces programmes doivent s'exécuter avec les privilèges du super-utilisateur. C'est pour l'essentiel nécessaire à la création d'un « socket » sur un port de numéro inférieur à 1024. Cela peut être important si vous utilisez des imprimantes en réseau ou si vous avez modifié /etc/lprng/lpd.perms pour restreindre l'accès aux ports non privilégiés. Dans le cas d'une imprimante classiquement connectée sur le port parallèle (et beaucoup d'autres cas), il n'est pas indispensable que ces programmes s'exécutent avec les privilèges du super-utilisateur.
";
$elem["lprng/setuid_tools"]["default"]="false";
$elem["lprng/start_lpd"]["type"]="boolean";
$elem["lprng/start_lpd"]["description"]="Start lpd (Printer Daemon) at boot?
 Some people for various reasons do not want to start lpd. Refusing this
 option means lpd will not start.  Unless you know why you want lpd
 not to start, just accept the default.
";
$elem["lprng/start_lpd"]["descriptionde"]="lpd (Druckerdienst) beim Booten starten?
 Es gibt verschiedene Gründe, lpd nicht beim Booten zu starten. Wenn Sie hier ablehnen, wird lpd nicht starten.  Wählen Sie die Standardeinstellung, außer Sie wissen, warum Sie lpd nicht starten wollen.
";
$elem["lprng/start_lpd"]["descriptionfr"]="Faut-il lancer lpd (gestionnaire d'imprimantes) au démarrage ?
 Certains administrateurs, pour des raisons diverses, préfèrent éviter de lancer lpd. En refusant ici, lpd ne démarrera pas. Vous devriez accepter à moins d'avoir une raison solide pour ne pas vouloir démarrer lpd.
";
$elem["lprng/start_lpd"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
