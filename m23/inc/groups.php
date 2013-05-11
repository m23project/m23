<?PHP
/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: group management funtions
$*/



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

	$count = mysql_fetch_row($result);

	return($count[0] > 0 );
};





/**
**name GRP_add($groupName)
**description adds a group
**parameter groupName: name of the group to add
**/
function GRP_add($groupName)
{
	CHECK_FW(CC_groupname,$groupName);
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	if (GRP_exists($groupName))
		{
			MSG_showError($I18N_group_exists);
			return(false);
		}
	else
		{
			$sql="INSERT INTO groups (groupname) VALUES ('$groupName')";
  			if( db_query($sql)) //FW ok
				MSG_showInfo($I18N_group_added_sucessfully);
			else
   				{
					MSG_showError($I18N_error_db);
					return(false);
				}
		};
		
	return(true);
};





/**
**name GRP_getIdByName($groupName)
**description gets the Id of a groupname
**parameter groupName: name of the group
**/
function GRP_getIdByName($groupName)
{
	CHECK_FW(CC_groupname,$groupName);
	$sql = "SELECT Id FROM `groups` WHERE groupname='$groupName'";

	$result = db_query($sql); //FW ok

	$line = mysql_fetch_row($result);

	return($line[0]);
};





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
	db_query($sql); //FW ok

	//delete group
	$sql = "DELETE FROM `groups` WHERE id='$groupId'";
	db_query($sql); //FW ok
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

	$res = db_query($sql); //FW ok

	$line = mysql_fetch_row($res);

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

			db_query($sql); //FW ok
		};
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
		};

	if (!empty($cid))
		{
			$sql="DELETE FROM `clientgroups` WHERE clientid='$cid' $addSQL";

			db_query($sql); //FW ok
		};
};





/**
**name GRP_listGroupsAndCount()
**description returnes a associative array with all groupnames and the amount of clients in each group
**/
function GRP_listGroupsAndCount()
{
	$groups = GRP_listGroups();

	foreach ($groups as $group)
		{
			$arr[$i]['groupname']=$group;
			$arr[$i]['count'] = GRP_countClients($group);
			$i++;
		};

	return($arr);
}





/**
**name GRP_showGroupsAndCount()
**description generates a table with all groupnames and the amount of clients in each group
**/
function GRP_showGroupsAndCount()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$actionList[0]=$I18N_install;
	$actionList[1]=$I18N_deinstall;
	$actionList[2]=$I18N_update;
	$actionList[3]=$I18N_recover;


	$type=$_GET[SEL_type];

	//make sure that $type has a valid value
	if (empty($type))
		$type=$_GET[type];

	if (empty($type))
		$type=$I18N_install;

	$action = $_GET['SEL_type'];



	//if the action should make direct changes (true) or call a second page (false)
	$directChange=false;

	if ($_POST[directChange] == 1)
		$directChange=true;

	switch($type)
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
					$action="&type=$I18N_recover";
					$page="groupsoverview";
					$doLabel = $I18N_recover;
					$directChange=true;
					break;
				};
		};
	
	//check if the "do" button is pressed and the changes should be made directly
	if ($directChange && isset($_POST[BUT_do]))
	{
		$nr = 0;

		//get all groups and store them in an array
		for ($i=0; $i < $_POST[groupAmount]; $i++)
			{
				if (isset($_POST["CB_do$i"]))
					$groups[$nr++]=$_POST["CB_do$i"];
			}

		$clients=GRP_listAllClientsInGroups($groups);

		switch ($type)
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
	
		$list=GRP_listGroupsAndCount();
		
		//write table header
		echo("
		<FORM action=\"index.php?page=$page&groupmode=1$action\" method=\"POST\">
		<input type=\"hidden\" name=\"directChange\" value=\"");

		if ($directChange)
			echo("1");
		else
			echo("0");

		echo("\">
		<table align=\"center\"><tr><td><div class=\"subtable_shadow\">
		<table class=\"subtable\" align=\"center\">
		<tr>
			<td>
				<span class=\"subhighlight\">$I18N_group_name</span>
			</td>
			<td>
				<span class=\"subhighlight\">$I18N_client_amount</span>
			</td>
			<td></td>
		</tr>");

		$i = 0;

		//write the group lines
		foreach ($list as $entry)
			{
				echo("<tr>
						<td>
							<a href=\"index.php?page=groupdetails&groupname=$entry[groupname]\">$entry[groupname]
							</a>
						</td>
						<td align=\"center\">$entry[count]</td>
						<td>
							<INPUT type=\"checkbox\" name=\"CB_do$i\" value=\"$entry[groupname]\">
						</td>
					</tr>");
					
				$i++;
			};
		
		HTML_setPage($page);
		echo("
		<tr>
			<td colspan=\"3\" align=\"center\">
				<INPUT type=\"submit\" name=\"BUT_do\" value=\"$doLabel\">
			</td>
		</tr>
		<input type=\"hidden\" name=\"groupAmount\" value=\"$i\">
		</FORM>
		<FORM method=\"GET\">
		<tr>
			<td colspan=\"2\">".
				HTML_listSelection("SEL_type",$actionList,$type)."
			</td>
			<td>
				<INPUT type=\"submit\" name=\"BUT_select\" value=\"$I18N_select\">
			</td>
		</tr>");
		
		HTML_setPage($page);

		echo("
		</FORM>
		</table>
		</div></td><tr></table>
		");
	};
}




function GRP_showGroupsAndCount2()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

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

	if ($_POST[directChange] == 1)
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

		HTML_showTableHeading($I18N_group_name, $I18N_client_amount, "");

		$i = 0;

		//write the group lines and check boxes
		foreach ($groupList as $entry)
			{
				HTML_checkBox("CB_do$i", $entry['groupname'], false, "", $entry['groupname']);
				HTML_showTableRow("<a href=\"index.php?page=groupdetails&groupname=$entry[groupname]\">$entry[groupname]</a>", $entry['count'], constant("CB_do$i"));
				$i++;
			};

		//Add the execution button and hidden variables
		echo("
		<tr>
			<td colspan=\"3\" align=\"center\">
				".BUT_do."
			</td>
		</tr>
		<input type=\"hidden\" name=\"SEL_action\" value=\"$actionStr\">
		<input type=\"hidden\" name=\"selectedGroups\" value=\"$selectedGroupsURL\">
		");
		HTML_showFormEnd();



		//Add the elements for choosing the action
		HTML_showFormHeader();
		HTML_setPage("groupsoverview");
		echo("

		<tr>
			<td colspan=\"2\">
				".SEL_action."
			</td>
			<td>
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

			db_query($sql); //FW ok
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

	$res = db_query($sql); //FW ok

	$line = mysql_fetch_row($res);

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

	echo("<table align=\"center\"><tr><td><div class=\"subtable_shadow\">
	<table class=\"subtable\" align=\"center\">
	 <tr> <td colspan=\"2\"><span class=\"subhighlight\">$I18N_group_information:</span></td></tr>
	 <tr>
		<td><span class=\"subhighlight\">$I18N_property</span></td>
		<td><span class=\"subhighlight\">$I18N_value</span></td>
	 </tr>
	 <tr> <td>$I18N_group_name:</td>	<td> $groupName </td> </tr>
	 <tr> <td>$I18N_client_amount:</td>	<td> $clientAmount </td> </tr>
	</table></div></td><tr></table>");

};





/**
**name GRP_showRenDialog()
**description shows a dialog to rename a group
**/
function GRP_showRenDialog()
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

					db_query($sql); //FW ok
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

	$result = db_query($sql); //FW ok

	$i = 0;

	while ($line = mysql_fetch_row($result))
		{
			$arr[$i] = $line[0];
			$i++;
		};

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
function GRP_doClientMoreGroups($clientName,$type)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	if (empty($clientName))
		$clientName=$_POST['client'];

	if (empty($id))
		$id=$_POST['id'];

	if (empty($id))
		$id=$_GET['id'];
		
	if (empty($type))
		$type=$_POST['actionType'];
		
	if (empty($infoType))
		$infoType=$_POST['infoType'];
		
		
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
				};
			case "del": //client should be deleted from the groups
				{
					$buttonLabel = $I18N_delete;
					$title = $I18N_removeFromGroup;
					$isInGroupsOnly = true;
					$sorryText=$I18N_clientIsInNoGroup;
					break;
				};
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
								};
						};
				};
		};

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

	$res = db_query($sql); //FW ok

	$i=0;

	while ($line = mysql_fetch_row($res))
		{
			$arr[$i]=$line[0];
			$i++;
		};

	return($arr);
};





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
	$res = CLIENT_query("","","","",$groupName);
	
	$nr = 0;
	
	while( $data = mysql_fetch_array($res) )
		{
			$out[$nr++] = $data[client];
		};
		
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
				
				if (!empty($options[distr]) && !in_array($options[distr],$distrs))
					$distrs[$dnr++]=$options[distr];
					
				if (!empty($options[packagesource]) && !in_array($options[packagesource],$sourceslists))
					$sourceslists[$snr++]=$options[packagesource];
			};
}





/**
**name GRP_showSelDistrSources($groupNames,&$distr, &$sourceslist)
**description shows a dialog for selection of distribution and package source name. The choices are taken form distr and packagesource values of the clients in the group. If there is only one entry for one or both of the values, the value is written back to the input variable otherwise a HTML selection is shown.
**parameter groupNames: group names stores in an array
**parameter distr: distribution to show first and variable to write the distribution name back
**parameter sourceslist: sources list to show first and variable to write the sources list name back
**/
function GRP_showSelDistrSources($groupNames,&$distr, &$sourceslist)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	//store all distributions and sources lists used in the clients in $distrs and $sourceslists
	foreach ($groupNames as $groupName)
		GRP_getDistrsAndSourcesLists($groupName, $distrs, $sourceslists);

	$moreDistrs=(count($distrs) > 1);
	$moreSourceslists=(count($sourceslists) > 1);

	//if there is anything to select show selection
	if ($moreDistrs || $moreSourceslists)
		{
			HTML_showTableHeader();

			echo("<tr><td>$I18N_clientsInGroupHaveDifferentDistributionsSourceslist<br><br>");

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
			$distr = $distrs[0];
			$sourceslist = $sourceslists[0];
		};
};





/**
**name GRP_listAllClientsInGroups($groupNames)
**description returns an array with all client names contained in the groups
**parameter groupNames: the names of the groups stored in an array
**/
function GRP_listAllClientsInGroups($groupNames)
{
	CHECK_FW(CC_groupname, $groupNames[0]);
	$gid = GRP_getIdByName($groupNames[0]);

	$gSQL="clientgroups.groupid=$gid";

	for ($i=1; $i < count($groupNames); $i++)
		{
			CHECK_FW(CC_groupname, $groupNames[$i]);
			$gid = GRP_getIdByName($groupNames[$i]);
			$gSQL.=" OR clientgroups.groupid=$gid";
		};

	$sql="SELECT DISTINCT clients.client FROM clients, clientgroups WHERE clients.id=clientgroups.clientid AND ($gSQL) ORDER BY clients.client";

	$res = db_query($sql); //FW ok

	$i=0;

	while ($line = mysql_fetch_row($res))
		{
			$arr[$i]=$line[0];
			$i++;
		};
		
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

	while ($line = mysql_fetch_row($result))
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