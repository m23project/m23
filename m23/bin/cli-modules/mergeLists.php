<?php
/*
Description: Reads the input files and merges their lines with the given merge type.
Parameter: Type of merge: "a" for an and merge (only lines that are in all input files are given out) or "o" for or merge (the distinct lines of all input files are given out)
Parameter: Bunch of files to merge.
*/

function run($argc, $argv)
{
	// Remove the full path of m23cli.php
	array_shift($argv);

	// Remove the name of this command file
	array_shift($argv);

	// Merge type
	$mergeType = array_shift($argv);

	// Check, if the merge type is valid
	if (('a' != $mergeType) && ('o' != $mergeType))
		die('ERROR: Wrong mergy type ("a" or "o" allowed)');

	// The left parameters are the files to merge
	$filesToMerge = $argv;

	if ('o' == $mergeType)
	{
		system('sort -u '.implode(' ', $filesToMerge));
		exit(0);
	}
	
	$fileAmount = count($filesToMerge);

	// Generate unique file names for (sorted) temporary input files and the output files
	$outTempFile = uniqid ('/tmp/mergeListsTemp');
	$outTempFile2 = uniqid ('/tmp/mergeListsTemp2');
	$inTempFile = uniqid ('/tmp/mergeListsTempIn');
	$inTempFile2 = uniqid ('/tmp/mergeListsTempIn2');

	// If there is only one input file, give it out directly
	if (1 == $fileAmount)
	{
		echo(file_get_contents($filesToMerge[0]));
	}
	elseif (2 == $fileAmount)
	{
		system("sort \"$filesToMerge[0]\" > $inTempFile; sort \"$filesToMerge[1]\" > $inTempFile2;  comm -1 -2  $inTempFile $inTempFile2");
	}
	else
	{
		// Run thru the files to merge
		for ($i = 1; $i < $fileAmount; $i++)
		{
			// The first two files can be sorted and merged with each other
			if (1 == $i)
			{
				exec("sort \"$filesToMerge[0]\" > $inTempFile; sort \"$filesToMerge[1]\" > $inTempFile2;  comm -1 -2  $inTempFile $inTempFile2 > $outTempFile");
			}
			else
			{
				// The next files are merged with the already merged file
				exec("sort \"".$filesToMerge[$i]."\" > $inTempFile; comm -1 -2 $outTempFile $inTempFile > $outTempFile2; mv $outTempFile2 $outTempFile");
			}
		}

		// Show the merged file
		echo(file_get_contents($outTempFile));
	}

	// Clean up
	@unlink($outTempFile);
	@unlink($outTempFile2);
	@unlink($inTempFile);
	@unlink($inTempFile2);

	exit(0);
}

?>