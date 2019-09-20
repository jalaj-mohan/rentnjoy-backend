<?php
include_once 'razorpay/Razorpay.php';
$api = new Api("<YOUR_KEY_ID>", "<YOUR_KEY_SECRET>");
$verify = $api->utility->verifyWebhookSignature(
    $webhookBody,
    $webhookSignature, 
    $webhookSecret
);
if ($verify){
    
}
?>