<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cups");

$elem["cupsys/raw-print"]["type"]="boolean";
$elem["cupsys/raw-print"]["description"]="Do you want CUPS to print unknown jobs as raw jobs?
 The Internet Printing Protocol (IPP) enforces a MIME type for all
 print jobs. Since not all sources of print jobs can attach an
 appropriate type, many jobs get submitted as the MIME type
 application/octet-stream and could be rejected if CUPS cannot guess
 the job's format.
 .
 CUPS can handle all such jobs as \"raw\" jobs, which causes them to be
 sent directly to the printer without processing.
 .
 It is recommended to choose this option if the server will be
 accepting print jobs from Windows computers or Samba servers.
";
$elem["cupsys/raw-print"]["descriptionde"]="Möchten Sie, dass CUPS unbekannte Druckaufträge unbearbeitet (raw) druckt?
 Das Internet Printing Protokoll (IPP) erfordert einen MIME-Typ für alle Druckaufträge. Da nicht jeder Erzeuger von Druckaufträgen den geeigneten Typ einfügen kann, werden viele Aufträge mit dem MIME-Typ »application/octet-stream« abgesendet. Diese Druckaufträge können abgewiesen werden, falls CUPS dessen Format nicht ermitteln kann.
 .
 CUPS kann all diese Aufträge als »rohe« (engl.: »raw«) Aufträge behandeln. Das bewirkt, dass sie ohne Bearbeitung direkt an den Drucker gesendet werden.
 .
 Es wird empfohlen, diese Option zu wählen, falls der Server Druckaufträge von Windows-Rechnern oder Samba-Servern akzeptieren wird.
";
$elem["cupsys/raw-print"]["descriptionfr"]="CUPS doit-il imprimer les demandes sans type MIME sous forme brute ?
 Selon le protocole IPP (« Internet Printing Protocol »), chaque demande d'impression doit comporter un type MIME. Comme certaines sources de demandes d'impression ne peuvent pas affecter un type MIME adapté, de nombreuses demandes sont soumises avec le type MIME application/octet-stream. Elles peuvent alors être rejetées si CUPS ne peut en déterminer le format.
 .
 CUPS peut traiter toutes ces demandes sans type reconnu comme des demandes au format brut et les envoyer sans aucun traitement à l'imprimante.
 .
 Il est recommandé de choisir cette option si le serveur est amené à traiter des demandes d'impression d'ordinateurs Windows ou de serveurs Samba.
";
$elem["cupsys/raw-print"]["default"]="true";
$elem["cupsys/backend"]["type"]="multiselect";
$elem["cupsys/backend"]["choices"][1]="ipp";
$elem["cupsys/backend"]["choices"][2]="lpd";
$elem["cupsys/backend"]["choices"][3]="socket";
$elem["cupsys/backend"]["choices"][4]="usb";
$elem["cupsys/backend"]["choices"][5]="snmp";
$elem["cupsys/backend"]["choicesde"][1]="IPP";
$elem["cupsys/backend"]["choicesde"][2]="lpd";
$elem["cupsys/backend"]["choicesde"][3]="Socket";
$elem["cupsys/backend"]["choicesde"][4]="USB";
$elem["cupsys/backend"]["choicesde"][5]="SNMP";
$elem["cupsys/backend"]["choicesfr"][1]="IPP";
$elem["cupsys/backend"]["choicesfr"][2]="lpd";
$elem["cupsys/backend"]["choicesfr"][3]="socket";
$elem["cupsys/backend"]["choicesfr"][4]="USB";
$elem["cupsys/backend"]["choicesfr"][5]="SNMP";
$elem["cupsys/backend"]["description"]="Printer communication backends:
 CUPS uses backend programs to communicate with the printer device or port.
 .
 Unfortunately, some backend programs are likely to cause some trouble.
 For example, some PPC kernels crash with the parallel backend.
 .
 Please choose the backend program to be used by CUPS. The default choice
 should fit the most common environments.
";
$elem["cupsys/backend"]["descriptionde"]="Backends für die Kommunikation mit dem Drucker:
 CUPS verwendet Backend-Programme zur Kommunikation mit dem Drucker oder Port.
 .
 Leider verursachen manche Backend-Programme Probleme. Zum Beispiel stürzen einige PPC-Kernel mit dem Parallel-Backend ab.
 .
 Bitte wählen Sie das Backend-Programm zur Verwendung mit CUPS. Die Voreinstellung sollte den meisten Umgebungen gerecht werden.
";
$elem["cupsys/backend"]["descriptionfr"]="Mode de communication avec les imprimantes :
 CUPS utilise différentes méthodes de communication pour ses échanges avec les imprimantes ou les ports d'impression.
 .
 Malheureusement, certaines de ces méthodes sont connues pour provoquer des difficultés comme le gel de certains noyaux PowerPC avec la communication parallèle.
 .
 Le choix par défaut est adapté à la majorité des environnements.
";
$elem["cupsys/backend"]["default"]="ipp, lpd, socket, usb, snmp, dnssd";
PKG_OptionPageTail2($elem);
?>
