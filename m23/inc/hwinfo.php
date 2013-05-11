<?PHP

/*$mdocInfo
 Author: Daniel Kasten (DKasten@pc-kiel.de) ,Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: functions to view the hardware information of the client.
$*/

/**
**name HWINFO_getParam($paramName, $clientName)
**description get hardware infos
**parameter paramName: parameter to read from the hardware info (e.g. cpu, mem, ...)
**parameter clientName: name of the client
**/
 function HWINFO_getParam($paramName, $clientName)
 {
  $sql="SELECT $paramName FROM `clients` WHERE client='$clientName'";

  $result=DB_query($sql);
  $line=mysql_fetch_row($result);

  return ($line[0]);
 }





 /**
 **name HWINFO_getMemory($clientName)
 **description returns the size of memory
 **parameter clientName: name of the client
 **/
 function HWINFO_getMemory($clientName)
 {
  return(HWINFO_getParam("memory", $clientName));
 };





 /**
 **name HWINFO_getHDSize($clientName)
 **description returnes the sizes of all harddisks in a string, sperated by html breaks
 **parameter clientName: name of the client
 **/
function HWINFO_getHDSize($clientName)
{
	$param = FDISK_getPartitions($clientName);
	
	$out="";
	
	for ($vDev=0; $vDev < $param[dev_amount]; $vDev++)
		$out.=$param["dev$vDev"."_path"].": ".$param["dev$vDev"."_size"]." MB<BR>";
		
	return($out);
};






 /**
 **name HWINFO_getCPU($clientName)
 **description returns type and name of all installed CPU(s)
 **parameter clientName: name of the client
 **/
 function HWINFO_getCPU($clientName)
 {
	$cpus=explode("\n",HWINFO_getParam("cpu", $clientName));
	$speeds=explode("\n",HWINFO_getParam("mhz", $clientName));

	$cpuAmount = $cpuAmountProc = count($cpus);
	
	$dataAllBlocks=DMI_getParam("Processor Information", $clientName);

	//get first (only) block
	$data=$dataAllBlocks[0];
	
	//fetch arguments
	for ($i=0; $i < count($data); $i++)
	{
		$varValue=explode(":",$data[$i]);
		//Check if the amount of CPUs is set in DMI
		if (stristr($varValue[0],"Core Count"))
			$cpuAmountDMI=trim($varValue[1]);
	}

	//If the amount of CPU read from proc differrs from the amount reported by DMI (this may happen when a multi-core system is booted without SMP support) duplicate the CPU and speed information
	if ($cpuAmountDMI > $cpuAmountProc)
	{
		$cpus = array_fill (0, $cpuAmountDMI, $cpus[0]);
		$speeds = array_fill (0, $cpuAmountDMI, $speeds[0]);
		$cpuAmount = $cpuAmountDMI;
	}

	$out="<table>\n";
	for ($i=0; $i < $cpuAmount; $i++)
	{
		$out.="<tr>
		<td>CPU $i: </td>
		<td>".$cpus[$i]." @ ".$speeds[$i]." Mhz</td>
		</tr>\n";
	};

	$out.="</table>\n";
	
	return($out);
 };





 /**
 **name HWINFO_getNetworkCards($clientName)
 **description returns network cards
 **parameter clientName: name of the client
 **/
 function HWINFO_getNetworkCards($clientName)
 {
  return(nl2br(HWINFO_getParam("netcards", $clientName)));
 };





 /**
 **name HWINFO_getGraficCards($clientName)
 **description returns graficcard
 **parameter clientName: name of the client
 **/
 function HWINFO_getGraficCards($clientName)
 {
  return(nl2br(HWINFO_getParam("graficcard", $clientName)));
 };





 /**
 **name HWINFO_getSoundCards($clientName)
 **description returns soundcards
 **parameter clientName: name of the client
 **/
 function HWINFO_getSoundCards($clientName)
 {
  return(nl2br(HWINFO_getParam("soundcard", $clientName)));
 };





 /**
 **name HWINFO_getIsaCards($clientName)
 **description returns isa-cards
 **parameter clientName: name of the client
 **/
 function HWINFO_getIsaCards($clientName)
 {
  return(HWINFO_getParam("isa", $clientName));
 };





/**
**name HWINFO_printPartitions($clientName)
**description prints the partition information
**parameter clientName: name of the client
**/
function HWINFO_printPartitions($clientName)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$param = FDISK_getPartitions($clientName);
	$fstab = FDISK_getFstabArray($clientName);

	echo("
	<span class=\"title\"> $I18N_partition_information </span>
	<br>");
	HTML_showTableHeader();
	echo("
	<tr>
		<td>");
			FDISK_printAllBars($param, $fstab);

			FDISK_printColorDefinitions();
	echo("</td>
	</tr>");
	HTML_showTableEnd();
};





/**
**name DMI_getAllTextBox($clientName)
**description Get all DMI info in a text box.
**parameter clientName: name of the client
**returns All DMI info in a text box.
**/
function DMI_getAllTextBox($clientName)
{
	$dmi = HWINFO_getParam("dmi", $clientName);

	HTML_textArea('TB_dmi', 80, 20, $dmi);

	return(constant('TB_dmi'));
}





/**
**name DMI_getParam($paramName, $clientName)
**description get dmi info for a special parameter
**parameter paramName: name of dmi setting
**parameter clientName: name of the client
**/
function DMI_getParam($paramName, $clientName)
{
	//get all dmi-infos for the client
	$dinfos=explode("Handle ",HWINFO_getParam("dmi", $clientName));

	if (strstr($dinfos[0],"# dmidecode 2.7") || strstr($dinfos[0],"# dmidecode 2.8") || strstr($dinfos[0],"# dmidecode 2.9"))
		$paramSearchLine=1;
	else
		$paramSearchLine=2;

	$blockNr=0;

	for ($infopos=0; $infopos < count($dinfos); $infopos++)
		{//split all lines of the block
			$dlines=explode("\n",$dinfos[$infopos]);
			//check if the block is the searched one
			if (stristr($dlines[$paramSearchLine],$paramName))
				$out[$blockNr++]=$dlines;
		}

	return($out);
}





/**
**name DMI_getBoard($clientName)
**description get the dmi board informations
**parameter clientName: name of the client
**/
function DMI_getBoard($clientName)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	//fetch the data
	$dataAllBlocks=DMI_getParam("board", $clientName);

	//get first (only) block
	$data=$dataAllBlocks[0];
	//fetch arguments
	for ($i=0; $i < count($data); $i++)
		{
		$varValue=explode(":",$data[$i]);
		if (stristr($varValue[0],"Vendor") || stristr($varValue[0],"Manufacturer"))
			$vendor=$varValue[1];
		elseif (stristr($varValue[0],"product"))
			$product=$varValue[1];
		elseif (stristr($varValue[0],"version"))
			$version=$varValue[1];
		}
	//generate string
	return("$I18N_vendor: $vendor<br>\n$I18N_name: $product<br>\n$I18N_version: $version");
};





 /**
 **name DMI_getBios($clientName)
 **description get the dmi bios informations
 **parameter clientName: name of the client
 **/
 function DMI_getBios($clientName)
 {
 	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$dataAllBlocks=DMI_getParam("bios inf", $clientName);
	$CharacteristicsFollowing = false;

	$data=$dataAllBlocks[0];
	$features="<br>\n$I18N_features: ";

	for ($i=0; $i < count($data); $i++)
	{
		$varValue=explode(":",$data[$i]);

		if (stristr($varValue[0],"Vendor"))
			$vendor=$varValue[1];
		elseif (stristr($varValue[0],"Release"))
			$release=$varValue[1];
		elseif (stristr($varValue[0],"version"))
			$version=$varValue[1];
		elseif (stristr($varValue[0],"rom size"))
			$romSize=$varValue[1];
		elseif (stristr($varValue[0],"Characteristics"))
			$CharacteristicsFollowing = true;
		elseif ($CharacteristicsFollowing && isset($data[$i]{1}))
				$features .= '<br>&bull; '.$data[$i];
		else
			$CharacteristicsFollowing = false;
	}

  return("$I18N_vendor: $vendor<br>\n$I18N_release: $release<br>\n$I18N_version: $version<br>\n$I18N_rom_size: $romSize<br>\n$features");
 };





/**
**name DMI_getMemory($clientName)
**description get the dmi memory informations
**parameter clientName: name of the client
**/
function DMI_getMemory($clientName)
 {
  include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

  $dataAllBlocks=DMI_getParam("memory", $clientName);

  $out="";

  for ($blockNr=0; $blockNr < count($dataAllBlocks); $blockNr++)
	  {
	   $data=$dataAllBlocks[$blockNr];

	   for ($i=0; $i < count($data); $i++)
		{
		 $varValue=explode(":",$data[$i]);
		 if (stristr($varValue[0],"Socket"))
			 $socket=$varValue[1];
		 elseif (stristr($varValue[0],"Banks"))
			 $banks=$varValue[1];
		 elseif (stristr($varValue[0],"Type"))
			 $type=$varValue[1];
		 elseif (stristr($varValue[0],"Installed"))
			 $installedSize=$varValue[1];
		 elseif (stristr($varValue[0],"Enabled"))
			 $enabledSize=$varValue[1];
		}

		if (!empty($socket))
			$out.="<br>$I18N_socket: $socket<br>\n$I18N_bank: $banks<br>\n$I18N_type: $type<br>\n$I18N_installed_size: $installedSize<br>\n$I18N_activated_size: $enabledSize<br>\n";
	  }

  return($out);
 };





/**
**name DMI_getCPU($clientName)
**description get the dmi cpu informations
**parameter clientName: name of the client
**/
function DMI_getCPU($clientName)
 {
  include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

  $dataAllBlocks=DMI_getParam("processor", $clientName);

  $out="";

  for ($blockNr=0; $blockNr < count($dataAllBlocks); $blockNr++)
	  {
	   $data=$dataAllBlocks[$blockNr];

	   for ($i=0; $i < count($data); $i++)
		{
		 $varValue=explode(":",$data[$i]);
		 if (stristr($varValue[0],"Type"))
			 $type=$varValue[1];
		 elseif (stristr($varValue[0],"Family"))
			 $family=$varValue[1];
		 elseif (stristr($varValue[0],"Manufacturer"))
			 $manufactur=$varValue[1];
		 elseif (stristr($varValue[0],"Version"))
			 $version=$varValue[1];
		 elseif (stristr($varValue[0],"Designation"))
			 $socket=$varValue[1];
		}

		if (!empty($type))
			$out.="$I18N_type: $type<br>\n$I18N_vendor: $manufactur<br>\n$I18N_socket: $socket<br>\n$I18N_family: $family<br>\n$I18N_version: $version";
	  }

  return($out);
 };





 /**
 **name DMI_getChassis($clientName)
 **description get the dmi chassis information
 **parameter clientName: name of the client
 **/
 function DMI_getChassis($clientName)
 {
  include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

  $dataAllBlocks=DMI_getParam("Chassis", $clientName);

  $out="";

  for ($blockNr=0; $blockNr < count($dataAllBlocks); $blockNr++)
	  {
	   $data=$dataAllBlocks[$blockNr];

	   for ($i=0; $i < count($data); $i++)
		{
		 $varValue=explode(":",$data[$i]);
		 if (stristr($varValue[0],"vendor"))
			 $vendor=$varValue[1];
		 elseif (stristr($varValue[0],"serial"))
			 $serial=$varValue[1];
		 elseif (stristr($varValue[0],"Version"))
			 $version=$varValue[1];
		 elseif (stristr($varValue[0],"asset"))
			 $asset=$varValue[1];
		}

		//if (!empty($vendor))
			$out.="$I18N_vendor: $vendor<br>\n$I18N_version: $version<br>\n$I18N_serial_number: $serial<br>\n$I18N_inventory_number: $asset";
	  }

  return($out);
 };





 /**
 **name DMI_getCache($clientName)
 **description get the dmi cache information
 **parameter clientName: name of the client
 **/
 function DMI_getCache($clientName)
 {
  include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

  $dataAllBlocks=DMI_getParam("Cache", $clientName);

  $out="";

  for ($blockNr=0; $blockNr < count($dataAllBlocks); $blockNr++)
	  {
	   $data=$dataAllBlocks[$blockNr];

		for ($i=0; $i < count($data); $i++)
		{
			$varValue=explode(":",$data[$i]);
			if (stristr($varValue[0],"Socket"))
				$socket=$varValue[1];
			elseif (stristr($varValue[0],"Internal"))
				{
					$parts=explode(" ",trim($varValue[0]));
					$cacheNr=$parts[0][1];
					$internal=$varValue[1];
				}
			elseif (stristr($varValue[0],"Configuration"))
				$cacheNr = $varValue[1];
			elseif (stristr($varValue[0],"Size"))
				$size=$varValue[1];
			elseif (stristr($varValue[0],"Maximum"))
				$maximum=$varValue[1];
			elseif (stristr($varValue[0],"Type"))
				$type=$varValue[1];
		}

		if ($cacheNr > 1)
			$out.="<br>";
		$out.="$I18N_cache_number: $cacheNr<br>\n$I18N_type: $socket<br>\n$I18N_internal_cache: $internal<br>\n$I18N_size: $size<br>\n$I18N_maximal_size;: $maximum<br>\n$I18N_type: $type<br>";
	  }

  return($out);
 };





/**
**name DMI_getSlot($clientName)
**description get the dmi information about slots
**parameter clientName: name of the client
**/
function DMI_getSlot($clientName)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$dataAllBlocks=DMI_getParam("Slot", $clientName);

	$out="";
	

	for ($blockNr=0; $blockNr < count($dataAllBlocks); $blockNr++)
	{
		$data=$dataAllBlocks[$blockNr];
		$features="<br>\n$I18N_features: ";

		$CharacteristicsFollowing = false;

		for ($i=0; $i < count($data); $i++)
		{
			$varValue=explode(":",$data[$i]);
			if (trim($varValue[0])=="Slot")
				{
					$slot=$varValue[1];
					$CharacteristicsFollowing = false;
				}
			elseif (stristr($varValue[0],"Status") || stristr($varValue[0],"Current Usage"))
				{
					$status=$varValue[1];
					$CharacteristicsFollowing = false;
				}
			elseif (stristr($varValue[0],"Features"))
				{
					$features=$varValue[1];
					$CharacteristicsFollowing = false;
				}
			elseif (stristr($varValue[0],"Characteristics"))
				$CharacteristicsFollowing = true;
			elseif (stristr($varValue[0],"Type"))
				{
					$type=$varValue[1];
					$CharacteristicsFollowing = false;
				}
			elseif ($CharacteristicsFollowing && isset($data[$i]{1}))
				$features .= '<br>&bull; '.$data[$i];
		}

		if ($blockNr > 0)
			$out.="<br>";
		$out.="$I18N_slots: $slot<BR>\n$I18N_type: $type<br>\n$I18N_status: $status $features<br>\n";
	}

	return($out);
};





 /**
 **name DMI_getPorts($clientName)
 **description get the dmi information about ports
 **parameter clientName: name of the client
 **/
 function DMI_getPorts($clientName)
 {
  include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

  $dataAllBlocks=DMI_getParam("port", $clientName);

  $out="";

  for ($blockNr=0; $blockNr < count($dataAllBlocks); $blockNr++)
	  {
	   $data=$dataAllBlocks[$blockNr];

	   for ($i=0; $i < count($data); $i++)
		{
		 $varValue=explode(":",$data[$i]);
		 if (stristr($varValue[0],"port type"))
			 $type=$varValue[1];
		 elseif (stristr($varValue[0],"Internal Connector"))
			 $intconnector=$varValue[1];
		 elseif (stristr($varValue[0],"external Connector"))
			 $extconnector=$varValue[1];
		 elseif (stristr($varValue[0],"internal Designator"))
			 $intdesignator=$varValue[1];
		 elseif (stristr($varValue[0],"external Designator"))
			 $extdesignator=$varValue[1];

		}

		if ($blockNr > 0)
			$out.="<br>";
		$out.="$I18N_internal_port: $intdesignator<br>\n$I18N_internal_connection_category: $intconnector<br>\n
			   $I18N_external_port: $extdesignator<br>\n$I18N_external_connection_category: $extconnector<br>\n
			   $I18N_type: $type";
	  }

  return($out);
 };
?>
