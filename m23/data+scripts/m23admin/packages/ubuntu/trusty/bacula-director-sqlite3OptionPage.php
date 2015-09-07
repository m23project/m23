<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bacula-director-sqlite3");

$elem["bacula-director-sqlite3/unsafe-director-password-was-changed"]["type"]="error";
$elem["bacula-director-sqlite3/unsafe-director-password-was-changed"]["description"]="Unsafe bacula-director password changed
 This installation of Bacula was still using an unsafe password for access
 to the bacula-director service, as shipped with old versions of Bacula.
 .
 In order to secure this Bacula server, the password in bacula-dir.conf
 has been modified. You will need to change it on clients so that they can
 still access the bacula-director service.
";
$elem["bacula-director-sqlite3/unsafe-director-password-was-changed"]["descriptionde"]="Unsicheres bacula-director-Passwort geändert
 Diese Bacula-Installation nutzte noch ein unsicheres Passwort für den Zugriff auf den bacula-director-Dienst, wie dies bei alten Versionen von Bacula der Fall war.
 .
 Um diesen Bacula-Server abzusichern, wurde das Passwort in bacula-dir.conf geändert. Sie werden es auf den Clients ändern müssen, so dass diese wieder auf den bacula-director-Dienst zugreifen können.
";
$elem["bacula-director-sqlite3/unsafe-director-password-was-changed"]["descriptionfr"]="Changement forcé du mot de passe trop faible pour bacula-director
 Cette installation de Bacula utilisait encore un mot de passe trop faible pour accéder au service bacula-director. Ce mot de passe était celui qui était créé par défaut avec les anciennes versions de Bacula.
 .
 Afin de rendre le serveur Bacula plus sûr, le mot de passe défini dans bacula-dir.conf a été modifié. Il est indispensable de le modifier sur les clients afin de préserver leur accès au service bacula-director.
";
$elem["bacula-director-sqlite3/unsafe-director-password-was-changed"]["default"]="";
PKG_OptionPageTail2($elem);
?>
