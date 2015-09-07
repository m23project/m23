<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ssl-cert");

$elem["make-ssl-cert/hostname"]["type"]="string";
$elem["make-ssl-cert/hostname"]["description"]="Host name:
 Please enter the host name to use in the SSL certificate.
 .
 It will become the 'commonName' field of the generated SSL certificate.
";
$elem["make-ssl-cert/hostname"]["descriptionde"]="Rechnername:
 Bitte geben Sie den Rechnernamen für das Zertifikat ein.
 .
 Das wird im Feld »commonName« des erzeugten SSL-Zertifikats verwendet.
";
$elem["make-ssl-cert/hostname"]["descriptionfr"]="Nom d'hôte :
 Veuillez indiquer le nom d'hôte à utiliser dans le certificat SSL.
 .
 Ce sera le contenu du champ « commonName » du certificat SSL créé.
";
$elem["make-ssl-cert/hostname"]["default"]="localhost";
$elem["make-ssl-cert/title"]["type"]="title";
$elem["make-ssl-cert/title"]["description"]="Configure an SSL Certificate.
";
$elem["make-ssl-cert/title"]["descriptionde"]="SSL-Zertifikat einrichten.
";
$elem["make-ssl-cert/title"]["descriptionfr"]="Configuration d'un certificat SSL
";
$elem["make-ssl-cert/title"]["default"]="";
$elem["make-ssl-cert/vulnerable_prng"]["type"]="note";
$elem["make-ssl-cert/vulnerable_prng"]["description"]="Local SSL certificates must be replaced
 A security certificate which was automatically created for your
 local system needs to be replaced due to a flaw which renders it
 insecure. This will be done automatically.
 .
 If you don't know anything about this, you can safely ignore this message.
";
$elem["make-ssl-cert/vulnerable_prng"]["descriptionde"]="Das lokale SSL-Zertifikat muss ersetzt werden.
 Ein automatisch für Ihr lokales System erzeugtes Sicherheitszertifikat muss wegen einer Schwachstelle, die es unsicher macht, ersetzt werden. Das geschieht automatisch.
 .
 Wenn Sie damit nichts anfangen können, ignorieren Sie diese Nachricht einfach.
";
$elem["make-ssl-cert/vulnerable_prng"]["descriptionfr"]="Remplacement indispensable des certificats SSL locaux
 Un certificat créé précédemment pour ce système doit être remplacé en raison d'un défaut de sécurité qui le rend vulnérable. Cette opération sera automatique.
 .
 Vous pouvez ignorer ce message si vous ne savez pas ce dont il est question.
";
$elem["make-ssl-cert/vulnerable_prng"]["default"]="";
PKG_OptionPageTail2($elem);
?>
