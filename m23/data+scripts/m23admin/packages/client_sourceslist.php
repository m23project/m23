<?php

	echo('<span class="title">'. (!isset($_POST['BUT_delete']) ? $I18N_edit_package_sources : $I18N_deletion_of_a_packageSource).'</span><br><br>');

	HTML_showFormHeader();
	HTML_setPage("clientsourceslist");

	SRCLST_showEditor();
	HTML_showFormEnd();

	help_showhelp("client_sourceslist");
?>
