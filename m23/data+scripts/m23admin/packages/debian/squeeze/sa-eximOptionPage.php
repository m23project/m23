<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sa-exim");

$elem["sa-exim/purge_spool"]["type"]="boolean";
$elem["sa-exim/purge_spool"]["description"]="Remove saved mails in sa-exim's spool directory?
 There are some saved mails in subdirectories of /var/spool/sa-exim.
 Depending on the configuration, sa-exim may save mails matching specific
 criteria (such as \"an error occurred\", \"rejected as spam\", or \"passed
 through although recognized as spam\") in these directories.
 .
 Please choose whether you want to keep these mails for further analysis
 or delete them now.
";
$elem["sa-exim/purge_spool"]["descriptionde"]="Gespeicherte E-Mails im Spool-Verzeichnis von Sa-Exim löschen?
 Es befinden sich einige gespeicherte E-Mails in Unterverzeichnissen von /var/spool/sa-exim. Abhängig von der Konfiguration kann Sa-Exim E-Mails, die bestimmte Kriterien erfüllen (wie »ein Fehler trat auf«, »als Spam abgewiesen« oder »durchgelassen, obwohl als Spam erkannt«), in diesen Unterverzeichnissen speichern.
 .
 Bitte wählen Sie, ob Sie diese E-Mails zur späteren Analyse behalten oder jetzt löschen möchten.
";
$elem["sa-exim/purge_spool"]["descriptionfr"]="Supprimer les courriers sauvegardés du répertoire d'attente (« spool ») de sa-exim ?
 Plusieurs courriers sauvegardés existent dans les sous-répertoires de /var/spool/sa-exim. Selon la configuration, sa-exim sauvegarde les courriers qui correspondent à des critères spécifiques (p. ex. « an error occurred » -une erreur est survenue-, « rejected as spam » - rejeté comme spam -, « passed through although recognized as spam » - passé à travers, reconnu comme spam -) dans ces répertoires.
 .
 Veuillez choisir si vous souhaitez conserver ces courriers pour analyse ultérieure ou si vous préférez les supprimer maintenant.
";
$elem["sa-exim/purge_spool"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
