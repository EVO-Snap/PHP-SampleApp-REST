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
 * CWSTransactionManagement class file
 * 
 */

if (!class_exists("PingResponse")) {
/*
 *PingResponse
 */
class PingResponse {
  public $IsSuccess; // boolean
  public $Message; // string
}
}

if (!class_exists("Ping")) {
/*
 *Ping
 */
class Ping {
}
}

if (!class_exists("PingResponse")) {
/*
 *PingResponse
 */
class PingResponse {
  public $PingResult; // PingResponse
}
}

if (!class_exists("char")) {
/*
 *char
 */
class char {
}
}

if (!class_exists("duration")) {
/*
 *duration
 */
class duration {
}
}

if (!class_exists("guid")) {
/*
 *guid
 */
class guid {
}
}

if (!class_exists("DateRange")) {
/*
 *DateRange
 */
class DateRange {
  public $EndDateTime; // dateTime
  public $StartDateTime; // dateTime
}
}

if (!class_exists("PagingParameters")) {
/*
 *PagingParameters
 */
class PagingParameters {
  public $Page; // int
  public $PageSize; // int
}
}

if (!class_exists("DataServicesUnavailableFault")) {
/*
 *DataServicesUnavailableFault
 */
class DataServicesUnavailableFault {
}
}

if (!class_exists("DSBaseFault")) {
/*
 *DSBaseFault
 */
class DSBaseFault {
  public $ErrorID; // int
  public $HelpURL; // string
  public $Operation; // string
  public $ProblemType; // string
}
}

if (!class_exists("Response")) {
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

if (!class_exists("Status")) {
/*
 *Status
 */
class Status {
}
}

if (!class_exists("ServiceTransactionDateTime")) {
/*
 *ServiceTransactionDateTime
 */
class ServiceTransactionDateTime {
  public $Date; // string
  public $Time; // string
  public $TimeZone; // string
}
}

if (!class_exists("Addendum")) {
/*
 *Addendum
 */
class Addendum {
  public $Unmanaged; // Unmanaged
}
}

if (!class_exists("Unmanaged")) {
/*
 *Unmanaged
 */
class Unmanaged {
  public $Any; // ArrayOfstring
}
}

if (!class_exists("CaptureState")) {
/*
 *CaptureState
 */
class CaptureState {
}
}

if (!class_exists("TransactionState")) {
/*
 *TransactionState
 */
class TransactionState {
}
}

if (!class_exists("IndustryType")) {
/*
 *IndustryType
 */
class IndustryType {
}
}

if (!class_exists("SummaryData")) {
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

if (!class_exists("SummaryTotals")) {
/*
 *SummaryTotals
 */
class SummaryTotals {
  public $NetAmount; // decimal
  public $Count; // int
}
}

if (!class_exists("CVResult")) {
/*
 *CVResult
 */
class CVResult {
}
}

if (!class_exists("Transaction")) {
/*
 *Transaction
 */
class Transaction {
  public $CustomerData; // TransactionCustomerData
  public $ReportingData; // TransactionReportingData
  public $Addendum; // Addendum
}
}

if (!class_exists("TransactionCustomerData")) {
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

if (!class_exists("CustomerInfo")) {
/*
 *CustomerInfo
 */
class CustomerInfo {
  public $Name; // NameInfo
  public $Address; // AddressInfo
  public $InternationalAddress; // InternationalAddressInfo
  public $BusinessName; // string
  public $Phone; // string
  public $Fax; // string
  public $Email; // string
}
}

if (!class_exists("NameInfo")) {
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

if (!class_exists("AddressInfo")) {
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

if (!class_exists("TypeISOCountryCodeA3")) {
/*
 *TypeISOCountryCodeA3
 */
class TypeISOCountryCodeA3 {
}
}

if (!class_exists("InternationalAddressInfo")) {
/*
 *InternationalAddressInfo
 */
class InternationalAddressInfo {
  public $HouseNumber; // string
  public $Street1; // string
  public $Street2; // string
  public $POBoxNumber; // string
  public $City; // string
  public $StateProvince; // string
  public $PostalCode; // string
  public $CountryCode; // TypeISOCountryCodeA3
}
}

if (!class_exists("PersonalInfo")) {
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

if (!class_exists("DriversLicense")) {
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

if (!class_exists("TypeStateProvince")) {
/*
 *TypeStateProvince
 */
class TypeStateProvince {
}
}

if (!class_exists("TransactionReportingData")) {
/*
 *TransactionReportingData
 */
class TransactionReportingData {
  public $Comment; // string
  public $Description; // string
  public $Reference; // string
}
}

if (!class_exists("TransactionTenderData")) {
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

if (!class_exists("CVDataProvided")) {
/*
 *CVDataProvided
 */
class CVDataProvided {
}
}

if (!class_exists("TransactionData")) {
/*
 *TransactionData
 */
class TransactionData {
  public $Amount; // decimal
  public $CurrencyCode; // TypeISOCurrencyCodeA3
  public $TransactionDateTime; // dateTime
  public $CampaignId; // string
  public $Reference; // string
}
}

if (!class_exists("TypeISOCurrencyCodeA3")) {
/*
 *TypeISOCurrencyCodeA3
 */
class TypeISOCurrencyCodeA3 {
}
}

if (!class_exists("PINlessDebitData")) {
/*
 *PINlessDebitData
 */
class PINlessDebitData {
  public $BillPayServiceData; // BillPayServiceData
  public $PayeeData; // PayeeData
}
}

if (!class_exists("BillPayServiceData")) {
/*
 *BillPayServiceData
 */
class BillPayServiceData {
  public $CompanyName; // string
  public $CompanyAddress; // AddressInfo
}
}

if (!class_exists("PayeeData")) {
/*
 *PayeeData
 */
class PayeeData {
  public $CompanyName; // string
  public $Phone; // string
  public $AccountNumber; // string
}
}

if (!class_exists("EntryMode")) {
/*
 *EntryMode
 */
class EntryMode {
}
}

if (!class_exists("AlternativeMerchantData")) {
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

if (!class_exists("ReturnById")) {
/*
 *Return
 */
class ReturnById {
  public $TransactionId; // string
  public $Addendum; // Addendum
  public $TransactionDateTime; // dateTime
}
}

if (!class_exists("Undo")) {
/*
 *Undo
 */
class Undo {
  public $TransactionId; // string
  public $Addendum; // Addendum
}
}

if (!class_exists("Capture")) {
/*
 *Capture
 */
class Capture {
  public $TransactionId; // string
  public $Addendum; // Addendum
}
}

if (!class_exists("Manage")) {
/*
 *Manage
 */
class Manage {
  public $TransactionId; // string
  public $Addendum; // Addendum
}
}

if (!class_exists("Resubmit")) {
/*
 *Resubmit
 */
class Resubmit {
  public $TransactionId; // string
  public $ResubmitReason; // ResubmitReason
  public $CVV; // string
  public $Addendum; // Addendum
}
}

if (!class_exists("Adjust")) {
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

if (!class_exists("BankcardTransactionResponse")) {
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
  public $ErrorType; // string
  public $AuthorizationServerUrl; // string
  public $PaymentAuthorizationRequest; // string
  public $ProcessedAs3D; // boolean
}
}

if (!class_exists("BankcardCaptureResponse")) {
/*
 *BankcardCaptureResponse
 */
class BankcardCaptureResponse {
  public $BatchId; // string
  public $IndustryType; // IndustryType
  public $TransactionSummaryData; // TransactionSummaryData
  public $PrepaidCard; // PrepaidCard
  public $ErrorType; // string
}
}

if (!class_exists("TransactionSummaryData")) {
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

if (!class_exists("Totals")) {
/*
 *Totals
 */
class Totals {
  public $NetAmount; // decimal
  public $Count; // int
}
}

if (!class_exists("PrepaidCard")) {
/*
 *PrepaidCard
 */
class PrepaidCard {
}
}

if (!class_exists("TypeCardType")) {
/*
 *TypeCardType
 */
class TypeCardType {
}
}

if (!class_exists("AVSResult")) {
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

if (!class_exists("AddressResult")) {
/*
 *AddressResult
 */
class AddressResult {
}
}

if (!class_exists("CountryResult")) {
/*
 *CountryResult
 */
class CountryResult {
}
}

if (!class_exists("StateResult")) {
/*
 *StateResult
 */
class StateResult {
}
}

if (!class_exists("PostalCodeResult")) {
/*
 *PostalCodeResult
 */
class PostalCodeResult {
}
}

if (!class_exists("PhoneResult")) {
/*
 *PhoneResult
 */
class PhoneResult {
}
}

if (!class_exists("CardholderNameResult")) {
/*
 *CardholderNameResult
 */
class CardholderNameResult {
}
}

if (!class_exists("CityResult")) {
/*
 *CityResult
 */
class CityResult {
}
}

if (!class_exists("Resubmit")) {
/*
 *Resubmit
 */
class Resubmit {
}
}

if (!class_exists("AdviceResponse")) {
/*
 *AdviceResponse
 */
class AdviceResponse {
}
}

if (!class_exists("CommercialCardResponse")) {
/*
 *CommercialCardResponse
 */
class CommercialCardResponse {
}
}

if (!class_exists("BankcardTransaction")) {
/*
 *BankcardTransaction
 */
class BankcardTransaction {
  public $ApplicationConfigurationData; // BankcardApplicationConfigurationData
  public $TenderData; // BankcardTenderData
  public $TransactionData; // BankcardTransactionData
}
}

if (!class_exists("BankcardApplicationConfigurationData")) {
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

if (!class_exists("ApplicationLocation")) {
/*
 *ApplicationLocation
 */
class ApplicationLocation {
}
}

if (!class_exists("HardwareType")) {
/*
 *HardwareType
 */
class HardwareType {
}
}

if (!class_exists("PINCapability")) {
/*
 *PINCapability
 */
class PINCapability {
}
}

if (!class_exists("ReadCapability")) {
/*
 *ReadCapability
 */
class ReadCapability {
}
}

if (!class_exists("BankcardTenderData")) {
/*
 *BankcardTenderData
 */
class BankcardTenderData {
  public $CardData; // CardData
  public $CardSecurityData; // CardSecurityData
  public $EcommerceSecurityData; // EcommerceSecurityData
}
}

if (!class_exists("CardData")) {
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

if (!class_exists("CardSecurityData")) {
/*
 *CardSecurityData
 */
class CardSecurityData {
  public $AVSData; // AVSData
  public $InternationalAVSData; // InternationalAVSData
  public $InternationalAVSOverride; // InternationalAVSOverride
  public $CVDataProvided; // CVDataProvided
  public $CVData; // string
  public $KeySerialNumber; // string
  public $PIN; // string
  public $IdentificationInformation; // string
}
}

if (!class_exists("AVSData")) {
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

if (!class_exists("InternationalAVSData")) {
/*
 *InternationalAVSData
 */
class InternationalAVSData {
  public $HouseNumber; // string
  public $Street; // string
  public $POBoxNumber; // string
  public $City; // string
  public $StateProvince; // string
  public $PostalCode; // string
  public $Country; // TypeISOCountryCodeA3
}
}

if (!class_exists("InternationalAVSOverride")) {
/*
 *InternationalAVSOverride
 */
class InternationalAVSOverride {
  public $SkipAVS; // boolean
  public $IgnoreAVS; // boolean
  public $AVSRejectCodes; // string
}
}

if (!class_exists("EcommerceSecurityData")) {
/*
 *EcommerceSecurityData
 */
class EcommerceSecurityData {
  public $TokenData; // string
  public $TokenIndicator; // TokenIndicator
  public $XID; // string
}
}

if (!class_exists("TokenIndicator")) {
/*
 *TokenIndicator
 */
class TokenIndicator {
}
}

if (!class_exists("BankcardTransactionData")) {
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
  public $Is3DSecure; // boolean
}
}

if (!class_exists("ManagedBilling")) {
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

if (!class_exists("ManagedBillingInstallments")) {
/*
 *ManagedBillingInstallments
 */
class ManagedBillingInstallments {
  public $Amount; // decimal
  public $Count; // int
}
}

if (!class_exists("Interval")) {
/*
 *Interval
 */
class Interval {
}
}

if (!class_exists("Level2Data")) {
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

if (!class_exists("TaxExempt")) {
/*
 *TaxExempt
 */
class TaxExempt {
  public $IsTaxExempt; // IsTaxExempt
  public $TaxExemptNumber; // string
}
}

if (!class_exists("IsTaxExempt")) {
/*
 *IsTaxExempt
 */
class IsTaxExempt {
}
}

if (!class_exists("Tax")) {
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

if (!class_exists("ItemizedTax")) {
/*
 *ItemizedTax
 */
class ItemizedTax {
  public $Amount; // decimal
  public $Rate; // decimal
  public $Type; // TypeTaxType
}
}

if (!class_exists("TypeTaxType")) {
/*
 *TypeTaxType
 */
class TypeTaxType {
}
}

if (!class_exists("LineItemDetail")) {
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

if (!class_exists("TypeUnitOfMeasure")) {
/*
 *TypeUnitOfMeasure
 */
class TypeUnitOfMeasure {
}
}

if (!class_exists("IIASData")) {
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

if (!class_exists("IIASDesignation")) {
/*
 *IIASDesignation
 */
class IIASDesignation {
}
}

if (!class_exists("BillPayment")) {
/*
 *BillPayment
 */
class BillPayment {
}
}

if (!class_exists("RequestCommercialCard")) {
/*
 *RequestCommercialCard
 */
class RequestCommercialCard {
}
}

if (!class_exists("ExistingDebt")) {
/*
 *ExistingDebt
 */
class ExistingDebt {
}
}

if (!class_exists("RequestACI")) {
/*
 *RequestACI
 */
class RequestACI {
}
}

if (!class_exists("RequestAdvice")) {
/*
 *RequestAdvice
 */
class RequestAdvice {
}
}

if (!class_exists("AccountType")) {
/*
 *AccountType
 */
class AccountType {
}
}

if (!class_exists("CustomerPresent")) {
/*
 *CustomerPresent
 */
class CustomerPresent {
}
}

if (!class_exists("GoodsType")) {
/*
 *GoodsType
 */
class GoodsType {
}
}

if (!class_exists("InternetTransactionData")) {
/*
 *InternetTransactionData
 */
class InternetTransactionData {
  public $IpAddress; // string
  public $SessionId; // string
}
}

if (!class_exists("PartialApprovalSupportType")) {
/*
 *PartialApprovalSupportType
 */
class PartialApprovalSupportType {
}
}

if (!class_exists("TransactionCode")) {
/*
 *TransactionCode
 */
class TransactionCode {
}
}

if (!class_exists("BankcardReturn")) {
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

if (!class_exists("BankcardUndo")) {
/*
 *BankcardUndo
 */
class BankcardUndo {
  public $PINDebitReason; // PINDebitUndoReason
  public $TenderData; // BankcardTenderData
  public $ForceVoid; // boolean
  public $TransactionCode; // TransactionCode
}
}

if (!class_exists("PINDebitUndoReason")) {
/*
 *PINDebitUndoReason
 */
class PINDebitUndoReason {
}
}

if (!class_exists("BankcardCapture")) {
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

if (!class_exists("ChargeType")) {
/*
 *ChargeType
 */
class ChargeType {
}
}

if (!class_exists("Resubmit3DSecure")) {
/*
 *Resubmit3DSecure
 */
class Resubmit3DSecure {
  public $PaymentAuthorizationResponse; // string
}
}

if (!class_exists("ResubmitReason")) {
/*
 *ResubmitReason
 */
class ResubmitReason {
}
}

if (!class_exists("SignOnWithToken")) {
/*
 *SignOnWithToken
 */
class SignOnWithToken {
  public $identityToken; // string
}
}

if (!class_exists("SignOnWithTokenResponse")) {
/*
 *SignOnWithTokenResponse
 */
class SignOnWithTokenResponse {
  public $SignOnWithTokenResult; // string
}
}

if (!class_exists("GetServiceInformation")) {
/*
 *GetServiceInformation
 */
class GetServiceInformation {
  public $sessionToken; // string
}
}

if (!class_exists("GetServiceInformationResponse")) {
/*
 *GetServiceInformationResponse
 */
class GetServiceInformationResponse {
  public $GetServiceInformationResult; // ServiceInformation
}
}

if (!class_exists("ServiceInformation")) {
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

if (!class_exists("BankcardService")) {
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

if (!class_exists("BankcardServiceAVSData")) {
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

if (!class_exists("Operations")) {
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

if (!class_exists("CloseBatch")) {
/*
 *CloseBatch
 */
class CloseBatch {
}
}

if (!class_exists("PurchaseCardLevel")) {
/*
 *PurchaseCardLevel
 */
class PurchaseCardLevel {
}
}

if (!class_exists("Tenders")) {
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

if (!class_exists("PINDebitReturnSupportType")) {
/*
 *PINDebitReturnSupportType
 */
class PINDebitReturnSupportType {
}
}

if (!class_exists("CreditAuthorizeSupportType")) {
/*
 *CreditAuthorizeSupportType
 */
class CreditAuthorizeSupportType {
}
}

if (!class_exists("QueryRejectedSupportType")) {
/*
 *QueryRejectedSupportType
 */
class QueryRejectedSupportType {
}
}

if (!class_exists("PinDebitUndoSupportType")) {
/*
 *PinDebitUndoSupportType
 */
class PinDebitUndoSupportType {
}
}

if (!class_exists("BatchAssignmentSupport")) {
/*
 *BatchAssignmentSupport
 */
class BatchAssignmentSupport {
}
}

if (!class_exists("CreditReturnSupportType")) {
/*
 *CreditReturnSupportType
 */
class CreditReturnSupportType {
}
}

if (!class_exists("TrackDataSupportType")) {
/*
 *TrackDataSupportType
 */
class TrackDataSupportType {
}
}

if (!class_exists("CreditReversalSupportType")) {
/*
 *CreditReversalSupportType
 */
class CreditReversalSupportType {
}
}

if (!class_exists("PartialApprovalSupportType")) {
/*
 *PartialApprovalSupportType
 */
class PartialApprovalSupportType {
}
}

if (!class_exists("ElectronicCheckingService")) {
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

if (!class_exists("StoredValueService")) {
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

if (!class_exists("Workflow")) {
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

if (!class_exists("WorkflowService")) {
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

if (!class_exists("SaveApplicationData")) {
/*
 *SaveApplicationData
 */
class SaveApplicationData {
  public $sessionToken; // string
  public $applicationData; // ApplicationData
}
}

if (!class_exists("ApplicationData")) {
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

if (!class_exists("ApplicationLocation")) {
/*
 *ApplicationLocation
 */
class ApplicationLocation {
}
}

if (!class_exists("HardwareType")) {
/*
 *HardwareType
 */
class HardwareType {
}
}

if (!class_exists("PINCapability")) {
/*
 *PINCapability
 */
class PINCapability {
}
}

if (!class_exists("ReadCapability")) {
/*
 *ReadCapability
 */
class ReadCapability {
}
}

if (!class_exists("EncryptionType")) {
/*
 *EncryptionType
 */
class EncryptionType {
}
}

if (!class_exists("SaveApplicationDataResponse")) {
/*
 *SaveApplicationDataResponse
 */
class SaveApplicationDataResponse {
  public $SaveApplicationDataResult; // string
}
}

if (!class_exists("GetApplicationData")) {
/*
 *GetApplicationData
 */
class GetApplicationData {
  public $sessionToken; // string
  public $applicationProfileId; // string
}
}

if (!class_exists("GetApplicationDataResponse")) {
/*
 *GetApplicationDataResponse
 */
class GetApplicationDataResponse {
  public $GetApplicationDataResult; // ApplicationData
}
}

if (!class_exists("DeleteApplicationData")) {
/*
 *DeleteApplicationData
 */
class DeleteApplicationData {
  public $sessionToken; // string
  public $applicationProfileId; // string
}
}

if (!class_exists("DeleteApplicationDataResponse")) {
/*
 *DeleteApplicationDataResponse
 */
class DeleteApplicationDataResponse {
}
}

if (!class_exists("IsMerchantProfileInitialized")) {
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

if (!class_exists("TenderType")) {
/*
 *TenderType
 */
class TenderType {
}
}

if (!class_exists("IsMerchantProfileInitializedResponse")) {
/*
 *IsMerchantProfileInitializedResponse
 */
class IsMerchantProfileInitializedResponse {
  public $IsMerchantProfileInitializedResult; // boolean
}
}

if (!class_exists("GetMerchantProfiles")) {
/*
 *GetMerchantProfiles
 */
class GetMerchantProfiles {
  public $sessionToken; // string
  public $serviceId; // string
  public $tenderType; // TenderType
}
}

if (!class_exists("GetMerchantProfilesResponse")) {
/*
 *GetMerchantProfilesResponse
 */
class GetMerchantProfilesResponse {
  public $GetMerchantProfilesResult; // ArrayOfMerchantProfile
}
}

if (!class_exists("MerchantProfile")) {
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

if (!class_exists("MerchantProfileMerchantData")) {
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

if (!class_exists("TypeISOLanguageCodeA3")) {
/*
 *TypeISOLanguageCodeA3
 */
class TypeISOLanguageCodeA3 {
}
}

if (!class_exists("AddressInfo")) {
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

if (!class_exists("TypeStateProvince")) {
/*
 *TypeStateProvince
 */
class TypeStateProvince {
}
}

if (!class_exists("TypeISOCountryCodeA3")) {
/*
 *TypeISOCountryCodeA3
 */
class TypeISOCountryCodeA3 {
}
}

if (!class_exists("BankcardMerchantData")) {
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

if (!class_exists("IndustryType")) {
/*
 *IndustryType
 */
class IndustryType {
}
}

if (!class_exists("ElectronicCheckingMerchantData")) {
/*
 *ElectronicCheckingMerchantData
 */
class ElectronicCheckingMerchantData {
  public $OrginatorId; // string
  public $ProductId; // string
  public $SiteId; // string
}
}

if (!class_exists("StoredValueMerchantData")) {
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

if (!class_exists("MerchantProfileTransactionData")) {
/*
 *MerchantProfileTransactionData
 */
class MerchantProfileTransactionData {
  public $BankcardTransactionDataDefaults; // BankcardTransactionDataDefaults
}
}

if (!class_exists("BankcardTransactionDataDefaults")) {
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

if (!class_exists("TypeISOCurrencyCodeA3")) {
/*
 *TypeISOCurrencyCodeA3
 */
class TypeISOCurrencyCodeA3 {
}
}

if (!class_exists("CustomerPresent")) {
/*
 *CustomerPresent
 */
class CustomerPresent {
}
}

if (!class_exists("EntryMode")) {
/*
 *EntryMode
 */
class EntryMode {
}
}

if (!class_exists("RequestACI")) {
/*
 *RequestACI
 */
class RequestACI {
}
}

if (!class_exists("RequestAdvice")) {
/*
 *RequestAdvice
 */
class RequestAdvice {
}
}

if (!class_exists("GetMerchantProfileIds")) {
/*
 *GetMerchantProfileIds
 */
class GetMerchantProfileIds {
  public $sessionToken; // string
  public $serviceId; // string
  public $tenderType; // TenderType
}
}

if (!class_exists("GetMerchantProfileIdsResponse")) {
/*
 *GetMerchantProfileIdsResponse
 */
class GetMerchantProfileIdsResponse {
  public $GetMerchantProfileIdsResult; // ArrayOfstring
}
}

if (!class_exists("GetMerchantProfilesByProfileId")) {
/*
 *GetMerchantProfilesByProfileId
 */
class GetMerchantProfilesByProfileId {
  public $sessionToken; // string
  public $merchantProfileId; // string
}
}

if (!class_exists("GetMerchantProfilesByProfileIdResponse")) {
/*
 *GetMerchantProfilesByProfileIdResponse
 */
class GetMerchantProfilesByProfileIdResponse {
  public $GetMerchantProfilesByProfileIdResult; // ArrayOfMerchantProfile
}
}

if (!class_exists("GetMerchantProfile")) {
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

if (!class_exists("GetMerchantProfileResponse")) {
/*
 *GetMerchantProfileResponse
 */
class GetMerchantProfileResponse {
  public $GetMerchantProfileResult; // MerchantProfile
}
}

if (!class_exists("DeleteMerchantProfile")) {
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

if (!class_exists("DeleteMerchantProfileResponse")) {
/*
 *DeleteMerchantProfileResponse
 */
class DeleteMerchantProfileResponse {
}
}

if (!class_exists("SaveMerchantProfiles")) {
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

if (!class_exists("SaveMerchantProfilesResponse")) {
/*
 *SaveMerchantProfilesResponse
 */
class SaveMerchantProfilesResponse {
}
}

if (!class_exists("SignOnWithUsernamePasswordForServiceKey")) {
/*
 *SignOnWithUsernamePasswordForServiceKey
 */
class SignOnWithUsernamePasswordForServiceKey {
  public $serviceKey; // string
  public $username; // string
  public $password; // string
}
}

if (!class_exists("SignOnWithUsernamePasswordForServiceKeyResponse")) {
/*
 *SignOnWithUsernamePasswordForServiceKeyResponse
 */
class SignOnWithUsernamePasswordForServiceKeyResponse {
  public $SignOnWithUsernamePasswordForServiceKeyResult; // string
}
}

if (!class_exists("ResetPasswordForServiceKey")) {
/*
 *ResetPasswordForServiceKey
 */
class ResetPasswordForServiceKey {
  public $serviceKey; // string
  public $userName; // string
}
}

if (!class_exists("ResetPasswordForServiceKeyResponse")) {
/*
 *ResetPasswordForServiceKeyResponse
 */
class ResetPasswordForServiceKeyResponse {
}
}

if (!class_exists("ChangePasswordForServiceKey")) {
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

if (!class_exists("ChangePasswordForServiceKeyResponse")) {
/*
 *ChangePasswordForServiceKeyResponse
 */
class ChangePasswordForServiceKeyResponse {
}
}

if (!class_exists("ChangeUsernameForServiceKey")) {
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

if (!class_exists("ChangeUsernameForServiceKeyResponse")) {
/*
 *ChangeUsernameForServiceKeyResponse
 */
class ChangeUsernameForServiceKeyResponse {
}
}

if (!class_exists("ChangeEmailForServiceKey")) {
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

if (!class_exists("ChangeEmailForServiceKeyResponse")) {
/*
 *ChangeEmailForServiceKeyResponse
 */
class ChangeEmailForServiceKeyResponse {
}
}

if (!class_exists("GetPasswordExpirationForServiceKey")) {
/*
 *GetPasswordExpirationForServiceKey
 */
class GetPasswordExpirationForServiceKey {
  public $serviceKey; // string
  public $userName; // string
  public $password; // string
}
}

if (!class_exists("GetPasswordExpirationForServiceKeyResponse")) {
/*
 *GetPasswordExpirationForServiceKeyResponse
 */
class GetPasswordExpirationForServiceKeyResponse {
  public $GetPasswordExpirationForServiceKeyResult; // dateTime
}
}

if (!class_exists("ValidateMerchantProfile")) {
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

if (!class_exists("ValidateMerchantProfileResponse")) {
/*
 *ValidateMerchantProfileResponse
 */
class ValidateMerchantProfileResponse {
}
}

if (!class_exists("ElectronicCheckingCaptureResponse")) {
/*
 *ElectronicCheckingCaptureResponse
 */
class ElectronicCheckingCaptureResponse {
  public $SummaryData; // SummaryData
}
}

if (!class_exists("ElectronicCheckingTransactionResponse")) {
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

if (!class_exists("ReturnInformation")) {
/*
 *ReturnInformation
 */
class ReturnInformation {
  public $ReturnCode; // string
  public $ReturnDate; // dateTime
  public $ReturnReason; // string
}
}

if (!class_exists("ElectronicCheckingTransaction")) {
/*
 *ElectronicCheckingTransaction
 */
class ElectronicCheckingTransaction {
  public $TenderData; // ElectronicCheckingTenderData
  public $TransactionData; // ElectronicCheckingTransactionData
}
}

if (!class_exists("ElectronicCheckingCustomerData")) {
/*
 *ElectronicCheckingCustomerData
 */
class ElectronicCheckingCustomerData {
  public $AdditionalBillingData; // PersonalInfo
}
}

if (!class_exists("ElectronicCheckingTenderData")) {
/*
 *ElectronicCheckingTenderData
 */
class ElectronicCheckingTenderData {
  public $CheckData; // CheckData
}
}

if (!class_exists("CheckData")) {
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

if (!class_exists("CheckCountryCode")) {
/*
 *CheckCountryCode
 */
class CheckCountryCode {
}
}

if (!class_exists("OwnerType")) {
/*
 *OwnerType
 */
class OwnerType {
}
}

if (!class_exists("UseType")) {
/*
 *UseType
 */
class UseType {
}
}

if (!class_exists("ElectronicCheckingTransactionData")) {
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

if (!class_exists("SECCode")) {
/*
 *SECCode
 */
class SECCode {
}
}

if (!class_exists("ServiceType")) {
/*
 *ServiceType
 */
class ServiceType {
}
}

if (!class_exists("TransactionType")) {
/*
 *TransactionType
 */
class TransactionType {
}
}

if (!class_exists("StoredValueTransaction")) {
/*
 *StoredValueTransaction
 */
class StoredValueTransaction {
  public $TenderData; // StoredValueTenderData
  public $TransactionData; // StoredValueTransactionData
}
}

if (!class_exists("StoredValueTenderData")) {
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

if (!class_exists("CardData")) {
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

if (!class_exists("CardSecurityData")) {
/*
 *CardSecurityData
 */
class CardSecurityData {
  public $CVDataProvided; // CVDataProvided
  public $CVData; // string
}
}

if (!class_exists("ConsumerIdentification")) {
/*
 *ConsumerIdentification
 */
class ConsumerIdentification {
  public $IdType; // IdType
  public $IdData; // string
  public $IdEntryMode; // IdEntryMode
}
}

if (!class_exists("IdType")) {
/*
 *IdType
 */
class IdType {
}
}

if (!class_exists("IdEntryMode")) {
/*
 *IdEntryMode
 */
class IdEntryMode {
}
}

if (!class_exists("StoredValueTransactionData")) {
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
  public $TransactionCode; // TransactionCode
  public $IsCashOut; // boolean
}
}

if (!class_exists("CardStatus")) {
/*
 *CardStatus
 */
class CardStatus {
}
}

if (!class_exists("OperationType")) {
/*
 *OperationType
 */
class OperationType {
}
}

if (!class_exists("TransactionCode")) {
/*
 *TransactionCode
 */
class TransactionCode {
}
}

if (!class_exists("StoredValueBalanceTransferTenderData")) {
/*
 *StoredValueBalanceTransferTenderData
 */
class StoredValueBalanceTransferTenderData {
  public $SourceCardData; // CardData
  public $ConsumerIdentification; // ConsumerIdentification
}
}

if (!class_exists("StoredValueActivateTenderData")) {
/*
 *StoredValueActivateTenderData
 */
class StoredValueActivateTenderData {
  public $VirtualCardData; // VirtualCardData
}
}

if (!class_exists("VirtualCardData")) {
/*
 *VirtualCardData
 */
class VirtualCardData {
  public $AccountNumberLength; // int
  public $BIN; // string
}
}

if (!class_exists("StoredValueReturn")) {
/*
 *StoredValueReturn
 */
class StoredValueReturn {
  public $Amount; // decimal
  public $TransactionCode; // TransactionCode
}
}

if (!class_exists("StoredValueCapture")) {
/*
 *StoredValueCapture
 */
class StoredValueCapture {
  public $Amount; // decimal
}
}

if (!class_exists("StoredValueManage")) {
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

if (!class_exists("StoredValueTransactionResponse")) {
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

if (!class_exists("StoredValueCaptureResponse")) {
/*
 *StoredValueCaptureResponse
 */
class StoredValueCaptureResponse {
  public $BatchId; // string
  public $SummaryData; // SummaryData
}
}

if (!class_exists("QueryBatch")) {
/*
 *QueryBatch
 */
class QueryBatch {
  public $sessionToken; // string
  public $queryBatchParameters; // QueryBatchParameters
  public $pagingParameters; // PagingParameters
}
}

if (!class_exists("QueryBatchParameters")) {
/*
 *QueryBatchParameters
 */
class QueryBatchParameters {
  public $BatchDateRange; // DateRange
  public $BatchIds; // ArrayOfstring
  public $MerchantProfileIds; // ArrayOfstring
  public $ServiceKeys; // ArrayOfstring
  public $TransactionIds; // ArrayOfstring
}
}

if (!class_exists("QueryBatchResponse")) {
/*
 *QueryBatchResponse
 */
class QueryBatchResponse {
  public $QueryBatchResult; // ArrayOfBatchDetailData
}
}

if (!class_exists("BatchDetailData")) {
/*
 *BatchDetailData
 */
class BatchDetailData {
  public $BatchCaptureDate; // dateTime
  public $BatchId; // string
  public $BatchSummaryData; // TransactionSummaryData
  public $CaptureState; // CaptureState
  public $Description; // string
  public $SummaryData; // SummaryData
  public $TransactionIds; // ArrayOfstring
}
}

if (!class_exists("QueryTransactionFamilies")) {
/*
 *QueryTransactionFamilies
 */
class QueryTransactionFamilies {
  public $sessionToken; // string
  public $queryTransactionsParameters; // QueryTransactionsParameters
  public $pagingParameters; // PagingParameters
}
}

if (!class_exists("QueryTransactionsParameters")) {
/*
 *QueryTransactionsParameters
 */
class QueryTransactionsParameters {
  public $Amounts; // ArrayOfdecimal
  public $ApprovalCodes; // ArrayOfstring
  public $BatchIds; // ArrayOfstring
  public $CaptureDateRange; // DateRange
  public $CaptureStates; // ArrayOfCaptureState
  public $CardTypes; // ArrayOfTypeCardType
  public $IsAcknowledged; // BooleanParameter
  public $MerchantProfileIds; // ArrayOfstring
  public $OrderNumbers; // ArrayOfstring
  public $QueryType; // QueryType
  public $ReconciliationStates; // ArrayOfReconciliationState
  public $ServiceIds; // ArrayOfstring
  public $ServiceKeys; // ArrayOfstring
  public $TransactionClassTypePairs; // ArrayOfTransactionClassTypePair
  public $TransactionDateRange; // DateRange
  public $TransactionIds; // ArrayOfstring
  public $TransactionStates; // ArrayOfTransactionState
}
}

if (!class_exists("BooleanParameter")) {
/*
 *BooleanParameter
 */
class BooleanParameter {
}
}

if (!class_exists("QueryType")) {
/*
 *QueryType
 */
class QueryType {
}
}

if (!class_exists("ReconciliationState")) {
/*
 *ReconciliationState
 */
class ReconciliationState {
}
}

if (!class_exists("TransactionClassTypePair")) {
/*
 *TransactionClassTypePair
 */
class TransactionClassTypePair {
  public $TransactionClass; // string
  public $TransactionType; // string
}
}

if (!class_exists("QueryTransactionFamiliesResponse")) {
/*
 *QueryTransactionFamiliesResponse
 */
class QueryTransactionFamiliesResponse {
  public $QueryTransactionFamiliesResult; // ArrayOfFamilyDetail
}
}

if (!class_exists("FamilyDetail")) {
/*
 *FamilyDetail
 */
class FamilyDetail {
  public $BatchId; // string
  public $CaptureDateTime; // dateTime
  public $CapturedAmount; // decimal
  public $CustomerId; // string
  public $FamilyId; // guid
  public $FamilyState; // TransactionState
  public $LastAuthorizedAmount; // decimal
  public $MerchantProfileId; // string
  public $NetAmount; // decimal
  public $ServiceKey; // string
  public $TransactionIds; // ArrayOfstring
  public $TransactionMetaData; // ArrayOfTransactionMetaData
}
}

if (!class_exists("TransactionMetaData")) {
/*
 *TransactionMetaData
 */
class TransactionMetaData {
  public $Amount; // decimal
  public $CardType; // string
  public $MaskedPAN; // string
  public $SequenceNumber; // string
  public $ServiceId; // string
  public $TransactionClassTypePair; // TransactionClassTypePair
  public $TransactionDateTime; // dateTime
  public $TransactionId; // string
  public $TransactionState; // TransactionState
  public $WorkflowId; // string
}
}

if (!class_exists("QueryTransactionsDetail")) {
/*
 *QueryTransactionsDetail
 */
class QueryTransactionsDetail {
  public $sessionToken; // string
  public $queryTransactionsParameters; // QueryTransactionsParameters
  public $transactionDetailFormat; // TransactionDetailFormat
  public $includeRelated; // boolean
  public $pagingParameters; // PagingParameters
}
}

if (!class_exists("TransactionDetailFormat")) {
/*
 *TransactionDetailFormat
 */
class TransactionDetailFormat {
}
}

if (!class_exists("QueryTransactionsDetailResponse")) {
/*
 *QueryTransactionsDetailResponse
 */
class QueryTransactionsDetailResponse {
  public $QueryTransactionsDetailResult; // ArrayOfTransactionDetail
}
}

if (!class_exists("TransactionDetail")) {
/*
 *TransactionDetail
 */
class TransactionDetail {
  public $CompleteTransaction; // CompleteTransaction
  public $FamilyInformation; // FamilyInformation
  public $TransactionInformation; // TransactionInformation
  public $TransactionNotifications; // ArrayOfTransactionNotification
}
}

if (!class_exists("CompleteTransaction")) {
/*
 *CompleteTransaction
 */
class CompleteTransaction {
  public $CWSTransaction; // CWSTransaction
  public $SerializedTransaction; // string
}
}

if (!class_exists("CWSTransaction")) {
/*
 *CWSTransaction
 */
class CWSTransaction {
  public $ApplicationData; // ApplicationData
  public $MerchantProfileMerchantData; // MerchantProfileMerchantData
  public $MetaData; // TransactionMetaData
  public $Response; // Response
  public $Transaction; // Transaction
}
}

if (!class_exists("FamilyInformation")) {
/*
 *FamilyInformation
 */
class FamilyInformation {
  public $FamilyId; // guid
  public $FamilySequenceCount; // int
  public $FamilySequenceNumber; // int
  public $FamilyState; // TransactionState
  public $NetAmount; // decimal
}
}

if (!class_exists("TransactionInformation")) {
/*
 *TransactionInformation
 */
class TransactionInformation {
  public $Amount; // decimal
  public $ApprovalCode; // string
  public $BankcardData; // BankcardData
  public $BatchId; // string
  public $CaptureDateTime; // dateTime
  public $CaptureState; // CaptureState
  public $CaptureStatusMessage; // string
  public $CapturedAmount; // decimal
  public $CustomerId; // string
  public $ElectronicCheckData; // ElectronicCheckData
  public $IsAcknowledged; // BooleanParameter
  public $MaskedPAN; // string
  public $MerchantProfileId; // string
  public $OriginatorTransactionId; // string
  public $ReconciliationBalance; // decimal
  public $ReconciliationState; // ReconciliationState
  public $Reference; // string
  public $ServiceId; // string
  public $ServiceKey; // string
  public $ServiceTransactionId; // string
  public $Status; // Status
  public $StoredValueData; // StoredValueData
  public $TransactionClassTypePair; // TransactionClassTypePair
  public $TransactionId; // string
  public $TransactionState; // TransactionState
  public $TransactionStatusCode; // string
  public $TransactionTimestamp; // dateTime
}
}

if (!class_exists("BankcardData")) {
/*
 *BankcardData
 */
class BankcardData {
  public $AVSResult; // AVSResult
  public $CVResult; // CVResult
  public $CardType; // TypeCardType
  public $MaskedPAN; // string
  public $OrderId; // string
}
}

if (!class_exists("ElectronicCheckData")) {
/*
 *ElectronicCheckData
 */
class ElectronicCheckData {
  public $CheckNumber; // string
  public $MaskedAccountNumber; // string
  public $TransactionType; // TransactionType
}
}

if (!class_exists("StoredValueData")) {
/*
 *StoredValueData
 */
class StoredValueData {
  public $CVResult; // CVResult
  public $CardRestrictionValue; // string
  public $CardStatus; // CardStatus
  public $NewBalance; // decimal
  public $OrderId; // string
  public $PreviousBalance; // decimal
}
}

if (!class_exists("TransactionNotification")) {
/*
 *TransactionNotification
 */
class TransactionNotification {
  public $NotificationDate; // dateTime
  public $ReconciliationBalance; // decimal
  public $ReconciliationState; // ReconciliationState
  public $SerializedNotification; // string
}
}

if (!class_exists("QueryTransactionsSummary")) {
/*
 *QueryTransactionsSummary
 */
class QueryTransactionsSummary {
  public $sessionToken; // string
  public $queryTransactionsParameters; // QueryTransactionsParameters
  public $includeRelated; // boolean
  public $pagingParameters; // PagingParameters
}
}

if (!class_exists("QueryTransactionsSummaryResponse")) {
/*
 *QueryTransactionsSummaryResponse
 */
class QueryTransactionsSummaryResponse {
  public $QueryTransactionsSummaryResult; // ArrayOfSummaryDetail
}
}

if (!class_exists("SummaryDetail")) {
/*
 *SummaryDetail
 */
class SummaryDetail {
  public $FamilyInformation; // FamilyInformation
  public $TransactionInformation; // TransactionInformation
}
}

if (!class_exists("TMSBaseFault")) {
/*
 *TMSBaseFault
 */
class TMSBaseFault {
  public $ErrorID; // int
  public $HelpURL; // string
  public $Operation; // string
  public $ProblemType; // string
}
}

if (!class_exists("TMSTransactionFailedFault")) {
/*
 *TMSTransactionFailedFault
 */
class TMSTransactionFailedFault {
}
}

if (!class_exists("TMSOperationNotSupportedFault")) {
/*
 *TMSOperationNotSupportedFault
 */
class TMSOperationNotSupportedFault {
}
}

if (!class_exists("TMSUnavailableFault")) {
/*
 *TMSUnavailableFault
 */
class TMSUnavailableFault {
}
}

if (!class_exists("TMSUnknownServiceKeyFault")) {
/*
 *TMSUnknownServiceKeyFault
 */
class TMSUnknownServiceKeyFault {
}
}

if (!class_exists("TMSValidationResultFault")) {
/*
 *TMSValidationResultFault
 */
class TMSValidationResultFault {
  public $Errors; // ArrayOfTMSValidationError
}
}

if (!class_exists("TMSValidationError")) {
/*
 *TMSValidationError
 */
class TMSValidationError {
  public $ErrorType; // TMSValidationError_EErrorType
  public $RuleKey; // string
  public $RuleLocationKey; // string
  public $RuleMessage; // string
}
}

if (!class_exists("TMSValidationError_EErrorType")) {
/*
 *TMSValidationError_EErrorType
 */
class TMSValidationError_EErrorType {
}
}

if (!class_exists("STSUnavailableFault")) {
/*
 *STSUnavailableFault
 */
class STSUnavailableFault {
}
}

if (!class_exists("BaseFault")) {
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

if (!class_exists("ExpiredTokenFault")) {
/*
 *ExpiredTokenFault
 */
class ExpiredTokenFault {
}
}

if (!class_exists("InvalidTokenFault")) {
/*
 *InvalidTokenFault
 */
class InvalidTokenFault {
}
}

if (!class_exists("AuthenticationFault")) {
/*
 *AuthenticationFault
 */
class AuthenticationFault {
}
}

if (!class_exists("BadAttemptThresholdExceededFault")) {
/*
 *BadAttemptThresholdExceededFault
 */
class BadAttemptThresholdExceededFault {
}
}

if (!class_exists("PasswordExpiredFault")) {
/*
 *PasswordExpiredFault
 */
class PasswordExpiredFault {
}
}

if (!class_exists("OneTimePasswordFault")) {
/*
 *OneTimePasswordFault
 */
class OneTimePasswordFault {
}
}

if (!class_exists("LockedByAdminFault")) {
/*
 *LockedByAdminFault
 */
class LockedByAdminFault {
}
}

if (!class_exists("SendEmailFault")) {
/*
 *SendEmailFault
 */
class SendEmailFault {
}
}

if (!class_exists("GeneratePasswordFault")) {
/*
 *GeneratePasswordFault
 */
class GeneratePasswordFault {
}
}

if (!class_exists("PasswordInvalidFault")) {
/*
 *PasswordInvalidFault
 */
class PasswordInvalidFault {
}
}

if (!class_exists("UserNotFoundFault")) {
/*
 *UserNotFoundFault
 */
class UserNotFoundFault {
}
}

if (!class_exists("InvalidEmailFault")) {
/*
 *InvalidEmailFault
 */
class InvalidEmailFault {
}
}

if (!class_exists("BankcardTransactionResponsePro")) {
/*
 *BankcardTransactionResponsePro
 */
class BankcardTransactionResponsePro {
  public $AdviceResponse; // AdviceResponse
  public $CommercialCardResponse; // CommercialCardResponse
  public $ReturnedACI; // string
}
}

if (!class_exists("BankcardTransactionDataPro")) {
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

if (!class_exists("BankcardTransactionPro")) {
/*
 *BankcardTransactionPro
 */
class BankcardTransactionPro {
  public $InterchangeData; // BankcardInterchangeData
}
}

if (!class_exists("BankcardInterchangeData")) {
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

if (!class_exists("BankcardReturnPro")) {
/*
 *BankcardReturnPro
 */
class BankcardReturnPro {
  public $LineItemDetails; // ArrayOfLineItemDetail
}
}

if (!class_exists("BankcardCapturePro")) {
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

if (!class_exists("BankcardCaptureResponsePro")) {
/*
 *BankcardCaptureResponsePro
 */
class BankcardCaptureResponsePro {
}
}

if (!class_exists("QueryBillingEventSummary")) {
/*
 *QueryBillingEventSummary
 */
class QueryBillingEventSummary {
  public $sessionToken; // string
  public $queryBillingEventParameters; // QueryBillingEventParameters
  public $pagingParameters; // PagingParameters
}
}

if (!class_exists("QueryBillingEventParameters")) {
/*
 *QueryBillingEventParameters
 */
class QueryBillingEventParameters {
  public $BillingEventSourceIds; // ArrayOfstring
  public $BreakdownType; // BreakdownType
  public $EventDateRange; // DateRange
  public $MerchantProfileIds; // ArrayOfstring
  public $ServiceKeys; // ArrayOfstring
}
}

if (!class_exists("BreakdownType")) {
/*
 *BreakdownType
 */
class BreakdownType {
}
}

if (!class_exists("QueryBillingEventSummaryResponse")) {
/*
 *QueryBillingEventSummaryResponse
 */
class QueryBillingEventSummaryResponse {
  public $QueryBillingEventSummaryResult; // ArrayOfBillingEventSummary
}
}

if (!class_exists("BillingEventSummary")) {
/*
 *BillingEventSummary
 */
class BillingEventSummary {
  public $Breakdown; // string
  public $Breakdown2; // string
  public $EventCount; // int
  public $SourceId; // string
  public $SourceName; // string
}
}

if (!class_exists("BillingTransactionFailedFault")) {
/*
 *BillingTransactionFailedFault
 */
class BillingTransactionFailedFault {
}
}

if (!class_exists("BillingBaseFault")) {
/*
 *BillingBaseFault
 */
class BillingBaseFault {
  public $ErrorID; // int
  public $HelpURL; // string
  public $Operation; // string
  public $ProblemType; // string
}
}

if (!class_exists("QueryBillingEventDetail")) {
/*
 *QueryBillingEventDetail
 */
class QueryBillingEventDetail {
  public $sessionToken; // string
  public $queryBillingEventParameters; // QueryBillingEventParameters
  public $pagingParameters; // PagingParameters
}
}

if (!class_exists("QueryBillingEventDetailResponse")) {
/*
 *QueryBillingEventDetailResponse
 */
class QueryBillingEventDetailResponse {
  public $QueryBillingEventDetailResult; // ArrayOfBillingEventDetail
}
}

if (!class_exists("BillingEventDetail")) {
/*
 *BillingEventDetail
 */
class BillingEventDetail {
  public $BillingEventMetaData; // BillingEventMetaData
  public $SerializedBillingData; // string
}
}

if (!class_exists("BillingEventMetaData")) {
/*
 *BillingEventMetaData
 */
class BillingEventMetaData {
  public $EventTime; // dateTime
  public $EventType; // string
  public $MerchantProfileId; // string
  public $ServiceKey; // string
  public $SourceId; // string
  public $SourceName; // string
  public $TransactionId; // string
  public $UserName; // string
  public $WorkflowId; // string
}
}

class CWSTransactionManagement extends SoapClient {

 private static $classmap = array( 
                                    'PingResponse' => 'PingResponse',
                                    'Ping' => 'Ping',
                                    'PingResponse' => 'PingResponse',
                                    'char' => 'char',
                                    'duration' => 'duration',
                                    'guid' => 'guid',
                                    'DateRange' => 'DateRange',
                                    'PagingParameters' => 'PagingParameters',
                                    'DataServicesUnavailableFault' => 'DataServicesUnavailableFault',
                                    'DSBaseFault' => 'DSBaseFault',
                                    'Response' => 'Response',
                                    'Status' => 'Status',
                                    'ServiceTransactionDateTime' => 'ServiceTransactionDateTime',
                                    'Addendum' => 'Addendum',
                                    'Unmanaged' => 'Unmanaged',
                                    'CaptureState' => 'CaptureState',
                                    'TransactionState' => 'TransactionState',
                                    'IndustryType' => 'IndustryType',
                                    'SummaryData' => 'SummaryData',
                                    'SummaryTotals' => 'SummaryTotals',
                                    'CVResult' => 'CVResult',
                                    'Transaction' => 'Transaction',
                                    'TransactionCustomerData' => 'TransactionCustomerData',
                                    'CustomerInfo' => 'CustomerInfo',
                                    'NameInfo' => 'NameInfo',
                                    'AddressInfo' => 'AddressInfo',
                                    'TypeISOCountryCodeA3' => 'TypeISOCountryCodeA3',
                                    'InternationalAddressInfo' => 'InternationalAddressInfo',
                                    'PersonalInfo' => 'PersonalInfo',
                                    'DriversLicense' => 'DriversLicense',
                                    'TypeStateProvince' => 'TypeStateProvince',
                                    'TransactionReportingData' => 'TransactionReportingData',
                                    'TransactionTenderData' => 'TransactionTenderData',
                                    'CVDataProvided' => 'CVDataProvided',
                                    'TransactionData' => 'TransactionData',
                                    'TypeISOCurrencyCodeA3' => 'TypeISOCurrencyCodeA3',
                                    'PINlessDebitData' => 'PINlessDebitData',
                                    'BillPayServiceData' => 'BillPayServiceData',
                                    'PayeeData' => 'PayeeData',
                                    'EntryMode' => 'EntryMode',
                                    'AlternativeMerchantData' => 'AlternativeMerchantData',
                                    'Return' => 'Return',
                                    'Undo' => 'Undo',
                                    'Capture' => 'Capture',
                                    'Manage' => 'Manage',
                                    'Resubmit' => 'Resubmit',
                                    'Adjust' => 'Adjust',
                                    'BankcardTransactionResponse' => 'BankcardTransactionResponse',
                                    'BankcardCaptureResponse' => 'BankcardCaptureResponse',
                                    'TransactionSummaryData' => 'TransactionSummaryData',
                                    'Totals' => 'Totals',
                                    'PrepaidCard' => 'PrepaidCard',
                                    'TypeCardType' => 'TypeCardType',
                                    'AVSResult' => 'AVSResult',
                                    'AddressResult' => 'AddressResult',
                                    'CountryResult' => 'CountryResult',
                                    'StateResult' => 'StateResult',
                                    'PostalCodeResult' => 'PostalCodeResult',
                                    'PhoneResult' => 'PhoneResult',
                                    'CardholderNameResult' => 'CardholderNameResult',
                                    'CityResult' => 'CityResult',
                                    'Resubmit' => 'Resubmit',
                                    'AdviceResponse' => 'AdviceResponse',
                                    'CommercialCardResponse' => 'CommercialCardResponse',
                                    'BankcardTransaction' => 'BankcardTransaction',
                                    'BankcardApplicationConfigurationData' => 'BankcardApplicationConfigurationData',
                                    'ApplicationLocation' => 'ApplicationLocation',
                                    'HardwareType' => 'HardwareType',
                                    'PINCapability' => 'PINCapability',
                                    'ReadCapability' => 'ReadCapability',
                                    'BankcardTenderData' => 'BankcardTenderData',
                                    'CardData' => 'CardData',
                                    'CardSecurityData' => 'CardSecurityData',
                                    'AVSData' => 'AVSData',
                                    'InternationalAVSData' => 'InternationalAVSData',
                                    'InternationalAVSOverride' => 'InternationalAVSOverride',
                                    'EcommerceSecurityData' => 'EcommerceSecurityData',
                                    'TokenIndicator' => 'TokenIndicator',
                                    'BankcardTransactionData' => 'BankcardTransactionData',
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
                                    'BillPayment' => 'BillPayment',
                                    'RequestCommercialCard' => 'RequestCommercialCard',
                                    'ExistingDebt' => 'ExistingDebt',
                                    'RequestACI' => 'RequestACI',
                                    'RequestAdvice' => 'RequestAdvice',
                                    'AccountType' => 'AccountType',
                                    'CustomerPresent' => 'CustomerPresent',
                                    'GoodsType' => 'GoodsType',
                                    'InternetTransactionData' => 'InternetTransactionData',
                                    'PartialApprovalSupportType' => 'PartialApprovalSupportType',
                                    'TransactionCode' => 'TransactionCode',
                                    'BankcardReturn' => 'BankcardReturn',
                                    'BankcardUndo' => 'BankcardUndo',
                                    'PINDebitUndoReason' => 'PINDebitUndoReason',
                                    'BankcardCapture' => 'BankcardCapture',
                                    'ChargeType' => 'ChargeType',
                                    'Resubmit3DSecure' => 'Resubmit3DSecure',
                                    'ResubmitReason' => 'ResubmitReason',
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
                                    'ElectronicCheckingCaptureResponse' => 'ElectronicCheckingCaptureResponse',
                                    'ElectronicCheckingTransactionResponse' => 'ElectronicCheckingTransactionResponse',
                                    'ReturnInformation' => 'ReturnInformation',
                                    'ElectronicCheckingTransaction' => 'ElectronicCheckingTransaction',
                                    'ElectronicCheckingCustomerData' => 'ElectronicCheckingCustomerData',
                                    'ElectronicCheckingTenderData' => 'ElectronicCheckingTenderData',
                                    'CheckData' => 'CheckData',
                                    'CheckCountryCode' => 'CheckCountryCode',
                                    'OwnerType' => 'OwnerType',
                                    'UseType' => 'UseType',
                                    'ElectronicCheckingTransactionData' => 'ElectronicCheckingTransactionData',
                                    'SECCode' => 'SECCode',
                                    'ServiceType' => 'ServiceType',
                                    'TransactionType' => 'TransactionType',
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
                                    'TransactionCode' => 'TransactionCode',
                                    'StoredValueBalanceTransferTenderData' => 'StoredValueBalanceTransferTenderData',
                                    'StoredValueActivateTenderData' => 'StoredValueActivateTenderData',
                                    'VirtualCardData' => 'VirtualCardData',
                                    'StoredValueReturn' => 'StoredValueReturn',
                                    'StoredValueCapture' => 'StoredValueCapture',
                                    'StoredValueManage' => 'StoredValueManage',
                                    'StoredValueTransactionResponse' => 'StoredValueTransactionResponse',
                                    'StoredValueCaptureResponse' => 'StoredValueCaptureResponse',
                                    'QueryBatch' => 'QueryBatch',
                                    'QueryBatchParameters' => 'QueryBatchParameters',
                                    'QueryBatchResponse' => 'QueryBatchResponse',
                                    'BatchDetailData' => 'BatchDetailData',
                                    'QueryTransactionFamilies' => 'QueryTransactionFamilies',
                                    'QueryTransactionsParameters' => 'QueryTransactionsParameters',
                                    'BooleanParameter' => 'BooleanParameter',
                                    'QueryType' => 'QueryType',
                                    'ReconciliationState' => 'ReconciliationState',
                                    'TransactionClassTypePair' => 'TransactionClassTypePair',
                                    'QueryTransactionFamiliesResponse' => 'QueryTransactionFamiliesResponse',
                                    'FamilyDetail' => 'FamilyDetail',
                                    'TransactionMetaData' => 'TransactionMetaData',
                                    'QueryTransactionsDetail' => 'QueryTransactionsDetail',
                                    'TransactionDetailFormat' => 'TransactionDetailFormat',
                                    'QueryTransactionsDetailResponse' => 'QueryTransactionsDetailResponse',
                                    'TransactionDetail' => 'TransactionDetail',
                                    'CompleteTransaction' => 'CompleteTransaction',
                                    'CWSTransaction' => 'CWSTransaction',
                                    'FamilyInformation' => 'FamilyInformation',
                                    'TransactionInformation' => 'TransactionInformation',
                                    'BankcardData' => 'BankcardData',
                                    'ElectronicCheckData' => 'ElectronicCheckData',
                                    'StoredValueData' => 'StoredValueData',
                                    'TransactionNotification' => 'TransactionNotification',
                                    'QueryTransactionsSummary' => 'QueryTransactionsSummary',
                                    'QueryTransactionsSummaryResponse' => 'QueryTransactionsSummaryResponse',
                                    'SummaryDetail' => 'SummaryDetail',
                                    'TMSBaseFault' => 'TMSBaseFault',
                                    'TMSTransactionFailedFault' => 'TMSTransactionFailedFault',
                                    'TMSOperationNotSupportedFault' => 'TMSOperationNotSupportedFault',
                                    'TMSUnavailableFault' => 'TMSUnavailableFault',
                                    'TMSUnknownServiceKeyFault' => 'TMSUnknownServiceKeyFault',
                                    'TMSValidationResultFault' => 'TMSValidationResultFault',
                                    'TMSValidationError' => 'TMSValidationError',
                                    'TMSValidationError_EErrorType' => 'TMSValidationError_EErrorType',
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
                                    'BankcardTransactionResponsePro' => 'BankcardTransactionResponsePro',
                                    'BankcardTransactionDataPro' => 'BankcardTransactionDataPro',
                                    'BankcardTransactionPro' => 'BankcardTransactionPro',
                                    'BankcardInterchangeData' => 'BankcardInterchangeData',
                                    'BankcardReturnPro' => 'BankcardReturnPro',
                                    'BankcardCapturePro' => 'BankcardCapturePro',
                                    'BankcardCaptureResponsePro' => 'BankcardCaptureResponsePro',
                                    'QueryBillingEventSummary' => 'QueryBillingEventSummary',
                                    'QueryBillingEventParameters' => 'QueryBillingEventParameters',
                                    'BreakdownType' => 'BreakdownType',
                                    'QueryBillingEventSummaryResponse' => 'QueryBillingEventSummaryResponse',
                                    'BillingEventSummary' => 'BillingEventSummary',
                                    'BillingTransactionFailedFault' => 'BillingTransactionFailedFault',
                                    'BillingBaseFault' => 'BillingBaseFault',
                                    'QueryBillingEventDetail' => 'QueryBillingEventDetail',
                                    'QueryBillingEventDetailResponse' => 'QueryBillingEventDetailResponse',
                                    'BillingEventDetail' => 'BillingEventDetail',
                                    'BillingEventMetaData' => 'BillingEventMetaData',
                                   );

  public function CWSTransactionManagement($wsdl = "", $options = array()) {
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
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/DataServices',
            'soapaction' => ''
           )
      );
  }

  /*
   *  
   *
   * @param QueryBatch $parameters
   * @return QueryBatchResponse
   */
  public function QueryBatch(QueryBatch $parameters) {
    return $this->__soapCall('QueryBatch', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/DataServices',
            'soapaction' => ''
           )
      );
  }

  /*
   *  
   *
   * @param QueryTransactionFamilies $parameters
   * @return QueryTransactionFamiliesResponse
   */
  public function QueryTransactionFamilies(QueryTransactionFamilies $parameters) {
    return $this->__soapCall('QueryTransactionFamilies', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/DataServices',
            'soapaction' => ''
           )
      );
  }

  /*
   *  
   *
   * @param QueryTransactionsDetail $parameters
   * @return QueryTransactionsDetailResponse
   */
  public function QueryTransactionsDetail(QueryTransactionsDetail $parameters) {
    return $this->__soapCall('QueryTransactionsDetail', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/DataServices',
            'soapaction' => ''
           )
      );
  }

  /*
   *  
   *
   * @param QueryTransactionsSummary $parameters
   * @return QueryTransactionsSummaryResponse
   */
  public function QueryTransactionsSummary(QueryTransactionsSummary $parameters) {
    return $this->__soapCall('QueryTransactionsSummary', array($parameters),       array(
            'uri' => 'http://schemas.evosnap.com/CWS/v2.0/DataServices',
            'soapaction' => ''
           )
      );
  }

}

?>
