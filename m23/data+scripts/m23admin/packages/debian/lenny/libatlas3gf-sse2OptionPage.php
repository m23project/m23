<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libatlas3gf-sse2");

$elem["libatlas3gf-sse2/no_sse2"]["type"]="note";
$elem["libatlas3gf-sse2/no_sse2"]["description"]="The running cpu cannot execute SSE2 code
 You are installing SSE2 enhanced Atlas libs on a system which cannot
 execute them.  This is either because your processor is not an Intel
 Pentium IV or higher, or because your kernel is not configured to handle
 these instructions.  (For 2.2 kernels, you can reconfigure/rebuild with
 the kernel-patch-2.2.x-sse2 package, if you wish).  This package will go
 ahead and install the libs, but not set the runtime linker on this machine
 to use them.  You can later perform this configuration with
 dpkg-reconfigure libatlas3gf-sse2.
";
$elem["libatlas3gf-sse2/no_sse2"]["descriptionde"]="Die laufende CPU kann keinen SSE2-Code ausführen
 Sie installieren SSE2-erweiterte Atlas-Bibliotheken auf einem System, das diese nicht ausführen kann. Dies ist sehr wahrscheinlich der Fall, da Ihr Prozessor kein Intel Pentium IV oder höher ist, oder Ihr Kernel ist nicht konfiguriert, diese Instruktionen zu behandeln (Für 2.2-Kernel können Sie diesen mit dem Paket kernel-patch-2.2.x-sse2 neu konfigurieren/übersetzen). Dieses Paket wird damit fortfahren, die Bibliotheken zu installieren, aber es wird den Laufzeit-Linker nicht dahingehend einrichten, dass er sie verwendet. Sie können diese Konfiguration später durch »dpkg-reconfigure atlas3-sse2« ändern.
";
$elem["libatlas3gf-sse2/no_sse2"]["descriptionfr"]="Le processeur actuellement utilisé ne peut pas exécuter de code SSE2
 Vous êtes en train d'installer les bibliothèques atlas avec gestion des instructions SSE2 sur un système qui ne peut pas les gérer. Votre processeur n'est probablement pas un Pentium IV ou supérieur ou bien votre noyau n'est pas configuré pour les utiliser (les noyaux 2.2 peuvent être reconfigurés et recompilés en utilisant le paquet kernel-patch-2.2.x-sse2, si vous le souhaitez). Ce paquet va ignorer cela et installer les bibliothèques mais l'éditeur de liens ne sera pas configuré pour s'en servir. Vous pourrez effectuer cette configuration ultérieurement avec la commande « dpkg-reconfigure atlas3-sse2 ».
";
$elem["libatlas3gf-sse2/no_sse2"]["default"]="";
PKG_OptionPageTail2($elem);
?>
