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
function handleRestFault($fault){
	switch($fault->body->ErrorId){
		// CWS Faults
		case (306): $exType = 'CWSInvalidMessageFormatFault';
			break;
		case (312): $exType = 'CWSDeserializationFault';
			break;
		case (313): $exType = 'CWSExtendedDataNotSupportedFault';
			break;
		case (314): $exType = 'CWSInvalidServiceConfigFault';
			break;
		case (315): $exType = 'CWSInvalidOperationFault';			
			break;
		case (317): $exType = 'CWSOperationNotSupportedFault';
			break;
		case (318): $exType = 'CWSTransactionFailedFault';
			break;
		case (325): $exType = 'CWSValidationResultFault';
			break;
		case (326): $exType = 'CWSFault'; // DONE
			break;
		case (327): $exType = 'CWSTransactionAlreadySettledFault';
			break;
		case (328): $exType = 'CWSConnectionFault';
			break;
		case (8888): $exType = 'CWSSignOnServiceUnavailableFault';
			break;
		case (9999): $exType = 'CWSTransactionServiceUnavailableFault';
			break;
		// STS Faults
		case (406): $exType = 'AuthenticationFault';
			break;
		case (5000): $exType = 'ExpiredTokenFault';
			break;
		case (5005): $exType = 'InvalidTokenFault'; // DONE
			break;
		default: $exType = 'UNKNOWN FAULT / ERROR';
			break;		
	}
	
	$errorString = '<br/><b>'.$exType.' Caught!</b><br/>';
	$errorString = $errorString.'    ErrorId: '.$fault->body->ErrorId.'<br/>';
	if(isset($fault->body->HelpUrl) && $fault->body->HelpUrl != null)
		$errorString = $errorString.'    HelpfulUrl: '.$fault->body->HelpUrl.'<br/>';
	if(isset($fault->body->Operation) && $fault->body->Operation != null)
		$errorString = $errorString.'    Operation: '.$fault->body->Operation.'<br/>';
	if(isset($fault->body->Messages) && $fault->body->Messages != null){
		$Reason = null;
		$i = 1;
		foreach ($fault->body->Messages as $Message){
			$errorString = $errorString.'    Message ('.$i.'): '.$Message.'<br/>';
			if($fault->body->Reason != null && $fault->body->Reason != $Message && $Reason == null)
				$Reason = $fault->body->Reason;
			if($Message == $Reason)
				$Reason = null;
			$i++;
		}
		if($Reason != null)
			$errorString = $errorString.'    Reason: '.$Reason.'<br/>';
	}
	if(isset($fault->body->Reason) && $fault->body->Reason != null && 
	  	!isset($fault->body->Messages) || $fault->body->Messages == null){
		$errorString = $errorString.'    Reason: '.$fault->body->Reason.'<br/>';
	}
	if(isset($fault->body->ValidationErrors) && is_array($fault->body->ValidationErrors)){
		$i = 0;
		foreach($fault->body->ValidationErrors as $ve){
			$errorString = $errorString.'    ValidationError ('.$i.'): ';
			$errorString = $errorString.'         RuleKey: '.$ve->RuleKey.'<br/>';
			$errorString = $errorString.'         RuleLocationKey: '.$ve->RuleLocationKey.'<br/>';
			$errorString = $errorString.'         RuleMessage: '.$ve->RuleMessage.'<br/>';
			$errorString = $errorString.'         TransactionId: '.$ve->TransactionId.'<br/>';
			$i++;	
		}		
	}
	echo $errorString;
}

function handleSvcInfoFault($fault, $faultXML){

	$newEx = buildException($fault);
	$errorString = "";
	$xmlclean_s = "";
	$xmlclean_i = "";
	$xml = "";
	$xmlclean_s = str_replace("s:","",$faultXML);
	$xmlclean_i = str_replace("i:","",$xmlclean_s);
	$xml = simplexml_load_string($xmlclean_i);
	$xml['xmlns'] = '';
	$xml['xmlni'] = '';

	if ($newEx instanceof EndpointNotFoundExceptionFault){
		$errorString = "EndpointNotFoundException Caught<br/><br/>";
		$errorString = $errorString."**** Implement Code to switch to Secondary Endpoints.";

		return $errorString;
	}

	if ($newEx instanceof CWSDeserializationFault){
		$errorString = "DeserializationFault Caught<br/><br/>";
		$errorString = $errorString.'*** Fault: '.$xml->Body->Fault->faultcode.'<br/>';
		$errorString = $errorString.'*** Details: '.$xml->Body->Fault->faultstring.'<br/>';
		return $errorString;
	}

	if ($newEx instanceof AuthenticationFault){
		$errorString = "AuthenticationFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->AuthenticationFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->AuthenticationFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->AuthenticationFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->AuthenticationFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof ExpiredTokenFault){
		$errorString = "ExpiredTokenFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->ExpiredTokenFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->ExpiredTokenFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->ExpiredTokenFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->ExpiredTokenFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof InvalidTokenFault){
		$errorString = "InvalidTokenFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->InvalidTokenFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->InvalidTokenFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->InvalidTokenFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->InvalidTokenFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof STSUnavailableFault){
		$errorString = "STSUnavailableFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->STSUnavailableFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->STSUnavailableFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->STSUnavailableFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->STSUnavailableFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof CWSValidationErrorFault){
		$errorString = "CWSValidationErrorFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSValidationErrorFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSValidationErrorFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSValidationErrorFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSValidationErrorFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof CWSValidationResultFault){
		$errorString = "CWSValidationResultFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSValidationResultFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSValidationResultFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSValidationResultFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSValidationResultFault->ProblemType.'<br/>';

		foreach($xml->Body->Fault->detail->CWSValidationResultFault->Errors->CWSValidationErrorFault as $validationError){

			$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**** Error Type: '.$validationError->ErrorType.'<br/>';
			$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**** Rule Location Key: '.$validationError->RuleLocationKey.'<br/>';
			$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**** Rule Message: '.$validationError->RuleMessage.'<br/><br/>';
		}
		return $errorString;
	}
	if ($newEx instanceof BaseFault){
		$errorString = "BaseFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->BaseFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->BaseFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->BaseFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->BaseFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof OneTimePasswordFault){
		$errorString = "OneTimePasswordFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->OneTimePasswordFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->OneTimePasswordFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->OneTimePasswordFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->OneTimePasswordFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof BadAttemptThresholdExceededFault){
		$errorString = "BadAttemptThresholdExceededFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->BadAttemptThresholdExceededFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->BadAttemptThresholdExceededFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->BadAttemptThresholdExceededFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->BadAttemptThresholdExceededFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof PasswordExpiredFault){
		$errorString = "PasswordExpiredFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->PasswordExpiredFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->PasswordExpiredFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->PasswordExpiredFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->PasswordExpiredFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof LockedByAdminFault){
		$errorString = "LockedByAdminFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->LockedByAdminFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->LockedByAdminFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->LockedByAdminFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->LockedByAdminFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof GeneratePasswordFault){
		$errorString = "GeneratePasswordFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->GeneratePasswordFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->GeneratePasswordFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->GeneratePasswordFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->GeneratePasswordFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof SendEmailFault){
		$errorString = "SendEmailFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->SendEmailFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->SendEmailFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->SendEmailFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->SendEmailFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof UserNotFoundFault){
		$errorString = "UserNotFoundFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->UserNotFoundFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->UserNotFoundFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->UserNotFoundFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->UserNotFoundFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof PasswordInvalidFault){
		$errorString = "PasswordInvalidFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->PasswordInvalidFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->PasswordInvalidFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->PasswordInvalidFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->PasswordInvalidFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof InvalidEmailFault){
		$errorString = "InvalidEmailFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->InvalidEmailFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->InvalidEmailFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->InvalidEmailFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->InvalidEmailFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof ClaimNotFoundFault){
		$errorString = "ClaimNotFoundFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->ClaimNotFoundFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->ClaimNotFoundFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->ClaimNotFoundFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->ClaimNotFoundFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof AuthorizationFault){
		$errorString = "AuthorizationFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->AuthorizationFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->AuthorizationFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->AuthorizationFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->AuthorizationFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof RelyingPartyNotAssociatedToScopeFault){
		$errorString = "RelyingPartyNotAssociatedToScopeFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->RelyingPartyNotAssociatedToScopeFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->RelyingPartyNotAssociatedToScopeFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->RelyingPartyNotAssociatedToScopeFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->RelyingPartyNotAssociatedToScopeFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof SystemFault){
		$errorString = "SystemFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->SystemFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->SystemFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->SystemFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->SystemFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof CWSFault){
		$errorString = "CWSFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof CWSBaseFault){
		$errorString = "CWSBaseFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSBaseFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSBaseFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSBaseFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSBaseFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof CWSServiceInformationUnavailableFault){
		$errorString = "CWSServiceInformationUnavailableFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSServiceInformationUnavailableFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSServiceInformationUnavailableFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSServiceInformationUnavailableFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSServiceInformationUnavailableFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof CWSValidationErrorFault_EErrorType){
		$errorString = "CWSValidationErrorFault_EErrorType Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSValidationErrorFault_EErrorType->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSValidationErrorFault_EErrorType->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSValidationErrorFault_EErrorType->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSValidationErrorFault_EErrorType->ProblemType.'<br/><br/>';

		return $errorString;
	}

	var_dump($xml);
	return ('An unhandled fault was thrown');
}

function handleTxnFault($fault, $faultXML){

	$newEx = buildException($fault);
	$errorString = "";
	$xmlclean_s = "";
	$xmlclean_i = "";
	$xml = "";
	$xmlclean_s = str_replace("s:","",$faultXML);
	$xmlclean_i = str_replace("i:","",$xmlclean_s);
	$xml = simplexml_load_string($xmlclean_i);
	$xml['xmlns'] = '';
	$xml['xmlni'] = '';

	if ($newEx instanceof InvalidTokenFault){
		$errorString = "InvalidTokenFault Caught<br/><br/>";
		//$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->InvalidTokenFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->InvalidTokenFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->InvalidTokenFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->InvalidTokenFault->ProblemType.'<br/><br/>';

		return $errorString;
	}
	
	if ($newEx instanceof CWSDeserializationFault){
		$errorString = "CWSDeserializationFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSDeserializationFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSDeserializationFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSDeserializationFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSDeserializationFault->ProblemType.'<br/><br/>';

		return $errorString;
	}
	if ($newEx instanceof ExpiredTokenFault){
		$errorString = "CWSExpiredSecurityTokenFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->ExpiredTokenFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->ExpiredTokenFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->ExpiredTokenFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->ExpiredTokenFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof CWSExtendedDataNotSupportedFault){
		$errorString = "CWSExtendedDataNotSupportedFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSExtendedDataNotSupportedFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSExtendedDataNotSupportedFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSExtendedDataNotSupportedFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSExtendedDataNotSupportedFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof AuthenticationFault){
		$errorString = "CWSFailedAuthenticationFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->AuthenticationFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->AuthenticationFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->AuthenticationFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->AuthenticationFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof CWSInvalidMessageFormatFault){
		$errorString = "CWSInvalidMessageFormatFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSInvalidMessageFormatFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSInvalidMessageFormatFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSInvalidMessageFormatFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSInvalidMessageFormatFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof CWSInvalidOperationFault){
		$errorString = "CWSInvalidOperationFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSInvalidOperationFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSInvalidOperationFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSInvalidOperationFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSInvalidOperationFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof CWSInvalidServiceInformationFault){
		$errorString = "CWSInvalidServiceInformationFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSInvalidServiceInformationFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSInvalidServiceInformationFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSInvalidServiceInformationFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSInvalidServiceInformationFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof CWSOperationNotSupportedFault){
		$errorString = "CWSOperationNotSupportedFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSOperationNotSupportedFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSOperationNotSupportedFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSOperationNotSupportedFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSOperationNotSupportedFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof CWSSignOnServiceUnavailableFault){
		$errorString = "CWSSignOnServiceUnavailableFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSSignOnServiceUnavailableFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSSignOnServiceUnavailableFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSSignOnServiceUnavailableFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSSignOnServiceUnavailableFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof CWSTransactionAlreadySettledFault){
		$errorString = "CWSTransactionAlreadySettledFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSTransactionAlreadySettledFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSTransactionAlreadySettledFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSTransactionAlreadySettledFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSTransactionAlreadySettledFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof CWSTransactionFailedFault){
		$errorString = "CWSTransactionFailedFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSTransactionFailedFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSTransactionFailedFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSTransactionFailedFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSTransactionFailedFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof CWSTransactionServiceUnavailableFault){
		$errorString = "CWSTransactionServiceUnavailableFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSTransactionServiceUnavailableFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSTransactionServiceUnavailableFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSTransactionServiceUnavailableFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSTransactionServiceUnavailableFault->ProblemType.'<br/><br/>';

		return $errorString;
	}

	if ($newEx instanceof CWSValidationErrorFault){
		$errorString = "CWSValidationErrorFault Caught<br/><br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSValidationErrorFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSValidationErrorFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSValidationErrorFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSValidationErrorFault->ProblemType.'<br/><br/>';

		foreach($xml->Body->Fault->detail->CWSValidationResultFault->Errors->CWSValidationErrorFault as $validationError){

			$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**** Error Type: '.$validationError->ErrorType.'<br/>';
			$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**** Rule Message: '.$validationError->RuleMessage.'<br/><br/>';
		}
		return $errorString;
	}

	if ($newEx instanceof CWSValidationResultFault){
		$errorString = "CWSValidationResultFault Caught<br/>";
		$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
		$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSValidationResultFault->ErrorID.'<br/>';
		$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSValidationResultFault->HelpURL.'<br/>';
		$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSValidationResultFault->Operation.'<br/>';
		$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSValidationResultFault->ProblemType.'<br/><br/>';

		foreach($xml->Body->Fault->detail->CWSValidationResultFault->Errors->CWSValidationErrorFault as $validationError){

			$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**** Error Type: '.$validationError->ErrorType.'<br/>';
			$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**** Rule Key: '.$validationError->RuleKey.'<br/>';
			$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**** Rule Location Key: '.$validationError->RuleLocationKey.'<br/>';
			$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**** Rule Message: '.$validationError->RuleMessage.'<br/>';
			$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**** TransactionId: '.$validationError->TransactionId.'<br/><br/>';
		}

		if ($newEx instanceof CWSBaseFault){
			$errorString = "CWSBaseFault Caught<br/><br/>";
			$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
			$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSBaseFault->ErrorID.'<br/>';
			$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSBaseFault->HelpURL.'<br/>';
			$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSBaseFault->Operation.'<br/>';
			$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSBaseFault->ProblemType.'<br/><br/>';

			return $errorString;
		}
		if ($newEx instanceof CWSValidationErrorFault_EErrorType){
			$errorString = "CWSValidationErrorFault_EErrorType Caught<br/><br/>";
			$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
			$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSValidationErrorFault_ErrorType->ErrorID.'<br/>';
			$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSValidationErrorFault_EErrorType->HelpURL.'<br/>';
			$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSValidationErrorFault_EErrorType->Operation.'<br/>';
			$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSValidationErrorFault_EErrorType->ProblemType.'<br/><br/>';

			return $errorString;
		}

		if ($newEx instanceof CWSFault){
			$errorString = "CWSFault Caught<br/><br/>";
			$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
			$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSFault->ErrorID.'<br/>';
			$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSFault->HelpURL.'<br/>';
			$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSFault->Operation.'<br/>';
			$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSFault->ProblemType.'<br/><br/>';

			return $errorString;
		}

		if ($newEx instanceof CWSConnectionFault){
			$errorString = "CWSConnectionFault Caught<br/><br/>";
			$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
			$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->CWSConnectionFault->ErrorID.'<br/>';
			$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->CWSConnectionFault->HelpURL.'<br/>';
			$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->CWSConnectionFault->Operation.'<br/>';
			$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->CWSConnectionFault->ProblemType.'<br/><br/>';

			return $errorString;
		}

		if ($newEx instanceof BaseFault){
			$errorString = "BaseFault Caught<br/><br/>";
			$errorString = $errorString.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$xml->Body->Fault->faultstring.'<br/><br/>';
			$errorString = $errorString.'*** ErrorID: '.$xml->Body->Fault->detail->BaseFault->ErrorID.'<br/>';
			$errorString = $errorString.'*** HelpURL: '.$xml->Body->Fault->detail->BaseFault->HelpURL.'<br/>';
			$errorString = $errorString.'*** Operation: '.$xml->Body->Fault->detail->BaseFault->Operation.'<br/>';
			$errorString = $errorString.'*** Problem Type: '.$xml->Body->Fault->detail->BaseFault->ProblemType.'<br/><br/>';

			return $errorString;
		}
		return $errorString;
	}


	return ('An unhandled fault was thrown');
}



