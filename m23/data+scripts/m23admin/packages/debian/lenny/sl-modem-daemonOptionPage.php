<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sl-modem-daemon");

$elem["sl-modem-daemon/country"]["type"]="select";
$elem["sl-modem-daemon/country"]["choices"][1]="ALGERIA";
$elem["sl-modem-daemon/country"]["choices"][2]="ARGENTINA";
$elem["sl-modem-daemon/country"]["choices"][3]="AUSTRALIA";
$elem["sl-modem-daemon/country"]["choices"][4]="AUSTRIA";
$elem["sl-modem-daemon/country"]["choices"][5]="BAHREIN";
$elem["sl-modem-daemon/country"]["choices"][6]="BELGIUM";
$elem["sl-modem-daemon/country"]["choices"][7]="BRAZIL";
$elem["sl-modem-daemon/country"]["choices"][8]="BRUNEI";
$elem["sl-modem-daemon/country"]["choices"][9]="BULGARIA";
$elem["sl-modem-daemon/country"]["choices"][10]="CANADA";
$elem["sl-modem-daemon/country"]["choices"][11]="CHILE";
$elem["sl-modem-daemon/country"]["choices"][12]="CHINA";
$elem["sl-modem-daemon/country"]["choices"][13]="CTR21EUROPE";
$elem["sl-modem-daemon/country"]["choices"][14]="CYPRUS";
$elem["sl-modem-daemon/country"]["choices"][15]="CZECH_REPUBLIC";
$elem["sl-modem-daemon/country"]["choices"][16]="DENMARK";
$elem["sl-modem-daemon/country"]["choices"][17]="EGYPT";
$elem["sl-modem-daemon/country"]["choices"][18]="ESTONIA";
$elem["sl-modem-daemon/country"]["choices"][19]="FINLAND";
$elem["sl-modem-daemon/country"]["choices"][20]="FRANCE";
$elem["sl-modem-daemon/country"]["choices"][21]="GERMANY";
$elem["sl-modem-daemon/country"]["choices"][22]="GREECE";
$elem["sl-modem-daemon/country"]["choices"][23]="HONG_KONG";
$elem["sl-modem-daemon/country"]["choices"][24]="HUNGARY";
$elem["sl-modem-daemon/country"]["choices"][25]="ICELAND";
$elem["sl-modem-daemon/country"]["choices"][26]="INDIA";
$elem["sl-modem-daemon/country"]["choices"][27]="INDONESIA";
$elem["sl-modem-daemon/country"]["choices"][28]="IRELAND";
$elem["sl-modem-daemon/country"]["choices"][29]="ISRAEL";
$elem["sl-modem-daemon/country"]["choices"][30]="ITALY";
$elem["sl-modem-daemon/country"]["choices"][31]="JAPAN";
$elem["sl-modem-daemon/country"]["choices"][32]="JORDAN";
$elem["sl-modem-daemon/country"]["choices"][33]="KOREA";
$elem["sl-modem-daemon/country"]["choices"][34]="KUWAIT";
$elem["sl-modem-daemon/country"]["choices"][35]="LATVIA";
$elem["sl-modem-daemon/country"]["choices"][36]="LEBANON";
$elem["sl-modem-daemon/country"]["choices"][37]="LITHUANIA";
$elem["sl-modem-daemon/country"]["choices"][38]="LUXEMBOURG";
$elem["sl-modem-daemon/country"]["choices"][39]="MALAYSIA";
$elem["sl-modem-daemon/country"]["choices"][40]="MALTA";
$elem["sl-modem-daemon/country"]["choices"][41]="MEXICO";
$elem["sl-modem-daemon/country"]["choices"][42]="MOROCCO";
$elem["sl-modem-daemon/country"]["choices"][43]="NETHERLANDS";
$elem["sl-modem-daemon/country"]["choices"][44]="NEW_ZEALAND";
$elem["sl-modem-daemon/country"]["choices"][45]="NORWAY";
$elem["sl-modem-daemon/country"]["choices"][46]="OMAN";
$elem["sl-modem-daemon/country"]["choices"][47]="PAKISTAN";
$elem["sl-modem-daemon/country"]["choices"][48]="PERU";
$elem["sl-modem-daemon/country"]["choices"][49]="PHILIPPINES";
$elem["sl-modem-daemon/country"]["choices"][50]="POLAND";
$elem["sl-modem-daemon/country"]["choices"][51]="PORTUGAL";
$elem["sl-modem-daemon/country"]["choices"][52]="ROMANIA";
$elem["sl-modem-daemon/country"]["choices"][53]="RUSSIA";
$elem["sl-modem-daemon/country"]["choices"][54]="SAUDIARABIA";
$elem["sl-modem-daemon/country"]["choices"][55]="SINGAPORE";
$elem["sl-modem-daemon/country"]["choices"][56]="SLOVAKIA";
$elem["sl-modem-daemon/country"]["choices"][57]="SLOVENIA";
$elem["sl-modem-daemon/country"]["choices"][58]="SOUTHAFRICA";
$elem["sl-modem-daemon/country"]["choices"][59]="SOUTHKOREA";
$elem["sl-modem-daemon/country"]["choices"][60]="SPAIN";
$elem["sl-modem-daemon/country"]["choices"][61]="SRILANKA";
$elem["sl-modem-daemon/country"]["choices"][62]="SWEDEN";
$elem["sl-modem-daemon/country"]["choices"][63]="SWITZERLAND";
$elem["sl-modem-daemon/country"]["choices"][64]="TAIWAN";
$elem["sl-modem-daemon/country"]["choices"][65]="THAILAND";
$elem["sl-modem-daemon/country"]["choices"][66]="TUNISIA";
$elem["sl-modem-daemon/country"]["choices"][67]="TURKEY";
$elem["sl-modem-daemon/country"]["choices"][68]="UAE";
$elem["sl-modem-daemon/country"]["choices"][69]="UK";
$elem["sl-modem-daemon/country"]["choices"][70]="URUGUAY";
$elem["sl-modem-daemon/country"]["choices"][71]="USA";
$elem["sl-modem-daemon/country"]["description"]="Location of the modem:
 In which country is your modem located? Please select the telephone system used in your country.
";
$elem["sl-modem-daemon/country"]["descriptionde"]="Standort des Modems:
 In welchem Land befindet sich ihr Modem? Bitte wählen Sie das Telefon-System Ihres Landes aus.
";
$elem["sl-modem-daemon/country"]["descriptionfr"]="Emplacement du modem :
 Veuillez indiquer le pays dans lequel se trouve votre modem. Vous devriez choisir le système téléphonique en usage dans votre pays.
";
$elem["sl-modem-daemon/country"]["default"]="USA";
PKG_OptionPageTail2($elem);
?>
