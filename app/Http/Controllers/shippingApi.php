<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class shippingApi extends Controller
{
    //
    public function index()
    {
    	$url = 'http://webservice.logixerp.com/webservice/v1/CreateDocket';
 
		//Initiate cURL.
		$ch = curl_init($url);
		 
		//The JSON data.
		$requestDataArray =  array( 
				"SecureKey" =>  "A3604E505DB24D118B9A2D48BDC336B3",
				"FromOU" =>  "CAIRO",
				"DocketNumber" =>  "RBLZ0000001",
				"DeliveryDate" =>  "",
				"CustomerCode" =>  "ACME",
				"ConsigneeCode" =>  "00000",
				"ConsigneeAddress" =>  "Group 18, Building 5",
				"ConsigneeCountry" =>  "EG",
				"ConsigneeState" =>  "Cairo",
				"ConsigneeCity" =>  "Al Rehab",
				"ConsigneePincode" =>  "",
				"ConsigneeName" =>  "Ahmed Mahmoud",		
				"ConsigneePhone" =>  "0101234567",
		        "ConsigneeWhat3Words" => "",
				"StartLocation" =>  "",
				"EndLocation" =>  "",
				"ClientCode" =>  "ACME",
				"NumberOfPackages" =>  1,		
				"ActualWeight" =>  1,
				"ChargedWeight" =>  "",
				"CargoValue" =>  "100",	
				"ReferenceNumber" =>  "",
				"InvoiceNumber" =>  "",
				"PaymentMode" =>  "TBB", 
				"ServiceCode" =>  "PUD",	
				"WeightUnitType" =>  "",
				"ConsingmentType" =>  "",
				"Description" =>  "Item 1",
				"COD" =>  100,
				"CODPaymentMode" =>  "Cash",	
				"PackageDetails" =>  "",
				"CreateDocketWithoutStock"=>"TRUE"		
			
		);
		 
		//Format the array to HTTP Payload.
		$postFormattedData = http_build_query($requestDataArray);

		curl_setopt($ch, CURLOPT_POST, 1);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $postFormattedData);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLINFO_HEADER_OUT, true);

		curl_setopt($ch, CURLOPT_HTTPHEADER,array (
		   "Content-Type: application/x-www-form-urlencoded; charset=utf-8"
		));

		//Execute the request
		$result = curl_exec($ch);

		print $result;
    }
}
