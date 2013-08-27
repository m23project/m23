<?PHP
/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: functions for burning CDs
$*/


define("BURNSTATE_IDLE",0);
define("BURNSTATE_BLANK",1);
define("BURNSTATE_BURN",2);

/**
**name BURN_listBurners(&$first)
**description returnes a selection of the available burners
**parameter first: entry that should be shown first
**/
function BURN_listBurners(&$first)
{
	$out=exec("sudo cdrdao scanbus 2> /dev/stdout | grep ',' | tr -s ' '");

	$list=explode("\n",$out);
	for ($i=0; $i < count($list); $i++)
		{
			$sp=explode(' ',$list[$i]);
			$list[$i]= "$sp[0] $sp[1]";
		}

	return(HTML_listSelection("SEL_burner",$list,$first));
}





/**
**name BURN_getDevice($burner)
**description returnes the device name for cdrecord from a specific burner
**parameter burner: device name and burner name
**/
function BURN_getDevice($burner)
{
	$burner_name = explode (" ",$burner);
	return($burner_name[0]);
};





/**
**name BURN_blank($dev, $method)
**description blanks a CD-RW
**parameter dev: device name of the burner
**parameter method: blanking method (fast, all);
**/
function BURN_blank($dev, $method)
{

if (BURN_getStatus()==BURNSTATE_IDLE)
	{
		$blankCommand="
sudo screen -dmS m23cdBlank sh /m23/bin/blankCD $dev $method
";
// 	print($blankCommand);
		exec($blankCommand);
	};
};





/**
**name BURN_burn($dev, $iso)
**description burns an ISO
**parameter dev: device name of the burner
**parameter iso: name of the ISO file
**parameter speed: the write speed
**/
function BURN_burn($dev, $iso, $speed)
{

if (BURN_getStatus()==BURNSTATE_IDLE)
	{
		$burnCommand="
sudo screen -dmS m23cdBlank /m23/bin/burnCD $dev $iso $speed
";
		exec($burnCommand);
	};
};





/**
**name BURN_getStatus()
**description returns the status of the burner (BURNSTATE_IDLE, BURNSTATE_BLANK, BURNSTATE_BURN)
**/
function BURN_getStatus()
{
	if (!file_exists("/tmp/m23cdBurner.LOCK"))
		return(BURNSTATE_IDLE);
	else
		{
			$file = fopen("/tmp/m23cdBurner.LOCK","r");
			$code = fgets($file);
			fclose($file);

			switch ($code)
				{
					case "blank": return(BURNSTATE_BLANK);
					case "burn": return(BURNSTATE_BURN);
				};
		};
};





/**
**name BURN_showLog()
**description shows a status info window about the current burner state
**/
function BURN_showLog()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	
	if (file_exists("/tmp/m23cdBurner.log"))
		{
			$file = fopen("/tmp/m23cdBurner.log","r");

			while (!feof($file))
				$logData.=fgets($file);

				fclose($file);

			$logDataHtml="<textarea readonly=\"true\" cols=\"80\" rows=\"15\">
				$logData
				</textarea><br><br>";
		};
	
	HTML_showTableHeader();
	
	echo("<tr>
		<td>
			<span class=\"titlesmal\">$I18N_burner_status</span><br><br>");

	switch (BURN_getStatus())
		{
			case BURNSTATE_IDLE: $status = "<img src=\"/gfx/status/green.png\"> $I18N_burner_idle"; break;
			case BURNSTATE_BLANK: $status = "<img src=\"/gfx/status/yellow.png\"> $I18N_blanking_in_progress"; break;
			case BURNSTATE_BURN: $status = "<img src=\"/gfx/status/red.png\"> $I18N_burning_in_progress"; break;
		};

	echo("$logDataHtml
		<center>$I18N_status: $status<br><br>
		<input type=\"submit\" name=\"BUT_refresh\" value=\"$I18N_refresh\"></center>
		</td>
		</tr>");
	
	HTML_showTableEnd();
};





/**
**name BURN_checkISO($arch="i386")
**description checks, if the client ISO exist and create i otherwise
**parameter arch: Architecture of the ISO (32 bits = i386, 64 bits = amd64).
**/
function BURN_checkISO($arch="i386")
{
	if ($arch != "i386")
		$addArch = "-$arch";

	$isoName="/m23/data+scripts/iso/m23client$addArch.iso";
	
	if (!file_exists($isoName) || (filesize($isoName) < 1000))
		{
			$cmd="sudo chmod 775 /mdk/client; sudo chmod 775 /mdk/client/m23client-$arch.iso; sudo rm $isoName; sudo ln -s /mdk/client/m23client-$arch.iso $isoName";
			exec($cmd);
		};
};





/**
**name BURN_getISOSize($arch="i386")
**description Gets the size of an ISO.
**parameter arch: Architecture of the ISO (32 bits = i386, 64 bits = amd64).
**returns: Size of the ISO or error message, if the ISO could not be found.
**/
function BURN_getISOSize($arch="i386")
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	if ($arch != "i386")
		$addArch = "-$arch";

	//check for the ISO file
	if (file_exists("/m23/data+scripts/iso/m23client$addArch.iso"))
		$isoSize=sprintf("%.2f",filesize(readlink("/m23/data+scripts/iso/m23client$addArch.iso"))/1048576)." MB";
	else
		$isoSize=$I18N_isoFileMissing;
		
	return($isoSize);
}
?>
