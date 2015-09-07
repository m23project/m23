<?
	//Get the client's ID
	if (isset($_GET['id']))
		$id = $_GET['id'];
	else
		$id = $_POST['id'];
	CHECK_FW(CC_id, $id);

	//Get information by ID
	$clientO = new CClient($id);

	HTML_showTitle($I18N_poolFromClient.': '.$clientO->getClientName());

	HTML_showFormHeader();
	HTML_setPage('poolFromClient');


	//Check, if the create button was clicked
	if (HTML_submit('BUT_create', $I18N_create))
	{
		//Build a new CPoolFromClientGUI for the client and start the creation of the pool/package selection
		$poolFromClientGUIO = new CPoolFromClientGUI($clientO->getClientName());

		//Add it to the object storage manager
		$poolFromClientGUIO->saveInObjectStorage();

		//Show the messages (hopefully only the success message ;-))
		$poolFromClientGUIO->showMessages();
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
	help_showhelp('poolFromClient');
?>