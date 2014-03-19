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

// Require and bring in all required classes
define ( 'ABSPATH', dirname ( __FILE__ ) . '/' );
require_once ABSPATH . '/WebServiceProxies/HelperMethods.php'; // Require and bring in all helper functions
require_once ABSPATH . '/ConfigFiles/app.config.php';
date_default_timezone_set ( Settings::Timezone );

global $credentials;
global $_identityToken;
global $_serviceKey;
global $_serviceId;
global $_applicationProfileId;
global $_merchantProfileId;
global $_serviceInformation;
global $_baseURL;
global $_msgFormat;
global $_bankcardServices;
global $_electronicCheckingServices;
global $_storedValueServices;
global $_achs;
global $_bcs;
global $client;
$_msgFormat = Settings::MsgFormat;

// Provided Token, The Identity Token should be stored in an encrypted format and read into the application.
// This can be stored either in a database or on the disk, but must always be protected and encrypted.
// If the IdentityToken is compromised you must notify us immmediately so we can issue a new IdentityToken
// This is main means of authentication to the platform, essentially this is your password.


require_once ABSPATH . '/ConfigFiles/ReadConfigValues.php';

/*
 *
 * Create new web service client class using provided token
 * Profile ID and service ID are not required, but increase speed of script
 * You may also pass the session token to increase speed again, but that token
 * will need to be generated and saved elsewhere.
 *
 * Application Profile Id will need to be persisted from ApplicationAndMerchantSetup.php.
 * Use that value to pass in below.
 * 
 * If the service key has multiple Merchant Profiles, the Client setup is using the first
 * in the array, others are being ignored.
 *
 * Your client is based on the message format being used, set in the app.config.php
 */

$_baseURL = Settings::URL_RestURL;
require_once ABSPATH . '/WebServiceProxies/JSONClient.php';
$client = new JSONClient ( $_identityToken, $_baseURL, $_merchantProfileId [0] ['ProfileId'], $_merchantProfileId [0] ['ServiceId'], $_applicationProfileId );

$includeRelated = false;

$pagingParameters = new PagingParameters ();
$pagingParameters->Page = '0';
$pagingParameters->PageSize = '50';

$txnDateRange = new DateRange ();
$txnDateRange->StartDateTime = date ( 'Y-m-d\TH:i:s.u\Z', mktime ( 0, 0, 0, date ( "m" ), date ( "d" ) - 5, date ( "Y" ) ) ); // Previous 5 days.
$txnDateRange->EndDateTime = date ( 'Y-m-d\TH:i:s.u\Z' ); // Format = 2012-09-20T09:50:56.000000Z


$queryTxnParameters = new QueryTransactionsParameters ();
$queryTxnParameters->Amounts = null; // ArrayOfdecimal
$queryTxnParameters->ApprovalCodes = null; // ArrayOfstring
$queryTxnParameters->BatchIds = null; // ArrayOfstring
$queryTxnParameters->CaptureDateRange = null; // DateRange
$captureStates [0] = 'ReadyForCapture';
$captureStates [1] = 'Captured';
$queryTxnParameters->CaptureStates = $captureStates; // ArrayOfCaptureState
$queryTxnParameters->CardTypes = null; // ArrayOfTypeCardType
$queryTxnParameters->IsAcknowledged = 'false'; // BooleanParameter  true/false
$queryTxnParameters->MerchantProfileIds = null; // ArrayOfstring
$queryTxnParameters->QueryType = 'AND'; // QueryType  AND/OR
$queryTxnParameters->ServiceIds = null; // ArrayOfstring
$queryTxnParameters->ServiceKeys = null; // ArrayOfstring
$queryTxnParameters->TransactionClassTypePairs = null; // ArrayOfTransactionClassTypePair*/
$queryTxnParameters->TransactionDateRange = null; //$txnDateRange; // DateRange
//$queryTxnParameters->TransactionIds = null; // ArrayOfstring
//$queryTxnParameters->TransactionIds[] = 'PUT_TXN_GUID1_HERE'; // ArrayOfstring
//$queryTxnParameters->TransactionIds[] = 'PUT_OPTIONAL_2ND_TXN_GUID_HERE';
//$queryTxnParameters->TransactionStates = null; // ArrayOfTransactionState


$response = $client->queryTransactionsSummary ( $queryTxnParameters, $includeRelated, $pagingParameters );

if (isset ( $response->SummaryDetail ) && is_array ( $response->SummaryDetail )) {
	foreach ( $response->SummaryDetail as $SummaryDetail ) {
		printSummaryDetailInformation ( $SummaryDetail );
	}
	if (count ( $response->SummaryDetail ) == 50)
		echo '<br />50 records returned on this query. Query for additional pages.';
} else {
	printSummaryDetailInformation ( $response->SummaryDetail );
}

$transactionIds [0] = $response->SummaryDetail [0]->TransactionInformation->TransactionId;
$queryTxnParameters->TransactionIds = $transactionIds;

$response = $client->queryTransactionFamilies ( $queryTxnParameters, $includeRelated, $pagingParameters );

if (is_array ( $response->FamilyDetail )) {
	foreach ( $response->FamilyDetail as $FamilyDetail ) {
		printFamilyDetailInformation ( $FamilyDetail );
	}
} else {
	printFamilyDetailInformation ( $response->FamilyDetail );
}

$transactionDetailFormat = 'SerializedCWS';
$queryTxnParameters->CaptureStates = null;
$response = $client->queryTransactionsDetail ( $queryTxnParameters, $includeRelated, $transactionDetailFormat, $pagingParameters );

if (is_array ( $response )) {
	foreach ( $response as $TransactionDetail ) {
		printTransactionDetailInformation ( $TransactionDetail );
	}
} else {
	printTransactionDetailInformation ( $response );
}

echo '<br><b>     Transaction Management complete!</b><br />';
?>