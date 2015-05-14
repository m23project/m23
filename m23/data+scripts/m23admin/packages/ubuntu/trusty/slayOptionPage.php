<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("slay");

$elem["slay/punish"]["type"]="boolean";
$elem["slay/punish"]["description"]="Shall slay punish users?
 Normally slay will punish ordinary users trying to run it by slaying
 themselves. This is The Right Thing(TM), as users should not mess with
 administrative commands like slay, but some administrators find it
 inconvenient. Therefore slay can be configured to punish users or just to
 display error message.
";
$elem["slay/punish"]["descriptionde"]="Soll slay Benutzer bestrafen?
 Für gewöhnlich bestraft slay normale Benutzer, indem es sie selbst 'slayed'.Das ist richtig so(TM), da Benutzer nicht mit administrativen Kommandos wieslay spielen sollten, aber manche Administratoren fiden das unangenehm. Daher kann slay so eingerichtet werden, dass es Benutzer bestraft oder nur eine Fehlermeldung ausgibt.
";
$elem["slay/punish"]["descriptionfr"]="Slay doit-il punir les utilisateurs ?
 Habituellement, slay punit les utilisateurs ordinaires qui tentent de le lancer en utilisant slay contre eux-mêmes (ce qui revient à tuer tous les processus leur appartenant). C'est le Bon Comportement, afin d'éviter que les utilisateurs ne fassent n'importe quoi avec les commandes d'administration telles que slay, mais certains administrateurs trouvent cela abusif. Par conséquent, slay peut être configuré pour punir les utilisateurs ou pour simplement afficher un message d'erreur.
";
$elem["slay/punish"]["default"]="false";
$elem["slay/butthead"]["type"]="boolean";
$elem["slay/butthead"]["description"]="Shall slay use `Butt-head' mode by default?
 Slay has two sets of messages: a standard set and an alternative set that
 is more informal.  The alternative set is named after \"Butt-head\" from
 MTV's \"Beavis & Butt-head\" cartoon show, a character who uses the sort of
 language you'll find in the alternative set.  In most cases, the standard
 set of messages is more appropriate.
";
$elem["slay/butthead"]["descriptionde"]="Soll slay standarmäßig den 'Butt-head' Modus verwenden?
 Slay besitzt zwei Sammlungen von Meldungen: eine Standardsammlung und eine alternative die etwas informativer ist. Die alternative wurde nach \"Butt-head\" von MTV's \"Beavis·&·Butt-head\" Cartoon benannt, einem Charakter, der diese Art von Sprache verwendet, die Sie in der alternativen Sammlung finden. In den meisten Fällen ist die Standardsammlung eher mehr angemessen.
";
$elem["slay/butthead"]["descriptionfr"]="Slay doit-il utiliser le mode « Butt-head » par défaut ?
 Slay possède deux jeux de messages : un jeu standard et un jeu de remplacement, plus informel. Le jeu de remplacement est nommé « Butt-head » d'après le dessin animé « Beavis & Butt-head » sur MTV ; un des personnages y emploie le genre de langage que vous trouverez dans le jeu de remplacement. Dans la plupart des cas, le jeu standard est plus approprié.
";
$elem["slay/butthead"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
