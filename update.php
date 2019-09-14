<?php
include_once 'db.php';

if($reqdata["apikey"] == "someapikey"){
  $sql = $reqdata["sql"];
  
if (mysqli_query($conn, $sql)) {
  echo '{ "message" : "Data Updated", "type": "success"}';
} else {
    echo '{ "message" : "Unable to update", "type": "failed"}';
}
}
else{
	echo '{ "message" : "Wrong api key", "type": "failed"}';
}
mysqli_close($conn);
?>