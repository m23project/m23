<?php

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: functions to save and load preferences for client setup.
$*/





/**
**name PREF_preferenceLoadManagerHandler()
**description Executes loading and deletion of preferences after pressing the according buttons and defines the buttons for PREF_showPreferenceManager();
**/
function PREF_preferenceLoadManagerHandler()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	if ((isset($_POST['ED_preferenceName'])) && (HTML_submitCheck("BUT_save_preference")))
	{
		$_SESSION['preferenceName'] = $_POST['ED_preferenceName'];
		MSG_showInfo($I18N_preferenceSaved);
	}
	//Pre-load $_SESSION['preferenceName'] with the value of the HTML preference selection
	elseif (isset($_POST['SEL_preferenceName']) && (!HTML_submitCheck("BUT_save_preference")))
		$_SESSION['preferenceName'] = $_POST['SEL_preferenceName'];

	//Loading the preference named in the HTML preference selection
	if (HTML_submit("BUT_load_preference", $I18N_load, '', false))
		PREF_loadAllPreferenceValues();

	//Deleting the preference named in the HTML preference selection
	if (HTML_submit("BUT_delete_preference", $I18N_delete, '', false))
	{
		PREF_delete($_SESSION['preferenceName']);
		$_SESSION['preferenceName'] = "";
	}

	//Define the deletion button here to make it available for PREF_showPreferenceManager()
	HTML_submitDefine("BUT_save_preference", $I18N_save, '', false);
}





/**
**name PREF_preferenceSaveManagerHandler()
**description Executes the saving of preferences.
**/
function PREF_preferenceSaveManagerHandler()
{
	//Save current settings in the preference named in the HTML preference edit line
	if (HTML_submitCheck("BUT_save_preference"))
	{
		if (isset($_POST['ED_preferenceName']))
			$_SESSION['preferenceName'] = $_POST['ED_preferenceName'];
		PREF_saveAllPreferenceValues();
	}
}





/**
**name PREF_showPreferenceManager()
**description Shows a dialog to load and delete existing preferences and to create new preferences.
**/
function PREF_showPreferenceManager($htmlName = false)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	$preferenceName = isset($_SESSION['preferenceName']) ? $_SESSION['preferenceName'] : '';

	$html = "
	<table style=\"border-style:none;\">
		<tr>
			<td style=\"border-style:none; padding:5px;\" colspan=\"2\" align=\"left\">$I18N_preferences</td>
		</tr>
		<tr>
			<td style=\"border-style:none;\" colspan=\"2\" align=\"left\">
				<select name=\"SEL_preferenceName\" size=\"1\">".
					PREF_getClientPreferences($preferenceName, true, false).
		"		</select>
			</td>
		</tr>
		<tr>
			<td style=\"border-style:none;\">".BUT_load_preference."</td>
			<td style=\"border-style:none;\">".BUT_delete_preference."</td>
		</tr>
		<tr>
			<td style=\"border-style:none;\" colspan=\"2\" align=\"left\">
				<input type=\"text\" name=\"ED_preferenceName\" value=\"$preferenceName\" size=\"16\" maxlength=\"200\">
			</td>
		</tr>
		<tr>
			<td style=\"border-style:none;\" colspan=\"2\" align=\"left\">".BUT_save_preference."</td>
		</tr>
	</table>";

	if ($htmlName !== false)
		define($htmlName, $html);
	else
		echo($html);
}





/**
**name PREF_saveAllPreferenceValues()
**description Saves all values of a session into the preference.
**/
function PREF_saveAllPreferenceValues()
{
	$prefName = $_SESSION['preferenceName'];

	foreach ($_SESSION['preferenceSpace'] as $var => $value)
		PREF_putValue($prefName, $var, $value);
}





/**
**name PREF_loadAllPreferenceValues()
**description Loads all values of a preference into the session.
**/
function PREF_loadAllPreferenceValues()
{
	$prefName = $_SESSION['preferenceName'];
	CHECK_FW(CC_clientpreferencesname, $prefName);

	$sql = "SELECT DISTINCT var, value FROM `clientpreferences` WHERE name = '$prefName'";
	$res = DB_query($sql); //FW ok

	while($data = mysqli_fetch_assoc($res))
	{
		// If the group contains "###", it is intrepreted as a imploded array and needs to be converted back into an array
		if (preg_match('/###/',$data['value']))
			$data['value'] = explode("###", $data['value']);

		$_SESSION['preferenceSpace'][$data['var']] = $data['value'];
	}

	$_SESSION['preferenceForceHTMLReloadValues'] = true;
}





/**
**name PREF_getClientPreferences($default, $generateHTML = true, $showHTML = true)
**description List all preferences, as HTML selections or associative array.
**parameter default: The name of the preference to list first
**parameter generateHTML: If enabled the preference names will be generated as a HTML option list. If disabled an array with the preference names as key and value will be returned.
**parameter showHTML: If enabled the generated as a HTML option list will be shown, if disabled, it will be returned.
**returns Array with the preference names or nothing on enabled showHTML.
**/
function PREF_getClientPreferences($default, $generateHTML = true, $showHTML = true)
{
	$sql = "SELECT DISTINCT name FROM `clientpreferences` ORDER BY name";

	$result=DB_query($sql); //FW ok

	$outHTML = '';

	if ($generateHTML)
	{
		if (PREF_exists($default))
			$outHTML .= "<option value=\"$default\">$default</option>";
	
		while( $data = mysqli_fetch_array($result) )
		{
			if ($data[0] != $default)
				$outHTML .= "<option value=\"$data[0]\">$data[0]</option>";
		}

		if ($showHTML)
			echo($outHTML);
		else
			return($outHTML);
	}
	else
	{
		$out = array();

		while($data = mysqli_fetch_array($result))
			$out[$data[0]] = $data[0];

		return($out);
	}
}





/**
**name PREF_getValue($name, $var)
**description gets a value from a selected preference. with preferences you can store variables and values for reuse.
**parameter name: the name of the preference
**parameter var: variable of the preference
**/
function PREF_getValue($name, $var)
{
	CHECK_FW(CC_clientpreferencesname, $name, CC_clientpreferencesvar, $var);
	$sql = "SELECT value FROM `clientpreferences` WHERE name='$name' AND var='$var'";

	$result = DB_query($sql); //FW ok

	$data = mysqli_fetch_array($result);

	return($data[0]);
}





/**
**name PREF_putValue($name, $var, $value)
**description stores a value to a selected preference. with preferences you can store variables and values for reuse.
**parameter name: the name of the preference
**parameter var: variable of the preference
**parameter value: value you want to set
**/
function PREF_putValue($name, $var, $value)
{
	// If it's an array, it needs to be imploded to a string before it can be stored in the DB
	if (is_array($value))
		$value = implode("###", $value);
		
	print("<h3>PREF_putValue($name, $var, $value)</h3>");

	$tval = trim($value);

	CHECK_FW(CC_clientpreferencesname, $name, CC_clientpreferencesvar, $var, CC_clientpreferencesvalue, $tval);
	$sql = "SELECT count(*) FROM `clientpreferences` WHERE name='$name' AND var='$var'";

	$result = DB_query($sql); //FW ok

	$line = mysqli_fetch_row($result);

	if ($line[0] > 0)
	{
		//try to update
		$sql="UPDATE `clientpreferences` SET value='$value' WHERE name='$name' AND var='$var'";
		$result = DB_query($sql); //FW ok
		
	}
	else
	{
		//if we can't update, try to insert
		$sql = "INSERT INTO `clientpreferences` (name, var, value) VALUES ('$name','$var','$value')";
		$result = DB_query($sql); //FW ok
	}

	return($result);
}





/**
**name PREF_delete($name)
**description deletes a preference
**parameter name: the name of the preference
**/
function PREF_delete($name)
{
	CHECK_FW(CC_clientpreferencesname, $name);
	$sql = "DELETE  FROM  `clientpreferences`  WHERE name = '$name'";

	$result = DB_query($sql); //FW ok

	return($result);
};





/**
**name PREF_exists($name)
**description checks if a preference with the selected name exists
**parameter name: the name of the preference
**/
function PREF_exists($name)
{
	CHECK_FW(CC_clientpreferencesname, $name);
	$sql="SELECT DISTINCT name FROM `clientpreferences` WHERE name='$name'";

	$result = DB_query($sql); //FW ok

	$data = mysqli_fetch_array($result);

	return($data[0]==$name);
}





/**
**name PREF_putAllOptions( $prefName, $options)
**description stores all settings in the options array to the preferences
**parameter prefName: name of the preference the options should be stored under
**parameter options: the array with the options
**/
function PREF_putAllOptions($prefName,$options)
{
	$keys=array_keys($options);
	$values=array_values($options);

	for ($i=0; $i < count($keys); $i++)
		PREF_putValue($prefName, $keys[$i], $values[$i]);
}





/**
**name PREF_getAllValues(  $prefName, $options)
**description gets all preferences and adds them to the options array
**parameter prefName: name of the preference the options should be stored under
**parameter options: the array with the options
**/
function PREF_getAllValues($prefName, $options)
{
	CHECK_FW(CC_clientpreferencesname, $prefName);
	$sql = "SELECT var,value FROM `clientpreferences` WHERE name='$prefName'";

	$result = DB_query($sql); //FW ok

	while ($data = mysqli_fetch_array($result))
		$options[$data[0]]=$data[1];

	return($options);
}

?>
