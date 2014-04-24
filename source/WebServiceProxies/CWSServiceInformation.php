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
 * CWSServiceInformation class file
 * 
 */

if (! class_exists ( "PingResponse" )) {
	/*
 *PingResponse
 */
	class PingResponse {
		public $IsSuccess; // boolean
		public $Message; // string
	}
}

if (! class_exists ( "Ping" )) {
	/*
 *Ping
 */
	class Ping {
	}
}

if (! class_exists ( "PingResponse" )) {
	/*
 *PingResponse
 */
	class PingResponse {
		public $PingResult; // PingResponse
	}
}

if (! class_exists ( "char" )) {
	/*
 *char
 */
	class char {
	}
}

if (! class_exists ( "duration" )) {
	/*
 *duration
 */
	class duration {
	}
}

if (! class_exists ( "guid" )) {
	/*
 *guid
 */
	class guid {
	}
}

if (! class_exists ( "SignOnWithToken" )) {
	/*
 *SignOnWithToken
 */
	class SignOnWithToken {
		public $identityToken; // string
	}
}

if (! class_exists ( "SignOnWithTokenResponse" )) {
	/*
 *SignOnWithTokenResponse
 */
	class SignOnWithTokenResponse {
		public $SignOnWithTokenResult; // string
	}
}

if (! class_exists ( "GetServiceInformation" )) {
	/*
 *GetServiceInformation
 */
	class GetServiceInformation {
		public $sessionToken; // string
	}
}

if (! class_exists ( "GetServiceInformationResponse" )) {
	/*
 *GetServiceInformationResponse
 */
	class GetServiceInformationResponse {
		public $GetServiceInformationResult; // ServiceInformation
	}
}

if (! class_exists ( "ServiceInformation" )) {
	/*
 *ServiceInformation
 */
	class ServiceInformation {
		public $BankcardServices; // ArrayOfBankcardService
		public $ElectronicCheckingServices; // ArrayOfElectronicCheckingService
		public $StoredValueServices; // ArrayOfStoredValueService
		public $Workflows; // ArrayOfWorkflow
	}
}

if (! class_exists ( "BankcardService" )) {
	/*
 *BankcardService
 */
	class BankcardService {
		public $AlternativeMerchantData; // boolean
		public $AutoBatch; // boolean
		public $AVSData; // BankcardServiceAVSData
		public $CutoffTime; // dateTime
		public $EncryptionKey; // string
		public $ManagedBilling; // boolean
		public $MaximumBatchItems; // long
		public $MaximumLineItems; // long
		public $MultiplePartialCapture; // boolean
		public $Operations; // Operations
		public $PurchaseCardLevel; // PurchaseCardLevel
		public $ServiceId; // string
		public $ServiceName; // string
		public $Tenders; // Tenders
	}
}

if (! class_exists ( "BankcardServiceAVSData" )) {
	/*
 *BankcardServiceAVSData
 */
	class BankcardServiceAVSData {
		public $CardholderName; // boolean
		public $Street; // boolean
		public $City; // boolean
		public $StateProvince; // boolean
		public $PostalCode; // boolean
		public $Country; // boolean
		public $Phone; // boolean
	}
}

if (! class_exists ( "Operations" )) {
	/*
 *Operations
 */
	class Operations {
		public $Verify; // boolean
		public $QueryAccount; // boolean
		public $AuthAndCapture; // boolean
		public $Authorize; // boolean
		public $Adjust; // boolean
		public $ReturnById; // boolean
		public $ReturnUnlinked; // boolean
		public $Undo; // boolean
		public $Capture; // boolean
		public $CaptureSelective; // boolean
		public $CaptureAll; // boolean
		public $CloseBatch; // CloseBatch
		public $QueryRejected; // boolean
		public $ManageAccount; // boolean
		public $ManageAccountById; // boolean
		public $Disburse; // boolean
	}
}

if (! class_exists ( "CloseBatch" )) {
	/*
 *CloseBatch
 */
	class CloseBatch {
	}
}

if (! class_exists ( "PurchaseCardLevel" )) {
	/*
 *PurchaseCardLevel
 */
	class PurchaseCardLevel {
	}
}

if (! class_exists ( "Tenders" )) {
	/*
 *Tenders
 */
	class Tenders {
		public $Credit; // boolean
		public $PINDebit; // boolean
		public $PINlessDebit; // boolean
		public $PINDebitReturnSupportType; // PINDebitReturnSupportType
		public $PINDebitUndoTenderDataRequired; // boolean
		public $CreditAuthorizeSupport; // CreditAuthorizeSupportType
		public $QueryRejectedSupport; // QueryRejectedSupportType
		public $PinDebitUndoSupport; // PinDebitUndoSupportType
		public $BatchAssignmentSupport; // BatchAssignmentSupport
		public $CreditReturnSupportType; // CreditReturnSupportType
		public $TrackDataSupport; // TrackDataSupportType
		public $CredentialsRequired; // boolean
		public $CreditReversalSupportType; // CreditReversalSupportType
		public $PartialApprovalSupportType; // PartialApprovalSupportType
	}
}

if (! class_exists ( "PINDebitReturnSupportType" )) {
	/*
 *PINDebitReturnSupportType
 */
	class PINDebitReturnSupportType {
	}
}

if (! class_exists ( "CreditAuthorizeSupportType" )) {
	/*
 *CreditAuthorizeSupportType
 */
	class CreditAuthorizeSupportType {
	}
}

if (! class_exists ( "QueryRejectedSupportType" )) {
	/*
 *QueryRejectedSupportType
 */
	class QueryRejectedSupportType {
	}
}

if (! class_exists ( "PinDebitUndoSupportType" )) {
	/*
 *PinDebitUndoSupportType
 */
	class PinDebitUndoSupportType {
	}
}

if (! class_exists ( "BatchAssignmentSupport" )) {
	/*
 *BatchAssignmentSupport
 */
	class BatchAssignmentSupport {
	}
}

if (! class_exists ( "CreditReturnSupportType" )) {
	/*
 *CreditReturnSupportType
 */
	class CreditReturnSupportType {
	}
}

if (! class_exists ( "TrackDataSupportType" )) {
	/*
 *TrackDataSupportType
 */
	class TrackDataSupportType {
	}
}

if (! class_exists ( "CreditReversalSupportType" )) {
	/*
 *CreditReversalSupportType
 */
	class CreditReversalSupportType {
	}
}

if (! class_exists ( "PartialApprovalSupportType" )) {
	/*
 *PartialApprovalSupportType
 */
	class PartialApprovalSupportType {
	}
}

if (! class_exists ( "ElectronicCheckingService" )) {
	/*
 *ElectronicCheckingService
 */
	class ElectronicCheckingService {
		public $Operations; // Operations
		public $ServiceId; // string
		public $ServiceName; // string
		public $Tenders; // Tenders
	}
}

if (! class_exists ( "StoredValueService" )) {
	/*
 *StoredValueService
 */
	class StoredValueService {
		public $Operations; // Operations
		public $ServiceId; // string
		public $ServiceName; // string
		public $Tenders; // Tenders
		public $SecureMSRAllowed; // boolean
	}
}

if (! class_exists ( "Workflow" )) {
	/*
 *Workflow
 */
	class Workflow {
		public $WorkflowId; // string
		public $Name; // string
		public $ServiceId; // string
		public $WorkflowServices; // ArrayOfWorkflowService
	}
}

if (! class_exists ( "WorkflowService" )) {
	/*
 *WorkflowService
 */
	class WorkflowService {
		public $ServiceId; // string
		public $ServiceName; // string
		public $ServiceType; // string
		public $Ordinal; // int
	}
}

if (! class_exists ( "SaveApplicationData" )) {
	/*
 *SaveApplicationData
 */
	class SaveApplicationData {
		public $sessionToken; // string
		public $applicationData; // ApplicationData
	}
}

if (! class_exists ( "ApplicationData" )) {
	/*
 *ApplicationData
 */
	class ApplicationData {
		public $ApplicationAttended; // boolean
		public $ApplicationLocation; // ApplicationLocation
		public $ApplicationName; // string
		public $DeveloperId; // string
		public $HardwareType; // HardwareType
		public $PINCapability; // PINCapability
		public $PTLSSocketId; // string
		public $ReadCapability; // ReadCapability
		public $SerialNumber; // string
		public $SoftwareVersion; // string
		public $SoftwareVersionDate; // dateTime
		public $VendorId; // string
		public $EncryptionType; // EncryptionType
		public $DeviceSerialNumber; // string
	}
}

if (! class_exists ( "ApplicationLocation" )) {
	/*
 *ApplicationLocation
 */
	class ApplicationLocation {
	}
}

if (! class_exists ( "HardwareType" )) {
	/*
 *HardwareType
 */
	class HardwareType {
	}
}

if (! class_exists ( "PINCapability" )) {
	/*
 *PINCapability
 */
	class PINCapability {
	}
}

if (! class_exists ( "ReadCapability" )) {
	/*
 *ReadCapability
 */
	class ReadCapability {
	}
}

if (! class_exists ( "EncryptionType" )) {
	/*
 *EncryptionType
 */
	class EncryptionType {
	}
}

if (! class_exists ( "SaveApplicationDataResponse" )) {
	/*
 *SaveApplicationDataResponse
 */
	class SaveApplicationDataResponse {
		public $SaveApplicationDataResult; // string
	}
}

if (! class_exists ( "GetApplicationData" )) {
	/*
 *GetApplicationData
 */
	class GetApplicationData {
		public $sessionToken; // string
		public $applicationProfileId; // string
	}
}

if (! class_exists ( "GetApplicationDataResponse" )) {
	/*
 *GetApplicationDataResponse
 */
	class GetApplicationDataResponse {
		public $GetApplicationDataResult; // ApplicationData
	}
}

if (! class_exists ( "DeleteApplicationData" )) {
	/*
 *DeleteApplicationData
 */
	class DeleteApplicationData {
		public $sessionToken; // string
		public $applicationProfileId; // string
	}
}

if (! class_exists ( "DeleteApplicationDataResponse" )) {
	/*
 *DeleteApplicationDataResponse
 */
	class DeleteApplicationDataResponse {
	}
}

if (! class_exists ( "IsMerchantProfileInitialized" )) {
	/*
 *IsMerchantProfileInitialized
 */
	class IsMerchantProfileInitialized {
		public $sessionToken; // string
		public $serviceId; // string
		public $merchantProfileId; // string
		public $tenderType; // TenderType
	}
}

if (! class_exists ( "TenderType" )) {
	/*
 *TenderType
 */
	class TenderType {
	}
}

if (! class_exists ( "IsMerchantProfileInitializedResponse" )) {
	/*
 *IsMerchantProfileInitializedResponse
 */
	class IsMerchantProfileInitializedResponse {
		public $IsMerchantProfileInitializedResult; // boolean
	}
}

if (! class_exists ( "GetMerchantProfiles" )) {
	/*
 *GetMerchantProfiles
 */
	class GetMerchantProfiles {
		public $sessionToken; // string
		public $serviceId; // string
		public $tenderType; // TenderType
	}
}

if (! class_exists ( "GetMerchantProfilesResponse" )) {
	/*
 *GetMerchantProfilesResponse
 */
	class GetMerchantProfilesResponse {
		public $GetMerchantProfilesResult; // ArrayOfMerchantProfile
	}
}

if (! class_exists ( "MerchantProfile" )) {
	/*
 *MerchantProfile
 */
	class MerchantProfile {
		public $ProfileId; // string
		public $ServiceId; // string
		public $ServiceName; // string
		public $LastUpdated; // dateTime
		public $MerchantData; // MerchantProfileMerchantData
		public $TransactionData; // MerchantProfileTransactionData
	}
}

if (! class_exists ( "MerchantProfileMerchantData" )) {
	/*
 *MerchantProfileMerchantData
 */
	class MerchantProfileMerchantData {
		public $CustomerServiceInternet; // string
		public $CustomerServicePhone; // string
		public $Language; // TypeISOLanguageCodeA3
		public $Address; // AddressInfo
		public $MerchantId; // string
		public $Name; // string
		public $Phone; // string
		public $TaxId; // string
		public $BankcardMerchantData; // BankcardMerchantData
		public $ElectronicCheckingMerchantData; // ElectronicCheckingMerchantData
		public $StoredValueMerchantData; // StoredValueMerchantData
	}
}

if (! class_exists ( "TypeISOLanguageCodeA3" )) {
	/*
 *TypeISOLanguageCodeA3
 */
	class TypeISOLanguageCodeA3 {
	}
}

if (! class_exists ( "AddressInfo" )) {
	/*
 *AddressInfo
 */
	class AddressInfo {
		public $Street1; // string
		public $Street2; // string
		public $City; // string
		public $StateProvince; // TypeStateProvince
		public $PostalCode; // string
		public $CountryCode; // TypeISOCountryCodeA3
	}
}

if (! class_exists ( "TypeStateProvince" )) {
	/*
 *TypeStateProvince
 */
	class TypeStateProvince {
	}
}

if (! class_exists ( "TypeISOCountryCodeA3" )) {
	/*
 *TypeISOCountryCodeA3
 */
	class TypeISOCountryCodeA3 {
	}
}

if (! class_exists ( "BankcardMerchantData" )) {
	/*
 *BankcardMerchantData
 */
	class BankcardMerchantData {
		public $ABANumber; // string
		public $AcquirerBIN; // string
		public $AgentBank; // string
		public $AgentChain; // string
		public $Aggregator; // boolean
		public $ClientNumber; // string
		public $IndustryType; // IndustryType
		public $Location; // string
		public $MerchantType; // string
		public $PrintCustomerServicePhone; // boolean
		public $QualificationCodes; // string
		public $ReimbursementAttribute; // string
		public $SIC; // string
		public $SecondaryTerminalId; // string
		public $SettlementAgent; // string
		public $SharingGroup; // string
		public $StoreId; // string
		public $TerminalId; // string
		public $TimeZoneDifferential; // string
	}
}

if (! class_exists ( "IndustryType" )) {
	/*
 *IndustryType
 */
	class IndustryType {
	}
}

if (! class_exists ( "ElectronicCheckingMerchantData" )) {
	/*
 *ElectronicCheckingMerchantData
 */
	class ElectronicCheckingMerchantData {
		public $OrginatorId; // string
		public $ProductId; // string
		public $SiteId; // string
	}
}

if (! class_exists ( "StoredValueMerchantData" )) {
	/*
 *StoredValueMerchantData
 */
	class StoredValueMerchantData {
		public $AgentChain; // string
		public $ClientNumber; // string
		public $IndustryType; // IndustryType
		public $SIC; // string
		public $StoreId; // string
		public $TerminalId; // string
	}
}

if (! class_exists ( "MerchantProfileTransactionData" )) {
	/*
 *MerchantProfileTransactionData
 */
	class MerchantProfileTransactionData {
		public $BankcardTransactionDataDefaults; // BankcardTransactionDataDefaults
	}
}

if (! class_exists ( "BankcardTransactionDataDefaults" )) {
	/*
 *BankcardTransactionDataDefaults
 */
	class BankcardTransactionDataDefaults {
		public $CurrencyCode; // TypeISOCurrencyCodeA3
		public $CustomerPresent; // CustomerPresent
		public $EntryMode; // EntryMode
		public $RequestACI; // RequestACI
		public $RequestAdvice; // RequestAdvice
	}
}

if (! class_exists ( "TypeISOCurrencyCodeA3" )) {
	/*
 *TypeISOCurrencyCodeA3
 */
	class TypeISOCurrencyCodeA3 {
	}
}

if (! class_exists ( "CustomerPresent" )) {
	/*
 *CustomerPresent
 */
	class CustomerPresent {
	}
}

if (! class_exists ( "EntryMode" )) {
	/*
 *EntryMode
 */
	class EntryMode {
	}
}

if (! class_exists ( "RequestACI" )) {
	/*
 *RequestACI
 */
	class RequestACI {
	}
}

if (! class_exists ( "RequestAdvice" )) {
	/*
 *RequestAdvice
 */
	class RequestAdvice {
	}
}

if (! class_exists ( "GetMerchantProfileIds" )) {
	/*
 *GetMerchantProfileIds
 */
	class GetMerchantProfileIds {
		public $sessionToken; // string
		public $serviceId; // string
		public $tenderType; // TenderType
	}
}

if (! class_exists ( "GetMerchantProfileIdsResponse" )) {
	/*
 *GetMerchantProfileIdsResponse
 */
	class GetMerchantProfileIdsResponse {
		public $GetMerchantProfileIdsResult; // ArrayOfstring
	}
}

if (! class_exists ( "GetMerchantProfilesByProfileId" )) {
	/*
 *GetMerchantProfilesByProfileId
 */
	class GetMerchantProfilesByProfileId {
		public $sessionToken; // string
		public $merchantProfileId; // string
	}
}

if (! class_exists ( "GetMerchantProfilesByProfileIdResponse" )) {
	/*
 *GetMerchantProfilesByProfileIdResponse
 */
	class GetMerchantProfilesByProfileIdResponse {
		public $GetMerchantProfilesByProfileIdResult; // ArrayOfMerchantProfile
	}
}

if (! class_exists ( "GetMerchantProfile" )) {
	/*
 *GetMerchantProfile
 */
	class GetMerchantProfile {
		public $sessionToken; // string
		public $merchantProfileId; // string
		public $serviceId; // string
		public $tenderType; // TenderType
	}
}

if (! class_exists ( "GetMerchantProfileResponse" )) {
	/*
 *GetMerchantProfileResponse
 */
	class GetMerchantProfileResponse {
		public $GetMerchantProfileResult; // MerchantProfile
	}
}

if (! class_exists ( "DeleteMerchantProfile" )) {
	/*
 *DeleteMerchantProfile
 */
	class DeleteMerchantProfile {
		public $sessionToken; // string
		public $merchantProfileId; // string
		public $serviceId; // string
		public $tenderType; // TenderType
	}
}

if (! class_exists ( "DeleteMerchantProfileResponse" )) {
	/*
 *DeleteMerchantProfileResponse
 */
	class DeleteMerchantProfileResponse {
	}
}

if (! class_exists ( "SaveMerchantProfiles" )) {
	/*
 *SaveMerchantProfiles
 */
	class SaveMerchantProfiles {
		public $sessionToken; // string
		public $serviceId; // string
		public $tenderType; // TenderType
		public $merchantProfiles; // ArrayOfMerchantProfile
	}
}


if (! class_exists ( "SaveMerchantProfilesResponse" )) {
	/*
 *SaveMerchantProfilesResponse
 */
	class SaveMerchantProfilesResponse {
	}
}

if (! class_exists ( "SignOnWithUsernamePasswordForServiceKey" )) {
	/*
 *SignOnWithUsernamePasswordForServiceKey
 */
	class SignOnWithUsernamePasswordForServiceKey {
		public $serviceKey; // string
		public $username; // string
		public $password; // string
	}
}

if (! class_exists ( "SignOnWithUsernamePasswordForServiceKeyResponse" )) {
	/*
 *SignOnWithUsernamePasswordForServiceKeyResponse
 */
	class SignOnWithUsernamePasswordForServiceKeyResponse {
		public $SignOnWithUsernamePasswordForServiceKeyResult; // string
	}
}

if (! class_exists ( "ResetPasswordForServiceKey" )) {
	/*
 *ResetPasswordForServiceKey
 */
	class ResetPasswordForServiceKey {
		public $serviceKey; // string
		public $userName; // string
	}
}

if (! class_exists ( "ResetPasswordForServiceKeyResponse" )) {
	/*
 *ResetPasswordForServiceKeyResponse
 */
	class ResetPasswordForServiceKeyResponse {
	}
}

if (! class_exists ( "ChangePasswordForServiceKey" )) {
	/*
 *ChangePasswordForServiceKey
 */
	class ChangePasswordForServiceKey {
		public $serviceKey; // string
		public $userName; // string
		public $password; // string
		public $newPassword; // string
	}
}

if (! class_exists ( "ChangePasswordForServiceKeyResponse" )) {
	/*
 *ChangePasswordForServiceKeyResponse
 */
	class ChangePasswordForServiceKeyResponse {
	}
}

if (! class_exists ( "ChangeUsernameForServiceKey" )) {
	/*
 *ChangeUsernameForServiceKey
 */
	class ChangeUsernameForServiceKey {
		public $serviceKey; // string
		public $userName; // string
		public $password; // string
		public $newUsername; // string
	}
}

if (! class_exists ( "ChangeUsernameForServiceKeyResponse" )) {
	/*
 *ChangeUsernameForServiceKeyResponse
 */
	class ChangeUsernameForServiceKeyResponse {
	}
}

if (! class_exists ( "ChangeEmailForServiceKey" )) {
	/*
 *ChangeEmailForServiceKey
 */
	class ChangeEmailForServiceKey {
		public $serviceKey; // string
		public $userName; // string
		public $password; // string
		public $newEmail; // string
	}
}

if (! class_exists ( "ChangeEmailForServiceKeyResponse" )) {
	/*
 *ChangeEmailForServiceKeyResponse
 */
	class ChangeEmailForServiceKeyResponse {
	}
}

if (! class_exists ( "GetPasswordExpirationForServiceKey" )) {
	/*
 *GetPasswordExpirationForServiceKey
 */
	class GetPasswordExpirationForServiceKey {
		public $serviceKey; // string
		public $userName; // string
		public $password; // string
	}
}

if (! class_exists ( "GetPasswordExpirationForServiceKeyResponse" )) {
	/*
 *GetPasswordExpirationForServiceKeyResponse
 */
	class GetPasswordExpirationForServiceKeyResponse {
		public $GetPasswordExpirationForServiceKeyResult; // dateTime
	}
}

if (! class_exists ( "ValidateMerchantProfile" )) {
	/*
 *ValidateMerchantProfile
 */
	class ValidateMerchantProfile {
		public $sessionToken; // string
		public $serviceId; // string
		public $tenderType; // TenderType
		public $merchantProfile; // MerchantProfile
	}
}

if (! class_exists ( "ValidateMerchantProfileResponse" )) {
	/*
 *ValidateMerchantProfileResponse
 */
	class ValidateMerchantProfileResponse {
	}
}

if (! class_exists ( "STSUnavailableFault" )) {
	/*
 *STSUnavailableFault
 */
	class STSUnavailableFault {
	}
}

if (! class_exists ( "BaseFault" )) {
	/*
 *BaseFault
 */
	class BaseFault {
		public $ErrorID; // int
		public $HelpURL; // string
		public $Operation; // string
		public $ProblemType; // string
	}
}

if (! class_exists ( "ExpiredTokenFault" )) {
	/*
 *ExpiredTokenFault
 */
	class ExpiredTokenFault {
	}
}

if (! class_exists ( "InvalidTokenFault" )) {
	/*
 *InvalidTokenFault
 */
	class InvalidTokenFault {
	}
}

if (! class_exists ( "AuthenticationFault" )) {
	/*
 *AuthenticationFault
 */
	class AuthenticationFault {
	}
}

if (! class_exists ( "BadAttemptThresholdExceededFault" )) {
	/*
 *BadAttemptThresholdExceededFault
 */
	class BadAttemptThresholdExceededFault {
	}
}

if (! class_exists ( "PasswordExpiredFault" )) {
	/*
 *PasswordExpiredFault
 */
	class PasswordExpiredFault {
	}
}

if (! class_exists ( "OneTimePasswordFault" )) {
	/*
 *OneTimePasswordFault
 */
	class OneTimePasswordFault {
	}
}

if (! class_exists ( "LockedByAdminFault" )) {
	/*
 *LockedByAdminFault
 */
	class LockedByAdminFault {
	}
}

if (! class_exists ( "SendEmailFault" )) {
	/*
 *SendEmailFault
 */
	class SendEmailFault {
	}
}

if (! class_exists ( "GeneratePasswordFault" )) {
	/*
 *GeneratePasswordFault
 */
	class GeneratePasswordFault {
	}
}

if (! class_exists ( "PasswordInvalidFault" )) {
	/*
 *PasswordInvalidFault
 */
	class PasswordInvalidFault {
	}
}

if (! class_exists ( "UserNotFoundFault" )) {
	/*
 *UserNotFoundFault
 */
	class UserNotFoundFault {
	}
}

if (! class_exists ( "InvalidEmailFault" )) {
	/*
 *InvalidEmailFault
 */
	class InvalidEmailFault {
	}
}

if (! class_exists ( "CWSFault" )) {
	/*
 *CWSFault
 */
	class CWSFault {
	}
}

if (! class_exists ( "CWSBaseFault" )) {
	/*
 *CWSBaseFault
 */
	class CWSBaseFault {
		public $ErrorID; // int
		public $HelpURL; // string
		public $Operation; // string
		public $ProblemType; // string
	}
}

if (! class_exists ( "CWSServiceInformationUnavailableFault" )) {
	/*
 *CWSServiceInformationUnavailableFault
 */
	class CWSServiceInformationUnavailableFault {
	}
}

if (! class_exists ( "CWSValidationResultFault" )) {
	/*
 *CWSValidationResultFault
 */
	class CWSValidationResultFault {
		public $Errors; // ArrayOfCWSValidationErrorFault
	}
}

if (! class_exists ( "CWSValidationErrorFault" )) {
	/*
 *CWSValidationErrorFault
 */
	class CWSValidationErrorFault {
		public $ErrorType; // CWSValidationErrorFault.EErrorType
		public $RuleKey; // string
		public $RuleLocationKey; // string
		public $RuleMessage; // string
		public $TransactionId; // string
	}
}

if (! class_exists ( "CWSValidationErrorFault.EErrorType" )) {
	/*
 *CWSValidationErrorFault.EErrorType
 */
	class CWSValidationErrorFault_EErrorType {
	}
}

class CWSServiceInformation extends SoapClient {

 private static $classmap = array( 
                                    'PingResponse' => 'PingResponse',
                                    'Ping' => 'Ping',
                                    'PingResponse' => 'PingResponse',
                                    'char' => 'char',
                                    'duration' => 'duration',
                                    'guid' => 'guid',
                                    'SignOnWithToken' => 'SignOnWithToken',
                                    'SignOnWithTokenResponse' => 'SignOnWithTokenResponse',
                                    'GetServiceInformation' => 'GetServiceInformation',
                                    'GetServiceInformationResponse' => 'GetServiceInformationResponse',
                                    'ServiceInformation' => 'ServiceInformation',
                                    'BankcardService' => 'BankcardService',
                                    'BankcardServiceAVSData' => 'BankcardServiceAVSData',
                                    'Operations' => 'Operations',
                                    'CloseBatch' => 'CloseBatch',
                                    'PurchaseCardLevel' => 'PurchaseCardLevel',
                                    'Tenders' => 'Tenders',
                                    'PINDebitReturnSupportType' => 'PINDebitReturnSupportType',
                                    'CreditAuthorizeSupportType' => 'CreditAuthorizeSupportType',
                                    'QueryRejectedSupportType' => 'QueryRejectedSupportType',
                                    'PinDebitUndoSupportType' => 'PinDebitUndoSupportType',
                                    'BatchAssignmentSupport' => 'BatchAssignmentSupport',
                                    'CreditReturnSupportType' => 'CreditReturnSupportType',
                                    'TrackDataSupportType' => 'TrackDataSupportType',
                                    'CreditReversalSupportType' => 'CreditReversalSupportType',
                                    'PartialApprovalSupportType' => 'PartialApprovalSupportType',
                                    'ElectronicCheckingService' => 'ElectronicCheckingService',
                                    'StoredValueService' => 'StoredValueService',
                                    'Workflow' => 'Workflow',
                                    'WorkflowService' => 'WorkflowService',
                                    'SaveApplicationData' => 'SaveApplicationData',
                                    'ApplicationData' => 'ApplicationData',
                                    'ApplicationLocation' => 'ApplicationLocation',
                                    'HardwareType' => 'HardwareType',
                                    'PINCapability' => 'PINCapability',
                                    'ReadCapability' => 'ReadCapability',
                                    'EncryptionType' => 'EncryptionType',
                                    'SaveApplicationDataResponse' => 'SaveApplicationDataResponse',
                                    'GetApplicationData' => 'GetApplicationData',
                                    'GetApplicationDataResponse' => 'GetApplicationDataResponse',
                                    'DeleteApplicationData' => 'DeleteApplicationData',
                                    'DeleteApplicationDataResponse' => 'DeleteApplicationDataResponse',
                                    'IsMerchantProfileInitialized' => 'IsMerchantProfileInitialized',
                                    'TenderType' => 'TenderType',
                                    'IsMerchantProfileInitializedResponse' => 'IsMerchantProfileInitializedResponse',
                                    'GetMerchantProfiles' => 'GetMerchantProfiles',
                                    'GetMerchantProfilesResponse' => 'GetMerchantProfilesResponse',
                                    'MerchantProfile' => 'MerchantProfile',
                                    'MerchantProfileMerchantData' => 'MerchantProfileMerchantData',
                                    'TypeISOLanguageCodeA3' => 'TypeISOLanguageCodeA3',
                                    'AddressInfo' => 'AddressInfo',
                                    'TypeStateProvince' => 'TypeStateProvince',
                                    'TypeISOCountryCodeA3' => 'TypeISOCountryCodeA3',
                                    'BankcardMerchantData' => 'BankcardMerchantData',
                                    'IndustryType' => 'IndustryType',
                                    'ElectronicCheckingMerchantData' => 'ElectronicCheckingMerchantData',
                                    'StoredValueMerchantData' => 'StoredValueMerchantData',
                                    'MerchantProfileTransactionData' => 'MerchantProfileTransactionData',
                                    'BankcardTransactionDataDefaults' => 'BankcardTransactionDataDefaults',
                                    'TypeISOCurrencyCodeA3' => 'TypeISOCurrencyCodeA3',
                                    'CustomerPresent' => 'CustomerPresent',
                                    'EntryMode' => 'EntryMode',
                                    'RequestACI' => 'RequestACI',
                                    'RequestAdvice' => 'RequestAdvice',
                                    'GetMerchantProfileIds' => 'GetMerchantProfileIds',
                                    'GetMerchantProfileIdsResponse' => 'GetMerchantProfileIdsResponse',
                                    'GetMerchantProfilesByProfileId' => 'GetMerchantProfilesByProfileId',
                                    'GetMerchantProfilesByProfileIdResponse' => 'GetMerchantProfilesByProfileIdResponse',
                                    'GetMerchantProfile' => 'GetMerchantProfile',
                                    'GetMerchantProfileResponse' => 'GetMerchantProfileResponse',
                                    'DeleteMerchantProfile' => 'DeleteMerchantProfile',
                                    'DeleteMerchantProfileResponse' => 'DeleteMerchantProfileResponse',
                                    'SaveMerchantProfiles' => 'SaveMerchantProfiles',
                                    'SaveMerchantProfilesResponse' => 'SaveMerchantProfilesResponse',
                                    'SignOnWithUsernamePasswordForServiceKey' => 'SignOnWithUsernamePasswordForServiceKey',
                                    'SignOnWithUsernamePasswordForServiceKeyResponse' => 'SignOnWithUsernamePasswordForServiceKeyResponse',
                                    'ResetPasswordForServiceKey' => 'ResetPasswordForServiceKey',
                                    'ResetPasswordForServiceKeyResponse' => 'ResetPasswordForServiceKeyResponse',
                                    'ChangePasswordForServiceKey' => 'ChangePasswordForServiceKey',
                                    'ChangePasswordForServiceKeyResponse' => 'ChangePasswordForServiceKeyResponse',
                                    'ChangeUsernameForServiceKey' => 'ChangeUsernameForServiceKey',
                                    'ChangeUsernameForServiceKeyResponse' => 'ChangeUsernameForServiceKeyResponse',
                                    'ChangeEmailForServiceKey' => 'ChangeEmailForServiceKey',
                                    'ChangeEmailForServiceKeyResponse' => 'ChangeEmailForServiceKeyResponse',
                                    'GetPasswordExpirationForServiceKey' => 'GetPasswordExpirationForServiceKey',
                                    'GetPasswordExpirationForServiceKeyResponse' => 'GetPasswordExpirationForServiceKeyResponse',
                                    'ValidateMerchantProfile' => 'ValidateMerchantProfile',
                                    'ValidateMerchantProfileResponse' => 'ValidateMerchantProfileResponse',
                                    'STSUnavailableFault' => 'STSUnavailableFault',
                                    'BaseFault' => 'BaseFault',
                                    'ExpiredTokenFault' => 'ExpiredTokenFault',
                                    'InvalidTokenFault' => 'InvalidTokenFault',
                                    'AuthenticationFault' => 'AuthenticationFault',
                                    'BadAttemptThresholdExceededFault' => 'BadAttemptThresholdExceededFault',
                                    'PasswordExpiredFault' => 'PasswordExpiredFault',
                                    'OneTimePasswordFault' => 'OneTimePasswordFault',
                                    'LockedByAdminFault' => 'LockedByAdminFault',
                                    'SendEmailFault' => 'SendEmailFault',
                                    'GeneratePasswordFault' => 'GeneratePasswordFault',
                                    'PasswordInvalidFault' => 'PasswordInvalidFault',
                                    'UserNotFoundFault' => 'UserNotFoundFault',
                                    'InvalidEmailFault' => 'InvalidEmailFault',
                                    'CWSFault' => 'CWSFault',
                                    'CWSBaseFault' => 'CWSBaseFault',
                                    'CWSServiceInformationUnavailableFault' => 'CWSServiceInformationUnavailableFault',
                                    'CWSValidationResultFault' => 'CWSValidationResultFault',
                                    'CWSValidationErrorFault' => 'CWSValidationErrorFault',
                                    'CWSValidationErrorFault.EErrorType' => 'CWSValidationErrorFault.EErrorType',
                                   );
	
	public function CWSServiceInformation($wsdl = "", $options = array()) {
		foreach ( self::$classmap as $key => $value ) {
			if (! isset ( $options ['classmap'] [$key] )) {
				$options ['classmap'] [$key] = $value;
			}
		}
		parent::__construct ( $wsdl, $options );
	}
	
	/*
   *  
   *
   * @param Ping $parameters
   * @return PingResponse
   */
  public function Ping(Ping $parameters) {
    return $this->__soapCall('Ping', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Sign on using an identity token.
 
				Identity token associated with your service key
				Session 
   * token 
   *
   * @param SignOnWithToken $parameters
   * @return SignOnWithTokenResponse
   */
  public function SignOnWithToken(SignOnWithToken $parameters) {
    return $this->__soapCall('SignOnWithToken', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Retrieve service information.
 
				Session token
				Service information associated with 
   * the session token 
   *
   * @param GetServiceInformation $parameters
   * @return GetServiceInformationResponse
   */
  public function GetServiceInformation(GetServiceInformation $parameters) {
    return $this->__soapCall('GetServiceInformation', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Save application configuration data.
 
				Session token
				Application common configuration 
   * data
				Application profile ID 
   *
   * @param SaveApplicationData $parameters
   * @return SaveApplicationDataResponse
   */
  public function SaveApplicationData(SaveApplicationData $parameters) {
    return $this->__soapCall('SaveApplicationData', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Retrieves all current application configuration data associated with the Service Key.
 
   * 
				Session token
				Application profile ID returned from SaveApplicationData()
				Application 
   * common configuration data associated with the session token 
   *
   * @param GetApplicationData $parameters
   * @return GetApplicationDataResponse
   */
  public function GetApplicationData(GetApplicationData $parameters) {
    return $this->__soapCall('GetApplicationData', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Deletes application configuration data.
 
				Session token
				Application profile ID 
   * 
   *
   * @param DeleteApplicationData $parameters
   * @return DeleteApplicationDataResponse
   */
  public function DeleteApplicationData(DeleteApplicationData $parameters) {
    return $this->__soapCall('DeleteApplicationData', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Tests whether merchant profile is initialized for a specific Tender Type.
 
				Session 
   * token
				Service ID
				Merchant profile ID
				Tender type
				
					true if the merchant 
   * profile has been initialized 
   *
   * @param IsMerchantProfileInitialized $parameters
   * @return IsMerchantProfileInitializedResponse
   */
  public function IsMerchantProfileInitialized(IsMerchantProfileInitialized $parameters) {
    return $this->__soapCall('IsMerchantProfileInitialized', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Retrieves all merchant profiles associated with a specific Service ID and Tender Type.
 
   * 
				Session token
				Service ID
				Tender type
				Collection of merchant profiles 
   * 
   *
   * @param GetMerchantProfiles $parameters
   * @return GetMerchantProfilesResponse
   */
  public function GetMerchantProfiles(GetMerchantProfiles $parameters) {
    return $this->__soapCall('GetMerchantProfiles', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Retrieves all merchant profile IDs associated with a specific Service ID and Tender Type.
 
   * 
				Session token
				Service ID
				Tender type
				Collection of merchant profile IDs 
   * 
   *
   * @param GetMerchantProfileIds $parameters
   * @return GetMerchantProfileIdsResponse
   */
  public function GetMerchantProfileIds(GetMerchantProfileIds $parameters) {
    return $this->__soapCall('GetMerchantProfileIds', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Retrieves a specific merchant's merchant profiles for all Service IDs and Tender Types.
 
   * 
				Session token
				Merchant profile ID
				Collection of merchant profiles 
   *
   * @param GetMerchantProfilesByProfileId $parameters
   * @return GetMerchantProfilesByProfileIdResponse
   */
  public function GetMerchantProfilesByProfileId(GetMerchantProfilesByProfileId $parameters) {
    return $this->__soapCall('GetMerchantProfilesByProfileId', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Retrieves the merchant profile associated with a specific Service ID and Tender Type.
 
   * 
				Session token
				Merchant profile ID
				Service ID
				Tender type
				The requested 
   * merchant profile 
   *
   * @param GetMerchantProfile $parameters
   * @return GetMerchantProfileResponse
   */
  public function GetMerchantProfile(GetMerchantProfile $parameters) {
    return $this->__soapCall('GetMerchantProfile', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Deletes a specific merchant profile for a Tender Type.
 
				Session token
				Merchant 
   * profile ID
				Service ID
				Tender type 
   *
   * @param DeleteMerchantProfile $parameters
   * @return DeleteMerchantProfileResponse
   */
  public function DeleteMerchantProfile(DeleteMerchantProfile $parameters) {
    return $this->__soapCall('DeleteMerchantProfile', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Saves one or more merchant profiles for a Tender Type.
 
				Session token
				Service 
   * ID
				Tender type
				Merchant profiles 
   *
   * @param SaveMerchantProfiles $parameters
   * @return SaveMerchantProfilesResponse
   */
  public function SaveMerchantProfiles(SaveMerchantProfiles $parameters) {
    return $this->__soapCall('SaveMerchantProfiles', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Sign on using a username and password.
 
				Service key to sign on
				Username associated 
   * with the specified service key
				Password associated with the specified service key 
   * and username
				Session token 
   *
   * @param SignOnWithUsernamePasswordForServiceKey $parameters
   * @return SignOnWithUsernamePasswordForServiceKeyResponse
   */
  public function SignOnWithUsernamePasswordForServiceKey(SignOnWithUsernamePasswordForServiceKey $parameters) {
    return $this->__soapCall('SignOnWithUsernamePasswordForServiceKey', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Reset the password for the specified service key and username.
 
				Service key
				User 
   * name associated with specified service key 
   *
   * @param ResetPasswordForServiceKey $parameters
   * @return ResetPasswordForServiceKeyResponse
   */
  public function ResetPasswordForServiceKey(ResetPasswordForServiceKey $parameters) {
    return $this->__soapCall('ResetPasswordForServiceKey', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Change the password for the specified service key and username.
 
				Service key
				Username 
   * associated with specified service key
				Password currently associated with specified 
   * service key and username
				New password to associate with specified service key and 
   * username 
   *
   * @param ChangePasswordForServiceKey $parameters
   * @return ChangePasswordForServiceKeyResponse
   */
  public function ChangePasswordForServiceKey(ChangePasswordForServiceKey $parameters) {
    return $this->__soapCall('ChangePasswordForServiceKey', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Change the username for the specified service key and username.
 
				Service key
				Username 
   * associated with specified service key
				Password associated with specified service key 
   * and username
				New username to associate with specified service key 
   *
   * @param ChangeUsernameForServiceKey $parameters
   * @return ChangeUsernameForServiceKeyResponse
   */
  public function ChangeUsernameForServiceKey(ChangeUsernameForServiceKey $parameters) {
    return $this->__soapCall('ChangeUsernameForServiceKey', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Change the email address for the specified service key and username.
 
				Service key
				Username 
   * associated with specified service key
				Password associated with specified service key 
   * and username
				New email to associate with specified service key and username 
   *
   * @param ChangeEmailForServiceKey $parameters
   * @return ChangeEmailForServiceKeyResponse
   */
  public function ChangeEmailForServiceKey(ChangeEmailForServiceKey $parameters) {
    return $this->__soapCall('ChangeEmailForServiceKey', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Change the username for the specified service key and username.
 
				Service key
				Username 
   * associated with specified service key
				Password associated with specified service key 
   * and username 
   *
   * @param GetPasswordExpirationForServiceKey $parameters
   * @return GetPasswordExpirationForServiceKeyResponse
   */
  public function GetPasswordExpirationForServiceKey(GetPasswordExpirationForServiceKey $parameters) {
    return $this->__soapCall('GetPasswordExpirationForServiceKey', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

  /*
   * Validates a provided merchant proifile. If the profile is invalid, the operation will 
   * throw a 
 CWSValidationResultFault containing the details of the exception. If your application 
   * does not implement 
 unmanaged merchant profiles – you do not need to call this method. 
   * Your merchant profile will automatically 
 be validated when you call SaveMerchantProfiles.
 
   * 
				The session token associated with this call.
				The service id of record for the 
   * profile.
				The tender type of record for the profile.
				The merchant profile. 
   *
   * @param ValidateMerchantProfile $parameters
   * @return ValidateMerchantProfileResponse
   */
  public function ValidateMerchantProfile(ValidateMerchantProfile $parameters) {
    return $this->__soapCall('ValidateMerchantProfile', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/ServiceInformation',
            'soapaction' => ''
           )
      );
  }

}

?>
