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
$user = $_POST['uid'];
$username = $_POST['usrname'];
$phone = $_POST['phone'];


$q1 = "SELECT KYC FROM users WHERE username='$username' AND phone='$phone'";


$result1 = mysqli_query($dblink, $q1);

$row1 = mysqli_fetch_row($result1);
if($row1){
    $num1 = intval($row1[0]);
    if($num1 > 0)
    {
        $PaytmData=array();
        $q2 = "SELECT phone,paytmid from PayTm WHERE userid='$user'";
        $result2 = mysqli_query($dblink, $q2);

        $row2 = mysqli_fetch_row($result2);
        
        
        if($row2)
        {
            $p=array("phone"=>$row2[0],"paytmid"=>$row2[1]);
            $PaytmData=$p;
        }
        else
        {
            $p=array("phone"=>"","paytmid"=>"");
            $PaytmData=$p;
        }
        
        
        
        $UPIData=array();
        $q3 = "SELECT phone,UPIid from UPI WHERE userid='$user'";
        $result3 = mysqli_query($dblink, $q3);

        $row3 = mysqli_fetch_row($result3);
        
        
        if($row3)
        {
            $p=array("phone"=>$row3[0],"UPIid"=>$row3[1]);
            $UPIData=$p;
        }
        else
        {
            $p=array("phone"=>"","UPIid"=>"");
            $UPIData=$p;
        }
        
        
        $BankData=array();
        $q4 = "SELECT phone,AccNum,IFSC from Banking WHERE userid='$user'";
        $result4 = mysqli_query($dblink, $q4);

        $row4 = mysqli_fetch_row($result4);
        
        
        if($row4)
        {
            $p=array("phone"=>$row4[0],"ACC"=>$row4[1],"IFSC"=>$row4[2]);
            $BankData=$p;
        }
        else
        {
            $p=array("phone"=>"","ACC"=>"");
            $BankData=$p;
        }
        
        $Val=array("Paytm"=>$PaytmData,"UPI"=>$UPIData,"Bank"=>$BankData);
        $dataArray=array("KYC" => true,"Message" => $Val);
        
        
        
    }
    else
    {
        $dataArray = array("KYC" => false,"Message" => "KYC Not Completed");
    }
	


} else{
	$dataArray = array(
    "ResultCode" => 2,
    "Message" => "Wrong username or password",
);
}



echo json_encode($dataArray);
?>