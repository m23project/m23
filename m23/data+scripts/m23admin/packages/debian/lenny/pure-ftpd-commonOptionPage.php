<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pure-ftpd-common");

$elem["pure-ftpd/standalone-or-inetd"]["type"]="select";
$elem["pure-ftpd/standalone-or-inetd"]["choices"][1]="inetd";
$elem["pure-ftpd/standalone-or-inetd"]["choicesde"][1]="inetd";
$elem["pure-ftpd/standalone-or-inetd"]["choicesfr"][1]="Inetd";
$elem["pure-ftpd/standalone-or-inetd"]["description"]="Run pure-ftpd from inetd or as a standalone server:
 Pure-ftpd can be run from inetd or as a standalone daemon. Using inetd is
 a suitable option for small ftp servers because the inetd super-server
 will only launch pure-ftpd to handle incoming connections. Standalone
 operation is more efficient for busy ftp sites.
 .
 Keep in mind that a few options only work in standalone mode, such as
 limiting connections per-IP and binding the server to a specific IP
 address.
";
$elem["pure-ftpd/standalone-or-inetd"]["descriptionde"]="Pure-ftpd über inetd oder als eigenen Daemon starten:
 Pure-ftpd kann über inetd oder als eigener Daemon gestartet werden. Die Verwendung von inetd ist für kleinere FTP-Server geeignet, da der Super-Server inetd nur dann pure-ftpd starten wird, wenn auch Anfragen für pure-ftpd vorliegen. Ein eigener Daemon hingegen arbeitet bei stark ausgelasteten FTP-Sites effizienter.
 .
 Beachten Sie bitte, dass einige Optionen nur mit einem Daemon funktionieren. Dazu zählt u.a. die Verbindungs-Begrenzung auf IP-Basis oder das Binden des Servers an eine bestimmte IP-Adresse.
";
$elem["pure-ftpd/standalone-or-inetd"]["descriptionfr"]="Méthode de lancement de pure-ftpd :
 Pure-ftpd peut être lancé depuis inetd ou comme un démon autonome. Inetd est un choix adapté pour les petits serveurs FTP car le superserveur inetd lancera pure-ftpd uniquement pour traiter les connexions entrantes. Le mode autonome est plus efficace pour les sites FTP fortement chargés.
 .
 Gardez à l'esprit que quelques options ne fonctionnent qu'en mode autonome, comme la limitation des connexions selon l'IP et l'attachement du serveur à une adresse IP spécifique.
";
$elem["pure-ftpd/standalone-or-inetd"]["default"]="inetd";
$elem["pure-ftpd/ftpwho-setuid"]["type"]="boolean";
$elem["pure-ftpd/ftpwho-setuid"]["description"]="Do you want pure-ftpwho to be installed setuid root?
 The pure-ftpwho program only works with root privileges. Since it's a
 fairly trivial program, this poses little security risk. Still, it is only
 recommended that you install any program setuid root if you need it.
 .
 You can always change your mind later by reconfiguring this package with
 \"dpkg-reconfigure pure-ftpd-common\".
";
$elem["pure-ftpd/ftpwho-setuid"]["descriptionde"]="Möchten Sie, dass pure-ftpwho setuid-root installiert wird?
 Das Programm pure-ftpwho funktioniert nur mit root-Rechten. Da es sich dabei um ein ziemlich einfaches Programm handelt, stellt das ein geringes Sicherheitsrisiko dar. Dennoch wird empfohlen, ein Programm nur dann setuid-root zu installieren, wenn Sie dies auch wirklich benötigen.
 .
 Sollten Sie Ihre Meinung später ändern, können Sie das Paket mit »dpkg-reconfigure pure-ftpd-common« neu konfigurieren.
";
$elem["pure-ftpd/ftpwho-setuid"]["descriptionfr"]="Pure-ftpwho doit-il s'exécuter avec les droits du superutilisateur ?
 Le programme pure-ftpwho ne fonctionne qu'avec les droits du superutilisateur. Comme il s'agit d'un programme sans originalité, cela ne pose guère de problème de sécurité. Néanmoins, il est toujours recommandé de n'installer des programmes « setuid root » que si vous en avez besoin.
 .
 Vous pouvez toujours changer d'avis plus tard et reconfigurer ce paquet avec « dpkg-reconfigure pure-ftpd-common ».
";
$elem["pure-ftpd/ftpwho-setuid"]["default"]="false";
$elem["pure-ftpd/config-obsolete-note"]["type"]="note";
$elem["pure-ftpd/config-obsolete-note"]["description"]="Your installation uses an obsolete configuration method
 Older versions of the pure-ftpd debian package used command-line options
 specified in /etc/default/pure-ftpd. This has been changed because there
 was no easy way to use these options when the daemon was spawned from
 inetd.
 .
 Pure-ftpd now uses the /etc/pure-ftpd.conf file (via pure-config.pl) for
 configuration in either standalone or inetd mode. You should check that
 any customization you've made in the /etc/default/pure-ftpd OPTIONS are
 reflected in /etc/pure-ftpd.conf, as it is not possible for the moment
 to use a way to do this automatically that would work for all cases.
 You can then delete the unused OPTIONS line to avoid seeing this message
 in the future.
";
$elem["pure-ftpd/config-obsolete-note"]["descriptionde"]="Ihre Installation verwendet eine veraltete Konfigurationsmethode
 Ältere Versionen des Debian-Paketes pure-ftpd verwendeten Kommandozeilen-Optionen, die in /etc/default/pure-ftpd niedergeschrieben waren. Das wurde nun geändert, da es keine einfache Möglichkeit gab, diese Optionen zu verwenden, wenn pure-ftpd von inetd gestartet wurde.
 .
 Pure-ftpd verwendet nun sowohl im Daemon- als auch im inetd-Modus die Datei /etc/pure-ftpd.conf (mittels pure-config.pl) zur Konfiguration. Sie sollten überprüfen, ob alle Veränderungen, die Sie an der OPTIONS-Variable in /etc/default/pure-ftpd vorgenommen haben, nun auch in /etc/pure-ftpd.conf vorkommen. Leider gibt es zurzeit keine automatische Anpassung, die in allen Fällen funktionieren würde. Nach der manuellen Anpassung können Sie die OPTIONS-Zeile löschen, um zu verhindern, dass Sie diese Nachricht in Zukunft erneut sehen.
";
$elem["pure-ftpd/config-obsolete-note"]["descriptionfr"]="Méthode de configuration obsolète
 Les anciennes versions du paquet Debian pure-ftpd utilisaient des options en ligne de commande spécifiées dans /etc/default/pure-ftpd. Ceci a été changé car il n'y avait aucune manière simple d'utiliser ces options lorsque le démon était lancé par inetd.
 .
 Pure-ftpd utilise dorénavant le fichier /etc/pure-ftpd.conf (via pure-config.pl) pour configurer aussi bien le mode autonome que le mode inetd. Vous devriez vérifier que toutes les modifications que vous avez effectuées dans /etc/default/pure-ftpd OPTIONS sont bien présentes dans /etc/pure-ftpd.conf puisqu'il est pour l'instant impossible d'utiliser une méthode qui fonctionnerait dans tous les cas pour faire ceci automatiquement. Vous pouvez ensuite supprimer la ligne OPTIONS pour éviter l'apparition de ce message à l'avenir.
";
$elem["pure-ftpd/config-obsolete-note"]["default"]="";
$elem["pure-ftpd/saved-inetd-config"]["type"]="note";
$elem["pure-ftpd/saved-inetd-config"]["description"]="Your old pure-ftpd configuration from inetd.conf has been saved
 You are upgrading an old version of the pure-ftpd debian package that
 caused any configuration that was in /etc/inetd.conf to be lost.  Your old
 configuration has been saved in /etc/inetd.conf-pureftpd.
";
$elem["pure-ftpd/saved-inetd-config"]["descriptionde"]="Ihre alte »pure-ftpd«-Konfiguration aus der inetd.conf wurde gespeichert.
 Sie aktualisieren eine ältere Version des Debian-Paketes pure-ftpd, die dafür verantwortlich war, dass alle Einstellungen in der /etc/inetd.conf verloren gingen. Ihre alten Einstellungen wurden in /etc/inetd.conf-pureftpd gespeichert.
";
$elem["pure-ftpd/saved-inetd-config"]["descriptionfr"]="Sauvegarde de l'ancienne configuration de pure-ftpd à partir d'inetd.conf
 Vous mettez à jour une ancienne version du paquet Debian pure-ftpd ayant provoqué la perte de la configuration contenue dans /etc/inetd.conf. Votre ancienne configuration a été sauvegardée dans /etc/inetd.conf-pureftpd.
";
$elem["pure-ftpd/saved-inetd-config"]["default"]="";
$elem["pure-ftpd/minuid"]["type"]="note";
$elem["pure-ftpd/minuid"]["description"]="Default MinUID value has been changed to 1000
 The default value for the -u flag stored in /etc/pure-ftpd/conf/MinUID has
 been changed from 100 to 1000 in order to comply with the Debian policy.
 This may break your Pure-FTPd setup if you are using virtual users with an
 uid below 1000.
";
$elem["pure-ftpd/minuid"]["descriptionde"]="MinUID-Standardwert wurde auf 1000 geändert
 Der Standardwert für die Option »-u«, der in /etc/pure-ftpd/conf/MinUID gespeichert wird, wurde von 100 auf 1000 geändert, um der Debian-Policy zu entsprechen. Das kann dafür sorgen, dass Ihre bisherige Pure-FTPd-Einrichtung nicht mehr korrekt funktioniert, sofern Sie virtuelle Server mit einer Benutzer-ID (uid) unter 1000 verwenden.
";
$elem["pure-ftpd/minuid"]["descriptionfr"]="Valeur par défaut MinUID établie à 1000
 La valeur par défaut destinée à l'option -u et conservée dans /etc/pure-ftpd/conf/MinUID a été changée de 100 en 1000 afin de se conformer à la charte Debian. Cela peut perturber la configuration de Pure-FTPd si vous avez des utilisateurs virtuels dont l'UID est inférieur à 1000.
";
$elem["pure-ftpd/minuid"]["default"]="";
$elem["pure-ftpd/virtualchroot"]["type"]="boolean";
$elem["pure-ftpd/virtualchroot"]["description"]="Enable virtual chroots ?
 Chrooted users are usually restricted to their home directory.
 With virtual chroots symbolic links are always followed, even if they are
 pointing to directories not located in the user's home directory. 
 This is useful for having shared directories like a symbolic link
 to /var/incoming in every home directory.
";
$elem["pure-ftpd/virtualchroot"]["descriptionde"]="Virtuelle »chroots« aktivieren?
 Benutzer innerhalb eines »chroots« haben normalerweise keinen Zugriff auf Dateien außerhalb ihres Home-Verzeichnisses. Mit virtuellen »chroots« können Benutzer symbolischen Links sogar dann folgen, wenn diese auf Verzeichnisse außerhalb des Home-Verzeichnisses des Benutzers verweisen. Das ist für gemeinsam genutzte Verzeichnisse nützlich, wie beispielsweise ein symbolischer Link aus jedem Home-Verzeichnis auf /var/incoming.
";
$elem["pure-ftpd/virtualchroot"]["descriptionfr"]="Faut-il activer les environnement fermés (« chroots ») virtuels ?
 Dans les environnements fermés d'exécution (« chroot »), les utilisateurs sont en général cantonnés dans leur répertoire personnel. Avec les environnements fermés virtuels, les liens symboliques sont toujours suivis, même s'ils pointent vers un emplacement situé en dehors du répertoire personnel de l'utilisateur. Ceci est pratique pour utiliser des répertoires partagés comme un lien symbolique vers /var/incoming dans chaque répertoire utilisateur.
";
$elem["pure-ftpd/virtualchroot"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
