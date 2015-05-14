<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openvas-server");

$elem["openvas-server/certificate"]["type"]="note";
$elem["openvas-server/certificate"]["description"]="OpenVAS daemon certificate generation
 You will need to provide the relevant information to create an SSL
 certificate for your OpenVAS daemon. Note that this information will
 remain local to this system, but anyone
 with the ability to connect to your OpenVAS daemon will be able to
 see it.
";
$elem["openvas-server/certificate"]["descriptionde"]="Erzeugung des Zertifikats für den OpenVAS-Daemon
 Sie müssen die Informationen angeben, die zur Erzeugung eines SSL-Zertifikats für Ihren OpenVAS-Daemon notwendig sind. Beachten Sie, dass diese Informationen auf diesem System verbleiben, aber jeder mit der Möglichkeit, sich mit Ihrem OpenVAS-Daemon zu verbinden, kann diese Informationen einsehen.
";
$elem["openvas-server/certificate"]["descriptionfr"]="Création du certificat du démon OpenVAS
 Vous allez devoir fournir les informations nécessaires à la création d'un certificat SSL pour le démon OpenVAS. Veuillez noter que ces informations resteront locales, mais quiconque pouvant se connecter au démon OpenVAS sera en mesure de les récupérer.
";
$elem["openvas-server/certificate"]["default"]="";
$elem["openvas-server/califetime"]["type"]="string";
$elem["openvas-server/califetime"]["description"]="Certificate authority certificate lifetime (days):
 Please choose the lifetime of the Certificate Authority certificate that
 will be used to generate
 the OpenVAS daemon certificate.
";
$elem["openvas-server/califetime"]["descriptionde"]="Gültigkeitsdauer des Server-Zertifikats (in Tagen):
 Bitte wählen Sie die Gültigkeitsdauer des Zertifikats der Zertifizierungsstelle (Certificate Authority), das zur Erzeugung des Zertifikats für den OpenVAS-Daemon verwendet werden wird, aus.
";
$elem["openvas-server/califetime"]["descriptionfr"]="Durée de validité, en jours, du certificat de l'autorité de certification :
 Veuillez choisir la durée de validité du certificat de l'Autorité de Certification (CA : « Certificate Authority ») qui sera utilisée pour créer le certificat du démon OpenVAS.
";
$elem["openvas-server/califetime"]["default"]="1460";
$elem["openvas-server/srvlifetime"]["type"]="string";
$elem["openvas-server/srvlifetime"]["description"]="Server certificate lifetime (days):
 Please choose the lifetime of the OpenVAS daemon certificate.
 .
 OpenVAS clients will not connect to servers with expired certificates,
 so you should choose a duration longer than the time you plan to run
 this server.
 .
 This certificate can be regenerated later by removing the certificate
 file stored in /var/lib/openvas/CA/ and running \"openvas-mkcert\".
";
$elem["openvas-server/srvlifetime"]["descriptionde"]="Gültigkeitsdauer des Server-Zertifikats (in Tagen):
 Bitte wählen Sie die Gültigkeitsdauer des Zertifikats des OpenVAS-Daemons aus.
 .
 OpenVAS-Clients können sich nicht mit Servern verbinden, deren Zertifikat abgelaufen ist, daher sollten Sie die Dauer so wählen, dass sie die geplante Betriebsdauer des Servers überschreitet.
 .
 Dieses Zertifikat kann später regeneriert werden, indem die in /var/lib/openvas/CA/ gespeicherte Zertifikatsdatei entfernt und »openvas-mkcert« aufgerufen wird.
";
$elem["openvas-server/srvlifetime"]["descriptionfr"]="Durée de validité, en jours, du certificat du serveur :
 Veuillez indiquer la durée de validité du certificat du démon OpenVAS.
 .
 Les clients OpenVAS ne pourront pas se connecter aux serveurs utilisant des certificats expirés. Il est donc conseillé de choisir une durée suffisante pour la vie du serveur.
 .
 Le certificat peut être recréé plus tard en supprimant le fichier de certificat dans /var/lib/openvas/CA/ et en utilisant la commande « openvas-mkcert ».
";
$elem["openvas-server/srvlifetime"]["default"]="365";
$elem["openvas-server/country"]["type"]="string";
$elem["openvas-server/country"]["description"]="Country (two-letter code):
 Please enter the two-letter code for the country where this server resides.
";
$elem["openvas-server/country"]["descriptionde"]="Ihr Land (Zweibuchstabiger Code):
 Bitte geben Sie den zweibuchstabigen Code für das Land an, in dem sich der Server befindet.
";
$elem["openvas-server/country"]["descriptionfr"]="Pays (code à deux lettres) :
 Veuillez indiquer le code du pays où est situé le serveur.
";
$elem["openvas-server/country"]["default"]="";
$elem["openvas-server/province"]["type"]="string";
$elem["openvas-server/province"]["description"]="State or province:
 Please enter the state or province where this server resides.
";
$elem["openvas-server/province"]["descriptionde"]="Bundesland oder Provinz:
 Geben Sie das Bundesland oder die Provinz ein, in dem sich der Server befindet.
";
$elem["openvas-server/province"]["descriptionfr"]="État ou province :
 Veuillez indiquer le nom de l'état ou de la province où est situé le serveur.
";
$elem["openvas-server/province"]["default"]="";
$elem["openvas-server/location"]["type"]="string";
$elem["openvas-server/location"]["description"]="Location:
 Please enter the location (town, for example) where this server resides.
";
$elem["openvas-server/location"]["descriptionde"]="Standort:
 Bitte geben Sie den Standort (beispielsweise die Stadt) an, an dem sich der Server befindet.
";
$elem["openvas-server/location"]["descriptionfr"]="Emplacement du serveur :
 Veuillez indiquer l'emplacement (par exemple la ville) où est situé le serveur.
";
$elem["openvas-server/location"]["default"]="";
$elem["openvas-server/organization"]["type"]="string";
$elem["openvas-server/organization"]["description"]="Organization:
 Please enter the name of the organization this server belongs to.
";
$elem["openvas-server/organization"]["descriptionde"]="Organisation:
 Bitte geben Sie den Namen der Organisation ein, zu der dieser Server gehört.
";
$elem["openvas-server/organization"]["descriptionfr"]="Organisation :
 Veuillez indiquer le nom de l'organisation ou de la société à laquelle le serveur appartient.
";
$elem["openvas-server/organization"]["default"]="OpenVAS";
PKG_OptionPageTail2($elem);
?>
