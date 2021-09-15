<?php
/*
 * ZarinPal Advanced Class
 *
 * version 	: 1.0
 * link 	: https://vrl.ir/zpc
 *
 * author 	: milad maldar
 * e-mail 	: miladworkshop@gmail.com
 * website 	: https://miladworkshop.ir
*/

require_once("zarinpal_function.php");

$MerchantID 	= "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx";
$Amount 		= 100;
$ZarinGate 		= false;
$SandBox 		= false;

$zp 	= new zarinpal();
$result = $zp->verify($MerchantID, $Amount, $SandBox, $ZarinGate);

if (isset($result["Status"]) && $result["Status"] == 100)
{
	// Success
	echo "تراکنش با موفقیت انجام شد";
	echo "<br />مبلغ : ". $result["Amount"];
	echo "<br />کد پیگیری : ". $result["RefID"];
	echo "<br />Authority : ". $result["Authority"];
} else {
	// error
	echo "پرداخت ناموفق";
	echo "<br />کد خطا : ". $result["Status"];
	echo "<br />تفسیر و علت خطا : ". $result["Message"];
}