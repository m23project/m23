<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libpam-yubico");

$elem["libpam-yubico/module_args"]["type"]="string";
$elem["libpam-yubico/module_args"]["description"]="Parameters for Yubico PAM:
 The Yubico PAM module supports two modes of operation: online
 validation of YubiKey OTPs or offline validation of YubiKey HMAC-SHA-1
 responses to challenges.
 .
 The default is online validation, and for that to work you need to get
 a free API key at https://upgrade.yubico.com/getapikey/ and
 enter the key id as \"id=NNNN\" and the base64 secret as \"key=...\".
 .
 All the available parameters for the Yubico PAM module are described
 in /usr/share/doc/libpam-yubico/README.gz. To avoid accidental
 lock-outs the module will not be active until it is enabled with the
 \"pam-auth-update\" command.
";
$elem["libpam-yubico/module_args"]["descriptionde"]="Parameter für Yubico PAM:
 Das Modul Yubico PAM unterstützt zwei Betriebsmodi: Online-Überprüfung des YubiKey-Einmalpassworts oder Offline-Überprüfung der YubiKey-HMAC-SHA-1-Antworten auf Aufforderungen.
 .
 Standard ist die Online-Überprüfung. Damit sie funktioniert, müssen Sie einen kostenlosen API-Schlüssel von https://upgrade.yubico.com/getapikey/ beziehen und die Schlüsselkennzahl als »id=NNNN« sowie den Base64-Schlüssel als »key=…« eingeben.
 .
 Alle verfügbaren Parameter für das Yubico-PAM-Modul sind in /usr/share/doc/libpam-yubico/README.gz beschrieben. Um versehentliches Aussperren zu vermeiden, wird das Modul nicht aktiv, bis es mit dem Befehl »pam-auth-update« eingeschaltet wird.
";
$elem["libpam-yubico/module_args"]["descriptionfr"]="Paramètres pour Yubico PAM :
 Le module PAM Yubico propose 2 modes de fonctionnement : une validation en ligne des mots de passe à usage unique (OTP : « One-Time Password ») Yubikey ou une validation hors-ligne.
 .
 La valeur par défaut est une validation en ligne. Pour la faire fonctionner, il est nécessaire d'obtenir une clé gratuite pour l'API, à l'adresse https://upgrade.yubico.com/getapikey/, de l'indiquer sous la forme « id=NNNN » et d'indiquer le mot de passe Base64 sous la forme « key=... ».
 .
 Tous les paramètres disponibles pour Yubico PAM sont décrits dans /usr/share/doc/libpam-yubico/README.gz. Afin d'éviter des blocages accidentels, le module ne sera pas actif tant qu'il n'aura pas été activé avec la commande « pam-auth-update ».
";
$elem["libpam-yubico/module_args"]["default"]="mode=client try_first_pass id=N key=K";
PKG_OptionPageTail2($elem);
?>
