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

$username = $_POST['usrname'];
$pass = $_POST['password'];


$query = "SELECT username,phone,coins,userid,pic,Refcode FROM users WHERE username='$username' AND pass='$pass' ";


$result = mysqli_query($dblink, $query);

$row = mysqli_fetch_row($result);
if($row){
	$dataArray = array(    "ResultCode" => 1,
    "Message" => "Login Successful",
    "name" => $row[0],"phone" => $row[1],"coins" => $row[2],"Myid" => $row[3],"pic"=>$row[4],"rcode"=>$row[5],
);


} else{
	$dataArray = array(
    "ResultCode" => 2,
    "Message" => "Wrong username or password",
);
}



echo json_encode($dataArray);
?>