<?php
//  error_reporting(0);

 $servername = "127.0.0.1:3307";
 $username = "root";
 $password = "";
 $dbname = "test";

 // Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die(mysqli_connect_error());
}

?>
