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
 Bitte geben Sie den Rechnernamen für das SSL-Zertifikat ein.
 .
 Das wird im Feld »commonName« des erzeugten SSL-Zertifikats verwendet.
";
$elem["make-ssl-cert/hostname"]["descriptionfr"]="Nom d'hôte :
 Veuillez indiquer le nom d'hôte à utiliser dans le certificat SSL.
 .
 Ce sera le contenu du champ « commonName » du certificat SSL créé.
";
$elem["make-ssl-cert/hostname"]["default"]="localhost";
$elem["make-ssl-cert/altname"]["type"]="string";
$elem["make-ssl-cert/altname"]["description"]="Alternative name(s):
 Please enter any additional names to use in the SSL certificate.
 .
 It will become the 'subjectAltName' field of the generated SSL certificate.
 .
 Multiple alternative names should be delimited with comma and no spaces.
 For a web server with multiple DNS names this could look like:
 .
 DNS:www.example.com,DNS:images.example.com
 .
 A more complex example including a hostname, a WebID, an email address, and
 an IPv4 address:
 .
 DNS:example.com,URI:http://example.com/joe#me,email:me@example.com,IP:192.168.7.3
";
$elem["make-ssl-cert/altname"]["descriptionde"]="Alternativ-Name(n):
 Bitte geben Sie jegliche weitere Namen für das Zertifikat ein.
 .
 Das wird im Feld »subjectAltName« des erzeugten SSL-Zertifikats verwendet.
 .
 Mehrere alternative Namen sollten durch Komma getrennt werden, nicht durch Leerzeichen. Für einen Web-Server mit mehreren DNS-Namen könnte dies wie folgt aussehen:
 .
 DNS:www.example.com,DNS:images.example.com
 .
 Ein komplexeres Beispiel, bestehend aus einem Rechnernamen, einer Web-Adresse, einer E-Mail-Adresse und eine IPv4-Adresse:
 .
 DNS:example.com,URI:http://example.com/joe#me,email:me@example.com,IP:192.168.7.3
";
$elem["make-ssl-cert/altname"]["descriptionfr"]="Nom(s) supplémentaire(s) :
 Veuillez indiquer d'éventuels noms d'hôte supplémentaires à utiliser dans le certificat SSL.
 .
 Ce sera le contenu du champ « subjectAltName » du certificat SSL créé.
 .
 Des entrées multiples doivent être délimitées par des virgules, sans espaces. Ainsi, pour un serveur web qui utilise plusieurs noms DNS, cette entrée devrait ressembler à :
 .
 DNS:www.example.com,DNS:images.example.com
 .
 Exemple plus complexe comportant un nom d'hôte, un identifiant web (« WebID »), une adresse électronique et une adresse IPv4 :
 .
 DNS:example.com,URI:http://example.com/joe#me,email:me@example.com,IP:192.168.7.3
";
$elem["make-ssl-cert/altname"]["default"]="";
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
