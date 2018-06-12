<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "";

$conn = mysqli_connect($server,$username,$password,$dbname);
//echo '<p> connected successfully</p>';

if($conn ->connect_error){
	die("connection failed: " .$conn->connect_error);
}
?>



