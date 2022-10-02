<?php
 include 'config.php';
$dbport = 3306;
// $dbuser = 'root';
// $dbpassword = '';
// $db = 'game';
// $dbhost = 'localhost';
// $dbport = 3306;





$dblink = mysqli_init();
$dbconnection = mysqli_real_connect($dblink, $dbhost, $dbuser, $dbpassword, $db, $dbport);

if($dbconnection) {

}
else{
	die("connection failed" . mysql_error());
}

$username = $_POST['usrname'];
$phone = $_POST['phone'];
$coins= (float) $_POST['coin'];
$Bonus= $_POST['Bonus'];
$Threshold= $_POST['Threshold'];
$uid=$_POST['uid'];
date_default_timezone_set("Asia/Kolkata");
$datetime = date("Y-m-d\TH:i:s", time());


$query = "UPDATE users SET TransactionCoins=TransactionCoins+'$coins',BonusCoin=BonusCoin+'$Bonus',ThresholdCoin=ThresholdCoin+'$Threshold' WHERE userid='$uid'";

$suc="Success";
 

$result = mysqli_query($dblink, $query);

$row = mysqli_affected_rows($dblink);
if($row){
	$dataArray = array('success' => true, 'Message' => 'Coins updated '.$coins);
$query2 = "INSERT INTO addcashshop(userid,RequestTime,Amount,Status) VALUES ('$uid', '$datetime', '$coins','$suc')";
$resultnew = mysqli_query($dblink, $query2);
} else{
	
    $dataArray = array('success' => false, 'Message' => 'Could not update, try again later.');

}



echo json_encode($dataArray);
?>