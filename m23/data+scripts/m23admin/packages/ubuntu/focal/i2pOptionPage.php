<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("i2p");

$elem["i2p/daemon"]["type"]="boolean";
$elem["i2p/daemon"]["description"]="Should the I2P router be started at boot?
 The I2P router can be run as a daemon that starts automatically
 when your computer boots up. This is the recommended configuration.
";
$elem["i2p/daemon"]["descriptionde"]="Soll der I2P-Router beim Hochfahren mitgestartet werden?
 Der I2P-Router kann als Dämon laufen und beim Hochfahren des Betriebssystems mitgestartet werden. Diese Option wird empfohlen.
";
$elem["i2p/daemon"]["descriptionfr"]="Le routeur I2P devrait-il être lancé lors du démarrage ?
 Le routeur I2P peut être exécuté comme un démon qui se lance automatiquement quand l’ordinateur démarre. C’est la configuration recommandée.
";
$elem["i2p/daemon"]["default"]="false";
$elem["i2p/user"]["type"]="string";
$elem["i2p/user"]["description"]="I2P daemon user:
 By default I2P is configured to run under the account i2psvc when running
 as a daemon. To use an **existing** I2P profile you may enter a different
 account name here. For example, if your previous I2P installation is at
 /home/user/i2p, you may enter 'user' here.
 .
 Very important: If a user other than the default of 'i2psvc' is entered
 here, the chosen username *MUST* already exist.
";
$elem["i2p/user"]["descriptionde"]="Benutzer für den I2P-Dämon
 Standardmäßig ist I2P so eingestellt, dass es im Dämonmodus der unter dem Benutzer i2psvc läuft. Um ein bereits **vorhandenes** I2P-Profil zu benutzen, kannst du hier einen anderen Benutzer angeben. Beispiel: Wenn deine alte I2P-Installation in /home/ich/i2p residiert, gib hier 'ich' ein.
 .
 Achtung: Wenn etwas anderes als das standardmäßige 'i2psvc' hier eingetrangen ist, musst du einen Benutzernamen angeben der schon existiert.
";
$elem["i2p/user"]["descriptionfr"]="Utilisateur du démon I2P :
 Par défaut, I2P est configuré pour fonctionner avec le compte i2psvc quand il fonctionne comme démon. Pour utiliser un profil d’I2P **existant**, vous pouvez saisir ici un nom de compte différent. Par exemple, si votre installation précédente d’I2P se trouve dans /home/user/i2p, vous pouvez saisir l’utilisateur ici.
 .
 Très important : si un utilisateur autre que le compte « i2psvc » par défaut est saisi ici, le nom d’utilisateur choisi *DOIT* déjà exister.
";
$elem["i2p/user"]["default"]="i2psvc";
$elem["i2p/memory"]["type"]="string";
$elem["i2p/memory"]["description"]="Memory that can be allocated to I2P:
 By default, I2P will only be allowed to use up to 128MB of RAM.
 .
 High bandwidth routers, as well as routers with a lot of active torrents / plugins, may
 need to have this value increased.
";
$elem["i2p/memory"]["descriptionde"]="Arbeitsspeicher der I2P zugewiesen werden darf:
 Standardmäßig kann I2P bist zu 128 MB RAM belegen.
 .
 Router mit hoher Bandbreite, sowie vielen aktiven Torrents oder Plugins, müssen gegebenenfalls diesen Wert erhöhen.
";
$elem["i2p/memory"]["descriptionfr"]="Mémoire qui peut être allouée à I2P :
 Par défaut, I2P ne sera autorisé à utiliser que jusqu’à 128 Mo de mémoire vive.
 .
 Cette valeur pourrait être augmentée pour les routeurs à haut débit, ainsi que les routeurs ayant beaucoup de torrents ou de greffons actifs.
";
$elem["i2p/memory"]["default"]="128";
$elem["i2p/aa"]["type"]="boolean";
$elem["i2p/aa"]["description"]="Should the I2P daemon be confined with AppArmor?
 With this option enabled I2P will be sandboxed with AppArmor, restricting which files and
 directories may be accessed by I2P.
";
$elem["i2p/aa"]["descriptionde"]="Soll der I2P-Daemon mit AppArmor eingeschränkt werden?
 Wenn diese Option aktiviert ist, läuft I2P in einer AppArmor-Sandbox, welche den Zugriff von I2P auf Dateien und Verzeichnisse beschränkt.
";
$elem["i2p/aa"]["descriptionfr"]="Le démon I2P devrait-il être confiné avec AppArmor ?
 Si cette option est activée, I2P sera exécuté dans un bac à sable avec AppArmor, restreignant l’accès par I2P à des fichiers et répertoires particuliers.
";
$elem["i2p/aa"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
