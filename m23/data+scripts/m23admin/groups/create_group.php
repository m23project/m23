
<span class="title"><?PHP echo($I18N_create_group);?></span><br><br>

<?php
	$newgroup = HTML_input('ED_groupName');
	$newgroupDescription = HTML_textArea('TA_groupDescription', 40, 5);

	if (HTML_submit('BUT_createGroup', $I18N_add))
	{
		GRP_add($newgroup, $newgroupDescription);
		echo("<br>");
	}

	HTML_showFormHeader();
	HTML_setPage("creategroup");
	HTML_showTableHeader(true);

	echo('
	<tr>
		<td align="center">
			<span class="subhighlight">'.$I18N_please_enter_group_name.':</span>
		</td>
	</tr>
	<tr><td align="center">'.ED_groupName.'</td></tr>
	<tr>
		<td align="center">
			<span class="subhighlight">'.$I18N_please_enter_group_description.':</span>
		</td>
	</tr>
	<tr><td align="center">'.TA_groupDescription.'</td></tr>
	<tr><td align="center">'.BUT_createGroup.'</td></tr>
	');

	HTML_showTableEnd(true);
	HTML_showFormEnd();
	help_showhelp("create_group");
?>