<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cdebconf-gtk");

$elem["debconf/button-continue"]["type"]="text";
$elem["debconf/button-continue"]["description"]="Continue
";
$elem["debconf/button-continue"]["descriptionde"]="Weiter
";
$elem["debconf/button-continue"]["descriptionfr"]="Continuer
";
$elem["debconf/button-continue"]["default"]="";
$elem["debconf/button-goback"]["type"]="text";
$elem["debconf/button-goback"]["description"]="Go Back
";
$elem["debconf/button-goback"]["descriptionde"]="Zurück
";
$elem["debconf/button-goback"]["descriptionfr"]="Revenir en arrière
";
$elem["debconf/button-goback"]["default"]="";
$elem["debconf/button-yes"]["type"]="text";
$elem["debconf/button-yes"]["description"]="Yes
";
$elem["debconf/button-yes"]["descriptionde"]="Ja
";
$elem["debconf/button-yes"]["descriptionfr"]="Oui
";
$elem["debconf/button-yes"]["default"]="";
$elem["debconf/button-no"]["type"]="text";
$elem["debconf/button-no"]["description"]="No
";
$elem["debconf/button-no"]["descriptionde"]="Nein
";
$elem["debconf/button-no"]["descriptionfr"]="Non
";
$elem["debconf/button-no"]["default"]="";
$elem["debconf/button-help"]["type"]="text";
$elem["debconf/button-help"]["description"]="Help
";
$elem["debconf/button-help"]["descriptionde"]="Hilfe
";
$elem["debconf/button-help"]["descriptionfr"]="Aide
";
$elem["debconf/button-help"]["default"]="";
$elem["debconf/text-direction"]["type"]="text";
$elem["debconf/text-direction"]["description"]="LTR
";
$elem["debconf/text-direction"]["descriptionde"]="LTR
";
$elem["debconf/text-direction"]["descriptionfr"]="LTR
";
$elem["debconf/text-direction"]["default"]="";
$elem["debconf/gtk-button-screenshot"]["type"]="text";
$elem["debconf/gtk-button-screenshot"]["description"]="Screenshot
";
$elem["debconf/gtk-button-screenshot"]["descriptionde"]="Bildschirmfoto
";
$elem["debconf/gtk-button-screenshot"]["descriptionfr"]="Capture d'écran
";
$elem["debconf/gtk-button-screenshot"]["default"]="";
$elem["debconf/gtk-screenshot-saved"]["type"]="text";
$elem["debconf/gtk-screenshot-saved"]["description"]="Screenshot saved as %s
";
$elem["debconf/gtk-screenshot-saved"]["descriptionde"]="Das Bildschirmfoto wurde gespeichert als %s
";
$elem["debconf/gtk-screenshot-saved"]["descriptionfr"]="Capture d'écran enregistrée dans %s
";
$elem["debconf/gtk-screenshot-saved"]["default"]="";
$elem["cdebconf/frontend/gtk"]["type"]="string";
$elem["cdebconf/frontend/gtk"]["description"]="GTK
 Modern interface, fitting the GNOME desktop environment (but may be used in any X environment).
";
$elem["cdebconf/frontend/gtk"]["descriptionde"]="";
$elem["cdebconf/frontend/gtk"]["descriptionfr"]="";
$elem["cdebconf/frontend/gtk"]["default"]="";
PKG_OptionPageTail2($elem);
?>
