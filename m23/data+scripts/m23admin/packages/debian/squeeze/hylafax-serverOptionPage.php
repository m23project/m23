<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("hylafax-server");

$elem["hylafax-server/start_now"]["type"]="boolean";
$elem["hylafax-server/start_now"]["description"]="Start the HylaFAX daemon now?
 Hylafax is already configured and may be started now. If you specify to
 start it later manually, remember to change the value of RUN_HYLAFAX
 in /etc/default/hylafax.
";
$elem["hylafax-server/start_now"]["descriptionde"]="Soll der HylaFAX-Dienst jetzt gestartet werden?
 Hylafax wurde bereits eingerichtet und kann jetzt gestartet werden. Falls Sie angeben hylafax später von Hand zu starten, so denken Sie bitte daran den Wert von RUN_HYLAFAX in /etc/default/hylafax zu verändern.
";
$elem["hylafax-server/start_now"]["descriptionfr"]="Faut-il démarrer le démon hylafax maintenant ?
 Hylafax est déjà configuré et peut être démarré maintenant. Si vous prévoyez de le lancer vous-même, vous devrez modifier la valeur RUN_HYLAFAX dans le fichier /etc/default/hylafax.
";
$elem["hylafax-server/start_now"]["default"]="true";
$elem["hylafax-server/setup_failed"]["type"]="error";
$elem["hylafax-server/setup_failed"]["description"]="Hylafax setup failed
 While installing hylafax a script called 'faxsetup' failed.
 This can be caused by many reasons and cannot be fixed automatically
 so the hylafax-server package is now unconfigured. Please fix the
 problem, run 'faxsetup -server' as root and reconfigure hylafax-server
 manually.
";
$elem["hylafax-server/setup_failed"]["descriptionde"]="Hylafax-Konfiguration fehlgeschlagen
 Während der Installation von hylafax ist das Skript »faxsetup« fehlgeschlagen. Das kann verschiedene Ursachen haben, und kann nicht automatisch behoben werden, weshalb das Paket hylafax-server nun unkonfiguriert bleibt. Bitte beheben Sie das Problem, indem Sie »faxsetup-server« als root aufrufen und hylafax-server manuell neu konfigurieren.
";
$elem["hylafax-server/setup_failed"]["descriptionfr"]="Échec de la configuration d'hylafax
 Lors de l'installation d'hylafax, le script « faxsetup » a échoué. Cela peut être causé par différentes raisons et ne peut pas être corrigé automatiquement ; c'est pourquoi le paquet hylafax-server est maintenant non configuré. Veuillez corriger le problème, exécuter « faxsetup-server » avec les privilèges du superutilisateur et reconfigurer vous-même hylafax-server.
";
$elem["hylafax-server/setup_failed"]["default"]="";
PKG_OptionPageTail2($elem);
?>
