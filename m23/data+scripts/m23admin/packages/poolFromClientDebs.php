<?
	//Get the client's ID
	if (isset($_GET['id']))
		$id = $_GET['id'];
	else
		$id = $_POST['id'];
	CHECK_FW(CC_id, $id);

	//Get information by ID
	$clientO = new CClient($id);

	HTML_showTitle($I18N_poolFromClientDebs.': '.$clientO->getClientName());

	HTML_showFormHeader();
	HTML_setPage('poolFromClientDebs');


	//Check, if the create button was clicked
	if (HTML_submit('BUT_create', $I18N_create))
	{
		CPoolFromClientDebsGUI::addm23BuildPoolFromClientDebsJobAndStart($clientO->getClientName());
	}
	else
	{
		//Only create a table, when the button is shown, but not clicked
		HTML_showTableHeader();
		echo('
		<tr>
			<td>'.$I18N_DoYouWantToCreatePoolAndPackageSelectionFromThisClient.'</td>
		</tr>
		<tr><td></td></tr>
		<tr align="center">
			<td>'.BUT_create.'</td>
		</tr>
		');
		HTML_showTableEnd();
	}

	//Save the ID of the client
	echo(HTML_hiddenVar('id', $id));

	HTML_showFormEnd();

	echo($clientO->getBackToDetailsLink('clientAdmin'));
	help_showhelp('poolFromClientDebs');
?>