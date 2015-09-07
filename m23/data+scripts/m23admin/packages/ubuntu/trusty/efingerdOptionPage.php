<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("efingerd");

$elem["efingerd/allow_files"]["type"]="boolean";
$elem["efingerd/allow_files"]["description"]="Permit users to have their own configurable finger replies?
 You can decide if efingerd honours users' ~/.efingerd files.
 .
 If someone from network fingers given user, and the user has ~/.efingerd
 file readable and executable for efingerd daemon, this file will be
 executed and its output will be sent to the fingerer.
 .
 This can be either desired or not, depending on your system policy. In
 particular, allowing .efingerd files allows users to cheat about their
 real identity. However, efingerd can be configured to display users' full
 names (from passwd) as the first line of the reply, so they cannot hide
 themselves completely.
 .
 There is however a slight security concern: if you allow .efingerd files,
 these files will be executed under efingerd UID, so malicious users gain
 access to all files owned by efingerd - this becomes important when you
 make efingerd to log into some files writable by the daemon, unless you
 take appropriate precautions.
 .
 If you are the only user, or you trust your users, there is no reason to
 disable .efingerd files (and this is probably a reason you want to install
 efingerd for). However, if you expect your users to be nasty, you should
 better think about protecting from them - in particular, if you enable
 logging, make sure they cannot fiddle with the logfile - this is UP TO
 YOU.
";
$elem["efingerd/allow_files"]["descriptionde"]="Möchten Sie Ihren Benutzern eigene finger-Antworten erlauben?
 Sie können entscheiden, ob efingerd von Benutzern angelegte ~/.efingerd-Dateien beachten soll.
 .
 Wenn jemand aus dem Netz einen Benutzer »fingerd« und der Benutzer eine eigene ~/.efingerd-Datei lesbar und ausführbar für den efingerd-Daemon erstellt hat, wird diese Datei ausgeführt und die Ausgaben an den »Fingernden« geschickt.
 .
 Dies kann durchaus erwünscht sein, abhängig von Ihrer Systempolitik. Die .efingerd-Datei erlaubt dem Benutzer die wahre Identität zu verbergen. Es ist jedoch möglich, efingerd so zu konfigurieren, dass der volle Benutzername (aus der passwd) als Antwort zurück geschickt wird, damit können sich die Benutzer nicht vollständig hinter einer anderen Identität verstecken.
 .
 Diese Methode hat jedoch kleine Sicherheitsbedenken: Wenn Sie die .efingerd-Dateien erlauben, dann werden diese Dateien unter der UID von efingerd ausgeführt, ein böswilliger Benutzer kann dadurch Zugriff auf alle Dateien erlangen, die efingerd gehören. Dies ist z.B. wichtig, wenn Sie den efingerd-Daemon in für den Daemon schreibbare Protokolldateien schreiben lassen, es sei denn, Sie treffen entsprechende Vorkehrungen.
 .
 Wenn Sie der einzige Benutzer des Systems sind oder Ihren Benutzern vertrauen, gibt es keinen Grund .efingerd-Dateien nicht zu erlauben (das ist wahrscheinlich der Grund für die Installation von efingerd). Wenn Sie jedoch annehmen müssen, dass sich Ihre Benutzer unanständig verhalten, sollten Sie über einen Schutz nachdenken - genauer, wenn Sie das Loggen aktivieren, stellen Sie sicher, dass die Benutzer nichts damit anstellen können - es hängt an IHNEN.
";
$elem["efingerd/allow_files"]["descriptionfr"]="Faut-il permettre aux utilisateurs de configurer leur propre sortie de finger ?
 Cette option permet de décider si efingerd tiendra compte des fichiers « ~/.efingerd » des utilisateurs.
 .
 Si quelqu'un sur le réseau lance une requête finger sur un utilisateur qui possède un fichier « ~/.efingerd » lisible et exécutable par le démon efingerd, alors le contenu de ce fichier sera exécuté et la sortie sera envoyée au démon finger.
 .
 Cela peut être souhaitable ou non selon la politique de votre système. Veuillez noter qu'autoriser les fichiers « ~/.efingerd » permet à vos utilisateurs de tricher sur leur identité. Néanmoins, vous pouvez configurer efingerd pour afficher le nom complet des utilisateurs (grâce à passwd) sur la première ligne de la réponse, en les empêchant ainsi de se cacher complètement.
 .
 Cela induit une petite faille de sécurité : en permettant les fichiers « ~/.efingerd », ceux-ci seront exécutés avec les privilèges de efingerd, ce qui peut permettre à des utilisateurs malveillants d'avoir accès à tous les fichiers appartenant à cet identifiant. Cette faille est plus dangereuse si vous autorisez efingerd à écrire dans certains journaux, à moins de prendre des mesures spécifiques.
 .
 Si vous êtes le seul utilisateur ou que vous avez confiance en vos utilisateurs, il n'y a aucune raison de désactiver les fichiers « ~/.efingerd » (et cela est probablement une des raisons pour installer efingerd). Néanmoins, si vous doutez de vos utilisateurs, vous feriez mieux de vous en protéger. En particulier si vous activez la journalisation, veillez à ce que le fichier de journalisation ne puisse pas être corrompu.
";
$elem["efingerd/allow_files"]["default"]="true";
$elem["efingerd/show_names"]["type"]="boolean";
$elem["efingerd/show_names"]["description"]="Display users' real names?
 By default, efingerd displays users real names (from passwd) as the first
 line of finger reply. You may want to suppress it, but if you allow the
 use of .efingerd files at the same time, be aware that users can hide
 their identity for the fingerer.
 .
 If in doubt, select this option.
";
$elem["efingerd/show_names"]["descriptionde"]="Die richtigen Namen der Benutzer anzeigen?
 Standardmäßig zeigt efingerd die echten Benutzernamen (entnommen aus der passwd) in der ersten Zeile der finger-Antwort an. Sie möchten dies vielleicht verhindern, aber wenn Sie zugleich .efingerd-Dateien erlauben, bedenken Sie bitte, dass dann ein Benutzer seine komplette Identität verstecken kann.
 .
 Im Zweifelsfall wählen Sie bitte diese Option.
";
$elem["efingerd/show_names"]["descriptionfr"]="Faut-il afficher les vrais noms des utilisateurs ?
 Par défaut, efingerd affiche les vrais noms des utilisateurs (d'après le fichier passwd) sur la première ligne de la réponse. Vous pouvez choisir de supprimer cette option. Cependant, si vous autorisez simultanément l'utilisation de  «~/.efingerd », les utilisateurs pourront quand même cacher leur identité au démon finger.
 .
 Dans le doute, choisissez cette option.
";
$elem["efingerd/show_names"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
