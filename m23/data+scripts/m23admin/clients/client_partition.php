<?php
	HTML_showTitle($I18N_clientPartitioningAndFormating);
	
	HTML_showFormHeader();
	HTML_showTableHeader(true, 'subtable', 'width="100%" cellspacing=10');

	$CFDiskGUIO = new CFDiskGUI(isset($_GET['client']) ? $_GET['client'] : $_POST['client']);
	$CFDiskGUIO->fdiskSessionReset($_GET['clearSession'] == 1);
	$CFDiskGUIO->showCombinedFdiskGUIDialog();
	HTML_showTableEnd(true);
	HTML_showFormEnd();

	help_showhelp('clientPartitionFormat');
?>