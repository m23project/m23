
<span class="title"> <?PHP echo($I18N_install_plugin);?> </span><br><br>
<?php
	HTML_showFormHeader("","get");
	HTML_setPage("plginstall");
?>
<input type="text" size=40 maxlength=200 name="ed_plgname" <?PHP echo("value=\"".$_GET['ed_plgname']."\"");?>>

<input type="submit" name="BUT_installplg" value="<?PHP echo($I18N_install);?>"><br><br>

<?PHP
	if (isset($_GET['BUT_installplg']))
		PLG_install($_GET['ed_plgname']);
	
	if (isset($_GET['BUT_forceinstallplg']))
		PLG_realInstall(PLG_getTempDir($_GET['ed_plgname']));
	
		HELP_showHelp("plginstall");
	HTML_showFormEnd();
?>