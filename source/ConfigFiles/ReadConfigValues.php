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


/*
 * Check to see if the Config Values have been previously stored in a config file
 */
if (file_exists (ABSPATH.'/ConfigFiles/CWS_Config_Values.xml' )) {
	// parse XML
	$xml = new DOMDocument();
	$xml->load( ABSPATH.'/ConfigFiles/CWS_Config_Values.xml' );
	if (! $xml) {
		echo 'Error while parsing the document';
		exit ();
	}
	// access XML element values
	$_encryptedIdentityToken = $xml->getElementsByTagName("EncryptedIdentityToken")->item(0)->nodeValue;
	$_identityToken = decrypt ( $_encryptedIdentityToken, Settings::key );

	$searchNode = $xml->getElementsByTagName( "ServiceKey" );
	foreach( $searchNode as $srchNode )
	{
		$_serviceKey = $xml->getElementsByTagName("ServiceKey")->item(0)->nodeValue;
	}

	$searchNode = $xml->getElementsByTagName( "ServiceId" );
	$i = 0;

	foreach( $searchNode as $srchNode )
	{
		$serviceName = $srchNode->getAttribute("serviceName");
		$serviceId = $xml->getElementsByTagName( "ServiceId" )->item($i)->nodeValue;
		$_serviceId[] = array ('ServiceId' => $serviceId, 'ServiceName' => $serviceName);
		$i++;
	}
	if ($i == 1)
	{
		$_serviceId = null;
		$_serviceId['singleService'] = array('ServiceId' => $serviceId, 'ServiceName' => $serviceName);
	}
	$searchNode = $xml->getElementsByTagName( "WorkflowId" );
	$i = 0;
	foreach( $searchNode as $srchNode )
	{
		$workflowName = $srchNode->getAttribute("workflowName");
		$workflowId = $xml->getElementsByTagName( "WorkflowId" )->item($i)->nodeValue;
		$_workflowId[] = array ('ServiceId' => $workflowId, 'WorkflowName' => $workflowName);
		$i++;
	}
	
	$_applicationProfileId = $xml->getElementsByTagName('ApplicationProfileId')->item(0)->nodeValue;
	
	$searchNode = $xml->getElementsByTagName('MerchantProfileId');
	$i = 0;
	foreach( $searchNode as $srchNode ){
		$serviceId = $srchNode->getAttribute('serviceId');
		$profileId = $xml->getElementsByTagName ('MerchantProfileId')->item($i)->nodeValue;
		$_merchantProfileId[] = array( 'ProfileId' => $profileId, 'ServiceId' => $serviceId );
		$i++;
	}
}

/*
 * If the above config file does not exist then parse the app.config.php file for values.
 */

// The Identity Token should be stored in an encrypted format and read into the application.
// This can be stored either in a database or on the disk, but must always be protected and encrypted.
// If the IdentityToken is compromised you must notify us immmediately so we can issue a new IdentityToken
// This is main means of authentication to the platform, essentially this is your password.
else {

	if (file_exists (ABSPATH.'/ConfigFiles/app.config.php'))
		$_identityToken = Settings::IdentityToken;
	else
	{
		echo 'App Config File Not Present';
		
		exit;
	}
}


?>