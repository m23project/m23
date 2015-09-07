<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("samba");

$elem["samba/generate_smbpasswd"]["type"]="boolean";
$elem["samba/generate_smbpasswd"]["description"]="Create samba password database, /var/lib/samba/passdb.tdb?
 To be compatible with the defaults in most versions of Windows, Samba must
 be configured to use encrypted passwords.  This requires user passwords to
 be stored in a file separate from /etc/passwd.  This file can be created
 automatically, but the passwords must be added manually by running
 smbpasswd and be kept up-to-date in the future.
 .
 If you do not create it, you will have to reconfigure Samba (and probably
 your client machines) to use plaintext passwords.
 .
 See
 /usr/share/doc/samba-doc/htmldocs/Samba3-Developers-Guide/pwencrypt.html
 from the samba-doc package for more details.
";
$elem["samba/generate_smbpasswd"]["descriptionde"]="Samba-Passwort-Datenbank (/var/lib/samba/passdb.tdb) erstellen?
 Um mit den Standards in den meisten Windows-Versionen kompatibel zu sein, muss Samba konfiguriert werden, verschlüsselte Passwörter zu benutzen. Dies erfordert es, Benutzerpasswörter in einer anderen Datei als in /etc/passwd abzulegen. Diese Datei kann automatisch erstellt werden, aber die Passwörter müssen über den Befehl smbpasswd manuell eingefügt werden und in der Zukunft aktuell gehalten werden.
 .
 Wenn Sie sie nicht erstellen, müssen Sie Samba (und möglicherweise auch die Clients) neu konfigurieren, so dass diese unverschlüsselte Passwörter benutzen.
 .
 Details finden Sie in /usr/share/doc/samba-doc/htmldocs/Samba3-Developers-Guide/pwencrypt.html aus dem samba-doc-Paket.
";
$elem["samba/generate_smbpasswd"]["descriptionfr"]="Faut-il créer une base de données /var/lib/samba/passdb.tdb ?
 Pour rester compatible avec les réglages par défaut de la majorité des versions de Windows, Samba doit être configuré pour utiliser des mots de passe chiffrés. Cela impose de conserver les mots de passe dans un fichier distinct de /etc/passwd. Ce fichier peut être créé automatiquement, mais les mots de passe doivent y être ajoutés manuellement avec la commande « smbpasswd » et être tenus à jour.
 .
 Si vous ne voulez pas créer le fichier maintenant, Samba (ainsi, probablement, que les clients Windows) devra utiliser des mots de passe non chiffrés.
 .
 Veuillez consulter le fichier /usr/share/doc/samba-doc/htmldocs/ENCRYPTION.html dans le paquet samba-doc pour plus d'informations.
";
$elem["samba/generate_smbpasswd"]["default"]="false";
$elem["samba/run_mode"]["type"]="select";
$elem["samba/run_mode"]["choices"][1]="daemons";
$elem["samba/run_mode"]["choicesde"][1]="Daemon";
$elem["samba/run_mode"]["choicesfr"][1]="démons";
$elem["samba/run_mode"]["description"]="How do you want to run Samba?
 The Samba daemon smbd can run as a normal daemon or from inetd. Running as
 a daemon is the recommended approach.
";
$elem["samba/run_mode"]["descriptionde"]="Wie möchten Sie Samba starten?
 Der Samba-Prozess smbd kann als normaler Hintergrunddienst (Daemon) laufen oder über inetd gestartet werden. Ersteres wird jedoch empfohlen.
";
$elem["samba/run_mode"]["descriptionfr"]="Comment voulez-vous lancer Samba ?
 Le service de Samba smbd peut s'exécuter en tant que démon classique ou bien être lancé par inetd. Il est recommandé de l'exécuter en tant que démon.
";
$elem["samba/run_mode"]["default"]="daemons";
PKG_OptionPageTail2($elem);
?>
