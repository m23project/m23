<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gnats-user");

$elem["gnats/site"]["type"]="string";
$elem["gnats/site"]["description"]="What is the name of the GNATS site?
 This name should be a single word, it is used as a part of the e-mail
 alias for delivering problem reports.
";
$elem["gnats/site"]["descriptionde"]="Wie lautet der Name der GNATS-Site?
 Dieser Name sollte ein einzelnes Wort sein; er wird als Teil vom E-Mail-Alias genutzt, an den Fehlerberichte eingesandt werden.
";
$elem["gnats/site"]["descriptionfr"]="Nom du site GNATS :
 Le nom de site GNATS devrait être un mot simple ; il est utilisé comme un alias d'adresse pour les rapports sur les incidents de livraison de courrier.
";
$elem["gnats/site"]["default"]="";
$elem["gnats/exim_user_uncomment"]["type"]="note";
$elem["gnats/exim_user_uncomment"]["description"]="You should enable scripts in the Exim configuration.
 It seems you have installed Exim, with script handling disabled in its
 configuration.  If this is so, GNATS will not be able to receive bug
 reports via e-mail.  I would suggest you to uncomment one of the lines
 .
 ${LINES}
 .
 in your file ${EXIMCONF}, in the section \"system_aliases\".
";
$elem["gnats/exim_user_uncomment"]["descriptionde"]="Sie sollten Skripte in der Exim-Konfiguration aktivieren.
 Scheinbar ist Exim installiert und die Verarbeitung von Skripten in der Konfiguration ist deaktiviert. Wenn das so ist, wird es GNATS nicht möglich sein, Fehlerberichte per E-Mail zu empfangen. Es wird empfohlen, dass Sie bei einer dieser Zeilen
 .
 ${LINES}
 .
 in Ihrer Datei ${EXIMCONF} (Abschnitt »system_aliases«) das Kommentarzeichen entfernen.
";
$elem["gnats/exim_user_uncomment"]["descriptionfr"]="Activation nécessaire du traitement des scripts dans la configuration d'Exim
 Exim semble être installé mais le traitement des scripts semble désactivé dans sa configuration. Si c'est bien le cas, GNATS ne sera pas capable de recevoir les rapports de bogues par messagerie. Il est conseillé de décommenter l'une des lignes suivantes :
 .
 ${LINES}
 .
 Cette modification doit se faire dans le fichier ${EXIMCONF}, à la section \"system_aliases\".
";
$elem["gnats/exim_user_uncomment"]["default"]="";
$elem["gnats/exim_user_add"]["type"]="note";
$elem["gnats/exim_user_add"]["description"]="You should enable scripts in the Exim configuration.
 It seems you have installed Exim, with no script handling enabled in its
 configuration.  If this is so, GNATS will not be able to receive bug
 reports via e-mail.  I would suggest you to add the line
 .
 user = gnats
 .
 to your file ${EXIMCONF}, in the section \"system_aliases\".
";
$elem["gnats/exim_user_add"]["descriptionde"]="Sie sollten Skripte in der Exim-Konfiguration aktivieren.
 Scheinbar ist Exim installiert und die Verarbeitung von Skripten in der Konfiguration ist nicht aktiviert. Wenn das so ist, wird es GNATS nicht möglich sein, Fehlerberichte per E-Mail zu empfangen. Es wird empfohlen, dass Sie die Zeile
 .
 user = gnats
 .
 zu Ihrer Datei ${EXIMCONF} (Abschnitt »system_aliases«) hinzufügen.
";
$elem["gnats/exim_user_add"]["descriptionfr"]="Activation nécessaire du traitement des scripts dans la configuration d'Exim
 Exim semble installé mais le traitement des scripts est désactivé dans sa configuration. Si c'est bien le cas, GNATS ne sera pas capable de recevoir les rapports de bogues par messagerie. Il est conseillé d'ajouter la ligne suivante :
 .
 user = gnats
 .
 Ce changement doit se faire dans le fichier ${EXIMCONF}, à la section \"system_aliases\".
";
$elem["gnats/exim_user_add"]["default"]="";
$elem["gnats/qmail"]["type"]="note";
$elem["gnats/qmail"]["description"]="You should set up qmail aliases for GNATS.
 It seems you use qmail as your mail transfer program.  It is recommended
 to add the following lines into your qmail users/assign file:
 .
  =gnats:gnats:41:41:/var/lib/gnats/gnats-adm:::
  =gnats-admin:gnats:41:41:/var/lib/gnats/gnats-adm:::
  =bugs:gnats:41:41:/var/lib/gnats/gnats-adm:-:bugs:
  =query-pr:gnats:41:41:/var/lib/gnats/gnats-adm:-:query:
  =${SITE}-gnats:gnats:41:41:/var/lib/gnats/gnats-adm:-:bugs:
";
$elem["gnats/qmail"]["descriptionde"]="Sie sollten in qmail Aliase für GNATS einrichten.
 Scheinbar wird qmail als Mail-Transfer-Programm verwendet. Es wird empfohlen, dass Sie die folgenden Zeilen zu Ihrer users/assign-Datei für qmail hinzuzufügen:
 .
  =gnats:gnats:41:41:/var/lib/gnats/gnats-adm:::
  =gnats-admin:gnats:41:41:/var/lib/gnats/gnats-adm:::
  =bugs:gnats:41:41:/var/lib/gnats/gnats-adm:-:bugs:
  =query-pr:gnats:41:41:/var/lib/gnats/gnats-adm:-:query:
  =${SITE}-gnats:gnats:41:41:/var/lib/gnats/gnats-adm:-:bugs:
";
$elem["gnats/qmail"]["descriptionfr"]="Définition des alias qmail pour GNATS
 Vous semblez utiliser qmail comme agent de transport de courrier. Il est recommandé d'ajouter les lignes suivantes à votre fichier users/assign de qmail :
 .
  =gnats:gnats:41:41:/var/lib/gnats/gnats-adm:::
  =gnats-admin:gnats:41:41:/var/lib/gnats/gnats-adm:::
  =bugs:gnats:41:41:/var/lib/gnats/gnats-adm:-:bugs:
  =query-pr:gnats:41:41:/var/lib/gnats/gnats-adm:-:query:
  =${SITE}-gnats:gnats:41:41:/var/lib/gnats/gnats-adm:-:bugs:
";
$elem["gnats/qmail"]["default"]="";
$elem["gnats/unknown_mailer"]["type"]="note";
$elem["gnats/unknown_mailer"]["description"]="You should set up GNATS mail aliases.
 GNATS can be set to receive bug reports and database queries through mail.
 However, it seems you are using a mailer I am not able to setup myself, so
 you must do it by hand. The following addresses on localhost and
 appropriate actions for them should be set up:
 .
 gnats: redirect this to GNATS administrator\"s address gnats-admin: alias
 for \"gnats\" bugs: pipe it to the command \"| /usr/lib/gnats/queue-pr -q\"
 query-pr: pipe it to the command \"| /usr/lib/gnats/mail-query\"
 ${SITE}-gnats: alias for \"bugs\"
";
$elem["gnats/unknown_mailer"]["descriptionde"]="Sie sollten Mail-Aliase für GNATS einrichten.
 GNATS kann so eingerichtet werden, dass es Fehlerberichte und Datenbankanfragen per E-Mail empfangen kann. Allerdings verwenden Sie scheinbar ein Mail-Programm, das nicht automatisch passend eingerichtet werden kann, so dass Sie dies manuell erledigen müssen. Die folgenden Adressen auf localhost sowie entsprechende Aktionen für diese Adressen sollten eingerichtet werden:
 .
 gnats: an die Adresse des GNATS-Administrators weiterleiten. gnats-admin: Alias für »gnats«. bugs: Weiterleitung (pipe) an das Kommando »| /usr/lib/gnats/queue-pr -q«. query-pr: Weiterleitung (pipe) an das Kommando »| /usr/lib/gnats/mail-query«. ${SITE}-gnats: Alias für »bugs«.
";
$elem["gnats/unknown_mailer"]["descriptionfr"]="Définition des alias d'adresse GNATS
 GNATS peut être paramétré pour recevoir des rapports de bogues et des requêtes de base de données à travers la messagerie. Cependant, vous semblez utiliser un client de courrier dont le paramétrage automatique est impossible. Vous devez donc le faire vous-même. L'adresse suivante sur l'hôte local et les actions appropriées pour le faire doivent être définis.
 .
 gnats: redirige ceci vers l'administrateur GNATS \"s adresse gnats-admin: alias pour les bogues \"gnats\": il faut le lier \"| /usr/lib/gnats/mail-query\" ${SITE}-gnats: alias pour \"bugs\"
";
$elem["gnats/unknown_mailer"]["default"]="";
$elem["gnats/user_multiple"]["type"]="error";
$elem["gnats/user_multiple"]["description"]="Multiple listings of the \"gnats\" userid were found in ${PASSWDFILE}.
 You should have only one \"gnats\" userid in your password file.
";
$elem["gnats/user_multiple"]["descriptionde"]="Mehrere Vorkommen der »gnats«-User-ID in ${PASSWDFILE} gefunden
 Die »gnats«-User-ID sollte in ${PASSWDFILE} nur einmal vorkommen.
";
$elem["gnats/user_multiple"]["descriptionfr"]="Définitions multiples de l'identifiant gnats dans ${PASSWDFILE}
 Vous ne devriez posséder qu'un seul identifiant « gnats » dans votre fichier de mots de passe.
";
$elem["gnats/user_multiple"]["default"]="";
PKG_OptionPageTail2($elem);
?>
