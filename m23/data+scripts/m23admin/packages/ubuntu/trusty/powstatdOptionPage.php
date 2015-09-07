<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("powstatd");

$elem["powstatd/cryptpassword"]["type"]="note";
$elem["powstatd/cryptpassword"]["description"]="Notice for powstatd master/slave UPS users
 This message is displayed because the configuration file
 /etc/powstatd.conf indicates that a master/slave UPS configuration is used
 but a password directive is not found in /etc/powstatd.conf
 .
 Since version 1.5.1-3, the powstatd package uses cryptography to
 communicate between master and slave units (as was previously done using
 the powstatd-crypt package). An identical password directive is needed in
 the master file as well as all the slaves, e.g. a line such as
 .
 password MyPasswordHere
 .
 See powstatd(8) for details.
";
$elem["powstatd/cryptpassword"]["descriptionde"]="Information für Benutzer von Master/Slave-UPS
 Diese Mitteilung wird angezeigt, da die Konfigurationsdatei /etc/powstatd.conf andeutet, dass eine Master/Slave-Konfiguration verwendet wird, aber keine Passwort-Anweisung in /etc/powstatd.conf gefunden werden konnte.
 .
 Seit Version 1.5.1-3 verwendet das Powstatd-Paket Kryptographie, um zwischen Master und Slave-Einheiten zu kommunizieren, wie dies bisher in dem Powstatd-crypt-Paket der Fall war. Eine identische Passwort-Anweisung wird sowohl in der Master-Datei wie auch in denen der Slaves benötigt, z.B. eine Zeile der Form
 .
 password MeinPasswortHier
 .
 Lesen Sie powstatd(8) für weitere Details.
";
$elem["powstatd/cryptpassword"]["descriptionfr"]="Remarque pour les utilisateurs d'onduleurs maîtres ou esclave gérés par powstatd
 Le fichier de configuration « /etc/powstatd.conf » indique que la configuration des onduleurs maître/esclave est utilisée mais aucune directive de mot de passe n'a été trouvée dans « /etc/powstad.conf »
 .
 Depuis la version 1.5.1-3, le paquet powstatd utilise la cryptographie pour communiquer avec les unités maître et esclave (auparavant gérées par le paquet powstatd-crypt). Une directive de mot de passe identique est nécessaire dans le fichier de configuration du périphérique maître, ainsi que dans tous les fichiers des périphériques esclaves, par exemple une ligne telle que :
 .
 password MotDePasse
 .
 Veuillez vous référer à la page de manuel de powstatd(8) pour de plus de détails.
";
$elem["powstatd/cryptpassword"]["default"]="";
PKG_OptionPageTail2($elem);
?>
