<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("irqbalance");

$elem["irqbalance/enable"]["type"]="boolean";
$elem["irqbalance/enable"]["description"]="Enable irqbalance?
 Enable the irqbalance daemon to balance IRQs on SMP systems and systems
 with hyperthreading?
";
$elem["irqbalance/enable"]["descriptionde"]="Irqbalance aktivieren?
 Den Dienst irqbalance zum Ausgleichen der IRQs auf SMP-Systemen und Systemen mit Hyperthreading aktivieren?
";
$elem["irqbalance/enable"]["descriptionfr"]="Faut-il activer irqbalance ?
 Veuillez choisir si vous souhaitez activer le démon irqbalance pour répartir les requêtes d'interruptions (IRQ) sur les systèmes multiprocesseurs et les systèmes utilisant l'« hyperthreading ».
";
$elem["irqbalance/enable"]["default"]="true";
$elem["irqbalance/oneshot"]["type"]="boolean";
$elem["irqbalance/oneshot"]["description"]="Balance the IRQ's once?
 irqbalance can run in one shot mode, where the IRQs are balanced only
 once. This is advantageous on hyperthreading systems such as the Pentium
 4, which appear to be SMP systems, but are really one physical CPU.
 .
 Run irqbalance in one shot mode?
";
$elem["irqbalance/oneshot"]["descriptionde"]="IRQs einmal ausgleichen?
 Irqbalance kann in einem \"Einmal-Modus\" betrieben werden, bei dem die IRQs nur einmal aufgeteilt werden. Das ist vorteilhaft auf Systemen mit Hyperthreading, wie Pentium 4, die sich wie SMP-Systeme verhalten, aber physisch nur eine CPU haben.
 .
 Irqbalance im \"Einmal-Modus\" starten?
";
$elem["irqbalance/oneshot"]["descriptionfr"]="Faut-il répartir les « IRQ » une seule fois ?
 Irqbalance peut être lancé pour ne répartir les requêtes d'interruption qu'une seule fois. Cela est avantageux sur les système avec « hyperthreading » comme les processeurs Pentium 4, qui apparaissent comme des systèmes multiprocesseurs même si un seul processeur est présent.
 .
 Veuillez choisir si vous souhaitez utiliser ce mode de fonctionnement.
";
$elem["irqbalance/oneshot"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
