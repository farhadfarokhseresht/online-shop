<?php
include "db.php";

// address_state check
if (!empty($_SESSION["uid"])) {
    $uid = $_SESSION["uid"];
    $sql = 'SELECT * FROM address where user_id =  ' . $uid;
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);
    $count = mysqli_num_rows($query);
    if ($count > 0) {
        $address_state = 1;
        while ($row) {
            $adid = $row['id'];
            $province = $row['province'];
            $city = $row['city'];
            $address1 = $row['address1'];
            $address2 = $row['address2'];
            $plack = $row['plack'];
            $vahed = $row['vahed'];
            $codposti = $row['codposti'];
            $codmli = $row['codmli'];
            $rname = $row['rname'];
            $rfname = $row['rfname'];
            $rphone = $row['rphone'];
            $address_list[$adid] = array($province, $city, $address1,$address2, $plack, $vahed, $codposti, $codmli, $rname, $rfname, $rphone);
        }
    } else {
        $address_state = 0;
        if(isset($_POST['addadressbu'])
            and !empty($_POST["address1"]) and !empty($_POST["city"]) and !empty($_POST["codposti"])
            and !empty($_POST["province_id"]) and !empty($_POST["codmli"]) and !empty($_POST["rname"])
            and !empty($_POST["rphone"])  and !empty($_POST["rfname"])
        ){
            $province = $_POST['province_id'];
            $city = $_POST['city'];
            $address1 = $_POST['address1'];
            $address2 ="";
            $plack = $_POST['plack'];
            $vahed = $_POST['vahed'];
            $codposti = $_POST['codposti'];
            $codmli = $_POST['codmli'];
            $rname = $_POST['rname'];
            $rfname = $_POST['rfname'];
            $rphone = $_POST['rphone'];
            $addressdata = array($uid,$province, $city, $address1,$address2, $plack, $vahed, $codposti, $codmli, $rname, $rfname, $rphone);
            $values  = "'".implode("','", $addressdata)."'";
            $sql = "INSERT INTO `address`( `user_id`, `province`, `city`, `address2`, `address1`, `plack`, `vahed`, `codposti`, `codmli`, `rname`, `rfname`, `rphone`) VALUES ($values)";
            $query = mysqli_query($con, $sql);
            header($_SERVER['HTTP_REFERER']);
        }

    }
}

