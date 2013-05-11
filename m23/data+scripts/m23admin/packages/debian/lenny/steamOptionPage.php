<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("steam");

$elem["steam/reconfigure-ports"]["type"]="select";
$elem["steam/reconfigure-ports"]["choices"][1]="standard";
$elem["steam/reconfigure-ports"]["choices"][2]="alternative";
$elem["steam/reconfigure-ports"]["choicesde"][1]="Standard";
$elem["steam/reconfigure-ports"]["choicesde"][2]="Alternativ";
$elem["steam/reconfigure-ports"]["choicesfr"][1]="Standard";
$elem["steam/reconfigure-ports"]["choicesfr"][2]="Alternative";
$elem["steam/reconfigure-ports"]["description"]="Ports configuration type:
 sTeam provides access through different protocols using their standard
 ports. sTeam will run into troubles if a different daemon (http, news, mail, jabber,
 etc) already uses one of those standard ports.
 .
 You can choose to run sTeam either on the standard ports or on totally
 alternative ports, which prevents problems with other daemons, or you can
 configure sTeam manually.
";
$elem["steam/reconfigure-ports"]["descriptionde"]="Port Konfigurations Art:
 sTeam bietet Zugang zum System über unterschiedliche Protokolle. Dabei werden die üblichen Ports (HTTP, NEWS, Jabber, etc) benutzt. Sollten diese bereits von einem anderen Programm benutzt werden, so kann sTeam auf diese Art nicht benutzt werden.
 .
 Sie können sTeam entweder auf den üblichen Standard-Ports oder auf komplett unterschiedlichen Ports laufen lassen. Letzteres verhindert Probleme mit anderen bereits laufenden Diensten. Weiterhin können die Ports auch komplett eigenhändig eingestellt werden.
";
$elem["steam/reconfigure-ports"]["descriptionfr"]="Type de configuration des ports :
 sTeam fournit un accès à différents protocoles en utilisant leurs ports standards. Cela peut provoquer des difficultés si sTeam essaie d'utiliser ces ports standards alors qu'un autre démon (tel que http, news, mail, jabber, etc.) l'utilise.
 .
 Vous pouvez choisir d'utiliser sTeam avec ces ports standards (option « Standard »), d'utiliser des ports complètement différents pour éviter des problèmes avec un autre démon (option « Alternative ») ou configurer sTeam vous-même (option « Manuelle »).
";
$elem["steam/reconfigure-ports"]["default"]="alternative";
$elem["steam/mail-port"]["type"]="string";
$elem["steam/mail-port"]["description"]="Port of the SMTP service:
 The SMTP service defaults to 25. It is very likely that you already run
 another SMTP daemon, which conflicts with sTeam. Please only use port 25
 here if you are sure you don't have any other SMTP service running.
";
$elem["steam/mail-port"]["descriptionde"]="Port des eMail (SMTP) Dienstes:
 Der eMail (SMTP) Dienst nutzt standardmäßig Port 25. Es ist sehr wahrscheinlich, dass bereits ein solcher Dienst läuft und mit sTeam in Konflikt gerät. Bitte nur dann Port 25 nutzen, wenn ganz sicher ist, dass kein SMTP Dienst läuft.
";
$elem["steam/mail-port"]["descriptionfr"]="Port utilisé par le service SMTP :
 Le service SMTP utilise par défaut le port 25. Un autre démon SMTP utilise probablement ce port et entrera alors en conflit avec sTeam. Veuillez n'utiliser ici le port 25 que si vous êtes certain de ne pas avoir d'autre service SMTP actif.
";
$elem["steam/mail-port"]["default"]="30025";
$elem["steam/mail-smarthost"]["type"]="string";
$elem["steam/mail-smarthost"]["description"]="Smarthost used to deliver emails:
 sTeam is not capable to deliver emails all by itself and needs a smarthost
 if outgoing emails are allowed.
";
$elem["steam/mail-smarthost"]["descriptionde"]="Smarthost (Relay) zum Versenden von eMails:
 sTeam kann von sich aus keine eMails an andere Server versenden und braucht einen Smarthost (Relay) falls ausgehende eMails erlaubt sind.
";
$elem["steam/mail-smarthost"]["descriptionfr"]="Nom d'hôte du « smarthost » pour la distribution du courriel :
 sTeam ne peut pas distribuer le courrier par lui-même, il a besoin d'un « smarthost » pour le faire si le courrier sortant est autorisé.
";
$elem["steam/mail-smarthost"]["default"]="localhost";
$elem["steam/nntp-port"]["type"]="string";
$elem["steam/nntp-port"]["description"]="Port of the NEWS service:
 sTeam offers internal boards for discussion. They can be accessed using a
 newsreader (eg.: trn, knode, pan, etc).
 .
 The service runs on port 119 by default and you should only change this,
 if you are sure another NEWS server is running on this computer.
";
$elem["steam/nntp-port"]["descriptionde"]="Port des Usenet (NEWS) Dienstes:
 sTeam bietet interne Diskussionsforen. Auf diese kann mit einem Newsreader (z.B.: trn, knode, pan, thunderbird, etc) zugegriffen werden.
 .
 Dieser Dienst läuft standardmäßig auf Port 119. Dies sollte nur verändert werden, falls sicher ist, dass bereits ein NEWS Dienst (z.B.: inn, leafnode, etc) läuft.
";
$elem["steam/nntp-port"]["descriptionfr"]="Port utilisé par le service de nouvelles (« NEWS ») :
 sTeam offre des espaces (« boards ») de discussion internes. L'accès à ces espaces se fait par l'intermédiaire d'un lecteur de nouvelles (« newsreader »), par exemple trn, knode, pan, etc.
 .
 Ce service utilise par défaut le port 119 et vous ne devriez le modifier que si un autre serveur de nouvelles est actif sur cet ordinateur.
";
$elem["steam/nntp-port"]["default"]="119";
$elem["steam/pop3-port"]["type"]="string";
$elem["steam/pop3-port"]["description"]="Port of the POP3 service:
 sTeam offers access to work rooms using POP3. This means users can access
 work rooms using their email client.
 .
 The service runs on port 110 by default and you should only change this,
 if you are sure another pop3 server is running on this computer.
";
$elem["steam/pop3-port"]["descriptionde"]="Port des POP3 Dienstes:
 sTeam bietet Zugriff auf Arbeitsräume über den POP3 Dienst. Dies heißt, dass Benutzer mit ihrem eMail Programm darauf zugreifen können.
 .
 Der POP3 Dienst läuft standardmäßig auf Port 110 und sollte nur verändert werden, wenn sicher ist, dass bereits ein anderer POP3 Dienst auf dem Computer läuft.
";
$elem["steam/pop3-port"]["descriptionfr"]="Port utilisé par le service POP3 :
 sTeam autorise l'accès à des salons de travail en utilisant POP3. Ceci signifie que les utilisateurs peuvent accéder aux salons de travail en utilisant leur client de messagerie.
 .
 Ce service utilise par défaut le port 110 et vous ne devriez le modifier que si un autre serveur POP3 est actif sur cet ordinateur.
";
$elem["steam/pop3-port"]["default"]="110";
$elem["steam/imap-port"]["type"]="string";
$elem["steam/imap-port"]["description"]="Port of the IMAP service:
 sTeam offers access to work rooms using IMAP. This means users can access
 work rooms using their email client.
 .
 The service runs on port 143 by default and you should only change this,
 if you are sure another IMAP server is running on this computer.
";
$elem["steam/imap-port"]["descriptionde"]="Port des IMAP Dienstes:
 sTeam bietet Zugriff auf Arbeitsräume über den IMAP Dienst. Dies heißt, dass Benutzer mit ihrem eMail Programm darauf zugreifen können.
 .
 Der IMAP Dienst läuft standardmäßig auf Port 143 und sollte nur verändert werden, wenn sicher ist, dass bereits ein anderer IMAP Dienst auf dem Computer läuft.
";
$elem["steam/imap-port"]["descriptionfr"]="Port utilisé par les service IMAP :
 sTeam permet l'accès à des salons de discussion en utilisant le protocole IMAP. Ceci signifie que les utilisateurs peuvent avoir accès aux salons de travail en utilisant leur client de messagerie.
 .
 Ce service utilise par défaut le port 443 et vous ne devriez le modifier que si un autre serveur IMAP est actif sur cet ordinateur.
";
$elem["steam/imap-port"]["default"]="143";
$elem["steam/irc-port"]["type"]="string";
$elem["steam/irc-port"]["description"]="Port the IRC service:
 The chat rooms of sTeam can be accessed using a IRC client.
 .
 The service runs on port 6667 by default and you should only change this,
 if you are sure another IRC server is running on this computer.
";
$elem["steam/irc-port"]["descriptionde"]="Port des IRC Dienstes:
 Auf die Chat Räume von sTeam kann mittels eines IRC Klienten zugegriffen werden.
 .
 Der IRC Dienst läuft standardmäßig auf Port 6667 und sollte nur verändert werden, wenn sicher ist, dass bereits ein anderer IRC Dienst auf dem Computer läuft.
";
$elem["steam/irc-port"]["descriptionfr"]="Port utilisé par le service IRC :
 Les salons de discussion de sTeam peuvent être utilisés avec un client IRC.
 .
 Ce service utilise par défaut le port 6667 et vous ne devriez le modifier que si un autre serveur IRC est actif sur cet ordinateur.
";
$elem["steam/irc-port"]["default"]="6667";
$elem["steam/jabber-port"]["type"]="string";
$elem["steam/jabber-port"]["description"]="Port of the Jabber service:
 The chat rooms of sTeam can be accessed using a Jabber client.
 .
 The service runs on port 5222 by default and you should only change this,
 if you are sure another Jabber server is running on this computer.
";
$elem["steam/jabber-port"]["descriptionde"]="Port des Jabber Dienstes:
 Auf die Chat Räume von sTeam kann mittels eines Jabber Klienten zugegriffen werden.
 .
 Der Jabber Dienst läuft standardmäßig auf Port 5222 und sollte nur verändert werden, wenn sicher ist, dass bereits ein anderer Jabber Dienst auf dem Computer läuft.
";
$elem["steam/jabber-port"]["descriptionfr"]="Port utilisé par le service Jabber :
 Les salons de discussion de sTeam peuvent être utilisés avec un client Jabber.
 .
 Ce service utilise par défaut le port 5222 et vous ne devriez le modifier que si vous êtes certain qu'un autre serveur Jabber est actif sur cet ordinateur.
";
$elem["steam/jabber-port"]["default"]="5222";
$elem["steam/ftp-port"]["type"]="string";
$elem["steam/ftp-port"]["description"]="Port of the FTP service:
 sTeam offers access to files using FTP (file transfer protocol). A normal
 FTP client can be used.
 .
 The service runs on port 21 by default and you should only change this, if
 you are sure another FTP server is running on this computer.
";
$elem["steam/ftp-port"]["descriptionde"]="Port des FTP Dienstes:
 sTeam bietet Zugriff auf Dateien über das FTP Protokoll. Ein üblicher FTP Klient (ncftp, lftp, kbear, nautilus, konqueror, etc) kann benutzt werden.
 .
 Der FTP Dienst läuft standardmäßig auf Port 21 und sollte nur verändert werden, wenn sicher ist, dass bereits ein anderer FTP Dienst auf dem Computer läuft.
";
$elem["steam/ftp-port"]["descriptionfr"]="Port utilisé par le service FTP :
 sTeam permet l'accès aux fichiers en utilisant le protocole FTP (« File transfer protocol » : protocole de transfert de fichiers). L'accès se fait avec un client FTP ordinaire.
 .
 Le service utilise par défaut le port 21 et vous ne devriez le modifier que si un autre serveur FTP est actif sur cet ordinateur.
";
$elem["steam/ftp-port"]["default"]="21";
$elem["steam/http-port"]["type"]="string";
$elem["steam/http-port"]["description"]="Port of the web service:
 The service may be accessed using a web browser. For this to work you need
 to install the web package into the server. Please read README.Debian for
 further information.
 .
 The service runs on port 80 by default and you should only change this, if
 you are sure another web server is running on this computer.
";
$elem["steam/http-port"]["descriptionde"]="Port des Web Dienstes:
 sTeam bietet eine Web Oberfläche, welche mit einem normalen Web Browser (z.B.: Konqueror, Mozilla, Firefox, etc) benutzt werden kann. Damit dieser Dienst funktioniert muss vorher ein zusätzliches Web Paket installiert werden. Für weitere Informationen lesen sie bitte die README.Debian.
 .
 Der Web Dienst läuft standardmäßig auf Port 80 und sollte nur verändert werden, wenn sicher ist, dass bereits ein anderer Web Dienst auf dem Computer läuft.
";
$elem["steam/http-port"]["descriptionfr"]="Port utilisé par le service Web :
 Les services de sTeam sont également accessibles avec un navigateur Web. Pour cela, le paquet web doit être installé sur le serveur. Veuillez consulter le fichier README.Debian pour davantage d'informations.
 .
 Ce service utilise par défaut le port 80 et vous ne devriez le modifier que si un autre serveur Web est actif sur cet ordinateur.
";
$elem["steam/http-port"]["default"]="80";
$elem["steam/https-port"]["type"]="string";
$elem["steam/https-port"]["description"]="Port of the secure web service:
 The service may be accessed securely using a web browser. For this to work
 you need to install the web package into the server. Please read
 README.Debian for further  information.
 .
 The service runs on port 443 by default and you should only change this,
 if you are sure another HTTPS server is running on this computer.
";
$elem["steam/https-port"]["descriptionde"]="Port des sicheren Web Dienstes:
 sTeam bietet eine Web Oberfläche über eine sichere Verbindung, welche mit einem normalen Web Browser (z.B.: Konqueror, Mozilla, Firefox, etc) benutzt werden kann. Damit dieser Dienst funktioniert muss vorher ein zusätzliches Web Paket installiert werden. Für weitere Informationen lesen sie bitte die README.Debian.
 .
 Der sichere Web Dienst läuft standardmäßig auf Port 443 und sollte nur verändert werden, wenn sicher ist, dass bereits ein anderer sicherer Web Dienst auf dem Computer läuft.
";
$elem["steam/https-port"]["descriptionfr"]="Port utilisé par le service Web sécurisé :
 Les services de sTeam sont également accessibles en mode sécurisé avec un navigateur Web. Pour cela, le paquet web doit être installé sur le serveur. Veuillez consulter le fichier README.Debian pour davantage d'informations.
 .
 Ce service utilise par défaut le port 443 et vous ne devriez le modifier que si un autre service HTTPS est actif sur cet ordinateur.
";
$elem["steam/https-port"]["default"]="443";
PKG_OptionPageTail2($elem);
?>
