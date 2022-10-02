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
$pass = $_POST['password'];
$phone = $_POST['phone'];
$reffaralled=$_POST['refcode'];
$coins=30;


$query = "SELECT id FROM users WHERE phone='$phone' OR username='$username' ";

$tq="SELECT MAX(id) FROM users";
$tqres=mysqli_query($dblink, $tq);
$rqRow=mysqli_fetch_row($tqres);
$Nid=10000+$rqRow[0]+1;

$result = mysqli_query($dblink, $query);

$row = mysqli_fetch_row($result);
if($row){
	$nquery="SELECT id FROM users WHERE phone='$phone'";
	$nresult=mysqli_query($dblink, $nquery);
	$nrow=mysqli_fetch_row($nresult);

	$nnquery="SELECT id FROM users WHERE username='$username'";
	$nnresult=mysqli_query($dblink, $nnquery);
	$nnrow=mysqli_fetch_row($nnresult);

	if($nrow)
	{
		$dataArray = array('success' => false, 'Message' => 'Phone number already in use ');
	}
	else if($nnrow)
	{
		$dataArray = array('success' => false, 'Message' => 'Username already in use ');
	}
	// else
	// {
	// 	$dataArray = array('success' => false, 'Message' => 'User already exists ');
	// }


	
} else{
	// $rn=rand(1111,999999);
	// $rt=strval($rn);
	$ref=$username."@DVT";

	if($reffaralled == "none")
	{
		$reffaralled=null;
	}
	$newph="+91".$phone;
	
    $query2 = "INSERT INTO users(username, pass, phone, coins,userid,Refcode,Refferal ) VALUES ('$username', '$pass', '$newph', '$coins','$Nid','$ref','$reffaralled')";
	$newquery="INSERT INTO leaderboard(userid,prize) VALUES ('$Nid',0)";

	if($result2 = mysqli_query($dblink, $query2)){
		$dataArray = array('success' => true, 'error' => '',  'Message' => 
			"User Created Successfully");
			$resultnew = mysqli_query($dblink, $newquery);
	}
		else{
			$dataArray = array('success' => false, 'Message' => 'Could not create user, try again later.');
		}

}



echo json_encode($dataArray);
?>