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
 The new rule default action specifies how Mason will handle unknown packets, when the firewall is in learning mode.
 .
 The \"accept\" action will allow the packet through.  \"Reject\" will stop the
 packet with a rejection reply, while \"deny\" will drop the packet silently.
";
$elem["mason/newrulepolicy"]["descriptionde"]="Standard-Aktion für neue Firewall-Regeln:
 Die Standard-Aktion für neue Regeln gibt an, wie Mason unbekannte Pakete verarbeitet, wenn sich die Firewall im Lernmodus befindet.
 .
 Die Aktion »akzeptieren« wird das Paket annehmen. »ablehnen« wird das Paket mit einer ablehnenden Antwort stoppen, während »verweigern« das Paket ohne Rückmeldung verwirft.
";
$elem["mason/newrulepolicy"]["descriptionfr"]="Action par défaut pour les nouvelles règles du pare-feu :
 L'action par défaut de la nouvelle règle indique comment Mason gère les paquets inconnus lorsque le pare-feu est en mode apprentissage.
 .
 L'action « accepter » laisse passer le paquet, « rejeter » le rejette en émettant une réponse de rejet, enfin « refuser » le rejette silencieusement.
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
 The default action specifies how Mason will handle unknown packets, when the firewall is not in learning mode.
 .
 Again, \"accept\" allows the packet through, \"reject\" drops the packet with
 a reply, and \"deny\" silently drops the packet.
";
$elem["mason/defaultpolicy"]["descriptionde"]="Standard-Aktion für Regelsätze:
 Die Standard-Aktion legt fest, wie Mason unbekannte Pakete behandelt, wenn sich die Firewall nicht im Lernmodus befindet.
 .
 Auch hier wird »akzeptieren« das Paket annehmen, »ablehnen« das Paket mit einer ablehnenden Antwort stoppen und »verweigern« das Paket ohne Rückmeldung verwerfen.
";
$elem["mason/defaultpolicy"]["descriptionfr"]="Action par défaut pour les jeux de règles :
 L'action par défaut indique comment Mason gère les paquets inconnu lorsque le pare-feu n'est pas en mode apprentissage.
 .
 L'action « accepter » laisse passer le paquet, « rejeter » le rejette en émettant une réponse de rejet et « refuser » le rejette silencieusement.
";
$elem["mason/defaultpolicy"]["default"]="accept";
PKG_OptionPageTail2($elem);
?>
