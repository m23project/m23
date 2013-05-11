<?PHP

include_once("/m23/data+scripts/packages/m23CommonInstallRoutines.php");
$CLCFG_listReleases=CLCFG_listHSReleases;





/**
**name CLCFG_copyClientPackageStatus()
**description Not used, but needs to be defined here.
**/
// function CLCFG_copyClientPackageStatus()
// {
// 	return(true);
// }





/**
**name CLCFG_listHSReleasesGeneric($distr)
**description Generates an array of the different releases (e.g. sarge, sid, woody, potato) of a distribution.
**parameter selName: the name of the selection
**parameter first: the release to show first
**parameter distr: distribution directory
**returns: Array with release names.
**/
function CLCFG_getHSReleasesGeneric($distr)
{
	$nr = 0;
	$DIR = opendir (HSIMGSTOREDIR);

	while (false !== ($file = readdir ($DIR)))
	{
		if ((strpos($file,"m23HSAdmin-") !== false) && (strpos($file,"~") === false))
		{
			$file = str_replace("m23HSAdmin-","",$file);
			$out[$nr++] = $file;
		}
	}

	closedir($DIR);
	return($out);
};





/**
**name CLCFG_listHSReleasesGeneric($selName,$first,$distr)
**description generates a selection of the different releases (e.g. sarge, sid, woody, potato) of a distribution.
**parameter selName: the name of the selection
**parameter first: the release to show first
**parameter distr: distribution directory
**returns: Selection with release names.
**/
function CLCFG_listHSReleasesGeneric($selName,$first,$distr)
{
	return(HTML_listSelection($selName,CLCFG_getHSReleasesGeneric($distr),$first));
};





/**
**name CLCFG_listHSReleases($selName,$first)
**description generates a selection of the different HS releases (sarge, sid, woody, potato)
**parameter selName: the name of the selection
**parameter first: the release to show first
**/
function CLCFG_listHSReleases($selName,$first)
{
	return(CLCFG_listHSReleasesGeneric($selName,$first,"HS"));
}





/**
**name CLCFG_addDistributionSpecificOptions( $options)
**description adds distribution specific settings to an option array and returns the new array
**parameter $options: the options array with some values
**/
function CLCFG_addDistributionSpecificOptions($options)
{
	$options['kernel']=$_POST['SEL_kernel'];

	return($options);
};





/**
**name CLCFG_showDistributionSpecificOptions($options)
**description shows distribution specific options and returns false, if there was an error
**parameter options: options array
**/
function CLCFG_showDistributionSpecificOptions($options)
{
	include_once("/m23/inc/distr/halfSister/packages.php");

	$options = CLIENT_getSetOption($kernel,"kernel",$options);

	$kernelList = PKG_getKernels("halfSister",$_POST['SEL_sourcename'],$options['arch']);
	$kernel = HTML_storableSelection("SEL_kernel", "kernel", $kernelList, SELTYPE_selection, true, $options['kernel'], $options['kernel']);

	$options = CLIENT_getSetOption($kernel,"kernel",$options);


	echo("
	<tr>
		<td>Kernel</td>
		<td colspan=\"2\">".SEL_kernel."</td>
	</tr>
	");

	return($options);
};

?>
