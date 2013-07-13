<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("goto-fai-progress");

$elem["fai-progress/title"]["type"]="title";
$elem["fai-progress/title"]["description"]="${i}
";
$elem["fai-progress/title"]["descriptionde"]="${i}
";
$elem["fai-progress/title"]["descriptionfr"]="${i}
";
$elem["fai-progress/title"]["default"]="";
$elem["fai-progress/info"]["type"]="text";
$elem["fai-progress/info"]["description"]="${i}
";
$elem["fai-progress/info"]["descriptionde"]="${i}
";
$elem["fai-progress/info"]["descriptionfr"]="${i}
";
$elem["fai-progress/info"]["default"]="";
$elem["fai-progress/step"]["type"]="text";
$elem["fai-progress/step"]["description"]="${i}
";
$elem["fai-progress/step"]["descriptionde"]="${i}
";
$elem["fai-progress/step"]["descriptionfr"]="${i}
";
$elem["fai-progress/step"]["default"]="";
$elem["goto-hardware/title"]["type"]="title";
$elem["goto-hardware/title"]["description"]="GOto - Hardware detection
";
$elem["goto-hardware/title"]["descriptionde"]="GOto - Hardware-Erkennung
";
$elem["goto-hardware/title"]["descriptionfr"]="GOto - Détection du matériel
";
$elem["goto-hardware/title"]["default"]="";
$elem["goto-hardware/info"]["type"]="text";
$elem["goto-hardware/info"]["description"]="Progress of hardware detection
";
$elem["goto-hardware/info"]["descriptionde"]="Fortschritt der Hardware-Erkennung
";
$elem["goto-hardware/info"]["descriptionfr"]="Progression de la détection du matériel
";
$elem["goto-hardware/info"]["default"]="";
$elem["goto-hardware/step"]["type"]="text";
$elem["goto-hardware/step"]["description"]="${i}
";
$elem["goto-hardware/step"]["descriptionde"]="${i}
";
$elem["goto-hardware/step"]["descriptionfr"]="${i}
";
$elem["goto-hardware/step"]["default"]="";
$elem["goto-activation/title"]["type"]="title";
$elem["goto-activation/title"]["description"]="GOto - System Activation
";
$elem["goto-activation/title"]["descriptionde"]="GOto - System-Aktivierung
";
$elem["goto-activation/title"]["descriptionfr"]="GOto - Activation du système
";
$elem["goto-activation/title"]["default"]="";
$elem["goto-activation/info"]["type"]="text";
$elem["goto-activation/info"]["description"]="Waiting
";
$elem["goto-activation/info"]["descriptionde"]="Warte...
";
$elem["goto-activation/info"]["descriptionfr"]="Attente
";
$elem["goto-activation/info"]["default"]="";
$elem["goto-activation/step"]["type"]="text";
$elem["goto-activation/step"]["description"]="${i}
";
$elem["goto-activation/step"]["descriptionde"]="${i}
";
$elem["goto-activation/step"]["descriptionfr"]="${i}
";
$elem["goto-activation/step"]["default"]="";
$elem["fai-progress/error-ip"]["type"]="error";
$elem["fai-progress/error-ip"]["description"]="Error in network configuration
 The system could not determine a network address.
 .
 The installation cannot continue without this information.
";
$elem["fai-progress/error-ip"]["descriptionde"]="Fehler in der Netzwerk-Konfiguration
 Das System konnte keine Netzwerk-Adresse ermitteln.
 .
 Die Installation kann ohne diese Informationen nicht fortgesetzt werden.
";
$elem["fai-progress/error-ip"]["descriptionfr"]="Erreur dans la configuration réseau
 Le système n'a pas pu déterminer son adresse réseau.
 .
 L'installation ne peut pas continuer sans cette information.
";
$elem["fai-progress/error-ip"]["default"]="";
$elem["fai-progress/error-dns"]["type"]="error";
$elem["fai-progress/error-dns"]["description"]="Error in network configuration
 The system could not determine a system name for ip ${i}.
 .
 The installation cannot continue without this information.
";
$elem["fai-progress/error-dns"]["descriptionde"]="Fehler in der Netzwerk-Konfiguration
 Das System kann keinen Namen für die IP ${i} ermitteln.
 .
 Die Installation kann ohne diese Informationen nicht fortgesetzt werden.
";
$elem["fai-progress/error-dns"]["descriptionfr"]="Erreur dans la configuration réseau
 Il a été impossible de déterminer le nom du système pour l'adresse IP ${i}.
 .
 L'installation ne peut pas continuer sans cette information.
";
$elem["fai-progress/error-dns"]["default"]="";
$elem["fai-progress/error-fai"]["type"]="error";
$elem["fai-progress/error-fai"]["description"]="FAI error
 The last installation failed. Please unlock this system after the error has been resolved.
 .
 Error code: ${i}
 .
 Please inform your administrator.
";
$elem["fai-progress/error-fai"]["descriptionde"]="FAI Fehler
 Die letzte Installation ist fehlgeschlagen. Bitte geben Sie das System wieder frei nachdem der Fehler behoben wurde.
 .
 Fehler Code: ${i}
 .
 Bitte informieren Sie Ihren Administrator
";
$elem["fai-progress/error-fai"]["descriptionfr"]="Erreur de FAI
 La dernière installation a échoué. Veuillez déverrouiller ce système après avoir corrigé le problème.
 .
 Code d'erreur: ${i}
 .
 Veuillez informer votre administrateur.
";
$elem["fai-progress/error-fai"]["default"]="";
$elem["fai-progress/error-gosa-si-no-server"]["type"]="error";
$elem["fai-progress/error-gosa-si-no-server"]["description"]="GOto error
 Cannot register client. There is no activation server available.
 .
 Please inform your administrator.
";
$elem["fai-progress/error-gosa-si-no-server"]["descriptionde"]="GOto Fehler
 Der Client kann sich nicht registrieren. Es ist kein Aktivierungs-Server verfügbar.
 .
 Bitte informieren Sie Ihren Administrator
";
$elem["fai-progress/error-gosa-si-no-server"]["descriptionfr"]="Erreur GOto
 Impossible d'enregistrer le client. Aucun serveur d'activation n'est disponible.
 .
 Veuillez informer votre administrateur.
";
$elem["fai-progress/error-gosa-si-no-server"]["default"]="";
$elem["fai-progress/error-ldap"]["type"]="error";
$elem["fai-progress/error-ldap"]["description"]="LDAP error
 The last installation failed. Please unlock this system after the error has been resolved.
 .
 Error code: ${i}
 .
 Please inform your administrator.
";
$elem["fai-progress/error-ldap"]["descriptionde"]="LDAP fehler
 Die letzte Installation ist fehlgeschlagen. Bitte geben Sie das System wieder frei nachdem der Fehler behoben wurde.
 .
 Fehler Code: ${i}
 .
 Bitte informieren Sie Ihren Administrator
";
$elem["fai-progress/error-ldap"]["descriptionfr"]="Erreur LDAP
 La dernière installation a échoué. Veuillez déverrouiller ce système après avoir corrigé le problème.
 .
 Code d'erreur: ${i}
 .
 Veuillez informer votre administrateur.
";
$elem["fai-progress/error-ldap"]["default"]="";
$elem["fai-progress/ldap2fai-error"]["type"]="error";
$elem["fai-progress/ldap2fai-error"]["description"]="LDAP error
 Cannot retrieve information about this system.
 .
 ${i}
 .
 Please inform your administrator.
";
$elem["fai-progress/ldap2fai-error"]["descriptionde"]="LDAP fehler
 Kann keine Informationen für dieses System ermitteln.
 .
 ${i}
 .
 Bitte informieren Sie Ihren Administrator
";
$elem["fai-progress/ldap2fai-error"]["descriptionfr"]="Erreur LDAP
 Impossible de récupérer les informations sur ce système.
 .
 ${i}
 .
 Veuillez informer votre administrateur.
";
$elem["fai-progress/ldap2fai-error"]["default"]="";
$elem["debconf/language"]["type"]="text";
$elem["debconf/language"]["description"]="Debconf language
";
$elem["debconf/language"]["descriptionde"]="Debconf Sprache
";
$elem["debconf/language"]["descriptionfr"]="Langue de Debconf
";
$elem["debconf/language"]["default"]="en";
PKG_OptionPageTail2($elem);
?>
