/* Copyright (c) 2013 EVO Payments International - All Rights Reserved.
 *
 * This software and documentation is subject to and made
 * available only pursuant to the terms of an executed license
 * agreement, and may be used only in accordance with the terms
 * of said agreement. This software may not, in whole or in part,
 * be copied, photocopied, reproduced, translated, or reduced to
 * any electronic medium or machine-readable form without
 * prior consent, in writing, from EVO Payments International
 *
 * Use, duplication or disclosure by the U.S. Government is subject
 * to restrictions set forth in an executed license agreement
 * and in subparagraph (c)(1) of the Commercial Computer
 * Software-Restricted Rights Clause at FAR 52.227-19; subparagraph
 * (c)(1)(ii) of the Rights in Technical Data and Computer Software
 * clause at DFARS 252.227-7013, subparagraph (d) of the Commercial
 * Computer Software--Licensing clause at NASA FAR supplement
 * 16-52.227-86; or their equivalent.
 *
 * Information in this software is subject to change without notice
 * and does not represent a commitment on the part of EVO Payments International.
 * 
 * Sample Code is for reference Only and is intended to be used for educational purposes. It's the responsibility of 
 * the software company to properly integrate into thier solution code that best meets thier production needs. 
*/

____________________________________________________________________________________________________________________

NOTE: You will need to obtain an IdentityToken from your Solutions Consultant in order to run this project successfully.

This project was created with PHP 5.3 and is only compatible with 5.3 and up PHP versions.  The project uses the PHP built in SOAP Client.

Step 1:  In the app.config.php file enter the IdentityToken given to you. Change the MsgFormat to either SOAP, HTTP, or JSON depending
	 on the how you chose to send the messages. This will determine which client is created. Also edit the fields depending on your
	 industry type. The defaults in the app.config.php are set to Ecommerce, see the below for what the defaults should be depending on industry.

Step 2:  Run the ApplicationAndMerchantSetup.php script first.  This script will do all of the necessary steps (1-4) to 
	 set your application up.  This includes creating sample applicationData, and a MerchantProfile.  This will output
	 your ApplicationProfileId, ServiceId, MerchantProfileId, and encrypted IdentityToken into the CWS_Config_Values.xml file located in
	 the ConfigFiles directory.

Step 3:  Run the TransactionProcessing.php script.  This script will walk you through creating different transaction types and 
	 sending them. The transaction types that are created and sent are all based off of the ServiceInformation Operations object
	 which details what Operations are supported.  The responses for these transactions are outputted to the window.

Web Service Proxies folder:

- CWSClient.php/HTTPClient.php/JSONClient.php - is the file that does all of the message processing and is your main client file that ties the WebServiceProxies together.
- FaultHandler.php - is the basis of a fault handling class and will capture the SOAP faults that are returned your application.
- RestFaultHandler.php - is the basis of a fault handling class and will capture the REST faults that are returned your application.
- CWSTransactionProcessing.php - is the Transaction proxy class generated from the Txn WSDL; includes a classmap.
- CWSServiceInformation.php - is the ServiceInformation class generated from the SvcInfo wsdl; includes a classmap
- CWSTransactionManagement.php - is the Transaction Management proxy class generated from the TMS WSDL; includes a classmap.
- HelperMethods.php - is a class that helps output data from all responses.  Note these functions can be modified to parse data to insert
											into your database.
											
Industry: Ecommerce
	TxnData_IndustryType = 'Ecommerce'
	TxnData_CustomerPresent = 'Ecommerce'
	ApplicationAttended = false;
	ApplicationLocation = 'OffPremises'
	PINCapability = 'PINNotSupported'
	ReadCapability = 'KeyOnly'
	EntryMode = 'Keyed'
	
Industry: MOTO
	TxnData_IndustryType = 'MOTO'
	TxnData_CustomerPresent = 'MOTO'
	ApplicationAttended = false;
	ApplicationLocation = 'OffPremises'
	PINCapability = 'PINNotSupported'
	ReadCapability = 'KeyOnly'
	EntryMode = 'Keyed'
	
Industry: Retail
	TxnData_IndustryType = 'Retail'
	TxnData_CustomerPresent = 'Present'
	ApplicationAttended = true;
	ApplicationLocation = 'OnPremises'
	PINCapability = 'PINNotSupported'
	ReadCapability = 'HasMSR'
	EntryMode = 'TrackDataFromMSR'
											
Industry: Restaurant
	TxnData_IndustryType = 'Restaurant'
	TxnData_CustomerPresent = 'Present'
	ApplicationAttended = true;
	ApplicationLocation = 'OffPremises'
	PINCapability = 'PINNotSupported'
	ReadCapability = 'HasMSR'
	EntryMode = 'TrackDataFromMSR'											