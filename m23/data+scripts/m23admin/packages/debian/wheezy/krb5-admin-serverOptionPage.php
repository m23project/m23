<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("krb5-admin-server");

$elem["krb5-admin-server/newrealm"]["type"]="note";
$elem["krb5-admin-server/newrealm"]["description"]="Setting up a Kerberos Realm
 This package contains the administrative tools required to run the
 Kerberos master server.
 .
 However, installing this package does not automatically set up a
 Kerberos realm.  This can be done later by running the \"krb5_newrealm\"
 command.
 .
 Please also read the /usr/share/doc/krb5-kdc/README.KDC file
 and the administration guide found in the krb5-doc package.
";
$elem["krb5-admin-server/newrealm"]["descriptionde"]="Einrichten des Kerberos-Realm
 Dieses Paket enthält die administrativen Werkzeuge, die zum Betrieb des Kerberos-Master-Servers benötigt werden.
 .
 Allerdings führt die Installation dieses Pakets nicht automatisch zur Einrichtung einer Kerberos-Realm. Dies kann später mit dem Befehl »krb5_newrealm« erfolgen.
 .
 Bitte lesen Sie auch die Datei /usr/share/doc/krb5-kdc/README.KDC und den administrativen Leitfaden im krb5-doc-Paket.
";
$elem["krb5-admin-server/newrealm"]["descriptionfr"]="Configuration d'un royaume (« Realm ») Kerberos
 Ce paquet contient les outils d'administration utiles pour un serveur maître Kerberos.
 .
 Cependant, la simple installation de ce paquet ne suffit pas pour mettre en service automatiquement un royaume Kerberos. Pour créer le royaume, veuillez utiliser la commande « krb5_newrealm ».
 .
 Vous pouvez aussi consulter le fichier /usr/share/doc/krb5-kdc/README.KDC et le guide d'administration fourni dans le paquet krb5-doc.
";
$elem["krb5-admin-server/newrealm"]["default"]="";
$elem["krb5-admin-server/kadmind"]["type"]="boolean";
$elem["krb5-admin-server/kadmind"]["description"]="Run the Kerberos V5 administration daemon (kadmind)?
 Kadmind serves requests to add/modify/remove principals in the
 Kerberos database.
 .
 It is required by the kpasswd program, used to change passwords. 
 With standard setups, this daemon should run on the master KDC.
";
$elem["krb5-admin-server/kadmind"]["descriptionde"]="Soll der Kerberos V5-Administrations-Daemon (kadmind) laufen?
 Kadmind bedient Anfragen, um Prinzipale in der Kerberos-Datenbank hinzuzufügen/zu verändern/zu entfernen.
 .
 Es wird vom Kpasswd-Programm benötigt, dass zum Ändern von Passwörtern verwendet wird. Im Normalfall sollte der Daemon auf dem Master-KDC laufen.
";
$elem["krb5-admin-server/kadmind"]["descriptionfr"]="Faut-il lancer le démon d'administration de Kerberos v5 (kadmind) ?
 Kadmind répond aux requêtes d'ajout, modification et suppression des enregistrements dans la base de données de Kerberos.
 .
 Il est également indispensable pour que le programme kpasswd puisse changer les mots de passe. Habituellement, ce démon doit être opérationnel sur le centre de distribution de clés Kerberos (KDC).
";
$elem["krb5-admin-server/kadmind"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
