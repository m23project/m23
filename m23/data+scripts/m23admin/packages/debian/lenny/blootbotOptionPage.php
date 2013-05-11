<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("blootbot");

$elem["blootbot/db/name"]["type"]="string";
$elem["blootbot/db/name"]["description"]="The name of the database
 This is the database in which the bot will store information such as
 factoids.
";
$elem["blootbot/db/name"]["descriptionde"]="Name der Datenbank
 Dies ist der Name der Datenbank, in der der Bot Informationen (z.B. factoids) abspeichert.
";
$elem["blootbot/db/name"]["descriptionfr"]="Nom de la base de données :
 Veuillez indiquer ici le nom de la base de données qui conservera les informations, par exemple les « factoids ».
";
$elem["blootbot/db/name"]["default"]="blootbot";
$elem["blootbot/db/host"]["type"]="string";
$elem["blootbot/db/host"]["description"]="The hostname of the mySQL server
 This allows you to store the blootbot database on a remote server, should
 you so desire.
";
$elem["blootbot/db/host"]["descriptionde"]="Hostname des MySQL-Servers
 Hier können Sie auch einen entfernten Rechner angeben, auf dem dann die Blootbot-Daten gespeichert werden.
";
$elem["blootbot/db/host"]["descriptionfr"]="Nom d'hôte du serveur MySQL :
 Il est possible d'héberger la base de données sur un serveur distant, si vous le souhaitez.
";
$elem["blootbot/db/host"]["default"]="localhost";
$elem["blootbot/db/username"]["type"]="string";
$elem["blootbot/db/username"]["description"]="The username on the mySQL server
 This is the name of the user which will access the database. It should not
 be a normal user, but rather one reserved for blootbot.
";
$elem["blootbot/db/username"]["descriptionde"]="Benutzername auf dem MySQL-Server
 Hier geben Sie den Benutzer an, der Zugriff auf die Datenbank hat. Es sollte kein normaler Benutzer, sondern ein speziell für Blootbot reservierter Benutzer sein.
";
$elem["blootbot/db/username"]["descriptionfr"]="Identifiant de connexion au serveur MySQL :
 Veuillez indiquer ici l'identifiant de connexion au serveur de bases de données. Il est conseillé d'utiliser un identifiant dédié à blootbot.
";
$elem["blootbot/db/username"]["default"]="blootbot";
$elem["blootbot/db/password"]["type"]="password";
$elem["blootbot/db/password"]["description"]="The password for the mySQL account
 Enter any old thing here, it's not desperately secure, and you don't need
 to remember it.
";
$elem["blootbot/db/password"]["descriptionde"]="Passwort für den MySQL-Zugriff
 Geben Sie hier irgendetwas altes ein, es ist nicht sonderlich sicher und Sie brauchen es sich nicht zu merken.
";
$elem["blootbot/db/password"]["descriptionfr"]="Mot de passe de connexion au serveur MySQL :
 Vous pouvez choisir n'importe quoi ici : cela n'est pas critique pour la sécurité et vous n'aurez pas besoin de vous en souvenir.
";
$elem["blootbot/db/password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
