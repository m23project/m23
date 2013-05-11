<?
HTML_showFormHeader();

echo ("<span class=\"title\">$I18N_edit_client: ".$_SESSION['clientName']."</span><br><br>");

CLIENT_showAddDialog(ADDDIALOG_changeClient);

CLIENT_HTMLBackToDetails($_SESSION['clientName'],$_SESSION['clientID'],"clientAdmin");

help_showhelp("edit_client");

HTML_showFormEnd();
?>