<?PHP
/*
 Description:m23 Basissystem
 Priority:10
*/


function run($id)
{
	$lang=getClientLanguage();

/*
The directory /m23/inc/distr/distname/ contains distribution spezific files with
functions for installing (clientInstall.php) and configuring (clientConfig.php) clients.
*/
	include("/m23/inc/distr/debian/clientInstall.php");
	include("/m23/inc/distr/debian/clientConfig.php");

	DISTR_baseInstall($lang,$id);
};
?>
