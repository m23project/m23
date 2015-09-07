<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sn");

$elem["sn/runfrom"]["type"]="select";
$elem["sn/runfrom"]["choices"][1]="cron";
$elem["sn/runfrom"]["choices"][2]="ip-up";
$elem["sn/runfrom"]["choicesde"][1]="cron";
$elem["sn/runfrom"]["choicesde"][2]="ip-up";
$elem["sn/runfrom"]["choicesfr"][1]="cron";
$elem["sn/runfrom"]["choicesfr"][2]="ip-up";
$elem["sn/runfrom"]["description"]="sn should run from:
 The scripts provided with the package support several ways to run snget
 (the program to fetch new news):
 .
  cron     -- The program will be executed daily by cron -- useful e.g
              for permanent connections;
  ip-up    -- The program will called from ip-up, that is, when your
              computer makes a connection -- useful for e.g. dialup
              connections;
  manually -- The program will never be called, you have to call it
              manually to get new news (just type snget as root).
";
$elem["sn/runfrom"]["descriptionde"]="Sn soll gestartet werden von:
 Die Skripte in diesem Paket unterstützen mehrere Arten des Starts von Snget (Programm zum Abrufen neuer Nachrichten):
 .
  cron    -- Das Programm wird durch Cron jeden Tag aufgerufen - nützlich
             für permanente Internetverbindungen;
  ip-up   -- Das Programm wird über Ip-up gestartet; das heißt, jedesmal
             wenn Sie eine Internetverbindung herstellen - nützlich für
             Einwahlverbindungen
  manuell -- Das Programm wird nur dann ausgeführt, wenn Sie es als 
             Benutzer Root durch Eingabe von snget starten.
";
$elem["sn/runfrom"]["descriptionfr"]="Méthode de démarrage de sn :
 Il est possible de lancer snget (le programme de récupération des nouvelles) de plusieurs manières différentes :
 .
  - cron         : le programme sera exécuté quotidiennement par
                   cron. Cela est utile par ex. pour les connexions
                   permanentes ;
  - ip-up        : le programme sera appelé depuis ip-up, c.-à-d.
                   lorsque votre ordinateur établit une connexion.
                   Cela est utile pour les connexions par modem ;
  - manuellement : le programme n'est jamais lancé, vous devez le
                   lancer vous-même afin de récupérer les dernières
                   nouvelles. Vous devez alors utiliser la commande
                   « snget » avec les privilèges du superutilisateur.
";
$elem["sn/runfrom"]["default"]="cron";
$elem["sn/onlylocal"]["type"]="boolean";
$elem["sn/onlylocal"]["description"]="Should sn only accept connections from localhost?
 sn is a small newsserver, intended mainly to be run for single user
 systems.  On such systems, it's better to have sn only answer connections
 from localhost.  If you intend to use sn from multiple machines, refuse
 here.
";
$elem["sn/onlylocal"]["descriptionde"]="Soll Sn nur Verbindungen vom lokalen Rechner annehmen?
 Sn ist ein kleiner Newsserver, gedacht für Einzelbenutzersysteme. Auf solchen Systemen ist es besser, wenn Sn nur Verbindungen vom lokalen Rechner annimmt. Wenn Sn für mehrere Rechner laufen soll, müssen Sie hier ablehnen.
";
$elem["sn/onlylocal"]["descriptionfr"]="Sn doit-il accepter uniquement les connexions depuis l'hôte local ?
 Sn est un petit serveur de nouvelles, conçu pour fonctionner sur les systèmes ayant un seul utilisateur. Sur de tels systèmes, il est préférable que sn réponde seulement aux connexions depuis l'hôte local (« localhost »). Ne choisissez pas cette option si vous avez l'intention d'utiliser sn depuis plusieurs machines.
";
$elem["sn/onlylocal"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
