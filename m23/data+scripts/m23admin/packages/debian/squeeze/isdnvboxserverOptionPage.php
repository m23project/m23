<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("isdnvboxserver");

$elem["isdnvboxserver/msn"]["type"]="string";
$elem["isdnvboxserver/msn"]["description"]="Number that vbox should answer:
 Vbox must know what number to listen to. Depending on the country's ISDN
 system, this may or may not include the area code. Leading \"0\" should most
 often be dropped.
 .
 Leave the field blank if you want to configure by hand, or if you already
 use an existing (working) vbox
 configuration from the time when this was still part of isdnutils (unless
 you want to create a new configuration).
";
$elem["isdnvboxserver/msn"]["descriptionde"]="Nummer, auf der Vbox antworten soll:
 Vbox muss die Nummer kennen, auf der es auf Anfragen warten soll. Abhängig von dem ISDN-System in Ihrem Land gehört die Ortsvorwahl dazu oder auch nicht. Die führende »0« sollten meist weggelassen werden.
 .
 Lassen Sie dieses Feld leer, wenn Sie von Hand konfigurieren wollen oder wenn Sie noch eine existierende (funktionierende) Konfiguration von Vbox haben, die aus der Zeit stammt, als es noch Teil von isdnutils war (solange Sie keine neue Konfiguration erstellen wollen).
";
$elem["isdnvboxserver/msn"]["descriptionfr"]="Numéro auquel vbox doit répondre :
 Vbox doit connaître son numéro d'appel. Selon le système RNIS en usage dans votre pays, il peut comporter ou non l'indicatif de zone. Habituellement, ce numéro ne comporte pas le premier 0.
 .
 Laissez ce champ vide si vous souhaitez faire la configuration vous-même et non automatiquement ou si vous avez déjà configuré vbox (p. ex. quand vbox appartenait au paquet isdnutils)
";
$elem["isdnvboxserver/msn"]["default"]="quit";
$elem["isdnvboxserver/rings"]["type"]="string";
$elem["isdnvboxserver/rings"]["description"]="Number of rings for vbox to pick up the line:
 One ring is about 5 seconds. This setting can later be fine-tuned
 for each incoming telephone number, for instance to aggressively
 filter some incoming numbers.
 .
 You should read vbox.conf(5) for more information.
";
$elem["isdnvboxserver/rings"]["descriptionde"]="Anzahl von Klingeln, nachdem Vbox den Anruf entgegennehmen soll:
 Einmal Klingeln entspricht in etwa 5 Sekunden. Diese Einstellung kann später für jede anrufende Telefonnummer weiter verfeinert werden, im besonderen um einige eingehende Telefonnummern aggressiv herauszufiltern.
 .
 Sie sollten die Handbuchseite vbox.conf(5) für weitere Informationen lesen.
";
$elem["isdnvboxserver/rings"]["descriptionfr"]="Nombre de sonneries avant réponse par vbox :
 La durée d'une sonnerie est d'environ 5 secondes. Ce réglage peut ultérieurement être ajusté de manière différente pour chaque numéro de téléphone appelant, par exemple pour filtrer agressivement certains numéros appelants.
 .
 Vous pouvez consulter la page de manuel de vbox.conf(5).
";
$elem["isdnvboxserver/rings"]["default"]="4";
$elem["isdnvboxserver/attachmsg"]["type"]="boolean";
$elem["isdnvboxserver/attachmsg"]["description"]="Should incoming messages be attached to notification mails?
 When a message is recorded, an email notification is sent. If that
 email should contain the message as an attachment, choose the option.
";
$elem["isdnvboxserver/attachmsg"]["descriptionde"]="Sollen eingehende Nachrichten an die Benachrichtigungs-E-Mails angehängt werden?
 Wenn eine Nachricht aufgezeichnet wurde, wird eine E-Mail zur Benachrichtigung verschickt. Soll diese E-Mail die Nachricht als Anhang enthalten, wählen Sie diese Option aus.
";
$elem["isdnvboxserver/attachmsg"]["descriptionfr"]="Faut-il ajouter les fichiers joints au message d'avertissement par courrier électronique ?
 Quand un message est enregistré, un accusé de réception est envoyé par courrier électronique. Choisissez cette option si vous souhaitez que ce courrier contienne le message en pièce jointe.
";
$elem["isdnvboxserver/attachmsg"]["default"]="true";
$elem["isdnvboxserver/daemonuser"]["type"]="string";
$elem["isdnvboxserver/daemonuser"]["description"]="Run the answering machine as:
 The vboxd daemon should run as an unprivileged (non-root) user. It must be
 a member of the \"dialout\" group.
";
$elem["isdnvboxserver/daemonuser"]["descriptionde"]="Benutzer, unter dem der Anrufbeantworter laufen soll:
 Der »vboxd«-Daemon sollte mit den Rechten eines normalen Benutzers laufen. Dies ist typischerweise Ihr nicht-root-Login-Name. Dieser Benutzer muss ein Mitglied der Gruppe »dialout« sein.
";
$elem["isdnvboxserver/daemonuser"]["descriptionfr"]="Identifiant pour l'exécution du répondeur :
 Le démon vboxd fonctionne avec les droits d'un utilisateur ordinaire (pas ceux du superutilisateur). Cet utilisateur doit appartenir au groupe « dialout ».
";
$elem["isdnvboxserver/daemonuser"]["default"]="vboxdaemonuser";
$elem["isdnvboxserver/nosuchuser"]["type"]="text";
$elem["isdnvboxserver/nosuchuser"]["description"]="${Daemonuser} unknown
 The user you chose does not exist on this machine. You must choose
 a valid username.
";
$elem["isdnvboxserver/nosuchuser"]["descriptionde"]="${Daemonuser} unbekannt
 Der ausgewählte Benutzer ist auf diesem System nicht bekannt. Sie müssen einen zulässigen Benutzernamen auswählen.
";
$elem["isdnvboxserver/nosuchuser"]["descriptionfr"]="${Daemonuser} inconnu
 L'identifiant choisi n'existe pas. Vous devez choisir un identifiant existant.
";
$elem["isdnvboxserver/nosuchuser"]["default"]="";
$elem["isdnvboxserver/user"]["type"]="string";
$elem["isdnvboxserver/user"]["description"]="Login for the answering machine:
 Connections to the answering machine (using the vbox program provided
 by the isdnvboxclient package) will be prompted for a username and
 password.
 .
 The username you define here does not have to correspond to a login
 account on this system.
";
$elem["isdnvboxserver/user"]["descriptionde"]="Benutzer, unter dem der Anrufbeantworter laufen soll:
 Die Verbindungen zum Anrufbeantworter (unter Verwendung des Programms Vbox aus dem Paket »isdnvboxclient«) benötigen Benutzernamen und Passwort.
 .
 Der von Ihnen angegebene Benutzername passt zu keinem Benutzerkonto auf diesem System.
";
$elem["isdnvboxserver/user"]["descriptionfr"]="Identifiant de connexion au répondeur :
 Les connexions au répondeur (avec le programme vbox fourni par le paquet isdnvboxclient) nécessitent la fourniture d'un identifiant et un mot de passe.
 .
 L'identifiant indiqué ne doit pas être nécessairement un identifiant de connexion à ce système.
";
$elem["isdnvboxserver/user"]["default"]="";
$elem["isdnvboxserver/password"]["type"]="password";
$elem["isdnvboxserver/password"]["description"]="Password for ${User}:
 Please choose the password for the ${User} connection user.
";
$elem["isdnvboxserver/password"]["descriptionde"]="Passwort für ${User}:
 Bitte geben Sie das Passwort für den Verbindungsbenutzer ${User} an.
";
$elem["isdnvboxserver/password"]["descriptionfr"]="Mot de passe pour ${User} :
 Veuillez choisir le mot de passe pour l'identifiant de connexion ${user}.
";
$elem["isdnvboxserver/password"]["default"]="";
$elem["isdnvboxserver/vboxnodir"]["type"]="error";
$elem["isdnvboxserver/vboxnodir"]["description"]="No home directory
 The home directory \"${DIR}\" for user \"${USER}\" does not exist. This means
 that the file \"${DIR}/.vbox.conf\" cannot be created.
";
$elem["isdnvboxserver/vboxnodir"]["descriptionde"]="Kein Home-Verzeichnis
 Das Home-Verzeichnis »${DIR}« für den Benutzer »${USER}« existiert nicht. Das bedeutet, dass die Datei »${DIR}/.vbox.conf« nicht erstellt werden kann.
";
$elem["isdnvboxserver/vboxnodir"]["descriptionfr"]="Pas de répertoire « home »
 Le répertoire ${DIR} de l'utilisateur ${USER} n'existe pas. Le fichier ${DIR}/.vbox.conf ne peut donc pas être créé.
";
$elem["isdnvboxserver/vboxnodir"]["default"]="";
$elem["isdnvboxserver/vboxnouser"]["type"]="error";
$elem["isdnvboxserver/vboxnouser"]["description"]="Non-existing user
 The user \"${USER}\" doesn't exist on the system. Please rerun the
 configuration with \"dpkg-reconfigure isdnvboxserver\" to enter another
 username, or after creating the user.
";
$elem["isdnvboxserver/vboxnouser"]["descriptionde"]="Unbekannter Benutzer
 Der Benutzer »${USER}« existiert nicht auf dem System! Bitte starten Sie die Konfiguration mit »dpkg-reconfigure isdnvboxserver« erneut, um einen anderen Benutzernamen anzugeben oder nachdem der Benutzer angelegt wurde.
";
$elem["isdnvboxserver/vboxnouser"]["descriptionfr"]="Identifiant inexistant
 L'utilisateur ${USER} n'existe pas sur le système. Veuillez recommencer la configuration avec la commande « dpkg-reconfigure isdnvboxserver » pour indiquer un autre nom, ou le même, après l'avoir créé.
";
$elem["isdnvboxserver/vboxnouser"]["default"]="";
$elem["isdnvboxserver/doinit"]["type"]="boolean";
$elem["isdnvboxserver/doinit"]["description"]="Should vboxgetty be enabled?
 A call for vboxgetty is defined in /etc/inittab, but not yet enabled. Choosing this option
 will enable it once this package is fully configured. Refuse this option
 if you want to tweak it manually.
";
$elem["isdnvboxserver/doinit"]["descriptionde"]="Soll vboxgetty eingeschaltet werden?
 Ein Aufruf von vboxgetty ist in /etc/inittab eingetragen, aber noch nicht eingeschaltet. Schalten Sie diese Option ein, wird dieser eingeschaltet, sobald dieses Paket voll konfiguriert ist. Lehnen Sie diese Option ab, wenn Sie diese manuell anpassen wollen.
";
$elem["isdnvboxserver/doinit"]["descriptionfr"]="Voulez-vous activer vboxgetty ?
 L'utilisation de vboxgetty est mentionnée dans /etc/inittab, mais n'est pas encore activée. Si vous choisissez cette option, cette utilisation sera activée quand le paquet sera définitivement configuré. Ne choisissez pas cette option si vous préférez faire ces réglages vous-même.
";
$elem["isdnvboxserver/doinit"]["default"]="true";
$elem["isdnvboxserver/devfs_inittab"]["type"]="error";
$elem["isdnvboxserver/devfs_inittab"]["description"]="Device in inittab doesn't agree with devfs mode
 The entry for vboxgetty in /etc/inittab uses a device name that does not
 correspond to the current devfs usage; either a devfs (/dev/isdn/ttyIxx)
 name is used in inittab while devfs is not mounted, or the non-devfs name
 is used while devfs is mounted.
 .
 This problem has to be fixed manually.
";
$elem["isdnvboxserver/devfs_inittab"]["descriptionde"]="Gerät in inittab stimmt nicht mit devfs-Modus überein
 Der Eintrag für vboxgetty in /etc/inittab benutzt einen Gerätenamen, der nicht mit der aktuellen devfs-Nutzung übereinstimmt; entweder wird ein devfs-Name (/dev/isdn/ttyIxx) benutzt, während devfs nicht eingehängt ist, oder der nicht-devfs-Name wird verwendet, während devfs eingehängt ist.
 .
 Dieses Problem müssen Sie von Hand beheben.
";
$elem["isdnvboxserver/devfs_inittab"]["descriptionfr"]="Le nom de périphérique utilisé dans inittab ne correspond pas au mode devfs utilisé
 Une incohérence entre l'entrée de vboxgetty dans /etc/inittab pour vboxgetty et l'utilisation actuelle de devfs semble exister. Soit un nom de périphérique de la forme /dev/isdn/ttyIxx est utilisé dans inittab alors que devfs n'est pas monté, soit un nom de périphérique classique (non devfs) est utilisé dans inittab alors que devfs est monté.
 .
 Ce problème doit être corrigé manuellement.
";
$elem["isdnvboxserver/devfs_inittab"]["default"]="";
$elem["isdnvboxserver/devfs_vboxgettyconf"]["type"]="error";
$elem["isdnvboxserver/devfs_vboxgettyconf"]["description"]="Device in vboxgetty.conf doesn't agree with devfs mode
 The device entry in /etc/isdn/vboxgetty.conf uses a device name that does
 not correspond to the current devfs usage; either a devfs
 (/dev/isdn/ttyIxx) name is used in vboxgetty.conf while devfs is not
 mounted, or the non-devfs name is used while devfs is mounted.
 .
 This problem has to be fixed manually.
";
$elem["isdnvboxserver/devfs_vboxgettyconf"]["descriptionde"]="Das Gerät in vboxgetty.conf stimmt nicht mit dem devfs-Modus überein.
 Der Geräte-Eintrag in /etc/isdn/vbxgetty.conf benutzt einen Gerätenamen, der nicht mit der aktuellen devfs-Nutzung übereinstimmt; entweder wird ein devfs-Name (/dev/isdn/ttyIxx) benutzt, während devfs nicht eingehängt ist, oder der nicht-devfs-Name wird verwendet, während devfs eingehängt ist.
 .
 Dieses Problem müssen Sie von Hand beheben.
";
$elem["isdnvboxserver/devfs_vboxgettyconf"]["descriptionfr"]="Incohérence entre le périphérique mentionné dans vboxgetty.conf et l'utilisation actuelle de devfs
 Une incohérence entre le périphérique mentionné dans /etc/isdn/vboxgetty.conf et l'utilisation actuelle de devfs semble exister. Soit un nom de périphérique de la forme /dev/isdn/ttyIxx est utilisé dans vboxgetty.conf alors que devfs n'est pas monté, soit un nom de périphérique classique (non devfs) est utilisé dans vboxgetty.conf alors que devfs est monté.
 .
 Ce problème doit être corrigé manuellement.
";
$elem["isdnvboxserver/devfs_vboxgettyconf"]["default"]="";
$elem["isdnvboxserver/dummy"]["type"]="note";
$elem["isdnvboxserver/dummy"]["description"]="for internal use
 Note to translators: no need to translate this, not shown to users.
";
$elem["isdnvboxserver/dummy"]["descriptionde"]="";
$elem["isdnvboxserver/dummy"]["descriptionfr"]="";
$elem["isdnvboxserver/dummy"]["default"]="";
PKG_OptionPageTail2($elem);
?>
