<?
HTML_showFormHeader();
if (isset($_GET['clearSession']) && ($_GET['clearSession'] == 1))
{
	$_SESSION = array();
	$_SESSION['clientName'] = $_GET['client'];
	$_SESSION['clientID'] = $_GET['id'];
	
	if (function_exists('m23SHARED_init'))
		dbConnect();
}


echo ("<span class=\"title\">$I18N_edit_client: ".$_SESSION['clientName']."</span><br><br>");

CLIENT_showAddDialog(ADDDIALOG_changeClient);

CLIENT_HTMLBackToDetails($_SESSION['clientName'],$_SESSION['clientID'],"clientAdmin");

help_showhelp("edit_client");

HTML_showFormEnd();
?>