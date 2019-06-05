<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("opensvc");

$elem["opensvc/dbopensvc"]["type"]="string";
$elem["opensvc/dbopensvc"]["description"]="Configuration for collector usage:
 By default, the collector is contacted by the node using the generic name dbopensvc on ports 80 and 8000. This name should be known to your prefered resolving mecanism : hosts, dns, ... If you choose to use the internet shared collector, the corresponding ip address must be set to the address of collector.opensvc.com
";
$elem["opensvc/dbopensvc"]["descriptionde"]="Aufruf der Sammlerkonfiguration:
 Standardmäßig wird der Sammler durch den Knoten mittels des allgemeinen Namens »dbopensvc« auf den Ports 80 und 8000 kontaktiert. Dieser Name sollte Ihrem bevorzugten Namensauflösungsmechanismus (Hosts, DNS, …) bekannt sein. Falls Sie auswählen, dass Sie den im Internet gemeinsam benutzten Sammler verwenden möchten, muss die zugehörige IP-Adresse auf die Adresse von collector.opensvc.com gesetzt werden.
";
$elem["opensvc/dbopensvc"]["descriptionfr"]="Configuration pour l'utilisation du collecteur :
 Par défaut, le collecteur est contacté par le nœud en utilisant le nom générique « dbopensvc » sur les ports 80 et 8000. Ce nom doit être connu par votre mécanisme de résolution des noms préféré : hosts, dns…\nSi vous choisissez d'utiliser le collecteur partagé par Internet, l'adresse IP correspondante doit être celle de collector.opensvc.com
";
$elem["opensvc/dbopensvc"]["default"]="";
$elem["opensvc/env"]["type"]="select";
$elem["opensvc/env"]["choices"][1]="PRD";
$elem["opensvc/env"]["choices"][2]="PPRD";
$elem["opensvc/env"]["choices"][3]="REC";
$elem["opensvc/env"]["choices"][4]="INT";
$elem["opensvc/env"]["choices"][5]="DEV";
$elem["opensvc/env"]["choices"][6]="TST";
$elem["opensvc/env"]["choices"][7]="TMP";
$elem["opensvc/env"]["choices"][8]="DRP";
$elem["opensvc/env"]["choices"][9]="FOR";
$elem["opensvc/env"]["choices"][10]="PRA";
$elem["opensvc/env"]["choices"][11]="PRJ";
$elem["opensvc/env"]["description"]="Host environment:
 The valid host mode values are:\n
 \n
 host_mode  behaves as  description\n
 ---------  ----------  ------------------\n
 PRD        PRD         Production\n
 PPRD       PRD         Pre Production\n
 REC        not PRD     Prod-like testing\n
 INT        not PRD     Integration\n
 DEV        not PRD     Development\n
 TST        not PRD     Testing\n
 TMP        not PRD     Temporary\n
 DRP        not PRD     Disaster recovery\n
 FOR        not PRD     Training\n
 PRA        not PRD     Disaster recovery\n
 PRJ        not PRD     Project\n
 STG        not PRD     Staging\n
";
$elem["opensvc/env"]["descriptionde"]="Rechnerumgebung:
 Die gültiger Rechnermoduswerte sind:\n \n Modus      Verhalten    Beschreibung\n-----       ---------    ------------\n PRD        PRD          Produktion\n PPRD       PRD          Vorproduktion\n REC        nicht PRD    Prod-artig Testen\n INT        nicht PRD    Integration\n DEV        nicht PRD    Entwicklung\n TST        nicht PRD    Testen\n TMP        nicht PRD    temporär\n DRP        nicht PRD    Notfallwiederherstellung\n FOR        nicht PRD    Training\n PRA        nicht PRD    Notfallwiederherstellung
  PRJ        nicht PRD    Projekt\n STG        nicht PRD    Vorbereitung\n
";
$elem["opensvc/env"]["descriptionfr"]="Environnement de l'hôte :
 Les valeurs valables pour le mode de l'hôte sont les suivantes :\n\nMode_Hôte    Comportement    Description\n---------    ------------    -----------------------\nPRD          PRD             Production\nPPRD         PRD             Pré-Production\nREC          non PRD         Test de type Production\nINT          non PRD         Intégration\nDEV          non PRD         Développement\nTST          non PRD         Test\nTMP          non PRD         Temporaire\nDRP          non PRD         Reprise après sinistre\nFOR          non PRD         Entraînement\nPRA          non PRD         Reprise après sinistre\nPRJ          non PRD         Projet\nSTG          non PRD         Simulation\n
";
$elem["opensvc/env"]["default"]="";
PKG_OptionPageTail2($elem);
?>
