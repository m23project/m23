<span class="title"><?PHP echo ($I18N_settings.'</span><br><br>');


	HTML_showFormHeader();
 	HTML_setPage("serverFeatures");

	echo(H_MESSAGEBOXPLACEHOLDER);
	
	echo("
	<script type='text/javascript'>

	// Disabling the ping test will disable the advanced SSH/HTTPs tests
	function checkClientOnlineStatus()
	{
		var CB_clientOnlineStatusEnabled = document.getElementById('CB_clientOnlineStatusEnabled');
		var CB_clientSshHttpsStatusEnabled = document.getElementById('CB_clientSshHttpsStatusEnabled');

		if (!CB_clientOnlineStatusEnabled.checked) CB_clientSshHttpsStatusEnabled.checked=false;
	}

	// Enabling the advanced SSH/HTTPs tests will enable the ping test
	function checkClientSshHttpsStatus()
	{
		var CB_clientOnlineStatusEnabled = document.getElementById('CB_clientOnlineStatusEnabled');
		var CB_clientSshHttpsStatusEnabled = document.getElementById('CB_clientSshHttpsStatusEnabled');

		if (CB_clientSshHttpsStatusEnabled.checked) CB_clientOnlineStatusEnabled.checked=true;
	}
	</script>
	");


	SERVER_setClientOnlineStatusEnabled(HTML_checkBox('CB_clientOnlineStatusEnabled', '', SERVER_isClientOnlineStatusEnabled(), "", 1, false, 'onclick="checkClientOnlineStatus()"'));
	SERVER_setClientSshHttpsStatusEnabled(HTML_checkBox('CB_clientSshHttpsStatusEnabled', '', SERVER_isClientSshHttpsStatusEnabled(), "", 1, false, 'onclick="checkClientSshHttpsStatus()"'));
	SERVER_setWarnWhenUpdateJobsAreDelayed(HTML_input('ED_warnWhenUpdateJobsAreDelayed', SERVER_getWarnWhenUpdateJobsAreDelayed(),2,5));
	SERVER_setWarnWhenClientRebootsRequestedByPackagesAreDelayed(HTML_input('ED_warnWhenClientRebootsRequestedByPackagesAreDelayed', SERVER_getWarnWhenClientRebootsRequestedByPackagesAreDelayed(),2,5));
	SERVER_setShowClientLastUpgradeColumn(HTML_checkBox('CB_showClientLastUpgradeColumn', '', SERVER_getShowClientLastUpgradeColumn()));
	SERVER_setExportIntoClientreporting(HTML_checkBox('CB_exportIntoClientreporting', '', SERVER_getExportIntoClientreporting()));
	
	
	
	
	SERVER_setUpdatePackageInfosDisabled(HTML_checkBox('CB_updatePackageInfosDisabled', '', SERVER_isUpdatePackageInfosDisabled()));
	SERVER_setLiveLogDisabled(HTML_checkBox('CB_liveLogDisabled', '', SERVER_isLiveLogDisabled()));
	SERVER_setInstallReasonEnabled(HTML_checkBox('CB_installReasonEnabled', '', SERVER_isInstallReasonEnabled()));
	SERVER_setm23ServerIncudedInSourcesListDisabled(HTML_checkBox('CB_m23ServerIncudedInSourcesListDisabled', '', SERVER_ism23ServerIncudedInSourcesListDisabled()));

	SERVER_setShowTimeInformationOnJobs(HTML_checkBox('CB_showTimeInformationOnJobs', '', SERVER_getShowTimeInformationOnJobs()));






// 	SERVER_setRebootClientAfterJobsIfNecessary(HTML_checkBox('CB_m23ServerRebootClientAfterJobsIfNecessary', '', SERVER_isRebootClientAfterJobsIfNecessary()));




	
	
	
	
	
	
	HTML_submit('BUT_save', $I18N_save);

	HTML_showSmallTitle($I18N_statusInformation);
	HTML_showTableHeader();
	HTML_showTableRow(CB_clientOnlineStatusEnabled, $I18N_clientOnlineStatusEnabled);
	HTML_showTableRow(CB_clientSshHttpsStatusEnabled, $I18N_clientSshHttpsStatusEnabled);
	HTML_showTableRow(CB_showClientLastUpgradeColumn, $I18N_showClientLastUpgradeColumn);
	HTML_showTableRow(ED_warnWhenUpdateJobsAreDelayed, $I18N_warnWhenUpdateJobsAreDelayed);
	HTML_showTableRow(ED_warnWhenClientRebootsRequestedByPackagesAreDelayed, $I18N_warnWhenClientRebootsRequestedByPackagesAreDelayed);
	HTML_showTableRow(CB_exportIntoClientreporting, $I18N_exportIntoClientreporting);
	
	HTML_showTableRow(CB_liveLogDisabled, $I18N_liveLogDisabled);
	HTML_showTableRow(CB_showTimeInformationOnJobs, $I18N_showTimeInformationOnJobs);
	HTML_showTableRow(CB_updatePackageInfosDisabled, $I18N_updatePackageInfosDisabled);
	HTML_showTableRow(CB_installReasonEnabled, $I18N_installReasonEnabled);
	echo('<tr><td colspan="2">'.BUT_save.'</td></tr>');
	HTML_showTableEnd();



	HTML_showSmallTitle($I18N_serverFeature);
	HTML_showTableHeader();
	HTML_showTableRow(CB_m23ServerIncudedInSourcesListDisabled, $I18N_m23ServerIncudedInSourcesListDisabled);
// 	HTML_showTableRow(CB_m23ServerRebootClientAfterJobsIfNecessary, $I18N_rebootClientAfterJobsIfNecessary);
	echo('<tr><td colspan="2">'.BUT_save.'</td></tr>');
	HTML_showTableEnd();





	HTML_showSmallTitle($I18N_serverSettings);
	HTML_showTableHeader();
	HTML_showTableRow($I18N_serverip_override, SERVER_Dialog_overrideServerIP());
	
	HTML_showTableEnd();

	HTML_showFormEnd();
	HELP_showHelp("serverFeatures");
?>