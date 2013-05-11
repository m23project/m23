<span class="title"> <?PHP echo($I18N_add_client_to_group);?></span><br><br>

<?php
	HTML_setPage('clientaddtogroup');
	HTML_showTableHeader(true);
	HTML_showFormHeader();

	$client = (isset($_GET['client']) ? $_GET['client'] : $_POST['client']);
	$id = (isset($_GET['id']) ? $_GET['id'] : $_POST['id']);

	echo ("
		<input type=\"hidden\" name=\"id\" value=\"$id\">
		<input type=\"hidden\" name=\"client\" value=\"$client\">
		");

	GRP_doClientMoreGroups($client,"add");

	HTML_showTableEnd(true);
	HTML_showFormEnd();
?>