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
 * Retrieve Service Information
 */
if ($_serviceId == null)
{
	$response = $client->getServiceInformation ();
	$_serviceInformation = $response;

	/*
	 * If multiple services exist print them all to the browser
	 */

	/*
	 * Note you may have multiple ServiceId's in your array of
	 * Get Service Information.  Assign your Service Id appropriately
	 * Note:  Store the Service Id after this step.  This will remain
	 * static for your application unless you add additional services.  This step
	 * only needs to occur during first time application setup an or if additional
	 * added at a later date.
	 *
	 */

	// Print Service Information
	if (isset($response->BankcardServices))
	{
		echo '<div style="text-align:center; border-width: thin; border-color: black; border-style:solid; "><h1>Service Information - Bankcard Services</h1></div>';
		if (is_array ( $response->BankcardServices )) {
			foreach ( $response->BankcardServices as $BankcardService ) {
				printServiceInformation ( $BankcardService );
				$_serviceId[] = array('ServiceId' => $BankcardService->ServiceId, 'ServiceName' => $BankcardService->ServiceName);
			}
		}
		else {
			printServiceInformation ( $response->BankcardServices->BankcardService );
			$_serviceId['singleService'] = array('ServiceId' => $response->BankcardServices->BankcardService->ServiceId, 'ServiceName' => $response->BankcardServices->BankcardService->ServiceName);

		}
		if (isset ( $response->Workflows)) {
			echo '<div style="text-align:center; border-width: thin; border-color: black; border-style:solid; "><h1>Service Information - Bankcard Workflows</h1></div>';
			if (is_array ( $response->Workflows)) {
				foreach ( $response->Workflows as $Workflow ) {
					echo '<h2><b>WorkflowName:</b><font color="#800080"> ' . $Workflow->Name . '</font></h2>';
					echo '<b>WorkflowId:</b><font color="#800080"> ' . $Workflow->WorkflowId . '<br /></font><br />';
					$_workflowId [] = array ('WorkflowId' => $Workflow->WorkflowId, 'WorkflowName' => $Workflow->Name );
				}
			}
			else {
				echo '<h2><b>WorkflowName:</b><font color="#800080"> ' . $response->Workflows->Workflow->Name . '</font></h2>';
				echo '<b>WorkflowId:</b><font color="#800080"> ' . $response->Workflows->Workflow->WorkflowId . '<br /></font><br />';
				$_workflowId [] = array ('WorkflowId' => $response->Workflows->Workflow->WorkflowId, 'WorkflowName' => $response->Workflows->Workflow->Name );
			}
		}
	}
	if (isset($response->ElectronicCheckingServices->ElectronicCheckingService))
	{
		echo '<div style="text-align:center; border-width: thin; border-color: black; border-style:solid; "><h1>Service Information - Electronic Checking Services</h1></div>';
		if (is_array ( $response->ElectronicCheckingServices->ElectronicCheckingService )) {
			foreach ( $response->ElectronicCheckingServices->ElectronicCheckingService as $ElectronickCheckingService ) {
				printServiceInformation ( $ElectronickCheckingService );
				$_serviceId[] = array('ServiceId' => $ElectronickCheckingService->ServiceId, 'ServiceName' => $ElectronickCheckingService->ServiceName);
			}
		}
		else {
			printServiceInformation ( $response->ElectronicCheckingServices->ElectronicCheckingService );
			$_serviceId['singleService'] = array('ServiceId' => $response->ElectronicCheckingServices->ElectronicCheckingService->ServiceId, 'ServiceName' => $response->ElectronicCheckingServices->ElectronicCheckingService->ServiceName);
		}
	}

	if (isset($response->StoredValueServices->StoredValueService))
	{
		echo '<div style="text-align:center; border-width: thin; border-color: black; border-style:solid; "><h1>Service Information - Stored Value Services</h1></div>';
		if (is_array ( $response->StoredValueServices->StoredValueService )) {
			foreach ( $response->StoredValueServices->StoredValueService as $StoredValueServices ) {
				printServiceInformation ( $StoredValueServices );
				$_serviceId[] = array('ServiceId' => $StoredValueServices->ServiceId, 'ServiceName' => $StoredValueServices->ServiceName);
			}
		}
		else {
			printServiceInformation ( $response->StoredValueServices->StoredValueService );
			$_serviceId['singleService'] = array('ServiceId' => $response->StoredValueServices->StoredValueService->ServiceId, 'ServiceName' => $response->StoredValueServices->StoredValueService->ServiceName);
			break;
		}
	}
}

/*
 *
 * function to parse the Service Information Result
 *
 */
function printServiceInformation($service) {
	$_serviceName =  $service->ServiceName;

	echo '<h2><b>ServiceName:</b><font color="#800080"> '.$_serviceName.'</font></h2>';
	echo '<b>ServiceId:</b><font color="#800080"> '.$service->ServiceId.'<br /></font><br />';

	echo '<h3><b>Transaction Operations Supported:</h3>';
	echo '<ul><li><b>Verify:</b><font color="#800080"> ' . transalateBool ( $service->Operations->Verify ) . '</font><br />';
	echo '<li><b>QueryAccount:</b><font color="#800080"> ' . transalateBool ( $service->Operations->QueryAccount ) . '</font><br />';
	echo '<li><b>AuthorizeAndCapture:</b><font color="#800080"> ' . transalateBool ( $service->Operations->AuthAndCapture ) . '</font><br />';
	echo '<li><b>Authorize:</b><font color="#800080"> ' . transalateBool ( $service->Operations->Authorize ) . '</font><br />';
	echo '<li><b>ReturnById:</b><font color="#800080"> ' . transalateBool ( $service->Operations->ReturnById ) . '</font><br />';
	echo '<li><b>Undo:</b><font color="#800080"> ' . transalateBool ( $service->Operations->Undo ) . '</font><br />';
	echo '<li><b>Capture:</b><font color="#800080"> ' . transalateBool ( $service->Operations->Capture ) . '</font><br />';
	echo '<li><b>CaptureSelective:</b><font color="#800080"> ' . transalateBool ( $service->Operations->CaptureSelective ) . '</font><br />';
	echo '<li><b>CaptureAll:</b><font color="#800080"> ' . transalateBool ( $service->Operations->CaptureAll ) . '</ul></font><br />';

	if(!"ElectronicCheckingService")
	{
		echo '<h3><b>AVS Data that is accepted:</h3>';
		echo '<ul><li><b>CardholderName:</b><font color="#800080"> ' . transalateBool ( $service->AVSData->CardholderName ) . '</font><br />';
		echo '<li><b>Street:</b><font color="#800080"> ' . transalateBool ( $service->AVSData->Street ) . '</font><br />';
		echo '<li><b>City:</b><font color="#800080"> ' . transalateBool ( $service->AVSData->City ) . '</font><br />';
		echo '<li><b>StateProvince:</b><font color="#800080"> ' . transalateBool ( $service->AVSData->StateProvince ) . '</font><br />';
		echo '<li><b>PostalCode:</b><font color="#800080"> ' . transalateBool ( $service->AVSData->PostalCode ) . '</font><br />';
		echo '<li><b>Country:</b><font color="#800080"> ' . transalateBool ( $service->AVSData->Country ) . '</font><br />';
		echo '<li><b>Phone:</b><font color="#800080"> ' . transalateBool ( $service->AVSData->Phone ) . '</ul></font><br />';

		echo '<h3><b>Service Support Details:</h3>';
		echo '<ul><li><b>AutoBatch:</b><font color="#800080"> ' . transalateBool ( $service->AutoBatch ) . '</font><br />';
		//echo '-CutoffTime:</b><font color="#800080"> '.$service->CutoffTime.'</font><br />';
		echo '<li><b>Managed Billing:</b><font color="#800080"> ' . transalateBool ( $service->ManagedBilling ) . '</font><br />';
		echo '<li><b>Maximum Batch Items:</b><font color="#800080"> ' . transalateBool ( $service->MaximumBatchItems ) . '</font><br />';
		echo '<li><b>Maximum Line Items:</b><font color="#800080"> ' . transalateBool ( $service->MaximumLineItems ) . '</font><br />';
		echo '<li><b>Multiple Partial Capture:</b><font color="#800080"> ' . transalateBool ( $service->MultiplePartialCapture ) . '</font><br />';
		echo '<li><b>PurchaseCardLevel Supported:</b><font color="#800080"> ' . $service->PurchaseCardLevel . '</font><br />';
		echo '<li><b>Tenders: <br/ >';
		echo '<ul><li><b>Credit:  </b><font color="#800080"> ' . transalateBool ( $service->Tenders->Credit ) . '</font><br />';
		echo '<li><b>PINDebit:</b><font color="#800080"> ' . transalateBool ( $service->Tenders->PINDebit ) . '</font><br />';
		echo '<li><b>PINDebitReturnSupportType:</b><font color="#800080"> ' . $service->Tenders->PINDebitReturnSupportType . '</ul></ul></font><br />';
	}
}
?>