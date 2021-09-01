<?php
include "db.php";
$address_state = null;
// address_state check
if (!empty($_SESSION["uid"])) {
    $uid = $_SESSION["uid"];
    $sql = 'SELECT * FROM address where user_id =  ' . $uid;
    $query = mysqli_query($con, $sql);
    $count = mysqli_num_rows($query);
    if ($count > 0) {
        $address_state = 1;
        while ($row = mysqli_fetch_array($query)) {
            $adid = $row['id'];
            $province = $row['province'];
            $city = $row['city'];
            $address2 = '';
            $plack = $row['plack'];
            $vahed = $row['vahed'];
            $address1 = $row['address1']." پلاک ".$plack." واحد ".$vahed;
            $codposti = $row['codposti'];
            #$address2 = " استان ".$province." شهر ".$city." کدپستی ".$codposti." پلاک ".$plack." واحد ".$vahed ;
            $codmli = $row['codmli'];
            $rfname = $row['rfname'];
            $rlname = $row['rlname'];
            $rphone = $row['rphone'];
            $address_list = array($adid, $province, $city, $address2, $address1, $plack, $vahed, $codposti, $codmli, $rfname, $rlname, $rphone);
        }
    } else {
        $address_state = 0;
        if (isset($_POST['addadressbu'])
            and isset($_POST["address1"]) and isset($_POST["city"]) and isset($_POST["codposti"])
            and isset($_POST["province_id"]) and isset($_POST["codmli"]) and isset($_POST["rfname"])
            and isset($_POST["rphone"]) and isset($_POST["rlname"]) and !empty($_POST["address1"]) and !empty($_POST["city"]) and !empty($_POST["codposti"])
            and !empty($_POST["province_id"]) and !empty($_POST["codmli"]) and !empty($_POST["rfname"])
            and !empty($_POST["rphone"]) and !empty($_POST["rlname"])
        ) {
            $province = $_POST['province_id'];
            $city = $_POST['city'];
            $address1 = $_POST['address1'];
            $plack = $_POST['plack'];
            $vahed = $_POST['vahed'];
            $codposti = $_POST['codposti'];
            $address2 = "";
            $codmli = $_POST['codmli'];
            $rfname = $_POST['rfname'];
            $rlname = $_POST['rlname'];
            $rphone = $_POST['rphone'];
            $addressdata = array($uid, $province, $city, $address2, $address1, $plack, $vahed, $codposti, $codmli, $rfname, $rlname, $rphone);
            $values = "'" . implode("','", $addressdata) . "'";
            $sql = "INSERT INTO `address`( `user_id`, `province`, `city`, `address2`, `address1`, `plack`, `vahed`, `codposti`, `codmli`, `rfname`, `rlname`, `rphone`) VALUES ($values)";
            $query = mysqli_query($con, $sql);
            $address_state = 1;
        }
        $sql = 'SELECT * FROM address where user_id =  ' . $uid;
        $query = mysqli_query($con, $sql);
        $count = mysqli_num_rows($query);
        if ($count > 0) {
            $address_state = 1;
            while ($row = mysqli_fetch_array($query)) {
                $adid = $row['id'];
                $province = $row['province'];
                $city = $row['city'];
                $plack = $row['plack'];
                $vahed = $row['vahed'];
                $address1 = $row['address1']." پلاک ".$plack." واحد ".$vahed;
                $codposti = $row['codposti'];
                $address2 = "";
                $codmli = $row['codmli'];
                $rfname = $row['rfname'];
                $rlname = $row['rlname'];
                $rphone = $row['rphone'];
                $address_list = array($adid, $province, $city, $address2, $address1, $plack, $vahed, $codposti, $codmli, $rfname, $rlname, $rphone);
            }
        }
    }

}else{

    $warning = "<div id='alert' role=\"alert\" class=\"alert alert-warning d-sm-flex justify-content-sm-center align-items-sm-center\">
                <span><strong>برای تکمیل فرایند خرید لطفا وارد حساب کاربری خود شوید </strong></span>
                <span onclick=\"document.getElementById('alert').remove()\" class=\"closealert\" >&times;</span>
                </div>";
    $_SESSION['message'] = $warning;
    header('Location: cart.php');
//    exit;
//    header("refresh:2;url=cart.php");
//    echo $warning;
//    exit;
}

