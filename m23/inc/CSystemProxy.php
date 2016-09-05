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

		// Check, if a HTTP proxy setting line was extracted
		if (!empty($linesWithProxySettings))
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





/**
**name CSYSTEMPROXY_getUserPasswordString($ps, $connector = '@')
**description Creates a string with the user/password combination ($user:$pass@).
**paramter ps: Array with the proxy settings.
**parameter connector: Character to connect the user/password combination with the following words.
**returns String with the user/password combination ($user:$pass@) or empty string, if no proxy authentifictaion is used.
**/
function CSYSTEMPROXY_getUserPasswordString($ps, $connector = '@')
{
	if (isset($ps['user']{0}) && isset($ps['pass']{0}))
		return("$ps[user]:$ps[pass]$connector");
	else
		return('');
}





/**
**name CSYSTEMPROXY_getEnvironmentVariables($getAlways = false)
**description Generates BASH proxy variables.
**parameter getAlways: If set to true, the variables will always be returned.
**returns BASH proxy variables.
**/
function CSYSTEMPROXY_getEnvironmentVariables($getAlways = false)
{
	$ps = CSYSTEMPROXY_getProxySettingsFromAPT();

	$out = '';
	$newLine = false;

	// Generate the BASH proxy variables, if a proxy is enabled
	if ($ps['active'] || $getAlways)
	{
		// Get user/password combination, if authentification is used
		$userPass = CSYSTEMPROXY_getUserPasswordString($ps);

		// Set the settings for all BASH proxy variables
		foreach (array('http_proxy', 'ftp_proxy', 'https_proxy' , 'rsync_proxy' , 'HTTP_PROXY' , 'HTTPS_PROXY' , 'FTP_PROXY' , 'RSYNC_PROXY') as $varName)
		{
			$nl = $newLine ? "\n" : '';
			$newLine = true;
			
			$out .= "${nl}export $varName=\"$ps[scheme]://$userPass$ps[host]:$ps[port]/\"";
		}
	}

	return($out);
}





/**
**name CSYSTEMPROXY_getAptGetProxyParamter()
**description Generates the apt-get proxy parameters.
**returns: apt-get proxy parameters, if the system proxy is acive otherwise empty string.
**/
function CSYSTEMPROXY_getAptGetProxyParamter()
{
	$ps = CSYSTEMPROXY_getProxySettingsFromAPT();

	$out = '';
	
	$ip = getServerIP();

	// Generate the apt-get proxy settings, if a proxy is enabled
	if ($ps['active'])
	{
		// Get user/password combination, if authentification is used
		$userPass = CSYSTEMPROXY_getUserPasswordString($ps);

/*		$out = " -o=Acquire::http::Proxy='$ps[scheme]://$userPass$ps[host]:$ps[port]' -o=Acquire::ftp::Proxy='$ps[scheme]://$userPass$ps[host]:$ps[port]'";*/
		$out = " -o=Acquire::http::Proxy='http://$ip:2323' -o=Acquire::ftp::Proxy='http://$ip:2323'";
	}

	return($out);
}





class CSystemProxy extends CChecks
{
	private $proxySettings = array();
	
	const APT_PROXY_FILE = '/etc/apt/apt.conf.d/70debconf';
// 	const APT_PROXY_FILE = '/tmp/70debconf';
	const SQUID_FILE = '/etc/squid3/squid.conf';
// 	const SQUID_FILE = '/tmp/squid.conf';
	const ENVIRONMENT_FILE = '/etc/environment';





/**
**name CSystemProxy::__construct($mode)
**description Constructor for new CSystemProxy objects.
**/
	public function __construct()
	{
		$this->loadProxySettings();
	}





/**
**name CSystemProxy::writeEtcProfiles()
**description Writes the proxy settings to the environment file.
**/
	private function writeEtcProfiles()
	{
		$ev = CSYSTEMPROXY_getEnvironmentVariables(true);

		if (!SERVER_fileExists(CSystemProxy::ENVIRONMENT_FILE))
			SERVER_putFileContents(CSystemProxy::ENVIRONMENT_FILE, $ev, "644");
		else
		{
			// Read the complete environment file
			$config = SERVER_getFileContents(CSystemProxy::ENVIRONMENT_FILE);

			// Remove the possible proxy lines from the configuration and add the new lines, if the proxy is active
			foreach (explode("\n", $ev) as $line)
			{
				$config = HELPER_grepNot($config, $line);
				if ($this->isProxyActive())
					$config .= "$line\n";
			}

			SERVER_putFileContents(CSystemProxy::ENVIRONMENT_FILE, $config, "644");
		}
	}





/**
**name CSystemProxy::writeAPTProxyConf()
**description Writes the proxy settings to the APT configuration file or comments them out.
**/
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
			foreach (array('http', 'ftp') as $aptScheme)
			{
				$config = trim(HELPER_grepNot($config, "Acquire::$aptScheme::Proxy"));
				$config .= "\n${deactivatedMarker}Acquire::$aptScheme::Proxy \"$scheme://$userPass$proxyServer:$proxyPort\";";
			}

			SERVER_putFileContents(CSystemProxy::APT_PROXY_FILE, $config, "655");
		}
	}





/**
**name CSystemProxy::writeSquidConf()
**description Writes the (parent) proxy settings to the Squid configuration or removed them.
**/
	private function writeSquidConf()
	{
		// Only proceed, if the Squid config file exists
		if (!SERVER_fileExists(CSystemProxy::SQUID_FILE)) return(false);

		// Get the parameters
		$proxyServer = $this->getProxyHostIP();
		$proxyPort = $this->getProxyPort();
		$userPass = $this->usesUserPassword() ? 'login='.$this->getUserPasswordString('') : '';
		
		if ($this->hasErrors())
			return(false);

		// Generate the Squid proxy settings line
		$proxyLine1 = "cache_peer $proxyServer parent $proxyPort 0 no-query default $userPass";
		$proxyLine2 = "never_direct allow all";

		// Read the complete Squid config file
		$config = SERVER_getFileContents(CSystemProxy::SQUID_FILE);

		// Remove the possible proxy lines from the configuration
		$config = trim(HELPER_grepNot($config, "cache_peer "));
		$config = trim(HELPER_grepNot($config, $proxyLine2));

		// Add the proxy lines, if the proxy is active
		if ($this->isProxyActive())
			$config .= "\n$proxyLine1\n$proxyLine2";

		SERVER_putFileContents(CSystemProxy::SQUID_FILE, $config, "644");

		// Restart Squid 3
		SERVER_runInBackground('writeSquidConf', '/etc/init.d/squid3 start; pkill --signal 1 squid', 'root', false);
	}





/**
**name CSystemProxy::save()
**description Saves the proxy settings in all configuration files.
**/
	private function save()
	{
		$this->writeAPTProxyConf();
		$this->writeSquidConf();
		$this->writeEtcProfiles();
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
		$pass = HTML_input("ED_pass", '*****', 20, 127);
		$port = HTML_input("ED_port", $this->getProxyPort(), 5, 5);
		$active = HTML_checkBox('CB_active', '', $this->isProxyActive());

		if (HTML_submit('BUT_saveProxySettings', $I18N_change))
		{
			$this->setProxyActive($active);
			$this->setProxyHost($host);
			$this->setProxyUser($user);

			// Use the stored password, if the password in the input field is hidden
			if ('*****' == $pass) $pass = $this->getProxyPassword();

			$this->setProxyPassword($pass);
			$this->setProxyPort($port);
			$this->setProxyScheme('http');
			
			if (!$this->hasErrors())
				$this->save();
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
**name CSystemProxy::getProxyHostIP()
**description Gets the proxy IP.
**returns Proxy IP or false, if the proxy IP could not be detected.
**/
	public function getProxyHostIP()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
		$ret = HELPER_hostname2IP($this->getProxyHost());
		
		if ($ret === false)
			$this->addErrorMessage($I18N_couldNotGetProxyServerIP);

		return($ret);
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
**name CSystemProxy::setProxyScheme($scheme)
**description Sets the proxy scheme (http/ftp).
**parameter scheme: Proxy scheme (http/ftp)
**/
	public function setProxyScheme($scheme)
	{
		$this->proxySettings['scheme'] = $scheme;
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
**name CSystemProxy::getUserPasswordString($connector = '@')
**description Creates a string with the user/password combination ($user:$pass@).
**parameter connector: Character to connect the user/password combination with the following words.
**returns String with the user/password combination ($user:$pass@) or empty string, if no proxy authentifictaion is used.
**/
	public function getUserPasswordString($connector = '@')
	{
		if ($this->usesUserPassword())
			return($this->getProxyUser().':'.$this->getProxyPassword().$connector);
		else
			return('');
	}
	
}


?>