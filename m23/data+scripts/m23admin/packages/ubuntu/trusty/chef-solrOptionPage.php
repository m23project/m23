<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("chef-solr");

$elem["chef-solr/amqp_password"]["type"]="password";
$elem["chef-solr/amqp_password"]["description"]="AMQP user password:
 Please choose the password for the \"chef\" AMQP user in the RabbitMQ
 vhost \"/chef\".
 .
 RabbitMQ's rabbitmqctl program, which will be used to set this password,
 cannot read input from a file. Instead the password will be passed to it
 as a quoted string, so it must not include any shell special characters
 (such as the exclamation mark) which will cause errors.
 .
 The password will be stored in /etc/chef/solr.rb and /etc/chef/server.rb
 as \"amqp_pass\".
";
$elem["chef-solr/amqp_password"]["descriptionde"]="AMQP-Benutzerpasswort:
 Bitte wählen Sie das Passwort für den AMQP-Benutzer »chef« im RabbitMQ-Vhost »chef«.
 .
 Das Rabbitmqctl-Programm von RabbitMQ, das zum Setzen dieses Passworts benutzt wird, kann die Eingabe nicht aus einer Datei lesen. Stattdessen wird das Passwort als in Anführungszeichen gesetzte Zeichenkette übergeben. Daher darf es keine Shell-Sonderzeichen (wie das Ausrufezeichen) enthalten, die Fehler verursachen werden.
 .
 Das Passwort wird in /etc/chef/solr.rb und /etc/chef/server.rb als »amqp_pass« gespeichert.
";
$elem["chef-solr/amqp_password"]["descriptionfr"]="Mot de passe de l'utilisateur AMQP :
 Veuillez choisir le mot de passe pour l'identifiant d'AMQP « chef », pour l'hôte virtuel RabbitMQ « /chef ».
 .
 Le programme rabbitmqctl de RabbitMQ, qui sera utilisé pour configurer ce mot de passe, ne peut pas le lire depuis un fichier. À la place, le mot de passe lui sera passé comme une chaîne entre guillemets, donc il ne doit pas comporter de caractère spécial qui provoquera des erreurs, comme « ! ».
 .
 Le mot de passe sera gardé dans /etc/chef/solr.rb et /etc/chef/server.rb en tant que « amqp_pass ».
";
$elem["chef-solr/amqp_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
