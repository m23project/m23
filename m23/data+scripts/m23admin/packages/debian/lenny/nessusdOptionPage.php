<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nessusd");

$elem["nessusd/certificate"]["type"]="note";
$elem["nessusd/certificate"]["description"]="Nessus Daemon certificate generation
 You will need to provide the relevant information to create an SSL
 certificate for your Nessus Daemon. Note that this information will
 *NOT* be sent to echo anybody (everything stays local), but anyone 
 with the ability to connect to your Nessus daemon will be able to
 retrieve this information.
";
$elem["nessusd/certificate"]["descriptionde"]="Erzeugung des Zertifikats für den Nessus-Daemon
 Sie müssen die Informationen angeben, die zur Erzeugung eines SSL-Zertifikats für Ihren Nessus-Daemon notwendig sind. Beachten Sie, dass diese Informationen zu *NIEMANDEM* gesendet werden (alles bleibt lokal), aber jeder mit der Möglichkeit, sich mit Ihrem Nessus-Daemon zu verbinden, kann diese Informationen beziehen.
";
$elem["nessusd/certificate"]["descriptionfr"]="Création du certificat du démon Nessus
 Vous allez devoir fournir les informations nécessaires à la création d'un certificat SSL pour votre démon Nessus. Veuillez noter que ces informations ne seront envoyées à *PERSONNE* (conservées en local), mais quiconque pouvant se connecter à votre démon Nessus sera en mesure de les récupérer.
";
$elem["nessusd/certificate"]["default"]="";
$elem["nessusd/califetime"]["type"]="string";
$elem["nessusd/califetime"]["description"]="CA certificate life time in days
 Provide the life time of the Certificate Authority used to generate
 the Nessus Daemon certificate.
";
$elem["nessusd/califetime"]["descriptionde"]="Gültigkeitsdauer des CA-Zertifikats in Tagen:
 Geben Sie die Gültigkeitsdauer des Zertifikats der Zertifizierungsstelle (Certificate Authority, CA) an, das zur Erzeugung des Zertifikats für den Nessus-Daemon zu verwenden ist.
";
$elem["nessusd/califetime"]["descriptionfr"]="Durée de validité, en jours, du certificat de l'autorité de certification :
 Veuillez indiquer la durée de validité de l'Autorité de Certification (CA : « Certificate Authority ») utilisée pour créer le certificat du démon Nessus.
";
$elem["nessusd/califetime"]["default"]="1460";
$elem["nessusd/srvlifetime"]["type"]="string";
$elem["nessusd/srvlifetime"]["description"]="Server certificate life time in days
 Provide the life time of the Nessus Server certificate. Notice that the
 Nessus clients will not connect to servers with expired certificates
 so set this value for as long as you want this installation to last.
 You can always regenerate this certificate later by removing the certificate
 file stored in /var/lib/nessusd/CA/ and running 'nessus-mkcert'
";
$elem["nessusd/srvlifetime"]["descriptionde"]="Gültigkeitsdauer des Server-Zertifikats in Tagen:
 Geben Sie die Gültigkeitsdauer für das Zertifikat des Nessus-Servers an. Beachten Sie, dass Nessus-Clients sich nicht mit Servern mit abgelaufenem Zertifikat verbinden. Setzen Sie einen Wert für die gesamte Dauer ein, für die diese Installation bestehen soll. Sie können dieses Zertifikat jederzeit neu generieren, indem Sie das Zertifikat, das in /var/lib/nessusd/CA/ gespeichert ist, löschen und nessus-mkcert ausführen.
";
$elem["nessusd/srvlifetime"]["descriptionfr"]="Durée de validité, en jours, du certificat du serveur :
 Veuillez indiquer la durée de validité du certificat du serveur Nessus. Les clients Nessus ne se connecteront pas aux serveurs dont le certificat a expiré ; par conséquent, vous devriez choisir une valeur permettant que le certificat soit valable aussi longtemps que cette installation sera utilisée. Il est toujours possible de recréer ce certificat plus tard en supprimant le fichier de certificat enregistré sous /var/lib/nessusd/CA/ et en lançant « nessus-mkcert ».
";
$elem["nessusd/srvlifetime"]["default"]="365";
$elem["nessusd/country"]["type"]="string";
$elem["nessusd/country"]["description"]="Your country (two letter code)
 Enter your country's two letter code.
";
$elem["nessusd/country"]["descriptionde"]="Ihr Land (Länder-Code)
 Geben Sie den Länder-Code (bestehend aus zwei Buchstaben) für Ihr Land ein.
";
$elem["nessusd/country"]["descriptionfr"]="Pays (code à deux lettres) :
 Veuillez indiquer le code à deux lettres de votre pays.
";
$elem["nessusd/country"]["default"]="";
$elem["nessusd/province"]["type"]="string";
$elem["nessusd/province"]["description"]="Your state or province
 Enter the state or provice you reside in.
";
$elem["nessusd/province"]["descriptionde"]="Ihr Bundesland oder Ihre Provinz:
 Geben Sie das Bundesland oder die Provinz ein, in dem oder der Sie wohnen.
";
$elem["nessusd/province"]["descriptionfr"]="État ou province :
 Veuillez indiquer le nom de l'état ou de la province où est situé le serveur.
";
$elem["nessusd/province"]["default"]="";
$elem["nessusd/location"]["type"]="string";
$elem["nessusd/location"]["description"]="Your location
 Enter your location (e.g. town).
";
$elem["nessusd/location"]["descriptionde"]="Ihr Standort:
 Geben Sie Ihren Standort ein (i. A. Ortschaft).
";
$elem["nessusd/location"]["descriptionfr"]="Localisation du serveur :
 Veuillez indiquer la localisation du serveur (p. ex. la ville où il est situé).
";
$elem["nessusd/location"]["default"]="";
$elem["nessusd/organization"]["type"]="string";
$elem["nessusd/organization"]["description"]="Your organisation
 Enter the name of your organization or company.
";
$elem["nessusd/organization"]["descriptionde"]="Ihre Organisation:
 Geben Sie den Namen Ihrer Organisation oder Firma ein.
";
$elem["nessusd/organization"]["descriptionfr"]="Organisation :
 Veuillez indiquer le nom de votre organisation ou société.
";
$elem["nessusd/organization"]["default"]="Nessus Users United";
PKG_OptionPageTail2($elem);
?>
