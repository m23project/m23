<?
//Bei "Suchen" kann Suchbegriff auch eine Gruppe sein

	HTML_showTitle($I18N_ipManagement);
	HTML_showFormHeader();
	MSG_showMessageBoxPlaceholder();
	HTML_setPage('ipManagement');

	$CIPManagementO = new CIPManagement;
	$CIPManagementO->showDialog();

	HTML_showFormEnd();

	help_showhelp('ipManagement');
?>