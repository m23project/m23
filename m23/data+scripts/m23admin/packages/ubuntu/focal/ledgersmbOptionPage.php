<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ledgersmb");

$elem["ledgersmb/admin_login"]["type"]="string";
$elem["ledgersmb/admin_login"]["description"]="Database administrative user login:
 Please enter the login of the LedgerSMB database administrative user. This
 login is needed for the administrative web user interface, typically at
 http://localhost:5762/setup.pl.
";
$elem["ledgersmb/admin_login"]["descriptionde"]="Benutzername des Datenbankadministrators:
 Bitte geben Sie den Benutzernamen des LedgerSMB-Datenbankadministrators ein. Dieser Benutzername ist für die administrative Weboberfläche nötig, die in der Regel unter http://localhost:5762/setup.pl erreichbar ist.
";
$elem["ledgersmb/admin_login"]["descriptionfr"]="
 Veuillez indiquer l'identifiant de l'administrateur LedgerSMB. Cet identifiant est nécessaire pour accéder à l'interface web d'administration, généralement située à l'adresse http://localhost:5762/setup.pl.
";
$elem["ledgersmb/admin_login"]["default"]="lsmb_dbadmin";
$elem["ledgersmb/admin_password"]["type"]="password";
$elem["ledgersmb/admin_password"]["description"]="Database administrative user password:
 Please enter the password of the LedgerSMB database administrative user. This
 password is needed for the administrative web user interface, typically at
 http://localhost:5762/setup.pl.
";
$elem["ledgersmb/admin_password"]["descriptionde"]="Passwort des Datenbankadministrators
 Bitte geben Sie das Passwort des LedgerSMB-Datenbankadministrators ein. Dieses Passwort wird für die administrative Weboberfläche nötig, die in der Regel unter http://localhost:5762/setup.pl erreichbar ist.
";
$elem["ledgersmb/admin_password"]["descriptionfr"]="
 Veuillez indiquer le mot de passe de l'administrateur de base de données pour LedgerSMB. Ce mot de passe est nécessaire pour accéder à l'interface web d'administration, généralement située à l'adresse http://localhost:5762/setup.pl.
";
$elem["ledgersmb/admin_password"]["default"]="LEDGERSMBINITIAL";
$elem["ledgersmb/lsmb_proxy"]["type"]="select";
$elem["ledgersmb/lsmb_proxy"]["choices"][1]="${lsmbproxy}";
$elem["ledgersmb/lsmb_proxy"]["choices"][2]="None";
$elem["ledgersmb/lsmb_proxy"]["choices"][3]="Apache";
$elem["ledgersmb/lsmb_proxy"]["choices"][4]="Lighttpd";
$elem["ledgersmb/lsmb_proxy"]["choices"][5]="Nginx";
$elem["ledgersmb/lsmb_proxy"]["description"]="Web Reverse Proxy to configure?
 The LedgerSMB application now defaults to being made available on port 5762,
 and being run directly by Starman. If other access is needed, a Reverse Proxy
 can be configured using Apache or Nginx or Lighttpd or Varnish, or you can
 leave the choice as None if it is not needed or if the web proxy will be set
 up remotely.
 .
 For more details, please see the Web Proxy section that can be found in the
 /usr/share/doc/ledgersmb/README.Debian file.
";
$elem["ledgersmb/lsmb_proxy"]["descriptionde"]="Zu konfigurierender inverser Web-Proxy?
 Die Anwendung LedgerSMB wird nun standardmäßig auf Port 5762 verfügbar gemacht und direkt von Starman ausgeführt. Falls weiterer Zugriff benötigt wird, muss ein inverser Proxy mittels Apache, Nginx, Lighttpd oder Varnish konfiguriert werden, oder Sie lassen die Auswahl auf »None«, falls dies nicht benötigt wird oder falls der Web-Proxy in der Ferne eingerichtet wird.
 .
 Für weitere Details lesen Sie bitte den Abschnitt »Web Proxy« aus der Datei /usr/share/doc/ledgersmb/README.Debian file.
";
$elem["ledgersmb/lsmb_proxy"]["descriptionfr"]="Faut-il configurer un serveur mandataire inverse (Reverse Proxy) ?
 L'application LedgerSMB est désormais accessible par défaut sur le port 5762, et est directement lancée par Starman. Si un autre accès est nécessaire, un serveur mandataire inverse (Reverse Proxy) peut être paramétré en utilisant Apache, Nginx, Lighttpd ou encore Varnish. Vous pouvez également laisser ce choix à None si cela n'est pas nécessaire ou bien si le serveur mandataire sera installé ailleurs.
 .
 Des renseignements supplémentaires sur le serveur mandataire sont disponibles dans /usr/share/doc/ledgersmb/README.Debian.
";
$elem["ledgersmb/lsmb_proxy"]["default"]="None";
PKG_OptionPageTail2($elem);
?>
