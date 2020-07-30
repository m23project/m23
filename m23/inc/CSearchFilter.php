<?php

class CSearchFilter extends CChecks
{
/**
**Since we pre-define our mysql queries, we have to exchange our
**dummy values with the actual values later. SQLREPLACE will hold these.
**/
	private $SQLREPLACE = array();


/**
**The PROPERTY variable will hold all the properties that can be filtered for
**and is the sole place where changes have to be made to add something new
**to filter for. A detailed explanation will be provided in the constructor
**of this class.
**/
	private $PROPERTY = array();


/**
**The OPERATOR_* variables will hold all operators that can be used for properties.
**/
	private $OPERATOR_GENERAL = array();
	private $OPERATOR_NUMBER = array();
	private $OPERATOR_TEXT = array();
	private $OPERATOR_DATE = array();
	private $ALLOPERATORS = array();


/**
**The VALUETYPE variable will hold the GUI-elements that shall be used for the
**property.
**/
	private $VALUETYPE = array();


/** Some values have to be translated from the user input **/


/**
**The ONLINE variable will hold the information is the client is dedicated and
**reachable.
**/
	private $ONLINE = array();


/**
**The STATUS variable will hold all possible states like ready to install(green)
**just added(red), defined, ...
**/
	private $STATUS = array();


/**
**The ORDER_DIRECTION will hold the search direction.
**/
	private $ORDER_DIRECTION = array();


/**
**A filter consists a property, an operator and a value.
**For example "client equals localhost"
**/
	private $activeFilters = array();


/**
**An ordering consists of a PROPERTY and an ORDER_DIRECTION.
**/
	private $activeOrdering = array();





/**
**name self::__construct()
**description Constructor for new CSearchFilter objects. Define our variables, parse $_GET and $_POST
**/
	public function __construct()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		// Initialize variables
		// template-values for mysql queries
		$this->SQLREPLACE = array(
			'MYVAR_OPERATOR' => "MYVAR_OPERATOR",
			'MYVAR_VALUE' => "MYVAR_VALUE");

		// search direction
		$this->ORDER_DIRECTION = array(
			'ASC' => array(
				'value' => "ASC",
				'name' => $I18N_ascending),
			'DESC' => array(
				'value' => "DESC",
				'name' => $I18N_descending));

		// additional values
		$this->ONLINE = array(
			'SFV_ONLINE_SSH_HTTP' => array(
				'value' => "SFV_ONLINE_SSH_HTTP",
				'name' => $I18N_online_ssh_http,
				'img' => "/gfx/status/green.png",
				'sql' => "2"),
			'SFV_ONLINE' => array(
				'value' => "SFV_ONLINE",
				'name' => $I18N_online,
				'img' => "/gfx/status/greenred.png",
				'sql' => "1"),
			'SFV_OFFLINE' => array(
				'value' => "SFV_OFFLINE",
				'name' => $I18N_offline,
				'img' => "/gfx/status/red.png",
				'sql' => "0"));

		$this->STATUS = array(
			'SFV_STATUS_RED' => array(
				'value' => "SFV_STATUS_RED",
				'name' => $I18N_status_red,
				'img' => "/gfx/status/red.png",
				'sql' => "0"),
			'SFV_STATUS_YELLOW' => array(
				'value' => "SFV_STATUS_YELLOW",
				'name' => $I18N_status_yellow,
				'img' => "/gfx/status/yellow.png",
				'sql' => "1"),
			'SFV_STATUS_GREEN' => array(
				'value' => "SFV_STATUS_GREEN",
				'name' => $I18N_status_green,
				'img' => "/gfx/status/green.png",
				'sql' => "2"),
			'SFV_STATUS_BLUE' => array(
				'value' => "SFV_STATUS_BLUE",
				'name' => $I18N_status_blue,
				'img' => "/gfx/status/blue.png",
				'sql' => "3"),
			'SFV_STATUS_CRITICAL' => array(
				'value' => "SFV_STATUS_CRITICAL",
				'name' => $I18N_status_critical,
				'img' => "/gfx/status/critical.png",
				'sql' => "4"),
			'SFV_STATUS_DEFINE' => array(
				'value' => "SFV_STATUS_DEFINE",
				'name' => $I18N_status_define,
				'img' => "/gfx/status/white.png",
				'sql' => "5"),
			'SFV_STATUS_BLOCKED' => array(
				'value' => "SFV_STATUS_BLOCKED",
				'name' => $I18N_status_blocked,
				'img' => "/gfx/status/blocked.png",
				'sql' => "6"));


		// value types defining which GUI-elements to use for properties
		$this->VALUETYPE = array(
			'SELECTION' => "SELECTION",
			'IMGSELECTION' => "IMGSELECTION",
			'DATALIST' => "DATALIST",
			'EDIT' => "EDIT",
			'DATETIME' => "DATETIME",
			'VT_DEFAULT' => "DEFAULT");

		// these are the classes of operators that can be used across properties
		$this->OPERATOR_GENERAL = array(
			'SFO_EQUALS' => array(
				'value' => "SFO_EQUALS",
				'name' => "=",
				'sql' => "REGEXP",
				'sql_vprefix' => "^",
				'sql_vpostfix' => "$",
				'sql_gc_vprefix' => "(^|,)",
				'sql_gc_vpostfix' => "(,|$)"),
			'SFO_UNEQUALS' => array(
				'value' => "SFO_UNEQUALS",
				'name' => "!=",
				'sql' => "NOT REGEXP",
				'sql_vprefix' => "^",
				'sql_vpostfix' => "$",
				'sql_gc_vprefix' => "(^|,)",
				'sql_gc_vpostfix' => "(,|$)"));
		$this->OPERATOR_NUMBER = array(
			'SFO_LESS_THAN' => array(
				'value' => "SFO_LESS_THAN",
				'name' => "<",
				'sql' => "<"),
			'SFO_LESS_THAN_EQUALS' => array(
				'value' => "SFO_LESS_THAN_EQUALS",
				'name' => "<=",
				'sql' => "<="),
			'SFO_GREATER_THAN' => array(
				'value' => "SFO_GREATER_THAN",
				'name' => ">",
				'sql' => ">"),
			'SFO_GREATER_THAN_EQUALS' => array(
				'value' => "SFO_GREATER_THAN_EQUALS",
				'name' => ">=",
				'sql' => ">="));
		$this->OPERATOR_DATE = array(
			'SFO_BEFORE' => array(
				'value' => "SFO_BEFORE",
				'name' => $I18N_before,
				'sql' => "<"),
			'SFO_BEFORE_EQUALS' => array(
				'value' => "SFO_BEFORE_EQUALS",
				'name' => $I18N_before_equals,
				'sql' => "<="),
			'SFO_AFTER' => array(
				'value' => "SFO_AFTER",
				'name' => $I18N_after,
				'sql' => ">"),
			'SFO_AFTER_EQUALS' => array(
				'value' => "SFO_AFTER_EQUALS",
				'name' => $I18N_after_equals,
				'sql' => ">="));
		$this->OPERATOR_TEXT = array(
			'SFO_BEGINS_WITH' => array(
				'value' => "SFO_BEGINS_WITH",
				'name' => $I18N_begins_with,
				'sql' => "REGEXP",
				'sql_vprefix' => "^",
				'sql_gc_vprefix' => "(^|,)"),
			'SFO_NOT_BEGINS_WITH' => array(
				'value' => "SFO_NOT_BEGINS_WITH",
				'name' => $I18N_not_begins_with,
				'sql' => "NOT REGEXP",
				'sql_vprefix' => "^",
				'sql_gc_vprefix' => "(^|,)"),
			'SFO_ENDS_WITH' => array(
				'value' => "SFO_ENDS_WITH",
				'name' => $I18N_ends_with,
				'sql' => "REGEXP",
				'sql_vpostfix' => "$",
				'sql_gc_vpostfix' => "(,|$)"),
			'SFO_NOT_ENDS_WITH' => array(
				'value' => "SFO_NOT_ENDS_WITH",
				'name' => $I18N_not_ends_with,
				'sql' => "NOT REGEXP",
				'sql_vpostfix' => "$",
				'sql_gc_vpostfix' => "(,|$)"),
			'SFO_CONTAINS' => array(
				'value' => "SFO_CONTAINS",
				'name' => $I18N_contains,
				'sql' => "REGEXP"),
			'SFO_NOT_CONTAINS' => array(
				'value' => "SFO_NOT_CONTAINS",
				'name' => $I18N_not_contains,
				'sql' => "NOT REGEXP"));
		$this->ALLOPERATORS = $this->OPERATOR_GENERAL + $this->OPERATOR_NUMBER + $this->OPERATOR_TEXT + $this->OPERATOR_DATE;

		/**
		** The whole magic happens here. The PROPERTY-Array ties together all information that is neccessary to
		**  * display the property
		**  * search for it in the m23 database
		**  * check the user input
		**
		** To add a new property, fill in various fields as explained below:
		**
		** key: SFP_<yourUniquePropertyName>
		**
		** parameter		description							use		example
		** value		unique name of the property					mandatory	SFP_TEST
		** name			localized name of the property					mandatory	$I18N_test
		** operators		operators that work with the property (see $this->OPERATOR_*)	mandatory	$this->OPERATOR_GENERAL + $this->OPERATOR_TEXT
		** value_type		GUI-element for property (see $this->VALUETYPE)			mandatory	$this->VALUETYPE['SELECTION']
		** possible_values	An assoc. array containing value as key,  description as value	optional	HELPER_array2AssociativeArray(CLIENT_getNames())
		** value_images		An array containing paths to images				optional	array_column($this->STATUS, "img")
		** sql_where
		**  XOR			parameterized sql where/having clause				mandatory	clients.id MYVAR_OPERATOR MYVAR_VALUE
		** sql_having
		** sql_columns		if additional mysql columns are needed				optional	GROUP_CONCAT(DISTINCT groups.groupname) AS groupnames
		** sql_join		if you have to join to get the column holding your property	optional	LEFT JOIN clientgroups ON clients.id = clientgroups.clientid LEFT JOIN groups ON clientgroups.groupid = groups.id
		** sql_groupby		if you need to squeeze columns together (you probably want	optional	clients.id
		**			to use GROUP_CONCAT then
		** fw_check		check for the user input in the value field			mandatory	CC_clientname
		**/
		$fixed_properties = array(
			'SFP_DEFAULT' => array(
				'value' => "SFP_DEFAULT",
				'name' => " - $I18N_property - ",
				'value_type' => $this->VALUETYPE['VT_DEFAULT']),
			'SFP_STATUS' => array(
				'value' => "SFP_STATUS",
				'name' => $I18N_status,
				'operators' => $this->OPERATOR_GENERAL,
				'value_type' => $this->VALUETYPE['IMGSELECTION'],
				'possible_values' => array_column($this->STATUS, "name", "sql"),
				'value_images' => array_column($this->STATUS, "img"),
				'sql_where' => "clients.status MYVAR_OPERATOR MYVAR_VALUE",
				'fw_check' => CC_status),
			'SFP_CLIENT' => array(
				'value' => "SFP_CLIENT",
				'name' => $I18N_client_name,
				'operators' => $this->OPERATOR_GENERAL + $this->OPERATOR_TEXT,
				'value_type' => $this->VALUETYPE['DATALIST'],
				'possible_values' => HELPER_array2AssociativeArray(CLIENT_getNames()),
				'sql_where' => "clients.client MYVAR_OPERATOR MYVAR_VALUE",
				'fw_check' => CC_clientname),
			'SFP_ID' => array(
				'value' => "SFP_ID",
				'name' => $I18N_id,
				'operators' => $this->OPERATOR_GENERAL + $this->OPERATOR_NUMBER,
				'value_type' => $this->VALUETYPE['DATALIST'],
				'possible_values' => HELPER_array2AssociativeArray(CLIENT_getIds()),
				'sql_where' => "clients.id MYVAR_OPERATOR MYVAR_VALUE",
				'fw_check' => CC_id),
			'SFP_GROUP' => array(
				'value' => "SFP_GROUP",
				'name' => $I18N_group,
				'operators' => $this->OPERATOR_GENERAL + $this->OPERATOR_TEXT,
				'value_type' => $this->VALUETYPE['DATALIST'],
				'possible_values' => HELPER_array2AssociativeArray(GRP_listGroups()),
				'sql_columns' => "GROUP_CONCAT(DISTINCT groups.groupname) AS groupnames",
				'sql_join' => "LEFT JOIN clientgroups ON clients.id = clientgroups.clientid LEFT JOIN groups ON clientgroups.groupid = groups.id",
				'sql_groupby' => "clients.id",
				'sql_having' => "groupnames MYVAR_OPERATOR MYVAR_VALUE",
				'fw_check' => CC_groupname),
			'SFP_WAITING_JOBS' => array(
				'value' => "SFP_WAITING_JOBS",
				'name' => $I18N_waitingjobsTitle,
				'operators' => $this->OPERATOR_GENERAL + $this->OPERATOR_NUMBER,
				'value_type' => $this->VALUETYPE['EDIT'],
				'sql_columns' => "(SELECT COUNT(*) FROM clientjobs WHERE clientjobs.client = clients.client AND clientjobs.status = 'waiting') AS waitingjobs",
				'sql_having' => "waitingjobs MYVAR_OPERATOR MYVAR_VALUE",
				'fw_check' => CC_id), // TODO add correct check
			'SFP_TOTAL_JOBS' => array(
				'value' => "SFP_TOTAL_JOBS",
				'name' => $I18N_totaljobs,
				'operators' => $this->OPERATOR_GENERAL + $this->OPERATOR_NUMBER,
				'value_type' => $this->VALUETYPE['EDIT'],
				'sql_columns' => "(SELECT COUNT(*) FROM clientjobs WHERE clientjobs.client = clients.client) AS totaljobs",
				'sql_having' => "totaljobs MYVAR_OPERATOR MYVAR_VALUE",
				'fw_check' => CC_id), // TODO add correct check
			'SFP_INST_DATE' => array(
				'value' => "SFP_INST_DATE",
				'name' => $I18N_install_date,
				'operators' => $this->OPERATOR_GENERAL + $this->OPERATOR_DATE,
				'value_type' => $this->VALUETYPE['DATETIME'],
				'sql_where' => "clients.installdate MYVAR_OPERATOR MYVAR_VALUE",
				'fw_check' => CC_clientname), // TODO add correct check
			'SFP_IP' => array(
				'value' => "SFP_IP",
				'name' => $I18N_ip,
				'operators' => $this->OPERATOR_GENERAL + $this->OPERATOR_TEXT,
				'value_type' => $this->VALUETYPE['DATALIST'],
				'possible_values' => HELPER_array2AssociativeArray(CLIENT_getClientIPArray()),
				'sql_where' => "clients.ip MYVAR_OPERATOR MYVAR_VALUE",
				'fw_check' => CC_ip),
			'SFP_LAST_CHANGE_DATE' => array(
				'value' => "SFP_LAST_CHANGE_DATE",
				'name' => $I18N_last_change,
				'operators' => $this->OPERATOR_GENERAL + $this->OPERATOR_DATE,
				'value_type' => $this->VALUETYPE['DATETIME'],
				'sql_where' => "clients.lastmodify MYVAR_OPERATOR MYVAR_VALUE",
				'fw_check' => CC_clientname)); // TODO add correct check
		$optional_properties = array(
			'SFP_ONLINE' => array(
				'value' => "SFP_ONLINE",
				'name' => $I18N_onlineStatus,
				'operators' => $this->OPERATOR_GENERAL,
				'value_type' => $this->VALUETYPE['IMGSELECTION'],
				'possible_values' => array_column($this->ONLINE, "name", "sql"),
				'value_images' => array_column($this->ONLINE, "img"),
				'sql_where' => "clients.online MYVAR_OPERATOR MYVAR_VALUE",
				'fw_check' => CC_status)); // TODO add extra check?
		//m23customPatchBegin type=change id=__constructCustomProperties
		$custom_properties = array();
		//m23customPatchEnd id=__constructCustomProperties
		if(SERVER_isClientOnlineStatusEnabled())
			$this->PROPERTY = $fixed_properties + $optional_properties + $custom_properties;
		else
			$this->PROPERTY = $fixed_properties + $custom_properties;

		// by default we don't have any filters
		$this->activeFilters = array();
		// our default ordering
		$this->activeOrdering = array('ordering' => $this->PROPERTY['SFP_CLIENT']['value'], 'orderDirection' => $this->ORDER_DIRECTION['ASC']['value']);

		// check $_POST and fill the searchFilter-Object with its content
		// I cannot get element values from HTML_* methods, because they are generically generated through js.
		if (!$this->loadFilterFromGet()) {
			$propertyKeys = preg_grep("/SEL_PROPERTY/", array_keys($_POST));
			foreach ($propertyKeys as $propertyKey) {
				preg_match('/[\d]+/', $propertyKey, $match);
				$htmlIdCounter = $match[0];
				if (array_key_exists("SEL_PROPERTY$htmlIdCounter", $_POST) && array_key_exists("SEL_OPERATOR$htmlIdCounter", $_POST) && array_key_exists("VALUE$htmlIdCounter", $_POST))
					$this->addFilter($_POST["SEL_PROPERTY$htmlIdCounter"], $_POST["SEL_OPERATOR$htmlIdCounter"], $_POST["VALUE$htmlIdCounter"]);
			}
		}
		if (!empty($_POST['SEL_ORDERING']) && !empty($_POST['SEL_ORDER_DIRECTION']))
			$this->setOrdering($_POST['SEL_ORDERING'], $_POST['SEL_ORDER_DIRECTION']);
	}





/**
**name CSearchFilter::showSearchFilterDialog()
**description Displays the GUI-elements for the Search filter dialogue. We already have our data ready from the constructor
**/
	public function showSearchFilterDialog()
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		// generate (generic) js.
		$this->generateSearchFilterDialogJsPre();

		// generate GUI-Elements based on that content
		$htmlIdCounter = 0;

		// to I18N?
// 		echo("ATTENTION: The searchfilter below is experimental.</br>");
		HTML_showTableHeader();
		echo("<tr><td>");

		echo("<span class=\"subhighlight\">$I18N_filter</span>");

		echo("<table width=100% style=\"border-bottom: solid 1px;\">");
		foreach ($this->activeFilters as $filter) {
			$this->generateFilterLine($filter['property'], $filter['operator'], $filter['value'], $htmlIdCounter);
			$htmlIdCounter++;
		}
		$this->generateFilterLine($this->PROPERTY['SFP_DEFAULT']['value'], "", "", $htmlIdCounter);
		echo("</table>");

		echo("<span class=\"subhighlight\">$I18N_sorting</span>");

		echo("<table width=100% style=\"border-bottom: solid 1px;\"><tr>");
		HTML_Selection("SEL_ORDERING", array_column($this->PROPERTY, 'name', 'value'), SELTYPE_selection, true, $this->activeOrdering['ordering'], false, "", false, true);
		HTML_Selection("SEL_ORDER_DIRECTION", array_column($this->ORDER_DIRECTION, 'name', 'value'), SELTYPE_selection, true, $this->activeOrdering['orderDirection'], false, "", false, true);
		echo("<tr><td>".SEL_ORDERING."</td><td>".SEL_ORDER_DIRECTION."</td><td width=100%</td></tr>");
		echo("</tr></table>");

		echo("<table align='center'><tr>");
		HTML_submit("BUT_search", $I18N_search);
		echo("<td>".BUT_search."</td>");
		echo("</tr></table>");

		echo("</td></tr>");
		HTML_showTableEnd();
	}





/**
** name CSearchFilter::getClientsAsMySQLResult()
** description Builds and executes an mysql-query based on the data we read in the constructor (from $_POST or $_GET)
**/
	public function getClientsAsMySQLResult()
	{
		// possible pre-definitions
		$sqlcolumnsArr = array("clients.*");
		$sqljoinArr = array();
		$where = "";
		$whereClauseArr = array();
		$whereClause = "";
		$groupby = "";
		$groupbyClause = "";
		$groupbyClauseArr = array();
		$having = "";
		$havingClauseArr = array();
		$havingClause = "";
		$orderbyClauseArr = array();

		// build Arrays for where/groupby/having/orderby clauses and joins
		foreach ($this->activeFilters as $filter) {
			// add additional columns and joins if necessary
			if (!empty($this->PROPERTY[$filter['property']]['sql_columns']))
				$sqlcolumnsArr[] = $this->PROPERTY[$filter['property']]['sql_columns'];
			if (array_key_exists('sql_join', $this->PROPERTY[$filter['property']]))
				$sqljoinArr[] = $this->PROPERTY[$filter['property']]['sql_join'];

			// this is sql for the operator we'll use
			$sqlreplacewith = array();
			$sqlreplacewith['operator'] = $this->ALLOPERATORS[$filter['operator']]['sql'];

			// some values have to be translated to according database values
			if ($filter['property'] == $this->PROPERTY['SFP_INST_DATE']['value'] ||
					$filter['property'] == $this->PROPERTY['SFP_LAST_CHANGE_DATE']['value']) {
				// we've got a date to check
				$sqlreplacewith['value'] = date_timestamp_get(date_create_from_format('Y-m-d H:i', $filter['value']));
			} else {
				$sqlreplacewith['value'] = $filter['value'];
			}

			// for some operators the values have to me modified. e.g. ^value or value$
			if (preg_match("/GROUP_CONCAT/i", implode($sqlcolumnsArr, " "))) {
				if (array_key_exists('sql_gc_vprefix', $this->ALLOPERATORS[$filter['operator']]))
					$sqlreplacewith['value'] = $this->ALLOPERATORS[$filter['operator']]['sql_gc_vprefix'].$sqlreplacewith['value'];
				if (array_key_exists('sql_gc_vpostfix', $this->ALLOPERATORS[$filter['operator']]))
					$sqlreplacewith['value'] = $sqlreplacewith['value'].$this->ALLOPERATORS[$filter['operator']]['sql_gc_vpostfix'];
			} else {
				if (array_key_exists('sql_vprefix', $this->ALLOPERATORS[$filter['operator']]))
					$sqlreplacewith['value'] = $this->ALLOPERATORS[$filter['operator']]['sql_vprefix'].$sqlreplacewith['value'];
				if (array_key_exists('sql_vpostfix', $this->ALLOPERATORS[$filter['operator']]))
					$sqlreplacewith['value'] = $sqlreplacewith['value'].$this->ALLOPERATORS[$filter['operator']]['sql_vpostfix'];
			}

			// put your value in quotes
			$sqlreplacewith['value'] = "'".$sqlreplacewith['value']."'";

			// assuming where and having are exclusive
			if (!empty($this->PROPERTY[$filter['property']]['sql_where']))
				$whereClauseArr[] = str_replace($this->SQLREPLACE, $sqlreplacewith, $this->PROPERTY[$filter['property']]['sql_where']);
			else
				$havingClauseArr[] = str_replace($this->SQLREPLACE, $sqlreplacewith, $this->PROPERTY[$filter['property']]['sql_having']);

			if (!empty($this->PROPERTY[$filter['property']]['sql_groupby']))
				$groupbyClauseArr[] = $this->PROPERTY[$filter['property']]['sql_groupby'];
		}

		// If we just want to sort, we could also need some extra columns, joins or groupings
		if (!empty($this->PROPERTY[$this->activeOrdering['ordering']]['sql_columns']))
			$sqlcolumnsArr[] = $this->PROPERTY[$this->activeOrdering['ordering']]['sql_columns'];
		if (!empty($this->PROPERTY[$this->activeOrdering['ordering']]['sql_join']))
			$sqljoinArr[] = $this->PROPERTY[$this->activeOrdering['ordering']]['sql_join'];
		if (!empty($this->PROPERTY[$this->activeOrdering['ordering']]['sql_groupby']))
				$groupbyClauseArr[] = $this->PROPERTY[$this->activeOrdering['ordering']]['sql_groupby'];
		if (!empty($this->PROPERTY[$this->activeOrdering['ordering']]['sql_where']))
			$orderbyClauseArr[] = explode(" ", $this->PROPERTY[$this->activeOrdering['ordering']]['sql_where'])[0]." ".$this->activeOrdering['orderDirection'];
		else
			$orderbyClauseArr[] = explode(" ", $this->PROPERTY[$this->activeOrdering['ordering']]['sql_having'])[0]." ".$this->activeOrdering['orderDirection'];

		// bringing it together, disassemble arrays
		// No uniqueness has to be checked for where, having and order by. Duplicates are already eliminated by $this->addFilter and
		// order by behaves correctly for cases like "col1 ASC, col1 DESC"
		$sqlcolumns = implode(array_unique($sqlcolumnsArr), ", ");
		$sqljoin = implode(array_unique($sqljoinArr), " ");
		if (!empty($whereClauseArr)) {
			$where = "WHERE";
			$whereClause = implode($whereClauseArr, " AND ");
		}
		if (!empty($groupbyClauseArr)) {
			$groupby = "GROUP BY";
			$groupbyClause = implode(array_unique($groupbyClauseArr), ", ");
		}
		if (!empty($havingClauseArr)) {
			$having = "HAVING";
			$havingClause = implode($havingClauseArr, " AND ");
		}
		if (!empty($orderbyClauseArr))
			$orderbyClause = implode($orderbyClauseArr, ", ");
		else
			$orderbyClause = "clients.client ASC";

		$sql = "SELECT $sqlcolumns FROM clients $sqljoin $where $whereClause $groupby $groupbyClause $having $havingClause ORDER BY $orderbyClause";
		return(DB_query($sql));
	}





/**
** name CSearchFilter::generateFilterLine($selectedProperty, $selectedOperator, $value, $htmlIdCounter)
** description Generates HTML: <tr> containing one filter line.
** parameter selectedProperty: property that shall be selected
** parameter selectedOperator: operator that shall be selected
** parameter value value: that shall be selected
** parameter htmlIdCounter: We're displayint the n'th row
**/
	private function generateFilterLine($selectedProperty, $selectedOperator, $value, $htmlIdCounter) {
		$this->generatePropertyList($selectedProperty, $htmlIdCounter);
		$this->generateOperatorList($selectedProperty, $selectedOperator, $value, $htmlIdCounter);
		$this->generateButtons($selectedProperty, $htmlIdCounter);
		echo("<tr><td>".constant("SEL_PROPERTY$htmlIdCounter").
			"</td><td>".constant("SEL_OPERATOR$htmlIdCounter").
			"</td><td>".constant("VALUE$htmlIdCounter").
			"</td><td>".constant("BUT_REMFILTER$htmlIdCounter")."</td></tr>\n");
	}





/**
** name CSearchFilter::generateButtons($selectedProperty, $htmlIdCounter)
** description Defines HTML: The remove button
** parameter htmlIdCounter: We're displayint the n'th row
**/
	private function generateButtons($selectedProperty, $htmlIdCounter) {
		// do something
		if ($selectedProperty == $this->PROPERTY['SFP_DEFAULT']['value'])
			$hideRemButtonHtml = 'style="visibility: hidden;"';
		else
			$hideRemButtonHtml = '';
			
		HTML_button("BUT_REMFILTER$htmlIdCounter", "-", "", "onclick=remFilterRule(this) $hideRemButtonHtml");
	}





/**
** name CSearchFilter::generatePropertyList($selectedProperty, $htmlIdCounter)
** description Defines HTML: The property-select.
** parameter selectedProperty: property that shall be selected
** parameter htmlIdCounter: We're displayint the n'th row
**/
	private function generatePropertyList($selectedProperty, $htmlIdCounter)
	{
		HTML_Selection("SEL_PROPERTY$htmlIdCounter", array_column($this->PROPERTY, 'name', 'value'), SELTYPE_selection, true, $selectedProperty, false, "onchange=\"generateOperatorList(this)\"", false, true);
	}





/**
** name CSearchFilter::generateSearchFilterDialogJsPre()
** description Generates JavaScript: All we need to add new filter lines or remove then etc.
**/
	private function generateSearchFilterDialogJsPre()
	{
		/*
			Den ganzen Käse hier könnte man statisch in ein File packen. nur:
			Wenn der Filter um Attribute erweitert wird muss das File auch angefasst werden.
			Aktuell wird es generisch gleich mit geändert.
			Man könnte sich aber überlegen nur die generischen Teile hier zu behandeln.
		*/
		echo('
			<script language="javascript">

			var filterRuleId = 0;

			function addElement(parentId, elementTag, elementId, html) {
				// Adds an element to the document
				var p = document.getElementById(parentId);
				var newElement = document.createElement(elementTag);
				newElement.setAttribute("id", elementId);
				newElement.innerHTML = html;
				p.appendChild(newElement);
			}

			function removeElement(elementId) {
				// Removes an element from the document
				var element = document.getElementById(elementId);
				element.parentNode.removeChild(element);
			}

			function overwriteElement(elementId, html) {
				var element = document.getElementById(elementId);
				var idType = elementId.match(/[a-zA-Z]+/);
				var parentNode = element.parentNode;
				while (parentNode.firstChild) {
					parentNode.removeChild(parentNode.firstChild);
				}
				var regexObj = new RegExp(idType + ".*?\"", "g");
				html = html.replace(regexObj, elementId + "\"");
				parentNode.insertAdjacentHTML("beforeend", html);
				//addElement(parentId, elementTag, elementId, html);
			}

			function shiftRulesIDs(tBody, targetIdC) {
				var targetPropertyId = "SEL_PROPERTY" + targetIdC;
				for (i = tBody.rows.length - 1; i >= 0; --i) {
					currentPropertyId = tBody.rows[i].querySelector(\'[id^="SEL_PROPERTY"]\').id;
					currentIdC = currentPropertyId.match(/\\d+/g).map(Number)[0];
					if ( currentIdC > targetIdC ) {
						elementsToShift = tBody.rows[i].querySelectorAll(\'[id]\');
						for (j=0; j<elementsToShift.length; ++j) {
							if ( typeof elementsToShift[j].id !== "undefined") {
								elementsToShift[j].id = elementsToShift[j].id.replace(/(\\d+)/g,function(match,number){return parseInt(number) - 1});
							}
							if ( typeof elementsToShift[j].name !== "undefined") {
								elementsToShift[j].name = elementsToShift[j].name.replace(/(\\d+)/g,function(match,number){return parseInt(number) - 1});
							}
						}
					}
				}
			}

			function addFilterRule(element) {
				newFilterRuleId = element.id.replace(/(\\d+)/g,function(match,number){return parseInt(number) + 1});
				newFilterRuleIdC = newFilterRuleId.match(/\\d+/g).map(Number)[0];
				var allFilterRules = element.closest("tbody");
				for (i=0; i<allFilterRules.rows.length; ++i) {
					allFilterRules.rows[i].querySelector(\'[id^="BUT_REMFILTER"]\').style.visibility = "";
				}

				newFilterRuleRowIndex = element.closest("tr").rowIndex + 1;
				trFilterRule = allFilterRules.parentNode.insertRow(newFilterRuleRowIndex);

				tdProperty = document.createElement("td");
				selProperty = document.createElement("select");
				selProperty.setAttribute("id", "SEL_PROPERTY" + newFilterRuleIdC);
				selProperty.setAttribute("name", "SEL_PROPERTY" + newFilterRuleIdC);
				selProperty.setAttribute("onchange", "generateOperatorList(this)");');
				foreach (array_column($this->PROPERTY, 'name', 'value') as $name => $value)
					echo('selProperty.options.add(new Option("'.$value.'", "'.$name.'"));'."\n");
				echo('
				tdProperty.appendChild(selProperty);

				tdOperator = document.createElement("td");
				selOperator = document.createElement("select");
				selOperator.setAttribute("id", "SEL_OPERATOR" + newFilterRuleIdC);
				selOperator.setAttribute("name", "SEL_OPERATOR" + newFilterRuleIdC);
				selOperator.setAttribute("style", "display: none;");
				tdOperator.appendChild(selOperator);

				tdValue = document.createElement("td");
				divValue = document.createElement("div");
				divValue.setAttribute("id", "VALUE" + newFilterRuleIdC);
				divValue.setAttribute("name", "VALUE" + newFilterRuleIdC);
				tdValue.appendChild(divValue);

				tdRemFilterRule = document.createElement("td");
				butRemFilterRule = document.createElement("button");
				butRemFilterRule.setAttribute("id", "BUT_REMFILTER" + newFilterRuleIdC);
				butRemFilterRule.setAttribute("name", "BUT_REMFILTER" + newFilterRuleIdC);
				butRemFilterRule.setAttribute("type", "button");
				butRemFilterRule.setAttribute("value", "");
				butRemFilterRule.setAttribute("onclick", "remFilterRule(this)");
				butRemFilterRule.setAttribute("style", "visibility: hidden;");
				butRemFilterRule.innerHTML = "-";
				tdRemFilterRule.appendChild(butRemFilterRule);

				trFilterRule.appendChild(tdProperty);
				trFilterRule.appendChild(tdOperator);
				trFilterRule.appendChild(tdValue);
				trFilterRule.appendChild(tdRemFilterRule);

				//generateOperatorList(selProperty); //SFO_DEFAULT hart kodiert
			}

			function remFilterRule(element) {
				var filterRuleIdC = element.id.match(/\\d+/g).map(Number)[0];
                                var filterRule = element.closest("tr");
				var allFilterRules = element.closest("tbody");
				filterRule.parentNode.removeChild(filterRule);
				shiftRulesIDs(allFilterRules, filterRuleIdC);
			}

			function generateOperatorList(selProperty) {
				var property = selProperty.value;
				var selOperator = selProperty.closest("tr").querySelector(\'[id^="SEL_OPERATOR"]\');
				var valueId = selProperty.closest("tr").querySelector(\'[id^="VALUE"]\').id;
				var i;
				for(i = selOperator.options.length - 1 ; i >= 0 ; i--)
				{
					selOperator.remove(i);
				}
				switch(property) {'."\n"
		);
		$switch_content = '';
		foreach($this->PROPERTY as $property) {
			$propertyName = $property['value'];
			if (array_key_exists('operators', $property))
				$operatorList = array_column($property['operators'], "name", "value");
			else
				$operatorList = array();
			$valueType = $property['value_type'];
			if (array_key_exists('possible_values', $property))
				$possibleValues = $property['possible_values'];
			else
				$possibleValues = array();
			if (!empty($property['value_images']))
				$valueImages = $property['value_images'];
			else
				$valueImages = array();

			$switch_content .= "\t\t\t\t\t".'case "'.$propertyName.'":'."\n";
			if ($propertyName == $this->PROPERTY['SFP_DEFAULT']['value'])
				$switch_content .= "\t\t\t\t\t\t".'selOperator.setAttribute("style", "display: none");'."\n";
			else
				$switch_content .= "\t\t\t\t\t\t".'selOperator.setAttribute("style", "display: block");'."\n";
			foreach($operatorList as $name => $value)
				$switch_content .= "\t\t\t\t\t\t".'selOperator.options.add(new Option("'.$value.'", "'.$name.'"));'."\n";
			$this->defineValueHtml("VALUE$propertyName", $valueType, $possibleValues, $valueImages, false);
			$switch_content .= "\t\t\t\t\t\t".'overwriteElement(valueId, '.json_encode(utf8_encode(constant("VALUE$propertyName"))).');'."\n";
			if ($valueType == $this->VALUETYPE['DATETIME'])
				$switch_content .= "\t\t\t\t\t\t".'var newScript = document.createElement("script");
newScript.setAttribute("type", "text/javascript");
var inlineScript = document.createTextNode(\'$(".date").datePicker(options);\');
newScript.appendChild(inlineScript);
document.getElementById(valueId).parentNode.appendChild(newScript);';
			$switch_content .= "\t\t\t\t\t\t".'break;'."\n";
		}
		echo($switch_content);
		echo('
				}
				if (!selProperty.closest("tr").nextElementSibling) {
					addFilterRule(selProperty)
				}
				$(\'.imgselectmenu\').imgselectmenu();
			}'."

			// options for datetimepicker
			var options = {
				sundayBased: false,
				weekDays: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'],
				months: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember']
					/*readValue: function(element) {
					var dateFormat = 'DD/MM.YYYY';
					var dateParts = {year:'', month:'', day:''};
					for (var i = 0; i < dateFormat.length; i++) {
						switch(dateFormat.charAt(i)) {
							case 'D':
								dateParts['day'] += element.value.charAt(i);
								break;
							case 'M':
								dateParts['month'] += element.value.charAt(i);
								break;
							case 'Y':
								dateParts['year'] += element.value.charAt(i);
								break;
							default:
								if (dateFormat.charAt(i) !== element.value.charAt(i)) {
									return '2018-10-03 00:00'
							}
						}
					}
					var timeParts = element.value.split(' ')[1].split(':');
					//return '1991-04-28';
					return dateParts['year'] + '-' + dateParts['month'] + '-' + dateParts['day'] + ' ' + timeParts[0] + ':' + timeParts[1];
				}*/
			}
			</script>
		");
	}





/**
** name CSearchFilter::generateOperatorList($selectedProperty, $selectedOperator, $value, $htmlIdCounter)
** description Defines HTML: The operator-select.
** parameter selectedProperty: property that shall be selected
** parameter selectedOperator: operator that shall be selected
** parameter value value: that shall be selected
** parameter htmlIdCounter: We're displayint the n'th row
**/
	private function generateOperatorList($selectedProperty, $selectedOperator, $value, $htmlIdCounter)
	{
		$property = $this->PROPERTY[$selectedProperty];
		if (array_key_exists('operators', $property))
			$operatorList = array_column($property['operators'], "name", "value");
		else
			$operatorList = array();

		$valueType = $property['value_type'];

		if (!empty($property['possible_values']))
			$possibleValues = $property['possible_values'];
		else
			$possibleValues = array();

		if (!empty($property['value_images']))
			$valueImages = $property['value_images'];
		else
			$valueImages = array();

		if ($selectedProperty == $this->PROPERTY['SFP_DEFAULT']['value'])
			HTML_Selection("SEL_OPERATOR$htmlIdCounter", $operatorList, SELTYPE_selection, true, false, false, "style=\"display: none\"", false, true);
		else
			HTML_Selection("SEL_OPERATOR$htmlIdCounter", $operatorList, SELTYPE_selection, true, $selectedOperator, false, "", false, true);
		$this->defineValueHtml("VALUE$htmlIdCounter", $valueType, $possibleValues, $valueImages, $value);
	}





/**
** name CSearchFilter::defineValueHtml($htmlId, $valueType, $possibleValues, $value)
** description Defines HTML: The value-element.
** parameter htmlId: The ID of the html element
** parameter valueType: Defines which html element is used
** parameter possibleValues: These values can be used with the value-element
** parameter valueImages: An array containing paths to images for the options of HTMLimgSelection
** parameter value value: that shall be selected
**/
	private function defineValueHtml($htmlId, $valueType, $possibleValues, $valueImages, $value)
	{
		switch($valueType) {
			case $this->VALUETYPE['SELECTION']:
				HTML_Selection($htmlId, $possibleValues, SELTYPE_selection, true, $value, false, "", false, true); break;
			case $this->VALUETYPE['IMGSELECTION']:
				HTML_imgSelection($htmlId, $possibleValues, $valueImages, $value, false, "", true); break;
			case $this->VALUETYPE['DATALIST']:
				HTML_datalist($htmlId, $possibleValues, $value, false, "", true); break;
			case $this->VALUETYPE['EDIT']:
				HTML_input($htmlId, $value, 20, 255, INPUT_TYPE_text, true); break;
			case $this->VALUETYPE['DATETIME']:
				$htmlCode = '
					<input type="text" class="date" id="'.$htmlId.'" name="'.$htmlId.'" data-timeformat="HH:MM" placeholder="YYYY-MM-DD HH:MM" value="'.$value.'" readonly>
					<script type="text/javascript">
							$(".date").datePicker(options);
					</script>
				';
				define($htmlId, $htmlCode);
				break;
			case $this->VALUETYPE['VT_DEFAULT']:
				$htmlCode = '
					<div style="display:none;" id="'.$htmlId.'"></div>
				';
				define($htmlId, $htmlCode);
		}
		
	}





/**
** name CSearchFilter::exists($property, $operator, $value)
** description Checks, if a given search filter already exists in $this->activeFilters
** parameter property: property to check
** parameter operator: operator to check
** parameter value: value to check
**/
	private function exists($property, $operator, $value)
	{
		foreach ($this->activeFilters as $filter)
			if ($filter['property'] === $property && $filter['operator'] === $operator && $filter['value'] === $value)
				return(true);

		// else
		return(false);
	}





/**
** name CSearchFilter::isValidFilter($property, $operator, $value)
** description Checks, if a given search filter is valid (e.g. agains our firewall)
** parameter property: property to check
** parameter operator: operator to check
** parameter value: value to check
**/
	private function isValidFilter($property, $operator, $value)
	{
		// check filter
		if ($property === $this->PROPERTY['SFP_DEFAULT']['value'])
			return(false);

		if (empty($value) && $value != "0")
			return(false);

		// run corresponding check for property
		if (CHECK_FW(true, $this->PROPERTY[$property]['fw_check'], $value) === false)
			return(false);
		// else
		return(true);
	}





/**
** name CSearchFilter::isValidOrdering($property, $orderDirection)
** description Checks, if a given ordering is valid
** parameter property: property for the ordering
** parameter orderDirection: ordered by this direction
**/
	private function isValidOrdering($property, $orderDirection)
	{
		// check ordering
		if ($property === $this->PROPERTY['SFP_DEFAULT']['value']) {
			return(false);
		}
		if (empty($property) || empty($orderDirection)) {
			return(false);
		}

		// else
		return(true);
	}





/**
** name CSearchFilter::addFilter($property, $operator, $value)
** description Adds filter to $this->activeFilters
** parameter property: property to add
** parameter operator: operator to add
** parameter value: value to add
**/
	private function addFilter($property, $operator, $value)
	{
		if (!$this->exists($property, $operator, $value))
			if ($this->isValidFilter($property, $operator, $value))
				$this->activeFilters[] = array('property' => $property, 'operator' => $operator, 'value' => $value);
	}





/**
** name CSearchFilter::setOrdering($property, $orderDirection)
** description Sets ordering
** parameter property: property for the ordering
** parameter orderDirection: ordered by this direction
**/
	private function setOrdering($property, $orderDirection)
	{
		if ($this->isValidOrdering($property, $orderDirection))
			$this->activeOrdering = array('ordering' => $property, 'orderDirection' => $orderDirection);
	}





/**
** name CSearchFilter::loadFilterFromGet()
** description Fills $this->activeFilters from $_GET. Exclusive to $_POST
**/
	private function loadFilterFromGet()
	{
		$didLoadFromGet = false;
		foreach ($_GET as $key => $value) {
			switch($key) {
				//legacy params
				case "orderBy":
					switch ($value) {
						case "status":
							$orderBy=$this->PROPERTY['SFP_STATUS']['value'];
							break;
						case "name":
							$orderBy=$this->PROPERTY['SFP_CLIENT']['value'];
							break;
						case "installdate":
							$orderBy=$this->PROPERTY['SFP_INST_DATE']['value'];
							break;
						case "lastchange":
							$orderBy=$this->PROPERTY['SFP_LAST_CHANGE_DATE']['value'];
							break;
						//case "ip":
						//	$orderBy="";
						//	break;
						//case "mac":
						//	$orderBy="";
						//	break;
					}
					$didLoadFromGet = true;
					break;
				case "direction":
					switch ($value) {
						case "asc":
							$orderDirection = $this->ORDER_DIRECTION['ASC']['value'];
							break;
						case "desc":
							$orderDirection = $this->ORDER_DIRECTION['DESC']['value'];
							break;
					}
					$didLoadFromGet = true;
					break;
				case "action":
					// no_action_selected
					switch ($value) {
						case "setup":
							$this->addFilter($this->PROPERTY['SFP_STATUS']['value'], $this->OPERATOR_GENERAL['SFO_EQUALS']['value'], $this->STATUS['SFV_STATUS_YELLOW']['sql']);
							break;
						case "install":
							$this->addFilter($this->PROPERTY['SFP_STATUS']['value'], $this->OPERATOR_GENERAL['SFO_UNEQUALS']['value'], $this->STATUS['SFV_STATUS_RED']['sql']);
							$this->addFilter($this->PROPERTY['SFP_STATUS']['value'], $this->OPERATOR_GENERAL['SFO_UNEQUALS']['value'], $this->STATUS['SFV_STATUS_YELLOW']['sql']);
							$this->addFilter($this->PROPERTY['SFP_STATUS']['value'], $this->OPERATOR_GENERAL['SFO_UNEQUALS']['value'], $this->STATUS['SFV_STATUS_CRITICAL']['sql']);
							$this->addFilter($this->PROPERTY['SFP_STATUS']['value'], $this->OPERATOR_GENERAL['SFO_UNEQUALS']['value'], $this->STATUS['SFV_STATUS_BLOCKED']['sql']);
							break;
						case "deinstall":
							$this->addFilter($this->PROPERTY['SFP_STATUS']['value'], $this->OPERATOR_GENERAL['SFO_EQUALS']['value'], $this->STATUS['SFV_STATUS_GREEN']['sql']);
							break;
						case "update":
							$this->addFilter($this->PROPERTY['SFP_STATUS']['value'], $this->OPERATOR_GENERAL['SFO_EQUALS']['value'], $this->STATUS['SFV_STATUS_GREEN']['sql']);
							break;
						case "critical":
							$this->addFilter($this->PROPERTY['SFP_STATUS']['value'], $this->OPERATOR_GENERAL['SFO_EQUALS']['value'], $this->STATUS['SFV_STATUS_CRITICAL']['sql']);
							break;
						case "massInstall":
							$this->addFilter($this->PROPERTY['SFP_STATUS']['value'], $this->OPERATOR_GENERAL['SFO_EQUALS']['value'], $this->STATUS['SFV_STATUS_DEFINE']['sql']);
							break;
					}
					$didLoadFromGet = true;
					break;
				case "searchLine":
					// ignore this one.
					$didLoadFromGet = true;
					break;
				case "groupname":
					// name of the group
					$this->addFilter($this->PROPERTY['SFP_GROUP']['value'], $this->OPERATOR_GENERAL['SFO_EQUALS']['value'], $value);
					$didLoadFromGet = true;
					break;
			}
		}
		if (!empty($orderBy) && !empty($orderDirection))
			$this->setOrdering($orderBy, $orderDirection);
		return($didLoadFromGet);
	}
}
