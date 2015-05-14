<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("plan");

$elem["plan/holiday"]["type"]="select";
$elem["plan/holiday"]["choices"][1]="australia";
$elem["plan/holiday"]["choices"][2]="austria";
$elem["plan/holiday"]["choices"][3]="bavarian";
$elem["plan/holiday"]["choices"][4]="belgium";
$elem["plan/holiday"]["choices"][5]="belgium_french";
$elem["plan/holiday"]["choices"][6]="canada";
$elem["plan/holiday"]["choices"][7]="combi";
$elem["plan/holiday"]["choices"][8]="czech";
$elem["plan/holiday"]["choices"][9]="denmark";
$elem["plan/holiday"]["choices"][10]="dutch";
$elem["plan/holiday"]["choices"][11]="finnish";
$elem["plan/holiday"]["choices"][12]="french";
$elem["plan/holiday"]["choices"][13]="frswiss";
$elem["plan/holiday"]["choices"][14]="german";
$elem["plan/holiday"]["choices"][15]="greek";
$elem["plan/holiday"]["choices"][16]="hungary";
$elem["plan/holiday"]["choices"][17]="italy";
$elem["plan/holiday"]["choices"][18]="japan";
$elem["plan/holiday"]["choices"][19]="norway";
$elem["plan/holiday"]["choices"][20]="portugal";
$elem["plan/holiday"]["choices"][21]="quebec";
$elem["plan/holiday"]["choices"][22]="spain";
$elem["plan/holiday"]["choices"][23]="swedish";
$elem["plan/holiday"]["choices"][24]="uk";
$elem["plan/holiday"]["choices"][25]="us";
$elem["plan/holiday"]["choicesde"][1]="Australien";
$elem["plan/holiday"]["choicesde"][2]="Österreich";
$elem["plan/holiday"]["choicesde"][3]="bayrisch";
$elem["plan/holiday"]["choicesde"][4]="Belgien";
$elem["plan/holiday"]["choicesde"][5]="belgisch-französisch";
$elem["plan/holiday"]["choicesde"][6]="Kanada";
$elem["plan/holiday"]["choicesde"][7]="Kombiniert";
$elem["plan/holiday"]["choicesde"][8]="tschechisch";
$elem["plan/holiday"]["choicesde"][9]="Dänemark";
$elem["plan/holiday"]["choicesde"][10]="niederländisch";
$elem["plan/holiday"]["choicesde"][11]="finnisch";
$elem["plan/holiday"]["choicesde"][12]="französisch";
$elem["plan/holiday"]["choicesde"][13]="französisch-schweizerisch";
$elem["plan/holiday"]["choicesde"][14]="deutsch";
$elem["plan/holiday"]["choicesde"][15]="griechisch";
$elem["plan/holiday"]["choicesde"][16]="Ungarn";
$elem["plan/holiday"]["choicesde"][17]="Italien";
$elem["plan/holiday"]["choicesde"][18]="Japan";
$elem["plan/holiday"]["choicesde"][19]="Norwegen";
$elem["plan/holiday"]["choicesde"][20]="Portugal";
$elem["plan/holiday"]["choicesde"][21]="Quebec";
$elem["plan/holiday"]["choicesde"][22]="Spanien";
$elem["plan/holiday"]["choicesde"][23]="schwedisch";
$elem["plan/holiday"]["choicesde"][24]="England";
$elem["plan/holiday"]["choicesde"][25]="Vereinigte Staaten von Amerika";
$elem["plan/holiday"]["choicesfr"][1]="australien";
$elem["plan/holiday"]["choicesfr"][2]="autrichien";
$elem["plan/holiday"]["choicesfr"][3]="bavarois";
$elem["plan/holiday"]["choicesfr"][4]="belge";
$elem["plan/holiday"]["choicesfr"][5]="wallon";
$elem["plan/holiday"]["choicesfr"][6]="canadien";
$elem["plan/holiday"]["choicesfr"][7]="tous ensemble";
$elem["plan/holiday"]["choicesfr"][8]="tchèque";
$elem["plan/holiday"]["choicesfr"][9]="danois";
$elem["plan/holiday"]["choicesfr"][10]="hollandais";
$elem["plan/holiday"]["choicesfr"][11]="finlandais";
$elem["plan/holiday"]["choicesfr"][12]="français";
$elem["plan/holiday"]["choicesfr"][13]="suisse romand";
$elem["plan/holiday"]["choicesfr"][14]="allemand";
$elem["plan/holiday"]["choicesfr"][15]="grec";
$elem["plan/holiday"]["choicesfr"][16]="hongrois";
$elem["plan/holiday"]["choicesfr"][17]="italien";
$elem["plan/holiday"]["choicesfr"][18]="japonais";
$elem["plan/holiday"]["choicesfr"][19]="norvégien";
$elem["plan/holiday"]["choicesfr"][20]="portugais";
$elem["plan/holiday"]["choicesfr"][21]="québécois";
$elem["plan/holiday"]["choicesfr"][22]="espagnol";
$elem["plan/holiday"]["choicesfr"][23]="suédois";
$elem["plan/holiday"]["choicesfr"][24]="anglais";
$elem["plan/holiday"]["choicesfr"][25]="américain";
$elem["plan/holiday"]["description"]="What default holiday scheme do you want?
 Please choose a holiday scheme from the list. This will be the default
 holiday used in plan. You can override this default by copying the
 required holiday file from /usr/share/doc/plan/examples/holiday to
 /etc/plan/holiday.
 .
 Alternatively, per user holiday schemes might be had by copying the
 required holiday files to ~/.plan.dir/holiday.
";
$elem["plan/holiday"]["descriptionde"]="Welches Standard-Ferienschema soll verwendet werden?
 Bitte wählen Sie ein Ferienschema aus der Liste. Dies wird das Standard-Ferienschema für Plan. Sie können die Standardeinstellung außer Kraft setzen, indem Sie die benötigten Ferien-Dateien aus /usr/share/doc/plan/examples/holiday nach /etc/plan/holiday kopieren.
 .
 Alternativ kann jeder Benutzer für sich selbst die benötigten Dateien nach ~/.plan.dir/holiday kopieren.
";
$elem["plan/holiday"]["descriptionfr"]="Quel système de jours fériés faut-il utiliser par défaut ?
 Veuillez choisir dans la liste le système de jours fériés que plan utilisera par défaut. Vous pouvez revenir sur ce choix en copiant le fichier de jours fériés dont vous avez besoin de /usr/share/doc/plan/examples/holiday dans /etc/plan/holiday.
 .
 Il est aussi possible de choisir un système de jours fériés différent pour chaque utilisateur en copiant les fichiers dans ~/.plan.dir/holiday.
";
$elem["plan/holiday"]["default"]="us";
PKG_OptionPageTail2($elem);
?>
