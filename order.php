<?php
include_once 'db.php';

if($reqdata["apikey"] == "someapikey"){
    
  $user1 = $reqdata["user1"];
  $user2 = $reqdata["user2"];
  $user3 = $reqdata["user3"];
  $user4 = $reqdata["user4"];
  $user5 = $reqdata["user5"];
  $pid = $reqdata["product_id"];
  $cartid = $reqdata["cart_id"];

  $sql = "INSERT INTO orders (user1, user2, user3,user4,user5,product_id,payment_status,admin_verification)
  VALUES ($user1.$user2,$user3,$user4,$user5,$pid,0,0)"
if (mysqli_query($conn, $sql)) {
  $last_id = mysqli_insert_id($conn);
  $del = "DELETE FROM cart WHERE id=".$cartid."";
  mysqli_query($conn, $sql);
  echo '{ "message" : "Order Placed", "type": "success", "id":'.$last_id.'}';
} else {
    echo '{ "message" : "Unable to order", "type": "failed"}';
}
}
else{
	echo '{ "message" : "Wrong api key", "type": "failed"}';
}
mysqli_close($conn);
?>