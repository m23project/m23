<?PHP
 echo("
  <span class=\"title\">$I18N_update_server_software</span><br><br>
 ");

 include("/m23/inc/version.php");

//get new version
if (!empty($_POST['newVersion']))
	$newVersion=$_POST['newVersion'];
	else
	$newVersion="???";

	HTML_showFormHeader();
	HTML_setPage('update');


 //get update URL
if (!empty($_POST['ED_updateURL']))
	 $updateURL=$_POST['ED_updateURL'];
	 else
	 $updateURL=RMV_get4IP("m23ServerSoftwareUpdateURL","serverUpdate");

if (empty($updateURL))
	$updateURL="http://m23.sf.net/m23patch/m23patch.php";


	if (UPDATE_running() || !empty($_POST['BUT_update']))
	{
		HTML_liveLogArea('LLA_serverLiveLog',80,25,'serverLiveLog.php?screen=m23serverupdate');

		HTML_submit('BUT_refresh',$I18N_refresh);
		HTML_showTableHeader(true);

		echo('<tr><td>');
		MSG_showInfo($I18N_updateInProgress);
		echo('</td></tr>
		<tr><td>'.LLA_serverLiveLog.'</td></tr>
		<tr><td>'.BUT_refresh.'</td></tr>');

		HTML_showTableEnd(true);
	}

	if (!UPDATE_running())
	{

		//get the update information text
		$m23updateInfoText=urldecode($_POST['m23updateInfoText']);

		if (empty($m23updateInfoText))
			$m23updateInfoText=UPDATE_getInfo(UPDATE_getUrl($updateURL,"info",$m23_version, $m23_patchLevel));

		if (!empty($_POST['BUT_getUpdateInfo']))
		{
			RMV_set4IP("m23ServerSoftwareUpdateURL",$updateURL,"serverUpdate");
			$m23updateInfoText=UPDATE_getInfo(UPDATE_getUrl($updateURL,"info",$m23_version,$m23_patchLevel));
		};


		if (!empty($_POST['BUT_update']))
		{
			UPDATE_doUpdate();
		}
		else
		{
			if (HELPER_isExecutedOnUCS())
				MSG_showWarning($I18N_UCSUpdateWarning);

			HTML_showTableHeader(true);
			echo("
					<tr>
						<td>$I18N_current_version:</td>
						<td>$m23_codename $m23_version ($m23_patchLevel)</td>
					</tr>
					<tr>
						<td colspan=\"2\"><br>
						$I18N_update_information_url
						</td>
					</tr>
					<tr>
						<td  colspan=\"2\">
						<center>
						<input type=\"text\" name=\"ED_updateURL\" size=\"70\" maxlength=\"500\" value=\"$updateURL\"><br><br>
						<input type=\"submit\" name=\"BUT_getUpdateInfo\" value=\"$I18N_fetch_update_information\"></center>
						</td>
					</tr>
				");
			HTML_showTableEnd(true);

			echo('<br>');

			HTML_showTableHeader(true);
			echo("
					<tr>
						<td>
							<span class=\"title\">$I18N_update_information</span><br><br>
							$m23updateInfoText
							<!--m23customPatchBegin type=del id=BUT_update-->
							<center><input type=\"submit\" name=\"BUT_update\" value=\"$I18N_update_server\"></center>
							<!--m23customPatchEnd id=BUT_update-->
						</td>
					</tr>
				");
			HTML_showTableEnd(true);

			echo("
				<input type=\"hidden\" name=\"newVersion\" value=\"$newVersion\">
				<input type=\"hidden\" name=\"m23updateInfoText\" value=\"".urlencode($m23updateInfoText)."\">
			");
		}

	};

	help_showhelp("serverupdate");
	HTML_showFormEnd();
?>