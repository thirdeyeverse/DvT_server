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





$query = "SELECT Extra from ExtraCoins";

if($result = mysqli_query($dblink, $query)){
    
	    $testrow=mysqli_fetch_all($result, MYSQLI_ASSOC);
		$dataArray = array('Values' => $testrow);
		
	}
		else{
			$dataArray = array('success' => false, 'Message' => 'Could not Get Coins, try again later.');
		}






echo json_encode($dataArray);
?>