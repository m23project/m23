<?PHP

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: functions for updating the server
$*/


/**
**name UPDATE_doUpdate()
**description Makes sure the package repository is included and upgrades the m23 server.
**/
function UPDATE_doUpdate()
{
	SERVER_runInBackground('m23serverupdate', '

	# Make sure the package repository is included
	if [ $(grep -h ^deb /etc/apt/sources.list /etc/apt/sources.list.d/* | grep -v deb-src | grep \'m23inst.goos-habermann.de\' -c) -eq 0 ]
	then
		echo \'deb http://m23inst.goos-habermann.de ./\' > /etc/apt/sources.list.d/m23.list
	fi

	# Enable unmaintained packages on UCS
	ucr set repository/online/unmaintained="yes"

	# Do the update
	export DEBIAN_FRONTEND=noninteractive
	apt-get update
	apt-get -m --force-yes -y dist-upgrade

	');
};





/**
**name UPDATE_running()
**description checks, if an update is running (returns true otherwise false)
**/
function UPDATE_running()
{
	return(SERVER_runningInScreen('m23serverupdate', 'root'));
}





/**
**name UPDATE_getUrl($base,$command,$version,$patchLevel)
**description returnes a correct URL to the update source
**parameter base: URL to the update script
**parameter command: "info" or "cmd"
**parameter version: m23 version
**parameter patchLevel: patch version number
**/
function UPDATE_getUrl($base,$command,$version,$patchLevel)
{
	return("$base?action=$command&ver=$version&patch=$patchLevel");
}





/**
**name UPDATE_getInfo($URL, $refreshTime = 0)
**description returns the information text from the URL
**parameter URL: URL to the information text
**parameter refreshTime: The time in minutes the file is downloaded again.
**/
function UPDATE_getInfo($URL, $refreshTime = 0)
{
	$search[0]="/cha: /";
	$search[1]="/fix: /";
	$search[2]="/new: /";
	$search[3]="/patch /";
	$replace[0]="<img src=\"/gfx/changed-mini.png\"> ";
	$replace[1]="<img src=\"/gfx/bug-mini.png\"> ";
	$replace[2]="<img src=\"/gfx/new-mini.png\"> ";
	$replace[3]="<img src=\"/gfx/info.png\"><br>";

	$tmp = explode("?",basename($URL));

	$text = HELPER_getRemoteFileContents($URL, "$tmp[0].txt", $refreshTime, false);

	//Because of "<ul></ul>" the text is 10 characters long at least
	if (!isset($text{10}))
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		return("<p><b>$I18N_noNewm23UpdatesAvailable</b></p>");
	}

	$out="";
	foreach (explode("\n",$text) as $part)
	{
		$out.=preg_replace($search, $replace, $part)."<br>";
	}

	return($out);
};

?>
