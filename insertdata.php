<?php
include_once 'config.php';
$reqdata = json_decode(file_get_contents("php://input"),true);
if($reqdata["apikey"] == "someapikey"){
  $sql = $reqdata["sql"];
  
if (mysqli_query($conn, $sql)) {
  $last_id = mysqli_insert_id($conn);
  echo '{"type": "success", "id":'.$last_id.'}';
} else {
    echo '{ "message" : "Unable to execute", "type": "failed"}';
}
}
else{
	echo '{ "message" : "Wrong api key", "type": "failed"}';
}
mysqli_close($conn);
?>