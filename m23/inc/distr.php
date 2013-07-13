<?PHP





/**
**name DISTR_releaseVersionTranslator($release)
**description Adds the version number to a Debian or Ubuntu release.
**parameter release: Release name (e.g. etch)
**returns Combination of release code name and version number.
**/
function DISTR_releaseVersionTranslator($release)
{
	//Ubuntu
	$r['warty']="4.10";
	$r['hoary']="5.04";
	$r['breezy']="5.10";
	$r['dapper']="6.06 LTS";
	$r['edgy']="6.10";
	$r['feisty']="7.04";
	$r['gutsy']="7.10";
	$r['hardy']="8.04 LTS";
	$r['intrepid']="8.10";
	$r['lucid']="10.04 LTS";
	$r['precise']="12.04 LTS";

	//Debian
	$r['sarge']="3.1";
	$r['etch']="4.0";
	$r['lenny']="5.0";
	$r['squeeze']="6.0";
	$r['wheezy']="7.x";

	return(ucfirst($release)." ".$r[$release]);
}





/**
**name DISTR_listDistributions()
**description returns a list of the directory names of the distributions
**parameter addEmpty: set to true if an empty fake distribution shoul be put on top of the list
**returns An array that contains the system names of all distributions.
**/
function DISTR_listDistributions($addEmpty=false)
{
	$nr = 0;
	if ($addEmpty)
		$out[$nr++]=" ";

	$dirH = opendir ("/m23/inc/distr/");

	while (false !== ($dir = readdir ($dirH)))
	{
		if (is_dir ("/m23/inc/distr/".$dir) &&
			($dir != '.') &&
			($dir != '..') &&
			($dir != 'baseSysFileLists'))
				$out[$nr++] = $dir;
	}

	closedir($dirH);

	return($out);
};





/**
**name DISTR_getDescriptionValues($shortName)
**description gets the valuest stored in the info.txt file of the distributions and returns a associative array
**parameter shortName: the short name of the distribution
**/
function DISTR_getDescriptionValues($shortName)
{
	if (file_exists("/m23/inc/distr/$shortName/info.txt"))
		$file = fopen("/m23/inc/distr/$shortName/info.txt","r");
		else
		return("");


	do
		{
			$line = fgets($file,10000);

			$varValue = explode("=",$line);

			if (($line[0]!='#') &&
				(strlen($varValue[0]) > 0) &&
				(strlen($varValue[1]) > 0))
				{
					$out[chop($varValue[0])] = chop($varValue[1]);
				}
		}
	while (!feof($file));

	fclose($file);

	return($out);
};





/**
**name DISTR_DistributionsSelections($selName,$first)
**description generates a selection/option form of the available distributions
**parameter selName: name of the selection
**parameter first: shortName of the distribution to show first
**/
function DISTR_DistributionsSelections($selName,$first,$addEmpty=false)
{
	$dists = DISTR_listDistributions($addEmpty);

	$out="<select name=\"$selName\" size=\"1\">";


	//check if $first is set
	if (strlen($first) > 0)
		{
			$info = DISTR_getDescriptionValues($first);

			$out.="<option value=\"$first\">".$info["Name"]."</option>";
		};


	foreach($dists as $dist)
		if ($dist != $first)
		{
			$info = DISTR_getDescriptionValues($dist);

			$out.="<option value=\"$dist\">".$info["Name"]."</option>";
		};

	$out.="</select>";

	return($out);
};





/**
**name DISTR_geti18nValue($lang,$variable,$values)
**description returns a value of the info file and tries to get it in the selected language. if it doesn't exist it is returned in the default language
**parameter lang: language as 2 letter code (e.g. de)
**parameter variable: the name of the variable you want to get (e.g. Description)
**parameter values: the associate array of the info.txt values
**/
function DISTR_geti18nValue($lang,$variable,$values)
{
	$variable=chop($variable);
	if (isset($values["$variable".'['."$lang".']']))
		$out = $values["$variable".'['."$lang".']'];
	else //if not fall back to english
		$out = $values["$variable"];

	return($out);
};





/**
**name DISTR_listCommaSeperated($variable,$values)
**description returns a normal array with the values of the specified variable (e.g. var: GUIs => result: [0] => Textmode [1] => KDE3 [2] => KDEwoody ...)
**parameter variable: the variable to search for
**parameter values: the values of the distribution text file (info.txt) read with DISTR_getDescriptionValues
**/
function DISTR_listCommaSeperated($variable,$values)
{
	return(explode(",",$values[$variable]));
};





/**
**name DISTR_commaSeperatedSelections($selName,$first,$variable,$values)
**description returns a selection with certain values (specified thru $variable) from the distribution text file
**parameter selName: name of the selection
**parameter first: item to show first
**parameter variable: the variable to search for
**parameter values: the values of the distribution text file (info.txt) read with DISTR_getDescriptionValues
**/
function DISTR_commaSeperatedSelections($selName,$first,$variable,$values)
{
	$singleValue = DISTR_listCommaSeperated($variable,$values);

	$out="<select name=\"$selName\" size=\"1\">";

	//check if $first is set
	if ((strlen($first) > 0) && (in_array($first, $singleValue)))
		{
			$out.="<option value=\"$first\">$first</option>";
		}
	else
		//set to a value that won't be exist
		$first = "gdasbawtdbacyhsr648vasdztc43vdca5x43vra65we4vxd56s";

	foreach($singleValue as $dist)
		if ($dist != $first)
		{
			$out.="<option value=\"$dist\">$dist</option>";
		};

	$out.="</select>";

	return($out);
};





/**
**name DISTR_getDesktopsCBList($distr,$selectedDesktops)
**description returns a checkbox list with desktops for a certain distribution. Desktops included in the array $selectedDesktops are checked.
**parameter distr: distribution of the desktops should be shown
**parameter selectedDesktops: array with the desktops that should be checked
**/
function DISTR_getDesktopsCBList($distr,$selectedDesktops)
{
	$distrValues = DISTR_getDescriptionValues($distr);
	$desktops = DISTR_listCommaSeperated("GUIs",$distrValues);
	
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//start table and add heading
	$out="
	<span class=\"titlesmal\">$I18N_supportedUserInterfaces</span><br>
	<table>
	<tr>
		<td></td>
		<td><span class=\"subhighlight\">$I18N_userInterface</span></td>
		<td><span class=\"subhighlight\">$I18N_description</span></td>
	</tr>";
	$nr=0;


	foreach ($desktops as $desktop)
		{
			if (is_array($selectedDesktops) && in_array($desktop,$selectedDesktops))
				$checked="checked";
			else
				$checked="";
			
			$out.="<tr>
			<td><INPUT type=\"checkbox\" name=\"CB_desktop$nr\" value=\"$desktop\" $checked></td>
			<td>$desktop</td>
			<td>".nl2br(wordwrap(DISTR_geti18nValue($GLOBALS["m23_language"],"GUI".$desktop,$distrValues),100)).
			"</td>
			</tr>
			";
			$nr++;
		};

	$out.="</table>
	<input type=\"hidden\" name=\"desktopAmount\" value=\"$nr\">
	";

	return($out);
};





/**
**name DISTR_getSelectedDesktopsArr()
**description returns an array with selected desktops from the list generated by DISTR_getDesktopsCBList
**/
function DISTR_getSelectedDesktopsArr()
{
	$list=array();
	$nr=0;
	for ($i=0; $i < $_POST[desktopAmount]; $i++)
		{
			if (!empty($_POST["CB_desktop$i"]))
				$list[$nr++]=$_POST["CB_desktop$i"];
		};
		
	return($list);
};





/**
**name DISTR_getSelectedDesktopsStr()
**description returns a string with selected desktops (seperated by "###") from the list generated by DISTR_getDesktopsCBList
**/
function DISTR_getSelectedDesktopsStr()
{
	return(implode("###",DISTR_getSelectedDesktopsArr()));
};
?>
