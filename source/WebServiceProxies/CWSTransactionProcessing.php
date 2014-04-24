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
 * CwsTransactionProcessing class file
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

if (! class_exists ( "TransactionData" )) {
	/*
 *TransactionData
 */
	class TransactionData {
		public $Amount; // decimal
		public $CurrencyCode; // TypeISOCurrencyCodeA3
		public $TransactionDateTime; // string
		public $CampaignId; // string
		public $Reference; // string
	}
}

if (! class_exists ( "TypeISOCurrencyCodeA3" )) {
	/*
 *TypeISOCurrencyCodeA3
 */
	class TypeISOCurrencyCodeA3 {
	}
}

if (! class_exists ( "Transaction" )) {
	/*
 *Transaction
 */
	class Transaction {
		public $CustomerData; // TransactionCustomerData
		public $ReportingData; // TransactionReportingData
		public $Addendum; // Addendum
	}
}

if (! class_exists ( "TransactionCustomerData" )) {
	/*
 *TransactionCustomerData
 */
	class TransactionCustomerData {
		public $BillingData; // CustomerInfo
		public $CustomerId; // string
		public $CustomerTaxId; // string
		public $ShippingData; // CustomerInfo
	}
}

if (! class_exists ( "CustomerInfo" )) {
	/*
 *CustomerInfo
 */
	class CustomerInfo {
		public $Name; // NameInfo
		public $Address; // AddressInfo
		public $BusinessName; // string
		public $Phone; // string
		public $Fax; // string
		public $Email; // string
	}
}

if (! class_exists ( "NameInfo" )) {
	/*
 *NameInfo
 */
	class NameInfo {
		public $Title; // string
		public $First; // string
		public $Middle; // string
		public $Last; // string
		public $Suffix; // string
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
		public $StateProvince; // string
		public $PostalCode; // string
		public $County; // string
		public $CountryCode; // TypeISOCountryCodeA3
	}
}

if (! class_exists ( "TypeISOCountryCodeA3" )) {
	/*
 *TypeISOCountryCodeA3
 */
	class TypeISOCountryCodeA3 {
	}
}

if (! class_exists ( "PersonalInfo" )) {
	/*
 *PersonalInfo
 */
	class PersonalInfo {
		public $Company; // string
		public $DateOfBirth; // dateTime
		public $DriversLicense; // DriversLicense
		public $EmployeeIdNumber; // string
		public $Gender; // string
		public $GovernmentIdNumber; // string
		public $MilitaryIdNumber; // string
		public $SocialSecurityNumber; // string
		public $TaxId; // string
	}
}

if (! class_exists ( "DriversLicense" )) {
	/*
 *DriversLicense
 */
	class DriversLicense {
		public $Number; // string
		public $State; // TypeStateProvince
		public $Track1; // string
		public $Track2; // string
	}
}

if (! class_exists ( "TypeStateProvince" )) {
	/*
 *TypeStateProvince
 */
	class TypeStateProvince {
	}
}

if (! class_exists ( "TransactionReportingData" )) {
	/*
 *TransactionReportingData
 */
	class TransactionReportingData {
		public $Comment; // string
		public $Description; // string
		public $Reference; // string
	}
}

if (! class_exists ( "Addendum" )) {
	/*
 *Addendum
 */
	class Addendum {
		public $Unmanaged; // Unmanaged
	}
}

if (! class_exists ( "Unmanaged" )) {
	/*
 *Unmanaged
 */
	class Unmanaged {
		public $Any; // ArrayOfstring
	}
}

if (! class_exists ( "TransactionTenderData" )) {
	/*
 *TransactionTenderData
 */
	class TransactionTenderData {
		public $PaymentAccountDataToken; // string
		public $SecurePaymentAccountData; // string
		public $EncryptionKeyId; // string
		public $SwipeStatus; // string
		public $DeviceSerialNumber; // string
	}
}

if (! class_exists ( "CVDataProvided" )) {
	/*
 *CVDataProvided
 */
	class CVDataProvided {
	}
}

if (! class_exists ( "IndustryType" )) {
	/*
 *IndustryType
 */
	class IndustryType {
	}
}

if (! class_exists ( "EntryMode" )) {
	/*
 *EntryMode
 */
	class EntryMode {
	}
}

if (! class_exists ( "AlternativeMerchantData" )) {
	/*
 *AlternativeMerchantData
 */
	class AlternativeMerchantData {
		public $CustomerServiceInternet; // string
		public $CustomerServicePhone; // string
		public $Description; // string
		public $SIC; // string
		public $Address; // AddressInfo
		public $MerchantId; // string
		public $Name; // string
	}
}

if (! class_exists ( "PINlessDebitData" )) {
	/*
 *PINlessDebitData
 */
	class PINlessDebitData {
		public $BillPayServiceData; // BillPayServiceData
		public $PayeeData; // PayeeData
	}
}

if (! class_exists ( "BillPayServiceData" )) {
	/*
 *BillPayServiceData
 */
	class BillPayServiceData {
		public $CompanyName; // string
		public $CompanyAddress; // AddressInfo
	}
}

if (! class_exists ( "PayeeData" )) {
	/*
 *PayeeData
 */
	class PayeeData {
		public $CompanyName; // string
		public $Phone; // string
		public $AccountNumber; // string
	}
}

if (! class_exists ( "Manage" )) {
	/*
 *Manage
 */
	class Manage {
		public $TransactionId; // string
		public $Addendum; // Addendum
	}
}

if (! class_exists ( "ReturnById" )) {
	/*
 *Return
 */
	class ReturnById {
		public $TransactionId; // string
		public $Addendum; // Addendum
		public $TransactionDateTime; // string
	}
}

if (! class_exists ( "Response" )) {
	/*
 *Response
 */
	class Response {
		public $Status; // Status
		public $StatusCode; // string
		public $StatusMessage; // string
		public $TransactionId; // string
		public $OriginatorTransactionId; // string
		public $ServiceTransactionId; // string
		public $ServiceTransactionDateTime; // ServiceTransactionDateTime
		public $Addendum; // Addendum
		public $CaptureState; // CaptureState
		public $TransactionState; // TransactionState
		public $IsAcknowledged; // boolean
		public $Reference; // string
	}
}

if (! class_exists ( "Status" )) {
	/*
 *Status
 */
	class Status {
	}
}

if (! class_exists ( "ServiceTransactionDateTime" )) {
	/*
 *ServiceTransactionDateTime
 */
	class ServiceTransactionDateTime {
		public $Date; // string
		public $Time; // string
		public $TimeZone; // string
	}
}

if (! class_exists ( "CaptureState" )) {
	/*
 *CaptureState
 */
	class CaptureState {
	}
}

if (! class_exists ( "TransactionState" )) {
	/*
 *TransactionState
 */
	class TransactionState {
	}
}

if (! class_exists ( "SummaryData" )) {
	/*
 *SummaryData
 */
	class SummaryData {
		public $CashBackTotals; // SummaryTotals
		public $CreditReturnTotals; // SummaryTotals
		public $CreditTotals; // SummaryTotals
		public $DebitReturnTotals; // SummaryTotals
		public $DebitTotals; // SummaryTotals
		public $NetTotals; // SummaryTotals
		public $VoidTotals; // SummaryTotals
	}
}

if (! class_exists ( "SummaryTotals" )) {
	/*
 *SummaryTotals
 */
	class SummaryTotals {
		public $NetAmount; // decimal
		public $Count; // int
	}
}

if (! class_exists ( "CVResult" )) {
	/*
 *CVResult
 */
	class CVResult {
	}
}

if (! class_exists ( "Undo" )) {
/*
 *Undo
 */
	class Undo {
		public $TransactionId; // string
		public $Addendum; // Addendum
	}
}

if (! class_exists ( "Capture" )) {
	/*
 *Capture
 */
	class Capture {
		public $TransactionId; // string
		public $Addendum; // Addendum
	}
}

if (! class_exists ( "Adjust" )) {
	/*
 *Adjust
 */
	class Adjust {
		public $Amount; // decimal
		public $TransactionId; // string
		public $Addendum; // Addendum
		public $TipAmount; // decimal
	}
}

if (! class_exists ( "BankcardTransactionData" )) {
	/*
 *BankcardTransactionData
 */
	class BankcardTransactionData {
		public $AccountType; // AccountType
		public $AlternativeMerchantData; // AlternativeMerchantData
		public $ApprovalCode; // string
		public $CashBackAmount; // decimal
		public $CustomerPresent; // CustomerPresent
		public $EmployeeId; // string
		public $EntryMode; // EntryMode
		public $GoodsType; // GoodsType
		public $InternetTransactionData; // InternetTransactionData
		public $InvoiceNumber; // string
		public $OrderNumber; // string
		public $SignatureCaptured; // boolean
		public $TerminalId; // string
		public $TipAmount; // decimal
		public $BatchAssignment; // string
		public $IsPartialShipment; // boolean
		public $FeeAmount; // decimal
		public $LaneId; // string
		public $PartialApprovalCapable; // PartialApprovalSupportType
		public $ScoreThreshold; // string
		public $IsQuasiCash; // boolean
		public $TransactionCode; // TransactionCode
	}
}

if (! class_exists ( "BankcardTransaction" )) {
	/*
 *BankcardTransaction
 */
	class BankcardTransaction {
		public $ApplicationConfigurationData; // BankcardApplicationConfigurationData
		public $TenderData; // BankcardTenderData
		public $TransactionData; // BankcardTransactionData
	}
}

if (! class_exists ( "BillPayment" )) {
	/*
 *BillPayment
 */
	class BillPayment {
	}
}

if (! class_exists ( "RequestCommercialCard" )) {
	/*
 *RequestCommercialCard
 */
	class RequestCommercialCard {
	}
}

if (! class_exists ( "ExistingDebt" )) {
	/*
 *ExistingDebt
 */
	class ExistingDebt {
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

if (! class_exists ( "BankcardTenderData" )) {
	/*
 *BankcardTenderData
 */
	class BankcardTenderData {
		public $CardData; // CardData
		public $CardSecurityData; // CardSecurityData
		public $EcommerceSecurityData; // EcommerceSecurityData
	}
}

if (! class_exists ( "CardData" )) {
	/*
 *CardData
 */
	class CardData {
		public $CardType; // TypeCardType
		public $CardholderName; // string
		public $PAN; // string
		public $Expire; // string
		public $Track1Data; // string
		public $Track2Data; // string
	}
}

if (! class_exists ( "TypeCardType" )) {
	/*
 *TypeCardType
 */
	class TypeCardType {
	}
}

if (! class_exists ( "CardSecurityData" )) {
	/*
 *CardSecurityData
 */
	class CardSecurityData {
		public $AVSData; // AVSData
		public $CVDataProvided; // CVDataProvided
		public $CVData; // string
		public $KeySerialNumber; // string
		public $PIN; // string
		public $IdentificationInformation; // string
	}
}

if (! class_exists ( "AVSData" )) {
	/*
 *AVSData
 */
	class AVSData {
		public $CardholderName; // string
		public $Street; // string
		public $City; // string
		public $StateProvince; // string
		public $PostalCode; // string
		public $Country; // TypeISOCountryCodeA3
		public $Phone; // string
		public $Email; // string
	}
}

if (! class_exists ( "EcommerceSecurityData" )) {
	/*
 *EcommerceSecurityData
 */
	class EcommerceSecurityData {
		public $TokenData; // string
		public $TokenIndicator; // TokenIndicator
		public $XID; // string
	}
}

if (! class_exists ( "TokenIndicator" )) {
	/*
 *TokenIndicator
 */
	class TokenIndicator {
	}
}

if (! class_exists ( "BankcardApplicationConfigurationData" )) {
	/*
 *BankcardApplicationConfigurationData
 */
	class BankcardApplicationConfigurationData {
		public $ApplicationAttended; // boolean
		public $ApplicationLocation; // ApplicationLocation
		public $HardwareType; // HardwareType
		public $PINCapability; // PINCapability
		public $ReadCapability; // ReadCapability
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

if (! class_exists ( "AccountType" )) {
	/*
 *AccountType
 */
	class AccountType {
	}
}

if (! class_exists ( "CustomerPresent" )) {
	/*
 *CustomerPresent
 */
	class CustomerPresent {
	}
}

if (! class_exists ( "GoodsType" )) {
	/*
 *GoodsType
 */
	class GoodsType {
	}
}

if (! class_exists ( "InternetTransactionData" )) {
	/*
 *InternetTransactionData
 */
	class InternetTransactionData {
		public $IpAddress; // string
		public $SessionId; // string
	}
}

if (! class_exists ( "PartialApprovalSupportType" )) {
	/*
 *PartialApprovalSupportType
 */
	class PartialApprovalSupportType {
	}
}

if (! class_exists ( "TransactionCode" )) {
	/*
 *TransactionCode
 */
	class TransactionCode {
	}
}

if (! class_exists ( "ManagedBilling" )) {
	/*
 *ManagedBilling
 */
	class ManagedBilling {
		public $DownPayment; // decimal
		public $Installments; // ManagedBillingInstallments
		public $Interval; // Interval
		public $Period; // int
		public $StartDate; // dateTime
	}
}

if (! class_exists ( "ManagedBillingInstallments" )) {
	/*
 *ManagedBillingInstallments
 */
	class ManagedBillingInstallments {
		public $Amount; // decimal
		public $Count; // int
	}
}

if (! class_exists ( "Interval" )) {
	/*
 *Interval
 */
	class Interval {
	}
}

if (! class_exists ( "Level2Data" )) {
	/*
 *Level2Data
 */
	class Level2Data {
		public $BaseAmount; // decimal
		public $CommodityCode; // string
		public $CompanyName; // string
		public $CustomerCode; // string
		public $DestinationCountryCode; // TypeISOCountryCodeA3
		public $DestinationPostal; // string
		public $Description; // string
		public $DiscountAmount; // decimal
		public $DutyAmount; // decimal
		public $FreightAmount; // decimal
		public $MiscHandlingAmount; // decimal
		public $OrderDate; // dateTime
		public $OrderNumber; // string
		public $RequesterName; // string
		public $ShipFromPostalCode; // string
		public $ShipmentId; // string
		public $TaxExempt; // TaxExempt
		public $Tax; // Tax
	}
}

if (! class_exists ( "TaxExempt" )) {
	/*
 *TaxExempt
 */
	class TaxExempt {
		public $IsTaxExempt; // IsTaxExempt
		public $TaxExemptNumber; // string
	}
}

if (! class_exists ( "IsTaxExempt" )) {
	/*
 *IsTaxExempt
 */
	class IsTaxExempt {
	}
}

if (! class_exists ( "Tax" )) {
	/*
 *Tax
 */
	class Tax {
		public $Amount; // decimal
		public $Rate; // decimal
		public $InvoiceNumber; // string
		public $ItemizedTaxes; // ArrayOfItemizedTax
	}
}

if (! class_exists ( "ItemizedTax" )) {
	/*
 *ItemizedTax
 */
	class ItemizedTax {
		public $Amount; // decimal
		public $Rate; // decimal
		public $Type; // TypeTaxType
	}
}

if (! class_exists ( "TypeTaxType" )) {
	/*
 *TypeTaxType
 */
	class TypeTaxType {
	}
}

if (! class_exists ( "LineItemDetail" )) {
	/*
 *LineItemDetail
 */
	class LineItemDetail {
		public $Amount; // decimal
		public $CommodityCode; // string
		public $Description; // string
		public $DiscountAmount; // decimal
		public $DiscountIncluded; // boolean
		public $ProductCode; // string
		public $Quantity; // decimal
		public $Tax; // Tax
		public $TaxIncluded; // boolean
		public $UnitOfMeasure; // TypeUnitOfMeasure
		public $UnitPrice; // decimal
		public $UPC; // string
	}
}

if (! class_exists ( "TypeUnitOfMeasure" )) {
	/*
 *TypeUnitOfMeasure
 */
	class TypeUnitOfMeasure {
	}
}

if (! class_exists ( "IIASData" )) {
	/*
 *IIASData
 */
	class IIASData {
		public $HealthcareAmount; // decimal
		public $ClinicOtherAmount; // decimal
		public $DentalAmount; // decimal
		public $PrescriptionAmount; // decimal
		public $VisionAmount; // decimal
		public $IIASDesignation; // IIASDesignation
	}
}

if (! class_exists ( "IIASDesignation" )) {
	/*
 *IIASDesignation
 */
	class IIASDesignation {
	}
}

if (! class_exists ( "BankcardReturn" )) {
	/*
 *BankcardReturn
 */
	class BankcardReturn {
		public $Amount; // decimal
		public $TenderData; // BankcardTenderData
		public $FeeAmount; // decimal
		public $TransactionCode; // TransactionCode
	}
}

if (! class_exists ( "BankcardTransactionResponse" )) {
	/*
 *BankcardTransactionResponse
 */
	class BankcardTransactionResponse {
		public $Amount; // decimal
		public $CardType; // TypeCardType
		public $FeeAmount; // decimal
		public $ApprovalCode; // string
		public $AVSResult; // AVSResult
		public $BatchId; // string
		public $CVResult; // CVResult
		public $CardLevel; // string
		public $DowngradeCode; // string
		public $MaskedPAN; // string
		public $PaymentAccountDataToken; // string
		public $RetrievalReferenceNumber; // string
		public $Resubmit; // Resubmit
		public $SettlementDate; // dateTime
		public $FinalBalance; // decimal
		public $OrderId; // string
		public $CashBackAmount; // decimal
		public $PrepaidCard; // PrepaidCard
		public $Expire; // string
	}
}

if (! class_exists ( "AdviceResponse" )) {
	/*
 *AdviceResponse
 */
	class AdviceResponse {
	}
}

if (! class_exists ( "CommercialCardResponse" )) {
	/*
 *CommercialCardResponse
 */
	class CommercialCardResponse {
	}
}

if (! class_exists ( "BankcardCaptureResponse" )) {
	/*
 *BankcardCaptureResponse
 */
	class BankcardCaptureResponse {
		public $BatchId; // string
		public $IndustryType; // IndustryType
		public $TransactionSummaryData; // TransactionSummaryData
		public $PrepaidCard; // PrepaidCard
	}
}

if (! class_exists ( "TransactionSummaryData" )) {
	/*
 *TransactionSummaryData
 */
	class TransactionSummaryData {
		public $CashBackTotals; // Totals
		public $NetTotals; // Totals
		public $ReturnTotals; // Totals
		public $SaleTotals; // Totals
		public $VoidTotals; // Totals
		public $PINDebitReturnTotals; // Totals
		public $PINDebitSaleTotals; // Totals
	}
}

if (! class_exists ( "Totals" )) {
	/*
 *Totals
 */
	class Totals {
		public $NetAmount; // decimal
		public $Count; // int
	}
}

if (! class_exists ( "PrepaidCard" )) {
	/*
 *PrepaidCard
 */
	class PrepaidCard {
	}
}

if (! class_exists ( "AVSResult" )) {
	/*
 *AVSResult
 */
	class AVSResult {
		public $ActualResult; // string
		public $AddressResult; // AddressResult
		public $CountryResult; // CountryResult
		public $StateResult; // StateResult
		public $PostalCodeResult; // PostalCodeResult
		public $PhoneResult; // PhoneResult
		public $CardholderNameResult; // CardholderNameResult
		public $CityResult; // CityResult
	}
}

if (! class_exists ( "AddressResult" )) {
	/*
 *AddressResult
 */
	class AddressResult {
	}
}

if (! class_exists ( "CountryResult" )) {
	/*
 *CountryResult
 */
	class CountryResult {
	}
}

if (! class_exists ( "StateResult" )) {
	/*
 *StateResult
 */
	class StateResult {
	}
}

if (! class_exists ( "PostalCodeResult" )) {
	/*
 *PostalCodeResult
 */
	class PostalCodeResult {
	}
}

if (! class_exists ( "PhoneResult" )) {
	/*
 *PhoneResult
 */
	class PhoneResult {
	}
}

if (! class_exists ( "CardholderNameResult" )) {
	/*
 *CardholderNameResult
 */
	class CardholderNameResult {
	}
}

if (! class_exists ( "CityResult" )) {
	/*
 *CityResult
 */
	class CityResult {
	}
}

if (! class_exists ( "Resubmit" )) {
	/*
 *Resubmit
 */
	class Resubmit {
	}
}

if (! class_exists ( "BankcardUndo" )) {
	/*
 *BankcardUndo
 */
	class BankcardUndo {
		public $PINDebitReason; // PINDebitUndoReason
		public $TenderData; // BankcardTenderData
		public $ForceVoid; // boolean
	}
}

if (! class_exists ( "PINDebitUndoReason" )) {
	/*
 *PINDebitUndoReason
 */
	class PINDebitUndoReason {
	}
}

if (! class_exists ( "BankcardCapture" )) {
	/*
 *BankcardCapture
 */
	class BankcardCapture {
		public $Amount; // decimal
		public $ChargeType; // ChargeType
		public $ShipDate; // dateTime
		public $TipAmount; // decimal
	}
}

if (! class_exists ( "ChargeType" )) {
	/*
 *ChargeType
 */
	class ChargeType {
	}
}

if (! class_exists ( "BankcardTransactionDataPro" )) {
	/*
 *BankcardTransactionDataPro
 */
	class BankcardTransactionDataPro {
		public $ManagedBilling; // ManagedBilling
		public $Level2Data; // Level2Data
		public $LineItemDetails; // ArrayOfLineItemDetail
		public $PINlessDebitData; // PINlessDebitData
		public $IIASData; // IIASData
	}
}

if (! class_exists ( "BankcardTransactionPro" )) {
	/*
 *BankcardTransactionPro
 */
	class BankcardTransactionPro {
		public $InterchangeData; // BankcardInterchangeData
	}
}

if (! class_exists ( "BankcardInterchangeData" )) {
	/*
 *BankcardInterchangeData
 */
	class BankcardInterchangeData {
		public $BillPayment; // BillPayment
		public $RequestCommercialCard; // RequestCommercialCard
		public $ExistingDebt; // ExistingDebt
		public $RequestACI; // RequestACI
		public $TotalNumberOfInstallments; // int
		public $CurrentInstallmentNumber; // int
		public $RequestAdvice; // RequestAdvice
	}
}

if (! class_exists ( "BankcardTransactionResponsePro" )) {
	/*
 *BankcardTransactionResponsePro
 */
	class BankcardTransactionResponsePro {
		public $AdviceResponse; // AdviceResponse
		public $CommercialCardResponse; // CommercialCardResponse
		public $ReturnedACI; // string
	}
}

if (! class_exists ( "BankcardReturnPro" )) {
	/*
 *BankcardReturnPro
 */
	class BankcardReturnPro {
		public $LineItemDetails; // ArrayOfLineItemDetail
	}
}

if (! class_exists ( "BankcardCapturePro" )) {
	/*
 *BankcardCapturePro
 */
	class BankcardCapturePro {
		public $MultiplePartialCapture; // boolean
		public $Level2Data; // Level2Data
		public $LineItemDetails; // ArrayOfLineItemDetail
		public $ShippingData; // CustomerInfo
	}
}

if (! class_exists ( "BankcardCaptureResponsePro" )) {
	/*
 *BankcardCaptureResponsePro
 */
	class BankcardCaptureResponsePro {
	}
}

if (! class_exists ( "ElectronicCheckingTransactionData" )) {
	/*
 *ElectronicCheckingTransactionData
 */
	class ElectronicCheckingTransactionData {
		public $EffectiveDate; // dateTime
		public $IsRecurring; // boolean
		public $PayeeEmail; // string
		public $PayeeId; // string
		public $SECCode; // SECCode
		public $ServiceType; // ServiceType
		public $TransactionType; // TransactionType
	}
}

if (! class_exists ( "SECCode" )) {
	/*
 *SECCode
 */
	class SECCode {
	}
}

if (! class_exists ( "ServiceType" )) {
	/*
 *ServiceType
 */
	class ServiceType {
	}
}

if (! class_exists ( "TransactionType" )) {
	/*
 *TransactionType
 */
	class TransactionType {
	}
}

if (! class_exists ( "ElectronicCheckingCustomerData" )) {
	/*
 *ElectronicCheckingCustomerData
 */
	class ElectronicCheckingCustomerData {
		public $AdditionalBillingData; // PersonalInfo
	}
}

if (! class_exists ( "ElectronicCheckingTenderData" )) {
	/*
 *ElectronicCheckingTenderData
 */
	class ElectronicCheckingTenderData {
		public $CheckData; // CheckData
	}
}

if (! class_exists ( "CheckData" )) {
	/*
 *CheckData
 */
	class CheckData {
		public $AccountNumber; // string
		public $CheckCountryCode; // CheckCountryCode
		public $CheckNumber; // string
		public $OwnerType; // OwnerType
		public $RoutingNumber; // string
		public $UseType; // UseType
	}
}

if (! class_exists ( "CheckCountryCode" )) {
	/*
 *CheckCountryCode
 */
	class CheckCountryCode {
	}
}

if (! class_exists ( "OwnerType" )) {
	/*
 *OwnerType
 */
	class OwnerType {
	}
}

if (! class_exists ( "UseType" )) {
	/*
 *UseType
 */
	class UseType {
	}
}

if (! class_exists ( "ElectronicCheckingTransaction" )) {
	/*
 *ElectronicCheckingTransaction
 */
	class ElectronicCheckingTransaction {
		public $TenderData; // ElectronicCheckingTenderData
		public $TransactionData; // ElectronicCheckingTransactionData
	}
}

if (! class_exists ( "ElectronicCheckingTransactionResponse" )) {
	/*
 *ElectronicCheckingTransactionResponse
 */
	class ElectronicCheckingTransactionResponse {
		public $ACHCapable; // boolean
		public $Amount; // decimal
		public $ApprovalCode; // string
		public $ModifiedAccountNumber; // string
		public $ModifiedRoutingNumber; // string
		public $PaymentAccountDataToken; // string
		public $ReturnInformation; // ReturnInformation
		public $SubmitDate; // dateTime
	}
}

if (! class_exists ( "ReturnInformation" )) {
	/*
 *ReturnInformation
 */
	class ReturnInformation {
		public $ReturnCode; // string
		public $ReturnDate; // dateTime
		public $ReturnReason; // string
	}
}

if (! class_exists ( "ElectronicCheckingCaptureResponse" )) {
	/*
 *ElectronicCheckingCaptureResponse
 */
	class ElectronicCheckingCaptureResponse {
		public $SummaryData; // SummaryData
	}
}

if (! class_exists ( "StoredValueTransaction" )) {
	/*
 *StoredValueTransaction
 */
	class StoredValueTransaction {
		public $TenderData; // StoredValueTenderData
		public $TransactionData; // StoredValueTransactionData
	}
}

if (! class_exists ( "StoredValueTenderData" )) {
	/*
 *StoredValueTenderData
 */
	class StoredValueTenderData {
		public $CardData; // CardData
		public $CardSecurityData; // CardSecurityData
		public $CardholderId; // string
		public $ConsumerIdentifications; // ArrayOfConsumerIdentification
	}
}

if (! class_exists ( "CardData" )) {
	/*
 *CardData
 */
	class CardData {
		public $AccountNumber; // string
		public $Expire; // string
		public $Track1Data; // string
		public $Track2Data; // string
	}
}

if (! class_exists ( "CardSecurityData" )) {
	/*
 *CardSecurityData
 */
	class CardSecurityData {
		public $CVDataProvided; // CVDataProvided
		public $CVData; // string
	}
}

if (! class_exists ( "ConsumerIdentification" )) {
	/*
 *ConsumerIdentification
 */
	class ConsumerIdentification {
		public $IdType; // IdType
		public $IdData; // string
		public $IdEntryMode; // IdEntryMode
	}
}

if (! class_exists ( "IdType" )) {
	/*
 *IdType
 */
	class IdType {
	}
}

if (! class_exists ( "IdEntryMode" )) {
	/*
 *IdEntryMode
 */
	class IdEntryMode {
	}
}

if (! class_exists ( "StoredValueTransactionData" )) {
	/*
 *StoredValueTransactionData
 */
	class StoredValueTransactionData {
		public $EmployeeId; // string
		public $IndustryType; // IndustryType
		public $TipAmount; // decimal
		public $TenderCurrencyCode; // TypeISOCurrencyCodeA3
		public $CardRestrictionValue; // string
		public $EntryMode; // EntryMode
		public $Unload; // boolean
		public $CardStatus; // CardStatus
		public $OperationType; // OperationType
		public $OrderNumber; // string
		public $TerminalId; // string
	}
}

if (! class_exists ( "CardStatus" )) {
	/*
 *CardStatus
 */
	class CardStatus {
	}
}

if (! class_exists ( "OperationType" )) {
	/*
 *OperationType
 */
	class OperationType {
	}
}

if (! class_exists ( "StoredValueBalanceTransferTenderData" )) {
	/*
 *StoredValueBalanceTransferTenderData
 */
	class StoredValueBalanceTransferTenderData {
		public $SourceCardData; // CardData
		public $ConsumerIdentification; // ConsumerIdentification
	}
}

if (! class_exists ( "StoredValueActivateTenderData" )) {
	/*
 *StoredValueActivateTenderData
 */
	class StoredValueActivateTenderData {
		public $VirtualCardData; // VirtualCardData
	}
}

if (! class_exists ( "VirtualCardData" )) {
	/*
 *VirtualCardData
 */
	class VirtualCardData {
		public $AccountNumberLength; // int
		public $BIN; // string
	}
}

if (! class_exists ( "StoredValueManage" )) {
	/*
 *StoredValueManage
 */
	class StoredValueManage {
		public $Amount; // decimal
		public $SourceCardData; // CardData
		public $CardStatus; // CardStatus
		public $IsCashOut; // boolean
		public $OperationType; // OperationType
	}
}

if (! class_exists ( "StoredValueReturn" )) {
	/*
 *StoredValueReturn
 */
	class StoredValueReturn {
		public $Amount; // decimal
	}
}

if (! class_exists ( "StoredValueCapture" )) {
	/*
 *StoredValueCapture
 */
	class StoredValueCapture {
		public $Amount; // decimal
	}
}

if (! class_exists ( "StoredValueTransactionResponse" )) {
	/*
 *StoredValueTransactionResponse
 */
	class StoredValueTransactionResponse {
		public $Amount; // decimal
		public $FeeAmount; // decimal
		public $ApprovalCode; // string
		public $CVResult; // CVResult
		public $CashBackAmount; // decimal
		public $LockAmount; // decimal
		public $NewBalance; // decimal
		public $PreviousBalance; // decimal
		public $CardStatus; // CardStatus
		public $AccountNumber; // string
		public $CVData; // string
		public $CardRestrictionValue; // string
		public $PaymentAccountDataToken; // string
		public $MaskedPAN; // string
		public $OrderId; // string
		public $Expire; // string
	}
}

if (! class_exists ( "StoredValueCaptureResponse" )) {
	/*
 *StoredValueCaptureResponse
 */
	class StoredValueCaptureResponse {
		public $BatchId; // string
		public $SummaryData; // SummaryData
	}
}

if (! class_exists ( "QueryAccount" )) {
	/*
 *QueryAccount
 */
	class QueryAccount {
		public $sessionToken; // string
		public $transaction; // Transaction
		public $applicationProfileId; // string
		public $merchantProfileId; // string
		public $workflowId; // string
	}
}

if (! class_exists ( "QueryAccountResponse" )) {
	/*
 *QueryAccountResponse
 */
	class QueryAccountResponse {
		public $QueryAccountResult; // Response
	}
}

if (! class_exists ( "Verify" )) {
	/*
 *Verify
 */
	class Verify {
		public $sessionToken; // string
		public $transaction; // Transaction
		public $applicationProfileId; // string
		public $merchantProfileId; // string
		public $workflowId; // string
	}
}

if (! class_exists ( "VerifyResponse" )) {
	/*
 *VerifyResponse
 */
	class VerifyResponse {
		public $VerifyResult; // Response
	}
}

if (! class_exists ( "Authorize" )) {
	/*
 *Authorize
 */
	class Authorize {
		public $sessionToken; // string
		public $transaction; // Transaction
		public $applicationProfileId; // string
		public $merchantProfileId; // string
		public $workflowId; // string
	}
}

if (! class_exists ( "AuthorizeResponse" )) {
	/*
 *AuthorizeResponse
 */
	class AuthorizeResponse {
		public $AuthorizeResult; // Response
	}
}

if (! class_exists ( "Adjust" )) {
	/*
 *Adjust
 */
	class Adjust {
		public $sessionToken; // string
		public $differenceData; // Adjust
		public $applicationProfileId; // string
		public $workflowId; // string
	}
}

if (! class_exists ( "AdjustResponse" )) {
	/*
 *AdjustResponse
 */
	class AdjustResponse {
		public $AdjustResult; // Response
	}
}

if (! class_exists ( "AuthorizeAndCapture" )) {
	/*
 *AuthorizeAndCapture
 */
	class AuthorizeAndCapture {
		public $sessionToken; // string
		public $transaction; // Transaction
		public $applicationProfileId; // string
		public $merchantProfileId; // string
		public $workflowId; // string
	}
}

if (! class_exists ( "AuthorizeAndCaptureResponse" )) {
	/*
 *AuthorizeAndCaptureResponse
 */
	class AuthorizeAndCaptureResponse {
		public $AuthorizeAndCaptureResult; // Response
	}
}

if (! class_exists ( "ReturnUnlinked" )) {
	/*
 *ReturnUnlinked
 */
	class ReturnUnlinked {
		public $sessionToken; // string
		public $transaction; // Transaction
		public $applicationProfileId; // string
		public $merchantProfileId; // string
		public $workflowId; // string
	}
}

if (! class_exists ( "ReturnUnlinkedResponse" )) {
	/*
 *ReturnUnlinkedResponse
 */
	class ReturnUnlinkedResponse {
		public $ReturnUnlinkedResult; // Response
	}
}

if (! class_exists ( "ReturnById" )) {
	/*
 *ReturnById
 */
	class ReturnById {
		public $sessionToken; // string
		public $differenceData; // Return
		public $applicationProfileId; // string
		public $workflowId; // string
	}
}

if (! class_exists ( "ReturnByIdResponse" )) {
	/*
 *ReturnByIdResponse
 */
	class ReturnByIdResponse {
		public $ReturnByIdResult; // Response
	}
}
if (!class_exists("Undo")) {
/*
 *Undo
 */
class Undo {
		public $sessionToken; // string
		public $differenceData; // Undo
		public $applicationProfileId; // string
		public $workflowId; // string
	}
} 

if (! class_exists ( "UndoResponse" )) {
	/*
 *UndoResponse
 */
	class UndoResponse {
		public $UndoResult; // Response
	}
}

if (! class_exists ( "Capture" )) {
/*
 *Capture
 */
	class Capture {
		public $sessionToken; // string
		public $differenceData; // Capture
		public $applicationProfileId; // string
		public $workflowId; // string
}
}

if (! class_exists ( "CaptureResponse" )) {
	/*
 *CaptureResponse
 */
	class CaptureResponse {
		public $CaptureResult; // Response
	}
}

if (! class_exists ( "CaptureAll" )) {
	/*
 *CaptureAll
 */
	class CaptureAll {
		public $sessionToken; // string
		public $differenceData; // ArrayOfCapture
		public $batchIds; // ArrayOfstring
		public $applicationProfileId; // string
		public $merchantProfileId; // string
		public $workflowId; // string
		public $forceClose; // boolean
	}
}

if (! class_exists ( "CaptureAllResponse" )) {
	/*
 *CaptureAllResponse
 */
	class CaptureAllResponse {
		public $CaptureAllResult; // ArrayOfResponse
	}
}

if (! class_exists ( "CaptureAllAsync" )) {
	/*
 *CaptureAllAsync
 */
	class CaptureAllAsync {
		public $sessionToken; // string
		public $differenceData; // ArrayOfCapture
		public $batchIds; // ArrayOfstring
		public $applicationProfileId; // string
		public $merchantProfileId; // string
		public $workflowId; // string
		public $forceClose; // boolean
	}
}

if (! class_exists ( "CaptureAllAsyncResponse" )) {
	/*
 *CaptureAllAsyncResponse
 */
	class CaptureAllAsyncResponse {
		public $CaptureAllAsyncResult; // Response
	}
}

if (! class_exists ( "CaptureSelective" )) {
	/*
 *CaptureSelective
 */
	class CaptureSelective {
		public $sessionToken; // string
		public $transactionIds; // ArrayOfstring
		public $differenceData; // ArrayOfCapture
		public $applicationProfileId; // string
		public $workflowId; // string
	}
}

if (! class_exists ( "CaptureSelectiveResponse" )) {
	/*
 *CaptureSelectiveResponse
 */
	class CaptureSelectiveResponse {
		public $CaptureSelectiveResult; // ArrayOfResponse
	}
}

if (! class_exists ( "CaptureSelectiveAsync" )) {
	/*
 *CaptureSelectiveAsync
 */
	class CaptureSelectiveAsync {
		public $sessionToken; // string
		public $transactionIds; // ArrayOfstring
		public $differenceData; // ArrayOfCapture
		public $applicationProfileId; // string
		public $workflowId; // string
	}
}

if (! class_exists ( "CaptureSelectiveAsyncResponse" )) {
	/*
 *CaptureSelectiveAsyncResponse
 */
	class CaptureSelectiveAsyncResponse {
		public $CaptureSelectiveAsyncResult; // Response
	}
}

if (! class_exists ( "Acknowledge" )) {
	/*
 *Acknowledge
 */
	class Acknowledge {
		public $sessionToken; // string
		public $transactionId; // string
		public $applicationProfileId; // string
		public $workflowId; // string
	}
}

if (! class_exists ( "AcknowledgeResponse" )) {
	/*
 *AcknowledgeResponse
 */
	class AcknowledgeResponse {
		public $AcknowledgeResult; // Response
	}
}

if (! class_exists ( "RequestTransaction" )) {
	/*
 *RequestTransaction
 */
	class RequestTransaction {
		public $sessionToken; // string
		public $merchantProfileId; // string
		public $tenderData; // TransactionTenderData
	}
}

if (! class_exists ( "RequestTransactionResponse" )) {
	/*
 *RequestTransactionResponse
 */
	class RequestTransactionResponse {
		public $RequestTransactionResult; // ArrayOfResponse
	}
}

if (! class_exists ( "ManageAccount" )) {
	/*
 *ManageAccount
 */
	class ManageAccount {
		public $sessionToken; // string
		public $transaction; // Transaction
		public $applicationProfileId; // string
		public $merchantProfileId; // string
		public $workflowId; // string
	}
}

if (! class_exists ( "ManageAccountResponse" )) {
	/*
 *ManageAccountResponse
 */
	class ManageAccountResponse {
		public $ManageAccountResult; // Response
	}
}

if (! class_exists ( "ManageAccountById" )) {
	/*
 *ManageAccountById
 */
	class ManageAccountById {
		public $sessionToken; // string
		public $differenceData; // Manage
		public $applicationProfileId; // string
		public $workflowId; // string
	}
}

if (! class_exists ( "ManageAccountByIdResponse" )) {
	/*
 *ManageAccountByIdResponse
 */
	class ManageAccountByIdResponse {
		public $ManageAccountByIdResult; // Response
	}
}

if (! class_exists ( "Disburse" )) {
	/*
 *Disburse
 */
	class Disburse {
		public $sessionToken; // string
		public $transaction; // Transaction
		public $applicationProfileId; // string
		public $merchantProfileId; // string
		public $workflowId; // string
	}
}

if (! class_exists ( "DisburseResponse" )) {
	/*
 *DisburseResponse
 */
	class DisburseResponse {
		public $DisburseResult; // Response
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

if (! class_exists ( "CWSConnectionFault" )) {
	/*
 *CWSConnectionFault
 */
	class CWSConnectionFault {
	}
}

if (! class_exists ( "CWSBaseFault" )) {
	/*
 *CWSBaseFault
 */
	class CWSBaseFault {
		public $BatchId; // string
		public $ErrorID; // int
		public $HelpURL; // string
		public $Operation; // string
		public $ProblemType; // string
		public $TransactionId; // string
		public $TransactionState; // TransactionState
	}
}

if (! class_exists ( "CWSTransactionServiceUnavailableFault" )) {
	/*
 *CWSTransactionServiceUnavailableFault
 */
	class CWSTransactionServiceUnavailableFault {
	}
}

if (! class_exists ( "CWSTransactionAlreadySettledFault" )) {
	/*
 *CWSTransactionAlreadySettledFault
 */
	class CWSTransactionAlreadySettledFault {
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

if (! class_exists ( "CWSValidationErrorFault_EErrorType" )) {
	/*
 *CWSValidationErrorFault.EErrorType
 */
	class CWSValidationErrorFault_EErrorType {
	}
}

if (! class_exists ( "CWSFault" )) {
	/*
 *CWSFault
 */
	class CWSFault {
	}
}

if (! class_exists ( "CWSTransactionFailedFault" )) {
	/*
 *CWSTransactionFailedFault
 */
	class CWSTransactionFailedFault {
	}
}

if (! class_exists ( "CWSExtendedDataNotSupportedFault" )) {
	/*
 *CWSExtendedDataNotSupportedFault
 */
	class CWSExtendedDataNotSupportedFault {
	}
}

if (! class_exists ( "CWSInvalidMessageFormatFault" )) {
	/*
 *CWSInvalidMessageFormatFault
 */
	class CWSInvalidMessageFormatFault {
	}
}

if (! class_exists ( "CWSOperationNotSupportedFault" )) {
	/*
 *CWSOperationNotSupportedFault
 */
	class CWSOperationNotSupportedFault {
	}
}

if (! class_exists ( "CWSInvalidOperationFault" )) {
	/*
 *CWSInvalidOperationFault
 */
	class CWSInvalidOperationFault {
	}
}

if (! class_exists ( "CWSDeserializationFault" )) {
	/*
 *CWSDeserializationFault
 */
	class CWSDeserializationFault {
	}
}

if (! class_exists ( "CWSInvalidServiceInformationFault" )) {
	/*
 *CWSInvalidServiceInformationFault
 */
	class CWSInvalidServiceInformationFault {
	}
}

class CwsTransactionProcessing extends SoapClient {

 private static $classmap = array( 
                                    'PingResponse' => 'PingResponse',
                                    'Ping' => 'Ping',
                                    'PingResponse' => 'PingResponse',
                                    'char' => 'char',
                                    'duration' => 'duration',
                                    'guid' => 'guid',
                                    'TransactionData' => 'TransactionData',
                                    'TypeISOCurrencyCodeA3' => 'TypeISOCurrencyCodeA3',
                                    'Transaction' => 'Transaction',
                                    'TransactionCustomerData' => 'TransactionCustomerData',
                                    'CustomerInfo' => 'CustomerInfo',
                                    'NameInfo' => 'NameInfo',
                                    'AddressInfo' => 'AddressInfo',
                                    'TypeISOCountryCodeA3' => 'TypeISOCountryCodeA3',
                                    'PersonalInfo' => 'PersonalInfo',
                                    'DriversLicense' => 'DriversLicense',
                                    'TypeStateProvince' => 'TypeStateProvince',
                                    'TransactionReportingData' => 'TransactionReportingData',
                                    'Addendum' => 'Addendum',
                                    'Unmanaged' => 'Unmanaged',
                                    'TransactionTenderData' => 'TransactionTenderData',
                                    'CVDataProvided' => 'CVDataProvided',
                                    'IndustryType' => 'IndustryType',
                                    'EntryMode' => 'EntryMode',
                                    'AlternativeMerchantData' => 'AlternativeMerchantData',
                                    'PINlessDebitData' => 'PINlessDebitData',
                                    'BillPayServiceData' => 'BillPayServiceData',
                                    'PayeeData' => 'PayeeData',
                                    'Manage' => 'Manage',
                                    'Return' => 'Return',
                                    'Response' => 'Response',
                                    'Status' => 'Status',
                                    'ServiceTransactionDateTime' => 'ServiceTransactionDateTime',
                                    'CaptureState' => 'CaptureState',
                                    'TransactionState' => 'TransactionState',
                                    'SummaryData' => 'SummaryData',
                                    'SummaryTotals' => 'SummaryTotals',
                                    'CVResult' => 'CVResult',
                                    'Undo' => 'Undo',
                                    'Capture' => 'Capture',
                                    'Adjust' => 'Adjust',
                                    'BankcardTransactionData' => 'BankcardTransactionData',
                                    'BankcardTransaction' => 'BankcardTransaction',
                                    'BillPayment' => 'BillPayment',
                                    'RequestCommercialCard' => 'RequestCommercialCard',
                                    'ExistingDebt' => 'ExistingDebt',
                                    'RequestACI' => 'RequestACI',
                                    'RequestAdvice' => 'RequestAdvice',
                                    'BankcardTenderData' => 'BankcardTenderData',
                                    'CardData' => 'CardData',
                                    'TypeCardType' => 'TypeCardType',
                                    'CardSecurityData' => 'CardSecurityData',
                                    'AVSData' => 'AVSData',
                                    'EcommerceSecurityData' => 'EcommerceSecurityData',
                                    'TokenIndicator' => 'TokenIndicator',
                                    'BankcardApplicationConfigurationData' => 'BankcardApplicationConfigurationData',
                                    'ApplicationLocation' => 'ApplicationLocation',
                                    'HardwareType' => 'HardwareType',
                                    'PINCapability' => 'PINCapability',
                                    'ReadCapability' => 'ReadCapability',
                                    'AccountType' => 'AccountType',
                                    'CustomerPresent' => 'CustomerPresent',
                                    'GoodsType' => 'GoodsType',
                                    'InternetTransactionData' => 'InternetTransactionData',
                                    'PartialApprovalSupportType' => 'PartialApprovalSupportType',
                                    'TransactionCode' => 'TransactionCode',
                                    'ManagedBilling' => 'ManagedBilling',
                                    'ManagedBillingInstallments' => 'ManagedBillingInstallments',
                                    'Interval' => 'Interval',
                                    'Level2Data' => 'Level2Data',
                                    'TaxExempt' => 'TaxExempt',
                                    'IsTaxExempt' => 'IsTaxExempt',
                                    'Tax' => 'Tax',
                                    'ItemizedTax' => 'ItemizedTax',
                                    'TypeTaxType' => 'TypeTaxType',
                                    'LineItemDetail' => 'LineItemDetail',
                                    'TypeUnitOfMeasure' => 'TypeUnitOfMeasure',
                                    'IIASData' => 'IIASData',
                                    'IIASDesignation' => 'IIASDesignation',
                                    'BankcardReturn' => 'BankcardReturn',
                                    'BankcardTransactionResponse' => 'BankcardTransactionResponse',
                                    'AdviceResponse' => 'AdviceResponse',
                                    'CommercialCardResponse' => 'CommercialCardResponse',
                                    'BankcardCaptureResponse' => 'BankcardCaptureResponse',
                                    'TransactionSummaryData' => 'TransactionSummaryData',
                                    'Totals' => 'Totals',
                                    'PrepaidCard' => 'PrepaidCard',
                                    'AVSResult' => 'AVSResult',
                                    'AddressResult' => 'AddressResult',
                                    'CountryResult' => 'CountryResult',
                                    'StateResult' => 'StateResult',
                                    'PostalCodeResult' => 'PostalCodeResult',
                                    'PhoneResult' => 'PhoneResult',
                                    'CardholderNameResult' => 'CardholderNameResult',
                                    'CityResult' => 'CityResult',
                                    'Resubmit' => 'Resubmit',
                                    'BankcardUndo' => 'BankcardUndo',
                                    'PINDebitUndoReason' => 'PINDebitUndoReason',
                                    'BankcardCapture' => 'BankcardCapture',
                                    'ChargeType' => 'ChargeType',
                                    'BankcardTransactionDataPro' => 'BankcardTransactionDataPro',
                                    'BankcardTransactionPro' => 'BankcardTransactionPro',
                                    'BankcardInterchangeData' => 'BankcardInterchangeData',
                                    'BankcardTransactionResponsePro' => 'BankcardTransactionResponsePro',
                                    'BankcardReturnPro' => 'BankcardReturnPro',
                                    'BankcardCapturePro' => 'BankcardCapturePro',
                                    'BankcardCaptureResponsePro' => 'BankcardCaptureResponsePro',
                                    'ElectronicCheckingTransactionData' => 'ElectronicCheckingTransactionData',
                                    'SECCode' => 'SECCode',
                                    'ServiceType' => 'ServiceType',
                                    'TransactionType' => 'TransactionType',
                                    'ElectronicCheckingCustomerData' => 'ElectronicCheckingCustomerData',
                                    'ElectronicCheckingTenderData' => 'ElectronicCheckingTenderData',
                                    'CheckData' => 'CheckData',
                                    'CheckCountryCode' => 'CheckCountryCode',
                                    'OwnerType' => 'OwnerType',
                                    'UseType' => 'UseType',
                                    'ElectronicCheckingTransaction' => 'ElectronicCheckingTransaction',
                                    'ElectronicCheckingTransactionResponse' => 'ElectronicCheckingTransactionResponse',
                                    'ReturnInformation' => 'ReturnInformation',
                                    'ElectronicCheckingCaptureResponse' => 'ElectronicCheckingCaptureResponse',
                                    'StoredValueTransaction' => 'StoredValueTransaction',
                                    'StoredValueTenderData' => 'StoredValueTenderData',
                                    'CardData' => 'CardData',
                                    'CardSecurityData' => 'CardSecurityData',
                                    'ConsumerIdentification' => 'ConsumerIdentification',
                                    'IdType' => 'IdType',
                                    'IdEntryMode' => 'IdEntryMode',
                                    'StoredValueTransactionData' => 'StoredValueTransactionData',
                                    'CardStatus' => 'CardStatus',
                                    'OperationType' => 'OperationType',
                                    'StoredValueBalanceTransferTenderData' => 'StoredValueBalanceTransferTenderData',
                                    'StoredValueActivateTenderData' => 'StoredValueActivateTenderData',
                                    'VirtualCardData' => 'VirtualCardData',
                                    'StoredValueManage' => 'StoredValueManage',
                                    'StoredValueReturn' => 'StoredValueReturn',
                                    'StoredValueCapture' => 'StoredValueCapture',
                                    'StoredValueTransactionResponse' => 'StoredValueTransactionResponse',
                                    'StoredValueCaptureResponse' => 'StoredValueCaptureResponse',
                                    'QueryAccount' => 'QueryAccount',
                                    'QueryAccountResponse' => 'QueryAccountResponse',
                                    'Verify' => 'Verify',
                                    'VerifyResponse' => 'VerifyResponse',
                                    'Authorize' => 'Authorize',
                                    'AuthorizeResponse' => 'AuthorizeResponse',
                                    'Adjust' => 'Adjust',
                                    'AdjustResponse' => 'AdjustResponse',
                                    'AuthorizeAndCapture' => 'AuthorizeAndCapture',
                                    'AuthorizeAndCaptureResponse' => 'AuthorizeAndCaptureResponse',
                                    'ReturnUnlinked' => 'ReturnUnlinked',
                                    'ReturnUnlinkedResponse' => 'ReturnUnlinkedResponse',
                                    'ReturnById' => 'ReturnById',
                                    'ReturnByIdResponse' => 'ReturnByIdResponse',
                                    'Undo' => 'Undo',
                                    'UndoResponse' => 'UndoResponse',
                                    'Capture' => 'Capture',
                                    'CaptureResponse' => 'CaptureResponse',
                                    'CaptureAll' => 'CaptureAll',
                                    'CaptureAllResponse' => 'CaptureAllResponse',
                                    'CaptureAllAsync' => 'CaptureAllAsync',
                                    'CaptureAllAsyncResponse' => 'CaptureAllAsyncResponse',
                                    'CaptureSelective' => 'CaptureSelective',
                                    'CaptureSelectiveResponse' => 'CaptureSelectiveResponse',
                                    'CaptureSelectiveAsync' => 'CaptureSelectiveAsync',
                                    'CaptureSelectiveAsyncResponse' => 'CaptureSelectiveAsyncResponse',
                                    'Acknowledge' => 'Acknowledge',
                                    'AcknowledgeResponse' => 'AcknowledgeResponse',
                                    'RequestTransaction' => 'RequestTransaction',
                                    'RequestTransactionResponse' => 'RequestTransactionResponse',
                                    'ManageAccount' => 'ManageAccount',
                                    'ManageAccountResponse' => 'ManageAccountResponse',
                                    'ManageAccountById' => 'ManageAccountById',
                                    'ManageAccountByIdResponse' => 'ManageAccountByIdResponse',
                                    'Disburse' => 'Disburse',
                                    'DisburseResponse' => 'DisburseResponse',
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
                                    'CWSConnectionFault' => 'CWSConnectionFault',
                                    'CWSBaseFault' => 'CWSBaseFault',
                                    'CWSTransactionServiceUnavailableFault' => 'CWSTransactionServiceUnavailableFault',
                                    'CWSTransactionAlreadySettledFault' => 'CWSTransactionAlreadySettledFault',
                                    'CWSValidationResultFault' => 'CWSValidationResultFault',
                                    'CWSValidationErrorFault' => 'CWSValidationErrorFault',
                                    'CWSValidationErrorFault.EErrorType' => 'CWSValidationErrorFault.EErrorType',
                                    'CWSFault' => 'CWSFault',
                                    'CWSTransactionFailedFault' => 'CWSTransactionFailedFault',
                                    'CWSExtendedDataNotSupportedFault' => 'CWSExtendedDataNotSupportedFault',
                                    'CWSInvalidMessageFormatFault' => 'CWSInvalidMessageFormatFault',
                                    'CWSOperationNotSupportedFault' => 'CWSOperationNotSupportedFault',
                                    'CWSInvalidOperationFault' => 'CWSInvalidOperationFault',
                                    'CWSDeserializationFault' => 'CWSDeserializationFault',
                                    'CWSInvalidServiceInformationFault' => 'CWSInvalidServiceInformationFault',
                                   );

  public function CwsTransactionProcessing($wsdl = "", $options = array()) {
    foreach(self::$classmap as $key => $value) {
      if(!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    parent::__construct($wsdl, $options);
  }

  /*
   *  
   *
   * @param Ping $parameters
   * @return PingResponse
   */
  public function Ping(Ping $parameters) {
    return $this->__soapCall('Ping', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Performs a balance inquiry on the cardholder's account to determine the current account 
   * balance. 
				Session token obtained from SignOn()
				Transaction details
				Application 
   * profile ID obtained from SaveApplicationData()
				Merchant profile ID
				Workflow ID 
   * 
   *
   * @param QueryAccount $parameters
   * @return QueryAccountResponse
   */
  public function QueryAccount(QueryAccount $parameters) {
    return $this->__soapCall('QueryAccount', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Performs a check on the cardholder's account without reserving any funds. 
				Session 
   * token obtained from SignOn()
				Transaction details
				Application profile ID obtained 
   * from SaveApplicationData()
				Merchant profile ID
				Workflow ID 
   *
   * @param Verify $parameters
   * @return VerifyResponse
   */
  public function Verify(Verify $parameters) {
    return $this->__soapCall('Verify', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Performs a check on cardholder's funds and reserves the queried amount if sufficient funds 
   * are available. Transaction must be captured before funds transfer will occur. 
				Session 
   * token obtained from SignOn()
				Transaction details
				Application profile ID obtained 
   * from SaveApplicationData()
				Merchant profile ID
				Workflow ID 
   *
   * @param Authorize $parameters
   * @return AuthorizeResponse
   */
  public function Authorize(Authorize $parameters) {
    return $this->__soapCall('Authorize', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Performs an incremental or reversal authorization to increase or decrease the amount of 
   * an existing authorization. 
				Session token obtained from SignOn()
				Adjustment details
				Application 
   * profile ID obtained from SaveApplicationData()
				Workflow ID 
   *
   * @param Adjust $parameters
   * @return AdjustResponse
   */
  public function Adjust(Adjust $parameters) {
    return $this->__soapCall('Adjust', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Performs a check on cardholder's funds and reserves the queried amount if sufficient funds 
   * are available, then marks the transaction for capture. 
				Session token obtained from 
   * SignOn()
				Transaction details
				Application profile ID obtained from SaveApplicationData()
				Merchant 
   * profile ID
				Workflow ID 
   *
   * @param AuthorizeAndCapture $parameters
   * @return AuthorizeAndCaptureResponse
   */
  public function AuthorizeAndCapture(AuthorizeAndCapture $parameters) {
    return $this->__soapCall('AuthorizeAndCapture', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Performs an unlinked or 'standalone' credit to a cardholder's account from a merchant's 
   * account. 
				Session token obtained from SignOn()
				Transaction details
				Application 
   * profile ID obtained from SaveApplicationData()
				Merchant profile ID
				Workflow ID 
   * 
   *
   * @param ReturnUnlinked $parameters
   * @return ReturnUnlinkedResponse
   */
  public function ReturnUnlinked(ReturnUnlinked $parameters) {
    return $this->__soapCall('ReturnUnlinked', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Performs a linked credit to a cardholder's account from a merchant's account using data 
   * from the authorization. 
				Session token obtained from SignOn()
				Return details
				Application 
   * profile ID obtained from SaveApplicationData()
				Workflow ID 
   *
   * @param ReturnById $parameters
   * @return ReturnByIdResponse
   */
  public function ReturnById(ReturnById $parameters) {
    return $this->__soapCall('ReturnById', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Void or reverse an authorization in order to release cardholder funds. If transaction 
   * to be Undone is in an ErrorUnknown state, the TenderData must be set on the BankcardUndo. 
   * 
				Session token obtained from SignOn()
				Undo details
				Application profile ID 
   * obtained from SaveApplicationData()
				Workflow ID 
   *
   * @param Undo $parameters
   * @return UndoResponse
   */
  public function Undo(Undo $parameters) {
    return $this->__soapCall('Undo', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Mark a succesfully authorized transaction for settlement by the processor. 
				Session 
   * token obtained from SignOn()
				Capture details
				Application profile ID obtained from 
   * SaveApplicationData()
				Workflow ID 
   *
   * @param Capture $parameters
   * @return CaptureResponse
   */
  public function Capture(Capture $parameters) {
    return $this->__soapCall('Capture', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Mark all succesfully authorized transactions for settlement by the processor. 
				Session 
   * token obtained from SignOn()
				Capture details
				A list of batch ids.
				Application 
   * profile ID obtained from SaveApplicationData()
				Merchant profile ID
				Workflow ID 
   * 
   *
   * @param CaptureAll $parameters
   * @return CaptureAllResponse
   */
  public function CaptureAll(CaptureAll $parameters) {
    return $this->__soapCall('CaptureAll', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Mark all succesfully authorized transactions for settlement by the processor without waiting 
   * for the settlement to complete. The Response object will indicate a successful receipt 
   * of the settlement request. 
				Session token obtained from SignOn()
				Capture details
				A 
   * list of batch ids.
				Application profile ID obtained from SaveApplicationData()
				Merchant 
   * profile ID
				Workflow ID
				Single Response object. 
   *
   * @param CaptureAllAsync $parameters
   * @return CaptureAllAsyncResponse
   */
  public function CaptureAllAsync(CaptureAllAsync $parameters) {
    return $this->__soapCall('CaptureAllAsync', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Mark one or more specific succesfully authorized transactions for settlement by the processor. 
   * 
				Session token obtained from SignOn()
				Transaction IDs to capture
				Capture details
				Application 
   * profile ID obtained from SaveApplicationData()
				Workflow ID 
   *
   * @param CaptureSelective $parameters
   * @return CaptureSelectiveResponse
   */
  public function CaptureSelective(CaptureSelective $parameters) {
    return $this->__soapCall('CaptureSelective', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Mark one or more specific succesfully authorized transactions for settlement by the processor 
   * without waiting for the settlement to complete. The Response object will indicate a successful 
   * receipt of the settlement request. 
				Session token obtained from SignOn()
				Transaction 
   * IDs to capture
				Capture details
				Application profile ID obtained from SaveApplicationData()
				Workflow 
   * ID
				Single Response object. 
   *
   * @param CaptureSelectiveAsync $parameters
   * @return CaptureSelectiveAsyncResponse
   */
  public function CaptureSelectiveAsync(CaptureSelectiveAsync $parameters) {
    return $this->__soapCall('CaptureSelectiveAsync', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Mark a transaction acknowledged after successfully receiving a response. This is helpful 
   * for later reporting. 
				Session token obtained from SignOn()
				Transaction ID to acknowledge
				Application 
   * profile ID obtained from SaveApplicationData()
				Workflow ID 
   *
   * @param Acknowledge $parameters
   * @return AcknowledgeResponse
   */
  public function Acknowledge(Acknowledge $parameters) {
    return $this->__soapCall('Acknowledge', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Provides the mechanism to request any transactions that match given tender data. 
				The 
   * tender data tro match.
				Session token obtained from SignOn()
				Aids in the distinction 
   * of the transaction(s) located.
				One or more transaction instances that match the supplied 
   * tender data. 
   *
   * @param RequestTransaction $parameters
   * @return RequestTransactionResponse
   */
  public function RequestTransaction(RequestTransaction $parameters) {
    return $this->__soapCall('RequestTransaction', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Used to activate, reload, deactivate an account or to transfer the balance from another 
   * card. 
				Session token obtained from SignOn()
				Transaction details
				Application 
   * profile ID obtained from SaveApplicationData()
				Merchant profile ID
				Workflow ID 
   * 
   *
   * @param ManageAccount $parameters
   * @return ManageAccountResponse
   */
  public function ManageAccount(ManageAccount $parameters) {
    return $this->__soapCall('ManageAccount', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Used to update an existing account. 
				Session token obtained from SignOn()
				Manage 
   * details
				Application profile ID obtained from SaveApplicationData()
				Workflow ID 
   * 
   *
   * @param ManageAccountById $parameters
   * @return ManageAccountByIdResponse
   */
  public function ManageAccountById(ManageAccountById $parameters) {
    return $this->__soapCall('ManageAccountById', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

  /*
   * Disburse is used to submit a disbursement request to the Service Provider who then electronically 
   * disburses funds from the Payers bank account to the Payee. 
				Session token obtained 
   * from SignOn()
				Transaction details
				Application profile ID obtained from SaveApplicationData()
				Merchant 
   * profile ID
				Workflow ID 
   *
   * @param Disburse $parameters
   * @return DisburseResponse
   */
  public function Disburse(Disburse $parameters) {
    return $this->__soapCall('Disburse', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/TransactionProcessing',
            'soapaction' => ''
           )
      );
  }

}

?>
