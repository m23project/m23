<?php

$groupname = isset($_GET['groupname']) ? urldecode($_GET['groupname']) : urldecode($_POST['groupname']);

$action = isset($_GET['action']) ? $_GET['action'] : $_POST['action'];

switch ($action)
	{
		case 'renameGroup' :
		{
			if (isset($_POST['BUT_ren']))
			{
				
				if (GRP_exists($_POST['ED_newgroupname']))
					MSG_showError($I18N_group_exists);
				else
				{
					GRP_ren($groupname,$_POST['ED_newgroupname']);
					MSG_showInfo($I18N_group_renamed);
					$groupname = $_POST['ED_newgroupname'];
				}
			}
			$title=$I18N_group_rename;
			break;
		}

		case 'changeGroupDescription':
		{
			if (isset($_POST['BUT_change']))
			{
				GRP_setDescrGroup($groupname, $_POST['TA_newGroupDescription']);
				MSG_showInfo($I18N_group_description_changed);
			}
			$title = $I18N_group_change_description;
			break;
		}

		case 'deleteGroup' :
		{
			$title = $I18N_group_delete;
			break;
		}
		default: $title="unknown action: ".$_GET['action'];
	}
?>

<span class="title"><?PHP echo("$title : $groupname");?></span>


<br><br>




<?php
	HTML_showFormHeader();

	switch ($action)
	{
		case 'renameGroup' :
			GRP_showRenDialog($groupname);
			$section="groupAdministration";
			break;

		case 'changeGroupDescription':
			GRP_showChangeDescriptionDialog($groupname);
			$section="groupAdministration";
			break;


		case 'deleteGroup':
			if ($_GET['sure']==1)
			{
				GRP_del($groupname);
				MSG_showInfo($I18N_group_deleted);
				$section="";
			}
			else
			{
				GRP_showDelDialog($groupname);
				$section="groupAdministration";
			}
			break;
	}

		if (!empty($section))
			GRP_HTMLBackToDetails($groupname,$section);
		else
			echo("<a href=\"index.php?page=groupsoverview\">$I18N_back</a>");
			
		echo(HTML_hiddenVar('action', $action).HTML_hiddenVar('groupname', urlencode($groupname)));

		HTML_setPage("groupactions");
		HTML_showFormEnd();
?>

<input type="hidden" name="action" value="<?php echo($action);?>">