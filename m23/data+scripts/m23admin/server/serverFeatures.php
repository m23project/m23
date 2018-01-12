<span class="title"><?PHP echo ($I18N_serverFeatures.'</span><br><br>');


	HTML_showFormHeader();
 	HTML_setPage("serverFeatures");

	echo(H_MESSAGEBOXPLACEHOLDER);

	HTML_showTableHeader();


	SERVER_setClientOnlineStatusEnabled(HTML_checkBox('CB_clientOnlineStatusEnabled', '', SERVER_isClientOnlineStatusEnabled()));
	SERVER_setUpdatePackageInfosDisabled(HTML_checkBox('CB_updatePackageInfosDisabled', '', SERVER_isUpdatePackageInfosDisabled()));
	SERVER_setLiveLogDisabled(HTML_checkBox('CB_liveLogDisabled', '', SERVER_isLiveLogDisabled()));
	HTML_submit('BUT_save', $I18N_save);

	HTML_showTableHeading('', $I18N_serverFeature);
	HTML_showTableRow(CB_clientOnlineStatusEnabled, $I18N_clientOnlineStatusEnabled);
	HTML_showTableRow(CB_updatePackageInfosDisabled, $I18N_updatePackageInfosDisabled);
	HTML_showTableRow(CB_liveLogDisabled, $I18N_liveLogDisabled);
	echo('<tr><td colspan="2">'.BUT_save.'</td></tr>');

	HTML_showTableEnd();
	HTML_showFormEnd();
	HELP_showHelp("serverFeatures");
?>