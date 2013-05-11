<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ldap-account-manager");

$elem["ldap-account-manager/config-webserver"]["type"]="multiselect";
$elem["ldap-account-manager/config-webserver"]["choices"][1]="apache";
$elem["ldap-account-manager/config-webserver"]["choices"][2]="apache-ssl";
$elem["ldap-account-manager/config-webserver"]["choices"][3]="apache-perl";
$elem["ldap-account-manager/config-webserver"]["description"]="Web server configuration:
 LDAP Account Manager supports any webserver that supports PHP4, but this
 automatic configuration process only supports Apache and Apache2.
 If you choose to configure Apache(2) LAM can be accessed at http(s)://localhost/lam
";
$elem["ldap-account-manager/config-webserver"]["descriptionde"]="Konfiguration des Webservers:
 LDAP Account Manager unterstützt alle Webserver mit PHP4-Unterstützung, aber diese automatische Konfiguration funktioniert nur mit Apache und Apache2. Nach der Auswahl von Apache(2) kann LAM unter http(s)://localhost/lam erreicht werden.
";
$elem["ldap-account-manager/config-webserver"]["descriptionfr"]="Configuration du serveur web :
 LDAP Account Manager s'occupe de tous les serveurs web qui gérent PHP4, mais ce processus de configuration ne fonctionne qu'avec Apache et Apache2. Si vous choisissez de configurer Apache(2), vous pourrez accéder à LAM via l'adresse http(s)://localhost/lam
";
$elem["ldap-account-manager/config-webserver"]["default"]="apache, apache-ssl, apache-perl, apache2";
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
$elem["ldap-account-manager/passwd"]["type"]="string";
$elem["ldap-account-manager/passwd"]["description"]="Master configuration password (clear text):
 The configuration profiles are secured by a master password.
 You will need it to create and delete profiles. As default it is
 set to \"lam\" and can be changed directly in LAM.
";
$elem["ldap-account-manager/passwd"]["descriptionde"]="Hauptpasswort für die Konfiguration (im Klartext):
 Die Konfigurationsprofile werden über ein Hauptpasswort gesichert. Es wird benötigt um Profile anzulegen und zu löschen. Der Standardwert dafür ist \"lam\" und kann innerhalb von LAM geändert werden.
";
$elem["ldap-account-manager/passwd"]["descriptionfr"]="Mot de passe principal (en clair) :
 Les profils de configuration sont protégés par un mot de passe principal. Vous en aurez besoin pour créer et effacer des profils. Sa valeur par défaut est « lam » et vous pourrez le modifier directement dans LAM.
";
$elem["ldap-account-manager/passwd"]["default"]="lam";
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
$elem["ldap-account-manager/note-0_4_9-upgrade"]["type"]="note";
$elem["ldap-account-manager/note-0_4_9-upgrade"]["description"]="Upgrade from pre-0.5.0 versions
 Please note that this version uses new file formats for configuration and
 account profiles. You will have to update your configuration and create new
 account profiles.
";
$elem["ldap-account-manager/note-0_4_9-upgrade"]["descriptionde"]="Aktualisierung von Versionen vor 0.5.0
 Bitte beachten Sie, dass diese Version neue Dateiformate für die Konfiguration und Account-Profile verwendet. Sie müssen die Konfiguration anpassen und neue Account-Profile erstellen.
";
$elem["ldap-account-manager/note-0_4_9-upgrade"]["descriptionfr"]="Mise à niveau depuis les versions pre-0.5.0
 Veuillez noter que la nouvelle version utilise de nouveaux formats de fichiers pour la configuration et les profils. Vous devez mettre à jour votre configuration et créer de nouveaux profils de compte.
";
$elem["ldap-account-manager/note-0_4_9-upgrade"]["default"]="";
$elem["ldap-account-manager/note-1_0_0-upgrade"]["type"]="note";
$elem["ldap-account-manager/note-1_0_0-upgrade"]["description"]="Upgrade from pre-1.0.0 versions
 Please note that this version uses new file formats for the configuration
 profiles. Please edit your configuration files and save the new
 settings.
";
$elem["ldap-account-manager/note-1_0_0-upgrade"]["descriptionde"]="Aktualisierung von Versionen vor 1.0.0
 Bitte beachten Sie, dass diese Version neue Dateiformate für die Konfiguration verwendet. Sie müssen die Konfiguration anpassen und die neuen Einstellungen speichern.
";
$elem["ldap-account-manager/note-1_0_0-upgrade"]["descriptionfr"]="Mise à niveau depuis les versions pre-1.0.0
 Veuillez noter que cette nouvelle version utilise de nouveaux formats de fichiers pour la configuration des profils. Vous devez mettre à jour votre configuration et sauver les nouveaux réglages.
";
$elem["ldap-account-manager/note-1_0_0-upgrade"]["default"]="";
PKG_OptionPageTail2($elem);
?>
