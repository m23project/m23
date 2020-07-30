<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("glewlwyd");

$elem["glewlwyd/config_type"]["type"]="select";
$elem["glewlwyd/config_type"]["choices"][1]="Personalized";
$elem["glewlwyd/config_type"]["choicesde"][1]="Personalisiert";
$elem["glewlwyd/config_type"]["choicesfr"][1]="Personnalisé";
$elem["glewlwyd/config_type"]["description"]="Glewlwyd setup
 You can configure it later if needed
";
$elem["glewlwyd/config_type"]["descriptionde"]="Glewlwyd-Einrichtung
 Sie können es, falls gewünscht, auch später konfigurieren.
";
$elem["glewlwyd/config_type"]["descriptionfr"]="Réglages de Glewlwyd
 Vous pourrez le configurer ultérieurement si nécessaire
";
$elem["glewlwyd/config_type"]["default"]="Personalized";
$elem["glewlwyd/config_external_url"]["type"]="string";
$elem["glewlwyd/config_external_url"]["description"]="External address to access Glewlwyd:
";
$elem["glewlwyd/config_external_url"]["descriptionde"]="Externe Zugriffsadresse von Glewlwyd:
";
$elem["glewlwyd/config_external_url"]["descriptionfr"]="Adresse externe pour accéder à Glewlwyd :
";
$elem["glewlwyd/config_external_url"]["default"]="http://localhost:4593/";
$elem["glewlwyd/config_reset_pwd"]["type"]="boolean";
$elem["glewlwyd/config_reset_pwd"]["description"]="Enable password reset for users?
";
$elem["glewlwyd/config_reset_pwd"]["descriptionde"]="Sollen Benutzer das Passwort zurücksetzen können?
";
$elem["glewlwyd/config_reset_pwd"]["descriptionfr"]="Activer la réinitialisation de mot de passe pour les utilisateurs ?
";
$elem["glewlwyd/config_reset_pwd"]["default"]="true";
$elem["glewlwyd/config_reset_pwd_host"]["type"]="string";
$elem["glewlwyd/config_reset_pwd_host"]["description"]="Enter SMTP Host:
";
$elem["glewlwyd/config_reset_pwd_host"]["descriptionde"]="Geben Sie den SMTP-Server ein:
";
$elem["glewlwyd/config_reset_pwd_host"]["descriptionfr"]="Entrer l'hôte SMTP :
";
$elem["glewlwyd/config_reset_pwd_host"]["default"]="localhost";
$elem["glewlwyd/config_reset_pwd_from"]["type"]="string";
$elem["glewlwyd/config_reset_pwd_from"]["description"]="Enter sender e-mail address:
";
$elem["glewlwyd/config_reset_pwd_from"]["descriptionde"]="Geben Sie die Absender-E-Mail-Adresse ein:
";
$elem["glewlwyd/config_reset_pwd_from"]["descriptionfr"]="Entrer l'adresse électronique de l'expéditeur :
";
$elem["glewlwyd/config_reset_pwd_from"]["default"]="glewlwyd@localhost";
$elem["glewlwyd/config_reset_pwd_subject"]["type"]="string";
$elem["glewlwyd/config_reset_pwd_subject"]["description"]="Enter reset password e-mail subject:
";
$elem["glewlwyd/config_reset_pwd_subject"]["descriptionde"]="Geben Sie den Betreff der E-Mail zum Zurücksetzen des Passworts ein:
";
$elem["glewlwyd/config_reset_pwd_subject"]["descriptionfr"]="Entrer le sujet du courriel de réinitialisation de mot de passe :
";
$elem["glewlwyd/config_reset_pwd_subject"]["default"]="Glewlwyd password reset";
$elem["glewlwyd/config_jwt_alg"]["type"]="select";
$elem["glewlwyd/config_jwt_alg"]["choices"][1]="RSA";
$elem["glewlwyd/config_jwt_alg"]["choices"][2]="ECDSA";
$elem["glewlwyd/config_jwt_alg"]["description"]="Algorithm used to sign/verify JWT
 JWT: Json Web Token
 Algorithms available:
 - RSA algorithm (asymetric)
 - ECDSA algorithm (asymetric)
 - SHA algorithm (symetric)
";
$elem["glewlwyd/config_jwt_alg"]["descriptionde"]="Algorithmus, der zum Signieren/Prüfen von JWT benutzt wird
 JWT: verfügbare JSON-Web-Token-Algorithmen: - RSA-Algorithmus (asymmetrisch) - ECDSA-Algorithmus (asymmetrisch) - SHA-Algorithmus (symmetrisch)
";
$elem["glewlwyd/config_jwt_alg"]["descriptionfr"]="Algorithme utilisé pour signer ou vérifier JWT
 JWT : Algorithmes Json Web Token disponibles :
 – algorithme RSA (asymétrique)
 – algorithme ECDSA (asymétrique)
 – algorithme SHA (symétrique)
";
$elem["glewlwyd/config_jwt_alg"]["default"]="RSA";
$elem["glewlwyd/config_jwt_key_size"]["type"]="string";
$elem["glewlwyd/config_jwt_key_size"]["description"]="Enter JWT key size:
 Values available are 256, 384 or 512
";
$elem["glewlwyd/config_jwt_key_size"]["descriptionde"]="Geben Sie die JWT-Schlüssellänge ein:
 Verfügbare Werte sind 256, 384 oder 512.
";
$elem["glewlwyd/config_jwt_key_size"]["descriptionfr"]="Entrer la taille de la clef JWT :
 Les valeurs disponibles sont 256, 384 ou 512
";
$elem["glewlwyd/config_jwt_key_size"]["default"]="512";
$elem["glewlwyd/config_jwt_generate_key"]["type"]="boolean";
$elem["glewlwyd/config_jwt_generate_key"]["description"]="Generate a pair key/certificate?
";
$elem["glewlwyd/config_jwt_generate_key"]["descriptionde"]="Soll ein Schlüssel-/Zertifikatpaar erzeugt werden?
";
$elem["glewlwyd/config_jwt_generate_key"]["descriptionfr"]="Générer une paire clef/certificat ?
";
$elem["glewlwyd/config_jwt_generate_key"]["default"]="true";
$elem["glewlwyd/config_jwt_secret"]["type"]="string";
$elem["glewlwyd/config_jwt_secret"]["description"]="Enter SHA secret:
 SHA secret is a string that will be used to sign and verify JWTs
";
$elem["glewlwyd/config_jwt_secret"]["descriptionde"]="Geben Sie die SHA-Passphrase ein:
 Die SHA-Passphrase ist eine Zeichenkette, die zum Signieren und Prüfen von JWTs benutzt wird.
";
$elem["glewlwyd/config_jwt_secret"]["descriptionfr"]="Entrer la somme SHA du secret :
 La somme SHA du secret est une chaîne qui sera utilisée pour signer et vérifier les JWT
";
$elem["glewlwyd/config_jwt_secret"]["default"]="secret";
PKG_OptionPageTail2($elem);
?>
