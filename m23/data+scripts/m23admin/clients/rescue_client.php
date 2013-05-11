<?
	$client = $_GET['client'];
	$id = $_GET['id'];
	$deactivate = $_GET['deactivate'];
	$sure = $_GET['sure'];

	$data = CLIENT_getParams($client);

	if( $sure == "1" )
	{
		if ($deactivate == "1")
			{
				DHCP_activateBoot($client, false);
				PKG_rmAllSpecialPackagesByName($client,"m23Rescue");
			}
		else
			{
				PKG_addJob($client,"m23Rescue",0,"");
				DHCP_activateBoot($client, true);
				CLIENT_startInstall($client);
				MSG_showInfo($I18N_client_start_rescue);
			};
	};

	if ($deactivate == "1")
	{
		$beforeClientname = $I18N_shouldRescueSystemBeDeactivated1;
		$title = $I18N_deactivateRescueSystem;
		$afterClientname = $I18N_shouldRescueSystemBeDeactivated2;
	}
	else
	{
		$beforeClientname = $I18N_shouldRescueSystemBeStarted1;
		$title = $I18N_startRescueSystem;
		$afterClientname = $I18N_shouldRescueSystemBeStarted2;
	}
?>

<span class="title"><?PHP echo("$data[client] : $title");?></span>

  <br><br>

<table align="center">
 <tr>
  <td align="center">
   <?PHP CLIENT_showGeneralInfo($id); ?>
  </td>
 </tr>
 <tr>
  <td align="center">

<table align="center"><tr><td><div class="subtable_shadow">
<table align="center" class="subtable"><tr><td>

   <?PHP
	echo("$beforeClientname<span class=\"highlight\"> ".$data[client]." </span>$afterClientname");
   ?>
  </td>
 </tr>
 <tr>
  <td align="center">
 </tr>
 <tr>
  <td align="center">
    <a href="?page=rescueclient&id=<?php echo("$id"); ?>&client=<?php echo("$data[client]"); ?>&sure=1&deactivate=<?php echo($deactivate); ?>"><img src="/gfx/button_ok-mini.png"><?PHP echo($I18N_yes);?></a> &nbsp; <a href="?page=clientsoverview"><img src="/gfx/button_cancel-mini.png"><?PHP echo($I18N_no);?><br></a>

</td></tr></table>
</div></td><tr></table>

  </td>
 </tr>

</table>

<?PHP
CLIENT_HTMLBackToDetails($client,$id,"criticalStatus");

help_showhelp("rescue_client"); ?>
