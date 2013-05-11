<?php
	echo("<span class=\"title\">$I18N_createVM (VirtualBox OSE)</span><br><br>");

	if ($_GET['clearSession'] == 1)
	{
		$_SESSION = array();
	}

	HTML_showFormHeader();
	HTML_showTableHeader(true);

	//Hard code to VirtualBox at the beginning ;-)
	VM_GUIstepSelectHost(VM_SW_VBOX);
	VM_GUIstepCheckHost();
	VM_GUIstepCreateGuest();

	HTML_showTableEnd(true);
	HTML_setPage("addvmclient");
	HTML_showFormEnd();

	help_showhelp("createVM");
?>