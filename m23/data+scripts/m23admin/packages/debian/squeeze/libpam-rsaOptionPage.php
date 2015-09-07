<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libpam-rsa");

$elem["libpam-rsa/no_configuration"]["type"]="boolean";
$elem["libpam-rsa/no_configuration"]["description"]="Omit libpam-rsa configuration?
 If you enable this option, no initial configuration will be created and
 you will need to create /etc/security/pam_rsa.conf in order to use this
 module.
";
$elem["libpam-rsa/no_configuration"]["descriptionde"]="Die Konfiguration von libpam-rsa überspringen?
 Fall Sie diese Option wählen, wird keine Erstkonfiguration erstellt, und Sie müssen /etc/security/pam_rsa.conf erzeugen, um dieses Modul verwenden zu können.
";
$elem["libpam-rsa/no_configuration"]["descriptionfr"]="Faut-il omettre la configuration de libpam-rsa ?
 Si vous choisissez de ne pas effectuer la configuration de libpam-rsa, vous devrez créer le fichier de configuration /etc/security/pam_rsa.conf vous-même si vous voulez utiliser ce module PAM.
";
$elem["libpam-rsa/no_configuration"]["default"]="false";
$elem["libpam-rsa/pubkey_dir"]["type"]="string";
$elem["libpam-rsa/pubkey_dir"]["description"]="Directory containing RSA public keys:
 Specifies the directory that contains the RSA public keys. The value must
 be an absolute path starting with a '/'. A trailing '/' is allowed but not
 required.
";
$elem["libpam-rsa/pubkey_dir"]["descriptionde"]="Verzeichnis, das öffentliche RSA-Schlüssel enthält:
 Dies ist das Verzeichnis, das die öffentlichen RSA-Schlüssel enthält. Dieser Wert muss eine absolute Pfadangabe sein, die mit einem »/« anfängt. Ein abschließendes »/« ist erlaubt jedoch nicht nicht erforderlich.
";
$elem["libpam-rsa/pubkey_dir"]["descriptionfr"]="Répertoire contenant les clés publiques RSA :
 Veuillez indiquer le répertoire qui contient les clés publiques RSA. Vous devez indiquer un chemin absolu commençant par « / ». Un caractère « / » final est possible mais non indispensable.
";
$elem["libpam-rsa/pubkey_dir"]["default"]="/var/lib/pam-rsa";
$elem["libpam-rsa/privkey_dir"]["type"]="string";
$elem["libpam-rsa/privkey_dir"]["description"]="Directory containing private, possibly mobile, RSA keys:
 Specifies the directory that contains the RSA private keys. This keys
 might be mobile, like in a USB key. If you leave the default option, you
 need to make sure that your USB mass storage devices are automounted so
 the directory can be reached.
";
$elem["libpam-rsa/privkey_dir"]["descriptionde"]="Verzeichnis, welches private, möglicherweise mobile, RSA-Schlüssel enthält:
 Dies ist das Verzeichnis, das die privaten RSA-Schlüssel enthält. Diese Schlüssel können mobil sein wie in einem USB-Schlüssel. Falls Sie den voreingestellten Wert belassen, müssen Sie sicherstellen, dass Ihre USB-Massenspeichergeräte automatisch eingehängt werden, so dass das Verzeichnis erreicht werden kann.
";
$elem["libpam-rsa/privkey_dir"]["descriptionfr"]="Répertoire (éventuellement amovible) contenant les clés privées RSA :
 Veuillez indiquer le répertoire qui contient les clés privées RSA. Ces clés peuvent être situées sur un support amovible tel qu'une clé USB. Si vous laissez la valeur par défaut, vous devez vous assurer que les périphériques de stockage USB sont montés automatiquement afin que le répertoire soit accessible.
";
$elem["libpam-rsa/privkey_dir"]["default"]="/media/usbdisk";
$elem["libpam-rsa/privkey_name_hash"]["type"]="select";
$elem["libpam-rsa/privkey_name_hash"]["choices"][1]="sha1";
$elem["libpam-rsa/privkey_name_hash"]["choicesde"][1]="SHA1";
$elem["libpam-rsa/privkey_name_hash"]["choicesfr"][1]="SHA1";
$elem["libpam-rsa/privkey_name_hash"]["description"]="Type of hashing for the private key filename:
 Specifies whether the private key's filename should be SHA1 hashed or not.
 The value must be either sha1 or none. This value is case insensitive.
";
$elem["libpam-rsa/privkey_name_hash"]["descriptionde"]="Hash-Algorithmus für den Dateinamen des privaten Schlüssels:
 Dies gibt an, ob ein SHA1-Hash des Dateinamens des privaten Schlüssels gebildet werden soll.
";
$elem["libpam-rsa/privkey_name_hash"]["descriptionfr"]="Type de hachage du nom de fichier de la clé privée :
 Veuillez indiquer si le nom du fichier contenant la clé privée doit être conservé en clair ou encodé avec un hachage SHA1.
";
$elem["libpam-rsa/privkey_name_hash"]["default"]="sha1";
$elem["libpam-rsa/pam_prompt"]["type"]="string";
$elem["libpam-rsa/pam_prompt"]["description"]="Prompt used by PAM-aware applications:
 Specifies the prompt that could be presented to a PAM-aware application
 that calls pam_rsa. The value must be less than 128 characters. Note that
 if ask_pass or ask_passphrase argument is not passed to pam_rsa module,
 then the value of pam_prompt is ignored.
";
$elem["libpam-rsa/pam_prompt"]["descriptionde"]="Eingabeaufforderung, die von PAM-verwendenden Applikationen verwendet werden soll:
 Dies spezifiziert die Eingabeaufforderung, die von Applikationen angezeigt werden kann, die PAM verwenden und pam_rsa aufrufen. Dieser Wert muss weniger als 128 Zeichen haben. Beachten Sie, dass der Wert von pam_prompt ignoriert wird, wenn das ask_pass- oder ask_passphrase-Argument nicht an das pam_rsa-Modul übergeben wird.
";
$elem["libpam-rsa/pam_prompt"]["descriptionfr"]="Invite utilisée par les applications compatibles avec PAM :
 Veuillez indiquer l'invite (« prompt ») qui pourra être proposée par les applications compatibles avec PAM lors de l'appel à pam_rsa. Cette chaîne de caractères doit comporter un maximum de 128 caractères. Veuillez noter que si les paramètres « ask_pass » ou « ask_passphrase » ne sont pas utilisés avec le module pam_rsa, ce réglage sera ignoré.
";
$elem["libpam-rsa/pam_prompt"]["default"]="Please enter your passphrase";
$elem["libpam-rsa/log_auth_result"]["type"]="boolean";
$elem["libpam-rsa/log_auth_result"]["description"]="Log authentication results?
 Specifies whether pam_rsa authentication results should be logged even in
 cases when the result is success. Authentication failures are always
 logged regardless of the value of this option.
";
$elem["libpam-rsa/log_auth_result"]["descriptionde"]="Authentifizierungsergebnisse protokollieren?
 Dies gibt an, ob pam_rsa-Authentifizierungsergebnisse protokolliert werden sollen, selbst wenn sie erfolgreich sind. Authentifizierungsfehler werden unabhängig vom Wert dieser Option immer protokolliert.
";
$elem["libpam-rsa/log_auth_result"]["descriptionfr"]="Faut-il journaliser les authentifications ?
 Veuillez choisir si les résultats d'authentification via pam_rsa doivent être journalisés même en cas de succès. Les échecs d'authentification seront, eux, toujours enregistrés dans les journaux, quelle que soit l'option retenue.
";
$elem["libpam-rsa/log_auth_result"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
