<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "gym_database";

$connection = mysqli_connect($host,$user,$pass,$dbname);

if($connection){
    echo '<script>';
    echo 'console.log(" database connection established")';
    echo '</script>';
}else{
    echo '<script>';
    echo 'console.log(" something went wrong in db connection")';
    echo '</script>';
}
$pId =rand(400,8000);
$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		// echo "<b>Transaction status is success</b>" . "<br/>";
		echo "<script>alert('Transaction status is success');</script>" . "<br/>";
		$insertquery = "insert into user values('$pId','$passName','$PassPrice','$PassType','$uid','$gid') ";
		$login = mysqli_query($connection , $insertquery);
		header("Location:../components/profile.php");
		
	}
	else {
		
		// echo "<b>Transaction status is failure</b>" . "<br/>";
		echo "<script>alert('Transaction status is failure')</script>" . "<br/>";
	}

	// if (isset($_POST) && count($_POST)>0 )
	// { 
	// 	foreach($_POST as $paramName => $paramValue) {
	// 			echo "<br/>" . $paramName . " = " . $paramValue;
	// 	}
	// }
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>