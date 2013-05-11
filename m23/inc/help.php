<?PHP

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: function to show the help box in the correct language
$*/





/**
**name HELP_showHelp($topic,$language)
**description showes the help block for the online help
**parameter topic: the name of the help file
**parameter language: two character language description (e.g. de, en, fr,...)
**/
function HELP_showHelp($topic, $language = "")
{
	if (!isset($language{1}))
		$language = $GLOBALS['m23_language'];
	if ((!CAPTURE_isActive() && ($_GET[captureLoad]!=1)) || ($topic=="welcome"))
		echo("<br><br>".HELP_getHelp($topic,$language));
}





/**
**name HELP_getHelp($topic,$language,$fileName)
**description Returnes the help block for the online help
**parameter topic: the name of the help file or name of a man page starting with "man://" e.g. man://tar
**parameter language: two character language description (e.g. de, en, fr,...)
**parameter fileName: full path to a help file in a directory with language short name
**returns help block string
**/
function HELP_getHelp($topic,$language="",$fileName="",$latex=false)
{
	if (!isset($language{1}))
		$language = $GLOBALS['m23_language'];
	//If no filename is give the help file is identified by the topic
	if (empty($fileName))
		{
			//Check if a man page should be shown
			if (!(strpos($topic,"man://")===false))
				{
					$manPage=explode("//",$topic);
					exec("man $manPage[1] > /tmp/m23man$manPage[1]");
					$helpfile="/tmp/m23man$manPage[1]";
				}
			//Check if the help file exists in the current language
			elseif (file_exists("/m23/inc/help/$language/".$topic.".hlp"))
				$helpfile="/m23/inc/help/$language/".$topic.".hlp";
			//If not take the English version
			else
				$helpfile="/m23/inc/help/en/".$topic.".hlp";

			//If there is no help file we can't show anything
			if (!file_exists($helpfile))
				return("");
		}
	else
		{
			$helpfile=$fileName;
			$tempparts=explode("/",$helpfile);
			$tempam=count($tempparts);
			$oldlang=$language;
			$language=$tempparts[$tempam-2];
		};

	if ($language == "tmp")
		$language=$oldlang;

	//Include the i18n file
	include("/m23/inc/i18n/$language/m23base.php");
	$allVars = get_defined_vars();

	//Try to open the help file
	$FILE=fopen($helpfile,"r");
	if (!$FILE)
		{
		 echo("<h2>$I18N_help_could_not_open_help_file</h2>");
		 return(1);
		}
	//Read the first line, the heading
	$heading=fgets($FILE,1000);

	//Add the table opening tag if we want HTML output
	if ($latex)
		$out="";
	else	
		$out="<br>
	<table class=\"helptable\" align=\"left\" border=\"0\" cellspacing=\"5\" id=\"ID_helpBox\">
";

	//Heading or no heading: That's the question ;-)
	if ($heading!="noheading\n")
		if ($latex)
			{
				$heading=str_replace("\n","",$heading);
				$out.="\section{".$heading."}";
			}
		else
			$out.="<tr><td><p><span class=\"subhighlight\">$I18N_help: $heading</span></p>";

	//Run thru the lines
	while (!feof($FILE))
		{
			$line=fgets($FILE,10000);

			//Check if the line contains an include command for other help files
			if (!(strpos($line,"helpInclude(\"") === FALSE))
				{
					//Get the name of the file to include
					$temp=explode("\"",$line);
					$incFileName=$temp[1];

					//Open it
					$incFile=fopen("/m23/inc/help/$language/$incFileName","r");

					//Get and add all its lines
					while ($iLine=fgets($incFile))
						if ($latex)
							{
								$lLine=str_replace("\n","",$iLine);
								$out.="$lLine\n";
							}
						else
							$out.="<p>$iLine</p>";
						
					fclose($incFile);
				}
			else
			//It is a normal line, so add it
				if ($latex)
					{
						$lLine=str_replace("\n","",$line);
						$out.="$lLine\n";
					}
				else
					$out.="<p>$line</p>";
		}

		/*
			Find all i18n variable names from $out
			($out contains the complete HTML help text with the unresolved i18n variables)
		*/
		preg_match_all("/I18N_[a-zA-Z_0-9\[\]_]+/", $out, $found);

		//Make the found variable names unique
		rsort($found[0]);
		reset($found[0]);
		$found=array_unique($found[0]);

		//Run thru the found i18n variables
		foreach ($found as $f)
		{
			//Check if the variable name contains a sequence number like I18N_poolStep[0]
			$pos=strpos($f,"[");
			if (!($pos===false))
				{
					//used for I18N variables like I18N_poolStep[0]
					//$var contains the variable name e.g. I18N_poolStep
					$var=substr($f,0,$pos);
					//and $index the index number/value e.g. 0
					$index=substr($f,$pos+1,strlen($f)-$pos-2);
					$replace=$allVars[$var][$index];
				}
			else
			//It's a normal variable name
				$replace=$allVars[$f];

			//Replace all ocurrences of the i18n variable
			$out=str_replace("\$$f",$replace,$out);
		};

	//Replace m23 page links that link to other m23 help pages
	$out = preg_replace('/(<m23help>)(\w+)(<\/m23help>)/i', "<a href=\"/m23admin/misc/helpViewer.php?helpPage=$2&lang=$GLOBALS[m23_language]\" target=\"_blank\">$2</a>", $out);

	fclose($FILE);

	//Close the table if we don't use LaTeX
	if (!$latex)
		$out.="</td></tr></TABLE>";

	return($out);
};





/**
**name HELP_getHelpString($topic,$language)
**description returns the help block for the online help
**parameter topic: the name of the help file
**parameter language: two character language description (e.g. de, en, fr,...)
**/
function HELP_getHelpString($topic,$language)
{
  include("/m23/inc/i18n/$language/m23base.php");

	if (file_exists("/m23/inc/help/$language/".$topic.".hlp"))
		$helpfile="/m23/inc/help/$language/".$topic.".hlp";
		else
		$helpfile="/m23/inc/help/en/".$topic.".hlp";

	$FILE=fopen($helpfile,"r");
	if (!$FILE)
		{
		 echo("<h2>$I18N_help_could_not_open_help_file</h2>");
		 return(1);
		}
		
	$all="";
		

	while (!feof($FILE))
		{
			$line=fgets($FILE,10000);
			$all.="$line<br>\n";
		}

	fclose($FILE);
	return($all);
};





/**
**name HELP_showHelpTex($fileName)
**description shows the help file converted to LaTeX code
**parameter fileName: name of the help file
**/
function HELP_showHelpTex($fileName,$imageFile,$scale=0.45)
{
	//exchange all french special characters by their LaTeX equivalents
	exec("cat $fileName | sed \"s/á/\\\\\\'a/g\" | sed \"s/Á/\\\\\\'A/g\" | sed 's/à/\\\\`a/g' | sed 's/À/\\\\`A/g' | sed 's/â/\\\\^a/g' | sed 's/Â/\\\\^A/g' | sed \"s/é/\\\\\\'e/g\" | sed \"s/É/\\\\\\'E/g\" | sed 's/è/\\\\`e/g' | sed 's/È/\\\\`E/g' | sed 's/ê/\\\\^e/g' | sed 's/Ê/\\\\^E/g' | sed \"s/í/\\\\\\'i/g\" | sed \"s/Í/\\\\\\'I/g\" | sed 's/ì/\\\\`i/g' | sed 's/Ì/\\\\`I/g' | sed 's/î/\\\\^i/g' | sed 's/Î/\\\\^I/g'| sed \"s/ó/\\\\\\'o/g\" | sed \"s/Ó/\\\\\\'O/g\" | sed 's/ò/\\\\`o/g' | sed 's/Ò/\\\\`O/g' | sed 's/ô/\\\\^o/g' | sed 's/Ô/\\\\^O/g' | sed \"s/ú/\\\\\\'u/g\" | sed \"s/Ú/\\\\\\'U/g\" | sed 's/ù/\\\\`u/g' | sed 's/Ù/\\\\`U/g' | sed 's/û/\\\\^u/g' | sed 's/Û/\\\\^U/g' | sed 's/½/\\\\oe{}/g' | sed 's/¼/\\\\OE{}/g'> /tmp/m23doc.htmltex");

	$s[0]="'&nbsp;|<br>|</a>|<img[ a-zA-Z0-9/\.\"=]*>|<A HREF[ a-zA-Z0-9/.\"\\=:_-]*>'si"; $r[0]="";
	$s[1]="'<b>'si"; $r[1]="\\textbf{";
	$s[2]="'</b>|</i>|</u>|</h[1-4]?>'si"; $r[2]="}";
	$s[3]="'<i>'si"; $r[3]="\\textit{";
	$s[4]="'<li>'si"; $r[4]="\\item ";
	$s[5]="'</LI>'si"; $r[5]="";
	$s[6]="'<ul>'si"; $r[6]="\n\\begin{itemize}\n";
	$s[7]="'<ol>'si"; $r[7]="\n\\begin{enumerate}\n";
	$s[8]="'</ul>'si"; $r[8]="\n\\end{itemize}";
	$s[9]="'</ol>'si"; $r[9]="\n\\end{enumerate}";
	$s[10]="'&rarr;'si"; $r[10]="\$\\rightarrow\$";
	$s[11]="'</td>|</tr>|<CENTER>|</CENTER>'si"; $r[11]="";
	$s[12]="'<u>|<h[1-4]?>'si"; $r[12]="\\subsection{";
	$s[13]="'<code>'si"; $r[13]="\n\\begin{verbatim}\n";
	$s[14]="'</code>'si"; $r[14]="\n\\end{verbatim}\n";
	$s[15]="'<[\/\!]*?[^<>]*?>'si"; $r[15]="";
	$s[16]="'&gt;'si"; $r[16]="\$\\rangle\$";
	$s[17]="'&lt;'si"; $r[17]="\$\\langle\$";
	$s[18]="'&Ccedil;'s"; $r[18]="\\c{C}";
	$s[19]="'&ccedil;'s"; $r[19]="\\c{c}";
	$s[20]="'&raquo;'si"; $r[20]="\$\gg\$";
	$s[21]="'&laquo;'si"; $r[21]="\$\ll\$";
	$s[22]="'&oelig;'s"; $r[22]="\\oe{}";
	$s[23]="'&OElig;'s"; $r[23]="\\OE{}";
	$s[24]="'&bull;'si"; $r[24]="\\newline\n\$\\bullet\$";
	$s[25]="'_'si"; $r[25]="\\_";
//	$s[25]="'%'si"; $r[25]="\\%";
	

	//fetch the language from the directory name
	$tempparts=explode("/",$fileName);
	$tempam=count($tempparts);
	$language=$tempparts[$tempam-2];

	$html=HELP_getHelp("",$language,"/tmp/m23doc.htmltex",true);

	$s2[0]="'</table>'si"; $r2[0]="<table>";
	$html=preg_replace($s2,$r2,$html);
	
	$tables=spliti("<table>",$html);
	$html="";
	for ($i=0; $i < count($tables); $i++)
		{
			$rows=spliti("<tr>",$tables[$i]);
			
			$width=0;
			
			//find the biggest row amount
			for ($i2=0; $i2 < count($rows); $i2++)
				{
					$cols=spliti("<td[ a-zA-Z0-9/\.\"=]*>",$rows[$i2]);
					$new=count($cols)-1;
					if ($new > $width)
						$width=$new;
				}
				
			if ($width == 0)
				$html.=$tables[$i];
			else
				{
					//in this table block are columns => it must be a table
					$html.="\n\begin{tabular}{|".str_repeat ("c|",$width)."}\n\\hline\n";
					
					for ($i2=0; $i2 < count($rows); $i2++)
						{
							//split the columns from each row
							$cols=spliti("<td[>]*",$rows[$i2]);

							$add="&";
							$line="";

							if (count($cols) > 1)
								{
									//there are columns
									for ($i3=1; $i3 <= $width; $i3++)
										{
											//extract the field text
											$field=trim(str_replace("\\\\\n","",$cols[$i3]));
											if ($i3 == $width)
												$add="";
											$line.="$field $add ";
										};
										
									$html.=trim($line);
										
									$html.=" \\hline\n";
								};
						}

					$html.="\n\end{tabular}\n";
				};
		};

	$html=preg_replace($s,$r,$html);

	$lines=explode("\n",$html);

	$html="";
	$verbatim=false;

	foreach ($lines as $line)
		{
			if (!(strpos($line,"begin{verbatim}")===false))
				$verbatim=true;
			if (!(strpos($line,"end{verbatim}")===false))
				$verbatim=false;
				
			if (strlen(trim($line))>0)
				/*no LaTex newline, if
					- } is the last character
					- \hline is the word
				*/
				if (($line[strlen($line)-1]=="}") || (!(strpos($line,"\\hline")===FALSE)) || $verbatim)
					$html.="$line\n";
				else
					$html.="$line\\\\\n";
					
				//if the current line is the heading => insert the image afterwards
				if (!(strpos($line,"\\section")===FALSE))
					$html.="\\includegraphics[scale=$scale]{".$imageFile."} \\\\\n";
		};


	echo($html);
};
?>
