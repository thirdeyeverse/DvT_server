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






$tq="SELECT MAX(id) FROM users";
$tqres=mysqli_query($dblink, $tq);
$rqRow=mysqli_fetch_row($tqres);
$Nid=10000+$rqRow[0]+1;

$username = "Guest".$Nid;
$pass = "Guest".$Nid;
$phone = 9999999999;
$reffaralled="none";
$coins=10000;

$result = mysqli_query($dblink, $query);

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
			"User Created Successfully","name" => $username,"phone" => $newph,"coins" => $coins,"Myid" => $Nid,"pass"=>$pass);
			$resultnew = mysqli_query($dblink, $newquery);
	}
		else{
			$dataArray = array('success' => false, 'Message' => 'Could not create user, try again later.');
		}



echo json_encode($dataArray);
?>