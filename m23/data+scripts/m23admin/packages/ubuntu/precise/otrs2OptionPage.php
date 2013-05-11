<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("otrs2");

$elem["otrs2/resetdbuser"]["type"]="boolean";
$elem["otrs2/resetdbuser"]["description"]="Should the database user name be reset to otrs?
 You have configured ident authentication, which is recommended, together
 with a database username that is not the default 'otrs'. That will only
 work with special hand crafted PostgreSQL setups. It is recommended to
 reset the username to 'otrs'. If you do not choose this option and the
 installation fails you should consult the file
 /usr/share/doc/otrs2/README.Debian.
";
$elem["otrs2/resetdbuser"]["descriptionde"]="Soll der Benutzername für die Datenbank auf otrs zurückgesetzt werden?
 Sie haben die empfohlene Methode 'ident authentication' gewählt zusammen mit einem Datenbankbenutzernamen, der nicht 'otrs' lautet. Das funktioniert nur mit einer sehr speziellen PostgreSQL-Konfiguration. Es ist besser, den Nutzernamen auf 'otrs' zurückzusetzen. Wenn Sie diese Option nicht wählen und die Installation fehlschlägt, dann finden Sie weitere Hinweise in der Datei /usr/share/doc/otrs2/README.Debian.
";
$elem["otrs2/resetdbuser"]["descriptionfr"]="Faut-il rétablir l'identifiant du propriétaire de la base de données à « otrs » ?
 L'authentification par ident est configurée, ce qui est recommandé. Cependant, l'identifiant du propriétaire de la base de données est différent de la valeur par défaut (« otrs »). Cette configuration ne peut fonctionner qu'avec des installations personnalisées de PostgreSQL. L'identifiant du propriétaire de la base de données devrait être remplacé par « otrs ». Si vous n'acceptez pas cette option et que l'installation échoue, veuillez consulter le fichier /usr/share/doc/otrs2/README.Debian.
";
$elem["otrs2/resetdbuser"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
