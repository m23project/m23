<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mldonkey-server");

$elem["mldonkey-server/fasttrack_problem"]["type"]="note";
$elem["mldonkey-server/fasttrack_problem"]["description"]="Bug #200500
 Previous versions of mldonkey-server suffer from a serious DFSG policy
 violation.
 .
 The plugin for the fasttrack protocol (e.g. used by kazaa) of mldonkey-server
 was made with illegal coding practice. This version fixes the problem by
 removing this plugin from the MLDonkey package. Any fasttrack sources will be
 filtered out of your files.ini.
 .
 Your entire fasttrack upload will disappear with the next restart of the
 mldonkey server.
 .
 See /usr/share/doc/mldonkey-server/README.Debian for more information.
";
$elem["mldonkey-server/fasttrack_problem"]["descriptionde"]="Fehlerbericht #200500
 Frühere Versionen von mldonkey-server leiden unter einer ernsthafen Verletzung der Debian-Richtlinien für Freie Software.
 .
 Die Erweiterung für das Fasttrack-Protokoll (verwendet z. B. von kazaa) von mldonkey-server kam mit Hilfe illegaler Programmierpraktiken zu Stande. Diese Version behebt das Problem, indem diese Erweiterung aus dem MLDonkey-Paket entfernt wurde. Alle Fasttrack-Quellen werden aus Ihrer files.ini herausgefiltert.
 .
 Ihr gesamter Fasttrack-Upload wird beim nächsten Start des mldonkey-Servers verschwinden.
 .
 Weitere Informationen finden Sie in /usr/share/doc/mldonkey-server/README.Debian.
";
$elem["mldonkey-server/fasttrack_problem"]["descriptionfr"]="Bogue numéro 200500
 Les versions précédentes de mldonkey-server comportaient un sérieux problème de violation de la définition des logiciels libres selon Debian (« Debian Free Software Guidelines »).
 .
 Le greffon fasttrack (utilisé par exemple pour kazaa) de mldonkey-server relevait de pratiques illégales de programmation. Cette version corrige ce problème. Toutes les références à fasttrack seront supprimées de votre fichier files.ini.
 .
 Tous vos téléchargements fasttrack disparaîtront au prochain redémarrage de mldonkey.
 .
 Veuillez consulter le fichier /usr/share/doc/mldonkey-server/README.Debian pour plus d'informations.
";
$elem["mldonkey-server/fasttrack_problem"]["default"]="";
$elem["mldonkey-server/launch_at_startup"]["type"]="boolean";
$elem["mldonkey-server/launch_at_startup"]["description"]="Launch MLDonkey at startup?
 If enabled, each time your machine starts, the MLDonkey server will be started.
 .
 Otherwise, you will need to launch MLDonkey yourself each time you want to
 use it.
";
$elem["mldonkey-server/launch_at_startup"]["descriptionde"]="MLDonkey beim Hochfahren starten?
 Falls Sie dies aktivieren, wird der MLDonkey-Server jedes Mal gestartet, wenn Sie Ihren Computer hochfahren.
 .
 Anderenfalls müssen Sie MLDonkey jedes Mal selbst starten, wenn Sie es nutzen möchten.
";
$elem["mldonkey-server/launch_at_startup"]["descriptionfr"]="Faut-il lancer MLDonkey au démarrage du système ?
 Si vous choisissez cette option, un serveur MLDonkey sera lancé à chaque démarrage de votre machine.
 .
 Dans le cas contraire, vous devrez lancer MLDonkey chaque fois que vous souhaiterez l'utiliser.
";
$elem["mldonkey-server/launch_at_startup"]["default"]="false";
$elem["mldonkey-server/run_as_user"]["type"]="string";
$elem["mldonkey-server/run_as_user"]["description"]="MLDonkey user:
 Define the user who will run the MLDonkey server process.
 .
 Please do not choose a real user. For security reasons it is better if this
 user does not own any other data than the MLDonkey share.
 .
 You will use this user account to share and get data from the peer-to-peer
 networks.
 .
 This user will be a system user (if created). You won't be able to login into
 your system with this user name.
";
$elem["mldonkey-server/run_as_user"]["descriptionde"]="MLDonkey-Benutzer:
 Bestimmen Sie den Benutzer, unter dessen Namen der MLDonkey-Server-Prozess laufen soll.
 .
 Bitte wählen Sie keinen realen Benutzer. Aus Sicherheitsgründen ist es besser, wenn dieser Benutzer keine weiteren Daten außer der MLDonkey-Freigabe besitzt.
 .
 Sie werden dieses Benutzerkonto nutzen, um Daten innerhalb des Peer-to-Peer-Netzwerkes zur Verfügung zu stellen und zu beziehen.
 .
 Dieser Benutzer wird ein System-Benutzer sein (sofern er erstellt wird). Sie werden sich nicht mit diesem Benutzernamen an Ihrem System anmelden können.
";
$elem["mldonkey-server/run_as_user"]["descriptionfr"]="Utilisateur MLDonkey :
 Veuillez indiquer l'identifiant du propriétaire du processus serveur MLDonkey.
 .
 Vous devriez choisir un utilisateur dédié à cette tâche. Pour des raisons de sécurité, il est recommandé que cet utilisateur ne possède pas de données autres que celles qui sont partagées par MLDonkey.
 .
 Ce compte sera utilisé pour partager et télécharger des données du réseau pair-à-pair.
 .
 Cet utilisateur sera un utilisateur système (s'il est créé). Il ne sera pas capable de se connecter interactivement sur votre système.
";
$elem["mldonkey-server/run_as_user"]["default"]="mldonkey";
$elem["mldonkey-server/mldonkey_group"]["type"]="string";
$elem["mldonkey-server/mldonkey_group"]["description"]="MLDonkey group:
 Define the group which will run the MLDonkey server process.
 .
 Please do not choose a real group. For security reasons it is better if this
 group does not own any other data than the MLDonkey share.
 .
 Users of this group can start and stop the MLDonkey server and can also access
 the files fetched from the peer-to-peer networks.
";
$elem["mldonkey-server/mldonkey_group"]["descriptionde"]="MLDonkey-Gruppe:
 Bestimmen Sie die Gruppe, unter deren Namen der MLDonkey-Server-Prozess laufen soll.
 .
 Bitte wählen Sie keine reale Gruppe. Aus Sicherheitsgründen ist es besser, wenn diese Gruppe keine weiteren Daten außer der MLDonkey-Freigabe besitzt.
 .
 Mitglieder dieser Gruppe dürfen den MLDonkey-Server starten und stoppen, und sie dürfen auf die Daten zugreifen, die aus dem Peer-to-Peer-Netzwerk heruntergeladen wurden.
";
$elem["mldonkey-server/mldonkey_group"]["descriptionfr"]="Groupe MLDonkey :
 Veuillez indiquer le groupe qui sera propriétaire du processus serveur MLDonkey.
 .
 Vous devriez choisir un groupe dédié à cette tâche. Pour des raisons de sécurité, il est recommandé que ce groupe ne possède pas de données autres que celles qui sont partagées par MLDonkey.
 .
 Ce groupe permet de définir qui peut lancer et arrêter le serveur MLDonkey et qui peut accéder aux données récupérées sur le réseau.
";
$elem["mldonkey-server/mldonkey_group"]["default"]="mldonkey";
$elem["mldonkey-server/reown_file"]["type"]="boolean";
$elem["mldonkey-server/reown_file"]["description"]="Change the owner of old files?
 You have changed the MLDonkey user. You can change the ownership of your files
 to the new user.
 .
 PS: the former user won't be deleted from /etc/passwd, you will have to do it
 yourself later (e.g. with deluser(8)), or you keep it along with the old
 configuration.
";
$elem["mldonkey-server/reown_file"]["descriptionde"]="Den Besitzer der alten Dateien ändern?
 Sie haben den MLDonkey-Benutzer geändert. Sie können den neuen Benutzer zum Eigentümer Ihrer Dateien machen.
 .
 PS: Der frühere Benutzer wird nicht aus /etc/password entfernt werden. Sie werden dies selbst tun müssen (z. B. mittels deluser(8)), oder aber Sie behalten ihn zusammen mit der alten Konfiguration.
";
$elem["mldonkey-server/reown_file"]["descriptionfr"]="Faut-il modifier le propriétaire des anciens fichiers ?
 Vous avez changé l'utilisateur MLdonkey. Vous pouvez réaffecter les anciens fichiers au nouvel utilisateur.
 .
 L'utilisateur précédent ne sera pas supprimé du fichier /etc/password, vous devrez le faire vous-même (avec deluser(8) par exemple) ou le garder avec l'ancienne configuration.
";
$elem["mldonkey-server/reown_file"]["default"]="false";
$elem["mldonkey-server/mldonkey_dir"]["type"]="string";
$elem["mldonkey-server/mldonkey_dir"]["description"]="MLDonkey directory:
 Define the directory to which the MLDonkey server will be chdired and chrooted.
 .
 The .ini configuration files, incoming and shared directories will be in this
 directory.
 .
 Chroot support is not complete. For now, chroot is not possible, but it may be
 enabled in the near future.
";
$elem["mldonkey-server/mldonkey_dir"]["descriptionde"]="MLDonkey-Verzeichnis:
 Bestimmen Sie das Verzeichnis, in welches der MLDonkey-Server wechseln und welches das Wurzelverzeichnis desselben werden soll (per chroot).
 .
 Sowohl die .ini-Konfigurationsdateien als auch das zum Tausch freigegebene Verzeichnis sowie das Verzeichnis für die heruntergeladenen Dateien (»incoming« genannt) werden sich in diesem Verzeichnis befinden.
 .
 Die chroot-Unterstützung ist nicht vollständig. Zurzeit ist ein Verändern des Wurzelverzeichnisses nicht möglich, aber es könnte in naher Zukunft aktiviert werden.
";
$elem["mldonkey-server/mldonkey_dir"]["descriptionfr"]="Répertoire MLDonkey :
 Veuillez indiquer le répertoire dans lequel le serveur MLDonkey sera lancé et enfermé (« chroot »).
 .
 Les fichiers de configuration .ini, les répertoires partagés et de téléchargement seront placés dans ce répertoire.
 .
 La gestion de l'enfermement n'est pas complète. En conséquence, cet enfermement n'est actuellement pas possible, mais cette option pourra être activée dans un futur proche.
";
$elem["mldonkey-server/mldonkey_dir"]["default"]="/var/lib/mldonkey";
$elem["mldonkey-server/mldonkey_move"]["type"]="boolean";
$elem["mldonkey-server/mldonkey_move"]["description"]="Move the old configuration?
 You have changed the mldonkey directory. You can move the old files to this new
 directory.
 .
 If you choose no, the old directory won't be deleted. You will have to do it
 yourself.
";
$elem["mldonkey-server/mldonkey_move"]["descriptionde"]="Verschieben der alten Konfiguration?
 Sie haben das MLDonkey-Verzeichnis geändert. Sie können die alten Dateien in das neue Verzeichnis verschieben.
 .
 Falls Sie »Nein« wählen, wird das alte Verzeichnis nicht gelöscht. Sie werden dies selbst tun müssen.
";
$elem["mldonkey-server/mldonkey_move"]["descriptionfr"]="Faut-il déplacer l'ancienne configuration ?
 Vous avez changé le répertoire de MLDonkey. Vous pouvez déplacer les anciens fichiers vers le nouveau répertoire.
 .
 Si les données ne sont pas déplacées, l'ancien répertoire ne sera pas détruit. Vous devrez le faire vous-même.
";
$elem["mldonkey-server/mldonkey_move"]["default"]="false";
$elem["mldonkey-server/mldonkey_niceness"]["type"]="string";
$elem["mldonkey-server/mldonkey_niceness"]["description"]="Niceness of MLDonkey:
 MLDonkey uses heavy calculation from time to time (like hashing very big
 files). It should be a good idea to set a very kind level of niceness,
 depending on what ressources you want to give to MLDonkey.
 .
 You can set values from -20 to 20. The bigger the niceness, the lower the
 priority of MLDonkey processes.
";
$elem["mldonkey-server/mldonkey_niceness"]["descriptionde"]="Nice-Wert von MLDonkey:
 MLDonkey führt ab und zu sehr komplexe Berechnungen durch (wie die Berechnung der Hash-Werte für sehr große Dateien). Es ist wahrscheinlich eine gute Idee einen sehr hohen Nice-Wert einzugeben, abhängig davon welche Ressourcen Sie MLDonkey zur Verfügung stellen wollen.
 .
 Sie können Werte von -20 bis 20 verwenden. Je größer der Nice-Wert, um so niedriger ist die Priorität des MLDonkey-Prozesses.
";
$elem["mldonkey-server/mldonkey_niceness"]["descriptionfr"]="Politesse de MLDonkey :
 MLDonkey peut mobiliser beaucoup de ressources de temps en temps (p. ex. lors du calcul des empreintes de certains gros fichiers). Il est recommandé de régler la priorité de MLDonkey avec une valeur de politesse (« nice »), en fonction des ressources que vous souhaitez allouer au service.
 .
 Les valeurs possibles sont comprises entre -20 et +20. Plus la politesse est grande, moins le processus MLDonkey est prioritaire.
";
$elem["mldonkey-server/mldonkey_niceness"]["default"]="0";
$elem["mldonkey-server/max_hard_download_rate"]["type"]="string";
$elem["mldonkey-server/max_hard_download_rate"]["description"]="Maximal download speed (kB/s):
 Set the maximal download rate. It can be useful to limit this rate, in order to
 always have a minimal bandwidth for other internet applications.
 .
 It has also been noticed that a full use of the bandwidth could cause problems
 with DSL connection handling. This is not a rule, it is just based on a few
 experiments.
 .
 0 means no limit.
";
$elem["mldonkey-server/max_hard_download_rate"]["descriptionde"]="Maximale Download-Geschwindigkeit (kB/s):
 Bestimmen Sie die maximale Download-Rate. Es kann sinnvoll sein diese Geschwindigkeit zu begrenzen, um immer eine minimale Bandbreite für andere Internet-Anwendungen zur Verfügung zu haben.
 .
 Es ist außerdem aufgefallen, dass das Nutzen der gesamten Bandbreite Probleme mit DSL-Verbindungen hervorrufen kann. Dies ist keine Regel, es basiert lediglich auf ein paar Experimenten.
 .
 0 bedeutet kein Limit.
";
$elem["mldonkey-server/max_hard_download_rate"]["descriptionfr"]="Vitesse maximale de téléchargement (ko/s) :
 Veuillez choisir la vitesse maximale de téléchargement. Il peut être utile de la limiter, afin de vous réserver une bande passante minimale pour d'autres applications Internet.
 .
 Une utilisation maximale de la bande passante peut poser des problèmes de connexion avec l'ADSL. C'est juste une constatation et non une règle.
 .
 Une valeur nulle indique que la vitesse n'est pas limitée.
";
$elem["mldonkey-server/max_hard_download_rate"]["default"]="0";
$elem["mldonkey-server/max_hard_upload_rate"]["type"]="string";
$elem["mldonkey-server/max_hard_upload_rate"]["description"]="Maximal upload speed (kB/s):
 Set the maximal upload rate. You must keep in mind that a peer-to-peer
 network is based on sharing. Do not use a very low rate.
 .
 Some networks calculate the download credit by the upload rate. More
 upload speed means more download speed.
 .
 As for the download speed, you should limit this rate so that you
 can still use the internet even when MLDonkey is running.
 .
 0 means no limit.
";
$elem["mldonkey-server/max_hard_upload_rate"]["descriptionde"]="Maximale Upload-Geschwindigkeit (kB/s):
 Bestimmen Sie die maximale Upload-Rate. Bitte denken Sie daran, dass ein Peer-to-Peer-Netzwerk vom Tauschen lebt. Benutzen Sie keine sehr niedrige Geschwindigkeit.
 .
 Einige Netzwerke berechnen die Bonuspunkte für den Download über die Upload-Geschwindigkeit. Höhere Upload-Geschwindigkeit bedeutet höhere Download-Geschwindigkeit.
 .
 Wie die Download-Geschwindigkeit sollten Sie die Upload-Geschwindigkeit begrenzen, damit Sie das Internet nutzen können, selbst wenn MLDonkey läuft.
 .
 0 bedeutet kein Limit.
";
$elem["mldonkey-server/max_hard_upload_rate"]["descriptionfr"]="Vitesse maximale d'envoi (ko/s) :
 Veuillez choisir la vitesse maximale d'envoi (« upload »). Souvenez-vous que les réseaux pair-à-pair sont basés sur le partage. Essayez de ne pas choisir une valeur trop basse.
 .
 Certains réseaux pair-à-pair calculent votre crédit de téléchargement avec la vitesse d'envoi. Plus la vitesse d'envoi est élevée, plus la vitesse de téléchargement l'est.
 .
 Comme pour la vitesse de téléchargement, vous devriez limiter cette vitesse pour vous permettre d'utiliser Internet même si MLDonkey est actif.
 .
 Une valeur nulle indique que la vitesse n'est pas limitée.
";
$elem["mldonkey-server/max_hard_upload_rate"]["default"]="0";
$elem["mldonkey-server/password"]["type"]="password";
$elem["mldonkey-server/password"]["description"]="Password of admin user:
 As of version 2.04rc1, a new user management appears. The password is encrypted
 and stored in downloads.ini.
 .
 If you want to add a new user for MLDonkeys user management or want to change
 the password, refer to /usr/share/doc/mldonkey-server/README.Debian.
";
$elem["mldonkey-server/password"]["descriptionde"]="Passwort des Benutzers mit Administratorrechten:
 Seit Version 2.04rc1 existiert eine neue Benutzerverwaltung. Das Passwort ist verschlüsselt und wird in der Datei downloads.ini gespeichert.
 .
 Wenn Sie einen Benutzer zur Benutzerverwaltung von MLDonkey hinzufügen oder das Passwort verändern möchten, lesen Sie /usr/share/doc/mldonkey-server/README.Debian.
";
$elem["mldonkey-server/password"]["descriptionfr"]="Mot de passe de l'utilisateur d'administration :
 Depuis la version 2.04rc1, une politique de gestion des utilisateurs a été mise en place. Les mots de passe sont chiffrés dans le fichier downloads.ini.
 .
 Si vous souhaitez ajouter un utilisateur pour MLDonkey ou changer de mot de passe, veuillez consulter le fichier /usr/share/doc/mldonkey-server/README.Debian.
";
$elem["mldonkey-server/password"]["default"]="";
$elem["mldonkey-server/repassword"]["type"]="password";
$elem["mldonkey-server/repassword"]["description"]="Retype password of the admin user:
 Please confirm your admin's password.
";
$elem["mldonkey-server/repassword"]["descriptionde"]="Bitte wiederholen Sie das Passwort des Benutzers mit Administratorrechten:
 Bitte bestätigen Sie das Passwort des Benutzers mit Administratorrechten.
";
$elem["mldonkey-server/repassword"]["descriptionfr"]="Confirmation du mot de passe de l'utilisateur d'administration :
 Veuillez confirmer le mot de passe de l'administrateur.
";
$elem["mldonkey-server/repassword"]["default"]="";
$elem["mldonkey-server/false_password"]["type"]="note";
$elem["mldonkey-server/false_password"]["description"]="Passwords do not match
 The two password you enter must be the same.
 .
 You will be asked until you can provide the same password twice.
";
$elem["mldonkey-server/false_password"]["descriptionde"]="Die Passwörter stimmen nicht überein.
 Die beiden eingegebenen Passwörter müssen identisch sein.
 .
 Sie werden so oft gefragt werden, bis Sie zweimal das gleiche Passwort eingegeben haben.
";
$elem["mldonkey-server/false_password"]["descriptionfr"]="Les mots de passe ne correspondent pas
 Les deux mots de passe que vous avez indiqués sont différents.
 .
 Le même mot de passe doit être entré deux fois.
";
$elem["mldonkey-server/false_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
