<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("steamcmd");

$elem["steam/question"]["type"]="select";
$elem["steam/question"]["choices"][1]="I DECLINE";
$elem["steam/question"]["description"]="Do you agree to all terms of the Steam License Agreement?
 STEAM LICENSE AGREEMENT

";
$elem["steam/question"]["descriptionde"]="";
$elem["steam/question"]["descriptionfr"]="";
$elem["steam/question"]["default"]="";
$elem["steam/purge"]["type"]="note";
$elem["steam/purge"]["description"]="STEAM PURGE NOTE
 Purging is not entirely complete.  Steam's working files are still located
 in your home directories at ~/.steam.  If you intended to remove the
 entire application, you will need to remove those directories manually.

";
$elem["steam/purge"]["descriptionde"]="";
$elem["steam/purge"]["descriptionfr"]="";
$elem["steam/purge"]["default"]="";
$elem["steam/license"]["type"]="note";
$elem["steam/license"]["description"]="STEAM LICENSE AGREEMENT (ARROW keys scroll, TAB key to move to \"Ok\")
 YOU SHOULD CAREFULLY READ THE ENTIRE FOLLOWING LICENSE AGREEMENT BEFORE INSTALLING THIS SOFTWARE PROGRAM.   THIS AGREEMENT CONTAINS IMPORTANT TERMS THAT AFFECT YOUR LEGAL RIGHTS.  BY INSTALLING THE SOFTWARE PROGRAM, YOU AGREE TO BE BOUND BY THE TERMS OF THIS AGREEMENT.  IF YOU DO NOT AGREE TO THE TERMS OF THIS AGREEMENT, PLEASE DO NOT INSTALL THIS SOFTWARE PROGRAM.
 .
 The software application(s) (the “Program”) is the copyrighted work of Valve Corporation (“Valve”) or its suppliers.  All rights reserved, except as expressly stated herein.  The Program is provided solely for installation by end users according to the terms of this License Agreement, except as provided below regarding permitted redistributions. All use of the Program is governed by the terms of the Steam subscriber agreement located at www.steampowered.com/agreement (the “Steam Agreement”), as such terms may be updated from time to time, which terms are incorporated into this License Agreement by this reference. Any use, reproduction or redistribution of the Program not in accordance with the terms of the License Agreement and the Steam Agreement is expressly prohibited.
 .
 LICENSE AGREEMENT
 .
 1.    Grant of Licenses.
 .
 A. Personal Use Limited Installation License. Valve hereby grants, and by installing the Program you thereby accept, a limited, non-exclusive license and right to install copies of the Program on each of your computers solely for your personal use.
 .
 B. Limited Redistribution License.  Valve hereby grants, and you accept, a limited, terminable, non-exclusive license to reproduce and distribute an unlimited number of copies of the Program; provided that the following conditions are met:
 (i) you must distribute the Program in its entirety;
 .
 (ii) you may not modify the Program, except that, in the case of the Linux version of the Program, you may modify scripts and other documentary and graphical files, but not any files containing the term “bootstrap” in the file name, provided that you do not modify any icons, change any copyright or other notices, or alter this or any other license agreement that is included with the Program, and provided further that any modifications you make are identified by you as modifications from the original Program provided by Valve;
 .
 (iii) you may repackage the Program and distribute it with another software program, provided that you do not integrate the Program in any way with that other software program, or combine the Program with that other software program in a manner that would require you to distribute the Program under any open source or other license terms different from these terms.
 .
 (iv) you may not charge any separate fee or receive any compensation attributable to the Program;
 .
 (v) you must include this License Agreement provided with the Program and ensure that it will display and be required to be accepted by the end user in the same manner as is required by the Program in the form received by you; and
 .
 (vi) you must preserve in all copies of the Program all copyright and legal notices that are attached to the copy of the Program received by you.
 .
 C.    Restrictions/Reservation of Rights.  Except as expressly set forth elsewhere in this License Agreement, you may not, in whole or in part: copy, photocopy, reproduce, translate, reverse engineer (with the exception of specific circumstances where such act is permitted by law), derive source code from, modify, disassemble, decompile, or create derivative works based on the Program; remove any proprietary notices or labels on the Program; or attempt in any manner to circumvent any security measures designed to control access to the Program. You may not package the Program with, or pre-install the Program on, any hardware, without obtaining a separate license from us.  The Program is licensed to you as a single product. Its component parts may not be separated for use on more than one computer.  You may not sell, grant a security interest in, rent, lease or license the Program to others without the prior written consent of Valve. The Program is licensed, not sold. Your license confers no title or ownership in the Program or copies thereof.
 .
 2.      Ownership. All title, ownership rights and intellectual property rights in and to the Program and any and all copies thereof (including but not limited to any titles, computer code, themes, objects, characters, character names, stories, dialog, catch phrases, locations, concepts, artwork, animations, sounds, musical compositions, audio-visual effects, methods of operation, moral rights, any related documentation, and “applets” incorporated into the Program) are owned by Valve or its licensors.  The Program is protected by the copyright laws of the United States, international copyright treaties and conventions and other laws. All rights are reserved. The Program contains certain licensed materials and Valve’s licensors may protect their rights in the event of any violation of this Agreement.
 .
 3.     Termination. This License Agreement is effective until terminated. You may terminate the License Agreement at any time by destroying the Program.  We may terminate your rights set forth in Section 1.B. of this License Agreement at any time upon notice to you.  This License Agreement shall automatically terminate in the event that you fail to comply with the terms and conditions contained herein. In such event, you must immediately destroy the Program.  The provisions of Sections 2, 3, and 5-7 will survive any termination of the Agreement.
 .
 4.     Export Controls. The Program may not be re-exported, downloaded or otherwise exported into (or to a national or resident of) any country to which the U.S. has embargoed goods, or to anyone on the U.S. Treasury Department’s list of Specially Designated Nationals or the U.S. Commerce Department’s Table of Denial Orders. By installing the Program, you are agreeing to the foregoing and you are representing and warranting that you are not located in, under the control of, or a national or resident of any such country or on any such list.
 .
 5.     WARRANTY DISCLAIMERS; LIMITATION OF LIABILITY; NO GUARANTEES.  DISCLAIMERS OF WARRANTY AND LIMITATIONS ON LIABILITY SET FORTH IN THE STEAM AGREEMENT, AND/OR ELSEWHERE IN THE STEAM AGREEMENT, APPLY TO YOUR USE OF THE PROGRAM.  AS NOTED IN THE STEAM AGREEMENT, FOR EU CUSTOMERS, SUCH PROVISIONS DO NOT REDUCE YOUR MANDATORY CONSUMERS’ RIGHTS UNDER THE LAWS OF YOUR LOCAL JURISDICTION.
 .
 6.    Warranties/Indemnities Relating to Redistribution.  If you choose to redistribute the Program, you represent and warrant that any modifications you make to the Program, if any, and your particular combination of the Program with any other software or hardware, do not infringe on any third-party intellectual property rights.  You agree to defend, indemnify and hold harmless Valve, its licensors, and its and their affiliates from all liabilities, claims and expenses, including attorneys’ fees, that arise from or in connection with your redistribution of any modifications you make to the Program or your particular combination of the Program with any other software or hardware or your breach of this License Agreement.  Valve reserves the right, at its own expense, to assume the exclusive defense and control of any matter otherwise subject to indemnification by you. In that event, you shall have no further obligation to provide indemnification to Valve in that matter.
 .
 7.    Miscellaneous. Provisions relating to applicable law and jurisdiction, and dispute resolution, set forth in the Steam Agreement shall apply to any disputes arising under this Agreement.  This License Agreement and the Steam Agreement terms incorporated herein may be amended, altered or modified at any time by Valve in Valve’s sole discretion. In the event that any provision of this License Agreement shall be held by a court or other tribunal of competent jurisdiction to be unenforceable, such provision will be enforced to the maximum extent permissible and the remaining portions of this License Agreement shall remain in full force and effect. This License Agreement and the Steam Agreement constitute and contain the entire agreement between the parties with respect to the subject matter hereof and supersede any prior oral or written agreements.
 You hereby acknowledge that you have read and understand the foregoing License Agreement and agree that the action of installing the Program is an acknowledgment of your agreement to be bound by the terms and conditions of the License Agreement contained herein, including the Steam Agreement.
 .
";
$elem["steam/license"]["descriptionde"]="";
$elem["steam/license"]["descriptionfr"]="";
$elem["steam/license"]["default"]="";
PKG_OptionPageTail2($elem);
?>
