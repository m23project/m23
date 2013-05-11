<?PHP

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: functions for updating the server
$*/


/**
**name UPDATE_doUpdate($URL)
**description downloads and executes the update script.
**parameter URL: url to fetch the update file from
**/
function UPDATE_doUpdate($URL)
{
	$cmd="
	touch /m23/tmp/serverUpdate.lock
	wget \"$URL\" -O /m23/tmp/updateCommand.sh
	chmod +x /m23/tmp/updateCommand.sh
	echo \"rm /m23/tmp/serverUpdate.lock\" >> /m23/tmp/updateCommand.sh

	sudo screen -dmS m23install /m23/tmp/updateCommand.sh
	";

	system($cmd);
};





/**
**name UPDATE_running()
**description checks, if an update is running (returns true otherwise false)
**/
function UPDATE_running()
{
	return(exec("sudo screen -ls | grep -c '.m23install '") == 1);
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
