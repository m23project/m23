<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("phabricator");

$elem["phabricator/domain_name"]["type"]="string";
$elem["phabricator/domain_name"]["description"]="Domain name or subdomain name used by phabricator:
 Phabricator must be installed on an entire domain. You can not install it to a path on an existing domain,
 like example.com/phabricator/. Instead, install it to an entire domain or subdomain, like phabricator.example.com.
";
$elem["phabricator/domain_name"]["descriptionde"]="Für Phabricator bestimmte Domain oder Subdomain:
 Phabricator muss einer Domain zugeordnet sein. Die Mitbenutzung einer bestehenden Domain durch Einrichtung eines Pfades wie example.com/phabricator ist nicht möglich. Richten Sie stattdessen eine gesamte Domain oder eine Subdomain wie phabricator.example.com ein.
";
$elem["phabricator/domain_name"]["descriptionfr"]="Nom du domaine ou du sous-domaine utilisé par phabricator:
 Phabricator doit être installé sur son propre domaine. Vous ne pouvez pas l'installer dans un sous-répertoire d'un domaine existant tel que exemple.com/phabricator/. Vous devez au contraire l'installer sur un domaine ou un sous-domaine entier, comme par exemple phabricator.exemple.com.
";
$elem["phabricator/domain_name"]["default"]="phabricator.example.com";
$elem["phabricator/mysql_host"]["type"]="string";
$elem["phabricator/mysql_host"]["description"]="hostname or IP address of the MySQL server:
 Phabricator is usually installed with the MySQL database on the same host (referred as localhost), but some advanced
 users might want to put the database on a different host.
";
$elem["phabricator/mysql_host"]["descriptionde"]="Hostname oder IP-Adresse des MySQL-Servers:
 Üblicherweise befinden sich Phabricator und die MySQL-Datenbank auf dem selben Rechner, wobei der MySQL-Server als »localhost« angesprochen wird. Fortgeschrittene Benutzer können die Datenbank allerdings auch auf einem anderen Hostrechner einrichten.
";
$elem["phabricator/mysql_host"]["descriptionfr"]="Nom d'hôte ou adresse IP du serveur MySQL:
 Phabricator est généralement installé avec la base de données MySQL sur lamême machine (désignée par localhost), mais certains utilisateurs avancéspourraient vouloir mettre la base de données sur une autre machine.
";
$elem["phabricator/mysql_host"]["default"]="localhost";
$elem["phabricator/phabricator_mysql_user"]["type"]="string";
$elem["phabricator/phabricator_mysql_user"]["description"]="MySQL administrator account username:
 Please enter the username of a MySQL account that has enough privileges to create and use phabricator_* databases.
 .
 You can create such a user with the following MySQL command:
 .
 grant all privileges on `phabricator\_%`.* to 'phabricator'@localhost identified by 'PASSWORD';
";
$elem["phabricator/phabricator_mysql_user"]["descriptionde"]="Benutzername des MySQL-Administrators:
 Bitte geben Sie den Benutzernamen eines MySQL-Administrators ein. Er muss die zum Anlegen und zum Benutzen von phabricator_*-Datenbanken nötigen Rechte haben. 
 .
 Sie können einen solchen Benutzer mit folgendem MySQL-Befehl anlegen:
 .
 grant all privileges on `phabricator\_%`.* to 'phabricator'@localhost identified by 'PASSWORD';
";
$elem["phabricator/phabricator_mysql_user"]["descriptionfr"]="Nom d'utilisateur d'un compte MySQL administrateur:
 Veuillez entrer le nom d'utilisateur d'un compte MySQL qui a assez de droits pour créer et utiliser des bases de données phabricator_*.
 .
 Vous pouvez créer un tel utilisateur avec la commande MySQL suivante:
 .
 grant all privileges on `phabricator\_%`.* to 'phabricator'@localhost identified by 'MOTDEPASSE';
";
$elem["phabricator/phabricator_mysql_user"]["default"]="";
$elem["phabricator/phabricator_mysql_pwd"]["type"]="password";
$elem["phabricator/phabricator_mysql_pwd"]["description"]="MySQL administrator account password:
";
$elem["phabricator/phabricator_mysql_pwd"]["descriptionde"]="Passwort des MySQL-Administrators:
";
$elem["phabricator/phabricator_mysql_pwd"]["descriptionfr"]="Mot de passe du compte administrateur MySQL :
";
$elem["phabricator/phabricator_mysql_pwd"]["default"]="";
$elem["phabricator/pwd_check"]["type"]="password";
$elem["phabricator/pwd_check"]["description"]="MySQL administrator account password confirmation:
 Please enter the MySQL administrator account password again for confirmation.
";
$elem["phabricator/pwd_check"]["descriptionde"]="Passwort des MySQL-Administrators bestätigen:
 Bitte geben Sie zur Bestätigung das Passwort des MySQL-Administrators nochmals ein.
";
$elem["phabricator/pwd_check"]["descriptionfr"]="Mot de passe du compte administrateur MySQL (confirmation):
 Veuillez resaisir le mot de passe du compte administrateur MySQL pour le confirmer.
";
$elem["phabricator/pwd_check"]["default"]="";
$elem["phabricator/password_mismatch"]["type"]="error";
$elem["phabricator/password_mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["phabricator/password_mismatch"]["descriptionde"]="Fehlerhaftes Passwort
 Die beiden Passwörter stimmten nicht überein. Bitte versuchen Sie es nochmal.
";
$elem["phabricator/password_mismatch"]["descriptionfr"]="Erreur de mot de passe
 Les deux mots de passe que vous avez saisis ne sont pas identiques. Merci de réessayer.
";
$elem["phabricator/password_mismatch"]["default"]="";
$elem["phabricator/webserver"]["type"]="select";
$elem["phabricator/webserver"]["choices"][1]="apache2";
$elem["phabricator/webserver"]["choices"][2]="nginx";
$elem["phabricator/webserver"]["choices"][3]="lighttpd";
$elem["phabricator/webserver"]["choicesde"][1]="apache2";
$elem["phabricator/webserver"]["choicesde"][2]="nginx";
$elem["phabricator/webserver"]["choicesde"][3]="lighttpd";
$elem["phabricator/webserver"]["choicesfr"][1]="apache2";
$elem["phabricator/webserver"]["choicesfr"][2]="nginx";
$elem["phabricator/webserver"]["choicesfr"][3]="lighttpd";
$elem["phabricator/webserver"]["description"]="Web server:
 Please select the web server to configure automatically for Phabricator.
 .
 Select \"None\" if you would like to configure the web server manually.
";
$elem["phabricator/webserver"]["descriptionde"]="Web server:
 Bitte wählen Sie den Webserver aus, der für Phabricator automatisch konfiguriert werden soll.
 .
 Falls Sie den Web-Server manuell konfigurieren möchten, wählen Sie »Keiner«.
";
$elem["phabricator/webserver"]["descriptionfr"]="Serveur web:
 Veuillez choisir le serveur web à configurer automatiquement pour Phabricator.
 .
 Choisissez \"Aucun\" si vous souhaitez configurer le serveur web manuellement.
";
$elem["phabricator/webserver"]["default"]="apache2";
PKG_OptionPageTail2($elem);
?>
