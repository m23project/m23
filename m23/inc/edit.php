<?php

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: routines for editing files with sed
$*/

define('SED_foundLine',"\$m23searchLine");





/**
**name EDIT_setOption($file, $option, $value)
**description Changes an option in a configuration file to a given value.
**parameter file: Name of the file to change.
**parameter option: Name of the option to change.
**parameter value: Value to set.
**returns sed code to change the option in the file to the value.
**/
function EDIT_setOption($file, $option, $value)
{
	// Secure the value for using it with sed
	$value = str_replace ( '&', '\&' , $value );
	$value = str_replace ( '%', '\%' , $value );

	return('sed -i -e "s%\([[:space:]]*'.$option.'[[:space:]]*=[[:space:]]*\).*%\1'.$value.'%" "'.$file.'"');
}





/**
**name EDIT_genClientm23Random()
**description Generates BASH code to calculate a client-side random MD5 hash that is stored in the variable $m23Random.
**returns BASH code to generate a random MD5 hash on client-side that is store
**/
function EDIT_genClientm23Random()
{
	return('m23Random=`echo "$RANDOM$RANDOM$RANDOM$RANDOM$RANDOM$RANDOM$RANDOM$RANDOM$$" | md5sum | cut -d" " -f1`');
}





/**
**name EDIT_commentoutInsert($file,$search,$lineToInsert,$commentStr)
**description Comments out a matched line and inserts a new line after it.
**parameter file: the name of the file
**parameter search: Search string to match the line to comment out.
**parameter lineToInsert: The text of the line to insert.
**parameter commentStr: string to comment out (e.g. "#" for BASH or "//" for C/C++ style)
**/
function EDIT_commentoutInsert($file,$search,$lineToInsert,$commentStr)
{
	return(EDIT_searchLineNumber($file,$search).
	EDIT_commentout($file,SED_foundLine,SED_foundLine,$commentStr).
	EDIT_insertLineNumber($file, SED_foundLine, $lineToInsert,1,false).
	"\n");
}





/**
**name EDIT_countMatches($file,$search)
**description Generates BASH code that counts how many times the search string can be found in the file. This can be used in ` `.
**parameter file: file name
**parameter search: search text
**/
function EDIT_countMatches($file,$search)
{
return("awk -v RS='pheeSheiso2sieseegaxeekeitoongei' -v SEARCH=\"$search\" '
BEGIN { FOUND=0;}
{if (index(\$0, SEARCH) > 0) { FOUND++; }}
END {print(FOUND);}
' $file");
}





/**
**name EDIT_calc($var,$calc)
**description calculates changes of the variable
**parameter var: name of the BASH variable (e.g. $nr)
**parameter calc: calculation that should be done with the var (e.g. incrementation: "+ 1")
**/
function EDIT_calc($var,$calc)
{
	$calc=(str_replace("-","\\-",str_replace("+","\\+",$calc)));
	$target=str_replace("\$","",$var);
	return("$target=`expr $var $calc`");
};





/**
**name EDIT_uncomment($file)
**description uncomments all with m23 commented lines of a file
**parameter file: the name of the file
**/
function EDIT_uncomment($file)
{
return(EDIT_savePerms($file)."
gawk '
match(\$0,\"commented out by m23 with:\") {
	explode($0,ARR,\":\");
	SEP=ARR[2];
	COMLINE=1
	};

index(\$0,SEP)==1&&!COMLINE {
	sub(SEP,\"\")
	};

!COMLINE {print $0}
COMLINE=0' $file > $file.m23

mv $file.m23 $file

".EDIT_restorePerms());
}





/**
**name EDIT_commentout($file,$from,$to,$commentStr,$match)
**description comments out lines in range or matching lines
**parameter file: the name of the file
**parameter from: start commenting out from this line
**parameter to: stop commenting out at this line
**parameter commentStr: string to comment out (e.g. "#" for BASH or "//" for C/C++ style)
**parameter match: 
**/
function EDIT_commentout($file,$from,$to,$commentStr,$match="")
{
EDIT_prepareStr($commentStr);

if (!empty($match))
	$matchCheck=1;
else
	$matchCheck=0;

return(EDIT_savePerms($file)."
gawk -v COMMENT=\"$commentStr\" -v FROM=$from -v TO=$to -v MATCHSTR=\"$match\" -v MATCHCHECK=$matchCheck '
{
	if ((NR>=FROM&&NR<=TO)||(match(\$0,MATCHSTR)&&MATCHCHECK)) {
	print(COMMENT\"commented out by m23 with:\"COMMENT);
	print(COMMENT\"\"\$0);
	}
	else
	{
	print($0);
	};
}' $file > $file.m23


mv $file.m23 $file

".EDIT_restorePerms());
};





/**
**name EDIT_insertAfterLineNumber($file, $lineNumber, $insertText)
**description inserts a text AFTER a line number
**parameter file: the name of the file
**parameter lineNumber: reference line number for inserting
**parameter insertText: text to insert
**parameter addIfNotExists: set to true, if the the line should be added only if the line doesn't exist. false, if the line should be added on every execution.
**/
function EDIT_insertAfterLineNumber($file, $lineNumber, $insertText,$addIfNotExists=true)
{
	return(EDIT_insertLineNumber($file, $lineNumber, $insertText,1,$addIfNotExists));
};





/**
**name EDIT_insertAtLineNumber($file, $lineNumber, $insertText)
**description inserts a text AT a line number
**parameter file: the name of the file
**parameter lineNumber: reference line number for inserting
**parameter insertText: text to insert
**parameter addIfNotExists: set to true, if the the line should be added only if the line doesn't exist. false, if the line should be added on every execution.
**/
function EDIT_insertAtLineNumber($file, $lineNumber, $insertText,$addIfNotExists=true)
{
	return(EDIT_insertLineNumber($file, $lineNumber, $insertText,0,$addIfNotExists));
};





/**
**name EDIT_insertLineNumber($file, $lineNumber, $insertText,$insertMode)
**description inserts a text AT or AFTER a line number
**parameter file: the name of the file
**parameter lineNumber: reference line number for inserting
**parameter insertText: text to insert
**parameter insertMode: "0" insert AT, "1" insert AFTER line number
**parameter addIfNotExists: set to true, if the the line should be added only if the line doesn't exist. false, if the line should be added on every execution.
**/
function EDIT_insertLineNumber($file, $lineNumber, $insertText,$insertMode,$addIfNotExists)
{
	$lineNumber = trim($lineNumber);
	EDIT_prepareStr($insertText);

	if ($addIfNotExists)
		{
			$preAdd="
if test `".EDIT_countMatches($file,$insertText)."` -lt 1
then
	";
			$afterAdd="
fi
";
		}
	else
		$preAdd=$afterAdd="";


return($preAdd.EDIT_savePerms($file)."
awk -v LINENR=$lineNumber -v INSERT=\"$insertText\" -v ADD=$insertMode '
BEGIN {LINENR+=ADD; inserted=0}
NR==LINENR { if (inserted==0) print INSERT\"\\n\"\$0; inserted=1 }
NR!=LINENR {print \$0}
END { if (inserted==0) print \"\\n\"INSERT; } ' $file > $file.m23

mv $file.m23 $file
".EDIT_restorePerms().$afterAdd);
};





/**
**name EDIT_searchLineNumber($file,$searchLine,$startFrom=0)
**description searches for the first line that contains "searchLine" and stores the line number in the BASH variable "m23searchLine"
**parameter file: the name of the file
**parameter searchLine: line to search
**parameter startFrom: the line number to start searching from
**/
function EDIT_searchLineNumber($file,$searchLine,$startFrom=0)
{
return("
	export m23searchLine=`awk -v START=$startFrom -v SEARCH=\"$searchLine\" 'match($0,SEARCH)&&NR>START {print NR; exit}' $file`\n");
};





/**
**name EDIT_searchLastLineNumber($file,$searchLine)
**description searches for the last line that contains "searchLine" and stores the line number in the BASH variable "m23searchLine"
**parameter file: the name of the file
**parameter searchLine: line to search
**/
function EDIT_searchLastLineNumber($file,$searchLine)
{
	$searchLine = escapeshellcmd($searchLine);
	
	return("
		export m23searchLine=`awk -v SEARCH=\"$searchLine\" 'match($0,SEARCH) {LNR=NR}
		END {print LNR}' $file`
		\n");
};





/**
**name EDIT_searchNextLineNumber($file,$searchLine)
**description searches for the next line number that contains "searchLine"
**parameter file: the name of the file
**parameter searchLine: line to search
**/
function EDIT_searchNextLineNumber($file,$searchLine)
{
	return(EDIT_searchLineNumber($file,$searchLine,"\$m23searchLine"));
};





/**
**name EDIT_replace($file, $searchLine, $replaceText, $mode)
**description replaces $searchLine with $replaceText
**parameter file: the name of the file
**parameter searchLine: line to search
**parameter repaceText: text to replace with
**parameter mode: can be "g" to replace all matching lines. Any other value will only replace the first occurrence.
**/
function EDIT_replace($file, $searchLine, $replaceText,$mode)
{
	if ($mode != "g")
		$mode="";

	$cmd="awk -v SEARCH=\"$searchLine\" -v REPLACE=\"$replaceText\" '{"."$mode"."sub(SEARCH,REPLACE); print \$0} ' $file > $file.m23\n";

return(EDIT_savePerms($file)."
$cmd
mv $file.m23 $file
".EDIT_restorePerms());
};





/**
**name EDIT_prepareStr(&$str,$forSearch)
**description changes the string to make it compatible with sed
**parameter str: string that should be changed. the string is read and written from/to this variable
**parameter forSearch: set to true, if the string should be used as a search string
**/
function EDIT_prepareStr(&$str,$forSearch=false)
{
	//$str=addslashes($str);
	$str=str_replace("\$","\\\$",$str);

	if ($forSearch)
	{
		$str=str_replace("[","[[]",$str);
		$str=str_replace("+","[+]",$str);
	};
};





/**
**name EDIT_savePerms($file)
**description saves the permissions and owner of a file
**parameter file: the name to the file
**/
function EDIT_savePerms($file)
{
return("
userGroup=`find $file -printf \"chown %u.%g $file\"`
perm=`find $file -printf \"chmod %m $file\"`
");
};





/**
**name EDIT_restorePerms()
**description restores previously saved file permissions and owner
**/
function EDIT_restorePerms()
{
return("
\$userGroup
\$perm
");
};





/**
**name EDIT_deleteLines($file,$from,$to)
**description Deletes lines from a given line number to a given line number
**parameter file: the name to the file
**parameter from: start deleting at this line number
**parameter to: end deleting at this line number
**/
function EDIT_deleteLines($file,$from,$to)
{
return("
if test $from
then
	".EDIT_savePerms($file)."
	awk -v FROM=$from -v TO=$to '(NR<FROM)||(NR>TO) {print \$0}' $file > $file.m23
	mv $file.m23 $file);
	".EDIT_restorePerms()."
fi");
};





/**
**name EDIT_deleteLinesAmount($file,$from,$amount)
**description Deletes N lines from a given line number
**parameter file: the name to the file
**parameter from: start deleting at this line number
**parameter amount: the amount of lines to delete
**/
function EDIT_deleteLinesAmount($file,$from,$amount)
{
return("
if test $from
then
	".EDIT_savePerms($file)."
	awk -v FROM=$from -v AMOUNT=$amount '
	BEGIN {TO=FROM+AMOUNT}
	(NR<FROM)||(NR>TO) {print $0}' $file > $file.m23
	mv $file.m23 $file
	".EDIT_restorePerms()."
fi");
};





/**
**name EDIT_addIfNotExists($file,$search,$add)
**description Adds a new line if the search pattern cannot be found.
**parameter file: the name to the file
**parameter search: regular expression to search
**parameter add: line to add
**/
function EDIT_addIfNotExists($file,$search,$add)
{
return(EDIT_savePerms($file)."

if test `".EDIT_countMatches($file,$search)."` -lt 1
then
cat >> $file << \"ADDIFNOTEXISTSEOF\"
$add
ADDIFNOTEXISTSEOF
fi

".EDIT_restorePerms());
};





/**
**name EDIT_deleteMatching($file,$search)
**description Deletes all lines matching the regular expression
**parameter file: the name to the file
**parameter search: regular expression to search
**/
function EDIT_deleteMatching($file,$search)
{
$search = trim($search);
return(EDIT_savePerms($file)."
grep -v \"$search\" $file > $file.m23
mv $file.m23 $file
".EDIT_restorePerms());
}
?>