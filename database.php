<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "retail";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
echo $password;
// Check connection

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>