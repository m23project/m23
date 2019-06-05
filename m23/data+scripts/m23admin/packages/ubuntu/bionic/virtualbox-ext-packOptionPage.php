<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("virtualbox-ext-pack");

$elem["virtualbox-ext-pack/license"]["type"]="boolean";
$elem["virtualbox-ext-pack/license"]["description"]="Do you accept the terms of the VirtualBox PUEL license?
 Oracle Corporation requests VirtualBox users to acknowledge and
 accept the \"VirtualBox Personal Use and Evaluation License\" (PUEL). Please
 read the license below. If you accept this license, the package
 installation will continue. If you refuse it, it will be interrupted.
 .
 VirtualBox Extension Pack Personal Use and Evaluation License (PUEL)
 .
 License version 10, 20 July 2017
 .
 PLEASE READ THE FOLLOWING ORACLE VM VIRTUALBOX EXTENSION PACK PERSONAL
 USE AND EVALUATION LICENSE CAREFULLY BEFORE DOWNLOADING OR USING THE
 ORACLE SOFTWARE. THESE TERMS AND CONDITIONS CONSTITUTE A LEGAL AGREEMENT
 BETWEEN YOU AND ORACLE.
 .
 ORACLE AMERICA, INC. (\"ORACLE\") IS WILLING TO LICENSE THE PRODUCT DEFINED
 IN SECTION 1 BELOW ONLY ON THE CONDITION THAT YOU ACCEPT ALL OF THE TERMS
 CONTAINED IN THIS VIRTUALBOX EXTENSION PACK PERSONAL USE AND EVALUATION
 LICENSE AGREEMENT (\"AGREEMENT\").
 .
 IF YOU ARE AGREEING TO THIS LICENSE ON BEHALF OF AN ENTITY (RATHER THAN
 AS AN INDIVIDUAL HUMAN BEING), YOU REPRESENT THAT YOU HAVE THE APPROPRIATE
 AUTHORITY TO ACCEPT THESE TERMS AND CONDITIONS ON BEHALF OF SUCH ENTITY.
 .
 1 SUBJECT OF AGREEMENT. This Agreement governs your use of the binary
 software package called \"Oracle VM VirtualBox Extension Pack\" (the
 \"Product\"), which contains a set of additional features for \"Oracle
 VM VirtualBox\" that enhance the operation of multiple virtual machines
 (\"Guest Computers\") on a single physical computer (\"Host Computer\"). The
 Product consists of executable files in machine code, script files,
 data files, and all documentation and updates provided to You by Oracle.
 .
 2 GRANT OF LICENSE. Oracle grants you a personal, non-exclusive,
 non-transferable, limited license without fees to reproduce, install,
 execute, and use internally the Product on Host Computers for
 your Personal Use, Educational Use, or Evaluation. \"Personal Use\"
 is noncommercial use solely by the person downloading the Product
 from Oracle on a single Host Computer, provided that no more than one
 client or remote computer is connected to that Host Computer and that
 client or remote computer is used solely to remotely view the Guest
 Computer(s). \"Educational Use\" is any use by teachers or students in
 an academic institution (schools, colleges and universities) as part of
 the institution's educational curriculum. \"Evaluation\" means testing the
 Product for up to thirty (30) days; after expiry of that term, you are
 no longer permitted to use the Product. Personal Use and/or Educational
 Use expressly exclude any use of the Product for commercial purposes or
 to operate, run, or act on behalf of or for the benefit of a business,
 organization, governmental organization, or educational institution.
 .
 Oracle reserves all rights not expressly granted in this license.
 .
 3 RESTRICTIONS AND RESERVATION OF RIGHTS.
 .
 (1) The Product and copies thereof provided to you under this Agreement
 are copyrighted and licensed, not sold, to you by Oracle.
 .
 (2) You may not do any of the following: (a) modify any part of the
 Product, except to the extent allowed in the documentation accompanying
 the Product; (b) rent, lease, lend, re-distribute, or encumber the
 Product; (c) remove or alter any proprietary legends or notices contained
 in the Product; or (d) decompile, or reverse engineer the Product
 (except to the extent permitted by applicable law).
 .
 (3) The Product is not designed, licensed or intended for use in the
 design, construction, operation or maintenance of any nuclear facility
 and Oracle and its licensors disclaim any express or implied warranty
 of fitness for such uses.
 .
 (4) No right, title or interest in or to any trademark, service mark, logo
 or trade name of Oracle or its licensors is granted under this Agreement.
 .
 4 TERMINATION. The Agreement is effective on the date you receive the
 Product and remains effective until terminated. Your rights under this
 Agreement will terminate immediately without notice from Oracle if
 you materially breach it or take any action in derogation of Oracle's
 and/or its licensors' rights to the Product. Oracle may terminate this
 Agreement immediately should any part of the Product become or in Oracle's
 reasonable opinion likely to become the subject of a claim of intellectual
 property infringement or trade secret misappropriation. Upon termination,
 you will cease use of and destroy all copies of the Product under your
 control and confirm compliance in writing to Oracle. Sections 3-9,
 inclusive, will survive termination of the Agreement.
 .
 5 DISCLAIMER OF WARRANTY. TO THE EXTENT NOT PROHIBITED BY APPLICABLE LAW,
 ORACLE PROVIDES THE PRODUCT \"AS IS\" WITHOUT WARRANTY OF ANY KIND, EITHER
 EXPRESS OR IMPLIED. WITHOUT LIMITING THE FOREGOING, ORACLE SPECIFICALLY
 DISCLAIMS ANY IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A
 PARTICULAR PURPOSE, TITLE, AND NON-INFRINGEMENT. The entire risk as
 to the quality and performance of the Product is with you. Should it
 prove defective, you assume the cost of all necessary servicing, repair,
 or correction.
 .
 6 LIMITATION OF LIABILITY. TO THE EXTENT NOT PROHIBITED BY APPLICABLE LAW,
 IN NO EVENT WILL ORACLE OR ITS LICENSORS BE LIABLE FOR ANY LOST REVENUE,
 PROFIT, DATA, OR DATA USE, OR FOR SPECIAL, INDIRECT, CONSEQUENTIAL,
 INCIDENTAL OR PUNITIVE DAMAGES, HOWEVER CAUSED REGARDLESS OF THE THEORY
 OF LIABILITY, ARISING OUT OF OR RELATED TO THE USE OF OR INABILITY TO
 USE THE PRODUCT, EVEN IF ORACLE HAS BEEN ADVISED OF THE POSSIBILITY OF
 SUCH DAMAGES. In no event will Oracle's liability to you, whether in
 contract, tort (including negligence), or otherwise, exceed the amount
 paid by you for the Product under this Agreement.
 .
 7 SEPARATELY LICENSED THIRD PARTY TECHNOLOGY. The Product may contain
 or require the use of third party technology that is provided with
 the Product. Oracle may provide certain notices to you in the Product's
 documentation, readmes or notice files in connection with such third party
 technology. Third party technology will be licensed to you either under
 the terms of this Agreement or, if specified in the documentation, readmes
 or notice files, under Separate Terms. Your rights to use Separately
 Licensed Third Party Technology under Separate Terms are not restricted
 in any way by this Agreement. However, for clarity, notwithstanding the
 existence of a notice, third party technology that is not Separately
 Licensed Third Party Technology shall be deemed part of the Product and
 is licensed to You under the terms of this Agreement. \"Separate Terms\"
 refers to separate license terms that are specified in the Product's
 documentation, readmes or notice files and that apply to Separately
 Licensed Third Party Technology. \"Separately Licensed Third Party
 Technology\" refers to third party technology that is licensed under
 Separate Terms and not under the terms of this Agreement.
 .
 8 EXPORT. Export laws and regulations of the United States and any other
 relevant local export laws and regulations apply to the Product. You
 agree that such export laws govern your use of the Product (including
 technical data) provided under this Agreement, and you agree to comply
 with all such export laws and regulations (including \"deemed export\" and
 \"deemed re-export\" regulations). You agree that no data, information,
 and/or Product (or direct product thereof) will be exported, directly or
 indirectly, in violation of these laws, or will be used for any purpose
 prohibited by these laws including, without limitation, nuclear, chemical,
 or biological weapons proliferation, or development of missile technology.
 .
 9 U.S. GOVERNMENT END USERS. Oracle programs, including the Product,
 any operating system, integrated software, any programs installed on
 hardware, and/or documentation, delivered to U.S. Government end users
 are \"commercial computer software\" pursuant to the applicable Federal
 Acquisition Regulation and agency-specific supplemental regulations. As
 such, use, duplication, disclosure, modification, and adaptation of
 the programs, including any operating system, integrated software,
 any programs installed on the hardware, and/or documentation, shall
 be subject to license terms and license restrictions applicable to the
 programs. No other rights are granted to the U.S. Government.
 .
 10 MISCELLANEOUS. This Agreement is the entire agreement between you
 and Oracle relating to its subject matter. It supersedes all prior or
 contemporaneous oral or written communications, proposals, representations
 and warranties and prevails over any conflicting or additional terms
 of any quote, order, acknowledgment, or other communication between
 the parties relating to its subject matter during the term of this
 Agreement. No modification of this Agreement will be binding, unless in
 writing and signed by an authorized representative of each party. If any
 provision of this Agreement is held to be unenforceable, this Agreement
 will remain in effect with the provision omitted, unless omission would
 frustrate the intent of the parties, in which case this Agreement will
 immediately terminate. This Agreement is governed by the laws of the
 State of California, USA, and you and Oracle agree to submit to the
 exclusive jurisdiction of, and venue in, the courts of San Francisco
 or Santa Clara counties in California in any dispute arising out of or
 relating to this Agreement.
";
$elem["virtualbox-ext-pack/license"]["descriptionde"]="Akzeptieren Sie die Bedingungen der VirtualBox-PUEL-Lizenz?
 Das Unternehmen Oracle verlangt von Virtualbox-Anwendern, dass sie der »VirtualBox Personal Use and Evaluation License« (PUEL/Virtualbox-Lizenz zum persönlichen Gebrauch und zum Ausprobieren) zustimmen und sie akzeptieren. Bitte lesen Sie die nachfolgende Lizenz. Falls Sie dieser Lizenz zustimmen, wird die Paketinstallation fortfahren. Falls Sie sie ablehnen, wird die Installation abgebrochen.
 .
 VirtualBox Extension Pack Personal Use and Evaluation License (PUEL)
 .
 License version 10, 20 July 2017
 .
 PLEASE READ THE FOLLOWING ORACLE VM VIRTUALBOX EXTENSION PACK PERSONAL USE AND EVALUATION LICENSE CAREFULLY BEFORE DOWNLOADING OR USING THE ORACLE SOFTWARE. THESE TERMS AND CONDITIONS CONSTITUTE A LEGAL AGREEMENT BETWEEN YOU AND ORACLE.
 .
 ORACLE AMERICA, INC. (\"ORACLE\") IS WILLING TO LICENSE THE PRODUCT DEFINED IN SECTION 1 BELOW ONLY ON THE CONDITION THAT YOU ACCEPT ALL OF THE TERMS CONTAINED IN THIS VIRTUALBOX EXTENSION PACK PERSONAL USE AND EVALUATION LICENSE AGREEMENT (\"AGREEMENT\").
 .
 IF YOU ARE AGREEING TO THIS LICENSE ON BEHALF OF AN ENTITY (RATHER THAN AS AN INDIVIDUAL HUMAN BEING), YOU REPRESENT THAT YOU HAVE THE APPROPRIATE AUTHORITY TO ACCEPT THESE TERMS AND CONDITIONS ON BEHALF OF SUCH ENTITY.
 .
 1 SUBJECT OF AGREEMENT. This Agreement governs your use of the binary software package called \"Oracle VM VirtualBox Extension Pack\" (the \"Product\"), which contains a set of additional features for \"Oracle VM VirtualBox\" that enhance the operation of multiple virtual machines (\"Guest Computers\") on a single physical computer (\"Host Computer\"). The Product consists of executable files in machine code, script files, data files, and all documentation and updates provided to You by Oracle.
 .
 2 GRANT OF LICENSE. Oracle grants you a personal, non-exclusive, non-transferable, limited license without fees to reproduce, install, execute, and use internally the Product on Host Computers for your Personal Use, Educational Use, or Evaluation. \"Personal Use\" is noncommercial use solely by the person downloading the Product from Oracle on a single Host Computer, provided that no more than one client or remote computer is connected to that Host Computer and that client or remote computer is used solely to remotely view the Guest Computer(s). \"Educational Use\" is any use by teachers or students in an academic institution (schools, colleges and universities) as part of the institution's educational curriculum. \"Evaluation\" means testing the Product for up to thirty (30) days; after expiry of that term, you are no longer permitted to use the Product. Personal Use and/or Educational Use expressly exclude any use of the Product for commercial purposes or to operate, run, or act on behalf of or for the benefit of a business, organization, governmental organization, or educational institution.
 .
 Oracle reserves all rights not expressly granted in this license.
 .
 3 RESTRICTIONS AND RESERVATION OF RIGHTS.
 .
 (1) The Product and copies thereof provided to you under this Agreement are copyrighted and licensed, not sold, to you by Oracle.
 .
 (2) You may not do any of the following: (a) modify any part of the Product, except to the extent allowed in the documentation accompanying the Product; (b) rent, lease, lend, re-distribute, or encumber the Product; (c) remove or alter any proprietary legends or notices contained in the Product; or (d) decompile, or reverse engineer the Product (except to the extent permitted by applicable law).
 .
 (3) The Product is not designed, licensed or intended for use in the design, construction, operation or maintenance of any nuclear facility and Oracle and its licensors disclaim any express or implied warranty of fitness for such uses.
 .
 (4) No right, title or interest in or to any trademark, service mark, logo or trade name of Oracle or its licensors is granted under this Agreement.
 .
 4 TERMINATION. The Agreement is effective on the date you receive the Product and remains effective until terminated. Your rights under this Agreement will terminate immediately without notice from Oracle if you materially breach it or take any action in derogation of Oracle's and/or its licensors' rights to the Product. Oracle may terminate this Agreement immediately should any part of the Product become or in Oracle's reasonable opinion likely to become the subject of a claim of intellectual property infringement or trade secret misappropriation. Upon termination, you will cease use of and destroy all copies of the Product under your control and confirm compliance in writing to Oracle. Sections 3-9, inclusive, will survive termination of the Agreement.
 .
 5 DISCLAIMER OF WARRANTY. TO THE EXTENT NOT PROHIBITED BY APPLICABLE LAW, ORACLE PROVIDES THE PRODUCT \"AS IS\" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESS OR IMPLIED. WITHOUT LIMITING THE FOREGOING, ORACLE SPECIFICALLY DISCLAIMS ANY IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, AND NON-INFRINGEMENT. The entire risk as to the quality and performance of the Product is with you. Should it prove defective, you assume the cost of all necessary servicing, repair, or correction.
 .
 6 LIMITATION OF LIABILITY. TO THE EXTENT NOT PROHIBITED BY APPLICABLE LAW, IN NO EVENT WILL ORACLE OR ITS LICENSORS BE LIABLE FOR ANY LOST REVENUE, PROFIT, DATA, OR DATA USE, OR FOR SPECIAL, INDIRECT, CONSEQUENTIAL, INCIDENTAL OR PUNITIVE DAMAGES, HOWEVER CAUSED REGARDLESS OF THE THEORY OF LIABILITY, ARISING OUT OF OR RELATED TO THE USE OF OR INABILITY TO USE THE PRODUCT, EVEN IF ORACLE HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. In no event will Oracle's liability to you, whether in contract, tort (including negligence), or otherwise, exceed the amount paid by you for the Product under this Agreement.
 .
 7 SEPARATELY LICENSED THIRD PARTY TECHNOLOGY. The Product may contain or require the use of third party technology that is provided with the Product. Oracle may provide certain notices to you in the Product's documentation, readmes or notice files in connection with such third party technology. Third party technology will be licensed to you either under the terms of this Agreement or, if specified in the documentation, readmes or notice files, under Separate Terms. Your rights to use Separately Licensed Third Party Technology under Separate Terms are not restricted in any way by this Agreement. However, for clarity, notwithstanding the existence of a notice, third party technology that is not Separately Licensed Third Party Technology shall be deemed part of the Product and is licensed to You under the terms of this Agreement. \"Separate Terms\" refers to separate license terms that are specified in the Product's documentation, readmes or notice files and that apply to Separately Licensed Third Party Technology. \"Separately Licensed Third Party Technology\" refers to third party technology that is licensed under Separate Terms and not under the terms of this Agreement.
 .
 8 EXPORT. Export laws and regulations of the United States and any other relevant local export laws and regulations apply to the Product. You agree that such export laws govern your use of the Product (including technical data) provided under this Agreement, and you agree to comply with all such export laws and regulations (including \"deemed export\" and \"deemed re-export\" regulations). You agree that no data, information, and/or Product (or direct product thereof) will be exported, directly or indirectly, in violation of these laws, or will be used for any purpose prohibited by these laws including, without limitation, nuclear, chemical, or biological weapons proliferation, or development of missile technology.
 .
 9 U.S. GOVERNMENT END USERS. Oracle programs, including the Product, any operating system, integrated software, any programs installed on hardware, and/or documentation, delivered to U.S. Government end users are \"commercial computer software\" pursuant to the applicable Federal Acquisition Regulation and agency-specific supplemental regulations. As such, use, duplication, disclosure, modification, and adaptation of the programs, including any operating system, integrated software, any programs installed on the hardware, and/or documentation, shall be subject to license terms and license restrictions applicable to the programs. No other rights are granted to the U.S. Government.
 .
 10 MISCELLANEOUS. This Agreement is the entire agreement between you and Oracle relating to its subject matter. It supersedes all prior or contemporaneous oral or written communications, proposals, representations and warranties and prevails over any conflicting or additional terms of any quote, order, acknowledgment, or other communication between the parties relating to its subject matter during the term of this Agreement. No modification of this Agreement will be binding, unless in writing and signed by an authorized representative of each party. If any provision of this Agreement is held to be unenforceable, this Agreement will remain in effect with the provision omitted, unless omission would frustrate the intent of the parties, in which case this Agreement will immediately terminate. This Agreement is governed by the laws of the State of California, USA, and you and Oracle agree to submit to the exclusive jurisdiction of, and venue in, the courts of San Francisco or Santa Clara counties in California in any dispute arising out of or relating to this Agreement.
";
$elem["virtualbox-ext-pack/license"]["descriptionfr"]="Acceptez-vous les termes de la licence PUEL de Virtualbox ?
 Oracle Corporation demande aux utilisateurs de Virtualbox de prendre connaissance et d'accepter la licence de VirtualBox pour utilisation personnelle et évaluation (« VirtualBox Personal Use and Evaluation License » PUEL). Veuillez lire la licence ci-dessous. Si vous acceptez la licence, l'installation du paquet continuera. Si vous la refusez, elle sera interrompue.
 .
 VirtualBox Extension Pack Personal Use and Evaluation License (PUEL)
 .
 License version 10, 20 July 2017
 .
 PLEASE READ THE FOLLOWING ORACLE VM VIRTUALBOX EXTENSION PACK PERSONAL USE AND EVALUATION LICENSE CAREFULLY BEFORE DOWNLOADING OR USING THE ORACLE SOFTWARE. THESE TERMS AND CONDITIONS CONSTITUTE A LEGAL AGREEMENT BETWEEN YOU AND ORACLE.
 .
 ORACLE AMERICA, INC. (\"ORACLE\") IS WILLING TO LICENSE THE PRODUCT DEFINED IN SECTION 1 BELOW ONLY ON THE CONDITION THAT YOU ACCEPT ALL OF THE TERMS CONTAINED IN THIS VIRTUALBOX EXTENSION PACK PERSONAL USE AND EVALUATION LICENSE AGREEMENT (\"AGREEMENT\").
 .
 IF YOU ARE AGREEING TO THIS LICENSE ON BEHALF OF AN ENTITY (RATHER THAN AS AN INDIVIDUAL HUMAN BEING), YOU REPRESENT THAT YOU HAVE THE APPROPRIATE AUTHORITY TO ACCEPT THESE TERMS AND CONDITIONS ON BEHALF OF SUCH ENTITY.
 .
 1 SUBJECT OF AGREEMENT. This Agreement governs your use of the binary software package called \"Oracle VM VirtualBox Extension Pack\" (the \"Product\"), which contains a set of additional features for \"Oracle VM VirtualBox\" that enhance the operation of multiple virtual machines (\"Guest Computers\") on a single physical computer (\"Host Computer\"). The Product consists of executable files in machine code, script files, data files, and all documentation and updates provided to You by Oracle.
 .
 2 GRANT OF LICENSE. Oracle grants you a personal, non-exclusive, non-transferable, limited license without fees to reproduce, install, execute, and use internally the Product on Host Computers for your Personal Use, Educational Use, or Evaluation. \"Personal Use\" is noncommercial use solely by the person downloading the Product from Oracle on a single Host Computer, provided that no more than one client or remote computer is connected to that Host Computer and that client or remote computer is used solely to remotely view the Guest Computer(s). \"Educational Use\" is any use by teachers or students in an academic institution (schools, colleges and universities) as part of the institution's educational curriculum. \"Evaluation\" means testing the Product for up to thirty (30) days; after expiry of that term, you are no longer permitted to use the Product. Personal Use and/or Educational Use expressly exclude any use of the Product for commercial purposes or to operate, run, or act on behalf of or for the benefit of a business, organization, governmental organization, or educational institution.
 .
 Oracle reserves all rights not expressly granted in this license.
 .
 3 RESTRICTIONS AND RESERVATION OF RIGHTS.
 .
 (1) The Product and copies thereof provided to you under this Agreement are copyrighted and licensed, not sold, to you by Oracle.
 .
 (2) You may not do any of the following: (a) modify any part of the Product, except to the extent allowed in the documentation accompanying the Product; (b) rent, lease, lend, re-distribute, or encumber the Product; (c) remove or alter any proprietary legends or notices contained in the Product; or (d) decompile, or reverse engineer the Product (except to the extent permitted by applicable law).
 .
 (3) The Product is not designed, licensed or intended for use in the design, construction, operation or maintenance of any nuclear facility and Oracle and its licensors disclaim any express or implied warranty of fitness for such uses.
 .
 (4) No right, title or interest in or to any trademark, service mark, logo or trade name of Oracle or its licensors is granted under this Agreement.
 .
 4 TERMINATION. The Agreement is effective on the date you receive the Product and remains effective until terminated. Your rights under this Agreement will terminate immediately without notice from Oracle if you materially breach it or take any action in derogation of Oracle's and/or its licensors' rights to the Product. Oracle may terminate this Agreement immediately should any part of the Product become or in Oracle's reasonable opinion likely to become the subject of a claim of intellectual property infringement or trade secret misappropriation. Upon termination, you will cease use of and destroy all copies of the Product under your control and confirm compliance in writing to Oracle. Sections 3-9, inclusive, will survive termination of the Agreement.
 .
 5 DISCLAIMER OF WARRANTY. TO THE EXTENT NOT PROHIBITED BY APPLICABLE LAW, ORACLE PROVIDES THE PRODUCT \"AS IS\" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESS OR IMPLIED. WITHOUT LIMITING THE FOREGOING, ORACLE SPECIFICALLY DISCLAIMS ANY IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, AND NON-INFRINGEMENT. The entire risk as to the quality and performance of the Product is with you. Should it prove defective, you assume the cost of all necessary servicing, repair, or correction.
 .
 6 LIMITATION OF LIABILITY. TO THE EXTENT NOT PROHIBITED BY APPLICABLE LAW, IN NO EVENT WILL ORACLE OR ITS LICENSORS BE LIABLE FOR ANY LOST REVENUE, PROFIT, DATA, OR DATA USE, OR FOR SPECIAL, INDIRECT, CONSEQUENTIAL, INCIDENTAL OR PUNITIVE DAMAGES, HOWEVER CAUSED REGARDLESS OF THE THEORY OF LIABILITY, ARISING OUT OF OR RELATED TO THE USE OF OR INABILITY TO USE THE PRODUCT, EVEN IF ORACLE HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. In no event will Oracle's liability to you, whether in contract, tort (including negligence), or otherwise, exceed the amount paid by you for the Product under this Agreement.
 .
 7 SEPARATELY LICENSED THIRD PARTY TECHNOLOGY. The Product may contain or require the use of third party technology that is provided with the Product. Oracle may provide certain notices to you in the Product's documentation, readmes or notice files in connection with such third party technology. Third party technology will be licensed to you either under the terms of this Agreement or, if specified in the documentation, readmes or notice files, under Separate Terms. Your rights to use Separately Licensed Third Party Technology under Separate Terms are not restricted in any way by this Agreement. However, for clarity, notwithstanding the existence of a notice, third party technology that is not Separately Licensed Third Party Technology shall be deemed part of the Product and is licensed to You under the terms of this Agreement. \"Separate Terms\" refers to separate license terms that are specified in the Product's documentation, readmes or notice files and that apply to Separately Licensed Third Party Technology. \"Separately Licensed Third Party Technology\" refers to third party technology that is licensed under Separate Terms and not under the terms of this Agreement.
 .
 8 EXPORT. Export laws and regulations of the United States and any other relevant local export laws and regulations apply to the Product. You agree that such export laws govern your use of the Product (including technical data) provided under this Agreement, and you agree to comply with all such export laws and regulations (including \"deemed export\" and \"deemed re-export\" regulations). You agree that no data, information, and/or Product (or direct product thereof) will be exported, directly or indirectly, in violation of these laws, or will be used for any purpose prohibited by these laws including, without limitation, nuclear, chemical, or biological weapons proliferation, or development of missile technology.
 .
 9 U.S. GOVERNMENT END USERS. Oracle programs, including the Product, any operating system, integrated software, any programs installed on hardware, and/or documentation, delivered to U.S. Government end users are \"commercial computer software\" pursuant to the applicable Federal Acquisition Regulation and agency-specific supplemental regulations. As such, use, duplication, disclosure, modification, and adaptation of the programs, including any operating system, integrated software, any programs installed on the hardware, and/or documentation, shall be subject to license terms and license restrictions applicable to the programs. No other rights are granted to the U.S. Government.
 .
 10 MISCELLANEOUS. This Agreement is the entire agreement between you and Oracle relating to its subject matter. It supersedes all prior or contemporaneous oral or written communications, proposals, representations and warranties and prevails over any conflicting or additional terms of any quote, order, acknowledgment, or other communication between the parties relating to its subject matter during the term of this Agreement. No modification of this Agreement will be binding, unless in writing and signed by an authorized representative of each party. If any provision of this Agreement is held to be unenforceable, this Agreement will remain in effect with the provision omitted, unless omission would frustrate the intent of the parties, in which case this Agreement will immediately terminate. This Agreement is governed by the laws of the State of California, USA, and you and Oracle agree to submit to the exclusive jurisdiction of, and venue in, the courts of San Francisco or Santa Clara counties in California in any dispute arising out of or relating to this Agreement.
";
$elem["virtualbox-ext-pack/license"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
