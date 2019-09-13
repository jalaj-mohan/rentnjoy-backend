<?php
$servername = "localhost";
$username = "tanushree";
$password = "pankaj12!@";
$dbname = "rentnjoy";
$reqdata = json_decode(file_get_contents("php://input"),true);
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



if($reqdata["apikey"] == "someapikey"){
	$sql = $reqdata["sql"];
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	$data = array();

//Fetch into associative array
  while ( $row = $result->fetch_assoc())  {
	$data[]=$row;
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
