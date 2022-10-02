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




#$Round = $_POST['round'];
$user = $_POST['uid'];
$darttt=array();

$x=0;
$testquery="SELECT RequestTime,Amount,Status from addcashshop WHERE userid='$user' ORDER BY RequestTime DESC";
$testresult=mysqli_query($dblink, $testquery);
$testrow=mysqli_fetch_all($testresult, MYSQLI_ASSOC);

$darttt=$testrow;






if($darttt)
{
    $dataArray=array('Values'=>$darttt);
}
else
{
    $dataArray = array('success' => false, 'Message' => 'Could not get Values, try again later.');
}

mysqli_free_result($testresult);





echo json_encode($dataArray);
?>