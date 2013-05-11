<?php
	$groupname = $_GET['groupname'];

	echo("<span class=\"title\">$I18N_group_details $groupname</span><br><br>");

	GRP_showGeneralInfo($groupname);
?>
<br><br>


<a name="groupInformation">
<span class="title"><?PHP echo($I18N_group_information);?><br><br></span>
<table align="center">
<td>
	<div class="subtable_shadow">
	<table align="center" class="subtable" cellspacing="10">
		<tr>
		
			<td align="center">
<a href="index.php?page=clientsoverview&groupname=<?PHP echo($groupname);?>">
<img src="../gfx/listClients.png" border=0><br>
<?PHP echo($I18N_list_clients);?>
</a>
			</td>
		</tr>
	</table>
	</div>
</td>
</table>
<br><br>


<a name="groupAdministration">
<span class="title"><?PHP echo($I18N_groupAdministration);?><br><br></span>
<table align="center">
<td>
	<div class="subtable_shadow">
	<table align="center" class="subtable" cellspacing="10">
		<tr>
		
			<td align="center">
<a href="index.php?page=groupactions&groupname=<?PHP echo($groupname);?>&action=renameGroup">
<img src="/gfx/groupRename.png" border=0><br>
<?PHP echo($I18N_group_rename);?>
</a>
			</td>




			<td align="center">
<a href="index.php?page=groupactions&groupname=<?PHP echo($groupname);?>&action=deleteGroup">
<img src="/gfx/groupDelete.png" border=0><br>
<?PHP echo($I18N_group_delete);?>
</a>
			</td>
			
			
			
		</tr>
	</table>
	</div>
</td>
</table>
<br><br>