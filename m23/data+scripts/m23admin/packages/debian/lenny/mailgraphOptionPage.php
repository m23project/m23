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
 Mailgraph kann beim Hochfahren als Daemon gestartet werden. Das Programm wird dann Ihre Postfix-Protokolldatei auf Änderungen überwachen. Dies wird empfohlen.
 .
 Die andere Methode ist, mailgraph mit dem Parameter -c von Hand aufzurufen.
";
$elem["mailgraph/start_on_boot"]["descriptionfr"]="Mailgraph doit-il être lancé au démarrage ?
 Mailgraph peut être lancé au démarrage, en mode démon. Il pourra ainsi contrôler les modifications dans le fichier de journalisation de Postfix. Cette option est recommandée.
 .
 Il est également possible d'utiliser mailgraph.pl en le lançant vous-même avec le paramètre « -c ».
";
$elem["mailgraph/start_on_boot"]["default"]="";
$elem["mailgraph/mail_log"]["type"]="string";
$elem["mailgraph/mail_log"]["description"]="Logfile used by mailgraph:
 Enter the logfile which should be used to create the databases for
 mailgraph. If unsure, leave default (/var/log/mail.log).
";
$elem["mailgraph/mail_log"]["descriptionde"]="Von mailgraph verwendete Protokolldatei:
 Geben Sie die Protokolldatei ein, die verwendet werden soll, um die Datenbanken für mailgraph zu erstellen. Falls Sie unsicher sind, belassen Sie die Voreinstellung (/var/log/mail.log).
";
$elem["mailgraph/mail_log"]["descriptionfr"]="Fichier de journalisation à utiliser par mailgraph :
 Veuillez indiquer le fichier de journalisation que mailgraph analysera pour créer sa base de données. Dans le doute, laissez la valeur par défaut.
";
$elem["mailgraph/mail_log"]["default"]="/var/log/mail.log";
$elem["mailgraph/ignore_localhost"]["type"]="boolean";
$elem["mailgraph/ignore_localhost"]["description"]="Count incoming mail as outgoing mail?
 If you count incoming mail as outgoing mail (default), mail is counted more
 than once if you use content filters like amavis, so you'll get wrong values.
 If you're using some content filter, disable this.
";
$elem["mailgraph/ignore_localhost"]["descriptionde"]="Soll eingehende E-Mail als abgehende E-Mail gezählt werden?
 Wenn Sie eingehende E-Mail als abgehende E-Mail zählen (dies ist die Voreinstellung), werden E-Mails bei Verwendung von Inhaltsfiltern wie amavis mehrfach gezählt. Sie erhalten dann falsche Ergebnisse. Falls Sie einen Inhaltsfilter verwenden, deaktivieren Sie diese Option.
";
$elem["mailgraph/ignore_localhost"]["descriptionfr"]="Faut-il compter les courriels entrants comme des courriels sortants ?
 Si vous comptez les courriels entrants avec les courriels sortants (comportement par défaut), ils seront dénombrés plus d'une fois si vous utilisez des filtres de contenu comme amavis. Les valeurs seront donc incorrectes. Si vous utilisez un filtre de contenu de ce type, ne choisissez pas cette option.
";
$elem["mailgraph/ignore_localhost"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
