<?php
include_once 'db.php';
$reqdata = json_decode(file_get_contents("php://input"),true);
if($reqdata["apikey"] == "someapikey"){
  $sql = $reqdata["sql"];
  
if (mysqli_query($conn, $sql)) {
  echo '{ "message" : "Data Mutated", "type": "success"}';
} else {
    echo '{ "message" : "Unable to mutate", "type": "failed"}';
}
}
else{
	echo '{ "message" : "Wrong api key", "type": "failed"}';
}
mysqli_close($conn);
?>