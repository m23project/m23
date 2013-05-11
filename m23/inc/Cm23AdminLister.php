<?

class Cm23AdminLister
{

const M23ADMIN_HT_PASSWD = "/m23/etc/.htpasswd";

/**
**name Cm23AdminLister::AdminExistsDB($name)
**description checks if an admin with the selected name exists in the DB and returns true if yes, otherwise false
**parameter name: admin login name to check
**returns True if the admin exists in the DB, else false
**/
	static function AdminExistsDB($name)
	{
		$sql = "SELECT COUNT(*) FROM `m23Admins` WHERE name='$name' ";
		$result=DB_query($sql);
		$line=mysql_fetch_array($result);

		return( $line[0] > 0 );
	}
	
/**
**name Cm23AdminLister::AdminExistsHt($name)
**description checks if an admin with the selected name exists in the m23 password file and returns true if yes, otherwise false
**parameter name: admin login name to check
**returns True if the admin exists in the password file, else false
**/
	static function AdminExistsHt($name)
	{
		$fp = fopen(Cm23AdminLister::M23ADMIN_HT_PASSWD,"r");

		while( ! feof($fp) )
		{	
			$templine = fgets($fp,1024);
			$templine = explode(":",$templine);
			if ($templine[0] == $name)
				 return (true);
			if( empty($templine[0]) ) { break; }; 
		}
	return (false);	
	}

/**
**name Cm23AdminLister::CountAdmins()
**description counts the number of registered admins in m23 password file
**returns: number of admins in m23 password file
**/
	static function CountAdmins()
	{
		$number = (countLinesInFile(Cm23AdminLister::M23ADMIN_HT_PASSWD) - 1); //there is an empty line at the end of the file	
		return( $number );
	}	

/**
**name Cm23AdminLister::ListAdmins()
**description lists all admins in m23 password file
**returns: array of admin names in m23 password file
**/
	static function ListAdmins()
	{
		$fp = fopen(Cm23AdminLister::M23ADMIN_HT_PASSWD,"r");
		$adminleft = countLinesInFile(Cm23AdminLister::M23ADMIN_HT_PASSWD); /* Don't delete the last admin ;) */
		$counter = 0;
		$adminlist = array();
		while( ! feof($fp) )
		{	
			$templine = fgets($fp,1024);
			$templine = explode(":",$templine);
			$counter++;
			if( empty($templine[0]) ) { break; }; //filters last empty line from the file
			/* build array using counter for enumeration */
			$adminlist[$counter] = $templine[0];
		}
	return ($adminlist);	
	}
	
	
}




?>