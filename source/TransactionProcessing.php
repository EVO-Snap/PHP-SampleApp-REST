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
define('ABSPATH', dirname(__FILE__).'/');
require_once ABSPATH.'/WebServiceProxies/HelperMethods.php'; // Require and bring in all helper functions
require_once ABSPATH.'/ConfigFiles/app.config.php';
date_default_timezone_set(Settings::Timezone);

global $credentials;
global $_identityToken;
global $_serviceKey;
global $_serviceId;
global $_workflowId;
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

require_once ABSPATH.'/ConfigFiles/ReadConfigValues.php';
	if (!Settings::ActivationKey == ''){
		$_merchantProfileId[0]['ProfileId'] = Settings::ActivationKey;
		$_merchantProfileId[1]['ProfileId'] = Settings::ActivationKey.'_TC';
	}
/*
 *
 * Create new web service client class using provided token
 * Profile ID and service ID are not required, but increase speed of script
 * You may also pass the session token to increase speed again, but that token
 * will need to be generated and saved elsewhere.
 *
 * If the service key has multiple Merchant Profiles, the Client setup is using the first
 * in the array, others are being ignored.
 *
 * Your client is based on the message format being used, set in the app.config.php
 */

$_baseURL = Settings::URL_RestURL;
require_once ABSPATH . '/WebServiceProxies/JSONClient.php';
if (!Settings::UseWorkflow)
	$client = new JSONClient ( $_identityToken, $_baseURL, $_merchantProfileId [0] ['ProfileId'], $_merchantProfileId [0] ['ServiceId'], $_applicationProfileId );
else
	$client = new JSONClient ( $_identityToken, $_baseURL, $_merchantProfileId [0] ['ProfileId'], $_workflowId [0] ['ServiceId'], $_applicationProfileId );

$_serviceInformation = $client->getServiceInformation();

if (isset($_serviceInformation->BankcardServices)){
	$_bankcardServices = $_serviceInformation->BankcardServices;
	require_once ABSPATH.'/TransactionProcessingScripts/BankcardTransactionProcessing.php';
}

if (isset($_serviceInformation->ElectronicCheckingServices->ElectronicCheckingService)){
	$_electronicCheckingServices = $_serviceInformation->ElectronicCheckingServices;
	require_once ABSPATH.'/TransactionProcessingScripts/ElectronicCheckingTransactionProcessing.php';
}

//if (isset($_serviceInformation->StoredValueServices->StoredValueService)){
	//$_storedvalueServices = $_serviceInformation->StoredValueServices;
	//require_once ABSPATH.'/TransactionProcessingScripts/StoredValueTransactionProcessing.php';
//}

echo '<br><b>     Transaction Processing script complete!</b><br />';
?>
