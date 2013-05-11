<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mason");

$elem["mason/newrulepolicy"]["type"]="select";
$elem["mason/newrulepolicy"]["choices"][1]="accept";
$elem["mason/newrulepolicy"]["choices"][2]="reject";
$elem["mason/newrulepolicy"]["choicesde"][1]="akzeptieren";
$elem["mason/newrulepolicy"]["choicesde"][2]="ablehnen";
$elem["mason/newrulepolicy"]["choicesfr"][1]="accepter";
$elem["mason/newrulepolicy"]["choicesfr"][2]="rejeter";
$elem["mason/newrulepolicy"]["description"]="Default action for new firewall rules:
 When Mason detects a new kind of traffic and creates a rule for it, what
 action should the rule take?
 .
 The \"accept\" action will allow the packet through.  \"Reject\" will stop the
 packet with a rejection reply, while \"deny\" will drop the packet silently.
";
$elem["mason/newrulepolicy"]["descriptionde"]="Standard-Aktion für neue Firewall-Regeln:
 Wenn Mason neuartigen Verkehr erkennt und eine Regel dafür erstellt, welche Aktion soll diese Regel ausführen?
 .
 Die Aktion »akzeptieren« wird das Paket durchlassen. »Ablehnen« wird das Paket anhalten mit einer Ablehnungsantwort, während »verweigern« das Paket ohne Rückmeldung verschwinden lässt.
";
$elem["mason/newrulepolicy"]["descriptionfr"]="Action par défaut pour les nouvelles règles du pare-feu :
 Veuillez choisir l'action à réaliser quand Mason détecte un nouveau type de trafic et crée une règle pour celui-ci.
 .
 « accepter » laisse passer le paquet. « rejeter » le rejette en émettant une réponse de rejet, enfin « refuser » le rejette silencieusement.
";
$elem["mason/newrulepolicy"]["default"]="accept";
$elem["mason/defaultpolicy"]["type"]="select";
$elem["mason/defaultpolicy"]["choices"][1]="accept";
$elem["mason/defaultpolicy"]["choices"][2]="reject";
$elem["mason/defaultpolicy"]["choicesde"][1]="akzeptieren";
$elem["mason/defaultpolicy"]["choicesde"][2]="ablehnen";
$elem["mason/defaultpolicy"]["choicesfr"][1]="accepter";
$elem["mason/defaultpolicy"]["choicesfr"][2]="rejeter";
$elem["mason/defaultpolicy"]["description"]="Default action for rulesets:
 What should the default action be when a packet does not match any of the
 rules set up by Mason?
 .
 Again, \"accept\" allows the packet through, \"reject\" drops the packet with
 a reply, and \"deny\" silently drops the packet.
";
$elem["mason/defaultpolicy"]["descriptionde"]="Standard-Aktion für Regelsätze:
 Was soll die Standard-Aktion sein, wenn ein Paket auf keine der von Mason eingerichteten Regeln passt?
 .
 Wie oben lässt die Aktion »akzeptieren« das Paket durch, »ablehnen« lässt das Paket mit einer Ablehnungsantwort verschwinden, während »verweigern« das Paket ohne Rückmeldung verschwinden lässt.
";
$elem["mason/defaultpolicy"]["descriptionfr"]="Action par défaut pour les jeux de règles :
 Veuillez choisir l'action par défaut pour un paquet qui ne correspond à aucune règle établie par Mason.
 .
 « accepter » laisse passer le paquet, « rejeter » le rejette en émettant une réponse de rejet et « refuser » le rejette silencieusement.
";
$elem["mason/defaultpolicy"]["default"]="accept";
PKG_OptionPageTail2($elem);
?>
