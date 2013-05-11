<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libhtml-mason-perl-examples");

$elem["libhtml-mason-perl/install_examples"]["type"]="boolean";
$elem["libhtml-mason-perl/install_examples"]["description"]="Install example Mason components in /var/www/mason_example?
 To help you get started with HTML::Mason, some example components can be
 installed and enabled in /var/www/mason_example, and you can visit them at
 http://localhost/mason_example/ in your web browser.
";
$elem["libhtml-mason-perl/install_examples"]["descriptionde"]="Beispiele für Mason-Komponenten in /var/www/mason_example installieren?
 Um Ihnen am Anfang zu helfen, können einige Beispielkomponenten in /var/www/mason_example installiert und aktiviert werden. Sie können diese unter http://localhost/mason_example in Ihrem Web-Browser aufrufen.
";
$elem["libhtml-mason-perl/install_examples"]["descriptionfr"]="Faut-il installer les exemples de composants Mason dans /var/www/mason_example ?
 Pour débuter plus facilement avec HTML::Mason, certains exemples de composants peuvent être installés et activés dans le répertoire /var/www/mason_example. Vous pourrez alors les essayer à l'adresse http://localhost/mason_example/ avec votre navigateur.
";
$elem["libhtml-mason-perl/install_examples"]["default"]="true";
$elem["libhtml-mason-perl/auto_restart_apache"]["type"]="boolean";
$elem["libhtml-mason-perl/auto_restart_apache"]["description"]="Automatically reload Apache configuration?
 After installing or removing the example Mason components, the Apache
 configuration needs to be reloaded for them to be accessible.
";
$elem["libhtml-mason-perl/auto_restart_apache"]["descriptionde"]="Apache-Konfiguration automatisch neu laden?
 Nach der Installation oder dem Entfernen der Beispielkomponenten für Mason muss die Apache-Konfiguration neu geladen werden, um diese verfügbar zu machen.
";
$elem["libhtml-mason-perl/auto_restart_apache"]["descriptionfr"]="Faut-il recharger la configuration d'Apache ?
 Après l'installation des exemples de composants de Mason, la configuration d'Apache doit être rechargée avec la commande « apachectl graceful ».
";
$elem["libhtml-mason-perl/auto_restart_apache"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
