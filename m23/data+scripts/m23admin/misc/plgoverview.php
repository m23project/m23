<span class="title"> <?PHP echo($I18N_plugin_overview);?> </span><br><br>
</H2>


<?PHP
	HTML_showFormHeader("","get");
	HTML_setPage("plgoverview");

	switch ($_GET['action'])
	{
		case delete:
		{
			PLG_delete($_GET['name']);
			break;
		};

		case update:
		{
			PLG_update($_GET['name']);
			HELP_showHelp("plgupdate");
			break;
		};

		default:
		{
			if (isset($_GET['BUT_updateplg']))
				PLG_realUpdate($_GET['pluginName'],$_GET['pluginURL']);
			else
			{
				PLG_showPluginOverview();
				HELP_showHelp("plgoverview");
			};
		}
	}
	HTML_showFormEnd();
?>

