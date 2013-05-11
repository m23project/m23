<?PHP
include("/m23/inc/db.php");
include("/m23/inc/packages.php");
include("/m23/inc/fdisk.php");
include("/m23/inc/hwinfo.php");
include("/m23/inc/client.php");
include("/m23/inc/help.php");
include("/m23/inc/checks.php");
include("/m23/inc/dhcp.php");
include("/m23/inc/preferences.php");
include("/m23/inc/i18n.php");
include("/m23/inc/plugin.php");
include("/m23/inc/remotevar.php");
include("/m23/inc/update.php");
include("/m23/inc/message.php");
include("/m23/inc/distr.php");
include("/m23/inc/sourceslist.php");
include("/m23/inc/groups.php");
include("/m23/inc/html.php");
include("/m23/inc/massTools.php");
 
dbConnect();





/**
**name MIGR_dmi($data)
**description converts the DMI string from the old format (line ent marked with '?') to the new (marked wit '\n');
**parameter data: associative array with all client information
**/
function MIGR_dmi($data)
{
	$dmi = str_replace("?","\n",$data[dmi]);
	
	if ($dmi == $data[dmi])
		echo("DMI is allready converted!");
	else
		{
			$sql = "UPDATE clients SET dmi='$dmi' WHERE client='$data[client]'";
			db_query($sql);
			echo("DMI conversion DONE!");
		};
};





/**
**name MIGR_partitions($data)
**description converts param string partition information to the new assiciative array format.
**parameter data: associative array with all client information
**parameter out[dev[devNr]_path]: the path to the device (e.g. /dev/hda)
**parameter out[dev[devNr]_size]: the size of the device
**parameter out[dev[devNr]_partamount]: amount of partitions on the device
**parameter out[dev_amount]: amount of the devices
**parameter out[dev[devNr]part[partNr]_nr]: partition number (e.g. 2 for /dev/hda2)
**parameter out[dev[devNr]part[partNr]_start]: start position of the partition
**parameter out[dev[devNr]part[partNr]_end]: end position of the partition
**parameter out[dev[devNr]part[partNr]_type]: type (primary,extended,logical) of the partition
**parameter out[dev[devNr]part[partNr]_fs]: file system
**/
function MIGR_partitions($data)
{
	$drives = explode("!",$data[partitions]);

	//the glue string is include in the partitions => it is allready converted
	if (strpos($data[partitions],"###") != FALSE)
		{
			echo(" partitions are allready converted!");
			return(false);
		};

	//exchange the splitter between device and partition data from ";" to "?"
	foreach ($drives as $drive)
		{
			if (empty($drive)) break;
			$drive[3]="?";
			$driveCorr.="$drive!";
		};
	
	//split again with the corrected string
	$drives = explode("!",$driveCorr);
	
	$out = array();
	
	$devNr = 0;
	
	foreach ($drives as $drive)
		{
			if (empty($drive)) break;

			//split the device (e.g. hda) from the partitions
			$devicePartitions = explode("?",$drive);
			$out["dev$devNr"."_path"]="/dev/$devicePartitions[0]";

			//split the size from the partitions
			$sizePartitions = explode(":",$devicePartitions[1]);
			$varValue = explode("=",$sizePartitions[0]);
			$out["dev$devNr"."_size"] = $varValue[1];

			$partitions = explode('.',$sizePartitions[1]);

			$partNr = 0;

			foreach($partitions as $partition)
				{ //run thru the partitions
					if (empty($partition)) break;
					
					//split variable and value
					$varValues = explode(";",$partition);

					//build the base variable name
					$varBase = "dev$devNr"."part$partNr";
					
					foreach ($varValues as $varValue)
						{
							$varValue = explode("=",$varValue);

							//replace the variables
							switch ($varValue[0])
								{
									case "partNr" : $out[$varBase."_nr"] = $varValue[1]; break;
									case "partStart" : $out[$varBase."_start"] = $varValue[1]; break;
									case "partEnd" : $out[$varBase."_end"] = $varValue[1]; break;
									case "partType" : $out[$varBase."_type"] = $varValue[1]; break;
									case "fileSys" : $out[$varBase."_fs"] = $varValue[1]; break;
								}
						}

					if ($out[$varBase."_type"] == "extended")
						$out[$varBase."_fs"] = -1;

					$partNr++;
				};

			$out["dev$devNr"."_partamount"] = $partNr;
			$devNr++;
		};

	$out[dev_amount] = $devNr;
	
	$partStr = implodeAssoc("###",$out);
	
	
	$sql = "UPDATE clients SET partitions='$partStr' WHERE client='$data[client]'";
	db_query($sql);
	
	echo(" partitions conversion DONE!");
};


db_query("ALTER TABLE `sourceslist` ADD `release` VARCHAR( 255 ) NOT NULL AFTER `distr`");
db_query("ALTER TABLE `sourceslist` ADD `desktops` LONGTEXT NOT NULL");
/*$res = CLIENT_query("","","","");

while($data = mysql_fetch_array($res))
	{
		echo("$data[client]: ");
		MIGR_dmi($data);
		MIGR_partitions($data);
		echo("<br>");
	};*/
?>