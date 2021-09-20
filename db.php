<?php

$serverfname = "localhost";
$userfname = "root";
$password = "";
$db = "onlineshop";

// Create connection
$con = new mysqli($serverfname, $userfname, $password,$db);
$con->set_charset("utf8");
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
