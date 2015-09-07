<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dovecot-core");

$elem["dovecot-core/ssl-cert-exists"]["type"]="error";
$elem["dovecot-core/ssl-cert-exists"]["description"]="Wrong location for SSL certificates
 This machine uses SSL certificates for Dovecot. These certificates
 should be moved from /etc/ssl to /etc/dovecot and Dovecot's
 configuration file (/etc/dovecot/conf.d/10-ssl.conf) should be updated
 accordingly.
 .
 Please read /usr/share/doc/dovecot-core/README.Debian.gz for details.
";
$elem["dovecot-core/ssl-cert-exists"]["descriptionde"]="Falscher Speicherort für SSL-Zertifikate
 Dieser Rechner verwendet SSL-Zertifikate für Dovecot. Diese Zertifikate sollten von /etc/ssl nach /etc/dovecot verschoben und die Konfigurationsdatei von Dovecot (/etc/dovecot/conf.d/10-ssl.conf) entsprechend aktualisiert werden.
 .
 Bitte lesen Sie /usr/share/doc/dovecot-core/README.Debian.gz, um Einzelheiten zu erfahren.
";
$elem["dovecot-core/ssl-cert-exists"]["descriptionfr"]="Mauvais emplacement pour les certificats SSL
 Cette machine utilise des certificats SSL pour Dovecot. Ces certificats doivent être déplacés de /etc/ssl vers /etc/dovecot, et le fichier de configuration de Dovecot (/etc/dovecot/conf.d/10-ssl.conf) doit être mis à jour en conséquence.
 .
 Veuillez lire le fichier /usr/share/doc/dovecot-core/README.Debian.gz pour les détails.
";
$elem["dovecot-core/ssl-cert-exists"]["default"]="";
$elem["dovecot-core/create-ssl-cert"]["type"]="boolean";
$elem["dovecot-core/create-ssl-cert"]["description"]="Create a self-signed SSL certificate?
 An SSL certificate is needed in order to use IMAP or POP3 over SSL/TLS.
 No such certificate was found.
 .
 Please choose whether you want to create one now. This will then be a
 self-signed certificate.
 .
 If you choose not to create a certificate, please adapt Dovecot's
 configuration file (/etc/dovecot/conf.d/10-ssl.conf).
";
$elem["dovecot-core/create-ssl-cert"]["descriptionde"]="Ein selbstsigniertes SSL-Zertifikat erstellen?
 Um IMAP oder POP3 über SSL/TLS zu benutzen, wird ein SSL-Zertifikat benötigt. Es wurde kein derartiges Zertifikat gefunden.
 .
 Bitte wählen Sie, ob Sie nun eins erstellen möchten. Dies wird dann ein selbstsigniertes Zertifikat sein.
 .
 Falls Sie sich entscheiden, kein Zertifikat zu erstellen, passen Sie bitte die Konfigurationsdatei von Dovecot (/etc/dovecot/conf.d/10-ssl.conf) an.
";
$elem["dovecot-core/create-ssl-cert"]["descriptionfr"]="Faut-il créer un certificat SSL auto-signé ?
 Un certificat SSL est nécessaire pour utiliser les protocoles IMAP et POP3 avec SSL. Aucun certificat n'a été trouvé.
 .
 Veuillez choisir si vous souhaitez en créer un maintenant. Ce sera alors un certificat auto-signé.
 .
 Si vous choisissez de ne pas créer de certificat, veuillez modifier le fichier de configuration de Dovecot (/etc/dovecot/conf.d/10-ssl.conf).
";
$elem["dovecot-core/create-ssl-cert"]["default"]="true";
$elem["dovecot-core/ssl-cert-name"]["type"]="string";
$elem["dovecot-core/ssl-cert-name"]["description"]="Host name:
 Please enter the host name to use in the SSL certificate.
 .
 It will become the \"commonName\" field of the generated SSL certificate.
";
$elem["dovecot-core/ssl-cert-name"]["descriptionde"]="Rechnername:
 Bitte geben Sie den Rechnernamen ein, der im SSL-Zertifikat benutzt werden soll.
 .
 Er wird das Feld »commonName« des erzeugten SSL-Zertifikats werden.
";
$elem["dovecot-core/ssl-cert-name"]["descriptionfr"]="Nom d'hôte :
 Veuillez indiquer le nom d'hôte à utiliser dans le certificat SSL.
 .
 Il constituera le champ « commonName » du certificat SSL créé.
";
$elem["dovecot-core/ssl-cert-name"]["default"]="localhost";
PKG_OptionPageTail2($elem);
?>
