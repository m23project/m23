<?php

//Include the files needed for getting the language of the interface only
include("/m23/inc/db.php");
include("/m23/inc/html.php");
include("/m23/inc/i18n.php");
include("/m23/inc/help.php");
include("/m23/inc/checks.php");
include("/m23/inc/message.php");
include("/m23/inc/capture.php");
include("/m23/inc/remotevar.php");
include("/m23/inc/preferences.php");
include("/m23/inc/mail.php");
if (file_exists('/m23/inc/m23shared/m23shared.php'))
{
	include('/m23/inc/m23shared/m23shared.php');
	include('/m23/inc/m23shared/m23sharedConf.php');
}
else
	die("m23@web not found!");

session_start();

dbConnect();

// $m23_language = HTML_selection("LB_language", I18N_listLanguages("",false), SELTYPE_selection,true,"de");
$m23_language = HTML_selection("LB_language", array("de" => "Deutsch"), SELTYPE_selection,true,"de");

//Include the language file
include("/m23/inc/i18n/".$m23_language."/m23base.php");


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>m23@web Registration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<meta http-equiv="expires" content="0">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>

<body bgcolor="#F0F0F0">



<form method="post" action="register.php" name="htmlform">

<table width="700"	align="center">
	<tr>
		<td	align="center">
			<br><br><br>
			<img src="/gfx/m23-enterprise.png"><br><br><br>
		<td>
	</tr>
	<tr>
		<td align="center">
			<?
				echo("<span class=\"title\">$I18N_registration</span>\n");

				HTML_showFormHeader();

				//Button for reloading (changing the language)
				HTML_submit("BUT_change",$I18N_save);

				//User name input
				$username = HTML_input("ED_user", false, 20, 32, INPUT_TYPE_text);

				//Password elements
				$pwd1 = HTML_input("ED_pwd1", false, 20, 128, INPUT_TYPE_password);
				$pwd2 = HTML_input("ED_pwd2", false, 20, 128, INPUT_TYPE_password);

				//eMail elements
				$email1 = HTML_input("ED_email1", false, 30, 128, INPUT_TYPE_text);
				$email2 = HTML_input("ED_email2", false, 30, 128, INPUT_TYPE_text);

				$agb = HTML_checkBox("CB_agb", $I18N_m23sharedAcceptAGB);

				//Extra information elements
				$realName = HTML_input("ED_realName", false, 50, 300, INPUT_TYPE_text);
				$company = HTML_input("ED_company", false, 50, 300, INPUT_TYPE_text);
				$interest = HTML_input("ED_interest", false, 50, 300, INPUT_TYPE_text);
				$position = HTML_input("ED_position", false, 50, 300, INPUT_TYPE_text);
				$notice = HTML_input("ED_notice", false, 50, 300, INPUT_TYPE_text);
				$www = HTML_input("ED_www", false, 50, 300, INPUT_TYPE_text);

				$allOK = true;
				$errMsg = "";

				if (HTML_submit("BUT_register",$I18N_register))
				{
					if (strlen($username) == 0) { $errMsg .= "&bull; $I18N_m23sharedCustomerNameTooShort<br>"; $allOK = false; }
					if ($email1 != $email2) { $errMsg .= "&bull; $I18N_emails_dont_match<br>"; $allOK = false; }
					if (!checkEmail($email1)) { $errMsg .= "&bull; $I18N_invalid_email<br>"; $allOK = false; }
					if ($pwd1 != $pwd2) { $errMsg .= "&bull; $I18N_passwords_dont_match<br>"; $allOK = false; }
					if (strlen($pwd1) < 8) { $errMsg .= "&bull; $I18N_passwordTooShort<br>"; $allOK = false; }
					if ($agb !== true) { $errMsg .= "&bull; $I18N_m23sharedYouNeedToAcceptTheAGBToProceede<br>"; $allOK = false; }

					if (!$allOK)
						MSG_showError($errMsg, $m23_language);
					else
					{
						//Check if the user could be added
						if (m23SHARED_new($username, $pwd1) !== true)
							MSG_showError($I18N_m23sharedCustomerExists, $m23_language);
						else
							{
								//Set a 30 days evaluation license for 5 clients
								m23SHARED_setLicense(M23SHARED_PAYTYPE_EVAL, 5, 30);

								//Store the customer's email
								m23SHARED_setCustomerEmail($email1);

								//Store the current language
								m23SHARED_setCustomerLanguage($m23_language);

								//Store the real name of the customer
								m23SHARED_setRealName($realName);

								//Generate and store an acitvation key
								m23SHARED_generateActivationKey();

								//Send the mail with the activation code
								m23SHARED_sendActivationMail($email1, $username, $m23_language, $realName);

								m23SHARED_sendAdminMail("Neuer Benutzer registriert", "eMail: $email1\n$I18N_m23sharedCustomerName: $username\n$I18N_forename $I18N_familyname: $realName\n$I18N_m23sharedCompanyName: $company \n$I18N_m23sharedCompanyWWW: $www\n$I18N_m23sharedPositionInCompany: $position\n$I18N_m23sharedm23Interest: $interest\n$I18N_m23sharedHowDidYouNoticem23shared: $notice");

								MSG_showInfo($I18N_m23sharedRegistrationSucessfully, $m23_language);
								exit(0);
							}
					}
				}

				HTML_showTableHeader(true,"subtable2");

				HTML_showTableRow($I18N_language,LB_language.' '.BUT_change);

				HTML_showTableRow("$I18N_m23sharedCustomerName*",ED_user);
				HTML_showTableRow("$I18N_m23sharedCustomerPassword*","$I18N_password<br>".ED_pwd1."<br>$I18N_repeated_password<br>".ED_pwd2);
				HTML_showTableRow("$I18N_email*","$I18N_email<br>".ED_email1."<br>$I18N_repeated_email<br>".ED_email2);
				HTML_showTableRow("$I18N_Iaccept <a href=\"".agbURL."\">AGB</a>, <a href=\"".privacyInformationURL."\">$I18N_privacyInformation</a>, <a href=\"".disclaimerURL."\">$I18N_disclaimer</a>*",CB_agb);

				//Extra information elements
				HTML_showTableRow("<br><span class=\"title\">$I18N_m23sharedVoluntaryInformation</span>","");

				HTML_showTableRow("$I18N_forename $I18N_familyname", ED_realName);
				HTML_showTableRow($I18N_m23sharedCompanyName,ED_company);
				HTML_showTableRow($I18N_m23sharedCompanyWWW,ED_www);
				HTML_showTableRow($I18N_m23sharedPositionInCompany,ED_position);
				HTML_showTableRow($I18N_m23sharedm23Interest,ED_interest);
				HTML_showTableRow($I18N_m23sharedHowDidYouNoticem23shared,ED_notice);

				HTML_showTableRow("",BUT_register);

				HTML_showTableEnd(true);
				HTML_showFormEnd();

				help_showhelp("customerRegistration",$m23_language);
			?>
		</td>
	</tr>
</table>
</body>
</html>