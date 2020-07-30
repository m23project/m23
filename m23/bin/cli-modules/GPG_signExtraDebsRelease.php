<?php
/*
Description: Signs the Release file in the extraDebs directory as Release.gpg and InRelease.
*/

function run($argc, $argv)
{
	PKGBUILDER_signExtraDebsRelease();
}
?>

