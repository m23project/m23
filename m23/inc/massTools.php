<?php

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: routines for mass installations
$*/





/**
**name MASS_EGKradioBoxes($RB_name,$arr,$checkNr=-1)
**description Generates HTML code for showing 3 elements, that can be each a "radio button", selection "disabled" or "always selected".
**parameter RB_name: name of the radio button
**parameter arr: array with 3 values for [Enter,Generate,Keep]. Setting a value to "e" means that the user can select, "n" selection is disabled, "y" is always select.
**parameter checkNr: the number of radio button that is enabled by default.
**/
function MASS_EGKradioBoxes($RB_name,$arr,$checkNr=-1)
{
	$actions=array("e","g","k");

	$i=0;

	foreach ($actions as $val)
		{
			$out.="<td align=\"center\">";
			
			if ($i == $checkNr)
				$checked="checked";
			else
				$checked="";

			switch ($arr[$i])
				{
					case "e": //enables radio button
						{
							$out.="<INPUT type=\"radio\" name=\"$RB_name\" value=\"$val\" $checked>";
							break;
						}
		
					case "n": //value is disabled
						{
							$out.="<img src=\"/gfx/button_cancel-mini.png\">";
							break;
						}

					case "y": //value is always true
						{
							$out.="<img src=\"/gfx/button_ok-mini.png\">
											<INPUT type=\"hidden\" name=\"$RB_name\" value=\"$val\">";
							break;
						}
				};

			$out.="</td>";

			$i++;
		};

	return($out);
};





/**
**name MASS_FHradioBoxes($RB_name,$checkNr=-1)
**description Generates HTML code for showing 2 radio buttons for selecting file or handy source 
**parameter RB_name: name of the radio button
**parameter checkNr: the number of radio button that is enabled by default.
**/
function MASS_FHradioBoxes($RB_name,$checkNr=-1)
{
	$actions=array("f","h");

	$i=0;

	$out="";

	foreach ($actions as $val)
		{
			if ($i == $checkNr)
				$checked="checked";
			else
				$checked="";
			
			$out.="
			<td align=\"center\">
				<INPUT type=\"radio\" name=\"$RB_name\" value=\"$val\" $checked>
			</td>";

			$i++;
		};

	return($out);
};





/**
**name MASS_showFileHandDialog($EGKparams)
**description shows a dialog for selecting "by file" or "by hand" for the "enter" properties.
**parameter EGKparams: enter generate keep parameters, that hold information about handling of the properties
**/
function MASS_showFileHandDialog($EGKparams)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$keys=MASS_propertyKeys();

	$hidden="<input type=\"hidden\" name=\"FileHandVars\" value=\"";

	HTML_showTableHeader();

	echo("
	<tr>
		<td><span class=\"subhighlight\">$I18N_property</span></td>
		<td><span class=\"subhighlight\">$I18N_byFile</span></td>
		<td><span class=\"subhighlight\">$I18N_byHand</span></td>
	 </tr>
	");

	foreach ($keys as $key)
		{
			if ($EGKparams[$key]=="e")
				{
					$property = MASS_keyToI18N($key);

					echo("<tr><td>$property</td>".MASS_FHradioBoxes("SEL_Source$key",0)."</tr>");

					$hidden.="SEL_Source$key?#?";
				};
		};

	$hidden.="\">";

	HTML_showTableEnd();

	return($hidden);
};





/**
**name MASS_propertyKeys()
**description returns the keys for all properties
**/
function MASS_propertyKeys()
{
	return(array(client,office,group,login,forename,familyname,email,mac,ip,netmask,gateway,dns1,dns2,firstlogin,rootlogin,addNewLocalLogin,ldaptype,userID,groupID,ldapserver,nfshomeserver,timeZone,getSystemtimeByNTP));

};





/**
**name MASS_showFileFormatDialog(&$EGKparams)
**description shows a dialog that lets the user select a DB file and assign the columns to the fields of the file
**parameter EGKparams: enter generate keep parameters, that hold information about handling of the properties
**/
function MASS_showFileFormatDialog($EGKparams)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$uploadDir="/m23/tmp/";
	
	if (isset($_POST[DBfileName]))
		$DBfileName=$_POST[DBfileName];
		
	//user uploaded a file
	if (isset($_POST[BUT_uploadFile]) && move_uploaded_file(
		$_FILES['userfile']['tmp_name'],$uploadDir.$_FILES['userfile']['name']))
			$DBfileName=$uploadDir.$_FILES['userfile']['name'];
	
	
	//DB file is stored to disk: now define the columns
	if (!empty($DBfileName))
		{
			MASS_showTableDefinition($EGKparams,$DBfileName);
		};
	
	//show upload dialog, if the user sees the page first
	if (empty($DBfileName))
	echo("	
		<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"30000\">
		$I18N_selectDBFile: <input name=\"userfile\" type=\"file\">
		<input type=\"submit\" name=\"BUT_uploadFile\" value=\"$I18N_upload\">
		<br>
	");
	
	echo("<input type=\"hidden\" name=\"DBfileName\" value=\"$DBfileName\">");
};





/**
**name MASS_keyToI18N($key)
**description converts the property names to I18N names
**parameter key: property name
**/
function MASS_keyToI18N($key)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	switch ($key)
		{
			case "client": return($I18N_client_name);
			case "office": return($I18N_office);
			case "group": return($I18N_group);
			case "forename": return($I18N_forename);
			case "familyname": return($I18N_familyname);
			case "ip": return($I18N_ip);
			case "netmask": return($I18N_netmask);
			case "gateway": return($I18N_gateway);
			case "firstlogin": return($I18N_first_login);
			case "rootlogin": return($I18N_rootpassword);
			case "ignore": return($I18N_ignore);
			case "addNewLocalLogin": return($I18N_addNewLocalLogin);
			case "ldaptype": return("LDAP");
			case "userID": return($I18N_userID);
			case "groupID": return($I18N_groupID);
			case "ldapserver": return($I18N_LDAPServerName);
			case "nfshomeserver": return($I18N_homeOnNFS);
			case "login": return($I18N_login_name);
			case "timeZone": return($I18N_timeZone);
			case "getSystemtimeByNTP": return($I18N_getSystemtimeByNTP);
			default: return($key);
		};
		
};





/**
**name MASS_I18NTokey($i18n)
**description converts the I18N names to property names
**parameter key: property name
**/
function MASS_I18NTokey($i18n)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	switch ($i18n)
		{
			case $I18N_client_name: return("client");
			case $I18N_office: return("office");
			case $I18N_group: return("group");
			case $I18N_forename: return("forename");
			case $I18N_familyname: return("familyname");
			case $I18N_ip: return("ip");
			case $I18N_netmask: return("netmask");
			case $I18N_gateway: return("gateway");
			case $I18N_first_login: return("firstlogin");
			case $I18N_rootpassword: return("rootlogin");
			case $I18N_ignore: return("ignore");
			case $I18N_addNewLocalLogin: return("addNewLocalLogin");
			case "LDAP": return("ldaptype");
			case $I18N_userID: return("userID");
			case $I18N_groupID: return("groupID");
			case $I18N_LDAPServerName: return("ldapserver");
			case $I18N_homeOnNFS: return("nfshomeserver");
			case $I18N_login_name: return("login");
			case $I18N_timeZone: return("timeZone");
			case $I18N_getSystemtimeByNTP: return("getSystemtimeByNTP");

			default: return($i18n);
		};
};





/**
**name MASS_showTableDefinition($EGKparams,$DBfileName)
**description shows a dialog that lets the user define which field in the DB file should be assigned to which property
**parameter EGKparams: enter generate keep parameters, that hold information about handling of the properties
**parameter DBfileName: file name of the DB file
**/
function MASS_showTableDefinition($EGKparams,$DBfileName)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$keys=MASS_propertyKeys();
	$enterPropertiesAmount = 0;

	//add ignore entry
	$enterProperties["name0"]=$I18N_ignore;
	$enterProperties["val0"]="ignore";

	$enterPropertiesAmount = 0;

	foreach ($keys as $key)
		{
			if ($EGKparams["FH_".$key]=="f")
				{
					$enterProperties["val$enterPropertiesAmount"]=$key;
					$enterProperties["name$enterPropertiesAmount"]=MASS_keyToI18N($key);
					$enterPropertiesAmount++;
				}
		};

	//the amount of selections can be increased to the amount of fields in the DB file
	if ($_POST[ED_columnAmount] > $enterPropertiesAmount)
		$selectionAmount = $_POST[ED_columnAmount];
	else
		$selectionAmount = $enterPropertiesAmount;

	HTML_showTableHeader();

	//show column headers
	for ($nr=0; $nr < $selectionAmount; $nr++)
		echo("<td><span class=\"subhighlight\">$I18N_column$nr</span></td>");
			
	echo("
		</tr>
		<tr>
	");

	//show n selection lists with all n properties each		
	for ($nr=0; $nr < $selectionAmount; $nr++)
		echo("<td>".HTML_listSelection("SEL_enter$nr",$enterProperties,$_POST["SEL_enter$nr"],MASS_keyToI18N($_POST["SEL_enter$nr"]))."</td>");

	//read the first line from the DB file
	$file = MASS_openDBFile($DBfileName);

	if (!empty($_POST[ED_glue]))
		{
			//split the first line with the entered seperator
			$parts = MASS_readDBFileRaw($file,$_POST[ED_glue]);

			$partNr = 0;
			$lineHtml = "";

			//assign the parts to the selections
			for ($i=0; $i < $selectionAmount; $i++)
				$lineHtml.="<td>".$parts[$partNr++]."</td>";
		}
	else
		{	//if no seperator is set, show the whole line
		
			$line = fgets($file);
			
			$lineHtml="
			<td colspan=\"$selectionAmount\" align=\"center\">
				$I18N_firstLineOfDBFile<br>
				$line
			</td>";
		};

	/*
		show first line of the DB fileinput, input field for the seperator and the column amount
	*/
	echo("
		</tr>
		<tr>
			$lineHtml
		</tr>
		<tr>
			<td colspan=\"$selectionAmount\"><hr></td>
		</tr>
		<tr>
			<td colspan=\"$selectionAmount\" align=\"center\">
			
				$I18N_glue: <INPUT type=\"text\" name=\"ED_glue\" value=\"$_POST[ED_glue]\" size=\"1\" maxlength=\"5\">&nbsp;
				
				$I18N_columnAmount: <INPUT type=\"text\" name=\"ED_columnAmount\" value=\"$selectionAmount\" size=\"1\" maxlength=\"5\">
			</td>
		</tr>
		<tr>
			<td colspan=\"$selectionAmount\" align=\"center\"><br>
				<input type=\"submit\" name=\"BUT_refresh\" value=\"$I18N_refresh\">
			</td>
		</tr>");

	MASS_closeDBFile($file);

	HTML_showTableEnd();
};





/**
**name MASS_checkAndSaveFields(&$EGKparams)
**description saved the assignments from field number to property and other information to EGKparams and performes a simple check, to verify that the values of the properties are valuable. An error message is returned or an empty string, if all is ok.
**parameter EGKparams: enter generate keep parameters, that hold information about handling of the properties
**/
function MASS_checkAndSaveFields(&$EGKparams)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$keylist = array();

	$assignCounter = 0;

	//assign column names
	for ($i=0; $i < $_POST[ED_columnAmount]; $i++)
		{
			$key=$_POST["SEL_enter$i"];

			//check if the key has been saved before
			if ((in_array($key,$keylist)) && $key != "ignore")
				{
					return("$I18N_multipleDeclarationsOfField: ".$_POST["SEL_enter$i"]);
				}
			elseif ($key != "ignore")
				$assignCounter++;

			$keylist[$i] = $key;

			if ($key != "ignore")
				$EGKparams["columnKey$i"] = $key;
			else
				$EGKparams["columnKey$i"] = "";
		};
		
	//if there were assigned less properties than it should be, return an error message
	$propKeys = MASS_getXProperties($EGKparams,"f","FH_");
	if ($assignCounter < $propKeys[amount])
		return($I18N_notAllFieldsWereAssigned);

	$EGKparams[DBfileName] = $_POST[DBfileName];
	$EGKparams[glue] = $_POST[ED_glue];
	$EGKparams[columnAmout] = $_POST[ED_columnAmount];

	$file = MASS_openDBFile($EGKparams[DBfileName]);
	
	$errMsg="";

	$parts = MASS_readDBFileRaw($file,$EGKparams[glue]);

	for ($i=0; $i < $EGKparams[columnAmout]; $i++)
		{
			switch ($EGKparams["columnKey$i"])
				{
					case "ip": 
						{
							if (!checkIP($parts[$i])) 
								$errMsg .= $I18N_invalid_ip."\n"; 
							break; 
						};
						
					case "netmask":
						{
							if (!checkNetmask($parts[$i]))
								$errMsg .= $I18N_invalid_netmask."\n";
							break;
						}
					case "email":
						{
							if (!checkEmail($parts[$i]))
								$errMsg .= $I18N_invalid_email."\n";
							break;
						};
						
					case "client":
						{
							if (!checkNormalKeys($parts[$i]))
								$errMsg .= $I18N_invalid_clientname."\n";
							break;
						};
				}
		};

	MASS_closeDBFile($file);

	return($errMsg);
};





/**
**name MASS_openDBFile($fileName)
**description opens a DB file
**parameter fileName: name of the DB file
**/
function MASS_openDBFile($fileName)
{
	$file=fopen($fileName,"r");

	return($file);
};





/**
**name MASS_readDBFile($file,$EGKparams)
**description reads a line from the DB file and returnes an associated array with the properties as key and the fields of the file as values.
**parameter fileName: name of the DB file
**returns Associative array with the values of the DB line or false, if the line was empty.
**/
function MASS_readDBFile($file,$EGKparams)
{
	if ($file)
	{
		$line = trim(fgets($file));
		if (isset($line{1}) === false)
			return(false);

		$parts=explode($EGKparams[glue],$line);

		for ($i = 0; $i < $EGKparams[columnAmout]; $i++)
			$out[$EGKparams["columnKey$i"]] = $parts[$i];

	};

	return($out);
};





/**
**name MASS_readDBFileRaw($file,$glue)
**description reads a line from the DB file and returnes the fields splitted to a normal array.
**parameter file: file pointer
**parameter glue: the seperator used to seperate the fields
**/
function MASS_readDBFileRaw($file,$glue)
{
	if ($file)
		{
			$line=fgets($file);
			
			$parts=explode($_POST[ED_glue],$line);
		};

	return($parts);
};





/**
**name MASS_closeDBFile($file)
**description closes the DB file.
**parameter file: file pointer
**/
function MASS_closeDBFile($file)
{
	fclose($file);
};





/**
**name MASS_getXProperties($EGKparams,$x)
**description returnes the amount and keys of a secial kind (enter, generate, keep, hand, file)
**parameter EGKparams: enter generate keep parameters, that hold information about handling of the properties
**parameter x: the 1-letter code of enter, generate, keep, hand or file
**parameter pre: set if there is a prefix before the key name
**/
function MASS_getXProperties($EGKparams,$x,$pre="")
{
	$keys = MASS_propertyKeys();
	$out = array();

	$out[amount] = 0;

	foreach ($keys as $key)
		if ($EGKparams["$pre$key"]==$x)
			{
				$var="key$out[amount]";
				$out[$var]=$key;
				$out[amount]++;
			}

	return($out);
};





/**
**name MASS_showGeneratorOptions($EGKparams)
**description shows the dialog for configuring the generator options
**parameter EGKparams: enter generate keep parameters, that hold information about handling of the properties
**/
function MASS_showGeneratorOptions($EGKparams)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//get the keys of all properties that should be generated
	$generatorKeys=MASS_getXProperties($EGKparams,"g");


//generator for:CLIENTNAME

	$clientStartNumber = $_POST[ED_clientStartNumber];
	
	if (empty($clientStartNumber))
		$clientStartNumber = 0;
	
	$htmlGenerator[client]="
<tr>
	<td colspan=2>
		<span class=\"subhighlight\">$I18N_client_name</span>
	</td>
</tr>
<tr>
	<td>$I18N_clientBaseName</td>
	<td><INPUT type=\"text\" name=\"ED_clientBaseName\" size=\"20\" maxlength=\"255\" value=\"$_POST[ED_clientBaseName]\"></td>
</tr>
<tr>
	<td>$I18N_startNumber</td>
	<td><INPUT type=\"text\" name=\"ED_clientStartNumber\" size=\"5\" maxlength=\"10\" value=\"$clientStartNumber\"></td>
</tr>
	";




//generator for: FORENAME

	$forenameStartNumber = $_POST[ED_forenameStartNumber];
	
	if (empty($forenameStartNumber))
		$forenameStartNumber = 0;

	$htmlGenerator[forename]="
<tr>
	<td colspan=2>
		<span class=\"subhighlight\">$I18N_forename</span><br>
	</td>
</tr>
<tr>
	<td>$I18N_forenameBaseName</td>
	<td><INPUT type=\"text\" name=\"ED_forenameBaseName\" size=\"20\" maxlength=\"255\" value=\"$_POST[ED_forenameBaseName]\"></td>
</tr>
<tr>
	<td>$I18N_startNumber</td>
	<td><INPUT type=\"text\" name=\"ED_forenameStartNumber\" size=\"5\" maxlength=\"10\" value=\"$forenameStartNumber\"></td>
</tr>
	";





//generator for: IP
	$ipRanges = trim($_POST['TA_ipRanges']);

	if (empty($ipRanges))
		{ //no ranges are entered => calculate range from the IP and netmask of the server
			$minMaxIP = MASS_minMaxIP(getServerNetmask(),getServerIP());
			$ipRanges = "$minMaxIP[0]-$minMaxIP[1]";
		};
		
	if (isset($_POST[CB_ipPing]))
		$ipPingChecked="checked";

	$htmlGenerator[ip]="
<tr>
	<td>
	<span class=\"subhighlight\">$I18N_ip</span><br><br>
	
	<INPUT type=\"checkbox\" name=\"CB_ipPing\" value=\"yes\" $ipPingChecked> $I18N_pingIPBeforeUse
<br><br>
$I18N_IPRanges<br>
&nbsp;&nbsp;<textarea name=\"TA_ipRanges\" cols=\"31\" rows=\"5\">
$ipRanges
</textarea>&nbsp;&nbsp;<br><br>
	</td>
</tr>
";





//generator: NETMASK
	$htmlGenerator[netmask]="
	<tr>
		<td>
			<span class=\"subhighlight\">$I18N_netmask</span><br><br>
			&nbsp;&nbsp;<img src=\"/gfx/button_ok-mini.png\"> $I18N_netmasksAreGeneratedViaNetworkClasses&nbsp;&nbsp;<br><br>
		</td>
	</tr>";





//generator: FIRSTLOGIN
	$firstPasswordLengths[0]=6;$firstPasswordLengths[1]=7;$firstPasswordLengths[2]=8;

	$firstPasswordLength = $_POST[SEL_firstloginLength];
	if (empty($firstPasswordLength))
		$firstPasswordLength = 8;

	//set the radio buttons
	if ($_POST[RB_firstloginGenerationMethod]=="pwgen")
		$pwgenChecked="checked";
	else
		$randomChecked="checked";

	//check if pwgen is installed
	if (isProgrammInstalled("pwgen"))
		{
			//generate one example password
			$randPwdPwgen = MASS_passGenerator($firstPasswordLength,"pwgen",1);
			
			$pwgenHTML="<INPUT type=\"radio\" name=\"RB_firstloginGenerationMethod\" value=\"pwgen\" $pwgenChecked> $I18N_pwgenPasswords ($I18N_eg $randPwdPwgen[0])<br>";
		};

	//generate one example random password
	$randPwdrandom = MASS_passGenerator($firstPasswordLength,"random",1);
	
	//whole HTML code
	$htmlGenerator[firstlogin]="
	<tr>
		<td>
			<span class=\"subhighlight\">$I18N_first_login</span><br><br>
			<INPUT type=\"radio\" name=\"RB_firstloginGenerationMethod\" value=\"random\" $randomChecked> $I18N_randomPasswords ($I18N_eg $randPwdrandom[0])
			$pwgenHTML<br>
			<center>
			$I18N_passwordLength ".HTML_listSelection("SEL_firstloginLength",$firstPasswordLengths,$firstPasswordLength)."</center><br>
		</td>
	</tr>
	";



//generator for:USERID

	$userIDStartNumber = $_POST[ED_userIDStartNumber];
	
	if (empty($userIDStartNumber))
		$userIDStartNumber = LDAP_getNextUserID();
	
	$htmlGenerator[userID]="
	<tr>
		<td colspan=2>
			<span class=\"subhighlight\">$I18N_userID</span><br>
		</td>
	</tr>
	<tr>
		<td>$I18N_startNumber</td>
		<td><INPUT type=\"text\" name=\"ED_userIDStartNumber\" size=\"5\" maxlength=\"6\" value=\"$userIDStartNumber\"></td>
	</tr>
	";



//generator for:GROUPID

	$groupIDStartNumber = $_POST[ED_groupIDStartNumber];
	
	if (empty($groupIDStartNumber))
		$groupIDStartNumber = LDAP_getNextgroupID();
	
	$htmlGenerator[groupID]="
	<tr>
		<td colspan=2>
			<span class=\"subhighlight\">$I18N_groupID</span><br>
		</td>
	</tr>
	<tr>
		<td>$I18N_startNumber</td>
		<td><INPUT type=\"text\" name=\"ED_groupIDStartNumber\" size=\"5\" maxlength=\"6\" value=\"$groupIDStartNumber\"></td>
	</tr>
	";



//generator for: LOGIN

	//set the radio buttons
	if ($_POST[RB_loginGenerationMethod]=="ForeFamilyName")
		$foreFamilyNameChecked="checked";
	else
		$incrementalChecked="checked";
		
	$loginStartNumber = $_POST[ED_loginStartNumber];
	if (empty($loginStartNumber))
		$loginStartNumber = 0;

	$htmlGenerator[login]="
<tr>
	<td colspan=2>
		<span class=\"subhighlight\">$I18N_login_name</span><br><br>
	</td>
</tr>
<tr>
	<td><INPUT type=\"radio\" name=\"RB_loginGenerationMethod\" value=\"ForeFamilyName\" $foreFamilyNameChecked></td>
	<td>$I18N_generateFromForenameAndFamilyname</td>
</tr>
<tr>
	<td><INPUT type=\"radio\" name=\"RB_loginGenerationMethod\" value=\"incremental\" $incrementalChecked></td>
	<td>$I18N_incremental</td>
</tr>
<tr>
	<td>$I18N_loginBaseName</td>
	<td><INPUT type=\"text\" name=\"ED_loginBaseName\" size=\"20\" maxlength=\"255\" value=\"$_POST[ED_loginBaseName]\"></td>
</tr>
<tr>
	<td>$I18N_startNumber</td>
	<td><INPUT type=\"text\" name=\"ED_loginStartNumber\" size=\"5\" maxlength=\"10\" value=\"$loginStartNumber\"></td>
</tr>
	";



//show needed generator dialogs
	for ($i = 0; $i < $generatorKeys[amount]; $i++)
		{
			$var="key$i";

			HTML_showTableHeader(true);
			echo($htmlGenerator[$generatorKeys[$var]]);
			HTML_showTableEnd(true);
			echo("<br>");
		};
		
	echo("<INPUT type=\"submit\" name=\"BUT_refreshgenerators\" value=\"$I18N_refresh\">");
};





/**
**name MASS_passGenerator($length,$method,$amount)
**description generates the selected amount of passwords with a random algorithm or the pwgen tool.
**parameter length: length of the passwords to generate
**parameter method: random or pwgen generated passwords that can be memorized by humans easily
**parameter amount: the amount of passwords to generate
**returns Array with the generated passwords as keys.
**/
function MASS_passGenerator($length,$method,$amount)
{
	switch ($method)
		{
			case "pwgen":
				{
					$pwds = shell_exec("pwgen -1 $length $amount");
					$out = explode("\n",$pwds);
					break;
				};
				
			case "random":
				{
					for ($i = 0; $i < $amount; $i++)
						$out[$i] = DB_genPassword($length);
					break;
				};
		};
		
	return ($out);
};





/**
**name MASS_loginGenerator($base,$start,$forenames,$familynames,$type,$amount)
**description generates the selected amount of logins
**parameter base: the base name of the login
**parameter start: start number for incremental logins
**parameter forenames: array with all forenames
**parameter familynames: array with all familynames
**parameter type: "incremental" if you want to add a incrementing number after the base name, "ForeFamilyName" if the logins should be created from fore- and familynames
**parameter amount: the amount of logins to generate
**/
function MASS_loginGenerator($base,$start,$forenames,$familynames,$type,$amount)
{
	switch ($type)
	{
		case "incremental":
			{
				for ($i = 0; $i < $amount; $i++)
					{
						$out[$i]=$base.$start;
						$start++;
					}
				break;
			};
		case "ForeFamilyName":
			{
				for ($i = 0; $i < $amount; $i++)
					$out[$i]=str_replace("ä","ae",(str_replace("ü","ue",str_replace("ö","oe",str_replace("ß","ss",strtolower($forenames[$i][0].$familynames[$i]))))));
			};
	};

	return($out);
}




/**
**name MASS_ipGenerator($amount,$rangesStr,$ping)
**description generates the selected amount of IPs in the selected ranges. Only IPs are generated that aren't in use by m23 or (if activated) pingable.
**parameter amount: the amount of IPs to generate
**parameter rangeStr: string with IP range information
**parameter ping: set to true, if each IP should be pinged before it becomes valid
**/
function MASS_ipGenerator($amount,$rangesStr,$ping)
{
	$ranges = explode("\n",trim($rangesStr));

	$counter = 0;

	foreach ($ranges as $range)
		{
			$fromTo = explode('-',$range);
			
			$fromTo[0] = explode(".",trim($fromTo[0]));
			$fromTo[1] = explode(".",trim($fromTo[1]));
			
			for ($a = $fromTo[0][0]; $a <= $fromTo[1][0]; $a++)
				for ($b = $fromTo[0][1]; $b <= $fromTo[1][1]; $b++)
					for ($c = $fromTo[0][2]; $c <= $fromTo[1][2]; $c++)
						for ($d = $fromTo[0][3]; $d <= $fromTo[1][3]; $d++)
							{
								//generate new ip
								$ip = "$a.$b.$c.$d";

								//only add if this ip isn't used by a client
								if (!CLIENT_IPexists($ip) &&
									(!$ping || !pingIP($ip)))
									$out[$counter++] = $ip;

								//there have been generated enough ips
								if ($counter == $amount)
									return($out);
							};
		};

	return ($out);
};





/**
**name MASS_minMaxIP($netmask,$ip)
**description calculates the possible minimum and maximum IP of a given netmask. The IPs are returned as an array: index 0 = minimum; index 1 = maximum.
**parameter netmask: netmask to use
**parameter ip: is used if the can only be set the current part of the ip (max and min ip part == 255)
**/
function MASS_minMaxIP($netmask, $ip)
{
	//Convert IPs to long
	$netmaskL = ip2long($netmask);
	$ipL = ip2long($ip);

	/*
		IP: 192.168.1.234
		Netmask: 255.255.255.0

		IP & Netmask => 192.168.1.0
		Minimum IP: 192.168.1.1
	*/
	$min = ($ipL & $netmaskL) + 1;

	/*
		Inverted netmask: 0.0.0.255

		Minimum IP | Inverted netmask => 192.168.1.255

		Maximum IP: 192.168.1.254
	*/
	$max = ($min | (~ $netmaskL)) - 1;

	//Generate array and convert it back
	$minMax[0] = long2ip($min);
	$minMax[1] = long2ip($max);
	return($minMax);
}

// function MASS_minMaxIP($netmask,$ip)
// {
// 	//Split netnask and ip into their parts
// 	$parts = explode(".",trim($netmask));
// 	$IPparts = explode(".",trim($ip));
// 	
// 	for ($i = 0; $i < 4; $i++)
// 		{
// 			//Convert a decimal part to binary and make sure it has 8 digits
// 			$minBin=str_pad(decbin($parts[$i]),8,0,STR_PAD_LEFT);
// 			//Replace all 0s by 1s (so it will be 255 every time)
// 			$maxBin=str_replace(0,1,$minBin);
// 
// 			//Convert back to decimals
// 			$min = bindec($minBin);
// 			$max = bindec($maxBin);
// 
// 			if ($min == $max)
// 				{ //there is no range between the two border => the part of the ip has to be taken
// 					$minMaxIP[0].=$IPparts[$i];
// 					$minMaxIP[1].=$IPparts[$i];
// 				}
// 			else
// 				{
// 					//network IP is not valid
// 					if ($i==3 && $min == 0)
// 						$min = 1;
// 
// 					//broadcast IP is not valid
// 					if ($i==3 && $max == 255)
// 						$max = 254;
// 		
// 					$minMaxIP[0].=$min;
// 					$minMaxIP[1].=$max;
// 				};
// 				
// 			if ($i < 3)
// 				{
// 					$minMaxIP[0].=".";
// 					$minMaxIP[1].=".";
// 				};
// 		};
// 				
// 	return($minMaxIP);
// };





/**
**name MASS_generateNetmask($ip)
**description generate netmasks from ip addresses via network class definitions.
**parameter ip: the ip that shoulb be used to calculate the netmask
**/
function MASS_generateNetmask($ip)
{
	$IPparts = explode(".",trim($ip));
	
	for ($i=0; $i < 4; $i++)
		$ipNR.=str_pad($IPparts[$i],3,0,STR_PAD_LEFT);
		
	if ($ipNR <= 127255255255)
		//class A
		return ("255.0.0.0");
		
	elseif (($ipNR >= 128000000000) && ($ipNR <= 191255255255))
		//class B
		return ("255.255.0.0");
		
	elseif ($ipNR >= 192000000000)
		//class C
		return ("255.255.255.0");
};





/**
**name MASS_generateClientNames($base,$start,$amount)
**description generates client names through appending of numbers.
**parameter base: the client base name
**parameter start: the start number
**parameter amount: the amount of client names to generate
**/
function MASS_generateClientNames($base,$start,$amount)
{
	$count = 0;
	$nr = $start;

	while ($count < $amount)
		{
			$clName=$base.$nr;

			if (!CLIENT_exists($clName))
				$out[$count++]=$clName;
			$nr++;
		};

	return($out);
};





/**
**name MASS_saveGeneratorOptions(&$EGKparams)
**description saves all geneator options to EGKparams
**parameter EGKparams: enter generate keep parameters, that hold information about handling of the properties
**/
function MASS_saveGeneratorOptions(&$EGKparams)
{
	$EGKparams[clientBaseName] = $_POST[ED_clientBaseName];
	$EGKparams[clientStartNumber] = $_POST[ED_clientStartNumber];
	$EGKparams[forenameBaseName] = $_POST[ED_forenameBaseName];
	$EGKparams[forenameStartNumber] = $_POST[ED_forenameStartNumber];
	$EGKparams[ipRanges] = $_POST[TA_ipRanges];
	$EGKparams[firstloginGenerationMethod] = $_POST[RB_firstloginGenerationMethod];
	$EGKparams[firstloginLength] = $_POST[SEL_firstloginLength];
	$EGKparams[userIDStartNumber] = $_POST[ED_userIDStartNumber];
	$EGKparams[groupIDStartNumber] = $_POST[ED_groupIDStartNumber];
	$EGKparams[loginGenerationMethod]=$_POST[RB_loginGenerationMethod];
	$EGKparams[loginBaseName]=$_POST[ED_loginBaseName];
	$EGKparams[loginStartNumber]=$_POST[ED_loginStartNumber];	

	if ($_POST[CB_ipPing]=="yes")
		$EGKparams[ipPing]="y";
	else
		$EGKparams[ipPing]="n";
};





/**
**name MASS_showOverview($EGKparams)
**description shows a table with all generated client settings, that can be edited
**parameter EGKparams: enter generate keep parameters, that hold information about handling of the properties
**/
function MASS_showOverview($EGKparams)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$generateAmount = $_POST['ED_clientAmount'];

	$keys = MASS_propertyKeys();

	$client=$_GET['client'];

	$allGroups=GRP_listGroups();
	$allldapServers=LDAP_listServers();
	$allTimeZones=HELPER_getTimeZones();

	$allldapTypes['name0']=$I18N_dontUseLDAP;
	$allldapTypes['val0']="none";
	$allldapTypes['name1']="$I18N_readLoginFromLDAP";
	$allldapTypes['val1']="read";
	$allldapTypes['name2']="$I18N_addNewLoginToLDAP";
	$allldapTypes['val2']="write";

	HTML_showTableHeader();

	//start table and write headings
	echo("<tr><td></td>");
	foreach($keys as $key)
	echo("<td><span class=\"subhighlight\">".MASS_keyToI18N($key)."</span></td>");
	echo("</tr>");

	//get all data from DB file
	if (!empty($EGKparams['DBfileName']))
		{
			if (empty($generateAmount))
				$generateAmount = countLinesInFile($EGKparams['DBfileName']);

			$file = MASS_openDBFile($EGKparams['DBfileName']);

			$nr = 0;

			while (!feof($file))
			{
				$lineFromDBFile = MASS_readDBFile($file,$EGKparams);
				if ($lineFromDBFile !== false)
					$fromDBFile[$nr++] = $lineFromDBFile;
			}

			MASS_closeDBFile($file);
		};

	if (empty($generateAmount))
		$generateAmount = 1;

	$allParams=CLIENT_getParams($client);
	$allOptions=CLIENT_getAllOptions($client);

//fill the table

	if (!isset($_POST['ED_clientName0']) || isset($_POST['BUT_regenerate']))
		{ //generate the values for the table
			//CLIENTNAMES
			if ($EGKparams['client']=="g")
				$clientNames = MASS_generateClientNames(
					$EGKparams['clientBaseName'],
					$EGKparams['clientStartNumber'],
					$generateAmount);
			else
				$clientNames = MASS_getAllFromFile("client",$EGKparams,$generateAmount,$fromDBFile);


			//OFFICE
			if ($EGKparams['office']=="k")
				$offices = array_fill(0,$generateAmount,$allParams['office']);
			else
				$offices = MASS_getAllFromFile("office",$EGKparams,$generateAmount,$fromDBFile);


			//GROUP
			if ($EGKparams['group']=="k")
				{ //get the groups of the defined client, seperate them by "," and fill the array
					$group = implode(",",GRP_listClientGroups($client));
					$groups = array_fill(0,$generateAmount,$group);
				}
			else
				$groups = MASS_getAllFromFile("group",$EGKparams,$generateAmount,$fromDBFile);


			//FORENAME
			if ($EGKparams['forename']=="k")
				$forenames = array_fill(0,$generateAmount,$allParams['name']);
			elseif ($EGKparams['forename']=="g")
				$forenames = MASS_generateClientNames($EGKparams['forenameBaseName'],
					$EGKparams['forenameStartNumber'],$generateAmount);
			else
				$forenames = MASS_getAllFromFile("forename",$EGKparams,$generateAmount,$fromDBFile);
		
		
			//FAMILYNAME
			if ($EGKparams['familyname']=="k")
				$familynames = array_fill(0,$generateAmount,$allParams['familyname']);
			else
				$familynames = MASS_getAllFromFile("familyname",$EGKparams,$generateAmount,$fromDBFile);


			//EMAIL
			if ($EGKparams['email']=="k")
				$emails = array_fill(0,$generateAmount,$allParams['eMail']);
			else
				$emails = MASS_getAllFromFile("email",$EGKparams,$generateAmount,$fromDBFile);


			//MAC
				$macs = MASS_getAllFromFile("mac",$EGKparams,$generateAmount,$fromDBFile);


			//IP
			if ($EGKparams['ip']=="g")
				$ips = MASS_ipGenerator($generateAmount,$EGKparams['ipRanges'],$EGKparams['ipPing']=="y");
			else
				$ips = MASS_getAllFromFile("ip",$EGKparams,$generateAmount,$fromDBFile);
	

			//NETMASK
			if ($EGKparams['netmask']=="k")
				$netmasks = array_fill(0,$generateAmount,$allParams['netmask']);
			elseif ($EGKparams['netmask']=="g")
				{
					for ($i = 0; $i < $generateAmount; $i++)
						$netmasks[$i] = MASS_generateNetmask($ips[$i]);
				}
			else
				$netmasks = MASS_getAllFromFile("netmask",$EGKparams,$generateAmount,$fromDBFile);


			//GATEWAY
			if ($EGKparams['gateway']=="k")
				$gateways = array_fill(0,$generateAmount,$allParams['gateway']);
			else
				$gateways = MASS_getAllFromFile("gateway",$EGKparams,$generateAmount,$fromDBFile);
		
		
			//DNS1
			if ($EGKparams['dns1']=="k")
				$dns1s = array_fill(0,$generateAmount,$allParams['dns1']);
			else
				$dns1s = MASS_getAllFromFile("dns1",$EGKparams,$generateAmount,$fromDBFile);
		
		
			//DNS2
			if ($EGKparams['dns2']=="k")
				$dns2s = array_fill(0,$generateAmount,$allParams['dns2']);
			else
				$dns2s = MASS_getAllFromFile("dns2",$EGKparams,$generateAmount,$fromDBFile);


			//FIRSTLOGIN
			if ($EGKparams['firstlogin']=="k")
				{
					$firstlogins = array_fill(0,$generateAmount,$allParams['firstpw']);
					$firstloginLength = strlen($allParams['firstpw']);
				}
			elseif ($EGKparams['firstlogin']=="g")
				{
					$firstlogins = MASS_passGenerator($EGKparams['firstloginLength'],$EGKparams['firstloginGenerationMethod'],$generateAmount);
					$firstloginLength = $EGKparams['firstloginLength'];
				}
			else
				{
					$firstlogins = MASS_getAllFromFile("firstlogin",$EGKparams,$generateAmount,$fromDBFile);
					$firstloginLength = MASS_getLongestLength($firstlogins,$generateAmount,8);
				}


			//ROOT PASSWORD
			if ($EGKparams['rootlogin']=="k")
				{
					$rootloginDisabled="disabled";
					$rootlogins = array_fill(0,$generateAmount,"******");
				}
			else
				$rootlogins = MASS_getAllFromFile("rootlogin",$EGKparams,$generateAmount,$fromDBFile);



			//ADDNEWLOCALLOGIN
			if ($EGKparams['addNewLocalLogin']=="k")
				$addNewLocalLogins = array_fill(0,$generateAmount, $allOptions['addNewLocalLogin']);
			else
				$addNewLocalLogins = MASS_getAllFromFile("addNewLocalLogin",$EGKparams,$generateAmount,$fromDBFile);



			//LOGIN
			if ($EGKparams['login']=="k")
				{
					$logins = array_fill(0,$generateAmount,$allOptions['login']);
				}
			elseif ($EGKparams['login']=="g")
				$logins = MASS_loginGenerator($EGKparams['loginBaseName'],$EGKparams['loginStartNumber'],$forenames,$familynames,$EGKparams['loginGenerationMethod'],$generateAmount);
			else
				$logins = MASS_getAllFromFile("login",$EGKparams,$generateAmount,$fromDBFile);



			//LDAPTYPE
			if ($EGKparams['ldaptype']=="k")
				$ldaptypes = array_fill(0,$generateAmount,$allOptions['ldaptype']);
			else
				$ldaptypes = MASS_getAllFromFile("ldaptype",$EGKparams,$generateAmount,$fromDBFile);




			//USERID
			if ($EGKparams['userID']=="k")
				$userIDs = array_fill(0,$generateAmount,$allOptions['userID']);
			elseif ($EGKparams['userID']=="g")
				$userIDs = LDAP_getFreeUserIDs($EGKparams['userIDStartNumber'],$generateAmount);
			else
				$userIDs = MASS_getAllFromFile("userID",$EGKparams,$generateAmount,$fromDBFile);




			//GROUPID
			if ($EGKparams['groupID']=="k")
				$groupIDs = array_fill(0,$generateAmount,$allOptions['groupID']);
			elseif ($EGKparams['groupID']=="g")
				$groupIDs = LDAP_getFreeGroupIDs($EGKparams['groupIDStartNumber'],$generateAmount);
			else
				$groupIDs = MASS_getAllFromFile("groupID",$EGKparams,$generateAmount,$fromDBFile);




			//NFSHOMESERVER
			if ($EGKparams['nfshomeserver']=="k")
				$nfshomeservers = array_fill(0,$generateAmount,$allOptions['nfshomeserver']);
			else
				$nfshomeservers = MASS_getAllFromFile("nfshomeserver",$EGKparams,$generateAmount,$fromDBFile);




			//LOGIN
			if ($EGKparams['login']=="k")
				$logins = array_fill(0,$generateAmount,$allOptions['login']);
			elseif ($EGKparams['login']=="g")
				$logins = MASS_loginGenerator($EGKparams['login'],$EGKparams['loginStartNumber'],$forenames,$familynames,$EGKparams['loginGenerationMethod'],$generateAmount);
			else
				$logins = MASS_getAllFromFile("login",$EGKparams,$generateAmount,$fromDBFile);




			//TIMEZONES
			if (($EGKparams['timeZone']=="k") || (!isset($_POST['ED_clientName0'])))
				$timeZones = array_fill(0,$generateAmount,$allOptions['timeZone']);
			else
				$timeZones = MASS_getAllFromFile("timeZone",$EGKparams,$generateAmount,$fromDBFile);




			//GETSYSTEMTIMEBYNTP
			if (($EGKparams['getSystemtimeByNTP']=="k") || (!isset($_POST['ED_clientName0'])))
				$getSystemtimeByNTPs = array_fill(0,$generateAmount,$allOptions['getSystemtimeByNTP']);
			else
				$getSystemtimeByNTPs = MASS_getAllFromFile("getSystemtimeByNTP",$EGKparams,$generateAmount,$fromDBFile);
			
			
		}
	else
		{ //read the values from POST
			for ($i=0; $i < $generateAmount; $i++)
				{
					$clientNames[$i]=$_POST["ED_clientName$i"];
					$offices[$i]=$_POST["ED_office$i"];
					$groups[$i]=$_POST["SEL_group$i"];
					$forenames[$i]=$_POST["ED_forename$i"];
					$familynames[$i]=$_POST["ED_familyname$i"];
					$emails[$i]=$_POST["ED_email$i"];
					$macs[$i]=$_POST["ED_mac$i"];
					$ips[$i]=$_POST["ED_ip$i"];
					$netmasks[$i]=$_POST["ED_netmask$i"];
					$gateways[$i]=$_POST["ED_gateway$i"];
					$dns1s[$i]=$_POST["ED_dns1$i"];
					$dns2s[$i]=$_POST["ED_dns2$i"];
					$firstlogins[$i]=$_POST["ED_firstlogin$i"];
					$addNewLocalLogins[$i] = $_POST["CB_addNewLocalLogin$i"];
					$ldaptypes[$i] = $_POST["SEL_ldaptype$i"];
					$userIDs[$i] = $_POST["ED_userID$i"];
					$groupIDs[$i] = $_POST["ED_groupID$i"];
					$ldapservers[$i] = $_POST["SEL_ldapserver$i"];
					$nfshomeservers[$i] = $_POST["ED_nfshomeserver$i"];
					$logins[$i] = $_POST["ED_login$i"];
					$timeZones[$i] = $_POST["SEL_timeZone$i"];
					$getSystemtimeByNTPs[$i] = $_POST["CB_getSystemtimeByNTP$i"];


					if ($EGKparams[rootlogin]=="k")
						{
							$rootloginDisabled="disabled";
							$rootlogins = array_fill(0,$generateAmount,"******");
						}
					else
						$rootlogins[$i]=$_POST["ED_rootlogin$i"];
				};
		};

	//check radio and check buttons
	for ($i=0; $i < $generateAmount; $i++)
		{
			$addNewLocalLoginsChecked[$i] = $addNewLocalLogins[$i] == "yes" ? "checked" : "";
			$getSystemtimeByNTPChecked[$i] = $getSystemtimeByNTPs[$i] == "yes" ? "checked" : "";
		};




	//get the maximum length for each property
	$clientNameLength = MASS_getLongestLength($clientNames,$generateAmount,25);
	$officeLength = MASS_getLongestLength($offices,$generateAmount,15);
	$groupLength = MASS_getLongestLength($groups,$generateAmount,25);
	$loginLength = MASS_getLongestLength($logins,$generateAmount,25);
	$forenameLength = MASS_getLongestLength($forenames,$generateAmount,25);
	$familynameLength = MASS_getLongestLength($familynames,$generateAmount,25);
	$emailLength = MASS_getLongestLength($emails,$generateAmount,25);
	$macLength = MASS_getLongestLength($macs,$generateAmount,25);
	$ipLength = MASS_getLongestLength($ips,$generateAmount,15);
	$netmaskLength = MASS_getLongestLength($netmasks,$generateAmount,25);
	$gatewayLength = MASS_getLongestLength($gateways,$generateAmount,25);
	$dns1Length = MASS_getLongestLength($dns1s,$generateAmount,15);
	$dns2Length = MASS_getLongestLength($dns2s,$generateAmount,15);
	$rootloginLength = MASS_getLongestLength($rootlogins,$generateAmount,15);
	$loginLength = MASS_getLongestLength($logins,$generateAmount,8);

	

	for ($i=0; $i < $generateAmount; $i++)
	{
		echo("
		<tr align=\"center\">
			<td>$i</td>
			<td>
				<INPUT type=\"text\" name=\"ED_clientName$i\" size=\"$clientNameLength\" maxlength=\"255\" value=\"".$clientNames[$i]."\">
			</td>
			<td>
				<INPUT type=\"text\" name=\"ED_office$i\" size=\"$officeLength\" maxlength=\"255\" value=\"".$offices[$i]."\">
			</td>
			<td>
				".HTML_listSelection("SEL_group$i",$allGroups,$groups[$i])."
			</td>
			<td>
				<INPUT type=\"text\" name=\"ED_login$i\" size=\"$loginLength\" maxlength=\"255\" value=\"".$logins[$i]."\">
			</td>
			<td>
				<INPUT type=\"text\" name=\"ED_forename$i\" size=\"$forenameLength\" maxlength=\"255\" value=\"".$forenames[$i]."\">
			</td>
			<td>
				<INPUT type=\"text\" name=\"ED_familyname$i\" size=\"$familynameLength\" maxlength=\"255\" value=\"".$familynames[$i]."\">
			</td>
			<td>
				<INPUT type=\"text\" name=\"ED_email$i\" size=\"$emailLength\" maxlength=\"255\" value=\"".$emails[$i]."\">
			</td>
			<td>
				<INPUT type=\"text\" name=\"ED_mac$i\" size=\"$macLength\" maxlength=\"255\" value=\"".$macs[$i]."\">
			</td>
			<td>
				<INPUT type=\"text\" name=\"ED_ip$i\" size=\"$ipLength\" maxlength=\"255\" value=\"".$ips[$i]."\">
			</td>
			<td>
				<INPUT type=\"text\" name=\"ED_netmask$i\" size=\"$netmaskLength\" maxlength=\"255\" value=\"".$netmasks[$i]."\">
			</td>
			<td>
				<INPUT type=\"text\" name=\"ED_gateway$i\" size=\"$gatewayLength\" maxlength=\"255\" value=\"".$gateways[$i]."\">
			</td>
			<td>
				<INPUT type=\"text\" name=\"ED_dns1$i\" size=\"$dns1Length\" maxlength=\"255\" value=\"".$dns1s[$i]."\">
			</td>
			<td>
				<INPUT type=\"text\" name=\"ED_dns2$i\" size=\"$dns2Length\" maxlength=\"255\" value=\"".$dns2s[$i]."\">
			</td>
			<td>
				<INPUT type=\"text\" name=\"ED_firstlogin$i\" size=\"$firstloginLength\" maxlength=\"20\" value=\"".$firstlogins[$i]."\">
			</td>
			<td>
				<INPUT type=\"text\" name=\"ED_rootlogin$i\" size=\"$rootloginLength\" maxlength=\"20\" value=\"".$rootlogins[$i]."\" $rootloginDisabled>
			</td>
			<td>
				<INPUT type=\"checkbox\" name=\"CB_addNewLocalLogin$i\" ".$addNewLocalLoginsChecked[$i]." value=\"yes\">
			</td>
			
			
			<td align=\"left\">
			".HTML_listSelection("SEL_ldaptype$i",$allldapTypes,$ldaptypes[$i])."
			</td>
			<td>
				<INPUT type=\"text\" name=\"ED_userID$i\" size=\"5\" maxlength=\"6\" value=\"".$userIDs[$i]."\">
			</td>
			<td>
				<INPUT type=\"text\" name=\"ED_groupID$i\" size=\"5\" maxlength=\"6\" value=\"".$groupIDs[$i]."\">
			</td>
			
			<td>".HTML_listSelection("SEL_ldapserver$i",$allldapServers,$ldapservers[$i])."</td>

			<td><input type=\"text\" name=\"ED_nfshomeserver$i\" size=\"30\" maxlength=\"255\" value=\"".$nfshomeservers[$i]."\"></td>

			<td>
				".HTML_listSelection("SEL_timeZone$i",$allTimeZones,$timeZones[$i])."
			</td>

			<td>
				<INPUT type=\"checkbox\" name=\"CB_getSystemtimeByNTP$i\" ".$getSystemtimeByNTPChecked[$i]." value=\"yes\">
			</td>



			</tr>
			");
	};
	HTML_showTableEnd();

	echo("
	<center>
		$I18N_client_amount <INPUT type=\"text\" name=\"ED_clientAmount\" size=\"4\" maxlength=\"8\" value=\"$generateAmount\">
		
		<INPUT type=\"submit\" name=\"BUT_refresh\" value=\"$I18N_refresh\">
		<INPUT type=\"submit\" name=\"BUT_regenerate\" value=\"$I18N_regenerateValues\">
	</center>
	");
};





/**
**name MASS_getAllFromFile($key,$EGKparams,$generateAmount,$fromDBFile)
**description returnes all values from one key of the DB file as an array.
**parameter key: the key of the property
**parameter generateAmount: the amount of values to be read from the DB file
**parameter EGKparams: enter generate keep parameters, that hold information about handling of the properties
**parameter fromDBFile: 2D array filled with the values for the keys
**/
function MASS_getAllFromFile($key,$EGKparams,$generateAmount,$fromDBFile)
{
	if (($EGKparams[$key]=="e") && ($EGKparams["FH_$key"]=="f"))
		for ($nr = 0; $nr < $generateAmount; $nr++)
			$out[$nr] = chop($fromDBFile[$nr][$key]);

	return($out);
};





/**
**name MASS_getLongestLength($arr,$amount,$max)
**description returnes the length of the longest entry in the array or max if bigger than max
**parameter arr: the array
**parameter amount: the amount of entries in the array
**parameter max: maximal value to be returned
**/
function MASS_getLongestLength($arr,$amount,$max)
{
	$longest = 0;
	
	for ($i=0; $i < $amount; $i++)
		{
			$len = strlen($arr[$i]);
			if ($len > $longest)
				$longest = $len;

			if ($longest >= $max)
				return ($max);
		}
		
	if ($longest == 0)
		return ($max);
	else
		return($longest);
};





/**
**name MASS_startInstall($EGKparams)
**description starts the installation of all client with all paramaters defined in the table
**parameter EGKparams: enter generate keep parameters, that hold information about handling of the properties
**/
function MASS_startInstall($EGKparams)
{
	$client = $_GET[client];
	$generateAmount = $_POST[ED_clientAmount];
	$allParams=CLIENT_getParams($client);
	$defineOptions=CLIENT_getAllOptions($client);
	
	$msg="<ul>";

	for ($i=0; $i < $generateAmount; $i++)
		{
			$alldata['client']		= trim($_POST["ED_clientName$i"]);
			$alldata['office']		= trim($_POST["ED_office$i"]);
			$alldata['name']		= trim($_POST["ED_forename$i"]);
			$alldata['familyname']	= trim($_POST["ED_familyname$i"]);
			$alldata['email']		= trim($_POST["ED_email$i"]);
			$alldata['mac']			= trim($_POST["ED_mac$i"]);
			$alldata['ip']			= trim($_POST["ED_ip$i"]);
			$alldata['netmask']		= trim($_POST["ED_netmask$i"]);
			$alldata['gateway'] 	= trim($_POST["ED_gateway$i"]);
			$alldata['dns1'] 		= trim($_POST["ED_dns1$i"]);
			$alldata['dns2'] 		= trim($_POST["ED_dns1$i"]);
			$alldata['firstpw']		= $_POST["ED_firstlogin$i"];
			$alldata['pxe']			= ($allParams[dhcpBootimage]!="etherboot");
			$alldata['language']	= $allParams[language];
			$alldata['newgroup']	= $_POST["SEL_group$i"];

			$allOptions				= $defineOptions;
			$allOptions['netRootPwd']= DB_genPassword(6);
			$allOptions['addNewLocalLogin'] = $_POST["CB_addNewLocalLogin$i"];
			$allOptions['ldaptype'] = $_POST["SEL_ldaptype$i"];
			$allOptions['userID'] = $_POST["ED_userID$i"];
			$allOptions['groupID'] = $_POST["ED_groupID$i"];
			$allOptions['ldapserver'] = $_POST["SEL_ldapserver$i"];
			$allOptions['nfshomeserver'] = $_POST["ED_nfshomeserver$i"];
			$allOptions['login'] = $_POST["ED_login$i"];

			if ($EGKparams[rootlogin]=="k")
				{
					$alldata['rootpassword'] = $allParams[rootPassword];
					$cryptRootPw = false;
				}
			else
				{
					$alldata['rootpassword'] = $_POST["ED_rootlogin$i"];
					$cryptRootPw = true;
				}

			$err=CLIENT_addClient($alldata,$allOptions,CLIENT_ADD_TYPE_add,$cryptRootPw);
			
			if (empty($err))
				{
					//add the client to all needed groups
					for ($g = 1; $g < count($groups); $g++)
						GRP_addClientToGroup($alldata['client'],$groups[$g]);
		
					//copy all packages from the defined client to this client
					PKG_copyPackagesToClient($alldata['client'],$client,"");
					$msg.="<li>$alldata[client]: <img src=\"/gfx/button_ok-mini.png\"> </li>";
				}
			else
				$msg.="<li>$alldata[client]: <img src=\" /gfx/button_cancel-mini.png\">: $err</li>";


		};

	$msg.="</ul>";

	return($msg);
}


?>
