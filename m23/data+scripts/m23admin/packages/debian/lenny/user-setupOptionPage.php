<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("user-setup");

$elem["passwd/root-password-crypted"]["type"]="password";
$elem["passwd/root-password-crypted"]["description"]="for internal use only

";
$elem["passwd/root-password-crypted"]["descriptionde"]="";
$elem["passwd/root-password-crypted"]["descriptionfr"]="";
$elem["passwd/root-password-crypted"]["default"]="";
$elem["passwd/user-password-crypted"]["type"]="password";
$elem["passwd/user-password-crypted"]["description"]="for internal use only

";
$elem["passwd/user-password-crypted"]["descriptionde"]="";
$elem["passwd/user-password-crypted"]["descriptionfr"]="";
$elem["passwd/user-password-crypted"]["default"]="";
$elem["passwd/user-uid"]["type"]="string";
$elem["passwd/user-uid"]["description"]="for internal use only

";
$elem["passwd/user-uid"]["descriptionde"]="";
$elem["passwd/user-uid"]["descriptionfr"]="";
$elem["passwd/user-uid"]["default"]="";
$elem["passwd/user-default-groups"]["type"]="string";
$elem["passwd/user-default-groups"]["description"]="for internal use only

";
$elem["passwd/user-default-groups"]["descriptionde"]="";
$elem["passwd/user-default-groups"]["descriptionfr"]="";
$elem["passwd/user-default-groups"]["default"]="audio cdrom dialout floppy video plugdev netdev powerdev";
$elem["passwd/root-login"]["type"]="boolean";
$elem["passwd/root-login"]["description"]="Allow login as root?
 If you choose not to allow root to log in, then a user account will be
 created and given the power to become root using the 'sudo' command.
";
$elem["passwd/root-login"]["descriptionde"]="root das Anmelden erlauben?
 Wenn Sie auswählen, dass root das Anmelden verwehrt werden soll, wird ein Benutzerkonto angelegt und mit dem Recht versehen, root mittels des »sudo«-Kommandos zu werden.
";
$elem["passwd/root-login"]["descriptionfr"]="Faut-il autoriser les connexions du superutilisateur ?
 Si vous choisissez de désactiver les connexions du superutilisateur (« root »), le premier compte qui sera créé pourra obtenir les privilèges du superutilisateur avec la commande « sudo ».
";
$elem["passwd/root-login"]["default"]="true";
$elem["passwd/root-password"]["type"]="password";
$elem["passwd/root-password"]["description"]="Root password:
 You need to set a password for 'root', the system administrative
 account. A malicious or unqualified user with root access can have
 disastrous results, so you should take care to choose a root password
 that is not easy to guess. It should not be a word found in dictionaries,
 or a word that could be easily associated with you.
 .
 A good password will contain a mixture of letters, numbers and punctuation
 and should be changed at regular intervals.
 .
 Note that you will not be able to see the password as you type it.
";
$elem["passwd/root-password"]["descriptionde"]="Root-Passwort:
 Sie müssen ein Passwort für »root«, das systemverwaltende Konto, angeben. Ein bösartiger Benutzer oder jemand, der sich nicht auskennt und Root-Rechte besitzt, kann verheerende Schäden anrichten. Deswegen sollten Sie darauf achten, ein Passwort zu wählen, das nicht einfach zu erraten ist. Es sollte nicht in einem Wörterbuch vorkommen oder leicht mit Ihnen in Verbindung gebracht werden können.
 .
 Ein gutes Passwort enthält eine Mixtur aus Buchstaben, Zahlen und Sonderzeichen und wird in regelmäßigen Abständen geändert.
 .
 Hinweis: Sie werden das Passwort während der Eingabe nicht sehen.
";
$elem["passwd/root-password"]["descriptionfr"]="Mot de passe du superutilisateur (« root ») :
 Vous devez choisir un mot de passe pour le superutilisateur, le compte d'administration du système. Un utilisateur malintentionné ou peu expérimenté qui aurait accès à ce compte peut provoquer des désastres. En conséquence, ce mot de passe ne doit pas être facile à deviner, ni correspondre à un mot d'un dictionnaire ou vous être facilement associé.
 .
 Un bon mot de passe est composé de lettres, chiffres et signes de ponctuation. Il devra en outre être changé régulièrement.
 .
 Par sécurité, rien n'est affiché pendant la saisie.
";
$elem["passwd/root-password"]["default"]="";
$elem["passwd/root-password-again"]["type"]="password";
$elem["passwd/root-password-again"]["description"]="Re-enter password to verify:
 Please enter the same root password again to verify that you have typed it
 correctly.
";
$elem["passwd/root-password-again"]["descriptionde"]="Bitte geben Sie das Passwort nochmals zur Bestätigung ein:
 Bitte geben Sie das selbe root-Passwort nochmal ein, um sicher zu gehen, dass Sie es richtig eingegeben haben.
";
$elem["passwd/root-password-again"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez entrer à nouveau le mot de passe du superutilisateur afin de vérifier qu'il a été saisi correctement.
";
$elem["passwd/root-password-again"]["default"]="";
$elem["passwd/make-user"]["type"]="boolean";
$elem["passwd/make-user"]["description"]="Create a normal user account now?
 It's a bad idea to use the root account for normal day-to-day activities,
 such as the reading of electronic mail, because even a small mistake can
 result in disaster. You should create a normal user account to use for
 those day-to-day tasks.
 .
 Note that you may create it later (as well as any additional account) by
 typing 'adduser <username>' as root, where <username> is an username,
 like 'imurdock' or 'rms'.
";
$elem["passwd/make-user"]["descriptionde"]="Soll jetzt ein normales Benutzerkonto erstellt werden?
 Es ist keine gute Idee, das root-Konto für die alltägliche Arbeit einzusetzen, wie z.B. Lesen der E-Mails, denn selbst ein kleiner Fehler kann in einer Katastrophe enden. Sie sollten nun ein normales Benutzerkonto erstellen.
 .
 Beachten Sie, dass Sie das Benutzerkonto auch später durch Eingabe von »adduser <Benutzername>« als root (genauso wie weitere Benutzerkonten) erstellen können, wobei <Benutzername> ein Benutzername ist, wie z.B. »imurdock« oder »rms«.
";
$elem["passwd/make-user"]["descriptionfr"]="Faut-il créer un compte d'utilisateur ordinaire maintenant ?
 Il est préférable d'éviter de se servir du compte du superutilisateur (« root ») lors de l'utilisation normale du système, par exemple la lecture du courrier. En effet, même une petite erreur pourrait alors avoir des conséquences catastrophiques.
 .
 Veuillez noter que vous pourrez le créer plus tard (de même que tout autre compte supplémentaire) en utilisant la commande « adduser <utilisateur> » en tant que « root », où <utilisateur> représente le compte à créer, par exemple « imurdock » ou « rms ».
";
$elem["passwd/make-user"]["default"]="true";
$elem["passwd/user-fullname"]["type"]="string";
$elem["passwd/user-fullname"]["description"]="Full name for the new user:
 A user account will be created for you to use instead of the root
 account for non-administrative activities.
 .
 Please enter the real name of this user. This information will be used
 for instance as default origin for emails sent by this user as well as
 any program which displays or uses the user's real name. Your full
 name is a reasonable choice.
";
$elem["passwd/user-fullname"]["descriptionde"]="Voller Name des neuen Benutzers:
 Für Sie wird ein Konto angelegt, das Sie statt dem root-Konto für die alltägliche Arbeit verwenden können.
 .
 Bitte geben Sie den vollen Namen des Benutzers an. Diese Information wird z.B. im Absender von E-Mails, die er verschickt, oder in Programmen, die den Namen des Benutzers anzeigen, verwendet. Ihr kompletter Name wäre sinnvoll.
";
$elem["passwd/user-fullname"]["descriptionfr"]="Nom complet du nouvel utilisateur :
 Un compte d'utilisateur va être créé afin que vous puissiez disposer d'un compte différent de celui du superutilisateur (« root »), pour l'utilisation courante du système.
 .
 Veuillez indiquer le nom complet du nouvel utilisateur. Cette information servira par exemple dans l'adresse origine des courriels émis ainsi que dans tout programme qui affiche ou se sert du nom complet. Votre propre nom est un bon choix.
";
$elem["passwd/user-fullname"]["default"]="";
$elem["passwd/username"]["type"]="string";
$elem["passwd/username"]["description"]="Username for your account:
 Select a username for the new account. Your first name is a reasonable choice.
 The username should start with a lower-case letter, which can be
 followed by any combination of numbers and more lower-case letters.
";
$elem["passwd/username"]["descriptionde"]="Benutzername für Ihr Konto:
 Wählen Sie einen Benutzernamen für das neue Benutzerkonto. Der Vorname ist meist eine gute Wahl. Der Benutzername sollte mit einem kleinen Buchstaben beginnen, gefolgt von weiteren kleinen Buchstaben oder auch Zahlen.
";
$elem["passwd/username"]["descriptionfr"]="Identifiant pour le compte utilisateur :
 Veuillez choisir un identifiant (« login ») pour le nouveau compte. Votre prénom est un choix possible. Les identifiants doivent commencer par une lettre minuscule, suivie d'un nombre quelconque de chiffres et de lettres minuscules.
";
$elem["passwd/username"]["default"]="";
$elem["passwd/username-bad"]["type"]="error";
$elem["passwd/username-bad"]["description"]="Invalid username
 The username you entered is invalid. Note that usernames must start with
 a lower-case letter, which can be followed by any combination of numbers
 and more lower-case letters.
";
$elem["passwd/username-bad"]["descriptionde"]="Ungültiger Benutzername
 Der Benutzername, den Sie eingegeben haben, ist ungültig. Hinweis: Der Benutzername sollte mit einem kleinen Buchstaben beginnen, welcher von einer Kombination aus Zahlen oder weiteren klein geschriebenen Buchstaben ergänzt werden kann.
";
$elem["passwd/username-bad"]["descriptionfr"]="Identifiant non valable
 L'identifiant que vous avez indiqué n'est pas valable. Les identifiants doivent commencer par une lettre minuscule, suivie d'un nombre quelconque de chiffres et de lettres minuscules.
";
$elem["passwd/username-bad"]["default"]="";
$elem["passwd/username-reserved"]["type"]="error";
$elem["passwd/username-reserved"]["description"]="Reserved username
 The username you entered (${USERNAME}) is reserved for use by the system.
 Please select a different one.
";
$elem["passwd/username-reserved"]["descriptionde"]="Reservierter Benutzername
 Der von Ihnen eingegebene Benutzername (${USERNAME}) ist für das System reserviert. Bitte wählen Sie einen anderen.
";
$elem["passwd/username-reserved"]["descriptionfr"]="Identifiant réservé
 L'identifiant que vous avez choisi (${USERNAME}) est réservé pour le système. Veuillez en choisir un autre.
";
$elem["passwd/username-reserved"]["default"]="";
$elem["passwd/user-password"]["type"]="password";
$elem["passwd/user-password"]["description"]="Choose a password for the new user:
 A good password will contain a mixture of letters, numbers and punctuation
 and should be changed at regular intervals.
";
$elem["passwd/user-password"]["descriptionde"]="Wählen Sie ein Passwort für den neuen Benutzer:
 Ein gutes Passwort enthält eine Mixtur aus Buchstaben, Zahlen und Sonderzeichen und wird in regelmäßigen Abständen geändert.
";
$elem["passwd/user-password"]["descriptionfr"]="Mot de passe pour le nouvel utilisateur :
 Un bon mot de passe est composé de lettres, chiffres et signes de ponctuation. Il devra en outre être changé régulièrement.
";
$elem["passwd/user-password"]["default"]="";
$elem["passwd/user-password-again"]["type"]="password";
$elem["passwd/user-password-again"]["description"]="Re-enter password to verify:
 Please enter the same user password again to verify you have typed it
 correctly.
";
$elem["passwd/user-password-again"]["descriptionde"]="Bitte geben Sie das Passwort nochmals zur Bestätigung ein:
 Bitte geben Sie das gleiche Benutzerpasswort nochmals ein, um zu prüfen, dass Sie sich nicht vertippt haben.
";
$elem["passwd/user-password-again"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez entrer à nouveau le mot de passe pour l'utilisateur, afin de vérifier que votre saisie est correcte.
";
$elem["passwd/user-password-again"]["default"]="";
$elem["user-setup/password-mismatch"]["type"]="error";
$elem["user-setup/password-mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["user-setup/password-mismatch"]["descriptionde"]="Passworteingabefehler
 Die beiden Passwörter, die Sie eingegeben haben, sind nicht gleich. Bitte versuchen Sie es noch einmal.
";
$elem["user-setup/password-mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe que vous avez entrés sont différents. Veuillez recommencer.
";
$elem["user-setup/password-mismatch"]["default"]="";
$elem["user-setup/password-empty"]["type"]="error";
$elem["user-setup/password-empty"]["description"]="Empty password
 You entered an empty password, which is not allowed.
 Please choose a non-empty password.
";
$elem["user-setup/password-empty"]["descriptionde"]="Leeres Passwort
 Sie haben ein leeres Passwort bzw. kein Passwort eingegeben, was nicht erlaubt ist. Bitte geben Sie ein Passwort ein.
";
$elem["user-setup/password-empty"]["descriptionfr"]="Mot de passe vide
 Vous avez choisi un mot de passe vide ce qui n'est pas autorisé. Veuillez choisir un mot de passe non vide.
";
$elem["user-setup/password-empty"]["default"]="";
$elem["passwd/shadow"]["type"]="boolean";
$elem["passwd/shadow"]["description"]="Enable shadow passwords?
 Shadow passwords make your system more secure because nobody is able to
 view even encrypted passwords. The passwords are stored in a separate file
 that can only be read by special programs. The use of shadow passwords
 is strongly recommended, except in a few cases such as NIS environments.
";
$elem["passwd/shadow"]["descriptionde"]="Shadow-Passwörter benutzen?
 Shadow-Passwörter machen Ihr System sicherer, weil niemand selbst die verschlüsselten Passwörter auslesen kann. Passwörter werden in einer separaten Datei gespeichert, welche nur von speziellen Programmen gelesen werden können. Shadow-Passwörter werden ausdrücklich empfohlen, außer in wenigen Fällen, wie z.B. in NIS-Umgebungen.
";
$elem["passwd/shadow"]["descriptionfr"]="Faut-il activer les mots de passe cachés (« shadow passwords ») ?
 Les mots de passe cachés rendent le système plus sûr car personne n'aura accès aux mots de passe chiffrés. Les mots de passe seront conservés dans un fichier à part et ne pourront être lus que par des programmes spéciaux. L'utilisation des mots de passe cachés est fortement recommandée sauf dans de rares cas comme lors de l'utilisation de NIS.
";
$elem["passwd/shadow"]["default"]="true";
$elem["debian-installer/user-setup-udeb/title"]["type"]="title";
$elem["debian-installer/user-setup-udeb/title"]["description"]="Set up users and passwords
";
$elem["debian-installer/user-setup-udeb/title"]["descriptionde"]="Benutzer und Passwörter einrichten
";
$elem["debian-installer/user-setup-udeb/title"]["descriptionfr"]="Créer les utilisateurs et choisir les mots de passe
";
$elem["debian-installer/user-setup-udeb/title"]["default"]="";
$elem["finish-install/progress/user-setup"]["type"]="text";
$elem["finish-install/progress/user-setup"]["description"]="Setting users and passwords...
";
$elem["finish-install/progress/user-setup"]["descriptionde"]="Benutzer und Passwörter einrichten ...
";
$elem["finish-install/progress/user-setup"]["descriptionfr"]="Création des utilisateurs et mise en place des mots de passe...
";
$elem["finish-install/progress/user-setup"]["default"]="";
PKG_OptionPageTail2($elem);
?>
