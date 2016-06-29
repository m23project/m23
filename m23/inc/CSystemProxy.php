<?php





/**
**name CSYSTEMPROXY_getProxySettingsFromAPT()
**description Parses the (maybe existing) proxy settings from the local APT config file.
**returns Array with the proxy settings.
**/
function CSYSTEMPROXY_getProxySettingsFromAPT()
{
	$out['used'] = false;
	$out['active'] = false;
	
	if (SERVER_fileExists(CSystemProxy::APT_PROXY_FILE))
	{
		// Read the complete APT config file
		$config = SERVER_getFileContents(CSystemProxy::APT_PROXY_FILE);

		// Get the line with the HTTP proxy setting
		$linesWithProxySettings = trim(HELPER_grep($config, 'Acquire::http::Proxy'));

		// Check, if exactly one HTTP proxy setting line was extracted
		if (count(explode("\n", $linesWithProxySettings)) == 1)
		{
			// Get the URL from the setting line: Acquire::http::Proxy "http://user:pass@:host:port"; => http://user:pass@:host:port
			$proxyURL = preg_replace('/(.*")(.*)(".*)/i','${2}' , $linesWithProxySettings);

			// Parse the URL into its parts
			$out = parse_url($proxyURL);

			if ($out === false)
				$out['used'] = false;
			else
			{
				$out['used'] = true;

				// If the settings line is not commented out, the proxy is active
				$out['active'] = !(strpos($linesWithProxySettings, '//') === 0);
			}
		}
	}

	return($out);
}





/**
**name CSYSTEMPROXY_addCurlProxySettings()
**description Sets proxy settings for curl, if a proxy is active.
**/
function CSYSTEMPROXY_addCurlProxySettings($ch)
{
	$ps = CSYSTEMPROXY_getProxySettingsFromAPT();

	// Set the curl proxy settings, if a proxy is enabled
	if ($ps['active'])
	{
		curl_setopt($ch, CURLOPT_PROXY, $ps['host']);
		curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$ps[user]:$ps[pass]");
		curl_setopt($ch, CURLOPT_PROXYTYPE, strtoupper($ps['scheme']));
		curl_setopt($ch, CURLOPT_PROXYPORT, $ps['port']);
	}
}





class CSystemProxy extends CChecks
{
	private $proxySettings = array();
	
// 	const APT_PROXY_FILE = '/etc/apt/apt.conf.d/70debconf';
	const APT_PROXY_FILE = '/tmp/70debconf';


/**
**name CSystemProxy::__construct($mode)
**description Constructor for new CSystemProxy objects.
**/
	public function __construct()
	{
		$this->loadProxySettings();
	}



/**
**name CSystemProxy::__destruct()
**description Destructor for a CSystemProxy object.
**/
	function __destruct()
	{
	}



	private function writeAPTProxyConf()
	{
		$scheme = $this->getProxyScheme();
		$proxyServer = $this->getProxyHost();
		$proxyPort = $this->getProxyPort();
		$userPass = $this->getUserPasswordString();
		$deactivatedMarker = (!$this->isProxyActive() ? '// ' : '');

		if (!SERVER_fileExists(CSystemProxy::APT_PROXY_FILE))
		{
			SERVER_putFileContents(CSystemProxy::APT_PROXY_FILE, "Acquire::http::Proxy \"$scheme://$userPass$proxyServer:$proxyPort\";\nAcquire::ftp::Proxy \"$scheme://$userPass$proxyServer:$proxyPort\";");
		}
		else
		{
			// Read the complete APT config file
			$config = SERVER_getFileContents(CSystemProxy::APT_PROXY_FILE);

			// Remove the possible proxy lines from the configuration and add the new lines
			foreach (array('http', 'ftp') as $scheme)
			{
				$config = trim(HELPER_grepNot($config, "Acquire::$scheme::Proxy"));
				$config .= "\n${deactivatedMarker}Acquire::$scheme::Proxy \"$scheme://$userPass$proxyServer:$proxyPort\";";
			}

			SERVER_putFileContents(CSystemProxy::APT_PROXY_FILE, $config, "655");
		}
	}





/**
**name CSystemProxy::showProxyDialog()
**description Shows a dialog for editing the the proxy settings.
**/
	public function showProxyDialog()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

// 		$scheme = HTML_selection('SEL_scheme', array('http', 'ftp'), SELTYPE_selection, $this->getProxyScheme(), 'http');
		$host = HTML_input("ED_host", $this->getProxyHost(), 20, 255);
		$user = HTML_input("ED_user", $this->getProxyUser(), 20, 127);
		$pass = HTML_input("ED_pass", $this->getProxyPassword(), 20, 127);
		$port = HTML_input("ED_port", $this->getProxyPort(), 5, 5);
		$active = HTML_checkBox('CB_active', '', $this->isProxyActive());

		if (HTML_submit('BUT_saveProxySettings', $I18N_change))
		{
			$this->setProxyActive($active);
			$this->setProxyHost($host);
			$this->setProxyUser($user);
			$this->setProxyPassword($pass);
			$this->setProxyPort($port);
			
			if (!$this->hasErrors())
				$this->writeAPTProxyConf();
			else
				$this->showMessages();
		}

		echo("
		<table>
			<tr>
				<td>$I18N_proxyHost<br>".ED_host."</td>
				<td>$I18N_proxyPort<br>".ED_port."</td>
			</tr>
			<tr>
				<td>$I18N_proxyUser<br>".ED_user."</td>
				<td>$I18N_proxyPassword<br>".ED_pass."</td>
			</tr>
			<tr>
				<td>$I18N_proxyActive<br>".CB_active."</td>
				<td>".BUT_saveProxySettings."</td>
			</tr>
		</table>
		");
	}





/**
**name CSystemProxy::loadProxySettings()
**description Loads the proxy settings (from APT config file).
**/
	private function loadProxySettings()
	{
		$this->proxySettings = CSYSTEMPROXY_getProxySettingsFromAPT();
	}





/**
**name CSystemProxy::isProxyActive()
**description Checks, if a proxy is actively used.
**returns true, if a proxy is actively used, otherwise false.
**/
	public function isProxyActive()
	{
		return($this->proxySettings['active']);
	}





/**
**name CSystemProxy::setProxyActive($active)
**description Activated or deactivates a proxy.
**parameter active: Set to true to activate or false to deactivate proxy usage.
**/
	public function setProxyActive($active)
	{
		$this->proxySettings['active'] = ($active === true);
	}





/**
**name CSystemProxy::areProxySettingsAvailable()
**description Checks, if proxy settings are available.
**returns true, if proxy settings are available, otherwise false.
**/
	public function areProxySettingsAvailable()
	{
		return($this->proxySettings['used']);
	}





/**
**name CSystemProxy::setProxyHost($host)
**description Sets the proxy host/servername.
**parameter hos: Proxy host/servername.
**/
	public function setProxyHost($host)
	{
		$this->proxySettings['host'] = $host;
	}





/**
**name CSystemProxy::getProxyHost()
**description Gets the proxy host/servername.
**returns Proxy host/servername.
**/
	public function getProxyHost()
	{
		return($this->proxySettings['host']);
	}





/**
**name CSystemProxy::usesUserPassword()
**description Checks, if the proxy uses user/password authetification.
**returns true, if the proxy uses user/password authetification, otherwise false.
**/
	public function usesUserPassword()
	{
		return(isset($this->proxySettings['user']) && isset($this->proxySettings['user']{0}) && isset($this->proxySettings['pass']) && isset($this->proxySettings['pass']{0}));
	}





/**
**name CSystemProxy::setProxyUser($user)
**description Sets the proxy authentification username.
**parameter user: The username for proxy authentification.
**/
	public function setProxyUser($user)
	{
		$this->proxySettings['user'] = $user;
	}





/**
**name CSystemProxy::getProxyUser()
**description Gets the proxy authentification username.
**returns Proxy authentification username.
**/
	public function getProxyUser()
	{
		return($this->proxySettings['user']);
	}





/**
**name CSystemProxy::setProxyPassword($pass)
**description Sets the proxy authentification password.
**parameter pass: Proxy authentification password.
**/
	public function setProxyPassword($pass)
	{
		$this->proxySettings['pass'] = $pass;
	}





/**
**name CSystemProxy::getProxyPassword()
**description Gets the proxy authentification password.
**returns Proxy authentification password.
**/
	public function getProxyPassword()
	{
		return($this->proxySettings['pass']);
	}





/**
**name CSystemProxy::getProxyScheme()
**description Gets the proxy scheme (http/ftp).
**returns Proxy scheme (http/ftp)
**/
	public function getProxyScheme()
	{
		return($this->proxySettings['scheme']);
	}





/**
**name CSystemProxy::setProxyPort($port)
**description Sets the proxy port.
**parameter port: Proxy port.
**/
	public function setProxyPort($port)
	{
		$this->proxySettings['port'] = $port;
	}





/**
**name CSystemProxy::getProxyPort()
**description Gets the proxy port.
**returns Proxy port.
**/
	public function getProxyPort()
	{
		return($this->proxySettings['port']);
	}





/**
**name CSystemProxy::getUserPasswordString()
**description Creates a string with the user/password combination ($user:$pass@).
**returns String with the user/password combination ($user:$pass@) or empty string, if no proxy authentifictaion is used.
**/
	public function getUserPasswordString()
	{
		if ($this->usesUserPassword())
			return($this->getProxyUser().':'.$this->getProxyPassword().'@');
		else
			return('');
	}
	
}


?>