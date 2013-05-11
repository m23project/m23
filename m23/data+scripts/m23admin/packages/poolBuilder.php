<?php
	HTML_showFormHeader();
	HTML_setPage('poolBuilder');

	if (!isset($_SESSION['poolOGUI']))
		$_SESSION['poolOGUI'] = new CPoolGUI();

	HTML_showTitle($I18N_poolBuilder.' ('.$_SESSION['poolOGUI']->getHeading().')');

	$_SESSION['poolOGUI']->show();
	
	HTML_showFormEnd();
	help_showhelp($_SESSION['poolOGUI']->getHelpPage());
?>
