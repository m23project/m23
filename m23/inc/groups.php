<?PHP
/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: group management funtions
$*/


define('GRP_SETTING_TYPE_execWhenAllJobsFinished', 1);
define('GRP_SETTING_TYPE_execBeginningOfWorkPHP', 2);

define('GRP_SETTING_VAR_rebootClientAfterJobsIfNecessary', 'rebootClientAfterJobsIfNecessary');
define('GRP_SETTING_VAR_unsetTimeStampForRebootClientNecessary', 'unsetTimeStampForRebootClientNecessary');



/**
**name GRP_safeSettings($groupName, &$type, &$var, &$val)
**description Makes the contents of the input variables safe for SQL usage.
**parameter groupName: name of the group
**parameter type: Type of the group setting (can be used to identify the places where it should be used)
**parameter var: Name of the group setting.
**parameter val: Its value.
**returns group ID on success, false otherwise.
**/
function GRP_safeSettings($groupName, &$type, &$var, &$val)
{
	$groupID = GRP_getIdByName($groupName);

	// Return, if no group with the given name could be found
	if ($groupID === false) return(false);

	// Make the input variables safe
	$val = CHECK_text2db($val);
	$var = CHECK_text2db($var);
	$type = (int)$type;

	return($groupID);
}





/**
**name GRP_setSetting($groupName, $type, $var, $val)
**description Adds or changes a group setting.
**parameter groupName: name of the group to add/change the setting for
**parameter type: Type of the group setting (can be used to identify the places where it should be used)
**parameter var: Name of the group setting.
**parameter val: Its value.
**returns true on successful adding/changing a group setting, false otherwise.
**/
function GRP_setSetting($groupName, $type, $var, $val)
{
	$groupID = GRP_safeSettings($groupName, $type, $var, $val);
	// Return, if no group with the given name could be found
	if ($groupID === false) return(false);

	$sql = "INSERT INTO `groupSettings` (`id`, `groupid`, `type`, `var`, `val`) VALUES (NULL, '$groupID', '$type', '$var', '$val') ON DUPLICATE KEY UPDATE val = '$val';";

	$res = DB_queryNoDie($sql); //FW ok

	return(!($res !== true));
}





/**
**name GRP_unsetSetting($groupName, $type, $var)
**description Removes a group setting.
**parameter groupName: name of the group to add/change the setting for
**parameter type: Type of the group setting (can be used to identify the places where it should be used)
**parameter var: Name of the group setting.
**returns true on successful removal of a group setting, false otherwise.
**/
function GRP_unsetSetting($groupName, $type, $var)
{
	$val = 'empty';

	$groupID = GRP_safeSettings($groupName, $type, $var, $val);
	// Return, if no group with the given name could be found
	if ($groupID === false) return(false);

	$sql = "DELETE FROM `groupSettings` WHERE groupid='$groupID' AND type='$type' AND var='$var';";

	$res = DB_queryNoDie($sql); //FW ok

	return(!($res !== true));
}





/**
**name GRP_getSetting($groupName, $type, $var)
**description Gets the variable names, values and group setting types of a group setting.
**parameter groupName: name of the group (required)
**parameter type: (optional) Type of the group setting (can be used to identify the places where it should be used)
**parameter var: (optional) Name of the group setting.
**returns All variable names, values and group setting types of a group setting in an associative array or false if it's unset. ($out[$i]['var'], $out[$i]['val'], $out[$i]['type'])
**/
function GRP_getSetting($groupName, $type = false, $var = false)
{
	$val = 'empty';
	$i = 0;
	$out = array();
	
	// Save original values, to check if they are false before they are made safe
	$typeOriginal = $type;
	$varOriginal = $var;
	
	$groupID = GRP_safeSettings($groupName, $type, $var, $val);
	// Return, if no group with the given name could be found
	if ($groupID === false) return(false);

	// Get all settings for a group
	$sql = "SELECT * FROM `groupSettings` WHERE `groupid`='$groupID'";

	// Filter by group setting type, if it's not false
	if ($typeOriginal !== false)
		$sql .= " AND `type`='$type'";

	// Filter by group setting variable name, if it's not false
	if ($varOriginal !== false)
		$sql .= " AND `var`='$var'";

	$res = DB_queryNoDie($sql); //FW ok

	if ($res === false) return(false);

	while ($line = mysqli_fetch_assoc($res))
	{
		$out[$i]['var'] = CHECK_db2text($line['var']);
		$out[$i]['val'] = CHECK_db2text($line['val']);
		$out[$i]['type'] = intval($line['type']);
		$i++;
	}

	return($out);
}





/**
**name GRP_getSettingsForClient($clientName, $type = false, $var = false)
**description Gets the variable names, values and group setting types of all group settings that are assigned to a client.
**parameter clientName: name of the client (required)
**parameter type: (optional) Type of the group setting (can be used to identify the places where it should be used)
**parameter var: (optional) Name of the group setting.
**returns All variable names, values and group setting types of a group setting in an associative array or false if the client is in no group. ($out[$i]['var'], $out[$i]['val'], $out[$i]['type'])
**/
function GRP_getSettingsForClient($clientName, $type = false, $var = false)
{
	$groups = GRP_listClientGroups($clientName);

	// Return, if the client is in no group
	if (count($groups) == 0) return(false);

	$out = array();

	// Merge the group settings of all groups the client is in
	foreach ($groups as $groupName)
		$out = array_merge(GRP_getSetting($groupName, $type, $var), $out);

	// Make sure, the settings are unique
	return(array_unique($out, SORT_REGULAR));
}





/**
**name GRP_editSettingsDialog($groupName)
**description Shows a dialog for editing group settings.
**parameter groupName: name of the group.
**/
function GRP_editSettingsDialog($groupName)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	HTML_submit("BUT_save",$I18N_save);

	// Checkbox for "rebootClientAfterJobsIfNecessary"
	$rebootClientAfterJobsIfNecessary = HTML_checkBox('CB_rebootClientAfterJobsIfNecessary', '',
		GRP_getSingleSetting($groupName, GRP_SETTING_TYPE_execWhenAllJobsFinished, GRP_SETTING_VAR_rebootClientAfterJobsIfNecessary) != false);

		GRP_setSetting($groupName, GRP_SETTING_TYPE_execWhenAllJobsFinished, GRP_SETTING_VAR_rebootClientAfterJobsIfNecessary, $rebootClientAfterJobsIfNecessary);
		GRP_setSetting($groupName, GRP_SETTING_TYPE_execBeginningOfWorkPHP, GRP_SETTING_VAR_unsetTimeStampForRebootClientNecessary, $rebootClientAfterJobsIfNecessary);

	echo("
	<table>
		<tr>
			<td>".CB_rebootClientAfterJobsIfNecessary."</td>
			<td>$I18N_rebootClientAfterJobsIfNecessary</td>
		</tr>
		<tr>
			<td colspan=\"2\" align=\"center\">".BUT_save."</td>
		</tr>
		
	</table>
	");
}





/**
**name GRP_getSingleSetting($groupName, $type, $var)
**description Gets the value of a single group setting.
**parameter groupName: name of the group
**parameter type: Type of the group setting (can be used to identify the places where it should be used)
**parameter var: Name of the group setting.
**returns Value of a single group setting or false, if it's unset.
**/
function GRP_getSingleSetting($groupName, $type, $var)
{
	$setting = GRP_getSetting($groupName, $type, $var);
	return(isset($setting[0]['val']) ? $setting[0]['val'] : false);
}





/**
**name GRP_runSettingsForClient($clientName, $type = false, $var = false)
**description Run group settings for a given client.
**parameter clientName: name of the client (required)
**parameter type: (optional) Type of the group setting (can be used to identify the places where it should be used)
**parameter var: (optional) Name of the group setting.
**returns true, if there were group settings for the clients, otherwise false.
**/
function GRP_runSettingsForClient($clientName, $type = false, $var = false)
{
	$settings = GRP_getSettingsForClient($clientName, $type, $var);

	// Return, if the client is in no group or no settings were found
	if (($settings == false) || (0 == count($settings)))  return(false);

	// Run thru all the settings
	foreach ($settings as $setting)
	{
		// Decide by the variable name what has to be done
		switch ($setting['var'])
		{
			case GRP_SETTING_VAR_rebootClientAfterJobsIfNecessary:
				if ($setting['val'] == 1)
					CLIENT_rebootClientAfterJobsIfNecessaryBASH();
			break;
			case GRP_SETTING_VAR_unsetTimeStampForRebootClientNecessary:
				if ($setting['val'] == 1)
					CLIENT_unsetTimeStampForRebootingClientIfNOTNecessaryBASH();
			break;
		}
	}

	return(true);
}





/**
**name GRP_exists($groupName)
**description checks, if a group exists
**parameter groupName: name of the group to check
**/
function GRP_exists($groupName)
{
	CHECK_FW(CC_groupname,$groupName);
	$sql = "SELECT COUNT(*) FROM `groups` WHERE groupname='$groupName'";

	$result = DB_query($sql); //FW ok

	$count = mysqli_fetch_row($result);

	return($count[0] > 0 );
};





/**
**name GRP_add($groupName, $groupDescription)
**description Adds a group with description.
**parameter groupName: name of the group to add
**parameter groupDescription: description of the group to add
**/
function GRP_add($groupName, $groupDescription)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	if (CHECK_FW(true, CC_groupname, $groupName) === false)
	{
		MSG_showError($I18N_groupnameInvalid);
		return(false);
	}

	if (GRP_exists($groupName))
	{
		MSG_showError($I18N_group_exists);
		return(false);
	}
	
	if (CHECK_FW(true, CC_groupdescription, $groupDescription) === false)
	{
		MSG_showError($I18N_groupDescriptionInvalid);
		return(false);
	}

	$groupDescription = CHECK_text2db($groupDescription);

	$sql="INSERT INTO groups (groupname, description) VALUES ('$groupName', '$groupDescription')";
	if( DB_query($sql)) //FW ok
		MSG_showInfo($I18N_group_added_sucessfully);
	else
	{
		MSG_showError($I18N_error_db);
		return(false);
	}

	return(true);
};





/**
**name GRP_getIdByName($groupName)
**description gets the Id of a groupname
**parameter groupName: name of the group
**returns Group number or false, if no matching group is found.
**/
function GRP_getIdByName($groupName)
{
	if (CHECK_FW(true,CC_groupname,$groupName))
	{
		$sql = "SELECT Id FROM `groups` WHERE groupname='$groupName'";

		$result = DB_query($sql); //FW ok

		$line = mysqli_fetch_row($result);

		return($line[0]);
	}
	else
		return(false);
}





/**
**name GRP_getNameById($groupId)
**description gets the groupname of an Id
**parameter groupId: Index of the group
**returns Group name or false, if no matching group is found.
**/
function GRP_getNameById($groupId)
{
	if (CHECK_FW(true, CC_groupID, $groupId))
	{
		$sql = "SELECT groupname FROM `groups` WHERE id='$groupId'";

		$result = DB_query($sql); //FW ok

		$line = mysqli_fetch_row($result);

		return($line[0]);
	}
	else
		return(false);
}





/**
**name GRP_del($groupName)
**description deletes all clients from the group and the group itself
**parameter groupName: name of the group
**/
function GRP_del($groupName)
{
	CHECK_FW(CC_groupname,$groupName);
	$groupId = GRP_getIdByName($groupName);

	//delete all clients from the group
	$sql = "DELETE FROM `clientgroups` WHERE groupid='$groupId'";	
	DB_query($sql); //FW ok

	//delete group
	$sql = "DELETE FROM `groups` WHERE id='$groupId'";
	DB_query($sql); //FW ok
};





/**
**name GRP_isClientInGroup($clientName,$groupName)
**description returnes true, if a client is in the selected group, otherwise false
**parameter clientName: name of the client 
**parameter groupName: name of the group
**/
function GRP_isClientInGroup($clientName,$groupName)
{
	CHECK_FW(CC_groupname, $groupName, CC_clientname, $clientName);

	$cid = CLIENT_getId($clientName);
	$gid = GRP_getIdByName($groupName);

	$sql="SELECT COUNT(*) FROM `clientgroups` WHERE clientid='$cid' AND groupid='$gid'";

	$res = DB_query($sql); //FW ok

	$line = mysqli_fetch_row($res);

	return($line[0] > 0);
};





/**
**name GRP_addClientToGroup($clientName,$groupName)
**description adds a client to a group
**parameter clientName: name of the client 
**parameter groupName: name of the group
**/
function GRP_addClientToGroup($clientName,$groupName)
{
	CHECK_FW(CC_groupname, $groupName, CC_clientname, $clientName);
	$cid = CLIENT_getId($clientName);
	$gid = GRP_getIdByName($groupName);

	if (!empty($cid) && !empty($gid) && !GRP_isClientInGroup($clientName,$groupName))
	{
		$sql="INSERT INTO `clientgroups` (`clientid` , `groupid`) VALUES ('$cid', '$gid')";

		DB_query($sql); //FW ok
	}
};





/**
**name GRP_delClientFromGroup($clientName,$groupName)
**description removes a client from a group
**parameter clientName: name of the client 
**parameter groupName: name of the group
**/
function GRP_delClientFromGroup($clientName,$groupName="")
{
	CHECK_FW(CC_groupnameOrEmpty, $groupName, CC_clientname, $clientName);
	$cid = CLIENT_getId($clientName);

	$addSQL="";

	if (!empty($groupName))
	{
		$gid = GRP_getIdByName($groupName);

		if (!empty($gid))
			$addSQL="AND groupid='$gid'";
	}

	if (!empty($cid))
	{
		$sql="DELETE FROM `clientgroups` WHERE clientid='$cid' $addSQL";

		DB_query($sql); //FW ok
	}
}





/**
**name GRP_setDescrGroup($group, $groupDescription)
**description Sets the description of a client group.
**parameter groupName: Name of the group
**parameter groupDescription: New description of the group
**/
function GRP_setDescrGroup($group, $groupDescription)
{
	CHECK_FW(CC_groupname, $group);
	$groupDescription = CHECK_text2db($groupDescription);

	$sql="UPDATE `groups` SET `description` = '$groupDescription' WHERE groupname='$group'";
	$result = DB_query($sql);
}





/**
**name GRP_getDescrGroup($group)
**description Gets the description of a client group.
**returns Description of the group.
**/
function GRP_getDescrGroup($group)
{
	CHECK_FW(CC_groupname, $group);
	$sql="SELECT description FROM `groups` WHERE groupname='$group'";
	
	$result = DB_query($sql);
	$group_descr = mysqli_fetch_row($result);
	
	return($group_descr[0]);
}





/**
**name GRP_listGroupsAndCount()
**description returnes a associative array with all groupnames and the amount of clients in each group
**/
function GRP_listGroupsAndCount()
{
	$groups = GRP_listGroups();

	$i = 0;

	foreach ($groups as $group)
	{
		$arr[$i]['groupname']=$group;
		$arr[$i]['description']= GRP_getDescrGroup($group);
		$arr[$i]['count'] = GRP_countClients($group);
		$i++;
	}

	return($arr);
}





/**
**name GRP_showGroupsAndCount()
**description generates a table with all groupnames and the amount of clients in each group
**/
function GRP_showGroupsAndCount()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$selectedGroups = array();

	$actionList[$I18N_install]	= $I18N_install;
	$actionList[$I18N_deinstall]= $I18N_deinstall;
	$actionList[$I18N_update]	= $I18N_update;
	$actionList[$I18N_recover]	= $I18N_recover;

	//Get all groups
	$groupList = GRP_listGroupsAndCount();

	$nr=0;
	//get all groups and store them in an array
	for ($i=0; $i < count($groupList); $i++)
	{
		if (isset($_POST["CB_do$i"]))
			$selectedGroups[$nr++]=$_POST["CB_do$i"];
	}

	//Generate an urlencoded string with all selected groups
	$selectedGroupsURL = urlencode(serialize($selectedGroups));

	//The selected action
	$actionStr = HTML_selection("SEL_action", $actionList, SELTYPE_selection,true,$I18N_install);

	//if the action should make direct changes (true) or call a second page (false)
	$directChange=false;

	if (isset($_POST['directChange']) && ($_POST['directChange'] == 1))
		$directChange=true;

	//Set form action, page and label of the execution button
	switch($actionStr)
		{
			case "$I18N_install":
				{
					$action="";
					$page="installpackages";
					$doLabel = $I18N_install_packages;
					break;
				};

			case "$I18N_deinstall":
				{
					$action="&action=deinstall";
					$page="installpackages";
					$doLabel = $I18N_deinstall_packages;
					break;
				};

			case "$I18N_update":
				{
					$action="&action=update";
					$page="installpackages";
					$doLabel = $I18N_update;
					break;
				};

			case "$I18N_recover":
				{
					$action="&action=recover";
					$page="groupsoverview";
					$doLabel = $I18N_recover;
					$directChange=true;
					break;
				};
		};

	//Check if the execution label is pressed
	$doPressed = HTML_submit("BUT_do",$doLabel);

	//Check if a different action should be selected
	if (HTML_submit("BUT_selectAction",$I18N_select))
	{
		$page="groupsoverview";
	}

	//Check if changes should be executed directly form here
	if ($directChange && $doPressed)
	{
		$clients = GRP_listAllClientsInGroups($selectedGroups);

		switch ($actionStr)
		{
			case "$I18N_recover":
				{
					GRP_desasterRecovery($clients);
					break;
				};
		};
	}
	else
	{
		//Set the page and action of the page to switch to
		HTML_showFormHeader("?page=$page"."$action","post");

		HTML_showTableHeader();

		HTML_showTableHeading($I18N_group_name, $I18N_client_amount, "", $I18N_description);

		$i = 0;

		//write the group lines and check boxes
		foreach ($groupList as $entry)
			{
				HTML_checkBox("CB_do$i", $entry['groupname'], false, "", $entry['groupname']);
				HTML_showTableRow(($i % 2 == 1),"<a href=\"index.php?page=groupdetails&groupname=$entry[groupname]\">$entry[groupname]</a>", $entry['count'], constant("CB_do$i"), nl2br($entry['description']));
				$i++;
			};

		//Add the execution button and hidden variables
		echo("
		<tr>
			<td colspan=\"4\" align=\"center\">
				<input type=\"hidden\" name=\"SEL_action\" value=\"$actionStr\">
				<input type=\"hidden\" name=\"selectedGroups\" value=\"$selectedGroupsURL\">
				".BUT_do."
			</td>
		</tr>
		");
		HTML_showFormEnd();




		//Add the elements for choosing the action
		HTML_showFormHeader();
		HTML_setPage("groupsoverview");
		echo("

		<tr>
			<td colspan=\"3\">
				".SEL_action."
			</td>
			<td align=\"right\">
				".BUT_selectAction."
			</td>
		</tr>");
		HTML_showTableEnd();
	};
	HTML_showFormEnd();
}





/**
**name GRP_ren($groupName,$newGroupName)
**description renames a group
**parameter groupName: name of the group
**parameter newGroupName: name of the new group
**/
function GRP_ren($groupName,$newGroupName)
{
	if (!empty($newGroupName))
		{
			CHECK_FW(CC_groupname, $groupName, CC_groupname, $newGroupName);
			$sql="UPDATE `groups` SET `groupname` = '$newGroupName' WHERE `groupname` = '$groupName'";

			DB_query($sql); //FW ok
		};
};





/**
**name GRP_HTMLBackToDetails($groupName,$section)
**description generates HTML code to return to the group details page
**parameter groupName: name of the group
**parameter section: name of the section to jump to
**/
function GRP_HTMLBackToDetails($groupName,$section)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	echo("<br><a href=\"index.php?page=groupdetails&groupname=$groupName#$section\"><img border=\"0\" src=\"/gfx/group.png\"> $I18N_backToGroupDetails <img border=\"0\" src=\"/gfx/group.png\"></a><br>");
};





/**
**name GRP_countClients($groupName)
**description returns the amount of client of a certain group
**parameter groupName: name of the group
**/
function GRP_countClients($groupName)
{
	CHECK_FW(CC_groupname, $groupName);
	
	$gid = GRP_getIdByName($groupName);

	$sql="SELECT COUNT(*) FROM `clientgroups` WHERE groupid='$gid'";

	$res = DB_query($sql); //FW ok

	$line = mysqli_fetch_row($res);

	return($line[0]);
}





/**
**name GRP_showGeneralInfo($groupName)
**description shows a table with general information about the group
**parameter groupName: name of the group
**/
function GRP_showGeneralInfo($groupName)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$clientAmount = GRP_countClients($groupName);
	$grpDescription = GRP_getDescrGroup($groupName);

	echo("<table align=\"center\"><tr><td><div class=\"subtable_shadow\">
	<table class=\"subtable\" align=\"center\">
		<tr> <td>$I18N_client_amount:</td>	<td> $clientAmount </td> </tr>
		<tr> <td>$I18N_description:</td>	<td> $grpDescription </td> </tr>
	</table></div></td><tr></table>");

};





/**
**name GRP_showRenDialog($groupname)
**description shows a dialog to rename a group
**parameter groupName: name of the group
**/
function GRP_showRenDialog($groupname)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	echo("
	<table align=\"center\"><tr><td><div class=\"subtable_shadow\">
	<table class=\"subtable\" align=\"center\">
	<tr>
		<td>
			<span class=\"subhighlight\">$I18N_newName</span><br>
			<INPUT type=\"text\" name=\"ED_newgroupname\" size=\"40\" maxlength=\"255\"><br>
			<INPUT type=\"submit\" name=\"BUT_ren\" value=\"$I18N_rename\">
			
		</td>
	</tr>
	</table></div></td><tr></table>
");
};





/**
**name GRP_showChangeDescriptionDialog($groupname)
**description shows a dialog to change the group description
**parameter groupName: name of the group
**/
function GRP_showChangeDescriptionDialog($groupname)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	HTML_textArea('TA_newGroupDescription', 40, 5, GRP_getDescrGroup($groupname));

	echo("
	<table align=\"center\"><tr><td><div class=\"subtable_shadow\">
	<table class=\"subtable\" align=\"center\">
	<tr>
		<td>
			<span class=\"subhighlight\">$I18N_newDescription</span><br>
			".TA_newGroupDescription."<br>
			<INPUT type=\"submit\" name=\"BUT_change\" value=\"$I18N_change\">
			
		</td>
	</tr>
	</table></div></td><tr></table>	
");
}





/**
**name GRP_moveClientToGroup($clientName,$oldGroup,$newGroup)
**description moves a client from one group to another
**parameter clientName: client to move
**parameter oldGroup: name of the old group
**parameter newGroup: name of the new group
**/
function GRP_moveClientToGroup($clientName,$oldGroup,$newGroup)
{
	CHECK_FW(CC_groupname, $newGroup, CC_groupname, $oldGroup, CC_clientname, $clientName);
	
	$inn = GRP_isClientInGroup($clientName,$newGroup);
	$ino = GRP_isClientInGroup($clientName,$oldGroup);
	
	if ($inn && $ino) 
		//the client is already in the new group: delete it from the old
		GRP_delClientFromGroup($clientName,$oldGroup);
	elseif (!$inn && $ino)
		{
			//client is in group => update client group
			$ogid = GRP_getIdByName($oldGroup);
			$ngid = GRP_getIdByName($newGroup);
			$cid = CLIENT_getId($clientName);
			
			if (!empty($ogid) && !empty($ngid) && !empty($cid))
				{
					$sql ="UPDATE `clientgroups` SET `groupid` = '$ngid' WHERE `groupid` = '$ogid' AND `clientid` = '$cid'";

					DB_query($sql); //FW ok
				};
		}
	else
		//client is not in the old group => add client to new group
		GRP_addClientToGroup($clientName,$newGroup);
};





/**
**name GRP_listGroups()
**description returnes all groups in an array
**/
function GRP_listGroups()
{
	$sql="SELECT groupname FROM `groups`";

	$result = DB_query($sql); //FW ok

	$i = 0;

	while ($line = mysqli_fetch_row($result))
	{
		$arr[$i] = $line[0];
		$i++;
	}

	return($arr);
};





/**
**name GRP_groupSelection($selName,$first)
**description generates a HTML selection with all groups as options
**parameter selName: name of the selection
**parameter first: the group that should be shown first
**/
function GRP_groupSelection($selName,$first="")
{
	$arr=GRP_listGroups();
	
	$out="<SELECT name=\"$selName\" size=\"1\">\n";
	
	if (!empty($first))
		$out.="<option value=\"$first\">$first</option>\n";

	foreach ($arr as $entry)
		if ($first != $entry)	
			$out.="<option value=\"$entry\">$entry</option>\n";
		
	$out.="</SELECT>\n";
	
	return($out);
};





/**
**name GRP_showDelDialog($groupName)
**description shows a dialog for deleting a group
**parameter groupName: name of the group
**/
function GRP_showDelDialog($groupName)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	GRP_showGeneralInfo($groupName);

	echo("<br><br>
<table align=\"center\"><tr><td><div class=\"subtable_shadow\">
<table align=\"center\" class=\"subtable\">
	<tr>
		<td>
			$I18N_shouldTheGroupGetDeleted
		</td>
	</tr>
	<tr>
		<td align=\"center\">
	</tr>
	<tr>
		<td align=\"center\">
    		<a href=\"index.php?page=groupactions&groupname=$groupName&action=deleteGroup&sure=1\">
			<img border=\"0\" src=\"/gfx/button_ok-mini.png\">$I18N_yes</a> &nbsp; 
			<a href=\"index.php?page=groupdetails&groupname=$groupName#groupAdministration\">
			<img border=\"0\" src=\"/gfx/button_cancel-mini.png\">$I18N_no<br></a>
		</td>
	</tr>
</table></div></td><tr></table>");
};





/**
**name GRP_doClientMoreGroups($clientName,$type)
**description dialog and logic for adding and removing the client to and from multiple groups
**parameter clientName: name of the client
**parameter type: type of the action ("add" for adding,"del" for removing)
**/
function GRP_doClientMoreGroups($clientName, $type)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	$selGroups = array();

	// Get the client name from POST or GET
	if (isset($_POST['client'])) $clientName = $_POST['client'];
	elseif (isset($_GET['client'])) $clientName = $_GET['client'];
	else die('GRP_doClientMoreGroups: No client name given');

	// Get the client id from POST or GET
	if (isset($_POST['id'])) $id = $_POST['id'];
	elseif (isset($_GET['id'])) $id = $_GET['id'];
	else die('GRP_doClientMoreGroups: No client id given');

	// Get the action type from POST or GET
	if (isset($_POST['actionType'])) $type = $_POST['actionType'];
	elseif (isset($_GET['actionType'])) $type = $_GET['actionType'];

	// Get the info type from POST or GET
	if (isset($_POST['infoType'])) $infoType = $_POST['infoType'];
	elseif (isset($_GET['infoType'])) $infoType = $_GET['infoType'];

	switch ($type)
	{
		case "add": //client should be added to the groups
		{
			$buttonLabel = $I18N_add;
			$title = $I18N_addToGroup;
			//should the client in the groups?
			$isInGroupsOnly = false;
			$sorryText=$I18N_noMoreGroupsForAdding;
			break;
		}
		case "del": //client should be deleted from the groups
		{
			$buttonLabel = $I18N_delete;
			$title = $I18N_removeFromGroup;
			$isInGroupsOnly = true;
			$sorryText=$I18N_clientIsInNoGroup;
			break;
		}
	}


	if (isset($type) && isset($_POST["BUT_$type"]))
	{
		for ($i=0; $i < $_POST['groupAmount']; $i++)
		{
			if (isset($_POST["CB_do$i"]))
			{
				switch ($type)
				{
					case "add": GRP_addClientToGroup($clientName,$_POST["CB_do$i"]); break;
					case "del": GRP_delClientFromGroup($clientName,$_POST["CB_do$i"]); break;
				}
			}
		}
	}

	$groups = GRP_listGroups();
	
	$i = 0;
	
	//select all groups that the client is (not) in
	foreach ($groups as $group)
		{
			if (($isInGroupsOnly && GRP_isClientInGroup($clientName,$group)) ||
				(!$isInGroupsOnly && !GRP_isClientInGroup($clientName,$group)))
				{
					$selGroups[$i] = $group;
					$i++;
				};
		};
	
	//write table header
	echo("
<form method=\"POST\">
<table align=\"center\"><tr><td><div class=\"subtable_shadow\">
<table align=\"center\" class=\"subtable\">
	<tr>
		<td>
			<span class=\"subhighlight\">$I18N_group_name</span>
		</td>
		<td>
			<span class=\"subhighlight\">$I18N_selected</span>
		</td>
	</tr>");
	
	$i = 0;	

	//build checkboxes for groups
	if (count($selGroups) > 0)
		{
			foreach ($selGroups as $group)
				{
					echo("
			<tr>
				<td>
					$group
				</td>
				<td>
					<INPUT type=\"checkbox\" name=\"CB_do$i\" value=\"$group\">
				</td>
			</tr>
			");
					$i++;
				};
		}
	else
		echo("<tr><td colspan=\"2\">$sorryText</td></tr>");
		
	$amount = $i;
	
	HTML_setPage('clientinfo');
	//close table
echo("
	<tr>
		<td align=\"center\" colspan=\"2\">
			<input type=\"hidden\" name=\"groupAmount\" value=\"$amount\">
			<input type=\"hidden\" name=\"actionType\" value=\"$type\">
			<input type=\"hidden\" name=\"infoType\" value=\"$infoType\">
			<input type=\"hidden\" name=\"client\" value=\"$clientName\">
			<input type=\"hidden\" name=\"id\" value=\"$id\">
			<INPUT type=\"submit\" name=\"BUT_$type\" value=\"$buttonLabel\">
		</td>
	</tr>
</table></div></td><tr></table>
</form>
");
};





/**
**name GRP_listClientGroups($clientName)
**description returnes an array containing all groups a client is in
**parameter clientName: name of the client
**/
function GRP_listClientGroups($clientName)
{
	CHECK_FW(CC_clientname, $clientName);
	$cid = CLIENT_getId($clientName);

	$sql="SELECT groups.groupname FROM clientgroups, groups WHERE clientgroups.clientid=\"$cid\" AND clientgroups.groupid=groups.id ORDER BY groups.groupname";

	$res = DB_query($sql); //FW ok

	$i=0;

	$arr = array();

	while ($line = mysqli_fetch_row($res))
	{
		$arr[$i]=$line[0];
		$i++;
	}

	return($arr);
}





/**
**name GRP_showClientGroups($clientName, $link=false, $output=true )
**description Shows a list containing all groups a client is in
**parameter clientName: name of the client
**parameter link: if there should be links to the group page
**parameter output: If set to true, the list will be shown, if set to false returned instead.
**returns Nothing or the list containing all groups a client is in.
**/
function GRP_showClientGroups($clientName, $link=false, $output=true )
{
	$groups = GRP_listClientGroups($clientName);
	
	$out="";
	
	$comma="";
	
	if (count($groups))
		foreach($groups as $group)
		{
			if ($link)
				$out.="$comma<a href=\"index.php?page=groupdetails&groupname=$group\">$group</a>";
			else
				$out.="$comma$group";
			
			$comma=", ";
		}

	if ($output)
		echo($out);
	else
		return($out);
};





/**
**name GRP_listAllClientsInGroup($groupName)
**description returns an array that consists of all client names that are in a group
**parameter groupName: name of the group to check
**/
function GRP_listAllClientsInGroup($groupName)
{
	$out = array();

	$res = CLIENT_query("","","","",$groupName);

	$nr = 0;

	while( $data = mysqli_fetch_array($res) )
		$out[$nr++] = $data['client'];

	return($out);
};





/**
**name GRP_getDistrsAndSourcesLists($groupName, &$distrs, &$sourceslists)
**description writes the differnt distributions and package sources of the clients in a group as array to the both variables
**parameter distrs: variable that should store the distributions
**parameter sourceslists: variable that should store the sourceslist names
**/
function GRP_getDistrsAndSourcesLists($groupName, &$distrs, &$sourceslists)
{
	$clients = GRP_listAllClientsInGroup($groupName);

	$dnr = $snr = 0;

	if (!is_array($distrs))
		$distrs = array();
		
	if (!is_array($sourceslists))
		$sourceslists = array();
	
	#Check if no groupname is given => then give out all sources lists and distributions
	if (empty($groupName))
	{
		$distrs = DISTR_listDistributions(false);

		foreach ($distrs as $distr)
		{
			$sls = SRCLST_getListnames($distr);

			if (count($sls) > 0)
				foreach ($sls as $sl)
					$sourceslists[$snr++] = $sl;
		}

		return(true);
	}
	
	if (count($clients) > 0)
		foreach ($clients as $client)
			{
				//print("cl: $client ");
				$options = CLIENT_getAllOptions($client);
				
				if (!empty($options['distr']) && !in_array($options['distr'],$distrs))
					$distrs[$dnr++]=$options['distr'];
					
				if (!empty($options['packagesource']) && !in_array($options['packagesource'],$sourceslists))
					$sourceslists[$snr++]=$options['packagesource'];
			};
}





/**
**name GRP_showSelDistrSources($groupNames,&$distr, &$sourceslist)
**description shows a dialog for selection of distribution and package source name. The choices are taken form distr and packagesource values of the clients in the group. If there is only one entry for one or both of the values, the value is written back to the input variable otherwise a HTML selection is shown.
**parameter groupNames: group names stored in an array or NULL, if groups should be ignored and all distributions and sources lists should be shown.
**parameter distr: distribution to show first and variable to write the distribution name back
**parameter sourceslist: sources list to show first and variable to write the sources list name back
**/
function GRP_showSelDistrSources($groupNames,&$distr, &$sourceslist)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	if (!is_null($groupNames))
	{
		//store all distributions and sources lists used in the clients in $distrs and $sourceslists
		foreach ($groupNames as $groupName)
			GRP_getDistrsAndSourcesLists($groupName, $distrs, $sourceslists);
	}
	else
	{
		$distrs = DISTR_listDistributions();
		$sourceslists = SRCLST_getListnames('*');
	}
	

	$moreDistrs=(count($distrs) > 1);
	$moreSourceslists=(count($sourceslists) > 1);
	$selectionMessage=((isset($_GET['action']) && ($_GET['action'] == 'packageSelection')) ? $I18N_beAwareOfDifferenDistros : $I18N_clientsInGroupHaveDifferentDistributionsSourceslist);

	//if there is anything to select show selection
	if ($moreDistrs || $moreSourceslists)
	{
		HTML_showTableHeader();

		echo("<tr><td>$selectionMessage<br><br>");

		//are there distributions to select?
		if ($moreDistrs)
		{
			sort($distrs);
			//show selection
			echo(" $I18N_distribution ".HTML_listSelection("SEL_distr",$distrs,$distr));
		}
		else
		{
			//assign the only distribution
			$distr = $distrs[0];
			echo(" $I18N_distribution: $distr ");
		}

		//are there sourceslists to select?
		if ($moreSourceslists)
		{
			sort($sourceslists);
			//show selection
			echo(" $I18N_packageSourceName ".HTML_listSelection("SEL_sourceslist",$sourceslists,$sourceslist));
		}
		else
		{
			//assign the only sourceslist
			$sourceslist = $sourceslists[0];
			echo(" $I18N_packageSourceName: $sourceslist ");
		}

		echo("&nbsp;&nbsp;<INPUT type=\"submit\" name=\"BUT_distrSource\" value=\"$I18N_select\"></td></tr>");
			
		HTML_showTableEnd();
	}
	else
	{
		//there is only one sourceslist and one distribution => assign
		$distr = isset($distrs[0]) ? $distrs[0] : '';
		$sourceslist = isset($sourceslists[0]) ? $sourceslists[0] : '';
	}
};





/**
**name GRP_listAllClientsInGroups($groupNames, $withAutoUpdateJob = false)
**description returns an array with all client names contained in the groups
**parameter groupNames: the names of the groups stored in an array
**parameter withAutoUpdateJob: If set to true, only clients with auto update job will be listed.
**returns Array with the found client names.
**/
function GRP_listAllClientsInGroups($groupNames, $withAutoUpdateJob = false)
{
	$arr = array();
	$wAUJSQL = '';
	$firstGroup = true;
	$gSQL = '';

	// Run thru the group names and make an SQL statement that contains only these groups
	foreach ($groupNames as $name)
	{
		CHECK_FW(CC_groupname, $name);
		$gid = GRP_getIdByName($name);

		if ($firstGroup)
			$gSQL = "clientgroups.groupid=$gid";
		else
			$gSQL .= " OR clientgroups.groupid=$gid";

		$firstGroup = false;
	}
	
	// Only list clients with auto update job?
	if ($withAutoUpdateJob) $wAUJSQL = 'AND clients.autoUpdate_gotJob = 1';

	$sql="SELECT DISTINCT clients.client FROM clients, clientgroups WHERE clients.id=clientgroups.clientid AND ($gSQL) $wAUJSQL ORDER BY clients.client";

	$res = DB_query($sql); //FW ok

	$i=0;

	while ($line = mysqli_fetch_row($res))
	{
		$arr[$i]=$line[0];
		$i++;
	}
		
	return($arr);
}





/**
**name GRP_HTMLBackToOverview()
**description generates HTML code to return to the group overview page
**/
function GRP_HTMLBackToOverview()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	echo("<br><a href=\"index.php?page=groupsoverview\"><img border=\"0\" src=\"/gfx/group.png\"> $I18N_backToGroupOverview <img border=\"0\" src=\"/gfx/group.png\"></a><br>");
};





/**
**name GRP_getAllPackages($groupNames,$key,$withActions)
**description shows a list of all packages on all clients in the selected groups. the packages can be selected by checkboxes
**parameter groupNames: group names stores in an array
**parameter key: keyword for searching for packages
**parameter withActions: you can select to draw te action 
**/
function GRP_getAllPackages($groupNames,$key,$withActions)
{
	CHECK_FW(CC_packageOrEmpty, $key);
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//if we've selected no key, print out all packages
	if (empty($key))
		$key="%";
		else//otherwise all packages containing the key
		$key="%$key%";

	$gidSQL="clientgroups.groupid=".GRP_getIdByName($groupNames[0]);

	for ($i=1; $i < count($groupNames); $i++)
	{
		CHECK_FW(CC_groupname, $groupNames[$i]);
		$gidSQL.=" OR clientgroups.groupid=".GRP_getIdByName($groupNames[$i]);
	}

	$sql = "SELECT DISTINCT clientpackages.package FROM clients, clientgroups, clientpackages WHERE clients.id=clientgroups.clientid AND ($gidSQL) AND clientpackages.clientname=clients.client AND clientpackages.package LIKE '$key' ORDER BY clientpackages.package";

	$result = DB_query($sql); //FW ok
	$counter = 0;

	HTML_showTableHeader();

	while ($line = mysqli_fetch_row($result))
		{
		 if ($withActions)
		 	 $actions="<td><INPUT type=\"checkbox\" name=\"CB_pkg$counter\" value=\"$line[0]\"></td>";
			 else
			 $actions="";

		echo("<tr><td>".$line[0]."</td>$actions</tr>\n");
		$counter++;
		};

	HTML_showTableEnd();

	return($counter);
};





/**
**name GRP_desasterRecovery($clients)
**description recovers all selected clients and shows a message afterwards
**parameter clients: an array containing all clients that should be recovered
**/
function GRP_desasterRecovery($clients)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$clientsStr="<b>$I18N_recover_client</b>:<br><br>";

	foreach ($clients as $client)
	{
		$clientsStr.="&bull; $client<br>";
		CLIENT_desasterRecovery($client);
	};
	
	MSG_showInfo($clientsStr);
};
?>