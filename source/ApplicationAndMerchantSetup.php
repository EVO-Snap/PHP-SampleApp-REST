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

define('ABSPATH', dirname(__FILE__).'/');
require_once ABSPATH.'/WebServiceProxies/HelperMethods.php'; // Require and bring in all helper functions
require_once ABSPATH.'/ConfigFiles/app.config.php';
date_default_timezone_set(Settings::Timezone);

global $_identityToken;
global $_serviceKey;
global $_serviceId;
global $_workflowId;
global $_applicationProfileId;
global $_merchantProfileId;
global $_serviceInformation;
global $_baseURL;
global $_msgFormat;
global $client;
$_msgFormat = Settings::MsgFormat;

require_once ABSPATH.'/ConfigFiles/ReadConfigValues.php';

/*
 *
 * Create new web service client class using provided IdentityToken
 * Merchant Profile ID, Application Profile ID, and service ID are required, 
 * these values are generated below. Please cache these values in a config file 
 * for later use.
 * You may also pass the session token to increase speed again, but that token
 * will need to be generated and saved elsewhere.
 * Your client is based on the message format being used, set in the app.config.php
 *
 */

$_baseURL = Settings::URL_RestURL;
require_once ABSPATH . '/WebServiceProxies/JSONClient.php';
$client = new JSONClient ( $_identityToken, $_baseURL );

if($_applicationProfileId == null){
	include_once ABSPATH.'/ApplicationAndMerchantSetupFiles/SaveApplicationData.php';
}
if($_serviceInformation == null){
	include_once ABSPATH.'/ApplicationAndMerchantSetupFiles/GetServiceInformation.php';
}
if (isset($_serviceInformation->BankcardServices)  || 
		is_array($_serviceInformation->BankcardServices)){
	include_once ABSPATH.'/ApplicationAndMerchantSetupFiles/Create_BCP_MerchantProfiles.php';
}


//if ($_serviceInformation->ElectronicCheckingServices->ElectronicCheckingService instanceof ElectronicCheckingService || is_array($_serviceInformation->ElectronicCheckingServices->ElectronicCheckingService)){
//	include_once ABSPATH.'/ApplicationAndMerchantSetupFiles/Create_ACH_MerchantProfiles.php';
//}
include_once ABSPATH.'/ConfigFiles/SaveConfigValues.php';

?>
