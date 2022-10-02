<?php
 include 'config.php';
$dbport = 3306;


$dblink = mysqli_init();
$dbconnection = mysqli_real_connect($dblink, $dbhost, $dbuser, $dbpassword, $db, $dbport);

if($dbconnection) {

}
else{
	die("connection failed" . mysql_error());
}

$userid = $_POST['usr'];
$P = $_POST['Playing'];



$query = "UPDATE users SET Playing='$P' WHERE userid='$userid' ";



$result = mysqli_query($dblink, $query);

$row = mysqli_affected_rows($dblink);
if($row){
	$dataArray = array('success' => true, 'Message' => 'Info updated ');
} else{
	
    $dataArray = array('success' => false, 'Message' => 'Could not update, try again later.');

}



echo json_encode($dataArray);
?>