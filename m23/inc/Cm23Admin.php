<?PHP

class Cm23Admin extends CChecks
{
 	private $defaultOptions = array('css' => 'index.css', 'language' => "en");
 	private $cssList = array('index_fb.css', 'index.css');
 	private $cssAssign = array('index_fb.css' => 'Fresh Blue', 'index.css' => 'Standard');
	const M23ADMIN_HT_PASSWD = "/m23/etc/.htpasswd";
	const M23PHP_MYLDAP_ADMIN_HT_PASSWD = "/m23/etc/.phpMyLDAPAdminHtpasswd";
	const M23BACKUPPC_HT_PASSWD= "/etc/backuppc/htpasswd";
	

/**
**name Cm23Admin::__construct($name, $password)
**description Constructor for new Cm23Admin objects. The object holds all information about a single admin and loads values from the DB if the admin exists. If only name is given, an admin is loaded from the database, if name and password are given, an admin will be created, if nothing is given, the current admin is loaded and added to database if not already in.
**parameter name: login name of an existing admin (to load or to create).
**parameter password: password of a new admin (to create).
**/
	public function __construct($name = null, $password = null)
	{
		$this->name = $name;
		$this->serverLoad = false;

		if (($password === null) && ($name === null))
		{	
			$name = $_SERVER['PHP_AUTH_USER'];
			$this->name = $name;
			$password = $_SERVER['PHP_AUTH_PW'];
			$this->serverLoad = true;
			
		}

		if (($password !== null) && ($name !== null))	//create new admin or load admin that is not yet in database
		{	

			if ($this->serverLoad === false)
			{
				if (Cm23AdminLister::AdminExistsDB($name) || Cm23AdminLister::AdminExistsHt($name))
					$this->addErrorMessage('Der Administrator existiert schon!');
					
				if (!checkNormalKeys($name))
					$this->addErrorMessage('Der Login-Name ist ungültig!');
					
				if (empty($password))
					$this->addErrorMessage('Bitte geben Sie ein Passwort ein!');
			}		

			if (!$this->hasErrors())
			
			{		
				if ( !Cm23AdminLister::AdminExistsDB($name))//add users to database that are not yet in it
				{
					$result = Cm23Admin::addToDB($name, $password);
					if ($result === False)
					{
						$this->addErrorMessage('Datenbankfehler!');
						$this->showMessages();
						exit();
					};
				}
					
				if ($this->serverLoad === false)
					{
						if (Cm23Admin::addToPwFiles($name, $password))
							$this->addInfoMessage('Der Administrator '.$this->name.' wurde hinzugefuegt');
					}			
			}		
		}
		else	//load existing logged-in admin
		{	
			if (!Cm23AdminLister::AdminExistsHt($name))
				$this->addErrorMessage('Der Administrator existiert nicht!');
		};
		
		if (!$this->hasErrors())
		{	//find admin properties in database
			$sql = "SELECT * FROM `m23Admins` WHERE name='$name' ";
			$result = DB_query($sql);
			if (mysql_num_rows($result) === 1)
			{
				$line = mysql_fetch_array($result);
			
				//fill properties of new m23Admin object
				$this->options = unserialize($line['options']);
				$this->pwhash = $line['pwhash'];
				$this->salt = $line['salt'];
				$this->optionsMd5 = md5($line['options']);
			}
		else //info because of database change
			$this->addErrorMessage('Wegen einer Aenderung der DB-Struktur muss sich der Nutzer zunaechst einmalig selbst eingeloggt haben');
		}
	}	
	
	
/**
**name Cm23Admin::__destruct()
**description Destructor for a Cm23Admin object. Prints out messages and saves changed options to the database.
**/
	function __destruct()
	{	
		//check if the options have changed and update if necessary
		if ($this->options)
		{
			$serialized_options = serialize($this->options);
			if ($this->optionsMd5 !== md5($serialized_options))
			{	
				$sql = "UPDATE `m23Admins` SET options='$serialized_options' WHERE name='".$this->name."' ";
				$result = DB_query($sql);
				if (!$result)
					$this->addErrorMessage('Datenbankfehler');
			}
		}
	}

/**
**name Cm23Admin::delete()
**description Deletes an m23 administrator from the database and from the password hash files for m23, backup, backuppc and phpmyldap.
**returns: True if admin could be deleted, False if admin doesn't exist or cannot be deleted (one must remain, can't delete yourself, or errors with DB or files).
**/
	function delete()
	{
		if (Cm23AdminLister::CountAdmins() < 2)
		{	
			$this->addErrorMessage('Der letzte Administrator kann nicht geloescht werden!');
			return (false);
		}
		
		if ($_SERVER['PHP_AUTH_USER'] == $this->name)
		{	
			$this->addErrorMessage('Sie duerfen Ihren eigenen Account nicht loeschen, solange Sie eingeloggt sind!');
			return (false);
		}
	
		if (Cm23AdminLister::AdminExistsHt($this->name) && (!$this->hasErrors()))
		{
			if (Cm23Admin::delFromPwFiles($this->name, $this->password))
			{
				if (Cm23AdminLister::AdminExistsDB($this->name))
				{
					$sql = "DELETE FROM `m23Admins` WHERE name='".$this->name."' ";
					if (!DB_query($sql))
					{
						$this->addErrorMessage('Datenbankfehler!');
						$this->showMessages();
						exit();
					}
				}
				$this->addInfoMessage('Der Administrator '.$this->name.' wurde geloescht');
				return (true);
			}
			else
			{
				$this->addErrorMessage('Fehler beim Schreiben in die Passwortdateien');
				return (false);
			}
		}	
		else
		{	
			$this->addErrorMessage('Dieser Administrator kann nicht geloescht werden!');
			return (false);
		}
	}
	
/**
**name Cm23Admin::changePw($oldpassword, $newpassword)
**description Changes the password of an m23 administrator in the password hash files for m23, backup, backuppc and phpmyldap.
**parameter $oldpassword: Password entered by the user, must be correct to be able to change password
**parameter $newpassword: New password chosen by the user
**returns: True if password was changed successfully, false otherwise
**/
	function changePw($oldpassword, $newpassword)
	{	
 		if ($this->hasErrors())
		{
			$this->addErrorMessage('Das Passwort konnte nicht geaendert werden');
			return (false);	
		}
		print ('1.'.HELPER_md5x5($oldpassword.$this->salt.'   '));
		print ('2.'.$this->pwhash);
		if (HELPER_md5x5($oldpassword.$this->salt) !== $this->pwhash)
		{
			$this->addErrorMessage('Das angegebene Passwort ist falsch');
			return (false);	
		}
		
		if (empty($newpassword))
		{	
			$this->addErrorMessage('Bitte geben Sie ein Passwort ein!');
			return (false);	
		}
		
		if (Cm23Admin::delFromPwFiles($name) && Cm23Admin::addToPwFiles($this->name, $newpassword))
		{	
			$newsalt = HELPER_generateSalt(16);
			$newpwhash = HELPER_md5x5($newpassword.$newsalt);
			$sql = "UPDATE `m23Admins` SET pwhash='$newpwhash', salt='$newsalt' WHERE name='".$this->name."' ";
			$result = DB_query($sql);
			if (!$result)
			{	
				$this->addErrorMessage('Datenbankfehler');
				return (false);
			}	
			$this->addInfoMessage('Das Passwort fuer '.$this->name.' wurde erfolgreich geaendert');
			return (true);
		}
		else
		{
			$this->addErrorMessage('Fehler beim Aendern der Passwortdateien');
			return (false);
		}
	}
	
	
/**
**name Cm23Admin::setCSS($css)
**description sets the CSS file
**parameter $css: element indicating chosen CSS, see array $cssList
**/
	function setCss($css)
	{
		if (in_array($css, $this->cssList)) 
		{
			$this->options['css'] = $css;
			$this->addInfoMessage("Das CSS wurde auf ".$css." geaendert");
		}
		else
		$this->addErrorMessage('Das gewaehlte CSS ist nicht verfuegbar');
	}
	
/**
**name Cm23Admin::getCSS()
**description finds the CSS file for the CSS the user has chosen, defines selection for themeChoice
**returns: name of CSS file
**/
	function getCSS()
	{
		$displayArray = array();
		foreach ($this->cssAssign as $cssFileName => $themeName)
			{	
				$picName = '/gfx/themes/'.substr($cssFileName, 0, (strlen($cssFilename)-3)).'png';
				$displayArray[$cssFileName] = '<table style="display:inline"><tr><td><img class="framed_image" src="'.$picName.'"></td></tr><tr><td align="center" class="subhighlight">'.$themeName.'</td></tr></table>';
			};
		if (!defined('SEL_cssSelection'))
		{
			$selectedCSS = HTML_selection('SEL_cssSelection', $displayArray, SELTYPE_radio, true, $this->options['css']);
			if (HTML_submit("BUT_cssSelectOK","OK"))
			{
				$this->setCSS($selectedCSS);
			}
		}

		return ($this->options['css']);
	}

	/**
**name Cm23Admin::setLanguage($shortLanguage)
**description sets the language for the admin 
**parameter $shortLanguage: indicates chosen language (current valid values: de, en or fr, see I18N_m23instLanguage($shortLanguage))
**/
	function setLanguage($shortLanguage)
	{	
		$this->options['language'] = I18N_m23instLanguage($shortLanguage);
		$this->addInfoMessage("Die Sprache wurde auf ".$this->options['language']." geaendert");
	}
	
/**
**name Cm23Admin::getLanguage()
**description finds the language the user has chosen
**returns: name of language
**/
	function getLanguage()
	{
		return ($this->options['language']);
	}	
	
	
/**
**name Cm23Admin::addToDB($name, $password)
**description Adds an m23 administrator to the DB
**parameter $name: User name entered by the user
**parameter $password: Password entered by the user
**returns: True if database action was successful.
**/	
	private function addToDB($name, $password)
	{
		$salt = HELPER_generateSalt(16);
		$pwhash = HELPER_md5x5($password.$salt);
		$sql = "INSERT INTO `m23Admins` (`name`, `options`, `pwhash`, `salt`) VALUES ('$name', '".serialize($this->defaultOptions)."', '$pwhash' , '$salt' )";
		$result = DB_query($sql);
		return ($result);
	}
	
/**
**name Cm23Admin::addToPwFiles($name, $password)
**description Adds an m23 administrator to the password files
**parameter $name: User name entered by the user
**parameter $password: Password entered by the user
**returns: True if file write action for m23 password file was successful.
**/	
	private function addToPwFiles($name, $password)
	{	
		SERVER_addToHtpasswd(Cm23Admin::M23ADMIN_HT_PASSWD,$name,$password);
		SERVER_addToHtpasswd(Cm23Admin::M23BACKUPPC_HT_PASSWD,$name,$password);
		SERVER_addToHtpasswd(Cm23Admin::M23PHP_MYLDAP_ADMIN_HT_PASSWD,$name,$password);
		BACKUP_addAdmin($name);
		return (Cm23AdminLister::AdminExistsHt($this->name));
	}
	
/**
**name Cm23Admin::delFromPwFiles($name, $password)
**description Adds an m23 administrator to the password files
**parameter $name: User name entered by the user
**returns: True if file write action for m23 password file was successful.
**/	
	private function delFromPwFiles($name)
	{	
		//all these functions have no significant return value
		BACKUP_delAdmin($this->name);
		SERVER_delFromHtpasswd(Cm23Admin::M23ADMIN_HT_PASSWD,$this->name);
		SERVER_delFromHtpasswd(Cm23Admin::M23BACKUPPC_HT_PASSWD,$this->name); 
		SERVER_delFromHtpasswd(Cm23Admin::M23PHP_MYLDAP_ADMIN_HT_PASSWD,$this->name);
		return (!Cm23AdminLister::AdminExistsHt($this->name));
	}	
	
}



?>