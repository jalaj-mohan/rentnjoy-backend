<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "shop";
$reqdata = json_decode(file_get_contents("php://input"),true);
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
