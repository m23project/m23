<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gpr");

$elem["gpr/divert_lpr"]["type"]="boolean";
$elem["gpr/divert_lpr"]["description"]="divert lpr with a wrapper that points to gpr?
 gpr can install a wrapper in place of the command lpr. The wrapper will
 call the real lpr command if: either it is called from a terminal, or
 there is no access to an X DISPLAY; otherwise it will call gpr. This
 wrapper can be useful when printing from graphical programs (such as
 mozilla or openoffice), so that the users will be able to choose the
 printer and other printer-related settings.
";
$elem["gpr/divert_lpr"]["descriptionde"]="Kommando lpr nach gpr umleiten?
 gpr kann ein Programm (wrapper) anstelle des Kommandos lpr setzen. Dieser Wrapper ruft das eigentliche Kommando lpr auf, wenn er von einem Terminal aufgerufen wurde oder keinen Zugang zu einem X-Display hat, ansonsten wird gpr verwendet. Dieser Wrapper kann nützlich sein, wenn man aus grafischen Oberflächen (wie Mozilla oder OpenOffice) heraus drucken will. Dabei kann der Benutzer den Drucker auswählen und Druckereinstellungen vornehmen.
";
$elem["gpr/divert_lpr"]["descriptionfr"]="Faut-il rediriger les appels à lpr vers gpr ?
 Gpr peut installer un script de redirection (« wrapper ») à la place de la commande lpr. La véritable commande lpr sera exécutée si la demande d'impression est faite depuis un terminal, ou bien si l'environnement graphique n'est pas disponible. Dans les autres cas, gpr sera utilisé. Ce script de redirection peut être utile lorsque l'impression se fait depuis des programmes de l'environnement graphique (tels que Mozilla ou OpenOffice). Ainsi, les utilisateurs pourront choisir l'imprimante et la régler comme ils le souhaitent.
";
$elem["gpr/divert_lpr"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
