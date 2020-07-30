<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ubuntustudio-live");

$elem["ubiquity/text/ubuntustudio-packages_heading_label"]["type"]="text";
$elem["ubiquity/text/ubuntustudio-packages_heading_label"]["description"]="Ubuntu Studio installation options

";
$elem["ubiquity/text/ubuntustudio-packages_heading_label"]["descriptionde"]="";
$elem["ubiquity/text/ubuntustudio-packages_heading_label"]["descriptionfr"]="";
$elem["ubiquity/text/ubuntustudio-packages_heading_label"]["default"]="";
$elem["ubiquity/text/ubuntustudio-packages_description_label"]["type"]="text";
$elem["ubiquity/text/ubuntustudio-packages_description_label"]["description"]="Installed multimedia packages (untick to remove):

";
$elem["ubiquity/text/ubuntustudio-packages_description_label"]["descriptionde"]="";
$elem["ubiquity/text/ubuntustudio-packages_description_label"]["descriptionfr"]="";
$elem["ubiquity/text/ubuntustudio-packages_description_label"]["default"]="";
$elem["ubiquity/text/ubuntustudio-packages_column_installed_title"]["type"]="text";
$elem["ubiquity/text/ubuntustudio-packages_column_installed_title"]["description"]="Installed

";
$elem["ubiquity/text/ubuntustudio-packages_column_installed_title"]["descriptionde"]="";
$elem["ubiquity/text/ubuntustudio-packages_column_installed_title"]["descriptionfr"]="";
$elem["ubiquity/text/ubuntustudio-packages_column_installed_title"]["default"]="";
$elem["ubiquity/text/ubuntustudio-packages_column_name_title"]["type"]="text";
$elem["ubiquity/text/ubuntustudio-packages_column_name_title"]["description"]="Name

";
$elem["ubiquity/text/ubuntustudio-packages_column_name_title"]["descriptionde"]="";
$elem["ubiquity/text/ubuntustudio-packages_column_name_title"]["descriptionfr"]="";
$elem["ubiquity/text/ubuntustudio-packages_column_name_title"]["default"]="";
$elem["ubiquity/text/ubuntustudio-packages_column_description_title"]["type"]="text";
$elem["ubiquity/text/ubuntustudio-packages_column_description_title"]["description"]="Description
";
$elem["ubiquity/text/ubuntustudio-packages_column_description_title"]["descriptionde"]="";
$elem["ubiquity/text/ubuntustudio-packages_column_description_title"]["descriptionfr"]="";
$elem["ubiquity/text/ubuntustudio-packages_column_description_title"]["default"]="";
PKG_OptionPageTail2($elem);
?>
