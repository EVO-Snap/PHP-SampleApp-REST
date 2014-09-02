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

include_once ABSPATH . '/TransactionProcessingScripts/SetBankcardTransactionData.php';

$_bcs = null;

if (is_array($_merchantProfileId)){
	foreach($_merchantProfileId as $profileId){
		$response = null;
		$response2 = null;
		$response3 = null;
		$response4 = null;
		$response5 = null;
		$response6 = null;
		$response7 = null;
		$transactionIds [] = null;
		$txnIds [] = null;
		$txnIdCs [] = null;

		$merchProfileId = array(ProfileId => $profileId['ProfileId'], ServiceId => $profileId['ServiceId']);

		if (is_array($_bankcardServices)){

			foreach ($_bankcardServices as $bankcardService)
			{
				if ($bankcardService->ServiceId == $merchProfileId['ServiceId'])
				{
					$_bcs = $bankcardService;
					break;
				}
			}
		}
		else {
			$_bcs = $_bankcardServices->BankcardService;
		}
		$client->merchantProfileID = $merchProfileId['ProfileId'];
		$client->workflowId = $merchProfileId['ServiceId'];

		$bcpTxn = new newTransaction();

		$bcpTxn = setBCPTxnData($_serviceInformation);
	
		/*
		 *
		 * Authorize using credit card
		 *
		 */
		if ($bcpTxn->TndrData->securePaymentAccountData != ''){
			if ($client->workflowId == '39C6700001') {
				$client->workflowId = 'A121700001';
			}
			elseif ($client->workflowId == '4C85600001') {
				$client->workflowId = 'A1F1A00001';
			}
		}
		if($_bcs->Operations->Authorize)
		{
			$response = $client->authorize($bcpTxn->TndrData, $bcpTxn->TxnData, Settings::ProcessAsBankcardTransaction_Pro, Settings::ProcessInternationalTxn);
			printTransactionResults($response, 'Authorize', $merchProfileId);
		}

		if($_bcs->Operations->Authorize && Settings::TxnData_SupportTokenization && $response->PaymentAccountDataToken != '')
		{
			$tokenTransaction = new newTransaction();
			$tokenTransaction->TxnData = $bcpTxn->TxnData;
			// below demonstrates how to use a PaymentAccountDataToken instead of Card Data
			$tokenizedTenderData = new creditCard();
			$tokenizedTenderData->paymentAccountDataToken = $response->PaymentAccountDataToken;
			$tokenizedTenderData->name = 'John Doe';
			$tokenizedTenderData->address = '1000 1st Av';
			$tokenizedTenderData->city = 'Denver';
			$tokenizedTenderData->state = 'CO';
			$tokenizedTenderData->country = 'USA';
			$tokenizedTenderData->zip = '10101';
			$tokenTransaction->TndrData = $tokenizedTenderData;
			$bcpTxn->TxnData->EntryMode = 'Keyed';
			$response = $client->authorize($tokenTransaction->TndrData, $tokenTransaction->TxnData, Settings::ProcessAsBankcardTransaction_Pro, Settings::ProcessInternationalTxn);
			printTransactionResults($response, 'Authorize using PaymentAccountDataToken', $merchProfileId);
			$bcpTxn = setBCPTxnData($_serviceInformation);
		}

		/*
		 *
		 * Capture an authorized transaction
		 *
		 */
		if($_bcs->Operations->Capture)
		{
			$response2 = $client->capture($response->TransactionId, $credentials, null, null);
			printCaptureResults($response2, $merchProfileId);
		}

		if($_bcs->Operations->CaptureSelective)
		{
			$response = $client->authorize($bcpTxn->TndrData, $bcpTxn->TxnData, Settings::ProcessAsBankcardTransaction_Pro,  Settings::ProcessInternationalTxn);
			printTransactionResults($response, 'Authorize For CaptureSelective', $merchProfileId);
			$txnIdCs [0] = $response->TransactionId;
			$response2 = $client->captureSelective($txnIdCs, null, null);
			printBatchResults($response2, $merchProfileId);
		}
		if ($_bcs->Operations->CaptureAll && ! $_bcs->AutoBatch)
		{
			$response2 = $client->captureAll(null, null);
			printBatchResults($response2, $merchProfileId);
		}

		/*
		 *
		 * Undo funds based on previous transactionId
		 * May also include , $amount) where $amount is what you want to return e.g. 10.00
		 *
		 */
		if($_bcs->Operations->Undo)
		{
			// First send an Authorize to Void
			$response3 = $client->authorize($bcpTxn->TndrData, $bcpTxn->TxnData, Settings::ProcessAsBankcardTransaction_Pro,  Settings::ProcessInternationalTxn);
			// Now send the Void using TransactionId from above transaction response
			$response4 = $client->undo($response3->TransactionId, null, "BCP");
			printTransactionResults($response4, 'Undo', $merchProfileId);
		}

		/*
		 *
		 * Authorize and Capture using credit card
		 * Note: in a terminal capture environment AuthorizeAndCapture is only available for PINDebit transactions
		 */
		if($_bcs->Operations->AuthAndCapture && $_bcs->AutoBatch)
		{
			$response5 = $client->authorizeAndCapture($bcpTxn->TndrData, $bcpTxn->TxnData, Settings::ProcessAsBankcardTransaction_Pro,  Settings::ProcessInternationalTxn);
			printTransactionResults($response5, 'AuthorizeAndCapture', $merchProfileId);
		}

		/*
		 *
		 * Return funds based on previous transactionId
		 * May also incluse , $amount) where $amount is what you want to return e.g. 10.00
		 *
		 */

		if($_bcs->Operations->ReturnById && $_bcs->AutoBatch)
		{
			// Note: You must provide an already captured Authorize TransactionId for ReturnById
			$response6 = $client->returnByID($response5->TransactionId, $bcpTxn->TxnData->Creds, '2.00');
			printTransactionResults($response6, 'ReturnById', $merchProfileId);
		}
		if($_bcs->Operations->ReturnById && !$_bcs->AutoBatch)
		{
			// First send an Authorize to Capture
			$response3 = $client->authorize($bcpTxn->TndrData, $bcpTxn->TxnData, Settings::ProcessAsBankcardTransaction_Pro);
			printTransactionResults($response3, 'Authorize For CaptureSelective', $merchProfileId);
			$txnIds [0] = $response3->TransactionId;
			// Now send the Void using TransactionId from above transaction response
			$response4 = $client->CaptureSelective($txnIds, null);
			printBatchResults($response4, $merchProfileId);

			// Note: You must provide an already captured Authorize TransactionId for ReturnById
			$response6 = $client->returnByID($response3->TransactionId, $bcpTxn->TxnData->Creds, '2.00');
			printTransactionResults($response6, 'ReturnById After Capture', $merchProfileId);
		}

		/*
		 *
		 * Return funds to a specified acocunt
		 * May also incluse , $amount) where $amount is what you want to return e.g. 10.00
		 *
		 */

		if($_bcs->Operations->ReturnUnlinked)
		{
			$response7 = $client->returnUnlinked($bcpTxn->TndrData, $bcpTxn->TxnData, $bcpTxn->TxnData->Creds);
			printTransactionResults($response7, 'ReturnUnlinked', $merchProfileId);
		}
	}
}


?>