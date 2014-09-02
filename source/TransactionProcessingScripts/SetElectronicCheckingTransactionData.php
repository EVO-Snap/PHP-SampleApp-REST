<?php
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

// Credit Card Info
/* SEE CREDIT CARD CLASS IN CWSClient.php FOR MORE INFO */

function  setACHTxnData() {
	


	// below demonstrates how to use a PaymentAccountDataToken instead of Card Data
	$tokenizedTenderData = new achCheck();
	$tokenizedTenderData->PaymentAccountDataToken = '567980c8-c3f8-4edd-b46d-b13580d0d28c7b3ac5f6-c27e-49ab-8839-c3bd6ef438cf';
	$tokenizedTenderData->CheckNumber = '1101';
	$tokenizedTenderData->OwnerType = 'Personal';
	$tokenizedTenderData->UseType = 'Checking';
	$tokenizedTenderData->FirstName = 'Johnny';
	$tokenizedTenderData->LastName = 'Check'; 
	
	$tenderData = new achCheck();
	$tenderData->AccountNumber = '11302920';
	$tenderData->RoutingNumber = '302075128';
	$tenderData->CheckNumber = '1101';
	$tenderData->CheckCountryCode = 'US'; //  Bank account country of origin for receiver deposit. Required.
	$tenderData->OwnerType = 'Personal';
	$tenderData->UseType = 'Checking';
	$tenderData->FirstName = 'Johnny';
	$tenderData->LastName = 'Check'; 

	// Transaction information
	/* SEE TRANSACTION INFORMATION CLASS IN CWSClient.php FOR MORE INFO */
	$transactionData = new achTransactionData();
	$transactionData->Amount = '100.00'; // Amount in decimal format
	$transactionData->EffectiveDate = '2011-10-18'; // Date string. Specifies the effective date of the transaction. Required.
	$transactionData->IsRecurring = false; // Indicates whether the transaction is recurring. Conditional, required if SECCode = 'WEB'.
	$transactionData->SECCode = Settings::TxnData_SECCode; // WEB,PPD,CCD,BOC,TEL The three letter code that indicates what NACHA regulations the transaction must adhere to. Required.
	$transactionData->ServiceType = Settings::TxnData_ServiceType; //  Indicates the Electronic Checking service type: ACH, RDC or ECK. Required.
	$dateTime = new DateTime("now", new DateTimeZone('America/Denver'));
	$transactionData->TransactionDateTime = $dateTime->format(DATE_RFC3339);
	$transactionData->TransactionType = 'Debit'; // Indicates Transaction Type Credit/Debit

		$credentials[0] = '<UserId>100000007506657</UserId>';
		$credentials[1] = '<Password>A1B2C3D4F6</Password>';
		$transactionData->Creds = $credentials;

/*	$credentials[0] = '<UserId>100000007506657</UserId>';
		$credentials[1] = '<Password>A1B2C3D4F6</Password>';*/
		//$transactionData->Creds = $credentials;
	
	$transaction = new newTransaction();
	$transaction->TndrData = $tenderData;
	$transaction->TxnData = $transactionData;

	return $transaction;
}
?>