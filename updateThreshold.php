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
$coins= (float) $_POST['coin'];


$query1="SELECT ThresholdCoin from users WHERE phone='$phone' AND username='$username'";


$result = mysqli_query($dblink, $query1);

$row = mysqli_fetch_row($result);


if($row){
    $num = intval($row[0]);
    
    
    if($num >0)
    {
          $query2 ="UPDATE users SET ThresholdCoin=ThresholdCoin+'$coins' WHERE phone='$phone' AND username='$username'";
    
        $result2 = mysqli_query($dblink, $query2);
    
        $row2 = mysqli_affected_rows($dblink);
        $dataArray = array('success' => true, 'Message' => $row2);
        
        if($row2)
        {
            	$dataArray = array('success' => true, 'Message' => 'Threshold updated');
        }
        else
        {
            $dataArray = array('success' => false, 'Message' => 'Could not update, try again later.');
        }
    }
    else
    {
         $query2 ="UPDATE users SET ThresholdCoin=0 WHERE phone='$phone' AND username='$username'";
    
        $result2 = mysqli_query($dblink, $query2);
    
        $row2 = mysqli_affected_rows($dblink);
        $dataArray = array('success' => true, 'Message' => $row2);
        
        if($row2)
        {
            	$dataArray = array('success' => true, 'Message' => 'Threshold set to zero');
        }
        else
        {
            $dataArray = array('success' => false, 'Message' => 'Threshold is zero');
        }
        
    }
    
   
    
    
    


} else{
	
    $dataArray = array('success' => false, 'Message' => 'Could not update, try again later.');

}



echo json_encode($dataArray);
?>