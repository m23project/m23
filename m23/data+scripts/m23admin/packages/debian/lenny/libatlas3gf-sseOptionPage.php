<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libatlas3gf-sse");

$elem["libatlas3gf-sse/no_sse"]["type"]="note";
$elem["libatlas3gf-sse/no_sse"]["description"]="The running cpu cannot execute SSE code
 You are installing SSE enhanced Atlas libs on a system which cannot
 execute them.  This is either because your processor is not an Intel
 Pentium III or higher, or because your kernel is not configured to handle
 these instructions.  (For 2.2 kernels, you can reconfigure/rebuild with
 the kernel-patch-2.2.x-p3 package, if you wish).  This package will go
 ahead and install the libs, but not set the runtime linker on this machine
 to use them.  You can later perform this configuration with
 dpkg-reconfigure libatlas3gf-sse.
";
$elem["libatlas3gf-sse/no_sse"]["descriptionde"]="Die laufende CPU kann keinen SSE-Code ausführen
 Sie installieren SSE-erweiterte Atlas-Bibliotheken auf einem System, das diese nicht ausführen kann. Dies ist sehr wahrscheinlich der Fall, da Ihr Prozessor kein Intel Pentium III oder höher ist, oder Ihr Kernel ist nicht konfiguriert, diese Instruktionen zu behandeln (Für 2.2-Kernels können Sie diesen mit dem Paket kernel-patch-2.2.x-p3 neu konfigurieren/übersetzen). Dieses Paket wird damit fortfahren, die Bibliotheken zu installieren, aber es wird den Laufzeit-Linker nicht dahingehend einrichten, dass er sie verwendet. Sie können diese Konfiguration später durch »dpkg-reconfigure atlas3-sse« ändern.
";
$elem["libatlas3gf-sse/no_sse"]["descriptionfr"]="Le processeur actuellement utilisé ne peut pas exécuter de code SSE
 Vous êtes en train d'installer les bibliothèques atlas avec gestion des instructions SSE sur un système qui ne peut pas les gérer. Votre processeur n'est probablement pas un Pentium III ou supérieur ou bien votre noyau n'est pas configuré pour les utiliser (les noyaux 2.2 peuvent être reconfigurés et recompilés en utilisant le paquet kernel-patch-2.2.x-p3, si vous le souhaitez). Ce paquet va ignorer cela et installer les bibliothèques mais l'éditeur de liens ne sera pas configuré pour s'en servir. Vous pourrez effectuer cette configuration ultérieurement avec la commande « dpkg-reconfigure atlas3-sse ».
";
$elem["libatlas3gf-sse/no_sse"]["default"]="";
PKG_OptionPageTail2($elem);
?>
