<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ldh-gui-suite");

$elem["one.liberty/domain"]["type"]="string";
$elem["one.liberty/domain"]["description"]="Liberty Deckplan Host:
 The \"Liberty Deckplan Host\" (LDH) is a single domain
 implementing the concrete configuration plan
 defined at <https://source.puri.sm/liberty/services>.
 .
 This name will also be used by other programs.
 It should be the single, fully qualified domain name (FQDN).
 .
 Leave blank to use a default value (currently \"${defaultvalue}\"),
 and to permit eventual automatic change of that value without asking.
";
$elem["one.liberty/domain"]["descriptionde"]="Liberty Deckplan Host:
 Der »Liberty Deckplan Host« (LDH) ist eine einzelne Domain, die den unter <https://source.puri.sm/liberty/services> definierten konkreten Konfigurationsplan implementiert.
 .
 Dieser Name wird auch von anderen Programmen verwandt. Er sollte ein einfacher, vollständig qualifizierter Domain-Name (FQDN) sein.
 .
 Um den Vorgabewert (derzeit »${defaultvalue}«) zu verwenden, lassen Sie ihn leer und erlauben schließlich die automatische Änderung des Wertes ohne Rückfrage.
";
$elem["one.liberty/domain"]["descriptionfr"]="Liberty Deckplan Host:
 Le « Liberty Deckplan Host » (LDH) est un domaine unique implémentant le plan de configuration concret défini sur <https://source.puri.sm/liberty/services>.
 .
 Ce nom sera utilisé aussi par d'autres programmes. Il devrait être un nom de domaine unique et pleinement qualifié (FQDN).
 .
 Veuillez laisser vide pour utiliser une valeur par défaut (actuellement, « ${defaultvalue} » et pour permettre le changement éventuel automatique de cette valeur sans qu'une question ne soit posée.
";
$elem["one.liberty/domain"]["default"]="";
$elem["one.liberty/hub/name"]["type"]="string";
$elem["one.liberty/hub/name"]["description"]="Descriptive name for Liberty Deckplan Host service Hub:
 \"Hub\" is a service to manage your Liberty Deckplan Host account.
 .
 This descriptive name will also be used by other programs.
 It should be a short string usable within a longer description sentence.
 .
 Leave blank to use a default value (currently \"${defaultvalue}\"),
 and to permit eventual automatic change of that value without asking.
";
$elem["one.liberty/hub/name"]["descriptionde"]="Beschreibender Name für den »Liberty Deckplan Host«-Dienste-Hub:
 »Hub« ist ein Dienst, um Ihr »Liberty Deckplan Host«-Konto zu verwalten.
 .
 Dieser beschreibende Name wird auch durch andere Programme verwandt. Er sollte eine kurze Zeichenkette sein, die innerhalb eines längeren beschreibenden Satzes verwandt werden kann.
 .
 Um den Vorgabewert (derzeit »${defaultvalue}«) zu verwenden, lassen Sie ihn leer und erlauben schließlich die automatische Änderung des Wertes ohne Rückfrage.
";
$elem["one.liberty/hub/name"]["descriptionfr"]="Nom décrivant le service Hub de Liberty Deckplan Host :
 « Hub » est un service pour gérer votre compte Liberty Deckplan Host.
 .
 Ce nom descriptif sera utilisé aussi par d'autres programmes. Ce devrait être une chaîne courte utilisable à l'intérieur d'une phrase de description plus longue.
 .
 Veuillez laisser vide pour utiliser une valeur par défaut (actuellement, « ${defaultvalue} » et pour permettre le changement éventuel automatique de cette valeur sans qu'une question ne soit posée.
";
$elem["one.liberty/hub/name"]["default"]="";
$elem["one.liberty/hub/uri"]["type"]="string";
$elem["one.liberty/hub/uri"]["description"]="URI for Liberty Deckplan Host service Hub:
 \"Hub\" is a service to manage your Liberty Deckplan Host account,
 online accessible at this URI.
 .
 This URI will also be used by other programs.
 It should be the single Uniform Resource Identifier (URI).
 .
 Leave blank to use a default value (currently \"${defaultvalue}\"),
 and to permit eventual automatic change of that value without asking.
";
$elem["one.liberty/hub/uri"]["descriptionde"]="URI für »Liberty Deckplan Host«-Dienste-Hub:
 »Hub« ist ein Dienst, um Ihr »Liberty Deckplan Host«-Konto zu verwalten, das online unter dieser URI erreichbar ist.
 .
 Diese URI wird auch durch andere Programme verwandt. Sie sollte der einheitliche Bezeichner für Ressourcen (URI) sein.
 .
 Um den Vorgabewert (derzeit »${defaultvalue}«) zu verwenden, lassen Sie ihn leer und erlauben schließlich die automatische Änderung des Wertes ohne Rückfrage.
";
$elem["one.liberty/hub/uri"]["descriptionfr"]="";
$elem["one.liberty/hub/uri"]["default"]="";
$elem["one.liberty/social/name"]["type"]="string";
$elem["one.liberty/social/name"]["description"]="Descriptive name for Liberty Deckplan Host service Social:
 \"Social\" is a microblogging service part of Liberty Deckplan Host.
 .
 This descriptive name will also be used by other programs.
 It should be a short string usable within a longer description sentence.
 .
 Leave blank to use a default value (currently \"${defaultvalue}\"),
 and to permit eventual automatic change of that value without asking.
";
$elem["one.liberty/social/name"]["descriptionde"]="Beschreibender Name für den »Liberty Deckplan Host«-Dienst »Social«:
 »Social« ist ein Mikroblogging-Dienst, der Teil eines »Liberty Deckplan Host« ist.
 .
 Dieser beschreibende Name wird auch durch andere Programme verwandt. Er sollte eine kurze Zeichenkette sein, die innerhalb eines längeren beschreibenden Satzes verwandt werden kann.
 .
 Um den Vorgabewert (derzeit »${defaultvalue}«) zu verwenden, lassen Sie ihn leer und erlauben schließlich die automatische Änderung des Wertes ohne Rückfrage.
";
$elem["one.liberty/social/name"]["descriptionfr"]="Nom descriptif du service Social de Liberty Deckplan Host :
 « Social » est un service de microblogage qui fait partie de Liberty Deckplan Host.
 .
 Ce nom descriptif sera utilisé aussi par d'autres programmes. Ce devrait être une chaîne courte utilisable à l'intérieur d'une phrase de description plus longue.
 .
 Veuillez laisser vide pour utiliser une valeur par défaut (actuellement, « ${defaultvalue} » et pour permettre le changement éventuel automatique de cette valeur sans qu'une question ne soit posée.
";
$elem["one.liberty/social/name"]["default"]="";
$elem["one.liberty/social/uri"]["type"]="string";
$elem["one.liberty/social/uri"]["description"]="URI for Liberty Deckplan Host service Social:
 \"Social\" is a microblogging service part of Liberty Deckplan Host.
 .
 This URI will also be used by other programs.
 It should be the single Uniform Resource Identifier (URI).
 .
 Leave blank to use a default value (currently \"${defaultvalue}\"),
 and to permit eventual automatic change of that value without asking.
";
$elem["one.liberty/social/uri"]["descriptionde"]="URI für »Liberty Deckplan Host«-Dienst »Social«:
 »Social« ist ein Mikroblogging-Dienst, der Teil eines »Liberty Deckplan Host« ist.
 .
 Diese URI wird auch durch andere Programme verwandt. Sie sollte der einheitliche Bezeichner für Ressourcen (URI) sein.
 .
 Um den Vorgabewert (derzeit »${defaultvalue}«) zu verwenden, lassen Sie ihn leer und erlauben schließlich die automatische Änderung des Wertes ohne Rückfrage.
";
$elem["one.liberty/social/uri"]["descriptionfr"]="";
$elem["one.liberty/social/uri"]["default"]="";
PKG_OptionPageTail2($elem);
?>
