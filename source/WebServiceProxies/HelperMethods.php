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

/************************************************************
 **                   HELPER FUNCTIONS
 ************************************************************/

function encrypt($string, $key) {
	$result = '';
	for($i = 0; $i < strlen ( $string ); $i ++) {
		$char = substr ( $string, $i, 1 );
		$keychar = substr ( $key, ($i % strlen ( $key )) - 1, 1 );
		$char = chr ( ord ( $char ) + ord ( $keychar ) );
		$result .= $char;
	}

	return base64_encode ( $result );
}

function decrypt($string, $key) {
	$result = '';
	$string = base64_decode ( $string );

	for($i = 0; $i < strlen ( $string ); $i ++) {
		$char = substr ( $string, $i, 1 );
		$keychar = substr ( $key, ($i % strlen ( $key )) - 1, 1 );
		$char = chr ( ord ( $char ) - ord ( $keychar ) );
		$result .= $char;
	}

	return $result;
}

function transalateBool($bvalue) {
	switch ($bvalue) {
		case "0" :
			return "----";
			//break;
		case "1" :
			return "* Supported *";
			//break;
	}

}


/*
 * ---------------------------------------------------------------------------
 * Helper Functions to Print Responses
 * ---------------------------------------------------------------------------
 */
function printCaptureResults($response, $merchantProfileId)
{
	//NOTE : Please reference the developers guide for a more complete explination of the return fields
	//Note Highly recommended to save
	echo '<div style="text-align:center; border-width: thin; border-color: black; border-style:solid; "><h2>Capture Results</h2></div>';
	echo '<b>Merchant ProfileId:</b><font color="#800080"> '.$merchantProfileId['ProfileId'].'</font><br />';
	echo '<b>Service Name:</b><font color="#800080"> '.$merchantProfileId['ServiceName'].'</font><br />';
	echo '<b>Status:</b><font color="#800080"> '. $response->Status.'</font><br />';

	echo '<b>TransactionId :</b><font color="#800080"> ' . $response->TransactionId . '</font><br />';
	//Note Optional but recommended to save
	echo '<b>Status Code : </b><font color="#800080">' . $response->StatusCode . '</font><br />';
	echo '<b>Status Message : </b><font color="#800080">' . $response->StatusMessage . '</font><br />';
	//Note Optional data about the batch
	if ($response->BatchId != null)
	echo '<b>Batch Id : </b><font color="#800080">' . $response->BatchId . '</font><br />';
	if ($response->TransactionSummaryData->CashBackTotals != null)
	echo '<b>Cash Back Totals <br />  Count : </b><font color="#800080">' . $response->TransactionSummaryData->CashBackTotals->Count . '</font><br /><b>  Net Amount : </b><font color="#800080">' . $response->TransactionSummaryData->CashBackTotals->NetAmount . '</font><br />';
	if ($response->TransactionSummaryData->NetTotals != null)
	echo '<b>Net Totals <br />  Count : </b><font color="#800080">' . $response->TransactionSummaryData->NetTotals->Count . '</font><br /><b>  Net Amount : </b><font color="#800080">' . $response->TransactionSummaryData->NetTotals->NetAmount . '</font><br />';
	if ($response->TransactionSummaryData->PINDebitReturnTotals != null)
	echo '<b>PINDebit Return Totals <br />  Count : </b><font color="#800080">' . $response->TransactionSummaryData->PINDebitReturnTotals->Count . '</font><br /><b>  Net Amount : </b><font color="#800080">' . $response->TransactionSummaryData->PINDebitReturnTotals->NetAmount . '</font><br />';
	if ($response->TransactionSummaryData->PINDebitSaleTotals != null)
	echo '<b>PINDebit Sale Totals <br />  Count : </b><font color="#800080">' . $response->TransactionSummaryData->PINDebitSaleTotals->Count . '</font><br /><b>  Net Amount : </b><font color="#800080">' . $response->TransactionSummaryData->PINDebitSaleTotals->NetAmount . '</font><br />';
	if ($response->TransactionSummaryData->ReturnTotals != null)
	echo '<b>Return Totals <br />  Count : </b><font color="#800080">' . $response->TransactionSummaryData->ReturnTotals->Count . '</font><br /><b>  Net Amount : </b><font color="#800080">' . $response->TransactionSummaryData->ReturnTotals->NetAmount . '</font><br />';
	if ($response->TransactionSummaryData->SaleTotals != null)
	echo '<b>Sale Totals <br />  Count : </b><font color="#800080">' . $response->TransactionSummaryData->SaleTotals->Count . '</font><br /> <b> Net Amount : </b><font color="#800080">' . $response->TransactionSummaryData->SaleTotals->NetAmount . '</font><br />';
	if ($response->TransactionSummaryData->VoidTotals != null)
	echo '<b>Void Totals <br />  Count : </b><font color="#800080">' . $response->TransactionSummaryData->VoidTotals->Count . '</font><br /> <b> Net Amount : </b><font color="#800080">' . $response->TransactionSummaryData->VoidTotals->NetAmount . '</font><br />';

}
function printTransactionResults($response, $transactionType, $merchantProfileId)
{
	echo '<div style="text-align:center; border-width: thin; border-color: black; border-style:solid; "><h2>'.$transactionType.'</h2></div>';
	echo '<b>Merchant ProfileId:</b><font color="#800080"> '.$merchantProfileId['ProfileId'].'</font><br />';
	echo '<b>Service Name:</b><font color="#800080"> '.$merchantProfileId['ServiceName'].'</font><br />';
	echo '<b>Status:</b><font color="#800080"> '.$response->Status.'</font><br />';
	echo '<b>Status Code:</b> <font color="#800080">'.$response->StatusCode.'</font><br />';
	echo '<b>Status Message:</b><font color="#800080"> '.$response->StatusMessage.'</font><br />';
	echo '<b>Amount:</b><font color="#800080"> '.$response->Amount.'</font><br />';
	echo '<b>AVSResult:</b><br />';
	if ($response->AVSResult != null){
		echo '<b><t>- ActualResult:</b> <font color="#800080">'.$response->AVSResult->ActualResult.'</font><br />';
		echo '<b><t>- Address Result: </b><font color="#800080">'.$response->AVSResult->AddressResult.'</font><br />';
		echo '<b><t>- Postal Code Result:</b><font color="#800080"> '.$response->AVSResult->PostalCodeResult.'</font><br />';
	}

	echo '<b>CVResult:</b><font color="#800080"> '.$response->CVResult.'</font><br />';
	echo '<b>Approval Code:</b><font color="#800080"> '.$response->ApprovalCode.'</font><br />';

	echo '<b>TransactionId:</b><font color="#800080"> '.$response->TransactionId.'</font><br />';
	echo '<b>OriginatorTransactionId:</b><font color="#800080"> '.$response->OriginatorTransactionId.'</font><br />';
	echo '<b>ServiceTransactionId:</b><font color="#800080"> '.$response->ServiceTransactionId.'</font><br />';
	echo '<b>OrderId:</b><font color="#800080"> '.$response->OrderId.'</font><br />';
	echo '<b>CaptureState:</b><font color="#800080"> '.$response->CaptureState.'</font><br />';
	echo '<b>TransactionState:</b><font color="#800080"> '.$response->TransactionState.'</font><br />';
	echo '<b>PaymentAccountDataToken:</b><font color="#800080"> '.$response->PaymentAccountDataToken.'</font><br />';
}
function printQueryAccountResults($response, $transactionType, $merchantProfileId)
{
	echo '<div style="text-align:center; border-width: thin; border-color: black; border-style:solid; "><h2>'.$transactionType.'</h2></div>';
	echo '<b>Merchant ProfileId:</b><font color="#800080"> '.$merchantProfileId['ProfileId'].'</font><br />';
	echo '<b>Service Name:</b><font color="#800080"> '.$merchantProfileId['ServiceName'].'</font><br />';
	echo '<b>Status:</b><font color="#800080"> '.$response->Status.'</font><br />';
	echo '<b>Status Code:</b> <font color="#800080">'.$response->StatusCode.'</font><br />';
	echo '<b>Status Message:</b><font color="#800080"> '.$response->StatusMessage.'</font><br />';
	echo '<b>Amount:</b><font color="#800080"> '.$response->Amount.'</font><br />';
	echo '<b>TransactionId:</b><font color="#800080"> '.$response->TransactionId.'</font><br />';
	echo '<b>OriginatorTransactionId:</b><font color="#800080"> '.$response->OriginatorTransactionId.'</font><br />';
	echo '<b>ServiceTransactionId:</b><font color="#800080"> '.$response->ServiceTransactionId.'</font><br />';
	echo '<b>OrderId:</b><font color="#800080"> '.$response->OrderId.'</font><br />';
	echo '<b>CaptureState:</b><font color="#800080"> '.$response->CaptureState.'</font><br />';
	echo '<b>TransactionState:</b><font color="#800080"> '.$response->TransactionState.'</font><br />';
	echo '<b>ACHCapable:</b><font color="#800080"> '.$response->ACHCapable.'</font><br />';
	echo '<b>ModifiedAccountNumber:</b><font color="#800080"> '.$response->ModifiedAccountNumber.'</font><br />';
	echo '<b>ModifiedRoutingNumber:</b><font color="#800080"> '.$response->ModifiedRoutingNumber.'</font><br />';
	echo '<b>PaymentAccountDataToken:</b><font color="#800080"> '.$response->PaymentAccountDataToken.'</font><br />';
}
function printBatchResults($response, $merchantProfileId){
	//NOTE : Please reference the developers guide for a more complete explination of the return fields
	//Note Highly recommended to save
	echo '<div style="text-align:center; border-width: thin; border-color: black; border-style:solid; "><h2>Batch Capture Results</h2></div>';
	echo '<b>Merchant ProfileId:</b><font color="#800080"> '.$merchantProfileId['ProfileId'].'</font><br />';
	echo '<b>ServiceId:</b><font color="#800080"> '.$merchantProfileId['ServiceId'].'</font><br />';
	echo '<b>Status:</b><font color="#800080"> '. $response[0]->Status.'</font><br />';

	echo '<b>TransactionId :</b><font color="#800080"> ' . $response[0]->TransactionId . '</font><br />';
	//Note Optional but recommended to save
	echo '<b>Status Code : </b><font color="#800080">' . $response[0]->StatusCode . '</font><br />';
	echo '<b>Status Message : </b><font color="#800080">' . $response[0]->StatusMessage . '</font><br />';
	//Note Optional data about the batch
	if ($response[0]->BatchId != null)
	echo '<b>Batch Id : </b><font color="#800080">' . $response[0]->BatchId . '</font><br />';
	if ($response[0]->TransactionSummaryData->CashBackTotals != null)
	echo '<b>Cash Back Totals <br />  Count : </b><font color="#800080">' . $response[0]->TransactionSummaryData->CashBackTotals->Count . '</font><br /><b>  Net Amount : $ </b><font color="#800080">' . sprintf("%0.2f",  $response[0]->TransactionSummaryData->CashBackTotals->NetAmount) . '</font><br />';
	if ($response[0]->TransactionSummaryData->NetTotals != null)
	echo '<b>Net Totals <br />  Count : </b><font color="#800080">' . $response[0]->TransactionSummaryData->NetTotals->Count . '</font><br /><b>  Net Amount : $ </b><font color="#800080">' . sprintf("%0.2f",  $response[0]->TransactionSummaryData->NetTotals->NetAmount) . '</font><br />';
	if ($response[0]->TransactionSummaryData->PINDebitReturnTotals != null)
	echo '<b>PINDebit Return Totals <br />  Count : </b><font color="#800080">' . $response[0]->TransactionSummaryData->PINDebitReturnTotals->Count . '</font><br /><b>  Net Amount : $ </b><font color="#800080">' .sprintf("%0.2f",   $response[0]->TransactionSummaryData->PINDebitReturnTotals->NetAmount) . '</font><br />';
	if ($response[0]->TransactionSummaryData->PINDebitSaleTotals != null)
	echo '<b>PINDebit Sale Totals <br />  Count : </b><font color="#800080">' . $response[0]->TransactionSummaryData->PINDebitSaleTotals->Count . '</font><br /><b>  Net Amount : $ </b><font color="#800080">' . sprintf("%0.2f",  $response[0]->TransactionSummaryData->PINDebitSaleTotals->NetAmount) . '</font><br />';
	if ($response[0]->TransactionSummaryData->ReturnTotals != null)
	echo '<b>Return Totals <br />  Count : </b><font color="#800080">' . $response[0]->TransactionSummaryData->ReturnTotals->Count . '</font><br /><b>  Net Amount : $ </b><font color="#800080">' . sprintf("%0.2f",  $response[0]->TransactionSummaryData->ReturnTotals->NetAmount) . '</font><br />';
	if ($response[0]->TransactionSummaryData->SaleTotals != null)
	echo '<b>Sale Totals <br />  Count : </b><font color="#800080">' . $response[0]->TransactionSummaryData->SaleTotals->Count . '</font><br /> <b> Net Amount : $ </b><font color="#800080">' . sprintf("%0.2f",  $response[0]->TransactionSummaryData->SaleTotals->NetAmount) . '</font><br />';
	if ($response[0]->TransactionSummaryData->VoidTotals != null)
	echo '<b>Void Totals <br />  Count : </b><font color="#800080">' . $response[0]->TransactionSummaryData->VoidTotals->Count . '</font><br /> <b> Net Amount : $ </b><font color="#800080">' . sprintf("%0.2f",  $response[0]->TransactionSummaryData->VoidTotals->NetAmount) . '</font><br />';
	
}
function printACHBatchResults($response, $merchantProfileId){
	//NOTE : Please reference the developers guide for a more complete explination of the return fields
	//Note Highly recommended to save
	echo '<div style="text-align:center; border-width: thin; border-color: black; border-style:solid; "><h2>Capture Results</h2></div>';
	echo '<b>Merchant ProfileId:</b><font color="#800080"> '.$merchantProfileId['ProfileId'].'</font><br />';
	echo '<b>Service Name:</b><font color="#800080"> '.$merchantProfileId['ServiceName'].'</font><br />';
	echo '<b>Status:</b><font color="#800080"> '. $response->Response->Status.'</font><br />';

	echo '<b>TransactionId :</b><font color="#800080"> ' . $response->Response->TransactionId . '</font><br />';
	//Note Optional but recommended to save
	echo '<b>Status Code : </b><font color="#800080">' . $response->Response->StatusCode . '</font><br />';
	echo '<b>Status Message : </b><font color="#800080">' . $response->Response->StatusMessage . '</font><br />';
	//Note Optional data about the batch
	if ($response->Response->BatchId != null)
	echo '<b>Batch Id : </b><font color="#800080">' . $response->Response->BatchId . '</font><br />';
	if ($response->Response->SummaryData->CashBackTotals instanceof SummaryTotals)
	echo '<b>Cash Back Totals <br /> -     Count : </b><font color="#800080">' . $response->Response->SummaryData->CashBackTotals->Count . '</font><br /><b>  -     Net Amount : </b><font color="#800080">' . $response->Response->SummaryData->CashBackTotals->NetAmount . '</font><br />';
	if ($response->Response->SummaryData->CreditReturnTotals instanceof SummaryTotals)
	echo '<b>Credit Return Totals <br /> -     Count : </b><font color="#800080">' . $response->Response->SummaryData->CreditReturnTotals->Count . '</font><br /><b>  -     Net Amount : </b><font color="#800080">' . $response->Response->SummaryData->CreditReturnTotals->NetAmount . '</font><br />';
	if ($response->Response->SummaryData->CreditTotals instanceof SummaryTotals)
	echo '<b>Credit Totals <br /> -     Count : </b><font color="#800080">' . $response->Response->SummaryData->NetTotals->Count . '</font><br /><b>  -     Net Amount : </b><font color="#800080">' . $response->Response->SummaryData->NetTotals->NetAmount . '</font><br />';
	if ($response->Response->SummaryData->DebitReturnTotals instanceof SummaryTotals)
	echo '<b>Debit Return Totals <br /> -     Count : </b><font color="#800080">' . $response->Response->SummaryData->DebitReturnTotals->Count . '</font><br /><b>  -     Net Amount : </b><font color="#800080">' . $response->Response->SummaryData->DebitReturnTotals->NetAmount . '</font><br />';
	if ($response->Response->SummaryData->DebitTotals instanceof SummaryTotals)
	echo '<b>Debit Totals <br /> -     Count : </b><font color="#800080">' . $response->Response->SummaryData->DebitTotals->Count . '</font><br /><b>  -     Net Amount : </b><font color="#800080">' . $response->Response->SummaryData->DebitTotals->NetAmount . '</font><br />';
	if ($response->Response->SummaryData->NetTotals instanceof SummaryTotals)
	echo '<b>Net Totals <br /> -     Count : </b><font color="#800080">' . $response->Response->SummaryData->NetTotals->Count . '</font><br /><b>  -     Net Amount : </b><font color="#800080">' . $response->Response->SummaryData->NetTotals->NetAmount . '</font><br />';
	if ($response->Response->SummaryData->VoidTotals instanceof SummaryTotals)
	echo '<b>Void Totals <br /> -     Count : </b><font color="#800080">' . $response->Response->SummaryData->VoidTotals->Count . '</font><br /> <b> -     Net Amount : </b><font color="#800080">' . $response->Response->SummaryData->VoidTotals->NetAmount . '</font><br />';

}
function printTransactionDetailInformation($response)
{
	//NOTE : Please reference the developers guide for a more complete explination of the return fields
	//Note Highly recommended to save
	echo '<div style="text-align:center; border-width: thin; border-color: black; border-style:solid; "><h2>Summary Detail for TransactionId: '.$response->CompleteTransaction->CWSTransaction->MetaData->TransactionId.'</h2></div>';
	if ($response->CompleteTransaction->CWSTransaction != null){
		echo '<b>     CWSTransaction:</b><br />';
		echo '<b>     - ApplicationData:</b><br />';
		echo '<b>     -- ApplicationAttended:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->ApplicationData->ApplicationAttended.'</font><br />';
		echo '<b>     -- ApplicationLocation:</b><font color="#800080"> '.$response->CompleteTransaction->CWSTransaction->ApplicationData->ApplicationLocation.'</font><br />';
		echo '<b>     -- ApplicationName:</b><font color="#800080"> '.$response->CompleteTransaction->CWSTransaction->ApplicationData->ApplicationName.'</font><br />';
		echo '<b>     -- DeveloperId:</b><font color="#800080"> '.$response->CompleteTransaction->CWSTransaction->ApplicationData->DeveloperId.'</font><br />';
		echo '<b>     -- HardwareType:</b><font color="#800080"> '.$response->CompleteTransaction->CWSTransaction->ApplicationData->HardwareType.'</font><br />';
		echo '<b>     -- PINCapability:</b><font color="#800080"> '.$response->CompleteTransaction->CWSTransaction->ApplicationData->PINCapability.'</font><br />';
		echo '<b>     -- PTLSSocketId:</b><font color="#800080"> '.$response->CompleteTransaction->CWSTransaction->ApplicationData->PTLSSocketId.'</font><br />';
		echo '<b>     -- ReadCapability:</b><font color="#800080"> '.$response->CompleteTransaction->CWSTransaction->ApplicationData->ReadCapability.'</font><br />';
		echo '<b>     -- SerialNumber:</b><font color="#800080"> '.$response->CompleteTransaction->CWSTransaction->ApplicationData->SerialNumber.'</font><br />';
		echo '<b>     -- SoftwareVersion:</b><font color="#800080"> '.$response->CompleteTransaction->CWSTransaction->ApplicationData->SoftwareVersion.'</font><br />';
		echo '<b>     -- SoftwareVersionDate:</b><font color="#800080"> '.$response->CompleteTransaction->CWSTransaction->ApplicationData->SoftwareVersionDate.'</font><br />';
		echo '<b>     -- VendorId:</b><font color="#800080"> '.$response->CompleteTransaction->CWSTransaction->ApplicationData->VendorId.'</font><br />';

		echo '<b>     - MerchantProfile Data:</b><br />';
		echo '<b>     -- CustomerServiceInternet:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->CustomerServiceInternet.'</font><br />';
		echo '<b>     -- CustomerServicePhone:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->CustomerServicePhone.'</font><br />';
		echo '<b>     -- Language:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->Language.'</font><br />';
		echo '<b>     -- Address:</b><br />';
		echo '<b>     --- Street1:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->Address->Street1.'</font><br />';
		echo '<b>     --- Street2:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->Address->Street2.'</font><br />';
		echo '<b>     --- City:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->Address->City.'</font><br />';
		echo '<b>     --- StateProvince:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->Address->StateProvince.'</font><br />';
		echo '<b>     --- PostalCode:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->Address->PostalCode.'</font><br />';
		echo '<b>     --- CountryCode:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->Address->CountryCode.'</font><br />';

		echo '<b>     -- MerchantId:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->MerchantId.'</font><br />';
		echo '<b>     -- MerchantName:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->Name.'</font><br />';
		echo '<b>     -- Phone:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->Phone.'</font><br />';
		echo '<b>     -- TaxId:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->TaxId.'</font><br />';

		echo '<b>     -- BankcardMerchantData:</b><br />';
		echo '<b>     --- ABANumber:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->ABANumber.'</font><br />';
		echo '<b>     --- AcquirerBIN:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->AcquirerBIN.'</font><br />';
		echo '<b>     --- AgentBank:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->AgentBank.'</font><br />';
		echo '<b>     --- AgentChain:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->AgentChain.'</font><br />';
		echo '<b>     --- Aggregator:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->Aggregator.'</font><br />';
		echo '<b>     --- ClientNumber:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->ClientNumber.'</font><br />';
		echo '<b>     --- IndustryType:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->IndustryType.'</font><br />';
		echo '<b>     --- Location:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->Location.'</font><br />';
		echo '<b>     --- MerchantType:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->MerchantType.'</font><br />';
		echo '<b>     --- PrintCustomerServicePhone:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->PrintCustomerServicePhone.'</font><br />';
		echo '<b>     --- QualificationCodes:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->QualificationCodes.'</font><br />';
		echo '<b>     --- ReimbursementAttribute:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->ReimbursementAttribute.'</font><br />';
		echo '<b>     --- SIC:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->SIC.'</font><br />';
		echo '<b>     --- SecondaryTerminalId:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->SecondaryTerminalId.'</font><br />';
		echo '<b>     --- SettlementAgent:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->SettlementAgent.'</font><br />';
		echo '<b>     --- SharingGroup:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->SharingGroup.'</font><br />';
		echo '<b>     --- StoreId:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->StoreId.'</font><br />';
		echo '<b>     --- TerminalId:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->TerminalId.'</font><br />';
		echo '<b>     --- TimeZoneDifferential:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MerchantProfileMerchantData->BankcardMerchantData->TimeZoneDifferential.'</font><br />';

		echo '<b>     - Meta Data:</b><br />';
		echo '<b>     -- Amount:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MetaData->Amount.'</font><br />';
		echo '<b>     -- CardType:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MetaData->CardType.'</font><br />';
		echo '<b>     -- MaskedPAN:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MetaData->MaskedPAN.'</font><br />';
		echo '<b>     -- MaskedPAN:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MetaData->MaskedPAN.'</font><br />';
		echo '<b>     -- MaskedPAN:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MetaData->MaskedPAN.'</font><br />';
		echo '<b>     -- TransactionClassTypePair:</b><br />';
		echo '<b>     --- Street1:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MetaData->TransactionClassTypePair->TransactionClass.'</font><br />';
		echo '<b>     --- Street2:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MetaData->TransactionClassTypePair->TransactionType.'</font><br />';
		echo '<b>     -- TransactionDateTime:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MetaData->TransactionDateTime.'</font><br />';
		echo '<b>     -- TransactionId:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MetaData->TransactionId.'</font><br />';
		echo '<b>     -- TransactionState:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MetaData->TransactionState.'</font><br />';
		echo '<b>     -- WorkflowId:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->MetaData->WorkflowId.'</font><br />';

		echo '<b>     - <br />Transaction Response:</b><br />';
		echo '<b>     -- Status:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->Status.'</font><br />';
		echo '<b>     -- StatusCode:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->StatusCode.'</font><br />';
		echo '<b>     -- StatusMessage:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->StatusMessage.'</font><br />';
		echo '<b>     -- TransactionId:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->TransactionId.'</font><br />';
		echo '<b>     -- OriginatorTransactionId:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->OriginatorTransactionId.'</font><br />';
		echo '<b>     -- ServiceTransactionId:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->ServiceTransactionId.'</font><br />';
		echo '<b>     -- ServiceTransactionDateTime:</b><br />';
		echo '<b>     --- Date:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->ServiceTransactionDateTime->Date.'</font><br />';
		echo '<b>     --- Time:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->ServiceTransactionDateTime->Time.'</font><br />';
		echo '<b>     --- TimeZone:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->ServiceTransactionDateTime->TimeZone.'</font><br />';

		echo '<b>     -- CaptureState:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->CaptureState.'</font><br />';
		echo '<b>     -- TransactionState:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->TransactionState.'</font><br />';
		echo '<b>     -- Amount:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->Amount.'</font><br />';
		echo '<b>     -- CardType:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->CardType.'</font><br />';
		echo '<b>     -- FeeAmount:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->FeeAmount.'</font><br />';
		echo '<b>     -- ApprovalCode:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->ApprovalCode.'</font><br />';
		if ($response->CompleteTransaction->CWSTransaction->Response->AVSResult != null){
			echo '<b>     -- AVSResult:</b><br />';
			echo '<b>     --- ActualResult:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->AVSResult->ActualResult.'</font><br />';
			echo '<b>     --- AddressResult:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->AVSResult->AddressResult.'</font><br />';
			echo '<b>     --- PostalCodeResult:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->AVSResult->PostalCodeResult.'</font><br />';
		}
		echo '<b>     -- BatchId:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->BatchId.'</font><br />';
		echo '<b>     -- CVResult:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->CVResult.'</font><br />';
		echo '<b>     -- CardLevel:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->CardLevel.'</font><br />';
		echo '<b>     -- DowngradeCode:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->DowngradeCode.'</font><br />';
		echo '<b>     -- MaskedPAN:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->MaskedPAN.'</font><br />';
		echo '<b>     -- PaymentAccountDataToken:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->PaymentAccountDataToken.'</font><br />';
		echo '<b>     -- RetrievalReferenceNumber:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->RetrievalReferenceNumber.'</font><br />';
		echo '<b>     -- Resubmit:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->Resubmit.'</font><br />';
		echo '<b>     -- SettlementDate:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->SettlementDate.'</font><br />';
		echo '<b>     -- FinalBalance:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->FinalBalance.'</font><br />';
		echo '<b>     -- OrderId:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->OrderId.'</font><br />';
		echo '<b>     -- AdviceResponse:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->AdviceResponse.'</font><br />';
		echo '<b>     -- CommercialCardResponse:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->CommercialCardResponse.'</font><br />';
		echo '<b>     -- ReturnedACI:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Response->ReturnedACI.'</font><br />';

		echo '<b>     - <br />Transaction Request:</b><br />';
		echo '<b>     -- TenderData:</b><br />';
		echo '<b>     --- PaymentAccountDataToken:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TenderData->PaymentAccountDataToken.'</font><br />';
		echo '<b>     --- PaymentAccountDataToken:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TenderData->PaymentAccountDataToken.'</font><br />';
		echo '<b>     --- CardData:</b><br />';
		echo '<b>     ---- CardType:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TenderData->CardData->CardType.'</font><br />';
		echo '<b>     ---- CardholderName:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TenderData->CardData->CardholderName.'</font><br />';
		echo '<b>     ---- PAN:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TenderData->CardData->PAN.'</font><br />';
		echo '<b>     ---- Expire:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TenderData->CardData->Expire.'</font><br />';

		echo '<b>     -- <br />TransactionData:</b><br />';
		echo '<b>     --- Amount:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->Amount.'</font><br />';
		echo '<b>     --- TransactionDateTime:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->TransactionDateTime.'</font><br />';
		echo '<b>     --- AccountType:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->AccountType.'</font><br />';
		echo '<b>     --- AlternativeMerchantData:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->AlternativeMerchantData.'</font><br />';
		echo '<b>     --- ApprovalCode:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->ApprovalCode.'</font><br />';
		echo '<b>     --- CashBackAmount:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->CashBackAmount.'</font><br />';
		echo '<b>     --- CustomerPresent:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->CustomerPresent.'</font><br />';
		echo '<b>     --- EmployeeId:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->EmployeeId.'</font><br />';
		echo '<b>     --- EntryMode:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->EntryMode.'</font><br />';
		echo '<b>     --- GoodsType:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->GoodsType.'</font><br />';		
		echo '<b>     --- InternetTransactionData:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->InternetTransactionData.'</font><br />';
		echo '<b>     --- InvoiceNumber:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->InvoiceNumber.'</font><br />';
		echo '<b>     --- OrderNumber:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->OrderNumber.'</font><br />';
		echo '<b>     --- IsPartialShipment:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->IsPartialShipment.'</font><br />';
		echo '<b>     --- SignatureCaptured:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->SignatureCaptured.'</font><br />';
		echo '<b>     --- TerminalId:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->TerminalId.'</font><br />';
		echo '<b>     --- TipAmount:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->TipAmount.'</font><br />';
		echo '<b>     --- BatchAssignment:</b><font color="#800080"> '. $response->CompleteTransaction->CWSTransaction->Transaction->TransactionData->BatchAssignment.'</font><br />';
	}
	else if ($response->CompleteTransaction->SerializedTransaction != null)
	{
		echo '<b>     SerializedTransaction:</b><br />';
		echo '<b>     -- CWSTransaction:</b><font color="#800080"> '. $response->CompleteTransaction->SerializedTransaction.'</font><br />';	
	}
		echo '<b>     - <br />Family Information:</b><br />';
		echo '<b>     -- FamilyId:</b><font color="#800080"> '. $response->FamilyInformation->FamilyId.'</font><br />';
		echo '<b>     -- FamilySequenceCount:</b><font color="#800080"> '. $response->FamilyInformation->FamilySequenceCount.'</font><br />';
		echo '<b>     -- FamilySequenceNumber:</b><font color="#800080"> '. $response->FamilyInformation->FamilySequenceNumber.'</font><br />';
		echo '<b>     -- FamilyState:</b><font color="#800080"> '. $response->FamilyInformation->FamilyState.'</font><br />';
		echo '<b>     -- NetAmount:</b><font color="#800080"> '. $response->FamilyInformation->NetAmount.'</font><br />';

		echo '<b>     - <br />Transaction Information:</b><br />'; 
		echo '<b>     -- Amount:</b><font color="#800080"> '. $response->TransactionInformation->Amount.'</font><br />';
		echo '<b>     -- ApprovalCode:</b><font color="#800080"> '. $response->TransactionInformation->ApprovalCode.'</font><br />';
		echo '<b>     -- <br />BankcardData:</b><br />';

		if ($response->TransactionInformation->BankcardData->AVSResult != null){
			echo '<b>     -- AVSResult:</b><br />';
			echo '<b>     --- ActualResult:</b><font color="#800080"> '. $response->TransactionInformation->BankcardData->AVSResult->ActualResult.'</font><br />';
			echo '<b>     --- AddressResult:</b><font color="#800080"> '. $response->TransactionInformation->BankcardData->AVSResult->AddressResult.'</font><br />';
			echo '<b>     --- PostalCodeResult:</b><font color="#800080"> '. $response->TransactionInformation->BankcardData->AVSResult->PostalCodeResult.'</font><br />';
		}
		echo '<b>     --- CVResult:</b><font color="#800080"> '. $response->TransactionInformation->BankcardData->CVResult.'</font><br />';
		echo '<b>     --- CardType:</b><font color="#800080"> '. $response->TransactionInformation->BankcardData->CardType.'</font><br />';
		echo '<b>     -- BatchId:</b><font color="#800080"> '. $response->TransactionInformation->BatchId.'</font><br />';
		echo '<b>     -- CaptureDateTime:</b><font color="#800080"> '. $response->TransactionInformation->CaptureDateTime.'</font><br />';
		echo '<b>     -- CaptureState:</b><font color="#800080"> '. $response->TransactionInformation->CaptureState.'</font><br />';
		echo '<b>     -- CaptureStatusMessage:</b><font color="#800080"> '. $response->TransactionInformation->CaptureStatusMessage.'</font><br />';
		echo '<b>     -- CapturedAmount:</b><font color="#800080"> '. $response->TransactionInformation->CapturedAmount.'</font><br />';
		echo '<b>     -- CustomerId:</b><font color="#800080"> '. $response->TransactionInformation->CustomerId.'</font><br />';
		echo '<b>     -- CustomerId:</b><font color="#800080"> '. $response->TransactionInformation->CaptureState.'</font><br />';
		echo '<b>     -- ElectronicCheckData:</b><font color="#800080"> '. $response->TransactionInformation->ElectronicCheckData.'</font><br />';
		echo '<b>     -- IsAcknowledged:</b><font color="#800080"> '. $response->TransactionInformation->IsAcknowledged.'</font><br />';
		echo '<b>     -- MaskedPAN:</b><font color="#800080"> '. $response->TransactionInformation->MaskedPAN.'</font><br />';
		echo '<b>     -- MerchantProfileId:</b><font color="#800080"> '. $response->TransactionInformation->MerchantProfileId.'</font><br />';
		echo '<b>     -- OriginatorTransactionId:</b><font color="#800080"> '. $response->TransactionInformation->OriginatorTransactionId.'</font><br />';
		echo '<b>     -- ServiceId:</b><font color="#800080"> '. $response->TransactionInformation->ServiceId.'</font><br />';
		echo '<b>     -- ServiceKey:</b><font color="#800080"> '. $response->TransactionInformation->ServiceKey.'</font><br />';
		echo '<b>     -- ServiceTransactionId:</b><font color="#800080"> '. $response->TransactionInformation->ServiceTransactionId.'</font><br />';
		echo '<b>     -- Status:</b><font color="#800080"> '. $response->TransactionInformation->Status.'</font><br />';
		echo '<b>     -- TransactionClassTypePair:</b><br />';
		echo '<b>     --- TransactionClass:</b><font color="#800080"> '. $response->TransactionInformation->TransactionClassTypePair->TransactionClass.'</font><br />';
		echo '<b>     --- TransactionType:</b><font color="#800080"> '. $response->TransactionInformation->TransactionClassTypePair->TransactionType.'</font><br />';
		echo '<b>     -- TransactionId:</b><font color="#800080"> '. $response->TransactionInformation->TransactionId.'</font><br />';
		echo '<b>     -- TransactionState:</b><font color="#800080"> '. $response->TransactionInformation->TransactionState.'</font><br />';
		echo '<b>     -- TransactionStatusCode:</b><font color="#800080"> '. $response->TransactionInformation->TransactionStatusCode.'</font><br />';
		echo '<b>     -- TransactionTimestamp:</b><font color="#800080"> '. $response->TransactionInformation->TransactionTimestamp.'</font><br />';
	

}

function printFamilyDetailInformation($response)
{
	//NOTE : Please reference the developers guide for a more complete explination of the return fields
	//Note Highly recommended to save
	echo '<div style="text-align:center; border-width: thin; border-color: black; border-style:solid; "><h2>Summary Detail FamilyId: '.$response->FamilyId.'</h2></div>';
	echo '<b>     BatchId:</b><font color="#800080"> '. $response->BatchId.'</font><br />';
	echo '<b>     CaptureDateTime:</b><font color="#800080"> '. $response->CaptureDateTime.'</font><br />';
	echo '<b>     CapturedAmount:</b><font color="#800080"> '. $response->CapturedAmount.'</font><br />';
	echo '<b>     CustomerId:</b><font color="#800080"> '. $response->CustomerId.'</font><br />';
	echo '<b>     FamilyState:</b><font color="#800080"> '. $response->FamilyState.'</font><br />';
	echo '<b>     LastAuthorizedAmount:</b><font color="#800080"> '. $response->LastAuthorizedAmount.'</font><br />';
	echo '<b>     MerchantProfileId:</b><font color="#800080"> '. $response->MerchantProfileId.'</font><br />';
	echo '<b>     NetAmount:</b><font color="#800080"> '. $response->NetAmount.'</font><br />';
	echo '<b>     ServiceKey:</b><font color="#800080"> '. $response->ServiceKey.'</font><br />';

	echo '<b>TransactionIds:</b><br />';
	if (is_array($response->TransactionIds->string))
	{
		foreach( $response->TransactionIds->string as $string)
		echo '<b>     --- TransactionId:</b><font color="#800080"> '. $string.'</font><br />';
	}
	else
	echo '<b>     --- TransactionId:</b><font color="#800080"> '. $response->TransactionIds->string.'</font><br />';
	echo '<b>     FamilyId:</b><font color="#800080"> '. $response->FamilyId.'</font><br />';
	echo '<b><br />Family Transaction Meta Data</b><br />';
	if (is_array($response->TransactionMetaData->TransactionMetaData))
	{
		foreach( $response->TransactionMetaData->TransactionMetaData as $TransactionMetaData)
		{
			echo '<b>     <br />TransactionMetaData:</b><br />';
			echo '<b>     -   Amount:</b><font color="#800080"> '. $TransactionMetaData->Amount.'</font><br />';
			echo '<b>     -   CardType:</b><font color="#800080"> '. $TransactionMetaData->CardType.'</font><br />';
			echo '<b>     -   MaskedPAN:</b><font color="#800080"> '. $TransactionMetaData->MaskedPAN.'</font><br />';
			echo '<b>     -   SequenceNumber:</b><font color="#800080"> '. $TransactionMetaData->SequenceNumber.'</font><br />';
			echo '<b>     -   ServiceId:</b><font color="#800080"> '. $TransactionMetaData->ServiceId.'</font><br />';
			echo '<b>     -   TransactionClass:</b><font color="#800080"> '. $TransactionMetaData->TransactionClassTypePair->TransactionClass.'</font><br />';
			echo '<b>     -   TransactionType:</b><font color="#800080"> '. $TransactionMetaData->TransactionClassTypePair->TransactionType.'</font><br />';
			echo '<b>     -   TransactionDateTime:</b><font color="#800080"> '. $TransactionMetaData->TransactionDateTime.'</font><br />';
			echo '<b>     -   TransactionId:</b><font color="#800080"> '. $TransactionMetaData->TransactionId.'</font><br />';
			echo '<b>     -   TransactionState:</b><font color="#800080"> '. $TransactionMetaData->TransactionState.'</font><br />';
			echo '<b>     -   WorkflowId:</b><font color="#800080"> '. $TransactionMetaData->WorkflowId.'</font><br />';
			echo '<b>----------------------------------------------------------------------------------------<br />';
		}
	}

	else
	{
		echo '<b>     TransactionMetaData:</b><br />';
		echo '<b>     -   Amount:</b><font color="#800080"> '. $response->TransactionMetaData->TransactionMetaData->Amount.'</font><br />';
		echo '<b>     -   CardType:</b><font color="#800080"> '. $response->TransactionMetaData->TransactionMetaData->CardType.'</font><br />';
		echo '<b>     -   MaskedPAN:</b><font color="#800080"> '. $response->TransactionMetaData->TransactionMetaData->MaskedPAN.'</font><br />';
		echo '<b>     -   SequenceNumber:</b><font color="#800080"> '. $response->TransactionMetaData->TransactionMetaData->SequenceNumber.'</font><br />';
		echo '<b>     -   ServiceId:</b><font color="#800080"> '. $response->TransactionMetaData->TransactionMetaData->ServiceId.'</font><br />';
		echo '<b>     -   TransactionClass:</b><font color="#800080"> '. $response->TransactionMetaData->TransactionMetaData->TransactionClassTypePair->TransactionClass.'</font><br />';
		echo '<b>     -   TransactionType:</b><font color="#800080"> '. $response->TransactionMetaData->TransactionMetaData->TransactionClassTypePair->TransactionType.'</font><br />';
		echo '<b>     -   TransactionDateTime:</b><font color="#800080"> '. $response->TransactionMetaData->TransactionMetaData->TransactionDateTime.'</font><br />';
		echo '<b>     -   TransactionId:</b><font color="#800080"> '. $response->TransactionMetaData->TransactionMetaData->TransactionId.'</font><br />';
		echo '<b>     -   TransactionState:</b><font color="#800080"> '. $response->TransactionMetaData->TransactionMetaData->TransactionState.'</font><br />';
		echo '<b>     -   WorkflowId:</b><font color="#800080"> '. $response->TransactionMetaData->TransactionMetaData->WorkflowId.'</font><br />';
	}


}

function printSummaryDetailInformation($response)
{
	//NOTE : Please reference the developers guide for a more complete explination of the return fields
	//Note Highly recommended to save
	echo '<div style="text-align:center; border-width: thin; border-color: black; border-style:solid; "><h2>Transaction Summary Detail: '.$response->TransactionInformation->TransactionId.'</h2></div>';
	echo '<b>Family Information</b><br />';
	echo '<b>     FamilyId:</b><font color="#800080"> '. $response->FamilyInformation->FamilyId.'</font><br />';
	echo '<b>     FamilySequenceCount:</b><font color="#800080"> '. $response->FamilyInformation->FamilySequenceCount.'</font><br />';
	echo '<b>     FamilySequenceNumber:</b><font color="#800080"> '. $response->FamilyInformation->FamilySequenceNumber.'</font><br />';
	echo '<b>     FamilyState:</b><font color="#800080"> '. $response->FamilyInformation->FamilyState.'</font><br />';
	echo '<b>     NetAmount:</b><font color="#800080"> '. $response->FamilyInformation->NetAmount.'</font><br /><br />';

	echo '<b>Transaction Information</b><br />';
	echo '<b>     TransactionId:</b><font color="#800080"> '. $response->TransactionInformation->TransactionId.'</font><br />';
	echo '<b>     Amount:</b><font color="#800080"> '. $response->TransactionInformation->Amount.'</font><br />';
	echo '<b>     ApprovalCode:</b><font color="#800080"> '. $response->TransactionInformation->ApprovalCode.'</font><br />';
	echo '<b>     AVS ActualResult:</b><font color="#800080"> '. $response->TransactionInformation->BankcardData->AVSResult->ActualResult.'</font><br />';
	echo '<b>     AVS AddressResult:</b><font color="#800080"> '. $response->TransactionInformation->BankcardData->AVSResult->AddressResult.'</font><br />';
	echo '<b>     AVS PostalCodeResult:</b><font color="#800080"> '. $response->TransactionInformation->BankcardData->AVSResult->PostalCodeResult.'</font><br />';
	echo '<b>     CVResult:</b><font color="#800080"> '. $response->TransactionInformation->BankcardData->CVResult.'</font><br />';
	echo '<b>     CardType:</b><font color="#800080"> '. $response->TransactionInformation->BankcardData->CardType.'</font><br />';
	echo '<b>     BatchId:</b><font color="#800080"> '. $response->TransactionInformation->BatchId.'</font><br />';
	echo '<b>     CaptureDateTime:</b><font color="#800080"> '. $response->TransactionInformation->CaptureDateTime.'</font><br />';
	echo '<b>     CaptureState:</b><font color="#800080"> '. $response->TransactionInformation->CaptureState.'</font><br />';
	echo '<b>     CaptureStatusMessage:</b><font color="#800080"> '. $response->TransactionInformation->CaptureStatusMessage.'</font><br />';
	echo '<b>     CapturedAmount:</b><font color="#800080"> '. $response->TransactionInformation->CapturedAmount.'</font><br />';
	echo '<b>     MaskedPAN:</b><font color="#800080"> '. $response->TransactionInformation->MaskedPAN.'</font><br />';
	echo '<b>     MerchantProfileId:</b><font color="#800080"> '. $response->TransactionInformation->MerchantProfileId.'</font><br />';
	echo '<b>     OriginatorTransactionId:</b><font color="#800080"> '. $response->TransactionInformation->OriginatorTransactionId.'</font><br />';
	echo '<b>     ServiceId:</b><font color="#800080"> '. $response->TransactionInformation->ServiceId.'</font><br />';
	echo '<b>     ServiceKey:</b><font color="#800080"> '. $response->TransactionInformation->ServiceKey.'</font><br />';
	echo '<b>     ServiceTransactionId:</b><font color="#800080"> '. $response->TransactionInformation->ServiceTransactionId.'</font><br />';
	echo '<b>     Status:</b><font color="#800080"> '. $response->TransactionInformation->Status.'</font><br />';
	echo '<b>     TransactionClassTypePair:</b><br />';
	echo '<b>          TransactionClass:</b><font color="#800080"> '. $response->TransactionInformation->TransactionClassTypePair->TransactionClass.'</font><br />';
	echo '<b>          TransactionType:</b><font color="#800080"> '. $response->TransactionInformation->TransactionClassTypePair->TransactionType.'</font><br />';
	echo '<b>     TransactionState:</b><font color="#800080"> '. $response->TransactionInformation->TransactionState.'</font><br />';
	echo '<b>     TransactionStatusCode:</b><font color="#800080"> '. $response->TransactionInformation->TransactionStatusCode.'</font><br />';
	echo '<b>     TransactionTimestamp:</b><font color="#800080"> '. $response->TransactionInformation->TransactionTimestamp.'</font><br />';
}
/*
 *
 * Function to parse the GetMerchantProfilesResult
 *
 */
function printMerchantProfiles($MerchantProfiles) {

	echo '<h2><b>Merchant ProfileId:</b><font color="#800080"> ' . $MerchantProfiles->ProfileId . '</font></h2>';
	echo '<b>LastUpdated:</b><font color="#800080"> ' . $MerchantProfiles->LastUpdated . '</font><br />';
	echo '<b>ServiceId:</b><font color="#800080"> ' . $MerchantProfiles->ServiceId . '</font><br />';
	echo '<b>ServiceName:</b><font color="#800080"> ' . $MerchantProfiles->ServiceName . '</font><br />';
	echo '<h3><b>Bankcard Merchant Data: </h3>';
	echo '<b>Merchant Name:</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Name . '</font><br />';
	echo '<b>Merchant ID:</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->MerchantId . '</font><br />';
	echo '<b>Merchant Address: </font><br />';
	echo '<b><ul><li>Street  :</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Address->Street1 . '</font><br />';
	echo '<b><li>Street 2:</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Address->Street2 . '</font><br />';
	echo '<b><li>City    :</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Address->City . '</font><br />';
	echo '<b><li>State   :</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Address->StateProvince . '</font><br />';
	echo '<b><li>Postal  :</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Address->PostalCode . '</font><br />';
	echo '<b><li>Country :</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Address->CountryCode . '</font><br /></ul>';
	echo '<b>Merchant Phone:</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Phone . '</font><br />';
	echo '<b>Customer Service Phone:</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->CustomerServicePhone . '</font><br />';
	echo '<b>Customer Service Internet:</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->CustomerServiceInternet . '</font><br />';
	echo '<b>Language:</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Language . '</font><br />';
	if ($MerchantProfiles->MerchantData->TaxId != '')
	echo '<b>Tax Id:</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->TaxId . '</font><br />';
	if ($MerchantProfiles->MerchantData->BankcardMerchantData->AcquirerBIN != '')
	echo '<b>AcquirerBIN:  </b><font color="#800080">	 	 ' . $MerchantProfiles->MerchantData->BankcardMerchantData->AcquirerBIN . '</font><br />';
	if ($MerchantProfiles->MerchantData->BankcardMerchantData->AgentBank != '')
	echo '<b>AgentBank: 	</b><font color="#800080">			 ' . $MerchantProfiles->MerchantData->BankcardMerchantData->AgentBank . '</font><br />';
	if ($MerchantProfiles->MerchantData->BankcardMerchantData->ClientNumber != '')
	echo '<b>ClientNumber:   </b><font color="#800080"> 			 ' . $MerchantProfiles->MerchantData->BankcardMerchantData->ClientNumber . '</font><br />';
	if ($MerchantProfiles->MerchantData->BankcardMerchantData->Location != '')
	echo '<b>Location:   	</b><font color="#800080">			 ' . $MerchantProfiles->MerchantData->BankcardMerchantData->Location . '</font><br />';
	if ($MerchantProfiles->MerchantData->BankcardMerchantData->PrintCustomerServicePhone != '')
	echo '<b>PrintCustomerServicePhone:</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->BankcardMerchantData->PrintCustomerServicePhone . '</font><br />';
	echo '<b>SIC: 			</b><font color="#800080">			 ' . $MerchantProfiles->MerchantData->BankcardMerchantData->SIC . '</font><br />';
	echo '<b>TerminalId:   	</b><font color="#800080">		 ' . $MerchantProfiles->MerchantData->BankcardMerchantData->TerminalId . '</font><br />';
	if ($MerchantProfiles->MerchantData->BankcardMerchantData->SecondaryTerminalId != '')
	echo '<b>SecondaryTerminalId:  </b><font color="#800080">	 ' . $MerchantProfiles->MerchantData->BankcardMerchantData->SecondaryTerminalId . '</font><br />';
	if ($MerchantProfiles->MerchantData->BankcardMerchantData->StoreId != '')
	echo '<b>StoreId:				</b><font color="#800080">	 ' . $MerchantProfiles->MerchantData->BankcardMerchantData->StoreId . '</font><br />';
	if ($MerchantProfiles->MerchantData->BankcardMerchantData->TimeZoneDifferential != '')
	echo '<b>TimeZoneDifferential:	</b><font color="#800080">     ' . $MerchantProfiles->MerchantData->BankcardMerchantData->TimeZoneDifferential . '</font><br />';

	echo '<b><h3>Merchant Transaction Data:</h3>';
	echo '<b>CreditTransactionData:';
	echo '<b><ul><li>CurrencyCode:  </b><font color="#800080">  ' . $MerchantProfiles->TransactionData->BankcardTransactionDataDefaults->CurrencyCode . '</font><br />';
	echo '<b><li>CustomerPresent:</b><font color="#800080"> ' . $MerchantProfiles->TransactionData->BankcardTransactionDataDefaults->CustomerPresent . '</font><br />';
	echo '<b><li>RequestACI    :</b><font color="#800080"> ' . $MerchantProfiles->TransactionData->BankcardTransactionDataDefaults->RequestACI . '</font><br />';
	echo '<b><li>RequestAdvice    :</b><font color="#800080"> ' . $MerchantProfiles->TransactionData->BankcardTransactionDataDefaults->RequestAdvice . '</font></ul>';

}

/*
 *
 * Function to parse the GetMerchantProfilesResult
 *
 */
function printACHMerchantProfiles($MerchantProfiles) {

	echo '<h2><b>Merchant ProfileId:</b><font color="#800080"> ' . $MerchantProfiles->ProfileId . '</font></h2>';
	echo '<b>LastUpdated:</b><font color="#800080"> ' . $MerchantProfiles->LastUpdated . '</font><br />';
	echo '<b>ServiceId:</b><font color="#800080"> ' . $MerchantProfiles->ServiceId . '</font><br />';
	echo '<b>ServiceName:</b><font color="#800080"> ' .  $MerchantProfiles->ServiceName . '</font><br />';
	echo '<h3><b>ACH Merchant Data: </h3>';
	echo '<b>Merchant Name:</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Name . '</font><br />';
	echo '<b>Merchant Address: </font><br />';
	echo '<b><ul><li>Street  :</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Address->Street1 . '</font><br />';
	echo '<b><li>Street 2:</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Address->Street2 . '</font><br />';
	echo '<b><li>City    :</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Address->City . '</font><br />';
	echo '<b><li>State   :</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Address->StateProvince . '</font><br />';
	echo '<b><li>Postal  :</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Address->PostalCode . '</font><br />';
	echo '<b><li>Country :</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Address->CountryCode . '</font><br /></ul>';
	echo '<b>Merchant Phone:</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Phone . '</font><br />';
	echo '<b>Customer Service Phone:</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->CustomerServicePhone . '</font><br />';
	echo '<b>Customer Service Internet:</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->CustomerServiceInternet . '</font><br />';
	echo '<b>Language:</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->Language . '</font><br />';
	if ($MerchantProfiles->MerchantData->TaxId != '')
	echo '<b>Tax Id:</b><font color="#800080"> ' . $MerchantProfiles->MerchantData->TaxId . '</font><br />';

	echo '<b>OriginatorId:  </b><font color="#800080">	 	 ' . $MerchantProfiles->MerchantData->ElectronicCheckingMerchantData->OrginatorId . '</font><br />';
	echo '<b>ProductId: 	</b><font color="#800080">			 ' . $MerchantProfiles->MerchantData->ElectronicCheckingMerchantData->ProductId . '</font><br />';
	echo '<b>SiteId:   </b><font color="#800080"> 			 ' . $MerchantProfiles->MerchantData->ElectronicCheckingMerchantData->SiteId . '</font><br />';

}

function generate_xml_from_array($array, $node_name) {
	$xml = '';
	
	if (is_array($array) || is_object($array)) {
		foreach ($array as $key=>$value) {
			if (is_numeric($key)) {
				$key = $node_name;
			}
			
			$xml .= '<' . $key . '>' . generate_xml_from_array($value, $node_name) . '</' . $key . '>' ;
		}
	} else {
		$xml = htmlspecialchars($array, ENT_QUOTES) ;
	}
	
	return $xml;
}

function generate_valid_xml_from_array($array, $node_block='SoapFault', $node_name='node') {
	/*$xml = '<?xml version="1.0" encoding="UTF-8" ?>' . "\n";*/
	
	$xml = '<' . $node_block . '>' ;
	$xml .= generate_xml_from_array($array, $node_name);
	$xml .= '</' . $node_block . '>' ;
	$xml = str_replace('<@attributes>', '', $xml);// Remove the XML namespace closing tags
	$xml = str_replace('</@attributes>', '', $xml);
	$xml = str_replace('<nil>', '', $xml);
	$xml = str_replace('</nil>', '', $xml);
	$xml = str_replace('&quot;', '', $xml);
	
	return $xml;
}
/**
 * convert xml string to php array - useful to get a serializable value
 *
 * @param string $xmlstr
 * @return array
 * @author Adrien aka Gaarf
 */
function xmlstr_to_array($xmlstr) {
	$doc = new DOMDocument();
	$doc->loadXML($xmlstr);
	return domnode_to_array($doc->documentElement);
}
function domnode_to_array($node) {
	$output = array();
	switch ($node->nodeType) {
		case XML_CDATA_SECTION_NODE:
		case XML_TEXT_NODE:
			$output = trim($node->textContent);
			break;
		case XML_ELEMENT_NODE:
			for ($i=0, $m=$node->childNodes->length; $i<$m; $i++) {
				$child = $node->childNodes->item($i);
				$v = domnode_to_array($child);
				if(isset($child->tagName)) {
					$t = $child->tagName;
					if(!isset($output[$t])) {
						$output[$t] = array();
					}
					$output[$t][] = $v;
				}
				elseif($v) {
					$output = (string) $v;
				}
			}
			if(is_array($output)) {
				if($node->attributes->length) {
					$a = array();
					foreach($node->attributes as $attrName => $attrNode) {
						$a[$attrName] = (string) $attrNode->value;
					}
					$output['@attributes'] = $a;
				}
				foreach ($output as $t => $v) {
					if(is_array($v) && count($v)==1 && $t!='@attributes') {
						$output[$t] = $v[0];
					}
				}
			}
			break;
	}
	return $output;
}

function curl_soap($xml,$api_url,$soap_action,$timeout=60) {
	$user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $api_url ); // set url to post to
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return variable
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout); // connection timeout
	curl_setopt($ch, CURLOPT_POSTFIELDS, $xml );
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	
	$header[] = "SOAPAction: ". $soap_action ;
	$header[] = "MIME-Version: 1.0";
	$header[] = "Content-type: text/xml; charset=utf-8";
	
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	$xml = curl_exec($ch); // run the whole process
	
	if (curl_errno($ch)) {
		$error['curl_error'] = 'Connection Error : '. curl_error($ch) ;
		return $error ;
	} else {
		curl_close($ch);
		$xml = str_replace('<s:', '<', $xml);// Remove the XML namespace closing tags
		$xml = str_replace('</s:', '</', $xml);
		$xml = str_replace('<a:', '<', $xml);// Remove the XML namespace closing tags
		$xml = str_replace('</a:', '</', $xml);
		$xml = str_replace('<b:', '<', $xml);// Remove the XML namespace closing tags
		$xml = str_replace('</b:', '</', $xml);
		
		$arr = xmlstr_to_array($xml);
		return $arr ;
	}
}

function curl_json($body, $api_url, $rest_action, $session_token='', $timeout=60) {
	$user_agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)";
	
	// Parse the full api_url for required pieces. 
	$strpos = strpos($api_url, '/', 8); // 8 denotes look after https://
	$host = mb_substr($api_url, 8, $strpos-8);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $api_url); // set url to post to
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return variable
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout); // connection timeout
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent); 
		
	if ($rest_action == 'POST')
		curl_setopt($ch, CURLOPT_POST, true);
	elseif ($rest_action == 'GET')
		curl_setopt($ch, CURLOPT_HTTPGET, true);
	elseif ($rest_action == 'PUT')
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	elseif ($rest_action == 'DELETE')
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	
	// Header setup		
	$header[] = 'Authorization: Basic '. base64_encode($session_token.":");
	$header[] = 'Content-Type: application/json';
	$header[] = 'Accept: '; // Known issue: defining this causes server to reply with no content.
	$header[] = 'Expect: 100-continue';
	$header[] = 'Host: '.$host;
		
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	
	//The following 3 will retrieve the header with the response. Remove if you do not want the response to contain the header.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//	curl_setopt($ch, CURLOPT_VERBOSE, 1); // Will output network information to the Console
	curl_setopt($ch, CURLOPT_HEADER, 1);
	
	if ($rest_action != 'GET')
		curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
		
	if ($rest_action == 'DELETE')
		$expected_response = "204";	
	elseif (($rest_action == 'POST') and (strpos($api_url, 'transactionsSummary') == true))	
		$expected_response = "200";	
	elseif (($rest_action == 'POST') and (strpos($api_url, 'transactionsFamily') == true))	
		$expected_response = "200";
	elseif (($rest_action == 'POST') and (strpos($api_url, 'transactionsDetail') == true))	
		$expected_response = "200";					
	elseif ($rest_action == 'POST')
		$expected_response = "201";
	else
		$expected_response = "200";
	
	//curl_setopt($ch, CURLOPT_PROXY, '127.0.0.1:8888'); // Uncomment use Fiddler2 to view traffic http://www.fiddler2.com/fiddler/help/hookup.asp
	$response = curl_exec($ch); // Run the request	
	$info = curl_getinfo($ch);	
	curl_close($ch);
	
	$header_size = $info['header_size'];
	$response_header = substr($response, 0, $header_size);
	$response_body = substr($response, $header_size);	

	if($info['http_code'] == $expected_response) 
	{
		if($info['http_code'] != "204")
		{
			if ($response_body[0] == "{" || $response_body[0] == "\"" || $response_body[0] == "[")
				$data = json_decode($response_body);
		}		
	}
	else
	{ 
		$fault = new stdClass();
		$fault->header = $response_header;
		if ($response_body[0] == "{" || $response_body[0] == "\"" || $response_body[0] == "[")
			$fault->body = json_decode($response_body);
		else { // The response is in XML
			$pos_of_500 = strpos($response_header, '500');
			$pos_of_cr = strpos($response_header, "\r", $pos_of_500);
			$length = $pos_of_cr - $pos_of_500;						
			$msg_from_header = substr($response_header, $pos_of_500, $length); 
			$fault->body->ErrorId = 500;
			$fault->body->Messages = Array(0 => $msg_from_header);
		}
		return $fault;
	}
	
	if(isset($data))
		return array($response, $info, $data);
	else
		return array($response, $info);   
}

function arrayToObject($array) {
    if(!is_array($array)) {
        return $array;
    }
    
    $object = new stdClass();
    if (is_array($array) && count($array) > 0) {
      foreach ($array as $name=>$value) {
         $name = trim($name);
         if (!empty($name)) {
         	if(is_array($value) && isset($value['@attributes']))
         		$object->$name = null;
         	elseif(!is_array($value) && strtolower($value) == 'true' || strtolower($value) == 'false')
         		$object->$name = strtolower($value) == 'true' ? true:false;         	
            else
         		$object->$name = arrayToObject($value);
         }
      }
      return $object;
    }
    else {
      return FALSE;
    }
}
    
	/*
	 *
	 * Build a ach transaction on the provided data.
	 *
	 */

	function buildACHTransaction($ach_info, $trans_info) {
		$ach_trans = new ElectronicCheckingTransaction();
		$ach_trans->TenderData = new ElectronicCheckingTenderData();

		$ach_trans->TenderData->CheckData = new CheckData();
		$ach_trans->TenderData->CheckData->AccountNumber = $ach_info->AccountNumber;
		$ach_trans->TenderData->CheckData->CheckCountryCode = $ach_info->CheckCountryCode;
		$ach_trans->TenderData->CheckData->CheckNumber = $ach_info->CheckNumber;
		$ach_trans->TenderData->CheckData->OwnerType = $ach_info->OwnerType;
		$ach_trans->TenderData->CheckData->RoutingNumber = $ach_info->RoutingNumber;
		$ach_trans->TenderData->CheckData->UseType = $ach_info->UseType;

		$ach_trans->TransactionData = new ElectronicCheckingTransactionData();
		$ach_trans->TransactionData->Amount = $trans_info->Amount;
		$ach_trans->TransactionData->EffectiveDate = $trans_info->EffectiveDate;
		$ach_trans->TransactionData->IsRecurring = $trans_info->IsRecurring;
		$ach_trans->TransactionData->SECCode = $trans_info->SECCode;
		$ach_trans->TransactionData->ServiceType = $trans_info->ServiceType;
		$ach_trans->TransactionData->TransactionDateTime = $trans_info->TransactionDateTime;
		$ach_trans->TransactionData->TransactionType = $trans_info->TransactionType;

		$ach_trans->CustomerData = new TransactionCustomerData();
		$ach_trans->CustomerData->BillingData = new CustomerInfo();
		if ($ach_info->BusinessName != '')
		$ach_trans->CustomerData->BillingData->BusinessName = $ach_info->BusinessName;
		if ($ach_info->FirstName != '')
		{
			$ach_trans->CustomerData->BillingData->Name = new NameInfo();
			$ach_trans->CustomerData->BillingData->Name->First = $ach_info->FirstName;
			$ach_trans->CustomerData->BillingData->Name->Middle = $ach_info->MiddleName;
			$ach_trans->CustomerData->BillingData->Name->Last = $ach_info->LastName;
		}

		if ($trans_info->Creds != null)
		{
			$ach_trans->Addendum = new Addendum();
			$ach_trans->Addendum->Unmanaged = new Unmanaged();
			$ach_trans->Addendum->Unmanaged->Any = new Any();
			$ach_trans->Addendum->Unmanaged->Any->string = $trans_info->Creds;
		}

		return $ach_trans;
	}

	/*
	 *
	 * Build a bankcardtransaction on the provided data.
	 *
	 */

	function buildTransaction($credit_info, $trans_info) {
		$bank_trans = new BankcardTransaction ();
		$bank_trans->TenderData = new BankcardTenderData ();
		if ($credit_info->paymentAccountDataToken != '')
		$bank_trans->TenderData->PaymentAccountDataToken = $credit_info->paymentAccountDataToken;
			if ($credit_info->securePaymentAccountData != '')
			$bank_trans->TenderData->SecurePaymentAccountData = $credit_info->securePaymentAccountData;
		
		if ($credit_info->paymentAccountDataToken == '' AND $credit_info->securePaymentAccountData == '')
		{
			$bank_trans->TenderData->CardData = new CardData ();
			$bank_trans->TenderData->CardData->CardType = $credit_info->type;
			$bank_trans->TenderData->CardData->CardholderName = $credit_info->name;
			$bank_trans->TenderData->CardData->PAN = $credit_info->number;
			$bank_trans->TenderData->CardData->Expire = $credit_info->expiration;
			$bank_trans->TenderData->CardData->Track1Data = $credit_info->track1;
			$bank_trans->TenderData->CardData->Track2Data = $credit_info->track2;
		}
		if ($credit_info->zip != '' or $credit_info->cvv != '' or $credit_info->cvv == null) {
			$bank_trans->TenderData->CardSecurityData = new CardSecurityData ();
			if ($credit_info->zip != '') {
				$bank_trans->TenderData->CardSecurityData->AVSData = new AVSData ();
				$bank_trans->TenderData->CardSecurityData->AVSData->CardholderName = $credit_info->name;
				$bank_trans->TenderData->CardSecurityData->AVSData->Street = $credit_info->address;
				$bank_trans->TenderData->CardSecurityData->AVSData->City = $credit_info->city;
				$bank_trans->TenderData->CardSecurityData->AVSData->StateProvince = $credit_info->state;
				$bank_trans->TenderData->CardSecurityData->AVSData->PostalCode = $credit_info->zip;
				$bank_trans->TenderData->CardSecurityData->AVSData->Country = $credit_info->country;
				$bank_trans->TenderData->CardSecurityData->AVSData->Phone = $credit_info->phone;
			}
			if ($credit_info->cvv != '') {
				$bank_trans->TenderData->CardSecurityData->CVDataProvided = 'Provided';
				$bank_trans->TenderData->CardSecurityData->CVData = $credit_info->cvv;
			}
			else if($credit_info->cvv == null) {
				$bank_trans->TenderData->CardSecurityData->CVData = null;
				$bank_trans->TenderData->CardSecurityData->CVDataProvided = 'NotSet';
			}
			
			else {
				$bank_trans->TenderData->CardSecurityData->CVDataProvided = 'NotSet';				
			}
			if ($credit_info->identificationInformation != '')
				$bank_trans->TenderData->CardSecurityData->IdentificationInformation = $credit_info->identificationInformation;
			if ($credit_info->swipeStatus != '')
				$bank_trans->TenderData->SwipeStatus = $credit_info->swipeStatus;
			if ($credit_info->encryptionKeyId != '')
				$bank_trans->TenderData->EncryptionKeyId = $credit_info->encryptionKeyId;
			if ($credit_info->deviceSerialNumber != '')
				$bank_trans->TenderData->DeviceSerialNumber = $credit_info->deviceSerialNumber;
				
		}
		$bank_trans->TransactionData = new BankcardTransactionData ();
		if ($trans_info->AccountType != '')
		$bank_trans->TransactionData->AccountType = $trans_info->AccountType;
		$bank_trans->TransactionData->Amount = sprintf("%0.2f", $trans_info->Amount);
		$bank_trans->TransactionData->ApprovalCode = $trans_info->ApprovalCode;
		if ($trans_info->CashBackAmount != ''){
			$bank_trans->TransactionData->CashBackAmount = sprintf("%0.2f",  $trans_info->CashBackAmount);
		}
		$bank_trans->TransactionData->CurrencyCode = $trans_info->CurrencyCode;
		$bank_trans->TransactionData->CustomerPresent = $trans_info->CustomerPresent;
		$bank_trans->TransactionData->EmployeeId = $trans_info->EmployeeId;
		$bank_trans->TransactionData->EntryMode = $trans_info->EntryMode;
		if ($trans_info->GoodsType != '')
		$bank_trans->TransactionData->GoodsType = $trans_info->GoodsType;
		$bank_trans->TransactionData->LaneId = $trans_info->LaneId;
		$bank_trans->TransactionData->InvoiceNumber = $trans_info->InvoiceNumber;
		$bank_trans->TransactionData->OrderNumber = $trans_info->OrderNumber;
		$bank_trans->TransactionData->SignatureCaptured = $trans_info->SignatureCaptured;
		$bank_trans->TransactionData->IsPartialShipment = $trans_info->IsPartialShipment; // boolean true or false
		$bank_trans->TransactionData->Reference = $trans_info->Reference;
		$bank_trans->TransactionData->IsQuasiCash = $trans_info->IsQuasiCash; // boolean true or false
		$bank_trans->TransactionData->PartialApprovalCapable = $trans_info->PartialApprovalCapable;
		if ($trans_info->TipAmount != '0.00') {
			$bank_trans->TransactionData->TipAmount = sprintf("%0.2f",  $trans_info->TipAmount);
			$bank_trans->TransactionData->Amount = $trans_info->Amount + $trans_info->TipAmount;
			$bank_trans->TransactionData->Amount = sprintf("%0.2f", $bank_trans->TransactionData->Amount);
		}
		if ($trans_info->CFeeAmount != '0.00') {
			$bank_trans->TransactionData->FeeAmount = sprintf("%0.2f",  $trans_info->CFeeAmount);
		}
		
		else
			$bank_trans->TransactionData->FeeAmount = $trans_info->CFeeAmount;
		if ($trans_info->Creds != null) {
			$bank_trans->Addendum = new Addendum ();
			$bank_trans->Addendum->Unmanaged = new Unmanaged ();
			$bank_trans->Addendum->Unmanaged->Any = new Any ();
			//$bank_trans->Addendum->Unmanaged->Any->string = new string ();
			$bank_trans->Addendum->Unmanaged->Any = $trans_info->Creds;
		}
		if ($trans_info->ReportingData != null) {
			$bank_trans->ReportingData = new TransactionReportingData ();
			$bank_trans->ReportingData->Comment = $trans_info->ReportingData->Comment;
			$bank_trans->ReportingData->Description = $trans_info->ReportingData->Description;
			$bank_trans->ReportingData->Reference = $trans_info->ReportingData->Reference;
		}

		if ($trans_info->AltMerchantData != null)
		{
			$bank_trans->TransactionData->AlternativeMerchantData = new AlternativeMerchantData();
			$bank_trans->TransactionData->AlternativeMerchantData->CustomerServiceInternet = $trans_info->AltMerchantData->CustomerServicePhone; // string
			$bank_trans->TransactionData->AlternativeMerchantData->CustomerServicePhone = $trans_info->AltMerchantData->CustomerServicePhone;
			$bank_trans->TransactionData->AlternativeMerchantData->Description = $trans_info->AltMerchantData->Description;
			$bank_trans->TransactionData->AlternativeMerchantData->SIC = $trans_info->AltMerchantData->SIC;
			$bank_trans->TransactionData->AlternativeMerchantData->MerchantId = $trans_info->AltMerchantData->MerchantId;
			$bank_trans->TransactionData->AlternativeMerchantData->Name = $trans_info->AltMerchantData->Name;
			$bank_trans->TransactionData->AlternativeMerchantData->Address = new AddressInfo();
			$bank_trans->TransactionData->AlternativeMerchantData->Address->Street1 = $trans_info->AltMerchantData->Address->Street1;
			$bank_trans->TransactionData->AlternativeMerchantData->Address->Street2 = $trans_info->AltMerchantData->Address->Street2;
			$bank_trans->TransactionData->AlternativeMerchantData->Address->City = $trans_info->AltMerchantData->Address->City;
			$bank_trans->TransactionData->AlternativeMerchantData->Address->StateProvince = $trans_info->AltMerchantData->Address->StateProvince;
			$bank_trans->TransactionData->AlternativeMerchantData->Address->PostalCode = $trans_info->AltMerchantData->Address->PostalCode;
			$bank_trans->TransactionData->AlternativeMerchantData->Address->CountryCode = $trans_info->AltMerchantData->Address->CountryCode;
		}
		if ( $trans_info->TransactionData->TransactionCode = 'Override')
			$bank_trans->TransactionData->TransactionCode = 'Override';
		if ( $trans_info->TransactionData->TransactionCode = 'NotSet') 
			$bank_trans->TransactionData->TransactionCode = 'NotSet';
		$bank_trans->TransactionData->TransactionDateTime = $trans_info->DateTime;
		$bank_trans->TransactionData->Amount = sprintf("%0.2f", $bank_trans->TransactionData->Amount);
		$bank_trans->TransactionData->TipAmount = sprintf("%0.2f", $bank_trans->TransactionData->TipAmount);
		
		return $bank_trans;
	}
	/*
	 *
	 * Build a bankcardtransactionpro on the provided data.
	 *
	 */

	function buildTransactionPro($credit_info, $trans_info) {
		$bank_transpro = new BankcardTransactionPro();
		$bank_transpro->TenderData = new BankcardTenderData ();
		if ($credit_info->paymentAccountDataToken != '')
			$bank_transpro->TenderData->PaymentAccountDataToken = $credit_info->paymentAccountDataToken;
		if ($credit_info->securePaymentAccountData != '')
			$bank_transpro->TenderData->SecurePaymentAccountData = $credit_info->securePaymentAccountData;
		
		if ($credit_info->paymentAccountDataToken == '' AND $credit_info->securePaymentAccountData == '')
		{
			$bank_transpro->TenderData->CardData = new CardData ();
			$bank_transpro->TenderData->CardData->CardType = $credit_info->type;
			$bank_transpro->TenderData->CardData->CardholderName = $credit_info->name;
			$bank_transpro->TenderData->CardData->PAN = $credit_info->number;
			$bank_transpro->TenderData->CardData->Expire = $credit_info->expiration;
			$bank_transpro->TenderData->CardData->Track1Data = $credit_info->track1;
			$bank_transpro->TenderData->CardData->Track2Data = $credit_info->track2;
		}
		if ($credit_info->zip != '' or $credit_info->cvv != '' or $credit_info->cvv == null) {
			$bank_transpro->TenderData->CardSecurityData = new CardSecurityData ();
			if ($credit_info->zip != '') {
				$bank_transpro->TenderData->CardSecurityData->AVSData = new AVSData ();
				$bank_transpro->TenderData->CardSecurityData->AVSData->CardholderName = $credit_info->name;
				$bank_transpro->TenderData->CardSecurityData->AVSData->Street = $credit_info->address;
				$bank_transpro->TenderData->CardSecurityData->AVSData->City = $credit_info->city;
				$bank_transpro->TenderData->CardSecurityData->AVSData->StateProvince = $credit_info->state;
				$bank_transpro->TenderData->CardSecurityData->AVSData->PostalCode = $credit_info->zip;
				$bank_transpro->TenderData->CardSecurityData->AVSData->Country = $credit_info->country;
				$bank_transpro->TenderData->CardSecurityData->AVSData->Phone = $credit_info->phone;
			}
			if ($credit_info->cvv != '') {
				$bank_transpro->TenderData->CardSecurityData->CVDataProvided = 'Provided';
				$bank_transpro->TenderData->CardSecurityData->CVData = $credit_info->cvv;
			}
			else if($credit_info->cvv == null) {
				$bank_transpro->TenderData->CardSecurityData->CVData = null;
				$bank_transpro->TenderData->CardSecurityData->CVDataProvided = 'NotSet';
			}
			
			else {
				$bank_transpro->TenderData->CardSecurityData->CVDataProvided = 'NotSet';				
			}
			if ($credit_info->identificationInformation != '')
				$bank_transpro->TenderData->CardSecurityData->IdentificationInformation = $credit_info->identificationInformation;
			if ($credit_info->swipeStatus != '')
				$bank_transpro->TenderData->SwipeStatus = $credit_info->swipeStatus;
			if ($credit_info->encryptionKeyId != '')
				$bank_transpro->TenderData->EncryptionKeyId = $credit_info->encryptionKeyId;
			if ($credit_info->deviceSerialNumber != '')
				$bank_trans->TenderData->DeviceSerialNumber = $credit_info->deviceSerialNumber;
				
		}
		$bank_transpro->TransactionData = new BankcardTransactionData ();
		$bank_transpro->TransactionData->TransactionDateTime = date('Y-m-d\TH:i:s.u\Z');
		if ($trans_info->AccountType == 'SavingsAccount')
			$bank_transpro->TransactionData->AccountType = 'SavingsAccount';
		else if ($trans_info->AccountType == 'CheckingAccount')
			$bank_transpro->TransactionData->AccountType = 'CheckingAccount';
		else
			$bank_transpro->TransactionData->AccountType = 'NotSet';
		$bank_transpro->TransactionData->Amount = $trans_info->Amount;
		$bank_transpro->TransactionData->ApprovalCode = $trans_info->ApprovalCode;
		if ($trans_info->CashBackAmount != '')
		$bank_transpro->TransactionData->CashBackAmount = $trans_info->CashBackAmount;
		$bank_transpro->TransactionData->CurrencyCode = $trans_info->CurrencyCode;
		$bank_transpro->TransactionData->CustomerPresent = $trans_info->CustomerPresent;
		$bank_transpro->TransactionData->EmployeeId = $trans_info->EmployeeId;
		$bank_transpro->TransactionData->EntryMode = $trans_info->EntryMode;
		if ($trans_info->GoodsType == 'DigitalGoods')
		$bank_transpro->TransactionData->GoodsType = 'DigitalGoods';
		else if ($trans_info->GoodsType == 'PhysicalGoods')
			$bank_transpro->TransactionData->GoodsType = 'PhysicalGoods';
		else 
			$bank_transpro->TransactionData->GoodsType = 'NotSet';
		$bank_transpro->TransactionData->InvoiceNumber = $trans_info->InvoiceNumber;
		$bank_transpro->TransactionData->LaneId = $trans_info->LaneId;
		$bank_transpro->TransactionData->OrderNumber = $trans_info->OrderNumber;
		$bank_transpro->TransactionData->IsPartialShipment = $trans_info->IsPartialShipment;
		$bank_transpro->TransactionData->Reference = $trans_info->Reference;
		$bank_transpro->TransactionData->SignatureCaptured = $trans_info->SignatureCaptured;
		$bank_transpro->TransactionData->IsQuasiCash = $trans_info->IsQuasiCash;
		$bank_transpro->TransactionData->PartialApprovalCapable = $trans_info->PartialApprovalCapable;
		if ($trans_info->TipAmount != '') {
			$bank_transpro->TransactionData->TipAmount = sprintf("%0.2f",  $trans_info->TipAmount);
			$bank_transpro->TransactionData->Amount = $trans_info->Amount + $trans_info->TipAmount;
			$bank_transpro->TransactionData->Amount = sprintf("%0.2f", $bank_transpro->TransactionData->Amount);
		}
		if ($trans_info->CFeeAmount != '0.00') {
			$bank_transpro->TransactionData->FeeAmount = sprintf("%0.2f",  $trans_info->CFeeAmount);
		}
		else
			$bank_transpro->TransactionData->FeeAmount = $trans_info->CFeeAmount;
		if ($trans_info->Creds != null) {
			$bank_transpro->Addendum = new Addendum ();
			$bank_transpro->Addendum->Unmanaged = new Unmanaged ();
			$bank_transpro->Addendum->Unmanaged->Any = new Any ();
			//$bank_transpro->Addendum->Unmanaged->Any->string = new string ();
			$bank_transpro->Addendum->Unmanaged->Any = $trans_info->Creds;
		}
		if ($trans_info->InterchangeData != null) {
			$bank_transpro->InterchangeData = new BankcardInterchangeData ();
			$bank_transpro->InterchangeData->BillPayment = $trans_info->InterchangeData->BillPayment;
			$bank_transpro->InterchangeData->ExistingDebt = $trans_info->InterchangeData->ExistingDebt;
			$bank_transpro->InterchangeData->CurrentInstallmentNumber = $trans_info->InterchangeData->CurrentInstallmentNumber;
			if ($trans_info->InterchangeData->BillPayment != 'NotSet')
			$bank_transpro->TransactionData->CustomerPresent = 'BillPayment';
		}

		if ($trans_info->AltMerchantData != null)
		{
			$bank_transpro->TransactionData->AlternativeMerchantData = new AlternativeMerchantData();
			$bank_transpro->TransactionData->AlternativeMerchantData->CustomerServiceInternet = $trans_info->AltMerchantData->CustomerServicePhone; // string
			$bank_transpro->TransactionData->AlternativeMerchantData->CustomerServicePhone = $trans_info->AltMerchantData->CustomerServicePhone;
			$bank_transpro->TransactionData->AlternativeMerchantData->Description = $trans_info->AltMerchantData->Description;
			$bank_transpro->TransactionData->AlternativeMerchantData->SIC = $trans_info->AltMerchantData->SIC;
			$bank_transpro->TransactionData->AlternativeMerchantData->MerchantId = $trans_info->AltMerchantData->MerchantId;
			$bank_transpro->TransactionData->AlternativeMerchantData->Name = $trans_info->AltMerchantData->Name;
			$bank_transpro->TransactionData->AlternativeMerchantData->Address = new AddressInfo();
			$bank_transpro->TransactionData->AlternativeMerchantData->Address->Street1 = $trans_info->AltMerchantData->Address->Street1;
			$bank_transpro->TransactionData->AlternativeMerchantData->Address->Street2 = $trans_info->AltMerchantData->Address->Street2;
			$bank_transpro->TransactionData->AlternativeMerchantData->Address->City = $trans_info->AltMerchantData->Address->City;
			$bank_transpro->TransactionData->AlternativeMerchantData->Address->StateProvince = $trans_info->AltMerchantData->Address->StateProvince;
			$bank_transpro->TransactionData->AlternativeMerchantData->Address->PostalCode = $trans_info->AltMerchantData->Address->PostalCode;
			$bank_transpro->TransactionData->AlternativeMerchantData->Address->CountryCode = $trans_info->AltMerchantData->Address->CountryCode;
		}
		$bank_transpro->TransactionData->Amount = sprintf("%0.2f", $bank_transpro->TransactionData->Amount);
		$bank_transpro->TransactionData->TipAmount = sprintf("%0.2f", $bank_transpro->TransactionData->TipAmount);
		if ( $trans_info->TransactionData->TransactionCode != null)
			$bank_transpro->TransactionData->TransactionCode = $trans_info->TransactionData->TransactionCode;

		//var_dump($bank_transpro);
		return $bank_transpro;
	}

function SeperateTrackData($TrackFromMSR)
{
	$Splitter = '?';

	list($Track1, $Track2) = explode($Splitter, $TrackFromMSR);
	$Track1 = str_replace('%','',$Track1);
	$Track2 = str_replace(';','',$Track2);
	return array($Track1,$Track2);
}

function ValidateTrackData($SeperatedTrackData)
{
	$regTrackData1 = preg_match("/([B|b])([\d]{12,19})\^([^\^]{2,26})\^([\d]{4}|\^)([\d]{3}|\^)([^\?]+)/",$SeperatedTrackData[0],$MatchTrack1);
	$regTrackData2 = preg_match("/(\d{12,19})\=(\d{4}|\=)(\d{3}|\=)([^\?]+)/",$SeperatedTrackData[1],$MatchTrack2);
	
		if ($regTrackData1 == 0)
		{
			$MatchTrack1 = '';
		}
		if ($regTrackData2 == 0)
		{
			$MatchTrack2 = '';
		}
		if ($regTrackData1 == 0 and $regTrackData2 == 0)
		{
			echo 'Swipe Invalid. Please key credit card number';
			return false;
		}
		return array($MatchTrack1,$MatchTrack2);
}

function CardTypeLookup($ValidatedTrackData, $KeyedPAN)
{
	if ($ValidatedTrackData[0][0] !='') {
		$PanData = $ValidatedTrackData[0][2];
	}
	elseif ($ValidatedTrackData[1][0] !='') {
		$PanData = $ValidatedTrackData[1][1];
	}
	else {
		$PanData = $KeyedPAN;
	}

	if (substr($PanData, 0, 1) == 4) {
		$Lookup = 'Visa';
	}
	elseif (substr($PanData, 0, 1) == 5) {
		$Lookup = 'MasterCard';
	}
	elseif (substr($PanData, 0, 2) == 34) {
		$Lookup = 'AmericanExpress';
	}
	elseif (substr($PanData, 0, 2) == 37) {
		$Lookup = 'AmericanExpress';
	}
	elseif (substr($PanData, 0, 2) == 30 | substr($PanData, 0, 2) == 36 | substr($PanData, 0, 2) == 38 | substr($PanData, 0, 2) == 39) {
		$Lookup = 'Discover';
	}
	elseif (substr($PanData, 0, 6) >= 601100 && substr($PanData, 0, 4) <= 601103) {
		$Lookup = 'Discover';
	}
	elseif (substr($PanData, 0, 6) >= 601104) {
		$Lookup = 'Discover'; //Will update to Paypal in the future
	}
	elseif (substr($PanData, 0, 6) >= 601105 && substr($PanData, 0, 6) <= 650599) {
		$Lookup = 'Discover';
	}
	elseif (substr($PanData, 0, 6) >= 650600 && substr($PanData, 0, 6) <= 650610) {
		$Lookup = 'Discover'; //Will update to Paypal in the future
	}
	elseif (substr($PanData, 0, 6) >= 650611 && substr($PanData, 0, 6) <= 659999) {
		$Lookup = 'Discover';
	}
	elseif (substr($PanData, 0, 2) == 35) {
		$Lookup = 'JCB';
	}
	elseif (substr($PanData, 0, 2) == 67) {
		$Lookup = 'Maestro';
	}
	else {
		$Lookup = 'NotSet';
	}

	return $Lookup;
}

function ValidateCreditCard($ValidatedTrackData, $KeyedPAN)
{
	if ($ValidatedTrackData[0][0] !='') {
		$PanData = $ValidatedTrackData[0][2];
	}
	elseif ($ValidatedTrackData[1][0] !='') {
		$PanData = $ValidatedTrackData[1][1];
	}
	else {
		$PanData = $KeyedPAN;
	}
	for ($x=strlen($PanData)-2; $x >= 0 ; $x -= 2) { 
		$CheckSum += array_sum(str_split(substr($PanData,$x,1)*2));
	}
	for ($y=strlen($PanData)-3; $y >= 0 ; $y -= 2) { 
		$OriginalSum += array_sum(str_split(substr($PanData,$y,1)));
	}
	
	$cd = (($CheckSum + $OriginalSum) * 9) % 10;
	
	if ($cd == substr($PanData, -1)) {
		return true;
	}
	else {
		return false;
	}
}
?>