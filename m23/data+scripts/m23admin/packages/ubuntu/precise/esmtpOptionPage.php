<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("esmtp");

$elem["esmtp/overwriteconfig"]["type"]="boolean";
$elem["esmtp/overwriteconfig"]["description"]="Automatically overwrite configuration files?
 The mail configuration file /etc/esmtprc can be automatically updated on
 each upgrade with the information supplied to the debconf database. If you
 do not want this to happen (i.e., you want to maintain control of this file
 yourself) then unset this option to prevent the program touching this file.
";
$elem["esmtp/overwriteconfig"]["descriptionde"]="Konfigurationsdateien automatisch überschreiben?
 Die Konfigurationsdatei /etc/esmtprc kann bei jeder Aktualisierung des Pakets automatisch mit den Informationen aus der Debconf-Datenbank überarbeitet werden. Wenn Sie das nicht wollen (z. B. wenn Sie diese Datei selbst verwalten wollen), dann lehnen Sie diese Option ab, damit das Programm diese Datei unberührt lässt.
";
$elem["esmtp/overwriteconfig"]["descriptionfr"]="Ãcraser automatiquement les fichiers de configurationÂ ?
 Le fichier de configuration /etc/esmtprc peut Ãªtre mis Ã  jour automatiquement Ã  chaque mise Ã  niveau du paquet avec les informations fournies par la base de donnÃ©es de debconf. Si vous ne dÃ©sirez pas cette mise Ã  jour automatique (pour garder le contrÃ´le sur les modifications du fichier), n'acceptez pas les mises Ã  jour automatiques.
";
$elem["esmtp/overwriteconfig"]["default"]="false";
$elem["esmtp/hostname"]["type"]="string";
$elem["esmtp/hostname"]["description"]="SMTP server hostname:
";
$elem["esmtp/hostname"]["descriptionde"]="Rechnername des SMTP-Servers:
";
$elem["esmtp/hostname"]["descriptionfr"]="Nom d'hÃ´te du serveur SMTPÂ :
";
$elem["esmtp/hostname"]["default"]="localdomain";
$elem["esmtp/hostport"]["type"]="string";
$elem["esmtp/hostport"]["description"]="SMTP server port number:
";
$elem["esmtp/hostport"]["descriptionde"]="Portnummer des SMTP-Servers:
";
$elem["esmtp/hostport"]["descriptionfr"]="Port TCP du serveur SMTPÂ :
";
$elem["esmtp/hostport"]["default"]="25";
$elem["esmtp/username"]["type"]="string";
$elem["esmtp/username"]["description"]="Authentication username:
 This is the username to be given to the mailhub if authentication is
 required by the SMTP server.
 .
 Do NOT set the username and password on the system configuration file
 unless you are the sole user of this machine.  Esmtp is not run with suid
 privileges therefore the system configuration file must be readable by
 everyone.  If your SMTP server requires authorization and you are not the
 only user then accept the default options in the system configuration file
 for local delivery and specify your personal SMTP account details in the
 user configuration file.
";
$elem["esmtp/username"]["descriptionde"]="Benutzername zur Authentifizierung:
 Dieser Benutzername wird verwendet, wenn der SMTP-Server eine Authentifizierung verlangt.
 .
 Speichern Sie Benutzernamen und Passwort in der Konfigurationsdatei NUR , wenn Sie als einziger Benutzer an diesem Rechner arbeiten.  Weil Esmtp nicht mit SUID-Rechten läuft, muss die Konfigurationsdatei für alle lesbar sein.  Wenn Ihr SMTP-Server eine Authentifizierung verlangt und Sie nicht der einzige Benutzer des Rechners sind, lassen Sie die Standardwerte für lokale Auslieferung in der Konfigurationsdatei stehen. Legen Sie dann Ihre SMTP-Zugangsdaten in einer benutzereigenen Konfigurationsdatei ab.
";
$elem["esmtp/username"]["descriptionfr"]="IdentifiantÂ :
 Veuillez indiquer l'identifiant qu'utilisera mailhub si une authentification est demandÃ©e par le serveur SMTP.
 .
 Vous ne devez PAS inscrire d'identifiant et de mot de passe dans le fichier de configuration gÃ©nÃ©ral si vous n'Ãªtes pas le seul utilisateur de la machine. Esmtp n'est pas lancÃ© avec le bit Â«Â setuidÂ Â» positionnÃ©, donc le fichier de configuration est en lecture pour tout le monde. Si votre serveur SMTP demande une authentification et que vous n'Ãªtes pas le seul utilisateur de la machine, acceptez les options par dÃ©faut pour le fichier de configuration gÃ©nÃ©ral et inscrivez les dÃ©tails personnels de votre compte SMTP dans le fichier de configuration utilisateur.
";
$elem["esmtp/username"]["default"]="";
$elem["esmtp/password"]["type"]="password";
$elem["esmtp/password"]["description"]="Authentication password:
 This is the password to be given to the mailhub if authentication is
 required by the SMTP server.
";
$elem["esmtp/password"]["descriptionde"]="Passwort zur Authentifizierung:
 Dieses Passwort wird verwendet, wenn der SMTP-Server eine Authentifizierung verlangt.
";
$elem["esmtp/password"]["descriptionfr"]="Mot de passeÂ :
 Veuillez indiquer le mot de passe fourni Ã  mailhub si une authentification est demandÃ©e par le serveur SMTP.
";
$elem["esmtp/password"]["default"]="";
$elem["esmtp/starttls"]["type"]="select";
$elem["esmtp/starttls"]["choices"][1]="enabled";
$elem["esmtp/starttls"]["choices"][2]="disabled";
$elem["esmtp/starttls"]["choicesde"][1]="einschalten";
$elem["esmtp/starttls"]["choicesde"][2]="ausschalten";
$elem["esmtp/starttls"]["choicesfr"][1]="ActivÃ©e";
$elem["esmtp/starttls"]["choicesfr"][2]="DÃ©sactivÃ©e";
$elem["esmtp/starttls"]["description"]="Whether to use the Starttls extension
";
$elem["esmtp/starttls"]["descriptionde"]="Start-TLS-Erweiterung benutzen?
";
$elem["esmtp/starttls"]["descriptionfr"]="Utilisation de l'extension starttlsÂ :
";
$elem["esmtp/starttls"]["default"]="disabled";
$elem["esmtp/certificate_passphrase"]["type"]="password";
$elem["esmtp/certificate_passphrase"]["description"]="Certificate passphrase:
  This is the certificate passphrase for the StartTLS extension.
";
$elem["esmtp/certificate_passphrase"]["descriptionde"]="Zertifikat-Passwort:
 Geben Sie das Passwort für die Start-TLS-Erweiterung ein.
";
$elem["esmtp/certificate_passphrase"]["descriptionfr"]="Phrase secrÃ¨te pour le certificatÂ :
 Veuillez indiquer la phrase secrÃ¨te du certificat utilisÃ©e par l'extension starttls.
";
$elem["esmtp/certificate_passphrase"]["default"]="";
$elem["esmtp/mda"]["type"]="select";
$elem["esmtp/mda"]["choices"][1]="none";
$elem["esmtp/mda"]["choices"][2]="procmail";
$elem["esmtp/mda"]["choicesde"][1]="keiner";
$elem["esmtp/mda"]["choicesde"][2]="procmail";
$elem["esmtp/mda"]["choicesfr"][1]="Autre";
$elem["esmtp/mda"]["choicesfr"][2]="Procmail";
$elem["esmtp/mda"]["description"]="Mail Delivery Agent
 This is the Mail Delivery Agent used for local mail delivery.
";
$elem["esmtp/mda"]["descriptionde"]="E-Mail-Transport-Programm
 Wählen Sie das E-Mail-Transport-Programm für die lokale Auslieferung aus.
";
$elem["esmtp/mda"]["descriptionfr"]="Agent de distribution de courrierÂ :
 Veuillez indiquer l'agent de distribution du courrier local.
";
$elem["esmtp/mda"]["default"]="";
PKG_OptionPageTail2($elem);
?>
