<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "shop";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$razorpay_api_key= "";
$razorpay_api_secret = "";

?>
