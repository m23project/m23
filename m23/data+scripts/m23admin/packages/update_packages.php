<?php
	$client = $_GET['client'];
	$id = $_GET['id'];
?>
<span class="title"><?PHP echo("$client : ".$I18N_update); ?></span>

<br><br><BR>

<?php
	HTML_showFormHeader("","get");
	HTML_setPage('updatepackages');
?>

<table  class="subtable" align="center" border=0 cellspacing=5>

<?PHP
	$clientOptions = CLIENT_getAllOptions($client);

	$distr = $clientOptions['distr'];

	if (strlen($distr)==0)
		$distr="debian";

	//include the distribution specific functions
	include_once("/m23/inc/distr/$distr/packages.php");
?>

<BR>
<center>
<?PHP
	if (!empty($_GET['BUT_startUpdate']))
		{
			$arr['type']=$_GET['RB_updateType'];
			
			$pkgparams=implodeAssoc("?#?",$arr);
			
			PKG_addJob($client,"m23update",PKG_getSpecialPackagePriority("m23update",$distr),$pkgparams);
			
			MSG_showInfo($I18N_updateJobHasBeenStored);
		};

?>

<input type="radio" name="RB_updateType" value="complete" <?PHP if($_GET['RB_updateType']=='complete') echo("checked");?>><?PHP echo($I18N_fullUpdate);?>&nbsp;
<input type="radio" name="RB_updateType" value="normal" <?PHP if($_GET['RB_updateType']=='normal') echo("checked");?>>
<?PHP echo($I18N_normalUpdate);?>


<?PHP
	if ($_GET['RB_updateType']=="complete")
		$completeUpdate=true;
	else
		$completeUpdate=false;
		
	if (!empty($_GET['BUT_previewUpdate']))
		PKG_showPreviewUpdateSystem($client,$completeUpdate);
	else
		echo("<br>");
?>


<input type="hidden" name="client" value="<?PHP echo($client);?>">
<input type="submit" name="BUT_previewUpdate" value="<?PHP echo($I18N_updatePreview);?>">&nbsp;
<input type="submit" name="BUT_startUpdate" value="<?PHP echo($I18N_startUpdate);?>">

<br><br>
</center>

<?PHP
HTML_showFormEnd();
CLIENT_HTMLBackToDetails($client,$id,"clientAdmin");

HELP_showHelp("update_packages");
?>
