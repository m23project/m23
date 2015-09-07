<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("harden-clients");

$elem["harden-clients/plaintext"]["type"]="note";
$elem["harden-clients/plaintext"]["description"]="Plaintext passwords
 Services that use plaintext passwords are almost by definition insecure.
 The reason is that you cannot know if someone is sniffing your passwords.
 .
 In a local environment with no connection to the outside world this is of
 course not a big problem. On the other hand then you will not need to
 secure your system at all and should not need this package.
 .
 This package conflicts with a lot of client service components that depend
 on plaintext passwords. Some tools that use plaintext passwords are not
 conflicted because they can be configured not to use plaintext passwords.
 So installing this package will only help you with some of the most
 critical clients.
 .
 The advice is to look at each available client and investigate if it uses
 plaintext passwords. If it does, try to configure it so it starts using
 encryption or some password exchange algorithm that does not require
 plaintext passwords.
";
$elem["harden-clients/plaintext"]["descriptionde"]="Klartext-Passwörter
 Dienste, die Klartext-Passwörter benutzen, sind prinzipiell unsicher, weil jemand ohne Ihr Wissen Ihre Passwörter mitlesen kann.
 .
 In einer lokalen Umgebung ohne Verbindung zur Außenwelt ist das natürlich kein großes Problem. Andererseits brauchen Sie Ihr System in diesem Fall überhaupt nicht abzusichern und benötigen dieses Paket gar nicht.
 .
 Dieses Paket verhindert die Installation einer Reihe von Client-Programmen, die nur Klartext-Passwörter verwenden. Einige Programme, die Klartext-Passwörter verwenden, werden geduldet, weil sie so eingerichtet werden können, dass sie keine Klartext-Passwörter verwenden. Deshalb hilft Ihnen die Installation dieses Pakets nur bei einigen der bedenklichsten Clients.
 .
 Sie sollten jedes verfügbare Client-Programm kontrollieren und untersuchen, ob Klartext-Passwörter benutzt werden. Wenn das so ist, sollten Sie versuchen, ihn so einzurichten, dass Verschlüsselung oder ein Verfahren des Passwort-Austausches benutzt wird, das keine Klartext-Passwörter erfordert.
";
$elem["harden-clients/plaintext"]["descriptionfr"]="Mots de passe en clair
 Les services qui utilisent des mots de passe en clair sont par définition peu sécurisés. En effet, vous ne pouvez jamais savoir si quelqu'un n'est pas en train de capturer votre mot de passe.
 .
 Dans un environnement local sans connexion avec l'extérieur, ce n'est bien sûr pas un gros problème. Dans ce cas, toutefois, vous avez moins besoin de sécuriser votre système et vous n'avez donc pas besoin de ce paquet.
 .
 Ce paquet entre en conflit avec de nombreux clients qui dépendent de mots de passe en clair. Quelques outils utilisant des mots de passe en clair n'entrent pas en conflit avec ce paquet car il est possible de les configurer pour ne pas utiliser de mots de passe en clair. Aussi, l'installation de ce paquet ne vous aidera que pour certains des clients les plus critiques.
 .
 Vous devriez vérifier chaque client disponible et rechercher pour chacun d'entre eux s'ils utilisent des mots de passe en clair. Si c'est le cas, essayez de les configurer pour qu'ils utilisent le chiffrement ou des mécanismes d'échange de mots de passe qui n'ont pas besoin d'échanger des mots de passe en clair.
";
$elem["harden-clients/plaintext"]["default"]="";
PKG_OptionPageTail2($elem);
?>
