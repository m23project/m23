<?php

/*

class.Diff.php

A class containing a diff implementation

Created by Stephen Morley - http://stephenmorley.org/ - and released under the
terms of the CC0 1.0 Universal legal code:

http://creativecommons.org/publicdomain/zero/1.0/legalcode

*/

// A class containing functions for computing diffs and formatting the output.
class CDiff{

// define the constants
const UNMODIFIED 	= 0;
const DELETED		= 1;
const INSERTED	 	= 2;





/**
**name CDiff::compare($string1, $string2, $compareCharacters)
**description The return value is an array, each of whose values is an array containing two values: a line (or character, if $compareCharacters is true), and one of the constants DIFF::UNMODIFIED (the line or character is in both strings), DIFF::DELETED (the line or character is only in the first string), and DIFF::INSERTED (the line or character is only in the second string)
**parameter string1: the first string
**parameter string2: the second string
**parameter compareCharacters: true to compare characters, and false to compare lines; this optional parameter defaults to false
**returns the diff for two strings.
**/
	public static function compare($string1, $string2, $compareCharacters = false)
	{
	
		// initialise the sequences and comparison start and end positions
		$start = 0;
		if ($compareCharacters)
		{
			$sequence1 = $string1;
			$sequence2 = $string2;
			$end1 = strlen($string1) - 1;
			$end2 = strlen($string2) - 1;
		}
		else
		{
			$sequence1 = preg_split('/\R/', $string1);
			$sequence2 = preg_split('/\R/', $string2);
			$end1 = count($sequence1) - 1;
			$end2 = count($sequence2) - 1;
		}
	
		// skip any common prefix
		while ($start <= $end1 && $start <= $end2 && $sequence1[$start] == $sequence2[$start])
			$start ++;
	
		// skip any common suffix
		while ($end1 >= $start && $end2 >= $start && $sequence1[$end1] == $sequence2[$end2])
		{
			$end1 --;
			$end2 --;
		}

		// compute the table of longest common subsequence lengths
		$table = self::computeTable($sequence1, $sequence2, $start, $end1, $end2);
	
		// generate the partial diff
		$partialDiff = self::generatePartialDiff($table, $sequence1, $sequence2, $start);

		// generate the full diff
		$diff = array();
		for ($index = 0; $index < $start; $index ++)
			$diff[] = array($sequence1[$index], self::UNMODIFIED);

		while (count($partialDiff) > 0) $diff[] = array_pop($partialDiff);
		for ($index = $end1 + 1; $index < ($compareCharacters ? strlen($sequence1) : count($sequence1)); $index ++)
			$diff[] = array($sequence1[$index], self::UNMODIFIED);

		// return the diff
		return($diff);
	}





/**
**name CDiff::compareFiles($file1, $file2, $compareCharacters = false)
**parameter file1: he path to the first file
**parameter file2: the path to the second file
**parameter compareCharacters: true to compare characters, and false to compare lines; this optional parameter defaults to false
**returns: the diff for two files. The parameters are:
**/
	public static function compareFiles($file1, $file2, $compareCharacters = false)
	{
		// return the diff of the files
		return(self::compare( file_get_contents($file1), file_get_contents($file2), $compareCharacters));
	}





/**
**name CDiff::computeTable($sequence1, $sequence2, $start, $end1, $end2)
**parameter sequence1: the first sequence
**parameter sequence2: the second sequence
**parameter start: the starting index
**parameter end1: the ending index for the first sequence
**parameter end2: the ending index for the second sequence
**returns the table of longest common subsequence lengths for the specified sequences.
**/
	private static function computeTable($sequence1, $sequence2, $start, $end1, $end2)
	{
	
		// determine the lengths to be compared
		$length1 = $end1 - $start + 1;
		$length2 = $end2 - $start + 1;
	
		// initialise the table
		$table = array(array_fill(0, $length2 + 1, 0));
	
		// loop over the rows
		for ($index1 = 1; $index1 <= $length1; $index1 ++)
		{
	
			// create the new row
			$table[$index1] = array(0);
	
			// loop over the columns
			for ($index2 = 1; $index2 <= $length2; $index2 ++)
			{
	
				// store the longest common subsequence length
				if ($sequence1[$index1 + $start - 1]
						== $sequence2[$index2 + $start - 1])
					$table[$index1][$index2] = $table[$index1 - 1][$index2 - 1] + 1;
				else
					$table[$index1][$index2] = max($table[$index1 - 1][$index2], $table[$index1][$index2 - 1]);
			}
		}
	
		// return the table
		return($table);
	}





/**
**name CDiff::generatePartialDiff($table, $sequence1, $sequence2, $start)
*parameter table: the table returned by the computeTable function
**parameter sequence1: the first sequence
**parameter sequence2: the second sequence
**parameter start: the starting index
**returns the partial diff for the specificed sequences, in reverse order.
**/
	private static function generatePartialDiff($table, $sequence1, $sequence2, $start)
	{
	
		//	initialise the diff
		$diff = array();
	
		// initialise the indices
		$index1 = count($table) - 1;
		$index2 = count($table[0]) - 1;
	
		// loop until there are no items remaining in either sequence
		while ($index1 > 0 || $index2 > 0)
		{
			// check what has happened to the items at these indices
			if ($index1 > 0 && $index2 > 0 && $sequence1[$index1 + $start - 1] == $sequence2[$index2 + $start - 1])
			{
				// update the diff and the indices
				$diff[] = array($sequence1[$index1 + $start - 1], self::UNMODIFIED);
				$index1 --;
				$index2 --;
			}
			elseif ($index2 > 0 && $table[$index1][$index2] == $table[$index1][$index2 - 1])
			{
				// update the diff and the indices
				$diff[] = array($sequence2[$index2 + $start - 1], self::INSERTED);
				$index2 --;
			}
			else
			{
				// update the diff and the indices
				$diff[] = array($sequence1[$index1 + $start - 1], self::DELETED);
				$index1 --;
			}
		}
	
		// return the diff
		return($diff);
	}





/**
**name CDiff::toString($diff, $separator)
**parameter diff: the diff array
**parameter separator: the separator between lines; this optional parameter defaults to "\n"
*returns a diff as a string, where unmodified lines are prefixed by '	', deletions are prefixed by '- ', and insertions are prefixed by '+ '.
**/
	public static function toString($diff, $separator = "\n")
	{
		// initialise the string
		$string = '';
	
		// loop over the lines in the diff
		foreach ($diff as $line)
		{
	
			// extend the string with the line
			switch ($line[1])
			{
				case self::UNMODIFIED : $string .= '	' . $line[0];break;
				case self::DELETED		: $string .= '- ' . $line[0];break;
				case self::INSERTED	 : $string .= '+ ' . $line[0];break;
			}
	
			// extend the string with the separator
			$string .= $separator;
		}
	
		// return the string
		return($string);
	}





/**
**name CDiff::toHTML($diff, $separator)
**parameter diff: the diff array
**parameter separator - the separator between lines; this optional parameter defaults to '<br>'
**returns a diff as an HTML string, where unmodified lines are contained within 'span' elements, deletions are contained within 'del' elements, and insertions are contained within 'ins' elements.
**/
	public static function toHTML($diff, $separator = '<br>')
	{
	
		// initialise the HTML
		$html = '';
	
		// loop over the lines in the diff
		foreach ($diff as $line)
		{
			// extend the HTML with the line
			switch ($line[1])
			{
				case self::UNMODIFIED	: $element = 'span'; break;
				case self::DELETED		: $element = 'del'; break;
				case self::INSERTED	 	: $element = 'ins'; break;
			}
	
			$html .=
					'<' . $element . '>'
					. htmlspecialchars($line[0])
					. '</' . $element . '>';
	
			// extend the HTML with the separator
			$html .= $separator;
		}
	
		// return the HTML
		return $html;
	}





/**
**name CDiff::toTableRows($diff, $indentation, $separator)
**parameter diff: the diff array
**parameter indentation: indentation to add to every line of the generated HTML; this optional parameter defaults to ''
**parameter separator: the separator between lines; this optional parameter defaults to '<br>'
**returns A diff as an HTML table.
**/
	public static function toTableRows($diff, $indentation = '', $separator = '<br>')
	{
	
		$html = '
<style type="text/css">
.diffDeleted span{
	vertical-align:top;
	white-space:pre;
	white-space:pre-wrap;
	font-family:Consolas,\'Courier New\',Courier,monospace;
	border:1px solid rgb(255,192,192);
	background:rgb(255,224,224);
}

.diffInserted span{
	vertical-align:top;
	white-space:pre;
	white-space:pre-wrap;
	font-family:Consolas,\'Courier New\',Courier,monospace;
	border:1px solid rgb(192,255,192);
	background:rgb(224,255,224);
}

</style>';
	
		// initialise the HTML
		$html .= $indentation . "\n";
	
		// loop over the lines in the diff
		$index = 0;
		while ($index < count($diff))
		{
	
			// determine the line type
			switch ($diff[$index][1])
			{
	
				// display the content on the left and right
				case self::UNMODIFIED:
					$leftCell = self::getCellContent($diff, $indentation, $separator, $index, self::UNMODIFIED);
					$rightCell = $leftCell;
				break;
	
				// display the deleted on the left and inserted content on the right
				case self::DELETED:
					$leftCell = self::getCellContent($diff, $indentation, $separator, $index, self::DELETED);
					$rightCell = self::getCellContent($diff, $indentation, $separator, $index, self::INSERTED);
				break;
	
				// display the inserted content on the right
				case self::INSERTED:
					$leftCell = '';
					$rightCell = self::getCellContent( $diff, $indentation, $separator, $index, self::INSERTED);
				break;
			}
	
			// extend the HTML with the new row
			$html .=
					$indentation
					. "	<tr>\n"
					. $indentation
					. '		<td valign="top" class="diff'
					. ($leftCell == $rightCell
							? 'Unmodified'
							: ($leftCell == '' ? 'Blank' : 'Deleted'))
					. '">'
					. $leftCell
					. "</td>\n"
					. $indentation
					. '		<td valign="top" class="diff'
					. ($leftCell == $rightCell
							? 'Unmodified'
							: ($rightCell == '' ? 'Blank' : 'Inserted'))
					. '">'
					. $rightCell
					. "</td>\n"
					. $indentation
					. "	</tr>\n";
		}
	
		// return the HTML
		return($html . $indentation . "\n");
	}





/**
**name CDiff::getCellContent($diff, $indentation, $separator, &$index, $type)
**parameter diff: the diff array
**parameter indentation:indentation to add to every line of the generated HTML
**parameter separator: the separator between lines
**parameter index: the current index, passes by reference
**parameter type: the type of line
**returns the content of the cell, for use in the toTable function.
**/
	private static function getCellContent($diff, $indentation, $separator, &$index, $type)
	{
		// initialise the HTML
		$html = '';
	
		// loop over the matching lines, adding them to the HTML
		while ($index < count($diff) && $diff[$index][1] == $type)
		{
			$html .=
					'<span>'
					. htmlspecialchars($diff[$index][0])
					. '</span>'
					. $separator;
			$index ++;
		}
	
		// return the HTML
		return($html);
	}

}

?>
