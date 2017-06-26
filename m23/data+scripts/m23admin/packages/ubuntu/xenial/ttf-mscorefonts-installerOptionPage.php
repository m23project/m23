<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ttf-mscorefonts-installer");

$elem["msttcorefonts/dldir"]["type"]="string";
$elem["msttcorefonts/dldir"]["description"]="Directory holding MS fonts (if already downloaded):
 If you have already downloaded Microsoft's TrueType Core Fonts for the web,
 type the name of the directory which contains them. Those files are in the
 Microsoft Windows self-installing format, and are named andale32.exe,
 arial32.exe, arialb32.exe, comic32.exe, courie32.exe, georgi32.exe,
 impact32.exe, times32.exe, trebuc32.exe, verdan32.exe and webdin32.exe.
 .
 If you haven't yet downloaded these fonts, leave this blank and the fonts
 will be downloaded for you. Approximately 4 MB will need to be downloaded.
 .
 If you are not connected to the internet or do not wish to download these
 fonts now, enter \"none\" to abort. 
";
$elem["msttcorefonts/dldir"]["descriptionde"]="Verzeichnis, in dem die MS-Schriftarten liegen (falls bereits heruntergeladen):
 Falls Sie bereits die TrueType-Schriftarten von Microsoft heruntergeladen haben, geben Sie den Namen des Verzeichnisses an, wo sie jetzt liegen. Diese Dateien liegen im selbst-entpackenden Format von Microsoft Windows vor und heißen andale32.exe, arial32.exe, arialb32.exe, comic32.exe, courie32.exe, georgi32.exe, impact32. exe, times32.exe, trebuc32.exe, verdan32.exe und webdin32.exe.
 .
 Falls Sie sie noch nicht heruntergeladen haben, lassen Sie das Textfeld frei, die Schriften werden dann für Sie heruntergeladen. Ungefähr 4 MB müssen dafür übertragen werden.
 .
 Wenn Sie nicht mit dem Internet verbunden sind oder es nicht wollen, dass die Schriften heruntergeladen werden, dann geben Sie zum Abbrechen »none« ein.
";
$elem["msttcorefonts/dldir"]["descriptionfr"]="Répertoire contenant les polices MS (si elles ont déjà été téléchargées) :
 Si vous avez déjà téléchargé les polices TrueType de base de Microsoft (« Microsoft's TrueType Core Fonts ») sur Internet, veuillez indiquer le répertoire où elles se trouvent. Il s'agit des archives d'installation pour Windows nommées andale32.exe, arial32.exe, arialb32.exe, comic32.exe, courie32.exe, georgi32.exe, impact32.exe, times32.exe, trebuc32.exe, verdan32.exe et webdin32.exe.
 .
 Si vous n'avez pas encore téléchargé ces polices, laissez ce champ vide et le téléchargement sera automatique. Environ 8 Mo seront alors téléchargés.
 .
 Si vous n'êtes pas connecté à l'Internet, ou si vous ne souhaitez pas télécharger ces polices maintenant, indiquez « none » (aucun) pour interrompre l'installation.
";
$elem["msttcorefonts/dldir"]["default"]="";
$elem["msttcorefonts/baddldir"]["type"]="error";
$elem["msttcorefonts/baddldir"]["description"]="Font files not found
 The directory you entered either did not exist, did not contain the
 Microsoft TrueType Core Fonts for the Web Microsoft Windows 9x self
 installing executables, or those executables did not match the versions
 expected by this script.  Please re-enter the directory containing the
 Microsoft font files or enter \"none\" to abort.
";
$elem["msttcorefonts/baddldir"]["descriptionde"]="Schriftartendateien nicht gefunden
 Das Verzeichnis, welches Sie eingegeben haben, existiert nicht oder es enthält nicht die TrueType-Schriftarten von Microsoft im selbst-entpackendem Format oder die Dateien haben nicht die von diesem Skript erwarteten Versionsnummern. Geben Sie erneut das Verzeichnis ein, in dem die Schriftarten liegen oder »none« zum Abbrechen.
";
$elem["msttcorefonts/baddldir"]["descriptionfr"]="Fichiers de police introuvables
 Le répertoire indiqué n'existe pas, ne contient pas les polices TrueType de base de Microsoft (« Microsoft's TrueType Core Fonts ») sous le format d'archive d'installation automatique pour Microsoft Windows 9x ou les archives trouvées ne correspondent pas à la version attendue par ce script. Veuillez indiquer le répertoire où se trouvent les fichiers de police, ou « none » pour interrompre l'installation.
";
$elem["msttcorefonts/baddldir"]["default"]="";
$elem["msttcorefonts/dlurl"]["type"]="string";
$elem["msttcorefonts/dlurl"]["description"]="Mirror to download from:
 This package already contains a built-in set of mirrors, which should
 be sufficient for most people. However, if you'd like to use a
 different (possibly local) mirror instead, please enter the full URL
 to the directory containing the relevant files here. If not, just
 leave the field blank.
";
$elem["msttcorefonts/dlurl"]["descriptionde"]="Spiegel, von dem heruntergeladen werden soll:
 Dieses Paket enthält bereits einen eingebauten Satz an Spiegeln, die für die meisten Personen ausreichen sollten. Falls Sie allerdings einen anderen (lokalen) Spiegel verwenden möchten, geben Sie hier die komplette URL zu dem Verzeichnis mit den relevanten Dateien ein. Falls nicht, lassen Sie dieses Feld einfach leer.
";
$elem["msttcorefonts/dlurl"]["descriptionfr"]="Miroir :
 Ce paquet contient une liste de miroirs qui devrait être suffisante pour la plupart des utilisateurs. Toutefois, si vous désirez utiliser un autre miroir (par exemple un miroir local), veuillez indiquer l'URL complète vers le répertoire contenant les fichiers des polices. Sinon, veuillez laisser ce champ vide.
";
$elem["msttcorefonts/dlurl"]["default"]="";
$elem["msttcorefonts/present-mscorefonts-eula"]["type"]="note";
$elem["msttcorefonts/present-mscorefonts-eula"]["description"]="TrueType core fonts for the Web EULA 
 END-USER LICENSE AGREEMENT FOR
 MICROSOFT SOFTWARE
 .
 IMPORTANT-READ CAREFULLY: This Microsoft End-User License Agreement
 (\"EULA\") is a legal agreement between you (either an individual or a
 single entity) and Microsoft Corporation for the Microsoft software
 accompanying this EULA, which includes computer software and may
 include associated media, printed materials, and \"on-line\" or
 electronic documentation (\"SOFTWARE PRODUCT\" or \"SOFTWARE\"). By
 exercising your rights to make and use copies of the SOFTWARE
 PRODUCT, you agree to be bound by the terms of this EULA. If you do
 not agree to the terms of this EULA, you may not use the SOFTWARE
 PRODUCT.
 .
 SOFTWARE PRODUCT LICENSE
 The SOFTWARE PRODUCT is protected by copyright laws and international
 copyright treaties, as well as other intellectual property laws and
 treaties. The SOFTWARE PRODUCT is licensed, not sold.
 .
 1. GRANT OF LICENSE. This EULA grants you the following rights:
 .
  • Installation and Use. You may install and use an unlimited number
    of copies of the SOFTWARE PRODUCT.
  • Reproduction and Distribution. You may reproduce and distribute
    an unlimited number of copies of the SOFTWARE PRODUCT; provided
    that each copy shall be a true and complete copy, including all
    copyright and trademark notices, and shall be accompanied by a
    copy of this EULA. Copies of the SOFTWARE PRODUCT may not be
    distributed for profit either on a standalone basis or included
    as part of your own product.
 .
 2. DESCRIPTION OF OTHER RIGHTS AND LIMITATIONS.
 .
  • Limitations on Reverse Engineering, Decompilation, and
    Disassembly. You may not reverse engineer, decompile, or
    disassemble the SOFTWARE PRODUCT, except and only to the extent
    that such activity is expressly permitted by applicable law
    notwithstanding this limitation.
  • Restrictions on Alteration. You may not rename, edit or create
    any derivative works from the SOFTWARE PRODUCT, other than
    subsetting when embedding them in documents.
  • Software Transfer. You may permanently transfer all of your
    rights under this EULA, provided the recipient agrees to the
    terms of this EULA.
  • Termination. Without prejudice to any other rights, Microsoft may
    terminate this EULA if you fail to comply with the terms and
    conditions of this EULA. In such event, you must destroy all
    copies of the SOFTWARE PRODUCT and all of its component parts.
 .
 3. COPYRIGHT. All title and copyrights in and to the SOFTWARE PRODUCT
 (including but not limited to any images, text, and \"applets\"
 incorporated into the SOFTWARE PRODUCT), the accompanying printed
 materials, and any copies of the SOFTWARE PRODUCT are owned by
 Microsoft or its suppliers. The SOFTWARE PRODUCT is protected by
 copyright laws and international treaty provisions. Therefore, you
 must treat the SOFTWARE PRODUCT like any other copyrighted material.
 .
 4. U.S. GOVERNMENT RESTRICTED RIGHTS. The SOFTWARE PRODUCT and
 documentation are provided with RESTRICTED RIGHTS. Use, duplication,
 or disclosure by the Government is subject to restrictions as set
 forth in subparagraph (c)(1)(ii) of the Rights in Technical Data and
 Computer Software clause at DFARS 252.227-7013 or subparagraphs (c)
 (1) and (2) of the Commercial Computer Software - Restricted Rights
 at 48 CFR 52.227-19, as applicable. Manufacturer is Microsoft
 Corporation/One Microsoft Way/Redmond, WA 98052-6399.
 .
 LIMITED WARRANTY
 .
 NO WARRANTIES. Microsoft expressly disclaims any warranty for the
 SOFTWARE PRODUCT. The SOFTWARE PRODUCT and any related documentation
 is provided \"as is\" without warranty of any kind, either express or
 implied, including, without limitation, the implied warranties or
 merchantability, fitness for a particular purpose, or
 noninfringement. The entire risk arising out of use or performance of
 the SOFTWARE PRODUCT remains with you.
 .
 NO LIABILITY FOR CONSEQUENTIAL DAMAGES. In no event shall Microsoft
 or its suppliers be liable for any damages whatsoever (including,
 without limitation, damages for loss of business profits, business
 interruption, loss of business information, or any other pecuniary
 loss) arising out of the use of or inability to use this Microsoft
 product, even if Microsoft has been advised of the possibility of
 such damages. Because some states/jurisdictions do not allow the
 exclusion or limitation of liability for consequential or incidental
 damages, the above limitation may not apply to you.
 .
 MISCELLANEOUS
 .
 If you acquired this product in the United States, this EULA is
 governed by the laws of the State of Washington.
 .
 If this product was acquired outside the United States, then local
 laws may apply.
 .
 Should you have any questions concerning this EULA, or if you desire
 to contact Microsoft for any reason, please contact the Microsoft
 subsidiary serving your country, or write: Microsoft Sales
 Information Center/One Microsoft Way/Redmond, WA 98052-6399.
 .
 Reference: http://www.microsoft.com/typography/fontpack/eula.htm

";
$elem["msttcorefonts/present-mscorefonts-eula"]["descriptionde"]="";
$elem["msttcorefonts/present-mscorefonts-eula"]["descriptionfr"]="";
$elem["msttcorefonts/present-mscorefonts-eula"]["default"]="";
$elem["msttcorefonts/accepted-mscorefonts-eula"]["type"]="boolean";
$elem["msttcorefonts/accepted-mscorefonts-eula"]["description"]="Do you accept the EULA license terms?
 In order to install this package, you must accept the license terms, the
 \"TrueType core fonts for the Web EULA \". Not accepting will cancel the
 installation.

";
$elem["msttcorefonts/accepted-mscorefonts-eula"]["descriptionde"]="";
$elem["msttcorefonts/accepted-mscorefonts-eula"]["descriptionfr"]="";
$elem["msttcorefonts/accepted-mscorefonts-eula"]["default"]="false";
$elem["msttcorefonts/error-mscorefonts-eula"]["type"]="error";
$elem["msttcorefonts/error-mscorefonts-eula"]["description"]="Declined \"TrueType core fonts for the Web EULA \"
 If you do not agree to the \"TrueType core fonts for the Web EULA \" license
 terms you cannot install this software.
 .
 The installation of this package will be canceled.
";
$elem["msttcorefonts/error-mscorefonts-eula"]["descriptionde"]="";
$elem["msttcorefonts/error-mscorefonts-eula"]["descriptionfr"]="";
$elem["msttcorefonts/error-mscorefonts-eula"]["default"]="";
PKG_OptionPageTail2($elem);
?>
