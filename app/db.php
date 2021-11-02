<?php

//$serverfname = "localhost";
//$userfname = "root";
//$password = "";
//$db = "onlineshop";
//
$serverfname = "222.222.222.22";
$userfname = "vistauser";
$password = "farhadf72";
$port = '3306';
$db = "onlineshop";

// Create connection
$con = mysqli_connect($serverfname, $userfname, $password,$db,$port);
$con->set_charset("utf8");
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
