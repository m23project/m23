<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zfs-dkms");

$elem["zfs-dkms/stop-build-for-32bit-kernel"]["type"]="boolean";
$elem["zfs-dkms/stop-build-for-32bit-kernel"]["description"]="Abort building ZFS on a 32-bit kernel?
 You are attempting to build ZFS against a 32-bit running kernel.
 .
 Although possible, building in a 32-bit environment is unsupported and
 likely to cause instability leading to possible data corruption. You
 are strongly advised to use a 64-bit kernel; if you do decide to
 proceed with using ZFS on this kernel then keep in mind that it is at
 your own risk.
";
$elem["zfs-dkms/stop-build-for-32bit-kernel"]["descriptionde"]="Bau von ZFS auf einem 32-Bit-Kernel abbrechen?
 Sie versuchen, ZFS mit einem laufenden 32-Bit-Kernel zu bauen.
 .
 Dies ist zwar möglich, allerdings wird der Bau in einer 32-Bit-Umgebung nicht unterstützt und wahrscheinlich Instabilitäten verursachen, die möglicherweise Daten beschädigen. Es wird Ihnen nachdrücklich empfohlen, einen 64-Bit-Kernel zu verwenden; falls Sie sich entscheiden, mit der Verwendung von ZFS unter diesem Kernel fortzufahren, denken Sie daran, dass dies auf eigenes Risiko passiert.
";
$elem["zfs-dkms/stop-build-for-32bit-kernel"]["descriptionfr"]="Abandonner la compilation de ZFS sur un noyau 32 bits ?
 Vous êtes en train d'essayer de compiler ZFS sur un noyau 32 bits.
 .
 Même si c'est en théorie possible, compiler au sein d'un environnement 32 bits n'est pas géré et peut entraîner une instabilité du système pouvant aboutir à une corruption des données. Il vous est fortement recommandé d'utiliser un noyau 64 bits ; si vous décidez d'utiliser ZFS sur ce noyau, gardez à l'esprit que c'est à vos propres risques.
";
$elem["zfs-dkms/stop-build-for-32bit-kernel"]["default"]="true";
$elem["zfs-dkms/stop-build-for-unknown-kernel"]["type"]="boolean";
$elem["zfs-dkms/stop-build-for-unknown-kernel"]["description"]="Abort building ZFS on an unknown kernel?
 You are attempting to build ZFS against a running kernel that could not
 be identified as 32-bit or 64-bit. If you are not completely sure that
 the running kernel is a 64-bit one, you should probably stop the build.
 .
 Although possible, building in a 32-bit environment is unsupported and
 likely to cause instability leading to possible data corruption. You
 are strongly advised to use a 64-bit kernel; if you do decide to
 proceed with using ZFS on this kernel then keep in mind that it is at
 your own risk.
";
$elem["zfs-dkms/stop-build-for-unknown-kernel"]["descriptionde"]="Bau von ZFS auf einem unbekannten Kernel abbrechen?
 Sie versuchen, ZFS mit einem Kernel zu bauen, der weder als 32-Bit noch als 64-Bit identifiziert werden konnte. Falls Sie sich nicht absolut sicher sind, dass der laufende Kernel 64-bittig ist, sollten Sie eventuell den Bau abbrechen.
 .
 Dies ist zwar möglich, allerdings wird der Bau in einer 32-Bit-Umgebung nicht unterstützt und wahrscheinlich Instabilitäten verursachen, die möglicherweise Daten beschädigen. Es wird Ihnen nachdrücklich empfohlen, einen 64-Bit-Kernel zu verwenden; falls Sie sich entscheiden, mit der Verwendung von ZFS unter diesem Kernel fortzufahren, denken Sie daran, dass dies auf eigenes Risiko passiert.
";
$elem["zfs-dkms/stop-build-for-unknown-kernel"]["descriptionfr"]="Abandonner la compilation de ZFS sur un noyau inconnu ?
 Vous êtes en train d'essayer de compiler ZFS sur un noyau qui n'a pu être identifié comme 32 bits ou 64 bits. Si vous n'êtes pas certain que le noyau actuel est un 64 bits, vous devriez arrêter la compilation.
 .
 Même si c'est en théorie possible, compiler au sein d'un environnement 32 bits n'est pas géré et peut entraîner une instabilité du système pouvant aboutir à une corruption des données. Il vous est fortement recommandé d'utiliser un noyau 64 bits ; si vous décidez d'utiliser ZFS sur ce noyau, gardez à l'esprit que c'est à vos propres risques.
";
$elem["zfs-dkms/stop-build-for-unknown-kernel"]["default"]="true";
$elem["zfs-dkms/note-incompatible-licenses"]["type"]="note";
$elem["zfs-dkms/note-incompatible-licenses"]["description"]="Licenses of ZFS and Linux are incompatible
 ZFS is licensed under the Common Development and Distribution License (CDDL),
 and the Linux kernel is licensed under the GNU General Public License Version 2
 (GPL-2). While both are free open source licenses they are restrictive
 licenses. The combination of them causes problems because it prevents using
 pieces of code exclusively available under one license with pieces of code
 exclusively available under the other in the same binary. 
 .
 You are going to build ZFS using DKMS in such a way that they are not going to
 be built into one monolithic binary. Please be aware that distributing both of
 the binaries in the same media (disk images, virtual appliances, etc) may
 lead to infringing.
";
$elem["zfs-dkms/note-incompatible-licenses"]["descriptionde"]="Lizenzen von ZFS und Linux sind inkompatibel
 ZFS ist unter der »Common Development and Distribution License (CDDL), der Kernel unter der GNU General Public License Version 2 (GPL-2) lizenziert. Obwohl beide freie Open-Source-Lizenzen sind, sind sie restriktiv. Die Kombination beider führt zu Problemen, da sie verhindern, das Programmcode, der exklusiv unter einer Lizenz steht, mit Code im gleichen Programm zusammen verwandt wird, der exklusiv unter der anderen Lizenz steht.
 .
 Sie werden ZFS mittels DKMS derart bauen, dass sie nicht zusammen in ein monolithisches Programm gebaut werden. Bitte berücksichtigen Sie, dass der Vertrieb beider Programme auf dem gleichen Medium (Plattenabbild, virtuelles Gerät usw.) zu Urheberrechtsverletzungen führen kann.
";
$elem["zfs-dkms/note-incompatible-licenses"]["descriptionfr"]="Les licences de ZFS et de Linux ne sont pas compatibles
 ZFS dispose d'une licence « Common Development and Distribution License » (CDDL), et le noyau Linux d'une licence GNU « General Public License » Version 2 (GPL-2). Bien qu'elles soient toutes les deux des licences libres pour logiciels ouverts, elles restent restrictives. La combinaison des deux pose des problèmes car cela empêche l'utilisation de parties de code disponibles exclusivement sous une licence avec d'autres parties de code disponibles exclusivement sous l'autre, dans le même fichier.
 .
 Vous êtes sur le point de construire ZFS en utilisant DKMS d'une manière qui fera qu'ils ne seront pas intégrés dans un binaire unique. Veuillez prendre en considération que la distribution de ces deux binaires au sein d'un même média (images de disque, machines virtuelles, etc) peut mener à une infraction.
";
$elem["zfs-dkms/note-incompatible-licenses"]["default"]="";
PKG_OptionPageTail2($elem);
?>
