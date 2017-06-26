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
 VirtualBox PUEL terms and conditions
 .
 License version 8, April 19, 2010
 .
 ORACLE CORPORATION (“ORACLE”) IS WILLING TO LICENSE THE PRODUCT (AS DEFINED IN
 § 1 BELOW) TO YOU ONLY UPON THE CONDITION THAT YOU ACCEPT ALL OF THE TERMS
 CONTAINED IN THIS VIRTUALBOX PERSONAL USE AND EVALUATION LICENSE AGREEMENT
 (“AGREEMENT”). PLEASE READ THE AGREEMENT CAREFULLY. BY DOWNLOADING OR
 INSTALLING THIS PRODUCT, YOU ACCEPT THE FULL TERMS OF THIS AGREEMENT.
 .
 IF YOU ARE AGREEING TO THIS LICENSE ON BEHALF OF AN ENTITY OTHER THAN AN
 INDIVIDUAL PERSON, YOU REPRESENT THAT YOU ARE BINDING AND HAVE THE RIGHT TO
 BIND THE ENTITY TO THE TERMS AND CONDITIONS OF THIS AGREEMENT.
 .
 § 1 Subject of Agreement. “Product”, as referred to in this Agreement, shall
 be the binary software package “Oracle VM VirtualBox,” which Product allows
 for creating multiple virtual computers, each with different operating
 systems (“Guest Computers”), on a physical computer with a specific operating
 system (“Host Computer”), to allow for installing and executing these Guest
 Computers simultaneously. The Product consists of executable files in machine
 code for the Solaris, Windows, Linux, and Mac OS X operating systems as well
 as other data files as required by the executable files at run-time and
 documentation in electronic form. The Product includes all documentation and
 updates provided to You by Oracle under this Agreement and the terms of this
 Agreement will apply to all such documentation and updates unless a different
 license is provided with an update or documentation.
 .
 § 2 Grant of license. (1) Oracle grants you a personal, non-exclusive,
 non-transferable, limited license without fees to reproduce, install, execute,
 and use internally the Product a Host Computer for your Personal Use,
 Educational Use, or Evaluation. “Personal Use” requires that you use the
 Product on the same Host Computer where you installed it yourself and that no
 more than one client connect to that Host Computer at a time for the purpose
 of displaying Guest Computers remotely. “Educational use” is any use in an
 academic institution (schools, colleges and universities, by teachers and
 students). “Evaluation” means testing the Product for a reasonable period
 (that is, normally for a few weeks); after expiry of that term, you are no
 longer permitted to evaluate the Product.
 .
 (2) The “VirtualBox Guest Additions” are a set of drivers and utilities that
 are shipped as a subset of the Product for the purpose of being installed
 inside a Guest Computer to improve its performance and cooperation with the
 rest of the Product. In addition to and independent of the rights granted by
 subsection 1, Oracle allows you to install, execute, copy and redistribute a)
 unmodified copies of the ISO installation medium of the VirtualBox Guest
 Additions as shipped with the Product and b) the VirtualBox Guest Additions
 together with the Guest Computer into which they have been installed.
 .
 § 3 Restrictions and Reservation of Rights. (1) Any use beyond the provisions
 of § 2 is prohibited. The Product and copies thereof provided to you under
 this Agreement are copyrighted and licensed, not sold, to you by Oracle.
 Oracle reserves all copyrights and other intellectual property rights. This
 includes, but is not limited to, the right to modify, make available or
 public, rent out, lease, lend or otherwise distribute the Product. This does
 not apply as far as applicable law may require otherwise or if Oracle grants
 you additional rights of use in a separate agreement in writing.
 .
 (2) You may not do any of the following: (a) modify the Product. However if
 the documentation accompanying Product lists specific portions of Product,
 such as header files, class libraries, reference source code, and/or
 redistributable files, that may be handled differently, you may do so only as
 provided in the documentation; (b) rent, lease, lend or encumber the Product;
 (c) remove or alter any proprietary legends or notices contained in the
 Product; or (d) decompile, or reverse engineer the Product (unless enforcement
 of this restrictions is prohibited by applicable law).
 .
 (3) The Product is not designed, licensed or intended for use in the design,
 construction, operation or maintenance of any nuclear facility and Oracle and
 its licensors disclaim any express or implied warranty of fitness for such
 uses.
 .
 (4) No right, title or interest in or to any trademark, service mark, logo or
 trade name of Oracle or its licensors is granted under this Agreement.
 .
 § 4 Termination. The Agreement is effective on the Date you receive the
 Product and remains effective until terminated. Your rights under this
 Agreement will terminate immediately without notice from Oracle if you
 materially breach it or take any action in derogation of Oracle's and/or its
 licensors' rights to Product. Oracle may terminate this Agreement should any
 Product become, or in Oracle's reasonable opinion likely to become, the
 subject of a claim of intellectual property infringement or trade secret
 misappropriation. Upon termination, you will cease use of, and destroy,
 Product and confirm compliance in writing to Oracle. Sections 3-9,
 inclusive, will survive termination of the Agreement.
 .
 § 5 Disclaimer of Warranty. TO THE EXTENT NOT PROHIBITED BY APPLICABLE LAW,
 ORACLE PROVIDES THE PRODUCT “AS IS” WITHOUT WARRANTY OF ANY KIND, EITHER
 EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES
 OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE OR NON-INFRINGEMENT,
 EXCEPT TO THE EXTENT THAT THESE DISCLAIMERS ARE HELD TO BE LEGALLY INVALID.
 The entire risk as to the quality and performance of the Product is with you.
 Should it prove defective, you assume the cost of all necessary servicing,
 repair, or correction. In addition, Oracle shall be allowed to provide updates
 to the Product in urgent cases. You are then obliged to install such updates.
 Such an urgent case includes, but is not limited to, a claim of rights to the
 Product by a third party.
 .
 § 6 Limitation of Liability. TO THE EXTENT NOT PROHIBITED BY APPLICABLE LAW,
 IN NO EVENT WILL ORACLE OR ITS LICENSORS BE LIABLE FOR ANY LOST REVENUE,
 PROFIT OR DATA, OR FOR SPECIAL, INDIRECT, CONSEQUENTIAL, INCIDENTAL OR
 PUNITIVE DAMAGES, HOWEVER CAUSED REGARDLESS OF THE THEORY OF LIABILITY,
 ARISING OUT OF OR RELATED TO THE USE OF OR INABILITY TO USE PRODUCT, EVEN IF
 ORACLE HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. In no event will
 Oracle's liability to you, whether in contract, tort (including negligence),
 or otherwise, exceed the amount paid by you for Product under this Agreement.
 Some states do not allow the exclusion of incidental or consequential damages,
 so some of the terms above may not be applicable to you.
 .
 § 7 Third Party Code. Portions of Product may be provided with notices and
 open source licenses from communities and third parties that govern the
 use of those portions, and any licenses granted hereunder do not alter any
 rights and obligations You may have under such open source licenses, however,
 the disclaimer of warranty and limitation of liability provisions in this
 Agreement will apply to all the Product.
 .
 § 8 Export Regulations. All Product, documents, technical data, and any other
 materials delivered under this Agreement are subject to U.S. export control
 laws and may be subject to export or import regulations in other countries.
 You agree to comply strictly with these laws and regulations and acknowledge
 that you have the responsibility to obtain any licenses to export, re-export,
 or import as may be required after delivery to you.
 .
 § 9 U.S. Government Restricted Rights. If Product is being acquired by or on
 behalf of the U.S. Government or by a U.S. Government prime contractor or
 subcontractor (at any tier), then the Government's rights in Product and
 accompanying documentation will be only as set forth in this Agreement; this
 is in accordance with 48 CFR 227.7201 through 227.7202-4 (for Department of
 Defense (DOD) acquisitions) and with 48 CFR 2.101 and 12.212 (for non-DOD
 acquisitions).
 .
 § 10 Miscellaneous. This Agreement is the entire agreement between you and
 Oracle relating to its subject matter. It supersedes all prior or
 contemporaneous oral or written communications, proposals, representations
 and warranties and prevails over any conflicting or additional terms of any
 quote, order, acknowledgment, or other communication between the parties
 relating to its subject matter during the term of this Agreement. No
 modification of this Agreement will be binding, unless in writing and signed
 by an authorized representative of each party. If any provision of this
 Agreement is held to be unenforceable, this Agreement will remain in effect
 with the provision omitted, unless omission would frustrate the intent of the
 parties, in which case this Agreement will immediately terminate. Course of
 dealing and other standard business conditions of the parties or the industry
 shall not apply. This Agreement is governed by the substantive and procedural
 laws of California and you and Oracle agree to submit to the exclusive
 jurisdiction of, and venue in, the courts in San Francisco, San Mateo, or
 Santa Clara counties in California in any dispute arising out of or relating
 to this Agreement. 
";
$elem["virtualbox-ext-pack/license"]["descriptionde"]="Akzeptieren Sie die Bedingungen der VirtualBox-PUEL-Lizenz?
 Das Unternehmen Oracle verlangt von Virtualbox-Anwendern, dass sie der »VirtualBox Personal Use and Evaluation License« (PUEL/Virtualbox-Lizenz zum persönlichen Gebrauch und zum Ausprobieren) zustimmen und sie akzeptieren. Bitte lesen Sie die nachfolgende Lizenz. Falls Sie dieser Lizenz zustimmen, wird die Paketinstallation fortfahren. Falls Sie sie ablehnen, wird die Installation abgebrochen.
 .
 VirtualBox PUEL terms and conditions
 .
 License version 8, April 19, 2010
 .
 ORACLE CORPORATION (“ORACLE”) IS WILLING TO LICENSE THE PRODUCT (AS DEFINED IN § 1 BELOW) TO YOU ONLY UPON THE CONDITION THAT YOU ACCEPT ALL OF THE TERMS CONTAINED IN THIS VIRTUALBOX PERSONAL USE AND EVALUATION LICENSE AGREEMENT (“AGREEMENT”). PLEASE READ THE AGREEMENT CAREFULLY. BY DOWNLOADING OR INSTALLING THIS PRODUCT, YOU ACCEPT THE FULL TERMS OF THIS AGREEMENT.
 .
 IF YOU ARE AGREEING TO THIS LICENSE ON BEHALF OF AN ENTITY OTHER THAN AN INDIVIDUAL PERSON, YOU REPRESENT THAT YOU ARE BINDING AND HAVE THE RIGHT TO BIND THE ENTITY TO THE TERMS AND CONDITIONS OF THIS AGREEMENT.
 .
 § 1 Subject of Agreement. “Product”, as referred to in this Agreement, shall be the binary software package “Oracle VM VirtualBox,” which Product allows for creating multiple virtual computers, each with different operating systems (“Guest Computers”), on a physical computer with a specific operating system (“Host Computer”), to allow for installing and executing these Guest Computers simultaneously. The Product consists of executable files in machine code for the Solaris, Windows, Linux, and Mac OS X operating systems as well as other data files as required by the executable files at run-time and documentation in electronic form. The Product includes all documentation and updates provided to You by Oracle under this Agreement and the terms of this Agreement will apply to all such documentation and updates unless a different license is provided with an update or documentation.
 .
 § 2 Grant of license. (1) Oracle grants you a personal, non-exclusive, non-transferable, limited license without fees to reproduce, install, execute, and use internally the Product a Host Computer for your Personal Use, Educational Use, or Evaluation. “Personal Use” requires that you use the Product on the same Host Computer where you installed it yourself and that no more than one client connect to that Host Computer at a time for the purpose of displaying Guest Computers remotely. “Educational use” is any use in an academic institution (schools, colleges and universities, by teachers and students). “Evaluation” means testing the Product for a reasonable period (that is, normally for a few weeks); after expiry of that term, you are no longer permitted to evaluate the Product.
 .
 (2) The “VirtualBox Guest Additions” are a set of drivers and utilities that are shipped as a subset of the Product for the purpose of being installed inside a Guest Computer to improve its performance and cooperation with the rest of the Product. In addition to and independent of the rights granted by subsection 1, Oracle allows you to install, execute, copy and redistribute a) unmodified copies of the ISO installation medium of the VirtualBox Guest Additions as shipped with the Product and b) the VirtualBox Guest Additions together with the Guest Computer into which they have been installed.
 .
 § 3 Restrictions and Reservation of Rights. (1) Any use beyond the provisions of § 2 is prohibited. The Product and copies thereof provided to you under this Agreement are copyrighted and licensed, not sold, to you by Oracle. Oracle reserves all copyrights and other intellectual property rights. This includes, but is not limited to, the right to modify, make available or public, rent out, lease, lend or otherwise distribute the Product. This does not apply as far as applicable law may require otherwise or if Oracle grants you additional rights of use in a separate agreement in writing.
 .
 (2) You may not do any of the following: (a) modify the Product. However if the documentation accompanying Product lists specific portions of Product, such as header files, class libraries, reference source code, and/or redistributable files, that may be handled differently, you may do so only as provided in the documentation; (b) rent, lease, lend or encumber the Product; (c) remove or alter any proprietary legends or notices contained in the Product; or (d) decompile, or reverse engineer the Product (unless enforcement of this restrictions is prohibited by applicable law).
 .
 (3) The Product is not designed, licensed or intended for use in the design, construction, operation or maintenance of any nuclear facility and Oracle and its licensors disclaim any express or implied warranty of fitness for such uses.
 .
 (4) No right, title or interest in or to any trademark, service mark, logo or trade name of Oracle or its licensors is granted under this Agreement.
 .
 § 4 Termination. The Agreement is effective on the Date you receive the Product and remains effective until terminated. Your rights under this Agreement will terminate immediately without notice from Oracle if you materially breach it or take any action in derogation of Oracle's and/or its licensors' rights to Product. Oracle may terminate this Agreement should any Product become, or in Oracle's reasonable opinion likely to become, the subject of a claim of intellectual property infringement or trade secret misappropriation. Upon termination, you will cease use of, and destroy, Product and confirm compliance in writing to Oracle. Sections 3-9, inclusive, will survive termination of the Agreement.
 .
 § 5 Disclaimer of Warranty. TO THE EXTENT NOT PROHIBITED BY APPLICABLE LAW, ORACLE PROVIDES THE PRODUCT “AS IS” WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE OR NON-INFRINGEMENT, EXCEPT TO THE EXTENT THAT THESE DISCLAIMERS ARE HELD TO BE LEGALLY INVALID. The entire risk as to the quality and performance of the Product is with you. Should it prove defective, you assume the cost of all necessary servicing, repair, or correction. In addition, Oracle shall be allowed to provide updates to the Product in urgent cases. You are then obliged to install such updates. Such an urgent case includes, but is not limited to, a claim of rights to the Product by a third party.
 .
 § 6 Limitation of Liability. TO THE EXTENT NOT PROHIBITED BY APPLICABLE LAW, IN NO EVENT WILL ORACLE OR ITS LICENSORS BE LIABLE FOR ANY LOST REVENUE, PROFIT OR DATA, OR FOR SPECIAL, INDIRECT, CONSEQUENTIAL, INCIDENTAL OR PUNITIVE DAMAGES, HOWEVER CAUSED REGARDLESS OF THE THEORY OF LIABILITY, ARISING OUT OF OR RELATED TO THE USE OF OR INABILITY TO USE PRODUCT, EVEN IF ORACLE HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. In no event will Oracle's liability to you, whether in contract, tort (including negligence), or otherwise, exceed the amount paid by you for Product under this Agreement. Some states do not allow the exclusion of incidental or consequential damages, so some of the terms above may not be applicable to you.
 .
 § 7 Third Party Code. Portions of Product may be provided with notices and open source licenses from communities and third parties that govern the use of those portions, and any licenses granted hereunder do not alter any rights and obligations You may have under such open source licenses, however, the disclaimer of warranty and limitation of liability provisions in this Agreement will apply to all the Product.
 .
 § 8 Export Regulations. All Product, documents, technical data, and any other materials delivered under this Agreement are subject to U.S. export control laws and may be subject to export or import regulations in other countries. You agree to comply strictly with these laws and regulations and acknowledge that you have the responsibility to obtain any licenses to export, re-export, or import as may be required after delivery to you.
 .
 § 9 U.S. Government Restricted Rights. If Product is being acquired by or on behalf of the U.S. Government or by a U.S. Government prime contractor or subcontractor (at any tier), then the Government's rights in Product and accompanying documentation will be only as set forth in this Agreement; this is in accordance with 48 CFR 227.7201 through 227.7202-4 (for Department of Defense (DOD) acquisitions) and with 48 CFR 2.101 and 12.212 (for non-DOD acquisitions).
 .
 § 10 Miscellaneous. This Agreement is the entire agreement between you and Oracle relating to its subject matter. It supersedes all prior or contemporaneous oral or written communications, proposals, representations and warranties and prevails over any conflicting or additional terms of any quote, order, acknowledgment, or other communication between the parties relating to its subject matter during the term of this Agreement. No modification of this Agreement will be binding, unless in writing and signed by an authorized representative of each party. If any provision of this Agreement is held to be unenforceable, this Agreement will remain in effect with the provision omitted, unless omission would frustrate the intent of the parties, in which case this Agreement will immediately terminate. Course of dealing and other standard business conditions of the parties or the industry shall not apply. This Agreement is governed by the substantive and procedural laws of California and you and Oracle agree to submit to the exclusive jurisdiction of, and venue in, the courts in San Francisco, San Mateo, or Santa Clara counties in California in any dispute arising out of or relating to this Agreement.
";
$elem["virtualbox-ext-pack/license"]["descriptionfr"]="Acceptez-vous les termes de la licence PUEL de Virtualbox ?
 Oracle Corporation demande aux utilisateurs de Virtualbox de prendre connaissance et d'accepter la licence de VirtualBox pour utilisation personnelle et évaluation (« VirtualBox Personal Use and Evaluation License » PUEL). Veuillez lire la licence ci-dessous. Si vous acceptez la licence, l'installation du paquet continuera. Si vous la refusez, elle sera interrompue.
 .
 VirtualBox PUEL terms and conditions
 .
 License version 8, April 19, 2010
 .
 ORACLE CORPORATION (“ORACLE”) IS WILLING TO LICENSE THE PRODUCT (AS DEFINED IN § 1 BELOW) TO YOU ONLY UPON THE CONDITION THAT YOU ACCEPT ALL OF THE TERMS CONTAINED IN THIS VIRTUALBOX PERSONAL USE AND EVALUATION LICENSE AGREEMENT (“AGREEMENT”). PLEASE READ THE AGREEMENT CAREFULLY. BY DOWNLOADING OR INSTALLING THIS PRODUCT, YOU ACCEPT THE FULL TERMS OF THIS AGREEMENT.
 .
 IF YOU ARE AGREEING TO THIS LICENSE ON BEHALF OF AN ENTITY OTHER THAN AN INDIVIDUAL PERSON, YOU REPRESENT THAT YOU ARE BINDING AND HAVE THE RIGHT TO BIND THE ENTITY TO THE TERMS AND CONDITIONS OF THIS AGREEMENT.
 .
 § 1 Subject of Agreement. “Product”, as referred to in this Agreement, shall be the binary software package “Oracle VM VirtualBox,” which Product allows for creating multiple virtual computers, each with different operating systems (“Guest Computers”), on a physical computer with a specific operating system (“Host Computer”), to allow for installing and executing these Guest Computers simultaneously. The Product consists of executable files in machine code for the Solaris, Windows, Linux, and Mac OS X operating systems as well as other data files as required by the executable files at run-time and documentation in electronic form. The Product includes all documentation and updates provided to You by Oracle under this Agreement and the terms of this Agreement will apply to all such documentation and updates unless a different license is provided with an update or documentation.
 .
 § 2 Grant of license. (1) Oracle grants you a personal, non-exclusive, non-transferable, limited license without fees to reproduce, install, execute, and use internally the Product a Host Computer for your Personal Use, Educational Use, or Evaluation. “Personal Use” requires that you use the Product on the same Host Computer where you installed it yourself and that no more than one client connect to that Host Computer at a time for the purpose of displaying Guest Computers remotely. “Educational use” is any use in an academic institution (schools, colleges and universities, by teachers and students). “Evaluation” means testing the Product for a reasonable period (that is, normally for a few weeks); after expiry of that term, you are no longer permitted to evaluate the Product.
 .
 (2) The “VirtualBox Guest Additions” are a set of drivers and utilities that are shipped as a subset of the Product for the purpose of being installed inside a Guest Computer to improve its performance and cooperation with the rest of the Product. In addition to and independent of the rights granted by subsection 1, Oracle allows you to install, execute, copy and redistribute a) unmodified copies of the ISO installation medium of the VirtualBox Guest Additions as shipped with the Product and b) the VirtualBox Guest Additions together with the Guest Computer into which they have been installed.
 .
 § 3 Restrictions and Reservation of Rights. (1) Any use beyond the provisions of § 2 is prohibited. The Product and copies thereof provided to you under this Agreement are copyrighted and licensed, not sold, to you by Oracle. Oracle reserves all copyrights and other intellectual property rights. This includes, but is not limited to, the right to modify, make available or public, rent out, lease, lend or otherwise distribute the Product. This does not apply as far as applicable law may require otherwise or if Oracle grants you additional rights of use in a separate agreement in writing.
 .
 (2) You may not do any of the following: (a) modify the Product. However if the documentation accompanying Product lists specific portions of Product, such as header files, class libraries, reference source code, and/or redistributable files, that may be handled differently, you may do so only as provided in the documentation; (b) rent, lease, lend or encumber the Product; (c) remove or alter any proprietary legends or notices contained in the Product; or (d) decompile, or reverse engineer the Product (unless enforcement of this restrictions is prohibited by applicable law).
 .
 (3) The Product is not designed, licensed or intended for use in the design, construction, operation or maintenance of any nuclear facility and Oracle and its licensors disclaim any express or implied warranty of fitness for such uses.
 .
 (4) No right, title or interest in or to any trademark, service mark, logo or trade name of Oracle or its licensors is granted under this Agreement.
 .
 § 4 Termination. The Agreement is effective on the Date you receive the Product and remains effective until terminated. Your rights under this Agreement will terminate immediately without notice from Oracle if you materially breach it or take any action in derogation of Oracle's and/or its licensors' rights to Product. Oracle may terminate this Agreement should any Product become, or in Oracle's reasonable opinion likely to become, the subject of a claim of intellectual property infringement or trade secret misappropriation. Upon termination, you will cease use of, and destroy, Product and confirm compliance in writing to Oracle. Sections 3-9, inclusive, will survive termination of the Agreement.
 .
 § 5 Disclaimer of Warranty. TO THE EXTENT NOT PROHIBITED BY APPLICABLE LAW, ORACLE PROVIDES THE PRODUCT “AS IS” WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE OR NON-INFRINGEMENT, EXCEPT TO THE EXTENT THAT THESE DISCLAIMERS ARE HELD TO BE LEGALLY INVALID. The entire risk as to the quality and performance of the Product is with you. Should it prove defective, you assume the cost of all necessary servicing, repair, or correction. In addition, Oracle shall be allowed to provide updates to the Product in urgent cases. You are then obliged to install such updates. Such an urgent case includes, but is not limited to, a claim of rights to the Product by a third party.
 .
 § 6 Limitation of Liability. TO THE EXTENT NOT PROHIBITED BY APPLICABLE LAW, IN NO EVENT WILL ORACLE OR ITS LICENSORS BE LIABLE FOR ANY LOST REVENUE, PROFIT OR DATA, OR FOR SPECIAL, INDIRECT, CONSEQUENTIAL, INCIDENTAL OR PUNITIVE DAMAGES, HOWEVER CAUSED REGARDLESS OF THE THEORY OF LIABILITY, ARISING OUT OF OR RELATED TO THE USE OF OR INABILITY TO USE PRODUCT, EVEN IF ORACLE HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. In no event will Oracle's liability to you, whether in contract, tort (including negligence), or otherwise, exceed the amount paid by you for Product under this Agreement. Some states do not allow the exclusion of incidental or consequential damages, so some of the terms above may not be applicable to you.
 .
 § 7 Third Party Code. Portions of Product may be provided with notices and open source licenses from communities and third parties that govern the use of those portions, and any licenses granted hereunder do not alter any rights and obligations You may have under such open source licenses, however, the disclaimer of warranty and limitation of liability provisions in this Agreement will apply to all the Product.
 .
 § 8 Export Regulations. All Product, documents, technical data, and any other materials delivered under this Agreement are subject to U.S. export control laws and may be subject to export or import regulations in other countries. You agree to comply strictly with these laws and regulations and acknowledge that you have the responsibility to obtain any licenses to export, re-export, or import as may be required after delivery to you.
 .
 § 9 U.S. Government Restricted Rights. If Product is being acquired by or on behalf of the U.S. Government or by a U.S. Government prime contractor or subcontractor (at any tier), then the Government's rights in Product and accompanying documentation will be only as set forth in this Agreement; this is in accordance with 48 CFR 227.7201 through 227.7202-4 (for Department of Defense (DOD) acquisitions) and with 48 CFR 2.101 and 12.212 (for non-DOD acquisitions).
 .
 § 10 Miscellaneous. This Agreement is the entire agreement between you and Oracle relating to its subject matter. It supersedes all prior or contemporaneous oral or written communications, proposals, representations and warranties and prevails over any conflicting or additional terms of any quote, order, acknowledgment, or other communication between the parties relating to its subject matter during the term of this Agreement. No modification of this Agreement will be binding, unless in writing and signed by an authorized representative of each party. If any provision of this Agreement is held to be unenforceable, this Agreement will remain in effect with the provision omitted, unless omission would frustrate the intent of the parties, in which case this Agreement will immediately terminate. Course of dealing and other standard business conditions of the parties or the industry shall not apply. This Agreement is governed by the substantive and procedural laws of California and you and Oracle agree to submit to the exclusive jurisdiction of, and venue in, the courts in San Francisco, San Mateo, or Santa Clara counties in California in any dispute arising out of or relating to this Agreement.
";
$elem["virtualbox-ext-pack/license"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
