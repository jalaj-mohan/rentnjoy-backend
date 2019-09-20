<?php
include_once 'razorpay/Razorpay.php';
include_once 'config.php';

$api = new Api($razorpay_api_key, $razorpay_api_secret);
$verify = $api->utility->verifyWebhookSignature(
    $webhookBody,
    $webhookSignature, 
    $webhookSecret
);
if ($verify){
    
}
?>