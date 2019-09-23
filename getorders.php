<?php
include_once 'config.php';
$reqdata = json_decode(file_get_contents("php://input"),true);
if($reqdata["apikey"] == "someapikey"){

$sql = "SELECT * FROM users WHERE user_id=".$reqdata["user_id"];

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	$user = array();

//Fetch into associative array
  while ( $row = $result->fetch_assoc())  {
	$user[]=$row;
  }

  

  echo '{ "message" : "Retrieved Data", "type": "success", "data":'.json_encode($data).'}';
 
} else {
    echo '{ "message" : "No results found", "type": "failed"}';
}
}
else{
	echo '{ "message" : "Wrong api key", "type": "failed"}';
}



mysqli_close($conn);
?>