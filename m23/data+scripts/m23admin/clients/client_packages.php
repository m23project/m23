<?PHP $client = $_GET['client']; ?>

<span class="title"><?PHP echo("$client : ".$I18N_packages);?></span><br><br>

<?

$clientOptions=CLIENT_getAllOptions($client);

$distr=$clientOptions['distr'];

if (strlen($distr) == 0)
	$distr="debian";

include_once("/m23/inc/distr/$distr/packages.php");

if (strlen($distr)==0)
	$distr="debian";


	if (!(empty($_GET['BUT_search'])))
		{
			$key=$_GET['ED_search'];
			CAPTURE_captureAll(0,"clientpackages: show mozilla",true);
		}
	else
		$key=$_GET['HID_key'];

if (empty($_GET['firstrun']))
	$key="ashdkjhasdfhasdhlahsdfuaerfnavsdfuv5tz";
?>

<span class="title"><?PHP echo($I18N_package_search);?></span><br>
<form method="GET">
<center>
<input type="text" name="ED_search" size=30 maxlength=100>
<input type="submit" name="BUT_search" value="<?php echo($I18N_search)?>"></center>
<BR>

<?PHP
	HTML_setPage('clientpackages');
	$counter=CLIENT_listPackages($client,$key,FALSE);
?>

<input type="hidden" name="firstrun" value="muh">
<input type="hidden" name="HID_key" value="<?PHP echo($key); ?>">
<input type="hidden" name="client" value="<?PHP echo($client); ?>">
<input type="hidden" name="id" value="<?PHP echo($id); ?>">
<input type="hidden" name="CB_count" value="<?PHP echo($counter); ?>">
</form>


<?PHP
 CLIENT_HTMLBackToDetails($client,$id,"clientInformation");
 
 help_showhelp("clients_packages");
?>
