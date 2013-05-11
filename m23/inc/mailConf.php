<?
	define('CONF_MAIL_adminMail',"hhabermann@pc-kiel.de");
	define('CONF_MAIL_defaultFrom',"hhabermann@pc-kiel.de");
	define('CONF_MAIL_mailer',"hhabermann@pc-kiel.de");

	//settings for automatic GPG encryption of eMails
	define('CONF_GPG_USER','bdpgpg');
	define('CONF_GPG_HOME','/home/bdpgpg/.gnupg');

	//CryptMail gateway to send the eMails
	define('sendURL','http://goos-habermann.de/mailGateway/cryptMailerServer.php');
// 	define('sendURL','http://tests.localhost/cryptMailerServer.php');

	//Salt for the CryptMailer (must be identically for client and server)
	define('CryptMailerSalt','ielei1EkaiYae8poo7chach0Ah1eikae');
	
	define('CryptMailerDBPWD','Mug2Raimae6ooSh6');
?>