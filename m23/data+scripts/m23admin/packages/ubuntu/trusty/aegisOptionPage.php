<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("aegis");

$elem["aegis/var_lib_aegis_not_local"]["type"]="note";
$elem["aegis/var_lib_aegis_not_local"]["description"]="/var/lib/aegis not on a local drive
 Aegis requires that /var/lib/aegis be owned by sys.sys and be set-gid, and
 group writable.
 .
 Your /var/lib/aegis is on a remote partition, most likely an NFS server.
 This could cause the postinst to fail, since the script may not have
 permission to change the owner/permissions of the directory on the remote
 server.
 .
 If this happens, change the permissions on the NFS server, or ask the
 server administrator to do it for you.
";
$elem["aegis/var_lib_aegis_not_local"]["descriptionde"]="/var/lib/aegis ist nicht auf einem lokalen Laufwerk
 Aegis erfordert, dass /var/lib/aegis dem Benutzer »sys« und der Gruppe »sys« gehört, das Set-Gid-Bit gesetzt und für die Gruppe schreibbar ist.
 .
 Ihr Verzeichnis /var/lib/aegis ist auf einem entfernten Laufwerk, sehr wahrscheinlich auf einem NFS-Server. Dadurch könnte das Postinst-Skript fehlschlagen, wenn Sie nicht dazu berechtigt sind, den Besitzer und die Zugriffsrechte des Verzeichnisses auf dem entfernten Server zu ändern.
 .
 Falls das passiert, ändern Sie die Zugriffsrechte auf dem NFS-Server oder fragen Sie den Administrator des Servers, dies für Sie zu tun.
";
$elem["aegis/var_lib_aegis_not_local"]["descriptionfr"]="/var/lib/aegis pas sur un disque local
 Il est indispensable que le répertoire /var/lib/aegis soit la propriété de sys.sys, que le bit « setgid » soit positionné et que le groupe propriétaire puisse y écrire.
 .
 Le répertoire /var/lib/aegis est situé sur une partition distante, très probablement un serveur NFS. Cela peut faire échouer le script de post-installation car il risque de ne pas avoir les droits nécessaires pour modifier les permissions ou le propriétaire du répertoire sur le serveur distant.
 .
 Si cela se produit, veuillez modifier les permissions sur le serveur NFS ou demander à son administrateur de faire cette modification pour vous.
";
$elem["aegis/var_lib_aegis_not_local"]["default"]="";
$elem["aegis/var_lib_not_local"]["type"]="note";
$elem["aegis/var_lib_not_local"]["description"]="/var/lib not on a local drive
 Aegis requires that /var/lib/aegis be owned by sys.sys and be set-gid, and
 group writable.
 .
 Your /var/lib is on a remote partition, most likely an NFS server. This
 could cause the postinst to fail, since the script may not have permission to
 change the owner/permissions of the directory on the remote server.
 .
 If this happens, change the permissions on the NFS server, or ask the
 server administrator to do it for you.
";
$elem["aegis/var_lib_not_local"]["descriptionde"]="/var/lib ist nicht auf einem lokalen Laufwerk
 Aegis erfordert, dass /var/lib/aegis dem Benutzer »sys« und der Gruppe »sys« gehört, das Set-Gid-Bit gesetzt und für die Gruppe schreibbar ist.
 .
 Ihr Verzeichnis /var/lib ist auf einem entfernten Laufwerk, sehr wahrscheinlich auf einem NFS-Server. Dadurch könnte das Postinst-Skript fehlschlagen, wenn Sie nicht dazu berechtigt sind, den Besitzer und die Zugriffsrechte des Verzeichnisses auf dem entfernten Server zu ändern.
 .
 Falls das passiert, ändern Sie die Zugriffsrechte auf dem NFS-Server oder fragen Sie den Administrator des Servers, dies für Sie zu tun.
";
$elem["aegis/var_lib_not_local"]["descriptionfr"]="/var/lib pas sur un disque local
 Il est indispensable que le répertoire /var/lib/aegis soit la propriété de sys.sys, que le bit « setgid » soit positionné et que le groupe propriétaire puisse y écrire.
 .
 Le répertoire /var/lib est situé sur une partition distante, très probablement un serveur NFS. Cela peut faire échouer le script de post-installation car il risque de ne pas avoir les droits nécessaires pour modifier les permissions ou le propriétaire du répertoire sur le serveur distant.
 .
 Si cela se produit, veuillez modifier les permissions sur le serveur NFS ou demander à son administrateur de faire cette modification pour vous.
";
$elem["aegis/var_lib_not_local"]["default"]="";
PKG_OptionPageTail2($elem);
?>
