<?PHP
/*
 Description: m23 imaging base system
 Priority:10
*/


function run($id)
{
	$lang=getClientLanguage();

	$pkgParams=PKG_getPackageParams($id);
/*
The directory /m23/inc/distr/distname/ contains distribution spezific files with
functions for installing (clientInstall.php) and configuring (clientConfig.php) clients.
*/
	//check if there is set an extra distribution parameter
	if (!(strpos($pkgParams,"#extraDistr=")==false))
		{
			preg_match("/#extraDistr=[a-zA-Z0-9]+/", $pkgParams, $found);
			$temp = explode("=",$found[0]);
			$distr = $temp[1];
		}
	else
		$distr="imaging";
		
		
	include("/m23/inc/distr/$distr/clientInstall.php");
	include("/m23/inc/distr/$distr/clientConfig.php");

	DISTR_baseInstall($lang,$id);

	sendClientStatus($id,"done");
	sendClientStageStatus(STATUS_GREEN);

	executeNextWork();
};
?>
