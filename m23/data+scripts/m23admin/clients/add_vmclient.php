<?php
	echo("<span class=\"title\">$I18N_createVM</span><br><br>");

	if ($_GET['clearSession'] == 1)
	{
		$_SESSION = array();
	}

	HTML_showFormHeader();

	HTML_showTableHeader(true);
	VM_GUIstepSelectHost(VM_SW_VBOX);
	HTML_showTableEnd(true);

	HTML_showTableHeader(true);
	VM_GUIstepSelectHost(VM_SW_CLOUDSTACK);
	HTML_showTableEnd(true);

	HTML_showTableHeader(true);
	VM_GUIstepCheckHost();
	VM_GUIstepCreateGuest();
	VM_GUIstepCreateCloudStackVM();
	HTML_showTableEnd(true);

	HTML_setPage("addvmclient");
	HTML_showFormEnd();

	help_showhelp('createVM');
?>