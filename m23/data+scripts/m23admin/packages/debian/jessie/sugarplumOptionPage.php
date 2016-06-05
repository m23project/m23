<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sugarplum");

$elem["sugarplum/configure_httpd"]["type"]="boolean";
$elem["sugarplum/configure_httpd"]["description"]="Do you want to configure your web servers for sugarplum?
 To activate sugarplum, your web servers' configuration may need to be
 modified.
";
$elem["sugarplum/configure_httpd"]["descriptionde"]="Möchten Sie Ihre Webserver für Sugarplum einrichten?
 Um Sugarplum zu aktivieren, muss die Konfiguration Ihrer Webserver möglicherweise modifiziert werden.
";
$elem["sugarplum/configure_httpd"]["descriptionfr"]="Souhaitez-vous configurer vos serveurs web pour sugarplum ?
 Afin d'activer sugarplum, il est nécessaire de modifier le fichier de configuration de vos serveurs web.
";
$elem["sugarplum/configure_httpd"]["default"]="false";
$elem["sugarplum/deconfigure_httpd"]["type"]="boolean";
$elem["sugarplum/deconfigure_httpd"]["description"]="Do you want to deconfigure your web servers for sugarplum?
 If you have configured your web servers for sugarplum, they should (or
 must, if you are purging sugarplum) now be de-configured to ensure that
 they will properly function the next time you restart them.
";
$elem["sugarplum/deconfigure_httpd"]["descriptionde"]="Möchten Sie die Konfiguration Ihrer Webserver für Sugarplum entfernen?
 Falls Sie Ihre Webserver für Sugarplum konfiguriert haben, sollte (oder muss, falls Sie Sugarplum vollständig entfernen) diese Konfiguration wieder entfernt werden, um sicherzustellen, dass die Webserver beim nächsten Neustart ordnungsgemäß funktionieren.
";
$elem["sugarplum/deconfigure_httpd"]["descriptionfr"]="Souhaitez-vous supprimer la gestion de sugarplum par votre serveur web ?
 Si vous avez configuré vos serveurs web pour sugarplum, il faudrait supprimer cette gestion de sugarplum afin d'éviter tout problème lors du prochain redémarrage.
";
$elem["sugarplum/deconfigure_httpd"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
