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



$pic = $_POST['pic'];
$uid=$_POST['uid'];


$query = "UPDATE users SET pic='$pic' WHERE userid='$uid'";


$result = mysqli_query($dblink, $query);

$row = mysqli_affected_rows($dblink);
if($row){
	$dataArray = array('success' => true, 'Message' => 'User profile image updated Successfully');
} else{
	
    $dataArray = array('success' => false, 'Message' => 'Could not update, try again later.');

}


echo json_encode($dataArray);
?>