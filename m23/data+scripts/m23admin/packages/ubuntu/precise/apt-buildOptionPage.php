<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("apt-build");

$elem["apt-build/build_dir"]["type"]="string";
$elem["apt-build/build_dir"]["description"]="Directory used by apt-build to download and build packages:
";
$elem["apt-build/build_dir"]["descriptionde"]="Verzeichnis, das Apt-build zum Herunterladen und Bauen von Paketen nutzt:
";
$elem["apt-build/build_dir"]["descriptionfr"]="Emplacement où apt-build téléchargera et construira les paquets :
";
$elem["apt-build/build_dir"]["default"]="/var/cache/apt-build/build";
$elem["apt-build/repository_dir"]["type"]="string";
$elem["apt-build/repository_dir"]["description"]="Directory used to store packages built by apt-build:
";
$elem["apt-build/repository_dir"]["descriptionde"]="Verzeichnis zum Speichern mittels Apt-build gebauter Pakete:
";
$elem["apt-build/repository_dir"]["descriptionfr"]="Emplacement où apt-build entreposera les paquets construits :
";
$elem["apt-build/repository_dir"]["default"]="/var/cache/apt-build/repository";
$elem["apt-build/add_to_sourceslist"]["type"]="boolean";
$elem["apt-build/add_to_sourceslist"]["description"]="Add apt-build repository to sources.list?
 In order to install built package via APT, you must add a line like this
 to your sources.list:
   deb file:${repo} apt-build main
";
$elem["apt-build/add_to_sourceslist"]["descriptionde"]="Das Paketdepot von Apt-build der Datei /etc/sources.list hinzufügen?
 Um die gebauten Pakete mit APT zu installieren, müssen Sie so eine Zeile Ihrer Datei sources.list hinzufügen:
   deb file:${repo} apt-build main
";
$elem["apt-build/add_to_sourceslist"]["descriptionfr"]="Faut-il ajouter le dépôt d'apt-build au fichier sources.list ?
 Pour qu'apt puisse installer le paquet construit, vous devez ajouter une ligne comme celle-ci dans votre fichier sources.list :
   deb file:${repo} apt-build main
";
$elem["apt-build/add_to_sourceslist"]["default"]="true";
$elem["apt-build/olevel"]["type"]="select";
$elem["apt-build/olevel"]["choices"][1]="Light";
$elem["apt-build/olevel"]["choices"][2]="Medium";
$elem["apt-build/olevel"]["choicesde"][1]="Gering";
$elem["apt-build/olevel"]["choicesde"][2]="Mittel";
$elem["apt-build/olevel"]["choicesfr"][1]="Simple";
$elem["apt-build/olevel"]["choicesfr"][2]="Intermédiaire";
$elem["apt-build/olevel"]["description"]="Optimization level:
 These are equivalent to -O1, -O2 and -O3. Optimization level is time
 dependant. The higher optimization level you choose, more time will be
 required for compiling, but the faster your programs will be.
 Warning: Strong optimization may lead to stability problems.
";
$elem["apt-build/olevel"]["descriptionde"]="Grad der Optimierung:
 Das entspricht den Parametern »-O1«, »-O2« und »-O3«. Optimierungsstufen sind zeitabhängig. Je stärker Sie Ihr Paket optimieren, desto länger dauert die Kompilierung, aber umso schneller wird Ihr Programm arbeiten. Achtung: Starke Optimierung kann zu Instabilitäten führen.
";
$elem["apt-build/olevel"]["descriptionfr"]="Niveau d'optimisation :
 Ces niveaux d'optimisation correspondent à -O1, -O2 et -O3. L'optimisation prend du temps ; plus vous optimisez votre construction, plus longue sera la compilation, mais plus vos programmes seront rapides. Attention : l'optimisation « élevée » peut conduire à des problèmes de stabilité.
";
$elem["apt-build/olevel"]["default"]="Medium";
$elem["apt-build/arch_intel"]["type"]="select";
$elem["apt-build/arch_intel"]["choices"][1]="generic";
$elem["apt-build/arch_intel"]["choices"][2]="native";
$elem["apt-build/arch_intel"]["choices"][3]="i386";
$elem["apt-build/arch_intel"]["choices"][4]="i486";
$elem["apt-build/arch_intel"]["choices"][5]="i586";
$elem["apt-build/arch_intel"]["choices"][6]="pentium";
$elem["apt-build/arch_intel"]["choices"][7]="pentium-mmx";
$elem["apt-build/arch_intel"]["choices"][8]="pentiumpro";
$elem["apt-build/arch_intel"]["choices"][9]="i686";
$elem["apt-build/arch_intel"]["choices"][10]="pentium2";
$elem["apt-build/arch_intel"]["choices"][11]="pentium3";
$elem["apt-build/arch_intel"]["choices"][12]="pentium3m";
$elem["apt-build/arch_intel"]["choices"][13]="pentium-m";
$elem["apt-build/arch_intel"]["choices"][14]="pentium4";
$elem["apt-build/arch_intel"]["choices"][15]="pentium4m";
$elem["apt-build/arch_intel"]["choices"][16]="prescott";
$elem["apt-build/arch_intel"]["choices"][17]="nocona";
$elem["apt-build/arch_intel"]["choices"][18]="core2";
$elem["apt-build/arch_intel"]["choices"][19]="corei7";
$elem["apt-build/arch_intel"]["choices"][20]="corei7-avx";
$elem["apt-build/arch_intel"]["choices"][21]="core-avx-i";
$elem["apt-build/arch_intel"]["description"]="Architecture:
 If your architecture is not here, choose one and edit your configuration
 file (/etc/apt/apt-build.conf) by hand, and please do a wishlist bugreport.
";
$elem["apt-build/arch_intel"]["descriptionde"]="Rechnerarchitektur:
 Wenn Ihre Rechnerarchitektur hier nicht aufgelistet ist, wählen Sie irgendeine aus, ändern die Konfigurationsdatei (/etc/apt/apt-build.conf) per Hand und schreiben bitte einen Fehlerbericht (wishlist).
";
$elem["apt-build/arch_intel"]["descriptionfr"]="Architecture :
 Si votre architecture n'est pas présente, choisissez-en une, puis modifiez le fichier de configuration (/etc/apt/apt-build.conf) vous-même, et remplissez un rapport de bogue (de sévérité « wishlist »).
";
$elem["apt-build/arch_intel"]["default"]="native";
$elem["apt-build/arch_amd"]["type"]="select";
$elem["apt-build/arch_amd"]["choices"][1]="native";
$elem["apt-build/arch_amd"]["choices"][2]="k6";
$elem["apt-build/arch_amd"]["choices"][3]="k6-2";
$elem["apt-build/arch_amd"]["choices"][4]="k6-3";
$elem["apt-build/arch_amd"]["choices"][5]="athlon";
$elem["apt-build/arch_amd"]["choices"][6]="athlon-tbird";
$elem["apt-build/arch_amd"]["choices"][7]="athlon-4";
$elem["apt-build/arch_amd"]["choices"][8]="athlon-xp";
$elem["apt-build/arch_amd"]["choices"][9]="athlon-mp";
$elem["apt-build/arch_amd"]["choices"][10]="k8";
$elem["apt-build/arch_amd"]["choices"][11]="opteron";
$elem["apt-build/arch_amd"]["choices"][12]="athlon64";
$elem["apt-build/arch_amd"]["choices"][13]="athlon-fx";
$elem["apt-build/arch_amd"]["choices"][14]="i8-sse3";
$elem["apt-build/arch_amd"]["choices"][15]="opteron-sse3";
$elem["apt-build/arch_amd"]["choices"][16]="athlon64-sse3";
$elem["apt-build/arch_amd"]["choices"][17]="amdfam10";
$elem["apt-build/arch_amd"]["choices"][18]="barcelona";
$elem["apt-build/arch_amd"]["choices"][19]="bdver1";
$elem["apt-build/arch_amd"]["description"]="Architecture:
 If your architecture is not here, choose one and edit your configuration
 file (/etc/apt/apt-build.conf) by hand, and please do a wishlist bugreport.
";
$elem["apt-build/arch_amd"]["descriptionde"]="Rechnerarchitektur:
 Wenn Ihre Rechnerarchitektur hier nicht aufgelistet ist, wählen Sie irgendeine aus, ändern die Konfigurationsdatei (/etc/apt/apt-build.conf) per Hand und schreiben bitte einen Fehlerbericht (wishlist).
";
$elem["apt-build/arch_amd"]["descriptionfr"]="Architecture :
 Si votre architecture n'est pas présente, choisissez-en une, puis modifiez le fichier de configuration (/etc/apt/apt-build.conf) vous-même, et remplissez un rapport de bogue (de sévérité « wishlist »).
";
$elem["apt-build/arch_amd"]["default"]="native";
$elem["apt-build/arch_amd64"]["type"]="select";
$elem["apt-build/arch_amd64"]["choices"][1]="native";
$elem["apt-build/arch_amd64"]["choices"][2]="nocona";
$elem["apt-build/arch_amd64"]["choices"][3]="core2";
$elem["apt-build/arch_amd64"]["choices"][4]="corei7";
$elem["apt-build/arch_amd64"]["choices"][5]="corei7-avx";
$elem["apt-build/arch_amd64"]["choices"][6]="core-avx-i";
$elem["apt-build/arch_amd64"]["choices"][7]="atom";
$elem["apt-build/arch_amd64"]["choices"][8]="k8";
$elem["apt-build/arch_amd64"]["choices"][9]="opteron";
$elem["apt-build/arch_amd64"]["choices"][10]="athlon64";
$elem["apt-build/arch_amd64"]["choices"][11]="athlon-fx";
$elem["apt-build/arch_amd64"]["choices"][12]="k8-sse3";
$elem["apt-build/arch_amd64"]["choices"][13]="opteron-sse3";
$elem["apt-build/arch_amd64"]["choices"][14]="athlon64-sse3";
$elem["apt-build/arch_amd64"]["choices"][15]="amdfam10";
$elem["apt-build/arch_amd64"]["choices"][16]="barcelona";
$elem["apt-build/arch_amd64"]["choices"][17]="bdver1";
$elem["apt-build/arch_amd64"]["description"]="Architecture:
 If your architecture is not here, choose one and edit your configuration
 file (/etc/apt/apt-build.conf) by hand, and please do a wishlist bugreport.
";
$elem["apt-build/arch_amd64"]["descriptionde"]="Rechnerarchitektur:
 Wenn Ihre Rechnerarchitektur hier nicht aufgelistet ist, wählen Sie irgendeine aus, ändern die Konfigurationsdatei (/etc/apt/apt-build.conf) per Hand und schreiben bitte einen Fehlerbericht (wishlist).
";
$elem["apt-build/arch_amd64"]["descriptionfr"]="Architecture :
 Si votre architecture n'est pas présente, choisissez-en une, puis modifiez le fichier de configuration (/etc/apt/apt-build.conf) vous-même, et remplissez un rapport de bogue (de sévérité « wishlist »).
";
$elem["apt-build/arch_amd64"]["default"]="native";
$elem["apt-build/arch_sparc"]["type"]="select";
$elem["apt-build/arch_sparc"]["choices"][1]="native";
$elem["apt-build/arch_sparc"]["choices"][2]="v7";
$elem["apt-build/arch_sparc"]["choices"][3]="v8";
$elem["apt-build/arch_sparc"]["choices"][4]="sparclite";
$elem["apt-build/arch_sparc"]["choices"][5]="sparclet";
$elem["apt-build/arch_sparc"]["choices"][6]="v9";
$elem["apt-build/arch_sparc"]["choices"][7]="cypress";
$elem["apt-build/arch_sparc"]["choices"][8]="supersparc";
$elem["apt-build/arch_sparc"]["choices"][9]="hypersparc";
$elem["apt-build/arch_sparc"]["choices"][10]="leon";
$elem["apt-build/arch_sparc"]["choices"][11]="f930";
$elem["apt-build/arch_sparc"]["choices"][12]="f934";
$elem["apt-build/arch_sparc"]["choices"][13]="sparclite86x";
$elem["apt-build/arch_sparc"]["choices"][14]="tsc701";
$elem["apt-build/arch_sparc"]["choices"][15]="ultrasparc";
$elem["apt-build/arch_sparc"]["choices"][16]="ultrasparc3";
$elem["apt-build/arch_sparc"]["choices"][17]="niagara";
$elem["apt-build/arch_sparc"]["choices"][18]="niagara2";
$elem["apt-build/arch_sparc"]["choices"][19]="niagara3";
$elem["apt-build/arch_sparc"]["description"]="Architecture:
 If your architecture is not here, choose one and edit your configuration
 file (/etc/apt/apt-build.conf) by hand, and please do a wishlist bugreport.
";
$elem["apt-build/arch_sparc"]["descriptionde"]="Rechnerarchitektur:
 Wenn Ihre Rechnerarchitektur hier nicht aufgelistet ist, wählen Sie irgendeine aus, ändern die Konfigurationsdatei (/etc/apt/apt-build.conf) per Hand und schreiben bitte einen Fehlerbericht (wishlist).
";
$elem["apt-build/arch_sparc"]["descriptionfr"]="Architecture :
 Si votre architecture n'est pas présente, choisissez-en une, puis modifiez le fichier de configuration (/etc/apt/apt-build.conf) vous-même, et remplissez un rapport de bogue (de sévérité « wishlist »).
";
$elem["apt-build/arch_sparc"]["default"]="native";
$elem["apt-build/arch_arm"]["type"]="select";
$elem["apt-build/arch_arm"]["choices"][1]="native";
$elem["apt-build/arch_arm"]["choices"][2]="armv2";
$elem["apt-build/arch_arm"]["choices"][3]="armv2a";
$elem["apt-build/arch_arm"]["choices"][4]="armv3";
$elem["apt-build/arch_arm"]["choices"][5]="armv3m";
$elem["apt-build/arch_arm"]["choices"][6]="armv4";
$elem["apt-build/arch_arm"]["choices"][7]="armv4t";
$elem["apt-build/arch_arm"]["choices"][8]="armv5";
$elem["apt-build/arch_arm"]["choices"][9]="armv5t";
$elem["apt-build/arch_arm"]["choices"][10]="armv5te";
$elem["apt-build/arch_arm"]["choices"][11]="armv6";
$elem["apt-build/arch_arm"]["choices"][12]="armv6j";
$elem["apt-build/arch_arm"]["choices"][13]="armv6t2";
$elem["apt-build/arch_arm"]["choices"][14]="armv6zk";
$elem["apt-build/arch_arm"]["choices"][15]="armv6-m";
$elem["apt-build/arch_arm"]["choices"][16]="armv7";
$elem["apt-build/arch_arm"]["choices"][17]="armv7-a";
$elem["apt-build/arch_arm"]["choices"][18]="armv7-r";
$elem["apt-build/arch_arm"]["choices"][19]="armv7-m";
$elem["apt-build/arch_arm"]["choices"][20]="iwmmxt";
$elem["apt-build/arch_arm"]["choices"][21]="iwmmxt2";
$elem["apt-build/arch_arm"]["description"]="Architecture:
 If your architecture is not here, choose one and edit your configuration
 file (/etc/apt/apt-build.conf) by hand, and please do a wishlist bugreport.
";
$elem["apt-build/arch_arm"]["descriptionde"]="Rechnerarchitektur:
 Wenn Ihre Rechnerarchitektur hier nicht aufgelistet ist, wählen Sie irgendeine aus, ändern die Konfigurationsdatei (/etc/apt/apt-build.conf) per Hand und schreiben bitte einen Fehlerbericht (wishlist).
";
$elem["apt-build/arch_arm"]["descriptionfr"]="Architecture :
 Si votre architecture n'est pas présente, choisissez-en une, puis modifiez le fichier de configuration (/etc/apt/apt-build.conf) vous-même, et remplissez un rapport de bogue (de sévérité « wishlist »).
";
$elem["apt-build/arch_arm"]["default"]="native";
$elem["apt-build/arch_alpha"]["type"]="select";
$elem["apt-build/arch_alpha"]["choices"][1]="native";
$elem["apt-build/arch_alpha"]["choices"][2]="ev4";
$elem["apt-build/arch_alpha"]["choices"][3]="ev5";
$elem["apt-build/arch_alpha"]["choices"][4]="ev56";
$elem["apt-build/arch_alpha"]["choices"][5]="pca56";
$elem["apt-build/arch_alpha"]["choices"][6]="ev6";
$elem["apt-build/arch_alpha"]["description"]="Architecture:
 If your architecture is not here, choose one and edit your configuration
 file (/etc/apt/apt-build.conf) by hand, and please do a wishlist bugreport.
";
$elem["apt-build/arch_alpha"]["descriptionde"]="Rechnerarchitektur:
 Wenn Ihre Rechnerarchitektur hier nicht aufgelistet ist, wählen Sie irgendeine aus, ändern die Konfigurationsdatei (/etc/apt/apt-build.conf) per Hand und schreiben bitte einen Fehlerbericht (wishlist).
";
$elem["apt-build/arch_alpha"]["descriptionfr"]="Architecture :
 Si votre architecture n'est pas présente, choisissez-en une, puis modifiez le fichier de configuration (/etc/apt/apt-build.conf) vous-même, et remplissez un rapport de bogue (de sévérité « wishlist »).
";
$elem["apt-build/arch_alpha"]["default"]="native";
$elem["apt-build/options"]["type"]="string";
$elem["apt-build/options"]["description"]="Options to add to gcc:
";
$elem["apt-build/options"]["descriptionde"]="Zusätzliche Optionen für GCC:
";
$elem["apt-build/options"]["descriptionfr"]="Options à utiliser avec gcc :
";
$elem["apt-build/options"]["default"]="";
$elem["apt-build/make_options"]["type"]="string";
$elem["apt-build/make_options"]["description"]="Options to add to make:
";
$elem["apt-build/make_options"]["descriptionde"]="Zusätzliche Optionen für Make:
";
$elem["apt-build/make_options"]["descriptionfr"]="Options à utiliser avec make :
";
$elem["apt-build/make_options"]["default"]="";
$elem["apt-build/archtype"]["type"]="string";
$elem["apt-build/archtype"]["description"]="for internal use
";
$elem["apt-build/archtype"]["descriptionde"]="";
$elem["apt-build/archtype"]["descriptionfr"]="";
$elem["apt-build/archtype"]["default"]="";
PKG_OptionPageTail2($elem);
?>
