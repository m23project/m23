<?php

switch ($_GET['action'])
	{
		case "renameGroup" :
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
						};
				}
				$title=$I18N_group_rename;
				break;
			};
			
		case "deleteGroup" :
			{
				$title = $I18N_group_delete;
				break;
			};
		default: $title="unknown action: ".$_GET['action'];
	}
?>

<span class="title"><?PHP echo("$title : $groupname");?></span>


<br><br>




<?php
	HTML_showFormHeader();

	switch ($_GET['action'])
		{
		case "renameGroup" :
			{
				GRP_showRenDialog();
				$section="groupAdministration";
				break;
			};

		case "deleteGroup":
			{
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
					};
				break;
			};
		};

		if (!empty($section))
			GRP_HTMLBackToDetails($groupname,$section);
		else
			echo("<a href=\"index.php?page=groupsoverview\">$I18N_back</a>");

		HTML_setPage("groupactions");
		HTML_showFormEnd();
?>

<input type="hidden" name="action" value="<?php echo($action);?>">

