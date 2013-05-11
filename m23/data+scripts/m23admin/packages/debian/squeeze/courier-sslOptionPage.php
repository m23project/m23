<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("courier-ssl");

$elem["courier-ssl/certnotice"]["type"]="note";
$elem["courier-ssl/certnotice"]["description"]="SSL certificate required
 POP and IMAP over SSL requires a valid, signed, X.509 certificate. During
 the installation of courier-pop-ssl or courier-imap-ssl, a self-signed
 X.509 certificate will be generated if necessary. 
 .
 For production use, the
 X.509 certificate must be signed by a recognized certificate authority, in
 order for mail clients to accept the certificate. The default location
 for this certificate is /etc/courier/pop3d.pem or
 /etc/courier/imapd.pem.
";
$elem["courier-ssl/certnotice"]["descriptionde"]="SSL-Zertifikat erforderlich
 Für POP und IMAP per SSL ist ein gültiges und signiertes X.509-Zertifikat erforderlich. Während der Installation von courier-pop-ssl bzw. courier-imap-ssl wird ein selbst signiertes X.509-Zertifikat erstellt, wenn nicht bereits ein Zertifikat vorhanden ist.
 .
 Für den Produktionsbetrieb muß das X.509-Zertifikat von einer anerkannten Zertifizierungsstelle signiert werden, damit das Zertifikat von Mailprogrammen akzeptiert wird. Das Zertifikat wird standardmäßig in /etc/courier/pop3d.pem bzw. /etc/courier/imapd.pem abgelegt.
";
$elem["courier-ssl/certnotice"]["descriptionfr"]="Certificat SSL requis
 L'utilisation des protocoles POP et IMAP avec SSL nécessite de posséder un certificat X.509 valide et signé. Lors de l'installation de courier-pop-ssl et courier-imap-ssl, un certificat X.509 autosigné sera généré si nécessaire.
 .
 Sur un site de production, le certificat X.509 doit être signé par une autorité de certification reconnue afin que les clients de courriel l'acceptent. Les emplacements par défaut de ces certificats sont respectivement /etc/courier/pop3d.pem et /etc/courier/imapd.pem.
";
$elem["courier-ssl/certnotice"]["default"]="";
PKG_OptionPageTail2($elem);
?>
