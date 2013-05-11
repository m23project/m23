<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("apt-proxy");

$elem["apt-proxy/upgrading-v2"]["type"]="note";
$elem["apt-proxy/upgrading-v2"]["description"]="Upgrading from pre-v1.9 packages.
 You seem to be upgrading from a version of apt-proxy previous to v1.9.
 .
 apt-proxy has been rewritten in python and the new configuration file
 format is incompatible with previous version. Hopefully you will like the
 new format better :)
 .
 I will build /etc/apt-proxy/apt-proxy-v2.conf based on your old settings
 if you didn't already have such file. In any case, a backup file will be
 written to /etc/apt-proxy/apt-proxy-v2.conf.backup
 .
 There are also other issues documented in
 /usr/share/doc/apt-proxy/UPGRADING
";
$elem["apt-proxy/upgrading-v2"]["descriptionde"]="Aktualisierung eines Pakets in einer Version vor 1.9.
 Sie wollen eine Version von apt-proxy aktualisieren, die älter als die Version 1.9 ist.
 .
 apt-proxy wurde in Python neugeschrieben. Daher ist das Format der Konfigurationsdatei inkompatibel mit früheren Versionen. Hoffentlich gefällt Ihnen das neue Format besser :)
 .
 Die Datei /etc/apt-proxy/apt-proxy-v2.conf wird aufgrund Ihrer alten Einstellungen erstellt, falls diese Datei nicht bereits vorhanden ist. Es wird im jeden Fall eine Sicherheitskopie /etc/apt-proxy/apt-proxy-v2.conf.backup erstellt.
 .
 Ein paar andere Probleme werden in /usr/share/doc/apt-proxy/UPGRADING beschrieben.
";
$elem["apt-proxy/upgrading-v2"]["descriptionfr"]="Mise à niveau depuis une version antérieure à 1.9
 La mise à niveau en cours s'applique à une version d'apt-proxy antérieure à 1.9.
 .
 Apt-proxy a été réécrit en python et le nouveau format du fichier de configuration est incompatible avec l'ancien.
 .
 Le fichier de configuration /etc/apt-proxy/apt-proxy-v2.conf va être construit à partir de votre ancien fichier de configuration, s'il existe. Dans ce cas, une copie de sauvegarde en sera faite dans /etc/apt-proxy/apt-proxy-v2.conf.backup.
 .
 D'autres problèmes liés à cette mise à niveau sont documentés dans /usr/share/doc/apt-proxy/UPGRADING.
";
$elem["apt-proxy/upgrading-v2"]["default"]="";
$elem["apt-proxy/upgrading-v2-result"]["type"]="note";
$elem["apt-proxy/upgrading-v2-result"]["description"]="Upgrading issues
 The upgrading script dumped some warnings and they have been mailed to
 root@localhost.
 .
 You should read those warnings and /usr/share/doc/apt-proxy/UPGRADING and
 revise your configuration (/etc/apt-proxy/apt-proxy-v2.conf)
";
$elem["apt-proxy/upgrading-v2-result"]["descriptionde"]="Probleme bei der Aktualisierung
 Die Warnungen des Aktualisierungsskripts wurden per E-Mail an \"root@localhost\" geschickt.
 .
 Sie sollten diese Fehlermeldungen und /usr/share/doc/apt-proxy/UPGRADING lesen und Ihre Konfigurationsdatei (/etc/apt-proxy/apt-proxy-v2.conf) nochmal überprüfen.
";
$elem["apt-proxy/upgrading-v2-result"]["descriptionfr"]="Problèmes lors de la mise à niveau
 Le script de mise à niveau a émis des messages d'avertissements. Ils ont été envoyés par courriel à root@localhost.
 .
 Il est recommandé de lire ces avertissements ainsi que le fichier /usr/share/doc/apt-proxy/UPGRADING et d'adapter la configuration qui se trouve dans le fichier /etc/apt-proxy/apt-proxy-v2.conf.
";
$elem["apt-proxy/upgrading-v2-result"]["default"]="";
PKG_OptionPageTail2($elem);
?>
