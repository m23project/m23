
<span class="title"><?PHP echo($I18N_manage_admins);?></span>

<br><br>

<?php
$action = (empty($_GET['action']) ? $_POST['action'] : $_GET['action']);
$name = $_GET['name'];
$sure = $_GET['sure'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$newadmin = $_POST['newadmin'];




$m23adminHtpasswd = "/m23/etc/.htpasswd";
$m23phpMyLDAPAdminHtpasswd = "/m23/etc/.phpMyLDAPAdminHtpasswd";

	if( $action == "del" && $sure != "1" )
	{
		/*Sicherheitsabfrage für löschen Dialog */
		echo("
		<table align=\"center\">
		<tr>
			<td><div class=\"subtable_shadow\">
			<table class=\"subtable\" align=\"center\"><tr><td>$I18N_should_admin<span class=\"highlight\"> $name </span>$I18N_get_deleted</td></tr>
			<tr><td align=\"center\"><a href=\"index.php?page=htaccess&action=del&name=$name&sure=1\">$I18N_yes</a>
					<a href=\"index.php?page=htaccess\">$I18N_no</a></td></tr></table></div></td><tr></table>");
	}
	elseif( $action == "del" && $sure == "1" )
	{
		$m23AdminO = new Cm23Admin($name);
		$m23AdminO->delete();

		$m23AdminO->showMessages();
		echo("<center><a href=\"index.php?page=htaccess\">$I18N_back</a></center>");
	}
	else
	{
		if( $action == "add" )
		{
			if( $password1 == $password2 && !empty($password1) )
			{
				$m23AdminO = new Cm23Admin($newadmin,$password1);
				$m23AdminO->showMessages();
			}
			else
			{
				MSG_showError("<span class=\"inputerror\">$I18N_passwords_dont_match.</span><br><br>");
				echo("<center><a href=\"index.php?page=htaccess\">$I18N_back</a></center>");
			}
		
		}
?>

<!-- LAYOUT TABLE -->
<table align="center" cellspacing="10" valign="top">
 <tr>
  <td align="center" valign="top">


<!-- LISTE DER ADMINISTRATOREN -->
<table align="center"><tr><td><div class="subtable_shadow">
<table class="subtable">
 <tr>
  <td class="subhighlight" colspan="3"><?PHP echo($I18N_admins);?></td>
 <tr>

<?php

	$adminleft = Cm23AdminLister::CountAdmins(); /* Nicht den letzten Admin löschen ;) */
	$admins = Cm23AdminLister::ListAdmins();
	$counter = 0;

	foreach ($admins as $admin)
	{
		$counter++;
		/* Ausgabe der Benutzer mit Nummerierung */
		echo("<tr><td> $counter. </td><td> $admin </td>");
		if ( $adminleft > 1 )
			echo("<td> <a href=\"index.php?page=htaccess&action=del&name=$admin\">$I18N_delete</a> </td></tr>");
		else
			echo("<td> </td></tr>");
	}
?>
</table>
</div></td><tr></table>

<!-- LAYOUT TABLE -->
</td><td align="center" valign="top">



<!-- FORMULAR FÜR NEUE ADMINISTRATOREN -->
<form method="post">
 <input type="hidden" name="action" value="add">
  <table align="center"><tr><td><div class="subtable_shadow">
  <table class="subtable">
	<tr><td class="subhighlight" colspan="2"><?PHP echo($I18N_add_new_admin);?>:</td></tr>
	<tr><td><?PHP echo($I18N_login_name);?>:</td><td><input type="text" length="25" maxlength="25" name="newadmin"></td></tr>
	<tr><td><?PHP echo($I18N_password);?>:</td><td><input type="password" lenght="25" maxlength="25" name="password1"></td></tr>
	<tr><td><?PHP echo($I18N_repeated_password);?>:</td><td><input type="password" lenght="25" maxlength="25" name="password2"></td></tr>
	<tr><td colspan="2" align="center">
	<input type="submit" value="<?PHP echo($I18N_add);?>"></td></tr>
  </table>
  </div></td><tr></table>
</form>

<!-- LAYOUT TABLE -->
</td></tr></table>


<?php

}
HELP_showHelp("htaccess");
?>

