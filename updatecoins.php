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
$DR=$_POST['DR'];
$TIE=$_POST['TIE'];
$TG=$_POST['TG'];



$query = "UPDATE users SET coins=coins+'$coins',DR=DR+'$DR',TIE=TIE+'$TIE',TG=TG+'$TG' WHERE phone='$phone' AND username='$username' ";



$result = mysqli_query($dblink, $query);

$row = mysqli_affected_rows($dblink);
if($row){
	$dataArray = array('success' => true, 'Message' => 'Coins updated '.$coins);
} else{
	
    $dataArray = array('success' => false, 'Message' => 'Could not update, try again later.');

}



echo json_encode($dataArray);
?>