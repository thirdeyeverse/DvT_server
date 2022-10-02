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
	    $d=array('100'=>$testrow[0],'200'=>$testrow[1],'500'=>$testrow[2],'1000'=>$testrow[3],'2000'=>$testrow[4],'5000'=>$testrow[5],'10000'=>$testrow[6],'20000'=>$testrow[7]);
		$dataArray = $d;//array('Values' => $testrow);
		
	}
		else{
			$dataArray = array('success' => false, 'Message' => 'Could not Get Coins, try again later.');
		}






echo json_encode($dataArray);
?>