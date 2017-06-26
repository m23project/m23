<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sysv-rc");

$elem["sysv-rc/unable-to-convert"]["type"]="note";
$elem["sysv-rc/unable-to-convert"]["description"]="Unable to migrate to dependency-based boot system
 Problems in the boot system exist which are preventing migration to
 dependency-based boot sequencing:
 .
 ${PROBLEMATIC}
 .
 If the reported problem is a local modification, it needs to be fixed
 manually.  These are typically due to obsolete conffiles being left
 after a package has been removed, but not purged.  It is suggested
 that these are removed by running:
 .
 ${SUGGESTION}
 .
 Package installation can not continue until the above problems have
 been fixed.  To reattempt the migration process after these problems
 have been fixed, run \"dpkg --configure sysv-rc\".
";
$elem["sysv-rc/unable-to-convert"]["descriptionde"]="Es konnte nicht auf abhängigkeitsbasierte Systemstartreihenfolge umgestellt werden.
 Im Startsystem gibt es Probleme, die eine Umstellung auf abhängigkeitsbasierte Systemstartreihenfolge verhindern:
 .
 ${PROBLEMATIC}
 .
 Falls das gemeldete Problem von einer lokalen Änderung rührt, muss es manuell behoben werden. Dies sind normalerweise veraltete Conffiles, die zurückgeblieben sind, als ein Paket gelöscht, aber nicht vollständig entfernt wurde. Es wird empfohlen, diese zu entfernen, indem Folgendes ausgeführt wird:
 .
 ${SUGGESTION}
 .
 Die Paketinstallation kann nicht fortgesetzt werden, bis obige Probleme behoben wurde. Um den Umstellungsprozess nach dem Lösen dieser Probleme erneut zu versuchen, führen Sie »dpkg --configure sysv-rc« aus.
";
$elem["sysv-rc/unable-to-convert"]["descriptionfr"]="Impossible de migrer vers le nouveau systÃ¨me de dÃ©marrage basÃ© sur les dÃ©pendances
 En raison de problÃ¨mes dans le systÃ¨me de dÃ©marrage, la migration vers la nouvelle sÃ©quence de dÃ©marrage basÃ©e sur les dÃ©pendances n'est pas possible.
 .
 ${PROBLEMATIC}
 .
 Si le problÃ¨me indiquÃ© est une modification locale, il est nÃ©cessaire de le corriger vous-mÃªme. Ces problÃ¨mes sont typiquement dÃ»s Ã  des fichiers de configuration obsolÃ¨tes laissÃ©s aprÃ¨s qu'un paquet ait Ã©tÃ© supprimÃ© ou purgÃ©. Il est suggÃ©rÃ© de les supprimer en exÃ©cutantÂ :
 .
 ${SUGGESTION}
 .
 L'installation du paquet ne peut pas continuer tant que les problÃ¨mes ci-dessus n'ont pas Ã©tÃ© rÃ©parÃ©s. Pour retenter le processus de migration, une fois que les problÃ¨mes ont Ã©tÃ© corrigÃ©s, vous pouvez exÃ©cuter la commande Â«Â dpkg-reconfigure sysv-rcÂ Â».
";
$elem["sysv-rc/unable-to-convert"]["default"]="";
PKG_OptionPageTail2($elem);
?>
