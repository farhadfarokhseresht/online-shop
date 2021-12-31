<?php

$serverfname = "localhost";
$userfname = "root";
$password = "";
$db = "onlineshop";



// Create connection
$con = mysqli_connect($serverfname, $userfname, $password,$db);
$con->set_charset("utf8");
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
