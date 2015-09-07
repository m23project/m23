<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wu-ftpd");

$elem["wu-ftpd/run_mode"]["type"]="select";
$elem["wu-ftpd/run_mode"]["choices"][1]="inetd";
$elem["wu-ftpd/run_mode"]["choicesde"][1]="Inetd";
$elem["wu-ftpd/run_mode"]["choicesfr"][1]="inetd";
$elem["wu-ftpd/run_mode"]["description"]="Mode of running wu-ftpd:
 wu-ftpd can now be run as a standalone daemon instead of being called from
 inetd. This means wu-ftpd can respond slightly faster to a new connection,
 especially under high load.
";
$elem["wu-ftpd/run_mode"]["descriptionde"]="Modus, in dem Wu-ftpd laufen soll.
 Wu-ftpd kann als eigener Daemon laufen, statt von Inetd aufgerufen zu werden. Dadurch kann die Reaktionszeit von Wu-ftpd auf eine neue Verbindung etwas schneller sein, insbesondere im Fall hoher Auslastung.
";
$elem["wu-ftpd/run_mode"]["descriptionfr"]="Méthode de lancement de wu-ftpd :
 Wu-ftpd peut être lancé en tant que démon autonome plutôt qu'être appelé par inetd. Cela peut légèrement améliorer le temps de réponse aux nouvelles connexions, surtout si le serveur est fortement chargé.
";
$elem["wu-ftpd/run_mode"]["default"]="inetd";
$elem["wu-ftpd/ftpusers-symlink"]["type"]="text";
$elem["wu-ftpd/ftpusers-symlink"]["description"]="Copying ${target} to make ${ftpusers} a regular file.
 Your ${ftpusers} file is currently a symbolic link. Due to new
 restrictions in the PAM package, this is no longer allowed.
";
$elem["wu-ftpd/ftpusers-symlink"]["descriptionde"]="Kopiere ${target}, um ${ftpusers} in eine regulären Datei zu verwandeln.
 Ihre Datei ${ftpusers} ist zurzeit ein symbolischer Link. Aufgrund neuer Restriktionen im PAM-Paket ist das nicht mehr erlaubt.
";
$elem["wu-ftpd/ftpusers-symlink"]["descriptionfr"]="Copie de ${target} afin que ${ftpusers} soit un fichier régulier
 Actuellement, le fichier ${ftpusers} est un lien symbolique. En raison de nouvelles restrictions dans le paquet PAM, cette configuration ne peut plus fonctionner correctement.
";
$elem["wu-ftpd/ftpusers-symlink"]["default"]="";
$elem["wu-ftpd/update-binaries"]["type"]="boolean";
$elem["wu-ftpd/update-binaries"]["description"]="Update out-of-date binaries in ${ftphome}?
 Your binaries and libraries in ${ftphome} are out-of-date. This could
 break your anonymous FTP services.
";
$elem["wu-ftpd/update-binaries"]["descriptionde"]="Veraltete Programme in ${ftphome} aktualisieren?
 Ihre Programme und Bibliotheken in ${ftphome} sind veraltet. Dadurch können Ihre anonymen FTP-Dienste eventuell nicht mehr funktionieren.
";
$elem["wu-ftpd/update-binaries"]["descriptionfr"]="Voulez-vous mettre à jour les exécutables périmés dans ${ftphome} ?
 Les exécutables et bibliothèques dans ${ftphome} sont périmés. Cela peut perturber les services FTP anonymes.
";
$elem["wu-ftpd/update-binaries"]["default"]="";
$elem["wu-ftpd/anonymous"]["type"]="boolean";
$elem["wu-ftpd/anonymous"]["description"]="Do you want to allow anonymous ftp access?
 Anonymous FTP allows users to log in to the server using the username
 \"anonymous\" and their e-mail address as a password. This is usually used
 to give people access to public files.
 .
 If you accept here, a user called 'ftp' will be created, along with a
 home directory (which will be the root of the anonymous FTP area). The
 home directory will be populated with the binaries, libraries and
 configuration files necessary for anonymous FTP to work.
";
$elem["wu-ftpd/anonymous"]["descriptionde"]="Möchten Sie anonymen FTP-Zugang erlauben?
 Anonymes FTP erlaubt es Benutzern, sich auf dem Server mit dem Benutzernamen »anonymous« und ihrer eigenen E-Mail-Adresse als Passwort anzumelden. Das wird für gewöhnlich verwendet, um Leuten Zugriff auf öffentliche Dateien zu gewähren.
 .
 Falls Sie hier zustimmen, wird ein Benutzer namens »ftp« erstellt, zusammen mit einem Homeverzeichnis (welches das Wurzelverzeichnis des anonymen FTP-Bereichs sein wird). Das Homeverzeichnis wird mit den Programmen, Bibliotheken und Konfigurationsdateien, die für anonymes FTP notwendig sind, ausgestattet.
";
$elem["wu-ftpd/anonymous"]["descriptionfr"]="Souhaitez-vous autoriser l'accès FTP anonyme ?
 Le FTP anonyme permet aux utilisateurs de s'identifier sur le serveur en utilisant l'identifiant de connexion « anonymous » et leur adresse électronique comme mot de passe. Cette méthode permet d'offrir un accès public au le contenu du serveur.
 .
 Si vous choisissez d'activer les connexions anonymes, un utilisateur nommé « ftp » sera créé, en même temps qu'un répertoire racine (qui sera la racine de l'accès anonyme). Les exécutables, les bibliothèques et les fichiers de configuration nécessaires au bon fonctionnement du FTP anonyme seront placés dans ce répertoire racine.
";
$elem["wu-ftpd/anonymous"]["default"]="false";
$elem["wu-ftpd/homedir"]["type"]="string";
$elem["wu-ftpd/homedir"]["description"]="Location of the FTP home directory:
 This is the directory where the anonymous FTP area will be created, and
 the home directory for the \"ftp\" user. It must be an absolute path (ie: it
 must begin with a '/').
";
$elem["wu-ftpd/homedir"]["descriptionde"]="Ort (»location«) des FTP-Homeverzeichnisses:
 Das ist das Verzeichnis, wo der anonyme FTP-Bereich erstellt wird. Es wird auch das Homeverzeichnis des Benutzers »ftp« sein. Es muss als absoluter Pfad angegeben werden (d.h. es muss mit einem »/« beginnen).
";
$elem["wu-ftpd/homedir"]["descriptionfr"]="Emplacement du répertoire racine FTP :
 Veuillez indiquer le répertoire où sera créé l'espace affecté au FTP anonyme ainsi que le répertoire racine de l'utilisateur « ftp ». Ce chemin doit être absolu (c.-à-d. qu'il doit commencer par un caractère « / »).
";
$elem["wu-ftpd/homedir"]["default"]="/home/ftp";
$elem["wu-ftpd/homedir-not-absolute"]["type"]="note";
$elem["wu-ftpd/homedir-not-absolute"]["description"]="The FTP home directory you specified is not an absolute path
 The FTP home directory must be an absolute path. In other words, it must
 start with a '/', eg: \"/home/ftp\".
";
$elem["wu-ftpd/homedir-not-absolute"]["descriptionde"]="Das von Ihnen angegebene FTP-Homeverzeichnis ist kein absoluter Pfad.
 Das FTP-Homeverzeichnis muss ein absoluter Pfad sein. Anders ausgedrückt, es muss mit einem »/« beginnen, z.B. »/home/ftp«.
";
$elem["wu-ftpd/homedir-not-absolute"]["descriptionfr"]="Chemin absolu obligatoire pour le répertoire racine FTP
 Le répertoire racine FTP doit être un chemin absolu. En d'autres termes, il doit commencer par un caractère « / », par exemple « /home/ftp ».
";
$elem["wu-ftpd/homedir-not-absolute"]["default"]="";
$elem["wu-ftpd/homedir-exists"]["type"]="boolean";
$elem["wu-ftpd/homedir-exists"]["description"]="${homedir} already exists, use it?
 The FTP home directory you specified (${homedir}) already exists.
";
$elem["wu-ftpd/homedir-exists"]["descriptionde"]="${homedir} existiert bereits. Soll es verwendet werden?
 Das von Ihnen angegebene FTP-Homeverzeichnis (${homedir}) existiert bereits.
";
$elem["wu-ftpd/homedir-exists"]["descriptionfr"]="Voulez-vous utiliser ${homedir} même s'il existe déjà ?
 Le répertoire racine FTP que vous avez indiqué (${homedir}) existe déjà.
";
$elem["wu-ftpd/homedir-exists"]["default"]="false";
$elem["wu-ftpd/create-incoming"]["type"]="boolean";
$elem["wu-ftpd/create-incoming"]["description"]="Do you want to create a directory for user uploads?
 If you accept here, a directory called ${homedir}/pub/incoming (/pub/incoming
 on the FTP site) will be created and set up to be a secure place for uploading
 files.
 .
 Please look at /etc/wu-ftpd/ftpaccess and its manual page for more
 information on making /pub/incoming more secure.
";
$elem["wu-ftpd/create-incoming"]["descriptionde"]="Möchten Sie ein Verzeichnis erstellen, das Benutzer zum Hochladen von Dateien verwenden können?
 Falls Sie hier zustimmen, wird ein Verzeichnis mit dem Namen ${homedir}/pub/incoming erstellt (/pub/incoming auf der FTP-Site). Dieses Verzeichnis wird so eingerichtet, dass Dateien auf sichere Art in dieses Verzeichnis hochgeladen werden können.
 .
 Bitte schauen Sie sich /etc/wu-ftpd/ftpaccess und lesen Sie die Handbuchseite ftpaccess(5), um zu erfahren, wie /pub/incoming noch sicherer eingestellt werden kann.
";
$elem["wu-ftpd/create-incoming"]["descriptionfr"]="Souhaitez-vous créer un répertoire pour les envois des utilisateurs ?
 Si vous choisissez cette option, un répertoire nommé ${homedir}/pub/incoming (/pub/incoming sur le site FTP) sera créé et configuré pour servir d'emplacement sécurisé pour l'envoi de fichiers vers le serveur.
 .
 Veuillez consulter /etc/wu-ftpd/ftpaccess et sa page de manuel pour plus d'informations sur la façon de rendre /pub/incoming plus sûr.
";
$elem["wu-ftpd/create-incoming"]["default"]="false";
$elem["wu-ftpd/libnss"]["type"]="text";
$elem["wu-ftpd/libnss"]["description"]="libnss_files.so needs manual installation
 Anonymous FTP users will only see UID and GID numbers, instead of names,
 because the libnss_files.so library hasn't been installed.
 .
 It is not installed by default, since there is no easy way to find out
 what version needs to be installed.
 .
 If you want to install it manually, it should be placed in ${homedir}/lib
 owned by root, and with permissions of 444 (r--r--r--)
";
$elem["wu-ftpd/libnss"]["descriptionde"]="libnss_files.so muss von Hand installiert werden
 Benutzer von anonymem FTP werden statt Namen nur Benutzer-IDs (UIDs) und Gruppen-IDs (GIDs) sehen, weil die Bibliothek libnss_files.so nicht installiert wurde.
 .
 Sie wird nicht standardmäßig installiert, da es keine einfache Möglichkeit gibt herauszufinden, welche Version installiert werden muss.
 .
 Falls Sie sie von Hand installieren wollen, dann sollte sie in ${homedir}/lib gespeichert werden, mit root als Eigentümer und den Berechtigungen 444 (r--r--r--).
";
$elem["wu-ftpd/libnss"]["descriptionfr"]="Fichier libnss_files.so à installer manuellement
 Comme la bibliothèque libnss_files.so n'a pas été installée, les utilisateurs anonymes du serveur FTP ne verront que les identifiants numériques pour les utilisateurs et les groupes, au lieu des noms.
 .
 Cette bibliothèque n'est pas installée par défaut car il n'existe aucune méthode simple pour déterminer la version qu'il faut installer.
 .
 Si vous souhaitez l'installer vous-même, elle devrait être placée dans ${homedir}/lib, dont le propriétaire est le superutilisateur, et les permissions positionnées à 444 (r--r--r--).
";
$elem["wu-ftpd/libnss"]["default"]="";
$elem["wu-ftpd/ftpusers"]["type"]="boolean";
$elem["wu-ftpd/ftpusers"]["description"]="Remove anonymous entries from ${ftpusers}?
 Your ${ftpusers} file contains entries for 'ftp' and/or 'anonymous', the
 anonymous ftp usernames.
 .
 To enable access to anonymous ftp, these entries must be removed.
";
$elem["wu-ftpd/ftpusers"]["descriptionde"]="Einträge für anonymes FTP aus ${ftpusers} entfernen?
 Ihre Datei ${ftpusers} enthält Einträge für »ftp« und/oder »anonymous«, welches die Benutzernamen für anonymes FTP sind.
 .
 Um Zugriff auf anonymes FTP zu aktivieren, müssen diese Einträge entfernt werden.
";
$elem["wu-ftpd/ftpusers"]["descriptionfr"]="Voulez-vous supprimer les entrées anonymes de ${ftpusers} ?
 Le fichier ${ftpusers} contient des entrées pour « ftp » et/ou « anonymous », les noms d'utilisateurs FTP anonymes.
 .
 Pour activer l'accès FTP anonyme, ces entrées doivent être supprimées.
";
$elem["wu-ftpd/ftpusers"]["default"]="true";
$elem["wu-ftpd/home-noexist"]["type"]="boolean";
$elem["wu-ftpd/home-noexist"]["description"]="${homedir} doesn't exist, create it?
 You already have an anonymous FTP account, but the FTP home directory
 [${homedir}] does not exist!
";
$elem["wu-ftpd/home-noexist"]["descriptionde"]="${homedir} existiert nicht. Soll es erstellt werden?
 Sie haben bereits ein Benutzerkonto für anonymes FTP. Allerdings existiert das dazugehörige FTP-Homeverzeichnis [${homedir}] noch nicht.
";
$elem["wu-ftpd/home-noexist"]["descriptionfr"]="Souhaitez-vous créer le répertoire ${homedir} ?
 Un compte FTP anonyme existe déjà mais le répertoire racine FTP ${homedir} n'existe pas.
";
$elem["wu-ftpd/home-noexist"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
