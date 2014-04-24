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
 *
 * Save Merchant Profile
 * This stores your newly created merchant profile from above.
 * Note:  This step only needs to occur during first time application setup.
 *
 */

if ($_serviceInformation->ElectronicCheckingServices->ElectronicCheckingService instanceof ElectronicCheckingService)
{
	if ($_merchantProfileId == null){

		if (is_array($_serviceId)){

			foreach ($_serviceId as $svcId){
				if ($svcId['ServiceId'] == '35A7700001'){
					$merchProfile = setACHMerchantProfile();
					$merchProfile->ProfileId = $merchProfile->ProfileId.'_'.$svcId['ServiceId'];
					$response = $client->saveMerchantProfiles ( $merchProfile, 'Credit', $svcId['ServiceId'] );
					break;
				}
			}
		}
		else {
			if ($svcId == '35A7700001'){
				$merchProfile = setACHMerchantProfile();
				$merchProfile->ProfileId = $merchProfile->ProfileId.'_'.$svcId['ServiceId'];
				$response = $client->saveMerchantProfiles ( $merchProfile, 'Credit', $svcId['ServiceId'] );
			}
		}
	}

	/*
	 *
	 * Retrieve Merchant Profiles
	 * Note:  Store the your Merchant Profile Id after this step.  This will remain
	 * static for your application unless you update your merchant profile info.  This step
	 * only needs to occur during first time application setup.
	 */

	if ($_merchantProfileId != null)
	$_merchantProfileId = null;
	//foreach ($_serviceId as $svcId){
	$response = $client->getMerchantProfiles ( '35A7700001', 'Credit' ); // Note a empty value in ServiceId will allow you to pull all profiles across all services
	/*
	 * If multiple Merchant Profiles exist print them out
	 */
	echo '<div style="text-align:center; border-width: thin; border-color: black; border-style:solid; "><h1>Merchant Information</h1></div>';
	if (is_array ( $response )) {
		foreach ( $response as $MerchantProfile ) {
			printACHMerchantProfiles ( $MerchantProfile );
			$_merchantProfileId[] = array( 'ProfileId' => $MerchantProfile->ProfileId, 'ServiceId' => $MerchantProfile->ServiceId);
		}
	} /*
	* Only one Merchant Profile exists.  Print this to the browser
	*/
	else{
		printACHMerchantProfiles ( $response );
		$_merchantProfileId[] = array( 'ProfileId' => $response->ProfileId, 'ServiceId' => $response->ServiceId);
	}


	if ($_merchantProfileId != null){
		echo '<h2>The following Merchant ProfileId(s) are initialized</h2>';
		if (is_array($_merchantProfileId))
		{
			echo '<ul>';
			foreach($_merchantProfileId as $id){
				$response = $client->isMerchantProfileInitialized ( $id['ProfileId'], $id['ServiceId'] );
				if ($response->IsMerchantProfileInitializedResult)
				{
					echo '<li>'.$id['ProfileId'].' with ServiceId of:</b><font color="#800080"> '.$id['ServiceId'].' is initialized.<br/>';
				}

			}
			echo '</ul>';
		}
		else {
			echo '<ul>';
			foreach($_merchantProfileId as $id){
				$response = $client->isMerchantProfileInitialized ( $id, $id['ServiceId'] );
				if ($response->IsMerchantProfileInitializedResult)
				echo '<li>'.$id.' with ServiceId of:</b><font color="#800080"> '.$_serviceId.' is initialized.<br/>';
			}
			echo '</ul>';
		}

	}
	else{
		echo '<ul>';
		$response = $client->isMerchantProfileInitialized ( $_merchantProfileId['ProfileId'], $_merchantProfileId['ServiceId'] );
		if ($response)
		echo '<li>'.$_merchantProfileId.' with ServiceId of:</b><font color="#800080"> '.$_serviceId.' is initialized.<br/>';
		echo '</ul>';
	}
}


/*
 * Function to create ACH MerchantProfile
 */
function setACHMerchantProfile(){
	// BankCard Merchant Data Object
	$achMerchData = new ElectronicCheckingMerchantData();
	// <!--type: string--> Optional - Required for FTPS and TSYS
	$achMerchData->OrginatorId = '11233468';
	$achMerchData->ProductId = '2246';
	$achMerchData->SiteId = '23747';
	// Merchant Address Info Object
	$merchAddressInfo = new AddressInfo ();
	// <!--type: string-->
	$merchAddressInfo->Street1 = "1234 Test Street";
	// <!--type: string-->
	$merchAddressInfo->Street2 = "Suite 222";
	// <!--type: string-->
	$merchAddressInfo->City = 'Denver';
	// <!--type: TypeStateProvince - enumeration: [NotSet,AL,AK,AS,AZ,AR,CA,CO,CT,DE,DC,FM,FL,GA,GU,HI,ID,IL,IN,IA,KS,KY,LA,ME,MH,MD,MA,MI,MN,MS,MO,MT,NE,NV,NH,NJ,NM,NY,NC,ND,MP,OH,OK,OR,PW,PA,PR,RI,SC,SD,TN,TX,UT,VT,VI,VA,WA,WV,WI,WY,AA,AE,AP,AB,BC,MB,NB,NF,NT,NS,NU,ON,PE,QC,SK,YK]-->
	$merchAddressInfo->StateProvince = 'CO';
	// <!--type: string-->
	$merchAddressInfo->PostalCode = '80202';
	// <!--type: TypeISOCountryCodeA3 - enumeration: [NotSet,AFG,ALA,ALB,DZA,ASM,AND,AGO,AIA,ATA,ATG,ARG,ARM,ABW,AUS,AUT,AZE,BHS,BHR,BGD,BRB,BLR,BEL,BLZ,BEN,BMU,BTN,BOL,BIH,BWA,BVT,BRA,IOT,BRN,BGR,BFA,BDI,KHM,CMR,CAN,CPV,CYM,CAF,TCD,CHL,CHN,CXR,CCK,COL,COM,COG,COD,COK,CRI,CIV,HRV,CUB,CYP,CZE,DNK,DJI,DMA,DOM,ECU,EGY,SLV,GNQ,ERI,EST,ETH,FLK,FRO,FJI,FIN,FRA,FXX,GUF,PYF,ATF,GAB,GMB,GEO,DEU,GHA,GIB,GRC,GRL,GRD,GLP,GUM,GTM,GGY,GIN,GNB,GUY,HTI,HMD,VAT,HND,HKG,HUN,ISL,IND,IDN,IRN,IRQ,IRL,IMN,ISR,ITA,JAM,JPN,JEY,JOR,KAZ,KEN,KIR,PRK,KOR,KWT,KGZ,LAO,LVA,LBN,LSO,LBR,LBY,LIE,LTU,LUX,MAC,MKD,MDG,MWI,MYS,MDV,MLI,MLT,MHL,MTQ,MRT,MUS,MYT,MEX,FSM,MDA,MCO,MNG,MNE,MSR,MAR,MOZ,MMR,NAM,NRU,NPL,NLD,ANT,NCL,NZL,NIC,NER,NGA,NIU,NFK,MNP,NOR,OMN,PAK,PLW,PSE,PAN,PNG,PRY,PER,PHL,PCN,POL,PRT,PRI,QAT,REU,ROU,RUS,RWA,SHN,KNA,LCA,SPM,VCT,WSM,SMR,STP,SAU,SEN,SRB,SCG,SYC,SLE,SGP,SVK,SVN,SLB,SOM,ZAF,SGS,ESP,LKA,SDN,SUR,SJM,SWZ,SWE,CHE,SYR,TWN,TJK,TZA,THA,TLS,TGO,TKL,TMP,TON,TTO,TUN,TUR,TKM,TCA,TUV,UGA,UKR,ARE,GBR,USA,UMI,URY,UZB,VUT,VEN,VNM,VGB,VIR,WLF,ESH,YEM,YUG,ZMB,ZWE]-->
	$merchAddressInfo->CountryCode = 'USA';

	//
	// Merchant Profile Information Object
	//
	$merchantData = new MerchantProfileMerchantData ();
	// <!--type: string-->
	$merchantData->CustomerServiceInternet = 'test@test.com';
	// <!--type: string--> must be in the following format 111 2223333
	$merchantData->CustomerServicePhone = '303 5551212';
	// <!--type: TypeISOLanguageCodeA3 - enumeration: [NotSet,AAR,ABK,ACE,ACH,ADA,ADY,AFA,AFH,AFR,AIN,AKA,AKK,ALB,ALE,ALG,ALT,AMH,ANG,ANP,APA,ARA,ARC,ARG,ARM,ARN,ARP,ARW,ASM,AST,ATH,AUS,AVA,AVE,AWA,AYM,AZE,BAD,BAI,BAK,BAL,BAM,BAN,BAQ,BAS,BAT,BEJ,BEL,BEM,BEN,BER,BHO,BIH,BIK,BIN,BIS,BLA,BNT,BOD,BOS,BRA,BRE,BTK,BUA,BUG,BUL,BUR,BYN,CAD,CAI,CAR,CAT,CAU,CEB,CEL,CES,CHA,CHB,CHE,CHG,CHI,CHK,CHM,CHN,CHO,CHP,CHR,CHU,CHV,CHY,CMC,COP,COR,COS,CPE,CPF,CPP,CRE,CRH,CRP,CSB,CUS,CYM,CZE,DAK,DAN,DAR,DAY,DEL,DEN,DEU,DGR,DIN,DIV,DOI,DRA,DSB,DUA,DUM,DUT,DYU,DZO,EFI,EGY,EKA,ELL,ELX,ENG,ENM,EPO,EST,EUS,EWE,EWO,FAN,FAO,FAS,FAT,FIJ,FIL,FIN,FIU,FON,FRA,FRE,FRM,FRO,FRR,FRS,FRY,FUL,FUR,GAA,GAY,GBA,GEM,GEO,GER,GEZ,GIL,GLA,GLE,GLG,GLV,GMH,GOH,GON,GOR,GOT,GRB,GRC,GRE,GRN,GSW,GUJ,GWI,HAI,HAT,HAU,HAW,HEB,HER,HIL,HIM,HIN,HIT,HMN,HMO,HRV,HSB,HUN,HUP,HYE,IBA,IBO,ICE,IDO,III,IJO,IKU,ILE,ILO,INA,INC,IND,INE,INH,IPK,IRA,IRO,ISL,ITA,JAV,JBO,JPN,JPR,JRB,KAA,KAB,KAC,KAL,KAM,KAN,KAR,KAS,KAT,KAU,KAW,KAZ,KBD,KHA,KHI,KHM,KHO,KIK,KIN,KIR,KMB,KOK,KOM,KON,KOR,KOS,KPE,KRC,KRL,KRO,KRU,KUA,KUM,KUR,KUT,LAD,LAH,LAM,LAO,LAT,LAV,LEZ,LIM,LIN,LIT,LOL,LOZ,LTZ,LUA,LUB,LUG,LUI,LUN,LUO,LUS,MAC,MAD,MAG,MAH,MAI,MAK,MAL,MAN,MAO,MAP,MAR,MAS,MAY,MDF,MDR,MEN,MGA,MIC,MIN,MKD,MKH,MLG,MLT,MNC,MNI,MNO,MOH,MOL,MON,MOS,MRI,MSA,MUN,MUS,MWL,MWR,MYA,MYN,MYV,NAH,NAI,NAP,NAU,NAV,NBL,NDE,NDO,NDS,NEP,NEW,NIA,NIC,NIU,NLD,NNO,NOB,NOG,NON,NOR,NQO,NSO,NUB,NWC,NYA,NYM,NYN,NYO,NZI,OCI,OJI,ORI,ORM,OSA,OSS,OTA,OTO,PAA,PAG,PAL,PAM,PAN,PAP,PAU,PEO,PER,PHI,PHN,PLI,POL,PON,POR,PRA,PRO,PUS,QUE,RAJ,RAP,RAR,ROA,ROH,ROM,RON,RUM,RUN,RUP,RUS,SAD,SAG,SAH,SAI,SAL,SAM,SAN,SAS,SAT,SCC,SCN,SCO,SCR,SEL,SEM,SGA,SGN,SHN,SID,SIN,SIO,SIT,SLA,SLK,SLO,SLV,SMA,SME,SMI,SMJ,SMN,SMO,SMS,SNA,SND,SNK,SOG,SOM,SON,SOT,SPA,SQI,SRD,SRN,SRP,SRR,SSA,SSW,SUK,SUN,SUS,SUX,SWA,SWE,SYR,TAH,TAI,TAM,TAT,TEL,TEM,TER,TET,TGK,TGL,THA,TIB,TIG,TIR,TIV,TKL,TLH,TLI,TMH,TOG,TON,TPI,TSI,TSN,TSO,TUK,TUM,TUP,TUR,TUT,TVL,TWI,TYV,UDM,UGA,UIG,UKR,UMB,URD,UZB,VAI,VEN,VIE,VOL,VOT,WAK,WAL,WAR,WAS,WEL,WEN,WLN,WOL,XAL,XHO,YAO,YAP,YID,YOR,YPK,ZAP,ZEN,ZHA,ZHO,ZND,ZUL,ZUN,ZZA]-->
	$merchantData->Language = 'ENG';
	// <!--type: string-->
	$merchantData->Address = $merchAddressInfo;
	// <!--type: string-->
	$merchantData->Name = 'TestMerchant';
	// <!--type: string--> must be in the following format 111 2223333
	$merchantData->Phone = '303 5551234';
	$merchantData->ElectronicCheckingMerchantData = $achMerchData;
	// Create Merchant Profile object
	$merchProfile = new MerchantProfile ();
	// <!--type: string-->
	$merchProfile->ProfileId = 'TestMerchant';
	// <!--type: string-->
	$merchProfile->LastUpdated = '2011-10-12';
	$merchProfile->MerchantData = $merchantData;

	return $merchProfile;
}

?>