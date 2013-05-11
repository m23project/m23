<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tiger");

$elem["tiger/mail_rcpt"]["type"]="string";
$elem["tiger/mail_rcpt"]["description"]="Who should receive the daily mails?
 The user you enter below will receive all the emails that 'tiger' sends
 during the day when running the cron jobs. This does not mean that when
 executing the 'tiger' program standalone this user will receive the
 reports. Also note that any administrator will be able to access the
 reports since they are available in the /var/log/tiger/ directory.
";
$elem["tiger/mail_rcpt"]["descriptionde"]="Wer soll die täglichen E-Mails empfangen?
 Der Benutzer, den Sie unten eingeben, wird alle von 'tiger' versandten E-Mails erhalten, wenn die Cron-Jobs laufen. Das bedeutet nicht, dass der Benutzer Berichte erhält, wenn Sie 'tiger' als einzelnes Programm aufrufen. Beachten Sie auch, dass jeder Administrator auf die Berichte zugreifen kann, weil sie im Verzeichnis /var/log/tiger/ verfügbar sind.
";
$elem["tiger/mail_rcpt"]["descriptionfr"]="Destinataire des courriels quotidiens :
 L'utilisateur que vous indiquerez recevra tous les courriels envoyés par « tiger » lors de l'exécution des tâches périodiques. Cet utilisateur ne recevra pas les rapports lors de l'exécution directe du programme « tiger ». Veuillez aussi noter que tout administrateur pourra accéder aux rapports puisqu'ils seront disponibles dans le répertoire /var/log/tiger/.
";
$elem["tiger/mail_rcpt"]["default"]="root";
$elem["tiger/policy_adapt"]["type"]="note";
$elem["tiger/policy_adapt"]["description"]="Take a minute to customize 'tiger'
 You should customize the files at /etc/tiger/ to adapt to your local
 security policy. Firstly, customizing the kind of checks that will be made
 in this system, as well as the information needed for tests in order to
 reduce false positives (in /etc/tiger/tigerrc). Secondly, customizing at
 what times these tests will be executed (in /etc/tiger/cronrc). And
 thirdly, since some modules warnings might not be problems regarding your
 current security policy, define a given template file at
 /etc/tiger/templates/ using runs from each of the modules. Once defined,
 all the runs will be checked against each one of the templates available
 (one per module) and only new warnings will be issued.
";
$elem["tiger/policy_adapt"]["descriptionde"]="Nehmen Sie sich die Zeit, 'tiger' einzurichten.
 Sie sollten die Dateien im Verzeichnis /etc/tiger/ an Ihre Sicherheits- Richtlinie anpassen. Zuerst sollten Sie die Tests einrichten, die auf Ihrem System gemacht werden und die Daten für die Tests (in der Datei /etc/tiger/tigerrc) bereitstellen, um Falschmeldungen zu vermeiden. Dann sollten Sie (in der Datei /etc/tiger/cronrc) einstellen, zu welchen Zeiten die Tests gemacht werden. Danach sollten Sie aus den Durchläufen der Module Schablonen (im Verzeichnis /etc/tiger/templates/) erstellen, wenn Module Warnungen ausgeben, die für Ihre Sicherheits-Richtlinie nicht problematisch sind. Sind die Schablonen erstellt, wird jeder Durchlauf mit den verfügbaren Schablonen (eine pro Modul) verglichen und es werden nur neue Warnungen angezeigt.
";
$elem["tiger/policy_adapt"]["descriptionfr"]="Prenez le temps de personnaliser « tiger »
 Vous devriez personnaliser les fichiers dans /etc/tiger/ pour les adapter à votre politique de sécurité locale. Commencez par personnaliser (dans /etc/tiger/tigerrc) les vérifications qui sont faites sur le système, ainsi que les informations nécessaires aux tests. Cela permettra de réduire le nombre de faux positifs. Ensuite, personnalisez (dans /etc/tiger/cronrc) l'heure à laquelle ces tests sont exécutés. Puis, si les avertissements de certains modules peuvent être ignorés au regard de votre politique de sécurité actuelle, définissez un fichier de modèle dans /etc/tiger/templates/ après avoir utilisé chaque module. Par la suite, après chaque exécution, le résultat sera comparé à ces fichiers de modèles et seuls les nouveaux avertissements seront signalés.
";
$elem["tiger/policy_adapt"]["default"]="";
PKG_OptionPageTail2($elem);
?>
