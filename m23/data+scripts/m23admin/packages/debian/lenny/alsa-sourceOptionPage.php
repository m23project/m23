<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("alsa-source");

$elem["alsa-source/has_pnp"]["type"]="boolean";
$elem["alsa-source/has_pnp"]["description"]="Build ALSA drivers with ISA PnP support?
 If you choose this option, the ALSA drivers will be built with
 support for the isa-pnp driver.
";
$elem["alsa-source/has_pnp"]["descriptionde"]="ALSA-Treiber mit ISA PnP-Unterstützung erstellen?
 Falls Sie diese Option auswählen, werden die ALSA-Treiber mit Unterstützung für den Treiber isa-pnp gebaut.
";
$elem["alsa-source/has_pnp"]["descriptionfr"]="Faut-il compiler les pilotes ALSA avec la gestion de « ISA PnP » ?
 Si vous choisissez cette option, les pilotes ALSA seront compilés avec la gestion du pilote « Plug and Play » ISA.
";
$elem["alsa-source/has_pnp"]["default"]="true";
$elem["alsa-source/debug"]["type"]="boolean";
$elem["alsa-source/debug"]["description"]="Build ALSA drivers with debugging code?
 If you choose this option, the ALSA drivers will be built with
 code to help with debugging.
";
$elem["alsa-source/debug"]["descriptionde"]="ALSA-Treiber mit Code zum Fehlersuchen bauen?
 Falls Sie diese Option auswählen, werden die gebauten ALSA-Treiber Code zur Hilfe bei der Fehlersuche enthalten.
";
$elem["alsa-source/debug"]["descriptionfr"]="Faut-il compiler les pilotes ALSA en mode de débogage ?
 Si vous choisissez cette option, les pilotes ALSA comporteront du code additionnel permettant leur débogage.
";
$elem["alsa-source/debug"]["default"]="false";
$elem["alsa-source/cards_to_be_built"]["type"]="multiselect";
$elem["alsa-source/cards_to_be_built"]["choices"][1]="all";
$elem["alsa-source/cards_to_be_built"]["choicesde"][1]="alle";
$elem["alsa-source/cards_to_be_built"]["choicesfr"][1]="tous";
$elem["alsa-source/cards_to_be_built"]["description"]="ALSA drivers to build:
 Please select the ALSA sound card drivers that should be included
 in alsa-modules packages built from these sources.
 .
 The following is a list of available sound card drivers
 along with short descriptions.
 .
 ${alsa_cards_with_descriptions}
";
$elem["alsa-source/cards_to_be_built"]["descriptionde"]="Wählen Sie die zu bauenden Treiber:
 Bitte wählen Sie die ALSA-Soundkarten-Treiber, die im Paket Alsa-modules-Paketen enthalten sein sollen. Alsa-modules-Pakete werden aus diesen Quellen gebaut werden.
 .
 Die folgende Liste gibt die verfügbaren Soundkarten zusammen mit einer kurzen Beschreibung an.
 .
 ${alsa_cards_with_descriptions}
";
$elem["alsa-source/cards_to_be_built"]["descriptionfr"]="Pilotes ALSA à compiler :
 Veuillez choisir les pilotes ALSA pour cartes son qui seront inclus dans les paquets alsa-modules créés à partir de ces sources.
 .
 La liste affichée propose les pilotes disponibles avec une description sommaire.
 .
 ${alsa_cards_with_descriptions}
";
$elem["alsa-source/cards_to_be_built"]["default"]="all";
$elem["alsa-source/cards"]["type"]="select";
$elem["alsa-source/cards"]["choices"][1]="seq-dummy";
$elem["alsa-source/cards"]["choices"][2]="dummy";
$elem["alsa-source/cards"]["choices"][3]="virmidi";
$elem["alsa-source/cards"]["choices"][4]="loopback";
$elem["alsa-source/cards"]["choices"][5]="ad1816a";
$elem["alsa-source/cards"]["choices"][6]="ad1848";
$elem["alsa-source/cards"]["choices"][7]="adlib";
$elem["alsa-source/cards"]["choices"][8]="ad1889";
$elem["alsa-source/cards"]["choices"][9]="ad1816a";
$elem["alsa-source/cards"]["choices"][10]="aica";
$elem["alsa-source/cards"]["choices"][11]="ali5451";
$elem["alsa-source/cards"]["choices"][12]="als100";
$elem["alsa-source/cards"]["choices"][13]="als300";
$elem["alsa-source/cards"]["choices"][14]="als4000";
$elem["alsa-source/cards"]["choices"][15]="aoa";
$elem["alsa-source/cards"]["choices"][16]="aoa-fabric-layout";
$elem["alsa-source/cards"]["choices"][17]="aoa-onyx";
$elem["alsa-source/cards"]["choices"][18]="aoa-tas";
$elem["alsa-source/cards"]["choices"][19]="aoa-toonie";
$elem["alsa-source/cards"]["choices"][20]="aoa-soundbus";
$elem["alsa-source/cards"]["choices"][21]="aoa-soundbus-i2s";
$elem["alsa-source/cards"]["choices"][22]="armaaci";
$elem["alsa-source/cards"]["choices"][23]="asihpi";
$elem["alsa-source/cards"]["choices"][24]="at73c213";
$elem["alsa-source/cards"]["choices"][25]="atiixp";
$elem["alsa-source/cards"]["choices"][26]="atiixp-modem";
$elem["alsa-source/cards"]["choices"][27]="at32-soc-playpaq-slave";
$elem["alsa-source/cards"]["choices"][28]="at91-soc";
$elem["alsa-source/cards"]["choices"][29]="at91-soc-eti-b1-wm8731";
$elem["alsa-source/cards"]["choices"][30]="1-soc-eti-slave";
$elem["alsa-source/cards"]["choices"][31]="au1x00";
$elem["alsa-source/cards"]["choices"][32]="aw2";
$elem["alsa-source/cards"]["choices"][33]="au8820";
$elem["alsa-source/cards"]["choices"][34]="au8830";
$elem["alsa-source/cards"]["choices"][35]="azt2320";
$elem["alsa-source/cards"]["choices"][36]="azt3328";
$elem["alsa-source/cards"]["choices"][37]="bt87x";
$elem["alsa-source/cards"]["choices"][38]="ca0106";
$elem["alsa-source/cards"]["choices"][39]="cmi8330";
$elem["alsa-source/cards"]["choices"][40]="cmipci";
$elem["alsa-source/cards"]["choices"][41]="cs4231";
$elem["alsa-source/cards"]["choices"][42]="cs4232";
$elem["alsa-source/cards"]["choices"][43]="cs4236";
$elem["alsa-source/cards"]["choices"][44]="cs4281";
$elem["alsa-source/cards"]["choices"][45]="cs5535audio";
$elem["alsa-source/cards"]["choices"][46]="cx88_alsa";
$elem["alsa-source/cards"]["choices"][47]="darla20";
$elem["alsa-source/cards"]["choices"][48]="darla24";
$elem["alsa-source/cards"]["choices"][49]="davinci-soc";
$elem["alsa-source/cards"]["choices"][50]="davinci-soc-evm";
$elem["alsa-source/cards"]["choices"][51]="dt019x";
$elem["alsa-source/cards"]["choices"][52]="echo3g";
$elem["alsa-source/cards"]["choices"][53]="emu10k1";
$elem["alsa-source/cards"]["choices"][54]="emu10k1x";
$elem["alsa-source/cards"]["choices"][55]="ens1370";
$elem["alsa-source/cards"]["choices"][56]="ens1371";
$elem["alsa-source/cards"]["choices"][57]="es1688";
$elem["alsa-source/cards"]["choices"][58]="es18xx";
$elem["alsa-source/cards"]["choices"][59]="es1938";
$elem["alsa-source/cards"]["choices"][60]="es1968";
$elem["alsa-source/cards"]["choices"][61]="es968";
$elem["alsa-source/cards"]["choices"][62]="fm801";
$elem["alsa-source/cards"]["choices"][63]="fm801-tea575x";
$elem["alsa-source/cards"]["choices"][64]="gina20";
$elem["alsa-source/cards"]["choices"][65]="gina24";
$elem["alsa-source/cards"]["choices"][66]="gusclassic";
$elem["alsa-source/cards"]["choices"][67]="gusextreme";
$elem["alsa-source/cards"]["choices"][68]="gusmax";
$elem["alsa-source/cards"]["choices"][69]="harmony";
$elem["alsa-source/cards"]["choices"][70]="hda-codec-atihdmi";
$elem["alsa-source/cards"]["choices"][71]="hda-codec-analog";
$elem["alsa-source/cards"]["choices"][72]="hda-codec-conexant";
$elem["alsa-source/cards"]["choices"][73]="hda-codec-cmedia";
$elem["alsa-source/cards"]["choices"][74]="hda-codec-realtek";
$elem["alsa-source/cards"]["choices"][75]="hda-codec-si3054";
$elem["alsa-source/cards"]["choices"][76]="hda-codec-sigmatel";
$elem["alsa-source/cards"]["choices"][77]="hda-codec-via";
$elem["alsa-source/cards"]["choices"][78]="hda-generic";
$elem["alsa-source/cards"]["choices"][79]="hda-hwdep";
$elem["alsa-source/cards"]["choices"][80]="hda-intel";
$elem["alsa-source/cards"]["choices"][81]="hda-power-save";
$elem["alsa-source/cards"]["choices"][82]="hdsp";
$elem["alsa-source/cards"]["choices"][83]="hdspm";
$elem["alsa-source/cards"]["choices"][84]="hifier";
$elem["alsa-source/cards"]["choices"][85]="hpet";
$elem["alsa-source/cards"]["choices"][86]="ice1712";
$elem["alsa-source/cards"]["choices"][87]="ice1724";
$elem["alsa-source/cards"]["choices"][88]="indigo";
$elem["alsa-source/cards"]["choices"][89]="indigodj";
$elem["alsa-source/cards"]["choices"][90]="indigoio";
$elem["alsa-source/cards"]["choices"][91]="intel8x0";
$elem["alsa-source/cards"]["choices"][92]="intel8x0m";
$elem["alsa-source/cards"]["choices"][93]="interwave";
$elem["alsa-source/cards"]["choices"][94]="interwave-stb";
$elem["alsa-source/cards"]["choices"][95]="layla20";
$elem["alsa-source/cards"]["choices"][96]="layla24";
$elem["alsa-source/cards"]["choices"][97]="mia";
$elem["alsa-source/cards"]["choices"][98]="miro";
$elem["alsa-source/cards"]["choices"][99]="mixart";
$elem["alsa-source/cards"]["choices"][100]="ml403-ac97cr";
$elem["alsa-source/cards"]["choices"][101]="mona";
$elem["alsa-source/cards"]["choices"][102]="mpu401";
$elem["alsa-source/cards"]["choices"][103]="msnd-pinnacle";
$elem["alsa-source/cards"]["choices"][104]="mtpav";
$elem["alsa-source/cards"]["choices"][105]="mts64";
$elem["alsa-source/cards"]["choices"][106]="nm256";
$elem["alsa-source/cards"]["choices"][107]="omap-soc";
$elem["alsa-source/cards"]["choices"][108]="omap-soc-n810";
$elem["alsa-source/cards"]["choices"][109]="opl3sa2";
$elem["alsa-source/cards"]["choices"][110]="opti92x-ad1848";
$elem["alsa-source/cards"]["choices"][111]="opti92x-cs4231";
$elem["alsa-source/cards"]["choices"][112]="opti93x";
$elem["alsa-source/cards"]["choices"][113]="oxygen";
$elem["alsa-source/cards"]["choices"][114]="pc98-cs4232";
$elem["alsa-source/cards"]["choices"][115]="pcsp";
$elem["alsa-source/cards"]["choices"][116]="pcxhr";
$elem["alsa-source/cards"]["choices"][117]="pdaudiocf";
$elem["alsa-source/cards"]["choices"][118]="pdplus";
$elem["alsa-source/cards"]["choices"][119]="portman2x4";
$elem["alsa-source/cards"]["choices"][120]="powermac";
$elem["alsa-source/cards"]["choices"][121]="ps3";
$elem["alsa-source/cards"]["choices"][122]="pxa2xx-ac97";
$elem["alsa-source/cards"]["choices"][123]="pxa2xx-i2sound";
$elem["alsa-source/cards"]["choices"][124]="pxa2xx-soc";
$elem["alsa-source/cards"]["choices"][125]="pxa2xx-soc-corgi";
$elem["alsa-source/cards"]["choices"][126]="pxa2xx-soc-spitz";
$elem["alsa-source/cards"]["choices"][127]="pxa2xx-soc-poodle";
$elem["alsa-source/cards"]["choices"][128]="pxa2xx-soc-tosa";
$elem["alsa-source/cards"]["choices"][129]="riptide";
$elem["alsa-source/cards"]["choices"][130]="rme32";
$elem["alsa-source/cards"]["choices"][131]="rme96";
$elem["alsa-source/cards"]["choices"][132]="rme9652";
$elem["alsa-source/cards"]["choices"][133]="rtctimer";
$elem["alsa-source/cards"]["choices"][134]="s3c2410";
$elem["alsa-source/cards"]["choices"][135]="s3c24xx-soc-neo1973-wm8753";
$elem["alsa-source/cards"]["choices"][136]="s3c24xx-soc-smdk2443-wm9710";
$elem["alsa-source/cards"]["choices"][137]="s3c24xx-soc-ln2440sbc-alc650";
$elem["alsa-source/cards"]["choices"][138]="sa11xx-uda1341";
$elem["alsa-source/cards"]["choices"][139]="sb16";
$elem["alsa-source/cards"]["choices"][140]="sb8";
$elem["alsa-source/cards"]["choices"][141]="sbawe";
$elem["alsa-source/cards"]["choices"][142]="sc6000";
$elem["alsa-source/cards"]["choices"][143]="serial-u16550";
$elem["alsa-source/cards"]["choices"][144]="sgalaxy";
$elem["alsa-source/cards"]["choices"][145]="sis7019";
$elem["alsa-source/cards"]["choices"][146]="soc";
$elem["alsa-source/cards"]["choices"][147]="soc-au1xpsc";
$elem["alsa-source/cards"]["choices"][148]="soc-mpc8610-hpcd";
$elem["alsa-source/cards"]["choices"][149]="soc-sample-psc-ac97";
$elem["alsa-source/cards"]["choices"][150]="sonicvibes";
$elem["alsa-source/cards"]["choices"][151]="sscape";
$elem["alsa-source/cards"]["choices"][152]="at91-soc";
$elem["alsa-source/cards"]["choices"][153]="at91-soc-eti-b1-wm8731";
$elem["alsa-source/cards"]["choices"][154]="sun-amd7930";
$elem["alsa-source/cards"]["choices"][155]="sun-cs4231";
$elem["alsa-source/cards"]["choices"][156]="sun-dbri";
$elem["alsa-source/cards"]["choices"][157]="trident";
$elem["alsa-source/cards"]["choices"][158]="usb-audio";
$elem["alsa-source/cards"]["choices"][159]="usb-usx2y";
$elem["alsa-source/cards"]["choices"][160]="usb-caiaq";
$elem["alsa-source/cards"]["choices"][161]="verbose-procfs";
$elem["alsa-source/cards"]["choices"][162]="verbose-printk";
$elem["alsa-source/cards"]["choices"][163]="via82xx";
$elem["alsa-source/cards"]["choices"][164]="via82xx-modem";
$elem["alsa-source/cards"]["choices"][165]="virtuoso";
$elem["alsa-source/cards"]["choices"][166]="vx222";
$elem["alsa-source/cards"]["choices"][167]="vxpocket";
$elem["alsa-source/cards"]["description"]="for internal use
 Really, it isn't. Trust me.

";
$elem["alsa-source/cards"]["descriptionde"]="";
$elem["alsa-source/cards"]["descriptionfr"]="";
$elem["alsa-source/cards"]["default"]="";
$elem["alsa-source/cards_with_descriptions"]["type"]="select";
$elem["alsa-source/cards_with_descriptions"]["choices"][1]="seq-dummy (dummy MIDI-through sequencer client)";
$elem["alsa-source/cards_with_descriptions"]["choices"][2]="dummy (dummy sound card)";
$elem["alsa-source/cards_with_descriptions"]["choices"][3]="virmidi (virtual MIDI card)";
$elem["alsa-source/cards_with_descriptions"]["choices"][4]="loopback (loopback card)";
$elem["alsa-source/cards_with_descriptions"]["choices"][5]="ad1816a (ISA: Analog Devices SoundPort 1815|1816A chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][6]="ad1848 (ISA: Analog Devices 1847|1848 / Cirrus Logic CS 4248 chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][7]="adlib (ISA: FM card driver)";
$elem["alsa-source/cards_with_descriptions"]["choices"][8]="ad1889 (PCI: Analog Devices 1889 (e.g. on HP PA-RISC computers))";
$elem["alsa-source/cards_with_descriptions"]["choices"][9]="ad1816a (PCI: Highscreen Sound-Boostar 16 3D)";
$elem["alsa-source/cards_with_descriptions"]["choices"][10]="aica Dreamcast AICA sound (pcm) driver)";
$elem["alsa-source/cards_with_descriptions"]["choices"][11]="ali5451 (PCI: AC97 codec on motherboards with ALi M5451 Audio Controller)";
$elem["alsa-source/cards_with_descriptions"]["choices"][12]="als100 (ISA: Avance Logic ALS 100|110|120|200 chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][13]="als300 (PCI: Avance Logic ALS 300|300+ chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][14]="als4000 (PCI: Avance Logic ALS 4000 chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][15]="aoa (PPC: Various Apple Onboard Audio components)";
$elem["alsa-source/cards_with_descriptions"]["choices"][16]="aoa-fabric-layout (PPC: layout-id fabric for the Apple Onboard Audio driver)";
$elem["alsa-source/cards_with_descriptions"]["choices"][17]="aoa-onyx (PPC: Onyx (pcm3052) codec chip found in the latest Apple machines)";
$elem["alsa-source/cards_with_descriptions"]["choices"][18]="aoa-tas (PPC: Tas chips found in a lot of Apple Machines especially iBooks and PowerBooks without digital.)";
$elem["alsa-source/cards_with_descriptions"]["choices"][19]="aoa-toonie (PPC: Toonie codec for the MAC Mini)";
$elem["alsa-source/cards_with_descriptions"]["choices"][20]="aoa-soundbus (PPC: Generic driver for the soundbus support on Apple machines)";
$elem["alsa-source/cards_with_descriptions"]["choices"][21]="aoa-soundbus-i2s (PPC: Apple I2S busses)";
$elem["alsa-source/cards_with_descriptions"]["choices"][22]="armaaci (ARM: PrimeCell AACI PL041 codec)";
$elem["alsa-source/cards_with_descriptions"]["choices"][23]="asihpi (PCI: AudioScience ASI 43xx|5xxx|6xxx|87xx cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][24]="at73c213 (PCI: AT73C213 16-bit stereo DAC on Atmel ATSTK1000)";
$elem["alsa-source/cards_with_descriptions"]["choices"][25]="atiixp (PCI: AC97 codec on motherboards with ATI IXP 150|200|250 chipsets)";
$elem["alsa-source/cards_with_descriptions"]["choices"][26]="atiixp-modem (PCI: MC97 MODEM on motherboards with ATI IXP chipsets)";
$elem["alsa-source/cards_with_descriptions"]["choices"][27]="at32-soc-playpaq-slave (ASoC PCM interface for Atmel AT32 SoC)";
$elem["alsa-source/cards_with_descriptions"]["choices"][28]="at91-soc (PCI: SoC Audio for the Atmel AT91 System-on-Chip)";
$elem["alsa-source/cards_with_descriptions"]["choices"][29]="at91-soc-eti-b1-wm8731 (PCI: SoC I2S Audio support for WM8731-based Endrelia ETI-B1 boards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][30]="1-soc-eti-slave (PCI: Run codec in slave Mode on Endrelia boards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][31]="au1x00 (MIPS: AMD Au1000 MIPS AC'97 sound port)";
$elem["alsa-source/cards_with_descriptions"]["choices"][32]="aw2 (Audiowerk2)";
$elem["alsa-source/cards_with_descriptions"]["choices"][33]="au8820 (PCI: Aureal Vortex cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][34]="au8830 (PCI: Aureal Vortex 2 cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][35]="azt2320 (ISA: Aztech Systems AZT 2320 chip)";
$elem["alsa-source/cards_with_descriptions"]["choices"][36]="azt3328 (PCI: Aztech Systems AZF 3328 chip -- EXPERIMENTAL)";
$elem["alsa-source/cards_with_descriptions"]["choices"][37]="bt87x (PCI: TV cards with Brooktree Bt87x chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][38]="ca0106 (PCI: cards with CA 0106 chips (e.g. Sound Blaster Audigy LS and Live 24bit))";
$elem["alsa-source/cards_with_descriptions"]["choices"][39]="cmi8330 (ISA: C-Media CMI 8330 chip)";
$elem["alsa-source/cards_with_descriptions"]["choices"][40]="cmipci (PCI: C-Media CMI 8338|8738 chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][41]="cs4231 (ISA: Crystal/Cirrus Logic CS 4231 chip)";
$elem["alsa-source/cards_with_descriptions"]["choices"][42]="cs4232 (ISA: Crystal/Cirrus Logic CS 4232|4232A chip)";
$elem["alsa-source/cards_with_descriptions"]["choices"][43]="cs4236 (ISA: Crystal/Cirrus Logic CS 4235|4236|4236B|4237B|4238B|4239 chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][44]="cs4281 (PCI: Cirrus Logic (Sound Fusion) CS 4281 chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][45]="cs5535audio (PCI: Cirrus Logic CS 5535 companion device audio)";
$elem["alsa-source/cards_with_descriptions"]["choices"][46]="cx88_alsa (PCI: TV cards capture driver like in Hauppauge cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][47]="darla20 (PCI: Echoaudio Darla20)";
$elem["alsa-source/cards_with_descriptions"]["choices"][48]="darla24 (PCI: Echoaudio Darla24)";
$elem["alsa-source/cards_with_descriptions"]["choices"][49]="davinci-soc (PCI: TI DAVINCI processor)";
$elem["alsa-source/cards_with_descriptions"]["choices"][50]="davinci-soc-evm (PCI: TI DAVINCI processor)";
$elem["alsa-source/cards_with_descriptions"]["choices"][51]="dt019x (ISA: Diamond Technologies DT 019X/7H or Avance Logic ALS 007 chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][52]="echo3g (PCI: Echoaudio 3G)";
$elem["alsa-source/cards_with_descriptions"]["choices"][53]="emu10k1 (PCI: Creative EMU10K1|EMU10K2 chips (SB PCI512|Live!|Audigy or Emu APS))";
$elem["alsa-source/cards_with_descriptions"]["choices"][54]="emu10k1x (PCI: Creative EMU10K1X (or STAC 9708T?) chips (e.g. SB Live! Dell OEM Version))";
$elem["alsa-source/cards_with_descriptions"]["choices"][55]="ens1370 (PCI: (Creative) Ensoniq AudioPCI ES 1370 chip (e.g. SB PCI 64|128))";
$elem["alsa-source/cards_with_descriptions"]["choices"][56]="ens1371 (PCI: (Creative) Ensoniq AudioPCI ES 1371|1373 chips (e.g. SB PCI 64|128 or SB Vibra PCI))";
$elem["alsa-source/cards_with_descriptions"]["choices"][57]="es1688 (ISA: ESS AudioDrive ES 688|1688 chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][58]="es18xx (ISA: ESS AudioDrive ES 18xx chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][59]="es1938 (PCI: ESS ES 1938|1946|1969 (Solo-1) chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][60]="es1968 (PCI: ESS ES 1968|1978 (Maestro 1|2|2E) chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][61]="es968 (ISA: ESS AudioDrive ES 968 chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][62]="fm801 (PCI: ForteMedia FM 801 chip)";
$elem["alsa-source/cards_with_descriptions"]["choices"][63]="fm801-tea575x (PCI: ForteMedia FM 801 + TEA 575x chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][64]="gina20 (PCI: Echoaudio Gina20)";
$elem["alsa-source/cards_with_descriptions"]["choices"][65]="gina24 (PCI: Echoaudio Gina24)";
$elem["alsa-source/cards_with_descriptions"]["choices"][66]="gusclassic (ISA: Gravis UltraSound Classic cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][67]="gusextreme (ISA: Gravis UltraSound Extreme (Synergy ViperMax) cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][68]="gusmax (ISA: Gravis UltraSound MAX cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][69]="harmony (PA-RISC: Harmony/Vivace sound chip)";
$elem["alsa-source/cards_with_descriptions"]["choices"][70]="hda-codec-atihdmi";
$elem["alsa-source/cards_with_descriptions"]["choices"][71]="hda-codec-analog";
$elem["alsa-source/cards_with_descriptions"]["choices"][72]="hda-codec-conexant";
$elem["alsa-source/cards_with_descriptions"]["choices"][73]="hda-codec-cmedia";
$elem["alsa-source/cards_with_descriptions"]["choices"][74]="hda-codec-realtek";
$elem["alsa-source/cards_with_descriptions"]["choices"][75]="hda-codec-si3054";
$elem["alsa-source/cards_with_descriptions"]["choices"][76]="hda-codec-sigmatel";
$elem["alsa-source/cards_with_descriptions"]["choices"][77]="hda-codec-via";
$elem["alsa-source/cards_with_descriptions"]["choices"][78]="hda-generic";
$elem["alsa-source/cards_with_descriptions"]["choices"][79]="hda-hwdep";
$elem["alsa-source/cards_with_descriptions"]["choices"][80]="hda-intel (PCI: Intel HD Audio ICH 6|6M cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][81]="hda-power-save";
$elem["alsa-source/cards_with_descriptions"]["choices"][82]="hdsp (PCI: RME Hammerfall DSP)";
$elem["alsa-source/cards_with_descriptions"]["choices"][83]="hdspm (PCI: RME Hammerfall DSP MADI board)";
$elem["alsa-source/cards_with_descriptions"]["choices"][84]="hifier (PCI: C-Media CMI8788 driver for the MediaTek/TempoTec HiFier Fantasia)";
$elem["alsa-source/cards_with_descriptions"]["choices"][85]="hpet (HPE timer driver)";
$elem["alsa-source/cards_with_descriptions"]["choices"][86]="ice1712 (PCI: ICEnsemble ICE 1712 (Envy24) chip (e.g. various M-Audio (formerly MidiMan)|TerraTec|Hoontech|Digigram cards))";
$elem["alsa-source/cards_with_descriptions"]["choices"][87]="ice1724 (PCI: ICEnsemble ICE|VT 1720|1724 (Envy24 HT|PT) chip (e.g. various M-Audio (formerly MidiMan)|AMP|TerraTec cards))";
$elem["alsa-source/cards_with_descriptions"]["choices"][88]="indigo (PCI: Echoaudio Indigo)";
$elem["alsa-source/cards_with_descriptions"]["choices"][89]="indigodj (PCI: Echoaudio Indigo DJ)";
$elem["alsa-source/cards_with_descriptions"]["choices"][90]="indigoio (PCI: Echoaudio Indigo IO)";
$elem["alsa-source/cards_with_descriptions"]["choices"][91]="intel8x0 (PCI: AC97 codec on motherboards with Intel ICH|i8x0 or SiS 735 or nVidia nForce or AMD 768|8111 chipsets or ALi M5455)";
$elem["alsa-source/cards_with_descriptions"]["choices"][92]="intel8x0m (PCI: MC97 MODEM on motherboards with Intel|SiS|nVidia|AMD chipsets -- EXPERIMENTAL)";
$elem["alsa-source/cards_with_descriptions"]["choices"][93]="interwave (ISA: AMD InterWave chip (e.g. various Gravis|Dynasonic|STB cards))";
$elem["alsa-source/cards_with_descriptions"]["choices"][94]="interwave-stb (ISA: AMD InterWave + TEA 6330T chips (e.g. Gravis UltraSound 32-Pro))";
$elem["alsa-source/cards_with_descriptions"]["choices"][95]="layla20 (PCI: Echoaudio Layla20)";
$elem["alsa-source/cards_with_descriptions"]["choices"][96]="layla24 (PCI: Echoaudio Layla24)";
$elem["alsa-source/cards_with_descriptions"]["choices"][97]="mia (PCI: Echoaudio Mia)";
$elem["alsa-source/cards_with_descriptions"]["choices"][98]="miro (ISA: Miro miroSOUND PCM1pro|PCM12|PCM20 Radio)";
$elem["alsa-source/cards_with_descriptions"]["choices"][99]="mixart (PCI: Digigram miXart8 cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][100]="ml403-ac97cr (PCI: Xilinx ML403 AC97 Controller Reference)";
$elem["alsa-source/cards_with_descriptions"]["choices"][101]="mona (PCI: Echoaudio Mona)";
$elem["alsa-source/cards_with_descriptions"]["choices"][102]="mpu401 (ISA: chips with MIDI interface compatible with Roland MPU 401 in UART mode)";
$elem["alsa-source/cards_with_descriptions"]["choices"][103]="msnd-pinnacle (ISA: Turtle Beach MultiSound Pinnacle cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][104]="mtpav (ISA: MOTU MidiTimePiece AV multiport MIDI interface)";
$elem["alsa-source/cards_with_descriptions"]["choices"][105]="mts64 (PCI: ESI Miditerminal 4140 driver)";
$elem["alsa-source/cards_with_descriptions"]["choices"][106]="nm256 (PCI: NeoMagic NM 256AV|256ZX chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][107]="omap-soc (Nokias Internet Tablett)";
$elem["alsa-source/cards_with_descriptions"]["choices"][108]="omap-soc-n810 (Nokias Internet Tablett)";
$elem["alsa-source/cards_with_descriptions"]["choices"][109]="opl3sa2 (ISA: Yamaha OPL3 SA2|SA3 chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][110]="opti92x-ad1848 (ISA: cards with OPTi 82C92x (or OTI-601?) with AD 1848 chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][111]="opti92x-cs4231 (ISA: cards with OPTi 82C92x with CS 4231 chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][112]="opti93x (ISA: cards with OPTi 82C93x chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][113]="oxygen (PCI: C-Media CMI8788 driver for C-Media's reference design and for the X-Meridian)";
$elem["alsa-source/cards_with_descriptions"]["choices"][114]="pc98-cs4232 (ISA: NEC PC '98 with Cirrus Logic CS 4232 chip)";
$elem["alsa-source/cards_with_descriptions"]["choices"][115]="pcsp (ISA: PC speaker)";
$elem["alsa-source/cards_with_descriptions"]["choices"][116]="pcxhr (PCI: Digigram PCXHR)";
$elem["alsa-source/cards_with_descriptions"]["choices"][117]="pdaudiocf (PCMCIA: Sound Core PDAudioCF cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][118]="pdplus (PCI: Sek'D/Marian Prodif Plus card)";
$elem["alsa-source/cards_with_descriptions"]["choices"][119]="portman2x4 (Midiman Portman2x4 parallel port MIDI interface)";
$elem["alsa-source/cards_with_descriptions"]["choices"][120]="powermac (PPC: PowerMac (AWACS|DACA|Burgundy|Tumbler|Keywest))";
$elem["alsa-source/cards_with_descriptions"]["choices"][121]="ps3 (PPC: Sony PS3's soundcard)";
$elem["alsa-source/cards_with_descriptions"]["choices"][122]="pxa2xx-ac97 (ARM: Intel PXA2xx AC97)";
$elem["alsa-source/cards_with_descriptions"]["choices"][123]="pxa2xx-i2sound (ARM: Intel PXA2xx I2S)";
$elem["alsa-source/cards_with_descriptions"]["choices"][124]="pxa2xx-soc (SoC Audio for the Intel PXA2xx chip)";
$elem["alsa-source/cards_with_descriptions"]["choices"][125]="pxa2xx-soc-corgi (SoC Audio support for Sharp Zaurus SL-C7x0)";
$elem["alsa-source/cards_with_descriptions"]["choices"][126]="pxa2xx-soc-spitz (SoC Audio support for Sharp Zaurus SL-Cxx00)";
$elem["alsa-source/cards_with_descriptions"]["choices"][127]="pxa2xx-soc-poodle (SoC Audio support for Poodle)";
$elem["alsa-source/cards_with_descriptions"]["choices"][128]="pxa2xx-soc-tosa (SoC AC97 Audio support for Tosa)";
$elem["alsa-source/cards_with_descriptions"]["choices"][129]="riptide (PCI: Conexant Riptide chip (e.g. on HP Pavilion computers))";
$elem["alsa-source/cards_with_descriptions"]["choices"][130]="rme32 (PCI: RME Digi 32|32/8|32Pro cards (e.g. Sek'd Prodif 32|96|Gold))";
$elem["alsa-source/cards_with_descriptions"]["choices"][131]="rme96 (PCI: RME Digi 96|96/8 or Digi 96/8 PRO|PAD|PST cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][132]="rme9652 (PCI: RME Digi 9652 cards (e.g. Hammerfall and Hammerfall-Light))";
$elem["alsa-source/cards_with_descriptions"]["choices"][133]="rtctimer";
$elem["alsa-source/cards_with_descriptions"]["choices"][134]="s3c2410 (ARM: S3C24XX IIS chip)";
$elem["alsa-source/cards_with_descriptions"]["choices"][135]="s3c24xx-soc-neo1973-wm8753";
$elem["alsa-source/cards_with_descriptions"]["choices"][136]="s3c24xx-soc-smdk2443-wm9710";
$elem["alsa-source/cards_with_descriptions"]["choices"][137]="s3c24xx-soc-ln2440sbc-alc650";
$elem["alsa-source/cards_with_descriptions"]["choices"][138]="sa11xx-uda1341 (ARM: Philips UDA1341TS chip connected to SA11xx chip (eg. Compaq iPAQ H3600))";
$elem["alsa-source/cards_with_descriptions"]["choices"][139]="sb16 (ISA: Sound Blaster 16 cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][140]="sb8 (ISA: Sound Blaster 1.0|2.0|Pro cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][141]="sbawe (ISA: Sound Blaster AWE 32|64 cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][142]="sc6000 (ISA: SC-6000 soundcard Audio Excel DSP 16 or Zoltrix AV302)";
$elem["alsa-source/cards_with_descriptions"]["choices"][143]="serial-u16550 (ISA: UART 16550 based serial MIDI port)";
$elem["alsa-source/cards_with_descriptions"]["choices"][144]="sgalaxy (ISA: Aztech Sound Galaxy cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][145]="sis7019 (PCI: Driver for SiS7019 Audio Accelerator)";
$elem["alsa-source/cards_with_descriptions"]["choices"][146]="soc (SoC Audio Layer)";
$elem["alsa-source/cards_with_descriptions"]["choices"][147]="soc-au1xpsc (SoC Audio Layer)";
$elem["alsa-source/cards_with_descriptions"]["choices"][148]="soc-mpc8610-hpcd (SoC Audio Layer)";
$elem["alsa-source/cards_with_descriptions"]["choices"][149]="soc-sample-psc-ac97 (SoC Audio Layer)";
$elem["alsa-source/cards_with_descriptions"]["choices"][150]="sonicvibes (PCI: S3 SonicVibes chip)";
$elem["alsa-source/cards_with_descriptions"]["choices"][151]="sscape (ISA: Ensoniq SoundScape PnP cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][152]="at91-soc (SoC Audio for the Atmel AT91 System-on-ChipSoC Audio for the Atmel AT91 System-on-Chip)";
$elem["alsa-source/cards_with_descriptions"]["choices"][153]="at91-soc-eti-b1-wm8731 (SoC I2S Audio support for Endrelia ETI-B1 board)";
$elem["alsa-source/cards_with_descriptions"]["choices"][154]="sun-amd7930 (SPARC: Sun AMD 7930)";
$elem["alsa-source/cards_with_descriptions"]["choices"][155]="sun-cs4231 (SPARC: Sun CS 4231)";
$elem["alsa-source/cards_with_descriptions"]["choices"][156]="sun-dbri (SPARC: Sun DBRI)";
$elem["alsa-source/cards_with_descriptions"]["choices"][157]="trident (PCI: Trident 4D-Wave DX|NX or SiS 7018 chips)";
$elem["alsa-source/cards_with_descriptions"]["choices"][158]="usb-audio (USB: USB audio and USB MIDI devices)";
$elem["alsa-source/cards_with_descriptions"]["choices"][159]="usb-usx2y (USB: Tascam US 122|224|428)";
$elem["alsa-source/cards_with_descriptions"]["choices"][160]="usb-caiaq (USB: driver for caiaq/NativeInstruments devices)";
$elem["alsa-source/cards_with_descriptions"]["choices"][161]="verbose-procfs";
$elem["alsa-source/cards_with_descriptions"]["choices"][162]="verbose-printk";
$elem["alsa-source/cards_with_descriptions"]["choices"][163]="via82xx (PCI: AC97 codec on motherboards with VIA VT 8233|8233A|8233C|8235 or VT 82C686 A|B|C chipsets)";
$elem["alsa-source/cards_with_descriptions"]["choices"][164]="via82xx-modem (PCI: MC97 MODEM on VIA 82xx)";
$elem["alsa-source/cards_with_descriptions"]["choices"][165]="virtuoso (PCI: C-Media CMI8788 driver for Asus Xonar cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][166]="vx222 (PCI: Digigram VX222 or VX222 V2|Mic cards)";
$elem["alsa-source/cards_with_descriptions"]["choices"][167]="vxpocket (PCMCIA: Digigram VX-Pocket or VX2 card)";
$elem["alsa-source/cards_with_descriptions"]["description"]="for internal use
 Really, it isn't. Trust me.

";
$elem["alsa-source/cards_with_descriptions"]["descriptionde"]="";
$elem["alsa-source/cards_with_descriptions"]["descriptionfr"]="";
$elem["alsa-source/cards_with_descriptions"]["default"]="";
PKG_OptionPageTail2($elem);
?>
