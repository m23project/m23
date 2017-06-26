<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mailgraph");

$elem["mailgraph/start_on_boot"]["type"]="boolean";
$elem["mailgraph/start_on_boot"]["description"]="Should Mailgraph start on boot?
 Mailgraph can start on boot time as a daemon. Then it will monitor
 your Postfix logfile for changes. This is recommended.
 .
 The other method is to call mailgraph by hand with the -c parameter.
";
$elem["mailgraph/start_on_boot"]["descriptionde"]="Soll Mailgraph beim Hochfahren gestartet werden?
 Es wird empfohlen, Mailgraph beim Hochfahren als Daemon zu starten. Der Daemon wird dann Ihre Postfix-Protokolldatei auf Änderungen überwachen.
 .
 Alternativ können Sie Mailgraph mit dem Parameter -c von Hand aufrufen.
";
$elem["mailgraph/start_on_boot"]["descriptionfr"]="Mailgraph doit-il être lancé au démarrage ?
 Mailgraph peut être lancé au démarrage, en mode démon. Il pourra ainsi contrôler les modifications dans le fichier de journalisation de Postfix. Cette option est recommandée.
 .
 Il est également possible d'utiliser mailgraph.pl en le lançant vous-même avec le paramètre « -c ».
";
$elem["mailgraph/start_on_boot"]["default"]="true";
$elem["mailgraph/mail_log"]["type"]="string";
$elem["mailgraph/mail_log"]["description"]="Logfile used by mailgraph:
 Enter the logfile which should be used to create the databases for
 mailgraph. If unsure, leave default (/var/log/mail.log).
";
$elem["mailgraph/mail_log"]["descriptionde"]="Von Mailgraph verwendete Protokolldatei:
 Geben Sie die Protokolldatei an, die bei der Erstellung der Mailgraph-Datenbanken verwendet werden soll. Falls Sie unsicher sind, übernehmen Sie die Voreinstellung (/var/log/mail.log).
";
$elem["mailgraph/mail_log"]["descriptionfr"]="Fichier de journalisation à utiliser par mailgraph :
 Veuillez indiquer le fichier de journalisation que mailgraph analysera pour créer sa base de données. Dans le doute, laissez la valeur par défaut.
";
$elem["mailgraph/mail_log"]["default"]="/var/log/mail.log";
$elem["mailgraph/ignore_localhost"]["type"]="boolean";
$elem["mailgraph/ignore_localhost"]["description"]="Ignore mail to/from localhost?
 When using a content filter like amavis, incoming mail is counted more
 than once, which will result in wrong values.
 If you use some content filter, you should choose this option.
";
$elem["mailgraph/ignore_localhost"]["descriptionde"]="E-Mail von/zu Ihrem Rechner ignorieren?
 Wenn Sie E-Mail-Inhaltsfilter wie AMaViS einsetzen, werden eingehende E-Mails mehrfach gezählt. Sie erhalten dann falsche Ergebnisse. Falls Sie einen Inhaltsfilter verwenden, sollten Sie diese Option wählen.
";
$elem["mailgraph/ignore_localhost"]["descriptionfr"]="Faut-il ignorer les courriers de et pour localhost ?
 Si vous utilisez des filtres de contenu comme amavis, les courriels entrants seront comptés plus d'une fois et les résultats de mailgraph seront donc incorrects. Si vous utilisez un filtre de contenu de ce type, vous devriez choisir cette option.
";
$elem["mailgraph/ignore_localhost"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
