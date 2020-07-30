<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("hearse");

$elem["hearse/user-email"]["type"]="string";
$elem["hearse/user-email"]["description"]="Email address to submit to the Hearse server:
 The Hearse server requires that you supply an email address before
 you can exchange bones files.  If you supply an address here it will
 be submitted to the server for you.  If you don't supply an address,
 hearse will be installed but it won't run automatically until you
 create an account yourself.
 .
 The server operator states that your email address will only be used
 to contact you about Hearse, and will never be given to any third
 party.  If you enter an invalid address, the server won't be able to
 support you if you download a bad bones file, and will be forced to
 ban you if any of your uploaded files are bad.
";
$elem["hearse/user-email"]["descriptionde"]="E-Mail-Adresse, die beim Hearse-Server eingereicht werden soll:
 Der Hearse-Server verlangt, dass Sie eine E-Mail-Adresse bereitstellen, bevor Sie Bones-Dateien austauschen können. Falls Sie hier eine Adresse angeben, wird diese für Sie beim Server eingereicht. Falls Sie keine Adresse angeben, wird Hearse installiert aber nicht automatisch ausgeführt, bis Sie selbst ein Konto erzeugt haben.
 .
 Der Server-Betreiber erklärt, dass Ihre E-Mail-Adresse nur dafür verwendet wird, um Sie über Hearse zu benachrichtigen und niemals an eine dritte Partei weitergegeben wird. Falls Sie eine ungültige Adresse angeben, wird der Server nicht in der Lage sein, Sie zu unterstützen, falls Sie eine defekte Bones-Datei herunterladen und muss Sie verbannen, falls von Ihnen hochgeladene Dateien defekt sind.
";
$elem["hearse/user-email"]["descriptionfr"]="Adresse électronique pour le serveur Hearse :
 Le serveur Hearse a besoin d'une adresse électronique pour pouvoir effectuer les échanges de fichiers squelette. Veuillez indiquer cette adresse ici. Si vous n'en indiquez pas, Hearse sera installé mais ne sera pas automatiquement lancé tant que vous n'aurez pas effectué cette opération vous-même.
 .
 L'opérateur du serveur s'engage à n'utiliser votre adresse électronique que pour vous contacter au sujet de Hearse et qu'elle ne sera en aucun cas transmise à une tierce personne. Si vous indiquez une adresse invalide, le serveur ne sera pas capable de vous aider si vous téléchargez de mauvais fichiers squelette et vous supprimera l'accès si les fichiers que vous placez sur le serveur sont incorrects.
";
$elem["hearse/user-email"]["default"]="";
PKG_OptionPageTail2($elem);
?>
