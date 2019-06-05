<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("expeyes-web");

$elem["expeyes-web/reconfigure-webserver"]["type"]="select";
$elem["expeyes-web/reconfigure-webserver"]["choices"][1]="apache2";
$elem["expeyes-web/reconfigure-webserver"]["description"]="List of web servers to reconfigure automatically:
 Expeyes-Web currently supports Apache2.
 .
 If no web service is installed, choose \"none\".
";
$elem["expeyes-web/reconfigure-webserver"]["descriptionde"]="Liste der Webserver, die automatisch neu konfiguriert werden sollen:
 Expeyes-Web unterstützt derzeit Apache2.
 .
 Falls kein Web-Dienst installiert ist, wählen Sie »none«.
";
$elem["expeyes-web/reconfigure-webserver"]["descriptionfr"]="Liste de serveurs web à reconfigurer automatiquement :
 Expeyes-Web ne supporte qu'Apache2 actuellement.
 .
 Si aucun serveur web ne doit être configuré, choisir \"none\".
";
$elem["expeyes-web/reconfigure-webserver"]["default"]="apache2";
$elem["expeyes-web/expeyes-site"]["type"]="string";
$elem["expeyes-web/expeyes-site"]["description"]="This should be the URL of the Expeyes service:
 Choose some fully qualified domain name, and make sure that this name
 will be resolved by DNS servers to your server's IP address.
";
$elem["expeyes-web/expeyes-site"]["descriptionde"]="Dies sollte der URL des Expeyes-Dienstes sein:
 Wählen Sie einen vollqualifizierten Domain-Namen und stellen Sie sicher, dass dieser Name durch DNS-Server zu der IP-Adresse Ihres Servers aufgelöst wird.
";
$elem["expeyes-web/expeyes-site"]["descriptionfr"]="Ce devrait être l'URL du service Expeyes :
 Choisissez un nom de domaine complètement qualifié et assurez-vous que ce nom sera résolu par les serveurs DNS en l'adresse IP de votre serveur.
";
$elem["expeyes-web/expeyes-site"]["default"]="expeyes.example.com";
$elem["expeyes-web/school-site"]["type"]="string";
$elem["expeyes-web/school-site"]["description"]="This should be the URL reachable by the \"Home\" link:
 The main page featured by the Expeyes service has a few active buttons
 in its top. The \"Home\" button can be a link to a schools welcome page.
 .
 Choose some fully qualified domain name, and make sure that this name
 will be resolved by DNS servers to your school server's IP address.
";
$elem["expeyes-web/school-site"]["descriptionde"]="Dies sollte der URL sein, der durch den Link »Home« erreichbar ist:
 Die Hauptseite, die vom Expeyes-Dienst angeboten wird, hat oben einige aktive Knöpfe. Der Knopf »Home« kann ein Link auf die Willkommensseite der Schule sein.
 .
 Wählen Sie einen vollqualifizierten Domain-Namen und stellen Sie sicher, dass dieser Name durch DNS-Server zu der IP-Adresse Ihrer Schule aufgelöst wird.
";
$elem["expeyes-web/school-site"]["descriptionfr"]="Ce devrait être l'URL pointée par le lien \"Home\" :
 La page d'accueil que fournit le service Expeyes a quelques boutons actifs tout en haut. Le bouton \"Home\" peut être un lien vers la page d'accueil d'une école.
 .
 Choisissez un nom de domaine complètement qualifié et assurez-vous que ce nom sera résolu par les serveurs DNS en l'adresse IP du service web de votre école.
";
$elem["expeyes-web/school-site"]["default"]="school.example.com";
PKG_OptionPageTail2($elem);
?>
