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


date_default_timezone_set("Asia/Kolkata");
$datetime = date("Y-m-d", time());
$t=date("Y-m-d", $datetime);



$username = $_POST['usrname'];
$phone = $_POST['phone'];
//$coins= (float) $_POST['coin'];


$query1="SELECT WReqCount,LastReqTime from users WHERE phone='$phone' AND username='$username'";


$result = mysqli_query($dblink, $query1);

$row = mysqli_fetch_row($result);


if($row){
    $num1 = intval($row[0]);
    $num2 = $row[1];
    $reqd=strtotime($num2);
    
    $tt=date("Y-m-d", $reqd);
    
    if($tt == $datetime)
    {
        $d=array("count" => $num1,"LT"=>$tt);
        $dataArray = array('success' => true, 'Value' => $d);
    }
    else
    {
        $qq="UPDATE users SET WReqCount=0,LastReqTime='$datetime' WHERE phone='$phone' AND username='$username'";
        if($rres = mysqli_query($dblink, $qq))
        {
            $d=array("count" => 0,"LT"=>$datetime);
        }
        else
        {
            $d=array("count" => 1000,"LT"=>$datetime);
        }
        
        $dataArray = array('success' => true, 'Value' => $d);
    }
    
    
    
    
   
    
    
    


} else{
	
    $dataArray = array('success' => false, 'Message' => 'Could not get coins, try again later.');

}



echo json_encode($dataArray);
?>