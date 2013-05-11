<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("emacspeak-ss");

$elem["shared/emacspeak/fake"]["type"]="select";
$elem["shared/emacspeak/fake"]["description"]="for internal use
 This template is never shown to the user and does not require
 translation.

";
$elem["shared/emacspeak/fake"]["descriptionde"]="";
$elem["shared/emacspeak/fake"]["descriptionfr"]="";
$elem["shared/emacspeak/fake"]["default"]="";
$elem["shared/emacspeak/device"]["type"]="select";
$elem["shared/emacspeak/device"]["description"]="Default speech server:
 The /etc/emacspeak.conf file will be configured so that the command
 '/usr/bin/emacspeak' will start Emacs with emacspeak support using
 this server.
 .
 You may change the selection later by running
 'dpkg-reconfigure emacspeak' as root, or temporarily override the
 selection by setting the environment variable DTK_PROGRAM.
";
$elem["shared/emacspeak/device"]["descriptionde"]="Standard-Sprachserver:
 Die Datei /etc/emacspeak.conf wird konfiguriert, so dass der Befehl »/usr/bin/emacspeak« Emacs mit Emacspeak-Unterstützung mit diesem Server startet.
 .
 Sie können die Auswahl später ändern, indem Sie als root »dpkg-reconfigure emacspeak« ausführen oder die Auswahl temporär überschreiben, indem Sie die Umgebungsvariable DTK_PROGRAM setzen.
";
$elem["shared/emacspeak/device"]["descriptionfr"]="Serveur de synthèse vocale par défaut :
 Le fichier /etc/emacspeak.conf sera configuré de telle façon que la commande « /usr/bin/emacspeak » démarre Emacs avec la prise en charge d'emacspeak via l'utilisation du serveur choisi à cette étape.
 .
 Vous aurez la possibilité de revenir plus tard sur votre décision en lançant la commande « dpkg-reconfigure emacspeak » avec les privilèges du superutilisateur, ou bien d'indiquer ponctuellement un autre choix via la variable d'environnement DTK_PROGRAM.
";
$elem["shared/emacspeak/device"]["default"]="DECtalk Express";
$elem["shared/emacspeak/port"]["type"]="string";
$elem["shared/emacspeak/port"]["description"]="Hardware port of the speech generation device:
 If a hardware device is used to generate speech, please enter the
 Unix device file associated with it, such as '/dev/ttyS0' or
 '/dev/ttyUSB0'.
 .
 If you use a software method to generate speech, please enter 'none'.
";
$elem["shared/emacspeak/port"]["descriptionde"]="Hardware-Schnittstelle des Sprachgenerators:
 Falls ein Hardwaregerät verwendet wird, um die Sprache zu erzeugen, geben Sie bitte die Unix-Gerätedatei ein, die ihm zugeordnet ist, wie »/dev/ttyS0« oder »/dev/ttyUSB0«.
 .
 Falls Sie die Sprache mittels Software generieren, geben Sie »none« ein.
";
$elem["shared/emacspeak/port"]["descriptionfr"]="Port matériel de l'appareil de synthèse vocale :
 Si un matériel spécifique doit être utilisé pour la synthèse vocale, veuillez indiquer le périphérique associé, par exemple « /dev/ttyS0 » ou « /dev/ttyUSB0 ».
 .
 Si vous utilisez seulement une méthode logicielle pour la synthèse vocale, entrez ici « none ».
";
$elem["shared/emacspeak/port"]["default"]="";
$elem["shared/emacspeak/invalidport"]["type"]="error";
$elem["shared/emacspeak/invalidport"]["description"]="${port} is not a character special device
";
$elem["shared/emacspeak/invalidport"]["descriptionde"]="${port} ist kein zeichenorientiertes Gerät (character special device)
";
$elem["shared/emacspeak/invalidport"]["descriptionfr"]="${port} n'est pas un périphérique en mode caractère.
";
$elem["shared/emacspeak/invalidport"]["default"]="";
$elem["shared/emacspeak/groupies"]["type"]="string";
$elem["shared/emacspeak/groupies"]["description"]="Users of speech server:
 Users must be members of group ${group} to access the speech server
 connected to ${port}. Please review the space-separated list of
 current members of that group, and add or remove usernames if needed.
 .
 If you later add users to the system, you can either reconfigure
 the emacspeak package afterwards, or enroll the user in ${group}
 with 'adduser ${group} <user>'.
 .
 Group membership is checked at login time, so new members must log
 out and log in again before using the speech server.
";
$elem["shared/emacspeak/groupies"]["descriptionde"]="Benutzer des Sprachservers:
 Die Benutzer müssen Mitglied der Gruppe ${group} sein, um auf den Sprachserver an ${port} zuzugreifen. Bitte überprüfen Sie die durch Leerzeichen getrennte Liste der aktuellen Mitglieder dieser Gruppe und ergänzen bzw. entfernen Sie Benutzernamen, falls notwendig.
 .
 Falls Sie später Benutzer zu dem System hinzufügen, können Sie entweder das Paket emacspeak neu konfigurieren oder den Benutzer mit »adduser ${group} <user>« in die Gruppe ${group} aufnehmen.
 .
 Die Gruppenmitgliedschaft wird beim Anmelden überprüft, daher müssen sich neue Mitglieder einmal ab- und wieder anmelden, bevor sie den Sprachserver verwenden.
";
$elem["shared/emacspeak/groupies"]["descriptionfr"]="Utilisateurs du serveur de synthèse vocale :
 Pour pouvoir accéder au serveur de synthèse vocale connecté à ${port}, les utilisateurs doivent être membres du groupe ${group}. Veuillez vérifier la liste des membres actuels de ce groupe (séparés par un espace), et l'adapter éventuellement à vos besoins.
 .
 Si vous ajoutez ultérieurement des utilisateurs à votre système, vous pourrez reconfigurer le paquet emacspeak, ou bien ajouter l'utilisateur <toto> au groupe ${group} avec la commande « adduser ${group} <toto> ».
 .
 L'appartenance à un groupe étant vérifiée lors de la connexion de l'utilisateur, les nouveaux membres devront se déconnecter puis se reconnecter avant de pouvoir utiliser le serveur de synthèse vocale.
";
$elem["shared/emacspeak/groupies"]["default"]="";
$elem["shared/emacspeak/invaliduser"]["type"]="error";
$elem["shared/emacspeak/invaliduser"]["description"]="Invalid username ${user}
 There is no user named ${user}, so no such user could be added to
 ${group}.
";
$elem["shared/emacspeak/invaliduser"]["descriptionde"]="Ungültiger Benutzername »${user}«
 Es gibt keinen Benutzer mit Namen »${user}«, daher könnte ein solcher Benutzer auch nicht zu der Gruppe »${group}« hinzugefügt werden.
";
$elem["shared/emacspeak/invaliduser"]["descriptionfr"]="Identifiant ${user} non valable.
 Il n'existe pas d'identifiant ${user} ; il est donc impossible de l'ajouter au groupe ${group}.
";
$elem["shared/emacspeak/invaliduser"]["default"]="";
$elem["shared/emacspeak/rootgroup"]["type"]="error";
$elem["shared/emacspeak/rootgroup"]["description"]="${port} non-writable by unprivileged users
 Since the speech device is connected to ${port}, unprivileged users
 must have read/write access to that device.
 .
 You should modify the device permissions with 'chmod a+rw ${port}'
 or modify the device group with 'chown root:dialout ${port}',
 then reconfigure emacspeak with 'dpkg-reconfigure emacspeak'.
";
$elem["shared/emacspeak/rootgroup"]["descriptionde"]="Auf ${port} kann von unprivilegierten Benutzern nicht geschrieben werden
 Da das Sprachgerät mit ${port} verbunden ist, müssen unprivilegierte Benutzer Lese-/Schreibzugriff auf dieses Gerät haben.
 .
 Sie sollten die Rechte der Gerätedatei mit »chmod a+rw ${port}« oder die Gerätegruppe mit »chown root:dialout ${port}« ändern und dann Emacspeak mit »dpkg-reconfigure emacspeak« neu konfigurieren.
";
$elem["shared/emacspeak/rootgroup"]["descriptionfr"]="Les utilisateurs non privilégiés n'ont pas d'accès en écriture sur ${port}.
 Puisque le serveur de synthèse vocale est connecté à ${port}, les utilisateurs non privilégiés doivent disposer des droits en lecture et en écriture sur ce périphérique.
 .
 Vous devriez modifier les droits avec la commande « chmod a+rw ${port} » ou bien modifier le groupe propriétaire du périphérique avec « chown root:dialout ${port} », puis reconfigurer emacspeak avec la commande « dpkg-reconfigure emacspeak ».
";
$elem["shared/emacspeak/rootgroup"]["default"]="";
$elem["shared/emacspeak/program"]["type"]="string";
$elem["shared/emacspeak/program"]["description"]="for internal use
 This template is never shown to the user and does not require
 translation.  This variable holds the path to the speech server,
 relative to /usr/share/<flavor>/site-lisp/emacspeak/servers.

";
$elem["shared/emacspeak/program"]["descriptionde"]="";
$elem["shared/emacspeak/program"]["descriptionfr"]="";
$elem["shared/emacspeak/program"]["default"]="";
$elem["shared/emacspeak/tcl"]["type"]="string";
$elem["shared/emacspeak/tcl"]["description"]="for internal use
 This template is never shown to the user and does not require
 translation.  This variable holds the path to the interpreter if any
 used to run the speech server.

";
$elem["shared/emacspeak/tcl"]["descriptionde"]="";
$elem["shared/emacspeak/tcl"]["descriptionfr"]="";
$elem["shared/emacspeak/tcl"]["default"]="";
$elem["shared/emacspeak/database"]["type"]="select";
$elem["shared/emacspeak/database"]["description"]="for internal use
 This template is never shown to the user and does not require
 translation.  This variable holds all the available choices for
 speech servers, and the corresponding values of \"program\", \"tcl\", and
 \"device\" for the above variables.
";
$elem["shared/emacspeak/database"]["descriptionde"]="";
$elem["shared/emacspeak/database"]["descriptionfr"]="";
$elem["shared/emacspeak/database"]["default"]="";
PKG_OptionPageTail2($elem);
?>
