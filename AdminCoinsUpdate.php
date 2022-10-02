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

$userid = $_POST['usr'];

$coins= (float) $_POST['coin'];



date_default_timezone_set("Asia/Kolkata");
$yourdate=date("Y-m-d H:i:s",time());


$query="INSERT INTO AdminCoins(userid,coins,Time) VALUES ('$userid','$coins','$yourdate')";

$result = mysqli_query($dblink, $query);

$row = mysqli_affected_rows($dblink);
if($row){
	$dataArray = array('success' => true, 'Message' => 'Coins Added to Admin ');
} else{
	
    $dataArray = array('success' => false, 'Message' => 'Could not Add Coins, try again later.');

}



echo json_encode($dataArray);
?>