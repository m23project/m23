<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("spotweb");

$elem["spotweb/nntpserver"]["type"]="string";
$elem["spotweb/nntpserver"]["description"]="NNTP server:
 Please enter the news (NNTP) server that should be used for SpotWeb.
";
$elem["spotweb/nntpserver"]["descriptionde"]="NNTP-Server:
 Bitte geben Sie den Namen des Nachrichtenservers (NNTP) ein, der für SpotWeb genutzt werden soll.
";
$elem["spotweb/nntpserver"]["descriptionfr"]="Serveur NNTP :
 Veuillez indiquer le serveur de nouvelles (NNTP) à utiliser pour SpotWeb.
";
$elem["spotweb/nntpserver"]["default"]="news.ziggo.nl";
$elem["spotweb/nntpuser"]["type"]="string";
$elem["spotweb/nntpuser"]["description"]="NNTP server username:
 Please enter the username to use on the news server.
";
$elem["spotweb/nntpuser"]["descriptionde"]="NNTP-Server-Benutzername:
 Bitte geben Sie den Benutzernamen für den Nachrichtenserver ein.
";
$elem["spotweb/nntpuser"]["descriptionfr"]="Identifiant pour le serveur NNTP :
 Veuillez indiquer l'identifiant à utiliser sur le serveur de nouvelles.
";
$elem["spotweb/nntpuser"]["default"]="";
$elem["spotweb/nntppass"]["type"]="password";
$elem["spotweb/nntppass"]["description"]="NNTP server password:
 Please enter the password to use on the news server.
";
$elem["spotweb/nntppass"]["descriptionde"]="NNTP-Server-Passwort:
 Bitte geben Sie das Passwort für den Nachrichtenserver ein.
";
$elem["spotweb/nntppass"]["descriptionfr"]="Mot de passe pour le serveur NNTP :
 Veuillez indiquer le mot de passe à utiliser sur le serveur de nouvelles.
";
$elem["spotweb/nntppass"]["default"]="";
$elem["spotweb/nntpenc"]["type"]="select";
$elem["spotweb/nntpenc"]["choices"][1]="No encryption";
$elem["spotweb/nntpenc"]["choices"][2]="SSL";
$elem["spotweb/nntpenc"]["choicesde"][1]="Keine Verschlüsselung";
$elem["spotweb/nntpenc"]["choicesde"][2]="SSL";
$elem["spotweb/nntpenc"]["choicesfr"][1]="Aucun chiffrement";
$elem["spotweb/nntpenc"]["choicesfr"][2]="SSL";
$elem["spotweb/nntpenc"]["description"]="NNTP server encryption:
 Please choose the encryption type for communication with the
 news server.
";
$elem["spotweb/nntpenc"]["descriptionde"]="NNTP-Server-Verschlüsselung:
 Bitte wählen Sie die Verschlüsselungsart für die Kommunikation mit dem Nachrichtenserver.
";
$elem["spotweb/nntpenc"]["descriptionfr"]="Chiffrement à utiliser avec le serveur NNTP :
 Veuillez indiquer la méthode de chiffrement pour les communications avec le serveur de nouvelles.
";
$elem["spotweb/nntpenc"]["default"]="";
$elem["spotweb/nntpport"]["type"]="string";
$elem["spotweb/nntpport"]["description"]="NNTP server port:
 Please enter the port to use on the news server. Port 563 should generally
 be used when encryption is activated.
";
$elem["spotweb/nntpport"]["descriptionde"]="NNTP-Server-Port:
 Bitte geben Sie den Port ein, der auf dem Nachrichtenserver verwendet werden soll. Bei aktivierter Verschlüsselung sollte in der Regel Port 563 genutzt werden.
";
$elem["spotweb/nntpport"]["descriptionfr"]="Port du serveur NNTP :
 Veuillez indiquer le port à utiliser pour le serveur de nouvelles. Le port 563 est généralement utilisé quand le chiffrement est actif.
";
$elem["spotweb/nntpport"]["default"]="119";
$elem["spotweb/useheaderserver"]["type"]="boolean";
$elem["spotweb/useheaderserver"]["description"]="Use separate \"headers\" news server?
 Please choose this option if you use a separate news server to fetch headers.
";
$elem["spotweb/useheaderserver"]["descriptionde"]="Separaten »Schlagzeilen«-Nachrichtenserver benutzen?
 Bitte wählen Sie diese Option, wenn Sie die Schlagzeilen von einem separaten Nachrichtenserver abrufen wollen.
";
$elem["spotweb/useheaderserver"]["descriptionfr"]="Utiliser un serveur différent pour les en-têtes (« headers ») ?
 Veuillez sélectionner cette option en cas d'utilisation d'un serveur de nouvelles séparé pour récupérer les en-têtes.
";
$elem["spotweb/useheaderserver"]["default"]="false";
$elem["spotweb/headerserver"]["type"]="string";
$elem["spotweb/headerserver"]["description"]="NNTP \"headers\" server:
 Please enter the news server that should be used for headers fetching
 with SpotWeb.
";
$elem["spotweb/headerserver"]["descriptionde"]="NNTP-»Schlagzeilen«-Server:
 Bitte geben Sie den Nachrichtenserver an, der für den Schlagzeilenabruf mit SpotWeb genutzt werden soll.
";
$elem["spotweb/headerserver"]["descriptionfr"]="Serveur NNTP d'en-têtes :
 Veuillez indiquer le serveur de nouvelles qui sera utilisé pour la récupération des en-têtes avec SpotWeb.
";
$elem["spotweb/headerserver"]["default"]="";
$elem["spotweb/headeruser"]["type"]="string";
$elem["spotweb/headeruser"]["description"]="NNTP \"headers\" server username:
 Please enter the username to use on the \"headers\" news server.
";
$elem["spotweb/headeruser"]["descriptionde"]="NNTP-»Schlagzeilen«-Server-Benutzername:
 Bitte geben Sie den Benutzernamen für den »Schlagzeilen«-Nachrichtenserver ein.
";
$elem["spotweb/headeruser"]["descriptionfr"]="Identifiant sur le serveur NNTP d'en-têtes :
 Veuillez indiquer l'identifiant à utiliser sur le serveur d'en-têtes.
";
$elem["spotweb/headeruser"]["default"]="";
$elem["spotweb/headerpass"]["type"]="password";
$elem["spotweb/headerpass"]["description"]="NNTP \"headers\" server password:
 Please enter the password to use on the \"headers\" news server.
";
$elem["spotweb/headerpass"]["descriptionde"]="NNTP-»Schlagzeilen«-Server-Passwort:
 Bitte geben Sie das Passwort für den »Schlagzeilen«-Nachrichtenserver ein.
";
$elem["spotweb/headerpass"]["descriptionfr"]="Mot de passe pour le serveur NNTP d'en-têtes :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'en-têtes.
";
$elem["spotweb/headerpass"]["default"]="";
$elem["spotweb/headerenc"]["type"]="select";
$elem["spotweb/headerenc"]["choices"][1]="No encryption";
$elem["spotweb/headerenc"]["choices"][2]="SSL";
$elem["spotweb/headerenc"]["choicesde"][1]="Keine Verschlüsselung";
$elem["spotweb/headerenc"]["choicesde"][2]="SSL";
$elem["spotweb/headerenc"]["choicesfr"][1]="Aucun chiffrement";
$elem["spotweb/headerenc"]["choicesfr"][2]="SSL";
$elem["spotweb/headerenc"]["description"]="NNTP \"headers\" server encryption:
 Please choose the encryption type for communication with the
 \"headers\" news server.
";
$elem["spotweb/headerenc"]["descriptionde"]="NNTP-»Schlagzeilen«-Serververschlüsselung:
 Bitte wählen Sie die Verschlüsselungsart für die Kommmunikation mit dem »Schlagzeilen«-Nachrichtenserver.
";
$elem["spotweb/headerenc"]["descriptionfr"]="Chiffrement à utiliser sur le serveur NNTP d'en-têtes :
 Veuillez indiquer la méthode de chiffrement pour les communications avec le serveur d'en-têtes.
";
$elem["spotweb/headerenc"]["default"]="";
$elem["spotweb/headerport"]["type"]="string";
$elem["spotweb/headerport"]["description"]="NNTP \"headers\" server port:
 Please enter the port to use on the \"header\" news server. Port 563 should generally
 be used when encryption is activated.
";
$elem["spotweb/headerport"]["descriptionde"]="NNTP-»Schlagzeilen«-Server-Port:
 Bitte geben Sie den Port ein, der auf dem »Schlagzeilen«-Nachrichtenserver verwendet werden soll. Bei aktivierter Verschlüsselung sollte in der Regel Port 563 genutzt werden.
";
$elem["spotweb/headerport"]["descriptionfr"]="Port du serveur NNTP d'en-têtes :
 Veuillez indiquer le port à utiliser sur le serveur d'en-têtes. Le port 563 est généralement utilisé quand le chiffrement est actif.
";
$elem["spotweb/headerport"]["default"]="119";
$elem["spotweb/usepostserver"]["type"]="boolean";
$elem["spotweb/usepostserver"]["description"]="Use separate \"post\" (upload) news server?
 Please choose this option if you use a separate news server for posting
 spots.
";
$elem["spotweb/usepostserver"]["descriptionde"]="Separaten »Post«-Nachrichtenserver (für das Hochladen) verwenden?
 Bitte wählen Sie diese Option, wenn Sie für das Posten von Spots einen anderen Nachrichtenserver verwenden.
";
$elem["spotweb/usepostserver"]["descriptionfr"]="Utiliser un serveur de nouvelles d'envoi (« upload ») séparé ?
 Veuillez sélectionner cette option dans le cas de l'utilisation d'un serveur de nouvelles séparé pour envoyer des « spots ».
";
$elem["spotweb/usepostserver"]["default"]="false";
$elem["spotweb/postserver"]["type"]="string";
$elem["spotweb/postserver"]["description"]="NNTP \"post\" server:
 Please enter the news server that should be used for posting spots
 with SpotWeb.
";
$elem["spotweb/postserver"]["descriptionde"]="NNTP-»Post«-Server:
 Bitte geben Sie den Nachrichtenserver ein, der für das Posten von Spots mit SpotWeb genutzt werden soll.
";
$elem["spotweb/postserver"]["descriptionfr"]="Serveur NNTP d'envoi :
 Veuillez indiquer le serveur de nouvelles à utiliser pour envoyer des « spots » avec SpotWeb.
";
$elem["spotweb/postserver"]["default"]="";
$elem["spotweb/postuser"]["type"]="string";
$elem["spotweb/postuser"]["description"]="NNTP \"post\" server username:
 Please enter the username to use on the \"post\" news server.
";
$elem["spotweb/postuser"]["descriptionde"]="NNTP-»Post«-Server-Benutzername:
 Bitte geben Sie einen Benutzernamen für den »Post«-Server ein.
";
$elem["spotweb/postuser"]["descriptionfr"]="Identifiant sur le serveur NNTP d'envoi :
 Veuillez indiquer l'identifiant à utiliser sur le serveur de nouvelles d'envoi.
";
$elem["spotweb/postuser"]["default"]="";
$elem["spotweb/postpass"]["type"]="password";
$elem["spotweb/postpass"]["description"]="NNTP \"post\" server password:
 Please enter the password to use on the \"post\" news server.
";
$elem["spotweb/postpass"]["descriptionde"]="NNTP-»Post«-Serverpasswort:
 Bitte geben sie das Passwort für den »Post«-Nachrichtenserver ein.
";
$elem["spotweb/postpass"]["descriptionfr"]="Mot de passe sur le serveur NNTP d'envoi :
 Veuillez indiquer le mot de passe à utiliser sur le serveur de nouvelles d'envoi
";
$elem["spotweb/postpass"]["default"]="";
$elem["spotweb/postenc"]["type"]="select";
$elem["spotweb/postenc"]["choices"][1]="No encryption";
$elem["spotweb/postenc"]["choices"][2]="SSL";
$elem["spotweb/postenc"]["choicesde"][1]="Keine Verschlüsselung";
$elem["spotweb/postenc"]["choicesde"][2]="SSL";
$elem["spotweb/postenc"]["choicesfr"][1]="Aucun chiffrement";
$elem["spotweb/postenc"]["choicesfr"][2]="SSL";
$elem["spotweb/postenc"]["description"]="NNTP \"post\" server encryption:
 Please choose the encryption type for communication with the
 \"post\" news server.
";
$elem["spotweb/postenc"]["descriptionde"]="NNTP-»Post«-Serververschlüsselung:
 Bitte wählen Sie die Verschlüsselungsart für die Kommunikation mit dem »Post«-Nachrichtenserver.
";
$elem["spotweb/postenc"]["descriptionfr"]="Chiffrement à utiliser sur le serveur NNTP d'envoi :
 Veuillez indiquer la méthode de chiffrement pour les communications avec le serveur de nouvelles d'envoi.
";
$elem["spotweb/postenc"]["default"]="";
$elem["spotweb/postport"]["type"]="string";
$elem["spotweb/postport"]["description"]="NNTP \"post\" server port:
 Please enter the port to use on the \"post\" news server. Port 563 should generally
 be used when encryption is activated.
";
$elem["spotweb/postport"]["descriptionde"]="NNTP-»Post«-Server-Port:
 Bitte geben sie den Port ein, der auf dem »Post«-Nachrichtenserver verwendet werden soll. Bei aktivierter Verschlüsselung sollte in der Regel Port 563 genutzt werden.
";
$elem["spotweb/postport"]["descriptionfr"]="Port du serveur NNTP d'envoi :
 Veuillez indiquer le port à utiliser sur le serveur de nouvelles d'envoi. Le port 563 est généralement utilisé quand le chiffrement est actif.
";
$elem["spotweb/postport"]["default"]="119";
PKG_OptionPageTail2($elem);
?>
