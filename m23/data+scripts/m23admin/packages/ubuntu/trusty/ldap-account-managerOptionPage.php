<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ldap-account-manager");

$elem["ldap-account-manager/config-webserver"]["type"]="multiselect";
$elem["ldap-account-manager/config-webserver"]["description"]="Web server configuration:
 LDAP Account Manager supports any webserver that supports PHP5, but this
 automatic configuration process only supports Apache2.
 If you choose to configure Apache2 then LAM can be accessed at http(s)://localhost/lam
";
$elem["ldap-account-manager/config-webserver"]["descriptionde"]="Konfiguration des Webservers:
 LDAP Account Manager unterstützt alle Webserver mit PHP5-Unterstützung, aber diese automatische Konfiguration funktioniert nur mit Apache2. Nach der Auswahl von Apache2 kann LAM unter http(s)://localhost/lam erreicht werden.
";
$elem["ldap-account-manager/config-webserver"]["descriptionfr"]="Configuration du serveur web :
 LDAP Account Manager s'occupe de tous les serveurs web qui gérent PHP5, mais ce processus de configuration ne fonctionne qu'avec Apache2. Si vous choisissez de configurer Apache2, vous pourrez accéder à LAM via l'adresse http(s)://localhost/lam.
";
$elem["ldap-account-manager/config-webserver"]["default"]="apache2";
$elem["ldap-account-manager/alias"]["type"]="string";
$elem["ldap-account-manager/alias"]["description"]="Alias name:
 LAM will add an alias to your httpd.conf which allows you to
 access LAM at http(s)://localhost/lam. You may select an alias other than
 \"lam\".
";
$elem["ldap-account-manager/alias"]["descriptionde"]="Aliasname:
 LAM wird der httpd.conf einen Alias hinzufügen, der es erlaubt LAM über http(s)://localhost/lam zu erreichen. Wenn Sie einen anderen Alias als \"lam\" wünschen, können Sie ihn hier angeben.
";
$elem["ldap-account-manager/alias"]["descriptionfr"]="Alias :
 LAM ajoute un alias au fichier httpd.conf, ce qui permet d'accéder à LAM à l'adresse http(s)://localhost/lam. Si vous désirez un alias différent de « lam », veuillez l'indiquer ici.
";
$elem["ldap-account-manager/alias"]["default"]="lam";
$elem["ldap-account-manager/restart-webserver"]["type"]="boolean";
$elem["ldap-account-manager/restart-webserver"]["description"]="Would you like to restart your webserver(s) now?
 Your webserver(s) need to be restarted in order to apply the changes.
";
$elem["ldap-account-manager/restart-webserver"]["descriptionde"]="Soll(en) der/die Webserver jetzt neugestartet werden?
 Sie müssen ihre(n) Webserver neustarten um die Änderungen zu übernehmen.
";
$elem["ldap-account-manager/restart-webserver"]["descriptionfr"]="Faut-il redémarrer le(s) serveur(s) web maintenant ?
 Le(s) serveur(s) web doivent être redémarrés afin que les changements soient appliqués.
";
$elem["ldap-account-manager/restart-webserver"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
