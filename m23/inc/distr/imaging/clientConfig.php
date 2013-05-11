<?PHP

include_once("clientConfigCommon.php");


/**
**name CLCFG_addDistributionSpecificOptions( $options)
**description adds distribution specific settings to an option array and returns the new array
**parameter $options: the options array with some values
**/
function CLCFG_addDistributionSpecificOptions($options)
{
	$options['kernel']=$_POST['SEL_kernel'];
	$options['IMGPartitionAmount']=$_POST['IMGPartitionAmount'];

	for ($i=0; $i < $options['IMGPartitionAmount']; $i++)
	if ($_POST["SEL_img$i"] != "-")
	{
		$options["IMGdrv$i"]=$_POST["HID_drive$i"];
		$options["IMGname$i"]=$_POST["SEL_img$i"];
	};

	$options[configLikeDistr]=$_POST['SEL_configLikeDistr'];
	$options[IMGMBRfile]=$_POST['SEL_MBR'];

	return($options);
};





/**
**name CLCFG_showDistributionSpecificOptions($options)
**description shows distribution specific options and returns false, if there was an error
**parameter options: options array
**/
function CLCFG_showDistributionSpecificOptions($options)
{
	include_once("/m23/inc/distr/debian/packages.php");
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//list all drives and partitions
	$driveParams=FDISK_fdiskSessionParam();
	$driveList=FDISK_getDrivesAndPartitions($driveParams);

	$nr=0;
	
	echo("<tr>
	<td><span class=\"subhighlight\">$I18N_select_installation_partitions</span></td>
	<td><span class=\"subhighlight\">$I18N_imageName</span></td>
	");

	foreach ($driveList as $drive)
	{
		$sel = IMG_getAllImagesSel("SEL_img$nr",(empty($_POST["SEL_img$nr"]) ? "-" : $_POST["SEL_img$nr"]));
		$temp = explode(" ",$drive);
		$dev = $temp[0];

		//add a selection for the image files to each of the drives and partitions
		echo("
		<tr>
			<td>$drive</td>
			<td colspan=\"2\">$sel</td>
		</tr>
		<input type=\"hidden\" name=\"HID_drive$nr\" value=\"$dev\">
		");

		//
		if ($_POST["SEL_img$nr"] != "-")
		{
			$options=CLIENT_getSetOption($_POST["HID_drive$nr"],"IMGdrv$nr",$options);
			$options=CLIENT_getSetOption($_POST["SEL_img$nr"],"IMGname$nr",$options);
		}
		$nr++;
	};

	$mbrFile = HTML_selection("SEL_MBR",IMG_getAllMBRs(),SELTYPE_selection);

	echo("
		<tr>
			<td>$I18N_chooseMBRtoInstall</td>
			<td>".SEL_MBR."</td>
		</tr>

		<tr>
			<td>$I18N_configureImageLike</td>
			<td colspan=\"2\">".DISTR_DistributionsSelections("SEL_configLikeDistr",$_POST[SEL_configLikeDistr],true)."</td>
		</tr>
		");

	$options=CLIENT_getSetOption($_POST['SEL_configLikeDistr'],"configLikeDistr",$options);
	
	echo("<input type=\"hidden\" name=\"IMGPartitionAmount\" value=\"$nr\">");
	$options = CLIENT_getSetOption($_POST['IMGPartitionAmount'],"IMGPartitionAmount",$options);

	return($options);
};
?>