<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");
include ("/m23/inc/message.php");
include ("/m23/inc/html.php");
include ("/m23/inc/helper.php");

$layout = PKG_OptionPageHeader("Zarafa");

$i = 0;

$layout[$i]['type'] = 'title';
$layout[$i]['text'] = "Allgemeine Einstellungen";
$i++;

$layout[$i]['type'] = 'selection';
$layout[$i]['text'] = "Sprache";
$layout[$i]['name'] = "lang";
$layout[$i]['option0'] = "de_DE.UTF-8";
$layout[$i]['option1'] = "en_US.UTF-8";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "Geschätzte Benutzeranzahl<br>(benötigt für Cachegrößenoptimierungen)";
$layout[$i]['name'] = "estimatedUserAmount";
$layout['allvalues']['estimatedUserAmount'] = 50;
$layout[$i]['size'] = 2;
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "MySQL-Paßwort für root";
$layout[$i]['name'] = "mySQLRootPW";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "MySQL-Paßwort für den Zarafa-Benutzer";
$layout[$i]['name'] = "mySQLZarafaPW";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "Paßwort für den Server-Schlüssel<br>(Wird zum <b>Generieren</b> eines neuen<br>Server-Zertifikates und zum <b>Öffnen</b><br>des privaten Server-Schlüssels im<br> Zarafa-Server verwendet)";
$layout[$i]['name'] = "serverPEMPW";
$i++;

$layout[$i]['type'] = 'selection';
$layout[$i]['text'] = "user_plugin";
$layout[$i]['name'] = "user_plugin";
$layout[$i]['option0'] = "db";
$layout[$i]['option1'] = "unix";
$layout[$i]['option2'] = "ldap";
$i++;

$layout[$i]['type'] = 'selection';
$layout[$i]['text'] = "attachment_storage";
$layout[$i]['name'] = "attachment_storage";
$layout[$i]['option0'] = "database";
$layout[$i]['option1'] = "files";
$i++;





$layout[$i]['type'] = 'title';
$layout[$i]['text'] = "Dagent";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "spam_header_value";
$layout[$i]['name'] = "spam_header_value";
$layout['allvalues']['spam_header_value'] = 'Yes,';
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "spam_header_name";
$layout[$i]['name'] = "spam_header_name";
$layout['allvalues']['spam_header_name'] = 'X-Spam-Status';
$i++;





$layout[$i]['type'] = 'title';
$layout[$i]['text'] = "Zarafa-Admin-Benutzer";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "Login";
$layout[$i]['name'] = "zarafaAdmin_login";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "eMail";
$layout[$i]['name'] = "zarafaAdmin_email";
$layout['allvalues']['zarafaAdmin_email'] = 'zadmin@localhost';
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "Paßwort";
$layout[$i]['name'] = "zarafaAdmin_pass";
$i++;





$layout[$i]['type'] = 'title';
$layout[$i]['text'] = "Zarafa-Spooler";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "SMTP-Host (IP oder FQDN)";
$layout[$i]['name'] = "smtp_host";
$i++;

$layout[$i]['type'] = 'selection';
$layout[$i]['text'] = "always_send_delegates";
$layout[$i]['name'] = "always_send_delegates";
$layout[$i]['option0'] = "no";
$layout[$i]['option1'] = "yes";
$i++;

$layout[$i]['type'] = 'selection';
$layout[$i]['text'] = "allow_redirect_spoofing";
$layout[$i]['name'] = "allow_redirect_spoofing";
$layout[$i]['option0'] = "yes";
$layout[$i]['option1'] = "no";
$i++;

$layout[$i]['type'] = 'selection';
$layout[$i]['text'] = "copy_delegate_mails";
$layout[$i]['name'] = "copy_delegate_mails";
$layout[$i]['option0'] = "yes";
$layout[$i]['option1'] = "no";
$i++;

$layout[$i]['type'] = 'selection';
$layout[$i]['text'] = "allow_delegate_meeting_request";
$layout[$i]['name'] = "allow_delegate_meeting_request";
$layout[$i]['option0'] = "yes";
$layout[$i]['option1'] = "no";
$i++;

$layout[$i]['type'] = 'selection';
$layout[$i]['text'] = "always_send_tnef";
$layout[$i]['name'] = "always_send_tnef";
$layout[$i]['option0'] = "no";
$layout[$i]['option1'] = "yes";
$i++;





$layout[$i]['type'] = 'title';
$layout[$i]['text'] = "SSL-Zertifikate";
$i++;

$layout[$i]['type'] = 'infobox';
$layout[$i]['text'] = "Die nötigen SSL-Zertifikate können im den folgenden Dialogen eigegeben bzw. als selbsterstellte und selbstsignierte Zertifikate erstellt werden.";
$i++;

$layout[$i]['type'] = 'selection';
$layout[$i]['text'] = "Zertifikatquelle";
$layout[$i]['name'] = "SSLCertSource";
$layout[$i]['option0'] = "einfügen";
$layout[$i]['option1'] = "erstellen";
$i++;





$layout[$i]['type'] = 'title';
$layout[$i]['text'] = "cacert.pem und server.pem";
$i++;

$layout[$i]['type'] = 'infobox';
$layout[$i]['text'] = "Ein fertiges Server-Zertifikat kann (im PEM-Format) im Kasten \"cacert.pem\" eingefügt werden. \"server.pem\" enthält den privaten Schlüssel des Servers (RSA PRIVATE KEY) und direkt dahinter das von cacert.pem signierte Server-Zertifikat.";
$i++;

$layout[$i]['type'] = 'textarea';
$layout[$i]['text'] = "cacert.pem";
$layout[$i]['name'] = "cacertPEM";
$layout[$i]['cols'] = 64;
$layout[$i]['rows'] = 10;
$i++;

$layout[$i]['type'] = 'textarea';
$layout[$i]['text'] = "server.pem";
$layout[$i]['name'] = "serverPEM";
$layout[$i]['cols'] = 64;
$layout[$i]['rows'] = 10;
$i++;





$layout[$i]['type'] = 'title';
$layout[$i]['text'] = "CA-Zertifikat-Details";
$i++;

$layout[$i]['type'] = 'infobox';
$layout[$i]['text'] = "Informationen für die selbsterstellte Zertifizierungsstelle (CA). Alle Felder müssen ausgefüllt werden!";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "Country name (z.B. DE)";
$layout[$i]['name'] = "CAcountryName";
$layout[$i]['size'] = 2;
$layout[$i]['maxlength'] = 2;
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "State or province name";
$layout[$i]['name'] = "CAstateOrProvinceName";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "Locality name";
$layout[$i]['name'] = "CAlocalityName";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "Organization name";
$layout[$i]['name'] = "CAorganizationName";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "Organizational unit name";
$layout[$i]['name'] = "CAorganizationalUnitName";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "Common name";
$layout[$i]['name'] = "CAcommonName";
$layout['allvalues']['CAcommonName'] = $_GET['client'];
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "Email address";
$layout[$i]['name'] = "CAemailAddress";
$i++;





$layout[$i]['type'] = 'title';
$layout[$i]['text'] = "Server-Zertifikat-Details";
$i++;

$layout[$i]['type'] = 'infobox';
$layout[$i]['text'] = "Informationen für das selbsterstellte Serverzertifikat, das durch die eigene oben angelegte Zertifizierungsstelle (CA) signiert wird. Alle Felder müssen ausgefüllt werden!";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "Country name (z.B. DE)";
$layout[$i]['name'] = "ServercountryName";
$layout[$i]['size'] = 2;
$layout[$i]['maxlength'] = 2;
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "State or province name";
$layout[$i]['name'] = "ServerstateOrProvinceName";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "Locality name";
$layout[$i]['name'] = "ServerlocalityName";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "Organization name";
$layout[$i]['name'] = "ServerorganizationName";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "Organizational unit name";
$layout[$i]['name'] = "ServerorganizationalUnitName";
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "Common name (Zarafa-Server FQDN)";
$layout[$i]['name'] = "ServercommonName";
$layout['allvalues']['ServercommonName'] = $_GET['client'];
$i++;

$layout[$i]['type'] = 'inputline';
$layout[$i]['text'] = "Email address";
$layout[$i]['name'] = "ServeremailAddress";
$i++;

PKG_OptionPageTail($layout);

$layout

?>
