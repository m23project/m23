<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mailman");

$elem["mailman/site_languages"]["type"]="multiselect";
$elem["mailman/site_languages"]["choices"][1]="ar (Arabic)";
$elem["mailman/site_languages"]["choices"][2]="ca (Catalan)";
$elem["mailman/site_languages"]["choices"][3]="cs (Czech)";
$elem["mailman/site_languages"]["choices"][4]="da (Danish)";
$elem["mailman/site_languages"]["choices"][5]="de (German)";
$elem["mailman/site_languages"]["choices"][6]="en (English)";
$elem["mailman/site_languages"]["choices"][7]="es (Spanish)";
$elem["mailman/site_languages"]["choices"][8]="et (Estonian)";
$elem["mailman/site_languages"]["choices"][9]="eu (Basque)";
$elem["mailman/site_languages"]["choices"][10]="fi (Finnish)";
$elem["mailman/site_languages"]["choices"][11]="fr (French)";
$elem["mailman/site_languages"]["choices"][12]="hr (Croatian)";
$elem["mailman/site_languages"]["choices"][13]="hu (Hungarian)";
$elem["mailman/site_languages"]["choices"][14]="ia (Interlingua)";
$elem["mailman/site_languages"]["choices"][15]="it (Italian)";
$elem["mailman/site_languages"]["choices"][16]="ja (Japanese)";
$elem["mailman/site_languages"]["choices"][17]="ko (Korean)";
$elem["mailman/site_languages"]["choices"][18]="lt (Lithuanian)";
$elem["mailman/site_languages"]["choices"][19]="nl (Dutch)";
$elem["mailman/site_languages"]["choices"][20]="no (Norwegian)";
$elem["mailman/site_languages"]["choices"][21]="pl (Polish)";
$elem["mailman/site_languages"]["choices"][22]="pt (Portuguese)";
$elem["mailman/site_languages"]["choices"][23]="pt_BR (Brasilian Portuguese)";
$elem["mailman/site_languages"]["choices"][24]="ro (Romanian)";
$elem["mailman/site_languages"]["choices"][25]="ru (Russian)";
$elem["mailman/site_languages"]["choices"][26]="sl (Slovenian)";
$elem["mailman/site_languages"]["choices"][27]="sr (Serbian)";
$elem["mailman/site_languages"]["choices"][28]="sv (Swedish)";
$elem["mailman/site_languages"]["choices"][29]="tr (Turkish)";
$elem["mailman/site_languages"]["choices"][30]="uk (Ukrainian)";
$elem["mailman/site_languages"]["choices"][31]="vi (Vietnamese)";
$elem["mailman/site_languages"]["choices"][32]="zh_CN (Chinese - China)";
$elem["mailman/site_languages"]["choicesde"][1]="ar (Arabisch)";
$elem["mailman/site_languages"]["choicesde"][2]="ca (Katalanisch)";
$elem["mailman/site_languages"]["choicesde"][3]="cz (Tschechisch)";
$elem["mailman/site_languages"]["choicesde"][4]="da (Dänisch)";
$elem["mailman/site_languages"]["choicesde"][5]="de (Deutsch)";
$elem["mailman/site_languages"]["choicesde"][6]="en (Englisch)";
$elem["mailman/site_languages"]["choicesde"][7]="es (Spanisch)";
$elem["mailman/site_languages"]["choicesde"][8]="et (Estnisch)";
$elem["mailman/site_languages"]["choicesde"][9]="eu (Baskisch)";
$elem["mailman/site_languages"]["choicesde"][10]="fi (Finnisch)";
$elem["mailman/site_languages"]["choicesde"][11]="fr (Französisch)";
$elem["mailman/site_languages"]["choicesde"][12]="hr (Kroatisch)";
$elem["mailman/site_languages"]["choicesde"][13]="hu (Ungarisch)";
$elem["mailman/site_languages"]["choicesde"][14]="ia (Interlingua)";
$elem["mailman/site_languages"]["choicesde"][15]="it (Italienisch)";
$elem["mailman/site_languages"]["choicesde"][16]="ja (Japanisch)";
$elem["mailman/site_languages"]["choicesde"][17]="ko (Koreanisch)";
$elem["mailman/site_languages"]["choicesde"][18]="lt (Litauisch)";
$elem["mailman/site_languages"]["choicesde"][19]="nl (Niederländisch)";
$elem["mailman/site_languages"]["choicesde"][20]="no (Norwegisch)";
$elem["mailman/site_languages"]["choicesde"][21]="pl (Polnisch)";
$elem["mailman/site_languages"]["choicesde"][22]="pt (Portugiesisch)";
$elem["mailman/site_languages"]["choicesde"][23]="pt_BR (brasilianisches Portugiesisch)";
$elem["mailman/site_languages"]["choicesde"][24]="ro (Rumänisch)";
$elem["mailman/site_languages"]["choicesde"][25]="ru (Russisch)";
$elem["mailman/site_languages"]["choicesde"][26]="sl (Slowenisch)";
$elem["mailman/site_languages"]["choicesde"][27]="sr (Serbisch)";
$elem["mailman/site_languages"]["choicesde"][28]="sv (Schwedisch)";
$elem["mailman/site_languages"]["choicesde"][29]="tr (Türkisch)";
$elem["mailman/site_languages"]["choicesde"][30]="uk (Ukrainisch)";
$elem["mailman/site_languages"]["choicesde"][31]="vi (Vietnamesisch)";
$elem["mailman/site_languages"]["choicesde"][32]="zh_CN (Chinesisch - China)";
$elem["mailman/site_languages"]["choicesfr"][1]="ar (arabe)";
$elem["mailman/site_languages"]["choicesfr"][2]="ca (catalan)";
$elem["mailman/site_languages"]["choicesfr"][3]="cs (tchèque)";
$elem["mailman/site_languages"]["choicesfr"][4]="da (danois)";
$elem["mailman/site_languages"]["choicesfr"][5]="de (allemand)";
$elem["mailman/site_languages"]["choicesfr"][6]="en (anglais)";
$elem["mailman/site_languages"]["choicesfr"][7]="es (espagnol)";
$elem["mailman/site_languages"]["choicesfr"][8]="et (estonien)";
$elem["mailman/site_languages"]["choicesfr"][9]="eu (basque)";
$elem["mailman/site_languages"]["choicesfr"][10]="fi (finnois)";
$elem["mailman/site_languages"]["choicesfr"][11]="fr (français)";
$elem["mailman/site_languages"]["choicesfr"][12]="hr (croate)";
$elem["mailman/site_languages"]["choicesfr"][13]="hu (hongrois)";
$elem["mailman/site_languages"]["choicesfr"][14]="ia (interlangua)";
$elem["mailman/site_languages"]["choicesfr"][15]="it (italien)";
$elem["mailman/site_languages"]["choicesfr"][16]="ja (japonais)";
$elem["mailman/site_languages"]["choicesfr"][17]="ko (coréen)";
$elem["mailman/site_languages"]["choicesfr"][18]="lt (lituanien)";
$elem["mailman/site_languages"]["choicesfr"][19]="nl (néerlandais)";
$elem["mailman/site_languages"]["choicesfr"][20]="no (norvégien)";
$elem["mailman/site_languages"]["choicesfr"][21]="pl (polonais)";
$elem["mailman/site_languages"]["choicesfr"][22]="pt (portugais)";
$elem["mailman/site_languages"]["choicesfr"][23]="pt_BR (portugais du Brésil)";
$elem["mailman/site_languages"]["choicesfr"][24]="ro (roumain)";
$elem["mailman/site_languages"]["choicesfr"][25]="ru (russe)";
$elem["mailman/site_languages"]["choicesfr"][26]="sl (slovène)";
$elem["mailman/site_languages"]["choicesfr"][27]="sr (serbe)";
$elem["mailman/site_languages"]["choicesfr"][28]="sv (suédois)";
$elem["mailman/site_languages"]["choicesfr"][29]="tr (turc)";
$elem["mailman/site_languages"]["choicesfr"][30]="uk (ukrainien)";
$elem["mailman/site_languages"]["choicesfr"][31]="vi (vietnamien)";
$elem["mailman/site_languages"]["choicesfr"][32]="zh_CN (chinois simplifié)";
$elem["mailman/site_languages"]["description"]="Languages to support:
 For each supported language, Mailman stores default language
 specific texts in /etc/mailman/LANG/ giving them conffile like
 treatment with the help of ucf.  This means approximately 150kB for
 each supported language on the root file system.
 .
 If you need a different set of languages at a later time, just run
 dpkg-reconfigure mailman.
 .
 NOTE: Languages enabled on existing mailing lists are forcibly
 re-enabled when deselected and mailman needs at least one language for
 displaying its messages.
";
$elem["mailman/site_languages"]["descriptionde"]="Sprachen, die unterstützt werden sollen:
 Für jede unterstützte Sprache speichert Mailman sprachspezifische Standardtexte in /etc/mailmain/LANG/, wobei jedem Text mit Hilfe von ucf das für Konfigurationsdateien übliche Verfahren zuteil wird. Pro unterstützter Sprache werden auf dem root-Dateisystem rund 150kB benötigt.
 .
 Wenn Sie zu einem späteren Zeitpunkt andere Sprachen benötigen, dann starten Sie einfach »dpkg-reconfigure mailman«.
 .
 HINWEIS: Werden Sprachen abgewählt, die von existierenden Mailinglisten genutzt werden, so werden diese zwangsweise wieder aktiviert. Außerdem benötigt mailman wenigstens eine Sprache, um seine Meldungen anzuzeigen.
";
$elem["mailman/site_languages"]["descriptionfr"]="Langues à gérer :
 Mailman garde les textes de chaque langue reconnue dans /etc/mailman/LANG/. Ces fichiers sont alors gérés comme des fichiers de configuration grâce au programme ucf. Chaque langue occupe environ 150 Ko sur le système de fichiers racine.
 .
 Quand vous voudrez ajouter ou retirer des langues, veuillez exécuter « dpkg-reconfigure mailman ».
 .
 Notes : les langues gérées par des listes de discussion existantes sont automatiquement réactivées même si vous les désactivez ici. Mailman a besoin d'au moins une langue activée pour afficher ses messages.
";
$elem["mailman/site_languages"]["default"]="en (English)";
$elem["mailman/used_languages"]["type"]="string";
$elem["mailman/used_languages"]["description"]="for internal use: holding result of scan

";
$elem["mailman/used_languages"]["descriptionde"]="";
$elem["mailman/used_languages"]["descriptionfr"]="";
$elem["mailman/used_languages"]["default"]="";
$elem["mailman/create_site_list"]["type"]="note";
$elem["mailman/create_site_list"]["description"]="Missing site list
 Mailman needs a so-called \"site list\", which is the list from which
 password reminders and such are sent out from.  This list needs to be
 created before mailman will start.
 .
 To create the list, run \"newlist mailman\" and follow the instructions
 on-screen.  Note that you also need to start mailman after that,
 using /etc/init.d/mailman start.
";
$elem["mailman/create_site_list"]["descriptionde"]="Fehlende Site-Liste
 Mailman benötigt eine so genannte Site-Liste, welches die Mailingliste ist, von der die Passwort-Erinnerungen und Ähnliches abgesendet werden. Diese Liste muss erstellt werden, bevor mailman überhaupt erst startet.
 .
 Um die Liste zu erzeugen, führen Sie »newlist mailman« aus und folgen den Anweisungen auf dem Bildschirm. Beachten Sie, dass mailman danach gestartet werden muss, indem »/etc/init.d/mailman start« aufgerufen wird.
";
$elem["mailman/create_site_list"]["descriptionfr"]="Pas de liste du site
 Mailman a besoin d'une liste du site (« site list »). Elle permet d'envoyer les rappels pour les mots de passe, etc. Elle doit être créée avant le lancement de Mailman.
 .
 Pour créer cette liste, exécuter « newlist mailman » et suivez les instructions qui apparaissent à l'écran. Il est ensuite nécessaire de redémarrer mailman avec la commande « /etc/init.d/mailman start ».
";
$elem["mailman/create_site_list"]["default"]="";
$elem["mailman/default_server_language"]["type"]="select";
$elem["mailman/default_server_language"]["description"]="Default language for Mailman:
 The web page will be shown in this language, and in general, Mailman
 will use this language to communicate with the user.
";
$elem["mailman/default_server_language"]["descriptionde"]="Standardsprache für Mailman:
 Die Web-Seite wird in dieser Sprache angezeigt und generell wird Mailman diese Sprache benutzen, um mit dem Benutzer zu kommunizieren.
";
$elem["mailman/default_server_language"]["descriptionfr"]="Langue par défaut de Mailman :
 La page web est affichée dans la langue choisie et Mailman se sert aussi de cette langue pour communiquer avec les utilisateurs.
";
$elem["mailman/default_server_language"]["default"]="en (English)";
$elem["mailman/queue_files_present"]["type"]="select";
$elem["mailman/queue_files_present"]["choices"][1]="abort installation";
$elem["mailman/queue_files_present"]["choicesde"][1]="Installation abbrechen";
$elem["mailman/queue_files_present"]["choicesfr"][1]="Interrompre l'installation";
$elem["mailman/queue_files_present"]["description"]="Old queue files present
 The directory /var/lib/mailman/qfiles contains files. It needs to be
 empty for the upgrade to work properly. You can try to handle them by:
  - Stop new messages from coming in (at the MTA level).
  - Start a mailman queue runner: /etc/init.d/mailman start
  - Let it run until all messages are handled.
    If they don't all get handled in a timely manner, look at the logs
    to try to understand why and solve the cause.
  - Stop it: /etc/init.d/mailman stop
  - Retry the upgrade.
  - Let messages come in again.
 You can also decide to simply remove the files, which will make
 Mailman forget about (and lose) the corresponding emails.
 .
 If these files correspond to shunted messages, you have to either
 delete them or unshunt them (with /var/lib/mailman/bin/unshunt).
 Shunted messages are messages on which Mailman has already abandoned
 any further processing because of an error condition, but that are
 kept for admin review. You can use /var/lib/mailman/bin/show_qfiles to
 examine the contents of the queues.
 .
 You have the option to continue installation regardless of this problem, at
 the risk of losing the messages in question or breaking your Mailman setup.
";
$elem["mailman/queue_files_present"]["descriptionde"]="Alte Dateien befinden sich in der Warteschlange
 Das Verzeichnis /var/lib/mailman/qfiles enthält Dateien. Damit das Upgrade sauber funktioniert, sollte es leer sein. Sie können folgendermaßen mit ihnen verfahren:
  - Verhindern Sie, dass neue Nachrichten in die Warteschlange gelangen
    (dies erledigen Sie im MTA).
  - Lassen Sie Mailman die Warteschlange abarbeiten:
    »/etc/init.d/mailman start«
  - Lassen Sie Mailman laufen, bis alle Nachrichten verarbeitet wurden.
    Falls nicht alle halbwegs schnell verarbeitet werden, sehen Sie in
    die Log-Dateien, um herauszufinden, warum es so lange dauert und wie
    Sie das Problem lösen können.
  - Stoppen Sie Mailmain: »/etc/init.d/mailman stop«
  - Versuchen Sie erneut, das Upgrade durchzuführen.
  - Stellen Sie alles wieder so ein, dass Nachrichten wieder eintreffen.
 Sie können sich auch dafür entscheiden, die Dateien einfach zu löschen. Das würde dazu führen, dass Mailman die dazugehörigen E-Mails vergisst (und verliert).
 .
 Falls diese Dateien zu »zwischengeparkten« Nachrichten gehören, dann müssen Sie die Dateien entweder löschen oder den »zwischengeparkt«-Status aufheben (mit »/var/lib/mailman/bin/unshunt«). Zwischengeparkte Nachrichten sind Nachrichten, welche Mailman nicht weiter verarbeitet, da ein Fehler aufgetreten ist. Sie wurden jedoch gespeichert, damit der Administrator sie begutachten kann. Sie können »/var/lib/mailman/bin/show_qfiles« benutzen, um den Inhalt der Warteschlangen zu untersuchen.
 .
 Sie haben die Möglichkeit, die Installation trotz dieses Problems fortzusetzen, riskieren aber, dadurch die fraglichen Nachrichten zu verlieren oder Ihre Mailman-Konfiguration zu beschädigen.
";
$elem["mailman/queue_files_present"]["descriptionfr"]="Fichiers anciens dans la file d'attente
 Le répertoire /var/lib/mailman/qfiles contient des fichiers. Il doit être vide pour que la mise à jour se déroule correctement. Si ces fichiers sont des messages qui n'ont pas encore été traités, vous pouvez procéder comme suit :
  - stoppez l'arrivée des nouveaux messages (au niveau MTA) ;
  - démarrez mailman avec « /etc/init.d/mailman start » pour vider la file d'attente ;
  - laissez-le s'exécuter jusqu'à ce que tous les messages soient traités ;
  - s'il n'a pas traité tous les messages dans un temps raisonnable, consultez les fichiers de journaux pour comprendre le dysfonctionnement et tenter de le résoudre ;
  - arrêtez mailman avec « /etc/init.d/mailman stop » ;
  - essayez de nouveau la mise à jour ;
  - autorisez de nouveau l'arrivée des messages (au niveau MTA).
 Vous pouvez aussi supprimer ces fichiers. Mailman ignorera les messages correspondants.
 .
 Si ces fichiers correspondent à des messages mis de côté, vous devez les détruire ou les traiter à nouveau (avec /var/lib/mailman/bin/unshunt). Les messages mis de côté sont des messages que mailman ne traitera plus car ils provoquent une erreur. Ils sont conservés pour étude. Vous pouvez utiliser /var/lib/mailman/bin/show_qfiles pour examiner le contenu de la file d'attente.
 .
 Vous pouvez continuer l'installation en ignorant ce problème ce qui pourrait provoquer la perte de ces messages ou déstabiliser cette installation de Mailman.
";
$elem["mailman/queue_files_present"]["default"]="abort installation";
PKG_OptionPageTail2($elem);
?>
