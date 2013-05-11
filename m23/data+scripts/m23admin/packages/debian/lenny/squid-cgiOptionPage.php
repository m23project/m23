<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("squid-cgi");

$elem["squid/fix_lines"]["type"]="boolean";
$elem["squid/fix_lines"]["description"]="Upgrade squid.conf automatically?
 Incompatible settings have been found in the existing squid.conf file.
 .
 They will prevent Squid from starting or working correctly. 
 .
 These settings can be corrected now. Please choose whether you want
 to apply the needed changes.
";
$elem["squid/fix_lines"]["descriptionde"]="Automatisches Upgrade von squid.conf durchführen?
 In der existierenden Datei squid.conf wurden inkompatible Einstellungen gefunden.
 .
 Diese werden ein korrektes Starten und Funktionieren von Squid verhindern.
 .
 Diese Einstellungen können jetzt korrigiert werden. Bitte wählen Sie aus, ob die benötigen Änderungen jetzt durchgeführt werden sollen.
";
$elem["squid/fix_lines"]["descriptionfr"]="Faut-il automatiquement mettre à jour squid.conf ?
 Des paramètres incompatibles ont été détectés dans le fichier squid.conf actuel.
 .
 Ils empêcheront Squid de démarrer ou de fonctionner correctement.
 .
 Ces paramètres peuvent être modifiés à cette étape. Veuillez décider si vous souhaitez appliquer les changements nécessaires.
";
$elem["squid/fix_lines"]["default"]="true";
$elem["squid/fix_cachedir_perms"]["type"]="boolean";
$elem["squid/fix_cachedir_perms"]["description"]="Fix permissions of 'cache_dir'?
 The values for 'cache_effective_user' and/or 'cache_effective_group'
 in Squid's configuration file are incompatible with the owner/group of the cache
 directories.
 . 
 Please choose whether this should be fixed automatically.
 .
 However, please note that if you specified a cache directory
 different from /var/spool/squid (such as /tmp), this could affect
 any other programs using that directory.
";
$elem["squid/fix_cachedir_perms"]["descriptionde"]="Berechtigungen für »cache_dir« korrigieren?
 Die Werte für »cache_effective_user« und/oder »cache_effective_group« in der Konfigurationsdatei von Squid sind inkompatibel mit dem Eigentümer bzw. der Gruppe des Cache-Verzeichnisses.
 .
 Bitte wählen Sie aus, ob dies automatisch korrigiert werden soll.
 .
 Falls Sie ein von /var/spool/squid abweichendes Cache-Verzeichnis angegeben haben (z.B. /tmp), beachten Sie, dass dies andere Programme, die dieses Verzeichnis verwenden, beinflussen könnte.
";
$elem["squid/fix_cachedir_perms"]["descriptionfr"]="Faut-il corriger les droits de « cache_dir » ?
 Les valeurs pour « cache_effective_user » et « cache_effective_group » dans le fichier de configuration de Squid sont incompatibles avec le propriétaire et le groupe des répertoires de cache.
 .
 Veuillez confirmer si vous souhaitez régler ceci automatiquement.
 .
 Veuillez noter que si vous indiquez un répertoire de cache différent de /var/spool/squid (p. ex. /tmp), cela peut affecter les autres programmes qui utilisent ce répertoire.
";
$elem["squid/fix_cachedir_perms"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
