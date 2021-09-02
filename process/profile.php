<?php
include "db.php";
// profile
$userinfo = null;
$address_list = null;
$orderinfo = null;
$edite_address = null;
$edite_pinfo = null;

// get all page data
if (isset($_GET["getprofile"])) {
    session_start();
    $uid = $_SESSION["uid"];
    // get user info
    $sql = "SELECT * FROM user_info where user_id = " . $uid;
    $query = mysqli_query($con, $sql);
    $count = mysqli_num_rows($query);
    if ($count > 0) {
        $row = mysqli_fetch_array($query);
//        $userinfo = array($row['first_name'], $row['last_name'], $row['email'], $row['mobile'], $row['password']);
        $userinfo = $row;
    }
    // get address
    $sql = 'SELECT * FROM address where user_id =  ' . $uid;
    $query = mysqli_query($con, $sql);
    $count = mysqli_num_rows($query);
    if ($count > 0) {
        $address_state = 1;
        $row = mysqli_fetch_array($query);
        $address_list = $row;
//        $adid = $row['id'];
//        $province = $row['province'];
//        $city = $row['city'];
//        $plack = $row['plack'];
//        $vahed = $row['vahed'];
//        $address1 = $row['address1'];
//        $codposti = $row['codposti'];
//        $codmli = $row['codmli'];
//        $rfname = $row['rfname'];
//        $rlname = $row['rlname'];
//        $rphone = $row['rphone'];
//        $address_list = array($adid, $province, $city, $address1, $plack, $vahed, $codposti, $codmli, $rfname, $rlname, $rphone);
    }
    // get order
//    $sql = "SELECT * FROM orders where user_id = " . $uid;
//    $query = mysqli_query($con, $sql);
//    $count = mysqli_num_rows($query);
//    if ($count > 0) {
//        while ($row = mysqli_fetch_array($query)) {
//            $orderinfo = array($row['order_id'], $row['pr'], $row['email'], $row['mobile'], $row['password']);
//        }
//
//    }
    $result = array('userinfo' => $userinfo, 'address_list' => $address_list);
    echo json_encode($result);
}

// edite_info
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['change_pinfo'])) {
    session_start();
    $uid = $_SESSION["uid"];
    unset($_POST['edite_pinfo']);
    unset($_POST['cancel_change']);
    unset($_POST['change_pinfo']);
    if (!empty($_POST['first_name']) and !empty($_POST['last_name']) and
        !empty($_POST['mobile']) and !empty($_POST['mobile'])
    ) {
        $inputs = "";
        $VALUES = "";
        $updateSet = "";
        foreach ($_POST as $ky => $val) {
            if ($val) {
                $inputs = $inputs . ',' . $ky;
                $VALUES = $VALUES . ',' . $val;
                $updateSet = $updateSet . $ky . " = '" . $val . "',";
            }
        }
        $updateSet = rtrim($updateSet, ", ");
        $sql = "UPDATE `user_info` SET " . $updateSet . " WHERE  user_id = " . $uid;
        $query = mysqli_query($con, $sql);
        if ($query) {
            echo 1;
        }
    }
}

// edite_address
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['change_address'])) {
    session_start();
    $uid = $_SESSION["uid"];
    $addressid = $_POST['addressid'];
    unset($_POST['addressid']);
    unset($_POST['edite_address']);
    unset($_POST['change_address']);
    unset($_POST['cancel_change']);
    $inputs = "";
    $VALUES = "";
    $updateSet = "";
    foreach ($_POST as $ky => $val) {
        if ($val) {
            $inputs = $inputs . ',' . $ky;
            $VALUES = $VALUES . ',' . $val;
            $updateSet = $updateSet . $ky . " = '" . $val . "',";
        }
    }
    $updateSet = rtrim($updateSet, ", ");
    $sql = "UPDATE `address` SET " . $updateSet . " WHERE  user_id = " . $uid . " AND id = " . $addressid;
    $query = mysqli_query($con, $sql);
    if ($query) {
        echo 1;
    }
}

