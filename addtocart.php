<?php
include_once 'config.php';
$reqdata = json_decode(file_get_contents("php://input"),true);
if($reqdata["apikey"] == "someapikey"){
    
  $user1 = $reqdata["user1"];
  $user2 = $reqdata["user2"];
  $user3 = $reqdata["user3"];
  $user4 = $reqdata["user4"];
  $pid = $reqdata["product_id"];
  $uid = $reqdata["user_id"];

  $checksql1 = "SELECT * FROM users where phone=".$user1;
  $checksql2 = "SELECT * FROM users where phone=".$user2;
  $checksql3 = "SELECT * FROM users where phone=".$user3;
  $checksql4 = "SELECT * FROM users where phone=".$user4;
  $erruser = array();
  i= 0;
  if(mysqli_num_rows(mysqli_query($conn, $checksql1)) > 0){
    $erruser[i]=  $user1;
    i = i+1;
  }
  if(mysqli_num_rows(mysqli_query($conn, $checksql2)) > 0){
    $erruser[i]=  $user2;
    i = i+1;
  }
  if(mysqli_num_rows(mysqli_query($conn, $checksql3)) > 0){
    $erruser[i]=  $user3;
    i = i+1;
  }
  if(mysqli_num_rows(mysqli_query($conn, $checksql4)) > 0){
    $erruser[i]=  $user4;
    i = i+1;
  }

  if(i==0){

    $sql = "INSERT INTO cart (user1, user2, user3,user4,user5,product_id,user_id)
    VALUES ($user1,$user2,$user3,$user4,$user5,$pid,$uid)";
    if (mysqli_query($conn, $sql)) {
      $last_id = mysqli_insert_id($conn);
      echo '{ "message" : "Added to cart", "type": "success", "id":'.$last_id.'}';
    } else {
        echo '{ "message" : "Unable to add to cart", "type": "failed"}';
    }
  }
  else{
    echo '{ "message" : "Nos. Not Valid", "type": "failed", "users":'.$erruser.'}';
  }

}
else{
	echo '{ "message" : "Wrong api key", "type": "failed"}';
}
mysqli_close($conn);
?>
