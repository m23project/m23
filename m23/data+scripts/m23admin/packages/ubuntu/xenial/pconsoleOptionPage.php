<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pconsole");

$elem["pconsole/setuid"]["type"]="boolean";
$elem["pconsole/setuid"]["description"]="Do you want /usr/bin/pconsole to be installed SUID root?
 You are strongly encouraged to leave pconsole without the SUID bit on.
 .
 If you are using a multiuser system, setting the SUID bit on pconsole will
 be a major risk for a breach, since normal users will be able to attach
 their consoles to a root PTY/TTY and send commands as root.
 .
 However, on a single-user system, setting the SUID bit might be a good
 idea to avoid logging as root user.
 .
 If in doubt, you should install it without SUID. If it causes problems
 you can change your mind later by running: dpkg-reconfigure pconsole
";
$elem["pconsole/setuid"]["descriptionde"]="Soll /usr/bin/pconsole SUID-Root installiert werden?
 Es wird nachdrücklich empfohlen, dass Sie Pconsole ohne aktiviertes SUID-Bit lassen.
 .
 Falls Sie ein Mehrbenutzer-System verwenden, wird das Setzen des SUID-Bits für Pconsole ein großes Risiko für einen Sicherheitsbruch sein, da normale Benutzer in der Lage sein werden, ihre Konsolen an ein Root-PTY/TTY anzuhängen und Befehle als Root abzusetzen.
 .
 Allerdings mag auf einem Einzelbenutzersystem es eine gute Idee sein, das SUID-Bit zu setzen, um eine Anmeldung als Root-Benutzer zu vermeiden.
 .
 Falls Sie in Zweifel sind, sollten Sie ohne SUID installieren. Falls es zu Problemen führt, können Sie später Ihre Meinung ändern, indem Sie »dpkg-reconfigure pconsole« ausführen.
";
$elem["pconsole/setuid"]["descriptionfr"]="Souhaitez-vous installer /usr/bin/pconsole « SUID root » ?
 Il est fortement recommandé de laisser pconsole avec le bit SUID désactivé.
 .
 Si vous travaillez sur un système multi-utilisateurs, l'exécution de pconsole avec les droits du super-utilisateur (« SUID root ») constitue un risque majeur, puisque des utilisateurs non privilégiés seront capables d'attacher leur console à un terminal PTY/TTY du super-utilisateur et d'y envoyer des commandes sous son identité.
 .
 Cependant, sur un système mono-utilisateur, la mise en place du bit SUID peut être une bonne idée afin d'éviter de se connecter en tant que super-utilisateur.
 .
 Dans le doute, vous devriez l'installer sans le bit SUID. Si cela causait des problèmes, vous pourrez changer d'avis ultérieurement en exécutant « dpkg-reconfigure pconsole ».
";
$elem["pconsole/setuid"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
