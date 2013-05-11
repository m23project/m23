<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("jspwiki");

$elem["jspwiki/applicationname"]["type"]="string";
$elem["jspwiki/applicationname"]["description"]="Default application name:
 Please enter the name of the wiki. This name appears in HTML titles
 and log files, and is usually the same as the top level URL (for
 instance 'http://www.example.org/JSPWiki').
";
$elem["jspwiki/applicationname"]["descriptionde"]="Voreingestellter Anwendungsname:
 Bitte geben Sie den Namen des Wikis ein. Dieser Name taucht in HTML-Titeln und Log-Dateien auf. Er stimmt normalerweise mit der URL der obersten Stufe (zum Beispiel »http://www.example.org/JSPWiki«) überein.
";
$elem["jspwiki/applicationname"]["descriptionfr"]="Nom par défaut de l'application :
 Veuillez choisir le nom que portera le wiki. Ce nom apparaît dans les titres des pages HTML et dans les journaux. En général, ce nom est le même que l'URL de base (http://www.exemple.com/JSPWiki).
";
$elem["jspwiki/applicationname"]["default"]="JSPWiki";
$elem["jspwiki/baseurl"]["type"]="string";
$elem["jspwiki/baseurl"]["description"]="Default application name:
 Please enter the HTTP prefix of the wiki. This rewrites all JSPWiki
 internal link references, so it needs to be correct. It also needs
 to contain the trailing slash.
";
$elem["jspwiki/baseurl"]["descriptionde"]="Voreingestellter Anwendungsname:
 Bitte geben Sie den HTTP-Präfix des Wikis ein. Dieser schreibt alle JSPWiki-internen Link-Referenzen um, daher muss er korrekt sein. Er muss auch den abschließenden Schrägstrich enthalten.
";
$elem["jspwiki/baseurl"]["descriptionfr"]="Nom par défaut de l'application :
 Veuillez indiquer le préfixe HTTP du wiki. Ce choix permettra la réécriture de toutes les références internes de JSPWiki. Il est donc important qu'il soit correct. Il doit impérativement comporter un caractère « / » final.
";
$elem["jspwiki/baseurl"]["default"]="http://localhost:8180/JSPWiki/";
$elem["jspwiki/pageprovider"]["type"]="select";
$elem["jspwiki/pageprovider"]["choices"][1]="FileSystemProvider";
$elem["jspwiki/pageprovider"]["choices"][2]="RCSFileProvider";
$elem["jspwiki/pageprovider"]["description"]="Page storage mechanism to be used by JSPWiki:
 Please choose the mechanism that should be used for storing pages:
 .
  FileSystemProvider:     simply storing pages as files;
  RCSFileProvider:        using an external Revision Control System;
  VersioningFileProvider: versioning storage implemented in Java.
";
$elem["jspwiki/pageprovider"]["descriptionde"]="Seitenspeicher-Mechanismus, der von JSPWiki verwendet werden soll:
 Bitte wählen Sie den Mechanismus aus, der zum Speichern von Seiten verwendet werden soll:
 .
  FileSystemProvider:     speichert Seiten einfach als Dateien;
  RCSFileProvider:        verwendet ein externes Versionskontrollsystem;
  VersioningFileProvider: in Java implementierter versionierter Speicher.
";
$elem["jspwiki/pageprovider"]["descriptionfr"]="Méthode de stockage des pages pour JSPWiki :
 Veuillez choisir le mécanisme à utiliser pour conserver les pages :
 .
  FileSystemProvider :     pages conservées en tant que fichiers
  RCSFileProvider :        utilisation d'un système de gestion de                           configuration (RCS) pour conserver les pages
  VersioningFileProvider : stockage de pages basé sur Java, avec gestion
                           des versions.
";
$elem["jspwiki/pageprovider"]["default"]="FileSystemProvider";
$elem["jspwiki/usepagecache"]["type"]="boolean";
$elem["jspwiki/usepagecache"]["description"]="Should JSPWiki use a page cache?
 Page caching usually improves performance but increases memory usage.
";
$elem["jspwiki/usepagecache"]["descriptionde"]="Soll JSPWiki einen Seiten-Cache verwenden?
 Cachen von Seiten verbessert typischerweise die Leistung, erhöht aber den Speicherverbrauch.
";
$elem["jspwiki/usepagecache"]["descriptionfr"]="JSPWiki doit-il utiliser un cache pour les pages ?
 L'utilisation d'un cache améliore généralement les performances, mais augmente l'utilisation de la mémoire.
";
$elem["jspwiki/usepagecache"]["default"]="false";
$elem["jspwiki/baseurl"]["type"]="string";
$elem["jspwiki/baseurl"]["description"]="JSPWiki base URL:
 Base URLs are used to rewrite all of JSPWiki's internal references.
 .
 A trailing slash ('/') character is mandatory.
";
$elem["jspwiki/baseurl"]["descriptionde"]="Basis-URL des JSPWikis:
 Basis-URLs werden zum Umschreiben aller internen Referenzen von JSPWiki verwendet.
 .
 Ein abschließender Schrägstrich (»/«) ist zwingend erforderlich.
";
$elem["jspwiki/baseurl"]["descriptionfr"]="URL de base pour JSPWiki :
 Les URLs de base sont utilisées pour la réécriture de toutes les références internes de JSPWiki.
 .
 Un caractère barre oblique (« / ») final est obligatoire.
";
$elem["jspwiki/baseurl"]["default"]="";
$elem["jspwiki/encoding"]["type"]="select";
$elem["jspwiki/encoding"]["choices"][1]="ISO-8859-1";
$elem["jspwiki/encoding"]["description"]="Page encoding:
 Please choose which character encoding should be used by
 JSPWiki. UTF-8 is strongly recommended.
";
$elem["jspwiki/encoding"]["descriptionde"]="Seitenkodierung:
 Bitte wählen Sie aus, welche Zeichenkodierung von JSPWiki verwendet werden soll. UTF-8 wird nachdrücklich empfohlen.
";
$elem["jspwiki/encoding"]["descriptionfr"]="Encodage des pages :
 Veuillez choisir l'encodage à utiliser par JSPWiki. Il est fortement conseillé d'utiliser UTF-8.
";
$elem["jspwiki/encoding"]["default"]="UTF-8";
$elem["jspwiki/breaktitlewithspaces"]["type"]="boolean";
$elem["jspwiki/breaktitlewithspaces"]["description"]="Break at capitals in page names?
 Please choose whether page titles should be rendered using an extra
 space after each capital letter. This causes 'RSSPage' to be shown as
 'R S S Page'.
";
$elem["jspwiki/breaktitlewithspaces"]["descriptionde"]="Bei Großbuchstaben in Seitennamen trennen?
 Bitte wählen Sie aus, ob Seitentitel mit einem extra Leerzeichen nach jedem Großbuchstaben dargestellt werden sollen. Damit wird »RSSPage« als »R S S Page« angezeigt.
";
$elem["jspwiki/breaktitlewithspaces"]["descriptionfr"]="Faut-il ajouter un espace après les capitales dans les noms de pages ?
 Veuillez choisir si un espace doit être ajouté aux titres de pages après chaque lettre capitale. Ainsi, « RSSPage » deviendra « R S S Page ».
";
$elem["jspwiki/breaktitlewithspaces"]["default"]="false";
$elem["jspwiki/matchenglishplurals"]["type"]="boolean";
$elem["jspwiki/matchenglishplurals"]["description"]="Match plural form to singular form in page names?
 Choosing this option will cause JSPWiki to match 'PageLinks' to
 'PageLink' if 'PageLinks' is not found.
";
$elem["jspwiki/matchenglishplurals"]["descriptionde"]="Verknüpfe in Seitennamen Pluralformen mit Singularformen?
 Die Auswahl dieser Option führt dazu, dass in JSPWiki »PageLinks« auf »PageLink« passt, falls »PageLinks« nicht gefunden wird.
";
$elem["jspwiki/matchenglishplurals"]["descriptionfr"]="Faut-il faire pointer les pluriels vers les singuliers dans les noms de pages ?
 Ce choix permet, par exemple, de faire correspondre « PageLinks » à « PageLink » si « PageLinks » n'existe pas.
";
$elem["jspwiki/matchenglishplurals"]["default"]="false";
$elem["jspwiki/camelcaselinks"]["type"]="boolean";
$elem["jspwiki/camelcaselinks"]["description"]="Use CamelCase links?
 Please choose whether JSPWiki should consider traditional WikiNames
 (names of pages JustSmashedTogether without square brackets) as
 hyperlinks.
";
$elem["jspwiki/camelcaselinks"]["descriptionde"]="Verwende CamelCase-Links?
 Bitte wählen Sie aus, ob JSPWiki traditionelle WikiNamen (Namen von Seiten, die EinfachZusammengequetschtSind ohne eckige Klammern) als Querverweise (Hyperlinks) betrachten soll.
";
$elem["jspwiki/camelcaselinks"]["descriptionfr"]="Faut-il utiliser des liens CamelCase ?
 Veuillez choisir si JSPWiki considérera les « WikiNames » (nom des pages simplement accolés sans caractères « crochets ([]) ») comme des liens hypertextes.
";
$elem["jspwiki/camelcaselinks"]["default"]="false";
$elem["jspwiki/rss/generate"]["type"]="boolean";
$elem["jspwiki/rss/generate"]["description"]="Generate RSS feed?
 JSPWiki can generate a Rich Site Summary feed so that users can track
 changes to the wiki.
";
$elem["jspwiki/rss/generate"]["descriptionde"]="Erstelle RSS-Feed?
 JSPWiki kann einen »Rich Site Summary«-Feed erstellen, damit Benutzer die Änderungen am Wiki verfolgen können.
";
$elem["jspwiki/rss/generate"]["descriptionfr"]="Faut-il créer un flux RSS (« RSS feed ») ?
 JSPWiki peut créer un flux RSS (« Rich Site Summary » - Canal RSS) du site ce qui permet aux utilisateurs d'être informés des changements récents.
";
$elem["jspwiki/rss/generate"]["default"]="false";
$elem["jspwiki/rss/refresh"]["type"]="string";
$elem["jspwiki/rss/refresh"]["description"]="RSS refresh time in seconds:
 Please choose the delay between RSS feed refreshes.
";
$elem["jspwiki/rss/refresh"]["descriptionde"]="RSS-Aktualisierungszeit in Sekunden:
 Bitte wählen Sie den Zeitabstand zwischen Aktualisierungen des RSS-Feeds.
";
$elem["jspwiki/rss/refresh"]["descriptionfr"]="Délai de rafraîchissement du flux RSS (en secondes) :
 Veuillez choisir le délai à utiliser entre les rafraîchissements du flux RSS.
";
$elem["jspwiki/rss/refresh"]["default"]="3600";
$elem["jspwiki/rss/channeldescription"]["type"]="string";
$elem["jspwiki/rss/channeldescription"]["description"]="RSS channel description:
 Please give a channel description for the RSS feed, to be shown in
 channel catalogs. There is no maximum length, so include whatever
 details users may find helpful.
";
$elem["jspwiki/rss/channeldescription"]["descriptionde"]="RSS-Kanalbeschreibung:
 Bitte geben Sie eine Kanalbeschreibung für den RSS-Feed an, der dann im Kanalkatalog angezeigt wird. Es gibt keine Maximallänge, fügen Sie daher alle Details hinzu, die den Benutzern helfen könnten.
";
$elem["jspwiki/rss/channeldescription"]["descriptionfr"]="Description du canal RSS :
 Veuillez indiquer la description du flux RSS qui sera utilisé dans les clients RSS. La longueur de cette description est illimitée et il est conseillé d'être précis et complet pour donner suffisamment d'informations aux utilisateurs.
";
$elem["jspwiki/rss/channeldescription"]["default"]="";
$elem["jspwiki/rss/channellanguage"]["type"]="string";
$elem["jspwiki/rss/channellanguage"]["description"]="RSS channel language:
 Please choose the RSS feed language. This should match the language of the
 wiki.
";
$elem["jspwiki/rss/channellanguage"]["descriptionde"]="Sprache des RSS-Kanals
 Bitte wählen Sie die Sprache des RSS-Feeds. Diese sollte zu der Sprache des Wikis passen.
";
$elem["jspwiki/rss/channellanguage"]["descriptionfr"]="Langue du canal RSS :
 Veuillez choisir la langue à utiliser dans le flux RSS. Ce choix devrait correspondre à la langue utilisée sur le wiki.
";
$elem["jspwiki/rss/channellanguage"]["default"]="en-us";
$elem["jspwiki/attachments/provider"]["type"]="select";
$elem["jspwiki/attachments/provider"]["choices"][1]="BasicAttachmentProvider";
$elem["jspwiki/attachments/provider"]["choicesde"][1]="BasicAttachmentProvider";
$elem["jspwiki/attachments/provider"]["choicesfr"][1]="BasicAttachmentProvider";
$elem["jspwiki/attachments/provider"]["description"]="Attachment storage mechanism to use:
 'BasicAttachmentProvider' uses the same directory structure as the
 selected page storage mechanism. It simply stores the attachments in
 a dedicated directory for a page.
";
$elem["jspwiki/attachments/provider"]["descriptionde"]="Zu verwendender Speichermechanismus für Anhänge:
 »EinfacherAnhangsanbieter« verwendet die gleiche Verzeichnisstruktur wie der ausgewählte Seitenspeichermechanismus. Es speichert einfach die Anhänge in einem dedizierten Verzeichnis für eine Seite.
";
$elem["jspwiki/attachments/provider"]["descriptionfr"]="Mécanisme de stockage des attachements :
 « BasicAttachmentProvider » utilise la même structure de dossier que le fournisseur de pages sélectionné. Les attachements sont simplement enregistrés dans des répertoires dédiés à chaque page.
";
$elem["jspwiki/attachments/provider"]["default"]="BasicAttachmentProvider";
$elem["jspwiki/purgewikifiles"]["type"]="boolean";
$elem["jspwiki/purgewikifiles"]["description"]="Should all wiki pages be deleted on package purge?
 Please choose whether you want all wiki pages to be removed when the
 package is purged.
";
$elem["jspwiki/purgewikifiles"]["descriptionde"]="Sollen alle Wiki-Seiten beim vollständigen Entfernen des Pakets gelöscht werden?
 Bitte wählen Sie aus, ob alle Wiki-Seiten gelöscht werden sollen, wenn das Paket endgültig entfernt (»purged«) wird.
";
$elem["jspwiki/purgewikifiles"]["descriptionfr"]="Faut-il supprimer toutes les pages du wiki à la purge du paquet ?
 Veuillez choisir si l'ensemble des pages du wiki doivent être supprimées quand le paquet est purgé.
";
$elem["jspwiki/purgewikifiles"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
