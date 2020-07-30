<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("x2goserver-desktopsharing");

$elem["x2goserver-desktopsharing/create-group-for-sharing"]["type"]="boolean";
$elem["x2goserver-desktopsharing/create-group-for-sharing"]["description"]="Create x2godesktopsharing group?
  X2Go Desktop Sharing grants users the privileges to share X2Go/X11
  desktop session with one another via membership of a common POSIX
  group. The group being used for this can be configured system-wide and
  on a per-user basis (in X2Go Desktop Sharing's user configuration).
  .
  Please specify whether X2Go Desktop Sharing should set up the group
  \"x2godesktopsharing\" as the system-wide default group used for this
  purpose.
  .
  Alternatively, if you reject this option, you will be asked to assign
  the role to some already existing group.
  .
  With no such group users will not be able to share X2Go/X11 desktop
  sessions.
";
$elem["x2goserver-desktopsharing/create-group-for-sharing"]["descriptionde"]="Soll die Gruppe »x2godesktopsharing« erstellt werden?
  Die gemeinsame Benutzung von X2Go-Arbeitsflächen gewährt Anwendern die
  Rechte, X2Go-/X11-Arbeitsflächensitzungen mit Anderen über die Mitgliedschaft
  in einer gemeinsamen POSIX-Gruppe gemeinsam zu verwenden. Die Gruppe, die
  dazu benutzt wird, kann systemweit oder individuell konfiguriert werden (in
  der X2Go-Benutzerkonfiguration zum gemeinsamen Benutzen von Arbeitsflächen).
  .
  Bitte geben Sie an, ob die gemeinsame Benutzung von X2Go-Arbeitsflächen die
  Gruppe »x2godesktopsharing« als systemweite Standardgruppe für diesen Zweck
  einrichten soll.
  .
  Alternativ, falls Sie diese Option ablehnen, werden Sie gebeten, die Rolle
  einer bestehenden Gruppe zuzuweisen.
  .
  Ohne eine derartige Gruppe werden Anwender nicht in der Lage sein, ihre
  X2Go-/X11-Arbeitsflächensitzungen gemeinsam zu benutzen.
";
$elem["x2goserver-desktopsharing/create-group-for-sharing"]["descriptionfr"]="Faut-il créer le groupe x2godesktopsharing ?
  Le partage de bureau X2Go octroie aux utilisateurs des privilèges
  pour le partage de sessions de bureau X2Go/X11 les uns avec les autres
  et ce par l'appartenance à un groupe POSIX commun. Le groupe utilisé
  pour cela peut être configuré pour l'ensemble du système et pour chaque
  utilisateur (dans la configuration utilisateur du partage de bureau X2Go).
  .
  Veuillez préciser si le partage de bureau X2Go doit configurer
  le groupe « x2godesktopsharing » comme groupe par défaut pour
  l'ensemble du système dans ce but.
  .
  Autrement, si vous rejetez cette option, il vous sera demandé d'attribuer
  ce rôle à un groupe déjà existant.
  .
  Sans un tel groupe, les utilisateurs ne pourront pas partager de session
  de bureau X2Go/X11.
";
$elem["x2goserver-desktopsharing/create-group-for-sharing"]["default"]="true";
$elem["x2goserver-desktopsharing/use-existing-group-for-sharing"]["type"]="boolean";
$elem["x2goserver-desktopsharing/use-existing-group-for-sharing"]["description"]="Use existing group for X2Go Desktop Sharing?
  If X2Go Desktop Sharing can use an existing group (possibly from an LDAP
  database) then you can specify this group name on the next screen.
";
$elem["x2goserver-desktopsharing/use-existing-group-for-sharing"]["descriptionde"]="Soll eine bestehende Gruppe zum gemeinsamen Benutzen von X2Go-Arbeitsflächen verwendet werden?
  Falls das gemeinsame Benutzen von X2Go-Arbeitsflächen eine bestehende Gruppe
  verwenden kann (möglicherweise aus einer LDAP-Datenbank), dann können Sie den
  Namen dieser Gruppe im nächsten Schritt angeben.
";
$elem["x2goserver-desktopsharing/use-existing-group-for-sharing"]["descriptionfr"]="Faut-il utiliser un groupe existant pour le partage de bureau X2Go ?
  Si le partage de bureau X2Go peut utiliser un groupe existant
  (potentiellement depuis une base de données LDAP), vous pourrez
  alors préciser le nom de ce groupe dans la prochaine fenêtre.
";
$elem["x2goserver-desktopsharing/use-existing-group-for-sharing"]["default"]="false";
$elem["x2goserver-desktopsharing/group-sharing"]["type"]="string";
$elem["x2goserver-desktopsharing/group-sharing"]["description"]="Group to use for X2Go Desktop Sharing:
  Please specify the name of the existing POSIX group that you want to
  assign X2Go Desktop Sharing privileges to.
  .
  An empty string will be replaced by the \"root\" group.
";
$elem["x2goserver-desktopsharing/group-sharing"]["descriptionde"]="Gruppe, die zum gemeinsamen Benutzen der X2Go-Arbeitsfläche verwendet werden soll:
  Bitte geben Sie den Namen der bestehenden POSIX-Gruppe an, der Sie die
  Rechte zum gemeinsamen Benutzen von X2Go-Arbeitsflächen zuweisen wollen.
  .
  Eine leere Zeichenkette wird durch die Gruppe »root« ersetzt.
";
$elem["x2goserver-desktopsharing/group-sharing"]["descriptionfr"]="Veuillez indiquer le groupe à utiliser pour le partage de bureau X2Go :
  Veuillez préciser le nom du groupe POSIX existant pour lequel vous
  souhaitez attribuer les privilèges du partage de bureau X2Go.
  .
  Une chaîne vide sera remplacée par le groupe « root ».
";
$elem["x2goserver-desktopsharing/group-sharing"]["default"]="x2godesktopsharing";
$elem["x2goserver-desktopsharing/no-such-group"]["type"]="error";
$elem["x2goserver-desktopsharing/no-such-group"]["description"]="Non-existing group
  The given group does not exist on this system. You should specify an
  already existing group.
";
$elem["x2goserver-desktopsharing/no-such-group"]["descriptionde"]="Gruppe besteht nicht
  Die angegebene Gruppe besteht auf diesem System nicht, Sie sollten eine
  bereits bestehende Gruppe angeben.
";
$elem["x2goserver-desktopsharing/no-such-group"]["descriptionfr"]="Groupe inexistant
  Le groupe donné n'existe pas sur ce système. Vous devez préciser
  un nom de groupe existant.
";
$elem["x2goserver-desktopsharing/no-such-group"]["default"]="";
$elem["x2goserver-desktopsharing/auto-start-on-logon"]["type"]="boolean";
$elem["x2goserver-desktopsharing/auto-start-on-logon"]["description"]="Auto-start X2Go Desktop Sharing applet?
  For an X2Go/X11 desktop session to be accessible via X2Go Desktop
  Sharing, the X2Go Desktop Sharing applet needs to be running. It
  advertises the user's X2Go/X11 session through an access controlled
  socket to X2Go client applications.
  .
  The applet can be configured to start automatically on desktop session
  startup, but for security reasons this is not the default.
";
$elem["x2goserver-desktopsharing/auto-start-on-logon"]["descriptionde"]="Soll das Applet zum gemeinsamen Benutzen der X2Go-Arbeitsfläche automatisch gestartet werden?
  Damit auf eine X2Go-/X11-Arbeitsflächensitzung über das gemeinsame Benutzen
  von X2Go-Arbeitsflächen zugegriffen werden kann, muss das
  Applet für das gemeinsame Benutzen von X2Go laufen. Es kündigt die
  X2Go-/X11-Sitzung des Anwenders den X2Go-Client-Anwendungen über ein
  zugriffsgesteuertes Socket an.
  .
  Das Applet kann so eingerichtet werden, dass es automatisch beim Start einer
  Arbeitsflächensitzung gestartet wird, allerdings ist dies aus
  Sicherheitsgründen nicht die Voreinstellung.
";
$elem["x2goserver-desktopsharing/auto-start-on-logon"]["descriptionfr"]="Faut-il démarrer de façon automatique l'applet de partage de bureau X2Go ?
  Pour qu'une session de bureau X2Go/X11 soit accessible depuis le partage de
  bureau X2Go, l'applet de partage de bureau X2Go doit être lancée. Elle
  informe la session X2Go/X11 de l'utilisateur par une socket à accès
  contrôlé vers les applications X2Go clientes.
  .
  L'applet peut être configurée pour démarrer automatiquement au lancement
  d'une session de bureau, ce qui n'est pas fait par défaut pour des raisons  de sécurité.
";
$elem["x2goserver-desktopsharing/auto-start-on-logon"]["default"]="false";
$elem["x2goserver-desktopsharing/auto-activate-on-logon"]["type"]="boolean";
$elem["x2goserver-desktopsharing/auto-activate-on-logon"]["description"]="Auto-activate X2Go Desktop Sharing?
  The X2Go Desktop Sharing applet normally starts in non-sharing mode
  (users that request to share the running desktop session get
  auto-rejected). The user normally has to choose to activate the sharing
  mode in the applet's GUI.
  .
  If the auto-start option is active, you can additionally choose here
  whether desktop sharing should be activated when the X2Go Desktop
  Sharing applet is auto-started at session logon.
  .
  For security and data protection reasons, this is not the default. Use
  this auto-activation feature only in appropriate environments, such as
  for classroom computers.
";
$elem["x2goserver-desktopsharing/auto-activate-on-logon"]["descriptionde"]="Soll das gemeinsame Benutzen von X2Go-Arbeitsflächen automatisch aktiviert werden?
  Das Applet zum gemeinsamen Benutzen von X2Go-Arbeitsflächen startet
  normalerweise in einem Modus, der die Arbeitsfläche nicht freigibt (Anwender,
  die anfragen, eine laufende Arbeitsflächensitzung gemeinsam zu benutzen,
  werden automatisch abgewiesen). Der Anwender muss normalerweise auswählen, ob
  er den Freigabemodus in der grafischen Oberfläche des Applets aktiviert.
  .
  Falls die Option Autostart aktiv ist, können Sie hier zusätzlich auswählen,
  ob die Freigabe der Arbeitsfläche automatisch aktiviert werden soll, wenn
  das X2Go-Arbeitsflächenfreigabe-Applet bei der Sitzungsanmeldung
  automatisch gestartet wird.
  .
  Aus Sicherheits- und Datenschutzgründen ist dies nicht die Voreinstellung.
  Benutzen Sie diese automatische Aktivierungsfunktionalität nur in
  angemessenen Umgebungen wie auf Unterrichtsrechnern.
";
$elem["x2goserver-desktopsharing/auto-activate-on-logon"]["descriptionfr"]="Faut-il activer de façon automatique le partage de bureau X2Go ?
  L'applet de partage de bureau X2Go démarre en mode non partagé (les
  utilisateurs demandant à partager la session de bureau en fonctionnement
  sont rejetés automatiquement). L'utilisateur doit généralement choisir
  d'activer le mode partagé dans l'interface graphique de l'applet.
  .
  Si l'option de démarrage automatique est activée, vous pouvez également
  choisir ici si le partage de bureau doit être activé lorsque l'applet de
  partage de bureau X2Go est démarrée automatiquement lors de la connexion à  la session.
  .
  Pour des raisons de sécurité et de protection des données, ce n'est pas
  fait par défaut. Utilisez cette fonctionnalité d'activation automatique
  uniquement dans des environnements appropriés, comme pour des ordinateurs de  salle de classe.
";
$elem["x2goserver-desktopsharing/auto-activate-on-logon"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
