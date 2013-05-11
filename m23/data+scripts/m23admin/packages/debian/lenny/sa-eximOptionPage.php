<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sa-exim");

$elem["sa-exim/purge_spool"]["type"]="boolean";
$elem["sa-exim/purge_spool"]["description"]="Remove saved mails in spool directory?
 There are some saved mails in subdirectories of /var/spool/sa-exim.
 Depending on the configuration sa-exim will save mails matching specific
 criterias (an error occured, rejected as spam, passed through although
 recognized as spam, ...) in subdirectories of /var/spool/sa-exim.
 .
 You can keep them for further analysis and later remove them manually or
 decide to delete them now.
";
$elem["sa-exim/purge_spool"]["descriptionde"]="Gespeicherte E-Mails in Spool-Verzeichnis löschen?
 Es befinden sich einige gespeicherte E-Mails in Unterverzeichnissen von /var/spool/sa-exim. Abhängig von der Konfiguration wird sa-exim E-Mails, die bestimmte Kriterien erfüllen (ein Fehler ereignete sich, als Spam abgewiesen, durchgelassen obwohl als Spam erkannt, ...), in Unterverzeichnissen von /var/spool/sa-exim speichern.
 .
 Sie können diese zur späteren Analyse aufbewahren und später löschen, oder Sie entscheiden, sie jetzt zu löschen.
";
$elem["sa-exim/purge_spool"]["descriptionfr"]="Faut-il supprimer les courriers du répertoire de dépôt ? 
 Il y a plusieurs courriers sauvegardés dans les sous-répertoires de /var/spool/sa-exim. Selon la configuration, sa-exim sauvegarde les courriers qui correspondent à des critères spécifiques (p. ex. une erreur est survenue, rejeté comme spam, passé à travers, reconnu comme spam ...) dans des sous-répertoires de /var/spool/sa-exim.
 .
 Vous pouvez les garder pour des analyses approfondies et les supprimer par la suite ou vous pouvez décider de les effacer maintenant.
";
$elem["sa-exim/purge_spool"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
