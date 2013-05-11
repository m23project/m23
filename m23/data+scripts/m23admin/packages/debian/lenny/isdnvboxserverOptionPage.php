<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("isdnvboxserver");

$elem["isdnvboxserver/msn"]["type"]="string";
$elem["isdnvboxserver/msn"]["description"]="What number should vbox answer?
 Vbox must know what number to listen to. Depending on your country's ISDN
 system, this may or may not include the areacode. It is usually without
 the leading 0.
 .
 Enter `quit' (or leave it blank) if you want to configure by hand, not via
 debconf. Also enter `quit' if you already have an existing (working) vbox
 configuration from the time when this was still part of isdnutils (unless
 you want to create a new configuration).
";
$elem["isdnvboxserver/msn"]["descriptionde"]="Auf welcher Nummer soll vbox antworten?
 Vbox muss die Nummer kennen, auf der es horchen soll. Abhängig von dem ISDN-System in Ihrem Land gehört die Ortsvorwahl dazu oder auch nicht. Sie wird in der Regel ohne führende 0 angegeben.
 .
 Geben Sie »quit« ein (oder lassen Sie es leer), wenn Sie von Hand konfigurieren wollen und nicht via debconf. Ebenfalls sollten Sie »quit« eingeben, wenn Sie noch eine existierende (funktionierende) Konfiguration von vbox haben, die aus der Zeit stammt, als es noch Teil von isdnutils war (solange Sie keine neue Konfiguration erstellen wollen).
";
$elem["isdnvboxserver/msn"]["descriptionfr"]="À quel numéro vbox doit-il répondre ?
 Vbox doit connaître son numéro d'appel. Selon le système RNIS en usage dans votre pays, il peut comporter ou non l'indicatif de zone. Habituellement, ce numéro ne comporte pas le premier 0.
 .
 Entrez « quit » (ou laissez le champ vide) si vous souhaitez faire la configuration vous-même et non avec debconf. Si vous avez déjà configuré vbox (p. ex. quand vbox appartenait au paquet isdnutils), indiquez aussi « quit » (sauf si vous souhaitez recommencer la configuration).
";
$elem["isdnvboxserver/msn"]["default"]="quit";
$elem["isdnvboxserver/rings"]["type"]="string";
$elem["isdnvboxserver/rings"]["description"]="After how many rings should vbox pick up the line?
 One ring is about 5 seconds. You can fine-tune the number of rings for
 certain phonenumbers manually, e.g. any salesmen you know the number of
 (or calls without caller-ID) can be dumped into the answering machine
 after one ring. See `man vbox.conf' for more info.
";
$elem["isdnvboxserver/rings"]["descriptionde"]="Nach wie vielen Malen Klingeln soll vbox den Anruf entgegennehmen?
 Ein Klingeln dauert etwa 5 Sekunden. Sie können die Häufigkeit des Klingelns für bestimmte Telefonnummern manuell einstellen, z.B. können Anrufe von Ihnen bekannten Verkäufern (oder Anrufer ohne Anrufer-Kennung) nach einmaligem Klingeln vom Anrufbeantworter entgegengenommen werden. Lesen Sie »man vbox.conf« für weitere Informationen.
";
$elem["isdnvboxserver/rings"]["descriptionfr"]="Après combien de sonneries vbox doit-il décrocher ?
 Une sonnerie dure environ 5 secondes. Vous pouvez régler manuellement le nombre de sonneries pour certains numéros ; p. ex. les appels de certains commerciaux connus (ou les appels dont le numéro d'appelant n'est pas affiché) peuvent être envoyés vers un répondeur automatique après une seule sonnerie. Veuillez consulter « man vbox.conf » pour plus d'informations.
";
$elem["isdnvboxserver/rings"]["default"]="4";
$elem["isdnvboxserver/attachmsg"]["type"]="select";
$elem["isdnvboxserver/attachmsg"]["choices"][1]="yes";
$elem["isdnvboxserver/attachmsg"]["description"]="Should the message be attached to the email?
 When a message is recorded, an email notification is sent. If that email
 should contain the message as an attachment, choose \"yes\" here. Note: the
 attachment can be large!
";
$elem["isdnvboxserver/attachmsg"]["descriptionde"]="Soll die Nachricht an die E-Mail angehängt werden?
 Wenn eine Nachricht aufgezeichnet wurde, wird eine E-Mail zur Benachrichtigung verschickt. Soll diese E-Mail die Nachricht als Anhang enthalten, wählen Sie hier »yes«. Hinweis: der Anhang kann groß sein!
";
$elem["isdnvboxserver/attachmsg"]["descriptionfr"]="Faut-il joindre le message au courrier électronique ?
 Quand un message est enregistré, un accusé de réception est envoyé par courrier électronique. Acceptez si vous souhaitez que ce courrier contienne le message en pièce jointe. Note : la pièce jointe peut avoir une taille importante !
";
$elem["isdnvboxserver/attachmsg"]["default"]="yes";
$elem["isdnvboxserver/daemonuser"]["type"]="string";
$elem["isdnvboxserver/daemonuser"]["description"]="As what user should the answering machine run?
 vboxd runs with the privileges of a normal (non-root) user. This is
 typically your non-root login name. This user must be a member of the
 `dialout' group.
";
$elem["isdnvboxserver/daemonuser"]["descriptionde"]="Unter welchem Benutzer soll der Anrufbeantworter laufen?
 vboxd läuft mit den Rechten eines normalen Benutzers. Dies ist typischerweise Ihr nicht-root-Login-Name. Dieser Benutzer muss ein Mitglied der Gruppe »dialout« sein.
";
$elem["isdnvboxserver/daemonuser"]["descriptionfr"]="Quel utilisateur exécute le répondeur ?
 vbox fonctionne avec les droits d'un utilisateur ordinaire (pas ceux du super-utilisateur). C'est en général votre nom d'utilisateur ordinaire. Cet utilisateur doit appartenir au groupe « dialout ».
";
$elem["isdnvboxserver/daemonuser"]["default"]="vboxdaemonuser";
$elem["isdnvboxserver/nosuchuser"]["type"]="text";
$elem["isdnvboxserver/nosuchuser"]["description"]="The user ${Daemonuser} doesn't exist on the system.
 Enter a valid user name here that's known to the system.
";
$elem["isdnvboxserver/nosuchuser"]["descriptionde"]="Der Benutzer ${Daemonuser} existiert nicht auf dem System.
 Geben Sie einen gültigen Benutzernamen an, der auf dem System vorhanden ist.
";
$elem["isdnvboxserver/nosuchuser"]["descriptionfr"]="L'utilisateur ${Daemonuser} n'existe pas sur le système.
 Donnez ici un nom d'utilisateur connu par le système.
";
$elem["isdnvboxserver/nosuchuser"]["default"]="";
$elem["isdnvboxserver/user"]["type"]="string";
$elem["isdnvboxserver/user"]["description"]="What username may connect to the vbox server?
 To listen to messages using vbox (from the isdnvboxclient package), you
 need a username and password. Enter the username here. This does not have
 to be a user on the system itself.
";
$elem["isdnvboxserver/user"]["descriptionde"]="Welcher Benutzername kann eine Verbindung zum vbox-Server aufbauen?
 Um die Nachrichten von vbox abzuhören (von dem Paket isdnvboxclient aus), benötigen Sie einen Benutzernamen und ein Passwort. Geben Sie hier einen Benutzernamen ein. Es muss nicht zwingend ein auf dem System vorhandener Benutzer sein.
";
$elem["isdnvboxserver/user"]["descriptionfr"]="Quel utilisateur peut se connecter au serveur vbox ?
 Pour écouter les messages en utilisant vbox (du paquet isdnvboxclient), vous avez besoin d'un nom et d'un mot de passe. Indiquez le nom maintenant. Ce ne doit pas être nécessairement celui d'un utilisateur du système.
";
$elem["isdnvboxserver/user"]["default"]="";
$elem["isdnvboxserver/password"]["type"]="password";
$elem["isdnvboxserver/password"]["description"]="Enter the password for ${User} here.
 Please don't use ':' in it! The way it is stored cannot handle this.
";
$elem["isdnvboxserver/password"]["descriptionde"]="Geben Sie das Passwort für ${User} ein.
 Bitte benutzen Sie darin keinen Doppelpunkt (»:«)! Die Art, wie es gespeichert wird, kann damit nicht umgehen.
";
$elem["isdnvboxserver/password"]["descriptionfr"]="Donnez le mot de passe pour ${User}.
 Veuillez ne pas utiliser de caractère « : » car la façon dont il est conservé ne le permet pas !
";
$elem["isdnvboxserver/password"]["default"]="";
$elem["isdnvboxserver/vboxnodir"]["type"]="error";
$elem["isdnvboxserver/vboxnodir"]["description"]="No home directory!
 The home directory `${DIR}' for user `${USER}' doesn't exist. This means
 that the file `${DIR}/.vbox.conf' cannot be created.
";
$elem["isdnvboxserver/vboxnodir"]["descriptionde"]="Kein Home-Verzeichnis!
 Das Home-Verzeichnis »${DIR}« für den Benutzer »${USER}« existiert nicht. Das bedeutet, dass die Datei »${DIR}/.vbox.conf« nicht erstellt werden kann.
";
$elem["isdnvboxserver/vboxnodir"]["descriptionfr"]="Pas de répertoire « home » !
 Le répertoire ${DIR} de l'utilisateur ${USER} n'existe pas. Le fichier ${DIR}/.vbox.conf ne peut donc pas être créé.
";
$elem["isdnvboxserver/vboxnodir"]["default"]="";
$elem["isdnvboxserver/vboxnouser"]["type"]="error";
$elem["isdnvboxserver/vboxnouser"]["description"]="User doesn't exist!
 The user `${USER}' doesn't exist on the system! Please rerun the
 configuration with `dpkg-reconfigure isdnvboxserver' to enter another
 username, or after creating the user.
";
$elem["isdnvboxserver/vboxnouser"]["descriptionde"]="Der Benutzer existiert nicht!
 Der Benutzer »${USER}« existiert nicht auf dem System! Bitte starten Sie die Konfiguration mit »dpkg-reconfigure isdnvboxserver« erneut, um einen anderen Benutzernamen anzugeben oder nachdem der Benutzer angelegt wurde.
";
$elem["isdnvboxserver/vboxnouser"]["descriptionfr"]="L'utilisateur n'existe pas.
 L'utilisateur ${USER} n'existe pas sur le système. Veuillez recommencer la configuration avec la commande « dpkg-reconfigure isdnvboxserver » pour indiquer un autre nom, ou le même, après l'avoir créé.
";
$elem["isdnvboxserver/vboxnouser"]["default"]="";
$elem["isdnvboxserver/doinit"]["type"]="select";
$elem["isdnvboxserver/doinit"]["choices"][1]="yes";
$elem["isdnvboxserver/doinit"]["description"]="Should vboxgetty be enabled?
 vboxgetty is in /etc/inittab, but not yet enabled. Answering `yes' here
 will enable it once this package is fully configured. Choose `no' if you
 want to tweak it manually.
";
$elem["isdnvboxserver/doinit"]["descriptionde"]="Soll vboxgetty eingeschaltet werden?
 vboxgetty ist in /etc/inittab vorhanden, aber nicht eingeschaltet. Antworten Sie hier »yes«, wird es eingeschaltet, sobald dieses Paket voll konfiguriert ist. Wählen Sie »no«, wenn Sie es manuell tun wollen.
";
$elem["isdnvboxserver/doinit"]["descriptionfr"]="Voulez-vous activer vboxgetty ?
 vboxgetty est mentionné dans /etc/inittab, mais n'est pas encore activé. Si vous acceptez maintenant, il sera activé quand ce paquet sera configuré. Refusez si vous préférez faire ces réglages vous-même.
";
$elem["isdnvboxserver/doinit"]["default"]="yes";
$elem["isdnvboxserver/devfs_inittab"]["type"]="error";
$elem["isdnvboxserver/devfs_inittab"]["description"]="Device in inittab doesn't agree with devfs mode
 The entry for vboxgetty in /etc/inittab uses a device name that does not
 correspond to the current devfs usage; either a devfs (/dev/isdn/ttyIxx)
 name is used in inittab while devfs is not mounted, or the non-devfs name
 is used while devfs is mounted.
 .
 You will have to fix this by hand.
";
$elem["isdnvboxserver/devfs_inittab"]["descriptionde"]="Device in inittab stimmt nicht mit devfs-Modus überein
 Der Eintrag für vboxgetty in /etc/inittab benutzt einen Gerätenamen, der nicht mit der aktuellen devfs-Nutzung übereinstimmt; entweder wird ein devfs-Name (/dev/isdn/ttyIxx) benutzt, während devfs nicht eingehängt ist, oder der nicht-devfs-Name wird verwendet, während devfs eingehängt ist.
 .
 Sie werden dies von Hand berichtigen müssen.
";
$elem["isdnvboxserver/devfs_inittab"]["descriptionfr"]="Le nom de périphérique utilisé dans inittab ne correspond pas au mode devfs utilisé
 Une incohérence entre l'entrée de vboxgetty dans /etc/inittab pour vboxgetty et l'utilisation actuelle de devfs semble exister. Deux raisons sont possibles :
  - un nom de périphérique de la forme /dev/isdn/ttyIxx est utilisé dans inittab alors que devfs n'est pas monté ;
  - un nom de périphérique classique (non devfs) est utilisé dans inittab alors que devfs est monté.
 .
 Vous devrez corriger cela vous-même.
";
$elem["isdnvboxserver/devfs_inittab"]["default"]="";
$elem["isdnvboxserver/devfs_vboxgettyconf"]["type"]="error";
$elem["isdnvboxserver/devfs_vboxgettyconf"]["description"]="Device in vboxgetty.conf doesn't agree with devfs mode
 The device entry in /etc/isdn/vboxgetty.conf uses a device name that does
 not correspond to the current devfs usage; either a devfs
 (/dev/isdn/ttyIxx) name is used in vboxgetty.conf while devfs is not
 mounted, or the non-devfs name is used while devfs is mounted.
 .
 You will have to fix this by hand.
";
$elem["isdnvboxserver/devfs_vboxgettyconf"]["descriptionde"]="Das Device in vboxgetty.conf stimmt nicht mit dem devfs-Modus überein.
 Der Geräte-Eintrag in /etc/isdn/vbxgetty.conf benutzt einen Gerätenamen, der nicht mit der aktuellen devfs-Nutzung übereinstimmt; entweder wird ein devfs-Name (/dev/isdn/ttyIxx) benutzt, während devfs nicht eingehängt ist, oder der nicht-devfs-Name wird verwendet, während devfs eingehängt ist.
 .
 Sie werden dies von Hand berichtigen müssen.
";
$elem["isdnvboxserver/devfs_vboxgettyconf"]["descriptionfr"]="Incohérence entre le périphérique mentionné dans vboxgetty.conf et l'utilisation actuelle de devfs
 Une incohérence entre le périphérique mentionné dans /etc/isdn/vboxgetty.conf et l'utilisation actuelle de devfs semble exister. Deux raisons sont possibles :
  - un nom de périphérique de la forme /dev/isdn/ttyIxx est utilisé dans vboxgetty.conf alors que devfs n'est pas monté ;
  - un nom de périphérique classique (non devfs) est utilisé dans vboxgetty.conf alors que devfs est monté.
 .
 Vous devrez corriger cela vous-même.
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
