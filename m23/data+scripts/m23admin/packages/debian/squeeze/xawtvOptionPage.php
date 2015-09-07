<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xawtv");

$elem["xawtv/makedev"]["type"]="boolean";
$elem["xawtv/makedev"]["description"]="Create video4linux (/dev/video*) special files?
";
$elem["xawtv/makedev"]["descriptionde"]="Sollen Gerätedateien (/dev/video*) für video4linux erstellt werden?
";
$elem["xawtv/makedev"]["descriptionfr"]="Faut-il créer les fichiers spéciaux video4linux (/dev/video*) ?
";
$elem["xawtv/makedev"]["default"]="true";
$elem["xawtv/channel-scan"]["type"]="boolean";
$elem["xawtv/channel-scan"]["description"]="Scan for TV stations?
 A list of TV stations found by scanning can be included in the
 configuration file.
 .
 This requires a working bttv driver. If bttv isn't configured correctly, TV
 stations will not be found.
 .
 Channel names will be retrieved from teletext information, which
 will only work for PAL channels.
";
$elem["xawtv/channel-scan"]["descriptionde"]="Soll nach Fernsehsendern gesucht werden?
 Es kann eine Liste von Fernsehstationen in die Konfiguration aufgenommen werden, die durch automatisches Durchsuchen ermittelt wird.
 .
 Dafür ist ein funktionierender BTTV-Treiber erforderlich. Falls BTTV nicht richtig eingerichtet ist, könnte kein Sender gefunden werden.
 .
 Die Kanalnamen werden aus den Videotextinformationen entnommen. Dies funktioniert nur für PAL-Kanäle.
";
$elem["xawtv/channel-scan"]["descriptionfr"]="Faut-il rechercher des chaînes de télévision ?
 Une liste des chaînes de télévision détectées lors de la recherche peut être incluse dans le fichier de configuration.
 .
 Cela nécessite un pilote fonctionnel pour bttv. Si bttv n'est pas encore configuré correctement, les chaînes de télévision ne seront sans doute pas trouvées.
 .
 Les noms des chaînes seront déterminés d'après le télétexte, ce qui ne fonctionnera qu'avec les chaînes à la norme PAL.
";
$elem["xawtv/channel-scan"]["default"]="true";
$elem["xawtv/tvnorm"]["type"]="select";
$elem["xawtv/tvnorm"]["choices"][1]="PAL";
$elem["xawtv/tvnorm"]["choices"][2]="SECAM";
$elem["xawtv/tvnorm"]["description"]="TV standard:
";
$elem["xawtv/tvnorm"]["descriptionde"]="Fernsehstandard:
";
$elem["xawtv/tvnorm"]["descriptionfr"]="Standard TV :
";
$elem["xawtv/tvnorm"]["default"]="";
$elem["xawtv/build-config"]["type"]="boolean";
$elem["xawtv/build-config"]["description"]="Create a default configuration for xawtv?
 A system-wide configuration file for xawtv can be created with reasonable
 default values for the local country.
 .
 That file is not required but will simplify software configuration
 for users.
";
$elem["xawtv/build-config"]["descriptionde"]="Soll eine Standard-Konfiguration für Xawtv erstellt werden?
 Es kann eine systemweite Konfigurationsdatei für Xawtv erstellt werden, die vernünftige Voreinstellungen für das eigene Land enthält.
 .
 Diese Datei muss nicht zwingend vorhanden sein, erleichtert aber den Benutzern die Software-Konfiguration.
";
$elem["xawtv/build-config"]["descriptionfr"]="Créer une configuration par défaut pour xawtv ?
 Un fichier de configuration générique pour xawtv peut être créé avec des valeurs par défaut adaptées au pays dans lequel vous résidez.
 .
 Ce fichier n'est pas nécessaire mais simplifiera les configurations pour les utilisateurs.
";
$elem["xawtv/build-config"]["default"]="false";
$elem["xawtv/freqtab"]["type"]="select";
$elem["xawtv/freqtab"]["choices"][1]="us-bcast";
$elem["xawtv/freqtab"]["choices"][2]="us-cable";
$elem["xawtv/freqtab"]["choices"][3]="us-cable-hrc";
$elem["xawtv/freqtab"]["choices"][4]="japan-bcast";
$elem["xawtv/freqtab"]["choices"][5]="japan-cable";
$elem["xawtv/freqtab"]["choices"][6]="europe-west";
$elem["xawtv/freqtab"]["choices"][7]="europe-east";
$elem["xawtv/freqtab"]["choices"][8]="italy";
$elem["xawtv/freqtab"]["choices"][9]="newzealand";
$elem["xawtv/freqtab"]["choices"][10]="australia";
$elem["xawtv/freqtab"]["choices"][11]="ireland";
$elem["xawtv/freqtab"]["choices"][12]="france";
$elem["xawtv/freqtab"]["choicesde"][1]="US-Rundfunk";
$elem["xawtv/freqtab"]["choicesde"][2]="US-Kabel";
$elem["xawtv/freqtab"]["choicesde"][3]="US-Kabel-HRC";
$elem["xawtv/freqtab"]["choicesde"][4]="Japan-Rundfunk";
$elem["xawtv/freqtab"]["choicesde"][5]="Japan-Kabel";
$elem["xawtv/freqtab"]["choicesde"][6]="West-Europa";
$elem["xawtv/freqtab"]["choicesde"][7]="Ost-Europa";
$elem["xawtv/freqtab"]["choicesde"][8]="Italien";
$elem["xawtv/freqtab"]["choicesde"][9]="Neuseeland";
$elem["xawtv/freqtab"]["choicesde"][10]="Australien";
$elem["xawtv/freqtab"]["choicesde"][11]="Irland";
$elem["xawtv/freqtab"]["choicesde"][12]="Frankreich";
$elem["xawtv/freqtab"]["choicesfr"][1]="USA hertzien";
$elem["xawtv/freqtab"]["choicesfr"][2]="USA câble";
$elem["xawtv/freqtab"]["choicesfr"][3]="USA câble HRC";
$elem["xawtv/freqtab"]["choicesfr"][4]="Japon hertzien";
$elem["xawtv/freqtab"]["choicesfr"][5]="Japon câble";
$elem["xawtv/freqtab"]["choicesfr"][6]="europe occidentale";
$elem["xawtv/freqtab"]["choicesfr"][7]="europe orientale";
$elem["xawtv/freqtab"]["choicesfr"][8]="Italie";
$elem["xawtv/freqtab"]["choicesfr"][9]="Nouvelle-Zélande";
$elem["xawtv/freqtab"]["choicesfr"][10]="Australie";
$elem["xawtv/freqtab"]["choicesfr"][11]="Irlande";
$elem["xawtv/freqtab"]["choicesfr"][12]="France";
$elem["xawtv/freqtab"]["description"]="Frequency table to use:
 A frequency table is a list of TV channel names and numbers with
 their broadcast frequencies.
";
$elem["xawtv/freqtab"]["descriptionde"]="Frequenz-Tabelle, die verwendet werden soll:
 Eine Frequenz-Tabelle ist eine Liste der Fernsehsender (Namen und Nummern) mit dazugehörigen Sendefrequenzen.
";
$elem["xawtv/freqtab"]["descriptionfr"]="Table des fréquences à utiliser :
 Une table de fréquences consiste simplement en une liste de numéros ou de noms de chaînes, associés aux fréquences de diffusion correspondantes.
";
$elem["xawtv/freqtab"]["default"]="";
PKG_OptionPageTail2($elem);
?>
