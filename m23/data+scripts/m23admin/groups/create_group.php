
<span class="title"><?PHP echo($I18N_create_group);?></span><br><br>

<?php
	if (isset($_POST['BUT_submit']))
		{
			GRP_add($_POST['newgroup']);
			echo("<br>");
		};

	HTML_showFormHeader();
	HTML_setPage("creategroup");
	HTML_showTableHeader(true);
?>

	<tr>
		<td align="center">
			<span class="subhighlight">
				<?PHP echo($I18N_please_enter_group_name);?>:
			</span>
		</td>
	</tr>
	<tr>
		<td align="center">
			<input type="text" name="newgroup" size=40 value="<?php echo $newgroup; ?>">	
		</td>
	</tr>
	<tr>
		<td align="center">
			<input name="BUT_submit" type="submit" value="<?PHP echo($I18N_add);?>">
		</td>
	</tr>
 
<?php
	HTML_showTableEnd(true);
	HTML_showFormEnd();
	help_showhelp("create_group");
?>