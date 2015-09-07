<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("linux-patch-grsecurity2");

$elem["linux-patch-grsecurity2/2.1.2-security"]["type"]="text";
$elem["linux-patch-grsecurity2/2.1.2-security"]["description"]="The 2.1.2 release is a security bugfix release, please upgrade!
 In the included PaX patch a security bug was found. It affects kernels
 with SEGMEXEC or RANDEXEC enabled (the predefined LOW and MEDIUM
 options do not contain these). All users are encouraged to upgrade soon
 as the bug is locally (and maybe remotely) exploitable; if you can not
 upgrade, then
 echo \"0 0\" > /proc/sys/vm/pagetable_cache
 would reduce the risk, but patching is still unavoidable. References:
 http://lists.netsys.com/pipermail/full-disclosure/2005-March/032240.html
 http://www.grsecurity.net/news.php#grsec212
";
$elem["linux-patch-grsecurity2/2.1.2-security"]["descriptionde"]="Die 2.1.2-Veröffentlichung ist eine Sicherheits-Fehlerkorrektur-Veröffentlichung, bitte führen Sie ein Upgrade durch!
 Im enthaltenen PaX-Patch wurde ein Sicherheitsloch gefunden. Er betrifft Kernel mit aktiviertem SEGMEXEC oder RANDEXEC (die vordefinierten LOW- und MEDIUM-Optionen enthalten diese nicht). Alle Benutzer werden ermutigt, so bald wie möglich ein Upgrade durchzuführen, da der Fehler lokal (und vielleicht sogar entfernt) ausnutzbar ist; falls Sie kein Upgrade durchführen können, dann reduzieren Sie das Risiko mit »echo \"0 0\" > /proc/sys/vm/pagetable_cache«, aber das Patchen ist dennoch unvermeidbar. Literaturhinweise: http://lists.netsys.com/pipermail/full-disclosure/2005-March/032240.html http://www.grsecurity.net/news.php#grsec212
";
$elem["linux-patch-grsecurity2/2.1.2-security"]["descriptionfr"]="La version 2.1.2 corrige un bogue de sécurité, mise à niveau indispensable
 Dans la rustine PaX, un bogue concernant la sĂŠcuritĂŠ a ĂŠtĂŠ trouvĂŠ. Ce bogue concerne seulement les noyaux qui ont les options SEGMEXEC ou RANDEXEC activĂŠes (ces options ne sont pas activĂŠes avec les niveaux prĂŠdĂŠfinis LOW et MEDIUM de grsecurity). Vous devriez mettre Ă  niveau votre systĂ¨me car le bogue peut ĂŞtre exploitĂŠ localement (et peut-ĂŞtre Ă  distance). Si vous ne pouvez pas le mettre Ă  niveau, utilisez la commandeÂ : ÂŤÂ echo \"0 0\" > /proc/sys/vm/pagetable_cacheÂ Âť pour rĂŠduire les risques, mais cela ne doit ĂŞtre que temporaire en attendant la mise Ă  niveau indispensable. Pour plus d'information, reportez-vous aux adressesÂ : http://lists.netsys.com/pipermail/full-disclosure/2005-March/032240.html et http://www.grsecurity.net/news.php#grsec212.
";
$elem["linux-patch-grsecurity2/2.1.2-security"]["default"]="";
$elem["linux-patch-grsecurity2/2.1.3-security"]["type"]="text";
$elem["linux-patch-grsecurity2/2.1.3-security"]["description"]="The 2.1.3 release is also a security bugfix release, please upgrade!
 Quoting upstream: \"During the audit, a critical vulnerability was found in
 the RBAC system that effectively gave every subject the \"O\" flag, allowing a
 root user for instance to gain the privileges of any other process through
 LD_PRELOAD or ptrace.\"
 Also, a number of other bugs were fixed in general, including PaX. Please
 upgrade to this release as soon as you can.
";
$elem["linux-patch-grsecurity2/2.1.3-security"]["descriptionde"]="Die 2.1.3-Veröffentlichung ist auch eine Sicherheits-Fehlerkorrektur-Veröffentlichung, bitte führen Sie ein Upgrade durch!
 Zitat der Originalautoren: »Während des Audits wurde eine kritische Verwundbarkeit in dem RBAC-System gefunden, die tatsächlich jedem Subjekt die »O«-Markierung gab, und somit beispielsweise dem Root-Benutzer erlaubte, die Privilegien jedes anderen Prozessen durch LD_PRELOAD oder ptrace zu erlangen.« Auch wurden eine Reihe von anderen Fehlern allgemein behoben, darunter PaX. Bitte führen Sie ein Upgrade auf diese Veröffentlichung durch, sobald Sie dies können.
";
$elem["linux-patch-grsecurity2/2.1.3-security"]["descriptionfr"]="La version 2.1.2 corrige un bogue de sĂŠcuritĂŠ, mise Ă  niveau indispensable
 D'àpres les développeurs amont : « Durant l'audit, une faille critique a été découverte dans le système RBAC qui positionne pour chaque personne le drapeau \"O\", permettant au superutilisateur d'obtenir les privilèges de n'importe quel autre processus par LD_preload ou ptrace ». De plus, un certain nombre d'autres bogues ont été corrigés, y compris a mise à niveau de PaX. Procédez à la mise à niveau dès que vous le pourrez.
";
$elem["linux-patch-grsecurity2/2.1.3-security"]["default"]="";
PKG_OptionPageTail2($elem);
?>
