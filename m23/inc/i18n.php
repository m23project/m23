<?php

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: functions for multi language handling in m23.
$*/

const LANGUAGELIST = 'de#en#fr';





/**
**name I18N_getHumanReadableDayHourMinute($in)
**description Converts a combined numeric day and hour/minute string into a human readable day and hour/minute string.
**parameter in: Combined numeric day and hour/minute string
**returns Human readable day and hour/minute string or false in case of conversion error.
**/
function I18N_getHumanReadableDayHourMinute($in)
{
	$weekdayNames = I18N_getWeekDayArray();
	if (HELPER_splitDayHourMinuteString($in, $day, $hour, $minute))
		return($weekdayNames[$day]." $hour:$minute");
	else
		return(false);
}





/**
**name I18N_getWeekDayArray()
**description Generates an array with all week days as value and week day numbers as keys (Monday = 1, Sunday = 7).
**returns Array with all week days.
**/
function I18N_getWeekDayArray()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	// Create an array with all weekdays
	$weekDays = array();
	$weekDays[1] = $I18N_Monday;
	$weekDays[2] = $I18N_Tuesday;
	$weekDays[3] = $I18N_Wednesday;
	$weekDays[4] = $I18N_Thursday;
	$weekDays[5] = $I18N_Friday;
	$weekDays[6] = $I18N_Saturday;
	$weekDays[7] = $I18N_Sunday;

	return($weekDays);
}





/**
**name I18N_number_format($in)
**description Converts numbers to the language specific number formating.
**parameter in: Input number.
**returns Language specific number formated number.
**/
function I18N_number_format($in)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	return(number_format($in, 2, $I18Nnumber_format_dec_point, $I18Nnumber_format_thousands_sep));
}





/**
**name I18N_convertToHumanReadableName($lang)
**description Converts a short language into a human readable name.
**parameter lang: Two letter TLD (or longer code for countries that have more than a language (e.g. be-nl, be-fr))
**returns Language in human readable notation.
**/
function I18N_convertToHumanReadableName($lang)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Check that the languages are cached in the DB
	I18N_cacheClientLanguages();

	//Get the short and (translated) longanames
	$res = DB_query("SELECT * FROM `i18n` WHERE webinterface = 'c' AND ShortLanguage = '$lang'");
	$l = mysqli_fetch_assoc($res);
	return(isset(${$l['LongLanguage']}) ? ${$l['LongLanguage']} : '');
}





/**
**name I18N_m23instLanguage($shortLanguage)
**description Checks if a m23inst.php exists for the given language and returns "en" if not.
**parameter shortLanguage: Two letter TLD (or longer code for countries that have more than a language (e.g. be-nl, be-fr))
**returns Language code with available m23inst.php file.
**/
function I18N_m23instLanguage($shortLanguage)
{
	if (strpos(LANGUAGELIST,$shortLanguage) === false)
//m23customPatchBegin type=change id=I18N_m23instLanguageFallBackLanguage
		$shortLanguage = 'en';
//m23customPatchEnd id=I18N_m23instLanguageFallBackLanguage

	return($shortLanguage);
}





/**
**name I18N_addLanguage($webinterface, $shortLanguage, $longLanguage, $country, $lang, $keymap, $xkeyboard, $kdekeyboard, $locale, $kdekeyboards, $timezone, $packagelang)
**description Adds a new language to the i18n table.
**parameter webinterface: Set to true, if it is a webinterface language. Set to false, for marking a client language.
**parameter shortLanguage: Two letter TLD (or longer code for countries that have more than a language (e.g. be-nl, be-fr))
**parameter longLanguage: Long human readable country/language name.
**parameter country: Two letter TLD.
**parameter lang: Locale setting (e.g. for locale and KDM)
**parameter keymap: Available keymaps for the console etc.
**parameter xkeyboard: X11 keybord setting.
**parameter kdekeyboard: Language setting for the KDE keyboard.
**parameter locale: List of locales (seperated by newlines) for the locale tool.
**parameter kdekeyboards: List of additional KDE keyboards (seperated by commata).
**parameter timezone: The timezone matching the language.
**parameter packagelang: Language suffix that is added to the packages (e.g. language-pack-gnome-XX)
**/
function I18N_addLanguage($webinterface, $shortLanguage, $longLanguage, $country, $lang, $keymap, $xkeyboard, $kdekeyboard, $locale, $kdekeyboards, $timezone, $packagelang)
{
	//If it's a webinterface language, set the value to 'w'. Otherwise it's a client language, marked by a 'c'.
	$webinterface = ($webinterface ? 'w' : 'c');	

	if ($_SESSION['m23Shared'] === true)
		$DB_list = array('m23shared_'.$_SESSION['m23Shared_DB']);
	else
		$DB_list = array('m23','m23captured');

	foreach ($DB_list as $db)
	{
		DB_query("INSERT INTO `$db`.`i18n` (`webinterface`, `ShortLanguage`, `LongLanguage`, `country`, `lang`, `keymap`, `xkeyboard`, `kdekeyboard`, `locale`, `kdekeyboards`, `timezone`, `packagelang`) VALUES ('$webinterface', '$shortLanguage', '$longLanguage', '$country', '$lang', '$keymap', '$xkeyboard', '$kdekeyboard', '$locale', '$kdekeyboards', '$timezone', '$packagelang');");
	}
}





/**
**name I18N_listClientLanguages($default, $directOutputtedSelection = true)
**description Lists all languages, the m23 clients can be installed with.
**parameter default: the language that should be shown first
**parameter directOutputtedSelection: Set to true, if the selection should be shown instead of returned.
**/
function I18N_listClientLanguages($default, $directOutputtedSelection = true)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	//Check that the languages are cached in the DB
	I18N_cacheClientLanguages();

	//Get the short and (translated) longanames
	$res = DB_query("SELECT * FROM `i18n` WHERE webinterface = 'c'");
	while ($lang = mysqli_fetch_assoc($res))
		$langA[$lang['ShortLanguage']] = ${$lang['LongLanguage']};

	//Sort by the translated labels
	asort($langA);

	return($langA);
}





/**
**name I18N_countCachedLanguages($webinterface)
**description Counts the cached languages for a type.
**parameter webinterface: Set to true, if it is a webinterface language. Set to false, for marking a client language.
**return Amount of found languages for the language type.
**/
function I18N_countCachedLanguages($webinterface)
{
	$webinterface = ($webinterface ? 'w' : 'c');
	$res = DB_query("SELECT COUNT(*) FROM i18n WHERE webinterface = '$webinterface'");
	$out = mysqli_fetch_row($res);
	return($out[0]);
}





/**
**name I18N_cacheWebinterfaceLanguages()
**description Caches the language information from the language.info files to the DB.
**/
function I18N_cacheWebinterfaceLanguages()
{
	if (I18N_countCachedLanguages(true) > 2)
		return(true);

	$pin=popen("find /m23/inc/help -iname language.info","r");

	while (!feof($pin))
	{
		//read name of language file
		$langFile=fgets($pin,10000);
		//if it's empty, we should quit
		if (empty($langFile)) break;
		//open the language file
		$in=fopen(trim($langFile),"r");

		while (!feof($in))
		{//get the variables and values
			$line=fgets($in,10000);
			//if it's empty, we should quit
			if (empty($line)) break;
			//split the line by variable name and value
			$varValue=explode(":",$line);

			switch ($varValue[0])
			{
				case language:
					{
						$longLanguage = trim($varValue[1]);
						break;
					};
				case shortlanguage:
					{
						$shortLanguage = trim($varValue[1]);
						break;
					};
			};
		};

		I18N_addLanguage(true, $shortLanguage, $longLanguage, $shortLanguage, '', '', '', '', '', '', '', '');
	};

	pclose($pin);
	fclose($in);
	return(true);
}





/**
**name I18N_getAllCachedLanguages($webinterface)
**description Returns an associative array with the shortnames of the language as keys and the longnames as value.
**parameter webinterface: Set to true, if it is a webinterface language. Set to false, for marking a client language.
**return Associative array with the languages.
**/
function I18N_getAllCachedLanguages($webinterface)
{
	$webinterface = ($webinterface ? 'w' : 'c');
	$res = DB_query("SELECT ShortLanguage, LongLanguage FROM i18n WHERE webinterface = '$webinterface'");
	while ($line = mysqli_fetch_assoc($res))
	{
		$out[$line['ShortLanguage']] = $line['LongLanguage'];
	}
	return($out);
}





/**
**name I18N_listWebinterfaceLanguages($default)
**description Lists all languages, the m23 webinterface is available in, as option lines
**parameter default: the language that should be shown first
**parameter directOutputtedSelection: Set to true, if the selection should be shown instead of returned.
**/
function I18N_listWebinterfaceLanguages($default, $directOutputtedSelection = true)
{
	I18N_cacheWebinterfaceLanguages();
	$langArray = I18N_getAllCachedLanguages(true);
	
	//Define the language selection button
	HTML_selection('LB_language', $langArray, SELTYPE_selection, true, $default);

	if ($directOutputtedSelection)
		echo(constant('LB_language'));
	else
		return(constant('LB_language'));
};





/**
**name I18N_addClientLanguageToCache($shortLanguage, $longLanguage, &$in)
**description Adds a new client language to the i18n DB cache.
**parameter shortLanguage: Two letter TLD (or longer code for countries that have more than a language (e.g. be-nl, be-fr))
**parameter longLanguage: Long human readable country/language name.
**parameter in: Associative array with the information for the language.
**/
function I18N_addClientLanguageToCache($shortLanguage, $longLanguage, &$in)
{
	I18N_addLanguage(false, $shortLanguage, $longLanguage, $in['country'], $in['lang'], $in['keymap'], $in['xkeyboard'], $in['kdekeyboard'], $in['locale'], $in['kdekeyboards'], $in['timezone'], $in['packagelang']);
	$in = array();
}





/**
**name I18N_cacheClientLanguages()
**description Caches the client languages in the DB.
**/
function I18N_cacheClientLanguages()
{
	if (I18N_countCachedLanguages(false) > 21)
		return(true);

	//German version
	$out['country']="de"; $out['lang']="de_DE.utf8"; $out['keymap']="de-latin1-nodeadkeys"; $out['xkeyboard']="de"; $out['kdekeyboard']="de"; $out['locale']="de_DE@euro\nISO-8859-15\nde_DE\nISO-8859-1\nde_DE.UTF-8"; $out['kdekeyboards']="us,fr"; $out['timezone']="Europe/Berlin"; $out['packagelang'] = "de";
	I18N_addClientLanguageToCache("de", 'I18N_German', $out);

	//Belgian version with Dutch keyboard
	$out['country']="be"; $out['lang']="nl_BE.utf8"; $out['keymap']="be"; $out['xkeyboard']="be"; $out['kdekeyboard']="nl_BE"; $out['locale']="nl_BE.utf8"; $out['kdekeyboards']="nl,de,fr"; $out['timezone']="Europe/Brussels"; $out['packagelang'] = "nl";
	I18N_addClientLanguageToCache("be-nl", 'I18N_Belgian_with_Dutch_keyboard', $out);

	//Bulgarian version
	$out['country']="bg"; $out['lang']="bg_BG.utf8"; $out['keymap']="bg"; $out['xkeyboard']="bg"; $out['kdekeyboard']="bg"; $out['locale']="microsoft-cp1251\nbg_BG.utf8"; $out['kdekeyboards']="us,de,fr"; $out['timezone']="Europe/Sofia"; $out['packagelang'] = "bg";
	I18N_addClientLanguageToCache("bg", 'I18N_Bulgarian', $out);

	//Swiss version (basically de with some modifications
	$out['country']="ch"; $out['lang']="de_CH.utf8"; $out['keymap']="sg-latin1"; $out['xkeyboard']="de_CH"; $out['kdekeyboard']="de_CH"; $out['locale']="iso8859-15\nde_CH.utf8"; $out['kdekeyboards']="de,us,fr"; $out['timezone']="Europe/Zurich"; $out['packagelang'] = "de";
	I18N_addClientLanguageToCache("ch-de", 'I18N_Swiss_German_part', $out);

	//Simplified Chinese
	$out['country']="cn"; $out['lang']="zh_CN.GB2312"; $out['keymap']="us"; $out['xkeyboard']="us"; $out['kdekeyboard']="us"; $out['locale']="gb2312.1980-0\nzh_CN.GB2312"; $out['kdekeyboards']="us,de,fr"; $out[xmodifiers]="@im=Chinput"; $out['timezone']="Asia/Shanghai";  $out['packagelang'] = "cn";
	I18N_addClientLanguageToCache("cn", 'I18N_Simplified_Chinese', $out);

	//Czech
	$out['country']="cs"; $out['lang']="cs_CZ.utf8"; $out['keymap']="cz-lat2"; $out['xkeyboard']="cs"; $out['kdekeyboard']="cs"; $out['locale']="iso8859-2\ncs_CZ.utf8"; $out['kdekeyboards']="us,de,fr"; $out['timezone']="Europe/Prague"; $out['consolefont']="iso02g"; $out['packagelang'] = "cs";
	I18N_addClientLanguageToCache("cs", 'I18N_Czech', $out);

	//Dansk
	$out['country']="dk"; $out['lang']="da_DK.utf8"; $out['keymap']="dk"; $out['xkeyboard']="dk"; $out['kdekeyboard']="dk"; $out['locale']="iso8859-15\nda_DK.utf8"; $out['kdekeyboards']="dk,de,us,fr"; $out['timezone']="Europe/Copenhagen"; $out['packagelang'] = "da";
	I18N_addClientLanguageToCache("dk", 'I18N_Dansk', $out);

	//Spanish
	$out['country']="es"; $out['lang']="es_ES.utf8"; $out['keymap']="es"; $out['xkeyboard']="es"; $out['kdekeyboard']="es"; $out['locale']="iso8859-15\nes_ES.utf8"; $out['kdekeyboards']="de,us,fr"; $out['timezone']="Europe/Madrid"; $out['packagelang'] = "es";
	I18N_addClientLanguageToCache("es", 'I18N_Spanish', $out);

	//Finnish
	$out['country']="fi"; $out['lang']="fi_FI.utf8"; $out['keymap']="fi"; $out['xkeyboard']="fi"; $out['kdekeyboard']="fi"; $out['locale']="iso8859-15\nfi_FI.utf8"; $out['kdekeyboards']="us"; $out['timezone']="Europe/Helsinki"; $out['packagelang'] = "fi";
	I18N_addClientLanguageToCache("fi", 'I18N_Finnish', $out);

	//French
	$out['country']="fr"; $out['lang']="fr_FR.UTF-8"; $out['keymap']="fr"; $out['xkeyboard']="fr"; $out['kdekeyboard']="fr"; $out['locale']="ISO-8859-1\nfr_FR.UTF-8\nfr_FR.UTF-8"; $out['kdekeyboards']="de,us"; $out['timezone']="Europe/Paris"; $out['packagelang'] = "fr";
	I18N_addClientLanguageToCache("fr", 'I18N_French', $out);

	//Hebrew
	$lang="he"; $out['country']="il"; $out['lang']="he_IL.utf8"; $out['keymap']="us"; $out['xkeyboard']="us"; $out['kdekeyboard']="il"; $out['locale']="iso8859-8\nhe_IL.utf8"; $out['kdekeyboards']="us,fr,de"; $out['timezone']="Asia/Jerusalem"; $out['packagelang'] = "he";
	I18N_addClientLanguageToCache("il", 'I18N_Hebrew', $out);

	//Irish
	$out['country']="ie"; $out['lang']="ga_IE.utf8"; $out['keymap']="uk"; $out['xkeyboard']="gb"; $out['kdekeyboard']="gb"; $out['locale']="iso8859-15\nga_IE.utf8"; $out['kdekeyboards']="us,de,fr"; $out['timezone']="Europe/Dublin"; $out['packagelang'] = "ga";
	I18N_addClientLanguageToCache("ie", 'I18N_Irish_Gaelic', $out);

	//Italian
	$out['country']="it"; $out['lang']="it_IT.utf8"; $out['keymap']="it"; $out['xkeylocaleboard']="it"; $out['kdekeyboard']="it"; $out['locale']="it_IT\nISO-8859-1\nit_IT.UTF-8@euro\nUTF-8\nit_IT.UTF-8"; $out['kdekeyboards']="fr,us,de"; $out['timezone']="Europe/Rome"; $out['packagelang'] = "it";
	I18N_addClientLanguageToCache("it", 'I18N_Italian', $out);

	//Japanese
	$out['country']="jp"; $out['lang']="ja_JP.utf8"; $lang="ja"; $out['keymap']="us"; $out['xkeyboard']="us"; $out['kdekeyboard']="us"; $out['locale']="iso8859-15\nja_JP.utf8"; $out['kdekeyboards']="fr,us,de"; $out['timezone']="Asia/Tokyo"; $out['packagelang'] = "ja";
	I18N_addClientLanguageToCache("ja", 'I18N_Japanese', $out);

	//Dutch
	$out['country']="nl"; $out['lang']="nl_NL.utf8"; $out['keymap']="us"; $out['xkeyboard']="us"; $out['kdekeyboard']="en_US"; $out['locale']="iso8859-15\nnl_NL.utf8"; $out['kdekeyboards']="nl,de,fr"; $out['timezone']="Europe/Amsterdam"; $out['packagelang'] = "nl";
	I18N_addClientLanguageToCache("nl", 'I18N_Dutch', $out);

	//Polish
	$out['country']="pl"; $out['lang']="pl_PL.utf8"; $out['keymap']="pl"; $out['xkeyboard']="pl"; $out['kdekeyboard']="pl"; $out['locale']="iso8859-2\npl_PL.utf8"; $out['kdekeyboards']="de,us,fr"; $out['timezone']="Europe/Warsaw"; $out['packagelang'] = "pl";
	I18N_addClientLanguageToCache("pl", 'I18N_Polish', $out);

	//Russian
	$out['country']="ru"; $out['lang']="ru_RU.utf8"; $out['keymap']="ru"; $out['xkeyboard']="ru"; $out['kdekeyboard']="ru"; $out['locale']="koi8-r\nru_RU.utf8"; $out['kdekeyboards']="de,us,fr"; $out['timezone']="Europe/Moscow"; $out['packagelang'] = "ru";
	I18N_addClientLanguageToCache("ru", 'I18N_Russian', $out);

	//Slovak
	$out['country']="sk"; $out['lang']="sk.utf8"; $out['keymap']="sk-qwerty"; $out['xkeyboard']="sk"; $out['kdekeyboard']="sk"; $out['locale']="iso8859-2\nsk.utf8"; $out['kdekeyboards']="us,de"; $out['timezone']="Europe/Bratislava"; $out['packagelang'] = "sk";
	I18N_addClientLanguageToCache("sk", 'I18N_Slovak', $out);

	//Slovenian
	$lang="sl"; $out['country']="si"; $out['lang']="sl_SI.utf8"; $out['keymap']="slovene"; $out['xkeyboard']="sl"; $out['kdekeyboard']="si"; $out['locale']="iso8859-2\nsl_SI.utf8"; $out['kdekeyboards']="us,de"; $out['timezone']="Europe/Ljubljana"; $out['packagelang'] = "sl";
	I18N_addClientLanguageToCache("sl", 'I18N_Slovenian', $out);

	//Turkish
	$out['country']="tr"; $out['lang']="tr_TR.utf8"; $out['keymap']="tr_q-latin5"; $out['xkeyboard']="tr"; $out['kdekeyboard']="tr"; $out['locale']="iso8859-9\ntr_TR.utf8"; $out['kdekeyboards']="us,de,fr"; $out['timezone']="Europe/Istanbul"; $out['packagelang'] = "tr";
	I18N_addClientLanguageToCache("tr", 'I18N_Turkish', $out);

	//Traditional Chinese
	$out['country']="tw"; $out['lang']="zh_TW.Big5"; $lang="zh_TW.Big5"; $out['keymap']="us"; $out['xkeyboard']="us"; $out['kdekeyboard']="us"; $out['locale']="iso8859-1"; $out['kdekeyboards']="us"; $out['timezone']="Asia/Taipei"; $out['packagelang'] = "zhtw";
	I18N_addClientLanguageToCache("tw", 'I18N_Traditional_Chinese', $out);

	//British
	$out['country']="uk"; $out['lang']="en_GB.utf8"; $out['keymap']="uk"; $out['xkeyboard']="gb"; $out['kdekeyboard']="gb"; $out['locale']="en_GB\nISO-8859-1\nen_GB.ISO-8859-15\nISO-8859-15\nen_GB.UTF-8\nUTF-8\nen_US.UTF-8\nUTF-8"; $out['kdekeyboards']="us"; $out['timezone']="Europe/London"; $out['packagelang'] = "engb";
	I18N_addClientLanguageToCache("uk", 'I18N_British', $out);

	//Hungarian
	$out['country']="hu"; $out['lang']="hu_HU.utf8"; $out['keymap']="hu"; $out['xkeyboard']="hu"; $out['kdekeyboard']="hu"; $out['locale']="hu_HU.ISO_8859-2\nhu_HU.utf8"; $out['kdekeyboards']="us,de,fr"; $out['timezone']="Europe/Budapest"; $out['packagelang'] = "hu";
	I18N_addClientLanguageToCache("hu", 'I18N_Hungarian', $out);

	//Norwegian
	$out['country']="no"; $out['lang']="nn_NO.utf8"; $out['keymap']="no"; $out['xkeyboard']="no"; $out['kdekeyboard']="no"; $out['locale']="no_NO.ISO_8859-1\nnn_NO.utf8"; $out['kdekeyboards']="us,de,fr"; $out['timezone']="Europe/Oslo"; $out['packagelang'] = "nn";
	I18N_addClientLanguageToCache("no", 'I18N_Norwegian', $out);

	//Swedish
	$out['country']="sv"; $out['lang']="sv_SE.utf8"; $out['keymap']="sv-latin1"; $out['xkeyboard']="sv"; $out['kdekeyboard']="se"; $out['locale']="sv_SE.ISO_8859-1\nsv_SE.utf8"; $out['kdekeyboards']="us,de,fr"; $out['timezone']="Europe/Stockholm"; $out['packagelang'] = "sv";
	I18N_addClientLanguageToCache("sv", 'I18N_Swedish', $out);

	//Portuguese
	$out['country']="pt"; $out['lang']="pt_PT.utf8"; $out['keymap']="pt-latin1"; $out['xkeyboard']="pt"; $out['kdekeyboard']="pt"; $out['locale']="pt_PT.ISO_8859-1\npt_PT.utf8"; $out['kdekeyboards']="us,de,fr"; $out['timezone']="Europe/Lisbon"; $out['packagelang'] = "pt";
	I18N_addClientLanguageToCache("pt", 'I18N_Portuguese', $out);

	//Estonian
	$out['country']="et"; $out['lang']="et_EE.utf8"; $out['keymap']="et"; $out['xkeyboard']="ee"; $out['kdekeyboard']="ee"; $out['locale']="et_EE.ISO-8859-15\net_EE.utf8"; $out['kdekeyboards']="us,de,fr"; $out['timezone']="Europe/Tallinn"; $out['packagelang'] = "et";
	I18N_addClientLanguageToCache("et", 'I18N_Estonian', $out);

	//Greek
	$out['country']="gr"; $out['lang']="el_GR.utf8"; $out['keymap']="gr"; $out['xkeyboard']="gr"; $out['kdekeyboard']="gr"; $out['locale']="el_GR.ISO_8859-7\nel_GR.utf8"; $out['kdekeyboards']="us,de,fr"; $out['timezone']="Europe/Athens"; $out['packagelang'] = "el";
	I18N_addClientLanguageToCache("gr", 'I18N_Greek', $out);

	//Icelandic
	$out['country']="is"; $out['lang']="is_IS.utf8"; $out['keymap']="is-latin1"; $out['xkeyboard']="is"; $out['kdekeyboard']="is"; $out['locale']="is_IS.ISO_8859-1\nis_IS.utf8"; $out['kdekeyboards']="us,de,fr"; $out['timezone']="Europe/London"; $out['packagelang'] = "is";
	I18N_addClientLanguageToCache("is", 'I18N_Icelandic', $out);

	//Indonesian
	$out['country']="id"; $out['lang']="id_ID.utf8"; $out['keymap']="us"; $out['xkeyboard']="id"; $out['kdekeyboard']="us"; $out['locale']="id_ID.ISO-8859-1\nid_ID.utf8"; $out['kdekeyboards']="de,fr"; $out['timezone']="Asia/Jakarta"; $out['packagelang'] = "engb";
	I18N_addClientLanguageToCache("id", 'I18N_Indonesian', $out);

	//Lithuanian
	$out['country']="lt"; $out['lang']="lt_LT.utf8"; $out['keymap']="lt"; $out['xkeyboard']="lt"; $out['kdekeyboard']="lt"; $out['locale']="lt_LN.ISO_8859-1\nlt_LT.utf8"; $out['kdekeyboards']="us,de,fr"; $out['timezone']="Europe/Vilnius"; $out['packagelang'] = "lt";
	I18N_addClientLanguageToCache("lt", 'I18N_Lithuanian', $out);

	//Romanian
	$out['country']="ro"; $out['lang']="ro_RO.utf8"; $out['keymap']="ro"; $out['xkeyboard']="ro"; $out['kdekeyboard']="ro"; $out['locale']="ro_RO.ISO_8859-2\nro_RO.utf8"; $out['kdekeyboards']="us,de,fr"; $out['timezone']="Europe/Bucharest"; $out['packagelang'] = "ro";
	I18N_addClientLanguageToCache("ro", 'I18N_Romanian', $out);

	//Serbian
	$out['country']="sr"; $out['lang']="sr_CS.utf8"; $out['keymap']="sr"; $out['xkeyboard']="sr"; $out['kdekeyboard']="rs"; $out['locale']="sr_SP.ISO_8859-2\nsr_CS.utf8"; $out['kdekeyboards']="us,de,fr"; $out['timezone']="Europe/Belgrade"; $out['packagelang'] = "sr";
	I18N_addClientLanguageToCache("sr", 'I18N_Serbian', $out);
}





/**
**name I18N_getLangVars(&$lang)
**description Returns an associative array with language settings for the client.
**parameter shortLanguage: Two letter TLD (or longer code for countries that have more than a language (e.g. be-nl, be-fr))
**/
function I18N_getLangVars(&$lang)
{
	//Check that the languages are cached in the DB
	I18N_cacheClientLanguages();

	//Get the info for the 
	$res = DB_query("SELECT * FROM `i18n` WHERE webinterface = 'c' AND `ShortLanguage` = '$lang'");
	return(mysqli_fetch_assoc($res));
};

?>
