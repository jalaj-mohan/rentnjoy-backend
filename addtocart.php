<?php
include_once 'db.php';
$reqdata = json_decode(file_get_contents("php://input"),true);
if($reqdata["apikey"] == "someapikey"){
    
  $user1 = $reqdata["user1"];
  $user2 = $reqdata["user2"];
  $user3 = $reqdata["user3"];
  $user4 = $reqdata["user4"];
  $user5 = $reqdata["user5"];
  $pid = $reqdata["product_id"];
  $uid = $reqdata["user_id"];

  $sql = "INSERT INTO cart (user1, user2, user3,user4,user5,product_id,user_id)
  VALUES ($user1.$user2,$user3,$user4,$user5,$pid,$uid)";
if (mysqli_query($conn, $sql)) {
  $last_id = mysqli_insert_id($conn);
  echo '{ "message" : "Added to cart", "type": "success", "id":'.$last_id.'}';
} else {
    echo '{ "message" : "Unable to add to cart", "type": "failed"}';
}
}
else{
	echo '{ "message" : "Wrong api key", "type": "failed"}';
}
mysqli_close($conn);
?>