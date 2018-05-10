#!/usr/bin/php
<?php

// Start with an empty array
$a = array();

// Read each line of the input and add it to the array
while ($line = trim(fgets(STDIN)))
	array_push($a, $line);

// Sort the lines in natural way (numbers will be interpreted as numbers)
natsort($a);

// Reverse the entries, if "-r" parameter is given on the command line
if (in_array('-r', $argv))
	$a = array_reverse($a);

// Give out the array in sorted order
foreach ($a as $deb)
	echo("$deb\n");
?>