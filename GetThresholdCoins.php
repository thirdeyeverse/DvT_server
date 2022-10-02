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
//$coins= (float) $_POST['coin'];


$query1="SELECT ThresholdCoin from users WHERE phone='$phone' AND username='$username'";


$result = mysqli_query($dblink, $query1);

$row = mysqli_fetch_row($result);


if($row){
    $num1 = intval($row[0]);
    // $num2 = intval($row[1]);
    // $num3 = $num1-$num2;
    
    
    if($num1 >0)
    {
          $dataArray = array('success' => true, 'Value' => $num1);
    }
    else
    {
        $dataArray = array('success' => true, 'Value' => 0);
    }
    
   
    
    
    


} else{
	
    $dataArray = array('success' => false, 'Message' => 'Could not get coins, try again later.');

}



echo json_encode($dataArray);
?>