<?php
/*
Description: Sets the 1st available GPG key as package pool sign key
*/

function run($argc, $argv)
{
	// Get all GPG key IDs and informations
	$keys = MAIL_getGpgKeyList(true);

	// Check, if there are keys
	if (is_array($keys))
	{
		// Only use the 1st key
		foreach ($keys as $privGPGKeyID => $info)
		{
			$GPGSign = new CGPGSign(CGPGSign::MODE_SAVE);
			
			if (!$GPGSign->hasConfigFile())
			{
				$GPGSign->setGPGID($privGPGKeyID);
				$GPGSign->exportPublicSignKey();
			}

			break;
		}
	}
}
?>

