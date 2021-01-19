<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpesa;
use DB;

class MpesaController extends Controller
{
    public function index(Request $request)
    {
    	//dd($request->all());
    	$reg = Mpesa::c2bRegisterUrls();
    	/* $b2cResponse=Mpesa::simulateC2B(100, "254708374149", "Testing");*/
    	 //$balance = Mpesa::check_balance();
    	 $expressResponse=Mpesa::express($request['amount'],$request['phonenumber'],'24242524','Testing Payment');


    	 $array = json_decode($expressResponse, true);
    	 
    	 if(array_key_exists('CustomerMessage', $array))
    	 {

    	 	return redirect()->back()->with(['status' => $array['CustomerMessage']]);
    	 }

    	 if(array_key_exists('errorMessage', $array))
    	 {

    	 	return redirect()->back()->with(['status' => $array['errorMessage']]);
    	 }

    }

    public function storeResults(Request $requests){
        
        $request=file_get_contents('php://input');
        
        //process the received content into an array
        $array = json_decode($request, true);
        $transactiontype= $array['TransactionType']; 
        $transid=$array['TransID']; 
        $transtime=$array['TransTime']; 
        $transamount=$array['TransAmount']; 
        $businessshortcode=$array['BusinessShortCode']; 
        $billrefno=$array['BillRefNumber']; 
        $invoiceno=$array['InvoiceNumber']; 
        $msisdn=$array['MSISDN']; 
        $orgaccountbalance=$array['OrgAccountBalance']; 
        $firstname=$array['FirstName']; 
        $middlename=$array['MiddleName']; 
        $lastname=$array['LastName'];
        
       // Log::info('RECEIVED TRANSAMOUNT: '.$transamount);
        
        DB::insert('INSERT INTO payments
                    ( 
                    TransactionType,
                    TransID,
                    TransTime,
                    TransAmount,
                    BusinessShortCode,
                    BillRefNumber,
                    InvoiceNumber,
                    MSISDN,
                    FirstName,
                    MiddleName,
                    LastName,
                    OrgAccountBalance
                    )   values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
                    [$transactiontype, 
                    $transid, 
                    $transtime, 
                    $transamount, 
                    $businessshortcode, 
                    $billrefno, 
                    $invoiceno, 
                    $msisdn,
                    $firstname, 
                    $middlename, 
                    $lastname, 
                    $orgaccountbalance] );
                            
    echo'{"ResultCode":0,"ResultDesc":"Confirmation received successfully"}';
        
    }

    public function BalanceResults(Request $request)
    {
    	dd($request);
    }
}
