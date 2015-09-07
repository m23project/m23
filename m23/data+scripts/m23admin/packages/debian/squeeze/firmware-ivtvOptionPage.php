<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("firmware-ivtv");

$elem["firmware-ivtv/license/accepted"]["type"]="boolean";
$elem["firmware-ivtv/license/accepted"]["description"]="Do you agree to the \"Hauppauge End-User Firmware License Agreement\"?
 In order to install this package, you must agree to the following terms,
 the \"Hauppauge End-User Firmware License Agreement\". If you do not agree,
 the installation will be canceled.
 .
 END-USER FIRMWARE LICENSE AGREEMENT
 .
 IMPORTANT - PLEASE READ BEFORE COPYING, INSTALLING OR USING.
 .
 Do not use or load this firmware image (the \"Firmware\") until you have
 carefully read the following terms and conditions.  By loading or using
 the Firmware, you agree to the terms of this Agreement.  If you do not
 wish to so agree, do not install or use the Firmware.
 .
 LICENSEES: Please note:
 .
 * If you are an End-User, only the END-USER FIRMWARE LICENSE AGREEMENT
 applies (this license).
 .
 * If you are an Original Equipment Manufacturer (OEM), Independent
 Hardware Vendor (IHV), or Independent Firmware Vendor (ISV), the
 OEM/IHV/ISVFIRMWARE LICENSE AGREEMENT applies, as well as the   END-USER
 FIRMWARE LICENSE AGREEMENT (this license).
 .
 LICENSE. You may copy and use the Firmware, subject to these conditions:
 .
 1. This Firmware is licensed for use only in conjunction with    Hauppauge
 component products.  Use of the Firmware in conjunction    with
 non-Hauppauge component products is not licensed hereunder.
 .
 2. You may not copy, modify, rent, sell, distribute or transfer any
 part of the Firmware except as provided in this Agreement, and you
 agree to prevent unauthorized copying of the Firmware.
 .
 3. You may not reverse engineer, decompile, or disassemble the Firmware.
 .
 4. You may not sublicense the Firmware.
 .
 5. The Firmware may contain the firmware or other property of third party
 suppliers.
 .
 TRADEMARKS. Except as expressly provided herein, you shall not use
 Hauppauge's name in any publications, advertisements, or other
 announcements without Hauppauge's prior written consent.  You do not have
 any rights to use any Hauppauge trademarks or logos.
 .
 OWNERSHIP OF FIRMWARE AND COPYRIGHTS. Title to all copies of the Firmware
 remains with Hauppauge or its suppliers.  The Firmware is copyrighted and
 protected by the laws of the United States and other countries, and
 international treaty provisions.  You may not remove any copyright notices
 from the Firmware.  Hauppauge may make changes to the Firmware, or items
 referenced therein, at any time without notice, but is not obligated to
 support or update the Firmware.  Except as otherwise expressly provided,
 Hauppauge grants no express or implied right under Hauppauge patents,
 copyrights, trademarks, or other intellectual property rights.  You may
 transfer the Firmware only if a copy of this license accompanies the
 Firmware and the recipient agrees to be fully bound by these terms.
 .
 EXCLUSION OF WARRANTIES. THE FIRMWARE IS PROVIDED \"AS IS\" AND POSSIBLY
 WITH FAULTS. UNLESS EXPRESSLY AGREED OTHERWISE, HAUPPAUGE AND ITS
 SUPPLIERS AND LICENSORS DISCLAIM ANY AND ALL WARRANTIES AND GUARANTEES,
 EXPRESS, IMPLIED OR OTHERWISE, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 OF MERCHANTABILITY, NONINFRINGEMENT, OR FITNESS FOR A PARTICULAR PURPOSE.
 Hauppauge does not warrant or assume responsibility for the accuracy or
 completeness of any information, text, graphics, links or other items
 contained within the Firmware.  You assume all liability, financial or
 otherwise, associated with Your use or disposition of the Firmware.
 .
 LIMITATION OF LIABILITY. IN NO EVENT SHALL HAUPPAUGE OR ITS SUPPLIERS AND
 LICENSORS BE LIABLE FOR ANY DAMAGES WHATSOEVER FROM ANY CAUSE OF ACTION OF
 ANY KIND (INCLUDING, WITHOUT LIMITATION, LOST PROFITS, BUSINESS
 INTERRUPTION, OR LOST INFORMATION) ARISING OUT OF THE USE, MODIFICATION,
 OR INABILITY TO USE THE FIRMWARE, OR OTHERWISE, NOR FOR PUNITIVE,
 INCIDENTAL, CONSEQUENTIAL, OR SPECIAL DAMAGES OF ANY KIND, EVEN IF
 HAUPPAUGE OR ITS SUPPLIERS AND LICENSORS HAVE BEEN ADVISED OF THE
 POSSIBILITY OF SUCH DAMAGES. SOME JURISDICTIONS PROHIBIT EXCLUSION OR
 LIMITATION OF LIABILITY FOR IMPLIED WARRANTIES OR CONSEQUENTIAL OR
 INCIDENTAL DAMAGES, SO CERTAIN LIMITATIONS MAY NOT APPLY. YOU MAY ALSO
 HAVE OTHER LEGAL RIGHTS THAT VARY BETWEEN JURISDICTIONS.
 .
 WAIVER AND AMENDMENT. No modification, amendment or waiver of any
 provision of this Agreement shall be effective unless in writing and
 signed by an officer of Hauppauge.  No failure or delay in exercising any
 right, power, or remedy under this Agreement shall operate as a waiver of
 any such right, power or remedy.  Without limiting the foregoing, terms
 and conditions on any purchase orders or similar materials submitted by
 you to Hauppauge, and any terms contained in Hauppauges standard
 acknowledgment form that are in conflict with these terms, shall be of no
 force or effect.
 .
 SEVERABILITY. If any provision of this Agreement is held by a court of
 competent jurisdiction to be contrary to law, such provision shall be
 changed and interpreted so as to best accomplish the objectives of the
 original provision to the fullest extent allowed by law and the remaining
 provisions of this Agreement shall remain in full force and effect.
 .
 EXPORT RESTRICTIONS. Each party acknowledges that the Firmware is subject
 to applicable import and export regulations of the United States and of
 the countries in which each party transacts business, specifically
 including U.S. Export Administration Act and Export Administration
 Regulations.  Each party shall comply with such laws and regulations, as
 well as all other laws and regulations applicable to the Firmware.
 Without limiting the generality of the foregoing, each party agrees that
 it will not export, re-export, transfer or divert any of the Firmware or
 the direct programs thereof to any restricted place or party in accordance
 with U.S. export regulations.  Note that Firmware containing encryption
 may be subject to additional restrictions.
 .
 APPLICABLE LAWS. Claims arising under this Agreement shall be governed by
 the laws of New York, excluding its principles of conflict of laws and the
 United Nations Convention on Contracts for the Sale of Goods.  You may not
 export the Firmware in violation of applicable export laws and
 regulations.  Hauppauge is not obligated under any other agreements unless
 they are in writing and signed by an authorized representative of
 Hauppauge.
 .
 GOVERNMENT RESTRICTED RIGHTS. The Firmware is provided with \"RESTRICTED
 RIGHTS.\" Use, duplication, or disclosure by the Government is subject to
 restrictions as set forth in FAR52.227-14 and DFAR252.227-7013 et seq.  or
 their successors.  Use of the Firmware by the Government constitutes
 acknowledgment of Hauppauge's proprietary rights therein.  Contractor or
 Manufacturer is Hauppauge Computer Works, Inc.  91 Cabot Court Hauppauge,
 NY 11788
 .
 TERMINATION OF THIS AGREEMENT. Hauppauge may terminate this Agreement at
 any time if you violate its terms.  Upon termination, you will immediately
 destroy the Firmware or return all copies of the Firmware to Hauppauge.

";
$elem["firmware-ivtv/license/accepted"]["descriptionde"]="";
$elem["firmware-ivtv/license/accepted"]["descriptionfr"]="";
$elem["firmware-ivtv/license/accepted"]["default"]="false";
$elem["firmware-ivtv/license/error"]["type"]="error";
$elem["firmware-ivtv/license/error"]["description"]="Declined Hauppauge End-User Firmware License Agreement
 If you do not agree to the \"Hauppauge End-User Firmware License Agreement\"
 license terms you cannot install this software.
 .
 The installation of this package has been canceled.

";
$elem["firmware-ivtv/license/error"]["descriptionde"]="";
$elem["firmware-ivtv/license/error"]["descriptionfr"]="";
$elem["firmware-ivtv/license/error"]["default"]="";
PKG_OptionPageTail2($elem);
?>
