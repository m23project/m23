<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("update-inetd");

$elem["update-inetd/title"]["type"]="title";
$elem["update-inetd/title"]["description"]="Configuring service: ${service}
";
$elem["update-inetd/title"]["descriptionde"]="${service}
";
$elem["update-inetd/title"]["descriptionfr"]="Configuration du service ${service}
";
$elem["update-inetd/title"]["default"]="";
$elem["update-inetd/ask-several-entries"]["type"]="boolean";
$elem["update-inetd/ask-several-entries"]["description"]="Ignore multiple entries and continue without changes?
 There are multiple entries in ${inetdcf} for the '${service}' service.
";
$elem["update-inetd/ask-several-entries"]["descriptionde"]="Mehrfache Einträge ignorieren und ohne Änderungen fortfahren?
 Es gibt mehrere Einträge für den Dienst ${service} in ${inetdcf}.
";
$elem["update-inetd/ask-several-entries"]["descriptionfr"]="Faut-il ignorer les entrées multiples et continuer sans modification ?
 Il existe plusieurs entrées dans ${inetdcf} pour le service « ${service} ».
";
$elem["update-inetd/ask-several-entries"]["default"]="true";
$elem["update-inetd/ask-entry-present"]["type"]="boolean";
$elem["update-inetd/ask-entry-present"]["description"]="Leave existing entry and continue without changes?
 An unrecognized entry for ${sservice} was found in ${inetdcf} while
 trying to add the following entry:
 .
 ${newentry}
 .
 The unrecognized entry is:
 .
 ${lookslike}
";
$elem["update-inetd/ask-entry-present"]["descriptionde"]="Existierenden Eintrag belassen und ohne Änderungen fortfahren?
 Ein nicht erkannter Eintrag für ${sservice} wurde beim Hinzufügen des folgenden Eintrags in ${inetdcf} gefunden:
 .
 ${newentry}
 .
 Der nicht erkannte Eintrag lautet:
 .
 ${lookslike}
";
$elem["update-inetd/ask-entry-present"]["descriptionfr"]="Faut-il quitter l'entrée existante et continuer sans modifications ?
 Une entrée non reconnue pour ${sservice} a été rencontrée dans ${inetdcf} pendant la tentative d'ajout de l'entrée suivante :
 .
 ${newentry}
 .
 L'entrée non reconnue est la suivante :
 .
 ${lookslike}
";
$elem["update-inetd/ask-entry-present"]["default"]="true";
$elem["update-inetd/ask-remove-entries"]["type"]="boolean";
$elem["update-inetd/ask-remove-entries"]["description"]="Remove inetd entries?
 There are multiple entries in ${inetdcf} for the '${service}' service.
 .
 Please confirm that you agree to remove these entries.
";
$elem["update-inetd/ask-remove-entries"]["descriptionde"]="Inetd-Einträge entfernen?
 Es gibt mehrere Einträge für den Dienst ${service} in ${inetdcf}.
 .
 Bitte bestätigen Sie, dass Sie der Entfernung der Einträge zustimmen.
";
$elem["update-inetd/ask-remove-entries"]["descriptionfr"]="Faut-il supprimer les entrées d'inetd ?
 Il existe plusieurs entrées dans ${inetdcf} pour le service « ${service} ».
 .
 Veuillez confirmer la suppression de ces entrées.
";
$elem["update-inetd/ask-remove-entries"]["default"]="false";
$elem["update-inetd/ask-disable-entries"]["type"]="boolean";
$elem["update-inetd/ask-disable-entries"]["description"]="Disable inetd entries?
 There are multiple entries in ${inetdcf} for the '${service}' service.
 .
 Please confirm that you agree to disable these entries.
";
$elem["update-inetd/ask-disable-entries"]["descriptionde"]="Inetd-Einträge deaktivieren?
 Es gibt mehrere Einträge für den Dienst ${service} in ${inetdcf}.
 .
 Bitte bestätigen Sie, dass Sie der Deaktivierung der Einträge zustimmen.
";
$elem["update-inetd/ask-disable-entries"]["descriptionfr"]="Faut-il désactiver les entrées d'inetd ?
 Il existe plusieurs entrées dans ${inetdcf} pour le service « ${service} ».
 .
 Veuillez confirmer la désactivation de ces entrées.
";
$elem["update-inetd/ask-disable-entries"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
