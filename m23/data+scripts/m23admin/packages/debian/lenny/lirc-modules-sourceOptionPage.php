<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lirc-modules-source");

$elem["lirc-modules-source/drivers"]["type"]="multiselect";
$elem["lirc-modules-source/drivers"]["choices"][1]="atiusb";
$elem["lirc-modules-source/drivers"]["choices"][2]="bt829";
$elem["lirc-modules-source/drivers"]["choices"][3]="cmdir";
$elem["lirc-modules-source/drivers"]["choices"][4]="gpio";
$elem["lirc-modules-source/drivers"]["choices"][5]="i2c";
$elem["lirc-modules-source/drivers"]["choices"][6]="igorplugusb";
$elem["lirc-modules-source/drivers"]["choices"][7]="imon";
$elem["lirc-modules-source/drivers"]["choices"][8]="it87";
$elem["lirc-modules-source/drivers"]["choices"][9]="mceusb";
$elem["lirc-modules-source/drivers"]["choices"][10]="mceusb2";
$elem["lirc-modules-source/drivers"]["choices"][11]="parallel";
$elem["lirc-modules-source/drivers"]["choices"][12]="sasem";
$elem["lirc-modules-source/drivers"]["choices"][13]="serial";
$elem["lirc-modules-source/drivers"]["choices"][14]="sir";
$elem["lirc-modules-source/drivers"]["description"]="Drivers to build:
  atiusb:      ATI/NVidia/X10 I & II RF Remote
  bt829:       Tekram M230 Mach64
  cmdir:       COMMANDIR USB Transceiver
  gpio:        TV cards from FlyVideo98, Avermedia, MiRO and many others
  i2c:         TV cards from Hauppauge and PixelView
  igorplugusb: Igor Cesko's USB IR Receiver
  imon:        Soundgraph iMON MultiMedian IR/VFD
  it87:        ITE IT8705/12 CIR ports (ECS K7S5A, Asus DigiMatrix...)
  mceusb:      Windows Media Center Remotes (old version, MicroSoft USB ID)
  mceusb2:     Windows Media Center Remotes (new version, Philips et al.)
  parallel:    Home-brew parallel-port receiver
  sasem:       Dign HV5 HTPC IR/VFD Module
  serial:      Home-brew serial-port driver
  sir:         Serial InfraRed (IRDA)
  streamzap:   Streamzap PC Remote
";
$elem["lirc-modules-source/drivers"]["descriptionde"]="Zu kompilierende Treiber:
  atiusb:      ATI/NVidia/X10 I & II RF-Fernbedienung
  bt829:       Tekram M230 Mach64
  cmdir:       COMMANDIR USB-Empfänger
  gpio:        TV Karten von FlyVideo98, Avermedia, MiRO und vielen
               anderen
  i2c:         TV Karten von Hauppauge und PixelView
  igorplugusb: Igor Ceskos USB IR-Empfänger
  imon:        Soundgraph iMON MultiMedian IR/VFD
  it87:        ITE IT8705/12 CIR ports (ECS K7S5A, Asus DigiMatrix ...)
  mceusb:      Windows Media Center-Fernbedienungen (alte Version,
               MicroSoft USB ID)
  mceusb2:     Windows Media Center-Fernbedienungen (neue Version,
               Philips usw.)
  parallel:    Selbstgebauter Parallel-Port-Empfänger
  sasem:       Dign HV5 HTPC IR/VFD-Modul
  serial:      Selbstgebauter Treiber für die serielle Schnittstelle
  sir:         Serielles Infrarot (IRDA)
  streamzap:   Streamzap PC-Fernbedienung
";
$elem["lirc-modules-source/drivers"]["descriptionfr"]="Pilotes à construire :
  atiusb :      commande hautes fréquences ATI/NVidia/X10 I et II
  bt829 :       Tekram M230 Mach64
  cmdir :       « transceiver » USB COMMANDIR
  gpio :        cartes TV de FlyVideo98, Avermedia, MiRO et beaucoup
                d'autres
  i2c :         cartes TV de Hauppauge et PixelView
  igorplugusb : récepteur infrarouge USB de Cesko
  imon :        Soundgraph iMON MultiMedian IR/VFD
  it87 :        ITE IT8705/12 CIR ports (p. ex. sur ECS K7S5A
                ou Digimatrix d'Asus
  mceusb :      Windows Media Center Remotes (ancienne version,
                ID USB MicroSoft)
  mceusb2 :     Windows Media Center Remotes (nouvelle version,
                Philips et al.)
  parallel :    récepteur de fabrication personnelle sur le port
                parallèle
  sasem :       module HV5 HTPC IR/VFD de Dign
  serial :      pilote pour réalisation personnelle sur le port série
  sir :         infrarouge série (IRDA)
  streamzap :   télécommande de PC Streamzap
";
$elem["lirc-modules-source/drivers"]["default"]="atiusb, bt829, cmdir, i2c, igorplugusb, imon, it87, mceusb, mceusb2, sasem, serial, sir, streamzap";
$elem["lirc-modules-source/use_lirc_hints"]["type"]="boolean";
$elem["lirc-modules-source/use_lirc_hints"]["description"]="Try to automatically select hardware support options?
 Your previous answers can be used as a basis for guessing the list of
 kernel modules that should be built, along with their parameters.
 .
 Please choose whether this should happen.
";
$elem["lirc-modules-source/use_lirc_hints"]["descriptionde"]="Versuchen, automatisch die Optionen für die Unterstützung der Hardware zu erkennen?
 Ihre vorhergehende Antwort kann als Basis zum Raten der Liste von Kernelmodulen, die erstellt werden sollen, zusammen mit der zugehörigen Liste an Parametern verwendet werden.
 .
 Bitte wählen Sie aus, ob dies so durchgeführt werden soll.
";
$elem["lirc-modules-source/use_lirc_hints"]["descriptionfr"]="Détecter automatiquement le mode de gestion de votre matériel ?
 Sur la base des réponses précédentes, la liste des modules du noyau à construire, avec leurs paramètres, peut être estimée.
 .
 Veuillez choisir si cette tentative doit avoir lieu.
";
$elem["lirc-modules-source/use_lirc_hints"]["default"]="true";
$elem["lirc-modules-source/not_needed"]["type"]="note";
$elem["lirc-modules-source/not_needed"]["description"]="Additional kernel modules not needed
 Unless you want to build LIRC kernel modules for another system,
 this package is useless on this system.
";
$elem["lirc-modules-source/not_needed"]["descriptionde"]="Weitere Kernelmodule werden nicht benötigt.
 Sofern Sie nicht LIRC-Kernelmodule für ein anderes Systeme kompilieren wollen, ist dieses Paket auf diesem System nutzlos.
";
$elem["lirc-modules-source/not_needed"]["descriptionfr"]="Aucun module supplémentaire du noyau nécessaire
 À moins que vous ne désiriez construire les modules LIRC du noyau pour un autre système, ce paquet peut maintenant être retiré.
";
$elem["lirc-modules-source/not_needed"]["default"]="";
$elem["lirc-modules-source/what_next"]["type"]="note";
$elem["lirc-modules-source/what_next"]["description"]="Binary modules package build instructions
 For instructions on how to build the binary modules package, please
 read the /usr/share/doc/lirc-modules-source/README.Debian file.
";
$elem["lirc-modules-source/what_next"]["descriptionde"]="Anweisungen zum Bau des Binärmodulpaketes
 Für Anweisungen, wie das Debian-Binärmodulpaket gebaut wird, lesen Sie die Datei /usr/share/doc/lirc-modules-source/README.Debian.
";
$elem["lirc-modules-source/what_next"]["descriptionfr"]="Instructions de construction du paquet des modules binaires
 Les instructions concernant la façon de construire le paquet Debian de modules binaires se trouvent dans le fichier /usr/share/doc/lirc-modules-source/README.Debian.
";
$elem["lirc-modules-source/what_next"]["default"]="";
$elem["lirc-modules-source/it87_type"]["type"]="select";
$elem["lirc-modules-source/it87_type"]["choices"][1]="Standard";
$elem["lirc-modules-source/it87_type"]["choicesde"][1]="Standard";
$elem["lirc-modules-source/it87_type"]["choicesfr"][1]="Standard";
$elem["lirc-modules-source/it87_type"]["description"]="Type of ITE8705/12 CIR port to support:
 Please choose the supported ITE8705/12 CIR port chip:
 .
  Standard:   Standard setup chip;
  DigiMatrix: Setup for Asus DigiMatrix onboard chip.
";
$elem["lirc-modules-source/it87_type"]["descriptionde"]="Typ des zu unterstützenden ITE8705/12 CIR-Anschlusses:
 Bitte wählen Sie den unterstützten Anschluss-Chip für ITE8705/12 CIR:
 .
  Standard:   Normaler Chip;
  DigiMatrix: integrierter Chip Asus DigiMatrix.
";
$elem["lirc-modules-source/it87_type"]["descriptionfr"]="Type de port CIR ITE8705/12 CIR devant être géré :
 Veuillez choisir le type de puce gérée pour le port ITE8705/12 :
 .
  Standard :   puces à paramétrage standard ;
  DigiMatrix : paramétrage pour les puces Asus DigiMatrix sur la carte.
";
$elem["lirc-modules-source/it87_type"]["default"]="Standard";
$elem["lirc-modules-source/serial_type"]["type"]="select";
$elem["lirc-modules-source/serial_type"]["choices"][1]="ANIMAX";
$elem["lirc-modules-source/serial_type"]["choices"][2]="IRDEO";
$elem["lirc-modules-source/serial_type"]["choicesde"][1]="ANIMAX";
$elem["lirc-modules-source/serial_type"]["choicesde"][2]="IRDEO";
$elem["lirc-modules-source/serial_type"]["choicesfr"][1]="ANIMAX";
$elem["lirc-modules-source/serial_type"]["choicesfr"][2]="IRDEO";
$elem["lirc-modules-source/serial_type"]["description"]="Serial device to support:
 Please choose the supported serial device type:
 .
  ANIMAX: Anir Multimedia Magic;
  IRDEO:  IRdeo;
  Other:  Any other supported device.
";
$elem["lirc-modules-source/serial_type"]["descriptionde"]="Serielles Gerät, das unterstützt werden soll:
 Bitte wählen Sie den unterstützten seriellen Gerätetyp:
 .
  ANIMAX: Anir Multimedia Magic;
  IRDEO:  IRdeo; 
  Andere: Jedes andere unterstützte Gerät.
";
$elem["lirc-modules-source/serial_type"]["descriptionfr"]="Périphérique série géré :
 Veuillez choisir le type de périphérique série qui sera géré :
 .
  ANIMAX : Anir Multimedia Magic ;
  IRDEO :  IRdeo ;
  Autre :  tout autre périphérique géré.
";
$elem["lirc-modules-source/serial_type"]["default"]="Other";
$elem["lirc-modules-source/serial_transmitter"]["type"]="boolean";
$elem["lirc-modules-source/serial_transmitter"]["description"]="Is the serial IR device a transmitter?
";
$elem["lirc-modules-source/serial_transmitter"]["descriptionde"]="Ist das serielle Infrarotgerät ein Sender?
";
$elem["lirc-modules-source/serial_transmitter"]["descriptionfr"]="Le périphérique infrarouge (IR) série est-il un émetteur ?
";
$elem["lirc-modules-source/serial_transmitter"]["default"]="true";
$elem["lirc-modules-source/serial_softcarrier"]["type"]="boolean";
$elem["lirc-modules-source/serial_softcarrier"]["description"]="Should the carrier signal be generated by software?
";
$elem["lirc-modules-source/serial_softcarrier"]["descriptionde"]="Soll das Trägersignal von der Software generiert werden?
";
$elem["lirc-modules-source/serial_softcarrier"]["descriptionfr"]="Créer le signal de porteuse de façon logicielle ?
";
$elem["lirc-modules-source/serial_softcarrier"]["default"]="false";
$elem["lirc-modules-source/serial_port"]["type"]="string";
$elem["lirc-modules-source/serial_port"]["description"]="IR serial device I/O port:
";
$elem["lirc-modules-source/serial_port"]["descriptionde"]="Schnittstelle des seriellen Infrarot-Gerätes:
";
$elem["lirc-modules-source/serial_port"]["descriptionfr"]="Type de périphérique infrarouge série à gérer :
";
$elem["lirc-modules-source/serial_port"]["default"]="0x3f8";
$elem["lirc-modules-source/serial_irq"]["type"]="string";
$elem["lirc-modules-source/serial_irq"]["description"]="IR serial device IRQ:
";
$elem["lirc-modules-source/serial_irq"]["descriptionde"]="IRQ des seriellen Infrarotgerätes:
";
$elem["lirc-modules-source/serial_irq"]["descriptionfr"]="Interruption (IRQ) du périphérique IR série :
";
$elem["lirc-modules-source/serial_irq"]["default"]="4";
$elem["lirc-modules-source/sir_type"]["type"]="select";
$elem["lirc-modules-source/sir_type"]["choices"][1]="ACTISYS_ACT200L";
$elem["lirc-modules-source/sir_type"]["choices"][2]="TEKRAM";
$elem["lirc-modules-source/sir_type"]["choicesde"][1]="ACTISYS_ACT200L";
$elem["lirc-modules-source/sir_type"]["choicesde"][2]="TEKRAM";
$elem["lirc-modules-source/sir_type"]["choicesfr"][1]="ACTISYS_ACT200L";
$elem["lirc-modules-source/sir_type"]["choicesfr"][2]="TEKRAM";
$elem["lirc-modules-source/sir_type"]["description"]="Type of supported SIR device:
 Please choose the supported SIR device type:
 .
  ACTISYS_ACT200L: Actisys Act200L dongle;
  TEKRAM:          Tekram Irmate 210 (16x50 UART compatible serial port);
  Other:           Any other supported device.
";
$elem["lirc-modules-source/sir_type"]["descriptionde"]="Typ des unterstützten seriellen Infrarotgerätes (SIR):
 Bitte wählen Sie den unterstützten SIR-Gerätetyp:
 .
  ACTISYS_ACT200L: Actisys Act200L-Dongle;
  TEKRAM:          Tekram Irmate 210 (16x50 UART kompatible serielle
                   Schnittstelle);
  Andere:          Jedes andere unterstützte Gerät.
";
$elem["lirc-modules-source/sir_type"]["descriptionfr"]="Type du périphérique SIR :
 Veuillez choisir le type du périphérique SIR géré :
 .
  ACTISYS_ACT200L : « dongle » Actisys Act200L ;
  TEKRAM :          Tekram Irmate 210 (port série compatible avec un UART
                    compatible 16x50) ;
  Autre :           tout autre périphérique géré.
";
$elem["lirc-modules-source/sir_type"]["default"]="Other";
$elem["lirc-modules-source/sir_port"]["type"]="string";
$elem["lirc-modules-source/sir_port"]["description"]="SIR device I/O port:
";
$elem["lirc-modules-source/sir_port"]["descriptionde"]="I/O-Schnittstelle des SIR-Gerätes:
";
$elem["lirc-modules-source/sir_port"]["descriptionfr"]="Port d'entrée/sortie du périphérique SIR :
";
$elem["lirc-modules-source/sir_port"]["default"]="0x2f8";
$elem["lirc-modules-source/sir_irq"]["type"]="string";
$elem["lirc-modules-source/sir_irq"]["description"]="SIR device IRQ:
";
$elem["lirc-modules-source/sir_irq"]["descriptionde"]="IRQ des SIR-Gerätes:
";
$elem["lirc-modules-source/sir_irq"]["descriptionfr"]="Interruption (IRQ) du périphérique SIR :
";
$elem["lirc-modules-source/sir_irq"]["default"]="3";
$elem["lirc-modules-source/parallel_port"]["type"]="string";
$elem["lirc-modules-source/parallel_port"]["description"]="Parallel IR device I/O port:
";
$elem["lirc-modules-source/parallel_port"]["descriptionde"]="Schnittstelle (Port) des parallelen Infrarotgerätes (IR):
";
$elem["lirc-modules-source/parallel_port"]["descriptionfr"]="Port d'entrée/sortie du périphérique IR parallèle :
";
$elem["lirc-modules-source/parallel_port"]["default"]="0x378";
$elem["lirc-modules-source/parallel_irq"]["type"]="string";
$elem["lirc-modules-source/parallel_irq"]["description"]="Parallel IR device IRQ:
";
$elem["lirc-modules-source/parallel_irq"]["descriptionde"]="IRQ des parallelen Infrarotgerätes (IR):
";
$elem["lirc-modules-source/parallel_irq"]["descriptionfr"]="Interruption (IRQ) du périphérique IR parallèle :
";
$elem["lirc-modules-source/parallel_irq"]["default"]="7";
$elem["lirc-modules-source/parallel_timer"]["type"]="string";
$elem["lirc-modules-source/parallel_timer"]["description"]="Parallel IR device timer:
";
$elem["lirc-modules-source/parallel_timer"]["descriptionde"]="Zeitgeber des parallelen Infrarotgerätes (IR):
";
$elem["lirc-modules-source/parallel_timer"]["descriptionfr"]="Horloge du périphérique IR parallèle :
";
$elem["lirc-modules-source/parallel_timer"]["default"]="65536";
$elem["lirc-modules-source/do-build"]["type"]="boolean";
$elem["lirc-modules-source/do-build"]["description"]="Automatically build the modules?
 New LIRC kernel modules can be built and installed if the source and
 build environment for the current kernel are present locally.
 .
 Even if you choose this option, you should build and install a binary 'kernel
 modules' package so that the package manager can keep track of the files.
";
$elem["lirc-modules-source/do-build"]["descriptionde"]="Module automatisch erzeugen?
 Neue LIRC-Kernelmodule können erzeugt und installiert werden, falls die Quellen und die Bauumgebung des aktuellen Kernels lokal vorhanden sind.
 .
 Selbst falls Sie diese Option wählen, sollten Sie das Binärmodulpaket erzeugen und installieren, so dass der Paketmanager die Dateien verfolgen kann.
";
$elem["lirc-modules-source/do-build"]["descriptionfr"]="Faut-il essayer de construire les modules automatiquement ?
 Les nouveaux modules noyau de LIRC peuvent être construits et installés si les sources et l'environnement de construction du noyau sont présents localement.
 .
 Même si vous choisissez cette option, il est recommandé de construire et d'installer un paquet binaire « kernel-modules » de façon que ces fichiers puissent être gérés par le gestionnaire de paquets.
";
$elem["lirc-modules-source/do-build"]["default"]="false";
$elem["lirc-modules-source/kernel-source"]["type"]="string";
$elem["lirc-modules-source/kernel-source"]["description"]="Kernel source location:
 Please enter the location of the kernel source tree, to build the
 lirc kernel modules.
";
$elem["lirc-modules-source/kernel-source"]["descriptionde"]="Ort der Kernelquellen:
 Bitte geben Sie den Ort des Kernelquellbaums ein, um die LIRC-Kernelmodule zu erzeugen.
";
$elem["lirc-modules-source/kernel-source"]["descriptionfr"]="Emplacement des sources du noyau :
 Veuillez indiquer l'emplacement des sources du noyau, qui seront utilisées pour construire les modules noyau de LIRC.
";
$elem["lirc-modules-source/kernel-source"]["default"]="/usr/src/linux/";
$elem["lirc-modules-source/kernel-source-not-found"]["type"]="error";
$elem["lirc-modules-source/kernel-source-not-found"]["description"]="${ksrc}: invalid kernel source tree
";
$elem["lirc-modules-source/kernel-source-not-found"]["descriptionde"]="ungültiger Kernelquellbaum.
";
$elem["lirc-modules-source/kernel-source-not-found"]["descriptionfr"]="répertoire de sources du noyau non valable
";
$elem["lirc-modules-source/kernel-source-not-found"]["default"]="";
PKG_OptionPageTail2($elem);
?>
