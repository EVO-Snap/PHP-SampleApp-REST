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

require_once ABSPATH.'/TransactionProcessingScripts/SetElectronicCheckingTransactionData.php';

$_bcs = null;
$_achs = null;

if (is_array($_merchantProfileId)){
	foreach($_merchantProfileId as $profileId){
		$response = null;
		$response2 = null;
		$response3 = null;
		$response4 = null;

		$merchProfileId = array(ProfileId => $profileId['ProfileId'], ServiceId => $profileId['ServiceId']);

		if (is_array($_electronicCheckingServices->ElectronicCheckingService)){
			foreach ($_electronicCheckingServices->ElectronicCheckingService as $electronicCheckingService)
			{
				if ($electronicCheckingService->ServiceId == $merchProfileId['ServiceId'])
				{
					$_achs = $electronicCheckingService;
					break;
				}
			}
		}
		else{
			if ($_electronicCheckingServices->ElectronicCheckingService->ServiceId == $merchProfileId['ServiceId'])
			{
				$_achs = $_electronicCheckingServices->ElectronicCheckingService;
			}
		}
		$client = new CWSClient($_identityToken, $_serviceKey, $merchProfileId['ProfileId'], $merchProfileId['ServiceId'], $_applicationProfileId, null, $_achs);

		$eckTxn = new newTransaction();

		$eckTxn = setACHTxnData();


		/*
		 *
		 * Query Account using ACH Check Data
		 *
		 */


		if($_achs->Operations->QueryAccount)
		{
			$response = $client->queryAccount($eckTxn->TndrData, $eckTxn->TxnData);
			printQueryAccountResults($response, 'Query Account', $merchProfileId);
		}
		/*
		 *
		 * Authorize using credit card
		 *
		 */


		if($_achs->Operations->Authorize)
		{
			$response2 = $client->authorize($eckTxn->TndrData, $eckTxn->TxnData);
			printTransactionResults($response2, 'Authorize', $merchProfileId);
		}



		/*
		 *
		 * Undo funds based on previous transactionId
		 * May also include , $amount) where $amount is what you want to return e.g. 10.00
		 *
		 */
		if($_achs->Operations->Undo)
		{
			// First send an Authorize to Void
			$response3 = $client->authorize($eckTxn->TndrData, $eckTxn->TxnData, $eckTxn->TxnData->Creds);
			// Now send the Void using TransactionId from above transaction response
			$response4 = $client->undo($response3->TransactionId, $eckTxn->TxnData->Creds);
			printTransactionResults($response4, 'Undo', $merchProfileId);
		}

		/*
		 *
		 * Capture an authorized transaction
		 *
		 */

		if($_achs->Operations->CaptureAll)
		{
			$response5 = $client->captureAll(null, $eckTxn->TxnData->Creds);
			printACHBatchResults($response5, $merchProfileId);
		}
	}
}


?>