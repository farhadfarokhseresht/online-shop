<?php
include 'db.php';
$cities = null;
$province_id = "";
if (isset($_POST['province_id']) and !empty($_POST['province_id']) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    $province_id = $_POST['province_id'];
    $query = "SELECT * FROM cities WHERE province_id = ".$province_id;
    $run_query = mysqli_query($con, $query);
    $cities = array();
    while ($row = mysqli_fetch_array($run_query)) {
        $cities [$row['id']] = $row['name'];
    }
}

