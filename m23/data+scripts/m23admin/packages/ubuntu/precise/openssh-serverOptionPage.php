<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openssh-server");

$elem["ssh/use_old_init_script"]["type"]="boolean";
$elem["ssh/use_old_init_script"]["description"]="Do you want to risk killing active SSH sessions?
 The currently installed version of /etc/init.d/ssh is likely to kill
 all running sshd instances. If you are doing this upgrade via an SSH
 session, you're likely to be disconnected and leave the upgrade
 procedure unfinished.
 .
 This can be fixed by manually adding \"--pidfile /var/run/sshd.pid\" to
 the start-stop-daemon line in the stop section of the file.
";
$elem["ssh/use_old_init_script"]["descriptionde"]="Wollen Sie das Beenden aktiver SSH-Sitzungen riskieren?
 Die derzeit installierte Version von /etc/init.d/ssh wird vermutlich Ihre aktiven ssh-Instanzen beenden. Falls Sie dieses Upgrade über eine SSH-Sitzung durchführen, dann wird die Verbindung wahrscheinlich getrennt und der Upgrade-Vorgang nicht beendet.
 .
 Dieses Problem kann behoben werden, indem »--pidfile /var/run/sshd.pid« an die start-stop-daemon-Zeile in dem Abschnitt »stop« der Datei /etc/init.d/ssh manuell hinzugefügt wird.
";
$elem["ssh/use_old_init_script"]["descriptionfr"]="Voulez-vous risquer de rompre les sessions SSH actives ?
 La version de /etc/init.d/ssh actuellement installée va vraisemblablement interrompre toutes les instances de sshd en cours. Si vous êtes en train de faire cette mise à niveau à l'aide de SSH, la connexion sera probablement coupée et la mise à jour sera interrompue.
 .
 Cela peut être corrigé en ajoutant « --pidfile /var/run/sshd.pid » à la ligne « start-stop-daemon » dans /etc/init.d/ssh, dans la section « stop » du fichier.
";
$elem["ssh/use_old_init_script"]["default"]="false";
$elem["ssh/encrypted_host_key_but_no_keygen"]["type"]="note";
$elem["ssh/encrypted_host_key_but_no_keygen"]["description"]="New host key mandatory
 The current host key, in /etc/ssh/ssh_host_key, is encrypted with the
 IDEA algorithm. OpenSSH can not handle this host key file, and the
 ssh-keygen utility from the old (non-free) SSH installation does not
 appear to be available.
 .
 You need to manually generate a new host key.
";
$elem["ssh/encrypted_host_key_but_no_keygen"]["descriptionde"]="Neuer Host-Schlüssel verpflichtend
 Der aktuelle Host-Schlüssel in /etc/ssh/ssh_host_key ist mit dem IDEA-Algorithmus verschlüsselt. OpenSSH kann diese Host-Schlüssel-Datei nicht verarbeiten und das ssh-keygen-Hilfswerkzeug von der alten (nicht-freien) SSH-Installation scheint nicht verfügbar zu sein.
 .
 Sie müssen manuell einen neuen Host-Schlüssel erzeugen.
";
$elem["ssh/encrypted_host_key_but_no_keygen"]["descriptionfr"]="Nouvelle clé d'hôte obligatoire
 La clé d'hôte actuelle, /etc/ssh/ssh_host_key, est chiffrée avec IDEA. OpenSSH ne peut utiliser ce fichier de clé, et l'utilitaire ssh-keygen de l'installation précédente (non libre) de SSH n'a pas été trouvé.
 .
 Vous devez générer une nouvelle clé d'hôte vous-même.
";
$elem["ssh/encrypted_host_key_but_no_keygen"]["default"]="";
$elem["ssh/disable_cr_auth"]["type"]="boolean";
$elem["ssh/disable_cr_auth"]["description"]="Disable challenge-response authentication?
 Password authentication appears to be disabled in the current OpenSSH
 server configuration. In order to prevent users from logging in using
 passwords (perhaps using only public key authentication instead) with
 recent versions of OpenSSH, you must disable challenge-response
 authentication, or else ensure that your PAM configuration does not allow
 Unix password file authentication.
 .
 If you disable challenge-response authentication, then users will not be
 able to log in using passwords. If you leave it enabled (the default
 answer), then the 'PasswordAuthentication no' option will have no useful
 effect unless you also adjust your PAM configuration in /etc/pam.d/ssh.
";
$elem["ssh/disable_cr_auth"]["descriptionde"]="Challenge-response-Authentifizierung deaktivieren?
 Passwort-Authentifizierung scheint in der aktuellen OpenSSH-Server-Konfiguration deaktiviert zu sein. Um in neueren Versionen von OpenSSH zu verhindern, dass Benutzer sich unter Verwendung von Passwörtern anmelden (möglicherweise stattdessen nur unter Verwendung von Public-Key-Authentifizierung), müssen Sie Challenge-response-Authentifizierung deaktivieren oder ansonsten sicherstellen, dass Ihre PAM-Konfiguration keine Authentifizierung über Unix-Password-Dateien erlaubt.
 .
 Falls Sie Challenge-response-Authentifizierung deaktivieren, werden Benutzer nicht in der Lage sein, sich mit Passwörtern anzumelden. Falls Sie es aktiviert lassen (die Standard-Antwort) wird die »PasswordAuthentication no«-Einstellung keinen nützlichen Effekt haben, es sei denn, sie passen auch Ihre PAM-Konfiguration in /etc/pam.d/ssh an.
";
$elem["ssh/disable_cr_auth"]["descriptionfr"]="Faut-il désactiver l'authentification par défi-réponse ?
 L'authentification par mots de passe semble être désactivée dans la configuration actuelle du serveur OpenSSH. Afin d'empêcher les utilisateurs de se connecter avec un mot de passe (pour, par exemple n'autoriser que l'authentification par clé publique) avec les versions récentes d'OpenSSH, vous devez aussi désactiver l'authentification par défi-réponse, ou alors vous assurer que votre configuration de PAM n'autorise pas l'authentification avec le fichier de mots de passe Unix.
 .
 Si vous désactivez l'authentification par défi-réponse, alors les utilisateurs ne pourront pas se connecter en entrant un mot de passe. Si vous la laissez active (ce qui est la valeur par défaut), alors l'option « PasswordAuthentication no » n'aura d'effet que si vous ajustez aussi la configuration de PAM dans /etc/pam.d/ssh.
";
$elem["ssh/disable_cr_auth"]["default"]="false";
$elem["ssh/vulnerable_host_keys"]["type"]="note";
$elem["ssh/vulnerable_host_keys"]["description"]="Vulnerable host keys will be regenerated
 Some of the OpenSSH server host keys on this system were generated with a
 version of OpenSSL that had a broken random number generator. As a result,
 these host keys are from a well-known set, are subject to brute-force
 attacks, and must be regenerated.
 .
 Users of this system should be informed of this change, as they will be
 prompted about the host key change the next time they log in. Use
 'ssh-keygen -l -f HOST_KEY_FILE' after the upgrade to print the
 fingerprints of the new host keys.
 .
 The affected host keys are:
 .
 ${HOST_KEYS}
 .
 User keys may also be affected by this problem. The 'ssh-vulnkey' command
 may be used as a partial test for this. See
 /usr/share/doc/openssh-server/README.compromised-keys.gz for more details.
";
$elem["ssh/vulnerable_host_keys"]["descriptionde"]="Verwundbare Host-Schlüssel werden neu erzeugt
 Einige der OpenSSH-Server-Host-Schlüssel auf diesem System wurden mit einer Version von OpenSSL erzeugt, die einen defekten Zufallszahlengenerator hatte. Als Ergebnis stammen diese Host-Schlüssel aus einer wohlbekannten Menge, unterliegen Rechen- (»brute-force«)-angriffen und müssen neu erstellt werden.
 .
 Die Benutzer dieses Systems sollten über diese Änderung informiert werden, da sie über die Änderung des Host-Schlüssels bei der nächsten Anmeldung befragt werden. Führen Sie nach dem Upgrade »ssh-keygen -l -f HOST_SCHLÜSSEL_DATEI« aus, um die Fingerabdrücke es neuen Host-Schlüssels anzuzeigen.
 .
 Die betroffenen Host-Schlüssel sind:
 .
 ${HOST_KEYS}
 .
 Die Schüssel der Benutzer könnten auch von diesem Problem betroffen sein. Der Befehl »ssh-vulnkey« kann dazu verwandt werden, dieses Problem teilweise zu ermitteln. Lesen Sie /usr/share/doc/openssh-server/README.compromised-keys.gz für weitere Details.
";
$elem["ssh/vulnerable_host_keys"]["descriptionfr"]="Recréation des clés d'hôte vulnérables
 Certaines clés d'hôte OpenSSH de ce serveur ont été créées avec une version d'OpenSSL affligée d'un défaut dans le générateur de nombres aléatoires. En conséquence, ces clés ont un contenu prévisible et peuvent être vulnérables à des attaques par force brute. Elles doivent être recréées.
 .
 Les utilisateurs de ce système devraient être informés de cette modification car le système leur signalera le changement de clé d'hôte à leur prochaine connexion. Vous pouvez utiliser la commande « ssh-keygen -l -f HOST_KEY_FILE » après la mise à jour pour afficher l'empreinte des nouvelles clés d'hôte.
 .
 Les clés concernées sont les suivantes :
 .
 ${HOST_KEYS}
 .
 Les clés OpenSSH des utilisateurs sont aussi potentiellement affectées par ce problème. La commande « ssh-vulnkey » offre un test partiel pour cette vulnérabilité. Veuillez consulter le fichier /usr/share/doc/openssh-server/README.compromised-keys.gz pour plus d'informations.
";
$elem["ssh/vulnerable_host_keys"]["default"]="";
PKG_OptionPageTail2($elem);
?>
