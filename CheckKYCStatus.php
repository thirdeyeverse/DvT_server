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



$query1="SELECT PayTmKYC,UPIKYC,BankKYC from users WHERE phone='$phone' AND username='$username'";


$result = mysqli_query($dblink, $query1);

$row = mysqli_fetch_row($result);


if($row){
    
    $d=array("Paytm"=>$row[0],"UPI"=>$row[1],"Bank"=>$row[2]);
    
     $dataArray = array('success' => true, 'Value' => $d);
    
   
    
    
    


} else{
	
    $dataArray = array('success' => false, 'Message' => 'Could not get coins, try again later.');

}



echo json_encode($dataArray);
?>