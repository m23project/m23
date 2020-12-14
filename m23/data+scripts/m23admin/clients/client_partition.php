<?php
	HTML_showTitle($I18N_clientPartitioningAndFormating);
	
	HTML_showFormHeader();
	HTML_showTableHeader(true, 'subtable', 'width="100%" cellspacing=10');

	// Get clear session status and client's name
	$clearSession = isset($_GET['clearSession']) && ($_GET['clearSession'] == 1);
	$clearSessionOK = isset($_GET['clearSessionOK']) && ($_GET['clearSessionOK'] == 1);
	$clientName = isset($_GET['client']) ? $_GET['client'] : $_POST['client'];

	// Detect, if there are partition and format information present
	$params = CLIENT_getParams($clientName);
	$partInformationPresent = isset($params['CFDiskTemp']) && (count(unserialize($params['CFDiskTemp'])['partitionSteps']) > 0);

	if ($partInformationPresent && $clearSession && !$clearSessionOK)
	{
		HTML_urlButton('BUT_clearSessionOK', $I18N_next, "$_SERVER[REQUEST_URI]&clearSessionOK=1");
	
		MSG_showWarning("
		$I18N_partInformationArePresentWarning</br>
		".H_JSBACKBUTTON." &nbsp; ".BUT_clearSessionOK."
		");
		HTML_setPage('fdisk');
	}
	else
	{
		$CFDiskGUIO = new CFDiskGUI($clientName);
		$CFDiskGUIO->fdiskSessionReset($clearSession);
		$CFDiskGUIO->showCombinedFdiskGUIDialog();
	}


	HTML_showTableEnd(true);
	HTML_showFormEnd();

	help_showhelp('clientPartitionFormat');
?>