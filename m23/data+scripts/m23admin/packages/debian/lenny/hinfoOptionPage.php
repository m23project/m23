<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("hinfo");

$elem["hinfo/autoupdate"]["type"]="select";
$elem["hinfo/autoupdate"]["choices"][1]="never";
$elem["hinfo/autoupdate"]["choices"][2]="now";
$elem["hinfo/autoupdate"]["choices"][3]="weekly";
$elem["hinfo/autoupdate"]["choicesde"][1]="niemals";
$elem["hinfo/autoupdate"]["choicesde"][2]="jetzt";
$elem["hinfo/autoupdate"]["choicesde"][3]="wöchentlich";
$elem["hinfo/autoupdate"]["choicesfr"][1]="Jamais";
$elem["hinfo/autoupdate"]["choicesfr"][2]="Maintenant";
$elem["hinfo/autoupdate"]["choicesfr"][3]="Une fois par semaine";
$elem["hinfo/autoupdate"]["description"]="When would you like hinfo to download new databases?
 Whois and DNSBL servers change at irregular intervals.  Hinfo can
 automatically download new whois and dnsbl databases from the authors web
 site using hinfo-update if desired.  A new user \"hinfo\" will be created if
 one of the periodic options is selected.
";
$elem["hinfo/autoupdate"]["descriptionde"]="Zu welchem Zeitpunkt soll hinfo neue Datenbanken herunterladen?
 Whois- und DNSBL-Server ändern sich in unregelmäßigen Abständen. Hinfo bietet die Möglichkeit, mittels \"hinfo-update\" aktuelle Whois- und DNSBL-Datenbestände von der Web-Seite des Autors zu beziehen. Soll diese Aktualisierung in periodischen Zeitabständen erfolgen, wird der Benutzer \"hinfo\" angelegt.
";
$elem["hinfo/autoupdate"]["descriptionfr"]="Hinfo doit télécharger de nouvelles bases de données :
 Les serveurs whois et DNSBL changent à intervalles irréguliers. Si vous le souhaitez, hinfo peut télécharger automatiquement de nouvelles bases de données à partir du site web de ses auteurs en utilisant la commande hinfo-update. Un nouvel utilisateur « hinfo » sera créé si un téléchargement périodique est demandé.
";
$elem["hinfo/autoupdate"]["default"]="never";
$elem["hinfo/autoupdateverbose"]["type"]="select";
$elem["hinfo/autoupdateverbose"]["choices"][1]="quiet";
$elem["hinfo/autoupdateverbose"]["choices"][2]="nonverbose";
$elem["hinfo/autoupdateverbose"]["choicesde"][1]="still";
$elem["hinfo/autoupdateverbose"]["choicesde"][2]="nicht wortreich";
$elem["hinfo/autoupdateverbose"]["choicesfr"][1]="Silencieux";
$elem["hinfo/autoupdateverbose"]["choicesfr"][2]="Non bavard";
$elem["hinfo/autoupdateverbose"]["description"]="How verbose should the periodic update be?
 When enabled, the periodic download of the hinfo databases will email its
 status.
  Quiet: only report errors
  Nonverbose: report updates
  Verbose: report everything
";
$elem["hinfo/autoupdateverbose"]["descriptionde"]="Wie wortreich soll die periodische Aktualisierung sein?
 Erfolgt die Aktualisierung von hinfo-Datenbeständen in periodischen Zeitabständen, werden Meldungen darüber per E-Mail zugestellt. Wie detailliert sollen diese Berichte sein?
  Still: berichtet nur Fehler
  Nicht wortreich: berichtet nur Aktualisierungen
  Wortreich: berichtet alles
";
$elem["hinfo/autoupdateverbose"]["descriptionfr"]="Mode utilisé lors des mises à jour périodiques :
 Quand un téléchargement périodique des bases de données hinfo a été choisi, un courriel est envoyé à chaque téléchargement pour en indiquer l'état. Les options possibles pour choisir le type d'informations envoyées sont :
  - Silencieux : ne signale que les erreurs ;
  - Non bavard : signale aussi les mises à jour ;
  - Bavard : signale tout.
";
$elem["hinfo/autoupdateverbose"]["default"]="quiet";
PKG_OptionPageTail2($elem);
?>
