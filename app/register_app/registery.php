<?php
session_start();
#include 'gettooken.php';
include 'sendSMS.php';

if (isset($_POST['sendcodagin'])){
    $phonenumber = $_SESSION['phonenumber'];
    $cod =  mt_rand(10000000, 99999999);
    $_SESSION['cod'] = $cod;
    $mas =  "کاربر گرامی به فروشگاه انلاین خوش آمدید کد احراز هویت شما  :  " . $cod;
    $sendresult = sendsms($mas,$phonenumber);
//    $sendresult = 'ارسال با موفقیت انجام گردید';
    if ($sendresult == 'ارسال با موفقیت انجام گردید') {
        echo 1;
    }else{
        echo 0;
    }
}

if(isset($_POST['phonenumber'])){
    $phonenumber = $_POST['phonenumber'];
    $cod =  mt_rand(10000000, 99999999);
    $_SESSION['cod'] = $cod;
    $_SESSION['phonenumber'] = $phonenumber;
    $mas =  "کاربر گرامی به فروشگاه انلاین خوش آمدید کد احراز هویت شما  :  " . $cod;
    $sendresult = sendsms($mas,$phonenumber);
//    $sendresult = 'ارسال با موفقیت انجام گردید';
    if ($sendresult == 'ارسال با موفقیت انجام گردید') {
        echo 1;
    }else{
        echo 0;
    }
}

if(isset($_POST['sendcod'])){
    if ( $_SESSION['cod'] == $_POST['usercod']){
        echo 1;
    }else{
        echo 0;
    }
}
if(isset($_POST['getnumber'])){
    if (isset($_SESSION['phonenumber'])){
        echo $_SESSION['phonenumber'];
    }else{
        echo 0;
    }
}

