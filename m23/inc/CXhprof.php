<?php

$GLOBALS['OXhprof'] = new CXhprof();
if ($GLOBALS['OXhprof']->isActive()) {
	if (xhprof_init()) {
		// The following registers an anonymous shutdown function that then registers another (end of stack)
		// shutdown function that calls our actual function. Ensuring we run absolutely last.
		register_shutdown_function(create_function('', 'register_shutdown_function("xhprof_shutdown");'));
	}
}





/**
**name xhprof_init()
**description Enables xhprof, if it is available and should be activated.
**returns true, if xhprof was enabled otherwise false.
**/
function xhprof_init()
{
	// Check for active xhprof extension
	if (!extension_loaded('xhprof'))
	{
		MSG_showError('PHP extension xhprof not loaded! Is it installed and activated?');
		return(false);
	}

	// do not profile debugging sessions (ZendDebugger)
	if (!empty($_COOKIE['start_debug']))
		return(false);

	// Enables profiling of memory usage.
	xhprof_enable(XHPROF_FLAGS_MEMORY);

	return(true);
}





/**
**name xhprof_shutdown()
**description Shutdowns xhprof.
**/
function xhprof_shutdown()
{
	$xhprof_data = xhprof_disable();

	try
	{
		include_once("/m23/data+scripts/m23admin/xhprof/xhprof_lib/utils/xhprof_lib.php");
		include_once("/m23/data+scripts/m23admin/xhprof/xhprof_lib/utils/xhprof_runs.php");
	
		$xhprof_runs = new XHProfRuns_Default();
		$namespace = basename($_SERVER['PHP_SELF'], ".php").">".$_GET['page']."_".number_format($xhprof_data["main()"]["wt"])."micros";
		echo("<div style=\"position: absolute; top: 0px; left: 0px; padding: 5px;\">$namespace</div>");
		if ($GLOBALS['OXhprof']->isSave())
			$run_id = $xhprof_runs->save_run($xhprof_data, $namespace);
	}
	catch (Exception $e)
	{
		// old php versions don't like Exceptions in shutdown functions
		// -> log them to have some usefull info in the php-log
		if (PHP_VERSION_ID < 504000)
		{
			if (function_exists('log_exception'))
				log_exception($e);
			else
				error_log($e->__toString());
		}
		// re-throw to show the caller something went wrong
		throw $e;
	}
}





class CXhprof extends CChecks
{
	private $active = false;
	private $save = false;




/**
**name CXhprof::_construct()
**description Constructor for new CXhprof objects.
**/
	public function __construct()
	{
		$this->active = SERVER_getServerBoolSetting('XhprofActive');
		$this->save = SERVER_getServerBoolSetting('XhprofSave');
	}





/**
**name CXhprof::showXhprofDialog()
**description Shows a dialog for editing the Xhprof settings.
**/
	public function showXhprofDialog()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

		$statesArray = array(1 => $I18N_activate, 0 => $I18N_deactivate);
		$saveArray = array(1 => $I18N_yes, 0 => $I18N_no);

		$active = HTML_selection('SEL_active', $statesArray, SELTYPE_radio, false, ($this->isActive() ? 1 : 0));
		$save = HTML_selection('SEL_save', $saveArray, SELTYPE_radio, false, ($this->isSave() ? 1 : 0));

		if (HTML_submit('BUT_saveXhprofSettings', $I18N_change))
		{
			$this->setActive($active);
			$this->setSave($save);
			if(!$this->hasErrors())
				$this->addInfoMessage($I18N_data_saved);

			$this->showMessages();
		}

		echo("
		<table>
			<tr>
				<td>$I18N_xhprof_activate</td>
			</tr>
			<tr>
				<td>".SEL_active."</td>
			</tr>
			<tr>
				<td>$I18N_xhprof_save_results</td>
			</tr>
			<tr>
				<td>".SEL_save."</td>
			</tr>
			<tr>
				<td>".BUT_saveXhprofSettings."</td>
			</tr>
			<tr>
				<td align=\"center\"><a href=\"xhprof/xhprof_html\" target=\"_blank\">$I18N_xhprof_show_results</a></td>
			</tr>
		</table>
		");
	}





/**
**name CXhprof::setActive($active)
**description Sets profiling active/inactive.
**parameter active: Xhprof state to set (true/false).
**/
	private function setActive($active)
	{
		SERVER_setServerBoolSetting('XhprofActive', $active);
		$this->active = $active;
	}





/**
**name CXhprof::isActive()
**description Gets profiling active/inactive
**returns xhprof state (true/false).
**/
	public function isActive()
	{
		return($this->active);
	}





/**
**name CXhprof::setSave()
**description Toggles Xhprof to save data.
**parameter save: Toggles Xhprof to save data (true/false).
**/
	private function setSave($save)
	{
		SERVER_setServerBoolSetting('XhprofSave', $save);
		$this->save = $save;
	}





/**
**name CXhprof::isSave()
**description Gets save setting of Xhprof.
**returns xhprof save setting (true/false).
**/
	public function isSave()
	{
		return($this->save);
	}
}
?>