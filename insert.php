<?php
include_once 'db.php';

if($reqdata["apikey"] == "someapikey"){
  $sql = $reqdata["sql"];
  
if (mysqli_query($conn, $sql)) {
  $last_id = mysqli_insert_id($conn);
  echo '{ "message" : "Data Inserted", "type": "success", "id":'.$last_id.'}';
} else {
    echo '{ "message" : "Unable to insert", "type": "failed"}';
}
}
else{
	echo '{ "message" : "Wrong api key", "type": "failed"}';
}
mysqli_close($conn);
?>