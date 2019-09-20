<?php
$reqdata = json_decode(file_get_contents("php://input"),true);
include_once 'razorpay/Razorpay.php';

  if($reqdata["apikey"] == "someapikey"){
    $order  = $client->order->create([
        'receipt'         => 'receipt_1',
        'amount'          => $reqdata["amount"], // amount in the smallest currency unit
        'currency'        => 'INR',// <a href="https://razorpay.freshdesk.com/support/solutions/articles/11000065530-what-currencies-does-razorpay-support" target="_blank">See the list of supported currencies</a>.)
        'payment_capture' =>  '0'
      ]);
    echo '{"response":'.$order.'}';
  }
else{
	echo '{ "message" : "Wrong api key", "type": "failed"}';
}

?>