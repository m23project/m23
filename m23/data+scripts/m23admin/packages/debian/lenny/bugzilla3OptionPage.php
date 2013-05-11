<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bugzilla3");

$elem["bugzilla3/pwd_check"]["type"]="password";
$elem["bugzilla3/pwd_check"]["description"]="Password confirmation:
";
$elem["bugzilla3/pwd_check"]["descriptionde"]="Passwort-Bestätigung:
";
$elem["bugzilla3/pwd_check"]["descriptionfr"]="Confirmation du mot de passe :
";
$elem["bugzilla3/pwd_check"]["default"]="";
$elem["bugzilla3/bugzilla_admin_name"]["type"]="string";
$elem["bugzilla3/bugzilla_admin_name"]["description"]="Email address of the Bugzilla administrator:
 All mail for the administrator will be sent to this address.  This email
 address is also used as the administrator login for Bugzilla.
 .
 A valid address must contain exactly one '@', and at least one '.' after
 the @. You'll be able to change this setting through bugzilla's
 web interface.
";
$elem["bugzilla3/bugzilla_admin_name"]["descriptionde"]="E-Mail-Adresse des Bugzilla-Administrators:
 Alle E-Mails für den Administrator werden an diese Adresse geschickt. Diese E-Mail-Adresse wird auch als Administrator-Login für Bugzilla verwendet.
 .
 Eine gültige Adresse muss genau ein »@«, und wenigstens ein ».« nach dem @ enthalten. Sie können diese E-Mail-Adresse später über die Web-Oberfläche von Bugzilla ändern.
";
$elem["bugzilla3/bugzilla_admin_name"]["descriptionfr"]="Adresse électronique de l'administrateur de Bugzilla :
 Tous les courriers électroniques destinés à l'administrateur seront envoyés l'adresse indiquée. Elle sera également utilisée comme identifiant pour l'administrateur.
 .
 Une adresse valable doit contenir un et un seul « @ » et au moins un « . » après le « @ ». Vous pourrez changer ces réglages initiaux en modifiant certains paramètres dans l'interface Bugzilla.
";
$elem["bugzilla3/bugzilla_admin_name"]["default"]="";
$elem["bugzilla3/bugzilla_admin_real_name"]["type"]="string";
$elem["bugzilla3/bugzilla_admin_real_name"]["description"]="Real name of the Bugzilla administrator:
";
$elem["bugzilla3/bugzilla_admin_real_name"]["descriptionde"]="Tatsächlicher Name des Bugzilla-Administrators:
";
$elem["bugzilla3/bugzilla_admin_real_name"]["descriptionfr"]="Nom réel de l'administrateur de Bugzilla :
";
$elem["bugzilla3/bugzilla_admin_real_name"]["default"]="";
$elem["bugzilla3/bugzilla_admin_pwd"]["type"]="password";
$elem["bugzilla3/bugzilla_admin_pwd"]["description"]="Password for the Bugzilla administrator account:
";
$elem["bugzilla3/bugzilla_admin_pwd"]["descriptionde"]="Passwort fürs Konto des Bugzilla-Administrators:
";
$elem["bugzilla3/bugzilla_admin_pwd"]["descriptionfr"]="Mot de passe de l'administrateur de Bugzilla :
";
$elem["bugzilla3/bugzilla_admin_pwd"]["default"]="";
PKG_OptionPageTail2($elem);
?>
