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

$dom = new DOMDocument ( '1.0', 'iso-8859-1' );
$config = $dom->createElement ( 'config' );
$dom->appendChild ( $config );

// attach child nodes

$EncryptedIdentityToken = $config->appendChild(new DOMElement ( 'EncryptedIdentityToken', encrypt ( $_identityToken, Settings::key )));
if (is_array($_serviceId))
{
	foreach ($_serviceId as $svcId)
	{
		$ServiceId = $config->appendChild(new DOMElement ( 'ServiceId', $svcId['ServiceId'] ));
		$ServiceId->setAttributeNode(new DOMAttr('serviceName', $svcId['ServiceName']));
	}
}
else{
	$ServiceId = $config->appendChild(new DOMElement ( 'ServiceId', $_serviceId['singleService']['ServiceId'] ));
	$ServiceId->setAttributeNode(new DOMAttr('serviceName', $_serviceId['singleService']['ServiceName']));
}
if (is_array($_workflowId))
{
	foreach ($_workflowId as $svcId)
	{
		$WorkflowId = $config->appendChild(new DOMElement ( 'WorkflowId', $svcId['WorkflowId'] ));
		$WorkflowId->setAttributeNode(new DOMAttr('workflowName', $svcId['WorkflowName']));
	}
}
else{
	$WorkflowId = $config->appendChild(new DOMElement ( 'WorkflowId', $_workflowId['WorkflowId'] ));
	$WorkflowId->setAttributeNode(new DOMAttr('workflowName', $_workflowId['WorkflowName']));
}

$ApplicationProfileId = $config->appendChild(new DOMElement ( 'ApplicationProfileId', $_applicationProfileId ));

if (is_array ($_merchantProfileId))
{
	foreach ($_merchantProfileId as $merchIds)
	{
		$MerchantProfileId = $config->appendChild(new DOMElement ( 'MerchantProfileId', $merchIds['ProfileId'] ));
		$MerchantProfileId->setAttributeNode(new DOMAttr('serviceId', $merchIds['ServiceId']));
	}
}
else{
	$MerchantProfileId = $config->appendChild(new DOMElement ( 'MerchantProfileId', $_merchantProfileId['ProfileId'] ));
	$MerchantProfileId->setAttributeNode(new DOMAttr('serviceId', $_merchantProfileId['ServiceId']));

}


// save to configuration file
$dom->formatOutput = true;
if ($dom->save ( ABSPATH.'/ConfigFiles/CWS_Config_Values.xml' ))
echo '<br/>Configuration successfully saved!';
else
echo '<br/>Configuration not saved';

?>