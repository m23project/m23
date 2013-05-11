<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("clamav-freshclam");

$elem["clamav-freshclam/autoupdate_freshclam"]["type"]="select";
$elem["clamav-freshclam/autoupdate_freshclam"]["choices"][1]="daemon";
$elem["clamav-freshclam/autoupdate_freshclam"]["choices"][2]="ifup.d";
$elem["clamav-freshclam/autoupdate_freshclam"]["choices"][3]="cron";
$elem["clamav-freshclam/autoupdate_freshclam"]["choicesde"][1]="Daemon";
$elem["clamav-freshclam/autoupdate_freshclam"]["choicesde"][2]="ifup.d";
$elem["clamav-freshclam/autoupdate_freshclam"]["choicesde"][3]="cron";
$elem["clamav-freshclam/autoupdate_freshclam"]["choicesfr"][1]="démon";
$elem["clamav-freshclam/autoupdate_freshclam"]["choicesfr"][2]="ifup.d";
$elem["clamav-freshclam/autoupdate_freshclam"]["choicesfr"][3]="cron";
$elem["clamav-freshclam/autoupdate_freshclam"]["description"]="Virus database update method:
 Please choose the method for virus database updates.
 .
  daemon:  freshclam is running as a daemon all the time. You should choose
           this option if you have a permanent network connection;
  ifup.d:  freshclam will be running as a daemon as long as your Internet
           connection is up. Choose this one if you use a dialup Internet
           connection and don't want freshclam to initiate new connections;
  cron:    freshclam is started from cron. Choose this if you want full control
           of when the database is updated;
  manual:  no automatic invocation of freshclam. This is not recommended,
           as ClamAV's database is constantly updated.
";
$elem["clamav-freshclam/autoupdate_freshclam"]["descriptionde"]="Aktualisierungsmethode der Virus-Datenbank:
 Bitte wählen Sie die Methode für die Aktualisierungen der Virus-Datenbank aus.
 .
  Daemon : freshclam läuft immer als Dienst. Sie sollten dies auswählen, 
           falls Sie eine permanente Verbindung ins Internet haben.
  ifup.d : freshclam wird nur als Dienst laufen, solange Sie mit dem
           Internet verbunden sind. Wählen Sie dies aus, falls Sie eine
           Wählverbindung ins Internet haben und nicht wollen, dass
           freshclam neue Verbindungen aufbaut.
  cron   : freshclam wird durch cron gestartet. Wählen Sie dies, falls
           Sie genau festlegen wollen, wann die Datenbank aktualisiert
           wird.
  manuell: Kein automatischer Start von freshclam. Das wird nicht
           empfohlen, weil ClamAVs Datenbank ständig aktualisiert wird.
";
$elem["clamav-freshclam/autoupdate_freshclam"]["descriptionfr"]="Méthode de mise à jour de la base de données des virus :
 Veuillez choisir la méthode de mise à jour de la base de données des virus.
 .
 démon    : freshclam fonctionne en permanence en tant que démon.
            Utilisez ce choix avec un connexion réseau permanente ;
 ifup.d   : freshclam fonctionne en tant que démon pendant que la
            connexion à Internet est active. Utilisez ce choix avec
            une connexion Internet intermittente pour éviter que
            freshclam ne provoque l'établissement de nouvelles connexions ;
 cron     : freshclam est démarré par une tâche périodique de cron.
            Utilisez ce choix si vous souhaitez complètement contrôler la
            façon dont la base de données est mise à jour ;
 manuelle : pas de lancement automatique de freshclam. Ce choix est
            déconseillé car les mises à jour de la base de données de
            ClamAV sont très fréquentes.
";
$elem["clamav-freshclam/autoupdate_freshclam"]["default"]="daemon";
$elem["clamav-freshclam/local_mirror"]["type"]="select";
$elem["clamav-freshclam/local_mirror"]["choices"][1]="db.local.clamav.net";
$elem["clamav-freshclam/local_mirror"]["choices"][2]="db.ac.clamav.net (Ascension Island)";
$elem["clamav-freshclam/local_mirror"]["choices"][3]="db.ad.clamav.net (Andorra)";
$elem["clamav-freshclam/local_mirror"]["choices"][4]="db.ae.clamav.net (United Arab Emirates)";
$elem["clamav-freshclam/local_mirror"]["choices"][5]="db.af.clamav.net (Afghanistan)";
$elem["clamav-freshclam/local_mirror"]["choices"][6]="db.ag.clamav.net (Antigua and Barbuda)";
$elem["clamav-freshclam/local_mirror"]["choices"][7]="db.ai.clamav.net (Anguilla)";
$elem["clamav-freshclam/local_mirror"]["choices"][8]="db.al.clamav.net (Albania)";
$elem["clamav-freshclam/local_mirror"]["choices"][9]="db.am.clamav.net (Armenia)";
$elem["clamav-freshclam/local_mirror"]["choices"][10]="db.an.clamav.net (Netherlands Antilles)";
$elem["clamav-freshclam/local_mirror"]["choices"][11]="db.ao.clamav.net (Angola)";
$elem["clamav-freshclam/local_mirror"]["choices"][12]="db.aq.clamav.net (Antarctica)";
$elem["clamav-freshclam/local_mirror"]["choices"][13]="db.ar.clamav.net (Argentina)";
$elem["clamav-freshclam/local_mirror"]["choices"][14]="db.as.clamav.net (American Samoa)";
$elem["clamav-freshclam/local_mirror"]["choices"][15]="db.at.clamav.net (Austria)";
$elem["clamav-freshclam/local_mirror"]["choices"][16]="db.au.clamav.net (Australia)";
$elem["clamav-freshclam/local_mirror"]["choices"][17]="db.aw.clamav.net (Aruba)";
$elem["clamav-freshclam/local_mirror"]["choices"][18]="db.ax.clamav.net (Aland Islands)";
$elem["clamav-freshclam/local_mirror"]["choices"][19]="db.az.clamav.net (Azerbaijan)";
$elem["clamav-freshclam/local_mirror"]["choices"][20]="db.ba.clamav.net (Bosnia and Herzegovina)";
$elem["clamav-freshclam/local_mirror"]["choices"][21]="db.bb.clamav.net (Barbados)";
$elem["clamav-freshclam/local_mirror"]["choices"][22]="db.bd.clamav.net (Bangladesh)";
$elem["clamav-freshclam/local_mirror"]["choices"][23]="db.be.clamav.net (Belgium)";
$elem["clamav-freshclam/local_mirror"]["choices"][24]="db.bf.clamav.net (Burkina Faso)";
$elem["clamav-freshclam/local_mirror"]["choices"][25]="db.bg.clamav.net (Bulgaria)";
$elem["clamav-freshclam/local_mirror"]["choices"][26]="db.bh.clamav.net (Bahrain)";
$elem["clamav-freshclam/local_mirror"]["choices"][27]="db.bi.clamav.net (Burundi)";
$elem["clamav-freshclam/local_mirror"]["choices"][28]="db.bj.clamav.net (Benin)";
$elem["clamav-freshclam/local_mirror"]["choices"][29]="db.bm.clamav.net (Bermuda)";
$elem["clamav-freshclam/local_mirror"]["choices"][30]="db.bn.clamav.net (Brunei Darussalam)";
$elem["clamav-freshclam/local_mirror"]["choices"][31]="db.bo.clamav.net (Bolivia)";
$elem["clamav-freshclam/local_mirror"]["choices"][32]="db.br.clamav.net (Brazil)";
$elem["clamav-freshclam/local_mirror"]["choices"][33]="db.bs.clamav.net (Bahamas)";
$elem["clamav-freshclam/local_mirror"]["choices"][34]="db.bt.clamav.net (Bhutan)";
$elem["clamav-freshclam/local_mirror"]["choices"][35]="db.bv.clamav.net (Bouvet Island)";
$elem["clamav-freshclam/local_mirror"]["choices"][36]="db.bw.clamav.net (Botswana)";
$elem["clamav-freshclam/local_mirror"]["choices"][37]="db.by.clamav.net (Belarus)";
$elem["clamav-freshclam/local_mirror"]["choices"][38]="db.bz.clamav.net (Belize)";
$elem["clamav-freshclam/local_mirror"]["choices"][39]="db.ca.clamav.net (Canada)";
$elem["clamav-freshclam/local_mirror"]["choices"][40]="db.cc.clamav.net (Cocos (Keeling) Islands)";
$elem["clamav-freshclam/local_mirror"]["choices"][41]="db.cd.clamav.net (Congo The Democratic Republic of the)";
$elem["clamav-freshclam/local_mirror"]["choices"][42]="db.cf.clamav.net (Central African Republic)";
$elem["clamav-freshclam/local_mirror"]["choices"][43]="db.cg.clamav.net (Congo Republic of)";
$elem["clamav-freshclam/local_mirror"]["choices"][44]="db.ch.clamav.net (Switzerland)";
$elem["clamav-freshclam/local_mirror"]["choices"][45]="db.ci.clamav.net (Cote d'Ivoire)";
$elem["clamav-freshclam/local_mirror"]["choices"][46]="db.ck.clamav.net (Cook Islands)";
$elem["clamav-freshclam/local_mirror"]["choices"][47]="db.cl.clamav.net (Chile)";
$elem["clamav-freshclam/local_mirror"]["choices"][48]="db.cm.clamav.net (Cameroon)";
$elem["clamav-freshclam/local_mirror"]["choices"][49]="db.cn.clamav.net (China)";
$elem["clamav-freshclam/local_mirror"]["choices"][50]="db.co.clamav.net (Colombia)";
$elem["clamav-freshclam/local_mirror"]["choices"][51]="db.cr.clamav.net (Costa Rica)";
$elem["clamav-freshclam/local_mirror"]["choices"][52]="db.cs.clamav.net (Serbia and Montenegro)";
$elem["clamav-freshclam/local_mirror"]["choices"][53]="db.cu.clamav.net (Cuba)";
$elem["clamav-freshclam/local_mirror"]["choices"][54]="db.cv.clamav.net (Cape Verde)";
$elem["clamav-freshclam/local_mirror"]["choices"][55]="db.cx.clamav.net (Christmas Island)";
$elem["clamav-freshclam/local_mirror"]["choices"][56]="db.cy.clamav.net (Cyprus)";
$elem["clamav-freshclam/local_mirror"]["choices"][57]="db.cz.clamav.net (Czech Republic)";
$elem["clamav-freshclam/local_mirror"]["choices"][58]="db.de.clamav.net (Germany)";
$elem["clamav-freshclam/local_mirror"]["choices"][59]="db.dj.clamav.net (Djibouti)";
$elem["clamav-freshclam/local_mirror"]["choices"][60]="db.dk.clamav.net (Denmark)";
$elem["clamav-freshclam/local_mirror"]["choices"][61]="db.dm.clamav.net (Dominica)";
$elem["clamav-freshclam/local_mirror"]["choices"][62]="db.do.clamav.net (Dominican Republic)";
$elem["clamav-freshclam/local_mirror"]["choices"][63]="db.dz.clamav.net (Algeria)";
$elem["clamav-freshclam/local_mirror"]["choices"][64]="db.ec.clamav.net (Ecuador)";
$elem["clamav-freshclam/local_mirror"]["choices"][65]="db.ee.clamav.net (Estonia)";
$elem["clamav-freshclam/local_mirror"]["choices"][66]="db.eg.clamav.net (Egypt)";
$elem["clamav-freshclam/local_mirror"]["choices"][67]="db.eh.clamav.net (Western Sahara)";
$elem["clamav-freshclam/local_mirror"]["choices"][68]="db.er.clamav.net (Eritrea)";
$elem["clamav-freshclam/local_mirror"]["choices"][69]="db.es.clamav.net (Spain)";
$elem["clamav-freshclam/local_mirror"]["choices"][70]="db.et.clamav.net (Ethiopia)";
$elem["clamav-freshclam/local_mirror"]["choices"][71]="db.fi.clamav.net (Finland)";
$elem["clamav-freshclam/local_mirror"]["choices"][72]="db.fj.clamav.net (Fiji)";
$elem["clamav-freshclam/local_mirror"]["choices"][73]="db.fk.clamav.net (Falkland Islands (Malvinas))";
$elem["clamav-freshclam/local_mirror"]["choices"][74]="db.fm.clamav.net (Micronesia Federal State of)";
$elem["clamav-freshclam/local_mirror"]["choices"][75]="db.fo.clamav.net (Faroe Islands)";
$elem["clamav-freshclam/local_mirror"]["choices"][76]="db.fr.clamav.net (France)";
$elem["clamav-freshclam/local_mirror"]["choices"][77]="db.ga.clamav.net (Gabon)";
$elem["clamav-freshclam/local_mirror"]["choices"][78]="db.gb.clamav.net (United Kingdom)";
$elem["clamav-freshclam/local_mirror"]["choices"][79]="db.gd.clamav.net (Grenada)";
$elem["clamav-freshclam/local_mirror"]["choices"][80]="db.ge.clamav.net (Georgia)";
$elem["clamav-freshclam/local_mirror"]["choices"][81]="db.gf.clamav.net (French Guiana)";
$elem["clamav-freshclam/local_mirror"]["choices"][82]="db.gg.clamav.net (Guernsey)";
$elem["clamav-freshclam/local_mirror"]["choices"][83]="db.gh.clamav.net (Ghana)";
$elem["clamav-freshclam/local_mirror"]["choices"][84]="db.gi.clamav.net (Gibraltar)";
$elem["clamav-freshclam/local_mirror"]["choices"][85]="db.gl.clamav.net (Greenland)";
$elem["clamav-freshclam/local_mirror"]["choices"][86]="db.gm.clamav.net (Gambia)";
$elem["clamav-freshclam/local_mirror"]["choices"][87]="db.gn.clamav.net (Guinea)";
$elem["clamav-freshclam/local_mirror"]["choices"][88]="db.gp.clamav.net (Guadeloupe)";
$elem["clamav-freshclam/local_mirror"]["choices"][89]="db.gq.clamav.net (Equatorial Guinea)";
$elem["clamav-freshclam/local_mirror"]["choices"][90]="db.gr.clamav.net (Greece)";
$elem["clamav-freshclam/local_mirror"]["choices"][91]="db.gs.clamav.net (South Georgia and the South Sandwich Islands)";
$elem["clamav-freshclam/local_mirror"]["choices"][92]="db.gt.clamav.net (Guatemala)";
$elem["clamav-freshclam/local_mirror"]["choices"][93]="db.gu.clamav.net (Guam)";
$elem["clamav-freshclam/local_mirror"]["choices"][94]="db.gw.clamav.net (Guinea-Bissau)";
$elem["clamav-freshclam/local_mirror"]["choices"][95]="db.gy.clamav.net (Guyana)";
$elem["clamav-freshclam/local_mirror"]["choices"][96]="db.hk.clamav.net (Hong Kong)";
$elem["clamav-freshclam/local_mirror"]["choices"][97]="db.hm.clamav.net (Heard and McDonald Islands)";
$elem["clamav-freshclam/local_mirror"]["choices"][98]="db.hn.clamav.net (Honduras)";
$elem["clamav-freshclam/local_mirror"]["choices"][99]="db.hr.clamav.net (Croatia/Hrvatska)";
$elem["clamav-freshclam/local_mirror"]["choices"][100]="db.ht.clamav.net (Haiti)";
$elem["clamav-freshclam/local_mirror"]["choices"][101]="db.hu.clamav.net (Hungary)";
$elem["clamav-freshclam/local_mirror"]["choices"][102]="db.id.clamav.net (Indonesia)";
$elem["clamav-freshclam/local_mirror"]["choices"][103]="db.ie.clamav.net (Ireland)";
$elem["clamav-freshclam/local_mirror"]["choices"][104]="db.il.clamav.net (Israel)";
$elem["clamav-freshclam/local_mirror"]["choices"][105]="db.im.clamav.net (Isle of Man)";
$elem["clamav-freshclam/local_mirror"]["choices"][106]="db.in.clamav.net (India)";
$elem["clamav-freshclam/local_mirror"]["choices"][107]="db.io.clamav.net (British Indian Ocean Territory)";
$elem["clamav-freshclam/local_mirror"]["choices"][108]="db.iq.clamav.net (Iraq)";
$elem["clamav-freshclam/local_mirror"]["choices"][109]="db.ir.clamav.net (Iran Islamic Republic of)";
$elem["clamav-freshclam/local_mirror"]["choices"][110]="db.is.clamav.net (Iceland)";
$elem["clamav-freshclam/local_mirror"]["choices"][111]="db.it.clamav.net (Italy)";
$elem["clamav-freshclam/local_mirror"]["choices"][112]="db.je.clamav.net (Jersey)";
$elem["clamav-freshclam/local_mirror"]["choices"][113]="db.jm.clamav.net (Jamaica)";
$elem["clamav-freshclam/local_mirror"]["choices"][114]="db.jo.clamav.net (Jordan)";
$elem["clamav-freshclam/local_mirror"]["choices"][115]="db.jp.clamav.net (Japan)";
$elem["clamav-freshclam/local_mirror"]["choices"][116]="db.ke.clamav.net (Kenya)";
$elem["clamav-freshclam/local_mirror"]["choices"][117]="db.kg.clamav.net (Kyrgyzstan)";
$elem["clamav-freshclam/local_mirror"]["choices"][118]="db.kh.clamav.net (Cambodia)";
$elem["clamav-freshclam/local_mirror"]["choices"][119]="db.ki.clamav.net (Kiribati)";
$elem["clamav-freshclam/local_mirror"]["choices"][120]="db.km.clamav.net (Comoros)";
$elem["clamav-freshclam/local_mirror"]["choices"][121]="db.kn.clamav.net (Saint Kitts and Nevis)";
$elem["clamav-freshclam/local_mirror"]["choices"][122]="db.kp.clamav.net (Korea Democratic People's Republic)";
$elem["clamav-freshclam/local_mirror"]["choices"][123]="db.kr.clamav.net (Korea Republic of)";
$elem["clamav-freshclam/local_mirror"]["choices"][124]="db.kw.clamav.net (Kuwait)";
$elem["clamav-freshclam/local_mirror"]["choices"][125]="db.ky.clamav.net (Cayman Islands)";
$elem["clamav-freshclam/local_mirror"]["choices"][126]="db.kz.clamav.net (Kazakhstan)";
$elem["clamav-freshclam/local_mirror"]["choices"][127]="db.la.clamav.net (Lao People's Democratic Republic)";
$elem["clamav-freshclam/local_mirror"]["choices"][128]="db.lb.clamav.net (Lebanon)";
$elem["clamav-freshclam/local_mirror"]["choices"][129]="db.lc.clamav.net (Saint Lucia)";
$elem["clamav-freshclam/local_mirror"]["choices"][130]="db.li.clamav.net (Liechtenstein)";
$elem["clamav-freshclam/local_mirror"]["choices"][131]="db.lk.clamav.net (Sri Lanka)";
$elem["clamav-freshclam/local_mirror"]["choices"][132]="db.lr.clamav.net (Liberia)";
$elem["clamav-freshclam/local_mirror"]["choices"][133]="db.ls.clamav.net (Lesotho)";
$elem["clamav-freshclam/local_mirror"]["choices"][134]="db.lt.clamav.net (Lithuania)";
$elem["clamav-freshclam/local_mirror"]["choices"][135]="db.lu.clamav.net (Luxembourg)";
$elem["clamav-freshclam/local_mirror"]["choices"][136]="db.lv.clamav.net (Latvia)";
$elem["clamav-freshclam/local_mirror"]["choices"][137]="db.ly.clamav.net (Libyan Arab Jamahiriya)";
$elem["clamav-freshclam/local_mirror"]["choices"][138]="db.ma.clamav.net (Morocco)";
$elem["clamav-freshclam/local_mirror"]["choices"][139]="db.mc.clamav.net (Monaco)";
$elem["clamav-freshclam/local_mirror"]["choices"][140]="db.md.clamav.net (Moldova Republic of)";
$elem["clamav-freshclam/local_mirror"]["choices"][141]="db.mg.clamav.net (Madagascar)";
$elem["clamav-freshclam/local_mirror"]["choices"][142]="db.mh.clamav.net (Marshall Islands)";
$elem["clamav-freshclam/local_mirror"]["choices"][143]="db.mk.clamav.net (Macedonia The Former Yugoslav Republic of)";
$elem["clamav-freshclam/local_mirror"]["choices"][144]="db.ml.clamav.net (Mali)";
$elem["clamav-freshclam/local_mirror"]["choices"][145]="db.mm.clamav.net (Myanmar)";
$elem["clamav-freshclam/local_mirror"]["choices"][146]="db.mn.clamav.net (Mongolia)";
$elem["clamav-freshclam/local_mirror"]["choices"][147]="db.mo.clamav.net (Macau)";
$elem["clamav-freshclam/local_mirror"]["choices"][148]="db.mp.clamav.net (Northern Mariana Islands)";
$elem["clamav-freshclam/local_mirror"]["choices"][149]="db.mq.clamav.net (Martinique)";
$elem["clamav-freshclam/local_mirror"]["choices"][150]="db.mr.clamav.net (Mauritania)";
$elem["clamav-freshclam/local_mirror"]["choices"][151]="db.ms.clamav.net (Montserrat)";
$elem["clamav-freshclam/local_mirror"]["choices"][152]="db.mt.clamav.net (Malta)";
$elem["clamav-freshclam/local_mirror"]["choices"][153]="db.mu.clamav.net (Mauritius)";
$elem["clamav-freshclam/local_mirror"]["choices"][154]="db.mv.clamav.net (Maldives)";
$elem["clamav-freshclam/local_mirror"]["choices"][155]="db.mw.clamav.net (Malawi)";
$elem["clamav-freshclam/local_mirror"]["choices"][156]="db.mx.clamav.net (Mexico)";
$elem["clamav-freshclam/local_mirror"]["choices"][157]="db.my.clamav.net (Malaysia)";
$elem["clamav-freshclam/local_mirror"]["choices"][158]="db.mz.clamav.net (Mozambique)";
$elem["clamav-freshclam/local_mirror"]["choices"][159]="db.na.clamav.net (Namibia)";
$elem["clamav-freshclam/local_mirror"]["choices"][160]="db.nc.clamav.net (New Caledonia)";
$elem["clamav-freshclam/local_mirror"]["choices"][161]="db.ne.clamav.net (Niger)";
$elem["clamav-freshclam/local_mirror"]["choices"][162]="db.nf.clamav.net (Norfolk Island)";
$elem["clamav-freshclam/local_mirror"]["choices"][163]="db.ng.clamav.net (Nigeria)";
$elem["clamav-freshclam/local_mirror"]["choices"][164]="db.ni.clamav.net (Nicaragua)";
$elem["clamav-freshclam/local_mirror"]["choices"][165]="db.nl.clamav.net (Netherlands)";
$elem["clamav-freshclam/local_mirror"]["choices"][166]="db.no.clamav.net (Norway)";
$elem["clamav-freshclam/local_mirror"]["choices"][167]="db.np.clamav.net (Nepal)";
$elem["clamav-freshclam/local_mirror"]["choices"][168]="db.nr.clamav.net (Nauru)";
$elem["clamav-freshclam/local_mirror"]["choices"][169]="db.nu.clamav.net (Niue)";
$elem["clamav-freshclam/local_mirror"]["choices"][170]="db.nz.clamav.net (New Zealand)";
$elem["clamav-freshclam/local_mirror"]["choices"][171]="db.om.clamav.net (Oman)";
$elem["clamav-freshclam/local_mirror"]["choices"][172]="db.pa.clamav.net (Panama)";
$elem["clamav-freshclam/local_mirror"]["choices"][173]="db.pe.clamav.net (Peru)";
$elem["clamav-freshclam/local_mirror"]["choices"][174]="db.pf.clamav.net (French Polynesia)";
$elem["clamav-freshclam/local_mirror"]["choices"][175]="db.pg.clamav.net (Papua New Guinea)";
$elem["clamav-freshclam/local_mirror"]["choices"][176]="db.ph.clamav.net (Philippines)";
$elem["clamav-freshclam/local_mirror"]["choices"][177]="db.pk.clamav.net (Pakistan)";
$elem["clamav-freshclam/local_mirror"]["choices"][178]="db.pl.clamav.net (Poland)";
$elem["clamav-freshclam/local_mirror"]["choices"][179]="db.pm.clamav.net (Saint Pierre and Miquelon)";
$elem["clamav-freshclam/local_mirror"]["choices"][180]="db.pn.clamav.net (Pitcairn Island)";
$elem["clamav-freshclam/local_mirror"]["choices"][181]="db.pr.clamav.net (Puerto Rico)";
$elem["clamav-freshclam/local_mirror"]["choices"][182]="db.ps.clamav.net (Palestinian Territory Occupied)";
$elem["clamav-freshclam/local_mirror"]["choices"][183]="db.pt.clamav.net (Portugal)";
$elem["clamav-freshclam/local_mirror"]["choices"][184]="db.pw.clamav.net (Palau)";
$elem["clamav-freshclam/local_mirror"]["choices"][185]="db.py.clamav.net (Paraguay)";
$elem["clamav-freshclam/local_mirror"]["choices"][186]="db.qa.clamav.net (Qatar)";
$elem["clamav-freshclam/local_mirror"]["choices"][187]="db.re.clamav.net (Reunion Island)";
$elem["clamav-freshclam/local_mirror"]["choices"][188]="db.ro.clamav.net (Romania)";
$elem["clamav-freshclam/local_mirror"]["choices"][189]="db.ru.clamav.net (Russian Federation)";
$elem["clamav-freshclam/local_mirror"]["choices"][190]="db.rw.clamav.net (Rwanda)";
$elem["clamav-freshclam/local_mirror"]["choices"][191]="db.sa.clamav.net (Saudi Arabia)";
$elem["clamav-freshclam/local_mirror"]["choices"][192]="db.sb.clamav.net (Solomon Islands)";
$elem["clamav-freshclam/local_mirror"]["choices"][193]="db.sc.clamav.net (Seychelles)";
$elem["clamav-freshclam/local_mirror"]["choices"][194]="db.sd.clamav.net (Sudan)";
$elem["clamav-freshclam/local_mirror"]["choices"][195]="db.se.clamav.net (Sweden)";
$elem["clamav-freshclam/local_mirror"]["choices"][196]="db.sg.clamav.net (Singapore)";
$elem["clamav-freshclam/local_mirror"]["choices"][197]="db.sh.clamav.net (Saint Helena)";
$elem["clamav-freshclam/local_mirror"]["choices"][198]="db.si.clamav.net (Slovenia)";
$elem["clamav-freshclam/local_mirror"]["choices"][199]="db.sj.clamav.net (Svalbard and Jan Mayen Islands)";
$elem["clamav-freshclam/local_mirror"]["choices"][200]="db.sk.clamav.net (Slovak Republic)";
$elem["clamav-freshclam/local_mirror"]["choices"][201]="db.sl.clamav.net (Sierra Leone)";
$elem["clamav-freshclam/local_mirror"]["choices"][202]="db.sm.clamav.net (San Marino)";
$elem["clamav-freshclam/local_mirror"]["choices"][203]="db.sn.clamav.net (Senegal)";
$elem["clamav-freshclam/local_mirror"]["choices"][204]="db.so.clamav.net (Somalia)";
$elem["clamav-freshclam/local_mirror"]["choices"][205]="db.sr.clamav.net (Suriname)";
$elem["clamav-freshclam/local_mirror"]["choices"][206]="db.st.clamav.net (Sao Tome and Principe)";
$elem["clamav-freshclam/local_mirror"]["choices"][207]="db.sv.clamav.net (El Salvador)";
$elem["clamav-freshclam/local_mirror"]["choices"][208]="db.sy.clamav.net (Syrian Arab Republic)";
$elem["clamav-freshclam/local_mirror"]["choices"][209]="db.sz.clamav.net (Swaziland)";
$elem["clamav-freshclam/local_mirror"]["choices"][210]="db.tc.clamav.net (Turks and Caicos Islands)";
$elem["clamav-freshclam/local_mirror"]["choices"][211]="db.td.clamav.net (Chad)";
$elem["clamav-freshclam/local_mirror"]["choices"][212]="db.tf.clamav.net (French Southern Territories)";
$elem["clamav-freshclam/local_mirror"]["choices"][213]="db.tg.clamav.net (Togo)";
$elem["clamav-freshclam/local_mirror"]["choices"][214]="db.th.clamav.net (Thailand)";
$elem["clamav-freshclam/local_mirror"]["choices"][215]="db.tj.clamav.net (Tajikistan)";
$elem["clamav-freshclam/local_mirror"]["choices"][216]="db.tk.clamav.net (Tokelau)";
$elem["clamav-freshclam/local_mirror"]["choices"][217]="db.tl.clamav.net (Timor-Leste)";
$elem["clamav-freshclam/local_mirror"]["choices"][218]="db.tm.clamav.net (Turkmenistan)";
$elem["clamav-freshclam/local_mirror"]["choices"][219]="db.tn.clamav.net (Tunisia)";
$elem["clamav-freshclam/local_mirror"]["choices"][220]="db.to.clamav.net (Tonga)";
$elem["clamav-freshclam/local_mirror"]["choices"][221]="db.tp.clamav.net (East Timor)";
$elem["clamav-freshclam/local_mirror"]["choices"][222]="db.tr.clamav.net (Turkey)";
$elem["clamav-freshclam/local_mirror"]["choices"][223]="db.tt.clamav.net (Trinidad and Tobago)";
$elem["clamav-freshclam/local_mirror"]["choices"][224]="db.tv.clamav.net (Tuvalu)";
$elem["clamav-freshclam/local_mirror"]["choices"][225]="db.tw.clamav.net (Taiwan)";
$elem["clamav-freshclam/local_mirror"]["choices"][226]="db.tz.clamav.net (Tanzania)";
$elem["clamav-freshclam/local_mirror"]["choices"][227]="db.ua.clamav.net (Ukraine)";
$elem["clamav-freshclam/local_mirror"]["choices"][228]="db.ug.clamav.net (Uganda)";
$elem["clamav-freshclam/local_mirror"]["choices"][229]="db.uk.clamav.net (United Kingdom)";
$elem["clamav-freshclam/local_mirror"]["choices"][230]="db.um.clamav.net (United States Minor Outlying Islands)";
$elem["clamav-freshclam/local_mirror"]["choices"][231]="db.us.clamav.net (United States)";
$elem["clamav-freshclam/local_mirror"]["choices"][232]="db.uy.clamav.net (Uruguay)";
$elem["clamav-freshclam/local_mirror"]["choices"][233]="db.uz.clamav.net (Uzbekistan)";
$elem["clamav-freshclam/local_mirror"]["choices"][234]="db.va.clamav.net (Holy See (Vatican City State))";
$elem["clamav-freshclam/local_mirror"]["choices"][235]="db.vc.clamav.net (Saint Vincent and the Grenadines)";
$elem["clamav-freshclam/local_mirror"]["choices"][236]="db.ve.clamav.net (Venezuela)";
$elem["clamav-freshclam/local_mirror"]["choices"][237]="db.vg.clamav.net (Virgin Islands British)";
$elem["clamav-freshclam/local_mirror"]["choices"][238]="db.vi.clamav.net (Virgin Islands U.S.)";
$elem["clamav-freshclam/local_mirror"]["choices"][239]="db.vn.clamav.net (Vietnam)";
$elem["clamav-freshclam/local_mirror"]["choices"][240]="db.vu.clamav.net (Vanuatu)";
$elem["clamav-freshclam/local_mirror"]["choices"][241]="db.wf.clamav.net (Wallis and Futuna Islands)";
$elem["clamav-freshclam/local_mirror"]["choices"][242]="db.ws.clamav.net (Western Samoa)";
$elem["clamav-freshclam/local_mirror"]["choices"][243]="db.ye.clamav.net (Yemen)";
$elem["clamav-freshclam/local_mirror"]["choices"][244]="db.yt.clamav.net (Mayotte)";
$elem["clamav-freshclam/local_mirror"]["choices"][245]="db.yu.clamav.net (Yugoslavia)";
$elem["clamav-freshclam/local_mirror"]["choices"][246]="db.za.clamav.net (South Africa)";
$elem["clamav-freshclam/local_mirror"]["choices"][247]="db.zm.clamav.net (Zambia)";
$elem["clamav-freshclam/local_mirror"]["description"]="Local database mirror site:
 Please select the closest local mirror site.
 .
 Freshclam updates its database from a world wide network of mirror
 sites. Please select the closest mirror. If you leave
 the default setting, an attempt will be made to guess a
 nearby mirror.
";
$elem["clamav-freshclam/local_mirror"]["descriptionde"]="Nächster Datenbank-Spiegel-Server:
 Bitte den nächsten lokalen Spiegelserver auswählen.
 .
 Freshclam aktualisiert seine Datenbank von einem weltweiten Netzwerk von Spiegelservern. Bitte wählen Sie den nächstliegenden Spiegel-Server aus.  Falls Sie die Standardeinstellung beibehalten wird versucht, den nächstliegenden Spiegel zu erraten.
";
$elem["clamav-freshclam/local_mirror"]["descriptionfr"]="Miroir de la base de données :
 Veuillez choisir le miroir le plus proche.
 .
 Freshclam met à jour sa base de données à partir d'un réseau de sites miroirs. Si vous laissez la valeur par défaut, un miroir théoriquement proche sera proposé.
";
$elem["clamav-freshclam/local_mirror"]["default"]="db.local.clamav.net";
$elem["clamav-freshclam/http_proxy"]["type"]="string";
$elem["clamav-freshclam/http_proxy"]["description"]="HTTP proxy information (leave blank for none):
 If you need to use an HTTP proxy to access the outside world, enter the
 proxy information here. Otherwise, leave this blank.
 .
 Please use URL syntax (\"http://host[:port]\") here.
";
$elem["clamav-freshclam/http_proxy"]["descriptionde"]="HTTP-Proxy-Server angeben (leer lassen für keinen):
 Falls Sie einen HTTP-Proxy-Server benutzen müssen, um Zugang zur Außenwelt zu erlangen, geben Sie hier die Daten dazu ein. Andernfalls lassen Sie das Feld leer.
 .
 Bitte benutzen Sie die URL-Schreibweise (\"http://Rechner[:Port]\").
";
$elem["clamav-freshclam/http_proxy"]["descriptionfr"]="Mandataire HTTP (laisser vide pour aucun) :
 Si vous avez besoin d'utiliser un mandataire HTTP (souvent appelé « proxy ») pour accéder au monde extérieur, indiquez ses paramètres ici. Sinon, laissez ce champ vide.
 .
 Les paramètres du mandataire doivent être indiqués avec la forme normalisée « http://hôte[:port]/ ».
";
$elem["clamav-freshclam/http_proxy"]["default"]="";
$elem["clamav-freshclam/proxy_user"]["type"]="string";
$elem["clamav-freshclam/proxy_user"]["description"]="Proxy user information (leave blank for none):
 If you need to supply a username and password to the proxy, enter it here.
 Otherwise, leave this blank.
 .
 When entering user information, use the standard form of
 \"user:pass\".
";
$elem["clamav-freshclam/proxy_user"]["descriptionde"]="Proxy-Benutzer-Daten (leer lassen für keine)
 Wenn Sie für den Proxy-Server einen Benutzernamen und ein Passwort benötigen, geben Sie es hier ein. Andernfalls lassen Sie das Feld leer.
 .
 Wenn Sie Benutzerdaten eingeben, dann in der Form »Benutzer:Passwort«.
";
$elem["clamav-freshclam/proxy_user"]["descriptionfr"]="Identifiant pour le mandataire (laisser vide pour aucun) :
 S'il est nécessaire d'indiquer un identifiant et un mot de passe pour le mandataire, veuillez les indiquer ici. Dans le cas contraire, laissez cette entrée vide.
 .
 Ces paramètres doivent être indiqués avec la forme normalisée « utilisateur:mot_de_passe ».
";
$elem["clamav-freshclam/proxy_user"]["default"]="";
$elem["clamav-freshclam/update_interval"]["type"]="string";
$elem["clamav-freshclam/update_interval"]["description"]="Number of freshclam updates per day:
";
$elem["clamav-freshclam/update_interval"]["descriptionde"]="Anzahl der freshclam-Aktualisierungen pro Tag:
";
$elem["clamav-freshclam/update_interval"]["descriptionfr"]="Nombre de mises à jour de freshclam par jour :
";
$elem["clamav-freshclam/update_interval"]["default"]="24";
$elem["clamav-freshclam/internet_interface"]["type"]="string";
$elem["clamav-freshclam/internet_interface"]["description"]="Network interface connected to the Internet:
 Please enter the name of the network interface connected to the Internet.
 Example: eth0.
 .
 If the daemon runs when the network is down, the log file will be filled
 with entries like 'ERROR: Connection with database.clamav.net failed.',
 making it easy to miss when freshclam really can't update the database.
 .
 You can leave this field blank and the daemon will be started from
 the initialization scripts instead. You should then make sure the computer is
 permanently connected to the Internet to avoid filling the log files.
";
$elem["clamav-freshclam/internet_interface"]["descriptionde"]="Netzwerkschnittstelle, die mit dem Internet verbunden ist:
 Bitte geben Sie den Name der Netzwerkschnittstelle ein, welche mit dem Internet verbunden ist. Beispiel: eth0.
 .
 Falls der Dienst läuft und das Netz außer Betrieb ist, wird die Protokolldatei mit vielen Einträgen der Form »ERROR: Connection with database.clamav.net failed.« gefüllt, wodurch leicht zu übersehen ist, wenn freshclam seine Datenbank wirklich nicht aktualisieren konnte.
 .
 Sie können dieses Feld leer lassen und der Daemon wird statt dessen in den Initialisierungsskripten gestartet. Sie sollten dann sicherstellen, dass der Rechner ständig mit dem Internet verbunden ist, um das Fluten der Protokolldateien zu verhindern.
";
$elem["clamav-freshclam/internet_interface"]["descriptionfr"]="Nom de l'interface réseau pour la connexion Internet :
 Veuillez indiquer le nom de l'interface réseau connectée à l'Internet. Exemple : eth0.
 .
 Si le démon fonctionne pendant que le réseau est inactif, le journal se remplit d'entrées telles que « ERROR: Connection with database.clamav.net failed », ce qui peut empêcher de déceler les moments où freshclam a réellement des difficultés à mettre à jour la base de données.
 .
 Si vous laissez ce champ vide, le démon sera lancé via les scripts de démarrage. Il est alors nécessaire de contrôler la connectivité permanente à l'Internet pour éviter de remplir les journaux.
";
$elem["clamav-freshclam/internet_interface"]["default"]="";
$elem["clamav-freshclam/NotifyClamd"]["type"]="boolean";
$elem["clamav-freshclam/NotifyClamd"]["description"]="Should clamd be notified after updates?
 Please confirm whether clamd should be notified to reload the database after
 successful updates.
 .
 If you do not choose this option, clamd's database reloads will be notably
 delayed (it performs this check every 6 hours by default), posing the risk
 that a new virus may slip through even if the database is up to date.
 Do not use this if you do not use clamd, as it will produce errors.
";
$elem["clamav-freshclam/NotifyClamd"]["descriptionde"]="Soll clamd nach Aktualisierungen benachrichtigt werden?
 Bitte stimmen Sie zu, wenn clamd nach erfolgreichen Aktualisierungen die Datenbank neu laden soll.
 .
 Falls Sie diese Option nicht auswählen, wird das Neuladen der Datenbank durch clamd erheblich verzögert (standardmäßig erfolgt diese Prüfung alle sechs Stunden). Sie sollten das Risiko bedenken, dass ein neuer Virus durchschlüpfen könnte, obwohl Ihre Datenbank aktuell ist. Benutzen Sie diese Einstellung nicht, Falls Sie clamd nicht einsetzen, weil dies Fehler hervorrufen würde.
";
$elem["clamav-freshclam/NotifyClamd"]["descriptionfr"]="Faut-il notifier clamd des mises à jour ?
 Veuillez indiquer si vous souhaitez que clamd soit averti des mises à jour réussies de la base de données.
 .
 Si clamd n'est pas averti des mises à jour, le rechargement de sa base de données sera notablement différé (le délai est de 6 heures par défaut), ce qui peut permettre à des virus de se propager dans l'intervalle, bien que la base de données soit à jour. Ne choisissez pas cette option si vous n'utilisez pas clamd, car cela produirait des erreurs.
";
$elem["clamav-freshclam/NotifyClamd"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
