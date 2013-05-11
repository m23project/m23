<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zekr-quran-translations-en");

$elem["quran-translations-en/present-Zekr-Quran-Trans-disclaimer"]["type"]="note";
$elem["quran-translations-en/present-Zekr-Quran-Trans-disclaimer"]["description"]="No authenticity warranty
 This package provides a collection of translations which are publicly
 available on the web.
 .
 According to Islamic theology, perfectly translating the
 Quran is impossible. Most of the time, English translations are
 considered to be 'interpretations', side by side with the Arabic text,
 attempting to provide the best expression of its meaning.
 .
 For more information, please read the
 /usr/share/doc/zekr-quran-translations-en/README.txt file.
";
$elem["quran-translations-en/present-Zekr-Quran-Trans-disclaimer"]["descriptionde"]="Keine Garantie für Authentizität
 Dieses Paket stellt eine Sammlung von Übersetzungen bereit, die öffentlich im Web verfügbar sind.
 .
 Nach islamischer Theologie ist eine perfekte Übersetzung des Korans unmöglich. Meistens werden englische Übersetzungen als »Interpretationen« verstanden, die Seite an Seite mit dem arabischen Text versuchen, die beste Deutung seiner Bedeutung auszudrücken.
 .
 Für weitere Informationen lesen Sie bitte die Datei /usr/share/doc/zekr-quran-translations-en/README.txt.
";
$elem["quran-translations-en/present-Zekr-Quran-Trans-disclaimer"]["descriptionfr"]="Pas de garantie d'authenticité
 Ce paquet fournit un ensemble de traductions disponibles publiquement sur le web.
 .
 D'après la théologie islamique, il est impossible de traduire le Coran de manière parfaite. En général, les traductions sont considérées comme des « interprétations », qui, en parallèle avec la version arabe, s'efforcent de fournir la meilleure représentation de sa signification.
 .
 Pour plus d'informations, veuillez consulter le fichier /usr/share/doc/zekr-quran-translations-en/README.txt.
";
$elem["quran-translations-en/present-Zekr-Quran-Trans-disclaimer"]["default"]="";
$elem["quran-translations-en/present-Zekr-Quran-Trans-copyright"]["type"]="note";
$elem["quran-translations-en/present-Zekr-Quran-Trans-copyright"]["description"]="Commercial redistribution prohibited
 The contents of this package should not be redistributed for
 commercial purposes. It is only provided to help readers to learn
 more about Islam.
";
$elem["quran-translations-en/present-Zekr-Quran-Trans-copyright"]["descriptionde"]="Kommerzieller Weitervertrieb verboten
 Die Inhalte dieses Pakets sollten nicht für kommerzielle Zwecke weitervertrieben werden. Sie werden nur bereitgestellt, um den Lesern zu ermöglichen, mehr über den Islam zu lernen.
";
$elem["quran-translations-en/present-Zekr-Quran-Trans-copyright"]["descriptionfr"]="Redistribution commerciale interdite
 Le contenu de ce paquet ne peut pas être redistribué à des fins commerciales. Il n'est fourni que dans le but d'aider le lecteur à mieux connaître l'Islam.
";
$elem["quran-translations-en/present-Zekr-Quran-Trans-copyright"]["default"]="";
$elem["quran-translations-en/accepted-Zekr-Quran-Trans"]["type"]="boolean";
$elem["quran-translations-en/accepted-Zekr-Quran-Trans"]["description"]="Do you agree with the license terms?
 In order to install this package, please agree to the licensing terms,
 particularly with the prohibition of commercial distribution.
";
$elem["quran-translations-en/accepted-Zekr-Quran-Trans"]["descriptionde"]="Stimmen Sie den Lizenz-Bedingungen zu?
 Um dieses Paket zu installieren, stimmen Sie bitte den Lizenzbedingungen zu, insbesondere dem Verbot des kommerziellen Vertriebs.
";
$elem["quran-translations-en/accepted-Zekr-Quran-Trans"]["descriptionfr"]="Acceptez-vous les conditions de la licence ?
 Afin de pouvoir installer ce paquet, vous devez en accepter les conditions de licence, et particulièrement l'interdiction de redistribution à des fins commerciales.
";
$elem["quran-translations-en/accepted-Zekr-Quran-Trans"]["default"]="false";
$elem["quran-translations-en/error-Zekr-Quran-Trans"]["type"]="error";
$elem["quran-translations-en/error-Zekr-Quran-Trans"]["description"]="Declined Quran translations license terms
 As you declined this package's license terms, its installation
 will be aborted.
";
$elem["quran-translations-en/error-Zekr-Quran-Trans"]["descriptionde"]="Lizenz-Bedingungen für die Koran-Übersetzungen abgelehnt
 Da Sie die Lizenzbedingungen dieses Pakets abgelehnt haben, wird dessen Installation abgebrochen.
";
$elem["quran-translations-en/error-Zekr-Quran-Trans"]["descriptionfr"]="Refus des conditions de licence des traductions du Coran
 Puisque vous avez refusé les conditions de licence de ce paquet, son installation va être interrompue.
";
$elem["quran-translations-en/error-Zekr-Quran-Trans"]["default"]="";
PKG_OptionPageTail2($elem);
?>
