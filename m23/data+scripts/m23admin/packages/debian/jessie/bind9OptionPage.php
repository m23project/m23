<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bind9");

$elem["bind9/start-as-user"]["type"]="string";
$elem["bind9/start-as-user"]["description"]="User account for running the BIND9 daemon:
 The default is to run the BIND9 daemon (named) under the 'bind'
 user account. To use a different account, please enter the
 appropriate username.
";
$elem["bind9/start-as-user"]["descriptionde"]="Benutzerkonto, unter dessen Kennung der BIND9-Daemon laufen soll:
 Standardmäßig wird der BIND9-Daemon (Named) unter der Kennung des Benutzers »bind« betrieben. Um ein anderes Benutzerkonto auszuwählen, geben Sie bitte den entsprechenden Benutzernamen ein.
";
$elem["bind9/start-as-user"]["descriptionfr"]="Identifiant pour l'exécution du démon de BIND9 :
 Par défaut, le démon de BIND9 est lancé avec les privilèges de l'identifiant « bind ». Si vous souhaitez utiliser un autre identifiant, veuillez l'indiquer ici.
";
$elem["bind9/start-as-user"]["default"]="bind";
$elem["bind9/different-configuration-file"]["type"]="string";
$elem["bind9/different-configuration-file"]["description"]="Other startup options for named:
 Please provide any additional options (other than username) that should
 be passed to the BIND9 daemon (named) on startup.
";
$elem["bind9/different-configuration-file"]["descriptionde"]="Weitere Optionen für den Start des Named:
 Bitte geben Sie hier die zusätzlichen Optionen (außer dem Benutzernamen) ein, die dem Bind9-Daemon (Named) beim Starten übergeben werden sollen.
";
$elem["bind9/different-configuration-file"]["descriptionfr"]="Autres options à transmettre pour « named » :
 Veuillez indiquer toute option supplémentaire (autre que l'identifiant) qui doit être transmise au démarrage du démon de BIND9 (« named »).
";
$elem["bind9/different-configuration-file"]["default"]="";
$elem["bind9/run-resolvconf"]["type"]="boolean";
$elem["bind9/run-resolvconf"]["description"]="Should resolv.conf settings be overridden?
 Please choose whether the resolver should be forced to use the
 local BIND9 daemon (named) rather than what the current connection
 recommends, when this machine moves around.
";
$elem["bind9/run-resolvconf"]["descriptionde"]="Sollen die Einstellungen in resolv.conf ignoriert werden?
 Bitte wählen Sie aus, ob der Namensauflöser (Resolver) dazu gezwungen werden soll, den lokalen BIND9-Daemon (Named) zu verwenden, statt den aktuellen Verbindungsempfehlungen zu folgen, wenn diese Maschine bewegt wird.
";
$elem["bind9/run-resolvconf"]["descriptionfr"]="Faut-il écraser les paramètres de resolv.conf ?
 Veuillez choisir si la résolution de noms doit utiliser le démon BIND9 local (« named ») plutôt que les paramètres recommandés pour la connexion actuelle, lorsque cette machine est déplacée.
";
$elem["bind9/run-resolvconf"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
