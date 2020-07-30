<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("s-nail");

$elem["s-nail/setgid-dotlock"]["type"]="boolean";
$elem["s-nail/setgid-dotlock"]["description"]="Should the dotlock helper be installed ‘setgid mail’?
 S-nail protects mbox files via fcntl(2) file-region locks during
 file operations in order to avoid inconsistencies due to concurrent
 modifications. By default system mbox files are also locked using
 traditional dotlock files.
 .
 On Debian system users normally lack the permissions to create files in
 the directory containing the system mailboxes (/var/mail/). In this case
 a dedicated privileged (setgid mail) dotlock helper is needed, however
 this may be a security concern.
";
$elem["s-nail/setgid-dotlock"]["descriptionde"]="Soll das Dotlock-Hilfsprogramm »setgid mail« installliert werden?
 S-nail schützt Mbox-Dateien während Dateiaktionen mittels fcntl(2)-Dateibereichssperren, um Inkonsistenzen aufgrund von parallelen Änderungen zu vermeiden. Standardmäßig werden Mbox-Dateien auch mittels traditionellen Sperrdateien gesperrt.
 .
 Auf Debian-Systemen fehlen den Benutzern die Rechte, Dateien in dem Verzeichnis, das die System-Mailboxen enthält ((/var/mail/), zu erstellen. In diesem Fall wird ein dedizierte, privilegierte (Setgid Mail) Dotlock-Hilfsprogramm benötigt, was allerdings Sicherheitsbedenken hervorrufen könnte.
";
$elem["s-nail/setgid-dotlock"]["descriptionfr"]="L'assistant dotlock doit-il être installé avec les droits du groupe mail (« setgid mail ») ?
 S-nail protège les fichiers mbox par des verrous fcntl(2) de régions de fichiers lors des opérations sur les fichiers dans le but d'éviter des incohérences causées par des modifications concomitantes. Par défaut, les fichiers mbox système sont protégés par des fichiers dotlock traditionnels.
 .
 Sur Debian, les utilisateurs n'ont d'ordinaire pas les droits pour créer des fichiers dans le répertoire contenant les boîtes aux lettres système (/var/mail/). Dans ce cas, un assistant dotlock dédié et privilégié (setgid mail) est nécessaire, cela peut cependant être une préoccupation de sécurité.
";
$elem["s-nail/setgid-dotlock"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
