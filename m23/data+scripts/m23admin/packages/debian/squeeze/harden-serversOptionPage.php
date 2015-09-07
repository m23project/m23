<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("harden-servers");

$elem["harden-servers/plaintext"]["type"]="note";
$elem["harden-servers/plaintext"]["description"]="Plaintext passwords
 Services that use plaintext passwords are almost by definition insecure.
 The reason is that you cannot know if someone is sniffing your passwords.
 .
 In a local environment with no connection to the outside world this is of
 course not a big problem. On the other hand then you will not need to
 secure your system at all and should not need this package.
 .
 This package conflicts with a lot of server service components that depend
 on plaintext passwords. Some tools that use plaintext passwords are not
 conflicted because they can be configured not to use plaintext passwords.
 So installing this package will only help you with some of the most
 critical servers.
 .
 The advice is to look at each available service and investigate if it uses
 plaintext passwords. If it does, try to configure it so it starts using
 encryption or some password exchange algorithm that does not require
 plaintext passwords.
";
$elem["harden-servers/plaintext"]["descriptionde"]="Klartext-Passwörter
 Dienste, die Klartext-Passwörter benutzen, sind prinzipiell unsicher, weil jemand ohne Ihr Wissen Ihre Passwörter mitlesen kann.
 .
 In einer lokalen Umgebung ohne Verbindung zur Außenwelt ist das natürlich kein großes Problem. Andererseits brauchen Sie Ihr System in diesem Fall überhaupt nicht abzusichern und benötigen dieses Paket gar nicht.
 .
 Dieses Paket verhindert die Installation einer Reihe von Serverdienst-Komponenten, die nur Klartext-Passwörter verwenden. Einige Programme werden geduldet, weil sie so eingerichtet werden können, dass sie keine Klartext-Passwörter verwenden. Deshalb hilft Ihnen die Installation dieses Pakets nur bei einigen der kritischsten Serverkomponenten.
 .
 Sie sollten jeden verfügbaren Dienst kontrollieren und untersuchen, ob Klartext-Passwörter benutzt werden. Wenn das so ist, sollten Sie versuchen, ihn so einzurichten, dass Verschlüsselung oder ein Verfahren des Passwort-Austausches benutzt wird, das keine Klartext-Passwörter erfordert.
";
$elem["harden-servers/plaintext"]["descriptionfr"]="Mots de passe en clair
 Les services qui utilisent des mots de passe en clair sont par définition peu sécurisés. En effet, vous ne pouvez jamais savoir si quelqu'un n'est pas en train de capturer votre mot de passe.
 .
 Dans un environnement local sans connexion avec l'extérieur, ce n'est bien sûr pas un gros problème. Dans ce cas, toutefois, vous avez moins besoin de sécuriser votre système et vous n'avez donc pas besoin de ce paquet.
 .
 Ce paquet entre en conflit avec de nombreux serveurs qui dépendent d'un mot de passe en clair. Quelques outils utilisant des mots de passe en clair n'entrent pas en conflit avec ce paquet car ils peuvent être configurés pour ne pas utiliser de mots de passe en clair. Aussi, l'installation de ce paquet ne vous aidera que pour certains des serveurs les plus critiques.
 .
 Vous devriez vérifier chaque serveur disponible et rechercher pour chacun d'entre eux s'ils utilisent des mots de passe en clair. Si c'est le cas, essayez de les configurer pour qu'ils utilisent le chiffrement ou des mécanismes d'échange de mots de passe qui n'ont pas besoin de faire circuler des mots de passe en clair.
";
$elem["harden-servers/plaintext"]["default"]="";
$elem["harden-servers/inetd"]["type"]="note";
$elem["harden-servers/inetd"]["description"]="Default services and inetd
 By default some unnecessary services are enabled on your system. The
 program that provides them is inetd. There are alternatives to inetd
 which are more flexible. The problem is not that inetd in itself is
 insecure so you will probably not need to remove it. The problem is that
 you have to configure it to provide only the services that are really
 needed.
 .
 If you have the normal inetd program installed you should configure it by
 editing /etc/inetd.conf.
 .
 The general rule is to comment all lines that you do not need. If you do
 not know what it is, you probably do not need it. If you discover some
 problem you can always uncomment it later.
 .
 When you have edited that file, you have to restart the inet daemon with the
 following command: /etc/init.d/inetd restart
";
$elem["harden-servers/inetd"]["descriptionde"]="Standard-Dienste und Inetd
 Auf Ihrem System sind standardmäßig einige Dienste aktiviert, die unnötig sind. Das Programm Inetd stellt diese Dienste bereit. Es gibt Alternativen zu Inetd, die flexibler sind. Inetd selbst ist nicht unsicher, deshalb brauchen Sie es nicht entfernen. Sie müssen es aber so einrichten, dass nur die Dienste angeboten werden, die wirklich nötig sind.
 .
 Wenn bei Ihnen das normale Programm Inetd installiert ist, sollten Sie es durch Ändern der Datei /etc/inetd.conf einrichten.
 .
 Üblicherweise sollten Sie alle Zeilen auskommentieren, die Sie nicht brauchen. Wenn Sie nicht wissen, um welchen Dienst es sich handelt, brauchen Sie ihn wahrscheinlich auch nicht. Wenn Sie danach Probleme feststellen, können Sie die Dienste später wieder aktivieren.
 .
 Sobald Sie die Datei geändert haben, müssen Sie Inetd mit dem folgenden Befehl neu starten: /etc/init.d/inetd restart.
";
$elem["harden-servers/inetd"]["descriptionfr"]="Services par défaut et inetd
 Par défaut, des services qui ne sont pas indispensables sont activés sur votre système. Le programme qui les fournit est inetd. Il existe d'autres alternatives a inetd qui sont plus flexibles. Le problème n'est pas que inetd n'est pas sûr par lui-même, et vous n'aurez probablement pas besoin de le supprimer. Mais vous devriez le configurer pour fournir uniquement les services dont vous avez vraiment besoin.
 .
 Si vous avez le programme inetd standard, vous devriez le configurer en modifiant le fichier /etc/inetd.conf.
 .
 La règle générale est de commenter toutes les lignes dont vous n'avez pas besoin. Si vous ne savez pas à quoi une ligne correspond, vous n'en avez probablement pas besoin. Si vous découvrez des problèmes par la suite, vous pouvez toujours les décommenter.
 .
 Après avoir modifié ce fichier, vous devez redémarrer le démon inetd avec la commande : /etc/init.d/inetd restart.
";
$elem["harden-servers/inetd"]["default"]="";
$elem["harden-servers/vncserver"]["type"]="note";
$elem["harden-servers/vncserver"]["description"]="VNC server
 The VNC server in the Debian GNU/Linux distribution contains the tightvnc
 patches which in addition to adding compression make it possible to use
 ssh tunnelling. You do that from the client by adding the -via switch when
 connecting. To make sure that no plaintext passwords are transmitted over
 the network you have to add firewalling rules on the local machine that
 disallow direct connections to the VNC ports (see the manpage for exact
 numbers). Only connections from the local interface should be allowed, to
 make it possible to tunnel it using ssh.
";
$elem["harden-servers/vncserver"]["descriptionde"]="VNC-Server
 Der VNC-Server bei Debian GNU/Linux enthält die TightVNC-Patches, die es zusätzlich zur hinzugefügten Komprimierung möglich machen, SSL-Tunnel zu benutzen. Dieser Tunnel wird vom Client aufgebaut, indem der Schalter »-via« beim Verbindungsaufbau angegeben wird. Um sicher zu sein, dass keine Klartext-Passwörter über das Netzwerk übertragen werden, müssen Sie dem lokalen Rechner noch Firewall-Regeln hinzufügen, die direkte Verbindungen zu den VNC-Ports unterbinden (die genauen Portnummern stehen in der Handbuchseite). Nur Verbindungen von der lokalen Netzwerkschnittstelle sollten zugelassen werden, um den Tunnel mittels SSH zu nutzen.
";
$elem["harden-servers/vncserver"]["descriptionfr"]="Serveur VNC
 Le serveur VNC de la distribution Debian GNU/Linux contient les correctifs tightvnc qui, en plus d'ajouter la compression, rendent possible l'utilisation d'un tunnel SSH. Vous pouvez utiliser cette fonctionnalité avec le client en ajoutant l'option -via lors de la connexion. Pour être sûr de ne pas transmettre de mots de passe en clair sur le réseau, vous devriez ajouter des règles de pare-feu sur la machine locale qui empêchent une connexion directe aux ports VNC. Veuillez vous reporter à la page de manuel pour les numéros de ces ports. Seules les connexions depuis l'interface locale doivent être autorisées pour rendre possible l'utilisation d'un tunnel SSH.
";
$elem["harden-servers/vncserver"]["default"]="";
PKG_OptionPageTail2($elem);
?>
