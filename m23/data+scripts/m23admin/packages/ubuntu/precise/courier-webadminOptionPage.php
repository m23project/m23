<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("courier-webadmin");

$elem["courier-webadmin/install-cgi"]["type"]="boolean";
$elem["courier-webadmin/install-cgi"]["description"]="Activate CGI program?
 To allow courier-webadmin to work out of the box, the CGI
 program /usr/lib/courier/courier/webmail/webadmin needs to
 be installed as /usr/lib/cgi-bin/courierwebadmin with the SUID bit set.
 .
 This may have serious security implications, because
 courierwebadmin runs as root. Moreover, that solution is
 not guaranteed to work,
 depending on the web server software and its configuration.
 .
 If you choose this option and the web server setup is
 policy-compliant, you can access the administration frontend through
 http://localhost/cgi-bin/courierwebadmin.
";
$elem["courier-webadmin/install-cgi"]["descriptionde"]="CGI-Programm aktivieren?
 Damit courier-webadmin ohne weitere Eingriffe funktionieren kann, ist es erforderlich, das CGI-Programm /usr/lib/courier/courier/webmail/webadmin mit gesetztem SUID-Bit nach /usr/lib/cgi-bin/courierwebadmin zu installieren.
 .
 Dies könnte beträchtliche Auswirkungen auf die Sicherheit haben, da courierwebadmin als root läuft. Desweiteren kann nicht garantiert werden, dass diese Lösung funktioniert, abhängig von der Webserver-Software und deren Konfiguration.
 .
 Wenn Sie diese Option wählen und Ihre Webserver-Konfiguration der Policy entspricht, können Sie auf das Administrations-Frontend mit der URL http://localhost/cgi-bin/courierwebadmin zugreifen.
";
$elem["courier-webadmin/install-cgi"]["descriptionfr"]="Faut-il activer le programme CGI ?
 Pour que courier-webadmin fonctionne sans modifications, il est nécessaire de copier le programme CGI de /usr/lib/courier/courier/webmail/webadmin vers /usr/lib/cgi-bin/courierwebadmin et activer le bit SUID.
 .
 Ce choix peut avoir des implications sérieuses sur la sécurité car courierwebadmin s'exécute avec les droits du superutilisateur. Par ailleurs, rien ne garantit que cette solution fonctionne car elle dépend du type de serveur web et de sa configuration.
 .
 Si vous choisissez cette option et si la configuration de votre serveur web est conforme à la charte de la distribution, vous pourrez accéder à l'interface d'administration à l'adresse http://localhost/cgi-bin/courierwebadmin.
";
$elem["courier-webadmin/install-cgi"]["default"]="false";
$elem["courier-webadmin/password"]["type"]="password";
$elem["courier-webadmin/password"]["description"]="Password for Courier administration:
 A password is needed to protect access to the Courier administration
 web interface. Please choose one now.
";
$elem["courier-webadmin/password"]["descriptionde"]="Passwort zur Courier-Administration:
 Es wird ein Passwort benötigt, um den Zugriff auf die Courier-Administations-Web-Schnittstelle abzusichern. Bitte wählen Sie eines aus.
";
$elem["courier-webadmin/password"]["descriptionfr"]="Mot de passe pour l'administration de Courier :
 Un mot de passe est indispensable pour protéger l'accès à l'interface web d'administration de Courier. Veuillez le choisir maintenant.
";
$elem["courier-webadmin/password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
